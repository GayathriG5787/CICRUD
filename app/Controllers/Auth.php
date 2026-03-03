<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function authenticate()
    {
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {

            session()->set([
                'user_id'  => $user['id'],
                'email'    => $user['email'],
                'logged_in'=> true
            ]);

            return redirect()->to('/dashboard');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }
}