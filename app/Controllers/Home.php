<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [];
     helper(['form']);

     
        echo view('main');
     }
   
}
