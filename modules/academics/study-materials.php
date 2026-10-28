<?php
/**
 * EDUSYS PRO - STUDY MATERIALS
 * Dedicated operational interface & records management for Study Materials
 */
$page_title = "Study Materials";
$page_desc = "Digital resource repository: NCERT Mind Maps, formula cheat sheets, revision PPTs, and video lectures";
$active_module = "academics";
$active_submodule = "study-materials.php";
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
    <h1><i class="bi bi-file-earmark-pdf-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'study-materials_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-cloud-plus-fill me-1"></i> Upload Study Material
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Digital Assets</h6>
        <div class="kpi-value">312 Files</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Curated by Faculty Heads</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-folder-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Mind Maps & Formulas</h6>
        <div class="kpi-value">100% Chapters</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Quick 5-Minute Revisions</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-diagram-2-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Total Student Views</h6>
        <div class="kpi-value">28,420 Views</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Available on Student App</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-eye-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Audio / Video Lectures</h6>
        <div class="kpi-value">64 Recorded</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Recorded in Smart Studio</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-camera-video-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search material title, subject, format, class...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Formats</option>
      <option >PDF Revision Notes</option>
      <option >Mind Map Infographics</option>
      <option >Formula Cheat Sheet</option>
      <option >Presentation (PPTX)</option>
      <option >Lab Manual</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Published to Portal</option>
      <option >Verified by HOD</option>
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
        <th>Material UID</th>
        <th>Material Title</th>
        <th>Subject & Chapter</th>
        <th>Grade & Stream</th>
        <th>File Type & Size</th>
        <th>Uploaded By</th>
        <th>Student Downloads</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAT-MATH-10</td>
        <td>
          <div class="fw-semibold text-dark">Class 10 All Formulas & Theorems Cheat Sheet</div>
          <small class="text-muted font-size-11">Comprehensive 8-Page Booklet</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Maths - Class 10</span></td>
        <td><small class="text-dark">PDF (2.4 MB)</small></td>
        <td><small class="text-muted font-mono font-size-12">Mrs. Sunita Kaul (PGT)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">1,240 Downloads</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Published</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Study Materials')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAT-PHY-12</td>
        <td>
          <div class="fw-semibold text-dark">Physics Formula & Ray Optics Ray Diagrams</div>
          <small class="text-muted font-size-11">Handwritten Color Coded Notes</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Physics - Class 12</span></td>
        <td><small class="text-dark">PDF (3.8 MB)</small></td>
        <td><small class="text-muted font-mono font-size-12">Dr. K. L. Sharma (PGT)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">980 Downloads</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Published</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Study Materials')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAT-CHEM-12</td>
        <td>
          <div class="fw-semibold text-dark">Organic Chemistry Reaction Mechanisms Map</div>
          <small class="text-muted font-size-11">Name Reactions & Reagents</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Chemistry - Class 12</span></td>
        <td><small class="text-dark">PDF (4.1 MB)</small></td>
        <td><small class="text-muted font-mono font-size-12">Mr. Vikram Rathore (PGT)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">920 Downloads</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Published</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Study Materials')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAT-BIO-12</td>
        <td>
          <div class="fw-semibold text-dark">Human Reproduction & Genetics Mind Maps</div>
          <small class="text-muted font-size-11">Visual Flowcharts for Quick Recall</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Biology - Class 12</span></td>
        <td><small class="text-dark">PDF (3.2 MB)</small></td>
        <td><small class="text-muted font-mono font-size-12">Mrs. Radhika Iyer (PGT)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">740 Downloads</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Published</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Study Materials')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAT-CS-12</td>
        <td>
          <div class="fw-semibold text-dark">Python Functions, Tuples & MySQL Cheat Sheet</div>
          <small class="text-muted font-size-11">Syntax Reference Guide</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">CS - Class 12</span></td>
        <td><small class="text-dark">PDF (1.8 MB)</small></td>
        <td><small class="text-muted font-mono font-size-12">Mr. Kunal Bansal (MCA)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">680 Downloads</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Published</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Study Materials')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAT-SST-10</td>
        <td>
          <div class="fw-semibold text-dark">Complete Social Science Map Workbook 2024</div>
          <small class="text-muted font-size-11">All Geography & History Points</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Social - Class 10</span></td>
        <td><small class="text-dark">PDF (5.4 MB)</small></td>
        <td><small class="text-muted font-mono font-size-12">Mrs. Shalini Verma (TGT)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">1,150 Downloads</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Published</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Study Materials')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAT-ENG-10</td>
        <td>
          <div class="fw-semibold text-dark">English First Flight Poetic Devices Summary</div>
          <small class="text-muted font-size-11">Rhyme Scheme & Figures of Speech</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">English - Class 10</span></td>
        <td><small class="text-dark">PDF (1.5 MB)</small></td>
        <td><small class="text-muted font-mono font-size-12">Mr. Deepak Rawat (PGT)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">890 Downloads</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Published</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Study Materials')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAT-ACC-12</td>
        <td>
          <div class="fw-semibold text-dark">Cash Flow Statements Format & Accounting Ratios</div>
          <small class="text-muted font-size-11">Step-by-Step Ledger Guide</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Accounts - Class 12</span></td>
        <td><small class="text-dark">PDF (2.8 MB)</small></td>
        <td><small class="text-muted font-mono font-size-12">Mr. M. K. Chawla (PGT)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">620 Downloads</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Published</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Study Materials')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
