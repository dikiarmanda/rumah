<?php

namespace App\Controllers\Dashboard;

use App\Models\UserModel;
use App\Models\LaporanModel;
use App\Models\CategoryModel;
use App\Controllers\BaseController;

class Laporan extends BaseController
{
  protected $userModel;
  protected $laporanModel;
  protected $categoryModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
    $this->laporanModel = new LaporanModel();
    $this->categoryModel = new CategoryModel();
  }

  /**
   * Halaman utama laporan
   */
  public function index()
  {
    $tahun = defaultValue($this->request->getGet('tahun'), date('Y'));
    $bulan = defaultValue($this->request->getGet('bulan'), null);

    $data = [
      'title' => 'Laporan Penjualan & Performa Agen',
      'tahun_terpilih' => $tahun,
      'bulan_terpilih' => $bulan,
      'total_statistik' => $this->laporanModel->getTotalStatistikPenjualan($tahun, $bulan),
      'statistik_per_bulan' => $this->laporanModel->getStatistikPenjualanPerBulan($tahun),
    ];
    return $this->template->display('dashboard/laporan/index', $data);
  }

  /**
   * Laporan penjualan properti
   */
  public function penjualan()
  {
    $tahun = defaultValue($this->request->getGet('tahun'), date('Y'));
    $bulan = defaultValue($this->request->getGet('bulan'), null);

    $data = [
      'title' => 'Laporan Penjualan Properti',
      'tahun_terpilih' => $tahun,
      'bulan_terpilih' => $bulan,
      'laporan_penjualan' => $this->laporanModel->getLaporanPenjualan($tahun, $bulan),
      'laporan_by_kategori' => $this->laporanModel->getLaporanPenjualanByKategori($tahun, $bulan),
      'total_statistik' => $this->laporanModel->getTotalStatistikPenjualan($tahun, $bulan),
    ];

    return $this->template->display('dashboard/laporan/penjualan', $data);
  }

  /**
   * Laporan performa agen
   */
  public function performaAgen()
  {
    $tahun = defaultValue($this->request->getGet('tahun'), date('Y'));
    $bulan = defaultValue($this->request->getGet('bulan'), null);

    $data = [
      'title' => 'Laporan Performa Agen',
      'tahun_terpilih' => $tahun,
      'bulan_terpilih' => $bulan,
      'laporan_performa' => $this->laporanModel->getLaporanPerformaAgen($tahun, $bulan),
      'total_statistik' => $this->laporanModel->getTotalStatistikPenjualan($tahun, $bulan),
    ];

    return $this->template->display('dashboard/laporan/performa_agen', $data);
  }

  /**
   * Detail penjualan agen
   */
  public function detailAgen($agent_id)
  {
    $tahun = defaultValue($this->request->getGet('tahun'), date('Y'));
    $bulan = defaultValue($this->request->getGet('bulan'), null);

    // Ambil data agen
    $agen = $this->userModel->find($agent_id);
    if (!$agen) {
      return redirect()->to('dashboard/laporan/performa-agen')->with('error', 'Agen tidak ditemukan');
    }

    $data = [
      'title' => 'Detail Penjualan Agen - ' . $agen['name'],
      'tahun_terpilih' => $tahun,
      'bulan_terpilih' => $bulan,
      'agen' => $agen,
      'detail_penjualan' => $this->laporanModel->getDetailPenjualanAgen($agent_id, $tahun, $bulan),
    ];

    return $this->template->display('dashboard/laporan/detail_agen', $data);
  }

  /**
   * Export laporan penjualan ke PDF
   */
  public function exportPenjualanPdf()
  {
    $tahun = defaultValue($this->request->getGet('tahun'), date('Y'));
    $bulan = defaultValue($this->request->getGet('bulan'), null);

    $data = [
      'title' => 'Laporan Penjualan Properti',
      'tahun' => $tahun,
      'bulan' => $bulan,
      'laporan_penjualan' => $this->laporanModel->getLaporanPenjualan($tahun, $bulan),
      'laporan_by_kategori' => $this->laporanModel->getLaporanPenjualanByKategori($tahun, $bulan),
      'total_statistik' => $this->laporanModel->getTotalStatistikPenjualan($tahun, $bulan)
    ];

    // Load library dompdf
    $dompdf = new \Dompdf\Dompdf();
    $html = view('dashboard/laporan/export_penjualan_pdf', $data);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('laporan_penjualan_' . $tahun . '_' . $bulan . '.pdf', ['Attachment' => false]);
  }

  /**
   * Export laporan performa agen ke PDF
   */
  public function exportPerformaAgenPdf()
  {
    $tahun = defaultValue($this->request->getGet('tahun'), date('Y'));
    $bulan = defaultValue($this->request->getGet('bulan'), null);

    $data = [
      'title' => 'Laporan Performa Agen',
      'tahun' => $tahun,
      'bulan' => $bulan,
      'laporan_performa' => $this->laporanModel->getLaporanPerformaAgen($tahun, $bulan),
      'total_statistik' => $this->laporanModel->getTotalStatistikPenjualan($tahun, $bulan)
    ];

    // Load library dompdf
    $dompdf = new \Dompdf\Dompdf();
    $html = view('dashboard/laporan/export_performa_agen_pdf', $data);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('laporan_performa_agen_' . $tahun . '_' . $bulan . '.pdf', ['Attachment' => false]);
  }

  /**
   * Export laporan penjualan ke Excel
   */
  public function exportPenjualanExcel()
  {
    $tahun = defaultValue($this->request->getGet('tahun'), date('Y'));
    $bulan = defaultValue($this->request->getGet('bulan'), null);

    $data = [
      'title' => 'Laporan Penjualan Properti',
      'tahun' => $tahun,
      'bulan' => $bulan,
      'laporan_penjualan' => $this->laporanModel->getLaporanPenjualan($tahun, $bulan),
      'laporan_by_kategori' => $this->laporanModel->getLaporanPenjualanByKategori($tahun, $bulan),
      'total_statistik' => $this->laporanModel->getTotalStatistikPenjualan($tahun, $bulan)
    ];

    return view('dashboard/laporan/export_penjualan_excel', $data);
  }

  /**
   * Export laporan performa agen ke Excel
   */
  public function exportPerformaAgenExcel()
  {
    $tahun = defaultValue($this->request->getGet('tahun'), date('Y'));
    $bulan = defaultValue($this->request->getGet('bulan'), null);

    $data = [
      'title' => 'Laporan Performa Agen',
      'tahun' => $tahun,
      'bulan' => $bulan,
      'laporan_performa' => $this->laporanModel->getLaporanPerformaAgen($tahun, $bulan),
      'total_statistik' => $this->laporanModel->getTotalStatistikPenjualan($tahun, $bulan)
    ];

    return view('dashboard/laporan/export_performa_agen_excel', $data);
  }

  /**
   * API untuk mendapatkan data laporan penjualan (untuk AJAX)
   */
  public function getDataPenjualan()
  {
    $tahun = defaultValue($this->request->getGet('tahun'), date('Y'));
    $bulan = defaultValue($this->request->getGet('bulan'), null);

    $data = $this->laporanModel->getLaporanPenjualan($tahun, $bulan);

    return $this->response->setJSON([
      'success' => true,
      'data' => $data
    ]);
  }

  /**
   * API untuk mendapatkan data performa agen (untuk AJAX)
   */
  public function getDataPerformaAgen()
  {
    $tahun = defaultValue($this->request->getGet('tahun'), date('Y'));
    $bulan = defaultValue($this->request->getGet('bulan'), null);

    $data = $this->laporanModel->getLaporanPerformaAgen($tahun, $bulan);

    return $this->response->setJSON([
      'success' => true,
      'data' => $data
    ]);
  }
}
