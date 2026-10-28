<?php
/**
 * EDUSYS PRO - CLASSROOM ALLOCATION
 * Dedicated operational interface & records management for Classroom Allocation
 */
$page_title = "Classroom Allocation";
$page_desc = "Instructional room capacities, smart board ICT infrastructure, specialized laboratories, and wing incharge allocations";
$active_module = "academics";
$active_submodule = "classroom-allocation.php";
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
    <h1><i class="bi bi-building text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'classroom-allocation_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-door-open-fill me-1"></i> Allocate Room / Hall
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Classrooms Active</h6>
        <div class="kpi-value">84 Rooms</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Utilized in Morning</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-door-closed-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Smart ICT Enabled</h6>
        <div class="kpi-value">72 Interactive IFPDs</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Touch Screens with WiFi</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-tv-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Specialized Labs</h6>
        <div class="kpi-value">8 Labs</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Physics, Chem, Bio, CS, ATL</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-tools"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Average Capacity</h6>
        <div class="kpi-value">42 Desks / Room</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Well Ventilated (CBSE Norm)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-aspect-ratio"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search room #, block, allocated grade, floor incharge...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Campus Blocks</option>
      <option >Block A (Senior Secondary)</option>
      <option >Block B (Secondary & Science Labs)</option>
      <option >Block C (Middle Wing)</option>
      <option >Block D (Primary & Pre-Primary)</option>
      <option >Specialized Lab Wing</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Occupied (Class Allocated)</option>
      <option >Available Slot</option>
      <option >Maintenance</option>
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
        <th>Room #</th>
        <th>Room Name / Block</th>
        <th>Assigned Grade & Section</th>
        <th>Seating Capacity</th>
        <th>Smart Board / ICT Enabled</th>
        <th>Floor & Wing</th>
        <th>Floor Incharge</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ROOM-204</td>
        <td>
          <div class="fw-semibold text-dark">Classroom 204</div>
          <small class="text-muted font-size-11">Block A - First Floor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">42 Desks (Capacity 45)</small></td>
        <td><small class="text-muted font-mono font-size-12">Yes (75-inch ViewSonic IFPD)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Floor 1, Senior Secondary Wing</span></td>
        <td><small class="text-muted">Mr. S. K. Rastogi</small></td>
        <td><span class="badge-status badge-active">Occupied</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Classroom Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ROOM-205</td>
        <td>
          <div class="fw-semibold text-dark">Classroom 205</div>
          <small class="text-muted font-size-11">Block A - First Floor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">42 Desks (Capacity 45)</small></td>
        <td><small class="text-muted font-mono font-size-12">Yes (75-inch ViewSonic IFPD)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Floor 1, Senior Secondary Wing</span></td>
        <td><small class="text-muted">Mr. S. K. Rastogi</small></td>
        <td><span class="badge-status badge-active">Occupied</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Classroom Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ROOM-301</td>
        <td>
          <div class="fw-semibold text-dark">Classroom 301</div>
          <small class="text-muted font-size-11">Science Block - Second Floor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-dark">40 Desks (Capacity 40)</small></td>
        <td><small class="text-muted font-mono font-size-12">Yes (Interactive Smart Screen)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Floor 2, Science & Tech Wing</span></td>
        <td><small class="text-muted">Dr. K. L. Sharma</small></td>
        <td><span class="badge-status badge-active">Occupied</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Classroom Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ROOM-302</td>
        <td>
          <div class="fw-semibold text-dark">Classroom 302</div>
          <small class="text-muted font-size-11">Science Block - Second Floor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCB)</span></td>
        <td><small class="text-dark">40 Desks (Capacity 40)</small></td>
        <td><small class="text-muted font-mono font-size-12">Yes (Interactive Smart Screen)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Floor 2, Science & Tech Wing</span></td>
        <td><small class="text-muted">Dr. K. L. Sharma</small></td>
        <td><span class="badge-status badge-active">Occupied</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Classroom Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LAB-PHY-01</td>
        <td>
          <div class="fw-semibold text-dark">Sir C.V. Raman Physics Lab</div>
          <small class="text-muted font-size-11">Block B - Ground Floor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 11 & 12 Practical</span></td>
        <td><small class="text-dark">45 Workstations with Apparatus</small></td>
        <td><small class="text-muted font-mono font-size-12">Yes (Projector & Digital Sensors)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Ground Floor, Science Lab Block</span></td>
        <td><small class="text-muted">Lab Supdt. Anil Verma</small></td>
        <td><span class="badge-status badge-active">Lab Facility</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Classroom Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LAB-CHEM-01</td>
        <td>
          <div class="fw-semibold text-dark">Acharya P.C. Ray Chemistry Lab</div>
          <small class="text-muted font-size-11">Block B - Ground Floor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Classes 11 & 12 Practical</span></td>
        <td><small class="text-dark">45 Fume Hoods & Burners</small></td>
        <td><small class="text-muted font-mono font-size-12">Yes (Safety Shower & Digital Scales)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Ground Floor, Science Lab Block</span></td>
        <td><small class="text-muted">Lab Supdt. R. P. Gupta</small></td>
        <td><span class="badge-status badge-active">Lab Facility</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Classroom Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">LAB-ATL-01</td>
        <td>
          <div class="fw-semibold text-dark">Atal Tinkering Lab (NITI Aayog)</div>
          <small class="text-muted font-size-11">Block B - First Floor</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Robotics & Innovation (6-12)</span></td>
        <td><small class="text-dark">40 Robotic Stations, 3D Printers</small></td>
        <td><small class="text-muted font-mono font-size-12">Yes (IoT Kits, Soldering Stations)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Floor 1, Innovation Wing</span></td>
        <td><small class="text-muted">ATL Incharge Kunal Bansal</small></td>
        <td><span class="badge-status badge-active">Specialized Hub</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Classroom Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">AUD-MAIN</td>
        <td>
          <div class="fw-semibold text-dark">Dr. APJ Abdul Kalam Auditorium</div>
          <small class="text-muted font-size-11">Central Academic Block</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Whole School / Large Assemblies</span></td>
        <td><small class="text-dark">850 Padded Theater Seats</small></td>
        <td><small class="text-muted font-mono font-size-12">Yes (JBL Audio & 4K LED Wall)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Ground Floor, Central Wing</span></td>
        <td><small class="text-muted">Auditorium Mgr Harish</small></td>
        <td><span class="badge-status badge-active">Auditorium</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Classroom Allocation')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
