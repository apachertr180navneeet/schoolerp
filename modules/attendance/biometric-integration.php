<?php
/**
 * EDUSYS PRO - BIOMETRIC DEVICE INTEGRATION
 * Dedicated operational interface & records management for Biometric Device Integration
 */
$page_title = "Biometric Device Integration";
$page_desc = "Hardware device management: ZKTeco and Matrix fingerprint & facial recognition terminals and real-time sync";
$active_module = "attendance";
$active_submodule = "biometric-integration.php";
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
    <h1><i class="bi bi-fingerprint text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'biometric-integration_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-hdd-network-fill me-1"></i> Register Terminal
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Terminals Online</h6>
        <div class="kpi-value">12 of 12 Devices</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Hardware Connected</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-hdd-network-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Punches Today</h6>
        <div class="kpi-value">3,142 Punches</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Face & Fingerprint Verified</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-fingerprint"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Sync Latency</h6>
        <div class="kpi-value">0.4 Seconds</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Real-time Push SDK Active</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-lightning-charge-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Terminal Health</h6>
        <div class="kpi-value">100% Operational</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Zero Offline Alerts</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search terminal ID, device model, location, IP...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Gate Locations</option>
      <option >Main Gate 1 & 2 Terminals</option>
      <option >Administrative Staff Block</option>
      <option >Faculty Staff Rooms</option>
      <option >Science Laboratories Hub</option>
      <option >Transport Garage Terminal</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Online & Synchronized</option>
      <option >Standby Mode</option>
      <option >Network Offline</option>
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
        <th>Device ID</th>
        <th>Device Model & Brand</th>
        <th>Installation Location</th>
        <th>IP Address & Port</th>
        <th>Last Heartbeat Sync</th>
        <th>Punches Synced Today</th>
        <th>Device Health</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BIO-TERM-01</td>
        <td>
          <div class="fw-semibold text-dark">ZKTeco ProFace X (Face + Finger)</div>
          <small class="text-muted font-size-11">Facial Recognition AI</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Main Gate 1 (Staff Entrance)</span></td>
        <td><small class="text-dark">192.168.1.101 : 4370</small></td>
        <td><small class="text-muted font-mono font-size-12">10 Secs Ago (Live)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">412 Staff Punches</span></td>
        <td><small class="text-muted">Healthy (CPU 12%)</small></td>
        <td><span class="badge-status badge-active">Online</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Biometric Device Integration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BIO-TERM-02</td>
        <td>
          <div class="fw-semibold text-dark">ZKTeco ProFace X (Face + Finger)</div>
          <small class="text-muted font-size-11">Facial Recognition AI</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Main Gate 2 (Student Entrance)</span></td>
        <td><small class="text-dark">192.168.1.102 : 4370</small></td>
        <td><small class="text-muted font-mono font-size-12">8 Secs Ago (Live)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">1,248 Student Punches</span></td>
        <td><small class="text-muted">Healthy (CPU 18%)</small></td>
        <td><span class="badge-status badge-active">Online</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Biometric Device Integration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BIO-TERM-03</td>
        <td>
          <div class="fw-semibold text-dark">ZKTeco ProFace X (Face + Finger)</div>
          <small class="text-muted font-size-11">Facial Recognition AI</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Bus Bay Gate 3 (Bus Dispersal)</span></td>
        <td><small class="text-dark">192.168.1.103 : 4370</small></td>
        <td><small class="text-muted font-mono font-size-12">12 Secs Ago (Live)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">840 Student Punches</span></td>
        <td><small class="text-muted">Healthy (CPU 14%)</small></td>
        <td><span class="badge-status badge-active">Online</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Biometric Device Integration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BIO-TERM-04</td>
        <td>
          <div class="fw-semibold text-dark">Matrix COSEC Vega (Fingerprint)</div>
          <small class="text-muted font-size-11">High-Speed Optical Sensor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Staff Room (Block A)</span></td>
        <td><small class="text-dark">192.168.1.104 : 8000</small></td>
        <td><small class="text-muted font-mono font-size-12">15 Secs Ago (Live)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">108 Faculty Punches</span></td>
        <td><small class="text-muted">Healthy (CPU 8%)</small></td>
        <td><span class="badge-status badge-active">Online</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Biometric Device Integration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BIO-TERM-05</td>
        <td>
          <div class="fw-semibold text-dark">Matrix COSEC Vega (Fingerprint)</div>
          <small class="text-muted font-size-11">High-Speed Optical Sensor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Middle Staff Room (Block C)</span></td>
        <td><small class="text-dark">192.168.1.105 : 8000</small></td>
        <td><small class="text-muted font-mono font-size-12">20 Secs Ago (Live)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">84 Faculty Punches</span></td>
        <td><small class="text-muted">Healthy (CPU 6%)</small></td>
        <td><span class="badge-status badge-active">Online</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Biometric Device Integration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BIO-TERM-06</td>
        <td>
          <div class="fw-semibold text-dark">ZKTeco SilkBio-101TC</div>
          <small class="text-muted font-size-11">Hybrid Facial + Finger</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Administrative Office Desk</span></td>
        <td><small class="text-dark">192.168.1.106 : 4370</small></td>
        <td><small class="text-muted font-mono font-size-12">5 Secs Ago (Live)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">142 Admin Punches</span></td>
        <td><small class="text-muted">Healthy (CPU 10%)</small></td>
        <td><span class="badge-status badge-active">Online</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Biometric Device Integration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BIO-TERM-07</td>
        <td>
          <div class="fw-semibold text-dark">eSSL Biomax N-BM60</div>
          <small class="text-muted font-size-11">Rugged Garage Model</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Transport Workshop Garage</span></td>
        <td><small class="text-dark">192.168.1.107 : 5005</small></td>
        <td><small class="text-muted font-mono font-size-12">18 Secs Ago (Live)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">36 Drivers / Staff</span></td>
        <td><small class="text-muted">Healthy (CPU 5%)</small></td>
        <td><span class="badge-status badge-active">Online</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Biometric Device Integration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BIO-TERM-08</td>
        <td>
          <div class="fw-semibold text-dark">ZKTeco ProFace X (Face + Finger)</div>
          <small class="text-muted font-size-11">Facial Recognition AI</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Sports Complex Gate</span></td>
        <td><small class="text-dark">192.168.1.108 : 4370</small></td>
        <td><small class="text-muted font-mono font-size-12">14 Secs Ago (Live)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">172 Coaches / Athletes</span></td>
        <td><small class="text-muted">Healthy (CPU 9%)</small></td>
        <td><span class="badge-status badge-active">Online</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Biometric Device Integration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
