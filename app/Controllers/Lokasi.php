<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Lokasi extends BaseController
{

    public function __construct()
    {
        $this->modelLokasi = new \App\Models\LokasiSeminar();
        $this->session = session();
    }

    public function read()
    {
        //
        $data = 
        [
            'title' => 'Lokasi',
            'lokasi' => $this->modelLokasi->findAll(),
        ];
        return view('pages/koor/lokasi/read', $data);
    }

    public function create(){
        $data = [
            'title' => 'Lokasi',
            'validation' => \Config\Services::validation(),
        ];
        return view('pages/koor/lokasi/create', $data);
    }

    public function save(){
        $validatedLokasi = $this->validate([
            'nama_gedung' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lokasi harus diisi',
                ]
            ],
            'nama_ruangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ruangan harus diisi',
                ]
            ],
            
         ]);
        
        if(!$validatedLokasi){
            return redirect()->to('/lokasi/create')->withInput();
        }
        $dataLokasi=[
            'nama_gedung' =>  htmlspecialchars($this->request->getVar('nama_gedung')),
            'nama_ruangan' =>  htmlspecialchars($this->request->getVar('nama_ruangan')),
        ];
        $this->modelLokasi->insert($dataLokasi);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/lokasi');
    }

    public function update($id){
        $data = [
            'title' => 'Lokasi',
            'validation' => \Config\Services::validation(),
            'lokasi' => $this->modelLokasi->find($id),
        ];
        return view('pages/koor/lokasi/update', $data);
    }

    public function saveUpdate($id){
        $validatedLokasi = $this->validate([
            'nama_gedung' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lokasi harus diisi',
                ]
            ],
            'nama_ruangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Ruangan harus diisi',
                ]
            ],
            
         ]);
        
        if(!$validatedLokasi){
            return redirect()->to('/lokasi/update/'.$id)->withInput();
        }
        $dataLokasi=[
            'nama_gedung' =>  htmlspecialchars($this->request->getVar('nama_gedung')),
            'nama_ruangan' =>  htmlspecialchars($this->request->getVar('nama_ruangan')),
        ];
        $this->modelLokasi->update($id, $dataLokasi);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/lokasi');
    }
}
