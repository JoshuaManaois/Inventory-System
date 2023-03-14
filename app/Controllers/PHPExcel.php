<?php

namespace App\Controllers;

class PHPExcel extends BaseController
{
    public function index()
    {
       $data = [];
    helper(['form']);


    
       echo view('templates/header', $data);
       echo view('PHPExcel');
       echo view('templates/footer');
   

    }
   
}
