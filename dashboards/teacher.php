<?php
/**
 * EDUSYS PRO - Teacher Workplace Dashboard
 * Dedicated view for Faculty: Vikram Rathore (PGT Physics & Class Teacher 10-A)
 */
$page_title = "Teacher Workplace Dashboard";
$page_desc = "Dedicated workplace for Vikram Rathore (PGT Physics & Class Teacher 10-A).";
$active_module = "dashboard";
$active_submodule = "teacher.php";
$depth = 1;

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/sidebar.php';
require_once __DIR__ . '/../includes/topbar.php';
?>

<!-- Teacher Header Profile -->
<div class="erp-card mb-4 bg-gradient text-dark border-warning border-opacity-25 shadow-xs" style="background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);">
  <div class="erp-card-body p-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div class="d-flex align-items-center gap-3">
        <div class="avatar-lg rounded-circle bg-warning text-dark d-flex align-items-center justify-content-center fw-bold font-size-24" style="width: 60px; height: 60px;">
          TR
        </div>
        <div>
          <div class="d-flex align-items-center gap-2 mb-1">
            <h4 class="fw-bold text-dark mb-0">Vikram Rathore</h4>
            <span class="badge bg-warning text-dark font-size-12 px-2.5 py-1 rounded-pill">PGT Physics</span>
            <span class="badge bg-primary-subtle text-primary border border-primary border-opacity-25 font-size-11">Class Teacher: 10-A</span>
          </div>
          <div class="font-size-13 text-muted">
            <span>Staff ID: <strong class="text-dark font-mono">EMP-2018-0412</strong></span>
            <span class="mx-2">•</span>
            <span>Department: <strong class="text-dark">Science & Senior Secondary</strong></span>
            <span class="mx-2">•</span>
            <span>Biometric Check-in: <strong class="text-success">07:42 AM Today</strong></span>
          </div>
        </div>
      </div>
      <div class="d-flex align-items-center gap-2">
        <a href="<?php echo base_url('modules/attendance/daily-attendance.php'); ?>" class="btn btn-warning text-dark btn-sm fw-bold px-3 py-2 rounded-pill">
          <i class="bi bi-calendar2-check me-1"></i> Class 10-A Attendance
        </a>
        <a href="<?php echo base_url('modules/examinations/cce-marks-entry.php'); ?>" class="btn btn-dark btn-sm fw-bold px-3 py-2 rounded-pill">
          <i class="bi bi-award me-1"></i> Enter CCE Marks
        </a>
      </div>
    </div>
  </div>
</div>

<!-- KPI Row: Personalized for Teacher -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Assigned Pupils</h6>
        <div class="kpi-value">164</div>
        <div class="kpi-trend positive"><i class="bi bi-people-fill"></i> 3 Sections (10-A, 11-B, 12-A)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-workspace"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>10-A Attendance Today</h6>
        <div class="kpi-value text-success">41 / 42</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 97.6% Present (1 Absent)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Lectures Today</h6>
        <div class="kpi-value text-warning">5 Periods</div>
        <div class="kpi-trend"><i class="bi bi-clock-history"></i> Next: Period 3 (10:30 AM)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-mortarboard-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Pending Marks Entry</h6>
        <div class="kpi-value text-danger">18 Pending</div>
        <div class="kpi-trend negative"><i class="bi bi-exclamation-triangle"></i> Term 1 Physics Practical</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-pencil-square"></i></div>
    </div>
  </div>
</div>

<!-- Class Schedule & Quick Attendance Roster -->
<div class="row g-4 mb-4">
  <!-- Today's Teaching Periods -->
  <div class="col-lg-6">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-clock-history text-primary"></i> My Teaching Schedule (Wednesday)</h5>
        <span class="badge bg-primary text-white font-size-11">5 Lectures</span>
      </div>
      <div class="erp-table-responsive">
        <table class="erp-table">
          <thead>
            <tr>
              <th>Period</th>
              <th>Time</th>
              <th>Class</th>
              <th>Topic / Lesson</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>Period 1</strong></td>
              <td class="font-mono font-size-12">08:00 - 08:45 AM</td>
              <td><span class="badge bg-primary text-white">Class 10-A</span></td>
              <td>Electric Current & Circuits</td>
              <td><span class="badge bg-success-subtle text-success">Completed</span></td>
            </tr>
            <tr>
              <td><strong>Period 2</strong></td>
              <td class="font-mono font-size-12">08:45 - 09:30 AM</td>
              <td><span class="badge bg-info text-white">Class 11-B</span></td>
              <td>Thermodynamics Laws</td>
              <td><span class="badge bg-success-subtle text-success">Completed</span></td>
            </tr>
            <tr class="table-warning bg-warning bg-opacity-10">
              <td><strong>Period 3</strong></td>
              <td class="font-mono font-size-12 fw-bold text-dark">10:30 - 11:15 AM</td>
              <td><span class="badge bg-dark text-white">Class 12-A</span></td>
              <td>Optics Lab (Ray Diagrams)</td>
              <td><span class="badge bg-warning text-dark"><i class="bi bi-record-circle-fill me-1"></i> Up Next</span></td>
            </tr>
            <tr>
              <td><strong>Period 4</strong></td>
              <td class="font-mono font-size-12">11:15 - 12:00 PM</td>
              <td><span class="badge bg-primary text-white">Class 10-A</span></td>
              <td>Physics Numerical Doubt Desk</td>
              <td><span class="badge bg-light text-muted border">Upcoming</span></td>
            </tr>
            <tr>
              <td><strong>Period 6</strong></td>
              <td class="font-mono font-size-12">01:15 - 02:00 PM</td>
              <td><span class="badge bg-info text-white">Class 11-B</span></td>
              <td>Rotational Motion Mechanics</td>
              <td><span class="badge bg-light text-muted border">Upcoming</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Class 10-A Attendance Action Desk -->
  <div class="col-lg-6">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-calendar2-check text-success"></i> Class 10-A Attendance Desk</h5>
        <span class="badge bg-success text-white font-size-11">08:35 AM SMS Sent</span>
      </div>
      <div class="erp-card-body">
        <div class="row g-2 mb-3 text-center">
          <div class="col-4">
            <div class="p-2.5 bg-light rounded-3 border">
              <h5 class="fw-bold text-dark mb-0">42</h5>
              <small class="text-muted font-size-11">Enrolled</small>
            </div>
          </div>
          <div class="col-4">
            <div class="p-2.5 bg-success bg-opacity-10 border border-success border-opacity-25 rounded-3">
              <h5 class="fw-bold text-success mb-0">41</h5>
              <small class="text-success font-size-11">Present (97.6%)</small>
            </div>
          </div>
          <div class="col-4">
            <div class="p-2.5 bg-danger bg-opacity-10 border border-danger border-opacity-25 rounded-3">
              <h5 class="fw-bold text-danger mb-0">1</h5>
              <small class="text-danger font-size-11">Absent Today</small>
            </div>
          </div>
        </div>

        <div class="p-3 bg-light rounded-3 border mb-3">
          <h6 class="fw-bold text-dark font-size-13 mb-2">Today's Absentee Record:</h6>
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <strong>Kabir Verma (Roll #1022)</strong>
              <small class="text-muted d-block font-size-12">Parent: Anil Verma (+91 98110 33921)</small>
            </div>
            <span class="badge bg-danger-subtle text-danger border border-danger border-opacity-25 font-size-11">
              <i class="bi bi-check-all"></i> SMS Sent 08:35 AM
            </span>
          </div>
        </div>

        <div class="d-flex gap-2">
          <a href="<?php echo base_url('modules/attendance/daily-attendance.php'); ?>" class="btn btn-outline-success btn-sm w-50 fw-bold">
            <i class="bi bi-check2-all me-1"></i> Edit Attendance
          </a>
          <a href="<?php echo base_url('modules/teacher-portal/parent-communication.php'); ?>" class="btn btn-outline-primary btn-sm w-50 fw-bold">
            <i class="bi bi-chat-dots me-1"></i> Message Parents
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Pending CCE Marks & Homework Submissions to Grade -->
<div class="row g-4 mb-4">
  <div class="col-lg-7">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-award text-warning"></i> CCE Marks Entry Queue (Term 1 Physics)</h5>
        <a href="<?php echo base_url('modules/examinations/cce-marks-entry.php'); ?>" class="fw-bold text-primary font-size-12 text-decoration-none">Open Marks Grid &rarr;</a>
      </div>
      <div class="erp-table-responsive">
        <table class="erp-table">
          <thead>
            <tr>
              <th>Class & Section</th>
              <th>Subject</th>
              <th>Assessment</th>
              <th>Completed</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>Class 10-A</strong></td>
              <td>086 • Science (Theory)</td>
              <td>Periodic Test 1 (80)</td>
              <td><span class="badge bg-success">42 / 42 (100%)</span></td>
              <td><span class="text-success fw-bold font-size-12"><i class="bi bi-check-circle"></i> Locked</span></td>
            </tr>
            <tr>
              <td><strong>Class 10-A</strong></td>
              <td>086 • Science (Lab)</td>
              <td>Subject Enrichment (20)</td>
              <td><span class="badge bg-warning text-dark">24 / 42 (57%)</span></td>
              <td><a href="<?php echo base_url('modules/examinations/cce-marks-entry.php'); ?>" class="btn btn-sm btn-primary py-0 px-2 font-size-11">Enter 18 Marks</a></td>
            </tr>
            <tr>
              <td><strong>Class 11-B</strong></td>
              <td>042 • Physics Theory</td>
              <td>Unit Test 2 (50)</td>
              <td><span class="badge bg-success">40 / 40 (100%)</span></td>
              <td><span class="text-success fw-bold font-size-12"><i class="bi bi-check-circle"></i> Locked</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-journal-text text-info"></i> Lesson Diary & Syllabus Pace</h5>
        <span class="badge bg-info text-white font-size-11">78% Complete</span>
      </div>
      <div class="erp-card-body">
        <div class="mb-3">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span>Class 10-A Physics:</span>
            <strong class="text-success">85% Completed</strong>
          </div>
          <div class="progress" style="height: 6px;">
            <div class="progress-bar bg-success" style="width: 85%;"></div>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span>Class 11-B Physics:</span>
            <strong class="text-primary">74% Completed</strong>
          </div>
          <div class="progress" style="height: 6px;">
            <div class="progress-bar bg-primary" style="width: 74%;"></div>
          </div>
        </div>

        <div class="p-3 bg-light rounded-3 border font-size-13">
          <strong class="d-block text-dark mb-1">Today's Diary Note:</strong>
          <span class="text-muted font-size-12">Completed derivation of lens formula with sign convention in Class 10-A. Assigned numerical problems 1-5 from NCERT textbook.</span>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
