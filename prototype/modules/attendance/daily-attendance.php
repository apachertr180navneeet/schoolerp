<?php
/**
 * EDUSYS PRO - STUDENT DAILY ATTENDANCE
 * Dedicated operational interface & records management for Student Daily Attendance
 */
$page_title = "Student Daily Attendance";
$page_desc = "Section-wise daily homeroom attendance roll, biometric gate tap reconciliation, and SMS alert dispatch";
$active_module = "attendance";
$active_submodule = "daily-attendance.php";
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
    <h1><i class="bi bi-calendar-check text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'daily-attendance_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-check2-all me-1"></i> Mark Attendance Grid
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Present Today</h6>
        <div class="kpi-value">2,732 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 96.2% Attendance Rate</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Absent Today</h6>
        <div class="kpi-value">108 Absent</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 100% Parent SMS Sent</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-x-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Late Arrivals</h6>
        <div class="kpi-value">24 Scholars</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Gate Tap After 07:45 AM</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-stopwatch-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>On Approved Leave</h6>
        <div class="kpi-value">14 Scholars</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Medical & Casual Leaves</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-envelope-paper-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search student, admission #, roll #, class, status...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Sections</option>
      <option >Class 10 - Section A</option>
      <option >Class 10 - Section B</option>
      <option >Class 12 - Science (PCM)</option>
      <option >Class 12 - Science (PCB)</option>
      <option >Class 8 - Section C</option>
      <option >Class 5 - Section A</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Present (P)</option>
      <option >Absent (A)</option>
      <option >Late Entry (L)</option>
      <option >Half-Day (HD)</option>
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
        <th>Roll #</th>
        <th>Attendance Status</th>
        <th>Time In (RFID Tap)</th>
        <th>Time Out</th>
        <th>Parent SMS Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-001</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Agni House</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">Roll #01</small></td>
        <td><small class="text-muted font-mono font-size-12">07:32 AM (Gate 1)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Dispersal</span></td>
        <td><small class="text-muted">Delivered (P)</small></td>
        <td><span class="badge-status badge-active">Present</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Daily Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-002</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Prithvi House</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">Roll #02</small></td>
        <td><small class="text-muted font-mono font-size-12">07:34 AM (Gate 1)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Dispersal</span></td>
        <td><small class="text-muted">Delivered (P)</small></td>
        <td><span class="badge-status badge-active">Present</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Daily Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-003</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Akash House</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">Roll #01</small></td>
        <td><small class="text-muted font-mono font-size-12">07:38 AM (Gate 2)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Dispersal</span></td>
        <td><small class="text-muted">Delivered (P)</small></td>
        <td><span class="badge-status badge-active">Present</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Daily Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-004</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Vayu House</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">Roll #02</small></td>
        <td><small class="text-muted font-mono font-size-12">07:40 AM (Gate 2)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Dispersal</span></td>
        <td><small class="text-muted">Delivered (P)</small></td>
        <td><span class="badge-status badge-active">Present</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Daily Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-005</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Agni House</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-dark">Roll #05</small></td>
        <td><small class="text-muted font-mono font-size-12">07:28 AM (Gate 1)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Dispersal</span></td>
        <td><small class="text-muted">Delivered (P)</small></td>
        <td><span class="badge-status badge-active">Present</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Daily Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-006</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Vayu House</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCB)</span></td>
        <td><small class="text-dark">Roll #08</small></td>
        <td><small class="text-muted font-mono font-size-12">07:52 AM (Gate 1 - Late)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Dispersal</span></td>
        <td><small class="text-muted">Late SMS Sent</small></td>
        <td><span class="badge-status badge-pending">Late Entry</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Daily Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-007</td>
        <td>
          <div class="fw-semibold text-dark">Karan Saxena</div>
          <small class="text-muted font-size-11">Prithvi House</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Section C</span></td>
        <td><small class="text-dark">Roll #24</small></td>
        <td><small class="text-muted font-mono font-size-12">No Tap Recorded</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">--</span></td>
        <td><small class="text-muted">Absent Alert SMS Sent</small></td>
        <td><span class="badge-status badge-inactive">Absent</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Daily Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-008</td>
        <td>
          <div class="fw-semibold text-dark">Meera Nambiar</div>
          <small class="text-muted font-size-11">Akash House</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 8 - Section C</span></td>
        <td><small class="text-dark">Roll #14</small></td>
        <td><small class="text-muted font-mono font-size-12">07:30 AM (Gate 2)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Dispersal</span></td>
        <td><small class="text-muted">Delivered (P)</small></td>
        <td><span class="badge-status badge-active">Present</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Daily Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
