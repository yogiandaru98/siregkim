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
    protected $allowedFields    = ['id_pkl', 'bukti_seminar', 'laporan_pkl', 'tanggal_seminar', 'nilai_pkl_angka', 'nilai_pkl_huruf','nilai_seminar_angka', 'nilai_seminar_huruf', 'pesan_admin', 'status_bukti_seminar'];

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
