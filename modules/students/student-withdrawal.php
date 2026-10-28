<?php
/**
 * EDUSYS PRO - STUDENT WITHDRAWAL REGISTER
 * Dedicated operational interface & records management for Student Withdrawal Register
 */
$page_title = "Student Withdrawal Register";
$page_desc = "Formal student exit ledger, departmental no-dues tracking, and caution money refunds";
$active_module = "students";
$active_submodule = "student-withdrawal.php";
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
    <h1><i class="bi bi-box-arrow-right text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'student-withdrawal_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Lodge Withdrawal File
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Total Withdrawals</h6>
        <div class="kpi-value">18 Exits Logged</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 0.63% Ultra-Low Churn</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-door-open-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Caution Money Refunded</h6>
        <div class="kpi-value">₹2,70,000</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 100% Cleared to Bank</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-wallet2"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>No-Dues Cleared</h6>
        <div class="kpi-value">15 Files Complete</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Library, Lab, Sports, Fees</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-all"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Pending Clearance</h6>
        <div class="kpi-value">3 Cases</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Library Book Return Due</div>
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
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search withdrawal ref #, student, reason, class...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Exit Reasons</option>
      <option >Parent Overseas / Interstate Transfer</option>
      <option >Shifted to Boarding School</option>
      <option >Competitive Exam Coaching Shift</option>
      <option >Financial / Distance Reasons</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Exit Complete & TC Issued</option>
      <option >No Dues in Progress</option>
      <option >Caution Money Due</option>
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
        <th>Withdrawal Ref #</th>
        <th>Student Full Name</th>
        <th>Class & Section</th>
        <th>Exit Reason</th>
        <th>No-Dues Clearance</th>
        <th>Caution Refund (₹)</th>
        <th>Leaving Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WDL-2024-0018</td>
        <td>
          <div class="fw-semibold text-dark">Tushar Sengupta</div>
          <small class="text-muted font-size-11">Adm #1412</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 8 - Section B</span></td>
        <td><small class="text-dark">Parent Transfer to London, UK</small></td>
        <td><small class="text-muted font-mono font-size-12">All Depts Cleared (100%)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹15,000 (Refunded)</span></td>
        <td><small class="text-muted">18 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Withdrawal Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WDL-2024-0017</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Dixit</div>
          <small class="text-muted font-size-11">Adm #1912</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 5 - Section A</span></td>
        <td><small class="text-dark">Relocation to Bengaluru (IT Shift)</small></td>
        <td><small class="text-muted font-mono font-size-12">All Depts Cleared (100%)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹15,000 (Refunded)</span></td>
        <td><small class="text-muted">12 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Withdrawal Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WDL-2024-0016</td>
        <td>
          <div class="fw-semibold text-dark">Devendra Rathore</div>
          <small class="text-muted font-size-11">Adm #1049</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section C</span></td>
        <td><small class="text-dark">Father Transferred to Pune Army HQ</small></td>
        <td><small class="text-muted font-mono font-size-12">Physics Lab Pending 1 Item</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹15,000 (On Hold)</span></td>
        <td><small class="text-muted">08 Oct 2024</small></td>
        <td><span class="badge-status badge-pending">No Dues Pending</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Withdrawal Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WDL-2024-0015</td>
        <td>
          <div class="fw-semibold text-dark">Simran Kaur</div>
          <small class="text-muted font-size-11">Adm #1481</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 3 - Section A</span></td>
        <td><small class="text-dark">Shifted to Residential School</small></td>
        <td><small class="text-muted font-mono font-size-12">All Depts Cleared (100%)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹15,000 (Refunded)</span></td>
        <td><small class="text-muted">01 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Withdrawal Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WDL-2024-0014</td>
        <td>
          <div class="fw-semibold text-dark">Aakash Chopra</div>
          <small class="text-muted font-size-11">Adm #0920</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Commerce</span></td>
        <td><small class="text-dark">Moved to Kota Coaching Academy</small></td>
        <td><small class="text-muted font-mono font-size-12">All Depts Cleared (100%)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹20,000 (Refunded)</span></td>
        <td><small class="text-muted">25 Sep 2024</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Withdrawal Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WDL-2024-0013</td>
        <td>
          <div class="fw-semibold text-dark">Megha Singhal</div>
          <small class="text-muted font-size-11">Adm #1940</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 6 - Section B</span></td>
        <td><small class="text-dark">Distance & Commute Challenges</small></td>
        <td><small class="text-muted font-mono font-size-12">Pending 1 Library Book</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹15,000 (On Hold)</span></td>
        <td><small class="text-muted">20 Sep 2024</small></td>
        <td><span class="badge-status badge-pending">No Dues Pending</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Withdrawal Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WDL-2024-0012</td>
        <td>
          <div class="fw-semibold text-dark">Aryan Oberoi</div>
          <small class="text-muted font-size-11">Adm #0482</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Section A</span></td>
        <td><small class="text-dark">Switched to IB World Board School</small></td>
        <td><small class="text-muted font-mono font-size-12">All Depts Cleared (100%)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹15,000 (Refunded)</span></td>
        <td><small class="text-muted">15 Sep 2024</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Withdrawal Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">WDL-2024-0011</td>
        <td>
          <div class="fw-semibold text-dark">Nandini Gupta</div>
          <small class="text-muted font-size-11">Adm #1049</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 2 - Section B</span></td>
        <td><small class="text-dark">Family Relocated to Singapore</small></td>
        <td><small class="text-muted font-mono font-size-12">All Depts Cleared (100%)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹15,000 (Refunded)</span></td>
        <td><small class="text-muted">10 Sep 2024</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student Withdrawal Register')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
