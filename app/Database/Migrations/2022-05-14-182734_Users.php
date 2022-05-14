<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'f_name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'l_name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'email'       => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'phone'       => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
            ],
            'department_id'       => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'designation_id'       => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'note' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'password'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
