<?php

namespace App\Controllers;

class User_login extends BaseController
{
    public function index()
    {
        $data = [];
     helper(['form']);

     
        echo view('user_login');
     }
   
}
