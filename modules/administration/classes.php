<?php
/**
 * EDUSYS PRO - Classes & Grade Levels Master
 * Grade hierarchy, academic wings, student capacities, fees slab mapping & class coordinators
 */
$page_title = "Classes & Grade Levels";
$page_desc = "Master grades hierarchy (Pre-Primary to Grade 12), academic wings & capacity allocations";
$active_module = "administration";
$active_submodule = "classes.php";
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
      <li class="breadcrumb-item active" aria-current="page">Classes &amp; Grades</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-diagram-3-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="window.print()" title="Print Classes Matrix">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#classesTable', 'classes_matrix.csv')">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewClassModal">
      <i class="bi bi-plus-lg me-1"></i> Add Grade / Class
    </button>
  </div>
</div>

<!-- Classes KPI Counters -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Total Classes</h6>
        <div class="kpi-value">14 Grades</div>
        <div class="kpi-trend positive"><i class="bi bi-mortarboard-fill"></i> Pre-KG to Class 12</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-building"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Total Sections</h6>
        <div class="kpi-value">48 Sections</div>
        <div class="kpi-trend positive"><i class="bi bi-grid-3x3-gap-fill"></i> Avg 3.4 / Grade</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-layout-three-columns"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Total Enrollment</h6>
        <div class="kpi-value">2,840 / 3,200</div>
        <div class="kpi-trend positive"><i class="bi bi-people-fill"></i> 88.8% Capacity</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-lines-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Academic Wings</h6>
        <div class="kpi-value">4 Wings</div>
        <div class="kpi-trend neutral"><i class="bi bi-shield-check"></i> Primary to Senior</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-diagram-2"></i></div>
    </div>
  </div>
</div>

<!-- Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="classSearchInput" placeholder="Search class name, coordinator or wing..." onkeyup="filterClasses()">
    </div>
    <select class="form-select" id="wingFilterSelect" style="max-width: 200px;" onchange="filterClasses()">
      <option value="">All Academic Wings</option>
      <option value="Pre-Primary Wing">Pre-Primary (Nursery, KG)</option>
      <option value="Primary Wing">Primary Wing (Classes 1–5)</option>
      <option value="Middle Wing">Middle Wing (Classes 6–8)</option>
      <option value="Secondary Wing">Secondary Wing (Classes 9–10)</option>
      <option value="Senior Secondary">Senior Secondary (Classes 11–12)</option>
    </select>
  </div>
  <div class="table-filter-right">
    <span class="font-size-13 text-muted">Showing <strong class="text-primary">14</strong> Classes</span>
  </div>
</div>

<!-- Classes Directory Table -->
<div class="erp-card mb-4">
  <div class="erp-table-responsive mb-0">
    <table class="erp-table mb-0" id="classesTable">
      <thead>
        <tr>
          <th>Class / Grade</th>
          <th>Academic Wing</th>
          <th>Sections Configured</th>
          <th>Wing Coordinator / Supervisor</th>
          <th>Student Strength</th>
          <th>Monthly Fee Slab</th>
          <th>Status</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Class 12 -->
        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-primary text-white font-size-12">12</div>
              <div>
                <strong class="font-size-14 text-primary">Class 12 (Senior Sec)</strong>
                <div class="font-size-11 text-muted">Science, Commerce &amp; Humanities</div>
              </div>
            </div>
          </td>
          <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle">Senior Secondary</span></td>
          <td><span class="badge bg-light text-dark border">4 Sections (A, B, C, D)</span></td>
          <td>Mrs. Nandini Mathur (PGT Coord)</td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="fw-bold">198 / 220</span>
              <div class="progress" style="width: 60px; height: 5px;">
                <div class="progress-bar bg-success" style="width: 90%"></div>
              </div>
            </div>
          </td>
          <td class="font-mono text-dark fw-bold">&#8377; 7,800</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <a href="<?php echo base_url('modules/administration/sections.php?class=12'); ?>" class="action-btn" title="Manage Sections"><i class="bi bi-grid-3x3-gap"></i></a>
              <button class="action-btn" title="Edit Class" onclick="editClassModal('Class 12', 'Senior Secondary', 4, 220, 7800)"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <!-- Class 11 -->
        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-primary text-white font-size-12">11</div>
              <div>
                <strong class="font-size-14 text-primary">Class 11 (Senior Sec)</strong>
                <div class="font-size-11 text-muted">Science, Commerce &amp; Humanities</div>
              </div>
            </div>
          </td>
          <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle">Senior Secondary</span></td>
          <td><span class="badge bg-light text-dark border">4 Sections (A, B, C, D)</span></td>
          <td>Mrs. Nandini Mathur (PGT Coord)</td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="fw-bold">205 / 220</span>
              <div class="progress" style="width: 60px; height: 5px;">
                <div class="progress-bar bg-success" style="width: 93%"></div>
              </div>
            </div>
          </td>
          <td class="font-mono text-dark fw-bold">&#8377; 7,800</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <a href="<?php echo base_url('modules/administration/sections.php?class=11'); ?>" class="action-btn" title="Manage Sections"><i class="bi bi-grid-3x3-gap"></i></a>
              <button class="action-btn" title="Edit Class" onclick="editClassModal('Class 11', 'Senior Secondary', 4, 220, 7800)"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <!-- Class 10 -->
        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-info text-white font-size-12">10</div>
              <div>
                <strong class="font-size-14 text-primary">Class 10 (Secondary)</strong>
                <div class="font-size-11 text-muted">CBSE AISSE Board Batch</div>
              </div>
            </div>
          </td>
          <td><span class="badge bg-info-subtle text-info border border-info-subtle">Secondary Wing</span></td>
          <td><span class="badge bg-light text-dark border">4 Sections (A, B, C, D)</span></td>
          <td>Mr. S. K. Rastogi (TGT Lead)</td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="fw-bold">218 / 220</span>
              <div class="progress" style="width: 60px; height: 5px;">
                <div class="progress-bar bg-success" style="width: 99%"></div>
              </div>
            </div>
          </td>
          <td class="font-mono text-dark fw-bold">&#8377; 6,900</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <a href="<?php echo base_url('modules/administration/sections.php?class=10'); ?>" class="action-btn" title="Manage Sections"><i class="bi bi-grid-3x3-gap"></i></a>
              <button class="action-btn" title="Edit Class" onclick="editClassModal('Class 10', 'Secondary Wing', 4, 220, 6900)"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <!-- Class 9 -->
        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-info text-white font-size-12">09</div>
              <div>
                <strong class="font-size-14 text-primary">Class 9 (Secondary)</strong>
                <div class="font-size-11 text-muted">CBSE Secondary Foundation</div>
              </div>
            </div>
          </td>
          <td><span class="badge bg-info-subtle text-info border border-info-subtle">Secondary Wing</span></td>
          <td><span class="badge bg-light text-dark border">4 Sections (A, B, C, D)</span></td>
          <td>Mr. S. K. Rastogi (TGT Lead)</td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="fw-bold">212 / 220</span>
              <div class="progress" style="width: 60px; height: 5px;">
                <div class="progress-bar bg-success" style="width: 96%"></div>
              </div>
            </div>
          </td>
          <td class="font-mono text-dark fw-bold">&#8377; 6,900</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <a href="<?php echo base_url('modules/administration/sections.php?class=9'); ?>" class="action-btn" title="Manage Sections"><i class="bi bi-grid-3x3-gap"></i></a>
              <button class="action-btn" title="Edit Class" onclick="editClassModal('Class 9', 'Secondary Wing', 4, 220, 6900)"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <!-- Class 8 -->
        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-success text-white font-size-12">08</div>
              <div>
                <strong class="font-size-14 text-primary">Class 8 (Middle Wing)</strong>
                <div class="font-size-11 text-muted">Upper Primary Stage</div>
              </div>
            </div>
          </td>
          <td><span class="badge bg-success-subtle text-success border border-success-subtle">Middle Wing</span></td>
          <td><span class="badge bg-light text-dark border">4 Sections (A, B, C, D)</span></td>
          <td>Mrs. Shalini Mehra</td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="fw-bold">210 / 220</span>
              <div class="progress" style="width: 60px; height: 5px;">
                <div class="progress-bar bg-success" style="width: 95%"></div>
              </div>
            </div>
          </td>
          <td class="font-mono text-dark fw-bold">&#8377; 6,200</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <a href="<?php echo base_url('modules/administration/sections.php?class=8'); ?>" class="action-btn" title="Manage Sections"><i class="bi bi-grid-3x3-gap"></i></a>
              <button class="action-btn" title="Edit Class" onclick="editClassModal('Class 8', 'Middle Wing', 4, 220, 6200)"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <!-- Class 7 -->
        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-success text-white font-size-12">07</div>
              <div>
                <strong class="font-size-14 text-primary">Class 7 (Middle Wing)</strong>
                <div class="font-size-11 text-muted">Upper Primary Stage</div>
              </div>
            </div>
          </td>
          <td><span class="badge bg-success-subtle text-success border border-success-subtle">Middle Wing</span></td>
          <td><span class="badge bg-light text-dark border">4 Sections (A, B, C, D)</span></td>
          <td>Mrs. Shalini Mehra</td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="fw-bold">215 / 220</span>
              <div class="progress" style="width: 60px; height: 5px;">
                <div class="progress-bar bg-success" style="width: 97%"></div>
              </div>
            </div>
          </td>
          <td class="font-mono text-dark fw-bold">&#8377; 6,200</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <a href="<?php echo base_url('modules/administration/sections.php?class=7'); ?>" class="action-btn" title="Manage Sections"><i class="bi bi-grid-3x3-gap"></i></a>
              <button class="action-btn" title="Edit Class" onclick="editClassModal('Class 7', 'Middle Wing', 4, 220, 6200)"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <!-- Class 6 -->
        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-success text-white font-size-12">06</div>
              <div>
                <strong class="font-size-14 text-primary">Class 6 (Middle Wing)</strong>
                <div class="font-size-11 text-muted">Upper Primary Stage</div>
              </div>
            </div>
          </td>
          <td><span class="badge bg-success-subtle text-success border border-success-subtle">Middle Wing</span></td>
          <td><span class="badge bg-light text-dark border">4 Sections (A, B, C, D)</span></td>
          <td>Mrs. Shalini Mehra</td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="fw-bold">208 / 220</span>
              <div class="progress" style="width: 60px; height: 5px;">
                <div class="progress-bar bg-success" style="width: 94%"></div>
              </div>
            </div>
          </td>
          <td class="font-mono text-dark fw-bold">&#8377; 6,200</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <a href="<?php echo base_url('modules/administration/sections.php?class=6'); ?>" class="action-btn" title="Manage Sections"><i class="bi bi-grid-3x3-gap"></i></a>
              <button class="action-btn" title="Edit Class" onclick="editClassModal('Class 6', 'Middle Wing', 4, 220, 6200)"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <!-- Classes 1-5 Primary -->
        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-warning text-white font-size-12">1-5</div>
              <div>
                <strong class="font-size-14 text-primary">Classes 1 to 5 (Primary)</strong>
                <div class="font-size-11 text-muted">Foundational Literacy &amp; Numeracy (5 Grades)</div>
              </div>
            </div>
          </td>
          <td><span class="badge bg-warning-subtle text-warning border border-warning-subtle">Primary Wing</span></td>
          <td><span class="badge bg-light text-dark border">15 Sections (3 per grade)</span></td>
          <td>Mrs. Anuradha Deshmukh (Headmistress)</td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="fw-bold">1,030 / 1,150</span>
              <div class="progress" style="width: 60px; height: 5px;">
                <div class="progress-bar bg-success" style="width: 89%"></div>
              </div>
            </div>
          </td>
          <td class="font-mono text-dark fw-bold">&#8377; 5,600</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <a href="<?php echo base_url('modules/administration/sections.php?class=primary'); ?>" class="action-btn" title="Manage Sections"><i class="bi bi-grid-3x3-gap"></i></a>
              <button class="action-btn" title="Edit Class" onclick="editClassModal('Primary (1-5)', 'Primary Wing', 15, 1150, 5600)"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <!-- Pre-Primary (Nursery, KG, Prep) -->
        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-danger text-white font-size-12">PRE</div>
              <div>
                <strong class="font-size-14 text-primary">Pre-Primary (Nursery &amp; KG)</strong>
                <div class="font-size-11 text-muted">Early Childhood Care &amp; Education (ECCE)</div>
              </div>
            </div>
          </td>
          <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle">Pre-Primary Wing</span></td>
          <td><span class="badge bg-light text-dark border">5 Sections</span></td>
          <td>Mrs. Ritu Bhasin (Early Years Lead)</td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="fw-bold">344 / 400</span>
              <div class="progress" style="width: 60px; height: 5px;">
                <div class="progress-bar bg-success" style="width: 86%"></div>
              </div>
            </div>
          </td>
          <td class="font-mono text-dark fw-bold">&#8377; 5,200</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <a href="<?php echo base_url('modules/administration/sections.php?class=pre-primary'); ?>" class="action-btn" title="Manage Sections"><i class="bi bi-grid-3x3-gap"></i></a>
              <button class="action-btn" title="Edit Class" onclick="editClassModal('Pre-Primary', 'Pre-Primary Wing', 5, 400, 5200)"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Add Grade Modal -->
<div class="modal fade" id="addNewClassModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-plus-circle text-primary me-2"></i>Add New Class / Grade</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form onsubmit="handleNewClass(event)">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Class Name (e.g. Class 10) <span class="required">*</span></label>
            <input type="text" class="form-control" id="newClassName" required placeholder="Enter class name">
          </div>
          <div class="mb-3">
            <label class="form-label">Academic Wing <span class="required">*</span></label>
            <select class="form-select" id="newClassWing" required>
              <option value="Pre-Primary Wing">Pre-Primary Wing</option>
              <option value="Primary Wing">Primary Wing (Classes 1–5)</option>
              <option value="Middle Wing">Middle Wing (Classes 6–8)</option>
              <option value="Secondary Wing">Secondary Wing (Classes 9–10)</option>
              <option value="Senior Secondary">Senior Secondary (Classes 11–12)</option>
            </select>
          </div>
          <div class="row g-2 mb-3">
            <div class="col-6">
              <label class="form-label">Number of Sections</label>
              <input type="number" class="form-control" id="newClassSections" value="3" min="1" max="10">
            </div>
            <div class="col-6">
              <label class="form-label">Total Student Capacity</label>
              <input type="number" class="form-control" id="newClassCapacity" value="120" min="20" max="500">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Monthly Tuition Fee Slab (&#8377;)</label>
            <input type="number" class="form-control font-mono" id="newClassFee" placeholder="e.g. 6500">
          </div>
          <div class="mb-3">
            <label class="form-label">Wing Supervisor / Coordinator</label>
            <input type="text" class="form-control" id="newClassSupervisor" placeholder="e.g. Mrs. Priya Nambiar">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-check-lg me-1"></i> Save Class</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function filterClasses() {
  const q = document.getElementById('classSearchInput').value.toLowerCase();
  const wing = document.getElementById('wingFilterSelect').value.toLowerCase();
  const rows = document.querySelectorAll('#classesTable tbody tr');

  rows.forEach(r => {
    const text = r.textContent.toLowerCase();
    const matchQ = text.includes(q);
    const matchWing = !wing || text.includes(wing);
    r.style.display = (matchQ && matchWing) ? '' : 'none';
  });
}

function handleNewClass(e) {
  e.preventDefault();
  const name = document.getElementById('newClassName').value.trim();
  bootstrap.Modal.getInstance(document.getElementById('addNewClassModal')).hide();
  if (window.EduApp && window.EduApp.toast) {
    EduApp.toast(`Class "${name}" configured with sections in LocalStorage!`, "success", "Classes Master");
  }
}

function editClassModal(name, wing, sec, cap, fee) {
  if (window.EduApp && window.EduApp.toast) {
    EduApp.toast(`Editing ${name} (${wing}) parameters.`, "info", "Class Master");
  }
}
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
