<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->post('/auth/login', 'AuthController::login');
$routes->post('/logout', 'AuthController::logout');
$routes->get('/dashboard', 'Home::welcome');

// Pages
$routes->get('/orang_tua', 'OrangTuaController::index');
$routes->get('/orang_tua/tambah', 'OrangTuaController::create');
$routes->get('/orang_tua/edit/(:num)', 'OrangTuaController::edit/$1');
// Function
$routes->get('/orang_tua/(:segment)', 'OrangTuaController::show/$1');
$routes->post('/orang_tua/store', 'OrangTuaController::store');
$routes->post('/orang_tua/update/(:num)', 'OrangTuaController::update/$1');
$routes->get('/orang_tua/delete/(:num)', 'OrangTuaController::delete/$1');
// Pages
$routes->get('/guru', 'GuruController::index' );
$routes->get('/guru/tambah', 'GuruController::create');
$routes->get('/guru/edit/(:num)', 'GuruController::edit/$1');
// Function
$routes->get('/guru/(:segment)', 'GuruController::show/$1');
$routes->post('/guru/store', 'GuruController::store');
$routes->post('/guru/update/(:num)', 'GuruController::update/$1');
$routes->get('/guru/delete/(:num)', 'GuruController::delete/$1');
// Pages
$routes->get('/siswa', 'SiswaController::index');
$routes->get('/siswa/tambah', 'SiswaController::create');
$routes->get('/siswa/edit/(:num)', 'SiswaController::edit/$1');
// Function
$routes->get('/siswa/(:segment)', 'SiswaController::show/$1');
$routes->post('/siswa/store', 'Siswacontroller::store');
$routes->post('/siswa/update/(:num)', 'SiswaController::update/$1');
$routes->get('/siswa/delete/(:num)', 'SiswaController::delete/$1');
// Pages
$routes->get('/kelas', 'KelasController::index');
$routes->get('/kelas/tambah', 'KelasController::create');
$routes->get('/kelas/edit/(:num)', 'KelasController::edit/$1');
// Function
$routes->get('/kelas/(:segment)', 'KelasController::show/$1');
$routes->post('/kelas/store', 'KelasController::store');
$routes->post('/kelas/update/(:num)', 'KelasController::update/$1');
$routes->get('/kelas/delete/(:num)', 'KelasController::delete/$1');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
