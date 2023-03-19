<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SemuaUser extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        $this->modelRegistrasi = new \App\Models\RegistrasiPKL();
        $this->modelBuktiSeminar = new \App\Models\BuktiSeminarPKL();
        $this->modelJadwalSeminar = new \App\Models\JadwalSeminarPKL();
    }
    public function index()
    {
        //
        $data = [
            'title' => 'Dashboard',
            'regPkl' => $this->modelRegistrasi->where('status_pkl', 'Invalid')->orWhere('status_pkl', 'Diproses')->countAllResults(),
            'buktiSeminar' => $this->modelBuktiSeminar->where('status_bukti_seminar', 'Invalid')->orWhere('status_bukti_seminar', 'Diproses')->countAllResults(),
            'jadwalSeminar' => $this->modelJadwalSeminar->sumPklJadwalAll(),
        ];
        return view('pages/global/dashboard', $data);
    }
}
