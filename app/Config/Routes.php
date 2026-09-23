<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('cau', 'Main::index');
$routes->get('bundesland', 'Pocasi::bundesland');
$routes->get('station/(:num)', 'Pocasi::stations/$1');
$routes->get('station/details/(:num)', 'Pocasi::stationDetails/$1');
$routes->get('bundesland/details/(:num)', 'Pocasi::bundeslandDetails/$1');
$routes->get('stations-list', 'Pocasi::stationsList');
$routes->post('station/delete-month', 'Pocasi::deleteMonthData');