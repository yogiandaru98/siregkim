<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\App;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Html;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;



class Mahasiswa extends BaseController
{
    public function __construct()
    {

        $this->profilMahasiswa = new \App\Models\ProfileMahasiswa();
        $this->modelUsers = new \App\Models\Users();
        $this->modelPKL = new \App\Models\RegistrasiPKL();
        $this->session = session();

        

    }
    public function index()
    {
        session();
        $id_user = session()->get('id_user');
        $data = [
            'title' => 'Profile',
            'profilMahasiswa' => $this->profilMahasiswa->joinUsers($id_user),
            'validation' => \Config\Services::validation(),
            'dosen' => $this->modelUsers->where(['is_dosen' => 1])->findAll(),

        ];
        $profil = $this->profilMahasiswa->where(['id_user' => session()->get('id_user')])->first();
        if ($profil) {
            return view('pages/mahasiswa/profile/read', $data);
        } else {
            return view('pages/mahasiswa/profile/create', $data);
        }
    }

    //profile
    public function saveProfile()
    {
        $validatedProfile = $this->validate([
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir harus diisi',
                ]
            ],
            'semester' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Semester harus diisi',
                    'numeric' => 'Semester harus angka',
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
            'dosen_pembimbing_akademik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Dosen Pembimbing Akademik harus diisi',
                ]
            ],
            'status_mahasiswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Mahasiswa harus diisi',
                ]
            ],
        ]);
        if (!$validatedProfile) {
            return redirect()->to('mahasiswa/profile')->withInput();
        }
        $angkatan = $this->request->getVar('tanggal_masuk');
        $angkatan = substr($angkatan, 0, 4);
        $dataProfile = [
            'id_user' => session()->get('id_user'),
            'semester' => htmlspecialchars($this->request->getVar('semester')),
            'tanggal_lahir' =>  htmlspecialchars($this->request->getVar('tanggal_lahir')),
            'tanggal_masuk' =>  htmlspecialchars($this->request->getVar('tanggal_masuk')),
            'angkatan' =>  htmlspecialchars($angkatan),
            'jenis_kelamin' =>  htmlspecialchars($this->request->getVar('jenis_kelamin')),
            'alamat' =>  htmlspecialchars($this->request->getVar('alamat')),
            'email' =>  htmlspecialchars($this->request->getVar('email')),
            'no_telepon' =>  htmlspecialchars($this->request->getVar('no_telepon')),
            'dosen_pembimbing_akademik' =>  htmlspecialchars($this->request->getVar('dosen_pembimbing_akademik')),
            'status_mahasiswa' =>  htmlspecialchars($this->request->getVar('status_mahasiswa')),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $this->profilMahasiswa->insert($dataProfile);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('mahasiswa/profile');

    }
    public function editProfile()
    {
        session();

        $id_user = session()->get('id_user');
        $data = [
            'title' => 'Profile',
            'profilMahasiswa' => $this->profilMahasiswa->joinUsers($id_user),
            'validation' => \Config\Services::validation(),
            'dosen' => $this->modelUsers->where(['is_dosen' => 1])->findAll(),

        ];
        return view('pages/mahasiswa/profile/update', $data);
    }
    public function updateProfile()
    {
        $validatedProfile = $this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap harus diisi',
                ]
            ],
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
            'semester' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Semester harus diisi',
                    'numeric' => 'Semester harus angka',
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
            'dosen_pembimbing_akademik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Dosen Pembimbing Akademik harus diisi',
                ]
            ],
            'status_mahasiswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Mahasiswa harus diisi',
                ]
            ],
        ]);
        if (!$validatedProfile) {
            return redirect()->to('mahasiswa/profile/edit')->withInput();
        }
        $id_user = session()->get('id_user');
        $angkatan = $this->request->getVar('tanggal_masuk');
        $angkatan = substr($angkatan, 0, 4);
        $dataProfile = [
            'id_user' => $id_user,
            'semester' => htmlspecialchars($this->request->getVar('semester')),
            'tanggal_lahir' =>  htmlspecialchars($this->request->getVar('tanggal_lahir')),
            'tanggal_masuk' =>  htmlspecialchars($this->request->getVar('tanggal_masuk')),
            'angkatan' =>  htmlspecialchars($angkatan),
            'jenis_kelamin' =>  htmlspecialchars($this->request->getVar('jenis_kelamin')),
            'alamat' =>  htmlspecialchars($this->request->getVar('alamat')),
            'email' =>  htmlspecialchars($this->request->getVar('email')),
            'no_telepon' =>  htmlspecialchars($this->request->getVar('no_telepon')),
            'dosen_pembimbing_akademik' =>  htmlspecialchars($this->request->getVar('dosen_pembimbing_akademik')),
            'status_mahasiswa' =>  htmlspecialchars($this->request->getVar('status_mahasiswa')),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $dataUser = [
            'nama' => htmlspecialchars(ucwords(strtolower($this->request->getVar('nama')))),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $id_profile_mahasiswa = $this->profilMahasiswa->joinUsers($id_user);
        
        $db = \Config\Database::connect();
        $db->transStart();
        $id_profile_mahasiswa = $id_profile_mahasiswa['id_profile_mahasiswa'];
        $this->modelUsers->update($id_user, $dataUser);
        $this->profilMahasiswa->update($id_profile_mahasiswa, $dataProfile);
        $db->transComplete();
        if ($db->transStatus() === FALSE) {
            session()->setFlashdata('pesan', 'Data gagal diubah');
            return redirect()->to('mahasiswa/profile/');
        }
        else{
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to('mahasiswa/profile');
        }
    }
}
