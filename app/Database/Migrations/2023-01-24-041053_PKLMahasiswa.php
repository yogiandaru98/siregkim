<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PKLMahasiswa extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_pkl' => [
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
            'judul_pkl' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'prodi' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'periode_seminar_pkl' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'lokasi_pkl' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'dosen_pembimbing_akademik' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'nip_pembimbing_akademik' => [
                'type' => 'BIGINT',
                'constraint' => '19',
            ],
            'dosen_pembimbing_pkl' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'nip_pembimbing_pkl' => [
                'type' => 'BIGINT',
                'constraint' => '19',
            ],
            'pembimbing_lapangan' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'no_pembimbing_lapangan' => [
                'type' => 'BIGINT',
                'constraint' => '19',
            ],
            'sks' => [
                'type' => 'INT',
                'constraint' => '2',
            ],
            'ipk' => [
                'type' => 'FLOAT',
                'constraint' => '4,2',
            ],
            'status_pkl' => [
                'type' => 'ENUM',
                'constraint' => ['Valid', 'Invalid', 'Diproses'],
                'default' => 'Diproses'
            ],
            'berkas_kelengkapan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'berkas_seminar_pkl' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'bukti_seminar_pkl' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'status_bukti_seminar_pkl' => [
                'type' => 'ENUM',
                'constraint' => ['Valid', 'Invalid', 'Diproses'],
                'default' => 'Diproses'
            ],
            'pesan_admin' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->addKey('id_pkl', true);
        $this->forge->createTable('pkl_mahasiswa');
    }

    public function down()
    {
        //
        $this->forge->dropTable('pkl_mahasiswa');
    }
}
