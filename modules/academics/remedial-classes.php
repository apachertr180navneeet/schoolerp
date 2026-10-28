<?php
/**
 * EDUSYS PRO - REMEDIAL CLASSES
 * Dedicated operational interface & records management for Remedial Classes
 */
$page_title = "Remedial Classes";
$page_desc = "Support intervention clinics for scholars below 40% threshold, personalized doubt solving, and diagnostic tests";
$active_module = "academics";
$active_submodule = "remedial-classes.php";
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
    <h1><i class="bi bi-heart-pulse-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'remedial-classes_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-calendar-plus me-1"></i> Schedule Remedial Batch
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Remedial Batches</h6>
        <div class="kpi-value">12 Small Batches</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Max 15 Students / Batch</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Scholars Supported</h6>
        <div class="kpi-value">148 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Post Periodic Test 1 Diagnostic</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Grade Improvement</h6>
        <div class="kpi-value">+18.4% Score Jump</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> From Red to Green Band</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-graph-up-arrow"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Timing Slot</h6>
        <div class="kpi-value">02:15 - 03:00 PM</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Zero Impact on Main Routine</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-clock-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search batch ID, subject, grade, faculty...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Subjects</option>
      <option >Mathematics (Core Doubts)</option>
      <option >Physics (Numericals & Derivations)</option>
      <option >Chemistry (Organic Reactions)</option>
      <option >Social Science (Answer Writing)</option>
      <option >English (Grammar Foundations)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active Remedial Clinic</option>
      <option >Target Improvement Met</option>
      <option >Scheduled</option>
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
        <th>Batch ID</th>
        <th>Subject Focus</th>
        <th>Target Grade</th>
        <th>Faculty Lead</th>
        <th>Students Enrolled</th>
        <th>Target Competency</th>
        <th>Schedule Slot</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REM-MATH-10</td>
        <td>
          <div class="fw-semibold text-dark">Mathematics: Quadratic Equations & Trigo</div>
          <small class="text-muted font-size-11">Focus on NCERT basic formulas</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Sec A & B</span></td>
        <td><small class="text-dark">Mrs. Sunita Kaul (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">14 Students</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Solve 3-mark board questions</span></td>
        <td><small class="text-muted">Mon & Wed (02:15 - 03:00 PM)</small></td>
        <td><span class="badge-status badge-active">Active Clinic</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Remedial Classes')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REM-PHY-12</td>
        <td>
          <div class="fw-semibold text-dark">Physics: Electric Charges & Current Circuit</div>
          <small class="text-muted font-size-11">Kirchhoff Law numerical problems</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-dark">Dr. K. L. Sharma (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">12 Students</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Circuit analysis mastery</span></td>
        <td><small class="text-muted">Tue & Thu (02:15 - 03:00 PM)</small></td>
        <td><span class="badge-status badge-active">Active Clinic</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Remedial Classes')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REM-CHEM-12</td>
        <td>
          <div class="fw-semibold text-dark">Chemistry: Electrochemistry & Kinetics</div>
          <small class="text-muted font-size-11">Nernst equation & rate laws</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM/B)</span></td>
        <td><small class="text-dark">Mr. Vikram Rathore (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">15 Students</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Numerical calculation accuracy</span></td>
        <td><small class="text-muted">Mon & Fri (02:15 - 03:00 PM)</small></td>
        <td><span class="badge-status badge-active">Active Clinic</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Remedial Classes')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REM-SST-10</td>
        <td>
          <div class="fw-semibold text-dark">Social Science: Map Work & 5-Mark Answers</div>
          <small class="text-muted font-size-11">Answer presentation technique</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Sec A & B</span></td>
        <td><small class="text-dark">Mrs. Shalini Verma (TGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">16 Students</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Full marks on map items</span></td>
        <td><small class="text-muted">Wed & Fri (02:15 - 03:00 PM)</small></td>
        <td><span class="badge-status badge-active">Active Clinic</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Remedial Classes')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REM-ENG-10</td>
        <td>
          <div class="fw-semibold text-dark">English: Grammar Editing & Formal Letters</div>
          <small class="text-muted font-size-11">Sentence structure & format drills</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Sec A & B</span></td>
        <td><small class="text-dark">Mr. Deepak Rawat (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">10 Students</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Error identification accuracy</span></td>
        <td><small class="text-muted">Tue & Thu (02:15 - 03:00 PM)</small></td>
        <td><span class="badge-status badge-active">Active Clinic</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Remedial Classes')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REM-ACC-12</td>
        <td>
          <div class="fw-semibold text-dark">Accountancy: Partnership Fundamentals</div>
          <small class="text-muted font-size-11">P&L Appropriation & Capital Accounts</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Commerce</span></td>
        <td><small class="text-dark">Mr. M. K. Chawla (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">11 Students</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Error-free ledger posting</span></td>
        <td><small class="text-muted">Mon & Wed (02:15 - 03:00 PM)</small></td>
        <td><span class="badge-status badge-active">Active Clinic</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Remedial Classes')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REM-BIO-12</td>
        <td>
          <div class="fw-semibold text-dark">Biology: Genetics Numerical & Crosses</div>
          <small class="text-muted font-size-11">Dihybrid cross & linkage problems</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCB)</span></td>
        <td><small class="text-dark">Mrs. Radhika Iyer (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">9 Students</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Punnett square analysis</span></td>
        <td><small class="text-muted">Tue & Thu (02:15 - 03:00 PM)</small></td>
        <td><span class="badge-status badge-active">Active Clinic</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Remedial Classes')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REM-CS-12</td>
        <td>
          <div class="fw-semibold text-dark">CS: Python Loops, Lists & SQL Queries</div>
          <small class="text-muted font-size-11">Trace output & query debugging</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-dark">Mr. Kunal Bansal (MCA)</small></td>
        <td><small class="text-muted font-mono font-size-12">8 Students</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Bug-free code execution</span></td>
        <td><small class="text-muted">Fri (02:15 - 03:30 PM)</small></td>
        <td><span class="badge-status badge-active">Active Clinic</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Remedial Classes')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
