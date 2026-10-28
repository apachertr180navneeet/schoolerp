<?php
/**
 * EDUSYS PRO - CULTURAL PROGRAMS
 * Dedicated operational interface & records management for Cultural Programs
 */
$page_title = "Cultural Programs";
$page_desc = "Performing arts festivals, classical music recitals, inter-school debates, Model UN, and fine arts pageants";
$active_module = "events-ptm";
$active_submodule = "cultural-programs.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'cultural-programs_export.csv')" title="Export Table as CSV">
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
        <h6>Cultural Trophies</h6>
        <div class="kpi-value">18 Won</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Inter-School Circuit</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-trophy"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Troupe Members</h6>
        <div class="kpi-value">195 Artists</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Dance, Choir, Drama, Band</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-palette-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Auditions Open</h6>
        <div class="kpi-value">12 Roles</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Winter Play Casting</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-mic-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Next Festival</h6>
        <div class="kpi-value">DPGA MUN 2024</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> 14 Dec 2024 (300 Delegates)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-globe"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search cultural program, venue, mentor teacher...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Cultural Activities</option>
      <option >Inter-School Debates & MUN</option>
      <option >Vocal & Instrumental Music</option>
      <option >Classical & Contemporary Dance</option>
      <option >Dramatics & Street Theater</option>
      <option >Fine Arts & Sculpture</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Confirmed Date</option>
      <option >Casting Auditions</option>
      <option >Registrations Open</option>
      <option >Completed</option>
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
        <th>Program Code</th>
        <th>Cultural Program Title</th>
        <th>Art Discipline</th>
        <th>Audience / Grades</th>
        <th>Venue</th>
        <th>Faculty Director</th>
        <th>Program Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CUL-2024-01</td>
        <td>
          <div class="fw-semibold text-dark">DPGA Model United Nations (MUN 2024)</div>
          <small class="text-muted font-size-11">Theme: Global Climate & Economic Resilience</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Model UN Debate</span></td>
        <td><small class="text-dark">Secondary & Sr Sec (300 Delegates)</small></td>
        <td><small class="text-muted font-mono font-size-12">School Auditorium & Labs</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mrs. Meenakshi Soni</span></td>
        <td><small class="text-muted">14 Dec 2024</small></td>
        <td><span class="badge-status badge-active">Registrations Open</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Cultural Programs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CUL-2024-02</td>
        <td>
          <div class="fw-semibold text-dark">Inter-House Classical Dance Competition</div>
          <small class="text-muted font-size-11">Kathak, Bharatnatyam & Kuchipudi</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classical Dance</span></td>
        <td><small class="text-dark">Classes 6 to 12</small></td>
        <td><small class="text-muted font-mono font-size-12">Junior Amphitheater</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Guru Malini Iyer</span></td>
        <td><small class="text-muted">02 Dec 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Cultural Programs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CUL-2024-03</td>
        <td>
          <div class="fw-semibold text-dark">Inter-School Western Rock Band Battle</div>
          <small class="text-muted font-size-11">Annual Rockfest 'Rhythm 2024'</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Western Music</span></td>
        <td><small class="text-dark">Senior Secondary (12 Schools)</small></td>
        <td><small class="text-muted font-mono font-size-12">Open Air Quadrangle</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mr. Victor D'Souza</span></td>
        <td><small class="text-muted">28 Dec 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Cultural Programs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CUL-2024-04</td>
        <td>
          <div class="fw-semibold text-dark">Street Play: 'Cyber Hygiene & Mental Health'</div>
          <small class="text-muted font-size-11">Nukkad Natak for Community Awareness</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Street Theater</span></td>
        <td><small class="text-dark">Class 9 & 10 Troupe</small></td>
        <td><small class="text-muted font-mono font-size-12">Local Community Center</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mr. Pradeep Joshi</span></td>
        <td><small class="text-muted">05 Dec 2024</small></td>
        <td><span class="badge-status badge-active">In Practice</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Cultural Programs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CUL-2024-05</td>
        <td>
          <div class="fw-semibold text-dark">Annual Fine Arts & Sculpture Exhibition</div>
          <small class="text-muted font-size-11">Theme: 'Colors of India - Past & Future'</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Fine Arts</span></td>
        <td><small class="text-dark">Classes 1 to 12 (400 Artworks)</small></td>
        <td><small class="text-muted font-mono font-size-12">Central Art Gallery</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mr. A. K. Sundaram</span></td>
        <td><small class="text-muted">10 Dec 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Cultural Programs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CUL-2024-06</td>
        <td>
          <div class="fw-semibold text-dark">Hindi Kavyanjali (Poetry Recitation)</div>
          <small class="text-muted font-size-11">Self-Composed Patriotic & Social Verses</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Literary Hindi</span></td>
        <td><small class="text-dark">Middle & Secondary Wings</small></td>
        <td><small class="text-muted font-mono font-size-12">Seminar Room 102</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. K. L. Sharma</span></td>
        <td><small class="text-muted">26 Nov 2024</small></td>
        <td><span class="badge-status badge-active">Auditions Open</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Cultural Programs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CUL-2024-07</td>
        <td>
          <div class="fw-semibold text-dark">Christmas Carol Celebration & Candlelight</div>
          <small class="text-muted font-size-11">Traditional 80-Voice Choir Ensemble</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Vocal Choir</span></td>
        <td><small class="text-dark">Pre-Primary & Primary Wings</small></td>
        <td><small class="text-muted font-mono font-size-12">Main School Hall</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mrs. Shalini Verma</span></td>
        <td><small class="text-muted">24 Dec 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Cultural Programs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CUL-2024-08</td>
        <td>
          <div class="fw-semibold text-dark">Inter-House Spell Bee & Word Power</div>
          <small class="text-muted font-size-11">Oxford English Master Spelling Tournament</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Literary English</span></td>
        <td><small class="text-dark">Primary Wing (Classes 3-5)</small></td>
        <td><small class="text-muted font-mono font-size-12">AV Room 2</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mrs. Reena Sengupta</span></td>
        <td><small class="text-muted">03 Dec 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Cultural Programs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
