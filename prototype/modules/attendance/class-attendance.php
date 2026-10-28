<?php
/**
 * EDUSYS PRO - CLASS-WISE ATTENDANCE
 * Dedicated operational interface & records management for Class-wise Attendance
 */
$page_title = "Class-wise Attendance";
$page_desc = "Section-level summary matrix, teacher homeroom sign-offs, and daily percentage scorecards";
$active_module = "attendance";
$active_submodule = "class-attendance.php";
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
    <h1><i class="bi bi-grid-3x3-gap-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'class-attendance_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-check2-circle me-1"></i> Submit Section Attendance
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Sections Marked</h6>
        <div class="kpi-value">72 of 72 Done</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Homerooms Filed</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-all"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Highest Section</h6>
        <div class="kpi-value">Class 10-A (100%)</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> All 40 Students Present</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-trophy-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Average Class Attendance</h6>
        <div class="kpi-value">96.2%</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Above 95% Target</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-speedometer2"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Lowest Section</h6>
        <div class="kpi-value">Class 11-PCM (91.4%)</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> 3 Absent on Sick Leave</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-exclamation-circle-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search class, section, teacher, attendance %...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Wings</option>
      <option >Secondary Wing (Classes 9-10)</option>
      <option >Senior Secondary (Classes 11-12)</option>
      <option >Middle Wing (Classes 6-8)</option>
      <option >Primary Wing (Classes 1-5)</option>
      <option >Pre-Primary (Nursery-Prep)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Submitted on Time</option>
      <option >Pending Submission</option>
      <option >Delayed Roster</option>
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
        <th>Class & Section</th>
        <th>Class Teacher</th>
        <th>Total Strength</th>
        <th>Present Today</th>
        <th>Absent Count</th>
        <th>On Leave</th>
        <th>Attendance %</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Class 10 - Section A</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Sunita Kaul (PGT)</div>
          <small class="text-muted font-size-11">Room 204</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">40 Students</span></td>
        <td><small class="text-dark">40 Present</small></td>
        <td><small class="text-muted font-mono font-size-12">0 Absent</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">0 on Leave</span></td>
        <td><small class="text-muted">100.0% (Perfect)</small></td>
        <td><span class="badge-status badge-active">Submitted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class-wise Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Class 10 - Section B</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Vikram Rathore (PGT)</div>
          <small class="text-muted font-size-11">Room 205</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">38 Students</span></td>
        <td><small class="text-dark">37 Present</small></td>
        <td><small class="text-muted font-mono font-size-12">1 Absent</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">0 on Leave</span></td>
        <td><small class="text-muted">97.4%</small></td>
        <td><span class="badge-status badge-active">Submitted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class-wise Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Class 12 - Science (PCM)</td>
        <td>
          <div class="fw-semibold text-dark">Dr. K. L. Sharma (PGT)</div>
          <small class="text-muted font-size-11">Room 301</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">35 Students</span></td>
        <td><small class="text-dark">32 Present</small></td>
        <td><small class="text-muted font-mono font-size-12">2 Absent</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">1 on Leave</span></td>
        <td><small class="text-muted">91.4%</small></td>
        <td><span class="badge-status badge-active">Submitted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class-wise Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Class 12 - Science (PCB)</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Radhika Iyer (PGT)</div>
          <small class="text-muted font-size-11">Room 302</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">32 Students</span></td>
        <td><small class="text-dark">31 Present</small></td>
        <td><small class="text-muted font-mono font-size-12">0 Absent</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">1 on Leave</span></td>
        <td><small class="text-muted">96.9%</small></td>
        <td><span class="badge-status badge-active">Submitted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class-wise Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Class 12 - Commerce</td>
        <td>
          <div class="fw-semibold text-dark">Mr. M. K. Chawla (PGT)</div>
          <small class="text-muted font-size-11">Room 304</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">36 Students</span></td>
        <td><small class="text-dark">35 Present</small></td>
        <td><small class="text-muted font-mono font-size-12">1 Absent</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">0 on Leave</span></td>
        <td><small class="text-muted">97.2%</small></td>
        <td><span class="badge-status badge-active">Submitted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class-wise Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Class 8 - Section C</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Deepak Rawat (PGT)</div>
          <small class="text-muted font-size-11">Room 108</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">39 Students</span></td>
        <td><small class="text-dark">38 Present</small></td>
        <td><small class="text-muted font-mono font-size-12">1 Absent</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">0 on Leave</span></td>
        <td><small class="text-muted">97.4%</small></td>
        <td><span class="badge-status badge-active">Submitted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class-wise Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Class 5 - Section A</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Shalini Verma (PRT)</div>
          <small class="text-muted font-size-11">Room 012</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">40 Students</span></td>
        <td><small class="text-dark">39 Present</small></td>
        <td><small class="text-muted font-mono font-size-12">0 Absent</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">1 on Leave</span></td>
        <td><small class="text-muted">97.5%</small></td>
        <td><span class="badge-status badge-active">Submitted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class-wise Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Class 1 - Nursery A</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Pooja Hegde (PRT)</div>
          <small class="text-muted font-size-11">KG Suite 1</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">28 Students</span></td>
        <td><small class="text-dark">27 Present</small></td>
        <td><small class="text-muted font-mono font-size-12">1 Absent</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">0 on Leave</span></td>
        <td><small class="text-muted">96.4%</small></td>
        <td><span class="badge-status badge-active">Submitted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class-wise Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
