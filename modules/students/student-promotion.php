<?php
/**
 * EDUSYS PRO - STUDENT PROMOTION
 * Dedicated operational interface & records management for Student Promotion
 */
$page_title = "Student Promotion";
$page_desc = "Annual academic progression engine: Grade promotion criteria, detention logs, and grace marks validation";
$active_module = "students";
$active_submodule = "student-promotion.php";
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
    <h1><i class="bi bi-arrow-up-right-square-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'student-promotion_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-arrow-up-right-circle-fill me-1"></i> Run Promotion Batch
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Promoted to Next Grade</h6>
        <div class="kpi-value">2,780 Scholars</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 98.2% Promotion Rate</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-circle"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Promoted with Grace</h6>
        <div class="kpi-value">38 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Max 5 Marks as per CBSE</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-patch-exclamation-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Detained / Repeater</h6>
        <div class="kpi-value">22 Students</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Remedial Coaching Batch</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-exclamation-triangle-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Target Session</h6>
        <div class="kpi-value">2025-2026</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Batch Roster Pre-Allocated</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar2-check-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search promotion ID, student, class, verdict...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Promotion Verdicts</option>
      <option >Unconditional Promotion (Pass)</option>
      <option >Promoted with Grace Marks</option>
      <option >Compartment / Retest Needed</option>
      <option >Detained in Same Grade</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Promoted & Migrated</option>
      <option >Grace Applied</option>
      <option >Retest Scheduled</option>
      <option >Detained</option>
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
        <th>Promotion ID</th>
        <th>Student Full Name</th>
        <th>Current Class</th>
        <th>Annual Final Score</th>
        <th>Promotion Verdict</th>
        <th>Next Class Allocated</th>
        <th>Grace Marks</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRM-2024-0841</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Class 10-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Sec A</span></td>
        <td><small class="text-dark">94.6% (CGPA 9.8)</small></td>
        <td><small class="text-muted font-mono font-size-12">Unconditional Pass</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-muted">None (Direct)</small></td>
        <td><span class="badge-status badge-active">Promoted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Promotion')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRM-2024-0842</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Class 10-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Sec A</span></td>
        <td><small class="text-dark">96.2% (CGPA 10.0)</small></td>
        <td><small class="text-muted font-mono font-size-12">Unconditional Pass</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-muted">None (Direct)</small></td>
        <td><span class="badge-status badge-active">Promoted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Promotion')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRM-2024-0843</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Class 10-B</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Sec B</span></td>
        <td><small class="text-dark">88.4% (CGPA 9.2)</small></td>
        <td><small class="text-muted font-mono font-size-12">Unconditional Pass</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-muted">None (Direct)</small></td>
        <td><span class="badge-status badge-active">Promoted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Promotion')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRM-2024-0844</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Class 10-B</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Sec B</span></td>
        <td><small class="text-dark">91.8% (CGPA 9.5)</small></td>
        <td><small class="text-muted font-mono font-size-12">Unconditional Pass</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-muted">None (Direct)</small></td>
        <td><span class="badge-status badge-active">Promoted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Promotion')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRM-2024-0845</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Class 12 - PCM</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - PCM</span></td>
        <td><small class="text-dark">85.2% (Science Core)</small></td>
        <td><small class="text-muted font-mono font-size-12">Unconditional Pass</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-muted">None (Direct)</small></td>
        <td><span class="badge-status badge-active">Promoted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Promotion')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRM-2024-0846</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Class 12 - PCB</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - PCB</span></td>
        <td><small class="text-dark">83.6% (Medical Core)</small></td>
        <td><small class="text-muted font-mono font-size-12">Unconditional Pass</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Class 12 - Science (PCB)</span></td>
        <td><small class="text-muted">None (Direct)</small></td>
        <td><span class="badge-status badge-active">Promoted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Promotion')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRM-2024-0847</td>
        <td>
          <div class="fw-semibold text-dark">Meera Nambiar</div>
          <small class="text-muted font-size-11">Class 8-C</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 7 - Sec C</span></td>
        <td><small class="text-dark">97.0% (Grade A1)</small></td>
        <td><small class="text-muted font-mono font-size-12">Unconditional Pass</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Class 8 - Section C</span></td>
        <td><small class="text-muted">None (Direct)</small></td>
        <td><span class="badge-status badge-active">Promoted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Promotion')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRM-2024-0848</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Malhotra</div>
          <small class="text-muted font-size-11">Class 5-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 4 - Sec A</span></td>
        <td><small class="text-dark">92.4% (Grade A1)</small></td>
        <td><small class="text-muted font-mono font-size-12">Unconditional Pass</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Class 5 - Section A</span></td>
        <td><small class="text-muted">None (Direct)</small></td>
        <td><span class="badge-status badge-active">Promoted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Promotion')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
