<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/add', 'Home::add');
$routes->post('/store', 'Home::store');
$routes->get('/edit/(:num)', 'Home::edit/$1');
$routes->get('/dalet/(:num)', 'Home::dalet/$1');




