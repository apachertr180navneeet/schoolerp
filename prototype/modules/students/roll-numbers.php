<?php
/**
 * EDUSYS PRO - ROLL NUMBER MANAGEMENT
 * Dedicated operational interface & records management for Roll Number Management
 */
$page_title = "Roll Number Management";
$page_desc = "Section-wise roll allocation algorithms: Alphabetical, admission date, or gender-separated sorting";
$active_module = "students";
$active_submodule = "roll-numbers.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/students/dashboard.php'); ?>">Student Information System</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-list-ol text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'roll-numbers_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-sort-numeric-down me-1"></i> Re-sequence Roll Nos
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Mapped Roll Numbers</h6>
        <div class="kpi-value">2,840 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Sequence Completed</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-square"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Sorting Standard</h6>
        <div class="kpi-value">Alphabetical (A-Z)</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> CBSE Exam Alignment</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-sort-alpha-down"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Board LOC Roll Nos</h6>
        <div class="kpi-value">420 Board Candidates</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> CBSE Roll 7-Digit Ready</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-award-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Exceptions Flagged</h6>
        <div class="kpi-value">0 Clashes</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Unique Per Section</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search roll no, student name, admission #, class...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Classes</option>
      <option >Class 10 - Section A</option>
      <option >Class 10 - Section B</option>
      <option >Class 12 - Science (PCM)</option>
      <option >Class 12 - Science (PCB)</option>
      <option >Class 8 - Section C</option>
      <option >Class 5 - Section A</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Confirmed Roll No</option>
      <option >Provisional</option>
      <option >Re-assigned</option>
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
        <th>Roll #</th>
        <th>Student Full Name</th>
        <th>Admission #</th>
        <th>Grade & Section</th>
        <th>Gender</th>
        <th>Alphabetical Rank</th>
        <th>Assigned Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Roll #01</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Class 10-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">ADM-2024-001</span></td>
        <td><small class="text-dark">Class 10 - Section A</small></td>
        <td><small class="text-muted font-mono font-size-12">Male</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Rank #1 in Section A</span></td>
        <td><small class="text-muted">01 Jul 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Roll Number Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Roll #02</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Class 10-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">ADM-2024-002</span></td>
        <td><small class="text-dark">Class 10 - Section A</small></td>
        <td><small class="text-muted font-mono font-size-12">Female</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Rank #2 in Section A</span></td>
        <td><small class="text-muted">01 Jul 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Roll Number Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Roll #01</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Class 10-B</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">ADM-2024-003</span></td>
        <td><small class="text-dark">Class 10 - Section B</small></td>
        <td><small class="text-muted font-mono font-size-12">Male</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Rank #1 in Section B</span></td>
        <td><small class="text-muted">01 Jul 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Roll Number Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Roll #02</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Class 10-B</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">ADM-2024-004</span></td>
        <td><small class="text-dark">Class 10 - Section B</small></td>
        <td><small class="text-muted font-mono font-size-12">Female</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Rank #2 in Section B</span></td>
        <td><small class="text-muted">01 Jul 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Roll Number Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Roll #05</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Class 12 - PCM</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">ADM-2024-005</span></td>
        <td><small class="text-dark">Class 12 - Science (PCM)</small></td>
        <td><small class="text-muted font-mono font-size-12">Male</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Rank #5 in PCM</span></td>
        <td><small class="text-muted">01 Jul 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Roll Number Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Roll #08</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Class 12 - PCB</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">ADM-2024-006</span></td>
        <td><small class="text-dark">Class 12 - Science (PCB)</small></td>
        <td><small class="text-muted font-mono font-size-12">Male</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Rank #8 in PCB</span></td>
        <td><small class="text-muted">01 Jul 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Roll Number Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Roll #14</td>
        <td>
          <div class="fw-semibold text-dark">Meera Nambiar</div>
          <small class="text-muted font-size-11">Class 8-C</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">ADM-2024-007</span></td>
        <td><small class="text-dark">Class 8 - Section C</small></td>
        <td><small class="text-muted font-mono font-size-12">Female</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Rank #14 in Section C</span></td>
        <td><small class="text-muted">01 Jul 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Roll Number Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Roll #11</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Malhotra</div>
          <small class="text-muted font-size-11">Class 5-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">ADM-2024-008</span></td>
        <td><small class="text-dark">Class 5 - Section A</small></td>
        <td><small class="text-muted font-mono font-size-12">Male</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Rank #11 in Section A</span></td>
        <td><small class="text-muted">01 Jul 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Roll Number Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
