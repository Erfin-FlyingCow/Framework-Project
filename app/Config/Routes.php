<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/post','Post::index');
$routes->get('/mahasiswa','Mahasiswa::index');
$routes->get('/mahasiswa/create','Mahasiswa::create');
$routes->post('/mahasiswa/store','Mahasiswa::store');