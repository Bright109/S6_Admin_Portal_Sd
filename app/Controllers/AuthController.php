<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session = session();
                $session->set([
                    "user_id" => 'id',
                    "username" => "Yanto",
                ]);

                return redirect()->to('/dashboard');
            } else {
                return redirect()->to(base_url('/'))->with('error', 'Password Salah');
            }
        } else {
            return redirect()->to(base_url('/'))->with('error', 'User Tidak Ketemu');
        }
        // return $this->response->setJSON($user);
    }

    public function logout()
    {

        session()->destroy();

        return view('auth/login');
    }
}
