<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuktiSeminarPkl extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_bukti_seminar_pkl' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_pkl' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'bukti_seminar' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'laporan_pkl'=>[
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tanggal_seminar' => [
                'type' => 'DATE',
            ],
            'nilai_pkl_angka' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'nilai_pkl_huruf' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'nilai_seminar_angka' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'nilai_seminar_huruf' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'status_bukti_seminar' => [
                'type' => 'ENUM',
                'constraint' => ['Valid', 'Invalid', 'Diproses'],
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
        $this->forge->addKey('id_bukti_seminar_pkl', true);
        $this->forge->addForeignKey('id_pkl', 'pkl_mahasiswa', 'id_pkl', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bukti_seminar_pkl');
    }

    public function down()
    {
        //
        $this->forge->dropTable('bukti_seminar_pkl');
    }
}
