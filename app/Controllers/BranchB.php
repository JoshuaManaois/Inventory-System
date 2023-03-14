<?php

namespace App\Controllers;

class BranchB extends BaseController
{
    public function index()
    {
        $data = [];
     helper(['form']);
        echo view('inventory_B');
     }
   
}
