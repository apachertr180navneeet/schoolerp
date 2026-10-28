<?php
/**
 * EDUSYS PRO - FEES & COLLECTION MANAGEMENT COMMAND CENTER
 * Comprehensive executive finance dashboard with live collection feeds, outstanding balances,
 * fee head recoveries, payment gateway status, and rapid cashier actions.
 */
$page_title = "Fees & Collection Dashboard";
$page_desc = "Master financial command center for student billing, collection counters, defaulters & reconciliation";
$active_module = "fees";
$active_submodule = "dashboard.php";
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
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-cash-stack text-primary me-2"></i>Fees & Collection Management</h1>
    <p>Financial Year 2026-2027 | Total Enrollment: 1,420 Students | Quarter 3 (Oct - Dec) Active</p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/fees/fee-collection.php'); ?>" class="btn btn-primary fw-bold">
      <i class="bi bi-calculator me-1"></i> Cashier Counter (Collect Fee)
    </a>
    <a href="<?php echo base_url('modules/fees/outstanding-balances.php'); ?>" class="btn btn-light border">
      <i class="bi bi-exclamation-circle me-1"></i> Defaulter List
    </a>
    <a href="<?php echo base_url('modules/fees/daily-collection.php'); ?>" class="btn btn-light border">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Daily Day-End Book
    </a>
  </div>
</div>

<!-- Financial KPIs -->
<div class="row g-3 mb-4">
  <div class="col-6 col-lg-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Total Fees Collected (YTD)</h6>
        <div class="kpi-value">₹ 5.42 Cr</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-right"></i> 79.1% of Annual Demand</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-currency-rupee"></i></div>
    </div>
  </div>
  <div class="col-6 col-lg-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Outstanding Overdue</h6>
        <div class="kpi-value">₹ 1.43 Cr</div>
        <div class="kpi-trend negative"><i class="bi bi-exclamation-triangle"></i> 312 Accounts Overdue</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-hourglass-bottom"></i></div>
    </div>
  </div>
  <div class="col-6 col-lg-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Today's Counter Collection</h6>
        <div class="kpi-value">₹ 3,84,500</div>
        <div class="kpi-trend positive"><i class="bi bi-receipt"></i> 28 Receipts Issued Today</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-wallet2"></i></div>
    </div>
  </div>
  <div class="col-6 col-lg-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Digital / Online Pay Rate</h6>
        <div class="kpi-value">72.4%</div>
        <div class="kpi-trend positive"><i class="bi bi-qr-code"></i> UPI & Netbanking Dominated</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-credit-card-2-front"></i></div>
    </div>
  </div>
</div>

<!-- Main Operational Widgets Grid -->
<div class="row g-4 mb-4">
  <!-- Today's Live Counter Transactions -->
  <div class="col-lg-8">
    <div class="card border shadow-sm h-100">
      <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <div>
          <h6 class="mb-0 fw-bold text-dark"><i class="bi bi-clock-history text-primary me-2"></i>Live Collection Stream (Today)</h6>
          <small class="text-muted">Wednesday, 28 October 2026 | Counter 1 & Online Gateway</small>
        </div>
        <span class="badge bg-success-subtle text-success border"><i class="bi bi-circle-fill font-size-8 me-1"></i>Active Counter</span>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table erp-table table-hover mb-0">
            <thead>
              <tr>
                <th>Receipt #</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Fee Head</th>
                <th>Mode</th>
                <th>Amount (₹)</th>
                <th>Time</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><span class="badge bg-dark">RCP-2026-8812</span></td>
                <td><strong>Aarav Sharma</strong></td>
                <td>Class X-A</td>
                <td>Quarter 3 Tuition + Lab</td>
                <td><span class="badge bg-primary-subtle text-primary border">UPI (PhonePe)</span></td>
                <td><strong class="text-success">₹ 18,500</strong></td>
                <td>14:24 PM</td>
              </tr>
              <tr>
                <td><span class="badge bg-dark">RCP-2026-8811</span></td>
                <td><strong>Sneha Kapoor</strong></td>
                <td>Class X-A</td>
                <td>Quarter 3 Tuition Fee</td>
                <td><span class="badge bg-info-subtle text-info border">Netbanking HDFC</span></td>
                <td><strong class="text-success">₹ 16,000</strong></td>
                <td>14:10 PM</td>
              </tr>
              <tr>
                <td><span class="badge bg-dark">RCP-2026-8810</span></td>
                <td><strong>Rohan Patel</strong></td>
                <td>Class X-B</td>
                <td>Quarter 3 Tuition + Transport</td>
                <td><span class="badge bg-light text-dark border">Cash Counter</span></td>
                <td><strong class="text-success">₹ 21,200</strong></td>
                <td>13:48 PM</td>
              </tr>
              <tr>
                <td><span class="badge bg-dark">RCP-2026-8809</span></td>
                <td><strong>Diya Mukherjee</strong></td>
                <td>Class XII-Sci</td>
                <td>Quarter 3 Tuition + Board Fee</td>
                <td><span class="badge bg-success-subtle text-success border">Debit Card POS</span></td>
                <td><strong class="text-success">₹ 23,800</strong></td>
                <td>13:15 PM</td>
              </tr>
              <tr>
                <td><span class="badge bg-dark">RCP-2026-8808</span></td>
                <td><strong>Ishaan Joshi</strong></td>
                <td>Class XII-Comm</td>
                <td>Quarter 3 Tuition Fee</td>
                <td><span class="badge bg-primary-subtle text-primary border">UPI (Google Pay)</span></td>
                <td><strong class="text-success">₹ 18,000</strong></td>
                <td>12:50 PM</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer bg-light py-2 d-flex justify-content-between align-items-center font-size-13">
        <span><i class="bi bi-shield-check text-success me-1"></i> Cash drawer balance verified at ₹ 78,500</span>
        <a href="<?php echo base_url('modules/fees/fee-collection.php'); ?>" class="fw-bold text-primary">Open Full Counter Terminal <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
  </div>

  <!-- Payment Mode Breakdown & Concession Meter -->
  <div class="col-lg-4">
    <div class="card border shadow-sm h-100">
      <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold text-dark"><i class="bi bi-pie-chart text-primary me-2"></i>Collection by Payment Mode</h6>
        <span class="badge bg-light text-dark border">YTD</span>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span class="fw-semibold text-primary"><i class="bi bi-qr-code me-1"></i> UPI / QR Codes</span>
            <strong>₹ 2.60 Cr (48%)</strong>
          </div>
          <div class="progress" style="height: 7px;">
            <div class="progress-bar bg-primary" style="width: 48%"></div>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span class="fw-semibold text-info"><i class="bi bi-bank me-1"></i> Netbanking & NEFT/RTGS</span>
            <strong>₹ 1.30 Cr (24%)</strong>
          </div>
          <div class="progress" style="height: 7px;">
            <div class="progress-bar bg-info" style="width: 24%"></div>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span class="fw-semibold text-success"><i class="bi bi-credit-card me-1"></i> Credit / Debit Cards</span>
            <strong>₹ 0.86 Cr (16%)</strong>
          </div>
          <div class="progress" style="height: 7px;">
            <div class="progress-bar bg-success" style="width: 16%"></div>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span class="fw-semibold text-secondary"><i class="bi bi-cash me-1"></i> Cash Counter</span>
            <strong>₹ 0.66 Cr (12%)</strong>
          </div>
          <div class="progress" style="height: 7px;">
            <div class="progress-bar bg-secondary" style="width: 12%"></div>
          </div>
        </div>

        <hr>

        <div class="p-2 bg-light rounded border font-size-12">
          <div class="d-flex justify-content-between mb-1">
            <span class="text-muted">Total Concessions & Waivers:</span>
            <strong class="text-danger">₹ 24.5 Lakhs (64 Students)</strong>
          </div>
          <div class="d-flex justify-content-between">
            <span class="text-muted">RTE / EWS Free Quota (25%):</span>
            <span class="badge bg-primary-subtle text-primary border">Govt Reimbursed</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Rapid Navigation Shortcuts -->
<div class="row g-3 mb-4">
  <div class="col-md-3">
    <div class="card p-3 border shadow-sm text-center h-100 hover-card">
      <div class="rounded-circle bg-primary-subtle text-primary p-3 d-inline-block mx-auto mb-2">
        <i class="bi bi-receipt-cutoff font-size-24"></i>
      </div>
      <h6 class="fw-bold mb-1">Issue Fee Invoice</h6>
      <p class="text-muted font-size-12 mb-3">Bulk bill creation for upcoming academic terms & slabs</p>
      <a href="<?php echo base_url('modules/fees/invoice-generation.php'); ?>" class="btn btn-sm btn-outline-primary mt-auto">Generate Bills</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card p-3 border shadow-sm text-center h-100 hover-card">
      <div class="rounded-circle bg-danger-subtle text-danger p-3 d-inline-block mx-auto mb-2">
        <i class="bi bi-bell-fill font-size-24"></i>
      </div>
      <h6 class="fw-bold mb-1">Due Reminders & SMS</h6>
      <p class="text-muted font-size-12 mb-3">Automated payment link dispatch via WhatsApp & SMS</p>
      <a href="<?php echo base_url('modules/fees/due-reminders.php'); ?>" class="btn btn-sm btn-outline-danger mt-auto">Send Reminders</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card p-3 border shadow-sm text-center h-100 hover-card">
      <div class="rounded-circle bg-warning-subtle text-warning p-3 d-inline-block mx-auto mb-2">
        <i class="bi bi-tag-fill font-size-24"></i>
      </div>
      <h6 class="fw-bold mb-1">Concessions & Scholarships</h6>
      <p class="text-muted font-size-12 mb-3">Sibling discount, staff ward waiver & merit approvals</p>
      <a href="<?php echo base_url('modules/fees/concessions.php'); ?>" class="btn btn-sm btn-outline-warning mt-auto">Manage Waivers</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card p-3 border shadow-sm text-center h-100 hover-card">
      <div class="rounded-circle bg-success-subtle text-success p-3 d-inline-block mx-auto mb-2">
        <i class="bi bi-bank font-size-24"></i>
      </div>
      <h6 class="fw-bold mb-1">Bank Reconciliation</h6>
      <p class="text-muted font-size-12 mb-3">Direct auto-match with SBI, HDFC & ICICI statements</p>
      <a href="<?php echo base_url('modules/fees/payment-reconciliation.php'); ?>" class="btn btn-sm btn-outline-success mt-auto">Reconcile Bank</a>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
