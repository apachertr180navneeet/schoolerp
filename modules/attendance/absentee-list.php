<?php
/**
 * EDUSYS PRO - ABSENTEE LIST & SMS ALERT
 * Dedicated operational interface & records management for Absentee List & SMS Alert
 */
$page_title = "Absentee List & SMS Alert";
$page_desc = "Unexcused absentee detection, automated parent SMS delivery gateways, and counselor follow-up calls";
$active_module = "attendance";
$active_submodule = "absentee-list.php";
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
    <h1><i class="bi bi-bell-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'absentee-list_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-chat-dots-fill me-1"></i> Send Bulk Absentee SMS
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Absentees Today</h6>
        <div class="kpi-value">108 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 3.8% Overall Absences</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-x-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Parent SMS Sent</h6>
        <div class="kpi-value">100% Delivered</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Via DLT Approved Gateway</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-phone-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Parent Replies Received</h6>
        <div class="kpi-value">74 Responses</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Sick / Out of Station Logged</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-reply-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Consecutive 3+ Days</h6>
        <div class="kpi-value">8 Scholars</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Counselor Home Calls Scheduled</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-telephone-outbound-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search absentee, student name, class, mobile...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Absentee Classes</option>
      <option >Class 10 - Secondary</option>
      <option >Class 12 - Senior Secondary</option>
      <option >Class 9 - Secondary</option>
      <option >Middle Wing (Classes 6-8)</option>
      <option >Primary Wing (Classes 1-5)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >SMS Delivered (Unread)</option>
      <option >Parent Replied with Reason</option>
      <option >Counselor Call Due</option>
      <option >Consecutive Absentee</option>
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
        <th>Alert ID</th>
        <th>Student Full Name</th>
        <th>Grade & Section</th>
        <th>Parent Contact Mobile</th>
        <th>Absent Since</th>
        <th>SMS Delivery Status</th>
        <th>Parent Response</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ABS-2024-0108</td>
        <td>
          <div class="fw-semibold text-dark">Karan Saxena</div>
          <small class="text-muted font-size-11">Adm #2491</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Section C</span></td>
        <td><small class="text-dark">+91 98112 44556</small></td>
        <td><small class="text-muted font-mono font-size-12">3 Days (Consecutive)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Delivered (08:05 AM)</span></td>
        <td><small class="text-muted">Parent Replied: Viral Infection</small></td>
        <td><span class="badge-status badge-active">Reason Logged</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Absentee List & SMS Alert')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ABS-2024-0107</td>
        <td>
          <div class="fw-semibold text-dark">Siddharth Rawat</div>
          <small class="text-muted font-size-11">Adm #9481</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Commerce</span></td>
        <td><small class="text-dark">+91 98223 55667</small></td>
        <td><small class="text-muted font-mono font-size-12">1 Day (Today)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Delivered (08:05 AM)</span></td>
        <td><small class="text-muted">Parent Replied: Family Wedding</small></td>
        <td><span class="badge-status badge-active">Reason Logged</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Absentee List & SMS Alert')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ABS-2024-0106</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Saxena</div>
          <small class="text-muted font-size-11">Adm #4921</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 7 - Middle</span></td>
        <td><small class="text-dark">+91 98334 66778</small></td>
        <td><small class="text-muted font-mono font-size-12">1 Day (Today)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Delivered (08:05 AM)</span></td>
        <td><small class="text-muted">Awaiting Response</small></td>
        <td><span class="badge-status badge-pending">Awaiting Reply</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Absentee List & SMS Alert')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ABS-2024-0105</td>
        <td>
          <div class="fw-semibold text-dark">Gauri Shankar</div>
          <small class="text-muted font-size-11">Adm #1980</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 5 - Primary</span></td>
        <td><small class="text-dark">+91 98445 77889</small></td>
        <td><small class="text-muted font-mono font-size-12">2 Days</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Delivered (08:05 AM)</span></td>
        <td><small class="text-muted">Parent Replied: Stomach Ache</small></td>
        <td><span class="badge-status badge-active">Reason Logged</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Absentee List & SMS Alert')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ABS-2024-0104</td>
        <td>
          <div class="fw-semibold text-dark">Aditya Roy Kapur</div>
          <small class="text-muted font-size-11">Adm #9482</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Secondary</span></td>
        <td><small class="text-dark">+91 98556 88990</small></td>
        <td><small class="text-muted font-mono font-size-12">1 Day (Today)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Delivered (08:05 AM)</span></td>
        <td><small class="text-muted">Parent Replied: Pilgrimage</small></td>
        <td><span class="badge-status badge-active">Reason Logged</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Absentee List & SMS Alert')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ABS-2024-0103</td>
        <td>
          <div class="fw-semibold text-dark">Kriti Sanon</div>
          <small class="text-muted font-size-11">Adm #1049</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Science</span></td>
        <td><small class="text-dark">+91 98667 99001</small></td>
        <td><small class="text-muted font-mono font-size-12">1 Day (Today)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Delivered (08:05 AM)</span></td>
        <td><small class="text-muted">Parent Replied: Migraine Rest</small></td>
        <td><span class="badge-status badge-active">Reason Logged</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Absentee List & SMS Alert')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ABS-2024-0102</td>
        <td>
          <div class="fw-semibold text-dark">Aakash Verma</div>
          <small class="text-muted font-size-11">Adm #1920</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 8 - Section B</span></td>
        <td><small class="text-dark">+91 98778 11223</small></td>
        <td><small class="text-muted font-mono font-size-12">3 Days (Consecutive)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Delivered (08:05 AM)</span></td>
        <td><small class="text-muted">No Response (Call Needed)</small></td>
        <td><span class="badge-status badge-inactive">Call Counselor</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Absentee List & SMS Alert')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ABS-2024-0101</td>
        <td>
          <div class="fw-semibold text-dark">Rohit Bansal</div>
          <small class="text-muted font-size-11">Adm #1842</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">+91 98889 22334</small></td>
        <td><small class="text-muted font-mono font-size-12">1 Day (Today)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Delivered (08:05 AM)</span></td>
        <td><small class="text-muted">Awaiting Response</small></td>
        <td><span class="badge-status badge-pending">Awaiting Reply</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Absentee List & SMS Alert')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
