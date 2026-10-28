<?php
/**
 * EDUSYS PRO - TEACHER ATTENDANCE
 * Dedicated operational interface & records management for Teacher Attendance
 */
$page_title = "Teacher Attendance";
$page_desc = "Teaching faculty biometric punch logs, morning arrival timestamps, half-day leaves, and duty rosters";
$active_module = "attendance";
$active_submodule = "teacher-attendance.php";
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
    <h1><i class="bi bi-person-badge-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'teacher-attendance_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-person-check me-1"></i> Mark Faculty Attendance
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Faculty Present</h6>
        <div class="kpi-value">108 Teachers</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 96.4% Attendance Today</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>On Casual / Sick Leave</h6>
        <div class="kpi-value">4 Faculty</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Substitutions Assigned</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-x-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Average Arrival Time</h6>
        <div class="kpi-value">07:18 AM</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> 12 Mins Before Assembly</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-clock"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Biometric Punch In</h6>
        <div class="kpi-value">100% Synced</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Facial / Fingerprint Terminal</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-fingerprint"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search teacher name, emp ID, department, status...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Departments</option>
      <option >Science Department (PCM/B)</option>
      <option >Mathematics Department</option>
      <option >Commerce & Economics</option>
      <option >Humanities & Social</option>
      <option >Languages Department</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Present (Biometric)</option>
      <option >On Approved Leave</option>
      <option >Late Arrival</option>
      <option >Half-Day</option>
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
        <th>Emp ID</th>
        <th>Faculty Full Name</th>
        <th>Department</th>
        <th>Designation</th>
        <th>Punch In Time</th>
        <th>Punch Out Time</th>
        <th>Daily Status</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-FAC-001</td>
        <td>
          <div class="fw-semibold text-dark">Dr. K. L. Sharma</div>
          <small class="text-muted font-size-11">PGT Physics</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Science Department</span></td>
        <td><small class="text-dark">PGT Senior Teacher</small></td>
        <td><small class="text-muted font-mono font-size-12">07:14 AM (Bio Terminal 1)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Dispersal</span></td>
        <td><small class="text-muted">Present & On Duty</small></td>
        <td><span class="badge-status badge-active">Present</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-FAC-002</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Sunita Kaul</div>
          <small class="text-muted font-size-11">PGT Maths</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mathematics</span></td>
        <td><small class="text-dark">PGT Senior Teacher</small></td>
        <td><small class="text-muted font-mono font-size-12">07:18 AM (Bio Terminal 1)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Dispersal</span></td>
        <td><small class="text-muted">Present & On Duty</small></td>
        <td><span class="badge-status badge-active">Present</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-FAC-003</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Vikram Rathore</div>
          <small class="text-muted font-size-11">PGT Chemistry</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Science Department</span></td>
        <td><small class="text-dark">PGT Teacher</small></td>
        <td><small class="text-muted font-mono font-size-12">07:12 AM (Bio Terminal 2)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Dispersal</span></td>
        <td><small class="text-muted">Present & On Duty</small></td>
        <td><span class="badge-status badge-active">Present</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-FAC-004</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Radhika Iyer</div>
          <small class="text-muted font-size-11">PGT Biology</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Science Department</span></td>
        <td><small class="text-dark">PGT Teacher</small></td>
        <td><small class="text-muted font-mono font-size-12">07:20 AM (Bio Terminal 2)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Dispersal</span></td>
        <td><small class="text-muted">Present & On Duty</small></td>
        <td><span class="badge-status badge-active">Present</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-FAC-005</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Deepak Rawat</div>
          <small class="text-muted font-size-11">PGT English</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Languages Department</span></td>
        <td><small class="text-dark">PGT Teacher</small></td>
        <td><small class="text-muted font-mono font-size-12">07:15 AM (Bio Terminal 1)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Dispersal</span></td>
        <td><small class="text-muted">Present & On Duty</small></td>
        <td><span class="badge-status badge-active">Present</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-FAC-006</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Shalini Verma</div>
          <small class="text-muted font-size-11">TGT Social</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Social Science</span></td>
        <td><small class="text-dark">TGT Teacher</small></td>
        <td><small class="text-muted font-mono font-size-12">07:22 AM (Bio Terminal 1)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Dispersal</span></td>
        <td><small class="text-muted">Present & On Duty</small></td>
        <td><span class="badge-status badge-active">Present</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-FAC-007</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Meenakshi Soni</div>
          <small class="text-muted font-size-11">TGT Hindi</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Languages Department</span></td>
        <td><small class="text-dark">TGT Teacher</small></td>
        <td><small class="text-muted font-mono font-size-12">No Punch Recorded</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">--</span></td>
        <td><small class="text-muted">Casual Leave (Covered)</small></td>
        <td><span class="badge-status badge-pending">Casual Leave</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-FAC-008</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Kunal Bansal</div>
          <small class="text-muted font-size-11">PGT CS</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Computer Science</span></td>
        <td><small class="text-dark">PGT Teacher</small></td>
        <td><small class="text-muted font-mono font-size-12">No Punch Recorded</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">--</span></td>
        <td><small class="text-muted">Medical Leave (Covered)</small></td>
        <td><span class="badge-status badge-pending">Medical Leave</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
