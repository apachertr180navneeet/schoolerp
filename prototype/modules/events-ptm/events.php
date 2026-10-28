<?php
/**
 * EDUSYS PRO - EVENT MANAGEMENT
 * Dedicated operational interface & records management for Event Management
 */
$page_title = "Event Management";
$page_desc = "Comprehensive master event registry, operational approvals, and venue logistical scheduling";
$active_module = "events-ptm";
$active_submodule = "events.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'events_export.csv')" title="Export Table as CSV">
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
        <h6>Total Events</h6>
        <div class="kpi-value">48 Events</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Annual Session 2024-25</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar3-event-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Upcoming Events</h6>
        <div class="kpi-value">14 Active</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Scheduled for Nov-Dec</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-clock-history"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Total Budget</h6>
        <div class="kpi-value">₹18,50,000</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> ₹14.20L Realized</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-currency-rupee"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Venues Occupied</h6>
        <div class="kpi-value">82% Utilization</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Auditorium & Grounds</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-building-check"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search event code, title, venue, coordinator...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Event Categories</option>
      <option >Cultural & Arts</option>
      <option >Sports & Athletics</option>
      <option >Parent-Teacher Meetings</option>
      <option >Academic Olympiads</option>
      <option >Excursions & Field Trips</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Confirmed</option>
      <option >Planning Phase</option>
      <option >Slots Open</option>
      <option >Completed</option>
      <option >Postponed</option>
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
        <th>Event Code</th>
        <th>Event Title & Theme</th>
        <th>Category</th>
        <th>Target Wing</th>
        <th>Venue & Hall</th>
        <th>Budget Allocation</th>
        <th>Event Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-0048</td>
        <td>
          <div class="fw-semibold text-dark">24th Annual Athletics Championship 2024</div>
          <small class="text-muted font-size-11">Inter-House Track & Field Events</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Sports</span></td>
        <td><small class="text-dark">All 4 Student Houses</small></td>
        <td><small class="text-muted font-mono font-size-12">Main Athletic Stadium Ground</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹3,50,000</span></td>
        <td><small class="text-muted">22 Nov 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-0047</td>
        <td>
          <div class="fw-semibold text-dark">Children's Day Gala Carnival 2024</div>
          <small class="text-muted font-size-11">Magic Show, Fun Fair & Music</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Cultural</span></td>
        <td><small class="text-dark">Pre-Primary & Primary Wings</small></td>
        <td><small class="text-muted font-mono font-size-12">Central School Grounds</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹2,20,000</span></td>
        <td><small class="text-muted">14 Nov 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-0046</td>
        <td>
          <div class="fw-semibold text-dark">Term 1 Comprehensive PTM (All Classes)</div>
          <small class="text-muted font-size-11">Academic Progress & Report Cards</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">PTM</span></td>
        <td><small class="text-dark">Nursery to Class 12</small></td>
        <td><small class="text-muted font-mono font-size-12">All 48 Classrooms</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹45,000</span></td>
        <td><small class="text-muted">29 Nov 2024</small></td>
        <td><span class="badge-status badge-active">Slots Open</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-0045</td>
        <td>
          <div class="fw-semibold text-dark">Inter-School Robotics & AI Olympiad</div>
          <small class="text-muted font-size-11">STEM Autonomous Bot Challenges</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Academic</span></td>
        <td><small class="text-dark">Senior Secondary (11-12)</small></td>
        <td><small class="text-muted font-mono font-size-12">Atal Tinkering Lab & Aud 2</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹1,80,000</span></td>
        <td><small class="text-muted">30 Nov 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-0044</td>
        <td>
          <div class="fw-semibold text-dark">National Science Centre Eco-Excursion</div>
          <small class="text-muted font-size-11">Interactive Planetarium Workshop</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Excursion</span></td>
        <td><small class="text-dark">Middle Wing (Classes 6-8)</small></td>
        <td><small class="text-muted font-mono font-size-12">National Science Centre, Delhi</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹1,25,000</span></td>
        <td><small class="text-muted">18 Nov 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-0043</td>
        <td>
          <div class="fw-semibold text-dark">Annual Cultural Fest & Musical Drama</div>
          <small class="text-muted font-size-11">'Vasudhaiva Kutumbakam' Mega Production</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Cultural</span></td>
        <td><small class="text-dark">Middle & Secondary Wings</small></td>
        <td><small class="text-muted font-mono font-size-12">Main Air-Conditioned Auditorium</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹4,80,000</span></td>
        <td><small class="text-muted">20 Dec 2024</small></td>
        <td><span class="badge-status badge-pending">Planning Phase</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-0042</td>
        <td>
          <div class="fw-semibold text-dark">Class 10 & 12 Pre-Board Diagnostic PTM</div>
          <small class="text-muted font-size-11">CBSE LOC Performance Consultation</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">PTM</span></td>
        <td><small class="text-dark">Board Batches</small></td>
        <td><small class="text-muted font-mono font-size-12">Senior Wing Rooms 201-216</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹35,000</span></td>
        <td><small class="text-muted">08 Nov 2024</small></td>
        <td><span class="badge-status badge-active">Slots Open</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-0041</td>
        <td>
          <div class="fw-semibold text-dark">Grandparents Day Celebration</div>
          <small class="text-muted font-size-11">Special Musical Morning & High Tea</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Cultural</span></td>
        <td><small class="text-dark">Pre-Primary (Nursery/Prep)</small></td>
        <td><small class="text-muted font-mono font-size-12">Junior Amphitheater</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹85,000</span></td>
        <td><small class="text-muted">07 Dec 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
