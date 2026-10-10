<?php

namespace App\Controllers;

use App\Models\UserModel;

class userController extends BaseController
{
    public function user()
    {
        $userModel = new UserModel();

        return view('userView', [
            'users' => $userModel->findAll()
        ]);
    }

    public function new()
    {
        return view('userNewView');
    }

    public function create()
    {
        $userModel = new UserModel();

        $rules = [
            'username'  => 'required|max_length[50]',
            'full_name' => 'required|max_length[100]',
            'email'     => 'permit_empty|valid_email|max_length[100]',
            'password'  => 'required|min_length[8]'
        ];

        if (!$this->validate($rules)) {
            return view('userNewView', [
                'validation' => $this->validator
            ]);
        }

        $username = $this->request->getPost('username');

        if ($userModel->where('username', $username)->first()) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Username already exists.');
        }

        $userModel->insert([
            'username'   => $username,
            'full_name'  => $this->request->getPost('full_name'),
            'email'      => $this->request->getPost('email'),
            'password'   => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('index.php/user');
    }

    public function edit($id)
    {
        $userModel = new UserModel();

        return view('userEditView', [
            'user' => $userModel->find($id)
        ]);
    }

    public function update($id)
    {
        $userModel = new UserModel();

        $rules = [
            'username'  => 'required|max_length[50]',
            'full_name' => 'required|max_length[100]',
            'email'     => 'permit_empty|valid_email|max_length[100]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');

        $existingUser = $userModel
            ->where('username', $username)
            ->where('id !=', $id)
            ->first();

        if ($existingUser) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Username already exists.');
        }

        $data = [
            'username'  => $username,
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email')
        ];

        $avatar = $this->request->getFile('avatar');

        if ($avatar && $avatar->isValid() && !$avatar->hasMoved()) {

            if (!$this->validate([
                'avatar' => 'is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]'
            ])) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $this->validator->getErrors());
            }

            $uploadPath = FCPATH . 'uploads/avatars/';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $fileName = $avatar->getRandomName();

            $avatar->move($uploadPath, $fileName);

            service('image')
                ->withFile($uploadPath . $fileName)
                ->fit(200, 200)
                ->save($uploadPath . $fileName);

            $data['avatar'] = $fileName;
        }

               $userModel->update($id, $data);

        return redirect()->to('index.php/user');
    }

    public function setDemoPassword()
    {
        $userModel = new UserModel();

        $userModel->update(1, [
            'password' => password_hash(
                'PASSWORD123',
                PASSWORD_DEFAULT
            )
        ]);

        return 'Demo password set successfully.';
    }
}