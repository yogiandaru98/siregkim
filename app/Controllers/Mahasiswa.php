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

        // $this->load->helper('tgl_indo', 'custom_fungsi');
        // helper('convertText');
        

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
        # code...
    }
    public function editProfile()
    {
        session();
        // $profileM= $this->profilMahasiswa->where(['id_user' => session()->get('id_user')])->first();
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


    //pkl
    // public function Pkl()
    // {
        
    //     session();
    //     $data = [
    //         'title' => 'PKL',
    //         'pkl' => $this->modelPKL->getDetailPkl(session()->get('id_user')),
    //         'dosen' => $this->modelUsers->getDosen(),
    //         'validation' => \Config\Services::validation(),
    //     ];
    //     $mPKL = $this->modelPKL->where(['id_user' => session()->get('id_user')])->first();
    //     if ($mPKL) {
    //         return view('pages/mahasiswa/pkl/read', $data);
    //     } else {
    //         return view('pages/mahasiswa/pkl/create', $data);
    //     }
    // }
    // public function savePkl()
    // {
    //     $validatedPkl = $this->validate([
    //         'judul_pkl' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Judul PKL harus diisi',
    //             ]
    //         ],
    //         'periode_seminar_pkl' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Periode Seminar PKL harus diisi',
    //             ]
    //         ],
    //         'lokasi_pkl' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Lokasi PKL harus diisi',
    //             ]
    //         ],
    //         'dosen_pembimbing_akademik' => [
    //             'rules' => 'required|numeric',
    //             'errors' => [
    //                 'required' => 'Dosen Pembimbing Akademik harus diisi',
    //                 'numeric' => 'Dosen Pembimbing Akademik harus angka',
    //             ]
    //         ],
    //         'dosen_pembimbing_pkl' => [
    //             'rules' => 'required|numeric',
    //             'errors' => [
    //                 'required' => 'Pembimbing pkl harus diisi',
    //                 'numeric' => 'Pembimbing pkl harus angka',
    //             ]
    //         ],
    //         'pembimbing_lapangan' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Pembimbing Lapangan harus diisi',
    //             ]
    //         ],
    //         'no_pembimbing_lapangan' => [
    //             'rules' => 'required|numeric',
    //             'errors' => [
    //                 'required' => 'NIP Pembimbing Lapangan harus diisi',
    //                 'numeric' => 'NIP Pembimbing Lapangan harus angka',
    //             ]
    //         ],
    //         'sks' => [
    //             'rules' => 'required|numeric',
    //             'errors' => [
    //                 'required' => 'SKS harus diisi',
    //                 'numeric' => 'SKS harus angka',
    //             ]
    //         ],
    //         'ipk' => [
    //             'rules' => 'required|numeric',
    //             'errors' => [
    //                 'required' => 'IPK harus diisi',
    //                 'numeric' => 'IPK harus angka',
    //             ]
    //         ],
    //         'berkas_kelengkapan' => [
    //             'rules' => 'uploaded[berkas_kelengkapan]|max_size[berkas_kelengkapan,1024]|ext_in[berkas_kelengkapan,pdf]',
    //             'errors' => [
    //                 'uploaded' => 'Berkas Kelengkapan harus diisi',
    //                 'max_size' => 'Ukuran Berkas Kelengkapan maksimal 1 MB',
    //                 'ext_in' => 'Berkas Kelengkapan harus berformat PDF',
    //             ]
    //         ],
    //     ]);
    //     if (!$validatedPkl) {
    //         return redirect()->to('mahasiswa/pkl')->withInput();
    //     }
    //     $fileBerkasKelengkapan = $this->request->getFile('berkas_kelengkapan');
    //     $berkas_kelengkapan = session()->get('username') . '_' . session()->get('nama') . '_' . 'berkas_kelengkapan_pkl' . '.' . $fileBerkasKelengkapan->getClientExtension();
    //     // replace fileberkaskelengkapan if exist
    //     if (file_exists('berkas/pkl/' . $berkas_kelengkapan)) {
    //         unlink('berkas/pkl/' . $berkas_kelengkapan);
    //     }
    //     $fileBerkasKelengkapan->move('berkas/pkl', $berkas_kelengkapan);

    //     $id_user = session()->get('id_user');
    //     $judul_pkl = htmlspecialchars(convertText($this->request->getVar('judul_pkl')));
    //     $periode_seminar_pkl = htmlspecialchars($this->request->getVar('periode_seminar_pkl'));
    //     $lokasi_pkl = htmlspecialchars($this->request->getVar('lokasi_pkl'));

    //     $sks = htmlspecialchars($this->request->getVar('sks'));
    //     $ipk = htmlspecialchars($this->request->getVar('ipk'));

    //     $PA = htmlspecialchars($this->request->getVar('dosen_pembimbing_akademik'));
    //     $pembimbing_akademik = $this->modelUsers->where(['id_user' => $PA])->first();
    //     $PPKL = htmlspecialchars($this->request->getVar('dosen_pembimbing_pkl'));
    //     $pembimbing_pkl = $this->modelUsers->where(['id_user' => $PPKL])->first();
        
    //     $pembimbing_lapangan = htmlspecialchars($this->request->getVar('pembimbing_lapangan'));
    //     $no_pembimbing_lapangan = htmlspecialchars($this->request->getVar('no_pembimbing_lapangan'));


    //     // $status_pkl = "Diproses";
    //     $prodi = "S1 - Kimia";



    //     $berkasSeminarNama = 'berkas_seminar_' . session()->get('username') . '.docx';
    //     $data = [
    //         'id_user' => $id_user,
    //         'judul_pkl' => $judul_pkl,
    //         'periode_seminar_pkl' => $periode_seminar_pkl,
    //         'lokasi_pkl' => $lokasi_pkl,
    //         'dosen_pembimbing_akademik' => $PA,
            
    //         'dosen_pembimbing_pkl' => $PPKL,

    //         'pembimbing_lapangan' => $pembimbing_lapangan,
    //         'no_pembimbing_lapangan' => $no_pembimbing_lapangan,
    //         'sks' => $sks,
    //         'ipk' => $ipk,
    //         'berkas_kelengkapan' => $berkas_kelengkapan,
    //         'berkas_seminar_pkl' => $berkasSeminarNama,
    //         'prodi' => "S1 - Kimia",
    //         'created_at' => date('Y-m-d H:i:s'),
    //     ];

    //     // $templatePkl = new TemplateProcessor('../public/Berkas/template/template_pkl.docx');
    //     // $berkasSeminarPkl = '../public/Berkas/pkl/' . $berkasSeminarNama;
    //     // $templatePkl->setValues(
    //     //     [
    //     //         'nama' => session()->get('nama'),
    //     //         'npm' => session()->get('username'),
    //     //         'judul_pkl' => $judul_pkl,
    //     //         'prodi' => $prodi,
    //     //         'dosen_pembimbing_pkl' => $pembimbing_pkl['nama'],
    //     //         'nip_pembimbing_pkl' => $pembimbing_pkl['username'],
    //     //         'periode_seminar_pkl' => $periode_seminar_pkl,
    //     //         'dosen_pembimbing_akademik' => $pembimbing_akademik['nama'],
    //     //         'nip_pembimbing_akademik' => $pembimbing_akademik['username'],
    //     //         'pembimbing_lapangan' => $pembimbing_lapangan,
    //     //         'no_pembimbing_lapangan' => $no_pembimbing_lapangan,
    //     //         'lokasi_pkl' => $lokasi_pkl,
    //     //         'sks' => $sks,
    //     //         'ipk' => $ipk,

    //     //     ]
    //     // );
    //     // //replace file if exist
    //     // if (file_exists($berkasSeminarPkl)) {
    //     //     unlink($berkasSeminarPkl);
    //     // }
    //     // $templatePkl->saveAs($berkasSeminarPkl);

    //     $this->modelPKL->insert($data);

    //     session()->setFlashdata('pesan', 'Data PKL berhasil ditambahkan');
    //     return redirect()->to('mahasiswa/pkl');
    // }
    // public function editPkl()
    // {
    //     session();
    //     $id_pkl = $this->modelPKL->where('id_user', session()->get('id_user'))->first();
    //     $data = [
    //         'title' => 'PKL',
    //         'validation' => \Config\Services::validation(),
    //         'dosen' => $this->modelUsers->getDosen(),
    //         'pkl' => $this->modelPKL->getDetailPkl(session()->get('id_user')),
    //     ];
    //     return view('pages/mahasiswa/pkl/update', $data);
    // }
    // public function updatePkl()
    // {
    //     $validatedPkl = $this->validate([
    //         'judul_pkl' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Judul PKL harus diisi',
    //             ]
    //         ],
    //         'periode_seminar_pkl' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Periode Seminar PKL harus diisi',
    //             ]
    //         ],
    //         'lokasi_pkl' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Lokasi PKL harus diisi',
    //             ]
    //         ],
    //         'dosen_pembimbing_akademik' => [
    //             'rules' => 'required|numeric',
    //             'errors' => [
    //                 'required' => 'Dosen Pembimbing Akademik harus diisi',
    //                 'numeric' => 'Dosen Pembimbing Akademik harus angka',
    //             ]
    //         ],
    //         'dosen_pembimbing_pkl' => [
    //             'rules' => 'required|numeric',
    //             'errors' => [
    //                 'required' => 'Pembimbing pkl harus diisi',
    //                 'numeric' => 'Pembimbing pkl harus angka',
    //             ]
    //         ],
    //         'pembimbing_lapangan' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Pembimbing Lapangan harus diisi',
    //             ]
    //         ],
    //         'no_pembimbing_lapangan' => [
    //             'rules' => 'required|numeric',
    //             'errors' => [
    //                 'required' => 'NIP Pembimbing Lapangan harus diisi',
    //                 'numeric' => 'NIP Pembimbing Lapangan harus angka',
    //             ]
    //         ],
    //         'sks' => [
    //             'rules' => 'required|numeric',
    //             'errors' => [
    //                 'required' => 'SKS harus diisi',
    //                 'numeric' => 'SKS harus angka',
    //             ]
    //         ],
    //         'ipk' => [
    //             'rules' => 'required|numeric',
    //             'errors' => [
    //                 'required' => 'IPK harus diisi',
    //                 'numeric' => 'IPK harus angka',
    //             ]
    //         ],
    //         'berkas_kelengkapan' => [
    //             'rules' => 'uploaded[berkas_kelengkapan]|max_size[berkas_kelengkapan,1024]|ext_in[berkas_kelengkapan,pdf]',
    //             'errors' => [
    //                 'uploaded' => 'Berkas Kelengkapan harus diisi',
    //                 'max_size' => 'Ukuran Berkas Kelengkapan maksimal 1 MB',
    //                 'ext_in' => 'Berkas Kelengkapan harus berformat PDF',
    //             ]
    //         ],
    //     ]);
    //     if (!$validatedPkl) {
    //         return redirect()->to('mahasiswa/pkl/edit')->withInput();
    //     }
    //     $id_pkl = $this->modelPKL->where('id_user', session()->get('id_user'))->first();
    //     $fileBerkasKelengkapan = $this->request->getFile('berkas_kelengkapan');
    //     $berkas_kelengkapan = session()->get('username') . '_' . session()->get('nama') . '_' . 'berkas_kelengkapan_pkl' . '.' . $fileBerkasKelengkapan->getClientExtension();

    //     if (file_exists('berkas/pkl/' . $berkas_kelengkapan)) {
    //         unlink('berkas/pkl/' . $berkas_kelengkapan);
    //     }
    //     $fileBerkasKelengkapan->move('berkas/pkl', $berkas_kelengkapan);

    //     $id_user = session()->get('id_user');
    //     $judul_pkl = htmlspecialchars(convertText($this->request->getVar('judul_pkl')));
    //     $periode_seminar_pkl = htmlspecialchars($this->request->getVar('periode_seminar_pkl'));
    //     $lokasi_pkl = htmlspecialchars($this->request->getVar('lokasi_pkl'));

    //     $sks = htmlspecialchars($this->request->getVar('sks'));
    //     $ipk = htmlspecialchars($this->request->getVar('ipk'));

    //     $PA = htmlspecialchars($this->request->getVar('dosen_pembimbing_akademik'));
    //     $pembimbing_akademik = $this->modelUsers->where(['id_user' => $PA])->first();
    //     $PPKL = htmlspecialchars($this->request->getVar('dosen_pembimbing_pkl'));
    //     $pembimbing_pkl = $this->modelUsers->where(['id_user' => $PPKL])->first();
    //     $pembimbing_lapangan = htmlspecialchars($this->request->getVar('pembimbing_lapangan'));
    //     $no_pembimbing_lapangan = htmlspecialchars($this->request->getVar('no_pembimbing_lapangan'));


    //     // $status_pkl = "Diproses";
    //     $prodi = "S1 - Kimia";

    //     $berkasSeminarNama = 'berkas_seminar_' . session()->get('username') . '.docx';
    //     $data = [
    //         'id_user' => session()->get('id_user'),
    //         'judul_pkl' => $judul_pkl,
    //         'periode_seminar_pkl' => $periode_seminar_pkl,
    //         'lokasi_pkl' => $lokasi_pkl,
    //         'dosen_pembimbing_akademik' => $PA,
            
    //         'dosen_pembimbing_pkl' => $PPKL,

    //         'pembimbing_lapangan' => $pembimbing_lapangan,
    //         'no_pembimbing_lapangan' => $no_pembimbing_lapangan,
    //         'sks' => $sks,
    //         'ipk' => $ipk,
    //         'berkas_kelengkapan' => $berkas_kelengkapan,
    //         'berkas_seminar_pkl' => $berkasSeminarNama,
    //         'prodi' => "S1 - Kimia",
    //         'updated_at' => date('Y-m-d H:i:s'),
    //         'status_pkl' => "Diproses",
    //     ];

    //     // $templatePkl = new TemplateProcessor('../public/Berkas/template/template_pkl.docx');
    //     // $berkasSeminarPkl = '../public/Berkas/pkl/' . $berkasSeminarNama;
    //     // $templatePkl->setValues(
    //     //     [
    //     //         'nama' => session()->get('nama'),
    //     //         'npm' => session()->get('username'),
    //     //         'judul_pkl' => $judul_pkl,
    //     //         'prodi' => $prodi,
    //     //         'dosen_pembimbing_pkl' => $pembimbing_pkl['nama'],
    //     //         'nip_pembimbing_pkl' => $pembimbing_pkl['username'],
    //     //         'periode_seminar_pkl' => $periode_seminar_pkl,
    //     //         'dosen_pembimbing_akademik' => $pembimbing_akademik['nama'],
    //     //         'nip_pembimbing_akademik' => $pembimbing_akademik['username'],
    //     //         'pembimbing_lapangan' => $pembimbing_lapangan,
    //     //         'no_pembimbing_lapangan' => $no_pembimbing_lapangan,
    //     //         'lokasi_pkl' => $lokasi_pkl,
    //     //         'sks' => $sks,
    //     //         'ipk' => $ipk,
    //     //     ]
    //     // );

    //     // if (file_exists($berkasSeminarPkl)) {
    //     //     unlink($berkasSeminarPkl);
    //     // }
    //     $db = \Config\Database::connect();
    //     $db->transStart();
    //     // $templatePkl->saveAs($berkasSeminarPkl);
    //     $this->modelPKL->update($id_pkl['id_pkl'], $data);
    //     $db->transComplete();
    //     if ($db->transStatus() === FALSE) {
    //         session()->setFlashdata('pesan', 'Data gagal diUpdate');
    //         return redirect()->to('/mahasiswa/pkl');
    //     } else {
    //         session()->setFlashdata('pesan', 'Data berhasil diUpdate');
    //         return redirect()->to('/mahasiswa/pkl');
    //     }
    // }
    // public function updateBuktiSeminar()
    // {
    //     $id_pkl = $this->modelPKL->where('id_user', session()->get('id_user'))->first();
    //     $bukti_seminar = $this->request->getFile('bukti_seminar');
    //     $berkas_kelengkapan = 'bukti_seminar_' . session()->get('username') . '.' . $bukti_seminar->getClientExtension();
    //     if (file_exists('../public/Berkas/pkl/' . $berkas_kelengkapan)) {
    //         unlink('../public/Berkas/pkl/' . $berkas_kelengkapan);
    //     }
    //     $bukti_seminar->move('../public/Berkas/pkl', $berkas_kelengkapan);
    //     $data = [
    //         'bukti_seminar_pkl' => $berkas_kelengkapan,
    //         'status_bukti_seminar_pkl' => 'Diproses',
    //         'updated_at' => date('Y-m-d H:i:s'),
    //     ];
    //     session()->setFlashdata('pesan', 'Bukti Seminar berhasil diUpdate');
    //     $this->modelPKL->update($id_pkl['id_pkl'], $data);
    //     return redirect()->to('/mahasiswa/pkl');
    // }
}
