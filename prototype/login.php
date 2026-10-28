<?php
/**
 * EDUSYS PRO - ULTRA-PREMIUM INSTITUTIONAL LOGIN PORTAL (PHP)
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
  <title>Institutional Portal Sign In — <?php echo htmlspecialchars($school_config['name']); ?></title>
  
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
      --brand-navy: #0b1120;
      --brand-navy-light: #131c31;
      --brand-blue: #2563eb;
      --brand-blue-hover: #1d4ed8;
      --brand-indigo: #4f46e5;
      --brand-accent: #38bdf8;
    }
    
    body {
      background-color: var(--brand-navy);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      font-family: 'Plus Jakarta Sans', sans-serif;
      color: #f1f5f9;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    /* Outer Wrapper */
    .auth-page-container {
      min-height: 100vh;
      display: flex;
      position: relative;
      background: radial-gradient(circle at 10% 20%, rgba(37, 99, 235, 0.18) 0%, transparent 45%),
                  radial-gradient(circle at 90% 80%, rgba(99, 102, 241, 0.16) 0%, transparent 40%),
                  radial-gradient(circle at 50% 50%, rgba(14, 165, 233, 0.08) 0%, transparent 55%),
                  #0b1120;
    }

    /* Left Brand Showcase Panel (Desktop) */
    .auth-brand-side {
      width: 46%;
      padding: 3.5rem 4rem;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      position: relative;
      border-right: 1px solid rgba(255, 255, 255, 0.08);
      background: rgba(11, 17, 32, 0.6);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
    }

    /* Right Auth Form Panel */
    .auth-form-side {
      flex: 1;
      padding: 3rem 4rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: rgba(15, 23, 42, 0.4);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      overflow-y: auto;
    }

    .auth-card-inner {
      max-width: 560px;
      width: 100%;
      margin: 0 auto;
    }

    /* Brand Header Box */
    .brand-crest-box {
      width: 52px;
      height: 52px;
      background: linear-gradient(135deg, #38bdf8 0%, #2563eb 50%, #1e40af 100%);
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.85rem;
      color: white;
      box-shadow: 0 10px 25px rgba(37, 99, 235, 0.4), inset 0 1px 1px rgba(255, 255, 255, 0.4);
    }

    /* Glass KPI Card on Left */
    .glass-status-card {
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 18px;
      padding: 1.75rem;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), inset 0 1px 0 rgba(255, 255, 255, 0.1);
      position: relative;
    }

    .live-status-pill {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background: rgba(16, 185, 129, 0.12);
      border: 1px solid rgba(16, 185, 129, 0.3);
      color: #34d399;
      padding: 0.3rem 0.85rem;
      border-radius: 30px;
      font-size: 0.75rem;
      font-weight: 700;
      letter-spacing: 0.04em;
      text-transform: uppercase;
    }

    .pulse-green {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #10b981;
      box-shadow: 0 0 10px #10b981;
      animation: pulseGreen 1.8s infinite;
    }
    @keyframes pulseGreen {
      0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
      70% { transform: scale(1); box-shadow: 0 0 0 7px rgba(16, 185, 129, 0); }
      100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
    }

    /* Role Quick Selector Box */
    .role-fast-panel {
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 16px;
      padding: 1.25rem;
      margin-bottom: 1.75rem;
    }

    /* Category Pill Nav */
    .category-chip-nav {
      display: flex;
      gap: 0.45rem;
      margin-bottom: 1rem;
      overflow-x: auto;
      padding-bottom: 4px;
      scrollbar-width: none;
    }
    .category-chip-nav::-webkit-scrollbar {
      display: none;
    }
    .category-chip-btn {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      color: #94a3b8;
      font-size: 0.8rem;
      font-weight: 600;
      padding: 0.45rem 0.95rem;
      border-radius: 10px;
      white-space: nowrap;
      transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
      cursor: pointer;
    }
    .category-chip-btn:hover {
      background: rgba(255, 255, 255, 0.1);
      color: #ffffff;
      border-color: rgba(255, 255, 255, 0.2);
    }
    .category-chip-btn.active {
      background: linear-gradient(135deg, #2563eb 0%, #4f46e5 100%);
      color: #ffffff;
      border-color: #3b82f6;
      box-shadow: 0 4px 12px rgba(37, 99, 235, 0.35);
    }

    /* Role Cards Grid */
    .roles-compact-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(155px, 1fr));
      gap: 0.6rem;
    }

    .role-btn-card {
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 12px;
      padding: 0.75rem 0.85rem;
      display: flex;
      align-items: center;
      gap: 0.7rem;
      cursor: pointer;
      text-align: left;
      transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
      color: inherit;
      text-decoration: none;
    }
    .role-btn-card:hover {
      background: rgba(255, 255, 255, 0.08);
      border-color: rgba(96, 165, 250, 0.4);
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
    }
    .role-btn-card.active {
      background: rgba(37, 99, 235, 0.18);
      border-color: #3b82f6;
      box-shadow: 0 0 0 1px #3b82f6, 0 6px 18px rgba(37, 99, 235, 0.35);
    }

    .role-icon-box {
      width: 36px;
      height: 36px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.15rem;
      flex-shrink: 0;
    }
    .icon-blue { background: rgba(59, 130, 246, 0.15); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.3); }
    .icon-emerald { background: rgba(16, 185, 129, 0.15); color: #34d399; border: 1px solid rgba(16, 185, 129, 0.3); }
    .icon-amber { background: rgba(245, 158, 11, 0.15); color: #fbbf24; border: 1px solid rgba(245, 158, 11, 0.3); }
    .icon-cyan { background: rgba(6, 182, 212, 0.15); color: #22d3ee; border: 1px solid rgba(6, 182, 212, 0.3); }
    .icon-rose { background: rgba(244, 63, 94, 0.15); color: #fb7185; border: 1px solid rgba(244, 63, 94, 0.3); }
    .icon-purple { background: rgba(168, 85, 247, 0.15); color: #c084fc; border: 1px solid rgba(168, 85, 247, 0.3); }

    .role-card-info h6 {
      font-size: 0.8125rem;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
      line-height: 1.25;
    }
    .role-card-info small {
      font-size: 0.72rem;
      color: #94a3b8;
      display: block;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      max-width: 95px;
    }

    /* Input Field Styling */
    .custom-input-group {
      position: relative;
      margin-bottom: 1.25rem;
    }
    .custom-input-group label {
      font-size: 0.8125rem;
      font-weight: 600;
      color: #cbd5e1;
      margin-bottom: 0.45rem;
      display: block;
    }
    .input-wrapper {
      position: relative;
    }
    .custom-input {
      width: 100%;
      height: 50px;
      background: rgba(15, 23, 42, 0.7);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 12px;
      padding: 0 46px 0 46px;
      font-size: 0.9375rem;
      color: #ffffff;
      font-family: inherit;
      transition: all 0.25s;
    }
    .custom-input:focus {
      outline: none;
      background: rgba(15, 23, 42, 0.95);
      border-color: #3b82f6;
      box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.2);
      color: #ffffff;
    }
    .custom-input::placeholder {
      color: #64748b;
    }
    .input-icon-left {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 1.15rem;
      color: #64748b;
      pointer-events: none;
      transition: color 0.2s;
    }
    .custom-input:focus + .input-icon-left {
      color: #38bdf8;
    }
    .toggle-pass-btn {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: #64748b;
      font-size: 1.15rem;
      cursor: pointer;
      padding: 0;
      display: flex;
      align-items: center;
      transition: color 0.2s;
    }
    .toggle-pass-btn:hover {
      color: #ffffff;
    }

    /* Primary Submit Button */
    .btn-login-cta {
      width: 100%;
      height: 52px;
      background: linear-gradient(135deg, #2563eb 0%, #4f46e5 100%);
      border: none;
      border-radius: 12px;
      color: #ffffff;
      font-size: 0.98rem;
      font-weight: 700;
      letter-spacing: 0.01em;
      cursor: pointer;
      box-shadow: 0 10px 25px rgba(37, 99, 235, 0.35);
      transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.65rem;
      text-decoration: none;
    }
    .btn-login-cta:hover {
      background: linear-gradient(135deg, #1d4ed8 0%, #4338ca 100%);
      transform: translateY(-2px);
      box-shadow: 0 14px 30px rgba(37, 99, 235, 0.45);
      color: #ffffff;
    }
    .btn-login-cta:active {
      transform: translateY(0);
    }

    /* Mobile Brand Header Bar */
    .mobile-brand-bar {
      display: none;
      margin-bottom: 2rem;
      align-items: center;
      gap: 1rem;
    }

    /* Responsive Queries */
    @media (max-width: 991.98px) {
      .auth-brand-side {
        display: none;
      }
      .mobile-brand-bar {
        display: flex;
      }
      .auth-form-side {
        padding: 2.5rem 1.5rem;
      }
    }
  </style>
</head>
<body>

  <div class="auth-page-container">
    
    <!-- LEFT BRAND & STATS PANEL (Desktop) -->
    <div class="auth-brand-side">
      <div style="position: relative; z-index: 2;">
        <!-- Brand Crest & Name -->
        <a href="<?php echo base_url('index.php'); ?>" class="d-inline-flex align-items-center gap-3 text-white text-decoration-none mb-4">
          <div class="brand-crest-box">
            <i class="bi bi-mortarboard-fill"></i>
          </div>
          <div>
            <h3 class="fw-bold mb-0 text-white" style="letter-spacing: -0.02em;">
              <?php echo htmlspecialchars($school_config['short_name']); ?><span style="color: #38bdf8;">Pro</span>
            </h3>
            <span class="font-size-12 text-uppercase fw-bold text-info letter-spacing-1">
              Enterprise School ERP
            </span>
          </div>
        </a>

        <!-- Headline & Board Affiliation -->
        <div class="mb-3">
          <span class="badge bg-primary-subtle text-info border border-info border-opacity-25 px-3 py-2 rounded-pill font-size-12 fw-bold">
            <i class="bi bi-patch-check-fill me-1 text-info"></i> CBSE Affiliated • Senior Secondary (2130892)
          </span>
        </div>
        <h1 class="display-6 fw-bold mb-3 text-white" style="letter-spacing: -0.03em; line-height: 1.2;">
          The Central Academic Command Center
        </h1>
        <p class="text-secondary font-size-15 mb-0" style="max-width: 480px; line-height: 1.6; color: #94a3b8 !important;">
          Unified institutional platform orchestrating admissions, automated multi-mode fee counter POS, real-time bus fleet GPS tracking, and official CBSE CCE progress reports.
        </p>
      </div>

      <!-- Live Floating System KPI Card -->
      <div class="glass-status-card my-4" style="position: relative; z-index: 2;">
        <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom border-secondary border-opacity-25">
          <div class="d-flex align-items-center gap-2">
            <span class="pulse-green"></span>
            <span class="text-white fw-bold font-size-13"><?php echo htmlspecialchars($school_config['name']); ?></span>
          </div>
          <span class="live-status-pill">Active Session 2024–25</span>
        </div>

        <div class="row g-2 text-center mb-3">
          <div class="col-4">
            <div class="p-2 rounded-3" style="background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(255,255,255,0.06);">
              <h5 class="fw-bold text-white mb-0">1,878</h5>
              <small class="text-secondary font-size-11" style="color: #94a3b8 !important;">Pupils Enrolled</small>
            </div>
          </div>
          <div class="col-4">
            <div class="p-2 rounded-3" style="background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(255,255,255,0.06);">
              <h5 class="fw-bold text-success mb-0">₹4.21 Cr</h5>
              <small class="text-secondary font-size-11" style="color: #94a3b8 !important;">Fee Collected</small>
            </div>
          </div>
          <div class="col-4">
            <div class="p-2 rounded-3" style="background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(255,255,255,0.06);">
              <h5 class="fw-bold text-warning mb-0">95.4%</h5>
              <small class="text-secondary font-size-11" style="color: #94a3b8 !important;">Today's Attendance</small>
            </div>
          </div>
        </div>

        <div class="d-flex align-items-center justify-content-between font-size-12 text-secondary" style="color: #94a3b8 !important;">
          <span><i class="bi bi-shield-check text-info me-1"></i> NEP 2020 Compliant</span>
          <span><i class="bi bi-lock-fill text-success me-1"></i> 256-Bit SSL Encrypted</span>
        </div>
      </div>

      <!-- Bottom Panel Footer -->
      <div class="pt-3 border-top border-secondary border-opacity-25 d-flex align-items-center justify-content-between font-size-13 text-secondary" style="position: relative; z-index: 2; color: #94a3b8 !important;">
        <span>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($school_config['short_name']); ?> ERP Platform</span>
        <a href="<?php echo base_url('index.php'); ?>" class="text-info text-decoration-none fw-semibold">
          <i class="bi bi-arrow-left me-1"></i> Public School Site
        </a>
      </div>
    </div>

    <!-- RIGHT AUTHENTICATION PANEL -->
    <div class="auth-form-side">
      <div class="auth-card-inner">

        <!-- Mobile Header (Visible only on tablets/phones) -->
        <div class="mobile-brand-bar">
          <div class="brand-crest-box" style="width: 44px; height: 44px; font-size: 1.5rem;">
            <i class="bi bi-mortarboard-fill"></i>
          </div>
          <div>
            <h4 class="fw-bold text-white mb-0"><?php echo htmlspecialchars($school_config['short_name']); ?><span style="color: #38bdf8;">Pro</span></h4>
            <span class="font-size-11 text-info text-uppercase fw-bold letter-spacing-1">CBSE Senior Secondary (2130892)</span>
          </div>
        </div>

        <!-- Top Header & Home Link -->
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div>
            <h2 class="fw-bold text-white mb-1" style="letter-spacing: -0.02em;">Institutional Sign In</h2>
            <p class="font-size-14 text-secondary mb-0" style="color: #94a3b8 !important;">
              Select a stakeholder profile or enter your credentials
            </p>
          </div>
          <a href="<?php echo base_url('index.php'); ?>" class="btn btn-sm btn-outline-secondary px-3 py-1 text-white border-secondary rounded-pill font-size-12 fw-semibold">
            <i class="bi bi-house-door me-1"></i> Home
          </a>
        </div>

        <!-- 1-CLICK DEMO ACCOUNTS ACCELERATOR -->
        <div class="role-fast-panel">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-lightning-charge-fill text-warning font-size-14"></i>
              <span class="font-size-12 fw-bold text-uppercase text-white letter-spacing-1">1-Click Demo Profiles (15 Roles)</span>
            </div>
            <span class="badge bg-success-subtle text-success border border-success border-opacity-25 font-size-11">
              Auto-Fills Form
            </span>
          </div>

          <!-- Category Chips -->
          <div class="category-chip-nav">
            <button type="button" class="category-chip-btn active" onclick="filterRoles('all', this)">All Portals</button>
            <button type="button" class="category-chip-btn" onclick="filterRoles('leadership', this)">Leadership</button>
            <button type="button" class="category-chip-btn" onclick="filterRoles('academic', this)">Academics</button>
            <button type="button" class="category-chip-btn" onclick="filterRoles('finance', this)">Finance & Ops</button>
            <button type="button" class="category-chip-btn" onclick="filterRoles('student', this)">Pupils & Parents</button>
          </div>

          <!-- Role Cards Grid -->
          <div class="roles-compact-grid" id="rolesGrid">
            
            <!-- Super Admin -->
            <div class="role-btn-card active" data-cat="leadership" onclick="selectRole('admin@edusys.com', 'dashboards/admin.php', this)">
              <div class="role-icon-box icon-blue">
                <i class="bi bi-shield-lock-fill"></i>
              </div>
              <div class="role-card-info">
                <h6>Super Admin</h6>
                <small>Full ERP Access</small>
              </div>
            </div>

            <!-- Principal -->
            <div class="role-btn-card" data-cat="leadership" onclick="selectRole('principal@edusys.com', 'dashboards/principal.php', this)">
              <div class="role-icon-box icon-emerald">
                <i class="bi bi-mortarboard-fill"></i>
              </div>
              <div class="role-card-info">
                <h6>Principal Desk</h6>
                <small>Dr. Sunita Rao</small>
              </div>
            </div>

            <!-- Teacher -->
            <div class="role-btn-card" data-cat="academic" onclick="selectRole('teacher@edusys.com', 'dashboards/teacher.php', this)">
              <div class="role-icon-box icon-amber">
                <i class="bi bi-person-video3"></i>
              </div>
              <div class="role-card-info">
                <h6>PGT Teacher</h6>
                <small>Vikram Rathore</small>
              </div>
            </div>

            <!-- Accountant -->
            <div class="role-btn-card" data-cat="finance" onclick="selectRole('accounts@edusys.com', 'dashboards/accountant.php', this)">
              <div class="role-icon-box icon-cyan">
                <i class="bi bi-cash-coin"></i>
              </div>
              <div class="role-card-info">
                <h6>Accountant</h6>
                <small>Fee Counter POS</small>
              </div>
            </div>

            <!-- Admission Officer -->
            <div class="role-btn-card" data-cat="finance" onclick="selectRole('admissions@edusys.com', 'dashboards/admission-officer.php', this)">
              <div class="role-icon-box icon-rose">
                <i class="bi bi-person-lines-fill"></i>
              </div>
              <div class="role-card-info">
                <h6>Admissions</h6>
                <small>Leads & Merits</small>
              </div>
            </div>

            <!-- Librarian -->
            <div class="role-btn-card" data-cat="academic" onclick="selectRole('library@edusys.com', 'dashboards/librarian.php', this)">
              <div class="role-icon-box icon-purple">
                <i class="bi bi-book-half"></i>
              </div>
              <div class="role-card-info">
                <h6>Librarian</h6>
                <small>Barcode & Books</small>
              </div>
            </div>

            <!-- Transport Manager -->
            <div class="role-btn-card" data-cat="finance" onclick="selectRole('transport@edusys.com', 'dashboards/transport-manager.php', this)">
              <div class="role-icon-box icon-blue">
                <i class="bi bi-bus-front-fill"></i>
              </div>
              <div class="role-card-info">
                <h6>Transport Mgr</h6>
                <small>Live Fleet GPS</small>
              </div>
            </div>

            <!-- HR Manager -->
            <div class="role-btn-card" data-cat="finance" onclick="selectRole('hr@edusys.com', 'dashboards/hr-manager.php', this)">
              <div class="role-icon-box icon-emerald">
                <i class="bi bi-people-fill"></i>
              </div>
              <div class="role-card-info">
                <h6>HR Manager</h6>
                <small>Staff & Payroll</small>
              </div>
            </div>

            <!-- Student Portal -->
            <div class="role-btn-card" data-cat="student" onclick="selectRole('student@edusys.com', 'dashboards/student.php', this)">
              <div class="role-icon-box icon-amber">
                <i class="bi bi-backpack-fill"></i>
              </div>
              <div class="role-card-info">
                <h6>Student Portal</h6>
                <small>Aarav S. (10-A)</small>
              </div>
            </div>

            <!-- Parent Portal -->
            <div class="role-btn-card" data-cat="student" onclick="selectRole('parent@edusys.com', 'dashboards/parent.php', this)">
              <div class="role-icon-box icon-rose">
                <i class="bi bi-house-heart-fill"></i>
              </div>
              <div class="role-card-info">
                <h6>Parent Portal</h6>
                <small>Rajesh Sharma</small>
              </div>
            </div>

          </div>
        </div>

        <!-- FORM SIGN IN -->
        <form id="loginForm" onsubmit="handleLoginSubmit(event)" novalidate>
          
          <!-- Email / ID Input -->
          <div class="custom-input-group">
            <label for="loginEmail">Institutional Email or Staff ID <span class="text-danger">*</span></label>
            <div class="input-wrapper">
              <input type="email" class="custom-input" id="loginEmail" required value="admin@edusys.com" placeholder="name@edusys.com">
              <i class="bi bi-envelope-fill input-icon-left"></i>
            </div>
            <div class="invalid-feedback text-danger font-size-12 mt-1">Please enter a valid email address.</div>
          </div>

          <!-- Password Input -->
          <div class="custom-input-group">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <label for="loginPassword" class="mb-0">Password <span class="text-danger">*</span></label>
              <a href="<?php echo base_url('forgot-password.php'); ?>" class="text-info text-decoration-none font-size-12 fw-semibold">
                Forgot Password?
              </a>
            </div>
            <div class="input-wrapper">
              <input type="password" class="custom-input" id="loginPassword" required value="password123" placeholder="••••••••">
              <i class="bi bi-lock-fill input-icon-left"></i>
              <button type="button" class="toggle-pass-btn" id="togglePasswordBtn" title="Toggle password visibility">
                <i class="bi bi-eye"></i>
              </button>
            </div>
            <div class="invalid-feedback text-danger font-size-12 mt-1">Password is required.</div>
          </div>

          <!-- Helper strip -->
          <div class="d-flex justify-content-between align-items-center mb-4 font-size-13">
            <div class="form-check">
              <input class="form-check-input bg-dark border-secondary" type="checkbox" id="rememberMe" checked>
              <label class="form-check-label text-secondary" for="rememberMe" style="color: #94a3b8 !important;">
                Remember my terminal
              </label>
            </div>
            <span class="badge bg-secondary bg-opacity-25 text-info border border-secondary border-opacity-25 font-size-11">
              <i class="bi bi-check-circle me-1"></i>Any demo password works
            </span>
          </div>

          <input type="hidden" id="selectedTargetUrl" value="<?php echo base_url('dashboards/admin.php'); ?>">

          <!-- Submit CTA Button -->
          <button type="submit" class="btn-login-cta" id="btnLoginSubmit">
            <span class="btn-content d-flex align-items-center gap-2">
              <span>Enter Institutional Portal</span>
              <i class="bi bi-arrow-right-short font-size-20"></i>
            </span>
            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
          </button>
        </form>

        <!-- Helpline & Support -->
        <div class="text-center mt-4 pt-3 border-top border-secondary border-opacity-25">
          <p class="font-size-13 text-secondary mb-0" style="color: #94a3b8 !important;">
            Need technical assistance or credentials? Call Front Desk Helpdesk:<br>
            <a href="tel:<?php echo $school_config['phone']; ?>" class="fw-bold text-info text-decoration-none font-size-14">
              <i class="bi bi-telephone-fill me-1"></i> <?php echo $school_config['phone']; ?>
            </a>
            <span class="mx-2 text-secondary">•</span>
            <span class="text-secondary">Mon–Sat, 8:00 AM – 4:30 PM</span>
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
    // Filter demo roles by category chips
    function filterRoles(category, btn) {
      document.querySelectorAll('.category-chip-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const cards = document.querySelectorAll('.role-btn-card');
      cards.forEach(card => {
        if (category === 'all' || card.getAttribute('data-cat') === category) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    }

    // Role selection & autofill with clean URL
    function selectRole(email, path, el) {
      document.querySelectorAll('.role-btn-card').forEach(c => c.classList.remove('active'));
      el.classList.add('active');
      document.getElementById('loginEmail').value = email;
      const cleanPath = path.replace(/\.php$/, '');
      const baseUrl = '<?php echo base_url(); ?>';
      document.getElementById('selectedTargetUrl').value = baseUrl.replace(/\/+$/, '') + '/' + cleanPath.replace(/^\/+/, '');
    }

    // Toggle Password Visibility
    document.getElementById('togglePasswordBtn').addEventListener('click', function () {
      const input = document.getElementById('loginPassword');
      const isPass = input.type === 'password';
      input.type = isPass ? 'text' : 'password';
      this.innerHTML = isPass ? '<i class="bi bi-eye-slash"></i>' : '<i class="bi bi-eye"></i>';
    });

    // Form submission simulation
    function handleLoginSubmit(e) {
      e.preventDefault();
      const form = document.getElementById('loginForm');
      if (!form.checkValidity()) {
        form.classList.add('was-validated');
        return;
      }

      const submitBtn = document.getElementById('btnLoginSubmit');
      submitBtn.disabled = true;
      submitBtn.querySelector('.btn-content').classList.add('d-none');
      submitBtn.querySelector('.spinner-border').classList.remove('d-none');

      const targetUrl = document.getElementById('selectedTargetUrl').value;
      setTimeout(() => {
        window.location.href = targetUrl;
      }, 450);
    }
  </script>
</body>
</html>
