<?php
/**
 * EDUSYS PRO - BOARD AND CLASS MAPPING
 * Dedicated operational interface & records management for Board and Class Mapping
 */
$page_title = "Board and Class Mapping";
$page_desc = "Statutory board affiliations, official examination codes, subject groups, and List of Candidates (LOC) registers";
$active_module = "academics";
$active_submodule = "board-mapping.php";
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
    <h1><i class="bi bi-diagram-3-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'board-mapping_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Map Class to Board
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Board Affiliation</h6>
        <div class="kpi-value">CBSE Central</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Affiliation No: 2130892</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-patch-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>School Code (CBSE)</h6>
        <div class="kpi-value">Code: 70142</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Delhi Region Examination</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-building-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Board Classes</h6>
        <div class="kpi-value">Class 10 & 12</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> AISSE & AISSCE Ready</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-award"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>LOC Candidates</h6>
        <div class="kpi-value">420 Registered</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> 100% Fees Reconciled</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search mapping UID, class, board, exam code...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Board Classes</option>
      <option >Class 10 (AISSE Board Exam)</option>
      <option >Class 12 (AISSCE Board Exam)</option>
      <option >Class 9 (CBSE Mandatory Reg)</option>
      <option >Class 11 (CBSE Mandatory Reg)</option>
      <option >Classes 1-8 (NCF Progressive)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >LOC Approved & Sealed</option>
      <option >Registration Open</option>
      <option >Draft</option>
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
        <th>Mapping UID</th>
        <th>Academic Class / Grade</th>
        <th>Affiliated Board</th>
        <th>Board Examination Code</th>
        <th>Subject Scheme</th>
        <th>Passing Criteria</th>
        <th>LOC Batch #</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAP-CL10-CBSE</td>
        <td>
          <div class="fw-semibold text-dark">Class 10 (Secondary)</div>
          <small class="text-muted font-size-11">AISSE 2025 Board Batch</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">CBSE (Central Board)</span></td>
        <td><small class="text-dark">CBSE-AISSE-10</small></td>
        <td><small class="text-muted font-mono font-size-12">5 Compulsory + 1 Skill Subject</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">33% in Theory & Pract Combined</span></td>
        <td><small class="text-muted">LOC-2024-CL10-240</small></td>
        <td><span class="badge-status badge-active">Sealed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Board and Class Mapping')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAP-CL12-PCM</td>
        <td>
          <div class="fw-semibold text-dark">Class 12 - Science (PCM)</div>
          <small class="text-muted font-size-11">AISSCE 2025 Board Batch</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">CBSE (Central Board)</span></td>
        <td><small class="text-dark">CBSE-AISSCE-12-PCM</small></td>
        <td><small class="text-muted font-mono font-size-12">English, Physics, Chem, Math, CS</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">33% Separately in Theory & Pract</span></td>
        <td><small class="text-muted">LOC-2024-CL12-070</small></td>
        <td><span class="badge-status badge-active">Sealed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Board and Class Mapping')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAP-CL12-PCB</td>
        <td>
          <div class="fw-semibold text-dark">Class 12 - Science (PCB)</div>
          <small class="text-muted font-size-11">AISSCE 2025 Board Batch</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">CBSE (Central Board)</span></td>
        <td><small class="text-dark">CBSE-AISSCE-12-PCB</small></td>
        <td><small class="text-muted font-mono font-size-12">English, Physics, Chem, Bio, P.Ed</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">33% Separately in Theory & Pract</span></td>
        <td><small class="text-muted">LOC-2024-CL12-040</small></td>
        <td><span class="badge-status badge-active">Sealed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Board and Class Mapping')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAP-CL12-COMM</td>
        <td>
          <div class="fw-semibold text-dark">Class 12 - Commerce</div>
          <small class="text-muted font-size-11">AISSCE 2025 Board Batch</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">CBSE (Central Board)</span></td>
        <td><small class="text-dark">CBSE-AISSCE-12-COM</small></td>
        <td><small class="text-muted font-mono font-size-12">English, Accountancy, BST, Eco, Math</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">33% Separately in Theory & Pract</span></td>
        <td><small class="text-muted">LOC-2024-CL12-040</small></td>
        <td><span class="badge-status badge-active">Sealed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Board and Class Mapping')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAP-CL12-HUM</td>
        <td>
          <div class="fw-semibold text-dark">Class 12 - Humanities</div>
          <small class="text-muted font-size-11">AISSCE 2025 Board Batch</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">CBSE (Central Board)</span></td>
        <td><small class="text-dark">CBSE-AISSCE-12-HUM</small></td>
        <td><small class="text-muted font-mono font-size-12">English, History, Pol Sci, Psych, Eco</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">33% Separately in Theory & Pract</span></td>
        <td><small class="text-muted">LOC-2024-CL12-030</small></td>
        <td><span class="badge-status badge-active">Sealed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Board and Class Mapping')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAP-CL09-CBSE</td>
        <td>
          <div class="fw-semibold text-dark">Class 9 (Secondary Reg)</div>
          <small class="text-muted font-size-11">CBSE 9th Registration Batch</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">CBSE (Central Board)</span></td>
        <td><small class="text-dark">CBSE-REG-09</small></td>
        <td><small class="text-muted font-mono font-size-12">Pre-Board 5 Compulsory Subjects</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">33% Overall Pass in Annual Exam</span></td>
        <td><small class="text-muted">REG-2024-CL09-280</small></td>
        <td><span class="badge-status badge-active">Sealed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Board and Class Mapping')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAP-CL11-CBSE</td>
        <td>
          <div class="fw-semibold text-dark">Class 11 (Senior Sec Reg)</div>
          <small class="text-muted font-size-11">CBSE 11th Registration Batch</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">CBSE (Central Board)</span></td>
        <td><small class="text-dark">CBSE-REG-11</small></td>
        <td><small class="text-muted font-mono font-size-12">Stream-wise 5 Elective Subjects</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">33% Separately in Theory & Pract</span></td>
        <td><small class="text-muted">REG-2024-CL11-200</small></td>
        <td><span class="badge-status badge-active">Sealed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Board and Class Mapping')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAP-CL08-NCF</td>
        <td>
          <div class="fw-semibold text-dark">Classes 6 to 8 (Middle)</div>
          <small class="text-muted font-size-11">Progressive School Evaluation</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">CBSE / NCF Middle</span></td>
        <td><small class="text-dark">NCF-MID-6-8</small></td>
        <td><small class="text-muted font-mono font-size-12">Three Languages + Math, Sci, Social</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Continuous & Comprehensive Eval</span></td>
        <td><small class="text-muted">SCH-MID-680</small></td>
        <td><span class="badge-status badge-active">Sealed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Board and Class Mapping')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
