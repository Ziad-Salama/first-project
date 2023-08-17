<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    // public $db;

    // public function __construct()
    // {
    //     $this->db = \config\Database::connect();
    // }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->request->getVar();
            $rule = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[6]|regex_match[/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/]'
            ];
            $msg = [
                'email' => [
                    'required' => 'Enter Your Email Please',
                    'valid_email' => 'Please enter a valid email address'
                ],
                'password' => [
                    'required' => 'Enter Your Password Please',
                    'min_length' => 'Password must be at least 6 characters long',
                    'regex_match' => 'Password must include at least one uppercase letter, one lowercase letter, one number, and one special character'
                ]

            ];
            if (!$this->validate($rule, $msg)) {
                return view(
                    'login',
                    ['validation' => $this->validator]
                );
            } else {
                $userModel = new UserModel();
                $user = $userModel->where('email', $data['email'])->first();
                if ($user && password_verify($data['password'], $user['password'])) {
                    session()->set('id', $user['id']);
                    return redirect()->to(base_url('dashboard'));
                } else {
                    echo 'Invalid email or password';
                }
            }
        }
        return view('login');
    }
    public function logout()
    {
        session()->remove('id');
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
