<?php

namespace App\Controllers;

class Add_acc extends BaseController
{
    public function index()
    {
        $data = [];
     helper(['form']);
        echo view('add_acc');
     }
   
}
