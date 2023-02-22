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
            'tahun_akademik' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'semester' => [
                'type' => 'ENUM',
                'constraint' => ['Ganjil', 'Genap'],
            ],
            'prodi' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'nama_mitra_pkl' => [
                'type' => 'varchar',
                'constraint' => '255',
            ],
            'domisili_pkl' => [
                'type' => 'ENUM',
                'constraint' => ['Universitas Lampung', 'Dalam Lampung', 'Luar Lampung'],
            ],
            'periode_seminar_pkl' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'dosen_pembimbing_pkl' => [
                'type' => 'INT',
                'constraint' => 255,
                'unsigned' => true,
            ],
            'pembimbing_lapangan' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'no_pembimbing_lapangan' => [
                'type' => 'BIGINT',
                'constraint' => '19',
            ],
            'toefl' => [
                'type' => 'INT',
                'constraint' => '4',
                'null' => true,
            ],
            'sks' => [
                'type' => 'INT',
                'constraint' => '2',
            ],
            'ipk' => [
                'type' => 'FLOAT',
                'constraint' => '4,2',
            ],
            'berkas_kelengkapan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'persetujuan_seminar_pkl' => [
                'type' => 'ENUM',
                'constraint' => ['Sejutu'],
            ],
            'pesan_admin' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'status_pkl' => [
                'type' => 'ENUM',
                'constraint' => ['Valid', 'Invalid', 'Diproses'],
                'default' => 'Diproses'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            // 'bukti_seminar_pkl' => [
            //     'type' => 'VARCHAR',
            //     'constraint' => '255',
            // ],
            // 'status_bukti_seminar_pkl' => [
            //     'type' => 'ENUM',
            //     'constraint' => ['Valid', 'Invalid', 'Diproses'],
            //     'default' => 'Diproses'
            // ],


            // 'lokasi_seminar_pkl' => [
            //     'type' => 'int',
            //     'constraint' => '10',
            //     'default' => 'null',
            //     'unsigned' => true,
            // ],
            // 'tanggal_seminar_pkl' => [
            //     'type' => 'DATE',
            //     'null' => true,
            // ],
            // 'jam_mulai_seminar_pkl' => [
            //     'type' => 'TIME',
            //     'null' => true,
            // ],
            // 'jam_selesai_seminar_pkl' => [
            //     'type' => 'TIME',
            //     'null' => true,
            // ],

            
            // 'berkas_seminar_pkl' => [
            //     'type' => 'VARCHAR',
            //     'constraint' => '255',
                
            // ],
        ]);
        $this->forge->addKey('id_pkl', true);
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('dosen_pembimbing_pkl', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pkl_mahasiswa');
    }

    public function down()
    {
        //
        $this->forge->dropTable('pkl_mahasiswa');
    }
}
