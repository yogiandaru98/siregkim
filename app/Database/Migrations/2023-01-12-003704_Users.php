<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '13',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'is_mahasiswa' => [
                'type' => 'INT',
                'constraint' => '1',
            ],
            'is_dosen' => [
                'type' => 'INT',
                'constraint' => '1',
            ],
            'is_koor' => [
                'type' => 'INT',
                'constraint' => '1',
            ],
            'is_tandik' => [
                'type' => 'INT',
                'constraint' => '1',
            ],
            'is_superadmin' => [
                'type' => 'INT',
                'constraint' => '1',
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
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        //
        $this->forge->dropTable('users');
    }
}
