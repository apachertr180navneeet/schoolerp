<?php
/**
 * EDUSYS PRO - LEAD SOURCES
 * Dedicated operational interface & records management for Lead Sources
 */
$page_title = "Lead Sources";
$page_desc = "Admissions marketing channel attribution, digital ROI, and referral source metrics";
$active_module = "admissions";
$active_submodule = "lead-sources.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'lead-sources_export.csv')" title="Export Table as CSV">
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
        <h6>Top Source</h6>
        <div class="kpi-value">Website (42%)</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 524 Qualified Leads</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-globe2"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Referral Yield</h6>
        <div class="kpi-value">324 Leads</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 26% Word of Mouth</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Walk-in Counters</h6>
        <div class="kpi-value">200 Enquiries</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> 16% Front Desk Traffic</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-building-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Marketing Spend</h6>
        <div class="kpi-value">₹1,85,000</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Avg Cost/Lead ₹148</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-pie-chart-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search channel name, campaign ref, medium...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Source Categories</option>
      <option >Digital & Web Portal</option>
      <option >Parent & Alumni Referral</option>
      <option >Direct Walk-in</option>
      <option >Social Media Campaigns</option>
      <option >Print & Outdoor Ads</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >High Performing</option>
      <option >Steady</option>
      <option >Optimizing</option>
      <option >Seasonal</option>
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
        <th>Source Code</th>
        <th>Channel Name</th>
        <th>Channel Category</th>
        <th>Assigned Lead Manager</th>
        <th>Leads Generated</th>
        <th>Conversion %</th>
        <th>Cost / Lead (₹)</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SRC-WEB-01</td>
        <td>
          <div class="fw-semibold text-dark">Official Website Portal</div>
          <small class="text-muted font-size-11">Organic Search & Direct URL</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Digital Portal</span></td>
        <td><small class="text-dark">Digital Media Lead</small></td>
        <td><small class="text-muted font-mono font-size-12">524 Leads</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">48.2% Yield</span></td>
        <td><small class="text-muted">₹0 (Organic)</small></td>
        <td><span class="badge-status badge-active">High Performing</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lead Sources')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SRC-REF-02</td>
        <td>
          <div class="fw-semibold text-dark">Parent & Alumni Network</div>
          <small class="text-muted font-size-11">Sibling & Family Referrals</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Referral Program</span></td>
        <td><small class="text-dark">Dean Admissions</small></td>
        <td><small class="text-muted font-mono font-size-12">324 Leads</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">72.4% Yield</span></td>
        <td><small class="text-muted">₹0 (Referral)</small></td>
        <td><span class="badge-status badge-active">High Performing</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lead Sources')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SRC-WLK-03</td>
        <td>
          <div class="fw-semibold text-dark">Campus Front Desk Walk-ins</div>
          <small class="text-muted font-size-11">Physical In-Person Inquiries</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Front Office</span></td>
        <td><small class="text-dark">Head Receptionist</small></td>
        <td><small class="text-muted font-mono font-size-12">200 Leads</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">61.0% Yield</span></td>
        <td><small class="text-muted">₹85 / Visitor</small></td>
        <td><span class="badge-status badge-active">Steady</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lead Sources')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SRC-SOC-04</td>
        <td>
          <div class="fw-semibold text-dark">Meta & Instagram Ads</div>
          <small class="text-muted font-size-11">Spring 2025 Intake Campaign</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Digital Campaign</span></td>
        <td><small class="text-dark">Growth Agency</small></td>
        <td><small class="text-muted font-mono font-size-12">137 Leads</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">34.5% Yield</span></td>
        <td><small class="text-muted">₹420 / Lead</small></td>
        <td><span class="badge-status badge-pending">Optimizing</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lead Sources')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SRC-GGL-05</td>
        <td>
          <div class="fw-semibold text-dark">Google Ads (Search)</div>
          <small class="text-muted font-size-11">Best CBSE School Near Me</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Paid Search</span></td>
        <td><small class="text-dark">Growth Agency</small></td>
        <td><small class="text-muted font-mono font-size-12">85 Leads</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">41.2% Yield</span></td>
        <td><small class="text-muted">₹650 / Lead</small></td>
        <td><span class="badge-status badge-active">Steady</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lead Sources')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SRC-PRT-06</td>
        <td>
          <div class="fw-semibold text-dark">Newspaper Inserts (TOI/HT)</div>
          <small class="text-muted font-size-11">Admission Open Display Ads</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Print Media</span></td>
        <td><small class="text-dark">PR Desk</small></td>
        <td><small class="text-muted font-mono font-size-12">45 Leads</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">28.0% Yield</span></td>
        <td><small class="text-muted">₹890 / Lead</small></td>
        <td><span class="badge-status badge-inactive">Seasonal</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lead Sources')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SRC-FAR-07</td>
        <td>
          <div class="fw-semibold text-dark">Education World School Fair</div>
          <small class="text-muted font-size-11">Annual Exhibition Counter</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Event / Expo</span></td>
        <td><small class="text-dark">Admissions Team</small></td>
        <td><small class="text-muted font-mono font-size-12">32 Leads</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">38.5% Yield</span></td>
        <td><small class="text-muted">₹1,200 / Lead</small></td>
        <td><span class="badge-status badge-pending">Seasonal</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lead Sources')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SRC-AGY-08</td>
        <td>
          <div class="fw-semibold text-dark">Corporate Tie-ups (IT Parks)</div>
          <small class="text-muted font-size-11">DLF Cybercity Special Quota</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Corporate Outreach</span></td>
        <td><small class="text-dark">Liaison Officer</small></td>
        <td><small class="text-muted font-mono font-size-12">28 Leads</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">68.0% Yield</span></td>
        <td><small class="text-muted">₹150 / Lead</small></td>
        <td><span class="badge-status badge-active">Steady</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lead Sources')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
