<?php
/**
 * EDUSYS PRO - SYLLABUS MANAGEMENT
 * Dedicated operational interface & records management for Syllabus Management
 */
$page_title = "Syllabus Management";
$page_desc = "Term-wise curriculum breakdown, chapter unit mappings, teaching hour allotments, and weightages";
$active_module = "academics";
$active_submodule = "syllabus.php";
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
    <h1><i class="bi bi-journal-text text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'syllabus_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Add Syllabus Unit
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Syllabus Units</h6>
        <div class="kpi-value">384 Chapters</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Mapped to NCERT & CBSE</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-journal-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Term 1 Completed</h6>
        <div class="kpi-value">100% Taught</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Mid-Term Examinations Done</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-circle"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Term 2 Progress</h6>
        <div class="kpi-value">54.2% Completed</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Target Finish: 15 Jan 2025</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-clock-history"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Practical Hours</h6>
        <div class="kpi-value">180 Hours Logged</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Lab Experiential Work</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-tools"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search syllabus UID, subject, chapter title, class...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Subjects</option>
      <option >Mathematics (041)</option>
      <option >Physics (042)</option>
      <option >Chemistry (043)</option>
      <option >Biology (044)</option>
      <option >Computer Science (083)</option>
      <option >Social Science (087)</option>
      <option >English Core (301)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >On Track</option>
      <option >Completed Term 1</option>
      <option >In Progress Term 2</option>
      <option >Remedial Scheduled</option>
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
        <th>Syllabus UID</th>
        <th>Subject & Code</th>
        <th>Class & Stream</th>
        <th>Term / Semester</th>
        <th>Total Chapters</th>
        <th>Allotted Teaching Hours</th>
        <th>Weightage (Marks)</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SYL-MATH-10</td>
        <td>
          <div class="fw-semibold text-dark">Mathematics (041)</div>
          <small class="text-muted font-size-11">Real Numbers to Stats</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Secondary</span></td>
        <td><small class="text-dark">Term 1 & Term 2 (Annual)</small></td>
        <td><small class="text-muted font-mono font-size-12">14 Chapters (NCERT)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">160 Hours (6 Periods/Wk)</span></td>
        <td><small class="text-muted">80 Theory + 20 Internal</small></td>
        <td><span class="badge-status badge-active">On Track (76%)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Syllabus Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SYL-PHY-12</td>
        <td>
          <div class="fw-semibold text-dark">Physics (042)</div>
          <small class="text-muted font-size-11">Electrostatics to Optics</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-dark">Annual Board Syllabus</small></td>
        <td><small class="text-muted font-mono font-size-12">14 Units (NCERT)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">150 Hours + 60h Lab</span></td>
        <td><small class="text-muted">70 Theory + 30 Practicals</small></td>
        <td><span class="badge-status badge-active">On Track (78%)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Syllabus Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SYL-CHEM-12</td>
        <td>
          <div class="fw-semibold text-dark">Chemistry (043)</div>
          <small class="text-muted font-size-11">Physical, Inorganic, Organic</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM/B)</span></td>
        <td><small class="text-dark">Annual Board Syllabus</small></td>
        <td><small class="text-muted font-mono font-size-12">10 Major Units (NCERT)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">140 Hours + 60h Lab</span></td>
        <td><small class="text-muted">70 Theory + 30 Practicals</small></td>
        <td><span class="badge-status badge-active">On Track (74%)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Syllabus Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SYL-BIO-12</td>
        <td>
          <div class="fw-semibold text-dark">Biology (044)</div>
          <small class="text-muted font-size-11">Genetics, Biotech, Ecology</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCB)</span></td>
        <td><small class="text-dark">Annual Board Syllabus</small></td>
        <td><small class="text-muted font-mono font-size-12">13 Chapters (NCERT)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">140 Hours + 60h Lab</span></td>
        <td><small class="text-muted">70 Theory + 30 Practicals</small></td>
        <td><span class="badge-status badge-active">On Track (80%)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Syllabus Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SYL-CS-12</td>
        <td>
          <div class="fw-semibold text-dark">Computer Science (083)</div>
          <small class="text-muted font-size-11">Python, SQL, Networks</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Senior Secondary</span></td>
        <td><small class="text-dark">Annual Board Syllabus</small></td>
        <td><small class="text-muted font-mono font-size-12">3 Major Sections</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">120 Hours + 60h Lab</span></td>
        <td><small class="text-muted">70 Theory + 30 Practicals</small></td>
        <td><span class="badge-status badge-active">On Track (82%)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Syllabus Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SYL-ENG-10</td>
        <td>
          <div class="fw-semibold text-dark">English Language & Lit (184)</div>
          <small class="text-muted font-size-11">First Flight, Footprints, Grammar</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Secondary</span></td>
        <td><small class="text-dark">Annual Board Syllabus</small></td>
        <td><small class="text-muted font-mono font-size-12">18 Chapters + 10 Poems</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">140 Hours (5 Periods/Wk)</span></td>
        <td><small class="text-muted">80 Theory + 20 ASL Assessment</small></td>
        <td><span class="badge-status badge-active">On Track (79%)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Syllabus Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SYL-SST-10</td>
        <td>
          <div class="fw-semibold text-dark">Social Science (087)</div>
          <small class="text-muted font-size-11">Hist, Geo, Pol Sci, Eco</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Secondary</span></td>
        <td><small class="text-dark">Annual Board Syllabus</small></td>
        <td><small class="text-muted font-mono font-size-12">21 Chapters (NCERT)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">160 Hours (6 Periods/Wk)</span></td>
        <td><small class="text-muted">80 Theory + 20 Projects</small></td>
        <td><span class="badge-status badge-active">On Track (72%)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Syllabus Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SYL-ACC-12</td>
        <td>
          <div class="fw-semibold text-dark">Accountancy (055)</div>
          <small class="text-muted font-size-11">Partnership, Companies, Cash Flow</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Commerce</span></td>
        <td><small class="text-dark">Annual Board Syllabus</small></td>
        <td><small class="text-muted font-mono font-size-12">9 Comprehensive Units</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">150 Hours + Project</span></td>
        <td><small class="text-muted">80 Theory + 20 Project Work</small></td>
        <td><span class="badge-status badge-active">On Track (81%)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Syllabus Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
