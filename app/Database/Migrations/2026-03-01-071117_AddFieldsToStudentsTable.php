<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsToStudentsTable extends Migration
{
    public function up()
    {
        // Only add 'description' since your table already has the timestamps!
        $fields = [
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ];
        
        $this->forge->addColumn('students', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('students', 'description');
    }
}