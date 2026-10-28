<?php
/**
 * EDUSYS PRO - EMERGENCY CONTACTS
 * Dedicated operational interface & records management for Emergency Contacts
 */
$page_title = "Emergency Contacts";
$page_desc = "Critical medical contact hotline, authorized emergency guardians, and nearest hospital mappings";
$active_module = "students";
$active_submodule = "emergency-contacts.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/students/dashboard.php'); ?>">Student Information System</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-telephone-forward-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'emergency-contacts_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-telephone-plus me-1"></i> Add Emergency Contact
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>24/7 Hotline Synced</h6>
        <div class="kpi-value">2,840 Contacts</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Reachable</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-telephone-inbound-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Medical Alerts</h6>
        <div class="kpi-value">148 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Asthma, Allergies, Epipen</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-heart-pulse-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Designated Hospitals</h6>
        <div class="kpi-value">5 Partner Clinics</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Manipal, Max, Fortis Nearby</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-hospital"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>School Infirmary</h6>
        <div class="kpi-value">2 Full-Time Nurses</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Pediatric Doctor on Call</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-plus"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search student, emergency contact, relationship, hospital...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Medical Flags</option>
      <option >Asthma Inhaler on File</option>
      <option >Nut / Food Allergy</option>
      <option >Epipen Required</option>
      <option >Diabetic Monitoring</option>
      <option >No Known Allergies</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Verified & Active</option>
      <option >Contact Unreachable</option>
      <option >Update Needed</option>
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
        <th>Student ID</th>
        <th>Student Full Name</th>
        <th>Primary Emergency Contact</th>
        <th>Relationship</th>
        <th>Emergency Hotline</th>
        <th>Alternate Mobile</th>
        <th>Preferred Hospital / Doctor</th>
        <th>Medical Alert</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-001</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Class 10-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Rajesh Sharma</span></td>
        <td><small class="text-dark">Father</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98112 34567</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98112 34568</span></td>
        <td><small class="text-muted">Manipal Hospital Dwarka</small></td>
        <td><span class="badge-status badge-active">No Known Allergy</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Emergency Contacts')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-002</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Class 10-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Kavita Patel</span></td>
        <td><small class="text-dark">Mother</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98223 45678</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98223 45679</span></td>
        <td><small class="text-muted">Max Hospital Saket</small></td>
        <td><span class="badge-status badge-pending">Peanut Allergy</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Emergency Contacts')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-003</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Class 10-B</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Manpreet Singh</span></td>
        <td><small class="text-dark">Father</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98334 56789</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98334 56790</span></td>
        <td><small class="text-muted">Base Hospital Delhi Cantt</small></td>
        <td><span class="badge-status badge-active">No Known Allergy</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Emergency Contacts')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-004</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Class 10-B</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">R. Venkatesh Iyer</span></td>
        <td><small class="text-dark">Father</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98445 67890</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98445 67891</span></td>
        <td><small class="text-muted">Fortis Flt. Lt. Rajan Dhall</small></td>
        <td><span class="badge-status badge-pending">Mild Asthma</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Emergency Contacts')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-005</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Class 12 - PCM</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Sanjay Gupta</span></td>
        <td><small class="text-dark">Father</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98556 78901</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98556 78902</span></td>
        <td><small class="text-muted">Sant Parmanand Hospital</small></td>
        <td><span class="badge-status badge-active">No Known Allergy</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Emergency Contacts')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-006</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Class 12 - PCB</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Dr. Alok Verma</span></td>
        <td><small class="text-dark">Father</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98667 89012</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98667 89013</span></td>
        <td><small class="text-muted">AIIMS Trauma Center</small></td>
        <td><span class="badge-status badge-active">No Known Allergy</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Emergency Contacts')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-007</td>
        <td>
          <div class="fw-semibold text-dark">Meera Nambiar</div>
          <small class="text-muted font-size-11">Class 8-C</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Radhika Nambiar</span></td>
        <td><small class="text-dark">Mother</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98778 90123</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98778 90124</span></td>
        <td><small class="text-muted">Venkateshwar Hospital</small></td>
        <td><span class="badge-status badge-pending">Lactose Intolerant</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Emergency Contacts')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ADM-2024-008</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Malhotra</div>
          <small class="text-muted font-size-11">Class 5-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Vikram Malhotra</span></td>
        <td><small class="text-dark">Father</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98889 01234</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">+91 98889 01235</span></td>
        <td><small class="text-muted">Apollo Cradle & Children</small></td>
        <td><span class="badge-status badge-active">No Known Allergy</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Emergency Contacts')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
