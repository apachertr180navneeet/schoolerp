<?php
/**
 * EDUSYS PRO - Enquiry Follow-ups
 */
$page_title = "Enquiry Follow-ups";
$page_desc = "Dedicated operational interface & records management for Enquiry Follow-ups";
$active_module = "admissions";
$active_submodule = "follow-ups.php";
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
      <li class="breadcrumb-item"><?php echo htmlspecialchars($active_module); ?></li>
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
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'follow-ups_export.csv')" title="Export Table as CSV">
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
        <h6>Total Applications</h6>
        <div class="kpi-value">842 Applicants</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> +18% vs last year</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-plus-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Enquiries This Month</h6>
        <div class="kpi-value">215 Leads</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 78% Followed up</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-telephone-inbound-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Merit Shortlisted</h6>
        <div class="kpi-value">320 Candidates</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Grade A Approved</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-award-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Seats Confirmed</h6>
        <div class="kpi-value">184 / 220</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> 83.6% Seats Filled</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check-circle-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search applicant name, application #, parent...">
    </div>
    <select class="form-select" style="max-width: 200px;">
      <option selected>All Admission Stages</option>
      <option >Enquiry Registered</option>
      <option >Document Scrutiny</option>
      <option >Interview Scheduled</option>
      <option >Merit Approved</option>
      <option >Fee Paid / Enrolled</option>
    </select>
    <select class="form-select" style="max-width: 150px;">
      <option selected>All Status</option>
      <option>Active / Verified</option>
      <option>In Review</option>
      <option>Approved</option>
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
        <th>Application / Ref #</th>
        <th>Candidate Full Name</th>
        <th>Grade Applied</th>
        <th>Parent / Guardian</th>
        <th>Contact Number</th>
        <th>Lead Source</th>
        <th>Date Submitted</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2025-0841</td>
        <td>
          <div class="fw-semibold text-dark">Advik Agarwal</div>
          <small class="text-muted font-size-11">Class 1 - Nursery</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pre-Primary Wing</span></td>
        <td><small class="text-dark">Sanjay Agarwal</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98112 44556</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Website Portal</span></td>
        <td><small class="text-muted">28 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Enrolled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Enquiry Follow-ups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2025-0840</td>
        <td>
          <div class="fw-semibold text-dark">Saanvi Reddy</div>
          <small class="text-muted font-size-11">Class 6 - Middle</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Middle Wing</span></td>
        <td><small class="text-dark">Dr. K. S. Reddy</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98223 55667</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Referral / Sibling</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Merit Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Enquiry Follow-ups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2025-0839</td>
        <td>
          <div class="fw-semibold text-dark">Reyansh Joshi</div>
          <small class="text-muted font-size-11">Class 11 - Science (PCM)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Mahesh Joshi</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98334 66778</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Walk-in Counter</span></td>
        <td><small class="text-muted">26 Oct 2024</small></td>
        <td><span class="badge-status badge-pending">Entrance Test</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Enquiry Follow-ups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2025-0838</td>
        <td>
          <div class="fw-semibold text-dark">Prisha Nair</div>
          <small class="text-muted font-size-11">Class 11 - Commerce</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Gopalan Nair</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98445 77889</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Digital Campaign</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Fee Paid</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Enquiry Follow-ups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2025-0837</td>
        <td>
          <div class="fw-semibold text-dark">Arya Deshmukh</div>
          <small class="text-muted font-size-11">Class 9 - Secondary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Secondary Wing</span></td>
        <td><small class="text-dark">Sunil Deshmukh</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98556 88990</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Open House</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-pending">Scrutiny</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Enquiry Follow-ups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2025-0836</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Mehta</div>
          <small class="text-muted font-size-11">Class 3 - Primary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Primary Wing</span></td>
        <td><small class="text-dark">Rakesh Mehta</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98667 99001</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Website Portal</span></td>
        <td><small class="text-muted">24 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Interviewed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Enquiry Follow-ups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2025-0835</td>
        <td>
          <div class="fw-semibold text-dark">Zara Khan</div>
          <small class="text-muted font-size-11">Class 11 - Humanities</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Tariq Khan</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98778 11223</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Transfer / Relocation</span></td>
        <td><small class="text-muted">23 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Merit Approved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Enquiry Follow-ups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2025-0834</td>
        <td>
          <div class="fw-semibold text-dark">Ayaan Sen</div>
          <small class="text-muted font-size-11">Class 1 - Prep</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pre-Primary Wing</span></td>
        <td><small class="text-dark">Debashis Sen</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98889 22334</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Alumni Parent</span></td>
        <td><small class="text-muted">22 Oct 2024</small></td>
        <td><span class="badge-status badge-inactive">Waiting List</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Enquiry Follow-ups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>


<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
