<?php
namespace App\Controllers;
use App\Models\UserModel;

class LoginController extends BaseController {
    public function index() {
        return view("pages/login");
    }
    public function login(){
        $session = session();
        $userModel = new UserModel();
        $email = $this -> request -> getPost("email");
        $password = $this -> request -> getPost("password");
        $user =  $userModel -> where("email",$email)->first() ?? null;
        if($user){
            $userPass = $user["password"];
            if(password_verify($password , $userPass)){
                $sessionData = [
                    "id" => $user["user_id"],
                    "username" => $user["username"],
                    "email" => $user["email"],
                    "isLoggedIn" => true
                ];
                $session -> set($sessionData); 
                return redirect()->to('/dashboard');
            }
            else{
                $session -> setFlashdata("msg" , "Password is incorrect !!");
                return redirect() -> to("/login");
            }
        }else{
            $session->setFlashdata('msg',"Email doesn't exist.");
            return redirect() -> to("/login");
        }
    }

    public function logout(){
        \session() -> set("isLoggedIn",false);
        return redirect()->to("/login");
    }

    
}   