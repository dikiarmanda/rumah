<style>
  .hero-section {
    background: linear-gradient(135deg, #1b5396 0%, #164a7a 100%);
    color: #fff;
    padding: 60px 0;
    border-radius: 0 0 24px 24px;
  }

  .form-section {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    margin-top: -40px;
    position: relative;
    z-index: 10;
  }

  .step-indicator {
    display: flex;
    justify-content: center;
    margin-bottom: 2rem;
  }

  .step {
    display: flex;
    align-items: center;
    margin: 0 1rem;
  }

  .step-number {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #e2e8f0;
    color: #64748b;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    margin-right: 0.5rem;
  }

  .step.active .step-number {
    background: #1b5396;
    color: #fff;
  }

  .step.completed .step-number {
    background: #10b981;
    color: #fff;
  }

  .form-group {
    margin-bottom: 1.5rem;
  }

  .form-label {
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.5rem;
  }

  .required {
    color: #ef4444;
  }

  .form-control,
  .form-select {
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    transition: all 0.2s;
  }

  .form-control:focus,
  .form-select:focus {
    border-color: #1b5396;
    box-shadow: 0 0 0 3px rgba(76, 128, 174, 0.1);
  }

  .facility-checkbox {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 0.75rem;
    margin-top: 0.5rem;
  }

  .facility-item {
    display: flex;
    align-items: center;
    padding: 0.75rem;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.2s;
  }

  .facility-item:hover {
    border-color: #1b5396;
    background: #f8fafc;
  }

  .facility-item input[type="checkbox"] {
    margin-right: 0.5rem;
  }

  .image-upload-area {
    border: 2px dashed #d1d5db;
    border-radius: 8px;
    padding: 2rem;
    text-align: center;
    background: #f9fafb;
    transition: all 0.2s;
  }

  .image-upload-area:hover {
    border-color: #1b5396;
    background: #f0f9ff;
  }

  .image-preview {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    gap: 1rem;
    margin-top: 1rem;
  }

  .preview-item {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
  }

  .preview-item img {
    width: 100%;
    height: 120px;
    object-fit: cover;
  }

  .remove-image {
    position: absolute;
    top: 0.5rem;
    right: 0.5rem;
    background: #ef4444;
    color: #fff;
    border: none;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
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

  .section-title {
    font-weight: 700;
    color: #1f2937;
  }

  .section-subtitle {
    color: #6b7280;
  }

  .help-text {
    font-size: 0.875rem;
    color: #6b7280;
    margin-top: 0.25rem;
  }

  .currency-input {
    position: relative;
  }

  .currency-input::before {
    content: 'Rp';
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #6b7280;
    font-weight: 600;
  }

  .currency-input input {
    padding-left: 3rem;
  }

  .select2 {
    border: 2px solid #e5e7eb !important;
    border-radius: 8px !important;
    padding: 0.75rem 1rem !important;
    font-size: 1rem !important;
    transition: all 0.2s !important;
  }

  .select2-selection.select2-selection--single {
    border: none !important;
  }

  @media (max-width: 768px) {
    .hero-section {
      padding: 40px 0;
    }

    .step-indicator {
      flex-direction: column;
      gap: 1rem;
    }

    .step {
      margin: 0;
    }
  }
</style>

<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-lg-8">
        <h1 class="display-5 fw-bold mb-3">Tawarkan Properti Anda</h1>
        <p class="lead mb-4">Daftarkan properti Anda dengan mudah dan aman. Tim profesional kami akan membantu
          memverifikasi dan mempublikasikan properti Anda.</p>
        <div class="d-flex justify-content-center gap-3">
          <div class="d-flex align-items-center">
            <i class="fas fa-shield-alt me-2"></i>
            <span>Aman & Terpercaya</span>
          </div>
          <div class="d-flex align-items-center">
            <i class="fas fa-clock me-2"></i>
            <span>Verifikasi Cepat</span>
          </div>
          <div class="d-flex align-items-center">
            <i class="fas fa-headset me-2"></i>
            <span>Dukungan 24/7</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Form Section -->
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="form-section p-4 p-lg-5">
          <!-- Step Indicator -->
          <div class="step-indicator">
            <div class="step active">
              <div class="step-number">1</div>
              <span>Informasi Dasar</span>
            </div>
            <div class="step">
              <div class="step-number">2</div>
              <span>Detail Properti</span>
            </div>
            <div class="step">
              <div class="step-number">3</div>
              <span>Kontak & Gambar</span>
            </div>
          </div>

          <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?= session()->getFlashdata('error') ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
          <?php endif; ?>

          <form action="<?= base_url('jual-rumah/submit') ?>" method="post" enctype="multipart/form-data"
            id="propertyForm">
            <?= csrf_field() ?>

            <!-- Step 1: Informasi Dasar -->
            <div class="form-step" id="step1">
              <h3 class="section-title mb-4">Informasi Dasar Properti</h3>

              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="title" class="form-label">Judul Iklan Properti <span class="required">*</span></label>
                    <input type="text" id="title" name="title"
                      class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : '' ?>"
                      value="<?= old('title') ?>" placeholder="Contoh: Rumah Mewah 2 Lantai di Jakarta Utara" required>
                    <div class="invalid-feedback"><?= $validation->getError('title') ?></div>
                    <div class="help-text">Buat judul yang menarik dan deskriptif untuk menarik perhatian calon pembeli.
                      Contoh: "Rumah Mewah 2 Lantai di Jakarta Utara"</div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <input type="hidden" name="tipe" id="tipe" value="<?= $categories[0]['name'] ?>">
                    <label for="type" class="form-label">Tipe Properti <span class="required">*</span></label>
                    <select id="type" name="type"
                      class="form-select <?= ($validation->hasError('type')) ? 'is-invalid' : '' ?>" required>
                      <option value="">Pilih Tipe Properti</option>
                      <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>" <?= (old('type') == $category['id']) ? 'selected' : '' ?>>
                          <?= $category['name'] ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback"><?= $validation->getError('type') ?></div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="status" class="form-label">Status Properti <span class="required">*</span></label>
                    <select id="status" name="status"
                      class="form-select <?= ($validation->hasError('status')) ? 'is-invalid' : '' ?>" required>
                      <option value="">Pilih Status</option>
                      <option value="dijual" <?= (old('status') == 'dijual') ? 'selected' : '' ?>>Dijual</option>
                      <option value="disewakan" <?= (old('status') == 'disewakan') ? 'selected' : '' ?>>Disewakan</option>
                    </select>
                    <div class="invalid-feedback"><?= $validation->getError('status') ?></div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="price" class="form-label">Harga <span class="required">*</span></label>
                    <div class="currency-input">
                      <input type="text" id="price" name="price" class="form-control" value="<?= old('price') ?>"
                        placeholder="2.000.000.000" required>
                    </div>
                    <div class="help-text">Masukkan harga dalam Rupiah (tanpa titik atau koma)</div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="certificate" class="form-label">Sertifikat <span class="required">*</span></label>
                    <select id="certificate" name="certificate"
                      class="form-select <?= ($validation->hasError('certificate')) ? 'is-invalid' : '' ?>" required>
                      <option value="">Pilih Jenis Sertifikat</option>
                      <option value="SHM" <?= (old('certificate') == 'SHM') ? 'selected' : '' ?>>SHM (Sertifikat Hak Milik)
                      </option>
                      <option value="HGB" <?= (old('certificate') == 'HGB') ? 'selected' : '' ?>>HGB (Hak Guna Bangunan)
                      </option>
                      <option value="HGU" <?= (old('certificate') == 'HGU') ? 'selected' : '' ?>>HGU (Hak Guna Usaha)
                      </option>
                      <option value="AJB" <?= (old('certificate') == 'AJB') ? 'selected' : '' ?>>AJB (Akta Jual Beli)
                      </option>
                      <option value="Surat Keterangan" <?= (old('certificate') == 'Surat Keterangan') ? 'selected' : '' ?>>
                        Surat Keterangan</option>
                      <option value="SHGB" <?= (old('certificate') == 'SHGB') ? 'selected' : '' ?>>SHGB (Sertifikat Hak
                        Guna Bangunan)</option>
                      <option value="SHSRS" <?= (old('certificate') == 'SHSRS') ? 'selected' : '' ?>>SHSRS (Sertifikat Hak
                        Satuan Rumah Susun)</option>
                      <option value="HP" <?= (old('certificate') == 'HP') ? 'selected' : '' ?>>HP (Hak Pakai)</option>
                      <option value="Girik" <?= (old('certificate') == 'Girik') ? 'selected' : '' ?>>Girik / Letter C
                      </option>
                      <option value="Lainnya" <?= (old('certificate') == 'Lainnya') ? 'selected' : '' ?>>Lainnya</option>
                    </select>
                    <div class="invalid-feedback"><?= $validation->getError('certificate') ?></div>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group">
                    <label for="description" class="form-label">Deskripsi Properti <span
                        class="required">*</span></label>
                    <textarea id="description" name="description"
                      class="form-control <?= ($validation->hasError('description')) ? 'is-invalid' : '' ?>" rows="4"
                      placeholder="Deskripsikan properti Anda secara detail..."
                      required><?= old('description') ?></textarea>
                    <div class="invalid-feedback"><?= $validation->getError('description') ?></div>
                    <div class="help-text">Minimal 20 karakter. Jelaskan keunggulan dan kondisi properti secara detail.
                      Contoh: "Rumah dengan desain modern, 3 kamar tidur, 2 kamar mandi, garasi untuk 2 mobil, dekat
                      dengan sekolah dan pusat perbelanjaan."</div>
                  </div>
                </div>
              </div>

              <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary" onclick="nextStep(2)">Lanjut ke Detail Properti <i
                    class="fas fa-arrow-right ms-2"></i></button>
              </div>
            </div>

            <!-- Step 2: Detail Properti -->
            <div class="form-step d-none" id="step2">
              <h3 class="section-title mb-4">Detail Properti</h3>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="address" class="form-label">Alamat Lengkap <span class="required">*</span></label>
                    <input type="text" id="address" name="address"
                      class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : '' ?>"
                      value="<?= old('address') ?>" placeholder="Jl. Jend. Sudirman No. 20, Jakarta Selatan" required>
                    <div class="invalid-feedback"><?= $validation->getError('address') ?></div>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <input type="hidden" name="province" id="province" value="">
                    <label for="provinsi" class="form-label">Provinsi <span class="required">*</span></label>
                    <select class="form-select multi-select" name="provinsi" id="provinsi">
                      <option value="">--Pilih Provinsi--</option>
                      <?php foreach ($provinsi as $p): ?>
                        <option value="<?= $p['kode'] ?>" <?= (old('provinsi') == $p['kode']) ? 'selected' : '' ?>>
                          <?= $p['name'] ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback">
                      <?= $validation?->getError('provinsi') ?>
                    </div>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="city" class="form-label">Kota <span class="required">*</span></label>
                    <select class="form-select multi-select" name="city" id="city">
                      <option value="">--Pilih Kabupaten/Kota--</option>
                    </select>
                    <div class="invalid-feedback">
                      <?= $validation?->getError('city') ?>
                    </div>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="bedrooms" class="form-label">Kamar Tidur</label>
                    <input type="number" id="bedrooms" name="bedrooms" class="form-control"
                      value="<?= old('bedrooms', 1) ?>" min="0" max="20">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="bathrooms" class="form-label">Kamar Mandi</label>
                    <input type="number" id="bathrooms" name="bathrooms" class="form-control"
                      value="<?= old('bathrooms', 1) ?>" min="0" max="20">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="carport" class="form-label">Carport/Garasi</label>
                    <input type="number" id="carport" name="carport" class="form-control"
                      value="<?= old('carport', 1) ?>" min="0" max="10">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="floors" class="form-label">Jumlah Lantai</label>
                    <input type="number" id="floors" name="floors" class="form-control" value="<?= old('floors', 1) ?>"
                      min="1" max="10">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="building_area" class="form-label">Luas Bangunan (m²)</label>
                    <input type="number" id="building_area" name="building_area" class="form-control"
                      value="<?= old('building_area') ?>" min="0">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="land_area" class="form-label">Luas Tanah (m²)</label>
                    <input type="number" id="land_area" name="land_area" class="form-control"
                      value="<?= old('land_area') ?>" min="0">
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group">
                    <label class="form-label">Fasilitas</label>
                    <div class="facility-checkbox">
                      <?php foreach ($facilities as $facility): ?>
                        <div class="facility-item">
                          <input type="checkbox" id="facility_<?= $facility['id'] ?>" name="facilities[]"
                            value="<?= $facility['id'] ?>">
                          <label for="facility_<?= $facility['id'] ?>" class="mb-0"><?= $facility['name'] ?></label>
                        </div>
                      <?php endforeach; ?>
                    </div>
                    <div class="help-text">Pilih fasilitas yang tersedia di properti Anda</div>
                  </div>
                </div>
              </div>

              <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-outline-primary" onclick="prevStep(1)">
                  <i class="fas fa-arrow-left me-2"></i>Kembali
                </button>
                <button type="button" class="btn btn-primary" onclick="nextStep(3)">
                  Lanjut ke Kontak & Gambar <i class="fas fa-arrow-right ms-2"></i>
                </button>
              </div>
            </div>

            <!-- Step 3: Kontak & Gambar -->
            <div class="form-step d-none" id="step3">
              <h3 class="section-title mb-4">Informasi Kontak & Gambar</h3>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="owner_name" class="form-label">Nama Pemilik <span class="required">*</span></label>
                    <input type="text" id="owner_name" name="owner_name"
                      class="form-control <?= ($validation->hasError('owner_name')) ? 'is-invalid' : '' ?>"
                      value="<?= old('owner_name') ?>" placeholder="Nama lengkap" required>
                    <div class="invalid-feedback"><?= $validation->getError('owner_name') ?></div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="owner_phone" class="form-label">No. Telepon <span class="required">*</span></label>
                    <input type="text" id="owner_phone" name="owner_phone"
                      class="form-control <?= ($validation->hasError('owner_phone')) ? 'is-invalid' : '' ?>"
                      value="<?= old('owner_phone') ?>" placeholder="08xxxxxxxxxx" required>
                    <div class="invalid-feedback"><?= $validation->getError('owner_phone') ?></div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="owner_email" class="form-label">Email <span class="required">*</span></label>
                    <input type="email" id="owner_email" name="owner_email"
                      class="form-control <?= ($validation->hasError('owner_email')) ? 'is-invalid' : '' ?>"
                      value="<?= old('owner_email') ?>" placeholder="nama@email.com" required>
                    <div class="invalid-feedback"><?= $validation->getError('owner_email') ?></div>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group">
                    <label class="form-label">Foto Properti</label>
                    <div class="image-upload-area" onclick="document.getElementById('images').click()">
                      <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                      <h5>Upload Foto Properti</h5>
                      <p class="text-muted mb-0">Klik untuk memilih foto</p>
                      <small class="text-muted">Format: JPG, PNG, GIF (Max 5MB per foto)</small>
                    </div>
                    <input type="file" id="images" name="images[]" multiple accept="image/*" style="display: none;"
                      onchange="previewImages(this)">
                    <div class="image-preview" id="imagePreview"></div>
                    <div class="help-text">Upload minimal 3 foto properti. Foto pertama akan menjadi foto utama</div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" id="wajib" required>
                  <label class="form-check-label" for="wajib">
                    Saya dengan ini menyatakan bahwa saya bertanggung jawab penuh atas kebenaran dan keakuratan seluruh
                    data yang saya inputkan dalam formulir ini, termasuk namun tidak terbatas pada nama, nomor telepon,
                    dan alamat email. Saya mengerti bahwa jika terdapat ketidaksesuaian atau kesalahan dalam data yang
                    saya berikan, saya akan menanggung segala akibat yang timbul dari hal tersebut dan tidak dapat
                    mengalihkan tanggung jawab kepada pihak lain.
                  </label>
                </div>
              </div>

              <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>
                <strong>Informasi Penting:</strong> Properti yang Anda submit akan melalui proses verifikasi terlebih
                dahulu sebelum dipublikasikan. Tim kami akan menghubungi Anda dalam 1-2 hari kerja.
              </div>

              <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-outline-primary" onclick="prevStep(2)">
                  <i class="fas fa-arrow-left me-2"></i>Kembali
                </button>
                <button type="submit" class="btn btn-primary btn-lg" id="btn-submit" disabled>
                  <i class="fas fa-paper-plane me-2"></i>Submit Properti
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  document.getElementById('type').addEventListener('change', function () {
    document.getElementById('tipe').value = this.options[this.selectedIndex].text.trim();
  });

  let kabupatens = <?= json_encode($kota) ?>;
  document.querySelector('#provinsi').addEventListener('change', function () {
    const id = this.value;
    const province = this.options[this.selectedIndex].text.trim();

    document.querySelector('#province').value = province;
    let filteredKabupatens = kabupatens.filter(kabupaten => kabupaten.parent === id);
    let opt = `<option value="">--Pilih Kabupaten/Kota--</option>`;
    filteredKabupatens.forEach(kabupaten => {
      opt += `<option value="${kabupaten.name}">${kabupaten.name}</option>`;
    });
    document.querySelector('#city').innerHTML = opt;
  });

  document.getElementById('wajib').addEventListener('change', function () {
    document.getElementById('btn-submit').disabled = !this.checked;
  });

  let currentStep = 1;
  const totalSteps = 3;

  function nextStep(step) {
    if (validateCurrentStep()) {
      document.getElementById('step' + currentStep).classList.add('d-none');
      document.getElementById('step' + step).classList.remove('d-none');

      // Update step indicator
      updateStepIndicator(step);
      currentStep = step;
    }
  }

  function prevStep(step) {
    document.getElementById('step' + currentStep).classList.add('d-none');
    document.getElementById('step' + step).classList.remove('d-none');

    // Update step indicator
    updateStepIndicator(step);
    currentStep = step;
  }

  function updateStepIndicator(activeStep) {
    const steps = document.querySelectorAll('.step');
    steps.forEach((step, index) => {
      step.classList.remove('active', 'completed');
      if (index + 1 < activeStep) {
        step.classList.add('completed');
      } else if (index + 1 === activeStep) {
        step.classList.add('active');
      }
    });
  }

  function validateCurrentStep() {
    const currentStepElement = document.getElementById('step' + currentStep);
    const requiredFields = currentStepElement.querySelectorAll('[required]');
    let isValid = true;

    requiredFields.forEach(field => {
      if (!field.value.trim()) {
        field.classList.add('is-invalid');
        isValid = false;
      } else {
        field.classList.remove('is-invalid');

        // Validasi khusus untuk email
        if (field.type === 'email' && field.value) {
          const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if (!emailRegex.test(field.value)) {
            field.classList.add('is-invalid');
            isValid = false;
          }
        }

        // Validasi khusus untuk telepon
        if (field.name === 'owner_phone' && field.value) {
          const phoneRegex = /^0[0-9]{9,12}$/;
          if (!phoneRegex.test(field.value)) {
            field.classList.add('is-invalid');
            isValid = false;
          }
        }
      }
    });

    return isValid;
  }

  function previewImages(input) {
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = '';

    if (input.files) {
      Array.from(input.files).forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function (e) {
          const previewItem = document.createElement('div');
          previewItem.className = 'preview-item';
          previewItem.innerHTML = `
          <img src="${e.target.result}" alt="Preview ${index + 1}">
          <button type="button" class="remove-image" onclick="removeImage(this)">
            <i class="fas fa-times"></i>
          </button>
        `;
          preview.appendChild(previewItem);
        };
        reader.readAsDataURL(file);
      });
    }
  }

  function removeImage(button) {
    button.parentElement.remove();
  }

  // Format currency input
  document.getElementById('price').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value) {
      value = parseInt(value).toLocaleString('id-ID');
      e.target.value = value;
    }
  });

  // Phone number formatting
  document.getElementById('owner_phone').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.startsWith('0')) {
      value = value.substring(1);
    }
    if (value) {
      e.target.value = '0' + value;
    }
  });
</script>