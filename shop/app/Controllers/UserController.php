<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    // user all
    public function userGet()
    {
        return view('users');
    }

    // user fetch
    public function userFetch()
    {
        $model = new UserModel();
        $data = $model->findAll();
        return $this->response->setJSON($data);
    }

    // this method for get data one of user
    public function userView()
    {
        $userModel = new UserModel;
        $id = $this->request->getPost('user-id');
        $data = $userModel->find($id);
        return $this->response->setJSON($data);
    }

    // user edit
    public function userEdit()
    {

        $userModel = new UserModel;
        $id = $this->request->getPost('user-id');
        $data = $userModel->find($id);
        return $this->response->setJSON($data);
    }

    // user update
    public function userUpdate()
    {
        $userModel = new UserModel;
        $id = $this->request->getPost('id');
        $data = [
            'first-name' => $this->request->getPost('first-name'),
            'last-name' => $this->request->getPost('last-name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'postion' => $this->request->getPost('postion'),
            'rank' => $this->request->getPost('rank'),
        ];

        if ($userModel->update($id, $data)) {
            $data = ['status' => 'User updated successfully'];
            return $this->response->setJSON($data);
        }
    }

    // user add
    public function userInsert()
    {
        $userModel = new UserModel;

        // Define validation rules
        $rules = [
            'first-name' => 'required',
            'last-name' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required',
            'postion' => 'required|in_list[manager,developer,designer,hr,accounting,employee]',
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
        ];

        $validation = \Config\Services::validation();

        // Run validation
        if (!$this->validate($rules, $msg)) {
            $errors = $validation->getErrors();
            return $this->response->setJSON(['status' => $errors]);
        }
        $data = [
            'first-name' => $this->request->getPost('first-name'),
            'last-name' => $this->request->getPost('last-name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'postion' => $this->request->getPost('postion'),
            'rank' => $this->request->getPost('rank'),
        ];

        if ($userModel->insert($data)) {
            $data = ['status' => 'User inserted successfully', 'data' => $data];
            return $this->response->setJSON($data);
        }
    }

    // user delete
    public function userDelete()
    {
        $userModel = new UserModel;
        $id = $this->request->getPost('id');
        if ($userModel->delete($id)) {
            $data = ['status' => 'User deleted successfully'];
            return $this->response->setJSON($data);
        }
    }
}
