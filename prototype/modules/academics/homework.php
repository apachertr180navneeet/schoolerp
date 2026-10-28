<?php
/**
 * EDUSYS PRO - HOMEWORK MANAGEMENT
 * Dedicated operational interface & records management for Homework Management
 */
$page_title = "Homework Management";
$page_desc = "Daily homework assignments, estimated time caps (Max 90 mins/day), mobile notifications, and submission rates";
$active_module = "academics";
$active_submodule = "homework.php";
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
    <h1><i class="bi bi-house-door-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'homework_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Assign Homework
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Active Tasks</h6>
        <div class="kpi-value">24 Assignments</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Balanced Across Classes</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-journal-bookmark"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Submission Rate</h6>
        <div class="kpi-value">94.6% On Time</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Portal & Notebooks</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-circle"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Daily Homework Cap</h6>
        <div class="kpi-value">Under 90 Mins</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> NEP Guideline Compliant</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-stopwatch-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Parent App Sync</h6>
        <div class="kpi-value">100% Real-time</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Mobile Notifications Sent</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-phone-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search HW ref #, subject, topic, class, date...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Grades</option>
      <option >Class 10 - Secondary</option>
      <option >Class 12 - Senior Secondary</option>
      <option >Class 8 - Middle Wing</option>
      <option >Class 5 - Primary Wing</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active (Submission Open)</option>
      <option >Closed / Evaluated</option>
      <option >Extended Deadline</option>
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
        <th>HW Ref #</th>
        <th>Subject & Topic</th>
        <th>Class & Section</th>
        <th>Submission Deadline</th>
        <th>Estimated Time (Mins)</th>
        <th>Portal / App Status</th>
        <th>Submissions Received</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HW-2024-1048</td>
        <td>
          <div class="fw-semibold text-dark">Mathematics: Ex 8.2 Q6-10</div>
          <small class="text-muted font-size-11">Trigonometric Values Evaluation</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">Tomorrow (29 Oct 07:30 AM)</small></td>
        <td><small class="text-muted font-mono font-size-12">25 Mins</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Synced to Parent App</span></td>
        <td><small class="text-muted">38 of 40 Submitted</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Homework Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HW-2024-1047</td>
        <td>
          <div class="fw-semibold text-dark">Physics: Numerical Problems 4.12-4.14</div>
          <small class="text-muted font-size-11">Ampere Law Applications</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-dark">30 Oct 2024 (07:30 AM)</small></td>
        <td><small class="text-muted font-mono font-size-12">35 Mins</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Synced to Parent App</span></td>
        <td><small class="text-muted">32 of 35 Submitted</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Homework Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HW-2024-1046</td>
        <td>
          <div class="fw-semibold text-dark">English: Character Sketch Essay</div>
          <small class="text-muted font-size-11">Madam Rides the Bus (Valli)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">30 Oct 2024 (07:30 AM)</small></td>
        <td><small class="text-muted font-mono font-size-12">20 Mins</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Synced to Parent App</span></td>
        <td><small class="text-muted">39 of 40 Submitted</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Homework Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HW-2024-1045</td>
        <td>
          <div class="fw-semibold text-dark">Chemistry: Isomerism Worksheet #4</div>
          <small class="text-muted font-size-11">Coordination Compounds</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM/B)</span></td>
        <td><small class="text-dark">31 Oct 2024 (07:30 AM)</small></td>
        <td><small class="text-muted font-mono font-size-12">30 Mins</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Synced to Parent App</span></td>
        <td><small class="text-muted">62 of 67 Submitted</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Homework Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HW-2024-1044</td>
        <td>
          <div class="fw-semibold text-dark">Biology: Antibody Structure Diagram</div>
          <small class="text-muted font-size-11">Colored Labelled Sketch</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCB)</span></td>
        <td><small class="text-dark">29 Oct 2024 (07:30 AM)</small></td>
        <td><small class="text-muted font-mono font-size-12">20 Mins</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Synced to Parent App</span></td>
        <td><small class="text-muted">31 of 32 Submitted</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Homework Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HW-2024-1043</td>
        <td>
          <div class="fw-semibold text-dark">Social Science: Indian Map Plotting</div>
          <small class="text-muted font-size-11">Nationalist Movement Locations</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">30 Oct 2024 (07:30 AM)</small></td>
        <td><small class="text-muted font-mono font-size-12">20 Mins</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Synced to Parent App</span></td>
        <td><small class="text-muted">37 of 38 Submitted</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Homework Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HW-2024-1042</td>
        <td>
          <div class="fw-semibold text-dark">Accountancy: Problem 14-16</div>
          <small class="text-muted font-size-11">Calls in Arrears Ledger</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Commerce</span></td>
        <td><small class="text-dark">31 Oct 2024 (07:30 AM)</small></td>
        <td><small class="text-muted font-mono font-size-12">30 Mins</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Synced to Parent App</span></td>
        <td><small class="text-muted">34 of 36 Submitted</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Homework Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HW-2024-1041</td>
        <td>
          <div class="fw-semibold text-dark">CS: SQL Query Practice Set</div>
          <small class="text-muted font-size-11">Aggregate Functions on Tables</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-dark">30 Oct 2024 (07:30 AM)</small></td>
        <td><small class="text-muted font-mono font-size-12">25 Mins</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Synced to Parent App</span></td>
        <td><small class="text-muted">35 of 35 Submitted</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Homework Management')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
