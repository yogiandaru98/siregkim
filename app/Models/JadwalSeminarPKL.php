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
}
