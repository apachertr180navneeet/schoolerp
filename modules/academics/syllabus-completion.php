<?php
/**
 * EDUSYS PRO - SYLLABUS COMPLETION
 * Dedicated operational interface & records management for Syllabus Completion
 */
$page_title = "Syllabus Completion";
$page_desc = "Term-wise teaching velocity audits, department progress benchmarks, and pre-board completion deadlines";
$active_module = "academics";
$active_submodule = "syllabus-completion.php";
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
    <h1><i class="bi bi-graph-up-arrow text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'syllabus-completion_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-check-all me-1"></i> Update Completion Audit
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Average Completion</h6>
        <div class="kpi-value">76.4% Completed</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Exceeds Oct Target (75%)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-graph-up"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Target Board Deadline</h6>
        <div class="kpi-value">15 Jan 2025</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Full Revision Window (45 Days)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-event"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>On-Track Courses</h6>
        <div class="kpi-value">44 of 48 Subjects</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Green Track Status</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Pace Adjustment</h6>
        <div class="kpi-value">4 Subjects Alert</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Extra Classes Scheduled</div>
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
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search audit code, subject, class, faculty...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Departments</option>
      <option >Science Department (PCM/B)</option>
      <option >Mathematics Department</option>
      <option >Commerce Department</option>
      <option >Humanities Department</option>
      <option >Languages Department</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >On Track (>75%)</option>
      <option >Target Met</option>
      <option >Pace Alert (<70%)</option>
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
        <th>Audit Code</th>
        <th>Subject & Code</th>
        <th>Class & Section</th>
        <th>Faculty Incharge</th>
        <th>Chapters Planned</th>
        <th>Chapters Completed</th>
        <th>Progress %</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">AUD-SYL-01</td>
        <td>
          <div class="fw-semibold text-dark">Mathematics (041)</div>
          <small class="text-muted font-size-11">Target Finish: 10 Jan</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">Mrs. Sunita Kaul (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">14 Chapters</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">11 Chapters Done</span></td>
        <td><small class="text-muted">78.5% Complete</small></td>
        <td><span class="badge-status badge-active">On Track</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Syllabus Completion')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">AUD-SYL-02</td>
        <td>
          <div class="fw-semibold text-dark">Physics (042)</div>
          <small class="text-muted font-size-11">Target Finish: 05 Jan</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-dark">Dr. K. L. Sharma (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">14 Units</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">11 Units Done</span></td>
        <td><small class="text-muted">78.5% Complete</small></td>
        <td><span class="badge-status badge-active">On Track</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Syllabus Completion')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">AUD-SYL-03</td>
        <td>
          <div class="fw-semibold text-dark">Chemistry (043)</div>
          <small class="text-muted font-size-11">Target Finish: 12 Jan</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM/B)</span></td>
        <td><small class="text-dark">Mr. Vikram Rathore (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">10 Major Units</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">7.5 Units Done</span></td>
        <td><small class="text-muted">75.0% Complete</small></td>
        <td><span class="badge-status badge-active">On Track</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Syllabus Completion')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">AUD-SYL-04</td>
        <td>
          <div class="fw-semibold text-dark">Biology (044)</div>
          <small class="text-muted font-size-11">Target Finish: 08 Jan</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCB)</span></td>
        <td><small class="text-dark">Mrs. Radhika Iyer (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">13 Chapters</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">10.5 Chapters Done</span></td>
        <td><small class="text-muted">80.7% Complete</small></td>
        <td><span class="badge-status badge-active">On Track</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Syllabus Completion')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">AUD-SYL-05</td>
        <td>
          <div class="fw-semibold text-dark">English Core (301)</div>
          <small class="text-muted font-size-11">Target Finish: 20 Dec</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - All Streams</span></td>
        <td><small class="text-dark">Mr. Deepak Rawat (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">Full Syllabus</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">82% Syllabus Done</span></td>
        <td><small class="text-muted">82.0% Complete</small></td>
        <td><span class="badge-status badge-active">On Track</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Syllabus Completion')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">AUD-SYL-06</td>
        <td>
          <div class="fw-semibold text-dark">Computer Science (083)</div>
          <small class="text-muted font-size-11">Target Finish: 10 Jan</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-dark">Mr. Kunal Bansal (MCA)</small></td>
        <td><small class="text-muted font-mono font-size-12">3 Major Units</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">2.5 Units Done</span></td>
        <td><small class="text-muted">83.3% Complete</small></td>
        <td><span class="badge-status badge-active">On Track</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Syllabus Completion')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">AUD-SYL-07</td>
        <td>
          <div class="fw-semibold text-dark">Social Science (087)</div>
          <small class="text-muted font-size-11">Target Finish: 15 Jan</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">Mrs. Shalini Verma (TGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">21 Chapters</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">15 Chapters Done</span></td>
        <td><small class="text-muted">71.4% (Pace Alert)</small></td>
        <td><span class="badge-status badge-pending">Pace Alert</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Syllabus Completion')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">AUD-SYL-08</td>
        <td>
          <div class="fw-semibold text-dark">Accountancy (055)</div>
          <small class="text-muted font-size-11">Target Finish: 05 Jan</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Commerce</span></td>
        <td><small class="text-dark">Mr. M. K. Chawla (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">9 Units</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">7.2 Units Done</span></td>
        <td><small class="text-muted">80.0% Complete</small></td>
        <td><span class="badge-status badge-active">On Track</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Syllabus Completion')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
