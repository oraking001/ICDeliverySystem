<?php include('header.php');?>
<div class="page-content-wrapper" id="hub_edit">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Receive Bag</h1>
                        </div>
                    </div>
                    <div class="form-content">
                        <div class="portlet-title">
                            Create Receive Bag
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active in">
                                    
                                        <form role="form" method="POST" id="hub_form">
                                            <div class="row">
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Select Destination Hub <sup>*</sup></label>
                                                <select class="form-control fstdropdown-select" name="hub" id="hub" required>
                                                    
                                                </select>
                                                
                                            </div>   
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Enter Transit Bag Tracking <sup>*</sup></label>
                                                <input type="text" class="form-control" id="tran_no" name="tran_no" required="">
                                                
                                            </div>                                            
                                            
                                        </div>
                                        <label id="msg" style="color:red;"></label>
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

 <!-- BEGIN CONTENT -->

            <div class="page-content-wrapper" id="hub_list_data" style="display:none;">

                <!-- BEGIN CONTENT BODY -->

                <div class="page-content">

                    <!-- BEGIN PAGE HEAD-->

                    <div class="row page-head">



                        <div class="page-title col-md-12">

                        <div class="col-md-3">
                            <h3>Transit Bag</h3>
                        </div>
                        <div class="col-md-3">
                        </div>
                            <div class="col-md-3">
                                <!-- <label class="control-label">Origin Hub</label>
                                    <select class="form-control fstdropdown-select" name="ori_hub" id="ori_hub" >
                                     </select> -->
                            </div>
                            <div class="col-md-3" style="float:right;">
                                 <input type="button" name="dispatch" id="dispatch" value="Receive" class="btn btn-success" style="margin-top:22px;float:right;"/>
                                 <input type="hidden" id="hub_hidden" value=""/>
                            <div>
                       </div>
                       
                       <br>
                       
                    
                    <div id='loadingmessage' style='display:none' class="text-center">
                          <img src='samples/loader.gif'/>
                        </div>

                    <!-- END PAGE HEAD-->

                    <!-- BEGIN PAGE BREADCRUMB -->

                   

                    <!-- END PAGE BREADCRUMB -->

                    <!-- BEGIN PAGE BASE CONTENT -->

                   
                
                    </div>

                    

                    <!-- END PAGE BASE CONTENT -->

                </div>

                <!-- END CONTENT BODY -->
                <div class="hub-management-table">
                     <div class="col-md-12">
                        <div class="col-md-4">
                        <label class="control-label" style="margin-left:-30px;">Transit Bag: <b><span id="bag_no"></span></b></label>
                        </div>
                     </div>
                     <br>
                     <div class="col-md-12">
                        <div class="col-md-4">
                        <label class="control-label" style="margin-left:-30px;margin-top:10px;">Destination Hub: <b><span id="dest_hub"></span></b></label>
                        </div>
                        <div class="col-md-4">
                        <label class="control-label" style="margin-top:10px;">Package Count: <b><span id="pac_cnt">0</span></b></label>
                        </div>
                        <div class="col-md-4">
                        <label class="control-label" style="margin-top:10px;float:right;">Enter Package: <input type="text" class="form-control" id="package_no" name="package_no" style="margin-bottom:10px;"></label>
                        </div>
                     </div>
                     <br>
                     <table class="table table-checkable table-bordered table-hover table-responsive" id="hub_table">

                         <thead>

                             <tr>
                             <tr>
                                    <th data-orderable="false" style="text-align: center"></th>
									<th style="width:10%;">Tracking No</th>
									<th>Logistic Type</th>
									<th>Vendor Name</th>
									<th>Package Type</th>
									<th>Origin Hub</th>
								    <th>Weight</th>
									<th>Destination City</th>                                             
                                    <th>Status</th>
                                </tr>
                             </tr>

                         </thead>

                         <tbody id="hub_list">

                       </tbody>

                     </table>

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
     var baseurl = "<?php echo $_SERVER['SERVER_NAME'].'/'.'finz/'; ?>";
</script>
<script src="assets/js/myjs/create_receive.js"></script>        

<script type="text/javascript">
    $(document).ready(function (){
        $.holdReady( true );
    });
</script>