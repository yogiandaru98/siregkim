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
        'prodi',
        'periode_seminar_pkl',
        'lokasi_pkl',
        'dosen_pembimbing_akademik',
        'nip_pembimbing_akademik',
        'dosen_pembimbing_pkl',
        'nip_pembimbing_pkl',
        'pembimbing_lapangan',
        'no_pembimbing_lapangan',
        'sks',
        'ipk',
        'berkas_kelengkapan',
        'berkas_seminar_pkl',
        'bukti_seminar_pkl',
        'status_pkl',
        'status_bukti_seminar_pkl',
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
}
