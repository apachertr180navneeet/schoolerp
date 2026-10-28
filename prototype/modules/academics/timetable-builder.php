<?php
/**
 * EDUSYS PRO - TIMETABLE BUILDER
 * Dedicated operational interface & records management for Timetable Builder
 */
$page_title = "Timetable Builder";
$page_desc = "Automated clash-free schedule scheduling engine: Faculty workloads, lab blocks, room constraints, and recess cycles";
$active_module = "academics";
$active_submodule = "timetable-builder.php";
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
    <h1><i class="bi bi-calendar3-week text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'timetable-builder_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-cpu me-1"></i> Generate Timetable Matrix
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Schedule Matrix</h6>
        <div class="kpi-value">72 Sections Built</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Zero Clash Detected</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-all"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Weekly Periods</h6>
        <div class="kpi-value">576 Slots</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 8 Periods / Working Day</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-clock-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Lab Double Blocks</h6>
        <div class="kpi-value">144 Scheduled</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Physics, Chem, Bio, CS</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-tools"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Algorithm Efficiency</h6>
        <div class="kpi-value">99.8% Optimized</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Balanced Teacher Workload</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cpu-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search matrix ID, wing, cycle, status...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Timetable Cycles</option>
      <option >Senior Secondary (11-12) Cycle</option>
      <option >Secondary Wing (9-10) Cycle</option>
      <option >Middle Wing (6-8) Cycle</option>
      <option >Primary Wing (1-5) Cycle</option>
      <option >Pre-Primary Activity Cycle</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active & Published</option>
      <option >Draft / Regeneration</option>
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
        <th>Matrix ID</th>
        <th>Academic Wing / Class</th>
        <th>Timetable Cycle</th>
        <th>Total Working Days</th>
        <th>Periods Per Day</th>
        <th>Zero Clashes Verified</th>
        <th>Published Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TTM-2024-SR</td>
        <td>
          <div class="fw-semibold text-dark">Senior Secondary (Classes 11-12)</div>
          <small class="text-muted font-size-11">Science, Commerce, Hum</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Monday to Saturday (6 Days)</span></td>
        <td><small class="text-dark">6 Working Days</small></td>
        <td><small class="text-muted font-mono font-size-12">8 Periods (45m each)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Verified (0 Clashes)</span></td>
        <td><small class="text-muted">28 Jun 2024</small></td>
        <td><span class="badge-status badge-active">Live Published</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Timetable Builder')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TTM-2024-SEC</td>
        <td>
          <div class="fw-semibold text-dark">Secondary Wing (Classes 9-10)</div>
          <small class="text-muted font-size-11">Core CBSE 5-Subject</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Monday to Saturday (6 Days)</span></td>
        <td><small class="text-dark">6 Working Days</small></td>
        <td><small class="text-muted font-mono font-size-12">8 Periods (45m each)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Verified (0 Clashes)</span></td>
        <td><small class="text-muted">28 Jun 2024</small></td>
        <td><span class="badge-status badge-active">Live Published</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Timetable Builder')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TTM-2024-MID</td>
        <td>
          <div class="fw-semibold text-dark">Middle Wing (Classes 6-8)</div>
          <small class="text-muted font-size-11">Three Languages & Skills</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Monday to Friday (5 Days)</span></td>
        <td><small class="text-dark">5 Working Days</small></td>
        <td><small class="text-muted font-mono font-size-12">8 Periods (45m each)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Verified (0 Clashes)</span></td>
        <td><small class="text-muted">29 Jun 2024</small></td>
        <td><span class="badge-status badge-active">Live Published</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Timetable Builder')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TTM-2024-PRI</td>
        <td>
          <div class="fw-semibold text-dark">Primary Wing (Classes 1-5)</div>
          <small class="text-muted font-size-11">Foundation Core</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Monday to Friday (5 Days)</span></td>
        <td><small class="text-dark">5 Working Days</small></td>
        <td><small class="text-muted font-mono font-size-12">7 Periods (40m each)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Verified (0 Clashes)</span></td>
        <td><small class="text-muted">29 Jun 2024</small></td>
        <td><span class="badge-status badge-active">Live Published</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Timetable Builder')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TTM-2024-EYFS</td>
        <td>
          <div class="fw-semibold text-dark">Pre-Primary Wing (Nursery-Prep)</div>
          <small class="text-muted font-size-11">Activity & Play Cycles</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Monday to Friday (5 Days)</span></td>
        <td><small class="text-dark">5 Working Days</small></td>
        <td><small class="text-muted font-mono font-size-12">5 Sessions (30m each)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Verified (0 Clashes)</span></td>
        <td><small class="text-muted">30 Jun 2024</small></td>
        <td><span class="badge-status badge-active">Live Published</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Timetable Builder')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TTM-2024-EXAM</td>
        <td>
          <div class="fw-semibold text-dark">Half-Yearly Exam Special Cycle</div>
          <small class="text-muted font-size-11">Morning Exam + Revision</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Special 10-Day Exam Routine</span></td>
        <td><small class="text-dark">10 Exam Days</small></td>
        <td><small class="text-muted font-mono font-size-12">3-Hour Exam + 1 Revision</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Verified (0 Clashes)</span></td>
        <td><small class="text-muted">10 Sep 2024</small></td>
        <td><span class="badge-status badge-active">Archived</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Timetable Builder')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TTM-2024-LABS</td>
        <td>
          <div class="fw-semibold text-dark">Senior Secondary Composite Labs</div>
          <small class="text-muted font-size-11">Block Period Laboratory</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Afternoon Practical Rota</span></td>
        <td><small class="text-dark">6 Working Days</small></td>
        <td><small class="text-muted font-mono font-size-12">2-Period Block Sessions</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Verified (0 Clashes)</span></td>
        <td><small class="text-muted">01 Jul 2024</small></td>
        <td><span class="badge-status badge-active">Live Published</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Timetable Builder')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TTM-2024-SPORTS</td>
        <td>
          <div class="fw-semibold text-dark">Games & Physical Education Rota</div>
          <small class="text-muted font-size-11">Ground & Pool Allocation</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Morning & Evening Cycles</span></td>
        <td><small class="text-dark">6 Working Days</small></td>
        <td><small class="text-muted font-mono font-size-12">2 Periods / Class / Wk</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Verified (0 Clashes)</span></td>
        <td><small class="text-muted">01 Jul 2024</small></td>
        <td><span class="badge-status badge-active">Live Published</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Timetable Builder')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
