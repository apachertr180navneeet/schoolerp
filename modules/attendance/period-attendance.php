<?php
/**
 * EDUSYS PRO - PERIOD-WISE ATTENDANCE
 * Dedicated operational interface & records management for Period-wise Attendance
 */
$page_title = "Period-wise Attendance";
$page_desc = "Classroom subject period presence checks, bunking detection, and laboratory headcount logs";
$active_module = "attendance";
$active_submodule = "period-attendance.php";
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
    <h1><i class="bi bi-clock-history text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'period-attendance_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Log Period Roster
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Periods Tracked</h6>
        <div class="kpi-value">576 Periods</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 8 Periods / 72 Sections</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-stopwatch"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Bunking Detected</h6>
        <div class="kpi-value">0 Discrepancies</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 100% Class Compliance</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Lab Headcounts</h6>
        <div class="kpi-value">100% Reconciled</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Physics & Chemistry Labs</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-tools"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Teacher Submissions</h6>
        <div class="kpi-value">560 of 576 Logged</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Live App Roll Entry</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-circle"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search period, class, subject, teacher, status...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Periods</option>
      <option >Period 1 (07:45 - 08:30)</option>
      <option >Period 2 (08:30 - 09:15)</option>
      <option >Period 3 (09:30 - 10:15)</option>
      <option >Period 4 (10:15 - 11:00)</option>
      <option >Period 5 to 8 (Afternoon)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Headcount Verified</option>
      <option >Class Bunk Alert</option>
      <option >Teacher Leave Covered</option>
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
        <th>Period # & Slot</th>
        <th>Grade & Section</th>
        <th>Subject</th>
        <th>Teaching Faculty</th>
        <th>Expected Count</th>
        <th>Present in Class</th>
        <th>Bunk / Absent Alert</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Period 1 (07:45 AM)</td>
        <td>
          <div class="fw-semibold text-dark">Class 10 - Section A</div>
          <small class="text-muted font-size-11">Room 204</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mathematics (041)</span></td>
        <td><small class="text-dark">Mrs. Sunita Kaul (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">40 Students</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">40 Present</span></td>
        <td><small class="text-muted">Zero Discrepancy</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Period-wise Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Period 1 (07:45 AM)</td>
        <td>
          <div class="fw-semibold text-dark">Class 12 - Science (PCM)</div>
          <small class="text-muted font-size-11">Room 301</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Physics (042)</span></td>
        <td><small class="text-dark">Dr. K. L. Sharma (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">32 Students</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">32 Present</span></td>
        <td><small class="text-muted">Zero Discrepancy</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Period-wise Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Period 2 (08:30 AM)</td>
        <td>
          <div class="fw-semibold text-dark">Class 10 - Section A</div>
          <small class="text-muted font-size-11">Room 204</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">English (184)</span></td>
        <td><small class="text-dark">Mr. Deepak Rawat (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">40 Students</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">40 Present</span></td>
        <td><small class="text-muted">Zero Discrepancy</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Period-wise Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Period 2 (08:30 AM)</td>
        <td>
          <div class="fw-semibold text-dark">Class 12 - Science (PCB)</div>
          <small class="text-muted font-size-11">Room 302</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Physics (042)</span></td>
        <td><small class="text-dark">Dr. K. L. Sharma (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">31 Students</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">31 Present</span></td>
        <td><small class="text-muted">Zero Discrepancy</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Period-wise Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Period 3 (09:30 AM)</td>
        <td>
          <div class="fw-semibold text-dark">Class 10 - Section A</div>
          <small class="text-muted font-size-11">Physics Lab 1</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Physics Lab Practical</span></td>
        <td><small class="text-dark">Dr. K. L. Sharma (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">40 Students</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">40 Present</span></td>
        <td><small class="text-muted">Lab Roll Verified</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Period-wise Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Period 4 (10:15 AM)</td>
        <td>
          <div class="fw-semibold text-dark">Class 12 - Science (PCM)</div>
          <small class="text-muted font-size-11">Chemistry Lab</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Chemistry Lab Practical</span></td>
        <td><small class="text-dark">Mr. Vikram Rathore (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">32 Students</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">32 Present</span></td>
        <td><small class="text-muted">Lab Roll Verified</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Period-wise Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Period 5 (11:35 AM)</td>
        <td>
          <div class="fw-semibold text-dark">Class 10 - Section A</div>
          <small class="text-muted font-size-11">Room 204</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Social Science (087)</span></td>
        <td><small class="text-dark">Mrs. Shalini Verma (TGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">40 Students</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">40 Present</span></td>
        <td><small class="text-muted">Zero Discrepancy</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Period-wise Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Period 6 (12:15 PM)</td>
        <td>
          <div class="fw-semibold text-dark">Class 12 - Commerce</div>
          <small class="text-muted font-size-11">Room 304</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Accountancy (055)</span></td>
        <td><small class="text-dark">Mr. M. K. Chawla (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">35 Students</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">35 Present</span></td>
        <td><small class="text-muted">Zero Discrepancy</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Period-wise Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
