<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['login'] = 'user_authentication';
$route['user_authentication/user_registration_show'] = 'user_authentication/user_registration_show';
$route['news/create'] = 'news/create';
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
