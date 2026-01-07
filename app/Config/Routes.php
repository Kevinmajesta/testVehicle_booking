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

//booking
$routes->get('booking', 'Booking::index');
$routes->get('booking/create', 'Booking::create');
$routes->post('booking/store', 'Booking::store');
$routes->get('booking/edit/(:num)', 'Booking::edit/$1');
$routes->post('booking/update/(:num)', 'Booking::update/$1');
$routes->post('booking/delete/(:num)', 'Booking::delete/$1');
$routes->get('booking/approval', 'Booking::approvalList');
$routes->get('booking/approve/(:num)/(:num)', 'Booking::approveAction/$1/$2');
$routes->get('booking/export', 'Booking::export');