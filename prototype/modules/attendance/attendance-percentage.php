<?php
/**
 * EDUSYS PRO - ATTENDANCE PERCENTAGE CALCULATOR
 * Dedicated operational interface & records management for Attendance Percentage Calculator
 */
$page_title = "Attendance Percentage Calculator";
$page_desc = "Dynamic formula engine: Aggregating Term 1 & Term 2 days, medical condonation adjustments, and board admit clearances";
$active_module = "attendance";
$active_submodule = "attendance-percentage.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/attendance/dashboard.php'); ?>">Attendance Management</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-calculator-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'attendance-percentage_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-cpu-fill me-1"></i> Recalculate All
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Formula Standard</h6>
        <div class="kpi-value">CBSE Rule 14</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Days Present / Total Working</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calculator"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Eligible for Boards</h6>
        <div class="kpi-value">414 of 420 (98.6%)</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Class 10 & 12 Confirmed</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-circle"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Condonation Allowed</h6>
        <div class="kpi-value">Max 15% Relief</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Medical & Sports Authorized</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-patch-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Debarment Threshold</h6>
        <div class="kpi-value">Strictly <60%</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Zero Tolerance Under Board</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-slash-circle-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search student, admission #, class, percentage...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Grades</option>
      <option >Class 10 - Secondary</option>
      <option >Class 12 - Senior Secondary</option>
      <option >Class 9 - Secondary</option>
      <option >Class 11 - Senior Secondary</option>
      <option >Classes 6-8 - Middle Wing</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Board Eligible (>=75%)</option>
      <option >Eligible with Medical Relief</option>
      <option >Debarred (<60%)</option>
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
        <th>Scholar ID</th>
        <th>Student Full Name</th>
        <th>Class & Section</th>
        <th>Term 1 Attendance</th>
        <th>Term 2 Attendance</th>
        <th>Cumulative Total Days</th>
        <th>Final Percentage</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-001</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Roll #01</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">96.4% (81/84)</small></td>
        <td><small class="text-muted font-mono font-size-12">96.4% (81/84)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">162 of 168 Days</span></td>
        <td><small class="text-muted">96.4%</small></td>
        <td><span class="badge-status badge-active">Board Eligible</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Attendance Percentage Calculator')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-002</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Roll #02</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">98.8% (83/84)</small></td>
        <td><small class="text-muted font-mono font-size-12">98.8% (83/84)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">166 of 168 Days</span></td>
        <td><small class="text-muted">98.8%</small></td>
        <td><span class="badge-status badge-active">Board Eligible</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Attendance Percentage Calculator')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-003</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Roll #01</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">94.0% (79/84)</small></td>
        <td><small class="text-muted font-mono font-size-12">95.2% (80/84)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">159 of 168 Days</span></td>
        <td><small class="text-muted">94.6%</small></td>
        <td><span class="badge-status badge-active">Board Eligible</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Attendance Percentage Calculator')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-004</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Roll #02</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">91.6% (77/84)</small></td>
        <td><small class="text-muted font-mono font-size-12">92.8% (78/84)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">155 of 168 Days</span></td>
        <td><small class="text-muted">92.2%</small></td>
        <td><span class="badge-status badge-active">Board Eligible</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Attendance Percentage Calculator')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-005</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Roll #05</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-dark">85.7% (72/84)</small></td>
        <td><small class="text-muted font-mono font-size-12">88.0% (74/84)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">146 of 168 Days</span></td>
        <td><small class="text-muted">86.9%</small></td>
        <td><span class="badge-status badge-active">Board Eligible</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Attendance Percentage Calculator')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-006</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Roll #08</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCB)</span></td>
        <td><small class="text-dark">84.5% (71/84)</small></td>
        <td><small class="text-muted font-mono font-size-12">85.7% (72/84)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">143 of 168 Days</span></td>
        <td><small class="text-muted">85.1%</small></td>
        <td><span class="badge-status badge-active">Board Eligible</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Attendance Percentage Calculator')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-007</td>
        <td>
          <div class="fw-semibold text-dark">Varun Dhawan</div>
          <small class="text-muted font-size-11">Roll #14</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Commerce</span></td>
        <td><small class="text-dark">71.4% (60/84)</small></td>
        <td><small class="text-muted font-mono font-size-12">73.8% (62/84)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">122 (+16 OD Days)</span></td>
        <td><small class="text-muted">82.1% (Relief)</small></td>
        <td><span class="badge-status badge-active">Board Eligible (Sports Relief)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Attendance Percentage Calculator')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-008</td>
        <td>
          <div class="fw-semibold text-dark">Karan Saxena</div>
          <small class="text-muted font-size-11">Roll #24</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Section C</span></td>
        <td><small class="text-dark">69.0% (58/84)</small></td>
        <td><small class="text-muted font-mono font-size-12">67.8% (57/84)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">115 of 168 Days</span></td>
        <td><small class="text-muted">68.4%</small></td>
        <td><span class="badge-status badge-inactive">Risk (<75%)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Attendance Percentage Calculator')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
