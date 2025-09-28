<style>
  .article-container {
    font-family: 'Nunito', sans-serif;
  }

  .article-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: #333;
  }

  .article-meta {
    font-size: 0.9rem;
  }

  .article-meta .author-name {
    font-weight: 700;
    color: #1b5396;
  }

  .article-meta .separator {
    margin: 0 0.5rem;
  }

  .article-thumbnail-placeholder {
    background-color: #f0f2f5;
    height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    color: #a0a0a0;
    font-size: 1.2rem;
  }

  .article-content {
    line-height: 1.8;
    font-size: 1.1rem;
    color: #444;
  }

  .breadcrumb-item a {
    color: #1b5396;
    text-decoration: none;
  }

  .breadcrumb-item.active {
    color: #6c757d;
  }

  .category-badge {
    background-color: #1b5396 !important;
    font-size: 0.8rem;
    padding: 0.4em 0.7em;
  }
</style>

<div class="container my-5 article-container">
  <div class="row justify-content-center">
    <div class="col-lg-8">

      <!-- Breadcrumb Navigation -->
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url('artikel') ?>">Artikel</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?= esc($article['title']) ?></li>
        </ol>
      </nav>

      <!-- Article Header -->
      <header class="mb-4">
        <h1 class="article-title mb-3"><?= esc($article['title']) ?></h1>
        <div class="article-meta d-flex flex-wrap align-items-center text-muted">
          <span>Oleh <a href="#" class="author-name"><?= esc($article['author_name']) ?></a></span>
          <span class="separator">•</span>
          <span><?= date('d F Y', strtotime($article['created_at'])) ?></span>
          <span class="separator">•</span>
          <span class="badge category-badge"><?= esc($article['category']) ?></span>
          <span class="separator">•</span>
          <span><i class="fas fa-eye me-1"></i> <?= esc($article['views']) ?></span>
        </div>
      </header>

      <!-- Article Thumbnail -->
      <div class="mb-4">
        <?php if (!empty($article['thumbnail'])): ?>
          <img src="<?= base_url(esc($article['thumbnail'])) ?>" class="img-fluid rounded shadow-sm" alt="<?= esc($article['title']) ?>">
        <?php else: ?>
          <div class="article-thumbnail-placeholder">
            <span>Thumbnail tidak tersedia</span>
          </div>
        <?php endif; ?>
      </div>

      <!-- Article Content -->
      <article class="article-content">
        <p><?= nl2br(esc($article['content'])) ?></p>
      </article>

    </div>
  </div>
</div>
