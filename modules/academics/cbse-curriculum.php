<?php
/**
 * EDUSYS PRO - CBSE CURRICULUM & NEP 2020
 * Dedicated operational interface & records management for CBSE Curriculum & NEP 2020
 */
$page_title = "CBSE Curriculum & NEP 2020";
$page_desc = "National Education Policy 2020 alignment, 5+3+3+4 pedagogical structure, and competency-based assessment";
$active_module = "academics";
$active_submodule = "cbse-curriculum.php";
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
    <h1><i class="bi bi-award-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'cbse-curriculum_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-patch-plus-fill me-1"></i> Configure NEP Standard
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>5+3+3+4 Structure</h6>
        <div class="kpi-value">100% Implemented</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Foundational to Senior</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-diagram-3-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Bagless Days (6-8)</h6>
        <div class="kpi-value">10 Days Completed</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Vocational Crafts Track</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-backpack-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>HPC Holistic Cards</h6>
        <div class="kpi-value">2,840 Generated</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> 360° Assessment Rubric</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-card-checklist"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Skill Subjects Opted</h6>
        <div class="kpi-value">842 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> AI, Design, Financial Lit</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cpu-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search NEP stage, subject, pedagogical model, grades...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All NEP Stages</option>
      <option >Foundational Stage (Ages 3-8)</option>
      <option >Preparatory Stage (Classes 3-5)</option>
      <option >Middle Stage (Classes 6-8)</option>
      <option >Secondary Stage (Classes 9-12)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active in Timetable</option>
      <option >Under Teacher Training</option>
      <option >Adopted</option>
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
        <th>Standard UID</th>
        <th>NEP 2020 Stage</th>
        <th>Target Grades</th>
        <th>Pedagogical Framework</th>
        <th>Core Focus Areas</th>
        <th>Skill Subjects</th>
        <th>Assessment Model</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">NEP-STG-01</td>
        <td>
          <div class="fw-semibold text-dark">Foundational Stage</div>
          <small class="text-muted font-size-11">Ages 3 to 8</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Nursery to Class 2</span></td>
        <td><small class="text-dark">Play & Discovery-Based (Jaadui Pitara)</small></td>
        <td><small class="text-muted font-mono font-size-12">Foundational Literacy & Numeracy (FLN)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Arts & Storytelling</span></td>
        <td><small class="text-muted">Non-exam Observation</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'CBSE Curriculum & NEP 2020')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">NEP-STG-02</td>
        <td>
          <div class="fw-semibold text-dark">Preparatory Stage</div>
          <small class="text-muted font-size-11">Ages 8 to 11</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 3 to 5</span></td>
        <td><small class="text-dark">Light Textbooks & Experiential Learning</small></td>
        <td><small class="text-muted font-mono font-size-12">Language, Math, Science Discovery</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Coding Basics & Clay Art</span></td>
        <td><small class="text-muted">Formative & Portfolios</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'CBSE Curriculum & NEP 2020')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">NEP-STG-03</td>
        <td>
          <div class="fw-semibold text-dark">Middle Stage</div>
          <small class="text-muted font-size-11">Ages 11 to 14</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 6 to 8</span></td>
        <td><small class="text-dark">Subject-specific Conceptual Inquiry</small></td>
        <td><small class="text-muted font-mono font-size-12">Maths, Science, Social, Humanities</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Carpentry, Pottery, Coding, AI</span></td>
        <td><small class="text-muted">Periodic Tests & Projects</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'CBSE Curriculum & NEP 2020')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">NEP-STG-04</td>
        <td>
          <div class="fw-semibold text-dark">Secondary Stage (Ph 1)</div>
          <small class="text-muted font-size-11">Ages 14 to 16</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 9 & 10</span></td>
        <td><small class="text-dark">Multidisciplinary Critical Thinking</small></td>
        <td><small class="text-muted font-mono font-size-12">Core CBSE 5-Subject Scheme</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">AI (417), Information Tech (402)</span></td>
        <td><small class="text-muted">CBSE Board Examination</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'CBSE Curriculum & NEP 2020')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">NEP-STG-05</td>
        <td>
          <div class="fw-semibold text-dark">Secondary Stage (Ph 2)</div>
          <small class="text-muted font-size-11">Ages 16 to 18</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 11 & 12</span></td>
        <td><small class="text-dark">Deep Specialization & Stream Flexibility</small></td>
        <td><small class="text-muted font-mono font-size-12">PCM, PCB, Commerce, Humanities</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Data Science, Entrepreneurship</span></td>
        <td><small class="text-muted">CBSE AISSCE Board</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'CBSE Curriculum & NEP 2020')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">NEP-FLN-01</td>
        <td>
          <div class="fw-semibold text-dark">NIPUN Bharat Mission</div>
          <small class="text-muted font-size-11">Reading with Meaning</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 1 to 3</span></td>
        <td><small class="text-dark">Daily 60-Min FLN Reading Block</small></td>
        <td><small class="text-muted font-mono font-size-12">Word Recognition & Basic Math Addition</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Phonics & Rhymes</span></td>
        <td><small class="text-muted">Oral Reading Fluency</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'CBSE Curriculum & NEP 2020')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">NEP-BAG-01</td>
        <td>
          <div class="fw-semibold text-dark">10 Bagless Days Module</div>
          <small class="text-muted font-size-11">Hands-on Exposure</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 6 to 8</span></td>
        <td><small class="text-dark">Local Artisans & Industry Field Visits</small></td>
        <td><small class="text-muted font-mono font-size-12">Gardening, Heritage Walk, Plumbing</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Vocational Skills</span></td>
        <td><small class="text-muted">Reflective Journals</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'CBSE Curriculum & NEP 2020')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">NEP-HPC-01</td>
        <td>
          <div class="fw-semibold text-dark">Holistic Progress Card</div>
          <small class="text-muted font-size-11">PARAKH Standard</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 1 to 12</span></td>
        <td><small class="text-dark">Self, Peer, and Teacher Evaluation</small></td>
        <td><small class="text-muted font-mono font-size-12">Cognitive, Socio-Emotional & Physical</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Co-curricular Rubric</span></td>
        <td><small class="text-muted">Descriptive Feedback</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'CBSE Curriculum & NEP 2020')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
