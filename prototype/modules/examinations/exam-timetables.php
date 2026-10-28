<?php
/**
 * EDUSYS PRO - Exam Timetables
 */
$page_title = "Exam Timetables";
$page_desc = "Dedicated operational interface & records management for Exam Timetables";
$active_module = "examinations";
$active_submodule = "exam-timetables.php";
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
      <li class="breadcrumb-item"><?php echo htmlspecialchars($active_module); ?></li>
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
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'exam-timetables_export.csv')" title="Export Table as CSV">
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
        <h6>Upcoming Tests</h6>
        <div class="kpi-value">28 Papers</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Term 2 Mid-Term Cycle</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-journal-code"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Class Average</h6>
        <div class="kpi-value">78.4%</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> +3.2% vs Term 1</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-graph-up-arrow"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Moderated Papers</h6>
        <div class="kpi-value">100%</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> CBSE Norms Validated</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Marks Published</h6>
        <div class="kpi-value">2,840 / 2,840</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Report Cards Ready</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-award-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search exam code, subject, evaluator...">
    </div>
    <select class="form-select" style="max-width: 200px;">
      <option selected>All Assessments</option>
      <option >Periodic Test 1</option>
      <option >Half-Yearly Examination</option>
      <option >Periodic Test 2</option>
      <option >Pre-Board Mock 1</option>
      <option >CBSE Annual Board Exam</option>
    </select>
    <select class="form-select" style="max-width: 150px;">
      <option selected>All Status</option>
      <option>Active / Verified</option>
      <option>In Review</option>
      <option>Approved</option>
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
        <th>Exam / Test Code</th>
        <th>Subject & Paper Title</th>
        <th>Grade / Stream</th>
        <th>Date & Time</th>
        <th>Maximum Marks</th>
        <th>Average Score</th>
        <th>Evaluator Faculty</th>
        <th>Result Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EX-10-MAT-T2</td>
        <td>
          <div class="fw-semibold text-dark">Mathematics (Standard - 041)</div>
          <small class="text-muted font-size-11">Theory Paper</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 (A, B, C)</span></td>
        <td><small class="text-dark">24 Nov 2024 • 09:30 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">80 Marks</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">64.2 / 80 (80.2%)</span></td>
        <td><small class="text-muted">Mr. S. K. Rastogi</small></td>
        <td><span class="badge-status badge-active">Verified & Locked</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Exam Timetables')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EX-10-SCI-T2</td>
        <td>
          <div class="fw-semibold text-dark">Science (Theory - 086)</div>
          <small class="text-muted font-size-11">Theory Paper</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 (A, B, C)</span></td>
        <td><small class="text-dark">26 Nov 2024 • 09:30 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">80 Marks</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">61.8 / 80 (77.2%)</span></td>
        <td><small class="text-muted">Mr. Vikram Rathore</small></td>
        <td><span class="badge-status badge-active">Verified & Locked</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Exam Timetables')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EX-10-ENG-T2</td>
        <td>
          <div class="fw-semibold text-dark">English Lang & Literature (301)</div>
          <small class="text-muted font-size-11">ASL + Theory</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 (A, B, C)</span></td>
        <td><small class="text-dark">28 Nov 2024 • 09:30 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">80 Marks</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">68.5 / 80 (85.6%)</span></td>
        <td><small class="text-muted">Mrs. Priya Nambiar</small></td>
        <td><span class="badge-status badge-active">Verified & Locked</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Exam Timetables')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EX-12-PHY-T2</td>
        <td>
          <div class="fw-semibold text-dark">Physics (Theory - 042)</div>
          <small class="text-muted font-size-11">CBSE Mock 1</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 (Science)</span></td>
        <td><small class="text-dark">29 Nov 2024 • 09:30 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">70 Marks</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">52.4 / 70 (74.8%)</span></td>
        <td><small class="text-muted">Mr. Vikram Rathore</small></td>
        <td><span class="badge-status badge-pending">In Evaluation</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Exam Timetables')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EX-12-CHE-T2</td>
        <td>
          <div class="fw-semibold text-dark">Chemistry (Theory - 043)</div>
          <small class="text-muted font-size-11">CBSE Mock 1</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 (Science)</span></td>
        <td><small class="text-dark">02 Dec 2024 • 09:30 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">70 Marks</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">54.1 / 70 (77.2%)</span></td>
        <td><small class="text-muted">Dr. Anuj Jha</small></td>
        <td><span class="badge-status badge-pending">In Evaluation</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Exam Timetables')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EX-12-ACC-T2</td>
        <td>
          <div class="fw-semibold text-dark">Accountancy (055)</div>
          <small class="text-muted font-size-11">Theory + Project</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 (Commerce)</span></td>
        <td><small class="text-dark">02 Dec 2024 • 09:30 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">80 Marks</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">62.0 / 80 (77.5%)</span></td>
        <td><small class="text-muted">Mr. M. K. Aggarwal</small></td>
        <td><span class="badge-status badge-active">Published</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Exam Timetables')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EX-10-SST-T2</td>
        <td>
          <div class="fw-semibold text-dark">Social Science (087)</div>
          <small class="text-muted font-size-11">Theory + Map Work</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 (A, B, C)</span></td>
        <td><small class="text-dark">04 Dec 2024 • 09:30 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">80 Marks</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">63.5 / 80 (79.3%)</span></td>
        <td><small class="text-muted">Mrs. Rashmi Sen</small></td>
        <td><span class="badge-status badge-pending">Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Exam Timetables')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EX-12-CSC-T2</td>
        <td>
          <div class="fw-semibold text-dark">Computer Science (083)</div>
          <small class="text-muted font-size-11">Theory + Lab Code</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 (Science)</span></td>
        <td><small class="text-dark">06 Dec 2024 • 09:30 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">70 Marks</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">59.2 / 70 (84.5%)</span></td>
        <td><small class="text-muted">Mr. Rohit Ganguly</small></td>
        <td><span class="badge-status badge-pending">Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Exam Timetables')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>


<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
