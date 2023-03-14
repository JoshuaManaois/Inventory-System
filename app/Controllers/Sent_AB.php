<?php

namespace App\Controllers;

class Sent_AB extends BaseController
{
    public function index()
    {
       $data = [];
    helper(['form']);


    
       echo view('templates/header', $data);
       echo view('sent_AB');
       echo view('templates/footer');
   

    }
   
}
