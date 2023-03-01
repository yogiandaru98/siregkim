<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use tidy;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Html;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

class Jadwal extends BaseController

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
        $data = [
            'title' => 'Jadwal',
            'jadwal' => $this->modelJadwalSeminar->getPklJadwalAll(),

        ];
        return view('pages/koor/jadwal/read', $data);
    }

    public function create($id_pkl)
    {
        $data = [
            'title' => 'Jadwal',
            'validation' => \Config\Services::validation(),
            'pkl' => $this->pklModel->getDetailPklAdmin($id_pkl),
            'lokasi' => $this->modelLokasiSeminar->findAll(),
        ];
        return view('pages/koor/jadwal/create', $data);
    }

    public function saveJadwal($id_pkl)
    {
        $validatedJadwal = $this->validate([
            'id_lokasi_seminar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi harus diisi',
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi',
                ]
            ],
            'jam_mulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jam Mulai harus diisi',
                ]
            ],
            'jam_selesai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jam Selesai harus diisi',
                ]
            ],

        ]);

        if (!$validatedJadwal) {
            return redirect()->to('/jadwal/create')->withInput();
        }
        $mPKL = $this->pklModel->getDetailPklAdmin($id_pkl);
        $mUsers = $this->modelUsers->find($mPKL['id_user']);
        $berkasSeminarNama = 'berkas_seminar_' . $mUsers['username'] . '_' . $mUsers['nama'] . '.docx';
        $templateBerkas = new TemplateProcessor('../public/berkas/template/template_pkl.docx');
        $berkasSeminarPkl = '../public/berkas/pkl/seminar/'.$berkasSeminarNama;
        $templateBerkas->setValues(
            [
                'nama' => $mUsers['nama'],
                'npm' => $mUsers['username'],
                'judul_pkl' => $mPKL['judul_pkl'],
                'prodi' => $mPKL['prodi'],

                'dosen_pembimbing_pkl' => $mPKL['nama_dosen_pkl'],
                'nip_dosen_pembimbing_pkl' => $mPKL['nip_dosen_pkl'],

                'dosen_pembimbing_akademik' => $mPKL['nama_dosen_akademik'],
                'nip_dosen_pembimbing_akademik' => $mPKL['nip_dosen_akademik'],

                'pembimbing_lapangan' => $mPKL['pembimbing_lapangan'],
                'nip_pembimbing_lapangan' => $mPKL['no_pembimbing_lapangan'],

                'mitra' => $mPKL['nama_mitra_pkl'],

            ]
        );

        if (file_exists($berkasSeminarPkl)) {
            unlink($berkasSeminarPkl);
        }
        $dataJadwal = [
            'id_pkl' => $id_pkl,
            'id_lokasi_seminar' =>  htmlspecialchars($this->request->getVar('id_lokasi_seminar')),
            'tanggal' =>  htmlspecialchars($this->request->getVar('tanggal')),
            'jam_mulai' =>  htmlspecialchars($this->request->getVar('jam_mulai')),
            'jam_selesai' =>  htmlspecialchars($this->request->getVar('jam_selesai')),
            'pesan_koor' =>  htmlspecialchars($this->request->getVar('pesan_koor')),
            'berkas_seminar' => $berkasSeminarNama,
        ];
        $db = \Config\Database::connect();
        $db->transStart();
        $this->modelJadwalSeminar->insert($dataJadwal);
        $templateBerkas->saveAs($berkasSeminarPkl);
        $db->transComplete();
        if ($db->transStatus() === false) {
            session()->setFlashdata('error', 'Jadwal Seminar PKL Gagal Ditambahkan');
            return redirect()->to('/jadwal/create')->withInput();
        } else {
            session()->setFlashdata('success', 'Jadwal Seminar PKL Berhasil Ditambahkan');
            return redirect()->to('/jadwal');
        }
    }

    public function update($id_pkl)
    {
        $data = [
            'title' => 'Jadwal',
            'validation' => \Config\Services::validation(),
            'jadwal' => $this->modelJadwalSeminar->where('id_pkl', $id_pkl)->first(),
            'pkl' => $this->pklModel->getPklAll(),
            'lokasi' => $this->modelLokasiSeminar->findAll(),
        ];
        return view('pages/koor/jadwal/update', $data);
    }

    public function saveUpdate($id_jadwal){
        $validatedJadwal = $this->validate([
            'id_lokasi_seminar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi harus diisi',
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi',
                ]
            ],
            'jam_mulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jam Mulai harus diisi',
                ]
            ],
            'jam_selesai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jam Selesai harus diisi',
                ]
            ],
        ]);

        if (!$validatedJadwal) {
            return redirect()->to('/jadwal/update/'.$this->request->getVar('id_pkl'))->withInput();
        }
        $dataJadwal = [
            'id_lokasi_seminar' =>  htmlspecialchars($this->request->getVar('id_lokasi_seminar')),
            'tanggal' =>  htmlspecialchars($this->request->getVar('tanggal')),
            'jam_mulai' =>  htmlspecialchars($this->request->getVar('jam_mulai')),
            'jam_selesai' =>  htmlspecialchars($this->request->getVar('jam_selesai')),
            'pesan_koor' =>  htmlspecialchars($this->request->getVar('pesan_koor')),
        ];

        $db = \Config\Database::connect();
        $db->transStart();
        $this->modelJadwalSeminar->update($id_jadwal, $dataJadwal);
        $db->transComplete();
        if ($db->transStatus() === false) {
            session()->setFlashdata('pesan', 'Jadwal Seminar PKL Gagal Diubah');
            return redirect()->to('/jadwal/update/'.$this->request->getVar('id_pkl'))->withInput();
        } else {
            session()->setFlashdata('pesan', 'Jadwal Seminar PKL Berhasil Diubah');
            return redirect()->to('/jadwal');
        }
    }
}
