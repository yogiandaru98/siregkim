<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ValidasiReg extends BaseController
{
    public function __construct()
    {
        $this->RegistrasiPKL = new \App\Models\RegistrasiPKL();

    }
    public function readPkl()
    {
        $data = [
            'title' => 'Data PKL',
            'regPkl' => $this->RegistrasiPKL->getPklAll(),
        ];
        return view('pages/validasi/validasiPkl/read', $data);
    }
    public function detailPkl($id)
    {
        $data = [
            'title' => 'Detail PKL',
            'regPkl' => $this->RegistrasiPKL->getDetailPkl($id),
        ];
        return view('pages/validasi/validasiPkl/detail', $data);
    }
    public function updatePkl($id)
    {
        $data = [
            'title' => 'Update PKL',
            'regPkl' => $this->RegistrasiPKL->getDetailPkl($id),
        ];
        return view('pages/validasi/validasiPkl/update', $data);
    }
    public function savePkl($id)
    {
        $validatedPkl = $this->validate([
            'status_pkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status harus diisi',
                ]
            ],
        ]);
        if(!$validatedPkl){
            return redirect()->to('/updatePkl/'.$id)->withInput();
        }
        $dataPkl=[
            'status_pkl' =>  htmlspecialchars($this->request->getVar('status_pkl')),
            'status_bukti_seminar' => htmlspecialchars($this->request->getVar('status_bukti_seminar')),
        ];
        $this->RegistrasiPKL->update($id, $dataPkl);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to('/readPkl');
    }

}
