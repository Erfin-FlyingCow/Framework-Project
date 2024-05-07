<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField ([
            'nim'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'Nama'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'Kelas'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'Angkatan'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
        ]);
        $this->forge->addkey('nim',TRUE);
        $this->forge->createTable('Mahasiswa');
    }

    public function down()
    {
        //
    }
}
