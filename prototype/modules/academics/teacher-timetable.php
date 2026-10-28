<?php
/**
 * EDUSYS PRO - TEACHER TIMETABLE
 * Dedicated operational interface & records management for Teacher Timetable
 */
$page_title = "Teacher Timetable";
$page_desc = "Individual faculty instructional schedules, duty room assignments, lab sessions, and free planning periods";
$active_module = "academics";
$active_submodule = "teacher-timetable.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/academics/dashboard.php'); ?>">Academic Management</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-person-lines-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'teacher-timetable_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-printer-fill me-1"></i> Print Faculty Schedule
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Selected Faculty</h6>
        <div class="kpi-value">Dr. K. L. Sharma</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> PGT Senior Physics</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-badge"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Total Workload</h6>
        <div class="kpi-value">30 Periods / Wk</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Optimal 5 Periods / Day</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-speedometer2"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Lab Practical Slots</h6>
        <div class="kpi-value">6 Blocks (12 Hours)</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Physics Lab 1 & 2</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-tools"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Free Planning Periods</h6>
        <div class="kpi-value">18 Periods / Wk</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Lesson Prep & Grading</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-journal-check"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search teacher name, day, period, class room...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Teachers</option>
      <option >Dr. K. L. Sharma (Physics)</option>
      <option >Mrs. Sunita Kaul (Maths)</option>
      <option >Mr. Vikram Rathore (Chemistry)</option>
      <option >Mrs. Radhika Iyer (Biology)</option>
      <option >Mr. Deepak Rawat (English)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Instructional Period</option>
      <option >Laboratory Block</option>
      <option >Free Planning Period</option>
      <option >Examination Duty</option>
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
        <th>Schedule ID</th>
        <th>Faculty Name</th>
        <th>Day & Period Slot</th>
        <th>Class & Section Allotted</th>
        <th>Room / Laboratory</th>
        <th>Curriculum Topic</th>
        <th>Period Type</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FAC-TT-01</td>
        <td>
          <div class="fw-semibold text-dark">Dr. K. L. Sharma</div>
          <small class="text-muted font-size-11">PGT Physics</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Monday - Period 1 (07:45 AM)</span></td>
        <td><small class="text-dark">Class 12 - Science (PCM)</small></td>
        <td><small class="text-muted font-mono font-size-12">Room #301 (Science Block)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Unit 3: Magnetic Effects of Current</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Instructional</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Timetable')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FAC-TT-02</td>
        <td>
          <div class="fw-semibold text-dark">Dr. K. L. Sharma</div>
          <small class="text-muted font-size-11">PGT Physics</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Monday - Period 2 (08:30 AM)</span></td>
        <td><small class="text-dark">Class 12 - Science (PCB)</small></td>
        <td><small class="text-muted font-mono font-size-12">Room #302 (Bio Block)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Unit 3: Electromagnetic Induction</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Instructional</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Timetable')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FAC-TT-03</td>
        <td>
          <div class="fw-semibold text-dark">Dr. K. L. Sharma</div>
          <small class="text-muted font-size-11">PGT Physics</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Monday - Periods 3 & 4 (09:30 AM)</span></td>
        <td><small class="text-dark">Class 10 - Section A (Lab)</small></td>
        <td><small class="text-muted font-mono font-size-12">Physics Lab 1 (Block B)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Refraction through Glass Prism</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Laboratory Block</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Timetable')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FAC-TT-04</td>
        <td>
          <div class="fw-semibold text-dark">Dr. K. L. Sharma</div>
          <small class="text-muted font-size-11">PGT Physics</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Monday - Period 5 (11:35 AM)</span></td>
        <td><small class="text-dark">Staff Planning Room</small></td>
        <td><small class="text-muted font-mono font-size-12">Department Room #305</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Lesson Planning & Student Doubt Desk</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-pending">Free Planning</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Timetable')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FAC-TT-05</td>
        <td>
          <div class="fw-semibold text-dark">Dr. K. L. Sharma</div>
          <small class="text-muted font-size-11">PGT Physics</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Monday - Period 6 (12:15 PM)</span></td>
        <td><small class="text-dark">Class 11 - Science (PCM)</small></td>
        <td><small class="text-muted font-mono font-size-12">Room #303 (Science Block)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Work, Energy & Power Derivations</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Instructional</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Timetable')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FAC-TT-06</td>
        <td>
          <div class="fw-semibold text-dark">Dr. K. L. Sharma</div>
          <small class="text-muted font-size-11">PGT Physics</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Monday - Period 7 (12:55 PM)</span></td>
        <td><small class="text-dark">Staff Planning Room</small></td>
        <td><small class="text-muted font-mono font-size-12">Department Room #305</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">CBSE Practical Logbook Evaluation</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-pending">Free Planning</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Timetable')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FAC-TT-07</td>
        <td>
          <div class="fw-semibold text-dark">Dr. K. L. Sharma</div>
          <small class="text-muted font-size-11">PGT Physics</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Tuesday - Periods 1 & 2 (07:45 AM)</span></td>
        <td><small class="text-dark">Class 12 - Science (PCM Lab)</small></td>
        <td><small class="text-muted font-mono font-size-12">Physics Lab 1 (Block B)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Potentiometer Internal Resistance Exp</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Laboratory Block</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Timetable')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FAC-TT-08</td>
        <td>
          <div class="fw-semibold text-dark">Dr. K. L. Sharma</div>
          <small class="text-muted font-size-11">PGT Physics</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Tuesday - Period 3 (09:30 AM)</span></td>
        <td><small class="text-dark">Class 11 - Science (PCB)</small></td>
        <td><small class="text-muted font-mono font-size-12">Room #303 (Science Block)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Gravitation & Kepler's Laws</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Instructional</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Timetable')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
