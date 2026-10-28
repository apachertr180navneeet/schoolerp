<?php
/**
 * EDUSYS PRO - STUDENT HISTORY
 * Dedicated operational interface & records management for Student History
 */
$page_title = "Student History";
$page_desc = "Complete chronological lifecycle log: Admission milestones, grade progression, house awards, and disciplinary history";
$active_module = "students";
$active_submodule = "student-history.php";
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
    <h1><i class="bi bi-clock-history text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'student-history_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-circle me-1"></i> Record Timeline Event
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Milestones Tracked</h6>
        <div class="kpi-value">18,420 Events</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Comprehensive Student Journey</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar2-range-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Merit & Honors</h6>
        <div class="kpi-value">1,240 Awards</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Academic, Sports & Cultural</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-trophy-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>House Points Mapped</h6>
        <div class="kpi-value">4 Houses Active</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Agni, Prithvi, Vayu, Akash</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-flag-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Audit Trail Integrity</h6>
        <div class="kpi-value">100% Immutable</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Non-editable System Ledger</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-lock-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search event ID, student, event category, class...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Event Categories</option>
      <option >Academic Milestone (Admissions/Promotion)</option>
      <option >Merit Award & Olympiad Victory</option>
      <option >Co-Curricular / Sports Achievement</option>
      <option >House Leadership & Appointment</option>
      <option >Infirmary & Health Incident</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Verified Milestone</option>
      <option >Document Attached</option>
      <option >Archived</option>
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
        <th>Event UID</th>
        <th>Student Full Name</th>
        <th>Event Category</th>
        <th>Class / Year</th>
        <th>Milestone / Event Details</th>
        <th>Recorded By</th>
        <th>Event Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-9481</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Adm #001</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Academic Promotion</span></td>
        <td><small class="text-dark">Class 10 (2024-25)</small></td>
        <td><small class="text-muted font-mono font-size-12">Promoted to Class 10 with 94.6% Aggregate Score</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mrs. Sunita Kaul (Class Teacher)</span></td>
        <td><small class="text-muted">01 Jul 2024</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student History')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-9480</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Adm #002</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Co-Curricular Honor</span></td>
        <td><small class="text-dark">Class 10 (2024-25)</small></td>
        <td><small class="text-muted font-mono font-size-12">Won 1st Prize in Inter-School Debate Championship</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Cultural Head</span></td>
        <td><small class="text-muted">18 Aug 2024</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student History')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-9479</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Adm #003</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Sports Achievement</span></td>
        <td><small class="text-dark">Class 10 (2024-25)</small></td>
        <td><small class="text-muted font-mono font-size-12">Selected for CBSE National Athletics Meet (400m)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Physical Education HOD</span></td>
        <td><small class="text-muted">05 Sep 2024</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student History')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-9478</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Adm #004</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">House Appointment</span></td>
        <td><small class="text-dark">Class 10 (2024-25)</small></td>
        <td><small class="text-muted font-mono font-size-12">Appointed as Junior House Captain (Vayu House)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Principal Office</span></td>
        <td><small class="text-muted">15 Jul 2024</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student History')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-9477</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Adm #005</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Olympiad Honor</span></td>
        <td><small class="text-dark">Class 12 (2024-25)</small></td>
        <td><small class="text-muted font-mono font-size-12">National Top 1% in National Standard Exam in Physics</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Science Department</span></td>
        <td><small class="text-muted">12 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student History')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-9476</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Adm #006</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Sports Leadership</span></td>
        <td><small class="text-dark">Class 12 (2024-25)</small></td>
        <td><small class="text-muted font-mono font-size-12">Captained School Football Team to Zonal Victory</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Sports Department</span></td>
        <td><small class="text-muted">20 Sep 2024</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student History')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-9475</td>
        <td>
          <div class="fw-semibold text-dark">Meera Nambiar</div>
          <small class="text-muted font-size-11">Adm #007</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Fresh Admission</span></td>
        <td><small class="text-dark">Class 8 (2024-25)</small></td>
        <td><small class="text-muted font-mono font-size-12">Enrolled in Class 8 from The Shri Ram School</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Registrar Office</span></td>
        <td><small class="text-muted">24 Apr 2024</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student History')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-9474</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Malhotra</div>
          <small class="text-muted font-size-11">Adm #008</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Art & Creativity</span></td>
        <td><small class="text-dark">Class 5 (2024-25)</small></td>
        <td><small class="text-muted font-mono font-size-12">Artwork selected for Annual CBSE Heritage Calendar</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Fine Arts HOD</span></td>
        <td><small class="text-muted">14 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student History')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
