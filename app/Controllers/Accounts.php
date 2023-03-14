<?php

namespace App\Controllers;

class Accounts extends BaseController
{
    public function index()
    {
        $data = [];
     helper(['form']);
        echo view('accounts');
     }
   
}
