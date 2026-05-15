<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Auth
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::loginProcess');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::registerProcess');
$routes->get('/logout', 'Auth::logout');

// Dashboard
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/create', 'Dashboard::create');
$routes->post('/dashboard/store', 'Dashboard::store');
$routes->get('/dashboard/edit/($id)', 'Dashboard::edit/$id');
$routes->post('/dashboard/update/(:$id)', 'Dashboard::update/$id');
$routes->get('/dashboard/delete/(:$id)', 'Dashboard::delete/$id');