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
$routes->get('/register', 'Home::index');
$routes->get('/dashboard', 'dashboard::index',['filter'=>'role:admin,user']);
$routes->get('/dashboard/index', 'dashboard::index',['filter'=>'role:admin,user']);
$routes->get('/adm', 'Adm::index',['filter'=>'role:admin']);
$routes->get('/adm/index', 'Adm::index',['filter'=>'role:admin']);
// create routes group for kis
$routes->group('kis',['filter' => 'role:admin,user'], function($routes) {
    $routes->get('/', 'Kis::index');
    $routes->get('input', 'Kis::input');
    $routes->get('usul', 'Kis::usul');
    $routes->get('cek_usul', 'Kis::cek_usul');
});
// create routes group for ppks
$routes->group('ppks',['filter' => 'role:admin,user'], function($routes) {
    $routes->get('/', 'Ppks::index');
    $routes->get('data', 'Ppks::data');
    $routes->get('tampil', 'Ppks::tampil');
    $routes->get('rekap', 'Ppks::rekap');
});


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
