<?php include('header.php');?>
<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content" id="zone_edit" style="display:none;">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Update Zone</h1>
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="portlet-title">
                            Update Zone
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active in">
                                    
                                        <form role="form" method="POST" id="zone_form">
                                            <div class="row">
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Zone Name<sup>*</sup></label>
                                                <input type="text" class="form-control" id="zone_name" name="zone_name" required="">
                                            </div>                                            
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Weight <sup>*</sup></label>
                                                <input type="text" class="form-control" id="zone_weight" name="zone_weight" pattern="[0-9]+" title="please enter number only" required="">
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            
                                          
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Amount <sup>*</sup></label>
                                                <input type="text" class="form-control" id="amount" name="amount" pattern="[0-9]+" title="please enter number only" required="">
                                            </div>
                                   
                                           

                                          </div>
                                        <div class="row">
                                            
                                          
                                             <div class="col-xs-12 text-right flow-buttons-2">
                                            <!--    <a href="dashboard.php" class="btn btn-default btn-cancel">Cancel</a> -->
                                                <input type="reset" class="btn btn-default btn-cancel" value="Cancel">
                                                <input type="submit" name="save" value="Save" class="btn btn-success" /> 
                                                <input type="hidden" name="save_update" id="save_update" value=""/>
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

 <!-- BEGIN CONTENT -->

            <div class="page-content-wrapper" id="zone_list_data">

                <!-- BEGIN CONTENT BODY -->

                <div class="page-content">

                    <!-- BEGIN PAGE HEAD-->

                    <div class="row page-head">



                        <div class="page-title col-md-8">

                            <h1>Manage Zone</h1>

                        </div>
                        
                        <div class="test_json">
                            
                        </div>



                        <div class="col-md-2 dash">

                         <!--   <select class="form-control" id="country_options"> 
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
						<a href="companyupload.php" class="btn btn-primary import_buttons" style="margin-bottom:10px;">Import Zone</a>
                        <table class="table table-checkable table-bordered table-hover table-responsive" id="zone_table">

                            <thead>

                                <tr>

                                    <th> Zone Name</th>

                                    <th> Weight</th>

                                    <th> Amount</th>

                                    <th> Action</th>                                             

                                </tr>

                            </thead>

                            <tbody id="zone_list">

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
                url: "dm_api/Zone/get_data",
                data: {
                    table_name: 'tbl_zone',
                },
                dataType: "JSON",
                async: false,
                success: function(data) {console.log("Result:", data);
                    $("#zone_table").dataTable().fnDestroy()
                    var data = eval(data);
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<tr>' +
                        '<td id="zonename_' + data[i].id + '">' + data[i].zone_name + '</td>' +
                        '<td id="weight_' + data[i].id + '">' + data[i].Weight + '</td>' +
                        '<td id="amount_' + data[i].id + '">' + data[i].Amount + '</td>' +
                        '<td><button type="button" name="edit" class="edit_data  btn btn-xs btn-success" id="' + data[i].id + '"><i class="fa fa-edit"></i></button>';
                        html += '</tr>';
                    }
                    $('#zone_list').html(html);
                    $('#zone_table').DataTable({});
                }
            });
        }

        // function to get data back to form for edit
        $(document).on("click", ".edit_data", function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            var zone_name = $('#zonename_'+id).html();
            var zone_weight = $('#weight_'+id).html();
            var amount = $('#amount_'+id).html();

            $('#save_update').val(id);
            $('#zone_name').val(zone_name);
            $('#zone_weight').val(zone_weight);
            $('#amount').val(amount);

            $('#zone_edit').show();
            $('#zone_list_data').hide();
        });

         //function to update data
        $(document).on("submit", "#zone_form", function(e) {
        e.preventDefault();
        var zone_name = $('#zone_name').val();
        var zone_weight = $('#zone_weight').val();
        var amount = $('#amount').val();
        var save_update = $('#save_update').val();

        $.ajax({
            type: "POST",
            url: "dm_api/Zone/update_data",
            data: {
                zone_name: zone_name,
                zone_weight: zone_weight,
                amount: amount,
                save_update: save_update,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log("Res:"+data);
                if(data == 1){
                    //alert("Recoed Saved Successfully!");
                    successTost("Record Saved Successfully!");
                    $('#zone_form').trigger("reset");
                    $('#zone_edit').hide();
                    $('#zone_list_data').show();
                    $('#save_update').val('');
                    datashow();
                }else{
                    //alert("Problem in Save Data!");
                    errorTost("Problem in Save Data!");
                }
            }
        });
    });
 });
</script>