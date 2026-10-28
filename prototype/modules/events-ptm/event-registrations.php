<?php
/**
 * EDUSYS PRO - EVENT REGISTRATIONS
 * Dedicated operational interface & records management for Event Registrations
 */
$page_title = "Event Registrations";
$page_desc = "Attendee entry pass ticketing, digital QR validation, badge printing, and refreshment token tracking";
$active_module = "events-ptm";
$active_submodule = "event-registrations.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'event-registrations_export.csv')" title="Export Table as CSV">
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
        <h6>Registrations Issued</h6>
        <div class="kpi-value">1,840 Passes</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Students, Parents & Alumni</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-ticket-perforated-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>QR Codes Verified</h6>
        <div class="kpi-value">1,780 Validated</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Automated Gate Scanners</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-qr-code"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Auditorium Seats</h6>
        <div class="kpi-value">1,450 Reserved</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Numbered Seating Passes</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-film"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Refreshment Tokens</h6>
        <div class="kpi-value">1,840 Issued</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> High Tea & Snack Counters</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cup-straw"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search pass #, attendee name, event name...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Events</option>
      <option >Annual Sports Day 2024</option>
      <option >Children's Day Gala Carnival</option>
      <option >Term 1 Comprehensive PTM</option>
      <option >Robotics & AI Olympiad</option>
      <option >Model United Nations (MUN)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Pass Dispatched (Active)</option>
      <option >Admitted at Gate</option>
      <option >Checked-in</option>
      <option >Voided / Cancelled</option>
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
        <th>Pass ID #</th>
        <th>Attendee Full Name</th>
        <th>Attendee Role</th>
        <th>Registered Event</th>
        <th>Gate & Seat #</th>
        <th>Issue Date</th>
        <th>QR Entry Status</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PASS-2024-1840</td>
        <td>
          <div class="fw-semibold text-dark">Rajesh Sharma</div>
          <small class="text-muted font-size-11">Father of Aarav (Cl 10-A)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Parent Attendee</span></td>
        <td><small class="text-dark">Annual Sports Day 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Gate 2 &bull; Stand B-14</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">28 Oct 2024</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Pass Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event Registrations')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PASS-2024-1839</td>
        <td>
          <div class="fw-semibold text-dark">Bhavin Patel</div>
          <small class="text-muted font-size-11">Father of Diya (Cl 10-A)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Parent Attendee</span></td>
        <td><small class="text-dark">Annual Sports Day 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Gate 2 &bull; Stand B-15</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">28 Oct 2024</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Pass Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event Registrations')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PASS-2024-1838</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Roll #01</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Student Participant</span></td>
        <td><small class="text-dark">Annual Sports Day 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Gate 1 &bull; Athlete Bay</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">27 Oct 2024</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Checked-in</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event Registrations')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PASS-2024-1837</td>
        <td>
          <div class="fw-semibold text-dark">Dr. K. S. Reddy</div>
          <small class="text-muted font-size-11">Parent of Saanvi (Cl 6)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Parent Attendee</span></td>
        <td><small class="text-dark">Children's Day Carnival</small></td>
        <td><small class="text-muted font-mono font-size-12">Gate 3 &bull; Family Lawn</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">27 Oct 2024</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Pass Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event Registrations')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PASS-2024-1836</td>
        <td>
          <div class="fw-semibold text-dark">Prisha Nair</div>
          <small class="text-muted font-size-11">Roll #12</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Student Delegate</span></td>
        <td><small class="text-dark">Model United Nations (MUN)</small></td>
        <td><small class="text-muted font-mono font-size-12">Auditorium &bull; Seat F-08</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">26 Oct 2024</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Pass Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event Registrations')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PASS-2024-1835</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Roll #05</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Student Captain</span></td>
        <td><small class="text-dark">Robotics & AI Olympiad</small></td>
        <td><small class="text-muted font-mono font-size-12">Lab Arena &bull; Bay 04</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">25 Oct 2024</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Pass Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event Registrations')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PASS-2024-1834</td>
        <td>
          <div class="fw-semibold text-dark">Dr. Alok Verma</div>
          <small class="text-muted font-size-11">Parent of Ishaan (Cl 12)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Guest of Honor</span></td>
        <td><small class="text-dark">Annual Sports Day 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">VIP Pavilion &bull; Row A</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">24 Oct 2024</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Pass Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event Registrations')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PASS-2024-1833</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Mehta</div>
          <small class="text-muted font-size-11">Roll #18</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Student Attendee</span></td>
        <td><small class="text-dark">Children's Day Carnival</small></td>
        <td><small class="text-muted font-mono font-size-12">Gate 3 &bull; Junior Area</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">24 Oct 2024</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Pass Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event Registrations')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
