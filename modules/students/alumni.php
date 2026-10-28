<?php
/**
 * EDUSYS PRO - ALUMNI MANAGEMENT
 * Dedicated operational interface & records management for Alumni Management
 */
$page_title = "Alumni Management";
$page_desc = "Graduated scholar registry, higher education university placements, career tracking, and alumni chapter events";
$active_module = "students";
$active_submodule = "alumni.php";
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
    <h1><i class="bi bi-mortarboard text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'alumni_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-person-plus me-1"></i> Register Alumni Scholar
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Alumni Registered</h6>
        <div class="kpi-value">1,840 Scholars</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Batches 2014 to 2024</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-mortarboard-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Tier-1 Placements</h6>
        <div class="kpi-value">482 Scholars</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> IIT, AIIMS, IIM, BITS, SRCC</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-trophy-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Global Universities</h6>
        <div class="kpi-value">184 Abroad</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> MIT, Oxford, Stanford, NUS</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-globe2"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Mentorship Network</h6>
        <div class="kpi-value">148 Active Mentors</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Guiding Current Grade 12s</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search alumni, passing batch, college, designation, city...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Graduating Batches</option>
      <option >Batch 2024 (Class 12)</option>
      <option >Batch 2023 (Class 12)</option>
      <option >Batch 2022 (Class 12)</option>
      <option >Batch 2021 (Class 12)</option>
      <option >Batches 2015 - 2020</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Verified Alumni Profile</option>
      <option >Mentor Registered</option>
      <option >Contact Update Req</option>
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
        <th>Alumni ID</th>
        <th>Scholar Full Name</th>
        <th>Graduation Batch</th>
        <th>Board Exam Score</th>
        <th>Higher Education Institute</th>
        <th>Current Designation / Role</th>
        <th>City & Country</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ALM-2024-001</td>
        <td>
          <div class="fw-semibold text-dark">Siddharth Nambiar</div>
          <small class="text-muted font-size-11">Batch 2024</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - PCM (2024)</span></td>
        <td><small class="text-dark">98.4% (CBSE Topper)</small></td>
        <td><small class="text-muted font-mono font-size-12">IIT Delhi (Computer Science)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">B.Tech Undergraduate Scholar</span></td>
        <td><small class="text-muted">New Delhi, India</small></td>
        <td><span class="badge-status badge-active">Active Mentor</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Alumni Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ALM-2024-002</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Saxena</div>
          <small class="text-muted font-size-11">Batch 2024</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - PCB (2024)</span></td>
        <td><small class="text-dark">97.8% (NEET Rank #84)</small></td>
        <td><small class="text-muted font-mono font-size-12">AIIMS New Delhi (MBBS)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Medical Student (1st Year)</span></td>
        <td><small class="text-muted">New Delhi, India</small></td>
        <td><span class="badge-status badge-active">Active Mentor</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Alumni Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ALM-2023-014</td>
        <td>
          <div class="fw-semibold text-dark">Varun Malhotra</div>
          <small class="text-muted font-size-11">Batch 2023</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Commerce (2023)</span></td>
        <td><small class="text-dark">97.2% (SRCC Admit)</small></td>
        <td><small class="text-muted font-mono font-size-12">Shri Ram College of Commerce (SRCC)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">B.Com (Hons) / Finance Intern</span></td>
        <td><small class="text-muted">New Delhi, India</small></td>
        <td><span class="badge-status badge-active">Active Mentor</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Alumni Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ALM-2023-018</td>
        <td>
          <div class="fw-semibold text-dark">Kriti Sengupta</div>
          <small class="text-muted font-size-11">Batch 2023</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Humanities (2023)</span></td>
        <td><small class="text-dark">98.0% (Psychology Top)</small></td>
        <td><small class="text-muted font-mono font-size-12">Lady Shri Ram College (LSR)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">BA Psychology / Content Lead</span></td>
        <td><small class="text-muted">New Delhi, India</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Alumni Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ALM-2022-042</td>
        <td>
          <div class="fw-semibold text-dark">Arjun Singhal</div>
          <small class="text-muted font-size-11">Batch 2022</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - PCM (2022)</span></td>
        <td><small class="text-dark">96.4% (BITS Pilani)</small></td>
        <td><small class="text-muted font-mono font-size-12">BITS Pilani (Electrical Engg)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Hardware Systems Engineering Intern</span></td>
        <td><small class="text-muted">Pilani / Bengaluru</small></td>
        <td><span class="badge-status badge-active">Active Mentor</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Alumni Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ALM-2021-088</td>
        <td>
          <div class="fw-semibold text-dark">Rhea Deshmukh</div>
          <small class="text-muted font-size-11">Batch 2021</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Humanities (2021)</span></td>
        <td><small class="text-dark">96.8% (NLSIU Admit)</small></td>
        <td><small class="text-muted font-mono font-size-12">National Law School (NLSIU)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Corporate Law Associate (Intern)</span></td>
        <td><small class="text-muted">Bengaluru, India</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Alumni Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ALM-2020-104</td>
        <td>
          <div class="fw-semibold text-dark">Devansh Mehra</div>
          <small class="text-muted font-size-11">Batch 2020</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - PCM (2020)</span></td>
        <td><small class="text-dark">97.0% (Foreign Scholar)</small></td>
        <td><small class="text-muted font-mono font-size-12">University of California, Berkeley</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">AI Research Scientist at Google</span></td>
        <td><small class="text-muted">San Francisco, USA</small></td>
        <td><span class="badge-status badge-active">Global Chapter</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Alumni Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ALM-2019-142</td>
        <td>
          <div class="fw-semibold text-dark">Pooja Hegde</div>
          <small class="text-muted font-size-11">Batch 2019</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - PCB (2019)</span></td>
        <td><small class="text-dark">95.6% (London Admit)</small></td>
        <td><small class="text-muted font-mono font-size-12">Imperial College London</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Biotechnology Consultant at McKinsey</span></td>
        <td><small class="text-muted">London, UK</small></td>
        <td><span class="badge-status badge-active">Global Chapter</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Alumni Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
