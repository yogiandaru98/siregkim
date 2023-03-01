<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// use CodeIgniter\Encryption\Argon2Handler;

class Superadmin extends BaseController
{
    public function __construct()
    {
        $this->modelUsers = new \App\Models\Users();
        $this->session = session();
    }
    public function index()
    {
        $data = [
            'title' => 'Tambah Akun',
            'akun' => $this->modelUsers->orderBy('id_user', 'DESC')->findAll(),
        ];
        return view('superadmin/akun/read', $data);
    }
    public function createAkun(){
        $data = [
            'title' => 'Tambah Akun',
            // 'users' => $this->modelUsers->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        return view('superadmin/akun/create', $data);
    }
    
    public function deleteAkun($id){
        $this->modelUsers->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/superadmin/akun');
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
                'rules' => 'required|numeric|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'numeric' => 'Username harus berupa angka',
                    'is_unique' => 'Username sudah terdaftar',
                ]
            ],
         ]);
        
        if(!$validatedAkun){
            return redirect()->to('/superadmin/akun/create')->withInput();
        }
        $password = $this->request->getVar('username');
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
        return redirect()->to('/superadmin/akun');

    }

    public function editAkun($id){
        $data = [
            'title' => 'Tambah Akun',
            'akun' => $this->modelUsers->find($id),
            'validation' => \Config\Services::validation(),
        ];
        return view('superadmin/akun/edit', $data);
    }

    public function saveEditAkun($id){
        $validatedAkun = $this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ]
            ],
            'username' => [
                'rules' => 'required|numeric|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'numeric' => 'Username harus berupa angka',
                    'is_unique' => 'Username sudah terdaftar',
                ]
            ],
         ]);
        
        if(!$validatedAkun){
            return redirect()->to('/superadmin/akun/create')->withInput();
        }
        $password = $this->request->getVar('username');
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
        $this->modelUsers->update($id, $dataAkun);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/superadmin/akun');
    }
}
