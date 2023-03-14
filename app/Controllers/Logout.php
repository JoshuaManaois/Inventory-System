<?php

namespace App\Controllers;

class Logout extends BaseController
{
    public function index()
    {
       $data = [];
    helper(['form']);


    
       echo view('templates/header', $data);
       echo view('logout');
       echo view('templates/footer');
   

    }
   
}
