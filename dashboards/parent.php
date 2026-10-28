<?php
/**
 * EDUSYS PRO - Parent Guardian Portal
 * Dedicated view for Parent: Rajesh Sharma (Parent of Aarav Sharma & Ananya Sharma)
 */
$page_title = "Parent Guardian Portal";
$page_desc = "Dedicated parent desk for Rajesh Sharma (Ward: Aarav Sharma - Class 10-A).";
$active_module = "dashboard";
$active_submodule = "parent.php";
$depth = 1;

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/sidebar.php';
require_once __DIR__ . '/../includes/topbar.php';
?>

<!-- Parent Family Banner with Multi-Child Switcher -->
<div class="erp-card mb-4 bg-gradient text-dark border-danger border-opacity-25 shadow-xs" style="background: linear-gradient(135deg, #fff1f2 0%, #ffe4e6 100%);">
  <div class="erp-card-body p-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div class="d-flex align-items-center gap-3">
        <div class="avatar-lg rounded-circle bg-danger text-white d-flex align-items-center justify-content-center fw-bold font-size-24" style="width: 60px; height: 60px;">
          RS
        </div>
        <div>
          <div class="d-flex align-items-center gap-2 mb-1">
            <h4 class="fw-bold text-dark mb-0">Rajesh Sharma</h4>
            <span class="badge bg-danger text-white font-size-12 px-2.5 py-1 rounded-pill">Parent Account</span>
            <span class="badge bg-success-subtle text-success border border-success border-opacity-25 font-size-11">2 Wards Registered</span>
          </div>
          <div class="font-size-13 text-muted">
            <span>Parent ID: <strong class="text-dark font-mono">PAR-2021-9811</strong></span>
            <span class="mx-2">•</span>
            <span>Mobile: <strong class="text-dark">+91 98110 44812</strong></span>
            <span class="mx-2">•</span>
            <span>Address: <strong class="text-dark">Sector 62, Noida</strong></span>
          </div>
        </div>
      </div>

      <!-- Multi-Child Selector -->
      <div class="d-flex align-items-center gap-2 bg-white p-1.5 rounded-pill border shadow-xs">
        <button type="button" class="btn btn-danger btn-sm rounded-pill fw-bold px-3">
          <i class="bi bi-person-fill me-1"></i> Aarav (10-A)
        </button>
        <button type="button" class="btn btn-light btn-sm rounded-pill fw-semibold px-3 text-muted">
          <i class="bi bi-person me-1"></i> Ananya (5-B)
        </button>
      </div>
    </div>
  </div>
</div>

<!-- KPI Row: Personalized for Parent -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Aarav's Today Status</h6>
        <div class="kpi-value text-success">In Campus</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Gate In: 07:55 AM (On Time)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Term 1 Assessment</h6>
        <div class="kpi-value text-primary">93.8% (A1)</div>
        <div class="kpi-trend positive"><i class="bi bi-award-fill"></i> Class Rank #2 of 42</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-mortarboard-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>School Bus Live</h6>
        <div class="kpi-value text-warning">Bus #12</div>
        <div class="kpi-trend"><i class="bi bi-geo-alt"></i> Route 12 • Driver: Ramesh</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-bus-front-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Fee Balance Dues</h6>
        <div class="kpi-value text-success">₹0.00</div>
        <div class="kpi-trend positive"><i class="bi bi-check2-circle"></i> Term 2 Due: 10 Jan 2025</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cash-stack"></i></div>
    </div>
  </div>
</div>

<!-- Live Bus Tracking Card & Academic Report Card -->
<div class="row g-4 mb-4">
  <!-- Live School Bus GPS -->
  <div class="col-lg-6">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-bus-front text-warning"></i> School Bus Live GPS Tracker (Bus #12)</h5>
        <span class="badge bg-success text-white font-size-11">GPS Live (5s ping)</span>
      </div>
      <div class="erp-card-body">
        <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded-3 border mb-3">
          <div>
            <h6 class="fw-bold text-dark mb-1">Sector 62 &rarr; Model Town &rarr; School</h6>
            <span class="font-size-12 text-muted">Vehicle: <strong class="font-mono text-dark">DL-1PC-4819</strong> • Speed: <strong class="text-success">38 km/h</strong></span>
          </div>
          <a href="tel:+919811044219" class="btn btn-outline-success btn-sm fw-bold px-3">
            <i class="bi bi-telephone-fill me-1"></i> Call Driver
          </a>
        </div>

        <div class="p-3 bg-success bg-opacity-10 border border-success border-opacity-25 rounded-3 mb-3">
          <div class="d-flex align-items-center gap-2 mb-1">
            <i class="bi bi-check-circle-fill text-success"></i>
            <strong class="font-size-13 text-dark">Morning Pickup Completed</strong>
          </div>
          <p class="font-size-12 text-muted mb-0">Boarded at Sector 62 Stop at 07:22 AM. Arrived at School Gate at 07:55 AM.</p>
        </div>

        <div class="p-3 bg-info bg-opacity-10 border border-info border-opacity-25 rounded-3">
          <div class="d-flex align-items-center justify-content-between">
            <span class="font-size-12 text-dark">Afternoon Drop ETA at Sector 62:</span>
            <strong class="font-size-13 text-primary">02:45 PM (On Schedule)</strong>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Today's Attendance & Teacher Communication -->
  <div class="col-lg-6">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-chat-left-dots text-primary"></i> Class Teacher Remarks & Diary</h5>
        <span class="badge bg-primary-subtle text-primary border border-primary border-opacity-25 font-size-11">Vikram Rathore (10-A)</span>
      </div>
      <div class="erp-card-body p-0">
        <div class="list-group list-group-flush font-size-13">
          <div class="list-group-item p-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <strong class="text-dark">Physics Lab Practical Record</strong>
              <small class="text-muted">Today, 09:15 AM</small>
            </div>
            <p class="text-muted font-size-12 mb-0">
              "Aarav performed very well in today's Ohm's Law experiment. Please ensure he submits the graph plot by Friday."
            </p>
          </div>
          <div class="list-group-item p-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <strong class="text-dark">PTM Scheduled for Saturday</strong>
              <span class="badge bg-warning text-dark font-size-11">02 Nov 2024</span>
            </div>
            <p class="text-muted font-size-12 mb-0">
              Term 1 CCE Progress Card one-on-one discussion with Principal & Subject Teachers. Time Slot: 09:30 AM.
            </p>
          </div>
          <div class="list-group-item p-3 bg-light">
            <div class="d-flex justify-content-between align-items-center">
              <span class="text-muted font-size-12">Need to leave a note for Class Teacher?</span>
              <a href="<?php echo base_url('modules/communication/notice-board.php'); ?>" class="btn btn-outline-primary btn-sm py-1 px-3 font-size-12 fw-bold">Send Message</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Term 1 Performance Card & Fee Receipts -->
<div class="row g-4 mb-4">
  <div class="col-lg-7">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-award text-success"></i> Aarav's Term 1 CBSE CCE Progress Card</h5>
        <a href="<?php echo base_url('index.php#cce-report'); ?>" class="btn btn-sm btn-outline-success font-size-12 fw-bold">Download Official PDF</a>
      </div>
      <div class="erp-table-responsive">
        <table class="erp-table text-center">
          <thead>
            <tr>
              <th class="text-start">Subject</th>
              <th>Theory</th>
              <th>Internal</th>
              <th>Total</th>
              <th>CBSE Grade</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-start fw-bold">041 • Mathematics Standard</td>
              <td>76 / 80</td>
              <td>19 / 20</td>
              <td class="fw-bold text-success">95 / 100</td>
              <td><span class="badge bg-success">A1</span></td>
            </tr>
            <tr>
              <td class="text-start fw-bold">086 • Science & Technology</td>
              <td>72 / 80</td>
              <td>18 / 20</td>
              <td class="fw-bold text-success">90 / 100</td>
              <td><span class="badge bg-success">A2</span></td>
            </tr>
            <tr>
              <td class="text-start fw-bold">184 • English Language & Lit</td>
              <td>78 / 80</td>
              <td>20 / 20</td>
              <td class="fw-bold text-success">98 / 100</td>
              <td><span class="badge bg-success">A1</span></td>
            </tr>
            <tr class="table-light fw-bold">
              <td class="text-start">Overall Aggregate</td>
              <td colspan="2">Term 1 Summary</td>
              <td class="text-primary font-size-14">469 / 500 (93.8%)</td>
              <td><span class="badge bg-success font-size-12">Grade A1</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-receipt text-info"></i> Fee Receipts & Payment Ledger</h5>
        <span class="badge bg-success text-white font-size-11">No Outstanding Dues</span>
      </div>
      <div class="erp-card-body">
        <div class="p-3 bg-light rounded-3 border mb-3">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <span class="text-muted font-size-12">Receipt #REC-2024-9182</span>
            <span class="badge bg-success text-white font-size-11">PAID</span>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <strong class="text-dark">Term 1 Tuition & Transport Fee</strong>
            <strong class="text-success font-size-14">₹28,500.00</strong>
          </div>
          <small class="text-muted font-size-11 d-block mt-1">Paid online via Razorpay on 10 Oct 2024</small>
        </div>

        <div class="p-3 bg-light rounded-3 border mb-3">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <span class="text-muted font-size-12">Next Installment (Term 2)</span>
            <span class="badge bg-info-subtle text-info font-size-11">Opens 01 Jan 2025</span>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <strong class="text-dark">Term 2 Academic & Lab Fee</strong>
            <strong class="text-dark font-size-14">₹28,500.00</strong>
          </div>
          <small class="text-muted font-size-11 d-block mt-1">Due date: 10 Jan 2025 (Grace period till 15 Jan)</small>
        </div>

        <button type="button" class="btn btn-primary btn-sm w-100 fw-bold py-2" disabled>
          <i class="bi bi-credit-card-2-front me-1"></i> Term 2 Opens in 64 Days
        </button>
      </div>
    </div>
  </div>
</div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
