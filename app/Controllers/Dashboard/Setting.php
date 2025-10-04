<?php

namespace App\Controllers\Dashboard;

use App\Models\UserModel;
use App\Controllers\BaseController;

class Setting extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $user = $this->userModel->where('id', session()->get('id'))->first();
        $data = [
            'title' => 'Pengaturan Akun',
            'data' => $user,
        ];
        return $this->template->display('dashboard/setting', $data);
    }

    public function update($id)
    {
        if (!$id) {
            session()->setFlashdata([
                'title' => 'Gagal',
                'icon' => 'error',
                'text' => 'ID user tidak ditemukan',
            ]);
            return redirect()->to(base_url('dashboard/setting'));
        }
        $rules = [
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email,id,' . $id . ']',
            'whatsapp' => 'required|regex_match[/^628\d+$/]|numeric',
        ];
        if (!$this->validate($rules)) {
            session()->setFlashdata([
                'title' => 'Validasi Gagal',
                'icon' => 'error',
                'text' => implode(', ', array_values($this->validator->getErrors())),
            ]);
            return redirect()->back()->withInput();
        }

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('whatsapp');
        $photo = $this->request->getFile('photo');

        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
        ];
        $this->userModel->update($id, $data);
        $slugName = url_title($name, '-', true);
        $uploaded = uploadUserPhoto($photo, $slugName);
        $this->userModel->update($id, ['photo' => $uploaded]);

        session()->setFlashdata([
            'title' => 'Berhasil',
            'icon' => 'success',
            'text' => 'Profil berhasil diperbarui.',
        ]);
        return redirect()->to(base_url('dashboard/setting'));
    }

    public function password($id)
    {
        if (!$id) {
            session()->setFlashdata([
                'title' => 'Gagal',
                'icon' => 'error',
                'text' => 'ID user tidak ditemukan',
            ]);
            return redirect()->to(base_url('dashboard/setting'));
        }

        $rules = [
            'password' => 'required|min_length[8]',
            'password_confirm' => 'required|matches[password]',
        ];
        if (!$this->validate($rules)) {
            session()->setFlashdata([
                'title' => 'Validasi Gagal',
                'icon' => 'error',
                'text' => implode(", ", array_values($this->validator->getErrors())),
            ]);
            return redirect()->back()->withInput();
        }

        $user = $this->userModel->find($id);
        if (!password_verify($this->request->getPost('password_old'), $user['password'])) {
            session()->setFlashdata([
                'title' => 'Gagal',
                'icon' => 'error',
                'text' => 'Kata sandi lama tidak sesuai.',
            ]);
            return redirect()->to(base_url('dashboard/setting'));
        }

        $data = [
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];
        $this->userModel->update($id, $data);

        session()->setFlashdata([
            'title' => 'Berhasil',
            'icon' => 'success',
            'text' => 'Kata sandi berhasil diperbarui.',
        ]);
        return redirect()->to(base_url('dashboard/setting'));
    }
}
