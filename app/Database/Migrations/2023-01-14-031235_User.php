<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class User extends Migration
{
    public function up()
    {
        $this -> forge -> addField([
          "user_id" => [
            "type" => "INT  ",
            "constraint" => 5,
            "auto_increment" => true,
            "unsigned" => true,
          ],
          "username" => [
            "type" => "VARCHAR",
            "constraint" => 100,
          ],
          "password" => [
            "type" => "VARCHAR",
            "constraint" => 200,

          ],
          "email" => [
            "type" => "VARCHAR",
            "constraint" => 200,

          ]
        ]);

        $this -> forge -> addPrimaryKey("user_id");
        $this -> forge -> createTable("user");
    }

    public function down()
    {
        $this -> forge -> dropTable("user");
    }
}
