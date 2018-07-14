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

$route['about'] = 'About';
$route['contact'] = 'Contact';
$route['showrooms'] = 'Showrooms';
$route['service-centers'] = 'ServiceCenter';
$route['default_controller'] = 'Home';
$route['sendQuickEmailAr'] = 'MailController/sendQuickEmailAr';
$route['sendQuickEmail'] = 'MailController/sendQuickEmail';
$route['sendMail'] = 'MailController/sendMail';
$route['sendMailAr'] = 'MailController/sendMailAr';
$route['signin'] = 'RegisterController/signIn';
$route['register'] = 'RegisterController/signUp';
$route['login-register'] = 'SignIn';

$route['my-profile'] = 'Profile';
$route['my-profile/car-details/request-maintenance'] = 'MyCarDetails/requestMaintenance';
$route['my-profile/car-details/(:num)'] = 'MyCarDetails/index/$1';
$route['my-profile/add-car'] = 'AddCar';
$route['my-profile/edit-profile'] = 'EditProfile';
$route['my-profile/edit-profile/edit'] = 'EditProfile/executeEdits';
$route['my-profile/edit-profile/change-password'] = 'EditProfile/changePassword';
$route['my-profile/logout'] = 'EditProfile/logout';
$route['my-profile/add-car/(:num)'] = 'AddCar/getModels/$1';
$route['my-profile/add-car-form'] = 'AddCar/addCarForm';

$route['car/(:any)'] = 'CarModels/index/$1';
$route['car/(:any)/(:num)'] = 'CarCategories/index/$1/$2';
$route['car/(:any)/(:num)/(:num)'] = 'CarDetails/index/$1/$2/$3';

$route['car-requests/request-test-drive/(:num)/(:any)/(:any)'] = 'RequestTestDrive/index/$1/$2/$3';
$route['car-requests/request-test-drive/send-request'] = 'RequestTestDrive/sendRequest';



/**
 * AR Routes
 */
$route['ar/about'] = 'AboutAr';
$route['ar/contact'] = 'ContactAr';
$route['ar/showrooms'] = 'ShowroomsAr';
$route['ar/service-centers'] = 'ServiceCenterAr';
$route['ar'] = 'HomeAr';
$route['ar/home'] = 'HomeAr';
$route['ar/signin'] = 'RegisterController/signInAr';
$route['ar/register'] = 'RegisterController/signUpAr';
$route['ar/login-register'] = 'SignInAr';

$route['ar/my-profile'] = 'Profile/layoutAr';
$route['ar/my-profile/edit-profile'] = 'EditProfile/layoutAr';
$route['ar/my-profile/logout'] = 'EditProfile/logoutAr';
$route['ar/my-profile/edit-profile/edit'] = 'EditProfile/executeEditsAr';
$route['ar/my-profile/edit-profile/change-password'] = 'EditProfile/changePasswordAr';
$route['ar/my-profile/car-details/request-maintenance'] = 'MyCarDetails/requestMaintenanceAr';
$route['ar/my-profile/car-details/(:num)'] = 'MyCarDetails/layoutAr/$1';
$route['ar/my-profile/add-car'] = 'AddCar/layoutAr';
$route['ar/my-profile/add-car/(:num)'] = 'AddCar/getModelsAr/$1';
$route['ar/my-profile/add-car-form'] = 'AddCar/addCarFormAr';

$route['ar/car/(:any)'] = 'CarModelsAr/index/$1';
$route['ar/car/(:any)/(:num)'] = 'CarCategoriesAr/index/$1/$2';
$route['ar/car/(:any)/(:num)/(:num)'] = 'CarDetailsAr/index/$1/$2/$3';

$route['ar/car-requests/request-test-drive/send-request'] = 'RequestTestDrive/sendRequestAr';
$route['ar/car-requests/request-test-drive/(:num)/(:any)/(:any)'] = 'RequestTestDrive/layoutAr/$1/$2/$3';


$route['404_override'] = 'My404';
$route['translate_uri_dashes'] = FALSE;

