<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileMahasiswa extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'profile_mahasiswa';
    protected $primaryKey       = 'id_profile_mahasiswa';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'semester', 'npm', 'nama_lengkap', 'tanggal_lahir','tanggal_masuk', 'jenis_kelamin', 'angkatan', 'alamat', 'no_telepon', 'email',  'created_at', 'updated_at'];

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