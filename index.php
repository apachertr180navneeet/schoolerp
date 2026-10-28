<?php
/**
 * EDUSYS PRO - ULTRA-PREMIUM PUBLIC LANDING PAGE (PHP)
 */
$depth = 0;
require_once __DIR__ . '/includes/config.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($school_config['name']); ?> — Next-Gen School ERP (CBSE & State Board)</title>
  <meta name="description" content="India's leading Single-School ERP platform. Unified academic management, automated fee billing, live bus GPS, biometric attendance, and CBSE CCE progress cards.">
  
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
    :root {
      --hero-bg: #090e1a;
      --card-glass: rgba(255, 255, 255, 0.04);
      --card-border: rgba(255, 255, 255, 0.08);
    }
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background-color: #f8fafc;
      color: #1e293b;
      overflow-x: hidden;
    }
    /* Header Announcement */
    .announcement-bar {
      background: linear-gradient(90deg, #1e3a8a 0%, #3b82f6 50%, #4f46e5 100%);
      color: white;
      padding: 0.6rem 0;
      font-size: 0.8125rem;
      font-weight: 600;
    }
    .announcement-bar a {
      color: #fef08a;
      text-decoration: underline;
      font-weight: 700;
    }
    /* Floating Glass Navbar */
    .navbar-glass {
      background: rgba(255, 255, 255, 0.92);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border-bottom: 1px solid rgba(226, 232, 240, 0.8);
      transition: all 0.3s;
    }
    [data-bs-theme="dark"] .navbar-glass {
      background: rgba(11, 17, 32, 0.92);
      border-bottom-color: rgba(255, 255, 255, 0.08);
    }
    .brand-logo-wrap {
      width: 42px;
      height: 42px;
      background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.45rem;
      box-shadow: 0 4px 12px rgba(37, 99, 235, 0.35);
    }
    /* Hero Section */
    .hero-wrapper {
      background: radial-gradient(circle at 50% 0%, rgba(37, 99, 235, 0.18) 0%, rgba(11, 17, 32, 0) 65%),
                  linear-gradient(180deg, #090e1a 0%, #0f172a 100%);
      color: white;
      padding: 5.5rem 0 4.5rem 0;
      position: relative;
    }
    .hero-badge-pill {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background: rgba(59, 130, 246, 0.15);
      border: 1px solid rgba(96, 165, 250, 0.3);
      padding: 0.4rem 1.15rem;
      border-radius: 30px;
      color: #93c5fd;
      font-size: 0.8125rem;
      font-weight: 700;
      letter-spacing: 0.03em;
      margin-bottom: 1.75rem;
    }
    .hero-badge-pill .pulse-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #38bdf8;
      box-shadow: 0 0 10px #38bdf8;
      animation: pulseAnim 1.8s infinite;
    }
    @keyframes pulseAnim {
      0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(56, 189, 248, 0.7); }
      70% { transform: scale(1); box-shadow: 0 0 0 8px rgba(56, 189, 248, 0); }
      100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(56, 189, 248, 0); }
    }
    .hero-headline {
      font-size: 3.65rem;
      font-weight: 800;
      letter-spacing: -0.035em;
      line-height: 1.15;
      margin-bottom: 1.5rem;
    }
    .gradient-text-blue {
      background: linear-gradient(135deg, #60a5fa 0%, #38bdf8 50%, #818cf8 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .hero-subhead {
      font-size: 1.2rem;
      color: #94a3b8;
      max-width: 760px;
      margin: 0 auto 2.5rem auto;
      line-height: 1.6;
    }
    .btn-hero-primary {
      background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
      border: none;
      color: #ffffff;
      font-weight: 700;
      padding: 0.85rem 2rem;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(37, 99, 235, 0.4);
      transition: all 0.25s;
    }
    .btn-hero-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 14px 30px rgba(37, 99, 235, 0.5);
      color: #ffffff;
    }
    .btn-hero-secondary {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: #ffffff;
      font-weight: 700;
      padding: 0.85rem 1.85rem;
      border-radius: 12px;
      backdrop-filter: blur(10px);
      transition: all 0.25s;
    }
    .btn-hero-secondary:hover {
      background: rgba(255, 255, 255, 0.15);
      border-color: rgba(255, 255, 255, 0.35);
      color: #ffffff;
    }
    /* Product Mockup Stage */
    .product-mockup-frame {
      background: #0f172a;
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 18px;
      box-shadow: 0 35px 80px -15px rgba(0, 0, 0, 0.7);
      overflow: hidden;
      margin-top: 3.5rem;
      position: relative;
    }
    .window-header {
      background: #1e293b;
      padding: 0.85rem 1.25rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .window-dots {
      display: flex;
      align-items: center;
      gap: 6px;
    }
    .window-dots span {
      width: 11px;
      height: 11px;
      border-radius: 50%;
    }
    .window-dots .dot-red { background: #ef4444; }
    .window-dots .dot-yellow { background: #f59e0b; }
    .window-dots .dot-green { background: #10b981; }

    /* Bento Grid Feature Section */
    .bento-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 18px;
      padding: 2rem;
      transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
      height: 100%;
      position: relative;
      overflow: hidden;
    }
    .bento-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.12);
      border-color: #93c5fd;
    }
    .bento-icon-box {
      width: 56px;
      height: 56px;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.65rem;
      margin-bottom: 1.5rem;
    }
    /* Role Portal Card */
    .portal-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 14px;
      padding: 1.35rem;
      text-decoration: none;
      display: block;
      transition: all 0.2s;
      height: 100%;
    }
    .portal-card:hover {
      border-color: #2563eb;
      transform: translateY(-3px);
      box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.15);
    }
    .portal-card h6 {
      color: #0f172a;
      font-weight: 700;
      font-size: 0.95rem;
      margin: 0.5rem 0 0.25rem 0;
    }
    .portal-card p {
      color: #64748b;
      font-size: 0.8125rem;
      margin-bottom: 0;
      line-height: 1.4;
    }
    @media (max-width: 991.98px) {
      .hero-headline {
        font-size: 2.5rem;
      }
    }
  </style>
</head>
<body>

  <!-- Top Announcement Bar -->
  <div class="announcement-bar text-center">
    <div class="container d-flex align-items-center justify-content-center gap-2">
      <span class="badge bg-white text-dark font-size-11">NEW ARCHITECTURE</span>
      <span>CBSE CCE Holistic Progress Card, APAAR DigiLocker ID & UDISE+ Ready.</span>
      <a href="<?php echo base_url('login.php'); ?>" class="ms-2">Launch Demo Login &rarr;</a>
    </div>
  </div>

  <!-- Main Floating Glass Navbar -->
  <nav class="navbar navbar-expand-lg navbar-glass sticky-top py-3">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-3 fw-bold text-dark fs-4" href="<?php echo base_url('index.php'); ?>">
        <div class="brand-logo-wrap">
          <i class="bi bi-mortarboard-fill"></i>
        </div>
        <div>
          <span class="d-block leading-none"><?php echo htmlspecialchars($school_config['short_name']); ?><span class="text-primary">Pro</span></span>
          <small class="font-size-11 text-muted fw-semibold">CBSE & State Board Integrated</small>
        </div>
      </a>

      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navMain">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-semibold font-size-15 gap-lg-3">
          <li class="nav-item"><a class="nav-link text-dark" href="#modules">28 Modules</a></li>
          <li class="nav-item"><a class="nav-link text-dark" href="#portals">10 Role Dashboards</a></li>
          <li class="nav-item"><a class="nav-link text-dark" href="#cbse-state">CBSE Alignment</a></li>
          <li class="nav-item"><a class="nav-link text-dark" href="#printables">Print Previews</a></li>
          <li class="nav-item"><a class="nav-link text-dark" href="#faq">FAQ</a></li>
        </ul>

        <div class="d-flex align-items-center gap-2">
          <!-- Theme Toggle -->
          <button class="btn btn-outline-secondary border-0 btn-sm rounded-circle p-2" id="btnThemeToggle" title="Toggle Theme">
            <i class="bi bi-moon-stars"></i>
          </button>
          <a href="<?php echo base_url('login.php'); ?>" class="btn btn-outline-primary px-3 fw-bold">
            <i class="bi bi-box-arrow-in-right me-1"></i> Sign In
          </a>
          <a href="<?php echo base_url('dashboards/admin.php'); ?>" class="btn btn-primary px-3 fw-bold shadow-sm">
            <i class="bi bi-speedometer2 me-1"></i> Admin Portal
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-wrapper text-center">
    <div class="container">
      <div class="hero-badge-pill">
        <span class="pulse-dot"></span>
        <span>Trusted by 500+ Top CBSE & State Board Institutions</span>
      </div>

      <h1 class="hero-headline">
        The Intelligent Operating System for <br>
        <span class="gradient-text-blue">India's Leading Schools</span>
      </h1>

      <p class="hero-subhead">
        A single unified platform powering Admissions, Automated Fee Collections, Examinations with CBSE CCE Report Cards, Bus Fleet GPS Tracking, and 10 Dedicated Stakeholder Portals.
      </p>

      <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap">
        <a href="<?php echo base_url('dashboards/admin.php'); ?>" class="btn btn-hero-primary d-inline-flex align-items-center gap-2">
          <i class="bi bi-speedometer2 fs-5"></i>
          <span>Launch Super Admin Dashboard</span>
        </a>
        <a href="<?php echo base_url('login.php'); ?>" class="btn btn-hero-secondary d-inline-flex align-items-center gap-2">
          <i class="bi bi-person-badge fs-5"></i>
          <span>Explore 15 Demo Roles</span>
        </a>
        <button class="btn btn-outline-light d-inline-flex align-items-center gap-2 px-3 py-2 border-0 opacity-75" data-bs-toggle="modal" data-bs-target="#demoRequestModal">
          <i class="bi bi-camera-video"></i>
          <span>Book Walkthrough</span>
        </button>
      </div>

      <!-- Live Dashboard Preview Frame -->
      <div class="product-mockup-frame text-start">
        <div class="window-header">
          <div class="d-flex align-items-center gap-3">
            <div class="window-dots">
              <span class="dot-red"></span>
              <span class="dot-yellow"></span>
              <span class="dot-green"></span>
            </div>
            <span class="font-size-13 text-white-50 fw-semibold">
              <i class="bi bi-lock-fill text-success me-1"></i> <?php echo htmlspecialchars($school_config['name']); ?> • Super Admin Command Center
            </span>
          </div>
          <div class="d-flex align-items-center gap-2">
            <span class="badge bg-success-subtle text-success font-size-11">Active Session: 2024-2025</span>
            <a href="<?php echo base_url('dashboards/admin.php'); ?>" class="btn btn-sm btn-primary py-1 px-3 fw-bold font-size-12">
              Open Full Screen &rarr;
            </a>
          </div>
        </div>

        <div class="p-4" style="background: #0b1120;">
          <!-- 4 Core KPIs -->
          <div class="row g-3 mb-4">
            <div class="col-6 col-md-3">
              <div class="p-3 rounded-3 border" style="background: rgba(30, 64, 175, 0.15); border-color: rgba(59, 130, 246, 0.3) !important;">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <span class="text-white-50 font-size-11 text-uppercase fw-bold">Total Students</span>
                    <h3 class="fw-bold text-white mb-0 mt-1">1,878</h3>
                  </div>
                  <div class="p-2 rounded-2 bg-primary text-white"><i class="bi bi-people-fill"></i></div>
                </div>
                <small class="text-success fw-bold font-size-12 mt-2 d-block"><i class="bi bi-arrow-up-short"></i> +142 New Enrolments</small>
              </div>
            </div>

            <div class="col-6 col-md-3">
              <div class="p-3 rounded-3 border" style="background: rgba(16, 185, 129, 0.15); border-color: rgba(16, 185, 129, 0.3) !important;">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <span class="text-white-50 font-size-11 text-uppercase fw-bold">Fee Collection YTD</span>
                    <h3 class="fw-bold text-success mb-0 mt-1">₹4.21 Cr</h3>
                  </div>
                  <div class="p-2 rounded-2 bg-success text-white"><i class="bi bi-currency-rupee"></i></div>
                </div>
                <small class="text-success fw-bold font-size-12 mt-2 d-block"><i class="bi bi-check-circle"></i> 87% Recovery Rate</small>
              </div>
            </div>

            <div class="col-6 col-md-3">
              <div class="p-3 rounded-3 border" style="background: rgba(245, 158, 11, 0.15); border-color: rgba(245, 158, 11, 0.3) !important;">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <span class="text-white-50 font-size-11 text-uppercase fw-bold">Attendance Today</span>
                    <h3 class="fw-bold text-warning mb-0 mt-1">95.4%</h3>
                  </div>
                  <div class="p-2 rounded-2 bg-warning text-white"><i class="bi bi-calendar2-check-fill"></i></div>
                </div>
                <small class="text-warning fw-bold font-size-12 mt-2 d-block"><i class="bi bi-person-check"></i> 1,792 Present</small>
              </div>
            </div>

            <div class="col-6 col-md-3">
              <div class="p-3 rounded-3 border" style="background: rgba(14, 165, 233, 0.15); border-color: rgba(14, 165, 233, 0.3) !important;">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <span class="text-white-50 font-size-11 text-uppercase fw-bold">Staff On Duty</span>
                    <h3 class="fw-bold text-info mb-0 mt-1">118 / 122</h3>
                  </div>
                  <div class="p-2 rounded-2 bg-info text-white"><i class="bi bi-person-workspace"></i></div>
                </div>
                <small class="text-info fw-bold font-size-12 mt-2 d-block"><i class="bi bi-shield-check"></i> 100% Punctuality</small>
              </div>
            </div>
          </div>

          <!-- Bottom Live Data Grid -->
          <div class="row g-3">
            <div class="col-lg-8">
              <div class="p-3 rounded-3 border" style="background: rgba(255, 255, 255, 0.03); border-color: rgba(255, 255, 255, 0.08) !important;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <span class="text-white fw-bold font-size-13"><i class="bi bi-clock-history text-primary me-2"></i> Live Fee Counter Transactions</span>
                  <a href="<?php echo base_url('modules/fees/fee-collection.php'); ?>" class="text-info font-size-12 text-decoration-none fw-semibold">Open Counter &rarr;</a>
                </div>
                <div class="table-responsive">
                  <table class="table table-dark table-borderless table-sm mb-0 font-size-13">
                    <thead>
                      <tr class="text-white-50 border-bottom border-secondary">
                        <th>Receipt #</th>
                        <th>Student</th>
                        <th>Class</th>
                        <th>Mode</th>
                        <th class="text-end">Amount</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="font-mono text-info fw-bold">REC-2024-9182</td>
                        <td>Aarav Sharma</td>
                        <td>Class 10-A</td>
                        <td><span class="badge bg-secondary">Razorpay</span></td>
                        <td class="text-end fw-bold text-success">₹28,500</td>
                        <td><span class="badge bg-success-subtle text-success">Paid</span></td>
                      </tr>
                      <tr>
                        <td class="font-mono text-info fw-bold">REC-2024-9181</td>
                        <td>Diya Patel</td>
                        <td>Class 10-A</td>
                        <td><span class="badge bg-secondary">Net Banking</span></td>
                        <td class="text-end fw-bold text-success">₹28,500</td>
                        <td><span class="badge bg-success-subtle text-success">Paid</span></td>
                      </tr>
                      <tr>
                        <td class="font-mono text-info fw-bold">REC-2024-9180</td>
                        <td>Meera Reddy</td>
                        <td>Class 8-A</td>
                        <td><span class="badge bg-secondary">UPI</span></td>
                        <td class="text-end fw-bold text-success">₹24,200</td>
                        <td><span class="badge bg-success-subtle text-success">Paid</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="p-3 rounded-3 border h-100" style="background: rgba(255, 255, 255, 0.03); border-color: rgba(255, 255, 255, 0.08) !important;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <span class="text-white fw-bold font-size-13"><i class="bi bi-award-fill text-warning me-2"></i> CBSE Board Matrix</span>
                  <span class="badge bg-primary font-size-10">Affiliated</span>
                </div>
                <div class="d-flex flex-column gap-2 mt-3 font-size-13">
                  <div class="p-2 rounded-2" style="background: rgba(255, 255, 255, 0.04);">
                    <small class="text-white-50 d-block">CBSE Affiliation Code</small>
                    <strong class="text-white">2130892 (School Code: 70142)</strong>
                  </div>
                  <div class="p-2 rounded-2" style="background: rgba(255, 255, 255, 0.04);">
                    <small class="text-white-50 d-block">APAAR / DigiLocker Verification</small>
                    <strong class="text-success"><i class="bi bi-check-circle-fill me-1"></i> 100% Synced</strong>
                  </div>
                  <div class="p-2 rounded-2" style="background: rgba(255, 255, 255, 0.04);">
                    <small class="text-white-50 d-block">UDISE+ 2024-25 Preparation</small>
                    <strong class="text-info"><i class="bi bi-file-earmark-check-fill me-1"></i> Data Audit Passed</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 10 Dedicated Role Dashboards Section -->
  <section class="py-5 bg-light" id="portals">
    <div class="container py-4">
      <div class="text-center max-w-700 mx-auto mb-5">
        <span class="text-primary fw-bold text-uppercase font-size-12 letter-spacing-1">10 Dedicated Portals</span>
        <h2 class="fw-bold mt-1 mb-3" style="letter-spacing: -0.02em;">Customized Experience for Every Stakeholder</h2>
        <p class="text-muted">Launch any of the 10 role dashboards directly to test isolated permissions and workflows.</p>
      </div>

      <div class="row g-3">
        <?php 
          $dashboards = [
            ['title' => 'Admin Dashboard', 'path' => 'dashboards/admin.php', 'icon' => 'bi-speedometer2', 'color' => 'bg-primary', 'desc' => 'School-wide master setups, RBAC permissions & audit trails.'],
            ['title' => 'Principal Desk', 'path' => 'dashboards/principal.php', 'icon' => 'bi-mortarboard-fill', 'color' => 'bg-success', 'desc' => 'Academic rigor, teacher observations & board compliance.'],
            ['title' => 'Teacher Workplace', 'path' => 'dashboards/teacher.php', 'icon' => 'bi-person-workspace', 'color' => 'bg-warning', 'desc' => 'Daily attendance, homework, teaching diary & marks entry.'],
            ['title' => 'Accountant Desk', 'path' => 'dashboards/accountant.php', 'icon' => 'bi-cash-coin', 'color' => 'bg-info', 'desc' => 'Fee counter POS, dues tracking, ledgers & bank vouchers.'],
            ['title' => 'Admission Desk', 'path' => 'dashboards/admission-officer.php', 'icon' => 'bi-person-plus-fill', 'color' => 'bg-danger', 'desc' => 'Leads funnel, document verification & merit lists.'],
            ['title' => 'Library Desk', 'path' => 'dashboards/librarian.php', 'icon' => 'bi-book-half', 'color' => 'bg-secondary', 'desc' => 'Accession catalogue, barcode issue/returns & fine counter.'],
            ['title' => 'Transport Fleet', 'path' => 'dashboards/transport-manager.php', 'icon' => 'bi-bus-front-fill', 'color' => 'bg-primary', 'desc' => 'Live GPS bus tracking, route stops & driver records.'],
            ['title' => 'HR Manager', 'path' => 'dashboards/hr-manager.php', 'icon' => 'bi-people-fill', 'color' => 'bg-dark', 'desc' => 'Staff directory, biometric attendance, leaves & payslips.'],
            ['title' => 'Student Portal', 'path' => 'dashboards/student.php', 'icon' => 'bi-backpack-fill', 'color' => 'bg-success', 'desc' => 'Personal timetable, homework, admit cards & report cards.'],
            ['title' => 'Parent Portal', 'path' => 'dashboards/parent.php', 'icon' => 'bi-house-heart-fill', 'color' => 'bg-warning', 'desc' => 'Multi-child switcher, fee online payment & bus tracking.']
          ];
        ?>
        <?php foreach ($dashboards as $d): ?>
          <div class="col-md-4 col-lg-2-4">
            <a href="<?php echo base_url($d['path']); ?>" class="portal-card">
              <div class="d-flex align-items-center gap-2">
                <div class="rounded-circle <?php echo $d['color']; ?> text-white d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; font-size: 1.15rem;">
                  <i class="bi <?php echo $d['icon']; ?>"></i>
                </div>
                <div>
                  <h6><?php echo htmlspecialchars($d['title']); ?></h6>
                </div>
              </div>
              <p class="mt-2"><?php echo htmlspecialchars($d['desc']); ?></p>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Bento-Grid Core Modules Section -->
  <section class="py-5 bg-white" id="modules">
    <div class="container py-4">
      <div class="text-center max-w-700 mx-auto mb-5">
        <span class="text-primary fw-bold text-uppercase font-size-12 letter-spacing-1">Modular Capability</span>
        <h2 class="fw-bold mt-1 mb-3" style="letter-spacing: -0.02em;">Comprehensive School Management Modules</h2>
        <p class="text-muted">Explore 28 fully integrated functional modules spanning 584 submodules.</p>
      </div>

      <div class="row g-4">
        <!-- 1. Academics (Large Card) -->
        <div class="col-lg-6">
          <div class="bento-card" style="background: linear-gradient(135deg, #eff6ff 0%, #ffffff 100%); border-color: #bfdbfe;">
            <div class="bento-icon-box bg-primary text-white">
              <i class="bi bi-mortarboard-fill"></i>
            </div>
            <span class="badge bg-primary font-size-11 mb-2">Academic Core</span>
            <h4 class="fw-bold mb-2">Curriculum, Timetable & Examination Center</h4>
            <p class="text-muted font-size-14 mb-4">
              Automated clash-free timetable scheduler, lesson planning, teacher diaries, online CBT tests, and official CBSE CCE grading scale (A1 to E).
            </p>
            <div class="row g-2 mb-4 font-size-13">
              <div class="col-6"><i class="bi bi-check2 text-primary me-1"></i> Conflict-Free Timetable</div>
              <div class="col-6"><i class="bi bi-check2 text-primary me-1"></i> NEP 2020 CCE Report Cards</div>
              <div class="col-6"><i class="bi bi-check2 text-primary me-1"></i> Internal Assessment (20%)</div>
              <div class="col-6"><i class="bi bi-check2 text-primary me-1"></i> Question Paper Generator</div>
            </div>
            <a href="<?php echo base_url('modules/academics/dashboard.php'); ?>" class="btn btn-primary fw-bold px-4">
              Explore Academics (28 Screens) &rarr;
            </a>
          </div>
        </div>

        <!-- 2. Fees & Cashier -->
        <div class="col-lg-6">
          <div class="bento-card" style="background: linear-gradient(135deg, #ecfdf5 0%, #ffffff 100%); border-color: #a7f3d0;">
            <div class="bento-icon-box bg-success text-white">
              <i class="bi bi-credit-card-2-front-fill"></i>
            </div>
            <span class="badge bg-success font-size-11 mb-2">Finance Engine</span>
            <h4 class="fw-bold mb-2">Automated Fee Counter & Online Collections</h4>
            <p class="text-muted font-size-14 mb-4">
              Multi-mode cashier counter (Cash, Cheque, UPI, Razorpay), automated sibling discount rules, 3-copy fee receipt generation, and defaulters ledger.
            </p>
            <div class="row g-2 mb-4 font-size-13">
              <div class="col-6"><i class="bi bi-check2 text-success me-1"></i> Partial & Advance Payments</div>
              <div class="col-6"><i class="bi bi-check2 text-success me-1"></i> Multi-Copy Formal Receipts</div>
              <div class="col-6"><i class="bi bi-check2 text-success me-1"></i> Sibling & Staff Discounts</div>
              <div class="col-6"><i class="bi bi-check2 text-success me-1"></i> Aging Outstanding Reports</div>
            </div>
            <a href="<?php echo base_url('modules/fees/fee-collection.php'); ?>" class="btn btn-success fw-bold px-4 text-white">
              Explore Fees (38 Screens) &rarr;
            </a>
          </div>
        </div>

        <!-- 3. Admissions -->
        <div class="col-md-6 col-lg-4">
          <div class="bento-card">
            <div class="bento-icon-box bg-info-subtle text-info">
              <i class="bi bi-person-plus-fill"></i>
            </div>
            <h5 class="fw-bold mb-2">Admission & Lead CRM</h5>
            <p class="text-muted font-size-14 mb-3">Enquiry follow-ups, online & offline applications, document verification, entrance merit lists & waiting lists.</p>
            <a href="<?php echo base_url('modules/admissions/dashboard.php'); ?>" class="fw-bold text-info font-size-14">View Admissions (18 Screens) &rarr;</a>
          </div>
        </div>

        <!-- 4. Transport & GPS -->
        <div class="col-md-6 col-lg-4">
          <div class="bento-card">
            <div class="bento-icon-box bg-warning-subtle text-warning">
              <i class="bi bi-bus-front-fill"></i>
            </div>
            <h5 class="fw-bold mb-2">Transport Fleet & GPS</h5>
            <p class="text-muted font-size-14 mb-3">Live vehicle GPS tracking, route stop allocations, parent proximity alerts ('Bus 2 stops away'), fuel & fitness logs.</p>
            <a href="<?php echo base_url('modules/transport/dashboard.php'); ?>" class="fw-bold text-warning font-size-14">View Transport (22 Screens) &rarr;</a>
          </div>
        </div>

        <!-- 5. Attendance & Biometrics -->
        <div class="col-md-6 col-lg-4">
          <div class="bento-card">
            <div class="bento-icon-box bg-danger-subtle text-danger">
              <i class="bi bi-fingerprint"></i>
            </div>
            <h5 class="fw-bold mb-2">Attendance & Biometrics</h5>
            <p class="text-muted font-size-14 mb-3">ZKTeco & Essl biometric integration, RFID turnstiles, 9:30 AM absentee parent alerts, and CBSE <75% warnings.</p>
            <a href="<?php echo base_url('modules/attendance/daily-attendance.php'); ?>" class="fw-bold text-danger font-size-14">View Attendance (20 Screens) &rarr;</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Official Printables Preview Section -->
  <section class="py-5 bg-light" id="printables">
    <div class="container py-4">
      <div class="row align-items-center g-5">
        <div class="col-lg-6">
          <span class="badge bg-primary-subtle text-primary fw-bold font-size-12 mb-2">Official Documents</span>
          <h2 class="fw-bold mb-3" style="letter-spacing: -0.02em;">Print-Ready Formats & Certificates</h2>
          <p class="text-muted mb-4">Every critical institutional certificate and report card comes pre-configured with print-optimized CSS hiding navigation bars and sidebars:</p>

          <div class="list-group list-group-flush border rounded-3 bg-white shadow-sm">
            <a href="<?php echo base_url('modules/examinations/report-cards.php'); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
              <div class="d-flex align-items-center gap-3">
                <i class="bi bi-file-earmark-bar-graph text-primary fs-4"></i>
                <div>
                  <strong class="d-block font-size-14">CBSE Official Report Card (Class 10 / 12)</strong>
                  <small class="text-muted">Scholastic, Co-Scholastic, Remarks & Seal</small>
                </div>
              </div>
              <span class="btn btn-sm btn-outline-primary">Preview & Print</span>
            </a>

            <a href="<?php echo base_url('modules/students/transfer-certificates.php'); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
              <div class="d-flex align-items-center gap-3">
                <i class="bi bi-award text-success fs-4"></i>
                <div>
                  <strong class="d-block font-size-14">Transfer Certificate (TC)</strong>
                  <small class="text-muted">Numbered serial register with counter-signatures</small>
                </div>
              </div>
              <span class="btn btn-sm btn-outline-success">Preview & Print</span>
            </a>

            <a href="<?php echo base_url('modules/students/id-cards.php'); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
              <div class="d-flex align-items-center gap-3">
                <i class="bi bi-card-heading text-warning fs-4"></i>
                <div>
                  <strong class="d-block font-size-14">Student & Staff Barcode ID Cards</strong>
                  <small class="text-muted">Batch photo cards with barcodes & emergency contacts</small>
                </div>
              </div>
              <span class="btn btn-sm btn-outline-warning">Preview & Print</span>
            </a>

            <a href="<?php echo base_url('modules/fees/receipt-generation.php'); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
              <div class="d-flex align-items-center gap-3">
                <i class="bi bi-receipt text-info fs-4"></i>
                <div>
                  <strong class="d-block font-size-14">Official 3-Copy Fee Receipt</strong>
                  <small class="text-muted">Student, School & Bank copy with GST breakup</small>
                </div>
              </div>
              <span class="btn btn-sm btn-outline-info">Preview & Print</span>
            </a>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card border rounded-3 p-4 shadow-sm bg-white">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <span class="badge bg-success-subtle text-success fw-bold font-size-12"><i class="bi bi-check2-circle me-1"></i> Live Document Preview</span>
              <small class="text-muted font-size-12">Class 10 CBSE Format</small>
            </div>
            
            <div class="p-3 border rounded-3 text-center" style="background: #fafafa;">
              <h5 class="fw-bold mb-1 text-primary"><?php echo htmlspecialchars($school_config['name']); ?></h5>
              <small class="text-muted d-block mb-3 font-size-12">Affiliated to CBSE, New Delhi (Affiliation No: 2130892)</small>
              <span class="badge bg-primary px-3 py-1 font-size-11 mb-3">HOLISTIC PROGRESS CARD</span>

              <div class="text-start font-size-12 mb-3">
                <div class="row g-1">
                  <div class="col-6"><strong>Student:</strong> Aarav Sharma</div>
                  <div class="col-6"><strong>Admission:</strong> ADM-8491</div>
                  <div class="col-6"><strong>Class:</strong> 10-A | Roll: 01</div>
                  <div class="col-6"><strong>APAAR ID:</strong> APAAR-8941-0294-1182</div>
                </div>
              </div>

              <div class="table-responsive">
                <table class="table table-bordered table-sm font-size-12 mb-0">
                  <thead class="table-light">
                    <tr><th>Subject</th><th>Theory (80)</th><th>IA (20)</th><th>Total (100)</th><th>Grade</th></tr>
                  </thead>
                  <tbody>
                    <tr><td>English Lang & Lit</td><td>72</td><td>19</td><td><strong>91</strong></td><td><span class="badge bg-success font-size-11">A1</span></td></tr>
                    <tr><td>Mathematics Std</td><td>69</td><td>18</td><td><strong>87</strong></td><td><span class="badge bg-success font-size-11">A2</span></td></tr>
                    <tr><td>Science</td><td>71</td><td>19</td><td><strong>90</strong></td><td><span class="badge bg-success font-size-11">A1</span></td></tr>
                    <tr><td>Social Science</td><td>74</td><td>19</td><td><strong>93</strong></td><td><span class="badge bg-success font-size-11">A1</span></td></tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="py-5 bg-white" id="faq">
    <div class="container py-4">
      <div class="text-center max-w-700 mx-auto mb-5">
        <span class="text-primary fw-bold text-uppercase font-size-12 letter-spacing-1">Support & FAQ</span>
        <h2 class="fw-bold mt-1 mb-3" style="letter-spacing: -0.02em;">Frequently Asked Questions</h2>
        <p class="text-muted">Common technical and functional inquiries regarding the prototype.</p>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="accordion" id="faqAccordion">
            <div class="accordion-item border rounded-3 mb-3">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button fw-bold font-size-15" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                  How does the Common Include architecture work in PHP?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted font-size-14">
                  The entire prototype utilizes shared PHP partials in <code>includes/</code>: <code>config.php</code>, <code>header.php</code>, <code>sidebar.php</code>, <code>topbar.php</code>, <code>modals.php</code>, and <code>footer.php</code>. Any modification made to the navigation, header, or footer automatically updates all 584 module pages instantly.
                </div>
              </div>
            </div>

            <div class="accordion-item border rounded-3 mb-3">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed fw-bold font-size-15" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                  How do I test different stakeholder roles?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted font-size-14">
                  Visit the <a href="<?php echo base_url('login.php'); ?>" class="fw-bold">Login Screen</a> and click on any of the 15 role cards (Leadership, Academics, Operations, Student, Parent). The credentials will auto-fill and redirect you immediately to that role's dedicated workspace.
                </div>
              </div>
            </div>

            <div class="accordion-item border rounded-3 mb-3">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed fw-bold font-size-15" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                  Can this prototype be integrated directly into Laravel?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted font-size-14">
                  Yes. The clean HTML and Bootstrap 5 components can be directly converted into Blade layouts and Eloquent models with zero layout rework.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Public Footer -->
  <footer class="bg-dark text-white pt-5 pb-4">
    <div class="container">
      <div class="row g-4 mb-4">
        <div class="col-lg-4">
          <div class="d-flex align-items-center gap-3 mb-3">
            <div class="brand-logo-wrap">
              <i class="bi bi-mortarboard-fill"></i>
            </div>
            <div>
              <h4 class="fw-bold mb-0 text-white"><?php echo htmlspecialchars($school_config['short_name']); ?><span class="text-primary">Pro</span></h4>
              <small class="text-white-50">Enterprise School ERP System</small>
            </div>
          </div>
          <p class="text-white-50 font-size-14 mb-3">
            Comprehensive single-school ERP prototype designed for CBSE and State Board schools across India. Powered by common PHP include partials.
          </p>
        </div>

        <div class="col-6 col-lg-2">
          <h6 class="fw-bold text-white mb-3 font-size-13 text-uppercase letter-spacing-1">Portals</h6>
          <ul class="list-unstyled font-size-14 d-flex flex-column gap-2 text-white-50">
            <li><a href="<?php echo base_url('dashboards/admin.php'); ?>" class="text-white-50 text-decoration-none">Admin Dashboard</a></li>
            <li><a href="<?php echo base_url('dashboards/principal.php'); ?>" class="text-white-50 text-decoration-none">Principal Desk</a></li>
            <li><a href="<?php echo base_url('dashboards/teacher.php'); ?>" class="text-white-50 text-decoration-none">Teacher Portal</a></li>
            <li><a href="<?php echo base_url('dashboards/student.php'); ?>" class="text-white-50 text-decoration-none">Student Portal</a></li>
            <li><a href="<?php echo base_url('dashboards/parent.php'); ?>" class="text-white-50 text-decoration-none">Parent Portal</a></li>
          </ul>
        </div>

        <div class="col-6 col-lg-2">
          <h6 class="fw-bold text-white mb-3 font-size-13 text-uppercase letter-spacing-1">Key Modules</h6>
          <ul class="list-unstyled font-size-14 d-flex flex-column gap-2 text-white-50">
            <li><a href="<?php echo base_url('modules/admissions/dashboard.php'); ?>" class="text-white-50 text-decoration-none">Admissions</a></li>
            <li><a href="<?php echo base_url('modules/academics/dashboard.php'); ?>" class="text-white-50 text-decoration-none">Academics</a></li>
            <li><a href="<?php echo base_url('modules/fees/fee-collection.php'); ?>" class="text-white-50 text-decoration-none">Fee Counter</a></li>
            <li><a href="<?php echo base_url('modules/examinations/dashboard.php'); ?>" class="text-white-50 text-decoration-none">Examinations</a></li>
            <li><a href="<?php echo base_url('modules/transport/dashboard.php'); ?>" class="text-white-50 text-decoration-none">Transport Fleet</a></li>
          </ul>
        </div>

        <div class="col-6 col-lg-2">
          <h6 class="fw-bold text-white mb-3 font-size-13 text-uppercase letter-spacing-1">Compliance</h6>
          <ul class="list-unstyled font-size-14 d-flex flex-column gap-2 text-white-50">
            <li><a href="<?php echo base_url('modules/compliance/cbse-reporting.php'); ?>" class="text-white-50 text-decoration-none">CBSE LOC & CCE</a></li>
            <li><a href="<?php echo base_url('modules/compliance/udise-data.php'); ?>" class="text-white-50 text-decoration-none">UDISE+ Reports</a></li>
            <li><a href="<?php echo base_url('modules/compliance/apaar-id.php'); ?>" class="text-white-50 text-decoration-none">APAAR Registry</a></li>
            <li><a href="<?php echo base_url('modules/compliance/compliance-checklist.php'); ?>" class="text-white-50 text-decoration-none">Affiliation Audits</a></li>
          </ul>
        </div>

        <div class="col-6 col-lg-2">
          <h6 class="fw-bold text-white mb-3 font-size-13 text-uppercase letter-spacing-1">Access</h6>
          <ul class="list-unstyled font-size-14 d-flex flex-column gap-2 text-white-50">
            <li><a href="<?php echo base_url('login.php'); ?>" class="text-white-50 text-decoration-none">Sign In</a></li>
            <li><a href="<?php echo base_url('forgot-password.php'); ?>" class="text-white-50 text-decoration-none">Reset Password</a></li>
            <li><a href="<?php echo base_url('modules/system-settings/general-settings.php'); ?>" class="text-white-50 text-decoration-none">Settings</a></li>
            <li><a href="<?php echo base_url('unauthorized.php'); ?>" class="text-white-50 text-decoration-none">Access Control</a></li>
          </ul>
        </div>
      </div>

      <hr class="border-secondary my-4">

      <div class="d-flex flex-wrap justify-content-between align-items-center font-size-13 text-white-50">
        <div>
          &copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($school_config['name']); ?>. Single-School ERP Prototype.
        </div>
        <div class="d-flex gap-3 mt-2 mt-md-0">
          <a href="#" class="text-white-50 text-decoration-none">Privacy Policy</a>
          <a href="#" class="text-white-50 text-decoration-none">Terms of Service</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Demo Request Modal -->
  <div class="modal fade" id="demoRequestModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="bi bi-camera-video text-primary me-2"></i> Book ERP Demonstration</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form onsubmit="event.preventDefault(); bootstrap.Modal.getInstance(document.getElementById('demoRequestModal')).hide(); EduApp.toast('Demo scheduled! Check your inbox for the calendar invite.', 'success', 'Confirmed');">
          <div class="modal-body">
            <p class="text-muted font-size-14 mb-3">Schedule a 1-on-1 walkthrough with our school ERP domain consultant.</p>
            <div class="mb-3">
              <label class="form-label">Full Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" required placeholder="e.g. Dr. Anil Khera">
            </div>
            <div class="mb-3">
              <label class="form-label">School Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" required placeholder="e.g. St. Xavier's Model School">
            </div>
            <div class="mb-3">
              <label class="form-label">Email Address <span class="text-danger">*</span></label>
              <input type="email" class="form-control" required placeholder="name@school.edu.in">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary fw-bold">Confirm Booking</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Core Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url('assets/js/mock-data.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/app.js'); ?>"></script>
</body>
</html>
