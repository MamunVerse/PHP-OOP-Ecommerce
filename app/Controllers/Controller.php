<?php

namespace App\Controllers;

class Controller
{
    public function view($view)
    {
        require_once __DIR__ . '/../../views/'.$view.'.php';
    }
}
