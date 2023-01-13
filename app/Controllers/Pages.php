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

    public function pkl()
    {
        return view('pages/pkl');
    }
    public function pra_ta()
    {
        return view('pages/pra-ta');
    }
    public function ta_1()
    {
        return view('pages/ta-1');
    }
    public function ta_2()
    {
        return view('pages/ta-2');
    }
    public function kompre()
    {
        return view('pages/kompre');
    }
}
