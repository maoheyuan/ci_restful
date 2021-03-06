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
$route['translate_uri_dashes'] = false;


/*$route['members/index']['get'] = 'Members/members';
$route['members/index/(:num)']['get'] = 'Members/member/id/$1';
$route['members/index/(:num)']['DELETE'] = 'Members/delete/id/$1';
$route['members/index']['PUT'] = 'Members/put';
$route['members/index']['POST'] = 'Members/post';*/



$route['members']['get'] = 'Members/get';
$route['members/(:num)']['get'] = 'Members/get/$1';
$route['members/(:num)']['delete'] = 'Members/delete/$1';
$route['members']['put'] = 'Members/put';
$route['members']['post'] = 'Members/post';



$route['category']['get'] = 'Category/get';
$route['category/(:num)']['get'] = 'Category/get/$1';
$route['category/(:num)']['delete'] = 'Category/delete/$1';
$route['category']['put'] = 'Category/put';
$route['category']['post'] = 'Category/post';




$route['goods']['get'] = 'Goods/get';
$route['goods/(:num)']['get'] = 'Goods/get/$1';
$route['goods/(:num)']['delete'] = 'Goods/delete/$1';
$route['goods']['put'] = 'Goods/put';
$route['goods']['post'] = 'Goods/post';


$route['order']['get'] = 'Order/get';
$route['order/(:num)']['get'] = 'Order/get/$1';
$route['order/(:num)']['delete'] = 'Order/delete/$1';
$route['order']['put'] = 'Order/put';
$route['order']['post'] = 'Order/post';


$route['cart']['get'] = 'Cart/get';
$route['cart/(:num)']['delete'] = 'Cart/delete/$1';
$route['cart']['put'] = 'Cart/put';
$route['cart']['post'] = 'Cart/post';

$route['address']['get'] = 'Address/get';
$route['address/(:num)']['get'] = 'Address/get/$1';
$route['address/(:num)']['delete'] = 'Address/delete/$1';
$route['address']['put'] = 'Address/put';
$route['address']['post'] = 'Address/post';


$route['common/login']['post'] = 'Common/login';