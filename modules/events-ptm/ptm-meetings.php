<?php
/**
 * EDUSYS PRO - PARENT-TEACHER MEETINGS (PTM)
 * Dedicated operational interface & records management for Parent-Teacher Meetings (PTM)
 */
$page_title = "Parent-Teacher Meetings (PTM)";
$page_desc = "Formal PTM sessions calendar, parent attendance ratios, academic review agendas, and room assignments";
$active_module = "events-ptm";
$active_submodule = "ptm-meetings.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'ptm-meetings_export.csv')" title="Export Table as CSV">
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
        <h6>Average PTM Turnout</h6>
        <div class="kpi-value">94.2%</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 1,390 of 1,482 Families</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Next PTM Round</h6>
        <div class="kpi-value">29 Nov 2024</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Comprehensive Term 1 PTM</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-event-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Board Batch Coverage</h6>
        <div class="kpi-value">100%</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Cl 10 & 12 Consultations</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-patch-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Parent Satisfaction</h6>
        <div class="kpi-value">4.8 / 5.0</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Post-PTM Survey Score</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-star-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search PTM session code, wing, meeting theme...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All PTM Sessions</option>
      <option >Comprehensive Term-End PTM</option>
      <option >Pre-Board Diagnostic Consultations</option>
      <option >Remedial & Subject Intervention</option>
      <option >Early Years Developmental Review</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Slots Open for Booking</option>
      <option >Upcoming This Week</option>
      <option >Completed</option>
      <option >Archived</option>
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
        <th>PTM Code</th>
        <th>PTM Meeting Session</th>
        <th>Applicable Wings</th>
        <th>Scheduled Date & Time</th>
        <th>Total Slots</th>
        <th>Booked %</th>
        <th>Supervising Dean</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PTM-2024-04</td>
        <td>
          <div class="fw-semibold text-dark">Term 1 Comprehensive Academic PTM</div>
          <small class="text-muted font-size-11">Report Card Handover & Progress Review</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">All Wings (Nursery to Cl 12)</span></td>
        <td><small class="text-dark">29 Nov 2024 (08:30 AM - 01:30 PM)</small></td>
        <td><small class="text-muted font-mono font-size-12">1,480 Slots</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">93.2% Booked</span></td>
        <td><small class="text-muted">Dr. Ananya Roy (Principal)</small></td>
        <td><span class="badge-status badge-active">Slots Open</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent-Teacher Meetings (PTM)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PTM-2024-03</td>
        <td>
          <div class="fw-semibold text-dark">Class 10 & 12 Pre-Board Diagnostic PTM</div>
          <small class="text-muted font-size-11">CBSE LOC Performance Strategy</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary & Secondary</span></td>
        <td><small class="text-dark">08 Nov 2024 (08:30 AM - 01:30 PM)</small></td>
        <td><small class="text-muted font-mono font-size-12">420 Slots</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">98.5% Booked</span></td>
        <td><small class="text-muted">Dean Academics</small></td>
        <td><span class="badge-status badge-active">Upcoming</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent-Teacher Meetings (PTM)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PTM-2024-02</td>
        <td>
          <div class="fw-semibold text-dark">Mid-Term Academic Remedial PTM</div>
          <small class="text-muted font-size-11">Specialized Student Academic Intervention</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Middle Wing (Classes 6-8)</span></td>
        <td><small class="text-dark">18 Oct 2024 (09:00 AM - 12:30 PM)</small></td>
        <td><small class="text-muted font-mono font-size-12">240 Slots</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">95.0% Attended</span></td>
        <td><small class="text-muted">Middle Wing Head</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent-Teacher Meetings (PTM)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PTM-2024-01</td>
        <td>
          <div class="fw-semibold text-dark">Early Years Foundation PTM (Nursery/Prep)</div>
          <small class="text-muted font-size-11">Motor Skills & Social Development</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pre-Primary Wing</span></td>
        <td><small class="text-dark">28 Sep 2024 (08:30 AM - 12:00 PM)</small></td>
        <td><small class="text-muted font-mono font-size-12">180 Slots</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">96.2% Attended</span></td>
        <td><small class="text-muted">Pre-Primary Coordinator</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent-Teacher Meetings (PTM)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PTM-2024-05</td>
        <td>
          <div class="fw-semibold text-dark">Class 11 Stream Assessment & Career PTM</div>
          <small class="text-muted font-size-11">JEE/NEET/CUET Integration Guidance</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 (PCM/PCB/Commerce)</span></td>
        <td><small class="text-dark">13 Dec 2024 (09:00 AM - 01:00 PM)</small></td>
        <td><small class="text-muted font-mono font-size-12">280 Slots</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">58.0% Booked</span></td>
        <td><small class="text-muted">Career Counseling Cell</small></td>
        <td><span class="badge-status badge-active">Slots Open</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent-Teacher Meetings (PTM)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PTM-2024-06</td>
        <td>
          <div class="fw-semibold text-dark">Primary School Language & Math Milestone</div>
          <small class="text-muted font-size-11">Foundational Literacy & Numeracy Review</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 1 to 5</span></td>
        <td><small class="text-dark">10 Jan 2025 (08:30 AM - 01:30 PM)</small></td>
        <td><small class="text-muted font-mono font-size-12">480 Slots</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">25.0% Booked</span></td>
        <td><small class="text-muted">Primary Wing Head</small></td>
        <td><span class="badge-status badge-pending">Upcoming</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent-Teacher Meetings (PTM)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PTM-2024-07</td>
        <td>
          <div class="fw-semibold text-dark">Pre-Board 2 Intensive Board PTM</div>
          <small class="text-muted font-size-11">Final Board Hall Ticket Advisory</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 10 & 12 Only</span></td>
        <td><small class="text-dark">24 Jan 2025 (08:30 AM - 01:30 PM)</small></td>
        <td><small class="text-muted font-mono font-size-12">420 Slots</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Awaiting Booking</span></td>
        <td><small class="text-muted">Dean Academics</small></td>
        <td><span class="badge-status badge-pending">Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent-Teacher Meetings (PTM)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PTM-2024-08</td>
        <td>
          <div class="fw-semibold text-dark">Annual Cumulative Result PTM 2024-25</div>
          <small class="text-muted font-size-11">Promotion to Next Grade & Book Lists</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">All Grades (Nursery to 11)</span></td>
        <td><small class="text-dark">22 Mar 2025 (08:30 AM - 02:00 PM)</small></td>
        <td><small class="text-muted font-mono font-size-12">1,480 Slots</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Awaiting Booking</span></td>
        <td><small class="text-muted">Principal & Deans</small></td>
        <td><span class="badge-status badge-pending">Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent-Teacher Meetings (PTM)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
