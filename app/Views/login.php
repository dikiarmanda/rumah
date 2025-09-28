<style>
  /* Custom Login Page Styling */
  .login-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    position: relative;
    overflow: hidden;
  }

  .login-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('../../images/auth/login-bg.jpg') center/cover;
    opacity: 0.3;
    z-index: 1;
  }

  .login-content {
    position: relative;
    z-index: 2;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
  }

  .login-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    padding: 3rem;
    width: 100%;
    max-width: 450px;
    border: 1px solid rgba(255, 255, 255, 0.2);
  }

  .login-header {
    text-align: center;
    margin-bottom: 2.5rem;
  }

  .login-logo {
    width: 120px;
    height: auto;
    margin-bottom: 1.5rem;
    filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
  }

  .login-title {
    font-size: 2rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
    font-family: 'Nunito', sans-serif;
  }

  .login-subtitle {
    font-size: 1rem;
    color: #7f8c8d;
    font-weight: 400;
    font-family: 'Nunito', sans-serif;
  }

  .login-form .form-group {
    margin-bottom: 1.5rem;
  }

  .login-form .form-control {
    background: rgba(255, 255, 255, 0.9);
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 1rem 1.25rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    font-family: 'Nunito', sans-serif;
  }

  .login-form .form-control:focus {
    border-color: #1b5396;
    box-shadow: 0 0 0 0.2rem rgba(76, 128, 174, 0.25);
    background: #ffffff;
  }

  .login-form .form-control::placeholder {
    color: #95a5a6;
    font-weight: 400;
  }

  .login-btn {
    background: linear-gradient(135deg, #1b5396 0%, #5a8bc0 100%);
    border: none;
    border-radius: 12px;
    padding: 1rem 2rem;
    font-size: 1.1rem;
    font-weight: 600;
    color: white;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-family: 'Nunito', sans-serif;
    box-shadow: 0 4px 15px rgba(76, 128, 174, 0.3);
  }

  .login-btn:hover {
    background: linear-gradient(135deg, #3d6b95 0%, #1b5396 100%);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(76, 128, 174, 0.4);
    color: white;
  }

  .forgot-password {
    color: #1b5396;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 600;
    transition: color 0.3s ease;
    font-family: 'Nunito', sans-serif;
  }

  .forgot-password:hover {
    color: #3d6b95;
    text-decoration: underline;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .login-content {
      padding: 1rem;
    }

    .login-card {
      padding: 2rem;
      margin: 1rem;
    }

    .login-title {
      font-size: 1.75rem;
    }
  }

  /* Animation */
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .login-card {
    animation: fadeInUp 0.6s ease-out;
  }
</style>

<div class="login-container">
  <div class="login-content">
    <div class="login-card">
      <div class="login-header">
        <p class="display-3 text-primary mb-1"><i class="fa-regular fa-house"></i></p>
        <h1 class="login-title">Selamat Datang</h1>
        <p class="login-subtitle">Masuk ke akun Anda untuk melanjutkan</p>
      </div>

      <form action="<?= base_url('user_login') ?>" method="post" class="login-form">
        <?= csrf_field() ?>
        <div class="form-group">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="form-group mb-1">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        </div>
        <div class="text-end">
          <!-- <a href="#" class="forgot-password">Lupa password?</a> -->
        </div>

        <div class="mt-3 d-grid gap-2">
          <button type="submit" class="btn login-btn">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>