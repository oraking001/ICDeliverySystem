<?php include('header.php');?>

 <!-- BEGIN CONTENT -->

            <div class="page-content-wrapper">

                <!-- BEGIN CONTENT BODY -->

                <div class="page-content">

                    <!-- BEGIN PAGE HEAD-->

                    <div class="row page-head">



                        <div class="page-title col-md-8">

                            <h1>Create Remittance Statement</h1>

                        </div>
                        
                        <div class="test_json">
                            
                        </div>

 

                    </div>
                    
                    <div id='loadingmessage' style='display:none' class="text-center">
                          <img src='samples/loader.gif'/>
                        </div>

                    <!-- END PAGE HEAD-->

                    <!-- BEGIN PAGE BREADCRUMB -->

                   

                    <!-- END PAGE BREADCRUMB -->

                    <!-- BEGIN PAGE BASE CONTENT -->

                    <div class="hub-management-table">
						<form action="http://finz.opmovings.com/dm_api/Api/add_remittance" method="POST">
						  <div class="form-group">
							<input type="hidden" required name="user_id" id="package_userids" value="" />
							<label>Select Country:</label>
							<select class="form-control" name="country" required id="country_options"> 
							</select>
						  </div>
						  <div class="form-group">
							<label>Select Company:</label>
							<select class="form-control" name="company" required id="company_options"> 
							</select>
						  </div>
						  <div class="form-group">
							<label>Remittance Type:</label>
							<select class="form-control" name="remittance_type" > 
								<option value="">Select a Type</option>
								<option>Delivered</option>
								<option>Lost</option>
							</select>
						  </div>
						  <button type="submit" class="btn btn-primary">Create Statement</button>
						</form>
						
                    </div>

                    

                    <!-- END PAGE BASE CONTENT -->

                </div>

                <!-- END CONTENT BODY -->

            </div>

            <!-- END CONTENT -->

            <!-- BEGIN QUICK SIDEBAR -->

            <a href="javascript:;" class="page-quick-sidebar-toggler">

                <i class="icon-login"></i>

            </a>

      

            <!-- END QUICK SIDEBAR -->

        </div>

        <!-- END CONTAINER -->

        <?php include('footer.php');?>        

         

<script type="text/javascript">
    $(document).ready(function (){
    $.holdReady( true );
    if (window.localStorage.getItem("firstname")==null) {
        window.location.replace("http://finz.opmovings.com/index.php");
        return false;
    } 
	else
	{
			$('#package_userids').val(window.localStorage.getItem("firstname"));
            $.ajax({
                type: "GET",
                url: "http://finz.opmovings.com/dm_api/Api/country_list",
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
			
			$.ajax({
                type: "GET",
                url: "http://finz.opmovings.com/dm_api/Api/company_dataoption",
                dataType: 'json',
                success: function( data ) {
                var i=0;                
                if(data.company_data.length>0){
                    $.each(data.company_data,function(key, value){ 
                        $('#company_options').append('<option value='+data.company_data[i].company+'>'+data.company_data[i].company_name+'</option>');
                         i++;
                    });                 
                    }
                }
            });
        }
    });



</script>
