<?php

namespace App\Controllers;

class Edit_acc extends BaseController
{
    public function index()
    {
       $data = [];
    helper(['form']);


    
       echo view('templates/header', $data);
       echo view('edit_acc');
       echo view('templates/footer');
   

    }
   
}
?>