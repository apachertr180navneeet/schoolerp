<?php
/**
 * EDUSYS PRO - MEETING FEEDBACK
 * Dedicated operational interface & records management for Meeting Feedback
 */
$page_title = "Meeting Feedback";
$page_desc = "Post-PTM parental satisfaction ratings, teacher resolution notes, and remedial action trackers";
$active_module = "events-ptm";
$active_submodule = "meeting-feedback.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'meeting-feedback_export.csv')" title="Export Table as CSV">
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
        <h6>Feedback Received</h6>
        <div class="kpi-value">1,290 Forms</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 93.5% Response Rate</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-chat-left-quote-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Approval Rating</h6>
        <div class="kpi-value">96.8%</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Satisfied / Very Satisfied</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-emoji-smile-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Action Items Logged</h6>
        <div class="kpi-value">142 Actions</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Remedial Coaching Due</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-list-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Follow-up Resolved</h6>
        <div class="kpi-value">128 Closed</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Within 7 Working Days</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-check2-circle"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search feedback ID, student, parent, rating...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Ratings</option>
      <option >5 Stars (Exceptional)</option>
      <option >4 Stars (Very Good)</option>
      <option >3 Stars (Satisfactory)</option>
      <option >2 Stars (Needs Follow-up)</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Resolved & Closed</option>
      <option >Remedial Assigned</option>
      <option >Action in Progress</option>
      <option >Pending Teacher Response</option>
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
        <th>Feedback #</th>
        <th>Student Full Name</th>
        <th>Class & Section</th>
        <th>Parent Reviewer</th>
        <th>Rating</th>
        <th>Key Discussion Summary</th>
        <th>Remedial Action Agreed</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FDB-2024-1290</td>
        <td>
          <div class="fw-semibold text-dark">Aarav Sharma</div>
          <small class="text-muted font-size-11">Roll #01</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">Rajesh Sharma</small></td>
        <td><small class="text-muted font-mono font-size-12">★★★★★ (5/5)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Appreciated dedicated doubt clearing sessions</span></td>
        <td><small class="text-muted">Extra practice worksheets assigned for Trigo</small></td>
        <td><span class="badge-status badge-active">Resolved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Meeting Feedback')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FDB-2024-1289</td>
        <td>
          <div class="fw-semibold text-dark">Diya Patel</div>
          <small class="text-muted font-size-11">Roll #02</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section A</span></td>
        <td><small class="text-dark">Bhavin Patel</small></td>
        <td><small class="text-muted font-mono font-size-12">★★★★★ (5/5)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Excellent feedback on presentation skills</span></td>
        <td><small class="text-muted">Continue weekly mock timed tests</small></td>
        <td><span class="badge-status badge-active">Resolved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Meeting Feedback')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FDB-2024-1288</td>
        <td>
          <div class="fw-semibold text-dark">Vihaan Singh</div>
          <small class="text-muted font-size-11">Roll #03</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">Manpreet Singh</small></td>
        <td><small class="text-muted font-mono font-size-12">★★★★☆ (4/5)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Requested extra guidance in Hindi grammar</span></td>
        <td><small class="text-muted">Enrolled in Saturday Remedial Clinic</small></td>
        <td><span class="badge-status badge-active">Remedial Assigned</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Meeting Feedback')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FDB-2024-1287</td>
        <td>
          <div class="fw-semibold text-dark">Ananya Iyer</div>
          <small class="text-muted font-size-11">Roll #04</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 10 - Section B</span></td>
        <td><small class="text-dark">R. Venkatesh Iyer</small></td>
        <td><small class="text-muted font-mono font-size-12">★★★★★ (5/5)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Happy with teacher accessibility & feedback</span></td>
        <td><small class="text-muted">Encouraged for Science Exhibition leadership</small></td>
        <td><span class="badge-status badge-active">Resolved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Meeting Feedback')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FDB-2024-1286</td>
        <td>
          <div class="fw-semibold text-dark">Rohan Gupta</div>
          <small class="text-muted font-size-11">Roll #05</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCM)</span></td>
        <td><small class="text-dark">Sanjay Gupta</small></td>
        <td><small class="text-muted font-mono font-size-12">★★★★☆ (4/5)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Requested guidance on balancing JEE test dates</span></td>
        <td><small class="text-muted">Counselor scheduled individual roadmap session</small></td>
        <td><span class="badge-status badge-active">Action in Progress</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Meeting Feedback')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FDB-2024-1285</td>
        <td>
          <div class="fw-semibold text-dark">Ishaan Verma</div>
          <small class="text-muted font-size-11">Roll #06</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 12 - Science (PCB)</span></td>
        <td><small class="text-dark">Dr. Alok Verma</small></td>
        <td><small class="text-muted font-mono font-size-12">★★★★★ (5/5)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Very satisfied with Biology lab practical hours</span></td>
        <td><small class="text-muted">Maintain high consistency in Chemistry</small></td>
        <td><span class="badge-status badge-active">Resolved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Meeting Feedback')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FDB-2024-1284</td>
        <td>
          <div class="fw-semibold text-dark">Prisha Nair</div>
          <small class="text-muted font-size-11">Roll #07</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 11 - Commerce</span></td>
        <td><small class="text-dark">Gopalan Nair</small></td>
        <td><small class="text-muted font-mono font-size-12">★★★★★ (5/5)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Commended HOD Commerce on real-world examples</span></td>
        <td><small class="text-muted">Nominated for Inter-School Business Conclave</small></td>
        <td><span class="badge-status badge-active">Resolved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Meeting Feedback')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">FDB-2024-1283</td>
        <td>
          <div class="fw-semibold text-dark">Kabir Mehta</div>
          <small class="text-muted font-size-11">Roll #08</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Class 3 - Section A</span></td>
        <td><small class="text-dark">Rakesh Mehta</small></td>
        <td><small class="text-muted font-mono font-size-12">★★★★★ (5/5)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Child is confident and loves library period</span></td>
        <td><small class="text-muted">Encourage bilingual reading habits at home</small></td>
        <td><span class="badge-status badge-active">Resolved</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Meeting Feedback')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
