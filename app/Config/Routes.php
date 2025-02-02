<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// intern routes
$routes->get('/', 'LoggerController::index', ['filter' => 'intern']);
$routes->get('/login', 'LoginController::internLoginPage');
$routes->post('/login', 'LoginController::internLogin');
$routes->post('/logger/time_in', 'LoggerController::clockIn', ['filter' => 'intern']);
$routes->post('/logger/time_out', 'LoggerController::clockOut', ['filter' => 'intern']);
$routes->get('/logout', 'LoginController::internLogout', ['filter' => 'intern']);

// admin routes
$routes->get('admin', 'DTRController::timelogsPage', ['filter' => 'user']);
$routes->get('admin/login', 'LoginController::loginPage');
$routes->post('admin/login', 'LoginController::login');
$routes->get('admin/accumulated', 'DTRController::accumulatedHoursPage', ['filter' => 'user']);
$routes->get('admin/users', 'UsersController::usersPage', ['filter' => 'user']);
$routes->get('admin/interns', 'UsersController::internsPage', ['filter' => 'user']);
$routes->post('admin/interns/new', 'UsersController::createIntern', ['filter' => 'user']);
$routes->get('admin/users/status', 'UsersController::setStatus', ['filter' => 'user']);
$routes->post('admin/users/new', 'UsersController::createUser', ['filter' => 'user']);
$routes->post('admin/users/update', 'UsersController::updateUser', ['filter' => 'user']);
$routes->post('admin/updateTimelog', 'DTRController::updateTimelog', ['filter' => 'user']);