<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\AppointmentController;

session_start();

$router = new Router();

// Define routes
$router->addRoute('GET', '/', [HomeController::class, 'index']);
$router->addRoute('GET', '/login', [AuthController::class, 'loginForm']);
$router->addRoute('POST', '/login', [AuthController::class, 'login']);
$router->addRoute('GET', '/register', [AuthController::class, 'registerForm']);
$router->addRoute('POST', '/register', [AuthController::class, 'register']);
$router->addRoute('GET', '/logout', [AuthController::class, 'logout']);
$router->addRoute('GET', '/appointments', [AppointmentController::class, 'index']);
$router->addRoute('POST', '/appointments', [AppointmentController::class, 'create']);

// Dispatch the request
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

