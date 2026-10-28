/**
 * EDUSYS PRO - PHP PROTOTYPE GENERATOR WITH COMMON INCLUDE FILES
 * Generates all Dashboards (*.php) and Module Submodules (*.php) using common includes
 */

const fs = require('fs');
const path = require('path');

const ROOT_DIR = path.resolve(__dirname, '..');
const DASHBOARDS_DIR = path.join(ROOT_DIR, 'dashboards');
const MODULES_DIR = path.join(ROOT_DIR, 'modules');

if (!fs.existsSync(DASHBOARDS_DIR)) fs.mkdirSync(DASHBOARDS_DIR, { recursive: true });
if (!fs.existsSync(MODULES_DIR)) fs.mkdirSync(MODULES_DIR, { recursive: true });

// Load module definitions from generate_prototype.js
const { moduleDefinitions, dashboardRoles } = (() => {
  // Read definitions from existing script
  const content = fs.readFileSync(path.join(__dirname, 'generate_prototype.js'), 'utf8');
  
  // Extract moduleDefinitions array
  const modDefMatch = content.match(/const moduleDefinitions = (\[[\s\S]*?\]);\s*\/\/ Helper/);
  const dashMatch = content.match(/const dashboardRoles = (\[[\s\S]*?\]);\s*function generateDashboardContent/);

  return {
    moduleDefinitions: eval(modDefMatch[1]),
    dashboardRoles: eval(dashMatch[1])
  };
})();

// 1. Generate 10 Role Dashboards (*.php)
dashboardRoles.forEach(dash => {
  const phpFileName = dash.file.replace('.html', '.php');
  const filePath = path.join(DASHBOARDS_DIR, phpFileName);

  const phpContent = `<?php
/**
 * EDUSYS PRO - ${dash.title}
 */
$page_title = "${dash.title}";
$page_desc = "Unified executive dashboard tailored for ${dash.role}.";
$active_module = "dashboard";
$active_submodule = "${phpFileName}";
$depth = 1;

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/sidebar.php';
require_once __DIR__ . '/../includes/topbar.php';
?>

<!-- KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Total Students</h6>
        <div class="kpi-value">1,878</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> +142 this year</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Fee Collected YTD</h6>
        <div class="kpi-value">₹4.21 Cr</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 87% Recovery</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-currency-rupee"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Attendance Today</h6>
        <div class="kpi-value">95.4%</div>
        <div class="kpi-trend positive"><i class="bi bi-person-check"></i> 1,792 Present</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Staff on Duty</h6>
        <div class="kpi-value">118 / 122</div>
        <div class="kpi-trend positive"><i class="bi bi-person-workspace"></i> 4 on Leave</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-briefcase-fill"></i></div>
    </div>
  </div>
</div>

<!-- Analytics Charts Row -->
<div class="row g-4 mb-4">
  <div class="col-lg-8">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-bar-chart-line text-primary"></i> Fee Collection vs Operational Expenses (2024-2025)</h5>
        <span class="badge bg-light text-muted border font-size-12">Monthly (₹ Lakhs)</span>
      </div>
      <div class="erp-card-body" style="height: 320px;">
        <canvas id="revenueCollectionChart"></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-pie-chart text-success"></i> CBSE Grade Distribution</h5>
        <span class="badge bg-light text-muted border font-size-12">Class 10 Term 1</span>
      </div>
      <div class="erp-card-body d-flex align-items-center justify-content-center" style="height: 320px;">
        <canvas id="performanceDonutChart"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="row g-4 mb-4">
  <div class="col-lg-6">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-activity text-info"></i> Weekly Attendance Percentage Trend</h5>
        <span class="badge bg-success-subtle text-success">Avg: 95.1%</span>
      </div>
      <div class="erp-card-body" style="height: 280px;">
        <canvas id="attendanceTrendChart"></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-bar-chart text-warning"></i> Student Strength by Class Wings (Boys vs Girls)</h5>
        <span class="badge bg-light text-muted border font-size-12">Total: 1,878</span>
      </div>
      <div class="erp-card-body" style="height: 280px;">
        <canvas id="classStrengthChart"></canvas>
      </div>
    </div>
  </div>
</div>

<!-- Quick Shortcuts & Recent Actions -->
<div class="row g-4">
  <div class="col-lg-8">
    <div class="erp-card mb-0">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-clock-history text-primary"></i> Recent Transactions & Fee Collections</h5>
        <a href="<?php echo base_url('modules/fees/fee-collection.php'); ?>" class="fw-semibold font-size-13 text-primary text-decoration-none">Open Fee Counter &rarr;</a>
      </div>
      <div class="erp-table-responsive">
        <table class="erp-table">
          <thead>
            <tr>
              <th>Receipt #</th>
              <th>Student Name</th>
              <th>Class</th>
              <th>Mode</th>
              <th>Amount</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="font-mono text-primary fw-bold">REC-2024-9182</td>
              <td><strong>Aarav Sharma</strong></td>
              <td>Class 10-A</td>
              <td><span class="badge bg-light text-muted border">Razorpay Online</span></td>
              <td class="fw-bold">₹28,500</td>
              <td><span class="badge-status badge-paid">Success</span></td>
            </tr>
            <tr>
              <td class="font-mono text-primary fw-bold">REC-2024-9181</td>
              <td><strong>Diya Patel</strong></td>
              <td>Class 10-A</td>
              <td><span class="badge bg-light text-muted border">Net Banking</span></td>
              <td class="fw-bold">₹28,500</td>
              <td><span class="badge-status badge-paid">Success</span></td>
            </tr>
            <tr>
              <td class="font-mono text-primary fw-bold">REC-2024-9180</td>
              <td><strong>Meera Reddy</strong></td>
              <td>Class 8-A</td>
              <td><span class="badge bg-light text-muted border">UPI (Google Pay)</span></td>
              <td class="fw-bold">₹24,200</td>
              <td><span class="badge-status badge-paid">Success</span></td>
            </tr>
            <tr>
              <td class="font-mono text-primary fw-bold">REC-2024-9179</td>
              <td><strong>Vihaan Singh</strong></td>
              <td>Class 10-B</td>
              <td><span class="badge bg-light text-muted border">HDFC Cheque</span></td>
              <td class="fw-bold">₹15,000</td>
              <td><span class="badge-status badge-partial">Partial</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="erp-card mb-0">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-bell-fill text-warning"></i> Operational Notice Board</h5>
        <a href="<?php echo base_url('modules/communication/notice-board.php'); ?>" class="fw-semibold font-size-13 text-primary text-decoration-none">View All &rarr;</a>
      </div>
      <div class="erp-card-body p-0">
        <div class="list-group list-group-flush font-size-13">
          <div class="list-group-item p-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <span class="badge bg-danger-subtle text-danger font-size-11">Urgent CBSE</span>
              <small class="text-muted">Today</small>
            </div>
            <strong class="d-block mb-1">CBSE LOC Verification Deadline</strong>
            <p class="text-muted font-size-12 mb-0">Class 10 & 12 LOC candidate lists must be finalized by 5:00 PM.</p>
          </div>

          <div class="list-group-item p-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <span class="badge bg-success-subtle text-success font-size-11">Transport</span>
              <small class="text-muted">Yesterday</small>
            </div>
            <strong class="d-block mb-1">Route 4 Bus Route Shift</strong>
            <p class="text-muted font-size-12 mb-0">Bus 04 morning pickup adjusted by 10 mins due to flyover construction.</p>
          </div>

          <div class="list-group-item p-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <span class="badge bg-info-subtle text-info font-size-11">Academic</span>
              <small class="text-muted">25 Oct</small>
            </div>
            <strong class="d-block mb-1">PTM Scheduling Open</strong>
            <p class="text-muted font-size-12 mb-0">Quarter 2 Parent-Teacher consultations slots active for booking.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    if (window.EduCharts) {
      EduCharts.revenueChart('revenueCollectionChart');
      EduCharts.performanceChart('performanceDonutChart');
      EduCharts.attendanceChart('attendanceTrendChart');
      EduCharts.classStrengthChart('classStrengthChart');
    }
  });
</script>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>`;

  fs.writeFileSync(filePath, phpContent, 'utf8');
});

console.log('Generated 10 Role Dashboards in PHP (*.php).');

// 2. Generate All 28 Modules and their Submodules (*.php)
let totalPhpModules = 0;

moduleDefinitions.forEach(mod => {
  const modDir = path.join(MODULES_DIR, mod.key);
  if (!fs.existsSync(modDir)) fs.mkdirSync(modDir, { recursive: true });

  mod.submodules.forEach(sub => {
    const phpFileName = sub.file.replace('.html', '.php');
    const filePath = path.join(modDir, phpFileName);

    // Read the HTML content previously generated to extract the unique table/KPI body
    const htmlFilePath = path.join(ROOT_DIR, 'prototype', 'modules', mod.key, sub.file);
    let mainContentHtml = '';

    if (fs.existsSync(htmlFilePath)) {
      const originalHtml = fs.readFileSync(htmlFilePath, 'utf8');
      const startTag = '<div class="row g-3 mb-4">';
      const endTag = '</main>';
      const startIdx = originalHtml.indexOf(startTag);
      const endIdx = originalHtml.lastIndexOf(endTag);

      if (startIdx !== -1 && endIdx !== -1) {
        mainContentHtml = originalHtml.slice(startIdx, endIdx);
      }
    }

    // Convert internal links from .html to .php in the extracted content if any
    mainContentHtml = mainContentHtml.replace(/\.html/g, '.php');

    const phpContent = `<?php
/**
 * EDUSYS PRO - ${sub.title}
 */
$page_title = "${sub.title}";
$page_desc = "${sub.desc}";
$active_module = "${mod.key}";
$active_submodule = "${phpFileName}";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', '${phpFileName.replace('.php', '')}_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Add New Record
    </button>
  </div>
</div>

${mainContentHtml}

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>`;

    fs.writeFileSync(filePath, phpContent, 'utf8');
    totalPhpModules++;
  });
});

console.log(`Generated ${totalPhpModules} PHP module submodules across 28 modules using common files.`);
