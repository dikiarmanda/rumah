<style>
  .owl-carousel .item img {
    display: block;
    width: 100%;
    max-height: 50vh;
    object-fit: cover;
    border-radius: 15px;
  }

  .detail-card {
    border: none;
    border-radius: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .detail-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
  }

  .agent-card {
    border-radius: 15px;
    background-color: #f8f9fa;
  }

  .detail-icon {
    font-size: 1.5rem;
    color: #0d6efd;
    width: 40px;
    text-align: center;
  }

  .list-group-item {
    border: none;
    padding: 0.75rem 0;
  }
</style>

<div class="container my-5">
  <div class="row">
    <div class="col-12">
      <!-- Carousel -->
      <div class="owl-carousel owl-theme mb-4">
        <?php foreach ($data['images'] as $img): ?>
          <div class="item">
            <img src="<?= base_url($img['image_url']) ?>" alt="Property Image">
          </div>
        <?php endforeach ?>
      </div>
    </div>
    <div class="col-lg-8">

      <!-- Title, Price, Category -->
      <div class="card detail-card shadow-sm mb-4">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h2 class="card-title fw-bold mb-1"><?= $data['title'] ?></h2>
              <p class="text-muted mb-2"><i class="fas fa-map-marker-alt me-2"></i><?= $data['city'] ?>,
                <?= $data['province'] ?>
              </p>
            </div>
            <span class="badge bg-primary fs-5 mt-1"><?= $data['kategori'] ?></span>
          </div>
          <span class="fw-bolder text-primary h1 mt-3"><?= shortNumber($data['price']) ?></span>
          <?php if ($data['status'] == 'disewakan'): ?>
            <span class="fw-semibold h2 ms-3">/ bulan</span>
          <?php endif ?>
          <?php if ($data['kategori'] == 'Tanah'): ?>
            <span class="fw-semibold ms-3"><?= shortNumber($data['price'] / $data['land_area']) ?> / m<sup>2</sup></span>
          <?php endif ?>
        </div>
      </div>

      <!-- Property Details -->
      <div class="card detail-card shadow-sm mb-4">
        <div class="card-body">
          <h5 class="card-title fw-bold mb-4">Detail Properti</h5>
          <div class="row">
            <div class="col-md-6">
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex align-items-center"><i
                    class="fas fa-exchange-alt detail-icon me-3"></i> <span class="fw-bold me-2">Transaksi:</span>
                  <?= $data['status'] == 'dijual' ? 'Jual' : 'Sewa' ?></li>
                <li class="list-group-item d-flex align-items-center"><i class="fas fa-bed detail-icon me-3"></i> <span
                    class="fw-bold me-2">Kamar Tidur:</span> <?= $data['bedrooms'] ?></li>
                <li class="list-group-item d-flex align-items-center"><i class="fas fa-bath detail-icon me-3"></i> <span
                    class="fw-bold me-2">Kamar Mandi:</span> <?= $data['bathrooms'] ?></li>

                <li class="list-group-item d-flex align-items-center"><i class="fas fa-star detail-icon me-3"></i> <span
                    class="fw-bold me-2">Fasilitas:</span> <?= str_ireplace(';', ', ', $data['facilities']) ?></li>
              </ul>
            </div>
            <div class="col-md-6">
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex align-items-center"><i
                    class="fas fa-layer-group detail-icon me-3"></i> <span class="fw-bold me-2">Lantai:</span>
                  <?= $data['floors'] ?></li>
                <li class="list-group-item d-flex align-items-center"><i
                    class="fas fa-ruler-combined detail-icon me-3"></i> <span class="fw-bold me-2">Luas Tanah:</span>
                  <?= $data['land_area'] ?> m<sup>2</sup></li>
                <li class="list-group-item d-flex align-items-center"><i class="fas fa-building detail-icon me-3"></i>
                  <span class="fw-bold me-2">Luas Bangunan:</span> <?= $data['building_area'] ?> m<sup>2</sup>
                </li>
                <li class="list-group-item d-flex align-items-center"><i class="fas fa-road detail-icon me-3"></i> <span
                    class="fw-bold me-2">Alamat:</span>
                  <?= $data['address'] . ', ' . $data['city'] . ', ' . $data['province'] ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="card detail-card shadow-sm">
        <div class="card-body">
          <h5 class="fw-bold">Deskripsi</h5>
          <p class="card-text"><?= $data['description'] ?></p>
        </div>
      </div>

      <hr>
      <!-- Simulasi KPR Section -->
      <div class="card shadow-sm border-0" style="border-radius: 15px;">
        <div class="card-body p-4">
          <h4 class="fw-bold mb-4 text-center">Simulasi Cicilan KPR</h4>

          <div class="row">
            <!-- Form Input -->
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label fw-semibold">Harga Properti (Rp)</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="kprPropertyPrice"
                    value="<?= number_format($data['price'], 0, ',', '.') ?>" readonly
                    style="background-color: #f8f9fa;">
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Uang Muka (Rp)</label>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="input-group">
                      <input type="text" class="form-control" id="kprDownPaymentPercent" placeholder="20">
                      <span class="input-group-text">%</span>
                    </div>
                  </div>
                  <div class="col-sm-8 mt-3 mt-sm-0">
                    <input type="text" class="form-control" id="kprDownPaymentAmount" placeholder="680,000,000">
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Jangka Waktu</label>
                <div class="input-group">
                  <input type="number" class="form-control" id="kprLoanTerm" value="15" min="1" max="30">
                  <span class="input-group-text">tahun</span>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Suku Bunga</label>
                <div class="input-group">
                  <input type="number" class="form-control" id="kprInterestRate" value="5" min="0" max="20" step="0.1">
                  <span class="input-group-text">%</span>
                </div>
              </div>
            </div>

            <!-- Hasil Simulasi -->
            <div class="col-md-6">
              <div class="text-center">
                <h5 class="fw-bold mb-2">Jumlah Angsuran</h5>
                <div class="bg-primary text-white p-4 rounded-3 mb-3">
                  <div class="h2 fw-bold mb-0" id="kprMonthlyPayment">Rp. 21,509,587</div>
                  <small class="opacity-75">per bulan</small>
                </div>

                <button class="btn btn-primary btn-lg px-4" onclick="calculateKPRDetail()">
                  <i class="fas fa-calculator me-2"></i>Hitung Ulang
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Agent Info -->
    <div class="col-lg-4">
      <?php foreach ($data['agents'] as $agen): ?>
        <div class="card agent-card shadow-sm sticky-top mb-3" style="top: 20px;">
          <div class="card-header text-center bg-primary text-white">
            <h5 class="mb-0 fw-bold">Informasi Agen</h5>
          </div>
          <div class="card-body text-center">
            <img src="<?= base_url($agen['photo']) ?>" class="card-img-top agent-image" alt="<?= esc($agen['name']) ?>"
              style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
            <h5 class="card-title fw-bold"><?= $agen['name'] ?></h5>
            <p class="text-muted mb-3"><i class="fas fa-map-marker-alt me-2"></i><?= $agen['location'] ?></p>
            <a href="https://wa.me/<?= $agen['phone'] ?>" target="_blank" class="btn btn-success w-100 py-2 fw-bold">
              <i class="fab fa-whatsapp me-2"></i>Hubungi via WhatsApp
            </a>
          </div>
        </div>
      <?php endforeach ?>
    </div>

  </div>
</div>

<?= $this->include('footer-mini') ?>

<script>
  // Format number dengan separator ribuan
  function formatNumber(num) {
    return new Intl.NumberFormat('id-ID').format(num);
  }

  // Parse number dari string yang sudah diformat
  function parseNumber(str) {
    return parseInt(str.replace(/[^\d]/g, ''));
  }

  // Format currency untuk KPR
  function formatCurrencyKPR(num) {
    return 'Rp. ' + formatNumber(num);
  }

  // Hitung uang muka berdasarkan persentase
  function calculateDownPaymentFromPercent() {
    const propertyPrice = parseNumber(document.getElementById('kprPropertyPrice').value);
    const percent = parseFloat(document.getElementById('kprDownPaymentPercent').value) || 0;
    const downPaymentAmount = (propertyPrice * percent) / 100;

    if (downPaymentAmount > 0) {
      document.getElementById('kprDownPaymentAmount').value = formatNumber(downPaymentAmount);
    }
  }

  // Hitung persentase uang muka berdasarkan nominal
  function calculateDownPaymentFromAmount() {
    const propertyPrice = parseNumber(document.getElementById('kprPropertyPrice').value);
    const amount = parseNumber(document.getElementById('kprDownPaymentAmount').value);
    const percent = (amount / propertyPrice) * 100;

    if (percent > 0) {
      document.getElementById('kprDownPaymentPercent').value = Math.round(percent);
    }
  }

  // Hitung simulasi KPR untuk halaman detail
  function calculateKPRDetail() {
    const propertyPrice = parseNumber(document.getElementById('kprPropertyPrice').value);
    const downPaymentAmount = parseNumber(document.getElementById('kprDownPaymentAmount').value);
    const loanTerm = parseInt(document.getElementById('kprLoanTerm').value);
    const interestRate = parseFloat(document.getElementById('kprInterestRate').value);

    // Validasi input
    if (!propertyPrice || !downPaymentAmount || !loanTerm || !interestRate) {
      alert('Mohon lengkapi semua data yang diperlukan!');
      return;
    }

    if (downPaymentAmount >= propertyPrice) {
      alert('Uang muka tidak boleh lebih besar atau sama dengan harga properti!');
      return;
    }

    // Hitung jumlah pinjaman
    const loanAmount = propertyPrice - downPaymentAmount;

    // Hitung cicilan bulanan menggunakan formula annuity
    const monthlyInterestRate = interestRate / 100 / 12;
    const numberOfPayments = loanTerm * 12;

    let monthlyPayment;
    if (monthlyInterestRate === 0) {
      // Jika bunga 0%, cicilan = pokok / jumlah bulan
      monthlyPayment = loanAmount / numberOfPayments;
    } else {
      // Formula annuity untuk cicilan tetap
      monthlyPayment = loanAmount *
        (monthlyInterestRate * Math.pow(1 + monthlyInterestRate, numberOfPayments)) /
        (Math.pow(1 + monthlyInterestRate, numberOfPayments) - 1);
    }

    // Tampilkan hasil
    document.getElementById('kprMonthlyPayment').textContent = formatCurrencyKPR(Math.round(monthlyPayment));
  }

  // Event listeners untuk KPR calculator
  document.addEventListener('DOMContentLoaded', function () {
    // Auto calculate saat input berubah
    document.getElementById('kprDownPaymentPercent').addEventListener('input', function () {
      calculateDownPaymentFromPercent();
      calculateKPRDetail();
    });

    document.getElementById('kprDownPaymentAmount').addEventListener('input', function () {
      let value = this.value.replace(/[^\d]/g, '');
      if (value) {
        this.value = formatNumber(value);
        calculateDownPaymentFromAmount();
        calculateKPRDetail();
      }
    });

    document.getElementById('kprLoanTerm').addEventListener('change', function () {
      calculateKPRDetail();
    });

    document.getElementById('kprInterestRate').addEventListener('change', function () {
      calculateKPRDetail();
    });

    // Set default uang muka 20%
    const propertyPrice = parseNumber(document.getElementById('kprPropertyPrice').value);
    const defaultDownPayment = (propertyPrice * 20) / 100;
    document.getElementById('kprDownPaymentPercent').value = 20;
    document.getElementById('kprDownPaymentAmount').value = formatNumber(defaultDownPayment);

    // Hitung simulasi awal
    calculateKPRDetail();
  });
</script>