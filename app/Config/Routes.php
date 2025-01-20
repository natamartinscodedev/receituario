<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Ingrediente::index');
$routes->get('/receita', 'Ingrediente::index');
$routes->get('/receita/del/(:num)', 'Ingrediente::del/$1');
$routes->post('/receita/add', 'Ingrediente::add');
$routes->post('/receita/(:num)', 'Ingrediente::edit/$1');
