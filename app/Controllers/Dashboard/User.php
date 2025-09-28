<?php

namespace App\Controllers\Dashboard;

use App\Models\UserModel;
use App\Models\WilayahModel;
use App\Controllers\BaseController;

class User extends BaseController
{
  protected $userModel;
  protected $wilayahModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
    $this->wilayahModel = new WilayahModel();
  }

  public function index()
  {
    $users = $this->userModel
      ->orderBy('status', 'ASC')
      ->orderBy('name', 'ASC')
      ->findAll();

    $data = [
      'title' => 'Kelola User',
      'subtitle' => 'Data user yang terdaftar di dalam sistem.',
      'data' => $users,
      'provinsi' => $this->wilayahModel->where('level', 'provinsi')->findAll(),
      'kota' => $this->wilayahModel->where('level', 'kabupaten')->findAll(),
    ];
    return $this->template->display('dashboard/user', $data);
  }

  public function store()
  {
    $name = $this->request->getPost('name');
    $email = $this->request->getPost('email');
    $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    $phone = $this->request->getPost('whatsapp');
    $role = $this->request->getPost('role');
    $status = $this->request->getPost('status');
    $province = $this->request->getPost('province');
    $city = $this->request->getPost('city');
    $photo = $this->request->getFile('photo');

    $data = [
      'name' => $name,
      'email' => $email,
      'password' => $password,
      'phone' => $phone,
      'location' => $city . ', ' . $province,
      'role' => $role,
      'status' => $status,
    ];

    $validation = \Config\Services::validation();
    $validation->setRules([
      'name' => 'required|min_length[3]',
      'email' => 'required|valid_email|is_unique[users.email]',
      'password' => 'required|min_length[8]',
      'whatsapp' => 'required|regex_match[/^628\d+$/]|numeric',
      'role' => 'required|in_list[admin,agen]',
      'status' => 'required|in_list[aktif,nonaktif]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
      session()->setFlashdata([
        'title' => 'Validasi gagal',
        'icon' => 'error',
        'text' => implode('<br>', $validation->getErrors())
      ]);
      return redirect()->to(base_url('dashboard/user'));
    }

    try {
      $this->userModel->insert($data);
      $id = $this->userModel->getInsertID();
      if ($photo->isValid()) {
        $slugName = url_title($name, '-', true);
        $uploaded = uploadUserPhoto($photo, $slugName);
        $this->userModel->update($id, ['photo' => $uploaded]);
      }

      session()->setFlashdata([
        'title' => 'Berhasil',
        'icon' => 'success',
        'text' => 'User berhasil ditambahkan'
      ]);
    } catch (\Exception $e) {
      session()->setFlashdata([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Gagal menambahkan user: ' . $e->getMessage()
      ]);
    }
    return redirect()->to(base_url('dashboard/user'));
  }

  public function update($id = null)
  {
    if (!$id) {
      session()->setFlashdata([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'ID user tidak ditemukan'
      ]);
      return redirect()->to(base_url('dashboard/user'));
    }

    $user = $this->userModel->find($id);
    if (!$user) {
      session()->setFlashdata([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'User tidak ditemukan'
      ]);
      return redirect()->to(base_url('dashboard/user'));
    }

    $name = $this->request->getPost('name');
    $email = $this->request->getPost('email');
    $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    $phone = trim($this->request->getPost('whatsapp'));
    $role = $this->request->getPost('role');
    $status = $this->request->getPost('status');
    $province = $this->request->getPost('province');
    $city = $this->request->getPost('city');
    $photo = $this->request->getFile('photo');

    $data = [
      'name' => $name,
      'email' => $email,
      'phone' => $phone,
      'location' => $city . ', ' . $province,
      'role' => $role,
      'status' => $status,
    ];

    // Jika password diisi, update password
    if ($this->request->getPost('password')) {
      $data['password'] = $password;
    }

    $validation = \Config\Services::validation();
    $validation->setRules([
      'name' => 'required|min_length[3]',
      'email' => 'required|valid_email|is_unique[users.email,id,' . $id . ']',
      'password' => 'permit_empty|min_length[8]',
      'whatsapp' => 'required|regex_match[/^628\d+$/]|numeric',
      'role' => 'required|in_list[admin,agen]',
      'status' => 'required|in_list[aktif,nonaktif]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
      session()->setFlashdata([
        'title' => 'Validasi gagal',
        'icon' => 'error',
        'text' => 'Validasi gagal',
        'open_modal' => 'userForm',
      ]);
      return redirect()->to(base_url('dashboard/user'))->withInput()
        ->with('errors', $validation->getErrors());
    }

    try {
      $this->userModel->update($id, $data);
      log_message('info', '{user} mengubah data user {id}', [
        'user' => session('name'),
        'id' => $id
      ]);

      if ($photo->isValid()) {
        $slugName = url_title($name, '-', true);
        $uploaded = uploadUserPhoto($photo, $slugName);
        $this->userModel->update($id, ['photo' => $uploaded]);
      }

      session()->setFlashdata([
        'title' => 'Berhasil',
        'icon' => 'success',
        'text' => 'User berhasil diperbarui'
      ]);
    } catch (\Exception $e) {
      session()->setFlashdata([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Gagal memperbarui user: ' . $e->getMessage()
      ]);
    }
    return redirect()->to(base_url('dashboard/user'));
  }

  public function disabled($id)
  {
    if (!$id) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'ID user tidak ditemukan'
      ]);
    }

    $user = $this->userModel->find($id);
    if (!$user || $user['role'] == 'owner') {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'User tidak ditemukan'
      ]);
    }

    if ($id == session('id')) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Tidak bisa menonaktifkan diri sendiri.'
      ]);
    }

    $data = [
      'status' => 'nonaktif',
    ];

    try {
      $this->userModel->update($id, $data);
      return $this->response->setJSON([
        'title' => 'Berhasil',
        'icon' => 'success',
        'text' => 'User berhasil dinonaktifkan.'
      ]);
    } catch (\Exception $e) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Gagal menonaktifkan user: ' . $e->getMessage()
      ]);
    }
  }

  public function reset_password($id)
  {
    if (!$id) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'ID user tidak ditemukan'
      ]);
    }

    $user = $this->userModel->find($id);
    if (!$user) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'User tidak ditemukan'
      ]);
    }

    try {
      $password = password_hash('12345678', PASSWORD_DEFAULT);
      $this->userModel->update($id, ['password' => $password]);
      return $this->response->setJSON([
        'title' => 'Berhasil',
        'icon' => 'success',
        'text' => 'Password berhasil direset ke: "12345678"'
      ]);
    } catch (\Exception $e) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Gagal mereset password: ' . $e->getMessage()
      ]);
    }
  }

  public function delete($id)
  {
    if (!$id) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'ID user tidak ditemukan'
      ]);
    }

    $user = $this->userModel->find($id);
    if (!$user) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'User tidak ditemukan'
      ]);
    }

    try {
      $this->userModel->delete($id);
      return $this->response->setJSON([
        'title' => 'Berhasil',
        'icon' => 'success',
        'text' => 'User berhasil dihapus'
      ]);
    } catch (\Exception $e) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Gagal menghapus user: ' . $e->getMessage()
      ]);
    }
  }
}
