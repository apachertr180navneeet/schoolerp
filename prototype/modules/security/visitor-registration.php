<?php
/**
 * EDUSYS PRO - Visitor Registration
 */
$page_title = "Visitor Registration";
$page_desc = "Dedicated operational interface & records management for Visitor Registration";
$active_module = "security";
$active_submodule = "visitor-registration.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'visitor-registration_export.csv')" title="Export Table as CSV">
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
        <h6>Visitors Today</h6>
        <div class="kpi-value">42 Visitors</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> All ID Badges Issued</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-badge-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Checked Out</h6>
        <div class="kpi-value">36 / 42</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 6 Active on Campus</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-door-closed-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>CCTV Cameras</h6>
        <div class="kpi-value">148 / 148 Live</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> 100% Perimeter Health</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-camera-video-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Security Guards</h6>
        <div class="kpi-value">16 on Shift</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> 3 Main Gates Manned</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-shaded"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search visitor name, gate pass #, person to meet...">
    </div>
    <select class="form-select" style="max-width: 200px;">
      <option selected>All Gate Passes</option>
      <option >Currently on Campus (Active)</option>
      <option >Checked Out (Concluded)</option>
      <option >Parent Consultation</option>
      <option >Vendor / Supplier Entry</option>
      <option >Govt / Education Dept</option>
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
        <th>Pass / Token #</th>
        <th>Visitor Full Name & Org</th>
        <th>Person to Meet</th>
        <th>Purpose of Visit</th>
        <th>Check-In Time</th>
        <th>Check-Out Time</th>
        <th>Contact Phone</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">GP-2024-0412</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Rajan Narang</div>
          <small class="text-muted font-size-11">Aarav Narang Father</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Dr. Sunita Rao (Principal)</span></td>
        <td><small class="text-dark">Fee Structure Clarification</small></td>
        <td><small class="text-muted font-mono font-size-12">09:30 AM</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">10:15 AM</span></td>
        <td><small class="text-muted">+91 98112 88990</small></td>
        <td><span class="badge-status badge-active">Checked Out</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Visitor Registration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">GP-2024-0413</td>
        <td>
          <div class="fw-semibold text-dark">Ms. Shalini Gupta</div>
          <small class="text-muted font-size-11">Oxford University Press</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Mrs. Priya Nambiar (HOD)</span></td>
        <td><small class="text-dark">Annual Textbook Review</small></td>
        <td><small class="text-muted font-mono font-size-12">10:00 AM</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">11:30 AM</span></td>
        <td><small class="text-muted">+91 98223 99001</small></td>
        <td><span class="badge-status badge-active">Checked Out</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Visitor Registration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">GP-2024-0414</td>
        <td>
          <div class="fw-semibold text-dark">Inspector V. K. Yadav</div>
          <small class="text-muted font-size-11">Delhi Fire Services</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Estate Manager (Transport)</span></td>
        <td><small class="text-dark">Hydrant Pressure Inspection</small></td>
        <td><small class="text-muted font-mono font-size-12">11:15 AM</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">--</span></td>
        <td><small class="text-muted">+91 11 2341 5566</small></td>
        <td><span class="badge-status badge-pending">On Campus (Active)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Visitor Registration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">GP-2024-0415</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Geeta Mehra</div>
          <small class="text-muted font-size-11">Parent (Class 8-A)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class Teacher (8A)</span></td>
        <td><small class="text-dark">PTM Prior Appointment</small></td>
        <td><small class="text-muted font-mono font-size-12">11:45 AM</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">--</span></td>
        <td><small class="text-muted">+91 98445 11223</small></td>
        <td><span class="badge-status badge-pending">On Campus (Active)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Visitor Registration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">GP-2024-0416</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Satish Verma</div>
          <small class="text-muted font-size-11">Dell Technologies Support</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Rohit Ganguly (IT Head)</span></td>
        <td><small class="text-dark">Server Maintenance AMC</small></td>
        <td><small class="text-muted font-mono font-size-12">12:10 PM</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">--</span></td>
        <td><small class="text-muted">+91 98556 22334</small></td>
        <td><span class="badge-status badge-pending">On Campus (Active)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Visitor Registration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">GP-2024-0417</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Ankur Mittal</div>
          <small class="text-muted font-size-11">Tata Motors Commercial</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Transport Incharge</span></td>
        <td><small class="text-dark">Bus #14 Periodic Service</small></td>
        <td><small class="text-muted font-mono font-size-12">08:15 AM</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">09:45 AM</span></td>
        <td><small class="text-muted">+91 98667 33445</small></td>
        <td><span class="badge-status badge-active">Checked Out</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Visitor Registration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">GP-2024-0418</td>
        <td>
          <div class="fw-semibold text-dark">Mrs. Ritu Bhasin</div>
          <small class="text-muted font-size-11">Prospective Parent</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Admissions Desk</span></td>
        <td><small class="text-dark">Campus Walkthrough Tour</small></td>
        <td><small class="text-muted font-mono font-size-12">10:30 AM</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">11:45 AM</span></td>
        <td><small class="text-muted">+91 98778 44556</small></td>
        <td><span class="badge-status badge-active">Checked Out</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Visitor Registration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">GP-2024-0419</td>
        <td>
          <div class="fw-semibold text-dark">Mr. D. K. Bansal</div>
          <small class="text-muted font-size-11">MCD Health Department</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">School Incharge Doctor</span></td>
        <td><small class="text-dark">Drinking Water Audit Sample</small></td>
        <td><small class="text-muted font-mono font-size-12">09:00 AM</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">10:30 AM</span></td>
        <td><small class="text-muted">+91 11 2398 7788</small></td>
        <td><span class="badge-status badge-active">Checked Out</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Visitor Registration')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>


<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
