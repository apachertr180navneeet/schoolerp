<?php
/**
 * EDUSYS PRO - ENQUIRY FOLLOW-UPS
 * Dedicated operational interface & records management for Enquiry Follow-ups
 */
$page_title = "Enquiry Follow-ups";
$page_desc = "Telephonic, WhatsApp, and in-person counselor interaction tracking and dispositions";
$active_module = "admissions";
$active_submodule = "follow-ups.php";
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
    <h1><i class="bi bi-headset text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'follow-ups_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-calendar-plus me-1"></i> Schedule Follow-up
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Calls Scheduled</h6>
        <div class="kpi-value">64 Pending</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Today's Worklist</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-telephone-outbound-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Calls Logged Today</h6>
        <div class="kpi-value">38 Completed</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Avg Duration 5m 40s</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-headset"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Visits Scheduled</h6>
        <div class="kpi-value">18 Families</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Campus Tour Confirmed</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-geo-alt-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Overdue Callbacks</h6>
        <div class="kpi-value">6 Overdue</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Requires Escalation</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-exclamation-triangle-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search counselor, student, follow-up notes...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Communication Channels</option>
      <option >Telephonic Call</option>
      <option >WhatsApp Broadcast</option>
      <option >In-Person Consultation</option>
      <option >Email Newsletter</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Dispositions</option>
      <option >Interested & Form Sent</option>
      <option >Callback Requested</option>
      <option >Campus Visit Booked</option>
      <option >Fee Structure Shared</option>
      <option >Not Interested</option>
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
        <th>Follow-up ID</th>
        <th>Prospective Student</th>
        <th>Applied Grade</th>
        <th>Assigned Counselor</th>
        <th>Channel</th>
        <th>Counselor Remarks</th>
        <th>Callback Date</th>
        <th>Disposition</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FOL-2025-0412</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Singhania</div>
          <small class="text-muted font-size-11">Pre-Primary Wing</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 1 - Nursery</span></td>
        <td><small class="text-dark">Mrs. Shalini Verma</small></td>
        <td><small class="text-muted font-mono font-size-12">Phone Call (10 mins)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Parent very eager for Nursery; invited for campus visit tomorrow 11 AM</span></td>
        <td><small class="text-muted">29 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Visit Booked</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Enquiry Follow-ups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FOL-2025-0411</td>
        <td>
          <div class="fw-semibold text-dark">Meera Krishnan</div>
          <small class="text-muted font-size-11">Middle Wing</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 6 - Middle</span></td>
        <td><small class="text-dark">Mr. Deepak Rawat</small></td>
        <td><small class="text-muted font-mono font-size-12">WhatsApp Chat</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Shared fee structure and ICSE to CBSE transition guide; positive feedback</span></td>
        <td><small class="text-muted">30 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Form Sent</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Enquiry Follow-ups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FOL-2025-0410</td>
        <td>
          <div class="fw-semibold text-dark">Devansh Bhardwaj</div>
          <small class="text-muted font-size-11">Senior Secondary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Science (PCM)</span></td>
        <td><small class="text-dark">Dr. Sunita Kapoor</small></td>
        <td><small class="text-muted font-mono font-size-12">In-Person Session</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Father discussed IIT-JEE coaching tie-up and integrated lab facilities</span></td>
        <td><small class="text-muted">29 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Enrolled</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Enquiry Follow-ups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FOL-2025-0409</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Deshpande</div>
          <small class="text-muted font-size-11">Secondary Wing</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 9 - Secondary</span></td>
        <td><small class="text-dark">Mrs. Shalini Verma</small></td>
        <td><small class="text-muted font-mono font-size-12">Phone Call (6 mins)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Parent requested callback after 5 PM due to office meetings</span></td>
        <td><small class="text-muted">31 Oct 2024</small></td>
        <td><span class="badge-status badge-pending">Callback Req</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Enquiry Follow-ups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FOL-2025-0408</td>
        <td>
          <div class="fw-semibold text-dark">Tanvi Choudhary</div>
          <small class="text-muted font-size-11">Senior Secondary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Commerce</span></td>
        <td><small class="text-dark">Mr. Deepak Rawat</small></td>
        <td><small class="text-muted font-mono font-size-12">Phone Call (8 mins)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Application purchased online #ONL-2025-0681; entrance test scheduled</span></td>
        <td><small class="text-muted">Completed</small></td>
        <td><span class="badge-status badge-active">Converted</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Enquiry Follow-ups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FOL-2025-0407</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Mukherjee</div>
          <small class="text-muted font-size-11">Primary Wing</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 4 - Primary</span></td>
        <td><small class="text-dark">Mrs. Shalini Verma</small></td>
        <td><small class="text-muted font-mono font-size-12">WhatsApp Broadcast</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Sent digital prospectus; parent opened message; follow up on Saturday</span></td>
        <td><small class="text-muted">02 Nov 2024</small></td>
        <td><span class="badge-status badge-pending">Awaiting Reply</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Enquiry Follow-ups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FOL-2025-0406</td>
        <td>
          <div class="fw-semibold text-dark">Riyaan Kapoor</div>
          <small class="text-muted font-size-11">Pre-Primary Wing</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 1 - Prep</span></td>
        <td><small class="text-dark">Dr. Sunita Kapoor</small></td>
        <td><small class="text-muted font-mono font-size-12">Phone Call (12 mins)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Discussed transport bus route for Dwarka Sector 12; confirmed feasible</span></td>
        <td><small class="text-muted">30 Oct 2024</small></td>
        <td><span class="badge-status badge-active">Visit Booked</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Enquiry Follow-ups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FOL-2025-0405</td>
        <td>
          <div class="fw-semibold text-dark">Navya Pillai</div>
          <small class="text-muted font-size-11">Senior Secondary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Humanities</span></td>
        <td><small class="text-dark">Mr. Deepak Rawat</small></td>
        <td><small class="text-muted font-mono font-size-12">In-Person Session</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Student interested in Psychology and Fine Arts; syllabus explained</span></td>
        <td><small class="text-muted">02 Nov 2024</small></td>
        <td><span class="badge-status badge-active">Hot Lead</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Enquiry Follow-ups')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
