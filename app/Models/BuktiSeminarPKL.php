<?php

namespace App\Models;

use CodeIgniter\Model;

class BuktiSeminarPKL extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'bukti_seminar_pkl';
    protected $primaryKey       = 'id_bukti_seminar_pkl';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pkl', 'id_user', 'bukti_seminar', 'laporan_pkl', 'tanggal_seminar', 'nilai_pkl_angka', 'nilai_pkl_huruf', 'nilai_seminar_angka', 'nilai_seminar_huruf', 'pesan_admin', 'status_bukti_seminar'];

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

    public function getBuktiAll()
    {
        return $this->db->table('bukti_seminar_pkl')
        ->select('bukti_seminar_pkl.*, pkl_mahasiswa.id_user,
         pkl_mahasiswa.judul_pkl, pkl_mahasiswa.tahun_akademik, 
         pkl_mahasiswa.semester, pkl_mahasiswa.prodi, 
         pkl_mahasiswa.nama_mitra_pkl, pkl_mahasiswa.domisili_pkl, 
         pkl_mahasiswa.periode_seminar_pkl, 
         pkl_mahasiswa.dosen_pembimbing_pkl, 
         pkl_mahasiswa.pembimbing_lapangan, 
         pkl_mahasiswa.no_pembimbing_lapangan, 
         pkl_mahasiswa.toefl, 
         pkl_mahasiswa.sks, 
         pkl_mahasiswa.ipk, 
         pkl_mahasiswa.berkas_kelengkapan, 
         pkl_mahasiswa.persetujuan_seminar_pkl, 
         pkl_mahasiswa.status_pkl, users.username AS npm, users.nama AS nama')
         ->join('pkl_mahasiswa', 'pkl_mahasiswa.id_pkl = bukti_seminar_pkl.id_pkl', 'left')
         ->join('users', 'users.id_user = pkl_mahasiswa.id_user', 'left')
         ->where('pkl_mahasiswa.status_pkl', 'Valid')
         ->get()->getResultArray();
    }
    public function getDetailBukti($id_pkl){
        return $this->db->table('bukti_seminar_pkl')->select('bukti_seminar_pkl.*, pkl_mahasiswa.id_user,
         pkl_mahasiswa.judul_pkl, pkl_mahasiswa.tahun_akademik, 
         pkl_mahasiswa.semester, pkl_mahasiswa.prodi, 
         pkl_mahasiswa.nama_mitra_pkl, pkl_mahasiswa.domisili_pkl, 
         pkl_mahasiswa.periode_seminar_pkl, 
         pkl_mahasiswa.dosen_pembimbing_pkl, 
         pkl_mahasiswa.pembimbing_lapangan, 
         pkl_mahasiswa.no_pembimbing_lapangan, 
         pkl_mahasiswa.toefl, 
         pkl_mahasiswa.sks, 
         pkl_mahasiswa.ipk, 
         pkl_mahasiswa.berkas_kelengkapan, 
         pkl_mahasiswa.persetujuan_seminar_pkl, 
         pkl_mahasiswa.status_pkl, users.username AS npm, users.nama AS nama,')
         ->join('pkl_mahasiswa', 'pkl_mahasiswa.id_pkl = bukti_seminar_pkl.id_pkl', 'left')
         ->join('users', 'users.id_user = pkl_mahasiswa.id_user', 'left')
         ->where('bukti_seminar_pkl.id_pkl', $id_pkl)
         ->get()->getRowArray();
    }
}
