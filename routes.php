<?php

use App\Controllers\auth\LoginController;
use App\Controllers\auth\RegisterController;
use App\Controllers\backend\DashboardController;
use App\Controllers\frontend\HomeController;
use App\Controllers\frontend\UsersController;



//Auth Routes
$router->controller('/register', RegisterController::class);
$router->controller('/login', LoginController::class);



//Frontend Routes
$router->controller('/', HomeController::class);
$router->controller('/users', UsersController::class);



//Backend Routes
$router->controller('/dashboard', DashboardController::class);