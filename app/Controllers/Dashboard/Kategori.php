<?php

namespace App\Controllers\Dashboard;

use App\Models\CategoryModel;
use App\Controllers\BaseController;

class Kategori extends BaseController
{
  protected $categoryModel;

  public function __construct()
  {
    $this->categoryModel = new CategoryModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Kelola Kategori',
      'subtitle' => 'Data kategori yang terdaftar di dalam sistem.',
      'data' => $this->categoryModel->orderBy('name', 'ASC')->findAll(),
    ];
    return $this->template->display('dashboard/kategori', $data);
  }

  public function store()
  {
    $name = $this->request->getPost('name');
    $description = $this->request->getPost('description');
    $status = $this->request->getPost('status');

    $data = [
      'name' => $name,
      'slug' => url_title($name, '-', true),
      'description' => $description,
      'status' => $status,
    ];

    $validation = \Config\Services::validation();
    $validation->setRules([
      'name' => 'required|min_length[3]',
      'status' => 'required|in_list[aktif,nonaktif]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'Validasi gagal',
        'text' => implode(', ', $validation->getErrors())
      ]);
    }

    try {
      $this->categoryModel->insert($data);
      return $this->response->setJSON([
        'title' => 'Berhasil',
        'icon' => 'success',
        'text' => 'Kategori berhasil ditambahkan'
      ]);
    } catch (\Exception $e) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Gagal menambahkan kategori: ' . $e->getMessage()
      ]);
    }
  }

  public function update($id = null)
  {
    if (!$id) {
      session()->setFlashdata([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'ID category tidak ditemukan'
      ]);
      return redirect()->to(base_url('dashboard/kategori'));
    }

    $category = $this->categoryModel->find($id);
    if (!$category) {
      session()->setFlashdata([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Category tidak ditemukan'
      ]);
      return redirect()->to(base_url('dashboard/kategori'));
    }

    $name = $this->request->getPost('name');
    $description = $this->request->getPost('description');
    $status = $this->request->getPost('status');

    $data = [
      'name' => $name,
      'slug' => url_title($name, '-', true),
      'description' => $description,
      'status' => $status,
    ];

    $validation = \Config\Services::validation();
    $validation->setRules([
      'name' => 'required|min_length[3]',
      'status' => 'required|in_list[aktif,nonaktif]'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
      session()->setFlashdata([
        'title' => 'Gagal',
        'icon' => 'Validasi gagal',
        'text' => implode(', ', $validation->getErrors())
      ]);
      return redirect()->back()->withInput();
    }

    try {
      $this->categoryModel->update($id, $data);
      log_message('info', '{category} mengubah data kategori {id}', [
        'category' => session('name'),
        'id' => $id
      ]);

      session()->setFlashdata([
        'title' => 'Berhasil',
        'icon' => 'success',
        'text' => 'Kategori berhasil diperbarui'
      ]);
    } catch (\Exception $e) {
      session()->setFlashdata([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Gagal memperbarui kategori: ' . $e->getMessage()
      ]);
    }
    return redirect()->to(base_url('dashboard/kategori'));
  }

  public function disabled($id)
  {
    if (!$id) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'ID kategori tidak ditemukan'
      ]);
    }

    $category = $this->categoryModel->find($id);
    if (!$category) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Kategori tidak ditemukan'
      ]);
    }

    $data = [
      'status' => 'nonaktif',
    ];

    try {
      $this->categoryModel->update($id, $data);
      return $this->response->setJSON([
        'title' => 'Berhasil',
        'icon' => 'success',
        'text' => 'Category berhasil dinonaktifkan.'
      ]);
    } catch (\Exception $e) {
      return $this->response->setJSON([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Gagal menonaktifkan category: ' . $e->getMessage()
      ]);
    }
  }
}
