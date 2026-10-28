<?php
/**
 * EDUSYS PRO - ONLINE APPLICATIONS
 * Dedicated operational interface & records management for Online Applications
 */
$page_title = "Online Applications";
$page_desc = "Self-service parent portal registrations, payment gateway reconciliations, and e-form tracking";
$active_module = "admissions";
$active_submodule = "online-applications.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'online-applications_export.csv')" title="Export Table as CSV">
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
        <h6>Online Submissions</h6>
        <div class="kpi-value">684 Applications</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 81.2% of Total Intake</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-laptop-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Form Fee Collected</h6>
        <div class="kpi-value">₹8,55,000</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> ₹1,250 / Registration</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-credit-card-2-front-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Doc Uploads Complete</h6>
        <div class="kpi-value">94.8%</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Aadhaar & Birth Cert</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-file-earmark-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Awaiting Scrutiny</h6>
        <div class="kpi-value">38 Forms</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Avg Turnaround 1.2h</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-hourglass-split"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search applicant, txn ref, parent email...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Grades</option>
      <option >Pre-Primary (Nursery/Prep)</option>
      <option >Primary Wing (Class 1-5)</option>
      <option >Middle Wing (Class 6-8)</option>
      <option >Secondary Wing (Class 9-10)</option>
      <option >Senior Secondary (11-12)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Fee Paid & Submitted</option>
      <option >Document Scrutiny</option>
      <option >Shortlisted for Test</option>
      <option >Incomplete Draft</option>
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
        <th>Portal App #</th>
        <th>Candidate Full Name</th>
        <th>Target Grade</th>
        <th>Parent Name & Mobile</th>
        <th>Payment Ref #</th>
        <th>Doc Uploads</th>
        <th>Submitted At</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ONL-2025-0684</td>
        <td>
          <div class="fw-semibold text-dark">Advik Agarwal</div>
          <small class="text-muted font-size-11">Class 1 - Nursery</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pre-Primary Wing</span></td>
        <td><small class="text-dark">Sanjay Agarwal (+91 98112 44556)</small></td>
        <td><small class="text-muted font-mono font-size-12">RZP-PAY-94812</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">4 of 4 Verified</span></td>
        <td><small class="text-muted">28 Oct (09:45 AM)</small></td>
        <td><span class="badge-status badge-active">Fee Paid</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Online Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ONL-2025-0683</td>
        <td>
          <div class="fw-semibold text-dark">Saanvi Reddy</div>
          <small class="text-muted font-size-11">Class 6 - Middle</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Middle Wing</span></td>
        <td><small class="text-dark">Dr. K. S. Reddy (+91 98223 55667)</small></td>
        <td><small class="text-muted font-mono font-size-12">RZP-PAY-94801</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">4 of 4 Verified</span></td>
        <td><small class="text-muted">27 Oct (04:12 PM)</small></td>
        <td><span class="badge-status badge-active">Shortlisted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Online Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ONL-2025-0682</td>
        <td>
          <div class="fw-semibold text-dark">Reyansh Joshi</div>
          <small class="text-muted font-size-11">Class 11 - Science (PCM)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Mahesh Joshi (+91 98334 66778)</small></td>
        <td><small class="text-muted font-mono font-size-12">RZP-PAY-94788</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">3 of 4 (TC Pending)</span></td>
        <td><small class="text-muted">26 Oct (08:30 PM)</small></td>
        <td><span class="badge-status badge-pending">Scrutiny</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Online Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ONL-2025-0681</td>
        <td>
          <div class="fw-semibold text-dark">Prisha Nair</div>
          <small class="text-muted font-size-11">Class 11 - Commerce</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Gopalan Nair (+91 98445 77889)</small></td>
        <td><small class="text-muted font-mono font-size-12">RZP-PAY-94754</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">4 of 4 Verified</span></td>
        <td><small class="text-muted">25 Oct (11:20 AM)</small></td>
        <td><span class="badge-status badge-active">Shortlisted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Online Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ONL-2025-0680</td>
        <td>
          <div class="fw-semibold text-dark">Arya Deshmukh</div>
          <small class="text-muted font-size-11">Class 9 - Secondary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Secondary Wing</span></td>
        <td><small class="text-dark">Sunil Deshmukh (+91 98556 88990)</small></td>
        <td><small class="text-muted font-mono font-size-12">RZP-PAY-94732</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">4 of 4 Verified</span></td>
        <td><small class="text-muted">25 Oct (02:15 PM)</small></td>
        <td><span class="badge-status badge-active">Fee Paid</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Online Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ONL-2025-0679</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Mehta</div>
          <small class="text-muted font-size-11">Class 3 - Primary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Primary Wing</span></td>
        <td><small class="text-dark">Rakesh Mehta (+91 98667 99001)</small></td>
        <td><small class="text-muted font-mono font-size-12">RZP-PAY-94711</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">4 of 4 Verified</span></td>
        <td><small class="text-muted">24 Oct (10:05 AM)</small></td>
        <td><span class="badge-status badge-active">Shortlisted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Online Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ONL-2025-0678</td>
        <td>
          <div class="fw-semibold text-dark">Zara Khan</div>
          <small class="text-muted font-size-11">Class 11 - Humanities</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Tariq Khan (+91 98778 11223)</small></td>
        <td><small class="text-muted font-mono font-size-12">RZP-PAY-94695</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">4 of 4 Verified</span></td>
        <td><small class="text-muted">23 Oct (06:40 PM)</small></td>
        <td><span class="badge-status badge-active">Fee Paid</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Online Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ONL-2025-0677</td>
        <td>
          <div class="fw-semibold text-dark">Ayaan Sen</div>
          <small class="text-muted font-size-11">Class 1 - Prep</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pre-Primary Wing</span></td>
        <td><small class="text-dark">Debashis Sen (+91 98889 22334)</small></td>
        <td><small class="text-muted font-mono font-size-12">RZP-PAY-94672</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">4 of 4 Verified</span></td>
        <td><small class="text-muted">22 Oct (01:15 PM)</small></td>
        <td><span class="badge-status badge-pending">Scrutiny</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Online Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
