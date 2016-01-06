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
|	http://codeigniter.com/user_guide/general/routing.html
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


$route['default_controller'] = 'login';
#$route['default_controller'] = 'home/index';
#$route['(:any)'] = 'search/index/$1';
#$route['(:any)'] = 'home/index/$1';
#$route['search/(:any)'] = 'search/index/$1';
$route['home/(:any)'] = 'home/index/$1';
$route['basic_table/(:any)'] = 'basic_table/index/$1';
$route['widgets/(:any)'] = 'widgets/index/$1';
$route['chart_chartjs/(:any)'] = 'chart_chartjs/index/$1';

//$route['home'] = 'home';
$route['home'] = 'login/verification';
$route['search'] = 'search';
$route['basic_table'] = 'basic_table';
$route['widgets'] = 'widgets';
$route['chart_chartjs'] = 'chart_chartjs';
$route['Send_order'] = 'Send_order';
#$route['search/send_order'] = 'search/send_order';
#$route['search/set_pages'] = 'search/set_pages';
#$route['search/download'] = 'search/download';
#$route['search/do_upload'] = 'search/do_upload';
#$route['download/do_download'] = 'download/do_download';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//wmg
$route['add'] = 'admin_oper/addadmin';
$route['del/(:any)'] = 'admin_oper/deladmin';
$route['all'] = 'admin_oper/allmanager';
$route['logout']= 'logout/logout';

