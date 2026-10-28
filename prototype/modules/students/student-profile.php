<?php
/**
 * EDUSYS PRO - STUDENT PROFILE 360°
 * Comprehensive 360-degree holistic dossier for active scholars
 */
$page_title = "Student Profile 360°";
$page_desc = "Holistic 360-degree student record: Academics, attendance logs, fee clearances, and co-curricular awards";
$active_module = "students";
$active_submodule = "student-profile.php";
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
    <h1><i class="bi bi-person-bounding-box text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/students/student-directory.php'); ?>" class="btn btn-light border">
      <i class="bi bi-people me-1"></i> Directory
    </a>
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Dossier">
      <i class="bi bi-printer me-1"></i> Print Dossier
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#editRecordModal">
      <i class="bi bi-pencil-square me-1"></i> Edit Dossier
    </button>
  </div>
</div>

<!-- Student Header Card -->
<div class="card border-0 shadow-sm p-4 mb-4">
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
    <div class="d-flex align-items-center gap-3">
      <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold fs-2" style="width: 80px; height: 80px;">
        AS
      </div>
      <div>
        <h4 class="fw-bold mb-1 text-dark">Aarav Sharma <span class="badge bg-success-subtle text-success border font-size-12">Active Scholar</span></h4>
        <div class="text-muted font-size-13">
          <span class="me-3"><strong>Scholar #:</strong> ADM-2024-001</span>
          <span class="me-3"><strong>Grade:</strong> Class 10 - Section A</span>
          <span class="me-3"><strong>Roll #:</strong> 01</span>
          <span><strong>House:</strong> <span class="text-danger fw-bold">Agni House</span></span>
        </div>
      </div>
    </div>
    <div class="d-flex gap-2">
      <div class="text-end">
        <small class="text-muted d-block">APAAR ID (MoE One ID)</small>
        <span class="font-mono fw-bold text-primary">8491 2049 1042</span>
      </div>
    </div>
  </div>
</div>

<!-- Profile Tabs -->
<div class="card border-0 shadow-sm p-4 mb-4">
  <ul class="nav nav-tabs font-size-14 fw-bold mb-4" id="profileTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab">
        <i class="bi bi-info-circle me-1"></i> Personal & Parents
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="academics-tab" data-bs-toggle="tab" data-bs-target="#academics" type="button" role="tab">
        <i class="bi bi-mortarboard me-1"></i> Academic Performance
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="attendance-tab" data-bs-toggle="tab" data-bs-target="#attendance" type="button" role="tab">
        <i class="bi bi-calendar-check me-1"></i> Attendance Log (96.4%)
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents" type="button" role="tab">
        <i class="bi bi-folder-check me-1"></i> Documents Locker (4)
      </button>
    </li>
  </ul>

  <div class="tab-content" id="profileTabContent">
    <!-- Overview Tab -->
    <div class="tab-pane fade show active" id="overview" role="tabpanel">
      <div class="row g-4">
        <div class="col-md-6">
          <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">Student Demographics</h6>
          <table class="table table-sm table-borderless font-size-13">
            <tr><td class="text-muted" width="40%">Date of Birth:</td><td class="fw-semibold">14 May 2009 (15 Years)</td></tr>
            <tr><td class="text-muted">Gender:</td><td class="fw-semibold">Male</td></tr>
            <tr><td class="text-muted">Blood Group:</td><td class="fw-semibold text-danger">B+ Positive</td></tr>
            <tr><td class="text-muted">Social Category:</td><td class="fw-semibold">General Category</td></tr>
            <tr><td class="text-muted">Mother Tongue:</td><td class="fw-semibold">Hindi & English</td></tr>
            <tr><td class="text-muted">Emergency Hotline:</td><td class="fw-semibold font-mono text-primary">+91 98112 34567</td></tr>
          </table>
        </div>
        <div class="col-md-6">
          <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">Family & Guardians</h6>
          <table class="table table-sm table-borderless font-size-13">
            <tr><td class="text-muted" width="40%">Father's Name:</td><td class="fw-semibold">Rajesh Sharma (Sr. Director, IT)</td></tr>
            <tr><td class="text-muted">Mother's Name:</td><td class="fw-semibold">Poonam Sharma (Professor)</td></tr>
            <tr><td class="text-muted">Primary Phone:</td><td class="fw-semibold font-mono">+91 98112 34567</td></tr>
            <tr><td class="text-muted">Email:</td><td class="fw-semibold">rajesh.sharma@gmail.com</td></tr>
            <tr><td class="text-muted">Residential Address:</td><td class="fw-semibold">Sector 14, Knowledge City, Dwarka, New Delhi</td></tr>
          </table>
        </div>
      </div>
    </div>

    <!-- Academics Tab -->
    <div class="tab-pane fade" id="academics" role="tabpanel">
      <h6 class="fw-bold text-dark mb-3">Term Assessments & Periodic Tests (Class 10)</h6>
      <div class="table-responsive">
        <table class="table table-bordered align-middle font-size-13">
          <thead class="table-light">
            <tr>
              <th>Subject</th>
              <th>Periodic Test 1 (20)</th>
              <th>Mid-Term Exam (80)</th>
              <th>Periodic Test 2 (20)</th>
              <th>Total (100)</th>
              <th>Grade</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>English Communicative</td><td>19/20</td><td>74/80</td><td>18/20</td><td>93/100</td><td><span class="badge bg-success">A1</span></td></tr>
            <tr><td>Mathematics (Standard)</td><td>20/20</td><td>78/80</td><td>20/20</td><td>98/100</td><td><span class="badge bg-success">A1</span></td></tr>
            <tr><td>Science (Theory & Pract)</td><td>19/20</td><td>75/80</td><td>19/20</td><td>94/100</td><td><span class="badge bg-success">A1</span></td></tr>
            <tr><td>Social Science</td><td>18/20</td><td>72/80</td><td>18/20</td><td>90/100</td><td><span class="badge bg-success">A1</span></td></tr>
            <tr><td>Hindi Course-A</td><td>18/20</td><td>70/80</td><td>19/20</td><td>89/100</td><td><span class="badge bg-primary">A2</span></td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Attendance Tab -->
    <div class="tab-pane fade" id="attendance" role="tabpanel">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold text-dark mb-0">Cumulative Session Attendance: 162 of 168 Days (96.4%)</h6>
        <span class="badge bg-success">Eligible for CBSE Board Exam (Above 75%)</span>
      </div>
      <div class="progress mb-3" style="height: 12px;">
        <div class="progress-bar bg-success" role="progressbar" style="width: 96.4%;">96.4%</div>
      </div>
      <small class="text-muted">Total working days: 168 | Present: 162 | Medical Leave: 4 | Unexcused: 2</small>
    </div>

    <!-- Documents Tab -->
    <div class="tab-pane fade" id="documents" role="tabpanel">
      <h6 class="fw-bold text-dark mb-3">Verified Document Vault</h6>
      <div class="row g-3">
        <div class="col-md-6">
          <div class="p-3 bg-light rounded-3 border d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-bold text-dark"><i class="bi bi-file-earmark-pdf text-danger me-1"></i> Municipal Birth Certificate</div>
              <small class="text-muted">Verified by MCD &bull; 1.2 MB</small>
            </div>
            <button class="btn btn-sm btn-outline-primary" onclick="alert('Downloading Document...')"><i class="bi bi-download"></i></button>
          </div>
        </div>
        <div class="col-md-6">
          <div class="p-3 bg-light rounded-3 border d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-bold text-dark"><i class="bi bi-file-earmark-pdf text-danger me-1"></i> Aadhaar Card Copy</div>
              <small class="text-muted">UIDAI e-KYC Verified &bull; 840 KB</small>
            </div>
            <button class="btn btn-sm btn-outline-primary" onclick="alert('Downloading Document...')"><i class="bi bi-download"></i></button>
          </div>
        </div>
        <div class="col-md-6">
          <div class="p-3 bg-light rounded-3 border d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-bold text-dark"><i class="bi bi-file-earmark-pdf text-danger me-1"></i> Class 9 Annual Marks Transcript</div>
              <small class="text-muted">CBSE LOC Verified &bull; 1.8 MB</small>
            </div>
            <button class="btn btn-sm btn-outline-primary" onclick="alert('Downloading Document...')"><i class="bi bi-download"></i></button>
          </div>
        </div>
        <div class="col-md-6">
          <div class="p-3 bg-light rounded-3 border d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-bold text-dark"><i class="bi bi-file-earmark-pdf text-danger me-1"></i> Medical Fitness & Vaccine Record</div>
              <small class="text-muted">Infirmary Approved &bull; 920 KB</small>
            </div>
            <button class="btn btn-sm btn-outline-primary" onclick="alert('Downloading Document...')"><i class="bi bi-download"></i></button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
