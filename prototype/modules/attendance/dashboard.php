<?php
/**
 * EDUSYS PRO - ATTENDANCE MANAGEMENT COMMAND CENTER (DASHBOARD)
 * Real-time daily attendance oversight: RFID gate taps, student & staff percentages, and low-attendance warnings
 */
$page_title = "Attendance Dashboard";
$page_desc = "Real-time institutional attendance radar: 2,840 students, 146 staff, RFID gate stream, and low-attendance alerts";
$active_module = "attendance";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/attendance/dashboard.php'); ?>">Attendance Management</a></li>
      <li class="breadcrumb-item active" aria-current="page">Attendance Dashboard</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-calendar2-check-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/attendance/daily-attendance.php'); ?>" class="btn btn-light border">
      <i class="bi bi-calendar-check me-1"></i> Daily Roster
    </a>
    <a href="<?php echo base_url('modules/attendance/low-attendance-alerts.php'); ?>" class="btn btn-danger text-white fw-bold">
      <i class="bi bi-exclamation-triangle-fill me-1"></i> Low Attendance (<75% Alert)
    </a>
    <a href="<?php echo base_url('modules/attendance/absentee-list.php'); ?>" class="btn btn-primary fw-bold">
      <i class="bi bi-bell-fill me-1"></i> Absentee SMS Center
    </a>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Student Attendance Today</h6>
        <div class="kpi-value">96.2%</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 2,732 of 2,840 Present</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Staff & Faculty Present</h6>
        <div class="kpi-value">142 / 146</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 97.2% Staff Turnout</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Late Arrivals Today</h6>
        <div class="kpi-value">24 Scholars</div>
        <div class="kpi-trend neutral"><i class="bi bi-stopwatch"></i> 18 Excused (Bus Delay)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-stopwatch-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Risk Shortfall (<75%)</h6>
        <div class="kpi-value">14 Scholars</div>
        <div class="kpi-trend negative"><i class="bi bi-exclamation-triangle"></i> CBSE Board Risk</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-exclamation-octagon-fill"></i></div>
    </div>
  </div>
</div>

<!-- Wing Attendance Breakdown & Real-Time RFID Stream -->
<div class="row g-4 mb-4">
  <div class="col-lg-8">
    <div class="card border-0 shadow-sm p-4 h-100">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-pie-chart text-primary me-2"></i>Wing-wise Daily Attendance Performance</h5>
        <span class="badge bg-light text-primary border">Today: 28 Oct 2024</span>
      </div>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 font-size-13">
          <thead class="table-light">
            <tr>
              <th>School Wing</th>
              <th>Enrolled</th>
              <th>Present Today</th>
              <th>Absent</th>
              <th>Attendance %</th>
              <th>Performance</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-primary me-2 font-size-10"></i>Pre-Primary (Nursery-Prep)</td>
              <td>340</td>
              <td>330</td>
              <td>10</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: 97.1%;"></div>
                  </div>
                  <span class="fw-bold">97.1%</span>
                </div>
              </td>
              <td><span class="badge bg-success-subtle text-success">Excellent</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-success me-2 font-size-10"></i>Primary Wing (Classes 1-5)</td>
              <td>820</td>
              <td>794</td>
              <td>26</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: 96.8%;"></div>
                  </div>
                  <span class="fw-bold">96.8%</span>
                </div>
              </td>
              <td><span class="badge bg-success-subtle text-success">Excellent</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-info me-2 font-size-10"></i>Middle Wing (Classes 6-8)</td>
              <td>680</td>
              <td>653</td>
              <td>27</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-info" style="width: 96.0%;"></div>
                  </div>
                  <span class="fw-bold">96.0%</span>
                </div>
              </td>
              <td><span class="badge bg-success-subtle text-success">High Turnout</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-warning me-2 font-size-10"></i>Secondary Wing (Classes 9-10)</td>
              <td>560</td>
              <td>536</td>
              <td>24</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-warning" style="width: 95.7%;"></div>
                  </div>
                  <span class="fw-bold">95.7%</span>
                </div>
              </td>
              <td><span class="badge bg-success-subtle text-success">High Turnout</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-purple me-2 font-size-10" style="color: #6f42c1;"></i>Senior Secondary (Classes 11-12)</td>
              <td>440</td>
              <td>419</td>
              <td>21</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-purple" style="width: 95.2%; background-color: #6f42c1;"></div>
                  </div>
                  <span class="fw-bold">95.2%</span>
                </div>
              </td>
              <td><span class="badge bg-success-subtle text-success">High Turnout</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card border-0 shadow-sm p-4 h-100">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-broadcast text-primary me-2"></i>Live RFID Gate Taps</h5>
        <span class="badge bg-success text-white font-size-11"><i class="bi bi-circle-fill me-1 font-size-8"></i>Live Sync</span>
      </div>
      <ul class="list-group list-group-flush font-size-13">
        <li class="list-group-item px-0">
          <div class="d-flex justify-content-between">
            <strong class="text-dark">Aarav Sharma (10-A)</strong>
            <span class="badge bg-success-subtle text-success">07:32 AM</span>
          </div>
          <small class="text-muted">Gate 1 Pedestrian Turnstile &bull; Tap #8491</small>
        </li>
        <li class="list-group-item px-0">
          <div class="d-flex justify-content-between">
            <strong class="text-dark">Diya Patel (10-A)</strong>
            <span class="badge bg-success-subtle text-success">07:34 AM</span>
          </div>
          <small class="text-muted">Gate 1 Pedestrian Turnstile &bull; Tap #8492</small>
        </li>
        <li class="list-group-item px-0">
          <div class="d-flex justify-content-between">
            <strong class="text-dark">Dr. K. L. Sharma (Faculty)</strong>
            <span class="badge bg-primary-subtle text-primary">07:14 AM</span>
          </div>
          <small class="text-muted">Main Staff Biometric Terminal &bull; Facial OK</small>
        </li>
        <li class="list-group-item px-0">
          <div class="d-flex justify-content-between">
            <strong class="text-dark">Ishaan Verma (12-PCB)</strong>
            <span class="badge bg-warning-subtle text-warning">07:52 AM</span>
          </div>
          <small class="text-muted">Gate 1 Pedestrian &bull; Late Entry Slip Issued</small>
        </li>
      </ul>
      <div class="mt-auto pt-3">
        <a href="<?php echo base_url('modules/attendance/rfid-integration.php'); ?>" class="btn btn-outline-primary btn-sm w-100 fw-bold">
          <i class="bi bi-broadcast-pin me-1"></i> Open Gate Readers Terminal
        </a>
      </div>
    </div>
  </div>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
