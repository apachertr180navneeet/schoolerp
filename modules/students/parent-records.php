<?php
/**
 * EDUSYS PRO - PARENT & GUARDIAN RECORDS
 * Dedicated operational interface & records management for Parent & Guardian Records
 */
$page_title = "Parent & Guardian Records";
$page_desc = "Parental profiles, professions, verified emergency numbers, and residential address tracking";
$active_module = "students";
$active_submodule = "parent-records.php";
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
    <h1><i class="bi bi-person-vcard-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'parent-records_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Add Parent Record
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Parent Dossiers</h6>
        <div class="kpi-value">2,410 Families</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Includes Siblings</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-house-heart-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Mobile Numbers Synced</h6>
        <div class="kpi-value">100% Verified</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> OTP SMS Active</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-phone-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Working Professionals</h6>
        <div class="kpi-value">84.2%</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> IT, Healthcare, Govt, Defense</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-briefcase-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Address Proofs</h6>
        <div class="kpi-value">100% Filed</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Electricity / Rent / Passport</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-geo-alt-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search father, mother, student name, mobile, profession...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Occupations</option>
      <option >Government & Defense Service</option>
      <option >Corporate / IT Sector</option>
      <option >Medical & Healthcare</option>
      <option >Business & Entrepreneurship</option>
      <option >Education & Law</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active & Verified</option>
      <option >Contact Update Req</option>
      <option >Archived</option>
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
        <th>Family ID</th>
        <th>Student Name & Class</th>
        <th>Father Name & Occupation</th>
        <th>Mother Name & Occupation</th>
        <th>Primary Mobile</th>
        <th>Parent Email</th>
        <th>Residential Address</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FAM-8491</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Class 10-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Rajesh Sharma (Sr. Director, IT)</span></td>
        <td><small class="text-dark">Poonam Sharma (Professor)</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98112 34567</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">rajesh.sharma@gmail.com</span></td>
        <td><small class="text-muted">Sector 14, Dwarka, New Delhi</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent & Guardian Records')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FAM-8492</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Class 10-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Bhavin Patel (Chartered Accountant)</span></td>
        <td><small class="text-dark">Kavita Patel (Interior Designer)</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98223 45678</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">bhavin.ca@gmail.com</span></td>
        <td><small class="text-muted">Janakpuri B-Block, New Delhi</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent & Guardian Records')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FAM-8493</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Class 10-B</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Manpreet Singh (Govt Officer, MoD)</span></td>
        <td><small class="text-dark">Harpreet Kaur (Bank Manager)</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98334 56789</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">manpreet.singh@gov.in</span></td>
        <td><small class="text-muted">Palam Vihar, Gurugram</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent & Guardian Records')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FAM-8494</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Class 10-B</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">R. Venkatesh Iyer (Vice President, Bank)</span></td>
        <td><small class="text-dark">Lakshmi Iyer (Homemaker)</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98445 67890</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">r.venkatesh@gmail.com</span></td>
        <td><small class="text-muted">Vasant Kunj Sector C, New Delhi</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent & Guardian Records')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FAM-8495</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Class 12 - PCM</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Sanjay Gupta (Business Owner)</span></td>
        <td><small class="text-dark">Neelam Gupta (Partner)</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98556 78901</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">sanjay.gupta@delhispice.com</span></td>
        <td><small class="text-muted">Civil Lines, New Delhi</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent & Guardian Records')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FAM-8496</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Class 12 - PCB</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Dr. Alok Verma (Surgeon, AIIMS)</span></td>
        <td><small class="text-dark">Dr. Meenakshi Verma (Pediatrician)</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98667 89012</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">alok.verma.md@aiims.edu</span></td>
        <td><small class="text-muted">Ansari Nagar, New Delhi</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent & Guardian Records')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FAM-8497</td>
        <td>
          <div class="fw-semibold text-dark">Meera Nambiar</div>
          <small class="text-muted font-size-11">Class 8-C</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">K. R. Nambiar (Aviation Pilot)</span></td>
        <td><small class="text-dark">Radhika Nambiar (Architect)</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98778 90123</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">nambiar.kr@airindia.in</span></td>
        <td><small class="text-muted">Aerocity Residences, New Delhi</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent & Guardian Records')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FAM-8498</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Malhotra</div>
          <small class="text-muted font-size-11">Class 5-A</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Vikram Malhotra (Senior Advocate)</span></td>
        <td><small class="text-dark">Sunita Malhotra (Journalist)</small></td>
        <td><small class="text-muted font-mono font-size-12">+91 98889 01234</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">malhotra.law@gmail.com</span></td>
        <td><small class="text-muted">Greater Kailash 2, New Delhi</small></td>
        <td><span class="badge-status badge-active">Verified</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent & Guardian Records')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
