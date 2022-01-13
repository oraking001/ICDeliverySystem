<?php include('header.php');?>
<div class="page-content-wrapper" id="hub_edit" style="display:none;">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Create Hub</h1>
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="portlet-title">
                            Create Hub
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active in">
                                    
                                        <form role="form" method="POST" id="hub_form">
                                            <div class="row">
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Hub Name <sup>*</sup></label>
                                                <input type="text" class="form-control" id="hub_name" name="hub_name" required="">
                                            </div>                                            
                                            
                                        </div>
                                        <div class="row"></div>
                                        <div class="row">
                                             <div class="col-xs-12 text-right flow-buttons-2">
                                             <!--   <a href="dashboard.php" class="btn btn-default btn-cancel">Cancel</a> -->
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
            <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>

 <!-- BEGIN CONTENT -->

            <div class="page-content-wrapper" id="hub_list_data">

                <!-- BEGIN CONTENT BODY -->

                <div class="page-content">

                    <!-- BEGIN PAGE HEAD-->

                    <div class="row page-head">



                        <div class="page-title col-md-8">

                            <h1>Manage Hub</h1>

                        </div>
                        
                        <div class="test_json">
                            
                        </div>



                        <div class="col-md-2 dash">

                          <!--  <select class="form-control" id="country_options"> 
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
						<!--<a href="add_hub.php" class="btn btn-primary import_buttons">Create Hub</a> -->
                        <table class="table table-checkable table-bordered table-hover table-responsive" id="hub_table">

                            <thead>

                                <tr>

                                    <th> Hub Name</th>

                                                                               
                                    <th> Action</th>  
                                </tr>

                            </thead>

                            <tbody id="hub_list">

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
                url: "dm_api/Hub/get_data",
                data: {
                    table_name: 'tbl_hub',
                },
                dataType: "JSON",
                async: false,
                success: function(data) {console.log("Result:", data);
                    $("#hub_table").dataTable().fnDestroy();
                    var data = eval(data);
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<tr>' +
                        '<td id="hubname_' + data[i].id + '">' + data[i].hub_name + '</td>' +
                        '<td><button type="button" name="edit" class="edit_data  btn btn-xs btn-success" id="' + data[i].id + '"><i class="fa fa-edit"></i></button>';
                        html += '</tr>';
                    }
                    $('#hub_list').html(html);
                    $('#hub_table').DataTable({});
                }
            });
        }

        // function to get data back to form for edit
        $(document).on("click", ".edit_data", function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            var hub_name = $('#hubname_'+id).html();

            $('#save_update').val(id);
            $('#hub_name').val(hub_name);
        
            $('#hub_edit').show();
            $('#hub_list_data').hide();
        });

 //function to update data
        $(document).on("submit", "#hub_form", function(e) {
        e.preventDefault();
        var hub_name = $('#hub_name').val();
        var save_update = $('#save_update').val();

        $.ajax({
            type: "POST",
            url: "dm_api/Hub/update_data",
            data: {
                hub_name: hub_name,
                save_update: save_update,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log("Res:"+data);
                if(data == 1){
                    //alert("Recoed Saved Successfully!");
                    successTost("Record Saved Successfully!");
                    $('#hub_form').trigger("reset");
                    $('#hub_edit').hide();
                    $('#hub_list_data').show();
                    $('#save_update').val('');
                    datashow();
                }else{
                   // alert("Problem in Save Data!");
                    errorTost("Problem in Save Data!");
                }
            }
        });
    });
    });
</script>