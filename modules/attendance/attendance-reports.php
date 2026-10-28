<?php
/**
 * EDUSYS PRO - ATTENDANCE REPORTS
 * Dedicated operational interface & records management for Attendance Reports
 */
$page_title = "Attendance Reports";
$page_desc = "Statutory board attendance archives, government UDISE+ attendance reconciliations, and trend analytics";
$active_module = "attendance";
$active_submodule = "attendance-reports.php";
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
    <h1><i class="bi bi-bar-chart-line-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'attendance-reports_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" onclick="EduTables.print()">
      <i class="bi bi-file-earmark-pdf me-1"></i> Print / Save PDF
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Standard Reports</h6>
        <div class="kpi-value">16 Formats</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> CBSE & Education Directorate</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-file-earmark-bar-graph-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Board LOC Audit</h6>
        <div class="kpi-value">100% Compliant</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Bye-Law 14(i) Verification</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Monthly Reconciled</h6>
        <div class="kpi-value">100% Synced</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Zero Pending Discrepancy</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-all"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Export Capabilities</h6>
        <div class="kpi-value">PDF & CSV</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Instant Ledger Downloads</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-download"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search report code, title, scope, frequency...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Reporting Categories</option>
      <option >CBSE Statutory Board Reports</option>
      <option >UDISE+ Government Reports</option>
      <option >Monthly Master Attendance Register</option>
      <option >Staff & Faculty Workload Reports</option>
      <option >Chronic Absenteeism Analytics</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Generated & Current</option>
      <option >Scheduled Monthly</option>
      <option >Annual Archive</option>
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
        <th>Report Code</th>
        <th>Report Title & Description</th>
        <th>Reporting Scope</th>
        <th>Data Granularity</th>
        <th>Generated By</th>
        <th>Records Covered</th>
        <th>Last Generated</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-ATT-001</td>
        <td>
          <div class="fw-semibold text-dark">CBSE Statutory Board Attendance Roll (LOC)</div>
          <small class="text-muted font-size-11">Eligibility manifest for Class 10 & 12</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Board Classes 10 & 12</span></td>
        <td><small class="text-dark">Student-wise %</small></td>
        <td><small class="text-muted font-mono font-size-12">Dean Academics</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">420 Candidates</span></td>
        <td><small class="text-muted">Today (08:00 AM)</small></td>
        <td><span class="badge-status badge-active">Live Synced</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', 'attendance-reports_download.csv')" title="Download Report"><i class="bi bi-download"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-ATT-002</td>
        <td>
          <div class="fw-semibold text-dark">UDISE+ Annual Attendance Statement</div>
          <small class="text-muted font-size-11">Ministry of Education National Portal</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Entire School (1-12)</span></td>
        <td><small class="text-dark">Wing & Gender</small></td>
        <td><small class="text-muted font-mono font-size-12">Registrar Office</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">2,840 Students</span></td>
        <td><small class="text-muted">28 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', 'attendance-reports_download.csv')" title="Download Report"><i class="bi bi-download"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-ATT-003</td>
        <td>
          <div class="fw-semibold text-dark">Monthly Master Attendance Ledger (Oct 2024)</div>
          <small class="text-muted font-size-11">Complete student and staff ledger</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Whole Institution</span></td>
        <td><small class="text-dark">Day-wise Roster</small></td>
        <td><small class="text-muted font-mono font-size-12">HR & Attendance Incharge</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">2,986 Individuals</span></td>
        <td><small class="text-muted">28 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Reconciled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', 'attendance-reports_download.csv')" title="Download Report"><i class="bi bi-download"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-ATT-004</td>
        <td>
          <div class="fw-semibold text-dark">Low Attendance Early Warning Statement (<75%)</div>
          <small class="text-muted font-size-11">Legal warning list with shortfall calculation</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 6 to 12</span></td>
        <td><small class="text-dark">Risk Shortfall Days</small></td>
        <td><small class="text-muted font-mono font-size-12">Discipline Council</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">14 Students</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Generated</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', 'attendance-reports_download.csv')" title="Download Report"><i class="bi bi-download"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-ATT-005</td>
        <td>
          <div class="fw-semibold text-dark">Staff & Faculty Workload & Biometric Audit</div>
          <small class="text-muted font-size-11">Punches, late marks & leave reconciliation</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">All Employees (146)</span></td>
        <td><small class="text-dark">Punch In/Out Times</small></td>
        <td><small class="text-muted font-mono font-size-12">Chief HR Officer</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">146 Staff</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Reconciled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', 'attendance-reports_download.csv')" title="Download Report"><i class="bi bi-download"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-ATT-006</td>
        <td>
          <div class="fw-semibold text-dark">Transport Fleet & RFID Gate Sync Log</div>
          <small class="text-muted font-size-11">Vehicle boarding vs main gate cross-check</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Bus Commuters (1,240)</span></td>
        <td><small class="text-dark">GPS & Tap Logs</small></td>
        <td><small class="text-muted font-mono font-size-12">Transport Supervisor</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">18 Buses</span></td>
        <td><small class="text-muted">26 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', 'attendance-reports_download.csv')" title="Download Report"><i class="bi bi-download"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-ATT-007</td>
        <td>
          <div class="fw-semibold text-dark">Medical Leave & Infirmary Clearance Audit</div>
          <small class="text-muted font-size-11">Doctor certificates & condonation records</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Infirmary Desk</span></td>
        <td><small class="text-dark">Doctor Verified Leaves</small></td>
        <td><small class="text-muted font-mono font-size-12">School Pediatrician</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">38 Cases</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', 'attendance-reports_download.csv')" title="Download Report"><i class="bi bi-download"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-ATT-008</td>
        <td>
          <div class="fw-semibold text-dark">Inter-School Sports & Activity OD Roster</div>
          <small class="text-muted font-size-11">Official Duty exemptions from regular classes</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Athletics & Teams</span></td>
        <td><small class="text-dark">Tournament Dates</small></td>
        <td><small class="text-muted font-mono font-size-12">Sports HOD</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">42 Athletes</span></td>
        <td><small class="text-muted">24 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Generated</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', 'attendance-reports_download.csv')" title="Download Report"><i class="bi bi-download"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
