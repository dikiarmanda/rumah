<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('agen', 'Home::agen');
$routes->get('kpr', 'Home::kpr');
$routes->get('kebijakan', 'Home::kebijakan');
$routes->get('syarat', 'Home::syarat');

$routes->get('cari-rumah', 'Jual::index');
$routes->get('cari-rumah/search', 'Jual::search');
$routes->get('cari-rumah/get_ajax', 'Jual::get_ajax');
$routes->get('cari-rumah/detail/(:num)', 'Jual::detail/$1');

$routes->get('sewa', 'Sewa::index');
$routes->get('sewa/search', 'Sewa::search');
$routes->get('sewa/get_ajax', 'Sewa::get_ajax');
$routes->get('sewa/detail/(:num)', 'Sewa::detail/$1');

$routes->get('artikel', 'Artikel::index');
$routes->get('artikel/search', 'Artikel::search');
$routes->get('artikel/get_ajax', 'Artikel::get_ajax');
$routes->get('artikel/(:any)', 'Artikel::detail/$1');

$routes->get('jual-rumah', 'GuestProperty::index');
$routes->post('jual-rumah/submit', 'GuestProperty::submit');
$routes->get('jual-rumah/success', 'GuestProperty::success');

$routes->get('login', 'Login::index');
$routes->post('user_login', 'Login::process');
$routes->get('logout', 'Login::logout');

$routes->get('unauthorized', 'Error::unauthorized');
$routes->get('not-found', 'Error::notfound');

// dashboard group
$routes->group('dashboard', ['namespace' => 'App\Controllers\Dashboard', 'filter' => 'auth'], function ($routes) {
  $routes->get('/', 'Home::index');

  $routes->group('laporan', ['filter' => 'auth:admin,owner'], function ($routes) {
    $routes->get('/', 'Laporan::index');
    $routes->get('penjualan', 'Laporan::penjualan');
    $routes->get('performa-agen', 'Laporan::performaAgen');
    $routes->get('detail-agen/(:num)', 'Laporan::detailAgen/$1');
    $routes->get('export-penjualan-pdf', 'Laporan::exportPenjualanPdf');
    $routes->get('export-penjualan-excel', 'Laporan::exportPenjualanExcel');
    $routes->get('export-performa-agen-pdf', 'Laporan::exportPerformaAgenPdf');
    $routes->get('export-performa-agen-excel', 'Laporan::exportPerformaAgenExcel');
    $routes->get('get-data-penjualan', 'Laporan::getDataPenjualan');
    $routes->get('get-data-performa-agen', 'Laporan::getDataPerformaAgen');
  });

  $routes->group('properti', function ($routes) {
    $routes->get('/', 'Properti::index');
    $routes->post('get_ajax', 'Properti::get_ajax');
    $routes->get('create', 'Properti::create');
    $routes->post('store', 'Properti::store');
    $routes->get('(:num)', 'Properti::detail/$1');
    $routes->post('update/(:num)', 'Properti::update/$1');
    $routes->post('favorite/(:num)', 'Properti::favorite/$1');
    $routes->post('disabled/(:num)', 'Properti::disabled/$1');
    $routes->post('delete/(:num)', 'Properti::delete/$1');
  });

  $routes->group('transaksi', function ($routes) {
    $routes->get('/', 'Transaksi::index');
    $routes->post('store', 'Transaksi::store');
    $routes->post('get_ajax', 'Transaksi::get_ajax');
    $routes->post('update/(:num)', 'Transaksi::update/$1');
    $routes->post('validasi/(:num)', 'Transaksi::validasi/$1');
    $routes->post('delete/(:num)', 'Transaksi::delete/$1');
  });

  $routes->group('artikel', function ($routes) {
    $routes->get('/', 'Artikel::index');
    $routes->post('get_ajax', 'Artikel::get_ajax');
    $routes->get('create', 'Artikel::create');
    $routes->get('(:num)', 'Artikel::detail/$1');
    $routes->post('store', 'Artikel::store');
    $routes->post('update/(:num)', 'Artikel::update/$1');
    $routes->post('delete/(:num)', 'Artikel::delete/$1');
  });

  $routes->group('kategori', ['filter' => 'auth:admin,owner'], function ($routes) {
    $routes->get('/', 'Kategori::index');
    $routes->post('store', 'Kategori::store');
    $routes->get('(:num)', 'Kategori::detail/$1');
    $routes->post('update/(:num)', 'Kategori::update/$1');
    $routes->post('disabled/(:num)', 'Kategori::disabled/$1');
  });

  $routes->group('leaderboard', function ($routes) {
    $routes->get('/', 'Leaderboard::index');
    $routes->post('store', 'Leaderboard::store');
    $routes->post('update/(:num)', 'Leaderboard::update/$1');
    $routes->post('delete/(:num)', 'Leaderboard::delete/$1');
  });

  $routes->group('user', ['filter' => 'auth:admin,owner'], function ($routes) {
    $routes->get('/', 'User::index');
    $routes->post('store', 'User::store');
    $routes->post('update/(:num)', 'User::update/$1');
    $routes->post('reset_password/(:num)', 'User::reset_password/$1');
    $routes->post('disabled/(:num)', 'User::disabled/$1');
  });

  $routes->group('setting', function ($routes) {
    $routes->get('/', 'Setting::index');
    $routes->post('update/(:num)', 'Setting::update/$1');
    $routes->post('password/(:num)', 'Setting::password/$1');
  });

  $routes->group('kontak', ['filter' => 'auth:admin,owner'], function ($routes) {
    $routes->get('/', 'Contact::index');
    $routes->post('update', 'Contact::update');
  });
});