<?php
/**
 * EDUSYS PRO - Asset Maintenance
 */
$page_title = "Asset Maintenance";
$page_desc = "Dedicated operational interface & records management for Asset Maintenance";
$active_module = "inventory";
$active_submodule = "asset-maintenance.php";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'asset-maintenance_export.csv')" title="Export Table as CSV">
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
        <h6>Stocked SKUs</h6>
        <div class="kpi-value">1,240 Items</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> Fully Barcoded Inventory</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-boxes"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Inventory Valuation</h6>
        <div class="kpi-value">₹ 48.6 Lakhs</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> Current Asset Registry</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-currency-rupee"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Low Stock Alerts</h6>
        <div class="kpi-value">14 Items</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> Reorder Triggered</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-exclamation-triangle-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Pending POs</h6>
        <div class="kpi-value">8 Orders</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> Awaiting Delivery Approval</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-truck"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search item SKU, name, supplier, category...">
    </div>
    <select class="form-select" style="max-width: 200px;">
      <option selected>All Categories</option>
      <option >Science Lab Consumables</option>
      <option >Stationery & Exam Papers</option>
      <option >IT Hardware & Cables</option>
      <option >Sports Equipment</option>
      <option >Furniture & Fixtures</option>
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
        <th>Item SKU Code</th>
        <th>Item Description & Brand</th>
        <th>Category</th>
        <th>Quantity on Hand</th>
        <th>Reorder Level</th>
        <th>Unit Cost (₹)</th>
        <th>Warehouse Location</th>
        <th>Stock Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">INV-CHM-014</td>
        <td>
          <div class="fw-semibold text-dark">Hydrochloric Acid (HCl 35% AR)</div>
          <small class="text-muted font-size-11">Merck Life Sciences</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Science Lab Consumables</span></td>
        <td><small class="text-dark">45 Litres</small></td>
        <td><small class="text-muted font-mono font-size-12">15 Litres</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹ 420 / L</span></td>
        <td><small class="text-muted">Chem Store Room S-2</small></td>
        <td><span class="badge-status badge-active">In Stock</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Asset Maintenance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">INV-EXM-008</td>
        <td>
          <div class="fw-semibold text-dark">CBSE Standard Answer Booklets (32p)</div>
          <small class="text-muted font-size-11">Security Stamped Ruled</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Stationery & Exam</span></td>
        <td><small class="text-dark">12,400 Pcs</small></td>
        <td><small class="text-muted font-mono font-size-12">2,000 Pcs</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹ 18 / Pc</span></td>
        <td><small class="text-muted">Main Store Room M-1</small></td>
        <td><span class="badge-status badge-active">In Stock</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Asset Maintenance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">INV-PHY-021</td>
        <td>
          <div class="fw-semibold text-dark">Digital Vernier Caliper (150mm)</div>
          <small class="text-muted font-size-11">Mitutoyo 0.01mm Prec</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Science Lab Equipment</span></td>
        <td><small class="text-dark">28 Units</small></td>
        <td><small class="text-muted font-mono font-size-12">5 Units</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹ 1,850 / Unit</span></td>
        <td><small class="text-muted">Physics Lab Locker 4</small></td>
        <td><span class="badge-status badge-active">In Stock</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Asset Maintenance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">INV-IT-092</td>
        <td>
          <div class="fw-semibold text-dark">Cat6 UTP Ethernet Cable Roll (305m)</div>
          <small class="text-muted font-size-11">D-Link Pure Copper</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">IT Hardware</span></td>
        <td><small class="text-dark">3 Rolls</small></td>
        <td><small class="text-muted font-mono font-size-12">5 Rolls</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹ 7,800 / Roll</span></td>
        <td><small class="text-muted">Server Room Rack 1</small></td>
        <td><span class="badge-status badge-inactive">Low Stock Alert</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Asset Maintenance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">INV-SPT-044</td>
        <td>
          <div class="fw-semibold text-dark">Nivia Shining Star Football (Size 5)</div>
          <small class="text-muted font-size-11">FIFA Pro Standard</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Sports Equipment</span></td>
        <td><small class="text-dark">35 Balls</small></td>
        <td><small class="text-muted font-mono font-size-12">10 Balls</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹ 1,250 / Ball</span></td>
        <td><small class="text-muted">Sports Complex Room</small></td>
        <td><span class="badge-status badge-active">In Stock</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Asset Maintenance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">INV-BIO-019</td>
        <td>
          <div class="fw-semibold text-dark">Prepared Microscope Slides Set (100)</div>
          <small class="text-muted font-size-11">Botany & Zoology Histology</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Science Lab Consumables</span></td>
        <td><small class="text-dark">18 Boxes</small></td>
        <td><small class="text-muted font-mono font-size-12">4 Boxes</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹ 3,400 / Box</span></td>
        <td><small class="text-muted">Biology Lab Cabinet</small></td>
        <td><span class="badge-status badge-active">In Stock</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Asset Maintenance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">INV-MED-003</td>
        <td>
          <div class="fw-semibold text-dark">Infirmary First Aid Trauma Kits</div>
          <small class="text-muted font-size-11">St. John Ambulance Certified</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">Health & Clinic</span></td>
        <td><small class="text-dark">12 Kits</small></td>
        <td><small class="text-muted font-mono font-size-12">3 Kits</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹ 2,800 / Kit</span></td>
        <td><small class="text-muted">Infirmary Clinic Store</small></td>
        <td><span class="badge-status badge-active">In Stock</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Asset Maintenance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">INV-IT-104</td>
        <td>
          <div class="fw-semibold text-dark">HP 88A Black LaserJet Toner Cartridge</div>
          <small class="text-muted font-size-11">Original HP Laser Cartridge</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">IT Consumables</span></td>
        <td><small class="text-dark">2 Cartridges</small></td>
        <td><small class="text-muted font-mono font-size-12">6 Cartridges</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">₹ 3,950 / Pc</span></td>
        <td><small class="text-muted">Admin Photocopy Room</small></td>
        <td><span class="badge-status badge-inactive">Low Stock Alert</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Asset Maintenance')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>


<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
