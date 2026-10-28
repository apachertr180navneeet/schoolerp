<?php
/**
 * EDUSYS PRO - EXAMINATION & RESULTS COMMAND CENTER
 * Comprehensive operational dashboard with live exam cycle status, pass statistics,
 * CCE & Board grade distribution, and rapid controller workflows.
 */
$page_title = "Examination Dashboard";
$page_desc = "Master control center for CBSE board exams, term evaluations, grading matrices & results analytics";
$active_module = "examinations";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/examinations/dashboard.php'); ?>">Examination & Results</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-award-fill text-primary me-2"></i>Examination & Results Command Center</h1>
    <p>CBSE Board (AISSE/AISSCE) & Internal Assessment Cycle Management - Session 2026-27</p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/examinations/exam-schedules.php'); ?>" class="btn btn-light border">
      <i class="bi bi-calendar-range me-1"></i> View Timetables
    </a>
    <a href="<?php echo base_url('modules/examinations/marks-entry.php'); ?>" class="btn btn-light border">
      <i class="bi bi-pencil-square me-1"></i> Marks Portal
    </a>
    <a href="<?php echo base_url('modules/examinations/report-cards.php'); ?>" class="btn btn-primary fw-bold">
      <i class="bi bi-file-earmark-person me-1"></i> Generate Report Cards
    </a>
  </div>
</div>

<!-- Key Performance Indicators -->
<div class="row g-3 mb-4">
  <div class="col-6 col-lg-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Active Exam Cycle</h6>
        <div class="kpi-value">Pre-Board II</div>
        <div class="kpi-trend positive"><i class="bi bi-hourglass-split"></i> 4 Days Remaining</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-event"></i></div>
    </div>
  </div>
  <div class="col-6 col-lg-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Admit Cards Issued</h6>
        <div class="kpi-value">1,420 <small class="text-muted font-size-13">/ 1,420</small></div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle-fill"></i> 100% Dispatched</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-card-checklist"></i></div>
    </div>
  </div>
  <div class="col-6 col-lg-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Marks Entry Status</h6>
        <div class="kpi-value">84.6%</div>
        <div class="kpi-trend positive"><i class="bi bi-cloud-arrow-up"></i> 52/60 Papers Uploaded</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-pencil-square"></i></div>
    </div>
  </div>
  <div class="col-6 col-lg-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Projected Pass Rate</h6>
        <div class="kpi-value">98.2%</div>
        <div class="kpi-trend positive"><i class="bi bi-graph-up-arrow"></i> +1.4% vs Last Year</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-trophy-fill"></i></div>
    </div>
  </div>
</div>

<!-- Active War Room & Rapid Operations Grid -->
<div class="row g-4 mb-4">
  <!-- Today's Examination Hall Schedule -->
  <div class="col-lg-8">
    <div class="card border shadow-sm h-100">
      <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <div>
          <h6 class="mb-0 fw-bold text-dark"><i class="bi bi-clock-history text-primary me-2"></i>Today's Examination Schedule & Hall Status</h6>
          <small class="text-muted">Wednesday, 28 October 2026 | Morning Session (09:30 AM - 12:30 PM)</small>
        </div>
        <span class="badge bg-success-subtle text-success border"><i class="bi bi-broadcast me-1"></i>Live Session</span>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table erp-table table-hover mb-0">
            <thead>
              <tr>
                <th>Hall / Room</th>
                <th>Class & Stream</th>
                <th>Subject & Code</th>
                <th>Enrolled</th>
                <th>Chief Invigilator</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><span class="fw-bold text-primary">Hall A (Auditorium)</span></td>
                <td>Class X (Sec A, B, C)</td>
                <td><span class="badge bg-light text-dark border">Mathematics Std (041)</span></td>
                <td><strong>124</strong> Candidates</td>
                <td>Dr. Sunita Deshmukh</td>
                <td><span class="badge bg-primary"><i class="bi bi-pen me-1"></i>Exam In-Progress</span></td>
              </tr>
              <tr>
                <td><span class="fw-bold text-primary">Hall B (Library Block)</span></td>
                <td>Class XII (Science)</td>
                <td><span class="badge bg-light text-dark border">Physics Theory (042)</span></td>
                <td><strong>88</strong> Candidates</td>
                <td>Prof. Rajesh Malhotra</td>
                <td><span class="badge bg-primary"><i class="bi bi-pen me-1"></i>Exam In-Progress</span></td>
              </tr>
              <tr>
                <td><span class="fw-bold text-primary">Room 204 (Wing C)</span></td>
                <td>Class XII (Commerce)</td>
                <td><span class="badge bg-light text-dark border">Accountancy (055)</span></td>
                <td><strong>46</strong> Candidates</td>
                <td>Mrs. Neha Kulkarni</td>
                <td><span class="badge bg-primary"><i class="bi bi-pen me-1"></i>Exam In-Progress</span></td>
              </tr>
              <tr>
                <td><span class="fw-bold text-primary">Computer Lab 1</span></td>
                <td>Class IX (Sec A, B)</td>
                <td><span class="badge bg-light text-dark border">Info Technology (402)</span></td>
                <td><strong>72</strong> Candidates</td>
                <td>Mr. Amit Sen</td>
                <td><span class="badge bg-success"><i class="bi bi-check2-all me-1"></i>Papers Collected</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer bg-light py-2 d-flex justify-content-between align-items-center font-size-13">
        <span><i class="bi bi-shield-check text-success me-1"></i> Confidential OMR packets sealed with CCTV surveillance.</span>
        <a href="<?php echo base_url('modules/examinations/exam-rooms.php'); ?>" class="fw-bold text-primary">Manage All 18 Examination Halls <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
  </div>

  <!-- CBSE 9-Point Grade Distribution -->
  <div class="col-lg-4">
    <div class="card border shadow-sm h-100">
      <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold text-dark"><i class="bi bi-bar-chart-steps text-primary me-2"></i>Grade Distribution (Pre-Board)</h6>
        <span class="badge bg-light text-dark border">CBSE 9-Point</span>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span class="fw-semibold text-success"><i class="bi bi-circle-fill font-size-10 me-1"></i> A1 Grade (91% - 100%)</span>
            <strong>328 Students (23.1%)</strong>
          </div>
          <div class="progress" style="height: 7px;">
            <div class="progress-bar bg-success" style="width: 23.1%"></div>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span class="fw-semibold text-primary"><i class="bi bi-circle-fill font-size-10 me-1"></i> A2 Grade (81% - 90%)</span>
            <strong>412 Students (29.0%)</strong>
          </div>
          <div class="progress" style="height: 7px;">
            <div class="progress-bar bg-primary" style="width: 29.0%"></div>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span class="fw-semibold text-info"><i class="bi bi-circle-fill font-size-10 me-1"></i> B1 Grade (71% - 80%)</span>
            <strong>340 Students (23.9%)</strong>
          </div>
          <div class="progress" style="height: 7px;">
            <div class="progress-bar bg-info" style="width: 23.9%"></div>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span class="fw-semibold text-secondary"><i class="bi bi-circle-fill font-size-10 me-1"></i> B2 Grade (61% - 70%)</span>
            <strong>214 Students (15.1%)</strong>
          </div>
          <div class="progress" style="height: 7px;">
            <div class="progress-bar bg-secondary" style="width: 15.1%"></div>
          </div>
        </div>

        <div class="mb-2">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span class="fw-semibold text-warning"><i class="bi bi-circle-fill font-size-10 me-1"></i> C1 / C2 Grade (41% - 60%)</span>
            <strong>102 Students (7.2%)</strong>
          </div>
          <div class="progress" style="height: 7px;">
            <div class="progress-bar bg-warning" style="width: 7.2%"></div>
          </div>
        </div>

        <div class="mt-3 p-2 bg-light rounded border font-size-12 d-flex justify-content-between align-items-center">
          <span class="text-danger fw-semibold"><i class="bi bi-exclamation-triangle-fill me-1"></i> Remedial Candidates (D/E):</span>
          <span class="badge bg-danger-subtle text-danger border">24 Students (<a href="<?php echo base_url('modules/academics/remedial-classes.php'); ?>" class="text-danger fw-bold">Remedial Queue</a>)</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Quick Action Portals for Examination Controllers -->
<div class="row g-3 mb-4">
  <div class="col-md-3">
    <div class="card p-3 border shadow-sm text-center h-100 hover-card">
      <div class="rounded-circle bg-primary-subtle text-primary p-3 d-inline-block mx-auto mb-2">
        <i class="bi bi-person-badge font-size-24"></i>
      </div>
      <h6 class="fw-bold mb-1">Admit Cards & Seating</h6>
      <p class="text-muted font-size-12 mb-3">Roll number allocation, desk sticker tags & hall tickets</p>
      <a href="<?php echo base_url('modules/examinations/admit-cards.php'); ?>" class="btn btn-sm btn-outline-primary mt-auto">Open Admit Portal</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card p-3 border shadow-sm text-center h-100 hover-card">
      <div class="rounded-circle bg-success-subtle text-success p-3 d-inline-block mx-auto mb-2">
        <i class="bi bi-journal-check font-size-24"></i>
      </div>
      <h6 class="fw-bold mb-1">Internal Assessment (20%)</h6>
      <p class="text-muted font-size-12 mb-3">Periodic tests, portfolio, subject enrichment & CCE</p>
      <a href="<?php echo base_url('modules/examinations/internal-assessment.php'); ?>" class="btn btn-sm btn-outline-success mt-auto">Assessments 20%</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card p-3 border shadow-sm text-center h-100 hover-card">
      <div class="rounded-circle bg-warning-subtle text-warning p-3 d-inline-block mx-auto mb-2">
        <i class="bi bi-cpu font-size-24"></i>
      </div>
      <h6 class="fw-bold mb-1">Result Processing Engine</h6>
      <p class="text-muted font-size-12 mb-3">CBSE 80:20 tabulation, grace marks, ranks & moderation</p>
      <a href="<?php echo base_url('modules/examinations/result-processing.php'); ?>" class="btn btn-sm btn-outline-warning mt-auto">Process Engine</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card p-3 border shadow-sm text-center h-100 hover-card">
      <div class="rounded-circle bg-info-subtle text-info p-3 d-inline-block mx-auto mb-2">
        <i class="bi bi-printer font-size-24"></i>
      </div>
      <h6 class="fw-bold mb-1">Report Card Publishing</h6>
      <p class="text-muted font-size-12 mb-3">Bilingual CBSE report cards with QR verification</p>
      <a href="<?php echo base_url('modules/examinations/report-cards.php'); ?>" class="btn btn-sm btn-outline-info mt-auto">Publish Cards</a>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
