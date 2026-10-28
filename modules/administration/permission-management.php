<?php
/**
 * EDUSYS PRO - PERMISSION MANAGEMENT
 * Dedicated operational interface & records management for Permission Management
 */
$page_title = "Permission Management";
$page_desc = "Granular Role-Based Access Control (RBAC) matrix for View, Create, Edit, Delete, and Export across all 28 modules";
$active_module = "administration";
$active_submodule = "permission-management.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'permission-management_export.csv')" title="Export Table as CSV">
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
        <h6>Governed Modules</h6>
        <div class="kpi-value">28 Modules</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Full RBAC Coverage</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-grid-3x3-gap-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Granular Controls</h6>
        <div class="kpi-value">CRUD + Export</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 5 Operation Gates</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-toggles"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Custom Overrides</h6>
        <div class="kpi-value">8 Special Grants</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Role-Specific Permissions</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-plus"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Security Audit</h6>
        <div class="kpi-value">Passed 100%</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> CBSE & ISO 27001 Standard</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search module, permission ID, role...">
    </div>
    <select class="form-select" style="max-width: 240px;">
      <option selected>All Modules</option>
      <option >Administration & Setup</option>
      <option >Admissions & SIS</option>
      <option >Academics & Timetable</option>
      <option >Examinations & Marks</option>
      <option >Fees & Finance</option>
      <option >HR & Payroll</option>
      <option >Transport & Operations</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Permission Active</option>
      <option >Restricted</option>
      <option >Read-Only Grant</option>
      <option >Blocked</option>
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
        <th>Permission ID</th>
        <th>Governed Module Scope</th>
        <th>Target Role</th>
        <th>View / Read</th>
        <th>Create / Add</th>
        <th>Edit / Update</th>
        <th>Delete / Purge</th>
        <th>Export CSV/PDF</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRM-ADM-01</td>
        <td>
          <div class="fw-semibold text-dark">Administration & Master Setup</div>
          <small class="text-muted font-size-11">School Profile, Branding, System Config</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Super Administrator</span></td>
        <td><small class="text-dark">Granted (Full)</small></td>
        <td><small class="text-muted font-mono font-size-12">Granted (Full)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Granted (Full)</span></td>
        <td><small class="text-muted">Granted (Full)</small></td>
        <td><span class="badge-status undefined">Granted (Full)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Permission Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRM-ADM-02</td>
        <td>
          <div class="fw-semibold text-dark">Administration & Master Setup</div>
          <small class="text-muted font-size-11">School Profile, Branding, System Config</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">School Principal</span></td>
        <td><small class="text-dark">Granted (Full)</small></td>
        <td><small class="text-muted font-mono font-size-12">Granted (Full)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Granted (Full)</span></td>
        <td><small class="text-muted">Restricted (No)</small></td>
        <td><span class="badge-status undefined">Granted (Full)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Permission Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRM-ADM-03</td>
        <td>
          <div class="fw-semibold text-dark">Administration & Master Setup</div>
          <small class="text-muted font-size-11">School Profile, Branding, System Config</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Teaching Faculty</span></td>
        <td><small class="text-dark">Read Only</small></td>
        <td><small class="text-muted font-mono font-size-12">Blocked (No)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Blocked (No)</span></td>
        <td><small class="text-muted">Blocked (No)</small></td>
        <td><span class="badge-status undefined">Blocked (No)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Permission Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRM-FEE-01</td>
        <td>
          <div class="fw-semibold text-dark">Fees Management & Invoicing</div>
          <small class="text-muted font-size-11">Challans, Receipts, Outstanding Ledgers</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Accountant</span></td>
        <td><small class="text-dark">Granted (Full)</small></td>
        <td><small class="text-muted font-mono font-size-12">Granted (Full)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Granted (Full)</span></td>
        <td><small class="text-muted">Restricted (No)</small></td>
        <td><span class="badge-status undefined">Granted (Full)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Permission Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRM-FEE-02</td>
        <td>
          <div class="fw-semibold text-dark">Fees Management & Invoicing</div>
          <small class="text-muted font-size-11">Challans, Receipts, Outstanding Ledgers</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Teaching Faculty</span></td>
        <td><small class="text-dark">View Own Class</small></td>
        <td><small class="text-muted font-mono font-size-12">Blocked (No)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Blocked (No)</span></td>
        <td><small class="text-muted">Blocked (No)</small></td>
        <td><span class="badge-status undefined">Blocked (No)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Permission Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRM-EXM-01</td>
        <td>
          <div class="fw-semibold text-dark">Examination & Results Processing</div>
          <small class="text-muted font-size-11">Report Cards, Marks Entry, Grading</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Teaching Faculty</span></td>
        <td><small class="text-dark">Granted (Full)</small></td>
        <td><small class="text-muted font-mono font-size-12">Granted (Marks)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Granted (Marks)</span></td>
        <td><small class="text-muted">Blocked (No)</small></td>
        <td><span class="badge-status undefined">Granted (Class)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Permission Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRM-TRP-01</td>
        <td>
          <div class="fw-semibold text-dark">Transport & GPS Telematics</div>
          <small class="text-muted font-size-11">Bus Routes, Vehicle Tracking, Fuel Logs</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Transport Supervisor</span></td>
        <td><small class="text-dark">Granted (Full)</small></td>
        <td><small class="text-muted font-mono font-size-12">Granted (Full)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Granted (Full)</span></td>
        <td><small class="text-muted">Blocked (No)</small></td>
        <td><span class="badge-status undefined">Granted (Full)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Permission Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRM-LIB-01</td>
        <td>
          <div class="fw-semibold text-dark">Library & Book Circulation</div>
          <small class="text-muted font-size-11">Accession Register, Issue/Return, Fines</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Librarian</span></td>
        <td><small class="text-dark">Granted (Full)</small></td>
        <td><small class="text-muted font-mono font-size-12">Granted (Full)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Granted (Full)</span></td>
        <td><small class="text-muted">Restricted (No)</small></td>
        <td><span class="badge-status undefined">Granted (Full)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Permission Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
