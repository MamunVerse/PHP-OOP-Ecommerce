<?php
namespace App\Controllers\auth;

use App\Controllers\Controller;

class RegisterController extends Controller
{
    public  function  getIndex(){
        $this->view('register');
    }

    public function  postRegister(){

    }
}
