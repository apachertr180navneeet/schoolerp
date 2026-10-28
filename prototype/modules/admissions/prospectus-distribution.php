<?php
/**
 * EDUSYS PRO - PROSPECTUS DISTRIBUTION
 * Dedicated operational interface & records management for Prospectus Distribution
 */
$page_title = "Prospectus Distribution";
$page_desc = "Information brochure sales, registration kit inventory, and counter cashier reconciliations";
$active_module = "admissions";
$active_submodule = "prospectus-distribution.php";
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
    <h1><i class="bi bi-book-half text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'prospectus-distribution_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-journal-plus me-1"></i> Issue Prospectus
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Total Printed</h6>
        <div class="kpi-value">500 Kits</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Deluxe Gloss Brochure</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-book-half"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Kits Distributed</h6>
        <div class="kpi-value">380 Issued</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 76% Stock Utilized</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cart-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Counter Inventory</h6>
        <div class="kpi-value">120 Left</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Main Admin Vault</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-archive-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Revenue Collected</h6>
        <div class="kpi-value">₹4,75,000</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> ₹1,250 / Information Kit</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cash-coin"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search kit serial #, buyer parent, counter cashier...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Prospectus Types</option>
      <option >Main School Information Kit</option>
      <option >Senior Secondary Stream Dossier</option>
      <option >Pre-Primary Day Care Booklet</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Sold / Issued</option>
      <option >Complimentary Sibling</option>
      <option >Damaged / Voided</option>
      <option >In Vault</option>
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
        <th>Kit Serial #</th>
        <th>Prospectus Package</th>
        <th>Target Wing</th>
        <th>Recipient / Parent</th>
        <th>Amount Paid (₹)</th>
        <th>Issuing Desk</th>
        <th>Issue Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">KIT-2025-0380</td>
        <td>
          <div class="fw-semibold text-dark">Comprehensive DPGA Information Kit</div>
          <small class="text-muted font-size-11">Includes CBSE Curriculum Guide</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pre-Primary Wing</span></td>
        <td><small class="text-dark">Sanjay Agarwal</small></td>
        <td><small class="text-muted font-mono font-size-12">₹1,250</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Counter 1 (Ritu Sharma)</span></td>
        <td><small class="text-muted">28 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Prospectus Distribution')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">KIT-2025-0379</td>
        <td>
          <div class="fw-semibold text-dark">Senior Secondary Stream Dossier</div>
          <small class="text-muted font-size-11">PCM/PCB/Commerce Special</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Dr. K. S. Reddy</small></td>
        <td><small class="text-muted font-mono font-size-12">₹1,250</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Counter 2 (Amit Verma)</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Prospectus Distribution')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">KIT-2025-0378</td>
        <td>
          <div class="fw-semibold text-dark">Comprehensive DPGA Information Kit</div>
          <small class="text-muted font-size-11">With Fee Matrix 2025-26</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Mahesh Joshi</small></td>
        <td><small class="text-muted font-mono font-size-12">₹1,250</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Counter 1 (Ritu Sharma)</span></td>
        <td><small class="text-muted">26 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Prospectus Distribution')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">KIT-2025-0377</td>
        <td>
          <div class="fw-semibold text-dark">Comprehensive DPGA Information Kit</div>
          <small class="text-muted font-size-11">Standard Prospectus Package</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Gopalan Nair</small></td>
        <td><small class="text-muted font-mono font-size-12">₹1,250</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Counter 1 (Ritu Sharma)</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Prospectus Distribution')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">KIT-2025-0376</td>
        <td>
          <div class="fw-semibold text-dark">Comprehensive DPGA Information Kit</div>
          <small class="text-muted font-size-11">Standard Prospectus Package</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Secondary Wing</span></td>
        <td><small class="text-dark">Sunil Deshmukh</small></td>
        <td><small class="text-muted font-mono font-size-12">₹1,250</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Counter 2 (Amit Verma)</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Prospectus Distribution')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">KIT-2025-0375</td>
        <td>
          <div class="fw-semibold text-dark">Primary School Handbook</div>
          <small class="text-muted font-size-11">With Co-Curricular Brochure</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Primary Wing</span></td>
        <td><small class="text-dark">Rakesh Mehta</small></td>
        <td><small class="text-muted font-mono font-size-12">₹1,250</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Counter 1 (Ritu Sharma)</span></td>
        <td><small class="text-muted">24 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Prospectus Distribution')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">KIT-2025-0374</td>
        <td>
          <div class="fw-semibold text-dark">Comprehensive DPGA Information Kit</div>
          <small class="text-muted font-size-11">Complimentary Sibling Copy</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Tariq Khan</small></td>
        <td><small class="text-muted font-mono font-size-12">₹0 (Sibling)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Counter 2 (Amit Verma)</span></td>
        <td><small class="text-muted">23 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Complimentary</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Prospectus Distribution')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">KIT-2025-0373</td>
        <td>
          <div class="fw-semibold text-dark">Early Years Foundation Brochure</div>
          <small class="text-muted font-size-11">Day Care & Activity Center</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pre-Primary Wing</span></td>
        <td><small class="text-dark">Debashis Sen</small></td>
        <td><small class="text-muted font-mono font-size-12">₹1,250</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Counter 1 (Ritu Sharma)</span></td>
        <td><small class="text-muted">22 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Prospectus Distribution')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
