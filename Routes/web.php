<?php

use App\Home\Presentation\Controller\HomeController;
use App\Auth\Presentation\Controllers\AuthController;

$router->get('/', [HomeController::class, 'index']);

//$router->get('/', [AuthController::class, 'showLogin']);
//$router->post('/', [AuthController::class, 'login']);

$router->get('/login', [AuthController::class, 'showLogin']);
$router->post('/login', [AuthController::class, 'login']);

$router->get('/register', [AuthController::class, 'showRegister']);
$router->post('/register', [AuthController::class, 'register']);

$router->get('/logout', [AuthController::class, 'logout']);