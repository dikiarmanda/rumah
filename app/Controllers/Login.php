<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        return $this->template->displayLogin('login');
    }

    public function process()
    {
        $email = htmlspecialchars($this->request->getPost('email'));
        $password = htmlspecialchars($this->request->getPost('password'));
        $user = $this->UserModel->where('email', $email)->first();
        $isActive = $user['status'] == 'aktif';

        if ($user && $isActive && password_verify($password, $user['password'])) {
            $session_data = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role'],
                'isLoggedIn' => TRUE
            ];
            session()->set($session_data);
            if ($password == '12345678') {
                session()->setFlashdata([
                    'title' => 'Password Default',
                    'icon' => 'warning',
                    'text' => 'Password Anda masih default. Silahkan ganti password lebih aman.',
                ]);
            }
            return redirect()->to(base_url('dashboard'));
        } else {
            session()->setFlashdata([
                'title' => 'Login Gagal',
                'icon' => 'error',
                'text' => 'Email atau Password salah',
            ]);
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
