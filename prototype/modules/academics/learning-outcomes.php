<?php
/**
 * EDUSYS PRO - LEARNING OUTCOMES
 * Dedicated operational interface & records management for Learning Outcomes
 */
$page_title = "Learning Outcomes";
$page_desc = "NEP 2020 competency benchmarks, Bloom taxonomy mappings, rubrics, and cohort mastery levels";
$active_module = "academics";
$active_submodule = "learning-outcomes.php";
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
    <h1><i class="bi bi-bullseye text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'learning-outcomes_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Define Learning Outcome
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Outcomes Defined</h6>
        <div class="kpi-value">184 Competencies</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Mapped across All Subjects</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-bullseye"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Cohort Mastery</h6>
        <div class="kpi-value">82.4% Achieved</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Exceeds 75% CBSE Benchmark</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-circle"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Blooms Taxonomy</h6>
        <div class="kpi-value">6 Cognitive Levels</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Remembering to Creating</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-diagram-3"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Remedial Focus</h6>
        <div class="kpi-value">14 Outcomes</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Targeted in Doubt Clinics</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-exclamation-triangle-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search outcome code, competency, subject, Bloom level...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Bloom Taxonomy Levels</option>
      <option >Level 1: Remembering & Recall</option>
      <option >Level 2: Understanding & Explain</option>
      <option >Level 3: Applying & Problem Solving</option>
      <option >Level 4: Analyzing & Deconstructing</option>
      <option >Level 5: Evaluating & Creating</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Mastery Achieved (>80%)</option>
      <option >Progressing (70-79%)</option>
      <option >Needs Intervention (<70%)</option>
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
        <th>Outcome Code</th>
        <th>Competency Description</th>
        <th>Subject & Grade</th>
        <th>Blooms Taxonomy Level</th>
        <th>Assessment Tool</th>
        <th>Mastery % Target</th>
        <th>Current Cohort %</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LO-MATH-10-01</td>
        <td>
          <div class="fw-semibold text-dark">Apply trigonometric ratios to compute indirect heights & distances</div>
          <small class="text-muted font-size-11">Trigonometry Competency</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mathematics (041) - Cl 10</span></td>
        <td><small class="text-dark">Level 3: Applying</small></td>
        <td><small class="text-muted font-mono font-size-12">Case-based Worksheet & PT</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">80.0%</span></td>
        <td><small class="text-muted">84.6% Mastered</small></td>
        <td><span class="badge-status badge-active">Mastered</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Learning Outcomes')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LO-PHY-12-01</td>
        <td>
          <div class="fw-semibold text-dark">Analyze Faraday and Lenz laws in electromagnetic induction circuits</div>
          <small class="text-muted font-size-11">Electromagnetism Competency</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Physics (042) - Cl 12</span></td>
        <td><small class="text-dark">Level 4: Analyzing</small></td>
        <td><small class="text-muted font-mono font-size-12">Lab Practical & Numerical Exam</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">75.0%</span></td>
        <td><small class="text-muted">78.2% Mastered</small></td>
        <td><span class="badge-status badge-active">Mastered</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Learning Outcomes')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LO-CHEM-12-01</td>
        <td>
          <div class="fw-semibold text-dark">Differentiate coordination complexes using Crystal Field Theory</div>
          <small class="text-muted font-size-11">Inorganic Chemistry</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Chemistry (043) - Cl 12</span></td>
        <td><small class="text-dark">Level 4: Analyzing</small></td>
        <td><small class="text-muted font-mono font-size-12">Conceptual Objective Tests</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">75.0%</span></td>
        <td><small class="text-muted">74.8% Progressing</small></td>
        <td><span class="badge-status badge-pending">Progressing</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Learning Outcomes')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LO-BIO-12-01</td>
        <td>
          <div class="fw-semibold text-dark">Evaluate role of innate and acquired immunity in disease defense</div>
          <small class="text-muted font-size-11">Immunology Competency</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Biology (044) - Cl 12</span></td>
        <td><small class="text-dark">Level 5: Evaluating</small></td>
        <td><small class="text-muted font-mono font-size-12">Case Scenario Analysis</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">80.0%</span></td>
        <td><small class="text-muted">82.4% Mastered</small></td>
        <td><span class="badge-status badge-active">Mastered</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Learning Outcomes')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LO-ENG-10-01</td>
        <td>
          <div class="fw-semibold text-dark">Deconstruct poetic devices and thematic symbolism in modern poetry</div>
          <small class="text-muted font-size-11">Literary Analysis</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">English (184) - Cl 10</span></td>
        <td><small class="text-dark">Level 4: Analyzing</small></td>
        <td><small class="text-muted font-mono font-size-12">Critical Appreciation Essay</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">80.0%</span></td>
        <td><small class="text-muted">86.0% Mastered</small></td>
        <td><span class="badge-status badge-active">Mastered</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Learning Outcomes')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LO-SST-10-01</td>
        <td>
          <div class="fw-semibold text-dark">Evaluate economic and social impacts of anti-colonial movements in India</div>
          <small class="text-muted font-size-11">Historical Inquiry</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Social Science (087) - Cl 10</span></td>
        <td><small class="text-dark">Level 5: Evaluating</small></td>
        <td><small class="text-muted font-mono font-size-12">DBQ Document-Based Questions</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">75.0%</span></td>
        <td><small class="text-muted">79.4% Mastered</small></td>
        <td><span class="badge-status badge-active">Mastered</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Learning Outcomes')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LO-CS-12-01</td>
        <td>
          <div class="fw-semibold text-dark">Construct complex relational SQL queries involving grouping and joins</div>
          <small class="text-muted font-size-11">Database Engineering</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Computer Science (083) - Cl 12</span></td>
        <td><small class="text-dark">Level 6: Creating</small></td>
        <td><small class="text-muted font-mono font-size-12">Lab Terminal Practical Exam</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">85.0%</span></td>
        <td><small class="text-muted">88.5% Mastered</small></td>
        <td><span class="badge-status badge-active">Mastered</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Learning Outcomes')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LO-ACC-12-01</td>
        <td>
          <div class="fw-semibold text-dark">Compute and journalize company share capital forfeiture transactions</div>
          <small class="text-muted font-size-11">Corporate Accounting</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Accountancy (055) - Cl 12</span></td>
        <td><small class="text-dark">Level 3: Applying</small></td>
        <td><small class="text-muted font-mono font-size-12">Problem Solving Ledger Exam</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">80.0%</span></td>
        <td><small class="text-muted">81.2% Mastered</small></td>
        <td><span class="badge-status badge-active">Mastered</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Learning Outcomes')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
