<?php
/**
 * EDUSYS PRO - Admissions CRM Desk
 * Dedicated view for Admissions Head: Rashmi Sen (Lead Funnel, Verification & Merit Lists)
 */
$page_title = "Admissions CRM Desk";
$page_desc = "Student enrollment lifecycle, inquiry funnels, and document verification for Rashmi Sen.";
$active_module = "dashboard";
$active_submodule = "admission-officer.php";
$depth = 1;

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/sidebar.php';
require_once __DIR__ . '/../includes/topbar.php';
?>

<!-- Admissions Header Banner -->
<div class="erp-card mb-4 bg-gradient text-dark border-danger border-opacity-25 shadow-xs" style="background: linear-gradient(135deg, #fff1f2 0%, #ffe4e6 100%);">
  <div class="erp-card-body p-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div class="d-flex align-items-center gap-3">
        <div class="avatar-lg rounded-circle bg-danger text-white d-flex align-items-center justify-content-center fw-bold font-size-24" style="width: 60px; height: 60px;">
          AO
        </div>
        <div>
          <div class="d-flex align-items-center gap-2 mb-1">
            <h4 class="fw-bold text-dark mb-0">Rashmi Sen</h4>
            <span class="badge bg-danger text-white font-size-12 px-2.5 py-1 rounded-pill">Admissions Head</span>
            <span class="badge bg-primary-subtle text-primary border border-primary border-opacity-25 font-size-11">Cycle 2025–26 Open</span>
          </div>
          <div class="font-size-13 text-muted">
            <span>Staff ID: <strong class="text-dark font-mono">ADM-2019-0144</strong></span>
            <span class="mx-2">•</span>
            <span>Intake Target: <strong class="text-dark">120 Seats (Nursery to Class 11)</strong></span>
            <span class="mx-2">•</span>
            <span>Conversion Rate: <strong class="text-success">25% Confirmed</strong></span>
          </div>
        </div>
      </div>
      <div class="d-flex align-items-center gap-2">
        <a href="<?php echo base_url('modules/admissions/online-enquiry.php'); ?>" class="btn btn-danger btn-sm fw-bold px-3 py-2 rounded-pill">
          <i class="bi bi-person-plus-fill me-1"></i> New Walk-In Inquiry
        </a>
        <a href="<?php echo base_url('modules/admissions/online-applications.php'); ?>" class="btn btn-outline-danger btn-sm fw-bold px-3 py-2 rounded-pill">
          <i class="bi bi-file-earmark-check me-1"></i> Verification Queue
        </a>
      </div>
    </div>
  </div>
</div>

<!-- KPI Row: Personalized for Admissions -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Inquiries Received</h6>
        <div class="kpi-value">245</div>
        <div class="kpi-trend positive"><i class="bi bi-graph-up-arrow"></i> +32 This Week</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-chat-left-dots-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Applications Submitted</h6>
        <div class="kpi-value text-info">180</div>
        <div class="kpi-trend positive"><i class="bi bi-file-earmark-text"></i> Forms Completed</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-file-earmark-person-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Verified & Interviewed</h6>
        <div class="kpi-value text-warning">94</div>
        <div class="kpi-trend"><i class="bi bi-check2-all"></i> Docs Verified</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-patch-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Confirmed Enrolled</h6>
        <div class="kpi-value text-success">45 / 120</div>
        <div class="kpi-trend positive"><i class="bi bi-cash-stack"></i> Token Fee Collected</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-mortarboard-fill"></i></div>
    </div>
  </div>
</div>

<!-- Recent Applicant Verification Queue -->
<div class="erp-card mb-4">
  <div class="erp-card-header">
    <h5 class="erp-card-title"><i class="bi bi-person-lines-fill text-danger"></i> Recent Admission Applicants (Verification Desk)</h5>
    <span class="badge bg-danger text-white font-size-11">Session 2025–26</span>
  </div>
  <div class="erp-table-responsive">
    <table class="erp-table">
      <thead>
        <tr>
          <th>Application #</th>
          <th>Applicant Name</th>
          <th>Class Applied</th>
          <th>Parent / Contact</th>
          <th>Document Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><span class="font-mono text-danger fw-bold">APP-2025-0142</span></td>
          <td><strong>Aditi Mehra</strong></td>
          <td><span class="badge bg-primary text-white">Class 1</span></td>
          <td>Vikrant Mehra (+91 98110 55219)</td>
          <td><span class="badge bg-success-subtle text-success border border-success border-opacity-25"><i class="bi bi-check-circle"></i> Birth Cert & Aadhaar OK</span></td>
          <td><button class="btn btn-sm btn-success py-1 px-3 font-size-12 fw-bold">Issue Token</button></td>
        </tr>
        <tr>
          <td><span class="font-mono text-danger fw-bold">APP-2025-0141</span></td>
          <td><strong>Samar Pratap Singh</strong></td>
          <td><span class="badge bg-info text-white">Class 6</span></td>
          <td>Col. R. Singh (+91 99112 00129)</td>
          <td><span class="badge bg-warning-subtle text-warning border border-warning border-opacity-25"><i class="bi bi-clock"></i> Previous TC Pending</span></td>
          <td><button class="btn btn-sm btn-outline-warning text-dark py-1 px-3 font-size-12">Remind</button></td>
        </tr>
        <tr>
          <td><span class="font-mono text-danger fw-bold">APP-2025-0140</span></td>
          <td><strong>Anvi Deshmukh</strong></td>
          <td><span class="badge bg-primary text-white">Class Nursery</span></td>
          <td>Sanjay Deshmukh (+91 98711 88412)</td>
          <td><span class="badge bg-success-subtle text-success border border-success border-opacity-25"><i class="bi bi-check-circle"></i> Complete Verified</span></td>
          <td><button class="btn btn-sm btn-success py-1 px-3 font-size-12 fw-bold">Issue Token</button></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
