<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateApprovalsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'booking_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'approver_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'level' => ['type' => 'INT', 'constraint' => 1], 
            'status' => ['type' => 'ENUM', 'constraint' => ['Approved', 'Rejected']],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('approvals');
    }

    public function down()
    {
        $this->forge->dropTable('approvals');
    }
}
