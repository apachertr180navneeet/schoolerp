<?php
/**
 * EDUSYS PRO - BONAFIDE CERTIFICATES
 * Dedicated operational interface & records management for Bonafide Certificates
 */
$page_title = "Bonafide Certificates";
$page_desc = "Official bonafide verification documents for passport, visa, bank accounts, and concession applications";
$active_module = "students";
$active_submodule = "bonafide-certificates.php";
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
    <h1><i class="bi bi-patch-check-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Certificate">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'bonafide-certificates_export.csv')" title="Export Registry">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-patch-plus-fill me-1"></i> Issue Bonafide Certificate
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Bonafides Issued</h6>
        <div class="kpi-value">384 Certificates</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Instant Print Ready</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-patch-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Passport & Visa</h6>
        <div class="kpi-value">182 Applications</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> MEA Format Compliant</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-passport"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Bank Minor Accounts</h6>
        <div class="kpi-value">124 Applications</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> RBI KYC Compliant</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-bank"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Fee Concession / Govt</h6>
        <div class="kpi-value">78 Applications</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Verified by Registrar</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-award"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search certificate #, student, father, purpose...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Certificate Purposes</option>
      <option >Passport Application (MEA)</option>
      <option >Student Visa / Foreign Travel</option>
      <option >Minor Bank Account Opening</option>
      <option >Metro / Bus Pass Concession</option>
      <option >Scholarship / Olympiad</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Issued & Validated</option>
      <option >In Processing</option>
      <option >Revoked</option>
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
        <th>Father Name</th>
        <th>Grade & Section</th>
        <th>Certificate Purpose</th>
        <th>Issued By</th>
        <th>Issue Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BNF-2024-0384</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Adm #001</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Rajesh Sharma</span></td>
        <td><small class="text-dark">Class 10 - Section A</small></td>
        <td><small class="text-muted font-mono font-size-12">Passport Renewal (MEA Format)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. Ananya Roy (Principal)</span></td>
        <td><small class="text-muted">28 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Bonafide Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BNF-2024-0383</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Adm #002</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Bhavin Patel</span></td>
        <td><small class="text-dark">Class 10 - Section A</small></td>
        <td><small class="text-muted font-mono font-size-12">UK Student Exchange Visa</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. Ananya Roy (Principal)</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Bonafide Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BNF-2024-0382</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Adm #003</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Manpreet Singh</span></td>
        <td><small class="text-dark">Class 10 - Section B</small></td>
        <td><small class="text-muted font-mono font-size-12">SBI Minor Savings Account</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Registrar Office</span></td>
        <td><small class="text-muted">26 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Bonafide Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BNF-2024-0381</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Adm #004</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">R. Venkatesh Iyer</span></td>
        <td><small class="text-dark">Class 10 - Section B</small></td>
        <td><small class="text-muted font-mono font-size-12">HDFC Minor Savings Account</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Registrar Office</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Bonafide Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BNF-2024-0380</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Adm #005</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Sanjay Gupta</span></td>
        <td><small class="text-dark">Class 12 - Science (PCM)</small></td>
        <td><small class="text-muted font-mono font-size-12">JEE Main Exam Verification</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dean Academics</span></td>
        <td><small class="text-muted">24 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Bonafide Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BNF-2024-0379</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Adm #006</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Dr. Alok Verma</span></td>
        <td><small class="text-dark">Class 12 - Science (PCB)</small></td>
        <td><small class="text-muted font-mono font-size-12">NEET UG Exam Verification</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dean Academics</span></td>
        <td><small class="text-muted">23 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Bonafide Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BNF-2024-0378</td>
        <td>
          <div class="fw-semibold text-dark">Meera Nambiar</div>
          <small class="text-muted font-size-11">Adm #007</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">K. R. Nambiar</span></td>
        <td><small class="text-dark">Class 8 - Section C</small></td>
        <td><small class="text-muted font-mono font-size-12">National Science Olympiad</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Registrar Office</span></td>
        <td><small class="text-muted">22 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Bonafide Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BNF-2024-0377</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Malhotra</div>
          <small class="text-muted font-size-11">Adm #008</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Vikram Malhotra</span></td>
        <td><small class="text-dark">Class 5 - Section A</small></td>
        <td><small class="text-muted font-mono font-size-12">Delhi Metro Student Pass Concession</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Registrar Office</span></td>
        <td><small class="text-muted">21 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Bonafide Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
