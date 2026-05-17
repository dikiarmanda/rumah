<style>
  .icon.position-absolute {
    top: 50%;
    right: 5%;
    transform: translateY(-50%);
  }
</style>

<!-- Filter Section -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Filter Laporan</h4>
        <form method="GET" action="<?= base_url('dashboard/laporan') ?>" class="row g-3">
          <div class="col-md-4">
            <label for="tahun" class="form-label">Tahun</label>
            <select class="form-select" id="tahun" name="tahun" onchange="this.form.submit()">
              <?php foreach (range(date('Y'), 2025) as $tahun): ?>
                <option value="<?= $tahun ?>" <?= $tahun == $tahun_terpilih ? 'selected' : '' ?>>
                  <?= $tahun ?>
                </option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="col-md-4">
            <label for="bulan" class="form-label">Bulan</label>
            <select class="form-select" id="bulan" name="bulan" onchange="this.form.submit()">
              <option value="all">Semua Bulan</option>
              <?php foreach (get_bulan() as $key => $bulan): ?>
                <option value="<?= $key ?>" <?= $key == $bulan_terpilih ? 'selected' : '' ?>>
                  <?= $bulan ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label"></label>
            <div>
              <button type="submit" class="btn btn-primary">Filter</button>
              <a href="<?= base_url('dashboard/laporan') ?>" class="btn btn-secondary">Reset</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Statistik Overview -->
<div class="row mt-3">
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body position-relative">
        <div class="icon position-absolute z-0 opacity-25">
          <i class="fas fa-home icon-item fs-1"></i>
        </div>
        <div class="position-relative z-1">
          <h3 class="mb-0"><?= number_format($total_statistik['total_transaksi'] ?? 0) ?></h3>
          <h6 class="text-muted font-weight-normal mb-0">Total Transaksi</h6>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body position-relative">
        <div class="icon position-absolute z-0 opacity-25">
          <i class="fa-solid fa-dollar-sign icon-item fs-1"></i>
        </div>
        <div class="position-relative z-1">
          <h3 class="mb-0"><?= shortNumber($total_statistik['total_omset'] ?? 0) ?></h3>
          <h6 class="text-muted font-weight-normal mb-0">Total Omset</h6>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body position-relative">
        <div class="icon position-absolute z-0 opacity-25">
          <i class="fa-solid fa-money-bill icon-item fs-1"></i>
        </div>
        <div class="position-relative z-1">
          <h3 class="mb-0"><?= shortNumber($total_statistik['rata_rata_harga'] ?? 0) ?></h3>
          <h6 class="text-muted font-weight-normal mb-0">Rata-rata Harga</h6>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body position-relative">
        <div class="icon position-absolute z-0 opacity-25">
          <i class="fa-solid fa-money-bill-trend-up icon-item fs-1"></i>
        </div>
        <div class="position-relative z-1">
          <h3 class="mb-0"><?= shortNumber($total_statistik['harga_tertinggi'] ?? 0) ?></h3>
          <h6 class="text-muted font-weight-normal mb-0">Harga Tertinggi</h6>
        </div>
      </div>
    </div>
  </div>
</div>