<?php
/**
 * EDUSYS PRO - PAYMENT RECONCILIATION
 * Dedicated operational interface & fee transactions for Payment Reconciliation
 */
$page_title = "Payment Reconciliation";
$page_desc = "Auto-matching gateway settlement batches with ICICI / HDFC school bank accounts to identify unresolved drops";
$active_module = "fees";
$active_submodule = "payment-reconciliation.php";
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
    <h1><i class="bi bi-bank2 text-primary me-2"></i><?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'payment-reconciliation_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#uploadReconModal">
      <i class="bi bi-upload me-1"></i> Upload Bank Statement (CSV)
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Reconciliation Rate</h6>
        <div class="kpi-value">99.8%</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle-fill"></i> Auto-Matched by System</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-circle"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Settlement Batches</h6>
        <div class="kpi-value">28 Batches</div>
        <div class="kpi-trend neutral"><i class="bi bi-info-circle-fill"></i> All Settled in Bank</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Unmatched Discrepancy</h6>
        <div class="kpi-value">₹ 18,500 (1 Txn)</div>
        <div class="kpi-trend positive"><i class="bi bi-graph-up-arrow"></i> Under Bank Enquiry</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-exclamation-circle"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Total Reconciled YTD</h6>
        <div class="kpi-value">₹ 5.42 Crores</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Auditor Approved</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
</div>

<!-- Main Table Container -->
<div class="table-container mb-4">
  <div class="table-header">
    <div class="table-title">
      <i class="bi bi-bank2 text-primary me-2"></i> Payment Reconciliation Ledger
    </div>
    <div class="table-actions">
      <div class="search-box">
        <i class="bi bi-search"></i>
        <input type="text" id="tableSearchInput" class="form-control" placeholder="Search payment reconciliation..." onkeyup="EduTables.search('#mainDataTable', this.value)">
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
          <th>Batch Date</th>
          <th>Gateway Provider</th>
          <th>Gross Collections (₹)</th>
          <th>Gateway Fee / MDR (₹)</th>
          <th>Net Settled (₹)</th>
          <th>Bank UTR Number</th>
          <th>Recon Status</th>
          <th class="text-center" style="width: 120px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        
        <tr>
          <td>27-Oct-2026</td>
          <td>Razorpay</td>
          <td>₹ 4,12,000</td>
          <td>₹ 0 (UPI Zero Surcharge)</td>
          <td>₹ 4,12,000</td>
          <td>HDFCR520261027991</td>
          <td><span class="badge bg-success">Matched & Reconciled</span></td>
          <td>
            
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Record"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-success" title="Quick Process" onclick="alert('Action completed successfully for this fee entry!')"><i class="bi bi-check2-circle"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Payment Reconciliation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
          </td>
        </tr>
        <tr>
          <td>26-Oct-2026</td>
          <td>Razorpay</td>
          <td>₹ 3,84,000</td>
          <td>₹ 0 (UPI Zero Surcharge)</td>
          <td>₹ 3,84,000</td>
          <td>HDFCR520261026410</td>
          <td><span class="badge bg-success">Matched & Reconciled</span></td>
          <td>
            
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Record"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-success" title="Quick Process" onclick="alert('Action completed successfully for this fee entry!')"><i class="bi bi-check2-circle"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Payment Reconciliation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
          </td>
        </tr>
        <tr>
          <td>25-Oct-2026</td>
          <td>PayU Enterprise</td>
          <td>₹ 1,85,000</td>
          <td>₹ 120 (Netbanking Fee)</td>
          <td>₹ 1,84,880</td>
          <td>HDFCP520261025118</td>
          <td><span class="badge bg-success">Matched & Reconciled</span></td>
          <td>
            
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Record"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-success" title="Quick Process" onclick="alert('Action completed successfully for this fee entry!')"><i class="bi bi-check2-circle"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Payment Reconciliation')" title="Delete"><i class="bi bi-trash"></i></button>
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
        <h5 class="modal-title"><i class="bi bi-bank2 text-primary me-2"></i>Upload Bank Statement (CSV)</h5>
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
<div class="modal fade" id="uploadReconModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-bank2 text-primary me-2"></i>Upload Bank Statement (CSV)</h5>
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
          <button type="button" class="btn btn-sm btn-primary fw-bold" onclick="alert('Batch process executed successfully!'); bootstrap.Modal.getInstance(document.getElementById('uploadReconModal')).hide();"><i class="bi bi-lightning-charge me-1"></i> Execute Process</button>
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
            <span class="fw-bold text-primary">Payment Reconciliation</span>
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
