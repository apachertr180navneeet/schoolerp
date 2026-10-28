<?php
/**
 * EDUSYS PRO - Salary Structures
 */
$page_title = "Salary Structures";
$page_desc = "Dedicated operational interface & records management for Salary Structures";
$active_module = "hr-payroll";
$active_submodule = "salary-structures.php";
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
      <li class="breadcrumb-item"><?php echo htmlspecialchars($active_module); ?></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-layers text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'salary-structures_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Add New Record
    </button>
  </div>
</div>


<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Total Staff</h6>
        <div class="kpi-value">190 Members</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 148 Teaching, 42 Support</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Monthly Payroll</h6>
        <div class="kpi-value">₹ 1.18 Cr</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> October Disbursed</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cash-stack"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>PF & ESIC Status</h6>
        <div class="kpi-value">100% Deposited</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> EPFO Challans Generated</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Staff On Duty</h6>
        <div class="kpi-value">186 / 190</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> 4 on Approved Leave</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-check-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search staff name, employee ID, department...">
    </div>
    <select class="form-select" style="max-width: 200px;">
      <option selected>All Departments</option>
      <option >Science & Technology</option>
      <option >Mathematics</option>
      <option >Languages</option>
      <option >Commerce & Eco</option>
      <option >Administration</option>
      <option >Information Technology</option>
    </select>
    <select class="form-select" style="max-width: 150px;">
      <option selected>All Status</option>
      <option>Active / Verified</option>
      <option>In Review</option>
      <option>Approved</option>
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
        <th>Emp Code</th>
        <th>Staff Full Name & Title</th>
        <th>Department</th>
        <th>Designation</th>
        <th>Highest Qualification</th>
        <th>Experience</th>
        <th>Contact Phone</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-1001</td>
        <td>
          <div class="fw-semibold text-dark">Dr. Sunita Rao</div>
          <small class="text-muted font-size-11">Ph.D. Education</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Administration</span></td>
        <td><small class="text-dark">Principal & Head of School</small></td>
        <td><small class="text-muted font-mono font-size-12">M.Sc. (Physics), M.Ed., Ph.D.</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">24 Years</span></td>
        <td><small class="text-muted">+91 11 2893 4005</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Salary Structures')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-1002</td>
        <td>
          <div class="fw-semibold text-dark">Vikram Rathore</div>
          <small class="text-muted font-size-11">PGT Physics Lead</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Science & Tech</span></td>
        <td><small class="text-dark">PGT Physics (Sr Supervisor)</small></td>
        <td><small class="text-muted font-mono font-size-12">M.Sc. (Physics), B.Ed.</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">21 Years</span></td>
        <td><small class="text-muted">+91 98711 22334</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Salary Structures')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-1003</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Priya Nambiar</div>
          <small class="text-muted font-size-11">PGT English Lead</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Languages</span></td>
        <td><small class="text-dark">PGT English (Class 10A Incharge)</small></td>
        <td><small class="text-muted font-mono font-size-12">M.A. (English), B.Ed.</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">16 Years</span></td>
        <td><small class="text-muted">+91 99110 55441</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Salary Structures')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-1004</td>
        <td>
          <div class="fw-semibold text-dark">Mr. S. K. Rastogi</div>
          <small class="text-muted font-size-11">TGT Mathematics</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mathematics</span></td>
        <td><small class="text-dark">TGT Math (Middle Supervisor)</small></td>
        <td><small class="text-muted font-mono font-size-12">M.Sc. (Math), M.Ed.</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">17 Years</span></td>
        <td><small class="text-muted">+91 98118 66772</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Salary Structures')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-1005</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Nandini Mathur</div>
          <small class="text-muted font-size-11">PGT Biology</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Science & Tech</span></td>
        <td><small class="text-dark">Senior Wing Supervisor</small></td>
        <td><small class="text-muted font-mono font-size-12">M.Sc. (Botany), B.Ed.</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">19 Years</span></td>
        <td><small class="text-muted">+91 98113 77889</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Salary Structures')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-1006</td>
        <td>
          <div class="fw-semibold text-dark">Mr. M. K. Sharma</div>
          <small class="text-muted font-size-11">Chief Accountant</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Administration</span></td>
        <td><small class="text-dark">Chief Accounts Officer</small></td>
        <td><small class="text-muted font-mono font-size-12">M.Com, Inter-CA</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">22 Years</span></td>
        <td><small class="text-muted">+91 11 2893 4022</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Salary Structures')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-1007</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Anjali Saxena</div>
          <small class="text-muted font-size-11">HR Lead & POCSO</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Administration</span></td>
        <td><small class="text-dark">Human Resources Lead</small></td>
        <td><small class="text-muted font-mono font-size-12">MBA (HR), PGD-POCSO</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">14 Years</span></td>
        <td><small class="text-muted">+91 98101 44552</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Salary Structures')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EMP-1008</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Rohit Ganguly</div>
          <small class="text-muted font-size-11">Computer Science</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Information Technology</span></td>
        <td><small class="text-dark">Head of IT & STEM</small></td>
        <td><small class="text-muted font-mono font-size-12">M.Tech (Computer Science)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">14 Years</span></td>
        <td><small class="text-muted">+91 98714 55663</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Salary Structures')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>


<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
