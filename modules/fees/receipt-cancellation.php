<?php
/**
 * EDUSYS PRO - Receipt Cancellation
 */
$page_title = "Receipt Cancellation";
$page_desc = "Bounced cheque and void transaction reversals";
$active_module = "fees";
$active_submodule = "receipt-cancellation.php";
$depth = 2;

require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/sidebar.php';
require_once __DIR__ . '/../../includes/topbar.php';
?>

<!-- Page Header Box -->
<div class="page-header-box">
  <div class="page-title-group">
    <h1><i class="bi bi-check2-circle text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'receipt-cancellation_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Add New Record
    </button>
  </div>
</div>

<div class="row g-3 mb-4">
      <div class="col-6 col-md-3">
        <div class="kpi-card kpi-primary">
          <div class="kpi-info">
            <h6>Total Entries</h6>
            <div class="kpi-value">1,482</div>
            <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Synced</div>
          </div>
          <div class="kpi-icon"><i class="bi bi-collection-fill"></i></div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="kpi-card kpi-success">
          <div class="kpi-info">
            <h6>Active / Verified</h6>
            <div class="kpi-value">1,390</div>
            <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 94% Approved</div>
          </div>
          <div class="kpi-icon"><i class="bi bi-patch-check-fill"></i></div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="kpi-card kpi-warning">
          <div class="kpi-info">
            <h6>Pending Review</h6>
            <div class="kpi-value">68</div>
            <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> In Workflow</div>
          </div>
          <div class="kpi-icon"><i class="bi bi-hourglass-split"></i></div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="kpi-card kpi-info">
          <div class="kpi-info">
            <h6>Board Compliant</h6>
            <div class="kpi-value">100%</div>
            <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> CBSE Validated</div>
          </div>
          <div class="kpi-icon"><i class="bi bi-award-fill"></i></div>
        </div>
      </div>
    </div>
  
    
    
    <div class="table-filter-bar">
      <div class="table-filter-left">
        <div class="table-search-input">
          <i class="bi bi-search"></i>
          <input type="text" class="form-control" id="tableSearchInput" placeholder="Search by name, code, reference ID, category...">
        </div>
        <select class="form-select" style="max-width: 170px;">
          <option selected>All Classes</option>
          <option>Class 10-A</option>
          <option>Class 10-B</option>
          <option>Class 12-A (PCM)</option>
          <option>Class 12-B (PCB)</option>
          <option>Class 12-C (Comm)</option>
        </select>
        <select class="form-select" style="max-width: 150px;">
          <option selected>All Status</option>
          <option>Active / Paid</option>
          <option>Pending</option>
          <option>Approved</option>
        </select>
      </div>

      <div class="table-filter-right">
        <span class="font-size-13 text-muted">Showing <strong class="table-visible-count text-primary">8</strong> records</span>
      </div>
    </div>
  
    
    <div class="erp-table-responsive mb-0">
      <table class="erp-table" id="mainDataTable">
        <thead>
          
      <tr>
        <th class="sortable">Receipt / Inv #</th>
        <th class="sortable">Student & Class</th>
        <th>Parent / Guardian</th>
        <th class="sortable">Fee Category</th>
        <th class="sortable text-end">Amount (₹)</th>
        <th>Payment Mode</th>
        <th>Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    
        </thead>
        <tbody>
          
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-9182</td>
        <td>
          <div class="table-user-cell">
            <div class="table-avatar">AS</div>
            <div>
              <div class="table-user-name">Aarav Sharma</div>
              <div class="table-user-sub">Class 10-A</div>
            </div>
          </div>
        </td>
        <td><small class="text-muted">Rajesh Sharma (+91 98112 34567)</small></td>
        <td><span class="font-size-13">Term 2 Tuition + Transport</span></td>
        <td class="text-end fw-bold font-size-14 text-dark dark-text-white">₹28,500</td>
        <td><span class="badge bg-light text-muted border font-size-12">Razorpay (Online)</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-paid">Paid</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Receipt Cancellation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-9181</td>
        <td>
          <div class="table-user-cell">
            <div class="table-avatar">DP</div>
            <div>
              <div class="table-user-name">Diya Patel</div>
              <div class="table-user-sub">Class 10-A</div>
            </div>
          </div>
        </td>
        <td><small class="text-muted">Bhavin Patel (+91 98223 45678)</small></td>
        <td><span class="font-size-13">Term 2 Tuition Fee</span></td>
        <td class="text-end fw-bold font-size-14 text-dark dark-text-white">₹22,500</td>
        <td><span class="badge bg-light text-muted border font-size-12">Net Banking</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-paid">Paid</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Receipt Cancellation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-9180</td>
        <td>
          <div class="table-user-cell">
            <div class="table-avatar">MR</div>
            <div>
              <div class="table-user-name">Meera Reddy</div>
              <div class="table-user-sub">Class 8-A</div>
            </div>
          </div>
        </td>
        <td><small class="text-muted">K. S. Reddy (+91 98778 90123)</small></td>
        <td><span class="font-size-13">Quarter 3 Fee + Lab</span></td>
        <td class="text-end fw-bold font-size-14 text-dark dark-text-white">₹24,200</td>
        <td><span class="badge bg-light text-muted border font-size-12">UPI (Google Pay)</span></td>
        <td><small class="text-muted">26 Oct 2024</small></td>
        <td><span class="badge-status badge-paid">Paid</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Receipt Cancellation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-9179</td>
        <td>
          <div class="table-user-cell">
            <div class="table-avatar">VS</div>
            <div>
              <div class="table-user-name">Vihaan Singh</div>
              <div class="table-user-sub">Class 10-B</div>
            </div>
          </div>
        </td>
        <td><small class="text-muted">Manpreet Singh (+91 98334 56789)</small></td>
        <td><span class="font-size-13">Annual Installment 2</span></td>
        <td class="text-end fw-bold font-size-14 text-dark dark-text-white">₹15,000</td>
        <td><span class="badge bg-light text-muted border font-size-12">HDFC Cheque #491201</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-partial">Partial</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Receipt Cancellation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-9178</td>
        <td>
          <div class="table-user-cell">
            <div class="table-avatar">KS</div>
            <div>
              <div class="table-user-name">Kabir Sengupta</div>
              <div class="table-user-sub">Class 9-C</div>
            </div>
          </div>
        </td>
        <td><small class="text-muted">Debashis Sengupta (+91 98889 01234)</small></td>
        <td><span class="font-size-13">Tuition + Computer Fee</span></td>
        <td class="text-end fw-bold font-size-14 text-dark dark-text-white">₹26,000</td>
        <td><span class="badge bg-light text-muted border font-size-12">Cash Counter</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-paid">Paid</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Receipt Cancellation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-9177</td>
        <td>
          <div class="table-user-cell">
            <div class="table-avatar">RG</div>
            <div>
              <div class="table-user-name">Rohan Gupta</div>
              <div class="table-user-sub">Class 12-A</div>
            </div>
          </div>
        </td>
        <td><small class="text-muted">Sanjay Gupta (+91 98556 78901)</small></td>
        <td><span class="font-size-13">CBSE Board Exam Dues</span></td>
        <td class="text-end fw-bold font-size-14 text-dark dark-text-white">₹4,500</td>
        <td><span class="badge bg-light text-muted border font-size-12">Counter UPI</span></td>
        <td><small class="text-muted">24 Oct 2024</small></td>
        <td><span class="badge-status badge-unpaid">Due</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Receipt Cancellation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-9176</td>
        <td>
          <div class="table-user-cell">
            <div class="table-avatar">AI</div>
            <div>
              <div class="table-user-name">Ananya Iyer</div>
              <div class="table-user-sub">Class 10-B</div>
            </div>
          </div>
        </td>
        <td><small class="text-muted">R. Venkatesh Iyer (+91 98445 67890)</small></td>
        <td><span class="font-size-13">Quarter 3 Tuition</span></td>
        <td class="text-end fw-bold font-size-14 text-dark dark-text-white">₹22,500</td>
        <td><span class="badge bg-light text-muted border font-size-12">PayTM Gateway</span></td>
        <td><small class="text-muted">24 Oct 2024</small></td>
        <td><span class="badge-status badge-paid">Paid</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Receipt Cancellation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REC-2024-9175</td>
        <td>
          <div class="table-user-cell">
            <div class="table-avatar">IV</div>
            <div>
              <div class="table-user-name">Ishaan Verma</div>
              <div class="table-user-sub">Class 12-B</div>
            </div>
          </div>
        </td>
        <td><small class="text-muted">Dr. Alok Verma (+91 98667 89012)</small></td>
        <td><span class="font-size-13">Hostel & Mess Quarter 3</span></td>
        <td class="text-end fw-bold font-size-14 text-dark dark-text-white">₹38,000</td>
        <td><span class="badge bg-light text-muted border font-size-12">NEFT Bank Transfer</span></td>
        <td><small class="text-muted">23 Oct 2024</small></td>
        <td><span class="badge-status badge-paid">Paid</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Receipt Cancellation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="erp-pagination-bar">
      <div class="pagination-info">
        Showing 1 to 8 of 1,482 entries
      </div>
      <ul class="pagination-custom">
        <li class="page-item disabled"><a class="page-link" href="#"><i class="bi bi-chevron-left"></i></a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">...</a></li>
        <li class="page-item"><a class="page-link" href="#">185</a></li>
        <li class="page-item"><a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a></li>
      </ul>
    </div>
  
  

      

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>