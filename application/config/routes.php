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
|    example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|    https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|    $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|    $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|    $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:    my-controller/index    -> my_controller/index
|        my-controller/my-method    -> my_controller/my_method
*/

include_once "route_slugs.php";
//routes
$r_admin = $custom_slug_array["admin"];

$route['default_controller']         = 'home';
$route['404_override']               = 'c_404';
$route['translate_uri_dashes']       = FALSE;
$route['properties-details/(:any)']  = 'home/properties_details';
$route['home/search_properties']     = 'home/search_properties';
$route['home/search_All']            = 'home/search_All';

$route['locations/(:any)']           = 'home/locations_info';
$route['properties-listings']        = 'home/properties_listings';
$route['search/properties/(:any)']   = 'home/search';
$route['about-us']                   = 'pages/about_us';
$route['careers']                    = 'pages/careers';
$route['partners']                   = 'pages/partners';
$route['contact-us']                 = 'pages/contact_us';
$route['feedback-review']            = 'pages/feedback_review';
$route['advertise-with-us']          = 'pages/advertise_with_us';
$route['home-loan']                  = 'pages/home_loan';
$route['cities']                     = 'pages/cities';
$route['localities']                 = 'pages/localities';
//$route['(:any)/builder/(:any)']      = 'pages/builders';
//$route['projects/(:any)/(:any)']     = 'pages/projects';
$route['price-trends']               = 'pages/price_trends';
$route['offers']                     = 'pages/offers';
$route['emi-calculator']             = 'pages/emi_calculator';
$route['social-media']               = 'pages/social_media';
$route['frequently-asked-questions'] = 'pages/frequently_asked_questions';
$route['safety-guide']               = 'pages/safety_guide';
$route['privacy-policy']             = 'pages/privacy_policy';
$route['terms-of-uses']              = 'pages/terms_of_uses';
$route['refund-policy']              = 'pages/refund_policy';
$route['disclaimer']                 = 'pages/disclaimer';
$route['profile']                    = 'pages/profile';
$route['logout']                     = 'auth/logout';

//Admin Authentication
$route[$r_admin . '/login']                    = 'admin/auth/login';
$route[$r_admin . '/logout']                   = 'admin/auth/logout';
$route[$r_admin . '/forgot-password']          = 'admin/auth/forgot_password';
$route[$r_admin . '/reset-password/(:any)']    = 'admin/auth/reset_password/$1';
//Admin Profile
$route[$r_admin]                               = 'admin/profile/dashboard';
$route[$r_admin . '/profile']                  = 'admin/profile/index';
$route[$r_admin . '/change-password']          = 'admin/profile/change_password';
$route[$r_admin . '/switch/(:any)']            = 'admin/profile/switch_language/$1';
//Admin Users
$route[$r_admin . '/users']                    = 'admin/users/list_users';
$route[$r_admin . '/user/view']                = 'admin/users/view_user';
$route[$r_admin . '/user/add']                 = 'admin/users/add_user';
$route[$r_admin . '/user/create']              = 'admin/users/create_user';
$route[$r_admin . '/user/edit']                = 'admin/users/edit_user';
$route[$r_admin . '/user/update']              = 'admin/users/update_user';
$route[$r_admin . '/user/block']               = 'admin/users/block_user';
$route[$r_admin . '/user/unblock']             = 'admin/users/unblock_user';
$route[$r_admin . '/user/delete']              = 'admin/users/delete_user';
//Admin Settings
$route[$r_admin . '/settings/site']            = 'admin/settings/site_settings';
$route[$r_admin . '/settings/social-media']    = 'admin/settings/social_media_settings';
$route[$r_admin . '/settings/seo']             = 'admin/settings/seo_settings';
$route[$r_admin . '/settings/permissions']     = 'admin/settings/permissions';
$route[$r_admin . '/settings/app']             = 'admin/settings/app_settings';
$route[$r_admin . '/settings/email']           = 'admin/settings/email_settings';
$route[$r_admin . '/settings/email-templates'] = 'admin/settings/email_templates';
$route[$r_admin . '/modals/getRoom_Data']      = 'admin/modals/getRoom_Data';
$route[$r_admin . '/modals/getDesc_Data']      = 'admin/modals/getDesc_Data';
$route[$r_admin . '/reviews/list_reviews']      = 'admin/reviews/list_reviews';
$route[$r_admin . '/masters/(:any)'] = 'admin/masters/$1';
$route[$r_admin . '/builders/(:any)'] = 'admin/builders/$1';
$route[$r_admin . '/projects/(:any)'] = 'admin/projects/$1';
$route[$r_admin . '/properties/(:any)'] = 'admin/properties/$1';
$route[$r_admin . '/localities/search_cities']['GET'] = 'admin/localities/search_cities';

/* New Methods */

$route['(:any)']['GET']              = 'pages/any/$1';
$route['(:any)/(:any)']['GET']       = 'pages/any/$1/$2';
$route['(:any)/(:any)/(:any)']['GET']  = 'pages/any/$1/$2/$3';
//$route['post-property']             = 'pages/post_property';
