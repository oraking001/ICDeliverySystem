<?php include('header.php');

$user_id = $_GET['id'];
$url = 'http://finz.opmovings.com/dm_api/Api/edit_User/'.$user_id;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

$array_json = (array)json_decode($result);
// echo '<pre>';
// print_r($array_json);

if(isset($_POST['save']))
 {
$newArray = $_POST;
$url = 'http://finz.opmovings.com/dm_api/Api/change_Password';
$data_string = json_encode($newArray);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$result;
$array_json = (array)json_decode($result,true);
if($array_json){
    echo '<script language="javascript">';
    echo 'alert("'.$array_json["message"].'");';
    echo 'window.location.replace("http://finz.opmovings.com/user_list.php");';//not showing an alert box.   
    echo '</script>';
    }
}
?>

<!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>PASSWORD SETTING</h1>
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="portlet-title">
                            Change Users Password( For : <?php echo $array_json['sau_FName'];?>)
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active in">
                                    
                                        <form role="form" id="password_change" method="POST">
                                            <div class="row">
                                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">New Password<sup>*</sup></label>
                                                <input type="password" class="form-control" id="password" name="password" required="" value="">
                                            </div>                                            
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Confirm Password <sup>*</sup></label>
                                                <input type="password" class="form-control" name="confirm_password" required="" value="">
                                            </div>
                                                                                                     
                                            </div>     
                                            
                                            </div>
                                        <div class="row">
                                             <div class="col-xs-12 text-right">
                                                <button type="button" class="btn btn-default btn-cancel">cancel</button>
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
            <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
            
            <script type="text/javascript">
$(document).ready(function () {

$('#password_change').validate({ // initialize the plugin
    rules: {
        password: {
            required: true,
            pwcheck: true,
            minlength: 8
        },
        confirm_password:{
            required: true,
            equalTo: "#password"
        }

    },
    messages: {
                  password: {
                        required: "Password Is Reqiired field",
                        pwcheck: "<div style='color:red'>At least one LOWER CHARACTER, at least one UPPER CHARACTER And at least one NUMBER is Required</div>",
                        minlength: "password minimum length must be 8 character"
                    },
                    confirm_password: {
                        required: "Confirm password is required field",
                        equalTo: "Must be equal to the password field."
                    }
                    
                },
    // submitHandler: function (form) { // for demo
    //     alert('valid form submitted'); // for demo
    //     return false; // for demo
       
    // }
});

 $('#password_change input').on('keyup blur', function () {
        if ($('#password_change').valid()) {
            $('button.btn').prop('disabled', false);
        } else {
            $('button.btn').prop('disabled', 'disabled');
        }
    });

 $.validator.addMethod("pwcheck", function(value) {
   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
       && /[a-z]/.test(value) // has a lowercase letter
       && /\d/.test(value) // has a digit
});


});


            </script>