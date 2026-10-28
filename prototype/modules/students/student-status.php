<?php
/**
 * EDUSYS PRO - STUDENT STATUS
 * Dedicated operational interface & records management for Student Status
 */
$page_title = "Student Status";
$page_desc = "Real-time student lifecycle states: Active, Extended Leave, Suspended, Detained, or Dispatched TC";
$active_module = "students";
$active_submodule = "student-status.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/students/dashboard.php'); ?>">Student Information System</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-toggle-on text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'student-status_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-arrow-repeat me-1"></i> Update Status Roster
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Active Enrolled</h6>
        <div class="kpi-value">2,840 Scholars</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Current Academic Term</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check-circle-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>On Medical Leave</h6>
        <div class="kpi-value">14 Scholars</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Pediatric Leave Approved</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-hospital-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Suspended / Disciplinary</h6>
        <div class="kpi-value">2 Scholars</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Under Committee Review</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-exclamation-octagon-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>TC Issued & Exited</h6>
        <div class="kpi-value">18 Scholars</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Completed Academic Exit</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-box-arrow-right"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search student, admission #, class, status...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Lifecycle States</option>
      <option >Active & Attending</option>
      <option >Approved Long Leave (Medical)</option>
      <option >Special Learning Needs Leave</option>
      <option >Disciplinary Suspension</option>
      <option >Transferred / TC Issued</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active</option>
      <option >On Leave</option>
      <option >Suspended</option>
      <option >TC Dispatched</option>
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
        <th>Admission #</th>
        <th>Student Full Name</th>
        <th>Grade & Section</th>
        <th>Current Lifecycle Status</th>
        <th>Status Reason / Order</th>
        <th>Effective From</th>
        <th>Officer Authorizing</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-001</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Roll #01</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">Active & Attending Daily</small></td>
        <td><small class="text-muted font-mono font-size-12">Regular Student Roster</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">01 Jul 2024</span></td>
        <td><small class="text-muted">Class Teacher</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Status')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-002</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Roll #02</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">Active & Attending Daily</small></td>
        <td><small class="text-muted font-mono font-size-12">Regular Student Roster</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">01 Jul 2024</span></td>
        <td><small class="text-muted">Class Teacher</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Status')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-003</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Roll #01</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">Active & Attending Daily</small></td>
        <td><small class="text-muted font-mono font-size-12">Regular Student Roster</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">01 Jul 2024</span></td>
        <td><small class="text-muted">Class Teacher</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Status')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-004</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Roll #02</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">Active & Attending Daily</small></td>
        <td><small class="text-muted font-mono font-size-12">Regular Student Roster</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">01 Jul 2024</span></td>
        <td><small class="text-muted">Class Teacher</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Status')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-005</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Roll #05</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-dark">Active & Attending Daily</small></td>
        <td><small class="text-muted font-mono font-size-12">Regular Student Roster</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">01 Jul 2024</span></td>
        <td><small class="text-muted">Class Teacher</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Status')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-006</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Roll #08</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCB)</span></td>
        <td><small class="text-dark">Active & Attending Daily</small></td>
        <td><small class="text-muted font-mono font-size-12">Regular Student Roster</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">01 Jul 2024</span></td>
        <td><small class="text-muted">Class Teacher</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Status')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-007</td>
        <td>
          <div class="fw-semibold text-dark">Karan Saxena</div>
          <small class="text-muted font-size-11">Roll #24</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Section C</span></td>
        <td><small class="text-dark">Medical Leave (Dengue Recovery)</small></td>
        <td><small class="text-muted font-mono font-size-12">Infirmary Approved (10 Days)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">20 Oct 2024</span></td>
        <td><small class="text-muted">Dr. Sunita Kapoor</small></td>
        <td><span class="badge-status badge-pending">On Leave</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Status')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-008</td>
        <td>
          <div class="fw-semibold text-dark">Tushar Sengupta</div>
          <small class="text-muted font-size-11">Roll #18</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 8 - Section B</span></td>
        <td><small class="text-dark">Transferred & TC Dispatched</small></td>
        <td><small class="text-muted font-mono font-size-12">Parent Overseas Relocation</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">18 Oct 2024</span></td>
        <td><small class="text-muted">Dr. Ananya Roy (Principal)</small></td>
        <td><span class="badge-status badge-inactive">TC Dispatched</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Status')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
