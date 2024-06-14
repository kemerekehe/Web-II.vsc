<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Buku extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_buku' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'unique' => TRUE,
            ],
            'judul_buku' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
                'null' => FALSE,
            ],
            'penulis' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
                'null' => FALSE,
            ],
            'penerbit' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => FALSE,
            ],
            'tahun_terbit' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ]
        ]);

        $this->forge->addKey('id_buku', TRUE);
        $this->forge->createTable('buku', true);
    }
    public function down()
    {
        $this->forge->dropTable('buku');
    }
}
