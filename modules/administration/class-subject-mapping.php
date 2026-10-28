<?php
/**
 * EDUSYS PRO - CLASS-SUBJECT MAPPING
 * Dedicated operational interface & records management for Class-Subject Mapping
 */
$page_title = "Class-Subject Mapping";
$page_desc = "Curriculum allocation matrix: linking academic grades, CBSE subject codes, weekly period quotas, and lab hours";
$active_module = "administration";
$active_submodule = "class-subject-mapping.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/administration/school-profile.php'); ?>">Administration & Setup</a></li>
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
    <a href="<?php echo base_url('modules/administration/school-profile.php'); ?>" class="btn btn-light border" title="School Institutional Dossier">
      <i class="bi bi-building me-1"></i> Profile
    </a>
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'class-subject-mapping_export.csv')" title="Export Table as CSV">
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
        <h6>Mapped Subjects</h6>
        <div class="kpi-value">74 Allocations</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Curriculum Synchronized</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-diagram-3-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Mandatory Core</h6>
        <div class="kpi-value">42 Subjects</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Languages, Math, Science, SST</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-circle"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Elective Baskets</h6>
        <div class="kpi-value">18 Baskets</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Senior Sec Specializations</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-collection-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Lab Practical Subjects</h6>
        <div class="kpi-value">14 Subjects</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Physics, Chem, Bio, CS, AI</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-mortarboard"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search grade, subject code, subject title...">
    </div>
    <select class="form-select" style="max-width: 240px;">
      <option selected>All Grades</option>
      <option >Class 12 (Senior Secondary)</option>
      <option >Class 11 (Senior Secondary)</option>
      <option >Class 10 (Secondary)</option>
      <option >Class 9 (Secondary)</option>
      <option >Classes 6-8 (Middle Wing)</option>
      <option >Classes 1-5 (Primary Wing)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Mapped & Active</option>
      <option >Curriculum Approved</option>
      <option >Elective Choice</option>
      <option >Under Review</option>
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
        <th>Mapping Code</th>
        <th>Grade & Stream</th>
        <th>Subject Code & Name</th>
        <th>Subject Category</th>
        <th>Weekly Periods</th>
        <th>Theory / Lab Ratio</th>
        <th>HOD Faculty Incharge</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAP-12-042</td>
        <td>
          <div class="fw-semibold text-dark">Class 12 - Science (PCM)</div>
          <small class="text-muted font-size-11">Senior Secondary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">042 &bull; Physics (Theory & Lab)</span></td>
        <td><small class="text-dark">Mandatory Core</small></td>
        <td><small class="text-muted font-mono font-size-12">6 Periods / Week</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">70% Th + 30% Pr</span></td>
        <td><small class="text-muted">Dr. Alok Verma</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class-Subject Mapping')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAP-12-043</td>
        <td>
          <div class="fw-semibold text-dark">Class 12 - Science (PCM)</div>
          <small class="text-muted font-size-11">Senior Secondary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">043 &bull; Chemistry (Theory & Lab)</span></td>
        <td><small class="text-dark">Mandatory Core</small></td>
        <td><small class="text-muted font-mono font-size-12">6 Periods / Week</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">70% Th + 30% Pr</span></td>
        <td><small class="text-muted">Dr. Sunita Kapoor</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class-Subject Mapping')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAP-12-041</td>
        <td>
          <div class="fw-semibold text-dark">Class 12 - Science (PCM)</div>
          <small class="text-muted font-size-11">Senior Secondary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">041 &bull; Mathematics</span></td>
        <td><small class="text-dark">Mandatory Core</small></td>
        <td><small class="text-muted font-mono font-size-12">7 Periods / Week</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">80% Th + 20% Int</span></td>
        <td><small class="text-muted">Mr. Rajiv Narang</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class-Subject Mapping')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAP-12-083</td>
        <td>
          <div class="fw-semibold text-dark">Class 12 - Science (PCM)</div>
          <small class="text-muted font-size-11">Senior Secondary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">083 &bull; Computer Science (Python)</span></td>
        <td><small class="text-dark">Elective Basket A</small></td>
        <td><small class="text-muted font-mono font-size-12">5 Periods / Week</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">70% Th + 30% Pr</span></td>
        <td><small class="text-muted">Mr. Vikramaditya Sen</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class-Subject Mapping')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAP-12-055</td>
        <td>
          <div class="fw-semibold text-dark">Class 12 - Commerce</div>
          <small class="text-muted font-size-11">Senior Secondary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">055 &bull; Accountancy</span></td>
        <td><small class="text-dark">Mandatory Core</small></td>
        <td><small class="text-muted font-mono font-size-12">6 Periods / Week</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">80% Th + 20% Pr</span></td>
        <td><small class="text-muted">Mrs. Radhika Iyer</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class-Subject Mapping')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAP-10-086</td>
        <td>
          <div class="fw-semibold text-dark">Class 10 - Secondary</div>
          <small class="text-muted font-size-11">Secondary Wing</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">086 &bull; Science (Phy/Chem/Bio)</span></td>
        <td><small class="text-dark">Mandatory Core</small></td>
        <td><small class="text-muted font-mono font-size-12">7 Periods / Week</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">80% Th + 20% Int</span></td>
        <td><small class="text-muted">Dr. Alok Verma</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class-Subject Mapping')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAP-10-041</td>
        <td>
          <div class="fw-semibold text-dark">Class 10 - Secondary</div>
          <small class="text-muted font-size-11">Secondary Wing</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">041 &bull; Mathematics Standard</span></td>
        <td><small class="text-dark">Mandatory Core</small></td>
        <td><small class="text-muted font-mono font-size-12">7 Periods / Week</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">80% Th + 20% Int</span></td>
        <td><small class="text-muted">Mrs. Sunita Kaul</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class-Subject Mapping')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">MAP-08-018</td>
        <td>
          <div class="fw-semibold text-dark">Class 8 - Middle Wing</div>
          <small class="text-muted font-size-11">Middle Wing</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">018 &bull; French 3rd Language</span></td>
        <td><small class="text-dark">Language Elective</small></td>
        <td><small class="text-muted font-mono font-size-12">3 Periods / Week</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">80% Th + 20% Int</span></td>
        <td><small class="text-muted">Mr. Deepak Rawat</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class-Subject Mapping')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
