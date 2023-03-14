<?php

namespace App\Controllers;

class Database_A extends BaseController
{
    public function index()
    {
       $data = [];
    helper(['form']);


    
       echo view('templates/header', $data);
       echo view('add_A');
       echo view('templates/footer');
   

    }
   
}
