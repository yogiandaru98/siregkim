<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SemuaUser extends BaseController
{
    public function index()
    {
        //
        $data = [
            'title' => 'Dashboard',
        ];
        return view('pages/global/dashboard', $data);
    }
}
