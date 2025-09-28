<div class="container">
  <div class="row justify-content-end py-1 fw-semibold">
    <div class="col-auto me-3">
      <a href="#tentang" class="text-decoration-none">Tentang Sampro</a>
    </div>
    <div class="col-auto me-3">
      <a href="<?= base_url('artikel') ?>" class="text-decoration-none">Artikel</a>
    </div>
    <div class="col-auto">
      <a href="#kontak" class="text-decoration-none">Kontak</a>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg bg-body-tertiary shadow sticky-top">
  <div class="container">
    <a class="navbar-brand fw-semibold" href="<?= base_url() ?>">
      <img src="<?= base_url('public/favicon.png') ?>" height="30px"> Sampro Indonesia
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav fw-medium me-auto mb-2 mb-lg-0" id="navbar-menu">
        <li class="nav-item me-2">
          <a class="nav-link" href="<?= base_url('cari-rumah') ?>">Cari Rumah</a>
        </li>
        <li class="nav-item me-2">
          <a class="nav-link" href="<?= base_url('jual-rumah') ?>">Jual Rumah</a>
        </li>
        <li class="nav-item me-2">
          <a class="nav-link" href="<?= base_url('agen') ?>">Agent</a>
        </li>
        <li class="nav-item me-2">
          <a class="nav-link" href="<?= base_url('sewa') ?>">Sewa</a>
        </li>
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <?php if (session('isLoggedIn')): ?>
            <a class="btn btn-primary" href="<?= base_url('dashboard') ?>">Dashboard</a>
          <?php else: ?>
            <a class="btn btn-primary" href="<?= base_url('login') ?>">Masuk</a>
          <?php endif ?>
        </li>
      </ul>
    </div>
  </div>
</nav>