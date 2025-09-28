<style>
  :root {
    --primary-color: #1b5396;
    --secondary-color: #2c3e50;
    --light-blue: #f8f9fa;
    --text-dark: #2c3e50;
    --text-muted: #6c757d;
  }

  body {
    font-family: 'Nunito', sans-serif;
    background-color: var(--light-blue);
  }

  .navbar-brand {
    font-weight: 700;
    color: var(--primary-color) !important;
  }

  .navbar-brand i {
    color: var(--primary-color);
    margin-right: 8px;
  }

  .nav-link {
    color: var(--text-dark) !important;
    font-weight: 500;
    transition: color 0.3s ease;
  }

  .nav-link:hover {
    color: var(--primary-color) !important;
  }

  .btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
  }

  .btn-primary:hover {
    background-color: #164a7a;
    border-color: #164a7a;
  }

  .btn-outline-primary {
    color: var(--primary-color);
    border-color: var(--primary-color);
  }

  .btn-outline-primary:hover {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
  }

  .hero-section {
    background: linear-gradient(135deg, var(--primary-color) 0%, #2168bc 100%);
    color: white;
    padding: 80px 0 60px;
    text-align: center;
  }

  .hero-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
  }

  .hero-subtitle {
    font-size: 1.25rem;
    opacity: 0.9;
    margin-bottom: 3rem;
  }

  .search-section {
    background: white;
    padding: 40px 0;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
  }

  .search-form {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  }

  .form-control {
    border-radius: 10px;
    border: 2px solid #e9ecef;
    padding: 12px 15px;
    transition: all 0.3s ease;
  }

  .form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(76, 128, 174, 0.25);
  }

  .form-select {
    border-radius: 10px;
    border: 2px solid #e9ecef;
    padding: 12px 15px;
  }

  .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(76, 128, 174, 0.25);
  }

  .search-btn {
    background: linear-gradient(135deg, var(--primary-color) 0%, #2168bc 100%);
    border: none;
    border-radius: 10px;
    padding: 12px 30px;
    font-weight: 600;
    transition: all 0.3s ease;
  }

  .search-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(76, 128, 174, 0.4);
  }

  .category-filters {
    background: white;
    padding: 30px 0;
    border-bottom: 1px solid #e9ecef;
  }

  .filter-btn {
    background: transparent;
    border: 2px solid #e9ecef;
    color: var(--text-muted);
    padding: 8px 20px;
    border-radius: 25px;
    margin: 5px;
    transition: all 0.3s ease;
    font-weight: 500;
  }

  .filter-btn:hover,
  .filter-btn.active {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
  }

  .articles-section {
    padding: 60px 0;
    background: var(--light-blue);
  }

  .section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
  }

  .section-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
  }

  .section-subtitle {
    color: var(--text-muted);
    font-size: 1rem;
  }

  .article-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
    margin-bottom: 2rem;
  }

  .article-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
  }

  .article-image {
    height: 200px;
    background: linear-gradient(135deg, var(--primary-color) 0%, #2168bc 100%);
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .article-category {
    position: absolute;
    top: 15px;
    left: 15px;
    background: rgba(255, 255, 255, 0.9);
    color: var(--primary-color);
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    backdrop-filter: blur(10px);
  }

  .article-content {
    padding: 1.5rem;
  }

  .article-meta {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
    font-size: 0.8rem;
    color: var(--text-muted);
    flex-wrap: wrap;
    gap: 0.5rem;
  }

  .article-title {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 1rem;
    font-size: 1.1rem;
    line-height: 1.4;
  }

  .article-excerpt {
    color: var(--text-muted);
    font-size: 0.9rem;
    line-height: 1.6;
    margin-bottom: 1.5rem;
  }

  .article-link {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
  }

  .article-link:hover {
    color: #164a7a;
    transform: translateX(5px);
  }

  .article-link i {
    transition: transform 0.3s ease;
  }

  .article-link:hover i {
    transform: translateX(3px);
  }

  .sidebar {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    height: fit-content;
  }

  .sidebar-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid #e9ecef;
  }

  .popular-article {
    display: flex;
    align-items: center;
    padding: 1rem 0;
    border-bottom: 1px solid #f8f9fa;
  }

  .popular-article:last-child {
    border-bottom: none;
  }

  .popular-article-image {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary-color) 0%, #2168bc 100%);
    border-radius: 10px;
    margin-right: 1rem;
    flex-shrink: 0;
  }

  .popular-article-content h6 {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.25rem;
    line-height: 1.3;
  }

  .popular-article-content p {
    font-size: 0.8rem;
    color: var(--text-muted);
    margin: 0;
  }

  .pagination {
    justify-content: center;
    margin-top: 3rem;
  }

  .page-link {
    color: var(--primary-color);
    border-color: #e9ecef;
    border-radius: 10px;
    margin: 0 2px;
    padding: 10px 15px;
  }

  .page-link:hover {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
  }

  .page-item.active .page-link {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
  }

  .stats-badge {
    background: var(--primary-color);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
  }

  @media (max-width: 768px) {
    .hero-title {
      font-size: 2rem;
    }

    .search-form {
      padding: 1.5rem;
    }

    .section-header {
      flex-direction: column;
      text-align: center;
      gap: 1rem;
    }

    .filter-btn {
      margin: 2px;
      font-size: 0.9rem;
    }
  }

  .footer-mini a {
    color: #cbd5e1;
    text-decoration: none;
  }

  .footer-mini a:hover {
    text-decoration: underline;
  }
</style>

<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <h1 class="hero-title">Artikel Properti</h1>
    <p class="hero-subtitle">Tips, informasi, dan analisis terkini seputar properti dan investasi</p>
  </div>
</section>

<!-- Search Section -->
<section class="search-section">
  <div class="container">
    <div class="search-form">
      <form method="GET" action="<?= base_url('artikel/search') ?>">
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label">
              <i class="fas fa-search text-primary me-2"></i>
              Cari Artikel
            </label>
            <input type="text" class="form-control" name="search" placeholder="Kata kunci artikel..."
              value="<?= $filters['search'] ?? '' ?>">
          </div>
          <div class="col-md-3">
            <label class="form-label">
              <i class="fas fa-tag text-primary me-2"></i>
              Kategori
            </label>
            <select class="form-select" name="category">
              <option value="">Semua Kategori</option>
              <?php foreach ($categories as $category): ?>
                <option value="<?= $category['category'] ?>" <?= ($filters['category'] ?? '') == $category['category'] ? 'selected' : '' ?>>
                  <?= $category['category'] ?> (<?= $category['article_count'] ?>)
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">
              <i class="fas fa-calendar text-primary me-2"></i>
              Periode
            </label>
            <select class="form-select" name="period">
              <option value="">Semua Waktu</option>
              <option value="today" <?= ($filters['period'] ?? '') == 'today' ? 'selected' : '' ?>>Hari Ini</option>
              <option value="week" <?= ($filters['period'] ?? '') == 'week' ? 'selected' : '' ?>>Minggu Ini</option>
              <option value="month" <?= ($filters['period'] ?? '') == 'month' ? 'selected' : '' ?>>Bulan Ini</option>
              <option value="quarter" <?= ($filters['period'] ?? '') == 'quarter' ? 'selected' : '' ?>>3 Bulan Terakhir
              </option>
            </select>
          </div>
          <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn search-btn w-100">
              <i class="fas fa-search me-2"></i>
              Cari
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- Category Filters -->
<section class="category-filters">
  <div class="container">
    <div class="text-center">
      <h5 class="mb-3">Filter Kategori:</h5>
      <button class="btn filter-btn <?= empty($filters['category']) ? 'active' : '' ?>"
        onclick="filterByCategory('')">Semua</button>
      <?php foreach ($categories as $category): ?>
        <button class="btn filter-btn <?= ($filters['category'] ?? '') == $category['category'] ? 'active' : '' ?>"
          onclick="filterByCategory('<?= $category['category'] ?>')">
          <?= $category['category'] ?>
        </button>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Articles Section -->
<section class="articles-section">
  <div class="container">
    <div class="row">
      <!-- Main Content -->
      <div class="col-lg-8">
        <div class="section-header">
          <div>
            <h2 class="section-title"><?= isset($search_results) ? 'Hasil Pencarian' : 'Artikel Terbaru' ?></h2>
            <p class="section-subtitle">
              Ditemukan <span class="stats-badge"><?= count($articles) ?> artikel</span> untuk Anda
            </p>
          </div>
          <div class="d-flex align-items-center">
            <label class="me-2">Urutkan:</label>
            <select class="form-select form-select-sm" style="width: auto;" onchange="sortArticles(this.value)">
              <option value="latest" <?= ($filters['sort'] ?? 'latest') == 'latest' ? 'selected' : '' ?>>Terbaru</option>
              <option value="popular" <?= ($filters['sort'] ?? '') == 'popular' ? 'selected' : '' ?>>Terpopuler</option>
              <option value="alphabetical" <?= ($filters['sort'] ?? '') == 'alphabetical' ? 'selected' : '' ?>>A-Z</option>
              <option value="reverse_alphabetical" <?= ($filters['sort'] ?? '') == 'reverse_alphabetical' ? 'selected' : '' ?>>Z-A</option>
            </select>
          </div>
        </div>

        <!-- Article Cards -->
        <div class="row" id="articlesContainer">
          <?php if (!empty($articles)): ?>
            <?php foreach ($articles as $article): ?>
              <div class="col-md-6 mb-3">
                <div class="article-card">
                  <div class="article-image">
                    <?php if ($article['thumbnail'] && $article['thumbnail'] != 'default.jpg'): ?>
                      <img src="<?= base_url($article['thumbnail']) ?>" alt="<?= $article['title'] ?>"
                        style="width: 100%; height: 200px; object-fit: cover;">
                    <?php else: ?>
                      <div
                        style="width: 100%; height: 200px; background: linear-gradient(135deg, #4c80ae 0%, #5a8bc0 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem;">
                        <i class="fas fa-newspaper"></i>
                      </div>
                    <?php endif; ?>
                    <div class="article-category"><?= $article['category'] ?? 'Umum' ?></div>
                  </div>
                  <div class="article-content">
                    <div class="article-meta">
                      <span class="article-date">
                        <i class="fas fa-calendar-alt text-primary me-1"></i>
                        <?= date('d F Y', strtotime($article['created_at'])) ?>
                      </span>
                      <span class="article-author">
                        <i class="fas fa-user text-primary me-1"></i>
                        <?= $article['author_name'] ?? 'Admin' ?>
                      </span>
                    </div>
                    <h5 class="article-title"><?= $article['title'] ?></h5>
                    <p class="article-excerpt">
                      <?= $article['excerpt'] ?: substr(strip_tags($article['content']), 0, 150) . '...' ?>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                      <a href="<?= base_url('artikel/' . $article['slug']) ?>" class="article-link">
                        Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i>
                      </a>
                      <small class="text-muted">
                        <i class="fas fa-eye me-1"></i><?= $article['views'] ?? 0 ?>
                      </small>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          <?php else: ?>
            <div class="col-12 text-center">
              <div class="py-5">
                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">Tidak ada artikel ditemukan</h4>
                <p class="text-muted">Coba ubah kriteria pencarian Anda</p>
                <a href="<?= base_url('artikel') ?>" class="btn btn-primary">Lihat Semua Artikel</a>
              </div>
            </div>
          <?php endif; ?>
        </div>

        <?php if (!isset($search_results) && !empty($articles)): ?>
          <div class="text-center mt-4">
            <button class="btn btn-outline-primary" id="loadMoreBtn" onclick="loadMoreArticles()">
              <i class="fas fa-plus me-2"></i>Muat Lebih Banyak
            </button>
          </div>
        <?php endif; ?>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        <div class="sidebar">
          <h5 class="sidebar-title">Artikel Populer</h5>

          <?php if (!empty($popularArticles)): ?>
            <?php foreach ($popularArticles as $popularArticle): ?>
              <div class="popular-article">
                <div class="popular-article-image">
                  <?php if ($popularArticle['thumbnail'] && $popularArticle['thumbnail'] != 'default.jpg'): ?>
                    <img src="<?= base_url('public/uploads/articles/' . $popularArticle['thumbnail']) ?>"
                      alt="<?= $popularArticle['title'] ?>" style="width: 100%; height: 100%; object-fit: cover;">
                  <?php else: ?>
                    <div
                      style="width: 100%; height: 100%; background: linear-gradient(135deg, #4c80ae 0%, #5a8bc0 100%); display: flex; align-items: center; justify-content: center; color: white;">
                      <i class="fas fa-newspaper"></i>
                    </div>
                  <?php endif; ?>
                </div>
                <div class="popular-article-content">
                  <h6><a href="<?= base_url('artikel/' . $popularArticle['slug']) ?>"
                      class="text-decoration-none text-dark"><?= $popularArticle['title'] ?></a></h6>
                  <p><?= date('d F Y', strtotime($popularArticle['created_at'])) ?></p>
                  <small class="text-muted">
                    <i class="fas fa-eye me-1"></i><?= $popularArticle['views'] ?? 0 ?> views
                  </small>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="text-center py-3">
              <p class="text-muted">Belum ada artikel populer</p>
            </div>
          <?php endif; ?>
        </div>

        <div class="sidebar mt-4">
          <h5 class="sidebar-title">Kategori</h5>
          <div class="d-grid gap-2">
            <?php if (!empty($categories)): ?>
              <?php foreach ($categories as $category): ?>
                <a href="<?= base_url('artikel?category=' . urlencode($category['category'])) ?>"
                  class="btn btn-outline-primary text-start">
                  <?= $category['category'] ?> <span class="badge bg-primary ms-2"><?= $category['article_count'] ?></span>
                </a>
              <?php endforeach; ?>
            <?php else: ?>
              <div class="text-center py-3">
                <p class="text-muted">Belum ada kategori</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer konten -->
<section class="pt-5 pb-4 bg-dark text-white footer-mini">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6 col-lg-4">
        <h5 class="fw-semibold">Sampro Indonesia</h5>
        <p class="text-white-50 mb-3">Partner terpercaya untuk jual-beli dan sewa properti di seluruh Indonesia.</p>
        <div class="d-flex gap-3">
          <a href="<?= $contact['facebook'] ?>"><i class="fab fa-facebook"></i></a>
          <a href="<?= $contact['instagram'] ?>"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      <div class="col-6 col-lg-2">
        <h6 class="fw-semibold">Perusahaan</h6>
        <ul class="list-unstyled text-white-50 mb-0">
          <li><a href="#tentang">Tentang</a></li>
          <li><a href="<?= base_url('artikel') ?>">Artikel</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2">
        <h6 class="fw-semibold">Layanan</h6>
        <ul class="list-unstyled text-white-50 mb-0">
          <li><a href="<?= base_url('jual') ?>">Jual Properti</a></li>
          <li><a href="<?= base_url('sewa') ?>">Sewa Properti</a></li>
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
      <span>© <?= date('Y') ?> Perusahaan Properti. All rights reserved.</span>
      <div class="d-flex gap-3">
        <a href="<?= base_url('kebijakan') ?>">Kebijakan Privasi</a>
        <a href="<?= base_url('syarat') ?>">Syarat & Ketentuan</a>
      </div>
    </div>
  </div>
</section>

<?= $this->section('js') ?>
<script>
  let currentPage = 1;
  const limit = 6;

  // Category filter functionality
  function filterByCategory(category) {
    const form = document.querySelector('form');
    const categorySelect = form.querySelector('select[name="category"]');
    categorySelect.value = category;
    form.submit();
  }

  // Sort articles
  function sortArticles(sort) {
    const form = document.querySelector('form');
    const sortInput = document.createElement('input');
    sortInput.type = 'hidden';
    sortInput.name = 'sort';
    sortInput.value = sort;
    form.appendChild(sortInput);
    form.submit();
  }

  // Load more articles
  function loadMoreArticles() {
    currentPage++;
    const loadMoreBtn = document.getElementById('loadMoreBtn');

    if (loadMoreBtn) {
      loadMoreBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memuat...';
      loadMoreBtn.disabled = true;
    }

    // Get current filters
    const form = document.querySelector('form');
    const formData = new FormData(form);
    const params = new URLSearchParams();

    for (let [key, value] of formData.entries()) {
      if (value) params.append(key, value);
    }
    params.append('page', currentPage);

    fetch(`<?= base_url('artikel/get_ajax') ?>?${params.toString()}`)
      .then(response => response.json())
      .then(data => {
        if (data.success && data.data.length > 0) {
          const container = document.getElementById('articlesContainer');
          data.data.forEach(article => {
            const articleCard = createArticleCard(article);
            container.insertAdjacentHTML('beforeend', articleCard);
          });

          if (!data.has_more) {
            loadMoreBtn.style.display = 'none';
          } else {
            loadMoreBtn.innerHTML = '<i class="fas fa-plus me-2"></i>Muat Lebih Banyak';
            loadMoreBtn.disabled = false;
          }
        } else {
          if (loadMoreBtn) {
            loadMoreBtn.style.display = 'none';
          }
        }
      })
      .catch(error => {
        console.error('Error loading more articles:', error);
        if (loadMoreBtn) {
          loadMoreBtn.innerHTML = '<i class="fas fa-plus me-2"></i>Muat Lebih Banyak';
          loadMoreBtn.disabled = false;
        }
      });
  }

  // Create article card HTML
  function createArticleCard(article) {
    const imageUrl = article.thumbnail && article.thumbnail !== 'default.jpg'
      ? `<?= base_url('public/uploads/articles/') ?>${article.thumbnail}`
      : null;

    const imageHtml = imageUrl
      ? `<img src="${imageUrl}" alt="${article.title}" style="width: 100%; height: 200px; object-fit: cover;">`
      : `<div style="width: 100%; height: 200px; background: linear-gradient(135deg, #4c80ae 0%, #5a8bc0 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem;"><i class="fas fa-newspaper"></i></div>`;

    const excerpt = article.excerpt || article.content.substring(0, 150) + '...';
    const date = new Date(article.created_at).toLocaleDateString('id-ID', {
      day: 'numeric',
      month: 'long',
      year: 'numeric'
    });

    return `
      <div class="col-md-6">
        <div class="article-card">
          <div class="article-image">
            ${imageHtml}
            <div class="article-category">${article.category || 'Umum'}</div>
          </div>
          <div class="article-content">
            <div class="article-meta">
              <span class="article-date">
                <i class="fas fa-calendar-alt text-primary me-1"></i>
                ${date}
              </span>
              <span class="article-author">
                <i class="fas fa-user text-primary me-1"></i>
                ${article.author_name || 'Admin'}
              </span>
            </div>
            <h5 class="article-title">${article.title}</h5>
            <p class="article-excerpt">${excerpt}</p>
            <div class="d-flex justify-content-between align-items-center">
              <a href="<?= base_url('artikel/') ?>${article.slug}" class="article-link">
                Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i>
              </a>
              <small class="text-muted">
                <i class="fas fa-eye me-1"></i>${article.views || 0}
              </small>
            </div>
          </div>
        </div>
      </div>
    `;
  }

  // Category filter functionality
  document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function () {
      // Remove active class from all buttons
      document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
      // Add active class to clicked button
      this.classList.add('active');
    });
  });
</script>
<?= $this->endSection() ?>