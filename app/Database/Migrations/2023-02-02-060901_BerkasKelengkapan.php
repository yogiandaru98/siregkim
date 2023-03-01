<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BerkasKelengkapan extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_berkas_kelengkapan' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_berkas' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'isi_berkas' => [
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
        $this->forge->addKey('id_berkas_kelengkapan', true);
        $this->forge->createTable('berkas_kelengkapan');
    }

    public function down()
    {
        //
        $this->forge->dropTable('berkas_kelengkapan');
    }
}
