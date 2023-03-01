<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalSeminarPKL extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'jadwal_seminar_pkl';
    protected $primaryKey       = 'id_jadwal_seminar_pkl';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_lokasi_seminar', 'id_pkl', 'tanggal', 'jam_mulai', 'jam_selesai', 'pesan_koor', 'berkas_seminar'];

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

    public function getPklJadwalAll(){
        return $this->db->table('pkl_mahasiswa')->select('pkl_mahasiswa.*,
        dosen_akademik.username AS nip_dosen_akademik, dosen_akademik.nama AS nama_dosen_akademik,
        dosen_pkl.username AS nip_dosen_pkl, dosen_pkl.nama AS nama_dosen_pkl, 
        jadwal_seminar_pkl.id_jadwal_seminar_pkl, jadwal_seminar_pkl.tanggal, jadwal_seminar_pkl.jam_mulai, jadwal_seminar_pkl.jam_selesai, jadwal_seminar_pkl.pesan_koor, jadwal_seminar_pkl.berkas_seminar,
        lokasi_seminar.*, mahasiswa.*')
        ->join('jadwal_seminar_pkl', 'jadwal_seminar_pkl.id_pkl = pkl_mahasiswa.id_pkl','left')
        ->join('lokasi_seminar', 'lokasi_seminar.id_lokasi_seminar = jadwal_seminar_pkl.id_lokasi_seminar','left')
        ->join('profile_mahasiswa', 'profile_mahasiswa.id_user = pkl_mahasiswa.id_user','left')
        ->join('users AS mahasiswa', 'mahasiswa.id_user = pkl_mahasiswa.id_user','left')
        ->join('users AS dosen_akademik', 'dosen_akademik.id_user = profile_mahasiswa.dosen_pembimbing_akademik','left')
        ->join('users AS dosen_pkl', 'dosen_pkl.id_user = pkl_mahasiswa.dosen_pembimbing_pkl','left')
        ->where('pkl_mahasiswa.status_pkl', 'Valid')
        ->orderBy('pkl_mahasiswa.periode_seminar_pkl', 'DESC')
        ->get()->getResultArray();
    }

    

    public function getPklJadwal($id){
        return $this->db->table('pkl_mahasiswa')->select('pkl_mahasiswa.*,
        dosen_akademik.username AS nip_dosen_akademik, dosen_akademik.nama AS nama_dosen_akademik,
        dosen_pkl.username AS nip_dosen_pkl, dosen_pkl.nama AS nama_dosen_pkl, 
        jadwal_seminar_pkl.id_jadwal_seminar_pkl, jadwal_seminar_pkl.tanggal, jadwal_seminar_pkl.jam_mulai, jadwal_seminar_pkl.jam_selesai, jadwal_seminar_pkl.pesan_koor, jadwal_seminar_pkl.berkas_seminar,
        lokasi_seminar.*, mahasiswa.username AS npm, mahasiswa.nama AS nama')
        ->join('jadwal_seminar_pkl', 'jadwal_seminar_pkl.id_pkl = pkl_mahasiswa.id_pkl','left')
        ->join('lokasi_seminar', 'lokasi_seminar.id_lokasi_seminar = jadwal_seminar_pkl.id_lokasi_seminar','left')
        ->join('profile_mahasiswa', 'profile_mahasiswa.id_user = pkl_mahasiswa.id_user','left')
        ->join('users AS mahasiswa', 'mahasiswa.id_user = pkl_mahasiswa.id_user','left')
        ->join('users AS dosen_akademik', 'dosen_akademik.id_user = profile_mahasiswa.dosen_pembimbing_akademik','left')
        ->join('users AS dosen_pkl', 'dosen_pkl.id_user = pkl_mahasiswa.dosen_pembimbing_pkl','left')
        ->where('pkl_mahasiswa.id_pkl', $id)
        ->get()->getResultArray();
    }
}
