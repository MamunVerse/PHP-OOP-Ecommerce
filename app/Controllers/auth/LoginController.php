<?php
namespace App\Controllers\auth;

use App\Controllers\Controller;

class LoginController extends Controller
{
    public function getIndex(){
        $this->view('login');
    }
}