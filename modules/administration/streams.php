<?php
/**
 * EDUSYS PRO - Senior Secondary Streams & Specializations
 * Science, Commerce & Humanities curriculum streams, subject combinations & seat quotas
 */
$page_title = "Streams & Specializations";
$page_desc = "Senior secondary (Grades 11 & 12) academic streams, elective subject baskets & seat allocations";
$active_module = "administration";
$active_submodule = "streams.php";
$depth = 2;
$hide_common_modals = true;

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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/administration/school-profile.php'); ?>">Administration</a></li>
      <li class="breadcrumb-item active" aria-current="page">Streams &amp; Specializations</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-compass-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="window.print()" title="Print Streams Matrix">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewStreamModal">
      <i class="bi bi-plus-lg me-1"></i> Add Academic Stream
    </button>
  </div>
</div>

<!-- KPI Cards -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Offered Streams</h6>
        <div class="kpi-value">5 Streams</div>
        <div class="kpi-trend positive"><i class="bi bi-check2-circle"></i> CBSE Recognized</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-mortarboard-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Senior Sec Enrolled</h6>
        <div class="kpi-value">403 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-people"></i> Classes 11 &amp; 12</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-lines-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Available Electives</h6>
        <div class="kpi-value">18 Subjects</div>
        <div class="kpi-trend positive"><i class="bi bi-book-half"></i> NEP 2020 Compliant</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-collection"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Sanctioned Seats</h6>
        <div class="kpi-value">440 Seats</div>
        <div class="kpi-trend neutral"><i class="bi bi-bar-chart"></i> 91.6% Filled</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-pie-chart-fill"></i></div>
    </div>
  </div>
</div>

<!-- Stream Cards Matrix -->
<div class="row g-4 mb-4">
  <!-- Stream 1: Science PCM -->
  <div class="col-lg-6">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <div class="d-flex align-items-center gap-2">
          <div class="p-2 bg-primary-subtle text-primary rounded-3"><i class="bi bi-cpu-fill fs-4"></i></div>
          <div>
            <h5 class="erp-card-title mb-0">Science (PCM + CS/AI)</h5>
            <small class="text-muted">Engineering &amp; Pure Sciences Focus</small>
          </div>
        </div>
        <span class="badge bg-success-subtle text-success border border-success-subtle">Active • 160 Seats</span>
      </div>
      <div class="erp-card-body">
        <div class="mb-3">
          <div class="font-size-12 fw-bold text-muted mb-1 uppercase">Compulsory Core Subjects:</div>
          <div class="d-flex flex-wrap gap-2">
            <span class="badge bg-light text-primary border">English Core (301)</span>
            <span class="badge bg-light text-primary border">Physics (042)</span>
            <span class="badge bg-light text-primary border">Chemistry (043)</span>
            <span class="badge bg-light text-primary border">Mathematics (041)</span>
          </div>
        </div>
        <div class="mb-3">
          <div class="font-size-12 fw-bold text-muted mb-1 uppercase">Elective Basket (Choose 1):</div>
          <div class="d-flex flex-wrap gap-2">
            <span class="badge bg-light text-dark border">Computer Science (083)</span>
            <span class="badge bg-light text-dark border">Artificial Intelligence (843)</span>
            <span class="badge bg-light text-dark border">Physical Education (048)</span>
            <span class="badge bg-light text-dark border">Economics (030)</span>
          </div>
        </div>
        <div class="d-flex justify-content-between font-size-13 text-muted pt-2 border-top">
          <span>Enrolled: <strong>148 / 160</strong> (92.5%)</span>
          <span>Lead Coordinator: <strong>Mr. Vikram Rathore</strong></span>
        </div>
      </div>
    </div>
  </div>

  <!-- Stream 2: Science PCB -->
  <div class="col-lg-6">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <div class="d-flex align-items-center gap-2">
          <div class="p-2 bg-success-subtle text-success rounded-3"><i class="bi bi-heart-pulse-fill fs-4"></i></div>
          <div>
            <h5 class="erp-card-title mb-0">Science (PCB + Biotech/Psy)</h5>
            <small class="text-muted">Medical &amp; Life Sciences Focus</small>
          </div>
        </div>
        <span class="badge bg-success-subtle text-success border border-success-subtle">Active • 80 Seats</span>
      </div>
      <div class="erp-card-body">
        <div class="mb-3">
          <div class="font-size-12 fw-bold text-muted mb-1 uppercase">Compulsory Core Subjects:</div>
          <div class="d-flex flex-wrap gap-2">
            <span class="badge bg-light text-success border">English Core (301)</span>
            <span class="badge bg-light text-success border">Physics (042)</span>
            <span class="badge bg-light text-success border">Chemistry (043)</span>
            <span class="badge bg-light text-success border">Biology (044)</span>
          </div>
        </div>
        <div class="mb-3">
          <div class="font-size-12 fw-bold text-muted mb-1 uppercase">Elective Basket (Choose 1):</div>
          <div class="d-flex flex-wrap gap-2">
            <span class="badge bg-light text-dark border">Biotechnology (045)</span>
            <span class="badge bg-light text-dark border">Psychology (037)</span>
            <span class="badge bg-light text-dark border">Physical Education (048)</span>
          </div>
        </div>
        <div class="d-flex justify-content-between font-size-13 text-muted pt-2 border-top">
          <span>Enrolled: <strong>74 / 80</strong> (92.5%)</span>
          <span>Lead Coordinator: <strong>Mrs. Nandini Mathur</strong></span>
        </div>
      </div>
    </div>
  </div>

  <!-- Stream 3: Commerce -->
  <div class="col-lg-6">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <div class="d-flex align-items-center gap-2">
          <div class="p-2 bg-warning-subtle text-warning rounded-3"><i class="bi bi-cash-coin fs-4"></i></div>
          <div>
            <h5 class="erp-card-title mb-0">Commerce (Fin &amp; Management)</h5>
            <small class="text-muted">Chartered Accountancy, Finance &amp; Business</small>
          </div>
        </div>
        <span class="badge bg-success-subtle text-success border border-success-subtle">Active • 120 Seats</span>
      </div>
      <div class="erp-card-body">
        <div class="mb-3">
          <div class="font-size-12 fw-bold text-muted mb-1 uppercase">Compulsory Core Subjects:</div>
          <div class="d-flex flex-wrap gap-2">
            <span class="badge bg-light text-warning border">English Core (301)</span>
            <span class="badge bg-light text-warning border">Accountancy (055)</span>
            <span class="badge bg-light text-warning border">Business Studies (054)</span>
            <span class="badge bg-light text-warning border">Economics (030)</span>
          </div>
        </div>
        <div class="mb-3">
          <div class="font-size-12 fw-bold text-muted mb-1 uppercase">Elective Basket (Choose 1):</div>
          <div class="d-flex flex-wrap gap-2">
            <span class="badge bg-light text-dark border">Applied Mathematics (241)</span>
            <span class="badge bg-light text-dark border">Informatics Practices (065)</span>
            <span class="badge bg-light text-dark border">Entrepreneurship (066)</span>
            <span class="badge bg-light text-dark border">Physical Education (048)</span>
          </div>
        </div>
        <div class="d-flex justify-content-between font-size-13 text-muted pt-2 border-top">
          <span>Enrolled: <strong>112 / 120</strong> (93.3%)</span>
          <span>Lead Coordinator: <strong>Mr. M. K. Aggarwal</strong></span>
        </div>
      </div>
    </div>
  </div>

  <!-- Stream 4: Humanities / Arts -->
  <div class="col-lg-6">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <div class="d-flex align-items-center gap-2">
          <div class="p-2 bg-info-subtle text-info rounded-3"><i class="bi bi-bank fs-4"></i></div>
          <div>
            <h5 class="erp-card-title mb-0">Humanities &amp; Liberal Arts</h5>
            <small class="text-muted">Civil Services, Law &amp; Social Sciences</small>
          </div>
        </div>
        <span class="badge bg-success-subtle text-success border border-success-subtle">Active • 80 Seats</span>
      </div>
      <div class="erp-card-body">
        <div class="mb-3">
          <div class="font-size-12 fw-bold text-muted mb-1 uppercase">Compulsory Core Subjects:</div>
          <div class="d-flex flex-wrap gap-2">
            <span class="badge bg-light text-info border">English Core (301)</span>
            <span class="badge bg-light text-info border">History (027)</span>
            <span class="badge bg-light text-info border">Political Science (028)</span>
            <span class="badge bg-light text-info border">Psychology (037)</span>
          </div>
        </div>
        <div class="mb-3">
          <div class="font-size-12 fw-bold text-muted mb-1 uppercase">Elective Basket (Choose 1):</div>
          <div class="d-flex flex-wrap gap-2">
            <span class="badge bg-light text-dark border">Sociology (039)</span>
            <span class="badge bg-light text-dark border">Economics (030)</span>
            <span class="badge bg-light text-dark border">Legal Studies (074)</span>
            <span class="badge bg-light text-dark border">Fine Arts / Painting (049)</span>
          </div>
        </div>
        <div class="d-flex justify-content-between font-size-13 text-muted pt-2 border-top">
          <span>Enrolled: <strong>69 / 80</strong> (86.3%)</span>
          <span>Lead Coordinator: <strong>Mrs. Sunayana Malhotra</strong></span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal: Add New Stream -->
<div class="modal fade" id="addNewStreamModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-plus-circle text-primary me-2"></i>Add Academic Stream</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form onsubmit="handleNewStream(event)">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Stream Name <span class="required">*</span></label>
            <input type="text" class="form-control" id="newStreamName" placeholder="e.g. Science (PCB + AI)" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Total Sanctioned Seats</label>
            <input type="number" class="form-control font-mono" id="newStreamSeats" value="40" min="20" max="200">
          </div>
          <div class="mb-3">
            <label class="form-label">Compulsory Core Subjects</label>
            <textarea class="form-control" id="newStreamCore" rows="2" placeholder="e.g. English, Physics, Chemistry, Biology"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Stream Faculty Incharge</label>
            <input type="text" class="form-control" id="newStreamIncharge" placeholder="e.g. Dr. Sunita Rao">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-check-lg me-1"></i> Save Stream</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function handleNewStream(e) {
  e.preventDefault();
  const name = document.getElementById('newStreamName').value.trim();
  bootstrap.Modal.getInstance(document.getElementById('addNewStreamModal')).hide();
  if (window.EduApp && window.EduApp.toast) {
    EduApp.toast(`Academic stream "${name}" configured successfully!`, "success", "Streams Master");
  }
}
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
