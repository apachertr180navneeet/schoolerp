<?php
/**
 * EDUSYS PRO - ANNUAL SPORTS DAY
 * Dedicated operational interface & records management for Annual Sports Day
 */
$page_title = "Annual Sports Day";
$page_desc = "Inter-house athletic meets, track and field championships, medal tallies, and sports ground schedules";
$active_module = "events-ptm";
$active_submodule = "sports-day.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/events-ptm/calendar.php'); ?>">Events & PTM</a></li>
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
    <a href="<?php echo base_url('modules/events-ptm/calendar.php'); ?>" class="btn btn-light border" title="Interactive Master Calendar">
      <i class="bi bi-calendar3 me-1"></i> Calendar
    </a>
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'sports-day_export.csv')" title="Export Table as CSV">
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
        <h6>Athletes Competing</h6>
        <div class="kpi-value">520 Athletes</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 4 Student Houses</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-trophy-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Total Medals</h6>
        <div class="kpi-value">84 Medals</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Gold, Silver, Bronze</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-award-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>House Leader</h6>
        <div class="kpi-value">Tagore House</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> 340 Total Points (Leader)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-flag-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Chief Guest</h6>
        <div class="kpi-value">Olympic Boxer</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Commonwealth Gold Medalist</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-check-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search event name, athlete, house, category...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Athletic Disciplines</option>
      <option >Track Sprints (100m, 200m, 400m)</option>
      <option >Relay Races (4x100m)</option>
      <option >Field Events (Long Jump, Shot Put)</option>
      <option >March Past & Drill</option>
      <option >Fun Races (Tug of War)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Heats Completed</option>
      <option >Finals Scheduled</option>
      <option >Medal Ceremony</option>
      <option >Results Declared</option>
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
        <th>Event ID</th>
        <th>Sports Event Title</th>
        <th>Division / Wing</th>
        <th>Gold Medal Winner</th>
        <th>Winning House</th>
        <th>Timing / Record</th>
        <th>Schedule Slot</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SPT-2024-101</td>
        <td>
          <div class="fw-semibold text-dark">Boys 100m Senior Sprint Final</div>
          <small class="text-muted font-size-11">Under-19 Championship Race</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Rohan Gupta (Cl 12-A)</small></td>
        <td><small class="text-muted font-mono font-size-12">Ashoka House (Red)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">11.24 Seconds (Record)</span></td>
        <td><small class="text-muted">22 Nov (10:15 AM)</small></td>
        <td><span class="badge-status badge-active">Final Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Annual Sports Day')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SPT-2024-102</td>
        <td>
          <div class="fw-semibold text-dark">Girls 100m Senior Sprint Final</div>
          <small class="text-muted font-size-11">Under-19 Championship Race</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Diya Patel (Cl 12-B)</small></td>
        <td><small class="text-muted font-mono font-size-12">Tagore House (Blue)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">12.80 Seconds</span></td>
        <td><small class="text-muted">22 Nov (10:30 AM)</small></td>
        <td><span class="badge-status badge-active">Final Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Annual Sports Day')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SPT-2024-103</td>
        <td>
          <div class="fw-semibold text-dark">Inter-House 4x100m Mixed Relay</div>
          <small class="text-muted font-size-11">4 Runners Per House</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Secondary & Sr Sec</span></td>
        <td><small class="text-dark">Tagore House Relay Team</small></td>
        <td><small class="text-muted font-mono font-size-12">Tagore House (Blue)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">48.12 Seconds</span></td>
        <td><small class="text-muted">22 Nov (11:45 AM)</small></td>
        <td><span class="badge-status badge-active">Final Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Annual Sports Day')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SPT-2024-104</td>
        <td>
          <div class="fw-semibold text-dark">Boys Shot Put Senior Championship</div>
          <small class="text-muted font-size-11">5.45 kg Official Shot</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Harpreet Singh (Cl 12-A)</small></td>
        <td><small class="text-muted font-mono font-size-12">Shivaji House (Yellow)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">12.45 Meters</span></td>
        <td><small class="text-muted">22 Nov (09:45 AM)</small></td>
        <td><span class="badge-status badge-active">Final Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Annual Sports Day')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SPT-2024-105</td>
        <td>
          <div class="fw-semibold text-dark">Girls Long Jump Championship</div>
          <small class="text-muted font-size-11">Under-16 Category</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Secondary Wing</span></td>
        <td><small class="text-dark">Ananya Iyer (Cl 10-B)</small></td>
        <td><small class="text-muted font-mono font-size-12">Raman House (Green)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">4.85 Meters</span></td>
        <td><small class="text-muted">22 Nov (09:15 AM)</small></td>
        <td><span class="badge-status badge-active">Final Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Annual Sports Day')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SPT-2024-106</td>
        <td>
          <div class="fw-semibold text-dark">Annual March Past Competition</div>
          <small class="text-muted font-size-11">Cadets, Bands & House Contingents</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">All 4 Houses</span></td>
        <td><small class="text-dark">Best Contingent Trophy</small></td>
        <td><small class="text-muted font-mono font-size-12">Ashoka House (Red)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Judged on Synchronization</span></td>
        <td><small class="text-muted">22 Nov (08:45 AM)</small></td>
        <td><span class="badge-status badge-active">Opening Act</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Annual Sports Day')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SPT-2024-107</td>
        <td>
          <div class="fw-semibold text-dark">Primary Fun Relay: Obstacle Race</div>
          <small class="text-muted font-size-11">Classes 3 to 5 Fun Events</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Primary Wing</span></td>
        <td><small class="text-dark">Kabir Mehta & Team</small></td>
        <td><small class="text-muted font-mono font-size-12">Shivaji House (Yellow)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Completed in 52 Secs</span></td>
        <td><small class="text-muted">22 Nov (11:15 AM)</small></td>
        <td><span class="badge-status badge-active">Final Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Annual Sports Day')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SPT-2024-108</td>
        <td>
          <div class="fw-semibold text-dark">Faculty vs Parents Tug of War</div>
          <small class="text-muted font-size-11">Annual Exhibition Match</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Staff & Parents</span></td>
        <td><small class="text-dark">Trophy of Fellowship</small></td>
        <td><small class="text-muted font-mono font-size-12">Parents Association</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Best of 3 Pulls</span></td>
        <td><small class="text-muted">22 Nov (01:15 PM)</small></td>
        <td><span class="badge-status badge-active">Grand Finale</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Annual Sports Day')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
