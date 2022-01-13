<!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
       <!--  <script src="../assets/pages/scripts/table-datatables-rowreorder.min.js" type="text/javascript"></script> -->
        <script src="assets/pages/scripts/ui-sweetalert.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/select2/fstdropdown.js"></script>
        <script type="text/javascript" src="assets/toastr/toastr.min.js"></script>
        <script type="text/javascript" src="assets/toastr/tost.js"></script>
        <script type="text/javascript" src="assets/search_table/search-table.js"></script>
        
        <script src="jquery2.js"></script>    
         <script type="text/javascript">
            $(function() {
            // this will get the full URL at the address bar
            var url = window.location.href;
            $('.page-sidebar .start').removeClass('active');
            // passes on every "a" tag
            $(".page-sidebar a").each(function() {
            // checks if its the same on the address bar
            if (url == (this.href)) {
            $(this).closest("li").addClass("active");
            //for making parent of submenu active
            $(this).closest("li").parent().parent().addClass("active");
            }
            });
            }); 
        </script>
       
        <script type="text/javascript">
        $(document).ready(function() {
    $('#sample_1').DataTable( {  
    "order": [[ 0, "asc" ]],
       lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10', '25', '50', 'All' ]
        ],
        dom: 'lBfrtip',
         buttons: [
            'csv','pdf'
        ]
        
    } );
} );   
        </script>
        
           <script type="text/javascript">
        $(document).ready(function() {
    $('#sample_2').DataTable( {
        "scrollX":true,
        "pagingType": "full_numbers",
    "order": [[ 0, "asc" ]],
       lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10', '25', '50', 'All' ]
        ],
        dom: 'lBfrtip',
         buttons: [
            'csv','pdf'
        ]
        
    } );
} );   
        </script>
        
           <script type="text/javascript">
        $(document).ready(function() {
    $('#sample_2act').DataTable( {
        "scrollX":true,
        "pagingType": "full_numbers",
    "order": [[ 0, "asc" ]],
       lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10', '25', '50', 'All' ]
        ],
        dom: 'lBfrtip',
         buttons: [
            'csv','pdf'
        ]
        
    } );
} );   
        </script>
        
         <script type="text/javascript">
        $(document).ready(function() {
    $('#sample_2mhub').DataTable( {
        "pagingType": "full_numbers",
    "order": [[ 0, "asc" ]],
       lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10', '25', '50', 'All' ]
        ],
        dom: 'lBfrtip',
         buttons: [
            'csv','pdf'
        ]
        
    } );
} );   
        </script>
        
        
           <script type="text/javascript">
        $(document).ready(function() {
    $('#sample_2dedu').DataTable( {
        "pagingType": "full_numbers",
    "order": [[ 0, "asc" ]],
       lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10', '25', '50', 'All' ]
        ],
        dom: 'lBfrtip',
         buttons: [
            'csv','pdf'
        ]
        
    } );
} );   
        </script>
        
           <script type="text/javascript">
        $(document).ready(function() {
    $('#sample_2rev').DataTable( {
        "pagingType": "full_numbers",
    "order": [[ 0, "asc" ]],
       lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10', '25', '50', 'All' ]
        ],
        dom: 'lBfrtip',
         buttons: [
            'csv','pdf'
        ]
        
    } );
} );   
        </script>
        
            <script type="text/javascript">
        $(document).ready(function() {
    $('#sample_21').DataTable( {  
        "scrollX":true,
    "pagingType": "full_numbers",
    "order": [[ 0, "asc" ]],
       lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10', '25', '50', 'All' ]
        ],
        dom: 'lBfrtip',
         buttons: [
            'csv','pdf'
        ]
        
    } );
} );   
        </script>

        <script type="text/javascript">
        $(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>


        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->

        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })

              $("#overlay").click(function(){
                $(".page-sidebar").removeClass("in");
            });
        </script>

        <script type="text/javascript">
            
            // A $( document ).ready() block.
          
        </script>


    </body>

</html>