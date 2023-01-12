<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function dashboard()
    {
        return view('pages/index');
    }

    public function profile()
    {
        return view('pages/profile');
    }
}
