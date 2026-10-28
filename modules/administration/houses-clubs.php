<?php
/**
 * EDUSYS PRO - HOUSES & CLUBS
 * Dedicated operational interface & records management for Houses & Clubs
 */
$page_title = "Houses & Clubs";
$page_desc = "Inter-house governance, house master appointments, student council leadership, and co-curricular hobby clubs";
$active_module = "administration";
$active_submodule = "houses-clubs.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'houses-clubs_export.csv')" title="Export Table as CSV">
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
        <h6>Student Houses</h6>
        <div class="kpi-value">4 Houses</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Ashoka, Tagore, Shivaji, Raman</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-shaded"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>House Leader</h6>
        <div class="kpi-value">Tagore House</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 340 Points (Running Trophy)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-trophy-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Hobby Clubs</h6>
        <div class="kpi-value">12 Active Clubs</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Robotics, Coding, Debate, Eco</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-palette-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Total Enrolments</h6>
        <div class="kpi-value">1,420 Students</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> 100% Student Participation</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search house name, club title, mentor...">
    </div>
    <select class="form-select" style="max-width: 240px;">
      <option selected>All Categories</option>
      <option >Student Houses (Inter-House)</option>
      <option >STEM & Innovation Clubs</option>
      <option >Performing & Visual Arts</option>
      <option >Literary & Public Speaking</option>
      <option >Eco & Community Outreach</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Active & Chartered</option>
      <option >Championship Leader</option>
      <option >Recruiting Members</option>
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
        <th>Entity Code</th>
        <th>House / Club Title & Theme</th>
        <th>Category</th>
        <th>Faculty Master / Mentor</th>
        <th>Student Captain / Lead</th>
        <th>Active Members</th>
        <th>House / Club Color</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HOU-ASHOKA</td>
        <td>
          <div class="fw-semibold text-dark">Ashoka House (The Lions of Valor)</div>
          <small class="text-muted font-size-11">Motto: Courage, Truth & Righteousness</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Student House</span></td>
        <td><small class="text-dark">Dr. Alok Verma (House Master)</small></td>
        <td><small class="text-muted font-mono font-size-12">Rohan Gupta (House Captain)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">370 Students</span></td>
        <td><small class="text-muted">Crimson Red (#dc2626)</small></td>
        <td><span class="badge-status badge-active">Active (310 Pts)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Houses & Clubs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HOU-TAGORE</td>
        <td>
          <div class="fw-semibold text-dark">Tagore House (The Poets of Wisdom)</div>
          <small class="text-muted font-size-11">Motto: Knowledge, Culture & Harmony</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Student House</span></td>
        <td><small class="text-dark">Mrs. Radhika Iyer (House Master)</small></td>
        <td><small class="text-muted font-mono font-size-12">Diya Patel (House Captain)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">370 Students</span></td>
        <td><small class="text-muted">Royal Blue (#2563eb)</small></td>
        <td><span class="badge-status badge-active">Leader (340 Pts)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Houses & Clubs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HOU-SHIVAJI</td>
        <td>
          <div class="fw-semibold text-dark">Shivaji House (The Warriors of Honor)</div>
          <small class="text-muted font-size-11">Motto: Gallantry, Duty & Sacrifice</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Student House</span></td>
        <td><small class="text-dark">Mr. Rajiv Narang (House Master)</small></td>
        <td><small class="text-muted font-mono font-size-12">Harpreet Singh (House Captain)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">370 Students</span></td>
        <td><small class="text-muted">Saffron Yellow (#eab308)</small></td>
        <td><span class="badge-status badge-active">Active (295 Pts)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Houses & Clubs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">HOU-RAMAN</td>
        <td>
          <div class="fw-semibold text-dark">Raman House (The Pioneers of Science)</div>
          <small class="text-muted font-size-11">Motto: Innovation, Discovery & Vision</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Student House</span></td>
        <td><small class="text-dark">Dr. Sunita Kapoor (House Master)</small></td>
        <td><small class="text-muted font-mono font-size-12">Ananya Iyer (House Captain)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">372 Students</span></td>
        <td><small class="text-muted">Emerald Green (#16a34a)</small></td>
        <td><span class="badge-status badge-active">Active (325 Pts)</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Houses & Clubs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CLB-ROBOTICS</td>
        <td>
          <div class="fw-semibold text-dark">Atal Robotics & AI Innovation Club</div>
          <small class="text-muted font-size-11">Autonomous Bot Battles & IoT Projects</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">STEM Club</span></td>
        <td><small class="text-dark">Mr. Vikramaditya Sen</small></td>
        <td><small class="text-muted font-mono font-size-12">Reyansh Joshi (President)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">65 Students</span></td>
        <td><small class="text-muted">Cyan Blue (#06b6d4)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Houses & Clubs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CLB-DEBATE</td>
        <td>
          <div class="fw-semibold text-dark">Kalam Parliamentary Debating Society</div>
          <small class="text-muted font-size-11">Model United Nations & British Parliamentary</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Literary Club</span></td>
        <td><small class="text-dark">Mrs. Meenakshi Soni</small></td>
        <td><small class="text-muted font-mono font-size-12">Zara Khan (Secretary)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">48 Students</span></td>
        <td><small class="text-muted">Purple (#9333ea)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Houses & Clubs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CLB-ECO</td>
        <td>
          <div class="fw-semibold text-dark">Prakriti Eco & Climate Warriors Club</div>
          <small class="text-muted font-size-11">Organic Garden, Waste Segregation & Solar</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Eco Club</span></td>
        <td><small class="text-dark">Mrs. Shalini Verma</small></td>
        <td><small class="text-muted font-mono font-size-12">Kabir Mehta (Junior Lead)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">85 Students</span></td>
        <td><small class="text-muted">Leaf Green (#15803d)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Houses & Clubs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">CLB-CODING</td>
        <td>
          <div class="fw-semibold text-dark">Turing CodeCraft & Web Developers Club</div>
          <small class="text-muted font-size-11">Python, Web Apps, Cyber Security & CTF</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">STEM Club</span></td>
        <td><small class="text-dark">Mr. Kunal Bansal</small></td>
        <td><small class="text-muted font-mono font-size-12">Aarav Sharma (Lead Coder)</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">72 Students</span></td>
        <td><small class="text-muted">Navy Blue (#1e3a8a)</small></td>
        <td><span class="badge-status badge-active">Active</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Houses & Clubs')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
