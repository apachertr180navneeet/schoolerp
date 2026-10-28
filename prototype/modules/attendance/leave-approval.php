<?php
/**
 * EDUSYS PRO - LEAVE APPROVAL WORKFLOW
 * Dedicated operational interface & records management for Leave Approval Workflow
 */
$page_title = "Leave Approval Workflow";
$page_desc = "Multi-tiered authorization pipeline: HOD endorsement, HR quota verification, and Principal final sign-off";
$active_module = "attendance";
$active_submodule = "leave-approval.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/attendance/dashboard.php'); ?>">Attendance Management</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-check2-circle text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'leave-approval_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-check2-all me-1"></i> Batch Sanction Leaves
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Requests Pending</h6>
        <div class="kpi-value">7 Applications</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Faculty & Student Queue</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-hourglass-split"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Sanctioned Today</h6>
        <div class="kpi-value">14 Approved</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 100% Substitutions Verified</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-patch-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Quota Balance Audited</h6>
        <div class="kpi-value">100% Checked</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> CL, ML, EL Entitlements</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-wallet2"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Turnaround Speed</h6>
        <div class="kpi-value">Under 2 Hours</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Push Notification Alert</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-lightning-charge-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search request ID, applicant, category, authority...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Request Queues</option>
      <option >Teaching Faculty Requests</option>
      <option >Administrative Staff Leaves</option>
      <option >Senior Student Medical Leaves</option>
      <option >Extended Absence (>3 Days)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Decisions</option>
      <option >Sanctioned & Active</option>
      <option >Under HOD Endorsement</option>
      <option >Awaiting Medical Proof</option>
      <option >Declined</option>
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
        <th>Request ID</th>
        <th>Applicant Name & Role</th>
        <th>Category</th>
        <th>Duration</th>
        <th>Reason / Justification</th>
        <th>Substitute / Relief Covered</th>
        <th>Sanctioning Authority</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REQ-LEV-0148</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Meenakshi Soni (TGT Hindi)</div>
          <small class="text-muted font-size-11">Emp #FAC-007</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Casual Leave (CL)</span></td>
        <td><small class="text-dark">1 Day (Today)</small></td>
        <td><small class="text-muted font-mono font-size-12">Personal Family Matter</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Relief Assigned (Deepak & Shalini)</span></td>
        <td><small class="text-muted">Dr. Ananya Roy (Principal)</small></td>
        <td><span class="badge-status badge-active">Sanctioned</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Leave Approval Workflow')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REQ-LEV-0147</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Kunal Bansal (PGT CS)</div>
          <small class="text-muted font-size-11">Emp #FAC-008</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Medical Leave (ML)</span></td>
        <td><small class="text-dark">2 Days (28-29 Oct)</small></td>
        <td><small class="text-muted font-mono font-size-12">Viral Fever & Doctor Advised Rest</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Relief Assigned (Dr. Sharma & Kaul)</span></td>
        <td><small class="text-muted">Dr. Ananya Roy (Principal)</small></td>
        <td><span class="badge-status badge-active">Sanctioned</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Leave Approval Workflow')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REQ-LEV-0146</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Radhika Iyer (PGT Bio)</div>
          <small class="text-muted font-size-11">Emp #FAC-004</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Earned Leave (EL)</span></td>
        <td><small class="text-dark">5 Days (04-08 Nov)</small></td>
        <td><small class="text-muted font-mono font-size-12">Family Overseas Travel</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Relief Schedule Under Verification</span></td>
        <td><small class="text-muted">Vice Principal Desk</small></td>
        <td><span class="badge-status badge-pending">In Verification</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Leave Approval Workflow')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REQ-LEV-0145</td>
        <td>
          <div class="fw-semibold text-dark">Mr. M. K. Chawla (PGT Comm)</div>
          <small class="text-muted font-size-11">Emp #FAC-009</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Casual Leave (CL)</span></td>
        <td><small class="text-dark">1 Day (05 Nov)</small></td>
        <td><small class="text-muted font-mono font-size-12">Bank / Tax Audit Presence</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Relief Schedule Verified</span></td>
        <td><small class="text-muted">Vice Principal Desk</small></td>
        <td><span class="badge-status badge-pending">In Verification</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Leave Approval Workflow')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REQ-LEV-0144</td>
        <td>
          <div class="fw-semibold text-dark">Karan Saxena (Student)</div>
          <small class="text-muted font-size-11">Adm #2491 (Class 9-C)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Student Medical Leave</span></td>
        <td><small class="text-dark">5 Days (26-30 Oct)</small></td>
        <td><small class="text-muted font-mono font-size-12">Viral Infection & Recovery</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Infirmary Doctor Cleared</span></td>
        <td><small class="text-muted">Class Teacher Approved</small></td>
        <td><span class="badge-status badge-active">Sanctioned</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Leave Approval Workflow')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REQ-LEV-0143</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Saxena (Student)</div>
          <small class="text-muted font-size-11">Adm #4921 (Class 7)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Student Medical Leave</span></td>
        <td><small class="text-dark">2 Days (29-30 Oct)</small></td>
        <td><small class="text-muted font-mono font-size-12">Dental Oral Surgery</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Medical Prescription Uploaded</span></td>
        <td><small class="text-muted">Class Teacher Review</small></td>
        <td><span class="badge-status badge-pending">In Verification</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Leave Approval Workflow')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REQ-LEV-0142</td>
        <td>
          <div class="fw-semibold text-dark">Varun Dhawan (Student)</div>
          <small class="text-muted font-size-11">Adm #3920 (Class 12)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Sports Duty Exemption</span></td>
        <td><small class="text-dark">10 Days (24 Oct-02 Nov)</small></td>
        <td><small class="text-muted font-mono font-size-12">National Tennis Tour Tournament</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Sports HOD Endorsement</span></td>
        <td><small class="text-muted">Dr. Ananya Roy (Principal)</small></td>
        <td><span class="badge-status badge-active">Sanctioned</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Leave Approval Workflow')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">REQ-LEV-0141</td>
        <td>
          <div class="fw-semibold text-dark">Aditya Roy Kapur (Student)</div>
          <small class="text-muted font-size-11">Adm #9482 (Class 9)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Family Pilgrimage</span></td>
        <td><small class="text-dark">5 Days (28 Oct-01 Nov)</small></td>
        <td><small class="text-muted font-mono font-size-12">Religious Function in Tirupati</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Leave Letter Signed by Parent</span></td>
        <td><small class="text-muted">Secondary Wing Head</small></td>
        <td><span class="badge-status badge-pending">In Verification</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Leave Approval Workflow')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
