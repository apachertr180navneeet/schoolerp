<?php
/**
 * EDUSYS PRO - QR CODE ATTENDANCE
 * Dedicated operational interface & records management for QR Code Attendance
 */
$page_title = "QR Code Attendance";
$page_desc = "Dynamic rotating QR code attendance: Mobile scanning for seminars, co-curricular events, and visitor verification";
$active_module = "attendance";
$active_submodule = "qr-attendance.php";
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
    <h1><i class="bi bi-qr-code-scan text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'qr-attendance_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-qr-code me-1"></i> Generate QR Token
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>QR Sessions Today</h6>
        <div class="kpi-value">8 Active Sessions</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Assemblies & Co-Curricular</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-qr-code"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Mobile Scans</h6>
        <div class="kpi-value">1,240 Verified Scans</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Real-time Mobile App</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-phone-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Dynamic Token TTL</h6>
        <div class="kpi-value">30 Seconds</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Anti-Proxy Screenshot Safe</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Location Geofence</h6>
        <div class="kpi-value">50m Campus Radius</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> GPS Enforced Validation</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-geo-alt-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search QR session, event, location, cohort...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All QR Events</option>
      <option >Morning Assembly Attendance</option>
      <option >Auditorium Seminar Check-In</option>
      <option >Inter-House Competition</option>
      <option >Faculty Professional Training</option>
      <option >PTM Parent Registration</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active Scanning (Live)</option>
      <option >Session Expired</option>
      <option >Scheduled</option>
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
        <th>QR Session Token</th>
        <th>Target Location / Event</th>
        <th>Grade / Faculty Cohort</th>
        <th>Valid From</th>
        <th>Valid To</th>
        <th>Total Scans Recorded</th>
        <th>Fraud Prevention</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">QR-SESS-9481</td>
        <td>
          <div class="fw-semibold text-dark">Morning Value Assembly Check-In</div>
          <small class="text-muted font-size-11">Central Amphitheater</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Secondary Wing (Classes 9-10)</span></td>
        <td><small class="text-dark">07:30 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">07:45 AM</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">560 Scans Verified</span></td>
        <td><small class="text-muted">Dynamic Geofence Verified</small></td>
        <td><span class="badge-status badge-active">Session Complete</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'QR Code Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">QR-SESS-9482</td>
        <td>
          <div class="fw-semibold text-dark">Atal Tinkering Workshop Seminar</div>
          <small class="text-muted font-size-11">Auditorium Hall B</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 11 & 12 (Science)</span></td>
        <td><small class="text-dark">10:15 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">11:00 AM</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">140 Scans Verified</span></td>
        <td><small class="text-muted">Dynamic Geofence Verified</small></td>
        <td><span class="badge-status badge-active">Live Scanning</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'QR Code Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">QR-SESS-9483</td>
        <td>
          <div class="fw-semibold text-dark">Inter-House Debate Championship</div>
          <small class="text-muted font-size-11">Room 304 Multi-Media</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Agni, Prithvi, Vayu, Akash Teams</span></td>
        <td><small class="text-dark">11:35 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">01:30 PM</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">48 Scans Recorded</span></td>
        <td><small class="text-muted">Dynamic Geofence Verified</small></td>
        <td><span class="badge-status badge-active">Live Scanning</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'QR Code Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">QR-SESS-9484</td>
        <td>
          <div class="fw-semibold text-dark">Faculty Training: NEP Pedagogy</div>
          <small class="text-muted font-size-11">Conference Hall 1</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">All PGT & TGT Teachers</span></td>
        <td><small class="text-dark">02:30 PM</small></td>
        <td><small class="text-muted font-mono font-size-12">04:00 PM</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Scheduled for Afternoon</span></td>
        <td><small class="text-muted">Token Rotates every 30s</small></td>
        <td><span class="badge-status badge-pending">Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'QR Code Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">QR-SESS-9485</td>
        <td>
          <div class="fw-semibold text-dark">Parent-Teacher Meeting Check-In</div>
          <small class="text-muted font-size-11">Campus Registration Desk</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Visiting Parents & Guardians</span></td>
        <td><small class="text-dark">08:00 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">01:00 PM</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Scheduled for Saturday</span></td>
        <td><small class="text-muted">Token Rotates every 30s</small></td>
        <td><span class="badge-status badge-pending">Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'QR Code Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">QR-SESS-9486</td>
        <td>
          <div class="fw-semibold text-dark">Olympiad Trial Entrance Test</div>
          <small class="text-muted font-size-11">Science Lab Block</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Selected 184 Candidates</span></td>
        <td><small class="text-dark">08:00 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">09:30 AM</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">184 Scans Verified</span></td>
        <td><small class="text-muted">Dynamic Geofence Verified</small></td>
        <td><span class="badge-status badge-active">Session Complete</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'QR Code Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">QR-SESS-9487</td>
        <td>
          <div class="fw-semibold text-dark">Sports Coaching Morning Roll</div>
          <small class="text-muted font-size-11">Olympic Swimming Pool</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">School Swim Team</span></td>
        <td><small class="text-dark">06:15 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">07:15 AM</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">32 Scans Verified</span></td>
        <td><small class="text-muted">Dynamic Geofence Verified</small></td>
        <td><span class="badge-status badge-active">Session Complete</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'QR Code Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">QR-SESS-9488</td>
        <td>
          <div class="fw-semibold text-dark">Library Book Reading Club</div>
          <small class="text-muted font-size-11">Central Library Audio Hall</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Middle Wing Literary Society</span></td>
        <td><small class="text-dark">12:55 PM</small></td>
        <td><small class="text-muted font-mono font-size-12">01:35 PM</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Scheduled (Period 7)</span></td>
        <td><small class="text-muted">Token Rotates every 30s</small></td>
        <td><span class="badge-status badge-pending">Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'QR Code Attendance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
