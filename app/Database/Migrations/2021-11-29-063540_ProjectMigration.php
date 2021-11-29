<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProjectMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"            => ["type" => "int", "constraint" => 11, "auto_increment" => true],
            "name"          => ["type" => "varchar", "constraint" => 100],
            "description"   => ["type" => "varchar", "constraint" => 255, "null" => true],
            "dateline"      => ["type" => "date", "null" => true],
            "created_at"    => ["type" => "timestamp"],
            "updated_at"    => ["type" => "timestamp"],
        ]);
        $this->forge->addKey("id", true);
        $this->forge->createTable("projects");
    }

    public function down()
    {
        $this->forge->dropTable("projects", true);
    }
}
