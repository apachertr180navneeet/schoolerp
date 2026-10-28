<?php
/**
 * EDUSYS PRO - ADMISSION REPORTS
 * Dedicated operational interface & records management for Admission Reports
 */
$page_title = "Admission Reports";
$page_desc = "Statutory board intake summaries, demographic statistics, revenue audits, and conversion analytics";
$active_module = "admissions";
$active_submodule = "admission-reports.php";
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
    <h1><i class="bi bi-bar-chart-line-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'admission-reports_export.csv')" title="Export Table as CSV">
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
        <div class="kpi-value">14 Formats</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> CBSE & SMC Standard</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-file-earmark-bar-graph-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Board LOC Ready</h6>
        <div class="kpi-value">100% Synced</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> OASIS & UDISE+ Format</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Gender Balance Ratio</h6>
        <div class="kpi-value">52 : 48</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Balanced Boys vs Girls</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-gender-ambiguous"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Export Capabilities</h6>
        <div class="kpi-value">PDF & CSV</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Instant Data Download</div>
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
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search report code, title, frequency...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Reporting Categories</option>
      <option >Intake & Capacity Utilisation</option>
      <option >Fee Collection & Outstanding Audit</option>
      <option >Board Registration & Statutory</option>
      <option >Marketing Channel Performance</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Generated & Current</option>
      <option >Scheduled Weekly</option>
      <option >Monthly Reconciled</option>
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
        <td class="fw-bold text-primary font-mono font-size-13">REP-ADM-001</td>
        <td>
          <div class="fw-semibold text-dark">Annual Intake & Seat Capacity Audit</div>
          <small class="text-muted font-size-11">Wing-wise target vs actual admissions</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Institutional All Wings</span></td>
        <td><small class="text-dark">Session 2025-26</small></td>
        <td><small class="text-muted font-mono font-size-12">Dean Admissions</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">1,248 Records</span></td>
        <td><small class="text-muted">Today (08:00 AM)</small></td>
        <td><span class="badge-status badge-active">Live Synced</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', 'admission-reports_download.csv')" title="Download Report"><i class="bi bi-download"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-ADM-002</td>
        <td>
          <div class="fw-semibold text-dark">CBSE Statutory Registration Roll (LOC)</div>
          <small class="text-muted font-size-11">OASIS and UDISE+ student manifest</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 9 & 11 Batches</span></td>
        <td><small class="text-dark">Statutory CBSE</small></td>
        <td><small class="text-muted font-mono font-size-12">Registrar Office</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">184 Enrolled</span></td>
        <td><small class="text-muted">28 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', 'admission-reports_download.csv')" title="Download Report"><i class="bi bi-download"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-ADM-003</td>
        <td>
          <div class="fw-semibold text-dark">Admission Fee Collection Reconciliation</div>
          <small class="text-muted font-size-11">Breakup of admission, tuition & caution</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Finance & Accounts</span></td>
        <td><small class="text-dark">Financial Audit</small></td>
        <td><small class="text-muted font-mono font-size-12">Chief Accountant</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹46.20 Lakhs</span></td>
        <td><small class="text-muted">28 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Reconciled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', 'admission-reports_download.csv')" title="Download Report"><i class="bi bi-download"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-ADM-004</td>
        <td>
          <div class="fw-semibold text-dark">Marketing Channel Attribution & ROI</div>
          <small class="text-muted font-size-11">Cost per lead & conversion by channel</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Digital Marketing</span></td>
        <td><small class="text-dark">Channel Yield</small></td>
        <td><small class="text-muted font-mono font-size-12">Media Lead</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">8 Sources</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Generated</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', 'admission-reports_download.csv')" title="Download Report"><i class="bi bi-download"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-ADM-005</td>
        <td>
          <div class="fw-semibold text-dark">Parent Demographic & Geographic Analysis</div>
          <small class="text-muted font-size-11">Pin-code & transport route feasibility</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Transport & Planning</span></td>
        <td><small class="text-dark">GIS Mapping</small></td>
        <td><small class="text-muted font-mono font-size-12">Transport Supervisor</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">842 Applicants</span></td>
        <td><small class="text-muted">26 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Generated</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', 'admission-reports_download.csv')" title="Download Report"><i class="bi bi-download"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-ADM-006</td>
        <td>
          <div class="fw-semibold text-dark">Gender Parity & Social Quota Statement</div>
          <small class="text-muted font-size-11">Boys/Girls and EWS/DG quota compliance</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Compliance Desk</span></td>
        <td><small class="text-dark">RTE & Equal Opportunity</small></td>
        <td><small class="text-muted font-mono font-size-12">HR & Legal</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">184 Students</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', 'admission-reports_download.csv')" title="Download Report"><i class="bi bi-download"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-ADM-007</td>
        <td>
          <div class="fw-semibold text-dark">Sibling & Alumni Discount Ledger</div>
          <small class="text-muted font-size-11">Concession impact on gross fee pool</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Finance Desk</span></td>
        <td><small class="text-dark">Discount Audit</small></td>
        <td><small class="text-muted font-mono font-size-12">Chief Accountant</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">28 Concessions</span></td>
        <td><small class="text-muted">24 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Reconciled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', 'admission-reports_download.csv')" title="Download Report"><i class="bi bi-download"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-ADM-008</td>
        <td>
          <div class="fw-semibold text-dark">Withdrawal & Cancellation Trend Analysis</div>
          <small class="text-muted font-size-11">Historical churn rates and reasons</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Management</span></td>
        <td><small class="text-dark">Multi-Year Trend</small></td>
        <td><small class="text-muted font-mono font-size-12">Principal Office</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">12 Cases</span></td>
        <td><small class="text-muted">23 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Generated</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', 'admission-reports_download.csv')" title="Download Report"><i class="bi bi-download"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
