<section class="pt-5 pb-4 bg-dark text-white footer-mini">
  <div class="container">
    <div class="row g-4">
      <div class="col-6 col-lg-2">
        <img src="<?= base_url('public/favicon-light.png') ?>" height="150px">
      </div>
      <div class="col-md-6 col-lg-4">
        <h5 class="fw-semibold">Sampro Indonesia</h5>
        <p class="text-white-50 mb-3">Partner terpercaya untuk jual-beli dan sewa properti di seluruh Indonesia.</p>
        <div class="d-flex gap-3">
          <a href="<?= $contact['facebook'] ?>"><i class="fab fa-facebook"></i></a>
          <a href="<?= $contact['instagram'] ?>"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      <div class="col-6 col-lg-2">
        <ul class="list-unstyled text-white-50 mb-0">
          <li><a href="<?= base_url('cari-rumah') ?>">Cari Rumah</a></li>
          <li><a href="<?= base_url('jual-rumah') ?>">Jual Rumah</a></li>
          <li><a href="<?= base_url('sewa') ?>">Sewa Rumah</a></li>
          <li><a href="#tentang">Tentang</a></li>
          <li><a href="<?= base_url('artikel') ?>">Artikel</a></li>
        </ul>
      </div>
      <div class="col-lg-4">
        <h6 class="fw-semibold">Kontak Cepat</h6>
        <ul class="list-unstyled text-white-50 mb-3">
          <li class="mb-1"><i class="fas fa-phone me-2 text-primary"></i><?= $contact['telepon'] ?></li>
          <li class="mb-1"><i class="fas fa-envelope me-2 text-primary"></i><?= $contact['email'] ?></li>
          <li><i class="fas fa-clock me-2 text-primary"></i>Senin - Jumat, 09.00 - 17.00</li>
        </ul>
        <a href="wa.me/<?= $contact['whatsapp'] ?>" target="_blank" rel="noopener" class="btn btn-primary w-100">
          <i class="fab fa-whatsapp me-2"></i>Chat via WhatsApp
        </a>
      </div>
    </div>
    <hr class="border-secondary my-4">
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center text-white-50 small">
      <span>© <?= date('Y') ?> Sampro Indonesia. All rights reserved.</span>
      <div class="d-flex gap-3">
        <a href="<?= base_url('kebijakan') ?>">Kebijakan Privasi</a>
        <a href="<?= base_url('syarat') ?>">Syarat & Ketentuan</a>
      </div>
    </div>
  </div>
</section>