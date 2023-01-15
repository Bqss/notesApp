<?php 

    namespace App\Controllers;
    use App\Models\NoteModel;

    class NoteCrud extends BaseController{

      protected $noteModel;
      protected $auth;
     
        public function __construct(){
          $this->noteModel = model(NoteModel::class);
          $this-> auth = service("authentication");
        }

        public function index(){

          if(!$this-> auth-> isLoggedIn()){
            return redirect()->to("login");
          }
            
            $searchKey = $this-> request-> getGet("search");
            $result = isset($searchKey) ? $this->noteModel->search($searchKey): $this->noteModel;
            $data = [
                "notes" => $this->noteModel-> where("isArchived",false) -> where("id_user", session("user")["user_id"]) -> findAll(),
                "keyword" => $searchKey
            ];
            return view("/pages/dashboard",$data);
        }
        public function add() {
            
            $note = [
                "id_user" => (int) session("user")["user_id"],
                "note_title" => $this ->request -> getPost("title"),
                "note_text" => $this -> request -> getPost("body"),
                "isArchived" => false 
            ];
            $this->noteModel->insert($note);
            return redirect()->to("/");
        }
        public function delete($s1) {
            
            $this->noteModel -> where("note_id",$s1) ->delete();
            return \redirect()->to("/");
        }
        public function detail($s1){
            
            $note = $this->noteModel-> where("note_id",$s1) -> first();
            return view("pages/detail",$note);
        }
        public function archive(){
            if(!$this-> auth-> isLoggedIn()){
              return redirect()->to("login");
            }
            $searchKey = $this-> request-> getGet("search");
            $result = isset($searchKey) ? $this->noteModel->search($searchKey): $this->noteModel;
            $data = [
                "notes" => $result -> where("isArchived",true) -> findAll(),
                "keyword" => $searchKey
            ];

            return view("pages/archive",$data);
        }

        public function update ($id){
            
            $note = $this->noteModel-> where("note_id",$id) -> first();
            return view("pages/update",$note);
        }

        public function profile(){
          return view("pages/profile");
        }

        public function attempUpdate($id){  
          $this->noteModel->where("note_id",$id)->set([
            "note_title" => $this->request->getPost("title"),
            "note_text" => $this->request->getPost("body") 
          ]) -> update();
          return redirect()->to("/"); 
        }

        public function deleteFromArchive($id){
          $this->noteModel -> where("note_id",$id) ->delete();
          return \redirect()->to("/archive");
        }
        
        public function addToArchive($id) {
            
            $this->noteModel-> where("note_id",$id)->set(["isArchived" => true])->update();
            return redirect()-> to("/");
        }
        public function removeFromArchive($id){
            
            $this->noteModel -> where("note_id",$id) -> set(["isArchived" => false ]) -> update();
            return redirect()-> to("/archive"); 
        }
        
    }
    


?>