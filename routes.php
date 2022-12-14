<?php

use App\Controllers\auth\LoginController;
use App\Controllers\auth\RegisterController;
use App\Controllers\backend\DashboardController;
use App\Controllers\frontend\HomeController;
use App\Controllers\frontend\UsersController;






//Frontend Routes
$router->controller('/', HomeController::class);
$router->controller('/users', UsersController::class);


//Auth Routes
//$router->controller('/login', LoginController::class);
//$router->controller('/register', RegisterController::class);

//Backend Routes
$router->controller('/dashboard', DashboardController::class);