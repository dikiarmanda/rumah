<?php

namespace App\Controllers\Dashboard;

use App\Models\UserModel;
use App\Models\LeaderboardModel;
use App\Controllers\BaseController;

class Leaderboard extends BaseController
{
  protected $userModel;
  protected $leaderboardModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
    $this->leaderboardModel = new LeaderboardModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Leaderboard',
      'subtitle' => 'Data leaderboard yang terdaftar di dalam sistem.',
      'data' => $this->leaderboardModel->getData(),
      'agents' => $this->userModel
        ->where('status', 'aktif')
        ->where('role', 'agen')
        ->orderBy('name', 'ASC')
        ->findAll(),
    ];
    return $this->template->display('dashboard/leaderboard', $data);
  }

  public function store()
  {
    $validation = \Config\Services::validation();
    $validation->setRules([
      'agent_id' => 'required|numeric',
      'tahun' => 'required|numeric|exact_length[4]',
    ]);

    if (!$validation->withRequest($this->request)->run()) {
      session()->setFlashdata([
        'title' => 'Validasi Gagal',
        'icon' => 'error',
        'text' => implode(', ', $validation->getErrors())
      ])->setStatusCode(400);
      return redirect()->to('dashboard/leaderboard');
    }
    $agent_id = $this->request->getPost('agent_id');
    $tahun = $this->request->getPost('tahun');
    $peringkat = $this->request->getPost('peringkat');

    $data = [
      'agent_id' => $agent_id,
      'tahun' => $tahun,
      'peringkat' => $peringkat,
    ];

    try {
      $this->leaderboardModel->insert($data);
      $id = $this->leaderboardModel->getInsertID();
      $photo = $this->request->getFile('photo');
      if ($photo->isValid()) {
        $nameFile = $tahun . '-' . $peringkat;
        $uploaded = uploadPrestasi($photo, $nameFile);
        $this->leaderboardModel->update($id, ['photo' => $uploaded]);
      }
      session()->setFlashdata([
        'title' => 'Berhasil',
        'icon' => 'success',
        'text' => 'Data leaderboard berhasil ditambahkan.'
      ]);
    } catch (\Exception $e) {
      session()->setFlashdata([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Terjadi kesalahan: ' . $e->getMessage()
      ])->setStatusCode(500);
    }
    return redirect()->to('dashboard/leaderboard');
  }

  public function update($id = null)
  {
    if (!$id || !$this->leaderboardModel->find($id)) {
      session()->setFlashdata([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Data tidak ditemukan.'
      ]);
      return redirect()->to('dashboard/leaderboard');
    }

    $validation = \Config\Services::validation();
    $validation->setRules([
      'agent_id' => 'required|numeric',
      'tahun' => 'required|numeric|exact_length[4]',
    ]);

    if (!$validation->withRequest($this->request)->run()) {
      session()->setFlashdata([
        'title' => 'Validasi Gagal',
        'icon' => 'error',
        'text' => implode(', ', $validation->getErrors())
      ]);
      return redirect()->to('dashboard/leaderboard');
    }

    $agent_id = $this->request->getPost('agent_id');
    $tahun = $this->request->getPost('tahun');
    $peringkat = $this->request->getPost('peringkat');

    $data = [
      'agent_id' => $agent_id,
      'tahun' => $tahun,
      'peringkat' => $peringkat,
    ];

    try {
      $this->leaderboardModel->update($id, $data);
      $photo = $this->request->getFile('photo');
      if ($photo->isValid()) {
        $nameFile = $tahun . '-' . $peringkat;
        $uploaded = uploadPrestasi($photo, $nameFile);
        $this->leaderboardModel->update($id, ['photo' => $uploaded]);
      }
      session()->setFlashdata([
        'title' => 'Berhasil',
        'icon' => 'success',
        'text' => 'Data leaderboard berhasil diperbarui.'
      ]);
    } catch (\Exception $e) {
      session()->setFlashdata([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Terjadi kesalahan: ' . $e->getMessage()
      ]);
    }
    return redirect()->to('dashboard/leaderboard');
  }

  public function delete($id = null)
  {
    if (!$id || !$this->leaderboardModel->find($id)) {
      session()->setFlashdata([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Data tidak ditemukan.'
      ])->setStatusCode(404);
      return redirect()->to('dashboard/leaderboard');
    }

    try {
      $this->leaderboardModel->delete($id);
      session()->setFlashdata([
        'title' => 'Berhasil',
        'icon' => 'success',
        'text' => 'Data leaderboard berhasil dihapus.'
      ]);
    } catch (\Exception $e) {
      session()->setFlashdata([
        'title' => 'Gagal',
        'icon' => 'error',
        'text' => 'Terjadi kesalahan: ' . $e->getMessage()
      ])->setStatusCode(500);
    }
    return redirect()->to('dashboard/leaderboard');
  }
}
