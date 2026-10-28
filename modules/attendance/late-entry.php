<?php
/**
 * EDUSYS PRO - LATE ENTRY REGISTER
 * Dedicated operational interface & records management for Late Entry Register
 */
$page_title = "Late Entry Register";
$page_desc = "Gate security timestamps for arrivals past 07:45 AM, transport delay logs, and parent intimations";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/attendance/dashboard.php'); ?>">Attendance Management</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-stopwatch-fill text-primary"></i> <?php echo $page_title; ?></h1>
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
      <i class="bi bi-stopwatch me-1"></i> Log Late Arrival
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Late Arrivals Today</h6>
        <div class="kpi-value">24 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 0.84% of Total Enrollment</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-stopwatch"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Bus Delay Verified</h6>
        <div class="kpi-value">18 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Route #12 Traffic Congestion</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-bus-front"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Private Transport</h6>
        <div class="kpi-value">6 Students</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Late Slip Issued at Gate</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-exclamation"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Parent SMS Sent</h6>
        <div class="kpi-value">100% Intimated</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Delivered Within 5 Mins</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-bell-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search late slip #, student name, class, gate officer...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Gate Locations</option>
      <option >Main Gate 1 (Pedestrian)</option>
      <option >Main Gate 2 (Bus Bay)</option>
      <option >Sports Complex Gate</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Excused (School Bus Delay)</option>
      <option >Unexcused (Parent Commute)</option>
      <option >Warning Slip Issued</option>
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
        <th>Gate Pass #</th>
        <th>Student / Staff Name</th>
        <th>Class / Department</th>
        <th>Arrival Time (Gate Tap)</th>
        <th>Grace Period Exceeded</th>
        <th>Reason for Delay</th>
        <th>Gate Security Officer</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LTE-2024-0024</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Adm #006</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCB)</span></td>
        <td><small class="text-dark">07:52 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">7 Mins Late</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dwarka Underpass Traffic Jam</span></td>
        <td><small class="text-muted">Officer Subhash Yadav</small></td>
        <td><span class="badge-status badge-pending">Unexcused</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Late Entry Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LTE-2024-0023</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Adm #005</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-dark">07:48 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">3 Mins Late</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Private Car Commute Delay</span></td>
        <td><small class="text-muted">Officer Subhash Yadav</small></td>
        <td><span class="badge-status badge-pending">Unexcused</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Late Entry Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LTE-2024-0022</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Singhania</div>
          <small class="text-muted font-size-11">Adm #1048</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 1 - Nursery</span></td>
        <td><small class="text-dark">07:55 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">10 Mins Late</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">School Bus #12 Route Delay</span></td>
        <td><small class="text-muted">Officer Harish Chander</small></td>
        <td><span class="badge-status badge-active">Excused (Bus)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Late Entry Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LTE-2024-0021</td>
        <td>
          <div class="fw-semibold text-dark">Devansh Bhardwaj</div>
          <small class="text-muted font-size-11">Adm #1046</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - PCM</span></td>
        <td><small class="text-dark">07:55 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">10 Mins Late</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">School Bus #12 Route Delay</span></td>
        <td><small class="text-muted">Officer Harish Chander</small></td>
        <td><span class="badge-status badge-active">Excused (Bus)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Late Entry Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LTE-2024-0020</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Deshpande</div>
          <small class="text-muted font-size-11">Adm #1045</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Section B</span></td>
        <td><small class="text-dark">07:55 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">10 Mins Late</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">School Bus #12 Route Delay</span></td>
        <td><small class="text-muted">Officer Harish Chander</small></td>
        <td><span class="badge-status badge-active">Excused (Bus)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Late Entry Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LTE-2024-0019</td>
        <td>
          <div class="fw-semibold text-dark">Tanvi Choudhary</div>
          <small class="text-muted font-size-11">Adm #1044</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Commerce</span></td>
        <td><small class="text-dark">07:50 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">5 Mins Late</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Metro Signal Delay (Palam)</span></td>
        <td><small class="text-muted">Officer Subhash Yadav</small></td>
        <td><span class="badge-status badge-pending">Unexcused</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Late Entry Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LTE-2024-0018</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Mukherjee</div>
          <small class="text-muted font-size-11">Adm #1043</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 4 - Primary</span></td>
        <td><small class="text-dark">07:55 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">10 Mins Late</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">School Bus #12 Route Delay</span></td>
        <td><small class="text-muted">Officer Harish Chander</small></td>
        <td><span class="badge-status badge-active">Excused (Bus)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Late Entry Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LTE-2024-0017</td>
        <td>
          <div class="fw-semibold text-dark">Riyaan Kapoor</div>
          <small class="text-muted font-size-11">Adm #1042</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 1 - Prep</span></td>
        <td><small class="text-dark">07:55 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">10 Mins Late</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">School Bus #12 Route Delay</span></td>
        <td><small class="text-muted">Officer Harish Chander</small></td>
        <td><span class="badge-status badge-active">Excused (Bus)</span></td>
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

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
