<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Shop::index');

$routes->get('/produk', 'Produk::index');

$routes->post('/checkout', 'Checkout::simpan');

$routes->get('/pesanan', 'Pesanan::index');