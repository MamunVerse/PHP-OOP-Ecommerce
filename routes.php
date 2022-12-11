<?php

use App\Controllers\backend\DashboardController;
use App\Controllers\frontend\HomeController;
use App\Controllers\frontend\UsersController;


$router->controller('/', HomeController::class);
$router->controller('/users', UsersController::class);
$router->controller('/dashboard', DashboardController::class);