<?php
/**
 * EDUSYS PRO - Transport Fleet Dashboard
 * Dedicated view for Logistics Head: H. Singh (Transport Manager)
 */
$page_title = "Transport Fleet Dashboard";
$page_desc = "Real-time fleet tracking, student routing, and vehicle compliance for H. Singh.";
$active_module = "dashboard";
$active_submodule = "transport-manager.php";
$depth = 1;

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/sidebar.php';
require_once __DIR__ . '/../includes/topbar.php';
?>

<!-- Transport Banner -->
<div class="erp-card mb-4 bg-gradient text-dark border-info border-opacity-25 shadow-xs" style="background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);">
  <div class="erp-card-body p-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div class="d-flex align-items-center gap-3">
        <div class="avatar-lg rounded-circle bg-info text-white d-flex align-items-center justify-content-center fw-bold font-size-24" style="width: 60px; height: 60px;">
          TM
        </div>
        <div>
          <div class="d-flex align-items-center gap-2 mb-1">
            <h4 class="fw-bold text-dark mb-0">H. Singh</h4>
            <span class="badge bg-info text-white font-size-12 px-2.5 py-1 rounded-pill">Transport Manager</span>
            <span class="badge bg-success text-white font-size-11">14/14 Buses Live GPS</span>
          </div>
          <div class="font-size-13 text-muted">
            <span>Staff ID: <strong class="text-dark font-mono">TRN-2017-0091</strong></span>
            <span class="mx-2">•</span>
            <span>Total Fleet: <strong class="text-dark">14 Buses (DL-1PC Series)</strong></span>
            <span class="mx-2">•</span>
            <span>Students Transported: <strong class="text-primary">680 Pupils Daily</strong></span>
          </div>
        </div>
      </div>
      <div class="d-flex align-items-center gap-2">
        <a href="<?php echo base_url('modules/transport/gps-tracking.php'); ?>" class="btn btn-primary btn-sm fw-bold px-3 py-2 rounded-pill">
          <i class="bi bi-geo-alt-fill me-1"></i> Live Fullscreen GPS Map
        </a>
      </div>
    </div>
  </div>
</div>

<!-- KPI Row: Personalized for Transport -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Active Buses Online</h6>
        <div class="kpi-value text-success">14 / 14</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 100% Fleet Online</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-bus-front-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Transport Pupils</h6>
        <div class="kpi-value text-primary">680</div>
        <div class="kpi-trend positive"><i class="bi bi-people-fill"></i> Across 14 Routes</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Speed & Geofence</h6>
        <div class="kpi-value text-info">0 Violations</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Speed Limit 40 km/h</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-speedometer2"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Compliance / Service</h6>
        <div class="kpi-value text-warning">1 Alert</div>
        <div class="kpi-trend"><i class="bi bi-wrench"></i> Bus #04 Insurance (12 days)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-exclamation-triangle-fill"></i></div>
    </div>
  </div>
</div>

<!-- Live Fleet Telemetry Table -->
<div class="erp-card mb-4">
  <div class="erp-card-header">
    <h5 class="erp-card-title"><i class="bi bi-bus-front text-primary"></i> Live Fleet GPS Telemetry & Schedule</h5>
    <span class="badge bg-success text-white font-size-11">Auto-refresh (5s)</span>
  </div>
  <div class="erp-table-responsive">
    <table class="erp-table">
      <thead>
        <tr>
          <th>Bus #</th>
          <th>Route Name</th>
          <th>Driver & Contact</th>
          <th>Speed</th>
          <th>Next Stop</th>
          <th>ETA</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><strong class="text-primary font-mono font-size-13">Bus #12</strong> (DL-1PC-4819)</td>
          <td>Sector 62 &rarr; Model Town &rarr; School</td>
          <td>Ramesh Yadav (+91 98110 44219)</td>
          <td><span class="badge bg-success">38 km/h</span></td>
          <td>Model Town Metro Stn</td>
          <td>08:15 AM (In 6 mins)</td>
          <td><span class="badge bg-success-subtle text-success">On Schedule</span></td>
        </tr>
        <tr>
          <td><strong class="text-primary font-mono font-size-13">Bus #07</strong> (DL-1PC-2210)</td>
          <td>Civil Lines &rarr; Rohini Sec 14</td>
          <td>Baljit Singh (+91 98711 00392)</td>
          <td><span class="badge bg-success">42 km/h</span></td>
          <td>Rohini West Gate</td>
          <td>08:18 AM (In 9 mins)</td>
          <td><span class="badge bg-success-subtle text-success">On Schedule</span></td>
        </tr>
        <tr>
          <td><strong class="text-primary font-mono font-size-13">Bus #04</strong> (DL-1PC-8891)</td>
          <td>Dwarka Sec 10 &rarr; Janakpuri</td>
          <td>Mohan Lal (+91 99118 77210)</td>
          <td><span class="badge bg-success">35 km/h</span></td>
          <td>Janakpuri District Center</td>
          <td>08:22 AM (In 13 mins)</td>
          <td><span class="badge bg-success-subtle text-success">On Schedule</span></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
