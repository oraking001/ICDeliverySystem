<?php include('header.php');
$user_id = $_GET['id'];
$url = 'http://localhost/finz/dm_api/Api/edit_User/'.$user_id;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

$array_json = (array)json_decode($result);


if(isset($_POST['save']))
 {
    $newArray = $_POST;
$url = 'http://localhost/finz/dm_api/Api/update_User';
$data_string = json_encode($newArray);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
//echo $result; die;
$array_json = (array)json_decode($result,true);
if($array_json){
    echo '<script language="javascript">';
    echo 'alert("'.$array_json["message"].'");';
    echo 'window.location.replace("http://localhost/finz/user_list.php");';//not showing an alert box.   
    echo '</script>';
    }
}
?>
<link rel="stylesheet" href="assets/multiselect/bootstrap-formhelpers.min.css" type="text/css">
<link rel="stylesheet" href="assets/multiselect/bootstrap-multiselect.css" type="text/css">
<link rel="stylesheet" href="assets/multiselect/multisel.css" type="text/css">
<!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>USER MANAGEMENT</h1>
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="portlet-title">
                            Create Users
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active in">
                                    
                                        <form role="form" id="user_edit" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Full Name<sup>*</sup></label>
                                                <input type="text" class="form-control" name="full_name" required="" value="<?php echo $array_json['sau_FName'];?>">
                                            </div>                                            
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Email <sup>*</sup></label>
                                                <input type="email" class="form-control" name="email" required="" value="<?php echo $array_json['sau_name'];?>">
                                            </div>
                                                                                
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Phone Number</label>
                                                <input type="text" class="form-control" name="phone_number" value="<?php echo $array_json['sau_PhoneNo']; ?>">
                                            </div>
                                          
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Address</label>
                                                <input type="textarea" class="form-control" name="address" value="<?php echo $array_json['user_address']; ?>">
                                            </div>  

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">User Type</label>
                                                <select class="bs-select form-control" name="user_type" id="user_type">
                                                    <option <?php if($array_json['user_type']==0) echo "selected"; ?> value="0">Admin</option>
                                                    <option <?php if($array_json['user_type']==1) echo "selected"; ?> value="1">EXE Assosicate</option>
                                                    <option <?php if($array_json['user_type']==2) echo "selected"; ?> value="2">Finance Assosicate</option>
                                                </select>
                                            </div>
                                   
                                           
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Country <sup>*</sup></label>
												<select name="country" required class="form-control" >
												<option value="">Country</option>
												<?php 
                                                $url = 'http://localhost/finz/dm_api/Api/country_list';
												$ch = curl_init($url);
												curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
												curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
												$result_country = curl_exec($ch);
												curl_close($ch);
												$array_json_country = json_decode($result_country,true);
												foreach($array_json_country['country_data'] as $county)
												{
													?>
													<option <?php if($county['country_code']==$array_json['country']){ echo "selected"; } ?> value="<?php echo $county['country_code']; ?>"><?php echo $county['country_name']; ?></option>
													<?php
												}
												?>
												</select>
                                            </div> 
                                            <!-- <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Hubs<sup>*</sup></label>
                                                <select id="hubs" name="hubs[]" multiple="" class="form-control" required>
                                                   
                                                </select>
                                            </div> 
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Access Tabs<sup>*</sup></label>
                                                <select id="tabs" name="tabs[]" multiple="" class="form-control" required>
                                                    <option value="1">Overview</option>
                                                    <option value="2">Create Delivery</option>
                                                    <option value="3">At the Hub</option>
                                                    <option value="4">Receive</option>
                                                    <option value="5">Finance</option>
                                                    <option value="6">Transit Bag</option>
                                                    <option value="7">Hub Management</option>
                                                    <option value="8">City Management</option>
                                                    <option value="9">Uploads</option>
                                                    <option value="10">Tier Management</option>
                                                    <option value="11">Zone Management</option>
                                                    <option value="12">Client Management</option>
                                                    <option value="13">Vendor Management</option>
                                                    <option value="14">User Management</option>
                                                </select>
                                            </div>  -->
                                                                           
                                            </div>

                                            
                                            </div>
                                        <div class="row">
                                             <div class="col-xs-12 text-right">
                                                <!-- <button type="button" class="btn btn-default btn-cancel">cancel</button> -->
                                                <input type="reset" class="btn btn-default btn-cancel" value="Cancel">
                                                <button type="submit" name="save" class="btn btn-success btn-save">Save</button>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                
                           
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                       
                        <!-- END PAGE TOOLBAR -->
                    
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <!-- <div class="m-heading-1 border-green m-bordered">
                        <h3>DataTables ColReorder Extension</h3>
                        <p> ColReorder adds the ability for the end user to be able to reorder columns in a DataTable through a click and drag operation. This can be useful when presenting data in a table, letting the user move columns that they wish to compare
                            next to each other for easier comparison. </p>
                        <p> For more info please check out
                            <a class="btn red btn-outline" href="http://datatables.net/extensions/colreorder/" target="_blank">the official documentation</a>
                        </p>
                    </div> -->
                    
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
            <!-- END CONTENT -->

            <?php include('footer.php');?>
            <script type="text/javascript" src="assets/multiselect/bootstrap-multiselect.js"></script>
<script type="text/javascript" src="assets/multiselect/bootstrap-formhelpers.min.js"></script>
<script type="text/javascript" src="assets/multiselect/multisel.js"></script>
<script>
$('#hubs').multiselect({
		    enableCaseInsensitiveFiltering: true,
            includeSelectAllOption: false,
			buttonWidth: '100%'
        });

        $('#tabs').multiselect({
			enableCaseInsensitiveFiltering: true,
            includeSelectAllOption: false,
			buttonWidth: '100%'
        });
        $('#tabs').multiselect('rebuild');
 //function to fill dropdown
 fillDropdown('hubs','tbl_hub');

function fillDropdown(id,table){
    $('#'+id).html('');
    $.ajax({
        type: "POST",
        url: "dm_api/Delivery/get_dropdown",
        data: {
            table_name: table,
        },
        dataType: "JSON",
        async: false,
        success: function(data) {console.log("Result:", data);
            var data = eval(data);
            var html = '';//'<option value="" selected>select</option>';
            for (var i = 0; i < data.length; i++) {
               
                    name = data[i].hub_name;
               
                html += '<option value="'+data[i].id+'">'+name+'</option>';
            }
            $('#'+id).html(html);
            $('#'+id).multiselect('rebuild');
        }
    });
}

</script>
            