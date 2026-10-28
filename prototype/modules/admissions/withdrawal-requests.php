<?php
/**
 * EDUSYS PRO - WITHDRAWAL REQUESTS
 * Dedicated operational interface & records management for Withdrawal Requests
 */
$page_title = "Withdrawal Requests";
$page_desc = "Transfer Certificate (TC) applications, security deposit refund clearances, and student exit protocols";
$active_module = "admissions";
$active_submodule = "withdrawal-requests.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'withdrawal-requests_export.csv')" title="Export Table as CSV">
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
        <h6>Withdrawal Requests</h6>
        <div class="kpi-value">12 Total</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 0.42% Low Annual Churn</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-box-arrow-right"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>TC Dispatched</h6>
        <div class="kpi-value">9 Issued</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Counter-Signed by Education Dept</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-file-earmark-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Security Refunded</h6>
        <div class="kpi-value">₹1,80,000</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Caution Money Cleared</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-wallet2"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Pending No Dues</h6>
        <div class="kpi-value">3 Cases</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Library & Lab Clearance Due</div>
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
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search TC application #, student, reason for exit...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Exit Reasons</option>
      <option >Parent Transfer / Relocation</option>
      <option >Boarding / Residential Shift</option>
      <option >Board Switch (CBSE to IB)</option>
      <option >Distance / Commute Issues</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >TC Issued & Dispatched</option>
      <option >No-Dues In Progress</option>
      <option >Caution Refund Processed</option>
      <option >Pending Library Clearance</option>
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
        <th>TC Request #</th>
        <th>Student Full Name</th>
        <th>Class & Section</th>
        <th>Parent / Guardian</th>
        <th>Exit Reason</th>
        <th>No Dues Status</th>
        <th>Caution Refund (₹)</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WDL-2025-0012</td>
        <td>
          <div class="fw-semibold text-dark">Tushar Sengupta</div>
          <small class="text-muted font-size-11">Scholar: SCH-2021-8412</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 8 - Section B</span></td>
        <td><small class="text-dark">Subhash Sengupta</small></td>
        <td><small class="text-muted font-mono font-size-12">Parent Transfer to London, UK</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">All Clear (Library/Lab/Fee)</span></td>
        <td><small class="text-muted">₹15,000 (Refunded)</small></td>
        <td><span class="badge-status badge-active">TC Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Withdrawal Requests')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WDL-2025-0011</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Dixit</div>
          <small class="text-muted font-size-11">Scholar: SCH-2022-4912</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 5 - Section A</span></td>
        <td><small class="text-dark">Dr. Alok Dixit</small></td>
        <td><small class="text-muted font-mono font-size-12">Relocation to Bengaluru (IT Shift)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">All Clear (Library/Lab/Fee)</span></td>
        <td><small class="text-muted">₹15,000 (Refunded)</small></td>
        <td><span class="badge-status badge-active">TC Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Withdrawal Requests')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WDL-2025-0010</td>
        <td>
          <div class="fw-semibold text-dark">Devendra Rathore</div>
          <small class="text-muted font-size-11">Scholar: SCH-2020-1049</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section C</span></td>
        <td><small class="text-dark">Col. V. S. Rathore</small></td>
        <td><small class="text-muted font-mono font-size-12">Father Transferred to Pune Army HQ</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending Chemistry Lab Dues</span></td>
        <td><small class="text-muted">₹15,000 (On Hold)</small></td>
        <td><span class="badge-status badge-pending">No Dues Pending</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Withdrawal Requests')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WDL-2025-0009</td>
        <td>
          <div class="fw-semibold text-dark">Simran Kaur</div>
          <small class="text-muted font-size-11">Scholar: SCH-2023-9481</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 3 - Section A</span></td>
        <td><small class="text-dark">Gurpreet Singh</small></td>
        <td><small class="text-muted font-mono font-size-12">Shifted to Day-Boarding School</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">All Clear (Library/Lab/Fee)</span></td>
        <td><small class="text-muted">₹15,000 (Refunded)</small></td>
        <td><span class="badge-status badge-active">TC Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Withdrawal Requests')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WDL-2025-0008</td>
        <td>
          <div class="fw-semibold text-dark">Aakash Chopra</div>
          <small class="text-muted font-size-11">Scholar: SCH-2019-3920</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Commerce</span></td>
        <td><small class="text-dark">Sunil Chopra</small></td>
        <td><small class="text-muted font-mono font-size-12">Moving to Kota for Competitive Prep</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">All Clear (Library/Lab/Fee)</span></td>
        <td><small class="text-muted">₹20,000 (Refunded)</small></td>
        <td><span class="badge-status badge-active">TC Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Withdrawal Requests')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WDL-2025-0007</td>
        <td>
          <div class="fw-semibold text-dark">Megha Singhal</div>
          <small class="text-muted font-size-11">Scholar: SCH-2022-1940</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 6 - Section B</span></td>
        <td><small class="text-dark">Praveen Singhal</small></td>
        <td><small class="text-muted font-mono font-size-12">Distance / Commute Challenges</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Pending 1 Library Book</span></td>
        <td><small class="text-muted">₹15,000 (On Hold)</small></td>
        <td><span class="badge-status badge-pending">Library Due</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Withdrawal Requests')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WDL-2025-0006</td>
        <td>
          <div class="fw-semibold text-dark">Aryan Oberoi</div>
          <small class="text-muted font-size-11">Scholar: SCH-2021-9482</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Section A</span></td>
        <td><small class="text-dark">Rakesh Oberoi</small></td>
        <td><small class="text-muted font-mono font-size-12">Switching to International IB Board</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">All Clear (Library/Lab/Fee)</span></td>
        <td><small class="text-muted">₹15,000 (Refunded)</small></td>
        <td><span class="badge-status badge-active">TC Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Withdrawal Requests')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WDL-2025-0005</td>
        <td>
          <div class="fw-semibold text-dark">Nandini Gupta</div>
          <small class="text-muted font-size-11">Scholar: SCH-2023-1049</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 2 - Section B</span></td>
        <td><small class="text-dark">Sanjay Gupta</small></td>
        <td><small class="text-muted font-mono font-size-12">Relocation to Singapore</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">All Clear (Library/Lab/Fee)</span></td>
        <td><small class="text-muted">₹15,000 (Refunded)</small></td>
        <td><span class="badge-status badge-active">TC Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Withdrawal Requests')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
