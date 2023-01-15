<?php

namespace App\Database\Seeds;


use App\Models\UserModel;
use CodeIgniter\Database\Seeder;





class UserSeeder extends Seeder
{
    public function run()
    {

      $userModel = model(UserModel::class);
        $data = [
          "username" => "test",
          "email" => "test@gmail.com",
          "password" => "12345678"
        ];

        $userModel->insert($data, false);
        
    }
}
