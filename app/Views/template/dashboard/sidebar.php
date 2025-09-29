<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('dashboard') ?>" data-page="dashboard">
        <i class="fa-solid fa-gauge-high menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <?php if (session('role') != 'agen'): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard/laporan') ?>" data-page="laporan">
          <i class="fa-solid fa-chart-line menu-icon"></i>
          <span class="menu-title">Laporan</span>
        </a>
      </li>
    <?php endif ?>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('dashboard/properti') ?>" data-page="properti">
        <i class="fa-solid fa-building menu-icon"></i>
        <span class="menu-title">Properti</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('dashboard/transaksi') ?>" data-page="transaksi">
        <i class="fa-solid fa-file-invoice-dollar menu-icon"></i>
        <span class="menu-title">Transaksi</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('dashboard/artikel') ?>" data-page="artikel">
        <i class="fa-solid fa-newspaper menu-icon"></i>
        <span class="menu-title">Artikel</span>
      </a>
    </li>
    <?php if (session('role') != 'agen'): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard/kategori') ?>" data-page="kategori">
          <i class="fa-solid fa-home menu-icon"></i>
          <span class="menu-title">Kategori</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard/leaderboard') ?>" data-page="leaderboard">
          <i class="fa-solid fa-trophy menu-icon"></i>
          <span class="menu-title">Leaderboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard/user') ?>" data-page="user">
          <i class="fa-solid fa-users menu-icon"></i>
          <span class="menu-title">Agen</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard/kontak') ?>" data-page="kontak">
          <i class="fa-solid fa-phone menu-icon"></i>
          <span class="menu-title">Kontak</span>
        </a>
      </li>
    <?php endif ?>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('dashboard/setting') ?>" data-page="setting">
        <i class="fa-solid fa-gear menu-icon"></i>
        <span class="menu-title">Setting</span>
      </a>
    </li>
  </ul>
</nav>