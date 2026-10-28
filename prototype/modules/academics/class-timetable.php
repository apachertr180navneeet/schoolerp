<?php
/**
 * EDUSYS PRO - CLASS TIMETABLE
 * Dedicated operational interface & records management for Class Timetable
 */
$page_title = "Class Timetable";
$page_desc = "Section-wise master weekly timetable: Period allocations, classroom locations, and teaching faculty";
$active_module = "academics";
$active_submodule = "class-timetable.php";
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
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-table text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'class-timetable_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-printer-fill me-1"></i> Print Class Timetable
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Target Section</h6>
        <div class="kpi-value">Class 10 - Section A</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Room 204, Block A</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-table"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Class Teacher</h6>
        <div class="kpi-value">Mrs. Sunita Kaul</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> PGT Mathematics</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-badge-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Weekly Periods</h6>
        <div class="kpi-value">48 Periods Total</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Mon to Sat Routine</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar3"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Lab Blocks</h6>
        <div class="kpi-value">4 Double Blocks</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Physics & Chemistry Labs</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-tools"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search day, period, subject, faculty, room...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Days of Week</option>
      <option >Monday Schedule</option>
      <option >Tuesday Schedule</option>
      <option >Wednesday Schedule</option>
      <option >Thursday Schedule</option>
      <option >Friday Schedule</option>
      <option >Saturday Schedule</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active Period</option>
      <option >Double Lab Block</option>
      <option >Assembly / Recess</option>
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
        <th>Slot / Period Code</th>
        <th>Day & Time Slot</th>
        <th>Period Subject</th>
        <th>Assigned Faculty</th>
        <th>Classroom / Laboratory</th>
        <th>Curriculum Chapter Unit</th>
        <th>Block Type</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MON-P1</td>
        <td>
          <div class="fw-semibold text-dark">Monday (07:45 - 08:30 AM)</div>
          <small class="text-muted font-size-11">Period 1</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mathematics (041)</span></td>
        <td><small class="text-dark">Mrs. Sunita Kaul (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">Room #204 (Block A)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Chapter 8: Trigonometry</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Active Period</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class Timetable')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MON-P2</td>
        <td>
          <div class="fw-semibold text-dark">Monday (08:30 - 09:15 AM)</div>
          <small class="text-muted font-size-11">Period 2</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">English Language (184)</span></td>
        <td><small class="text-dark">Mr. Deepak Rawat (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">Room #204 (Block A)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">First Flight: Madam Rides the Bus</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Active Period</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class Timetable')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MON-REC</td>
        <td>
          <div class="fw-semibold text-dark">Monday (09:15 - 09:30 AM)</div>
          <small class="text-muted font-size-11">Short Break</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Morning Refreshment & Recess</span></td>
        <td><small class="text-dark">Duty Teachers</small></td>
        <td><small class="text-muted font-mono font-size-12">Courtyard & Cafeteria</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Nutrition Break</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-pending">Recess</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class Timetable')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MON-P3-4</td>
        <td>
          <div class="fw-semibold text-dark">Monday (09:30 - 11:00 AM)</div>
          <small class="text-muted font-size-11">Periods 3 & 4 (Block)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Science Lab: Physics Practical</span></td>
        <td><small class="text-dark">Dr. K. L. Sharma (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">Physics Lab 1 (Block B)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Ohm's Law Verification Experiment</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Double Lab Block</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class Timetable')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MON-LCH</td>
        <td>
          <div class="fw-semibold text-dark">Monday (11:00 - 11:35 AM)</div>
          <small class="text-muted font-size-11">Lunch Break</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mid-Day Dining & Recreation</span></td>
        <td><small class="text-dark">Discipline Council</small></td>
        <td><small class="text-muted font-mono font-size-12">Dining Hall & Campus Grounds</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Lunch Recess</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-pending">Recess</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class Timetable')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MON-P5</td>
        <td>
          <div class="fw-semibold text-dark">Monday (11:35 - 12:15 PM)</div>
          <small class="text-muted font-size-11">Period 5</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Social Science (Hist)</span></td>
        <td><small class="text-dark">Mrs. Shalini Verma (TGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">Room #204 (Block A)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Nationalism in India</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Active Period</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class Timetable')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MON-P6</td>
        <td>
          <div class="fw-semibold text-dark">Monday (12:15 - 12:55 PM)</div>
          <small class="text-muted font-size-11">Period 6</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Hindi Course-A</span></td>
        <td><small class="text-dark">Mrs. Meenakshi Soni</small></td>
        <td><small class="text-muted font-mono font-size-12">Room #204 (Block A)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Kshitij: Surdas ke Pad</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Active Period</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class Timetable')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MON-P7-8</td>
        <td>
          <div class="fw-semibold text-dark">Monday (12:55 - 02:15 PM)</div>
          <small class="text-muted font-size-11">Periods 7 & 8 (Block)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Artificial Intelligence (Skill)</span></td>
        <td><small class="text-dark">Mr. Kunal Bansal (MCA)</small></td>
        <td><small class="text-muted font-mono font-size-12">Computer Lab 2</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Computer Vision & Python Project</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Double Lab Block</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class Timetable')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
