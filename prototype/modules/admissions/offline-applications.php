<?php
/**
 * EDUSYS PRO - OFFLINE APPLICATIONS
 * Dedicated operational interface & records management for Offline Applications
 */
$page_title = "Offline Applications";
$page_desc = "Paper registration forms submitted at the campus reception, counter fee receipts, and manual entry logs";
$active_module = "admissions";
$active_submodule = "offline-applications.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'offline-applications_export.csv')" title="Export Table as CSV">
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
        <h6>Counter Forms Sold</h6>
        <div class="kpi-value">180 Kits</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> ₹1,250 / Brochure</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-journal-bookmark-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Forms Received</h6>
        <div class="kpi-value">158 Physical</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 87.7% Return Rate</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-inboxes-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Digitized Today</h6>
        <div class="kpi-value">24 Forms</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Scanned & Verified</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-qr-code-scan"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Pending Data Entry</h6>
        <div class="kpi-value">6 Forms</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Counter Scrutiny Desk</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-keyboard-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search counter slip #, student name, receiving clerk...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Payment Modes</option>
      <option >Cash Payment</option>
      <option >POS Card Swipe</option>
      <option >UPI QR Code</option>
      <option >Demand Draft</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Digitized & Verified</option>
      <option >Data Entry Pending</option>
      <option >Documents Incomplete</option>
      <option >Archived</option>
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
        <th>Receipt Slip #</th>
        <th>Candidate Full Name</th>
        <th>Grade Applied</th>
        <th>Parent / Guardian</th>
        <th>Counter Officer</th>
        <th>Payment Mode</th>
        <th>Received Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">OFF-2025-0158</td>
        <td>
          <div class="fw-semibold text-dark">Raghav Malhotra</div>
          <small class="text-muted font-size-11">Class 2 - Primary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Primary Wing</span></td>
        <td><small class="text-dark">Anil Malhotra (+91 98114 33221)</small></td>
        <td><small class="text-muted font-mono font-size-12">Ritu Sharma (Counter 1)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">UPI QR (₹1,250)</span></td>
        <td><small class="text-muted">28 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Digitized</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Offline Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">OFF-2025-0157</td>
        <td>
          <div class="fw-semibold text-dark">Suhani Bhatnagar</div>
          <small class="text-muted font-size-11">Class 11 - PCB</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Dr. V. K. Bhatnagar</small></td>
        <td><small class="text-muted font-mono font-size-12">Amit Verma (Counter 2)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">POS Card Swipe</span></td>
        <td><small class="text-muted">28 Oct 2024</small></td>
        <td><span class="badge-status badge-pending">Data Entry</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Offline Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">OFF-2025-0156</td>
        <td>
          <div class="fw-semibold text-dark">Shaurya Pratap Singh</div>
          <small class="text-muted font-size-11">Class 7 - Middle</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Middle Wing</span></td>
        <td><small class="text-dark">Col. D. S. Pratap</small></td>
        <td><small class="text-muted font-mono font-size-12">Ritu Sharma (Counter 1)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Cash (₹1,250)</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Digitized</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Offline Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">OFF-2025-0155</td>
        <td>
          <div class="fw-semibold text-dark">Dia Mukherjee</div>
          <small class="text-muted font-size-11">Class 1 - Nursery</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pre-Primary Wing</span></td>
        <td><small class="text-dark">Pranab Mukherjee</small></td>
        <td><small class="text-muted font-mono font-size-12">Ritu Sharma (Counter 1)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">UPI QR (₹1,250)</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Digitized</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Offline Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">OFF-2025-0154</td>
        <td>
          <div class="fw-semibold text-dark">Vivaan Saxena</div>
          <small class="text-muted font-size-11">Class 11 - Commerce</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Rajesh Saxena</small></td>
        <td><small class="text-muted font-mono font-size-12">Amit Verma (Counter 2)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Demand Draft</span></td>
        <td><small class="text-muted">26 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Digitized</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Offline Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">OFF-2025-0153</td>
        <td>
          <div class="fw-semibold text-dark">Gauri Shankar</div>
          <small class="text-muted font-size-11">Class 5 - Primary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Primary Wing</span></td>
        <td><small class="text-dark">N. Shankar</small></td>
        <td><small class="text-muted font-mono font-size-12">Ritu Sharma (Counter 1)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Cash (₹1,250)</span></td>
        <td><small class="text-muted">26 Oct 2024</small></td>
        <td><span class="badge-status badge-pending">Data Entry</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Offline Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">OFF-2025-0152</td>
        <td>
          <div class="fw-semibold text-dark">Arnav Khurana</div>
          <small class="text-muted font-size-11">Class 10 - Secondary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Secondary Wing</span></td>
        <td><small class="text-dark">Harish Khurana</small></td>
        <td><small class="text-muted font-mono font-size-12">Amit Verma (Counter 2)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">POS Card Swipe</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Digitized</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Offline Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">OFF-2025-0151</td>
        <td>
          <div class="fw-semibold text-dark">Tara Ahluwalia</div>
          <small class="text-muted font-size-11">Class 1 - Prep</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pre-Primary Wing</span></td>
        <td><small class="text-dark">Jaspreet Ahluwalia</small></td>
        <td><small class="text-muted font-mono font-size-12">Ritu Sharma (Counter 1)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">UPI QR (₹1,250)</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Digitized</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Offline Applications')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
