<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/form', 'Home::form');
$routes->post('simpan', 'Home::simpanForm');


$routes->get('login', 'Admin::login');
$routes->post('validLogin', 'Admin::validLogin');
$routes->get('/administrator', 'Admin::index', ['filter' => 'filterLogin']);

$routes->get('/p3/(:num)', 'Admin::p3Detail/$1' ,['filter' => 'filterLogin']);
$routes->get('/p3/(:num)/edit', 'Admin::p3Edit/$1', ['filter' => 'filterLogin']);
$routes->get('/p3/(:num)/delete', 'Admin::p3Delete/$1', ['filter' => 'filterLogin']);
$routes->post('/p3-update', 'Admin::p3Update', ['filter' => 'filterLogin']);
$routes->post('update-p3/status', 'Admin::updateStatusP3', ['filter' => 'filterLogin']);

$routes->get('logout', 'Admin::logout');

$routes->get('/cek-dokumen', 'Home::cekStatusDokumen');
