<?php
/**
 * EDUSYS PRO - ROLE MANAGEMENT
 * Dedicated operational interface & records management for Role Management
 */
$page_title = "Role Management";
$page_desc = "Role definitions, security tiers, hierarchical access roles, and default permission inheritance";
$active_module = "administration";
$active_submodule = "role-management.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'role-management_export.csv')" title="Export Table as CSV">
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
        <h6>Configured Roles</h6>
        <div class="kpi-value">12 System Roles</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> RBAC Security Grid</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-shaded"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Tier 1 Root Roles</h6>
        <div class="kpi-value">2 Roles</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Super Admin & Principal</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-key-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Assigned Users</h6>
        <div class="kpi-value">168 Active Users</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> All Staff Profiled</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Inheritance Tree</h6>
        <div class="kpi-value">Hierarchical</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Strict Parent-Child Tiers</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-diagram-3"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search role code, title, tier...">
    </div>
    <select class="form-select" style="max-width: 240px;">
      <option selected>All Security Tiers</option>
      <option >Tier 1: Root / Executive</option>
      <option >Tier 2: Academic Leadership</option>
      <option >Tier 3: Teaching Faculty</option>
      <option >Tier 4: Administrative & Finance</option>
      <option >Tier 5: Operational Support</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active & Enforced</option>
      <option >System Reserved</option>
      <option >Under Audit</option>
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
        <th>Role Code</th>
        <th>Role Title & Scope</th>
        <th>Security Tier</th>
        <th>Assigned Staff Count</th>
        <th>Default Landing Dashboard</th>
        <th>Permission Grants</th>
        <th>Created Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ROLE-ROOT</td>
        <td>
          <div class="fw-semibold text-dark">Super Administrator</div>
          <small class="text-muted font-size-11">Full unrestricted system root privileges</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Tier 1 (Root Access)</span></td>
        <td><small class="text-dark">4 Users</small></td>
        <td><small class="text-muted font-mono font-size-12">dashboards/admin.php</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">All 28 Modules (Full Control)</span></td>
        <td><small class="text-muted">01 Apr 2024</small></td>
        <td><span class="badge-status badge-active">System Reserved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Role Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ROLE-PRIN</td>
        <td>
          <div class="fw-semibold text-dark">School Principal</div>
          <small class="text-muted font-size-11">Executive academic, HR, and institutional sanction</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Tier 1 (Executive)</span></td>
        <td><small class="text-dark">1 User</small></td>
        <td><small class="text-muted font-mono font-size-12">dashboards/principal.php</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Full Read + Sanction + Audit</span></td>
        <td><small class="text-muted">01 Apr 2024</small></td>
        <td><span class="badge-status badge-active">System Reserved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Role Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ROLE-DEAN</td>
        <td>
          <div class="fw-semibold text-dark">Dean Academics / Vice Principal</div>
          <small class="text-muted font-size-11">Curriculum, timetable, examinations & PTM</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Tier 2 (Academic Lead)</span></td>
        <td><small class="text-dark">2 Users</small></td>
        <td><small class="text-muted font-mono font-size-12">dashboards/admin.php</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Academics, SIS, Exams, PTM</span></td>
        <td><small class="text-muted">01 Apr 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Role Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ROLE-TCH</td>
        <td>
          <div class="fw-semibold text-dark">Teaching Faculty / Class Teacher</div>
          <small class="text-muted font-size-11">Attendance, marks, assignments, PTM slots</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Tier 3 (Faculty)</span></td>
        <td><small class="text-dark">124 Users</small></td>
        <td><small class="text-muted font-mono font-size-12">dashboards/teacher.php</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Classroom SIS, LMS, Marks, PTM</span></td>
        <td><small class="text-muted">01 Apr 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Role Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ROLE-ACC</td>
        <td>
          <div class="fw-semibold text-dark">Chief Accountant / Cashier</div>
          <small class="text-muted font-size-11">Fee collection, receipts, salaries, vouchers</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Tier 4 (Finance)</span></td>
        <td><small class="text-dark">5 Users</small></td>
        <td><small class="text-muted font-mono font-size-12">dashboards/accountant.php</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Fees, Finance, Payroll, Vouchers</span></td>
        <td><small class="text-muted">01 Apr 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Role Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ROLE-TRP</td>
        <td>
          <div class="fw-semibold text-dark">Transport & Fleet Manager</div>
          <small class="text-muted font-size-11">Bus routes, vehicle telematics, fuel, drivers</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Tier 4 (Operations)</span></td>
        <td><small class="text-dark">3 Users</small></td>
        <td><small class="text-muted font-mono font-size-12">modules/transport/routes.php</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Transport & GPS Telematics Only</span></td>
        <td><small class="text-muted">01 Apr 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Role Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ROLE-LIB</td>
        <td>
          <div class="fw-semibold text-dark">Head Librarian</div>
          <small class="text-muted font-size-11">Accession register, book circulation, overdue fines</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Tier 4 (Operations)</span></td>
        <td><small class="text-dark">3 Users</small></td>
        <td><small class="text-muted font-mono font-size-12">modules/library/books.php</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Library Management Only</span></td>
        <td><small class="text-muted">01 Apr 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Role Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ROLE-REC</td>
        <td>
          <div class="fw-semibold text-dark">Front Desk & Receptionist</div>
          <small class="text-muted font-size-11">Visitor passes, enquiries, postal logs, gate check</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Tier 5 (Support)</span></td>
        <td><small class="text-dark">4 Users</small></td>
        <td><small class="text-muted font-mono font-size-12">modules/front-office/visitors.php</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Front Office, Visitors, Gate Pass</span></td>
        <td><small class="text-muted">01 Apr 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Role Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
