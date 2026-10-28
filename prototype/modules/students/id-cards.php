<?php
/**
 * EDUSYS PRO - STUDENT ID CARDS
 * Dedicated operational interface & records management for Student ID Cards
 */
$page_title = "Student ID Cards";
$page_desc = "Smart RFID badge issuance, QR code security encoding, NFC bus pass integration, and reprint queue";
$active_module = "students";
$active_submodule = "id-cards.php";
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
    <h1><i class="bi bi-person-badge-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'id-cards_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-printer-fill me-1"></i> Generate ID Card Batch
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>ID Cards Issued</h6>
        <div class="kpi-value">2,840 Active</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Issued for 2024-25</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-badge"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>RFID Smart Enabled</h6>
        <div class="kpi-value">2,840 Badges</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Library & Gate Tap Sync</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-broadcast-pin"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Reprint Requests</h6>
        <div class="kpi-value">12 Pending</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Damaged / Lost Replacements</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-arrow-repeat"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Card Fee Realized</h6>
        <div class="kpi-value">₹1,200 / Loss</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> ₹14,400 Replacement Fund</div>
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
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search card number, student name, class, blood group...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Card Status</option>
      <option >Printed & Dispatched</option>
      <option >Pending Print Queue</option>
      <option >Lost / Damaged Marked</option>
      <option >Re-issued Card</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active RFID</option>
      <option >In Print Batch</option>
      <option >Blocked / Inactive</option>
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
        <th>Card Serial #</th>
        <th>Student Full Name</th>
        <th>Class & Section</th>
        <th>Roll #</th>
        <th>Blood Group</th>
        <th>Emergency Phone</th>
        <th>Barcode / QR Code</th>
        <th>Card Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">IDC-2024-0001</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Adm #001</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">Roll #01</small></td>
        <td><small class="text-muted font-mono font-size-12">B+ Positive</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98112 34567</span></td>
        <td><small class="text-muted">QR: DPGA-2024-0001</small></td>
        <td><span class="badge-status badge-active">Active RFID</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student ID Cards')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">IDC-2024-0002</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Adm #002</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">Roll #02</small></td>
        <td><small class="text-muted font-mono font-size-12">O+ Positive</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98223 45678</span></td>
        <td><small class="text-muted">QR: DPGA-2024-0002</small></td>
        <td><span class="badge-status badge-active">Active RFID</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student ID Cards')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">IDC-2024-0003</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Adm #003</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">Roll #01</small></td>
        <td><small class="text-muted font-mono font-size-12">A+ Positive</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98334 56789</span></td>
        <td><small class="text-muted">QR: DPGA-2024-0003</small></td>
        <td><span class="badge-status badge-active">Active RFID</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student ID Cards')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">IDC-2024-0004</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Adm #004</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">Roll #02</small></td>
        <td><small class="text-muted font-mono font-size-12">AB+ Positive</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98445 67890</span></td>
        <td><small class="text-muted">QR: DPGA-2024-0004</small></td>
        <td><span class="badge-status badge-active">Active RFID</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student ID Cards')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">IDC-2024-0005</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Adm #005</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - PCM</span></td>
        <td><small class="text-dark">Roll #05</small></td>
        <td><small class="text-muted font-mono font-size-12">O+ Positive</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98556 78901</span></td>
        <td><small class="text-muted">QR: DPGA-2024-0005</small></td>
        <td><span class="badge-status badge-active">Active RFID</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student ID Cards')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">IDC-2024-0006</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Adm #006</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - PCB</span></td>
        <td><small class="text-dark">Roll #08</small></td>
        <td><small class="text-muted font-mono font-size-12">B+ Positive</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98667 89012</span></td>
        <td><small class="text-muted">QR: DPGA-2024-0006</small></td>
        <td><span class="badge-status badge-active">Active RFID</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student ID Cards')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">IDC-2024-0007</td>
        <td>
          <div class="fw-semibold text-dark">Meera Nambiar</div>
          <small class="text-muted font-size-11">Adm #007</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 8 - Section C</span></td>
        <td><small class="text-dark">Roll #14</small></td>
        <td><small class="text-muted font-mono font-size-12">A- Negative</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98778 90123</span></td>
        <td><small class="text-muted">QR: DPGA-2024-0007</small></td>
        <td><span class="badge-status badge-active">Active RFID</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student ID Cards')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">IDC-2024-0008</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Malhotra</div>
          <small class="text-muted font-size-11">Adm #008</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 5 - Section A</span></td>
        <td><small class="text-dark">Roll #11</small></td>
        <td><small class="text-muted font-mono font-size-12">O+ Positive</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98889 01234</span></td>
        <td><small class="text-muted">QR: DPGA-2024-0008</small></td>
        <td><span class="badge-status badge-pending">Re-issue Queue</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Student ID Cards')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
