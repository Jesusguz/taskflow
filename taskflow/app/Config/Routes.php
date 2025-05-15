<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('/', ['filter' => 'session'], static function ($routes) {

    $routes->get('projects', 'ProjectController::index', ['as' => 'projects.index']); // GET /projects -> ProjectController::index
    $routes->get('projects/create', 'ProjectController::create', ['as' => 'projects.create']); // GET /projects/create -> ProjectController::create
    $routes->post('projects', 'ProjectController::store', ['as' => 'projects.store']); // POST /projects -> ProjectController::store
    // TODO: Definiremos aquí las rutas para Proyectos y Tareas
    // Por ahora, podemos poner una ruta de prueba o dejarla vacía

    // Ejemplo: Si creas un DashboardController
    // $routes->get('dashboard', 'DashboardController::index', ['as' => 'dashboard']);

    // Aquí irán las rutas de proyectos que definiremos más adelante
    // $routes->get('projects', 'ProjectController::index', ['as' => 'projects.index']);
    // $routes->get('projects/create', 'ProjectController::create', ['as' => 'projects.create']);
    // $routes->post('projects', 'ProjectController::store', ['as' => 'projects.store']);

});
service('auth')->routes($routes);
$routes->get('/', 'Home::index');
