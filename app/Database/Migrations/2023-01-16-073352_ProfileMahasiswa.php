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
            'tanggal_lahir' => [
                'type' => 'DATE',
                // 'constraint' => '100',
            ],
            'tanggal_masuk' => [
                'type' => 'DATE',
                // 'constraint' => '100',
            ],
            'dosen_pembimbing_akademik' => [
                'type' => 'INT',
                'constraint' => 255,
                'unsigned' => true,
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
            'status_mahasiswa'=> [
                'type' => 'ENUM',
                'constraint' => ['Aktif', 'Tidak Aktif', 'Lulus', 'Cuti', 'Keluar']
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
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('dosen_pembimbing_akademik', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('profile_mahasiswa');
    }

    public function down()
    {
        //
        $this->forge->dropTable('profile_mahasiswa');
    }
}
