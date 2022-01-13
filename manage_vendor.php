<?php include('header.php');?>

 <!-- BEGIN CONTENT -->

            <div class="page-content-wrapper">

                <!-- BEGIN CONTENT BODY -->

                <div class="page-content">

                    <!-- BEGIN PAGE HEAD-->

                    <div class="row page-head">



                        <div class="page-title col-md-8">

                            <h1>Packages</h1>

                        </div>
                        
                        <div class="test_json">
                            
                        </div>



                        <div class="col-md-2 dash">

                        <!--    <select class="form-control" id="country_options"> 
							</select> -->

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
						
						 <table class="table table-checkable table-bordered table-hover table-responsive" id="vendor_table">

                            <thead>

                                <tr>
									<th>Vendor Name</th>
									<th>Vendor Phone</th>
									<th>Vendor Email</th>
                                </tr>

                            </thead>

                            <tbody id="vendor_list">

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
     //function to list data into table
     datashow();
        function datashow(){
            $.ajax({
                type: "POST",
                url: "dm_api/Delivery/get_dropdown",
                data: {
                    table_name: 'tbl_vendor',
                },
                dataType: "JSON",
                async: false,
                success: function(data) {console.log("Result:", data);
                    $("#vendor_table").dataTable().fnDestroy();
                    var data = eval(data);
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        
                        html += '<tr>' +
                        '<td id="name_' + data[i].id + '">'+ data[i].vendor_name + '</td>' +
                        '<td id="phone_' + data[i].id + '">' + data[i].vendor_phone + '</td>' +
                        '<td id="email_' + data[i].id + '">' + data[i].vendor_email + '</td>';
                         html += '</tr>';
                    }
                    $('#vendor_list').html(html);
                    $('#vendor_table').DataTable({});
                }
            });
        }
    });
</script>
