<?php
/**
 * EDUSYS PRO - Publishers Master
 */
$page_title = "Publishers Master";
$page_desc = "NCERT, Oxford, Pearson and regional textbook publishers";
$active_module = "library";
$active_submodule = "publishers.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'publishers_export.csv')" title="Export Table as CSV">
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
        <th class="sortable">Accession #</th>
        <th class="sortable">Book Title & Subtitle</th>
        <th>Author</th>
        <th>Category / Dewey Class</th>
        <th>Shelf Location</th>
        <th>Total Copies</th>
        <th>Issued</th>
        <th>Available</th>
        <th class="text-center">Actions</th>
      </tr>
    
        </thead>
        <tbody>
          
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACC-10821</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">NCERT Exemplar Problems - Mathematics X</div>
          <small class="text-muted">ISBN Barcode Enabled</small>
        </td>
        <td><small class="text-muted">NCERT Editorial Group</small></td>
        <td><span class="badge bg-light text-muted border font-size-12">Mathematics (510)</span></td>
        <td><span class="font-mono font-size-12 text-primary">Rack S-14 / Shelf 2</span></td>
        <td class="fw-semibold">25</td>
        <td class="text-warning fw-semibold">18</td>
        <td class="text-success fw-bold">7</td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Publishers Master')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACC-10822</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Concepts of Physics (Vol 1 & 2)</div>
          <small class="text-muted">ISBN Barcode Enabled</small>
        </td>
        <td><small class="text-muted">Dr. H. C. Verma</small></td>
        <td><span class="badge bg-light text-muted border font-size-12">Physics (530)</span></td>
        <td><span class="font-mono font-size-12 text-primary">Rack P-02 / Shelf 1</span></td>
        <td class="fw-semibold">30</td>
        <td class="text-warning fw-semibold">26</td>
        <td class="text-success fw-bold">4</td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Publishers Master')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACC-10823</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Wings of Fire - An Autobiography</div>
          <small class="text-muted">ISBN Barcode Enabled</small>
        </td>
        <td><small class="text-muted">Dr. A. P. J. Abdul Kalam</small></td>
        <td><span class="badge bg-light text-muted border font-size-12">Biography (920)</span></td>
        <td><span class="font-mono font-size-12 text-primary">Rack B-05 / Shelf 3</span></td>
        <td class="fw-semibold">15</td>
        <td class="text-warning fw-semibold">12</td>
        <td class="text-success fw-bold">3</td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Publishers Master')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACC-10824</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Comprehensive Chemistry for Class XII</div>
          <small class="text-muted">ISBN Barcode Enabled</small>
        </td>
        <td><small class="text-muted">Dr. O. P. Tandon</small></td>
        <td><span class="badge bg-light text-muted border font-size-12">Chemistry (540)</span></td>
        <td><span class="font-mono font-size-12 text-primary">Rack C-08 / Shelf 2</span></td>
        <td class="fw-semibold">20</td>
        <td class="text-warning fw-semibold">15</td>
        <td class="text-success fw-bold">5</td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Publishers Master')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACC-10825</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Together with Science Class 10</div>
          <small class="text-muted">ISBN Barcode Enabled</small>
        </td>
        <td><small class="text-muted">Rachna Sagar Editorial</small></td>
        <td><span class="badge bg-light text-muted border font-size-12">General Science (500)</span></td>
        <td><span class="font-mono font-size-12 text-primary">Rack G-01 / Shelf 4</span></td>
        <td class="fw-semibold">40</td>
        <td class="text-warning fw-semibold">35</td>
        <td class="text-success fw-bold">5</td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Publishers Master')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACC-10826</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Oxford Advanced Learner's Dictionary</div>
          <small class="text-muted">ISBN Barcode Enabled</small>
        </td>
        <td><small class="text-muted">A. S. Hornby</small></td>
        <td><span class="badge bg-light text-muted border font-size-12">Reference (420)</span></td>
        <td><span class="font-mono font-size-12 text-primary">Rack R-01 / Shelf 1</span></td>
        <td class="fw-semibold">10</td>
        <td class="text-warning fw-semibold">3</td>
        <td class="text-success fw-bold">7</td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Publishers Master')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACC-10827</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Discovery of India</div>
          <small class="text-muted">ISBN Barcode Enabled</small>
        </td>
        <td><small class="text-muted">Jawaharlal Nehru</small></td>
        <td><span class="badge bg-light text-muted border font-size-12">Indian History (954)</span></td>
        <td><span class="font-mono font-size-12 text-primary">Rack H-04 / Shelf 3</span></td>
        <td class="fw-semibold">12</td>
        <td class="text-warning fw-semibold">8</td>
        <td class="text-success fw-bold">4</td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Publishers Master')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACC-10828</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">Computer Science with Python XII</div>
          <small class="text-muted">ISBN Barcode Enabled</small>
        </td>
        <td><small class="text-muted">Sumita Arora</small></td>
        <td><span class="badge bg-light text-muted border font-size-12">Computer Science (004)</span></td>
        <td><span class="font-mono font-size-12 text-primary">Rack CS-03 / Shelf 2</span></td>
        <td class="fw-semibold">35</td>
        <td class="text-warning fw-semibold">31</td>
        <td class="text-success fw-bold">4</td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Publishers Master')" title="Delete"><i class="bi bi-trash"></i></button>
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