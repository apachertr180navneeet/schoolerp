<?php
/**
 * EDUSYS PRO - STAFF ATTENDANCE
 * Dedicated operational interface & records management for Staff Attendance
 */
$page_title = "Staff Attendance";
$page_desc = "Administrative, transport, security, lab assistants, and facilities staff biometric punch tracking";
$active_module = "attendance";
$active_submodule = "staff-attendance.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/attendance/dashboard.php'); ?>">Attendance Management</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-people-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'staff-attendance_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-fingerprint me-1"></i> Log Staff Punch
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Staff Present</h6>
        <div class="kpi-value">34 of 34 Staff</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Present Today</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Security Shifts</h6>
        <div class="kpi-value">12 Guards</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Day & Night Rota Active</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Bus Drivers / Attendants</h6>
        <div class="kpi-value">18 Drivers</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> 06:15 AM Shift Cleared</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-bus-front-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Overtime Logged</h6>
        <div class="kpi-value">6 Hours</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Campus Maintenance Desk</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-clock-history"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search staff name, ID, role, department, status...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Departments</option>
      <option >Administration & Accounts</option>
      <option >Transport (Drivers & Conductors)</option>
      <option >Security & Wardens</option>
      <option >Lab Assistants & Attendants</option>
      <option >Facilities & Housekeeping</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >On Shift (Biometric)</option>
      <option >Off Duty</option>
      <option >Approved Leave</option>
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
        <th>Staff ID</th>
        <th>Staff Full Name</th>
        <th>Role / Department</th>
        <th>Shift Timings</th>
        <th>Biometric Punch In</th>
        <th>Punch Out</th>
        <th>Overtime Hours</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-STF-001</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Vashisht</div>
          <small class="text-muted font-size-11">Admin Dept</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Head Registrar</span></td>
        <td><small class="text-dark">07:15 AM - 03:45 PM</small></td>
        <td><small class="text-muted font-mono font-size-12">07:08 AM (Admin Desk)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Exit</span></td>
        <td><small class="text-muted">0.0 Hours</small></td>
        <td><span class="badge-status badge-active">On Duty</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Staff Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-STF-002</td>
        <td>
          <div class="fw-semibold text-dark">Suresh Chawla</div>
          <small class="text-muted font-size-11">Accounts Dept</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Chief Cashier</span></td>
        <td><small class="text-dark">07:30 AM - 04:00 PM</small></td>
        <td><small class="text-muted font-mono font-size-12">07:22 AM (Accounts Bio)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Exit</span></td>
        <td><small class="text-muted">0.0 Hours</small></td>
        <td><span class="badge-status badge-active">On Duty</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Staff Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-STF-003</td>
        <td>
          <div class="fw-semibold text-dark">Harish Chander</div>
          <small class="text-muted font-size-11">Transport Desk</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Transport Supervisor</span></td>
        <td><small class="text-dark">06:00 AM - 02:30 PM</small></td>
        <td><small class="text-muted font-mono font-size-12">05:50 AM (Garage Terminal)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Exit</span></td>
        <td><small class="text-muted">1.0 Hour (Early)</small></td>
        <td><span class="badge-status badge-active">On Duty</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Staff Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-STF-004</td>
        <td>
          <div class="fw-semibold text-dark">Balwinder Singh</div>
          <small class="text-muted font-size-11">Transport Desk</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Bus Driver #01</span></td>
        <td><small class="text-dark">06:15 AM - 02:45 PM</small></td>
        <td><small class="text-muted font-mono font-size-12">06:05 AM (Garage Terminal)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Exit</span></td>
        <td><small class="text-muted">0.5 Hours</small></td>
        <td><span class="badge-status badge-active">On Duty</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Staff Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-STF-005</td>
        <td>
          <div class="fw-semibold text-dark">Ram Prasad Verma</div>
          <small class="text-muted font-size-11">Science Labs</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Lab Technician</span></td>
        <td><small class="text-dark">07:15 AM - 03:45 PM</small></td>
        <td><small class="text-muted font-mono font-size-12">07:10 AM (Lab Terminal)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Exit</span></td>
        <td><small class="text-muted">0.0 Hours</small></td>
        <td><span class="badge-status badge-active">On Duty</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Staff Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-STF-006</td>
        <td>
          <div class="fw-semibold text-dark">Subhash Yadav</div>
          <small class="text-muted font-size-11">Security Dept</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Chief Security Officer</span></td>
        <td><small class="text-dark">06:00 AM - 06:00 PM</small></td>
        <td><small class="text-muted font-mono font-size-12">05:55 AM (Main Gate Bio)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Exit</span></td>
        <td><small class="text-muted">12h Shift Active</small></td>
        <td><span class="badge-status badge-active">On Duty</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Staff Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-STF-007</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Kavita Joshi</div>
          <small class="text-muted font-size-11">Front Office</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Front Desk Receptionist</span></td>
        <td><small class="text-dark">07:15 AM - 03:45 PM</small></td>
        <td><small class="text-muted font-mono font-size-12">07:12 AM (Reception Bio)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Exit</span></td>
        <td><small class="text-muted">0.0 Hours</small></td>
        <td><span class="badge-status badge-active">On Duty</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Staff Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-STF-008</td>
        <td>
          <div class="fw-semibold text-dark">Anil Kumar</div>
          <small class="text-muted font-size-11">Housekeeping</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Facilities Supervisor</span></td>
        <td><small class="text-dark">06:30 AM - 03:00 PM</small></td>
        <td><small class="text-muted font-mono font-size-12">06:25 AM (Service Bio)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Exit</span></td>
        <td><small class="text-muted">0.0 Hours</small></td>
        <td><span class="badge-status badge-active">On Duty</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Staff Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
