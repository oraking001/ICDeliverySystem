<?php include('header.php');
?>

 <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Upload Company</h1>
                        </div>
                    </div>
                    <div class="form-content" style="margin: 20px 200px;">
                        <div class="portlet-title">
                            Company Entry
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active in">
                                    <div class="row">
                                        <form action="process.php?action=upload_company_csv" role="form" enctype='multipart/form-data' method="POST">
                                             <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Upload CSV file</label>
                                                <div class="file-upload">
                                                    <div class="file-select">
                                                        <div class="file-select-button" id="fileName">Choose File</div>
                                                        <div class="file-select-name" id="noFile">No file chosen...</div> 
                                                        <input type="file" accept=".csv" name="chooseFile" id="chooseFile" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="col-lg-3 col-md-4 col-sm-4 col-lc-6 col-xs-12 m-b-20">
                                                <label class="control-label">Download Sample</label>
                                                
                                                    <div class="file-select sample">
                                                       <a href="samples/Company_Sample.csv">CompanyUpload.csv</a>
                                                    </div>                                                    
                                                
                                            </div>
                                             <div class="col-xs-12 text-right flow-buttons-2">
                                                <a href="dashboard.php" class="btn btn-default btn-cancel">Cancel</a>
                                                <button type="submit" name="save" class="btn btn-success">Save</button>
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
}

<?php include('footer.php');?>

<script type="text/javascript">
  $('#chooseFile').change(function() {    
  var i = $(this).prev('label').clone();
  var file = $('#chooseFile')[0].files[0].name;
  $('#noFile').empty();
   $('<div>'+file+'</div>').appendTo('#noFile');
});
</script>