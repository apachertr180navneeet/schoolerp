<?php
/**
 * EDUSYS PRO - Transfer Certificates (TC)
 */
$page_title = "Transfer Certificates (TC)";
$page_desc = "Standard CBSE/State Board format TC generator with serial registry";
$active_module = "students";
$active_submodule = "transfer-certificates.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'transfer-certificates_export.csv')" title="Export Table as CSV">
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
          <h5 class="fw-bold mb-0 text-primary"><i class="bi bi-award me-2"></i> Official School Transfer Certificate (TC) Preview</h5>
          <button class="btn btn-sm btn-primary" onclick="window.print()"><i class="bi bi-printer me-1"></i> Print Formal TC</button>
        </div>
        <div class="printable-document">
          <div class="printable-header">
            <h2>Delhi Public Global Academy</h2>
            <p>Sector 14, Knowledge City, New Delhi - 110075 | Phone: +91 11 2893 4000</p>
            <p>Affiliated to CBSE, New Delhi (Affiliation No: 2130892, School Code: 70142)</p>
            <div class="printable-title-pill">TRANSFER / SCHOOL LEAVING CERTIFICATE</div>
          </div>
          <div class="d-flex justify-content-between font-size-13 mb-3">
            <span><strong>TC Serial No:</strong> DPGA/TC/2024/084</span>
            <span><strong>Admission No:</strong> ADM-8495</span>
          </div>
          <table class="table table-bordered font-size-13">
            <tbody>
              <tr><td style="width: 40%;">1. Name of Pupil</td><td class="fw-bold">Rohan Gupta</td></tr>
              <tr><td>2. Mother's Name</td><td>Mrs. Sunita Gupta</td></tr>
              <tr><td>3. Father's / Guardian's Name</td><td>Mr. Sanjay Gupta</td></tr>
              <tr><td>4. Nationality</td><td>Indian</td></tr>
              <tr><td>5. Date of first admission in the school with class</td><td>04-Apr-2016 in Class 4</td></tr>
              <tr><td>6. Date of Birth according to Admission Register</td><td>14-Jun-2007 (Fourteenth June Two Thousand Seven)</td></tr>
              <tr><td>7. Class in which the pupil last studied</td><td>Class 12 - Senior Secondary</td></tr>
              <tr><td>8. School / Board Annual Examination last taken</td><td>Passed CBSE All India Senior School Certificate Exam</td></tr>
              <tr><td>9. Whether failed, if so once/twice in the same class</td><td>No</td></tr>
              <tr><td>10. Subjects Studied</td><td>English Core, Physics, Chemistry, Mathematics, Physical Education</td></tr>
              <tr><td>11. Month up to which school dues have been paid</td><td>March 2024 (Full Clearance Obtained)</td></tr>
              <tr><td>12. Total No. of working days in the academic session</td><td>218 Days (Student Attended: 204 Days)</td></tr>
              <tr><td>13. General Conduct</td><td>Good and Exemplary</td></tr>
              <tr><td>14. Date of application for certificate</td><td>18-May-2024</td></tr>
              <tr><td>15. Date of issue of certificate</td><td>22-May-2024</td></tr>
              <tr><td>16. Reason for leaving the school</td><td>Passed Class XII Board & Higher Studies</td></tr>
            </tbody>
          </table>
          <div class="d-flex justify-content-between pt-4 mt-4 border-top font-size-13 text-center">
            <div><br><strong>Prepared By</strong></div>
            <div><br><strong>Checked By (Office Supdt)</strong></div>
            <div><br><strong>Principal Signature with School Seal</strong></div>
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
        <th class="sortable">Identifier / Code</th>
        <th class="sortable">Name / Title</th>
        <th>Category / Class</th>
        <th>Responsible / Parent</th>
        <th>Contact / Department</th>
        <th>Academic Session</th>
        <th>Updated Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    
        </thead>
        <tbody>
          
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ED-8491</td>
        <td>
          <div class="table-user-cell">
            <div class="table-avatar">AS</div>
            <div>
              <div class="table-user-name">Aarav Sharma</div>
              <div class="table-user-sub">Class 10 - Section A</div>
            </div>
          </div>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-muted">Rajesh Sharma</small></td>
        <td><small class="text-muted">+91 98112 34567</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">2024-2025</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transfer Certificates (TC)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ED-8492</td>
        <td>
          <div class="table-user-cell">
            <div class="table-avatar">DP</div>
            <div>
              <div class="table-user-name">Diya Patel</div>
              <div class="table-user-sub">Class 10 - Section A</div>
            </div>
          </div>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-muted">Bhavin Patel</small></td>
        <td><small class="text-muted">+91 98223 45678</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">2024-2025</span></td>
        <td><small class="text-muted">27 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transfer Certificates (TC)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ED-8493</td>
        <td>
          <div class="table-user-cell">
            <div class="table-avatar">VS</div>
            <div>
              <div class="table-user-name">Vihaan Singh</div>
              <div class="table-user-sub">Class 10 - Section B</div>
            </div>
          </div>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-muted">Manpreet Singh</small></td>
        <td><small class="text-muted">+91 98334 56789</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">2024-2025</span></td>
        <td><small class="text-muted">26 Oct 2024</small></td>
        <td><span class="badge-status badge-pending">Pending</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transfer Certificates (TC)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ED-8494</td>
        <td>
          <div class="table-user-cell">
            <div class="table-avatar">AI</div>
            <div>
              <div class="table-user-name">Ananya Iyer</div>
              <div class="table-user-sub">Class 10 - Section B</div>
            </div>
          </div>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-muted">R. Venkatesh Iyer</small></td>
        <td><small class="text-muted">+91 98445 67890</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">2024-2025</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transfer Certificates (TC)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ED-8495</td>
        <td>
          <div class="table-user-cell">
            <div class="table-avatar">RG</div>
            <div>
              <div class="table-user-name">Rohan Gupta</div>
              <div class="table-user-sub">Class 12 - Science (PCM)</div>
            </div>
          </div>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-muted">Sanjay Gupta</small></td>
        <td><small class="text-muted">+91 98556 78901</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">2024-2025</span></td>
        <td><small class="text-muted">25 Oct 2024</small></td>
        <td><span class="badge-status badge-inactive">Under Review</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transfer Certificates (TC)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ED-8496</td>
        <td>
          <div class="table-user-cell">
            <div class="table-avatar">IV</div>
            <div>
              <div class="table-user-name">Ishaan Verma</div>
              <div class="table-user-sub">Class 12 - Science (PCB)</div>
            </div>
          </div>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCB)</span></td>
        <td><small class="text-muted">Dr. Alok Verma</small></td>
        <td><small class="text-muted">+91 98667 89012</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">2024-2025</span></td>
        <td><small class="text-muted">24 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transfer Certificates (TC)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ED-8497</td>
        <td>
          <div class="table-user-cell">
            <div class="table-avatar">MR</div>
            <div>
              <div class="table-user-name">Meera Reddy</div>
              <div class="table-user-sub">Class 8 - Section A</div>
            </div>
          </div>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 8 - Section A</span></td>
        <td><small class="text-muted">K. S. Reddy</small></td>
        <td><small class="text-muted">+91 98778 90123</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">2024-2025</span></td>
        <td><small class="text-muted">23 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transfer Certificates (TC)')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ED-8498</td>
        <td>
          <div class="table-user-cell">
            <div class="table-avatar">KS</div>
            <div>
              <div class="table-user-name">Kabir Sengupta</div>
              <div class="table-user-sub">Class 9 - Section C</div>
            </div>
          </div>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Section C</span></td>
        <td><small class="text-muted">Debashis Sengupta</small></td>
        <td><small class="text-muted">+91 98889 01234</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">2024-2025</span></td>
        <td><small class="text-muted">22 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transfer Certificates (TC)')" title="Delete"><i class="bi bi-trash"></i></button>
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