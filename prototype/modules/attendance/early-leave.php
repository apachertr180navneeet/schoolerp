<?php
/**
 * EDUSYS PRO - EARLY LEAVE REGISTER
 * Dedicated operational interface & records management for Early Leave Register
 */
$page_title = "Early Leave Register";
$page_desc = "Escorted early departures, infirmary doctor clearances, parent identity verification, and gate pass dispatch";
$active_module = "attendance";
$active_submodule = "early-leave.php";
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
    <h1><i class="bi bi-box-arrow-left text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'early-leave_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-box-arrow-right me-1"></i> Issue Early Exit Slip
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Early Exits Today</h6>
        <div class="kpi-value">6 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Authorized Parental Escort</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-dash-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Infirmary Clearances</h6>
        <div class="kpi-value">4 Cases</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> High Fever / Sprain Handled</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-hospital-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Parent ID Verified</h6>
        <div class="kpi-value">100% Biometric</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> RFID / Photo ID Match</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-lock-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Coordinator Sanction</h6>
        <div class="kpi-value">100% Signed</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Principal Office Intimated</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-pencil-square"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search exit slip #, student name, class, escort...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Exit Reasons</option>
      <option >Infirmary Medical Recommendation</option>
      <option >Urgent Family Emergency</option>
      <option >Inter-School Sports Deputation</option>
      <option >Documented Doctor Appointment</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Exit Cleared & Logged</option>
      <option >In Infirmary Awaiting Parent</option>
      <option >Dispatched</option>
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
        <th>Gate Exit Pass #</th>
        <th>Student Full Name</th>
        <th>Grade & Section</th>
        <th>Escort / Parent Name</th>
        <th>Relationship & ID Verified</th>
        <th>Exit Reason (Medical/Family)</th>
        <th>Authorized By</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EXP-2024-0006</td>
        <td>
          <div class="fw-semibold text-dark">Prisha Nair</div>
          <small class="text-muted font-size-11">Adm #014</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Commerce</span></td>
        <td><small class="text-dark">Gopalan Nair</small></td>
        <td><small class="text-muted font-mono font-size-12">Father (Aadhaar Verified)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">High Fever & Nausea (Infirmary Slip)</span></td>
        <td><small class="text-muted">Dr. Sunita Kapoor & Vice Principal</small></td>
        <td><span class="badge-status badge-active">Exit Cleared</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Early Leave Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EXP-2024-0005</td>
        <td>
          <div class="fw-semibold text-dark">Arya Deshmukh</div>
          <small class="text-muted font-size-11">Adm #015</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Section A</span></td>
        <td><small class="text-dark">Sunil Deshmukh</small></td>
        <td><small class="text-muted font-mono font-size-12">Father (Aadhaar Verified)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Sprained Ankle during P.Ed Class</span></td>
        <td><small class="text-muted">Infirmary Sister & Class Teacher</small></td>
        <td><span class="badge-status badge-active">Exit Cleared</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Early Leave Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EXP-2024-0004</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Mehta</div>
          <small class="text-muted font-size-11">Adm #007</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 3 - Primary</span></td>
        <td><small class="text-dark">Rakesh Mehta</small></td>
        <td><small class="text-muted font-mono font-size-12">Father (Aadhaar Verified)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Severe Stomach Cramps</span></td>
        <td><small class="text-muted">Primary Wing Head</small></td>
        <td><span class="badge-status badge-active">Exit Cleared</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Early Leave Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EXP-2024-0003</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Adm #003</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">Col. D. S. Pratap</small></td>
        <td><small class="text-muted font-mono font-size-12">School Sports Coach Escort</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">CBSE Zonal Athletics Meet Deputation</span></td>
        <td><small class="text-muted">Sports HOD & Principal</small></td>
        <td><span class="badge-status badge-active">Exit Cleared</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Early Leave Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EXP-2024-0002</td>
        <td>
          <div class="fw-semibold text-dark">Zara Khan</div>
          <small class="text-muted font-size-11">Adm #018</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Humanities</span></td>
        <td><small class="text-dark">Tariq Khan</small></td>
        <td><small class="text-muted font-mono font-size-12">Father (Aadhaar Verified)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pre-Scheduled Dental Surgery</span></td>
        <td><small class="text-muted">Senior Secondary Coordinator</small></td>
        <td><span class="badge-status badge-active">Exit Cleared</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Early Leave Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EXP-2024-0001</td>
        <td>
          <div class="fw-semibold text-dark">Ayaan Sen</div>
          <small class="text-muted font-size-11">Adm #019</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 1 - Prep</span></td>
        <td><small class="text-dark">Debashis Sen</small></td>
        <td><small class="text-muted font-mono font-size-12">Father (Aadhaar Verified)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mild Allergic Reaction (Observation)</span></td>
        <td><small class="text-muted">Infirmary Doctor</small></td>
        <td><span class="badge-status badge-active">Exit Cleared</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Early Leave Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EXP-2024-0000</td>
        <td>
          <div class="fw-semibold text-dark">Meera Nambiar</div>
          <small class="text-muted font-size-11">Adm #007</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 8 - Section C</span></td>
        <td><small class="text-dark">Radhika Nambiar</small></td>
        <td><small class="text-muted font-mono font-size-12">Mother (Aadhaar Verified)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Passport Office Document Appointment</span></td>
        <td><small class="text-muted">Middle Wing Head</small></td>
        <td><span class="badge-status badge-active">Exit Cleared</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Early Leave Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EXP-2023-0142</td>
        <td>
          <div class="fw-semibold text-dark">Tushar Sengupta</div>
          <small class="text-muted font-size-11">Adm #1412</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 8 - Section B</span></td>
        <td><small class="text-dark">Subhash Sengupta</small></td>
        <td><small class="text-muted font-mono font-size-12">Father (Aadhaar Verified)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Family Overseas Visa Interview</span></td>
        <td><small class="text-muted">Principal Office</small></td>
        <td><span class="badge-status badge-active">Archived</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Early Leave Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
