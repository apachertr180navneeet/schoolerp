<?php
/**
 * EDUSYS PRO - ULTRA-PREMIUM PUBLIC LANDING PAGE (PHP)
 * Delhi Public Global Academy — CBSE & State Board Enterprise ERP
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
      --brand-navy-deep: #080d1a;
      --brand-navy-card: #0f172a;
      --brand-blue-glow: rgba(37, 99, 235, 0.25);
    }
    
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background-color: #f8fafc;
      color: #1e293b;
      overflow-x: hidden;
      margin: 0;
      padding: 0;
    }

    /* Top Announcement Bar */
    .top-announcement {
      background: linear-gradient(90deg, #1e3a8a 0%, #2563eb 50%, #4f46e5 100%);
      color: #ffffff;
      padding: 0.55rem 1rem;
      font-size: 0.8125rem;
      font-weight: 600;
      text-align: center;
    }
    .top-announcement a {
      color: #fef08a;
      text-decoration: underline;
      font-weight: 700;
      margin-left: 0.4rem;
    }

    /* Modern Glass Header */
    .navbar-master {
      background: rgba(255, 255, 255, 0.94);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border-bottom: 1px solid rgba(226, 232, 240, 0.85);
      position: sticky;
      top: 0;
      z-index: 1040;
      transition: all 0.25s;
    }
    .brand-logo-icon {
      width: 42px;
      height: 42px;
      background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.45rem;
      box-shadow: 0 4px 12px rgba(37, 99, 235, 0.35);
    }
    .nav-link-custom {
      font-size: 0.875rem;
      font-weight: 600;
      color: #475569;
      padding: 0.5rem 0.85rem !important;
      border-radius: 8px;
      transition: all 0.2s;
    }
    .nav-link-custom:hover {
      color: #1e40af;
      background: rgba(30, 64, 175, 0.05);
    }

    /* Epic Hero Section */
    .hero-space {
      background: radial-gradient(circle at 50% 0%, rgba(37, 99, 235, 0.22) 0%, rgba(15, 23, 42, 0) 65%),
                  radial-gradient(circle at 85% 30%, rgba(99, 102, 241, 0.15) 0%, transparent 45%),
                  radial-gradient(circle at 15% 40%, rgba(14, 165, 233, 0.15) 0%, transparent 45%),
                  linear-gradient(180deg, #080d1a 0%, #0f172a 100%);
      color: #ffffff;
      padding: 5rem 0 5.5rem 0;
      position: relative;
    }
    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.55rem;
      background: rgba(59, 130, 246, 0.12);
      border: 1px solid rgba(96, 165, 250, 0.35);
      padding: 0.4rem 1.15rem;
      border-radius: 30px;
      color: #93c5fd;
      font-size: 0.8125rem;
      font-weight: 700;
      letter-spacing: 0.03em;
      margin-bottom: 1.75rem;
    }
    .pulse-dot-cyan {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #38bdf8;
      box-shadow: 0 0 10px #38bdf8;
      animation: pulseCyan 1.8s infinite;
    }
    @keyframes pulseCyan {
      0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(56, 189, 248, 0.7); }
      70% { transform: scale(1); box-shadow: 0 0 0 8px rgba(56, 189, 248, 0); }
      100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(56, 189, 248, 0); }
    }
    .hero-title {
      font-size: 3.5rem;
      font-weight: 800;
      letter-spacing: -0.035em;
      line-height: 1.15;
      margin-bottom: 1.5rem;
    }
    .gradient-text-sky {
      background: linear-gradient(135deg, #60a5fa 0%, #38bdf8 50%, #818cf8 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .hero-subtitle {
      font-size: 1.18rem;
      color: #94a3b8;
      max-width: 780px;
      margin: 0 auto 2.5rem auto;
      line-height: 1.65;
    }

    /* Hero Buttons */
    .btn-hero-lead {
      background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
      border: none;
      color: #ffffff;
      font-weight: 700;
      padding: 0.85rem 2rem;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(37, 99, 235, 0.4);
      transition: all 0.25s;
      display: inline-flex;
      align-items: center;
      gap: 0.6rem;
      text-decoration: none;
    }
    .btn-hero-lead:hover {
      background: linear-gradient(135deg, #1d4ed8 0%, #1e3a8a 100%);
      transform: translateY(-2px);
      box-shadow: 0 14px 30px rgba(37, 99, 235, 0.5);
      color: #ffffff;
    }
    .btn-hero-ghost {
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.18);
      color: #ffffff;
      font-weight: 600;
      padding: 0.85rem 1.85rem;
      border-radius: 12px;
      transition: all 0.25s;
      display: inline-flex;
      align-items: center;
      gap: 0.6rem;
      text-decoration: none;
    }
    .btn-hero-ghost:hover {
      background: rgba(255, 255, 255, 0.12);
      border-color: rgba(255, 255, 255, 0.35);
      color: #ffffff;
      transform: translateY(-2px);
    }

    /* Central Command Console Preview Frame */
    .preview-mac-window {
      background: #0b1120;
      border: 1px solid rgba(255, 255, 255, 0.14);
      border-radius: 18px;
      box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.7), 0 0 40px rgba(37, 99, 235, 0.2);
      overflow: hidden;
      margin-top: 3.5rem;
      position: relative;
    }
    .mac-window-header {
      background: #0f172a;
      padding: 0.85rem 1.5rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .mac-dots {
      display: flex;
      gap: 7px;
    }
    .mac-dot {
      width: 12px;
      height: 12px;
      border-radius: 50%;
    }
    .dot-red { background: #ef4444; }
    .dot-yellow { background: #f59e0b; }
    .dot-green { background: #10b981; }

    /* Preview KPI Ribbon */
    .preview-kpi-bar {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1rem;
      padding: 1.25rem 1.5rem;
      background: rgba(15, 23, 42, 0.5);
      border-bottom: 1px solid rgba(255, 255, 255, 0.06);
    }
    .kpi-tile {
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 12px;
      padding: 1rem;
    }
    .kpi-tile h4 {
      font-size: 1.5rem;
      font-weight: 800;
      color: #ffffff;
      margin: 0;
      letter-spacing: -0.02em;
    }
    .kpi-tile small {
      font-size: 0.75rem;
      text-transform: uppercase;
      font-weight: 700;
      letter-spacing: 0.05em;
    }

    /* Interactive Preview Navigation Tabs */
    .preview-subnav {
      display: flex;
      gap: 0.5rem;
      padding: 0.85rem 1.5rem 0 1.5rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }
    .preview-tab-btn {
      background: none;
      border: none;
      color: #94a3b8;
      font-size: 0.85rem;
      font-weight: 600;
      padding: 0.6rem 1rem;
      border-bottom: 2px solid transparent;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      transition: all 0.2s;
    }
    .preview-tab-btn.active {
      color: #38bdf8;
      border-bottom-color: #38bdf8;
    }

    /* Preview Table Inside Console */
    .preview-table-wrap {
      padding: 1.25rem 1.5rem 1.5rem 1.5rem;
      overflow-x: auto;
    }
    .table-dark-preview {
      width: 100%;
      margin: 0;
      border-collapse: collapse;
      font-size: 0.875rem;
      color: #e2e8f0;
    }
    .table-dark-preview th {
      padding: 0.75rem 1rem;
      background: rgba(255, 255, 255, 0.02);
      color: #94a3b8;
      font-weight: 600;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      white-space: nowrap;
    }
    .table-dark-preview td {
      padding: 0.85rem 1rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.04);
      vertical-align: middle;
      white-space: nowrap;
    }

    /* Trust & Credentials Strip */
    .trust-strip {
      background: #0f172a;
      border-top: 1px solid rgba(255, 255, 255, 0.08);
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      padding: 1.5rem 0;
      color: #ffffff;
    }
    .trust-item {
      display: flex;
      align-items: center;
      gap: 0.85rem;
      padding: 0.5rem 1rem;
    }
    .trust-item i {
      font-size: 1.75rem;
      color: #38bdf8;
    }
    .trust-item h6 {
      font-size: 0.875rem;
      font-weight: 700;
      margin: 0;
      color: #ffffff;
    }
    .trust-item small {
      font-size: 0.75rem;
      color: #94a3b8;
    }

    /* 10 Portals Section */
    .section-title-wrap {
      text-align: center;
      max-width: 720px;
      margin: 0 auto 3rem auto;
    }
    .section-badge {
      display: inline-block;
      font-size: 0.8rem;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: #2563eb;
      margin-bottom: 0.6rem;
    }
    .section-heading {
      font-size: 2.35rem;
      font-weight: 800;
      letter-spacing: -0.025em;
      color: #0f172a;
      margin-bottom: 1rem;
    }

    /* Portal Card Grid */
    .portals-grid {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      gap: 1.25rem;
    }
    .portal-card-premium {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 16px;
      padding: 1.5rem 1.25rem;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
      box-shadow: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
      position: relative;
    }
    .portal-card-premium:hover {
      transform: translateY(-5px);
      box-shadow: 0 16px 30px -10px rgba(37, 99, 235, 0.2);
      border-color: #93c5fd;
    }
    .portal-icon-wrapper {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      margin-bottom: 1.25rem;
    }
    .p-icon-admin { background: rgba(37, 99, 235, 0.1); color: #2563eb; }
    .p-icon-principal { background: rgba(16, 185, 129, 0.1); color: #10b981; }
    .p-icon-teacher { background: rgba(245, 158, 11, 0.1); color: #f59e0b; }
    .p-icon-accounts { background: rgba(6, 182, 212, 0.1); color: #06b6d4; }
    .p-icon-admission { background: rgba(244, 63, 94, 0.1); color: #f43f5e; }
    .p-icon-library { background: rgba(168, 85, 247, 0.1); color: #a855f7; }
    .p-icon-transport { background: rgba(14, 165, 233, 0.1); color: #0ea5e9; }
    .p-icon-hr { background: rgba(99, 102, 241, 0.1); color: #6366f1; }
    .p-icon-student { background: rgba(16, 185, 129, 0.1); color: #10b981; }
    .p-icon-parent { background: rgba(249, 115, 22, 0.1); color: #f97316; }

    .portal-card-premium h5 {
      font-size: 1.05rem;
      font-weight: 700;
      color: #0f172a;
      margin-bottom: 0.5rem;
    }
    .portal-card-premium p {
      font-size: 0.8125rem;
      color: #64748b;
      line-height: 1.5;
      margin-bottom: 1.25rem;
    }
    .portal-link-btn {
      font-size: 0.8125rem;
      font-weight: 700;
      color: #2563eb;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 0.35rem;
      transition: gap 0.2s;
    }
    .portal-card-premium:hover .portal-link-btn {
      gap: 0.55rem;
      color: #1d4ed8;
    }

    /* Bento Grid Capabilities */
    .bento-grid-wrap {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1.5rem;
    }
    .bento-card-large {
      grid-column: span 2;
    }
    .bento-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 18px;
      padding: 2rem;
      box-shadow: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
      transition: all 0.25s;
    }
    .bento-card:hover {
      box-shadow: 0 12px 25px -8px rgba(15, 23, 42, 0.12);
      border-color: #cbd5e1;
    }

    /* CBSE CCE Progress Card Replica */
    .cce-replica-card {
      background: #ffffff;
      border: 2px solid #cbd5e1;
      border-radius: 14px;
      padding: 1.75rem;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      position: relative;
    }
    .cce-stamp {
      position: absolute;
      bottom: 25px;
      right: 35px;
      border: 2px dashed #16a34a;
      color: #16a34a;
      padding: 0.4rem 1rem;
      font-weight: 800;
      font-size: 0.78rem;
      border-radius: 8px;
      text-transform: uppercase;
      transform: rotate(-8deg);
      opacity: 0.85;
    }

    /* Responsive */
    @media (max-width: 1200px) {
      .portals-grid {
        grid-template-columns: repeat(3, 1fr);
      }
      .bento-grid-wrap {
        grid-template-columns: repeat(2, 1fr);
      }
      .bento-card-large {
        grid-column: span 2;
      }
    }
    @media (max-width: 991.98px) {
      .hero-title {
        font-size: 2.65rem;
      }
      .preview-kpi-bar {
        grid-template-columns: repeat(2, 1fr);
      }
      .portals-grid {
        grid-template-columns: repeat(2, 1fr);
      }
      .bento-grid-wrap {
        grid-template-columns: 1fr;
      }
      .bento-card-large {
        grid-column: span 1;
      }
    }
    @media (max-width: 576px) {
      .hero-title {
        font-size: 2.15rem;
      }
      .preview-kpi-bar {
        grid-template-columns: 1fr;
      }
      .portals-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>

  <!-- TOP ANNOUNCEMENT -->
  <div class="top-announcement">
    <span>✨ CBSE 2024–25 CCE Holistic Progress Card, APAAR DigiLocker ID & UDISE+ Ready.</span>
    <a href="<?php echo base_url('login.php'); ?>">Launch Institutional Portal &rarr;</a>
  </div>

  <!-- FIXED GLASS NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-master">
    <div class="container-fluid px-lg-5">
      <!-- Brand Logo -->
      <a class="navbar-brand d-flex align-items-center gap-3" href="<?php echo base_url('index.php'); ?>">
        <div class="brand-logo-icon">
          <i class="bi bi-mortarboard-fill"></i>
        </div>
        <div>
          <span class="fw-bold font-size-18 text-dark mb-0 d-block" style="letter-spacing: -0.02em;">
            <?php echo htmlspecialchars($school_config['short_name']); ?><span class="text-primary">Pro</span>
          </span>
          <span class="font-size-11 text-muted text-uppercase fw-bold letter-spacing-1">CBSE & State Board Integrated</span>
        </div>
      </a>

      <!-- Mobile Hamburger -->
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Nav Menu Items -->
      <div class="collapse navbar-collapse" id="navContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-1">
          <li class="nav-item">
            <a class="nav-link nav-link-custom" href="#portals">Portals (10 Roles)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-custom" href="#academics">Academic Engine</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-custom" href="#fee-pos">Automated Fee POS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-custom" href="#cce-report">CBSE Report Card</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-custom" href="#modules">All 28 Modules</a>
          </li>
        </ul>

        <!-- Action CTAs -->
        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn btn-outline-primary btn-sm px-3 py-2 fw-semibold rounded-pill" data-bs-toggle="modal" data-bs-target="#demoRolesModal">
            <i class="bi bi-lightning-charge-fill me-1 text-warning"></i> 15 Demo Accounts
          </button>
          <a href="<?php echo base_url('login.php'); ?>" class="btn btn-primary btn-sm px-4 py-2 fw-bold rounded-pill shadow-sm">
            <i class="bi bi-shield-lock me-1"></i> Sign In
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- EPIC HERO SECTION -->
  <section class="hero-space">
    <div class="container text-center">
      <!-- Badge -->
      <div class="hero-badge">
        <span class="pulse-dot-cyan"></span>
        <span>Trusted by 500+ Top CBSE & State Board Institutions</span>
      </div>

      <!-- Main Headline -->
      <h1 class="hero-title">
        The Intelligent Operating System for<br>
        <span class="gradient-text-sky">India's Leading Schools</span>
      </h1>

      <!-- Subtitle -->
      <p class="hero-subtitle">
        A single unified platform powering Admissions, Automated Multi-Mode Fee Collections, Examinations with CBSE CCE Report Cards, Bus Fleet GPS Tracking, and 10 Dedicated Stakeholder Portals.
      </p>

      <!-- Action Buttons -->
      <div class="d-flex flex-wrap justify-content-center gap-3">
        <a href="<?php echo base_url('dashboards/admin.php'); ?>" class="btn-hero-lead">
          <i class="bi bi-speedometer2"></i>
          <span>Launch Super Admin Dashboard</span>
        </a>
        <button type="button" class="btn-hero-ghost" data-bs-toggle="modal" data-bs-target="#demoRolesModal">
          <i class="bi bi-person-badge"></i>
          <span>Explore 15 Demo Roles</span>
        </button>
        <a href="<?php echo base_url('login.php'); ?>" class="btn-hero-ghost">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Sign In to Portal</span>
        </a>
      </div>

      <!-- CENTRAL COMMAND CONSOLE PREVIEW -->
      <div class="preview-mac-window text-start">
        <!-- Mac Chrome Header -->
        <div class="mac-window-header">
          <div class="d-flex align-items-center gap-3">
            <div class="mac-dots">
              <span class="mac-dot dot-red"></span>
              <span class="mac-dot dot-yellow"></span>
              <span class="mac-dot dot-green"></span>
            </div>
            <span class="font-size-13 text-secondary fw-semibold">
              <i class="bi bi-lock-fill text-success me-1"></i>
              Delhi Public Global Academy • Central Command Console
            </span>
          </div>
          <div class="d-flex align-items-center gap-2">
            <span class="badge bg-success-subtle text-success border border-success border-opacity-25 font-size-11">
              Active Session: 2024–2025
            </span>
            <a href="<?php echo base_url('dashboards/admin.php'); ?>" class="btn btn-primary btn-sm font-size-12 fw-bold px-3 py-1">
              Open Full Screen &rarr;
            </a>
          </div>
        </div>

        <!-- KPI Summary Bar inside Preview -->
        <div class="preview-kpi-bar">
          <div class="kpi-tile">
            <small class="text-primary d-block mb-1">TOTAL ENROLLED STUDENTS</small>
            <h4>1,878</h4>
            <span class="font-size-12 text-success"><i class="bi bi-arrow-up"></i> +142 New Enrolments</span>
          </div>
          <div class="kpi-tile">
            <small class="text-success d-block mb-1">FEE COLLECTION YTD</small>
            <h4 class="text-success">₹4.21 Cr</h4>
            <span class="font-size-12 text-muted"><i class="bi bi-check-circle-fill text-success me-1"></i> 87% Recovery Rate</span>
          </div>
          <div class="kpi-tile">
            <small class="text-warning d-block mb-1">ATTENDANCE TODAY</small>
            <h4 class="text-warning">95.4%</h4>
            <span class="font-size-12 text-muted"><i class="bi bi-people me-1"></i> 1,792 Present (86 Absent)</span>
          </div>
          <div class="kpi-tile">
            <small class="text-info d-block mb-1">TEACHING STAFF ON DUTY</small>
            <h4 class="text-info">118 / 122</h4>
            <span class="font-size-12 text-muted"><i class="bi bi-clock-history me-1"></i> 100% Punctuality</span>
          </div>
        </div>

        <!-- Interactive Preview Tabs -->
        <div class="preview-subnav">
          <button type="button" class="preview-tab-btn active" onclick="switchPreviewTab('fees', this)">
            <i class="bi bi-cash-coin"></i> Live Fee Counter POS
          </button>
          <button type="button" class="preview-tab-btn" onclick="switchPreviewTab('attendance', this)">
            <i class="bi bi-calendar2-check"></i> Class Attendance
          </button>
          <button type="button" class="preview-tab-btn" onclick="switchPreviewTab('cce', this)">
            <i class="bi bi-award"></i> CBSE CCE Marks
          </button>
          <button type="button" class="preview-tab-btn" onclick="switchPreviewTab('transport', this)">
            <i class="bi bi-bus-front"></i> Bus Fleet GPS
          </button>
        </div>

        <!-- Preview Table Content: Fee POS (Default) -->
        <div class="preview-table-wrap" id="tabContent-fees">
          <table class="table-dark-preview">
            <thead>
              <tr>
                <th>Receipt #</th>
                <th>Student Name</th>
                <th>Class & Section</th>
                <th>Payment Mode</th>
                <th>Amount</th>
                <th>Transaction Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><span class="font-monospace text-info fw-bold">REC-2024-9182</span></td>
                <td><strong>Aarav Sharma</strong></td>
                <td><span class="badge bg-secondary bg-opacity-25 text-light">Class 10-A</span></td>
                <td><span class="badge bg-primary-subtle text-primary border border-primary border-opacity-25">Razorpay Online</span></td>
                <td class="font-monospace fw-bold text-success">₹28,500.00</td>
                <td>Today, 10:45 AM</td>
                <td><span class="badge bg-success text-white px-2 py-1">PAID</span></td>
              </tr>
              <tr>
                <td><span class="font-monospace text-info fw-bold">REC-2024-9181</span></td>
                <td><strong>Diya Patel</strong></td>
                <td><span class="badge bg-secondary bg-opacity-25 text-light">Class 10-A</span></td>
                <td><span class="badge bg-info-subtle text-info border border-info border-opacity-25">HDFC NetBanking</span></td>
                <td class="font-monospace fw-bold text-success">₹28,500.00</td>
                <td>Today, 10:22 AM</td>
                <td><span class="badge bg-success text-white px-2 py-1">PAID</span></td>
              </tr>
              <tr>
                <td><span class="font-monospace text-info fw-bold">REC-2024-9180</span></td>
                <td><strong>Meera Reddy</strong></td>
                <td><span class="badge bg-secondary bg-opacity-25 text-light">Class 8-A</span></td>
                <td><span class="badge bg-warning-subtle text-warning border border-warning border-opacity-25">UPI QR POS</span></td>
                <td class="font-monospace fw-bold text-success">₹24,200.00</td>
                <td>Today, 09:58 AM</td>
                <td><span class="badge bg-success text-white px-2 py-1">PAID</span></td>
              </tr>
              <tr>
                <td><span class="font-monospace text-info fw-bold">REC-2024-9179</span></td>
                <td><strong>Kabir Mehta</strong></td>
                <td><span class="badge bg-secondary bg-opacity-25 text-light">Class 6-B</span></td>
                <td><span class="badge bg-light text-dark">Cash Counter POS</span></td>
                <td class="font-monospace fw-bold text-success">₹21,800.00</td>
                <td>Today, 09:15 AM</td>
                <td><span class="badge bg-success text-white px-2 py-1">PAID</span></td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Preview Table Content: Attendance -->
        <div class="preview-table-wrap d-none" id="tabContent-attendance">
          <table class="table-dark-preview">
            <thead>
              <tr>
                <th>Class & Section</th>
                <th>Class Teacher</th>
                <th>Total Pupils</th>
                <th>Present</th>
                <th>Absent</th>
                <th>Attendance %</th>
                <th>Parent SMS Alert</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>Class 10-A</strong></td>
                <td>Vikram Rathore (PGT)</td>
                <td>42</td>
                <td>41</td>
                <td>1</td>
                <td><span class="badge bg-success">97.6%</span></td>
                <td><span class="badge bg-primary-subtle text-info"><i class="bi bi-check-all"></i> Sent (08:35 AM)</span></td>
              </tr>
              <tr>
                <td><strong>Class 9-B</strong></td>
                <td>Meenakshi Sundaram</td>
                <td>40</td>
                <td>39</td>
                <td>1</td>
                <td><span class="badge bg-success">97.5%</span></td>
                <td><span class="badge bg-primary-subtle text-info"><i class="bi bi-check-all"></i> Sent (08:35 AM)</span></td>
              </tr>
              <tr>
                <td><strong>Class 8-A</strong></td>
                <td>Rohan Joshi</td>
                <td>38</td>
                <td>36</td>
                <td>2</td>
                <td><span class="badge bg-warning text-dark">94.7%</span></td>
                <td><span class="badge bg-primary-subtle text-info"><i class="bi bi-check-all"></i> Sent (08:35 AM)</span></td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Preview Table Content: CCE -->
        <div class="preview-table-wrap d-none" id="tabContent-cce">
          <table class="table-dark-preview">
            <thead>
              <tr>
                <th>Subject Code & Title</th>
                <th>Term 1 (80)</th>
                <th>Internal (20)</th>
                <th>Total (100)</th>
                <th>CBSE Grade</th>
                <th>Grade Point</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>041 • Mathematics Standard</strong></td>
                <td>76 / 80</td>
                <td>19 / 20</td>
                <td class="fw-bold text-info">95 / 100</td>
                <td><span class="badge bg-success">A1</span></td>
                <td>10.0</td>
                <td><span class="text-success fw-bold"><i class="bi bi-check2"></i> Qualified</span></td>
              </tr>
              <tr>
                <td><strong>086 • Science & Technology</strong></td>
                <td>72 / 80</td>
                <td>18 / 20</td>
                <td class="fw-bold text-info">90 / 100</td>
                <td><span class="badge bg-success">A2</span></td>
                <td>9.0</td>
                <td><span class="text-success fw-bold"><i class="bi bi-check2"></i> Qualified</span></td>
              </tr>
              <tr>
                <td><strong>184 • English Language & Lit</strong></td>
                <td>78 / 80</td>
                <td>20 / 20</td>
                <td class="fw-bold text-info">98 / 100</td>
                <td><span class="badge bg-success">A1</span></td>
                <td>10.0</td>
                <td><span class="text-success fw-bold"><i class="bi bi-check2"></i> Qualified</span></td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Preview Table Content: Transport -->
        <div class="preview-table-wrap d-none" id="tabContent-transport">
          <table class="table-dark-preview">
            <thead>
              <tr>
                <th>Bus No.</th>
                <th>Route Name</th>
                <th>Driver & Contact</th>
                <th>Current Speed</th>
                <th>Next Stop</th>
                <th>ETA</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong class="text-warning">Bus #12 (DL-1PC-4819)</strong></td>
                <td>Sector 62 &rarr; Model Town &rarr; School</td>
                <td>Ramesh Yadav (+91 98110 44219)</td>
                <td><span class="badge bg-success">38 km/h</span></td>
                <td>Model Town Metro Stn</td>
                <td>08:15 AM (In 6 mins)</td>
                <td><span class="badge bg-success">On Schedule</span></td>
              </tr>
              <tr>
                <td><strong class="text-warning">Bus #07 (DL-1PC-2210)</strong></td>
                <td>Civil Lines &rarr; Rohini Sec 14</td>
                <td>Baljit Singh (+91 98711 00392)</td>
                <td><span class="badge bg-success">42 km/h</span></td>
                <td>Rohini West Gate</td>
                <td>08:18 AM (In 9 mins)</td>
                <td><span class="badge bg-success">On Schedule</span></td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </section>

  <!-- ACCREDITATIONS & TRUST STRIP -->
  <section class="trust-strip">
    <div class="container">
      <div class="row g-3 text-center text-md-start">
        <div class="col-6 col-md-3">
          <div class="trust-item justify-content-center justify-content-md-start">
            <i class="bi bi-patch-check-fill text-warning"></i>
            <div>
              <h6>CBSE Affiliation #2130892</h6>
              <small>School Code: 70142</small>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="trust-item justify-content-center justify-content-md-start">
            <i class="bi bi-book-half text-info"></i>
            <div>
              <h6>NEP 2020 Compliant</h6>
              <small>Holistic Progress Card (HPC)</small>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="trust-item justify-content-center justify-content-md-start">
            <i class="bi bi-shield-lock-fill text-success"></i>
            <div>
              <h6>APAAR & DigiLocker Synced</h6>
              <small>Automated Certificate Vault</small>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="trust-item justify-content-center justify-content-md-start">
            <i class="bi bi-credit-card-2-front-fill text-primary"></i>
            <div>
              <h6>Razorpay & POS Integration</h6>
              <small>Multi-Mode Instant Settlement</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 10 DEDICATED STAKEHOLDER PORTALS SECTION -->
  <section class="py-5" id="portals">
    <div class="container py-4">
      <div class="section-title-wrap">
        <span class="section-badge">10 Dedicated Stakeholder Portals</span>
        <h2 class="section-heading">Customized Experience for Every Stakeholder</h2>
        <p class="text-muted font-size-16">
          Every stakeholder gets an isolated, role-tailored dashboard with strict RBAC permission boundary, clean interfaces, and zero clutter.
        </p>
      </div>

      <div class="portals-grid">
        
        <!-- 1. Super Admin -->
        <div class="portal-card-premium">
          <div>
            <div class="portal-icon-wrapper p-icon-admin">
              <i class="bi bi-speedometer2"></i>
            </div>
            <h5>Super Admin</h5>
            <p>Master configurations, global academic calendars, RBAC role permissions, and full audit logs.</p>
          </div>
          <a href="<?php echo base_url('dashboards/admin.php'); ?>" class="portal-link-btn">
            <span>Launch Dashboard</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <!-- 2. Principal -->
        <div class="portal-card-premium">
          <div>
            <div class="portal-icon-wrapper p-icon-principal">
              <i class="bi bi-mortarboard-fill"></i>
            </div>
            <h5>Principal Desk</h5>
            <p>Academic oversight, teacher observations, board compliance, and institutional analytics.</p>
          </div>
          <a href="<?php echo base_url('dashboards/principal.php'); ?>" class="portal-link-btn">
            <span>Launch Desk</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <!-- 3. Teacher Workplace -->
        <div class="portal-card-premium">
          <div>
            <div class="portal-icon-wrapper p-icon-teacher">
              <i class="bi bi-person-video3"></i>
            </div>
            <h5>Teacher Workplace</h5>
            <p>Daily class attendance, digital homework, lesson diaries, and CBSE CCE marks entry.</p>
          </div>
          <a href="<?php echo base_url('dashboards/teacher.php'); ?>" class="portal-link-btn">
            <span>Launch Workplace</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <!-- 4. Accountant Desk -->
        <div class="portal-card-premium">
          <div>
            <div class="portal-icon-wrapper p-icon-accounts">
              <i class="bi bi-cash-coin"></i>
            </div>
            <h5>Accountant Desk</h5>
            <p>Counter POS, multi-mode receipt printing, defaulter ledgers, and bank reconciliations.</p>
          </div>
          <a href="<?php echo base_url('dashboards/accountant.php'); ?>" class="portal-link-btn">
            <span>Launch Desk</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <!-- 5. Admission Officer -->
        <div class="portal-card-premium">
          <div>
            <div class="portal-icon-wrapper p-icon-admission">
              <i class="bi bi-person-lines-fill"></i>
            </div>
            <h5>Admissions CRM</h5>
            <p>Inquiry lead pipelines, applicant document verification, merit lists, and enrollment tokens.</p>
          </div>
          <a href="<?php echo base_url('dashboards/admission-officer.php'); ?>" class="portal-link-btn">
            <span>Launch CRM</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <!-- 6. Chief Librarian -->
        <div class="portal-card-premium">
          <div>
            <div class="portal-icon-wrapper p-icon-library">
              <i class="bi bi-book-half"></i>
            </div>
            <h5>Library Desk</h5>
            <p>Accession register, barcode scan issue & returns, OPAC catalog, and overdue fine counter.</p>
          </div>
          <a href="<?php echo base_url('dashboards/librarian.php'); ?>" class="portal-link-btn">
            <span>Launch Desk</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <!-- 7. Transport Manager -->
        <div class="portal-card-premium">
          <div>
            <div class="portal-icon-wrapper p-icon-transport">
              <i class="bi bi-bus-front-fill"></i>
            </div>
            <h5>Transport Fleet</h5>
            <p>Live bus GPS tracking, route & stop allocation, driver compliance, and fuel consumption logs.</p>
          </div>
          <a href="<?php echo base_url('dashboards/transport-manager.php'); ?>" class="portal-link-btn">
            <span>Launch Fleet</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <!-- 8. HR Manager -->
        <div class="portal-card-premium">
          <div>
            <div class="portal-icon-wrapper p-icon-hr">
              <i class="bi bi-people-fill"></i>
            </div>
            <h5>HR & Payroll</h5>
            <p>Staff service books, biometric attendance, leave workflow approvals, and monthly payslips.</p>
          </div>
          <a href="<?php echo base_url('dashboards/hr-manager.php'); ?>" class="portal-link-btn">
            <span>Launch HR</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <!-- 9. Student Portal -->
        <div class="portal-card-premium">
          <div>
            <div class="portal-icon-wrapper p-icon-student">
              <i class="bi bi-backpack-fill"></i>
            </div>
            <h5>Student Portal</h5>
            <p>Live class timetable, digital assignments, online CBT quizzes, admit cards, and report cards.</p>
          </div>
          <a href="<?php echo base_url('dashboards/student.php'); ?>" class="portal-link-btn">
            <span>Launch Portal</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <!-- 10. Parent Portal -->
        <div class="portal-card-premium">
          <div>
            <div class="portal-icon-wrapper p-icon-parent">
              <i class="bi bi-house-heart-fill"></i>
            </div>
            <h5>Parent Portal</h5>
            <p>Multi-child switcher, online instant fee payment, bus live ETA tracker, and teacher chat.</p>
          </div>
          <a href="<?php echo base_url('dashboards/parent.php'); ?>" class="portal-link-btn">
            <span>Launch Portal</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- BENTO GRID CAPABILITIES (ACADEMICS & FEE POS) -->
  <section class="py-5 bg-light" id="academics">
    <div class="container py-4">
      <div class="section-title-wrap">
        <span class="section-badge">Core Engine Architectures</span>
        <h2 class="section-heading">Engineered for Indian Curriculum & Operational Scale</h2>
        <p class="text-muted font-size-16">
          Everything your institution needs to eliminate paper workflows, comply with CBSE & state regulations, and deliver exceptional stakeholder satisfaction.
        </p>
      </div>

      <div class="bento-grid-wrap">
        
        <!-- Large Bento 1: CBSE CCE & NEP Examination Engine -->
        <div class="bento-card bento-card-large">
          <div class="d-flex align-items-center gap-2 mb-3">
            <span class="badge bg-primary text-white font-size-11 px-3 py-1 rounded-pill">ACADEMIC EXCELLENCE</span>
            <span class="badge bg-info-subtle text-info font-size-11 px-2 py-1">NEP 2020 Compliant</span>
          </div>
          <h3 class="fw-bold mb-3">CBSE CCE & Holistic Progress Card (HPC) Engine</h3>
          <p class="text-muted font-size-15 mb-4">
            Automated grading scale aligned with official CBSE guidelines (A1 to E). Built-in support for Theory (80 marks) + Internal Assessments (20 marks) spanning Periodic Tests, Multiple Assessments, Portfolio, and Subject Enrichment Activities.
          </p>

          <div class="row g-3">
            <div class="col-md-6">
              <div class="p-3 bg-light rounded-3 border">
                <h6 class="fw-bold text-dark mb-2"><i class="bi bi-check-circle-fill text-success me-1"></i> Scholastic Assessment</h6>
                <ul class="list-unstyled font-size-13 text-muted mb-0">
                  <li class="mb-1">• Periodic Tests (Best 2 of 3)</li>
                  <li class="mb-1">• Notebook Submission & Portfolio</li>
                  <li class="mb-1">• Subject Enrichment (Lab/Speaking)</li>
                  <li>• Automatic 9-Point Grade Conversion</li>
                </ul>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 bg-light rounded-3 border">
                <h6 class="fw-bold text-dark mb-2"><i class="bi bi-check-circle-fill text-info me-1"></i> Co-Scholastic & Life Skills</h6>
                <ul class="list-unstyled font-size-13 text-muted mb-0">
                  <li class="mb-1">• Work Education (Pre-Vocational)</li>
                  <li class="mb-1">• Art Education (Visual & Performing)</li>
                  <li class="mb-1">• Health & Physical Education (SEWA)</li>
                  <li>• Discipline & Value Orientations</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Bento 2: Automated Fee POS -->
        <div class="bento-card" id="fee-pos">
          <div class="d-flex align-items-center gap-2 mb-3">
            <span class="badge bg-success text-white font-size-11 px-3 py-1 rounded-pill">FINANCE ENGINE</span>
          </div>
          <h4 class="fw-bold mb-2">3-Click Fee Counter POS</h4>
          <p class="text-muted font-size-14 mb-3">
            Instant multi-mode fee collection desk with automatic 3-copy receipt printing, sibling discounts, and defaulters ledger.
          </p>
          <div class="p-3 bg-light rounded-3 border mb-3">
            <div class="d-flex justify-content-between align-items-center mb-1 font-size-13">
              <span>Collection Modes:</span>
              <strong class="text-dark">Cash, Cheque, UPI, Razorpay</strong>
            </div>
            <div class="d-flex justify-content-between align-items-center font-size-13">
              <span>Receipt Copies:</span>
              <strong class="text-success">Student • Accounts • Bank</strong>
            </div>
          </div>
          <a href="<?php echo base_url('modules/fees/fee-collection.php'); ?>" class="btn btn-outline-success btn-sm w-100 fw-bold">
            Test Fee Counter Desk &rarr;
          </a>
        </div>

        <!-- Bento 3: GPS Fleet Safety -->
        <div class="bento-card">
          <div class="d-flex align-items-center gap-2 mb-3">
            <span class="badge bg-info text-white font-size-11 px-3 py-1 rounded-pill">LOGISTICS</span>
          </div>
          <h4 class="fw-bold mb-2">Live Bus GPS Tracking</h4>
          <p class="text-muted font-size-14 mb-3">
            Real-time geofence alerts, bus stop arrival SMS triggers for parents, speed monitoring, and student pick/drop check-ins.
          </p>
          <div class="p-3 bg-light rounded-3 border mb-3 font-size-13">
            <div class="d-flex align-items-center gap-2 text-success fw-bold mb-1">
              <i class="bi bi-geo-alt-fill"></i> Live GPS Ping: 5 Sec Interval
            </div>
            <div class="text-muted font-size-12">Automated Parent WhatsApp/SMS Alert 10 mins before arrival at child's stop.</div>
          </div>
          <a href="<?php echo base_url('modules/transport/gps-tracking.php'); ?>" class="btn btn-outline-primary btn-sm w-100 fw-bold">
            View Live GPS Map &rarr;
          </a>
        </div>

        <!-- Bento 4: Attendance & Biometrics -->
        <div class="bento-card">
          <div class="d-flex align-items-center gap-2 mb-3">
            <span class="badge bg-warning text-dark font-size-11 px-3 py-1 rounded-pill">ATTENDANCE</span>
          </div>
          <h4 class="fw-bold mb-2">Biometric & RFID Attendance</h4>
          <p class="text-muted font-size-14 mb-3">
            Instant attendance capture via facial recognition, RFID smart cards, or teacher mobile app with instant absentee SMS alerts.
          </p>
          <div class="p-3 bg-light rounded-3 border mb-3 font-size-13">
            <div class="d-flex justify-content-between mb-1">
              <span>Daily SMS Trigger:</span>
              <strong class="text-danger">08:30 AM Auto-Send</strong>
            </div>
            <div class="d-flex justify-content-between">
              <span>Monthly CCE Cutoff:</span>
              <strong class="text-primary">75% Mandatory CBSE Rule</strong>
            </div>
          </div>
          <a href="<?php echo base_url('modules/attendance/daily-attendance.php'); ?>" class="btn btn-outline-warning btn-sm w-100 fw-bold text-dark">
            Open Attendance Grid &rarr;
          </a>
        </div>

        <!-- Bento 5: Admissions CRM -->
        <div class="bento-card">
          <div class="d-flex align-items-center gap-2 mb-3">
            <span class="badge bg-danger text-white font-size-11 px-3 py-1 rounded-pill">ADMISSIONS CRM</span>
          </div>
          <h4 class="fw-bold mb-2">Digital Admissions Funnel</h4>
          <p class="text-muted font-size-14 mb-3">
            Complete inquiry-to-enrollment lifecycle with digital document uploads, interview scoring, and automated merit generation.
          </p>
          <div class="p-3 bg-light rounded-3 border mb-3 font-size-13">
            <div class="d-flex justify-content-between mb-1">
              <span>Inquiry Pipeline:</span>
              <strong class="text-dark">Online & Walk-In Forms</strong>
            </div>
            <div class="d-flex justify-content-between">
              <span>Verification Checklist:</span>
              <strong class="text-success">Birth Cert, TC, Aadhaar</strong>
            </div>
          </div>
          <a href="<?php echo base_url('modules/admissions/online-enquiry.php'); ?>" class="btn btn-outline-danger btn-sm w-100 fw-bold">
            Explore Admission Desk &rarr;
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- OFFICIAL CBSE CCE MARKSHEET REPLICA PREVIEW -->
  <section class="py-5" id="cce-report">
    <div class="container py-4">
      <div class="section-title-wrap">
        <span class="section-badge">CBSE CCE & NEP 2020 Compliance</span>
        <h2 class="section-heading">Official Holistic Progress Card (HPC)</h2>
        <p class="text-muted font-size-16">
          Pre-formatted according to official CBSE Examination Byelaws and NEP 2020 holistic assessment frameworks with verifiable QR code and digital seal.
        </p>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="cce-replica-card">
            
            <!-- School Header -->
            <div class="text-center pb-3 border-bottom mb-4">
              <h4 class="fw-bold text-dark mb-1 text-uppercase letter-spacing-1"><?php echo htmlspecialchars($school_config['name']); ?></h4>
              <p class="font-size-13 text-muted mb-1">
                CBSE Affiliation No: <strong>2130892</strong> • School Code: <strong>70142</strong> • Institutional Reg: <strong>EDUSYS/DEL/2024</strong>
              </p>
              <span class="badge bg-primary text-white px-3 py-1 rounded-pill font-size-12 fw-bold text-uppercase">
                Academic Performance Assessment & Report Card (Session 2024–2025)
              </span>
            </div>

            <!-- Student Profile Grid -->
            <div class="row g-2 mb-4 font-size-13 p-3 bg-light rounded-3 border">
              <div class="col-md-3"><strong>Student Name:</strong> Aarav Sharma</div>
              <div class="col-md-3"><strong>Roll No:</strong> 1014</div>
              <div class="col-md-3"><strong>Class & Section:</strong> X-A</div>
              <div class="col-md-3"><strong>Admission No:</strong> ADM-2021-0842</div>
              <div class="col-md-3"><strong>Father's Name:</strong> Rajesh Sharma</div>
              <div class="col-md-3"><strong>Mother's Name:</strong> Sunita Sharma</div>
              <div class="col-md-3"><strong>CBSE Reg No:</strong> DL-2024-88421</div>
              <div class="col-md-3"><strong>APAAR ID:</strong> 9812-4412-8801</div>
            </div>

            <!-- Scholastic Marks Table -->
            <h6 class="fw-bold text-dark mb-2">Part 1: Scholastic Areas (Grading on 9-Point Scale)</h6>
            <div class="table-responsive mb-4">
              <table class="table table-bordered table-sm font-size-13 text-center align-middle">
                <thead class="table-light">
                  <tr>
                    <th class="text-start">Subject Code & Name</th>
                    <th>Term 1 (80)</th>
                    <th>Internal (20)</th>
                    <th>Total (100)</th>
                    <th>CBSE Grade</th>
                    <th>Grade Point</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-start fw-semibold">041 • Mathematics Standard</td>
                    <td>76</td>
                    <td>19</td>
                    <td class="fw-bold">95</td>
                    <td><span class="badge bg-success">A1</span></td>
                    <td>10.0</td>
                  </tr>
                  <tr>
                    <td class="text-start fw-semibold">086 • Science & Technology</td>
                    <td>72</td>
                    <td>18</td>
                    <td class="fw-bold">90</td>
                    <td><span class="badge bg-success">A2</span></td>
                    <td>9.0</td>
                  </tr>
                  <tr>
                    <td class="text-start fw-semibold">087 • Social Science</td>
                    <td>75</td>
                    <td>19</td>
                    <td class="fw-bold">94</td>
                    <td><span class="badge bg-success">A1</span></td>
                    <td>10.0</td>
                  </tr>
                  <tr>
                    <td class="text-start fw-semibold">184 • English Language & Literature</td>
                    <td>78</td>
                    <td>20</td>
                    <td class="fw-bold">98</td>
                    <td><span class="badge bg-success">A1</span></td>
                    <td>10.0</td>
                  </tr>
                  <tr>
                    <td class="text-start fw-semibold">085 • Hindi Course-B</td>
                    <td>74</td>
                    <td>18</td>
                    <td class="fw-bold">92</td>
                    <td><span class="badge bg-success">A1</span></td>
                    <td>10.0</td>
                  </tr>
                  <tr class="table-light fw-bold">
                    <td class="text-start">Aggregate Score & CGPA</td>
                    <td>375 / 400</td>
                    <td>94 / 100</td>
                    <td class="text-primary font-size-15">469 / 500 (93.8%)</td>
                    <td><span class="badge bg-success">A1</span></td>
                    <td class="text-primary font-size-15">9.8 / 10.0</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Co-Scholastic & Signatures -->
            <div class="row g-3 align-items-end pt-3 border-top font-size-13">
              <div class="col-md-4">
                <strong>Attendance:</strong> 188 / 196 Days (95.9%)<br>
                <strong>Result:</strong> <span class="badge bg-success">PROMOTED WITH DISTINCTION</span>
              </div>
              <div class="col-md-4 text-center">
                <span class="d-block mb-1 text-muted">Class Teacher Signature</span>
                <span class="fw-bold font-monospace">Vikram Rathore, PGT</span>
              </div>
              <div class="col-md-4 text-end">
                <span class="d-block mb-1 text-muted">Principal Signature & Stamp</span>
                <span class="fw-bold font-monospace text-primary">Dr. Sunita Rao, Ph.D.</span>
              </div>
            </div>

            <!-- Verifiable Stamp -->
            <div class="cce-stamp">
              <i class="bi bi-shield-check me-1"></i> CBSE CERTIFIED
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ALL 28 MODULES MASTER DIRECTORY -->
  <section class="py-5 bg-light" id="modules">
    <div class="container py-4">
      <div class="section-title-wrap">
        <span class="section-badge">Enterprise Depth</span>
        <h2 class="section-heading">28 Modules • 584 Submodules</h2>
        <p class="text-muted font-size-16">
          Every critical school function from student lifecycle to CBSE compliance is fully covered with dedicated screens and realistic workflows.
        </p>
      </div>

      <div class="row g-3">
        <?php foreach ($modules_registry as $mod): ?>
          <div class="col-md-6 col-lg-3">
            <a href="<?php echo base_url('modules/' . $mod['key'] . '/' . ($mod['submodules'][0]['file'] ?? 'dashboard.php')); ?>" class="card h-100 text-decoration-none border p-3 hover-lift shadow-xs bg-white">
              <div class="d-flex align-items-center gap-3">
                <div class="p-2 rounded-3 bg-primary-subtle text-primary font-size-22">
                  <i class="bi <?php echo $mod['icon']; ?>"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-dark mb-0 font-size-14"><?php echo htmlspecialchars($mod['name']); ?></h6>
                  <small class="text-muted font-size-12"><?php echo count($mod['submodules']); ?> Functional Screens</small>
                </div>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- CALL TO ACTION BANNER -->
  <section class="py-5 text-white text-center" style="background: radial-gradient(circle at 50% 50%, rgba(37, 99, 235, 0.4) 0%, #080d1a 80%);">
    <div class="container py-4">
      <h2 class="display-5 fw-bold mb-3" style="letter-spacing: -0.02em;">Ready to Transform Your School Administration?</h2>
      <p class="font-size-16 text-white-50 max-w-650 mx-auto mb-4" style="max-width: 650px;">
        Test the live prototype right now using any of our 15 pre-configured stakeholder demo roles with full permissions.
      </p>
      <div class="d-flex flex-wrap justify-content-center gap-3">
        <a href="<?php echo base_url('login.php'); ?>" class="btn-hero-lead font-size-15">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Open Institutional Sign In</span>
        </a>
        <a href="<?php echo base_url('dashboards/admin.php'); ?>" class="btn-hero-ghost font-size-15">
          <i class="bi bi-speedometer2"></i>
          <span>Direct Super Admin Access</span>
        </a>
      </div>
    </div>
  </section>

  <!-- INSTITUTIONAL FOOTER -->
  <footer class="bg-dark text-white pt-5 pb-4 border-top border-secondary border-opacity-25" style="background-color: #0b1120 !important;">
    <div class="container">
      <div class="row g-4 pb-4 border-bottom border-secondary border-opacity-25">
        <div class="col-lg-4">
          <div class="d-flex align-items-center gap-3 mb-3">
            <div class="brand-logo-icon">
              <i class="bi bi-mortarboard-fill"></i>
            </div>
            <div>
              <h5 class="fw-bold text-white mb-0"><?php echo htmlspecialchars($school_config['short_name']); ?><span class="text-info">Pro</span></h5>
              <small class="text-white-50 text-uppercase fw-bold font-size-11">Enterprise School ERP</small>
            </div>
          </div>
          <p class="font-size-14 text-white-50 mb-3" style="line-height: 1.6;">
            A premier academic operating system engineered for Indian schools, adhering to CBSE examination guidelines, NEP 2020 holistic progress cards, and state board requirements.
          </p>
          <div class="font-size-13 text-white-50">
            <div><i class="bi bi-geo-alt-fill text-info me-2"></i> <?php echo htmlspecialchars($school_config['address']); ?></div>
            <div><i class="bi bi-telephone-fill text-info me-2"></i> <?php echo htmlspecialchars($school_config['phone']); ?></div>
            <div><i class="bi bi-envelope-fill text-info me-2"></i> <?php echo htmlspecialchars($school_config['email']); ?></div>
          </div>
        </div>

        <div class="col-6 col-lg-2">
          <h6 class="fw-bold text-white mb-3 text-uppercase font-size-12 letter-spacing-1">Portals</h6>
          <ul class="list-unstyled font-size-13 text-white-50">
            <li class="mb-2"><a href="<?php echo base_url('dashboards/admin.php'); ?>" class="text-white-50 text-decoration-none">Super Admin</a></li>
            <li class="mb-2"><a href="<?php echo base_url('dashboards/principal.php'); ?>" class="text-white-50 text-decoration-none">Principal Desk</a></li>
            <li class="mb-2"><a href="<?php echo base_url('dashboards/teacher.php'); ?>" class="text-white-50 text-decoration-none">Teacher Workplace</a></li>
            <li class="mb-2"><a href="<?php echo base_url('dashboards/accountant.php'); ?>" class="text-white-50 text-decoration-none">Accountant POS</a></li>
            <li class="mb-2"><a href="<?php echo base_url('dashboards/student.php'); ?>" class="text-white-50 text-decoration-none">Student Portal</a></li>
            <li class="mb-2"><a href="<?php echo base_url('dashboards/parent.php'); ?>" class="text-white-50 text-decoration-none">Parent Portal</a></li>
          </ul>
        </div>

        <div class="col-6 col-lg-2">
          <h6 class="fw-bold text-white mb-3 text-uppercase font-size-12 letter-spacing-1">Academic Core</h6>
          <ul class="list-unstyled font-size-13 text-white-50">
            <li class="mb-2"><a href="<?php echo base_url('modules/students/index.php'); ?>" class="text-white-50 text-decoration-none">Student SIS</a></li>
            <li class="mb-2"><a href="<?php echo base_url('modules/academics/index.php'); ?>" class="text-white-50 text-decoration-none">Curriculum & Diary</a></li>
            <li class="mb-2"><a href="<?php echo base_url('modules/examinations/index.php'); ?>" class="text-white-50 text-decoration-none">CBSE CCE Exams</a></li>
            <li class="mb-2"><a href="<?php echo base_url('modules/attendance/index.php'); ?>" class="text-white-50 text-decoration-none">Biometric Attendance</a></li>
            <li class="mb-2"><a href="<?php echo base_url('modules/library/index.php'); ?>" class="text-white-50 text-decoration-none">Smart Library</a></li>
          </ul>
        </div>

        <div class="col-lg-4">
          <h6 class="fw-bold text-white mb-3 text-uppercase font-size-12 letter-spacing-1">CBSE Board Certification</h6>
          <div class="p-3 rounded-3 mb-3" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">
            <div class="d-flex justify-content-between mb-1 font-size-13">
              <span class="text-white-50">CBSE Affiliation:</span>
              <strong class="text-white">#2130892 (Sr. Secondary)</strong>
            </div>
            <div class="d-flex justify-content-between mb-1 font-size-13">
              <span class="text-white-50">School Code:</span>
              <strong class="text-white">70142</strong>
            </div>
            <div class="d-flex justify-content-between font-size-13">
              <span class="text-white-50">UDISE+ Code:</span>
              <strong class="text-white">09150100412</strong>
            </div>
          </div>
          <span class="badge bg-success-subtle text-success border border-success border-opacity-25 font-size-11">
            <i class="bi bi-shield-check me-1"></i> Data Protection & SSL Encrypted
          </span>
        </div>
      </div>

      <div class="pt-3 d-flex flex-wrap justify-content-between align-items-center font-size-13 text-white-50">
        <div>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($school_config['name']); ?>. All Rights Reserved.</div>
        <div>Engineered with DPGA Pro School Architecture</div>
      </div>
    </div>
  </footer>

  <!-- 15 DEMO ROLES MODAL -->
  <div class="modal fade" id="demoRolesModal" tabindex="-1" aria-labelledby="demoRolesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg">
        <div class="modal-header bg-dark text-white p-4">
          <div>
            <h5 class="modal-title fw-bold" id="demoRolesModalLabel">
              <i class="bi bi-lightning-charge-fill text-warning me-2"></i> 1-Click Demo Profiles (15 Roles)
            </h5>
            <small class="text-white-50 font-size-13">Click any profile below to instantly launch into that role's dashboard</small>
          </div>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4 bg-light">
          <div class="row g-3">
            <?php foreach ($demo_roles as $usr): ?>
              <div class="col-md-6 col-lg-4">
                <a href="<?php echo base_url($usr['path']); ?>" class="card h-100 p-3 text-decoration-none border shadow-xs hover-lift bg-white">
                  <div class="d-flex align-items-center gap-3">
                    <div class="p-2 rounded-2 bg-primary-subtle text-primary font-size-20">
                      <i class="bi bi-person-check-fill"></i>
                    </div>
                    <div>
                      <h6 class="fw-bold text-dark mb-0 font-size-14"><?php echo htmlspecialchars($usr['name']); ?></h6>
                      <small class="text-primary font-size-12 fw-semibold d-block"><?php echo htmlspecialchars($usr['role']); ?></small>
                      <small class="text-muted font-size-11"><?php echo htmlspecialchars($usr['email']); ?></small>
                    </div>
                  </div>
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="modal-footer bg-white border-top p-3 d-flex justify-content-between">
          <span class="font-size-13 text-muted"><i class="bi bi-info-circle me-1"></i> No passwords needed in demo mode</span>
          <button type="button" class="btn btn-secondary btn-sm px-3 rounded-pill" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url('assets/js/mock-data.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/app.js'); ?>"></script>
  <script>
    function switchPreviewTab(tabKey, btn) {
      document.querySelectorAll('.preview-tab-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      document.querySelectorAll('.preview-table-wrap').forEach(t => t.classList.add('d-none'));
      const activeContent = document.getElementById('tabContent-' + tabKey);
      if (activeContent) {
        activeContent.classList.remove('d-none');
      }
    }
  </script>
</body>
</html>
