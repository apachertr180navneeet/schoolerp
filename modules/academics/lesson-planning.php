<?php
/**
 * EDUSYS PRO - LESSON PLANNING
 * Dedicated operational interface & records management for Lesson Planning
 */
$page_title = "Lesson Planning";
$page_desc = "Structured 5E pedagogical plans (Engage, Explore, Explain, Elaborate, Evaluate) and HOD approvals";
$active_module = "academics";
$active_submodule = "lesson-planning.php";
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
    <h1><i class="bi bi-card-checklist text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'lesson-planning_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Create Lesson Plan
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Lesson Plans Filed</h6>
        <div class="kpi-value">384 Modules</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Units Mapped</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-journal-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>5E Model Adopted</h6>
        <div class="kpi-value">100% Plans</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> NCERT & CBSE Pedagogy</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-all"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>HOD Approved</h6>
        <div class="kpi-value">368 Plans</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Vetted by Subject Heads</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-patch-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>In Progress / Week</h6>
        <div class="kpi-value">16 Active Plans</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Current Academic Cycle</div>
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
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search lesson plan ID, subject, chapter, grade...">
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
      <option >HOD Approved</option>
      <option >Under HOD Review</option>
      <option >In Revision</option>
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
        <th>Plan ID</th>
        <th>Subject & Chapter</th>
        <th>Grade & Section</th>
        <th>Planned Teaching Dates</th>
        <th>Pedagogical Objective</th>
        <th>Teaching Aids / Lab Tools</th>
        <th>HOD Approval</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LP-MATH-10-08</td>
        <td>
          <div class="fw-semibold text-dark">Maths: Ch 8 Introduction to Trigo</div>
          <small class="text-muted font-size-11">Trigonometric Ratios & Values</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Sec A & B</span></td>
        <td><small class="text-dark">21 Oct to 31 Oct 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Apply Sin, Cos, Tan to right-angled triangles</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Clinometer, GeoGebra 3D Software</span></td>
        <td><small class="text-muted">Approved by HOD Maths</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lesson Planning')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LP-PHY-12-04</td>
        <td>
          <div class="fw-semibold text-dark">Physics: Electromagnetic Waves</div>
          <small class="text-muted font-size-11">Displacement Current & Spectrum</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - PCM & PCB</span></td>
        <td><small class="text-dark">24 Oct to 02 Nov 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Deduce wave propagation and applications</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Spectrometer, PhET Digital Simulations</span></td>
        <td><small class="text-muted">Approved by HOD Science</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lesson Planning')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LP-CHEM-12-05</td>
        <td>
          <div class="fw-semibold text-dark">Chemistry: Coordination Compounds</div>
          <small class="text-muted font-size-11">IUPAC Nomenclature & CFT</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - PCM & PCB</span></td>
        <td><small class="text-dark">18 Oct to 28 Oct 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Understand crystal field splitting theory</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Molecular Model Kits, Colorimetry</span></td>
        <td><small class="text-muted">Approved by HOD Science</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lesson Planning')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LP-BIO-12-08</td>
        <td>
          <div class="fw-semibold text-dark">Biology: Human Health & Disease</div>
          <small class="text-muted font-size-11">Immunity, Vaccines & Cancer</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - PCB</span></td>
        <td><small class="text-dark">20 Oct to 30 Oct 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Differentiate innate vs acquired immunity</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Permanent Slides of Plasmodium, Charts</span></td>
        <td><small class="text-muted">Approved by HOD Science</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lesson Planning')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LP-ENG-10-06</td>
        <td>
          <div class="fw-semibold text-dark">English: The Trees (Poem)</div>
          <small class="text-muted font-size-11">Adrienne Rich Poetic Devices</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Sec A & B</span></td>
        <td><small class="text-dark">25 Oct to 29 Oct 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Analyze symbolism of female emancipation</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Smart Board Audio Reading & Video</span></td>
        <td><small class="text-muted">Approved by HOD English</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lesson Planning')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LP-SST-10-04</td>
        <td>
          <div class="fw-semibold text-dark">History: The Age of Industrialisation</div>
          <small class="text-muted font-size-11">Before the Industrial Revolution</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Sec A & B</span></td>
        <td><small class="text-dark">22 Oct to 05 Nov 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Examine proto-industrialization in India</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Historical Maps, Textile Sample Swatches</span></td>
        <td><small class="text-muted">Approved by HOD Social</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lesson Planning')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LP-CS-12-06</td>
        <td>
          <div class="fw-semibold text-dark">CS: Database Management (SQL)</div>
          <small class="text-muted font-size-11">Group By, Having, Joins</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - PCM</span></td>
        <td><small class="text-dark">20 Oct to 31 Oct 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Execute relational queries on MySQL database</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Computer Lab, MySQL Workbench</span></td>
        <td><small class="text-muted">Approved by HOD CS</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lesson Planning')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LP-ACC-12-05</td>
        <td>
          <div class="fw-semibold text-dark">Accounts: Company Accounts (Shares)</div>
          <small class="text-muted font-size-11">Issue of Shares at Premium / Discount</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Commerce</span></td>
        <td><small class="text-dark">22 Oct to 08 Nov 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Journalize forfeiture and re-issue of shares</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Annual Reports of Listed Companies</span></td>
        <td><small class="text-muted">Approved by HOD Commerce</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lesson Planning')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
