<?php
/**
 * EDUSYS PRO - Library Resource Dashboard
 * Dedicated view for Chief Librarian: S. Nair (Catalog, Issue/Return Desk & Fines)
 */
$page_title = "Library Resource Dashboard";
$page_desc = "Resource cataloging, barcode scanning desk, and circulation management for S. Nair.";
$active_module = "dashboard";
$active_submodule = "librarian.php";
$depth = 1;

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/sidebar.php';
require_once __DIR__ . '/../includes/topbar.php';
?>

<!-- Librarian Banner -->
<div class="erp-card mb-4 bg-gradient text-dark border-secondary border-opacity-25 shadow-xs" style="background: linear-gradient(135deg, #f5f3ff 0%, #ede9fe 100%);">
  <div class="erp-card-body p-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div class="d-flex align-items-center gap-3">
        <div class="avatar-lg rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center fw-bold font-size-24" style="width: 60px; height: 60px;">
          LB
        </div>
        <div>
          <div class="d-flex align-items-center gap-2 mb-1">
            <h4 class="fw-bold text-dark mb-0">S. Nair</h4>
            <span class="badge bg-secondary text-white font-size-12 px-2.5 py-1 rounded-pill">Chief Librarian</span>
            <span class="badge bg-primary-subtle text-primary border border-primary border-opacity-25 font-size-11">OPAC Online</span>
          </div>
          <div class="font-size-13 text-muted">
            <span>Staff ID: <strong class="text-dark font-mono">LIB-2015-0062</strong></span>
            <span class="mx-2">•</span>
            <span>Collection: <strong class="text-dark">18,450 Titles (42,000 Copies)</strong></span>
            <span class="mx-2">•</span>
            <span>Digital RFID / Barcode: <strong class="text-success">Active Desk</strong></span>
          </div>
        </div>
      </div>
      <div class="d-flex align-items-center gap-2">
        <a href="<?php echo base_url('modules/library/issue-return.php'); ?>" class="btn btn-primary btn-sm fw-bold px-3 py-2 rounded-pill">
          <i class="bi bi-upc-scan me-1"></i> Barcode Issue / Return
        </a>
      </div>
    </div>
  </div>
</div>

<!-- KPI Row: Personalized for Librarian -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Catalog Titles</h6>
        <div class="kpi-value">18,450</div>
        <div class="kpi-trend positive"><i class="bi bi-book"></i> 42,000 Physical Copies</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-book-half"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Issued Today</h6>
        <div class="kpi-value text-success">84 Books</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-right"></i> Active Circulation</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-circle"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Overdue Books</h6>
        <div class="kpi-value text-danger">12 Books</div>
        <div class="kpi-trend negative"><i class="bi bi-clock-history"></i> Late Return Notices</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-exclamation-octagon-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Fine Counter</h6>
        <div class="kpi-value text-warning">₹1,450</div>
        <div class="kpi-trend"><i class="bi bi-currency-rupee"></i> Collected Today</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cash-coin"></i></div>
    </div>
  </div>
</div>

<!-- Overdue Returns Table -->
<div class="erp-card mb-4">
  <div class="erp-card-header">
    <h5 class="erp-card-title"><i class="bi bi-clock-history text-danger"></i> Overdue Books Queue (Pending Returns)</h5>
    <span class="badge bg-danger text-white font-size-11">Fine: ₹5 / day</span>
  </div>
  <div class="erp-table-responsive">
    <table class="erp-table">
      <thead>
        <tr>
          <th>Accession #</th>
          <th>Book Title</th>
          <th>Borrower</th>
          <th>Class</th>
          <th>Due Date</th>
          <th>Overdue Days</th>
          <th>Fine</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><span class="font-mono text-primary fw-bold">ACC-04812</span></td>
          <td><strong>Concepts of Physics (Vol 1) — H.C. Verma</strong></td>
          <td>Rohan Joshi</td>
          <td>Class 9-A</td>
          <td>18 Oct 2024</td>
          <td><span class="badge bg-danger">10 Days Late</span></td>
          <td class="font-mono fw-bold text-danger">₹50.00</td>
        </tr>
        <tr>
          <td><span class="font-mono text-primary fw-bold">ACC-09142</span></td>
          <td><strong>A Brief History of Time — Stephen Hawking</strong></td>
          <td>Kabir Mehta</td>
          <td>Class 6-B</td>
          <td>22 Oct 2024</td>
          <td><span class="badge bg-danger">6 Days Late</span></td>
          <td class="font-mono fw-bold text-danger">₹30.00</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
