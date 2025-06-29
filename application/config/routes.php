<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 	= 'Home';
$route['home'] 					= 'Home';

/* ADMIN ROUTES */
	$route['login_dashboard'] 					= 'auth/login';
	$route['login'] 							= 'auth/login_dashboard';
	$route['logout'] 							= 'auth/logout';
	$route['dashboard'] 						= 'admin/dashboard';
	$route['dashboard/save'] 					= 'admin/dashboard/save';
	$route['dashboard/get_approval_history'] 	= 'admin/dashboard/get_approval_history';
	$route['profile'] 							= 'Home/profile';
	$route['profile/do_update'] 				= 'Home/profile_update';
	$route['survey/detail_mobile/(:any)'] 		= 'Home/detail_mobile/$1';
	$route['survey/entry_mobile/(:any)'] 		= 'Home/entry_mobile/$1';
	$route['survey/do_create_mobile'] 			= 'Home/do_create_mobile';
/* ADMIN ROUTES */

/* MASTER DATA ROUTES */
	$route['dashboard/master/common_code'] 					= 'admin/master/CommonCode';
	$route['dashboard/master/common_code/create'] 			= 'admin/master/CommonCode/create';
	$route['dashboard/master/common_code/do_create'] 		= 'admin/master/CommonCode/do_create';
	$route['dashboard/master/common_code/edit/(:any)'] 		= 'admin/master/CommonCode/edit/$1';
	$route['dashboard/master/common_code/do_update'] 		= 'admin/master/CommonCode/do_update';
	$route['dashboard/master/common_code/delete/(:any)']	= 'admin/master/CommonCode/do_delete/$1';

	$route['dashboard/master/user'] 					= 'admin/master/User';
	$route['dashboard/master/user/create'] 				= 'admin/master/User/create';
	$route['dashboard/master/user/do_create'] 			= 'admin/master/User/do_create';
	$route['dashboard/master/user/edit/(:any)'] 		= 'admin/master/User/edit/$1';
	$route['dashboard/master/user/do_update'] 			= 'admin/master/User/do_update';
	$route['dashboard/master/user/detail/(:any)'] 		= 'admin/master/User/detail/$1';
	$route['dashboard/master/user/delete/(:any)']		= 'admin/master/User/delete/$1';
	$route['dashboard/master/user/duplicate'] 			= 'admin/master/User/duplicate';
	$route['dashboard/master/user/do_duplicate'] 		= 'admin/master/User/do_duplicate';
	$route['dashboard/master/user/excel'] 				= 'admin/master/User/excel';
/* MASTER DATA ROUTES */

/* GIS ACTIVITY ROUTES */
	$route['dashboard/gis/site'] 					 				= 'admin/Gis/index_site';
	$route['dashboard/gis/site/create-site'] 			= 'admin/Gis/create_site';
	$route['dashboard/gis/site/save-site'] 		 		= 'admin/Gis/save_site';
	$route['dashboard/gis/site/edit/(:any)'] 		 	= 'admin/Gis/edit_site/$1';
	$route['dashboard/gis/site/update'] 			 		= 'admin/Gis/update_site';
	$route['dashboard/gis/site/delete/(:any)']    = 'admin/Gis/delete_site/$1';

	
	$route['dashboard/gis/kemitraan'] 					 		= 'admin/GisKemitraan/index_kemitraan';
	$route['dashboard/gis/kemitraan/create-kemitraan'] 			 	= 'admin/GisKemitraan/create_kemitraan';
	$route['dashboard/gis/kemitraan/save-kemitraan'] 		 			= 'admin/GisKemitraan/save_kemitraan';
	$route['dashboard/gis/kemitraan/edit/(:any)'] 		 		= 'admin/GisKemitraan/edit_kemitraan/$1';
	$route['dashboard/gis/kemitraan/update'] 			 		= 'admin/GisKemitraan/update_kemitraan';
	$route['dashboard/gis/kemitraan/delete/(:any)']     			= 'admin/GisKemitraan/delete_kemitraan/$1';
/* GIS ACTIVITY ROUTES */

$route['404_override'] 					= '';
$route['translate_uri_dashes'] 			= FALSE;
