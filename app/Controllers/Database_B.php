<?php

namespace App\Controllers;

class Database_B extends BaseController
{
    public function index()
    {
       $data = [];
    helper(['form']);


    
       echo view('templates/header', $data);
       echo view('add_B');
       echo view('templates/footer');
   

    }
   
}
