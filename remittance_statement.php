<?php include('header.php');?>

 <!-- BEGIN CONTENT -->

            <div class="page-content-wrapper">

                <!-- BEGIN CONTENT BODY -->

                <div class="page-content">

                    <!-- BEGIN PAGE HEAD-->

                    <div class="row page-head">



                        <div class="page-title col-md-8">

                            <h1>Finance</h1>

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

                    <div class="hub-management-table table-responsive">
						<?php if(isset($_REQUEST['msg']) && $_REQUEST['msg']=='success'){ ?>
						<p class="alert alert-success">Remittance Statement Created.</p>
						<?php } 
						if(isset($_REQUEST['msg']) && $_REQUEST['msg']=='error'){ ?>
						<p class="alert alert-danger">Error! Something went wrong.</p>
						<?php } 
						if(isset($_REQUEST['msg']) && $_REQUEST['msg']=='update'){ ?>
						<p class="alert alert-success">Remittance Statement Updated.</p>
						<?php } 
						if(isset($_REQUEST['msg']) && $_REQUEST['msg']=='deleted'){ ?>
						<p class="alert alert-success">Deleted Remittance Statement.</p>
						<?php } 
						?>
						<a href="remittance_create.php" class="btn btn-primary import_buttons">Create Statement</a>
                        <table class="table table-checkable table-bordered table-hover table-responsive" id="sample_2">

                            <thead>
								<tr>
									<th>Driver Sheet</th>
									<th>Country</th>
									<th>Company Name</th>
									<th>Remittance Amount</th>
									<th>Remittance Type</th>
									<th>Statement Status</th>
									<th>Payment Reference#</th>
									<th>Payment Date</th> 
									<th>Creator</th>                                             
									<th>Created at</th>
									<th>Payment Editor</th>
									<th>Payment Edited at</th>
									<th>Action</th>
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
<div id="update_myremittance" class="modal fade" role="dialog">
  <div class="modal-dialog" style="background:white;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Statement</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="http://finz.opmovings.com/dm_api/Api/updates_remittance">
			<div class="form-group">
			<input type="hidden" required name="user_id" id="package_userids" value="" />
			<input type="hidden" required name="statement_id" id="package_statement_id" value="" />
			<label>Payment Reference#:</label>
			<input type="text" id="package_referene" class="form-control" name="package_referene" required /> 
			</select>
		   </div>
		   <div class="form-group">
			<label>Payment Date:</label>
			<input type="date" class="form-control" id="payment_date" name="payment_date" required /> 
			</select>
		   </div>
		   <button type="submit" class="btn btn-primary">Update Statement</button>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
        <!-- END CONTAINER -->

        <?php include('footer.php');?>        

         

<script type="text/javascript">
$(document).on('click','.remittance_btn_update',function(){
	$('#package_referene').val('');
	$('#payment_date').val('');
	var statement_id=$(this).data('val');
	$('#package_statement_id').val(statement_id);
	$('#update_myremittance').modal('show');
});
$(document).on('click','.btn_package_lists',function(){
	var statement_id=$(this).data('val');
	window.location.href="http://finz.opmovings.com/packages.php?statement="+statement_id;
	return false;
});

$(document).on('click','.remittance_btn_delete',function(){
	var statement_id=$(this).data('val');
	window.location.href="http://finz.opmovings.com/dm_api/Api/delete_remittance_statement/"+statement_id;
	return false;
});
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
                             getpackages_list_all();
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
                   getpackages_list_all();
        });
$(document).on('click','.delete_packages',function(){
	var package_id=$(this).data('id');
	window.location.href="http://finz.opmovings.com/dm_api/Api/delete_packages/"+package_id;
	return false;
});
</script>

<script type="text/javascript">

 function getpackages_list_all(){
        var country_id = $('#country_options').find(":selected").val();
        $('#loadingmessage').show();
		if(!country_id)
		{
			country_id='';
		}
        var url="http://finz.opmovings.com/dm_api/Api/remittance_list/"+country_id;
        $.getJSON(url,function(data){
           console.log(data.remittance_data);
           // var package_List=[];
           i=0;
           var table_data = data.remittance_data;
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
                { "data": "statement_id" } ,
                { "data": "country" },
                { "data": "company" },
                { "data": "remittace_amount" },
                { "data": "remittance_type" },
                { "data": "remittance_status" },
                { "data": "payment_reference" },
                { "data": "payment_date" },
                { "data": "creator" },
                { "data": "create_at" },
                { "data": "payment_editor" },
                { "data": "payment_edit_at" },
                { "data": "actions" }
                ],  
            }); 
            $('#loadingmessage').hide();
       
        });
     

 }


 </script>