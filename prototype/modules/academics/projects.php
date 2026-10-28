<?php
/**
 * EDUSYS PRO - PROJECTS & LAB WORK
 * Dedicated operational interface & records management for Projects & Lab Work
 */
$page_title = "Projects & Lab Work";
$page_desc = "CBSE internal assessment portfolios, science fair working models, and Atal Tinkering Lab innovations";
$active_module = "academics";
$active_submodule = "projects.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/academics/dashboard.php'); ?>">Academic Management</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-tools text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'projects_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Add Lab Project
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Active Projects</h6>
        <div class="kpi-value">42 Lab Models</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Working Science & AI Prototypes</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cpu-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>CBSE Internal Ready</h6>
        <div class="kpi-value">100% Portfolios</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 20-30 Marks Verified</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-patch-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>ATL Patents / Models</h6>
        <div class="kpi-value">8 Inventions</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> National Science Congress Nom</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-trophy-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Faculty Mentors</h6>
        <div class="kpi-value">24 Incharges</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Weekly Lab Guidance</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-workspace"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search project code, title, subject, mentor...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Laboratories</option>
      <option >Atal Tinkering Lab (Robotics)</option>
      <option >Physics Research Lab</option>
      <option >Chemistry Experimental Lab</option>
      <option >Biology / Biotech Lab</option>
      <option >Computer Science Lab</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Prototype Completed</option>
      <option >In Experimentation</option>
      <option >Submitted for Grading</option>
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
        <th>Project Code</th>
        <th>Project Title & Domain</th>
        <th>Grade & Subject</th>
        <th>Team Size</th>
        <th>Submission Deadline</th>
        <th>CBSE Internal Marks</th>
        <th>Mentor Faculty</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRJ-ATL-01</td>
        <td>
          <div class="fw-semibold text-dark">Automated Plant Watering via Soil Moisture IoT</div>
          <small class="text-muted font-size-11">Arduino & ESP8266 Sensor Model</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - ATL Robotics</span></td>
        <td><small class="text-dark">3 Students Team</small></td>
        <td><small class="text-muted font-mono font-size-12">15 Nov 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">20 / 20 Internal</span></td>
        <td><small class="text-muted">Mr. Kunal Bansal (MCA)</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Projects & Lab Work')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRJ-PHY-02</td>
        <td>
          <div class="fw-semibold text-dark">Wireless Power Transmission via Tesla Coil</div>
          <small class="text-muted font-size-11">Resonant Inductive Coupling</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Physics Core</span></td>
        <td><small class="text-dark">2 Students Team</small></td>
        <td><small class="text-muted font-mono font-size-12">20 Nov 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">30 / 30 Board Pract</span></td>
        <td><small class="text-muted">Dr. K. L. Sharma (PGT)</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Projects & Lab Work')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRJ-CHEM-03</td>
        <td>
          <div class="fw-semibold text-dark">Extraction of Essential Oils from Spices</div>
          <small class="text-muted font-size-11">Steam Distillation Apparatus</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Chemistry</span></td>
        <td><small class="text-dark">2 Students Team</small></td>
        <td><small class="text-muted font-mono font-size-12">18 Nov 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">30 / 30 Board Pract</span></td>
        <td><small class="text-muted">Mr. Vikram Rathore (PGT)</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Projects & Lab Work')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRJ-BIO-04</td>
        <td>
          <div class="fw-semibold text-dark">Bacterial Water Contamination Testing (E. coli)</div>
          <small class="text-muted font-size-11">Membrane Filtration Culture</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Biology</span></td>
        <td><small class="text-dark">2 Students Team</small></td>
        <td><small class="text-muted font-mono font-size-12">18 Nov 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">30 / 30 Board Pract</span></td>
        <td><small class="text-muted">Mrs. Radhika Iyer (PGT)</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Projects & Lab Work')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRJ-CS-05</td>
        <td>
          <div class="fw-semibold text-dark">AI Facial Recognition for Attendance</div>
          <small class="text-muted font-size-11">OpenCV, Python, SQLite Database</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - CS (083)</span></td>
        <td><small class="text-dark">1 Scholar Project</small></td>
        <td><small class="text-muted font-mono font-size-12">25 Nov 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">30 / 30 Board Pract</span></td>
        <td><small class="text-muted">Mr. Kunal Bansal (MCA)</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Projects & Lab Work')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRJ-SST-06</td>
        <td>
          <div class="fw-semibold text-dark">Water Conservation Heritage in Bawlis of Delhi</div>
          <small class="text-muted font-size-11">Archaeological Survey Study</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Social Science</span></td>
        <td><small class="text-dark">4 Students Team</small></td>
        <td><small class="text-muted font-mono font-size-12">10 Nov 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">20 / 20 Internal</span></td>
        <td><small class="text-muted">Mrs. Shalini Verma (TGT)</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Projects & Lab Work')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRJ-COMM-07</td>
        <td>
          <div class="fw-semibold text-dark">FinTech App Business Model & Balance Sheet</div>
          <small class="text-muted font-size-11">UPI Market Penetration Analysis</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Commerce</span></td>
        <td><small class="text-dark">2 Students Team</small></td>
        <td><small class="text-muted font-mono font-size-12">22 Nov 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">20 / 20 Internal</span></td>
        <td><small class="text-muted">Mr. M. K. Chawla (PGT)</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Projects & Lab Work')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">PRJ-ATL-08</td>
        <td>
          <div class="fw-semibold text-dark">Smart Blind Stick with Ultrasonic Obstacle Radar</div>
          <small class="text-muted font-size-11">Haptic Feedback & Buzzer</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - ATL Innovation</span></td>
        <td><small class="text-dark">3 Students Team</small></td>
        <td><small class="text-muted font-mono font-size-12">12 Nov 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">20 / 20 Internal</span></td>
        <td><small class="text-muted">Mr. Kunal Bansal (MCA)</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Projects & Lab Work')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
