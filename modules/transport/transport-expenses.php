<?php
/**
 * EDUSYS PRO - Transport Expenses
 */
$page_title = "Transport Expenses";
$page_desc = "Toll taxes, driver overtime, fuel and maintenance cost audit";
$active_module = "transport";
$active_submodule = "transport-expenses.php";
$depth = 2;

require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/sidebar.php';
require_once __DIR__ . '/../../includes/topbar.php';
?>

<!-- Page Header Box -->
<div class="page-header-box">
  <div class="page-title-group">
    <h1><i class="bi bi-check2-circle text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'transport-expenses_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Add New Record
    </button>
  </div>
</div>

<div class="row g-3 mb-4">
      <div class="col-6 col-md-3">
        <div class="kpi-card kpi-primary">
          <div class="kpi-info">
            <h6>Total Entries</h6>
            <div class="kpi-value">1,482</div>
            <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Synced</div>
          </div>
          <div class="kpi-icon"><i class="bi bi-collection-fill"></i></div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="kpi-card kpi-success">
          <div class="kpi-info">
            <h6>Active / Verified</h6>
            <div class="kpi-value">1,390</div>
            <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 94% Approved</div>
          </div>
          <div class="kpi-icon"><i class="bi bi-patch-check-fill"></i></div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="kpi-card kpi-warning">
          <div class="kpi-info">
            <h6>Pending Review</h6>
            <div class="kpi-value">68</div>
            <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> In Workflow</div>
          </div>
          <div class="kpi-icon"><i class="bi bi-hourglass-split"></i></div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="kpi-card kpi-info">
          <div class="kpi-info">
            <h6>Board Compliant</h6>
            <div class="kpi-value">100%</div>
            <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> CBSE Validated</div>
          </div>
          <div class="kpi-icon"><i class="bi bi-award-fill"></i></div>
        </div>
      </div>
    </div>
  
    
    
    <div class="table-filter-bar">
      <div class="table-filter-left">
        <div class="table-search-input">
          <i class="bi bi-search"></i>
          <input type="text" class="form-control" id="tableSearchInput" placeholder="Search by name, code, reference ID, category...">
        </div>
        <select class="form-select" style="max-width: 170px;">
          <option selected>All Classes</option>
          <option>Class 10-A</option>
          <option>Class 10-B</option>
          <option>Class 12-A (PCM)</option>
          <option>Class 12-B (PCB)</option>
          <option>Class 12-C (Comm)</option>
        </select>
        <select class="form-select" style="max-width: 150px;">
          <option selected>All Status</option>
          <option>Active / Paid</option>
          <option>Pending</option>
          <option>Approved</option>
        </select>
      </div>

      <div class="table-filter-right">
        <span class="font-size-13 text-muted">Showing <strong class="table-visible-count text-primary">8</strong> records</span>
      </div>
    </div>
  
    
    <div class="erp-table-responsive mb-0">
      <table class="erp-table" id="mainDataTable">
        <thead>
          
      <tr>
        <th class="sortable">Vehicle Plate</th>
        <th class="sortable">Bus Name / Model</th>
        <th>Assigned Route</th>
        <th>Driver & Contact</th>
        <th>Capacity</th>
        <th>GPS Status</th>
        <th>Fuel Level</th>
        <th>Fitness Expiry</th>
        <th class="text-center">Actions</th>
      </tr>
    
        </thead>
        <tbody>
          
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DL-1V-8901</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Yellow Bus 01 (Tata Starbus)</div>
          <small class="text-muted">Speed Governor Equipped</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Route 1 (Dwarka Sec 6-22)</span></td>
        <td><small class="text-muted">Gurpreet Singh (+91 97110 44551)</small></td>
        <td class="fw-semibold font-size-13">42 / 45 Seats</td>
        <td><span class="badge-status badge-active">Online (Moving)</span></td>
        <td>
          <div class="d-flex align-items-center gap-2">
            <div class="progress flex-grow-1" style="height: 6px; width: 60px;">
              <div class="progress-bar bg-success" style="width: 78%"></div>
            </div>
            <small class="text-muted">78%</small>
          </div>
        </td>
        <td><small class="text-muted">14 May 2025</small></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transport Expenses')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DL-1V-8902</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Yellow Bus 02 (Eicher Skyline)</div>
          <small class="text-muted">Speed Governor Equipped</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Route 2 (Vasant Kunj & Mehrauli)</span></td>
        <td><small class="text-muted">Mohan Lal (+91 97110 44552)</small></td>
        <td class="fw-semibold font-size-13">44 / 45 Seats</td>
        <td><span class="badge-status badge-active">Online (Moving)</span></td>
        <td>
          <div class="d-flex align-items-center gap-2">
            <div class="progress flex-grow-1" style="height: 6px; width: 60px;">
              <div class="progress-bar bg-success" style="width: 65%"></div>
            </div>
            <small class="text-muted">65%</small>
          </div>
        </td>
        <td><small class="text-muted">28 Jul 2025</small></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transport Expenses')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DL-1V-8903</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Yellow Bus 03 (Ashok Leyland)</div>
          <small class="text-muted">Speed Governor Equipped</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Route 3 (Rohini & Pitampura)</span></td>
        <td><small class="text-muted">Ramesh Chand (+91 97110 44553)</small></td>
        <td class="fw-semibold font-size-13">39 / 45 Seats</td>
        <td><span class="badge-status badge-active">Online (Idle)</span></td>
        <td>
          <div class="d-flex align-items-center gap-2">
            <div class="progress flex-grow-1" style="height: 6px; width: 60px;">
              <div class="progress-bar bg-success" style="width: 82%"></div>
            </div>
            <small class="text-muted">82%</small>
          </div>
        </td>
        <td><small class="text-muted">10 Oct 2025</small></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transport Expenses')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DL-1V-8904</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Yellow Bus 04 (Tata Starbus Ultra)</div>
          <small class="text-muted">Speed Governor Equipped</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Route 4 (South Ext & Lajpat Nagar)</span></td>
        <td><small class="text-muted">Satnam Singh (+91 97110 44554)</small></td>
        <td class="fw-semibold font-size-13">45 / 45 Seats</td>
        <td><span class="badge-status badge-active">Online (Moving)</span></td>
        <td>
          <div class="d-flex align-items-center gap-2">
            <div class="progress flex-grow-1" style="height: 6px; width: 60px;">
              <div class="progress-bar bg-success" style="width: 90%"></div>
            </div>
            <small class="text-muted">90%</small>
          </div>
        </td>
        <td><small class="text-muted">22 Nov 2025</small></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transport Expenses')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DL-1V-8905</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Yellow Bus 05 (Force Traveller)</div>
          <small class="text-muted">Speed Governor Equipped</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Route 5 (Janakpuri & Vikaspuri)</span></td>
        <td><small class="text-muted">Dharamvir (+91 97110 44555)</small></td>
        <td class="fw-semibold font-size-13">28 / 32 Seats</td>
        <td><span class="badge-status badge-active">Online (Moving)</span></td>
        <td>
          <div class="d-flex align-items-center gap-2">
            <div class="progress flex-grow-1" style="height: 6px; width: 60px;">
              <div class="progress-bar bg-success" style="width: 54%"></div>
            </div>
            <small class="text-muted">54%</small>
          </div>
        </td>
        <td><small class="text-muted">15 Jan 2025</small></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transport Expenses')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">DL-1V-8906</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Yellow Bus 06 (Tata Winger)</div>
          <small class="text-muted">Speed Governor Equipped</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Route 6 (Noida Link Road)</span></td>
        <td><small class="text-muted">Balwant Singh (+91 97110 44556)</small></td>
        <td class="fw-semibold font-size-13">20 / 22 Seats</td>
        <td><span class="badge-status badge-pending">In Depot</span></td>
        <td>
          <div class="d-flex align-items-center gap-2">
            <div class="progress flex-grow-1" style="height: 6px; width: 60px;">
              <div class="progress-bar bg-success" style="width: 88%"></div>
            </div>
            <small class="text-muted">88%</small>
          </div>
        </td>
        <td><small class="text-muted">04 Mar 2025</small></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Transport Expenses')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="erp-pagination-bar">
      <div class="pagination-info">
        Showing 1 to 8 of 1,482 entries
      </div>
      <ul class="pagination-custom">
        <li class="page-item disabled"><a class="page-link" href="#"><i class="bi bi-chevron-left"></i></a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">...</a></li>
        <li class="page-item"><a class="page-link" href="#">185</a></li>
        <li class="page-item"><a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a></li>
      </ul>
    </div>
  
  

      

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>