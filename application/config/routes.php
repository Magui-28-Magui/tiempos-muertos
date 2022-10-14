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
|	https://codeigniter.com/userguide3/general/routing.html
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
| This ro  ute will tell the Router which controller/method to use if those
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

//view
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['management'] = "managementcontroller/index";
$route['management/edit'] = "managementcontroller/edit_ineffieciency";

//add
$route['management/add'] = "managementcontroller/addlines";
$route['register']['post'] = "formcontroller/submit";

//get
$route['plants'] = "formcontroller/getplants";
$route['lines'] = "formcontroller/getlines";
$route['machines'] = "formcontroller/getmachines";
$route['supervisor'] = "formcontroller/getsupervisor";
$route['causes_code'] = "formcontroller/getcausescode";
$route['get_data'] = "formcontroller/getdata";
$route['get_all_data'] = "formcontroller/getalldata";
$route['get_data_week'] = "formcontroller/getdataweek";
$route['error_message'] = "formcontroller/errormessage";

//delete
$route['lines/delete/(:any)'] = "managementcontroller/deleteline/$1";
$route['causes_code/delete/(:any)'] = "managementcontroller/deletecause/$1";
$route['inefficiency/delete/(:any)'] = "managementcontroller/deleteinefficiency/$1";
$route['inefficiency/edit/(:any)'] = "managementcontroller/editinefficiency/$1";

//Authentication
$route['login'] = 'login/do_login';
$route['logout'] = 'login/logout';