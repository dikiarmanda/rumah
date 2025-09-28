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

  .search-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    margin: -50px 0;
    position: relative;
    z-index: 10;
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

  .category-section {
    padding: 60px 0;
    background: white;
  }

  .category-item {
    text-align: center;
    padding: 2rem 1rem;
    border-radius: 15px;
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .category-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  }

  .category-icon {
    width: 80px;
    height: 80px;
    background: var(--primary-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    color: white;
    font-size: 2rem;
  }

  .category-title {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
  }

  .category-desc {
    color: var(--text-muted);
    font-size: 0.9rem;
  }

  .projects-section {
    padding: 120px 0;
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

  .project-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
  }

  .project-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
  }

  .project-image {
    height: 200px;
    background: linear-gradient(45deg, #e9ecef, #f8f9fa);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-muted);
    font-size: 1.2rem;
    position: relative;
    overflow: hidden;
  }

  .project-badge {
    position: absolute;
    top: 15px;
    left: 15px;
  }

  .project-details {
    margin: 1rem 0;
    padding: 1rem;
    background: #f8f9fa;
    border-radius: 8px;
  }

  .project-content {
    padding: 1.5rem;
    min-height: 287px;
  }

  .project-title {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
  }

  .project-location {
    color: var(--text-muted);
    font-size: 0.9rem;
    margin-bottom: 1rem;
  }

  .project-price {
    font-weight: 700;
    color: var(--primary-color);
    font-size: 1.1rem;
  }

  .price-range {
    background: white;
    border-radius: 10px;
    padding: 1rem;
    border: 2px solid #e9ecef;
  }

  .range-slider {
    width: 100%;
    height: 6px;
    background: #e9ecef;
    border-radius: 3px;
    outline: none;
  }

  .range-slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    background: var(--primary-color);
    border-radius: 50%;
    cursor: pointer;
  }

  .range-slider::-moz-range-thumb {
    width: 20px;
    height: 20px;
    background: var(--primary-color);
    border-radius: 50%;
    cursor: pointer;
    border: none;
  }

  .price-display {
    display: flex;
    justify-content: space-between;
    margin-top: 0.5rem;
    font-size: 0.9rem;
    color: var(--text-muted);
  }

  .article-section {
    padding: 60px 0;
    background: white;
  }

  .article-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
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

  @media (max-width: 768px) {
    .hero-title {
      font-size: 2rem;
    }

    .search-card {
      margin: 0 1rem;
      padding: 1.5rem;
    }

    .section-header {
      flex-direction: column;
      text-align: center;
      gap: 1rem;
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
    <h1 class="hero-title">Temukan Properti Impian Anda</h1>
    <p class="hero-subtitle">Platform #1 untuk mencari properti di Indonesia</p>
  </div>
</section>

<!-- Search Form -->
<div class="container">
  <div class="search-card">
    <form method="GET" action="<?= base_url('cari-rumah/search') ?>">
      <div class="row g-3 align-items-start">
        <div class="col-lg-10">
          <div class="row g-3">
            <div class="col-md-4 ps-0">
              <label class="form-label">
                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                Lokasi
              </label>
              <input type="text" class="form-control" name="location" placeholder="cth., Jakarta, Bali"
                value="<?= $filters['location'] ?? '' ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label">
                <i class="fas fa-home text-primary me-2"></i>
                Tipe Properti
              </label>
              <select class="form-select" name="type">
                <option value="">Semua Tipe</option>
                <?php foreach ($categories as $category): ?>
                  <option value="<?= $category['id'] ?>" <?= ($filters['type'] ?? '') == $category['id'] ? 'selected' : '' ?>>
                    <?= $category['name'] ?> (<?= $category['property_count'] ?>)
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-4 pe-0">
              <label class="form-label">
                <i class="fas fa-bed text-primary me-2"></i>
                Kamar Tidur
              </label>
              <select class="form-select" name="bedrooms">
                <option value="">Berapapun</option>
                <option value="1" <?= ($filters['bedrooms'] ?? '') == '1' ? 'selected' : '' ?>>1</option>
                <option value="2" <?= ($filters['bedrooms'] ?? '') == '2' ? 'selected' : '' ?>>2</option>
                <option value="3" <?= ($filters['bedrooms'] ?? '') == '3' ? 'selected' : '' ?>>3</option>
                <option value="4+" <?= ($filters['bedrooms'] ?? '') == '4+' ? 'selected' : '' ?>>4+</option>
              </select>
            </div>
            <div class="col-md-12">
              <label class="form-label">
                <i class="fas fa-money-bill text-primary me-2"></i>
                Rentang Harga
              </label>
              <div class="row price-range align-items-center">
                <div class="col">
                  <label for="min_price" class="form-label">Harga Minimum</label>
                  <input type="number" class="form-control" id="min_price" name="min_price" placeholder="min"
                    value="<?= $filters['min_price'] ?? '' ?>">
                </div>
                <div class="col-auto pt-4">s/d</div>
                <div class="col">
                  <label for="max_price" class="form-label">Harga Maksimum</label>
                  <input type="number" class="form-control" id="max_price" name="max_price" placeholder="max"
                    value="<?= $filters['max_price'] ?? '' ?>">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-2">
          <button type="submit" class="btn btn-primary btn-icon-text w-100" style="margin-top: 2.3rem;">
            <i class="fas fa-search btn-icon-prepand"></i> Cari
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- New Projects Section -->
<section class="projects-section">
  <div class="container">
    <div class="section-header">
      <div>
        <h2 class="section-title"><?= isset($search_results) ? 'Hasil Pencarian' : 'Proyek Terpopuler' ?></h2>
        <p class="section-subtitle">
          <?= isset($search_results) ? 'Ditemukan ' . count($properties) . ' properti sesuai kriteria Anda' : 'Rekomendasi terbaik untuk Anda. Dapatkan informasi proyek terkini.' ?>
        </p>
      </div>
      <?php if (!isset($search_results)): ?>
        <a href="<?= base_url('cari-rumah/search') ?>" class="btn btn-dark">Lihat Semua</a>
      <?php endif; ?>
    </div>

    <div class="row g-4" id="propertiesContainer">
      <?php if (!empty($properties)): ?>
        <?php foreach ($properties as $property): ?>
          <div class="col-lg-4 col-md-6">
            <div class="project-card">
              <div class="project-image">
                <?php if ($property['primary_image'] && $property['primary_image'] != 'default.jpg'): ?>
                  <img src="<?= base_url($property['primary_image']) ?>" alt="<?= $property['title'] ?>"
                    style="width: 100%; height: 250px; object-fit: cover;">
                <?php else: ?>
                  <div
                    style="width: 100%; height: 250px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem;">
                    <i class="fas fa-home"></i>
                  </div>
                <?php endif; ?>
                <div class="project-badge w-100">
                  <span class="badge bg-primary"><?= $property['kategori'] ?></span>
                </div>
              </div>
              <div class="project-content">
                <h5 class="project-title"><?= $property['title'] ?>
                  <?php if ($property['favorite'] == 1): ?>
                    <i class="fas fa-star text-warning"></i>
                  <?php endif ?>
                </h5>
                <p class="project-location">
                  <i class="fas fa-map-marker-alt text-primary me-1"></i>
                  <?= $property['city'] . ', ' . $property['province'] ?>
                </p>
                <div class="project-details">
                  <div class="row text-center">
                    <div class="col-4">
                      <small class="text-muted">Kamar Tidur</small>
                      <div><i class="fas fa-bed text-primary"></i> <?= $property['bedrooms'] ?></div>
                    </div>
                    <div class="col-4">
                      <small class="text-muted">Kamar Mandi</small>
                      <div><i class="fas fa-bath text-primary"></i> <?= $property['bathrooms'] ?></div>
                    </div>
                    <div class="col-4">
                      <small class="text-muted">Luas Tanah</small>
                      <div><i class="fas fa-expand-arrows-alt text-primary"></i> <?= round($property['land_area']) ?> m²
                      </div>
                    </div>
                  </div>
                </div>
                <p class="project-price">Rp <?= number_format($property['price'], 0, ',', '.') ?></p>
                <a href="<?= base_url('cari-rumah/detail/' . $property['id']) ?>" class="btn btn-outline-primary btn-sm w-100">
                  Lihat Detail
                </a>
              </div>
            </div>
          </div>
        <?php endforeach ?>
        <?php if (isset($search_results) && !empty($properties)): ?>
          <!-- Pagination -->
          <nav aria-label="Property pagination">
            <ul class="pagination">
              <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                <a class="page-link"
                  href="<?= base_url('cari-rumah/get_ajax') . (($page - 1) > 0 ? '?page=' . ($page - 1) : '') ?>"
                  tabindex="-1">Previous</a>
              </li>
              <?php for ($i = 1; $i <= ceil(count($properties) / 12); $i++): ?>
                <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                  <a class="page-link" href="<?= base_url('cari-rumah/get_ajax') . ($i > 1 ? '?page=' . $i : '') ?>"><?= $i ?></a>
                </li>
              <?php endfor ?>
              <li class="page-item <?= $page == ceil(count($properties) / 12) ? 'disabled' : '' ?>">
                <a class="page-link"
                  href="<?= base_url('cari-rumah/get_ajax') . (($page + 1) > ceil(count($properties) / 12) ? '' : '?page=' . ($page + 1)) ?>">Next</a>
              </li>
            </ul>
          </nav>
        <?php endif ?>
      <?php else: ?>
        <div class="col-12 text-center">
          <div class="py-5">
            <i class="fas fa-search fa-3x text-muted mb-3"></i>
            <h4 class="text-muted">Tidak ada properti ditemukan</h4>
            <p class="text-muted">Coba ubah kriteria pencarian Anda</p>
            <a href="<?= base_url('cari-rumah') ?>" class="btn btn-primary">Lihat Semua Properti</a>
          </div>
        </div>
      <?php endif ?>
    </div>

    <?php if (!isset($search_results) && !empty($properties)): ?>
      <div class="text-center mt-4">
        <button class="btn btn-outline-primary" id="loadMoreBtn" onclick="loadMoreProperties()">
          <i class="fas fa-plus me-2"></i>Muat Lebih Banyak
        </button>
      </div>
    <?php endif ?>
  </div>
</section>

<!-- Article Section -->
<section class="article-section">
  <div class="container">
    <div class="section-header">
      <div>
        <h2 class="section-title">Artikel Terbaru</h2>
        <p class="section-subtitle">Tips dan informasi terkini seputar properti dan investasi</p>
      </div>
      <a href="<?= base_url('artikel') ?>" class="btn btn-dark">Lihat Semua Artikel</a>
    </div>

    <div class="row g-4">
      <?php if (!empty($articles)): ?>
        <?php foreach ($articles as $article): ?>
          <div class="col-md-4 mb-3">
            <div class="article-card">
              <div class="article-image">
                <?php if ($article['thumbnail'] && $article['thumbnail'] != 'default.jpg'): ?>
                  <img src="<?= base_url($article['thumbnail']) ?>" alt="<?= $article['title'] ?>"
                    style="width: 100%; height: 200px; object-fit: cover;">
                <?php else: ?>
                  <div
                    style="width: 100%; height: 200px; background: linear-gradient(135deg, #4c80ae 0%, #2168bc 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem;">
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
      <?php endif ?>
    </div>
  </div>
</section>

<!-- Footer konten -->
<?= $this->include('footer-mini') ?>

<?= $this->section('js') ?>
<script>
  let currentPage = 1;
  const limit = 6;

  // Price range slider functionality
  const rangeSlider = document.querySelector('.range-slider');
  const priceDisplay = document.querySelector('.price-display');
  const maxPriceDisplay = document.getElementById('maxPriceDisplay');

  if (rangeSlider) {
    rangeSlider.addEventListener('input', function () {
      const value = this.value;
      const formattedValue = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
      }).format(value);

      if (priceDisplay) {
        priceDisplay.querySelector('span:last-child').textContent = formattedValue;
      }
    });

    // Initialize price display
    rangeSlider.dispatchEvent(new Event('input'));
  }

  // Filter by category
  function filterByCategory(categoryId) {
    const form = document.querySelector('form');
    const typeSelect = form.querySelector('select[name="type"]');
    typeSelect.value = categoryId;
    form.submit();
  }

  // Load more properties
  function loadMoreProperties() {
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

    fetch(`<?= base_url('cari-rumah/get_ajax') ?>?${params.toString()}`)
      .then(response => response.json())
      .then(data => {
        if (data.success && data.data.length > 0) {
          const container = document.getElementById('propertiesContainer');
          data.data.forEach(property => {
            const propertyCard = createPropertyCard(property);
            container.insertAdjacentHTML('beforeend', propertyCard);
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
        console.error('Error loading more properties:', error);
        if (loadMoreBtn) {
          loadMoreBtn.innerHTML = '<i class="fas fa-plus me-2"></i>Muat Lebih Banyak';
          loadMoreBtn.disabled = false;
        }
      });
  }

  // Create property card HTML
  function createPropertyCard(property) {
    const imageUrl = property.primary_image && property.primary_image !== 'default.jpg'
      ? `<?= base_url('public/uploads/properties/') ?>${property.primary_image}`
      : null;

    const imageHtml = imageUrl
      ? `<img src="${imageUrl}" alt="${property.title}" style="width: 100%; height: 250px; object-fit: cover;">`
      : `<div style="width: 100%; height: 250px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem;"><i class="fas fa-home"></i></div>`;

    return `
      <div class="col-lg-4 col-md-6">
        <div class="project-card">
          <div class="project-image">
            ${imageHtml}
            <div class="project-badge">
              <span class="badge bg-primary">${property.kategori}</span>
            </div>
          </div>
          <div class="project-content">
            <h5 class="project-title">${property.title}</h5>
            <p class="project-location">
              <i class="fas fa-map-marker-alt text-primary me-1"></i>
              ${property.city}, ${property.province}
            </p>
            <div class="project-details">
              <div class="row text-center">
                <div class="col-4">
                  <small class="text-muted">Kamar Tidur</small>
                  <div><i class="fas fa-bed text-primary"></i> ${property.bedrooms}</div>
                </div>
                <div class="col-4">
                  <small class="text-muted">Kamar Mandi</small>
                  <div><i class="fas fa-bath text-primary"></i> ${property.bathrooms}</div>
                </div>
                <div class="col-4">
                  <small class="text-muted">Luas Tanah</small>
                  <div><i class="fas fa-expand-arrows-alt text-primary"></i> ${property.land_area} m²</div>
                </div>
              </div>
            </div>
            <p class="project-price">Rp ${new Intl.NumberFormat('id-ID').format(property.price)}</p>
            <a href="<?= base_url('cari-rumah/detail/') ?>${property.id}" class="btn btn-outline-primary btn-sm w-100">
              Lihat Detail
            </a>
          </div>
        </div>
      </div>
    `;
  }
</script>
<?= $this->endSection() ?>