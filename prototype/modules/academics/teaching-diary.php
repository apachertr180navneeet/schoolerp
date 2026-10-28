<?php
/**
 * EDUSYS PRO - TEACHING DIARY
 * Dedicated operational interface & records management for Teaching Diary
 */
$page_title = "Teaching Diary";
$page_desc = "Daily teacher instructional record, pedagogical reflections, homework allotments, and coordinator sign-offs";
$active_module = "academics";
$active_submodule = "teaching-diary.php";
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
    <h1><i class="bi bi-journal-check text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'teaching-diary_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-pencil-square me-1"></i> Log Today's Entry
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Diaries Logged Today</h6>
        <div class="kpi-value">108 Submitted</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 96.4% Compliance by 02 PM</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-circle"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Active Topics Taught</h6>
        <div class="kpi-value">576 Periods</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Synchronized with Lesson Plan</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-journal-text"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Homework Logged</h6>
        <div class="kpi-value">100% Documented</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Within Daily Homework Cap</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-house-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Academic Inspection</h6>
        <div class="kpi-value">100% Vetted</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Principal & Coordinators</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search diary log, faculty name, subject, class...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Faculty</option>
      <option >Dr. K. L. Sharma (Physics)</option>
      <option >Mrs. Sunita Kaul (Maths)</option>
      <option >Mr. Vikram Rathore (Chemistry)</option>
      <option >Mrs. Radhika Iyer (Biology)</option>
      <option >Mr. Deepak Rawat (English)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Reviewed & Signed</option>
      <option >Pending Coordinator Sign</option>
      <option >Revision Requested</option>
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
        <th>Diary Log #</th>
        <th>Faculty Full Name</th>
        <th>Subject & Class</th>
        <th>Period #</th>
        <th>Topics Taught Today</th>
        <th>Homework Assigned</th>
        <th>Principal Review</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TDR-2024-941</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Sunita Kaul</div>
          <small class="text-muted font-size-11">PGT Mathematics</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Maths - Class 10-A</span></td>
        <td><small class="text-dark">Period 1 (07:45 AM)</small></td>
        <td><small class="text-muted font-mono font-size-12">Solved Exercise 8.2 Questions 1-5 (Values of 30, 45, 60)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Solve Ex 8.2 Q6-Q10 in Homework Notebook</span></td>
        <td><small class="text-muted">Signed by Coordinator</small></td>
        <td><span class="badge-status badge-active">Signed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teaching Diary')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TDR-2024-942</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Deepak Rawat</div>
          <small class="text-muted font-size-11">PGT English</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">English - Class 10-A</span></td>
        <td><small class="text-dark">Period 2 (08:30 AM)</small></td>
        <td><small class="text-muted font-mono font-size-12">Completed reading and vocabulary of 'Madam Rides the Bus'</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Answer 3 Short Questions on Character Sketch</span></td>
        <td><small class="text-muted">Signed by Coordinator</small></td>
        <td><span class="badge-status badge-active">Signed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teaching Diary')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TDR-2024-943</td>
        <td>
          <div class="fw-semibold text-dark">Dr. K. L. Sharma</div>
          <small class="text-muted font-size-11">PGT Physics</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Physics - Class 12-PCM</span></td>
        <td><small class="text-dark">Period 1 (07:45 AM)</small></td>
        <td><small class="text-muted font-mono font-size-12">Derived Ampere's Circuital Law & Solenoid magnetic field</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Solve Numerical 4.12, 4.13 from NCERT</span></td>
        <td><small class="text-muted">Signed by Coordinator</small></td>
        <td><span class="badge-status badge-active">Signed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teaching Diary')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TDR-2024-944</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Vikram Rathore</div>
          <small class="text-muted font-size-11">PGT Chemistry</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Chemistry - Class 12-PCM</span></td>
        <td><small class="text-dark">Period 3 (09:30 AM)</small></td>
        <td><small class="text-muted font-mono font-size-12">Coordination Compounds: Optical isomerism in complexes</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Draw optical isomers of [Co(en)3]3+</span></td>
        <td><small class="text-muted">Signed by Coordinator</small></td>
        <td><span class="badge-status badge-active">Signed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teaching Diary')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TDR-2024-945</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Radhika Iyer</div>
          <small class="text-muted font-size-11">PGT Biology</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Biology - Class 12-PCB</span></td>
        <td><small class="text-dark">Period 4 (10:15 AM)</small></td>
        <td><small class="text-muted font-mono font-size-12">Structure of Antibody Molecule and types (IgG, IgA, IgM)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Label antibody diagram with disulfide bonds</span></td>
        <td><small class="text-muted">Signed by Coordinator</small></td>
        <td><span class="badge-status badge-active">Signed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teaching Diary')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TDR-2024-946</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Shalini Verma</div>
          <small class="text-muted font-size-11">TGT Social Science</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Social - Class 10-A</span></td>
        <td><small class="text-dark">Period 5 (11:35 AM)</small></td>
        <td><small class="text-muted font-mono font-size-12">Discussed Non-Cooperation Movement in the Countryside</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Locate Chauri Chaura and Dandi on Map</span></td>
        <td><small class="text-muted">Signed by Coordinator</small></td>
        <td><span class="badge-status badge-active">Signed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teaching Diary')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TDR-2024-947</td>
        <td>
          <div class="fw-semibold text-dark">Mr. M. K. Chawla</div>
          <small class="text-muted font-size-11">PGT Commerce</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Accounts - Class 12-Comm</span></td>
        <td><small class="text-dark">Period 6 (12:15 PM)</small></td>
        <td><small class="text-muted font-mono font-size-12">Calls in Arrears and Calls in Advance accounting entries</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Problem #14 from D.K. Goel textbook</span></td>
        <td><small class="text-muted">Signed by Coordinator</small></td>
        <td><span class="badge-status badge-active">Signed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teaching Diary')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TDR-2024-948</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Kunal Bansal</div>
          <small class="text-muted font-size-11">PGT Computer Science</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">CS - Class 12-PCM</span></td>
        <td><small class="text-dark">Period 7 (12:55 PM)</small></td>
        <td><small class="text-muted font-mono font-size-12">SQL Group By and Aggregate Functions (SUM, AVG, COUNT)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Write 5 SQL queries on Student Table</span></td>
        <td><small class="text-muted">Signed by Coordinator</small></td>
        <td><span class="badge-status badge-active">Signed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teaching Diary')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
