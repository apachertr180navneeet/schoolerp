<?php
/**
 * EDUSYS PRO - EVENT MIS REPORTS
 * Dedicated operational interface & records management for Event MIS Reports
 */
$page_title = "Event MIS Reports";
$page_desc = "Audited post-event summaries, budget reconciliation sheets, participation analytics, and board filings";
$active_module = "events-ptm";
$active_submodule = "event-reports.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/events-ptm/calendar.php'); ?>">Events & PTM</a></li>
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
    <a href="<?php echo base_url('modules/events-ptm/calendar.php'); ?>" class="btn btn-light border" title="Interactive Master Calendar">
      <i class="bi bi-calendar3 me-1"></i> Calendar
    </a>
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'event-reports_export.csv')" title="Export Table as CSV">
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
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Generated Audits</h6>
        <div class="kpi-value">16 Reports</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Compliant with School Board</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-file-earmark-bar-graph-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Budget Reconciled</h6>
        <div class="kpi-value">₹14,20,000</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> ₹4.30L Under Allocation</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cash-coin"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Turnout Ratio</h6>
        <div class="kpi-value">94.8%</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> 1,740 of 1,840 Registered</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-graph-up-arrow"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Media Archives</h6>
        <div class="kpi-value">1,200 Photos</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Cloud Gallery Synced</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-camera-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search report code, title, event domain...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Event Domains</option>
      <option >Annual Flagship Celebrations</option>
      <option >PTM Attendance & Resolution Audits</option>
      <option >Athletic Competitions & Medals</option>
      <option >Excursion Safety & Expenditure</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Audited & Certified</option>
      <option >Finance Reconciled</option>
      <option >Under Final Review</option>
      <option >Draft</option>
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
        <th>Report Title & Subject</th>
        <th>Event Domain</th>
        <th>Target Scope</th>
        <th>Compiled By</th>
        <th>Audited Budget (₹)</th>
        <th>Generated Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-EVT-016</td>
        <td>
          <div class="fw-semibold text-dark">Term 1 PTM Attendance & Feedback Audit</div>
          <small class="text-muted font-size-11">94.2% Turnout across 48 Sections</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Parent-Teacher Meetings</span></td>
        <td><small class="text-dark">All 1,482 Families</small></td>
        <td><small class="text-muted font-mono font-size-12">Dean Academics</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹45,000 (Operational)</span></td>
        <td><small class="text-muted">Today (09:00 AM)</small></td>
        <td><span class="badge-status badge-active">Certified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event MIS Reports')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-EVT-015</td>
        <td>
          <div class="fw-semibold text-dark">24th Annual Sports Day Financial Audit</div>
          <small class="text-muted font-size-11">Track & Field Equipment, Medals & Refreshments</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Sports & Athletics</span></td>
        <td><small class="text-dark">Main Athletic Meet</small></td>
        <td><small class="text-muted font-mono font-size-12">Chief Accountant</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹3,42,800</span></td>
        <td><small class="text-muted">28 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Reconciled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event MIS Reports')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-EVT-014</td>
        <td>
          <div class="fw-semibold text-dark">National Science Centre Excursion Safety Report</div>
          <small class="text-muted font-size-11">Bus GPS Telematics & Student Manifest</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">School Excursions</span></td>
        <td><small class="text-dark">Middle Wing (95 Students)</small></td>
        <td><small class="text-muted font-mono font-size-12">Transport Supervisor</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹80,750</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Certified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event MIS Reports')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-EVT-013</td>
        <td>
          <div class="fw-semibold text-dark">Children's Day Carnival Budget Summary</div>
          <small class="text-muted font-size-11">Vendor Stall Rentals, Artist Fees & Sound</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Cultural Celebrations</span></td>
        <td><small class="text-dark">Junior School Event</small></td>
        <td><small class="text-muted font-mono font-size-12">Cultural Committee</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹2,18,500</span></td>
        <td><small class="text-muted">26 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Certified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event MIS Reports')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-EVT-012</td>
        <td>
          <div class="fw-semibold text-dark">Inter-House Debate & Cultural Trophy Tally</div>
          <small class="text-muted font-size-11">House Points Ledger for Best House Trophy</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Co-Curricular Points</span></td>
        <td><small class="text-dark">All 4 Student Houses</small></td>
        <td><small class="text-muted font-mono font-size-12">Senior Activity Mentor</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹25,000</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Certified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event MIS Reports')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-EVT-011</td>
        <td>
          <div class="fw-semibold text-dark">Annual Day 2024 Stage & Audio Vendor Audit</div>
          <small class="text-muted font-size-11">Auditorium LED Wall, Moving Lights & Costumes</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Annual Celebrations</span></td>
        <td><small class="text-dark">Main School Gala</small></td>
        <td><small class="text-muted font-mono font-size-12">Estate Manager</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹4,75,000</span></td>
        <td><small class="text-muted">24 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Reconciled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event MIS Reports')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-EVT-010</td>
        <td>
          <div class="fw-semibold text-dark">Model United Nations (MUN) Sponsorship Statement</div>
          <small class="text-muted font-size-11">Delegate Registration Fees & Delegate Kits</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Student Conference</span></td>
        <td><small class="text-dark">300 External Delegates</small></td>
        <td><small class="text-muted font-mono font-size-12">Teacher Advisor MUN</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹3,60,000</span></td>
        <td><small class="text-muted">23 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Certified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event MIS Reports')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REP-EVT-009</td>
        <td>
          <div class="fw-semibold text-dark">Diwali Charity Drive & Donation Report</div>
          <small class="text-muted font-size-11">Stationery & Blanket Kits for Underprivileged</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Community Outreach</span></td>
        <td><small class="text-dark">Social Service Club</small></td>
        <td><small class="text-muted font-mono font-size-12">Counseling Dept</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹1,12,000</span></td>
        <td><small class="text-muted">22 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Certified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event MIS Reports')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
