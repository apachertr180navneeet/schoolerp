<?php
/**
 * EDUSYS PRO - HOLIDAYS & VACATIONS
 * Dedicated operational interface & records management for Holidays & Vacations
 */
$page_title = "Holidays & Vacations";
$page_desc = "Gazetted public holidays, restricted cultural festivals, seasonal vacations, and educational board recesses";
$active_module = "administration";
$active_submodule = "holidays.php";
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
    <h1><i class="bi bi-layers text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/administration/school-profile.php'); ?>" class="btn btn-light border" title="School Institutional Dossier">
      <i class="bi bi-building me-1"></i> Profile
    </a>
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'holidays_export.csv')" title="Export Table as CSV">
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
        <h6>Annual Holidays</h6>
        <div class="kpi-value">28 Gazetted Days</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Government & Board Approved</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar2-heart-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Summer Vacation</h6>
        <div class="kpi-value">45 Days</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 18 May to 01 Jul 2024</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-sun-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Winter Vacation</h6>
        <div class="kpi-value">10 Days</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> 30 Dec 2024 to 08 Jan 2025</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-snow"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>National Days</h6>
        <div class="kpi-value">3 Sovereign Days</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Republic, Independence, Gandhi</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-flag-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search holiday title, gazette notification, date...">
    </div>
    <select class="form-select" style="max-width: 240px;">
      <option selected>All Holidays</option>
      <option >National Gazetted Holidays</option>
      <option >Major Festive Vacations</option>
      <option >Summer & Winter Recesses</option>
      <option >Restricted / Discretionary Leaves</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Mandatory Holiday</option>
      <option >Vacation Recess</option>
      <option >Restricted Day</option>
      <option >Completed</option>
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
        <th>Holiday Code</th>
        <th>Holiday / Vacation Title</th>
        <th>Holiday Category</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Duration</th>
        <th>Gazette Notification Ref</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HOL-2024-01</td>
        <td>
          <div class="fw-semibold text-dark">Mahavir Jayanti</div>
          <small class="text-muted font-size-11">Jain Religious Observance</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Gazetted Festival</span></td>
        <td><small class="text-dark">21 Apr 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">21 Apr 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">1 Day (Sunday)</span></td>
        <td><small class="text-muted">DoE Circular #948</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Holidays & Vacations')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HOL-2024-02</td>
        <td>
          <div class="fw-semibold text-dark">Buddha Purnima</div>
          <small class="text-muted font-size-11">Buddhist Holiday</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Gazetted Festival</span></td>
        <td><small class="text-dark">23 May 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">23 May 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">1 Day (Thursday)</span></td>
        <td><small class="text-muted">DoE Circular #952</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Holidays & Vacations')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HOL-2024-03</td>
        <td>
          <div class="fw-semibold text-dark">Annual Summer Vacation 2024</div>
          <small class="text-muted font-size-11">Post-Term 1 Instructional Recess</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">School Vacation</span></td>
        <td><small class="text-dark">18 May 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">01 Jul 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">45 Days</span></td>
        <td><small class="text-muted">Annual Academic Cal #2024</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Holidays & Vacations')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HOL-2024-04</td>
        <td>
          <div class="fw-semibold text-dark">Independence Day (78th National Day)</div>
          <small class="text-muted font-size-11">Celebration Assembly & Flag Hoisting</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">National Holiday</span></td>
        <td><small class="text-dark">15 Aug 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">15 Aug 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">1 Day (Ceremony Held)</span></td>
        <td><small class="text-muted">MHA Order #842</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Holidays & Vacations')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HOL-2024-05</td>
        <td>
          <div class="fw-semibold text-dark">Mahatma Gandhi Jayanti</div>
          <small class="text-muted font-size-11">Father of Nation & Swachhata Diwas</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">National Holiday</span></td>
        <td><small class="text-dark">02 Oct 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">02 Oct 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">1 Day (Wednesday)</span></td>
        <td><small class="text-muted">Govt of India Gazette #102</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Holidays & Vacations')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HOL-2024-06</td>
        <td>
          <div class="fw-semibold text-dark">Dussehra & Vijayadashami Break</div>
          <small class="text-muted font-size-11">Navratri & Durga Puja Festive Holidays</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Festive Break</span></td>
        <td><small class="text-dark">11 Oct 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">13 Oct 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">3 Days</span></td>
        <td><small class="text-muted">CBSE Notification #491</small></td>
        <td><span class="badge-status badge-active">Completed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Holidays & Vacations')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HOL-2024-07</td>
        <td>
          <div class="fw-semibold text-dark">Diwali & Govardhan Puja Holidays</div>
          <small class="text-muted font-size-11">Deepawali Festival of Lights</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Festive Break</span></td>
        <td><small class="text-dark">31 Oct 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">03 Nov 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">4 Days</span></td>
        <td><small class="text-muted">State Gazette #912</small></td>
        <td><span class="badge-status badge-active">Upcoming</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Holidays & Vacations')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HOL-2024-08</td>
        <td>
          <div class="fw-semibold text-dark">Guru Nanak Jayanti (Gurpurab)</div>
          <small class="text-muted font-size-11">Prakash Utsav Holiday</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Gazetted Festival</span></td>
        <td><small class="text-dark">15 Nov 2024</small></td>
        <td><small class="text-muted font-mono font-size-12">15 Nov 2024</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">1 Day (Friday)</span></td>
        <td><small class="text-muted">Govt of India Gazette #114</small></td>
        <td><span class="badge-status badge-active">Upcoming</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Holidays & Vacations')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
