<?php
/**
 * EDUSYS PRO - SCHOOL EVENTS CALENDAR
 * Dedicated operational interface & records management for School Events Calendar
 */
$page_title = "School Events Calendar";
$page_desc = "Master institutional timeline, co-curricular fixtures, inter-school tournaments, and administrative dates";
$active_module = "administration";
$active_submodule = "events-calendar.php";
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
    <h1><i class="bi bi-layers text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/administration/school-profile.php'); ?>" class="btn btn-light border" title="School Institutional Dossier">
      <i class="bi bi-building me-1"></i> Profile
    </a>
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'events-calendar_export.csv')" title="Export Table as CSV">
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
        <div class="kpi-value">48 Fixtures</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 2024-25 Season Roster</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar3"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Competitions</h6>
        <div class="kpi-value">14 Inter-School</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Debate, MUN, Robotics, Sports</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-trophy"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Parent Functions</h6>
        <div class="kpi-value">6 Mega Events</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Sports Day, Annual Day, PTMs</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Active Month</h6>
        <div class="kpi-value">November 2024</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> 14 Live Operational Events</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-lightning-charge"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search event, venue, faculty coordinator...">
    </div>
    <select class="form-select" style="max-width: 240px;">
      <option selected>All Event Categories</option>
      <option >Academic Olympiads & Exhibitions</option>
      <option >Sports Competitions & Heats</option>
      <option >Cultural Festivals & Dramas</option>
      <option >Parent-Teacher Conferences</option>
      <option >Educational Excursions</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Confirmed</option>
      <option >Planning Stage</option>
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
        <th>Event Title & Description</th>
        <th>Event Category</th>
        <th>Participating Grades</th>
        <th>Venue & Ground</th>
        <th>Event Incharge</th>
        <th>Scheduled Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-1108</td>
        <td>
          <div class="fw-semibold text-dark">Class 10 & 12 Pre-Board Diagnostic PTM</div>
          <small class="text-muted font-size-11">Term 1 Assessment Review & Board Roadmap</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">PTM Session</span></td>
        <td><small class="text-dark">Secondary & Sr Sec Wings</small></td>
        <td><small class="text-muted font-mono font-size-12">Rooms 201 to 216</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dean Academics</span></td>
        <td><small class="text-muted">08 Nov 2024 (08:30 AM)</small></td>
        <td><span class="badge-status badge-active">Slots Open</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Events Calendar')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-1114</td>
        <td>
          <div class="fw-semibold text-dark">Children's Day Gala Carnival 2024</div>
          <small class="text-muted font-size-11">Magic Show, Fun Fair, Games & Music</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Cultural Carnival</span></td>
        <td><small class="text-dark">All Students & Parents</small></td>
        <td><small class="text-muted font-mono font-size-12">Central School Grounds</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Cultural Committee</span></td>
        <td><small class="text-muted">14 Nov 2024 (09:00 AM)</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Events Calendar')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-1118</td>
        <td>
          <div class="fw-semibold text-dark">National Science Centre Eco-Excursion</div>
          <small class="text-muted font-size-11">Interactive Science & Planetarium Demos</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">School Excursion</span></td>
        <td><small class="text-dark">Middle Wing (Classes 6-8)</small></td>
        <td><small class="text-muted font-mono font-size-12">National Science Centre, Pragati</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">HOD Science</span></td>
        <td><small class="text-muted">18 Nov 2024 (08:00 AM)</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Events Calendar')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-1122</td>
        <td>
          <div class="fw-semibold text-dark">24th Annual Athletics Championship 2024</div>
          <small class="text-muted font-size-11">Track & Field, Relays, March Past & Medals</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Sports & Athletics</span></td>
        <td><small class="text-dark">All 4 Student Houses</small></td>
        <td><small class="text-muted font-mono font-size-12">Main Athletic Stadium Ground</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Director Physical Ed</span></td>
        <td><small class="text-muted">22 Nov 2024 (08:30 AM)</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Events Calendar')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-1129</td>
        <td>
          <div class="fw-semibold text-dark">Term 1 Comprehensive PTM (Nursery to 12)</div>
          <small class="text-muted font-size-11">Full Academic Progress & Report Cards</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">PTM Session</span></td>
        <td><small class="text-dark">All Students & Parents</small></td>
        <td><small class="text-muted font-mono font-size-12">All 48 Classrooms</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Principal & HODs</span></td>
        <td><small class="text-muted">29 Nov 2024 (08:30 AM)</small></td>
        <td><span class="badge-status badge-active">Slots Open</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Events Calendar')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-1130</td>
        <td>
          <div class="fw-semibold text-dark">Inter-School Robotics & AI Olympiad</div>
          <small class="text-muted font-size-11">STEM Innovation, Autonomous Bot Challenges</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Academic Olympiad</span></td>
        <td><small class="text-dark">Classes 8 to 12 Teams</small></td>
        <td><small class="text-muted font-mono font-size-12">Atal Tinkering Lab & Aud 2</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">HOD Computer Science</span></td>
        <td><small class="text-muted">30 Nov 2024 (10:00 AM)</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Events Calendar')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-1207</td>
        <td>
          <div class="fw-semibold text-dark">Grandparents Day Celebration</div>
          <small class="text-muted font-size-11">Special Musical Morning & High Tea</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Cultural Function</span></td>
        <td><small class="text-dark">Pre-Primary (Nursery/Prep)</small></td>
        <td><small class="text-muted font-mono font-size-12">Junior Amphitheater</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mrs. Shalini Verma</span></td>
        <td><small class="text-muted">07 Dec 2024 (10:00 AM)</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Events Calendar')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-1220</td>
        <td>
          <div class="fw-semibold text-dark">Annual Day 2024: 'Vasudhaiva Kutumbakam'</div>
          <small class="text-muted font-size-11">Mega Performing Arts Production & Awards</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Annual Function</span></td>
        <td><small class="text-dark">All School Performers</small></td>
        <td><small class="text-muted font-mono font-size-12">Main Air-Conditioned Auditorium</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Steering Committee</span></td>
        <td><small class="text-muted">20 Dec 2024 (05:00 PM)</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Events Calendar')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
