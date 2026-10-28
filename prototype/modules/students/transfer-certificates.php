<?php
/**
 * EDUSYS PRO - TRANSFER CERTIFICATES (TC)
 * Dedicated operational interface & records management for Transfer Certificates (TC)
 */
$page_title = "Transfer Certificates (TC)";
$page_desc = "CBSE Affiliation Bye-Laws compliant Transfer Certificate registry with QR code and counter-signatures";
$active_module = "students";
$active_submodule = "transfer-certificates.php";
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
    <h1><i class="bi bi-file-earmark-check-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Certificate">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'transfer-certificates_export.csv')" title="Export Registry">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-file-earmark-plus-fill me-1"></i> Generate Statutory TC
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>TCs Dispatched</h6>
        <div class="kpi-value">18 Statutory TCs</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Counter-Signed</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-file-earmark-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>DEO Counter-Sign</h6>
        <div class="kpi-value">18 Approved</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Education Dept Validated</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-patch-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Average Turnaround</h6>
        <div class="kpi-value">48 Hours</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Post No-Dues Clearance</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-stopwatch-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>QR Verifiable TCs</h6>
        <div class="kpi-value">100% Online</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Public Board Portal Check</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-qr-code"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search TC #, student name, admission #, reason...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Certificate Years</option>
      <option >Academic Session 2024-25</option>
      <option >Academic Session 2023-24</option>
      <option >Academic Session 2022-23</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Dispatched to Parent</option>
      <option >Counter-Signed Ready</option>
      <option >Draft TC</option>
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
        <th>TC Serial #</th>
        <th>Student Full Name</th>
        <th>Admission #</th>
        <th>Date of Admission</th>
        <th>Date of Leaving</th>
        <th>Reason for Exit</th>
        <th>Conduct & Character</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TC-2024-0018</td>
        <td>
          <div class="fw-semibold text-dark">Tushar Sengupta</div>
          <small class="text-muted font-size-11">Class 8-B</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">ADM-2021-1412</span></td>
        <td><small class="text-dark">08 Apr 2021</small></td>
        <td><small class="text-muted font-mono font-size-12">18 Oct 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Parent Relocation to London</span></td>
        <td><small class="text-muted">Exemplary & Diligent</small></td>
        <td><span class="badge-status badge-active">Issued & Sealed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transfer Certificates (TC)')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TC-2024-0017</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Dixit</div>
          <small class="text-muted font-size-11">Class 5-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">ADM-2022-1912</span></td>
        <td><small class="text-dark">05 Apr 2022</small></td>
        <td><small class="text-muted font-mono font-size-12">12 Oct 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Parent Relocation to Bengaluru</span></td>
        <td><small class="text-muted">Very Good Conduct</small></td>
        <td><span class="badge-status badge-active">Issued & Sealed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transfer Certificates (TC)')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TC-2024-0016</td>
        <td>
          <div class="fw-semibold text-dark">Simran Kaur</div>
          <small class="text-muted font-size-11">Class 3-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">ADM-2023-1481</span></td>
        <td><small class="text-dark">10 Apr 2023</small></td>
        <td><small class="text-muted font-mono font-size-12">01 Oct 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Shifted to Boarding School</span></td>
        <td><small class="text-muted">Good Conduct</small></td>
        <td><span class="badge-status badge-active">Issued & Sealed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transfer Certificates (TC)')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TC-2024-0015</td>
        <td>
          <div class="fw-semibold text-dark">Aakash Chopra</div>
          <small class="text-muted font-size-11">Class 11-Comm</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">ADM-2019-0920</span></td>
        <td><small class="text-dark">12 Apr 2019</small></td>
        <td><small class="text-muted font-mono font-size-12">25 Sep 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Competitive Exam Preparation</span></td>
        <td><small class="text-muted">Exemplary Conduct</small></td>
        <td><span class="badge-status badge-active">Issued & Sealed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transfer Certificates (TC)')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TC-2024-0014</td>
        <td>
          <div class="fw-semibold text-dark">Aryan Oberoi</div>
          <small class="text-muted font-size-11">Class 9-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">ADM-2021-0482</span></td>
        <td><small class="text-dark">15 Apr 2021</small></td>
        <td><small class="text-muted font-mono font-size-12">15 Sep 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Joining International IB School</span></td>
        <td><small class="text-muted">Very Good Conduct</small></td>
        <td><span class="badge-status badge-active">Issued & Sealed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transfer Certificates (TC)')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TC-2024-0013</td>
        <td>
          <div class="fw-semibold text-dark">Nandini Gupta</div>
          <small class="text-muted font-size-11">Class 2-B</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">ADM-2023-1049</span></td>
        <td><small class="text-dark">08 Apr 2023</small></td>
        <td><small class="text-muted font-mono font-size-12">10 Sep 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Parent Transfer to Singapore</span></td>
        <td><small class="text-muted">Exemplary Conduct</small></td>
        <td><span class="badge-status badge-active">Issued & Sealed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transfer Certificates (TC)')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TC-2024-0012</td>
        <td>
          <div class="fw-semibold text-dark">Karan Malhotra</div>
          <small class="text-muted font-size-11">Class 10-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">ADM-2018-0812</span></td>
        <td><small class="text-dark">10 Apr 2018</small></td>
        <td><small class="text-muted font-mono font-size-12">28 Aug 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Family Migration to Canada</span></td>
        <td><small class="text-muted">Diligent & Helpful</small></td>
        <td><span class="badge-status badge-active">Issued & Sealed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transfer Certificates (TC)')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TC-2024-0011</td>
        <td>
          <div class="fw-semibold text-dark">Priya Sundaram</div>
          <small class="text-muted font-size-11">Class 7-C</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">ADM-2020-0419</span></td>
        <td><small class="text-dark">14 Apr 2020</small></td>
        <td><small class="text-muted font-mono font-size-12">20 Aug 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Parent Relocation to Chennai</span></td>
        <td><small class="text-muted">Very Good Conduct</small></td>
        <td><span class="badge-status badge-active">Issued & Sealed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transfer Certificates (TC)')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
