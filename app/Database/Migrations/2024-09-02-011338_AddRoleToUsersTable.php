<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRoleToUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'role' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'after'      => 'password',  // Adjust the position as needed
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'role');
    }
}
