<?php
namespace App\Controllers\frontend;
use App\Controllers\Controller;

class  HomeController extends Controller
{
    public function getIndex(){
        $this->view('home');
    }
}
