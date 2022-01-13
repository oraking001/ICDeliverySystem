<?php include('header.php');?>
<!-- BEGIN CONTENT -->
     <div class="page-content-wrapper">
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
<script src="assets/js/myjs/create_hub.js"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $.holdReady( true );
    });
</script>