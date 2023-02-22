<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ProfileMahasiswa extends Seeder
{
    public function run()
    {
        //
        $faker = Factory::create('id_ID');
        //faker nama tanpa gelar
        

        $data = [];
        for($i=51; $i<150; $i++ ){
            //ternary operator if i > 100 then i-100 else i-50
            $i > 100 ? $dosen_pembimbing_akademik = $i-100 : $dosen_pembimbing_akademik = $i-50;
            
            $tanggal_masuk = $faker->date($format = 'Y-m-d', $max = 'now');
            $angkatan = date('Y', strtotime($tanggal_masuk));
            $data[] = [
                'id_user' => $i,
                'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'tanggal_masuk' => $tanggal_masuk,
                'dosen_pembimbing_akademik' => $dosen_pembimbing_akademik,
                'semester' => $faker->numberBetween($min = 1, $max = 8),
                'jenis_kelamin' => $faker->randomElement($array = array ('Laki-Laki','Perempuan')),
                'alamat' => $faker->address,
                'no_telepon' => '08'.$faker->randomNumber($nbDigits = 9, $strict = false),
                'email' => $faker->email,
                'angkatan' => $angkatan,
                'status_mahasiswa' => $faker->randomElement($array = array ('Aktif', 'Tidak Aktif','Cuti','Lulus','Keluar')),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        $this->db->table('profile_mahasiswa')->insertBatch($data);
    }
}
