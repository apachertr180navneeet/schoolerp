<?php
/**
 * EDUSYS PRO - HR & Staff Operations Dashboard
 */
$page_title = "HR & Staff Operations Dashboard";
$page_desc = "Unified executive dashboard tailored for HR Lead (Anjali Saxena).";
$active_module = "dashboard";
$active_submodule = "hr-manager.php";
$depth = 1;

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/sidebar.php';
require_once __DIR__ . '/../includes/topbar.php';
?>

<!-- KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Total Students</h6>
        <div class="kpi-value">1,878</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> +142 this year</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Fee Collected YTD</h6>
        <div class="kpi-value">₹4.21 Cr</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 87% Recovery</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-currency-rupee"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Attendance Today</h6>
        <div class="kpi-value">95.4%</div>
        <div class="kpi-trend positive"><i class="bi bi-person-check"></i> 1,792 Present</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Staff on Duty</h6>
        <div class="kpi-value">118 / 122</div>
        <div class="kpi-trend positive"><i class="bi bi-person-workspace"></i> 4 on Leave</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-briefcase-fill"></i></div>
    </div>
  </div>
</div>

<!-- Analytics Charts Row -->
<div class="row g-4 mb-4">
  <div class="col-lg-8">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-bar-chart-line text-primary"></i> Fee Collection vs Operational Expenses (2024-2025)</h5>
        <span class="badge bg-light text-muted border font-size-12">Monthly (₹ Lakhs)</span>
      </div>
      <div class="erp-card-body" style="height: 320px;">
        <canvas id="revenueCollectionChart"></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-pie-chart text-success"></i> CBSE Grade Distribution</h5>
        <span class="badge bg-light text-muted border font-size-12">Class 10 Term 1</span>
      </div>
      <div class="erp-card-body d-flex align-items-center justify-content-center" style="height: 320px;">
        <canvas id="performanceDonutChart"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="row g-4 mb-4">
  <div class="col-lg-6">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-activity text-info"></i> Weekly Attendance Percentage Trend</h5>
        <span class="badge bg-success-subtle text-success">Avg: 95.1%</span>
      </div>
      <div class="erp-card-body" style="height: 280px;">
        <canvas id="attendanceTrendChart"></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-bar-chart text-warning"></i> Student Strength by Class Wings (Boys vs Girls)</h5>
        <span class="badge bg-light text-muted border font-size-12">Total: 1,878</span>
      </div>
      <div class="erp-card-body" style="height: 280px;">
        <canvas id="classStrengthChart"></canvas>
      </div>
    </div>
  </div>
</div>

<!-- Quick Shortcuts & Recent Actions -->
<div class="row g-4">
  <div class="col-lg-8">
    <div class="erp-card mb-0">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-clock-history text-primary"></i> Recent Transactions & Fee Collections</h5>
        <a href="<?php echo base_url('modules/fees/fee-collection.php'); ?>" class="fw-semibold font-size-13 text-primary text-decoration-none">Open Fee Counter &rarr;</a>
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
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="font-mono text-primary fw-bold">REC-2024-9182</td>
              <td><strong>Aarav Sharma</strong></td>
              <td>Class 10-A</td>
              <td><span class="badge bg-light text-muted border">Razorpay Online</span></td>
              <td class="fw-bold">₹28,500</td>
              <td><span class="badge-status badge-paid">Success</span></td>
            </tr>
            <tr>
              <td class="font-mono text-primary fw-bold">REC-2024-9181</td>
              <td><strong>Diya Patel</strong></td>
              <td>Class 10-A</td>
              <td><span class="badge bg-light text-muted border">Net Banking</span></td>
              <td class="fw-bold">₹28,500</td>
              <td><span class="badge-status badge-paid">Success</span></td>
            </tr>
            <tr>
              <td class="font-mono text-primary fw-bold">REC-2024-9180</td>
              <td><strong>Meera Reddy</strong></td>
              <td>Class 8-A</td>
              <td><span class="badge bg-light text-muted border">UPI (Google Pay)</span></td>
              <td class="fw-bold">₹24,200</td>
              <td><span class="badge-status badge-paid">Success</span></td>
            </tr>
            <tr>
              <td class="font-mono text-primary fw-bold">REC-2024-9179</td>
              <td><strong>Vihaan Singh</strong></td>
              <td>Class 10-B</td>
              <td><span class="badge bg-light text-muted border">HDFC Cheque</span></td>
              <td class="fw-bold">₹15,000</td>
              <td><span class="badge-status badge-partial">Partial</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="erp-card mb-0">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-bell-fill text-warning"></i> Operational Notice Board</h5>
        <a href="<?php echo base_url('modules/communication/notice-board.php'); ?>" class="fw-semibold font-size-13 text-primary text-decoration-none">View All &rarr;</a>
      </div>
      <div class="erp-card-body p-0">
        <div class="list-group list-group-flush font-size-13">
          <div class="list-group-item p-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <span class="badge bg-danger-subtle text-danger font-size-11">Urgent CBSE</span>
              <small class="text-muted">Today</small>
            </div>
            <strong class="d-block mb-1">CBSE LOC Verification Deadline</strong>
            <p class="text-muted font-size-12 mb-0">Class 10 & 12 LOC candidate lists must be finalized by 5:00 PM.</p>
          </div>

          <div class="list-group-item p-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <span class="badge bg-success-subtle text-success font-size-11">Transport</span>
              <small class="text-muted">Yesterday</small>
            </div>
            <strong class="d-block mb-1">Route 4 Bus Route Shift</strong>
            <p class="text-muted font-size-12 mb-0">Bus 04 morning pickup adjusted by 10 mins due to flyover construction.</p>
          </div>

          <div class="list-group-item p-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <span class="badge bg-info-subtle text-info font-size-11">Academic</span>
              <small class="text-muted">25 Oct</small>
            </div>
            <strong class="d-block mb-1">PTM Scheduling Open</strong>
            <p class="text-muted font-size-12 mb-0">Quarter 2 Parent-Teacher consultations slots active for booking.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    if (window.EduCharts) {
      EduCharts.revenueChart('revenueCollectionChart');
      EduCharts.performanceChart('performanceDonutChart');
      EduCharts.attendanceChart('attendanceTrendChart');
      EduCharts.classStrengthChart('classStrengthChart');
    }
  });
</script>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>