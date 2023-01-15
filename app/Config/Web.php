<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Web extends BaseConfig
{
  public $views = [
    "dashboard" => "pages/dashboard",
    "login" => "pages/login",
    "register" => "pages/register",
    "archive" => "pages/archive",
    "profile" => "pages/profile",
  ];

}
