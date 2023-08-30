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

        // get password from database to compare the password get form the user
        $password_form_database = $userModel->select('password')->find($id);

        // cheched is not equal hashed the password else mean it don't edit of password
        if ($password_form_database['password'] != $data['password']) {
            $data['password'] = password_hash("$data[password]", PASSWORD_DEFAULT);
        }

        // this is email has in the input has send
        $email = $data['email'];

        // checked the email
        $checked_email = $userModel->where('email', $email)->where('id !=', $id)->first();

        if ($checked_email) {
            $data = ['status' => 'Use An Other Email'];
            return $this->response->setJSON($data);
        } else {
            $userModel->update($id, $data);
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
                'valid_email' => 'Please, Enter the valid Email',
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
            'password' =>  password_hash("{$this->request->getPost('password')}", PASSWORD_DEFAULT),
            'postion' => $this->request->getPost('postion'),
            'rank' => $this->request->getPost('rank'),
        ];

        // check if this email has repeated or not
        if ($userModel->where('email', $this->request->getPost('email'))->first()) {
            return $this->response->setJSON(['status' => 'Email Already Exist']);
        } else {
            // insert the data
            if ($userModel->insert($data)) {
                $data = ['status' => 'User inserted successfully'];
                return $this->response->setJSON($data);
            }
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
