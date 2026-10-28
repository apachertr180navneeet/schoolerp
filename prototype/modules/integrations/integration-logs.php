<?php
/**
 * EDUSYS PRO - Integration Error Logs
 */
$page_title = "Integration Error Logs";
$page_desc = "Dedicated operational interface & records management for Integration Error Logs";
$active_module = "integrations";
$active_submodule = "integration-logs.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'integration-logs_export.csv')" title="Export Table as CSV">
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
        <h6>Total Records</h6>
        <div class="kpi-value">1,248 Items</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Up to Date</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-collection-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Verified & Active</h6>
        <div class="kpi-value">1,190 Entries</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 95.3% Verified</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-patch-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Under Scrutiny</h6>
        <div class="kpi-value">58 Pending</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Workflow Assigned</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-clock-history"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Audit Compliant</h6>
        <div class="kpi-value">100%</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> CBSE & Statutory Validated</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search integration error logs by code, title, category...">
    </div>
    <select class="form-select" style="max-width: 200px;">
      <option selected>All Categories</option>
      <option >Primary Wing</option>
      <option >Middle Wing</option>
      <option >Secondary Wing</option>
      <option >Senior Secondary Wing</option>
      <option >General Administration</option>
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
        <th>Record Code</th>
        <th>Integration Error Logs Title</th>
        <th>Operational Scope</th>
        <th>Assigned Incharge</th>
        <th>Reference / Contact</th>
        <th>Last Updated</th>
        <th>Session</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-8491</td>
        <td>
          <div class="fw-semibold text-dark">Integration Error Logs Standard Master #01</div>
          <small class="text-muted font-size-11">High Priority Institutional Record</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">All School Wings</span></td>
        <td><small class="text-dark">Dr. Sunita Rao</small></td>
        <td><small class="text-muted font-mono font-size-12">REF/ADM/2024/091</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">28 Oct 2024</span></td>
        <td><small class="text-muted">2024-2025</small></td>
        <td><span class="badge-status badge-active">Active & Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Integration Error Logs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-8492</td>
        <td>
          <div class="fw-semibold text-dark">Integration Error Logs Policy Schedule #02</div>
          <small class="text-muted font-size-11">Curriculum Implementation</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Vikram Rathore</small></td>
        <td><small class="text-muted font-mono font-size-12">REF/ACAD/2024/092</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">27 Oct 2024</span></td>
        <td><small class="text-muted">2024-2025</small></td>
        <td><span class="badge-status badge-active">Active & Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Integration Error Logs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-8493</td>
        <td>
          <div class="fw-semibold text-dark">Integration Error Logs Register Protocol #03</div>
          <small class="text-muted font-size-11">Mandatory Regulatory Filing</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Secondary Wing</span></td>
        <td><small class="text-dark">Mrs. Priya Nambiar</small></td>
        <td><small class="text-muted font-mono font-size-12">REF/COMP/2024/093</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">26 Oct 2024</span></td>
        <td><small class="text-muted">2024-2025</small></td>
        <td><span class="badge-status badge-active">Active & Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Integration Error Logs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-8494</td>
        <td>
          <div class="fw-semibold text-dark">Integration Error Logs Operation Log #04</div>
          <small class="text-muted font-size-11">Infrastructure Maintenance</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Campus Estate</span></td>
        <td><small class="text-dark">Mr. M. K. Sharma</small></td>
        <td><small class="text-muted font-mono font-size-12">REF/FIN/2024/094</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">25 Oct 2024</span></td>
        <td><small class="text-muted">2024-2025</small></td>
        <td><span class="badge-status badge-pending">In Workflow Review</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Integration Error Logs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-8495</td>
        <td>
          <div class="fw-semibold text-dark">Integration Error Logs Activity Benchmark #05</div>
          <small class="text-muted font-size-11">Student Welfare Guideline</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Middle Wing</span></td>
        <td><small class="text-dark">Mrs. Anjali Saxena</small></td>
        <td><small class="text-muted font-mono font-size-12">REF/HR/2024/095</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">25 Oct 2024</span></td>
        <td><small class="text-muted">2024-2025</small></td>
        <td><span class="badge-status badge-active">Active & Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Integration Error Logs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-8496</td>
        <td>
          <div class="fw-semibold text-dark">Integration Error Logs Digital Catalog #06</div>
          <small class="text-muted font-size-11">IT System Resource</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Technology Center</span></td>
        <td><small class="text-dark">Mr. Rohit Ganguly</small></td>
        <td><small class="text-muted font-mono font-size-12">REF/IT/2024/096</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">24 Oct 2024</span></td>
        <td><small class="text-muted">2024-2025</small></td>
        <td><span class="badge-status badge-active">Active & Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Integration Error Logs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-8497</td>
        <td>
          <div class="fw-semibold text-dark">Integration Error Logs Governance Audit #07</div>
          <small class="text-muted font-size-11">SMC Resolution Archive</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">General Administration</span></td>
        <td><small class="text-dark">Dr. Sunita Rao</small></td>
        <td><small class="text-muted font-mono font-size-12">REF/SMC/2024/097</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">23 Oct 2024</span></td>
        <td><small class="text-muted">2024-2025</small></td>
        <td><span class="badge-status badge-active">Active & Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Integration Error Logs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-8498</td>
        <td>
          <div class="fw-semibold text-dark">Integration Error Logs Session Directive #08</div>
          <small class="text-muted font-size-11">Annual Academic Milestone</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Primary Wing</span></td>
        <td><small class="text-dark">Mrs. Shalini Mehra</small></td>
        <td><small class="text-muted font-mono font-size-12">REF/PRI/2024/098</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">22 Oct 2024</span></td>
        <td><small class="text-muted">2024-2025</small></td>
        <td><span class="badge-status badge-active">Active & Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Integration Error Logs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>


<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
