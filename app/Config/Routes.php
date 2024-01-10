<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth\Login::index');
$routes->post('/login', 'Auth\Login::login');
$routes->get('/logout', 'Auth\Login::logout');
$routes->post('/cek', 'Auth\Login::cek');


$routes->group('admin', ['filter' => 'role'], function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');
    $routes->get('read_warga', 'Admin\Dashboard::read_warga');
    $routes->get('create_warga', 'Admin\Dashboard::create_warga');
    $routes->post('create_warga', 'Admin\Dashboard::create_warga');
    $routes->get('delete_warga/(:any)', 'Admin\Dashboard::delete_warga/$1');
    $routes->get('update_warga/(:any)', 'Admin\Dashboard::update_warga/$1');
    $routes->post('action_update_warga', 'Admin\Dashboard::action_update_warga');

    $routes->get('read_bangunan', 'Admin\Dashboard::read_bangunan');
    $routes->get('create_bangunan', 'Admin\Dashboard::create_bangunan');
    $routes->post('create_bangunan', 'Admin\Dashboard::create_bangunan');
    $routes->get('delete_bangunan/(:any)', 'Admin\Dashboard::delete_bangunan/$1');
    $routes->get('update_bangunan/(:any)', 'Admin\Dashboard::update_bangunan/$1');
    $routes->post('action_update_bangunan', 'Admin\Dashboard::action_update_bangunan');

    $routes->get('transaksi', 'Admin\Dashboard::transaksi');
    $routes->post('transaksi', 'Admin\Dashboard::transaksi');
    $routes->get('history_transaksi', 'Admin\Dashboard::read_transaksi');

    
});
$routes->group('user', ['filter' => 'role'], function ($routes) {
    $routes->get('dashboard', 'User\Dashboard::index');
    $routes->get('read_warga', 'User\Dashboard::read_warga');
    $routes->get('read_bangunan', 'User\Dashboard::read_bangunan');
    $routes->get('history_transaksi', 'User\Dashboard::read_transaksi');
});
