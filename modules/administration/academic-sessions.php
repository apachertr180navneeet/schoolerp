<?php
/**
 * EDUSYS PRO - Academic Sessions & Term Configuration
 * Master session years, date bounds, semester/term divisions & session switching
 */
$page_title = "Academic Sessions";
$page_desc = "Master academic calendar years, term boundaries, session transition & working days";
$active_module = "administration";
$active_submodule = "academic-sessions.php";
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
      <li class="breadcrumb-item active" aria-current="page">Academic Sessions</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-calendar3-range-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="window.print()" title="Print Session Schedules">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#sessionsTable', 'academic_sessions.csv')">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewSessionModal">
      <i class="bi bi-plus-lg me-1"></i> Add Academic Session
    </button>
  </div>
</div>

<!-- KPI Cards -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Current Session</h6>
        <div class="kpi-value text-primary">2024-2025</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle-fill"></i> System Active</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Total Working Days</h6>
        <div class="kpi-value">224 Days</div>
        <div class="kpi-trend positive"><i class="bi bi-sun-fill"></i> CBSE Prescribed &ge; 220</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-clock-history"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Academic Terms</h6>
        <div class="kpi-value">2 Terms</div>
        <div class="kpi-trend positive"><i class="bi bi-journal-bookmark"></i> Sem 1 &amp; Sem 2</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-layers-half"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Next Planned Session</h6>
        <div class="kpi-value">2025-2026</div>
        <div class="kpi-trend neutral"><i class="bi bi-arrow-repeat"></i> Draft / Planning</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-plus-fill"></i></div>
    </div>
  </div>
</div>

<!-- Active Session Highlight Box -->
<div class="profile-hero-card mb-4" style="background: linear-gradient(135deg, rgba(30, 64, 175, 0.04) 0%, rgba(59, 130, 246, 0.08) 100%);">
  <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
    <div>
      <div class="d-flex align-items-center gap-2 mb-1">
        <span class="badge bg-primary text-white px-2 py-1 font-size-12 fw-bold">ACTIVE MASTER SESSION</span>
        <h3 class="h4 fw-bold mb-0 text-main">Session 2024 - 2025</h3>
        <span class="badge bg-success-subtle text-success border border-success-subtle font-size-12">April Cycle</span>
      </div>
      <p class="text-muted font-size-13 mb-2">
        Operational cycle running from <strong>01 April 2024</strong> through <strong>31 March 2025</strong>. Student attendance, fee schedules, CBSE roll generation, and examination timetables are linked to this active session.
      </p>
      <div class="d-flex flex-wrap gap-3 font-size-13 text-muted">
        <span><i class="bi bi-calendar-event text-primary me-1"></i> Elapsed: <strong>211 Days</strong></span>
        <span class="text-silver">•</span>
        <span><i class="bi bi-hourglass-split text-warning me-1"></i> Remaining: <strong>154 Days</strong></span>
        <span class="text-silver">•</span>
        <span><i class="bi bi-people text-info me-1"></i> Enrolled: <strong>2,840 Students</strong></span>
      </div>
    </div>
    <div class="d-flex gap-2">
      <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editSessionModal" onclick="populateEditSession('2024-2025', '2024-04-01', '2025-03-31', 224, 'Active')">
        <i class="bi bi-pencil me-1"></i> Edit Session
      </button>
      <button class="btn btn-sm btn-outline-secondary" onclick="manageTerms('2024-2025')">
        <i class="bi bi-layers me-1"></i> View Terms
      </button>
    </div>
  </div>
</div>

<!-- Master Sessions Table -->
<div class="erp-card mb-4">
  <div class="erp-card-header">
    <div>
      <h5 class="erp-card-title mb-0"><i class="bi bi-list-task text-primary"></i> Academic Sessions Directory</h5>
      <span class="font-size-12 text-muted">List of all historical, current and scheduled academic sessions</span>
    </div>
    <div class="d-flex gap-2">
      <input type="text" class="form-control form-control-sm" id="sessionTableSearch" placeholder="Filter sessions..." onkeyup="filterSessionsTable()">
    </div>
  </div>
  <div class="erp-table-responsive mb-0">
    <table class="erp-table mb-0" id="sessionsTable">
      <thead>
        <tr>
          <th>Session Name</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Working Days</th>
          <th>Terms / Semesters</th>
          <th>Student Strength</th>
          <th>Status</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-primary-subtle">
          <td>
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-star-fill text-warning fs-5"></i>
              <div>
                <strong class="text-primary font-size-14">2024-2025</strong>
                <span class="badge bg-primary text-white font-size-10 ms-1">CURRENT</span>
                <div class="font-size-11 text-muted">CBSE Regular Term Cycle</div>
              </div>
            </div>
          </td>
          <td>01 Apr 2024</td>
          <td>31 Mar 2025</td>
          <td><span class="badge bg-light text-dark border font-mono">224 Days</span></td>
          <td>Term 1 (Apr–Sep), Term 2 (Oct–Mar)</td>
          <td><strong>2,840</strong> Learners</td>
          <td><span class="badge-status badge-active">Active</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <button class="action-btn" title="Edit Session" data-bs-toggle="modal" data-bs-target="#editSessionModal" onclick="populateEditSession('2024-2025', '2024-04-01', '2025-03-31', 224, 'Active')"><i class="bi bi-pencil"></i></button>
              <button class="action-btn" title="Term Setup" onclick="manageTerms('2024-2025')"><i class="bi bi-layers"></i></button>
            </div>
          </td>
        </tr>

        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-calendar-plus text-info fs-5"></i>
              <div>
                <strong class="font-size-14">2025-2026</strong>
                <span class="badge bg-info-subtle text-info border font-size-10 ms-1">UPCOMING</span>
                <div class="font-size-11 text-muted">Admissions & Class Sizing Planned</div>
              </div>
            </div>
          </td>
          <td>01 Apr 2025</td>
          <td>31 Mar 2026</td>
          <td><span class="badge bg-light text-dark border font-mono">225 Days</span></td>
          <td>Term 1 (Apr–Sep), Term 2 (Oct–Mar)</td>
          <td><span class="text-muted">Target: 3,000</span></td>
          <td><span class="badge bg-light text-info border font-size-12">Planning</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <button class="action-btn" title="Set Active Session" onclick="activateSession('2025-2026')"><i class="bi bi-check-circle"></i></button>
              <button class="action-btn" title="Edit Session" data-bs-toggle="modal" data-bs-target="#editSessionModal" onclick="populateEditSession('2025-2026', '2025-04-01', '2026-03-31', 225, 'Planning')"><i class="bi bi-pencil"></i></button>
            </div>
          </td>
        </tr>

        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-archive text-muted fs-5"></i>
              <div>
                <strong class="font-size-14 text-muted">2023-2024</strong>
                <span class="badge bg-light text-muted border font-size-10 ms-1">ARCHIVED</span>
                <div class="font-size-11 text-muted">CBSE Board Exam Concluded</div>
              </div>
            </div>
          </td>
          <td>01 Apr 2023</td>
          <td>31 Mar 2024</td>
          <td><span class="badge bg-light text-dark border font-mono">222 Days</span></td>
          <td>Term 1, Term 2 (Closed)</td>
          <td>2,710 Students (Promoted)</td>
          <td><span class="badge bg-light text-muted border font-size-12">Closed / Locked</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <button class="action-btn" title="View Historical Audit" onclick="viewAudit('2023-2024')"><i class="bi bi-eye"></i></button>
            </div>
          </td>
        </tr>

        <tr>
          <td>
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-archive text-muted fs-5"></i>
              <div>
                <strong class="font-size-14 text-muted">2022-2023</strong>
                <span class="badge bg-light text-muted border font-size-10 ms-1">ARCHIVED</span>
                <div class="font-size-11 text-muted">Silver Jubilee Historic Year</div>
              </div>
            </div>
          </td>
          <td>01 Apr 2022</td>
          <td>31 Mar 2023</td>
          <td><span class="badge bg-light text-dark border font-mono">220 Days</span></td>
          <td>Term 1, Term 2 (Closed)</td>
          <td>2,590 Students (Promoted)</td>
          <td><span class="badge bg-light text-muted border font-size-12">Closed / Locked</span></td>
          <td class="text-center">
            <div class="action-btn-group justify-content-center">
              <button class="action-btn" title="View Historical Audit" onclick="viewAudit('2022-2023')"><i class="bi bi-eye"></i></button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Term Setup & Semesters Card -->
<div class="erp-card">
  <div class="erp-card-header">
    <h5 class="erp-card-title"><i class="bi bi-layers-half text-primary"></i> Current Session (2024-2025) Term Structure</h5>
  </div>
  <div class="erp-card-body">
    <div class="row g-3">
      <!-- Term 1 -->
      <div class="col-md-6">
        <div class="p-3 border rounded-3 bg-app">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <h6 class="fw-bold text-primary mb-0 font-size-15"><i class="bi bi-bookmark-fill me-1"></i> Term 1 (First Semester)</h6>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Evaluated / Concluded</span>
          </div>
          <div class="font-size-13 text-muted mb-3">
            <div><i class="bi bi-calendar3 me-1"></i> Period: <strong>01 April 2024 – 30 September 2024</strong></div>
            <div><i class="bi bi-clock me-1"></i> Working Days: <strong>112 Days</strong></div>
          </div>
          <div class="border-top pt-2">
            <div class="font-size-12 fw-semibold text-main mb-1">Key Milestone Assessments:</div>
            <div class="d-flex flex-wrap gap-2">
              <span class="badge bg-light text-dark border font-size-11">Periodic Test 1 (July 2024)</span>
              <span class="badge bg-light text-dark border font-size-11">Half-Yearly Exams (Sep 2024)</span>
              <span class="badge bg-light text-primary border font-size-11">Term 1 PTM (05 Oct 2024)</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Term 2 -->
      <div class="col-md-6">
        <div class="p-3 border rounded-3 bg-app">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <h6 class="fw-bold text-success mb-0 font-size-15"><i class="bi bi-bookmark-fill me-1"></i> Term 2 (Second Semester)</h6>
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle font-size-11">In Progress</span>
          </div>
          <div class="font-size-13 text-muted mb-3">
            <div><i class="bi bi-calendar3 me-1"></i> Period: <strong>01 October 2024 – 31 March 2025</strong></div>
            <div><i class="bi bi-clock me-1"></i> Working Days: <strong>112 Days</strong></div>
          </div>
          <div class="border-top pt-2">
            <div class="font-size-12 fw-semibold text-main mb-1">Key Milestone Assessments:</div>
            <div class="d-flex flex-wrap gap-2">
              <span class="badge bg-light text-dark border font-size-11">Periodic Test 2 (Dec 2024)</span>
              <span class="badge bg-light text-dark border font-size-11">Pre-Board Exams (Jan 2025)</span>
              <span class="badge bg-light text-danger border font-size-11">Annual Board Exams (Feb-Mar 2025)</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add New Session Modal -->
<div class="modal fade" id="addNewSessionModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-calendar-plus text-primary me-2"></i>Add New Academic Session</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form onsubmit="handleNewSession(event)">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Session Name (e.g. 2026-2027) <span class="required">*</span></label>
            <input type="text" class="form-control font-mono" id="newSessionName" required placeholder="YYYY-YYYY">
          </div>
          <div class="row g-2 mb-3">
            <div class="col-6">
              <label class="form-label">Start Date <span class="required">*</span></label>
              <input type="date" class="form-control" id="newSessionStart" required>
            </div>
            <div class="col-6">
              <label class="form-label">End Date <span class="required">*</span></label>
              <input type="date" class="form-control" id="newSessionEnd" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Expected Working Days</label>
            <input type="number" class="form-control font-mono" id="newSessionDays" value="224" min="180" max="300">
            <div class="form-text font-size-11">CBSE recommends minimum 220 instructional days for primary to senior secondary wings.</div>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="copyPreviousStructure" checked>
            <label class="form-check-label font-size-13" for="copyPreviousStructure">
              Clone class sections and fee structure from 2024-2025
            </label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-check-lg me-1"></i> Create Session</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Session Modal -->
<div class="modal fade" id="editSessionModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-pencil-square text-primary me-2"></i>Edit Academic Session</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form onsubmit="handleEditSession(event)">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Session Name</label>
            <input type="text" class="form-control font-mono" id="editSessionName" readonly>
          </div>
          <div class="row g-2 mb-3">
            <div class="col-6">
              <label class="form-label">Start Date</label>
              <input type="date" class="form-control" id="editSessionStart" required>
            </div>
            <div class="col-6">
              <label class="form-label">End Date</label>
              <input type="date" class="form-control" id="editSessionEnd" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Working Days</label>
            <input type="number" class="form-control font-mono" id="editSessionDays" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Session Status</label>
            <select class="form-select" id="editSessionStatus">
              <option value="Active">Active (Current System Session)</option>
              <option value="Planning">Planning / Upcoming</option>
              <option value="Closed">Closed / Archived</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-check-lg me-1"></i> Update Session</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function filterSessionsTable() {
  const q = document.getElementById('sessionTableSearch').value.toLowerCase();
  const rows = document.querySelectorAll('#sessionsTable tbody tr');
  rows.forEach(r => {
    r.style.display = r.textContent.toLowerCase().includes(q) ? '' : 'none';
  });
}

function handleNewSession(e) {
  e.preventDefault();
  const name = document.getElementById('newSessionName').value.trim();
  bootstrap.Modal.getInstance(document.getElementById('addNewSessionModal')).hide();
  if (window.EduApp && window.EduApp.toast) {
    EduApp.toast(`Academic Session "${name}" configured successfully!`, "success", "Academic Sessions");
  }
}

function populateEditSession(name, start, end, days, status) {
  document.getElementById('editSessionName').value = name;
  document.getElementById('editSessionStart').value = start;
  document.getElementById('editSessionEnd').value = end;
  document.getElementById('editSessionDays').value = days;
  document.getElementById('editSessionStatus').value = status;
}

function handleEditSession(e) {
  e.preventDefault();
  const name = document.getElementById('editSessionName').value;
  bootstrap.Modal.getInstance(document.getElementById('editSessionModal')).hide();
  if (window.EduApp && window.EduApp.toast) {
    EduApp.toast(`Session "${name}" details updated successfully!`, "success", "Academic Sessions");
  }
}

function activateSession(sessionName) {
  if (confirm(`Switch global ERP active academic session to "${sessionName}"?`)) {
    if (window.EduApp && window.EduApp.toast) {
      EduApp.toast(`Switched active academic session to ${sessionName}!`, "success", "Session Switched");
    }
  }
}

function manageTerms(sessionName) {
  if (window.EduApp && window.EduApp.toast) {
    EduApp.toast(`Viewing semester and assessment divisions for session ${sessionName}.`, "info", "Term Configuration");
  }
}

function viewAudit(sessionName) {
  if (window.EduApp && window.EduApp.toast) {
    EduApp.toast(`Opening archived audit records for session ${sessionName}.`, "info", "Archive Log");
  }
}
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
