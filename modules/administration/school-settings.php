<?php
/**
 * EDUSYS PRO - SCHOOL SETTINGS
 * Dedicated operational interface & records management for School Settings
 */
$page_title = "School Settings";
$page_desc = "Core institutional ERP parameters, financial year rules, timezone, currency, grading systems, and SMS gateway credentials";
$active_module = "administration";
$active_submodule = "school-settings.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'school-settings_export.csv')" title="Export Table as CSV">
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
        <h6>ERP Engine Version</h6>
        <div class="kpi-value">v4.2.0-PRO</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Continuous LTS Release</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cpu-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Timezone & Locale</h6>
        <div class="kpi-value">Asia/Kolkata</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Indian Standard Time (IST)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-globe-central-south-asia"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Active Currency</h6>
        <div class="kpi-value">₹ INR</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Indian Rupee Standard</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-currency-rupee"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Gateways Online</h6>
        <div class="kpi-value">100% Operational</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> SMS, WhatsApp, Email, Razorpay</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-fill-check"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search config parameter, setting title, category...">
    </div>
    <select class="form-select" style="max-width: 240px;">
      <option selected>All Configuration Domains</option>
      <option >Institutional Identifiers</option>
      <option >Academic & Grading Policies</option>
      <option >Financial & Fee Parameters</option>
      <option >Communication Gateways & API</option>
      <option >Security & Session Rules</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active / Enforced</option>
      <option >System Locked</option>
      <option >Custom Configured</option>
      <option >Pending Sync</option>
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
        <th>Config Key</th>
        <th>Parameter Title & Description</th>
        <th>Category</th>
        <th>Active System Value</th>
        <th>Default Value</th>
        <th>Modified By</th>
        <th>Last Updated</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CONF-GEN-01</td>
        <td>
          <div class="fw-semibold text-dark">Official Institution Name</div>
          <small class="text-muted font-size-11">Primary legal school identity in all reports</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Institutional Identifiers</span></td>
        <td><small class="text-dark">Delhi Public Global Academy</small></td>
        <td><small class="text-muted font-mono font-size-12">Delhi Public Global Academy</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Super Administrator</span></td>
        <td><small class="text-muted">28 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Enforced</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Settings')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CONF-GEN-02</td>
        <td>
          <div class="fw-semibold text-dark">CBSE Affiliation Number</div>
          <small class="text-muted font-size-11">Official board affiliation reference for LOC</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Institutional Identifiers</span></td>
        <td><small class="text-dark">2130842 (Valid till 2029)</small></td>
        <td><small class="text-muted font-mono font-size-12">2130842</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Super Administrator</span></td>
        <td><small class="text-muted">28 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Locked</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Settings')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CONF-ACA-03</td>
        <td>
          <div class="fw-semibold text-dark">Active Academic Year</div>
          <small class="text-muted font-size-11">Primary active academic session for student roster</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Academic Policies</span></td>
        <td><small class="text-dark">2024-2025 (Active Cycle)</small></td>
        <td><small class="text-muted font-mono font-size-12">2024-2025</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dean Academics</span></td>
        <td><small class="text-muted">01 Apr 2024</small></td>
        <td><span class="badge-status badge-active">Enforced</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Settings')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CONF-ACA-04</td>
        <td>
          <div class="fw-semibold text-dark">Grading Scale Model</div>
          <small class="text-muted font-size-11">Assessment scoring standard</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Academic Policies</span></td>
        <td><small class="text-dark">CBSE 9-Point Grading (A1 to E)</small></td>
        <td><small class="text-muted font-mono font-size-12">CBSE 9-Point Scale</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dean Academics</span></td>
        <td><small class="text-muted">15 May 2024</small></td>
        <td><span class="badge-status badge-active">Enforced</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Settings')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CONF-FIN-05</td>
        <td>
          <div class="fw-semibold text-dark">Late Fee Penalty Policy</div>
          <small class="text-muted font-size-11">Grace period and daily charge after due date</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Financial Rules</span></td>
        <td><small class="text-dark">₹50 / Day after 10th of Month</small></td>
        <td><small class="text-muted font-mono font-size-12">₹50 / Day</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Chief Accountant</span></td>
        <td><small class="text-muted">10 Jul 2024</small></td>
        <td><span class="badge-status badge-active">Enforced</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Settings')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CONF-SEC-06</td>
        <td>
          <div class="fw-semibold text-dark">Staff Session Timeout</div>
          <small class="text-muted font-size-11">Automatic logout threshold for inactive admin sessions</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Security Rules</span></td>
        <td><small class="text-dark">30 Minutes Inactivity</small></td>
        <td><small class="text-muted font-mono font-size-12">30 Mins</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">IT Systems Admin</span></td>
        <td><small class="text-muted">20 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Enforced</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Settings')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CONF-COM-07</td>
        <td>
          <div class="fw-semibold text-dark">SMS & WhatsApp DLT Provider</div>
          <small class="text-muted font-size-11">Govt DLT approved messaging gateway for attendance & fee</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Gateways & API</span></td>
        <td><small class="text-dark">GupShup Enterprise DLT (Active)</small></td>
        <td><small class="text-muted font-mono font-size-12">GupShup Live</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">IT Systems Admin</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Enforced</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Settings')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CONF-PAY-08</td>
        <td>
          <div class="fw-semibold text-dark">Online Fee Payment Gateway</div>
          <small class="text-muted font-size-11">Parent portal payment processing engine</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Gateways & API</span></td>
        <td><small class="text-dark">Razorpay Enterprise (PG_LIVE_9481)</small></td>
        <td><small class="text-muted font-mono font-size-12">Razorpay Live</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Chief Accountant</span></td>
        <td><small class="text-muted">18 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Enforced</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Settings')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
