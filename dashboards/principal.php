<?php
/**
 * EDUSYS PRO - Principal Academic Oversight Desk
 * Dedicated view for Executive Leadership: Dr. Sunita Rao (Principal & Academic Director)
 */
$page_title = "Principal Academic Oversight Desk";
$page_desc = "Central leadership console for Dr. Sunita Rao (CBSE Board Compliance, Faculty Oversight & Approvals).";
$active_module = "dashboard";
$active_submodule = "principal.php";
$depth = 1;

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/sidebar.php';
require_once __DIR__ . '/../includes/topbar.php';
?>

<!-- Principal Executive Header Banner -->
<div class="erp-card mb-4 bg-gradient text-dark border-success border-opacity-25 shadow-xs" style="background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);">
  <div class="erp-card-body p-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div class="d-flex align-items-center gap-3">
        <div class="avatar-lg rounded-circle bg-success text-white d-flex align-items-center justify-content-center fw-bold font-size-24" style="width: 60px; height: 60px;">
          PR
        </div>
        <div>
          <div class="d-flex align-items-center gap-2 mb-1">
            <h4 class="fw-bold text-dark mb-0">Dr. Sunita Rao, Ph.D.</h4>
            <span class="badge bg-success text-white font-size-12 px-2.5 py-1 rounded-pill">Principal & Academic Director</span>
            <span class="badge bg-primary-subtle text-primary border border-primary border-opacity-25 font-size-11">School Code: 70142</span>
          </div>
          <div class="font-size-13 text-muted">
            <span>Affiliation No: <strong class="text-dark font-mono">2130892</strong></span>
            <span class="mx-2">•</span>
            <span>UDISE+ Code: <strong class="text-dark font-mono">09150100412</strong></span>
            <span class="mx-2">•</span>
            <span>NEP 2020 Accreditation: <strong class="text-success">Grade A+ Certified</strong></span>
          </div>
        </div>
      </div>
      <div class="d-flex align-items-center gap-2">
        <a href="<?php echo base_url('modules/compliance/cbse-reporting.php'); ?>" class="btn btn-success text-white btn-sm fw-bold px-3 py-2 rounded-pill">
          <i class="bi bi-patch-check me-1"></i> CBSE LOC Sign-Off
        </a>
        <a href="<?php echo base_url('modules/academics/curriculum-planning.php'); ?>" class="btn btn-outline-success text-dark btn-sm fw-bold px-3 py-2 rounded-pill">
          <i class="bi bi-journal-text me-1"></i> Curriculum Oversight
        </a>
      </div>
    </div>
  </div>
</div>

<!-- KPI Row: Personalized for Principal -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Whole School Students</h6>
        <div class="kpi-value">1,878</div>
        <div class="kpi-trend positive"><i class="bi bi-people-fill"></i> 95.4% Present Today (1,792)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-mortarboard-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Teaching Faculty on Duty</h6>
        <div class="kpi-value text-success">118 / 122</div>
        <div class="kpi-trend positive"><i class="bi bi-person-workspace"></i> 4 on Approved Leave</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>CBSE LOC Verification</h6>
        <div class="kpi-value text-info">100% Ready</div>
        <div class="kpi-trend positive"><i class="bi bi-check-all"></i> Grade 10 & 12 Finalized</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Executive Approvals</h6>
        <div class="kpi-value text-warning">6 Pending</div>
        <div class="kpi-trend"><i class="bi bi-clock"></i> 3 Leaves • 2 Concessions</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-inbox-fill"></i></div>
    </div>
  </div>
</div>

<!-- Principal Approvals Queue & Academic Performance -->
<div class="row g-4 mb-4">
  <!-- Approvals Queue -->
  <div class="col-lg-6">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-pen-fill text-warning"></i> Principal Sign-Off & Approvals Desk</h5>
        <span class="badge bg-warning text-dark font-size-11">6 Actions Required</span>
      </div>
      <div class="erp-card-body p-0">
        <div class="list-group list-group-flush font-size-13">
          <div class="list-group-item p-3 d-flex justify-content-between align-items-center">
            <div>
              <strong class="d-block text-dark">Staff Leave: Meenakshi Sundaram (TGT Chem)</strong>
              <small class="text-muted">Medical Leave • 2 Days (01-02 Nov 2024)</small>
            </div>
            <div class="d-flex gap-1">
              <button class="btn btn-sm btn-success py-1 px-2.5 font-size-11 fw-bold">Approve</button>
              <button class="btn btn-sm btn-outline-danger py-1 px-2 font-size-11">Reject</button>
            </div>
          </div>
          <div class="list-group-item p-3 d-flex justify-content-between align-items-center">
            <div>
              <strong class="d-block text-dark">Fee Concession: Diya Patel (Class 10-A)</strong>
              <small class="text-muted">Sibling Discount Request (20% Tuition Waiver)</small>
            </div>
            <div class="d-flex gap-1">
              <button class="btn btn-sm btn-success py-1 px-2.5 font-size-11 fw-bold">Approve</button>
              <button class="btn btn-sm btn-outline-secondary py-1 px-2 font-size-11">Review</button>
            </div>
          </div>
          <div class="list-group-item p-3 d-flex justify-content-between align-items-center">
            <div>
              <strong class="d-block text-dark">Annual Sports Day Circular & Budget</strong>
              <small class="text-muted">Sports Department Requisition (₹1,25,000)</small>
            </div>
            <div class="d-flex gap-1">
              <button class="btn btn-sm btn-success py-1 px-2.5 font-size-11 fw-bold">Sign-Off</button>
              <button class="btn btn-sm btn-outline-secondary py-1 px-2 font-size-11">Details</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Academic Grade Distribution Overview -->
  <div class="col-lg-6">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-award text-success"></i> CBSE Grade Performance (Class 10 & 12 Term 1)</h5>
        <span class="badge bg-success-subtle text-success border border-success border-opacity-25 font-size-11">Pass Rate: 99.4%</span>
      </div>
      <div class="erp-card-body">
        <div class="row g-2 text-center mb-3">
          <div class="col-3">
            <div class="p-2.5 bg-success bg-opacity-10 border border-success border-opacity-25 rounded-3">
              <h5 class="fw-bold text-success mb-0">64%</h5>
              <small class="text-muted font-size-11">A1 & A2 (90%+)</small>
            </div>
          </div>
          <div class="col-3">
            <div class="p-2.5 bg-primary bg-opacity-10 border border-primary border-opacity-25 rounded-3">
              <h5 class="fw-bold text-primary mb-0">28%</h5>
              <small class="text-muted font-size-11">B1 & B2 (75-89%)</small>
            </div>
          </div>
          <div class="col-3">
            <div class="p-2.5 bg-warning bg-opacity-10 border border-warning border-opacity-25 rounded-3">
              <h5 class="fw-bold text-warning mb-0">7%</h5>
              <small class="text-muted font-size-11">C1 & C2 (60-74%)</small>
            </div>
          </div>
          <div class="col-3">
            <div class="p-2.5 bg-light rounded-3 border">
              <h5 class="fw-bold text-muted mb-0">1%</h5>
              <small class="text-muted font-size-11">Needs Support</small>
            </div>
          </div>
        </div>
        <p class="font-size-12 text-muted mb-3">
          Curriculum delivery across all 4 streams (Science, Commerce, Humanities, Vocational) is pacing on schedule for Board Exams 2025.
        </p>
        <a href="<?php echo base_url('modules/examinations/cce-marks-entry.php'); ?>" class="btn btn-outline-success btn-sm w-100 fw-bold">
          Open Full School Academic Analytics &rarr;
        </a>
      </div>
    </div>
  </div>
</div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
