<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Post extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => True, 
                'auto_increment'=> True
            ],
            'title'      => [
                'type'          => 'VARCHAR',
                'constraint'    => '255'
            ],
            'comment'    => [
                "type"          => 'TEXT'
            ],          
        ]);
        $this->forge->addkey('id',TRUE);
        $this->forge->createTable('posts');
    }

    public function down()
    {
        //
    }
}
