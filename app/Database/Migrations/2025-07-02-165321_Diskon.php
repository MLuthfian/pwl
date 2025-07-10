<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Diskon extends Migration
{
    // app/Database/Migrations/2025-07-02_CreateDiskonTable.php
public function up()
{
    $this->forge->addField([
        'id'       => ['type' => 'INT', 'auto_increment' => true],
        'tanggal'  => ['type' => 'DATE', 'unique' => true],
        'nominal'  => ['type' => 'INT'],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('diskon');
}


    public function down()
    {
        //
    }
}
