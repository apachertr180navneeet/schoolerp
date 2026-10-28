<?php
/**
 * EDUSYS PRO - ACADEMIC MANAGEMENT COMMAND CENTER (DASHBOARD)
 * Real-time academic oversight: Syllabus tracking, timetable periods, faculty workload, and substitutions
 */
$page_title = "Academic Dashboard";
$page_desc = "Central pedagogical command: Syllabus coverage, timetable periods, faculty allocations, and NEP 2020 progress";
$active_module = "academics";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/academics/dashboard.php'); ?>">Academic Management</a></li>
      <li class="breadcrumb-item active" aria-current="page">Academic Dashboard</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-mortarboard-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/academics/class-timetable.php'); ?>" class="btn btn-light border">
      <i class="bi bi-table me-1"></i> Class Timetable
    </a>
    <a href="<?php echo base_url('modules/academics/substitute-teachers.php'); ?>" class="btn btn-warning text-dark fw-bold">
      <i class="bi bi-person-switch me-1"></i> Substitutions (4 Today)
    </a>
    <a href="<?php echo base_url('modules/academics/timetable-builder.php'); ?>" class="btn btn-primary fw-bold">
      <i class="bi bi-calendar3-week me-1"></i> Timetable Builder
    </a>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Overall Syllabus Completion</h6>
        <div class="kpi-value">76.4%</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> +3.2% Ahead of Benchmark</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-journal-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Active Class Sections</h6>
        <div class="kpi-value">72 Sections</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 2,840 Scholars Mapped</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-diagram-3-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Periods Today</h6>
        <div class="kpi-value">576 Slots</div>
        <div class="kpi-trend positive"><i class="bi bi-clock-history"></i> 8 Periods per Section</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar3"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Faculty on Duty</h6>
        <div class="kpi-value">108 / 112</div>
        <div class="kpi-trend neutral"><i class="bi bi-shield-check"></i> 4 Substitutions Active</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-workspace"></i></div>
    </div>
  </div>
</div>

<!-- Department Progress & Today's Substitution Feed -->
<div class="row g-4 mb-4">
  <div class="col-lg-8">
    <div class="card border-0 shadow-sm p-4 h-100">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-bar-chart-line text-primary me-2"></i>Department-wise Syllabus Velocity & Progress</h5>
        <span class="badge bg-light text-primary border">Target: 15 Jan 2025</span>
      </div>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 font-size-13">
          <thead class="table-light">
            <tr>
              <th>Academic Department</th>
              <th>HOD Faculty</th>
              <th>Courses</th>
              <th>Completed / Total</th>
              <th>Progress %</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-atom text-primary me-2"></i>Science (Physics, Chem, Bio)</td>
              <td>Dr. K. L. Sharma</td>
              <td>12 Courses</td>
              <td>112 / 144 Units</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: 77.7%;"></div>
                  </div>
                  <span class="fw-bold">77.7%</span>
                </div>
              </td>
              <td><span class="badge bg-success-subtle text-success">On Schedule</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-calculator text-info me-2"></i>Mathematics & Statistics</td>
              <td>Mrs. Sunita Kaul</td>
              <td>8 Courses</td>
              <td>68 / 88 Units</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-info" style="width: 77.2%;"></div>
                  </div>
                  <span class="fw-bold">77.2%</span>
                </div>
              </td>
              <td><span class="badge bg-success-subtle text-success">On Schedule</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-briefcase text-success me-2"></i>Commerce & Business Studies</td>
              <td>Mr. M. K. Chawla</td>
              <td>6 Courses</td>
              <td>42 / 52 Units</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: 80.7%;"></div>
                  </div>
                  <span class="fw-bold">80.7%</span>
                </div>
              </td>
              <td><span class="badge bg-success-subtle text-success">Ahead (+4%)</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-globe-americas text-warning me-2"></i>Humanities & Social Sciences</td>
              <td>Mrs. Shalini Verma</td>
              <td>10 Courses</td>
              <td>72 / 98 Units</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-warning" style="width: 73.4%;"></div>
                  </div>
                  <span class="fw-bold">73.4%</span>
                </div>
              </td>
              <td><span class="badge bg-warning-subtle text-warning">Pace Review</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-translate text-purple me-2" style="color: #6f42c1;"></i>Languages (Eng, Hin, Skt)</td>
              <td>Mr. Deepak Rawat</td>
              <td>8 Courses</td>
              <td>66 / 82 Units</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-purple" style="width: 80.4%; background-color: #6f42c1;"></div>
                  </div>
                  <span class="fw-bold">80.4%</span>
                </div>
              </td>
              <td><span class="badge bg-success-subtle text-success">On Schedule</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card border-0 shadow-sm p-4 h-100">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-person-switch text-warning me-2"></i>Active Substitutions</h5>
        <span class="badge bg-warning text-dark font-size-11">Today (4 Active)</span>
      </div>
      <ul class="list-group list-group-flush font-size-13">
        <li class="list-group-item px-0">
          <div class="d-flex justify-content-between">
            <strong class="text-dark">Class 10-A &bull; Period 2</strong>
            <span class="badge bg-success-subtle text-success">Covered</span>
          </div>
          <small class="text-muted d-block">Absent: Mrs. Meenakshi Soni (Hindi)</small>
          <small class="text-primary fw-semibold"><i class="bi bi-arrow-return-right me-1"></i>Covered by: Mr. Deepak Rawat</small>
        </li>
        <li class="list-group-item px-0">
          <div class="d-flex justify-content-between">
            <strong class="text-dark">Class 10-B &bull; Period 6</strong>
            <span class="badge bg-success-subtle text-success">Covered</span>
          </div>
          <small class="text-muted d-block">Absent: Mrs. Meenakshi Soni (Hindi)</small>
          <small class="text-primary fw-semibold"><i class="bi bi-arrow-return-right me-1"></i>Covered by: Mrs. Shalini Verma</small>
        </li>
        <li class="list-group-item px-0">
          <div class="d-flex justify-content-between">
            <strong class="text-dark">Class 12-PCM &bull; Period 7</strong>
            <span class="badge bg-success-subtle text-success">Covered</span>
          </div>
          <small class="text-muted d-block">Absent: Mr. Kunal Bansal (CS)</small>
          <small class="text-primary fw-semibold"><i class="bi bi-arrow-return-right me-1"></i>Covered by: Dr. K. L. Sharma</small>
        </li>
        <li class="list-group-item px-0">
          <div class="d-flex justify-content-between">
            <strong class="text-dark">Class 11-PCM &bull; Period 8</strong>
            <span class="badge bg-success-subtle text-success">Covered</span>
          </div>
          <small class="text-muted d-block">Absent: Mr. Kunal Bansal (CS)</small>
          <small class="text-primary fw-semibold"><i class="bi bi-arrow-return-right me-1"></i>Covered by: Mrs. Sunita Kaul</small>
        </li>
      </ul>
      <div class="mt-auto pt-3">
        <a href="<?php echo base_url('modules/academics/substitute-teachers.php'); ?>" class="btn btn-outline-warning text-dark btn-sm w-100 fw-bold">
          <i class="bi bi-person-lines-fill me-1"></i> View Full Substitution Ledger
        </a>
      </div>
    </div>
  </div>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
