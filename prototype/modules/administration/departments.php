<?php
/**
 * EDUSYS PRO - Academic & Administrative Departments Master
 * Department directory, appointed HODs, faculty rosters & academic subjects
 */
$page_title = "Departments Master";
$page_desc = "Academic faculties & administrative departments, designated Heads of Department (HODs) & staff rosters";
$active_module = "administration";
$active_submodule = "departments.php";
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
      <li class="breadcrumb-item active" aria-current="page">Departments</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-diagram-2-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="window.print()" title="Print Departments">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#deptTable', 'departments_directory.csv')">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewDeptModal">
      <i class="bi bi-plus-lg me-1"></i> Add Department
    </button>
  </div>
</div>

<!-- KPI Cards -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Total Departments</h6>
        <div class="kpi-value">9 Depts</div>
        <div class="kpi-trend positive"><i class="bi bi-check2"></i> 7 Academic, 2 Admin</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-building"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Faculty &amp; Staff</h6>
        <div class="kpi-value">190 Members</div>
        <div class="kpi-trend positive"><i class="bi bi-people-fill"></i> 148 Teaching Staff</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-badge"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Appointed HODs</h6>
        <div class="kpi-value">9 / 9</div>
        <div class="kpi-trend positive"><i class="bi bi-award-fill"></i> 100% Appointed</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Courses Managed</h6>
        <div class="kpi-value">34 Subjects</div>
        <div class="kpi-trend neutral"><i class="bi bi-book"></i> Curriculum Mapped</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-journal-code"></i></div>
    </div>
  </div>
</div>

<!-- Departments Table -->
<div class="erp-card mb-4">
  <div class="erp-card-header">
    <div>
      <h5 class="erp-card-title mb-0"><i class="bi bi-list-nested text-primary"></i> Institutional Departments Register</h5>
      <span class="font-size-12 text-muted">Academic faculties, laboratories, administrative sections and HOD contacts</span>
    </div>
  </div>
  <div class="erp-table-responsive mb-0">
    <table class="erp-table mb-0" id="deptTable">
      <thead>
        <tr>
          <th>Department Name</th>
          <th>Type</th>
          <th>Head of Department (HOD)</th>
          <th>Faculty Count</th>
          <th>Curriculum Subjects Handled</th>
          <th>Status</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="p-2 bg-primary-subtle text-primary rounded-3"><i class="bi bi-flask-fill fs-5"></i></div>
              <div>
                <strong class="font-size-14 text-primary">Science &amp; Technology</strong>
                <div class="font-size-11 text-muted">Physics, Chemistry, Biology &amp; STEM</div>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-primary border">Academic</span></td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-primary text-white">VR</div>
              <div>
                <div class="fw-bold font-size-13">Mr. Vikram Rathore</div>
                <small class="text-muted">M.Sc., B.Ed. (21 Yrs Exp)</small>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-dark border font-mono">28 Teachers</span></td>
          <td>Physics, Chemistry, Biology, Biotech, General Science</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <button class="action-btn" title="View Roster" onclick="toastMsg('Viewing Science Dept faculty roster')"><i class="bi bi-people"></i></button>
              <button class="action-btn" title="Edit Department" onclick="toastMsg('Editing Science Dept parameters')"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="p-2 bg-info-subtle text-info rounded-3"><i class="bi bi-calculator-fill fs-5"></i></div>
              <div>
                <strong class="font-size-14 text-primary">Mathematics</strong>
                <div class="font-size-11 text-muted">Core &amp; Applied Mathematics</div>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-primary border">Academic</span></td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-info text-white">SK</div>
              <div>
                <div class="fw-bold font-size-13">Mr. S. K. Rastogi</div>
                <small class="text-muted">M.Sc. Math, M.Ed. (17 Yrs Exp)</small>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-dark border font-mono">22 Teachers</span></td>
          <td>Mathematics, Applied Math, Vedic Math</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <button class="action-btn" title="View Roster" onclick="toastMsg('Viewing Math Dept roster')"><i class="bi bi-people"></i></button>
              <button class="action-btn" title="Edit Department" onclick="toastMsg('Editing Math Dept')"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="p-2 bg-success-subtle text-success rounded-3"><i class="bi bi-translate fs-5"></i></div>
              <div>
                <strong class="font-size-14 text-primary">Languages &amp; Literature</strong>
                <div class="font-size-11 text-muted">English, Hindi, Sanskrit &amp; French</div>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-primary border">Academic</span></td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-success text-white">PN</div>
              <div>
                <div class="fw-bold font-size-13">Mrs. Priya Nambiar</div>
                <small class="text-muted">M.A. English Lit, B.Ed. (16 Yrs Exp)</small>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-dark border font-mono">26 Teachers</span></td>
          <td>English Core, Hindi Course A/B, Sanskrit, French</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <button class="action-btn" title="View Roster" onclick="toastMsg('Viewing Languages roster')"><i class="bi bi-people"></i></button>
              <button class="action-btn" title="Edit Department" onclick="toastMsg('Editing Languages Dept')"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="p-2 bg-warning-subtle text-warning rounded-3"><i class="bi bi-bar-chart-line-fill fs-5"></i></div>
              <div>
                <strong class="font-size-14 text-primary">Commerce &amp; Economics</strong>
                <div class="font-size-11 text-muted">Accounts, Business Studies &amp; Entrep.</div>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-primary border">Academic</span></td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-warning text-white">MA</div>
              <div>
                <div class="fw-bold font-size-13">Mr. M. K. Aggarwal</div>
                <small class="text-muted">M.Com, FCA, B.Ed. (19 Yrs Exp)</small>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-dark border font-mono">14 Teachers</span></td>
          <td>Accountancy, Business Studies, Economics, Entrepreneurship</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <button class="action-btn" title="View Roster" onclick="toastMsg('Viewing Commerce roster')"><i class="bi bi-people"></i></button>
              <button class="action-btn" title="Edit Department" onclick="toastMsg('Editing Commerce Dept')"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="p-2 bg-danger-subtle text-danger rounded-3"><i class="bi bi-pc-display fs-5"></i></div>
              <div>
                <strong class="font-size-14 text-primary">Computer Science &amp; AI</strong>
                <div class="font-size-11 text-muted">Computer Science, IP, Robotics &amp; AI</div>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-primary border">Academic / Tech</span></td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-danger text-white">RG</div>
              <div>
                <div class="fw-bold font-size-13">Mr. Rohit Ganguly</div>
                <small class="text-muted">M.Tech CS (14 Yrs Exp)</small>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-dark border font-mono">12 Teachers</span></td>
          <td>Computer Science, Informatics Practices, Artificial Intelligence</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <button class="action-btn" title="View Roster" onclick="toastMsg('Viewing CS & AI roster')"><i class="bi bi-people"></i></button>
              <button class="action-btn" title="Edit Department" onclick="toastMsg('Editing CS Dept')"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="p-2 bg-secondary-subtle text-dark rounded-3"><i class="bi bi-receipt-cutoff fs-5"></i></div>
              <div>
                <strong class="font-size-14 text-primary">Finance, Accounts &amp; Audit</strong>
                <div class="font-size-11 text-muted">Fee counter, billing, payroll &amp; tax</div>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-secondary border">Administrative</span></td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-secondary text-white">MS</div>
              <div>
                <div class="fw-bold font-size-13">Mr. M. K. Sharma</div>
                <small class="text-muted">Chief Accounts Officer</small>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-dark border font-mono">8 Staff</span></td>
          <td>Fee Collection, Student Ledgers, Reconciliation, Payroll</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <button class="action-btn" title="View Staff" onclick="toastMsg('Viewing Accounts staff')"><i class="bi bi-people"></i></button>
              <button class="action-btn" title="Edit Department" onclick="toastMsg('Editing Accounts Dept')"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal: Add New Department -->
<div class="modal fade" id="addNewDeptModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-diagram-2 text-primary me-2"></i>Add New Department</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form onsubmit="handleNewDept(event)">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Department Name <span class="required">*</span></label>
            <input type="text" class="form-control" id="newDeptName" required placeholder="e.g. Performing Arts & Music">
          </div>
          <div class="mb-3">
            <label class="form-label">Department Category</label>
            <select class="form-select" id="newDeptCategory">
              <option value="Academic">Academic Faculty</option>
              <option value="Administrative">Administrative Department</option>
              <option value="Co-Scholastic">Co-Scholastic / Sports</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Head of Department (HOD)</label>
            <input type="text" class="form-control" id="newDeptHod" placeholder="e.g. Dr. Sunita Rao">
          </div>
          <div class="mb-3">
            <label class="form-label">Curriculum Subjects Handled</label>
            <textarea class="form-control" id="newDeptSubjects" rows="2" placeholder="e.g. Vocal Music, Instrumental, Classical Dance"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-check-lg me-1"></i> Save Department</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function handleNewDept(e) {
  e.preventDefault();
  const name = document.getElementById('newDeptName').value.trim();
  bootstrap.Modal.getInstance(document.getElementById('addNewDeptModal')).hide();
  toastMsg(`Department "${name}" created successfully!`);
}

function toastMsg(msg) {
  if (window.EduApp && window.EduApp.toast) {
    EduApp.toast(msg, "success", "Departments Master");
  } else {
    alert(msg);
  }
}
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
