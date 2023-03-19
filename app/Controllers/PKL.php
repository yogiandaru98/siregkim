<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PKL extends BaseController
{
    public function __construct()
    {
        $this->pklModel = new \App\Models\RegistrasiPKL();
        $this->modelUsers = new \App\Models\Users();
        $this->modelProfileMahasiswa = new \App\Models\ProfileMahasiswa();
        $this->modelLokasiSeminar = new \App\Models\LokasiSeminar();
        $this->modelJadwalSeminar = new \App\Models\JadwalSeminarPKL();
        $this->modelBuktiSeminar = new \App\Models\BuktiSeminarPKL();
        $this->modelBerkasKelengkapan = new \App\Models\BerkasKelengkapan();
        $this->session = session();
    }
    public function index()
    {

        session();

        $mPKL = $this->pklModel->where(['id_user' => session()->get('id_user')])->first();
        if ($mPKL) {
            $data = [
                'title' => 'PKL',
                'pkl' => $this->pklModel->getDetailPkl(session()->get('id_user')),
                'dosen' => $this->modelUsers->getDosen(),
                'validation' => \Config\Services::validation(),
                'bukti' => $this->modelBuktiSeminar->where('id_pkl', $mPKL['id_pkl'])->first(),
                'berkas_kelengkapan' => $this->modelBerkasKelengkapan->where('isi_berkas', 'berkas_kelengkapan_pkl.pdf')->first(),
                'jadwal' => $this->modelJadwalSeminar->getPklJadwal($mPKL['id_pkl']),
                

            ];

            return view('pages/mahasiswa/pkl/read', $data);
        } else {

            $data = [
                'title' => 'PKL',
                'dosen' => $this->modelUsers->getDosen(),
                'validation' => \Config\Services::validation(),
                'berkas_kelengkapan' => $this->modelBerkasKelengkapan->where('isi_berkas', 'berkas_kelengkapan_pkl.pdf')->first()

            ];

            return view('pages/mahasiswa/pkl/regis/create', $data);
        }
    }

    public function savePkl()
    {
        $validatedPkl = $this->validate([
            'judul_pkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul PKL harus diisi',
                ]
            ],
            'tahun_akademik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun Akademik harus diisi',
                ]
            ],
            'semester' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Semester harus diisi',
                ]
            ],

            'nama_mitra_pkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Mitra PKL harus diisi',
                ]
            ],
            'domisili_pkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Domisili PKL harus diisi',
                ]
            ],
            'periode_seminar_pkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Periode Seminar PKL harus diisi',
                ]
            ],
            'dosen_pembimbing_pkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Dosen Pembimbing PKL harus diisi',
                ]
            ],
            'pembimbing_lapangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pembimbing Lapangan harus diisi',
                ]
            ],
            'no_pembimbing_lapangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Pembimbing Lapangan harus diisi',
                ]
            ],

            'sks' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'SKS harus diisi',
                ]
            ],
            'ipk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'IPK harus diisi',
                ]
            ],
            'berkas_kelengkapan' => [
                'rules' => 'uploaded[berkas_kelengkapan]|max_size[berkas_kelengkapan,1024]|ext_in[berkas_kelengkapan,pdf]',
                'errors' => [
                    'uploaded' => 'Berkas Kelengkapan harus diisi',
                    'max_size' => 'Ukuran Berkas Kelengkapan terlalu besar',
                    'ext_in' => 'Format Berkas Kelengkapan harus PDF',
                ]
            ],
            'persetujuan_seminar_pkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Persetujuan Seminar PKL harus diisi',
                ]
            ],


        ]);
        if (!$validatedPkl) {
            return redirect()->to('/mahasiswa/pkl')->withInput();
        }
        $fileBerkasKelengkapan = $this->request->getFile('berkas_kelengkapan');
        $namaFileBerkasKelengkapan = "berkas_kelengkapan_" . session()->get('username') . '_' . session()->get('nama') . $fileBerkasKelengkapan->getRandomName();
        $fileBerkasKelengkapan->move('berkas/pkl/kelengkapan', $namaFileBerkasKelengkapan);



        $data = [
            'id_user' => session()->get('id_user'),
            'judul_pkl' => convertText($this->request->getVar('judul_pkl')),
            'tahun_akademik' => $this->request->getVar('tahun_akademik'),
            'semester' => $this->request->getVar('semester'),
            'prodi' => $this->request->getVar('prodi'),
            'nama_mitra_pkl' => $this->request->getVar('nama_mitra_pkl'),
            'domisili_pkl' => $this->request->getVar('domisili_pkl'),
            'periode_seminar_pkl' => $this->request->getVar('periode_seminar_pkl'),
            'dosen_pembimbing_pkl' => $this->request->getVar('dosen_pembimbing_pkl'),
            'pembimbing_lapangan' => $this->request->getVar('pembimbing_lapangan'),
            'no_pembimbing_lapangan' => $this->request->getVar('no_pembimbing_lapangan'),
            'toefl' => $this->request->getVar('toefl'),
            'sks' => $this->request->getVar('sks'),
            'ipk' => $this->request->getVar('ipk'),
            'berkas_kelengkapan' => $namaFileBerkasKelengkapan,
            'persetujuan_seminar_pkl' => $this->request->getVar('persetujuan_seminar_pkl'),
            'prodi' => 'S1 - Kimia',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $this->pklModel->save($data);
        session()->setFlashdata('pesan', 'Data PKL berhasil ditambahkan');
        return redirect()->to('/mahasiswa/pkl');
    }

    public function editPkl()
    {
        session();
        $id_pkl = $this->pklModel->where('id_user', session()->get('id_user'))->first();
        $data = [
            'title' => 'Edit PKL',
            'validation' => \Config\Services::validation(),
            'pkl' => $this->pklModel->getDetailPkl(session()->get('id_user')),
            'dosen' => $this->modelUsers->getDosen(),
            'berkas_kelengkapan' => $this->modelBerkasKelengkapan->where('isi_berkas', 'berkas_kelengkapan_pkl.pdf')->first()
        ];
        return view('pages/mahasiswa/pkl/regis/update', $data);
    }

    public function updatePkl()
    {
        $validatedPkl = $this->validate([
            'judul_pkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul PKL harus diisi',
                ]
            ],
            'tahun_akademik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun Akademik harus diisi',
                ]
            ],
            'semester' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Semester harus diisi',
                ]
            ],
            // 'prodi' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Program Studi harus diisi',
            //     ]
            // ],
            'nama_mitra_pkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Mitra PKL harus diisi',
                ]
            ],
            'domisili_pkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Domisili PKL harus diisi',
                ]
            ],
            'periode_seminar_pkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Periode Seminar PKL harus diisi',
                ]
            ],
            'dosen_pembimbing_pkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Dosen Pembimbing PKL harus diisi',
                ]
            ],
            'pembimbing_lapangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pembimbing Lapangan harus diisi',
                ]
            ],
            'no_pembimbing_lapangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Pembimbing Lapangan harus diisi',
                ]
            ],
            'sks' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'SKS harus diisi',
                ]
            ],
            'ipk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'IPK harus diisi',
                ]
            ],
            'berkas_kelengkapan' => [
                'rules' => 'uploaded[berkas_kelengkapan]|max_size[berkas_kelengkapan,1024]|ext_in[berkas_kelengkapan,pdf]',
                'errors' => [
                    'uploaded' => 'Berkas Kelengkapan harus diisi',
                    'max_size' => 'Ukuran Berkas Kelengkapan terlalu besar',
                    'ext_in' => 'Format Berkas Kelengkapan harus PDF',
                ]
            ],
            'persetujuan_seminar_pkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Persetujuan Seminar PKL harus diisi',
                ]
            ],


        ]);
        if (!$validatedPkl) {
            return redirect()->to('/mahasiswa/pkl/update')->withInput();
        }

        $pkl = $this->pklModel->where('id_user', session()->get('id_user'))->first();
        $id_pkl = $pkl['id_pkl'];
        $fileBerkasKelengkapan = $this->request->getFile('berkas_kelengkapan');
        $berkas_kelengkapan = "berkas_kelengkapan_" . session()->get('username') . '_' . session()->get('nama') . $fileBerkasKelengkapan->getRandomName();

        if (file_exists('berkas/pkl/kelengkapan/' . $pkl['berkas_kelengkapan'])) {
            unlink('berkas/pkl/kelengkapan/' . $pkl['berkas_kelengkapan']);
        }

        $fileBerkasKelengkapan->move('berkas/pkl/kelengkapan', $berkas_kelengkapan);

        $data = [
            'id_pkl' => $id_pkl,
            'judul_pkl' => convertText($this->request->getVar('judul_pkl')),
            'tahun_akademik' => $this->request->getVar('tahun_akademik'),
            'semester' => $this->request->getVar('semester'),
            'prodi' => 'S1 - Kimia',
            'nama_mitra_pkl' => $this->request->getVar('nama_mitra_pkl'),
            'domisili_pkl' => $this->request->getVar('domisili_pkl'),
            'periode_seminar_pkl' => $this->request->getVar('periode_seminar_pkl'),
            'dosen_pembimbing_pkl' => $this->request->getVar('dosen_pembimbing_pkl'),
            'pembimbing_lapangan' => $this->request->getVar('pembimbing_lapangan'),
            'no_pembimbing_lapangan' => $this->request->getVar('no_pembimbing_lapangan'),
            'toefl' => $this->request->getVar('toefl'),
            'sks' => $this->request->getVar('sks'),
            'ipk' => $this->request->getVar('ipk'),
            'berkas_kelengkapan' => $berkas_kelengkapan,
            'persetujuan_seminar_pkl' => $this->request->getVar('persetujuan_seminar_pkl'),
            'status' => 'Diproses',
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $db = \Config\Database::connect();
        $db->transStart();
        $this->pklModel->update($id_pkl, $data);
        $db->transComplete();
        if ($db->transStatus() === FALSE) {
            session()->setFlashdata('pesan', 'Data gagal diubah');
            return redirect()->to('/mahasiswa/pkl');
        } else {
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to('/mahasiswa/pkl');
        }
    }

    public function createBuktiSeminar()
    {
        $data = [
            'title' => 'Bukti Seminar PKL',
            'validation' => \Config\Services::validation(),
            'pkl' => $this->pklModel->getDetailPkl(session()->get('id_user')),
        ];
        return view('pages/mahasiswa/pkl/bukti_seminar/create', $data);
    }

    public function editBuktiSeminar()
    {
        $idPkl = $this->pklModel->where('id_user', session()->get('id_user'))->first();
        $data = [
            'title' => 'Bukti Seminar PKL',
            'validation' => \Config\Services::validation(),
            'pkl' => $this->pklModel->getDetailPkl(session()->get('id_user')),
            'bukti' => $this->modelBuktiSeminar->where('id_pkl', $idPkl['id_pkl'])->first()
        ];
        return view('pages/mahasiswa/pkl/bukti_seminar/update', $data);
    }

    public function saveBuktiSeminar()
    {

        $validatedBukti = $this->validate(
            [
                'bukti_seminar' => [
                    'rules' => 'uploaded[bukti_seminar]|mime_in[bukti_seminar,application/pdf]|max_size[bukti_seminar,1048]',
                    'errors' => [
                        'uploaded' => 'Bukti Seminar harus diisi',
                        'mime_in' => 'Bukti Seminar harus berupa file PDF',
                        'max_size' => 'Bukti Seminar maksimal 1 MB',
                    ]
                ],
                'laporan_pkl' => [
                    'rules' => 'uploaded[laporan_pkl]|mime_in[laporan_pkl,application/pdf]|max_size[laporan_pkl,1048]',
                    'errors' => [
                        'uploaded' => 'Laporan PKL harus diisi',
                        'mime_in' => 'Laporan PKL harus berupa file PDF',
                        'max_size' => 'Laporan PKL maksimal 1 MB',
                    ]
                ],
                'tanggal_seminar' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal seminar harus diisi',
                    ]
                ],
                'nilai_seminar_angka' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nilai Seminar Angka harus diisi',
                    ]
                ],
                'nilai_pkl_angka' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nilai PKL Angka harus diisi',
                    ]
                ],
                'nilai_seminar_huruf' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nilai Seminar Huruf harus diisi',
                    ]
                ],
                'nilai_pkl_huruf' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nilai PKL Huruf harus diisi',
                    ]
                ],

            ]
        );
        if (!$validatedBukti) {
            return redirect()->to('/mahasiswa/pkl/buktiSeminar/create')->withInput();
        } else {
            $pkl = $this->pklModel->where('id_user', session()->get('id_user'))->first();
            $bukti = $this->modelBuktiSeminar->where('id_pkl', $pkl['id_pkl'])->first();
            $id_pkl = $pkl['id_pkl'];
            $fileBuktiSeminar = $this->request->getFile('bukti_seminar');
            $bukti_seminar = "bukti_seminar_" . session()->get('username') . '_' . session()->get('nama') . $fileBuktiSeminar->getRandomName();
            $fileLaporanPkl = $this->request->getFile('laporan_pkl');
            $laporan_pkl = "laporan_pkl_" . session()->get('username') . '_' . session()->get('nama') . $fileLaporanPkl->getRandomName();

            if (!empty($bukti['bukti_seminar']) && !empty($bukti['laporan_pkl'])) {


                if (file_exists('berkas/pkl/bukti/seminar/' . $bukti['bukti_seminar'])) {
                    unlink('berkas/pkl/bukti/seminar/' . $bukti['bukti_seminar']);
                }
                if (file_exists('berkas/pkl/bukti/laporan/' . $bukti['laporan_pkl'])) {
                    unlink('berkas/pkl/bukti/laporan/' . $bukti['laporan_pkl']);
                }
            }
            $fileBuktiSeminar->move('berkas/pkl/bukti/seminar/', $bukti_seminar);
            $fileLaporanPkl->move('berkas/pkl/bukti/laporan/', $laporan_pkl);



            $data = [
                'id_pkl' => $id_pkl,
                'bukti_seminar' => $bukti_seminar,
                'laporan_pkl' => $laporan_pkl,
                'tanggal_seminar' => $this->request->getVar('tanggal_seminar'),
                'nilai_seminar_angka' => $this->request->getVar('nilai_seminar_angka'),
                'nilai_pkl_angka' => $this->request->getVar('nilai_pkl_angka'),
                'nilai_seminar_huruf' => strtoupper($this->request->getVar('nilai_seminar_huruf')),
                'nilai_pkl_huruf' => strtoupper($this->request->getVar('nilai_pkl_huruf')),
                'status_bukti_seminar' => 'Diproses',
                'created_at' => date('Y-m-d H:i:s'),
            ];



            $db = \Config\Database::connect();
            $db->transStart();
            $this->modelBuktiSeminar->insert($data);
            $db->transComplete();
            if ($db->transStatus() === FALSE) {
                session()->setFlashdata('pesan', 'Data gagal diubah');
                return redirect()->to('/mahasiswa/pkl');
            } else {
                session()->setFlashdata('pesan', 'Data berhasil diubah');
                return redirect()->to('/mahasiswa/pkl');
            }
        }
    }

    public function updateBuktiSeminar()
    {
        $validatedBukti = $this->validate(
            [
                'bukti_seminar' => [
                    'rules' => 'uploaded[bukti_seminar]|mime_in[bukti_seminar,application/pdf]|max_size[bukti_seminar,1048]',
                    'errors' => [
                        'uploaded' => 'Bukti Seminar harus diisi',
                        'mime_in' => 'Bukti Seminar harus berupa file PDF',
                        'max_size' => 'Bukti Seminar maksimal 1 MB',
                    ]
                ],
                'laporan_pkl' => [
                    'rules' => 'uploaded[laporan_pkl]|mime_in[laporan_pkl,application/pdf]|max_size[laporan_pkl,1048]',
                    'errors' => [
                        'uploaded' => 'Laporan PKL harus diisi',
                        'mime_in' => 'Laporan PKL harus berupa file PDF',
                        'max_size' => 'Laporan PKL maksimal 1 MB',
                    ]
                ],
                'tanggal_seminar' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal seminar harus diisi',
                    ]
                ],
                'nilai_seminar_angka' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nilai Seminar Angka harus diisi',
                    ]
                ],
                'nilai_pkl_angka' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nilai PKL Angka harus diisi',
                    ]
                ],
                'nilai_seminar_huruf' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nilai Seminar Huruf harus diisi',
                    ]
                ],
                'nilai_pkl_huruf' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nilai PKL Huruf harus diisi',
                    ]
                ],

            ]
        );
        if (!$validatedBukti) {
            return redirect()->to('/mahasiswa/pkl/buktiSeminar/create')->withInput();
        } else {
            $pkl = $this->pklModel->where(['id_user', session()->get('id_user')])->first();
            $bukti = $this->modelBuktiSeminar->where(['id_pkl', $pkl['id_pkl']])->first();
            $id_pkl = $pkl['id_pkl'];
            $fileBuktiSeminar = $this->request->getFile('bukti_seminar');
            $bukti_seminar = "bukti_seminar_" . session()->get('username') . '_' . session()->get('nama') . $fileBuktiSeminar->getRandomName();
            $fileLaporanPkl = $this->request->getFile('laporan_pkl');
            $laporan_pkl = "laporan_pkl_" . session()->get('username') . '_' . session()->get('nama') . $fileLaporanPkl->getRandomName();

            if (file_exists('berkas/pkl/bukti/seminar/' . $bukti['bukti_seminar'])) {
                unlink('berkas/pkl/bukti/seminar/' . $bukti['bukti_seminar']);
            }
            if (file_exists('berkas/pkl/bukti/laporan/' . $bukti['laporan_pkl'])) {
                unlink('berkas/pkl/bukti/laporan/' . $bukti['laporan_pkl']);
            }

            $fileBuktiSeminar->move('berkas/pkl/bukti/seminar/', $bukti_seminar);
            $fileLaporanPkl->move('berkas/pkl/bukti/laporan/', $laporan_pkl);

            $data = [
                'id_pkl' => $id_pkl,
                'bukti_seminar' => $bukti_seminar,
                'laporan_pkl' => $laporan_pkl,
                'tanggal_seminar' => $this->request->getVar('tanggal_seminar'),
                'nilai_seminar_angka' => $this->request->getVar('nilai_seminar_angka'),
                'nilai_pkl_angka' => $this->request->getVar('nilai_pkl_angka'),
                'nilai_seminar_huruf' => strtoupper($this->request->getVar('nilai_seminar_huruf')),
                'nilai_pkl_huruf' => strtoupper($this->request->getVar('nilai_pkl_huruf')),
                'status_bukti_seminar' => 'Diproses',
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $db = \Config\Database::connect();
            $db->transStart();
            $this->modelBuktiSeminar->update($bukti['id_bukti'], $data);
            $db->transComplete();
            if ($db->transStatus() === FALSE) {
                session()->setFlashdata('pesan', 'Data gagal diubah');
                return redirect()->to('/mahasiswa/pkl');
            } else {
                session()->setFlashdata('pesan', 'Data berhasil diubah');
                return redirect()->to('/mahasiswa/pkl');
            }
        }
    }
}
