<div class="page-header">
  <h3 class="page-title">
    <span class="bg-gradient-primary text-white rounded p-1 me-2">
      <i class="fas fa-chart-line ps-1"></i>
    </span>
    Laporan Penjualan & Performa Agen
  </h3>
</div>

<?= $this->include('dashboard/laporan/header') ?>

<!-- Menu Laporan -->
<div class="row mt-3">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body text-center">
        <i class="mdi mdi-home-variant mdi-48px text-primary mb-3"></i>
        <h4 class="card-title">Laporan Penjualan Properti</h4>
        <p class="card-text">Lihat detail laporan penjualan properti berdasarkan periode yang dipilih</p>
        <a href="<?= base_url('dashboard/laporan/penjualan?tahun=' . $tahun_terpilih . '&bulan=' . $bulan_terpilih) ?>"
          class="btn btn-primary">Lihat Laporan</a>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-body text-center">
        <i class="mdi mdi-account-group mdi-48px text-success mb-3"></i>
        <h4 class="card-title">Laporan Performa Agen</h4>
        <p class="card-text">Lihat performa penjualan setiap agen berdasarkan periode yang dipilih</p>
        <a href="<?= base_url('dashboard/laporan/performa-agen?tahun=' . $tahun_terpilih . '&bulan=' . $bulan_terpilih) ?>"
          class="btn btn-success">Lihat Laporan</a>
      </div>
    </div>
  </div>
</div>

<!-- Grafik Statistik Per Bulan -->
<?php if (!empty($statistik_per_bulan)): ?>
  <div class="row mt-3">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Grafik Penjualan Per Bulan (<?= $tahun_terpilih ?>)</h4>
          <canvas id="chartPenjualanPerBulan" height="100"></canvas>
        </div>
      </div>
    </div>
  </div>
<?php endif ?>

<?= $this->section('js') ?>
<script>
  <?php if (!empty($statistik_per_bulan)): ?>
    // Grafik Penjualan Per Bulan
    const ctx = document.getElementById('chartPenjualanPerBulan').getContext('2d');
    const chartPenjualanPerBulan = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [
          <?php foreach ($statistik_per_bulan as $stat): ?>
                            '<?= date('M', mktime(0, 0, 0, $stat['bulan'], 1)) ?>',
          <?php endforeach; ?>
        ],
        datasets: [{
          label: 'Total Transaksi',
          data: [
            <?php foreach ($statistik_per_bulan as $stat): ?>
              <?= $stat['total_transaksi'] ?>,
            <?php endforeach; ?>
          ],
          borderColor: 'rgb(75, 192, 192)',
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          tension: 0.1
        }, {
          label: 'Total Omset (Juta)',
          data: [
            <?php foreach ($statistik_per_bulan as $stat): ?>
              <?= round($stat['total_penjualan'] / 1000000, 2) ?>,
            <?php endforeach; ?>
          ],
          borderColor: 'rgb(255, 99, 132)',
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          tension: 0.1,
          yAxisID: 'y1'
        }]
      },
      options: {
        responsive: true,
        interaction: {
          mode: 'index',
          intersect: false,
        },
        scales: {
          y: {
            type: 'linear',
            display: true,
            position: 'left',
          },
          y1: {
            type: 'linear',
            display: true,
            position: 'right',
            grid: {
              drawOnChartArea: false,
            },
          }
        }
      }
    });
  <?php endif ?>
</script>
<?= $this->endSection() ?>