<?php
/**
 * EDUSYS PRO - LEAD SOURCES
 * Dedicated operational interface & records management for Lead Sources
 */
$page_title = "Lead Sources";
$page_desc = "Multi-channel acquisition attribution: Website, Social Ads, Parent Referrals, Education Fairs, and Print Banners";
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
    <h1><i class="bi bi-diagram-3-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'lead-sources_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Add Lead Channel
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Top Source</h6>
        <div class="kpi-value">Google Search (42%)</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 8.4% Conversion Rate</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-google"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Parent Referrals</h6>
        <div class="kpi-value">284 Leads (23%)</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Highest 78% Enroll Yield</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Active Campaigns</h6>
        <div class="kpi-value">8 Live Channels</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Autumn Intake 2025-26</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-megaphone-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Cost Per Lead</h6>
        <div class="kpi-value">₹420 Avg</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> -18% Lower YoY</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-currency-rupee"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search channel name, campaign ID, manager...">
    </div>
    <select class="form-select" style="max-width: 220px;">
      <option selected>All Source Types</option>
      <option >Digital Search & PPC</option>
      <option >Parent & Alumni Referrals</option>
      <option >Social Media (Instagram/FB)</option>
      <option >Education Expos & Walk-ins</option>
      <option >Outdoor Hoardings</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active Campaign</option>
      <option >Paused</option>
      <option >Seasonal</option>
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
        <th>Channel Code</th>
        <th>Acquisition Channel</th>
        <th>Category</th>
        <th>Total Leads</th>
        <th>Applications</th>
        <th>Admissions Done</th>
        <th>Cost / Lead</th>
        <th>Performance</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SRC-GOOGLE</td>
        <td>
          <div class="fw-semibold text-dark">Google Organic & Ads (SEO/SEM)</div>
          <small class="text-muted font-size-11">Campaign: CBSE South Delhi</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Digital Search</span></td>
        <td><small class="text-dark">524 Leads</small></td>
        <td><small class="text-muted font-mono font-size-12">210 Forms</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">84 Enrolled</span></td>
        <td><small class="text-muted">₹380</small></td>
        <td><span class="badge-status badge-active">High Yield</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lead Sources')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SRC-REFERRAL</td>
        <td>
          <div class="fw-semibold text-dark">Parent & Staff Word-of-Mouth</div>
          <small class="text-muted font-size-11">Sibling & Friend Circle</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Referral Network</span></td>
        <td><small class="text-dark">284 Leads</small></td>
        <td><small class="text-muted font-mono font-size-12">196 Forms</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">142 Enrolled</span></td>
        <td><small class="text-muted">₹0 (Organic)</small></td>
        <td><span class="badge-status badge-active">Top ROI (78%)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lead Sources')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SRC-INSTA</td>
        <td>
          <div class="fw-semibold text-dark">Instagram & Facebook Meta Ads</div>
          <small class="text-muted font-size-11">Video Tour of Campus</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Social Media</span></td>
        <td><small class="text-dark">186 Leads</small></td>
        <td><small class="text-muted font-mono font-size-12">62 Forms</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">24 Enrolled</span></td>
        <td><small class="text-muted">₹520</small></td>
        <td><span class="badge-status badge-active">Good Reach</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lead Sources')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SRC-WALKIN</td>
        <td>
          <div class="fw-semibold text-dark">Direct Campus Walk-In Reception</div>
          <small class="text-muted font-size-11">Neighbourhood Families</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Direct Footfall</span></td>
        <td><small class="text-dark">112 Leads</small></td>
        <td><small class="text-muted font-mono font-size-12">88 Forms</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">45 Enrolled</span></td>
        <td><small class="text-muted">₹0</small></td>
        <td><span class="badge-status badge-active">High Intent</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lead Sources')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SRC-EXPO</td>
        <td>
          <div class="fw-semibold text-dark">World Education Fair (Pragati Maidan)</div>
          <small class="text-muted font-size-11">Stall #B-24 Booth</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Education Expo</span></td>
        <td><small class="text-dark">74 Leads</small></td>
        <td><small class="text-muted font-mono font-size-12">38 Forms</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">16 Enrolled</span></td>
        <td><small class="text-muted">₹890</small></td>
        <td><span class="badge-status badge-pending">Moderate</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lead Sources')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SRC-HOARDING</td>
        <td>
          <div class="fw-semibold text-dark">Metro Pillar Banners (Sector 12 & 14)</div>
          <small class="text-muted font-size-11">Outdoor Display 90 Days</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Outdoor Print</span></td>
        <td><small class="text-dark">42 Leads</small></td>
        <td><small class="text-muted font-mono font-size-12">18 Forms</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">8 Enrolled</span></td>
        <td><small class="text-muted">₹1,240</small></td>
        <td><span class="badge-status badge-pending">Brand Aware</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lead Sources')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SRC-NEWSPAPER</td>
        <td>
          <div class="fw-semibold text-dark">Hindustan Times School Guide</div>
          <small class="text-muted font-size-11">Quarter Page Sunday Insert</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Print Media</span></td>
        <td><small class="text-dark">18 Leads</small></td>
        <td><small class="text-muted font-mono font-size-12">10 Forms</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">4 Enrolled</span></td>
        <td><small class="text-muted">₹1,850</small></td>
        <td><span class="badge-status badge-pending">High Cost</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Lead Sources')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">SRC-ALUMNI</td>
        <td>
          <div class="fw-semibold text-dark">DPGA Alumni Association Portal</div>
          <small class="text-muted font-size-11">Second Generation Kids</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Alumni Network</span></td>
        <td><small class="text-dark">22 Leads</small></td>
        <td><small class="text-muted font-mono font-size-12">20 Forms</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">18 Enrolled</span></td>
        <td><small class="text-muted">₹0</small></td>
        <td><span class="badge-status badge-active">100% Converted</span></td>
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
