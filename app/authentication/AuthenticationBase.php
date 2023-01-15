<?php 
  
  namespace Authentication;



  class AuthenticationBase {
    protected $user ;
    protected $userModel ;
    protected $error ;

    /**
     * Class constructor.
     */

    public function attempLogin($credentials){
      $user = $this -> userModel ->  where("email",$credentials["email"]) -> first();
      if(!$user){
        $this -> error = "User tidak ditemukan";
        $this -> user = null;
        return false;
      }

      if(!password_verify($credentials["password"],$user["password"])){
        $this->error = "Password salah";
        return false;
      }

      $this -> login($user);
      return true;
    }


    public function login ($user){
      $this->user = $user;
      session()->set("user",$this -> user);
    }

    public function isLoggedIn(){
      if($user_id = session("user") ? session("user")["user_id"] : null){
        $user = $this->userModel->find((int)$user_id);
        return isset($user);
      }
    }

    public function logout(){
      if(isset($_SESSION)){
        foreach (array_keys($_SESSION) as $key) {
          session()-> set($key , null);
          unset($_SESSION[$key]);
        }
      }
    }

    public function setUserModel ($userModel){
      $this -> userModel = $userModel;  
      
    }


    public function getError(){
      return $this-> error;
    }





  }




?>