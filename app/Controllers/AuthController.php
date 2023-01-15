<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Config\Web;

class AuthController extends BaseController
{ 

  protected $config;
  protected $session;
  protected $auth;
  protected $userModel;

    public function __construct() {
      $this->config = config(Web::class);
      $this->session = service("session");
      $this->auth = service("authentication");
      $this-> userModel = model(UserModel::class);
    }

    public function login (){
      if($this-> auth -> isLoggedIn()){
        return redirect()->to("/");
      }
      return view($this->config->views['login']);
    }
    public function attempLogin(){
      $credentials = $this -> request -> getPost(["email","password"]);

      $user = $this->auth->attempLogin($credentials);
      if(!$user){
        session()->setFlashdata("error" , $this->auth->getError());
        return redirect()->back()->withInput();
      }

      return redirect()->to("/");
      
    }

    public function register(){
      return view($this->config->views["register"]);
    }

    public function attempRegister(){

      $rules = [
        "username" => "required|is_unique[user.username]",
        "password" => "required|min_length[8]",
        "email" => "required|valid_email|is_unique[user.email]",
        "pass_confirm" => "required|matches[password]"
      ];

      if(!$this->validate($rules)){
        return redirect()->back()->withInput()->with("errors",$this->validator->getErrors());
      }
      $data = $this->request->getPost(["username","email","password"]);
      $data["password"] = password_hash($data["password"],PASSWORD_DEFAULT);
      $this->userModel->insert($data);

      return redirect()->to("/login");
    }
    public function attempLogout(){
      $this -> auth ->logout();
      return redirect()->to("/login");

    }
}
