<?php
/**
 * EDUSYS PRO - CURRICULUM MANAGEMENT
 * Dedicated operational interface & records management for Curriculum Management
 */
$page_title = "Curriculum Management";
$page_desc = "Master academic syllabi architectures, pedagogical models, and board integration guidelines";
$active_module = "academics";
$active_submodule = "curriculum.php";
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
    <h1><i class="bi bi-journal-bookmark-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'curriculum_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Add Curriculum Framework
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Curriculum Tracks</h6>
        <div class="kpi-value">5 Active Tracks</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> CBSE & NEP 2020 Integrated</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-journal-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Subjects Catalog</h6>
        <div class="kpi-value">48 Subjects</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Core & Skill Electives</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-book-half"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>NCF 2023 Aligned</h6>
        <div class="kpi-value">100% Compliant</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Foundational to Secondary</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-all"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Annual Reviews</h6>
        <div class="kpi-value">Completed</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Board Academic Council</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-check-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search framework, subject, board, classes...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Frameworks</option>
      <option >CBSE Secondary Framework (9-10)</option>
      <option >CBSE Senior Secondary (11-12)</option>
      <option >NEP Preparatory (3-5)</option>
      <option >NEP Middle Stage (6-8)</option>
      <option >Foundational Stage (Nursery-2)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active & Adopted</option>
      <option >Under Annual Review</option>
      <option >Archived</option>
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
        <th>Framework Code</th>
        <th>Curriculum Title</th>
        <th>Affiliation Authority</th>
        <th>Target Wings</th>
        <th>Academic Session</th>
        <th>NEP 2020 Compliance</th>
        <th>Revision Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CUR-CBSE-SEC</td>
        <td>
          <div class="fw-semibold text-dark">CBSE Secondary Curriculum</div>
          <small class="text-muted font-size-11">Core 5 Subjects + 1 Skill</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Central Board (CBSE)</span></td>
        <td><small class="text-dark">Classes 9 & 10</small></td>
        <td><small class="text-muted font-mono font-size-12">2024-2025</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">100% NCF-SE Aligned</span></td>
        <td><small class="text-muted">15 Apr 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Curriculum Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CUR-CBSE-SR</td>
        <td>
          <div class="fw-semibold text-dark">CBSE Senior Secondary</div>
          <small class="text-muted font-size-11">Science, Commerce, Humanities</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Central Board (CBSE)</span></td>
        <td><small class="text-dark">Classes 11 & 12</small></td>
        <td><small class="text-muted font-mono font-size-12">2024-2025</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">100% NCF-SE Aligned</span></td>
        <td><small class="text-muted">15 Apr 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Curriculum Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CUR-NEP-MID</td>
        <td>
          <div class="fw-semibold text-dark">NEP Middle Stage Framework</div>
          <small class="text-muted font-size-11">Experiential & Vocational Skills</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">NCERT / CBSE</span></td>
        <td><small class="text-dark">Classes 6 to 8</small></td>
        <td><small class="text-muted font-mono font-size-12">2024-2025</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">10-Bagless Days Included</span></td>
        <td><small class="text-muted">10 May 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Curriculum Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CUR-NEP-PREP</td>
        <td>
          <div class="fw-semibold text-dark">NEP Preparatory Stage</div>
          <small class="text-muted font-size-11">Activity & Inquiry Based</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">NCERT / CBSE</span></td>
        <td><small class="text-dark">Classes 3 to 5</small></td>
        <td><small class="text-muted font-mono font-size-12">2024-2025</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Toy-Based Pedagogy</span></td>
        <td><small class="text-muted">20 May 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Curriculum Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CUR-NCF-FS</td>
        <td>
          <div class="fw-semibold text-dark">Foundational Stage (Panchakosha)</div>
          <small class="text-muted font-size-11">Play, Physical & Emotional</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">NCF-FS / MoE</span></td>
        <td><small class="text-dark">Nursery, KG, Prep, Cl 1-2</small></td>
        <td><small class="text-muted font-mono font-size-12">2024-2025</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">100% Jaadui Pitara Mapped</span></td>
        <td><small class="text-muted">01 Jun 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Curriculum Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CUR-SKILL-AI</td>
        <td>
          <div class="fw-semibold text-dark">CBSE Artificial Intelligence & Coding</div>
          <small class="text-muted font-size-11">Intel & IBM Supported</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">CBSE Skill Dept</span></td>
        <td><small class="text-dark">Classes 8 to 11</small></td>
        <td><small class="text-muted font-mono font-size-12">2024-2025</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Skill Elective #417</span></td>
        <td><small class="text-muted">10 Jul 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Curriculum Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CUR-FIN-LIT</td>
        <td>
          <div class="fw-semibold text-dark">Financial Literacy & Entrepreneurship</div>
          <small class="text-muted font-size-11">SEBI / NISM Collaboration</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">CBSE Skill Dept</span></td>
        <td><small class="text-dark">Classes 9 to 12</small></td>
        <td><small class="text-muted font-mono font-size-12">2024-2025</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Practical Banking Lab</span></td>
        <td><small class="text-muted">15 Jul 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Curriculum Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CUR-REG-HIN</td>
        <td>
          <div class="fw-semibold text-dark">Hindi Course-A & Sanskrit Composite</div>
          <small class="text-muted font-size-11">Three-Language Formula</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">NCERT / CBSE</span></td>
        <td><small class="text-dark">Classes 6 to 10</small></td>
        <td><small class="text-muted font-mono font-size-12">2024-2025</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Bilingual Track</span></td>
        <td><small class="text-muted">20 Jul 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Curriculum Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
