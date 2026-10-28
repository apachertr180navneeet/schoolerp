<?php
/**
 * EDUSYS PRO - TEACHER ALLOCATION
 * Dedicated operational interface & records management for Teacher Allocation
 */
$page_title = "Teacher Allocation";
$page_desc = "Workload balancing, period caps (Max 36 periods/week), subject specialization mappings, and faculty schedules";
$active_module = "academics";
$active_submodule = "teacher-allocation.php";
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
    <h1><i class="bi bi-person-workspace text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'teacher-allocation_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-person-plus-fill me-1"></i> Assign Faculty Subject
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Faculty Members</h6>
        <div class="kpi-value">112 Teachers</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Workload Assigned</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Average Workload</h6>
        <div class="kpi-value">30.4 Periods / Wk</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Well Below 36 Cap (CBSE)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-speedometer2"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>PGT Faculty (Senior)</h6>
        <div class="kpi-value">28 Masters</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Subject Specialists</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-mortarboard-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>TGT Faculty (Middle)</h6>
        <div class="kpi-value">42 Teachers</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Graduates with B.Ed</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-badge"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search teacher name, designation, subject, class...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Departments</option>
      <option >Science Department (PCM/B)</option>
      <option >Mathematics Department</option>
      <option >Commerce & Economics</option>
      <option >Humanities & Social Science</option>
      <option >Languages (English/Hindi/Sanskrit)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Optimal Workload (<32)</option>
      <option >Near Capacity (33-36)</option>
      <option >Over Capacity (>36)</option>
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
        <th>Workload ID</th>
        <th>Faculty Full Name</th>
        <th>Designation</th>
        <th>Assigned Subject</th>
        <th>Classes Allotted</th>
        <th>Weekly Periods (Max 36)</th>
        <th>Workload %</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WKL-FAC-001</td>
        <td>
          <div class="fw-semibold text-dark">Dr. K. L. Sharma</div>
          <small class="text-muted font-size-11">Ph.D Physics</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">PGT Senior Physics</span></td>
        <td><small class="text-dark">Physics (042)</small></td>
        <td><small class="text-muted font-mono font-size-12">Class 12-PCM, 12-PCB, 11-PCM</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">30 Periods (incl 6 Lab)</span></td>
        <td><small class="text-muted">83.3% Optimal</small></td>
        <td><span class="badge-status badge-active">Optimal</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WKL-FAC-002</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Sunita Kaul</div>
          <small class="text-muted font-size-11">M.Sc, M.Ed Maths</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">PGT Mathematics</span></td>
        <td><small class="text-dark">Mathematics (041)</small></td>
        <td><small class="text-muted font-mono font-size-12">Class 10-A, 10-B, 12-PCM</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">32 Periods / Week</span></td>
        <td><small class="text-muted">88.8% Optimal</small></td>
        <td><span class="badge-status badge-active">Optimal</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WKL-FAC-003</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Vikram Rathore</div>
          <small class="text-muted font-size-11">M.Sc Chemistry, NET</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">PGT Chemistry</span></td>
        <td><small class="text-dark">Chemistry (043)</small></td>
        <td><small class="text-muted font-mono font-size-12">Class 12-PCM, 12-PCB, 11-PCB</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">30 Periods (incl 6 Lab)</span></td>
        <td><small class="text-muted">83.3% Optimal</small></td>
        <td><span class="badge-status badge-active">Optimal</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WKL-FAC-004</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Radhika Iyer</div>
          <small class="text-muted font-size-11">M.Sc Botany, B.Ed</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">PGT Biology</span></td>
        <td><small class="text-dark">Biology (044)</small></td>
        <td><small class="text-muted font-mono font-size-12">Class 12-PCB, 11-PCB, 10-A</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">28 Periods (incl 4 Lab)</span></td>
        <td><small class="text-muted">77.7% Optimal</small></td>
        <td><span class="badge-status badge-active">Optimal</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WKL-FAC-005</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Deepak Rawat</div>
          <small class="text-muted font-size-11">M.A English, B.Ed</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">PGT English</span></td>
        <td><small class="text-dark">English Core (301)</small></td>
        <td><small class="text-muted font-mono font-size-12">Class 12-PCM, 12-PCB, 12-Comm</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">28 Periods / Week</span></td>
        <td><small class="text-muted">77.7% Optimal</small></td>
        <td><span class="badge-status badge-active">Optimal</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WKL-FAC-006</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Shalini Verma</div>
          <small class="text-muted font-size-11">M.A Hist, B.Ed</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">TGT Social Science</span></td>
        <td><small class="text-dark">Social Science (087)</small></td>
        <td><small class="text-muted font-mono font-size-12">Class 10-A, 9-B, 8-C</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">32 Periods / Week</span></td>
        <td><small class="text-muted">88.8% Optimal</small></td>
        <td><span class="badge-status badge-active">Optimal</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WKL-FAC-007</td>
        <td>
          <div class="fw-semibold text-dark">Mr. M. K. Chawla</div>
          <small class="text-muted font-size-11">M.Com, FCA</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">PGT Commerce</span></td>
        <td><small class="text-dark">Accountancy (055)</small></td>
        <td><small class="text-muted font-mono font-size-12">Class 12-Comm, 11-Comm</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">26 Periods / Week</span></td>
        <td><small class="text-muted">72.2% Optimal</small></td>
        <td><span class="badge-status badge-active">Optimal</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WKL-FAC-008</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Kunal Bansal</div>
          <small class="text-muted font-size-11">B.Tech CS, MCA</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">PGT Computer Science</span></td>
        <td><small class="text-dark">Computer Science (083)</small></td>
        <td><small class="text-muted font-mono font-size-12">Class 12-PCM, 11-PCM, 10-AI</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">30 Periods (incl 8 Lab)</span></td>
        <td><small class="text-muted">83.3% Optimal</small></td>
        <td><span class="badge-status badge-active">Optimal</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
