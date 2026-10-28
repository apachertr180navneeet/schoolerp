<?php
/**
 * EDUSYS PRO - CHARACTER CERTIFICATES
 * Dedicated operational interface & records management for Character Certificates
 */
$page_title = "Character Certificates";
$page_desc = "Moral conduct certifications, disciplinary testimonials, and leadership endorsements for graduating scholars";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/students/dashboard.php'); ?>">Student Information System</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-award-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Certificate">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'character-certificates_export.csv')" title="Export Registry">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-award me-1"></i> Issue Character Certificate
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Certificates Dispatched</h6>
        <div class="kpi-value">218 Endorsements</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Senior Secondary Batch</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-award"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Exemplary Conduct</h6>
        <div class="kpi-value">94.2% Scholars</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Zero Disciplinary Flag</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-star-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Student Council Mentions</h6>
        <div class="kpi-value">42 Prefects</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Leadership Documented</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-badge-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>University Admissions</h6>
        <div class="kpi-value">100% Accepted</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> DU, IIT, Foreign Unis</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-mortarboard-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search certificate #, student, conduct remarks, session...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Conduct Standards</option>
      <option >Exemplary & Outstanding</option>
      <option >Very Good Conduct</option>
      <option >Good Standing</option>
      <option >Prefect / Council Honour</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Signed by Principal</option>
      <option >Under Scrutiny</option>
      <option >Draft</option>
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
        <th>Certificate #</th>
        <th>Student Full Name</th>
        <th>Academic Batch</th>
        <th>Conduct Remarks</th>
        <th>Co-curricular Honours</th>
        <th>Authorized Signatory</th>
        <th>Issue Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CHR-2024-0218</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Adm #005</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">2023-2024 (Class 12)</span></td>
        <td><small class="text-dark">Exemplary Moral Conduct & Diligence</small></td>
        <td><small class="text-muted font-mono font-size-12">Head Boy & Science Olympiad Gold</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. Ananya Roy (Principal)</span></td>
        <td><small class="text-muted">28 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Character Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CHR-2024-0217</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Adm #006</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">2023-2024 (Class 12)</span></td>
        <td><small class="text-dark">Outstanding Conduct & Empathy</small></td>
        <td><small class="text-muted font-mono font-size-12">Captain - Football Team</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. Ananya Roy (Principal)</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Character Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CHR-2024-0216</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Adm #001</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">2024-2025 (Class 10)</span></td>
        <td><small class="text-dark">Very Good Standing & Helpful</small></td>
        <td><small class="text-muted font-mono font-size-12">Junior House Prefect - Agni</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. Ananya Roy (Principal)</span></td>
        <td><small class="text-muted">26 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Character Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CHR-2024-0215</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Adm #002</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">2024-2025 (Class 10)</span></td>
        <td><small class="text-dark">Exemplary Conduct & High Integrity</small></td>
        <td><small class="text-muted font-mono font-size-12">Debating Society Secretary</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. Ananya Roy (Principal)</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Character Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CHR-2024-0214</td>
        <td>
          <div class="fw-semibold text-dark">Prisha Nair</div>
          <small class="text-muted font-size-11">Adm #014</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">2023-2024 (Class 12)</span></td>
        <td><small class="text-dark">Outstanding Dedication & Sincerity</small></td>
        <td><small class="text-muted font-mono font-size-12">Commerce Club President</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. Ananya Roy (Principal)</span></td>
        <td><small class="text-muted">24 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Character Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CHR-2024-0213</td>
        <td>
          <div class="fw-semibold text-dark">Arya Deshmukh</div>
          <small class="text-muted font-size-11">Adm #015</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">2024-2025 (Class 9)</span></td>
        <td><small class="text-dark">Very Good Character & Punctuality</small></td>
        <td><small class="text-muted font-mono font-size-12">NCC Cadet Sergeant</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. Ananya Roy (Principal)</span></td>
        <td><small class="text-muted">23 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Character Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CHR-2024-0212</td>
        <td>
          <div class="fw-semibold text-dark">Zara Khan</div>
          <small class="text-muted font-size-11">Adm #018</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">2023-2024 (Class 12)</span></td>
        <td><small class="text-dark">Exemplary Conduct & Leadership</small></td>
        <td><small class="text-muted font-mono font-size-12">Model United Nations Lead</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. Ananya Roy (Principal)</span></td>
        <td><small class="text-muted">22 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Character Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CHR-2024-0211</td>
        <td>
          <div class="fw-semibold text-dark">Tushar Sengupta</div>
          <small class="text-muted font-size-11">Adm #1412</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">2024-2025 (Class 8)</span></td>
        <td><small class="text-dark">Good Standing During Enrollment</small></td>
        <td><small class="text-muted font-mono font-size-12">Robotics Club Member</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. Ananya Roy (Principal)</span></td>
        <td><small class="text-muted">18 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Issued</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Character Certificates')" title="Revoke"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
