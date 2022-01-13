<?php 
include 'header.php';
//include('connect.php');
?>
<div class="page-content-wrapper">

<!-- BEGIN CONTENT BODY -->

<div class="page-content">

	<!-- BEGIN PAGE HEAD-->

	<div class="row page-head">



		<div class="page-title col-md-8">
<?php
if(isset($_REQUEST['action']) && $_REQUEST['action']=='upload_company_csv')
{
	$fileName = $_FILES["chooseFile"]["tmp_name"];
	$ext = strtolower(end(explode('.', $_FILES['chooseFile']['name'])));
    if ($_FILES["chooseFile"]["size"] > 0 && $ext === 'csv') {
        $file = fopen($fileName, "r");
		$duplicate=array();
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            if(isset($column[1]) && $column[1]!="External Bussiness Client ID" && $column[1] && $column[1]!='')
			{
				$sele="select * from tbl_company where external_bussiness_id='".$column[1]."'";
				$check_query=mysqli_query($conn,$sele);
				if(mysqli_num_rows($check_query)==0)
				{
					$insert="insert into tbl_company set external_bussiness_id='".$column[1]."',company_name='".$column[2]."',country='".$column[3]."'";
					$run_query=mysqli_query($conn,$insert);
				}
				else 
				{
					$duplicate[]=$column[1]; 
				}
			}
		}
    }
	echo "<script>alert('CSV Imported');</script>";
	if(count($duplicate))
	{
		$ids_ex=implode(", ",$duplicate);
		echo "<script>alert('All this company already exists:- ".$ids_ex."');</script>";
	}
	echo "<script>window.location.href='companyupload.php';</script>";
	die;
}
else if(isset($_REQUEST['action']) && $_REQUEST['action']=='upload_package_csv')
{
	$user_id=$_POST['user_id'];
	$fileName = $_FILES["chooseFile"]["tmp_name"];
	
	$ext = strtolower(end(explode('.', $_FILES['chooseFile']['name'])));
    if ($_FILES["chooseFile"]["size"] > 0 && $ext === 'csv') {
        $file = fopen($fileName, "r");
		
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
			foreach($column as $key=>$values_n)
			{
				$column[$key]=trim($values_n);
			}
            if(isset($column[1]) && $column[1]!="Country" && $column[1] && $column[1]!='')
			{
				$sele="select * from tbl_packages where tracking_number='".$column[0]."'";
				$check_query=mysqli_query($conn,$sele);
				if(mysqli_num_rows($check_query)==0)
				{
					$sel_country="select * from tbl_company where company_name='".$column[2]."'";
					$check_query_sel=mysqli_query($conn,$sel_country);
					if(mysqli_num_rows($check_query_sel)==0)
					{
						echo "<p class='alert alert-danger'>Error: #$column[0] - Invalid Company Name!</p>";
					}
					else if($column[3]!='Delivered' && $column[3]!='Lost')
					{
						echo "<p class='alert alert-danger'>Error: #$column[0] - Invalid Remittance Name!</p>";
					}
					else if($column[5]!='Remitted' && $column[5]!='Not Remitted')
					{
						echo "<p class='alert alert-danger'>Error: #$column[0] - Invalid Remittance Status!</p>";
					}
					else 
					{
						$rows_data=mysqli_fetch_assoc($check_query_sel);
						$insert="insert into tbl_packages set tracking_number='".$column[0]."',country='".$column[1]."',company='".$rows_data['external_bussiness_id']."',remittance_type='".$column[3]."',remittance_amount='".$column[4]."',remittance_status='".$column[5]."',creator='".$user_id."',create_at='".date('Y-m-d H:i:s')."'";
						$run_query=mysqli_query($conn,$insert);
					}
				}
				else 
				{
					echo "<p class='alert alert-danger'>Error: #$column[0] - This Tracking id already exists.</p>";
				}
			}
		}
    }
	echo "<script>alert('CSV Imported');</script>";
	
	echo "<script>setTimeout(function(){ window.location.href='package_upload.php'; },10000);</script>";
	die;
}
else 
{
	echo "<p class='alert alert-danger'>Invalid Process!</p>";
	
	die;
}
?>
</div>
</div>
</div>
</div>