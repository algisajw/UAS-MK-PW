<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->get('login', 'Auth::login');
$routes->post('loginProcess', 'Auth::loginProcess');
$routes->get('register', 'Auth::register');
$routes->post('registerProcess', 'Auth::registerProcess');
$routes->get('logout', 'Auth::logout');

$routes->group('dashboard', ['filter' => 'authFilter'], function($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('create', 'Dashboard::create');
    $routes->post('store', 'Dashboard::store');
    $routes->get('edit/(:num)', 'Dashboard::edit/$1');
    $routes->post('update/(:num)', 'Dashboard::update/$1');
    $routes->get('delete/(:num)', 'Dashboard::delete/$1');
});
