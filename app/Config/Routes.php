<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

service('auth')->routes($routes);

//--API Routes
$routes->group("api", ["namespace" => "App\Controllers"], function ($routes) {

    $routes->get("test", "AuthController::index", ["filter" => "apiauth"]);//
    $routes->get("invalid-access", "AuthController::accessDenied");

    // Post
    $routes->post("register", "AuthController::register");

    // Post
    $routes->post("login", "AuthController::login");

    // Get
    $routes->get("profile", "AuthController::profile", ["filter" => "apiauth"]);

    // Get
    $routes->get("logout", "AuthController::logout", ["filter" => "apiauth"]);
});
