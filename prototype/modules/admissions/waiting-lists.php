<?php
/**
 * EDUSYS PRO - WAITING LISTS
 * Dedicated operational interface & records management for Waiting Lists
 */
$page_title = "Waiting Lists";
$page_desc = "Reserve applicant roster, vacancy reallocation tracking, and movement notifications";
$active_module = "admissions";
$active_submodule = "waiting-lists.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'waiting-lists_export.csv')" title="Export Table as CSV">
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
        <h6>Waitlisted Students</h6>
        <div class="kpi-value">64 Candidates</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Across All 5 Wings</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-hourglass-top"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Cleared to Merit</h6>
        <div class="kpi-value">18 Candidates</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Round 1 Cancellations</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-arrow-up-circle-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Highest Demand</h6>
        <div class="kpi-value">Nursery & Cl 11</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Zero Seats Left in PCM</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-exclamation-circle-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Next Drop Date</h6>
        <div class="kpi-value">02 Nov 2024</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Batch 2 Vacancy Round</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-event-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search waitlist token, student, applied grade...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Grades</option>
      <option >Pre-Primary (WL 1-12)</option>
      <option >Primary Wing (WL 1-15)</option>
      <option >Middle Wing (WL 1-10)</option>
      <option >Secondary (WL 1-8)</option>
      <option >Senior Secondary (WL 1-19)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active on Waitlist</option>
      <option >Cleared for Admission</option>
      <option >Withdrawn by Parent</option>
      <option >Expired</option>
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
        <th>Waitlist Token</th>
        <th>Candidate Full Name</th>
        <th>Target Grade</th>
        <th>Parent Mobile</th>
        <th>Position #</th>
        <th>Cutoff Gap</th>
        <th>Valid Till</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WL-2025-001</td>
        <td>
          <div class="fw-semibold text-dark">Darsh Khandelwal</div>
          <small class="text-muted font-size-11">Class 11 - Science (PCM)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">+91 98112 77881</small></td>
        <td><small class="text-muted font-mono font-size-12">Position #01</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">-0.5% from Cutoff</span></td>
        <td><small class="text-muted">02 Nov 2024</small></td>
        <td><span class="badge-status badge-active">Next in Line</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Waiting Lists')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WL-2025-002</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Saxena</div>
          <small class="text-muted font-size-11">Class 1 - Nursery</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pre-Primary Wing</span></td>
        <td><small class="text-dark">+91 98223 88992</small></td>
        <td><small class="text-muted font-mono font-size-12">Position #01</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">-1.0 Pt from Cutoff</span></td>
        <td><small class="text-muted">02 Nov 2024</small></td>
        <td><span class="badge-status badge-active">Next in Line</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Waiting Lists')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WL-2025-003</td>
        <td>
          <div class="fw-semibold text-dark">Kavya Swaminathan</div>
          <small class="text-muted font-size-11">Class 6 - Middle</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Middle Wing</span></td>
        <td><small class="text-dark">+91 98334 99003</small></td>
        <td><small class="text-muted font-mono font-size-12">Position #02</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">-1.2% from Cutoff</span></td>
        <td><small class="text-muted">02 Nov 2024</small></td>
        <td><span class="badge-status badge-pending">Waiting</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Waiting Lists')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WL-2025-004</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Varghese</div>
          <small class="text-muted font-size-11">Class 9 - Secondary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Secondary Wing</span></td>
        <td><small class="text-dark">+91 98445 11224</small></td>
        <td><small class="text-muted font-mono font-size-12">Position #01</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">-0.8% from Cutoff</span></td>
        <td><small class="text-muted">02 Nov 2024</small></td>
        <td><span class="badge-status badge-active">Cleared Offer</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Waiting Lists')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WL-2025-005</td>
        <td>
          <div class="fw-semibold text-dark">Parth Somani</div>
          <small class="text-muted font-size-11">Class 11 - Commerce</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">+91 98556 22335</small></td>
        <td><small class="text-muted font-mono font-size-12">Position #03</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">-1.8% from Cutoff</span></td>
        <td><small class="text-muted">02 Nov 2024</small></td>
        <td><span class="badge-status badge-pending">Waiting</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Waiting Lists')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WL-2025-006</td>
        <td>
          <div class="fw-semibold text-dark">Kiara Advani</div>
          <small class="text-muted font-size-11">Class 4 - Primary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Primary Wing</span></td>
        <td><small class="text-dark">+91 98667 33446</small></td>
        <td><small class="text-muted font-mono font-size-12">Position #02</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">-1.5% from Cutoff</span></td>
        <td><small class="text-muted">02 Nov 2024</small></td>
        <td><span class="badge-status badge-pending">Waiting</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Waiting Lists')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WL-2025-007</td>
        <td>
          <div class="fw-semibold text-dark">Manav Chhabra</div>
          <small class="text-muted font-size-11">Class 11 - Humanities</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">+91 98778 44557</small></td>
        <td><small class="text-muted font-mono font-size-12">Position #01</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">-0.6% from Cutoff</span></td>
        <td><small class="text-muted">02 Nov 2024</small></td>
        <td><span class="badge-status badge-active">Cleared Offer</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Waiting Lists')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WL-2025-008</td>
        <td>
          <div class="fw-semibold text-dark">Avani Rastogi</div>
          <small class="text-muted font-size-11">Class 1 - Prep</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pre-Primary Wing</span></td>
        <td><small class="text-dark">+91 98889 55668</small></td>
        <td><small class="text-muted font-mono font-size-12">Position #04</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">-2.2 Pts from Cutoff</span></td>
        <td><small class="text-muted">02 Nov 2024</small></td>
        <td><span class="badge-status badge-pending">Waiting</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Waiting Lists')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
