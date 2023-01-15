<?php

namespace App\Database\Seeds;


use App\Models\NoteModel;
use CodeIgniter\Database\Seeder;

class NoteSeeder extends Seeder
{
    public function run()
    {
      $noteModel = model(NoteModel::class);
       for ($i=0; $i < 10 ; $i++) { 
          $noteModel -> insert([
            "note_title" => "title $i",
            "note_text" => "body $i"
          ]);
       }
    }
}
