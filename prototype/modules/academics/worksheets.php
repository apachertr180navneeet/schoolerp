<?php
/**
 * EDUSYS PRO - WORKSHEETS & PRACTICE PAPERS
 * Dedicated operational interface & records management for Worksheets & Practice Papers
 */
$page_title = "Worksheets & Practice Papers";
$page_desc = "Competency-based question banks, Assertion-Reasoning sheets, and CBSE past 10-year board solutions";
$active_module = "academics";
$active_submodule = "worksheets.php";
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
    <h1><i class="bi bi-file-earmark-text-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'worksheets_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-cloud-upload-fill me-1"></i> Upload Practice Sheet
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Worksheets Vault</h6>
        <div class="kpi-value">248 Sheets</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> PDF Format with Solutions</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-file-earmark-pdf-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>CBSE Competency Ready</h6>
        <div class="kpi-value">100% NEP Aligned</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Assertion-Reasoning & Case</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-patch-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Student Downloads</h6>
        <div class="kpi-value">14,820 Downloads</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> High Revision Activity</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-download"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Past 10-Year Papers</h6>
        <div class="kpi-value">Full Archives</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> 2014 to 2024 Solved</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-archive-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search worksheet title, subject, grade, difficulty...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Subjects</option>
      <option >Mathematics (041)</option>
      <option >Physics (042)</option>
      <option >Chemistry (043)</option>
      <option >Biology (044)</option>
      <option >Social Science (087)</option>
      <option >English (301)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active Download</option>
      <option >Verified Key Included</option>
      <option >Draft</option>
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
        <th>Sheet UID</th>
        <th>Worksheet Title</th>
        <th>Subject & Grade</th>
        <th>Difficulty Level</th>
        <th>Questions Count</th>
        <th>Solution Key Attached</th>
        <th>Downloads Count</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WS-MATH-10-04</td>
        <td>
          <div class="fw-semibold text-dark">Trigonometric Identities Mastery Sheet</div>
          <small class="text-muted font-size-11">Assertion-Reasoning + Case Studies</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Maths - Class 10</span></td>
        <td><small class="text-dark">Advanced Level</small></td>
        <td><small class="text-muted font-mono font-size-12">25 Questions</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Step-by-Step PDF Key</span></td>
        <td><small class="text-muted">482 Downloads</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Worksheets & Practice Papers')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WS-PHY-12-08</td>
        <td>
          <div class="fw-semibold text-dark">Electromagnetic Induction Derivations Sheet</div>
          <small class="text-muted font-size-11">Faraday Law & Lenz Law Problems</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Physics - Class 12</span></td>
        <td><small class="text-dark">Board Exam Standard</small></td>
        <td><small class="text-muted font-mono font-size-12">20 Problems</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Complete Derivations Key</span></td>
        <td><small class="text-muted">394 Downloads</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Worksheets & Practice Papers')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WS-CHEM-12-05</td>
        <td>
          <div class="fw-semibold text-dark">Coordination Compounds Nomenclature & Isomers</div>
          <small class="text-muted font-size-11">IUPAC Rule Drills</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Chemistry - Class 12</span></td>
        <td><small class="text-dark">Medium to Advanced</small></td>
        <td><small class="text-muted font-mono font-size-12">30 Questions</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Complete Nomenclature Key</span></td>
        <td><small class="text-muted">340 Downloads</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Worksheets & Practice Papers')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WS-BIO-12-07</td>
        <td>
          <div class="fw-semibold text-dark">Immunity & Vaccines Diagrammatic Practice</div>
          <small class="text-muted font-size-11">Antibody Structure & Life Cycle of HIV</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Biology - Class 12</span></td>
        <td><small class="text-dark">High Yield Board</small></td>
        <td><small class="text-muted font-mono font-size-12">15 Long Questions</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Labelled Answer Key</span></td>
        <td><small class="text-muted">312 Downloads</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Worksheets & Practice Papers')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WS-ENG-10-03</td>
        <td>
          <div class="fw-semibold text-dark">Integrated Grammar: Editing & Omission</div>
          <small class="text-muted font-size-11">Error Correction Drills</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">English - Class 10</span></td>
        <td><small class="text-dark">Standard Level</small></td>
        <td><small class="text-muted font-mono font-size-12">40 Sentences</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Verified Solution Key</span></td>
        <td><small class="text-muted">520 Downloads</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Worksheets & Practice Papers')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WS-SST-10-06</td>
        <td>
          <div class="fw-semibold text-dark">History Map Pointing: Nationalism in India</div>
          <small class="text-muted font-size-11">INC Sessions & Satyagraha Centers</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Social - Class 10</span></td>
        <td><small class="text-dark">Standard Level</small></td>
        <td><small class="text-muted font-mono font-size-12">15 Map Items</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Annotated Map Key</span></td>
        <td><small class="text-muted">490 Downloads</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Worksheets & Practice Papers')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WS-CS-12-04</td>
        <td>
          <div class="fw-semibold text-dark">SQL Table Queries & Aggregate Functions</div>
          <small class="text-muted font-size-11">SELECT with GROUP BY, HAVING</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">CS - Class 12</span></td>
        <td><small class="text-dark">Practical Exam Focus</small></td>
        <td><small class="text-muted font-mono font-size-12">20 Database Queries</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Tested SQL Script Key</span></td>
        <td><small class="text-muted">285 Downloads</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Worksheets & Practice Papers')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WS-ACC-12-05</td>
        <td>
          <div class="fw-semibold text-dark">Issue & Forfeiture of Shares Comprehensive</div>
          <small class="text-muted font-size-11">Pro-Rata Allotment Scenarios</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Accounts - Class 12</span></td>
        <td><small class="text-dark">Advanced Board Level</small></td>
        <td><small class="text-muted font-mono font-size-12">12 Comprehensive Cases</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Detailed Working Notes</span></td>
        <td><small class="text-muted">315 Downloads</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Worksheets & Practice Papers')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
