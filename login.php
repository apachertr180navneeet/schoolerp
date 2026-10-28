<?php
/**
 * EDUSYS PRO - PREMIUM LOGIN EXPERIENCE (PHP)
 */
$depth = 0;
require_once __DIR__ . '/includes/config.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In - <?php echo htmlspecialchars($school_config['name']); ?></title>
  
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
      background-color: #0b1120;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .auth-split-wrapper {
      min-height: 100vh;
      display: flex;
      width: 100%;
    }
    /* Brand Left Panel */
    .auth-brand-panel {
      width: 48%;
      background: radial-gradient(circle at 20% 20%, rgba(30, 64, 175, 0.45) 0%, rgba(15, 23, 42, 0.95) 70%),
                  radial-gradient(circle at 80% 80%, rgba(79, 70, 229, 0.35) 0%, rgba(15, 23, 42, 1) 70%);
      color: white;
      padding: 3.5rem 4rem;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      position: relative;
      overflow: hidden;
      border-right: 1px solid rgba(255, 255, 255, 0.08);
    }
    .auth-brand-panel::before {
      content: "";
      position: absolute;
      top: -120px;
      right: -120px;
      width: 450px;
      height: 450px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(59, 130, 246, 0.25) 0%, rgba(30, 64, 175, 0) 70%);
      filter: blur(50px);
      pointer-events: none;
    }
    .auth-brand-panel::after {
      content: "";
      position: absolute;
      bottom: -150px;
      left: -150px;
      width: 500px;
      height: 500px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(99, 102, 241, 0.2) 0%, rgba(30, 64, 175, 0) 70%);
      filter: blur(60px);
      pointer-events: none;
    }
    .glass-metric-card {
      background: rgba(255, 255, 255, 0.06);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border: 1px solid rgba(255, 255, 255, 0.12);
      border-radius: 16px;
      padding: 1.5rem;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.35);
      position: relative;
      z-index: 2;
    }
    .quote-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background: rgba(59, 130, 246, 0.2);
      border: 1px solid rgba(96, 165, 250, 0.35);
      color: #93c5fd;
      padding: 0.35rem 0.95rem;
      border-radius: 30px;
      font-size: 0.78rem;
      font-weight: 700;
      letter-spacing: 0.04em;
      text-transform: uppercase;
      margin-bottom: 1.25rem;
    }
    /* Form Right Panel */
    .auth-form-panel {
      flex: 1;
      background: #f8fafc;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 2.5rem 3.5rem;
      overflow-y: auto;
    }
    .auth-card-container {
      max-width: 580px;
      width: 100%;
      margin: 0 auto;
    }
    /* Role Category Tabs */
    .role-category-tabs .nav-link {
      color: #64748b;
      font-weight: 600;
      font-size: 0.8125rem;
      padding: 0.5rem 0.85rem;
      border-radius: 8px;
      transition: all 0.2s;
      border: none;
    }
    .role-category-tabs .nav-link.active {
      background: #1e40af;
      color: #ffffff;
      box-shadow: 0 4px 10px rgba(30, 64, 175, 0.25);
    }
    /* Modern Role Select Cards */
    .role-select-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
      gap: 0.55rem;
    }
    .role-select-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      padding: 0.65rem 0.75rem;
      display: flex;
      align-items: center;
      gap: 0.65rem;
      cursor: pointer;
      transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
      user-select: none;
      text-align: left;
    }
    .role-select-card:hover {
      border-color: #3b82f6;
      background: #f0f7ff;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(59, 130, 246, 0.12);
    }
    .role-select-card.active {
      border-color: #1e40af;
      background: #eff6ff;
      box-shadow: 0 0 0 2px rgba(30, 64, 175, 0.25);
    }
    .role-avatar-badge {
      width: 32px;
      height: 32px;
      border-radius: 8px;
      background: #e2e8f0;
      color: #1e293b;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 800;
      font-size: 0.75rem;
      flex-shrink: 0;
      transition: all 0.2s;
    }
    .role-select-card.active .role-avatar-badge {
      background: #1e40af;
      color: #ffffff;
    }
    .role-meta h6 {
      margin: 0;
      font-size: 0.8125rem;
      font-weight: 700;
      color: #1e293b;
      line-height: 1.2;
    }
    .role-meta small {
      font-size: 0.7rem;
      color: #64748b;
      display: block;
      margin-top: 1px;
    }
    .form-floating-custom {
      position: relative;
    }
    .form-floating-custom .form-control {
      height: 52px;
      padding-left: 45px;
      font-size: 0.925rem;
      border-radius: 10px;
      border: 1px solid #cbd5e1;
      background-color: #ffffff;
      transition: all 0.2s;
    }
    .form-floating-custom .form-control:focus {
      border-color: #2563eb;
      box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
    }
    .form-floating-custom .input-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 1.15rem;
      color: #94a3b8;
      pointer-events: none;
      transition: color 0.2s;
    }
    .form-floating-custom .form-control:focus + .input-icon {
      color: #2563eb;
    }
    .btn-auth-submit {
      height: 52px;
      background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%);
      border: none;
      color: #ffffff;
      font-weight: 700;
      font-size: 1rem;
      border-radius: 10px;
      box-shadow: 0 6px 18px rgba(30, 64, 175, 0.35);
      transition: all 0.25s;
    }
    .btn-auth-submit:hover {
      background: linear-gradient(135deg, #1e3a8a 0%, #1d4ed8 100%);
      box-shadow: 0 8px 24px rgba(30, 64, 175, 0.45);
      transform: translateY(-1px);
      color: #ffffff;
    }
    @media (max-width: 991.98px) {
      .auth-brand-panel {
        display: none;
      }
      .auth-form-panel {
        padding: 2rem 1.5rem;
      }
    }
  </style>
</head>
<body>

  <div class="auth-split-wrapper">
    <!-- Left Visual & Brand Panel -->
    <div class="auth-brand-panel">
      <div style="position: relative; z-index: 2;">
        <!-- Brand Logo Header -->
        <a href="<?php echo base_url('index.php'); ?>" class="d-inline-flex align-items-center gap-3 text-white text-decoration-none mb-5">
          <div style="width: 48px; height: 48px; background: linear-gradient(135deg, #38bdf8 0%, #1e40af 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.65rem; box-shadow: 0 8px 20px rgba(56, 189, 248, 0.35);">
            <i class="bi bi-mortarboard-fill"></i>
          </div>
          <div>
            <h3 class="fw-bold mb-0 text-white letter-spacing--1"><?php echo htmlspecialchars($school_config['short_name']); ?><span class="text-info">Pro</span></h3>
            <span class="font-size-12 text-info text-uppercase fw-bold letter-spacing-1">Enterprise School ERP</span>
          </div>
        </a>

        <!-- Headline & Tagline -->
        <div class="quote-badge">
          <i class="bi bi-shield-check text-info"></i> Official Institutional Portal
        </div>
        <h1 class="display-6 fw-bold mb-3 text-white" style="letter-spacing: -0.03em; line-height: 1.2;">
          Next-Generation Academic Administration
        </h1>
        <p class="text-white-50 font-size-15 mb-4" style="max-width: 460px; line-height: 1.6;">
          Unified single-school operating platform powering admissions, automated fee billing, live bus tracking, and CBSE CCE report cards.
        </p>
      </div>

      <!-- Live Floating Metrics Card -->
      <div class="glass-metric-card my-auto">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <div class="d-flex align-items-center gap-2">
            <span class="rounded-circle bg-success d-inline-block" style="width: 8px; height: 8px;"></span>
            <span class="text-white fw-bold font-size-13"><?php echo htmlspecialchars($school_config['name']); ?></span>
          </div>
          <span class="badge bg-primary-subtle text-info font-size-11">Active 2024-2025</span>
        </div>

        <div class="row g-2 text-center">
          <div class="col-4">
            <div class="p-2 rounded-2" style="background: rgba(255, 255, 255, 0.05);">
              <h5 class="fw-bold text-white mb-0">1,878</h5>
              <small class="text-white-50 font-size-11">Enrolled Pupils</small>
            </div>
          </div>
          <div class="col-4">
            <div class="p-2 rounded-2" style="background: rgba(255, 255, 255, 0.05);">
              <h5 class="fw-bold text-success mb-0">₹4.21 Cr</h5>
              <small class="text-white-50 font-size-11">Fee Recovery</small>
            </div>
          </div>
          <div class="col-4">
            <div class="p-2 rounded-2" style="background: rgba(255, 255, 255, 0.05);">
              <h5 class="fw-bold text-warning mb-0">95.4%</h5>
              <small class="text-white-50 font-size-11">Attendance</small>
            </div>
          </div>
        </div>

        <div class="pt-3 mt-3 border-top border-secondary border-opacity-25 d-flex align-items-center justify-content-between font-size-12 text-white-50">
          <span><i class="bi bi-award-fill text-warning me-1"></i> CBSE Affiliation #2130892</span>
          <span><i class="bi bi-lock-fill text-info me-1"></i> 256-Bit SSL Encrypted</span>
        </div>
      </div>

      <!-- Bottom Footer Info -->
      <div class="pt-4 border-top border-secondary border-opacity-25 d-flex align-items-center justify-content-between font-size-13 text-white-50" style="position: relative; z-index: 2;">
        <span>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($school_config['short_name']); ?> ERP Platform</span>
        <a href="<?php echo base_url('index.php'); ?>" class="text-info text-decoration-none fw-semibold">
          <i class="bi bi-arrow-left me-1"></i> Return to Website
        </a>
      </div>
    </div>

    <!-- Right Login Form Panel -->
    <div class="auth-form-panel">
      <div class="auth-card-container">
        
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
            <h2 class="fw-bold text-dark mb-1" style="letter-spacing: -0.02em;">Welcome Back</h2>
            <p class="text-muted font-size-14 mb-0">Select your stakeholder profile or enter credentials</p>
          </div>
          <a href="<?php echo base_url('index.php'); ?>" class="btn btn-outline-secondary btn-sm px-3 fw-semibold">
            <i class="bi bi-house-door me-1"></i> Home
          </a>
        </div>

        <!-- 15 Demo Roles - Structured by Stakeholder Categories -->
        <div class="card border rounded-3 p-3 mb-4 shadow-sm bg-white">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="font-size-12 fw-bold text-uppercase text-primary letter-spacing-1">
              <i class="bi bi-lightning-charge-fill me-1"></i> 1-Click Demo Accounts (15 Roles)
            </span>
            <span class="badge bg-success-subtle text-success font-size-11">Auto-Fills & Redirects</span>
          </div>

          <!-- Category Tabs -->
          <ul class="nav nav-pills role-category-tabs mb-2 bg-light p-1 rounded-3 gap-1" id="roleCategoryTabs" role="tablist">
            <li class="nav-item flex-fill text-center" role="presentation">
              <button class="nav-link active w-100" id="tab-leadership" data-bs-toggle="pill" data-bs-target="#pills-leadership" type="button">Leadership</button>
            </li>
            <li class="nav-item flex-fill text-center" role="presentation">
              <button class="nav-link w-100" id="tab-academics" data-bs-toggle="pill" data-bs-target="#pills-academics" type="button">Academics</button>
            </li>
            <li class="nav-item flex-fill text-center" role="presentation">
              <button class="nav-link w-100" id="tab-operations" data-bs-toggle="pill" data-bs-target="#pills-operations" type="button">Operations</button>
            </li>
            <li class="nav-item flex-fill text-center" role="presentation">
              <button class="nav-link w-100" id="tab-families" data-bs-toggle="pill" data-bs-target="#pills-families" type="button">Student / Parent</button>
            </li>
          </ul>

          <!-- Tab Content with Role Cards -->
          <div class="tab-content" id="pills-roleContent">
            <!-- 1. Leadership Tab -->
            <div class="tab-pane fade show active" id="pills-leadership" role="tabpanel">
              <div class="role-select-grid">
                <div class="role-select-card active" onclick="selectRole('admin@edusys.com', 'dashboards/admin.php', this)">
                  <div class="role-avatar-badge">SA</div>
                  <div class="role-meta">
                    <h6>Super Admin</h6>
                    <small>Full ERP Access</small>
                  </div>
                </div>
                <div class="role-select-card" onclick="selectRole('schooladmin@edusys.com', 'dashboards/admin.php', this)">
                  <div class="role-avatar-badge">AD</div>
                  <div class="role-meta">
                    <h6>School Admin</h6>
                    <small>Campus Operations</small>
                  </div>
                </div>
                <div class="role-select-card" onclick="selectRole('principal@edusys.com', 'dashboards/principal.php', this)">
                  <div class="role-avatar-badge">PR</div>
                  <div class="role-meta">
                    <h6>Principal</h6>
                    <small>Dr. Sunita Rao</small>
                  </div>
                </div>
              </div>
            </div>

            <!-- 2. Academics Tab -->
            <div class="tab-pane fade" id="pills-academics" role="tabpanel">
              <div class="role-select-grid">
                <div class="role-select-card" onclick="selectRole('teacher@edusys.com', 'dashboards/teacher.php', this)">
                  <div class="role-avatar-badge">TR</div>
                  <div class="role-meta">
                    <h6>PGT Teacher</h6>
                    <small>Vikram Rathore</small>
                  </div>
                </div>
                <div class="role-select-card" onclick="selectRole('classteacher@edusys.com', 'dashboards/teacher.php', this)">
                  <div class="role-avatar-badge">CT</div>
                  <div class="role-meta">
                    <h6>Class Teacher</h6>
                    <small>Class 10-A Mentor</small>
                  </div>
                </div>
                <div class="role-select-card" onclick="selectRole('library@edusys.com', 'dashboards/librarian.php', this)">
                  <div class="role-avatar-badge">LB</div>
                  <div class="role-meta">
                    <h6>Chief Librarian</h6>
                    <small>S. Nair (Circulation)</small>
                  </div>
                </div>
              </div>
            </div>

            <!-- 3. Operations Tab -->
            <div class="tab-pane fade" id="pills-operations" role="tabpanel">
              <div class="role-select-grid">
                <div class="role-select-card" onclick="selectRole('accounts@edusys.com', 'dashboards/accountant.php', this)">
                  <div class="role-avatar-badge">AC</div>
                  <div class="role-meta">
                    <h6>Accountant</h6>
                    <small>Fee Desk & Ledger</small>
                  </div>
                </div>
                <div class="role-select-card" onclick="selectRole('admissions@edusys.com', 'dashboards/admission-officer.php', this)">
                  <div class="role-avatar-badge">AO</div>
                  <div class="role-meta">
                    <h6>Admission Head</h6>
                    <small>Leads & Merits</small>
                  </div>
                </div>
                <div class="role-select-card" onclick="selectRole('transport@edusys.com', 'dashboards/transport-manager.php', this)">
                  <div class="role-avatar-badge">TM</div>
                  <div class="role-meta">
                    <h6>Transport Mgr</h6>
                    <small>Fleet & Bus GPS</small>
                  </div>
                </div>
                <div class="role-select-card" onclick="selectRole('hr@edusys.com', 'dashboards/hr-manager.php', this)">
                  <div class="role-avatar-badge">HR</div>
                  <div class="role-meta">
                    <h6>HR Manager</h6>
                    <small>Staff & Payroll</small>
                  </div>
                </div>
                <div class="role-select-card" onclick="selectRole('frontdesk@edusys.com', 'modules/front-office/dashboard.php', this)">
                  <div class="role-avatar-badge">FD</div>
                  <div class="role-meta">
                    <h6>Receptionist</h6>
                    <small>Front Desk & Calls</small>
                  </div>
                </div>
                <div class="role-select-card" onclick="selectRole('store@edusys.com', 'modules/inventory/dashboard.php', this)">
                  <div class="role-avatar-badge">SK</div>
                  <div class="role-meta">
                    <h6>Storekeeper</h6>
                    <small>Inventory & PO</small>
                  </div>
                </div>
                <div class="role-select-card" onclick="selectRole('security@edusys.com', 'modules/security/dashboard.php', this)">
                  <div class="role-avatar-badge">SG</div>
                  <div class="role-meta">
                    <h6>Security Guard</h6>
                    <small>Main Gate Passes</small>
                  </div>
                </div>
              </div>
            </div>

            <!-- 4. Students & Parents Tab -->
            <div class="tab-pane fade" id="pills-families" role="tabpanel">
              <div class="role-select-grid">
                <div class="role-select-card" onclick="selectRole('student@edusys.com', 'dashboards/student.php', this)">
                  <div class="role-avatar-badge">AS</div>
                  <div class="role-meta">
                    <h6>Student Portal</h6>
                    <small>Aarav Sharma (10-A)</small>
                  </div>
                </div>
                <div class="role-select-card" onclick="selectRole('parent@edusys.com', 'dashboards/parent.php', this)">
                  <div class="role-avatar-badge">RS</div>
                  <div class="role-meta">
                    <h6>Parent Portal</h6>
                    <small>Rajesh Sharma</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Login Form -->
        <form id="loginForm" onsubmit="handleLoginSubmit(event)" novalidate>
          <!-- Email / Staff ID Input -->
          <div class="mb-3">
            <label class="form-label font-size-13 fw-bold text-dark mb-1">Email Address or Staff ID <span class="text-danger">*</span></label>
            <div class="form-floating-custom">
              <input type="email" class="form-control" id="loginEmail" required value="admin@edusys.com" placeholder="name@edusys.com">
              <i class="bi bi-envelope input-icon"></i>
            </div>
            <div class="invalid-feedback">Please enter a valid institutional email.</div>
          </div>

          <!-- Password Input -->
          <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <label class="form-label font-size-13 fw-bold text-dark mb-0">Password <span class="text-danger">*</span></label>
              <a href="<?php echo base_url('forgot-password.php'); ?>" class="font-size-13 text-primary text-decoration-none fw-semibold">Forgot Password?</a>
            </div>
            <div class="form-floating-custom position-relative">
              <input type="password" class="form-control pe-5" id="loginPassword" required value="password123" placeholder="••••••••">
              <i class="bi bi-lock input-icon"></i>
              <button class="btn btn-link position-absolute end-0 top-50 translate-middle-y text-muted text-decoration-none me-2" type="button" id="togglePasswordBtn">
                <i class="bi bi-eye"></i>
              </button>
            </div>
            <div class="invalid-feedback">Password is required.</div>
          </div>

          <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="rememberMe" checked>
              <label class="form-check-label font-size-14 text-muted" for="rememberMe">
                Keep me signed in
              </label>
            </div>
            <span class="badge bg-light text-muted border font-size-11"><i class="bi bi-info-circle me-1"></i>Any password works</span>
          </div>

          <input type="hidden" id="selectedTargetUrl" value="<?php echo base_url('dashboards/admin.php'); ?>">

          <button type="submit" class="btn btn-auth-submit w-100" id="btnLoginSubmit">
            <span class="btn-text d-flex align-items-center justify-content-center gap-2">
              <span>Sign In to Institutional Portal</span>
              <i class="bi bi-arrow-right"></i>
            </span>
            <span class="spinner-border spinner-border-sm d-none me-2" role="status"></span>
          </button>
        </form>

        <div class="text-center mt-4 pt-3 border-top">
          <p class="font-size-13 text-muted mb-0">
            Experiencing difficulties signing in? Contact Front Desk Support at <br>
            <a href="tel:<?php echo $school_config['phone']; ?>" class="fw-bold text-primary text-decoration-none">
              <i class="bi bi-telephone-fill me-1"></i> <?php echo $school_config['phone']; ?>
            </a>
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
    function selectRole(email, path, el) {
      document.querySelectorAll('.role-select-card').forEach(c => c.classList.remove('active'));
      el.classList.add('active');
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
