<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;;

class SignupController extends BaseController
{
    public function index()
    {
        helper(['form']);
        $data = [];
        return view('login', $data);
    }

    public function store()
    {
        $session = session();
        helper(['form']);
        $rules = [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|valid_email', // Use is_unique rule to check email uniqueness
            'password' => 'required',
            'repeat' => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $data = [
                'fname' => $this->request->getVar('fname'),
                'lname' => $this->request->getVar('lname'),
                'email' => $this->request->getVar('email'),
                'contact' => $this->request->getVar('contact'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];

            // Check if email already exists in the database
            if ($userModel->where('email', $data['email'])->countAllResults() == 0) {
                // Email is unique, save the user data
                $userModel->save($data);
                return redirect()->to('/login');
            } else {
                // Email already exists, show validation error
                $session->setFlashdata('msg', 'Email already exist.');
            return redirect()->to('/login');
            }
        } else {
            $data['validation'] = $this->validator;
            echo view('login', $data);
        }
    }
}
