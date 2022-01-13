<?php include('header.php');?>
<!-- BEGIN CONTENT -->

            <div class="page-content-wrapper">
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
            <!-- END CONTENT -->

            <?php include('footer.php');?>
<script type="text/javascript">
     var baseurl = "<?php echo $_SERVER['SERVER_NAME'].'/'.'finz/'; ?>";
</script>
<script src="assets/js/myjs/create_city.js"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $.holdReady( true );
    });
</script>