<?php
/**
 * EDUSYS PRO - CONTINUOUS PROGRESS REPORTS
 * Dedicated operational interface & records management for Continuous Progress Reports
 */
$page_title = "Continuous Progress Reports";
$page_desc = "Term-over-term trajectory charts tracking individual pupil growth in scholastic and co-scholastic domains";
$active_module = "examinations";
$active_submodule = "progress-reports.php";
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
    <h1><i class="bi bi-graph-up-arrow text-primary me-2"></i><?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'progress-reports_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" onclick="EduTables.print()">
      <i class="bi bi-file-earmark-pdf me-1"></i> Print / Save PDF
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Longitudinal Data</h6>
        <div class="kpi-value">3 Years Tracked</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle-fill"></i> Continuous Profile</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-clock-history"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Positive Trajectory</h6>
        <div class="kpi-value">86.4%</div>
        <div class="kpi-trend neutral"><i class="bi bi-info-circle-fill"></i> Showing Term Improvement</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-arrow-up-right"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Co-Scholastic</h6>
        <div class="kpi-value">Discipline, Art, PE</div>
        <div class="kpi-trend positive"><i class="bi bi-graph-up-arrow"></i> Graded A to C</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-palette"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Parent Signatures</h6>
        <div class="kpi-value">94.2% Verified</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> PTM Acknowledgements</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-all"></i></div>
    </div>
  </div>
</div>

<!-- Main Table Container -->
<div class="table-container mb-4">
  <div class="table-header">
    <div class="table-title">
      <i class="bi bi-graph-up-arrow text-primary me-2"></i> Continuous Progress Reports Register
    </div>
    <div class="table-actions">
      <div class="search-box">
        <i class="bi bi-search"></i>
        <input type="text" id="tableSearchInput" class="form-control" placeholder="Search continuous progress reports..." onkeyup="EduTables.search('#mainDataTable', this.value)">
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
          <th>Student Name</th>
          <th>Class & Sec</th>
          <th>Admission No</th>
          <th>Term 1 %</th>
          <th>Term 2 %</th>
          <th>Velocity / Delta</th>
          <th>Co-Scholastic Grade</th>
          <th>Detailed Profile</th>
          <th class="text-center" style="width: 120px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        
        <tr>
          <td><strong>Aarav Sharma</strong></td>
          <td>Class X-A</td>
          <td>ADM-2021-0412</td>
          <td>94.0%</td>
          <td>96.4%</td>
          <td><span class="text-success fw-bold"><i class="bi bi-arrow-up"></i> +2.4%</span></td>
          <td><span class="badge bg-success">Grade A</span></td>
          <td><button class="btn btn-xs btn-light border"><i class="bi bi-eye"></i> Dossier</button></td>
          <td>
            
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', 'progress-reports_download.csv')" title="Download Statement"><i class="bi bi-download"></i></button>
          </div>
          </td>
        </tr>
        <tr>
          <td><strong>Rohan Patel</strong></td>
          <td>Class X-B</td>
          <td>ADM-2021-0435</td>
          <td>81.5%</td>
          <td>85.0%</td>
          <td><span class="text-success fw-bold"><i class="bi bi-arrow-up"></i> +3.5%</span></td>
          <td><span class="badge bg-success">Grade A</span></td>
          <td><button class="btn btn-xs btn-light border"><i class="bi bi-eye"></i> Dossier</button></td>
          <td>
            
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', 'progress-reports_download.csv')" title="Download Statement"><i class="bi bi-download"></i></button>
          </div>
          </td>
        </tr>
        <tr>
          <td><strong>Kavita Shenoy</strong></td>
          <td>Class X-C</td>
          <td>ADM-2021-0452</td>
          <td>76.0%</td>
          <td>74.5%</td>
          <td><span class="text-danger fw-bold"><i class="bi bi-arrow-down"></i> -1.5%</span></td>
          <td><span class="badge bg-primary">Grade B</span></td>
          <td><button class="btn btn-xs btn-light border"><i class="bi bi-eye"></i> Dossier</button></td>
          <td>
            
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', 'progress-reports_download.csv')" title="Download Statement"><i class="bi bi-download"></i></button>
          </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="table-footer">
    <div class="table-info font-size-13 text-muted">
      Showing 1 to 3 of 3 entries (CBSE Academic Cycle 2026-27)
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
        <h5 class="modal-title" id="addNewRecordModalLabel"><i class="bi bi-graph-up-arrow text-primary me-2"></i>Create Record</h5>
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
<div class="modal fade" id="actionToolModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-graph-up-arrow text-primary me-2"></i>Run Operational Process</h5>
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
          <button type="button" class="btn btn-sm btn-primary fw-bold" onclick="alert('Operation initiated successfully! Processing background queue.'); bootstrap.Modal.getInstance(document.getElementById('actionToolModal')).hide();"><i class="bi bi-cpu me-1"></i> Start Execution</button>
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
            <span class="fw-bold text-primary">Continuous Progress Reports</span>
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
