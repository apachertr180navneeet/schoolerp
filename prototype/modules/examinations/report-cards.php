<?php
/**
 * EDUSYS PRO - CBSE Report Cards Generator
 */
$page_title = "CBSE Report Cards Generator";
$page_desc = "Official print-ready CBSE Holistic Progress Cards (HPC)";
$active_module = "examinations";
$active_submodule = "report-cards.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'report-cards_export.csv')" title="Export Table as CSV">
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
  
    
      <div class="card border mb-4 p-4 bg-white shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="fw-bold mb-0 text-primary"><i class="bi bi-file-earmark-bar-graph me-2"></i> Official CBSE Holistic Progress Card (Print Preview)</h5>
          <button class="btn btn-sm btn-primary" onclick="window.print()"><i class="bi bi-printer me-1"></i> Print Official Report Card</button>
        </div>
        <div class="printable-document">
          <div class="printable-header">
            <h2>Delhi Public Global Academy</h2>
            <p>Affiliated to CBSE, New Delhi (Affiliation No: 2130892, School Code: 70142)</p>
            <p>Sector 14, Knowledge City, New Delhi - 110075 | info@dpglobalacademy.edu.in</p>
            <div class="printable-title-pill">HOLISTIC PROGRESS CARD • ACADEMIC SESSION 2024-2025</div>
          </div>
          <div class="row g-2 mb-3 font-size-13">
            <div class="col-6"><strong>Student Name:</strong> Aarav Sharma</div>
            <div class="col-6"><strong>Admission No:</strong> ADM-8491</div>
            <div class="col-6"><strong>Class & Section:</strong> Class 10 - Section A</div>
            <div class="col-6"><strong>Roll Number:</strong> 01</div>
            <div class="col-6"><strong>Father's Name:</strong> Rajesh Sharma</div>
            <div class="col-6"><strong>APAAR ID:</strong> APAAR-8941-0294-1182</div>
          </div>
          <table class="table table-bordered font-size-13 mb-3">
            <thead class="table-light">
              <tr>
                <th>Scholastic Subject</th>
                <th>Periodic Test (10)</th>
                <th>Notebook (5)</th>
                <th>Enrichment (5)</th>
                <th>Term Exam (80)</th>
                <th>Total (100)</th>
                <th>Grade</th>
              </tr>
            </thead>
            <tbody>
              <tr><td>English Language & Literature</td><td>9.5</td><td>4.8</td><td>4.8</td><td>72.0</td><td><strong>91.1</strong></td><td><span class="badge bg-success">A1</span></td></tr>
              <tr><td>Mathematics (Standard)</td><td>9.0</td><td>4.5</td><td>4.7</td><td>68.5</td><td><strong>86.7</strong></td><td><span class="badge bg-success">A2</span></td></tr>
              <tr><td>Science (Theory & Practical)</td><td>9.2</td><td>4.8</td><td>4.6</td><td>71.0</td><td><strong>89.6</strong></td><td><span class="badge bg-success">A2</span></td></tr>
              <tr><td>Social Science</td><td>9.4</td><td>4.7</td><td>4.8</td><td>74.0</td><td><strong>92.9</strong></td><td><span class="badge bg-success">A1</span></td></tr>
              <tr><td>Computer Applications / AI</td><td>10.0</td><td>5.0</td><td>5.0</td><td>78.0</td><td><strong>98.0</strong></td><td><span class="badge bg-success">A1</span></td></tr>
            </tbody>
          </table>
          <div class="d-flex justify-content-between pt-4 mt-4 border-top font-size-13 text-center">
            <div><br><strong>Class Teacher Signature</strong></div>
            <div><br><strong>Examination Incharge</strong></div>
            <div><br><strong>Principal Signature & Seal</strong></div>
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
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'CBSE Report Cards Generator')" title="Delete"><i class="bi bi-trash"></i></button>
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
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'CBSE Report Cards Generator')" title="Delete"><i class="bi bi-trash"></i></button>
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
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'CBSE Report Cards Generator')" title="Delete"><i class="bi bi-trash"></i></button>
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
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'CBSE Report Cards Generator')" title="Delete"><i class="bi bi-trash"></i></button>
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
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'CBSE Report Cards Generator')" title="Delete"><i class="bi bi-trash"></i></button>
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
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'CBSE Report Cards Generator')" title="Delete"><i class="bi bi-trash"></i></button>
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
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'CBSE Report Cards Generator')" title="Delete"><i class="bi bi-trash"></i></button>
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
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'CBSE Report Cards Generator')" title="Delete"><i class="bi bi-trash"></i></button>
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