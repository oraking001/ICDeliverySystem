<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['API'] = 'Rest_server';

$route['login'] = 'Welcome/index';

//Basic routing
$route['Report'] = 'Dashboard/report_Ralin';

$route['Add_stock'] = 'Dashboard/Add_stock';
$route['Add_stock'] = 'Dashboard/Add_stock';
$route['Add_inventory'] = 'Dashboard/Add_inventory';
$route['Inventory_list']='Dashboard/Inventory_list';


$route['Running_jobs']='Dashboard/Running_jobs';
$route['Job_list']='Dashboard/Job_list';
$route['Add_job']='Dashboard/Add_job';

$route['list_customer']='Dashboard/list_customer';
$route['customer']='Dashboard/customer';

$route['User_list']='Dashboard/User_list';
$route['Add_user']='Dashboard/Add_user';

// <API-Calling, Status = "Start" >

//$route['API-AddJob'] = 'Api/AddJob';
$route['api-login'] = 'Api/login';

$route['api-myJobs'] = 'Api/myJobs';
$route['api-myJobs/(:any)'] = 'Api/myJobs/$1';

$route['api-addJobs-initialise'] = 'Api/addJob_initialise';
$route['api-addJobs-partyInfo'] = 'Api/addJob_initialise_partyInfo';
$route['api-addJobs-bagSubOptions'] = 'Api/addJob_initialise_bagType_bagSubOptions';
$route['api-addJobs-fabricTable'] = 'Api/addJob_initialise_fabric';
$route['api-addJobs-step1'] = 'Api/addJob_step1';
$route['api-addJobs-step2'] = 'Api/addJob_step2';
$route['api-editJobs-step1'] = 'Api/addJob_step1/edit';
$route['api-editJobs-step2'] = 'Api/addJob_step2/edit';
$route['api-deleteJobs'] = 'Api/deleteJobs';

// <API-Calling Status = "End">
