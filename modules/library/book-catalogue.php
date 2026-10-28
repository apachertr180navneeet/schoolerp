<?php
/**
 * EDUSYS PRO - Book Catalogue
 */
$page_title = "Book Catalogue";
$page_desc = "Dedicated operational interface & records management for Book Catalogue";
$active_module = "library";
$active_submodule = "book-catalogue.php";
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
      <li class="breadcrumb-item"><?php echo htmlspecialchars($active_module); ?></li>
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
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'book-catalogue_export.csv')" title="Export Table as CSV">
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
        <h6>Cataloged Titles</h6>
        <div class="kpi-value">28,450 Volumes</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Barcode / RFID</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-book-half"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Issued Books</h6>
        <div class="kpi-value">1,840 Books</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Circulating to Learners</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-arrow-left-right"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>On Racks Available</h6>
        <div class="kpi-value">26,610 Books</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Across 44 Book Racks</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-journal-bookmark"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Digital E-Books</h6>
        <div class="kpi-value">12,500 Titles</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> National Digital Library</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-laptop"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search accession #, book title, author, ISBN...">
    </div>
    <select class="form-select" style="max-width: 200px;">
      <option selected>All Dewey Classes</option>
      <option >Science & Technology (500)</option>
      <option >Mathematics (510)</option>
      <option >Physics (530)</option>
      <option >Chemistry (540)</option>
      <option >Literature & Fiction (800)</option>
      <option >Indian History (954)</option>
    </select>
    <select class="form-select" style="max-width: 150px;">
      <option selected>All Status</option>
      <option>Active / Verified</option>
      <option>In Review</option>
      <option>Approved</option>
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
        <th>Accession #</th>
        <th>Book Title & Subtitle</th>
        <th>Author Name</th>
        <th>Category / Dewey Class</th>
        <th>Shelf / Rack Location</th>
        <th>Total Copies</th>
        <th>Issued</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACC-10821</td>
        <td>
          <div class="fw-semibold text-dark">NCERT Exemplar Problems - Mathematics X</div>
          <small class="text-muted font-size-11">CBSE Curriculum Reference</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">NCERT Editorial Group</span></td>
        <td><small class="text-dark">Mathematics (510)</small></td>
        <td><small class="text-muted font-mono font-size-12">Rack S-14 / Shelf 2</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">25 Copies</span></td>
        <td><small class="text-muted">18 Issued</small></td>
        <td><span class="badge-status badge-active">7 Available</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Book Catalogue')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACC-10822</td>
        <td>
          <div class="fw-semibold text-dark">Concepts of Physics (Vol 1 & 2)</div>
          <small class="text-muted font-size-11">Senior Secondary Foundation</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Dr. H. C. Verma</span></td>
        <td><small class="text-dark">Physics (530)</small></td>
        <td><small class="text-muted font-mono font-size-12">Rack P-02 / Shelf 1</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">30 Copies</span></td>
        <td><small class="text-muted">26 Issued</small></td>
        <td><span class="badge-status badge-active">4 Available</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Book Catalogue')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACC-10823</td>
        <td>
          <div class="fw-semibold text-dark">Wings of Fire - An Autobiography</div>
          <small class="text-muted font-size-11">Motivational Biography</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Dr. A. P. J. Abdul Kalam</span></td>
        <td><small class="text-dark">Biography (920)</small></td>
        <td><small class="text-muted font-mono font-size-12">Rack B-05 / Shelf 3</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">15 Copies</span></td>
        <td><small class="text-muted">12 Issued</small></td>
        <td><span class="badge-status badge-active">3 Available</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Book Catalogue')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACC-10824</td>
        <td>
          <div class="fw-semibold text-dark">Comprehensive Chemistry for Class XII</div>
          <small class="text-muted font-size-11">CBSE & NEET Guide</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Dr. O. P. Tandon</span></td>
        <td><small class="text-dark">Chemistry (540)</small></td>
        <td><small class="text-muted font-mono font-size-12">Rack C-08 / Shelf 2</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">20 Copies</span></td>
        <td><small class="text-muted">15 Issued</small></td>
        <td><span class="badge-status badge-active">5 Available</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Book Catalogue')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACC-10825</td>
        <td>
          <div class="fw-semibold text-dark">Together with Science Class 10</div>
          <small class="text-muted font-size-11">Board Examination Practice</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Rachna Sagar Editorial</span></td>
        <td><small class="text-dark">General Science (500)</small></td>
        <td><small class="text-muted font-mono font-size-12">Rack G-01 / Shelf 4</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">40 Copies</span></td>
        <td><small class="text-muted">35 Issued</small></td>
        <td><span class="badge-status badge-active">5 Available</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Book Catalogue')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACC-10826</td>
        <td>
          <div class="fw-semibold text-dark">Oxford Advanced Learner's Dictionary</div>
          <small class="text-muted font-size-11">English Language Standard</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">A. S. Hornby</span></td>
        <td><small class="text-dark">Reference (420)</small></td>
        <td><small class="text-muted font-mono font-size-12">Rack R-01 / Shelf 1</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">10 Copies</span></td>
        <td><small class="text-muted">3 Issued</small></td>
        <td><span class="badge-status badge-active">7 Available</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Book Catalogue')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACC-10827</td>
        <td>
          <div class="fw-semibold text-dark">Discovery of India</div>
          <small class="text-muted font-size-11">Historical Chronicle</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Jawaharlal Nehru</span></td>
        <td><small class="text-dark">Indian History (954)</small></td>
        <td><small class="text-muted font-mono font-size-12">Rack H-04 / Shelf 3</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">12 Copies</span></td>
        <td><small class="text-muted">8 Issued</small></td>
        <td><span class="badge-status badge-active">4 Available</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Book Catalogue')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">ACC-10828</td>
        <td>
          <div class="fw-semibold text-dark">Computer Science with Python XII</div>
          <small class="text-muted font-size-11">CBSE Class 12 Syllabus</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Sumita Arora</span></td>
        <td><small class="text-dark">Computer Science (004)</small></td>
        <td><small class="text-muted font-mono font-size-12">Rack CS-03 / Shelf 2</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">35 Copies</span></td>
        <td><small class="text-muted">31 Issued</small></td>
        <td><span class="badge-status badge-active">4 Available</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Book Catalogue')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>


<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
