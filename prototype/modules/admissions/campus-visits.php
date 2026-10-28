<?php
/**
 * EDUSYS PRO - CAMPUS VISITS
 * Dedicated operational interface & records management for Campus Visits
 */
$page_title = "Campus Visits";
$page_desc = "Guided parent tours, laboratory demonstrations, sports complex inspections, and visit feedback";
$active_module = "admissions";
$active_submodule = "campus-visits.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/admissions/dashboard.php'); ?>">Admission Management</a></li>
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
    <a href="<?php echo base_url('modules/admissions/dashboard.php'); ?>" class="btn btn-light border" title="Back to Admissions Command Center">
      <i class="bi bi-speedometer2 me-1"></i> Dashboard
    </a>
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'campus-visits_export.csv')" title="Export Table as CSV">
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
        <h6>Tours Conducted</h6>
        <div class="kpi-value">142 Families</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Spring Intake Season</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-building-fill-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Visitor Satisfaction</h6>
        <div class="kpi-value">4.9 / 5.0</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 98% Positive Feedback</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-star-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Tours Today</h6>
        <div class="kpi-value">6 Scheduled</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> 3 Morning / 3 Afternoon</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-event"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Tour-to-Form Yield</h6>
        <div class="kpi-value">74.2%</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> High Conversion Impact</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-arrow-right-circle-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search visit slot #, family name, tour guide...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Visit Times</option>
      <option >Morning Slot (09:30 - 11:30)</option>
      <option >Noon Slot (12:00 - 01:30)</option>
      <option >Afternoon Slot (02:30 - 04:30)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Completed & Feedback Logged</option>
      <option >In Progress</option>
      <option >Scheduled Today</option>
      <option >Rescheduled</option>
      <option >No Show</option>
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
        <th>Visit Booking #</th>
        <th>Visiting Family</th>
        <th>Grade of Interest</th>
        <th>Key Facility Focus</th>
        <th>Tour Guide Officer</th>
        <th>Scheduled Slot</th>
        <th>Visitor Rating</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">VIS-2025-0142</td>
        <td>
          <div class="fw-semibold text-dark">Mr. & Mrs. Singhania</div>
          <small class="text-muted font-size-11">Candidate: Aarav (Nursery)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pre-Primary Wing</span></td>
        <td><small class="text-dark">Smart Kindergarten & Splash Pool</small></td>
        <td><small class="text-muted font-mono font-size-12">Pooja Hegde (Ambassador)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">28 Oct (10:30 AM)</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Completed (5★)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Campus Visits')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">VIS-2025-0141</td>
        <td>
          <div class="fw-semibold text-dark">Dr. K. S. Reddy & Family</div>
          <small class="text-muted font-size-11">Candidate: Saanvi (Cl 6)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Middle Wing</span></td>
        <td><small class="text-dark">Atal Tinkering Lab & Robotics</small></td>
        <td><small class="text-muted font-mono font-size-12">Kunal Bansal (Science Lead)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">28 Oct (11:30 AM)</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Completed (5★)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Campus Visits')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">VIS-2025-0140</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Alok Bhardwaj</div>
          <small class="text-muted font-size-11">Candidate: Devansh (Cl 11)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Physics/Chemistry Labs & Hostel</small></td>
        <td><small class="text-muted font-mono font-size-12">Sunil Joshi (Admin Officer)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">28 Oct (02:30 PM)</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-pending">In Progress</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Campus Visits')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">VIS-2025-0139</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Sameer Deshpande</div>
          <small class="text-muted font-size-11">Candidate: Ananya (Cl 9)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Secondary Wing</span></td>
        <td><small class="text-dark">Olympic Swimming Pool & Squash</small></td>
        <td><small class="text-muted font-mono font-size-12">Pooja Hegde (Ambassador)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">29 Oct (10:00 AM)</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Campus Visits')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">VIS-2025-0138</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Raman Choudhary</div>
          <small class="text-muted font-size-11">Candidate: Tanvi (Cl 11)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Library & Commerce Innovation Hub</small></td>
        <td><small class="text-muted font-mono font-size-12">Sunil Joshi (Admin Officer)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">29 Oct (11:30 AM)</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Campus Visits')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">VIS-2025-0137</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Subhash Mukherjee</div>
          <small class="text-muted font-size-11">Candidate: Ishaan (Cl 4)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Primary Wing</span></td>
        <td><small class="text-dark">Junior Activity Hall & Transport</small></td>
        <td><small class="text-muted font-mono font-size-12">Pooja Hegde (Ambassador)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">30 Oct (09:30 AM)</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Scheduled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Campus Visits')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">VIS-2025-0136</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Kunal Kapoor</div>
          <small class="text-muted font-size-11">Candidate: Riyaan (Prep)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Pre-Primary Wing</span></td>
        <td><small class="text-dark">Montessori Lab & Dining Hall</small></td>
        <td><small class="text-muted font-mono font-size-12">Pooja Hegde (Ambassador)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">27 Oct (03:00 PM)</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Completed (5★)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Campus Visits')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">VIS-2025-0135</td>
        <td>
          <div class="fw-semibold text-dark">Mr. Suresh Pillai</div>
          <small class="text-muted font-size-11">Candidate: Navya (Cl 11)</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Secondary</span></td>
        <td><small class="text-dark">Auditorium & Visual Arts Studio</small></td>
        <td><small class="text-muted font-mono font-size-12">Kunal Bansal (Science Lead)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">27 Oct (11:00 AM)</span></td>
        <td><small class="text-muted"></small></td>
        <td><span class="badge-status badge-active">Completed (4★)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Campus Visits')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
