<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
class UsersMahasiswa extends Seeder
{
    public function run()
    {
        //
        $faker = Factory::create('id_ID');

        $data = [];
        for($i=1000; $i<1100; $i++ ){
            $data[] = [
                'username' => $i,
                'password' => password_hash('123', PASSWORD_ARGON2I),
                'nama' => $faker->firstName().' '.$faker->lastName(),
                'is_mahasiswa' => 1,
                'is_dosen' => 0,
                'is_koor' => 0,
                'is_tandik' => 0,
                'is_superadmin' => 0,
                'is_admin' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        $this->db->table('users')->insertBatch($data);
    }
}
