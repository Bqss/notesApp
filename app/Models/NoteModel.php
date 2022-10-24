<?php 
namespace App\Models;
use CodeIgniter\Model;
class NoteModel extends Model{
    protected  $table = "note";
    protected $primarykey = "note_id";
    protected $useAutoIncrement = true;
    protected $returnType = "array";

    protected $allowedFields = [
        "text",
        "isArchived",
        "user_id",
        "created_at",
        "title"
    ];
    public function search($keyword){
        $result = $this -> table("note");
        $result = $result -> like("title",$keyword);
        return $result;
    }
}