<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'model' => ['type' => 'VARCHAR', 'constraint' => 100],
            'plate_number' => ['type' => 'VARCHAR', 'constraint' => 20],
            'type' => ['type' => 'ENUM', 'constraint' => ['Orang', 'Barang']],
            'ownership' => ['type' => 'ENUM', 'constraint' => ['Perusahaan', 'Sewa']],
            'region_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('vehicles');
    }

    public function down()
    {
        $this->forge->dropTable('vehicles');
    }
}
