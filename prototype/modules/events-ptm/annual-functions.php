<?php
/**
 * EDUSYS PRO - ANNUAL FUNCTIONS
 * Dedicated operational interface & records management for Annual Functions
 */
$page_title = "Annual Functions";
$page_desc = "Annual Day Celebrations, Foundation Day galas, Silver Jubilee pageants, and dignitary protocol management";
$active_module = "events-ptm";
$active_submodule = "annual-functions.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'annual-functions_export.csv')" title="Export Table as CSV">
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
        <h6>Student Performers</h6>
        <div class="kpi-value">680 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Dance, Choir & Theater</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-stars"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Auditorium Capacity</h6>
        <div class="kpi-value">1,800 Seats</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 100% Parent Invitations</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-building-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Chief Guest Confirmed</h6>
        <div class="kpi-value">Hon. Justice</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Delhi High Court Dignitary</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-badge-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Stage Sequences</h6>
        <div class="kpi-value">18 Acts</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> 3.5 Hours Program Run</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-music-note-list"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search act code, performance title, director...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Performance Types</option>
      <option >Classical & Folk Dance</option>
      <option >Western & Fusion Orchestra</option>
      <option >Theatrical Drama</option>
      <option >Annual School Report & Awards</option>
      <option >Grand Finale</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Costumes & Audio Ready</option>
      <option >Rehearsal in Progress</option>
      <option >Script Approved</option>
      <option >Technical Check Due</option>
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
        <th>Act Code</th>
        <th>Performance Title & Theme</th>
        <th>Art Form</th>
        <th>Participant Batch</th>
        <th>Faculty Director</th>
        <th>Stage Run Time</th>
        <th>Rehearsal Status</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACT-2024-01</td>
        <td>
          <div class="fw-semibold text-dark">Invocation: Saraswati Vandana</div>
          <small class="text-muted font-size-11">Classical Bharatnatyam & Odissi Fusion</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classical Dance</span></td>
        <td><small class="text-dark">Secondary Wing (24 Girls)</small></td>
        <td><small class="text-muted font-mono font-size-12">Guru Malini Iyer</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">08 Mins</span></td>
        <td><small class="text-muted">Costumes Fitted</small></td>
        <td><span class="badge-status badge-active">Stage Ready</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Annual Functions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACT-2024-02</td>
        <td>
          <div class="fw-semibold text-dark">Symphony of Peace: School Orchestra</div>
          <small class="text-muted font-size-11">48-Piece String & Wind Ensemble</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Orchestra</span></td>
        <td><small class="text-dark">Classes 6 to 11 (48 Students)</small></td>
        <td><small class="text-muted font-mono font-size-12">Mr. Victor D'Souza</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">14 Mins</span></td>
        <td><small class="text-muted">Full Score Rehearsed</small></td>
        <td><span class="badge-status badge-active">Stage Ready</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Annual Functions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACT-2024-03</td>
        <td>
          <div class="fw-semibold text-dark">Main Play: 'Untold Tale of Ashoka'</div>
          <small class="text-muted font-size-11">Epic Historical Drama with Sound & Light</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Theatrical Drama</span></td>
        <td><small class="text-dark">Secondary Wing (65 Cast Members)</small></td>
        <td><small class="text-muted font-mono font-size-12">Mr. Pradeep Joshi</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">35 Mins</span></td>
        <td><small class="text-muted">Tech Run Scheduled</small></td>
        <td><span class="badge-status badge-pending">In Rehearsal</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Annual Functions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACT-2024-04</td>
        <td>
          <div class="fw-semibold text-dark">Global Beats: International Folk Dance</div>
          <small class="text-muted font-size-11">Spanish Flamenco, Irish Jig & African Rhythms</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Folk Dance</span></td>
        <td><small class="text-dark">Primary Wing (80 Students)</small></td>
        <td><small class="text-muted font-mono font-size-12">Mrs. Reena Sengupta</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">12 Mins</span></td>
        <td><small class="text-muted">Props Delivered</small></td>
        <td><span class="badge-status badge-active">Stage Ready</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Annual Functions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACT-2024-05</td>
        <td>
          <div class="fw-semibold text-dark">Early Years Fantasy: 'Enchanted Forest'</div>
          <small class="text-muted font-size-11">Musical Playlet with Animal Characters</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Early Childhood</span></td>
        <td><small class="text-dark">Pre-Primary (120 Children)</small></td>
        <td><small class="text-muted font-mono font-size-12">Mrs. Shalini Verma</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">15 Mins</span></td>
        <td><small class="text-muted">Final Dress Rehearsal</small></td>
        <td><span class="badge-status badge-active">Stage Ready</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Annual Functions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACT-2024-06</td>
        <td>
          <div class="fw-semibold text-dark">Principal's Annual Academic Report</div>
          <small class="text-muted font-size-11">Audio-Visual Milestone Presentation</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Official Protocol</span></td>
        <td><small class="text-dark">Head of School & Guests</small></td>
        <td><small class="text-muted font-mono font-size-12">Principal Office</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">18 Mins</span></td>
        <td><small class="text-muted">Video Finalized</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Annual Functions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACT-2024-07</td>
        <td>
          <div class="fw-semibold text-dark">Felicitation of CBSE Board Toppers</div>
          <small class="text-muted font-size-11">National Rank Holders & Scholarship Awards</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Awards Ceremony</span></td>
        <td><small class="text-dark">Class 10 & 12 Batch 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">Dean Academics</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">25 Mins</span></td>
        <td><small class="text-muted">Trophies Engraved</small></td>
        <td><span class="badge-status badge-active">Ready</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Annual Functions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACT-2024-08</td>
        <td>
          <div class="fw-semibold text-dark">Grand Finale: 'Vande Mataram 2024'</div>
          <small class="text-muted font-size-11">All-Cast Choir & Patriotic Pageantry</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Grand Finale</span></td>
        <td><small class="text-dark">All 680 Performers</small></td>
        <td><small class="text-muted font-mono font-size-12">All Directors Panel</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">10 Mins</span></td>
        <td><small class="text-muted">Full Cast Staging Done</small></td>
        <td><span class="badge-status badge-active">Stage Ready</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Annual Functions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
