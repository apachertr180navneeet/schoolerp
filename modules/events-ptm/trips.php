<?php
/**
 * EDUSYS PRO - SCHOOL TRIPS & EXCURSIONS
 * Dedicated operational interface & records management for School Trips & Excursions
 */
$page_title = "School Trips & Excursions";
$page_desc = "Educational excursions, historical tours, science camps, parent consent tracking, and bus convoy safety";
$active_module = "events-ptm";
$active_submodule = "trips.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/events-ptm/calendar.php'); ?>">Events & PTM</a></li>
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
    <a href="<?php echo base_url('modules/events-ptm/calendar.php'); ?>" class="btn btn-light border" title="Interactive Master Calendar">
      <i class="bi bi-calendar3 me-1"></i> Calendar
    </a>
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'trips_export.csv')" title="Export Table as CSV">
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
        <h6>Active Trips</h6>
        <div class="kpi-value">8 Excursions</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Curriculum-Linked Tours</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-bus-front-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Students Traveling</h6>
        <div class="kpi-value">340 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Safety Protocols Verified</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-backpack-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Parent Consents</h6>
        <div class="kpi-value">98.6% Signed</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Digital Consent via Portal</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-file-earmark-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>GPS Tracked Buses</h6>
        <div class="kpi-value">12 Buses</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Live CCTV & Speed Governed</div>
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
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search trip code, destination, escort lead...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Destinations</option>
      <option >Local Delhi-NCR Day Trips</option>
      <option >Outstation Heritage (Agra/Jaipur)</option>
      <option >Eco-Adventure Camps</option>
      <option >Science & Space Exploration</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Booked & Confirmed</option>
      <option >Consent Phase</option>
      <option >In Transit</option>
      <option >Trip Completed</option>
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
        <th>Trip Code</th>
        <th>Trip Destination & Theme</th>
        <th>Eligible Grades</th>
        <th>Student Count</th>
        <th>Per-Student Fee</th>
        <th>Lead Faculty Escort</th>
        <th>Departure Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TRP-2024-08</td>
        <td>
          <div class="fw-semibold text-dark">National Science Centre & Planetarium</div>
          <small class="text-muted font-size-11">Interactive Space & Robotics Exhibition</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Middle (Classes 6-8)</span></td>
        <td><small class="text-dark">95 Students</small></td>
        <td><small class="text-muted font-mono font-size-12">₹850 (All Inclusive)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mr. Kunal Bansal (Science Lead)</span></td>
        <td><small class="text-muted">18 Nov 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Trips & Excursions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TRP-2024-07</td>
        <td>
          <div class="fw-semibold text-dark">Heritage Trail: Taj Mahal & Fatehpur Sikri</div>
          <small class="text-muted font-size-11">Mughal Architecture & History Fieldwork</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Secondary (Classes 9-10)</span></td>
        <td><small class="text-dark">85 Students</small></td>
        <td><small class="text-muted font-mono font-size-12">₹2,400 (AC Coach + Meals)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. K. L. Sharma (History HOD)</span></td>
        <td><small class="text-muted">06 Dec 2024</small></td>
        <td><span class="badge-status badge-active">Consent Phase</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Trips & Excursions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TRP-2024-06</td>
        <td>
          <div class="fw-semibold text-dark">Jim Corbett Wildlife Ecology Camp</div>
          <small class="text-muted font-size-11">Flora, Fauna & Conservation Field Study</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Sec (Biology Batch)</span></td>
        <td><small class="text-dark">42 Students</small></td>
        <td><small class="text-muted font-mono font-size-12">₹6,800 (3D / 2N Resort)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dr. Sunita Kapoor (HOD Bio)</span></td>
        <td><small class="text-muted">12 Dec 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Trips & Excursions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TRP-2024-05</td>
        <td>
          <div class="fw-semibold text-dark">National Rail Museum & Heritage Steam Ride</div>
          <small class="text-muted font-size-11">Engineering History & Locomotive Study</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Primary (Classes 3-5)</span></td>
        <td><small class="text-dark">110 Students</small></td>
        <td><small class="text-muted font-mono font-size-12">₹650 (Coach + Snacks)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mrs. Shalini Verma</span></td>
        <td><small class="text-muted">25 Nov 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Trips & Excursions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TRP-2024-04</td>
        <td>
          <div class="fw-semibold text-dark">Aravalli Biodiversity Nature Walk</div>
          <small class="text-muted font-size-11">Botanical Survey & Bird Watching Camp</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Middle (Classes 6-7)</span></td>
        <td><small class="text-dark">60 Students</small></td>
        <td><small class="text-muted font-mono font-size-12">₹450 (Packed Breakfast)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mr. Deepak Rawat</span></td>
        <td><small class="text-muted">20 Nov 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Trips & Excursions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TRP-2024-03</td>
        <td>
          <div class="fw-semibold text-dark">NASA Kennedy Space Center Tour (Florida)</div>
          <small class="text-muted font-size-11">International Astronaut Training Experience</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Senior Sec (Selected Batch)</span></td>
        <td><small class="text-dark">18 Students</small></td>
        <td><small class="text-muted font-mono font-size-12">₹2,85,000 (Visa & Airfare)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dean Academics</span></td>
        <td><small class="text-muted">15 Jan 2025</small></td>
        <td><span class="badge-status badge-pending">Visa Processing</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Trips & Excursions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TRP-2024-02</td>
        <td>
          <div class="fw-semibold text-dark">Sultanpur National Bird Sanctuary</div>
          <small class="text-muted font-size-11">Migratory Birds Photography Expedition</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Secondary (Classes 8-10)</span></td>
        <td><small class="text-dark">45 Students</small></td>
        <td><small class="text-muted font-mono font-size-12">₹750 (Travel + Lunch)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mr. Pradeep Joshi</span></td>
        <td><small class="text-muted">08 Dec 2024</small></td>
        <td><span class="badge-status badge-active">Consent Phase</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Trips & Excursions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">TRP-2024-01</td>
        <td>
          <div class="fw-semibold text-dark">National Crafts Museum & Pottery Workshop</div>
          <small class="text-muted font-size-11">Traditional Indian Artisans Masterclass</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Primary (Classes 1-2)</span></td>
        <td><small class="text-dark">80 Students</small></td>
        <td><small class="text-muted font-mono font-size-12">₹500 (Materials Inc)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Mrs. Reena Sengupta</span></td>
        <td><small class="text-muted">28 Nov 2024</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'School Trips & Excursions')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
