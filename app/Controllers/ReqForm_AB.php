<?php

namespace App\Controllers;

class ReqForm_AB extends BaseController
{
    public function index()
    {
        $data = [];
     helper(['form']);

     
        echo view('request_AB');
     }
   
}
