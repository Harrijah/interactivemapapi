<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Home::index');
$routes->post('/entreecircuit', 'Circuit::entreecircuit');
$routes->get('/affichercircuit', 'Circuit::affichercircuit');
$routes->get('/affichercircuitbyid/(:any)', 'Circuit::affichercircuitbyid/$1');