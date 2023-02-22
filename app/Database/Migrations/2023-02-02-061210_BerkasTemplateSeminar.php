<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BerkasTemplateSeminar extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_berkas_template_seminar' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_seminar' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'file_template' => [
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
        $this->forge->addKey('id_berkas_template_seminar', true);
        $this->forge->createTable('berkas_template_seminar');
    }

    public function down()
    {
        //
        $this->forge->dropTable('berkas_template_seminar');
    }
}
