<?php

namespace App\Controllers;

class Delete_A extends BaseController
{
    public function index()
    {
       $data = [];
    helper(['form']);


    
       echo view('templates/header', $data);
       echo view('delete_A');
       echo view('templates/footer');
   

    }
   
}
