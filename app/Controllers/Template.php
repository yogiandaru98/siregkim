<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Template extends BaseController
{
    public function __construct()
    {
        $this->modelTemplate = new \App\Models\BerkasTemplateSeminar();
        $this->session = session();
    }
    public function read()
    {
        $data = [
            'title' => 'Template',
            'template' => $this->modelTemplate->findAll(),
        ];
        return view('pages/admin/template/read', $data);
    }

    public function update($id_Template)
    {
        $data = [
            'title' => 'Template',
            'validation' => \Config\Services::validation(),
            'template' => $this->modelTemplate->find($id_Template),
        ];
        return view('pages/admin/template/update', $data);
    }
    public function save($id_Template){
        $validationTemplate = $this->validate([
            'nama_seminar'=>[
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Berkas harus diisi',
                ]
            ],
            'file_template' => [
                'rules' => 'uploaded[file_template]|max_size[file_template,5024]|ext_in[file_template,docx,doc]',
                'errors' => [
                    'uploaded' => 'Berkas Template harus diisi',
                    'max_size' => 'Ukuran Berkas Template terlalu besar',
                    'ext_in' => 'Format Berkas Template harus PDF',
                ]
            ],
        ]);
        if(!$validationTemplate){
            return redirect()->to('/template/edit/'.$id_Template)->withInput();
        }
        $fileBerkas = $this->request->getFile('file_template');
        $namaBerkas = 'template_pkl.docx';
        
        // $namaBerkas = 'template_pkl';
        $file_path = 'berkas/template/'.$namaBerkas;
        $path = 'berkas/template';

        if(file_exists($file_path)){
            unlink($file_path);
        }
        $fileBerkas->move($path, $namaBerkas);
        $dataTemplate = [
            'nama_seminar' => htmlspecialchars($this->request->getVar('nama_seminar')),
            'file_template' => $namaBerkas,
        ];
        $this->modelTemplate->update($id_Template, $dataTemplate);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/template');

    }
}
