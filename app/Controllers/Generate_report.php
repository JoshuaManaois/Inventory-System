<?php

namespace App\Controllers;

class Generate_report extends BaseController
{
    public function index()
    {
       $data = [];
    helper(['form']);


    
       echo view('templates/header', $data);
       echo view('generate_report');
       echo view('templates/footer');
   

    }
   
}
