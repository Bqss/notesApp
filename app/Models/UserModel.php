<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = "user";
    protected $primaryKey = "user_id";
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = [
        "username",
        "email",
        "password",
        'created_at'
    ];
}
