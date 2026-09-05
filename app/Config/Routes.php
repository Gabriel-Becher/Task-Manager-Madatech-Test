<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->addRedirect('/', 'tasks');

$routes->group('tasks', function ($routes) {
    $routes->get('/', 'TaskController::index');
    $routes->get('new', 'TaskController::create');
    $routes->post('/', 'TaskController::store');

    $routes ->get('edit/(:num)', 'TaskController::edit/$1');
    $routes->post('edit/(:num)', 'TaskController::update/$1');
    $routes->delete('(:num)', 'TaskController::delete/$1');

});

$routes->group('api/tasks', function ($routes) {
    $routes->get('/', 'TaskApiController::index');
    $routes->post('/', 'TaskApiController::store');
    $routes->get('(:num)', 'TaskApiController::show/$1');
    $routes->put('(:num)', 'TaskApiController::update/$1');
    $routes->delete('(:num)', 'TaskApiController::delete/$1');
});