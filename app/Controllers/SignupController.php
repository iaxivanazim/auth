<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;;

class SignupController extends BaseController
{
    public function index()
    {
        helper(['form']);
        $data=[];
        return view('login',$data);
    }

    public function store(){
        helper(['form']);
        $rules=[
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required|valid_email|is_unique[users.email]',
            'password'=>'required',
            'repeat'=>'matches[password]'
        ];

        if($this->validate($rules)){
            $userModel=new UserModel();
        $data=[
            'fname'=>$this->request->getVar('fname'),
            'lname'=>$this->request->getVar('lname'),
            'email'=>$this->request->getVar('email'),
            'contact'=>$this->request->getVar('contact'),
            'password'=>password_hash($this->request->getVar('password'),PASSWORD_DEFAULT)
        ];
        
        $userModel->save($data);
        return redirect()->to('/login');
        }else{
            $data['validation']=$this->validator;
            echo view('login',$data);
        }
        
    }
}
