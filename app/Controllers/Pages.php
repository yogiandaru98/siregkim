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
        return view('pages/mahasiswa/profile');
    }

    public function pkl()
    {
        return view('pages/mahasiswa/pkl');
    }
    public function pra_ta()
    {
        return view('pages/mahasiswa/pra-ta');
    }
    public function ta_1()
    {
        return view('pages/mahasiswa/ta-1');
    }
    public function ta_2()
    {
        return view('pages/mahasiswa/ta-2');
    }
    public function kompre()
    {
        return view('pages/mahasiswa/kompre');
    }
    public function createProfile()
    {
        $data=[
            'title' => 'Lengkapi Profile Anda',
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/mahasiswa/profile/create', $data);
    }
    public function forgotpass()
    {
        return view('pages/auth/forgotpass');
    }
}
