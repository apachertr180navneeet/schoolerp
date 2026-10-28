/**
 * EDUSYS PRO - COMPLETE ATTENDANCE MANAGEMENT GENERATOR
 * Generates all 20 submodules with domain-specific UI, realistic Indian CBSE data,
 * domain KPIs, specialized filters, and custom tables.
 */

const fs = require('fs');
const path = require('path');

const ATTENDANCE_DIR = path.resolve(__dirname, '../prototype/modules/attendance');

// Common helper to wrap table pages
function generateTablePage(d) {
  const isReport = d.isReportPage === true;
  
  const headerActionHtml = isReport ? `
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', '${d.filename.replace('.php', '')}_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" onclick="EduTables.print()">
      <i class="bi bi-file-earmark-pdf me-1"></i> Print / Save PDF
    </button>` : `
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', '${d.filename.replace('.php', '')}_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi ${d.actionBtnIcon || 'bi-plus-lg'} me-1"></i> ${d.actionBtnText || 'Add New Record'}
    </button>`;

  const rowActionHtml = isReport ? `
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Summary"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.exportCSV('#mainDataTable', '${d.filename.replace('.php', '')}_download.csv')" title="Download Report"><i class="bi bi-download"></i></button>
          </div>` : `
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, '${d.title.replace(/'/g, "\\'")}')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>`;

  return `<?php
/**
 * EDUSYS PRO - ${d.title.toUpperCase()}
 * Dedicated operational interface & records management for ${d.title}
 */
$page_title = "${d.title}";
$page_desc = "${d.desc}";
$active_module = "attendance";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/attendance/dashboard.php'); ?>">Attendance Management</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi ${d.icon} text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">${headerActionHtml}
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card ${d.kpi1.color}">
      <div class="kpi-info">
        <h6>${d.kpi1.title}</h6>
        <div class="kpi-value">${d.kpi1.val}</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> ${d.kpi1.trend}</div>
      </div>
      <div class="kpi-icon"><i class="bi ${d.kpi1.icon}"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card ${d.kpi2.color}">
      <div class="kpi-info">
        <h6>${d.kpi2.title}</h6>
        <div class="kpi-value">${d.kpi2.val}</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> ${d.kpi2.trend}</div>
      </div>
      <div class="kpi-icon"><i class="bi ${d.kpi2.icon}"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card ${d.kpi3.color}">
      <div class="kpi-info">
        <h6>${d.kpi3.title}</h6>
        <div class="kpi-value">${d.kpi3.val}</div>
        <div class="kpi-trend neutral"><i class="bi bi-clock-history"></i> ${d.kpi3.trend}</div>
      </div>
      <div class="kpi-icon"><i class="bi ${d.kpi3.icon}"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card ${d.kpi4.color}">
      <div class="kpi-info">
        <h6>${d.kpi4.title}</h6>
        <div class="kpi-value">${d.kpi4.val}</div>
        <div class="kpi-trend positive"><i class="bi bi-shield-check"></i> ${d.kpi4.trend}</div>
      </div>
      <div class="kpi-icon"><i class="bi ${d.kpi4.icon}"></i></div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="${d.filterPlaceholder}">
    </div>
    <select class="form-select" style="max-width: 220px;">
      ${d.filterOptions.map((opt, i) => '<option ' + (i === 0 ? 'selected' : '') + '>' + opt + '</option>').join('\n      ')}
    </select>
    <select class="form-select" style="max-width: 170px;">
      ${d.statusFilterOptions.map((opt, i) => '<option ' + (i === 0 ? 'selected' : '') + '>' + opt + '</option>').join('\n      ')}
    </select>
  </div>
  <div class="table-filter-right">
    <span class="font-size-13 text-muted">Showing <strong class="table-visible-count text-primary">${d.rows.length}</strong> verified records</span>
  </div>
</div>

<!-- Domain Data Table -->
<div class="erp-table-responsive mb-0">
  <table class="erp-table" id="mainDataTable">
    <thead>
      <tr>
        ${d.headers.map(h => '<th>' + h + '</th>').join('\n        ')}
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      ${d.rows.map(r => `
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">${r.c1}</td>
        <td>
          <div class="fw-semibold text-dark">${r.c2}</div>
          <small class="text-muted font-size-11">${r.sub || ''}</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">${r.c3}</span></td>
        <td><small class="text-dark">${r.c4}</small></td>
        <td><small class="text-muted font-mono font-size-12">${r.c5}</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">${r.c6}</span></td>
        <td><small class="text-muted">${r.c7 || ''}</small></td>
        <td><span class="badge-status ${r.badge}">${r.status}</span></td>
        <td class="text-center">${rowActionHtml}
        </td>
      </tr>
      `).join('')}
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
`;
}

// -------------------------------------------------------------
// SUBMODULES SPECIFICATIONS FOR ATTENDANCE MANAGEMENT
// -------------------------------------------------------------
const submodules = [
  // 1. daily-attendance.php
  {
    filename: 'daily-attendance.php',
    title: 'Student Daily Attendance',
    icon: 'bi-calendar-check',
    actionBtnText: 'Mark Attendance Grid',
    actionBtnIcon: 'bi-check2-all',
    desc: 'Section-wise daily homeroom attendance roll, biometric gate tap reconciliation, and SMS alert dispatch',
    kpi1: { title: "Present Today", val: "2,732 Students", trend: "96.2% Attendance Rate", icon: "bi-person-check-fill", color: "kpi-success" },
    kpi2: { title: "Absent Today", val: "108 Absent", trend: "100% Parent SMS Sent", icon: "bi-person-x-fill", color: "kpi-danger" },
    kpi3: { title: "Late Arrivals", val: "24 Scholars", trend: "Gate Tap After 07:45 AM", icon: "bi-stopwatch-fill", color: "kpi-warning" },
    kpi4: { title: "On Approved Leave", val: "14 Scholars", trend: "Medical & Casual Leaves", icon: "bi-envelope-paper-fill", color: "kpi-info" },
    filterPlaceholder: "Search student, admission #, roll #, class, status...",
    filterOptions: ["All Sections", "Class 10 - Section A", "Class 10 - Section B", "Class 12 - Science (PCM)", "Class 12 - Science (PCB)", "Class 8 - Section C", "Class 5 - Section A"],
    statusFilterOptions: ["All Status", "Present (P)", "Absent (A)", "Late Entry (L)", "Half-Day (HD)"],
    headers: ["Admission #", "Student Full Name", "Grade & Section", "Roll #", "Attendance Status", "Time In (RFID Tap)", "Time Out", "Parent SMS Status"],
    rows: [
      { c1: "ADM-2024-001", c2: "Aarav Sharma", sub: "Agni House", c3: "Class 10 - Section A", c4: "Roll #01", c5: "07:32 AM (Gate 1)", c6: "Pending Dispersal", c7: "Delivered (P)", badge: "badge-active", status: "Present" },
      { c1: "ADM-2024-002", c2: "Diya Patel", sub: "Prithvi House", c3: "Class 10 - Section A", c4: "Roll #02", c5: "07:34 AM (Gate 1)", c6: "Pending Dispersal", c7: "Delivered (P)", badge: "badge-active", status: "Present" },
      { c1: "ADM-2024-003", c2: "Vihaan Singh", sub: "Akash House", c3: "Class 10 - Section B", c4: "Roll #01", c5: "07:38 AM (Gate 2)", c6: "Pending Dispersal", c7: "Delivered (P)", badge: "badge-active", status: "Present" },
      { c1: "ADM-2024-004", c2: "Ananya Iyer", sub: "Vayu House", c3: "Class 10 - Section B", c4: "Roll #02", c5: "07:40 AM (Gate 2)", c6: "Pending Dispersal", c7: "Delivered (P)", badge: "badge-active", status: "Present" },
      { c1: "ADM-2024-005", c2: "Rohan Gupta", sub: "Agni House", c3: "Class 12 - Science (PCM)", c4: "Roll #05", c5: "07:28 AM (Gate 1)", c6: "Pending Dispersal", c7: "Delivered (P)", badge: "badge-active", status: "Present" },
      { c1: "ADM-2024-006", c2: "Ishaan Verma", sub: "Vayu House", c3: "Class 12 - Science (PCB)", c4: "Roll #08", c5: "07:52 AM (Gate 1 - Late)", c6: "Pending Dispersal", c7: "Late SMS Sent", badge: "badge-pending", status: "Late Entry" },
      { c1: "ADM-2024-007", c2: "Karan Saxena", sub: "Prithvi House", c3: "Class 9 - Section C", c4: "Roll #24", c5: "No Tap Recorded", c6: "--", c7: "Absent Alert SMS Sent", badge: "badge-inactive", status: "Absent" },
      { c1: "ADM-2024-008", c2: "Meera Nambiar", sub: "Akash House", c3: "Class 8 - Section C", c4: "Roll #14", c5: "07:30 AM (Gate 2)", c6: "Pending Dispersal", c7: "Delivered (P)", badge: "badge-active", status: "Present" }
    ]
  },

  // 2. class-attendance.php
  {
    filename: 'class-attendance.php',
    title: 'Class-wise Attendance',
    icon: 'bi-grid-3x3-gap-fill',
    actionBtnText: 'Submit Section Attendance',
    actionBtnIcon: 'bi-check2-circle',
    desc: 'Section-level summary matrix, teacher homeroom sign-offs, and daily percentage scorecards',
    kpi1: { title: "Sections Marked", val: "72 of 72 Done", trend: "100% Homerooms Filed", icon: "bi-check2-all", color: "kpi-success" },
    kpi2: { title: "Highest Section", val: "Class 10-A (100%)", trend: "All 40 Students Present", icon: "bi-trophy-fill", color: "kpi-primary" },
    kpi3: { title: "Average Class Attendance", val: "96.2%", trend: "Above 95% Target", icon: "bi-speedometer2", color: "kpi-info" },
    kpi4: { title: "Lowest Section", val: "Class 11-PCM (91.4%)", trend: "3 Absent on Sick Leave", icon: "bi-exclamation-circle-fill", color: "kpi-warning" },
    filterPlaceholder: "Search class, section, teacher, attendance %...",
    filterOptions: ["All Wings", "Secondary Wing (Classes 9-10)", "Senior Secondary (Classes 11-12)", "Middle Wing (Classes 6-8)", "Primary Wing (Classes 1-5)", "Pre-Primary (Nursery-Prep)"],
    statusFilterOptions: ["All Status", "Submitted on Time", "Pending Submission", "Delayed Roster"],
    headers: ["Class & Section", "Class Teacher", "Total Strength", "Present Today", "Absent Count", "On Leave", "Attendance %", "Status"],
    rows: [
      { c1: "Class 10 - Section A", c2: "Mrs. Sunita Kaul (PGT)", sub: "Room 204", c3: "40 Students", c4: "40 Present", c5: "0 Absent", c6: "0 on Leave", c7: "100.0% (Perfect)", badge: "badge-active", status: "Submitted" },
      { c1: "Class 10 - Section B", c2: "Mr. Vikram Rathore (PGT)", sub: "Room 205", c3: "38 Students", c4: "37 Present", c5: "1 Absent", c6: "0 on Leave", c7: "97.4%", badge: "badge-active", status: "Submitted" },
      { c1: "Class 12 - Science (PCM)", c2: "Dr. K. L. Sharma (PGT)", sub: "Room 301", c3: "35 Students", c4: "32 Present", c5: "2 Absent", c6: "1 on Leave", c7: "91.4%", badge: "badge-active", status: "Submitted" },
      { c1: "Class 12 - Science (PCB)", c2: "Mrs. Radhika Iyer (PGT)", sub: "Room 302", c3: "32 Students", c4: "31 Present", c5: "0 Absent", c6: "1 on Leave", c7: "96.9%", badge: "badge-active", status: "Submitted" },
      { c1: "Class 12 - Commerce", c2: "Mr. M. K. Chawla (PGT)", sub: "Room 304", c3: "36 Students", c4: "35 Present", c5: "1 Absent", c6: "0 on Leave", c7: "97.2%", badge: "badge-active", status: "Submitted" },
      { c1: "Class 8 - Section C", c2: "Mr. Deepak Rawat (PGT)", sub: "Room 108", c3: "39 Students", c4: "38 Present", c5: "1 Absent", c6: "0 on Leave", c7: "97.4%", badge: "badge-active", status: "Submitted" },
      { c1: "Class 5 - Section A", c2: "Mrs. Shalini Verma (PRT)", sub: "Room 012", c3: "40 Students", c4: "39 Present", c5: "0 Absent", c6: "1 on Leave", c7: "97.5%", badge: "badge-active", status: "Submitted" },
      { c1: "Class 1 - Nursery A", c2: "Mrs. Pooja Hegde (PRT)", sub: "KG Suite 1", c3: "28 Students", c4: "27 Present", c5: "1 Absent", c6: "0 on Leave", c7: "96.4%", badge: "badge-active", status: "Submitted" }
    ]
  },

  // 3. period-attendance.php
  {
    filename: 'period-attendance.php',
    title: 'Period-wise Attendance',
    icon: 'bi-clock-history',
    actionBtnText: 'Log Period Roster',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'Classroom subject period presence checks, bunking detection, and laboratory headcount logs',
    kpi1: { title: "Periods Tracked", val: "576 Periods", trend: "8 Periods / 72 Sections", icon: "bi-stopwatch", color: "kpi-primary" },
    kpi2: { title: "Bunking Detected", val: "0 Discrepancies", trend: "100% Class Compliance", icon: "bi-shield-check", color: "kpi-success" },
    kpi3: { title: "Lab Headcounts", val: "100% Reconciled", trend: "Physics & Chemistry Labs", icon: "bi-tools", color: "kpi-info" },
    kpi4: { title: "Teacher Submissions", val: "560 of 576 Logged", trend: "Live App Roll Entry", icon: "bi-check2-circle", color: "kpi-warning" },
    filterPlaceholder: "Search period, class, subject, teacher, status...",
    filterOptions: ["All Periods", "Period 1 (07:45 - 08:30)", "Period 2 (08:30 - 09:15)", "Period 3 (09:30 - 10:15)", "Period 4 (10:15 - 11:00)", "Period 5 to 8 (Afternoon)"],
    statusFilterOptions: ["All Status", "Headcount Verified", "Class Bunk Alert", "Teacher Leave Covered"],
    headers: ["Period # & Slot", "Grade & Section", "Subject", "Teaching Faculty", "Expected Count", "Present in Class", "Bunk / Absent Alert", "Status"],
    rows: [
      { c1: "Period 1 (07:45 AM)", c2: "Class 10 - Section A", sub: "Room 204", c3: "Mathematics (041)", c4: "Mrs. Sunita Kaul (PGT)", c5: "40 Students", c6: "40 Present", c7: "Zero Discrepancy", badge: "badge-active", status: "Verified" },
      { c1: "Period 1 (07:45 AM)", c2: "Class 12 - Science (PCM)", sub: "Room 301", c3: "Physics (042)", c4: "Dr. K. L. Sharma (PGT)", c5: "32 Students", c6: "32 Present", c7: "Zero Discrepancy", badge: "badge-active", status: "Verified" },
      { c1: "Period 2 (08:30 AM)", c2: "Class 10 - Section A", sub: "Room 204", c3: "English (184)", c4: "Mr. Deepak Rawat (PGT)", c5: "40 Students", c6: "40 Present", c7: "Zero Discrepancy", badge: "badge-active", status: "Verified" },
      { c1: "Period 2 (08:30 AM)", c2: "Class 12 - Science (PCB)", sub: "Room 302", c3: "Physics (042)", c4: "Dr. K. L. Sharma (PGT)", c5: "31 Students", c6: "31 Present", c7: "Zero Discrepancy", badge: "badge-active", status: "Verified" },
      { c1: "Period 3 (09:30 AM)", c2: "Class 10 - Section A", sub: "Physics Lab 1", c3: "Physics Lab Practical", c4: "Dr. K. L. Sharma (PGT)", c5: "40 Students", c6: "40 Present", c7: "Lab Roll Verified", badge: "badge-active", status: "Verified" },
      { c1: "Period 4 (10:15 AM)", c2: "Class 12 - Science (PCM)", sub: "Chemistry Lab", c3: "Chemistry Lab Practical", c4: "Mr. Vikram Rathore (PGT)", c5: "32 Students", c6: "32 Present", c7: "Lab Roll Verified", badge: "badge-active", status: "Verified" },
      { c1: "Period 5 (11:35 AM)", c2: "Class 10 - Section A", sub: "Room 204", c3: "Social Science (087)", c4: "Mrs. Shalini Verma (TGT)", c5: "40 Students", c6: "40 Present", c7: "Zero Discrepancy", badge: "badge-active", status: "Verified" },
      { c1: "Period 6 (12:15 PM)", c2: "Class 12 - Commerce", sub: "Room 304", c3: "Accountancy (055)", c4: "Mr. M. K. Chawla (PGT)", c5: "35 Students", c6: "35 Present", c7: "Zero Discrepancy", badge: "badge-active", status: "Verified" }
    ]
  },

  // 4. teacher-attendance.php
  {
    filename: 'teacher-attendance.php',
    title: 'Teacher Attendance',
    icon: 'bi-person-badge-fill',
    actionBtnText: 'Mark Faculty Attendance',
    actionBtnIcon: 'bi-person-check',
    desc: 'Teaching faculty biometric punch logs, morning arrival timestamps, half-day leaves, and duty rosters',
    kpi1: { title: "Faculty Present", val: "108 Teachers", trend: "96.4% Attendance Today", icon: "bi-person-check-fill", color: "kpi-success" },
    kpi2: { title: "On Casual / Sick Leave", val: "4 Faculty", trend: "Substitutions Assigned", icon: "bi-person-x-fill", color: "kpi-warning" },
    kpi3: { title: "Average Arrival Time", val: "07:18 AM", trend: "12 Mins Before Assembly", icon: "bi-clock", color: "kpi-primary" },
    kpi4: { title: "Biometric Punch In", val: "100% Synced", trend: "Facial / Fingerprint Terminal", icon: "bi-fingerprint", color: "kpi-info" },
    filterPlaceholder: "Search teacher name, emp ID, department, status...",
    filterOptions: ["All Departments", "Science Department (PCM/B)", "Mathematics Department", "Commerce & Economics", "Humanities & Social", "Languages Department"],
    statusFilterOptions: ["All Status", "Present (Biometric)", "On Approved Leave", "Late Arrival", "Half-Day"],
    headers: ["Emp ID", "Faculty Full Name", "Department", "Designation", "Punch In Time", "Punch Out Time", "Daily Status", "Status"],
    rows: [
      { c1: "EMP-FAC-001", c2: "Dr. K. L. Sharma", sub: "PGT Physics", c3: "Science Department", c4: "PGT Senior Teacher", c5: "07:14 AM (Bio Terminal 1)", c6: "Pending Dispersal", c7: "Present & On Duty", badge: "badge-active", status: "Present" },
      { c1: "EMP-FAC-002", c2: "Mrs. Sunita Kaul", sub: "PGT Maths", c3: "Mathematics", c4: "PGT Senior Teacher", c5: "07:18 AM (Bio Terminal 1)", c6: "Pending Dispersal", c7: "Present & On Duty", badge: "badge-active", status: "Present" },
      { c1: "EMP-FAC-003", c2: "Mr. Vikram Rathore", sub: "PGT Chemistry", c3: "Science Department", c4: "PGT Teacher", c5: "07:12 AM (Bio Terminal 2)", c6: "Pending Dispersal", c7: "Present & On Duty", badge: "badge-active", status: "Present" },
      { c1: "EMP-FAC-004", c2: "Mrs. Radhika Iyer", sub: "PGT Biology", c3: "Science Department", c4: "PGT Teacher", c5: "07:20 AM (Bio Terminal 2)", c6: "Pending Dispersal", c7: "Present & On Duty", badge: "badge-active", status: "Present" },
      { c1: "EMP-FAC-005", c2: "Mr. Deepak Rawat", sub: "PGT English", c3: "Languages Department", c4: "PGT Teacher", c5: "07:15 AM (Bio Terminal 1)", c6: "Pending Dispersal", c7: "Present & On Duty", badge: "badge-active", status: "Present" },
      { c1: "EMP-FAC-006", c2: "Mrs. Shalini Verma", sub: "TGT Social", c3: "Social Science", c4: "TGT Teacher", c5: "07:22 AM (Bio Terminal 1)", c6: "Pending Dispersal", c7: "Present & On Duty", badge: "badge-active", status: "Present" },
      { c1: "EMP-FAC-007", c2: "Mrs. Meenakshi Soni", sub: "TGT Hindi", c3: "Languages Department", c4: "TGT Teacher", c5: "No Punch Recorded", c6: "--", c7: "Casual Leave (Covered)", badge: "badge-pending", status: "Casual Leave" },
      { c1: "EMP-FAC-008", c2: "Mr. Kunal Bansal", sub: "PGT CS", c3: "Computer Science", c4: "PGT Teacher", c5: "No Punch Recorded", c6: "--", c7: "Medical Leave (Covered)", badge: "badge-pending", status: "Medical Leave" }
    ]
  },

  // 5. staff-attendance.php
  {
    filename: 'staff-attendance.php',
    title: 'Staff Attendance',
    icon: 'bi-people-fill',
    actionBtnText: 'Log Staff Punch',
    actionBtnIcon: 'bi-fingerprint',
    desc: 'Administrative, transport, security, lab assistants, and facilities staff biometric punch tracking',
    kpi1: { title: "Staff Present", val: "34 of 34 Staff", trend: "100% Present Today", icon: "bi-person-check", color: "kpi-success" },
    kpi2: { title: "Security Shifts", val: "12 Guards", trend: "Day & Night Rota Active", icon: "bi-shield-check", color: "kpi-primary" },
    kpi3: { title: "Bus Drivers / Attendants", val: "18 Drivers", trend: "06:15 AM Shift Cleared", icon: "bi-bus-front-fill", color: "kpi-info" },
    kpi4: { title: "Overtime Logged", val: "6 Hours", trend: "Campus Maintenance Desk", icon: "bi-clock-history", color: "kpi-warning" },
    filterPlaceholder: "Search staff name, ID, role, department, status...",
    filterOptions: ["All Departments", "Administration & Accounts", "Transport (Drivers & Conductors)", "Security & Wardens", "Lab Assistants & Attendants", "Facilities & Housekeeping"],
    statusFilterOptions: ["All Status", "On Shift (Biometric)", "Off Duty", "Approved Leave"],
    headers: ["Staff ID", "Staff Full Name", "Role / Department", "Shift Timings", "Biometric Punch In", "Punch Out", "Overtime Hours", "Status"],
    rows: [
      { c1: "EMP-STF-001", c2: "Rohan Vashisht", sub: "Admin Dept", c3: "Head Registrar", c4: "07:15 AM - 03:45 PM", c5: "07:08 AM (Admin Desk)", c6: "Pending Exit", c7: "0.0 Hours", badge: "badge-active", status: "On Duty" },
      { c1: "EMP-STF-002", c2: "Suresh Chawla", sub: "Accounts Dept", c3: "Chief Cashier", c4: "07:30 AM - 04:00 PM", c5: "07:22 AM (Accounts Bio)", c6: "Pending Exit", c7: "0.0 Hours", badge: "badge-active", status: "On Duty" },
      { c1: "EMP-STF-003", c2: "Harish Chander", sub: "Transport Desk", c3: "Transport Supervisor", c4: "06:00 AM - 02:30 PM", c5: "05:50 AM (Garage Terminal)", c6: "Pending Exit", c7: "1.0 Hour (Early)", badge: "badge-active", status: "On Duty" },
      { c1: "EMP-STF-004", c2: "Balwinder Singh", sub: "Transport Desk", c3: "Senior Bus Driver #01", c4: "06:15 AM - 02:45 PM", c5: "06:05 AM (Garage Terminal)", c6: "Pending Exit", c7: "0.5 Hours", badge: "badge-active", status: "On Duty" },
      { c1: "EMP-STF-005", c2: "Ram Prasad Verma", sub: "Science Labs", c3: "Senior Lab Technician", c4: "07:15 AM - 03:45 PM", c5: "07:10 AM (Lab Terminal)", c6: "Pending Exit", c7: "0.0 Hours", badge: "badge-active", status: "On Duty" },
      { c1: "EMP-STF-006", c2: "Subhash Yadav", sub: "Security Dept", c3: "Chief Security Officer", c4: "06:00 AM - 06:00 PM", c5: "05:55 AM (Main Gate Bio)", c6: "Pending Exit", c7: "12h Shift Active", badge: "badge-active", status: "On Duty" },
      { c1: "EMP-STF-007", c2: "Mrs. Kavita Joshi", sub: "Front Office", c3: "Front Desk Receptionist", c4: "07:15 AM - 03:45 PM", c5: "07:12 AM (Reception Bio)", c6: "Pending Exit", c7: "0.0 Hours", badge: "badge-active", status: "On Duty" },
      { c1: "EMP-STF-008", c2: "Anil Kumar", sub: "Housekeeping", c3: "Facilities Supervisor", c4: "06:30 AM - 03:00 PM", c5: "06:25 AM (Service Bio)", c6: "Pending Exit", c7: "0.0 Hours", badge: "badge-active", status: "On Duty" }
    ]
  },

  // 6. late-entry.php
  {
    filename: 'late-entry.php',
    title: 'Late Entry Register',
    icon: 'bi-stopwatch-fill',
    actionBtnText: 'Log Late Arrival',
    actionBtnIcon: 'bi-stopwatch',
    desc: 'Gate security timestamps for arrivals past 07:45 AM, transport delay logs, and parent intimations',
    kpi1: { title: "Late Arrivals Today", val: "24 Students", trend: "0.84% of Total Enrollment", icon: "bi-stopwatch", color: "kpi-warning" },
    kpi2: { title: "Bus Delay Verified", val: "18 Students", trend: "Route #12 Traffic Congestion", icon: "bi-bus-front", color: "kpi-info" },
    kpi3: { title: "Private Transport", val: "6 Students", trend: "Late Slip Issued at Gate", icon: "bi-person-exclamation", color: "kpi-danger" },
    kpi4: { title: "Parent SMS Sent", val: "100% Intimated", trend: "Delivered Within 5 Mins", icon: "bi-bell-fill", color: "kpi-success" },
    filterPlaceholder: "Search late slip #, student name, class, gate officer...",
    filterOptions: ["All Gate Locations", "Main Gate 1 (Pedestrian)", "Main Gate 2 (Bus Bay)", "Sports Complex Gate"],
    statusFilterOptions: ["All Status", "Excused (School Bus Delay)", "Unexcused (Parent Commute)", "Warning Slip Issued"],
    headers: ["Gate Pass #", "Student / Staff Name", "Class / Department", "Arrival Time (Gate Tap)", "Grace Period Exceeded", "Reason for Delay", "Gate Security Officer", "Status"],
    rows: [
      { c1: "LTE-2024-0024", c2: "Ishaan Verma", sub: "Adm #006", c3: "Class 12 - Science (PCB)", c4: "07:52 AM", c5: "7 Mins Late", c6: "Dwarka Underpass Traffic Jam", c7: "Officer Subhash Yadav", badge: "badge-pending", status: "Unexcused" },
      { c1: "LTE-2024-0023", c2: "Rohan Gupta", sub: "Adm #005", c3: "Class 12 - Science (PCM)", c4: "07:48 AM", c5: "3 Mins Late", c6: "Private Car Commute Delay", c7: "Officer Subhash Yadav", badge: "badge-pending", status: "Unexcused" },
      { c1: "LTE-2024-0022", c2: "Aarav Singhania", sub: "Adm #1048", c3: "Class 1 - Nursery", c4: "07:55 AM", c5: "10 Mins Late", c6: "School Bus #12 Route Delay", c7: "Officer Harish Chander", badge: "badge-active", status: "Excused (Bus)" },
      { c1: "LTE-2024-0021", c2: "Devansh Bhardwaj", sub: "Adm #1046", c3: "Class 11 - PCM", c4: "07:55 AM", c5: "10 Mins Late", c6: "School Bus #12 Route Delay", c7: "Officer Harish Chander", badge: "badge-active", status: "Excused (Bus)" },
      { c1: "LTE-2024-0020", c2: "Ananya Deshpande", sub: "Adm #1045", c3: "Class 9 - Section B", c4: "07:55 AM", c5: "10 Mins Late", c6: "School Bus #12 Route Delay", c7: "Officer Harish Chander", badge: "badge-active", status: "Excused (Bus)" },
      { c1: "LTE-2024-0019", c2: "Tanvi Choudhary", sub: "Adm #1044", c3: "Class 11 - Commerce", c4: "07:50 AM", c5: "5 Mins Late", c6: "Metro Signal Delay (Palam)", c7: "Officer Subhash Yadav", badge: "badge-pending", status: "Unexcused" },
      { c1: "LTE-2024-0018", c2: "Ishaan Mukherjee", sub: "Adm #1043", c3: "Class 4 - Primary", c4: "07:55 AM", c5: "10 Mins Late", c6: "School Bus #12 Route Delay", c7: "Officer Harish Chander", badge: "badge-active", status: "Excused (Bus)" },
      { c1: "LTE-2024-0017", c2: "Riyaan Kapoor", sub: "Adm #1042", c3: "Class 1 - Prep", c4: "07:55 AM", c5: "10 Mins Late", c6: "School Bus #12 Route Delay", c7: "Officer Harish Chander", badge: "badge-active", status: "Excused (Bus)" }
    ]
  },

  // 7. early-leave.php
  {
    filename: 'early-leave.php',
    title: 'Early Leave Register',
    icon: 'bi-box-arrow-left',
    actionBtnText: 'Issue Early Exit Slip',
    actionBtnIcon: 'bi-box-arrow-right',
    desc: 'Escorted early departures, infirmary doctor clearances, parent identity verification, and gate pass dispatch',
    kpi1: { title: "Early Exits Today", val: "6 Students", trend: "Authorized Parental Escort", icon: "bi-person-dash-fill", color: "kpi-warning" },
    kpi2: { title: "Infirmary Clearances", val: "4 Cases", trend: "High Fever / Sprain Handled", icon: "bi-hospital-fill", color: "kpi-danger" },
    kpi3: { title: "Parent ID Verified", val: "100% Biometric", trend: "RFID / Photo ID Match", icon: "bi-shield-lock-fill", color: "kpi-success" },
    kpi4: { title: "Coordinator Sanction", val: "100% Signed", trend: "Principal Office Intimated", icon: "bi-pencil-square", color: "kpi-info" },
    filterPlaceholder: "Search exit slip #, student name, class, escort...",
    filterOptions: ["All Exit Reasons", "Infirmary Medical Recommendation", "Urgent Family Emergency", "Inter-School Sports Deputation", "Documented Doctor Appointment"],
    statusFilterOptions: ["All Status", "Exit Cleared & Logged", "In Infirmary Awaiting Parent", "Dispatched"],
    headers: ["Gate Exit Pass #", "Student Full Name", "Grade & Section", "Escort / Parent Name", "Relationship & ID Verified", "Exit Reason (Medical/Family)", "Authorized By", "Status"],
    rows: [
      { c1: "EXP-2024-0006", c2: "Prisha Nair", sub: "Adm #014", c3: "Class 11 - Commerce", c4: "Gopalan Nair", c5: "Father (Aadhaar Verified)", c6: "High Fever & Nausea (Infirmary Slip)", c7: "Dr. Sunita Kapoor & Vice Principal", badge: "badge-active", status: "Exit Cleared" },
      { c1: "EXP-2024-0005", c2: "Arya Deshmukh", sub: "Adm #015", c3: "Class 9 - Section A", c4: "Sunil Deshmukh", c5: "Father (Aadhaar Verified)", c6: "Sprained Ankle during P.Ed Class", c7: "Infirmary Sister & Class Teacher", badge: "badge-active", status: "Exit Cleared" },
      { c1: "EXP-2024-0004", c2: "Kabir Mehta", sub: "Adm #007", c3: "Class 3 - Primary", c4: "Rakesh Mehta", c5: "Father (Aadhaar Verified)", c6: "Severe Stomach Cramps", c7: "Primary Wing Head", badge: "badge-active", status: "Exit Cleared" },
      { c1: "EXP-2024-0003", c2: "Vihaan Singh", sub: "Adm #003", c3: "Class 10 - Section B", c4: "Col. D. S. Pratap", c5: "School Sports Coach Escort", c6: "CBSE Zonal Athletics Meet Deputation", c7: "Sports HOD & Principal", badge: "badge-active", status: "Exit Cleared" },
      { c1: "EXP-2024-0002", c2: "Zara Khan", sub: "Adm #018", c3: "Class 11 - Humanities", c4: "Tariq Khan", c5: "Father (Aadhaar Verified)", c6: "Pre-Scheduled Dental Surgery", c7: "Senior Secondary Coordinator", badge: "badge-active", status: "Exit Cleared" },
      { c1: "EXP-2024-0001", c2: "Ayaan Sen", sub: "Adm #019", c3: "Class 1 - Prep", c4: "Debashis Sen", c5: "Father (Aadhaar Verified)", c6: "Mild Allergic Reaction (Observation)", c7: "Infirmary Doctor", badge: "badge-active", status: "Exit Cleared" },
      { c1: "EXP-2024-0000", c2: "Meera Nambiar", sub: "Adm #007", c3: "Class 8 - Section C", c4: "Radhika Nambiar", c5: "Mother (Aadhaar Verified)", c6: "Passport Office Document Appointment", c7: "Middle Wing Head", badge: "badge-active", status: "Exit Cleared" },
      { c1: "EXP-2023-0142", c2: "Tushar Sengupta", sub: "Adm #1412", c3: "Class 8 - Section B", c4: "Subhash Sengupta", c5: "Father (Aadhaar Verified)", c6: "Family Overseas Visa Interview", c7: "Principal Office", badge: "badge-active", status: "Archived" }
    ]
  },

  // 8. student-leaves.php
  {
    filename: 'student-leaves.php',
    title: 'Student Leave Applications',
    icon: 'bi-envelope-paper-fill',
    actionBtnText: 'Submit Leave Request',
    actionBtnIcon: 'bi-envelope-plus',
    desc: 'Formal parental leave submissions, medical certificates, long leave tracking, and class teacher approvals',
    kpi1: { title: "Active Applications", val: "14 Students", trend: "Medical & Family Sabbatical", icon: "bi-envelope-open-fill", color: "kpi-primary" },
    kpi2: { title: "Medical Certificates", val: "11 Validated", trend: "Doctor Prescriptions Filed", icon: "bi-file-medical-fill", color: "kpi-success" },
    kpi3: { title: "Average Duration", val: "3.4 Days", trend: "Excused Absence Status", icon: "bi-calendar2-range", color: "kpi-info" },
    kpi4: { title: "Pending Sanction", val: "3 Requests", trend: "Class Teacher Review", icon: "bi-hourglass-split", color: "kpi-warning" },
    filterPlaceholder: "Search app ref #, student name, class, category...",
    filterOptions: ["All Categories", "Medical Leave (Doctor Slip)", "Planned Family Sabbatical", "Religious / Festival Observance", "Bereavement / Compassionate"],
    statusFilterOptions: ["All Status", "Approved & Excused", "Pending Teacher Sign", "Rejected"],
    headers: ["App Ref #", "Student Full Name", "Grade & Section", "Leave Category", "From Date", "To Date", "Days Count", "Status"],
    rows: [
      { c1: "LEV-STU-0014", c2: "Karan Saxena", sub: "Adm #2491", c3: "Class 9 - Section C", c4: "Medical Leave (Viral Fever)", c5: "26 Oct 2024", c6: "30 Oct 2024", c7: "5 Days (Cert Attached)", badge: "badge-active", status: "Approved" },
      { c1: "LEV-STU-0013", c2: "Siddharth Rawat", sub: "Adm #9481", c3: "Class 11 - Commerce", c4: "Family Wedding Out of Station", c5: "28 Oct 2024", c6: "31 Oct 2024", c7: "4 Days (Parent Slip)", badge: "badge-active", status: "Approved" },
      { c1: "LEV-STU-0012", c2: "Ananya Saxena", sub: "Adm #4921", c3: "Class 7 - Middle", c4: "Medical Leave (Dental Procedure)", c5: "29 Oct 2024", c6: "30 Oct 2024", c7: "2 Days (Cert Attached)", badge: "badge-pending", status: "Pending Review" },
      { c1: "LEV-STU-0011", c2: "Varun Dhawan", sub: "Adm #3920", c3: "Class 12 - Commerce", c4: "National Tennis Tour Deputation", c5: "24 Oct 2024", c6: "02 Nov 2024", c7: "10 Days (Sports Letter)", badge: "badge-active", status: "Approved" },
      { c1: "LEV-STU-0010", c2: "Shraddha Kapoor", sub: "Adm #1940", c3: "Class 5 - Primary", c4: "Medical Leave (Flu & Cold)", c5: "27 Oct 2024", c6: "29 Oct 2024", c7: "3 Days (Pediatrician Slip)", badge: "badge-active", status: "Approved" },
      { c1: "LEV-STU-0009", c2: "Aditya Roy Kapur", sub: "Adm #9482", c3: "Class 9 - Secondary", c4: "Family Religious Pilgrimage", c5: "28 Oct 2024", c6: "01 Nov 2024", c7: "5 Days (Parent Letter)", badge: "badge-pending", status: "Pending Review" },
      { c1: "LEV-STU-0008", c2: "Kriti Sanon", sub: "Adm #1049", c3: "Class 11 - Science", c4: "Medical Leave (Migraine)", c5: "28 Oct 2024", c6: "28 Oct 2024", c7: "1 Day (Parent Intimation)", badge: "badge-active", status: "Approved" },
      { c1: "LEV-STU-0007", c2: "Pooja Hegde", sub: "Adm #1048", c3: "Class 8 - Middle", c4: "Family Relocation Transit", c5: "25 Oct 2024", c6: "27 Oct 2024", badge: "badge-active", c7: "3 Days (Parent Letter)", status: "Approved" }
    ]
  },

  // 9. staff-leaves.php
  {
    filename: 'staff-leaves.php',
    title: 'Staff Leave Applications',
    icon: 'bi-calendar2-minus-fill',
    actionBtnText: 'Apply Staff Leave',
    actionBtnIcon: 'bi-calendar-plus',
    desc: 'Faculty Casual Leave (CL), Earned Leave (EL), Medical Leave (ML), and automated relief substitution linkages',
    kpi1: { title: "Active Staff Leaves", val: "4 Teachers on Leave", trend: "Substitutions Covered", icon: "bi-person-x", color: "kpi-warning" },
    kpi2: { title: "Leave Balance Registry", val: "100% Updated", trend: "CL, EL, ML Portals Synced", icon: "bi-wallet2", color: "kpi-success" },
    kpi3: { title: "Relief Faculty", val: "100% Confirmed", trend: "Zero Period Disruption", icon: "bi-shield-check", color: "kpi-info" },
    kpi4: { title: "Approval Workflow", val: "HR & Principal", trend: "Automated Hierarchy", icon: "bi-diagram-3-fill", color: "kpi-primary" },
    filterPlaceholder: "Search staff leave ref #, teacher, department, type...",
    filterOptions: ["All Leave Categories", "Casual Leave (CL)", "Medical Leave (ML)", "Earned Leave (EL)", "On Official Duty (OD)", "Maternity / Paternity Leave"],
    statusFilterOptions: ["All Status", "Sanctioned & Relief Set", "Pending Principal Sanction", "Rejected"],
    headers: ["Leave Ref #", "Staff Full Name", "Department & Role", "Leave Type (CL/ML/EL)", "Start Date", "End Date", "Substitute Teacher Assigned", "Status"],
    rows: [
      { c1: "LEV-STF-001", c2: "Mrs. Meenakshi Soni", sub: "Emp #FAC-007", c3: "Languages Department", c4: "Casual Leave (CL)", c5: "Today (28 Oct)", c6: "Today (28 Oct)", c7: "Mr. Deepak Rawat & Mrs. Shalini", badge: "badge-active", status: "Sanctioned" },
      { c1: "LEV-STF-002", c2: "Mr. Kunal Bansal", sub: "Emp #FAC-008", c3: "Computer Science", c4: "Medical Leave (ML)", c5: "Today (28 Oct)", c6: "Tomorrow (29 Oct)", c7: "Dr. K. L. Sharma & Mrs. Sunita", badge: "badge-active", status: "Sanctioned" },
      { c1: "LEV-STF-003", c2: "Mr. Harish Chawla", sub: "Emp #FAC-014", c3: "Sports & Physical Ed", c4: "On Official Duty (OD)", c5: "Today (28 Oct)", c6: "30 Oct 2024", c7: "Mr. S. K. Rastogi (Indoor)", badge: "badge-active", status: "Sanctioned" },
      { c1: "LEV-STF-004", c2: "Ms. Kavita Joshi", sub: "Emp #STF-007", c3: "Front Office Reception", c4: "Casual Leave (Half-Day)", c5: "Today (12:00 PM)", c6: "Today (03:45 PM)", c7: "Mrs. Ritu Sharma (Relief)", badge: "badge-active", status: "Sanctioned" },
      { c1: "LEV-STF-005", c2: "Mrs. Radhika Iyer", sub: "Emp #FAC-004", c3: "Science (Biology)", c4: "Earned Leave (EL)", c5: "04 Nov 2024", c6: "08 Nov 2024", c7: "Dr. Sunita Kapoor (Pending Plan)", badge: "badge-pending", status: "Pending Principal" },
      { c1: "LEV-STF-006", c2: "Mr. S. K. Rastogi", sub: "Emp #FAC-010", c3: "Mathematics", c4: "Casual Leave (CL)", c5: "01 Nov 2024", c6: "02 Nov 2024", c7: "Mrs. Sunita Kaul (Relief Plan)", badge: "badge-active", status: "Sanctioned" },
      { c1: "LEV-STF-007", c2: "Mrs. Anjali Saxena", sub: "Emp #HR-001", c3: "Human Resources", c4: "On Official Duty (OD)", c5: "29 Oct 2024", c6: "29 Oct 2024", c7: "Rohan Vashisht (Registrar)", badge: "badge-active", status: "Sanctioned" },
      { c1: "LEV-STF-008", c2: "Mr. M. K. Chawla", sub: "Emp #FAC-009", c3: "Commerce", c4: "Casual Leave (CL)", c5: "05 Nov 2024", c6: "05 Nov 2024", c7: "Mr. S. K. Rastogi (Relief)", badge: "badge-pending", status: "Pending Principal" }
    ]
  },

  // 10. leave-approval.php
  {
    filename: 'leave-approval.php',
    title: 'Leave Approval Workflow',
    icon: 'bi-check2-circle',
    actionBtnText: 'Batch Sanction Leaves',
    actionBtnIcon: 'bi-check2-all',
    desc: 'Multi-tiered authorization pipeline: HOD endorsement, HR quota verification, and Principal final sign-off',
    kpi1: { title: "Requests Pending", val: "7 Applications", trend: "Faculty & Student Queue", icon: "bi-hourglass-split", color: "kpi-warning" },
    kpi2: { title: "Sanctioned Today", val: "14 Approved", trend: "100% Substitutions Verified", icon: "bi-patch-check-fill", color: "kpi-success" },
    kpi3: { title: "Quota Balance Audited", val: "100% Checked", trend: "CL, ML, EL Entitlements", icon: "bi-wallet2", color: "kpi-primary" },
    kpi4: { title: "Turnaround Speed", val: "Under 2 Hours", trend: "Push Notification Alert", icon: "bi-lightning-charge-fill", color: "kpi-info" },
    filterPlaceholder: "Search request ID, applicant, category, authority...",
    filterOptions: ["All Request Queues", "Teaching Faculty Requests", "Administrative Staff Leaves", "Senior Student Medical Leaves", "Extended Absence (>3 Days)"],
    statusFilterOptions: ["All Decisions", "Sanctioned & Active", "Under HOD Endorsement", "Awaiting Medical Proof", "Declined"],
    headers: ["Request ID", "Applicant Name & Role", "Category", "Duration", "Reason / Justification", "Substitute / Relief Covered", "Sanctioning Authority", "Status"],
    rows: [
      { c1: "REQ-LEV-0148", c2: "Mrs. Meenakshi Soni (TGT Hindi)", sub: "Emp #FAC-007", c3: "Casual Leave (CL)", c4: "1 Day (Today)", c5: "Personal Family Matter", c6: "Relief Assigned (Deepak & Shalini)", c7: "Dr. Ananya Roy (Principal)", badge: "badge-active", status: "Sanctioned" },
      { c1: "REQ-LEV-0147", c2: "Mr. Kunal Bansal (PGT CS)", sub: "Emp #FAC-008", c3: "Medical Leave (ML)", c4: "2 Days (28-29 Oct)", c5: "Viral Fever & Doctor Advised Rest", c6: "Relief Assigned (Dr. Sharma & Kaul)", c7: "Dr. Ananya Roy (Principal)", badge: "badge-active", status: "Sanctioned" },
      { c1: "REQ-LEV-0146", c2: "Mrs. Radhika Iyer (PGT Bio)", sub: "Emp #FAC-004", c3: "Earned Leave (EL)", c4: "5 Days (04-08 Nov)", c5: "Family Overseas Travel", c6: "Relief Schedule Under Verification", c7: "Vice Principal Desk", badge: "badge-pending", status: "In Verification" },
      { c1: "REQ-LEV-0145", c2: "Mr. M. K. Chawla (PGT Comm)", sub: "Emp #FAC-009", c3: "Casual Leave (CL)", c4: "1 Day (05 Nov)", c5: "Bank / Tax Audit Presence", c6: "Relief Schedule Verified", c7: "Vice Principal Desk", badge: "badge-pending", status: "In Verification" },
      { c1: "REQ-LEV-0144", c2: "Karan Saxena (Student)", sub: "Adm #2491 (Class 9-C)", c3: "Student Medical Leave", c4: "5 Days (26-30 Oct)", c5: "Viral Infection & Recovery", c6: "Infirmary Doctor Cleared", c7: "Class Teacher Approved", badge: "badge-active", status: "Sanctioned" },
      { c1: "REQ-LEV-0143", c2: "Ananya Saxena (Student)", sub: "Adm #4921 (Class 7)", c3: "Student Medical Leave", c4: "2 Days (29-30 Oct)", c5: "Dental Oral Surgery", c6: "Medical Prescription Uploaded", c7: "Class Teacher Review", badge: "badge-pending", status: "In Verification" },
      { c1: "REQ-LEV-0142", c2: "Varun Dhawan (Student)", sub: "Adm #3920 (Class 12)", c3: "Sports Duty Exemption", c4: "10 Days (24 Oct-02 Nov)", c5: "National Tennis Tour Tournament", c6: "Sports HOD Endorsement", c7: "Dr. Ananya Roy (Principal)", badge: "badge-active", status: "Sanctioned" },
      { c1: "REQ-LEV-0141", c2: "Aditya Roy Kapur (Student)", sub: "Adm #9482 (Class 9)", c3: "Family Pilgrimage", c4: "5 Days (28 Oct-01 Nov)", c5: "Religious Function in Tirupati", c6: "Leave Letter Signed by Parent", c7: "Secondary Wing Head", badge: "badge-pending", status: "In Verification" }
    ]
  },

  // 11. attendance-corrections.php
  {
    filename: 'attendance-corrections.php',
    title: 'Attendance Corrections',
    icon: 'bi-pencil-square',
    actionBtnText: 'Request Correction',
    actionBtnIcon: 'bi-pencil',
    desc: 'Audit reconciliation desk: Remedying missed biometric punches, bus delay rectifications, and infirmary adjustments',
    kpi1: { title: "Corrections Filed", val: "8 Requests", trend: "Current Academic Month", icon: "bi-pencil-square", color: "kpi-primary" },
    kpi2: { title: "Audited & Approved", val: "7 Approved", trend: "Evidence Verified by Admin", icon: "bi-check2-circle", color: "kpi-success" },
    kpi3: { title: "Bus Delay Cleared", val: "100% Rectified", trend: "Marked Present instead of Late", icon: "bi-bus-front-fill", color: "kpi-info" },
    kpi4: { title: "Audit Trail Integrity", val: "100% Immutable", trend: "Original vs Corrected Logged", icon: "bi-shield-lock-fill", color: "kpi-warning" },
    filterPlaceholder: "Search correction ref #, student, staff, reason...",
    filterOptions: ["All Correction Types", "Bus Route #12 Traffic Delay", "Missed RFID Tap at Gate", "Infirmary Slip Medical Adjustment", "Sports / Competition Duty Present"],
    statusFilterOptions: ["All Status", "Corrected & Reconciled", "Under Admin Audit", "Rejected"],
    headers: ["Correction Req #", "Student / Staff Name", "Class / Dept", "Date of Record", "Original Status", "Requested Correction", "Reason & Evidence", "Status"],
    rows: [
      { c1: "COR-2024-008", c2: "Aarav Singhania (Student)", sub: "Adm #1048", c3: "Class 1 - Nursery", c4: "28 Oct 2024", c5: "Late Entry (07:55 AM)", c6: "Mark Present (Excused)", c7: "School Bus #12 Traffic Breakdown Verified", badge: "badge-active", status: "Corrected" },
      { c1: "COR-2024-007", c2: "Devansh Bhardwaj (Student)", sub: "Adm #1046", c3: "Class 11 - PCM", c4: "28 Oct 2024", c5: "Late Entry (07:55 AM)", c6: "Mark Present (Excused)", c7: "School Bus #12 Traffic Breakdown Verified", badge: "badge-active", status: "Corrected" },
      { c1: "COR-2024-006", c2: "Ananya Deshpande (Student)", sub: "Adm #1045", c3: "Class 9 - Section B", c4: "28 Oct 2024", c5: "Late Entry (07:55 AM)", c6: "Mark Present (Excused)", c7: "School Bus #12 Traffic Breakdown Verified", badge: "badge-active", status: "Corrected" },
      { c1: "COR-2024-005", c2: "Ishaan Mukherjee (Student)", sub: "Adm #1043", c3: "Class 4 - Primary", c4: "28 Oct 2024", c5: "Late Entry (07:55 AM)", c6: "Mark Present (Excused)", c7: "School Bus #12 Traffic Breakdown Verified", badge: "badge-active", status: "Corrected" },
      { c1: "COR-2024-004", c2: "Riyaan Kapoor (Student)", sub: "Adm #1042", c3: "Class 1 - Prep", c4: "28 Oct 2024", c5: "Late Entry (07:55 AM)", c6: "Mark Present (Excused)", c7: "School Bus #12 Traffic Breakdown Verified", badge: "badge-active", status: "Corrected" },
      { c1: "COR-2024-003", c2: "Dr. K. L. Sharma (Faculty)", sub: "Emp #FAC-001", c3: "Science (Physics)", c4: "25 Oct 2024", c5: "Missed Evening Punch Out", c6: "Mark Present Full Day", c7: "CCTV Footages Confirmed 03:45 PM Exit", badge: "badge-active", status: "Corrected" },
      { c1: "COR-2024-002", c2: "Prisha Nair (Student)", sub: "Adm #014", c3: "Class 11 - Commerce", c4: "24 Oct 2024", c5: "Absent (Period 4)", c6: "Mark Present (Infirmary)", c7: "Infirmary Log #INF-491 Verified", badge: "badge-active", status: "Corrected" },
      { c1: "COR-2024-001", c2: "Vihaan Singh (Student)", sub: "Adm #003", c3: "Class 10 - Section B", c4: "22 Oct 2024", c5: "Absent Full Day", c6: "Mark Present on OD", c7: "Zonal Athletics Meet Participation Cert", badge: "badge-active", status: "Corrected" }
    ]
  },

  // 12. monthly-register.php
  {
    filename: 'monthly-register.php',
    title: 'Monthly Attendance Register',
    icon: 'bi-calendar3',
    actionBtnText: 'Export Monthly Register',
    actionBtnIcon: 'bi-file-earmark-spreadsheet-fill',
    desc: 'CBSE statutory monthly attendance ledger: Total working days, days present, sanctioned leaves, and percentages',
    kpi1: { title: "Register Month", val: "October 2024", trend: "Working Days: 22 Days", icon: "bi-calendar-month-fill", color: "kpi-primary" },
    kpi2: { title: "School Average %", val: "96.4% in October", trend: "+0.8% Month on Month", icon: "bi-graph-up-arrow", color: "kpi-success" },
    kpi3: { title: "100% Attendance", val: "1,420 Scholars", trend: "Eligible for Star Badge", icon: "bi-star-fill", color: "kpi-info" },
    kpi4: { title: "Chronic Absentee", val: "6 Students (<70%)", trend: "Parent Intimations Dispatched", icon: "bi-exclamation-octagon-fill", color: "kpi-warning" },
    filterPlaceholder: "Search student, admission #, roll #, class, %...",
    filterOptions: ["All Classes", "Class 10 - Section A", "Class 10 - Section B", "Class 12 - Science (PCM)", "Class 12 - Science (PCB)", "Class 8 - Section C", "Class 5 - Section A"],
    statusFilterOptions: ["All Status", "Eligible (>75%)", "Exemplary (95-100%)", "Board Warning (<75%)"],
    headers: ["Roll #", "Student Full Name", "Grade & Section", "Total Working Days", "Days Present", "Days Absent", "Approved Leaves", "Monthly %"],
    rows: [
      { c1: "Roll #01", c2: "Aarav Sharma", sub: "Adm #001", c3: "Class 10 - Section A", c4: "22 Working Days", c5: "22 Days Present", c6: "0 Days Absent", c7: "0 Days Leave", badge: "badge-active", status: "100.0% (Star)" },
      { c1: "Roll #02", c2: "Diya Patel", sub: "Adm #002", c3: "Class 10 - Section A", c4: "22 Working Days", c5: "22 Days Present", c6: "0 Days Absent", c7: "0 Days Leave", badge: "badge-active", status: "100.0% (Star)" },
      { c1: "Roll #01", c2: "Vihaan Singh", sub: "Adm #003", c3: "Class 10 - Section B", c4: "22 Working Days", c5: "21 Days Present", c6: "0 Days Absent", c7: "1 Day Sports OD", badge: "badge-active", status: "100.0% (Exemplary)" },
      { c1: "Roll #02", c2: "Ananya Iyer", sub: "Adm #004", c3: "Class 10 - Section B", c4: "22 Working Days", c5: "21 Days Present", c6: "1 Day Absent", c7: "0 Days Leave", badge: "badge-active", status: "95.4%" },
      { c1: "Roll #05", c2: "Rohan Gupta", sub: "Adm #005", c3: "Class 12 - Science (PCM)", c4: "22 Working Days", c5: "20 Days Present", c6: "1 Day Absent", c7: "1 Day Medical", badge: "badge-active", status: "95.4%" },
      { c1: "Roll #08", c2: "Ishaan Verma", sub: "Adm #006", c3: "Class 12 - Science (PCB)", c4: "22 Working Days", c5: "21 Days Present", c6: "1 Day Absent", c7: "0 Days Leave", badge: "badge-active", status: "95.4%" },
      { c1: "Roll #24", c2: "Karan Saxena", sub: "Adm #2491", c3: "Class 9 - Section C", c4: "22 Working Days", c5: "16 Days Present", c6: "1 Day Unexcused", c7: "5 Days Medical Leave", badge: "badge-pending", status: "72.7% (Risk)" },
      { c1: "Roll #14", c2: "Meera Nambiar", sub: "Adm #007", c3: "Class 8 - Section C", c4: "22 Working Days", c5: "22 Days Present", c6: "0 Days Absent", c7: "0 Days Leave", badge: "badge-active", status: "100.0% (Star)" }
    ]
  },

  // 13. absentee-list.php
  {
    filename: 'absentee-list.php',
    title: 'Absentee List & SMS Alert',
    icon: 'bi-bell-fill',
    actionBtnText: 'Send Bulk Absentee SMS',
    actionBtnIcon: 'bi-chat-dots-fill',
    desc: 'Unexcused absentee detection, automated parent SMS delivery gateways, and counselor follow-up calls',
    kpi1: { title: "Absentees Today", val: "108 Students", trend: "3.8% Overall Absences", icon: "bi-person-x-fill", color: "kpi-danger" },
    kpi2: { title: "Parent SMS Sent", val: "100% Delivered", trend: "Via DLT Approved Gateway", icon: "bi-phone-fill", color: "kpi-success" },
    kpi3: { title: "Parent Replies Received", val: "74 Responses", trend: "Sick / Out of Station Logged", icon: "bi-reply-fill", color: "kpi-info" },
    kpi4: { title: "Consecutive 3+ Days", val: "8 Scholars", trend: "Counselor Home Calls Scheduled", icon: "bi-telephone-outbound-fill", color: "kpi-warning" },
    filterPlaceholder: "Search absentee, student name, class, mobile...",
    filterOptions: ["All Absentee Classes", "Class 10 - Secondary", "Class 12 - Senior Secondary", "Class 9 - Secondary", "Middle Wing (Classes 6-8)", "Primary Wing (Classes 1-5)"],
    statusFilterOptions: ["All Status", "SMS Delivered (Unread)", "Parent Replied with Reason", "Counselor Call Due", "Consecutive Absentee"],
    headers: ["Alert ID", "Student Full Name", "Grade & Section", "Parent Contact Mobile", "Absent Since", "SMS Delivery Status", "Parent Response", "Status"],
    rows: [
      { c1: "ABS-2024-0108", c2: "Karan Saxena", sub: "Adm #2491", c3: "Class 9 - Section C", c4: "+91 98112 44556", c5: "3 Days (Consecutive)", c6: "Delivered (08:05 AM)", c7: "Parent Replied: Viral Infection", badge: "badge-active", status: "Reason Logged" },
      { c1: "ABS-2024-0107", c2: "Siddharth Rawat", sub: "Adm #9481", c3: "Class 11 - Commerce", c4: "+91 98223 55667", c5: "1 Day (Today)", c6: "Delivered (08:05 AM)", c7: "Parent Replied: Family Wedding", badge: "badge-active", status: "Reason Logged" },
      { c1: "ABS-2024-0106", c2: "Ananya Saxena", sub: "Adm #4921", c3: "Class 7 - Middle", c4: "+91 98334 66778", c5: "1 Day (Today)", c6: "Delivered (08:05 AM)", c7: "Awaiting Response", badge: "badge-pending", status: "Awaiting Reply" },
      { c1: "ABS-2024-0105", c2: "Gauri Shankar", sub: "Adm #1980", c3: "Class 5 - Primary", c4: "+91 98445 77889", c5: "2 Days", c6: "Delivered (08:05 AM)", c7: "Parent Replied: Stomach Ache", badge: "badge-active", status: "Reason Logged" },
      { c1: "ABS-2024-0104", c2: "Aditya Roy Kapur", sub: "Adm #9482", c3: "Class 9 - Secondary", c4: "+91 98556 88990", c5: "1 Day (Today)", c6: "Delivered (08:05 AM)", c7: "Parent Replied: Pilgrimage", badge: "badge-active", status: "Reason Logged" },
      { c1: "ABS-2024-0103", c2: "Kriti Sanon", sub: "Adm #1049", c3: "Class 11 - Science", c4: "+91 98667 99001", c5: "1 Day (Today)", c6: "Delivered (08:05 AM)", c7: "Parent Replied: Migraine Rest", badge: "badge-active", status: "Reason Logged" },
      { c1: "ABS-2024-0102", c2: "Aakash Verma", sub: "Adm #1920", c3: "Class 8 - Section B", c4: "+91 98778 11223", c5: "3 Days (Consecutive)", c6: "Delivered (08:05 AM)", c7: "No Response (Call Needed)", badge: "badge-inactive", status: "Call Counselor" },
      { c1: "ABS-2024-0101", c2: "Rohit Bansal", sub: "Adm #1842", c3: "Class 10 - Section B", c4: "+91 98889 22334", c5: "1 Day (Today)", c6: "Delivered (08:05 AM)", c7: "Awaiting Response", badge: "badge-pending", status: "Awaiting Reply" }
    ]
  },

  // 14. low-attendance-alerts.php
  {
    filename: 'low-attendance-alerts.php',
    title: 'Low Attendance Alerts (<75%)',
    icon: 'bi-exclamation-triangle-fill',
    actionBtnText: 'Issue Board Warning',
    actionBtnIcon: 'bi-envelope-exclamation-fill',
    desc: 'Statutory CBSE Bye-Law 14(i) board examination debarment alerts, shortfall calculation, and legal warning notices',
    kpi1: { title: "Students < 75%", val: "14 Scholars", trend: "0.49% of Total Enrollment", icon: "bi-exclamation-triangle-fill", color: "kpi-danger" },
    kpi2: { title: "Board Class Risk (10/12)", val: "6 Candidates", trend: "CBSE Roll Debarment Risk", icon: "bi-shield-slash-fill", color: "kpi-warning" },
    kpi3: { title: "Formal Notices Issued", val: "14 Registered Post", trend: "Parent Signed Acknowledgement", icon: "bi-envelope-check-fill", color: "kpi-primary" },
    kpi4: { title: "Days Needed to 75%", val: "Avg 12 Days", trend: "Mandatory Consecutive Attendance", icon: "bi-calendar-check", color: "kpi-info" },
    filterPlaceholder: "Search notice ref #, student name, class, percentage...",
    filterOptions: ["All Risk Cohorts", "Senior Secondary Board Risk (Class 12)", "Secondary Board Risk (Class 10)", "Middle Wing Risk (Classes 6-8)", "Primary Wing Risk (Classes 1-5)"],
    statusFilterOptions: ["All Status", "Legal Notice Dispatched", "Parent Meeting Completed", "Medical Condonation Filed"],
    headers: ["Notice Ref #", "Student Full Name", "Grade & Section", "Cumulative Attendance %", "Days Required to 75%", "CBSE Board Exam Risk", "Parent Warning Notice", "Status"],
    rows: [
      { c1: "WRN-CBSE-001", c2: "Karan Saxena", sub: "Adm #2491", c3: "Class 9 - Section C", c4: "68.4% (Shortfall)", c5: "14 Consecutive Days", c6: "Class 9 Annual Reg Risk", c7: "Notice Dispatched (20 Oct)", badge: "badge-inactive", status: "Notice Sent" },
      { c1: "WRN-CBSE-002", c2: "Aakash Verma", sub: "Adm #1920", c3: "Class 8 - Section B", c4: "71.2% (Shortfall)", c5: "8 Consecutive Days", c6: "Middle Promotion Risk", c7: "Notice Dispatched (22 Oct)", badge: "badge-inactive", status: "Notice Sent" },
      { c1: "WRN-CBSE-003", c2: "Varun Dhawan", sub: "Adm #3920", c3: "Class 12 - Commerce", c4: "72.4% (Shortfall)", c5: "6 Consecutive Days", c6: "Board Admit Card Risk", c7: "Sports Condonation Applied", badge: "badge-pending", status: "Exemption Pending" },
      { c1: "WRN-CBSE-004", c2: "Rohit Bansal", sub: "Adm #1842", c3: "Class 10 - Section B", c4: "73.0% (Shortfall)", c5: "5 Consecutive Days", c6: "Board Admit Card Risk", c7: "Notice Dispatched (25 Oct)", badge: "badge-inactive", status: "Notice Sent" },
      { c1: "WRN-CBSE-005", c2: "Pari Chawla", sub: "Adm #2491", c3: "Class 6 - Section A", c4: "73.8% (Shortfall)", c5: "3 Consecutive Days", c6: "Low Attendance Flag", c7: "Parent Meeting Held (26 Oct)", badge: "badge-active", status: "Counselled" },
      { c1: "WRN-CBSE-006", c2: "Devansh Bhardwaj", sub: "Adm #1046", c3: "Class 11 - PCM", c4: "74.1% (Near Cutoff)", c5: "2 Consecutive Days", c6: "Borderline Eligibility", c7: "SMS Warning Intimated", badge: "badge-pending", status: "Borderline" },
      { c1: "WRN-CBSE-007", c2: "Tanmay Bansal", sub: "Adm #2810", c3: "Class 9 - Section B", c4: "74.4% (Near Cutoff)", c5: "2 Consecutive Days", c6: "Borderline Eligibility", c7: "SMS Warning Intimated", badge: "badge-pending", status: "Borderline" },
      { c1: "WRN-CBSE-008", c2: "Gauri Joshi", sub: "Adm #1980", c3: "Class 7 - Section C", c4: "74.6% (Near Cutoff)", c5: "1 Consecutive Day", c6: "Borderline Eligibility", c7: "SMS Warning Intimated", badge: "badge-pending", status: "Borderline" }
    ]
  },

  // 15. attendance-percentage.php
  {
    filename: 'attendance-percentage.php',
    title: 'Attendance Percentage Calculator',
    icon: 'bi-calculator-fill',
    actionBtnText: 'Recalculate All',
    actionBtnIcon: 'bi-cpu-fill',
    desc: 'Dynamic formula engine: Aggregating Term 1 & Term 2 days, medical condonation adjustments, and board admit clearances',
    kpi1: { title: "Formula Standard", val: "CBSE Rule 14", trend: "Days Present / Total Working", icon: "bi-calculator", color: "kpi-primary" },
    kpi2: { title: "Eligible for Boards", val: "414 of 420 (98.6%)", trend: "Class 10 & 12 Confirmed", icon: "bi-check2-circle", color: "kpi-success" },
    kpi3: { title: "Condonation Allowed", val: "Max 15% Relief", trend: "Medical & Sports Authorized", icon: "bi-patch-check-fill", color: "kpi-info" },
    kpi4: { title: "Debarment Threshold", val: "Strictly <60%", trend: "Zero Tolerance Under Board", icon: "bi-slash-circle-fill", color: "kpi-danger" },
    filterPlaceholder: "Search student, admission #, class, percentage...",
    filterOptions: ["All Grades", "Class 10 - Secondary", "Class 12 - Senior Secondary", "Class 9 - Secondary", "Class 11 - Senior Secondary", "Classes 6-8 - Middle Wing"],
    statusFilterOptions: ["All Status", "Board Eligible (>=75%)", "Eligible with Medical Relief", "Debarred (<60%)"],
    headers: ["Scholar ID", "Student Full Name", "Class & Section", "Term 1 Attendance", "Term 2 Attendance", "Cumulative Total Days", "Final Percentage", "Status"],
    rows: [
      { c1: "ADM-2024-001", c2: "Aarav Sharma", sub: "Roll #01", c3: "Class 10 - Section A", c4: "96.4% (81/84)", c5: "96.4% (81/84)", c6: "162 of 168 Days", c7: "96.4%", badge: "badge-active", status: "Board Eligible" },
      { c1: "ADM-2024-002", c2: "Diya Patel", sub: "Roll #02", c3: "Class 10 - Section A", c4: "98.8% (83/84)", c5: "98.8% (83/84)", c6: "166 of 168 Days", c7: "98.8%", badge: "badge-active", status: "Board Eligible" },
      { c1: "ADM-2024-003", c2: "Vihaan Singh", sub: "Roll #01", c3: "Class 10 - Section B", c4: "94.0% (79/84)", c5: "95.2% (80/84)", c6: "159 of 168 Days", c7: "94.6%", badge: "badge-active", status: "Board Eligible" },
      { c1: "ADM-2024-004", c2: "Ananya Iyer", sub: "Roll #02", c3: "Class 10 - Section B", c4: "91.6% (77/84)", c5: "92.8% (78/84)", c6: "155 of 168 Days", c7: "92.2%", badge: "badge-active", status: "Board Eligible" },
      { c1: "ADM-2024-005", c2: "Rohan Gupta", sub: "Roll #05", c3: "Class 12 - Science (PCM)", c4: "85.7% (72/84)", c5: "88.0% (74/84)", c6: "146 of 168 Days", c7: "86.9%", badge: "badge-active", status: "Board Eligible" },
      { c1: "ADM-2024-006", c2: "Ishaan Verma", sub: "Roll #08", c3: "Class 12 - Science (PCB)", c4: "84.5% (71/84)", c5: "85.7% (72/84)", c6: "143 of 168 Days", c7: "85.1%", badge: "badge-active", status: "Board Eligible" },
      { c1: "ADM-2024-007", c2: "Varun Dhawan", sub: "Roll #14", c3: "Class 12 - Commerce", c4: "71.4% (60/84)", c5: "73.8% (62/84)", c6: "122 (+16 OD Days)", c7: "82.1% (Relief)", badge: "badge-active", status: "Board Eligible (Sports Relief)" },
      { c1: "ADM-2024-008", c2: "Karan Saxena", sub: "Roll #24", c3: "Class 9 - Section C", c4: "69.0% (58/84)", c5: "67.8% (57/84)", c6: "115 of 168 Days", c7: "68.4%", badge: "badge-inactive", status: "Risk (<75%)" }
    ]
  },

  // 16. biometric-integration.php
  {
    filename: 'biometric-integration.php',
    title: 'Biometric Device Integration',
    icon: 'bi-fingerprint',
    actionBtnText: 'Register Terminal',
    actionBtnIcon: 'bi-hdd-network-fill',
    desc: 'Hardware device management: ZKTeco and Matrix fingerprint & facial recognition terminals and real-time sync',
    kpi1: { title: "Terminals Online", val: "12 of 12 Devices", trend: "100% Hardware Connected", icon: "bi-hdd-network-fill", color: "kpi-success" },
    kpi2: { title: "Punches Today", val: "3,142 Punches", trend: "Face & Fingerprint Verified", icon: "bi-fingerprint", color: "kpi-primary" },
    kpi3: { title: "Sync Latency", val: "0.4 Seconds", trend: "Real-time Push SDK Active", icon: "bi-lightning-charge-fill", color: "kpi-info" },
    kpi4: { title: "Terminal Health", val: "100% Operational", trend: "Zero Offline Alerts", icon: "bi-shield-check", color: "kpi-warning" },
    filterPlaceholder: "Search terminal ID, device model, location, IP...",
    filterOptions: ["All Gate Locations", "Main Gate 1 & 2 Terminals", "Administrative Staff Block", "Faculty Staff Rooms", "Science Laboratories Hub", "Transport Garage Terminal"],
    statusFilterOptions: ["All Status", "Online & Synchronized", "Standby Mode", "Network Offline"],
    headers: ["Device ID", "Device Model & Brand", "Installation Location", "IP Address & Port", "Last Heartbeat Sync", "Punches Synced Today", "Device Health", "Status"],
    rows: [
      { c1: "BIO-TERM-01", c2: "ZKTeco ProFace X (Face + Finger)", sub: "Facial Recognition AI", c3: "Main Gate 1 (Staff Entrance)", c4: "192.168.1.101 : 4370", c5: "10 Secs Ago (Live)", c6: "412 Staff Punches", c7: "Healthy (CPU 12%)", badge: "badge-active", status: "Online" },
      { c1: "BIO-TERM-02", c2: "ZKTeco ProFace X (Face + Finger)", sub: "Facial Recognition AI", c3: "Main Gate 2 (Student Entrance)", c4: "192.168.1.102 : 4370", c5: "8 Secs Ago (Live)", c6: "1,248 Student Punches", c7: "Healthy (CPU 18%)", badge: "badge-active", status: "Online" },
      { c1: "BIO-TERM-03", c2: "ZKTeco ProFace X (Face + Finger)", sub: "Facial Recognition AI", c3: "Bus Bay Gate 3 (Bus Dispersal)", c4: "192.168.1.103 : 4370", c5: "12 Secs Ago (Live)", c6: "840 Student Punches", c7: "Healthy (CPU 14%)", badge: "badge-active", status: "Online" },
      { c1: "BIO-TERM-04", c2: "Matrix COSEC Vega (Fingerprint)", sub: "High-Speed Optical Sensor", c3: "Senior Staff Room (Block A)", c4: "192.168.1.104 : 8000", c5: "15 Secs Ago (Live)", c6: "108 Faculty Punches", c7: "Healthy (CPU 8%)", badge: "badge-active", status: "Online" },
      { c1: "BIO-TERM-05", c2: "Matrix COSEC Vega (Fingerprint)", sub: "High-Speed Optical Sensor", c3: "Middle Staff Room (Block C)", c4: "192.168.1.105 : 8000", c5: "20 Secs Ago (Live)", c6: "84 Faculty Punches", c7: "Healthy (CPU 6%)", badge: "badge-active", status: "Online" },
      { c1: "BIO-TERM-06", c2: "ZKTeco SilkBio-101TC", sub: "Hybrid Facial + Finger", c3: "Administrative Office Desk", c4: "192.168.1.106 : 4370", c5: "5 Secs Ago (Live)", c6: "142 Admin Punches", c7: "Healthy (CPU 10%)", badge: "badge-active", status: "Online" },
      { c1: "BIO-TERM-07", c2: "eSSL Biomax N-BM60", sub: "Rugged Garage Model", c3: "Transport Workshop Garage", c4: "192.168.1.107 : 5005", c5: "18 Secs Ago (Live)", c6: "36 Drivers / Staff", c7: "Healthy (CPU 5%)", badge: "badge-active", status: "Online" },
      { c1: "BIO-TERM-08", c2: "ZKTeco ProFace X (Face + Finger)", sub: "Facial Recognition AI", c3: "Sports Complex Gate", c4: "192.168.1.108 : 4370", c5: "14 Secs Ago (Live)", c6: "172 Coaches / Athletes", c7: "Healthy (CPU 9%)", badge: "badge-active", status: "Online" }
    ]
  },

  // 17. rfid-integration.php
  {
    filename: 'rfid-integration.php',
    title: 'RFID Smart Card Integration',
    icon: 'bi-broadcast-pin',
    actionBtnText: 'Configure RFID Gate',
    actionBtnIcon: 'bi-broadcast',
    desc: 'UHF long-range antenna gates, smart identity card tapping protocols, bus boarding sensors, and student safety logs',
    kpi1: { title: "RFID Antenna Gates", val: "8 Gate Readers", trend: "High-Speed UHF 865-868 MHz", icon: "bi-broadcast", color: "kpi-primary" },
    kpi2: { title: "Smart Taps Today", val: "5,680 Taps", trend: "Entry & Dispersal Logs", icon: "bi-credit-card-fill", color: "kpi-success" },
    kpi3: { title: "Bus Fleet Readers", val: "18 Buses Integrated", trend: "GPS + RFID Student Tap", icon: "bi-bus-front-fill", color: "kpi-info" },
    kpi4: { title: "Detection Accuracy", val: "99.9% Read Rate", trend: "Zero Card Clash", icon: "bi-patch-check-fill", color: "kpi-warning" },
    filterPlaceholder: "Search reader ID, gate, location, bus #...",
    filterOptions: ["All Gate Readers", "Pedestrian Gate 1 & 2 Antennas", "Bus Bay Long Range Readers", "School Bus Fleet Sensors (1-18)", "Library Circulation RFID Desk"],
    statusFilterOptions: ["All Status", "Active & Reading", "Low Signal Warning", "Offline"],
    headers: ["Gate Reader ID", "Gate Location", "Reader Protocol", "Taps Logged Today", "Average Read Speed", "Bus Fleet Sync", "Antenna Health", "Status"],
    rows: [
      { c1: "RFID-GATE-01", c2: "Main Gate 1 (Turnstiles)", sub: "Pedestrian Flap Barriers", c3: "UHF Long-Range (Wiegand 34)", c4: "1,420 Card Taps", c5: "45 Milliseconds", c6: "Synced to SIS Core", c7: "Signal RSSI -52dBm (Strong)", badge: "badge-active", status: "Active" },
      { c1: "RFID-GATE-02", c2: "Main Gate 2 (Turnstiles)", sub: "Pedestrian Flap Barriers", c3: "UHF Long-Range (Wiegand 34)", c4: "1,420 Card Taps", c5: "45 Milliseconds", c6: "Synced to SIS Core", c7: "Signal RSSI -50dBm (Strong)", badge: "badge-active", status: "Active" },
      { c1: "RFID-BUS-001", c2: "School Bus #01 (Dwarka Route)", sub: "Vehicle Reader GPS Sync", c3: "Mifare 13.56MHz + GPS Tracker", c4: "42 Boarding Taps", c5: "30 Milliseconds", c6: "Live 4G Telematics Synced", c7: "Antenna 100% OK", badge: "badge-active", status: "Active" },
      { c1: "RFID-BUS-002", c2: "School Bus #02 (Janakpuri Route)", sub: "Vehicle Reader GPS Sync", c3: "Mifare 13.56MHz + GPS Tracker", c4: "40 Boarding Taps", c5: "30 Milliseconds", c6: "Live 4G Telematics Synced", c7: "Antenna 100% OK", badge: "badge-active", status: "Active" },
      { c1: "RFID-BUS-003", c2: "School Bus #03 (Vasant Kunj)", sub: "Vehicle Reader GPS Sync", c3: "Mifare 13.56MHz + GPS Tracker", c4: "38 Boarding Taps", c5: "30 Milliseconds", c6: "Live 4G Telematics Synced", c7: "Antenna 100% OK", badge: "badge-active", status: "Active" },
      { c1: "RFID-LIB-01", c2: "Central Library Smart Circulation", sub: "Book & Student Card Tap", c3: "ISO 15693 High-Frequency", c4: "410 Book Issues / Returns", c5: "25 Milliseconds", c6: "Koha Library Sync", c7: "Antenna 100% OK", badge: "badge-active", status: "Active" },
      { c1: "RFID-GATE-03", c2: "Bus Dispersal Bay Turnstiles", sub: "Afternoon Exit Flow", c3: "UHF Long-Range (TCP/IP)", c4: "Pending Afternoon", c5: "40 Milliseconds", c6: "Synced to SIS Core", c7: "Signal RSSI -54dBm (Strong)", badge: "badge-active", status: "Active" },
      { c1: "RFID-SPORTS-01", c2: "Olympic Swimming Pool Turnstile", sub: "Access Control Badge", c3: "Mifare Contactless Tap", c4: "180 Athlete Taps", c5: "30 Milliseconds", c6: "Sports Desk Synced", c7: "Antenna 100% OK", badge: "badge-active", status: "Active" }
    ]
  },

  // 18. qr-attendance.php
  {
    filename: 'qr-attendance.php',
    title: 'QR Code Attendance',
    icon: 'bi-qr-code-scan',
    actionBtnText: 'Generate QR Token',
    actionBtnIcon: 'bi-qr-code',
    desc: 'Dynamic rotating QR code attendance: Mobile scanning for seminars, co-curricular events, and visitor verification',
    kpi1: { title: "QR Sessions Today", val: "8 Active Sessions", trend: "Assemblies & Co-Curricular", icon: "bi-qr-code", color: "kpi-primary" },
    kpi2: { title: "Mobile Scans", val: "1,240 Verified Scans", trend: "Real-time Mobile App", icon: "bi-phone-fill", color: "kpi-success" },
    kpi3: { title: "Dynamic Token TTL", val: "30 Seconds", trend: "Anti-Proxy Screenshot Safe", icon: "bi-shield-check", color: "kpi-info" },
    kpi4: { title: "Location Geofence", val: "50m Campus Radius", trend: "GPS Enforced Validation", icon: "bi-geo-alt-fill", color: "kpi-warning" },
    filterPlaceholder: "Search QR session, event, location, cohort...",
    filterOptions: ["All QR Events", "Morning Assembly Attendance", "Auditorium Seminar Check-In", "Inter-House Competition", "Faculty Professional Training", "PTM Parent Registration"],
    statusFilterOptions: ["All Status", "Active Scanning (Live)", "Session Expired", "Scheduled"],
    headers: ["QR Session Token", "Target Location / Event", "Grade / Faculty Cohort", "Valid From", "Valid To", "Total Scans Recorded", "Fraud Prevention", "Status"],
    rows: [
      { c1: "QR-SESS-9481", c2: "Morning Value Assembly Check-In", sub: "Central Amphitheater", c3: "Secondary Wing (Classes 9-10)", c4: "07:30 AM", c5: "07:45 AM", c6: "560 Scans Verified", c7: "Dynamic Geofence Verified", badge: "badge-active", status: "Session Complete" },
      { c1: "QR-SESS-9482", c2: "Atal Tinkering Workshop Seminar", sub: "Auditorium Hall B", c3: "Classes 11 & 12 (Science)", c4: "10:15 AM", c5: "11:00 AM", c6: "140 Scans Verified", c7: "Dynamic Geofence Verified", badge: "badge-active", status: "Live Scanning" },
      { c1: "QR-SESS-9483", c2: "Inter-House Debate Championship", sub: "Room 304 Multi-Media", c3: "Agni, Prithvi, Vayu, Akash Teams", c4: "11:35 AM", c5: "01:30 PM", c6: "48 Scans Recorded", c7: "Dynamic Geofence Verified", badge: "badge-active", status: "Live Scanning" },
      { c1: "QR-SESS-9484", c2: "Faculty Training: NEP Pedagogy", sub: "Conference Hall 1", c3: "All PGT & TGT Teachers", c4: "02:30 PM", c5: "04:00 PM", c6: "Scheduled for Afternoon", c7: "Token Rotates every 30s", badge: "badge-pending", status: "Scheduled" },
      { c1: "QR-SESS-9485", c2: "Parent-Teacher Meeting Check-In", sub: "Campus Registration Desk", c3: "Visiting Parents & Guardians", c4: "08:00 AM", c5: "01:00 PM", c6: "Scheduled for Saturday", c7: "Token Rotates every 30s", badge: "badge-pending", status: "Scheduled" },
      { c1: "QR-SESS-9486", c2: "Olympiad Trial Entrance Test", sub: "Science Lab Block", c3: "Selected 184 Candidates", c4: "08:00 AM", c5: "09:30 AM", c6: "184 Scans Verified", c7: "Dynamic Geofence Verified", badge: "badge-active", status: "Session Complete" },
      { c1: "QR-SESS-9487", c2: "Sports Coaching Morning Roll", sub: "Olympic Swimming Pool", c3: "School Swim Team", c4: "06:15 AM", c5: "07:15 AM", c6: "32 Scans Verified", c7: "Dynamic Geofence Verified", badge: "badge-active", status: "Session Complete" },
      { c1: "QR-SESS-9488", c2: "Library Book Reading Club", sub: "Central Library Audio Hall", c3: "Middle Wing Literary Society", c4: "12:55 PM", c5: "01:35 PM", c6: "Scheduled (Period 7)", c7: "Token Rotates every 30s", badge: "badge-pending", status: "Scheduled" }
    ]
  },

  // 19. attendance-reports.php
  {
    filename: 'attendance-reports.php',
    title: 'Attendance Reports',
    icon: 'bi-bar-chart-line-fill',
    isReportPage: true,
    desc: 'Statutory board attendance archives, government UDISE+ attendance reconciliations, and trend analytics',
    kpi1: { title: "Standard Reports", val: "16 Formats", trend: "CBSE & Education Directorate", icon: "bi-file-earmark-bar-graph-fill", color: "kpi-primary" },
    kpi2: { title: "Board LOC Audit", val: "100% Compliant", trend: "Bye-Law 14(i) Verification", icon: "bi-shield-check", color: "kpi-success" },
    kpi3: { title: "Monthly Reconciled", val: "100% Synced", trend: "Zero Pending Discrepancy", icon: "bi-check2-all", color: "kpi-info" },
    kpi4: { title: "Export Capabilities", val: "PDF & CSV", trend: "Instant Ledger Downloads", icon: "bi-download", color: "kpi-warning" },
    filterPlaceholder: "Search report code, title, scope, frequency...",
    filterOptions: ["All Reporting Categories", "CBSE Statutory Board Reports", "UDISE+ Government Reports", "Monthly Master Attendance Register", "Staff & Faculty Workload Reports", "Chronic Absenteeism Analytics"],
    statusFilterOptions: ["All Status", "Generated & Current", "Scheduled Monthly", "Annual Archive"],
    headers: ["Report Code", "Report Title & Description", "Reporting Scope", "Data Granularity", "Generated By", "Records Covered", "Last Generated", "Status"],
    rows: [
      { c1: "REP-ATT-001", c2: "CBSE Statutory Board Attendance Roll (LOC)", sub: "Eligibility manifest for Class 10 & 12", c3: "Board Classes 10 & 12", c4: "Student-wise %", c5: "Dean Academics", c6: "420 Candidates", c7: "Today (08:00 AM)", badge: "badge-active", status: "Live Synced" },
      { c1: "REP-ATT-002", c2: "UDISE+ Annual Attendance Statement", sub: "Ministry of Education National Portal", c3: "Entire School (1-12)", c4: "Wing & Gender", c5: "Registrar Office", c6: "2,840 Students", c7: "28 Oct 2024", badge: "badge-active", status: "Verified" },
      { c1: "REP-ATT-003", c2: "Monthly Master Attendance Ledger (Oct 2024)", sub: "Complete student and staff ledger", c3: "Whole Institution", c4: "Day-wise Roster", c5: "HR & Attendance Incharge", c6: "2,986 Individuals", c7: "28 Oct 2024", badge: "badge-active", status: "Reconciled" },
      { c1: "REP-ATT-004", c2: "Low Attendance Early Warning Statement (<75%)", sub: "Legal warning list with shortfall calculation", c3: "Classes 6 to 12", c4: "Risk Shortfall Days", c5: "Discipline Council", c6: "14 Students", c7: "27 Oct 2024", badge: "badge-active", status: "Generated" },
      { c1: "REP-ATT-005", c2: "Staff & Faculty Workload & Biometric Audit", sub: "Punches, late marks & leave reconciliation", c3: "All Employees (146)", c4: "Punch In/Out Times", c5: "Chief HR Officer", c6: "146 Staff", c7: "27 Oct 2024", badge: "badge-active", status: "Reconciled" },
      { c1: "REP-ATT-006", c2: "Transport Fleet & RFID Gate Sync Log", sub: "Vehicle boarding vs main gate cross-check", c3: "Bus Commuters (1,240)", c4: "GPS & Tap Logs", c5: "Transport Supervisor", c6: "18 Buses", c7: "26 Oct 2024", badge: "badge-active", status: "Verified" },
      { c1: "REP-ATT-007", c2: "Medical Leave & Infirmary Clearance Audit", sub: "Doctor certificates & condonation records", c3: "Infirmary Desk", c4: "Doctor Verified Leaves", c5: "School Pediatrician", c6: "38 Cases", c7: "25 Oct 2024", badge: "badge-active", status: "Verified" },
      { c1: "REP-ATT-008", c2: "Inter-School Sports & Activity OD Roster", sub: "Official Duty exemptions from regular classes", c3: "Athletics & Teams", c4: "Tournament Dates", c5: "Sports HOD", c6: "42 Athletes", c7: "24 Oct 2024", badge: "badge-active", status: "Generated" }
    ]
  }
];

// Generate each table submodule
let count = 0;
for (const d of submodules) {
  const filePath = path.join(ATTENDANCE_DIR, d.filename);
  const content = generateTablePage(d);
  fs.writeFileSync(filePath, content, 'utf8');
  count++;
  console.log(`[GENERATED] attendance/${d.filename} (${d.title})`);
}

// -------------------------------------------------------------
// BESPOKE ATTENDANCE DASHBOARD (dashboard.php)
// -------------------------------------------------------------
const dashboardPath = path.join(ATTENDANCE_DIR, 'dashboard.php');
const dashboardContent = `<?php
/**
 * EDUSYS PRO - ATTENDANCE MANAGEMENT COMMAND CENTER (DASHBOARD)
 * Real-time daily attendance oversight: RFID gate taps, student & staff percentages, and low-attendance warnings
 */
$page_title = "Attendance Dashboard";
$page_desc = "Real-time institutional attendance radar: 2,840 students, 146 staff, RFID gate stream, and low-attendance alerts";
$active_module = "attendance";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/attendance/dashboard.php'); ?>">Attendance Management</a></li>
      <li class="breadcrumb-item active" aria-current="page">Attendance Dashboard</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-calendar2-check-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/attendance/daily-attendance.php'); ?>" class="btn btn-light border">
      <i class="bi bi-calendar-check me-1"></i> Daily Roster
    </a>
    <a href="<?php echo base_url('modules/attendance/low-attendance-alerts.php'); ?>" class="btn btn-danger text-white fw-bold">
      <i class="bi bi-exclamation-triangle-fill me-1"></i> Low Attendance (<75% Alert)
    </a>
    <a href="<?php echo base_url('modules/attendance/absentee-list.php'); ?>" class="btn btn-primary fw-bold">
      <i class="bi bi-bell-fill me-1"></i> Absentee SMS Center
    </a>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Student Attendance Today</h6>
        <div class="kpi-value">96.2%</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 2,732 of 2,840 Present</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Staff & Faculty Present</h6>
        <div class="kpi-value">142 / 146</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 97.2% Staff Turnout</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Late Arrivals Today</h6>
        <div class="kpi-value">24 Scholars</div>
        <div class="kpi-trend neutral"><i class="bi bi-stopwatch"></i> 18 Excused (Bus Delay)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-stopwatch-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-danger">
      <div class="kpi-info">
        <h6>Risk Shortfall (<75%)</h6>
        <div class="kpi-value">14 Scholars</div>
        <div class="kpi-trend negative"><i class="bi bi-exclamation-triangle"></i> CBSE Board Risk</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-exclamation-octagon-fill"></i></div>
    </div>
  </div>
</div>

<!-- Wing Attendance Breakdown & Real-Time RFID Stream -->
<div class="row g-4 mb-4">
  <div class="col-lg-8">
    <div class="card border-0 shadow-sm p-4 h-100">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-pie-chart text-primary me-2"></i>Wing-wise Daily Attendance Performance</h5>
        <span class="badge bg-light text-primary border">Today: 28 Oct 2024</span>
      </div>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 font-size-13">
          <thead class="table-light">
            <tr>
              <th>School Wing</th>
              <th>Enrolled</th>
              <th>Present Today</th>
              <th>Absent</th>
              <th>Attendance %</th>
              <th>Performance</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-primary me-2 font-size-10"></i>Pre-Primary (Nursery-Prep)</td>
              <td>340</td>
              <td>330</td>
              <td>10</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: 97.1%;"></div>
                  </div>
                  <span class="fw-bold">97.1%</span>
                </div>
              </td>
              <td><span class="badge bg-success-subtle text-success">Excellent</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-success me-2 font-size-10"></i>Primary Wing (Classes 1-5)</td>
              <td>820</td>
              <td>794</td>
              <td>26</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: 96.8%;"></div>
                  </div>
                  <span class="fw-bold">96.8%</span>
                </div>
              </td>
              <td><span class="badge bg-success-subtle text-success">Excellent</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-info me-2 font-size-10"></i>Middle Wing (Classes 6-8)</td>
              <td>680</td>
              <td>653</td>
              <td>27</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-info" style="width: 96.0%;"></div>
                  </div>
                  <span class="fw-bold">96.0%</span>
                </div>
              </td>
              <td><span class="badge bg-success-subtle text-success">High Turnout</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-warning me-2 font-size-10"></i>Secondary Wing (Classes 9-10)</td>
              <td>560</td>
              <td>536</td>
              <td>24</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-warning" style="width: 95.7%;"></div>
                  </div>
                  <span class="fw-bold">95.7%</span>
                </div>
              </td>
              <td><span class="badge bg-success-subtle text-success">High Turnout</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-purple me-2 font-size-10" style="color: #6f42c1;"></i>Senior Secondary (Classes 11-12)</td>
              <td>440</td>
              <td>419</td>
              <td>21</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-purple" style="width: 95.2%; background-color: #6f42c1;"></div>
                  </div>
                  <span class="fw-bold">95.2%</span>
                </div>
              </td>
              <td><span class="badge bg-success-subtle text-success">High Turnout</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card border-0 shadow-sm p-4 h-100">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-broadcast text-primary me-2"></i>Live RFID Gate Taps</h5>
        <span class="badge bg-success text-white font-size-11"><i class="bi bi-circle-fill me-1 font-size-8"></i>Live Sync</span>
      </div>
      <ul class="list-group list-group-flush font-size-13">
        <li class="list-group-item px-0">
          <div class="d-flex justify-content-between">
            <strong class="text-dark">Aarav Sharma (10-A)</strong>
            <span class="badge bg-success-subtle text-success">07:32 AM</span>
          </div>
          <small class="text-muted">Gate 1 Pedestrian Turnstile &bull; Tap #8491</small>
        </li>
        <li class="list-group-item px-0">
          <div class="d-flex justify-content-between">
            <strong class="text-dark">Diya Patel (10-A)</strong>
            <span class="badge bg-success-subtle text-success">07:34 AM</span>
          </div>
          <small class="text-muted">Gate 1 Pedestrian Turnstile &bull; Tap #8492</small>
        </li>
        <li class="list-group-item px-0">
          <div class="d-flex justify-content-between">
            <strong class="text-dark">Dr. K. L. Sharma (Faculty)</strong>
            <span class="badge bg-primary-subtle text-primary">07:14 AM</span>
          </div>
          <small class="text-muted">Main Staff Biometric Terminal &bull; Facial OK</small>
        </li>
        <li class="list-group-item px-0">
          <div class="d-flex justify-content-between">
            <strong class="text-dark">Ishaan Verma (12-PCB)</strong>
            <span class="badge bg-warning-subtle text-warning">07:52 AM</span>
          </div>
          <small class="text-muted">Gate 1 Pedestrian &bull; Late Entry Slip Issued</small>
        </li>
      </ul>
      <div class="mt-auto pt-3">
        <a href="<?php echo base_url('modules/attendance/rfid-integration.php'); ?>" class="btn btn-outline-primary btn-sm w-100 fw-bold">
          <i class="bi bi-broadcast-pin me-1"></i> Open Gate Readers Terminal
        </a>
      </div>
    </div>
  </div>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
`;
fs.writeFileSync(dashboardPath, dashboardContent, 'utf8');
count++;
console.log(`[GENERATED] attendance/dashboard.php (Attendance Dashboard)`);

console.log(`\nSuccessfully generated ${count} bespoke Attendance Management submodules.`);

