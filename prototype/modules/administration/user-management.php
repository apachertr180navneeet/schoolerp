<?php
/**
 * EDUSYS PRO - USER MANAGEMENT
 * Dedicated operational interface & records management for User Management
 */
$page_title = "User Management";
$page_desc = "Institutional staff user directory, system logins, credential provisioning, 2FA status, and session tracking";
$active_module = "administration";
$active_submodule = "user-management.php";
$depth = 2;

require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/sidebar.php';
require_once __DIR__ . '/../../includes/topbar.php';
?>

<!-- Breadcrumb Navigation -->
<div class="breadcrumb-wrapper mb-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-0 font-size-13">
      <li class="breadcrumb-item"><a href="<?php echo base_url('dashboards/admin.php'); ?>"><i class="bi bi-house-door me-1"></i> Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/administration/school-profile.php'); ?>">Administration & Setup</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-layers text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/administration/school-profile.php'); ?>" class="btn btn-light border" title="School Institutional Dossier">
      <i class="bi bi-building me-1"></i> Profile
    </a>
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'user-management_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Add New Record
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>System Users</h6>
        <div class="kpi-value">168 Accounts</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Staff & Faculty Logins</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Super Admins</h6>
        <div class="kpi-value">4 Users</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Root System Access</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-lock-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Teaching Faculty</h6>
        <div class="kpi-value">124 Users</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Attendance, Marks & LMS</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-mortarboard-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>2FA Enforced</h6>
        <div class="kpi-value">100% Compliant</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> SMS OTP & Authenticator</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-phone-vibrate-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search user ID, staff name, email, role...">
    </div>
    <select class="form-select" style="max-width: 240px;">
      <option selected>All Roles</option>
      <option >Super Administrator</option>
      <option >School Principal</option>
      <option >Dean Academics</option>
      <option >Teaching Faculty</option>
      <option >Accountant / Cashier</option>
      <option >Transport Officer</option>
      <option >Librarian</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active Account</option>
      <option >Suspended</option>
      <option >Password Reset Required</option>
      <option >Locked Out</option>
    </select>
  </div>
  <div class="table-filter-right">
    <span class="font-size-13 text-muted">Showing <strong class="table-visible-count text-primary">8</strong> verified records</span>
  </div>
</div>

<!-- Domain Data Table -->
<div class="erp-table-responsive mb-0">
  <table class="erp-table" id="mainDataTable">
    <thead>
      <tr>
        <th>User ID #</th>
        <th>Staff Full Name</th>
        <th>System Role</th>
        <th>Email Login ID</th>
        <th>Registered Mobile</th>
        <th>2FA Security</th>
        <th>Last Login Time</th>
        <th>Account Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">USR-001</td>
        <td>
          <div class="fw-semibold text-dark">Dr. Ananya Roy</div>
          <small class="text-muted font-size-11">Principal & Head of School</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">School Principal</span></td>
        <td><small class="text-dark">principal@dpga.edu.in</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98110 00001</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">App OTP (Active)</span></td>
        <td><small class="text-muted">Today (08:15 AM)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'User Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">USR-002</td>
        <td>
          <div class="fw-semibold text-dark">Vikram Malhotra</div>
          <small class="text-muted font-size-11">Director Information Tech</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Super Administrator</span></td>
        <td><small class="text-dark">admin@dpga.edu.in</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98110 00002</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">YubiKey & App OTP</span></td>
        <td><small class="text-muted">Today (07:45 AM)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'User Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">USR-003</td>
        <td>
          <div class="fw-semibold text-dark">Dr. Alok Verma</div>
          <small class="text-muted font-size-11">HOD Physics & Science Dean</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Dean Academics</span></td>
        <td><small class="text-dark">alok.verma@dpga.edu.in</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98110 00003</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">SMS OTP (Active)</span></td>
        <td><small class="text-muted">Today (08:30 AM)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'User Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">USR-004</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Radhika Iyer</div>
          <small class="text-muted font-size-11">HOD Commerce & Sr Faculty</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Teaching Faculty</span></td>
        <td><small class="text-dark">radhika.iyer@dpga.edu.in</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98110 00004</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">SMS OTP (Active)</span></td>
        <td><small class="text-muted">Today (08:45 AM)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'User Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">USR-005</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Sunita Kaul</div>
          <small class="text-muted font-size-11">Senior Secondary Mathematics</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Teaching Faculty</span></td>
        <td><small class="text-dark">sunita.kaul@dpga.edu.in</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98110 00005</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">SMS OTP (Active)</span></td>
        <td><small class="text-muted">Today (08:50 AM)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'User Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">USR-006</td>
        <td>
          <div class="fw-semibold text-dark">Suresh Chawla</div>
          <small class="text-muted font-size-11">Chief Accounts Officer</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Accountant</span></td>
        <td><small class="text-dark">accounts@dpga.edu.in</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98110 00006</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">App OTP (Active)</span></td>
        <td><small class="text-muted">Today (08:20 AM)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'User Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">USR-007</td>
        <td>
          <div class="fw-semibold text-dark">Harish Chander</div>
          <small class="text-muted font-size-11">Fleet Operations Manager</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Transport Supervisor</span></td>
        <td><small class="text-dark">transport@dpga.edu.in</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98110 00007</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">SMS OTP (Active)</span></td>
        <td><small class="text-muted">Today (07:15 AM)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'User Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">USR-008</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Meenakshi Soni</div>
          <small class="text-muted font-size-11">Head Librarian & Media Center</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Librarian</span></td>
        <td><small class="text-dark">library@dpga.edu.in</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98110 00008</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">SMS OTP (Active)</span></td>
        <td><small class="text-muted">Today (08:40 AM)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'User Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
