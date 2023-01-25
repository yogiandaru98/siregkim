<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProfileMahasiswa extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_profile_mahasiswa' => [
                'type' => 'INT',
                'constraint' => 255,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 255,
                'unsigned' => true,
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => '70',
            ],
            'npm' => [
                'type' => 'BIGINT',
                'constraint' => '25',
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
                // 'constraint' => '100',
            ],
            'tanggal_masuk' => [
                'type' => 'DATE',
                // 'constraint' => '100',
            ],
            'angkatan' => [
                'type' => 'INT',
                'constraint' => '4',
            ],
            'semester' => [
                'type' => 'INT',
                'constraint' => '2',
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['Laki-Laki', 'Perempuan']
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
                
            ],
            'no_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
                
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_profile_mahasiswa', true);
        $this->forge->createTable('profile_mahasiswa');
    }

    public function down()
    {
        //
        $this->forge->dropTable('profile_mahasiswa');
    }
}
