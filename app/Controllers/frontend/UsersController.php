<?php
namespace App\Controllers\frontend;
use App\Controllers\Controller;

class UsersController extends Controller
{
    public function getIndex(){
        $this->view('login');
    }
}