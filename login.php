<?php
/**
 * EDUSYS PRO - LOGIN EXPERIENCE (PHP)
 */
$depth = 0;
require_once __DIR__ . '/includes/config.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In - <?php echo htmlspecialchars($school_config['short_name']); ?> School ERP</title>
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  <!-- Bootstrap 5.3 & Icons CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  
  <!-- Custom Prototype CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css'); ?>">

  <style>
    body {
      background-color: var(--bg-app);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    .auth-split-container {
      min-height: 100vh;
      display: flex;
    }
    .auth-brand-side {
      background: linear-gradient(145deg, #0f172a 0%, #1e3a8a 100%);
      color: white;
      width: 45%;
      padding: 3.5rem;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      position: relative;
      overflow: hidden;
    }
    .auth-brand-side::after {
      content: "";
      position: absolute;
      top: -100px;
      right: -100px;
      width: 350px;
      height: 350px;
      border-radius: 50%;
      background: rgba(59, 130, 246, 0.15);
      filter: blur(60px);
    }
    .auth-form-side {
      flex: 1;
      padding: 2.5rem 3.5rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: var(--bg-card);
      overflow-y: auto;
    }
    .role-pill {
      font-size: 0.75rem;
      font-weight: 600;
      padding: 0.4rem 0.75rem;
      border-radius: 20px;
      border: 1px solid var(--border-color);
      background: var(--bg-app);
      color: var(--text-main);
      cursor: pointer;
      transition: all 0.2s;
      display: inline-flex;
      align-items: center;
      gap: 0.35rem;
    }
    .role-pill:hover, .role-pill.active {
      background: var(--primary-subtle);
      border-color: var(--primary);
      color: var(--primary-dark);
      transform: translateY(-1px);
    }
    @media (max-width: 991.98px) {
      .auth-brand-side {
        display: none;
      }
      .auth-form-side {
        padding: 2rem 1.5rem;
      }
    }
  </style>
</head>
<body>

  <div class="auth-split-container">
    <!-- Brand Sidebar Side -->
    <div class="auth-brand-side">
      <div>
        <a href="<?php echo base_url('index.php'); ?>" class="d-flex align-items-center gap-2 text-white text-decoration-none mb-4">
          <div style="width: 44px; height: 44px; background: #3b82f6; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
            <i class="bi bi-mortarboard-fill"></i>
          </div>
          <div>
            <h4 class="fw-bold mb-0 text-white"><?php echo htmlspecialchars($school_config['short_name']); ?> Pro</h4>
            <small class="text-info fw-semibold">PHP Common Layout Architecture</small>
          </div>
        </a>

        <div class="mt-5">
          <span class="badge bg-primary text-white mb-3 px-3 py-2"><?php echo htmlspecialchars($school_config['name']); ?></span>
          <h2 class="display-6 fw-bold mb-3 text-white">Empowering Education Through Technology</h2>
          <p class="text-white-50 font-size-15 leading-relaxed">
            Integrated administration, automated fees, real-time bus tracking, CBSE CCE report cards, and digital portals for 1,800+ students and 120+ educators.
          </p>
        </div>
      </div>

      <div class="pt-4 border-top border-secondary">
        <div class="d-flex align-items-center gap-3">
          <div class="rounded-circle bg-success text-white p-2">
            <i class="bi bi-shield-check fs-5"></i>
          </div>
          <div>
            <strong class="d-block font-size-14 text-white">PHP Prototype Sandbox Mode</strong>
            <small class="text-white-50">Select any role on the right to test permissions and dashboards.</small>
          </div>
        </div>
      </div>
    </div>

    <!-- Login Form Side -->
    <div class="auth-form-side">
      <div style="max-width: 520px; width: 100%; margin: 0 auto;">
        
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
            <h3 class="fw-bold mb-1">Welcome Back</h3>
            <p class="text-muted font-size-14 mb-0">Sign in to your school management portal</p>
          </div>
          <a href="<?php echo base_url('index.php'); ?>" class="btn btn-outline-secondary btn-sm" title="Back to Homepage">
            <i class="bi bi-house-door me-1"></i> Home
          </a>
        </div>

        <!-- 15 Role Switcher Quick Pills -->
        <div class="p-3 bg-light rounded-3 border mb-4">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="font-size-12 fw-bold text-uppercase text-muted">1-Click Role Switcher (15 Demo Accounts)</span>
            <span class="badge bg-primary-subtle text-primary font-size-11">Auto-Fills Form</span>
          </div>

          <div class="d-flex flex-wrap gap-2" id="rolePillsContainer">
            <?php foreach ($demo_roles as $idx => $r): ?>
              <button type="button" class="role-pill <?php echo $idx === 0 ? 'active' : ''; ?>" 
                onclick="selectRole('<?php echo $r['email']; ?>', '<?php echo $r['path']; ?>', this)">
                <span class="badge bg-secondary font-size-10"><?php echo $r['avatar']; ?></span> 
                <?php echo htmlspecialchars(explode('(', $r['name'])[0]); ?>
              </button>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Login Form -->
        <form id="loginForm" onsubmit="handleLoginSubmit(event)" novalidate>
          <div class="mb-3">
            <label class="form-label" for="loginEmail">Email Address or Staff ID <span class="text-danger">*</span></label>
            <div class="input-group">
              <span class="input-group-text bg-light text-muted"><i class="bi bi-envelope"></i></span>
              <input type="email" class="form-control" id="loginEmail" required value="admin@edusys.com" placeholder="name@edusys.com">
            </div>
            <div class="invalid-feedback">Please enter a valid email address.</div>
          </div>

          <div class="mb-3">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="loginPassword">Password <span class="text-danger">*</span></label>
              <a href="<?php echo base_url('forgot-password.php'); ?>" class="font-size-13 text-primary text-decoration-none">Forgot Password?</a>
            </div>
            <div class="input-group">
              <span class="input-group-text bg-light text-muted"><i class="bi bi-lock"></i></span>
              <input type="password" class="form-control" id="loginPassword" required value="password123" placeholder="••••••••">
              <button class="btn btn-outline-secondary" type="button" id="togglePasswordBtn">
                <i class="bi bi-eye"></i>
              </button>
            </div>
            <div class="invalid-feedback">Password is required.</div>
          </div>

          <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="rememberMe" checked>
              <label class="form-check-label font-size-14 text-muted" for="rememberMe">
                Remember my login
              </label>
            </div>
            <span class="font-size-12 text-muted"><i class="bi bi-info-circle me-1"></i>Any password works</span>
          </div>

          <input type="hidden" id="selectedTargetUrl" value="<?php echo base_url('dashboards/admin.php'); ?>">

          <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold shadow-sm" id="btnLoginSubmit">
            <span class="btn-text"><i class="bi bi-box-arrow-in-right me-2"></i> Sign In to Portal</span>
            <span class="spinner-border spinner-border-sm d-none me-2" role="status"></span>
          </button>
        </form>

        <div class="text-center mt-4 pt-3 border-top">
          <p class="font-size-13 text-muted mb-0">
            Need help accessing your student or parent account? <br>
            Contact School Front Office at <a href="tel:<?php echo $school_config['phone']; ?>" class="fw-semibold text-primary"><?php echo $school_config['phone']; ?></a>
          </p>
        </div>

      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url('assets/js/mock-data.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/app.js'); ?>"></script>
  <script>
    function selectRole(email, path, btn) {
      document.querySelectorAll('.role-pill').forEach(p => p.classList.remove('active'));
      btn.classList.add('active');
      document.getElementById('loginEmail').value = email;
      document.getElementById('selectedTargetUrl').value = '<?php echo base_url(); ?>' + path;
    }

    // Toggle Password Visibility
    document.getElementById('togglePasswordBtn').addEventListener('click', function () {
      const input = document.getElementById('loginPassword');
      const isPass = input.type === 'password';
      input.type = isPass ? 'text' : 'password';
      this.innerHTML = isPass ? '<i class="bi bi-eye-slash"></i>' : '<i class="bi bi-eye"></i>';
    });

    function handleLoginSubmit(e) {
      e.preventDefault();
      const form = document.getElementById('loginForm');
      if (!form.checkValidity()) {
        form.classList.add('was-validated');
        return;
      }

      const submitBtn = document.getElementById('btnLoginSubmit');
      submitBtn.disabled = true;
      submitBtn.querySelector('.btn-text').classList.add('d-none');
      submitBtn.querySelector('.spinner-border').classList.remove('d-none');

      const targetUrl = document.getElementById('selectedTargetUrl').value;
      setTimeout(() => {
        window.location.href = targetUrl;
      }, 500);
    }
  </script>
</body>
</html>
