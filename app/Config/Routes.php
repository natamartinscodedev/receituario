<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/receita', 'Ingrediente::index');
$routes->get('/receita/del/(:num)', 'Ingrediente::del/$1');
