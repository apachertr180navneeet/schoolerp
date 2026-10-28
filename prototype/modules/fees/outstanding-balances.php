<?php
/**
 * EDUSYS PRO - Outstanding Balances
 */
$page_title = "Outstanding Balances";
$page_desc = "Dedicated operational interface & records management for Outstanding Balances";
$active_module = "fees";
$active_submodule = "outstanding-balances.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'outstanding-balances_export.csv')" title="Export Table as CSV">
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
        <h6>Fee Collected YTD</h6>
        <div class="kpi-value">₹ 4.21 Cr</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 87.4% Collection Target</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-currency-rupee"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Outstanding Dues</h6>
        <div class="kpi-value">₹ 60.8 Lakhs</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 112 Student Ledgers</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-exclamation-octagon-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Defaulters List</h6>
        <div class="kpi-value">48 Students</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> SMS Reminders Dispatched</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-bell-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Online Gateways</h6>
        <div class="kpi-value">94.2% Digital</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Razorpay / UPI Auto-Reconciled</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-credit-card-2-front-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search receipt #, student name, admission no...">
    </div>
    <select class="form-select" style="max-width: 200px;">
      <option selected>All Fee Status</option>
      <option >Paid (Online / Net Banking)</option>
      <option >Paid (Cheque / DD)</option>
      <option >Partial Payment</option>
      <option >Overdue / Pending Fine</option>
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
        <th>Receipt / Inv #</th>
        <th>Student & Class</th>
        <th>Parent / Guardian</th>
        <th>Fee Slab / Category</th>
        <th>Amount (₹)</th>
        <th>Payment Mode</th>
        <th>Transaction Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-9182</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Class 10-A (ADM-8491)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Rajesh Sharma</span></td>
        <td><small class="text-dark">Term 2 Tuition + Transport</small></td>
        <td><small class="text-muted font-mono font-size-12">₹ 28,500</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Razorpay Online</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Paid / Cleared</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Outstanding Balances')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-9181</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Class 10-A (ADM-8492)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Bhavin Patel</span></td>
        <td><small class="text-dark">Term 2 Tuition Fee</small></td>
        <td><small class="text-muted font-mono font-size-12">₹ 22,500</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">HDFC Net Banking</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Paid / Cleared</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Outstanding Balances')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-9180</td>
        <td>
          <div class="fw-semibold text-dark">Meera Reddy</div>
          <small class="text-muted font-size-11">Class 8-A (ADM-8497)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">K. S. Reddy</span></td>
        <td><small class="text-dark">Quarter 3 Tuition + Lab</small></td>
        <td><small class="text-muted font-mono font-size-12">₹ 24,200</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">UPI (Google Pay)</span></td>
        <td><small class="text-muted">26 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Paid / Cleared</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Outstanding Balances')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-9179</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Class 10-B (ADM-8493)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Manpreet Singh</span></td>
        <td><small class="text-dark">Annual Installment 2</small></td>
        <td><small class="text-muted font-mono font-size-12">₹ 15,000</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">HDFC Cheque #491201</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-pending">Partial Payment</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Outstanding Balances')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-9178</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Sengupta</div>
          <small class="text-muted font-size-11">Class 9-C (ADM-8498)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Debashis Sengupta</span></td>
        <td><small class="text-dark">Tuition + Computer Fee</small></td>
        <td><small class="text-muted font-mono font-size-12">₹ 26,000</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Cash Counter Desk</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Paid / Cleared</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Outstanding Balances')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-9177</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Class 12-A (ADM-8495)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Sanjay Gupta</span></td>
        <td><small class="text-dark">CBSE Board Exam Dues</small></td>
        <td><small class="text-muted font-mono font-size-12">₹ 4,500</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Counter UPI</span></td>
        <td><small class="text-muted">24 Oct 2024</small></td>
        <td><span class="badge-status badge-inactive">Overdue Dues</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Outstanding Balances')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-9176</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Class 10-B (ADM-8494)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">R. Venkatesh Iyer</span></td>
        <td><small class="text-dark">Quarter 3 Tuition</small></td>
        <td><small class="text-muted font-mono font-size-12">₹ 22,500</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">PayTM Gateway</span></td>
        <td><small class="text-muted">24 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Paid / Cleared</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Outstanding Balances')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-9175</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Class 12-B (ADM-8496)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Dr. Alok Verma</span></td>
        <td><small class="text-dark">Hostel & Mess Quarter 3</small></td>
        <td><small class="text-muted font-mono font-size-12">₹ 38,000</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">NEFT Bank Transfer</span></td>
        <td><small class="text-muted">23 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Paid / Cleared</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Outstanding Balances')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>


<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
