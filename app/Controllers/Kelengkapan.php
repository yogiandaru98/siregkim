<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kelengkapan extends BaseController
{
    public function __construct()
    {
        $this->modelKelengkapan = new \App\Models\BerkasKelengkapan();
        $this->session = session();
    }
    public function read()
    {
        $data = [
            'title' => 'Kelengkapan',
            'kelengkapan' => $this->modelKelengkapan->findAll(),
        ];
        return view('pages/admin/kelengkapan/read', $data);
    }

    public function update($id_kelengkapan)
    {
        $data = [
            'title' => 'Kelengkapan',
            'validation' => \Config\Services::validation(),
            'kelengkapan' => $this->modelKelengkapan->find($id_kelengkapan),
        ];
        return view('pages/admin/kelengkapan/update', $data);
    }
    public function save($id_kelengkapan){
        $validationKelengkapan = $this->validate([
            'nama_berkas'=>[
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Berkas harus diisi',
                ]
            ],
            'isi_berkas' => [
                'rules' => 'uploaded[isi_berkas]|max_size[isi_berkas,1024]|ext_in[isi_berkas,pdf]',
                'errors' => [
                    'uploaded' => 'Berkas Kelengkapan harus diisi',
                    'max_size' => 'Ukuran Berkas Kelengkapan terlalu besar',
                    'ext_in' => 'Format Berkas Kelengkapan harus PDF',
                ]
            ],
        ]);
        if(!$validationKelengkapan){
            return redirect()->to('/kelengkapan/edit/'.$id_kelengkapan)->withInput();
        }
        $namaBerkas = 'berkas_kelengkapan_pkl.pdf';
        $file_path = 'berkas/kelengkapan/'.$namaBerkas;
        $path = 'berkas/kelengkapan';
        $fileBerkas = $this->request->getFile('isi_berkas');
        if(file_exists($file_path)){
            unlink($file_path);
        }
        $fileBerkas->move($path, $namaBerkas);
        $dataKelengkapan = [
            'nama_berkas' => htmlspecialchars($this->request->getVar('nama_berkas')),
            'isi_berkas' => $namaBerkas,
        ];
        $this->modelKelengkapan->update($id_kelengkapan, $dataKelengkapan);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/kelengkapan');

    }
}
