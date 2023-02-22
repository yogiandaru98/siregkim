<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Encryption\Argon2Handler;

class AuthUser extends BaseController
{

    public function __construct()
    {
        $this->modelUsers = new \App\Models\Users();
    }


    //
    public function index()
    {
        if (session()->get('logged_in')) {
            $data = [
                'title' => 'Dashboard',
            ];
            return redirect()->to(site_url('dashboard'));
        } else {
            $data = [
                'title' => 'Login',
            ];
            return view('pages/auth/login', $data);
        }
    }
    public function login()
    {
        $user = $this->modelUsers->where(['username' => $this->request->getPost('username')])->first();
        $password = $this->request->getPost('password');
        if ($user) {

            if (password_verify($password, $user['password'])) {
                $data = [
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'nama' => $user['nama'],
                    'is_superadmin' => $user['is_superadmin'],
                    'is_mahasiswa' => $user['is_mahasiswa'],
                    'is_dosen' => $user['is_dosen'],
                    'is_koor' => $user['is_koor'],
                    'is_tandik' => $user['is_tandik'],
                    'is_admin' => $user['is_admin'],
                    'is_alumni' => $user['is_alumni'],
                    'logged_in' => TRUE
                ];
                session()->set($data);
                return redirect()->to(site_url('dashboard'));
            } else {
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->to(site_url('login'));
            }
        }
        else {
            session()->setFlashdata('error', 'Username atau Password Salah');
            return redirect()->to(site_url('login'));
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
    public function gantiPassword()
    {
        $data = [
            'title' => 'Ganti Password',
            'validation'=> \Config\Services::validation()

        ];
        return view('pages/auth/ganti_password', $data);
    }
    public function gantiPasswordAction()
    {

        # code...
        $username = session()->get('username');
        $password = $this->request->getPost('password_lama');
        $password_baru = $this->request->getPost('password_baru');
        $password_baru2 = $this->request->getPost('password_baru2');
        $user = $this->modelUsers->where(['username' => $username])->first();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                if ($password_baru == $password_baru2) {
                    $password_baru = password_hash($password_baru, PASSWORD_ARGON2I);
                    $data = [
                        'password' => $password_baru,
                    ];
                    $this->modelUsers->update($user['id_user'], $data);
                    session()->setFlashdata('success', 'Password Berhasil Diganti');
                    return redirect()->to(site_url('user/edit/password'));
                } else {
                    session()->setFlashdata('error', 'Konfirmasi Password Baru Tidak Sama');
                    return redirect()->to(site_url('user/edit/password'));
                }
            } else {
                session()->setFlashdata('error', 'Password Lama Salah');
                return redirect()->to(site_url('user/edit/password'));
            }
        } else {
            session()->setFlashdata('error', 'Username Tidak Ditemukan');
            return redirect()->to(site_url('user/edit/password'));
        }
    }
}
