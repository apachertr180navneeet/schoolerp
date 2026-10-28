<?php
/**
 * EDUSYS PRO - PUBLIC LANDING PAGE (PHP)
 */
$depth = 0;
require_once __DIR__ . '/includes/config.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($school_config['name']); ?> - Modern School ERP</title>
  <meta name="description" content="Integrated Single-School ERP solution powering Academic Excellence, Admissions, Fees, Examinations, Attendance, Transport, and Portals for CBSE & State Boards.">
  
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
    .landing-nav {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid var(--border-color);
      transition: all 0.3s;
    }
    [data-bs-theme="dark"] .landing-nav {
      background: rgba(17, 24, 39, 0.95);
    }
    .hero-section {
      background: radial-gradient(circle at 50% 10%, rgba(59, 130, 246, 0.08) 0%, rgba(248, 250, 252, 1) 70%);
      padding: 5rem 0 3rem 0;
      position: relative;
      overflow: hidden;
    }
    [data-bs-theme="dark"] .hero-section {
      background: radial-gradient(circle at 50% 10%, rgba(30, 64, 175, 0.25) 0%, rgba(9, 13, 22, 1) 70%);
    }
    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background: #eff6ff;
      border: 1px solid #bfdbfe;
      color: #1e40af;
      padding: 0.35rem 1rem;
      border-radius: 30px;
      font-size: 0.8125rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
    }
    [data-bs-theme="dark"] .hero-badge {
      background: rgba(30, 64, 175, 0.2);
      border-color: rgba(59, 130, 246, 0.4);
      color: #93c5fd;
    }
    .hero-title {
      font-size: 3.25rem;
      font-weight: 800;
      letter-spacing: -0.03em;
      line-height: 1.18;
      color: #0f172a;
      margin-bottom: 1.5rem;
    }
    [data-bs-theme="dark"] .hero-title {
      color: #f8fafc;
    }
    .hero-title span {
      background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .hero-lead {
      font-size: 1.15rem;
      color: #64748b;
      max-width: 720px;
      margin: 0 auto 2rem auto;
      line-height: 1.6;
    }
    [data-bs-theme="dark"] .hero-lead {
      color: #94a3b8;
    }
    .hero-preview-frame {
      background: #ffffff;
      border: 1px solid var(--border-color);
      border-radius: 16px;
      box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.15);
      padding: 0.75rem;
      margin-top: 2rem;
      position: relative;
    }
    [data-bs-theme="dark"] .hero-preview-frame {
      background: #1e293b;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    }
    .feature-card {
      background: var(--bg-card);
      border: 1px solid var(--border-color);
      border-radius: 14px;
      padding: 1.75rem;
      transition: all 0.25s;
      height: 100%;
    }
    .feature-card:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow-md);
      border-color: var(--primary-light);
    }
    .feature-icon-wrap {
      width: 52px;
      height: 52px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      margin-bottom: 1.25rem;
    }
    .comparison-table th, .comparison-table td {
      padding: 1rem 1.25rem;
    }
  </style>
</head>
<body>

  <!-- Top Announcement Bar -->
  <div class="bg-primary text-white py-2 text-center font-size-13 fw-semibold">
    <div class="container d-flex align-items-center justify-content-center gap-2">
      <span class="badge bg-white text-primary">PHP Edition</span>
      <span>Fully Integrated with Common Layout Partials & Native Laragon Support.</span>
      <a href="<?php echo base_url('login.php'); ?>" class="text-white text-decoration-underline ms-2">Launch Demo Login &rarr;</a>
    </div>
  </div>

  <!-- Main Public Navigation -->
  <nav class="navbar navbar-expand-lg landing-nav sticky-top py-3">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-primary fs-4" href="<?php echo base_url('index.php'); ?>">
        <div class="brand-icon" style="width: 38px; height: 38px; background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%); border-radius: 8px; display:flex; align-items:center; justify-content:center; color:white;">
          <i class="bi bi-mortarboard-fill"></i>
        </div>
        <span class="text-dark dark-text-white"><?php echo htmlspecialchars($school_config['short_name']); ?><span class="text-primary">Pro</span></span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navMain">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-semibold font-size-15 gap-lg-3">
          <li class="nav-item"><a class="nav-link text-dark dark-text-white" href="#modules">ERP Modules</a></li>
          <li class="nav-item"><a class="nav-link text-dark dark-text-white" href="#portals">Role Portals</a></li>
          <li class="nav-item"><a class="nav-link text-dark dark-text-white" href="#cbse-state">CBSE & State Board</a></li>
          <li class="nav-item"><a class="nav-link text-dark dark-text-white" href="#comparison">Why EduSys</a></li>
          <li class="nav-item"><a class="nav-link text-dark dark-text-white" href="#faq">FAQ</a></li>
          <li class="nav-item"><a class="nav-link text-dark dark-text-white" href="#contact">Contact</a></li>
        </ul>

        <div class="d-flex align-items-center gap-2">
          <!-- Theme Toggle -->
          <button class="btn btn-outline-secondary border-0 btn-sm rounded-circle p-2" id="btnThemeToggle" title="Toggle Theme">
            <i class="bi bi-moon-stars"></i>
          </button>
          <a href="<?php echo base_url('login.php'); ?>" class="btn btn-outline-primary px-3 fw-semibold">Sign In</a>
          <button class="btn btn-primary px-3 fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#demoRequestModal">
            <i class="bi bi-calendar-check me-1"></i> Book a Demo
          </button>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-section text-center">
    <div class="container">
      <div class="hero-badge">
        <i class="bi bi-shield-check text-primary"></i> Complete Single-School ERP in PHP • Common Include Architecture
      </div>
      <h1 class="hero-title">
        The Modern Operating System for <br><span>India's Leading Schools</span>
      </h1>
      <p class="hero-lead">
        Seamlessly manage Academics, Admissions, Examinations, Fee Collections, Transport, and Staff Payroll. Unified portals for Principals, Teachers, Students, and Parents.
      </p>

      <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap">
        <a href="<?php echo base_url('dashboards/admin.php'); ?>" class="btn btn-primary btn-lg px-4 py-2 fs-6 fw-bold shadow">
          <i class="bi bi-speedometer2 me-2"></i> Launch Admin Dashboard
        </a>
        <a href="<?php echo base_url('login.php'); ?>" class="btn btn-outline-primary btn-lg px-4 py-2 fs-6 fw-bold">
          <i class="bi bi-person-badge me-2"></i> Explore 15 Demo Roles
        </a>
        <button class="btn btn-light btn-lg px-4 py-2 fs-6 fw-bold border" data-bs-toggle="modal" data-bs-target="#demoRequestModal">
          <i class="bi bi-camera-video me-2"></i> Request School Walkthrough
        </button>
      </div>

      <!-- Stats Counters -->
      <div class="row g-4 justify-content-center mt-4">
        <div class="col-6 col-md-3">
          <div class="p-3 bg-card border rounded-3">
            <h3 class="fw-bold text-primary mb-0">28+</h3>
            <small class="text-muted fw-semibold">Integrated Modules</small>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="p-3 bg-card border rounded-3">
            <h3 class="fw-bold text-success mb-0">100%</h3>
            <small class="text-muted fw-semibold">CBSE & State Board Ready</small>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="p-3 bg-card border rounded-3">
            <h3 class="fw-bold text-warning mb-0">15</h3>
            <small class="text-muted fw-semibold">Pre-Configured Roles</small>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="p-3 bg-card border rounded-3">
            <h3 class="fw-bold text-info mb-0">584+</h3>
            <small class="text-muted fw-semibold">PHP Screens with Common Includes</small>
          </div>
        </div>
      </div>

      <!-- Product Dashboard Preview Mockup -->
      <div class="hero-preview-frame text-start mt-5">
        <div class="d-flex align-items-center justify-content-between pb-2 mb-2 border-bottom">
          <div class="d-flex align-items-center gap-2">
            <span class="rounded-circle bg-danger d-inline-block" style="width: 12px; height: 12px;"></span>
            <span class="rounded-circle bg-warning d-inline-block" style="width: 12px; height: 12px;"></span>
            <span class="rounded-circle bg-success d-inline-block" style="width: 12px; height: 12px;"></span>
            <span class="ms-2 font-size-13 text-muted fw-semibold"><?php echo htmlspecialchars($school_config['name']); ?> • PHP Application Mode</span>
          </div>
          <div class="d-flex gap-2">
            <a href="<?php echo base_url('dashboards/admin.php'); ?>" class="btn btn-sm btn-primary py-1 px-3 fw-semibold">Full Interactive View &rarr;</a>
          </div>
        </div>

        <div class="p-3 bg-light rounded-3">
          <div class="row g-3">
            <div class="col-md-3">
              <div class="kpi-card kpi-primary mb-0">
                <div class="kpi-info">
                  <h6>Total Enrolled</h6>
                  <div class="kpi-value">1,878</div>
                  <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> +142 this session</div>
                </div>
                <div class="kpi-icon"><i class="bi bi-people-fill"></i></div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="kpi-card kpi-success mb-0">
                <div class="kpi-info">
                  <h6>Fee Collected YTD</h6>
                  <div class="kpi-value">₹4.21 Cr</div>
                  <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 87% Recovery</div>
                </div>
                <div class="kpi-icon"><i class="bi bi-currency-rupee"></i></div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="kpi-card kpi-warning mb-0">
                <div class="kpi-info">
                  <h6>Today's Attendance</h6>
                  <div class="kpi-value">95.4%</div>
                  <div class="kpi-trend positive"><i class="bi bi-person-check"></i> 1,792 Present</div>
                </div>
                <div class="kpi-icon"><i class="bi bi-calendar-check"></i></div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="kpi-card kpi-info mb-0">
                <div class="kpi-info">
                  <h6>Staff on Duty</h6>
                  <div class="kpi-value">118 / 122</div>
                  <div class="kpi-trend positive"><i class="bi bi-person-workspace"></i> 4 on Approved Leave</div>
                </div>
                <div class="kpi-icon"><i class="bi bi-briefcase-fill"></i></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 10 Dedicated Role Dashboards Preview Section -->
  <section class="py-5 bg-light" id="portals">
    <div class="container py-4">
      <div class="text-center max-w-700 mx-auto mb-5">
        <span class="text-primary fw-bold text-uppercase font-size-13 letter-spacing-1">Role-Specific Workspaces</span>
        <h2 class="fw-bold mt-1 mb-3">Tailored Experience for Every Stakeholder</h2>
        <p class="text-muted">Explore any of the 10 dedicated role dashboards powered by common layout files.</p>
      </div>

      <div class="row g-3">
        <?php 
          $dash_cards = [
            ['title' => 'Admin Dashboard', 'path' => 'dashboards/admin.php', 'icon' => 'bi-speedometer2', 'color' => 'bg-primary', 'desc' => 'Complete school operations, masters & KPI control.'],
            ['title' => 'Principal Desk', 'path' => 'dashboards/principal.php', 'icon' => 'bi-mortarboard', 'color' => 'bg-success', 'desc' => 'Academic rigor, staff attendance & board compliance.'],
            ['title' => 'Teacher Workplace', 'path' => 'dashboards/teacher.php', 'icon' => 'bi-person-workspace', 'color' => 'bg-warning', 'desc' => 'Daily classes, attendance, diary & marks entry.'],
            ['title' => 'Accountant Desk', 'path' => 'dashboards/accountant.php', 'icon' => 'bi-cash-coin', 'color' => 'bg-info', 'desc' => 'Fee counter, dues collection & expense ledger.'],
            ['title' => 'Admission Desk', 'path' => 'dashboards/admission-officer.php', 'icon' => 'bi-person-plus', 'color' => 'bg-danger', 'desc' => 'Leads, enquiry funnel & document verification.'],
            ['title' => 'Librarian Desk', 'path' => 'dashboards/librarian.php', 'icon' => 'bi-book', 'color' => 'bg-secondary', 'desc' => 'Book catalogue, issue/returns & fine collection.'],
            ['title' => 'Transport Fleet', 'path' => 'dashboards/transport-manager.php', 'icon' => 'bi-bus-front', 'color' => 'bg-primary', 'desc' => 'Live buses, routes, drivers & fuel logs.'],
            ['title' => 'HR Manager', 'path' => 'dashboards/hr-manager.php', 'icon' => 'bi-people', 'color' => 'bg-dark', 'desc' => 'Staff attendance, leaves, payslips & hiring.'],
            ['title' => 'Student Portal', 'path' => 'dashboards/student.php', 'icon' => 'bi-backpack', 'color' => 'bg-success', 'desc' => 'Timetable, homework, admit cards & report card.'],
            ['title' => 'Parent Portal', 'path' => 'dashboards/parent.php', 'icon' => 'bi-house-heart', 'color' => 'bg-warning', 'desc' => 'Child progress, fee payments & bus tracking.']
          ];
        ?>
        <?php foreach ($dash_cards as $dc): ?>
          <div class="col-md-4 col-lg-2-4">
            <a href="<?php echo base_url($dc['path']); ?>" class="card text-decoration-none h-100 border p-3 hover-shadow transition">
              <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge <?php echo $dc['color']; ?> text-white p-2 rounded-circle"><i class="bi <?php echo $dc['icon']; ?>"></i></span>
                <strong class="text-dark dark-text-white"><?php echo $dc['title']; ?></strong>
              </div>
              <p class="text-muted font-size-13 mb-0"><?php echo $dc['desc']; ?></p>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Key Modules Showcase Section -->
  <section class="py-5 bg-white" id="modules">
    <div class="container py-4">
      <div class="text-center max-w-700 mx-auto mb-5">
        <span class="text-primary fw-bold text-uppercase font-size-13 letter-spacing-1">Complete System Architecture</span>
        <h2 class="fw-bold mt-1 mb-3">All 28 Core School Management Modules</h2>
        <p class="text-muted">Built ground-up with reusable PHP components and common includes.</p>
      </div>

      <div class="row g-4">
        <?php foreach (array_slice($modules_registry, 0, 9) as $m): ?>
          <div class="col-md-6 col-lg-4">
            <div class="feature-card">
              <div class="feature-icon-wrap bg-primary-subtle text-primary">
                <i class="bi <?php echo $m['icon']; ?>"></i>
              </div>
              <h5 class="fw-bold mb-2"><?php echo htmlspecialchars($m['name']); ?></h5>
              <p class="text-muted font-size-14 mb-3"><?php echo count($m['submodules']); ?> fully integrated PHP screens with common layout components.</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="badge bg-light text-muted border"><?php echo count($m['submodules']); ?> Screens</span>
                <a href="<?php echo base_url('modules/' . $m['key'] . '/' . $m['submodules'][0]['file']); ?>" class="fw-bold text-primary font-size-14">Explore &rarr;</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="text-center mt-5">
        <a href="<?php echo base_url('dashboards/admin.php'); ?>" class="btn btn-outline-primary btn-lg fw-bold px-4">
          <i class="bi bi-grid-3x3-gap me-2"></i> View All 28 Modules in Admin Dashboard &rarr;
        </a>
      </div>
    </div>
  </section>

  <!-- Public Footer -->
  <footer class="bg-dark text-white pt-5 pb-4">
    <div class="container">
      <div class="row g-4 mb-4">
        <div class="col-lg-4">
          <div class="d-flex align-items-center gap-2 mb-3">
            <div class="brand-icon" style="width: 32px; height: 32px; background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%); border-radius: 6px; display:flex; align-items:center; justify-content:center; color:white;">
              <i class="bi bi-mortarboard-fill"></i>
            </div>
            <h5 class="fw-bold mb-0 text-white"><?php echo htmlspecialchars($school_config['short_name']); ?><span class="text-primary">Pro</span></h5>
          </div>
          <p class="text-muted font-size-14 mb-3">Enterprise-Grade Single-School ERP Software designed for CBSE and State Board schools across India. Common file include architecture ready for Laragon & Laravel.</p>
        </div>

        <div class="col-6 col-lg-2">
          <h6 class="fw-bold text-white mb-3 font-size-14 text-uppercase">Portals</h6>
          <ul class="list-unstyled font-size-14 d-flex flex-column gap-2 text-muted">
            <li><a href="<?php echo base_url('dashboards/admin.php'); ?>" class="text-muted text-decoration-none">Admin Dashboard</a></li>
            <li><a href="<?php echo base_url('dashboards/principal.php'); ?>" class="text-muted text-decoration-none">Principal Desk</a></li>
            <li><a href="<?php echo base_url('dashboards/teacher.php'); ?>" class="text-muted text-decoration-none">Teacher Portal</a></li>
            <li><a href="<?php echo base_url('dashboards/student.php'); ?>" class="text-muted text-decoration-none">Student Portal</a></li>
            <li><a href="<?php echo base_url('dashboards/parent.php'); ?>" class="text-muted text-decoration-none">Parent Portal</a></li>
          </ul>
        </div>

        <div class="col-6 col-lg-2">
          <h6 class="fw-bold text-white mb-3 font-size-14 text-uppercase">Modules</h6>
          <ul class="list-unstyled font-size-14 d-flex flex-column gap-2 text-muted">
            <li><a href="<?php echo base_url('modules/admissions/dashboard.php'); ?>" class="text-muted text-decoration-none">Admissions</a></li>
            <li><a href="<?php echo base_url('modules/academics/dashboard.php'); ?>" class="text-muted text-decoration-none">Academics</a></li>
            <li><a href="<?php echo base_url('modules/fees/fee-collection.php'); ?>" class="text-muted text-decoration-none">Fee Counter</a></li>
            <li><a href="<?php echo base_url('modules/examinations/dashboard.php'); ?>" class="text-muted text-decoration-none">Examinations</a></li>
            <li><a href="<?php echo base_url('modules/transport/dashboard.php'); ?>" class="text-muted text-decoration-none">Transport</a></li>
          </ul>
        </div>

        <div class="col-6 col-lg-2">
          <h6 class="fw-bold text-white mb-3 font-size-14 text-uppercase">Compliance</h6>
          <ul class="list-unstyled font-size-14 d-flex flex-column gap-2 text-muted">
            <li><a href="<?php echo base_url('modules/compliance/cbse-reporting.php'); ?>" class="text-muted text-decoration-none">CBSE LOC & CCE</a></li>
            <li><a href="<?php echo base_url('modules/compliance/udise-data.php'); ?>" class="text-muted text-decoration-none">UDISE+ Reports</a></li>
            <li><a href="<?php echo base_url('modules/compliance/apaar-id.php'); ?>" class="text-muted text-decoration-none">APAAR Registry</a></li>
            <li><a href="<?php echo base_url('modules/compliance/compliance-checklist.php'); ?>" class="text-muted text-decoration-none">Affiliation Audits</a></li>
          </ul>
        </div>

        <div class="col-6 col-lg-2">
          <h6 class="fw-bold text-white mb-3 font-size-14 text-uppercase">Access</h6>
          <ul class="list-unstyled font-size-14 d-flex flex-column gap-2 text-muted">
            <li><a href="<?php echo base_url('login.php'); ?>" class="text-muted text-decoration-none">Sign In</a></li>
            <li><a href="<?php echo base_url('forgot-password.php'); ?>" class="text-muted text-decoration-none">Reset Password</a></li>
            <li><a href="<?php echo base_url('modules/system-settings/general-settings.php'); ?>" class="text-muted text-decoration-none">Settings</a></li>
            <li><a href="<?php echo base_url('unauthorized.php'); ?>" class="text-muted text-decoration-none">Access Control</a></li>
          </ul>
        </div>
      </div>

      <hr class="border-secondary my-4">

      <div class="d-flex flex-wrap justify-content-between align-items-center font-size-13 text-muted">
        <div>
          &copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($school_config['name']); ?>. PHP Architecture Edition.
        </div>
        <div class="d-flex gap-3 mt-2 mt-md-0">
          <a href="#" class="text-muted text-decoration-none">Privacy Policy</a>
          <a href="#" class="text-muted text-decoration-none">Terms of Service</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Core Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url('assets/js/mock-data.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/app.js'); ?>"></script>
</body>
</html>
