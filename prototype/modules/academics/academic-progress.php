<?php
/**
 * EDUSYS PRO - ACADEMIC PROGRESS
 * Dedicated operational interface & records management for Academic Progress
 */
$page_title = "Academic Progress";
$page_desc = "Holistic performance analytics, periodic test trends, subject-wise grade distributions, and student growth trajectories";
$active_module = "academics";
$active_submodule = "academic-progress.php";
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
    <h1><i class="bi bi-speedometer text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'academic-progress_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-file-earmark-bar-graph-fill me-1"></i> Generate Progress Report
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Scholars Evaluated</h6>
        <div class="kpi-value">2,840 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Mid-Term Examinations Done</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>School Average Aggregate</h6>
        <div class="kpi-value">84.2%</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Top Tier City Benchmark</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-graph-up"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Distinction Rate (75%+)</h6>
        <div class="kpi-value">78.5% Scholars</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> 2,230 in First Division</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-star-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>CBSE LOC 90%+ Aim</h6>
        <div class="kpi-value">410 Scholars</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Board Merit Roll Candidates</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-award-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search student, admission #, grade, trajectory...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Grades</option>
      <option >Class 10 - Secondary</option>
      <option >Class 12 - Senior Secondary</option>
      <option >Class 8 - Middle Wing</option>
      <option >Class 5 - Primary Wing</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Outstanding Growth</option>
      <option >Consistent High Performer</option>
      <option >Moderate Progress</option>
      <option >Needs Remedial</option>
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
        <th>Progress UID</th>
        <th>Student Full Name</th>
        <th>Grade & Section</th>
        <th>PT-1 Score</th>
        <th>Mid-Term Score</th>
        <th>PT-2 Score</th>
        <th>Overall Aggregate</th>
        <th>Academic Trajectory</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRG-2024-001</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Adm #001</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">92.0% (46/50)</small></td>
        <td><small class="text-muted font-mono font-size-12">94.6% (75.7/80)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">95.0% (47.5/50)</span></td>
        <td><small class="text-muted">94.2% (Grade A1)</small></td>
        <td><span class="badge-status badge-active">Consistent Top Tier</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Academic Progress')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRG-2024-002</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Adm #002</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">94.0% (47/50)</small></td>
        <td><small class="text-muted font-mono font-size-12">96.2% (77/80)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">96.5% (48.2/50)</span></td>
        <td><small class="text-muted">95.8% (Grade A1)</small></td>
        <td><span class="badge-status badge-active">Consistent Top Tier</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Academic Progress')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRG-2024-003</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Adm #003</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">84.0% (42/50)</small></td>
        <td><small class="text-muted font-mono font-size-12">88.4% (70.7/80)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">90.0% (45/50)</span></td>
        <td><small class="text-muted">88.2% (Grade A2)</small></td>
        <td><span class="badge-status badge-active">Upward Trajectory (+6%)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Academic Progress')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRG-2024-004</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Adm #004</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">88.0% (44/50)</small></td>
        <td><small class="text-muted font-mono font-size-12">91.8% (73.4/80)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">92.0% (46/50)</span></td>
        <td><small class="text-muted">91.2% (Grade A1)</small></td>
        <td><span class="badge-status badge-active">Consistent Top Tier</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Academic Progress')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRG-2024-005</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Adm #005</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-dark">82.0% (41/50)</small></td>
        <td><small class="text-muted font-mono font-size-12">85.2% (68.1/80)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">88.0% (44/50)</span></td>
        <td><small class="text-muted">85.6% (Grade A2)</small></td>
        <td><span class="badge-status badge-active">Upward Trajectory (+6%)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Academic Progress')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRG-2024-006</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Adm #006</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCB)</span></td>
        <td><small class="text-dark">80.0% (40/50)</small></td>
        <td><small class="text-muted font-mono font-size-12">83.6% (66.8/80)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">85.0% (42.5/50)</span></td>
        <td><small class="text-muted">83.4% (Grade A2)</small></td>
        <td><span class="badge-status badge-active">Consistent Progress</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Academic Progress')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRG-2024-007</td>
        <td>
          <div class="fw-semibold text-dark">Meera Nambiar</div>
          <small class="text-muted font-size-11">Adm #007</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 8 - Section C</span></td>
        <td><small class="text-dark">95.0% (47.5/50)</small></td>
        <td><small class="text-muted font-mono font-size-12">97.0% (77.6/80)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">97.5% (48.7/50)</span></td>
        <td><small class="text-muted">96.8% (Grade A1)</small></td>
        <td><span class="badge-status badge-active">Consistent Top Tier</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Academic Progress')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRG-2024-008</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Malhotra</div>
          <small class="text-muted font-size-11">Adm #008</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 5 - Section A</span></td>
        <td><small class="text-dark">90.0% (45/50)</small></td>
        <td><small class="text-muted font-mono font-size-12">92.4% (73.9/80)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">93.0% (46.5/50)</span></td>
        <td><small class="text-muted">92.1% (Grade A1)</small></td>
        <td><span class="badge-status badge-active">Consistent Top Tier</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Academic Progress')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
