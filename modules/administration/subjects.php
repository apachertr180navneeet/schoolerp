<?php
/**
 * EDUSYS PRO - Master Subject Directory
 * CBSE subject codes, theory/practical marks distribution, syllabus categories & wing applicability
 */
$page_title = "Subjects Master Directory";
$page_desc = "Master curriculum subject codes, theory vs practical exam weightages & department mappings";
$active_module = "administration";
$active_submodule = "subjects.php";
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
      <li class="breadcrumb-item active" aria-current="page">Subjects Master</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-book-half text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="window.print()" title="Print Subjects Roster">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#subjectsTable', 'cbse_subjects_master.csv')">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewSubjectModal">
      <i class="bi bi-plus-lg me-1"></i> Add Subject
    </button>
  </div>
</div>

<!-- KPI Cards -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Total Subjects</h6>
        <div class="kpi-value">34 Subjects</div>
        <div class="kpi-trend positive"><i class="bi bi-patch-check-fill"></i> CBSE Approved</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-journals"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Core Scholastic</h6>
        <div class="kpi-value">14 Core</div>
        <div class="kpi-trend positive"><i class="bi bi-award"></i> Compulsory Basics</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-all"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Elective Baskets</h6>
        <div class="kpi-value">16 Electives</div>
        <div class="kpi-trend positive"><i class="bi bi-sliders"></i> Choice Based</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-card-checklist"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Skill &amp; STEM</h6>
        <div class="kpi-value">4 Subjects</div>
        <div class="kpi-trend neutral"><i class="bi bi-robot"></i> AI, Robotics &amp; IP</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cpu-fill"></i></div>
    </div>
  </div>
</div>

<!-- Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="subjectSearchInput" placeholder="Search subject name, CBSE code, department..." onkeyup="filterSubjects()">
    </div>
    <select class="form-select" id="deptFilterSelect" style="max-width: 190px;" onchange="filterSubjects()">
      <option value="">All Departments</option>
      <option value="Science">Science &amp; Tech</option>
      <option value="Mathematics">Mathematics</option>
      <option value="Languages">Languages</option>
      <option value="Commerce">Commerce</option>
      <option value="Computer">Computer &amp; AI</option>
    </select>
  </div>
  <div class="table-filter-right">
    <span class="font-size-13 text-muted">Showing <strong class="text-primary">10</strong> Core Subjects</span>
  </div>
</div>

<!-- Subjects Table -->
<div class="erp-card mb-4">
  <div class="erp-table-responsive mb-0">
    <table class="erp-table mb-0" id="subjectsTable">
      <thead>
        <tr>
          <th>CBSE Code</th>
          <th>Subject Name</th>
          <th>Department</th>
          <th>Subject Category</th>
          <th>Theory Marks</th>
          <th>Practical / Internal</th>
          <th>Total Marks</th>
          <th>Status</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><span class="badge bg-primary text-white font-mono font-size-13">301</span></td>
          <td>
            <strong class="font-size-14 text-primary">English Core</strong>
            <div class="font-size-11 text-muted">Language &amp; Literature (Senior Wing)</div>
          </td>
          <td><span class="badge bg-light text-dark border">Languages</span></td>
          <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle">Compulsory Core</span></td>
          <td class="font-mono">80 Marks</td>
          <td class="font-mono">20 Marks (ASL)</td>
          <td class="font-mono fw-bold">100</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <button class="action-btn" title="Edit Subject" onclick="toastMsg('Editing English Core parameters')"><i class="bi bi-pencil"></i></button>
          </td>
        </tr>

        <tr>
          <td><span class="badge bg-primary text-white font-mono font-size-13">042</span></td>
          <td>
            <strong class="font-size-14 text-primary">Physics</strong>
            <div class="font-size-11 text-muted">Core Senior Science Curriculum</div>
          </td>
          <td><span class="badge bg-light text-dark border">Science &amp; Tech</span></td>
          <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle">Core Science</span></td>
          <td class="font-mono">70 Marks</td>
          <td class="font-mono">30 Marks (Lab)</td>
          <td class="font-mono fw-bold">100</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <button class="action-btn" title="Edit Subject" onclick="toastMsg('Editing Physics parameters')"><i class="bi bi-pencil"></i></button>
          </td>
        </tr>

        <tr>
          <td><span class="badge bg-primary text-white font-mono font-size-13">043</span></td>
          <td>
            <strong class="font-size-14 text-primary">Chemistry</strong>
            <div class="font-size-11 text-muted">Physical, Organic &amp; Inorganic</div>
          </td>
          <td><span class="badge bg-light text-dark border">Science &amp; Tech</span></td>
          <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle">Core Science</span></td>
          <td class="font-mono">70 Marks</td>
          <td class="font-mono">30 Marks (Lab)</td>
          <td class="font-mono fw-bold">100</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <button class="action-btn" title="Edit Subject" onclick="toastMsg('Editing Chemistry parameters')"><i class="bi bi-pencil"></i></button>
          </td>
        </tr>

        <tr>
          <td><span class="badge bg-primary text-white font-mono font-size-13">041</span></td>
          <td>
            <strong class="font-size-14 text-primary">Mathematics (Core)</strong>
            <div class="font-size-11 text-muted">Calculus, Vectors &amp; Probability</div>
          </td>
          <td><span class="badge bg-light text-dark border">Mathematics</span></td>
          <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle">Compulsory Core</span></td>
          <td class="font-mono">80 Marks</td>
          <td class="font-mono">20 Marks (Internal)</td>
          <td class="font-mono fw-bold">100</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <button class="action-btn" title="Edit Subject" onclick="toastMsg('Editing Mathematics parameters')"><i class="bi bi-pencil"></i></button>
          </td>
        </tr>

        <tr>
          <td><span class="badge bg-primary text-white font-mono font-size-13">044</span></td>
          <td>
            <strong class="font-size-14 text-primary">Biology</strong>
            <div class="font-size-11 text-muted">Genetics, Ecology &amp; Physiology</div>
          </td>
          <td><span class="badge bg-light text-dark border">Science &amp; Tech</span></td>
          <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle">Core Medical</span></td>
          <td class="font-mono">70 Marks</td>
          <td class="font-mono">30 Marks (Lab)</td>
          <td class="font-mono fw-bold">100</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <button class="action-btn" title="Edit Subject" onclick="toastMsg('Editing Biology parameters')"><i class="bi bi-pencil"></i></button>
          </td>
        </tr>

        <tr>
          <td><span class="badge bg-primary text-white font-mono font-size-13">055</span></td>
          <td>
            <strong class="font-size-14 text-primary">Accountancy</strong>
            <div class="font-size-11 text-muted">Financial Statements &amp; Partnership</div>
          </td>
          <td><span class="badge bg-light text-dark border">Commerce</span></td>
          <td><span class="badge bg-warning-subtle text-warning border border-warning-subtle">Core Commerce</span></td>
          <td class="font-mono">80 Marks</td>
          <td class="font-mono">20 Marks (Project)</td>
          <td class="font-mono fw-bold">100</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <button class="action-btn" title="Edit Subject" onclick="toastMsg('Editing Accountancy parameters')"><i class="bi bi-pencil"></i></button>
          </td>
        </tr>

        <tr>
          <td><span class="badge bg-primary text-white font-mono font-size-13">054</span></td>
          <td>
            <strong class="font-size-14 text-primary">Business Studies</strong>
            <div class="font-size-11 text-muted">Principles &amp; Business Management</div>
          </td>
          <td><span class="badge bg-light text-dark border">Commerce</span></td>
          <td><span class="badge bg-warning-subtle text-warning border border-warning-subtle">Core Commerce</span></td>
          <td class="font-mono">80 Marks</td>
          <td class="font-mono">20 Marks (Project)</td>
          <td class="font-mono fw-bold">100</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <button class="action-btn" title="Edit Subject" onclick="toastMsg('Editing Business Studies')"><i class="bi bi-pencil"></i></button>
          </td>
        </tr>

        <tr>
          <td><span class="badge bg-primary text-white font-mono font-size-13">030</span></td>
          <td>
            <strong class="font-size-14 text-primary">Economics</strong>
            <div class="font-size-11 text-muted">Micro, Macro &amp; Indian Economic Dev</div>
          </td>
          <td><span class="badge bg-light text-dark border">Commerce / Humanities</span></td>
          <td><span class="badge bg-info-subtle text-info border border-info-subtle">Core / Elective</span></td>
          <td class="font-mono">80 Marks</td>
          <td class="font-mono">20 Marks (Project)</td>
          <td class="font-mono fw-bold">100</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <button class="action-btn" title="Edit Subject" onclick="toastMsg('Editing Economics')"><i class="bi bi-pencil"></i></button>
          </td>
        </tr>

        <tr>
          <td><span class="badge bg-primary text-white font-mono font-size-13">083</span></td>
          <td>
            <strong class="font-size-14 text-primary">Computer Science</strong>
            <div class="font-size-11 text-muted">Python Programming, SQL &amp; Networks</div>
          </td>
          <td><span class="badge bg-light text-dark border">Computer &amp; AI</span></td>
          <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle">Elective / STEM</span></td>
          <td class="font-mono">70 Marks</td>
          <td class="font-mono">30 Marks (Practical)</td>
          <td class="font-mono fw-bold">100</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <button class="action-btn" title="Edit Subject" onclick="toastMsg('Editing Computer Science')"><i class="bi bi-pencil"></i></button>
          </td>
        </tr>

        <tr>
          <td><span class="badge bg-primary text-white font-mono font-size-13">843</span></td>
          <td>
            <strong class="font-size-14 text-primary">Artificial Intelligence</strong>
            <div class="font-size-11 text-muted">CBSE Vocational &amp; Applied Skill Subject</div>
          </td>
          <td><span class="badge bg-light text-dark border">Computer &amp; AI</span></td>
          <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle">Skill Subject</span></td>
          <td class="font-mono">50 Marks</td>
          <td class="font-mono">50 Marks (Project)</td>
          <td class="font-mono fw-bold">100</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <button class="action-btn" title="Edit Subject" onclick="toastMsg('Editing Artificial Intelligence')"><i class="bi bi-pencil"></i></button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal: Add New Subject -->
<div class="modal fade" id="addNewSubjectModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-plus-circle text-primary me-2"></i>Add Curriculum Subject</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form onsubmit="handleNewSubject(event)">
        <div class="modal-body">
          <div class="row g-2 mb-3">
            <div class="col-4">
              <label class="form-label">CBSE Code <span class="required">*</span></label>
              <input type="text" class="form-control font-mono" id="newSubCode" required placeholder="e.g. 048">
            </div>
            <div class="col-8">
              <label class="form-label">Subject Title <span class="required">*</span></label>
              <input type="text" class="form-control" id="newSubName" required placeholder="e.g. Physical Education">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Department <span class="required">*</span></label>
            <select class="form-select" id="newSubDept" required>
              <option value="Science & Tech">Science &amp; Tech</option>
              <option value="Mathematics">Mathematics</option>
              <option value="Languages">Languages</option>
              <option value="Commerce">Commerce</option>
              <option value="Computer & AI">Computer &amp; AI</option>
              <option value="Physical Education">Physical Education &amp; Sports</option>
            </select>
          </div>
          <div class="row g-2 mb-3">
            <div class="col-6">
              <label class="form-label">Theory Marks</label>
              <input type="number" class="form-control font-mono" id="newSubTheory" value="70">
            </div>
            <div class="col-6">
              <label class="form-label">Practical / Internal</label>
              <input type="number" class="form-control font-mono" id="newSubPractical" value="30">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-check-lg me-1"></i> Save Subject</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function filterSubjects() {
  const q = document.getElementById('subjectSearchInput').value.toLowerCase();
  const dept = document.getElementById('deptFilterSelect').value.toLowerCase();
  const rows = document.querySelectorAll('#subjectsTable tbody tr');

  rows.forEach(r => {
    const text = r.textContent.toLowerCase();
    const matchQ = text.includes(q);
    const matchDept = !dept || text.includes(dept);
    r.style.display = (matchQ && matchDept) ? '' : 'none';
  });
}

function handleNewSubject(e) {
  e.preventDefault();
  const name = document.getElementById('newSubName').value.trim();
  const code = document.getElementById('newSubCode').value.trim();
  bootstrap.Modal.getInstance(document.getElementById('addNewSubjectModal')).hide();
  toastMsg(`Subject "${name}" (Code ${code}) registered successfully!`);
}

function toastMsg(msg) {
  if (window.EduApp && window.EduApp.toast) {
    EduApp.toast(msg, "success", "Subjects Master");
  } else {
    alert(msg);
  }
}
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
