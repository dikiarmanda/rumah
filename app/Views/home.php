<style>
  .hero-section {
    background: linear-gradient(135deg, #1b5396 0%, #2168bc 100%);
    color: #fff;
    padding: 96px 0;
    border-radius: 0 0 24px 24px;
  }

  .feature-icon {
    width: 56px;
    height: 56px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
  }

  .property-card img {
    object-fit: cover;
    height: 200px;
  }

  .section-title {
    font-weight: 700;
  }

  .section-subtitle {
    color: #64748b;
  }

  @media (min-width: 992px) {
    .hero-section {
      padding: 128px 0;
    }

    .property-card img {
      height: 220px;
    }
  }
</style>

<!-- Hero -->
<section class="hero-section mb-5">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <h1 class="display-5 fw-bold mb-3">Solusi Properti Modern untuk Hunian dan Investasi Anda</h1>
        <p class="lead mb-4">Temukan rumah, apartemen, dan kavling terbaik dengan proses mudah, aman, dan transparan.
          Tim profesional kami siap mendampingi setiap langkah Anda.</p>
        <div class="d-flex gap-3">
          <a href="#tentang" class="btn btn-lg btn-light text-primary">Pelajari Lebih Lanjut</a>
          <a href="#kontak" class="btn btn-lg btn-outline-light">Konsultasi Gratis</a>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="card shadow border-0">
          <div class="card-body p-4">
            <h5 class="fw-semibold mb-3">Statistik Kami</h5>
            <div class="row g-3 text-center">
              <div class="col-6">
                <div class="h3 fw-bold text-primary"><?= $stat['transaksi'] ?></div>
                <div class="small text-muted">Properti Terjual</div>
              </div>
              <div class="col-6">
                <div class="h3 fw-bold text-primary"><?= $stat['klien'] ?></div>
                <div class="small text-muted">Klien Puas</div>
              </div>
              <div class="col-6">
                <div class="h3 fw-bold text-primary"><?= $stat['tahun'] ?></div>
                <div class="small text-muted">Tahun Pengalaman</div>
              </div>
              <div class="col-6">
                <div class="h3 fw-bold text-primary"><?= $stat['kota'] ?></div>
                <div class="small text-muted">Kota Terjangkau</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Fitur -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="section-title">Mengapa Memilih Kami</h2>
      <p class="section-subtitle">Nilai tambah yang kami hadirkan untuk kebutuhan properti Anda</p>
    </div>
    <div class="row g-4">
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body">
            <div class="feature-icon bg-primary mb-3">
              <i class="fa-solid fa-house-chimney text-white"></i>
            </div>
            <h5 class="fw-semibold mb-2">Pilihan Lengkap</h5>
            <p class="mb-0 text-muted">Ribuan listing terbaru yang diverifikasi untuk hunian impian Anda.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body">
            <div class="feature-icon bg-primary mb-3">
              <i class="fa-solid fa-user-shield text-white"></i>
            </div>
            <h5 class="fw-semibold mb-2">Transaksi Aman</h5>
            <p class="mb-0 text-muted">Pendampingan legalitas dan proses yang transparan dari awal hingga akhir.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body">
            <div class="feature-icon bg-primary mb-3">
              <i class="fa-solid fa-handshake angle text-white"></i>
            </div>
            <h5 class="fw-semibold mb-2">Konsultasi Profesional</h5>
            <p class="mb-0 text-muted">Tim berpengalaman membantu Anda memilih properti paling tepat.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body">
            <div class="feature-icon bg-primary mb-3">
              <i class="fa-solid fa-tags text-white"></i>
            </div>
            <h5 class="fw-semibold mb-2">Harga Kompetitif</h5>
            <p class="mb-0 text-muted">Penawaran terbaik dengan negosiasi yang menguntungkan kedua belah pihak.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Tentang Kami -->
<section id="tentang" class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-6">
        <h2 class="section-title mb-3">Tentang Perusahaan Properti</h2>
        <p class="section-subtitle mb-4">Sampro Indonesia merupakan agensi consultant property yang di dirikan pada 25
          September 2018. Sampro Indonesia dipimpin Oleh Manager Marketing Anto Supriyono. Sampro Indonesia beralamatkan
          di Perum TAS 4 Blok A2 No.03 Jambangan Candi Sidoarjo</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="d-flex align-items-center">
              <div class="feature-icon bg-primary me-3">
                <i class="fas fa-award text-white"></i>
              </div>
              <div>
                <div class="fw-semibold">Terpercaya</div>
                <div class="small text-muted"><?= $stat['tahun'] ?> tahun pengalaman</div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-center">
              <div class="feature-icon bg-primary me-3">
                <i class="fas fa-certificate text-white"></i>
              </div>
              <div>
                <div class="fw-semibold">Bersertifikat</div>
                <div class="small text-muted">Lisensi resmi</div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-center">
              <div class="feature-icon bg-primary me-3">
                <i class="fas fa-users text-white"></i>
              </div>
              <div>
                <div class="fw-semibold">Tim Profesional</div>
                <div class="small text-muted">50+ agen berpengalaman</div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-center">
              <div class="feature-icon bg-primary me-3">
                <i class="fas fa-shield-alt text-white"></i>
              </div>
              <div>
                <div class="fw-semibold">Garansi</div>
                <div class="small text-muted">100% aman transaksi</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="position-relative">
          <img src="<?= base_url('public/images/1.jpg') ?>" class="img-fluid rounded-3 shadow" alt="Kantor Kami">
          <div class="position-absolute top-0 start-0 bg-primary text-white p-3 rounded-3 m-3">
            <div class="h4 mb-0"><?= $stat['tahun'] ?></div>
            <div class="small">Tahun Pengalaman</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Visi Misi -->
<section id="visi-misi" class="py-5">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="section-title">Visi & Misi</h2>
      <p class="section-subtitle">Panduan kami dalam melayani kebutuhan properti Anda.</p>
    </div>
    <div class="row g-4 justify-content-center">
      <div class="col-lg-12">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body p-4">
            <div class="d-flex align-items-start">
              <div class="feature-icon bg-primary me-3 flex-shrink-0">
                <i class="fas fa-eye text-white"></i>
              </div>
              <div>
                <h5 class="fw-semibold mb-2">Visi</h5>
                <p class="text-muted mb-0">Menjadi agent property terpercaya dan terbaik tingkat Nasional.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body p-4">
            <div class="d-flex align-items-start">
              <div class="feature-icon bg-primary me-3 flex-shrink-0">
                <i class="fas fa-bullseye text-white"></i>
              </div>
              <div>
                <h5 class="fw-semibold mb-2">Misi</h5>
                <ul class="list-unstyled text-muted mb-0">
                  <li class="d-flex mb-2"><i
                      class="fas fa-check-circle text-primary mt-1 me-2 flex-shrink-0"></i><span>Memberi pelayanan
                      terbaik dan memberikan produk yang berkualitas pada calon pemilik properti.</span></li>
                  <li class="d-flex mb-2"><i
                      class="fas fa-check-circle text-primary mt-1 me-2 flex-shrink-0"></i><span>Membangun manajemen
                      yang profesional serta menjaga pertumbuhan agen.</span></li>
                  <li class="d-flex"><i
                      class="fas fa-check-circle text-primary mt-1 me-2 flex-shrink-0"></i><span>Menjalin hubungan
                      kerjasama dengan usaha saling mitra yang menguntungkan dan berkelanjutan.</span></li>
                  <li class="d-flex"><i
                      class="fas fa-check-circle text-primary mt-1 me-2 flex-shrink-0"></i><span>Memaksimalkan seluruh
                      potensi anggota agent melalui pengambangan integritas dan menambah wawasan.</span></li>
                  <li class="d-flex"><i
                      class="fas fa-check-circle text-primary mt-1 me-2 flex-shrink-0"></i><span>Menciptakan lingkungan
                      kerja yang profesional dan meningkatkan produktivitas agensi.</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-5 bg-light">
  <div class="container">
    <div
      class="p-4 p-lg-5 bg-primary text-white rounded-3 d-flex flex-column flex-lg-row align-items-lg-center justify-content-between">
      <div class="mb-3 mb-lg-0">
        <h3 class="mb-2">Butuh Konsultasi Properti?</h3>
        <p class="mb-0">Tim profesional kami siap membantu Anda memahami seluk beluk dunia properti.</p>
      </div>
      <a href="#kontak" class="btn btn-outline-light btn-lg">Hubungi Kami</a>
    </div>
  </div>
</section>

<!-- Testimoni -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="section-title">Apa Kata Klien</h2>
      <p class="section-subtitle">Pengalaman nyata dari mereka yang telah menemukan propertinya</p>
    </div>
    <div class="row g-4">
      <?php foreach ($testimoni as $key => $item): ?>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <img src="<?= base_url('public/images/faces/face' . (10 + $key) . '.jpg') ?>" class="rounded-circle me-3"
                  width="48" height="48" alt="Klien">
                <div>
                  <div class="fw-semibold"><?= $item['name'] ?></div>
                  <div class="text-muted small"><?= $item['alamat'] ?></div>
                </div>
              </div>
              <p class="mb-0"><?= $item['text'] ?></p>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>

<!-- Agen Terbaik -->
<?php if (!empty($leaderboard)): ?>
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-4">
        <h2 class="section-title">Agen Terbaik Periode Tahun <?= date('Y') - 1 ?></h2>
        <p class="section-subtitle">Mereka yang paling berprestasi dan terpercaya.</p>
      </div>
      <div class="row g-4 justify-content-center">
        <?php foreach ($leaderboard as $key => $agen): ?>
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm text-center">
              <div class="card-body d-flex flex-column align-items-center p-4">
                <div class="position-relative w-100 mb-3">
                  <img src="<?= base_url($agen['photo']) ?>" class="rounded" width="100%" height="250px"
                    alt="<?= $agen['name'] ?>" style="object-fit: cover;">
                  <?php if ($key < 3): ?>
                    <span style="right: -40px;" class="d-flex position-absolute top-0 translate-middle">
                      <span class="badge bg-warning rounded-pill ms-auto p-2">
                        <i class="fas fa-trophy text-white"></i>
                        <span class="ms-1">#<?= $agen['peringkat'] ?></span>
                      </span>
                    </span>
                  <?php endif; ?>
                </div>
                <h5 class="fw-semibold mb-1"><?= $agen['name'] ?></h5>
                <p class="text-muted mb-3">Agen Properti</p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<!-- Kontak -->
<section id="kontak" class="py-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6">
        <h2 class="section-title mb-3">Hubungi Kami</h2>
        <p class="section-subtitle mb-4">Tinggalkan pesan Anda, kami akan menghubungi kembali secepatnya.</p>
        <form>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" placeholder="Nama lengkap">
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" placeholder="nama@email.com">
            </div>
            <div class="col-12">
              <label class="form-label">No. Telepon</label>
              <input type="text" class="form-control" placeholder="08xxxxxxxxxx">
            </div>
            <div class="col-12">
              <label class="form-label">Pesan</label>
              <textarea rows="4" class="form-control" placeholder="Ceritakan kebutuhan properti Anda"></textarea>
            </div>
            <div class="col-12 d-grid d-sm-flex gap-2">
              <button type="button" class="btn btn-primary">Kirim Pesan</button>
              <button type="reset" class="btn btn-outline-primary">Reset</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-6">
        <div class="h-100 p-4 bg-light rounded-3">
          <h5 class="fw-semibold mb-3">Kantor Pusat</h5>
          <p class="mb-1"><i class="fas fa-map-marker-alt me-2 text-primary"></i><?= $contact['alamat'] ?></p>
          <p class="mb-1"><i class="fas fa-phone me-2 text-primary"></i><?= $contact['telepon'] ?></p>
          <p class="mb-3"><i class="fas fa-envelope me-2 text-primary"></i><?= $contact['email'] ?></p>
          <div class="ratio ratio-16x9 rounded-3 overflow-hidden">
            <?= $contact['maps'] ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer konten -->
<?= $this->include('footer-mini') ?>