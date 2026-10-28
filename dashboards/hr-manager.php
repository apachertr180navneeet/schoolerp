<?php
/**
 * EDUSYS PRO - HR & Payroll Operations Dashboard
 * Dedicated view for HR Lead: Anjali Saxena (Staff Directory, Attendance & Payroll)
 */
$page_title = "HR & Payroll Operations Dashboard";
$page_desc = "Staff service registers, biometric punch logs, leave approvals, and payroll for Anjali Saxena.";
$active_module = "dashboard";
$active_submodule = "hr-manager.php";
$depth = 1;

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/sidebar.php';
require_once __DIR__ . '/../includes/topbar.php';
?>

<!-- HR Banner -->
<div class="erp-card mb-4 bg-gradient text-dark border-primary border-opacity-25 shadow-xs" style="background: linear-gradient(135deg, #eef2ff 0%, #e0e7ff 100%);">
  <div class="erp-card-body p-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div class="d-flex align-items-center gap-3">
        <div class="avatar-lg rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold font-size-24" style="width: 60px; height: 60px;">
          HR
        </div>
        <div>
          <div class="d-flex align-items-center gap-2 mb-1">
            <h4 class="fw-bold text-dark mb-0">Anjali Saxena</h4>
            <span class="badge bg-primary text-white font-size-12 px-2.5 py-1 rounded-pill">HR & Payroll Manager</span>
            <span class="badge bg-success text-white font-size-11">Biometric Sync OK</span>
          </div>
          <div class="font-size-13 text-muted">
            <span>Staff ID: <strong class="text-dark font-mono">HR-2018-0021</strong></span>
            <span class="mx-2">•</span>
            <span>Total Staff Strength: <strong class="text-dark">122 Employees</strong></span>
            <span class="mx-2">•</span>
            <span>Payroll Cycle: <strong class="text-success">November 2024 Active</strong></span>
          </div>
        </div>
      </div>
      <div class="d-flex align-items-center gap-2">
        <a href="<?php echo base_url('modules/hr-payroll/leave-management.php'); ?>" class="btn btn-primary btn-sm fw-bold px-3 py-2 rounded-pill">
          <i class="bi bi-calendar2-range me-1"></i> Leave Approvals
        </a>
      </div>
    </div>
  </div>
</div>

<!-- KPI Row: Personalized for HR -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Total Staff Count</h6>
        <div class="kpi-value">122</div>
        <div class="kpi-trend positive"><i class="bi bi-people-fill"></i> 84 Faculty • 38 Non-Teaching</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-badge-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Present Today</h6>
        <div class="kpi-value text-success">118 Staff</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Biometric 100% Punctual</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-fingerprint"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Staff on Leave</h6>
        <div class="kpi-value text-warning">4 Staff</div>
        <div class="kpi-trend"><i class="bi bi-calendar-x"></i> 2 Medical • 2 Casual</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-x-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Payroll Status</h6>
        <div class="kpi-value text-info">Ready</div>
        <div class="kpi-trend positive"><i class="bi bi-check-all"></i> Nov 2024 Salary Slips</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cash-stack"></i></div>
    </div>
  </div>
</div>

<!-- Pending Leave Approvals Table -->
<div class="erp-card mb-4">
  <div class="erp-card-header">
    <h5 class="erp-card-title"><i class="bi bi-calendar-check text-primary"></i> Pending Staff Leave Requests</h5>
    <span class="badge bg-warning text-dark font-size-11">4 Pending Approvals</span>
  </div>
  <div class="erp-table-responsive">
    <table class="erp-table">
      <thead>
        <tr>
          <th>Employee Name</th>
          <th>Designation</th>
          <th>Leave Type</th>
          <th>Duration</th>
          <th>Reason</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><strong>Meenakshi Sundaram</strong></td>
          <td>TGT Chemistry</td>
          <td><span class="badge bg-danger-subtle text-danger">Medical Leave</span></td>
          <td>01 Nov - 02 Nov (2 Days)</td>
          <td>Doctor appointment & medical tests</td>
          <td>
            <div class="d-flex gap-1">
              <button class="btn btn-sm btn-success py-1 px-2 font-size-11 fw-bold">Approve</button>
              <button class="btn btn-sm btn-outline-danger py-1 px-2 font-size-11">Reject</button>
            </div>
          </td>
        </tr>
        <tr>
          <td><strong>Rohan Joshi</strong></td>
          <td>TGT Mathematics</td>
          <td><span class="badge bg-info-subtle text-info">Casual Leave</span></td>
          <td>04 Nov (1 Day)</td>
          <td>Family function out of station</td>
          <td>
            <div class="d-flex gap-1">
              <button class="btn btn-sm btn-success py-1 px-2 font-size-11 fw-bold">Approve</button>
              <button class="btn btn-sm btn-outline-danger py-1 px-2 font-size-11">Reject</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
