<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'konsultasi';
$route['404_override'] = 'Errorpage';
$route['translate_uri_dashes'] = TRUE;

//Restrict page route
$route['restrict-page'] = 'Errorpage/restrict_page';

$route['login'] = 'authentication/index';
$route['logout'] = 'authentication/logout';


$route['jenis-perangkat-keras'] = 'jenisperangkatkeras/index';
$route['jenis-perangkat-keras/create'] = 'jenisperangkatkeras/create';
$route['jenis-perangkat-keras/(:any)/(:any)'] = 'jenisperangkatkeras/$1/$2';

$route['data-konsultasi'] = 'datakonsultasi/index';
$route['data-konsultasi/create'] = 'datakonsultasi/create';
$route['data-konsultasi/(:any)/(:num)'] = 'datakonsultasi/$1/$2';

$route['first-section'] = 'konsultasi/index';
$route['second-section'] = 'konsultasi/second_section';
$route['last-section'] = 'konsultasi/last_section';
