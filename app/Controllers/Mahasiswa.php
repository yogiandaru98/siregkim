<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Mahasiswa extends BaseController
{
    public function __construct()
    {

        $this->profilMahasiswa = new \App\Models\ProfileMahasiswa();
    }
    public function index()
    {
        session();
        $data = [
            'title' => 'Profile',
            'profilMahasiswa' => $this->profilMahasiswa->where(['id_user' => session()->get('id_user')])->first(),
            'validation' => \Config\Services::validation(),
            
        ];
        $profil = $this->profilMahasiswa->where(['id_user' => session()->get('id_user')])->first();
        if ($profil) {
            return view('pages/mahasiswa/profile/read', $data);
        } else {
            return view('pages/mahasiswa/profile/create', $data);
        }
    }

    public function saveProfile()
    {
        $validatedProfile = $this->validate([
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir harus diisi',
                ]
            ],
            'tanggal_masuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Masuk harus diisi',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'alamat harus diisi',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Email tidak valid',
                ]
            ],
            'no_telepon' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'numeric' => 'No Telepon harus angka',
                ]
            ],
         ]);
         if(!$validatedProfile){
            return redirect()->to('mahasiswa/profile')->withInput();
         }
         $angkatan = $this->request->getVar('tanggal_masuk');
         $angkatan = substr($angkatan, 0, 4);
         $dataProfile=[
            'id_user' => session()->get('id_user'),
            'nama_lengkap' => session()->get('nama'),
            'npm' => session()->get('username'),
            'tanggal_lahir' =>  htmlspecialchars($this->request->getVar('tanggal_lahir')),
            'tanggal_masuk' =>  htmlspecialchars($this->request->getVar('tanggal_masuk')),
            'angkatan' =>  htmlspecialchars($angkatan),
            'jenis_kelamin' =>  htmlspecialchars($this->request->getVar('jenis_kelamin')),
            'alamat' =>  htmlspecialchars($this->request->getVar('alamat')),
            'email' =>  htmlspecialchars($this->request->getVar('email')),
            'no_telepon' =>  htmlspecialchars($this->request->getVar('no_telepon')),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->profilMahasiswa->insert($dataProfile);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan'); 
            return redirect()->to('mahasiswa/profile');
        # code...
    }
}
