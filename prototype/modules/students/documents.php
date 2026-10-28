<?php
/**
 * EDUSYS PRO - STUDENT DOCUMENTS LOCKER
 * Dedicated operational interface & records management for Student Documents Locker
 */
$page_title = "Student Documents Locker";
$page_desc = "Encrypted document depository: Birth certificates, Aadhaar UIDAI, transfer certificates, and CBSE LOC filings";
$active_module = "students";
$active_submodule = "documents.php";
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
    <h1><i class="bi bi-folder-symlink-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'documents_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-cloud-arrow-up-fill me-1"></i> Upload Student Document
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Total Documents</h6>
        <div class="kpi-value">11,360 Files</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 4 Documents / Student</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-folder2-open"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>DigiLocker Synced</h6>
        <div class="kpi-value">94.8% Verified</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Govt API Connected</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-lock-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Storage Consumed</h6>
        <div class="kpi-value">84.2 GB</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> AWS S3 Vault Encrypted</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-hdd-network-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Pending Physical Audit</h6>
        <div class="kpi-value">14 Dossiers</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Staff Room Inspection</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-clock-history"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search document UID, student name, category, format...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Document Types</option>
      <option >Birth Certificate (MCD/Municipal)</option>
      <option >Aadhaar Card (UIDAI)</option>
      <option >Previous School TC (Original)</option>
      <option >Medical Fitness Certificate</option>
      <option >Category / Caste Certificate</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Verified & Sealed</option>
      <option >DigiLocker Synced</option>
      <option >In Review</option>
      <option >Rejected / Re-upload</option>
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
        <th>Doc UID</th>
        <th>Student Full Name</th>
        <th>Document Category</th>
        <th>File Format & Size</th>
        <th>DigiLocker / APAAR Sync</th>
        <th>Verification Officer</th>
        <th>Upload Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DOC-STU-001A</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Class 10-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Municipal Birth Certificate</span></td>
        <td><small class="text-dark">PDF (1.2 MB)</small></td>
        <td><small class="text-muted font-mono font-size-12">Synced with DigiLocker</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Rohan Vashisht (Registrar)</span></td>
        <td><small class="text-muted">15 Apr 2024</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Documents Locker')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DOC-STU-001B</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Class 10-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Aadhaar Card (UIDAI)</span></td>
        <td><small class="text-dark">PDF (840 KB)</small></td>
        <td><small class="text-muted font-mono font-size-12">UIDAI e-KYC Verified</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Rohan Vashisht (Registrar)</span></td>
        <td><small class="text-muted">15 Apr 2024</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Documents Locker')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DOC-STU-002A</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Class 10-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Previous School TC (Counter-Signed)</span></td>
        <td><small class="text-dark">PDF (2.1 MB)</small></td>
        <td><small class="text-muted font-mono font-size-12">Physical Copy in Vault</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Sunil Joshi (Admin)</span></td>
        <td><small class="text-muted">18 Apr 2024</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Documents Locker')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DOC-STU-003A</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Class 10-B</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Defense Dependent Certificate</span></td>
        <td><small class="text-dark">PDF (1.4 MB)</small></td>
        <td><small class="text-muted font-mono font-size-12">Army Welfare Endorsed</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Sunil Joshi (Admin)</span></td>
        <td><small class="text-muted">20 Apr 2024</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Documents Locker')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DOC-STU-004A</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Class 10-B</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pediatric Fitness & Vaccine Card</span></td>
        <td><small class="text-dark">PDF (920 KB)</small></td>
        <td><small class="text-muted font-mono font-size-12">Infirmary Verified</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. Sunita Kapoor</span></td>
        <td><small class="text-muted">22 Apr 2024</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Documents Locker')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DOC-STU-005A</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Class 12 - PCM</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">CBSE Class 10 Board Marks Statement</span></td>
        <td><small class="text-dark">PDF (1.8 MB)</small></td>
        <td><small class="text-muted font-mono font-size-12">DigiLocker API Verified</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Registrar Office</span></td>
        <td><small class="text-muted">10 Jul 2023</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Documents Locker')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DOC-STU-006A</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Class 12 - PCB</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">OBC Non-Creamy Layer Certificate</span></td>
        <td><small class="text-dark">PDF (1.5 MB)</small></td>
        <td><small class="text-muted font-mono font-size-12">Revenue Dept Verified</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Rohan Vashisht (Registrar)</span></td>
        <td><small class="text-muted">12 Jul 2023</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Documents Locker')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DOC-STU-007A</td>
        <td>
          <div class="fw-semibold text-dark">Meera Nambiar</div>
          <small class="text-muted font-size-11">Class 8-C</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Transfer Certificate (ICSE to CBSE)</span></td>
        <td><small class="text-dark">PDF (2.4 MB)</small></td>
        <td><small class="text-muted font-mono font-size-12">Counter-Signed by Insp.</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Sunil Joshi (Admin)</span></td>
        <td><small class="text-muted">24 Apr 2024</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Documents Locker')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
