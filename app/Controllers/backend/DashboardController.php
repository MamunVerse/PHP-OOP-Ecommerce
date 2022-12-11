<?php
namespace App\Controllers\backend;

use App\Controllers\Controller;

class DashboardController extends Controller
{
    public function getIndex(){
        $this->view('dashboard');
    }
}