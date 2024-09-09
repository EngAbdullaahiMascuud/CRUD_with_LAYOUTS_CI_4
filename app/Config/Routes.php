<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::add_user');
$routes->get('/register', 'Home::register');
$routes->post('/login', 'Home::login');

$routes->group('home', ['filter' => 'auth'], function($routes) {
    $routes->get('index', 'Home::index');
    $routes->get('logout', 'Home::logout');
    $routes->post('tt', 'Home::tt');

    $routes->get('add', 'Home::add');
    $routes->post('store', 'Home::store');
    $routes->get('edit/(:num)', 'Home::edit/$1');
    $routes->get('dalet/(:num)', 'Home::dalet/$1');
    
});

// $routes->get('/add_user', 'Home::add_user');
// $routes->get('/registerr', 'Home::registerr');




