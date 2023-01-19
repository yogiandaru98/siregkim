<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// AuthUser
$routes->get('login', 'AuthUser::index');
$routes->post('login/action', 'AuthUser::login');
$routes->get('/logout','AuthUser::logout');



//Global
$routes->get('dashboard', 'SemuaUser::index');




//mahasiswa
$routes->get('mahasiswa/profile', 'Mahasiswa::index');
$routes->post('mahasiswa/profile/create', 'Mahasiswa::saveProfile');
$routes->get('mahasiswa/profile/edit', 'Mahasiswa::editProfile');
$routes->post('mahasiswa/profile/edit/action', 'Mahasiswa::updateProfile');




//menu superadmin
$routes->get('superadmin/create', 'Superadmin::createAkun');
$routes->post('superadmin/create/akun', 'Superadmin::saveAkun');




// karina testing view
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'Pages::dashboard');
$routes->get('profile', 'Pages::profile');
$routes->get('pkl', 'Pages::pkl');
$routes->get('pra-ta', 'Pages::pra_ta');
$routes->get('ta-1', 'Pages::ta_1');
$routes->get('ta-2', 'Pages::ta_2');
$routes->get('kompre', 'Pages::kompre');
$routes->get('kompre', 'Pages::kompre');





//testing yogi
$routes->get('create-profile', 'Pages::createProfile');



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
