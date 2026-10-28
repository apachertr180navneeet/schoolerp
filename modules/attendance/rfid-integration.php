<?php
/**
 * EDUSYS PRO - RFID SMART CARD INTEGRATION
 * Dedicated operational interface & records management for RFID Smart Card Integration
 */
$page_title = "RFID Smart Card Integration";
$page_desc = "UHF long-range antenna gates, smart identity card tapping protocols, bus boarding sensors, and student safety logs";
$active_module = "attendance";
$active_submodule = "rfid-integration.php";
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
    <h1><i class="bi bi-broadcast-pin text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'rfid-integration_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-broadcast me-1"></i> Configure RFID Gate
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>RFID Antenna Gates</h6>
        <div class="kpi-value">8 Gate Readers</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> High-Speed UHF 865-868 MHz</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-broadcast"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Smart Taps Today</h6>
        <div class="kpi-value">5,680 Taps</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Entry & Dispersal Logs</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-credit-card-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Bus Fleet Readers</h6>
        <div class="kpi-value">18 Buses Integrated</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> GPS + RFID Student Tap</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-bus-front-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Detection Accuracy</h6>
        <div class="kpi-value">99.9% Read Rate</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Zero Card Clash</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-patch-check-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search reader ID, gate, location, bus #...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Gate Readers</option>
      <option >Pedestrian Gate 1 & 2 Antennas</option>
      <option >Bus Bay Long Range Readers</option>
      <option >School Bus Fleet Sensors (1-18)</option>
      <option >Library Circulation RFID Desk</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active & Reading</option>
      <option >Low Signal Warning</option>
      <option >Offline</option>
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
        <th>Gate Reader ID</th>
        <th>Gate Location</th>
        <th>Reader Protocol</th>
        <th>Taps Logged Today</th>
        <th>Average Read Speed</th>
        <th>Bus Fleet Sync</th>
        <th>Antenna Health</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">RFID-GATE-01</td>
        <td>
          <div class="fw-semibold text-dark">Main Gate 1 (Turnstiles)</div>
          <small class="text-muted font-size-11">Pedestrian Flap Barriers</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">UHF Long-Range (Wiegand 34)</span></td>
        <td><small class="text-dark">1,420 Card Taps</small></td>
        <td><small class="text-muted font-mono font-size-12">45 Milliseconds</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Synced to SIS Core</span></td>
        <td><small class="text-muted">Signal RSSI -52dBm (Strong)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'RFID Smart Card Integration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">RFID-GATE-02</td>
        <td>
          <div class="fw-semibold text-dark">Main Gate 2 (Turnstiles)</div>
          <small class="text-muted font-size-11">Pedestrian Flap Barriers</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">UHF Long-Range (Wiegand 34)</span></td>
        <td><small class="text-dark">1,420 Card Taps</small></td>
        <td><small class="text-muted font-mono font-size-12">45 Milliseconds</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Synced to SIS Core</span></td>
        <td><small class="text-muted">Signal RSSI -50dBm (Strong)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'RFID Smart Card Integration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">RFID-BUS-001</td>
        <td>
          <div class="fw-semibold text-dark">School Bus #01 (Dwarka Route)</div>
          <small class="text-muted font-size-11">Vehicle Reader GPS Sync</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mifare 13.56MHz + GPS Tracker</span></td>
        <td><small class="text-dark">42 Boarding Taps</small></td>
        <td><small class="text-muted font-mono font-size-12">30 Milliseconds</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Live 4G Telematics Synced</span></td>
        <td><small class="text-muted">Antenna 100% OK</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'RFID Smart Card Integration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">RFID-BUS-002</td>
        <td>
          <div class="fw-semibold text-dark">School Bus #02 (Janakpuri Route)</div>
          <small class="text-muted font-size-11">Vehicle Reader GPS Sync</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mifare 13.56MHz + GPS Tracker</span></td>
        <td><small class="text-dark">40 Boarding Taps</small></td>
        <td><small class="text-muted font-mono font-size-12">30 Milliseconds</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Live 4G Telematics Synced</span></td>
        <td><small class="text-muted">Antenna 100% OK</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'RFID Smart Card Integration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">RFID-BUS-003</td>
        <td>
          <div class="fw-semibold text-dark">School Bus #03 (Vasant Kunj)</div>
          <small class="text-muted font-size-11">Vehicle Reader GPS Sync</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mifare 13.56MHz + GPS Tracker</span></td>
        <td><small class="text-dark">38 Boarding Taps</small></td>
        <td><small class="text-muted font-mono font-size-12">30 Milliseconds</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Live 4G Telematics Synced</span></td>
        <td><small class="text-muted">Antenna 100% OK</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'RFID Smart Card Integration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">RFID-LIB-01</td>
        <td>
          <div class="fw-semibold text-dark">Central Library Smart Circulation</div>
          <small class="text-muted font-size-11">Book & Student Card Tap</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">ISO 15693 High-Frequency</span></td>
        <td><small class="text-dark">410 Book Issues / Returns</small></td>
        <td><small class="text-muted font-mono font-size-12">25 Milliseconds</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Koha Library Sync</span></td>
        <td><small class="text-muted">Antenna 100% OK</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'RFID Smart Card Integration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">RFID-GATE-03</td>
        <td>
          <div class="fw-semibold text-dark">Bus Dispersal Bay Turnstiles</div>
          <small class="text-muted font-size-11">Afternoon Exit Flow</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">UHF Long-Range (TCP/IP)</span></td>
        <td><small class="text-dark">Pending Afternoon</small></td>
        <td><small class="text-muted font-mono font-size-12">40 Milliseconds</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Synced to SIS Core</span></td>
        <td><small class="text-muted">Signal RSSI -54dBm (Strong)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'RFID Smart Card Integration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">RFID-SPORTS-01</td>
        <td>
          <div class="fw-semibold text-dark">Olympic Swimming Pool Turnstile</div>
          <small class="text-muted font-size-11">Access Control Badge</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mifare Contactless Tap</span></td>
        <td><small class="text-dark">180 Athlete Taps</small></td>
        <td><small class="text-muted font-mono font-size-12">30 Milliseconds</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Sports Desk Synced</span></td>
        <td><small class="text-muted">Antenna 100% OK</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'RFID Smart Card Integration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
