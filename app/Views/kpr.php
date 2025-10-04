<style>
  :root {
    --primary-yellow: #f1f5f9;
    --primary-blue: #1E3A8A;
    --secondary-blue: #3B82F6;
    --text-dark: #1F2937;
    --text-light: #6B7280;
    --bg-light: #F9FAFB;
  }

  body {
    font-family: 'Inter', sans-serif;
    background-color: var(--bg-light);
  }

  .hero-section {
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    color: white;
    padding: 80px 0;
    text-align: center;
  }

  .hero-section h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
  }

  .hero-section p {
    font-size: 1.2rem;
    opacity: 0.9;
  }

  .calculator-section {
    background-color: var(--primary-yellow);
    padding: 60px 0;
    margin: -50px 0 0 0;
    position: relative;
    z-index: 10;
  }

  .calculator-container {
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  }

  .form-section {
    background: white;
    border-radius: 15px;
    padding: 30px;
    margin-bottom: 20px;
  }

  .form-label {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 8px;
  }

  .form-control {
    border: 2px solid #E5E7EB;
    border-radius: 10px;
    padding: 12px 16px;
    font-size: 16px;
    transition: all 0.3s ease;
  }

  .form-control:focus {
    border-color: var(--secondary-blue);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
  }

  .result-section {
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    color: white;
    border-radius: 15px;
    padding: 30px;
    text-align: center;
  }

  .result-title {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 30px;
  }

  .result-box {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    backdrop-filter: blur(10px);
  }

  .result-label {
    font-size: 0.9rem;
    opacity: 0.8;
    margin-bottom: 5px;
  }

  .result-value {
    font-size: 1.5rem;
    font-weight: 700;
  }

  .btn-kpr {
    background: var(--primary-blue);
    border: none;
    border-radius: 10px;
    padding: 15px 40px;
    font-size: 1.1rem;
    font-weight: 600;
    color: white;
    transition: all 0.3s ease;
    width: 100%;
  }

  .btn-kpr:hover {
    background: #1E40AF;
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(30, 58, 138, 0.3);
  }

  .disclaimer {
    font-size: 0.8rem;
    opacity: 0.7;
    margin-top: 15px;
    line-height: 1.4;
  }

  .bank-section {
    background: white;
    padding: 60px 0;
  }

  .bank-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 20px;
    text-align: center;
  }

  .bank-description {
    font-size: 1.1rem;
    color: var(--text-light);
    text-align: center;
    margin-bottom: 40px;
    line-height: 1.6;
  }

  .bank-logos {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 30px;
  }

  .bank-logo {
    background: var(--bg-light);
    padding: 20px 30px;
    border-radius: 10px;
    font-weight: 600;
    color: var(--text-dark);
    transition: all 0.3s ease;
  }

  .bank-logo:hover {
    background: var(--primary-yellow);
    transform: translateY(-2px);
  }

  .documents-section {
    background: var(--bg-light);
    padding: 60px 0;
  }

  .documents-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 30px;
    text-align: center;
  }

  .document-item {
    background: white;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  }

  .document-check {
    color: var(--secondary-blue);
    margin-right: 15px;
    font-size: 1.2rem;
  }

  .document-text {
    font-weight: 500;
    color: var(--text-dark);
  }

  /* Glossarium Styles */
  .glossarium-section {
    background: white;
    padding: 60px 0;
  }

  .glossarium-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
    max-width: 800px;
    margin: 0 auto 30px auto;
  }

  .glossarium-title {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-dark);
    margin: 0;
  }

  .search-container {
    position: relative;
    display: flex;
    align-items: center;
  }

  .search-icon {
    position: absolute;
    left: 15px;
    color: var(--text-light);
    z-index: 2;
  }

  .search-input {
    padding: 12px 15px 12px 45px;
    border: 2px solid #E5E7EB;
    border-radius: 25px;
    font-size: 16px;
    width: 300px;
    transition: all 0.3s ease;
  }

  .search-input:focus {
    outline: none;
    border-color: var(--secondary-blue);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
  }

  .alphabet-nav {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 8px;
    padding-bottom: 20px;
    border-bottom: 1px solid #E5E7EB;
    max-width: 800px;
    margin: 0 auto 30px auto;
  }

  .alphabet-btn {
    background: #F3F4F6;
    border: none;
    border-radius: 8px;
    padding: 10px 15px;
    font-size: 16px;
    font-weight: 600;
    color: var(--text-dark);
    cursor: pointer;
    transition: all 0.3s ease;
    min-width: 40px;
  }

  .alphabet-btn:hover {
    background: var(--primary-yellow);
    transform: translateY(-2px);
  }

  .alphabet-btn.active {
    background: var(--primary-yellow);
    color: var(--text-dark);
  }

  .glossarium-content {
    max-width: 800px;
    margin: 0 auto;
  }

  .term-item {
    margin-bottom: 25px;
    padding: 20px;
    background: #F9FAFB;
    border-radius: 10px;
    border-left: 4px solid var(--secondary-blue);
  }

  .term-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 8px;
  }

  .term-description {
    font-size: 1rem;
    color: var(--text-light);
    line-height: 1.6;
    margin: 0;
  }

  .no-results {
    text-align: center;
    padding: 40px;
    color: var(--text-light);
    font-size: 1.1rem;
  }

  @media (max-width: 768px) {
    .hero-section h1 {
      font-size: 2rem;
    }

    .calculator-container {
      padding: 20px;
    }

    .result-title {
      font-size: 1.5rem;
    }

    .glossarium-header {
      flex-direction: column;
      align-items: flex-start;
    }

    .search-input {
      width: 100%;
      max-width: 300px;
    }

    .alphabet-nav {
      gap: 6px;
    }

    .alphabet-btn {
      padding: 8px 12px;
      font-size: 14px;
      min-width: 35px;
    }
  }
</style>

<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <h1>Yuk Simulasikan Pinjamanmu!</h1>
    <p>Hitung cicilan KPR dengan mudah dan akurat</p>
  </div>
</section>

<!-- Calculator Section -->
<section class="calculator-section">
  <div class="container">
    <div class="calculator-container">
      <div class="row">
        <!-- Form Input -->
        <div class="col-lg-6">
          <div class="form-section">
            <h3 class="mb-4">Data Pinjaman</h3>

            <div class="mb-3">
              <label class="form-label">Harga Properti (Rp)</label>
              <input type="text" class="form-control" id="propertyPrice" placeholder="Masukkan harga properti">
            </div>

            <div class="mb-3">
              <label class="form-label">Uang Muka (Rp)</label>
              <input type="text" class="form-control" id="downPayment" placeholder="Masukkan uang muka">
            </div>

            <div class="mb-3">
              <label class="form-label">Jumlah Pinjaman (Rp)</label>
              <input type="text" class="form-control" id="loanAmount" placeholder="Otomatis terisi" readonly>
            </div>

            <div class="mb-3">
              <label class="form-label">Jangka Waktu Pinjaman (Tahun)</label>
              <input type="number" class="form-control" id="loanTerm" value="15" min="1" max="30">
            </div>

            <div class="mb-3">
              <label class="form-label">Suku Bunga per Tahun (%)</label>
              <input type="number" class="form-control" id="interestRate" value="5" min="0" max="20" step="0.1">
            </div>

            <button type="button" class="btn btn-primary btn-lg w-100" onclick="calculateKPR()">
              <i class="fas fa-calculator me-2"></i>Hitung Simulasi KPR
            </button>
          </div>
        </div>

        <!-- Hasil Simulasi -->
        <div class="col-lg-6">
          <div class="result-section">
            <h3 class="result-title">Hasil Simulasi KPR</h3>

            <div class="result-box">
              <div class="result-label">Harga Properti</div>
              <div class="result-value" id="resultPropertyPrice">Rp -</div>
            </div>

            <div class="result-box">
              <div class="result-label">Jumlah Angsuran/Bulan</div>
              <div class="result-value" id="resultMonthlyPayment">Rp -</div>
            </div>

            <div class="disclaimer">
              *Hasil dari perhitungan simulasi KPR ini hanya merupakan perkiraan saja.
              Untuk perhitungan tepatnya, pihak bank akan memberikan ilustrasi angsuran Anda.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Glossarium Section -->
<section class="glossarium-section">
  <div class="container">
    <div class="glossarium-header">
      <h2 class="glossarium-title">Istilah KPR</h2>
      <div class="search-container">
        <i class="fas fa-search search-icon"></i>
        <input type="text" class="search-input" id="glossariumSearch" placeholder="Cari Istilah KPR">
      </div>
    </div>

    <div class="alphabet-nav">
      <button class="alphabet-btn active" data-letter="A">A</button>
      <button class="alphabet-btn" data-letter="B">B</button>
      <button class="alphabet-btn" data-letter="C">C</button>
      <button class="alphabet-btn" data-letter="D">D</button>
      <button class="alphabet-btn" data-letter="E">E</button>
      <button class="alphabet-btn" data-letter="F">F</button>
      <button class="alphabet-btn" data-letter="G">G</button>
      <button class="alphabet-btn" data-letter="H">H</button>
      <button class="alphabet-btn" data-letter="I">I</button>
      <button class="alphabet-btn" data-letter="J">J</button>
      <button class="alphabet-btn" data-letter="K">K</button>
      <button class="alphabet-btn" data-letter="L">L</button>
      <button class="alphabet-btn" data-letter="M">M</button>
      <button class="alphabet-btn" data-letter="N">N</button>
      <button class="alphabet-btn" data-letter="O">O</button>
      <button class="alphabet-btn" data-letter="P">P</button>
      <button class="alphabet-btn" data-letter="Q">Q</button>
      <button class="alphabet-btn" data-letter="R">R</button>
      <button class="alphabet-btn" data-letter="S">S</button>
      <button class="alphabet-btn" data-letter="T">T</button>
      <button class="alphabet-btn" data-letter="U">U</button>
      <button class="alphabet-btn" data-letter="V">V</button>
      <button class="alphabet-btn" data-letter="W">W</button>
    </div>

    <div class="glossarium-content" id="glossariumContent">
      <!-- Content will be populated by JavaScript -->
    </div>
  </div>
</section>

<?= $this->include('footer-mini'); ?>

<?= $this->section('js') ?>
<script>
  // Format number dengan separator ribuan
  function formatNumber(num) {
    return new Intl.NumberFormat('id-ID').format(num);
  }

  // Parse number dari string yang sudah diformat
  function parseNumber(str) {
    return parseInt(str.replace(/[^\d]/g, ''));
  }

  // Format currency
  function formatCurrency(num) {
    return 'Rp ' + formatNumber(num);
  }

  // Event listener untuk input harga properti
  document.getElementById('propertyPrice').addEventListener('input', function (e) {
    let value = e.target.value.replace(/[^\d]/g, '');
    if (value) {
      e.target.value = formatNumber(value);
      calculateLoanAmount();
    }
  });

  // Event listener untuk input uang muka
  document.getElementById('downPayment').addEventListener('input', function (e) {
    let value = e.target.value.replace(/[^\d]/g, '');
    if (value) {
      e.target.value = formatNumber(value);
      calculateLoanAmount();
    }
  });

  // Hitung jumlah pinjaman otomatis
  function calculateLoanAmount() {
    const propertyPrice = parseNumber(document.getElementById('propertyPrice').value) || 0;
    const downPayment = parseNumber(document.getElementById('downPayment').value) || 0;
    const loanAmount = propertyPrice - downPayment;

    if (loanAmount > 0) {
      document.getElementById('loanAmount').value = formatNumber(loanAmount);
    } else {
      document.getElementById('loanAmount').value = '';
    }
  }

  // Hitung simulasi KPR
  function calculateKPR() {
    const propertyPrice = parseNumber(document.getElementById('propertyPrice').value);
    const downPayment = parseNumber(document.getElementById('downPayment').value);
    const loanAmount = parseNumber(document.getElementById('loanAmount').value);
    const loanTerm = parseInt(document.getElementById('loanTerm').value);
    const interestRate = parseFloat(document.getElementById('interestRate').value);

    // Validasi input
    if (!propertyPrice || !downPayment || !loanTerm || !interestRate) {
      alert('Mohon lengkapi semua data yang diperlukan!');
      return;
    }

    if (downPayment >= propertyPrice) {
      alert('Uang muka tidak boleh lebih besar atau sama dengan harga properti!');
      return;
    }

    // Hitung cicilan bulanan menggunakan formula annuity
    const monthlyInterestRate = interestRate / 100 / 12;
    const numberOfPayments = loanTerm * 12;

    let monthlyPayment;
    if (monthlyInterestRate === 0) {
      // Jika bunga 0%, cicilan = pokok / jumlah bulan
      monthlyPayment = loanAmount / numberOfPayments;
    } else {
      // Formula annuity untuk cicilan tetap
      monthlyPayment = loanAmount *
        (monthlyInterestRate * Math.pow(1 + monthlyInterestRate, numberOfPayments)) /
        (Math.pow(1 + monthlyInterestRate, numberOfPayments) - 1);
    }

    // Tampilkan hasil
    document.getElementById('resultPropertyPrice').textContent = formatCurrency(propertyPrice);
    document.getElementById('resultMonthlyPayment').textContent = formatCurrency(Math.round(monthlyPayment));

    // Scroll ke hasil
    document.getElementById('resultPropertyPrice').scrollIntoView({
      behavior: 'smooth',
      block: 'center'
    });
  }

  // Auto calculate saat input berubah
  document.getElementById('loanTerm').addEventListener('change', function () {
    if (document.getElementById('propertyPrice').value && document.getElementById('downPayment').value) {
      calculateKPR();
    }
  });

  document.getElementById('interestRate').addEventListener('change', function () {
    if (document.getElementById('propertyPrice').value && document.getElementById('downPayment').value) {
      calculateKPR();
    }
  });

  // Enter key untuk menghitung
  document.addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
      calculateKPR();
    }
  });

  // Glossarium Functions
  let currentLetter = 'A';
  let filteredTerms = [];

  function displayTerms(letter = null, searchTerm = '') {
    const content = document.getElementById('glossariumContent');
    let termsToShow = [];

    if (searchTerm) {
      // Search functionality
      Object.keys(listGlossarium).forEach(key => {
        listGlossarium[key].forEach(term => {
          if (term.Title.toLowerCase().includes(searchTerm.toLowerCase()) ||
            term.Description.toLowerCase().includes(searchTerm.toLowerCase())) {
            termsToShow.push(term);
          }
        });
      });
    } else {
      // Filter by letter
      const letterToShow = letter || currentLetter;
      termsToShow = listGlossarium[letterToShow] || [];
    }

    if (termsToShow.length === 0) {
      content.innerHTML = '<div class="no-results">Tidak ada istilah yang ditemukan.</div>';
      return;
    }

    // Sort terms alphabetically
    termsToShow.sort((a, b) => a.Title.localeCompare(b.Title));

    content.innerHTML = termsToShow.map(term => `
      <div class="term-item">
        <h3 class="term-title">${term.Title}</h3>
        <p class="term-description">${term.Description}</p>
      </div>
    `).join('');
  }

  function setActiveLetter(letter) {
    // Remove active class from all buttons
    document.querySelectorAll('.alphabet-btn').forEach(btn => {
      btn.classList.remove('active');
    });

    // Add active class to clicked button
    document.querySelector(`[data-letter="${letter}"]`).classList.add('active');
    currentLetter = letter;
  }

  // Glossarium Event Listeners
  document.addEventListener('DOMContentLoaded', function () {
    // Set default values for KPR calculator
    document.getElementById('loanTerm').value = 15;
    document.getElementById('interestRate').value = 5;

    // Initialize glossarium
    displayTerms('A');

    // Alphabet navigation
    document.querySelectorAll('.alphabet-btn').forEach(btn => {
      btn.addEventListener('click', function () {
        const letter = this.getAttribute('data-letter');
        setActiveLetter(letter);
        displayTerms(letter);

        // Clear search
        document.getElementById('glossariumSearch').value = '';
      });
    });

    // Search functionality
    document.getElementById('glossariumSearch').addEventListener('input', function () {
      const searchTerm = this.value.trim();

      if (searchTerm) {
        // Remove active class from alphabet buttons when searching
        document.querySelectorAll('.alphabet-btn').forEach(btn => {
          btn.classList.remove('active');
        });
        displayTerms(null, searchTerm);
      } else {
        // Restore active letter when search is cleared
        setActiveLetter(currentLetter);
        displayTerms(currentLetter);
      }
    });
  });

  let listGlossarium = {
    "A": [
      { "ID": 75, "Title": "Agunan", "Description": "Aset atau barang berharga yang dijaminkan oleh peminjam kepada lembaga keuangan sebagai bentuk jaminan atas pinjaman yang diterima.\r\n" }, { "ID": 76, "Title": "Akad Kredit", "Description": "Perjanjian resmi dan tertulis antara peminjam (debitur) dan pemberi pinjaman (kreditur), biasanya lembaga keuangan atau bank, yang memuat kesepakatan mengenai syarat-syarat pemberian pinjaman." }, { "ID": 77, "Title": "Angsuran", "Description": "Pembayaran cicilan bulanan yang dilakukan oleh peminjam kepada pemberi pinjaman.\r\n" }, { "ID": 79, "Title": "Aplikasi Pinjaman", "Description": "Formulir untuk permohonan pinjaman." }, { "ID": 78, "Title": "Appraisal", "Description": "Penilaian nilai agunan." }, { "ID": 80, "Title": "Approval", "Description": "Persetujuan atas permohonan kredit." }], "B": [{ "ID": 81, "Title": "Baki Debet", "Description": "Sisa pokok pinjaman." }, { "ID": 82, "Title": "BI Checking", "Description": "Laporan riwayat kredit." }, { "ID": 86, "Title": "Biaya Administrasi", "Description": "Biaya layanan yang dikenakan di awal pinjaman." }, { "ID": 87, "Title": "Blacklist", "Description": "Daftar nama dengan riwayat buruk yang ditolak pinjaman." }, { "ID": 84, "Title": "Bunga Efektif", "Description": "Bunga menurun sesuai sisa pokok" }, { "ID": 83, "Title": "Bunga Flat", "Description": "Bunga tetap tiap bulan." }, { "ID": 85, "Title": "Bunga Harian", "Description": "Bunga dihitung berdasarkan jumlah hari pinjaman.\r\n" }], "C": [{ "ID": 88, "Title": "Cicilan", "Description": "Pembayaran berkala yang dilakukan oleh peminjam kepada pemberi pinjaman untuk melunasi pinjaman secara bertahap dalam jangka waktu tertentu." }, { "ID": 90, "Title": "Credit Limit", "Description": "Batas maksimum pinjaman." }, { "ID": 89, "Title": "Credit Scoring", "Description": "Penilaian kelayakan pinjaman." }], "D": [{ "ID": 91, "Title": "Debitur", "Description": "Penerima fasilitas pinjaman.\r\n" }, { "ID": 93, "Title": "Denda Keterlambatan", "Description": "Biaya tambahan karena keterlambatan bayar." }, { "ID": 92, "Title": "Down Payment", "Description": "Uang muka pinjaman." }], "E": [{ "ID": 96, "Title": "E-KYC", "Description": "Verifikasi identitas secara digital." }, { "ID": 95, "Title": "Early Payment Penalty", "Description": "Denda pelunasan lebih awal." }, { "ID": 94, "Title": "Efektif Rate", "Description": "Sistem bunga menurun." }, { "ID": 97, "Title": "Emergency Loan", "Description": "Pinjaman cepat untuk kebutuhan mendesak." }],
    "F": [{ "ID": 100, "Title": "Fast Disbursement", "Description": "Pencairan pinjaman dalam hitungan menit." }, { "ID": 101, "Title": "Fintech", "Description": "Teknologi keuangan yang memfasilitasi pinjaman online." }, { "ID": 98, "Title": "Fixed Rate", "Description": "Jenis suku bunga pinjaman yang nilainya tetap dan tidak berubah selama jangka waktu tertentu yang telah disepakati antara peminjam dan pemberi pinjaman." }, { "ID": 99, "Title": "Floating Rate", "Description": "Bunga mengambang mengikuti pasar." }], "G": [{ "ID": 102, "Title": "Grace Period", "Description": "Masa tenggang cicilan pokok." }],
    "H": [{ "ID": 104, "Title": "Hutang Konsumtif", "Description": "Pinjaman untuk kebutuhan konsumtif, bukan usaha." }, { "ID": 103, "Title": "Hutang Pokok", "Description": "Jumlah pinjaman utama tanpa bunga." }], "I": [{ "ID": 106, "Title": "Indikatif Rate", "Description": "Suku bunga yang bersifat sementara atau estimasi awal yang ditawarkan oleh lembaga keuangan kepada calon peminjam sebelum dilakukan perhitungan atau analisis lebih lanjut." }, { "ID": 107, "Title": "Instalasi Aplikasi", "Description": "Proses memasang aplikasi pinjaman." }, { "ID": 105, "Title": "Instalment", "Description": "Sejumlah pembayaran berkala yang dilakukan oleh peminjam kepada pemberi pinjaman untuk melunasi pinjaman dalam jangka waktu tertentu." }, { "ID": 108, "Title": "Interest Rate", "Description": "Persentase yang dikenakan oleh lembaga keuangan sebagai biaya atas pinjaman yang diberikan kepada peminjam. " }],
    "J": [{ "ID": 110, "Title": "Jaminan Kredit", "Description": "Aset atau properti yang diserahkan oleh peminjam kepada lembaga keuangan sebagai bentuk jaminan atas pinjaman yang diterima, dan dapat disita oleh pemberi pinjaman apabila terjadi gagal bayar." }, { "ID": 109, "Title": "Jangka Waktu", "Description": "Periode waktu yang disepakati antara peminjam dan pemberi pinjaman untuk melunasi pinjaman." }, { "ID": 111, "Title": "Jatuh Tempo", "Description": "Tanggal akhir di mana pembayaran pinjaman harus dilakukan." }],
    "K": [{ "ID": 113, "Title": "KPA", "Description": "Kredit Pemilikan Apartemen, yaitu pembiayaan untuk membeli unit apartemen dengan metode cicilan." }, { "ID": 112, "Title": "KPR", "Description": "Kredit Pemilikan Rumah, yaitu fasilitas pinjaman dari bank untuk membeli rumah dengan sistem cicilan." }, { "ID": 114, "Title": "Kredit Tanpa Agunan (KTA)", "Description": "Jenis pinjaman yang diberikan tanpa memerlukan jaminan aset.\r\n" }, { "ID": 115, "Title": "KTP Elektronik", "Description": "Dokumen identitas digital yang digunakan sebagai syarat verifikasi dalam pengajuan pinjaman." }],
    "L": [{ "ID": 117, "Title": "Likuidasi", "Description": "Proses pencairan atau penjualan aset agunan untuk melunasi pinjaman yang gagal bayar.\r\n" }, { "ID": 118, "Title": "Limit Kredit", "Description": "Jumlah maksimal pinjaman yang bisa diberikan.\r\n" }, { "ID": 116, "Title": "LTV (Loan to Value)", "Description": "Rasio antara jumlah pinjaman dengan nilai agunan." }],
    "M": [{ "ID": 119, "Title": "Margin", "Description": "Selisih antara bunga yang dibayarkan peminjam dan biaya dana yang dikeluarkan oleh bank.\r\n" }, { "ID": 121, "Title": "Minimum Payment", "Description": "Jumlah pembayaran minimum yang harus dibayarkan dalam suatu periode pada pinjaman cicilan.\r\n" }, { "ID": 120, "Title": "Mutasi Rekening", "Description": "Catatan seluruh transaksi yang terjadi dalam suatu rekening bank." }],
    "N": [{ "ID": 122, "Title": "Notaris", "Description": "Pejabat yang berwenang dalam membuat dokumen hukum termasuk akad kredit dan pengikatan agunan.\r\n" }, { "ID": 123, "Title": "NPL (Non Performing Loan)", "Description": "Pinjaman yang telah jatuh tempo dan belum dibayar.\r\n" }, { "ID": 124, "Title": "NPWP", "Description": "Nomor Pokok Wajib Pajak yang digunakan sebagai identitas wajib pajak dan kadang menjadi syarat pengajuan pinjaman.\r\n" }], "O": [{ "ID": 125, "Title": "Outstanding Loan", "Description": "Sisa pokok pinjaman yang masih belum dilunasi oleh debitur." }, { "ID": 126, "Title": "Over Kredit", "Description": "Proses pengalihan pinjaman yang sedang berjalan kepada pihak lain berikut hak kepemilikannya.\r\n" }], "P": [{ "ID": 129, "Title": "Pinjaman Online", "Description": "Pinjaman yang diajukan dan dicairkan secara digital melalui aplikasi atau platform keuangan.\r\n" }, { "ID": 127, "Title": "Plafon Kredit", "Description": "Jumlah maksimum pinjaman.\r\n" }, { "ID": 130, "Title": "Plafon Pinjaman", "Description": "Jumlah maksimum dana pinjaman yang dapat diajukan." }, { "ID": 128, "Title": "Provisi", "Description": "Biaya awal yang dibebankan pada saat pencairan pinjaman.\r\n" }],
    "Q": [{ "ID": 131, "Title": "QRIS", "Description": "Kode pembayaran digital." }], "R": [{ "ID": 132, "Title": "Refinancing", "Description": "Proses pengajuan ulang pinjaman untuk menggantikan pinjaman lama dengan ketentuan baru.\r\n" }, { "ID": 134, "Title": "Rescheduling", "Description": "Penjadwalan ulang terhadap tenor atau cicilan pinjaman.\r\n" }, { "ID": 133, "Title": "Restrukturisasi Kredit", "Description": "Penyesuaian syarat pinjaman." }], "S": [{ "ID": 137, "Title": "Scoring Otomatis", "Description": "Sistem penilaian kelayakan kredit berbasis teknologi dan data secara otomatis.\r\n" }, { "ID": 138, "Title": "Simulasi Pinjaman", "Description": "Perhitungan awal untuk mengetahui estimasi cicilan dan bunga berdasarkan jumlah pinjaman dan tenor.\r\n" }, { "ID": 135, "Title": "SP3K", "Description": "Surat Persetujuan Penyediaan Kredit yang diterbitkan oleh bank sebagai bukti persetujuan pinjaman.\r\n" }, { "ID": 136, "Title": "Suku Bunga", "Description": "Biaya yang dibebankan oleh bank kepada peminjam atas penggunaan dana pinjaman.\r\n" }],
    "T": [{ "ID": 139, "Title": "Take Over Kredit", "Description": "Pengalihan pinjaman dari satu bank ke bank lain yang menawarkan bunga atau tenor lebih ringan.\r\n" }, { "ID": 141, "Title": "Tanda Tangan Digital", "Description": "Metode pengesahan dokumen elektronik dalam proses pengajuan pinjaman.\r\n" }, { "ID": 140, "Title": "Tenor", "Description": "Jangka waktu yang diberikan untuk melunasi pinjaman.\r\n" }],
    "U": [{ "ID": 143, "Title": "Uang Booking", "Description": "Pembayaran awal untuk mengamankan pemesanan suatu produk, termasuk properti.\r\n" }, { "ID": 142, "Title": "Uang Muka", "Description": "Pembayaran awal yang dibayarkan sebelum pengajuan pinjaman." }, { "ID": 144, "Title": "Unsecured Loan", "Description": "Pinjaman yang tidak memerlukan agunan atau jaminan.\r\n" }],
    "V": [{ "ID": 145, "Title": "Valuasi Properti", "Description": "Proses penilaian terhadap nilai pasar dari properti yang dijadikan agunan.\r\n" }, { "ID": 146, "Title": "Verifikasi Data", "Description": "Proses pengecekan dan validasi informasi pribadi dan dokumen peminjam.\r\n" }],
    "W": [{ "ID": 148, "Title": "Waktu Pencairan", "Description": "Lama waktu yang dibutuhkan dari pengajuan hingga dana pinjaman cair ke rekening peminjam.\r\n" }, { "ID": 147, "Title": "Warkat", "Description": "Dokumen resmi transaksi seperti cek atau bilyet giro.\r\n" }]
  };
</script>
<?= $this->endSection() ?>