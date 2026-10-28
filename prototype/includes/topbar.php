<?php
/**
 * EDUSYS PRO - COMMON TOPBAR & BREADCRUMBS
 */
$module_title = "Module";
foreach ($modules_registry as $m) {
    if ($m['key'] === ($active_module ?? '')) {
        $module_title = $m['name'];
        break;
    }
}
if (($active_module ?? '') === 'dashboard') {
    $module_title = 'Dashboards';
}
?>
    <!-- Main Content Area -->
    <div class="erp-main">
      <!-- Top Header Navbar -->
      <header class="erp-header">
        <div class="header-left">
          <button class="btn-sidebar-toggle" id="btnSidebarToggle" title="Toggle Sidebar">
            <i class="bi bi-list"></i>
          </button>
          
          <button class="header-search-btn" id="btnHeaderSearch" type="button">
            <i class="bi bi-search"></i>
            <span>Quick search (500+ screens)...</span>
            <kbd>Ctrl+K</kbd>
          </button>
        </div>

        <div class="header-right">
          <!-- Academic Session Switcher -->
          <div class="session-badge-wrap d-none d-md-flex">
            <i class="bi bi-calendar3 text-primary"></i>
            <span>Session:</span>
            <select id="globalSessionSelect">
              <option value="2024-2025" selected>2024-2025 (Active)</option>
              <option value="2023-2024">2023-2024</option>
              <option value="2025-2026">2025-2026 (Upcoming)</option>
            </select>
          </div>

          <!-- Board Selector -->
          <div class="session-badge-wrap d-none d-lg-flex bg-info-subtle border-info text-info">
            <i class="bi bi-award-fill"></i>
            <select id="globalBoardSelect" class="text-info fw-semibold">
              <option value="CBSE" selected>CBSE Board</option>
              <option value="State Board">State Board</option>
              <option value="Dual (CBSE & State)">Dual Curriculum</option>
            </select>
          </div>

          <!-- Theme Toggle -->
          <button class="header-icon-btn" id="btnThemeToggle" title="Toggle Dark/Light Mode">
            <i class="bi bi-moon-stars"></i>
          </button>

          <!-- Notifications Dropdown -->
          <div class="dropdown">
            <button class="header-icon-btn" data-bs-toggle="dropdown" aria-expanded="false" title="Notifications">
              <i class="bi bi-bell"></i>
              <span class="badge-dot"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-end p-0 shadow-lg border-0" style="width: 320px;">
              <div class="p-3 border-bottom d-flex justify-content-between align-items-center bg-light">
                <strong class="font-size-14">Notifications</strong>
                <span class="badge bg-primary rounded-pill">3 New</span>
              </div>
              <div class="list-group list-group-flush font-size-13">
                <a href="<?php echo base_url('modules/fees/fee-collection.php'); ?>" class="list-group-item list-group-item-action p-3">
                  <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-success-subtle text-success">Fee Received</span>
                    <small class="text-muted ms-auto">5m ago</small>
                  </div>
                  <p class="mb-0 text-muted font-size-12">₹28,500 received online from Aarav Sharma (Class 10-A).</p>
                </a>
                <a href="<?php echo base_url('modules/admissions/online-applications.php'); ?>" class="list-group-item list-group-item-action p-3">
                  <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-info-subtle text-info">Admission</span>
                    <small class="text-muted ms-auto">32m ago</small>
                  </div>
                  <p class="mb-0 text-muted font-size-12">New online application submitted for Class 1 (Aditi Mehra).</p>
                </a>
                <a href="<?php echo base_url('modules/compliance/cbse-reporting.php'); ?>" class="list-group-item list-group-item-action p-3">
                  <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-warning-subtle text-warning">Compliance</span>
                    <small class="text-muted ms-auto">2h ago</small>
                  </div>
                  <p class="mb-0 text-muted font-size-12">CBSE LOC data verification checklist ready for Principal sign-off.</p>
                </a>
              </div>
              <div class="p-2 text-center border-top bg-light">
                <a href="<?php echo base_url('modules/communication/notice-board.php'); ?>" class="font-size-12 fw-bold text-primary text-decoration-none">View All Notifications &rarr;</a>
              </div>
            </div>
          </div>

          <!-- User Menu Dropdown -->
          <div class="dropdown">
            <button class="user-menu-btn" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="user-menu-avatar current-user-avatar"><?php echo htmlspecialchars($current_user['avatar']); ?></div>
              <div class="user-menu-info">
                <span class="user-menu-name current-user-name"><?php echo htmlspecialchars($current_user['name']); ?></span>
                <span class="user-menu-role current-user-role"><?php echo htmlspecialchars($current_user['role']); ?></span>
              </div>
              <i class="bi bi-chevron-down font-size-12 text-muted ms-1"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm border font-size-14">
              <li><h6 class="dropdown-header text-uppercase font-size-11">Switch Stakeholder Portal</h6></li>
              <?php foreach ($demo_roles as $r): ?>
                <li>
                  <a class="dropdown-item d-flex align-items-center gap-2" href="<?php echo base_url($r['path']); ?>">
                    <span class="badge bg-secondary font-size-10"><?php echo $r['avatar']; ?></span>
                    <span><?php echo htmlspecialchars($r['name']); ?></span>
                  </a>
                </li>
              <?php endforeach; ?>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item d-flex align-items-center gap-2 text-danger" href="<?php echo base_url('login.php?logout=1'); ?>">
                  <i class="bi bi-box-arrow-right"></i> Sign Out
                </a>
              </li>
            </ul>
          </div>
        </div>
      </header>

      <!-- Content Body -->
      <main class="erp-content">
        <!-- Breadcrumbs -->
        <div class="breadcrumb-wrapper">
          <ul class="page-breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboards/admin.php'); ?>"><?php echo htmlspecialchars($module_title); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title ?? 'Overview'); ?></li>
          </ul>

          <div class="d-flex align-items-center gap-2 font-size-13 text-muted">
            <span class="badge bg-light text-muted border"><i class="bi bi-building me-1"></i> <?php echo htmlspecialchars($school_config['name']); ?></span>
          </div>
        </div>
