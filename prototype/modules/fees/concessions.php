<?php
/**
 * EDUSYS PRO - FEE CONCESSIONS & WAIVERS
 * Dedicated operational interface & fee transactions for Fee Concessions & Waivers
 */
$page_title = "Fee Concessions & Waivers";
$page_desc = "Management and approval matrix for economically weaker sections (EWS), orphan aid, and disaster reliefs";
$active_module = "fees";
$active_submodule = "concessions.php";
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
    <h1><i class="bi bi-tag-fill text-primary me-2"></i><?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'concessions_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Apply Fee Waiver
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Active Waivers</h6>
        <div class="kpi-value">64 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle-fill"></i> 4.5% of School Strength</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-percent"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Total Relief Value</h6>
        <div class="kpi-value">₹ 24.5 Lakhs</div>
        <div class="kpi-trend neutral"><i class="bi bi-info-circle-fill"></i> Funded by Trust Endowment</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-currency-rupee"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>RTE 25% Free Quota</h6>
        <div class="kpi-value">42 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-graph-up-arrow"></i> Govt Reimbursement Mapped</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-award"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Trustee Sign-off</h6>
        <div class="kpi-value">100% Audited</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Verified Annual Income</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
</div>

<!-- Main Table Container -->
<div class="table-container mb-4">
  <div class="table-header">
    <div class="table-title">
      <i class="bi bi-tag-fill text-primary me-2"></i> Fee Concessions & Waivers Ledger
    </div>
    <div class="table-actions">
      <div class="search-box">
        <i class="bi bi-search"></i>
        <input type="text" id="tableSearchInput" class="form-control" placeholder="Search fee concessions & waivers..." onkeyup="EduTables.search('#mainDataTable', this.value)">
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
          <th>Concession ID</th>
          <th>Student Name</th>
          <th>Class & Sec</th>
          <th>Concession Category</th>
          <th>Waiver %</th>
          <th>Annual Relief (₹)</th>
          <th>Approval Authority</th>
          <th>Status</th>
          <th class="text-center" style="width: 120px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        
        <tr>
          <td><span class="badge bg-primary">WVR-01</span></td>
          <td>Kavita Shenoy</td>
          <td>Class X-C</td>
          <td>Single Parent Girl Child</td>
          <td>25% on Tuition</td>
          <td>₹ 14,800</td>
          <td>Managing Trustee</td>
          <td><span class="badge bg-success">Approved</span></td>
          <td>
            
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Fee Concessions & Waivers')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
          </td>
        </tr>
        <tr>
          <td><span class="badge bg-primary">WVR-02</span></td>
          <td>Deepak Chauhan</td>
          <td>Class X-B</td>
          <td>EWS / Low Income Family</td>
          <td>50% on Tuition</td>
          <td>₹ 29,600</td>
          <td>School Management Comm</td>
          <td><span class="badge bg-success">Approved</span></td>
          <td>
            
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Fee Concessions & Waivers')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
          </td>
        </tr>
        <tr>
          <td><span class="badge bg-primary">WVR-03</span></td>
          <td>Ayaan Khan</td>
          <td>Class VII-A</td>
          <td>RTE Section 12(1)(c)</td>
          <td>100% Free Education</td>
          <td>₹ 60,000</td>
          <td>Govt BSA Order</td>
          <td><span class="badge bg-success">Govt Quota</span></td>
          <td>
            
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Fee Concessions & Waivers')" title="Delete"><i class="bi bi-trash"></i></button>
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
        <h5 class="modal-title"><i class="bi bi-tag-fill text-primary me-2"></i>Apply Fee Waiver</h5>
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
        <h5 class="modal-title"><i class="bi bi-tag-fill text-primary me-2"></i>Apply Fee Waiver</h5>
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
            <span class="fw-bold text-primary">Fee Concessions & Waivers</span>
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
