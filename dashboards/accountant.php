<?php
/**
 * EDUSYS PRO - Accountant Fee & Ledger Dashboard
 * Dedicated view for Finance Head: M. K. Sharma (Chief Institutional Accountant)
 */
$page_title = "Accountant Fee & Ledger Dashboard";
$page_desc = "Dedicated counter POS and fee reconciliation desk for M. K. Sharma.";
$active_module = "dashboard";
$active_submodule = "accountant.php";
$depth = 1;

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/sidebar.php';
require_once __DIR__ . '/../includes/topbar.php';
?>

<!-- Accountant Header Banner -->
<div class="erp-card mb-4 bg-gradient text-dark border-info border-opacity-25 shadow-xs" style="background: linear-gradient(135deg, #ecfeff 0%, #cffafe 100%);">
  <div class="erp-card-body p-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div class="d-flex align-items-center gap-3">
        <div class="avatar-lg rounded-circle bg-info text-white d-flex align-items-center justify-content-center fw-bold font-size-24" style="width: 60px; height: 60px;">
          AC
        </div>
        <div>
          <div class="d-flex align-items-center gap-2 mb-1">
            <h4 class="fw-bold text-dark mb-0">M. K. Sharma</h4>
            <span class="badge bg-info text-white font-size-12 px-2.5 py-1 rounded-pill">Chief Accountant</span>
            <span class="badge bg-success-subtle text-success border border-success border-opacity-25 font-size-11">Counter POS #01 Active</span>
          </div>
          <div class="font-size-13 text-muted">
            <span>Staff ID: <strong class="text-dark font-mono">ACC-2016-0188</strong></span>
            <span class="mx-2">•</span>
            <span>Terminal: <strong class="text-dark">Cash Desk & UPI Dynamic POS</strong></span>
            <span class="mx-2">•</span>
            <span>Active Session: <strong class="text-primary">2024–2025</strong></span>
          </div>
        </div>
      </div>
      <div class="d-flex align-items-center gap-2">
        <a href="<?php echo base_url('modules/fees/fee-collection.php'); ?>" class="btn btn-info text-white btn-sm fw-bold px-3 py-2 rounded-pill">
          <i class="bi bi-cash-coin me-1"></i> Launch 3-Click Fee POS
        </a>
        <a href="<?php echo base_url('modules/fees/defaulters-list.php'); ?>" class="btn btn-outline-danger btn-sm fw-bold px-3 py-2 rounded-pill">
          <i class="bi bi-exclamation-octagon me-1"></i> Defaulters Ledger
        </a>
      </div>
    </div>
  </div>
</div>

<!-- KPI Row: Personalized for Accountant -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Today's Collections</h6>
        <div class="kpi-value text-success">₹3,48,500</div>
        <div class="kpi-trend positive"><i class="bi bi-receipt"></i> 28 Receipts (Avg ₹12,446)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cash-coin"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Month-to-Date YTD</h6>
        <div class="kpi-value text-primary">₹4.21 Cr</div>
        <div class="kpi-trend positive"><i class="bi bi-graph-up-arrow"></i> 87% Recovery Rate</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-currency-rupee"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Fee Defaulters</h6>
        <div class="kpi-value text-danger">142 Pupils</div>
        <div class="kpi-trend negative"><i class="bi bi-clock-history"></i> ₹18.4 Lakhs Overdue</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-exclamation-circle-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Bank Reconciliation</h6>
        <div class="kpi-value text-info">99.2%</div>
        <div class="kpi-trend positive"><i class="bi bi-check-all"></i> HDFC & ICICI Synced</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-bank"></i></div>
    </div>
  </div>
</div>

<!-- Quick Fee Collection Desk & Real-Time Feed -->
<div class="row g-4 mb-4">
  <!-- 3-Click POS Quick Counter Desk -->
  <div class="col-lg-5">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-lightning-charge-fill text-warning"></i> Quick Counter Fee POS</h5>
        <span class="badge bg-success text-white font-size-11">Thermal & A4 Print</span>
      </div>
      <div class="erp-card-body">
        <form onsubmit="event.preventDefault(); alert('Demo fee collection simulated! 3-Ply Receipt REC-2024-9183 generated.');">
          <div class="mb-3">
            <label class="form-label font-size-12 fw-bold text-muted">Student Admission # or Roll #</label>
            <div class="input-group">
              <input type="text" class="form-control font-size-13" placeholder="ADM-2021-0842 or 1014" value="ADM-2021-0842">
              <button class="btn btn-outline-primary font-size-13" type="button">Fetch</button>
            </div>
            <small class="text-success font-size-11 d-block mt-1">Pupil Found: <strong>Aarav Sharma (Class 10-A)</strong></small>
          </div>

          <div class="p-2.5 bg-light rounded-3 border mb-3 font-size-13">
            <div class="d-flex justify-content-between mb-1">
              <span>Term 1 Fee Balance:</span>
              <strong class="text-success">₹0.00 (Cleared)</strong>
            </div>
            <div class="d-flex justify-content-between mb-1">
              <span>Advance Deposit (Term 2):</span>
              <strong class="text-dark">₹28,500.00</strong>
            </div>
            <div class="d-flex justify-content-between">
              <span>Receipt Copy Mode:</span>
              <strong class="text-primary">3-Ply (Student/Acct/Bank)</strong>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label font-size-12 fw-bold text-muted">Payment Mode</label>
            <div class="d-flex gap-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payMode" id="modeUpi" checked>
                <label class="form-check-label font-size-12" for="modeUpi">UPI QR</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payMode" id="modeCard">
                <label class="form-check-label font-size-12" for="modeCard">Card POS</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payMode" id="modeCash">
                <label class="form-check-label font-size-12" for="modeCash">Cash</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payMode" id="modeCheque">
                <label class="form-check-label font-size-12" for="modeCheque">Cheque</label>
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-success btn-sm w-100 fw-bold py-2 font-size-13">
            <i class="bi bi-printer-fill me-1"></i> Collect Fee & Print Receipt (3-Ply)
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Real-Time Counter Transactions Feed -->
  <div class="col-lg-7">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-clock-history text-primary"></i> Real-Time Fee Collections Feed (Today)</h5>
        <span class="badge bg-primary-subtle text-primary border border-primary border-opacity-25 font-size-11">28 Transactions</span>
      </div>
      <div class="erp-table-responsive">
        <table class="erp-table">
          <thead>
            <tr>
              <th>Receipt #</th>
              <th>Student Name</th>
              <th>Class</th>
              <th>Mode</th>
              <th>Amount</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><span class="font-mono text-primary fw-bold">REC-2024-9182</span></td>
              <td><strong>Aarav Sharma</strong></td>
              <td>Class 10-A</td>
              <td><span class="badge bg-primary-subtle text-primary">Razorpay Online</span></td>
              <td class="fw-bold text-success">₹28,500</td>
              <td><button class="btn btn-sm btn-outline-secondary py-0 px-2 font-size-11"><i class="bi bi-printer"></i> Slip</button></td>
            </tr>
            <tr>
              <td><span class="font-mono text-primary fw-bold">REC-2024-9181</span></td>
              <td><strong>Diya Patel</strong></td>
              <td>Class 10-A</td>
              <td><span class="badge bg-info-subtle text-info">HDFC NetBanking</span></td>
              <td class="fw-bold text-success">₹28,500</td>
              <td><button class="btn btn-sm btn-outline-secondary py-0 px-2 font-size-11"><i class="bi bi-printer"></i> Slip</button></td>
            </tr>
            <tr>
              <td><span class="font-mono text-primary fw-bold">REC-2024-9180</span></td>
              <td><strong>Meera Reddy</strong></td>
              <td>Class 8-A</td>
              <td><span class="badge bg-warning-subtle text-warning">UPI QR POS</span></td>
              <td class="fw-bold text-success">₹24,200</td>
              <td><button class="btn btn-sm btn-outline-secondary py-0 px-2 font-size-11"><i class="bi bi-printer"></i> Slip</button></td>
            </tr>
            <tr>
              <td><span class="font-mono text-primary fw-bold">REC-2024-9179</span></td>
              <td><strong>Kabir Mehta</strong></td>
              <td>Class 6-B</td>
              <td><span class="badge bg-light text-dark border">Cash Counter</span></td>
              <td class="fw-bold text-success">₹21,800</td>
              <td><button class="btn btn-sm btn-outline-secondary py-0 px-2 font-size-11"><i class="bi bi-printer"></i> Slip</button></td>
            </tr>
            <tr>
              <td><span class="font-mono text-primary fw-bold">REC-2024-9178</span></td>
              <td><strong>Rohan Joshi</strong></td>
              <td>Class 9-A</td>
              <td><span class="badge bg-warning-subtle text-warning">UPI QR POS</span></td>
              <td class="fw-bold text-success">₹26,000</td>
              <td><button class="btn btn-sm btn-outline-secondary py-0 px-2 font-size-11"><i class="bi bi-printer"></i> Slip</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Defaulters Summary & Payment Modes -->
<div class="row g-4 mb-4">
  <div class="col-lg-6">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-pie-chart text-primary"></i> Payment Modes Distribution (YTD)</h5>
        <span class="badge bg-light text-muted border font-size-11">Total: ₹4.21 Cr</span>
      </div>
      <div class="erp-card-body">
        <div class="row g-2 text-center mb-3">
          <div class="col-3">
            <div class="p-2 bg-light rounded-3 border">
              <strong class="text-primary font-size-14 d-block">45%</strong>
              <small class="text-muted font-size-11">UPI QR</small>
            </div>
          </div>
          <div class="col-3">
            <div class="p-2 bg-light rounded-3 border">
              <strong class="text-info font-size-14 d-block">35%</strong>
              <small class="text-muted font-size-11">NetBanking</small>
            </div>
          </div>
          <div class="col-3">
            <div class="p-2 bg-light rounded-3 border">
              <strong class="text-dark font-size-14 d-block">15%</strong>
              <small class="text-muted font-size-11">Cash POS</small>
            </div>
          </div>
          <div class="col-3">
            <div class="p-2 bg-light rounded-3 border">
              <strong class="text-warning font-size-14 d-block">5%</strong>
              <small class="text-muted font-size-11">Cheque</small>
            </div>
          </div>
        </div>
        <p class="font-size-12 text-muted mb-0">95% of parents utilize zero-touch digital payments (UPI & Payment Gateway), ensuring instant automated bank ledger posting.</p>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-exclamation-triangle text-danger"></i> Class-wise Defaulter Notice Queue</h5>
        <a href="<?php echo base_url('modules/fees/defaulters-list.php'); ?>" class="btn btn-sm btn-outline-danger font-size-12 fw-bold">Send SMS Reminders</a>
      </div>
      <div class="erp-card-body p-0">
        <div class="list-group list-group-flush font-size-13">
          <div class="list-group-item d-flex justify-content-between align-items-center p-3">
            <div>
              <strong>Senior Wing (Classes 9–12)</strong>
              <small class="text-muted d-block font-size-11">24 Defaulters • ₹4.8 Lakhs overdue</small>
            </div>
            <span class="badge bg-danger text-white">Critical (LOC Pending)</span>
          </div>
          <div class="list-group-item d-flex justify-content-between align-items-center p-3">
            <div>
              <strong>Middle Wing (Classes 6–8)</strong>
              <small class="text-muted d-block font-size-11">48 Defaulters • ₹6.2 Lakhs overdue</small>
            </div>
            <span class="badge bg-warning text-dark">Reminder 2 Sent</span>
          </div>
          <div class="list-group-item d-flex justify-content-between align-items-center p-3">
            <div>
              <strong>Primary Wing (Classes 1–5)</strong>
              <small class="text-muted d-block font-size-11">70 Defaulters • ₹7.4 Lakhs overdue</small>
            </div>
            <span class="badge bg-info text-white">Reminder 1 Sent</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
