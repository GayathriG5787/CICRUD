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

// Login page (shows form)
$routes->get('/login', 'Auth::login');

// Login form submission (handles authentication)
$routes->post('/login', 'Auth::authenticate');

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/dashboard', 'Users::dashboard');
    $routes->get('/profile/edit', 'Users::editProfile');
    $routes->post('/profile/update', 'Users::updateProfile');
    $routes->get('/profile/download', 'Users::downloadPdf');
});

$routes->get('/logout', 'Auth::logout');