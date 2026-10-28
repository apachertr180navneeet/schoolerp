<?php
/**
 * EDUSYS PRO - PRACTICAL & LAB SCHEDULING
 * Dedicated operational interface & records management for Practical & Lab Scheduling
 */
$page_title = "Practical & Lab Scheduling";
$page_desc = "Laboratory rotation rosters, apparatus readiness logs, chemical inventories, and lab assistant duty rotas";
$active_module = "academics";
$active_submodule = "lab-scheduling.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/academics/dashboard.php'); ?>">Academic Management</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-radioactive text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'lab-scheduling_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-calendar-plus-fill me-1"></i> Schedule Lab Slot
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Practical Labs</h6>
        <div class="kpi-value">8 Active Facilities</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Full Lab Apparatus Ready</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-tools"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Weekly Lab Slots</h6>
        <div class="kpi-value">144 Block Hours</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 100% Practical Hours Met</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-clock-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Safety Audits</h6>
        <div class="kpi-value">100% Certified</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Fire & Eye Wash Certified</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-fill-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Chemical Vault Stock</h6>
        <div class="kpi-value">98% In Stock</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Reagents for Annual Exam</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-box-seam-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search lab booking, facility, experiment, instructor...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Laboratories</option>
      <option >Sir C.V. Raman Physics Lab</option>
      <option >Acharya P.C. Ray Chemistry Lab</option>
      <option >Hargobind Khorana Biology Lab</option>
      <option >Ada Lovelace Computer Lab</option>
      <option >Atal Tinkering Innovation Lab</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Confirmed Slot</option>
      <option >Equipment Prepared</option>
      <option >In Session</option>
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
        <th>Lab Booking #</th>
        <th>Laboratory Facility</th>
        <th>Class & Section</th>
        <th>Experiment / Topic</th>
        <th>Lab Instructor</th>
        <th>Time Slot</th>
        <th>Chemicals / Equipment Ready</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LAB-SCH-01</td>
        <td>
          <div class="fw-semibold text-dark">Sir C.V. Raman Physics Lab</div>
          <small class="text-muted font-size-11">Block B Ground Floor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-dark">Potentiometer: Comparison of EMF of Two Cells</small></td>
        <td><small class="text-muted font-mono font-size-12">Dr. K. L. Sharma (PGT)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Monday (09:30 - 11:00 AM)</span></td>
        <td><small class="text-muted">Yes (Galvanometer & Accumulators Ready)</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Practical & Lab Scheduling')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LAB-SCH-02</td>
        <td>
          <div class="fw-semibold text-dark">Acharya P.C. Ray Chemistry Lab</div>
          <small class="text-muted font-size-11">Block B Ground Floor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-dark">Titration: M/20 Mohr Salt vs KMnO4</small></td>
        <td><small class="text-muted font-mono font-size-12">Mr. Vikram Rathore (PGT)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Tuesday (09:30 - 11:00 AM)</span></td>
        <td><small class="text-muted">Yes (Burettes, Pipettes & Reagents)</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Practical & Lab Scheduling')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LAB-SCH-03</td>
        <td>
          <div class="fw-semibold text-dark">Hargobind Khorana Biology Lab</div>
          <small class="text-muted font-size-11">Block B First Floor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCB)</span></td>
        <td><small class="text-dark">Pollen Germination on Slide under Microscope</small></td>
        <td><small class="text-muted font-mono font-size-12">Mrs. Radhika Iyer (PGT)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Wednesday (09:30 - 11:00 AM)</span></td>
        <td><small class="text-muted">Yes (Compound Microscopes & Slides)</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Practical & Lab Scheduling')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LAB-SCH-04</td>
        <td>
          <div class="fw-semibold text-dark">Ada Lovelace Computer Lab 1</div>
          <small class="text-muted font-size-11">Block B First Floor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-dark">Python GUI Connectivity with MySQL Database</small></td>
        <td><small class="text-muted font-mono font-size-12">Mr. Kunal Bansal (MCA)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Thursday (09:30 - 11:00 AM)</span></td>
        <td><small class="text-muted">Yes (40 Workstations Synced)</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Practical & Lab Scheduling')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LAB-SCH-05</td>
        <td>
          <div class="fw-semibold text-dark">Atal Tinkering Innovation Lab</div>
          <small class="text-muted font-size-11">Block B First Floor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">Sensors Calibration & 3D Model Slicing</small></td>
        <td><small class="text-muted font-mono font-size-12">Mr. Kunal Bansal (MCA)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Friday (12:55 - 02:15 PM)</span></td>
        <td><small class="text-muted">Yes (Ultimaker 3D Printers Ready)</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Practical & Lab Scheduling')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LAB-SCH-06</td>
        <td>
          <div class="fw-semibold text-dark">Sir C.V. Raman Physics Lab</div>
          <small class="text-muted font-size-11">Block B Ground Floor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">Ohm's Law: Resistance Verification</small></td>
        <td><small class="text-muted font-mono font-size-12">Dr. K. L. Sharma (PGT)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Tuesday (12:55 - 02:15 PM)</span></td>
        <td><small class="text-muted">Yes (Voltmeters & Ammeters Calibrated)</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Practical & Lab Scheduling')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LAB-SCH-07</td>
        <td>
          <div class="fw-semibold text-dark">Acharya P.C. Ray Chemistry Lab</div>
          <small class="text-muted font-size-11">Block B Ground Floor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">pH Indicator Test on Acid & Base Samples</small></td>
        <td><small class="text-muted font-mono font-size-12">Mr. Vikram Rathore (PGT)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Wednesday (12:55 - 02:15 PM)</span></td>
        <td><small class="text-muted">Yes (Litmus, Universal Indicator Paper)</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Practical & Lab Scheduling')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LAB-SCH-08</td>
        <td>
          <div class="fw-semibold text-dark">Ada Lovelace Computer Lab 2</div>
          <small class="text-muted font-size-11">Block B First Floor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">AI Computer Vision: OpenCV Edge Detection</small></td>
        <td><small class="text-muted font-mono font-size-12">Mr. Kunal Bansal (MCA)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Thursday (12:55 - 02:15 PM)</span></td>
        <td><small class="text-muted">Yes (Jupyter Notebooks Deployed)</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Practical & Lab Scheduling')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
