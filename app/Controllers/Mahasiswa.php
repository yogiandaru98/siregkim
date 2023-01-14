<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Mahasiswa extends BaseController

    
    public function __construct()
    {
        $this->modelMahasiswa = new \App\Models\Mahasiswa();
    }
    
{
    public function index()
    {
        //
    }
}
