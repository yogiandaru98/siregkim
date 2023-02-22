<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JadwalSeminarPkl extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_jadwal_seminar_pkl' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_lokasi_seminar' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'id_pkl' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'jam_mulai' => [
                'type' => 'TIME',
            ],
            'jam_selesai' => [
                'type' => 'TIME',
            ],
            'berkas_seminar' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'pesan_koor' => [
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
        $this->forge->addKey('id_jadwal_seminar_pkl', true);
        $this->forge->addForeignKey('id_lokasi_seminar', 'lokasi_seminar', 'id_lokasi_seminar', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pkl', 'pkl_mahasiswa', 'id_pkl', 'CASCADE', 'CASCADE');
        $this->forge->createTable('jadwal_seminar_pkl');
    }

    public function down()
    {
        //
        $this->forge->dropTable('jadwal_seminar_pkl');
    }
}
