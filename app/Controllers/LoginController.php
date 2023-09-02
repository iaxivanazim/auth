<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;;

class LoginController extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    }

    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('login_email');
        $password = $this->request->getVar('login_password');

        // Check if the user with the provided email exists
        $data = $userModel->where('email', $email)->first();

        if (!$data) {
            // User with this email does not exist, display an alert
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/login');
        }

        // The user exists, check the password
        $pass = $data['password'];
        $authenticatePassword = password_verify($password, $pass);

        if ($authenticatePassword) {
            // Password is correct, log in the user
            $ses_data = [
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'email' => $data['email'],
                'contact' => $data['contact'],
                'isLoggedIn' => TRUE
            ];
            $session->set($ses_data);
            return redirect()->to('/profile');
        } else {
            // Password is incorrect, display an alert
            $session->setFlashdata('msg', 'Password is incorrect.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $this->response->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $this->response->setHeader('Pragma', 'no-cache');
        $session = session();
        if ($session->get('isLoggedIn')) {
            $session->remove(['fname', 'lname', 'email', 'contact', 'isLoggedIn']); // Remove individual keys
            $session->destroy();
        }

        return redirect()->to('/login');
        echo '<script>window.location.href = "' . base_url() . 'login";</script>';
    }
}
