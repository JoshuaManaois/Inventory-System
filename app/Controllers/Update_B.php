<?php

namespace App\Controllers;

class Update_B extends BaseController
{
    public function index()
    {
       $data = [];
    helper(['form']);


    
       echo view('templates/header', $data);
       echo view('update_B');
       echo view('templates/footer');
   

    }
   
}
