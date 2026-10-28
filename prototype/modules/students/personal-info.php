<?php
/**
 * EDUSYS PRO - PERSONAL INFORMATION
 * Dedicated operational interface & records management for Personal Information
 */
$page_title = "Personal Information";
$page_desc = "Statutory demographic data, DOB authentication, social categorization, and domicile details";
$active_module = "students";
$active_submodule = "personal-info.php";
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
    <h1><i class="bi bi-card-text text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'personal-info_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Add Personal Record
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Aadhaar Verified</h6>
        <div class="kpi-value">2,836 Verified</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 99.8% UIDAI Linked</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-fingerprint"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Birth Certificates</h6>
        <div class="kpi-value">2,840 Authenticated</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 100% Municipal Registered</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-file-earmark-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Social Categories</h6>
        <div class="kpi-value">GEN / OBC / SC / ST</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> RTE & Equal Opportunity</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Blood Group Mapped</h6>
        <div class="kpi-value">2,828 Records</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Ready for Medical Desk</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-droplet-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search student, blood group, social category, DOB...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Social Categories</option>
      <option >General Category</option>
      <option >OBC (Other Backward Classes)</option>
      <option >SC / ST Scheduled</option>
      <option >EWS / DG Quota</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Verified & Locked</option>
      <option >Document Due</option>
      <option >Under Scrutiny</option>
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
        <th>Admission #</th>
        <th>Student Full Name</th>
        <th>Date of Birth</th>
        <th>Gender</th>
        <th>Social Category</th>
        <th>Blood Group</th>
        <th>Mother Tongue</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-001</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Aadhaar: **** 4091</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">14 May 2009 (15y)</span></td>
        <td><small class="text-dark">Male</small></td>
        <td><small class="text-muted font-mono font-size-12">General</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">B+ Positive</span></td>
        <td><small class="text-muted">Hindi / English</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Personal Information')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-002</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Aadhaar: **** 3820</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">22 Aug 2009 (15y)</span></td>
        <td><small class="text-dark">Female</small></td>
        <td><small class="text-muted font-mono font-size-12">General</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">O+ Positive</span></td>
        <td><small class="text-muted">Gujarati / English</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Personal Information')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-003</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Aadhaar: **** 1948</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">05 Nov 2009 (15y)</span></td>
        <td><small class="text-dark">Male</small></td>
        <td><small class="text-muted font-mono font-size-12">General</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">A+ Positive</span></td>
        <td><small class="text-muted">Punjabi / English</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Personal Information')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-004</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Aadhaar: **** 2940</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">18 Jan 2009 (15y)</span></td>
        <td><small class="text-dark">Female</small></td>
        <td><small class="text-muted font-mono font-size-12">General</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">AB+ Positive</span></td>
        <td><small class="text-muted">Tamil / English</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Personal Information')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-005</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Aadhaar: **** 8401</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">30 Mar 2007 (17y)</span></td>
        <td><small class="text-dark">Male</small></td>
        <td><small class="text-muted font-mono font-size-12">General</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">O+ Positive</span></td>
        <td><small class="text-muted">Hindi / English</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Personal Information')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-006</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Aadhaar: **** 5920</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">12 Dec 2007 (17y)</span></td>
        <td><small class="text-dark">Male</small></td>
        <td><small class="text-muted font-mono font-size-12">OBC (Non-Creamy)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">B+ Positive</span></td>
        <td><small class="text-muted">Hindi / English</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Personal Information')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-007</td>
        <td>
          <div class="fw-semibold text-dark">Meera Nambiar</div>
          <small class="text-muted font-size-11">Aadhaar: **** 7192</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">08 Jul 2011 (13y)</span></td>
        <td><small class="text-dark">Female</small></td>
        <td><small class="text-muted font-mono font-size-12">General</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">A- Negative</span></td>
        <td><small class="text-muted">Malayalam / English</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Personal Information')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-008</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Malhotra</div>
          <small class="text-muted font-size-11">Aadhaar: **** 9381</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">19 Sep 2014 (10y)</span></td>
        <td><small class="text-dark">Male</small></td>
        <td><small class="text-muted font-mono font-size-12">General</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">O+ Positive</span></td>
        <td><small class="text-muted">Hindi / English</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Personal Information')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
