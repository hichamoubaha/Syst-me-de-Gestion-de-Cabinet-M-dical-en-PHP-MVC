<?php

// Autoload classes
spl_autoload_register(function ($class_name) {
    if (file_exists("../app/controllers/$class_name.php")) {
        require_once "../app/controllers/$class_name.php";
    } elseif (file_exists("../app/models/$class_name.php")) {
        require_once "../app/models/$class_name.php";
    } elseif (file_exists("../config/$class_name.php")) {
        require_once "../config/$class_name.php";
    }
});

// Start session
session_start();

// Create router instance
$router = new Router();

// Define routes
$router->addRoute('/', 'UserController', 'login');
$router->addRoute('/register', 'UserController', 'register');
$router->addRoute('/login', 'UserController', 'login');
$router->addRoute('/logout', 'UserController', 'logout');
$router->addRoute('/rendez-vous', 'RendezVousController', 'list');
$router->addRoute('/rendez-vous/create', 'RendezVousController', 'create');

// Get current URL
$url = $_SERVER['REQUEST_URI'];

// Dispatch route
$router->dispatch($url);

