<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Designations extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('designations');
    }

    public function down()
    {
        $this->forge->dropTable('designations');
    }
}
