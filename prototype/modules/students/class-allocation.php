<?php
/**
 * EDUSYS PRO - CLASS & SECTION ALLOCATION
 * Dedicated operational interface & records management for Class & Section Allocation
 */
$page_title = "Class & Section Allocation";
$page_desc = "Section cohort balancing, student-to-teacher capacity caps (40:1), and classroom room assignment";
$active_module = "students";
$active_submodule = "class-allocation.php";
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
    <h1><i class="bi bi-diagram-2-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'class-allocation_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Allocate Section
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Total Sections</h6>
        <div class="kpi-value">72 Active Sections</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Avg 39.4 Students / Sec</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-grid-3x3-gap-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Ideal Capacity Met</h6>
        <div class="kpi-value">98.5% Sections</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Max 40 Students (CBSE)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-all"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Class Teachers</h6>
        <div class="kpi-value">72 Appointed</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> 100% Mentors Assigned</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-workspace"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Pending Allocation</h6>
        <div class="kpi-value">0 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> All Scholars Placed</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search class, section, teacher, student...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Grades</option>
      <option >Class 12 - Senior Secondary</option>
      <option >Class 11 - Senior Secondary</option>
      <option >Class 10 - Secondary</option>
      <option >Class 9 - Secondary</option>
      <option >Classes 6–8 - Middle</option>
      <option >Classes 1–5 - Primary</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Allocated & Verified</option>
      <option >Section Transfer Req</option>
      <option >Provisional</option>
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
        <th>Allocation ID</th>
        <th>Student Full Name</th>
        <th>Academic Session</th>
        <th>Allocated Grade</th>
        <th>Section</th>
        <th>Class Teacher</th>
        <th>Classroom #</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ALC-2024-1048</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Adm #001</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">2024-2025</span></td>
        <td><small class="text-dark">Class 10</small></td>
        <td><small class="text-muted font-mono font-size-12">Section A (40 Students)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mrs. Sunita Kaul (PGT)</span></td>
        <td><small class="text-muted">Room #204 (Block A)</small></td>
        <td><span class="badge-status badge-active">Allocated</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class & Section Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ALC-2024-1049</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Adm #002</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">2024-2025</span></td>
        <td><small class="text-dark">Class 10</small></td>
        <td><small class="text-muted font-mono font-size-12">Section A (40 Students)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mrs. Sunita Kaul (PGT)</span></td>
        <td><small class="text-muted">Room #204 (Block A)</small></td>
        <td><span class="badge-status badge-active">Allocated</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class & Section Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ALC-2024-1050</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Adm #003</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">2024-2025</span></td>
        <td><small class="text-dark">Class 10</small></td>
        <td><small class="text-muted font-mono font-size-12">Section B (38 Students)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mr. Vikram Rathore</span></td>
        <td><small class="text-muted">Room #205 (Block A)</small></td>
        <td><span class="badge-status badge-active">Allocated</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class & Section Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ALC-2024-1051</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Adm #004</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">2024-2025</span></td>
        <td><small class="text-dark">Class 10</small></td>
        <td><small class="text-muted font-mono font-size-12">Section B (38 Students)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mr. Vikram Rathore</span></td>
        <td><small class="text-muted">Room #205 (Block A)</small></td>
        <td><span class="badge-status badge-active">Allocated</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class & Section Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ALC-2024-1052</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Adm #005</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">2024-2025</span></td>
        <td><small class="text-dark">Class 12 - Science</small></td>
        <td><small class="text-muted font-mono font-size-12">Section A - PCM (35 Students)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. K. L. Sharma</span></td>
        <td><small class="text-muted">Room #301 (Science Block)</small></td>
        <td><span class="badge-status badge-active">Allocated</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class & Section Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ALC-2024-1053</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Adm #006</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">2024-2025</span></td>
        <td><small class="text-dark">Class 12 - Science</small></td>
        <td><small class="text-muted font-mono font-size-12">Section B - PCB (32 Students)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mrs. Radhika Iyer</span></td>
        <td><small class="text-muted">Room #302 (Bio Block)</small></td>
        <td><span class="badge-status badge-active">Allocated</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class & Section Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ALC-2024-1054</td>
        <td>
          <div class="fw-semibold text-dark">Meera Nambiar</div>
          <small class="text-muted font-size-11">Adm #007</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">2024-2025</span></td>
        <td><small class="text-dark">Class 8</small></td>
        <td><small class="text-muted font-mono font-size-12">Section C (39 Students)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mr. Deepak Rawat</span></td>
        <td><small class="text-muted">Room #108 (Middle Block)</small></td>
        <td><span class="badge-status badge-active">Allocated</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class & Section Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ALC-2024-1055</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Malhotra</div>
          <small class="text-muted font-size-11">Adm #008</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">2024-2025</span></td>
        <td><small class="text-dark">Class 5</small></td>
        <td><small class="text-muted font-mono font-size-12">Section A (40 Students)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mrs. Shalini Verma</span></td>
        <td><small class="text-muted">Room #012 (Primary Block)</small></td>
        <td><span class="badge-status badge-active">Allocated</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class & Section Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
