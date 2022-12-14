<?php
namespace App\Controllers\auth;

use App\Controllers\Controller;
use Illuminate\Validation\Validator;

class RegisterController extends Controller
{
    public  function  getIndex(){
        $this->view('register');
    }

    public function  postRegisterController(){
       // var_dump($_REQUEST);

        $validator = new Validator();

        var_dump($validator);

        die();
    }
}
