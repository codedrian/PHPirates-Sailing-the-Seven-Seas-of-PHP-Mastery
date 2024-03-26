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
//When the user visits "/" (e.g. localhost/), have this request be handled by the index method in the Main controller, echoing "I am Main Class!".
$route['default_controller'] = 'main';
//When the user visits "/main/say/hi", have say method in the Main class (in the controller folder) handle this request.  Have this method simply echo "HI".
$route['say'] = 'sandbox/main/say/hi';
// When the user visits "/main/say_anything/___", whatever was in ___, have this be simply be echoed.  For example, if the user visit "/main/say_anything/awesome", the http response should simply be "AWESOME" all in capital.
$route['say_anything/(:any)'] = 'main/say_anything/$1';

// When the user visits "/main/danger", have this request be handled by a method called 'danger' in the Main controller.  Have it simply redirect back to "/main"
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
