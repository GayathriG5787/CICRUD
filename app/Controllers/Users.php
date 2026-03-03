<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();

        return view('users/index', $data);
    }

    public function create()
    {
        return view('users/create');
    }

    public function store()
    {
        $model = new UserModel();

        // Handle file upload
        $file = $this->request->getFile('photo');
        $photoName = null;

        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $photoName = $file->getRandomName();
            $file->move('uploads/', $photoName);
        }

        $model->save([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'phone'    => $this->request->getPost('phone'),
            'address'  => $this->request->getPost('address'),
            'dob'      => $this->request->getPost('dob'),
            'status'   => $this->request->getPost('status'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'photo'    => $photoName,
        ]);

        return redirect()->to('users');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);

        return view('users/edit', $data);
    }

    public function update($id)
    {
        $model = new UserModel();

        // Get existing user
        $user = $model->find($id);

        if (!$user) {
            return redirect()->to('/users');
        }

        // Prepare data array
        $data = [
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'phone'   => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'dob'     => $this->request->getPost('dob'),
            'status'  => $this->request->getPost('status'),
        ];

        // 🔐 Update password only if provided
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        // 📸 Handle photo update
        $file = $this->request->getFile('photo');

        if ($file && $file->isValid() && !$file->hasMoved()) {

            // Delete old photo if exists
            if (!empty($user['photo']) && file_exists('uploads/' . $user['photo'])) {
                unlink('uploads/' . $user['photo']);
            }

            // Save new photo
            $newName = $file->getRandomName();
            $file->move('uploads/', $newName);

            $data['photo'] = $newName;
        }

        // Update record
        $model->update($id, $data);

        return redirect()->to('/users');
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);

        return redirect()->to('users');
    }
}