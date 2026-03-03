<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/

$routes->get('users', 'Users::index');
$routes->get('users/create', 'Users::create');
$routes->post('users', 'Users::store');

$routes->get('users/edit/(:num)', 'Users::edit/$1');
$routes->post('users/update/(:num)', 'Users::update/$1');

/* ✅ Delete must be POST */
$routes->post('users/delete/(:num)', 'Users::delete/$1');