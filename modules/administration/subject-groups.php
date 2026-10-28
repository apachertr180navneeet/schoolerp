<?php
/**
 * EDUSYS PRO - SUBJECT GROUPS
 * Dedicated operational interface & records management for Subject Groups
 */
$page_title = "Subject Groups";
$page_desc = "CBSE subject combinations, stream elective baskets, compulsory language pairs, and vocational electives";
$active_module = "administration";
$active_submodule = "subject-groups.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'subject-groups_export.csv')" title="Export Table as CSV">
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
        <h6>Subject Groups</h6>
        <div class="kpi-value">8 Combinations</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> CBSE Affiliated Baskets</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-layers-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Science Stream Combos</h6>
        <div class="kpi-value">2 Baskets</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> PCM & PCB Specialization</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-radioactive"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Commerce Combos</h6>
        <div class="kpi-value">2 Baskets</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> With & Without Applied Maths</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cash-coin"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Skill Electives</h6>
        <div class="kpi-value">4 NEP Vocational</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> AI, Financial Markets, Coding</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-laptop"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search group code, title, stream...">
    </div>
    <select class="form-select" style="max-width: 240px;">
      <option selected>All Stream Groups</option>
      <option >Senior Secondary Science (PCM/PCB)</option>
      <option >Senior Secondary Commerce</option>
      <option >Senior Secondary Humanities</option>
      <option >Secondary Core (9-10)</option>
      <option >Middle Wing Languages</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active Group</option>
      <option >Quota Full</option>
      <option >Open for Enrollment</option>
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
        <th>Group Code</th>
        <th>Subject Group Title</th>
        <th>Academic Wing / Stream</th>
        <th>Compulsory Core Subjects</th>
        <th>Elective Basket Options</th>
        <th>Max Capacity</th>
        <th>Enrolled</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">GRP-11-PCM</td>
        <td>
          <div class="fw-semibold text-dark">Senior Secondary Science (PCM Group)</div>
          <small class="text-muted font-size-11">Engineering & Physical Sciences Track</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">English Core, Physics, Chemistry, Mathematics</small></td>
        <td><small class="text-muted font-mono font-size-12">CS (083) / Physical Ed (048) / Economics (030)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">80 Students</span></td>
        <td><small class="text-muted">78 Enrolled</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Subject Groups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">GRP-11-PCB</td>
        <td>
          <div class="fw-semibold text-dark">Senior Secondary Science (PCB Group)</div>
          <small class="text-muted font-size-11">Medical & Life Sciences Track</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">English Core, Physics, Chemistry, Biology</small></td>
        <td><small class="text-muted font-mono font-size-12">Psychology (037) / Physical Ed (048) / Biotech (045)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">40 Students</span></td>
        <td><small class="text-muted">38 Enrolled</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Subject Groups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">GRP-11-COM1</td>
        <td>
          <div class="fw-semibold text-dark">Commerce with Applied Mathematics</div>
          <small class="text-muted font-size-11">Finance, Actuarial & Business Analytics</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">English Core, Accountancy, Business Studies, Economics</small></td>
        <td><small class="text-muted font-mono font-size-12">Applied Mathematics (241) / Computer Science</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">45 Students</span></td>
        <td><small class="text-muted">42 Enrolled</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Subject Groups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">GRP-11-COM2</td>
        <td>
          <div class="fw-semibold text-dark">Commerce with Entrepreneurship</div>
          <small class="text-muted font-size-11">Trade, Marketing & Corporate Track</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">English Core, Accountancy, Business Studies, Economics</small></td>
        <td><small class="text-muted font-mono font-size-12">Entrepreneurship (066) / Physical Education</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">45 Students</span></td>
        <td><small class="text-muted">40 Enrolled</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Subject Groups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">GRP-11-HUM</td>
        <td>
          <div class="fw-semibold text-dark">Humanities & Liberal Arts Basket</div>
          <small class="text-muted font-size-11">Civil Services, Law & Public Policy Track</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">English Core, History, Political Science, Economics</small></td>
        <td><small class="text-muted font-mono font-size-12">Psychology (037) / Sociology (039) / Legal Studies (074)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">40 Students</span></td>
        <td><small class="text-muted">36 Enrolled</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Subject Groups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">GRP-10-CBSE</td>
        <td>
          <div class="fw-semibold text-dark">Secondary Board Core Curriculum (Class 10)</div>
          <small class="text-muted font-size-11">Mandatory All-India Secondary Examination</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Secondary Wing</span></td>
        <td><small class="text-dark">English Lang, Hindi Course-A, Maths Std, Science, SST</small></td>
        <td><small class="text-muted font-mono font-size-12">Information Technology (402) / AI (417)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">180 Students</span></td>
        <td><small class="text-muted">180 Enrolled</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Subject Groups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">GRP-08-3LANG</td>
        <td>
          <div class="fw-semibold text-dark">Middle School 3-Language Formula (Class 8)</div>
          <small class="text-muted font-size-11">National Education Policy Language Grid</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Middle Wing</span></td>
        <td><small class="text-dark">English (1st Lang), Hindi (2nd Lang)</small></td>
        <td><small class="text-muted font-mono font-size-12">Sanskrit (022) / French (018) / German (020)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">140 Students</span></td>
        <td><small class="text-muted">140 Enrolled</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Subject Groups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">GRP-VOC-AI</td>
        <td>
          <div class="fw-semibold text-dark">NEP 2020 Vocational Skill Elective</div>
          <small class="text-muted font-size-11">Future Skills & Coding Foundation</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 9 to 12</span></td>
        <td><small class="text-dark">Artificial Intelligence (417), Data Science</small></td>
        <td><small class="text-muted font-mono font-size-12">Hand-on Lab Practicals in Atal Tinkering Lab</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">120 Students</span></td>
        <td><small class="text-muted">115 Enrolled</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Subject Groups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
