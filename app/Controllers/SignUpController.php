<?php 

namespace App\Controllers;
use App\Models\UserModel;
use App\Config\Services;


class SignUpController extends BaseController{
    
    public function index() {
        helper(['form']);
        $data =[
            
        ];
        return view("pages/signup",$data);
    }
    public function store(){
        helper(["form"]);
        $rules = [
            'username' => 'required|min_length[1]|max_length[50]|is_unique[user.username]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[user.email]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirm_password'  => 'required|matches[password]'
        ];

        if($this->validate($rules)){
            $userModel = new UserModel();
            $data = [
                'username' => $this->request->getVar("username"),
                'email'  => $this->request->getVar('email'),
                'password'=> password_hash($this->request->getVar('password'),PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            return redirect()->to("/login");    

        }else{
            return redirect()->to("/signup")->withInput()->with("validation",$this->validator);
        }
    }
}