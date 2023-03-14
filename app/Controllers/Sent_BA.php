<?php

namespace App\Controllers;

class Sent_BA extends BaseController
{
    public function index()
    {
       $data = [];
    helper(['form']);


    
       echo view('templates/header', $data);
       echo view('sent_BA');
       echo view('templates/footer');
   

    }
   
}
