<?php
/**
 * EDUSYS PRO - STAFF LEAVE APPLICATIONS
 * Dedicated operational interface & records management for Staff Leave Applications
 */
$page_title = "Staff Leave Applications";
$page_desc = "Faculty Casual Leave (CL), Earned Leave (EL), Medical Leave (ML), and automated relief substitution linkages";
$active_module = "attendance";
$active_submodule = "staff-leaves.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/attendance/dashboard.php'); ?>">Attendance Management</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-calendar2-minus-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'staff-leaves_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-calendar-plus me-1"></i> Apply Staff Leave
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Active Staff Leaves</h6>
        <div class="kpi-value">4 Teachers on Leave</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Substitutions Covered</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-x"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Leave Balance Registry</h6>
        <div class="kpi-value">100% Updated</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> CL, EL, ML Portals Synced</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-wallet2"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Relief Faculty</h6>
        <div class="kpi-value">100% Confirmed</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Zero Period Disruption</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Approval Workflow</h6>
        <div class="kpi-value">HR & Principal</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Automated Hierarchy</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-diagram-3-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search staff leave ref #, teacher, department, type...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Leave Categories</option>
      <option >Casual Leave (CL)</option>
      <option >Medical Leave (ML)</option>
      <option >Earned Leave (EL)</option>
      <option >On Official Duty (OD)</option>
      <option >Maternity / Paternity Leave</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Sanctioned & Relief Set</option>
      <option >Pending Principal Sanction</option>
      <option >Rejected</option>
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
        <th>Leave Ref #</th>
        <th>Staff Full Name</th>
        <th>Department & Role</th>
        <th>Leave Type (CL/ML/EL)</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Substitute Teacher Assigned</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LEV-STF-001</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Meenakshi Soni</div>
          <small class="text-muted font-size-11">Emp #FAC-007</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Languages Department</span></td>
        <td><small class="text-dark">Casual Leave (CL)</small></td>
        <td><small class="text-muted font-mono font-size-12">Today (28 Oct)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Today (28 Oct)</span></td>
        <td><small class="text-muted">Mr. Deepak Rawat & Mrs. Shalini</small></td>
        <td><span class="badge-status badge-active">Sanctioned</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Staff Leave Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LEV-STF-002</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Kunal Bansal</div>
          <small class="text-muted font-size-11">Emp #FAC-008</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Computer Science</span></td>
        <td><small class="text-dark">Medical Leave (ML)</small></td>
        <td><small class="text-muted font-mono font-size-12">Today (28 Oct)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Tomorrow (29 Oct)</span></td>
        <td><small class="text-muted">Dr. K. L. Sharma & Mrs. Sunita</small></td>
        <td><span class="badge-status badge-active">Sanctioned</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Staff Leave Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LEV-STF-003</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Harish Chawla</div>
          <small class="text-muted font-size-11">Emp #FAC-014</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Sports & Physical Ed</span></td>
        <td><small class="text-dark">On Official Duty (OD)</small></td>
        <td><small class="text-muted font-mono font-size-12">Today (28 Oct)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">30 Oct 2024</span></td>
        <td><small class="text-muted">Mr. S. K. Rastogi (Indoor)</small></td>
        <td><span class="badge-status badge-active">Sanctioned</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Staff Leave Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LEV-STF-004</td>
        <td>
          <div class="fw-semibold text-dark">Ms. Kavita Joshi</div>
          <small class="text-muted font-size-11">Emp #STF-007</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Front Office Reception</span></td>
        <td><small class="text-dark">Casual Leave (Half-Day)</small></td>
        <td><small class="text-muted font-mono font-size-12">Today (12:00 PM)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Today (03:45 PM)</span></td>
        <td><small class="text-muted">Mrs. Ritu Sharma (Relief)</small></td>
        <td><span class="badge-status badge-active">Sanctioned</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Staff Leave Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LEV-STF-005</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Radhika Iyer</div>
          <small class="text-muted font-size-11">Emp #FAC-004</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Science (Biology)</span></td>
        <td><small class="text-dark">Earned Leave (EL)</small></td>
        <td><small class="text-muted font-mono font-size-12">04 Nov 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">08 Nov 2024</span></td>
        <td><small class="text-muted">Dr. Sunita Kapoor (Pending Plan)</small></td>
        <td><span class="badge-status badge-pending">Pending Principal</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Staff Leave Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LEV-STF-006</td>
        <td>
          <div class="fw-semibold text-dark">Mr. S. K. Rastogi</div>
          <small class="text-muted font-size-11">Emp #FAC-010</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mathematics</span></td>
        <td><small class="text-dark">Casual Leave (CL)</small></td>
        <td><small class="text-muted font-mono font-size-12">01 Nov 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">02 Nov 2024</span></td>
        <td><small class="text-muted">Mrs. Sunita Kaul (Relief Plan)</small></td>
        <td><span class="badge-status badge-active">Sanctioned</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Staff Leave Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LEV-STF-007</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Anjali Saxena</div>
          <small class="text-muted font-size-11">Emp #HR-001</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Human Resources</span></td>
        <td><small class="text-dark">On Official Duty (OD)</small></td>
        <td><small class="text-muted font-mono font-size-12">29 Oct 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">29 Oct 2024</span></td>
        <td><small class="text-muted">Rohan Vashisht (Registrar)</small></td>
        <td><span class="badge-status badge-active">Sanctioned</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Staff Leave Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LEV-STF-008</td>
        <td>
          <div class="fw-semibold text-dark">Mr. M. K. Chawla</div>
          <small class="text-muted font-size-11">Emp #FAC-009</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Commerce</span></td>
        <td><small class="text-dark">Casual Leave (CL)</small></td>
        <td><small class="text-muted font-mono font-size-12">05 Nov 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">05 Nov 2024</span></td>
        <td><small class="text-muted">Mr. S. K. Rastogi (Relief)</small></td>
        <td><span class="badge-status badge-pending">Pending Principal</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Staff Leave Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
