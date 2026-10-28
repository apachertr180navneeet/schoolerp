<?php
/**
 * EDUSYS PRO - EXTRA CLASSES & OLYMPIADS
 * Dedicated operational interface & records management for Extra Classes & Olympiads
 */
$page_title = "Extra Classes & Olympiads";
$page_desc = "Advanced competitive examination mentoring: NTSE, IMO/NSO Olympiads, JEE/NEET foundational coaching";
$active_module = "academics";
$active_submodule = "extra-classes.php";
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
    <h1><i class="bi bi-trophy-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'extra-classes_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-trophy me-1"></i> Schedule Olympiad Batch
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Olympiad Scholars</h6>
        <div class="kpi-value">184 Candidates</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> High Aptitude Cohort</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-award-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Competitive Tracks</h6>
        <div class="kpi-value">6 Advanced Tracks</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> IMO, NSO, JEE, NEET, KVPY</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-trophy"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>National Ranks (Last Yr)</h6>
        <div class="kpi-value">14 Top 100</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Zonal & National Gold</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-star-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Weekend Sessions</h6>
        <div class="kpi-value">Saturday Mornings</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Special 3-Hour Masterclasses</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar2-week-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search olympiad batch, competition, grade, mentor...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Competitions</option>
      <option >International Mathematics Olympiad (IMO)</option>
      <option >National Science Olympiad (NSO)</option>
      <option >JEE Advanced Physics & Math</option>
      <option >NEET Medical Biology Sprint</option>
      <option >CBSE Science Exhibition Team</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active Coaching Batch</option>
      <option >Competition Registered</option>
      <option >Trial Shortlisted</option>
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
        <th>Olympiad Batch #</th>
        <th>Competition / Focus</th>
        <th>Grade Band</th>
        <th>Lead Mentor</th>
        <th>Selected Scholars</th>
        <th>Weekly Sessions</th>
        <th>Competition Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">OLY-IMO-10</td>
        <td>
          <div class="fw-semibold text-dark">International Math Olympiad (IMO Level 2)</div>
          <small class="text-muted font-size-11">Advanced Combinatorics & Number Theory</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 9 & 10</span></td>
        <td><small class="text-dark">Mrs. Sunita Kaul (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">28 Top Scholars</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Saturdays (08:00 - 10:30 AM)</span></td>
        <td><small class="text-muted">15 Dec 2024</small></td>
        <td><span class="badge-status badge-active">Active Coaching</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Extra Classes & Olympiads')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">OLY-NSO-12</td>
        <td>
          <div class="fw-semibold text-dark">National Science Olympiad (NSO Senior)</div>
          <small class="text-muted font-size-11">Advanced Physics & Chemistry</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 11 & 12</span></td>
        <td><small class="text-dark">Dr. K. L. Sharma & Team</small></td>
        <td><small class="text-muted font-mono font-size-12">35 Top Scholars</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Saturdays (08:00 - 11:00 AM)</span></td>
        <td><small class="text-muted">22 Dec 2024</small></td>
        <td><span class="badge-status badge-active">Active Coaching</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Extra Classes & Olympiads')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">OLY-JEE-12</td>
        <td>
          <div class="fw-semibold text-dark">IIT-JEE Advanced Problem Solving Sprint</div>
          <small class="text-muted font-size-11">Irodov Physics & Advanced Calculus</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - PCM</span></td>
        <td><small class="text-dark">Dr. K. L. Sharma (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">40 Aspirants</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mon/Wed/Fri (02:15 - 04:00 PM)</span></td>
        <td><small class="text-muted">Jan 2025 (JEE Main 1)</small></td>
        <td><span class="badge-status badge-active">Active Coaching</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Extra Classes & Olympiads')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">OLY-NEET-12</td>
        <td>
          <div class="fw-semibold text-dark">NEET Medical Rapid NCERT Sprint</div>
          <small class="text-muted font-size-11">High-yield Biology & Organic Chem</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - PCB</span></td>
        <td><small class="text-dark">Mrs. Radhika Iyer (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">32 Aspirants</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Tue/Thu/Sat (02:15 - 04:00 PM)</span></td>
        <td><small class="text-muted">May 2025 (NEET UG)</small></td>
        <td><span class="badge-status badge-active">Active Coaching</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Extra Classes & Olympiads')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">OLY-NTSE-10</td>
        <td>
          <div class="fw-semibold text-dark">National Talent Search (NTSE / State Aptitude)</div>
          <small class="text-muted font-size-11">Mental Ability (MAT) & Scholastic (SAT)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10</span></td>
        <td><small class="text-dark">Mrs. Shalini Verma & Team</small></td>
        <td><small class="text-muted font-mono font-size-12">30 Top Scholars</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Saturdays (08:30 - 11:30 AM)</span></td>
        <td><small class="text-muted">Nov 2024</small></td>
        <td><span class="badge-status badge-active">Active Coaching</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Extra Classes & Olympiads')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">OLY-ROBO-MID</td>
        <td>
          <div class="fw-semibold text-dark">World Robot Olympiad (WRO Innovation)</div>
          <small class="text-muted font-size-11">Autonomous EV Navigation Challenge</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 6 to 9 (ATL)</span></td>
        <td><small class="text-dark">Mr. Kunal Bansal (MCA)</small></td>
        <td><small class="text-muted font-mono font-size-12">12 Finalists (4 Teams)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Daily Lab Sessions</span></td>
        <td><small class="text-muted">08 Dec 2024</small></td>
        <td><span class="badge-status badge-active">Active Coaching</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Extra Classes & Olympiads')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">OLY-DEBATE-SR</td>
        <td>
          <div class="fw-semibold text-dark">National Parliamentary Debate Championship</div>
          <small class="text-muted font-size-11">Geopolitics, Economics, Ethics</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 10 to 12</span></td>
        <td><small class="text-dark">Mr. Deepak Rawat (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">8 Team Orators</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Saturdays (10:30 - 12:30 PM)</span></td>
        <td><small class="text-muted">18 Nov 2024</small></td>
        <td><span class="badge-status badge-active">Active Coaching</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Extra Classes & Olympiads')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">OLY-ASTR-MID</td>
        <td>
          <div class="fw-semibold text-dark">National Astronomy & Space Olympiad</div>
          <small class="text-muted font-size-11">Telescope Observation & Astrophysics</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 7 to 9</span></td>
        <td><small class="text-dark">Dr. K. L. Sharma (PGT)</small></td>
        <td><small class="text-muted font-mono font-size-12">22 Young Scientists</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Night Sky Camps & Sats</span></td>
        <td><small class="text-muted">10 Jan 2025</small></td>
        <td><span class="badge-status badge-active">Active Coaching</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Extra Classes & Olympiads')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
