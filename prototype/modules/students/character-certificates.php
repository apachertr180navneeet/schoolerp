<?php
/**
 * EDUSYS PRO - Character Certificates
 */
$page_title = "Character Certificates";
$page_desc = "Dedicated operational interface & records management for Character Certificates";
$active_module = "students";
$active_submodule = "character-certificates.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'character-certificates_export.csv')" title="Export Table as CSV">
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
        <h6>Total Enrolled</h6>
        <div class="kpi-value">2,840 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Roster Synced</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-backpack-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Boys vs Girls</h6>
        <div class="kpi-value">1,480 / 1,360</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Balanced 52:48 Ratio</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-gender-ambiguous"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>APAAR IDs Linked</h6>
        <div class="kpi-value">2,822 / 2,840</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> 99.4% MoE Validated</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-fingerprint"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>CBSE LOC Registered</h6>
        <div class="kpi-value">420 Board Batches</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Class 10 & 12 Verified</div>
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
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search student by name, admission #, roll no, APAAR ID...">
    </div>
    <select class="form-select" style="max-width: 200px;">
      <option selected>All Academic Grades</option>
      <option >Class 12 - Senior Sec</option>
      <option >Class 11 - Senior Sec</option>
      <option >Class 10 - Secondary</option>
      <option >Class 9 - Secondary</option>
      <option >Classes 6–8 - Middle</option>
      <option >Classes 1–5 - Primary</option>
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
        <th>Scholar / Adm #</th>
        <th>Student Full Name</th>
        <th>Grade & Section</th>
        <th>Roll No</th>
        <th>Father / Guardian</th>
        <th>Emergency Contact</th>
        <th>APAAR / Aadhaar UID</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ED-8491</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Class 10 - Section A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Sec A</span></td>
        <td><small class="text-dark">01</small></td>
        <td><small class="text-muted font-mono font-size-12">Rajesh Sharma</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98112 34567</span></td>
        <td><small class="text-muted">APAAR-8941-0294</small></td>
        <td><span class="badge-status badge-active">Active / Paid</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Character Certificates')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ED-8492</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Class 10 - Section A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Sec A</span></td>
        <td><small class="text-dark">02</small></td>
        <td><small class="text-muted font-mono font-size-12">Bhavin Patel</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98223 45678</span></td>
        <td><small class="text-muted">APAAR-8941-0295</small></td>
        <td><span class="badge-status badge-active">Active / Paid</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Character Certificates')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ED-8493</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Class 10 - Section B</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Sec B</span></td>
        <td><small class="text-dark">01</small></td>
        <td><small class="text-muted font-mono font-size-12">Manpreet Singh</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98334 56789</span></td>
        <td><small class="text-muted">APAAR-8941-0296</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Character Certificates')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ED-8494</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Class 10 - Section B</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Sec B</span></td>
        <td><small class="text-dark">02</small></td>
        <td><small class="text-muted font-mono font-size-12">R. Venkatesh Iyer</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98445 67890</span></td>
        <td><small class="text-muted">APAAR-8941-0297</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Character Certificates')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ED-8495</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Class 12 - PCM</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Sec A</span></td>
        <td><small class="text-dark">14</small></td>
        <td><small class="text-muted font-mono font-size-12">Sanjay Gupta</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98556 78901</span></td>
        <td><small class="text-muted">APAAR-8941-0298</small></td>
        <td><span class="badge-status badge-active">Active / LOC</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Character Certificates')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ED-8496</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Class 12 - PCB</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Sec B</span></td>
        <td><small class="text-dark">08</small></td>
        <td><small class="text-muted font-mono font-size-12">Dr. Alok Verma</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98667 89012</span></td>
        <td><small class="text-muted">APAAR-8941-0299</small></td>
        <td><span class="badge-status badge-active">Active / LOC</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Character Certificates')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ED-8497</td>
        <td>
          <div class="fw-semibold text-dark">Meera Reddy</div>
          <small class="text-muted font-size-11">Class 8 - Section A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 8 - Sec A</span></td>
        <td><small class="text-dark">11</small></td>
        <td><small class="text-muted font-mono font-size-12">K. S. Reddy</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98778 90123</span></td>
        <td><small class="text-muted">APAAR-8941-0300</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Character Certificates')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ED-8498</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Sengupta</div>
          <small class="text-muted font-size-11">Class 9 - Section C</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Sec C</span></td>
        <td><small class="text-dark">06</small></td>
        <td><small class="text-muted font-mono font-size-12">Debashis Sengupta</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98889 01234</span></td>
        <td><small class="text-muted">APAAR-8941-0301</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Character Certificates')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>


<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
