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
    public function table()
    {

        $userModel = new UserModel;
        $data = $userModel->findAll();

        return view('pages/table', ['users' => $data]);
    }
    public function edit($id)
    {
        // $user['id'] = $id;
        $userModel = new UserModel;
        $data = $userModel->where('id', $id)->first();
        return view('pages/edit', ['data' => $data]);
    }

    public function update($id)
    {
        $request = service('request');
        if ($request->getMethod() == 'post') {
            $rules = [
                'first-name' => 'required',
                'last-name' => 'required',
                'email' => 'required|valid_email',
                'postion' => 'required',
                'rank' => 'required'
            ];
            $msg = [
                'first-name' => [
                    'required' => 'Enter Your First Name Please',

                ],
                'last-name' => [
                    'required' => 'Enter Your Last Name Please',
                ],
                'email' => [
                    'required' => 'Enter Your Email Please',
                    'valid_email' => 'The Email Must Be Validation',
                ],
                'postion' => [
                    'required' => 'Enter Your Postion Please',
                ],
                'rank' => [
                    'required' => 'Enter Your Rank Please',
                ]
            ];
            if (!$this->validate($rules, $msg)) {
                return view(
                    'add-user',
                    ['validation' => $this->validator]
                );
            } else {
                $data = $this->request->getVar();
                $userModel = new UserModel;
                if ($userModel->where('id', $id)->set($data)->update()) {;
                    return redirect()->to(base_url('table'));
                } else {
                    echo "Insertion failed!";
                }
            }
        }
    }

    public function addUser()
    {
        return view("add-user");
    }

    public function insert()
    {
        $request = service('request');

        if ($request->getMethod() === 'post') {
            $rules = [
                'first-name' => 'required',
                'last-name' => 'required',
                'email' => 'required|valid_email',
                'password' => 'required',
                'postion' => 'required|in_list[manager,developer,designer,hr,accounting,employee]',
                'rank' => 'required'
            ];
            $msg = [
                'first-name' => [
                    'required' => 'Enter Your First Name Please',

                ],
                'last-name' => [
                    'required' => 'Enter Your Last Name Please',
                ],
                'email' => [
                    'required' => 'Enter Your Email Please',
                    'valid_email' => 'The Email Must Be Validation',
                ],
                'password' => [
                    'required' => 'Enter Your Password Please'
                ],
                'postion' => [
                    'required' => 'Enter Your Postion Please',
                    'in_list' => 'Invalid position selected'
                ],
                'rank' => [
                    'required' => 'Enter Your Rank Please',
                ]

            ];
            if (!$this->validate($rules, $msg)) {
                return view(
                    'add-user',
                    ['validation' => $this->validator]
                );
            } else {
                $data = $this->request->getVar();
                $usermodel = new UserModel;
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($usermodel->insert($data)) {
                    return redirect()->to(base_url('table'));
                } else {
                    echo "Invalid email or password";
                }
            }
        }
        return redirect()->to(base_url('table'));
    }

    public function delete($id)
    {
        $userModel = new UserModel;
        $userModel->where('id', $id)->delete();
        return redirect()->to(base_url('table'));
    }
}
