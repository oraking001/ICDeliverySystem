<?php include('header.php');?>
<style>
.extra {
		display: none;
	}
	tr.hide_all > td, td.hide_all{
        border-style:hidden;
      }
.left{
    text-align:left;
    padding-left:10px;
}
</style>
<script type="text/javascript">
	function toggleSibling(sibling){
		sibling = sibling.nextSibling;
		while(!/tr/i.test(sibling.nodeName)){
			sibling = sibling.nextSibling;
		}
		sibling.style.display = sibling.style.display == 'table-row' ? 'none' : 'table-row';
	}
	</script> 
 <!-- BEGIN CONTENT -->

            <div class="page-content-wrapper">

                <!-- BEGIN CONTENT BODY -->

                <div class="page-content">

                    <!-- BEGIN PAGE HEAD-->

                    <div class="row page-head">



                        <div class="page-title col-md-8">

                            <h1>Transit Bag</h1>

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

                    <div class="hub-management-table table-responsive">
                    <a href="create_transitbag.php" class="btn btn-primary import_buttons" style="margin-bottom:10px;">Create Transit bag</a>
						<a href="create_driversheet.php" class="btn btn-primary import_buttons" style="margin-bottom:10px;">Create Driver Sheet</a>
            <div style="float:right;">
            <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for Transit Bag.." title="Type in a Transit Bag">        
            </div>
                        <table class="table table-checkable table-bordered table-hover table-responsive" id="transit_table">

                            <thead>
								<tr>
									<th style="width:15%;">TransitBag</th>
									<th>Origin Hub</th>
									<th>Destination Hub</th>
									<th>Number of Packages</th>
									<th>Created Date</th>                                             
									<th>Created By</th> 
									<th>Dispatched Date</th>
									<th>Dispatched By</th>
									<th>Status</th>
									<th>Action</th>
                                </tr>

                            </thead>

                            <tbody id="transit_data">

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

                <form method="POST" id="print_form" action="dm_api/Transitbag/print_list" target="_blank">
                  <input type="hidden" id="transit_bag1" name="transit_bag1" value="">
                </form>
                <form method="POST" id="print_bag_form" action="dm_api/Transitbag/print_data" target="_blank">
                  <input type="hidden" id="transit_bag" name="transit_bag" value="">
                </form>
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

 $(document).ready(function (){
    $.holdReady( true );
    //function to list data into table
    datashow();
    function datashow(){
         $.ajax({
             type: "POST",
             url: "dm_api/Transitbag/get_data",
             data: {
                 table_name: 'tbl_delivery',
             },
             dataType: "JSON",
             async: false,
             success: function(data) {console.log("Result:", data);
               // $("#transit_table").dataTable().fnDestroy();
                 var data = eval(data);
                 var html = '';
                 for (var i = 0; i < data.length; i++) {
                   var status = '';
                   var cls ='';
                   if(data[i].status == 1){
                        status = 'INtransit';
                         cls = 'label label-primary';
                   }
                   
                     html += '<tr onclick="toggleSibling(this)">' +
                     '<td><a id="'+data[i].transit_bag+'" class="receipt">'+ data[i].transit_bag + '</a></td>' +
                     '<td>' + data[i].hub_name + '</td>' +
                     '<td>' + data[i].destination_hub + '</td>' +
                     '<td>' + data[i].tracking_details.length + '</td>' +
                     '<td>' + data[i].Created_at + '</td>' +
                     '<td>' + data[i].sau_name + '</td>' +
                     '<td>' + data[i].updated_at + '</td>' +
                     '<td>' + data[i].sau_name + '</td>' +
                     '<td id="status_' + data[i].id + '"><span class="'+cls+'" style="color:#000000;">' + status + '</span></td>' +
                     '<td><button type="button" name="edit" class="print_data  btn btn-xs btn-success" id="' + data[i].transit_bag + '"><i class="fa fa-print"></i></button></td>' +
                     '</tr>' +
                     '<tr class="extra hide_all">' +
                              '<td colspan="10">' +
                              '<table  cellspacing="0" width="100%" border="1">' +
                              '<thead>' +
                              '<tr>' +
                              '<th width="10%"><center>Tracking No</center></th>' +
                              '<th><center>Logistic Type</center></th>' +
                              '<th><center>Vendor Name</center></th>' +
                              '<th><center>Package Type</center></th>' +
                              '<th><center>Origin Hub</center></th>' +
                              '<th><center>Weight</center></th>' +
                              '<th><center>Shipping Fee</center></th>' +
                              '<th><center>Destination City</center></th>' +
                              '<th><center>Status</center></th>' +
                              '</tr>' +
                              '</thead>' +
                              '<tbody>' ;
                     var trc_details = data[i].tracking_details;
                    for (var j = 0; j < trc_details.length; j++) {
                      var status = '';
                      if(trc_details[j].status == 1){
                          status = 'INTransit';
                      }
                      html += '<tr class="bag_'+data[i].transit_bag+'">' +
                                '<td>ICL' + trc_details[j].receipt_no + '</td>' +
                                '<td>' + trc_details[j].logi_type + '</td>' +
                                '<td>' + trc_details[j].vendor_name + '</td>' +
                                '<td>' + trc_details[j].pack_type + '</td>' +
                                '<td>' + trc_details[j].hub_name + '</td>' +
                                '<td>' + trc_details[j].pack_weight + '</td>' +
                                '<td>' + trc_details[j].shipping_fee + '</td>' +
                                '<td>' + trc_details[j].city_name + '</td>' +
                                '<td><b>' + status + '</b></td>' +
                                '</tr>' ;
                                
                    }
                     html += '</tbody>' +
                                '</table>' +
                                '</td>' +
                                '</tr>' ;
                
                 }
                 $('#transit_data').html(html);
               // $('#transit_table').DataTable({});
             }
         });
        }

        // $(document).on("click", ".receipt", function(e) {
        //     e.preventDefault();
        //     var transit_bag = $(this).attr('id');
        //     $('#transit_bag1').val(transit_bag);
        //     $('#print_form').trigger('submit');
        // });

        $(document).on("click", ".print_data", function(e) {
            e.preventDefault();
            var transit_bag = $(this).attr('id');
            $('#transit_bag').val(transit_bag);
            $('#print_bag_form').trigger('submit');
        });

        
 });

 function myFunction() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value;
          table = document.getElementById("transit_table");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
                $('.bag_'+filter).show();
              }
            }       
          }
         
        }

</script>