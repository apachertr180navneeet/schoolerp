<?php
/**
 * EDUSYS PRO - STUDENT LEAVE APPLICATIONS
 * Dedicated operational interface & records management for Student Leave Applications
 */
$page_title = "Student Leave Applications";
$page_desc = "Formal parental leave submissions, medical certificates, long leave tracking, and class teacher approvals";
$active_module = "attendance";
$active_submodule = "student-leaves.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/attendance/dashboard.php'); ?>">Attendance Management</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-envelope-paper-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'student-leaves_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-envelope-plus me-1"></i> Submit Leave Request
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Active Applications</h6>
        <div class="kpi-value">14 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Medical & Family Sabbatical</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-envelope-open-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Medical Certificates</h6>
        <div class="kpi-value">11 Validated</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Doctor Prescriptions Filed</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-file-medical-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Average Duration</h6>
        <div class="kpi-value">3.4 Days</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Excused Absence Status</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar2-range"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Pending Sanction</h6>
        <div class="kpi-value">3 Requests</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Class Teacher Review</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-hourglass-split"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search app ref #, student name, class, category...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Categories</option>
      <option >Medical Leave (Doctor Slip)</option>
      <option >Planned Family Sabbatical</option>
      <option >Religious / Festival Observance</option>
      <option >Bereavement / Compassionate</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Approved & Excused</option>
      <option >Pending Teacher Sign</option>
      <option >Rejected</option>
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
        <th>App Ref #</th>
        <th>Student Full Name</th>
        <th>Grade & Section</th>
        <th>Leave Category</th>
        <th>From Date</th>
        <th>To Date</th>
        <th>Days Count</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LEV-STU-0014</td>
        <td>
          <div class="fw-semibold text-dark">Karan Saxena</div>
          <small class="text-muted font-size-11">Adm #2491</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Section C</span></td>
        <td><small class="text-dark">Medical Leave (Viral Fever)</small></td>
        <td><small class="text-muted font-mono font-size-12">26 Oct 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">30 Oct 2024</span></td>
        <td><small class="text-muted">5 Days (Cert Attached)</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Leave Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LEV-STU-0013</td>
        <td>
          <div class="fw-semibold text-dark">Siddharth Rawat</div>
          <small class="text-muted font-size-11">Adm #9481</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Commerce</span></td>
        <td><small class="text-dark">Family Wedding Out of Station</small></td>
        <td><small class="text-muted font-mono font-size-12">28 Oct 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">31 Oct 2024</span></td>
        <td><small class="text-muted">4 Days (Parent Slip)</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Leave Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LEV-STU-0012</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Saxena</div>
          <small class="text-muted font-size-11">Adm #4921</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 7 - Middle</span></td>
        <td><small class="text-dark">Medical Leave (Dental Procedure)</small></td>
        <td><small class="text-muted font-mono font-size-12">29 Oct 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">30 Oct 2024</span></td>
        <td><small class="text-muted">2 Days (Cert Attached)</small></td>
        <td><span class="badge-status badge-pending">Pending Review</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Leave Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LEV-STU-0011</td>
        <td>
          <div class="fw-semibold text-dark">Varun Dhawan</div>
          <small class="text-muted font-size-11">Adm #3920</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Commerce</span></td>
        <td><small class="text-dark">National Tennis Tour Deputation</small></td>
        <td><small class="text-muted font-mono font-size-12">24 Oct 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">02 Nov 2024</span></td>
        <td><small class="text-muted">10 Days (Sports Letter)</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Leave Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LEV-STU-0010</td>
        <td>
          <div class="fw-semibold text-dark">Shraddha Kapoor</div>
          <small class="text-muted font-size-11">Adm #1940</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 5 - Primary</span></td>
        <td><small class="text-dark">Medical Leave (Flu & Cold)</small></td>
        <td><small class="text-muted font-mono font-size-12">27 Oct 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">29 Oct 2024</span></td>
        <td><small class="text-muted">3 Days (Pediatrician Slip)</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Leave Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LEV-STU-0009</td>
        <td>
          <div class="fw-semibold text-dark">Aditya Roy Kapur</div>
          <small class="text-muted font-size-11">Adm #9482</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Secondary</span></td>
        <td><small class="text-dark">Family Religious Pilgrimage</small></td>
        <td><small class="text-muted font-mono font-size-12">28 Oct 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">01 Nov 2024</span></td>
        <td><small class="text-muted">5 Days (Parent Letter)</small></td>
        <td><span class="badge-status badge-pending">Pending Review</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Leave Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LEV-STU-0008</td>
        <td>
          <div class="fw-semibold text-dark">Kriti Sanon</div>
          <small class="text-muted font-size-11">Adm #1049</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Science</span></td>
        <td><small class="text-dark">Medical Leave (Migraine)</small></td>
        <td><small class="text-muted font-mono font-size-12">28 Oct 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">28 Oct 2024</span></td>
        <td><small class="text-muted">1 Day (Parent Intimation)</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Leave Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LEV-STU-0007</td>
        <td>
          <div class="fw-semibold text-dark">Pooja Hegde</div>
          <small class="text-muted font-size-11">Adm #1048</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 8 - Middle</span></td>
        <td><small class="text-dark">Family Relocation Transit</small></td>
        <td><small class="text-muted font-mono font-size-12">25 Oct 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">27 Oct 2024</span></td>
        <td><small class="text-muted">3 Days (Parent Letter)</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Leave Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
