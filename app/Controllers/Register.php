<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        return view('register'); // Make sure this view exists in app/Views
    }

    public function save()
    {
        $model = new UserModel();
        $email = $this->request->getPost('email');

        // Check if the email already exists
        $existingUser = $model->where('email', $email)->first();

        if ($existingUser) {
            // Email already exists, set a flash message and redirect back to the register form
            session()->setFlashdata('msg', 'Email already exists.');
            return redirect()->to('/register')->withInput();
        }

        // Save the new user
        $data = [
            'email' => $email,
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role'),
        ];

        $model->save($data);

        // Redirect to the login page after successful registration
        session()->setFlashdata('msg', 'Registration successful. Please login.');
        return redirect()->to('/login');
    }
}
