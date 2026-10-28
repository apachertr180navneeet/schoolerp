<?php
/**
 * EDUSYS PRO - APPLICATION REVIEW
 * Dedicated operational interface & records management for Application Review
 */
$page_title = "Application Review";
$page_desc = "Admissions scrutiny committee evaluations, eligibility checks, and entrance test approvals";
$active_module = "admissions";
$active_submodule = "application-review.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'application-review_export.csv')" title="Export Table as CSV">
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
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Dossiers Reviewed</h6>
        <div class="kpi-value">842 Evaluated</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Phase 1 Cleared</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-all"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Approved for Test</h6>
        <div class="kpi-value">520 Candidates</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 61.7% Met Criteria</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-pencil-square"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Documents Pending</h6>
        <div class="kpi-value">38 Flagged</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> TC / Birth Cert Discrepancy</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-flag-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Disqualified</h6>
        <div class="kpi-value">14 Ineligible</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Age Cutoff / Incomplete</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-x-circle-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search dossier #, candidate, scrutiny officer...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Scrutiny Status</option>
      <option >Approved for Test</option>
      <option >Under Secondary Review</option>
      <option >Documentation Pending</option>
      <option >Age Ineligible</option>
      <option >Disqualified</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Approved</option>
      <option >Flagged</option>
      <option >Under Review</option>
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
        <th>Dossier #</th>
        <th>Candidate Full Name</th>
        <th>Target Grade</th>
        <th>Previous Board / School</th>
        <th>Last Academic Score</th>
        <th>Reviewing Officer</th>
        <th>Review Date</th>
        <th>Verdict</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REV-2025-0412</td>
        <td>
          <div class="fw-semibold text-dark">Advik Agarwal</div>
          <small class="text-muted font-size-11">Age: 3y 8m (Nursery)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pre-Primary Wing</span></td>
        <td><small class="text-dark">Direct Admission (Age Verified)</small></td>
        <td><small class="text-muted font-mono font-size-12">N/A (Early Years)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mrs. Shalini Verma</span></td>
        <td><small class="text-muted">28 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Application Review')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REV-2025-0411</td>
        <td>
          <div class="fw-semibold text-dark">Saanvi Reddy</div>
          <small class="text-muted font-size-11">Age: 11y 2m (Class 6)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Middle Wing</span></td>
        <td><small class="text-dark">St. Xavier's High (ICSE)</small></td>
        <td><small class="text-muted font-mono font-size-12">94.2% (Grade 5)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. K. L. Sharma</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Application Review')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REV-2025-0410</td>
        <td>
          <div class="fw-semibold text-dark">Reyansh Joshi</div>
          <small class="text-muted font-size-11">Age: 16y 1m (Class 11)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Delhi Public School (CBSE)</small></td>
        <td><small class="text-muted font-mono font-size-12">91.8% (Class 10 Board)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">HOD Science Panel</span></td>
        <td><small class="text-muted">26 Oct 2024</small></td>
        <td><span class="badge-status badge-pending">TC Pending</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Application Review')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REV-2025-0409</td>
        <td>
          <div class="fw-semibold text-dark">Prisha Nair</div>
          <small class="text-muted font-size-11">Age: 15y 11m (Class 11)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Modern School (CBSE)</small></td>
        <td><small class="text-muted font-mono font-size-12">88.4% (Class 10 Board)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">HOD Commerce Panel</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Application Review')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REV-2025-0408</td>
        <td>
          <div class="fw-semibold text-dark">Arya Deshmukh</div>
          <small class="text-muted font-size-11">Age: 14y 3m (Class 9)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Secondary Wing</span></td>
        <td><small class="text-dark">Kendriya Vidyalaya (CBSE)</small></td>
        <td><small class="text-muted font-mono font-size-12">85.6% (Class 8)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Secondary Wing Head</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Application Review')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REV-2025-0407</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Mehta</div>
          <small class="text-muted font-size-11">Age: 8y 4m (Class 3)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Primary Wing</span></td>
        <td><small class="text-dark">The Heritage School (CBSE)</small></td>
        <td><small class="text-muted font-mono font-size-12">Grade A+ (Class 2)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mrs. Shalini Verma</span></td>
        <td><small class="text-muted">24 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Application Review')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REV-2025-0406</td>
        <td>
          <div class="fw-semibold text-dark">Zara Khan</div>
          <small class="text-muted font-size-11">Age: 16y 2m (Class 11)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Ryan International (CBSE)</small></td>
        <td><small class="text-muted font-mono font-size-12">92.0% (Class 10)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">HOD Humanities</span></td>
        <td><small class="text-muted">23 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Application Review')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REV-2025-0405</td>
        <td>
          <div class="fw-semibold text-dark">Ayaan Sen</div>
          <small class="text-muted font-size-11">Age: 4y 6m (Prep)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pre-Primary Wing</span></td>
        <td><small class="text-dark">Kidzee Preschool</small></td>
        <td><small class="text-muted font-mono font-size-12">Pre-K Certified</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mrs. Shalini Verma</span></td>
        <td><small class="text-muted">22 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Application Review')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
