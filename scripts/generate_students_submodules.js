/**
 * EDUSYS PRO - COMPLETE STUDENT INFORMATION SYSTEM (SIS) GENERATOR
 * Generates all 23 submodules with domain-specific UI, realistic Indian CBSE data,
 * domain KPIs, specialized filters, and custom tables.
 */

const fs = require('fs');
const path = require('path');

const STUDENTS_DIR = path.resolve(__dirname, '../prototype/modules/students');

// Common helper to wrap table pages
function generateTablePage(d) {
  const isCertificate = d.isCertificatePage === true;
  
  const headerActionHtml = isCertificate ? `
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Certificate">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', '${d.filename.replace('.php', '')}_export.csv')" title="Export Registry">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi ${d.actionBtnIcon || 'bi-plus-lg'} me-1"></i> ${d.actionBtnText || 'Issue Certificate'}
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

  const rowActionHtml = isCertificate ? `
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Certificate"><i class="bi bi-eye"></i></button>
            <button class="action-btn text-primary" onclick="EduTables.print()" title="Print Certificate"><i class="bi bi-printer"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, '${d.title.replace(/'/g, "\\'")}')" title="Revoke"><i class="bi bi-trash"></i></button>
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
$active_module = "students";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/students/dashboard.php'); ?>">Student Information System</a></li>
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
// SUBMODULES SPECIFICATIONS FOR ALL 23 STUDENTS MODULES
// -------------------------------------------------------------
const submodules = [
  // 1. student-directory.php
  {
    filename: 'student-directory.php',
    title: 'Student Directory',
    icon: 'bi-people-fill',
    actionBtnText: 'Enroll New Student',
    actionBtnIcon: 'bi-person-plus-fill',
    desc: 'Master institutional roster of enrolled scholars, statutory APAAR numbers, and section assignments',
    kpi1: { title: "Total Enrolled", val: "2,840 Students", trend: "100% Roster Synced", icon: "bi-backpack-fill", color: "kpi-primary" },
    kpi2: { title: "Boys vs Girls", val: "1,480 / 1,360", trend: "Balanced 52:48 Ratio", icon: "bi-gender-ambiguous", color: "kpi-info" },
    kpi3: { title: "APAAR IDs Linked", val: "2,822 / 2,840", trend: "99.4% MoE Validated", icon: "bi-fingerprint", color: "kpi-success" },
    kpi4: { title: "CBSE LOC Registered", val: "420 Board Batches", trend: "Class 10 & 12 Verified", icon: "bi-shield-check", color: "kpi-warning" },
    filterPlaceholder: "Search student by name, admission #, roll no, APAAR ID...",
    filterOptions: ["All Academic Grades", "Class 12 - Senior Sec", "Class 11 - Senior Sec", "Class 10 - Secondary", "Class 9 - Secondary", "Classes 6–8 - Middle", "Classes 1–5 - Primary"],
    statusFilterOptions: ["All Status", "Active / Enrolled", "On Leave", "In Review", "TC Dispatched"],
    headers: ["Scholar / Adm #", "Student Full Name", "Grade & Section", "Roll No", "Father / Guardian", "Emergency Contact", "APAAR / Aadhaar UID", "Status"],
    rows: [
      { c1: "ADM-2024-001", c2: "Aarav Sharma", sub: "Class 10-A", c3: "Secondary Wing", c4: "Roll #01", c5: "+91 98112 34567", c6: "APAAR: 8491 2049 1042", c7: "27 Oct 2024", badge: "badge-active", status: "Active" },
      { c1: "ADM-2024-002", c2: "Diya Patel", sub: "Class 10-A", c3: "Secondary Wing", c4: "Roll #02", c5: "+91 98223 45678", c6: "APAAR: 8492 3910 2049", c7: "27 Oct 2024", badge: "badge-active", status: "Active" },
      { c1: "ADM-2024-003", c2: "Vihaan Singh", sub: "Class 10-B", c3: "Secondary Wing", c4: "Roll #01", c5: "+91 98334 56789", c6: "APAAR: 8493 4021 3910", c7: "26 Oct 2024", badge: "badge-active", status: "Active" },
      { c1: "ADM-2024-004", c2: "Ananya Iyer", sub: "Class 10-B", c3: "Secondary Wing", c4: "Roll #02", c5: "+91 98445 67890", c6: "APAAR: 8494 5132 4021", c7: "25 Oct 2024", badge: "badge-active", status: "Active" },
      { c1: "ADM-2024-005", c2: "Rohan Gupta", sub: "Class 12 - PCM", c3: "Senior Secondary", c4: "Roll #05", c5: "+91 98556 78901", c6: "APAAR: 8495 6243 5132", c7: "25 Oct 2024", badge: "badge-active", status: "Active" },
      { c1: "ADM-2024-006", c2: "Ishaan Verma", sub: "Class 12 - PCB", c3: "Senior Secondary", c4: "Roll #08", c5: "+91 98667 89012", c6: "APAAR: 8496 7354 6243", c7: "24 Oct 2024", badge: "badge-active", status: "Active" },
      { c1: "ADM-2024-007", c2: "Meera Nambiar", sub: "Class 8-C", c3: "Middle Wing", c4: "Roll #14", c5: "+91 98778 90123", c6: "APAAR: 8497 8465 7354", c7: "24 Oct 2024", badge: "badge-active", status: "Active" },
      { c1: "ADM-2024-008", c2: "Kabir Malhotra", sub: "Class 5-A", c3: "Primary Wing", c4: "Roll #11", c5: "+91 98889 01234", c6: "APAAR: 8498 9576 8465", c7: "23 Oct 2024", badge: "badge-active", status: "Active" }
    ]
  },

  // 2. personal-info.php
  {
    filename: 'personal-info.php',
    title: 'Personal Information',
    icon: 'bi-card-text',
    actionBtnText: 'Add Personal Record',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'Statutory demographic data, DOB authentication, social categorization, and domicile details',
    kpi1: { title: "Aadhaar Verified", val: "2,836 Verified", trend: "99.8% UIDAI Linked", icon: "bi-fingerprint", color: "kpi-success" },
    kpi2: { title: "Birth Certificates", val: "2,840 Authenticated", trend: "100% Municipal Registered", icon: "bi-file-earmark-check-fill", color: "kpi-primary" },
    kpi3: { title: "Social Categories", val: "GEN / OBC / SC / ST", trend: "RTE & Equal Opportunity", icon: "bi-people", color: "kpi-info" },
    kpi4: { title: "Blood Group Mapped", val: "2,828 Records", trend: "Ready for Medical Desk", icon: "bi-droplet-fill", color: "kpi-warning" },
    filterPlaceholder: "Search student, blood group, social category, DOB...",
    filterOptions: ["All Social Categories", "General Category", "OBC (Other Backward Classes)", "SC / ST Scheduled", "EWS / DG Quota"],
    statusFilterOptions: ["All Status", "Verified & Locked", "Document Due", "Under Scrutiny"],
    headers: ["Admission #", "Student Full Name", "Date of Birth", "Gender", "Social Category", "Blood Group", "Mother Tongue", "Status"],
    rows: [
      { c1: "ADM-2024-001", c2: "Aarav Sharma", sub: "Aadhaar: **** 4091", c3: "14 May 2009 (15y)", c4: "Male", c5: "General", c6: "B+ Positive", c7: "Hindi / English", badge: "badge-active", status: "Verified" },
      { c1: "ADM-2024-002", c2: "Diya Patel", sub: "Aadhaar: **** 3820", c3: "22 Aug 2009 (15y)", c4: "Female", c5: "General", c6: "O+ Positive", c7: "Gujarati / English", badge: "badge-active", status: "Verified" },
      { c1: "ADM-2024-003", c2: "Vihaan Singh", sub: "Aadhaar: **** 1948", c3: "05 Nov 2009 (15y)", c4: "Male", c5: "General", c6: "A+ Positive", c7: "Punjabi / English", badge: "badge-active", status: "Verified" },
      { c1: "ADM-2024-004", c2: "Ananya Iyer", sub: "Aadhaar: **** 2940", c3: "18 Jan 2009 (15y)", c4: "Female", c5: "General", c6: "AB+ Positive", c7: "Tamil / English", badge: "badge-active", status: "Verified" },
      { c1: "ADM-2024-005", c2: "Rohan Gupta", sub: "Aadhaar: **** 8401", c3: "30 Mar 2007 (17y)", c4: "Male", c5: "General", c6: "O+ Positive", c7: "Hindi / English", badge: "badge-active", status: "Verified" },
      { c1: "ADM-2024-006", c2: "Ishaan Verma", sub: "Aadhaar: **** 5920", c3: "12 Dec 2007 (17y)", c4: "Male", c5: "OBC (Non-Creamy)", c6: "B+ Positive", c7: "Hindi / English", badge: "badge-active", status: "Verified" },
      { c1: "ADM-2024-007", c2: "Meera Nambiar", sub: "Aadhaar: **** 7192", c3: "08 Jul 2011 (13y)", c4: "Female", c5: "General", c6: "A- Negative", c7: "Malayalam / English", badge: "badge-active", status: "Verified" },
      { c1: "ADM-2024-008", c2: "Kabir Malhotra", sub: "Aadhaar: **** 9381", c3: "19 Sep 2014 (10y)", c4: "Male", c5: "General", c6: "O+ Positive", c7: "Hindi / English", badge: "badge-active", status: "Verified" }
    ]
  },

  // 3. parent-records.php
  {
    filename: 'parent-records.php',
    title: 'Parent & Guardian Records',
    icon: 'bi-person-vcard-fill',
    actionBtnText: 'Add Parent Record',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'Parental profiles, professions, verified emergency numbers, and residential address tracking',
    kpi1: { title: "Parent Dossiers", val: "2,410 Families", trend: "Includes Siblings", icon: "bi-house-heart-fill", color: "kpi-primary" },
    kpi2: { title: "Mobile Numbers Synced", val: "100% Verified", trend: "OTP SMS Active", icon: "bi-phone-fill", color: "kpi-success" },
    kpi3: { title: "Working Professionals", val: "84.2%", trend: "IT, Healthcare, Govt, Defense", icon: "bi-briefcase-fill", color: "kpi-info" },
    kpi4: { title: "Address Proofs", val: "100% Filed", trend: "Electricity / Rent / Passport", icon: "bi-geo-alt-fill", color: "kpi-warning" },
    filterPlaceholder: "Search father, mother, student name, mobile, profession...",
    filterOptions: ["All Occupations", "Government & Defense Service", "Corporate / IT Sector", "Medical & Healthcare", "Business & Entrepreneurship", "Education & Law"],
    statusFilterOptions: ["All Status", "Active & Verified", "Contact Update Req", "Archived"],
    headers: ["Family ID", "Student Name & Class", "Father Name & Occupation", "Mother Name & Occupation", "Primary Mobile", "Parent Email", "Residential Address", "Status"],
    rows: [
      { c1: "FAM-8491", c2: "Aarav Sharma", sub: "Class 10-A", c3: "Rajesh Sharma (Sr. Director, IT)", c4: "Poonam Sharma (Professor)", c5: "+91 98112 34567", c6: "rajesh.sharma@gmail.com", c7: "Sector 14, Dwarka, New Delhi", badge: "badge-active", status: "Verified" },
      { c1: "FAM-8492", c2: "Diya Patel", sub: "Class 10-A", c3: "Bhavin Patel (Chartered Accountant)", c4: "Kavita Patel (Interior Designer)", c5: "+91 98223 45678", c6: "bhavin.ca@gmail.com", c7: "Janakpuri B-Block, New Delhi", badge: "badge-active", status: "Verified" },
      { c1: "FAM-8493", c2: "Vihaan Singh", sub: "Class 10-B", c3: "Manpreet Singh (Govt Officer, MoD)", c4: "Harpreet Kaur (Bank Manager)", c5: "+91 98334 56789", c6: "manpreet.singh@gov.in", c7: "Palam Vihar, Gurugram", badge: "badge-active", status: "Verified" },
      { c1: "FAM-8494", c2: "Ananya Iyer", sub: "Class 10-B", c3: "R. Venkatesh Iyer (Vice President, Bank)", c4: "Lakshmi Iyer (Homemaker)", c5: "+91 98445 67890", c6: "r.venkatesh@gmail.com", c7: "Vasant Kunj Sector C, New Delhi", badge: "badge-active", status: "Verified" },
      { c1: "FAM-8495", c2: "Rohan Gupta", sub: "Class 12 - PCM", c3: "Sanjay Gupta (Business Owner)", c4: "Neelam Gupta (Partner)", c5: "+91 98556 78901", c6: "sanjay.gupta@delhispice.com", c7: "Civil Lines, New Delhi", badge: "badge-active", status: "Verified" },
      { c1: "FAM-8496", c2: "Ishaan Verma", sub: "Class 12 - PCB", c3: "Dr. Alok Verma (Surgeon, AIIMS)", c4: "Dr. Meenakshi Verma (Pediatrician)", c5: "+91 98667 89012", c6: "alok.verma.md@aiims.edu", c7: "Ansari Nagar, New Delhi", badge: "badge-active", status: "Verified" },
      { c1: "FAM-8497", c2: "Meera Nambiar", sub: "Class 8-C", c3: "K. R. Nambiar (Aviation Pilot)", c4: "Radhika Nambiar (Architect)", c5: "+91 98778 90123", c6: "nambiar.kr@airindia.in", c7: "Aerocity Residences, New Delhi", badge: "badge-active", status: "Verified" },
      { c1: "FAM-8498", c2: "Kabir Malhotra", sub: "Class 5-A", c3: "Vikram Malhotra (Senior Advocate)", c4: "Sunita Malhotra (Journalist)", c5: "+91 98889 01234", c6: "malhotra.law@gmail.com", c7: "Greater Kailash 2, New Delhi", badge: "badge-active", status: "Verified" }
    ]
  },

  // 4. emergency-contacts.php
  {
    filename: 'emergency-contacts.php',
    title: 'Emergency Contacts',
    icon: 'bi-telephone-forward-fill',
    actionBtnText: 'Add Emergency Contact',
    actionBtnIcon: 'bi-telephone-plus',
    desc: 'Critical medical contact hotline, authorized emergency guardians, and nearest hospital mappings',
    kpi1: { title: "24/7 Hotline Synced", val: "2,840 Contacts", trend: "100% Reachable", icon: "bi-telephone-inbound-fill", color: "kpi-success" },
    kpi2: { title: "Medical Alerts", val: "148 Students", trend: "Asthma, Allergies, Epipen", icon: "bi-heart-pulse-fill", color: "kpi-danger" },
    kpi3: { title: "Designated Hospitals", val: "5 Partner Clinics", trend: "Manipal, Max, Fortis Nearby", icon: "bi-hospital", color: "kpi-info" },
    kpi4: { title: "School Infirmary", val: "2 Full-Time Nurses", trend: "Pediatric Doctor on Call", icon: "bi-shield-plus", color: "kpi-primary" },
    filterPlaceholder: "Search student, emergency contact, relationship, hospital...",
    filterOptions: ["All Medical Flags", "Asthma Inhaler on File", "Nut / Food Allergy", "Epipen Required", "Diabetic Monitoring", "No Known Allergies"],
    statusFilterOptions: ["All Status", "Verified & Active", "Contact Unreachable", "Update Needed"],
    headers: ["Student ID", "Student Full Name", "Primary Emergency Contact", "Relationship", "Emergency Hotline", "Alternate Mobile", "Preferred Hospital / Doctor", "Medical Alert"],
    rows: [
      { c1: "ADM-2024-001", c2: "Aarav Sharma", sub: "Class 10-A", c3: "Rajesh Sharma", c4: "Father", c5: "+91 98112 34567", c6: "+91 98112 34568", c7: "Manipal Hospital Dwarka", badge: "badge-active", status: "No Known Allergy" },
      { c1: "ADM-2024-002", c2: "Diya Patel", sub: "Class 10-A", c3: "Kavita Patel", c4: "Mother", c5: "+91 98223 45678", c6: "+91 98223 45679", c7: "Max Hospital Saket", badge: "badge-pending", status: "Peanut Allergy" },
      { c1: "ADM-2024-003", c2: "Vihaan Singh", sub: "Class 10-B", c3: "Manpreet Singh", c4: "Father", c5: "+91 98334 56789", c6: "+91 98334 56790", c7: "Base Hospital Delhi Cantt", badge: "badge-active", status: "No Known Allergy" },
      { c1: "ADM-2024-004", c2: "Ananya Iyer", sub: "Class 10-B", c3: "R. Venkatesh Iyer", c4: "Father", c5: "+91 98445 67890", c6: "+91 98445 67891", c7: "Fortis Flt. Lt. Rajan Dhall", badge: "badge-pending", status: "Mild Asthma" },
      { c1: "ADM-2024-005", c2: "Rohan Gupta", sub: "Class 12 - PCM", c3: "Sanjay Gupta", c4: "Father", c5: "+91 98556 78901", c6: "+91 98556 78902", c7: "Sant Parmanand Hospital", badge: "badge-active", status: "No Known Allergy" },
      { c1: "ADM-2024-006", c2: "Ishaan Verma", sub: "Class 12 - PCB", c3: "Dr. Alok Verma", c4: "Father", c5: "+91 98667 89012", c6: "+91 98667 89013", c7: "AIIMS Trauma Center", badge: "badge-active", status: "No Known Allergy" },
      { c1: "ADM-2024-007", c2: "Meera Nambiar", sub: "Class 8-C", c3: "Radhika Nambiar", c4: "Mother", c5: "+91 98778 90123", c6: "+91 98778 90124", c7: "Venkateshwar Hospital", badge: "badge-pending", status: "Lactose Intolerant" },
      { c1: "ADM-2024-008", c2: "Kabir Malhotra", sub: "Class 5-A", c3: "Vikram Malhotra", c4: "Father", c5: "+91 98889 01234", c6: "+91 98889 01235", c7: "Apollo Cradle & Children", badge: "badge-active", status: "No Known Allergy" }
    ]
  },

  // 5. previous-school.php
  {
    filename: 'previous-school.php',
    title: 'Previous School Records',
    icon: 'bi-building-up',
    actionBtnText: 'Log Previous Record',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'Prior institutional track, transfer certificate verification, board affiliations, and scholastic transcripts',
    kpi1: { title: "Transferred Scholars", val: "412 Students", trend: "Interstate / Intra-City", icon: "bi-building-check", color: "kpi-primary" },
    kpi2: { title: "Counter-Signed TCs", val: "404 Verified", trend: "CBSE / State Dept Clear", icon: "bi-patch-check-fill", color: "kpi-success" },
    kpi3: { title: "Board Conversions", val: "68 Scholars", trend: "ICSE & IB to CBSE", icon: "bi-arrow-left-right", color: "kpi-info" },
    kpi4: { title: "TC Pending Original", val: "8 In Process", trend: "Within 30-Day Window", icon: "bi-hourglass-split", color: "kpi-warning" },
    filterPlaceholder: "Search student, previous school, board, TC number...",
    filterOptions: ["All Previous Boards", "CBSE Affiliated School", "ICSE / CISCE Board", "State Education Board", "International IB / Cambridge", "Army Public School (AWES)"],
    statusFilterOptions: ["All Status", "TC Verified & Sealed", "Counter-Sign Awaited", "Provisional Admission"],
    headers: ["Admission #", "Student Full Name", "Previous School Name", "Affiliation Board", "Last Grade Passed", "TC Serial #", "Marks / CGPA", "TC Verification"],
    rows: [
      { c1: "ADM-2024-001", c2: "Aarav Sharma", sub: "Class 10-A", c3: "Delhi Public School, R.K. Puram", c4: "CBSE Board", c5: "Class 9 Passed", c6: "DPS-RKP-TC-9481", c7: "92.4% (Grade A1)", badge: "badge-active", status: "Verified" },
      { c1: "ADM-2024-002", c2: "Diya Patel", sub: "Class 10-A", c3: "The Mother's International School", c4: "CBSE Board", c5: "Class 9 Passed", c6: "MIS-TC-2024-104", c7: "94.8% (Grade A1)", badge: "badge-active", status: "Verified" },
      { c1: "ADM-2024-003", c2: "Vihaan Singh", sub: "Class 10-B", c3: "Army Public School, Dhaula Kuan", c4: "CBSE Board", c5: "Class 9 Passed", c6: "APS-DK-2024-84", c7: "88.6% (Grade A2)", badge: "badge-active", status: "Verified" },
      { c1: "ADM-2024-004", c2: "Ananya Iyer", sub: "Class 10-B", c3: "Sanskriti School, Chanakyapuri", c4: "CBSE Board", c5: "Class 9 Passed", c6: "SAN-2024-TC-112", c7: "91.2% (Grade A1)", badge: "badge-active", status: "Verified" },
      { c1: "ADM-2024-005", c2: "Rohan Gupta", sub: "Class 12 - PCM", c3: "Modern School, Barakhamba Road", c4: "CBSE Board", c5: "Class 10 Board Passed", c6: "MS-TC-2023-408", c7: "95.6% (CBSE Board)", badge: "badge-active", status: "Verified" },
      { c1: "ADM-2024-006", c2: "Ishaan Verma", sub: "Class 12 - PCB", c3: "St. Columba's School", c4: "CBSE Board", c5: "Class 10 Board Passed", c6: "SCS-2023-TC-219", c7: "93.4% (CBSE Board)", badge: "badge-active", status: "Verified" },
      { c1: "ADM-2024-007", c2: "Meera Nambiar", sub: "Class 8-C", c3: "The Shri Ram School, Moulsari", c4: "ICSE Board", c5: "Class 7 Passed", c6: "TSRS-2024-TC-88", c7: "96.0% (Grade A+)", badge: "badge-active", status: "Verified" },
      { c1: "ADM-2024-008", c2: "Kabir Malhotra", sub: "Class 5-A", c3: "Presidium School, Gurugram", c4: "CBSE Board", c5: "Class 4 Passed", c6: "PS-TC-2024-041", c7: "90.2% (Grade A1)", badge: "badge-pending", status: "Counter-Signed Pending" }
    ]
  },

  // 6. documents.php
  {
    filename: 'documents.php',
    title: 'Student Documents Locker',
    icon: 'bi-folder-symlink-fill',
    actionBtnText: 'Upload Student Document',
    actionBtnIcon: 'bi-cloud-arrow-up-fill',
    desc: 'Encrypted document depository: Birth certificates, Aadhaar UIDAI, transfer certificates, and CBSE LOC filings',
    kpi1: { title: "Total Documents", val: "11,360 Files", trend: "4 Documents / Student", icon: "bi-folder2-open", color: "kpi-primary" },
    kpi2: { title: "DigiLocker Synced", val: "94.8% Verified", trend: "Govt API Connected", icon: "bi-shield-lock-fill", color: "kpi-success" },
    kpi3: { title: "Storage Consumed", val: "84.2 GB", trend: "AWS S3 Vault Encrypted", icon: "bi-hdd-network-fill", color: "kpi-info" },
    kpi4: { title: "Pending Physical Audit", val: "14 Dossiers", trend: "Staff Room Inspection", icon: "bi-clock-history", color: "kpi-warning" },
    filterPlaceholder: "Search document UID, student name, category, format...",
    filterOptions: ["All Document Types", "Birth Certificate (MCD/Municipal)", "Aadhaar Card (UIDAI)", "Previous School TC (Original)", "Medical Fitness Certificate", "Category / Caste Certificate"],
    statusFilterOptions: ["All Status", "Verified & Sealed", "DigiLocker Synced", "In Review", "Rejected / Re-upload"],
    headers: ["Doc UID", "Student Full Name", "Document Category", "File Format & Size", "DigiLocker / APAAR Sync", "Verification Officer", "Upload Date", "Status"],
    rows: [
      { c1: "DOC-STU-001A", c2: "Aarav Sharma", sub: "Class 10-A", c3: "Municipal Birth Certificate", c4: "PDF (1.2 MB)", c5: "Synced with DigiLocker", c6: "Rohan Vashisht (Registrar)", c7: "15 Apr 2024", badge: "badge-active", status: "Verified" },
      { c1: "DOC-STU-001B", c2: "Aarav Sharma", sub: "Class 10-A", c3: "Aadhaar Card (UIDAI)", c4: "PDF (840 KB)", c5: "UIDAI e-KYC Verified", c6: "Rohan Vashisht (Registrar)", c7: "15 Apr 2024", badge: "badge-active", status: "Verified" },
      { c1: "DOC-STU-002A", c2: "Diya Patel", sub: "Class 10-A", c3: "Previous School TC (Counter-Signed)", c4: "PDF (2.1 MB)", c5: "Physical Copy in Vault", c6: "Sunil Joshi (Admin)", c7: "18 Apr 2024", badge: "badge-active", status: "Verified" },
      { c1: "DOC-STU-003A", c2: "Vihaan Singh", sub: "Class 10-B", c3: "Defense Dependent Certificate", c4: "PDF (1.4 MB)", c5: "Army Welfare Endorsed", c6: "Sunil Joshi (Admin)", c7: "20 Apr 2024", badge: "badge-active", status: "Verified" },
      { c1: "DOC-STU-004A", c2: "Ananya Iyer", sub: "Class 10-B", c3: "Pediatric Fitness & Vaccine Card", c4: "PDF (920 KB)", c5: "Infirmary Verified", c6: "Dr. Sunita Kapoor", c7: "22 Apr 2024", badge: "badge-active", status: "Verified" },
      { c1: "DOC-STU-005A", c2: "Rohan Gupta", sub: "Class 12 - PCM", c3: "CBSE Class 10 Board Marks Statement", c4: "PDF (1.8 MB)", c5: "DigiLocker API Verified", c6: "Registrar Office", c7: "10 Jul 2023", badge: "badge-active", status: "Verified" },
      { c1: "DOC-STU-006A", c2: "Ishaan Verma", sub: "Class 12 - PCB", c3: "OBC Non-Creamy Layer Certificate", c4: "PDF (1.5 MB)", c5: "Revenue Dept Verified", c6: "Rohan Vashisht (Registrar)", c7: "12 Jul 2023", badge: "badge-active", status: "Verified" },
      { c1: "DOC-STU-007A", c2: "Meera Nambiar", sub: "Class 8-C", c3: "Transfer Certificate (ICSE to CBSE)", c4: "PDF (2.4 MB)", c5: "Counter-Signed by Insp.", c6: "Sunil Joshi (Admin)", c7: "24 Apr 2024", badge: "badge-active", status: "Verified" }
    ]
  },

  // 7. id-cards.php
  {
    filename: 'id-cards.php',
    title: 'Student ID Cards',
    icon: 'bi-person-badge-fill',
    actionBtnText: 'Generate ID Card Batch',
    actionBtnIcon: 'bi-printer-fill',
    desc: 'Smart RFID badge issuance, QR code security encoding, NFC bus pass integration, and reprint queue',
    kpi1: { title: "ID Cards Issued", val: "2,840 Active", trend: "100% Issued for 2024-25", icon: "bi-person-badge", color: "kpi-success" },
    kpi2: { title: "RFID Smart Enabled", val: "2,840 Badges", trend: "Library & Gate Tap Sync", icon: "bi-broadcast-pin", color: "kpi-primary" },
    kpi3: { title: "Reprint Requests", val: "12 Pending", trend: "Damaged / Lost Replacements", icon: "bi-arrow-repeat", color: "kpi-warning" },
    kpi4: { title: "Card Fee Realized", val: "₹1,200 / Loss", trend: "₹14,400 Replacement Fund", icon: "bi-cash-coin", color: "kpi-info" },
    filterPlaceholder: "Search card number, student name, class, blood group...",
    filterOptions: ["All Card Status", "Printed & Dispatched", "Pending Print Queue", "Lost / Damaged Marked", "Re-issued Card"],
    statusFilterOptions: ["All Status", "Active RFID", "In Print Batch", "Blocked / Inactive"],
    headers: ["Card Serial #", "Student Full Name", "Class & Section", "Roll #", "Blood Group", "Emergency Phone", "Barcode / QR Code", "Card Status"],
    rows: [
      { c1: "IDC-2024-0001", c2: "Aarav Sharma", sub: "Adm #001", c3: "Class 10 - Section A", c4: "Roll #01", c5: "B+ Positive", c6: "+91 98112 34567", c7: "QR: DPGA-2024-0001", badge: "badge-active", status: "Active RFID" },
      { c1: "IDC-2024-0002", c2: "Diya Patel", sub: "Adm #002", c3: "Class 10 - Section A", c4: "Roll #02", c5: "O+ Positive", c6: "+91 98223 45678", c7: "QR: DPGA-2024-0002", badge: "badge-active", status: "Active RFID" },
      { c1: "IDC-2024-0003", c2: "Vihaan Singh", sub: "Adm #003", c3: "Class 10 - Section B", c4: "Roll #01", c5: "A+ Positive", c6: "+91 98334 56789", c7: "QR: DPGA-2024-0003", badge: "badge-active", status: "Active RFID" },
      { c1: "IDC-2024-0004", c2: "Ananya Iyer", sub: "Adm #004", c3: "Class 10 - Section B", c4: "Roll #02", c5: "AB+ Positive", c6: "+91 98445 67890", c7: "QR: DPGA-2024-0004", badge: "badge-active", status: "Active RFID" },
      { c1: "IDC-2024-0005", c2: "Rohan Gupta", sub: "Adm #005", c3: "Class 12 - PCM", c4: "Roll #05", c5: "O+ Positive", c6: "+91 98556 78901", c7: "QR: DPGA-2024-0005", badge: "badge-active", status: "Active RFID" },
      { c1: "IDC-2024-0006", c2: "Ishaan Verma", sub: "Adm #006", c3: "Class 12 - PCB", c4: "Roll #08", c5: "B+ Positive", c6: "+91 98667 89012", c7: "QR: DPGA-2024-0006", badge: "badge-active", status: "Active RFID" },
      { c1: "IDC-2024-0007", c2: "Meera Nambiar", sub: "Adm #007", c3: "Class 8 - Section C", c4: "Roll #14", c5: "A- Negative", c6: "+91 98778 90123", c7: "QR: DPGA-2024-0007", badge: "badge-active", status: "Active RFID" },
      { c1: "IDC-2024-0008", c2: "Kabir Malhotra", sub: "Adm #008", c3: "Class 5 - Section A", c4: "Roll #11", c5: "O+ Positive", c6: "+91 98889 01234", c7: "QR: DPGA-2024-0008", badge: "badge-pending", status: "Re-issue Queue" }
    ]
  },

  // 8. class-allocation.php
  {
    filename: 'class-allocation.php',
    title: 'Class & Section Allocation',
    icon: 'bi-diagram-2-fill',
    actionBtnText: 'Allocate Section',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'Section cohort balancing, student-to-teacher capacity caps (40:1), and classroom room assignment',
    kpi1: { title: "Total Sections", val: "72 Active Sections", trend: "Avg 39.4 Students / Sec", icon: "bi-grid-3x3-gap-fill", color: "kpi-primary" },
    kpi2: { title: "Ideal Capacity Met", val: "98.5% Sections", trend: "Max 40 Students (CBSE)", icon: "bi-check2-all", color: "kpi-success" },
    kpi3: { title: "Class Teachers", val: "72 Appointed", trend: "100% Mentors Assigned", icon: "bi-person-workspace", color: "kpi-info" },
    kpi4: { title: "Pending Allocation", val: "0 Students", trend: "All Scholars Placed", icon: "bi-people", color: "kpi-warning" },
    filterPlaceholder: "Search class, section, teacher, student...",
    filterOptions: ["All Grades", "Class 12 - Senior Secondary", "Class 11 - Senior Secondary", "Class 10 - Secondary", "Class 9 - Secondary", "Classes 6–8 - Middle", "Classes 1–5 - Primary"],
    statusFilterOptions: ["All Status", "Allocated & Verified", "Section Transfer Req", "Provisional"],
    headers: ["Allocation ID", "Student Full Name", "Academic Session", "Allocated Grade", "Section", "Class Teacher", "Classroom #", "Status"],
    rows: [
      { c1: "ALC-2024-1048", c2: "Aarav Sharma", sub: "Adm #001", c3: "2024-2025", c4: "Class 10", c5: "Section A (40 Students)", c6: "Mrs. Sunita Kaul (PGT)", c7: "Room #204 (Block A)", badge: "badge-active", status: "Allocated" },
      { c1: "ALC-2024-1049", c2: "Diya Patel", sub: "Adm #002", c3: "2024-2025", c4: "Class 10", c5: "Section A (40 Students)", c6: "Mrs. Sunita Kaul (PGT)", c7: "Room #204 (Block A)", badge: "badge-active", status: "Allocated" },
      { c1: "ALC-2024-1050", c2: "Vihaan Singh", sub: "Adm #003", c3: "2024-2025", c4: "Class 10", c5: "Section B (38 Students)", c6: "Mr. Vikram Rathore", c7: "Room #205 (Block A)", badge: "badge-active", status: "Allocated" },
      { c1: "ALC-2024-1051", c2: "Ananya Iyer", sub: "Adm #004", c3: "2024-2025", c4: "Class 10", c5: "Section B (38 Students)", c6: "Mr. Vikram Rathore", c7: "Room #205 (Block A)", badge: "badge-active", status: "Allocated" },
      { c1: "ALC-2024-1052", c2: "Rohan Gupta", sub: "Adm #005", c3: "2024-2025", c4: "Class 12 - Science", c5: "Section A - PCM (35 Students)", c6: "Dr. K. L. Sharma", c7: "Room #301 (Science Block)", badge: "badge-active", status: "Allocated" },
      { c1: "ALC-2024-1053", c2: "Ishaan Verma", sub: "Adm #006", c3: "2024-2025", c4: "Class 12 - Science", c5: "Section B - PCB (32 Students)", c6: "Mrs. Radhika Iyer", c7: "Room #302 (Bio Block)", badge: "badge-active", status: "Allocated" },
      { c1: "ALC-2024-1054", c2: "Meera Nambiar", sub: "Adm #007", c3: "2024-2025", c4: "Class 8", c5: "Section C (39 Students)", c6: "Mr. Deepak Rawat", c7: "Room #108 (Middle Block)", badge: "badge-active", status: "Allocated" },
      { c1: "ALC-2024-1055", c2: "Kabir Malhotra", sub: "Adm #008", c3: "2024-2025", c4: "Class 5", c5: "Section A (40 Students)", c6: "Mrs. Shalini Verma", c7: "Room #012 (Primary Block)", badge: "badge-active", status: "Allocated" }
    ]
  },

  // 9. roll-numbers.php
  {
    filename: 'roll-numbers.php',
    title: 'Roll Number Management',
    icon: 'bi-list-ol',
    actionBtnText: 'Re-sequence Roll Nos',
    actionBtnIcon: 'bi-sort-numeric-down',
    desc: 'Section-wise roll allocation algorithms: Alphabetical, admission date, or gender-separated sorting',
    kpi1: { title: "Mapped Roll Numbers", val: "2,840 Students", trend: "100% Sequence Completed", icon: "bi-check2-square", color: "kpi-success" },
    kpi2: { title: "Sorting Standard", val: "Alphabetical (A-Z)", trend: "CBSE Exam Alignment", icon: "bi-sort-alpha-down", color: "kpi-primary" },
    kpi3: { title: "Board LOC Roll Nos", val: "420 Board Candidates", trend: "CBSE Roll 7-Digit Ready", icon: "bi-award-fill", color: "kpi-info" },
    kpi4: { title: "Exceptions Flagged", val: "0 Clashes", trend: "Unique Per Section", icon: "bi-shield-check", color: "kpi-warning" },
    filterPlaceholder: "Search roll no, student name, admission #, class...",
    filterOptions: ["All Classes", "Class 10 - Section A", "Class 10 - Section B", "Class 12 - Science (PCM)", "Class 12 - Science (PCB)", "Class 8 - Section C", "Class 5 - Section A"],
    statusFilterOptions: ["All Status", "Confirmed Roll No", "Provisional", "Re-assigned"],
    headers: ["Roll #", "Student Full Name", "Admission #", "Grade & Section", "Gender", "Alphabetical Rank", "Assigned Date", "Status"],
    rows: [
      { c1: "Roll #01", c2: "Aarav Sharma", sub: "Class 10-A", c3: "ADM-2024-001", c4: "Class 10 - Section A", c5: "Male", c6: "Rank #1 in Section A", c7: "01 Jul 2024", badge: "badge-active", status: "Confirmed" },
      { c1: "Roll #02", c2: "Diya Patel", sub: "Class 10-A", c3: "ADM-2024-002", c4: "Class 10 - Section A", c5: "Female", c6: "Rank #2 in Section A", c7: "01 Jul 2024", badge: "badge-active", status: "Confirmed" },
      { c1: "Roll #01", c2: "Vihaan Singh", sub: "Class 10-B", c3: "ADM-2024-003", c4: "Class 10 - Section B", c5: "Male", c6: "Rank #1 in Section B", c7: "01 Jul 2024", badge: "badge-active", status: "Confirmed" },
      { c1: "Roll #02", c2: "Ananya Iyer", sub: "Class 10-B", c3: "ADM-2024-004", c4: "Class 10 - Section B", c5: "Female", c6: "Rank #2 in Section B", c7: "01 Jul 2024", badge: "badge-active", status: "Confirmed" },
      { c1: "Roll #05", c2: "Rohan Gupta", sub: "Class 12 - PCM", c3: "ADM-2024-005", c4: "Class 12 - Science (PCM)", c5: "Male", c6: "Rank #5 in PCM", c7: "01 Jul 2024", badge: "badge-active", status: "Confirmed" },
      { c1: "Roll #08", c2: "Ishaan Verma", sub: "Class 12 - PCB", c3: "ADM-2024-006", c4: "Class 12 - Science (PCB)", c5: "Male", c6: "Rank #8 in PCB", c7: "01 Jul 2024", badge: "badge-active", status: "Confirmed" },
      { c1: "Roll #14", c2: "Meera Nambiar", sub: "Class 8-C", c3: "ADM-2024-007", c4: "Class 8 - Section C", c5: "Female", c6: "Rank #14 in Section C", c7: "01 Jul 2024", badge: "badge-active", status: "Confirmed" },
      { c1: "Roll #11", c2: "Kabir Malhotra", sub: "Class 5-A", c3: "ADM-2024-008", c4: "Class 5 - Section A", c5: "Male", c6: "Rank #11 in Section A", c7: "01 Jul 2024", badge: "badge-active", status: "Confirmed" }
    ]
  },

  // 10. student-promotion.php
  {
    filename: 'student-promotion.php',
    title: 'Student Promotion',
    icon: 'bi-arrow-up-right-square-fill',
    actionBtnText: 'Run Promotion Batch',
    actionBtnIcon: 'bi-arrow-up-right-circle-fill',
    desc: 'Annual academic progression engine: Grade promotion criteria, detention logs, and grace marks validation',
    kpi1: { title: "Promoted to Next Grade", val: "2,780 Scholars", trend: "98.2% Promotion Rate", icon: "bi-check2-circle", color: "kpi-success" },
    kpi2: { title: "Promoted with Grace", val: "38 Students", trend: "Max 5 Marks as per CBSE", icon: "bi-patch-exclamation-fill", color: "kpi-info" },
    kpi3: { title: "Detained / Repeater", val: "22 Students", trend: "Remedial Coaching Batch", icon: "bi-exclamation-triangle-fill", color: "kpi-warning" },
    kpi4: { title: "Target Session", val: "2025-2026", trend: "Batch Roster Pre-Allocated", icon: "bi-calendar2-check-fill", color: "kpi-primary" },
    filterPlaceholder: "Search promotion ID, student, class, verdict...",
    filterOptions: ["All Promotion Verdicts", "Unconditional Promotion (Pass)", "Promoted with Grace Marks", "Compartment / Retest Needed", "Detained in Same Grade"],
    statusFilterOptions: ["All Status", "Promoted & Migrated", "Grace Applied", "Retest Scheduled", "Detained"],
    headers: ["Promotion ID", "Student Full Name", "Current Class", "Annual Final Score", "Promotion Verdict", "Next Class Allocated", "Grace Marks", "Status"],
    rows: [
      { c1: "PRM-2024-0841", c2: "Aarav Sharma", sub: "Class 10-A", c3: "Class 9 - Sec A", c4: "94.6% (CGPA 9.8)", c5: "Unconditional Pass", c6: "Class 10 - Section A", c7: "None (Direct)", badge: "badge-active", status: "Promoted" },
      { c1: "PRM-2024-0842", c2: "Diya Patel", sub: "Class 10-A", c3: "Class 9 - Sec A", c4: "96.2% (CGPA 10.0)", c5: "Unconditional Pass", c6: "Class 10 - Section A", c7: "None (Direct)", badge: "badge-active", status: "Promoted" },
      { c1: "PRM-2024-0843", c2: "Vihaan Singh", sub: "Class 10-B", c3: "Class 9 - Sec B", c4: "88.4% (CGPA 9.2)", c5: "Unconditional Pass", c6: "Class 10 - Section B", c7: "None (Direct)", badge: "badge-active", status: "Promoted" },
      { c1: "PRM-2024-0844", c2: "Ananya Iyer", sub: "Class 10-B", c3: "Class 9 - Sec B", c4: "91.8% (CGPA 9.5)", c5: "Unconditional Pass", c6: "Class 10 - Section B", c7: "None (Direct)", badge: "badge-active", status: "Promoted" },
      { c1: "PRM-2024-0845", c2: "Rohan Gupta", sub: "Class 12 - PCM", c3: "Class 11 - PCM", c4: "85.2% (Science Core)", c5: "Unconditional Pass", c6: "Class 12 - Science (PCM)", c7: "None (Direct)", badge: "badge-active", status: "Promoted" },
      { c1: "PRM-2024-0846", c2: "Ishaan Verma", sub: "Class 12 - PCB", c3: "Class 11 - PCB", c4: "83.6% (Medical Core)", c5: "Unconditional Pass", c6: "Class 12 - Science (PCB)", c7: "None (Direct)", badge: "badge-active", status: "Promoted" },
      { c1: "PRM-2024-0847", c2: "Meera Nambiar", sub: "Class 8-C", c3: "Class 7 - Sec C", c4: "97.0% (Grade A1)", c5: "Unconditional Pass", c6: "Class 8 - Section C", c7: "None (Direct)", badge: "badge-active", status: "Promoted" },
      { c1: "PRM-2024-0848", c2: "Kabir Malhotra", sub: "Class 5-A", c3: "Class 4 - Sec A", c4: "92.4% (Grade A1)", c5: "Unconditional Pass", c6: "Class 5 - Section A", c7: "None (Direct)", badge: "badge-active", status: "Promoted" }
    ]
  },

  // 11. student-transfer.php
  {
    filename: 'student-transfer.php',
    title: 'Student Transfer Register',
    icon: 'bi-arrow-left-right',
    actionBtnText: 'Log Section Transfer',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'Internal section reallocations, stream switches, and branch-to-branch mobility audit logs',
    kpi1: { title: "Transfers Processed", val: "28 Scholars", trend: "Session 2024-25", icon: "bi-arrow-left-right", color: "kpi-primary" },
    kpi2: { title: "Section Leveling", val: "18 Requests", trend: "Balanced Classroom Ratios", icon: "bi-columns-gap", color: "kpi-success" },
    kpi3: { title: "Stream Switch (Cl 11)", val: "6 Cases", trend: "PCM to Commerce / Hum", icon: "bi-mortarboard", color: "kpi-info" },
    kpi4: { title: "Under Approval", val: "4 Requests", trend: "On Principal Desk", icon: "bi-pen", color: "kpi-warning" },
    filterPlaceholder: "Search transfer order #, student, old class, new class...",
    filterOptions: ["All Transfer Types", "Internal Section Transfer", "Senior Secondary Stream Switch", "Branch to Branch Relocation", "Second Language Shift"],
    statusFilterOptions: ["All Status", "Approved & Completed", "Pending Principal Sanction", "Rejected / Ineligible"],
    headers: ["Transfer Order #", "Student Full Name", "From Class / Section", "To Class / Section", "Reason for Transfer", "Approved By", "Effective Date", "Status"],
    rows: [
      { c1: "TRN-2024-0028", c2: "Advait Singhal", sub: "Adm #1948", c3: "Class 10 - Section C", c4: "Class 10 - Section A", c5: "Language Shift to French B", c6: "Dr. Ananya Roy (Principal)", c7: "15 Oct 2024", badge: "badge-active", status: "Approved" },
      { c1: "TRN-2024-0027", c2: "Anushka Kulkarni", sub: "Adm #2014", c3: "Class 11 - PCM", c4: "Class 11 - Commerce", c5: "Career Alignment to CA / Eco", c6: "Dean Academics", c7: "10 Oct 2024", badge: "badge-active", status: "Approved" },
      { c1: "TRN-2024-0026", c2: "Rohan Deshmukh", sub: "Adm #1842", c3: "Class 8 - Section B", c4: "Class 8 - Section D", c5: "Cohort Rebalance Request", c6: "Mrs. Shalini Verma", c7: "05 Oct 2024", badge: "badge-active", status: "Approved" },
      { c1: "TRN-2024-0025", c2: "Pari Chawla", sub: "Adm #2491", c3: "Class 6 - Section A", c4: "Class 6 - Section C", c5: "Sibling Bus Route Optimization", c6: "Transport & Admin Desk", c7: "28 Sep 2024", badge: "badge-active", status: "Approved" },
      { c1: "TRN-2024-0024", c2: "Dhruv Kapoor", sub: "Adm #1740", c3: "Class 11 - PCB", c4: "Class 11 - PCM", c5: "Opted for Engineering JEE Track", c6: "Dr. Ananya Roy (Principal)", c7: "20 Sep 2024", badge: "badge-active", status: "Approved" },
      { c1: "TRN-2024-0023", c2: "Tanmay Bansal", sub: "Adm #2810", c3: "Class 9 - Section B", c4: "Class 9 - Section A", c5: "Remedial Cohort Allocation", c6: "Secondary Wing Head", c7: "15 Sep 2024", badge: "badge-active", status: "Approved" },
      { c1: "TRN-2024-0022", c2: "Gauri Joshi", sub: "Adm #1980", c3: "Class 7 - Section C", c4: "Class 7 - Section B", c5: "Class Teacher Recommendation", c6: "Middle Wing Head", c7: "10 Sep 2024", badge: "badge-active", status: "Approved" },
      { c1: "TRN-2024-0021", c2: "Manav Sethi", sub: "Adm #2204", c3: "Class 10 - Section B", c4: "Class 10 - Section A", c5: "Peer Learning Optimization", c6: "Dean Academics", c7: "01 Sep 2024", badge: "badge-active", status: "Approved" }
    ]
  },

  // 12. student-withdrawal.php
  {
    filename: 'student-withdrawal.php',
    title: 'Student Withdrawal Register',
    icon: 'bi-box-arrow-right',
    actionBtnText: 'Lodge Withdrawal File',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'Formal student exit ledger, departmental no-dues tracking, and caution money refunds',
    kpi1: { title: "Total Withdrawals", val: "18 Exits Logged", trend: "0.63% Ultra-Low Churn", icon: "bi-door-open-fill", color: "kpi-primary" },
    kpi2: { title: "Caution Money Refunded", val: "₹2,70,000", trend: "100% Cleared to Bank", icon: "bi-wallet2", color: "kpi-success" },
    kpi3: { title: "No-Dues Cleared", val: "15 Files Complete", trend: "Library, Lab, Sports, Fees", icon: "bi-check2-all", color: "kpi-info" },
    kpi4: { title: "Pending Clearance", val: "3 Cases", trend: "Library Book Return Due", icon: "bi-clock-history", color: "kpi-warning" },
    filterPlaceholder: "Search withdrawal ref #, student, reason, class...",
    filterOptions: ["All Exit Reasons", "Parent Overseas / Interstate Transfer", "Shifted to Boarding School", "Competitive Exam Coaching Shift", "Financial / Distance Reasons"],
    statusFilterOptions: ["All Status", "Exit Complete & TC Issued", "No Dues in Progress", "Caution Money Due"],
    headers: ["Withdrawal Ref #", "Student Full Name", "Class & Section", "Exit Reason", "No-Dues Clearance", "Caution Refund (₹)", "Leaving Date", "Status"],
    rows: [
      { c1: "WDL-2024-0018", c2: "Tushar Sengupta", sub: "Adm #1412", c3: "Class 8 - Section B", c4: "Parent Transfer to London, UK", c5: "All Depts Cleared (100%)", c6: "₹15,000 (Refunded)", c7: "18 Oct 2024", badge: "badge-active", status: "Completed" },
      { c1: "WDL-2024-0017", c2: "Ananya Dixit", sub: "Adm #1912", c3: "Class 5 - Section A", c4: "Relocation to Bengaluru (IT Shift)", c5: "All Depts Cleared (100%)", c6: "₹15,000 (Refunded)", c7: "12 Oct 2024", badge: "badge-active", status: "Completed" },
      { c1: "WDL-2024-0016", c2: "Devendra Rathore", sub: "Adm #1049", c3: "Class 10 - Section C", c4: "Father Transferred to Pune Army HQ", c5: "Physics Lab Pending 1 Item", c6: "₹15,000 (On Hold)", c7: "08 Oct 2024", badge: "badge-pending", status: "No Dues Pending" },
      { c1: "WDL-2024-0015", c2: "Simran Kaur", sub: "Adm #1481", c3: "Class 3 - Section A", c4: "Shifted to Residential School", c5: "All Depts Cleared (100%)", c6: "₹15,000 (Refunded)", c7: "01 Oct 2024", badge: "badge-active", status: "Completed" },
      { c1: "WDL-2024-0014", c2: "Aakash Chopra", sub: "Adm #0920", c3: "Class 11 - Commerce", c4: "Moved to Kota Coaching Academy", c5: "All Depts Cleared (100%)", c6: "₹20,000 (Refunded)", c7: "25 Sep 2024", badge: "badge-active", status: "Completed" },
      { c1: "WDL-2024-0013", c2: "Megha Singhal", sub: "Adm #1940", c3: "Class 6 - Section B", c4: "Distance & Commute Challenges", c5: "Pending 1 Library Book", c6: "₹15,000 (On Hold)", c7: "20 Sep 2024", badge: "badge-pending", status: "No Dues Pending" },
      { c1: "WDL-2024-0012", c2: "Aryan Oberoi", sub: "Adm #0482", c3: "Class 9 - Section A", c4: "Switched to IB World Board School", c5: "All Depts Cleared (100%)", c6: "₹15,000 (Refunded)", c7: "15 Sep 2024", badge: "badge-active", status: "Completed" },
      { c1: "WDL-2024-0011", c2: "Nandini Gupta", sub: "Adm #1049", c3: "Class 2 - Section B", c4: "Family Relocated to Singapore", c5: "All Depts Cleared (100%)", c6: "₹15,000 (Refunded)", c7: "10 Sep 2024", badge: "badge-active", status: "Completed" }
    ]
  },

  // 13. transfer-certificates.php
  {
    filename: 'transfer-certificates.php',
    title: 'Transfer Certificates (TC)',
    icon: 'bi-file-earmark-check-fill',
    isCertificatePage: true,
    actionBtnText: 'Generate Statutory TC',
    actionBtnIcon: 'bi-file-earmark-plus-fill',
    desc: 'CBSE Affiliation Bye-Laws compliant Transfer Certificate registry with QR code and counter-signatures',
    kpi1: { title: "TCs Dispatched", val: "18 Statutory TCs", trend: "100% Counter-Signed", icon: "bi-file-earmark-check", color: "kpi-success" },
    kpi2: { title: "DEO Counter-Sign", val: "18 Approved", trend: "Education Dept Validated", icon: "bi-patch-check-fill", color: "kpi-primary" },
    kpi3: { title: "Average Turnaround", val: "48 Hours", trend: "Post No-Dues Clearance", icon: "bi-stopwatch-fill", color: "kpi-info" },
    kpi4: { title: "QR Verifiable TCs", val: "100% Online", trend: "Public Board Portal Check", icon: "bi-qr-code", color: "kpi-warning" },
    filterPlaceholder: "Search TC #, student name, admission #, reason...",
    filterOptions: ["All Certificate Years", "Academic Session 2024-25", "Academic Session 2023-24", "Academic Session 2022-23"],
    statusFilterOptions: ["All Status", "Dispatched to Parent", "Counter-Signed Ready", "Draft TC"],
    headers: ["TC Serial #", "Student Full Name", "Admission #", "Date of Admission", "Date of Leaving", "Reason for Exit", "Conduct & Character", "Status"],
    rows: [
      { c1: "TC-2024-0018", c2: "Tushar Sengupta", sub: "Class 8-B", c3: "ADM-2021-1412", c4: "08 Apr 2021", c5: "18 Oct 2024", c6: "Parent Relocation to London", c7: "Exemplary & Diligent", badge: "badge-active", status: "Issued & Sealed" },
      { c1: "TC-2024-0017", c2: "Ananya Dixit", sub: "Class 5-A", c3: "ADM-2022-1912", c4: "05 Apr 2022", c5: "12 Oct 2024", c6: "Parent Relocation to Bengaluru", c7: "Very Good Conduct", badge: "badge-active", status: "Issued & Sealed" },
      { c1: "TC-2024-0016", c2: "Simran Kaur", sub: "Class 3-A", c3: "ADM-2023-1481", c4: "10 Apr 2023", c5: "01 Oct 2024", c6: "Shifted to Boarding School", c7: "Good Conduct", badge: "badge-active", status: "Issued & Sealed" },
      { c1: "TC-2024-0015", c2: "Aakash Chopra", sub: "Class 11-Comm", c3: "ADM-2019-0920", c4: "12 Apr 2019", c5: "25 Sep 2024", c6: "Competitive Exam Preparation", c7: "Exemplary Conduct", badge: "badge-active", status: "Issued & Sealed" },
      { c1: "TC-2024-0014", c2: "Aryan Oberoi", sub: "Class 9-A", c3: "ADM-2021-0482", c4: "15 Apr 2021", c5: "15 Sep 2024", c6: "Joining International IB School", c7: "Very Good Conduct", badge: "badge-active", status: "Issued & Sealed" },
      { c1: "TC-2024-0013", c2: "Nandini Gupta", sub: "Class 2-B", c3: "ADM-2023-1049", c4: "08 Apr 2023", c5: "10 Sep 2024", c6: "Parent Transfer to Singapore", c7: "Exemplary Conduct", badge: "badge-active", status: "Issued & Sealed" },
      { c1: "TC-2024-0012", c2: "Karan Malhotra", sub: "Class 10-A", c3: "ADM-2018-0812", c4: "10 Apr 2018", c5: "28 Aug 2024", c6: "Family Migration to Canada", c7: "Diligent & Helpful", badge: "badge-active", status: "Issued & Sealed" },
      { c1: "TC-2024-0011", c2: "Priya Sundaram", sub: "Class 7-C", c3: "ADM-2020-0419", c4: "14 Apr 2020", c5: "20 Aug 2024", c6: "Parent Relocation to Chennai", c7: "Very Good Conduct", badge: "badge-active", status: "Issued & Sealed" }
    ]
  },

  // 14. bonafide-certificates.php
  {
    filename: 'bonafide-certificates.php',
    title: 'Bonafide Certificates',
    icon: 'bi-patch-check-fill',
    isCertificatePage: true,
    actionBtnText: 'Issue Bonafide Certificate',
    actionBtnIcon: 'bi-patch-plus-fill',
    desc: 'Official bonafide verification documents for passport, visa, bank accounts, and concession applications',
    kpi1: { title: "Bonafides Issued", val: "384 Certificates", trend: "Instant Print Ready", icon: "bi-patch-check", color: "kpi-success" },
    kpi2: { title: "Passport & Visa", val: "182 Applications", trend: "MEA Format Compliant", icon: "bi-passport", color: "kpi-primary" },
    kpi3: { title: "Bank Minor Accounts", val: "124 Applications", trend: "RBI KYC Compliant", icon: "bi-bank", color: "kpi-info" },
    kpi4: { title: "Fee Concession / Govt", val: "78 Applications", trend: "Verified by Registrar", icon: "bi-award", color: "kpi-warning" },
    filterPlaceholder: "Search certificate #, student, father, purpose...",
    filterOptions: ["All Certificate Purposes", "Passport Application (MEA)", "Student Visa / Foreign Travel", "Minor Bank Account Opening", "Metro / Bus Pass Concession", "Scholarship / Olympiad"],
    statusFilterOptions: ["All Status", "Issued & Validated", "In Processing", "Revoked"],
    headers: ["Certificate #", "Student Full Name", "Father Name", "Grade & Section", "Certificate Purpose", "Issued By", "Issue Date", "Status"],
    rows: [
      { c1: "BNF-2024-0384", c2: "Aarav Sharma", sub: "Adm #001", c3: "Rajesh Sharma", c4: "Class 10 - Section A", c5: "Passport Renewal (MEA Format)", c6: "Dr. Ananya Roy (Principal)", c7: "28 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "BNF-2024-0383", c2: "Diya Patel", sub: "Adm #002", c3: "Bhavin Patel", c4: "Class 10 - Section A", c5: "UK Student Exchange Visa", c6: "Dr. Ananya Roy (Principal)", c7: "27 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "BNF-2024-0382", c2: "Vihaan Singh", sub: "Adm #003", c3: "Manpreet Singh", c4: "Class 10 - Section B", c5: "SBI Minor Savings Account", c6: "Registrar Office", c7: "26 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "BNF-2024-0381", c2: "Ananya Iyer", sub: "Adm #004", c3: "R. Venkatesh Iyer", c4: "Class 10 - Section B", c5: "HDFC Minor Savings Account", c6: "Registrar Office", c7: "25 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "BNF-2024-0380", c2: "Rohan Gupta", sub: "Adm #005", c3: "Sanjay Gupta", c4: "Class 12 - Science (PCM)", c5: "JEE Main Exam Verification", c6: "Dean Academics", c7: "24 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "BNF-2024-0379", c2: "Ishaan Verma", sub: "Adm #006", c3: "Dr. Alok Verma", c4: "Class 12 - Science (PCB)", c5: "NEET UG Exam Verification", c6: "Dean Academics", c7: "23 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "BNF-2024-0378", c2: "Meera Nambiar", sub: "Adm #007", c3: "K. R. Nambiar", c4: "Class 8 - Section C", c5: "National Science Olympiad", c6: "Registrar Office", c7: "22 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "BNF-2024-0377", c2: "Kabir Malhotra", sub: "Adm #008", c3: "Vikram Malhotra", c4: "Class 5 - Section A", c5: "Delhi Metro Student Pass Concession", c6: "Registrar Office", c7: "21 Oct 2024", badge: "badge-active", status: "Issued" }
    ]
  },

  // 15. character-certificates.php
  {
    filename: 'character-certificates.php',
    title: 'Character Certificates',
    icon: 'bi-award-fill',
    isCertificatePage: true,
    actionBtnText: 'Issue Character Certificate',
    actionBtnIcon: 'bi-award',
    desc: 'Moral conduct certifications, disciplinary testimonials, and leadership endorsements for graduating scholars',
    kpi1: { title: "Certificates Dispatched", val: "218 Endorsements", trend: "Senior Secondary Batch", icon: "bi-award", color: "kpi-success" },
    kpi2: { title: "Exemplary Conduct", val: "94.2% Scholars", trend: "Zero Disciplinary Flag", icon: "bi-star-fill", color: "kpi-primary" },
    kpi3: { title: "Student Council Mentions", val: "42 Prefects", trend: "Leadership Documented", icon: "bi-person-badge-fill", color: "kpi-info" },
    kpi4: { title: "University Admissions", val: "100% Accepted", trend: "DU, IIT, Foreign Unis", icon: "bi-mortarboard-fill", color: "kpi-warning" },
    filterPlaceholder: "Search certificate #, student, conduct remarks, session...",
    filterOptions: ["All Conduct Standards", "Exemplary & Outstanding", "Very Good Conduct", "Good Standing", "Prefect / Council Honour"],
    statusFilterOptions: ["All Status", "Signed by Principal", "Under Scrutiny", "Draft"],
    headers: ["Certificate #", "Student Full Name", "Academic Batch", "Conduct Remarks", "Co-curricular Honours", "Authorized Signatory", "Issue Date", "Status"],
    rows: [
      { c1: "CHR-2024-0218", c2: "Rohan Gupta", sub: "Adm #005", c3: "2023-2024 (Class 12)", c4: "Exemplary Moral Conduct & Diligence", c5: "Head Boy & Science Olympiad Gold", c6: "Dr. Ananya Roy (Principal)", c7: "28 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "CHR-2024-0217", c2: "Ishaan Verma", sub: "Adm #006", c3: "2023-2024 (Class 12)", c4: "Outstanding Conduct & Empathy", c5: "Captain - Football Team", c6: "Dr. Ananya Roy (Principal)", c7: "27 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "CHR-2024-0216", c2: "Aarav Sharma", sub: "Adm #001", c3: "2024-2025 (Class 10)", c4: "Very Good Standing & Helpful", c5: "Junior House Prefect - Agni", c6: "Dr. Ananya Roy (Principal)", c7: "26 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "CHR-2024-0215", c2: "Diya Patel", sub: "Adm #002", c3: "2024-2025 (Class 10)", c4: "Exemplary Conduct & High Integrity", c5: "Debating Society Secretary", c6: "Dr. Ananya Roy (Principal)", c7: "25 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "CHR-2024-0214", c2: "Prisha Nair", sub: "Adm #014", c3: "2023-2024 (Class 12)", c4: "Outstanding Dedication & Sincerity", c5: "Commerce Club President", c6: "Dr. Ananya Roy (Principal)", c7: "24 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "CHR-2024-0213", c2: "Arya Deshmukh", sub: "Adm #015", c3: "2024-2025 (Class 9)", c4: "Very Good Character & Punctuality", c5: "NCC Cadet Sergeant", c6: "Dr. Ananya Roy (Principal)", c7: "23 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "CHR-2024-0212", c2: "Zara Khan", sub: "Adm #018", c3: "2023-2024 (Class 12)", c4: "Exemplary Conduct & Leadership", c5: "Model United Nations Lead", c6: "Dr. Ananya Roy (Principal)", c7: "22 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "CHR-2024-0211", c2: "Tushar Sengupta", sub: "Adm #1412", c3: "2024-2025 (Class 8)", c4: "Good Standing During Enrollment", c5: "Robotics Club Member", c6: "Dr. Ananya Roy (Principal)", c7: "18 Oct 2024", badge: "badge-active", status: "Issued" }
    ]
  },

  // 16. study-certificates.php
  {
    filename: 'study-certificates.php',
    title: 'Study Certificates',
    icon: 'bi-mortarboard-fill',
    isCertificatePage: true,
    actionBtnText: 'Issue Study Certificate',
    actionBtnIcon: 'bi-file-earmark-medical',
    desc: 'Institutional tenure verification, medium of instruction certification, and CBSE board validation',
    kpi1: { title: "Certificates Dispatched", val: "192 Documents", trend: "Current & Past Scholars", icon: "bi-mortarboard", color: "kpi-success" },
    kpi2: { title: "Medium of Instruction", val: "100% English", trend: "CBSE English Medium", icon: "bi-translate", color: "kpi-primary" },
    kpi3: { title: "Domicile & Govt Quotas", val: "94 Applications", trend: "Certified for State Exams", icon: "bi-flag-fill", color: "kpi-info" },
    kpi4: { title: "Verification Turnaround", val: "Same Day", trend: "Instant Digital Signature", icon: "bi-lightning-charge-fill", color: "kpi-warning" },
    filterPlaceholder: "Search study certificate #, student, years, class...",
    filterOptions: ["All Tenure Ranges", "Enrolled 1 to 3 Years", "Enrolled 4 to 7 Years", "Full Tenure (Nursery to 12th)", "Single Academic Year"],
    statusFilterOptions: ["All Status", "Issued & Validated", "In Verification", "Draft"],
    headers: ["Certificate #", "Student Full Name", "Father / Guardian", "Class Duration", "Medium of Instruction", "Board Registration", "Issue Date", "Status"],
    rows: [
      { c1: "STD-2024-0192", c2: "Aarav Sharma", sub: "Adm #001", c3: "Rajesh Sharma", c4: "Class 1 to Class 10 (10 Years)", c5: "English Medium (CBSE)", c6: "CBSE Reg: 2130892/24", c7: "28 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "STD-2024-0191", c2: "Diya Patel", sub: "Adm #002", c3: "Bhavin Patel", c4: "Class 6 to Class 10 (5 Years)", c5: "English Medium (CBSE)", c6: "CBSE Reg: 2130892/25", c7: "27 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "STD-2024-0190", c2: "Vihaan Singh", sub: "Adm #003", c3: "Manpreet Singh", c4: "Class 9 to Class 10 (2 Years)", c5: "English Medium (CBSE)", c6: "CBSE Reg: 2130892/26", c7: "26 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "STD-2024-0189", c2: "Ananya Iyer", sub: "Adm #004", c3: "R. Venkatesh Iyer", c4: "Class 4 to Class 10 (7 Years)", c5: "English Medium (CBSE)", c6: "CBSE Reg: 2130892/27", c7: "25 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "STD-2024-0188", c2: "Rohan Gupta", sub: "Adm #005", c3: "Sanjay Gupta", c4: "Class 11 to Class 12 (2 Years)", c5: "English Medium (CBSE)", c6: "CBSE Reg: 2130892/28", c7: "24 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "STD-2024-0187", c2: "Ishaan Verma", sub: "Adm #006", c3: "Dr. Alok Verma", c4: "Class 11 to Class 12 (2 Years)", c5: "English Medium (CBSE)", c6: "CBSE Reg: 2130892/29", c7: "23 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "STD-2024-0186", c2: "Meera Nambiar", sub: "Adm #007", c3: "K. R. Nambiar", c4: "Class 8 (1 Year)", c5: "English Medium (CBSE)", c6: "CBSE Reg: 2130892/30", c7: "22 Oct 2024", badge: "badge-active", status: "Issued" },
      { c1: "STD-2024-0185", c2: "Kabir Malhotra", sub: "Adm #008", c3: "Vikram Malhotra", c4: "Nursery to Class 5 (6 Years)", c5: "English Medium (CBSE)", c6: "School Code: 70142", c7: "21 Oct 2024", badge: "badge-active", status: "Issued" }
    ]
  },

  // 17. student-history.php
  {
    filename: 'student-history.php',
    title: 'Student History',
    icon: 'bi-clock-history',
    actionBtnText: 'Record Timeline Event',
    actionBtnIcon: 'bi-plus-circle',
    desc: 'Complete chronological lifecycle log: Admission milestones, grade progression, house awards, and disciplinary history',
    kpi1: { title: "Milestones Tracked", val: "18,420 Events", trend: "Comprehensive Student Journey", icon: "bi-calendar2-range-fill", color: "kpi-primary" },
    kpi2: { title: "Merit & Honors", val: "1,240 Awards", trend: "Academic, Sports & Cultural", icon: "bi-trophy-fill", color: "kpi-success" },
    kpi3: { title: "House Points Mapped", val: "4 Houses Active", trend: "Agni, Prithvi, Vayu, Akash", icon: "bi-flag-fill", color: "kpi-info" },
    kpi4: { title: "Audit Trail Integrity", val: "100% Immutable", trend: "Non-editable System Ledger", icon: "bi-shield-lock-fill", color: "kpi-warning" },
    filterPlaceholder: "Search event ID, student, event category, class...",
    filterOptions: ["All Event Categories", "Academic Milestone (Admissions/Promotion)", "Merit Award & Olympiad Victory", "Co-Curricular / Sports Achievement", "House Leadership & Appointment", "Infirmary & Health Incident"],
    statusFilterOptions: ["All Status", "Verified Milestone", "Document Attached", "Archived"],
    headers: ["Event UID", "Student Full Name", "Event Category", "Class / Year", "Milestone / Event Details", "Recorded By", "Event Date", "Status"],
    rows: [
      { c1: "EVT-2024-9481", c2: "Aarav Sharma", sub: "Adm #001", c3: "Academic Promotion", c4: "Class 10 (2024-25)", c5: "Promoted to Class 10 with 94.6% Aggregate Score", c6: "Mrs. Sunita Kaul (Class Teacher)", c7: "01 Jul 2024", badge: "badge-active", status: "Verified" },
      { c1: "EVT-2024-9480", c2: "Diya Patel", sub: "Adm #002", c3: "Co-Curricular Honor", c4: "Class 10 (2024-25)", c5: "Won 1st Prize in Inter-School Debate Championship", c6: "Cultural Head", c7: "18 Aug 2024", badge: "badge-active", status: "Verified" },
      { c1: "EVT-2024-9479", c2: "Vihaan Singh", sub: "Adm #003", c3: "Sports Achievement", c4: "Class 10 (2024-25)", c5: "Selected for CBSE National Athletics Meet (400m)", c6: "Physical Education HOD", c7: "05 Sep 2024", badge: "badge-active", status: "Verified" },
      { c1: "EVT-2024-9478", c2: "Ananya Iyer", sub: "Adm #004", c3: "House Appointment", c4: "Class 10 (2024-25)", c5: "Appointed as Junior House Captain (Vayu House)", c6: "Principal Office", c7: "15 Jul 2024", badge: "badge-active", status: "Verified" },
      { c1: "EVT-2024-9477", c2: "Rohan Gupta", sub: "Adm #005", c3: "Olympiad Honor", c4: "Class 12 (2024-25)", c5: "National Top 1% in National Standard Exam in Physics", c6: "Science Department", c7: "12 Oct 2024", badge: "badge-active", status: "Verified" },
      { c1: "EVT-2024-9476", c2: "Ishaan Verma", sub: "Adm #006", c3: "Sports Leadership", c4: "Class 12 (2024-25)", c5: "Captained School Football Team to Zonal Victory", c6: "Sports Department", c7: "20 Sep 2024", badge: "badge-active", status: "Verified" },
      { c1: "EVT-2024-9475", c2: "Meera Nambiar", sub: "Adm #007", c3: "Fresh Admission", c4: "Class 8 (2024-25)", c5: "Enrolled in Class 8 from The Shri Ram School", c6: "Registrar Office", c7: "24 Apr 2024", badge: "badge-active", status: "Verified" },
      { c1: "EVT-2024-9474", c2: "Kabir Malhotra", sub: "Adm #008", c3: "Art & Creativity", c4: "Class 5 (2024-25)", c5: "Artwork selected for Annual CBSE Heritage Calendar", c6: "Fine Arts HOD", c7: "14 Oct 2024", badge: "badge-active", status: "Verified" }
    ]
  },

  // 18. alumni.php
  {
    filename: 'alumni.php',
    title: 'Alumni Management',
    icon: 'bi-mortarboard',
    actionBtnText: 'Register Alumni Scholar',
    actionBtnIcon: 'bi-person-plus',
    desc: 'Graduated scholar registry, higher education university placements, career tracking, and alumni chapter events',
    kpi1: { title: "Alumni Registered", val: "1,840 Scholars", trend: "Batches 2014 to 2024", icon: "bi-mortarboard-fill", color: "kpi-primary" },
    kpi2: { title: "Tier-1 Placements", val: "482 Scholars", trend: "IIT, AIIMS, IIM, BITS, SRCC", icon: "bi-trophy-fill", color: "kpi-success" },
    kpi3: { title: "Global Universities", val: "184 Abroad", trend: "MIT, Oxford, Stanford, NUS", icon: "bi-globe2", color: "kpi-info" },
    kpi4: { title: "Mentorship Network", val: "148 Active Mentors", trend: "Guiding Current Grade 12s", icon: "bi-people-fill", color: "kpi-warning" },
    filterPlaceholder: "Search alumni, passing batch, college, designation, city...",
    filterOptions: ["All Graduating Batches", "Batch 2024 (Class 12)", "Batch 2023 (Class 12)", "Batch 2022 (Class 12)", "Batch 2021 (Class 12)", "Batches 2015 - 2020"],
    statusFilterOptions: ["All Status", "Verified Alumni Profile", "Mentor Registered", "Contact Update Req"],
    headers: ["Alumni ID", "Scholar Full Name", "Graduation Batch", "Board Exam Score", "Higher Education Institute", "Current Designation / Role", "City & Country", "Status"],
    rows: [
      { c1: "ALM-2024-001", c2: "Siddharth Nambiar", sub: "Batch 2024", c3: "Class 12 - PCM (2024)", c4: "98.4% (CBSE Topper)", c5: "IIT Delhi (Computer Science)", c6: "B.Tech Undergraduate Scholar", c7: "New Delhi, India", badge: "badge-active", status: "Active Mentor" },
      { c1: "ALM-2024-002", c2: "Ananya Saxena", sub: "Batch 2024", c3: "Class 12 - PCB (2024)", c4: "97.8% (NEET Rank #84)", c5: "AIIMS New Delhi (MBBS)", c6: "Medical Student (1st Year)", c7: "New Delhi, India", badge: "badge-active", status: "Active Mentor" },
      { c1: "ALM-2023-014", c2: "Varun Malhotra", sub: "Batch 2023", c3: "Class 12 - Commerce (2023)", c4: "97.2% (SRCC Admit)", c5: "Shri Ram College of Commerce (SRCC)", c6: "B.Com (Hons) / Finance Intern", c7: "New Delhi, India", badge: "badge-active", status: "Active Mentor" },
      { c1: "ALM-2023-018", c2: "Kriti Sengupta", sub: "Batch 2023", c3: "Class 12 - Humanities (2023)", c4: "98.0% (Psychology Top)", c5: "Lady Shri Ram College (LSR)", c6: "BA Psychology / Content Lead", c7: "New Delhi, India", badge: "badge-active", status: "Verified" },
      { c1: "ALM-2022-042", c2: "Arjun Singhal", sub: "Batch 2022", c3: "Class 12 - PCM (2022)", c4: "96.4% (BITS Pilani)", c5: "BITS Pilani (Electrical Engg)", c6: "Hardware Systems Engineering Intern", c7: "Pilani / Bengaluru", badge: "badge-active", status: "Active Mentor" },
      { c1: "ALM-2021-088", c2: "Rhea Deshmukh", sub: "Batch 2021", c3: "Class 12 - Humanities (2021)", c4: "96.8% (NLSIU Admit)", c5: "National Law School (NLSIU)", c6: "Corporate Law Associate (Intern)", c7: "Bengaluru, India", badge: "badge-active", status: "Verified" },
      { c1: "ALM-2020-104", c2: "Devansh Mehra", sub: "Batch 2020", c3: "Class 12 - PCM (2020)", c4: "97.0% (Foreign Scholar)", c5: "University of California, Berkeley", c6: "AI Research Scientist at Google", c7: "San Francisco, USA", badge: "badge-active", status: "Global Chapter" },
      { c1: "ALM-2019-142", c2: "Pooja Hegde", sub: "Batch 2019", c3: "Class 12 - PCB (2019)", c4: "95.6% (London Admit)", c5: "Imperial College London", c6: "Biotechnology Consultant at McKinsey", c7: "London, UK", badge: "badge-active", status: "Global Chapter" }
    ]
  },

  // 19. student-status.php
  {
    filename: 'student-status.php',
    title: 'Student Status',
    icon: 'bi-toggle-on',
    actionBtnText: 'Update Status Roster',
    actionBtnIcon: 'bi-arrow-repeat',
    desc: 'Real-time student lifecycle states: Active, Extended Leave, Suspended, Detained, or Dispatched TC',
    kpi1: { title: "Active Enrolled", val: "2,840 Scholars", trend: "Current Academic Term", icon: "bi-check-circle-fill", color: "kpi-success" },
    kpi2: { title: "On Medical Leave", val: "14 Scholars", trend: "Pediatric Leave Approved", icon: "bi-hospital-fill", color: "kpi-info" },
    kpi3: { title: "Suspended / Disciplinary", val: "2 Scholars", trend: "Under Committee Review", icon: "bi-exclamation-octagon-fill", color: "kpi-danger" },
    kpi4: { title: "TC Issued & Exited", val: "18 Scholars", trend: "Completed Academic Exit", icon: "bi-box-arrow-right", color: "kpi-warning" },
    filterPlaceholder: "Search student, admission #, class, status...",
    filterOptions: ["All Lifecycle States", "Active & Attending", "Approved Long Leave (Medical)", "Special Learning Needs Leave", "Disciplinary Suspension", "Transferred / TC Issued"],
    statusFilterOptions: ["All Status", "Active", "On Leave", "Suspended", "TC Dispatched"],
    headers: ["Admission #", "Student Full Name", "Grade & Section", "Current Lifecycle Status", "Status Reason / Order", "Effective From", "Officer Authorizing", "Status"],
    rows: [
      { c1: "ADM-2024-001", c2: "Aarav Sharma", sub: "Roll #01", c3: "Class 10 - Section A", c4: "Active & Attending Daily", c5: "Regular Student Roster", c6: "01 Jul 2024", c7: "Class Teacher", badge: "badge-active", status: "Active" },
      { c1: "ADM-2024-002", c2: "Diya Patel", sub: "Roll #02", c3: "Class 10 - Section A", c4: "Active & Attending Daily", c5: "Regular Student Roster", c6: "01 Jul 2024", c7: "Class Teacher", badge: "badge-active", status: "Active" },
      { c1: "ADM-2024-003", c2: "Vihaan Singh", sub: "Roll #01", c3: "Class 10 - Section B", c4: "Active & Attending Daily", c5: "Regular Student Roster", c6: "01 Jul 2024", c7: "Class Teacher", badge: "badge-active", status: "Active" },
      { c1: "ADM-2024-004", c2: "Ananya Iyer", sub: "Roll #02", c3: "Class 10 - Section B", c4: "Active & Attending Daily", c5: "Regular Student Roster", c6: "01 Jul 2024", c7: "Class Teacher", badge: "badge-active", status: "Active" },
      { c1: "ADM-2024-005", c2: "Rohan Gupta", sub: "Roll #05", c3: "Class 12 - Science (PCM)", c4: "Active & Attending Daily", c5: "Regular Student Roster", c6: "01 Jul 2024", c7: "Class Teacher", badge: "badge-active", status: "Active" },
      { c1: "ADM-2024-006", c2: "Ishaan Verma", sub: "Roll #08", c3: "Class 12 - Science (PCB)", c4: "Active & Attending Daily", c5: "Regular Student Roster", c6: "01 Jul 2024", c7: "Class Teacher", badge: "badge-active", status: "Active" },
      { c1: "ADM-2024-007", c2: "Karan Saxena", sub: "Roll #24", c3: "Class 9 - Section C", c4: "Medical Leave (Dengue Recovery)", c5: "Infirmary Approved (10 Days)", c6: "20 Oct 2024", c7: "Dr. Sunita Kapoor", badge: "badge-pending", status: "On Leave" },
      { c1: "ADM-2024-008", c2: "Tushar Sengupta", sub: "Roll #18", c3: "Class 8 - Section B", c4: "Transferred & TC Dispatched", c5: "Parent Overseas Relocation", c6: "18 Oct 2024", c7: "Dr. Ananya Roy (Principal)", badge: "badge-inactive", status: "TC Dispatched" }
    ]
  }
];

// -------------------------------------------------------------
// 1. GENERATE TABLE SUBMODULES
// -------------------------------------------------------------
let count = 0;
for (const d of submodules) {
  const filePath = path.join(STUDENTS_DIR, d.filename);
  const content = generateTablePage(d);
  fs.writeFileSync(filePath, content, 'utf8');
  count++;
  console.log(`[GENERATED] students/${d.filename} (${d.title})`);
}

// -------------------------------------------------------------
// 2. BESPOKE STUDENT DASHBOARD (dashboard.php)
// -------------------------------------------------------------
const dashboardPath = path.join(STUDENTS_DIR, 'dashboard.php');
const dashboardContent = `<?php
/**
 * EDUSYS PRO - STUDENT INFORMATION SYSTEM (SIS) DASHBOARD
 * Command center for institutional student enrollment, wing distribution, and compliance
 */
$page_title = "Student Dashboard";
$page_desc = "Central executive oversight for 2,840 enrolled scholars, demographics, and statutory CBSE compliance";
$active_module = "students";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/students/dashboard.php'); ?>">Student Information System</a></li>
      <li class="breadcrumb-item active" aria-current="page">Student Dashboard</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-speedometer2 text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/students/student-directory.php'); ?>" class="btn btn-light border">
      <i class="bi bi-people me-1"></i> Directory
    </a>
    <a href="<?php echo base_url('modules/students/add-student.php'); ?>" class="btn btn-primary fw-bold">
      <i class="bi bi-person-plus-fill me-1"></i> Add Student
    </a>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Total Enrolled</h6>
        <div class="kpi-value">2,840</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> 100% Roster Synced</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-backpack-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Boys vs Girls</h6>
        <div class="kpi-value">1,480 / 1,360</div>
        <div class="kpi-trend positive"><i class="bi bi-gender-ambiguous"></i> 52:48 Healthy Ratio</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-people-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>APAAR One-Nation-ID</h6>
        <div class="kpi-value">99.4%</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 2,822 of 2,840 Linked</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-fingerprint"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Present Today</h6>
        <div class="kpi-value">96.2%</div>
        <div class="kpi-trend positive"><i class="bi bi-calendar-check"></i> 2,732 in Attendance</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-check-fill"></i></div>
    </div>
  </div>
</div>

<!-- Wing Distribution & Quick Overview -->
<div class="row g-4 mb-4">
  <div class="col-lg-8">
    <div class="card border-0 shadow-sm p-4 h-100">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-pie-chart text-primary me-2"></i>Institutional Wing Capacity & Enrollment</h5>
        <span class="badge bg-light text-primary border">Session 2024-2025</span>
      </div>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 font-size-13">
          <thead class="table-light">
            <tr>
              <th>School Wing</th>
              <th>Classes</th>
              <th>Sections</th>
              <th>Enrolled</th>
              <th>Capacity</th>
              <th>Occupancy %</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-primary me-2 font-size-10"></i>Pre-Primary Wing</td>
              <td>Nursery, KG, Prep</td>
              <td>12 Sections</td>
              <td>340</td>
              <td>360 Seats</td>
              <td><span class="badge bg-success-subtle text-success">94.4% Full</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-success me-2 font-size-10"></i>Primary Wing</td>
              <td>Classes 1 to 5</td>
              <td>20 Sections</td>
              <td>820</td>
              <td>800 Seats</td>
              <td><span class="badge bg-danger-subtle text-danger">102.5% (Full)</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-info me-2 font-size-10"></i>Middle Wing</td>
              <td>Classes 6 to 8</td>
              <td>16 Sections</td>
              <td>680</td>
              <td>680 Seats</td>
              <td><span class="badge bg-success-subtle text-success">100% Optimum</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-warning me-2 font-size-10"></i>Secondary Wing</td>
              <td>Classes 9 & 10</td>
              <td>14 Sections</td>
              <td>560</td>
              <td>560 Seats</td>
              <td><span class="badge bg-success-subtle text-success">100% Optimum</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-circle-fill text-purple me-2 font-size-10" style="color: #6f42c1;"></i>Senior Secondary</td>
              <td>Classes 11 & 12 (PCM/PCB/Comm/Hum)</td>
              <td>10 Sections</td>
              <td>440</td>
              <td>450 Seats</td>
              <td><span class="badge bg-info-subtle text-info">97.7% Full</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card border-0 shadow-sm p-4 h-100">
      <h5 class="fw-bold mb-3 text-dark"><i class="bi bi-shield-check text-success me-2"></i>Statutory Compliance</h5>
      <ul class="list-group list-group-flush font-size-13">
        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
          <div>
            <strong>CBSE LOC (Class 10 & 12)</strong>
            <div class="text-muted font-size-11">420 Board candidates registered</div>
          </div>
          <span class="badge bg-success"><i class="bi bi-check-lg"></i> Synced</span>
        </li>
        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
          <div>
            <strong>UDISE+ Government Portal</strong>
            <div class="text-muted font-size-11">Student National Code (PEN)</div>
          </div>
          <span class="badge bg-success"><i class="bi bi-check-lg"></i> 100% Filed</span>
        </li>
        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
          <div>
            <strong>APAAR / DigiLocker Registry</strong>
            <div class="text-muted font-size-11">Ministry of Education e-KYC</div>
          </div>
          <span class="badge bg-primary">99.4% Valid</span>
        </li>
        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
          <div>
            <strong>RTE 25% EWS/DG Quota</strong>
            <div class="text-muted font-size-11">710 Free seats validated</div>
          </div>
          <span class="badge bg-success"><i class="bi bi-check-lg"></i> Compliant</span>
        </li>
      </ul>
      <div class="mt-auto pt-3">
        <a href="<?php echo base_url('modules/students/documents.php'); ?>" class="btn btn-outline-primary btn-sm w-100">
          <i class="bi bi-folder-check me-1"></i> Open Documents Locker
        </a>
      </div>
    </div>
  </div>
</div>

<!-- House Distribution Cards -->
<div class="row g-3 mb-4">
  <div class="col-md-3">
    <div class="p-3 bg-white rounded-3 border-start border-4 border-danger shadow-sm">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted fw-bold">AGNI HOUSE</small>
          <h4 class="fw-bold mb-0 text-dark">712 Scholars</h4>
        </div>
        <div class="fs-3 text-danger"><i class="bi bi-fire"></i></div>
      </div>
      <small class="text-muted">Captain: Rohan Gupta (12-PCM)</small>
    </div>
  </div>
  <div class="col-md-3">
    <div class="p-3 bg-white rounded-3 border-start border-4 border-success shadow-sm">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted fw-bold">PRITHVI HOUSE</small>
          <h4 class="fw-bold mb-0 text-dark">708 Scholars</h4>
        </div>
        <div class="fs-3 text-success"><i class="bi bi-globe-americas"></i></div>
      </div>
      <small class="text-muted">Captain: Diya Patel (10-A)</small>
    </div>
  </div>
  <div class="col-md-3">
    <div class="p-3 bg-white rounded-3 border-start border-4 border-info shadow-sm">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted fw-bold">VAYU HOUSE</small>
          <h4 class="fw-bold mb-0 text-dark">715 Scholars</h4>
        </div>
        <div class="fs-3 text-info"><i class="bi bi-wind"></i></div>
      </div>
      <small class="text-muted">Captain: Ananya Iyer (10-B)</small>
    </div>
  </div>
  <div class="col-md-3">
    <div class="p-3 bg-white rounded-3 border-start border-4 border-primary shadow-sm">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted fw-bold">AKASH HOUSE</small>
          <h4 class="fw-bold mb-0 text-dark">705 Scholars</h4>
        </div>
        <div class="fs-3 text-primary"><i class="bi bi-cloud-sun"></i></div>
      </div>
      <small class="text-muted">Captain: Vihaan Singh (10-B)</small>
    </div>
  </div>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
`;
fs.writeFileSync(dashboardPath, dashboardContent, 'utf8');
count++;
console.log(`[GENERATED] students/dashboard.php (Student Dashboard)`);

// -------------------------------------------------------------
// 3. BESPOKE ADD STUDENT MULTI-STEP (add-student.php)
// -------------------------------------------------------------
const addStudentPath = path.join(STUDENTS_DIR, 'add-student.php');
const addStudentContent = `<?php
/**
 * EDUSYS PRO - ADD STUDENT MULTI-STEP WIZARD
 * Comprehensive student onboarding form complying with CBSE OASIS & UDISE+ standards
 */
$page_title = "Add Student (Multi-Step)";
$page_desc = "Standardized multi-step scholar onboarding wizard with Aadhaar, APAAR ID, and document locker upload";
$active_module = "students";
$active_submodule = "add-student.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/students/dashboard.php'); ?>">Student Information System</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-person-plus-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/students/student-directory.php'); ?>" class="btn btn-light border">
      <i class="bi bi-arrow-left me-1"></i> Student Directory
    </a>
    <button class="btn btn-primary fw-bold" onclick="alert('Student Profile Saved as Draft!')">
      <i class="bi bi-save me-1"></i> Save Draft
    </button>
  </div>
</div>

<!-- Multi-Step Form Card -->
<div class="card border-0 shadow-sm p-4 mb-4">
  <!-- Stepper Tabs Header -->
  <ul class="nav nav-pills nav-fill mb-4 p-2 bg-light rounded-3" id="studentWizardTabs" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active fw-bold py-2 font-size-13" id="step1-tab" data-bs-toggle="pill" data-bs-target="#step1" type="button" role="tab">
        <i class="bi bi-person me-1"></i> 1. General & Identity
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link fw-bold py-2 font-size-13" id="step2-tab" data-bs-toggle="pill" data-bs-target="#step2" type="button" role="tab">
        <i class="bi bi-people me-1"></i> 2. Parents & Guardians
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link fw-bold py-2 font-size-13" id="step3-tab" data-bs-toggle="pill" data-bs-target="#step3" type="button" role="tab">
        <i class="bi bi-building me-1"></i> 3. Academic & Previous TC
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link fw-bold py-2 font-size-13" id="step4-tab" data-bs-toggle="pill" data-bs-target="#step4" type="button" role="tab">
        <i class="bi bi-folder-check me-1"></i> 4. Health & Documents
      </button>
    </li>
  </ul>

  <!-- Tab Contents -->
  <form id="addStudentMultiStepForm" onsubmit="event.preventDefault(); alert('Student Enrolled Successfully with Scholar #ADM-2024-009!'); window.location.href='student-directory.php';">
    <div class="tab-content" id="studentWizardTabContent">
      
      <!-- STEP 1: General & Identity -->
      <div class="tab-pane fade show active" id="step1" role="tabpanel">
        <h6 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="bi bi-person-vcard text-primary me-2"></i>Scholastic & Demographic Information</h6>
        <div class="row g-3">
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">Admission # <span class="text-danger">*</span></label>
            <input type="text" class="form-control" value="ADM-2024-009" readonly>
          </div>
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">First Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Enter first name" required>
          </div>
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">Last Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Enter last name" required>
          </div>
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">Date of Birth <span class="text-danger">*</span></label>
            <input type="date" class="form-control" required>
          </div>
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">Gender <span class="text-danger">*</span></label>
            <select class="form-select" required>
              <option value="">Select Gender</option>
              <option>Male</option>
              <option>Female</option>
              <option>Other</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">Blood Group</label>
            <select class="form-select">
              <option>A+ Positive</option>
              <option>A- Negative</option>
              <option>B+ Positive</option>
              <option>B- Negative</option>
              <option>O+ Positive</option>
              <option>O- Negative</option>
              <option>AB+ Positive</option>
              <option>AB- Negative</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">Social Category (CBSE)</label>
            <select class="form-select">
              <option>General</option>
              <option>OBC (Other Backward Class)</option>
              <option>SC (Scheduled Caste)</option>
              <option>ST (Scheduled Tribe)</option>
              <option>EWS / DG Quota</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">Aadhaar Card UID</label>
            <input type="text" class="form-control" placeholder="12-digit UIDAI number">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">APAAR ID (One Nation One ID)</label>
            <input type="text" class="form-control" placeholder="e.g. 8499 1048 2910">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">Target Grade <span class="text-danger">*</span></label>
            <select class="form-select" required>
              <option>Class 10 - Secondary</option>
              <option>Class 11 - Science (PCM)</option>
              <option>Class 11 - Commerce</option>
              <option>Class 6 - Middle Wing</option>
              <option>Class 1 - Primary Wing</option>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">Allocated Section</label>
            <select class="form-select">
              <option>Section A</option>
              <option>Section B</option>
              <option>Section C</option>
            </select>
          </div>
        </div>
        <div class="d-flex justify-content-end mt-4">
          <button type="button" class="btn btn-primary px-4 fw-bold" onclick="document.getElementById('step2-tab').click();">
            Next: Parents Details <i class="bi bi-arrow-right ms-1"></i>
          </button>
        </div>
      </div>

      <!-- STEP 2: Parents & Guardians -->
      <div class="tab-pane fade" id="step2" role="tabpanel">
        <h6 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="bi bi-people text-primary me-2"></i>Parent & Guardian Details</h6>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label font-size-12 fw-bold text-muted">Father's Full Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Enter father full name">
          </div>
          <div class="col-md-6">
            <label class="form-label font-size-12 fw-bold text-muted">Father's Occupation</label>
            <input type="text" class="form-control" placeholder="Profession / Organization">
          </div>
          <div class="col-md-6">
            <label class="form-label font-size-12 fw-bold text-muted">Mother's Full Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Enter mother full name">
          </div>
          <div class="col-md-6">
            <label class="form-label font-size-12 fw-bold text-muted">Mother's Occupation</label>
            <input type="text" class="form-control" placeholder="Profession / Organization">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">Primary Contact Mobile <span class="text-danger">*</span></label>
            <input type="tel" class="form-control" placeholder="+91 98XXX XXXXX">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">Parent Email Address</label>
            <input type="email" class="form-control" placeholder="parent@domain.com">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">Annual Household Income</label>
            <select class="form-select">
              <option>Above ₹15 Lakhs</option>
              <option>₹8 - ₹15 Lakhs</option>
              <option>₹5 - ₹8 Lakhs</option>
              <option>Below ₹5 Lakhs</option>
            </select>
          </div>
          <div class="col-12">
            <label class="form-label font-size-12 fw-bold text-muted">Residential Postal Address <span class="text-danger">*</span></label>
            <textarea class="form-control" rows="2" placeholder="House #, Street, Locality, City, State, Pin Code"></textarea>
          </div>
        </div>
        <div class="d-flex justify-content-between mt-4">
          <button type="button" class="btn btn-light border" onclick="document.getElementById('step1-tab').click();">
            <i class="bi bi-arrow-left me-1"></i> Back to Step 1
          </button>
          <button type="button" class="btn btn-primary px-4 fw-bold" onclick="document.getElementById('step3-tab').click();">
            Next: Academic & Previous TC <i class="bi bi-arrow-right ms-1"></i>
          </button>
        </div>
      </div>

      <!-- STEP 3: Academic & Previous TC -->
      <div class="tab-pane fade" id="step3" role="tabpanel">
        <h6 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="bi bi-building text-primary me-2"></i>Prior School & Academic Transcript</h6>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label font-size-12 fw-bold text-muted">Previous School Name</label>
            <input type="text" class="form-control" placeholder="e.g. Delhi Public School">
          </div>
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">Affiliation Board</label>
            <select class="form-select">
              <option>CBSE (Central Board)</option>
              <option>ICSE / ISC Board</option>
              <option>State Education Board</option>
              <option>IB / Cambridge International</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">Last Grade Passed</label>
            <input type="text" class="form-control" placeholder="e.g. Class 9 Passed">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">Transfer Certificate (TC) Serial #</label>
            <input type="text" class="form-control" placeholder="e.g. TC-DPS-9481">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">TC Date of Issue</label>
            <input type="date" class="form-control">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">TC Counter-Signed Status</label>
            <select class="form-select">
              <option>Yes, Counter-signed by Education Officer</option>
              <option>Pending Counter-signature (30-day window)</option>
              <option>N/A (Direct Entry / Nursery)</option>
            </select>
          </div>
        </div>
        <div class="d-flex justify-content-between mt-4">
          <button type="button" class="btn btn-light border" onclick="document.getElementById('step2-tab').click();">
            <i class="bi bi-arrow-left me-1"></i> Back to Step 2
          </button>
          <button type="button" class="btn btn-primary px-4 fw-bold" onclick="document.getElementById('step4-tab').click();">
            Next: Health & Documents <i class="bi bi-arrow-right ms-1"></i>
          </button>
        </div>
      </div>

      <!-- STEP 4: Health & Documents -->
      <div class="tab-pane fade" id="step4" role="tabpanel">
        <h6 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="bi bi-folder-check text-primary me-2"></i>Medical Alerts & Document Uploads</h6>
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">Emergency Hotline Contact</label>
            <input type="tel" class="form-control" placeholder="+91 98XXX XXXXX">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">Preferred Hospital / Clinic</label>
            <input type="text" class="form-control" placeholder="e.g. Manipal Hospital">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">Medical Alerts / Allergies</label>
            <input type="text" class="form-control" placeholder="e.g. Asthma Inhaler, Peanut Allergy">
          </div>
          <div class="col-md-6">
            <label class="form-label font-size-12 fw-bold text-muted">Upload Birth Certificate (PDF/JPG)</label>
            <input type="file" class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label font-size-12 fw-bold text-muted">Upload Transfer Certificate (TC)</label>
            <input type="file" class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label font-size-12 fw-bold text-muted">Upload Aadhaar Card / ID Proof</label>
            <input type="file" class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label font-size-12 fw-bold text-muted">Upload Passport Photograph</label>
            <input type="file" class="form-control">
          </div>
        </div>
        <div class="d-flex justify-content-between mt-4">
          <button type="button" class="btn btn-light border" onclick="document.getElementById('step3-tab').click();">
            <i class="bi bi-arrow-left me-1"></i> Back to Step 3
          </button>
          <button type="submit" class="btn btn-success px-5 fw-bold shadow-sm">
            <i class="bi bi-check-circle-fill me-1"></i> Complete Enrollment
          </button>
        </div>
      </div>

    </div>
  </form>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
`;
fs.writeFileSync(addStudentPath, addStudentContent, 'utf8');
count++;
console.log(`[GENERATED] students/add-student.php (Add Student Multi-Step)`);

// -------------------------------------------------------------
// 4. BESPOKE STUDENT PROFILE 360° (student-profile.php)
// -------------------------------------------------------------
const studentProfilePath = path.join(STUDENTS_DIR, 'student-profile.php');
const studentProfileContent = `<?php
/**
 * EDUSYS PRO - STUDENT PROFILE 360°
 * Comprehensive 360-degree holistic dossier for active scholars
 */
$page_title = "Student Profile 360°";
$page_desc = "Holistic 360-degree student record: Academics, attendance logs, fee clearances, and co-curricular awards";
$active_module = "students";
$active_submodule = "student-profile.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/students/dashboard.php'); ?>">Student Information System</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-person-bounding-box text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/students/student-directory.php'); ?>" class="btn btn-light border">
      <i class="bi bi-people me-1"></i> Directory
    </a>
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Dossier">
      <i class="bi bi-printer me-1"></i> Print Dossier
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#editRecordModal">
      <i class="bi bi-pencil-square me-1"></i> Edit Dossier
    </button>
  </div>
</div>

<!-- Student Header Card -->
<div class="card border-0 shadow-sm p-4 mb-4">
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
    <div class="d-flex align-items-center gap-3">
      <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold fs-2" style="width: 80px; height: 80px;">
        AS
      </div>
      <div>
        <h4 class="fw-bold mb-1 text-dark">Aarav Sharma <span class="badge bg-success-subtle text-success border font-size-12">Active Scholar</span></h4>
        <div class="text-muted font-size-13">
          <span class="me-3"><strong>Scholar #:</strong> ADM-2024-001</span>
          <span class="me-3"><strong>Grade:</strong> Class 10 - Section A</span>
          <span class="me-3"><strong>Roll #:</strong> 01</span>
          <span><strong>House:</strong> <span class="text-danger fw-bold">Agni House</span></span>
        </div>
      </div>
    </div>
    <div class="d-flex gap-2">
      <div class="text-end">
        <small class="text-muted d-block">APAAR ID (MoE One ID)</small>
        <span class="font-mono fw-bold text-primary">8491 2049 1042</span>
      </div>
    </div>
  </div>
</div>

<!-- Profile Tabs -->
<div class="card border-0 shadow-sm p-4 mb-4">
  <ul class="nav nav-tabs font-size-14 fw-bold mb-4" id="profileTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab">
        <i class="bi bi-info-circle me-1"></i> Personal & Parents
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="academics-tab" data-bs-toggle="tab" data-bs-target="#academics" type="button" role="tab">
        <i class="bi bi-mortarboard me-1"></i> Academic Performance
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="attendance-tab" data-bs-toggle="tab" data-bs-target="#attendance" type="button" role="tab">
        <i class="bi bi-calendar-check me-1"></i> Attendance Log (96.4%)
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents" type="button" role="tab">
        <i class="bi bi-folder-check me-1"></i> Documents Locker (4)
      </button>
    </li>
  </ul>

  <div class="tab-content" id="profileTabContent">
    <!-- Overview Tab -->
    <div class="tab-pane fade show active" id="overview" role="tabpanel">
      <div class="row g-4">
        <div class="col-md-6">
          <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">Student Demographics</h6>
          <table class="table table-sm table-borderless font-size-13">
            <tr><td class="text-muted" width="40%">Date of Birth:</td><td class="fw-semibold">14 May 2009 (15 Years)</td></tr>
            <tr><td class="text-muted">Gender:</td><td class="fw-semibold">Male</td></tr>
            <tr><td class="text-muted">Blood Group:</td><td class="fw-semibold text-danger">B+ Positive</td></tr>
            <tr><td class="text-muted">Social Category:</td><td class="fw-semibold">General Category</td></tr>
            <tr><td class="text-muted">Mother Tongue:</td><td class="fw-semibold">Hindi & English</td></tr>
            <tr><td class="text-muted">Emergency Hotline:</td><td class="fw-semibold font-mono text-primary">+91 98112 34567</td></tr>
          </table>
        </div>
        <div class="col-md-6">
          <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">Family & Guardians</h6>
          <table class="table table-sm table-borderless font-size-13">
            <tr><td class="text-muted" width="40%">Father's Name:</td><td class="fw-semibold">Rajesh Sharma (Sr. Director, IT)</td></tr>
            <tr><td class="text-muted">Mother's Name:</td><td class="fw-semibold">Poonam Sharma (Professor)</td></tr>
            <tr><td class="text-muted">Primary Phone:</td><td class="fw-semibold font-mono">+91 98112 34567</td></tr>
            <tr><td class="text-muted">Email:</td><td class="fw-semibold">rajesh.sharma@gmail.com</td></tr>
            <tr><td class="text-muted">Residential Address:</td><td class="fw-semibold">Sector 14, Knowledge City, Dwarka, New Delhi</td></tr>
          </table>
        </div>
      </div>
    </div>

    <!-- Academics Tab -->
    <div class="tab-pane fade" id="academics" role="tabpanel">
      <h6 class="fw-bold text-dark mb-3">Term Assessments & Periodic Tests (Class 10)</h6>
      <div class="table-responsive">
        <table class="table table-bordered align-middle font-size-13">
          <thead class="table-light">
            <tr>
              <th>Subject</th>
              <th>Periodic Test 1 (20)</th>
              <th>Mid-Term Exam (80)</th>
              <th>Periodic Test 2 (20)</th>
              <th>Total (100)</th>
              <th>Grade</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>English Communicative</td><td>19/20</td><td>74/80</td><td>18/20</td><td>93/100</td><td><span class="badge bg-success">A1</span></td></tr>
            <tr><td>Mathematics (Standard)</td><td>20/20</td><td>78/80</td><td>20/20</td><td>98/100</td><td><span class="badge bg-success">A1</span></td></tr>
            <tr><td>Science (Theory & Pract)</td><td>19/20</td><td>75/80</td><td>19/20</td><td>94/100</td><td><span class="badge bg-success">A1</span></td></tr>
            <tr><td>Social Science</td><td>18/20</td><td>72/80</td><td>18/20</td><td>90/100</td><td><span class="badge bg-success">A1</span></td></tr>
            <tr><td>Hindi Course-A</td><td>18/20</td><td>70/80</td><td>19/20</td><td>89/100</td><td><span class="badge bg-primary">A2</span></td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Attendance Tab -->
    <div class="tab-pane fade" id="attendance" role="tabpanel">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold text-dark mb-0">Cumulative Session Attendance: 162 of 168 Days (96.4%)</h6>
        <span class="badge bg-success">Eligible for CBSE Board Exam (Above 75%)</span>
      </div>
      <div class="progress mb-3" style="height: 12px;">
        <div class="progress-bar bg-success" role="progressbar" style="width: 96.4%;">96.4%</div>
      </div>
      <small class="text-muted">Total working days: 168 | Present: 162 | Medical Leave: 4 | Unexcused: 2</small>
    </div>

    <!-- Documents Tab -->
    <div class="tab-pane fade" id="documents" role="tabpanel">
      <h6 class="fw-bold text-dark mb-3">Verified Document Vault</h6>
      <div class="row g-3">
        <div class="col-md-6">
          <div class="p-3 bg-light rounded-3 border d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-bold text-dark"><i class="bi bi-file-earmark-pdf text-danger me-1"></i> Municipal Birth Certificate</div>
              <small class="text-muted">Verified by MCD &bull; 1.2 MB</small>
            </div>
            <button class="btn btn-sm btn-outline-primary" onclick="alert('Downloading Document...')"><i class="bi bi-download"></i></button>
          </div>
        </div>
        <div class="col-md-6">
          <div class="p-3 bg-light rounded-3 border d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-bold text-dark"><i class="bi bi-file-earmark-pdf text-danger me-1"></i> Aadhaar Card Copy</div>
              <small class="text-muted">UIDAI e-KYC Verified &bull; 840 KB</small>
            </div>
            <button class="btn btn-sm btn-outline-primary" onclick="alert('Downloading Document...')"><i class="bi bi-download"></i></button>
          </div>
        </div>
        <div class="col-md-6">
          <div class="p-3 bg-light rounded-3 border d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-bold text-dark"><i class="bi bi-file-earmark-pdf text-danger me-1"></i> Class 9 Annual Marks Transcript</div>
              <small class="text-muted">CBSE LOC Verified &bull; 1.8 MB</small>
            </div>
            <button class="btn btn-sm btn-outline-primary" onclick="alert('Downloading Document...')"><i class="bi bi-download"></i></button>
          </div>
        </div>
        <div class="col-md-6">
          <div class="p-3 bg-light rounded-3 border d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-bold text-dark"><i class="bi bi-file-earmark-pdf text-danger me-1"></i> Medical Fitness & Vaccine Record</div>
              <small class="text-muted">Infirmary Approved &bull; 920 KB</small>
            </div>
            <button class="btn btn-sm btn-outline-primary" onclick="alert('Downloading Document...')"><i class="bi bi-download"></i></button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
`;
fs.writeFileSync(studentProfilePath, studentProfileContent, 'utf8');
count++;
console.log(`[GENERATED] students/student-profile.php (Student Profile 360)`);

// -------------------------------------------------------------
// 5. BESPOKE STUDENT IMPORT / EXPORT (import-export.php)
// -------------------------------------------------------------
const importExportPath = path.join(STUDENTS_DIR, 'import-export.php');
const importExportContent = `<?php
/**
 * EDUSYS PRO - STUDENT IMPORT / EXPORT
 * Bulk CSV/Excel onboarding, UDISE+ and CBSE OASIS data synchronization
 */
$page_title = "Student Import / Export";
$page_desc = "Bulk CSV/Excel onboarding, UDISE+ and CBSE OASIS government compliance exports";
$active_module = "students";
$active_submodule = "import-export.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/students/dashboard.php'); ?>">Student Information System</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-file-earmark-spreadsheet-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Summary">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-success fw-bold" onclick="alert('Downloading CBSE OASIS Bulk Template (.CSV)...')">
      <i class="bi bi-download me-1"></i> Download Template (.CSV)
    </button>
  </div>
</div>

<!-- Import & Export Control Grid -->
<div class="row g-4 mb-4">
  <!-- Bulk Import Card -->
  <div class="col-lg-6">
    <div class="card border-0 shadow-sm p-4 h-100">
      <h5 class="fw-bold text-dark mb-2"><i class="bi bi-cloud-arrow-up text-primary me-2"></i>Bulk Student CSV Import</h5>
      <p class="text-muted font-size-13">Upload bulk scholar manifests adhering to the official CBSE OASIS or UDISE+ column layout.</p>
      
      <div class="border border-2 border-dashed rounded-3 p-4 text-center my-3 bg-light">
        <i class="bi bi-file-earmark-arrow-up text-primary fs-1 d-block mb-2"></i>
        <h6 class="fw-bold mb-1">Drag and drop student CSV or Excel file here</h6>
        <p class="text-muted font-size-12 mb-3">Supports .csv, .xlsx, .xls up to 25 MB</p>
        <input type="file" class="form-control d-none" id="fileUploadInput">
        <button class="btn btn-primary btn-sm px-4 fw-bold" onclick="document.getElementById('fileUploadInput').click();">
          Browse File
        </button>
      </div>

      <div class="d-flex justify-content-between align-items-center mt-auto pt-2">
        <small class="text-muted"><i class="bi bi-info-circle me-1"></i> Auto-validates Aadhaar, DOB, and Wing limits</small>
        <button class="btn btn-primary fw-bold px-4" onclick="alert('File uploaded and validated! 120 records queued for import.')">
          <i class="bi bi-upload me-1"></i> Process Import
        </button>
      </div>
    </div>
  </div>

  <!-- Bulk Export Card -->
  <div class="col-lg-6">
    <div class="card border-0 shadow-sm p-4 h-100">
      <h5 class="fw-bold text-dark mb-2"><i class="bi bi-cloud-arrow-down text-success me-2"></i>Institutional Data Export</h5>
      <p class="text-muted font-size-13">Extract real-time synchronized student directories formatted for official statutory audits.</p>
      
      <div class="list-group font-size-13 my-3">
        <div class="list-group-item d-flex justify-content-between align-items-center py-3">
          <div>
            <div class="fw-bold text-dark">CBSE OASIS Master Student Manifest</div>
            <small class="text-muted">Includes LOC registration, subjects, and APAAR IDs</small>
          </div>
          <button class="btn btn-outline-primary btn-sm fw-bold" onclick="alert('Exporting CBSE OASIS Manifest...')">
            <i class="bi bi-download me-1"></i> Export CSV
          </button>
        </div>
        <div class="list-group-item d-flex justify-content-between align-items-center py-3">
          <div>
            <div class="fw-bold text-dark">UDISE+ Government Portal Student Sync</div>
            <small class="text-muted">Student National PEN code, demographic profiles</small>
          </div>
          <button class="btn btn-outline-success btn-sm fw-bold" onclick="alert('Exporting UDISE+ Sync Dataset...')">
            <i class="bi bi-download me-1"></i> Export Excel
          </button>
        </div>
        <div class="list-group-item d-flex justify-content-between align-items-center py-3">
          <div>
            <div class="fw-bold text-dark">Parent Emergency & Blood Group Directory</div>
            <small class="text-muted">Infirmary and transport disaster response roll</small>
          </div>
          <button class="btn btn-outline-dark btn-sm fw-bold" onclick="alert('Exporting Emergency Directory...')">
            <i class="bi bi-download me-1"></i> Export CSV
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
`;
fs.writeFileSync(importExportPath, importExportContent, 'utf8');
count++;
console.log(`[GENERATED] students/import-export.php (Student Import / Export)`);

console.log(`\nSuccessfully generated ${count} bespoke Student Information System submodules.`);
