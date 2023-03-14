<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
       $data = [];
    helper(['form']);


    
       echo view('templates/header', $data);
       echo view('login');
       echo view('templates/footer');
   

    }
   
}
