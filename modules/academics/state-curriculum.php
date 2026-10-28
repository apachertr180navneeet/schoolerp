<?php
/**
 * EDUSYS PRO - STATE BOARD CURRICULUM
 * Dedicated operational interface & records management for State Board Curriculum
 */
$page_title = "State Board Curriculum";
$page_desc = "State Education Department syllabus integration, regional language equivalences, and statutory NOC filings";
$active_module = "academics";
$active_submodule = "state-curriculum.php";
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
    <h1><i class="bi bi-geo-alt-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'state-curriculum_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-map-fill me-1"></i> Map State Standards
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Equivalence Mapped</h6>
        <div class="kpi-value">100% Validated</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> State Education Directorate</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-circle"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Regional Languages</h6>
        <div class="kpi-value">3 Options Active</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Hindi, Sanskrit, Punjabi</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-translate"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>State NOC Status</h6>
        <div class="kpi-value">Permanent NOC</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Affiliation No: 2130892</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-file-earmark-lock-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Transfer Scholars</h6>
        <div class="kpi-value">100% Converted</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Zero Curriculum Gaps</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-arrow-left-right"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search state code, regional language, board, classes...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All State Standards</option>
      <option >Delhi Directorate of Education (DoE)</option>
      <option >Haryana Board of School Education (BSEH)</option>
      <option >Maharashtra State Board (MSBSHSE)</option>
      <option >Uttar Pradesh Madhyamik (UPMSP)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Mapped & Active</option>
      <option >Under Equivalence Review</option>
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
        <th>State Code</th>
        <th>State Education Board</th>
        <th>Target Classes</th>
        <th>Regional Language Track</th>
        <th>State Domicile Syllabus</th>
        <th>Equivalence Certificate</th>
        <th>NOC Status</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ST-DOE-DL</td>
        <td>
          <div class="fw-semibold text-dark">Directorate of Education, Delhi</div>
          <small class="text-muted font-size-11">DoE Curriculum Framework</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 1 to 12</span></td>
        <td><small class="text-dark">Hindi Course-A / Sanskrit</small></td>
        <td><small class="text-muted font-mono font-size-12">SCERT Delhi Deshbhakti & Happiness</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Equivalence #DOE-2024-84</span></td>
        <td><small class="text-muted">Permanent NOC Filed</small></td>
        <td><span class="badge-status badge-active">Mapped</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'State Board Curriculum')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ST-BSEH-HR</td>
        <td>
          <div class="fw-semibold text-dark">Haryana Board of School Education</div>
          <small class="text-muted font-size-11">BSEH Curriculum Standards</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 6 to 10</span></td>
        <td><small class="text-dark">Hindi / Sanskrit</small></td>
        <td><small class="text-muted font-mono font-size-12">Haryana State Heritage & Geography</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Equivalence #BSEH-4921</span></td>
        <td><small class="text-muted">NOC Verified</small></td>
        <td><span class="badge-status badge-active">Mapped</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'State Board Curriculum')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ST-UPMSP-UP</td>
        <td>
          <div class="fw-semibold text-dark">UP Madhyamik Shiksha Parishad</div>
          <small class="text-muted font-size-11">Prayagraj Board Standards</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 9 & 10</span></td>
        <td><small class="text-dark">Hindi Sahitya Core</small></td>
        <td><small class="text-muted font-mono font-size-12">State Science & Math Equivalency</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Equivalence #UP-1048</span></td>
        <td><small class="text-muted">NOC Verified</small></td>
        <td><span class="badge-status badge-active">Mapped</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'State Board Curriculum')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ST-MSBS-MH</td>
        <td>
          <div class="fw-semibold text-dark">Maharashtra State Board (MSBSHSE)</div>
          <small class="text-muted font-size-11">Pune Board Equivalency</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 6 to 10</span></td>
        <td><small class="text-dark">Marathi (3rd Language Option)</small></td>
        <td><small class="text-muted font-mono font-size-12">EVS & State History Equivalence</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Equivalence #MS-8492</span></td>
        <td><small class="text-muted">NOC Verified</small></td>
        <td><span class="badge-status badge-active">Mapped</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'State Board Curriculum')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ST-PSEB-PB</td>
        <td>
          <div class="fw-semibold text-dark">Punjab School Education Board</div>
          <small class="text-muted font-size-11">Mohali Board Standards</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 6 to 8</span></td>
        <td><small class="text-dark">Punjabi (Regional Option)</small></td>
        <td><small class="text-muted font-mono font-size-12">Punjab History & Culture</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Equivalence #PB-2940</span></td>
        <td><small class="text-muted">NOC Verified</small></td>
        <td><span class="badge-status badge-active">Mapped</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'State Board Curriculum')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ST-KSEEB-KA</td>
        <td>
          <div class="fw-semibold text-dark">Karnataka School Examination Board</div>
          <small class="text-muted font-size-11">Bengaluru Board Standards</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 6 to 8</span></td>
        <td><small class="text-dark">Kannada (Introductory Track)</small></td>
        <td><small class="text-muted font-mono font-size-12">State Environmental Studies</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Equivalence #KA-1849</span></td>
        <td><small class="text-muted">NOC Verified</small></td>
        <td><span class="badge-status badge-active">Mapped</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'State Board Curriculum')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ST-WBSED-WB</td>
        <td>
          <div class="fw-semibold text-dark">West Bengal Board of Secondary</div>
          <small class="text-muted font-size-11">Kolkata Board Standards</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 6 to 8</span></td>
        <td><small class="text-dark">Bengali (Introductory Track)</small></td>
        <td><small class="text-muted font-mono font-size-12">State Heritage Studies</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Equivalence #WB-3920</span></td>
        <td><small class="text-muted">NOC Verified</small></td>
        <td><span class="badge-status badge-active">Mapped</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'State Board Curriculum')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ST-TNSB-TN</td>
        <td>
          <div class="fw-semibold text-dark">Tamil Nadu State Board</div>
          <small class="text-muted font-size-11">Chennai Board Standards</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 6 to 8</span></td>
        <td><small class="text-dark">Tamil (Language Elective)</small></td>
        <td><small class="text-muted font-mono font-size-12">State Social Studies Equivalence</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Equivalence #TN-4810</span></td>
        <td><small class="text-muted">NOC Verified</small></td>
        <td><span class="badge-status badge-active">Mapped</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'State Board Curriculum')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
