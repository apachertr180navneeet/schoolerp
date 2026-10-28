<?php
/**
 * EDUSYS PRO - SESSION CALENDAR
 * Dedicated operational interface & records management for Session Calendar
 */
$page_title = "Session Calendar";
$page_desc = "Annual term breakdown, exam windows, instructional periods, and compliance milestones for 2024-2025";
$active_module = "administration";
$active_submodule = "session-calendar.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'session-calendar_export.csv')" title="Export Table as CSV">
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
        <h6>Instructional Days</h6>
        <div class="kpi-value">224 Working Days</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Exceeds CBSE Minimum (220)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar3-week-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Academic Terms</h6>
        <div class="kpi-value">2 Terms</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Term 1 (Apr-Sep) & Term 2 (Oct-Mar)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-diagram-2-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Exam Windows</h6>
        <div class="kpi-value">4 Windows</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> PT-1, Mid-Term, PT-2, Pre-Board</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-pencil-square"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Working Saturdays</h6>
        <div class="kpi-value">12 Days</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> 1st & 3rd Saturdays for Cl 9-12</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-clock-history"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search milestone, term, event title...">
    </div>
    <select class="form-select" style="max-width: 240px;">
      <option selected>All Milestones</option>
      <option >Term 1: Foundational (Apr - Sep)</option>
      <option >Term 2: Board & Annual (Oct - Mar)</option>
      <option >Examination Windows</option>
      <option >Institutional Holidays & Vacations</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Completed Milestone</option>
      <option >Active / Upcoming</option>
      <option >Scheduled</option>
      <option >Board Tentative</option>
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
        <th>Milestone ID</th>
        <th>Academic Milestone Title</th>
        <th>Academic Term</th>
        <th>Applicable Wings</th>
        <th>Key Deliverables</th>
        <th>Duration / Span</th>
        <th>Start Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CAL-2024-01</td>
        <td>
          <div class="fw-semibold text-dark">Academic Session 2024-25 Commencement</div>
          <small class="text-muted font-size-11">Orientation Assembly & Textbook Distribution</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Term 1</span></td>
        <td><small class="text-dark">All Grades (Nursery to 12)</small></td>
        <td><small class="text-muted font-mono font-size-12">Timetable Rollout, House Allocation</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Day 1 Opening</span></td>
        <td><small class="text-muted">01 Apr 2024</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Session Calendar')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CAL-2024-02</td>
        <td>
          <div class="fw-semibold text-dark">Periodic Test 1 (PT-1) Assessment Window</div>
          <small class="text-muted font-size-11">Formative Unit Evaluations (25 Marks)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Term 1</span></td>
        <td><small class="text-dark">Classes 1 to 12</small></td>
        <td><small class="text-muted font-mono font-size-12">Question Papers, Answer Sheet Audit</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">7 Working Days</span></td>
        <td><small class="text-muted">15 Jul 2024</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Session Calendar')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CAL-2024-03</td>
        <td>
          <div class="fw-semibold text-dark">Mid-Term / Half-Yearly Examinations</div>
          <small class="text-muted font-size-11">Summative Board Pattern Exams (80 Marks)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Term 1</span></td>
        <td><small class="text-dark">Classes 6 to 12</small></td>
        <td><small class="text-muted font-mono font-size-12">Centralized Seating, Board Pattern Papers</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">12 Working Days</span></td>
        <td><small class="text-muted">16 Sep 2024</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Session Calendar')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CAL-2024-04</td>
        <td>
          <div class="fw-semibold text-dark">Term 1 PTM & Comprehensive Report Card</div>
          <small class="text-muted font-size-11">Parent Consultation & Evaluation Sheets</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Term 1</span></td>
        <td><small class="text-dark">All Grades (Nursery to 12)</small></td>
        <td><small class="text-muted font-mono font-size-12">Offline Report Cards & Teacher Feedback</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">1 Full Day</span></td>
        <td><small class="text-muted">05 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Session Calendar')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CAL-2024-05</td>
        <td>
          <div class="fw-semibold text-dark">Term 2 Instructional Cycle Commencement</div>
          <small class="text-muted font-size-11">Post-Autumn Syllabus Acceleration</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Term 2</span></td>
        <td><small class="text-dark">All Grades (Nursery to 12)</small></td>
        <td><small class="text-muted font-mono font-size-12">Practical Lab Projects, Science Fair</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Instructional Block</span></td>
        <td><small class="text-muted">07 Oct 2024</small></td>
        <td><span class="badge-status badge-active">In Progress</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Session Calendar')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CAL-2024-06</td>
        <td>
          <div class="fw-semibold text-dark">Periodic Test 2 (PT-2) Assessment Window</div>
          <small class="text-muted font-size-11">Cumulative Pre-Final Formative Exam</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Term 2</span></td>
        <td><small class="text-dark">Classes 1 to 9 & 11</small></td>
        <td><small class="text-muted font-mono font-size-12">Syllabus 80% Coverage</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">7 Working Days</span></td>
        <td><small class="text-muted">02 Dec 2024</small></td>
        <td><span class="badge-status badge-pending">Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Session Calendar')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CAL-2024-07</td>
        <td>
          <div class="fw-semibold text-dark">Pre-Board Examination 1 (Classes 10 & 12)</div>
          <small class="text-muted font-size-11">Full CBSE Board Pattern Mock Examination</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Term 2</span></td>
        <td><small class="text-dark">Senior Secondary (10 & 12)</small></td>
        <td><small class="text-muted font-mono font-size-12">Sample Paper Roster, Flying Squad</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">12 Working Days</span></td>
        <td><small class="text-muted">06 Jan 2025</small></td>
        <td><span class="badge-status badge-pending">Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Session Calendar')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CAL-2024-08</td>
        <td>
          <div class="fw-semibold text-dark">CBSE Annual Board Exams Commencement</div>
          <small class="text-muted font-size-11">Class 10 & 12 Official CBSE Board Exams</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Term 2</span></td>
        <td><small class="text-dark">Classes 10 & 12</small></td>
        <td><small class="text-muted font-mono font-size-12">Admit Cards, External Center Allocation</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">45 Calendar Days</span></td>
        <td><small class="text-muted">15 Feb 2025</small></td>
        <td><span class="badge-status badge-pending">Board Tentative</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Session Calendar')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
