<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrasiPKL extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pkl_mahasiswa';
    protected $primaryKey       = 'id_pkl';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_user',
        'judul_pkl',
        'tahun_akademik',
        'semester',
        'prodi',
        'nama_mitra_pkl',
        'domisili_pkl',
        'periode_seminar_pkl',
        'dosen_pembimbing_pkl',
        'pembimbing_lapangan',
        'no_pembimbing_lapangan',
        'toefl',
        'sks',
        'ipk',
        'berkas_kelengkapan',
        'persetujuan_seminar_pkl',
        'status_pkl',
        'pesan_admin',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    
    public function getPklAll(){
        return $this->db->table('pkl_mahasiswa')->select('pkl_mahasiswa.*, profile_mahasiswa.*, users.*')
        ->join('profile_mahasiswa', 'profile_mahasiswa.id_user = pkl_mahasiswa.id_user')
        ->join('users', 'users.id_user = pkl_mahasiswa.id_user')
        ->get()->getResultArray();
    }

    public function getDetailPkl($id){
        return $this->db->table('pkl_mahasiswa')->select('pkl_mahasiswa.*,
        dosen_akademik.username AS nip_dosen_akademik, dosen_akademik.nama AS nama_dosen_akademik,
        dosen_pkl.username AS nip_dosen_pkl, dosen_pkl.nama AS nama_dosen_pkl')
        ->join('profile_mahasiswa', 'profile_mahasiswa.id_user = pkl_mahasiswa.id_user')
        ->join('users', 'users.id_user = pkl_mahasiswa.id_user')
        ->join('users AS dosen_akademik', 'dosen_akademik.id_user = profile_mahasiswa.dosen_pembimbing_akademik')
        ->join('users AS dosen_pkl', 'dosen_pkl.id_user = pkl_mahasiswa.dosen_pembimbing_pkl')
        ->where('pkl_mahasiswa.id_user', $id)
        ->get()->getRowArray();
    }

    public function getDetailPklAdmin($id){
        return $this->db->table('pkl_mahasiswa')->select('pkl_mahasiswa.*,
        dosen_akademik.username AS nip_dosen_akademik, dosen_akademik.nama AS nama_dosen_akademik,
        dosen_pkl.username AS nip_dosen_pkl, dosen_pkl.nama AS nama_dosen_pkl')
        ->join('profile_mahasiswa', 'profile_mahasiswa.id_user = pkl_mahasiswa.id_user')
        ->join('users', 'users.id_user = pkl_mahasiswa.id_user')
        ->join('users AS dosen_akademik', 'dosen_akademik.id_user = profile_mahasiswa.dosen_pembimbing_akademik')
        ->join('users AS dosen_pkl', 'dosen_pkl.id_user = pkl_mahasiswa.dosen_pembimbing_pkl')
        ->where('pkl_mahasiswa.id_pkl', $id)
        ->get()->getRowArray();
    }

    public function getAllDetailPkl(){
        return $this->db->table('pkl_mahasiswa')->select('pkl_mahasiswa.*,
        dosen_akademik.username AS nip_dosen_akademik, dosen_akademik.nama AS nama_dosen_akademik,
        dosen_pkl.username AS nip_dosen_pkl, dosen_pkl.nama AS nama_dosen_pkl')
        ->join('profile_mahasiswa', 'profile_mahasiswa.id_user = pkl_mahasiswa.id_user')
        ->join('users', 'users.id_user = pkl_mahasiswa.id_user')
        ->join('profile_mahasiswa AS dosen_akademik', 'users.id_user = dosen_akademik.dosen_pembimbing_akademik')
        ->join('users AS dosen_pkl', 'dosen_pkl.id_user = pkl_mahasiswa.dosen_pembimbing_pkl')
        ->get()->getResultArray();
    }

    

}
