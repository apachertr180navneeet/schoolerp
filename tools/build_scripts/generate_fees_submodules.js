/**
 * EDUSYS PRO - COMPLETE FEES & COLLECTION MANAGEMENT GENERATOR
 * Generates all 38 submodules with domain-specific UI, realistic Indian CBSE fee structures,
 * domain KPIs, specialized filters, and custom operational tables.
 */

const fs = require('fs');
const path = require('path');

const FEES_DIR = path.resolve(__dirname, '../prototype/modules/fees');

if (!fs.existsSync(FEES_DIR)) {
  fs.mkdirSync(FEES_DIR, { recursive: true });
}

// Common helper to wrap table pages
function generateTablePage(d) {
  const isReport = d.isReportPage === true;
  const isTool = d.isToolPage === true;
  
  let headerActionHtml = '';
  if (isReport) {
    headerActionHtml = `
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', '${d.filename.replace('.php', '')}_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" onclick="EduTables.print()">
      <i class="bi bi-file-earmark-pdf me-1"></i> Print / Save PDF
    </button>`;
  } else if (isTool) {
    headerActionHtml = `
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', '${d.filename.replace('.php', '')}_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#${d.toolModalId || 'actionToolModal'}">
      <i class="bi ${d.actionBtnIcon || 'bi-gear-fill'} me-1"></i> ${d.actionBtnText || 'Execute Tool'}
    </button>`;
  } else {
    headerActionHtml = `
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', '${d.filename.replace('.php', '')}_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi ${d.actionBtnIcon || 'bi-plus-lg'} me-1"></i> ${d.actionBtnText || 'Add New Record'}
    </button>`;
  }

  const rowActionHtml = isReport ? `
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', '${d.filename.replace('.php', '')}_download.csv')" title="Download Statement"><i class="bi bi-download"></i></button>
          </div>` : (isTool ? `
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Record"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-success" title="Quick Process" onclick="alert('Action completed successfully for this fee entry!')"><i class="bi bi-check2-circle"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, '${d.title.replace(/'/g, "\\'")}')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>` : `
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, '${d.title.replace(/'/g, "\\'")}')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>`);

  return `<?php
/**
 * EDUSYS PRO - ${d.title.toUpperCase()}
 * Dedicated operational interface & fee transactions for ${d.title}
 */
$page_title = "${d.title}";
$page_desc = "${d.desc}";
$active_module = "fees";
$active_submodule = "${d.filename}";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/fees/dashboard.php'); ?>">Fees Management</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi ${d.icon} text-primary me-2"></i><?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    ${headerActionHtml}
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card ${d.kpi1Color || 'kpi-primary'}">
      <div class="kpi-info">
        <h6>${d.kpi1Label}</h6>
        <div class="kpi-value">${d.kpi1Value}</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle-fill"></i> ${d.kpi1Sub}</div>
      </div>
      <div class="kpi-icon"><i class="bi ${d.kpi1Icon}"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card ${d.kpi2Color || 'kpi-success'}">
      <div class="kpi-info">
        <h6>${d.kpi2Label}</h6>
        <div class="kpi-value">${d.kpi2Value}</div>
        <div class="kpi-trend neutral"><i class="bi bi-info-circle-fill"></i> ${d.kpi2Sub}</div>
      </div>
      <div class="kpi-icon"><i class="bi ${d.kpi2Icon}"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card ${d.kpi3Color || 'kpi-warning'}">
      <div class="kpi-info">
        <h6>${d.kpi3Label}</h6>
        <div class="kpi-value">${d.kpi3Value}</div>
        <div class="kpi-trend positive"><i class="bi bi-graph-up-arrow"></i> ${d.kpi3Sub}</div>
      </div>
      <div class="kpi-icon"><i class="bi ${d.kpi3Icon}"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card ${d.kpi4Color || 'kpi-info'}">
      <div class="kpi-info">
        <h6>${d.kpi4Label}</h6>
        <div class="kpi-value">${d.kpi4Value}</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> ${d.kpi4Sub}</div>
      </div>
      <div class="kpi-icon"><i class="bi ${d.kpi4Icon}"></i></div>
    </div>
  </div>
</div>

<!-- Main Table Container -->
<div class="table-container mb-4">
  <div class="table-header">
    <div class="table-title">
      <i class="bi ${d.icon} text-primary me-2"></i> ${d.tableHeading || (d.title + ' Ledger')}
    </div>
    <div class="table-actions">
      <div class="search-box">
        <i class="bi bi-search"></i>
        <input type="text" id="tableSearchInput" class="form-control" placeholder="Search ${d.title.toLowerCase()}..." onkeyup="EduTables.search('#mainDataTable', this.value)">
      </div>
      <div class="filter-dropdown">
        <select class="form-select form-select-sm" onchange="EduTables.filter('#mainDataTable', this.value)">
          <option value="">All Records</option>
          ${(d.filters || ['Active', 'Paid', 'Pending', 'Overdue']).map(f => `<option value="${f}">${f}</option>`).join('\n          ')}
        </select>
      </div>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table erp-table table-hover" id="mainDataTable">
      <thead>
        <tr>
          ${d.columns.map(c => `<th>${c}</th>`).join('\n          ')}
          <th class="text-center" style="width: 120px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        ${d.rows.map(r => `
        <tr>
          ${r.map(cell => `<td>${cell}</td>`).join('\n          ')}
          <td>
            ${rowActionHtml}
          </td>
        </tr>`).join('')}
      </tbody>
    </table>
  </div>

  <div class="table-footer">
    <div class="table-info font-size-13 text-muted">
      Showing 1 to ${d.rows.length} of ${d.rows.length} entries (Academic Financial Year 2026-27)
    </div>
    <nav aria-label="Page navigation">
      <ul class="pagination pagination-sm mb-0">
        <li class="page-item disabled"><a class="page-link" href="#"><i class="bi bi-chevron-left"></i></a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a></li>
      </ul>
    </nav>
  </div>
</div>

<!-- Modal: Add New Record -->
<div class="modal fade" id="addNewRecordModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi ${d.icon} text-primary me-2"></i>${d.actionBtnText || 'Create Record'}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form onsubmit="event.preventDefault(); alert('Fee entry saved successfully to finance ledger!'); bootstrap.Modal.getInstance(document.getElementById('addNewRecordModal')).hide();">
          <div class="row g-3">
            ${(d.formFields || [
              { label: 'Fee Category / Type', type: 'select', options: ['Regular Tuition Fee', 'Transport Fee Slab', 'Admission / Registration', 'Hostel & Boarding', 'Examination & Lab Fee'] },
              { label: 'Class / Target Group', type: 'select', options: ['All Classes (Composite)', 'Class X (Secondary)', 'Class XII (Senior Secondary)', 'Primary Wing (I-V)', 'Pre-Primary / KG'] },
              { label: 'Fee Head Name / Title', type: 'text', placeholder: 'e.g. Quarterly Composite Tuition Fee' },
              { label: 'Applicable Amount (₹)', type: 'number', placeholder: 'e.g. 18500' },
              { label: 'Due Date / Frequency', type: 'select', options: ['10th of every Month', 'Quarterly (10 Apr, 10 Jul, 10 Oct, 10 Jan)', 'Annual (One-Time at Admission)', 'Half-Yearly'] }
            ]).map(ff => `
            <div class="${ff.col || 'col-md-6'}">
              <label class="form-label fw-semibold font-size-13">${ff.label}</label>
              ${ff.type === 'select' ? `
              <select class="form-select form-select-sm">
                ${ff.options.map(o => `<option>${o}</option>`).join('')}
              </select>` : (ff.type === 'textarea' ? `
              <textarea class="form-control form-control-sm" rows="3" placeholder="${ff.placeholder || ''}"></textarea>` : `
              <input type="${ff.type}" class="form-control form-control-sm" placeholder="${ff.placeholder || ''}">`)}
            </div>`).join('')}
          </div>
          <div class="modal-footer px-0 pb-0 pt-3 mt-3 border-top">
            <button type="button" class="btn btn-sm btn-light border" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-sm btn-primary fw-bold"><i class="bi bi-check2 me-1"></i> Save to Ledger</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal: Tool Modal (if applicable) -->
<div class="modal fade" id="${d.toolModalId || 'actionToolModal'}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi ${d.icon} text-primary me-2"></i>${d.actionBtnText || 'Run Financial Batch Tool'}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-info py-2 font-size-13">
          <i class="bi bi-info-circle-fill me-1"></i> Running this operation will calculate demand, generate fee schedules, or issue alerts according to school accounts rules.
        </div>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label font-size-13 fw-semibold">Billing Cycle / Quarter</label>
            <select class="form-select form-select-sm">
              <option>Quarter 3 (Oct - Dec 2026)</option>
              <option>Quarter 4 (Jan - Mar 2027)</option>
              <option>Annual Advance Demand</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label font-size-13 fw-semibold">Target Student Cohort</label>
            <select class="form-select form-select-sm">
              <option>All Enrolled Students (1,420)</option>
              <option>Defaulters Only (>15 Days Overdue)</option>
              <option>Transport Opted Students Only</option>
            </select>
          </div>
        </div>
        <div class="modal-footer px-0 pb-0 pt-3 mt-3 border-top">
          <button type="button" class="btn btn-sm btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-sm btn-primary fw-bold" onclick="alert('Batch process executed successfully!'); bootstrap.Modal.getInstance(document.getElementById('${d.toolModalId || 'actionToolModal'}')).hide();"><i class="bi bi-lightning-charge me-1"></i> Execute Process</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal: View Record Summary -->
<div class="modal fade" id="viewRecordModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-receipt text-primary me-2"></i>Transaction Dossier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body font-size-13">
        <div class="p-3 bg-light rounded mb-3 border">
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Account Head:</span>
            <span class="fw-bold text-primary">${d.title}</span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Financial Year:</span>
            <span class="fw-semibold">2026-2027</span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Bank Reconciliation:</span>
            <span class="badge bg-success-subtle text-success border"><i class="bi bi-check2-circle me-1"></i>Reconciled</span>
          </div>
          <div class="d-flex justify-content-between">
            <span class="text-muted">Audit Verification:</span>
            <span class="text-muted small">C.A. Audited & Tax Compliant</span>
          </div>
        </div>
        <p class="text-muted small mb-0"><i class="bi bi-lock-fill me-1"></i> Digitally logged with encrypted transaction checksum.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-sm btn-primary" onclick="window.print()"><i class="bi bi-printer me-1"></i> Print Receipt</button>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
`;
}

// ==========================================
// BESPOKE FEES DASHBOARD GENERATION
// ==========================================
function generateFeesDashboard() {
  return `<?php
/**
 * EDUSYS PRO - FEES & COLLECTION MANAGEMENT COMMAND CENTER
 * Comprehensive executive finance dashboard with live collection feeds, outstanding balances,
 * fee head recoveries, payment gateway status, and rapid cashier actions.
 */
$page_title = "Fees & Collection Dashboard";
$page_desc = "Master financial command center for student billing, collection counters, defaulters & reconciliation";
$active_module = "fees";
$active_submodule = "dashboard.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/fees/dashboard.php'); ?>">Fees Management</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-cash-stack text-primary me-2"></i>Fees & Collection Management</h1>
    <p>Financial Year 2026-2027 | Total Enrollment: 1,420 Students | Quarter 3 (Oct - Dec) Active</p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/fees/fee-collection.php'); ?>" class="btn btn-primary fw-bold">
      <i class="bi bi-calculator me-1"></i> Cashier Counter (Collect Fee)
    </a>
    <a href="<?php echo base_url('modules/fees/outstanding-balances.php'); ?>" class="btn btn-light border">
      <i class="bi bi-exclamation-circle me-1"></i> Defaulter List
    </a>
    <a href="<?php echo base_url('modules/fees/daily-collection.php'); ?>" class="btn btn-light border">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Daily Day-End Book
    </a>
  </div>
</div>

<!-- Financial KPIs -->
<div class="row g-3 mb-4">
  <div class="col-6 col-lg-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Total Fees Collected (YTD)</h6>
        <div class="kpi-value">₹ 5.42 Cr</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-right"></i> 79.1% of Annual Demand</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-currency-rupee"></i></div>
    </div>
  </div>
  <div class="col-6 col-lg-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Outstanding Overdue</h6>
        <div class="kpi-value">₹ 1.43 Cr</div>
        <div class="kpi-trend negative"><i class="bi bi-exclamation-triangle"></i> 312 Accounts Overdue</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-hourglass-bottom"></i></div>
    </div>
  </div>
  <div class="col-6 col-lg-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Today's Counter Collection</h6>
        <div class="kpi-value">₹ 3,84,500</div>
        <div class="kpi-trend positive"><i class="bi bi-receipt"></i> 28 Receipts Issued Today</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-wallet2"></i></div>
    </div>
  </div>
  <div class="col-6 col-lg-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Digital / Online Pay Rate</h6>
        <div class="kpi-value">72.4%</div>
        <div class="kpi-trend positive"><i class="bi bi-qr-code"></i> UPI & Netbanking Dominated</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-credit-card-2-front"></i></div>
    </div>
  </div>
</div>

<!-- Main Operational Widgets Grid -->
<div class="row g-4 mb-4">
  <!-- Today's Live Counter Transactions -->
  <div class="col-lg-8">
    <div class="card border shadow-sm h-100">
      <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <div>
          <h6 class="mb-0 fw-bold text-dark"><i class="bi bi-clock-history text-primary me-2"></i>Live Collection Stream (Today)</h6>
          <small class="text-muted">Wednesday, 28 October 2026 | Counter 1 & Online Gateway</small>
        </div>
        <span class="badge bg-success-subtle text-success border"><i class="bi bi-circle-fill font-size-8 me-1"></i>Active Counter</span>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table erp-table table-hover mb-0">
            <thead>
              <tr>
                <th>Receipt #</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Fee Head</th>
                <th>Mode</th>
                <th>Amount (₹)</th>
                <th>Time</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><span class="badge bg-dark">RCP-2026-8812</span></td>
                <td><strong>Aarav Sharma</strong></td>
                <td>Class X-A</td>
                <td>Quarter 3 Tuition + Lab</td>
                <td><span class="badge bg-primary-subtle text-primary border">UPI (PhonePe)</span></td>
                <td><strong class="text-success">₹ 18,500</strong></td>
                <td>14:24 PM</td>
              </tr>
              <tr>
                <td><span class="badge bg-dark">RCP-2026-8811</span></td>
                <td><strong>Sneha Kapoor</strong></td>
                <td>Class X-A</td>
                <td>Quarter 3 Tuition Fee</td>
                <td><span class="badge bg-info-subtle text-info border">Netbanking HDFC</span></td>
                <td><strong class="text-success">₹ 16,000</strong></td>
                <td>14:10 PM</td>
              </tr>
              <tr>
                <td><span class="badge bg-dark">RCP-2026-8810</span></td>
                <td><strong>Rohan Patel</strong></td>
                <td>Class X-B</td>
                <td>Quarter 3 Tuition + Transport</td>
                <td><span class="badge bg-light text-dark border">Cash Counter</span></td>
                <td><strong class="text-success">₹ 21,200</strong></td>
                <td>13:48 PM</td>
              </tr>
              <tr>
                <td><span class="badge bg-dark">RCP-2026-8809</span></td>
                <td><strong>Diya Mukherjee</strong></td>
                <td>Class XII-Sci</td>
                <td>Quarter 3 Tuition + Board Fee</td>
                <td><span class="badge bg-success-subtle text-success border">Debit Card POS</span></td>
                <td><strong class="text-success">₹ 23,800</strong></td>
                <td>13:15 PM</td>
              </tr>
              <tr>
                <td><span class="badge bg-dark">RCP-2026-8808</span></td>
                <td><strong>Ishaan Joshi</strong></td>
                <td>Class XII-Comm</td>
                <td>Quarter 3 Tuition Fee</td>
                <td><span class="badge bg-primary-subtle text-primary border">UPI (Google Pay)</span></td>
                <td><strong class="text-success">₹ 18,000</strong></td>
                <td>12:50 PM</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer bg-light py-2 d-flex justify-content-between align-items-center font-size-13">
        <span><i class="bi bi-shield-check text-success me-1"></i> Cash drawer balance verified at ₹ 78,500</span>
        <a href="<?php echo base_url('modules/fees/fee-collection.php'); ?>" class="fw-bold text-primary">Open Full Counter Terminal <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
  </div>

  <!-- Payment Mode Breakdown & Concession Meter -->
  <div class="col-lg-4">
    <div class="card border shadow-sm h-100">
      <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold text-dark"><i class="bi bi-pie-chart text-primary me-2"></i>Collection by Payment Mode</h6>
        <span class="badge bg-light text-dark border">YTD</span>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span class="fw-semibold text-primary"><i class="bi bi-qr-code me-1"></i> UPI / QR Codes</span>
            <strong>₹ 2.60 Cr (48%)</strong>
          </div>
          <div class="progress" style="height: 7px;">
            <div class="progress-bar bg-primary" style="width: 48%"></div>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span class="fw-semibold text-info"><i class="bi bi-bank me-1"></i> Netbanking & NEFT/RTGS</span>
            <strong>₹ 1.30 Cr (24%)</strong>
          </div>
          <div class="progress" style="height: 7px;">
            <div class="progress-bar bg-info" style="width: 24%"></div>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span class="fw-semibold text-success"><i class="bi bi-credit-card me-1"></i> Credit / Debit Cards</span>
            <strong>₹ 0.86 Cr (16%)</strong>
          </div>
          <div class="progress" style="height: 7px;">
            <div class="progress-bar bg-success" style="width: 16%"></div>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between font-size-13 mb-1">
            <span class="fw-semibold text-secondary"><i class="bi bi-cash me-1"></i> Cash Counter</span>
            <strong>₹ 0.66 Cr (12%)</strong>
          </div>
          <div class="progress" style="height: 7px;">
            <div class="progress-bar bg-secondary" style="width: 12%"></div>
          </div>
        </div>

        <hr>

        <div class="p-2 bg-light rounded border font-size-12">
          <div class="d-flex justify-content-between mb-1">
            <span class="text-muted">Total Concessions & Waivers:</span>
            <strong class="text-danger">₹ 24.5 Lakhs (64 Students)</strong>
          </div>
          <div class="d-flex justify-content-between">
            <span class="text-muted">RTE / EWS Free Quota (25%):</span>
            <span class="badge bg-primary-subtle text-primary border">Govt Reimbursed</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Rapid Navigation Shortcuts -->
<div class="row g-3 mb-4">
  <div class="col-md-3">
    <div class="card p-3 border shadow-sm text-center h-100 hover-card">
      <div class="rounded-circle bg-primary-subtle text-primary p-3 d-inline-block mx-auto mb-2">
        <i class="bi bi-receipt-cutoff font-size-24"></i>
      </div>
      <h6 class="fw-bold mb-1">Issue Fee Invoice</h6>
      <p class="text-muted font-size-12 mb-3">Bulk bill creation for upcoming academic terms & slabs</p>
      <a href="<?php echo base_url('modules/fees/invoice-generation.php'); ?>" class="btn btn-sm btn-outline-primary mt-auto">Generate Bills</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card p-3 border shadow-sm text-center h-100 hover-card">
      <div class="rounded-circle bg-danger-subtle text-danger p-3 d-inline-block mx-auto mb-2">
        <i class="bi bi-bell-fill font-size-24"></i>
      </div>
      <h6 class="fw-bold mb-1">Due Reminders & SMS</h6>
      <p class="text-muted font-size-12 mb-3">Automated payment link dispatch via WhatsApp & SMS</p>
      <a href="<?php echo base_url('modules/fees/due-reminders.php'); ?>" class="btn btn-sm btn-outline-danger mt-auto">Send Reminders</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card p-3 border shadow-sm text-center h-100 hover-card">
      <div class="rounded-circle bg-warning-subtle text-warning p-3 d-inline-block mx-auto mb-2">
        <i class="bi bi-tag-fill font-size-24"></i>
      </div>
      <h6 class="fw-bold mb-1">Concessions & Scholarships</h6>
      <p class="text-muted font-size-12 mb-3">Sibling discount, staff ward waiver & merit approvals</p>
      <a href="<?php echo base_url('modules/fees/concessions.php'); ?>" class="btn btn-sm btn-outline-warning mt-auto">Manage Waivers</a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card p-3 border shadow-sm text-center h-100 hover-card">
      <div class="rounded-circle bg-success-subtle text-success p-3 d-inline-block mx-auto mb-2">
        <i class="bi bi-bank font-size-24"></i>
      </div>
      <h6 class="fw-bold mb-1">Bank Reconciliation</h6>
      <p class="text-muted font-size-12 mb-3">Direct auto-match with SBI, HDFC & ICICI statements</p>
      <a href="<?php echo base_url('modules/fees/payment-reconciliation.php'); ?>" class="btn btn-sm btn-outline-success mt-auto">Reconcile Bank</a>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
`;
}

// ==========================================
// 37 SUBMODULE DEFINITIONS
// ==========================================
const submodules = [
  {
    filename: 'fee-categories.php',
    title: 'Fee Categories',
    desc: 'Master groupings for regular school fees, transport slabs, boarding charges, and activity tariffs',
    icon: 'bi-tags-fill',
    actionBtnText: 'Add Fee Category',
    kpi1Label: 'Active Categories', kpi1Value: '6 Categories', kpi1Sub: 'All Wings Covered', kpi1Icon: 'bi-tag',
    kpi2Label: 'Mandatory Heads', kpi2Value: 'Tuition & Development', kpi2Sub: 'CBSE Standard Norms', kpi2Icon: 'bi-check-all',
    kpi3Label: 'Optional Tariffs', kpi3Value: 'Transport, Hostel, Mess', kpi3Sub: 'Opt-in Services', kpi3Icon: 'bi-bus-front',
    kpi4Label: 'Tax Classification', kpi4Value: 'GST Exempt', kpi4Sub: 'Educational Services', kpi4Icon: 'bi-shield-check',
    columns: ['Category Code', 'Category Title', 'Billing Frequency', 'Refundable?', 'Tax Applicability', 'Assigned Heads', 'Status'],
    rows: [
      ['<span class="badge bg-primary">CAT-TUI</span>', '<strong>Composite Tuition & Academic</strong>', 'Quarterly (4 Terms)', 'No', 'GST Exempt (Nil)', 'Tuition, Lab, Exam, Library', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-primary">CAT-TRN</span>', '<strong>Transport & Fleet Services</strong>', 'Quarterly (4 Terms)', 'No', 'GST Exempt (Nil)', 'Bus Route Slab A/B/C/D', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-primary">CAT-ADM</span>', '<strong>New Admission One-Time</strong>', 'One-Time at Admission', 'Caution Money Only', 'GST Exempt (Nil)', 'Admission Fee, Caution Deposit', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-primary">CAT-HST</span>', '<strong>Hostel & Boarding Facility</strong>', 'Half-Yearly', 'Mess Advance Refundable', 'GST Exempt (Nil)', 'Boarding, Mess, Laundry', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-secondary">CAT-MSC</span>', '<strong>Miscellaneous & Activity Fine</strong>', 'As Incurred', 'No', 'Taxable where specified', 'Late Fine, Duplicate Card, TC', '<span class="badge bg-success-subtle text-success border">Active</span>']
    ]
  },
  {
    filename: 'fee-heads.php',
    title: 'Fee Heads Master',
    desc: 'Individual ledger account heads (Tuition, Development, Science Lab, Sports, Annual Day, Caution Money)',
    icon: 'bi-list-columns-reverse',
    actionBtnText: 'Create Fee Head',
    kpi1Label: 'Total Fee Heads', kpi1Value: '18 Heads', kpi1Sub: 'Charter of Accounts', kpi1Icon: 'bi-journals',
    kpi2Label: 'Core Academic Heads', kpi2Value: '8 Heads', kpi2Sub: 'Mandatory Tuition', kpi2Icon: 'bi-mortarboard',
    kpi3Label: 'One-Time Charges', kpi3Value: '3 Heads', kpi3Sub: 'Admission & Caution', kpi3Icon: 'bi-calendar-event',
    kpi4Label: 'Ledger Linked', kpi4Value: '100% Synced', kpi4Sub: 'Direct to Accounts Module', kpi4Icon: 'bi-link-45deg',
    columns: ['Head Code', 'Fee Head Name', 'Category', 'Default Amount (₹)', 'Ledger Account', 'Refundable?', 'Status'],
    rows: [
      ['<span class="badge bg-dark">FHD-01</span>', '<strong>Tuition Fee (Quarterly)</strong>', 'Composite Tuition', '₹ 14,500', 'AC-301: Academic Income', '<span class="badge bg-secondary">Non-Refundable</span>', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-dark">FHD-02</span>', '<strong>Annual Development Charges</strong>', 'Composite Tuition', '₹ 6,000', 'AC-302: Development Fund', '<span class="badge bg-secondary">Non-Refundable</span>', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-dark">FHD-03</span>', '<strong>Computer & Science Lab Fee</strong>', 'Composite Tuition', '₹ 2,500', 'AC-304: Lab Income', '<span class="badge bg-secondary">Non-Refundable</span>', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-dark">FHD-04</span>', '<strong>Library & E-Resource Charges</strong>', 'Composite Tuition', '₹ 1,200', 'AC-305: Library Income', '<span class="badge bg-secondary">Non-Refundable</span>', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-dark">FHD-05</span>', '<strong>Refundable Caution Money</strong>', 'New Admission', '₹ 10,000', 'AC-204: Student Caution Deposits', '<span class="badge bg-success">Refundable on TC</span>', '<span class="badge bg-success-subtle text-success border">Active</span>']
    ]
  },
  {
    filename: 'class-fee-structures.php',
    title: 'Class-wise Fee Structures',
    desc: 'Annual and term-wise fee schedules segregated by academic grade (Pre-Primary, Primary, Middle, Secondary, Senior Sec)',
    icon: 'bi-grid-3x3-gap-fill',
    actionBtnText: 'Configure Class Structure',
    kpi1Label: 'Mapped Classes', kpi1Value: 'Class Nur - XII', kpi1Sub: 'All 14 Grades', kpi1Icon: 'bi-mortarboard',
    kpi2Label: 'Class X Annual Fee', kpi2Value: '₹ 74,000', kpi2Sub: 'Composite (₹18,500/Qtr)', kpi2Icon: 'bi-cash-coin',
    kpi3Label: 'Class XII (Science)', kpi3Value: '₹ 86,000', kpi3Sub: 'Includes Lab Practical', kpi3Icon: 'bi-flask',
    kpi4Label: 'Approved Slabs', kpi4Value: 'PTA Approved', kpi4Sub: 'Fee Committee Resolution', kpi4Icon: 'bi-patch-check',
    columns: ['Class Name', 'Academic Wing', 'Quarterly Composite (₹)', 'Annual Total (₹)', 'Admission Fee (New)', 'Lab / Practical Surcharge', 'Status'],
    rows: [
      ['<strong>Class X (Secondary)</strong>', 'Secondary Wing', '₹ 18,500', '<strong>₹ 74,000</strong>', '₹ 25,000', '₹ 2,000 Included', '<span class="badge bg-success-subtle text-success border">Approved</span>'],
      ['<strong>Class XII (Science)</strong>', 'Senior Secondary', '₹ 21,500', '<strong>₹ 86,000</strong>', '₹ 30,000', '₹ 4,500 Lab Surcharge', '<span class="badge bg-success-subtle text-success border">Approved</span>'],
      ['<strong>Class XII (Commerce)</strong>', 'Senior Secondary', '₹ 19,500', '<strong>₹ 78,000</strong>', '₹ 30,000', '₹ 1,500 Computer Surcharge', '<span class="badge bg-success-subtle text-success border">Approved</span>'],
      ['<strong>Class IX (Secondary)</strong>', 'Secondary Wing', '₹ 17,500', '<strong>₹ 70,000</strong>', '₹ 25,000', '₹ 1,500 Included', '<span class="badge bg-success-subtle text-success border">Approved</span>'],
      ['<strong>Class VI - VIII</strong>', 'Middle Wing', '₹ 15,000', '<strong>₹ 60,000</strong>', '₹ 20,000', 'Nil', '<span class="badge bg-success-subtle text-success border">Approved</span>'],
      ['<strong>Class I - V</strong>', 'Primary Wing', '₹ 13,500', '<strong>₹ 54,000</strong>', '₹ 20,000', 'Nil', '<span class="badge bg-success-subtle text-success border">Approved</span>']
    ]
  },
  {
    filename: 'session-fee-structures.php',
    title: 'Session-wise Fee Structures',
    desc: 'Multi-year fee schedule archives and revision percentages across academic financial years',
    icon: 'bi-calendar-week',
    actionBtnText: 'Create Session Structure',
    kpi1Label: 'Active Session', kpi1Value: '2026-2027', kpi1Sub: 'Current Financial Year', kpi1Icon: 'bi-calendar-check',
    kpi2Label: 'Annual Revision %', kpi2Value: '+6.5%', kpi2Sub: 'State Norm Capped (<8%)', kpi2Icon: 'bi-graph-up',
    kpi3Label: 'Historical Sessions', kpi3Value: '5 Years Retained', kpi3Sub: '2022 to 2026', kpi3Icon: 'bi-archive',
    kpi4Label: 'Approval Seal', kpi4Value: 'DIOS Certified', kpi4Sub: 'State Fee Regulatory Comm', kpi4Icon: 'bi-shield-check',
    columns: ['Academic Session', 'Effective From', 'Effective To', 'Average Fee Increase', 'Total Projected Demand', 'Regulatory Status', 'Actions'],
    rows: [
      ['<strong class="text-primary">2026-2027 (Active)</strong>', '01-Apr-2026', '31-Mar-2027', '+6.5%', '₹ 6.85 Crores', '<span class="badge bg-success">DFRC Compliant</span>', '<button class="btn btn-xs btn-outline-primary">View Slabs</button>'],
      ['<strong>2025-2026 (Archived)</strong>', '01-Apr-2025', '31-Mar-2026', '+5.0%', '₹ 6.42 Crores', '<span class="badge bg-secondary">Audited & Closed</span>', '<button class="btn btn-xs btn-light border">Archive</button>'],
      ['<strong>2024-2025 (Archived)</strong>', '01-Apr-2024', '31-Mar-2025', '+6.0%', '₹ 6.10 Crores', '<span class="badge bg-secondary">Audited & Closed</span>', '<button class="btn btn-xs btn-light border">Archive</button>']
    ]
  },
  {
    filename: 'monthly-fees.php',
    title: 'Monthly Fee Setup',
    desc: 'Monthly installment configurations for parents opting for 12 monthly payments instead of quarterly',
    icon: 'bi-calendar-month',
    actionBtnText: 'Add Monthly Slab',
    kpi1Label: 'Monthly Opted', kpi1Value: '184 Families', kpi1Sub: '13% of Enrollment', kpi1Icon: 'bi-people',
    kpi2Label: 'Monthly Due Date', kpi2Value: '10th of Month', kpi2Sub: 'Grace up to 15th', kpi2Icon: 'bi-calendar-day',
    kpi3Label: 'Late Fine Clause', kpi3Value: '₹ 50 / Day', kpi3Sub: 'After 15th', kpi3Icon: 'bi-cash-coin',
    kpi4Label: 'Auto-Debit NACH', kpi4Value: '92 Mandates', kpi4Sub: 'Direct Bank Clearance', kpi4Icon: 'bi-arrow-repeat',
    columns: ['Class Level', 'Monthly Due (₹)', 'Due Day', 'Grace Period', 'Late Fine / Day', 'NACH Auto-Debit', 'Status'],
    rows: [
      ['Class X', '₹ 6,200', '10th of every month', '5 Days (till 15th)', '₹ 50 / day', '<span class="badge bg-success">Active</span>', '<span class="badge bg-success-subtle text-success border">Enabled</span>'],
      ['Class XII (Science)', '₹ 7,200', '10th of every month', '5 Days (till 15th)', '₹ 50 / day', '<span class="badge bg-success">Active</span>', '<span class="badge bg-success-subtle text-success border">Enabled</span>'],
      ['Class XII (Commerce)', '₹ 6,500', '10th of every month', '5 Days (till 15th)', '₹ 50 / day', '<span class="badge bg-success">Active</span>', '<span class="badge bg-success-subtle text-success border">Enabled</span>'],
      ['Class I - V', '₹ 4,500', '10th of every month', '5 Days (till 15th)', '₹ 50 / day', '<span class="badge bg-success">Active</span>', '<span class="badge bg-success-subtle text-success border">Enabled</span>']
    ]
  },
  {
    filename: 'quarterly-fees.php',
    title: 'Quarterly Fee Setup',
    desc: 'Default 4-Quarter billing framework (Q1: Apr-Jun, Q2: Jul-Sep, Q3: Oct-Dec, Q4: Jan-Mar)',
    icon: 'bi-pie-chart-fill',
    actionBtnText: 'Configure Quarter Dates',
    kpi1Label: 'Default Billing', kpi1Value: 'Quarterly (87%)', kpi1Sub: 'Standard School Cycle', kpi1Icon: 'bi-check2-circle',
    kpi2Label: 'Active Quarter', kpi2Value: 'Quarter 3 (Q3)', kpi2Sub: 'Oct - Dec 2026', kpi2Icon: 'bi-calendar3',
    kpi3Label: 'Q3 Recovery Rate', kpi3Value: '84.2%', kpi3Sub: '1,195 / 1,420 Paid', kpi3Icon: 'bi-graph-up',
    kpi4Label: 'Q4 Demand Date', kpi4Value: '01-Jan-2027', kpi4Sub: 'Next Billing Cycle', kpi4Icon: 'bi-hourglass-split',
    columns: ['Quarter Code', 'Term Period', 'Due Date', 'Penalty Date', 'Average Amount (₹)', 'Students Billed', 'Recovery %'],
    rows: [
      ['<span class="badge bg-primary">Q1</span>', 'April - June', '15-Apr-2026', '25-Apr-2026', '₹ 18,500', '1,420 Students', '<span class="badge bg-success">99.4% Collected</span>'],
      ['<span class="badge bg-primary">Q2</span>', 'July - September', '15-Jul-2026', '25-Jul-2026', '₹ 18,500', '1,420 Students', '<span class="badge bg-success">98.1% Collected</span>'],
      ['<span class="badge bg-primary">Q3</span>', 'October - December', '15-Oct-2026', '25-Oct-2026', '₹ 18,500', '1,420 Students', '<span class="badge bg-warning text-dark">84.2% In-Progress</span>'],
      ['<span class="badge bg-secondary">Q4</span>', 'January - March', '15-Jan-2027', '25-Jan-2027', '₹ 18,500', '1,420 Students', '<span class="badge bg-light text-dark border">Scheduled</span>']
    ]
  },
  {
    filename: 'annual-fees.php',
    title: 'Annual Fee Structure',
    desc: 'Annual composite fee packages, one-time lump-sum payment incentives, and sibling package discounts',
    icon: 'bi-calendar-check-fill',
    actionBtnText: 'Add Annual Package',
    kpi1Label: 'Lump-sum Incentive', kpi1Value: '5% Rebate', kpi1Sub: 'Full Year Advance Pay', kpi1Icon: 'bi-percent',
    kpi2Label: 'Annual Payers', kpi2Value: '312 Families', kpi2Sub: 'Paid upfront in April', kpi2Icon: 'bi-cash-stack',
    kpi3Label: 'Total Advance', kpi3Value: '₹ 2.21 Crores', kpi3Sub: 'Zero Default Risk', kpi3Icon: 'bi-shield-check',
    kpi4Label: 'Rebate Disbursed', kpi4Value: '₹ 11.05 Lakhs', kpi4Sub: 'Appreciated by Parents', kpi4Icon: 'bi-award',
    columns: ['Class Range', 'Standard Total (₹)', 'Annual Advance Discount', 'Discounted Total (₹)', 'Families Opted', 'Annual Savings (₹)', 'Status'],
    rows: [
      ['Class X (Secondary)', '₹ 74,000', '5% Lump-Sum Rebate', '<strong>₹ 70,300</strong>', '42 Families', '₹ 3,700 Saved', '<span class="badge bg-success">Active</span>'],
      ['Class XII (Science)', '₹ 86,000', '5% Lump-Sum Rebate', '<strong>₹ 81,700</strong>', '36 Families', '₹ 4,300 Saved', '<span class="badge bg-success">Active</span>'],
      ['Class XII (Commerce)', '₹ 78,000', '5% Lump-Sum Rebate', '<strong>₹ 74,100</strong>', '22 Families', '₹ 3,900 Saved', '<span class="badge bg-success">Active</span>'],
      ['Primary Wing (I-V)', '₹ 54,000', '5% Lump-Sum Rebate', '<strong>₹ 51,300</strong>', '118 Families', '₹ 2,700 Saved', '<span class="badge bg-success">Active</span>']
    ]
  },
  {
    filename: 'admission-fees.php',
    title: 'Admission Fees Setup',
    desc: 'New student enrollment charges, registration prospectus fees, and refundable security caution money',
    icon: 'bi-person-plus-fill',
    actionBtnText: 'Configure Admission Charges',
    kpi1Label: 'New Admissions', kpi1Value: '210 Intakes', kpi1Sub: 'Session 2026-27', kpi1Icon: 'bi-person-check',
    kpi2Label: 'Prospectus Fee', kpi2Value: '₹ 1,000', kpi2Sub: 'Non-Refundable', kpi2Icon: 'bi-file-text',
    kpi3Label: 'Caution Deposit', kpi3Value: '₹ 10,000', kpi3Sub: 'Refundable at Exit / TC', kpi3Icon: 'bi-wallet',
    kpi4Label: 'Admission Total', kpi4Value: '₹ 52.5 Lakhs', kpi4Sub: 'Capital & Infrastructure', kpi4Icon: 'bi-cash-coin',
    columns: ['Wing / Grade', 'Prospectus Cost', 'Admission Processing', 'Refundable Caution', 'Total at Admission', 'Mode of Payment', 'Status'],
    rows: [
      ['Pre-Primary (Nur - UKG)', '₹ 1,000', '₹ 15,000', '₹ 10,000', '<strong>₹ 26,000</strong>', 'Online / Demand Draft', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['Primary Wing (I - V)', '₹ 1,000', '₹ 20,000', '₹ 10,000', '<strong>₹ 31,000</strong>', 'Online / Demand Draft', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['Middle & Secondary (VI - X)', '₹ 1,000', '₹ 25,000', '₹ 10,000', '<strong>₹ 36,000</strong>', 'Online / Demand Draft', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['Senior Secondary (XI - XII)', '₹ 1,000', '₹ 30,000', '₹ 10,000', '<strong>₹ 41,000</strong>', 'Online / Demand Draft', '<span class="badge bg-success-subtle text-success border">Active</span>']
    ]
  },
  {
    filename: 'examination-fees.php',
    title: 'Examination Fees',
    desc: 'CBSE Board registration fees (LOC Class 10 & 12), migration certificate fee, and internal exam surcharges',
    icon: 'bi-award',
    actionBtnText: 'Add Exam Fee Tariff',
    kpi1Label: 'CBSE LOC Class X', kpi1Value: '₹ 1,500 / Student', kpi1Sub: '5 Main Subjects (CBSE)', kpi1Icon: 'bi-mortarboard',
    kpi2Label: 'CBSE LOC Class XII', kpi2Value: '₹ 2,100 / Student', kpi2Sub: 'Includes Practical Exam', kpi2Icon: 'bi-flask',
    kpi3Label: 'Internal Exam Fund', kpi3Value: '₹ 800 / Year', kpi3Sub: 'Printing & OMR Cost', kpi3Icon: 'bi-printer',
    kpi4Label: 'Board Fee Remittance', kpi4Value: '100% Remitted', kpi4Sub: 'Direct to CBSE Delhi', kpi4Icon: 'bi-check2-all',
    columns: ['Exam / Board Code', 'Target Class', 'Description', 'Subject Base Rate', 'Practical Fee / Sub', 'Total Fee / Cand', 'Remitted to Board'],
    rows: [
      ['<span class="badge bg-primary">CBSE-LOC-10</span>', 'Class X (AISSE)', 'CBSE Board Registration 5 Subjects', '₹ 1,500', 'Nil (Internal)', '<strong>₹ 1,500</strong>', '<span class="badge bg-success">Remitted (124 Cands)</span>'],
      ['<span class="badge bg-primary">CBSE-LOC-12S</span>', 'Class XII (Science)', 'CBSE Board Exam + 3 Practicals', '₹ 1,500', '₹ 150 x 3 = ₹ 450', '<strong>₹ 1,950</strong>', '<span class="badge bg-success">Remitted (88 Cands)</span>'],
      ['<span class="badge bg-primary">CBSE-LOC-12C</span>', 'Class XII (Commerce)', 'CBSE Board Exam + 1 Project Viva', '₹ 1,500', '₹ 150 x 1 = ₹ 150', '<strong>₹ 1,650</strong>', '<span class="badge bg-success">Remitted (46 Cands)</span>'],
      ['<span class="badge bg-secondary">MIG-CERT</span>', 'Class X & XII', 'CBSE Migration Certificate Fee', '₹ 350', 'Nil', '<strong>₹ 350</strong>', '<span class="badge bg-success">Remitted</span>']
    ]
  },
  {
    filename: 'transport-fees.php',
    title: 'Transport Fees Slab',
    desc: 'Distance-tiered student transportation slabs mapped by kilometer radius and designated bus routes',
    icon: 'bi-bus-front-fill',
    actionBtnText: 'Add Transport Slab',
    kpi1Label: 'Transport Users', kpi1Value: '864 Students', kpi1Sub: '60.8% of Total', kpi1Icon: 'bi-people',
    kpi2Label: 'Fleet Size', kpi2Value: '28 Buses', kpi2Sub: 'GPS Tracked', kpi2Icon: 'bi-bus-front',
    kpi3Label: 'Quarterly Recovery', kpi3Value: '₹ 48.2 Lakhs', kpi3Sub: 'Fuel & Maintenance', kpi3Icon: 'bi-fuel-pump',
    kpi4Label: 'Max Radius', kpi4Value: '22 Kilometers', kpi4Sub: '4 Distance Zones', kpi4Icon: 'bi-geo-alt',
    columns: ['Slab Code', 'Distance Zone', 'Coverage Areas / Major Stops', 'Quarterly Tariff (₹)', 'Monthly Equivalent', 'Allocated Students', 'Status'],
    rows: [
      ['<span class="badge bg-primary">TRN-SLAB-A</span>', 'Zone 1 (0 - 5 km)', 'Civil Lines, Rajendra Nagar, School Vicinity', '₹ 4,500', '₹ 1,500 / mo', '248 Students', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-primary">TRN-SLAB-B</span>', 'Zone 2 (5 - 10 km)', 'Shastri Nagar, Green Park, Sector 12', '₹ 6,000', '₹ 2,000 / mo', '312 Students', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-primary">TRN-SLAB-C</span>', 'Zone 3 (10 - 15 km)', 'Indira Nagar, Gomti Nagar, Cantt Area', '₹ 7,500', '₹ 2,500 / mo', '196 Students', '<span class="badge bg-success-subtle text-success border">Active</span>'],
      ['<span class="badge bg-primary">TRN-SLAB-D</span>', 'Zone 4 (15 - 22 km)', 'Outer Ring Road, Subhash Nagar, Bypass', '₹ 9,000', '₹ 3,000 / mo', '108 Students', '<span class="badge bg-success-subtle text-success border">Active</span>']
    ]
  },
  {
    filename: 'hostel-fees.php',
    title: 'Hostel Fee Structures',
    desc: 'Boarding room tariffs, mess dietary packages, laundry maintenance, and hostel security deposits',
    icon: 'bi-building-fill',
    actionBtnText: 'Add Hostel Tariff',
    kpi1Label: 'Boarding Students', kpi1Value: '142 Residents', kpi1Sub: 'Boys & Girls Wings', kpi1Icon: 'bi-door-closed',
    kpi2Label: 'Annual Boarding', kpi2Value: '₹ 1,40,000', kpi2Sub: 'Boarding + 4 Meals', kpi2Icon: 'bi-cup-hot',
    kpi3Label: 'Term Payment', kpi3Value: '2 Installments', kpi3Sub: 'Jul & Dec Slabs', kpi3Icon: 'bi-calendar2',
    kpi4Label: 'Occupancy Rate', kpi4Value: '94.6%', kpi4Sub: 'Near Capacity', kpi4Icon: 'bi-building-check',
    columns: ['Tariff Code', 'Accommodation Type', 'Room Spec', 'Annual Boarding (₹)', 'Mess Food Plan (₹)', 'Total Hostel / Yr', 'Available Beds'],
    rows: [
      ['<span class="badge bg-dark">HST-TRIPLE</span>', 'Standard Boarding', 'Triple Sharing AC Room', '₹ 80,000', '₹ 60,000', '<strong>₹ 1,40,000</strong>', '8 Beds Available'],
      ['<span class="badge bg-dark">HST-DOUBLE</span>', 'Deluxe Boarding', 'Twin Sharing AC Room', '₹ 1,10,000', '₹ 60,000', '<strong>₹ 1,70,000</strong>', '4 Beds Available'],
      ['<span class="badge bg-dark">HST-SINGLE</span>', 'Senior Scholar Wing', 'Single Studio (Class XII)', '₹ 1,40,000', '₹ 60,000', '<strong>₹ 2,00,000</strong>', '1 Bed Available']
    ]
  },
  {
    filename: 'misc-fees.php',
    title: 'Miscellaneous Fees & Fines',
    desc: 'Incidentals tariffs for duplicate ID cards, bonafide certificates, transfer certificates, and library damage fines',
    icon: 'bi-receipt-cutoff',
    actionBtnText: 'Add Miscellaneous Tariff',
    kpi1Label: 'Misc Heads', kpi1Value: '12 Items', kpi1Sub: 'Standard Fixed Cost', kpi1Icon: 'bi-card-heading',
    kpi2Label: 'TC Certificate Fee', kpi2Value: '₹ 250', kpi2Sub: 'Official School Seal', kpi2Icon: 'bi-file-earmark-check',
    kpi3Label: 'Duplicate ID Card', kpi3Value: '₹ 150', kpi3Sub: 'RFID Smart Reissue', kpi3Icon: 'bi-person-badge',
    kpi4Label: 'YTD Misc Recovery', kpi4Value: '₹ 1,84,200', kpi4Sub: 'Credited to Sundry', kpi4Icon: 'bi-wallet',
    columns: ['Service Code', 'Fee Description', 'Standard Charge (₹)', 'Tax Applicable', 'Processing SLA', 'Issuing Authority', 'Status'],
    rows: [
      ['<span class="badge bg-secondary">MSC-TC</span>', 'Transfer Certificate (TC) Issue', '₹ 250', 'Nil', '2 Working Days', 'Administrative Officer', '<span class="badge bg-success">Active</span>'],
      ['<span class="badge bg-secondary">MSC-ID</span>', 'Replacement RFID Smart ID Badge', '₹ 150', 'Nil', 'Same Day', 'IT Helpdesk', '<span class="badge bg-success">Active</span>'],
      ['<span class="badge bg-secondary">MSC-BON</span>', 'Bonafide / Character Certificate', '₹ 100', 'Nil', '24 Hours', 'Front Desk', '<span class="badge bg-success">Active</span>'],
      ['<span class="badge bg-secondary">MSC-LIB</span>', 'Library Overdue Fine (>7 Days)', '₹ 5 / Day', 'Nil', 'Immediate', 'Librarian', '<span class="badge bg-success">Active</span>']
    ]
  },
  {
    filename: 'installment-setup.php',
    title: 'Installment Setup',
    desc: 'Configure flexible payment splits (Full, 4-Quarter, 10-Month, Custom) with automated cutoff date generators',
    icon: 'bi-calendar-range',
    actionBtnText: 'Create Installment Plan',
    kpi1Label: 'Supported Plans', kpi1Value: '3 Standard Plans', kpi1Sub: 'Annual, Qtr, Monthly', kpi1Icon: 'bi-diagram-3',
    kpi2Label: 'Default Cutoff', kpi2Value: '15th of Due Month', kpi2Sub: 'Strict Automated Lock', kpi2Icon: 'bi-clock',
    kpi3Label: 'Grace Days', kpi3Value: '10 Days', kpi3Sub: 'Before Fine Triggers', kpi3Icon: 'bi-shield-check',
    kpi4Label: 'Split Integrity', kpi4Value: '100% Balanced', kpi4Sub: 'Sum matches Total', kpi4Icon: 'bi-check2-all',
    columns: ['Plan Name', 'Number of Splits', 'Split Ratio %', 'Frequency', 'Penalty Trigger', 'Assigned Cohort', 'Status'],
    rows: [
      ['<strong>Quarterly Standard (Default)</strong>', '4 Splits', '25% - 25% - 25% - 25%', 'Apr, Jul, Oct, Jan', 'After 25th of month', '87% of Students', '<span class="badge bg-success">Active</span>'],
      ['<strong>Monthly Split Plan</strong>', '10 Splits', '10% each (Apr - Jan)', 'Every Month (10th)', 'After 15th of month', '13% of Students', '<span class="badge bg-success">Active</span>'],
      ['<strong>One-Time Annual Lump-Sum</strong>', '1 Split', '100% (with 5% rebate)', '15th April', 'After 30th April', 'Corporate / Advance', '<span class="badge bg-success">Active</span>']
    ]
  },
  {
    filename: 'student-fee-assignment.php',
    title: 'Student Fee Assignment',
    desc: 'Individual student ledger mapping with class tuition, selected transport route, hostel opted, and approved discounts',
    icon: 'bi-person-check-fill',
    actionBtnText: 'Assign Student Fee',
    kpi1Label: 'Assigned Profiles', kpi1Value: '1,420 / 1,420', kpi1Sub: '100% Mapped', kpi1Icon: 'bi-person-check',
    kpi2Label: 'Custom Overrides', kpi2Value: '64 Profiles', kpi2Sub: 'Special Concessions', kpi2Icon: 'bi-sliders',
    kpi3Label: 'Transport Mapped', kpi3Value: '864 Students', kpi3Sub: 'Billed on Slab', kpi3Icon: 'bi-bus-front',
    kpi4Label: 'Hostel Mapped', kpi4Value: '142 Students', kpi4Sub: 'Billed on Room', kpi4Icon: 'bi-building',
    columns: ['Admission No', 'Student Name', 'Class & Sec', 'Base Tuition (₹)', 'Transport (₹)', 'Concession %', 'Net Annual Payable (₹)', 'Ledger'],
    rows: [
      ['ADM-2021-0412', '<strong>Aarav Sharma</strong>', 'Class X-A', '₹ 74,000', '₹ 24,000 (Zone 2)', '0% (Standard)', '<strong>₹ 98,000</strong>', '<button class="btn btn-xs btn-outline-primary">Ledger</button>'],
      ['ADM-2021-0419', '<strong>Ananya Verma</strong>', 'Class X-A', '₹ 74,000', 'Nil (Self Walk)', '10% (Merit Topper)', '<strong>₹ 66,600</strong>', '<button class="btn btn-xs btn-outline-primary">Ledger</button>'],
      ['ADM-2021-0435', '<strong>Rohan Patel</strong>', 'Class X-B', '₹ 74,000', '₹ 18,000 (Zone 1)', '15% (Sibling S-2)', '<strong>₹ 80,900</strong>', '<button class="btn btn-xs btn-outline-primary">Ledger</button>'],
      ['ADM-2019-0118', '<strong>Diya Mukherjee</strong>', 'Class XII-Sci', '₹ 86,000', 'Nil (Hosteler)', '0% + ₹1.4L Hostel', '<strong>₹ 2,26,000</strong>', '<button class="btn btn-xs btn-outline-primary">Ledger</button>']
    ]
  },
  {
    filename: 'invoice-generation.php',
    title: 'Fee Invoice Generation',
    desc: 'Bulk invoice billing engine generating printable tax invoices with QR payment links and breakdowns',
    icon: 'bi-file-earmark-spreadsheet',
    actionBtnText: 'Generate Bulk Invoices',
    actionBtnIcon: 'bi-gear-fill',
    isToolPage: true,
    toolModalId: 'generateInvoiceModal',
    kpi1Label: 'Invoices Issued', kpi1Value: '1,420 Bills', kpi1Sub: 'Quarter 3 Billed', kpi1Icon: 'bi-receipt',
    kpi2Label: 'Total Invoiced Demand', kpi2Value: '₹ 1.71 Crores', kpi2Sub: 'Q3 Academic Billing', kpi2Icon: 'bi-cash-stack',
    kpi3Label: 'Sent via WhatsApp', kpi3Value: '1,392 Delivered', kpi3Sub: 'PDF Link Embedded', kpi3Icon: 'bi-whatsapp',
    kpi4Label: 'Invoice Format', kpi4Value: 'GST Compliant', kpi4Sub: 'HSN/SAC 9992', kpi4Icon: 'bi-file-earmark-check',
    columns: ['Invoice #', 'Billing Quarter', 'Target Class', 'Total Billed Amount (₹)', 'Issue Date', 'Due Date', 'PDF Batch', 'Status'],
    rows: [
      ['<span class="badge bg-primary">INV-2026-Q3-10</span>', 'Quarter 3 (Oct-Dec)', 'Class X (All Sec)', '₹ 22,94,000', '01-Oct-2026', '15-Oct-2026', '<button class="btn btn-xs btn-outline-primary">Download ZIP</button>', '<span class="badge bg-success">Dispatched</span>'],
      ['<span class="badge bg-primary">INV-2026-Q3-12S</span>', 'Quarter 3 (Oct-Dec)', 'Class XII (Science)', '₹ 18,92,000', '01-Oct-2026', '15-Oct-2026', '<button class="btn btn-xs btn-outline-primary">Download ZIP</button>', '<span class="badge bg-success">Dispatched</span>'],
      ['<span class="badge bg-primary">INV-2026-Q3-12C</span>', 'Quarter 3 (Oct-Dec)', 'Class XII (Commerce)', '₹ 8,97,000', '01-Oct-2026', '15-Oct-2026', '<button class="btn btn-xs btn-outline-primary">Download ZIP</button>', '<span class="badge bg-success">Dispatched</span>'],
      ['<span class="badge bg-primary">INV-2026-Q3-PRI</span>', 'Quarter 3 (Oct-Dec)', 'Primary Wing (I-V)', '₹ 70,20,000', '01-Oct-2026', '15-Oct-2026', '<button class="btn btn-xs btn-outline-primary">Download ZIP</button>', '<span class="badge bg-success">Dispatched</span>']
    ]
  },
  {
    filename: 'fee-collection.php',
    title: 'Fee Collection Counter',
    desc: 'Front-counter cashier terminal with instant student search, barcode receipt printing, and multiple payment tenders',
    icon: 'bi-calculator-fill',
    actionBtnText: 'Collect Fee at Counter',
    actionBtnIcon: 'bi-plus-circle',
    kpi1Label: 'Counter Receipts Today', kpi1Value: '28 Receipts', kpi1Sub: 'Counter Terminal 1', kpi1Icon: 'bi-receipt',
    kpi2Label: 'Today Collected', kpi2Value: '₹ 3,84,500', kpi2Sub: 'Reconciled in Drawer', kpi2Icon: 'bi-wallet2',
    kpi3Label: 'Cash in Hand', kpi3Value: '₹ 78,500', kpi3Sub: 'Bank Deposit Slips Ready', kpi3Icon: 'bi-cash',
    kpi4Label: 'Terminal Speed', kpi4Value: '45 sec / receipt', kpi4Sub: 'High Efficiency', kpi4Icon: 'bi-lightning',
    columns: ['Receipt No', 'Admission No', 'Student Name', 'Class & Sec', 'Amount Paid (₹)', 'Tender Mode', 'Cashier', 'Print'],
    rows: [
      ['<span class="badge bg-dark">RCP-8812</span>', 'ADM-2021-0412', '<strong>Aarav Sharma</strong>', 'Class X-A', '<strong>₹ 18,500</strong>', '<span class="badge bg-primary">UPI PhonePe</span>', 'Mr. Naveen Pant', '<button class="btn btn-xs btn-primary"><i class="bi bi-printer me-1"></i>Print</button>'],
      ['<span class="badge bg-dark">RCP-8811</span>', 'ADM-2021-0419', '<strong>Sneha Kapoor</strong>', 'Class X-A', '<strong>₹ 16,000</strong>', '<span class="badge bg-info text-dark">HDFC Netbanking</span>', 'System Online', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-printer me-1"></i>Print</button>'],
      ['<span class="badge bg-dark">RCP-8810</span>', 'ADM-2021-0435', '<strong>Rohan Patel</strong>', 'Class X-B', '<strong>₹ 21,200</strong>', '<span class="badge bg-secondary">Cash Counter</span>', 'Mr. Naveen Pant', '<button class="btn btn-xs btn-primary"><i class="bi bi-printer me-1"></i>Print</button>'],
      ['<span class="badge bg-dark">RCP-8809</span>', 'ADM-2019-0118', '<strong>Diya Mukherjee</strong>', 'Class XII-Sci', '<strong>₹ 23,800</strong>', '<span class="badge bg-success">POS Card Swipe</span>', 'Mrs. Sunita Roy', '<button class="btn btn-xs btn-primary"><i class="bi bi-printer me-1"></i>Print</button>']
    ]
  },
  {
    filename: 'partial-payments.php',
    title: 'Partial Payments',
    desc: 'Manage partial fee installments, remaining balance tracking, and installment promise notes for families in need',
    icon: 'bi-pie-chart',
    actionBtnText: 'Authorize Partial Payment',
    kpi1Label: 'Active Partials', kpi1Value: '42 Accounts', kpi1Sub: 'Approved by Principal', kpi1Icon: 'bi-pie-chart',
    kpi2Label: 'Collected Part', kpi2Value: '₹ 4.85 Lakhs', kpi2Sub: 'First Tranche', kpi2Icon: 'bi-cash',
    kpi3Label: 'Remaining Balance', kpi3Value: '₹ 4.15 Lakhs', kpi3Sub: 'PDC Cheques Deposited', kpi3Icon: 'bi-hourglass-split',
    kpi4Label: 'Clearance Rate', kpi4Value: '96.2%', kpi4Sub: 'On Scheduled Promise', kpi4Icon: 'bi-check-all',
    columns: ['Agreement #', 'Student Name', 'Class & Sec', 'Total Due (₹)', 'Paid Part (₹)', 'Remaining (₹)', 'Next Promise Date', 'Status'],
    rows: [
      ['<span class="badge bg-secondary">PART-101</span>', '<strong>Kartik Iyer</strong>', 'Class X-B', '₹ 18,500', '₹ 10,000', '<strong class="text-danger">₹ 8,500</strong>', '15-Nov-2026', '<span class="badge bg-warning text-dark">Under Undertaking</span>'],
      ['<span class="badge bg-secondary">PART-102</span>', '<strong>Meera Swaminathan</strong>', 'Class XII-A', '₹ 21,500', '₹ 12,000', '<strong class="text-danger">₹ 9,500</strong>', '20-Nov-2026', '<span class="badge bg-warning text-dark">Under Undertaking</span>'],
      ['<span class="badge bg-secondary">PART-103</span>', '<strong>Sameer Quadri</strong>', 'Class IX-C', '₹ 17,500', '₹ 8,500', '<strong class="text-danger">₹ 9,000</strong>', '10-Nov-2026', '<span class="badge bg-warning text-dark">Under Undertaking</span>']
    ]
  },
  {
    filename: 'advance-payments.php',
    title: 'Advance Payments',
    desc: 'Prepaid student wallet balances, multi-quarter advance credits, and unadjusted fee ledger reconciliation',
    icon: 'bi-arrow-up-right-square-fill',
    actionBtnText: 'Deposit Advance Credit',
    kpi1Label: 'Advance Wallet Total', kpi1Value: '₹ 14.80 Lakhs', kpi1Sub: 'Prepaid Credits', kpi1Icon: 'bi-wallet',
    kpi2Label: 'Prepaid Families', kpi2Value: '48 Students', kpi2Sub: 'Surplus Account', kpi2Icon: 'bi-people',
    kpi3Label: 'Auto-Adjustment', kpi3Value: 'Enabled', kpi3Sub: 'Deducts next bill cycle', kpi3Icon: 'bi-arrow-repeat',
    kpi4Label: 'Interest Policy', kpi4Value: '0% Interest', kpi4Sub: 'Held in Escrow', kpi4Icon: 'bi-shield-check',
    columns: ['Wallet ID', 'Student Name', 'Class', 'Current Advance (₹)', 'Source of Advance', 'Last Deposit Date', 'Next Scheduled Offset'],
    rows: [
      ['<span class="badge bg-dark">WLT-401</span>', '<strong>Aditya Verma</strong>', 'Class VI-A', '<strong class="text-success">₹ 42,000</strong>', 'Excess RTGS Transfer', '18-Oct-2026', 'Offset against Q4 Billing'],
      ['<span class="badge bg-dark">WLT-402</span>', '<strong>Pooja Bhatt</strong>', 'Class VIII-B', '<strong class="text-success">₹ 15,000</strong>', 'Hostel Security Adjustment', '12-Oct-2026', 'Offset against Q4 Billing'],
      ['<span class="badge bg-dark">WLT-403</span>', '<strong>Gaurav Joshi</strong>', 'Class X-C', '<strong class="text-success">₹ 28,500</strong>', 'Lump Sum Advance Deposit', '04-Oct-2026', 'Offset against Q4 Billing']
    ]
  },
  {
    filename: 'receipt-generation.php',
    title: 'Fee Receipt Generation',
    desc: 'Bespoke thermal & A4 fee receipts with school registration seals, transaction hashes, and QR code verification',
    icon: 'bi-receipt',
    actionBtnText: 'Generate Custom Receipt',
    isToolPage: true,
    toolModalId: 'generateReceiptModal',
    kpi1Label: 'Total Receipts Issued', kpi1Value: '4,840 Receipts', kpi1Sub: 'Session 2026-27', kpi1Icon: 'bi-receipt-cutoff',
    kpi2Label: 'QR Verification', kpi2Value: '100% Encrypted', kpi2Sub: 'Instant Anti-Tamper Check', kpi2Icon: 'bi-qr-code-scan',
    kpi3Label: 'Formats Supported', kpi3Value: '3 Layouts', kpi3Sub: 'A4, A5 & 80mm Thermal', kpi3Icon: 'bi-printer',
    kpi4Label: 'Duplicate Markings', kpi4Value: 'Strict Stamp', kpi4Sub: 'Audit Trail Retained', kpi4Icon: 'bi-patch-exclamation',
    columns: ['Receipt No', 'Date & Time', 'Student Name', 'Class', 'Total Paid (₹)', 'Tax Invoice Ref', 'Verified Status', 'Action'],
    rows: [
      ['<span class="badge bg-dark">RCP-2026-8812</span>', '28-Oct-2026 14:24', 'Aarav Sharma', 'Class X-A', '₹ 18,500', 'INV-2026-Q3-10', '<span class="badge bg-success">QR Verified</span>', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-printer me-1"></i>Print A4</button>'],
      ['<span class="badge bg-dark">RCP-2026-8811</span>', '28-Oct-2026 14:10', 'Sneha Kapoor', 'Class X-A', '₹ 16,000', 'INV-2026-Q3-10', '<span class="badge bg-success">QR Verified</span>', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-printer me-1"></i>Print A4</button>'],
      ['<span class="badge bg-dark">RCP-2026-8810</span>', '28-Oct-2026 13:48', 'Rohan Patel', 'Class X-B', '₹ 21,200', 'INV-2026-Q3-10', '<span class="badge bg-success">QR Verified</span>', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-printer me-1"></i>Print A4</button>']
    ]
  },
  {
    filename: 'receipt-reprint.php',
    title: 'Receipt Reprinting',
    desc: 'Audit-controlled reprinting of archived fee receipts with mandatory justification logs and watermark stamps',
    icon: 'bi-printer-fill',
    actionBtnText: 'Request Reprint Permission',
    kpi1Label: 'Reprint Requests', kpi1Value: '18 Filed', kpi1Sub: 'Lost by Parent', kpi1Icon: 'bi-printer',
    kpi2Label: 'Watermark Protection', kpi2Value: '"DUPLICATE"', kpi2Sub: 'Red Stamp Watermark', kpi2Icon: 'bi-shield-check',
    kpi3Label: 'Approval Required', kpi3Value: 'Accounts Officer', kpi3Sub: 'OTP Authorization', kpi3Icon: 'bi-person-lock',
    kpi4Label: 'Discrepancy Audit', kpi4Value: '0 Flags', kpi4Sub: 'Exact Hash Matching', kpi4Icon: 'bi-check2-all',
    columns: ['Reprint ID', 'Original Receipt #', 'Student Name', 'Parent Name', 'Reason for Reprint', 'Approved By', 'Print Count', 'Reprint'],
    rows: [
      ['<span class="badge bg-secondary">REP-041</span>', 'RCP-2026-5120', 'Tanvi Deshmukh', 'Dr. S. Deshmukh', 'Lost original copy for Tax IT exemption', 'Accounts Head', 'Reprint #1', '<button class="btn btn-xs btn-danger"><i class="bi bi-printer me-1"></i>Print Duplicate</button>'],
      ['<span class="badge bg-secondary">REP-042</span>', 'RCP-2026-4210', 'Ishaan Joshi', 'Mr. V. Joshi', 'Required for Employer Reimbursement', 'Accounts Head', 'Reprint #1', '<button class="btn btn-xs btn-danger"><i class="bi bi-printer me-1"></i>Print Duplicate</button>']
    ]
  },
  {
    filename: 'receipt-cancellation.php',
    title: 'Receipt Cancellation',
    desc: 'Reverse bounced cheque receipts, chargebacks, or clerical mistakes with dual-sign supervisor authorization',
    icon: 'bi-x-circle-fill',
    actionBtnText: 'Initiate Cancellation Workflow',
    actionBtnIcon: 'bi-x-octagon',
    kpi1Label: 'Cancelled Receipts', kpi1Value: '4 Receipts', kpi1Sub: '0.08% of Total', kpi1Icon: 'bi-x-circle',
    kpi2Label: 'Cheque Bounce Cases', kpi2Value: '3 Cases', kpi2Sub: 'Bounced with Dishonour', kpi2Icon: 'bi-slash-circle',
    kpi3Label: 'Bouncing Penalty', kpi3Value: '₹ 500 Added', kpi3Sub: 'Re-added to Student Due', kpi3Icon: 'bi-plus-circle',
    kpi4Label: 'Ledger Rollback', kpi4Value: 'Auto-Reversed', kpi4Sub: 'Accounts Verified', kpi4Icon: 'bi-arrow-counterclockwise',
    columns: ['Cancel ID', 'Receipt Number', 'Student Name', 'Original Amount (₹)', 'Reason for Cancellation', 'Cheque / Ref Details', 'Approved By', 'Reversal Status'],
    rows: [
      ['<span class="badge bg-danger">CNC-01</span>', 'RCP-2026-7910', 'Rahul Sharma', '₹ 18,500', 'Cheque Bounced (Funds Insufficient)', 'SBI Chq #441029', 'Finance Director', '<span class="badge bg-danger">Ledger Reversed (+₹500 Fine)</span>'],
      ['<span class="badge bg-danger">CNC-02</span>', 'RCP-2026-8004', 'Karan Mehta', '₹ 21,500', 'Duplicate Online UPI Chargeback', 'UPI Ref #662019481', 'Finance Director', '<span class="badge bg-danger">Ledger Reversed</span>']
    ]
  },
  {
    filename: 'fee-refunds.php',
    title: 'Fee Refund Management',
    desc: 'Process caution money returns upon withdrawal (TC), duplicate transaction refunds, and transfer reconciliations',
    icon: 'bi-arrow-left-right',
    actionBtnText: 'Process New Refund',
    kpi1Label: 'Refunds Processed', kpi1Value: '18 Cases', kpi1Sub: 'TC & Withdrawals', kpi1Icon: 'bi-cash-coin',
    kpi2Label: 'Caution Refund Total', kpi2Value: '₹ 1.80 Lakhs', kpi2Sub: '₹ 10,000 / Student', kpi2Icon: 'bi-wallet',
    kpi3Label: 'No-Dues Clearance', kpi3Value: '100% Cleared', kpi3Sub: 'Library, Lab, Transport', kpi3Icon: 'bi-check2-circle',
    kpi4Label: 'Payment Channel', kpi4Value: 'Direct NEFT', kpi4Sub: 'To Parent Bank Account', kpi4Icon: 'bi-bank',
    columns: ['Refund ID', 'Student Name', 'TC Ref #', 'Caution Money Paid (₹)', 'Deductions / Dues (₹)', 'Net Refund Amount (₹)', 'Parent Bank Details', 'Disbursed Status'],
    rows: [
      ['<span class="badge bg-secondary">RFD-081</span>', 'Manish Pandey', 'TC-2026-088', '₹ 10,000', '₹ 0 (Clear No-Dues)', '<strong class="text-success">₹ 10,000</strong>', 'HDFC A/c **4120 (Mr. Pandey)', '<span class="badge bg-success">NEFT Disbursed</span>'],
      ['<span class="badge bg-secondary">RFD-082</span>', 'Simran Gill', 'TC-2026-092', '₹ 10,000', '₹ 450 (Library Book)', '<strong class="text-success">₹ 9,550</strong>', 'SBI A/c **9108 (Mrs. Gill)', '<span class="badge bg-success">NEFT Disbursed</span>']
    ]
  },
  {
    filename: 'concessions.php',
    title: 'Fee Concessions & Waivers',
    desc: 'Management and approval matrix for economically weaker sections (EWS), orphan aid, and disaster reliefs',
    icon: 'bi-tag-fill',
    actionBtnText: 'Apply Fee Waiver',
    kpi1Label: 'Active Waivers', kpi1Value: '64 Students', kpi1Sub: '4.5% of School Strength', kpi1Icon: 'bi-percent',
    kpi2Label: 'Total Relief Value', kpi2Value: '₹ 24.5 Lakhs', kpi2Sub: 'Funded by Trust Endowment', kpi2Icon: 'bi-currency-rupee',
    kpi3Label: 'RTE 25% Free Quota', kpi3Value: '42 Students', kpi3Sub: 'Govt Reimbursement Mapped', kpi3Icon: 'bi-award',
    kpi4Label: 'Trustee Sign-off', kpi4Value: '100% Audited', kpi4Sub: 'Verified Annual Income', kpi4Icon: 'bi-shield-check',
    columns: ['Concession ID', 'Student Name', 'Class & Sec', 'Concession Category', 'Waiver %', 'Annual Relief (₹)', 'Approval Authority', 'Status'],
    rows: [
      ['<span class="badge bg-primary">WVR-01</span>', 'Kavita Shenoy', 'Class X-C', 'Single Parent Girl Child', '25% on Tuition', '₹ 14,800', 'Managing Trustee', '<span class="badge bg-success">Approved</span>'],
      ['<span class="badge bg-primary">WVR-02</span>', 'Deepak Chauhan', 'Class X-B', 'EWS / Low Income Family', '50% on Tuition', '₹ 29,600', 'School Management Comm', '<span class="badge bg-success">Approved</span>'],
      ['<span class="badge bg-primary">WVR-03</span>', 'Ayaan Khan', 'Class VII-A', 'RTE Section 12(1)(c)', '100% Free Education', '₹ 60,000', 'Govt BSA Order', '<span class="badge bg-success">Govt Quota</span>']
    ]
  },
  {
    filename: 'scholarships.php',
    title: 'Scholarships',
    desc: 'Merit-cum-means scholarships, state government scholarship portals (NSP), and athletic sports endowments',
    icon: 'bi-trophy-fill',
    actionBtnText: 'Award Scholarship',
    kpi1Label: 'Scholarship Winners', kpi1Value: '28 Students', kpi1Sub: 'Academic & Sports Top Tier', kpi1Icon: 'bi-trophy',
    kpi2Label: 'Annual Corpus', kpi2Value: '₹ 8.5 Lakhs', kpi2Sub: 'Trust Endowment Fund', kpi2Icon: 'bi-cash-coin',
    kpi3Label: 'National Portal (NSP)', kpi3Value: '14 Synced', kpi3Sub: 'Direct DBT to Student Bank', kpi3Icon: 'bi-bank',
    kpi4Label: 'Renewal Criteria', kpi4Value: '>=85% Annual', kpi4Sub: 'Consistent Performance', kpi4Icon: 'bi-graph-up',
    columns: ['Scholarship Code', 'Award Title', 'Recipient Student', 'Class', 'Grant Amount (₹)', 'Funding Source', 'Criteria Met', 'Actions'],
    rows: [
      ['<span class="badge bg-warning text-dark">SCH-MERIT-01</span>', 'Chairman Academic Excellence', '<strong>Ananya Verma</strong>', 'Class X-A', '₹ 25,000', 'School Trust Endowment', '98.2% Board Mock Rank 1', '<button class="btn btn-xs btn-outline-primary">Dossier</button>'],
      ['<span class="badge bg-warning text-dark">SCH-MERIT-02</span>', 'Founder Science Medal', '<strong>Diya Mukherjee</strong>', 'Class XII-Sci', '₹ 25,000', 'Founder Family Grant', '97.6% Olympiad Gold', '<button class="btn btn-xs btn-outline-primary">Dossier</button>'],
      ['<span class="badge bg-warning text-dark">SCH-SPORTS-01</span>', 'National Athletic Grant', '<strong>Vikram Rawat</strong>', 'Class XI-Arts', '₹ 20,000', 'Sports Promotion Fund', 'SGFI State Gold Medalist', '<button class="btn btn-xs btn-outline-primary">Dossier</button>']
    ]
  },
  {
    filename: 'sibling-discounts.php',
    title: 'Sibling Discounts',
    desc: 'Automated 15% tuition concession for the 2nd child and 25% for the 3rd child enrolled concurrently in school',
    icon: 'bi-people-fill',
    actionBtnText: 'Map Sibling Pair',
    kpi1Label: 'Sibling Pairs Enrolled', kpi1Value: '112 Families', kpi1Sub: '248 Linked Children', kpi1Icon: 'bi-people',
    kpi2Label: 'Sibling S-2 Concession', kpi2Value: '15% Discount', kpi2Sub: 'Applied on Younger Child', kpi2Icon: 'bi-percent',
    kpi3Label: 'Sibling S-3 Concession', kpi3Value: '25% Discount', kpi3Sub: 'Applied on 3rd Child', kpi3Icon: 'bi-percent',
    kpi4Label: 'Verification Status', kpi4Value: 'Aadhaar / Parent Mapped', kpi4Sub: 'Auto-Matched Parents', kpi4Icon: 'bi-link',
    columns: ['Pair ID', 'Elder Sibling (Full Fee)', 'Younger Sibling (Discounted)', 'Shared Parent Name', 'Discount %', 'Annual Relief (₹)', 'Verification'],
    rows: [
      ['<span class="badge bg-secondary">SIB-041</span>', 'Rohan Patel (X-B)', 'Dev Patel (VI-A)', 'Mr. Kirit Patel', '15% on Younger', '₹ 9,000', '<span class="badge bg-success">Verified & Linked</span>'],
      ['<span class="badge bg-secondary">SIB-042</span>', 'Aarav Sharma (X-A)', 'Aditi Sharma (IV-B)', 'Mr. Rajesh Sharma', '15% on Younger', '₹ 8,100', '<span class="badge bg-success">Verified & Linked</span>'],
      ['<span class="badge bg-secondary">SIB-043</span>', 'Karan Nair (XII-C)', 'Varun Nair (VIII-A)', 'Mrs. Rekha Nair', '15% on Younger', '₹ 9,000', '<span class="badge bg-success">Verified & Linked</span>']
    ]
  },
  {
    filename: 'staff-discounts.php',
    title: 'Staff Ward Discounts',
    desc: '50% tuition fee waiver for regular teaching and administrative staff children as per employment contracts',
    icon: 'bi-person-badge',
    actionBtnText: 'Add Staff Ward Entitlement',
    kpi1Label: 'Staff Wards Enrolled', kpi1Value: '38 Children', kpi1Sub: 'Teaching & Non-Teaching', kpi1Icon: 'bi-person-badge',
    kpi2Label: 'Tuition Waiver %', kpi2Value: '50% Discount', kpi2Sub: 'Max 2 Children / Staff', kpi2Icon: 'bi-percent',
    kpi3Label: 'Payable by Staff', kpi3Value: 'Transport & Activity Only', kpi3Sub: 'Nominal Charges', kpi3Icon: 'bi-wallet',
    kpi4Label: 'HR Service Linked', kpi4Value: 'Active Service Check', kpi4Sub: 'Valid while employed', kpi4Icon: 'bi-shield-check',
    columns: ['Ward ID', 'Child Name', 'Class & Sec', 'Staff Parent Name', 'Staff Designation', 'Waiver %', 'Annual Relief (₹)', 'HR Status'],
    rows: [
      ['<span class="badge bg-dark">STF-W01</span>', 'Priya Verma', 'Class VIII-A', 'Mr. Rajesh Verma', 'PGT Mathematics', '50% Tuition Waiver', '₹ 30,000', '<span class="badge bg-success">Active Permanent</span>'],
      ['<span class="badge bg-dark">STF-W02</span>', 'Ankit Menon', 'Class IX-B', 'Mrs. Anita Menon', 'TGT Science', '50% Tuition Waiver', '₹ 35,000', '<span class="badge bg-success">Active Permanent</span>'],
      ['<span class="badge bg-dark">STF-W03</span>', 'Nikhil Kulkarni', 'Class VI-C', 'Mrs. Neha Kulkarni', 'PGT Commerce', '50% Tuition Waiver', '₹ 30,000', '<span class="badge bg-success">Active Permanent</span>']
    ]
  },
  {
    filename: 'late-fees.php',
    title: 'Late Fees & Fines',
    desc: 'Automated late fee accrual rules (₹50/day after 15th of the due month) and hardship waiver approval queue',
    icon: 'bi-alarm-fill',
    actionBtnText: 'Apply / Waive Late Fine',
    kpi1Label: 'Late Fine Accrued', kpi1Value: '₹ 1.24 Lakhs', kpi1Sub: 'Quarter 3 Overdues', kpi1Icon: 'bi-cash-coin',
    kpi2Label: 'Daily Rate', kpi2Value: '₹ 50 / Day', kpi2Sub: 'Capped at ₹ 1,500 max', kpi2Icon: 'bi-exclamation-triangle',
    kpi3Label: 'Fine Waiver Requests', kpi3Value: '12 Applications', kpi3Sub: 'Medical & Salary delays', kpi3Icon: 'bi-file-earmark-medical',
    kpi4Label: 'Automatic Compounding', kpi4Value: 'System Auto-Add', kpi4Sub: 'Calculated at Midnight', kpi4Icon: 'bi-clock-history',
    columns: ['Student Name', 'Admission No', 'Class', 'Quarter Billed', 'Days Overdue', 'Accrued Fine (₹)', 'Principal Waiver Request', 'Action'],
    rows: [
      ['Karan Malhotra', 'ADM-2021-0498', 'Class X-C', 'Quarter 3', '12 Days Overdue', '₹ 600', '<span class="badge bg-warning text-dark">Medical Waiver Pending</span>', '<button class="btn btn-xs btn-outline-danger">Waive Fine</button>'],
      ['Sandeep Rao', 'ADM-2021-0512', 'Class XII-C', 'Quarter 3', '8 Days Overdue', '₹ 400', '<span class="text-muted">None</span>', '<button class="btn btn-xs btn-outline-primary">Collect</button>'],
      ['Manish Yadav', 'ADM-2021-0530', 'Class IX-A', 'Quarter 3', '14 Days Overdue', '₹ 700', '<span class="text-muted">None</span>', '<button class="btn btn-xs btn-outline-primary">Collect</button>']
    ]
  },
  {
    filename: 'outstanding-balances.php',
    title: 'Outstanding Balances',
    desc: 'Master outstanding register filtered by aging bracket (0-30 days, 31-60 days, 60+ days) and section totals',
    icon: 'bi-hourglass-split',
    isReportPage: true,
    kpi1Label: 'Total Outstanding', kpi1Value: '₹ 1.43 Crores', kpi1Sub: 'All Classes (312 Students)', kpi1Icon: 'bi-cash-stack',
    kpi2Label: '0 - 30 Days (Current)', kpi2Value: '₹ 84.5 Lakhs', kpi2Sub: 'Expected this week', kpi2Icon: 'bi-calendar-event',
    kpi3Label: '31 - 60 Days (Aging)', kpi3Value: '₹ 38.2 Lakhs', kpi3Sub: 'Reminder SMS dispatched', kpi3Icon: 'bi-chat-dots',
    kpi4Label: '60+ Days (Critical)', kpi4Value: '₹ 20.3 Lakhs', kpi4Sub: 'Notice Sent to Parents', kpi4Icon: 'bi-shield-exclamation',
    columns: ['Student Name', 'Admission No', 'Class & Sec', 'Parent Contact', 'Quarter 1 & 2 Arrears', 'Quarter 3 Due', 'Total Overdue (₹)', 'Aging Bracket'],
    rows: [
      ['<strong>Deepak Chauhan</strong>', 'ADM-2021-0492', 'Class X-B', '+91 98112-40112', '₹ 0', '₹ 18,500', '<strong>₹ 18,500</strong>', '<span class="badge bg-warning text-dark">0-30 Days</span>'],
      ['<strong>Sameer Quadri</strong>', 'ADM-2021-0511', 'Class IX-C', '+91 98223-11099', '₹ 17,500', '₹ 17,500', '<strong class="text-danger">₹ 35,000</strong>', '<span class="badge bg-danger">60+ Days</span>'],
      ['<strong>Rahul Sen</strong>', 'ADM-2021-0518', 'Class X-C', '+91 94150-29118', '₹ 0', '₹ 18,500', '<strong>₹ 18,500</strong>', '<span class="badge bg-warning text-dark">0-30 Days</span>'],
      ['<strong>Varun Kulkarni</strong>', 'ADM-2019-0192', 'Class XII-Sci', '+91 97118-44210', '₹ 0', '₹ 21,500', '<strong>₹ 21,500</strong>', '<span class="badge bg-warning text-dark">0-30 Days</span>']
    ]
  },
  {
    filename: 'defaulter-lists.php',
    title: 'Fee Defaulter Lists',
    desc: 'Escalation roster for students with chronic non-payment, portal access suspension, and legal notice triggers',
    icon: 'bi-exclamation-triangle-fill',
    actionBtnText: 'Export Boarding Defaulters',
    kpi1Label: 'Severe Defaulters', kpi1Value: '24 Cases (>60 Days)', kpi1Sub: 'Urgent Accounts Action', kpi1Icon: 'bi-person-x',
    kpi2Label: 'Portal Restricted', kpi2Value: '12 Accounts', kpi2Sub: 'Admit Card Withheld', kpi2Icon: 'bi-lock-fill',
    kpi3Label: 'Call Follow-up Rate', kpi3Value: '100% Called', kpi3Sub: 'Accounts Dept Tele-call', kpi3Icon: 'bi-telephone-outbound',
    kpi4Label: 'PDC Deposited', kpi4Value: '8 Cheques in Clearing', kpi4Sub: 'Resolving this week', kpi4Icon: 'bi-bank',
    columns: ['Roll / Adm No', 'Student Name', 'Class & Sec', 'Father / Guardian', 'Phone Number', 'Unpaid Quarters', 'Total Overdue (₹)', 'Action Status'],
    rows: [
      ['ADM-2021-0511', '<strong>Sameer Quadri</strong>', 'Class IX-C', 'Mr. M. Quadri', '+91 98223-11099', 'Q2 + Q3', '<strong class="text-danger">₹ 35,000</strong>', '<span class="badge bg-danger">Final Notice Dispatched</span>'],
      ['ADM-2021-0544', '<strong>Gaurav Saxena</strong>', 'Class XI-Comm', 'Mr. S. Saxena', '+91 94152-33211', 'Q2 + Q3', '<strong class="text-danger">₹ 39,000</strong>', '<span class="badge bg-danger">Admit Card Withheld</span>'],
      ['ADM-2021-0560', '<strong>Pooja Tiwari</strong>', 'Class VII-B', 'Mr. R. Tiwari', '+91 98110-88412', 'Q3', '₹ 15,000', '<span class="badge bg-warning text-dark">PDC Received (Nov 5)</span>']
    ]
  },
  {
    filename: 'due-reminders.php',
    title: 'Fee Due Reminders & SMS',
    desc: 'Automated omnichannel reminder dispatcher via WhatsApp Business, SMS Gateway, and Email with quick-pay UPI links',
    icon: 'bi-chat-dots-fill',
    actionBtnText: 'Send Bulk Due SMS',
    actionBtnIcon: 'bi-send-fill',
    isToolPage: true,
    toolModalId: 'sendRemindersModal',
    kpi1Label: 'Reminders Sent Today', kpi1Value: '312 Messages', kpi1Sub: 'Quarter 3 Due Notice', kpi1Icon: 'bi-whatsapp',
    kpi2Label: 'Delivery Success', kpi2Value: '99.4%', kpi2Sub: 'Instant Delivery DLT', kpi2Icon: 'bi-check-all',
    kpi3Label: 'Direct Link Clicks', kpi3Value: '184 Parents', kpi3Sub: 'Opened Payment Gateway', kpi3Icon: 'bi-cursor-fill',
    kpi4Label: 'Collections from SMS', kpi4Value: '₹ 14.8 Lakhs', kpi4Sub: 'Within 24 Hours of SMS', kpi4Icon: 'bi-currency-rupee',
    columns: ['Batch Code', 'Target Audience', 'Channels Used', 'Message Template', 'Total Sent', 'Delivered %', 'Dispatched At', 'Logs'],
    rows: [
      ['<span class="badge bg-primary">REM-Q3-01</span>', 'All Q3 Unpaid Students', 'WhatsApp + SMS', 'CBSE Fee Reminder with UPI Link', '312 Parents', '<span class="badge bg-success">99.4% (310/312)</span>', '28-Oct-2026 09:30 AM', '<button class="btn btn-xs btn-outline-primary">View Log</button>'],
      ['<span class="badge bg-primary">REM-Q3-02</span>', 'Severe Defaulters (>30 Days)', 'WhatsApp + Registered Email', 'Formal Administrative Notice', '68 Parents', '<span class="badge bg-success">100% (68/68)</span>', '26-Oct-2026 11:00 AM', '<button class="btn btn-xs btn-outline-primary">View Log</button>']
    ]
  },
  {
    filename: 'daily-collection.php',
    title: 'Daily Collection Reports',
    desc: 'Cashier day-end reconciliation book, shift closing summaries, cash-in-drawer tally, and bank deposit challan',
    icon: 'bi-calendar-day-fill',
    isReportPage: true,
    kpi1Label: 'Today Total Recovery', kpi1Value: '₹ 3,84,500', kpi1Sub: '28 Transactions Today', kpi1Icon: 'bi-cash-stack',
    kpi2Label: 'Cash Drawer Actual', kpi2Value: '₹ 78,500', kpi2Sub: 'Tender Verified', kpi2Icon: 'bi-wallet2',
    kpi3Label: 'POS & Card Swipes', kpi3Value: '₹ 58,000', kpi3Sub: 'EDC Terminal Settled', kpi3Icon: 'bi-credit-card',
    kpi4Label: 'Online / UPI Inflow', kpi4Value: '₹ 2,48,000', kpi4Sub: 'Direct to School Bank', kpi4Icon: 'bi-qr-code',
    columns: ['Transaction Date', 'Counter / Cashier', 'Cash Total (₹)', 'Card Total (₹)', 'UPI / Online (₹)', 'Grand Total (₹)', 'Bank Challan Status', 'Audit Sign'],
    rows: [
      ['<strong>Today (28-Oct-2026)</strong>', 'Mr. Naveen Pant (Counter 1)', '₹ 78,500', '₹ 58,000', '₹ 2,48,000', '<strong class="text-success">₹ 3,84,500</strong>', '<span class="badge bg-warning text-dark">Challan In-Progress</span>', '<span class="badge bg-light text-dark border">Open Shift</span>'],
      ['27-Oct-2026', 'Mr. Naveen Pant (Counter 1)', '₹ 1,12,000', '₹ 74,500', '₹ 4,12,000', '<strong>₹ 5,98,500</strong>', '<span class="badge bg-success">Deposited in SBI</span>', '<span class="badge bg-success">Audited & Closed</span>'],
      ['26-Oct-2026', 'Mr. Naveen Pant (Counter 1)', '₹ 94,000', '₹ 62,000', '₹ 3,84,000', '<strong>₹ 5,40,000</strong>', '<span class="badge bg-success">Deposited in SBI</span>', '<span class="badge bg-success">Audited & Closed</span>']
    ]
  },
  {
    filename: 'monthly-collection.php',
    title: 'Monthly Collection Reports',
    desc: 'Month-over-month fiscal inflow summaries, head-wise recovery matrices, and budget vs actual comparative analysis',
    icon: 'bi-bar-chart-fill',
    isReportPage: true,
    kpi1Label: 'October Collection', kpi1Value: '₹ 1.28 Crores', kpi1Sub: 'Quarter 3 Peak Month', kpi1Icon: 'bi-calendar3',
    kpi2Label: 'September Collection', kpi2Value: '₹ 34.2 Lakhs', kpi2Sub: 'Late fee settlements', kpi2Icon: 'bi-graph-up',
    kpi3Label: 'Budget Realization', kpi3Value: '96.4% on Target', kpi3Sub: 'Fiscal Year 2026-27', kpi3Icon: 'bi-pie-chart',
    kpi4Label: 'Surplus Operating Margin', kpi4Value: 'Healthy', kpi4Sub: 'Adequate Liquidity', kpi4Icon: 'bi-shield-check',
    columns: ['Month & Year', 'Tuition Head (₹)', 'Transport Head (₹)', 'Development Head (₹)', 'Hostel & Misc (₹)', 'Total Recovery (₹)', 'Variance vs Budget'],
    rows: [
      ['<strong>October 2026 (M-7)</strong>', '₹ 94,50,000', '₹ 18,20,000', '₹ 10,40,000', '₹ 4,90,000', '<strong class="text-success">₹ 1,28,00,000</strong>', '<span class="text-success fw-bold">+2.8% Surplus</span>'],
      ['September 2026 (M-6)', '₹ 24,00,000', '₹ 5,10,000', '₹ 3,20,000', '₹ 1,90,000', '<strong>₹ 34,20,000</strong>', '<span class="text-success fw-bold">+1.2% Surplus</span>'],
      ['August 2026 (M-5)', '₹ 28,50,000', '₹ 6,40,000', '₹ 4,10,000', '₹ 2,10,000', '<strong>₹ 41,10,000</strong>', '<span class="text-success fw-bold">+0.8% Surplus</span>'],
      ['July 2026 (M-4 / Q2)', '₹ 1,02,00,000', '₹ 21,40,000', '₹ 12,00,000', '₹ 6,20,000', '<strong class="text-success">₹ 1,41,60,000</strong>', '<span class="text-success fw-bold">+3.4% Surplus</span>']
    ]
  },
  {
    filename: 'student-fee-ledgers.php',
    title: 'Student Fee Ledgers',
    desc: '360° individual student accounting ledger showing complete chronological debit demands, receipts, and balance',
    icon: 'bi-journal-richtext',
    isReportPage: true,
    kpi1Label: 'Ledgers Maintained', kpi1Value: '1,420 Enrolled', kpi1Sub: 'Full Historical Ledger', kpi1Icon: 'bi-journals',
    kpi2Label: 'Reconciliation State', kpi2Value: '100% Balanced', kpi2Sub: 'Double-entry Bookkeeping', kpi2Icon: 'bi-check2-circle',
    kpi3Label: 'Statement Export', kpi3Value: 'PDF / Excel', kpi3Sub: 'Parent Dossier Ready', kpi3Icon: 'bi-download',
    kpi4Label: 'Audit Trails', kpi4Value: 'Permanent Retain', kpi4Sub: 'Session-wise Rollover', kpi4Icon: 'bi-archive',
    columns: ['Adm No', 'Student Name', 'Class & Sec', 'Opening Bal (₹)', 'Billed Demand (₹)', 'Total Paid (₹)', 'Current Closing Bal (₹)', 'Action'],
    rows: [
      ['ADM-2021-0412', '<strong>Aarav Sharma</strong>', 'Class X-A', '₹ 0', '₹ 98,000', '₹ 73,500', '<strong class="text-success">₹ 0 (Clear till Q3)</strong>', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-eye me-1"></i>Ledger</button>'],
      ['ADM-2021-0419', '<strong>Ananya Verma</strong>', 'Class X-A', '₹ 0', '₹ 66,600', '₹ 49,950', '<strong class="text-success">₹ 0 (Clear till Q3)</strong>', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-eye me-1"></i>Ledger</button>'],
      ['ADM-2021-0492', '<strong>Deepak Chauhan</strong>', 'Class X-B', '₹ 0', '₹ 74,000', '₹ 37,000', '<strong class="text-danger">₹ 18,500 Due (Q3)</strong>', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-eye me-1"></i>Ledger</button>'],
      ['ADM-2021-0511', '<strong>Sameer Quadri</strong>', 'Class IX-C', '₹ 0', '₹ 70,000', '₹ 17,500', '<strong class="text-danger">₹ 35,000 Due (Q2+Q3)</strong>', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-eye me-1"></i>Ledger</button>']
    ]
  },
  {
    filename: 'payment-gateway.php',
    title: 'Payment Gateway Simulation',
    desc: 'Integration test console for Razorpay, PayU, and BillDesk webhooks, token exchanges, and payment success responses',
    icon: 'bi-hdd-network-fill',
    actionBtnText: 'Simulate Gateway Payment',
    actionBtnIcon: 'bi-play-circle',
    isToolPage: true,
    toolModalId: 'simulatePaymentModal',
    kpi1Label: 'Active Gateways', kpi1Value: 'Razorpay & PayU', kpi1Sub: 'Dual Failover Routing', kpi1Icon: 'bi-hdd-network',
    kpi2Label: 'Success Rate', kpi2Value: '99.12%', kpi2Sub: 'High Reliability', kpi2Icon: 'bi-lightning',
    kpi3Label: 'T+1 Settlement', kpi3Value: 'Direct to HDFC', kpi3Sub: 'Next-day Bank Credit', kpi3Icon: 'bi-bank',
    kpi4Label: 'MDR Surcharge', kpi4Value: '0% on RuPay & UPI', kpi4Sub: 'Zero Cost to Parents', kpi4Icon: 'bi-tag',
    columns: ['Gateway ID', 'Provider Name', 'API Environment', 'Webhook Endpoint', 'Avg Response Time', 'Success Rate', 'Gateway Health'],
    rows: [
      ['<span class="badge bg-primary">GW-RZP-01</span>', '<strong>Razorpay SmartCollect</strong>', '<span class="badge bg-success">Production Live</span>', '/api/v1/webhook/razorpay', '240 ms', '99.2%', '<span class="badge bg-success-subtle text-success border">Healthy</span>'],
      ['<span class="badge bg-primary">GW-PAYU-02</span>', '<strong>PayU Enterprise</strong>', '<span class="badge bg-success">Production Live (Backup)</span>', '/api/v1/webhook/payu', '280 ms', '98.9%', '<span class="badge bg-success-subtle text-success border">Healthy</span>'],
      ['<span class="badge bg-secondary">GW-UPI-03</span>', '<strong>NPCI Dynamic QR BharatPay</strong>', '<span class="badge bg-success">Production Live</span>', '/api/v1/webhook/npci_upi', '180 ms', '99.8%', '<span class="badge bg-success-subtle text-success border">Healthy</span>']
    ]
  },
  {
    filename: 'payment-reconciliation.php',
    title: 'Payment Reconciliation',
    desc: 'Auto-matching gateway settlement batches with ICICI / HDFC school bank accounts to identify unresolved drops',
    icon: 'bi-bank2',
    actionBtnText: 'Upload Bank Statement (CSV)',
    actionBtnIcon: 'bi-upload',
    isToolPage: true,
    toolModalId: 'uploadReconModal',
    kpi1Label: 'Reconciliation Rate', kpi1Value: '99.8%', kpi1Sub: 'Auto-Matched by System', kpi1Icon: 'bi-check2-circle',
    kpi2Label: 'Settlement Batches', kpi2Value: '28 Batches', kpi2Sub: 'All Settled in Bank', kpi2Icon: 'bi-calendar-check',
    kpi3Label: 'Unmatched Discrepancy', kpi3Value: '₹ 18,500 (1 Txn)', kpi3Sub: 'Under Bank Enquiry', kpi3Icon: 'bi-exclamation-circle',
    kpi4Label: 'Total Reconciled YTD', kpi4Value: '₹ 5.42 Crores', kpi4Sub: 'Auditor Approved', kpi4Icon: 'bi-shield-check',
    columns: ['Batch Date', 'Gateway Provider', 'Gross Collections (₹)', 'Gateway Fee / MDR (₹)', 'Net Settled (₹)', 'Bank UTR Number', 'Recon Status'],
    rows: [
      ['27-Oct-2026', 'Razorpay', '₹ 4,12,000', '₹ 0 (UPI Zero Surcharge)', '₹ 4,12,000', 'HDFCR520261027991', '<span class="badge bg-success">Matched & Reconciled</span>'],
      ['26-Oct-2026', 'Razorpay', '₹ 3,84,000', '₹ 0 (UPI Zero Surcharge)', '₹ 3,84,000', 'HDFCR520261026410', '<span class="badge bg-success">Matched & Reconciled</span>'],
      ['25-Oct-2026', 'PayU Enterprise', '₹ 1,85,000', '₹ 120 (Netbanking Fee)', '₹ 1,84,880', 'HDFCP520261025118', '<span class="badge bg-success">Matched & Reconciled</span>']
    ]
  },
  {
    filename: 'fee-carry-forward.php',
    title: 'Fee Carry-forward',
    desc: 'Academic year-end balance migration engine moving unpaid balances and advance credits to the new session',
    icon: 'bi-arrow-right-circle-fill',
    actionBtnText: 'Execute Session Rollover',
    actionBtnIcon: 'bi-arrow-repeat',
    isToolPage: true,
    toolModalId: 'rolloverModal',
    kpi1Label: 'Rollover Status', kpi1Value: 'Migration Ready', kpi1Sub: 'Pre-flight checks passed', kpi1Icon: 'bi-arrow-repeat',
    kpi2Label: 'Prior Year Arrears', kpi2Value: '₹ 6.42 Lakhs', kpi2Sub: 'Carried into 2026-27', kpi2Icon: 'bi-cash-coin',
    kpi3Label: 'Advance Credits Rolled', kpi3Value: '₹ 8.10 Lakhs', kpi3Sub: 'Adjusted in Q1', kpi3Icon: 'bi-wallet',
    kpi4Label: 'Audit Lock', kpi4Value: 'Permanent Ledger', kpi4Sub: 'Cannot be altered', kpi4Icon: 'bi-lock-fill',
    columns: ['Migration Batch', 'From Session', 'To Session', 'Total Accounts Rolled', 'Total Arrears (₹)', 'Total Advance (₹)', 'Executed On', 'Status'],
    rows: [
      ['<span class="badge bg-dark">ROLL-2026-01</span>', '2025-2026', '<strong>2026-2027</strong>', '1,380 Accounts', '₹ 6,42,000', '₹ 8,10,000', '01-Apr-2026 00:05 AM', '<span class="badge bg-success">Executed & Locked</span>']
    ]
  },
  {
    filename: 'fee-reports.php',
    title: 'Comprehensive Fee Reports',
    desc: 'Comprehensive accounting dossiers, auditor certification ledgers, class collection rankings, and CSV/PDF tools',
    icon: 'bi-file-earmark-bar-graph-fill',
    isReportPage: true,
    kpi1Label: 'Audited Statements', kpi1Value: '24 Formats', kpi1Sub: 'C.A. & DFRC Approved', kpi1Icon: 'bi-file-earmark-check',
    kpi2Label: 'Annual Demand YTD', kpi2Value: '₹ 6.85 Crores', kpi2Sub: 'Total Enrollment Billed', kpi2Icon: 'bi-cash-stack',
    kpi3Label: 'Collected YTD', kpi3Value: '₹ 5.42 Crores', kpi3Sub: '79.1% Recovered', kpi3Icon: 'bi-currency-rupee',
    kpi4Label: 'Export Formats', kpi4Value: 'Excel / PDF / CSV', kpi4Sub: 'High Resolution', kpi4Icon: 'bi-file-earmark-spreadsheet',
    columns: ['Report Code', 'Report Description', 'Applicable Authority', 'Last Generated', 'Generated By', 'Format', 'Action'],
    rows: [
      ['<span class="badge bg-dark">FEE-REP-01</span>', '<strong>Class-wise Outstanding & Aging Analysis Roster</strong>', 'School Management Board', '28-Oct-2026', 'Finance Controller', 'PDF / Official Ledger', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-download me-1"></i>Download</button>'],
      ['<span class="badge bg-dark">FEE-REP-02</span>', '<strong>Annual Head-wise Demand vs Collection Reconciliation</strong>', 'Chartered Accountant Audit', '28-Oct-2026', 'Finance Controller', 'Excel Spreadsheet', '<button class="btn btn-xs btn-outline-success"><i class="bi bi-file-earmark-excel me-1"></i>Export</button>'],
      ['<span class="badge bg-dark">FEE-REP-03</span>', '<strong>Fee Concession & Scholarship Audit Roster (EWS/RTE/Staff)</strong>', 'State Fee Regulatory Comm', '26-Oct-2026', 'Principal Office', 'PDF Document', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-download me-1"></i>Download</button>'],
      ['<span class="badge bg-dark">FEE-REP-04</span>', '<strong>Bank Deposit Challan & Payment Gateway Settlement Register</strong>', 'Internal Accounts Audit', '27-Oct-2026', 'Cashier Counter 1', 'PDF Document', '<button class="btn btn-xs btn-outline-primary"><i class="bi bi-download me-1"></i>Download</button>']
    ]
  }
];

// Write all pages
console.log('Writing Fees Dashboard...');
fs.writeFileSync(path.join(FEES_DIR, 'dashboard.php'), generateFeesDashboard(), 'utf8');
console.log('[GENERATED] fees/dashboard.php');

for (const mod of submodules) {
  const filePath = path.join(FEES_DIR, mod.filename);
  const content = generateTablePage(mod);
  fs.writeFileSync(filePath, content, 'utf8');
  console.log(`[GENERATED] fees/${mod.filename} (${mod.title})`);
}

console.log(`\nSuccessfully generated ${submodules.length + 1} bespoke Fees & Collection Management submodules.`);

