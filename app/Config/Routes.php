<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');

//LOGIN 
$routes->get('login', 'Auth::index');
$routes->post('auth/loginProcess', 'Auth::loginProcess');
//LOGOUT
$routes->get('logout', 'Auth::logout');

//vehicle
$routes->get('vehicle', 'Vehicle::index');
$routes->get('vehicle/create', 'Vehicle::create');
$routes->post('vehicle/store', 'Vehicle::store');
$routes->get('vehicle/edit/(:num)', 'Vehicle::edit/$1');
$routes->post('vehicle/update/(:num)', 'Vehicle::update/$1');
$routes->delete('vehicle/delete/(:num)', 'Vehicle::delete/$1');

//driver
$routes->get('driver', 'Driver::index');
$routes->get('driver/create', 'Driver::create');
$routes->post('driver/store', 'Driver::store');
$routes->get('driver/edit/(:num)', 'Driver::edit/$1');
$routes->post('driver/update/(:num)', 'Driver::update/$1');
$routes->delete('driver/delete/(:num)', 'Driver::delete/$1');