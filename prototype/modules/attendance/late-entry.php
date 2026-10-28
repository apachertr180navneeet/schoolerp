<?php
/**
 * EDUSYS PRO - Late Entry Register
 */
$page_title = "Late Entry Register";
$page_desc = "Dedicated operational interface & records management for Late Entry Register";
$active_module = "attendance";
$active_submodule = "late-entry.php";
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
      <li class="breadcrumb-item"><?php echo htmlspecialchars($active_module); ?></li>
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
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'late-entry_export.csv')" title="Export Table as CSV">
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
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Today's Attendance</h6>
        <div class="kpi-value">95.8%</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 2,721 Present Today</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Absenteeism</h6>
        <div class="kpi-value">119 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> SMS Sent to Parents</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-x-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Staff Attendance</h6>
        <div class="kpi-value">186 / 190</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> 97.9% On Duty</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-badge-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>RFID Sync Health</h6>
        <div class="kpi-value">100% Online</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> 16 Gate Turnstiles Live</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-wifi"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search attendance by roll, student name, class...">
    </div>
    <select class="form-select" style="max-width: 200px;">
      <option selected>All Status</option>
      <option >Present (RFID In)</option>
      <option >Absent / Unexcused</option>
      <option >Leave with Approval</option>
      <option >Late Arrival</option>
      <option >Half Day Dispatched</option>
    </select>
    <select class="form-select" style="max-width: 150px;">
      <option selected>All Status</option>
      <option>Active / Verified</option>
      <option>In Review</option>
      <option>Approved</option>
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
        <th>Punch / Ref #</th>
        <th>Student / Staff Name</th>
        <th>Class & Section</th>
        <th>In-Time (Turnstile)</th>
        <th>Out-Time</th>
        <th>Logging Mode</th>
        <th>SMS Notification</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ATT-1028-091</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Roll: 14</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">07:38 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">--</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">RFID Smart Card</span></td>
        <td><small class="text-muted">Parent Alert Delivered</small></td>
        <td><span class="badge-status badge-active">Present</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Late Entry Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ATT-1028-092</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Roll: 02</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">07:41 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">--</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">RFID Smart Card</span></td>
        <td><small class="text-muted">Parent Alert Delivered</small></td>
        <td><span class="badge-status badge-active">Present</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Late Entry Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ATT-1028-093</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Roll: 01</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">07:44 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">--</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Facial Recognition</span></td>
        <td><small class="text-muted">Parent Alert Delivered</small></td>
        <td><span class="badge-status badge-active">Present</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Late Entry Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ATT-1028-094</td>
        <td>
          <div class="fw-semibold text-dark">Karan Malhotra</div>
          <small class="text-muted font-size-11">Roll: 19</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">--</small></td>
        <td><small class="text-muted font-mono font-size-12">--</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Absentee Scan</span></td>
        <td><small class="text-muted">Absent SMS Sent @ 08:30</small></td>
        <td><span class="badge-status badge-inactive">Absent</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Late Entry Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ATT-1028-095</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Roll: 14</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science A</span></td>
        <td><small class="text-dark">07:35 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">--</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">RFID Smart Card</span></td>
        <td><small class="text-muted">Parent Alert Delivered</small></td>
        <td><span class="badge-status badge-active">Present</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Late Entry Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ATT-1028-096</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Roll: 08</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science B</span></td>
        <td><small class="text-dark">08:02 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">--</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Gate Guard Manual</span></td>
        <td><small class="text-muted">Late In SMS Sent</small></td>
        <td><span class="badge-status badge-pending">Late Arrival</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Late Entry Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ATT-1028-097</td>
        <td>
          <div class="fw-semibold text-dark">Meera Reddy</div>
          <small class="text-muted font-size-11">Roll: 11</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 8 - Section A</span></td>
        <td><small class="text-dark">07:40 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">--</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">RFID Smart Card</span></td>
        <td><small class="text-muted">Parent Alert Delivered</small></td>
        <td><span class="badge-status badge-active">Present</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Late Entry Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ATT-1028-098</td>
        <td>
          <div class="fw-semibold text-dark">Tanvi Saxena</div>
          <small class="text-muted font-size-11">Roll: 23</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Section A</span></td>
        <td><small class="text-dark">--</small></td>
        <td><small class="text-muted font-mono font-size-12">--</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Medical Leave Portal</span></td>
        <td><small class="text-muted">Approved Medical Leave</small></td>
        <td><span class="badge-status badge-pending">Excused Leave</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Late Entry Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>


<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
