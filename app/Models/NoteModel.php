<?php 
namespace App\Models;
use CodeIgniter\Model;
class NoteModel extends Model{
    protected  $table = "note";
    protected $primarykey = "note_id";
    protected $useAutoIncrement = true;
    protected $returnType = "array";

    protected $allowedFields = [
        "note_text",
        "isArchived",
        "id_user",
        "created_at",
        "note_title"
    ];
    public function search($keyword){
        $result = $this -> table("note");
        $result = $result -> like("note_title",$keyword);
        return $result;
    }
}