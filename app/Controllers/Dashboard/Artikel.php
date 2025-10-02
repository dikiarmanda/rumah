<?php

namespace App\Controllers\Dashboard;

use App\Models\UserModel;
use App\Models\ArticleModel;
use App\Controllers\BaseController;

class Artikel extends BaseController
{
    protected $userModel;
    protected $articleModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->articleModel = new ArticleModel();
    }

    public function index()
    {
        $articles = $this->articleModel->getData();
        $categories = $this->articleModel->getAllCategories();
        $draft = $this->articleModel->where('status', 'draft')->countAllResults();

        $data = [
            'title' => 'Daftar Artikel',
            'subtitle' => 'Kelola semua daftar artikel Anda di Sini.',
            'data' => $articles,
            'categories' => $categories,
            'draft' => $draft,
        ];
        return $this->template->display('dashboard/artikel', $data);
    }

    public function get_ajax()
    {
        // Ambil filter dari request
        $filters = [
            'status' => $this->request->getPost('status'),
            'category' => $this->request->getPost('category'),
        ];

        // Ambil data artikel
        $res = $this->articleModel->getData($filters);

        return $this->response->setJSON($res);
    }

    public function create()
    {
        return $this->detail(null);
    }

    public function detail($id = null)
    {
        $data = [
            'title' => 'Detail Artikel',
            'subtitle' => 'Kelola artikel Anda di Sini.',
            'data' => $id != null ? $this->articleModel->getArticleById($id) : [],
            'categories' => $this->articleModel->getAllCategories(),
            'action' => base_url('dashboard/artikel/' . ($id != null ? 'update/' . $id : 'store')),
        ];
        return $this->template->display('dashboard/artikel/detail', $data);
    }

    public function store()
    {
        $title = $this->request->getPost('title');
        $category = $this->request->getPost('category');
        $content = $this->request->getPost('content');
        $status = $this->request->getPost('status');
        $featured = $this->request->getPost('featured');
        $thumbnail = $this->request->getFile('thumbnail');
        $slug = url_title($title, '-', true);
        $excerpt = trim(substr($content, 0, 50)) . (strlen($content) > 50 ? '...' : '');

        $data = [
            'user_id' => session('id'),
            'title' => $title,
            'category' => $category,
            'content' => $content,
            'slug' => $slug,
            'excerpt' => $excerpt,
            'status' => $status,
            'featured' => $featured,
        ];
        
        try {
            $this->articleModel->insert($data);
            $id = $this->articleModel->insertID();
            session()->setFlashdata([
                'title' => 'Berhasil',
                'icon' => 'success',
                'text' => 'Artikel berhasil ditambahkan',
            ]);
            $uploaded = uploadArticleImages($thumbnail, $id);
            $this->articleModel->update($id, ['thumbnail' => $uploaded]);

            return redirect()->to(base_url('dashboard/artikel'));
        } catch (\Throwable $th) {
            session()->setFlashdata([
                'title' => 'Gagal',
                'icon' => 'error',
                'text' => 'Gagal menambahkan artikel.<br>' . $th->getMessage(),
            ]);
            return redirect()->back()->withInput();
        }
    }

    public function update($id)
    {
        $title = $this->request->getPost('title');
        $category = $this->request->getPost('category');
        $content = $this->request->getPost('content');
        $status = $this->request->getPost('status');
        $featured = $this->request->getPost('featured');
        $thumbnail = $this->request->getFile('thumbnail');
        $slug = url_title($title, '-', true);
        $excerpt = substr($content, 0, 50) . (strlen($content) > 50 ? '...' : '');

        $data = [
            'title' => $title,
            'category' => $category,
            'content' => $content,
            'slug' => $slug,
            'excerpt' => $excerpt,
            'status' => $status,
            'featured' => $featured,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        try {
            $this->articleModel->update($id, $data);
            session()->setFlashdata([
                'title' => 'Berhasil',
                'icon' => 'success',
                'text' => 'Artikel berhasil diperbarui',
            ]);

            $uploaded = uploadArticleImages($thumbnail, $id);
            $this->articleModel->update($id, ['thumbnail' => $uploaded]);

            return redirect()->to(base_url('dashboard/artikel'));
        } catch (\Throwable $th) {
            session()->setFlashdata([
                'title' => 'Gagal',
                'icon' => 'error',
                'text' => 'Gagal menambahkan artikel',
            ]);
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $article = $this->articleModel->find($id);
        if ($article) {
            if ($this->articleModel->delete($id)) {
                $res = [
                    'title' => 'Berhasil',
                    'icon' => 'success',
                    'text' => 'Artikel berhasil dihapus',
                ];
            }
            $res = [
                'title' => 'Gagal',
                'icon' => 'error',
                'text' => 'Gagal menghapus artikel',
            ];
        }
        $res = [
            'title' => 'Gagal',
            'icon' => 'error',
            'text' => 'Artikel tidak ditemukan',
        ];
        return $this->response->setJSON($res);
    }
}
