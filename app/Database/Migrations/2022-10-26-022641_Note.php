<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Note extends Migration
{
    public function up()
    {
        $forge = $this -> forge;
        $forge -> addField([
            "note_id" => [
                "type" => "INT",
                "constraint" => 5 ,
                "auto_increment" => true ,
                "unsingned" => true
            ],
            "note_title" => [
                "type" => "varchar" ,
                "constraint" => 100
            ],
            "note_text" => [
                "type" => "varchar" ,
                "constraint" => 255,
            ],

            "id_user" => [
                "type" => "int",
                "constraint" => 5
                ,"unsigned" => true
            ],
            "isArchived" => [
                "type"=> "boolean"
            ],
            "created_at" => [
                "type" => "DATETIME",
                "default" => new RawSql("current_timestamp"),
                
            ]
        ]);

        $forge -> addPrimaryKey("note_id");
        $forge -> addForeignKey("id_user",'users','id');
        $forge -> createTable('Note');
    }

    public function down()
    {
        //
    }
}
