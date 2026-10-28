<?php
/**
 * EDUSYS PRO - PREVIOUS SCHOOL RECORDS
 * Dedicated operational interface & records management for Previous School Records
 */
$page_title = "Previous School Records";
$page_desc = "Prior institutional track, transfer certificate verification, board affiliations, and scholastic transcripts";
$active_module = "students";
$active_submodule = "previous-school.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/students/dashboard.php'); ?>">Student Information System</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-building-up text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'previous-school_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Log Previous Record
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Transferred Scholars</h6>
        <div class="kpi-value">412 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Interstate / Intra-City</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-building-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Counter-Signed TCs</h6>
        <div class="kpi-value">404 Verified</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> CBSE / State Dept Clear</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-patch-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Board Conversions</h6>
        <div class="kpi-value">68 Scholars</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> ICSE & IB to CBSE</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-arrow-left-right"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>TC Pending Original</h6>
        <div class="kpi-value">8 In Process</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Within 30-Day Window</div>
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
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search student, previous school, board, TC number...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Previous Boards</option>
      <option >CBSE Affiliated School</option>
      <option >ICSE / CISCE Board</option>
      <option >State Education Board</option>
      <option >International IB / Cambridge</option>
      <option >Army Public School (AWES)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >TC Verified & Sealed</option>
      <option >Counter-Sign Awaited</option>
      <option >Provisional Admission</option>
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
        <th>Admission #</th>
        <th>Student Full Name</th>
        <th>Previous School Name</th>
        <th>Affiliation Board</th>
        <th>Last Grade Passed</th>
        <th>TC Serial #</th>
        <th>Marks / CGPA</th>
        <th>TC Verification</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-001</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Class 10-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Delhi Public School, R.K. Puram</span></td>
        <td><small class="text-dark">CBSE Board</small></td>
        <td><small class="text-muted font-mono font-size-12">Class 9 Passed</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">DPS-RKP-TC-9481</span></td>
        <td><small class="text-muted">92.4% (Grade A1)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Previous School Records')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-002</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Class 10-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">The Mother's International School</span></td>
        <td><small class="text-dark">CBSE Board</small></td>
        <td><small class="text-muted font-mono font-size-12">Class 9 Passed</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">MIS-TC-2024-104</span></td>
        <td><small class="text-muted">94.8% (Grade A1)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Previous School Records')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-003</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Class 10-B</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Army Public School, Dhaula Kuan</span></td>
        <td><small class="text-dark">CBSE Board</small></td>
        <td><small class="text-muted font-mono font-size-12">Class 9 Passed</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">APS-DK-2024-84</span></td>
        <td><small class="text-muted">88.6% (Grade A2)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Previous School Records')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-004</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Class 10-B</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Sanskriti School, Chanakyapuri</span></td>
        <td><small class="text-dark">CBSE Board</small></td>
        <td><small class="text-muted font-mono font-size-12">Class 9 Passed</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">SAN-2024-TC-112</span></td>
        <td><small class="text-muted">91.2% (Grade A1)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Previous School Records')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-005</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Class 12 - PCM</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Modern School, Barakhamba Road</span></td>
        <td><small class="text-dark">CBSE Board</small></td>
        <td><small class="text-muted font-mono font-size-12">Class 10 Board Passed</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">MS-TC-2023-408</span></td>
        <td><small class="text-muted">95.6% (CBSE Board)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Previous School Records')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-006</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Class 12 - PCB</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">St. Columba's School</span></td>
        <td><small class="text-dark">CBSE Board</small></td>
        <td><small class="text-muted font-mono font-size-12">Class 10 Board Passed</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">SCS-2023-TC-219</span></td>
        <td><small class="text-muted">93.4% (CBSE Board)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Previous School Records')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-007</td>
        <td>
          <div class="fw-semibold text-dark">Meera Nambiar</div>
          <small class="text-muted font-size-11">Class 8-C</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">The Shri Ram School, Moulsari</span></td>
        <td><small class="text-dark">ICSE Board</small></td>
        <td><small class="text-muted font-mono font-size-12">Class 7 Passed</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">TSRS-2024-TC-88</span></td>
        <td><small class="text-muted">96.0% (Grade A+)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Previous School Records')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-008</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Malhotra</div>
          <small class="text-muted font-size-11">Class 5-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Presidium School, Gurugram</span></td>
        <td><small class="text-dark">CBSE Board</small></td>
        <td><small class="text-muted font-mono font-size-12">Class 4 Passed</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">PS-TC-2024-041</span></td>
        <td><small class="text-muted">90.2% (Grade A1)</small></td>
        <td><span class="badge-status badge-pending">Counter-Signed Pending</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Previous School Records')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
