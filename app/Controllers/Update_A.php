<?php

namespace App\Controllers;

class Update_A extends BaseController
{
    public function index()
    {
       $data = [];
    helper(['form']);


    
       echo view('templates/header', $data);
       echo view('update_A');
       echo view('templates/footer');
   

    }
   
}
