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
    protected $allowedFields    = [
        'id_user',
        'status',
        'dosen_pembimbing_akademik',
        'semester',
        'tanggal_lahir',
        'tanggal_masuk',
        'jenis_kelamin',
        'angkatan',
        'alamat',
        'no_telepon',
        'email',
        'created_at',
        'updated_at'
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
    // joi tabel profile_mahasiswa dengan tabel users get result array
    public function joinUsers($id_user)
    {
        return $this->db->table('profile_mahasiswa')->select('profile_mahasiswa.*, users.*, dosen_pembimbing_akademik.nama AS nama_dosen_pembimbing_akademik, dosen_pembimbing_akademik.username AS nip_dosen_pembimbing_akademik')
            ->join('users AS dosen_pembimbing_akademik', 'dosen_pembimbing_akademik.id_user = profile_mahasiswa.dosen_pembimbing_akademik')
            ->join('users', 'users.id_user = profile_mahasiswa.id_user')
            ->where('profile_mahasiswa.id_user', $id_user)
            ->get()->getRowArray();
    }
    // dapatkan nama dosen dari users menggunakan foreign key dosen_pembimbing_akademik di tabel profile_mahasiswa
    // public function getNamaDosen($id_user)
    // {
    //     return $this->db->table('profile_mahasiswa')->select('profile_mahasiswa.*, users.nama AS nama_dosen_pembimbing_akademik')
    //         ->join('users', 'users.id_user = profile_mahasiswa.dosen_pembimbing_akademik')
    //         ->where('profile_mahasiswa.id_user', $id_user)
    //         ->get()->getRowArray();
    // }
}
