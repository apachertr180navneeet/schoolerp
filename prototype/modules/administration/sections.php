<?php
/**
 * EDUSYS PRO - Sections Allocation & Room Assignment
 * Section divisions, class teacher assignments, classroom allocations & capacity caps
 */
$page_title = "Sections Allocation";
$page_desc = "Class sections mapping, designated class teachers, room numbers & learner capacities";
$active_module = "administration";
$active_submodule = "sections.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/administration/classes.php'); ?>">Classes &amp; Grades</a></li>
      <li class="breadcrumb-item active" aria-current="page">Sections Allocation</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-grid-3x3-gap-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="window.print()" title="Print Section Roster">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#sectionsTable', 'sections_allocation.csv')">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewSectionModal">
      <i class="bi bi-plus-lg me-1"></i> Add Section
    </button>
  </div>
</div>

<!-- KPI Cards -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Active Sections</h6>
        <div class="kpi-value">48 Sections</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle-fill"></i> Fully Staffed</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-grid-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Avg Section Size</h6>
        <div class="kpi-value">36.5</div>
        <div class="kpi-trend positive"><i class="bi bi-person-check-fill"></i> Ideal &le; 40</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Assigned Teachers</h6>
        <div class="kpi-value">48 / 48</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> 100% Incharge Assigned</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-video3"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Designated Rooms</h6>
        <div class="kpi-value">48 Rooms</div>
        <div class="kpi-trend neutral"><i class="bi bi-door-open-fill"></i> Blocks A, B, C &amp; D</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-building-check"></i></div>
    </div>
  </div>
</div>

<!-- Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="sectionSearchInput" placeholder="Search section, class teacher, room..." onkeyup="filterSections()">
    </div>
    <select class="form-select" id="classFilterSelect" style="max-width: 190px;" onchange="filterSections()">
      <option value="">All Grades</option>
      <option value="Class 12">Class 12 (Senior Sec)</option>
      <option value="Class 11">Class 11 (Senior Sec)</option>
      <option value="Class 10">Class 10 (Secondary)</option>
      <option value="Class 9">Class 9 (Secondary)</option>
      <option value="Class 8">Class 8 (Middle)</option>
      <option value="Class 7">Class 7 (Middle)</option>
      <option value="Class 6">Class 6 (Middle)</option>
    </select>
  </div>
  <div class="table-filter-right">
    <span class="font-size-13 text-muted">Showing <strong class="text-primary">8</strong> Key Class Sections</span>
  </div>
</div>

<!-- Sections Table -->
<div class="erp-card mb-4">
  <div class="erp-table-responsive mb-0">
    <table class="erp-table mb-0" id="sectionsTable">
      <thead>
        <tr>
          <th>Class &amp; Section</th>
          <th>Designated Class Teacher</th>
          <th>Room &amp; Floor</th>
          <th>Student Enrollment</th>
          <th>Class Monitors / Reps</th>
          <th>Shift Timings</th>
          <th>Status</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="badge bg-primary text-white font-size-12 px-2 py-1">10 - A</span>
              <div>
                <strong class="font-size-14 text-primary">Class 10 - Section A</strong>
                <div class="font-size-11 text-muted">Secondary Wing (CBSE)</div>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-info text-white">PN</div>
              <div>
                <div class="fw-bold font-size-13">Mrs. Priya Nambiar</div>
                <small class="text-muted">PGT English • Priyan@edusys.com</small>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-dark border font-mono">Room 304, Block B (2nd Flr)</span></td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="fw-bold font-size-13">38 / 40</span>
              <div class="progress" style="width: 50px; height: 5px;"><div class="progress-bar bg-success" style="width: 95%"></div></div>
            </div>
          </td>
          <td><small>Aarav Sharma (B) • Diya Patel (G)</small></td>
          <td><small class="text-muted">07:45 AM – 02:15 PM</small></td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <button class="action-btn" title="View Students" onclick="toastMsg('Viewing students of Class 10-A')"><i class="bi bi-people"></i></button>
              <button class="action-btn" title="Edit Section" onclick="toastMsg('Editing Class 10-A mapping')"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="badge bg-primary text-white font-size-12 px-2 py-1">10 - B</span>
              <div>
                <strong class="font-size-14 text-primary">Class 10 - Section B</strong>
                <div class="font-size-11 text-muted">Secondary Wing (CBSE)</div>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-success text-white">SK</div>
              <div>
                <div class="fw-bold font-size-13">Mr. S. K. Rastogi</div>
                <small class="text-muted">TGT Mathematics</small>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-dark border font-mono">Room 305, Block B (2nd Flr)</span></td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="fw-bold font-size-13">39 / 40</span>
              <div class="progress" style="width: 50px; height: 5px;"><div class="progress-bar bg-success" style="width: 97%"></div></div>
            </div>
          </td>
          <td><small>Vihaan Singh (B) • Ananya Iyer (G)</small></td>
          <td><small class="text-muted">07:45 AM – 02:15 PM</small></td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <button class="action-btn" title="View Students" onclick="toastMsg('Viewing students of Class 10-B')"><i class="bi bi-people"></i></button>
              <button class="action-btn" title="Edit Section" onclick="toastMsg('Editing Class 10-B mapping')"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="badge bg-primary text-white font-size-12 px-2 py-1">12 - A</span>
              <div>
                <strong class="font-size-14 text-primary">Class 12 - Section A (PCM)</strong>
                <div class="font-size-11 text-muted">Science Stream (Physics, Chem, Math)</div>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-warning text-white">VR</div>
              <div>
                <div class="fw-bold font-size-13">Mr. Vikram Rathore</div>
                <small class="text-muted">PGT Physics • v.rathore@edusys.com</small>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-dark border font-mono">Room 401, Block C (3rd Flr)</span></td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="fw-bold font-size-13">40 / 40</span>
              <div class="progress" style="width: 50px; height: 5px;"><div class="progress-bar bg-danger" style="width: 100%"></div></div>
            </div>
          </td>
          <td><small>Rohan Gupta (B) • Sneha Kapoor (G)</small></td>
          <td><small class="text-muted">07:45 AM – 02:15 PM</small></td>
          <td><span class="badge-status badge-active">Full</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <button class="action-btn" title="View Students" onclick="toastMsg('Viewing students of Class 12-A')"><i class="bi bi-people"></i></button>
              <button class="action-btn" title="Edit Section" onclick="toastMsg('Editing Class 12-A mapping')"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="badge bg-primary text-white font-size-12 px-2 py-1">12 - B</span>
              <div>
                <strong class="font-size-14 text-primary">Class 12 - Section B (PCB)</strong>
                <div class="font-size-11 text-muted">Science Stream (Physics, Chem, Bio)</div>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-primary text-white">NM</div>
              <div>
                <div class="fw-bold font-size-13">Mrs. Nandini Mathur</div>
                <small class="text-muted">PGT Biology • Senior Supervisor</small>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-dark border font-mono">Room 402, Block C (3rd Flr)</span></td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="fw-bold font-size-13">36 / 40</span>
              <div class="progress" style="width: 50px; height: 5px;"><div class="progress-bar bg-success" style="width: 90%"></div></div>
            </div>
          </td>
          <td><small>Ishaan Verma (B) • Tanya Joshi (G)</small></td>
          <td><small class="text-muted">07:45 AM – 02:15 PM</small></td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <button class="action-btn" title="View Students" onclick="toastMsg('Viewing students of Class 12-B')"><i class="bi bi-people"></i></button>
              <button class="action-btn" title="Edit Section" onclick="toastMsg('Editing Class 12-B mapping')"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="badge bg-primary text-white font-size-12 px-2 py-1">12 - C</span>
              <div>
                <strong class="font-size-14 text-primary">Class 12 - Section C (Commerce)</strong>
                <div class="font-size-11 text-muted">Commerce (Accounts, BST, Eco)</div>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-info text-white">MK</div>
              <div>
                <div class="fw-bold font-size-13">Mr. M. K. Aggarwal</div>
                <small class="text-muted">PGT Accountancy</small>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-dark border font-mono">Room 403, Block C (3rd Flr)</span></td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="fw-bold font-size-13">38 / 40</span>
              <div class="progress" style="width: 50px; height: 5px;"><div class="progress-bar bg-success" style="width: 95%"></div></div>
            </div>
          </td>
          <td><small>Kavya Sethi (G) • Raghav Jain (B)</small></td>
          <td><small class="text-muted">07:45 AM – 02:15 PM</small></td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <button class="action-btn" title="View Students" onclick="toastMsg('Viewing students of Class 12-C')"><i class="bi bi-people"></i></button>
              <button class="action-btn" title="Edit Section" onclick="toastMsg('Editing Class 12-C mapping')"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="badge bg-primary text-white font-size-12 px-2 py-1">11 - A</span>
              <div>
                <strong class="font-size-14 text-primary">Class 11 - Section A (PCM)</strong>
                <div class="font-size-11 text-muted">Science Stream (Physics, Chem, Math)</div>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-secondary text-white">AJ</div>
              <div>
                <div class="fw-bold font-size-13">Dr. Anuj Jha</div>
                <small class="text-muted">PGT Chemistry</small>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-dark border font-mono">Room 404, Block C (3rd Flr)</span></td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="fw-bold font-size-13">39 / 40</span>
              <div class="progress" style="width: 50px; height: 5px;"><div class="progress-bar bg-success" style="width: 97%"></div></div>
            </div>
          </td>
          <td><small>Arnav Goel (B) • Riya Sen (G)</small></td>
          <td><small class="text-muted">07:45 AM – 02:15 PM</small></td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <button class="action-btn" title="View Students" onclick="toastMsg('Viewing students of Class 11-A')"><i class="bi bi-people"></i></button>
              <button class="action-btn" title="Edit Section" onclick="toastMsg('Editing Class 11-A mapping')"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="badge bg-primary text-white font-size-12 px-2 py-1">09 - A</span>
              <div>
                <strong class="font-size-14 text-primary">Class 9 - Section A</strong>
                <div class="font-size-11 text-muted">Secondary Wing (CBSE)</div>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-dark text-white">RS</div>
              <div>
                <div class="fw-bold font-size-13">Mrs. Rashmi Sen</div>
                <small class="text-muted">TGT Social Science</small>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-dark border font-mono">Room 201, Block B (1st Flr)</span></td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="fw-bold font-size-13">37 / 40</span>
              <div class="progress" style="width: 50px; height: 5px;"><div class="progress-bar bg-success" style="width: 92%"></div></div>
            </div>
          </td>
          <td><small>Pranav Nair (B) • Avani Mehta (G)</small></td>
          <td><small class="text-muted">07:45 AM – 02:15 PM</small></td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <button class="action-btn" title="View Students" onclick="toastMsg('Viewing students of Class 9-A')"><i class="bi bi-people"></i></button>
              <button class="action-btn" title="Edit Section" onclick="toastMsg('Editing Class 9-A mapping')"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="badge bg-primary text-white font-size-12 px-2 py-1">08 - A</span>
              <div>
                <strong class="font-size-14 text-primary">Class 8 - Section A</strong>
                <div class="font-size-11 text-muted">Middle Wing</div>
              </div>
            </div>
          </td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="table-avatar bg-danger text-white">SM</div>
              <div>
                <div class="fw-bold font-size-13">Mrs. Shalini Mehra</div>
                <small class="text-muted">TGT Hindi &amp; Sanskrit</small>
              </div>
            </div>
          </td>
          <td><span class="badge bg-light text-dark border font-mono">Room 102, Block A (Ground Flr)</span></td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <span class="fw-bold font-size-13">35 / 40</span>
              <div class="progress" style="width: 50px; height: 5px;"><div class="progress-bar bg-success" style="width: 88%"></div></div>
            </div>
          </td>
          <td><small>Dhruv Saxena (B) • Meera Pillai (G)</small></td>
          <td><small class="text-muted">07:45 AM – 02:15 PM</small></td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <button class="action-btn" title="View Students" onclick="toastMsg('Viewing students of Class 8-A')"><i class="bi bi-people"></i></button>
              <button class="action-btn" title="Edit Section" onclick="toastMsg('Editing Class 8-A mapping')"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Add Section Modal -->
<div class="modal fade" id="addNewSectionModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-grid-fill text-primary me-2"></i>Add New Class Section</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form onsubmit="handleNewSection(event)">
        <div class="modal-body">
          <div class="row g-2 mb-3">
            <div class="col-6">
              <label class="form-label">Grade / Class <span class="required">*</span></label>
              <select class="form-select" id="newSecClass" required>
                <option value="Class 10">Class 10</option>
                <option value="Class 12">Class 12</option>
                <option value="Class 11">Class 11</option>
                <option value="Class 9">Class 9</option>
                <option value="Class 8">Class 8</option>
              </select>
            </div>
            <div class="col-6">
              <label class="form-label">Section Tag <span class="required">*</span></label>
              <input type="text" class="form-control" id="newSecName" placeholder="e.g. Section C" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Assigned Class Teacher <span class="required">*</span></label>
            <input type="text" class="form-control" id="newSecTeacher" placeholder="e.g. Mrs. Priya Nambiar" required>
          </div>
          <div class="row g-2 mb-3">
            <div class="col-6">
              <label class="form-label">Room Number</label>
              <input type="text" class="form-control" id="newSecRoom" placeholder="e.g. Room 306">
            </div>
            <div class="col-6">
              <label class="form-label">Max Student Capacity</label>
              <input type="number" class="form-control" id="newSecCapacity" value="40" min="10" max="50">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-check-lg me-1"></i> Save Section</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function filterSections() {
  const q = document.getElementById('sectionSearchInput').value.toLowerCase();
  const cls = document.getElementById('classFilterSelect').value.toLowerCase();
  const rows = document.querySelectorAll('#sectionsTable tbody tr');

  rows.forEach(r => {
    const text = r.textContent.toLowerCase();
    const matchQ = text.includes(q);
    const matchCls = !cls || text.includes(cls);
    r.style.display = (matchQ && matchCls) ? '' : 'none';
  });
}

function handleNewSection(e) {
  e.preventDefault();
  const cls = document.getElementById('newSecClass').value;
  const name = document.getElementById('newSecName').value.trim();
  bootstrap.Modal.getInstance(document.getElementById('addNewSectionModal')).hide();
  toastMsg(`"${cls} - ${name}" allocated and mapped successfully!`);
}

function toastMsg(msg) {
  if (window.EduApp && window.EduApp.toast) {
    EduApp.toast(msg, "success", "Sections Allocation");
  } else {
    alert(msg);
  }
}
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
