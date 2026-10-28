<?php
/**
 * EDUSYS PRO - TEACHER MEETING SLOTS
 * Dedicated operational interface & records management for Teacher Meeting Slots
 */
$page_title = "Teacher Meeting Slots";
$page_desc = "Individual teacher-parent appointment slots, real-time availability calendar, and discussion agendas";
$active_module = "events-ptm";
$active_submodule = "meeting-slots.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/events-ptm/calendar.php'); ?>">Events & PTM</a></li>
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
    <a href="<?php echo base_url('modules/events-ptm/calendar.php'); ?>" class="btn btn-light border" title="Interactive Master Calendar">
      <i class="bi bi-calendar3 me-1"></i> Calendar
    </a>
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'meeting-slots_export.csv')" title="Export Table as CSV">
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
        <h6>Total Slots Created</h6>
        <div class="kpi-value">1,480 Slots</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 10-Min Consultations</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-grid-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Booked Slots</h6>
        <div class="kpi-value">1,380 Booked</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 93.2% Booked Capacity</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-all"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Available Slots</h6>
        <div class="kpi-value">100 Free</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Walk-in Buffer Slots</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-plus"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Completed Today</h6>
        <div class="kpi-value">248 Meetings</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Logged in System</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-clipboard-check"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search slot #, student, parent, teacher...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Slot Times</option>
      <option >Early Morning (08:30 - 10:00)</option>
      <option >Mid Morning (10:15 - 11:45)</option>
      <option >Afternoon (12:00 - 01:30)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Confirmed Booking</option>
      <option >Available / Free</option>
      <option >Completed</option>
      <option >Cancelled / No Show</option>
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
        <th>Slot Token #</th>
        <th>Teacher & Subject</th>
        <th>Time Slot</th>
        <th>Parent Name</th>
        <th>Student & Roll #</th>
        <th>Discussion Focus</th>
        <th>Room #</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SLOT-101</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Sunita Kaul (Maths)</div>
          <small class="text-muted font-size-11">Class 10-A Mentor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">08:30 AM - 08:40 AM</span></td>
        <td><small class="text-dark">Rajesh Sharma</small></td>
        <td><small class="text-muted font-mono font-size-12">Aarav Sharma (Roll #01)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Algebra & Pre-Board Preparation</span></td>
        <td><small class="text-muted">Room 201</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Meeting Slots')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SLOT-102</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Sunita Kaul (Maths)</div>
          <small class="text-muted font-size-11">Class 10-A Mentor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">08:42 AM - 08:52 AM</span></td>
        <td><small class="text-dark">Bhavin Patel</small></td>
        <td><small class="text-muted font-mono font-size-12">Diya Patel (Roll #02)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Geometry Doubt Clearing Strategy</span></td>
        <td><small class="text-muted">Room 201</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Meeting Slots')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SLOT-103</td>
        <td>
          <div class="fw-semibold text-dark">Dr. Alok Verma (Physics)</div>
          <small class="text-muted font-size-11">Class 12-Science</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">09:00 AM - 09:10 AM</span></td>
        <td><small class="text-dark">Dr. K. S. Reddy</small></td>
        <td><small class="text-muted font-mono font-size-12">Saanvi Reddy (Roll #14)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">CBSE Practical Assessment Logs</span></td>
        <td><small class="text-muted">Physics Lab 1</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Meeting Slots')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SLOT-104</td>
        <td>
          <div class="fw-semibold text-dark">Dr. Alok Verma (Physics)</div>
          <small class="text-muted font-size-11">Class 12-Science</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">09:12 AM - 09:22 AM</span></td>
        <td><small class="text-dark">Mahesh Joshi</small></td>
        <td><small class="text-muted font-mono font-size-12">Reyansh Joshi (Roll #08)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Electrostatics & Board Mock Exam</span></td>
        <td><small class="text-muted">Physics Lab 1</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Meeting Slots')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SLOT-105</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Radhika Iyer (Accounts)</div>
          <small class="text-muted font-size-11">Class 12-Commerce</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">09:30 AM - 09:40 AM</span></td>
        <td><small class="text-dark">Gopalan Nair</small></td>
        <td><small class="text-muted font-mono font-size-12">Prisha Nair (Roll #12)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Company Accounts & Cash Flow</span></td>
        <td><small class="text-muted">Commerce Lab 2</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Meeting Slots')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SLOT-106</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Rajiv Narang (Science)</div>
          <small class="text-muted font-size-11">Class 10-B Mentor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">10:15 AM - 10:25 AM</span></td>
        <td><small class="text-dark">Available for Walk-in</small></td>
        <td><small class="text-muted font-mono font-size-12">— Unassigned —</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Buffer Slot for Emergency Query</span></td>
        <td><small class="text-muted">Room 202</small></td>
        <td><span class="badge-status badge-pending">Available</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Meeting Slots')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SLOT-107</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Deepak Rawat (French)</div>
          <small class="text-muted font-size-11">Middle Wing</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">11:00 AM - 11:10 AM</span></td>
        <td><small class="text-dark">Sunil Deshmukh</small></td>
        <td><small class="text-muted font-mono font-size-12">Arya Deshmukh (Roll #05)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Grammar & Speaking Fluency</span></td>
        <td><small class="text-muted">Room 105</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Meeting Slots')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SLOT-108</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Shalini Verma (Primary)</div>
          <small class="text-muted font-size-11">Class 1-A Mentor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">11:30 AM - 11:40 AM</span></td>
        <td><small class="text-dark">Rakesh Mehta</small></td>
        <td><small class="text-muted font-mono font-size-12">Kabir Mehta (Roll #18)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Reading Speed & Cursive Writing</span></td>
        <td><small class="text-muted">Room 04</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Teacher Meeting Slots')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
