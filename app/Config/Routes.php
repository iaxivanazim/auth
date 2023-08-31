<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'SignupController::index');
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'LoginController/loginAuth', 'LoginController::loginAuth');
$routes->match(['get', 'post'], 'LoginController/logout', 'LoginController::logout');
$routes->get('/signup', 'SignupController::index');
$routes->get('/profile', 'ProfileController::index');

