<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UsersDosen extends Seeder
{
    public function run()
    {
        //
        $faker = Factory::create('id_ID');

        $data = [];
        for($i=2000; $i<2050; $i++ ){
            $data[] = [
                'username' => $i,
                'password' => password_hash('123', PASSWORD_ARGON2I),
                'nama' => $faker->firstName().' '.$faker->lastName().' '.$faker->suffix(),
                'is_mahasiswa' => 0,
                'is_dosen' => 1,
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
