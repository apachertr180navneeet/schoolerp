<?php
/**
 * EDUSYS PRO - LOW ATTENDANCE ALERTS (<75%)
 * Dedicated operational interface & records management for Low Attendance Alerts (<75%)
 */
$page_title = "Low Attendance Alerts (<75%)";
$page_desc = "Statutory CBSE Bye-Law 14(i) board examination debarment alerts, shortfall calculation, and legal warning notices";
$active_module = "attendance";
$active_submodule = "low-attendance-alerts.php";
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
    <h1><i class="bi bi-exclamation-triangle-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'low-attendance-alerts_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-envelope-exclamation-fill me-1"></i> Issue Board Warning
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Students < 75%</h6>
        <div class="kpi-value">14 Scholars</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 0.49% of Total Enrollment</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-exclamation-triangle-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Board Class Risk (10/12)</h6>
        <div class="kpi-value">6 Candidates</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> CBSE Roll Debarment Risk</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-slash-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Formal Notices Issued</h6>
        <div class="kpi-value">14 Registered Post</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Parent Signed Acknowledgement</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-envelope-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Days Needed to 75%</h6>
        <div class="kpi-value">Avg 12 Days</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Mandatory Consecutive Attendance</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-check"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search notice ref #, student name, class, percentage...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Risk Cohorts</option>
      <option >Senior Secondary Board Risk (Class 12)</option>
      <option >Secondary Board Risk (Class 10)</option>
      <option >Middle Wing Risk (Classes 6-8)</option>
      <option >Primary Wing Risk (Classes 1-5)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Legal Notice Dispatched</option>
      <option >Parent Meeting Completed</option>
      <option >Medical Condonation Filed</option>
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
        <th>Notice Ref #</th>
        <th>Student Full Name</th>
        <th>Grade & Section</th>
        <th>Cumulative Attendance %</th>
        <th>Days Required to 75%</th>
        <th>CBSE Board Exam Risk</th>
        <th>Parent Warning Notice</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WRN-CBSE-001</td>
        <td>
          <div class="fw-semibold text-dark">Karan Saxena</div>
          <small class="text-muted font-size-11">Adm #2491</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Section C</span></td>
        <td><small class="text-dark">68.4% (Shortfall)</small></td>
        <td><small class="text-muted font-mono font-size-12">14 Consecutive Days</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Class 9 Annual Reg Risk</span></td>
        <td><small class="text-muted">Notice Dispatched (20 Oct)</small></td>
        <td><span class="badge-status badge-inactive">Notice Sent</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Low Attendance Alerts (<75%)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WRN-CBSE-002</td>
        <td>
          <div class="fw-semibold text-dark">Aakash Verma</div>
          <small class="text-muted font-size-11">Adm #1920</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 8 - Section B</span></td>
        <td><small class="text-dark">71.2% (Shortfall)</small></td>
        <td><small class="text-muted font-mono font-size-12">8 Consecutive Days</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Middle Promotion Risk</span></td>
        <td><small class="text-muted">Notice Dispatched (22 Oct)</small></td>
        <td><span class="badge-status badge-inactive">Notice Sent</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Low Attendance Alerts (<75%)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WRN-CBSE-003</td>
        <td>
          <div class="fw-semibold text-dark">Varun Dhawan</div>
          <small class="text-muted font-size-11">Adm #3920</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Commerce</span></td>
        <td><small class="text-dark">72.4% (Shortfall)</small></td>
        <td><small class="text-muted font-mono font-size-12">6 Consecutive Days</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Board Admit Card Risk</span></td>
        <td><small class="text-muted">Sports Condonation Applied</small></td>
        <td><span class="badge-status badge-pending">Exemption Pending</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Low Attendance Alerts (<75%)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WRN-CBSE-004</td>
        <td>
          <div class="fw-semibold text-dark">Rohit Bansal</div>
          <small class="text-muted font-size-11">Adm #1842</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">73.0% (Shortfall)</small></td>
        <td><small class="text-muted font-mono font-size-12">5 Consecutive Days</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Board Admit Card Risk</span></td>
        <td><small class="text-muted">Notice Dispatched (25 Oct)</small></td>
        <td><span class="badge-status badge-inactive">Notice Sent</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Low Attendance Alerts (<75%)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WRN-CBSE-005</td>
        <td>
          <div class="fw-semibold text-dark">Pari Chawla</div>
          <small class="text-muted font-size-11">Adm #2491</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 6 - Section A</span></td>
        <td><small class="text-dark">73.8% (Shortfall)</small></td>
        <td><small class="text-muted font-mono font-size-12">3 Consecutive Days</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Low Attendance Flag</span></td>
        <td><small class="text-muted">Parent Meeting Held (26 Oct)</small></td>
        <td><span class="badge-status badge-active">Counselled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Low Attendance Alerts (<75%)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WRN-CBSE-006</td>
        <td>
          <div class="fw-semibold text-dark">Devansh Bhardwaj</div>
          <small class="text-muted font-size-11">Adm #1046</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - PCM</span></td>
        <td><small class="text-dark">74.1% (Near Cutoff)</small></td>
        <td><small class="text-muted font-mono font-size-12">2 Consecutive Days</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Borderline Eligibility</span></td>
        <td><small class="text-muted">SMS Warning Intimated</small></td>
        <td><span class="badge-status badge-pending">Borderline</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Low Attendance Alerts (<75%)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WRN-CBSE-007</td>
        <td>
          <div class="fw-semibold text-dark">Tanmay Bansal</div>
          <small class="text-muted font-size-11">Adm #2810</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Section B</span></td>
        <td><small class="text-dark">74.4% (Near Cutoff)</small></td>
        <td><small class="text-muted font-mono font-size-12">2 Consecutive Days</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Borderline Eligibility</span></td>
        <td><small class="text-muted">SMS Warning Intimated</small></td>
        <td><span class="badge-status badge-pending">Borderline</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Low Attendance Alerts (<75%)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WRN-CBSE-008</td>
        <td>
          <div class="fw-semibold text-dark">Gauri Joshi</div>
          <small class="text-muted font-size-11">Adm #1980</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 7 - Section C</span></td>
        <td><small class="text-dark">74.6% (Near Cutoff)</small></td>
        <td><small class="text-muted font-mono font-size-12">1 Consecutive Day</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Borderline Eligibility</span></td>
        <td><small class="text-muted">SMS Warning Intimated</small></td>
        <td><span class="badge-status badge-pending">Borderline</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Low Attendance Alerts (<75%)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
