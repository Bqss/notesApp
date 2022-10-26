<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class User extends Migration
{
    public function up(){
    

        $this -> forge -> addField( [
            "user_id" => [
                "type" => "INT",
                "auto_increment" => true ,
                "constraint" => 5 ,
                "unsigned" => true
            ],
            "email"=> [
                "type" => "varchar",
                "constraint" => 100
            ],
            "password" => [
                "type" => "varchar",
                "constraint" => 200,
            ],
            "username" => [
                "type" => "varchar",
                "constraint"=> 50
            ],

            "created_at" => [
                "type" => "DATETIME",
                "default" => new RawSql("current_timestamp")
            ]
        ]);
        $this -> forge -> addPrimaryKey("user_id");

        $this -> forge -> createTable("user");
    }
    

    public function down()
    {
        //
    }
}
