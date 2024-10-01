<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate()
    {
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $model->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session = session();
                $session->set([
                    'id'    => $user['id'],
                    'email' => $user['email'],
                    'role'  => $user['role'],
                    'logged_in' => true,
                ]);
                return redirect()->to('/dashboard');
            } else {
                session()->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('msg', 'Email not found.');
            return redirect()->to('/login');
        }
    }
}
