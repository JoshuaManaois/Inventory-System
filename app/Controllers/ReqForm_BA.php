<?php

namespace App\Controllers;

class ReqForm_BA extends BaseController
{
    public function index()
    {
        $data = [];
     helper(['form']);

     
        echo view('request_BA');
     }
   
}
