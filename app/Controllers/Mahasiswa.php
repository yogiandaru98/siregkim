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
        // $this->load->helper('tgl_indo', 'custom_fungsi');
        helper('convertText');
        
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
         ]);
         if(!$validatedProfile){
            return redirect()->to('mahasiswa/profile')->withInput();
         }
         $angkatan = $this->request->getVar('tanggal_masuk');
         $angkatan = substr($angkatan, 0, 4);
         $dataProfile=[
            'id_user' => session()->get('id_user'),
            'nama_lengkap' =>ucwords(strtolower(session()->get('nama'))) ,
            'npm' => session()->get('username'),
            'semester'=> htmlspecialchars($this->request->getVar('semester')),
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
    public function editProfile()
    {
        session();  
        // $profileM= $this->profilMahasiswa->where(['id_user' => session()->get('id_user')])->first();
        $data = [
            'title' => 'Profile',
            'profilMahasiswa' => $this->profilMahasiswa->where(['id_user' => session()->get('id_user')])->first(),
            'validation' => \Config\Services::validation(),
            
        ];
        return view('pages/mahasiswa/profile/update', $data);
    }
    public function updateProfile()
    {
        $validatedProfile = $this->validate([
            'nama_lengkap' => [
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
         ]);
         if(!$validatedProfile){
            return redirect()->to('mahasiswa/profile')->withInput();
         }
         $angkatan = $this->request->getVar('tanggal_masuk');
         $angkatan = substr($angkatan, 0, 4);
         $dataProfile=[
            // 'id_user' => session()->get('id_user'),
            'nama_lengkap' => htmlspecialchars(ucwords(strtolower($this->request->getVar('nama_lengkap')))),
            // 'npm' => session()->get('username'),
            'tanggal_lahir' =>  htmlspecialchars($this->request->getVar('tanggal_lahir')),
            'tanggal_masuk' =>  htmlspecialchars($this->request->getVar('tanggal_masuk')),
            'angkatan' =>  htmlspecialchars($angkatan),
            'semester' =>  htmlspecialchars($this->request->getVar('semester')),
            'jenis_kelamin' =>  htmlspecialchars($this->request->getVar('jenis_kelamin')),
            'alamat' =>  htmlspecialchars($this->request->getVar('alamat')),
            'email' =>  htmlspecialchars($this->request->getVar('email')),
            'no_telepon' =>  htmlspecialchars($this->request->getVar('no_telepon')),
            'updated_at' => date('Y-m-d H:i:s'),
            ];
        $dataUser=[
            'nama' => htmlspecialchars(ucwords(strtolower($this->request->getVar('nama_lengkap')))),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $db = \Config\Database::connect();
        $db->transStart();
            $this->modelUsers->update(session()->get('id_user'), $dataUser);
            $this->profilMahasiswa->update(session()->get('id_user'), $dataProfile);
        $db->transComplete();
        if ($db->transStatus() === FALSE)
        {
            session()->setFlashdata('pesan', 'Data gagal diubah');
            return redirect()->to('mahasiswa/profile/gagal');
        }

            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to('mahasiswa/profile');
        # code...
    }

    
    //pkl
    public function Pkl()
    {
        session();
        $data = [
            'title' => 'PKL',
            'pkl' => $this->modelPKL->where(['id_user' => session()->get('id_user')])->first(),
            'validation' => \Config\Services::validation(),
        ];
        $mPKL= $this->modelPKL->where(['id_user' => session()->get('id_user')])->first();
        if($mPKL){
            return view('pages/mahasiswa/pkl/read', $data);
        }else{
            return view('pages/mahasiswa/pkl/create', $data);
        }
    }
    public function savePkl(){
        $validatedPkl = $this->validate([
            'judul_pkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul PKL harus diisi',
                ]
            ],
            'periode_seminar_pkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Periode Seminar PKL harus diisi',
                ]
            ],
            'lokasi_pkl'=>[
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi PKL harus diisi',
                ]
            ],
            'dosen_pembimbing_akademik'=>[
                'rules' => 'required',
                'errors' => [
                    'required' => 'Dosen Pembimbing Akademik harus diisi',
                ]
            ],
            'nip_pembimbing_akademik'=>[
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'NIP Dosen Pembimbing Akademik harus diisi',
                    'numeric' => 'NIP Dosen Pembimbing Akademik harus angka',
                ]
            ],
            'dosen_pembimbing_pkl'=>[
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pembimbing pkl harus diisi',
                ]
            ],
            'nip_pembimbing_pkl'=>[
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'NIP Pembimbing pkl harus diisi',
                    'numeric' => 'NIP Pembimbing pkl harus angka',
                ]
            ],
            'pembimbing_lapangan'=>[
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pembimbing Lapangan harus diisi',
                ]
            ],
            'no_pembimbing_lapangan'=>[
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'NIP Pembimbing Lapangan harus diisi',
                    'numeric' => 'NIP Pembimbing Lapangan harus angka',
                ]
            ],
            'sks'=>[
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'SKS harus diisi',
                    'numeric' => 'SKS harus angka',
                ]
            ],
            'ipk'=>[
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'IPK harus diisi',
                    'numeric' => 'IPK harus angka',
                ]
            ],
            'berkas_kelengkapan'=>[
                'rules' => 'uploaded[berkas_kelengkapan]|max_size[berkas_kelengkapan,1024]|ext_in[berkas_kelengkapan,pdf]',
                'errors' => [
                    'uploaded' => 'Berkas Kelengkapan harus diisi',
                    'max_size' => 'Ukuran Berkas Kelengkapan maksimal 1 MB',
                    'ext_in' => 'Berkas Kelengkapan harus berformat PDF',
                ]
            ],
        ]);
        if(!$validatedPkl){
            return redirect()->to('mahasiswa/pkl')->withInput();
        }
        $fileBerkasKelengkapan = $this->request->getFile('berkas_kelengkapan');
        $namaFile = session()->get('username').'_'.session()->get('nama').'_'.'berkas_kelengkapan'.'.'.$fileBerkasKelengkapan->getClientExtension();
        // replace fileberkaskelengkapan if exist
        if(file_exists('berkas/pkl/'.$namaFile)){
            unlink('berkas/pkl/'.$namaFile);
        }
        $fileBerkasKelengkapan->move('berkas/pkl', $namaFile);
       
        $id_user = session()->get('id_user');
        $periode_seminar_pkl = htmlspecialchars($this->request->getVar('periode_seminar_pkl'));
        $lokasi_pkl = htmlspecialchars($this->request->getVar('lokasi_pkl'));
        $dosen_pembimbing_akademik = htmlspecialchars($this->request->getVar('dosen_pembimbing_akademik'));
        $nip_pembimbing_akademik = htmlspecialchars($this->request->getVar('nip_pembimbing_akademik'));
        $dosen_pembimbing_pkl = htmlspecialchars($this->request->getVar('dosen_pembimbing_pkl'));
        $nip_pembimbing_pkl = htmlspecialchars($this->request->getVar('nip_pembimbing_pkl'));
        $pembimbing_lapangan = htmlspecialchars($this->request->getVar('pembimbing_lapangan'));
        $no_pembimbing_lapangan = htmlspecialchars($this->request->getVar('no_pembimbing_lapangan'));
        $sks = htmlspecialchars($this->request->getVar('sks'));
        $ipk = htmlspecialchars($this->request->getVar('ipk'));
        $berkas_kelengkapan = $namaFile;


        $status_pkl = "Diproses";
        $prodi = "S1 - Kimia";

        $templatePkl = new TemplateProcessor('../public/Berkas/template/template_pkl2.docx');
        $berkasSeminarNama = 'berkas_seminar_'.session()->get('username').'.docx';
        $berkasSeminarPkl = '../public/Berkas/pkl/'.$berkasSeminarNama;

        $data = [
            'id_user' => session()->get('id_user'),
            'judul_pkl' => htmlspecialchars(convertText($this->request->getVar('judul_pkl'))),
            'periode_seminar_pkl' => htmlspecialchars($this->request->getVar('periode_seminar_pkl')),
            'lokasi_pkl' => htmlspecialchars($this->request->getVar('lokasi_pkl')),
            'dosen_pembimbing_akademik' => htmlspecialchars($this->request->getVar('dosen_pembimbing_akademik')),
            'nip_pembimbing_akademik' => htmlspecialchars($this->request->getVar('nip_pembimbing_akademik')),
            'dosen_pembimbing_pkl' => htmlspecialchars($this->request->getVar('dosen_pembimbing_pkl')),
            'nip_pembimbing_pkl' => htmlspecialchars($this->request->getVar('nip_pembimbing_pkl')),
            'pembimbing_lapangan' => htmlspecialchars($this->request->getVar('pembimbing_lapangan')),
            'no_pembimbing_lapangan' => htmlspecialchars($this->request->getVar('no_pembimbing_lapangan')),
            'sks' => htmlspecialchars($this->request->getVar('sks')),
            'ipk' => htmlspecialchars($this->request->getVar('ipk')),
            'berkas_kelengkapan' => $namaFile,
            'berkas_seminar_pkl' => $berkasSeminarNama,
            'prodi' => "S1 - Kimia",
            'created_at' => date('Y-m-d H:i:s'),
        ];
        // $templatePkl = IOFactory::load('../public/Berkas/template/template_pkl.docx');
        $templatePkl->setValues(
            [
                'nama'=>session()->get('nama'),
                'npm'=>session()->get('username'),
                'judul_pkl'=>convertText($this->request->getVar('judul_pkl')),
                'prodi'=>$prodi,
                'dosen_pembimbing_pkl'=>$dosen_pembimbing_pkl,
                'nip_pembimbing_pkl'=>$nip_pembimbing_pkl,
                'periode_seminar_pkl'=>$periode_seminar_pkl,
                'lokasi_pkl'=>$lokasi_pkl,
                'dosen_pembimbing_akademik'=>$dosen_pembimbing_akademik,
                'nip_pembimbing_akademik'=>$nip_pembimbing_akademik,
                'pembimbing_lapangan'=>$pembimbing_lapangan,
                'no_pembimbing_lapangan'=>$no_pembimbing_lapangan,
                'sks'=>$sks,
                'ipk'=>$ipk,
                
            ]
            );
            //replace file if exist
            if(file_exists($berkasSeminarPkl)){
                unlink($berkasSeminarPkl);
            }

            $this->modelPKL->insert($data);
            $templatePkl->saveAs($berkasSeminarPkl);

        session()->setFlashdata('pesan', 'Data PKL berhasil ditambahkan');
        return redirect()->to('mahasiswa/pkl');
        
    }
    public function editPkl(){
        session();
        $id_pkl = $this->modelPKL->where('id_user', session()->get('id_user'))->first();
        $data = [
            'title' => 'PKL',
            'validation' => \Config\Services::validation(),
            'pkl' => $this->modelPKL->where('id_pkl', $id_pkl['id_pkl'])->first(),
        ];
        return view('pages/mahasiswa/pkl/update', $data);

    }
    public function updatePkl(){
        $validatedPkl = $this->validate([
            'judul_pkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul PKL harus diisi',
                ]
            ],
            'periode_seminar_pkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Periode Seminar PKL harus diisi',
                ]
            ],
            'lokasi_pkl'=>[
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi PKL harus diisi',
                ]
            ],
            'dosen_pembimbing_akademik'=>[
                'rules' => 'required',
                'errors' => [
                    'required' => 'Dosen Pembimbing Akademik harus diisi',
                ]
            ],
            'nip_pembimbing_akademik'=>[
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'NIP Dosen Pembimbing Akademik harus diisi',
                    'numeric' => 'NIP Dosen Pembimbing Akademik harus angka',
                ]
            ],
            'dosen_pembimbing_pkl'=>[
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pembimbing pkl harus diisi',
                ]
            ],
            'nip_pembimbing_pkl'=>[
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'NIP Pembimbing pkl harus diisi',
                    'numeric' => 'NIP Pembimbing pkl harus angka',
                ]
            ],
            'pembimbing_lapangan'=>[
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pembimbing Lapangan harus diisi',
                ]
            ],
            'no_pembimbing_lapangan'=>[
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'NIP Pembimbing Lapangan harus diisi',
                    'numeric' => 'NIP Pembimbing Lapangan harus angka',
                ]
            ],
            'sks'=>[
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'SKS harus diisi',
                    'numeric' => 'SKS harus angka',
                ]
            ],
            'ipk'=>[
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'IPK harus diisi',
                    'numeric' => 'IPK harus angka',
                ]
            ],
            'berkas_kelengkapan'=>[
                'rules' => 'uploaded[berkas_kelengkapan]|max_size[berkas_kelengkapan,1024]|ext_in[berkas_kelengkapan,pdf]',
                'errors' => [
                    'uploaded' => 'Berkas Kelengkapan harus diisi',
                    'max_size' => 'Ukuran Berkas Kelengkapan maksimal 1 MB',
                    'ext_in' => 'Berkas Kelengkapan harus berformat PDF',
                ]
            ],
        ]);
        if(!$validatedPkl){
            return redirect()->to('mahasiswa/pkl/edit')->withInput();
        }
        $id_pkl = $this->modelPKL->where('id_user', session()->get('id_user'))->first();
        $fileBerkasKelengkapan = $this->request->getFile('berkas_kelengkapan');
        $namaFile = session()->get('username').'_'.session()->get('nama').'_'.'berkas_kelengkapan'.'.'.$fileBerkasKelengkapan->getClientExtension();

        if(file_exists('berkas/pkl/'.$namaFile)){
            unlink('berkas/pkl/'.$namaFile);
        }
        $fileBerkasKelengkapan->move('berkas/pkl', $namaFile);

        $id_user = session()->get('id_user');
        $periode_seminar_pkl = htmlspecialchars($this->request->getVar('periode_seminar_pkl'));
        $lokasi_pkl = htmlspecialchars($this->request->getVar('lokasi_pkl'));
        $dosen_pembimbing_akademik = htmlspecialchars($this->request->getVar('dosen_pembimbing_akademik'));
        $nip_pembimbing_akademik = htmlspecialchars($this->request->getVar('nip_pembimbing_akademik'));
        $dosen_pembimbing_pkl = htmlspecialchars($this->request->getVar('dosen_pembimbing_pkl'));
        $nip_pembimbing_pkl = htmlspecialchars($this->request->getVar('nip_pembimbing_pkl'));
        $pembimbing_lapangan = htmlspecialchars($this->request->getVar('pembimbing_lapangan'));
        $no_pembimbing_lapangan = htmlspecialchars($this->request->getVar('no_pembimbing_lapangan'));
        $sks = htmlspecialchars($this->request->getVar('sks'));
        $ipk = htmlspecialchars($this->request->getVar('ipk'));
        $berkas_kelengkapan = $namaFile;


        $status_pkl = "Diproses";
        $prodi = "S1 - Kimia";

        $templatePkl = new TemplateProcessor('../public/Berkas/template/template_pkl2.docx');
        $berkasSeminarNama = 'berkas_seminar_'.session()->get('username').'.docx';
        $berkasSeminarPkl = '../public/Berkas/pkl/'.$berkasSeminarNama;

        $data = [
            'id_user' => session()->get('id_user'),
            'judul_pkl' => htmlspecialchars(convertText($this->request->getVar('judul_pkl'))),
            'periode_seminar_pkl' => htmlspecialchars($this->request->getVar('periode_seminar_pkl')),
            'lokasi_pkl' => htmlspecialchars($this->request->getVar('lokasi_pkl')),
            'dosen_pembimbing_akademik' => htmlspecialchars($this->request->getVar('dosen_pembimbing_akademik')),
            'nip_pembimbing_akademik' => htmlspecialchars($this->request->getVar('nip_pembimbing_akademik')),
            'dosen_pembimbing_pkl' => htmlspecialchars($this->request->getVar('dosen_pembimbing_pkl')),
            'nip_pembimbing_pkl' => htmlspecialchars($this->request->getVar('nip_pembimbing_pkl')),
            'pembimbing_lapangan' => htmlspecialchars($this->request->getVar('pembimbing_lapangan')),
            'no_pembimbing_lapangan' => htmlspecialchars($this->request->getVar('no_pembimbing_lapangan')),
            'sks' => htmlspecialchars($this->request->getVar('sks')),
            'ipk' => htmlspecialchars($this->request->getVar('ipk')),
            'berkas_kelengkapan' => $namaFile,
            'berkas_seminar_pkl' => $berkasSeminarNama,
            'prodi' => "S1 - Kimia",
            'updated_at' => date('Y-m-d H:i:s'),
            'status_pkl' => "Diproses",
        ];

        $templatePkl->setValues(
            [
                'nama'=>session()->get('nama'),
                'npm'=>session()->get('username'),
                'judul_pkl'=>convertText($this->request->getVar('judul_pkl')),
                'prodi'=>$prodi,
                'dosen_pembimbing_pkl'=>$dosen_pembimbing_pkl,
                'nip_pembimbing_pkl'=>$nip_pembimbing_pkl,
                'periode_seminar_pkl'=>$periode_seminar_pkl,
                'lokasi_pkl'=>$lokasi_pkl,
                'dosen_pembimbing_akademik'=>$dosen_pembimbing_akademik,
                'nip_pembimbing_akademik'=>$nip_pembimbing_akademik,
                'pembimbing_lapangan'=>$pembimbing_lapangan,
                'no_pembimbing_lapangan'=>$no_pembimbing_lapangan,
                'sks'=>$sks,
                'ipk'=>$ipk,
            ]
            );

        if(file_exists($berkasSeminarPkl)){
            unlink($berkasSeminarPkl);
        }
        $db = \Config\Database::connect();
        $db->transStart();
        $this->modelPKL->update($id_pkl['id_pkl'], $data);
        $templatePkl->saveAs($berkasSeminarPkl);
        $db->transComplete();
        if ($db->transStatus() === FALSE)
        {
            session()->setFlashdata('pesan', 'Data gagal diUpdate');
            return redirect()->to('/mahasiswa/pkl');
        }
        else
        {
            session()->setFlashdata('pesan', 'Data berhasil diUpdate');
            return redirect()->to('/mahasiswa/pkl');
        }
    }
    public function updateBuktiSeminar(){
        $id_pkl = $this->modelPKL->where('id_user', session()->get('id_user'))->first();
        $bukti_seminar = $this->request->getFile('bukti_seminar');
        $namaFile = 'bukti_seminar_'.session()->get('username').'.'.$bukti_seminar->getClientExtension();
        if(file_exists('../public/Berkas/pkl/'.$namaFile)){
            unlink('../public/Berkas/pkl/'.$namaFile);
        }
        $bukti_seminar->move('../public/Berkas/pkl', $namaFile);
        $data = [
            'bukti_seminar_pkl' => $namaFile,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        session()->setFlashdata('pesan', 'Bukti Seminar berhasil diUpdate');
        $this->modelPKL->update($id_pkl['id_pkl'], $data);
        return redirect()->to('/mahasiswa/pkl');
    }
}
