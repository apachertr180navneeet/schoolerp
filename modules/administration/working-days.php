<?php
/**
 * EDUSYS PRO - WORKING DAYS & HOURS
 * Dedicated operational interface & records management for Working Days & Hours
 */
$page_title = "Working Days & Hours";
$page_desc = "Instructional day calendar, daily bell schedule, period duration, recess intervals, and assembly timings";
$active_module = "administration";
$active_submodule = "working-days.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/administration/school-profile.php'); ?>">Administration & Setup</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-layers text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/administration/school-profile.php'); ?>" class="btn btn-light border" title="School Institutional Dossier">
      <i class="bi bi-building me-1"></i> Profile
    </a>
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'working-days_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Add New Record
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Instructional Days</h6>
        <div class="kpi-value">224 Days</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Full Academic Session</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Teaching Periods</h6>
        <div class="kpi-value">8 Periods / Day</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 40 Mins Each + Zero Period</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-stopwatch"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>School Timings</h6>
        <div class="kpi-value">08:00 AM - 02:15 PM</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> 6 Hours 15 Mins Daily</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-clock-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Recess Break</h6>
        <div class="kpi-value">30 Minutes</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> 11:00 AM to 11:30 AM</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cup-hot"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search shift code, day title, period...">
    </div>
    <select class="form-select" style="max-width: 240px;">
      <option selected>All Shift Schedules</option>
      <option >Regular Summer Shift (Apr - Oct)</option>
      <option >Winter Shift (Nov - Feb)</option>
      <option >Examination Day Shift (08:30 - 12:30)</option>
      <option >Pre-Primary Half-Day Shift</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active Default</option>
      <option >Seasonal Schedule</option>
      <option >Examination Preset</option>
      <option >Draft</option>
    </select>
  </div>
  <div class="table-filter-right">
    <span class="font-size-13 text-muted">Showing <strong class="table-visible-count text-primary">8</strong> verified records</span>
  </div>
</div>

<!-- Domain Data Table -->
<div class="erp-table-responsive mb-0">
  <table class="erp-table" id="mainDataTable">
    <thead>
      <tr>
        <th>Shift Code</th>
        <th>Schedule Title & Day Type</th>
        <th>Applicable Grades</th>
        <th>Arrival Time</th>
        <th>Assembly & Zero Period</th>
        <th>Period Duration</th>
        <th>Dispersal Time</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SFT-REG-01</td>
        <td>
          <div class="fw-semibold text-dark">Regular School Timings (Mon to Fri)</div>
          <small class="text-muted font-size-11">Standard 8-Period Instructional Day</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 1 to 12</span></td>
        <td><small class="text-dark">07:55 AM Gates Close</small></td>
        <td><small class="text-muted font-mono font-size-12">08:00 AM - 08:30 AM (Assembly)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">40 Mins &bull; 8 Periods</span></td>
        <td><small class="text-muted">02:15 PM Dispersal</small></td>
        <td><span class="badge-status badge-active">Active Default</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Working Days & Hours')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SFT-PRE-02</td>
        <td>
          <div class="fw-semibold text-dark">Pre-Primary Foundation Shift (Mon to Fri)</div>
          <small class="text-muted font-size-11">Early Childhood Play & Learning</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Nursery, LKG, UKG</span></td>
        <td><small class="text-dark">08:30 AM Gates Close</small></td>
        <td><small class="text-muted font-mono font-size-12">08:30 AM - 09:00 AM (Circle Time)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">30 Mins &bull; 6 Periods</span></td>
        <td><small class="text-muted">12:30 PM Dispersal</small></td>
        <td><span class="badge-status badge-active">Active Default</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Working Days & Hours')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SFT-SAT-03</td>
        <td>
          <div class="fw-semibold text-dark">Senior Secondary Saturday Session</div>
          <small class="text-muted font-size-11">Board Remedial & JEE/NEET Foundation</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 9 to 12 (1st & 3rd Sat)</span></td>
        <td><small class="text-dark">08:00 AM Gates Close</small></td>
        <td><small class="text-muted font-mono font-size-12">08:00 AM - 08:15 AM (Briefing)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">50 Mins &bull; 4 Double Labs</span></td>
        <td><small class="text-muted">01:00 PM Dispersal</small></td>
        <td><span class="badge-status badge-active">Active Preset</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Working Days & Hours')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SFT-WIN-04</td>
        <td>
          <div class="fw-semibold text-dark">Winter Shift Timings (Dense Fog Protocol)</div>
          <small class="text-muted font-size-11">Government Cold Wave Reschedule</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">All Grades (Nursery to 12)</span></td>
        <td><small class="text-dark">08:55 AM Gates Close</small></td>
        <td><small class="text-muted font-mono font-size-12">09:00 AM - 09:20 AM (In-Class)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">35 Mins &bull; 8 Periods</span></td>
        <td><small class="text-muted">02:45 PM Dispersal</small></td>
        <td><span class="badge-status badge-pending">Seasonal (Nov-Jan)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Working Days & Hours')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SFT-EXM-05</td>
        <td>
          <div class="fw-semibold text-dark">Board & Term Examination Shift</div>
          <small class="text-muted font-size-11">Exam Days Only (Reading & Writing)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 6 to 12</span></td>
        <td><small class="text-dark">08:15 AM Gates Close</small></td>
        <td><small class="text-muted font-mono font-size-12">08:30 AM - 08:45 AM (Reading)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">3 Hours Continuous Exam</span></td>
        <td><small class="text-muted">12:00 PM Dispersal</small></td>
        <td><span class="badge-status badge-active">Exam Preset</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Working Days & Hours')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SFT-PTM-06</td>
        <td>
          <div class="fw-semibold text-dark">Parent-Teacher Meeting Saturday Shift</div>
          <small class="text-muted font-size-11">Classroom Parent Consultation Slots</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">All Grades (Nursery to 12)</span></td>
        <td><small class="text-dark">08:15 AM Teachers In</small></td>
        <td><small class="text-muted font-mono font-size-12">08:30 AM First Slot Opens</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">10-Min Slots &bull; 48 Classrooms</span></td>
        <td><small class="text-muted">01:30 PM Close</small></td>
        <td><span class="badge-status badge-active">PTM Preset</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Working Days & Hours')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SFT-SPR-07</td>
        <td>
          <div class="fw-semibold text-dark">After-School Sports Academy Session</div>
          <small class="text-muted font-size-11">Coaching in Football, Cricket, Tennis, Swimming</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Registered Squad Athletes</span></td>
        <td><small class="text-dark">02:30 PM Assembly</small></td>
        <td><small class="text-muted font-mono font-size-12">Warm-up & Physical Conditioning</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">90 Mins Coaching Drills</span></td>
        <td><small class="text-muted">04:30 PM Bus Departure</small></td>
        <td><span class="badge-status badge-active">Active Preset</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Working Days & Hours')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SFT-CLB-08</td>
        <td>
          <div class="fw-semibold text-dark">Zero Period Club & Activity Block</div>
          <small class="text-muted font-size-11">Every Wednesday 7th & 8th Period</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 4 to 10</span></td>
        <td><small class="text-dark">In Regular Day</small></td>
        <td><small class="text-muted font-mono font-size-12">Robotics, Music, Dance, Karate</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">80 Mins Combined Lab</span></td>
        <td><small class="text-muted">02:15 PM Standard</small></td>
        <td><span class="badge-status badge-active">Active Preset</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Working Days & Hours')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
