<?php include('header_partner.php');?>

 <!-- BEGIN CONTENT -->

            <div class="page-content-wrapper">

                <!-- BEGIN CONTENT BODY -->

                <div class="page-content">

                    <!-- BEGIN PAGE HEAD-->

                    <div class="row page-head">



                        <div class="page-title col-md-8">

                            <h1>Data Review</h1>

                        </div>



                        <div class="col-md-2 dash">

                            

                                <select class="form-control" id="hub_options">                               

                                

                            </select>

                            

                        </div>

                        <div class="col-md-2 dash-1">

                            <div class="select-date">

                                 <i class="fa fa-calendar-o" aria-hidden="true"></i>

                                 <input type="text" class="form-control col-sm-3" name="daterange" id="getdaterange" value="<?php echo date('m/01/Y'); ?> - <?php echo date('m/t/Y')?>" />

                            </div>

                        </div>

                        

                    </div>

                    <!-- END PAGE HEAD-->

                    <!-- BEGIN PAGE BREADCRUMB -->

                   

                    <!-- END PAGE BREADCRUMB -->

                    <!-- BEGIN PAGE BASE CONTENT -->


                    <div class="">
                        <div class="row page-details" style="padding: 25px 0;">
                            <div class="col-lg-3">
                                <div class="dashboard-stat2 bordered">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-green-sharp" id="revanue_h"></h3>
                                            <small>Revenue</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-pie-chart"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
                                            </span>
                                        </div>
                                        <div class="status">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="dashboard-stat2 bordered">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-green-sharp" id="picked">
                                            </h3>
                                            <small>Total Delivered</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-like"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 100%;" class="progress-bar progress-bar-success red-haze"></span>
                                        </div>
                                        <div class="status">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="dashboard-stat2 bordered">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-blue-sharp" id="hub_posi">
                                            </h3>
                                            <small>Hub Position</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-basket"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                                            </span>
                                        </div>
                                        <div class="status">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="dashboard-stat2 bordered">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-green-sharp" id="deduction_hub">
                                            </h3>
                                            <small>Deductions</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-user"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 100%;" class="progress-bar progress-bar-success purple-soft">
                                            </span>
                                        </div>
                                        <div class="status">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                              <div class="col-md-2">

                            <div class="dashboard-stat2 bordered">

                                <div class="display">

                                    <div class="number">

                                        <h3 class="font-green-sharp" id="hub_score">
                                            
                                            
                                        </h3>

                                        <small>Hub Score</small>

                                    </div>

                                    <div class="icon">

                                        <i class="icon-user"></i>

                                    </div>

                                </div>

                                <div class="progress-info">

                                    <div class="progress">

                                        <span style="width: 100%;" class="progress-bar progress-bar-success purple-soft">

                                           <!--  <span class="sr-only">56% change</span> -->

                                        </span>

                                    </div>

                                    <div class="status">

                                        <!-- <div class="status-title"> change </div>

                                        <div class="status-number"> 57% </div> -->

                                    </div>

                                </div>

                            </div>

                        </div>
                            
                            
                        </div>
                    </div>





                    <div class="row m-t-4">

                        <div class="col-lg-6 col-xs-12 col-sm-12">

                            <div class="portlet light bordered">

                                <div class="portlet-title">

                                    <div class="caption">

                                        <span class="caption-subject bold uppercase font-dark">top 5 service providers</span>

                                    </div>

                                </div>

                               <table class="table top-5" id="sample_2"> <!-- id-"sample_1" -->



                                    <thead>



                                        <tr>

                                            <th> Hub ID</th>

                                            <th> Hub Name</th>

                                            <th> Partners </th>

                                            <th> Success Rate </th>

                                        </tr>



                                    </thead>



                                    <tbody>



                                        

                                    </tbody>



                                </table>

                                <!-- <div class="portlet-body">

                                    <div id="dashboard_amchart_1" class="CSSAnimationChart"></div>

                                </div> -->

                            </div>

                        </div>

                        <div class="col-lg-6 col-xs-12 col-sm-12">

                            <div class="portlet light bordered">

                                <div class="portlet-title">

                                    <div class="caption ">

                                        <span class="caption-subject font-dark bold uppercase">Graphical Analysis on Revenue</span>

                                    </div>

                                    <div class="actions">

                                        <!-- <a href="#" class="btn btn-circle green btn-outline btn-sm">

                                            <i class="fa fa-pencil"></i> Export </a>

                                        <a href="#" class="btn btn-circle green btn-outline btn-sm">

                                            <i class="fa fa-print"></i> Print </a> -->

                                    </div>

                                </div>

                                <div class="portlet-body">

                                     <div id="resizable" style="height: 370px;border:1px solid gray;">

                                    <div id="chartContainer1" style="height: 100%; width: 100%;"></div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-6 col-xs-12 col-sm-12">

                            

                        </div>

                        <div class="col-lg-6 col-xs-12 col-sm-12">

                            

                    </div>

                    <div class="row">

                        <div class="col-lg-6 col-xs-12 col-sm-12">

                            

                        </div>

                        <div class="col-lg-6 col-xs-12 col-sm-12">

                            

                        </div>

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

        <?php include('footer_d.php');?>



        <script type="text/javascript">    

        $('select').on('change', function() {

            $('#picked').empty(); 

            $('#revanue_h').empty();  

            $('#deduction_hub').empty();

            $('#hub_posi').empty();  
            
            $('#hub_score').empty();           

          var id = this.value;                                   

                     var table = $('#sample_2').DataTable();

                    table

                        .clear()

                        .draw();

                   getDashboard_data();

                   

         

          //alert( this.value );

        });

</script>



<!-- <script type="text/javascript">    

            $('#getdaterange').on('change', function() {

            $('#picked').empty(); 

            $('#revanue_h').empty();  

            $('#deduction_hub').empty();

            $('#hub_posi').empty();  

          var id = this.value;         

                                     

                    var table = $('#sample_2').DataTable();

                    table

                        .clear()

                        .draw();

                    getDashboard_data();

        });

</script> -->

          <script type="text/javascript">

    $(document).ready(function (){

    $.holdReady( true );

    if (window.localStorage.getItem("firstname")==null) {

        window.location.replace("http://partner.opmovings.com/index.php");

        return false;

    }else{

                $.ajax({

                type: "GET",

                url: "http://partner.opmovings.com/dm_api/Api/hub_List_where_user/"+localStorage.getItem("firstname"),

                dataType: 'json',

                success: function( data ) {

                var i=0;                

                if(data.hub_data.length>0){

                    $.each(data.hub_data,function(key, value){ 

                        if(i==0){

                             $('#hub_options').append('<option selected value='+data.hub_data[i].id+'>'+data.hub_data[i].hub_name+'</option>');

                             getDashboard_data();
                             getGraphdata(data.hub_data[i].id);



                        }else{

                        $('#hub_options').append('<option value='+data.hub_data[i].id+'>'+data.hub_data[i].hub_name+'</option>');}

                         i++;

                    });                 

                               

                    }

                // else{alert('No Data Found');}

                }



            }); 

        }



    });



</script>



<script type="text/javascript">

    function getGraphdata(id){
            $.ajax({
            type:"GET",
            url:"http://partner.opmovings.com/dm_api/Api/get_6_Month_data/"+id,
            dataType:'json',
            success:function (data){
                dataPoints=[]; 
                     for (var i = 0; i < data.chart_result.length; i++) {
                        dataPoints.push({
                                    label: data.chart_result[i].label,
                                    y: parseFloat(data.chart_result[i].y)
                                });
                            }
                     if(dataPoints.length === 0){ 
                       var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                        var today = new Date();
                        var d;
                        var month;

                    for(var i = 6; i > 0; i -= 1) {
                        d = new Date(today.getFullYear(), today.getMonth() - i+1, 1);
                        month = monthNames[d.getMonth()];
                        dataPoints.push({
                             label: month,
                             y: parseFloat(0.00)
                        });
                }
                      }       
                  CanvasJS.addColorSet("greenShades",
                        [//colorSet Array
                        "#fe6060",
                        "#64b1f0",
                        "#29d9b7",
                        "#90EE90" 
                        ]); 
                        
                        var da = new Date();
                        var mon = da.getMonth();
                        // Construct options first and then pass it as a parameter
                        var options1 = {
                            animationEnabled: true,
                            title: {
                                text: ""
                            },
                            theme: "light2",
                        colorSet: "greenShades",
                            data: [{
                                type: "column", //change it to line, area, bar, pie, etc
                                legendText: "Last 6 Months Revenue",
                                showInLegend: true,
                                dataPoints: dataPoints
                                    
                                }]
                            };
                            
                            $("#chartContainer1").CanvasJSChart(options1);

                        $("#resizable").resizable({
                            create: function (event, ui) {
                                //Create chart.
                                $("#chartContainer1").CanvasJSChart(options1);
                            },
                            resize: function (event, ui) {
                                //Update chart size according to its container size.
                                $("#chartContainer1").CanvasJSChart().render();
                            }
                        });
                }
        });
    }


    function getDashboard_data(){

        var hub_id = $('#hub_options').find(":selected").val();

        var daterange_value = $('#getdaterange').val();

        var arr = daterange_value.split('-');

        var date1 = $.trim(arr[0]);

        var date2 = $.trim(arr[1]);

        date1 = date1.split("/").join("-");

        date2 = date2.split("/").join("-");

        var scucces_rate='';

        //alert(hub_id);

         $.ajax({

                type: "GET",

                url: "http://partner.opmovings.com/dm_api/Api/dashboard_Data_user/"+hub_id+"/"+date1+"/"+date2+"/"+localStorage.getItem("firstname"),

                dataType: 'json',

                 success: function( data ) {

                    var hub_p = data.hub_position||0;

                    hub_p = parseFloat(hub_p).toFixed(2); 



                    var hub_picked = data.hub_data||0;

                    

                    var hub_revenue = data.delivered_revenue||0;

                    hub_revenue = parseFloat(hub_revenue).toFixed(2);



                    var hub_deduction = data.deduction_hub||0;

                    hub_deduction = parseFloat(hub_deduction).toFixed(2);  
                    
                    var hub_score = data.hub_score||0;
                    hub_score = parseFloat(hub_score).toFixed(2); 





                    $('#picked').append('<span data-counter="counterup" data-value="'+hub_picked+'">'+hub_picked+'</span>'); 

                    $('#revanue_h').append('<span data-counter="counterup" data-value="'+hub_revenue+'">₦ '+hub_revenue+'</span>');  

                    $('#deduction_hub').append('<span data-counter="counterup" data-value="'+hub_deduction+'">₦ '+hub_deduction+'</span>'); 

                    $('#hub_score').append('<span data-counter="counterup" data-value="'+hub_score+'">'+hub_score+'</span>');

                    $('#hub_posi').append('<span data-counter="counterup" data-value="'+hub_p+'">'+hub_p+'</span>');  

                                      



                  if(data.packages_data.length>0){

                    var i=0;  

                    var t = $('#sample_2').DataTable();

                   $.each(data.packages_data,function(key, value){  



                   //scucces_rate = data.packages_data[i].avg_success_rate;

                   //scucces_rate = parseFloat(scucces_rate).toFixed(2);                             

                            var currentTime = new Date(data.packages_data[i].delivered_date_time)

                            var month = currentTime.getMonth() + 1;

                            var day = currentTime.getDate();

                            var year = currentTime.getFullYear();

                            var date = day + "/" + month + "/" + year;  

                                    t.row.add( [                                   

                                    data.packages_data[i].hub_id,                                    

                                    data.packages_data[i].hub_name,                                  

                                    data.packages_data[i].company_name,                                    

                                    parseFloat(data.packages_data[i].avg_success_rate).toFixed(2)

                                ] ).draw( false );

                            i++;

                        });                      

                    }

                }



            }); 

        //alert(hub_id);

    }

</script>



<?php 

    //$chart_data_a = array('');

    // $url_6month = "http://localhost/dm_api/Api/get_6_Month_data";

    // $ch = curl_init($url_6month);

    // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // echo $result = curl_exec($ch);

    // curl_close($ch);

    

    // $chart_data = json_decode($result,true);

    // $chart = $chart_data['chart_result'];

    



?>

<script>

window.onload = function () {

 var dataPoints1 = JSON.parse($.ajax({

                type: "GET",

                url: "http://partner.opmovings.com/dm_api/Api/get_6_Month_data/"+localStorage.getItem("firstname"),

                dataType: 'json',

                async: false                

                }).responseText);  

 

var chartArray = [];



 for (var i = 0, len = dataPoints1.chart_result.length; i < len; i++) {

        console.log(dataPoints1.chart_result[i].label);

       chartArray.push({

        label:dataPoints1.chart_result[i].label,

        y:parseInt(dataPoints1.chart_result[i].y)

       });



    }

  //alert(dataPoints.chart_result);



var options1 = {

    animationEnabled: true,

    title: {

        text: ""

    },



    data: [{

        type: "column", //change it to line, area, bar, pie, etc

        legendText: "Last 6 Months Revenue",

        showInLegend: true,

        dataPoints:    chartArray     

        }]

    };



$("#resizable").resizable({

    create: function (event, ui) {

        //Create chart.

        $("#chartContainer1").CanvasJSChart(options1);

    },

    resize: function (event, ui) {

        //Update chart size according to its container size.

        $("#chartContainer1").CanvasJSChart().render();

    }

});

}

</script>

<script src="https://canvasjs.com/assets/script/jquery-ui.1.11.2.min.js"></script>

<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>



