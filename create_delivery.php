<?php include('header.php');?>
<!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Create Delivery</h1>
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="portlet-title">
                           
                            <div >
                                <div class="row">
                                <form method="post" id="import_csv" enctype="multipart/form-data">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                    <label class="control-label">Select CSV File</label>
                                    <input type="file" name="csv_file" id="csv_file" class="form-control" required accept=".csv" />
                                </div>
                                    <button type="submit" name="import_csv" style="margin-top:28px;" class="btn btn-info" id="import_csv_btn">Import CSV</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active in">
                                    
                                        <form role="form" method="POST" id="delivery_form">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">User Type</label>
                                                <select class="bs-select form-control" name="user_type" id="user_type" required>
                                                    <option value="" dafault selected>Select user type</option>
                                                    <option value="new">New Vendor</option>
                                                    <option value="old">Existing Vendor</option>
                                                    
                                                </select>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20" id="vendor_text" style="display:none;">
                                                <label class="control-label">Vendor Name <sup>*</sup></label>
                                                <input type="text" class="form-control" id="vendor_name" name="vendor_name">
                                                
                                            </div>  
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20" id="vendor_drop" style="display:none;">
                                                <label class="control-label">Vendor Name <sup>*</sup></label>
                                                <select class="form-control fstdropdown-select" name="vendor" id="vendor">
                                                    
                                                </select>
                                            </div>  
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20 ven_data" style="display:none;">
                                                <label class="control-label">Vendor Phone <sup>*</sup></label>
                                                <input type="text" class="form-control" id="vendor_phone" name="vendor_phone" pattern="[0-9]+" title="please enter number only">
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20 ven_data" style="display:none;">
                                                <label class="control-label">Vendor Email <sup>*</sup></label>
                                                <input type="email" class="form-control" id="vendor_email" name="vendor_email">
                                            </div>
                                        </div>
                                        <div class="row">
                                           <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Reciever's Name <sup>*</sup></label>
                                                <input type="text" class="form-control" id="rec_name" name="rec_name" required="">
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Reciever's Phone Number <sup>*</sup></label>
                                                <input type="text" class="form-control" id="rec_phone" name="rec_phone" required="">
                                            </div>
                                          
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Receiver's Address <sup>*</sup></label>
                                                <input type="textarea" class="form-control" id="rec_address" name="rec_address" required="">
                                            </div>  
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Package Description <sup>*</sup></label>
                                                <input type="textarea" class="form-control" id="pack_desc" name="pack_desc" required="">
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Package Type <sup>*</sup></label>
                                                <select class="bs-select form-control" name="pack_type" id="pack_type" required="">
                                                    <option value="Prepaid">Prepaid</option>
                                                    <option value="PostPaid">PostPaid</option>
                                                 
                                                </select>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Logistics Type <sup>*</sup></label>
                                                <select class="bs-select form-control" name="logi_type" id="logi_type" required="">
                                                    <option value="Intercity">Intercity</option>
                                                    <option value="Intracity">Intracity</option>
                                                 
                                                </select>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Package Weight <sup>*</sup></label>
                                                <input type="text" class="form-control" id="pack_weight" name="pack_weight" pattern="[0-9]+" title="please enter number only" required>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Destination City <sup>*</sup></label>
                                                <select class="form-control fstdropdown-select" name="city" id="city" required>
                                                    
                                                </select>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Destination Region <sup>*</sup></label>
                                                <input type="text" class="form-control" id="dest_region" name="dest_region" required="">
                                            </div>
                                           
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Origin Hub <sup>*</sup></label>
                                                <select class="form-control fstdropdown-select" name="hub" id="hub" required>
                                                    
                                                </select>
                                            </div>
                                            
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Shipping Fee <sup>*</sup></label>
                                                <input type="text" class="form-control" id="shipping_fee" name="shipping_fee" value=0 pattern="[0-9]+" title="please enter number only" required>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Amount to Collect <sup>*</sup></label>
                                                <input type="text" class="form-control" id="collect_amt" name="collect_amt" value=0 pattern="[0-9]+" title="please enter number only" required>
                                            </div>
                                            

                                          </div>
                                        <div class="row">
                                            
                                          
                                             <div class="col-xs-12 text-right flow-buttons-2">
                                              <!--  <a href="dashboard.php" class="btn btn-default btn-cancel">Cancel</a> -->
                                              <input type="reset" class="btn btn-default btn-cancel" value="Cancel">
                                                <input type="submit" name="save" value="Save" class="btn btn-success" />
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
                <form method="POST" id="print_form" action="dm_api/Delivery/print_data" target="_blank">
                  <input type="hidden" id="vendorId" name="vendorId" value="">
                </form>
            </div>
            <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
            <!-- END CONTENT -->

            <?php include('footer.php');?>
<script type="text/javascript">
     var baseurl = "<?php echo $_SERVER['SERVER_NAME'].'/'.'finz/'; ?>";
</script>
<script src="assets/js/myjs/create_delivery.js"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $.holdReady( true );
    });
</script>