<?php
/**
 * EDUSYS PRO - PAYMENT GATEWAY SIMULATION
 * Dedicated operational interface & fee transactions for Payment Gateway Simulation
 */
$page_title = "Payment Gateway Simulation";
$page_desc = "Integration test console for Razorpay, PayU, and BillDesk webhooks, token exchanges, and payment success responses";
$active_module = "fees";
$active_submodule = "payment-gateway.php";
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
    <h1><i class="bi bi-hdd-network-fill text-primary me-2"></i><?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'payment-gateway_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#simulatePaymentModal">
      <i class="bi bi-play-circle me-1"></i> Simulate Gateway Payment
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Active Gateways</h6>
        <div class="kpi-value">Razorpay & PayU</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle-fill"></i> Dual Failover Routing</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-hdd-network"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Success Rate</h6>
        <div class="kpi-value">99.12%</div>
        <div class="kpi-trend neutral"><i class="bi bi-info-circle-fill"></i> High Reliability</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-lightning"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>T+1 Settlement</h6>
        <div class="kpi-value">Direct to HDFC</div>
        <div class="kpi-trend positive"><i class="bi bi-graph-up-arrow"></i> Next-day Bank Credit</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-bank"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>MDR Surcharge</h6>
        <div class="kpi-value">0% on RuPay & UPI</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Zero Cost to Parents</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-tag"></i></div>
    </div>
  </div>
</div>

<!-- Main Table Container -->
<div class="table-container mb-4">
  <div class="table-header">
    <div class="table-title">
      <i class="bi bi-hdd-network-fill text-primary me-2"></i> Payment Gateway Simulation Ledger
    </div>
    <div class="table-actions">
      <div class="search-box">
        <i class="bi bi-search"></i>
        <input type="text" id="tableSearchInput" class="form-control" placeholder="Search payment gateway simulation..." onkeyup="EduTables.search('#mainDataTable', this.value)">
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
          <th>Gateway ID</th>
          <th>Provider Name</th>
          <th>API Environment</th>
          <th>Webhook Endpoint</th>
          <th>Avg Response Time</th>
          <th>Success Rate</th>
          <th>Gateway Health</th>
          <th class="text-center" style="width: 120px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        
        <tr>
          <td><span class="badge bg-primary">GW-RZP-01</span></td>
          <td><strong>Razorpay SmartCollect</strong></td>
          <td><span class="badge bg-success">Production Live</span></td>
          <td>/api/v1/webhook/razorpay</td>
          <td>240 ms</td>
          <td>99.2%</td>
          <td><span class="badge bg-success-subtle text-success border">Healthy</span></td>
          <td>
            
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Record"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-success" title="Quick Process" onclick="alert('Action completed successfully for this fee entry!')"><i class="bi bi-check2-circle"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Payment Gateway Simulation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
          </td>
        </tr>
        <tr>
          <td><span class="badge bg-primary">GW-PAYU-02</span></td>
          <td><strong>PayU Enterprise</strong></td>
          <td><span class="badge bg-success">Production Live (Backup)</span></td>
          <td>/api/v1/webhook/payu</td>
          <td>280 ms</td>
          <td>98.9%</td>
          <td><span class="badge bg-success-subtle text-success border">Healthy</span></td>
          <td>
            
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Record"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-success" title="Quick Process" onclick="alert('Action completed successfully for this fee entry!')"><i class="bi bi-check2-circle"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Payment Gateway Simulation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
          </td>
        </tr>
        <tr>
          <td><span class="badge bg-secondary">GW-UPI-03</span></td>
          <td><strong>NPCI Dynamic QR BharatPay</strong></td>
          <td><span class="badge bg-success">Production Live</span></td>
          <td>/api/v1/webhook/npci_upi</td>
          <td>180 ms</td>
          <td>99.8%</td>
          <td><span class="badge bg-success-subtle text-success border">Healthy</span></td>
          <td>
            
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Record"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-success" title="Quick Process" onclick="alert('Action completed successfully for this fee entry!')"><i class="bi bi-check2-circle"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Payment Gateway Simulation')" title="Delete"><i class="bi bi-trash"></i></button>
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
        <h5 class="modal-title"><i class="bi bi-hdd-network-fill text-primary me-2"></i>Simulate Gateway Payment</h5>
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
<div class="modal fade" id="simulatePaymentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-hdd-network-fill text-primary me-2"></i>Simulate Gateway Payment</h5>
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
          <button type="button" class="btn btn-sm btn-primary fw-bold" onclick="alert('Batch process executed successfully!'); bootstrap.Modal.getInstance(document.getElementById('simulatePaymentModal')).hide();"><i class="bi bi-lightning-charge me-1"></i> Execute Process</button>
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
            <span class="fw-bold text-primary">Payment Gateway Simulation</span>
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
