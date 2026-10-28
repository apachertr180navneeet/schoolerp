<?php
/**
 * EDUSYS PRO - ASSIGNMENTS
 * Dedicated operational interface & records management for Assignments
 */
$page_title = "Assignments";
$page_desc = "Formal academic term tasks, grading rubrics, plagiarism detection, and student grade book feeds";
$active_module = "academics";
$active_submodule = "assignments.php";
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
    <h1><i class="bi bi-clipboard2-check-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'assignments_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Create Assignment
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Total Assignments</h6>
        <div class="kpi-value">18 Graded Tasks</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Term 2 Evaluations</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-journal-code"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Graded Submissions</h6>
        <div class="kpi-value">842 Evaluated</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Rubric Points Assigned</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-all"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Average Score</h6>
        <div class="kpi-value">84.8%</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> High Scholastic Mastery</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-bar-chart-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Pending Evaluation</h6>
        <div class="kpi-value">28 Submissions</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Teacher Review Queue</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-hourglass-split"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search assignment, subject, class, rubric...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Subjects</option>
      <option >Mathematics (041)</option>
      <option >Physics (042)</option>
      <option >Chemistry (043)</option>
      <option >Biology (044)</option>
      <option >Social Science (087)</option>
      <option >English Core (301)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Graded & Published</option>
      <option >Submission Open</option>
      <option >Evaluation in Progress</option>
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
        <th>Assign ID</th>
        <th>Assignment Title</th>
        <th>Subject & Class</th>
        <th>Due Date</th>
        <th>Max Marks</th>
        <th>Evaluation Rubric</th>
        <th>Graded Count</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ASN-2024-041</td>
        <td>
          <div class="fw-semibold text-dark">Case-Based Trigonometry Heights & Distances</div>
          <small class="text-muted font-size-11">Real-world tower & shadow models</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mathematics - Class 10</span></td>
        <td><small class="text-dark">05 Nov 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">20 Marks</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Method (10) + Acc (5) + Pres (5)</span></td>
        <td><small class="text-muted">76 of 78 Graded</small></td>
        <td><span class="badge-status badge-active">Graded</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Assignments')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ASN-2024-042</td>
        <td>
          <div class="fw-semibold text-dark">Investigatory Project: Electromagnetic Waves</div>
          <small class="text-muted font-size-11">Frequency band research report</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Physics - Class 12</span></td>
        <td><small class="text-dark">10 Nov 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">25 Marks</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Theory (10) + Data (10) + Viva (5)</span></td>
        <td><small class="text-muted">68 of 70 Graded</small></td>
        <td><span class="badge-status badge-active">Graded</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Assignments')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ASN-2024-043</td>
        <td>
          <div class="fw-semibold text-dark">Coordination Compounds Synthesis Review</div>
          <small class="text-muted font-size-11">Article on cis-platin in cancer</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Chemistry - Class 12</span></td>
        <td><small class="text-dark">08 Nov 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">20 Marks</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Literature (10) + Analysis (10)</span></td>
        <td><small class="text-muted">65 of 67 Graded</small></td>
        <td><span class="badge-status badge-active">Graded</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Assignments')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ASN-2024-044</td>
        <td>
          <div class="fw-semibold text-dark">Comparative Essay: Eco-Tourism vs Industry</div>
          <small class="text-muted font-size-11">Environmental ethics analytical essay</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">English - Class 12</span></td>
        <td><small class="text-dark">02 Nov 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">15 Marks</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Grammar (5) + Content (5) + Coh (5)</span></td>
        <td><small class="text-muted">140 of 143 Graded</small></td>
        <td><span class="badge-status badge-active">Graded</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Assignments')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ASN-2024-045</td>
        <td>
          <div class="fw-semibold text-dark">Financial Statement Analysis of Zomato Ltd</div>
          <small class="text-muted font-size-11">Ratio analysis & cash flow audit</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Accountancy - Class 12</span></td>
        <td><small class="text-dark">12 Nov 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">20 Marks</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Formulas (10) + Interp (10)</span></td>
        <td><small class="text-muted">34 of 36 Graded</small></td>
        <td><span class="badge-status badge-active">Graded</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Assignments')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ASN-2024-046</td>
        <td>
          <div class="fw-semibold text-dark">Python GUI Mini Project: School Attendance</div>
          <small class="text-muted font-size-11">Tkinter and SQLite connectivity</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Computer Science - Class 12</span></td>
        <td><small class="text-dark">15 Nov 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">30 Marks</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Code (15) + UI (10) + Doc (5)</span></td>
        <td><small class="text-muted">35 of 35 Graded</small></td>
        <td><span class="badge-status badge-active">Graded</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Assignments')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ASN-2024-047</td>
        <td>
          <div class="fw-semibold text-dark">Genetics Pedigree Chart Analysis</div>
          <small class="text-muted font-size-11">Autosomal dominant vs recessive tracking</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Biology - Class 12</span></td>
        <td><small class="text-dark">04 Nov 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">20 Marks</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Chart (10) + Solutions (10)</span></td>
        <td><small class="text-muted">30 of 32 Graded</small></td>
        <td><span class="badge-status badge-active">Graded</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Assignments')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ASN-2024-048</td>
        <td>
          <div class="fw-semibold text-dark">Sustainable Development Goals (SDG) Report</div>
          <small class="text-muted font-size-11">Clean Energy & Climate Action in Delhi</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Social Science - Class 10</span></td>
        <td><small class="text-dark">06 Nov 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">20 Marks</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Research (10) + Presentation (10)</span></td>
        <td><small class="text-muted">75 of 78 Graded</small></td>
        <td><span class="badge-status badge-active">Graded</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Assignments')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
