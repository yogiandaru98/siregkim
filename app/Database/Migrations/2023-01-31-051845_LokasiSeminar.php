<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LokasiSeminar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_lokasi_seminar' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_gedung' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_ruangan' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
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
        $this->forge->addKey('id_lokasi_seminar', true);
        $this->forge->createTable('lokasi_seminar');
    }

    public function down()
    {
        $this->forge->dropTable('lokasi_seminar');
    }
}
