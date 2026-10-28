<?php
/**
 * EDUSYS PRO - PROMOTION ELIGIBILITY MATRIX
 * Dedicated operational interface & records management for Promotion Eligibility Matrix
 */
$page_title = "Promotion Eligibility Matrix";
$page_desc = "Annual promotion determination matrix enforcing 33% subject minimum, attendance criterion & condonation";
$active_module = "examinations";
$active_submodule = "promotion-eligibility.php";
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
    <h1><i class="bi bi-signpost-split-fill text-primary me-2"></i><?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'promotion-eligibility_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#runPromotionModal">
      <i class="bi bi-check2-all me-1"></i> Run Promotion Assessment
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Promoted Students</h6>
        <div class="kpi-value">1,392 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle-fill"></i> Direct Promotion</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check-circle"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Conditional Promotion</h6>
        <div class="kpi-value">18 Students</div>
        <div class="kpi-trend neutral"><i class="bi bi-info-circle-fill"></i> Subject to Compartment</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-exclamation-circle"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Detained / Repeat</h6>
        <div class="kpi-value">10 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-graph-up-arrow"></i> Severe Academic Shortfall</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-x-octagon"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Attendance Condonation</h6>
        <div class="kpi-value">24 Cases</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Approved by Medical Board</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
</div>

<!-- Main Table Container -->
<div class="table-container mb-4">
  <div class="table-header">
    <div class="table-title">
      <i class="bi bi-signpost-split-fill text-primary me-2"></i> Promotion Eligibility Matrix Register
    </div>
    <div class="table-actions">
      <div class="search-box">
        <i class="bi bi-search"></i>
        <input type="text" id="tableSearchInput" class="form-control" placeholder="Search promotion eligibility matrix..." onkeyup="EduTables.search('#mainDataTable', this.value)">
      </div>
      <div class="filter-dropdown">
        <select class="form-select form-select-sm" onchange="EduTables.filter('#mainDataTable', this.value)">
          <option value="">All Records</option>
          <option value="Active">Active</option>
          <option value="Completed">Completed</option>
          <option value="Pending">Pending</option>
        </select>
      </div>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table erp-table table-hover" id="mainDataTable">
      <thead>
        <tr>
          <th>Admission No</th>
          <th>Student Name</th>
          <th>Current Class</th>
          <th>Academic Overall %</th>
          <th>Attendance %</th>
          <th>Failing Subjects</th>
          <th>Decision</th>
          <th>Promoted To</th>
          <th class="text-center" style="width: 120px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        
        <tr>
          <td>ADM-2021-0412</td>
          <td>Aarav Sharma</td>
          <td>Class X-A</td>
          <td>96.4%</td>
          <td>92.4%</td>
          <td>None</td>
          <td><span class="badge bg-success">Promoted (Regular)</span></td>
          <td><strong>Class XI (Science)</strong></td>
          <td>
            
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Record"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-success" title="Run Quick Action" onclick="alert('Action triggered successfully for this record!')"><i class="bi bi-play-circle"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Promotion Eligibility Matrix')" title="Remove"><i class="bi bi-trash"></i></button>
          </div>
          </td>
        </tr>
        <tr>
          <td>ADM-2021-0419</td>
          <td>Ananya Verma</td>
          <td>Class X-A</td>
          <td>98.2%</td>
          <td>96.0%</td>
          <td>None</td>
          <td><span class="badge bg-success">Promoted (Regular)</span></td>
          <td><strong>Class XI (Science)</strong></td>
          <td>
            
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Record"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-success" title="Run Quick Action" onclick="alert('Action triggered successfully for this record!')"><i class="bi bi-play-circle"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Promotion Eligibility Matrix')" title="Remove"><i class="bi bi-trash"></i></button>
          </div>
          </td>
        </tr>
        <tr>
          <td>ADM-2021-0492</td>
          <td>Deepak Chauhan</td>
          <td>Class X-B</td>
          <td>44.2%</td>
          <td>78.5%</td>
          <td>Maths (1 Subject)</td>
          <td><span class="badge bg-warning text-dark">Compartment Dependent</span></td>
          <td>Class XI (Subject to Exam)</td>
          <td>
            
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Record"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-success" title="Run Quick Action" onclick="alert('Action triggered successfully for this record!')"><i class="bi bi-play-circle"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Promotion Eligibility Matrix')" title="Remove"><i class="bi bi-trash"></i></button>
          </div>
          </td>
        </tr>
        <tr>
          <td>ADM-2021-0511</td>
          <td>Sameer Quadri</td>
          <td>Class IX-C</td>
          <td>28.4%</td>
          <td>68.0%</td>
          <td>Maths, Science, Hindi</td>
          <td><span class="badge bg-danger">Detained (Repeat Class)</span></td>
          <td>Class IX (Repeat Academic Year)</td>
          <td>
            
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Record"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-success" title="Run Quick Action" onclick="alert('Action triggered successfully for this record!')"><i class="bi bi-play-circle"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Promotion Eligibility Matrix')" title="Remove"><i class="bi bi-trash"></i></button>
          </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="table-footer">
    <div class="table-info font-size-13 text-muted">
      Showing 1 to 4 of 4 entries (CBSE Academic Cycle 2026-27)
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
        <h5 class="modal-title" id="addNewRecordModalLabel"><i class="bi bi-signpost-split-fill text-primary me-2"></i>Run Promotion Assessment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="recordForm" onsubmit="event.preventDefault(); alert('Saved successfully in CBSE Exam Repository!'); bootstrap.Modal.getInstance(document.getElementById('addNewRecordModal')).hide();">
          <div class="row g-3">
            
            <div class="col-md-6">
              <label class="form-label fw-semibold font-size-13">Exam Cycle / Session</label>
              
              <select class="form-select form-select-sm">
                <option>Annual Board Examination 2026</option><option>Pre-Board II (X & XII)</option><option>Term-2 Final Exams (VI-IX)</option><option>Periodic Assessment 2 (PA-2)</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold font-size-13">Class & Section</label>
              
              <select class="form-select form-select-sm">
                <option>Class X - All Sections</option><option>Class XII - Science (A, B)</option><option>Class XII - Commerce (C)</option><option>Class XII - Humanities (D)</option><option>Class IX - All Sections</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold font-size-13">Subject / Paper</label>
              
              <input type="text" class="form-control form-control-sm" placeholder="e.g. Mathematics Standard (041)">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold font-size-13">Date / Deadline</label>
              
              <input type="date" class="form-control form-control-sm" placeholder="">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold font-size-13">Remarks / Instructions</label>
              
              <textarea class="form-control form-control-sm" rows="3" placeholder="CBSE assessment guidelines and specific remarks..."></textarea>
            </div>
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
<div class="modal fade" id="runPromotionModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-signpost-split-fill text-primary me-2"></i>Run Promotion Assessment</h5>
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
          <button type="button" class="btn btn-sm btn-primary fw-bold" onclick="alert('Operation initiated successfully! Processing background queue.'); bootstrap.Modal.getInstance(document.getElementById('runPromotionModal')).hide();"><i class="bi bi-cpu me-1"></i> Start Execution</button>
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
            <span class="fw-bold text-primary">Promotion Eligibility Matrix</span>
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
