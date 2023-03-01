<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ValidasiReg extends BaseController
{
    public function __construct()
    {
        $this->RegistrasiPKL = new \App\Models\RegistrasiPKL();
        $this->BuktiSeminar = new \App\Models\BuktiSeminarPKL();
        $this->session = session();

    }
    public function readPkl()
    {
        $data = [
            'title' => 'Registrasi',
            'regPkl' => $this->RegistrasiPKL->getPklAll(),
        ];
        return view('pages/validasi/pkl/read', $data);
    }
    public function detailPkl($id)
    {
        $data = [
            'title' => 'Detail PKL',
            'regPkl' => $this->RegistrasiPKL->getDetailPklAdmin($id),
        ];
        return view('pages/validasi/pkl/detail', $data);
    }
    public function updatePkl($id)
    {
        $data = [
            'title' => 'Registrasi',
            'pkl' => $this->RegistrasiPKL->getDetailPklAdmin($id),
        ];
        return view('pages/validasi/pkl/updatePkl', $data);
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
            'pesan_admin' =>  htmlspecialchars($this->request->getVar('pesan_admin')),
        ];
        $this->RegistrasiPKL->update($id, $dataPkl);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to('/validasi/pkl');
    }

    public function readBukti(){
        $data = [
            'title' => 'Bukti',
            'regBukti' => $this->BuktiSeminar->getBuktiAll(),
        ];
        return view('pages/validasi/bukti/read', $data);
    }

    public function updateBukti($id)
    {
        $data = [
            'title' => 'Bukti',
            'regBukti' => $this->BuktiSeminar->getDetailBukti($id),
            'pkl' => $this->RegistrasiPKL->getDetailPklAdmin($id),
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/validasi/bukti/updateBukti', $data);
    }
    public function saveBukti($id)
    {
        $validatedBukti = $this->validate([
            'status_bukti_seminar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status harus diisi',
                ]
            ],
        ]);
        $id_pkl = $this->BuktiSeminar->where('id_bukti_seminar_pkl', $id)->first();
        if(!$validatedBukti){
            return redirect()->to('/validasi/seminar/'.$id_pkl['id_pkl'])->withInput();
        }
        $dataBukti=[
            'status_bukti_seminar' =>  htmlspecialchars($this->request->getVar('status_bukti_seminar')),
            'pesan_admin' =>  htmlspecialchars($this->request->getVar('pesan_admin')),
        ];
        $this->BuktiSeminar->update($id, $dataBukti);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to('/validasi/seminar');
    }


}
