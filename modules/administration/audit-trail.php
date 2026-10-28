<?php
/**
 * EDUSYS PRO - AUDIT TRAIL
 * Dedicated operational interface & records management for Audit Trail
 */
$page_title = "Audit Trail";
$page_desc = "Immutable forensic audit trail of critical operational actions: fee adjustments, grade modifications, and TC discharges";
$active_module = "administration";
$active_submodule = "audit-trail.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/administration/school-profile.php'); ?>">Administration & Setup</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-fingerprint text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Audited Actions</h6>
        <div class="kpi-value">148 Critical Events</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Zero-Tampering Ledger</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-fingerprint"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Fee Waivers Approved</h6>
        <div class="kpi-value">12 Concessions</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Principal Certified</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cash-coin"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Marks Modifications</h6>
        <div class="kpi-value">4 Re-evaluations</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> HOD Verified Overrides</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-pencil-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Compliance Score</h6>
        <div class="kpi-value">100% Certified</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Statutory CBSE Standard</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-patch-check-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search audit ID, officer, entity...">
    </div>
    <select class="form-select" style="max-width: 240px;">
      <option selected>All Audit Domains</option>
      <option >Financial Concessions & Waivers</option>
      <option >Examination Marks Modification</option>
      <option >Student Discharges & TC Issuance</option>
      <option >System Security & Permission Grants</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Verified & Retained</option>
      <option >Requires Management Counter-Sign</option>
      <option >Audit Flagged</option>
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
        <th>Audit ID #</th>
        <th>Operational Domain</th>
        <th>Critical Action Performed</th>
        <th>Authorizing Officer</th>
        <th>Previous State / Value</th>
        <th>New Sanctioned State</th>
        <th>Audit Timestamp</th>
        <th>Compliance</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">AUD-2024-0148</td>
        <td>
          <div class="fw-semibold text-dark">Fee Concession</div>
          <small class="text-muted font-size-11">15% Sibling Discount Granted</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Student: Saanvi Reddy (Cl 6)</span></td>
        <td><small class="text-dark">Dr. Ananya Roy (Principal)</small></td>
        <td><small class="text-muted font-mono font-size-12">Gross Fee: ₹26,800 / Term</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Discounted Fee: ₹22,780 / Term</span></td>
        <td><small class="text-muted">28 Oct 2024 (08:45 AM)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">AUD-2024-0147</td>
        <td>
          <div class="fw-semibold text-dark">Marks Re-evaluation</div>
          <small class="text-muted font-size-11">Class 10-A Science Periodic Test 1</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Student: Vihaan Singh (Roll #03)</span></td>
        <td><small class="text-dark">Dr. Alok Verma (Science Dean)</small></td>
        <td><small class="text-muted font-mono font-size-12">Previous Score: 18 / 25</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Re-evaluated Score: 21 / 25</span></td>
        <td><small class="text-muted">27 Oct 2024 (03:15 PM)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">AUD-2024-0146</td>
        <td>
          <div class="fw-semibold text-dark">Transfer Certificate</div>
          <small class="text-muted font-size-11">Official TC Generation & Discharge</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Student: Tushar Sengupta (Cl 8-B)</span></td>
        <td><small class="text-dark">Dr. Ananya Roy (Principal)</small></td>
        <td><small class="text-muted font-mono font-size-12">Status: Enrolled Active</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Status: Discharged / TC #8412</span></td>
        <td><small class="text-muted">26 Oct 2024 (11:20 AM)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">AUD-2024-0145</td>
        <td>
          <div class="fw-semibold text-dark">Security Role Change</div>
          <small class="text-muted font-size-11">Elevated User Permission Grant</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">User: Suresh Chawla (Accountant)</span></td>
        <td><small class="text-dark">Vikram Malhotra (IT Director)</small></td>
        <td><small class="text-muted font-mono font-size-12">Role: Standard Cashier</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Role: Chief Accounts Officer</span></td>
        <td><small class="text-muted">25 Oct 2024 (02:00 PM)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">AUD-2024-0144</td>
        <td>
          <div class="fw-semibold text-dark">Caution Deposit Refund</div>
          <small class="text-muted font-size-11">Discharged Student Caution Return</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Student: Ananya Dixit (Cl 5-A)</span></td>
        <td><small class="text-dark">Suresh Chawla (Accounts)</small></td>
        <td><small class="text-muted font-mono font-size-12">Caution Held: ₹15,000</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">NEFT Transferred: ₹15,000</span></td>
        <td><small class="text-muted">24 Oct 2024 (10:15 AM)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">AUD-2024-0143</td>
        <td>
          <div class="fw-semibold text-dark">Grade Subject Mapping</div>
          <small class="text-muted font-size-11">Added AI Vocational Elective</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 Core Curriculum</span></td>
        <td><small class="text-dark">Dean Academics</small></td>
        <td><small class="text-muted font-mono font-size-12">5 Subjects Mapped</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">6 Subjects Mapped (Added AI)</span></td>
        <td><small class="text-muted">23 Oct 2024 (04:30 PM)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">AUD-2024-0142</td>
        <td>
          <div class="fw-semibold text-dark">Late Fee Waiver</div>
          <small class="text-muted font-size-11">Medical Exemption Late Fee Waiver</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Student: Kabir Mehta (Cl 3-A)</span></td>
        <td><small class="text-dark">Dr. Ananya Roy (Principal)</small></td>
        <td><small class="text-muted font-mono font-size-12">Fine Due: ₹650</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Fine Waived: ₹0 (Medical Proof)</span></td>
        <td><small class="text-muted">22 Oct 2024 (01:15 PM)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">AUD-2024-0141</td>
        <td>
          <div class="fw-semibold text-dark">Class Section Allocation</div>
          <small class="text-muted font-size-11">Section Capacity Expansion</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 Section A Capacity</span></td>
        <td><small class="text-dark">Dean Academics</small></td>
        <td><small class="text-muted font-mono font-size-12">Capacity: 35 Students</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Expanded Capacity: 38 Students</span></td>
        <td><small class="text-muted">21 Oct 2024 (11:00 AM)</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
