<?php
/**
 * EDUSYS PRO - COMMON SIDEBAR COMPONENT
 */
$active_mod = $active_module ?? '';
$active_sub = $active_submodule ?? '';
?>
    <!-- Master Collapsible Sidebar Navigation -->
    <aside class="erp-sidebar">
      <div class="sidebar-brand">
        <a href="<?php echo base_url('index.php'); ?>" class="d-flex align-items-center gap-2 text-decoration-none">
          <div class="brand-icon">
            <i class="bi bi-mortarboard-fill"></i>
          </div>
          <div class="brand-text">
            <span class="brand-title"><?php echo htmlspecialchars($school_config['short_name']); ?> Pro</span>
            <span class="brand-subtitle">CBSE & State Board</span>
          </div>
        </a>
      </div>

      <div class="sidebar-scroll">
        <ul class="sidebar-nav">
          <!-- Role Dashboards Section -->
          <div class="sidebar-section-title">Stakeholder Dashboards</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/admin.php'); ?>" class="sidebar-nav-link <?php echo ($active_mod === 'dashboard' && $active_sub === 'admin.php') ? 'active' : ''; ?>">
              <i class="bi bi-speedometer2 nav-icon"></i>
              <span class="nav-text">Admin Dashboard</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/principal.php'); ?>" class="sidebar-nav-link <?php echo ($active_mod === 'dashboard' && $active_sub === 'principal.php') ? 'active' : ''; ?>">
              <i class="bi bi-mortarboard nav-icon"></i>
              <span class="nav-text">Principal Desk</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/teacher.php'); ?>" class="sidebar-nav-link <?php echo ($active_mod === 'dashboard' && $active_sub === 'teacher.php') ? 'active' : ''; ?>">
              <i class="bi bi-person-workspace nav-icon"></i>
              <span class="nav-text">Teacher Workplace</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/accountant.php'); ?>" class="sidebar-nav-link <?php echo ($active_mod === 'dashboard' && $active_sub === 'accountant.php') ? 'active' : ''; ?>">
              <i class="bi bi-cash-coin nav-icon"></i>
              <span class="nav-text">Accounts & Fees</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/admission-officer.php'); ?>" class="sidebar-nav-link <?php echo ($active_mod === 'dashboard' && $active_sub === 'admission-officer.php') ? 'active' : ''; ?>">
              <i class="bi bi-person-plus nav-icon"></i>
              <span class="nav-text">Admission Office</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/librarian.php'); ?>" class="sidebar-nav-link <?php echo ($active_mod === 'dashboard' && $active_sub === 'librarian.php') ? 'active' : ''; ?>">
              <i class="bi bi-book nav-icon"></i>
              <span class="nav-text">Library Resource</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/transport-manager.php'); ?>" class="sidebar-nav-link <?php echo ($active_mod === 'dashboard' && $active_sub === 'transport-manager.php') ? 'active' : ''; ?>">
              <i class="bi bi-bus-front nav-icon"></i>
              <span class="nav-text">Transport Fleet</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/hr-manager.php'); ?>" class="sidebar-nav-link <?php echo ($active_mod === 'dashboard' && $active_sub === 'hr-manager.php') ? 'active' : ''; ?>">
              <i class="bi bi-people nav-icon"></i>
              <span class="nav-text">HR & Payroll</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/student.php'); ?>" class="sidebar-nav-link <?php echo ($active_mod === 'dashboard' && $active_sub === 'student.php') ? 'active' : ''; ?>">
              <i class="bi bi-backpack nav-icon"></i>
              <span class="nav-text">Student Portal</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/parent.php'); ?>" class="sidebar-nav-link <?php echo ($active_mod === 'dashboard' && $active_sub === 'parent.php') ? 'active' : ''; ?>">
              <i class="bi bi-house-heart nav-icon"></i>
              <span class="nav-text">Parent Portal</span>
            </a>
          </li>

          <!-- All 28 Core Modules Section -->
          <div class="sidebar-section-title">Core ERP Modules (28)</div>
          <?php foreach ($modules_registry as $mod): ?>
            <?php 
              $is_mod_active = ($active_mod === $mod['key']);
              $collapse_id = 'sub_' . str_replace('-', '_', $mod['key']);
            ?>
            <li class="sidebar-nav-item">
              <a class="sidebar-nav-link <?php echo $is_mod_active ? 'active' : ''; ?>" data-bs-toggle="collapse" href="#<?php echo $collapse_id; ?>" role="button" aria-expanded="<?php echo $is_mod_active ? 'true' : 'false'; ?>">
                <i class="bi <?php echo $mod['icon']; ?> nav-icon"></i>
                <span class="nav-text"><?php echo htmlspecialchars($mod['name']); ?></span>
                <i class="bi bi-chevron-right arrow-icon"></i>
              </a>
              <div class="collapse <?php echo $is_mod_active ? 'show' : ''; ?>" id="<?php echo $collapse_id; ?>">
                <ul class="sidebar-submenu">
                  <?php foreach ($mod['submodules'] as $sub): ?>
                    <?php $is_sub_active = ($is_mod_active && $active_sub === $sub['file']); ?>
                    <li>
                      <a href="<?php echo base_url('modules/' . $mod['key'] . '/' . $sub['file']); ?>" class="sub-link <?php echo $is_sub_active ? 'active' : ''; ?>" title="<?php echo htmlspecialchars($sub['title']); ?>">
                        <?php echo htmlspecialchars($sub['title']); ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="sidebar-footer">
        <div class="user-quick-info">
          <div class="user-avatar-sm current-user-avatar"><?php echo htmlspecialchars($current_user['avatar']); ?></div>
          <div class="user-details-mini">
            <span class="user-name-mini current-user-name"><?php echo htmlspecialchars($current_user['name']); ?></span>
            <span class="user-role-badge-mini current-user-role"><?php echo htmlspecialchars($current_user['role']); ?></span>
          </div>
        </div>
        <a href="<?php echo base_url('login.php?logout=1'); ?>" class="btn btn-sm btn-outline-danger p-1 rounded-circle" title="Sign Out">
          <i class="bi bi-box-arrow-right"></i>
        </a>
      </div>
    </aside>
