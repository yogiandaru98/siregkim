<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// use CodeIgniter\Encryption\Argon2Handler;

class Superadmin extends BaseController
{
    public function __construct()
    {
        $this->modelUsers = new \App\Models\Users();
    }
    public function index()
    {
        
    }
    public function createAkun(){
        $data = [
            'title' => 'Tambah Akun',
            // 'users' => $this->modelUsers->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        return view('superadmin/akun/create', $data);
    }
    public function saveAkun(){
        $validatedAkun = $this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'numeric' => 'Username harus berupa angka',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi',
                ]
            ],
         ]);
        
        if(!$validatedAkun){
            return redirect()->to('/create')->withInput();
        }
        $password = $this->request->getVar('password');
        $password = password_hash($password, PASSWORD_ARGON2I);
       $dataAkun=[
        'nama' =>  htmlspecialchars(ucwords(strtolower($this->request->getVar('nama')))),
        'username' =>  htmlspecialchars($this->request->getVar('username')),
        'password' =>  $password,
        'is_mahasiswa' =>  htmlspecialchars($this->request->getVar('is_mahasiswa')),
        'is_dosen' =>  htmlspecialchars($this->request->getVar('is_dosen')),
        'is_koor' =>  htmlspecialchars($this->request->getVar('is_koor')),
        'is_tandik' =>  htmlspecialchars($this->request->getVar('is_tandik')),
        'is_admin' =>  htmlspecialchars($this->request->getVar('is_admin')),
        'is_superadmin' =>  htmlspecialchars($this->request->getVar('is_superadmin')),
         ];
        $this->modelUsers->insert($dataAkun);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/read');

    }
}
