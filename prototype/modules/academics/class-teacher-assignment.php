<?php
/**
 * EDUSYS PRO - CLASS TEACHER ASSIGNMENT
 * Dedicated operational interface & records management for Class Teacher Assignment
 */
$page_title = "Class Teacher Assignment";
$page_desc = "Section mentorship appointments, homeroom supervision, parent communication liaisons, and attendance custodians";
$active_module = "academics";
$active_submodule = "class-teacher-assignment.php";
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
    <h1><i class="bi bi-person-badge-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'class-teacher-assignment_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-person-plus-fill me-1"></i> Assign Class Teacher
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Class Teachers</h6>
        <div class="kpi-value">72 Appointed</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Sections Covered</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-badge"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Co-Class Teachers</h6>
        <div class="kpi-value">72 Appointed</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Junior Faculty Mentors</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Daily Homeroom</h6>
        <div class="kpi-value">07:30 - 07:45 AM</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Attendance & Value Assembly</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-clock-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>PTM Coordination</h6>
        <div class="kpi-value">100% Ready</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Parent Meeting Liaisons</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-chat-dots-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search grade, section, class teacher, room number...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Wings</option>
      <option >Secondary Wing (Classes 9-10)</option>
      <option >Senior Secondary (Classes 11-12)</option>
      <option >Middle Wing (Classes 6-8)</option>
      <option >Primary Wing (Classes 1-5)</option>
      <option >Pre-Primary (Nursery-Prep)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Appointed & Active</option>
      <option >Relief Required</option>
      <option >Leave Cover</option>
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
        <th>Assignment ID</th>
        <th>Grade & Section</th>
        <th>Class Teacher Appointed</th>
        <th>Designation</th>
        <th>Room Number</th>
        <th>Student Strength</th>
        <th>Co-Class Teacher</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CTA-10A</td>
        <td>
          <div class="fw-semibold text-dark">Class 10 - Section A</div>
          <small class="text-muted font-size-11">Secondary Homeroom</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mrs. Sunita Kaul</span></td>
        <td><small class="text-dark">PGT Mathematics</small></td>
        <td><small class="text-muted font-mono font-size-12">Room #204 (Block A)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">40 Students</span></td>
        <td><small class="text-muted">Mr. Deepak Rawat (English)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class Teacher Assignment')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CTA-10B</td>
        <td>
          <div class="fw-semibold text-dark">Class 10 - Section B</div>
          <small class="text-muted font-size-11">Secondary Homeroom</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mr. Vikram Rathore</span></td>
        <td><small class="text-dark">PGT Chemistry</small></td>
        <td><small class="text-muted font-mono font-size-12">Room #205 (Block A)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">38 Students</span></td>
        <td><small class="text-muted">Mrs. Shalini Verma (Social)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class Teacher Assignment')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CTA-12PCM</td>
        <td>
          <div class="fw-semibold text-dark">Class 12 - Science (PCM)</div>
          <small class="text-muted font-size-11">Senior Sec Homeroom</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Dr. K. L. Sharma</span></td>
        <td><small class="text-dark">PGT Senior Physics</small></td>
        <td><small class="text-muted font-mono font-size-12">Room #301 (Science Block)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">35 Students</span></td>
        <td><small class="text-muted">Mr. Kunal Bansal (CS)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class Teacher Assignment')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CTA-12PCB</td>
        <td>
          <div class="fw-semibold text-dark">Class 12 - Science (PCB)</div>
          <small class="text-muted font-size-11">Senior Sec Homeroom</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mrs. Radhika Iyer</span></td>
        <td><small class="text-dark">PGT Biology</small></td>
        <td><small class="text-muted font-mono font-size-12">Room #302 (Bio Block)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">32 Students</span></td>
        <td><small class="text-muted">Dr. Sunita Kapoor (Psych)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class Teacher Assignment')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CTA-12COM</td>
        <td>
          <div class="fw-semibold text-dark">Class 12 - Commerce</div>
          <small class="text-muted font-size-11">Senior Sec Homeroom</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mr. M. K. Chawla</span></td>
        <td><small class="text-dark">PGT Commerce</small></td>
        <td><small class="text-muted font-mono font-size-12">Room #304 (Comm Block)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">36 Students</span></td>
        <td><small class="text-muted">Mr. S. K. Rastogi (Maths)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class Teacher Assignment')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CTA-8C</td>
        <td>
          <div class="fw-semibold text-dark">Class 8 - Section C</div>
          <small class="text-muted font-size-11">Middle Homeroom</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mr. Deepak Rawat</span></td>
        <td><small class="text-dark">TGT English</small></td>
        <td><small class="text-muted font-mono font-size-12">Room #108 (Middle Block)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">39 Students</span></td>
        <td><small class="text-muted">Mrs. Pooja Hegde (Science)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class Teacher Assignment')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CTA-5A</td>
        <td>
          <div class="fw-semibold text-dark">Class 5 - Section A</div>
          <small class="text-muted font-size-11">Primary Homeroom</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mrs. Shalini Verma</span></td>
        <td><small class="text-dark">PRT Senior Teacher</small></td>
        <td><small class="text-muted font-mono font-size-12">Room #012 (Primary Block)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">40 Students</span></td>
        <td><small class="text-muted">Mrs. Ritu Sharma (PRT)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class Teacher Assignment')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CTA-NUR</td>
        <td>
          <div class="fw-semibold text-dark">Class 1 - Nursery A</div>
          <small class="text-muted font-size-11">Early Years Homeroom</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mrs. Pooja Hegde</span></td>
        <td><small class="text-dark">Early Childhood Specialist</small></td>
        <td><small class="text-muted font-mono font-size-12">Kindergarten Suite 1</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">28 Students</span></td>
        <td><small class="text-muted">Ms. Ananya Sen (Montessori)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Class Teacher Assignment')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
