<?php
/**
 * EDUSYS PRO - RE-ADMISSIONS
 * Dedicated operational interface & records management for Re-admissions
 */
$page_title = "Re-admissions";
$page_desc = "Student reinstatement requests, academic gap year approvals, and returning scholar registrations";
$active_module = "admissions";
$active_submodule = "re-admissions.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/admissions/dashboard.php'); ?>">Admission Management</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-arrow-repeat text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 're-admissions_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-arrow-repeat me-1"></i> Process Re-Admission
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Re-admission Files</h6>
        <div class="kpi-value">18 Cases</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Returning Students</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-arrow-repeat"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Approved & Rejoined</h6>
        <div class="kpi-value">14 Scholars</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Academic Clearances Done</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Gap Year Medical</h6>
        <div class="kpi-value">3 Cases</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Pediatric Clearances</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-hospital"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Under Scrutiny</h6>
        <div class="kpi-value">4 Cases</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Disciplinary / Fee Review</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-hourglass-split"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search case #, student name, former scholar ID...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Reasons</option>
      <option >Medical Leave Gap</option>
      <option >Parent Foreign Relocation Return</option>
      <option >Academic Performance Recovery</option>
      <option >Financial Hardship Resumption</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Sanctioned & Re-enrolled</option>
      <option >Academic Scrutiny</option>
      <option >Fee Clearance Due</option>
      <option >Declined</option>
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
        <th>Case File #</th>
        <th>Student Full Name</th>
        <th>Target Grade</th>
        <th>Former Scholar ID</th>
        <th>Reason for Gap</th>
        <th>Academic Clearance</th>
        <th>Sanction Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">READM-2025-018</td>
        <td>
          <div class="fw-semibold text-dark">Karan Johar</div>
          <small class="text-muted font-size-11">Returning Student</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Secondary</span></td>
        <td><small class="text-dark">SCH-2022-8412</small></td>
        <td><small class="text-muted font-mono font-size-12">Family Relocation from Dubai</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Diagnostic Passed (84%)</span></td>
        <td><small class="text-muted">28 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Re-enrolled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Re-admissions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">READM-2025-017</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Saxena</div>
          <small class="text-muted font-size-11">Medical Gap Return</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 7 - Middle</span></td>
        <td><small class="text-dark">SCH-2021-4921</small></td>
        <td><small class="text-muted font-mono font-size-12">Medical Recovery (6 Month Gap)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Medical Fitness Verified</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Re-enrolled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Re-admissions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">READM-2025-016</td>
        <td>
          <div class="fw-semibold text-dark">Siddharth Rawat</div>
          <small class="text-muted font-size-11">Academic Recovery</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Commerce</span></td>
        <td><small class="text-dark">SCH-2023-9481</small></td>
        <td><small class="text-muted font-mono font-size-12">Repeat Year for Board Improvement</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Principal Council Approved</span></td>
        <td><small class="text-muted">26 Oct 2024</small></td>
        <td><span class="badge-status badge-pending">Scrutiny</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Re-admissions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">READM-2025-015</td>
        <td>
          <div class="fw-semibold text-dark">Pooja Hegde</div>
          <small class="text-muted font-size-11">Returning Student</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 8 - Middle</span></td>
        <td><small class="text-dark">SCH-2020-1048</small></td>
        <td><small class="text-muted font-mono font-size-12">Parent Deputation in Bengaluru</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Interstate TC Verified</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Re-enrolled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Re-admissions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">READM-2025-014</td>
        <td>
          <div class="fw-semibold text-dark">Varun Dhawan</div>
          <small class="text-muted font-size-11">Sports Leave Gap</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Commerce</span></td>
        <td><small class="text-dark">SCH-2019-3920</small></td>
        <td><small class="text-muted font-mono font-size-12">National Tennis Tour Gap</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Sports Quota Exemption</span></td>
        <td><small class="text-muted">24 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Re-enrolled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Re-admissions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">READM-2025-013</td>
        <td>
          <div class="fw-semibold text-dark">Shraddha Kapoor</div>
          <small class="text-muted font-size-11">Health Leave</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 5 - Primary</span></td>
        <td><small class="text-dark">SCH-2022-1940</small></td>
        <td><small class="text-muted font-mono font-size-12">Prolonged Illness Recovery</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pediatric Clearance Cleared</span></td>
        <td><small class="text-muted">23 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Re-enrolled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Re-admissions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">READM-2025-012</td>
        <td>
          <div class="fw-semibold text-dark">Aditya Roy Kapur</div>
          <small class="text-muted font-size-11">Returning Student</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Secondary</span></td>
        <td><small class="text-dark">SCH-2021-9482</small></td>
        <td><small class="text-muted font-mono font-size-12">Family Overseas Sabbatical</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Assessment Completed</span></td>
        <td><small class="text-muted">22 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Re-enrolled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Re-admissions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">READM-2025-011</td>
        <td>
          <div class="fw-semibold text-dark">Kriti Sanon</div>
          <small class="text-muted font-size-11">Fee Restructure</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Science</span></td>
        <td><small class="text-dark">SCH-2023-1049</small></td>
        <td><small class="text-muted font-mono font-size-12">Financial Hardship Resumption</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Management Concession Cleared</span></td>
        <td><small class="text-muted">21 Oct 2024</small></td>
        <td><span class="badge-status badge-pending">Fee Clearance</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Re-admissions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
