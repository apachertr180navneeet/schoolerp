<?php
/**
 * EDUSYS PRO - BACKUP & RESTORE UI
 * Dedicated operational interface & records management for Backup & Restore UI
 */
$page_title = "Backup & Restore UI";
$page_desc = "Automated database snapshots, AWS S3 / Google Drive cloud sync, disaster recovery points, and manual restore tools";
$active_module = "administration";
$active_submodule = "backup-restore.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'backup-restore_export.csv')" title="Export Table as CSV">
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
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Last Automated Backup</h6>
        <div class="kpi-value">Today 03:00 AM</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Nightly Cron Executed</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cloud-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Available Snapshots</h6>
        <div class="kpi-value">42 Archives</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 30-Day Rolling Retention</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-archive-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Archive Size</h6>
        <div class="kpi-value">1.84 GB</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Compressed GZIP .sql.gz</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-hdd-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Cloud Storage Sync</h6>
        <div class="kpi-value">Google Cloud</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Multi-Region Offsite Backup</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-cloud-arrow-up-fill"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search snapshot ID, archive title, location...">
    </div>
    <select class="form-select" style="max-width: 240px;">
      <option selected>All Backup Types</option>
      <option >Automated Daily MySQL Dumps</option>
      <option >Manual Pre-Update Snapshots</option>
      <option >Cloud Offsite Sync Archives</option>
      <option >Media & Document Assets Backup</option>
    </select>
    <select class="form-select" style="max-width: 170px;">
      <option selected>All Status</option>
      <option >Verified & Healthy</option>
      <option >Cloud Synced</option>
      <option >In Progress</option>
      <option >Corrupted / Voided</option>
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
        <th>Snapshot ID #</th>
        <th>Backup Archive Title</th>
        <th>Backup Scope</th>
        <th>Compression Format</th>
        <th>Archive File Size</th>
        <th>Storage Location</th>
        <th>Created Timestamp</th>
        <th>Actions</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BKP-2024-1028</td>
        <td>
          <div class="fw-semibold text-dark">Nightly Automated System Snapshot</div>
          <small class="text-muted font-size-11">Complete Database Schema & 28 Modules</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Full Database DUMP</span></td>
        <td><small class="text-dark">GZIP Compressed (.sql.gz)</small></td>
        <td><small class="text-muted font-mono font-size-12">48.2 MB</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Local Vault + Google Drive</span></td>
        <td><small class="text-muted">28 Oct 2024 (03:00 AM)</small></td>
        <td><span class="badge-status badge-active">Healthy</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Backup & Restore UI')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BKP-2024-1027</td>
        <td>
          <div class="fw-semibold text-dark">Nightly Automated System Snapshot</div>
          <small class="text-muted font-size-11">Complete Database Schema & 28 Modules</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Full Database DUMP</span></td>
        <td><small class="text-dark">GZIP Compressed (.sql.gz)</small></td>
        <td><small class="text-muted font-mono font-size-12">47.9 MB</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Local Vault + Google Drive</span></td>
        <td><small class="text-muted">27 Oct 2024 (03:00 AM)</small></td>
        <td><span class="badge-status badge-active">Healthy</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Backup & Restore UI')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BKP-2024-1026</td>
        <td>
          <div class="fw-semibold text-dark">Manual Snapshot (Pre-Term 2 Update)</div>
          <small class="text-muted font-size-11">Before Mid-Term Marks Migration</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Full Database DUMP</span></td>
        <td><small class="text-dark">GZIP Compressed (.sql.gz)</small></td>
        <td><small class="text-muted font-mono font-size-12">47.8 MB</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Local Server /backup/manual</span></td>
        <td><small class="text-muted">26 Oct 2024 (04:15 PM)</small></td>
        <td><span class="badge-status badge-active">Healthy</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Backup & Restore UI')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BKP-2024-1025</td>
        <td>
          <div class="fw-semibold text-dark">Nightly Automated System Snapshot</div>
          <small class="text-muted font-size-11">Complete Database Schema & 28 Modules</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Full Database DUMP</span></td>
        <td><small class="text-dark">GZIP Compressed (.sql.gz)</small></td>
        <td><small class="text-muted font-mono font-size-12">47.5 MB</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Local Vault + Google Drive</span></td>
        <td><small class="text-muted">25 Oct 2024 (03:00 AM)</small></td>
        <td><span class="badge-status badge-active">Healthy</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Backup & Restore UI')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BKP-2024-1024</td>
        <td>
          <div class="fw-semibold text-dark">Nightly Automated System Snapshot</div>
          <small class="text-muted font-size-11">Complete Database Schema & 28 Modules</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Full Database DUMP</span></td>
        <td><small class="text-dark">GZIP Compressed (.sql.gz)</small></td>
        <td><small class="text-muted font-mono font-size-12">47.2 MB</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Local Vault + Google Drive</span></td>
        <td><small class="text-muted">24 Oct 2024 (03:00 AM)</small></td>
        <td><span class="badge-status badge-active">Healthy</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Backup & Restore UI')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BKP-2024-1020</td>
        <td>
          <div class="fw-semibold text-dark">Weekly Cumulative Media Assets Archive</div>
          <small class="text-muted font-size-11">Student Photos, Documents & TCs</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Uploads Directory</span></td>
        <td><small class="text-dark">TAR GZIP Archive (.tar.gz)</small></td>
        <td><small class="text-muted font-mono font-size-12">842.0 MB</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">AWS S3 Coldline Storage</span></td>
        <td><small class="text-muted">20 Oct 2024 (02:00 AM)</small></td>
        <td><span class="badge-status badge-active">Healthy</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Backup & Restore UI')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BKP-2024-1015</td>
        <td>
          <div class="fw-semibold text-dark">Mid-Term Examinations Pre-Exam Backup</div>
          <small class="text-muted font-size-11">Before Exam Seating Allotment Rollout</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Full Database DUMP</span></td>
        <td><small class="text-dark">GZIP Compressed (.sql.gz)</small></td>
        <td><small class="text-muted font-mono font-size-12">46.8 MB</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Local Vault + Google Drive</span></td>
        <td><small class="text-muted">15 Oct 2024 (06:00 PM)</small></td>
        <td><span class="badge-status badge-active">Healthy</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Backup & Restore UI')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">BKP-2024-1001</td>
        <td>
          <div class="fw-semibold text-dark">Monthly Archival Baseline Snapshot</div>
          <small class="text-muted font-size-11">Full System Audit Baseline Archive</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Full Database DUMP</span></td>
        <td><small class="text-dark">GZIP Compressed (.sql.gz)</small></td>
        <td><small class="text-muted font-mono font-size-12">46.2 MB</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Local Vault + Google Drive</span></td>
        <td><small class="text-muted">01 Oct 2024 (03:00 AM)</small></td>
        <td><span class="badge-status badge-active">Healthy</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Backup & Restore UI')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
