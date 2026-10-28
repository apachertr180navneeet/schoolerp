<?php
/**
 * EDUSYS PRO - SUBJECT ALLOCATION
 * Dedicated operational interface & records management for Subject Allocation
 */
$page_title = "Subject Allocation";
$page_desc = "Class-wise curriculum schemes, compulsory core subjects, skill modules, and theory-practical splits";
$active_module = "academics";
$active_submodule = "subject-allocation.php";
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
    <h1><i class="bi bi-book-half text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'subject-allocation_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Allocate Subject Scheme
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Subjects Catalog</h6>
        <div class="kpi-value">48 Subjects</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> All 5 Wings Covered</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-book-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Theory : Pract Split</h6>
        <div class="kpi-value">Standardized</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 70:30 & 80:20 CBSE Rules</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-sliders2"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Skill Subjects</h6>
        <div class="kpi-value">6 Options Active</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> AI, IT, Design, Banking</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cpu-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Weekly Periods</h6>
        <div class="kpi-value">576 Allotted</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Balanced 48/Day Routine</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar3-week-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search allocation ref #, subject, code, class...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Grades</option>
      <option >Class 12 - Senior Secondary</option>
      <option >Class 11 - Senior Secondary</option>
      <option >Class 10 - Secondary</option>
      <option >Class 9 - Secondary</option>
      <option >Classes 6 to 8 - Middle</option>
      <option >Classes 1 to 5 - Primary</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active Scheme</option>
      <option >Under Revision</option>
      <option >Elective Opted</option>
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
        <th>Allocation Ref #</th>
        <th>Subject Name</th>
        <th>CBSE Code</th>
        <th>Class & Stream</th>
        <th>Weekly Periods</th>
        <th>Subject Category</th>
        <th>Theory : Pract Split</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SUB-ALC-001</td>
        <td>
          <div class="fw-semibold text-dark">Mathematics (Standard)</div>
          <small class="text-muted font-size-11">Main Scholastic Core</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Code: 041</span></td>
        <td><small class="text-dark">Class 10 - Section A & B</small></td>
        <td><small class="text-muted font-mono font-size-12">6 Periods / Week</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Compulsory Core</span></td>
        <td><small class="text-muted">80 Theory : 20 Internal</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Subject Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SUB-ALC-002</td>
        <td>
          <div class="fw-semibold text-dark">Physics (Theory & Practical)</div>
          <small class="text-muted font-size-11">Senior Secondary Core</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Code: 042</span></td>
        <td><small class="text-dark">Class 12 - Science (PCM/B)</small></td>
        <td><small class="text-muted font-mono font-size-12">7 Periods + 2 Lab Blocks</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Science Core</span></td>
        <td><small class="text-muted">70 Theory : 30 Practical</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Subject Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SUB-ALC-003</td>
        <td>
          <div class="fw-semibold text-dark">Chemistry (Theory & Practical)</div>
          <small class="text-muted font-size-11">Senior Secondary Core</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Code: 043</span></td>
        <td><small class="text-dark">Class 12 - Science (PCM/B)</small></td>
        <td><small class="text-muted font-mono font-size-12">7 Periods + 2 Lab Blocks</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Science Core</span></td>
        <td><small class="text-muted">70 Theory : 30 Practical</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Subject Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SUB-ALC-004</td>
        <td>
          <div class="fw-semibold text-dark">Computer Science (Python & SQL)</div>
          <small class="text-muted font-size-11">Elective 5th Subject</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Code: 083</span></td>
        <td><small class="text-dark">Class 12 - Science (PCM)</small></td>
        <td><small class="text-muted font-mono font-size-12">6 Periods + 2 Lab Blocks</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Elective Subject</span></td>
        <td><small class="text-muted">70 Theory : 30 Practical</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Subject Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SUB-ALC-005</td>
        <td>
          <div class="fw-semibold text-dark">English Core</div>
          <small class="text-muted font-size-11">Language & Literature</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Code: 301</span></td>
        <td><small class="text-dark">Class 12 - All Streams</small></td>
        <td><small class="text-muted font-mono font-size-12">5 Periods / Week</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Compulsory Language</span></td>
        <td><small class="text-muted">80 Theory : 20 ASL Pract</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Subject Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SUB-ALC-006</td>
        <td>
          <div class="fw-semibold text-dark">Accountancy</div>
          <small class="text-muted font-size-11">Financial & Corporate</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Code: 055</span></td>
        <td><small class="text-dark">Class 12 - Commerce</small></td>
        <td><small class="text-muted font-mono font-size-12">7 Periods + 1 Project</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Commerce Core</span></td>
        <td><small class="text-muted">80 Theory : 20 Project</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Subject Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SUB-ALC-007</td>
        <td>
          <div class="fw-semibold text-dark">Social Science (Hist/Geo/Civ/Eco)</div>
          <small class="text-muted font-size-11">Integrated Humanities</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Code: 087</span></td>
        <td><small class="text-dark">Class 10 - All Sections</small></td>
        <td><small class="text-muted font-mono font-size-12">6 Periods / Week</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Compulsory Core</span></td>
        <td><small class="text-muted">80 Theory : 20 Portfolio</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Subject Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SUB-ALC-008</td>
        <td>
          <div class="fw-semibold text-dark">Artificial Intelligence (Skill)</div>
          <small class="text-muted font-size-11">CBSE Vocational Elective</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Code: 417</span></td>
        <td><small class="text-dark">Class 10 - All Sections</small></td>
        <td><small class="text-muted font-mono font-size-12">2 Periods + 1 Lab Block</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Skill Elective (6th Sub)</span></td>
        <td><small class="text-muted">50 Theory : 50 Practical</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Subject Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
