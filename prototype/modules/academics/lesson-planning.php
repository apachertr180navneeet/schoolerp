<?php
/**
 * EDUSYS PRO - Lesson Planning
 */
$page_title = "Lesson Planning";
$page_desc = "Dedicated operational interface & records management for Lesson Planning";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'lesson-planning_export.csv')" title="Export Table as CSV">
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
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Syllabus Coverage</h6>
        <div class="kpi-value">74.8% Done</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> CBSE Term 2 On Track</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-journal-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Weekly Periods</h6>
        <div class="kpi-value">560 Periods</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 38 Classrooms Active</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-clock-history"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Lesson Plans Submitted</h6>
        <div class="kpi-value">142 / 148</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> 96% Weekly Compliance</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-file-earmark-ruled-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Proxy Substitutions</h6>
        <div class="kpi-value">3 Active</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> All Classes Covered</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-switch"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search timetable, subject, teacher, class...">
    </div>
    <select class="form-select" style="max-width: 200px;">
      <option selected>All Grades</option>
      <option >Class 12 - Senior Sec</option>
      <option >Class 11 - Senior Sec</option>
      <option >Class 10 - Secondary</option>
      <option >Class 9 - Secondary</option>
      <option >Classes 6-8 - Middle</option>
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
        <th>Slot / Lesson Code</th>
        <th>Subject & Curriculum Code</th>
        <th>Grade & Section</th>
        <th>Assigned Faculty</th>
        <th>Classroom / Lab</th>
        <th>Period Time Slot</th>
        <th>Weekly Sessions</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TT-10A-01</td>
        <td>
          <div class="fw-semibold text-dark">Mathematics (041)</div>
          <small class="text-muted font-size-11">Chapter 8: Trigo</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">Mr. S. K. Rastogi</small></td>
        <td><small class="text-muted font-mono font-size-12">Room 304, Block B</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Period 1 (07:45–08:30)</span></td>
        <td><small class="text-muted">6 Periods / Wk</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lesson Planning')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TT-10A-02</td>
        <td>
          <div class="fw-semibold text-dark">Science (086)</div>
          <small class="text-muted font-size-11">Chapter 4: Carbon</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">Mr. Vikram Rathore</small></td>
        <td><small class="text-muted font-mono font-size-12">Physics Lab 1</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Period 2 (08:30–09:15)</span></td>
        <td><small class="text-muted">6 Periods / Wk</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lesson Planning')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TT-10A-03</td>
        <td>
          <div class="fw-semibold text-dark">English Core (301)</div>
          <small class="text-muted font-size-11">First Flight: Prose</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">Mrs. Priya Nambiar</small></td>
        <td><small class="text-muted font-mono font-size-12">Room 304, Block B</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Period 3 (09:15–10:00)</span></td>
        <td><small class="text-muted">5 Periods / Wk</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lesson Planning')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TT-12A-01</td>
        <td>
          <div class="fw-semibold text-dark">Physics (042)</div>
          <small class="text-muted font-size-11">Wave Optics</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science A</span></td>
        <td><small class="text-dark">Mr. Vikram Rathore</small></td>
        <td><small class="text-muted font-mono font-size-12">Room 401, Block C</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Period 1 (07:45–08:30)</span></td>
        <td><small class="text-muted">7 Periods / Wk</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lesson Planning')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TT-12A-02</td>
        <td>
          <div class="fw-semibold text-dark">Chemistry (043)</div>
          <small class="text-muted font-size-11">Electrochemistry</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science A</span></td>
        <td><small class="text-dark">Dr. Anuj Jha</small></td>
        <td><small class="text-muted font-mono font-size-12">Chemistry Lab 2</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Period 2 (08:30–09:15)</span></td>
        <td><small class="text-muted">7 Periods / Wk</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lesson Planning')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TT-12C-01</td>
        <td>
          <div class="fw-semibold text-dark">Accountancy (055)</div>
          <small class="text-muted font-size-11">Partnership Dissolution</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Commerce</span></td>
        <td><small class="text-dark">Mr. M. K. Aggarwal</small></td>
        <td><small class="text-muted font-mono font-size-12">Room 403, Block C</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Period 1 (07:45–08:30)</span></td>
        <td><small class="text-muted">7 Periods / Wk</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lesson Planning')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TT-10B-04</td>
        <td>
          <div class="fw-semibold text-dark">Social Science (087)</div>
          <small class="text-muted font-size-11">Nationalism in India</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">Mrs. Rashmi Sen</small></td>
        <td><small class="text-muted font-mono font-size-12">Room 305, Block B</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Period 4 (10:15–11:00)</span></td>
        <td><small class="text-muted">5 Periods / Wk</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lesson Planning')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TT-09A-03</td>
        <td>
          <div class="fw-semibold text-dark">Artificial Intelligence (843)</div>
          <small class="text-muted font-size-11">Python Data Science</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Section A</span></td>
        <td><small class="text-dark">Mr. Rohit Ganguly</small></td>
        <td><small class="text-muted font-mono font-size-12">AI & Robotics Lab</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Period 3 (09:15–10:00)</span></td>
        <td><small class="text-muted">3 Periods / Wk</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
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


<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
