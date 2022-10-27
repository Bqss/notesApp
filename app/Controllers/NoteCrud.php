<?php 

    namespace App\Controllers;
    use App\Models\NoteModel;

    class NoteCrud extends BaseController{

        public function index(){
            $noteModel = new NoteModel();
            $searchKey = $this-> request-> getGet("search");
            $result = isset($searchKey) ? $noteModel->search($searchKey): $noteModel;
            $data = [
                "notes" => $noteModel-> where("isArchived",false) -> findAll(),
                "keyword" => $searchKey
            ];
            session()->set("active_page","dashboard");
            return view("/pages/dashboard",$data);
        }
        public function add() {
            $noteModel = new NoteModel();
            $note = [
                "id_user" => (int) user_id(),
                "note_title" => $this ->request -> getPost("title"),
                "note_text" => $this -> request -> getPost("body"),
                "isArchived" => false 
            ];
            $noteModel->insert($note);
            return redirect()->to("/dashboard");
        }
        public function delete($s1) {
            $noteModel = new NoteModel();
            $noteModel -> where("note_id",$s1) ->delete();
            return \redirect()->to("/dashboard");
        }
        public function detail($s1){
            $noteModel = new NoteModel();
            $note = $noteModel-> where("note_id",$s1) -> first();
            return view("pages/detail",$note);
        }
        public function archive(){
            $noteModel = new NoteModel();
            $searchKey = $this-> request-> getGet("search");
            $result = isset($searchKey) ? $noteModel->search($searchKey): $noteModel;
            $data = [
                "notes" => $result -> where("isArchived",true) -> findAll(),
                "keyword" => $searchKey
            ];
            session()->set("active_page","archive");
            return view("pages/archive",$data);
        }
        
        public function addToArchive($id) {
            $noteModel = new NoteModel();
            $noteModel-> whereIn("note_id",[$id])->set(["isArchived" => true])->update();
            return \redirect()-> to("/dashboard");
        }
        public function removeFromArchive($id){
            $noteModel = new NoteModel();
            $noteModel -> whereIn("note_id",[$id]) -> set(["isArchived" => false ]) -> update();
            return redirect()-> to("/archive"); 
        }
        
    }
    


?>