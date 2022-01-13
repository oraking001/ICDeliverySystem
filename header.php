<?php 
$current_user_login=isset($_COOKIE['current_user']);
include 'connect.php';

$tabs ='';
// $i=0;
$cnt = '';

?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Delivery Management System</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #4 for rowreorder extension demos" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />

        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
        <link href="assets/layouts/layout4/css/style.css" rel="stylesheet" type="text/css" />
        <link href="assets/select2/fstdropdown.css" rel="stylesheet">
        <link href="assets/toastr/toastr.min.css" rel="stylesheet">


        <!-- END THEME LAYOUT STYLES -->
    

    <!-- END HEAD -->

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <div class="page-logo">
                    <a href="#" class="logo-default">
                        DM</a>
                    <div class="menu-toggler sidebar-toggler">
                    </div>
                </div>
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            
                           <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="username username-hide-on-mobile"></span>
									<?php 
									$user_datas=get_user_by_id($_COOKIE['user_id']);
                                    $user_roles=$user_datas['user_type'];
                                    $tabs = $user_datas['tabs'];
                                   // echo "tabs:".$_COOKIE['user_id'].'#tabs'.$user_datas['tabs'];
                                    $tabs = explode(',',$tabs);
                                    $cnt = count($tabs);
									?>
                                    <labal>Hello <?php echo $user_datas['sau_FName']; ?> <i class="fa fa-angle-down" aria-hidden="true"></i></labal></a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-user"></i> My Profile </a>
                                    </li>
                                    <li>
                                        <a id="logout" href="logout.php?logout=1">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        <div class="clearfix"> </div>

        <div class="page-container">
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <div id="overlay"></div>
                    <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <!-- <li class="nav-item start active">
                            <a href="dashboard.php" class="nav-link nav-toggle">
                                <i class="fa fa-home"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li> -->
                        <?php 
                        for($i=0; $i<$cnt;$i++){
                        if($tabs[$i]==1){ ?>
						<li class="nav-item">
                            <a href="overview.php" class="nav-link nav-toggle">
                                <i class="fa fa-life-ring" aria-hidden="true"></i>
                                <span class="title">Overview</span>
                            </a>
                        </li> 
                        <?php 
                    }
                         if($tabs[$i]==2){
						?>
                        <li class="nav-item">
                            <a href="create_delivery.php" class="nav-link nav-toggle">
                                <i class="fa fa-cubes" aria-hidden="true"></i>
                                <span class="title">Create Delivery</span>
                            </a>
                        </li> 
                        <?php  } 
                        if($tabs[$i]==3){
						?>
						<li class="nav-item">
                            <a href="packages.php" class="nav-link nav-toggle">
                                <i class="fa fa-cube" aria-hidden="true"></i>
                                <span class="title">At the Hub</span>
                            </a>
                        </li> 
                        <?php
                        } 
                         if($tabs[$i]==4){
						?>
                       <li class="nav-item">
                            <a href="create_receive.php" class="nav-link nav-toggle">
                            <i class="fa fa-get-pocket" aria-hidden="true"></i>
                                <span class="title">Receive</span>
                            </a>
                        </li>
                        <?php 
                        
                        } 
                         if($tabs[$i]==5){
						?>
						<!-- <li class="nav-item">
                            <a href="remittance_statement.php" class="nav-link nav-toggle">
                                <i class="fa fa-money" aria-hidden="true"></i>
                                <span class="title">Finance</span>
                            </a>
                        </li>  -->

                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle">
                            <i class="fa fa-money" aria-hidden="true"></i>
                                <span class="title">Finance</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu ">
                               <li class="nav-item">
                                    <a href="driversheet.php">Dispatched Runsheet </a>
                                    <span class="arrow "></span>
                                </li>
                            </ul>
                        </li>
                        <?php
                        
                         } 
                         if($tabs[$i]==6){
						?>
                        <li class="nav-item">
                            <a href="transitbag.php" class="nav-link nav-toggle">
                                <i class="fa fa-file-text" aria-hidden="true"></i>
                                <span class="title">Transit Bag</span>
                            </a>
                        </li> 
                        <?php 
                        
                        } 
                         if($tabs[$i]==7){
						?>
                      <!--  <li class="nav-item">
                            <a href="managehub.php" class="nav-link nav-toggle">
                                <i class="fa fa-file-text" aria-hidden="true"></i>
                                <span class="title">Hub Management</span>
                            </a>
                        </li>  -->
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="fa fa-file-text" aria-hidden="true"></i>
                                <span class="title">Hub Management</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu ">
                               <li class="nav-item">
                                    <a href="add_hub.php">Create Hub</a>
                                    <span class="arrow "></span>
                                </li>
			                   <li class="nav-item">
			                       <a href="managehub.php">Manage Hub</a>
			                   </li>
                            </ul>
                        </li> <?php 
                        
                        } 
                         if($tabs[$i]==8){
						?>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="fa fa-file-text" aria-hidden="true"></i>
                                <span class="title">City Management</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu ">
                               <li class="nav-item">
                                    <a href="add_city.php">Create City</a>
                                    <span class="arrow "></span>
                                </li>
			                   <li class="nav-item">
			                       <a href="managecity.php">Manage City</a>
			                   </li>
                            </ul>
                        </li> 
                        <?php 
                       
                        } 
                         if($tabs[$i]==9){
						?>
						<li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                <span class="title">Uploads</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu ">
                               <li class="nav-item">
                                    <a href="companyupload.php">Package Upload</a>
                                </li>
								
                            </ul>
                            <?php 
                            
                            } 
                         if($tabs[$i]==10){
						?>	
                        </li>
                        	<li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                <span class="title">Tier Management</span>
                                <span class="arrow "></span>
                            </a>
                         
							<ul class="sub-menu ">
                               <li class="nav-item ">
                                    <a href="Create_Tier.php">Create Tier</a>
                                </li>
                                
                           
                               <li class="nav-item ">
                                    <a href="Manage_Tier.php">Manage Tier</a>
                                </li>
                                
                            </ul>
                            
                        </li>
                        <?php 
                       
                        } 
                         if($tabs[$i]==11){
						?>
                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                <span class="title">Zone Management</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu ">
                               <li class="nav-item ">
                                    <a href="Create_Zone.php">Create Zone</a>
                                </li>
                             
                               <li class="nav-item ">
                                    <a href="Manage_Zone.php">Manage Zone</a>
                                </li>
                                
                            </ul>
                            </li>
                            <?php 
                            
                            } 
                         if($tabs[$i]==12){
						?>
						<li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-users"></i>
                                <span class="title">Client Management</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu ">
                               <li class="nav-item ">
                                    <a href="add_user.php">Create Client</a>
                                </li>
                                
                            </ul>
                        </li><?php 
                        
                        } 
                         if($tabs[$i]==13){
						?>
                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-users"></i>
                                <span class="title">Vendor Management</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                               <li class="nav-item">
                                    <a href="manage_vendor.php">Manage Vendor</a>
                                </li>
                                
                            </ul>
                        </li>
                        <?php 
                        
                        } 
                         if($tabs[$i]==14){
						?>
						<li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-users"></i>
                                <span class="title">User Management</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu ">
                               <li class="nav-item ">
                                    <a href="add_user.php">Create User</a>
                                </li>
                                <li class="nav-item ">
                                    <a href="user_list.php">User List</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                        } 
                        if($tabs[$i]==15){
                        ?>
                        <li class="nav-item start active">
                            <a href="driver_delivery.php" class="nav-link nav-toggle">
                                <i class="fa fa-home"></i>
                                <span class="title">Driver delivery</span>
                            </a>
                        </li>
                        <?php } 
                        }?>
						
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
            <script>
        //     $(document).on("click", "#logout", function(e) {
        //         e.preventDefault();
        //         $.ajax({
        //         type: "POST",
        //         url: "dm_api/Api/logout",
        //         data: {
        //             id : 1,
        //         },
        //         async: false,
        //         success: function(data) {
        //             window.location.replace("http://localhost/finz/");
        //         }
        //     });
        // });
            </script>