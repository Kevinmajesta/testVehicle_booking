<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVehicleLogsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'vehicle_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'log_type' => ['type' => 'ENUM', 'constraint' => ['BBM', 'Service', 'Pemakaian']],
            'description' => ['type' => 'TEXT'],
            'fuel_consumption' => ['type' => 'FLOAT', 'null' => true],
            'date_logged' => ['type' => 'DATE'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('vehicle_logs');
    }

    public function down()
    {
        //
    }
}
