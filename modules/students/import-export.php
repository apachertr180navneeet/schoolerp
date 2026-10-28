<?php
/**
 * EDUSYS PRO - STUDENT IMPORT / EXPORT
 * Bulk CSV/Excel onboarding, UDISE+ and CBSE OASIS data synchronization
 */
$page_title = "Student Import / Export";
$page_desc = "Bulk CSV/Excel onboarding, UDISE+ and CBSE OASIS government compliance exports";
$active_module = "students";
$active_submodule = "import-export.php";
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
    <h1><i class="bi bi-file-earmark-spreadsheet-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Summary">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-success fw-bold" onclick="alert('Downloading CBSE OASIS Bulk Template (.CSV)...')">
      <i class="bi bi-download me-1"></i> Download Template (.CSV)
    </button>
  </div>
</div>

<!-- Import & Export Control Grid -->
<div class="row g-4 mb-4">
  <!-- Bulk Import Card -->
  <div class="col-lg-6">
    <div class="card border-0 shadow-sm p-4 h-100">
      <h5 class="fw-bold text-dark mb-2"><i class="bi bi-cloud-arrow-up text-primary me-2"></i>Bulk Student CSV Import</h5>
      <p class="text-muted font-size-13">Upload bulk scholar manifests adhering to the official CBSE OASIS or UDISE+ column layout.</p>
      
      <div class="border border-2 border-dashed rounded-3 p-4 text-center my-3 bg-light">
        <i class="bi bi-file-earmark-arrow-up text-primary fs-1 d-block mb-2"></i>
        <h6 class="fw-bold mb-1">Drag and drop student CSV or Excel file here</h6>
        <p class="text-muted font-size-12 mb-3">Supports .csv, .xlsx, .xls up to 25 MB</p>
        <input type="file" class="form-control d-none" id="fileUploadInput">
        <button class="btn btn-primary btn-sm px-4 fw-bold" onclick="document.getElementById('fileUploadInput').click();">
          Browse File
        </button>
      </div>

      <div class="d-flex justify-content-between align-items-center mt-auto pt-2">
        <small class="text-muted"><i class="bi bi-info-circle me-1"></i> Auto-validates Aadhaar, DOB, and Wing limits</small>
        <button class="btn btn-primary fw-bold px-4" onclick="alert('File uploaded and validated! 120 records queued for import.')">
          <i class="bi bi-upload me-1"></i> Process Import
        </button>
      </div>
    </div>
  </div>

  <!-- Bulk Export Card -->
  <div class="col-lg-6">
    <div class="card border-0 shadow-sm p-4 h-100">
      <h5 class="fw-bold text-dark mb-2"><i class="bi bi-cloud-arrow-down text-success me-2"></i>Institutional Data Export</h5>
      <p class="text-muted font-size-13">Extract real-time synchronized student directories formatted for official statutory audits.</p>
      
      <div class="list-group font-size-13 my-3">
        <div class="list-group-item d-flex justify-content-between align-items-center py-3">
          <div>
            <div class="fw-bold text-dark">CBSE OASIS Master Student Manifest</div>
            <small class="text-muted">Includes LOC registration, subjects, and APAAR IDs</small>
          </div>
          <button class="btn btn-outline-primary btn-sm fw-bold" onclick="alert('Exporting CBSE OASIS Manifest...')">
            <i class="bi bi-download me-1"></i> Export CSV
          </button>
        </div>
        <div class="list-group-item d-flex justify-content-between align-items-center py-3">
          <div>
            <div class="fw-bold text-dark">UDISE+ Government Portal Student Sync</div>
            <small class="text-muted">Student National PEN code, demographic profiles</small>
          </div>
          <button class="btn btn-outline-success btn-sm fw-bold" onclick="alert('Exporting UDISE+ Sync Dataset...')">
            <i class="bi bi-download me-1"></i> Export Excel
          </button>
        </div>
        <div class="list-group-item d-flex justify-content-between align-items-center py-3">
          <div>
            <div class="fw-bold text-dark">Parent Emergency & Blood Group Directory</div>
            <small class="text-muted">Infirmary and transport disaster response roll</small>
          </div>
          <button class="btn btn-outline-dark btn-sm fw-bold" onclick="alert('Exporting Emergency Directory...')">
            <i class="bi bi-download me-1"></i> Export CSV
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
