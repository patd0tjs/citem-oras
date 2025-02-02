<?php

namespace App\Controllers;
use App\Models\InternModel;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function internLoginPage()
    {
        session()->destroy();
        return view('login');
    }

    public function internLogin()
    {
        $intern = new InternModel();
            
        $username = $this->request->getPost('username');    
        $pw = $this->request->getPost('pw');

        $current_intern = $intern->where('username', $username)
                             ->where('is_active', 1)
                             ->first();

        if ($current_intern) {
            if (password_verify($pw, $current_intern['pw'])) {
                
                $session = session();
                $sessionData = [
                    'intern_id'   => $current_intern['id'],
                    'intern_name' => $current_intern['name']
                ];
                $session->set($sessionData);

                return redirect()->to('/');
            } else {
                return redirect()->back()->with('error', 'Invalid password.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid user.');
        }
    }

    public function internLogout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function loginPage()
    {
        session()->destroy();
        return view('admin/login');
    }

    public function login()
    {
        $user = new UserModel();
            
        $email = $this->request->getPost('email');    
        $pw = $this->request->getPost('pw');

        $current_user = $user->where('email', $email)
                             ->where('is_active', 1)
                             ->first();

        if ($current_user) {
            if (password_verify($pw, $current_user['pw'])) {
                
                $session = session();
                $sessionData = [
                    'user_id'   => $current_user['id']
                ];
                $session->set($sessionData);

                return redirect()->to('admin');

            } else {
                return redirect()->back()->with('error', 'Invalid password.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid user.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('admin');
    }

}
