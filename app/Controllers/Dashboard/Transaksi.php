<?php

namespace App\Controllers\Dashboard;

use App\Models\UserModel;
use App\Models\CategoryModel;
use App\Models\PropertyModel;
use App\Models\TransactionModel;
use App\Controllers\BaseController;

class Transaksi extends BaseController
{
    protected $userModel;
    protected $categoryModel;
    protected $propertyModel;
    protected $transactionModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->propertyModel = new PropertyModel();
        $this->categoryModel = new CategoryModel();
        $this->transactionModel = new TransactionModel();
    }

    public function index()
    {
        $agen_id = session()->get('role') == 'agen' ? (int) (session()->get('id')) : null;
        $data = [
            'title' => 'Daftar Transaksi',
            'subtitle' => 'Kelola semua daftar transaksi Anda di Sini.',
            'transaksi' => $this->transactionModel->getData($agen_id),
            'data' => $this->propertyModel->getData($agen_id, null, null, true),
            'kategori' => $this->categoryModel
                ->where('status', 'aktif')
                ->orderBy('name', 'ASC')
                ->findAll(),
            'agens' => $this->userModel
                ->where('status', 'aktif')
                ->where('role', 'agen')
                ->orderBy('name', 'ASC')
                ->findAll(),
        ];
        return $this->template->display('dashboard/transaksi', $data);
    }

    public function get_ajax()
    {
        $status = defaultValue($this->request->getPost('status'), null);
        $agen = defaultValue($this->request->getPost('agen'), null);
        $agen = session()->get('role') == 'agen' ? (int) (session()->get('id')) : $agen;
        $kategori = defaultValue($this->request->getPost('kategori'), null);

        $res = $this->transactionModel->getData($agen, $status, $kategori);

        return $this->response->setJSON($res);
    }

    public function store()
    {
        $property_id = $this->request->getPost('property_id');
        $agent_id = $this->request->getPost('agent_id');
        $price = str_replace('.', '', $this->request->getPost('price'));
        $buyer = $this->request->getPost('buyer');
        $wa_buyer = $this->request->getPost('wa_buyer');
        $tanggal_penjualan = $this->request->getPost('tanggal_penjualan');
        $tanggal_serah_terima = $this->request->getPost('tanggal_serah_terima');

        $data = [
            'property_id' => $property_id,
            'agen_id' => $agent_id,
            'price' => $price,
            'buyer' => $buyer,
            'wa_buyer' => $wa_buyer,
            'tanggal_penjualan' => $tanggal_penjualan,
            'tanggal_serah_terima' => $tanggal_serah_terima,
        ];

        $validation = \Config\Services::validation();
        $validation->setRules([
            'property_id' => 'required|numeric',
            'agent_id' => 'required|numeric',
            'buyer' => 'required|min_length[3]|max_length[50]',
            'wa_buyer' => 'required|numeric',
            'tanggal_penjualan' => 'required|valid_date',
            'tanggal_serah_terima' => 'required|valid_date',
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
            $this->transactionModel->insert($data);

            $this->propertyModel->update($property_id, [
                'publish' => 0,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            session()->setFlashdata([
                'title' => 'Berhasil',
                'icon' => 'success',
                'text' => 'Transaksi berhasil disimpan'
            ]);
        } catch (\Exception $e) {
            session()->setFlashdata([
                'title' => 'Gagal',
                'icon' => 'error',
                'text' => $e->getMessage()
            ]);
        }
        return redirect()->to(base_url('dashboard/transaksi'));
    }

    public function update($id)
    {
        $property_id = $this->request->getPost('property_id');
        $agent_id = $this->request->getPost('agent_id');
        $price = str_replace('.', '', $this->request->getPost('price'));
        $buyer = $this->request->getPost('buyer');
        $wa_buyer = $this->request->getPost('wa_buyer');
        $tanggal_penjualan = $this->request->getPost('tanggal_penjualan');
        $tanggal_serah_terima = $this->request->getPost('tanggal_serah_terima');
        $status = $this->request->getPost('status');

        $data = [
            'property_id' => $property_id,
            'agent_id' => $agent_id,
            'price' => $price,
            'buyer' => $buyer,
            'wa_buyer' => $wa_buyer,
            'status' => $status,
            'tanggal_penjualan' => $tanggal_penjualan,
            'tanggal_serah_terima' => $tanggal_serah_terima,
        ];

        $validation = \Config\Services::validation();
        $validation->setRules([
            'property_id' => 'required|numeric',
            'agent_id' => 'required|numeric',
            'buyer' => 'required|min_length[3]|max_length[50]',
            'wa_buyer' => 'required|numeric',
            'tanggal_penjualan' => 'required|valid_date',
            'tanggal_serah_terima' => 'required|valid_date',
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
            $this->transactionModel->update($id, $data);

            $this->propertyModel->update($property_id, [
                'publish' => 0,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            session()->setFlashdata([
                'title' => 'Berhasil',
                'icon' => 'success',
                'text' => 'Transaksi berhasil disimpan'
            ]);
        } catch (\Exception $e) {
            session()->setFlashdata([
                'title' => 'Gagal',
                'icon' => 'error',
                'text' => $e->getMessage()
            ]);
        }
        return redirect()->to(base_url('dashboard/transaksi'));
    }

    public function validasi($id)
    {
        $validator = session('id');
        $property_id = $this->request->getPost('property_id');
        $note = $this->request->getPost('note');

        $data = [
            'property_id' => $property_id,
            'status' => 'Valid',
            'validator' => $validator,
            'note' => $note,
        ];

        try {
            $this->transactionModel->update($id, $data);

            $property = $this->propertyModel->where('id', $property_id)->first();
            $jualSewa = str_replace('di', 'ter', $property['status']);
            $this->propertyModel->update($property_id, [
                'status' => $jualSewa,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            session()->setFlashdata([
                'title' => 'Berhasil',
                'icon' => 'success',
                'text' => 'Transaksi berhasil disimpan'
            ]);
        } catch (\Exception $e) {
            session()->setFlashdata([
                'title' => 'Gagal',
                'icon' => 'error',
                'text' => $e->getMessage()
            ]);
        }
        return redirect()->to(base_url('dashboard/transaksi'));
    }

    public function delete($id)
    {
        $transaksi = $this->transactionModel->find($id);
        if (!$transaksi) {
            return $this->response->setJSON([
                'title' => 'Gagal',
                'icon' => 'error',
                'text' => 'Transaksi tidak ditemukan'
            ]);
        }

        $this->transactionModel->delete($id);
        $this->propertyModel->update($transaksi['property_id'], ['publish' => 1]);

        return $this->response->setJSON([
            'title' => 'Berhasil',
            'icon' => 'success',
            'text' => 'Transaksi berhasil dihapus'
        ]);
    }
}
