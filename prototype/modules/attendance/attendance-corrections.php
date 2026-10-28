<?php
/**
 * EDUSYS PRO - ATTENDANCE CORRECTIONS
 * Dedicated operational interface & records management for Attendance Corrections
 */
$page_title = "Attendance Corrections";
$page_desc = "Audit reconciliation desk: Remedying missed biometric punches, bus delay rectifications, and infirmary adjustments";
$active_module = "attendance";
$active_submodule = "attendance-corrections.php";
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
    <h1><i class="bi bi-pencil-square text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'attendance-corrections_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-pencil me-1"></i> Request Correction
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Corrections Filed</h6>
        <div class="kpi-value">8 Requests</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Current Academic Month</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-pencil-square"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Audited & Approved</h6>
        <div class="kpi-value">7 Approved</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Evidence Verified by Admin</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-circle"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Bus Delay Cleared</h6>
        <div class="kpi-value">100% Rectified</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Marked Present instead of Late</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-bus-front-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Audit Trail Integrity</h6>
        <div class="kpi-value">100% Immutable</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Original vs Corrected Logged</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-lock-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search correction ref #, student, staff, reason...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Correction Types</option>
      <option >Bus Route #12 Traffic Delay</option>
      <option >Missed RFID Tap at Gate</option>
      <option >Infirmary Slip Medical Adjustment</option>
      <option >Sports / Competition Duty Present</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Corrected & Reconciled</option>
      <option >Under Admin Audit</option>
      <option >Rejected</option>
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
        <th>Correction Req #</th>
        <th>Student / Staff Name</th>
        <th>Class / Dept</th>
        <th>Date of Record</th>
        <th>Original Status</th>
        <th>Requested Correction</th>
        <th>Reason & Evidence</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">COR-2024-008</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Singhania (Student)</div>
          <small class="text-muted font-size-11">Adm #1048</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 1 - Nursery</span></td>
        <td><small class="text-dark">28 Oct 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Late Entry (07:55 AM)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mark Present (Excused)</span></td>
        <td><small class="text-muted">School Bus #12 Traffic Breakdown Verified</small></td>
        <td><span class="badge-status badge-active">Corrected</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Attendance Corrections')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">COR-2024-007</td>
        <td>
          <div class="fw-semibold text-dark">Devansh Bhardwaj (Student)</div>
          <small class="text-muted font-size-11">Adm #1046</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - PCM</span></td>
        <td><small class="text-dark">28 Oct 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Late Entry (07:55 AM)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mark Present (Excused)</span></td>
        <td><small class="text-muted">School Bus #12 Traffic Breakdown Verified</small></td>
        <td><span class="badge-status badge-active">Corrected</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Attendance Corrections')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">COR-2024-006</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Deshpande (Student)</div>
          <small class="text-muted font-size-11">Adm #1045</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Section B</span></td>
        <td><small class="text-dark">28 Oct 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Late Entry (07:55 AM)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mark Present (Excused)</span></td>
        <td><small class="text-muted">School Bus #12 Traffic Breakdown Verified</small></td>
        <td><span class="badge-status badge-active">Corrected</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Attendance Corrections')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">COR-2024-005</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Mukherjee (Student)</div>
          <small class="text-muted font-size-11">Adm #1043</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 4 - Primary</span></td>
        <td><small class="text-dark">28 Oct 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Late Entry (07:55 AM)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mark Present (Excused)</span></td>
        <td><small class="text-muted">School Bus #12 Traffic Breakdown Verified</small></td>
        <td><span class="badge-status badge-active">Corrected</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Attendance Corrections')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">COR-2024-004</td>
        <td>
          <div class="fw-semibold text-dark">Riyaan Kapoor (Student)</div>
          <small class="text-muted font-size-11">Adm #1042</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 1 - Prep</span></td>
        <td><small class="text-dark">28 Oct 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Late Entry (07:55 AM)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mark Present (Excused)</span></td>
        <td><small class="text-muted">School Bus #12 Traffic Breakdown Verified</small></td>
        <td><span class="badge-status badge-active">Corrected</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Attendance Corrections')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">COR-2024-003</td>
        <td>
          <div class="fw-semibold text-dark">Dr. K. L. Sharma (Faculty)</div>
          <small class="text-muted font-size-11">Emp #FAC-001</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Science (Physics)</span></td>
        <td><small class="text-dark">25 Oct 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Missed Evening Punch Out</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mark Present Full Day</span></td>
        <td><small class="text-muted">CCTV Footages Confirmed 03:45 PM Exit</small></td>
        <td><span class="badge-status badge-active">Corrected</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Attendance Corrections')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">COR-2024-002</td>
        <td>
          <div class="fw-semibold text-dark">Prisha Nair (Student)</div>
          <small class="text-muted font-size-11">Adm #014</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Commerce</span></td>
        <td><small class="text-dark">24 Oct 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Absent (Period 4)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mark Present (Infirmary)</span></td>
        <td><small class="text-muted">Infirmary Log #INF-491 Verified</small></td>
        <td><span class="badge-status badge-active">Corrected</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Attendance Corrections')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">COR-2024-001</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh (Student)</div>
          <small class="text-muted font-size-11">Adm #003</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">22 Oct 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Absent Full Day</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mark Present on OD</span></td>
        <td><small class="text-muted">Zonal Athletics Meet Participation Cert</small></td>
        <td><span class="badge-status badge-active">Corrected</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Attendance Corrections')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
