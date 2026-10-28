<?php
/**
 * EDUSYS PRO - PTM SCHEDULING
 * Dedicated operational interface & records management for PTM Scheduling
 */
$page_title = "PTM Scheduling";
$page_desc = "Room assignments, classroom allocations, shift timings, and master teacher slot coordinators";
$active_module = "events-ptm";
$active_submodule = "ptm-scheduling.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'ptm-scheduling_export.csv')" title="Export Table as CSV">
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
        <h6>Allocated Rooms</h6>
        <div class="kpi-value">48 Classrooms</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 1 Room Per Section</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-door-open-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Slot Duration</h6>
        <div class="kpi-value">10 Minutes</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Includes 2m Buffer</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-stopwatch"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Faculty on Duty</h6>
        <div class="kpi-value">124 Teachers</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> 100% Rostered</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-lines-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Tea & Rest Breaks</h6>
        <div class="kpi-value">2 Interval Breaks</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> 10:30 AM & 12:00 PM</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cup-hot-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search class, section, room #, teacher...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Wings</option>
      <option >Pre-Primary Wing (Ground Floor)</option>
      <option >Primary Wing (1st Floor)</option>
      <option >Middle Wing (2nd Floor)</option>
      <option >Secondary Wing (3rd Floor)</option>
      <option >Senior Secondary (4th Floor)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Room Allocated</option>
      <option >Slots Published</option>
      <option >Schedule Finalized</option>
      <option >Pending Confirmation</option>
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
        <th>Schedule ID</th>
        <th>Class & Section</th>
        <th>Assigned Room #</th>
        <th>Class Teacher</th>
        <th>Subject Teachers Present</th>
        <th>Shift Timings</th>
        <th>Slot Capacity</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SCH-10A</td>
        <td>
          <div class="fw-semibold text-dark">Class 10 - Section A</div>
          <small class="text-muted font-size-11">38 Enrolled Students</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Room 201 (Senior Wing)</span></td>
        <td><small class="text-dark">Mrs. Sunita Kaul</small></td>
        <td><small class="text-muted font-mono font-size-12">Maths, Science, English, SST</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">08:30 AM - 01:30 PM</span></td>
        <td><small class="text-muted">38 of 38 Booked</small></td>
        <td><span class="badge-status badge-active">Fully Booked</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'PTM Scheduling')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SCH-10B</td>
        <td>
          <div class="fw-semibold text-dark">Class 10 - Section B</div>
          <small class="text-muted font-size-11">36 Enrolled Students</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Room 202 (Senior Wing)</span></td>
        <td><small class="text-dark">Mr. Rajiv Narang</small></td>
        <td><small class="text-muted font-mono font-size-12">Maths, Science, Hindi, SST</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">08:30 AM - 01:30 PM</span></td>
        <td><small class="text-muted">35 of 36 Booked</small></td>
        <td><span class="badge-status badge-active">Slots Open (1)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'PTM Scheduling')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SCH-12S</td>
        <td>
          <div class="fw-semibold text-dark">Class 12 - Science (PCM)</div>
          <small class="text-muted font-size-11">32 Enrolled Students</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Physics Lab 1</span></td>
        <td><small class="text-dark">Dr. Alok Verma</small></td>
        <td><small class="text-muted font-mono font-size-12">Physics, Chem, Maths, CS</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">08:30 AM - 01:30 PM</span></td>
        <td><small class="text-muted">32 of 32 Booked</small></td>
        <td><span class="badge-status badge-active">Fully Booked</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'PTM Scheduling')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SCH-12C</td>
        <td>
          <div class="fw-semibold text-dark">Class 12 - Commerce</div>
          <small class="text-muted font-size-11">34 Enrolled Students</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Commerce Lab 2</span></td>
        <td><small class="text-dark">Mrs. Radhika Iyer</small></td>
        <td><small class="text-muted font-mono font-size-12">Accounts, BST, Econ, Maths</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">08:30 AM - 01:30 PM</span></td>
        <td><small class="text-muted">31 of 34 Booked</small></td>
        <td><span class="badge-status badge-active">Slots Open (3)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'PTM Scheduling')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SCH-08A</td>
        <td>
          <div class="fw-semibold text-dark">Class 8 - Section A</div>
          <small class="text-muted font-size-11">35 Enrolled Students</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Room 105 (Middle Wing)</span></td>
        <td><small class="text-dark">Mr. Deepak Rawat</small></td>
        <td><small class="text-muted font-mono font-size-12">English, Science, Maths, French</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">08:30 AM - 01:30 PM</span></td>
        <td><small class="text-muted">34 of 35 Booked</small></td>
        <td><span class="badge-status badge-active">Slots Open (1)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'PTM Scheduling')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SCH-05A</td>
        <td>
          <div class="fw-semibold text-dark">Class 5 - Section A</div>
          <small class="text-muted font-size-11">32 Enrolled Students</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Room 12 (Primary Wing)</span></td>
        <td><small class="text-dark">Mrs. Pooja Sharma</small></td>
        <td><small class="text-muted font-mono font-size-12">EVS, Maths, English, Hindi</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">08:30 AM - 01:30 PM</span></td>
        <td><small class="text-muted">32 of 32 Booked</small></td>
        <td><span class="badge-status badge-active">Fully Booked</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'PTM Scheduling')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SCH-01A</td>
        <td>
          <div class="fw-semibold text-dark">Class 1 - Section A</div>
          <small class="text-muted font-size-11">30 Enrolled Students</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Room 04 (Ground Floor)</span></td>
        <td><small class="text-dark">Mrs. Shalini Verma</small></td>
        <td><small class="text-muted font-mono font-size-12">Class Teacher & Activity</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">08:30 AM - 01:30 PM</span></td>
        <td><small class="text-muted">30 of 30 Booked</small></td>
        <td><span class="badge-status badge-active">Fully Booked</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'PTM Scheduling')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SCH-NUR</td>
        <td>
          <div class="fw-semibold text-dark">Nursery - Daisy Section</div>
          <small class="text-muted font-size-11">25 Enrolled Children</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Kindergarten Activity Hall</span></td>
        <td><small class="text-dark">Mrs. Meena Sen</small></td>
        <td><small class="text-muted font-mono font-size-12">Early Years Panel</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">08:30 AM - 12:30 PM</span></td>
        <td><small class="text-muted">25 of 25 Booked</small></td>
        <td><span class="badge-status badge-active">Fully Booked</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'PTM Scheduling')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
