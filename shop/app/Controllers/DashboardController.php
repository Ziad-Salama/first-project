<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function dashboard()
    {
        return view('dashboard');
    }
}
