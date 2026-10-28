<?php
/**
 * EDUSYS PRO - DOCUMENT VERIFICATION
 * Dedicated operational interface & records management for Document Verification
 */
$page_title = "Document Verification";
$page_desc = "Mandatory statutory CBSE compliance: Birth certificate, Aadhaar/APAAR ID, TC, and medical fitness records";
$active_module = "admissions";
$active_submodule = "document-verification.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/admissions/dashboard.php'); ?>">Admission Management</a></li>
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
    <a href="<?php echo base_url('modules/admissions/dashboard.php'); ?>" class="btn btn-light border" title="Back to Admissions Command Center">
      <i class="bi bi-speedometer2 me-1"></i> Dashboard
    </a>
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'document-verification_export.csv')" title="Export Table as CSV">
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
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Verified Dossiers</h6>
        <div class="kpi-value">410 Complete</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% CBSE Statutory</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>APAAR IDs Linked</h6>
        <div class="kpi-value">398 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> MoE One Nation One ID</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-fingerprint"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Pending School TC</h6>
        <div class="kpi-value">14 Candidates</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Counter-Signed Awaited</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-file-earmark-medical-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Medical Fitness Logs</h6>
        <div class="kpi-value">402 Verified</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Pediatric Form Filed</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-heart-pulse-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search document ID, candidate name, APAAR #...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Verification Status</option>
      <option >Fully Verified (Clear)</option>
      <option >Transfer Certificate Pending</option>
      <option >Medical Record Incomplete</option>
      <option >Address Proof Resubmit</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Verified</option>
      <option >Pending TC</option>
      <option >Medical Form Due</option>
      <option >Flagged</option>
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
        <th>Verification ID</th>
        <th>Candidate Full Name</th>
        <th>Target Grade</th>
        <th>Birth Cert UID</th>
        <th>APAAR / Aadhaar UID</th>
        <th>Previous TC Status</th>
        <th>Verifying Officer</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DOC-2025-0412</td>
        <td>
          <div class="fw-semibold text-dark">Advik Agarwal</div>
          <small class="text-muted font-size-11">Pre-Primary Wing</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 1 - Nursery</span></td>
        <td><small class="text-dark">MCD/B-2021/94821</small></td>
        <td><small class="text-muted font-mono font-size-12">APAAR: 8492 1048 2910</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">N/A (Fresh Admission)</span></td>
        <td><small class="text-muted">Rohan Vashisht (Registrar)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Document Verification')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DOC-2025-0411</td>
        <td>
          <div class="fw-semibold text-dark">Saanvi Reddy</div>
          <small class="text-muted font-size-11">Middle Wing</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 6 - Middle</span></td>
        <td><small class="text-dark">GHMC/2013/84920</small></td>
        <td><small class="text-muted font-mono font-size-12">APAAR: 4892 3910 4821</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Counter-Signed TC #4910</span></td>
        <td><small class="text-muted">Rohan Vashisht (Registrar)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Document Verification')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DOC-2025-0410</td>
        <td>
          <div class="fw-semibold text-dark">Reyansh Joshi</div>
          <small class="text-muted font-size-11">Senior Secondary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Science (PCM)</span></td>
        <td><small class="text-dark">NDMC/2008/10492</small></td>
        <td><small class="text-muted font-mono font-size-12">APAAR: 1948 2910 4829</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Awaited from DPS (Exp 30 Oct)</span></td>
        <td><small class="text-muted">Sunil Joshi (Verification)</small></td>
        <td><span class="badge-status badge-pending">Pending TC</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Document Verification')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DOC-2025-0409</td>
        <td>
          <div class="fw-semibold text-dark">Prisha Nair</div>
          <small class="text-muted font-size-11">Senior Secondary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Commerce</span></td>
        <td><small class="text-dark">MCGM/2008/49201</small></td>
        <td><small class="text-muted font-mono font-size-12">APAAR: 9482 1049 3920</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Verified Original TC #841</span></td>
        <td><small class="text-muted">Rohan Vashisht (Registrar)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Document Verification')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DOC-2025-0408</td>
        <td>
          <div class="fw-semibold text-dark">Arya Deshmukh</div>
          <small class="text-muted font-size-11">Secondary Wing</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Secondary</span></td>
        <td><small class="text-dark">PMC/2010/84920</small></td>
        <td><small class="text-muted font-mono font-size-12">APAAR: 3910 4829 1048</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Verified Original TC #204</span></td>
        <td><small class="text-muted">Sunil Joshi (Verification)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Document Verification')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DOC-2025-0407</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Mehta</div>
          <small class="text-muted font-size-11">Primary Wing</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 3 - Primary</span></td>
        <td><small class="text-dark">EDMC/2016/49201</small></td>
        <td><small class="text-muted font-mono font-size-12">APAAR: 2940 1849 3920</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Verified Original TC #912</span></td>
        <td><small class="text-muted">Rohan Vashisht (Registrar)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Document Verification')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DOC-2025-0406</td>
        <td>
          <div class="fw-semibold text-dark">Zara Khan</div>
          <small class="text-muted font-size-11">Senior Secondary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Humanities</span></td>
        <td><small class="text-dark">SDMC/2008/19482</small></td>
        <td><small class="text-muted font-mono font-size-12">APAAR: 9401 2940 1849</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Verified Original TC #412</span></td>
        <td><small class="text-muted">Sunil Joshi (Verification)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Document Verification')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DOC-2025-0405</td>
        <td>
          <div class="fw-semibold text-dark">Ayaan Sen</div>
          <small class="text-muted font-size-11">Pre-Primary Wing</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 1 - Prep</span></td>
        <td><small class="text-dark">KMC/2020/49201</small></td>
        <td><small class="text-muted font-mono font-size-12">APAAR: 1849 3920 4810</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">N/A (Pre-K Cert Attached)</span></td>
        <td><small class="text-muted">Rohan Vashisht (Registrar)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Document Verification')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
