<?php include('header.php');?>
<!-- BEGIN CONTENT -->
<link rel="stylesheet" href="assets/multiselect/bootstrap-formhelpers.min.css" type="text/css">
<link rel="stylesheet" href="assets/multiselect/bootstrap-multiselect.css" type="text/css">
<link rel="stylesheet" href="assets/multiselect/multisel.css" type="text/css">
<!-- <?php 
// if(isset($_POST['save']))
//  {

// $newArray = $_POST;
// $url = 'http://localhost/dm_api/Api/create_User';
// $data_string = json_encode($newArray);

// $ch = curl_init($url);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $result = curl_exec($ch);
// curl_close($ch);
// $array_json = (array)json_decode($result,true);
// print_r($array_json);
// if($array_json){
//     echo '<script language="javascript">';
//     echo 'alert("'.$array_json["message"].'");';
//     echo 'window.location.replace("http://localhost/user_list.php");';//not showing an alert box.   
//     echo '</script>';
//     }
//  }


?> -->

            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Create Delivery</h1>
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="portlet-title">
                            Create Users
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active in">
                                    
                                        <form role="form" method="POST" id="user_form">
                                            <div class="row">
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Full Name <sup>*</sup></label>
                                                <input type="text" class="form-control" id="full_name" name="full_name" required="">
                                            </div>                                            
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Email <sup>*</sup></label>
                                                <input type="email" class="form-control" id="email" name="email" required="">
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Password<sup>*</sup></label>
                                                <input type="password" id="password" class="form-control" id="password" name="password" required="">
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Confirm Password<sup>*</sup></label>
                                                <input type="password"  class="form-control" id="confirm_pass" name="confirm_password" required="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Phone Number</label>
                                                <input type="text" class="form-control" id="phone_number" name="phone_number">
                                            </div>
                                          
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Address</label>
                                                <input type="textarea" class="form-control" id="address" name="address">
                                            </div>  
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">User Type</label>
                                                <select class="bs-select form-control" name="user_type" id="user_type">
                                                    <option value="0">Admin</option>
                                                    <option value="1">EXE Assosicate</option>
                                                    <option value="2">Finance Assosicate</option>
                                                    <option value="3">Driver</option>
                                                </select>
                                            </div>
                                   
                                           
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Country<sup>*</sup></label>
                                                 <select class="form-control" required name="country" id="country_options"> 
												 </select>

                                            </div> 

                                          </div>
                                          <div class="row">
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Hubs<sup>*</sup></label>
                                                <select id="hubs" name="hubs" multiple="" class="form-control" required>
                                                   
                                                </select>
                                            </div> 
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Access Tabs<sup>*</sup></label>
                                                <select id="tabs" name="tabs" multiple="" class="form-control" required>
                                                    <option value="15">Driver delivery</option>
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
                                            </div> 
                                          </div>
                                        <div class="row">
                                            
                                          
                                             <div class="col-xs-12 text-right flow-buttons-2">
                                                <!-- <a href="dashboard.php" class="btn btn-default btn-cancel">Cancel</a> -->
                                                <input type="reset" class="btn btn-default btn-cancel" value="Cancel">
                                                <input type="submit" name="save" value="Save" class="btn btn-success" />
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                       
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
<script type="text/javascript" src="assets/js/myjs/create_user.js"></script>
<script type="text/javascript">
    $(document).ready(function (){
    $.holdReady( true );
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
    if (window.localStorage.getItem("firstname")==null) {
        window.location.replace("http://localhost/index.php");
        return false;
    } 
	else
	{
                $.ajax({
                type: "GET",
                url: "dm_api/Api/country_list",
                dataType: 'json',
                success: function( data ) {
                var i=0;                
                if(data.country_data.length>0){
                    $.each(data.country_data,function(key, value){ 
                        if(i==0){
                             $('#country_options').append('<option value="">Country</option>');
                        }
                        $('#country_options').append('<option value='+data.country_data[i].country_code+'>'+data.country_data[i].country_name+' - '+data.country_data[i].country_code+'</option>');
                         i++;
                    });                 
                    }
                }
            }); 
        }

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


    });



</script>