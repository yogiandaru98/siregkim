<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'password', 'nama', 'is_mahasiswa', 'is_dosen', 'is_koor', 'is_tandik', 'is_superadmin', 'is_admin', 'is_alumni', 'created_at', 'updated_at'];

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

    // get dosen
    public function getDosen()
    {
        return $this->db->table('users')->select('users.*')
            ->where('users.is_dosen', 1)
            ->get()->getResultArray();
    }
    // find dosen
    public function findDosen($id)
    {
        return $this->db->table('users')->select('users.*')
            ->where('users.is_dosen', 1)
            ->where('users.id_user', $id)
            ->get()->getRowArray();
    }
}
