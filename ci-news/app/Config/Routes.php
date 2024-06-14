<?php

$routes->setDefaultController('Home::index');


$routes->group('login', function ($routes) {
    $routes->get('/', 'LoginController::index');
    $routes->post('/', 'LoginController::login');
    $routes->post('/', 'LoginController::logout');
});

$routes->group('dashboard', function ($routes) {
    $routes->get('/', 'Dashboard::index', ['filter' => 'auth']);
    $routes->get('delete/(:num)', 'Dashboard::delete/$1', ['filter' => 'auth']);
    $routes->get('edit/(:num)', 'FormBukuController::index/$1', ['filter' => 'auth']);
});

$routes->get('/', 'RegisterController::index');

$routes->group('register', function ($routes) {
    $routes->get('/', 'RegisterController::register');
    $routes->post('/', 'RegisterController::store');
});
$routes->group('logout', function ($routes) {
    $routes->get('/', 'LogoutController::index',  ['filter' => 'auth']);
});
$routes->group('FormBuku', function ($routes) {
    $routes->get('edit/(:num)', 'FormBukuController::index/$1', ['filter' => 'auth']);
    $routes->get('/', 'FormBukuController::index', ['filter' => 'auth']);
    $routes->post('store', 'FormBukuController::store');
});
