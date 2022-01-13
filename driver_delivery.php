 <?php include('header.php');?> 
 <!-- BEGIN CONTENT -->
<style>
.small{
    color: #000000,
    font-size: 12px
}
</style>

            <div class="page-content-wrapper">

                <!-- BEGIN CONTENT BODY -->

                <div class="page-content">
   
                    <!-- BEGIN PAGE HEAD-->

                    <div class="row page-head">



                        <div class="page-title col-md-6">
                            <h1>Delivery Details</h1>
                           
                        </div>


                        <div class="col-md-3">
                             <!-- <select class="form-control" id="country_options">
                            </select> -->
                            <button type="button" class="btn btn-warning" id="refresh">Refresh Data</button>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control fstdropdown-select" name="vendor" id="vendor">
                                                    
                            </select>
                        </div>

                    </div>

                    <!-- END PAGE HEAD-->

                    <!-- BEGIN PAGE BREADCRUMB -->

                   

                    <!-- END PAGE BREADCRUMB -->

                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row page-details card_details" style="padding: 25px 0;">


                    </div>

                   

            <!-- END CONTENT -->

            <!-- BEGIN QUICK SIDEBAR -->

            <a href="javascript:;" class="page-quick-sidebar-toggler">

                <i class="icon-login"></i>

            </a>


            <!-- END QUICK SIDEBAR -->

        <!-- END CONTAINER -->
        
        
        <?php include('footer.php');?>
         <!-- Modal -->
         <div class="modal fade" id="failed_modal" role="dialog" style="display:none;">
                <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Please Enter Delivery Failed Reason</h4><br>
                    <h6>Customer Name: <span id="cust_name"></span></h6><br>
                    <h6>Tracking Number: <span id="track_no"></span></h6>
                    </div>
                    <form id="failed_save" method="POST">
                    <div class="modal-body">
                    <p>Delivery Failed Reason:</p>
                    <textarea class="form-control" id="reason" cols="40" rows="4" style="resize: none;" required></textarea>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                    <input type="hidden" id="failed_id" value=""/>
                    </div>
                    </form>
                </div>
                
                </div>
            </div>
            <!-- Modal end -->
<script>
    datashow(vandor_id=0);
    function datashow(vandor_id){console.log("datashow vendor:",vandor_id);
        $.ajax({
             type: "POST",
             url: "dm_api/Driversheet/get_driver_delivery",
             data: {
                 table_name: 'tbl_delivery',
                 vandor_id:vandor_id
             },
             dataType: "JSON",
             async: false,
             success: function(data) {
                 console.log("Result:", data);
                 $('.card_details').html('');
                 var html ='';
                 
            if(data.length > 0){
                var data = eval(data);
                 for (var i = 0; i < data.length; i++) {
                    html += '<div class="col-md-3">' +
                        '<div class="dashboard-stat2 bordered" style="height:160px;">' +
                        '<div class="display">' +
                        '<div class="number">' +
                        '<small style="color:#000000;font-size:12px;">Customer Name: <span id="name_'+data[i].id+'">'+data[i].customer_name+'</span></small><br>' +
                        '<small style="color:#000000;font-size:12px;">Tracking Number: <span id="tracking_'+data[i].id+'">ICL'+data[i].tracking_number+'</span></small><br>' +
                        '<small style="color:#000000;font-size:12px;">Address: <span>'+data[i].address+'</span></small>&nbsp;<a><i class="fa fa-map-marker" aria-hidden="true"></i></a><br>' +
                        '<small style="color:#000000;font-size:12px;">Phone: <span>'+data[i].phone+'</span></small>&nbsp;<a href="tel:'+data[i].phone+'"><i class="fa fa-phone" aria-hidden="true"></i></a>' +
                        '</div>' +
                        '</div>' +
                        '<div class="progress-info">' +
                        '<div class="status" style="margin-top:0px;">' +
                        '<div class="status-title"> ' +
                        '<input type="button" name="failed" id="'+data[i].id+'" value="Failed" class="btn btn-sm btn-danger failed"/>' +
                        '</div>' +
                        '<div class="status-number">' +
                        '<input type="button" name="deliver" id="'+data[i].id+'" value="Deliver" class="btn btn-sm btn-success deliver"/>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' ;
                 }
             }else{
                html += '<center><span style="color:red;">No Data Available!</span></center>' ;
             }
                 $('.card_details').html(html);
             }
        });
    }

    //click event of deliver button
    $(document).on("click", ".deliver", function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            swal({
                title: "Confirm Delivery?",
             //   text: "You will not be able to recover this Data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                closeOnConfirm: true
            },
            function() {
                $.ajax({
                    data: {
                        id: id,
                        type:1
                    },
                    url: "dm_api/Driversheet/update_driver_delivery",
                    type: "POST",
                    dataType: 'json',
                    // async: false,
                    success: function(data) {
                        datashow(vandor_id=0);
                        successTost("Record Updated Successfully!");   
                    }
                });
            });
    });

    //click event of failed button
    $(document).on("click", ".failed", function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            
            swal({
                title: "Are you sure you want to cancel the package?",
             //   text: "You will not be able to recover this Data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                closeOnConfirm: true
            },
            function() {
                var name = $('#name_'+id).html();
                var tracking =$('#tracking_'+id).html();
                $('#failed_id').val(id);
                $('#cust_name').html(name);
                $('#track_no').html(tracking);
                $('#failed_modal').modal('show');
            });
    });

    //click event of failed event save reason
    $(document).on("submit", "#failed_save", function(e) {
            e.preventDefault();
            var id = $('#failed_id').val();
            var reason = $('#reason').val();
            $.ajax({
                    data: {
                        id: id,
                        reason:reason,
                        type:0
                    },
                    url: "dm_api/Driversheet/update_driver_delivery",
                    type: "POST",
                    dataType: 'json',
                    // async: false,
                    success: function(data) {
                        datashow(vandor_id=0);
                        $('#failed_modal').modal('hide');
                        $('form').get(0).reset();
                        successTost("Record Updated Successfully!");   
                    }
                });
    });

    $(document).on("click", "#refresh", function(e) {
            e.preventDefault();console.log("refresh");
            datashow(vandor_id=0);
    });

    //function to fill dropdown
    fillDropdown('vendor','tbl_vendor');
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
                var html = '<option value="0" selected>select</option>';
                for (var i = 0; i < data.length; i++) {
                    
                        name = data[i].vendor_name;
                 
                    html += '<option value="'+data[i].id+'">'+name+'</option>';
                }
                $('#'+id).html(html);
            }
        });
    }

    $(document).on("change", "#vendor", function(e) {
            e.preventDefault();
        var vendor_id = $('#vendor').val();
        console.log("vendor_id:",vendor_id);
        datashow(vendor_id);
    });
</script>


