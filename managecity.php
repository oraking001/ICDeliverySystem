<?php include('header.php');?>
<div class="page-content-wrapper" id="city_edit" style="display:none;">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Create City</h1>
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="portlet-title">
                            Create City
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active in">
                                    
                                        <form role="form" method="POST" id="city_form">
                                            <div class="row">
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">City Name <sup>*</sup></label>
                                                <input type="text" class="form-control" id="city_name" name="city_name" required="">
                                            </div>                                            
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Region <sup>*</sup></label>
                                                <input type="text" class="form-control" id="region" name="region" required="">
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Selct Tier</label>
                                                <select class="form-control fstdropdown-select" name="tier" id="tier" required>
                                                    
                                                </select>
                                            </div>
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Selct Zone</label>
                                                <select class="form-control fstdropdown-select" name="zone" id="zone" required>
                                                    
                                                </select>
                                            </div>
                                           
                                            

                                          </div>
                                        <div class="row">
                                            
                                          
                                             <div class="col-xs-12 text-right flow-buttons-2">
                                               <!-- <a href="dashboard.php" class="btn btn-default btn-cancel">Cancel</a> -->
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

            <div class="page-content-wrapper" id="city_list_data">

                <!-- BEGIN CONTENT BODY -->

                <div class="page-content">

                    <!-- BEGIN PAGE HEAD-->

                    <div class="row page-head">



                        <div class="page-title col-md-8">

                            <h1>Manage City</h1>

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
						<!-- <a href="companyupload.php" class="btn btn-primary import_buttons">Import City</a> -->
                        <table class="table table-checkable table-bordered table-hover table-responsive" id="city_table">

                            <thead>

                                <tr>

                                    <th> City Name</th>

                                    <th> Region</th>

                                    <th> Tier</th>
                                    <th style="display:none;"> Tier Id</th>

                                    <th> Zone</th>                                             
                                    <th style="display:none;"> Zone Id</th>                                             
                                    <th> Action</th>  
                                </tr>

                            </thead>

                            <tbody id="city_list">

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
                url: "dm_api/City/get_data",
                data: {
                    table_name: 'tbl_city',
                },
                dataType: "JSON",
                async: false,
                success: function(data) {console.log("Result:", data);
                    $("#city_table").dataTable().fnDestroy();
                    var data = eval(data);
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<tr>' +
                        '<td id="cityname_' + data[i].id + '">' + data[i].city_name + '</td>' +
                        '<td id="region_' + data[i].id + '">' + data[i].region + '</td>' +
                        '<td id="tier_' + data[i].id + '">' + data[i].Tier_Name + '</td>' +
                        '<td id="tierid_' + data[i].id + '" style="display:none;">' + data[i].tier_id + '</td>' +
                        '<td id="zone_' + data[i].id + '">' + data[i].zone_name + '</td>' +
                        '<td id="zoneid_' + data[i].id + '" style="display:none;">' + data[i].zone_id + '</td>' +
                        '<td><button type="button" name="edit" class="edit_data  btn btn-xs btn-success" id="' + data[i].id + '"><i class="fa fa-edit"></i></button>';
                        html += '</tr>';
                    }
                    $('#city_list').html(html);
                    $('#city_table').DataTable({});
                        
                }
            });
        }
        fillDropdown('tier','tbl_tier');
            fillDropdown('zone','tbl_zone');  
        //function to fill dropdown
        function fillDropdown(id,table){
            $('#'+id).html('');
            $.ajax({
                type: "POST",
                url: "dm_api/City/get_dropdown",
                data: {
                    table_name: table,
                },
                dataType: "JSON",
                async: false,
                success: function(data) {console.log("Result:", data);
                    var data = eval(data);
                    var html = ''; // '<option value="" selected>select tier</option>';
                    for (var i = 0; i < data.length; i++) {
                        if(table == 'tbl_tier'){
                            name = data[i].Tier_Name;
                        }else{
                            name = data[i].zone_name;
                        }
                        html += '<option value="'+data[i].id+'">'+name+'</option>';
                    }
                    $('#'+id).html(html);
                }
            });
        }

        // function to get data back to form for edit
        $(document).on("click", ".edit_data", function(e) {
            e.preventDefault();
            
            var id = $(this).attr('id');
            var city_name = $('#cityname_'+id).html();
            var region = $('#region_'+id).html();
            var tier_id = $('#tierid_'+id).html();
            var zone_id = $('#zoneid_'+id).html();
            console.log(tier_id+' '+zone_id);
            $('#save_update').val(id);
            $('#city_name').val(city_name);
            $('#region').val(region);
            $('#tier').val(tier_id).trigger('change');
            $('#zone').val(zone_id).trigger('change');

            $('#city_edit').show();
            $('#city_list_data').hide();
           
        });
    });

    //function to save data
    $(document).on("submit", "#city_form", function(e) {
        e.preventDefault();
        var city_name = $('#city_name').val();
        var region = $('#region').val();
        var tier = $('#tier').val();
        var zone = $('#zone').val();
        var save_update = $('#save_update').val();

        $.ajax({
            type: "POST",
            url: "dm_api/City/update_data",
            data: {
                city_name: city_name,
                region: region,
                tier: tier,
                zone: zone,
                save_update: save_update,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log("Res:"+data);
                if(data == 1){
                   // alert("Recoed Saved Successfully!");
                    successTost("Record Saved Successfully!");
                    $('#city_form').trigger("reset");
                    $('#city_edit').hide();
                    $('#city_list_data').show();
                    $('#save_update').val('');
                    location.reload();
                }else{
                    //alert("Problem in Save Data!");
                    errorTost("Problem in Save Data!");
                }
            }
        });
    });
</script>