<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\InternModel;

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

    public function internsPage()
    {
        $users = new InternModel();

        $data = [
            'page'  => 'Intern Users',
            'users' => $users->findAll()
        ];
        
        return view('admin/interns', $data);
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

    public function createIntern()
    {
        $intern = new InternModel();

        // image upload
        $file = $this->request->getFile('img');
        $img = $intern->uploadIMG($file);
        if(!$img){
            return redirect()->back()->with('error', 'There was an error uploading the image');
        }

        $data = [
            'username'   => $this->request->getPost('username'),
            'email'      => $this->request->getPost('email'),
            'img'        => $img,
            'pw'         => password_hash($this->request->getPost('pw'), PASSWORD_DEFAULT),
            'name'       => $this->request->getPost('name'),
            'school'     => $this->request->getPost('school'),
            'course'     => $this->request->getPost('course'),
            'contact'    => $this->request->getPost('contact'),
            'req_hrs'    => $this->request->getPost('req_hrs'),
            'department' => $this->request->getPost('department'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date'   => $this->request->getPost('end_date')
        ];
        
        $intern->insert($data);
        return redirect()->to('admin/interns');
    }
}