<?php
/**
 * EDUSYS PRO - ACTIVITY LOGS
 * Dedicated operational interface & records management for Activity Logs
 */
$page_title = "Activity Logs";
$page_desc = "Real-time user session auditing, authentication events, IP addresses, browser agents, and operational access logs";
$active_module = "administration";
$active_submodule = "activity-logs.php";
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
    <h1><i class="bi bi-clock-history text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Events Today</h6>
        <div class="kpi-value">1,842 Logged</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Real-Time Telemetry</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-activity"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Active Sessions</h6>
        <div class="kpi-value">48 Users</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Currently Authenticated</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-badge"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Blocked Logins</h6>
        <div class="kpi-value">2 Attempts</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Brute Force Protection</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-slash-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Average Session</h6>
        <div class="kpi-value">42 Mins</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> High Teacher Productivity</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-stopwatch-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search user, action endpoint, IP address...">
    </div>
    <select class="form-select" style="max-width: 240px;">
      <option selected>All Event Types</option>
      <option >User Login / Logout</option>
      <option >Record Creation (POST)</option>
      <option >Record Modification (PUT)</option>
      <option >Report Export (CSV/PDF)</option>
      <option >Failed Authentication</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Success (200 OK)</option>
      <option >Created (201)</option>
      <option >Unauthorized (401)</option>
      <option >Forbidden (403)</option>
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
        <th>Log ID #</th>
        <th>Staff User & Role</th>
        <th>Action Taken / Endpoint</th>
        <th>Target Record</th>
        <th>Client IP Address</th>
        <th>Browser / OS</th>
        <th>Timestamp</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LOG-94812</td>
        <td>
          <div class="fw-semibold text-dark">Dr. Ananya Roy</div>
          <small class="text-muted font-size-11">Role: Principal</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Approved Sanction Order #184</span></td>
        <td><small class="text-dark">Candidate: Advik Agarwal</small></td>
        <td><small class="text-muted font-mono font-size-12">192.168.1.10 (Admin LAN)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Chrome 128 / Windows 11</span></td>
        <td><small class="text-muted">Today (08:42:15 AM)</small></td>
        <td><span class="badge-status badge-active">Success</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LOG-94811</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Sunita Kaul</div>
          <small class="text-muted font-size-11">Role: Teaching Faculty</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Entered Marks: Class 10-A Maths PT-1</span></td>
        <td><small class="text-dark">38 Student Records</small></td>
        <td><small class="text-muted font-mono font-size-12">192.168.1.45 (Staff Room)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Firefox 130 / macOS</span></td>
        <td><small class="text-muted">Today (08:35:10 AM)</small></td>
        <td><span class="badge-status badge-active">Success</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LOG-94810</td>
        <td>
          <div class="fw-semibold text-dark">Suresh Chawla</div>
          <small class="text-muted font-size-11">Role: Accountant</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Generated Fee Receipt #INV-ADM-0184</span></td>
        <td><small class="text-dark">Amount: ₹24,500 (Razorpay)</small></td>
        <td><small class="text-muted font-mono font-size-12">192.168.1.20 (Accounts)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Edge 128 / Windows 11</span></td>
        <td><small class="text-muted">Today (08:28:44 AM)</small></td>
        <td><span class="badge-status badge-active">Success</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LOG-94809</td>
        <td>
          <div class="fw-semibold text-dark">Vikram Malhotra</div>
          <small class="text-muted font-size-11">Role: Super Administrator</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Initiated Daily MySQL Database Snapshot</span></td>
        <td><small class="text-dark">db_edusys_backup.sql.gz</small></td>
        <td><small class="text-muted font-mono font-size-12">192.168.1.02 (IT Office)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Chrome 128 / Windows 11</span></td>
        <td><small class="text-muted">Today (07:45:00 AM)</small></td>
        <td><span class="badge-status badge-active">Success</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LOG-94808</td>
        <td>
          <div class="fw-semibold text-dark">Harish Chander</div>
          <small class="text-muted font-size-11">Role: Transport Officer</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Logged Fuel Refill: Bus #01 (55 Litres)</span></td>
        <td><small class="text-dark">Vehicle: DL-1V-8491</small></td>
        <td><small class="text-muted font-mono font-size-12">192.168.1.80 (Garage)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Safari / iOS Mobile</span></td>
        <td><small class="text-muted">Today (07:18:22 AM)</small></td>
        <td><span class="badge-status badge-active">Success</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LOG-94807</td>
        <td>
          <div class="fw-semibold text-dark">Unknown IP</div>
          <small class="text-muted font-size-11">Role: Anonymous Guest</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Failed Password for 'admin_backup'</span></td>
        <td><small class="text-dark">Invalid Credentials</small></td>
        <td><small class="text-muted font-mono font-size-12">203.0.113.42 (External)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Python Requests / Linux</span></td>
        <td><small class="text-muted">Today (06:12:05 AM)</small></td>
        <td><span class="badge-status badge-inactive">Blocked (401)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LOG-94806</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Radhika Iyer</div>
          <small class="text-muted font-size-11">Role: Teaching Faculty</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Updated PTM Schedule Slots: Class 12-C</span></td>
        <td><small class="text-dark">PTM Slot Roster</small></td>
        <td><small class="text-muted font-mono font-size-12">192.168.1.52 (Staff Room)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Chrome 128 / Windows 11</span></td>
        <td><small class="text-muted">Yesterday (04:15:30 PM)</small></td>
        <td><span class="badge-status badge-active">Success</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LOG-94805</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Meenakshi Soni</div>
          <small class="text-muted font-size-11">Role: Librarian</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Checked-in 14 Overdue Library Books</span></td>
        <td><small class="text-dark">Accession #8410-8424</small></td>
        <td><small class="text-muted font-mono font-size-12">192.168.1.60 (Library)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Chrome 128 / Windows 11</span></td>
        <td><small class="text-muted">Yesterday (03:45:12 PM)</small></td>
        <td><span class="badge-status badge-active">Success</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
