<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthUser extends BaseController
{
    
    public function __construct()
    {
        $this->modelUsers = new \App\Models\Users();
    }
    

        //
        public function index()
    {
        if(session()->get('logged_in')){
            $data = [
                'title' => 'Dashboard',
            ];
            return redirect()->to(site_url('dashboard'));
        }else{
            $data = [
                'title' => 'Login',
            ];
            return view('pages/auth/login', $data);
        }
    }
    public function login(){
        $user = $this->modelUsers->where(['username' => $this->request->getPost('username'), 'password' => $this->request->getPost('password')])->first();
        if($user){
            $data = [
                'id_user' => $user['id_user'],
                'username' => $user['username'],
                'nama' => $user['nama'],
                'is_superadmin' => $user['is_superadmin'],
                'is_mahasiswa' => $user['is_mahasiswa'],
                'is_dosen' => $user['is_dosen'],
                'is_koor' => $user['is_koor'],
                'is_tandik' => $user['is_tandik'],
                'logged_in' => TRUE
            ];
            session()->set($data);
            return redirect()->to(site_url('dashboard'));
        }else{
            session()->setFlashdata('error', 'Username atau Password Salah');
            return redirect()->to(site_url('login'));
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
    
}
