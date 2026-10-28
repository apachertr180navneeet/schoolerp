<?php
/**
 * EDUSYS PRO - ULTRA-PREMIUM INSTITUTIONAL LOGIN PORTAL (PHP)
 * Delhi Public Global Academy — CBSE & State Board Enterprise ERP
 */
$depth = 0;
require_once __DIR__ . '/includes/config.php';

// Handle Forked Login Submission (POST or quick GET)
if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['quick_login'])) {
    $email = trim($_POST['email'] ?? $_GET['email'] ?? '');
    $role_id = trim($_POST['role_id'] ?? $_GET['role'] ?? '');
    
    $selected_role = null;
    if ($email !== '') {
        foreach ($demo_roles as $r) {
            if (strtolower($r['email']) === strtolower($email)) {
                $selected_role = $r;
                break;
            }
        }
    }
    if (!$selected_role && $role_id !== '') {
        foreach ($demo_roles as $r) {
            if ($r['id'] === $role_id) {
                $selected_role = $r;
                break;
            }
        }
    }
    if (!$selected_role) {
        $selected_role = $demo_roles[0]; // fallback
    }
    
    $_SESSION['edusys_user'] = $selected_role;
    $target_url = base_url($selected_role['path']);
    header("Location: " . $target_url);
    exit;
}

$is_logged_out = isset($_GET['logout']);

// Role metadata for dynamic fork flow previews
$role_previews = [
    'super_admin' => [
        'name' => 'Super Admin',
        'title' => 'Master System Administrator',
        'badge' => 'FULL ROOT ACCESS',
        'badge_class' => 'bg-primary-subtle text-primary border-primary',
        'destination' => 'dashboards/admin.php',
        'stat1_label' => 'Total Students', 'stat1_val' => '1,878',
        'stat2_label' => 'Total Collection', 'stat2_val' => '₹4.21 Cr',
        'stat3_label' => 'Staff On Duty', 'stat3_val' => '118 / 122',
        'focus' => 'Global configurations, academic sessions, RBAC permissions, and system audit trails.'
    ],
    'principal' => [
        'name' => 'Dr. Sunita Rao',
        'title' => 'Principal & Academic Head',
        'badge' => 'ACADEMIC EXECUTIVE',
        'badge_class' => 'bg-success-subtle text-success border-success',
        'destination' => 'dashboards/principal.php',
        'stat1_label' => 'School Attendance', 'stat1_val' => '95.4%',
        'stat2_label' => 'Staff On Duty', 'stat2_val' => '118 / 122',
        'stat3_label' => 'CBSE LOC Status', 'stat3_val' => '100% OK',
        'focus' => 'Curriculum oversight, teacher observations, CBSE board compliance, and institutional analytics.'
    ],
    'teacher' => [
        'name' => 'Vikram Rathore',
        'title' => 'PGT Physics & Class Teacher 10-A',
        'badge' => 'FACULTY WORKPLACE',
        'badge_class' => 'bg-warning-subtle text-warning border-warning',
        'destination' => 'dashboards/teacher.php',
        'stat1_label' => 'My Students', 'stat1_val' => '164 Pupils',
        'stat2_label' => 'Periods Today', 'stat2_val' => '5 Lectures',
        'stat3_label' => '10-A Attendance', 'stat3_val' => '41 / 42',
        'focus' => 'Daily period timetable, class attendance, digital homework, and CBSE CCE marks entry.'
    ],
    'accountant' => [
        'name' => 'M. K. Sharma',
        'title' => 'Chief Institutional Accountant',
        'badge' => 'FINANCE & POS',
        'badge_class' => 'bg-info-subtle text-info border-info',
        'destination' => 'dashboards/accountant.php',
        'stat1_label' => 'Counter Today', 'stat1_val' => '₹3,48,500',
        'stat2_label' => 'Receipts Issued', 'stat2_val' => '28 Receipts',
        'stat3_label' => 'Overdue Dues', 'stat3_val' => '142 Pupils',
        'focus' => 'Counter POS, multi-mode receipt printing (UPI/Cash/Cheque), bank reconciliation, and defaulters.'
    ],
    'student' => [
        'name' => 'Aarav Sharma',
        'title' => 'Student • Class 10-A (Roll #1014)',
        'badge' => 'STUDENT PORTAL',
        'badge_class' => 'bg-success-subtle text-success border-success',
        'destination' => 'dashboards/student.php',
        'stat1_label' => 'My Attendance', 'stat1_val' => '95.9%',
        'stat2_label' => 'CBSE CGPA', 'stat2_val' => '9.8 (A1)',
        'stat3_label' => 'Fee Balance', 'stat3_val' => '₹0 (Paid)',
        'focus' => 'Personal timetable, assignments, online CBT tests, report card, and live bus GPS.'
    ],
    'parent' => [
        'name' => 'Rajesh Sharma',
        'title' => 'Parent of Aarav Sharma (X-A)',
        'badge' => 'PARENT GUARDIAN',
        'badge_class' => 'bg-danger-subtle text-danger border-danger',
        'destination' => 'dashboards/parent.php',
        'stat1_label' => 'Child In Campus', 'stat1_val' => '07:55 AM',
        'stat2_label' => 'Bus #12 ETA', 'stat2_val' => '8 Mins',
        'stat3_label' => 'Latest Grade', 'stat3_val' => '93.8% A1',
        'focus' => 'Live school bus GPS, instant UPI fee payment, teacher remarks, and daily attendance logs.'
    ],
    'transport_manager' => [
        'name' => 'H. Singh',
        'title' => 'Transport Fleet Supervisor',
        'badge' => 'LOGISTICS & FLEET',
        'badge_class' => 'bg-info-subtle text-info border-info',
        'destination' => 'dashboards/transport-manager.php',
        'stat1_label' => 'Active Buses', 'stat1_val' => '14 / 14 Live',
        'stat2_label' => 'Pupils On Route', 'stat2_val' => '680 Pupils',
        'stat3_label' => 'Speed Alerts', 'stat3_val' => '0 Violations',
        'focus' => 'Live bus GPS tracking, route & stop allocation, driver compliance, and geofence alerts.'
    ],
    'admission_officer' => [
        'name' => 'Rashmi Sen',
        'title' => 'Admissions Head',
        'badge' => 'ADMISSIONS CRM',
        'badge_class' => 'bg-rose-subtle text-danger border-danger',
        'destination' => 'dashboards/admission-officer.php',
        'stat1_label' => 'Total Inquiries', 'stat1_val' => '245',
        'stat2_label' => 'Applications', 'stat2_val' => '180',
        'stat3_label' => 'Enrolled', 'stat3_val' => '45 / 120',
        'focus' => 'Lead pipeline, applicant document verification, merit list generation, and seat allocation.'
    ],
    'librarian' => [
        'name' => 'S. Nair',
        'title' => 'Chief Librarian',
        'badge' => 'LIBRARY RESOURCE',
        'badge_class' => 'bg-purple-subtle text-primary border-primary',
        'destination' => 'dashboards/librarian.php',
        'stat1_label' => 'Total Catalog', 'stat1_val' => '18,450',
        'stat2_label' => 'Issued Today', 'stat2_val' => '84 Books',
        'stat3_label' => 'Overdue', 'stat3_val' => '12 Books',
        'focus' => 'Barcode scanning, book issue/returns, OPAC catalog, and overdue fine collection desk.'
    ],
    'hr_manager' => [
        'name' => 'Anjali Saxena',
        'title' => 'HR & Payroll Lead',
        'badge' => 'STAFF OPERATIONS',
        'badge_class' => 'bg-primary-subtle text-primary border-primary',
        'destination' => 'dashboards/hr-manager.php',
        'stat1_label' => 'Staff On Duty', 'stat1_val' => '118 / 122',
        'stat2_label' => 'Leaves Pending', 'stat2_val' => '4 Requests',
        'stat3_label' => 'Payroll Month', 'stat3_val' => 'Nov 2024',
        'focus' => 'Biometric punch logs, leave approval workflows, service books, and monthly salary slips.'
    ]
];
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
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
  
  <!-- Bootstrap 5.3 & Icons CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  
  <!-- Custom Prototype CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css'); ?>">

  <style>
    :root {
      --brand-navy: #060913;
      --brand-navy-card: #0b1120;
      --brand-navy-light: #0f172a;
      --brand-blue: #2563eb;
      --brand-blue-hover: #1d4ed8;
      --brand-indigo: #4f46e5;
      --brand-accent: #38bdf8;
      --font-display: 'Plus Jakarta Sans', sans-serif;
      --font-body: 'Inter', sans-serif;
      --font-mono: 'JetBrains Mono', monospace;
    }
    
    body {
      background-color: var(--brand-navy);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      font-family: var(--font-body);
      color: #f1f5f9;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
    }

    /* Outer Wrapper */
    .auth-page-container {
      min-height: 100vh;
      display: flex;
      position: relative;
      background: 
        radial-gradient(circle at 10% 20%, rgba(37, 99, 235, 0.22) 0%, transparent 45%),
        radial-gradient(circle at 90% 80%, rgba(99, 102, 241, 0.18) 0%, transparent 40%),
        radial-gradient(circle at 50% 50%, rgba(14, 165, 233, 0.08) 0%, transparent 55%),
        #060913;
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
      background: rgba(11, 17, 32, 0.65);
      backdrop-filter: blur(24px);
      -webkit-backdrop-filter: blur(24px);
    }

    /* Right Auth Form Panel */
    .auth-form-side {
      flex: 1;
      padding: 3rem 4rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: rgba(15, 23, 42, 0.45);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      overflow-y: auto;
    }

    .auth-card-inner {
      max-width: 580px;
      width: 100%;
      margin: 0 auto;
    }

    /* Brand Header Box */
    .brand-crest-box {
      width: 50px;
      height: 50px;
      background: linear-gradient(135deg, #38bdf8 0%, #2563eb 50%, #1e40af 100%);
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.75rem;
      color: white;
      box-shadow: 0 10px 25px rgba(37, 99, 235, 0.4), inset 0 1px 1px rgba(255, 255, 255, 0.4);
    }

    /* Glass KPI Card on Left - Shows Dynamic Fork Data */
    .glass-status-card {
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid rgba(255, 255, 255, 0.12);
      border-radius: 20px;
      padding: 1.75rem;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6), inset 0 1px 0 rgba(255, 255, 255, 0.1);
      position: relative;
      transition: all 0.3s ease;
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
      border-radius: 18px;
      padding: 1.35rem;
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
      padding: 0.4rem 0.95rem;
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
      grid-template-columns: repeat(auto-fill, minmax(165px, 1fr));
      gap: 0.65rem;
    }

    .role-btn-card {
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid rgba(255, 255, 255, 0.09);
      border-radius: 14px;
      padding: 0.75rem 0.85rem;
      display: flex;
      align-items: center;
      gap: 0.75rem;
      cursor: pointer;
      text-align: left;
      transition: all 0.22s cubic-bezier(0.16, 1, 0.3, 1);
      color: inherit;
      text-decoration: none;
      position: relative;
    }
    .role-btn-card:hover {
      background: rgba(255, 255, 255, 0.08);
      border-color: rgba(96, 165, 250, 0.4);
      transform: translateY(-2px);
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.35);
    }
    .role-btn-card.active {
      background: rgba(37, 99, 235, 0.2);
      border-color: #38bdf8;
      box-shadow: 0 0 0 1px #38bdf8, 0 6px 20px rgba(37, 99, 235, 0.4);
    }
    .role-btn-card .fork-indicator {
      display: none;
      font-size: 0.75rem;
      color: #38bdf8;
      margin-left: auto;
    }
    .role-btn-card.active .fork-indicator {
      display: block;
    }

    .role-icon-box {
      width: 38px;
      height: 38px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.2rem;
      flex-shrink: 0;
    }
    .icon-blue { background: rgba(59, 130, 246, 0.15); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.3); }
    .icon-emerald { background: rgba(16, 185, 129, 0.15); color: #34d399; border: 1px solid rgba(16, 185, 129, 0.3); }
    .icon-amber { background: rgba(245, 158, 11, 0.15); color: #fbbf24; border: 1px solid rgba(245, 158, 11, 0.3); }
    .icon-cyan { background: rgba(6, 182, 212, 0.15); color: #22d3ee; border: 1px solid rgba(6, 182, 212, 0.3); }
    .icon-rose { background: rgba(244, 63, 94, 0.15); color: #fb7185; border: 1px solid rgba(244, 63, 94, 0.3); }
    .icon-purple { background: rgba(168, 85, 247, 0.15); color: #c084fc; border: 1px solid rgba(168, 85, 247, 0.3); }

    .role-card-info h6 {
      font-size: 0.825rem;
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
      background: rgba(15, 23, 42, 0.75);
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

    /* Fork Destination Banner */
    .fork-destination-banner {
      background: rgba(37, 99, 235, 0.12);
      border: 1px solid rgba(59, 130, 246, 0.3);
      border-radius: 12px;
      padding: 0.75rem 1rem;
      margin-bottom: 1.25rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 0.75rem;
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
        <h1 class="display-6 fw-bold mb-2 text-white" style="letter-spacing: -0.03em; line-height: 1.2;">
          Role-Tailored Command Center
        </h1>
        <p class="text-secondary font-size-14 mb-0" style="max-width: 480px; line-height: 1.6; color: #94a3b8 !important;">
          The login flow dynamically forks to your specific stakeholder portal, loading your isolated workspace, tailored KPIs, and permissions.
        </p>
      </div>

      <!-- DYNAMIC FORK PREVIEW CARD ON LEFT -->
      <div class="glass-status-card my-4" id="forkLivePreviewCard" style="position: relative; z-index: 2;">
        <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom border-secondary border-opacity-25">
          <div class="d-flex align-items-center gap-2">
            <span class="pulse-green"></span>
            <span class="text-white fw-bold font-size-13" id="prevRoleName">Super Admin</span>
          </div>
          <span class="badge bg-primary-subtle text-primary border border-primary border-opacity-25 font-size-11" id="prevRoleBadge">
            FULL ROOT ACCESS
          </span>
        </div>

        <div class="mb-3">
          <small class="text-secondary font-size-11 text-uppercase fw-bold d-block mb-1" style="color: #94a3b8 !important;">Target Stakeholder Route</small>
          <span class="font-monospace text-info font-size-13 fw-bold" id="prevRoleRoute">dashboards/admin.php</span>
        </div>

        <div class="row g-2 text-center mb-3">
          <div class="col-4">
            <div class="p-2 rounded-3" style="background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(255,255,255,0.06);">
              <h5 class="fw-bold text-white mb-0" id="prevStat1Val">1,878</h5>
              <small class="text-secondary font-size-11" id="prevStat1Label" style="color: #94a3b8 !important;">Total Students</small>
            </div>
          </div>
          <div class="col-4">
            <div class="p-2 rounded-3" style="background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(255,255,255,0.06);">
              <h5 class="fw-bold text-success mb-0" id="prevStat2Val">₹4.21 Cr</h5>
              <small class="text-secondary font-size-11" id="prevStat2Label" style="color: #94a3b8 !important;">Fee Collected</small>
            </div>
          </div>
          <div class="col-4">
            <div class="p-2 rounded-3" style="background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(255,255,255,0.06);">
              <h5 class="fw-bold text-warning mb-0" id="prevStat3Val">118 / 122</h5>
              <small class="text-secondary font-size-11" id="prevStat3Label" style="color: #94a3b8 !important;">Staff On Duty</small>
            </div>
          </div>
        </div>

        <p class="font-size-12 text-secondary mb-0" id="prevRoleFocus" style="color: #94a3b8 !important; line-height: 1.5;">
          Global configurations, academic sessions, RBAC permissions, and system audit trails.
        </p>
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

        <!-- Logout Notice Banner if applicable -->
        <?php if ($is_logged_out): ?>
          <div class="alert alert-info bg-primary bg-opacity-10 border-primary border-opacity-25 text-white d-flex align-items-center gap-2 p-3 rounded-3 mb-4">
            <i class="bi bi-info-circle-fill text-info font-size-18"></i>
            <div>
              <strong class="d-block font-size-13">Signed Out Successfully</strong>
              <small class="font-size-12 text-white-50">Your session was closed. Choose any demo profile below to re-enter.</small>
            </div>
          </div>
        <?php endif; ?>

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
              Select a stakeholder persona to fork directly into their portal
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
              <span class="font-size-12 fw-bold text-uppercase text-white letter-spacing-1">1-Click Stakeholder Personas</span>
            </div>
            <span class="badge bg-success-subtle text-success border border-success border-opacity-25 font-size-11">
              Direct Fork Active
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
            <div class="role-btn-card active" data-cat="leadership" data-role="super_admin" onclick="selectRole('super_admin', 'admin@edusys.com', 'dashboards/admin.php', this)">
              <div class="role-icon-box icon-blue">
                <i class="bi bi-shield-lock-fill"></i>
              </div>
              <div class="role-card-info">
                <h6>Super Admin</h6>
                <small>Full ERP Access</small>
              </div>
              <i class="bi bi-arrow-right-short fork-indicator"></i>
            </div>

            <!-- Principal -->
            <div class="role-btn-card" data-cat="leadership" data-role="principal" onclick="selectRole('principal', 'principal@edusys.com', 'dashboards/principal.php', this)">
              <div class="role-icon-box icon-emerald">
                <i class="bi bi-mortarboard-fill"></i>
              </div>
              <div class="role-card-info">
                <h6>Principal Desk</h6>
                <small>Dr. Sunita Rao</small>
              </div>
              <i class="bi bi-arrow-right-short fork-indicator"></i>
            </div>

            <!-- Teacher -->
            <div class="role-btn-card" data-cat="academic" data-role="teacher" onclick="selectRole('teacher', 'teacher@edusys.com', 'dashboards/teacher.php', this)">
              <div class="role-icon-box icon-amber">
                <i class="bi bi-person-video3"></i>
              </div>
              <div class="role-card-info">
                <h6>PGT Teacher</h6>
                <small>Vikram Rathore</small>
              </div>
              <i class="bi bi-arrow-right-short fork-indicator"></i>
            </div>

            <!-- Accountant -->
            <div class="role-btn-card" data-cat="finance" data-role="accountant" onclick="selectRole('accountant', 'accounts@edusys.com', 'dashboards/accountant.php', this)">
              <div class="role-icon-box icon-cyan">
                <i class="bi bi-cash-coin"></i>
              </div>
              <div class="role-card-info">
                <h6>Accountant</h6>
                <small>Fee Counter POS</small>
              </div>
              <i class="bi bi-arrow-right-short fork-indicator"></i>
            </div>

            <!-- Student Portal -->
            <div class="role-btn-card" data-cat="student" data-role="student" onclick="selectRole('student', 'student@edusys.com', 'dashboards/student.php', this)">
              <div class="role-icon-box icon-amber">
                <i class="bi bi-backpack-fill"></i>
              </div>
              <div class="role-card-info">
                <h6>Student Portal</h6>
                <small>Aarav S. (10-A)</small>
              </div>
              <i class="bi bi-arrow-right-short fork-indicator"></i>
            </div>

            <!-- Parent Portal -->
            <div class="role-btn-card" data-cat="student" data-role="parent" onclick="selectRole('parent', 'parent@edusys.com', 'dashboards/parent.php', this)">
              <div class="role-icon-box icon-rose">
                <i class="bi bi-house-heart-fill"></i>
              </div>
              <div class="role-card-info">
                <h6>Parent Portal</h6>
                <small>Rajesh Sharma</small>
              </div>
              <i class="bi bi-arrow-right-short fork-indicator"></i>
            </div>

            <!-- Transport Manager -->
            <div class="role-btn-card" data-cat="finance" data-role="transport_manager" onclick="selectRole('transport_manager', 'transport@edusys.com', 'dashboards/transport-manager.php', this)">
              <div class="role-icon-box icon-blue">
                <i class="bi bi-bus-front-fill"></i>
              </div>
              <div class="role-card-info">
                <h6>Transport Mgr</h6>
                <small>Live Fleet GPS</small>
              </div>
              <i class="bi bi-arrow-right-short fork-indicator"></i>
            </div>

            <!-- Admission Officer -->
            <div class="role-btn-card" data-cat="finance" data-role="admission_officer" onclick="selectRole('admission_officer', 'admissions@edusys.com', 'dashboards/admission-officer.php', this)">
              <div class="role-icon-box icon-rose">
                <i class="bi bi-person-lines-fill"></i>
              </div>
              <div class="role-card-info">
                <h6>Admissions</h6>
                <small>Leads & Merits</small>
              </div>
              <i class="bi bi-arrow-right-short fork-indicator"></i>
            </div>

            <!-- Librarian -->
            <div class="role-btn-card" data-cat="academic" data-role="librarian" onclick="selectRole('librarian', 'library@edusys.com', 'dashboards/librarian.php', this)">
              <div class="role-icon-box icon-purple">
                <i class="bi bi-book-half"></i>
              </div>
              <div class="role-card-info">
                <h6>Librarian</h6>
                <small>Barcode & Books</small>
              </div>
              <i class="bi bi-arrow-right-short fork-indicator"></i>
            </div>

            <!-- HR Manager -->
            <div class="role-btn-card" data-cat="finance" data-role="hr_manager" onclick="selectRole('hr_manager', 'hr@edusys.com', 'dashboards/hr-manager.php', this)">
              <div class="role-icon-box icon-emerald">
                <i class="bi bi-people-fill"></i>
              </div>
              <div class="role-card-info">
                <h6>HR Manager</h6>
                <small>Staff & Payroll</small>
              </div>
              <i class="bi bi-arrow-right-short fork-indicator"></i>
            </div>

          </div>
        </div>

        <!-- FORM SIGN IN -->
        <form id="loginForm" method="POST" action="<?php echo base_url('login.php'); ?>" onsubmit="handleLoginSubmit(event)">
          
          <input type="hidden" name="role_id" id="selectedRoleId" value="super_admin">
          <input type="hidden" id="selectedTargetUrl" value="<?php echo base_url('dashboards/admin.php'); ?>">

          <!-- Fork Destination Pill -->
          <div class="fork-destination-banner">
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-diagram-3-fill text-info font-size-15"></i>
              <span class="font-size-12 text-white">Forking into: <strong id="bannerTargetName" class="text-info">Super Admin Dashboard</strong></span>
            </div>
            <span class="badge bg-primary text-white font-size-11" id="bannerTargetRole">Admin</span>
          </div>

          <!-- Email / ID Input -->
          <div class="custom-input-group">
            <label for="loginEmail">Institutional Email or Staff/Pupil ID <span class="text-danger">*</span></label>
            <div class="input-wrapper">
              <input type="email" class="custom-input" name="email" id="loginEmail" required value="admin@edusys.com" placeholder="name@edusys.com">
              <i class="bi bi-envelope-fill input-icon-left"></i>
            </div>
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
              <input type="password" class="custom-input" name="password" id="loginPassword" required value="password123" placeholder="••••••••">
              <i class="bi bi-lock-fill input-icon-left"></i>
              <button type="button" class="toggle-pass-btn" id="togglePasswordBtn" title="Toggle password visibility">
                <i class="bi bi-eye"></i>
              </button>
            </div>
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
              <i class="bi bi-shield-check me-1"></i>Any demo password accepted
            </span>
          </div>

          <!-- Submit CTA Button -->
          <button type="submit" class="btn-login-cta" id="btnLoginSubmit">
            <span class="btn-content d-flex align-items-center gap-2">
              <span id="btnCtaText">Launch Super Admin Portal</span>
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
    const roleMetadata = <?php echo json_encode($role_previews); ?>;
    const baseUrl = '<?php echo base_url(); ?>';

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

    // Role selection & autofill with clean URL & dynamic left preview
    function selectRole(roleId, email, path, el) {
      document.querySelectorAll('.role-btn-card').forEach(c => c.classList.remove('active'));
      el.classList.add('active');

      document.getElementById('selectedRoleId').value = roleId;
      document.getElementById('loginEmail').value = email;

      const cleanPath = path.replace(/\.php$/, '');
      const fullTarget = baseUrl.replace(/\/+$/, '') + '/' + cleanPath.replace(/^\/+/, '');
      document.getElementById('selectedTargetUrl').value = fullTarget;

      // Update Preview & Banner
      const meta = roleMetadata[roleId];
      if (meta) {
        document.getElementById('prevRoleName').innerText = meta.name;
        document.getElementById('prevRoleBadge').innerText = meta.badge;
        document.getElementById('prevRoleRoute').innerText = meta.destination;
        document.getElementById('prevStat1Val').innerText = meta.stat1_val;
        document.getElementById('prevStat1Label').innerText = meta.stat1_label;
        document.getElementById('prevStat2Val').innerText = meta.stat2_val;
        document.getElementById('prevStat2Label').innerText = meta.stat2_label;
        document.getElementById('prevStat3Val').innerText = meta.stat3_val;
        document.getElementById('prevStat3Label').innerText = meta.stat3_label;
        document.getElementById('prevRoleFocus').innerText = meta.focus;

        document.getElementById('bannerTargetName').innerText = meta.name + ' (' + meta.title + ')';
        document.getElementById('bannerTargetRole').innerText = meta.badge;
        document.getElementById('btnCtaText').innerText = 'Launch ' + meta.name + ' Portal';
      }
    }

    // Toggle Password Visibility
    document.getElementById('togglePasswordBtn').addEventListener('click', function () {
      const input = document.getElementById('loginPassword');
      const isPass = input.type === 'password';
      input.type = isPass ? 'text' : 'password';
      this.innerHTML = isPass ? '<i class="bi bi-eye-slash"></i>' : '<i class="bi bi-eye"></i>';
    });

    // Form submission simulation & redirect
    function handleLoginSubmit(e) {
      // Let the form submit naturally to login.php so session is stored in PHP
      const submitBtn = document.getElementById('btnLoginSubmit');
      submitBtn.disabled = true;
      submitBtn.querySelector('.btn-content').classList.add('d-none');
      submitBtn.querySelector('.spinner-border').classList.remove('d-none');
    }
  </script>
</body>
</html>
