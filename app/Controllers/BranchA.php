<?php

namespace App\Controllers;

class BranchA extends BaseController
{
    public function index()
    {
        $data = [];
     helper(['form']);
        echo view('inventory_A');
     }
   
}
