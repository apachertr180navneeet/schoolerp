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
          
          <!-- Topbar Modern Search UI -->
          <div class="header-search-wrapper" id="topbarSearchContainer">
            <div class="header-search-box">
              <i class="bi bi-search search-box-icon"></i>
              <input 
                type="text" 
                id="topbarSearchInput" 
                class="search-box-input" 
                placeholder="Search modules, screens, students..." 
                autocomplete="off"
                spellcheck="false"
              >
              <button type="button" class="search-box-clear d-none" id="topbarSearchClear" title="Clear">
                <i class="bi bi-x"></i>
              </button>
              <kbd class="search-box-kbd" id="topbarSearchKbd">Ctrl+K</kbd>
            </div>

            <!-- Instant Live Results Dropdown -->
            <div class="header-search-dropdown d-none shadow-lg" id="topbarSearchDropdown">
              <div class="search-dropdown-header d-flex justify-content-between align-items-center px-3 py-2 border-bottom bg-light">
                <span class="font-size-11 fw-bold text-uppercase text-muted tracking-wider">Quick Jump (500+ Screens)</span>
                <span class="badge bg-primary-subtle text-primary font-size-10 fw-bold" id="topbarSearchBadge">Live</span>
              </div>
              <div class="search-dropdown-list" id="topbarSearchResults">
                <!-- Dynamically populated via JS -->
              </div>
              <div class="search-dropdown-footer d-flex justify-content-between align-items-center px-3 py-1.5 border-top bg-light font-size-11 text-muted">
                <span><kbd class="kbd-sm">↑</kbd> <kbd class="kbd-sm">↓</kbd> navigate</span>
                <span><kbd class="kbd-sm">Enter</kbd> open</span>
                <span><kbd class="kbd-sm">Esc</kbd> close</span>
              </div>
            </div>
          </div>
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

          <!-- User Menu Dropdown (Profile Update, Change Password & Logout Only) -->
          <div class="dropdown">
            <button class="user-menu-btn" data-bs-toggle="dropdown" aria-expanded="false" id="userMenuDropdownBtn">
              <div class="user-menu-avatar current-user-avatar"><?php echo htmlspecialchars($current_user['avatar']); ?></div>
              <div class="user-menu-info">
                <span class="user-menu-name current-user-name"><?php echo htmlspecialchars($current_user['name']); ?></span>
                <span class="user-menu-role current-user-role"><?php echo htmlspecialchars($current_user['role']); ?></span>
              </div>
              <i class="bi bi-chevron-down font-size-12 text-muted ms-1"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end shadow-lg border border-secondary border-opacity-10 rounded-3 p-0" style="min-width: 270px; overflow: hidden;">
              <!-- User Header Card -->
              <div class="p-3 bg-light border-bottom">
                <div class="d-flex align-items-center gap-3">
                  <div class="user-menu-avatar current-user-avatar fw-bold font-size-15" style="width: 42px; height: 42px; flex-shrink: 0;">
                    <?php echo htmlspecialchars($current_user['avatar']); ?>
                  </div>
                  <div class="overflow-hidden">
                    <strong class="d-block text-truncate font-size-14 text-dark mb-0 current-user-name"><?php echo htmlspecialchars($current_user['name']); ?></strong>
                    <span class="badge bg-primary-subtle text-primary border border-primary border-opacity-25 font-size-11 fw-bold rounded-pill my-0.5"><?php echo htmlspecialchars($current_user['role']); ?></span>
                    <small class="d-block text-muted font-size-11 text-truncate"><?php echo htmlspecialchars($current_user['email']); ?></small>
                  </div>
                </div>
              </div>

              <!-- Only Profile Update & Change Password -->
              <div class="py-2">
                <button type="button" class="dropdown-item d-flex align-items-center gap-3 px-3 py-2 text-dark font-size-13" data-bs-toggle="modal" data-bs-target="#profileUpdateModal">
                  <div class="p-1.5 rounded-2 bg-primary-subtle text-primary font-size-15 flex-shrink-0 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                    <i class="bi bi-person-gear"></i>
                  </div>
                  <div>
                    <span class="fw-semibold d-block text-dark">Profile Update</span>
                    <small class="text-muted font-size-11">Name, contact & photo</small>
                  </div>
                </button>
                
                <button type="button" class="dropdown-item d-flex align-items-center gap-3 px-3 py-2 text-dark font-size-13" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                  <div class="p-1.5 rounded-2 bg-warning-subtle text-warning font-size-15 flex-shrink-0 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                    <i class="bi bi-shield-lock-fill"></i>
                  </div>
                  <div>
                    <span class="fw-semibold d-block text-dark">Change Password</span>
                    <small class="text-muted font-size-11">Security & login credentials</small>
                  </div>
                </button>
              </div>

              <!-- Logout -->
              <div class="border-top p-1 bg-light bg-opacity-50">
                <a class="dropdown-item d-flex align-items-center gap-2.5 px-3 py-2 text-danger rounded-2 font-size-13 fw-semibold" href="<?php echo base_url('login.php?logout=1'); ?>">
                  <i class="bi bi-box-arrow-right font-size-16"></i>
                  <span>Logout</span>
                </a>
              </div>
            </div>
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
