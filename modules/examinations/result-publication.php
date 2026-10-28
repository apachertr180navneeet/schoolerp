<?php
/**
 * EDUSYS PRO - Result Publication
 */
$page_title = "Result Publication";
$page_desc = "Secure portal and SMS result release to parents";
$active_module = "examinations";
$active_submodule = "result-publication.php";
$depth = 2;

require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/sidebar.php';
require_once __DIR__ . '/../../includes/topbar.php';
?>

<!-- Page Header Box -->
<div class="page-header-box">
  <div class="page-title-group">
    <h1><i class="bi bi-check2-circle text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'result-publication_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Add New Record
    </button>
  </div>
</div>

<div class="row g-3 mb-4">
      <div class="col-6 col-md-3">
        <div class="kpi-card kpi-primary">
          <div class="kpi-info">
            <h6>Total Entries</h6>
            <div class="kpi-value">1,482</div>
            <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Synced</div>
          </div>
          <div class="kpi-icon"><i class="bi bi-collection-fill"></i></div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="kpi-card kpi-success">
          <div class="kpi-info">
            <h6>Active / Verified</h6>
            <div class="kpi-value">1,390</div>
            <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 94% Approved</div>
          </div>
          <div class="kpi-icon"><i class="bi bi-patch-check-fill"></i></div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="kpi-card kpi-warning">
          <div class="kpi-info">
            <h6>Pending Review</h6>
            <div class="kpi-value">68</div>
            <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> In Workflow</div>
          </div>
          <div class="kpi-icon"><i class="bi bi-hourglass-split"></i></div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="kpi-card kpi-info">
          <div class="kpi-info">
            <h6>Board Compliant</h6>
            <div class="kpi-value">100%</div>
            <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> CBSE Validated</div>
          </div>
          <div class="kpi-icon"><i class="bi bi-award-fill"></i></div>
        </div>
      </div>
    </div>
  
    
    
    <div class="table-filter-bar">
      <div class="table-filter-left">
        <div class="table-search-input">
          <i class="bi bi-search"></i>
          <input type="text" class="form-control" id="tableSearchInput" placeholder="Search by name, code, reference ID, category...">
        </div>
        <select class="form-select" style="max-width: 170px;">
          <option selected>All Classes</option>
          <option>Class 10-A</option>
          <option>Class 10-B</option>
          <option>Class 12-A (PCM)</option>
          <option>Class 12-B (PCB)</option>
          <option>Class 12-C (Comm)</option>
        </select>
        <select class="form-select" style="max-width: 150px;">
          <option selected>All Status</option>
          <option>Active / Paid</option>
          <option>Pending</option>
          <option>Approved</option>
        </select>
      </div>

      <div class="table-filter-right">
        <span class="font-size-13 text-muted">Showing <strong class="table-visible-count text-primary">8</strong> records</span>
      </div>
    </div>
  
    
    <div class="erp-table-responsive mb-0">
      <table class="erp-table" id="mainDataTable">
        <thead>
          
      <tr>
        <th class="sortable">Exam / Test Code</th>
        <th class="sortable">Subject & Title</th>
        <th>Class / Stream</th>
        <th>Date & Time</th>
        <th>Total Marks</th>
        <th>Average Score</th>
        <th>Evaluator</th>
        <th>Result Status</th>
        <th class="text-center">Actions</th>
      </tr>
    
        </thead>
        <tbody>
          
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EX-10-MAT-T2</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Mathematics (Standard - 041)</div>
          <small class="text-muted">CBSE Board Code Matrix</small>
        </td>
        <td><span class="badge bg-light text-muted border">Class 10 (A, B, C)</span></td>
        <td><small class="text-muted">24 Nov 2024 • 09:30 AM</small></td>
        <td class="fw-semibold">80 Marks</td>
        <td class="fw-bold text-success font-size-13">64.2 / 80 (80.2%)</td>
        <td><small class="text-muted">Rajesh Kulkarni</small></td>
        <td><span class="badge-status badge-approved">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Marks"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Result Publication')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EX-10-SCI-T2</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Science (Theory - 086)</div>
          <small class="text-muted">CBSE Board Code Matrix</small>
        </td>
        <td><span class="badge bg-light text-muted border">Class 10 (A, B, C)</span></td>
        <td><small class="text-muted">26 Nov 2024 • 09:30 AM</small></td>
        <td class="fw-semibold">80 Marks</td>
        <td class="fw-bold text-success font-size-13">61.8 / 80 (77.2%)</td>
        <td><small class="text-muted">Vikram Rathore</small></td>
        <td><span class="badge-status badge-approved">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Marks"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Result Publication')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EX-10-ENG-T2</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">English Language & Literature</div>
          <small class="text-muted">CBSE Board Code Matrix</small>
        </td>
        <td><span class="badge bg-light text-muted border">Class 10 (A, B, C)</span></td>
        <td><small class="text-muted">28 Nov 2024 • 09:30 AM</small></td>
        <td class="fw-semibold">80 Marks</td>
        <td class="fw-bold text-success font-size-13">68.5 / 80 (85.6%)</td>
        <td><small class="text-muted">Priya Nambiar</small></td>
        <td><span class="badge-status badge-approved">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Marks"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Result Publication')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EX-12-PHY-T2</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Physics (Theory - 042)</div>
          <small class="text-muted">CBSE Board Code Matrix</small>
        </td>
        <td><span class="badge bg-light text-muted border">Class 12 (Science)</span></td>
        <td><small class="text-muted">29 Nov 2024 • 09:30 AM</small></td>
        <td class="fw-semibold">70 Marks</td>
        <td class="fw-bold text-success font-size-13">52.4 / 70 (74.8%)</td>
        <td><small class="text-muted">Vikram Rathore</small></td>
        <td><span class="badge-status badge-review">In Evaluation</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Marks"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Result Publication')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EX-12-CHE-T2</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Chemistry (Theory - 043)</div>
          <small class="text-muted">CBSE Board Code Matrix</small>
        </td>
        <td><span class="badge bg-light text-muted border">Class 12 (Science)</span></td>
        <td><small class="text-muted">02 Dec 2024 • 09:30 AM</small></td>
        <td class="fw-semibold">70 Marks</td>
        <td class="fw-bold text-success font-size-13">54.1 / 70 (77.2%)</td>
        <td><small class="text-muted">Dr. Shalini Kapoor</small></td>
        <td><span class="badge-status badge-review">In Evaluation</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Marks"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Result Publication')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EX-12-ACC-T2</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Accountancy (055)</div>
          <small class="text-muted">CBSE Board Code Matrix</small>
        </td>
        <td><span class="badge bg-light text-muted border">Class 12 (Commerce)</span></td>
        <td><small class="text-muted">02 Dec 2024 • 09:30 AM</small></td>
        <td class="fw-semibold">80 Marks</td>
        <td class="fw-bold text-success font-size-13">62.0 / 80 (77.5%)</td>
        <td><small class="text-muted">Anjali Saxena</small></td>
        <td><span class="badge-status badge-approved">Published</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Marks"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Result Publication')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EX-10-SST-T2</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Social Science (087)</div>
          <small class="text-muted">CBSE Board Code Matrix</small>
        </td>
        <td><span class="badge bg-light text-muted border">Class 10 (A, B, C)</span></td>
        <td><small class="text-muted">04 Dec 2024 • 09:30 AM</small></td>
        <td class="fw-semibold">80 Marks</td>
        <td class="fw-bold text-success font-size-13">63.5 / 80 (79.3%)</td>
        <td><small class="text-muted">K. L. Sharma</small></td>
        <td><span class="badge-status badge-waiting">Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Marks"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Result Publication')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EX-12-CSC-T2</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Computer Science (083)</div>
          <small class="text-muted">CBSE Board Code Matrix</small>
        </td>
        <td><span class="badge bg-light text-muted border">Class 12 (Science)</span></td>
        <td><small class="text-muted">06 Dec 2024 • 09:30 AM</small></td>
        <td class="fw-semibold">70 Marks</td>
        <td class="fw-bold text-success font-size-13">59.2 / 70 (84.5%)</td>
        <td><small class="text-muted">Amitabh Banerjee</small></td>
        <td><span class="badge-status badge-waiting">Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Marks"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Result Publication')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="erp-pagination-bar">
      <div class="pagination-info">
        Showing 1 to 8 of 1,482 entries
      </div>
      <ul class="pagination-custom">
        <li class="page-item disabled"><a class="page-link" href="#"><i class="bi bi-chevron-left"></i></a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">...</a></li>
        <li class="page-item"><a class="page-link" href="#">185</a></li>
        <li class="page-item"><a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a></li>
      </ul>
    </div>
  
  

      

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>