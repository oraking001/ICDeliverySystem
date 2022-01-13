<?php include('header.php');?>

 <!-- BEGIN CONTENT -->

            <div class="page-content-wrapper">

                <!-- BEGIN CONTENT BODY -->

                <div class="page-content">

                    <!-- BEGIN PAGE HEAD-->

                    <div class="row page-head">



                        <div class="page-title col-md-8">

                            <h1>Overview</h1>

                        </div>
                        
                        <div class="test_json">
                            
                        </div>



                        <div class="col-md-2 dash">

                            <select class="form-control" id="country_options"> 
							</select>

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
					<a href="companyupload.php" class="btn btn-primary import_buttons">Import Company</a>
                        <table class="table table-checkable table-bordered table-hover table-responsive" id="sample_1">

                            <thead>

                                <tr>

                                    <th> Tracking No</th>

                                    <th> Logistic Type</th>

                                    <th> Package Type</th>

                                    <th> Status</th>    
                                    
                                    <th> Weight</th>  
                                    
                                    <th> Destination City</th>  
                                     
                                    <th> Current Hub</th>  
                                    
                                     <th> Action</th>  

                                </tr>

                            </thead>

                            <tbody>

                          </tbody>

                        </table>

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
                $.ajax({
                type: "GET",
                url: "http://finz.opmovings.com/dm_api/Api/country_list",
                dataType: 'json',
                success: function( data ) {
                var i=0;                
                if(data.country_data.length>0){
                    $.each(data.country_data,function(key, value){ 
                        if(i==0){
                             $('#country_options').append('<option value="">Hub</option>');
                             getcustomer_list_all();
                        }
                        $('#country_options').append('<option value='+data.country_data[i].country_code+'>'+data.country_data[i].country_name+' - '+data.country_data[i].country_code+'</option>');
                         i++;
                    });                 
                    }
                }
            }); 
        }
    });



</script>



<script type="text/javascript">    
        $('select').on('change', function() {
          var id = this.value;          
                    var table = $('#sample_2').DataTable();
                    table
                        .clear()
                        .draw();
                   getcustomer_list_all();
        });
</script>

<script type="text/javascript">

 function getcustomer_list_all(){
        var country_id = $('#country_options').find(":selected").val();
        $('#loadingmessage').show();
		if(!country_id)
		{
			country_id='';
		}
        var url="http://finz.opmovings.com/dm_api/Api/company_list/"+country_id;
        $.getJSON(url,function(data){
           console.log(data.customer_data);
           // var package_List=[];
           i=0;
           var table_data = data.customer_data;
           var table = $('#sample_2').DataTable( {
            destroy: true,
            data: table_data,
                "pagingType": "full_numbers",
                "order": [[ 0, "asc" ]],
                   lengthMenu: [
                        [ 10, 25, 50, -1 ],
                        [ '10', '25', '50', 'All' ]
                    ],
                    dom: 'lBfrtip',
                     buttons: [
                        'csv','pdf'
                    ],
             "columns": [
                { "data": "srno" } ,
                { "data": "external_bussiness_id" },
                { "data": "company_name" },
                { "data": "country" }
                ],  
            }); 
            $('#loadingmessage').hide();
       
        });
     

 }


 </script>