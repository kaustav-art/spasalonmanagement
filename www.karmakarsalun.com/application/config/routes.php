<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['about'] = 'home/about';
$route['services'] = 'home/services';
$route['packages'] = 'home/packages';
$route['team'] = 'home/team';
$route['gallery'] = 'home/gallery';
$route['testimonials'] = 'home/testimonials';
$route['contact'] = 'home/contact';

$route['booking'] = 'booking/index';
$route['booking/get_slots'] = 'booking/get_slots';
$route['booking/submit'] = 'booking/submit';
$route['booking/quick_submit'] = 'booking/quick_submit';
$route['faq'] = 'home/index';

$route['service/(:any)'] = 'home/service_detail/$1';
$route['service'] = 'home/service_detail';
$route['services/(:any)'] = 'home/service_detail/$1';
$route['blog/(:any)'] = 'home/blog_detail/$1';
$route['blog'] = 'home/blog_detail';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
