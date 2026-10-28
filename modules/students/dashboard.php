<?php
/**
 * EDUSYS PRO - STUDENT INFORMATION SYSTEM (SIS) DASHBOARD
 * Command center for institutional student enrollment, wing distribution, and compliance
 */
$page_title = "Student Dashboard";
$page_desc = "Central executive oversight for 2,840 enrolled scholars, demographics, and statutory CBSE compliance";
$active_module = "students";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/students/dashboard.php'); ?>">Student Information System</a></li>
      <li class="breadcrumb-item active" aria-current="page">Student Dashboard</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-speedometer2 text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/students/student-directory.php'); ?>" class="btn btn-light border">
      <i class="bi bi-people me-1"></i> Directory
    </a>
    <a href="<?php echo base_url('modules/students/add-student.php'); ?>" class="btn btn-primary fw-bold">
      <i class="bi bi-person-plus-fill me-1"></i> Add Student
    </a>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Total Enrolled</h6>
        <div class="kpi-value">2,840</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Roster Synced</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-backpack-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Boys vs Girls</h6>
        <div class="kpi-value">1,480 / 1,360</div>
        <div class="kpi-trend positive"><i class="bi bi-gender-ambiguous"></i> 52:48 Healthy Ratio</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>APAAR One-Nation-ID</h6>
        <div class="kpi-value">99.4%</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 2,822 of 2,840 Linked</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-fingerprint"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Present Today</h6>
        <div class="kpi-value">96.2%</div>
        <div class="kpi-trend positive"><i class="bi bi-calendar-check"></i> 2,732 in Attendance</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-check-fill"></i></div>
    </div>
  </div>
</div>

<!-- Wing Distribution & Quick Overview -->
<div class="row g-4 mb-4">
  <div class="col-lg-8">
    <div class="card border-0 shadow-sm p-4 h-100">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-pie-chart text-primary me-2"></i>Institutional Wing Capacity & Enrollment</h5>
        <span class="badge bg-light text-primary border">Session 2024-2025</span>
      </div>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 font-size-13">
          <thead class="table-light">
            <tr>
              <th>School Wing</th>
              <th>Classes</th>
              <th>Sections</th>
              <th>Enrolled</th>
              <th>Capacity</th>
              <th>Occupancy %</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-primary me-2 font-size-10"></i>Pre-Primary Wing</td>
              <td>Nursery, KG, Prep</td>
              <td>12 Sections</td>
              <td>340</td>
              <td>360 Seats</td>
              <td><span class="badge bg-success-subtle text-success">94.4% Full</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-success me-2 font-size-10"></i>Primary Wing</td>
              <td>Classes 1 to 5</td>
              <td>20 Sections</td>
              <td>820</td>
              <td>800 Seats</td>
              <td><span class="badge bg-danger-subtle text-danger">102.5% (Full)</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-info me-2 font-size-10"></i>Middle Wing</td>
              <td>Classes 6 to 8</td>
              <td>16 Sections</td>
              <td>680</td>
              <td>680 Seats</td>
              <td><span class="badge bg-success-subtle text-success">100% Optimum</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-warning me-2 font-size-10"></i>Secondary Wing</td>
              <td>Classes 9 & 10</td>
              <td>14 Sections</td>
              <td>560</td>
              <td>560 Seats</td>
              <td><span class="badge bg-success-subtle text-success">100% Optimum</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-purple me-2 font-size-10" style="color: #6f42c1;"></i>Senior Secondary</td>
              <td>Classes 11 & 12 (PCM/PCB/Comm/Hum)</td>
              <td>10 Sections</td>
              <td>440</td>
              <td>450 Seats</td>
              <td><span class="badge bg-info-subtle text-info">97.7% Full</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card border-0 shadow-sm p-4 h-100">
      <h5 class="fw-bold mb-3 text-dark"><i class="bi bi-shield-check text-success me-2"></i>Statutory Compliance</h5>
      <ul class="list-group list-group-flush font-size-13">
        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
          <div>
            <strong>CBSE LOC (Class 10 & 12)</strong>
            <div class="text-muted font-size-11">420 Board candidates registered</div>
          </div>
          <span class="badge bg-success"><i class="bi bi-check-lg"></i> Synced</span>
        </li>
        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
          <div>
            <strong>UDISE+ Government Portal</strong>
            <div class="text-muted font-size-11">Student National Code (PEN)</div>
          </div>
          <span class="badge bg-success"><i class="bi bi-check-lg"></i> 100% Filed</span>
        </li>
        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
          <div>
            <strong>APAAR / DigiLocker Registry</strong>
            <div class="text-muted font-size-11">Ministry of Education e-KYC</div>
          </div>
          <span class="badge bg-primary">99.4% Valid</span>
        </li>
        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
          <div>
            <strong>RTE 25% EWS/DG Quota</strong>
            <div class="text-muted font-size-11">710 Free seats validated</div>
          </div>
          <span class="badge bg-success"><i class="bi bi-check-lg"></i> Compliant</span>
        </li>
      </ul>
      <div class="mt-auto pt-3">
        <a href="<?php echo base_url('modules/students/documents.php'); ?>" class="btn btn-outline-primary btn-sm w-100">
          <i class="bi bi-folder-check me-1"></i> Open Documents Locker
        </a>
      </div>
    </div>
  </div>
</div>

<!-- House Distribution Cards -->
<div class="row g-3 mb-4">
  <div class="col-md-3">
    <div class="p-3 bg-white rounded-3 border-start border-4 border-danger shadow-sm">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted fw-bold">AGNI HOUSE</small>
          <h4 class="fw-bold mb-0 text-dark">712 Scholars</h4>
        </div>
        <div class="fs-3 text-danger"><i class="bi bi-fire"></i></div>
      </div>
      <small class="text-muted">Captain: Rohan Gupta (12-PCM)</small>
    </div>
  </div>
  <div class="col-md-3">
    <div class="p-3 bg-white rounded-3 border-start border-4 border-success shadow-sm">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted fw-bold">PRITHVI HOUSE</small>
          <h4 class="fw-bold mb-0 text-dark">708 Scholars</h4>
        </div>
        <div class="fs-3 text-success"><i class="bi bi-globe-americas"></i></div>
      </div>
      <small class="text-muted">Captain: Diya Patel (10-A)</small>
    </div>
  </div>
  <div class="col-md-3">
    <div class="p-3 bg-white rounded-3 border-start border-4 border-info shadow-sm">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted fw-bold">VAYU HOUSE</small>
          <h4 class="fw-bold mb-0 text-dark">715 Scholars</h4>
        </div>
        <div class="fs-3 text-info"><i class="bi bi-wind"></i></div>
      </div>
      <small class="text-muted">Captain: Ananya Iyer (10-B)</small>
    </div>
  </div>
  <div class="col-md-3">
    <div class="p-3 bg-white rounded-3 border-start border-4 border-primary shadow-sm">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted fw-bold">AKASH HOUSE</small>
          <h4 class="fw-bold mb-0 text-dark">705 Scholars</h4>
        </div>
        <div class="fs-3 text-primary"><i class="bi bi-cloud-sun"></i></div>
      </div>
      <small class="text-muted">Captain: Vihaan Singh (10-B)</small>
    </div>
  </div>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
