<?php

namespace App\Controllers;

class Delete_B extends BaseController
{
    public function index()
    {
       $data = [];
    helper(['form']);


    
       echo view('templates/header', $data);
       echo view('delete_B');
       echo view('templates/footer');
   

    }
   
}
