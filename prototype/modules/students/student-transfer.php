<?php
/**
 * EDUSYS PRO - STUDENT TRANSFER REGISTER
 * Dedicated operational interface & records management for Student Transfer Register
 */
$page_title = "Student Transfer Register";
$page_desc = "Internal section reallocations, stream switches, and branch-to-branch mobility audit logs";
$active_module = "students";
$active_submodule = "student-transfer.php";
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
    <h1><i class="bi bi-arrow-left-right text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'student-transfer_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Log Section Transfer
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Transfers Processed</h6>
        <div class="kpi-value">28 Scholars</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Session 2024-25</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-arrow-left-right"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Section Leveling</h6>
        <div class="kpi-value">18 Requests</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Balanced Classroom Ratios</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-columns-gap"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Stream Switch (Cl 11)</h6>
        <div class="kpi-value">6 Cases</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> PCM to Commerce / Hum</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-mortarboard"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Under Approval</h6>
        <div class="kpi-value">4 Requests</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> On Principal Desk</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-pen"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search transfer order #, student, old class, new class...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Transfer Types</option>
      <option >Internal Section Transfer</option>
      <option >Senior Secondary Stream Switch</option>
      <option >Branch to Branch Relocation</option>
      <option >Second Language Shift</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Approved & Completed</option>
      <option >Pending Principal Sanction</option>
      <option >Rejected / Ineligible</option>
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
        <th>Transfer Order #</th>
        <th>Student Full Name</th>
        <th>From Class / Section</th>
        <th>To Class / Section</th>
        <th>Reason for Transfer</th>
        <th>Approved By</th>
        <th>Effective Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TRN-2024-0028</td>
        <td>
          <div class="fw-semibold text-dark">Advait Singhal</div>
          <small class="text-muted font-size-11">Adm #1948</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section C</span></td>
        <td><small class="text-dark">Class 10 - Section A</small></td>
        <td><small class="text-muted font-mono font-size-12">Language Shift to French B</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. Ananya Roy (Principal)</span></td>
        <td><small class="text-muted">15 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Transfer Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TRN-2024-0027</td>
        <td>
          <div class="fw-semibold text-dark">Anushka Kulkarni</div>
          <small class="text-muted font-size-11">Adm #2014</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - PCM</span></td>
        <td><small class="text-dark">Class 11 - Commerce</small></td>
        <td><small class="text-muted font-mono font-size-12">Career Alignment to CA / Eco</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dean Academics</span></td>
        <td><small class="text-muted">10 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Transfer Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TRN-2024-0026</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Deshmukh</div>
          <small class="text-muted font-size-11">Adm #1842</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 8 - Section B</span></td>
        <td><small class="text-dark">Class 8 - Section D</small></td>
        <td><small class="text-muted font-mono font-size-12">Cohort Rebalance Request</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mrs. Shalini Verma</span></td>
        <td><small class="text-muted">05 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Transfer Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TRN-2024-0025</td>
        <td>
          <div class="fw-semibold text-dark">Pari Chawla</div>
          <small class="text-muted font-size-11">Adm #2491</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 6 - Section A</span></td>
        <td><small class="text-dark">Class 6 - Section C</small></td>
        <td><small class="text-muted font-mono font-size-12">Sibling Bus Route Optimization</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Transport & Admin Desk</span></td>
        <td><small class="text-muted">28 Sep 2024</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Transfer Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TRN-2024-0024</td>
        <td>
          <div class="fw-semibold text-dark">Dhruv Kapoor</div>
          <small class="text-muted font-size-11">Adm #1740</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - PCB</span></td>
        <td><small class="text-dark">Class 11 - PCM</small></td>
        <td><small class="text-muted font-mono font-size-12">Opted for Engineering JEE Track</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. Ananya Roy (Principal)</span></td>
        <td><small class="text-muted">20 Sep 2024</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Transfer Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TRN-2024-0023</td>
        <td>
          <div class="fw-semibold text-dark">Tanmay Bansal</div>
          <small class="text-muted font-size-11">Adm #2810</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Section B</span></td>
        <td><small class="text-dark">Class 9 - Section A</small></td>
        <td><small class="text-muted font-mono font-size-12">Remedial Cohort Allocation</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Secondary Wing Head</span></td>
        <td><small class="text-muted">15 Sep 2024</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Transfer Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TRN-2024-0022</td>
        <td>
          <div class="fw-semibold text-dark">Gauri Joshi</div>
          <small class="text-muted font-size-11">Adm #1980</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 7 - Section C</span></td>
        <td><small class="text-dark">Class 7 - Section B</small></td>
        <td><small class="text-muted font-mono font-size-12">Class Teacher Recommendation</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Middle Wing Head</span></td>
        <td><small class="text-muted">10 Sep 2024</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Transfer Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TRN-2024-0021</td>
        <td>
          <div class="fw-semibold text-dark">Manav Sethi</div>
          <small class="text-muted font-size-11">Adm #2204</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">Class 10 - Section A</small></td>
        <td><small class="text-muted font-mono font-size-12">Peer Learning Optimization</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dean Academics</span></td>
        <td><small class="text-muted">01 Sep 2024</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Transfer Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
