<?php
/**
 * EDUSYS PRO - FEE DEFAULTER LISTS
 * Dedicated operational interface & fee transactions for Fee Defaulter Lists
 */
$page_title = "Fee Defaulter Lists";
$page_desc = "Escalation roster for students with chronic non-payment, portal access suspension, and legal notice triggers";
$active_module = "fees";
$active_submodule = "defaulter-lists.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/fees/dashboard.php'); ?>">Fees Management</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-exclamation-triangle-fill text-primary me-2"></i><?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'defaulter-lists_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Export Boarding Defaulters
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Severe Defaulters</h6>
        <div class="kpi-value">24 Cases (>60 Days)</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle-fill"></i> Urgent Accounts Action</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-x"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Portal Restricted</h6>
        <div class="kpi-value">12 Accounts</div>
        <div class="kpi-trend neutral"><i class="bi bi-info-circle-fill"></i> Admit Card Withheld</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-lock-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Call Follow-up Rate</h6>
        <div class="kpi-value">100% Called</div>
        <div class="kpi-trend positive"><i class="bi bi-graph-up-arrow"></i> Accounts Dept Tele-call</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-telephone-outbound"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>PDC Deposited</h6>
        <div class="kpi-value">8 Cheques in Clearing</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Resolving this week</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-bank"></i></div>
    </div>
  </div>
</div>

<!-- Main Table Container -->
<div class="table-container mb-4">
  <div class="table-header">
    <div class="table-title">
      <i class="bi bi-exclamation-triangle-fill text-primary me-2"></i> Fee Defaulter Lists Ledger
    </div>
    <div class="table-actions">
      <div class="search-box">
        <i class="bi bi-search"></i>
        <input type="text" id="tableSearchInput" class="form-control" placeholder="Search fee defaulter lists..." onkeyup="EduTables.search('#mainDataTable', this.value)">
      </div>
      <div class="filter-dropdown">
        <select class="form-select form-select-sm" onchange="EduTables.filter('#mainDataTable', this.value)">
          <option value="">All Records</option>
          <option value="Active">Active</option>
          <option value="Paid">Paid</option>
          <option value="Pending">Pending</option>
          <option value="Overdue">Overdue</option>
        </select>
      </div>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table erp-table table-hover" id="mainDataTable">
      <thead>
        <tr>
          <th>Roll / Adm No</th>
          <th>Student Name</th>
          <th>Class & Sec</th>
          <th>Father / Guardian</th>
          <th>Phone Number</th>
          <th>Unpaid Quarters</th>
          <th>Total Overdue (₹)</th>
          <th>Action Status</th>
          <th class="text-center" style="width: 120px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        
        <tr>
          <td>ADM-2021-0511</td>
          <td><strong>Sameer Quadri</strong></td>
          <td>Class IX-C</td>
          <td>Mr. M. Quadri</td>
          <td>+91 98223-11099</td>
          <td>Q2 + Q3</td>
          <td><strong class="text-danger">₹ 35,000</strong></td>
          <td><span class="badge bg-danger">Final Notice Dispatched</span></td>
          <td>
            
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Fee Defaulter Lists')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
          </td>
        </tr>
        <tr>
          <td>ADM-2021-0544</td>
          <td><strong>Gaurav Saxena</strong></td>
          <td>Class XI-Comm</td>
          <td>Mr. S. Saxena</td>
          <td>+91 94152-33211</td>
          <td>Q2 + Q3</td>
          <td><strong class="text-danger">₹ 39,000</strong></td>
          <td><span class="badge bg-danger">Admit Card Withheld</span></td>
          <td>
            
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Fee Defaulter Lists')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
          </td>
        </tr>
        <tr>
          <td>ADM-2021-0560</td>
          <td><strong>Pooja Tiwari</strong></td>
          <td>Class VII-B</td>
          <td>Mr. R. Tiwari</td>
          <td>+91 98110-88412</td>
          <td>Q3</td>
          <td>₹ 15,000</td>
          <td><span class="badge bg-warning text-dark">PDC Received (Nov 5)</span></td>
          <td>
            
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Fee Defaulter Lists')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="table-footer">
    <div class="table-info font-size-13 text-muted">
      Showing 1 to 3 of 3 entries (Academic Financial Year 2026-27)
    </div>
    <nav aria-label="Page navigation">
      <ul class="pagination pagination-sm mb-0">
        <li class="page-item disabled"><a class="page-link" href="#"><i class="bi bi-chevron-left"></i></a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a></li>
      </ul>
    </nav>
  </div>
</div>

<!-- Modal: Add New Record -->
<div class="modal fade" id="addNewRecordModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-exclamation-triangle-fill text-primary me-2"></i>Export Boarding Defaulters</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form onsubmit="event.preventDefault(); alert('Fee entry saved successfully to finance ledger!'); bootstrap.Modal.getInstance(document.getElementById('addNewRecordModal')).hide();">
          <div class="row g-3">
            
            <div class="col-md-6">
              <label class="form-label fw-semibold font-size-13">Fee Category / Type</label>
              
              <select class="form-select form-select-sm">
                <option>Regular Tuition Fee</option><option>Transport Fee Slab</option><option>Admission / Registration</option><option>Hostel & Boarding</option><option>Examination & Lab Fee</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold font-size-13">Class / Target Group</label>
              
              <select class="form-select form-select-sm">
                <option>All Classes (Composite)</option><option>Class X (Secondary)</option><option>Class XII (Senior Secondary)</option><option>Primary Wing (I-V)</option><option>Pre-Primary / KG</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold font-size-13">Fee Head Name / Title</label>
              
              <input type="text" class="form-control form-control-sm" placeholder="e.g. Quarterly Composite Tuition Fee">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold font-size-13">Applicable Amount (₹)</label>
              
              <input type="number" class="form-control form-control-sm" placeholder="e.g. 18500">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold font-size-13">Due Date / Frequency</label>
              
              <select class="form-select form-select-sm">
                <option>10th of every Month</option><option>Quarterly (10 Apr, 10 Jul, 10 Oct, 10 Jan)</option><option>Annual (One-Time at Admission)</option><option>Half-Yearly</option>
              </select>
            </div>
          </div>
          <div class="modal-footer px-0 pb-0 pt-3 mt-3 border-top">
            <button type="button" class="btn btn-sm btn-light border" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-sm btn-primary fw-bold"><i class="bi bi-check2 me-1"></i> Save to Ledger</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal: Tool Modal (if applicable) -->
<div class="modal fade" id="actionToolModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-exclamation-triangle-fill text-primary me-2"></i>Export Boarding Defaulters</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-info py-2 font-size-13">
          <i class="bi bi-info-circle-fill me-1"></i> Running this operation will calculate demand, generate fee schedules, or issue alerts according to school accounts rules.
        </div>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label font-size-13 fw-semibold">Billing Cycle / Quarter</label>
            <select class="form-select form-select-sm">
              <option>Quarter 3 (Oct - Dec 2026)</option>
              <option>Quarter 4 (Jan - Mar 2027)</option>
              <option>Annual Advance Demand</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label font-size-13 fw-semibold">Target Student Cohort</label>
            <select class="form-select form-select-sm">
              <option>All Enrolled Students (1,420)</option>
              <option>Defaulters Only (>15 Days Overdue)</option>
              <option>Transport Opted Students Only</option>
            </select>
          </div>
        </div>
        <div class="modal-footer px-0 pb-0 pt-3 mt-3 border-top">
          <button type="button" class="btn btn-sm btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-sm btn-primary fw-bold" onclick="alert('Batch process executed successfully!'); bootstrap.Modal.getInstance(document.getElementById('actionToolModal')).hide();"><i class="bi bi-lightning-charge me-1"></i> Execute Process</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal: View Record Summary -->
<div class="modal fade" id="viewRecordModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-receipt text-primary me-2"></i>Transaction Dossier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body font-size-13">
        <div class="p-3 bg-light rounded mb-3 border">
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Account Head:</span>
            <span class="fw-bold text-primary">Fee Defaulter Lists</span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Financial Year:</span>
            <span class="fw-semibold">2026-2027</span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Bank Reconciliation:</span>
            <span class="badge bg-success-subtle text-success border"><i class="bi bi-check2-circle me-1"></i>Reconciled</span>
          </div>
          <div class="d-flex justify-content-between">
            <span class="text-muted">Audit Verification:</span>
            <span class="text-muted small">C.A. Audited & Tax Compliant</span>
          </div>
        </div>
        <p class="text-muted small mb-0"><i class="bi bi-lock-fill me-1"></i> Digitally logged with encrypted transaction checksum.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-sm btn-primary" onclick="window.print()"><i class="bi bi-printer me-1"></i> Print Receipt</button>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
