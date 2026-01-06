<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true], // Admin yang input
            'vehicle_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'driver_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'start_date' => ['type' => 'DATETIME'],
            'end_date' => ['type' => 'DATETIME'],
            'status' => ['type' => 'ENUM', 'constraint' => ['Pending', 'Waiting Level 2', 'Approved', 'Rejected'], 'default' => 'Pending'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bookings');
    }

    public function down()
    {
        //
    }
}
