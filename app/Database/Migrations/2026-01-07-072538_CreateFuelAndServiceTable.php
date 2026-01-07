<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFuelAndServiceTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'vehicle_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'log_type' => ['type' => 'ENUM', 'constraint' => ['BBM', 'Service']], // Konsisten dengan controller
            'fuel_consumption' => ['type' => 'FLOAT', 'null' => true], // Konsisten dengan controller
            'cost' => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'description' => ['type' => 'TEXT', 'null' => true],
            'date_logged' => ['type' => 'DATE'], // Konsisten dengan controller
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('vehicle_logs');
    }

    public function down()
    {
        $this->forge->dropTable('vehicle_logs'); // WAJIB ADA agar refresh tidak error
    }
}
