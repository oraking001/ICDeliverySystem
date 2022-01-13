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

                            <h1>Packages</h1>

                        </div>
                        

                        <div class="col-md-4 dash" align="right">

                        <!-- <input type="button" id="export" value="Export Csv" class="btn btn-success"/> -->

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
                    <div class="col-md-4">
						<a href="create_transitbag.php" class="btn btn-primary import_buttons" style="margin-bottom:10px;">Create Transit bag</a>
						<a href="create_driversheet.php" class="btn btn-primary import_buttons" style="margin-bottom:10px;">Create Driver Sheet</a>
                    </div>
                        <div class="col-md-4" style="margin-top:20px;">
                        
                            <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for Tracking Number.." title="Type in a Tracking Number">        
           
                        </div>
                        <div class="col-md-4" style="float:right;margin-bottom:10px;">
                        <label class="control-label">Select Hub</label>
                                                <select class="form-control fstdropdown-select" name="hub" id="hub">
                                                    
                                                </select>
                        </div>
                        <table class="table table-checkable table-bordered table-hover table-responsive" id="delivery_table">

                            <thead>

                                <tr>
									<th style="width:10%;">Tracking No</th>
									<th>Logistic Type</th>
									<th>Vendor Name</th>
									<th>Package Type</th>
									<th>Origin Hub</th>
								    <th>Weight</th>
									<th>Destination City</th>                                             
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>

                            </thead>

                            <tbody id="delivery_list">

                          </tbody>

                        </table>

                    </div>

                    

                    <!-- END PAGE BASE CONTENT -->

                </div>
                <form method="POST" id="print_form" action="dm_api/Delivery/print_data" target="_blank">
                  <input type="hidden" id="vendorId" name="vendorId" value="">
                </form>
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
        <script type="text/javascript" src="assets/table2csv.js"></script>
         

<script type="text/javascript">
    $(document).ready(function (){
     $.holdReady( true );
     function toggleSibling(sibling){
            sibling = sibling.nextSibling;
            while(!/tr/i.test(sibling.nodeName)){
                sibling = sibling.nextSibling;
            }
            sibling.style.display = sibling.style.display == 'table-row' ? 'none' : 'table-row';
	    }
     //function to list data into table
     datashow(hub_id='');
        function datashow(hub_id){
            $.ajax({
                type: "POST",
                url: "dm_api/Delivery/get_data",
                data: {
                    table_name: 'tbl_delivery',
                    hub_id: hub_id,
                },
                dataType: "JSON",
                async: false,
                success: function(data) {console.log("Result:", data);
                  //  $("#delivery_table").dataTable().fnDestroy();
                    var data = eval(data);
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                    if(data[i].status == 0 || data[i].status == 1 || data[i].status == 2){
                        var status = '';
                        if(data[i].status == 0){
                            status = 'pending';
                            cls = 'label label-warning';
                        }
                        if(data[i].status == 1){
                         status = 'INtransit';
                         cls = 'label label-primary';
                     }
                     if(data[i].status == 2){
                            status = 'At The Hub';
                            cls = 'label label-success';
                        }
                        html += '<tr onclick="toggleSibling(this)">' +
                        '<td id="receipt_' + data[i].id + '"><a id="'+data[i].id+'" class="receipt">ICL'+ data[i].receipt_no + '</a></td>' +
                        '<td id="logistictype_' + data[i].id + '">' + data[i].logi_type + '</td>' +
                        '<td id="vendorname_' + data[i].id + '">' + data[i].vendor_name + '</td>' +
                        '<td id="packagetype_' + data[i].id + '">' + data[i].pack_type + '</td>' +
                        '<td id="hub_' + data[i].id + '">' + data[i].hub_name + '</td>' +
                        '<td id="weight_' + data[i].id + '">' + data[i].pack_weight + '</td>' +
                        '<td id="city_' + data[i].id + '">' + data[i].city_name + '</td>' +
                        '<td id="status_' + data[i].id + '"><span class="'+cls+'" style="color:#000000;">' + status + '</span></td>' +
                        '<td><button type="button" name="edit" class="print_data  btn btn-xs btn-success" id="' + data[i].id + '"><i class="fa fa-print"></i></button></td>';
                        html += '</tr>' +
                                '<tr class="extra hide_all">' +
                                '<td colspan="9">' +
                                '<table  cellspacing="0" width="100%">' +
                                '<tbody>' +
                                '<tr>' +
                                '<td style="text-align:left;padding:10px;width:30%;">Receiver Name: '+data[i].rec_name+'</td>' +
                                '<td style="text-align:left;padding:10px">Shipping Fee: '+data[i].shipping_fee+'</td>' +
                                '<td style="text-align:left;padding:10px">Transit Bag: '+data[i].transit_bag+'</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td style="text-align:left;padding:10px">Receiver Phone: '+data[i].rec_phone+'</td>' +
                                '<td style="text-align:left;padding:10px">Amount to Collect: '+data[i].collect_amt+'</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td style="text-align:left;padding:10px">Receiver Address: '+data[i].rec_address+'</td>' +
                                '<td style="text-align:left;padding:10px">Created At: '+data[i].Created_at+'</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td style="text-align:left;padding:10px">Package Desription: '+data[i].pack_desc+'</td>' +
                                '<td style="text-align:left;padding:10px">Created By: '+data[i].sau_name+'</td>' +
                                '</tr>' +
                                '</tbody>' +
                                '</table>' +
                                '</td>' +
                                '</tr>';
                
                    }   
                        
                    }
                    $('#delivery_list').html(html);
                  //  $('#delivery_table').DataTable({});
                }
            });
        }

        $(document).on("click", ".print_data", function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            $('#vendorId').val(id);
            $('#print_form').trigger('submit');
        });

        //function to fill dropdown
    fillDropdown('hub','tbl_hub');
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
                var html = '<option value="" selected>select</option>';
                for (var i = 0; i < data.length; i++) {
                    
                        name = data[i].hub_name;
                 
                    html += '<option value="'+data[i].id+'">'+name+'</option>';
                }
                $('#'+id).html(html);
            }
        });
    }

    $(document).on("change", "#hub", function(e) {
            e.preventDefault();
        var hub_id = $('#hub').val();
        datashow(hub_id);
    });

    $(document).on("click", "#export", function(e) {
            e.preventDefault();
            $("table").table2csv('output', {
               appendTo:'#out',
               filename:'Packages_list.csv'
            });

    });
});
function myFunction() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value;
          console.log("Filter:",filter);
          table = document.getElementById("delivery_table");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.indexOf(filter) > -1) {
                tr[i].style.display = "";
                //$('.ICL'+filter).removeAttr("style");
              } else {
                tr[i].style.display = "none";
                //$('.ICL'+filter).show();
                $('#ICL'+filter).removeAttr("style")
              }
            }       
          }
          
        }
</script>
