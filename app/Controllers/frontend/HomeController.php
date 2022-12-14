<?php
namespace App\Controllers\frontend;
use App\Controllers\Controller;
use Illuminate\Validation\Validator;

class  HomeController extends Controller
{
    public function getIndex(){
        $this->view('home');
    }
    public function  getRegister(){
        $this->view('register');
    }
    public function  postRegister(){
       //  var_dump($_REQUEST);

      $validator = new Validator();
//
        var_dump($validator);

      //  die();
    }
}
