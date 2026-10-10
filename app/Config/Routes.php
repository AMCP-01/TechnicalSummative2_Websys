<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('about', 'aboutController::about');
$routes->get('pages', 'pagesController::pages');

$routes->get('login', 'AuthController::login');
$routes->post('authenticate', 'AuthController::authenticate');
$routes->get('logout', 'AuthController::logout');

$routes->get('tasks', 'TaskController::tasks');

$routes->group('', ['filter' => 'auth'], static function ($routes) {

    $routes->get('customer', 'customerController::customer');
    $routes->get('customer/new', 'customerController::new');
    $routes->post('customer/create', 'customerController::create');
    $routes->get('customer/edit/(:num)', 'customerController::edit/$1');
    $routes->post('customer/update/(:num)', 'customerController::update/$1');

    $routes->get('user', 'userController::user');
    $routes->get('user/new', 'userController::new');
    $routes->post('user/create', 'userController::create');
    $routes->get('user/edit/(:num)', 'userController::edit/$1');
    $routes->post('user/update/(:num)', 'userController::update/$1');

    
});
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('tasks/new', 'TaskController::new');
    $routes->post('tasks/create', 'TaskController::create');

    $routes->get('tasks/edit/(:num)', 'TaskController::edit/$1');
    $routes->post('tasks/update/(:num)', 'TaskController::update/$1');

    $routes->post('tasks/archive/(:num)', 'TaskController::archive/$1');
});

