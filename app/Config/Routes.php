<?php

namespace Config;

use App\Controllers\Lokasi;
use CodeIgniter\Commands\Utilities\Routes;

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
$routes->setDefaultController('AuthUser');
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

// catatan
//  nama
// npm
// judul_pkl
// prodi

// dosen_pembimbing_pkl
// nip_dosen_pembimbing_pkl

// dosen_pembimbing_akademik
// nip_dosen_pembimbing_akademik

// pembimbing_lapangan
// nip_pembimbing_lapangan

// mitra


//mahasiswa
$routes->get('mahasiswa/profile', 'Mahasiswa::index');
$routes->post('mahasiswa/profile/create', 'Mahasiswa::saveProfile');
$routes->get('mahasiswa/profile/edit', 'Mahasiswa::editProfile');
$routes->post('mahasiswa/profile/edit/action', 'Mahasiswa::updateProfile');
$routes->get('user/edit/password', 'AuthUser::gantiPassword');
$routes->post('user/edit/password/action', 'AuthUser::gantiPasswordAction');

$routes->get('mahasiswa/pkl', 'PKL::index');
$routes->post('mahasiswa/pkl/create/action', 'PKL::savePkl');
$routes->get('mahasiswa/pkl/edit', 'PKL::editPkl');
$routes->post('mahasiswa/pkl/edit/action', 'PKL::updatePkl');

$routes->get('mahasiswa/pkl/buktiSeminar/create', 'PKL::createBuktiSeminar');
$routes->post('mahasiswa/pkl/buktiSeminar/create/action', 'PKL::saveBuktiSeminar');
$routes->get('mahasiswa/pkl/buktiSeminar/edit', 'PKL::editBuktiSeminar');
$routes->post('mahasiswa/pkl/buktiSeminar/edit/action', 'PKL::updateBuktiSeminar');

//validasi
$routes->get('validasi/pkl', 'ValidasiReg::readPkl');
$routes->get('validasi/pkl/(:num)', 'ValidasiReg::updatePkl/$1');
$routes->post('validasi/pkl/(:num)/action', 'ValidasiReg::savePkl/$1');

$routes->get('validasi/seminar', 'ValidasiReg::readBukti');
$routes->get('validasi/seminar/(:num)', 'ValidasiReg::updateBukti/$1');
$routes->post('validasi/seminar/(:num)/action', 'ValidasiReg::saveBukti/$1');

//kelengkapan
$routes->get('kelengkapan', 'Kelengkapan::read');
$routes->get('kelengkapan/edit/(:num)', 'Kelengkapan::update/$1');
$routes->post('kelengkapan/edit/(:num)/action', 'Kelengkapan::save/$1');


//template
$routes->get('template', 'template::read');
$routes->get('template/edit/(:num)', 'template::update/$1');
$routes->post('template/edit/(:num)/action', 'template::save/$1');

//akun
$routes->get('template', 'template::read');
$routes->get('template/edit/(:num)', 'template::update/$1');
$routes->post('template/edit/(:num)/action', 'template::save/$1');

// Lokasi
$routes->get('lokasi', 'Lokasi::read');
$routes->get('lokasi/create', 'Lokasi::create');
$routes->post('lokasi/create/action', 'Lokasi::save');
$routes->get('lokasi/update/(:num)', 'Lokasi::update/$1');
$routes->post('lokasi/update/(:num)/action', 'Lokasi::saveUpdate/$1');


//jadwal
$routes->get('jadwal', 'Jadwal::index');
$routes->get('jadwal/create/(:num)', 'Jadwal::create/$1');
$routes->post('jadwal/create/(:num)/action', 'Jadwal::saveJadwal/$1');
$routes->get('jadwal/update/(:num)', 'Jadwal::update/$1');
$routes->post('jadwal/update/(:num)/action', 'Jadwal::saveUpdate/$1');





//menu superadmin
$routes->get('superadmin/akun', 'Superadmin::index');
$routes->get('superadmin/akun/create', 'Superadmin::createAkun');
$routes->post('superadmin/akun/create/action', 'Superadmin::saveAkun');
$routes->get('superadmin/akun/edit/(:num)', 'Superadmin::editAkun/$1');
$routes->post('superadmin/akun/edit/(:num)/action', 'Superadmin::saveEditAkun/$1');
$routes->post('superadmin/akun/delete/(:num)', 'Superadmin::deleteAkun/$1');




// // karina testing view
$routes->get('/', 'AuthUser::index');
// $routes->get('forgotpass', 'Pages::forgotpass');
// // $routes->get('dashboard', 'Pages::dashboard');
// // $routes->get('profile', 'Pages::profile');
// $routes->get('pkl', 'Pages::pkl');
// $routes->get('pra-ta', 'Pages::pra_ta');
// $routes->get('ta-1', 'Pages::ta_1');
// $routes->get('ta-2', 'Pages::ta_2');
// $routes->get('kompre', 'Pages::kompre');
// $routes->get('kompre', 'Pages::kompre');

// $routes->get('mahasiswa/prata', 'Mahasiswa::Pkl');
// $routes->post('mahasiswa/prata/create/action', 'Mahasiswa::savePkl');
// $routes->get('mahasiswa/prata/edit', 'Mahasiswa::editPkl');
// $routes->post('mahasiswa/prata/edit/action', 'Mahasiswa::updatePkl');
// $routes->post('mahasiswa/prata/buktiSeminar', 'Mahasiswa::updateBuktiSeminar');





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
