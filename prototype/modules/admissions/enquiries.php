<?php
/**
 * EDUSYS PRO - ADMISSION ENQUIRIES
 * Dedicated operational interface & records management for Admission Enquiries
 */
$page_title = "Admission Enquiries";
$page_desc = "Prospective student enquiry registry, lead scoring, and counselor allocation desk";
$active_module = "admissions";
$active_submodule = "enquiries.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'enquiries_export.csv')" title="Export Table as CSV">
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
        <h6>Total Enquiries</h6>
        <div class="kpi-value">1,248 Leads</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> +24% YoY Growth</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-telephone-inbound-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Hot / Warm Leads</h6>
        <div class="kpi-value">482 Active</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> High Conversion Intent</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-fire"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Today's Follow-ups</h6>
        <div class="kpi-value">42 Scheduled</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Assigned to Counselors</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Enquiry-to-Form Yield</h6>
        <div class="kpi-value">67.4%</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Above City Benchmark</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-graph-up-arrow"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search student name, enquiry #, parent, mobile...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Lead Temperatures</option>
      <option >Hot Lead (Immediate Action)</option>
      <option >Warm Lead (Exploring Options)</option>
      <option >Cold Lead (Future Session)</option>
      <option >Converted to Application</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active Follow-up</option>
      <option >Form Purchased</option>
      <option >Visit Scheduled</option>
      <option >Cold / Closed</option>
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
        <th>Enquiry #</th>
        <th>Prospective Student</th>
        <th>Applied Grade</th>
        <th>Parent Name</th>
        <th>Contact Mobile</th>
        <th>Assigned Counselor</th>
        <th>Next Follow-up</th>
        <th>Temperature</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ENQ-2025-1048</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Singhania</div>
          <small class="text-muted font-size-11">Class 1 - Nursery</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pre-Primary Wing</span></td>
        <td><small class="text-dark">Vikram Singhania</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98111 22334</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mrs. Shalini Verma</span></td>
        <td><small class="text-muted">29 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Hot Lead</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Admission Enquiries')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ENQ-2025-1047</td>
        <td>
          <div class="fw-semibold text-dark">Meera Krishnan</div>
          <small class="text-muted font-size-11">Class 6 - Middle</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Middle Wing</span></td>
        <td><small class="text-dark">Dr. R. Krishnan</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98222 33445</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mr. Deepak Rawat</span></td>
        <td><small class="text-muted">30 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Warm Lead</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Admission Enquiries')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ENQ-2025-1046</td>
        <td>
          <div class="fw-semibold text-dark">Devansh Bhardwaj</div>
          <small class="text-muted font-size-11">Class 11 - Science (PCM)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Alok Bhardwaj</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98333 44556</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. Sunita Kapoor</span></td>
        <td><small class="text-muted">29 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Hot Lead</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Admission Enquiries')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ENQ-2025-1045</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Deshpande</div>
          <small class="text-muted font-size-11">Class 9 - Secondary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Secondary Wing</span></td>
        <td><small class="text-dark">Sameer Deshpande</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98444 55667</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mrs. Shalini Verma</span></td>
        <td><small class="text-muted">31 Oct 2024</small></td>
        <td><span class="badge-status badge-pending">Warm Lead</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Admission Enquiries')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ENQ-2025-1044</td>
        <td>
          <div class="fw-semibold text-dark">Tanvi Choudhary</div>
          <small class="text-muted font-size-11">Class 11 - Commerce</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Raman Choudhary</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98555 66778</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mr. Deepak Rawat</span></td>
        <td><small class="text-muted">01 Nov 2024</small></td>
        <td><span class="badge-status badge-active">Converted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Admission Enquiries')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ENQ-2025-1043</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Mukherjee</div>
          <small class="text-muted font-size-11">Class 4 - Primary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Primary Wing</span></td>
        <td><small class="text-dark">Subhash Mukherjee</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98666 77889</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mrs. Shalini Verma</span></td>
        <td><small class="text-muted">28 Oct 2024</small></td>
        <td><span class="badge-status badge-pending">Cold Lead</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Admission Enquiries')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ENQ-2025-1042</td>
        <td>
          <div class="fw-semibold text-dark">Riyaan Kapoor</div>
          <small class="text-muted font-size-11">Class 1 - Prep</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pre-Primary Wing</span></td>
        <td><small class="text-dark">Kunal Kapoor</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98777 88990</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. Sunita Kapoor</span></td>
        <td><small class="text-muted">30 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Hot Lead</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Admission Enquiries')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ENQ-2025-1041</td>
        <td>
          <div class="fw-semibold text-dark">Navya Pillai</div>
          <small class="text-muted font-size-11">Class 11 - Humanities</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Suresh Pillai</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98888 99001</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mr. Deepak Rawat</span></td>
        <td><small class="text-muted">02 Nov 2024</small></td>
        <td><span class="badge-status badge-active">Warm Lead</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Admission Enquiries')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
