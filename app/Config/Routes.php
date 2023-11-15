<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);

$routes->get('/', 'Pages::index');

$routes->get('/buku/tambah', 'Buku::tambah');
$routes->get('/buku/ubah/(:segment)', 'Buku::ubah/$1');
$routes->delete('/buku/(:num)', 'Buku::hapus/$1');
$routes->get('/buku/(:any)', 'Buku::detail/$1');

$routes->get('/anggota/tambah', 'Anggota::tambah');
$routes->get('/anggota/ubah/(:segment)', 'Anggota::ubah/$1');
$routes->delete('/anggota/(:num)', 'Anggota::hapus/$1');