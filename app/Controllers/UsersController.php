<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\InternsModel;

class UsersController extends BaseController
{
    public function usersPage()
    {
        $users = new UserModel();

        $data = [
            'page'  => 'Admin Users',
            'users' => $users->findAll()
        ];
        
        return view('admin/users', $data);
    }

    public function createUser()
    {
        $users = new UserModel();

        $data = [
            'email' => $this->request->getPost('email'),
            'pw'    => password_hash($this->request->getPost('pw'), PASSWORD_DEFAULT)
        ];

        $users->insert($data);

        return redirect()->to('admin/users');
    }

    public function updateUser()
    {
        $users = new UserModel();

        $data['email'] = $this->request->getPost('email');

        if($this->request->getPost('pw'))
        {
            $data['pw'] = password_hash($this->request->getPost('pw'), PASSWORD_DEFAULT);
        }

        $users->where('id', $this->request->getPost('id'))
              ->set($data)
              ->update();

        return redirect()->to('admin/users');
    }

    public function setStatus()
    {
        $users = new UserModel();

        $users->where('id', $this->request->getGet('id'))
              ->set(['is_active' => $this->request->getGet('status')])
              ->update();

        return redirect()->to('admin/users');
    }

    // public function InternsPage()
    // {
    //     $dtr = new InternsModel();

    //     return view('admin/accumulated', $data);
    // }
}