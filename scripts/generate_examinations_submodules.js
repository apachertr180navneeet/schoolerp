/**
 * EDUSYS PRO - COMPLETE EXAMINATION & RESULTS MODULE GENERATOR
 * Generates all 34 submodules with domain-specific UI, realistic Indian CBSE/State data,
 * domain KPIs, specialized filters, and custom operational tables.
 */

const fs = require('fs');
const path = require('path');

const EXAM_DIR = path.resolve(__dirname, '../prototype/modules/examinations');

if (!fs.existsSync(EXAM_DIR)) {
  fs.mkdirSync(EXAM_DIR, { recursive: true });
}

// Common helper to wrap table pages
function generateTablePage(d) {
  const isReport = d.isReportPage === true;
  const isTool = d.isToolPage === true;
  
  let headerActionHtml = '';
  if (isReport) {
    headerActionHtml = `
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', '${d.filename.replace('.php', '')}_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" onclick="EduTables.print()">
      <i class="bi bi-file-earmark-pdf me-1"></i> Print / Save PDF
    </button>`;
  } else if (isTool) {
    headerActionHtml = `
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', '${d.filename.replace('.php', '')}_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#${d.toolModalId || 'actionToolModal'}">
      <i class="bi ${d.actionBtnIcon || 'bi-gear-fill'} me-1"></i> ${d.actionBtnText || 'Execute Tool'}
    </button>`;
  } else {
    headerActionHtml = `
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', '${d.filename.replace('.php', '')}_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi ${d.actionBtnIcon || 'bi-plus-lg'} me-1"></i> ${d.actionBtnText || 'Add New Record'}
    </button>`;
  }

  const rowActionHtml = isReport ? `
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', '${d.filename.replace('.php', '')}_download.csv')" title="Download Statement"><i class="bi bi-download"></i></button>
          </div>` : (isTool ? `
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Record"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-success" title="Run Quick Action" onclick="alert('Action triggered successfully for this record!')"><i class="bi bi-play-circle"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, '${d.title.replace(/'/g, "\\'")}')" title="Remove"><i class="bi bi-trash"></i></button>
          </div>` : `
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, '${d.title.replace(/'/g, "\\'")}')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>`);

  return `<?php
/**
 * EDUSYS PRO - ${d.title.toUpperCase()}
 * Dedicated operational interface & records management for ${d.title}
 */
$page_title = "${d.title}";
$page_desc = "${d.desc}";
$active_module = "examinations";
$active_submodule = "${d.filename}";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/examinations/dashboard.php'); ?>">Examination & Results</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi ${d.icon} text-primary me-2"></i><?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    ${headerActionHtml}
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card ${d.kpi1Color || 'kpi-primary'}">
      <div class="kpi-info">
        <h6>${d.kpi1Label}</h6>
        <div class="kpi-value">${d.kpi1Value}</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle-fill"></i> ${d.kpi1Sub}</div>
      </div>
      <div class="kpi-icon"><i class="bi ${d.kpi1Icon}"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card ${d.kpi2Color || 'kpi-success'}">
      <div class="kpi-info">
        <h6>${d.kpi2Label}</h6>
        <div class="kpi-value">${d.kpi2Value}</div>
        <div class="kpi-trend neutral"><i class="bi bi-info-circle-fill"></i> ${d.kpi2Sub}</div>
      </div>
      <div class="kpi-icon"><i class="bi ${d.kpi2Icon}"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card ${d.kpi3Color || 'kpi-warning'}">
      <div class="kpi-info">
        <h6>${d.kpi3Label}</h6>
        <div class="kpi-value">${d.kpi3Value}</div>
        <div class="kpi-trend positive"><i class="bi bi-graph-up-arrow"></i> ${d.kpi3Sub}</div>
      </div>
      <div class="kpi-icon"><i class="bi ${d.kpi3Icon}"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card ${d.kpi4Color || 'kpi-info'}">
      <div class="kpi-info">
        <h6>${d.kpi4Label}</h6>
        <div class="kpi-value">${d.kpi4Value}</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> ${d.kpi4Sub}</div>
      </div>
      <div class="kpi-icon"><i class="bi ${d.kpi4Icon}"></i></div>
    </div>
  </div>
</div>

<!-- Main Table Container -->
<div class="table-container mb-4">
  <div class="table-header">
    <div class="table-title">
      <i class="bi ${d.icon} text-primary me-2"></i> ${d.tableHeading || (d.title + ' Register')}
    </div>
    <div class="table-actions">
      <div class="search-box">
        <i class="bi bi-search"></i>
        <input type="text" id="tableSearchInput" class="form-control" placeholder="Search ${d.title.toLowerCase()}..." onkeyup="EduTables.search('#mainDataTable', this.value)">
      </div>
      <div class="filter-dropdown">
        <select class="form-select form-select-sm" onchange="EduTables.filter('#mainDataTable', this.value)">
          <option value="">All Records</option>
          ${(d.filters || ['Active', 'Completed', 'Pending']).map(f => `<option value="${f}">${f}</option>`).join('\n          ')}
        </select>
      </div>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table erp-table table-hover" id="mainDataTable">
      <thead>
        <tr>
          ${d.columns.map(c => `<th>${c}</th>`).join('\n          ')}
          <th class="text-center" style="width: 120px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        ${d.rows.map(r => `
        <tr>
          ${r.map(cell => `<td>${cell}</td>`).join('\n          ')}
          <td>
            ${rowActionHtml}
          </td>
        </tr>`).join('')}
      </tbody>
    </table>
  </div>

  <div class="table-footer">
    <div class="table-info font-size-13 text-muted">
      Showing 1 to ${d.rows.length} of ${d.rows.length} entries (CBSE Academic Cycle 2026-27)
    </div>
    <nav aria-label="Page navigation">
      <ul class="pagination pagination-sm mb-0">
        <li class="page-item disabled"><a class="page-link" href="#"><i class="bi bi-chevron-left"></i></a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a></li>
      </ul>
    </nav>
  </div>
</div>

<!-- Modal: Add New Record -->
<div class="modal fade" id="addNewRecordModal" tabindex="-1" aria-labelledby="addNewRecordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNewRecordModalLabel"><i class="bi ${d.icon} text-primary me-2"></i>${d.actionBtnText || 'Create Record'}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="recordForm" onsubmit="event.preventDefault(); alert('Saved successfully in CBSE Exam Repository!'); bootstrap.Modal.getInstance(document.getElementById('addNewRecordModal')).hide();">
          <div class="row g-3">
            ${(d.formFields || [
              { label: 'Exam Cycle / Session', type: 'select', options: ['Annual Board Examination 2026', 'Pre-Board II (X & XII)', 'Term-2 Final Exams (VI-IX)', 'Periodic Assessment 2 (PA-2)'] },
              { label: 'Class & Section', type: 'select', options: ['Class X - All Sections', 'Class XII - Science (A, B)', 'Class XII - Commerce (C)', 'Class XII - Humanities (D)', 'Class IX - All Sections'] },
              { label: 'Subject / Paper', type: 'text', placeholder: 'e.g. Mathematics Standard (041)' },
              { label: 'Date / Deadline', type: 'date' },
              { label: 'Remarks / Instructions', type: 'textarea', placeholder: 'CBSE assessment guidelines and specific remarks...' }
            ]).map(ff => `
            <div class="${ff.col || 'col-md-6'}">
              <label class="form-label fw-semibold font-size-13">${ff.label}</label>
              ${ff.type === 'select' ? `
              <select class="form-select form-select-sm">
                ${ff.options.map(o => `<option>${o}</option>`).join('')}
              </select>` : (ff.type === 'textarea' ? `
              <textarea class="form-control form-control-sm" rows="3" placeholder="${ff.placeholder || ''}"></textarea>` : `
              <input type="${ff.type}" class="form-control form-control-sm" placeholder="${ff.placeholder || ''}">`)}
            </div>`).join('')}
          </div>
          <div class="modal-footer px-0 pb-0 pt-3 mt-3 border-top">
            <button type="button" class="btn btn-sm btn-light border" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-sm btn-primary fw-bold"><i class="bi bi-check2 me-1"></i> Confirm & Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal: Tool Modal (if applicable) -->
<div class="modal fade" id="${d.toolModalId || 'actionToolModal'}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi ${d.icon} text-primary me-2"></i>${d.actionBtnText || 'Run Operational Process'}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-info py-2 font-size-13">
          <i class="bi bi-info-circle-fill me-1"></i> Running this operation will validate datasets and process examination calculations for active sessions.
        </div>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label font-size-13 fw-semibold">Target Academic Session</label>
            <select class="form-select form-select-sm">
              <option>2026-2027 (Active Session)</option>
              <option>2025-2026 (Archived)</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label font-size-13 fw-semibold">Select Examination Group</label>
            <select class="form-select form-select-sm">
              <option>Annual Final Assessment 2026</option>
              <option>Pre-Board Examination Series II</option>
              <option>Term 2 Periodic Assessments</option>
            </select>
          </div>
          <div class="col-12">
            <label class="form-label font-size-13 fw-semibold">Target Classes</label>
            <div class="d-flex flex-wrap gap-2">
              <span class="badge bg-light text-dark border p-2"><input type="checkbox" checked class="form-check-input me-1"> Class X (CBSE AISSE)</span>
              <span class="badge bg-light text-dark border p-2"><input type="checkbox" checked class="form-check-input me-1"> Class XII (CBSE AISSCE)</span>
              <span class="badge bg-light text-dark border p-2"><input type="checkbox" checked class="form-check-input me-1"> Class IX</span>
              <span class="badge bg-light text-dark border p-2"><input type="checkbox" checked class="form-check-input me-1"> Class XI</span>
            </div>
          </div>
        </div>
        <div class="modal-footer px-0 pb-0 pt-3 mt-3 border-top">
          <button type="button" class="btn btn-sm btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-sm btn-primary fw-bold" onclick="alert('Operation initiated successfully! Processing background queue.'); bootstrap.Modal.getInstance(document.getElementById('${d.toolModalId || 'actionToolModal'}')).hide();"><i class="bi bi-cpu me-1"></i> Start Execution</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal: View Record Details -->
<div class="modal fade" id="viewRecordModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-info-circle text-primary me-2"></i>Record Summary</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body font-size-13">
        <div class="p-3 bg-light rounded mb-3 border">
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Module Context:</span>
            <span class="fw-bold text-primary">${d.title}</span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Affiliation Standard:</span>
            <span class="badge bg-primary-subtle text-primary border">CBSE New Delhi (Aff. 2130048)</span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Academic Session:</span>
            <span class="fw-semibold">2026-2027</span>
          </div>
          <div class="d-flex justify-content-between">
            <span class="text-muted">Verification Status:</span>
            <span class="badge bg-success-subtle text-success border"><i class="bi bi-check-circle me-1"></i>Verified & Locked</span>
          </div>
        </div>
        <p class="text-muted small mb-0"><i class="bi bi-shield-lock me-1"></i> Audited by Examination Controller & Academic In-charge.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-sm btn-primary" onclick="window.print()"><i class="bi bi-printer me-1"></i> Print Dossier</button>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
`;
}

// ==========================================
// BESPOKE DASHBOARD GENERATION
// ==========================================
function generateExamDashboard() {
  return `<?php
/**
 * EDUSYS PRO - EXAMINATION & RESULTS COMMAND CENTER
 * Comprehensive operational dashboard with live exam cycle status, pass statistics,
 * CCE & Board grade distribution, and rapid controller workflows.
 */
$page_title = "Examination Dashboard";
$page_desc = "Master control center for CBSE board exams, term evaluations, grading matrices & results analytics";
$active_module = "examinations";
$active_submodule = "dashboard.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/examinations/dashboard.php'); ?>">Examination & Results</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-award-fill text-primary me-2"></i>Examination & Results Command Center</h1>
    <p>CBSE Board (AISSE/AISSCE) & Internal Assessment Cycle Management - Session 2026-27</p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/examinations/exam-schedules.php'); ?>" class="btn btn-light border">
      <i class="bi bi-calendar-range me-1"></i> View Timetables
    </a>
    <a href="<?php echo base_url('modules/examinations/marks-entry.php'); ?>" class="btn btn-light border">
      <i class="bi bi-pencil-square me-1"></i> Marks Portal
    </a>
    <a href="<?php echo base_url('modules/examinations/report-cards.php'); ?>" class="btn btn-primary fw-bold">
      <i class="bi bi-file-earmark-person me-1"></i> Generate Report Cards
    </a>
  </div>
</div>

<!-- Key Performance Indicators -->
<div class="row g-3 mb-4">
  <div class="col-6 col-lg-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Active Exam Cycle</h6>
        <div class="kpi-value">Pre-Board II</div>
        <div class="kpi-trend positive"><i class="bi bi-hourglass-split"></i> 4 Days Remaining</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-event"></i></div>
    </div>
  </div>
  <div class="col-6 col-lg-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Admit Cards Issued</h6>
        <div class="kpi-value">1,420 <small class="text-muted font-size-13">/ 1,420</small></div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle-fill"></i> 100% Dispatched</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-card-checklist"></i></div>
    </div>
  </div>
  <div class="col-6 col-lg-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Marks Entry Status</h6>
        <div class="kpi-value">84.6%</div>
        <div class="kpi-trend positive"><i class="bi bi-cloud-arrow-up"></i> 52/60 Papers Uploaded</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-pencil-square"></i></div>
    </div>
  </div>
  <div class="col-6 col-lg-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Projected Pass Rate</h6>
        <div class="kpi-value">98.2%</div>
        <div class="kpi-trend positive"><i class="bi bi-graph-up-arrow"></i> +1.4% vs Last Year</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-trophy-fill"></i></div>
    </div>
  </div>
</div>

<!-- Active War Room & Rapid Operations Grid -->
<div class="row g-4 mb-4">
  <!-- Today's Examination Hall Schedule -->
  <div class="col-lg-8">
    <div class="card border shadow-sm h-100">
      <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <div>
          <h6 class="mb-0 fw-bold text-dark"><i class="bi bi-clock-history text-primary me-2"></i>Today's Examination Schedule & Hall Status</h6>
          <small class="text-muted">Wednesday, 28 October 2026 | Morning Session (09:30 AM - 12:30 PM)</small>
        </div>
        <span class="badge bg-success-subtle text-success border"><i class="bi bi-broadcast me-1"></i>Live Session</span>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table erp-table table-hover mb-0">
            <thead>
              <tr>
                <th>Hall / Room</th>
                <th>Class & Stream</th>
                <th>Subject & Code</th>
                <th>Enrolled</th>
                <th>Chief Invigilator</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><span class="fw-bold text-primary">Hall A (Auditorium)</span></td>
                <td>Class X (Sec A, B, C)</td>
                <td><span class="badge bg-light text-dark border">Mathematics Std (041)</span></td>
                <td><strong>124</strong> Candidates</td>
                <td>Dr. Sunita Deshmukh</td>
                <td><span class="badge bg-primary"><i class="bi bi-pen me-1"></i>Exam In-Progress</span></td>
              </tr>
              <tr>
                <td><span class="fw-bold text-primary">Hall B (Library Block)</span></td>
                <td>Class XII (Science)</td>
                <td><span class="badge bg-light text-dark border">Physics Theory (042)</span></td>
                <td><strong>88</strong> Candidates</td>
                <td>Prof. Rajesh Malhotra</td>
                <td><span class="badge bg-primary"><i class="bi bi-pen me-1"></i>Exam In-Progress</span></td>
              </tr>
              <tr>
                <td><span class="fw-bold text-primary">Room 204 (Wing C)</span></td>
                <td>Class XII (Commerce)</td>
                <td><span class="badge bg-light text-dark border">Accountancy (055)</span></td>
                <td><strong>46</strong> Candidates</td>
                <td>Mrs. Neha Kulkarni</td>
                <td><span class="badge bg-primary"><i class="bi bi-pen me-1"></i>Exam In-Progress</span></td>
              </tr>
              <tr>
                <td><span class="fw-bold text-primary">Computer Lab 1</span></td>
                <td>Class IX (Sec A, B)</td>
                <td><span class="badge bg-light text-dark border">Info Technology (402)</span></td>
                <td><strong>72</strong> Candidates</td>
                <td>Mr. Amit Sen</td>
                <td><span class="badge bg-success"><i class="bi bi-check2-all me-1"></i>Papers Collected</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer bg-light py-2 d-flex justify-content-between align-items-center font-size-13">
        <span><i class="bi bi-shield-check text-success me-1"></i> Confidential OMR packets sealed with CCTV surveillance.</span>
        <a href="<?php echo base_url('modules/examinations/exam-rooms.php'); ?>" class="fw-bold text-primary">Manage All 18 Examination Halls <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
  </div>

  <!-- CBSE 9-Point Grade Distribution -->
  <div class="col-lg-4">
    <div class="card border shadow-sm h-100">
      <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold text-dark"><i class="bi bi-bar-chart-steps text-primary me-2"></i>Grade Distribution (Pre-Board)</h6>
        <span class="badge bg-light text-dark border">CBSE 9-Point</span>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span class="fw-semibold text-success"><i class="bi bi-circle-fill font-size-10 me-1"></i> A1 Grade (91% - 100%)</span>
            <strong>328 Students (23.1%)</strong>
          </div>
          <div class="progress" style="height: 7px;">
            <div class="progress-bar bg-success" style="width: 23.1%"></div>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span class="fw-semibold text-primary"><i class="bi bi-circle-fill font-size-10 me-1"></i> A2 Grade (81% - 90%)</span>
            <strong>412 Students (29.0%)</strong>
          </div>
          <div class="progress" style="height: 7px;">
            <div class="progress-bar bg-primary" style="width: 29.0%"></div>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span class="fw-semibold text-info"><i class="bi bi-circle-fill font-size-10 me-1"></i> B1 Grade (71% - 80%)</span>
            <strong>340 Students (23.9%)</strong>
          </div>
          <div class="progress" style="height: 7px;">
            <div class="progress-bar bg-info" style="width: 23.9%"></div>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span class="fw-semibold text-secondary"><i class="bi bi-circle-fill font-size-10 me-1"></i> B2 Grade (61% - 70%)</span>
            <strong>214 Students (15.1%)</strong>
          </div>
          <div class="progress" style="height: 7px;">
            <div class="progress-bar bg-secondary" style="width: 15.1%"></div>
          </div>
        </div>

        <div class="mb-2">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span class="fw-semibold text-warning"><i class="bi bi-circle-fill font-size-10 me-1"></i> C1 / C2 Grade (41% - 60%)</span>
            <strong>102 Students (7.2%)</strong>
          </div>
          <div class="progress" style="height: 7px;">
            <div class="progress-bar bg-warning" style="width: 7.2%"></div>
          </div>
        </div>

        <div class="mt-3 p-2 bg-light rounded border font-size-12 d-flex justify-content-between align-items-center">
          <span class="text-danger fw-semibold"><i class="bi bi-exclamation-triangle-fill me-1"></i> Remedial Candidates (D/E):</span>
          <span class="badge bg-danger-subtle text-danger border">24 Students (<a href="<?php echo base_url('modules/academics/remedial-classes.php'); ?>" class="text-danger fw-bold">Remedial Queue</a>)</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Quick Action Portals for Examination Controllers -->
<div class="row g-3 mb-4">
  <div class="col-md-3">
    <div class="card p-3 border shadow-sm text-center h-100 hover-card">
      <div class="rounded-circle bg-primary-subtle text-primary p-3 d-inline-block mx-auto mb-2">
        <i class="bi bi-person-badge font-size-24"></i>
      </div>
      <h6 class="fw-bold mb-1">Admit Cards & Seating</h6>
      <p class="text-muted font-size-12 mb-3">Roll number allocation, desk sticker tags & hall tickets</p>
      <a href="<?php echo base_url('modules/examinations/admit-cards.php'); ?>" class="btn btn-sm btn-outline-primary mt-auto">Open Admit Portal</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card p-3 border shadow-sm text-center h-100 hover-card">
      <div class="rounded-circle bg-success-subtle text-success p-3 d-inline-block mx-auto mb-2">
        <i class="bi bi-journal-check font-size-24"></i>
      </div>
      <h6 class="fw-bold mb-1">Internal Assessment (20%)</h6>
      <p class="text-muted font-size-12 mb-3">Periodic tests, portfolio, subject enrichment & CCE</p>
      <a href="<?php echo base_url('modules/examinations/internal-assessment.php'); ?>" class="btn btn-sm btn-outline-success mt-auto">Assessments 20%</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card p-3 border shadow-sm text-center h-100 hover-card">
      <div class="rounded-circle bg-warning-subtle text-warning p-3 d-inline-block mx-auto mb-2">
        <i class="bi bi-cpu font-size-24"></i>
      </div>
      <h6 class="fw-bold mb-1">Result Processing Engine</h6>
      <p class="text-muted font-size-12 mb-3">CBSE 80:20 tabulation, grace marks, ranks & moderation</p>
      <a href="<?php echo base_url('modules/examinations/result-processing.php'); ?>" class="btn btn-sm btn-outline-warning mt-auto">Process Engine</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card p-3 border shadow-sm text-center h-100 hover-card">
      <div class="rounded-circle bg-info-subtle text-info p-3 d-inline-block mx-auto mb-2">
        <i class="bi bi-printer font-size-24"></i>
      </div>
      <h6 class="fw-bold mb-1">Report Card Publishing</h6>
      <p class="text-muted font-size-12 mb-3">Bilingual CBSE report cards with QR verification</p>
      <a href="<?php echo base_url('modules/examinations/report-cards.php'); ?>" class="btn btn-sm btn-outline-info mt-auto">Publish Cards</a>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
`;
}

// ==========================================
// SUBMODULE DEFINITIONS (33 Submodules)
// ==========================================
const submodules = [
  {
    filename: 'exam-types.php',
    title: 'Exam Types Master',
    desc: 'Configure academic assessment classifications (Periodic, Half-Yearly, Pre-Board, Board, Practical)',
    icon: 'bi-tags-fill',
    actionBtnText: 'Add Exam Type',
    actionBtnIcon: 'bi-plus-lg',
    kpi1Label: 'Total Types', kpi1Value: '8 Masters', kpi1Sub: 'CBSE & Internal', kpi1Icon: 'bi-tag',
    kpi2Label: 'Weightage Mapped', kpi2Value: '100%', kpi2Sub: '80 Theory : 20 CCE', kpi2Icon: 'bi-pie-chart',
    kpi3Label: 'Mandatory Tests', kpi3Value: '3 PA Series', kpi3Sub: 'Best 2 Considered', kpi3Icon: 'bi-calendar3',
    kpi4Label: 'System Status', kpi4Value: 'Active', kpi4Sub: 'Locked for 2026-27', kpi4Icon: 'bi-check-circle',
    columns: ['Type Code', 'Exam Type Name', 'Weightage %', 'Min Pass %', 'Applicable Grades', 'Grading Scheme', 'Status'],
    filters: ['Active', 'Theory', 'Practical', 'CCE'],
    rows: [
      ['<span class="badge bg-primary">PA-1</span>', '<strong>Periodic Assessment 1</strong>', '10% (CCE)', '33%', 'Class I - XII', '<span class="badge bg-light text-dark border">Direct Marks</span>', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-primary">PA-2</span>', '<strong>Periodic Assessment 2 (Mid-Term)</strong>', '20% (CCE)', '33%', 'Class I - XII', '<span class="badge bg-light text-dark border">Direct Marks</span>', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-primary">HY-01</span>', '<strong>Half-Yearly Examination</strong>', '30% Weight', '33%', 'Class VI - XII', '<span class="badge bg-light text-dark border">9-Point CBSE</span>', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-primary">PB-01</span>', '<strong>Pre-Board Examination I</strong>', 'Internal Mock', '33%', 'Class X & XII', '<span class="badge bg-light text-dark border">Board Replica</span>', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-primary">PB-02</span>', '<strong>Pre-Board Examination II</strong>', 'Internal Mock', '33%', 'Class X & XII', '<span class="badge bg-light text-dark border">Board Replica</span>', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-danger">ANN-01</span>', '<strong>Annual Board Examination</strong>', '80% (Theory)', '33%', 'Class X & XII (CBSE)', '<span class="badge bg-light text-dark border">CBSE AISSE/AISSCE</span>', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-info">PRAC-01</span>', '<strong>Practical & Lab Viva</strong>', '30 Marks (Science)', '33%', 'Class XI & XII', '<span class="badge bg-light text-dark border">External Examiner</span>', '<span class="badge bg-success-subtle text-success border">Active</span>']
    ]
  },
  {
    filename: 'exam-groups.php',
    title: 'Exam Groups',
    desc: 'Grouping examinations across terms, streams, and school wings for unified result aggregation',
    icon: 'bi-collection-fill',
    actionBtnText: 'Create Exam Group',
    kpi1Label: 'Active Groups', kpi1Value: '6 Groups', kpi1Sub: 'Session 2026-27', kpi1Icon: 'bi-folder',
    kpi2Label: 'Wings Covered', kpi2Value: 'Primary to Sr Sec', kpi2Sub: 'All 4 Wings', kpi2Icon: 'bi-diagram-3',
    kpi3Label: 'Aggregation Formula', kpi3Value: 'CCE + Annual', kpi3Sub: 'Best of PA + Term', kpi3Icon: 'bi-calculator',
    kpi4Label: 'Published Groups', kpi4Value: '2 Groups', kpi4Sub: 'Term 1 Complete', kpi4Icon: 'bi-check2-all',
    columns: ['Group Code', 'Exam Group Title', 'Associated Terms', 'Classes Enrolled', 'Total Students', 'Aggregation Rule', 'Status'],
    rows: [
      ['<span class="badge bg-dark">GRP-BRD-X</span>', '<strong>Class X Board Preparation Group</strong>', 'PA1 + PA2 + PB1 + PB2', 'Class X (A, B, C)', '124 Students', 'Best 2 PAs (5m) + Port (5m) + SE (5m)', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-dark">GRP-BRD-XII</span>', '<strong>Class XII Board Preparation Group</strong>', 'Mid-Term + PB1 + PB2', 'Class XII (Sci, Comm, Hum)', '134 Students', 'Board 70:30 Theory/Prac', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-dark">GRP-MID-01</span>', '<strong>Middle Wing Annual Series</strong>', 'Term 1 + Term 2', 'Class VI, VII, VIII', '380 Students', '50% Term 1 + 50% Term 2', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-dark">GRP-PRI-01</span>', '<strong>Primary Wing CCE Progression</strong>', 'Evaluation 1, 2, 3', 'Class I - V', '520 Students', 'Continuous Holistic 360', '<span class="badge bg-success-subtle text-success border">Active</span>']
    ]
  },
  {
    filename: 'exam-schedules.php',
    title: 'Exam Schedules',
    desc: 'Master examination datesheet configuration with shifts, subject mappings, and embargo rules',
    icon: 'bi-calendar-range-fill',
    actionBtnText: 'Add Exam Schedule',
    actionBtnIcon: 'bi-calendar-plus',
    kpi1Label: 'Scheduled Papers', kpi1Value: '68 Papers', kpi1Sub: 'Pre-Board & Term 2', kpi1Icon: 'bi-calendar3',
    kpi2Label: 'Exam Window', kpi2Value: '15 Nov - 02 Dec', kpi2Sub: '18 Working Days', kpi2Icon: 'bi-clock',
    kpi3Label: 'Shifts Configured', kpi3Value: 'Morning & Noon', kpi3Sub: '09:30 AM & 01:30 PM', kpi3Icon: 'bi-alarm',
    kpi4Label: 'Confidentiality', kpi4Value: 'Embargo Locked', kpi4Sub: 'Dual-Key Protocol', kpi4Icon: 'bi-shield-lock',
    columns: ['Schedule Code', 'Exam Title', 'Class & Stream', 'Subject & Code', 'Exam Date', 'Shift Timing', 'Duration', 'Status'],
    rows: [
      ['<span class="badge bg-secondary">SCH-101</span>', 'Pre-Board II', 'Class X - All', 'Mathematics Standard (041)', '28-Oct-2026', '09:30 AM - 12:30 PM', '3 Hours', '<span class="badge bg-primary">Today</span>'],
      ['<span class="badge bg-secondary">SCH-102</span>', 'Pre-Board II', 'Class XII - Science', 'Physics Theory (042)', '28-Oct-2026', '09:30 AM - 12:30 PM', '3 Hours', '<span class="badge bg-primary">Today</span>'],
      ['<span class="badge bg-secondary">SCH-103</span>', 'Pre-Board II', 'Class XII - Commerce', 'Accountancy (055)', '28-Oct-2026', '09:30 AM - 12:30 PM', '3 Hours', '<span class="badge bg-primary">Today</span>'],
      ['<span class="badge bg-secondary">SCH-104</span>', 'Pre-Board II', 'Class X - All', 'Science Theory (086)', '31-Oct-2026', '09:30 AM - 12:30 PM', '3 Hours', '<span class="badge bg-warning-subtle text-warning border">Upcoming</span>'],
      ['<span class="badge bg-secondary">SCH-105</span>', 'Pre-Board II', 'Class XII - Science', 'Chemistry (043)', '02-Nov-2026', '09:30 AM - 12:30 PM', '3 Hours', '<span class="badge bg-warning-subtle text-warning border">Upcoming</span>'],
      ['<span class="badge bg-secondary">SCH-106</span>', 'Pre-Board II', 'Class XII - All', 'English Core (301)', '04-Nov-2026', '09:30 AM - 12:30 PM', '3 Hours', '<span class="badge bg-warning-subtle text-warning border">Upcoming</span>']
    ]
  },
  {
    filename: 'exam-timetables.php',
    title: 'Exam Timetables',
    desc: 'Student and teacher datesheet publisher with printable PDF views and hall guidelines',
    icon: 'bi-table',
    isReportPage: true,
    kpi1Label: 'Active Datesheets', kpi1Value: '12 Published', kpi1Sub: 'All Classes', kpi1Icon: 'bi-table',
    kpi2Label: 'Student Downloads', kpi2Value: '1,385 Views', kpi2Sub: 'Parent Portal Synced', kpi2Icon: 'bi-cloud-download',
    kpi3Label: 'Prep Gaps', kpi3Value: '1-2 Days Avg', kpi3Sub: 'Adequate Study Leave', kpi3Icon: 'bi-hourglass-bottom',
    kpi4Label: 'Conflict Checks', kpi4Value: '0 Clashes', kpi4Sub: 'Verified Validated', kpi4Icon: 'bi-check-all',
    columns: ['Class & Wing', 'Examination Series', 'Start Date', 'End Date', 'Total Papers', 'Preparatory Leaves', 'Publish Status'],
    rows: [
      ['<strong>Class X (Secondary)</strong>', 'Pre-Board Examination II', '28-Oct-2026', '06-Nov-2026', '6 Subjects', '2 Days Study Gap', '<span class="badge bg-success-subtle text-success border">Published to App</span>'],
      ['<strong>Class XII (Science)</strong>', 'Pre-Board Examination II', '28-Oct-2026', '08-Nov-2026', '5 Subjects', '3 Days Study Gap', '<span class="badge bg-success-subtle text-success border">Published to App</span>'],
      ['<strong>Class XII (Commerce)</strong>', 'Pre-Board Examination II', '28-Oct-2026', '08-Nov-2026', '5 Subjects', '2 Days Study Gap', '<span class="badge bg-success-subtle text-success border">Published to App</span>'],
      ['<strong>Class IX (Secondary)</strong>', 'Term 2 Periodic Assessments', '03-Nov-2026', '11-Nov-2026', '6 Subjects', '1 Day Study Gap', '<span class="badge bg-success-subtle text-success border">Published to App</span>'],
      ['<strong>Class XI (All Streams)</strong>', 'Mid-Session Exam Series', '03-Nov-2026', '12-Nov-2026', '5 Subjects', '2 Days Study Gap', '<span class="badge bg-success-subtle text-success border">Published to App</span>']
    ]
  },
  {
    filename: 'exam-rooms.php',
    title: 'Exam Rooms & Halls',
    desc: 'Hall allocation, desk capacity, CCTV surveillance readiness, and invigilator assignment',
    icon: 'bi-building-check',
    actionBtnText: 'Add Exam Hall',
    kpi1Label: 'Available Halls', kpi1Value: '18 Rooms', kpi1Sub: 'Auditorium + Labs', kpi1Icon: 'bi-door-open',
    kpi2Label: 'Total Seating', kpi2Value: '1,550 Desks', kpi2Sub: '1.5m Social Distance', kpi2Icon: 'bi-grid-3x3',
    kpi3Label: 'CCTV Coverage', kpi3Value: '100% Monitored', kpi3Sub: 'Dual Angle Streaming', kpi3Icon: 'bi-camera-video',
    kpi4Label: 'Chief Invigilators', kpi4Value: '24 Assigned', kpi4Sub: 'Senior Faculty', kpi4Icon: 'bi-person-badge',
    columns: ['Hall ID', 'Hall / Room Name', 'Block / Wing', 'Single Desk Capacity', 'Row x Column', 'CCTV Camera ID', 'Assigned In-charge', 'Status'],
    rows: [
      ['<span class="badge bg-secondary">HL-01</span>', '<strong>Central Auditorium</strong>', 'Main Administrative Block', '160 Desks', '16 Rows x 10 Cols', 'CAM-AUD-01 & 02', 'Dr. Sunita Deshmukh', '<span class="badge bg-success-subtle text-success border">Ready & Sanitized</span>'],
      ['<span class="badge bg-secondary">HL-02</span>', '<strong>Senior Library Hall</strong>', 'Academic Wing A - Fl 1', '100 Desks', '10 Rows x 10 Cols', 'CAM-LIB-01', 'Prof. Rajesh Malhotra', '<span class="badge bg-success-subtle text-success border">Ready & Sanitized</span>'],
      ['<span class="badge bg-secondary">RM-201</span>', '<strong>Classroom 201</strong>', 'Secondary Wing B - Fl 2', '36 Desks', '6 Rows x 6 Cols', 'CAM-201-HD', 'Mr. Amitav Sen', '<span class="badge bg-success-subtle text-success border">Ready & Sanitized</span>'],
      ['<span class="badge bg-secondary">RM-202</span>', '<strong>Classroom 202</strong>', 'Secondary Wing B - Fl 2', '36 Desks', '6 Rows x 6 Cols', 'CAM-202-HD', 'Mrs. Rekha Iyer', '<span class="badge bg-success-subtle text-success border">Ready & Sanitized</span>'],
      ['<span class="badge bg-secondary">LAB-01</span>', '<strong>Computer Center 1</strong>', 'IT Block - Gr Floor', '75 Terminals', '5 Rows x 15 Cols', 'CAM-IT-01', 'Mr. Vikram Rathore', '<span class="badge bg-success-subtle text-success border">Online CBT Ready</span>']
    ]
  },
  {
    filename: 'seating-plans.php',
    title: 'Seating Plans',
    desc: 'Automated zig-zag student roll allocation across classes to prevent examination malpractice',
    icon: 'bi-diagram-3-fill',
    actionBtnText: 'Generate Seating Matrix',
    actionBtnIcon: 'bi-grid-fill',
    isToolPage: true,
    toolModalId: 'generateSeatingModal',
    kpi1Label: 'Seating Matrices', kpi1Value: '18 Halls Mapped', kpi1Sub: 'All Rooms Generated', kpi1Icon: 'bi-grid-3x3',
    kpi2Label: 'Zig-Zag Layout', kpi2Value: 'Alternating', kpi2Sub: 'Class X next to Class XII', kpi2Icon: 'bi-shuffle',
    kpi3Label: 'Candidates Mapped', kpi3Value: '1,420 Students', kpi3Sub: 'Zero Seat Clashes', kpi3Icon: 'bi-people',
    kpi4Label: 'Door Charts Printed', kpi4Value: '18 Ready', kpi4Sub: 'Pasted on Doors', kpi4Icon: 'bi-file-earmark-text',
    columns: ['Plan Code', 'Examination Hall', 'Session / Date', 'Class Combinations', 'Allocated Desks', 'Algorithm Pattern', 'Door Chart'],
    rows: [
      ['<span class="badge bg-primary">ST-AUD-10</span>', 'Central Auditorium', '28-Oct-2026 (Morning)', 'Class X (Maths) + Class XII (Physics)', '124 / 160 Desks', 'Alternate Column (X-XII-X-XII)', '<span class="badge bg-success-subtle text-success border"><i class="bi bi-printer me-1"></i>Printed</span>'],
      ['<span class="badge bg-primary">ST-LIB-12</span>', 'Senior Library Hall', '28-Oct-2026 (Morning)', 'Class XII (Acc) + Class IX (IT)', '86 / 100 Desks', 'Alternate Desk (XII-IX-XII-IX)', '<span class="badge bg-success-subtle text-success border"><i class="bi bi-printer me-1"></i>Printed</span>'],
      ['<span class="badge bg-primary">ST-201-09</span>', 'Classroom 201', '28-Oct-2026 (Morning)', 'Class IX (Sec A & B)', '36 / 36 Desks', 'Roll-wise Sequential Alternate', '<span class="badge bg-success-subtle text-success border"><i class="bi bi-printer me-1"></i>Printed</span>'],
      ['<span class="badge bg-primary">ST-202-09</span>', 'Classroom 202', '28-Oct-2026 (Morning)', 'Class IX (Sec C & D)', '36 / 36 Desks', 'Roll-wise Sequential Alternate', '<span class="badge bg-success-subtle text-success border"><i class="bi bi-printer me-1"></i>Printed</span>']
    ]
  },
  {
    filename: 'admit-cards.php',
    title: 'Admit Cards (Hall Tickets)',
    desc: 'Generate, sign, and distribute CBSE Board and School hall tickets with barcodes & rules',
    icon: 'bi-person-badge-fill',
    actionBtnText: 'Bulk Generate Admit Cards',
    actionBtnIcon: 'bi-file-earmark-person',
    isToolPage: true,
    toolModalId: 'bulkAdmitModal',
    kpi1Label: 'Generated Cards', kpi1Value: '1,420 Cards', kpi1Sub: 'All Classes', kpi1Icon: 'bi-card-heading',
    kpi2Label: 'Attendance Cleared', kpi2Value: '1,396 (>75%)', kpi2Sub: '24 Condonation cases', kpi2Icon: 'bi-check-circle',
    kpi3Label: 'Fee Cleared Status', kpi3Value: '100% No-Dues', kpi3Sub: 'Accounts Verified', kpi3Icon: 'bi-cash-coin',
    kpi4Label: 'Barcode / QR', kpi4Value: 'Encrypted', kpi4Sub: 'Tamper-Proof Verify', kpi4Icon: 'bi-qr-code',
    columns: ['Roll Number', 'Student Name', 'Class & Sec', 'Admission No', 'Exam Center Code', 'Fee & Attn Clearance', 'Digital Admit Card'],
    rows: [
      ['<span class="badge bg-dark">10145201</span>', '<strong>Aarav Sharma</strong>', 'Class X-A', 'ADM-2021-0412', 'Center 814022 (DPGA Campus)', '<span class="badge bg-success">Clear (88.4%)</span>', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-download me-1"></i>PDF</button>'],
      ['<span class="badge bg-dark">10145202</span>', '<strong>Ananya Verma</strong>', 'Class X-A', 'ADM-2021-0419', 'Center 814022 (DPGA Campus)', '<span class="badge bg-success">Clear (94.2%)</span>', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-download me-1"></i>PDF</button>'],
      ['<span class="badge bg-dark">10145203</span>', '<strong>Rohan Patel</strong>', 'Class X-B', 'ADM-2021-0435', 'Center 814022 (DPGA Campus)', '<span class="badge bg-success">Clear (82.1%)</span>', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-download me-1"></i>PDF</button>'],
      ['<span class="badge bg-dark">12188401</span>', '<strong>Diya Mukherjee</strong>', 'Class XII-Sci', 'ADM-2019-0118', 'Center 814022 (DPGA Campus)', '<span class="badge bg-success">Clear (91.5%)</span>', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-download me-1"></i>PDF</button>'],
      ['<span class="badge bg-dark">12188402</span>', '<strong>Ishaan Joshi</strong>', 'Class XII-Comm', 'ADM-2019-0142', 'Center 814022 (DPGA Campus)', '<span class="badge bg-success">Clear (86.0%)</span>', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-download me-1"></i>PDF</button>']
    ]
  },
  {
    filename: 'question-bank.php',
    title: 'Question Bank',
    desc: 'Bloom Taxonomy classified question repository with marks, difficulty ratings, and NEP competency tags',
    icon: 'bi-journal-bookmark-fill',
    actionBtnText: 'Add New Question',
    actionBtnIcon: 'bi-plus-circle',
    kpi1Label: 'Total Questions', kpi1Value: '14,850 Qs', kpi1Sub: 'All Subjects (I-XII)', kpi1Icon: 'bi-question-diamond',
    kpi2Label: 'Bloom Level Mapped', kpi2Value: '100% Tagged', kpi2Sub: 'Remember to Evaluate', kpi2Icon: 'bi-diagram-3',
    kpi3Label: 'Case-Based / MCQ', kpi3Value: '4,200 Qs', kpi3Sub: 'CBSE Competency 50%', kpi3Icon: 'bi-ui-radios',
    kpi4Label: 'Peer Reviewed', kpi4Value: '96.4%', kpi4Sub: 'HOD Approved', kpi4Icon: 'bi-check-all',
    columns: ['Q-ID', 'Subject & Grade', 'Chapter / Topic', 'Question Type', 'Bloom Taxonomy Level', 'Marks', 'Difficulty', 'Status'],
    rows: [
      ['<span class="badge bg-secondary">Q-MAT-1001</span>', 'Maths (Class X)', 'Real Numbers (Ch 1)', 'Assertion-Reasoning', 'Understanding', '1 Mark', '<span class="badge bg-success">Easy</span>', '<span class="badge bg-success-subtle text-success border">HOD Approved</span>'],
      ['<span class="badge bg-secondary">Q-MAT-1045</span>', 'Maths (Class X)', 'Quadratic Equations (Ch 4)', 'Short Answer (SA-II)', 'Application', '3 Marks', '<span class="badge bg-warning text-dark">Medium</span>', '<span class="badge bg-success-subtle text-success border">HOD Approved</span>'],
      ['<span class="badge bg-secondary">Q-PHY-1208</span>', 'Physics (Class XII)', 'Electrostatics (Ch 1)', 'Case-Based Study', 'Analyzing / Critical', '4 Marks', '<span class="badge bg-danger">Hard</span>', '<span class="badge bg-success-subtle text-success border">HOD Approved</span>'],
      ['<span class="badge bg-secondary">Q-SCI-0912</span>', 'Science (Class IX)', 'Matter in Our Surroundings', 'MCQ with 4 Choices', 'Remembering', '1 Mark', '<span class="badge bg-success">Easy</span>', '<span class="badge bg-success-subtle text-success border">HOD Approved</span>']
    ]
  },
  {
    filename: 'question-papers.php',
    title: 'Question Papers',
    desc: 'Automated & manual test paper generator adhering to CBSE blueprint with answer keys and rubrics',
    icon: 'bi-file-earmark-ruled-fill',
    actionBtnText: 'Generate Blueprint Paper',
    actionBtnIcon: 'bi-file-earmark-plus',
    kpi1Label: 'Generated Papers', kpi1Value: '48 Papers', kpi1Sub: 'Set A, Set B, Set C', kpi1Icon: 'bi-files',
    kpi2Label: 'Blueprint Adherence', kpi2Value: '100% Match', kpi2Sub: 'Strict Marks Split', kpi2Icon: 'bi-check2-circle',
    kpi3Label: 'Answer Key Rubric', kpi3Value: 'Auto-Attached', kpi3Sub: 'Step Marking Schema', kpi3Icon: 'bi-card-checklist',
    kpi4Label: 'Vault Status', kpi4Value: 'AES-256 Encrypted', kpi4Sub: 'Print On-Demand', kpi4Icon: 'bi-lock-fill',
    columns: ['Paper Code', 'Subject & Class', 'Exam Cycle', 'Total Marks', 'Sets Generated', 'Blueprint Validation', 'Answer Key', 'Print Vault'],
    rows: [
      ['<span class="badge bg-primary">QP-MAT10-26</span>', 'Mathematics Std (Class X)', 'Pre-Board II', '80 Marks', '3 Sets (A, B, C)', '<span class="badge bg-success">Valid (CBSE Blueprint)</span>', '<span class="badge bg-info text-dark">Complete Rubric</span>', '<button class="btn btn-xs btn-outline-danger"><i class="bi bi-printer me-1"></i>Print Vault</button>'],
      ['<span class="badge bg-primary">QP-PHY12-26</span>', 'Physics Theory (Class XII)', 'Pre-Board II', '70 Marks', '3 Sets (A, B, C)', '<span class="badge bg-success">Valid (CBSE Blueprint)</span>', '<span class="badge bg-info text-dark">Complete Rubric</span>', '<button class="btn btn-xs btn-outline-danger"><i class="bi bi-printer me-1"></i>Print Vault</button>'],
      ['<span class="badge bg-primary">QP-ACC12-26</span>', 'Accountancy (Class XII)', 'Pre-Board II', '80 Marks', '2 Sets (A, B)', '<span class="badge bg-success">Valid (CBSE Blueprint)</span>', '<span class="badge bg-info text-dark">Complete Rubric</span>', '<button class="btn btn-xs btn-outline-danger"><i class="bi bi-printer me-1"></i>Print Vault</button>'],
      ['<span class="badge bg-primary">QP-ENG10-26</span>', 'English Lang & Lit (Class X)', 'Pre-Board II', '80 Marks', '3 Sets (A, B, C)', '<span class="badge bg-success">Valid (CBSE Blueprint)</span>', '<span class="badge bg-info text-dark">Complete Rubric</span>', '<button class="btn btn-xs btn-outline-danger"><i class="bi bi-printer me-1"></i>Print Vault</button>']
    ]
  },
  {
    filename: 'online-exams.php',
    title: 'Online Examinations (CBT)',
    desc: 'Computer Based Test console with AI proctoring, timer countdown, and auto-submission algorithms',
    icon: 'bi-laptop-fill',
    actionBtnText: 'Create CBT Session',
    actionBtnIcon: 'bi-plus-circle',
    kpi1Label: 'Active CBT Sessions', kpi1Value: '2 Live Tests', kpi1Sub: 'Computer Lab 1 & 2', kpi1Icon: 'bi-broadcast',
    kpi2Label: 'Connected Clients', kpi2Value: '148 Students', kpi2Sub: 'No Network Drops', kpi2Icon: 'bi-hdd-network',
    kpi3Label: 'Auto-Grading', kpi3Value: 'Instant Marks', kpi3Sub: 'Objective Sections', kpi3Icon: 'bi-speedometer2',
    kpi4Label: 'AI Anti-Cheating', kpi4Value: '0 Tab Switches', kpi4Sub: 'Webcam Lockdown', kpi4Icon: 'bi-shield-check',
    columns: ['Session ID', 'Test Title', 'Class & Subject', 'Duration', 'Connected Candidates', 'Average Progress', 'Proctor Status', 'Actions'],
    rows: [
      ['<span class="badge bg-danger">CBT-101</span>', '<strong>IT Skill Assessment 402</strong>', 'Class IX (Sec A & B)', '60 Mins', '72 / 72 Active', '<div class="progress" style="height:6px;width:80px;"><div class="progress-bar bg-success" style="width:75%"></div></div>', '<span class="badge bg-success"><i class="bi bi-camera-video me-1"></i>Normal</span>', '<button class="btn btn-xs btn-outline-primary">Monitor</button>'],
      ['<span class="badge bg-secondary">CBT-102</span>', '<strong>Computer Science Python Lab</strong>', 'Class XI - Science', '90 Mins', '36 Scheduled', 'Pending Launch', '<span class="badge bg-light text-dark border">Scheduled 02:00 PM</span>', '<button class="btn btn-xs btn-primary">Start Test</button>']
    ]
  },
  {
    filename: 'omr-evaluation.php',
    title: 'OMR Evaluation Sheet Scanner',
    desc: 'High-speed camera and optical scanner parser for bubble sheets with automatic discrepancy flags',
    icon: 'bi-qr-code-scan',
    actionBtnText: 'Upload Scanned OMR Batch',
    actionBtnIcon: 'bi-upload',
    isToolPage: true,
    toolModalId: 'uploadOMRModal',
    kpi1Label: 'Sheets Processed', kpi1Value: '1,240 Sheets', kpi1Sub: 'Today\'s Morning Batch', kpi1Icon: 'bi-file-earmark-check',
    kpi2Label: 'Scan Accuracy', kpi2Value: '99.94%', kpi2Sub: 'Dual-Pass Optical', kpi2Icon: 'bi-bullseye',
    kpi3Label: 'Flagged Ambiguity', kpi3Value: '8 Double Bubbles', kpi3Sub: 'Manual Review Queue', kpi3Icon: 'bi-exclamation-triangle',
    kpi4Label: 'Evaluation Speed', kpi4Value: '180 sheets/min', kpi4Sub: 'High-Throughput', kpi4Icon: 'bi-lightning-charge',
    columns: ['Batch No', 'Exam Name', 'Class / Subject', 'Scanned Qty', 'Successful', 'Ambiguous Flag', 'Score Range', 'Verification'],
    rows: [
      ['<span class="badge bg-dark">OMR-BATCH-01</span>', 'Periodic Assessment 2', 'Class X (Mathematics)', '124 Sheets', '122 Parsed', '<span class="badge bg-warning text-dark">2 Flags</span>', '28 - 79 / 80', '<span class="badge bg-success-subtle text-success border">Audited</span>'],
      ['<span class="badge bg-dark">OMR-BATCH-02</span>', 'Periodic Assessment 2', 'Class X (Science)', '124 Sheets', '121 Parsed', '<span class="badge bg-warning text-dark">3 Flags</span>', '31 - 78 / 80', '<span class="badge bg-success-subtle text-success border">Audited</span>'],
      ['<span class="badge bg-dark">OMR-BATCH-03</span>', 'Term 1 Objective Series', 'Class IX (Social Studies)', '140 Sheets', '139 Parsed', '<span class="badge bg-warning text-dark">1 Flag</span>', '24 - 76 / 80', '<span class="badge bg-success-subtle text-success border">Audited</span>']
    ]
  },
  {
    filename: 'marks-entry.php',
    title: 'Marks Entry Register',
    desc: 'Teacher scoring portal with subject-wise candidate lists, validation limits, and auto-grade calculation',
    icon: 'bi-pencil-square',
    actionBtnText: 'Open Marks Entry Sheet',
    actionBtnIcon: 'bi-pencil',
    kpi1Label: 'Marks Uploaded', kpi1Value: '52 / 60 Papers', kpi1Sub: '86.6% Completed', kpi1Icon: 'bi-check2-circle',
    kpi2Label: 'Pending Teachers', kpi2Value: '8 Submissions', kpi2Sub: 'Deadline Today 5 PM', kpi2Icon: 'bi-hourglass-split',
    kpi3Label: 'Lock & Freeze', kpi3Value: '44 Locked', kpi3Sub: 'HOD Verified', kpi3Icon: 'bi-lock',
    kpi4Label: 'Audit Trail', kpi4Value: '100% Tracked', kpi4Sub: 'Timestamp & User ID', kpi4Icon: 'bi-shield-check',
    columns: ['Class & Sec', 'Subject & Code', 'Assigned Evaluator', 'Exam Max Marks', 'Submitted Count', 'Completion %', 'Lock Status', 'Action'],
    rows: [
      ['<strong>Class X-A</strong>', 'Mathematics Std (041)', 'Mr. Rajesh Verma', '80 Marks', '42 / 42 Students', '<span class="badge bg-success">100% Complete</span>', '<span class="badge bg-danger"><i class="bi bi-lock-fill me-1"></i>Locked</span>', '<button class="btn btn-xs btn-outline-secondary">View Register</button>'],
      ['<strong>Class X-B</strong>', 'Mathematics Std (041)', 'Mrs. Priya Nair', '80 Marks', '41 / 41 Students', '<span class="badge bg-success">100% Complete</span>', '<span class="badge bg-danger"><i class="bi bi-lock-fill me-1"></i>Locked</span>', '<button class="btn btn-xs btn-outline-secondary">View Register</button>'],
      ['<strong>Class XII-Sci</strong>', 'Physics Theory (042)', 'Dr. Vikramaditya Rao', '70 Marks', '44 / 44 Students', '<span class="badge bg-success">100% Complete</span>', '<span class="badge bg-warning text-dark"><i class="bi bi-unlock me-1"></i>Pending HOD</span>', '<button class="btn btn-xs btn-primary">Verify & Lock</button>'],
      ['<strong>Class XII-Comm</strong>', 'Accountancy (055)', 'Mrs. Neha Kulkarni', '80 Marks', '38 / 46 Students', '<span class="badge bg-warning text-dark">82% In-Progress</span>', '<span class="badge bg-light text-dark border">Open</span>', '<button class="btn btn-xs btn-outline-primary">Continue Entry</button>']
    ]
  },
  {
    filename: 'bulk-marks-import.php',
    title: 'Bulk Marks Import (Excel)',
    desc: 'Import classroom score sheets from formatted Excel/CSV files with pre-validation error checking',
    icon: 'bi-file-earmark-spreadsheet-fill',
    actionBtnText: 'Import Score Spreadsheet',
    actionBtnIcon: 'bi-file-earmark-arrow-up',
    isToolPage: true,
    toolModalId: 'bulkImportModal',
    kpi1Label: 'Spreadsheet Imports', kpi1Value: '34 Uploaded', kpi1Sub: 'This Cycle', kpi1Icon: 'bi-file-spreadsheet',
    kpi2Label: 'Row Validation', kpi2Value: 'Zero Schema Errors', kpi2Sub: 'Strict Data Type', kpi2Icon: 'bi-check-circle',
    kpi3Label: 'Range Check', kpi3Value: '0 - Max Marks', kpi3Sub: 'Out-of-range flagged', kpi3Icon: 'bi-bounding-box',
    kpi4Label: 'Templates', kpi4Value: 'Pre-filled CSV', kpi4Sub: 'Roll Nos Included', kpi4Icon: 'bi-download',
    columns: ['Import ID', 'File Name', 'Target Class & Subject', 'Imported By', 'Total Records', 'Success Rate', 'Upload Timestamp', 'Audit Log'],
    rows: [
      ['<span class="badge bg-secondary">IMP-108</span>', 'ClassX_Maths_PA2.xlsx', 'Class X (Maths Std)', 'Mr. Rajesh Verma', '124 Rows', '<span class="badge bg-success">100% Success</span>', '27-Oct-2026 14:32', '<button class="btn btn-xs btn-light border"><i class="bi bi-eye"></i></button>'],
      ['<span class="badge bg-secondary">IMP-109</span>', 'ClassXII_Physics_PB1.xlsx', 'Class XII (Physics)', 'Dr. Vikramaditya Rao', '88 Rows', '<span class="badge bg-success">100% Success</span>', '27-Oct-2026 16:10', '<button class="btn btn-xs btn-light border"><i class="bi bi-eye"></i></button>'],
      ['<span class="badge bg-secondary">IMP-110</span>', 'ClassIX_Science_Term2.xlsx', 'Class IX (Science)', 'Mrs. Anita Menon', '140 Rows', '<span class="badge bg-success">100% Success</span>', '28-Oct-2026 09:15', '<button class="btn btn-xs btn-light border"><i class="bi bi-eye"></i></button>']
    ]
  },
  {
    filename: 'theory-practical-marks.php',
    title: 'Theory & Practical Marks',
    desc: 'Segregated marks entry for Senior Secondary subjects requiring external practical board examiners',
    icon: 'bi-flask-fill',
    actionBtnText: 'Record Lab & Viva Marks',
    actionBtnIcon: 'bi-flask',
    kpi1Label: 'Practical Subjects', kpi1Value: '12 Subjects', kpi1Sub: 'Physics, Chem, Bio, CS', kpi1Icon: 'bi-mortarboard',
    kpi2Label: 'Split Ratio', kpi2Value: '70 Theory : 30 Lab', kpi2Sub: 'CBSE Senior Sec', kpi2Icon: 'bi-pie-chart',
    kpi3Label: 'External Observers', kpi3Value: '8 CBSE Appointed', kpi3Sub: 'External Sign-off', kpi3Icon: 'bi-person-check',
    kpi4Label: 'Viva Portfolios', kpi4Value: '100% Submitted', kpi4Sub: 'Signed Lab Journals', kpi4Icon: 'bi-journal-check',
    columns: ['Roll Number', 'Student Name', 'Subject & Stream', 'Theory (70m)', 'Lab Practical (15m)', 'Viva Voce (5m)', 'Lab Project (10m)', 'Total (100m)', 'Grade'],
    rows: [
      ['<span class="badge bg-dark">12188401</span>', '<strong>Diya Mukherjee</strong>', 'Physics (Class XII-A)', '64 / 70', '15 / 15', '5 / 5', '10 / 10', '<strong>94 / 100</strong>', '<span class="badge bg-success">A1</span>'],
      ['<span class="badge bg-dark">12188402</span>', '<strong>Rohan Singhal</strong>', 'Physics (Class XII-A)', '58 / 70', '14 / 15', '5 / 5', '9 / 10', '<strong>86 / 100</strong>', '<span class="badge bg-primary">A2</span>'],
      ['<span class="badge bg-dark">12188403</span>', '<strong>Meera Swaminathan</strong>', 'Chemistry (Class XII-A)', '66 / 70', '15 / 15', '5 / 5', '10 / 10', '<strong>96 / 100</strong>', '<span class="badge bg-success">A1</span>'],
      ['<span class="badge bg-dark">12188404</span>', '<strong>Kartik Iyer</strong>', 'Biology (Class XII-B)', '61 / 70', '14 / 15', '4 / 5', '10 / 10', '<strong>89 / 100</strong>', '<span class="badge bg-primary">A2</span>']
    ]
  },
  {
    filename: 'internal-assessment.php',
    title: 'Internal Assessment (CCE 20%)',
    desc: 'Computation of 20 marks internal assessment split into Periodic Tests, Multiple Assessment, Portfolio & Lab',
    icon: 'bi-calculator-fill',
    actionBtnText: 'Compute 20% CCE Matrix',
    actionBtnIcon: 'bi-calculator',
    isToolPage: true,
    toolModalId: 'computeCCEModal',
    kpi1Label: 'CCE Weightage', kpi1Value: '20 Marks', kpi1Sub: 'Mandatory CBSE Scheme', kpi1Icon: 'bi-percent',
    kpi2Label: 'Components', kpi2Value: '4 Elements (5m each)', kpi2Sub: 'PT + MA + Port + SE', kpi2Icon: 'bi-grid-fill',
    kpi3Label: 'Periodic Test Scaling', kpi3Value: 'Best 2 of 3', kpi3Sub: 'Scaled down to 5 Marks', kpi3Icon: 'bi-sliders',
    kpi4Label: 'Submission Ready', kpi4Value: 'Class X (100%)', kpi4Sub: 'Ready for CBSE Portal', kpi4Icon: 'bi-cloud-upload',
    columns: ['Roll Number', 'Student Name', 'Subject', 'Pen-Paper Test (5m)', 'Multiple Assess (5m)', 'Portfolio (5m)', 'Subject Enrich (5m)', 'Total Internal (20m)', 'Status'],
    rows: [
      ['<span class="badge bg-dark">10145201</span>', '<strong>Aarav Sharma</strong>', 'Mathematics Std', '4.8 / 5', '5.0 / 5', '4.7 / 5', '5.0 / 5', '<strong class="text-success">19.5 / 20</strong>', '<span class="badge bg-success-subtle text-success border">Locked & Verified</span>'],
      ['<span class="badge bg-dark">10145202</span>', '<strong>Ananya Verma</strong>', 'Mathematics Std', '5.0 / 5', '5.0 / 5', '5.0 / 5', '5.0 / 5', '<strong class="text-success">20.0 / 20</strong>', '<span class="badge bg-success-subtle text-success border">Locked & Verified</span>'],
      ['<span class="badge bg-dark">10145203</span>', '<strong>Rohan Patel</strong>', 'Mathematics Std', '4.2 / 5', '4.5 / 5', '4.0 / 5', '4.5 / 5', '<strong class="text-success">17.2 / 20</strong>', '<span class="badge bg-success-subtle text-success border">Locked & Verified</span>'],
      ['<span class="badge bg-dark">10145204</span>', '<strong>Sneha Kapoor</strong>', 'Science', '4.5 / 5', '4.8 / 5', '4.5 / 5', '4.8 / 5', '<strong class="text-success">18.6 / 20</strong>', '<span class="badge bg-success-subtle text-success border">Locked & Verified</span>']
    ]
  },
  {
    filename: 'projects-viva-marks.php',
    title: 'Projects & Viva Marks',
    desc: 'Project evaluation rubrics, art integration projects (NEP 2020), and interdisciplinary vivas',
    icon: 'bi-easel-fill',
    actionBtnText: 'Record Project Score',
    kpi1Label: 'Art Integration', kpi1Value: '100% Paired', kpi1Sub: 'Ek Bharat Shreshtha', kpi1Icon: 'bi-palette',
    kpi2Label: 'Rubric Criteria', kpi2Value: '4 Dimensions', kpi2Sub: 'Creativity, Content, Viva', kpi2Icon: 'bi-list-check',
    kpi3Label: 'Average Score', kpi3Value: '18.4 / 20', kpi3Sub: 'High Standard', kpi3Icon: 'bi-bar-chart-line',
    kpi4Label: 'External Sign-off', kpi4Value: 'Complete', kpi4Sub: 'Uploaded to CBSE', kpi4Icon: 'bi-check2-all',
    columns: ['Project Code', 'Student / Group', 'Class & Sec', 'Topic & Art Form', 'Evaluator', 'Viva Score', 'Report Score', 'Total / 20'],
    rows: [
      ['<span class="badge bg-primary">PRJ-SOC-01</span>', 'Aarav Sharma & Team', 'Class X-A', 'Sustainable Development Goals in Arunachal', 'Mrs. Rashmi Roy', '9.5 / 10', '10 / 10', '<strong class="text-success">19.5</strong>'],
      ['<span class="badge bg-primary">PRJ-SCI-04</span>', 'Diya Mukherjee', 'Class XII-Sci', 'Electromagnetic Induction in Wind Turbines', 'Dr. Vikramaditya Rao', '10 / 10', '10 / 10', '<strong class="text-success">20.0</strong>'],
      ['<span class="badge bg-primary">PRJ-COM-02</span>', 'Ishaan Joshi & Team', 'Class XII-Comm', 'Stock Market Volatility Post-Budget 2026', 'Mrs. Neha Kulkarni', '9.0 / 10', '9.5 / 10', '<strong class="text-success">18.5</strong>']
    ]
  },
  {
    filename: 'grade-configuration.php',
    title: 'Grade Configuration',
    desc: 'Define grading scales, cutoff thresholds, grade point averages (GPA), and descriptive remark templates',
    icon: 'bi-sliders2',
    actionBtnText: 'Add Grade Range',
    kpi1Label: 'Grading Scales', kpi1Value: '3 Active Scales', kpi1Sub: 'CBSE 9-Pt, 5-Pt & CCE', kpi1Icon: 'bi-sliders',
    kpi2Label: 'Passing Threshold', kpi2Value: '33% Minimum', kpi2Sub: 'Theory & Practical Separately', kpi2Icon: 'bi-shield-check',
    kpi3Label: 'Top Tier (A1)', kpi3Value: 'Top 1/8th', kpi3Sub: 'Or 91% - 100% Absolute', kpi3Icon: 'bi-trophy',
    kpi4Label: 'Grace Mark Limit', kpi4Value: '5 Marks Max', kpi4Sub: 'As per School Board Bye-laws', kpi4Icon: 'bi-award',
    columns: ['Grade Name', 'Marks Range %', 'Grade Point', 'Descriptive Performance Remark', 'Classification', 'Color Tag', 'Status'],
    rows: [
      ['<span class="badge bg-success">A1</span>', '91% - 100%', '10.0', 'Outstanding Conceptual Mastery & Analytical Skill', 'Pass / Distinction', '<span class="text-success fw-bold">Success Green</span>', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-primary">A2</span>', '81% - 90%', '9.0', 'Excellent Proficiency with High Precision', 'Pass / Distinction', '<span class="text-primary fw-bold">Royal Blue</span>', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-info">B1</span>', '71% - 80%', '8.0', 'Very Good Comprehension with Systematic Application', 'Pass / First Division', '<span class="text-info fw-bold">Cyan</span>', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-secondary">B2</span>', '61% - 70%', '7.0', 'Good Understanding with Sound Foundational Knowledge', 'Pass / First Division', '<span class="text-secondary fw-bold">Neutral Gray</span>', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-warning text-dark">C1</span>', '51% - 60%', '6.0', 'Satisfactory Demonstration of Required Outcomes', 'Pass / Second Division', '<span class="text-warning fw-bold">Amber</span>', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-warning text-dark">C2</span>', '41% - 50%', '5.0', 'Average Capability, Reinforcement Advised', 'Pass / Third Division', '<span class="text-warning fw-bold">Amber</span>', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-danger">D</span>', '33% - 40%', '4.0', 'Marginal Performance, Targeted Support Required', 'Pass / Borderline', '<span class="text-danger fw-bold">Light Red</span>', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-dark">E</span>', '0% - 32%', '0.0', 'Needs Substantial Improvement / Remedial Support', 'Needs Improvement / Compartment', '<span class="text-dark fw-bold">Dark Gray</span>', '<span class="badge bg-success-subtle text-success border">Active</span>']
    ]
  },
  {
    filename: 'cbse-assessment.php',
    title: 'CBSE Assessment Structure',
    desc: 'Circular compliance manager for CBSE Secondary (IX-X) & Senior Secondary (XI-XII) curriculum bylaws',
    icon: 'bi-patch-check-fill',
    actionBtnText: 'Verify CBSE Scheme',
    kpi1Label: 'Affiliation Code', kpi1Value: 'CBSE 2130048', kpi1Sub: 'Valid through 2029', kpi1Icon: 'bi-award',
    kpi2Label: 'Secondary Schema', kpi2Value: '80 Board : 20 CCE', kpi2Sub: 'Uniform Assessment', kpi2Icon: 'bi-check-all',
    kpi3Label: 'Sr Secondary Schema', kpi3Value: '70/80 Theory : 30/20 Lab', kpi3Sub: 'Stream-specific', kpi3Icon: 'bi-layout-split',
    kpi4Label: 'Skill Subjects', kpi4Value: '6th Additional', kpi4Sub: 'Best of 5 Rule Applicable', kpi4Icon: 'bi-lightbulb',
    columns: ['Class Level', 'Assessment Framework', 'Theory Max', 'Internal / Practical Max', 'Passing Rule', 'Grace Mark Policy', 'Circular Ref'],
    rows: [
      ['<strong>Class X (Secondary)</strong>', 'Uniform System of Assessment (CBSE)', '80 Marks', '20 Marks (CCE)', '33% Aggregate (Theory + Internal)', 'Up to 5 marks by Committee', 'CBSE/ACAD/2026/Cir-14'],
      ['<strong>Class XII (Science)</strong>', 'All India Senior School Certificate (AISSCE)', '70 Marks', '30 Marks (External Practical)', '33% in Theory AND 33% in Practical', 'Up to 5 marks Board rule', 'CBSE/CE/2026/AISSCE-09'],
      ['<strong>Class XII (Commerce)</strong>', 'All India Senior School Certificate (AISSCE)', '80 Marks', '20 Marks (Project & Viva)', '33% in Theory AND 33% in Practical', 'Up to 5 marks Board rule', 'CBSE/CE/2026/AISSCE-11'],
      ['<strong>Class IX (Secondary)</strong>', 'School-Based CCE Replica', '80 Marks', '20 Marks (CCE)', '33% in Subject Aggregate', 'School Academic Committee', 'CBSE/ACAD/2026/Cir-08']
    ]
  },
  {
    filename: 'state-board-assessment.php',
    title: 'State Board Assessment Structure',
    desc: 'Equivalent assessment framework mapping for students under State Secondary Education boards',
    icon: 'bi-geo-alt-fill',
    actionBtnText: 'Configure State Scheme',
    kpi1Label: 'State Boards', kpi1Value: 'UP & Maharashtra', kpi1Sub: 'Equivalence Mapped', kpi1Icon: 'bi-map',
    kpi2Label: 'Theory : CCE Split', kpi2Value: '70 : 30 Scale', kpi2Sub: 'State Norms', kpi2Icon: 'bi-pie-chart',
    kpi3Label: 'Language Group', kpi3Value: '3 Languages', kpi3Sub: 'Mother Tongue Included', kpi3Icon: 'bi-translate',
    kpi4Label: 'Validation Status', kpi4Value: 'Approved', kpi4Sub: 'State DIOS Certified', kpi4Icon: 'bi-shield-check',
    columns: ['State Board Code', 'Framework Title', 'Language Subjects', 'Core Subjects Split', 'Grace Criteria', 'Marks Certificate Format', 'Status'],
    rows: [
      ['<span class="badge bg-secondary">UPMSP</span>', 'UP Madhyamik Shiksha Parishad', 'Hindi, English, Sanskrit', '70 Theory + 30 Project/Practical', 'Grace up to 4 marks', 'High School Sanad Form B', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-secondary">MSBSHSE</span>', 'Maharashtra State Board', 'Marathi, English, Hindi', '80 Written + 20 Oral/Practical', 'Combined Passing 35%', 'SSC Board Ledger', '<span class="badge bg-success-subtle text-success border">Active</span>']
    ]
  },
  {
    filename: 'marks-verification.php',
    title: 'Marks Verification Workflow',
    desc: 'Multi-stage verification and freeze pipeline (Subject Teacher -> HOD -> Exam Controller -> Principal)',
    icon: 'bi-shield-check',
    actionBtnText: 'Approve & Freeze Batch',
    actionBtnIcon: 'bi-check2-circle',
    isToolPage: true,
    toolModalId: 'approveBatchModal',
    kpi1Label: 'Batches Awaiting HOD', kpi1Value: '6 Batches', kpi1Sub: 'Review in-progress', kpi1Icon: 'bi-hourglass-split',
    kpi2Label: 'Controller Verified', kpi2Value: '48 Batches', kpi2Sub: 'Cryptographically Signed', kpi2Icon: 'bi-patch-check',
    kpi3Label: 'Revision Requests', kpi3Value: '2 Requested', kpi3Sub: 'Re-entry Permitted', kpi3Icon: 'bi-arrow-counterclockwise',
    kpi4Label: 'System Integrity', kpi4Value: 'Immutable', kpi4Sub: 'Audit Log Preserved', kpi4Icon: 'bi-shield-lock',
    columns: ['Batch ID', 'Class & Section', 'Subject', 'Submitted By', 'HOD Sign-off', 'Controller Sign-off', 'Principal Freeze', 'Actions'],
    rows: [
      ['<span class="badge bg-dark">VRF-101</span>', 'Class X-A', 'Mathematics Std', 'Mr. Rajesh Verma', '<span class="badge bg-success"><i class="bi bi-check2"></i> Approved</span>', '<span class="badge bg-success"><i class="bi bi-check2"></i> Approved</span>', '<span class="badge bg-danger"><i class="bi bi-lock-fill"></i> Frozen</span>', '<button class="btn btn-xs btn-outline-secondary">Audit Trail</button>'],
      ['<span class="badge bg-dark">VRF-102</span>', 'Class X-B', 'Mathematics Std', 'Mrs. Priya Nair', '<span class="badge bg-success"><i class="bi bi-check2"></i> Approved</span>', '<span class="badge bg-success"><i class="bi bi-check2"></i> Approved</span>', '<span class="badge bg-danger"><i class="bi bi-lock-fill"></i> Frozen</span>', '<button class="btn btn-xs btn-outline-secondary">Audit Trail</button>'],
      ['<span class="badge bg-dark">VRF-103</span>', 'Class XII-Sci', 'Physics Theory', 'Dr. Vikramaditya Rao', '<span class="badge bg-success"><i class="bi bi-check2"></i> Approved</span>', '<span class="badge bg-warning text-dark"><i class="bi bi-hourglass"></i> Reviewing</span>', '<span class="badge bg-light text-dark border">Pending</span>', '<button class="btn btn-xs btn-primary">Controller Sign</button>'],
      ['<span class="badge bg-dark">VRF-104</span>', 'Class XII-Comm', 'Accountancy', 'Mrs. Neha Kulkarni', '<span class="badge bg-warning text-dark"><i class="bi bi-hourglass"></i> Reviewing</span>', '<span class="badge bg-light text-dark border">Pending</span>', '<span class="badge bg-light text-dark border">Pending</span>', '<button class="btn btn-xs btn-light border">HOD Review</button>']
    ]
  },
  {
    filename: 'result-processing.php',
    title: 'Result Processing Engine',
    desc: 'Automated calculation engine executing moderation, grace rule application, aggregate percent, and rank',
    icon: 'bi-cpu-fill',
    actionBtnText: 'Execute Result Pipeline',
    actionBtnIcon: 'bi-play-fill',
    isToolPage: true,
    toolModalId: 'executePipelineModal',
    kpi1Label: 'Pipeline Status', kpi1Value: 'Engine Ready', kpi1Sub: 'Algorithm v4.2', kpi1Icon: 'bi-cpu',
    kpi2Label: 'Processed Candidates', kpi2Value: '1,420 / 1,420', kpi2Sub: '100% Executed', kpi2Icon: 'bi-people',
    kpi3Label: 'Execution Duration', kpi3Value: '1.4 Seconds', kpi3Sub: 'Optimized Batch Query', kpi3Icon: 'bi-lightning',
    kpi4Label: 'Pass Percentage', kpi4Value: '98.2%', kpi4Sub: 'All Classes Average', kpi4Icon: 'bi-graph-up-arrow',
    columns: ['Run ID', 'Examination Group', 'Target Classes', 'Processed Count', 'Pass / Compartment / Fail', 'Average %', 'Processed By', 'Timestamp'],
    rows: [
      ['<span class="badge bg-primary">RUN-2026-04</span>', 'Pre-Board Examination II', 'Class X (A, B, C)', '124 Students', '<span class="text-success fw-bold">121</span> / <span class="text-warning fw-bold">3</span> / <span class="text-danger fw-bold">0</span>', '78.4%', 'Controller Dr. Deshmukh', '28-Oct-2026 12:40'],
      ['<span class="badge bg-primary">RUN-2026-03</span>', 'Pre-Board Examination II', 'Class XII (Science)', '88 Students', '<span class="text-success fw-bold">87</span> / <span class="text-warning fw-bold">1</span> / <span class="text-danger fw-bold">0</span>', '82.6%', 'Controller Dr. Deshmukh', '28-Oct-2026 12:42'],
      ['<span class="badge bg-primary">RUN-2026-02</span>', 'Pre-Board Examination II', 'Class XII (Commerce)', '46 Students', '<span class="text-success fw-bold">45</span> / <span class="text-warning fw-bold">1</span> / <span class="text-danger fw-bold">0</span>', '79.1%', 'Controller Dr. Deshmukh', '28-Oct-2026 12:44'],
      ['<span class="badge bg-secondary">RUN-2026-01</span>', 'Periodic Assessment 2', 'Class IX (All Sec)', '140 Students', '<span class="text-success fw-bold">136</span> / <span class="text-warning fw-bold">4</span> / <span class="text-danger fw-bold">0</span>', '74.2%', 'Controller Dr. Deshmukh', '26-Oct-2026 18:20']
    ]
  },
  {
    filename: 'percentage-grade-calc.php',
    title: 'Percentage & Grade Calculation',
    desc: 'Configurable formula calculator with Best-of-5 subject rules, vocational replacements, and GPA tables',
    icon: 'bi-percent',
    actionBtnText: 'Recalculate Class Scores',
    actionBtnIcon: 'bi-arrow-repeat',
    isToolPage: true,
    toolModalId: 'recalculateModal',
    kpi1Label: 'Best-of-5 Rules', kpi1Value: 'CBSE Skill Rule', kpi1Sub: 'Vocational Replaces Academic', kpi1Icon: 'bi-check-circle',
    kpi2Label: 'Rounding Policy', kpi2Value: '2 Decimal Places', kpi2Sub: 'Standard ISO Rounding', kpi2Icon: 'bi-bounding-box-circles',
    kpi3Label: 'GPA Scale', kpi3Value: '10.0 Scale', kpi3Sub: 'Converted from %', kpi3Icon: 'bi-bar-chart',
    kpi4Label: 'Exception Handling', kpi4Value: '0 Errors', kpi4Sub: 'Verified Mathematical Schema', kpi4Icon: 'bi-patch-check',
    columns: ['Roll Number', 'Student Name', 'Class & Sec', 'Total Marks Obtained', 'Max Marks', 'Calculated %', 'CBSE GPA', 'Result Status'],
    rows: [
      ['<span class="badge bg-dark">10145201</span>', '<strong>Aarav Sharma</strong>', 'Class X-A', '482', '500', '<strong class="text-success">96.40%</strong>', '10.0', '<span class="badge bg-success">Passed (Distinction)</span>'],
      ['<span class="badge bg-dark">10145202</span>', '<strong>Ananya Verma</strong>', 'Class X-A', '491', '500', '<strong class="text-success">98.20%</strong>', '10.0', '<span class="badge bg-success">Passed (Distinction)</span>'],
      ['<span class="badge bg-dark">10145203</span>', '<strong>Rohan Patel</strong>', 'Class X-B', '425', '500', '<strong class="text-primary">85.00%</strong>', '9.0', '<span class="badge bg-success">Passed (First Div)</span>'],
      ['<span class="badge bg-dark">12188401</span>', '<strong>Diya Mukherjee</strong>', 'Class XII-Sci', '488', '500', '<strong class="text-success">97.60%</strong>', '10.0', '<span class="badge bg-success">Passed (Distinction)</span>'],
      ['<span class="badge bg-dark">12188402</span>', '<strong>Ishaan Joshi</strong>', 'Class XII-Comm', '452', '500', '<strong class="text-primary">90.40%</strong>', '9.5', '<span class="badge bg-success">Passed (Distinction)</span>']
    ]
  },
  {
    filename: 'class-rank.php',
    title: 'Class Rank Analysis',
    desc: 'Section-wise and batch-wide rank determination with tie-breaking algorithms based on core subject marks',
    icon: 'bi-trophy-fill',
    isReportPage: true,
    kpi1Label: 'Rank Algorithm', kpi1Value: 'CBSE Tie-Breaker', kpi1Sub: 'Maths > Science > English', kpi1Icon: 'bi-award',
    kpi2Label: 'Ranks Computed', kpi2Value: 'All Classes', kpi2Sub: 'Section & Batch Ranks', kpi2Icon: 'bi-sort-numeric-down',
    kpi3Label: '90%+ Achievers', kpi3Value: '184 Students', kpi3Sub: 'Scholar Badge Nominees', kpi3Icon: 'bi-star-fill',
    kpi4Label: 'Standard Deviation', kpi4Value: '8.4%', kpi4Sub: 'Healthy Distribution', kpi4Icon: 'bi-graph-up',
    columns: ['Batch Rank', 'Section Rank', 'Student Name', 'Class & Sec', 'Roll Number', 'Aggregate Marks', 'Percentage', 'Scholar Badge'],
    rows: [
      ['<span class="badge bg-warning text-dark"><i class="bi bi-trophy-fill me-1"></i>Rank 1</span>', '<span class="badge bg-primary">Sec 1</span>', '<strong>Ananya Verma</strong>', 'Class X-A', '10145202', '491 / 500', '<strong class="text-success">98.20%</strong>', '<span class="badge bg-warning text-dark">Gold Medalist</span>'],
      ['<span class="badge bg-secondary"><i class="bi bi-award-fill me-1"></i>Rank 2</span>', '<span class="badge bg-primary">Sec 2</span>', '<strong>Aarav Sharma</strong>', 'Class X-A', '10145201', '482 / 500', '<strong class="text-success">96.40%</strong>', '<span class="badge bg-secondary">Silver Medalist</span>'],
      ['<span class="badge bg-secondary"><i class="bi bi-award-fill me-1"></i>Rank 3</span>', '<span class="badge bg-primary">Sec 1</span>', '<strong>Tanvi Deshmukh</strong>', 'Class X-C', '10145288', '478 / 500', '<strong class="text-success">95.60%</strong>', '<span class="badge bg-secondary">Bronze Medalist</span>'],
      ['<span class="badge bg-light text-dark border">Rank 4</span>', '<span class="badge bg-primary">Sec 3</span>', '<strong>Sneha Kapoor</strong>', 'Class X-A', '10145204', '472 / 500', '<strong class="text-primary">94.40%</strong>', '<span class="badge bg-info text-dark">Scholar Badge</span>'],
      ['<span class="badge bg-light text-dark border">Rank 5</span>', '<span class="badge bg-primary">Sec 1</span>', '<strong>Rohan Patel</strong>', 'Class X-B', '10145203', '425 / 500', '<strong class="text-primary">85.00%</strong>', '<span class="badge bg-info text-dark">Honor Roll</span>']
    ]
  },
  {
    filename: 'merit-list.php',
    title: 'Merit List & Toppers',
    desc: 'Roll of Honor, school toppers, subject highest scorers, and scholarship award nominations',
    icon: 'bi-stars',
    isReportPage: true,
    kpi1Label: 'School Topper (X)', kpi1Value: '98.20%', kpi1Sub: 'Ananya Verma (X-A)', kpi1Icon: 'bi-trophy',
    kpi2Label: 'School Topper (XII)', kpi2Value: '97.60%', kpi2Sub: 'Diya Mukherjee (Sci)', kpi2Icon: 'bi-star',
    kpi3Label: '100/100 Scores', kpi3Value: '18 Papers', kpi3Sub: 'Maths, Chem, CS', kpi3Icon: 'bi-patch-check',
    kpi4Label: 'Scholarship Corpus', kpi4Value: 'Rs. 4.5 Lakhs', kpi4Sub: 'Trustee Academic Grants', kpi4Icon: 'bi-cash-coin',
    columns: ['Category', 'Student Topper', 'Class & Stream', 'Subject / Area', 'Score / 100', 'Award / Scholarship', 'Citation'],
    rows: [
      ['<span class="badge bg-warning text-dark">Overall School Topper</span>', '<strong>Ananya Verma</strong>', 'Class X-A', 'AISSE Aggregate', '<strong>491 / 500 (98.2%)</strong>', 'President Gold Medal (Rs. 25,000)', 'Highest Aggregate in Secondary School'],
      ['<span class="badge bg-primary">Senior Sec Topper</span>', '<strong>Diya Mukherjee</strong>', 'Class XII-Science', 'AISSCE Science', '<strong>488 / 500 (97.6%)</strong>', 'Principal Trophy (Rs. 25,000)', 'Top score in Physics & Mathematics'],
      ['<span class="badge bg-info text-dark">Commerce Stream Topper</span>', '<strong>Ishaan Joshi</strong>', 'Class XII-Commerce', 'Accountancy & Eco', '<strong>452 / 500 (90.4%)</strong>', 'Rotary Excellence Cup', 'Perfect 100 in Accountancy Project'],
      ['<span class="badge bg-success">Perfect Centum</span>', '<strong>Aarav Sharma</strong>', 'Class X-A', 'Mathematics Std (041)', '<strong>100 / 100</strong>', 'Ramanujan Mathematical Citation', '100% Correct Examination Booklet']
    ]
  },
  {
    filename: 'report-cards.php',
    title: 'CBSE Report Cards Generator',
    desc: 'Generate bilingual CBSE prescribed holistic progress report cards with principal e-signatures & QR seals',
    icon: 'bi-file-earmark-person-fill',
    actionBtnText: 'Bulk Generate Report Cards',
    actionBtnIcon: 'bi-printer-fill',
    isToolPage: true,
    toolModalId: 'bulkPrintReportCardsModal',
    kpi1Label: 'Report Cards Ready', kpi1Value: '1,420 Ready', kpi1Sub: 'All 4 Wings', kpi1Icon: 'bi-card-text',
    kpi2Label: 'Format Adherence', kpi2Value: 'CBSE NEP 2020', kpi2Sub: '360° Holistic Card', kpi2Icon: 'bi-award',
    kpi3Label: 'Digital Signatures', kpi3Value: 'Dual e-Sign', kpi3Sub: 'Class Teacher & Principal', kpi3Icon: 'bi-pen',
    kpi4Label: 'Mobile App Sync', kpi4Value: 'Published', kpi4Sub: 'Parents Can Download', kpi4Icon: 'bi-phone',
    columns: ['Roll Number', 'Student Name', 'Class & Sec', 'Overall %', 'Final Grade', 'Attendance %', 'Card Status', 'Actions'],
    rows: [
      ['<span class="badge bg-dark">10145201</span>', '<strong>Aarav Sharma</strong>', 'Class X-A', '96.40%', '<span class="badge bg-success">A1</span>', '92.4%', '<span class="badge bg-success-subtle text-success border">Signed & Sealed</span>', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-printer me-1"></i>Print Card</button>'],
      ['<span class="badge bg-dark">10145202</span>', '<strong>Ananya Verma</strong>', 'Class X-A', '98.20%', '<span class="badge bg-success">A1</span>', '96.0%', '<span class="badge bg-success-subtle text-success border">Signed & Sealed</span>', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-printer me-1"></i>Print Card</button>'],
      ['<span class="badge bg-dark">10145203</span>', '<strong>Rohan Patel</strong>', 'Class X-B', '85.00%', '<span class="badge bg-primary">A2</span>', '88.5%', '<span class="badge bg-success-subtle text-success border">Signed & Sealed</span>', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-printer me-1"></i>Print Card</button>'],
      ['<span class="badge bg-dark">12188401</span>', '<strong>Diya Mukherjee</strong>', 'Class XII-Sci', '97.60%', '<span class="badge bg-success">A1</span>', '94.2%', '<span class="badge bg-success-subtle text-success border">Signed & Sealed</span>', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-printer me-1"></i>Print Card</button>']
    ]
  },
  {
    filename: 'progress-reports.php',
    title: 'Continuous Progress Reports',
    desc: 'Term-over-term trajectory charts tracking individual pupil growth in scholastic and co-scholastic domains',
    icon: 'bi-graph-up-arrow',
    isReportPage: true,
    kpi1Label: 'Longitudinal Data', kpi1Value: '3 Years Tracked', kpi1Sub: 'Continuous Profile', kpi1Icon: 'bi-clock-history',
    kpi2Label: 'Positive Trajectory', kpi2Value: '86.4%', kpi2Sub: 'Showing Term Improvement', kpi2Icon: 'bi-arrow-up-right',
    kpi3Label: 'Co-Scholastic', kpi3Value: 'Discipline, Art, PE', kpi3Sub: 'Graded A to C', kpi3Icon: 'bi-palette',
    kpi4Label: 'Parent Signatures', kpi4Value: '94.2% Verified', kpi4Sub: 'PTM Acknowledgements', kpi4Icon: 'bi-check2-all',
    columns: ['Student Name', 'Class & Sec', 'Admission No', 'Term 1 %', 'Term 2 %', 'Velocity / Delta', 'Co-Scholastic Grade', 'Detailed Profile'],
    rows: [
      ['<strong>Aarav Sharma</strong>', 'Class X-A', 'ADM-2021-0412', '94.0%', '96.4%', '<span class="text-success fw-bold"><i class="bi bi-arrow-up"></i> +2.4%</span>', '<span class="badge bg-success">Grade A</span>', '<button class="btn btn-xs btn-light border"><i class="bi bi-eye"></i> Dossier</button>'],
      ['<strong>Rohan Patel</strong>', 'Class X-B', 'ADM-2021-0435', '81.5%', '85.0%', '<span class="text-success fw-bold"><i class="bi bi-arrow-up"></i> +3.5%</span>', '<span class="badge bg-success">Grade A</span>', '<button class="btn btn-xs btn-light border"><i class="bi bi-eye"></i> Dossier</button>'],
      ['<strong>Kavita Shenoy</strong>', 'Class X-C', 'ADM-2021-0452', '76.0%', '74.5%', '<span class="text-danger fw-bold"><i class="bi bi-arrow-down"></i> -1.5%</span>', '<span class="badge bg-primary">Grade B</span>', '<button class="btn btn-xs btn-light border"><i class="bi bi-eye"></i> Dossier</button>']
    ]
  },
  {
    filename: 'cumulative-results.php',
    title: 'Cumulative Results',
    desc: 'Consolidated master tabulation register (TR) detailing subject marks, totals, and CBSE roll ledger',
    icon: 'bi-journal-text',
    isReportPage: true,
    kpi1Label: 'Tabulation Register', kpi1Value: 'Form B Official', kpi1Sub: 'Inspection Standard', kpi1Icon: 'bi-journal-richtext',
    kpi2Label: 'Total Candidates', kpi2Value: '1,420 Enrolled', kpi2Sub: 'Class I to XII', kpi2Icon: 'bi-people',
    kpi3Label: 'Master Pass %', kpi3Value: '98.2%', kpi3Sub: 'Zero Paper Leaks', kpi3Icon: 'bi-check-circle',
    kpi4Label: 'Archival Status', kpi4Value: 'Permanent Record', kpi4Sub: 'Stamped & Bound', kpi4Icon: 'bi-archive',
    columns: ['CBSE Roll No', 'Student Name', 'Sub 1 (Maths)', 'Sub 2 (Science)', 'Sub 3 (Social)', 'Sub 4 (English)', 'Sub 5 (Hindi)', 'Grand Total', 'Result'],
    rows: [
      ['10145201', 'Aarav Sharma', '100 / 100', '95 / 100', '96 / 100', '94 / 100', '97 / 100', '<strong>482 / 500</strong>', '<span class="badge bg-success">PASSED</span>'],
      ['10145202', 'Ananya Verma', '99 / 100', '98 / 100', '98 / 100', '97 / 100', '99 / 100', '<strong>491 / 500</strong>', '<span class="badge bg-success">PASSED</span>'],
      ['10145203', 'Rohan Patel', '82 / 100', '86 / 100', '84 / 100', '85 / 100', '88 / 100', '<strong>425 / 500</strong>', '<span class="badge bg-success">PASSED</span>'],
      ['10145204', 'Sneha Kapoor', '92 / 100', '94 / 100', '96 / 100', '93 / 100', '97 / 100', '<strong>472 / 500</strong>', '<span class="badge bg-success">PASSED</span>']
    ]
  },
  {
    filename: 'rechecking.php',
    title: 'Marks Rechecking & Retotaling',
    desc: 'Application management for paper scrutiny, retotaling, photocopy of answer scripts, and re-evaluation',
    icon: 'bi-arrow-repeat',
    actionBtnText: 'File Scrutiny Request',
    kpi1Label: 'Applications Filed', kpi1Value: '14 Requests', kpi1Sub: 'Post Term 1 Results', kpi1Icon: 'bi-file-earmark-diff',
    kpi2Label: 'Rechecking Completed', kpi2Value: '12 Cleared', kpi2Sub: 'Dual Evaluator Review', kpi2Icon: 'bi-check2-circle',
    kpi3Label: 'Marks Modified', kpi3Value: '3 Revised (+1 to +3m)', kpi3Sub: 'Calculation Errors', kpi3Icon: 'bi-pencil',
    kpi4Label: 'Fee Collection', kpi4Value: 'Rs. 7,000', kpi4Sub: 'Rs. 500/Subject', kpi4Icon: 'bi-cash',
    columns: ['App ID', 'Student Name', 'Roll Number', 'Subject Queried', 'Type of Review', 'Original Score', 'Revised Score', 'Status'],
    rows: [
      ['<span class="badge bg-secondary">REC-041</span>', 'Kavita Shenoy', '10145252', 'Science (Class X)', 'Retotaling & Scrutiny', '71 / 80', '<strong class="text-success">73 / 80 (+2)</strong>', '<span class="badge bg-success">Marks Updated</span>'],
      ['<span class="badge bg-secondary">REC-042</span>', 'Aditya Nair', '12188450', 'Accountancy (Class XII)', 'Photocopy of Script', '64 / 80', '64 / 80 (No Change)', '<span class="badge bg-secondary">Verified Unchanged</span>'],
      ['<span class="badge bg-secondary">REC-043</span>', 'Manish Pandey', '10145290', 'Mathematics (Class X)', 'Re-evaluation (Q14, Q28)', '58 / 80', '<span class="text-muted">Under Review</span>', '<span class="badge bg-warning text-dark">With Committee</span>']
    ]
  },
  {
    filename: 'supplementary-exams.php',
    title: 'Supplementary & Compartment Exams',
    desc: 'Compartment candidate identification, exam rescheduling, fee collection, and special coaching registration',
    icon: 'bi-exclamation-octagon-fill',
    actionBtnText: 'Register Compartment Candidate',
    actionBtnIcon: 'bi-person-plus',
    kpi1Label: 'Compartment Cases', kpi1Value: '18 Students', kpi1Sub: '1.2% of Total', kpi1Icon: 'bi-person-exclamation',
    kpi2Label: 'Max Allowed', kpi2Value: '1 Subject (Class X)', kpi2Sub: 'As per CBSE Bye-Laws', kpi2Icon: 'bi-info-circle',
    kpi3Label: 'Special Remedials', kpi3Value: '100% Attending', kpi3Sub: 'Mandatory 30 Days', kpi3Icon: 'bi-book',
    kpi4Label: 'Supplementary Date', kpi4Value: '18-Nov-2026', kpi4Sub: 'Scheduled in Lab B', kpi4Icon: 'bi-calendar-event',
    columns: ['Roll Number', 'Student Name', 'Class & Sec', 'Failing Subject', 'Marks Obtained', 'Passing Shortfall', 'Remedial Attendance', 'Compartment Status'],
    rows: [
      ['<span class="badge bg-dark">10145292</span>', 'Deepak Chauhan', 'Class X-B', 'Mathematics Std', '26 / 80 (Needs 27)', '1 Mark Shortfall', '<span class="badge bg-success">92% Attended</span>', '<span class="badge bg-warning text-dark">Admit Card Issued</span>'],
      ['<span class="badge bg-dark">10145295</span>', 'Rahul Sen', 'Class X-C', 'Science Theory', '24 / 80 (Needs 27)', '3 Marks Shortfall', '<span class="badge bg-success">88% Attended</span>', '<span class="badge bg-warning text-dark">Admit Card Issued</span>'],
      ['<span class="badge bg-dark">12188488</span>', 'Varun Kulkarni', 'Class XII-Sci', 'Chemistry Theory', '21 / 70 (Needs 23)', '2 Marks Shortfall', '<span class="badge bg-success">95% Attended</span>', '<span class="badge bg-warning text-dark">Admit Card Issued</span>']
    ]
  },
  {
    filename: 'promotion-eligibility.php',
    title: 'Promotion Eligibility Matrix',
    desc: 'Annual promotion determination matrix enforcing 33% subject minimum, attendance criterion & condonation',
    icon: 'bi-signpost-split-fill',
    actionBtnText: 'Run Promotion Assessment',
    actionBtnIcon: 'bi-check2-all',
    isToolPage: true,
    toolModalId: 'runPromotionModal',
    kpi1Label: 'Promoted Students', kpi1Value: '1,392 Students', kpi1Sub: 'Direct Promotion', kpi1Icon: 'bi-check-circle',
    kpi2Label: 'Conditional Promotion', kpi2Value: '18 Students', kpi2Sub: 'Subject to Compartment', kpi2Icon: 'bi-exclamation-circle',
    kpi3Label: 'Detained / Repeat', kpi3Value: '10 Students', kpi3Sub: 'Severe Academic Shortfall', kpi3Icon: 'bi-x-octagon',
    kpi4Label: 'Attendance Condonation', kpi4Value: '24 Cases', kpi4Sub: 'Approved by Medical Board', kpi4Icon: 'bi-shield-check',
    columns: ['Admission No', 'Student Name', 'Current Class', 'Academic Overall %', 'Attendance %', 'Failing Subjects', 'Decision', 'Promoted To'],
    rows: [
      ['ADM-2021-0412', 'Aarav Sharma', 'Class X-A', '96.4%', '92.4%', 'None', '<span class="badge bg-success">Promoted (Regular)</span>', '<strong>Class XI (Science)</strong>'],
      ['ADM-2021-0419', 'Ananya Verma', 'Class X-A', '98.2%', '96.0%', 'None', '<span class="badge bg-success">Promoted (Regular)</span>', '<strong>Class XI (Science)</strong>'],
      ['ADM-2021-0492', 'Deepak Chauhan', 'Class X-B', '44.2%', '78.5%', 'Maths (1 Subject)', '<span class="badge bg-warning text-dark">Compartment Dependent</span>', 'Class XI (Subject to Exam)'],
      ['ADM-2021-0511', 'Sameer Quadri', 'Class IX-C', '28.4%', '68.0%', 'Maths, Science, Hindi', '<span class="badge bg-danger">Detained (Repeat Class)</span>', 'Class IX (Repeat Academic Year)']
    ]
  },
  {
    filename: 'result-publication.php',
    title: 'Result Publication',
    desc: 'Public and student portal publication toggle, SMS broadcast, and password-protected mark-sheet release',
    icon: 'bi-broadcast-pin',
    actionBtnText: 'Publish Live Results',
    actionBtnIcon: 'bi-broadcast',
    isToolPage: true,
    toolModalId: 'publishResultsModal',
    kpi1Label: 'Published Sessions', kpi1Value: 'Term 1 Live', kpi1Sub: 'Public on Portal', kpi1Icon: 'bi-globe2',
    kpi2Label: 'Portal Hits', kpi2Value: '4,820 Hits', kpi2Sub: 'Within 2 Hours', kpi2Icon: 'bi-speedometer',
    kpi3Label: 'SMS Notifications', kpi3Value: '1,420 Sent', kpi3Sub: '100% Delivered', kpi3Icon: 'bi-chat-dots',
    kpi4Label: 'Result Lockdown', kpi4Value: 'Protected', kpi4Sub: 'DOB + Roll Number OTP', kpi4Icon: 'bi-shield-lock',
    columns: ['Session Code', 'Examination Title', 'Applicable Classes', 'Publication Date', 'Web Portal Toggle', 'SMS Alerts', 'E-Report Download', 'Action'],
    rows: [
      ['<span class="badge bg-dark">PUB-2026-T1</span>', 'Term 1 Consolidated Examination', 'Class I to XII', '15-Oct-2026 10:00 AM', '<span class="badge bg-success"><i class="bi bi-eye"></i> Live Published</span>', '<span class="badge bg-success">Delivered</span>', '<span class="badge bg-primary">Enabled</span>', '<button class="btn btn-xs btn-outline-danger">Unpublish / Embargo</button>'],
      ['<span class="badge bg-dark">PUB-2026-PB2</span>', 'Pre-Board Examination II', 'Class X & XII', 'Drafting Mode', '<span class="badge bg-secondary"><i class="bi bi-eye-slash"></i> Embargoed</span>', '<span class="badge bg-light text-dark border">Queued</span>', '<span class="badge bg-light text-dark border">Disabled</span>', '<button class="btn btn-xs btn-primary">Schedule Launch</button>']
    ]
  },
  {
    filename: 'subject-analysis.php',
    title: 'Subject Performance Analysis',
    desc: 'Departmental analytics comparing subject means, standard deviations, pass percentages, and teacher ratings',
    icon: 'bi-graph-down',
    isReportPage: true,
    kpi1Label: 'Highest Scoring Subject', kpi1Value: 'Computer Science (91.4%)', kpi1Sub: 'Dept Average', kpi1Icon: 'bi-code-square',
    kpi2Label: 'Challenging Subject', kpi2Value: 'Mathematics (72.8%)', kpi2Sub: 'Targeted Remedial', kpi2Icon: 'bi-graph-down',
    kpi3Label: 'Faculty Evaluated', kpi3Value: '42 Teachers', kpi3Sub: 'Outcome Metrics', kpi3Icon: 'bi-people',
    kpi4Label: 'Curriculum Progress', kpi4Value: 'On Track', kpi4Sub: '100% Syllabi Done', kpi4Icon: 'bi-check-all',
    columns: ['Subject & Code', 'Class / Wing', 'Department HOD', 'Students Appeared', 'Subject Average %', 'Pass % (>=33%)', 'Centum (100m)', 'Quality Index (PI)'],
    rows: [
      ['<strong>Mathematics Std (041)</strong>', 'Class X', 'Mr. Rajesh Verma', '124 Students', '76.4%', '97.5%', '2 Students', '<span class="badge bg-primary">PI: 74.2</span>'],
      ['<strong>Science Theory (086)</strong>', 'Class X', 'Mrs. Anita Menon', '124 Students', '78.2%', '98.3%', '1 Student', '<span class="badge bg-primary">PI: 76.5</span>'],
      ['<strong>Physics Theory (042)</strong>', 'Class XII-Sci', 'Dr. Vikramaditya Rao', '88 Students', '81.4%', '98.8%', '0 Students', '<span class="badge bg-success">PI: 82.1</span>'],
      ['<strong>Chemistry Theory (043)</strong>', 'Class XII-Sci', 'Mrs. Shweta Rastogi', '88 Students', '82.8%', '100%', '1 Student', '<span class="badge bg-success">PI: 84.0</span>'],
      ['<strong>Computer Science (083)</strong>', 'Class XII-Sci', 'Mr. Amit Sen', '42 Students', '89.6%', '100%', '3 Students', '<span class="badge bg-success">PI: 91.4</span>'],
      ['<strong>Accountancy (055)</strong>', 'Class XII-Comm', 'Mrs. Neha Kulkarni', '46 Students', '79.2%', '97.8%', '1 Student', '<span class="badge bg-primary">PI: 78.0</span>']
    ]
  },
  {
    filename: 'exam-reports.php',
    title: 'Examination MIS Reports',
    desc: 'Official CBSE compliance registers, inspection data sheets, gazette extracts, and statistical summaries',
    icon: 'bi-journal-medical',
    isReportPage: true,
    kpi1Label: 'Audit Reports Ready', kpi1Value: '18 Formats', kpi1Sub: 'CBSE Compliant', kpi1Icon: 'bi-file-earmark-pdf',
    kpi2Label: 'Gazette Extract', kpi2Value: 'Form 4 Ready', kpi2Sub: 'Official Seal Ready', kpi2Icon: 'bi-file-text',
    kpi3Label: 'Export Formats', kpi3Value: 'PDF, CSV, Excel', kpi3Sub: 'High Resolution', kpi3Icon: 'bi-filetype-pdf',
    kpi4Label: 'Inspection Archive', kpi4Value: 'Permanent', kpi4Sub: '5-Year Rolling Retain', kpi4Icon: 'bi-archive-fill',
    columns: ['Report Code', 'Report Description', 'Applicable Regulation', 'Last Generated', 'Generated By', 'Format', 'Action'],
    rows: [
      ['<span class="badge bg-dark">CBSE-REP-01</span>', '<strong>CBSE AISSE Class X Master Tabulation Register</strong>', 'CBSE Exam Bye-Laws', '28-Oct-2026', 'Examination Controller', 'PDF / Official Sheet', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-download me-1"></i>Download</button>'],
      ['<span class="badge bg-dark">CBSE-REP-02</span>', '<strong>CBSE AISSCE Class XII Subject Performance Ledger</strong>', 'CBSE Exam Bye-Laws', '28-Oct-2026', 'Examination Controller', 'PDF / Official Sheet', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-download me-1"></i>Download</button>'],
      ['<span class="badge bg-dark">MIS-REP-03</span>', '<strong>Five-Year Comparative Trend & Performance Index</strong>', 'School Academic Board', '26-Oct-2026', 'Principal Office', 'Excel Spreadsheet', '<button class="btn btn-xs btn-outline-success"><i class="bi bi-file-earmark-excel me-1"></i>Export</button>'],
      ['<span class="badge bg-dark">MIS-REP-04</span>', '<strong>Subject-wise Failure & Remedial Intervention Register</strong>', 'NEP 2020 Quality Assurance', '27-Oct-2026', 'Academic Coordinator', 'PDF Document', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-download me-1"></i>Download</button>'],
      ['<span class="badge bg-dark">MIS-REP-05</span>', '<strong>CBSE 20% CCE Internal Assessment Final Submission Roster</strong>', 'CBSE Portal Electronic Format', '28-Oct-2026', 'IT System Admin', 'XML / CSV for CBSE', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-download me-1"></i>Download</button>']
    ]
  }
];

// Write all pages
console.log('Writing Examination Dashboard...');
fs.writeFileSync(path.join(EXAM_DIR, 'dashboard.php'), generateExamDashboard(), 'utf8');
console.log('[GENERATED] examinations/dashboard.php');

for (const mod of submodules) {
  const filePath = path.join(EXAM_DIR, mod.filename);
  const content = generateTablePage(mod);
  fs.writeFileSync(filePath, content, 'utf8');
  console.log(`[GENERATED] examinations/${mod.filename} (${mod.title})`);
}

console.log(`\nSuccessfully generated ${submodules.length + 1} bespoke Examination & Results submodules.`);
