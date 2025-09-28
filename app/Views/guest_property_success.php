<style>
  .success-section {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: #fff;
    padding: 80px 0;
    border-radius: 0 0 24px 24px;
  }

  .success-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    margin-top: -40px;
    position: relative;
    z-index: 10;
  }

  .success-icon {
    width: 80px;
    height: 80px;
    background: #10b981;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
  }

  .success-icon i {
    font-size: 2.5rem;
    color: #fff;
  }

  .section-title {
    font-weight: 700;
    color: #1f2937;
  }

  .section-subtitle {
    color: #6b7280;
  }

  .info-card {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 1.5rem;
  }

  .info-item {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
  }

  .info-item:last-child {
    margin-bottom: 0;
  }

  .info-icon {
    width: 40px;
    height: 40px;
    background: #1b5396;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
    flex-shrink: 0;
  }

  .info-icon i {
    color: #fff;
    font-size: 1.2rem;
  }

  .btn-primary {
    background: #1b5396;
    border-color: #1b5396;
    padding: 0.75rem 2rem;
    font-weight: 600;
    border-radius: 8px;
  }

  .btn-primary:hover {
    background: #164a7a;
    border-color: #164a7a;
  }

  .btn-outline-primary {
    border-color: #1b5396;
    color: #1b5396;
    padding: 0.75rem 2rem;
    font-weight: 600;
    border-radius: 8px;
  }

  .btn-outline-primary:hover {
    background: #1b5396;
    border-color: #1b5396;
  }

  .contact-info {
    background: #f0f9ff;
    border: 1px solid #0ea5e9;
    border-radius: 12px;
    padding: 1.5rem;
  }

  .contact-info h6 {
    color: #0c4a6e;
    font-weight: 600;
  }

  .contact-info p {
    color: #075985;
    margin-bottom: 0.5rem;
  }

  .contact-info i {
    color: #0ea5e9;
    margin-right: 0.5rem;
  }
</style>

<!-- Success Hero Section -->
<section class="success-section">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-lg-8">
        <div class="success-icon">
          <i class="fas fa-check"></i>
        </div>
        <h1 class="display-5 fw-bold mb-3">Terima Kasih!</h1>
        <p class="lead mb-4">Properti Anda telah berhasil disubmit dan sedang dalam proses verifikasi.</p>
      </div>
    </div>
  </div>
</section>

<!-- Success Content -->
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="success-card p-4 p-lg-5">
          <div class="row">
            <div class="col-lg-8">
              <h2 class="section-title mb-3">Apa yang terjadi selanjutnya?</h2>
              <p class="section-subtitle mb-4">Tim profesional kami akan memverifikasi properti Anda sebelum
                dipublikasikan.</p>

              <div class="info-card mb-4">
                <div class="info-item">
                  <div class="info-icon">
                    <i class="fas fa-search"></i>
                  </div>
                  <div>
                    <h6 class="mb-1">Verifikasi Data</h6>
                    <p class="mb-0 text-muted">Tim kami akan memeriksa kelengkapan dan keakuratan data properti Anda</p>
                  </div>
                </div>

                <div class="info-item">
                  <div class="info-icon">
                    <i class="fas fa-phone"></i>
                  </div>
                  <div>
                    <h6 class="mb-1">Konfirmasi Kontak</h6>
                    <p class="mb-0 text-muted">Kami akan menghubungi Anda untuk konfirmasi dan verifikasi tambahan</p>
                  </div>
                </div>

                <div class="info-item">
                  <div class="info-icon">
                    <i class="fas fa-globe"></i>
                  </div>
                  <div>
                    <h6 class="mb-1">Publikasi</h6>
                    <p class="mb-0 text-muted">Setelah diverifikasi, properti Anda akan dipublikasikan di website kami
                    </p>
                  </div>
                </div>
              </div>

              <div class="alert alert-info">
                <i class="fas fa-clock me-2"></i>
                <strong>Estimasi Waktu:</strong> Proses verifikasi biasanya memakan waktu 1-2 hari kerja. Kami akan
                mengirimkan notifikasi via email atau WhatsApp setelah properti dipublikasikan.
              </div>

              <div class="d-flex gap-3">
                <a href="<?= base_url('/') ?>" class="btn btn-primary">
                  <i class="fas fa-home me-2"></i>Kembali ke Beranda
                </a>
                <a href="<?= base_url('jual') ?>" class="btn btn-outline-primary">
                  <i class="fas fa-search me-2"></i>Lihat Properti Lain
                </a>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="contact-info">
                <h6 class="mb-3">
                  <i class="fas fa-headset"></i>
                  Butuh Bantuan?
                </h6>
                <p><i class="fas fa-phone"></i><?= $contact['telepon'] ?></p>
                <p><i class="fas fa-envelope"></i><?= $contact['email'] ?></p>
                <p><i class="fas fa-clock"></i>Senin - Jumat, 09.00 - 17.00</p>

                <a href="https://wa.me/<?= $contact['whatsapp'] ?>" target="_blank" class="btn btn-success w-100 mt-3">
                  <i class="fab fa-whatsapp me-2"></i>Chat via WhatsApp
                </a>
              </div>

              <div class="mt-4">
                <h6 class="mb-3">Tips untuk Pemilik Properti</h6>
                <ul class="list-unstyled">
                  <li class="mb-2">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    Siapkan dokumen properti yang lengkap
                  </li>
                  <li class="mb-2">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    Pastikan foto properti berkualitas baik
                  </li>
                  <li class="mb-2">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    Respons cepat saat tim kami menghubungi
                  </li>
                  <li class="mb-2">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    Update harga sesuai kondisi pasar
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-lg-8">
        <h3 class="mb-3">Ingin Submit Properti Lainnya?</h3>
        <p class="text-muted mb-4">Daftarkan properti lainnya dengan mudah menggunakan form yang sama</p>
        <a href="<?= base_url('jual-rumah') ?>" class="btn btn-primary btn-lg">
          <i class="fas fa-plus me-2"></i>Submit Properti Baru
        </a>
      </div>
    </div>
  </div>
</section>