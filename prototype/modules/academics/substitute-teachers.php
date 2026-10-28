<?php
/**
 * EDUSYS PRO - SUBSTITUTE TEACHERS
 * Dedicated operational interface & records management for Substitute Teachers
 */
$page_title = "Substitute Teachers";
$page_desc = "Automated staff absence coverage, relief period assignments, workload equity, and teacher push alerts";
$active_module = "academics";
$active_submodule = "substitute-teachers.php";
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
    <h1><i class="bi bi-person-switch text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'substitute-teachers_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-person-plus me-1"></i> Assign Substitution
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Absences Today</h6>
        <div class="kpi-value">4 Faculty on Leave</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Medical & Casual Leaves</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-x-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Periods Covered</h6>
        <div class="kpi-value">18 of 18 Periods</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 100% Zero Free Periods</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Automated SMS/App</h6>
        <div class="kpi-value">Sent to Faculty</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Within 30 Secs of Leave</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-bell-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Relief Balance</h6>
        <div class="kpi-value">Equitable Rota</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Max 1 Substitution / Teacher</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-sliders"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search absent teacher, substitute, period, class...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Substitution Logs</option>
      <option >Today's Active Substitutions</option>
      <option >Yesterday's Coverage</option>
      <option >Weekly Substitution Audit</option>
      <option >Monthly Department Summary</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Confirmed & Accepted</option>
      <option >In Progress</option>
      <option >Completed</option>
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
        <th>Sub Log #</th>
        <th>Absent Teacher</th>
        <th>Period # & Time</th>
        <th>Class & Section</th>
        <th>Substitute Teacher Assigned</th>
        <th>Subject Covered</th>
        <th>SMS / App Alert</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SUB-TODAY-01</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Meenakshi Soni (Hindi)</div>
          <small class="text-muted font-size-11">Casual Leave Today</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Period 2 (08:30 AM)</span></td>
        <td><small class="text-dark">Class 10 - Section A</small></td>
        <td><small class="text-muted font-mono font-size-12">Mr. Deepak Rawat (English)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">English Grammar & Reading Session</span></td>
        <td><small class="text-muted">Accepted via Mobile App</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Substitute Teachers')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SUB-TODAY-02</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Meenakshi Soni (Hindi)</div>
          <small class="text-muted font-size-11">Casual Leave Today</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Period 6 (12:15 PM)</span></td>
        <td><small class="text-dark">Class 10 - Section B</small></td>
        <td><small class="text-muted font-mono font-size-12">Mrs. Shalini Verma (Social)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Social Science Quiz & Map Work</span></td>
        <td><small class="text-muted">Accepted via Mobile App</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Substitute Teachers')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SUB-TODAY-03</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Kunal Bansal (CS)</div>
          <small class="text-muted font-size-11">Medical Leave (Fever)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Period 7 (12:55 PM)</span></td>
        <td><small class="text-dark">Class 12 - Science (PCM)</small></td>
        <td><small class="text-muted font-mono font-size-12">Dr. K. L. Sharma (Physics)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">JEE Physics Problem Solving Session</span></td>
        <td><small class="text-muted">Accepted via Mobile App</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Substitute Teachers')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SUB-TODAY-04</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Kunal Bansal (CS)</div>
          <small class="text-muted font-size-11">Medical Leave (Fever)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Period 8 (01:35 PM)</span></td>
        <td><small class="text-dark">Class 11 - Science (PCM)</small></td>
        <td><small class="text-muted font-mono font-size-12">Mrs. Sunita Kaul (Maths)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Calculus Doubt Clearing Desk</span></td>
        <td><small class="text-muted">Accepted via Mobile App</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Substitute Teachers')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SUB-TODAY-05</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Harish Chawla (Sports)</div>
          <small class="text-muted font-size-11">Inter-School Tournament</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Period 3 (09:30 AM)</span></td>
        <td><small class="text-dark">Class 8 - Section C</small></td>
        <td><small class="text-muted font-mono font-size-12">Mr. S. K. Rastogi (Maths)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Indoor Chess & Mental Math Drills</span></td>
        <td><small class="text-muted">Accepted via Mobile App</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Substitute Teachers')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SUB-TODAY-06</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Anjali Saxena (Commerce)</div>
          <small class="text-muted font-size-11">Official Duty</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Period 4 (10:15 AM)</span></td>
        <td><small class="text-dark">Class 11 - Commerce</small></td>
        <td><small class="text-muted font-mono font-size-12">Mr. M. K. Chawla (Accounts)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Business Studies Case Studies</span></td>
        <td><small class="text-muted">Accepted via Mobile App</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Substitute Teachers')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SUB-TODAY-07</td>
        <td>
          <div class="fw-semibold text-dark">Ms. Kavita Joshi (PRT)</div>
          <small class="text-muted font-size-11">Half-Day Leave</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Period 5 (11:35 AM)</span></td>
        <td><small class="text-dark">Class 4 - Section A</small></td>
        <td><small class="text-muted font-mono font-size-12">Mrs. Ritu Sharma (PRT)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Science Activity Demonstration</span></td>
        <td><small class="text-muted">Accepted via Mobile App</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Substitute Teachers')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SUB-TODAY-08</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Sunita Kapoor (Psych)</div>
          <small class="text-muted font-size-11">Counselling Workshop</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Period 6 (12:15 PM)</span></td>
        <td><small class="text-dark">Class 12 - Humanities</small></td>
        <td><small class="text-muted font-mono font-size-12">Mrs. Radhika Iyer (Bio)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Career Guidance & Research Discussion</span></td>
        <td><small class="text-muted">Accepted via Mobile App</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Substitute Teachers')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
