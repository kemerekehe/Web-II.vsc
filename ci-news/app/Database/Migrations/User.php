<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => FALSE,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => FALSE,
                'unique' => TRUE,
            ],
            'password' => [
                'type' => 'TEXT',
                'constraint' => 255,
                'null' => FALSE,
            ]
        ]);

        $this->forge->addKey('id_user', TRUE);
        $this->forge->createTable('user', true);
    }
    public function down()
    {
        $this->forge->dropTable('user');
    }
}
?>