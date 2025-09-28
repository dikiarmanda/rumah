<style>
  .hero-section {
    background: linear-gradient(135deg, #1b5396 0%, #2168bc 100%);
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

  .agent-card {
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background-color: #fff;
  }

  .agent-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  }

  .agent-card .card-header {
    background-color: #1b5396;
    color: white;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    padding: 1rem;
    text-align: center;
  }

  .agent-card .card-title {
    font-weight: 700;
    color: #333;
  }

  .agent-card .card-body {
    padding: 1.5rem;
  }

  .agent-card .location {
    color: #6c757d;
    margin-bottom: 1rem;
  }

  .agent-stats {
    display: flex;
    justify-content: space-around;
    margin-bottom: 1.5rem;
    padding: 1rem;
    background-color: #f8f9fa;
    border-radius: 8px;
  }

  .agent-stats .stat {
    text-align: center;
    font-size: 0.9rem;
    color: #555;
  }

  .agent-stats .stat .value {
    display: block;
    font-weight: 700;
    font-size: 1.2rem;
    color: #1b5396;
  }

  .btn-whatsapp {
    background-color: #25D366;
    border-color: #25D366;
    color: white;
    font-weight: 600;
    width: 100%;
    padding: 0.75rem;
  }

  .btn-whatsapp:hover {
    background-color: #1EAE54;
    border-color: #1EAE54;
    color: white;
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
    <h1 class="hero-title">Agen Properti Kami</h1>
    <p class="hero-subtitle">Temukan agen properti profesional yang siap membantu Anda.</p>
  </div>
</section>

<div class="container my-5">
  <div class="row">
    <?php foreach ($data as $agent): ?>
      <?php
      // Handle inconsistent capitalization for sales and rental counts
      $sold = isset($agent['terjual']) ? $agent['terjual'] : (isset($agent['Terjual']) ? $agent['Terjual'] : 0);
      $rented = isset($agent['tersewakan']) ? $agent['tersewakan'] : (isset($agent['Tersewakan']) ? $agent['Tersewakan'] : 0);
      ?>
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card agent-card shadow-sm">
          <div class="card-body text-center">
            <img src="<?= base_url($agent['photo']) ?>" class="card-img-top agent-image" alt="<?= esc($agent['name']) ?>"
              style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
            <h5 class="card-title"><?= esc($agent['name']) ?></h5>
            <p class="location"><i class="fas fa-map-marker-alt me-2"></i><?= esc($agent['location']) ?></p>

            <div class="agent-stats">
              <div class="stat">
                <span class="value"><?= esc($sold) ?></span>
                <span>Terjual</span>
              </div>
              <div class="stat">
                <span class="value"><?= esc($rented) ?></span>
                <span>Tersewa</span>
              </div>
            </div>

            <a href="https://wa.me/<?= esc($agent['phone']) ?>" target="_blank" class="btn btn-whatsapp">
              <i class="fab fa-whatsapp me-2"></i> Hubungi WhatsApp
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Footer konten -->
<?= $this->include('footer-mini') ?>