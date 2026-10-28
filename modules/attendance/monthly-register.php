<?php
/**
 * EDUSYS PRO - MONTHLY ATTENDANCE REGISTER
 * Dedicated operational interface & records management for Monthly Attendance Register
 */
$page_title = "Monthly Attendance Register";
$page_desc = "CBSE statutory monthly attendance ledger: Total working days, days present, sanctioned leaves, and percentages";
$active_module = "attendance";
$active_submodule = "monthly-register.php";
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
    <h1><i class="bi bi-calendar3 text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'monthly-register_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-file-earmark-spreadsheet-fill me-1"></i> Export Monthly Register
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Register Month</h6>
        <div class="kpi-value">October 2024</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Working Days: 22 Days</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-month-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>School Average %</h6>
        <div class="kpi-value">96.4% in October</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> +0.8% Month on Month</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-graph-up-arrow"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>100% Attendance</h6>
        <div class="kpi-value">1,420 Scholars</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Eligible for Star Badge</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-star-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Chronic Absentee</h6>
        <div class="kpi-value">6 Students (<70%)</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Parent Intimations Dispatched</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-exclamation-octagon-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search student, admission #, roll #, class, %...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Classes</option>
      <option >Class 10 - Section A</option>
      <option >Class 10 - Section B</option>
      <option >Class 12 - Science (PCM)</option>
      <option >Class 12 - Science (PCB)</option>
      <option >Class 8 - Section C</option>
      <option >Class 5 - Section A</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Eligible (>75%)</option>
      <option >Exemplary (95-100%)</option>
      <option >Board Warning (<75%)</option>
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
        <th>Roll #</th>
        <th>Student Full Name</th>
        <th>Grade & Section</th>
        <th>Total Working Days</th>
        <th>Days Present</th>
        <th>Days Absent</th>
        <th>Approved Leaves</th>
        <th>Monthly %</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Roll #01</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Adm #001</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">22 Working Days</small></td>
        <td><small class="text-muted font-mono font-size-12">22 Days Present</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">0 Days Absent</span></td>
        <td><small class="text-muted">0 Days Leave</small></td>
        <td><span class="badge-status badge-active">100.0% (Star)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Monthly Attendance Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Roll #02</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Adm #002</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">22 Working Days</small></td>
        <td><small class="text-muted font-mono font-size-12">22 Days Present</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">0 Days Absent</span></td>
        <td><small class="text-muted">0 Days Leave</small></td>
        <td><span class="badge-status badge-active">100.0% (Star)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Monthly Attendance Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Roll #01</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Adm #003</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">22 Working Days</small></td>
        <td><small class="text-muted font-mono font-size-12">21 Days Present</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">0 Days Absent</span></td>
        <td><small class="text-muted">1 Day Sports OD</small></td>
        <td><span class="badge-status badge-active">100.0% (Exemplary)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Monthly Attendance Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Roll #02</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Adm #004</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">22 Working Days</small></td>
        <td><small class="text-muted font-mono font-size-12">21 Days Present</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">1 Day Absent</span></td>
        <td><small class="text-muted">0 Days Leave</small></td>
        <td><span class="badge-status badge-active">95.4%</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Monthly Attendance Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Roll #05</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Adm #005</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-dark">22 Working Days</small></td>
        <td><small class="text-muted font-mono font-size-12">20 Days Present</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">1 Day Absent</span></td>
        <td><small class="text-muted">1 Day Medical</small></td>
        <td><span class="badge-status badge-active">95.4%</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Monthly Attendance Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Roll #08</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Adm #006</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCB)</span></td>
        <td><small class="text-dark">22 Working Days</small></td>
        <td><small class="text-muted font-mono font-size-12">21 Days Present</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">1 Day Absent</span></td>
        <td><small class="text-muted">0 Days Leave</small></td>
        <td><span class="badge-status badge-active">95.4%</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Monthly Attendance Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Roll #24</td>
        <td>
          <div class="fw-semibold text-dark">Karan Saxena</div>
          <small class="text-muted font-size-11">Adm #2491</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Section C</span></td>
        <td><small class="text-dark">22 Working Days</small></td>
        <td><small class="text-muted font-mono font-size-12">16 Days Present</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">1 Day Unexcused</span></td>
        <td><small class="text-muted">5 Days Medical Leave</small></td>
        <td><span class="badge-status badge-pending">72.7% (Risk)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Monthly Attendance Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">Roll #14</td>
        <td>
          <div class="fw-semibold text-dark">Meera Nambiar</div>
          <small class="text-muted font-size-11">Adm #007</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 8 - Section C</span></td>
        <td><small class="text-dark">22 Working Days</small></td>
        <td><small class="text-muted font-mono font-size-12">22 Days Present</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">0 Days Absent</span></td>
        <td><small class="text-muted">0 Days Leave</small></td>
        <td><span class="badge-status badge-active">100.0% (Star)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Monthly Attendance Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
