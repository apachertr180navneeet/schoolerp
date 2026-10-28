<?php
/**
 * EDUSYS PRO - PARENT BOOKING PORTAL
 * Dedicated operational interface & records management for Parent Booking Portal
 */
$page_title = "Parent Booking Portal";
$page_desc = "Self-service parent PTM reservation engine, instant time slot lock, and calendar sync";
$active_module = "events-ptm";
$active_submodule = "parent-booking.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'parent-booking_export.csv')" title="Export Table as CSV">
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
        <h6>Active Bookings</h6>
        <div class="kpi-value">1,380 Confirmed</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Parent Portal Reservations</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>SMS Confirmation</h6>
        <div class="kpi-value">100% Dispatched</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Slot Details Sent to Mobile</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-chat-dots-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Rescheduled Slots</h6>
        <div class="kpi-value">24 Changes</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Self-Managed via App</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-arrow-left-right"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Special Focus Notes</h6>
        <div class="kpi-value">842 Submitted</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Pre-Shared with Faculty</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-pencil-square"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search booking reference #, parent, student...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Grades</option>
      <option >Pre-Primary (Nursery/Prep)</option>
      <option >Primary Wing (Class 1-5)</option>
      <option >Middle Wing (Class 6-8)</option>
      <option >Secondary (Class 9-10)</option>
      <option >Senior Secondary (Class 11-12)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Confirmed</option>
      <option >Rescheduled</option>
      <option >Attended</option>
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
        <th>Booking Ref #</th>
        <th>Student Full Name</th>
        <th>Class & Section</th>
        <th>Parent / Guardian</th>
        <th>Teacher Appointed</th>
        <th>Slot Time</th>
        <th>Discussion Notes</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BKG-2024-8491</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Roll #01</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">Rajesh Sharma (+91 98112 34567)</small></td>
        <td><small class="text-muted font-mono font-size-12">Mrs. Sunita Kaul (Class Teacher)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">29 Nov (08:30 AM)</span></td>
        <td><small class="text-muted">Maths pre-board doubt resolution</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent Booking Portal')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BKG-2024-8492</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Roll #02</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">Bhavin Patel (+91 98223 45678)</small></td>
        <td><small class="text-muted font-mono font-size-12">Mrs. Sunita Kaul (Class Teacher)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">29 Nov (08:42 AM)</span></td>
        <td><small class="text-muted">Time management during science exam</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent Booking Portal')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BKG-2024-8493</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Roll #03</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">Manpreet Singh (+91 98334 56789)</small></td>
        <td><small class="text-muted font-mono font-size-12">Mr. Rajiv Narang (Class Teacher)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">29 Nov (09:00 AM)</span></td>
        <td><small class="text-muted">Hindi language handwriting guidance</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent Booking Portal')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BKG-2024-8494</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Roll #04</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">R. Venkatesh Iyer (+91 98445 67890)</small></td>
        <td><small class="text-muted font-mono font-size-12">Mr. Rajiv Narang (Class Teacher)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">29 Nov (09:15 AM)</span></td>
        <td><small class="text-muted">CBSE board registration spelling check</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent Booking Portal')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BKG-2024-8495</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Roll #05</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-dark">Sanjay Gupta (+91 98556 78901)</small></td>
        <td><small class="text-muted font-mono font-size-12">Dr. Alok Verma (Physics HOD)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">29 Nov (09:30 AM)</span></td>
        <td><small class="text-muted">JEE Main vs Board balance advisory</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent Booking Portal')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BKG-2024-8496</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Roll #06</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCB)</span></td>
        <td><small class="text-dark">Dr. Alok Verma (+91 98667 89012)</small></td>
        <td><small class="text-muted font-mono font-size-12">Dr. Sunita Kapoor (Biology HOD)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">29 Nov (09:45 AM)</span></td>
        <td><small class="text-muted">NEET preparation test scores</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent Booking Portal')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BKG-2024-8497</td>
        <td>
          <div class="fw-semibold text-dark">Prisha Nair</div>
          <small class="text-muted font-size-11">Roll #07</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Commerce</span></td>
        <td><small class="text-dark">Gopalan Nair (+91 98445 77889)</small></td>
        <td><small class="text-muted font-mono font-size-12">Mrs. Radhika Iyer (Accounts HOD)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">29 Nov (10:15 AM)</span></td>
        <td><small class="text-muted">Applied maths syllabus completion</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent Booking Portal')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BKG-2024-8498</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Mehta</div>
          <small class="text-muted font-size-11">Roll #08</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 3 - Section A</span></td>
        <td><small class="text-dark">Rakesh Mehta (+91 98667 99001)</small></td>
        <td><small class="text-muted font-mono font-size-12">Mrs. Pooja Sharma (Class Teacher)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">29 Nov (10:30 AM)</span></td>
        <td><small class="text-muted">Involvement in co-curricular clubs</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Parent Booking Portal')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
