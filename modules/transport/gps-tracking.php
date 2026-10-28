<?php
/**
 * EDUSYS PRO - GPS Tracking Map
 */
$page_title = "GPS Tracking Map";
$page_desc = "Dedicated operational interface & records management for GPS Tracking Map";
$active_module = "transport";
$active_submodule = "gps-tracking.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'gps-tracking_export.csv')" title="Export Table as CSV">
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
        <h6>Fleet Vehicles</h6>
        <div class="kpi-value">32 Buses</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Fitness Certified</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-bus-front-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Students Transported</h6>
        <div class="kpi-value">1,840 Daily</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 32 Active Bus Routes</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>GPS Telemetry</h6>
        <div class="kpi-value">32 / 32 Live</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Zero Speeding Alerts</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-broadcast-pin"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Monthly Fuel Economy</h6>
        <div class="kpi-value">4.8 km/L</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Diesel Logs Reconciled</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-fuel-pump-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search bus plate, driver name, route #...">
    </div>
    <select class="form-select" style="max-width: 200px;">
      <option selected>All Routes</option>
      <option >Route 01 - Dwarka Sector 6 to 22</option>
      <option >Route 04 - South Extension</option>
      <option >Route 08 - Janakpuri & Vikaspuri</option>
      <option >Route 12 - Rohini Sector 14</option>
      <option >Route 15 - Gurgaon DLF</option>
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
        <th>Vehicle Plate</th>
        <th>Bus Name / Model</th>
        <th>Assigned Route & Zone</th>
        <th>Driver Name & Contact</th>
        <th>Seating Capacity</th>
        <th>GPS Status</th>
        <th>Fuel Level</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DL-1V-8491</td>
        <td>
          <div class="fw-semibold text-dark">Bus #01 (Tata Starbus)</div>
          <small class="text-muted font-size-11">36 Seater AC</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Route 01 - Dwarka Express</span></td>
        <td><small class="text-dark">Harpreet Singh (+91 98118 77201)</small></td>
        <td><small class="text-muted font-mono font-size-12">36 / 36 (Full)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Live GPS (28.613° N)</span></td>
        <td><small class="text-muted">78% Diesel</small></td>
        <td><span class="badge-status badge-active">On Route</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'GPS Tracking Map')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DL-1V-8492</td>
        <td>
          <div class="fw-semibold text-dark">Bus #04 (Ashok Leyland)</div>
          <small class="text-muted font-size-11">42 Seater AC</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Route 04 - South Extension</span></td>
        <td><small class="text-dark">Ram Avtar (+91 98229 88302)</small></td>
        <td><small class="text-muted font-mono font-size-12">40 / 42 (95%)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Live GPS (28.581° N)</span></td>
        <td><small class="text-muted">65% Diesel</small></td>
        <td><span class="badge-status badge-active">On Route</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'GPS Tracking Map')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DL-1V-8493</td>
        <td>
          <div class="fw-semibold text-dark">Bus #08 (Eicher Skyline)</div>
          <small class="text-muted font-size-11">36 Seater AC</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Route 08 - Janakpuri East</span></td>
        <td><small class="text-dark">Sukhdev Yadav (+91 98331 99403)</small></td>
        <td><small class="text-muted font-mono font-size-12">35 / 36 (97%)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Live GPS (28.629° N)</span></td>
        <td><small class="text-muted">82% Diesel</small></td>
        <td><span class="badge-status badge-active">On Route</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'GPS Tracking Map')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DL-1V-8494</td>
        <td>
          <div class="fw-semibold text-dark">Bus #12 (Tata Starbus)</div>
          <small class="text-muted font-size-11">42 Seater AC</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Route 12 - Rohini Sector 14</span></td>
        <td><small class="text-dark">Manoj Kumar (+91 98442 11504)</small></td>
        <td><small class="text-muted font-mono font-size-12">41 / 42 (98%)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Live GPS (28.712° N)</span></td>
        <td><small class="text-muted">90% Diesel</small></td>
        <td><span class="badge-status badge-active">On Route</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'GPS Tracking Map')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DL-1V-8495</td>
        <td>
          <div class="fw-semibold text-dark">Bus #15 (Eicher Skyline)</div>
          <small class="text-muted font-size-11">36 Seater AC</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Route 15 - Gurgaon Cyber Hub</span></td>
        <td><small class="text-dark">Balwant Singh (+91 98553 22605)</small></td>
        <td><small class="text-muted font-mono font-size-12">34 / 36 (94%)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Live GPS (28.489° N)</span></td>
        <td><small class="text-muted">71% Diesel</small></td>
        <td><span class="badge-status badge-active">On Route</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'GPS Tracking Map')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DL-1V-8496</td>
        <td>
          <div class="fw-semibold text-dark">Bus #18 (Tata Starbus)</div>
          <small class="text-muted font-size-11">42 Seater AC</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Route 18 - Vasant Kunj</span></td>
        <td><small class="text-dark">Surender Pal (+91 98664 33706)</small></td>
        <td><small class="text-muted font-mono font-size-12">38 / 42 (90%)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Live GPS (28.529° N)</span></td>
        <td><small class="text-muted">60% Diesel</small></td>
        <td><span class="badge-status badge-active">On Route</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'GPS Tracking Map')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DL-1V-8497</td>
        <td>
          <div class="fw-semibold text-dark">Bus #22 (Force Traveller)</div>
          <small class="text-muted font-size-11">26 Seater AC</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Route 22 - Palam & Cantt</span></td>
        <td><small class="text-dark">Vinod Tyagi (+91 98775 44807)</small></td>
        <td><small class="text-muted font-mono font-size-12">25 / 26 (96%)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Live GPS (28.591° N)</span></td>
        <td><small class="text-muted">85% Diesel</small></td>
        <td><span class="badge-status badge-active">On Route</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'GPS Tracking Map')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DL-1V-8498</td>
        <td>
          <div class="fw-semibold text-dark">Bus #28 (Reserve Bus)</div>
          <small class="text-muted font-size-11">42 Seater AC</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Campus Reserve / Standby</span></td>
        <td><small class="text-dark">Ratan Lal (+91 98886 55908)</small></td>
        <td><small class="text-muted font-mono font-size-12">0 / 42 (Standby)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Campus Depot Parked</span></td>
        <td><small class="text-muted">95% Diesel</small></td>
        <td><span class="badge-status badge-pending">Standby Reserve</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'GPS Tracking Map')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>


<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
