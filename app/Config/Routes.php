<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// user routes
$routes->get('/users', 'UserController::index');
$routes->post('/users/ajax-datatable', 'UserController::ajaxDataTables');
$routes->get('/users/create', 'UserController::create');
$routes->post('/users/store', 'UserController::store');
$routes->get('/users/edit/(:num)', 'UserController::edit/$1');
$routes->post('users/update/(:num)', 'UserController::update/$1');
$routes->delete('/users/delete/(:num)', 'UserController::destroy/$1');

// department routing
$routes->get('/departments', 'DepartmentController::index');
$routes->get('/departments/create', 'DepartmentController::create');
$routes->post('/departments/store', 'DepartmentController::store');
$routes->get('/departments/edit/(:num)', 'DepartmentController::edit/$1');
$routes->post('departments/update/(:num)', 'DepartmentController::update/$1');
$routes->delete('/departments/delete/(:num)', 'DepartmentController::destroy/$1');

//designation routing
$routes->get('/designations', 'DesignationController::index');
$routes->get('/designations/create', 'DesignationController::create');
$routes->post('/designations/store', 'DesignationController::store');
$routes->get('/designations/edit/(:num)', 'DesignationController::edit/$1');
$routes->post('designations/update/(:num)', 'DesignationController::update/$1');
$routes->delete('/designations/delete/(:num)', 'DesignationController::destroy/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
