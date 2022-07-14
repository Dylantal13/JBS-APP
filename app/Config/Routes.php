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
$routes->setDefaultController('Dashboard');
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

$routes->get('login', 'LoginController::login', ['as' => 'login']);
$routes->post('login', 'LoginController::attemptLogin');

$routes->get('logout', 'LoginController::logout');


$routes->get("/", 'Dashboard::index', ["filter" => "auth"]);
$routes->get("/comisiones", 'ComisionController::getAll', ["filter" => "auth"]);
$routes->post("/comisiones/getAllQuery", 'ComisionController::getAllQuery');

$routes->get("/registros", 'RegistroController::getAll', ["filter" => "auth"]);
$routes->post("/registros/getAllQuery", 'RegistroController::getAllQuery');
$routes->get("/registros/crear", 'RegistroController::crear', ["filter" => "auth"]);

/* Usuarios */
$routes->get("/usuarios", 'UsuarioController::getAll', ["filter" => "auth"]);
/* $routes->group("/", ["filter" => "auth"] , function($routes){
    $routes->get('/', 'Dashboard::index');
}); */
$routes->get("/capacitaciones", 'CapacitacionController::getAll');
$routes->post("/capacitaciones/getAllQuery", 'CapacitacionController::getAllQuery');

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
