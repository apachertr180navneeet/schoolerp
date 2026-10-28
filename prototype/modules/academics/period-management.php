<?php
/**
 * EDUSYS PRO - PERIOD MANAGEMENT
 * Dedicated operational interface & records management for Period Management
 */
$page_title = "Period Management";
$page_desc = "Bell schedule configurations, morning assembly timings, zero period zero-hour slots, and recess intervals";
$active_module = "academics";
$active_submodule = "period-management.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/academics/dashboard.php'); ?>">Academic Management</a></li>
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
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'period-management_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-alarm-fill me-1"></i> Add Period Slot
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>School Timings</h6>
        <div class="kpi-value">07:30 - 02:15 PM</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 6 Hours 45 Mins Daily</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-clock"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Total Periods</h6>
        <div class="kpi-value">8 Periods / Day</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 40-45 Mins Duration</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-bell-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Recess Breaks</h6>
        <div class="kpi-value">2 Daily Breaks</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> 15m Short + 35m Lunch</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cup-hot-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Automated Bell</h6>
        <div class="kpi-value">100% Synced</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> IoT Digital Siren System</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-broadcast"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search period #, slot label, time, applies to...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Schedule Types</option>
      <option >Regular Summer Schedule</option>
      <option >Winter Shift Timings (08:00 AM)</option>
      <option >Examination Half-Day Slots</option>
      <option >Special Activity Zero Period</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active Daily Bell</option>
      <option >Recess Interval</option>
      <option >Assembly Slot</option>
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
        <th>Period #</th>
        <th>Slot Name / Label</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Duration (Mins)</th>
        <th>Applies to Wings</th>
        <th>Bell Ring Audio</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SLOT-00</td>
        <td>
          <div class="fw-semibold text-dark">Morning Assembly & Value Pledge</div>
          <small class="text-muted font-size-11">Homeroom Attendance</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">07:30 AM</span></td>
        <td><small class="text-dark">07:45 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">15 Mins</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">All School Wings (1-12)</span></td>
        <td><small class="text-muted">National Anthem Siren</small></td>
        <td><span class="badge-status badge-active">Assembly Slot</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Period Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SLOT-01</td>
        <td>
          <div class="fw-semibold text-dark">Period 1 (Instructional Core)</div>
          <small class="text-muted font-size-11">Prime Academic Focus</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">07:45 AM</span></td>
        <td><small class="text-dark">08:30 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">45 Mins</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">All School Wings (1-12)</span></td>
        <td><small class="text-muted">Single Long Bell Ring</small></td>
        <td><span class="badge-status badge-active">Active Bell</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Period Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SLOT-02</td>
        <td>
          <div class="fw-semibold text-dark">Period 2 (Instructional Core)</div>
          <small class="text-muted font-size-11">Academic Period</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">08:30 AM</span></td>
        <td><small class="text-dark">09:15 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">45 Mins</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">All School Wings (1-12)</span></td>
        <td><small class="text-muted">Single Long Bell Ring</small></td>
        <td><span class="badge-status badge-active">Active Bell</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Period Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SLOT-BRK1</td>
        <td>
          <div class="fw-semibold text-dark">Short Recess (Nutrition Break)</div>
          <small class="text-muted font-size-11">Fruit & Water Interval</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">09:15 AM</span></td>
        <td><small class="text-dark">09:30 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">15 Mins</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">All School Wings (1-12)</span></td>
        <td><small class="text-muted">Double Staccato Bell</small></td>
        <td><span class="badge-status badge-pending">Recess Interval</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Period Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SLOT-03</td>
        <td>
          <div class="fw-semibold text-dark">Period 3 (Instructional / Lab)</div>
          <small class="text-muted font-size-11">Lab Double Block Start</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">09:30 AM</span></td>
        <td><small class="text-dark">10:15 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">45 Mins</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">All School Wings (1-12)</span></td>
        <td><small class="text-muted">Single Long Bell Ring</small></td>
        <td><span class="badge-status badge-active">Active Bell</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Period Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SLOT-04</td>
        <td>
          <div class="fw-semibold text-dark">Period 4 (Instructional / Lab)</div>
          <small class="text-muted font-size-11">Lab Double Block End</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">10:15 AM</span></td>
        <td><small class="text-dark">11:00 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">45 Mins</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">All School Wings (1-12)</span></td>
        <td><small class="text-muted">Single Long Bell Ring</small></td>
        <td><span class="badge-status badge-active">Active Bell</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Period Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SLOT-LNCH</td>
        <td>
          <div class="fw-semibold text-dark">Main Lunch Break</div>
          <small class="text-muted font-size-11">Dining & Recreation</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">11:00 AM</span></td>
        <td><small class="text-dark">11:35 AM</small></td>
        <td><small class="text-muted font-mono font-size-12">35 Mins</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">All School Wings (1-12)</span></td>
        <td><small class="text-muted">Triple Siren Chime</small></td>
        <td><span class="badge-status badge-pending">Recess Interval</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Period Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SLOT-05-8</td>
        <td>
          <div class="fw-semibold text-dark">Periods 5 to 8 (Afternoon Block)</div>
          <small class="text-muted font-size-11">Academic & Co-curricular</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">11:35 AM</span></td>
        <td><small class="text-dark">02:15 PM</small></td>
        <td><small class="text-muted font-mono font-size-12">40 Mins each</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">All School Wings (1-12)</span></td>
        <td><small class="text-muted">Final Dispersal Bell</small></td>
        <td><span class="badge-status badge-active">Active Bell</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Period Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
