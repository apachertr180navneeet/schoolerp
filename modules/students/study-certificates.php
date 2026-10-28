<?php
/**
 * EDUSYS PRO - STUDY CERTIFICATES
 * Dedicated operational interface & records management for Study Certificates
 */
$page_title = "Study Certificates";
$page_desc = "Institutional tenure verification, medium of instruction certification, and CBSE board validation";
$active_module = "students";
$active_submodule = "study-certificates.php";
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
    <h1><i class="bi bi-mortarboard-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Certificate">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'study-certificates_export.csv')" title="Export Registry">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-file-earmark-medical me-1"></i> Issue Study Certificate
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Certificates Dispatched</h6>
        <div class="kpi-value">192 Documents</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Current & Past Scholars</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-mortarboard"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Medium of Instruction</h6>
        <div class="kpi-value">100% English</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> CBSE English Medium</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-translate"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Domicile & Govt Quotas</h6>
        <div class="kpi-value">94 Applications</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Certified for State Exams</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-flag-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Verification Turnaround</h6>
        <div class="kpi-value">Same Day</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Instant Digital Signature</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-lightning-charge-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search study certificate #, student, years, class...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Tenure Ranges</option>
      <option >Enrolled 1 to 3 Years</option>
      <option >Enrolled 4 to 7 Years</option>
      <option >Full Tenure (Nursery to 12th)</option>
      <option >Single Academic Year</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Issued & Validated</option>
      <option >In Verification</option>
      <option >Draft</option>
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
        <th>Certificate #</th>
        <th>Student Full Name</th>
        <th>Father / Guardian</th>
        <th>Class Duration</th>
        <th>Medium of Instruction</th>
        <th>Board Registration</th>
        <th>Issue Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">STD-2024-0192</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Adm #001</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Rajesh Sharma</span></td>
        <td><small class="text-dark">Class 1 to Class 10 (10 Years)</small></td>
        <td><small class="text-muted font-mono font-size-12">English Medium (CBSE)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">CBSE Reg: 2130892/24</span></td>
        <td><small class="text-muted">28 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Study Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">STD-2024-0191</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Adm #002</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Bhavin Patel</span></td>
        <td><small class="text-dark">Class 6 to Class 10 (5 Years)</small></td>
        <td><small class="text-muted font-mono font-size-12">English Medium (CBSE)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">CBSE Reg: 2130892/25</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Study Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">STD-2024-0190</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Adm #003</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Manpreet Singh</span></td>
        <td><small class="text-dark">Class 9 to Class 10 (2 Years)</small></td>
        <td><small class="text-muted font-mono font-size-12">English Medium (CBSE)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">CBSE Reg: 2130892/26</span></td>
        <td><small class="text-muted">26 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Study Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">STD-2024-0189</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Adm #004</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">R. Venkatesh Iyer</span></td>
        <td><small class="text-dark">Class 4 to Class 10 (7 Years)</small></td>
        <td><small class="text-muted font-mono font-size-12">English Medium (CBSE)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">CBSE Reg: 2130892/27</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Study Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">STD-2024-0188</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Adm #005</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Sanjay Gupta</span></td>
        <td><small class="text-dark">Class 11 to Class 12 (2 Years)</small></td>
        <td><small class="text-muted font-mono font-size-12">English Medium (CBSE)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">CBSE Reg: 2130892/28</span></td>
        <td><small class="text-muted">24 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Study Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">STD-2024-0187</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Adm #006</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Dr. Alok Verma</span></td>
        <td><small class="text-dark">Class 11 to Class 12 (2 Years)</small></td>
        <td><small class="text-muted font-mono font-size-12">English Medium (CBSE)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">CBSE Reg: 2130892/29</span></td>
        <td><small class="text-muted">23 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Study Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">STD-2024-0186</td>
        <td>
          <div class="fw-semibold text-dark">Meera Nambiar</div>
          <small class="text-muted font-size-11">Adm #007</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">K. R. Nambiar</span></td>
        <td><small class="text-dark">Class 8 (1 Year)</small></td>
        <td><small class="text-muted font-mono font-size-12">English Medium (CBSE)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">CBSE Reg: 2130892/30</span></td>
        <td><small class="text-muted">22 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Study Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">STD-2024-0185</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Malhotra</div>
          <small class="text-muted font-size-11">Adm #008</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Vikram Malhotra</span></td>
        <td><small class="text-dark">Nursery to Class 5 (6 Years)</small></td>
        <td><small class="text-muted font-mono font-size-12">English Medium (CBSE)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">School Code: 70142</span></td>
        <td><small class="text-muted">21 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Study Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
