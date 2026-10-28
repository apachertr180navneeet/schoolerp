<?php
/**
 * EDUSYS PRO - ADMISSION DASHBOARD
 * Executive command center for intake cycle governance, conversion funnels,
 * seat matrices, and live application processing for Delhi Public Global Academy.
 */
$page_title = "Admission Dashboard";
$page_desc = "Academic Year 2025-2026 Intake Control, Real-Time Conversion Funnel & Merit Governance";
$active_module = "admissions";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/admissions/dashboard.php'); ?>">Admission Management</a></li>
      <li class="breadcrumb-item active" aria-current="page">Admission Dashboard</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-person-plus-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/admissions/enquiries.php'); ?>" class="btn btn-light border" title="View All Leads">
      <i class="bi bi-telephone-inbound me-1"></i> Enquiries
    </a>
    <a href="<?php echo base_url('modules/admissions/merit-lists.php'); ?>" class="btn btn-light border" title="Merit Cutoffs">
      <i class="bi bi-award me-1"></i> Merit Lists
    </a>
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Dashboard Report">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'admissions_pipeline_export.csv')" title="Export Applicants CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Quick Lead / Application
    </button>
  </div>
</div>

<!-- Active Intake Cycle Announcement Banner -->
<div class="p-3 px-4 rounded-3 border mb-4 bg-white shadow-sm d-flex align-items-center justify-content-between flex-wrap gap-3">
  <div class="d-flex align-items-center gap-3">
    <div class="p-2.5 rounded-3 bg-primary-subtle text-primary font-size-22">
      <i class="bi bi-mortarboard-fill"></i>
    </div>
    <div>
      <div class="d-flex align-items-center gap-2 mb-1">
        <h6 class="fw-bold text-dark mb-0 font-size-15">Academic Session 2025-2026 Intake (Phase 2)</h6>
        <span class="badge bg-success-subtle text-success border border-success border-opacity-25 font-size-11">
          <i class="bi bi-circle-fill font-size-8 me-1"></i> Admissions Active
        </span>
        <span class="badge bg-warning-subtle text-warning border border-warning border-opacity-25 font-size-11">
          18 Days to Cutoff
        </span>
      </div>
      <small class="text-muted font-size-12">
        Intake Target: <strong class="text-dark">220 Fresh Students</strong> &bull; Registration Portal Synced &bull; Affiliated with CBSE Board (Affiliation #2130842)
      </small>
    </div>
  </div>
  <div class="d-flex align-items-center gap-4">
    <div class="text-end">
      <div class="font-size-11 text-muted text-uppercase fw-semibold">Seat Fill Ratio</div>
      <div class="fw-bold font-size-16 text-primary">184 / 220 <span class="font-size-12 text-muted fw-normal">(83.6%)</span></div>
    </div>
    <div class="vr d-none d-md-block" style="height: 32px;"></div>
    <div class="text-end">
      <div class="font-size-11 text-muted text-uppercase fw-semibold">Fee Realized</div>
      <div class="fw-bold font-size-16 text-success">₹46.20 Lakhs</div>
    </div>
  </div>
</div>

<!-- Executive Metric Cards -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Total Enquiries</h6>
        <div class="kpi-value">1,248 Leads</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> +24% YoY Growth</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-telephone-inbound-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Applications Filed</h6>
        <div class="kpi-value">842 Forms</div>
        <div class="kpi-trend positive"><i class="bi bi-laptop"></i> 684 Online / 158 Counter</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-file-earmark-person-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Merit Shortlisted</h6>
        <div class="kpi-value">320 Selected</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle-fill"></i> 48 Today's Interview</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-award-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Enrolled & Confirmed</h6>
        <div class="kpi-value">184 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-cash-stack"></i> 100% Fees Reconciled</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-patch-check-fill"></i></div>
    </div>
  </div>
</div>

<!-- Visual Conversion Funnel Card -->
<div class="erp-card mb-4">
  <div class="erp-card-header">
    <div>
      <h5 class="erp-card-title mb-1"><i class="bi bi-funnel-fill text-primary"></i> 2025-26 Admission Conversion Pipeline</h5>
      <small class="text-muted font-size-12">Stage-by-stage progression from lead generation to student matriculation</small>
    </div>
    <div class="d-flex align-items-center gap-2">
      <span class="badge bg-light text-muted border font-size-12"><i class="bi bi-stopwatch me-1"></i> Avg Conversion: 4.2 Days</span>
    </div>
  </div>
  <div class="p-4">
    <!-- Pipeline Visual Steps -->
    <div class="row g-2 text-center mb-3">
      <div class="col">
        <div class="p-3 rounded-3 border bg-light">
          <small class="text-muted text-uppercase font-size-11 fw-semibold d-block">Stage 1: Enquiries</small>
          <h4 class="fw-bold text-dark my-1">1,248</h4>
          <span class="badge bg-secondary-subtle text-secondary font-size-11">100% Volume</span>
        </div>
      </div>
      <div class="col-auto d-none d-md-flex align-items-center">
        <i class="bi bi-chevron-right text-muted font-size-16"></i>
      </div>
      <div class="col">
        <div class="p-3 rounded-3 border bg-light">
          <small class="text-muted text-uppercase font-size-11 fw-semibold d-block">Stage 2: Applications</small>
          <h4 class="fw-bold text-info my-1">842</h4>
          <span class="badge bg-info-subtle text-info font-size-11">67.4% Conversion</span>
        </div>
      </div>
      <div class="col-auto d-none d-md-flex align-items-center">
        <i class="bi bi-chevron-right text-muted font-size-16"></i>
      </div>
      <div class="col">
        <div class="p-3 rounded-3 border bg-light">
          <small class="text-muted text-uppercase font-size-11 fw-semibold d-block">Stage 3: Tests & Interaction</small>
          <h4 class="fw-bold text-primary my-1">520</h4>
          <span class="badge bg-primary-subtle text-primary font-size-11">41.6% Conversion</span>
        </div>
      </div>
      <div class="col-auto d-none d-md-flex align-items-center">
        <i class="bi bi-chevron-right text-muted font-size-16"></i>
      </div>
      <div class="col">
        <div class="p-3 rounded-3 border bg-light">
          <small class="text-muted text-uppercase font-size-11 fw-semibold d-block">Stage 4: Merit Offer</small>
          <h4 class="fw-bold text-warning my-1">320</h4>
          <span class="badge bg-warning-subtle text-warning font-size-11">25.6% Conversion</span>
        </div>
      </div>
      <div class="col-auto d-none d-md-flex align-items-center">
        <i class="bi bi-chevron-right text-muted font-size-16"></i>
      </div>
      <div class="col">
        <div class="p-3 rounded-3 border bg-success-subtle border-success border-opacity-25">
          <small class="text-success text-uppercase font-size-11 fw-bold d-block">Stage 5: Fee Paid / Enrolled</small>
          <h4 class="fw-bold text-success my-1">184</h4>
          <span class="badge bg-success text-white font-size-11">14.7% Net Yield</span>
        </div>
      </div>
    </div>

    <!-- Multi-Color Progress Funnel Bar -->
    <div class="progress" style="height: 10px;">
      <div class="progress-bar bg-primary" role="progressbar" style="width: 67.4%;" title="Applications: 67.4%"></div>
      <div class="progress-bar bg-info" role="progressbar" style="width: 15.8%;" title="Evaluation: 15.8%"></div>
      <div class="progress-bar bg-warning" role="progressbar" style="width: 10.9%;" title="Merit: 10.9%"></div>
      <div class="progress-bar bg-success" role="progressbar" style="width: 5.9%;" title="Enrolled: 5.9%"></div>
    </div>
  </div>
</div>

<!-- Charts Row: Intake by Wing + Lead Acquisition Channels -->
<div class="row g-4 mb-4">
  <div class="col-lg-8">
    <div class="erp-card h-100 mb-0">
      <div class="erp-card-header">
        <div>
          <h5 class="erp-card-title mb-1"><i class="bi bi-bar-chart-fill text-primary"></i> Wing-Wise Application Demand vs Seats Available</h5>
          <small class="text-muted font-size-12">Applications received versus intake capacity across school wings</small>
        </div>
        <span class="badge bg-light text-muted border font-size-12">Session 2025-26</span>
      </div>
      <div class="p-4" style="height: 310px; position: relative;">
        <canvas id="admissionWingChart"></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="erp-card h-100 mb-0">
      <div class="erp-card-header">
        <div>
          <h5 class="erp-card-title mb-1"><i class="bi bi-pie-chart-fill text-primary"></i> Lead Channel Origin</h5>
          <small class="text-muted font-size-12">Origin of 1,248 registered enquiries</small>
        </div>
      </div>
      <div class="p-4">
        <div style="height: 180px; position: relative;" class="mb-3">
          <canvas id="leadSourceChart"></canvas>
        </div>
        <div class="list-group list-group-flush font-size-12">
          <div class="list-group-item d-flex justify-content-between px-0 py-1.5">
            <span><i class="bi bi-circle-fill text-primary font-size-9 me-1.5"></i> Website & SEO</span>
            <strong class="text-dark">524 (42%)</strong>
          </div>
          <div class="list-group-item d-flex justify-content-between px-0 py-1.5">
            <span><i class="bi bi-circle-fill text-success font-size-9 me-1.5"></i> Parent & Alumni Referral</span>
            <strong class="text-dark">324 (26%)</strong>
          </div>
          <div class="list-group-item d-flex justify-content-between px-0 py-1.5">
            <span><i class="bi bi-circle-fill text-warning font-size-9 me-1.5"></i> Front Office Walk-in</span>
            <strong class="text-dark">200 (16%)</strong>
          </div>
          <div class="list-group-item d-flex justify-content-between px-0 py-1.5">
            <span><i class="bi bi-circle-fill text-info font-size-9 me-1.5"></i> Social & Digital Ads</span>
            <strong class="text-dark">137 (11%)</strong>
          </div>
          <div class="list-group-item d-flex justify-content-between px-0 py-1.5">
            <span><i class="bi bi-circle-fill text-secondary font-size-9 me-1.5"></i> Print & School Fairs</span>
            <strong class="text-dark">63 (5%)</strong>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Wing & Grade Capacity Status Matrix -->
<div class="erp-card mb-4">
  <div class="erp-card-header">
    <div>
      <h5 class="erp-card-title mb-1"><i class="bi bi-grid-3x3-gap-fill text-primary"></i> Wing-Wise Seat Matrix & Quota Status</h5>
      <small class="text-muted font-size-12">Real-time breakdown of seat allocation, applications, and vacancies</small>
    </div>
    <a href="<?php echo base_url('modules/admissions/online-applications.php'); ?>" class="btn btn-xs btn-outline-primary py-1 px-2.5 font-size-12 rounded-pill">
      Manage Applications <i class="bi bi-arrow-right ms-1"></i>
    </a>
  </div>
  <div class="table-responsive">
    <table class="erp-table mb-0">
      <thead>
        <tr>
          <th>Academic Wing</th>
          <th>Covered Grades</th>
          <th class="text-center">Seat Capacity</th>
          <th class="text-center">Applications Received</th>
          <th class="text-center">Merit Shortlisted</th>
          <th class="text-center">Confirmed Enrolled</th>
          <th class="text-center">Available Vacancy</th>
          <th>Capacity Fill Rate</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="fw-bold text-dark">Pre-Primary Wing</div>
            <small class="text-muted">Early Years Foundation</small>
          </td>
          <td><span class="badge bg-light text-muted border font-size-12">Nursery, LKG, UKG</span></td>
          <td class="text-center fw-bold">90 Seats</td>
          <td class="text-center text-primary fw-semibold">184 Forms</td>
          <td class="text-center fw-semibold">85 Offers</td>
          <td class="text-center text-success fw-bold">78 Enrolled</td>
          <td class="text-center font-mono text-danger fw-bold">12 Left</td>
          <td style="min-width: 140px;">
            <div class="d-flex align-items-center gap-2">
              <div class="progress flex-grow-1" style="height: 6px;">
                <div class="progress-bar bg-danger" style="width: 86.7%;"></div>
              </div>
              <small class="font-size-11 fw-bold text-dark">86.7%</small>
            </div>
          </td>
          <td><span class="badge bg-danger-subtle text-danger border border-danger border-opacity-25 font-size-11">Almost Full</span></td>
        </tr>
        <tr>
          <td>
            <div class="fw-bold text-dark">Primary Wing</div>
            <small class="text-muted">Foundational Stages</small>
          </td>
          <td><span class="badge bg-light text-muted border font-size-12">Classes 1 to 5</span></td>
          <td class="text-center fw-bold">120 Seats</td>
          <td class="text-center text-primary fw-semibold">240 Forms</td>
          <td class="text-center fw-semibold">110 Offers</td>
          <td class="text-center text-success fw-bold">95 Enrolled</td>
          <td class="text-center font-mono text-warning fw-bold">25 Left</td>
          <td style="min-width: 140px;">
            <div class="d-flex align-items-center gap-2">
              <div class="progress flex-grow-1" style="height: 6px;">
                <div class="progress-bar bg-success" style="width: 79.2%;"></div>
              </div>
              <small class="font-size-11 fw-bold text-dark">79.2%</small>
            </div>
          </td>
          <td><span class="badge bg-success-subtle text-success border border-success border-opacity-25 font-size-11">Open</span></td>
        </tr>
        <tr>
          <td>
            <div class="fw-bold text-dark">Middle Wing</div>
            <small class="text-muted">Preparatory & Secondary</small>
          </td>
          <td><span class="badge bg-light text-muted border font-size-12">Classes 6 to 8</span></td>
          <td class="text-center fw-bold">80 Seats</td>
          <td class="text-center text-primary fw-semibold">160 Forms</td>
          <td class="text-center fw-semibold">75 Offers</td>
          <td class="text-center text-success fw-bold">62 Enrolled</td>
          <td class="text-center font-mono text-warning fw-bold">18 Left</td>
          <td style="min-width: 140px;">
            <div class="d-flex align-items-center gap-2">
              <div class="progress flex-grow-1" style="height: 6px;">
                <div class="progress-bar bg-success" style="width: 77.5%;"></div>
              </div>
              <small class="font-size-11 fw-bold text-dark">77.5%</small>
            </div>
          </td>
          <td><span class="badge bg-success-subtle text-success border border-success border-opacity-25 font-size-11">Open</span></td>
        </tr>
        <tr>
          <td>
            <div class="fw-bold text-dark">Secondary Wing</div>
            <small class="text-muted">CBSE Board Foundation</small>
          </td>
          <td><span class="badge bg-light text-muted border font-size-12">Classes 9 & 10</span></td>
          <td class="text-center fw-bold">60 Seats</td>
          <td class="text-center text-primary fw-semibold">112 Forms</td>
          <td class="text-center fw-semibold">55 Offers</td>
          <td class="text-center text-success fw-bold">48 Enrolled</td>
          <td class="text-center font-mono text-danger fw-bold">12 Left</td>
          <td style="min-width: 140px;">
            <div class="d-flex align-items-center gap-2">
              <div class="progress flex-grow-1" style="height: 6px;">
                <div class="progress-bar bg-warning" style="width: 80.0%;"></div>
              </div>
              <small class="font-size-11 fw-bold text-dark">80.0%</small>
            </div>
          </td>
          <td><span class="badge bg-warning-subtle text-warning border border-warning border-opacity-25 font-size-11">Few Seats</span></td>
        </tr>
        <tr>
          <td>
            <div class="fw-bold text-dark">Senior Secondary Wing</div>
            <small class="text-muted">Science, Commerce & Humanities</small>
          </td>
          <td><span class="badge bg-light text-muted border font-size-12">Classes 11 & 12</span></td>
          <td class="text-center fw-bold">120 Seats</td>
          <td class="text-center text-primary fw-semibold">146 Forms</td>
          <td class="text-center fw-semibold">105 Offers</td>
          <td class="text-center text-success fw-bold">86 Enrolled</td>
          <td class="text-center font-mono text-success fw-bold">34 Left</td>
          <td style="min-width: 140px;">
            <div class="d-flex align-items-center gap-2">
              <div class="progress flex-grow-1" style="height: 6px;">
                <div class="progress-bar bg-info" style="width: 71.6%;"></div>
              </div>
              <small class="font-size-11 fw-bold text-dark">71.6%</small>
            </div>
          </td>
          <td><span class="badge bg-success-subtle text-success border border-success border-opacity-25 font-size-11">Open</span></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Operational Split Row: Scheduled Interactions & Verification Alerts -->
<div class="row g-4 mb-4">
  <!-- Today's Counselling & Interaction Schedule -->
  <div class="col-lg-7">
    <div class="erp-card h-100 mb-0">
      <div class="erp-card-header">
        <div>
          <h5 class="erp-card-title mb-1"><i class="bi bi-calendar-check text-primary"></i> Today's Counselling & Assessment Schedule</h5>
          <small class="text-muted font-size-12">4 scheduled parent interactions & student diagnostic assessments today</small>
        </div>
        <a href="<?php echo base_url('modules/admissions/counselling.php'); ?>" class="btn btn-xs btn-light border py-1 px-2.5 font-size-12">
          View All Slots
        </a>
      </div>
      <div class="list-group list-group-flush font-size-13">
        <div class="list-group-item p-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
          <div class="d-flex align-items-center gap-3">
            <div class="p-2 rounded-3 bg-primary-subtle text-primary font-mono fw-bold font-size-12 text-center" style="min-width: 68px;">
              10:30 AM
            </div>
            <div>
              <div class="fw-bold text-dark mb-0">Advik Agarwal &bull; <span class="text-primary font-size-12">Pre-Primary (Nursery)</span></div>
              <small class="text-muted">Parent: Sanjay Agarwal (+91 98112 44556) &bull; Panel: Mrs. Shalini Verma (Room 102)</small>
            </div>
          </div>
          <span class="badge bg-info-subtle text-info border border-info border-opacity-25">Ready in Lobby</span>
        </div>

        <div class="list-group-item p-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
          <div class="d-flex align-items-center gap-3">
            <div class="p-2 rounded-3 bg-light text-dark font-mono fw-bold font-size-12 text-center border" style="min-width: 68px;">
              11:15 AM
            </div>
            <div>
              <div class="fw-bold text-dark mb-0">Saanvi Reddy &bull; <span class="text-primary font-size-12">Class 6 (Middle Wing)</span></div>
              <small class="text-muted">Parent: Dr. K. S. Reddy (+91 98223 55667) &bull; Diagnostic Math & Science Evaluation</small>
            </div>
          </div>
          <span class="badge bg-warning-subtle text-warning border border-warning border-opacity-25">Upcoming</span>
        </div>

        <div class="list-group-item p-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
          <div class="d-flex align-items-center gap-3">
            <div class="p-2 rounded-3 bg-light text-dark font-mono fw-bold font-size-12 text-center border" style="min-width: 68px;">
              12:00 PM
            </div>
            <div>
              <div class="fw-bold text-dark mb-0">Reyansh Joshi &bull; <span class="text-primary font-size-12">Class 11 - Science (PCM)</span></div>
              <small class="text-muted">Parent: Mahesh Joshi (+91 98334 66778) &bull; Principal Interview & Stream Basket Finalization</small>
            </div>
          </div>
          <span class="badge bg-warning-subtle text-warning border border-warning border-opacity-25">Upcoming</span>
        </div>

        <div class="list-group-item p-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
          <div class="d-flex align-items-center gap-3">
            <div class="p-2 rounded-3 bg-light text-dark font-mono fw-bold font-size-12 text-center border" style="min-width: 68px;">
              02:30 PM
            </div>
            <div>
              <div class="fw-bold text-dark mb-0">Prisha Nair &bull; <span class="text-primary font-size-12">Class 11 - Commerce</span></div>
              <small class="text-muted">Parent: Gopalan Nair (+91 98445 77889) &bull; Provisional Fee Challan Settlement</small>
            </div>
          </div>
          <span class="badge bg-light text-muted border">Scheduled</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Document Scrutiny & Operational Action Items -->
  <div class="col-lg-5">
    <div class="erp-card h-100 mb-0">
      <div class="erp-card-header">
        <div>
          <h5 class="erp-card-title mb-1"><i class="bi bi-shield-exclamation text-warning"></i> Scrutiny & Compliance Queue</h5>
          <small class="text-muted font-size-12">Urgent admission administrative items requiring action</small>
        </div>
      </div>
      <div class="p-3">
        <div class="p-3 rounded-3 border bg-danger-subtle border-danger border-opacity-25 mb-3">
          <div class="d-flex align-items-center justify-content-between mb-1">
            <strong class="text-danger font-size-13"><i class="bi bi-clock-history me-1"></i> Fee Deadlines Expiring Today</strong>
            <span class="badge bg-danger text-white font-size-11">14 Applicants</span>
          </div>
          <p class="text-muted font-size-12 mb-2">Provisional seat offer locks expire at 5:00 PM IST today for Merit Batch 1 candidates.</p>
          <a href="<?php echo base_url('modules/admissions/admission-fees.php'); ?>" class="btn btn-xs btn-danger py-1 px-2.5 font-size-11 fw-semibold">
            Send Payment Reminder SMS / WhatsApp
          </a>
        </div>

        <div class="p-3 rounded-3 border bg-warning-subtle border-warning border-opacity-25 mb-3">
          <div class="d-flex align-items-center justify-content-between mb-1">
            <strong class="text-warning-emphasis font-size-13"><i class="bi bi-file-earmark-diff me-1"></i> Pending Transfer Certificates (TC)</strong>
            <span class="badge bg-warning text-dark font-size-11">3 Candidates</span>
          </div>
          <p class="text-muted font-size-12 mb-0">Counter-signed TC pending from previous school board for Class 9 and 11 candidates.</p>
        </div>

        <div class="p-3 rounded-3 border bg-light">
          <div class="d-flex align-items-center justify-content-between mb-1">
            <strong class="text-dark font-size-13"><i class="bi bi-printer me-1"></i> Offline Registration Forms to Scan</strong>
            <span class="badge bg-secondary font-size-11">6 Pending</span>
          </div>
          <p class="text-muted font-size-12 mb-0">Paper registration counter forms submitted this morning awaiting digitization.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search applicant name, application #, parent...">
    </div>
    <select class="form-select" style="max-width: 200px;">
      <option selected>All Admission Stages</option>
      <option>Enquiry Registered</option>
      <option>Document Scrutiny</option>
      <option>Entrance Test</option>
      <option>Interview Scheduled</option>
      <option>Merit Approved</option>
      <option>Fee Paid / Enrolled</option>
    </select>
    <select class="form-select" style="max-width: 150px;">
      <option selected>All Status</option>
      <option>Enrolled</option>
      <option>Merit Approved</option>
      <option>Entrance Test</option>
      <option>Fee Paid</option>
      <option>Scrutiny</option>
      <option>Waiting List</option>
    </select>
  </div>
  <div class="table-filter-right">
    <span class="font-size-13 text-muted">Showing <strong class="table-visible-count text-primary">8</strong> verified records</span>
  </div>
</div>

<!-- Priority Applications Table -->
<div class="erp-table-responsive mb-4">
  <table class="erp-table" id="mainDataTable">
    <thead>
      <tr>
        <th>Application / Ref #</th>
        <th>Candidate Full Name</th>
        <th>Grade Applied</th>
        <th>Parent / Guardian</th>
        <th>Contact Number</th>
        <th>Lead Source</th>
        <th>Date Submitted</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2025-0841</td>
        <td>
          <div class="fw-semibold text-dark">Advik Agarwal</div>
          <small class="text-muted font-size-11">Class 1 - Nursery</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pre-Primary Wing</span></td>
        <td><small class="text-dark">Sanjay Agarwal</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98112 44556</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Website Portal</span></td>
        <td><small class="text-muted">28 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Enrolled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Dossier"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Application"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Application')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>

      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2025-0840</td>
        <td>
          <div class="fw-semibold text-dark">Saanvi Reddy</div>
          <small class="text-muted font-size-11">Class 6 - Middle</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Middle Wing</span></td>
        <td><small class="text-dark">Dr. K. S. Reddy</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98223 55667</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Referral / Sibling</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Merit Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Dossier"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Application"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Application')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>

      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2025-0839</td>
        <td>
          <div class="fw-semibold text-dark">Reyansh Joshi</div>
          <small class="text-muted font-size-11">Class 11 - Science (PCM)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Mahesh Joshi</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98334 66778</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Walk-in Counter</span></td>
        <td><small class="text-muted">26 Oct 2024</small></td>
        <td><span class="badge-status badge-pending">Entrance Test</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Dossier"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Application"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Application')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>

      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2025-0838</td>
        <td>
          <div class="fw-semibold text-dark">Prisha Nair</div>
          <small class="text-muted font-size-11">Class 11 - Commerce</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Gopalan Nair</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98445 77889</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Digital Campaign</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Fee Paid</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Dossier"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Application"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Application')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>

      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2025-0837</td>
        <td>
          <div class="fw-semibold text-dark">Arya Deshmukh</div>
          <small class="text-muted font-size-11">Class 9 - Secondary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Secondary Wing</span></td>
        <td><small class="text-dark">Sunil Deshmukh</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98556 88990</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Open House</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-pending">Scrutiny</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Dossier"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Application"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Application')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>

      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2025-0836</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Mehta</div>
          <small class="text-muted font-size-11">Class 3 - Primary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Primary Wing</span></td>
        <td><small class="text-dark">Rakesh Mehta</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98667 99001</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Website Portal</span></td>
        <td><small class="text-muted">24 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Interviewed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Dossier"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Application"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Application')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>

      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2025-0835</td>
        <td>
          <div class="fw-semibold text-dark">Zara Khan</div>
          <small class="text-muted font-size-11">Class 11 - Humanities</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Tariq Khan</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98778 11223</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Transfer / Relocation</span></td>
        <td><small class="text-muted">23 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Merit Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Dossier"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Application"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Application')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>

      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2025-0834</td>
        <td>
          <div class="fw-semibold text-dark">Ayaan Sen</div>
          <small class="text-muted font-size-11">Class 1 - Prep</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pre-Primary Wing</span></td>
        <td><small class="text-dark">Debashis Sen</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98889 22334</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Alumni Parent</span></td>
        <td><small class="text-muted">22 Oct 2024</small></td>
        <td><span class="badge-status badge-inactive">Waiting List</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Dossier"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Application"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Application')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<!-- Chart Initialization Script -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // 1. Admission Wing Demand Bar Chart
    const wingCtx = document.getElementById('admissionWingChart');
    if (wingCtx && window.Chart) {
      new Chart(wingCtx, {
        type: 'bar',
        data: {
          labels: ['Pre-Primary', 'Primary (1-5)', 'Middle (6-8)', 'Secondary (9-10)', 'Senior Sec (11-12)'],
          datasets: [
            {
              label: 'Applications Received',
              data: [184, 240, 160, 112, 146],
              backgroundColor: 'rgba(30, 64, 175, 0.85)',
              borderRadius: 5
            },
            {
              label: 'Intake Capacity',
              data: [90, 120, 80, 60, 120],
              backgroundColor: 'rgba(203, 213, 225, 0.75)',
              borderRadius: 5
            },
            {
              label: 'Confirmed Enrolled',
              data: [78, 95, 62, 48, 86],
              backgroundColor: 'rgba(16, 185, 129, 0.85)',
              borderRadius: 5
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: 'top',
              labels: { boxWidth: 12, font: { family: 'Plus Jakarta Sans', size: 12 } }
            },
            tooltip: {
              callbacks: {
                label: (ctx) => `${ctx.dataset.label}: ${ctx.raw} Students`
              }
            }
          },
          scales: {
            x: { grid: { display: false } },
            y: {
              grid: { color: 'rgba(226, 232, 240, 0.6)' },
              ticks: { font: { family: 'Plus Jakarta Sans', size: 11 } }
            }
          }
        }
      });
    }

    // 2. Lead Source Doughnut Chart
    const leadCtx = document.getElementById('leadSourceChart');
    if (leadCtx && window.Chart) {
      new Chart(leadCtx, {
        type: 'doughnut',
        data: {
          labels: ['Website & SEO', 'Referral', 'Walk-in', 'Social Ads', 'Print/Fairs'],
          datasets: [{
            data: [42, 26, 16, 11, 5],
            backgroundColor: [
              '#1e40af', // primary
              '#10b981', // success
              '#f59e0b', // warning
              '#0284c7', // info
              '#94a3b8'  // secondary
            ],
            borderWidth: 2,
            borderColor: '#ffffff'
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          cutout: '72%',
          plugins: {
            legend: { display: false },
            tooltip: {
              callbacks: {
                label: (ctx) => ` ${ctx.label}: ${ctx.raw}%`
              }
            }
          }
        }
      });
    }
  });
</script>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
