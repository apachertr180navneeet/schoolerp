/**
 * EDUSYS PRO - COMPLETE ACADEMIC MANAGEMENT (ACADEMICS) GENERATOR
 * Generates all 28 submodules with domain-specific UI, realistic Indian CBSE data,
 * domain KPIs, specialized filters, and custom tables.
 */

const fs = require('fs');
const path = require('path');

const ACADEMICS_DIR = path.resolve(__dirname, '../prototype/modules/academics');

// Common helper to wrap table pages
function generateTablePage(d) {
  const isPrintOrSchedule = d.isSchedulePage === true;
  
  const headerActionHtml = isPrintOrSchedule ? `
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', '${d.filename.replace('.php', '')}_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi ${d.actionBtnIcon || 'bi-plus-lg'} me-1"></i> ${d.actionBtnText || 'Add Schedule'}
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

  return `<?php
/**
 * EDUSYS PRO - ${d.title.toUpperCase()}
 * Dedicated operational interface & records management for ${d.title}
 */
$page_title = "${d.title}";
$page_desc = "${d.desc}";
$active_module = "academics";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/academics/dashboard.php'); ?>">Academic Management</a></li>
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
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, '${d.title.replace(/'/g, "\\'")}')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
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
// SUBMODULES DEFINITION FOR ALL 27 ACADEMIC PAGES (Excl. Dashboard)
// -------------------------------------------------------------
const submodules = [
  // 1. curriculum.php
  {
    filename: 'curriculum.php',
    title: 'Curriculum Management',
    icon: 'bi-journal-bookmark-fill',
    actionBtnText: 'Add Curriculum Framework',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'Master academic syllabi architectures, pedagogical models, and board integration guidelines',
    kpi1: { title: "Curriculum Tracks", val: "5 Active Tracks", trend: "CBSE & NEP 2020 Integrated", icon: "bi-journal-check", color: "kpi-primary" },
    kpi2: { title: "Subjects Catalog", val: "48 Subjects", trend: "Core & Skill Electives", icon: "bi-book-half", color: "kpi-success" },
    kpi3: { title: "NCF 2023 Aligned", val: "100% Compliant", trend: "Foundational to Secondary", icon: "bi-check2-all", color: "kpi-info" },
    kpi4: { title: "Annual Reviews", val: "Completed", trend: "Board Academic Council", icon: "bi-calendar-check-fill", color: "kpi-warning" },
    filterPlaceholder: "Search framework, subject, board, classes...",
    filterOptions: ["All Frameworks", "CBSE Secondary Framework (9-10)", "CBSE Senior Secondary (11-12)", "NEP Preparatory (3-5)", "NEP Middle Stage (6-8)", "Foundational Stage (Nursery-2)"],
    statusFilterOptions: ["All Status", "Active & Adopted", "Under Annual Review", "Archived"],
    headers: ["Framework Code", "Curriculum Title", "Affiliation Authority", "Target Wings", "Academic Session", "NEP 2020 Compliance", "Revision Date", "Status"],
    rows: [
      { c1: "CUR-CBSE-SEC", c2: "CBSE Secondary Curriculum", sub: "Core 5 Subjects + 1 Skill", c3: "Central Board (CBSE)", c4: "Classes 9 & 10", c5: "2024-2025", c6: "100% NCF-SE Aligned", c7: "15 Apr 2024", badge: "badge-active", status: "Active" },
      { c1: "CUR-CBSE-SR", c2: "CBSE Senior Secondary", sub: "Science, Commerce, Humanities", c3: "Central Board (CBSE)", c4: "Classes 11 & 12", c5: "2024-2025", c6: "100% NCF-SE Aligned", c7: "15 Apr 2024", badge: "badge-active", status: "Active" },
      { c1: "CUR-NEP-MID", c2: "NEP Middle Stage Framework", sub: "Experiential & Vocational Skills", c3: "NCERT / CBSE", c4: "Classes 6 to 8", c5: "2024-2025", c6: "10-Bagless Days Included", c7: "10 May 2024", badge: "badge-active", status: "Active" },
      { c1: "CUR-NEP-PREP", c2: "NEP Preparatory Stage", sub: "Activity & Inquiry Based", c3: "NCERT / CBSE", c4: "Classes 3 to 5", c5: "2024-2025", c6: "Toy-Based Pedagogy", c7: "20 May 2024", badge: "badge-active", status: "Active" },
      { c1: "CUR-NCF-FS", c2: "Foundational Stage (Panchakosha)", sub: "Play, Physical & Emotional", c3: "NCF-FS / MoE", c4: "Nursery, KG, Prep, Cl 1-2", c5: "2024-2025", c6: "100% Jaadui Pitara Mapped", c7: "01 Jun 2024", badge: "badge-active", status: "Active" },
      { c1: "CUR-SKILL-AI", c2: "CBSE Artificial Intelligence & Coding", sub: "Intel & IBM Supported", c3: "CBSE Skill Dept", c4: "Classes 8 to 11", c5: "2024-2025", c6: "Skill Elective #417", c7: "10 Jul 2024", badge: "badge-active", status: "Active" },
      { c1: "CUR-FIN-LIT", c2: "Financial Literacy & Entrepreneurship", sub: "SEBI / NISM Collaboration", c3: "CBSE Skill Dept", c4: "Classes 9 to 12", c5: "2024-2025", c6: "Practical Banking Lab", c7: "15 Jul 2024", badge: "badge-active", status: "Active" },
      { c1: "CUR-REG-HIN", c2: "Hindi Course-A & Sanskrit Composite", sub: "Three-Language Formula", c3: "NCERT / CBSE", c4: "Classes 6 to 10", c5: "2024-2025", c6: "Bilingual Track", c7: "20 Jul 2024", badge: "badge-active", status: "Active" }
    ]
  },

  // 2. cbse-curriculum.php
  {
    filename: 'cbse-curriculum.php',
    title: 'CBSE Curriculum & NEP 2020',
    icon: 'bi-award-fill',
    actionBtnText: 'Configure NEP Standard',
    actionBtnIcon: 'bi-patch-plus-fill',
    desc: 'National Education Policy 2020 alignment, 5+3+3+4 pedagogical structure, and competency-based assessment',
    kpi1: { title: "5+3+3+4 Structure", val: "100% Implemented", trend: "Foundational to Senior", icon: "bi-diagram-3-fill", color: "kpi-success" },
    kpi2: { title: "Bagless Days (6-8)", val: "10 Days Completed", trend: "Vocational Crafts Track", icon: "bi-backpack-fill", color: "kpi-primary" },
    kpi3: { title: "HPC Holistic Cards", val: "2,840 Generated", trend: "360° Assessment Rubric", icon: "bi-card-checklist", color: "kpi-info" },
    kpi4: { title: "Skill Subjects Opted", val: "842 Students", trend: "AI, Design, Financial Lit", icon: "bi-cpu-fill", color: "kpi-warning" },
    filterPlaceholder: "Search NEP stage, subject, pedagogical model, grades...",
    filterOptions: ["All NEP Stages", "Foundational Stage (Ages 3-8)", "Preparatory Stage (Classes 3-5)", "Middle Stage (Classes 6-8)", "Secondary Stage (Classes 9-12)"],
    statusFilterOptions: ["All Status", "Active in Timetable", "Under Teacher Training", "Adopted"],
    headers: ["Standard UID", "NEP 2020 Stage", "Target Grades", "Pedagogical Framework", "Core Focus Areas", "Skill Subjects", "Assessment Model", "Status"],
    rows: [
      { c1: "NEP-STG-01", c2: "Foundational Stage", sub: "Ages 3 to 8", c3: "Nursery to Class 2", c4: "Play & Discovery-Based (Jaadui Pitara)", c5: "Foundational Literacy & Numeracy (FLN)", c6: "Arts & Storytelling", c7: "Non-exam Observation", badge: "badge-active", status: "Active" },
      { c1: "NEP-STG-02", c2: "Preparatory Stage", sub: "Ages 8 to 11", c3: "Classes 3 to 5", c4: "Light Textbooks & Experiential Learning", c5: "Language, Math, Science Discovery", c6: "Coding Basics & Clay Art", c7: "Formative & Portfolios", badge: "badge-active", status: "Active" },
      { c1: "NEP-STG-03", c2: "Middle Stage", sub: "Ages 11 to 14", c3: "Classes 6 to 8", c4: "Subject-specific Conceptual Inquiry", c5: "Maths, Science, Social, Humanities", c6: "Carpentry, Pottery, Coding, AI", c7: "Periodic Tests & Projects", badge: "badge-active", status: "Active" },
      { c1: "NEP-STG-04", c2: "Secondary Stage (Ph 1)", sub: "Ages 14 to 16", c3: "Classes 9 & 10", c4: "Multidisciplinary Critical Thinking", c5: "Core CBSE 5-Subject Scheme", c6: "AI (417), Information Tech (402)", c7: "CBSE Board Examination", badge: "badge-active", status: "Active" },
      { c1: "NEP-STG-05", c2: "Secondary Stage (Ph 2)", sub: "Ages 16 to 18", c3: "Classes 11 & 12", c4: "Deep Specialization & Stream Flexibility", c5: "PCM, PCB, Commerce, Humanities", c6: "Data Science, Entrepreneurship", c7: "CBSE AISSCE Board", badge: "badge-active", status: "Active" },
      { c1: "NEP-FLN-01", c2: "NIPUN Bharat Mission", sub: "Reading with Meaning", c3: "Classes 1 to 3", c4: "Daily 60-Min FLN Reading Block", c5: "Word Recognition & Basic Math Addition", c6: "Phonics & Rhymes", c7: "Oral Reading Fluency", badge: "badge-active", status: "Active" },
      { c1: "NEP-BAG-01", c2: "10 Bagless Days Module", sub: "Hands-on Exposure", c3: "Classes 6 to 8", c4: "Local Artisans & Industry Field Visits", c5: "Gardening, Heritage Walk, Plumbing", c6: "Vocational Skills", c7: "Reflective Journals", badge: "badge-active", status: "Active" },
      { c1: "NEP-HPC-01", c2: "Holistic Progress Card", sub: "PARAKH Standard", c3: "Classes 1 to 12", c4: "Self, Peer, and Teacher Evaluation", c5: "Cognitive, Socio-Emotional & Physical", c6: "Co-curricular Rubric", c7: "Descriptive Feedback", badge: "badge-active", status: "Active" }
    ]
  },

  // 3. state-curriculum.php
  {
    filename: 'state-curriculum.php',
    title: 'State Board Curriculum',
    icon: 'bi-geo-alt-fill',
    actionBtnText: 'Map State Standards',
    actionBtnIcon: 'bi-map-fill',
    desc: 'State Education Department syllabus integration, regional language equivalences, and statutory NOC filings',
    kpi1: { title: "Equivalence Mapped", val: "100% Validated", trend: "State Education Directorate", icon: "bi-check2-circle", color: "kpi-success" },
    kpi2: { title: "Regional Languages", val: "3 Options Active", trend: "Hindi, Sanskrit, Punjabi", icon: "bi-translate", color: "kpi-primary" },
    kpi3: { title: "State NOC Status", val: "Permanent NOC", trend: "Affiliation No: 2130892", icon: "bi-file-earmark-lock-fill", color: "kpi-info" },
    kpi4: { title: "Transfer Scholars", val: "100% Converted", trend: "Zero Curriculum Gaps", icon: "bi-arrow-left-right", color: "kpi-warning" },
    filterPlaceholder: "Search state code, regional language, board, classes...",
    filterOptions: ["All State Standards", "Delhi Directorate of Education (DoE)", "Haryana Board of School Education (BSEH)", "Maharashtra State Board (MSBSHSE)", "Uttar Pradesh Madhyamik (UPMSP)"],
    statusFilterOptions: ["All Status", "Mapped & Active", "Under Equivalence Review", "Archived"],
    headers: ["State Code", "State Education Board", "Target Classes", "Regional Language Track", "State Domicile Syllabus", "Equivalence Certificate", "NOC Status", "Status"],
    rows: [
      { c1: "ST-DOE-DL", c2: "Directorate of Education, Delhi", sub: "DoE Curriculum Framework", c3: "Classes 1 to 12", c4: "Hindi Course-A / Sanskrit", c5: "SCERT Delhi Deshbhakti & Happiness", c6: "Equivalence #DOE-2024-84", c7: "Permanent NOC Filed", badge: "badge-active", status: "Mapped" },
      { c1: "ST-BSEH-HR", c2: "Haryana Board of School Education", sub: "BSEH Curriculum Standards", c3: "Classes 6 to 10", c4: "Hindi / Sanskrit", c5: "Haryana State Heritage & Geography", c6: "Equivalence #BSEH-4921", c7: "NOC Verified", badge: "badge-active", status: "Mapped" },
      { c1: "ST-UPMSP-UP", c2: "UP Madhyamik Shiksha Parishad", sub: "Prayagraj Board Standards", c3: "Classes 9 & 10", c4: "Hindi Sahitya Core", c5: "State Science & Math Equivalency", c6: "Equivalence #UP-1048", c7: "NOC Verified", badge: "badge-active", status: "Mapped" },
      { c1: "ST-MSBS-MH", c2: "Maharashtra State Board (MSBSHSE)", sub: "Pune Board Equivalency", c3: "Classes 6 to 10", c4: "Marathi (3rd Language Option)", c5: "EVS & State History Equivalence", c6: "Equivalence #MS-8492", c7: "NOC Verified", badge: "badge-active", status: "Mapped" },
      { c1: "ST-PSEB-PB", c2: "Punjab School Education Board", sub: "Mohali Board Standards", c3: "Classes 6 to 8", c4: "Punjabi (Regional Option)", c5: "Punjab History & Culture", c6: "Equivalence #PB-2940", c7: "NOC Verified", badge: "badge-active", status: "Mapped" },
      { c1: "ST-KSEEB-KA", c2: "Karnataka School Examination Board", sub: "Bengaluru Board Standards", c3: "Classes 6 to 8", c4: "Kannada (Introductory Track)", c5: "State Environmental Studies", c6: "Equivalence #KA-1849", c7: "NOC Verified", badge: "badge-active", status: "Mapped" },
      { c1: "ST-WBSED-WB", c2: "West Bengal Board of Secondary", sub: "Kolkata Board Standards", c3: "Classes 6 to 8", c4: "Bengali (Introductory Track)", c5: "State Heritage Studies", c6: "Equivalence #WB-3920", c7: "NOC Verified", badge: "badge-active", status: "Mapped" },
      { c1: "ST-TNSB-TN", c2: "Tamil Nadu State Board", sub: "Chennai Board Standards", c3: "Classes 6 to 8", c4: "Tamil (Language Elective)", c5: "State Social Studies Equivalence", c6: "Equivalence #TN-4810", c7: "NOC Verified", badge: "badge-active", status: "Mapped" }
    ]
  },

  // 4. board-mapping.php
  {
    filename: 'board-mapping.php',
    title: 'Board and Class Mapping',
    icon: 'bi-diagram-3-fill',
    actionBtnText: 'Map Class to Board',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'Statutory board affiliations, official examination codes, subject groups, and List of Candidates (LOC) registers',
    kpi1: { title: "Board Affiliation", val: "CBSE Central", trend: "Affiliation No: 2130892", icon: "bi-patch-check-fill", color: "kpi-success" },
    kpi2: { title: "School Code (CBSE)", val: "Code: 70142", trend: "Delhi Region Examination", icon: "bi-building-check", color: "kpi-primary" },
    kpi3: { title: "Board Classes", val: "Class 10 & 12", trend: "AISSE & AISSCE Ready", icon: "bi-award", color: "kpi-info" },
    kpi4: { title: "LOC Candidates", val: "420 Registered", trend: "100% Fees Reconciled", icon: "bi-people-fill", color: "kpi-warning" },
    filterPlaceholder: "Search mapping UID, class, board, exam code...",
    filterOptions: ["All Board Classes", "Class 10 (AISSE Board Exam)", "Class 12 (AISSCE Board Exam)", "Class 9 (CBSE Mandatory Reg)", "Class 11 (CBSE Mandatory Reg)", "Classes 1-8 (NCF Progressive)"],
    statusFilterOptions: ["All Status", "LOC Approved & Sealed", "Registration Open", "Draft"],
    headers: ["Mapping UID", "Academic Class / Grade", "Affiliated Board", "Board Examination Code", "Subject Scheme", "Passing Criteria", "LOC Batch #", "Status"],
    rows: [
      { c1: "MAP-CL10-CBSE", c2: "Class 10 (Secondary)", sub: "AISSE 2025 Board Batch", c3: "CBSE (Central Board)", c4: "CBSE-AISSE-10", c5: "5 Compulsory + 1 Skill Subject", c6: "33% in Theory & Pract Combined", c7: "LOC-2024-CL10-240", badge: "badge-active", status: "Sealed" },
      { c1: "MAP-CL12-PCM", c2: "Class 12 - Science (PCM)", sub: "AISSCE 2025 Board Batch", c3: "CBSE (Central Board)", c4: "CBSE-AISSCE-12-PCM", c5: "English, Physics, Chem, Math, CS", c6: "33% Separately in Theory & Pract", c7: "LOC-2024-CL12-070", badge: "badge-active", status: "Sealed" },
      { c1: "MAP-CL12-PCB", c2: "Class 12 - Science (PCB)", sub: "AISSCE 2025 Board Batch", c3: "CBSE (Central Board)", c4: "CBSE-AISSCE-12-PCB", c5: "English, Physics, Chem, Bio, P.Ed", c6: "33% Separately in Theory & Pract", c7: "LOC-2024-CL12-040", badge: "badge-active", status: "Sealed" },
      { c1: "MAP-CL12-COMM", c2: "Class 12 - Commerce", sub: "AISSCE 2025 Board Batch", c3: "CBSE (Central Board)", c4: "CBSE-AISSCE-12-COM", c5: "English, Accountancy, BST, Eco, Math", c6: "33% Separately in Theory & Pract", c7: "LOC-2024-CL12-040", badge: "badge-active", status: "Sealed" },
      { c1: "MAP-CL12-HUM", c2: "Class 12 - Humanities", sub: "AISSCE 2025 Board Batch", c3: "CBSE (Central Board)", c4: "CBSE-AISSCE-12-HUM", c5: "English, History, Pol Sci, Psych, Eco", c6: "33% Separately in Theory & Pract", c7: "LOC-2024-CL12-030", badge: "badge-active", status: "Sealed" },
      { c1: "MAP-CL09-CBSE", c2: "Class 9 (Secondary Reg)", sub: "CBSE 9th Registration Batch", c3: "CBSE (Central Board)", c4: "CBSE-REG-09", c5: "Pre-Board 5 Compulsory Subjects", c6: "33% Overall Pass in Annual Exam", c7: "REG-2024-CL09-280", badge: "badge-active", status: "Sealed" },
      { c1: "MAP-CL11-CBSE", c2: "Class 11 (Senior Sec Reg)", sub: "CBSE 11th Registration Batch", c3: "CBSE (Central Board)", c4: "CBSE-REG-11", c5: "Stream-wise 5 Elective Subjects", c6: "33% Separately in Theory & Pract", c7: "REG-2024-CL11-200", badge: "badge-active", status: "Sealed" },
      { c1: "MAP-CL08-NCF", c2: "Classes 6 to 8 (Middle)", sub: "Progressive School Evaluation", c3: "CBSE / NCF Middle", c4: "NCF-MID-6-8", c5: "Three Languages + Math, Sci, Social", c6: "Continuous & Comprehensive Eval", c7: "SCH-MID-680", badge: "badge-active", status: "Sealed" }
    ]
  },

  // 5. syllabus.php
  {
    filename: 'syllabus.php',
    title: 'Syllabus Management',
    icon: 'bi-journal-text',
    actionBtnText: 'Add Syllabus Unit',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'Term-wise curriculum breakdown, chapter unit mappings, teaching hour allotments, and weightages',
    kpi1: { title: "Syllabus Units", val: "384 Chapters", trend: "Mapped to NCERT & CBSE", icon: "bi-journal-check", color: "kpi-primary" },
    kpi2: { title: "Term 1 Completed", val: "100% Taught", trend: "Mid-Term Examinations Done", icon: "bi-check2-circle", color: "kpi-success" },
    kpi3: { title: "Term 2 Progress", val: "54.2% Completed", trend: "Target Finish: 15 Jan 2025", icon: "bi-clock-history", color: "kpi-info" },
    kpi4: { title: "Practical Hours", val: "180 Hours Logged", trend: "Lab Experiential Work", icon: "bi-tools", color: "kpi-warning" },
    filterPlaceholder: "Search syllabus UID, subject, chapter title, class...",
    filterOptions: ["All Subjects", "Mathematics (041)", "Physics (042)", "Chemistry (043)", "Biology (044)", "Computer Science (083)", "Social Science (087)", "English Core (301)"],
    statusFilterOptions: ["All Status", "On Track", "Completed Term 1", "In Progress Term 2", "Remedial Scheduled"],
    headers: ["Syllabus UID", "Subject & Code", "Class & Stream", "Term / Semester", "Total Chapters", "Allotted Teaching Hours", "Weightage (Marks)", "Status"],
    rows: [
      { c1: "SYL-MATH-10", c2: "Mathematics (041)", sub: "Real Numbers to Stats", c3: "Class 10 - Secondary", c4: "Term 1 & Term 2 (Annual)", c5: "14 Chapters (NCERT)", c6: "160 Hours (6 Periods/Wk)", c7: "80 Theory + 20 Internal", badge: "badge-active", status: "On Track (76%)" },
      { c1: "SYL-PHY-12", c2: "Physics (042)", sub: "Electrostatics to Optics", c3: "Class 12 - Science (PCM)", c4: "Annual Board Syllabus", c5: "14 Units (NCERT)", c6: "150 Hours + 60h Lab", c7: "70 Theory + 30 Practicals", badge: "badge-active", status: "On Track (78%)" },
      { c1: "SYL-CHEM-12", c2: "Chemistry (043)", sub: "Physical, Inorganic, Organic", c3: "Class 12 - Science (PCM/B)", c4: "Annual Board Syllabus", c5: "10 Major Units (NCERT)", c6: "140 Hours + 60h Lab", c7: "70 Theory + 30 Practicals", badge: "badge-active", status: "On Track (74%)" },
      { c1: "SYL-BIO-12", c2: "Biology (044)", sub: "Genetics, Biotech, Ecology", c3: "Class 12 - Science (PCB)", c4: "Annual Board Syllabus", c5: "13 Chapters (NCERT)", c6: "140 Hours + 60h Lab", c7: "70 Theory + 30 Practicals", badge: "badge-active", status: "On Track (80%)" },
      { c1: "SYL-CS-12", c2: "Computer Science (083)", sub: "Python, SQL, Networks", c3: "Class 12 - Senior Secondary", c4: "Annual Board Syllabus", c5: "3 Major Sections", c6: "120 Hours + 60h Lab", c7: "70 Theory + 30 Practicals", badge: "badge-active", status: "On Track (82%)" },
      { c1: "SYL-ENG-10", c2: "English Language & Lit (184)", sub: "First Flight, Footprints, Grammar", c3: "Class 10 - Secondary", c4: "Annual Board Syllabus", c5: "18 Chapters + 10 Poems", c6: "140 Hours (5 Periods/Wk)", c7: "80 Theory + 20 ASL Assessment", badge: "badge-active", status: "On Track (79%)" },
      { c1: "SYL-SST-10", c2: "Social Science (087)", sub: "Hist, Geo, Pol Sci, Eco", c3: "Class 10 - Secondary", c4: "Annual Board Syllabus", c5: "21 Chapters (NCERT)", c6: "160 Hours (6 Periods/Wk)", c7: "80 Theory + 20 Projects", badge: "badge-active", status: "On Track (72%)" },
      { c1: "SYL-ACC-12", c2: "Accountancy (055)", sub: "Partnership, Companies, Cash Flow", c3: "Class 12 - Commerce", c4: "Annual Board Syllabus", c5: "9 Comprehensive Units", c6: "150 Hours + Project", c7: "80 Theory + 20 Project Work", badge: "badge-active", status: "On Track (81%)" }
    ]
  },

  // 6. subject-allocation.php
  {
    filename: 'subject-allocation.php',
    title: 'Subject Allocation',
    icon: 'bi-book-half',
    actionBtnText: 'Allocate Subject Scheme',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'Class-wise curriculum schemes, compulsory core subjects, skill modules, and theory-practical splits',
    kpi1: { title: "Subjects Catalog", val: "48 Subjects", trend: "All 5 Wings Covered", icon: "bi-book-fill", color: "kpi-primary" },
    kpi2: { title: "Theory : Pract Split", val: "Standardized", trend: "70:30 & 80:20 CBSE Rules", icon: "bi-sliders2", color: "kpi-success" },
    kpi3: { title: "Skill Subjects", val: "6 Options Active", trend: "AI, IT, Design, Banking", icon: "bi-cpu-fill", color: "kpi-info" },
    kpi4: { title: "Weekly Periods", val: "576 Allotted", trend: "Balanced 48/Day Routine", icon: "bi-calendar3-week-fill", color: "kpi-warning" },
    filterPlaceholder: "Search allocation ref #, subject, code, class...",
    filterOptions: ["All Grades", "Class 12 - Senior Secondary", "Class 11 - Senior Secondary", "Class 10 - Secondary", "Class 9 - Secondary", "Classes 6 to 8 - Middle", "Classes 1 to 5 - Primary"],
    statusFilterOptions: ["All Status", "Active Scheme", "Under Revision", "Elective Opted"],
    headers: ["Allocation Ref #", "Subject Name", "CBSE Code", "Class & Stream", "Weekly Periods", "Subject Category", "Theory : Pract Split", "Status"],
    rows: [
      { c1: "SUB-ALC-001", c2: "Mathematics (Standard)", sub: "Main Scholastic Core", c3: "Code: 041", c4: "Class 10 - Section A & B", c5: "6 Periods / Week", c6: "Compulsory Core", c7: "80 Theory : 20 Internal", badge: "badge-active", status: "Active" },
      { c1: "SUB-ALC-002", c2: "Physics (Theory & Practical)", sub: "Senior Secondary Core", c3: "Code: 042", c4: "Class 12 - Science (PCM/B)", c5: "7 Periods + 2 Lab Blocks", c6: "Science Core", c7: "70 Theory : 30 Practical", badge: "badge-active", status: "Active" },
      { c1: "SUB-ALC-003", c2: "Chemistry (Theory & Practical)", sub: "Senior Secondary Core", c3: "Code: 043", c4: "Class 12 - Science (PCM/B)", c5: "7 Periods + 2 Lab Blocks", c6: "Science Core", c7: "70 Theory : 30 Practical", badge: "badge-active", status: "Active" },
      { c1: "SUB-ALC-004", c2: "Computer Science (Python & SQL)", sub: "Elective 5th Subject", c3: "Code: 083", c4: "Class 12 - Science (PCM)", c5: "6 Periods + 2 Lab Blocks", c6: "Elective Subject", c7: "70 Theory : 30 Practical", badge: "badge-active", status: "Active" },
      { c1: "SUB-ALC-005", c2: "English Core", sub: "Language & Literature", c3: "Code: 301", c4: "Class 12 - All Streams", c5: "5 Periods / Week", c6: "Compulsory Language", c7: "80 Theory : 20 ASL Pract", badge: "badge-active", status: "Active" },
      { c1: "SUB-ALC-006", c2: "Accountancy", sub: "Financial & Corporate", c3: "Code: 055", c4: "Class 12 - Commerce", c5: "7 Periods + 1 Project", c6: "Commerce Core", c7: "80 Theory : 20 Project", badge: "badge-active", status: "Active" },
      { c1: "SUB-ALC-007", c2: "Social Science (Hist/Geo/Civ/Eco)", sub: "Integrated Humanities", c3: "Code: 087", c4: "Class 10 - All Sections", c5: "6 Periods / Week", c6: "Compulsory Core", c7: "80 Theory : 20 Portfolio", badge: "badge-active", status: "Active" },
      { c1: "SUB-ALC-008", c2: "Artificial Intelligence (Skill)", sub: "CBSE Vocational Elective", c3: "Code: 417", c4: "Class 10 - All Sections", c5: "2 Periods + 1 Lab Block", c6: "Skill Elective (6th Sub)", c7: "50 Theory : 50 Practical", badge: "badge-active", status: "Active" }
    ]
  },

  // 7. teacher-allocation.php
  {
    filename: 'teacher-allocation.php',
    title: 'Teacher Allocation',
    icon: 'bi-person-workspace',
    actionBtnText: 'Assign Faculty Subject',
    actionBtnIcon: 'bi-person-plus-fill',
    desc: 'Workload balancing, period caps (Max 36 periods/week), subject specialization mappings, and faculty schedules',
    kpi1: { title: "Faculty Members", val: "112 Teachers", trend: "100% Workload Assigned", icon: "bi-people-fill", color: "kpi-primary" },
    kpi2: { title: "Average Workload", val: "30.4 Periods / Wk", trend: "Well Below 36 Cap (CBSE)", icon: "bi-speedometer2", color: "kpi-success" },
    kpi3: { title: "PGT Faculty (Senior)", val: "28 Masters", trend: "Subject Specialists", icon: "bi-mortarboard-fill", color: "kpi-info" },
    kpi4: { title: "TGT Faculty (Middle)", val: "42 Teachers", trend: "Graduates with B.Ed", icon: "bi-person-badge", color: "kpi-warning" },
    filterPlaceholder: "Search teacher name, designation, subject, class...",
    filterOptions: ["All Departments", "Science Department (PCM/B)", "Mathematics Department", "Commerce & Economics", "Humanities & Social Science", "Languages (English/Hindi/Sanskrit)"],
    statusFilterOptions: ["All Status", "Optimal Workload (<32)", "Near Capacity (33-36)", "Over Capacity (>36)"],
    headers: ["Workload ID", "Faculty Full Name", "Designation", "Assigned Subject", "Classes Allotted", "Weekly Periods (Max 36)", "Workload %", "Status"],
    rows: [
      { c1: "WKL-FAC-001", c2: "Dr. K. L. Sharma", sub: "Ph.D Physics", c3: "PGT Senior Physics", c4: "Physics (042)", c5: "Class 12-PCM, 12-PCB, 11-PCM", c6: "30 Periods (incl 6 Lab)", c7: "83.3% Optimal", badge: "badge-active", status: "Optimal" },
      { c1: "WKL-FAC-002", c2: "Mrs. Sunita Kaul", sub: "M.Sc, M.Ed Maths", c3: "PGT Mathematics", c4: "Mathematics (041)", c5: "Class 10-A, 10-B, 12-PCM", c6: "32 Periods / Week", c7: "88.8% Optimal", badge: "badge-active", status: "Optimal" },
      { c1: "WKL-FAC-003", c2: "Mr. Vikram Rathore", sub: "M.Sc Chemistry, NET", c3: "PGT Chemistry", c4: "Chemistry (043)", c5: "Class 12-PCM, 12-PCB, 11-PCB", c6: "30 Periods (incl 6 Lab)", c7: "83.3% Optimal", badge: "badge-active", status: "Optimal" },
      { c1: "WKL-FAC-004", c2: "Mrs. Radhika Iyer", sub: "M.Sc Botany, B.Ed", c3: "PGT Biology", c4: "Biology (044)", c5: "Class 12-PCB, 11-PCB, 10-A", c6: "28 Periods (incl 4 Lab)", c7: "77.7% Optimal", badge: "badge-active", status: "Optimal" },
      { c1: "WKL-FAC-005", c2: "Mr. Deepak Rawat", sub: "M.A English, B.Ed", c3: "PGT English", c4: "English Core (301)", c5: "Class 12-PCM, 12-PCB, 12-Comm", c6: "28 Periods / Week", c7: "77.7% Optimal", badge: "badge-active", status: "Optimal" },
      { c1: "WKL-FAC-006", c2: "Mrs. Shalini Verma", sub: "M.A Hist, B.Ed", c3: "TGT Social Science", c4: "Social Science (087)", c5: "Class 10-A, 9-B, 8-C", c6: "32 Periods / Week", c7: "88.8% Optimal", badge: "badge-active", status: "Optimal" },
      { c1: "WKL-FAC-007", c2: "Mr. M. K. Chawla", sub: "M.Com, FCA", c3: "PGT Commerce", c4: "Accountancy (055)", c5: "Class 12-Comm, 11-Comm", c6: "26 Periods / Week", c7: "72.2% Optimal", badge: "badge-active", status: "Optimal" },
      { c1: "WKL-FAC-008", c2: "Mr. Kunal Bansal", sub: "B.Tech CS, MCA", c3: "PGT Computer Science", c4: "Computer Science (083)", c5: "Class 12-PCM, 11-PCM, 10-AI", c6: "30 Periods (incl 8 Lab)", c7: "83.3% Optimal", badge: "badge-active", status: "Optimal" }
    ]
  },

  // 8. class-teacher-assignment.php
  {
    filename: 'class-teacher-assignment.php',
    title: 'Class Teacher Assignment',
    icon: 'bi-person-badge-fill',
    actionBtnText: 'Assign Class Teacher',
    actionBtnIcon: 'bi-person-plus-fill',
    desc: 'Section mentorship appointments, homeroom supervision, parent communication liaisons, and attendance custodians',
    kpi1: { title: "Class Teachers", val: "72 Appointed", trend: "100% Sections Covered", icon: "bi-person-badge", color: "kpi-success" },
    kpi2: { title: "Co-Class Teachers", val: "72 Appointed", trend: "Junior Faculty Mentors", icon: "bi-people", color: "kpi-primary" },
    kpi3: { title: "Daily Homeroom", val: "07:30 - 07:45 AM", trend: "Attendance & Value Assembly", icon: "bi-clock-fill", color: "kpi-info" },
    kpi4: { title: "PTM Coordination", val: "100% Ready", trend: "Parent Meeting Liaisons", icon: "bi-chat-dots-fill", color: "kpi-warning" },
    filterPlaceholder: "Search grade, section, class teacher, room number...",
    filterOptions: ["All Wings", "Secondary Wing (Classes 9-10)", "Senior Secondary (Classes 11-12)", "Middle Wing (Classes 6-8)", "Primary Wing (Classes 1-5)", "Pre-Primary (Nursery-Prep)"],
    statusFilterOptions: ["All Status", "Appointed & Active", "Relief Required", "Leave Cover"],
    headers: ["Assignment ID", "Grade & Section", "Class Teacher Appointed", "Designation", "Room Number", "Student Strength", "Co-Class Teacher", "Status"],
    rows: [
      { c1: "CTA-10A", c2: "Class 10 - Section A", sub: "Secondary Homeroom", c3: "Mrs. Sunita Kaul", c4: "PGT Mathematics", c5: "Room #204 (Block A)", c6: "40 Students", c7: "Mr. Deepak Rawat (English)", badge: "badge-active", status: "Active" },
      { c1: "CTA-10B", c2: "Class 10 - Section B", sub: "Secondary Homeroom", c3: "Mr. Vikram Rathore", c4: "PGT Chemistry", c5: "Room #205 (Block A)", c6: "38 Students", c7: "Mrs. Shalini Verma (Social)", badge: "badge-active", status: "Active" },
      { c1: "CTA-12PCM", c2: "Class 12 - Science (PCM)", sub: "Senior Sec Homeroom", c3: "Dr. K. L. Sharma", c4: "PGT Senior Physics", c5: "Room #301 (Science Block)", c6: "35 Students", c7: "Mr. Kunal Bansal (CS)", badge: "badge-active", status: "Active" },
      { c1: "CTA-12PCB", c2: "Class 12 - Science (PCB)", sub: "Senior Sec Homeroom", c3: "Mrs. Radhika Iyer", c4: "PGT Biology", c5: "Room #302 (Bio Block)", c6: "32 Students", c7: "Dr. Sunita Kapoor (Psych)", badge: "badge-active", status: "Active" },
      { c1: "CTA-12COM", c2: "Class 12 - Commerce", sub: "Senior Sec Homeroom", c3: "Mr. M. K. Chawla", c4: "PGT Commerce", c5: "Room #304 (Comm Block)", c6: "36 Students", c7: "Mr. S. K. Rastogi (Maths)", badge: "badge-active", status: "Active" },
      { c1: "CTA-8C", c2: "Class 8 - Section C", sub: "Middle Homeroom", c3: "Mr. Deepak Rawat", c4: "TGT English", c5: "Room #108 (Middle Block)", c6: "39 Students", c7: "Mrs. Pooja Hegde (Science)", badge: "badge-active", status: "Active" },
      { c1: "CTA-5A", c2: "Class 5 - Section A", sub: "Primary Homeroom", c3: "Mrs. Shalini Verma", c4: "PRT Senior Teacher", c5: "Room #012 (Primary Block)", c6: "40 Students", c7: "Mrs. Ritu Sharma (PRT)", badge: "badge-active", status: "Active" },
      { c1: "CTA-NUR", c2: "Class 1 - Nursery A", sub: "Early Years Homeroom", c3: "Mrs. Pooja Hegde", c4: "Early Childhood Specialist", c5: "Kindergarten Suite 1", c6: "28 Students", c7: "Ms. Ananya Sen (Montessori)", badge: "badge-active", status: "Active" }
    ]
  },

  // 9. timetable-builder.php
  {
    filename: 'timetable-builder.php',
    title: 'Timetable Builder',
    icon: 'bi-calendar3-week',
    actionBtnText: 'Generate Timetable Matrix',
    actionBtnIcon: 'bi-cpu',
    desc: 'Automated clash-free schedule scheduling engine: Faculty workloads, lab blocks, room constraints, and recess cycles',
    kpi1: { title: "Schedule Matrix", val: "72 Sections Built", trend: "Zero Clash Detected", icon: "bi-check2-all", color: "kpi-success" },
    kpi2: { title: "Weekly Periods", val: "576 Slots", trend: "8 Periods / Working Day", icon: "bi-clock-fill", color: "kpi-primary" },
    kpi3: { title: "Lab Double Blocks", val: "144 Scheduled", trend: "Physics, Chem, Bio, CS", icon: "bi-tools", color: "kpi-info" },
    kpi4: { title: "Algorithm Efficiency", val: "99.8% Optimized", trend: "Balanced Teacher Workload", icon: "bi-cpu-fill", color: "kpi-warning" },
    filterPlaceholder: "Search matrix ID, wing, cycle, status...",
    filterOptions: ["All Timetable Cycles", "Senior Secondary (11-12) Cycle", "Secondary Wing (9-10) Cycle", "Middle Wing (6-8) Cycle", "Primary Wing (1-5) Cycle", "Pre-Primary Activity Cycle"],
    statusFilterOptions: ["All Status", "Active & Published", "Draft / Regeneration", "Archived"],
    headers: ["Matrix ID", "Academic Wing / Class", "Timetable Cycle", "Total Working Days", "Periods Per Day", "Zero Clashes Verified", "Published Date", "Status"],
    rows: [
      { c1: "TTM-2024-SR", c2: "Senior Secondary (Classes 11-12)", sub: "Science, Commerce, Hum", c3: "Monday to Saturday (6 Days)", c4: "6 Working Days", c5: "8 Periods (45m each)", c6: "Verified (0 Clashes)", c7: "28 Jun 2024", badge: "badge-active", status: "Live Published" },
      { c1: "TTM-2024-SEC", c2: "Secondary Wing (Classes 9-10)", sub: "Core CBSE 5-Subject", c3: "Monday to Saturday (6 Days)", c4: "6 Working Days", c5: "8 Periods (45m each)", c6: "Verified (0 Clashes)", c7: "28 Jun 2024", badge: "badge-active", status: "Live Published" },
      { c1: "TTM-2024-MID", c2: "Middle Wing (Classes 6-8)", sub: "Three Languages & Skills", c3: "Monday to Friday (5 Days)", c4: "5 Working Days", c5: "8 Periods (45m each)", c6: "Verified (0 Clashes)", c7: "29 Jun 2024", badge: "badge-active", status: "Live Published" },
      { c1: "TTM-2024-PRI", c2: "Primary Wing (Classes 1-5)", sub: "Foundation Core", c3: "Monday to Friday (5 Days)", c4: "5 Working Days", c5: "7 Periods (40m each)", c6: "Verified (0 Clashes)", c7: "29 Jun 2024", badge: "badge-active", status: "Live Published" },
      { c1: "TTM-2024-EYFS", c2: "Pre-Primary Wing (Nursery-Prep)", sub: "Activity & Play Cycles", c3: "Monday to Friday (5 Days)", c4: "5 Working Days", c5: "5 Sessions (30m each)", c6: "Verified (0 Clashes)", c7: "30 Jun 2024", badge: "badge-active", status: "Live Published" },
      { c1: "TTM-2024-EXAM", c2: "Half-Yearly Exam Special Cycle", sub: "Morning Exam + Revision", c3: "Special 10-Day Exam Routine", c4: "10 Exam Days", c5: "3-Hour Exam + 1 Revision", c6: "Verified (0 Clashes)", c7: "10 Sep 2024", badge: "badge-active", status: "Archived" },
      { c1: "TTM-2024-LABS", c2: "Senior Secondary Composite Labs", sub: "Block Period Laboratory", c3: "Afternoon Practical Rota", c4: "6 Working Days", c5: "2-Period Block Sessions", c6: "Verified (0 Clashes)", c7: "01 Jul 2024", badge: "badge-active", status: "Live Published" },
      { c1: "TTM-2024-SPORTS", c2: "Games & Physical Education Rota", sub: "Ground & Pool Allocation", c3: "Morning & Evening Cycles", c4: "6 Working Days", c5: "2 Periods / Class / Wk", c6: "Verified (0 Clashes)", c7: "01 Jul 2024", badge: "badge-active", status: "Live Published" }
    ]
  },

  // 10. class-timetable.php
  {
    filename: 'class-timetable.php',
    title: 'Class Timetable',
    icon: 'bi-table',
    isSchedulePage: true,
    actionBtnText: 'Print Class Timetable',
    actionBtnIcon: 'bi-printer-fill',
    desc: 'Section-wise master weekly timetable: Period allocations, classroom locations, and teaching faculty',
    kpi1: { title: "Target Section", val: "Class 10 - Section A", trend: "Room 204, Block A", icon: "bi-table", color: "kpi-primary" },
    kpi2: { title: "Class Teacher", val: "Mrs. Sunita Kaul", trend: "PGT Mathematics", icon: "bi-person-badge-fill", color: "kpi-success" },
    kpi3: { title: "Weekly Periods", val: "48 Periods Total", trend: "Mon to Sat Routine", icon: "bi-calendar3", color: "kpi-info" },
    kpi4: { title: "Lab Blocks", val: "4 Double Blocks", trend: "Physics & Chemistry Labs", icon: "bi-tools", color: "kpi-warning" },
    filterPlaceholder: "Search day, period, subject, faculty, room...",
    filterOptions: ["All Days of Week", "Monday Schedule", "Tuesday Schedule", "Wednesday Schedule", "Thursday Schedule", "Friday Schedule", "Saturday Schedule"],
    statusFilterOptions: ["All Status", "Active Period", "Double Lab Block", "Assembly / Recess"],
    headers: ["Slot / Period Code", "Day & Time Slot", "Period Subject", "Assigned Faculty", "Classroom / Laboratory", "Curriculum Chapter Unit", "Block Type", "Status"],
    rows: [
      { c1: "MON-P1", c2: "Monday (07:45 - 08:30 AM)", sub: "Period 1", c3: "Mathematics (041)", c4: "Mrs. Sunita Kaul (PGT)", c5: "Room #204 (Block A)", c6: "Chapter 8: Trigonometry", badge: "badge-active", status: "Active Period" },
      { c1: "MON-P2", c2: "Monday (08:30 - 09:15 AM)", sub: "Period 2", c3: "English Language (184)", c4: "Mr. Deepak Rawat (PGT)", c5: "Room #204 (Block A)", c6: "First Flight: Madam Rides the Bus", badge: "badge-active", status: "Active Period" },
      { c1: "MON-REC", c2: "Monday (09:15 - 09:30 AM)", sub: "Short Break", c3: "Morning Refreshment & Recess", c4: "Duty Teachers", c5: "Courtyard & Cafeteria", c6: "Nutrition Break", badge: "badge-pending", status: "Recess" },
      { c1: "MON-P3-4", c2: "Monday (09:30 - 11:00 AM)", sub: "Periods 3 & 4 (Block)", c3: "Science Lab: Physics Practical", c4: "Dr. K. L. Sharma (PGT)", c5: "Physics Lab 1 (Block B)", c6: "Ohm's Law Verification Experiment", badge: "badge-active", status: "Double Lab Block" },
      { c1: "MON-LCH", c2: "Monday (11:00 - 11:35 AM)", sub: "Lunch Break", c3: "Mid-Day Dining & Recreation", c4: "Discipline Council", c5: "Dining Hall & Campus Grounds", c6: "Lunch Recess", badge: "badge-pending", status: "Recess" },
      { c1: "MON-P5", c2: "Monday (11:35 - 12:15 PM)", sub: "Period 5", c3: "Social Science (Hist)", c4: "Mrs. Shalini Verma (TGT)", c5: "Room #204 (Block A)", c6: "Nationalism in India", badge: "badge-active", status: "Active Period" },
      { c1: "MON-P6", c2: "Monday (12:15 - 12:55 PM)", sub: "Period 6", c3: "Hindi Course-A", c4: "Mrs. Meenakshi Soni", c5: "Room #204 (Block A)", c6: "Kshitij: Surdas ke Pad", badge: "badge-active", status: "Active Period" },
      { c1: "MON-P7-8", c2: "Monday (12:55 - 02:15 PM)", sub: "Periods 7 & 8 (Block)", c3: "Artificial Intelligence (Skill)", c4: "Mr. Kunal Bansal (MCA)", c5: "Computer Lab 2", c6: "Computer Vision & Python Project", badge: "badge-active", status: "Double Lab Block" }
    ]
  },

  // 11. teacher-timetable.php
  {
    filename: 'teacher-timetable.php',
    title: 'Teacher Timetable',
    icon: 'bi-person-lines-fill',
    isSchedulePage: true,
    actionBtnText: 'Print Faculty Schedule',
    actionBtnIcon: 'bi-printer-fill',
    desc: 'Individual faculty instructional schedules, duty room assignments, lab sessions, and free planning periods',
    kpi1: { title: "Selected Faculty", val: "Dr. K. L. Sharma", trend: "PGT Senior Physics", icon: "bi-person-badge", color: "kpi-primary" },
    kpi2: { title: "Total Workload", val: "30 Periods / Wk", trend: "Optimal 5 Periods / Day", icon: "bi-speedometer2", color: "kpi-success" },
    kpi3: { title: "Lab Practical Slots", val: "6 Blocks (12 Hours)", trend: "Physics Lab 1 & 2", icon: "bi-tools", color: "kpi-info" },
    kpi4: { title: "Free Planning Periods", val: "18 Periods / Wk", trend: "Lesson Prep & Grading", icon: "bi-journal-check", color: "kpi-warning" },
    filterPlaceholder: "Search teacher name, day, period, class room...",
    filterOptions: ["All Teachers", "Dr. K. L. Sharma (Physics)", "Mrs. Sunita Kaul (Maths)", "Mr. Vikram Rathore (Chemistry)", "Mrs. Radhika Iyer (Biology)", "Mr. Deepak Rawat (English)"],
    statusFilterOptions: ["All Status", "Instructional Period", "Laboratory Block", "Free Planning Period", "Examination Duty"],
    headers: ["Schedule ID", "Faculty Name", "Day & Period Slot", "Class & Section Allotted", "Room / Laboratory", "Curriculum Topic", "Period Type", "Status"],
    rows: [
      { c1: "FAC-TT-01", c2: "Dr. K. L. Sharma", sub: "PGT Physics", c3: "Monday - Period 1 (07:45 AM)", c4: "Class 12 - Science (PCM)", c5: "Room #301 (Science Block)", c6: "Unit 3: Magnetic Effects of Current", badge: "badge-active", status: "Instructional" },
      { c1: "FAC-TT-02", c2: "Dr. K. L. Sharma", sub: "PGT Physics", c3: "Monday - Period 2 (08:30 AM)", c4: "Class 12 - Science (PCB)", c5: "Room #302 (Bio Block)", c6: "Unit 3: Electromagnetic Induction", badge: "badge-active", status: "Instructional" },
      { c1: "FAC-TT-03", c2: "Dr. K. L. Sharma", sub: "PGT Physics", c3: "Monday - Periods 3 & 4 (09:30 AM)", c4: "Class 10 - Section A (Lab)", c5: "Physics Lab 1 (Block B)", c6: "Refraction through Glass Prism", badge: "badge-active", status: "Laboratory Block" },
      { c1: "FAC-TT-04", c2: "Dr. K. L. Sharma", sub: "PGT Physics", c3: "Monday - Period 5 (11:35 AM)", c4: "Staff Planning Room", c5: "Department Room #305", c6: "Lesson Planning & Student Doubt Desk", badge: "badge-pending", status: "Free Planning" },
      { c1: "FAC-TT-05", c2: "Dr. K. L. Sharma", sub: "PGT Physics", c3: "Monday - Period 6 (12:15 PM)", c4: "Class 11 - Science (PCM)", c5: "Room #303 (Science Block)", c6: "Work, Energy & Power Derivations", badge: "badge-active", status: "Instructional" },
      { c1: "FAC-TT-06", c2: "Dr. K. L. Sharma", sub: "PGT Physics", c3: "Monday - Period 7 (12:55 PM)", c4: "Staff Planning Room", c5: "Department Room #305", c6: "CBSE Practical Logbook Evaluation", badge: "badge-pending", status: "Free Planning" },
      { c1: "FAC-TT-07", c2: "Dr. K. L. Sharma", sub: "PGT Physics", c3: "Tuesday - Periods 1 & 2 (07:45 AM)", c4: "Class 12 - Science (PCM Lab)", c5: "Physics Lab 1 (Block B)", c6: "Potentiometer Internal Resistance Exp", badge: "badge-active", status: "Laboratory Block" },
      { c1: "FAC-TT-08", c2: "Dr. K. L. Sharma", sub: "PGT Physics", c3: "Tuesday - Period 3 (09:30 AM)", c4: "Class 11 - Science (PCB)", c5: "Room #303 (Science Block)", c6: "Gravitation & Kepler's Laws", badge: "badge-active", status: "Instructional" }
    ]
  },

  // 12. classroom-allocation.php
  {
    filename: 'classroom-allocation.php',
    title: 'Classroom Allocation',
    icon: 'bi-building',
    actionBtnText: 'Allocate Room / Hall',
    actionBtnIcon: 'bi-door-open-fill',
    desc: 'Instructional room capacities, smart board ICT infrastructure, specialized laboratories, and wing incharge allocations',
    kpi1: { title: "Classrooms Active", val: "84 Rooms", trend: "100% Utilized in Morning", icon: "bi-door-closed-fill", color: "kpi-primary" },
    kpi2: { title: "Smart ICT Enabled", val: "72 Interactive IFPDs", trend: "Touch Screens with WiFi", icon: "bi-tv-fill", color: "kpi-success" },
    kpi3: { title: "Specialized Labs", val: "8 Labs", trend: "Physics, Chem, Bio, CS, ATL", icon: "bi-tools", color: "kpi-info" },
    kpi4: { title: "Average Capacity", val: "42 Desks / Room", trend: "Well Ventilated (CBSE Norm)", icon: "bi-aspect-ratio", color: "kpi-warning" },
    filterPlaceholder: "Search room #, block, allocated grade, floor incharge...",
    filterOptions: ["All Campus Blocks", "Block A (Senior Secondary)", "Block B (Secondary & Science Labs)", "Block C (Middle Wing)", "Block D (Primary & Pre-Primary)", "Specialized Lab Wing"],
    statusFilterOptions: ["All Status", "Occupied (Class Allocated)", "Available Slot", "Maintenance"],
    headers: ["Room #", "Room Name / Block", "Assigned Grade & Section", "Seating Capacity", "Smart Board / ICT Enabled", "Floor & Wing", "Floor Incharge", "Status"],
    rows: [
      { c1: "ROOM-204", c2: "Classroom 204", sub: "Block A - First Floor", c3: "Class 10 - Section A", c4: "42 Desks (Capacity 45)", c5: "Yes (75-inch ViewSonic IFPD)", c6: "Floor 1, Senior Secondary Wing", c7: "Mr. S. K. Rastogi", badge: "badge-active", status: "Occupied" },
      { c1: "ROOM-205", c2: "Classroom 205", sub: "Block A - First Floor", c3: "Class 10 - Section B", c4: "42 Desks (Capacity 45)", c5: "Yes (75-inch ViewSonic IFPD)", c6: "Floor 1, Senior Secondary Wing", c7: "Mr. S. K. Rastogi", badge: "badge-active", status: "Occupied" },
      { c1: "ROOM-301", c2: "Classroom 301", sub: "Science Block - Second Floor", c3: "Class 12 - Science (PCM)", c4: "40 Desks (Capacity 40)", c5: "Yes (Interactive Smart Screen)", c6: "Floor 2, Science & Tech Wing", c7: "Dr. K. L. Sharma", badge: "badge-active", status: "Occupied" },
      { c1: "ROOM-302", c2: "Classroom 302", sub: "Science Block - Second Floor", c3: "Class 12 - Science (PCB)", c4: "40 Desks (Capacity 40)", c5: "Yes (Interactive Smart Screen)", c6: "Floor 2, Science & Tech Wing", c7: "Dr. K. L. Sharma", badge: "badge-active", status: "Occupied" },
      { c1: "LAB-PHY-01", c2: "Sir C.V. Raman Physics Lab", sub: "Block B - Ground Floor", c3: "Classes 11 & 12 Practical", c4: "45 Workstations with Apparatus", c5: "Yes (Projector & Digital Sensors)", c6: "Ground Floor, Science Lab Block", c7: "Lab Supdt. Anil Verma", badge: "badge-active", status: "Lab Facility" },
      { c1: "LAB-CHEM-01", c2: "Acharya P.C. Ray Chemistry Lab", sub: "Block B - Ground Floor", c3: "Classes 11 & 12 Practical", c4: "45 Fume Hoods & Burners", c5: "Yes (Safety Shower & Digital Scales)", c6: "Ground Floor, Science Lab Block", c7: "Lab Supdt. R. P. Gupta", badge: "badge-active", status: "Lab Facility" },
      { c1: "LAB-ATL-01", c2: "Atal Tinkering Lab (NITI Aayog)", sub: "Block B - First Floor", c3: "Robotics & Innovation (6-12)", c4: "40 Robotic Stations, 3D Printers", c5: "Yes (IoT Kits, Soldering Stations)", c6: "Floor 1, Innovation Wing", c7: "ATL Incharge Kunal Bansal", badge: "badge-active", status: "Specialized Hub" },
      { c1: "AUD-MAIN", c2: "Dr. APJ Abdul Kalam Auditorium", sub: "Central Academic Block", c3: "Whole School / Large Assemblies", c4: "850 Padded Theater Seats", c5: "Yes (JBL Audio & 4K LED Wall)", c6: "Ground Floor, Central Wing", c7: "Auditorium Mgr Harish", badge: "badge-active", status: "Auditorium" }
    ]
  },

  // 13. period-management.php
  {
    filename: 'period-management.php',
    title: 'Period Management',
    icon: 'bi-clock-history',
    actionBtnText: 'Add Period Slot',
    actionBtnIcon: 'bi-alarm-fill',
    desc: 'Bell schedule configurations, morning assembly timings, zero period zero-hour slots, and recess intervals',
    kpi1: { title: "School Timings", val: "07:30 - 02:15 PM", trend: "6 Hours 45 Mins Daily", icon: "bi-clock", color: "kpi-primary" },
    kpi2: { title: "Total Periods", val: "8 Periods / Day", trend: "40-45 Mins Duration", icon: "bi-bell-fill", color: "kpi-success" },
    kpi3: { title: "Recess Breaks", val: "2 Daily Breaks", trend: "15m Short + 35m Lunch", icon: "bi-cup-hot-fill", color: "kpi-info" },
    kpi4: { title: "Automated Bell", val: "100% Synced", trend: "IoT Digital Siren System", icon: "bi-broadcast", color: "kpi-warning" },
    filterPlaceholder: "Search period #, slot label, time, applies to...",
    filterOptions: ["All Schedule Types", "Regular Summer Schedule", "Winter Shift Timings (08:00 AM)", "Examination Half-Day Slots", "Special Activity Zero Period"],
    statusFilterOptions: ["All Status", "Active Daily Bell", "Recess Interval", "Assembly Slot"],
    headers: ["Period #", "Slot Name / Label", "Start Time", "End Time", "Duration (Mins)", "Applies to Wings", "Bell Ring Audio", "Status"],
    rows: [
      { c1: "SLOT-00", c2: "Morning Assembly & Value Pledge", sub: "Homeroom Attendance", c3: "07:30 AM", c4: "07:45 AM", c5: "15 Mins", c6: "All School Wings (1-12)", c7: "National Anthem Siren", badge: "badge-active", status: "Assembly Slot" },
      { c1: "SLOT-01", c2: "Period 1 (Instructional Core)", sub: "Prime Academic Focus", c3: "07:45 AM", c4: "08:30 AM", c5: "45 Mins", c6: "All School Wings (1-12)", c7: "Single Long Bell Ring", badge: "badge-active", status: "Active Bell" },
      { c1: "SLOT-02", c2: "Period 2 (Instructional Core)", sub: "Academic Period", c3: "08:30 AM", c4: "09:15 AM", c5: "45 Mins", c6: "All School Wings (1-12)", c7: "Single Long Bell Ring", badge: "badge-active", status: "Active Bell" },
      { c1: "SLOT-BRK1", c2: "Short Recess (Nutrition Break)", sub: "Fruit & Water Interval", c3: "09:15 AM", c4: "09:30 AM", c5: "15 Mins", c6: "All School Wings (1-12)", c7: "Double Staccato Bell", badge: "badge-pending", status: "Recess Interval" },
      { c1: "SLOT-03", c2: "Period 3 (Instructional / Lab)", sub: "Lab Double Block Start", c3: "09:30 AM", c4: "10:15 AM", c5: "45 Mins", c6: "All School Wings (1-12)", c7: "Single Long Bell Ring", badge: "badge-active", status: "Active Bell" },
      { c1: "SLOT-04", c2: "Period 4 (Instructional / Lab)", sub: "Lab Double Block End", c3: "10:15 AM", c4: "11:00 AM", c5: "45 Mins", c6: "All School Wings (1-12)", c7: "Single Long Bell Ring", badge: "badge-active", status: "Active Bell" },
      { c1: "SLOT-LNCH", c2: "Main Lunch Break", sub: "Dining & Recreation", c3: "11:00 AM", c4: "11:35 AM", c5: "35 Mins", c6: "All School Wings (1-12)", c7: "Triple Siren Chime", badge: "badge-pending", status: "Recess Interval" },
      { c1: "SLOT-05-8", c2: "Periods 5 to 8 (Afternoon Block)", sub: "Academic & Co-curricular", c3: "11:35 AM", c4: "02:15 PM", c5: "40 Mins each", c6: "All School Wings (1-12)", c7: "Final Dispersal Bell", badge: "badge-active", status: "Active Bell" }
    ]
  },

  // 14. substitute-teachers.php
  {
    filename: 'substitute-teachers.php',
    title: 'Substitute Teachers',
    icon: 'bi-person-switch',
    actionBtnText: 'Assign Substitution',
    actionBtnIcon: 'bi-person-plus',
    desc: 'Automated staff absence coverage, relief period assignments, workload equity, and teacher push alerts',
    kpi1: { title: "Absences Today", val: "4 Faculty on Leave", trend: "Medical & Casual Leaves", icon: "bi-person-x-fill", color: "kpi-warning" },
    kpi2: { title: "Periods Covered", val: "18 of 18 Periods", trend: "100% Zero Free Periods", icon: "bi-shield-check", color: "kpi-success" },
    kpi3: { title: "Automated SMS/App", val: "Sent to Faculty", trend: "Within 30 Secs of Leave", icon: "bi-bell-fill", color: "kpi-primary" },
    kpi4: { title: "Relief Balance", val: "Equitable Rota", trend: "Max 1 Substitution / Teacher", icon: "bi-sliders", color: "kpi-info" },
    filterPlaceholder: "Search absent teacher, substitute, period, class...",
    filterOptions: ["All Substitution Logs", "Today's Active Substitutions", "Yesterday's Coverage", "Weekly Substitution Audit", "Monthly Department Summary"],
    statusFilterOptions: ["All Status", "Confirmed & Accepted", "In Progress", "Completed"],
    headers: ["Sub Log #", "Absent Teacher", "Period # & Time", "Class & Section", "Substitute Teacher Assigned", "Subject Covered", "SMS / App Alert", "Status"],
    rows: [
      { c1: "SUB-TODAY-01", c2: "Mrs. Meenakshi Soni (Hindi)", sub: "Casual Leave Today", c3: "Period 2 (08:30 AM)", c4: "Class 10 - Section A", c5: "Mr. Deepak Rawat (English)", c6: "English Grammar & Reading Session", c7: "Accepted via Mobile App", badge: "badge-active", status: "Completed" },
      { c1: "SUB-TODAY-02", c2: "Mrs. Meenakshi Soni (Hindi)", sub: "Casual Leave Today", c3: "Period 6 (12:15 PM)", c4: "Class 10 - Section B", c5: "Mrs. Shalini Verma (Social)", c6: "Social Science Quiz & Map Work", c7: "Accepted via Mobile App", badge: "badge-active", status: "Completed" },
      { c1: "SUB-TODAY-03", c2: "Mr. Kunal Bansal (CS)", sub: "Medical Leave (Fever)", c3: "Period 7 (12:55 PM)", c4: "Class 12 - Science (PCM)", c5: "Dr. K. L. Sharma (Physics)", c6: "JEE Physics Problem Solving Session", c7: "Accepted via Mobile App", badge: "badge-active", status: "Completed" },
      { c1: "SUB-TODAY-04", c2: "Mr. Kunal Bansal (CS)", sub: "Medical Leave (Fever)", c3: "Period 8 (01:35 PM)", c4: "Class 11 - Science (PCM)", c5: "Mrs. Sunita Kaul (Maths)", c6: "Calculus Doubt Clearing Desk", c7: "Accepted via Mobile App", badge: "badge-active", status: "Completed" },
      { c1: "SUB-TODAY-05", c2: "Mr. Harish Chawla (Sports)", sub: "Inter-School Tournament", c3: "Period 3 (09:30 AM)", c4: "Class 8 - Section C", c5: "Mr. S. K. Rastogi (Maths)", c6: "Indoor Chess & Mental Math Drills", c7: "Accepted via Mobile App", badge: "badge-active", status: "Completed" },
      { c1: "SUB-TODAY-06", c2: "Mrs. Anjali Saxena (Commerce)", sub: "Official Duty", c3: "Period 4 (10:15 AM)", c4: "Class 11 - Commerce", c5: "Mr. M. K. Chawla (Accounts)", c6: "Business Studies Case Studies", c7: "Accepted via Mobile App", badge: "badge-active", status: "Completed" },
      { c1: "SUB-TODAY-07", c2: "Ms. Kavita Joshi (PRT)", sub: "Half-Day Leave", c3: "Period 5 (11:35 AM)", c4: "Class 4 - Section A", c5: "Mrs. Ritu Sharma (PRT)", c6: "Science Activity Demonstration", c7: "Accepted via Mobile App", badge: "badge-active", status: "Completed" },
      { c1: "SUB-TODAY-08", c2: "Mrs. Sunita Kapoor (Psych)", sub: "Counselling Workshop", c3: "Period 6 (12:15 PM)", c4: "Class 12 - Humanities", c5: "Mrs. Radhika Iyer (Bio)", c6: "Career Guidance & Research Discussion", c7: "Accepted via Mobile App", badge: "badge-active", status: "Completed" }
    ]
  },

  // 15. lesson-planning.php
  {
    filename: 'lesson-planning.php',
    title: 'Lesson Planning',
    icon: 'bi-card-checklist',
    actionBtnText: 'Create Lesson Plan',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'Structured 5E pedagogical plans (Engage, Explore, Explain, Elaborate, Evaluate) and HOD approvals',
    kpi1: { title: "Lesson Plans Filed", val: "384 Modules", trend: "100% Units Mapped", icon: "bi-journal-check", color: "kpi-success" },
    kpi2: { title: "5E Model Adopted", val: "100% Plans", trend: "NCERT & CBSE Pedagogy", icon: "bi-check2-all", color: "kpi-primary" },
    kpi3: { title: "HOD Approved", val: "368 Plans", trend: "Vetted by Subject Heads", icon: "bi-patch-check-fill", color: "kpi-info" },
    kpi4: { title: "In Progress / Week", val: "16 Active Plans", trend: "Current Academic Cycle", icon: "bi-clock-history", color: "kpi-warning" },
    filterPlaceholder: "Search lesson plan ID, subject, chapter, grade...",
    filterOptions: ["All Subjects", "Mathematics (041)", "Physics (042)", "Chemistry (043)", "Biology (044)", "Social Science (087)", "English Core (301)"],
    statusFilterOptions: ["All Status", "HOD Approved", "Under HOD Review", "In Revision"],
    headers: ["Plan ID", "Subject & Chapter", "Grade & Section", "Planned Teaching Dates", "Pedagogical Objective", "Teaching Aids / Lab Tools", "HOD Approval", "Status"],
    rows: [
      { c1: "LP-MATH-10-08", c2: "Maths: Ch 8 Introduction to Trigo", sub: "Trigonometric Ratios & Values", c3: "Class 10 - Sec A & B", c4: "21 Oct to 31 Oct 2024", c5: "Apply Sin, Cos, Tan to right-angled triangles", c6: "Clinometer, GeoGebra 3D Software", c7: "Approved by HOD Maths", badge: "badge-active", status: "Approved" },
      { c1: "LP-PHY-12-04", c2: "Physics: Electromagnetic Waves", sub: "Displacement Current & Spectrum", c3: "Class 12 - PCM & PCB", c4: "24 Oct to 02 Nov 2024", c5: "Deduce wave propagation and applications", c6: "Spectrometer, PhET Digital Simulations", c7: "Approved by HOD Science", badge: "badge-active", status: "Approved" },
      { c1: "LP-CHEM-12-05", c2: "Chemistry: Coordination Compounds", sub: "IUPAC Nomenclature & CFT", c3: "Class 12 - PCM & PCB", c4: "18 Oct to 28 Oct 2024", c5: "Understand crystal field splitting theory", c6: "Molecular Model Kits, Colorimetry", c7: "Approved by HOD Science", badge: "badge-active", status: "Approved" },
      { c1: "LP-BIO-12-08", c2: "Biology: Human Health & Disease", sub: "Immunity, Vaccines & Cancer", c3: "Class 12 - PCB", c4: "20 Oct to 30 Oct 2024", c5: "Differentiate innate vs acquired immunity", c6: "Permanent Slides of Plasmodium, Charts", c7: "Approved by HOD Science", badge: "badge-active", status: "Approved" },
      { c1: "LP-ENG-10-06", c2: "English: The Trees (Poem)", sub: "Adrienne Rich Poetic Devices", c3: "Class 10 - Sec A & B", c4: "25 Oct to 29 Oct 2024", c5: "Analyze symbolism of female emancipation", c6: "Smart Board Audio Reading & Video", c7: "Approved by HOD English", badge: "badge-active", status: "Approved" },
      { c1: "LP-SST-10-04", c2: "History: The Age of Industrialisation", sub: "Before the Industrial Revolution", c3: "Class 10 - Sec A & B", c4: "22 Oct to 05 Nov 2024", c5: "Examine proto-industrialization in India", c6: "Historical Maps, Textile Sample Swatches", c7: "Approved by HOD Social", badge: "badge-active", status: "Approved" },
      { c1: "LP-CS-12-06", c2: "CS: Database Management (SQL)", sub: "Group By, Having, Joins", c3: "Class 12 - PCM", c4: "20 Oct to 31 Oct 2024", c5: "Execute relational queries on MySQL database", c6: "Computer Lab, MySQL Workbench", c7: "Approved by HOD CS", badge: "badge-active", status: "Approved" },
      { c1: "LP-ACC-12-05", c2: "Accounts: Company Accounts (Shares)", sub: "Issue of Shares at Premium / Discount", c3: "Class 12 - Commerce", c4: "22 Oct to 08 Nov 2024", c5: "Journalize forfeiture and re-issue of shares", c6: "Annual Reports of Listed Companies", c7: "Approved by HOD Commerce", badge: "badge-active", status: "Approved" }
    ]
  },

  // 16. teaching-diary.php
  {
    filename: 'teaching-diary.php',
    title: 'Teaching Diary',
    icon: 'bi-journal-check',
    actionBtnText: "Log Today's Entry",
    actionBtnIcon: 'bi-pencil-square',
    desc: 'Daily teacher instructional record, pedagogical reflections, homework allotments, and coordinator sign-offs',
    kpi1: { title: "Diaries Logged Today", val: "108 Submitted", trend: "96.4% Compliance by 02 PM", icon: "bi-check2-circle", color: "kpi-success" },
    kpi2: { title: "Active Topics Taught", val: "576 Periods", trend: "Synchronized with Lesson Plan", icon: "bi-journal-text", color: "kpi-primary" },
    kpi3: { title: "Homework Logged", val: "100% Documented", trend: "Within Daily Homework Cap", icon: "bi-house-fill", color: "kpi-info" },
    kpi4: { title: "Academic Inspection", val: "100% Vetted", trend: "Principal & Coordinators", icon: "bi-shield-check", color: "kpi-warning" },
    filterPlaceholder: "Search diary log, faculty name, subject, class...",
    filterOptions: ["All Faculty", "Dr. K. L. Sharma (Physics)", "Mrs. Sunita Kaul (Maths)", "Mr. Vikram Rathore (Chemistry)", "Mrs. Radhika Iyer (Biology)", "Mr. Deepak Rawat (English)"],
    statusFilterOptions: ["All Status", "Reviewed & Signed", "Pending Coordinator Sign", "Revision Requested"],
    headers: ["Diary Log #", "Faculty Full Name", "Subject & Class", "Period #", "Topics Taught Today", "Homework Assigned", "Principal Review", "Status"],
    rows: [
      { c1: "TDR-2024-941", c2: "Mrs. Sunita Kaul", sub: "PGT Mathematics", c3: "Maths - Class 10-A", c4: "Period 1 (07:45 AM)", c5: "Solved Exercise 8.2 Questions 1-5 (Values of 30, 45, 60)", c6: "Solve Ex 8.2 Q6-Q10 in Homework Notebook", c7: "Signed by Coordinator", badge: "badge-active", status: "Signed" },
      { c1: "TDR-2024-942", c2: "Mr. Deepak Rawat", sub: "PGT English", c3: "English - Class 10-A", c4: "Period 2 (08:30 AM)", c5: "Completed reading and vocabulary of 'Madam Rides the Bus'", c6: "Answer 3 Short Questions on Character Sketch", c7: "Signed by Coordinator", badge: "badge-active", status: "Signed" },
      { c1: "TDR-2024-943", c2: "Dr. K. L. Sharma", sub: "PGT Physics", c3: "Physics - Class 12-PCM", c4: "Period 1 (07:45 AM)", c5: "Derived Ampere's Circuital Law & Solenoid magnetic field", c6: "Solve Numerical 4.12, 4.13 from NCERT", c7: "Signed by Coordinator", badge: "badge-active", status: "Signed" },
      { c1: "TDR-2024-944", c2: "Mr. Vikram Rathore", sub: "PGT Chemistry", c3: "Chemistry - Class 12-PCM", c4: "Period 3 (09:30 AM)", c5: "Coordination Compounds: Optical isomerism in complexes", c6: "Draw optical isomers of [Co(en)3]3+", c7: "Signed by Coordinator", badge: "badge-active", status: "Signed" },
      { c1: "TDR-2024-945", c2: "Mrs. Radhika Iyer", sub: "PGT Biology", c3: "Biology - Class 12-PCB", c4: "Period 4 (10:15 AM)", c5: "Structure of Antibody Molecule and types (IgG, IgA, IgM)", c6: "Label antibody diagram with disulfide bonds", c7: "Signed by Coordinator", badge: "badge-active", status: "Signed" },
      { c1: "TDR-2024-946", c2: "Mrs. Shalini Verma", sub: "TGT Social Science", c3: "Social - Class 10-A", c4: "Period 5 (11:35 AM)", c5: "Discussed Non-Cooperation Movement in the Countryside", c6: "Locate Chauri Chaura and Dandi on Map", c7: "Signed by Coordinator", badge: "badge-active", status: "Signed" },
      { c1: "TDR-2024-947", c2: "Mr. M. K. Chawla", sub: "PGT Commerce", c3: "Accounts - Class 12-Comm", c4: "Period 6 (12:15 PM)", c5: "Calls in Arrears and Calls in Advance accounting entries", c6: "Problem #14 from D.K. Goel textbook", c7: "Signed by Coordinator", badge: "badge-active", status: "Signed" },
      { c1: "TDR-2024-948", c2: "Mr. Kunal Bansal", sub: "PGT Computer Science", c3: "CS - Class 12-PCM", c4: "Period 7 (12:55 PM)", c5: "SQL Group By and Aggregate Functions (SUM, AVG, COUNT)", c6: "Write 5 SQL queries on Student Table", c7: "Signed by Coordinator", badge: "badge-active", status: "Signed" }
    ]
  },

  // 17. homework.php
  {
    filename: 'homework.php',
    title: 'Homework Management',
    icon: 'bi-house-door-fill',
    actionBtnText: 'Assign Homework',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'Daily homework assignments, estimated time caps (Max 90 mins/day), mobile notifications, and submission rates',
    kpi1: { title: "Active Tasks", val: "24 Assignments", trend: "Balanced Across Classes", icon: "bi-journal-bookmark", color: "kpi-primary" },
    kpi2: { title: "Submission Rate", val: "94.6% On Time", trend: "Portal & Notebooks", icon: "bi-check2-circle", color: "kpi-success" },
    kpi3: { title: "Daily Homework Cap", val: "Under 90 Mins", trend: "NEP Guideline Compliant", icon: "bi-stopwatch-fill", color: "kpi-info" },
    kpi4: { title: "Parent App Sync", val: "100% Real-time", trend: "Mobile Notifications Sent", icon: "bi-phone-fill", color: "kpi-warning" },
    filterPlaceholder: "Search HW ref #, subject, topic, class, date...",
    filterOptions: ["All Grades", "Class 10 - Secondary", "Class 12 - Senior Secondary", "Class 8 - Middle Wing", "Class 5 - Primary Wing"],
    statusFilterOptions: ["All Status", "Active (Submission Open)", "Closed / Evaluated", "Extended Deadline"],
    headers: ["HW Ref #", "Subject & Topic", "Class & Section", "Submission Deadline", "Estimated Time (Mins)", "Portal / App Status", "Submissions Received", "Status"],
    rows: [
      { c1: "HW-2024-1048", c2: "Mathematics: Ex 8.2 Q6-10", sub: "Trigonometric Values Evaluation", c3: "Class 10 - Section A", c4: "Tomorrow (29 Oct 07:30 AM)", c5: "25 Mins", c6: "Synced to Parent App", c7: "38 of 40 Submitted", badge: "badge-active", status: "Active" },
      { c1: "HW-2024-1047", c2: "Physics: Numerical Problems 4.12-4.14", sub: "Ampere Law Applications", c3: "Class 12 - Science (PCM)", c4: "30 Oct 2024 (07:30 AM)", c5: "35 Mins", c6: "Synced to Parent App", c7: "32 of 35 Submitted", badge: "badge-active", status: "Active" },
      { c1: "HW-2024-1046", c2: "English: Character Sketch Essay", sub: "Madam Rides the Bus (Valli)", c3: "Class 10 - Section A", c4: "30 Oct 2024 (07:30 AM)", c5: "20 Mins", c6: "Synced to Parent App", c7: "39 of 40 Submitted", badge: "badge-active", status: "Active" },
      { c1: "HW-2024-1045", c2: "Chemistry: Isomerism Worksheet #4", sub: "Coordination Compounds", c3: "Class 12 - Science (PCM/B)", c4: "31 Oct 2024 (07:30 AM)", c5: "30 Mins", c6: "Synced to Parent App", c7: "62 of 67 Submitted", badge: "badge-active", status: "Active" },
      { c1: "HW-2024-1044", c2: "Biology: Antibody Structure Diagram", sub: "Colored Labelled Sketch", c3: "Class 12 - Science (PCB)", c4: "29 Oct 2024 (07:30 AM)", c5: "20 Mins", c6: "Synced to Parent App", c7: "31 of 32 Submitted", badge: "badge-active", status: "Active" },
      { c1: "HW-2024-1043", c2: "Social Science: Indian Map Plotting", sub: "Nationalist Movement Locations", c3: "Class 10 - Section B", c4: "30 Oct 2024 (07:30 AM)", c5: "20 Mins", c6: "Synced to Parent App", c7: "37 of 38 Submitted", badge: "badge-active", status: "Active" },
      { c1: "HW-2024-1042", c2: "Accountancy: Problem 14-16", sub: "Calls in Arrears Ledger", c3: "Class 12 - Commerce", c4: "31 Oct 2024 (07:30 AM)", c5: "30 Mins", c6: "Synced to Parent App", c7: "34 of 36 Submitted", badge: "badge-active", status: "Active" },
      { c1: "HW-2024-1041", c2: "CS: SQL Query Practice Set", sub: "Aggregate Functions on Tables", c3: "Class 12 - Science (PCM)", c4: "30 Oct 2024 (07:30 AM)", c5: "25 Mins", c6: "Synced to Parent App", c7: "35 of 35 Submitted", badge: "badge-active", status: "Active" }
    ]
  },

  // 18. assignments.php
  {
    filename: 'assignments.php',
    title: 'Assignments',
    icon: 'bi-clipboard2-check-fill',
    actionBtnText: 'Create Assignment',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'Formal academic term tasks, grading rubrics, plagiarism detection, and student grade book feeds',
    kpi1: { title: "Total Assignments", val: "18 Graded Tasks", trend: "Term 2 Evaluations", icon: "bi-journal-code", color: "kpi-primary" },
    kpi2: { title: "Graded Submissions", val: "842 Evaluated", trend: "Rubric Points Assigned", icon: "bi-check2-all", color: "kpi-success" },
    kpi3: { title: "Average Score", val: "84.8%", trend: "High Scholastic Mastery", icon: "bi-bar-chart-fill", color: "kpi-info" },
    kpi4: { title: "Pending Evaluation", val: "28 Submissions", trend: "Teacher Review Queue", icon: "bi-hourglass-split", color: "kpi-warning" },
    filterPlaceholder: "Search assignment, subject, class, rubric...",
    filterOptions: ["All Subjects", "Mathematics (041)", "Physics (042)", "Chemistry (043)", "Biology (044)", "Social Science (087)", "English Core (301)"],
    statusFilterOptions: ["All Status", "Graded & Published", "Submission Open", "Evaluation in Progress"],
    headers: ["Assign ID", "Assignment Title", "Subject & Class", "Due Date", "Max Marks", "Evaluation Rubric", "Graded Count", "Status"],
    rows: [
      { c1: "ASN-2024-041", c2: "Case-Based Trigonometry Heights & Distances", sub: "Real-world tower & shadow models", c3: "Mathematics - Class 10", c4: "05 Nov 2024", c5: "20 Marks", c6: "Method (10) + Acc (5) + Pres (5)", c7: "76 of 78 Graded", badge: "badge-active", status: "Graded" },
      { c1: "ASN-2024-042", c2: "Investigatory Project: Electromagnetic Waves", sub: "Frequency band research report", c3: "Physics - Class 12", c4: "10 Nov 2024", c5: "25 Marks", c6: "Theory (10) + Data (10) + Viva (5)", c7: "68 of 70 Graded", badge: "badge-active", status: "Graded" },
      { c1: "ASN-2024-043", c2: "Coordination Compounds Synthesis Review", sub: "Article on cis-platin in cancer", c3: "Chemistry - Class 12", c4: "08 Nov 2024", c5: "20 Marks", c6: "Literature (10) + Analysis (10)", c7: "65 of 67 Graded", badge: "badge-active", status: "Graded" },
      { c1: "ASN-2024-044", c2: "Comparative Essay: Eco-Tourism vs Industry", sub: "Environmental ethics analytical essay", c3: "English - Class 12", c4: "02 Nov 2024", c5: "15 Marks", c6: "Grammar (5) + Content (5) + Coh (5)", c7: "140 of 143 Graded", badge: "badge-active", status: "Graded" },
      { c1: "ASN-2024-045", c2: "Financial Statement Analysis of Zomato Ltd", sub: "Ratio analysis & cash flow audit", c3: "Accountancy - Class 12", c4: "12 Nov 2024", c5: "20 Marks", c6: "Formulas (10) + Interp (10)", c7: "34 of 36 Graded", badge: "badge-active", status: "Graded" },
      { c1: "ASN-2024-046", c2: "Python GUI Mini Project: School Attendance", sub: "Tkinter and SQLite connectivity", c3: "Computer Science - Class 12", c4: "15 Nov 2024", c5: "30 Marks", c6: "Code (15) + UI (10) + Doc (5)", c7: "35 of 35 Graded", badge: "badge-active", status: "Graded" },
      { c1: "ASN-2024-047", c2: "Genetics Pedigree Chart Analysis", sub: "Autosomal dominant vs recessive tracking", c3: "Biology - Class 12", c4: "04 Nov 2024", c5: "20 Marks", c6: "Chart (10) + Solutions (10)", c7: "30 of 32 Graded", badge: "badge-active", status: "Graded" },
      { c1: "ASN-2024-048", c2: "Sustainable Development Goals (SDG) Report", sub: "Clean Energy & Climate Action in Delhi", c3: "Social Science - Class 10", c4: "06 Nov 2024", c5: "20 Marks", c6: "Research (10) + Presentation (10)", c7: "75 of 78 Graded", badge: "badge-active", status: "Graded" }
    ]
  },

  // 19. projects.php
  {
    filename: 'projects.php',
    title: 'Projects & Lab Work',
    icon: 'bi-tools',
    actionBtnText: 'Add Lab Project',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'CBSE internal assessment portfolios, science fair working models, and Atal Tinkering Lab innovations',
    kpi1: { title: "Active Projects", val: "42 Lab Models", trend: "Working Science & AI Prototypes", icon: "bi-cpu-fill", color: "kpi-primary" },
    kpi2: { title: "CBSE Internal Ready", val: "100% Portfolios", trend: "20-30 Marks Verified", icon: "bi-patch-check-fill", color: "kpi-success" },
    kpi3: { title: "ATL Patents / Models", val: "8 Inventions", trend: "National Science Congress Nom", icon: "bi-trophy-fill", color: "kpi-info" },
    kpi4: { title: "Faculty Mentors", val: "24 Incharges", trend: "Weekly Lab Guidance", icon: "bi-person-workspace", color: "kpi-warning" },
    filterPlaceholder: "Search project code, title, subject, mentor...",
    filterOptions: ["All Laboratories", "Atal Tinkering Lab (Robotics)", "Physics Research Lab", "Chemistry Experimental Lab", "Biology / Biotech Lab", "Computer Science Lab"],
    statusFilterOptions: ["All Status", "Prototype Completed", "In Experimentation", "Submitted for Grading"],
    headers: ["Project Code", "Project Title & Domain", "Grade & Subject", "Team Size", "Submission Deadline", "CBSE Internal Marks", "Mentor Faculty", "Status"],
    rows: [
      { c1: "PRJ-ATL-01", c2: "Automated Plant Watering via Soil Moisture IoT", sub: "Arduino & ESP8266 Sensor Model", c3: "Class 10 - ATL Robotics", c4: "3 Students Team", c5: "15 Nov 2024", c6: "20 / 20 Internal", c7: "Mr. Kunal Bansal (MCA)", badge: "badge-active", status: "Completed" },
      { c1: "PRJ-PHY-02", c2: "Wireless Power Transmission via Tesla Coil", sub: "Resonant Inductive Coupling", c3: "Class 12 - Physics Core", c4: "2 Students Team", c5: "20 Nov 2024", c6: "30 / 30 Board Pract", c7: "Dr. K. L. Sharma (PGT)", badge: "badge-active", status: "Completed" },
      { c1: "PRJ-CHEM-03", c2: "Extraction of Essential Oils from Spices", sub: "Steam Distillation Apparatus", c3: "Class 12 - Chemistry", c4: "2 Students Team", c5: "18 Nov 2024", c6: "30 / 30 Board Pract", c7: "Mr. Vikram Rathore (PGT)", badge: "badge-active", status: "Completed" },
      { c1: "PRJ-BIO-04", c2: "Bacterial Water Contamination Testing (E. coli)", sub: "Membrane Filtration Culture", c3: "Class 12 - Biology", c4: "2 Students Team", c5: "18 Nov 2024", c6: "30 / 30 Board Pract", c7: "Mrs. Radhika Iyer (PGT)", badge: "badge-active", status: "Completed" },
      { c1: "PRJ-CS-05", c2: "AI Facial Recognition for Attendance", sub: "OpenCV, Python, SQLite Database", c3: "Class 12 - CS (083)", c4: "1 Scholar Project", c5: "25 Nov 2024", c6: "30 / 30 Board Pract", c7: "Mr. Kunal Bansal (MCA)", badge: "badge-active", status: "Completed" },
      { c1: "PRJ-SST-06", c2: "Water Conservation Heritage in Bawlis of Delhi", sub: "Archaeological Survey Study", c3: "Class 10 - Social Science", c4: "4 Students Team", c5: "10 Nov 2024", c6: "20 / 20 Internal", c7: "Mrs. Shalini Verma (TGT)", badge: "badge-active", status: "Completed" },
      { c1: "PRJ-COMM-07", c2: "FinTech App Business Model & Balance Sheet", sub: "UPI Market Penetration Analysis", c3: "Class 12 - Commerce", c4: "2 Students Team", c5: "22 Nov 2024", c6: "20 / 20 Internal", c7: "Mr. M. K. Chawla (PGT)", badge: "badge-active", status: "Completed" },
      { c1: "PRJ-ATL-08", c2: "Smart Blind Stick with Ultrasonic Obstacle Radar", sub: "Haptic Feedback & Buzzer", c3: "Class 9 - ATL Innovation", c4: "3 Students Team", c5: "12 Nov 2024", c6: "20 / 20 Internal", c7: "Mr. Kunal Bansal (MCA)", badge: "badge-active", status: "Completed" }
    ]
  },

  // 20. worksheets.php
  {
    filename: 'worksheets.php',
    title: 'Worksheets & Practice Papers',
    icon: 'bi-file-earmark-text-fill',
    actionBtnText: 'Upload Practice Sheet',
    actionBtnIcon: 'bi-cloud-upload-fill',
    desc: 'Competency-based question banks, Assertion-Reasoning sheets, and CBSE past 10-year board solutions',
    kpi1: { title: "Worksheets Vault", val: "248 Sheets", trend: "PDF Format with Solutions", icon: "bi-file-earmark-pdf-fill", color: "kpi-primary" },
    kpi2: { title: "CBSE Competency Ready", val: "100% NEP Aligned", trend: "Assertion-Reasoning & Case", icon: "bi-patch-check-fill", color: "kpi-success" },
    kpi3: { title: "Student Downloads", val: "14,820 Downloads", trend: "High Revision Activity", icon: "bi-download", color: "kpi-info" },
    kpi4: { title: "Past 10-Year Papers", val: "Full Archives", trend: "2014 to 2024 Solved", icon: "bi-archive-fill", color: "kpi-warning" },
    filterPlaceholder: "Search worksheet title, subject, grade, difficulty...",
    filterOptions: ["All Subjects", "Mathematics (041)", "Physics (042)", "Chemistry (043)", "Biology (044)", "Social Science (087)", "English (301)"],
    statusFilterOptions: ["All Status", "Active Download", "Verified Key Included", "Draft"],
    headers: ["Sheet UID", "Worksheet Title", "Subject & Grade", "Difficulty Level", "Questions Count", "Solution Key Attached", "Downloads Count", "Status"],
    rows: [
      { c1: "WS-MATH-10-04", c2: "Trigonometric Identities Mastery Sheet", sub: "Assertion-Reasoning + Case Studies", c3: "Maths - Class 10", c4: "Advanced Level", c5: "25 Questions", c6: "Step-by-Step PDF Key", c7: "482 Downloads", badge: "badge-active", status: "Active" },
      { c1: "WS-PHY-12-08", c2: "Electromagnetic Induction Derivations Sheet", sub: "Faraday Law & Lenz Law Problems", c3: "Physics - Class 12", c4: "Board Exam Standard", c5: "20 Problems", c6: "Complete Derivations Key", c7: "394 Downloads", badge: "badge-active", status: "Active" },
      { c1: "WS-CHEM-12-05", c2: "Coordination Compounds Nomenclature & Isomers", sub: "IUPAC Rule Drills", c3: "Chemistry - Class 12", c4: "Medium to Advanced", c5: "30 Questions", c6: "Complete Nomenclature Key", c7: "340 Downloads", badge: "badge-active", status: "Active" },
      { c1: "WS-BIO-12-07", c2: "Immunity & Vaccines Diagrammatic Practice", sub: "Antibody Structure & Life Cycle of HIV", c3: "Biology - Class 12", c4: "High Yield Board", c5: "15 Long Questions", c6: "Labelled Answer Key", c7: "312 Downloads", badge: "badge-active", status: "Active" },
      { c1: "WS-ENG-10-03", c2: "Integrated Grammar: Editing & Omission", sub: "Error Correction Drills", c3: "English - Class 10", c4: "Standard Level", c5: "40 Sentences", c6: "Verified Solution Key", c7: "520 Downloads", badge: "badge-active", status: "Active" },
      { c1: "WS-SST-10-06", c2: "History Map Pointing: Nationalism in India", sub: "INC Sessions & Satyagraha Centers", c3: "Social - Class 10", c4: "Standard Level", c5: "15 Map Items", c6: "Annotated Map Key", c7: "490 Downloads", badge: "badge-active", status: "Active" },
      { c1: "WS-CS-12-04", c2: "SQL Table Queries & Aggregate Functions", sub: "SELECT with GROUP BY, HAVING", c3: "CS - Class 12", c4: "Practical Exam Focus", c5: "20 Database Queries", c6: "Tested SQL Script Key", c7: "285 Downloads", badge: "badge-active", status: "Active" },
      { c1: "WS-ACC-12-05", c2: "Issue & Forfeiture of Shares Comprehensive", sub: "Pro-Rata Allotment Scenarios", c3: "Accounts - Class 12", c4: "Advanced Board Level", c5: "12 Comprehensive Cases", c6: "Detailed Working Notes", c7: "315 Downloads", badge: "badge-active", status: "Active" }
    ]
  },

  // 21. study-materials.php
  {
    filename: 'study-materials.php',
    title: 'Study Materials',
    icon: 'bi-file-earmark-pdf-fill',
    actionBtnText: 'Upload Study Material',
    actionBtnIcon: 'bi-cloud-plus-fill',
    desc: 'Digital resource repository: NCERT Mind Maps, formula cheat sheets, revision PPTs, and video lectures',
    kpi1: { title: "Digital Assets", val: "312 Files", trend: "Curated by Faculty Heads", icon: "bi-folder-fill", color: "kpi-primary" },
    kpi2: { title: "Mind Maps & Formulas", val: "100% Chapters", trend: "Quick 5-Minute Revisions", icon: "bi-diagram-2-fill", color: "kpi-success" },
    kpi3: { title: "Total Student Views", val: "28,420 Views", trend: "Available on Student App", icon: "bi-eye-fill", color: "kpi-info" },
    kpi4: { title: "Audio / Video Lectures", val: "64 Recorded", trend: "Recorded in Smart Studio", icon: "bi-camera-video-fill", color: "kpi-warning" },
    filterPlaceholder: "Search material title, subject, format, class...",
    filterOptions: ["All Formats", "PDF Revision Notes", "Mind Map Infographics", "Formula Cheat Sheet", "Presentation (PPTX)", "Lab Manual"],
    statusFilterOptions: ["All Status", "Published to Portal", "Verified by HOD", "Draft"],
    headers: ["Material UID", "Material Title", "Subject & Chapter", "Grade & Stream", "File Type & Size", "Uploaded By", "Student Downloads", "Status"],
    rows: [
      { c1: "MAT-MATH-10", c2: "Class 10 All Formulas & Theorems Cheat Sheet", sub: "Comprehensive 8-Page Booklet", c3: "Maths - Class 10", c4: "PDF (2.4 MB)", c5: "Mrs. Sunita Kaul (PGT)", c6: "1,240 Downloads", badge: "badge-active", status: "Published" },
      { c1: "MAT-PHY-12", c2: "Physics Formula & Ray Optics Ray Diagrams", sub: "Handwritten Color Coded Notes", c3: "Physics - Class 12", c4: "PDF (3.8 MB)", c5: "Dr. K. L. Sharma (PGT)", c6: "980 Downloads", badge: "badge-active", status: "Published" },
      { c1: "MAT-CHEM-12", c2: "Organic Chemistry Reaction Mechanisms Map", sub: "Name Reactions & Reagents", c3: "Chemistry - Class 12", c4: "PDF (4.1 MB)", c5: "Mr. Vikram Rathore (PGT)", c6: "920 Downloads", badge: "badge-active", status: "Published" },
      { c1: "MAT-BIO-12", c2: "Human Reproduction & Genetics Mind Maps", sub: "Visual Flowcharts for Quick Recall", c3: "Biology - Class 12", c4: "PDF (3.2 MB)", c5: "Mrs. Radhika Iyer (PGT)", c6: "740 Downloads", badge: "badge-active", status: "Published" },
      { c1: "MAT-CS-12", c2: "Python Functions, Tuples & MySQL Cheat Sheet", sub: "Syntax Reference Guide", c3: "CS - Class 12", c4: "PDF (1.8 MB)", c5: "Mr. Kunal Bansal (MCA)", c6: "680 Downloads", badge: "badge-active", status: "Published" },
      { c1: "MAT-SST-10", c2: "Complete Social Science Map Workbook 2024", sub: "All Geography & History Points", c3: "Social - Class 10", c4: "PDF (5.4 MB)", c5: "Mrs. Shalini Verma (TGT)", c6: "1,150 Downloads", badge: "badge-active", status: "Published" },
      { c1: "MAT-ENG-10", c2: "English First Flight Poetic Devices Summary", sub: "Rhyme Scheme & Figures of Speech", c3: "English - Class 10", c4: "PDF (1.5 MB)", c5: "Mr. Deepak Rawat (PGT)", c6: "890 Downloads", badge: "badge-active", status: "Published" },
      { c1: "MAT-ACC-12", c2: "Cash Flow Statements Format & Accounting Ratios", sub: "Step-by-Step Ledger Guide", c3: "Accounts - Class 12", c4: "PDF (2.8 MB)", c5: "Mr. M. K. Chawla (PGT)", c6: "620 Downloads", badge: "badge-active", status: "Published" }
    ]
  },

  // 22. learning-outcomes.php
  {
    filename: 'learning-outcomes.php',
    title: 'Learning Outcomes',
    icon: 'bi-bullseye',
    actionBtnText: 'Define Learning Outcome',
    actionBtnIcon: 'bi-plus-lg',
    desc: 'NEP 2020 competency benchmarks, Bloom taxonomy mappings, rubrics, and cohort mastery levels',
    kpi1: { title: "Outcomes Defined", val: "184 Competencies", trend: "Mapped across All Subjects", icon: "bi-bullseye", color: "kpi-primary" },
    kpi2: { title: "Cohort Mastery", val: "82.4% Achieved", trend: "Exceeds 75% CBSE Benchmark", icon: "bi-check2-circle", color: "kpi-success" },
    kpi3: { title: "Blooms Taxonomy", val: "6 Cognitive Levels", trend: "Remembering to Creating", icon: "bi-diagram-3", color: "kpi-info" },
    kpi4: { title: "Remedial Focus", val: "14 Outcomes", trend: "Targeted in Doubt Clinics", icon: "bi-exclamation-triangle-fill", color: "kpi-warning" },
    filterPlaceholder: "Search outcome code, competency, subject, Bloom level...",
    filterOptions: ["All Bloom Taxonomy Levels", "Level 1: Remembering & Recall", "Level 2: Understanding & Explain", "Level 3: Applying & Problem Solving", "Level 4: Analyzing & Deconstructing", "Level 5: Evaluating & Creating"],
    statusFilterOptions: ["All Status", "Mastery Achieved (>80%)", "Progressing (70-79%)", "Needs Intervention (<70%)"],
    headers: ["Outcome Code", "Competency Description", "Subject & Grade", "Blooms Taxonomy Level", "Assessment Tool", "Mastery % Target", "Current Cohort %", "Status"],
    rows: [
      { c1: "LO-MATH-10-01", c2: "Apply trigonometric ratios to compute indirect heights & distances", sub: "Trigonometry Competency", c3: "Mathematics (041) - Cl 10", c4: "Level 3: Applying", c5: "Case-based Worksheet & PT", c6: "80.0%", c7: "84.6% Mastered", badge: "badge-active", status: "Mastered" },
      { c1: "LO-PHY-12-01", c2: "Analyze Faraday and Lenz laws in electromagnetic induction circuits", sub: "Electromagnetism Competency", c3: "Physics (042) - Cl 12", c4: "Level 4: Analyzing", c5: "Lab Practical & Numerical Exam", c6: "75.0%", c7: "78.2% Mastered", badge: "badge-active", status: "Mastered" },
      { c1: "LO-CHEM-12-01", c2: "Differentiate coordination complexes using Crystal Field Theory", sub: "Inorganic Chemistry", c3: "Chemistry (043) - Cl 12", c4: "Level 4: Analyzing", c5: "Conceptual Objective Tests", c6: "75.0%", c7: "74.8% Progressing", badge: "badge-pending", status: "Progressing" },
      { c1: "LO-BIO-12-01", c2: "Evaluate role of innate and acquired immunity in disease defense", sub: "Immunology Competency", c3: "Biology (044) - Cl 12", c4: "Level 5: Evaluating", c5: "Case Scenario Analysis", c6: "80.0%", c7: "82.4% Mastered", badge: "badge-active", status: "Mastered" },
      { c1: "LO-ENG-10-01", c2: "Deconstruct poetic devices and thematic symbolism in modern poetry", sub: "Literary Analysis", c3: "English (184) - Cl 10", c4: "Level 4: Analyzing", c5: "Critical Appreciation Essay", c6: "80.0%", c7: "86.0% Mastered", badge: "badge-active", status: "Mastered" },
      { c1: "LO-SST-10-01", c2: "Evaluate economic and social impacts of anti-colonial movements in India", sub: "Historical Inquiry", c3: "Social Science (087) - Cl 10", c4: "Level 5: Evaluating", c5: "DBQ Document-Based Questions", c6: "75.0%", c7: "79.4% Mastered", badge: "badge-active", status: "Mastered" },
      { c1: "LO-CS-12-01", c2: "Construct complex relational SQL queries involving grouping and joins", sub: "Database Engineering", c3: "Computer Science (083) - Cl 12", c4: "Level 6: Creating", c5: "Lab Terminal Practical Exam", c6: "85.0%", c7: "88.5% Mastered", badge: "badge-active", status: "Mastered" },
      { c1: "LO-ACC-12-01", c2: "Compute and journalize company share capital forfeiture transactions", sub: "Corporate Accounting", c3: "Accountancy (055) - Cl 12", c4: "Level 3: Applying", c5: "Problem Solving Ledger Exam", c6: "80.0%", c7: "81.2% Mastered", badge: "badge-active", status: "Mastered" }
    ]
  },

  // 23. syllabus-completion.php
  {
    filename: 'syllabus-completion.php',
    title: 'Syllabus Completion',
    icon: 'bi-graph-up-arrow',
    actionBtnText: 'Update Completion Audit',
    actionBtnIcon: 'bi-check-all',
    desc: 'Term-wise teaching velocity audits, department progress benchmarks, and pre-board completion deadlines',
    kpi1: { title: "Average Completion", val: "76.4% Completed", trend: "Exceeds Oct Target (75%)", icon: "bi-graph-up", color: "kpi-success" },
    kpi2: { title: "Target Board Deadline", val: "15 Jan 2025", trend: "Full Revision Window (45 Days)", icon: "bi-calendar-event", color: "kpi-primary" },
    kpi3: { title: "On-Track Courses", val: "44 of 48 Subjects", trend: "Green Track Status", icon: "bi-shield-check", color: "kpi-info" },
    kpi4: { title: "Pace Adjustment", val: "4 Subjects Alert", trend: "Extra Classes Scheduled", icon: "bi-exclamation-triangle-fill", color: "kpi-warning" },
    filterPlaceholder: "Search audit code, subject, class, faculty...",
    filterOptions: ["All Departments", "Science Department (PCM/B)", "Mathematics Department", "Commerce Department", "Humanities Department", "Languages Department"],
    statusFilterOptions: ["All Status", "On Track (>75%)", "Target Met", "Pace Alert (<70%)"],
    headers: ["Audit Code", "Subject & Code", "Class & Section", "Faculty Incharge", "Chapters Planned", "Chapters Completed", "Progress %", "Status"],
    rows: [
      { c1: "AUD-SYL-01", c2: "Mathematics (041)", sub: "Target Finish: 10 Jan", c3: "Class 10 - Section A", c4: "Mrs. Sunita Kaul (PGT)", c5: "14 Chapters", c6: "11 Chapters Done", c7: "78.5% Complete", badge: "badge-active", status: "On Track" },
      { c1: "AUD-SYL-02", c2: "Physics (042)", sub: "Target Finish: 05 Jan", c3: "Class 12 - Science (PCM)", c4: "Dr. K. L. Sharma (PGT)", c5: "14 Units", c6: "11 Units Done", c7: "78.5% Complete", badge: "badge-active", status: "On Track" },
      { c1: "AUD-SYL-03", c2: "Chemistry (043)", sub: "Target Finish: 12 Jan", c3: "Class 12 - Science (PCM/B)", c4: "Mr. Vikram Rathore (PGT)", c5: "10 Major Units", c6: "7.5 Units Done", c7: "75.0% Complete", badge: "badge-active", status: "On Track" },
      { c1: "AUD-SYL-04", c2: "Biology (044)", sub: "Target Finish: 08 Jan", c3: "Class 12 - Science (PCB)", c4: "Mrs. Radhika Iyer (PGT)", c5: "13 Chapters", c6: "10.5 Chapters Done", c7: "80.7% Complete", badge: "badge-active", status: "On Track" },
      { c1: "AUD-SYL-05", c2: "English Core (301)", sub: "Target Finish: 20 Dec", c3: "Class 12 - All Streams", c4: "Mr. Deepak Rawat (PGT)", c5: "Full Syllabus", c6: "82% Syllabus Done", c7: "82.0% Complete", badge: "badge-active", status: "On Track" },
      { c1: "AUD-SYL-06", c2: "Computer Science (083)", sub: "Target Finish: 10 Jan", c3: "Class 12 - Science (PCM)", c4: "Mr. Kunal Bansal (MCA)", c5: "3 Major Units", c6: "2.5 Units Done", c7: "83.3% Complete", badge: "badge-active", status: "On Track" },
      { c1: "AUD-SYL-07", c2: "Social Science (087)", sub: "Target Finish: 15 Jan", c3: "Class 10 - Section B", c4: "Mrs. Shalini Verma (TGT)", c5: "21 Chapters", c6: "15 Chapters Done", c7: "71.4% (Pace Alert)", badge: "badge-pending", status: "Pace Alert" },
      { c1: "AUD-SYL-08", c2: "Accountancy (055)", sub: "Target Finish: 05 Jan", c3: "Class 12 - Commerce", c4: "Mr. M. K. Chawla (PGT)", c5: "9 Units", c6: "7.2 Units Done", c7: "80.0% Complete", badge: "badge-active", status: "On Track" }
    ]
  },

  // 24. lab-scheduling.php
  {
    filename: 'lab-scheduling.php',
    title: 'Practical & Lab Scheduling',
    icon: 'bi-radioactive',
    isSchedulePage: true,
    actionBtnText: 'Schedule Lab Slot',
    actionBtnIcon: 'bi-calendar-plus-fill',
    desc: 'Laboratory rotation rosters, apparatus readiness logs, chemical inventories, and lab assistant duty rotas',
    kpi1: { title: "Practical Labs", val: "8 Active Facilities", trend: "Full Lab Apparatus Ready", icon: "bi-tools", color: "kpi-primary" },
    kpi2: { title: "Weekly Lab Slots", val: "144 Block Hours", trend: "100% Practical Hours Met", icon: "bi-clock-fill", color: "kpi-success" },
    kpi3: { title: "Safety Audits", val: "100% Certified", trend: "Fire & Eye Wash Certified", icon: "bi-shield-fill-check", color: "kpi-info" },
    kpi4: { title: "Chemical Vault Stock", val: "98% In Stock", trend: "Reagents for Annual Exam", icon: "bi-box-seam-fill", color: "kpi-warning" },
    filterPlaceholder: "Search lab booking, facility, experiment, instructor...",
    filterOptions: ["All Laboratories", "Sir C.V. Raman Physics Lab", "Acharya P.C. Ray Chemistry Lab", "Hargobind Khorana Biology Lab", "Ada Lovelace Computer Lab", "Atal Tinkering Innovation Lab"],
    statusFilterOptions: ["All Status", "Confirmed Slot", "Equipment Prepared", "In Session"],
    headers: ["Lab Booking #", "Laboratory Facility", "Class & Section", "Experiment / Topic", "Lab Instructor", "Time Slot", "Chemicals / Equipment Ready", "Status"],
    rows: [
      { c1: "LAB-SCH-01", c2: "Sir C.V. Raman Physics Lab", sub: "Block B Ground Floor", c3: "Class 12 - Science (PCM)", c4: "Potentiometer: Comparison of EMF of Two Cells", c5: "Dr. K. L. Sharma (PGT)", c6: "Monday (09:30 - 11:00 AM)", c7: "Yes (Galvanometer & Accumulators Ready)", badge: "badge-active", status: "Confirmed" },
      { c1: "LAB-SCH-02", c2: "Acharya P.C. Ray Chemistry Lab", sub: "Block B Ground Floor", c3: "Class 12 - Science (PCM)", c4: "Titration: M/20 Mohr Salt vs KMnO4", c5: "Mr. Vikram Rathore (PGT)", c6: "Tuesday (09:30 - 11:00 AM)", c7: "Yes (Burettes, Pipettes & Reagents)", badge: "badge-active", status: "Confirmed" },
      { c1: "LAB-SCH-03", c2: "Hargobind Khorana Biology Lab", sub: "Block B First Floor", c3: "Class 12 - Science (PCB)", c4: "Pollen Germination on Slide under Microscope", c5: "Mrs. Radhika Iyer (PGT)", c6: "Wednesday (09:30 - 11:00 AM)", c7: "Yes (Compound Microscopes & Slides)", badge: "badge-active", status: "Confirmed" },
      { c1: "LAB-SCH-04", c2: "Ada Lovelace Computer Lab 1", sub: "Block B First Floor", c3: "Class 12 - Science (PCM)", c4: "Python GUI Connectivity with MySQL Database", c5: "Mr. Kunal Bansal (MCA)", c6: "Thursday (09:30 - 11:00 AM)", c7: "Yes (40 Workstations Synced)", badge: "badge-active", status: "Confirmed" },
      { c1: "LAB-SCH-05", c2: "Atal Tinkering Innovation Lab", sub: "Block B First Floor", c3: "Class 10 - Section A", c4: "Sensors Calibration & 3D Model Slicing", c5: "Mr. Kunal Bansal (MCA)", c6: "Friday (12:55 - 02:15 PM)", c7: "Yes (Ultimaker 3D Printers Ready)", badge: "badge-active", status: "Confirmed" },
      { c1: "LAB-SCH-06", c2: "Sir C.V. Raman Physics Lab", sub: "Block B Ground Floor", c3: "Class 10 - Section B", c4: "Ohm's Law: Resistance Verification", c5: "Dr. K. L. Sharma (PGT)", c6: "Tuesday (12:55 - 02:15 PM)", c7: "Yes (Voltmeters & Ammeters Calibrated)", badge: "badge-active", status: "Confirmed" },
      { c1: "LAB-SCH-07", c2: "Acharya P.C. Ray Chemistry Lab", sub: "Block B Ground Floor", c3: "Class 10 - Section A", c4: "pH Indicator Test on Acid & Base Samples", c5: "Mr. Vikram Rathore (PGT)", c6: "Wednesday (12:55 - 02:15 PM)", c7: "Yes (Litmus, Universal Indicator Paper)", badge: "badge-active", status: "Confirmed" },
      { c1: "LAB-SCH-08", c2: "Ada Lovelace Computer Lab 2", sub: "Block B First Floor", c3: "Class 10 - Section B", c4: "AI Computer Vision: OpenCV Edge Detection", c5: "Mr. Kunal Bansal (MCA)", c6: "Thursday (12:55 - 02:15 PM)", c7: "Yes (Jupyter Notebooks Deployed)", badge: "badge-active", status: "Confirmed" }
    ]
  },

  // 25. remedial-classes.php
  {
    filename: 'remedial-classes.php',
    title: 'Remedial Classes',
    icon: 'bi-heart-pulse-fill',
    isSchedulePage: true,
    actionBtnText: 'Schedule Remedial Batch',
    actionBtnIcon: 'bi-calendar-plus',
    desc: 'Support intervention clinics for scholars below 40% threshold, personalized doubt solving, and diagnostic tests',
    kpi1: { title: "Remedial Batches", val: "12 Small Batches", trend: "Max 15 Students / Batch", icon: "bi-people", color: "kpi-primary" },
    kpi2: { title: "Scholars Supported", val: "148 Students", trend: "Post Periodic Test 1 Diagnostic", icon: "bi-person-check-fill", color: "kpi-success" },
    kpi3: { title: "Grade Improvement", val: "+18.4% Score Jump", trend: "From Red to Green Band", icon: "bi-graph-up-arrow", color: "kpi-info" },
    kpi4: { title: "Timing Slot", val: "02:15 - 03:00 PM", trend: "Zero Impact on Main Routine", icon: "bi-clock-fill", color: "kpi-warning" },
    filterPlaceholder: "Search batch ID, subject, grade, faculty...",
    filterOptions: ["All Subjects", "Mathematics (Core Doubts)", "Physics (Numericals & Derivations)", "Chemistry (Organic Reactions)", "Social Science (Answer Writing)", "English (Grammar Foundations)"],
    statusFilterOptions: ["All Status", "Active Remedial Clinic", "Target Improvement Met", "Scheduled"],
    headers: ["Batch ID", "Subject Focus", "Target Grade", "Faculty Lead", "Students Enrolled", "Target Competency", "Schedule Slot", "Status"],
    rows: [
      { c1: "REM-MATH-10", c2: "Mathematics: Quadratic Equations & Trigo", sub: "Focus on NCERT basic formulas", c3: "Class 10 - Sec A & B", c4: "Mrs. Sunita Kaul (PGT)", c5: "14 Students", c6: "Solve 3-mark board questions", c7: "Mon & Wed (02:15 - 03:00 PM)", badge: "badge-active", status: "Active Clinic" },
      { c1: "REM-PHY-12", c2: "Physics: Electric Charges & Current Circuit", sub: "Kirchhoff Law numerical problems", c3: "Class 12 - Science (PCM)", c4: "Dr. K. L. Sharma (PGT)", c5: "12 Students", c6: "Circuit analysis mastery", c7: "Tue & Thu (02:15 - 03:00 PM)", badge: "badge-active", status: "Active Clinic" },
      { c1: "REM-CHEM-12", c2: "Chemistry: Electrochemistry & Kinetics", sub: "Nernst equation & rate laws", c3: "Class 12 - Science (PCM/B)", c4: "Mr. Vikram Rathore (PGT)", c5: "15 Students", c6: "Numerical calculation accuracy", c7: "Mon & Fri (02:15 - 03:00 PM)", badge: "badge-active", status: "Active Clinic" },
      { c1: "REM-SST-10", c2: "Social Science: Map Work & 5-Mark Answers", sub: "Answer presentation technique", c3: "Class 10 - Sec A & B", c4: "Mrs. Shalini Verma (TGT)", c5: "16 Students", c6: "Full marks on map items", c7: "Wed & Fri (02:15 - 03:00 PM)", badge: "badge-active", status: "Active Clinic" },
      { c1: "REM-ENG-10", c2: "English: Grammar Editing & Formal Letters", sub: "Sentence structure & format drills", c3: "Class 10 - Sec A & B", c4: "Mr. Deepak Rawat (PGT)", c5: "10 Students", c6: "Error identification accuracy", c7: "Tue & Thu (02:15 - 03:00 PM)", badge: "badge-active", status: "Active Clinic" },
      { c1: "REM-ACC-12", c2: "Accountancy: Partnership Fundamentals", sub: "P&L Appropriation & Capital Accounts", c3: "Class 12 - Commerce", c4: "Mr. M. K. Chawla (PGT)", c5: "11 Students", c6: "Error-free ledger posting", c7: "Mon & Wed (02:15 - 03:00 PM)", badge: "badge-active", status: "Active Clinic" },
      { c1: "REM-BIO-12", c2: "Biology: Genetics Numerical & Crosses", sub: "Dihybrid cross & linkage problems", c3: "Class 12 - Science (PCB)", c4: "Mrs. Radhika Iyer (PGT)", c5: "9 Students", c6: "Punnett square analysis", c7: "Tue & Thu (02:15 - 03:00 PM)", badge: "badge-active", status: "Active Clinic" },
      { c1: "REM-CS-12", c2: "CS: Python Loops, Lists & SQL Queries", sub: "Trace output & query debugging", c3: "Class 12 - Science (PCM)", c4: "Mr. Kunal Bansal (MCA)", c5: "8 Students", c6: "Bug-free code execution", c7: "Fri (02:15 - 03:30 PM)", badge: "badge-active", status: "Active Clinic" }
    ]
  },

  // 26. extra-classes.php
  {
    filename: 'extra-classes.php',
    title: 'Extra Classes & Olympiads',
    icon: 'bi-trophy-fill',
    isSchedulePage: true,
    actionBtnText: 'Schedule Olympiad Batch',
    actionBtnIcon: 'bi-trophy',
    desc: 'Advanced competitive examination mentoring: NTSE, IMO/NSO Olympiads, JEE/NEET foundational coaching',
    kpi1: { title: "Olympiad Scholars", val: "184 Candidates", trend: "High Aptitude Cohort", icon: "bi-award-fill", color: "kpi-success" },
    kpi2: { title: "Competitive Tracks", val: "6 Advanced Tracks", trend: "IMO, NSO, JEE, NEET, KVPY", icon: "bi-trophy", color: "kpi-primary" },
    kpi3: { title: "National Ranks (Last Yr)", val: "14 Top 100", trend: "Zonal & National Gold", icon: "bi-star-fill", color: "kpi-info" },
    kpi4: { title: "Weekend Sessions", val: "Saturday Mornings", trend: "Special 3-Hour Masterclasses", icon: "bi-calendar2-week-fill", color: "kpi-warning" },
    filterPlaceholder: "Search olympiad batch, competition, grade, mentor...",
    filterOptions: ["All Competitions", "International Mathematics Olympiad (IMO)", "National Science Olympiad (NSO)", "JEE Advanced Physics & Math", "NEET Medical Biology Sprint", "CBSE Science Exhibition Team"],
    statusFilterOptions: ["All Status", "Active Coaching Batch", "Competition Registered", "Trial Shortlisted"],
    headers: ["Olympiad Batch #", "Competition / Focus", "Grade Band", "Lead Mentor", "Selected Scholars", "Weekly Sessions", "Competition Date", "Status"],
    rows: [
      { c1: "OLY-IMO-10", c2: "International Math Olympiad (IMO Level 2)", sub: "Advanced Combinatorics & Number Theory", c3: "Classes 9 & 10", c4: "Mrs. Sunita Kaul (PGT)", c5: "28 Top Scholars", c6: "Saturdays (08:00 - 10:30 AM)", c7: "15 Dec 2024", badge: "badge-active", status: "Active Coaching" },
      { c1: "OLY-NSO-12", c2: "National Science Olympiad (NSO Senior)", sub: "Advanced Physics & Chemistry", c3: "Classes 11 & 12", c4: "Dr. K. L. Sharma & Team", c5: "35 Top Scholars", c6: "Saturdays (08:00 - 11:00 AM)", c7: "22 Dec 2024", badge: "badge-active", status: "Active Coaching" },
      { c1: "OLY-JEE-12", c2: "IIT-JEE Advanced Problem Solving Sprint", sub: "Irodov Physics & Advanced Calculus", c3: "Class 12 - PCM", c4: "Dr. K. L. Sharma (PGT)", c5: "40 Aspirants", c6: "Mon/Wed/Fri (02:15 - 04:00 PM)", c7: "Jan 2025 (JEE Main 1)", badge: "badge-active", status: "Active Coaching" },
      { c1: "OLY-NEET-12", c2: "NEET Medical Rapid NCERT Sprint", sub: "High-yield Biology & Organic Chem", c3: "Class 12 - PCB", c4: "Mrs. Radhika Iyer (PGT)", c5: "32 Aspirants", c6: "Tue/Thu/Sat (02:15 - 04:00 PM)", c7: "May 2025 (NEET UG)", badge: "badge-active", status: "Active Coaching" },
      { c1: "OLY-NTSE-10", c2: "National Talent Search (NTSE / State Aptitude)", sub: "Mental Ability (MAT) & Scholastic (SAT)", c3: "Class 10", c4: "Mrs. Shalini Verma & Team", c5: "30 Top Scholars", c6: "Saturdays (08:30 - 11:30 AM)", c7: "Nov 2024", badge: "badge-active", status: "Active Coaching" },
      { c1: "OLY-ROBO-MID", c2: "World Robot Olympiad (WRO Innovation)", sub: "Autonomous EV Navigation Challenge", c3: "Classes 6 to 9 (ATL)", c4: "Mr. Kunal Bansal (MCA)", c5: "12 Finalists (4 Teams)", c6: "Daily Lab Sessions", c7: "08 Dec 2024", badge: "badge-active", status: "Active Coaching" },
      { c1: "OLY-DEBATE-SR", c2: "National Parliamentary Debate Championship", sub: "Geopolitics, Economics, Ethics", c3: "Classes 10 to 12", c4: "Mr. Deepak Rawat (PGT)", c5: "8 Team Orators", c6: "Saturdays (10:30 - 12:30 PM)", c7: "18 Nov 2024", badge: "badge-active", status: "Active Coaching" },
      { c1: "OLY-ASTR-MID", c2: "National Astronomy & Space Olympiad", sub: "Telescope Observation & Astrophysics", c3: "Classes 7 to 9", c4: "Dr. K. L. Sharma (PGT)", c5: "22 Young Scientists", c6: "Night Sky Camps & Sats", c7: "10 Jan 2025", badge: "badge-active", status: "Active Coaching" }
    ]
  },

  // 27. academic-progress.php
  {
    filename: 'academic-progress.php',
    title: 'Academic Progress',
    icon: 'bi-speedometer',
    actionBtnText: 'Generate Progress Report',
    actionBtnIcon: 'bi-file-earmark-bar-graph-fill',
    desc: 'Holistic performance analytics, periodic test trends, subject-wise grade distributions, and student growth trajectories',
    kpi1: { title: "Scholars Evaluated", val: "2,840 Students", trend: "Mid-Term Examinations Done", icon: "bi-people-fill", color: "kpi-primary" },
    kpi2: { title: "School Average Aggregate", val: "84.2%", trend: "Top Tier City Benchmark", icon: "bi-graph-up", color: "kpi-success" },
    kpi3: { title: "Distinction Rate (75%+)", val: "78.5% Scholars", trend: "2,230 in First Division", icon: "bi-star-fill", color: "kpi-info" },
    kpi4: { title: "CBSE LOC 90%+ Aim", val: "410 Scholars", trend: "Board Merit Roll Candidates", icon: "bi-award-fill", color: "kpi-warning" },
    filterPlaceholder: "Search student, admission #, grade, trajectory...",
    filterOptions: ["All Grades", "Class 10 - Secondary", "Class 12 - Senior Secondary", "Class 8 - Middle Wing", "Class 5 - Primary Wing"],
    statusFilterOptions: ["All Status", "Outstanding Growth", "Consistent High Performer", "Moderate Progress", "Needs Remedial"],
    headers: ["Progress UID", "Student Full Name", "Grade & Section", "PT-1 Score", "Mid-Term Score", "PT-2 Score", "Overall Aggregate", "Academic Trajectory"],
    rows: [
      { c1: "PRG-2024-001", c2: "Aarav Sharma", sub: "Adm #001", c3: "Class 10 - Section A", c4: "92.0% (46/50)", c5: "94.6% (75.7/80)", c6: "95.0% (47.5/50)", c7: "94.2% (Grade A1)", badge: "badge-active", status: "Consistent Top Tier" },
      { c1: "PRG-2024-002", c2: "Diya Patel", sub: "Adm #002", c3: "Class 10 - Section A", c4: "94.0% (47/50)", c5: "96.2% (77/80)", c6: "96.5% (48.2/50)", c7: "95.8% (Grade A1)", badge: "badge-active", status: "Consistent Top Tier" },
      { c1: "PRG-2024-003", c2: "Vihaan Singh", sub: "Adm #003", c3: "Class 10 - Section B", c4: "84.0% (42/50)", c5: "88.4% (70.7/80)", c6: "90.0% (45/50)", c7: "88.2% (Grade A2)", badge: "badge-active", status: "Upward Trajectory (+6%)" },
      { c1: "PRG-2024-004", c2: "Ananya Iyer", sub: "Adm #004", c3: "Class 10 - Section B", c4: "88.0% (44/50)", c5: "91.8% (73.4/80)", c6: "92.0% (46/50)", c7: "91.2% (Grade A1)", badge: "badge-active", status: "Consistent Top Tier" },
      { c1: "PRG-2024-005", c2: "Rohan Gupta", sub: "Adm #005", c3: "Class 12 - Science (PCM)", c4: "82.0% (41/50)", c5: "85.2% (68.1/80)", c6: "88.0% (44/50)", c7: "85.6% (Grade A2)", badge: "badge-active", status: "Upward Trajectory (+6%)" },
      { c1: "PRG-2024-006", c2: "Ishaan Verma", sub: "Adm #006", c3: "Class 12 - Science (PCB)", c4: "80.0% (40/50)", c5: "83.6% (66.8/80)", c6: "85.0% (42.5/50)", c7: "83.4% (Grade A2)", badge: "badge-active", status: "Consistent Progress" },
      { c1: "PRG-2024-007", c2: "Meera Nambiar", sub: "Adm #007", c3: "Class 8 - Section C", c4: "95.0% (47.5/50)", c5: "97.0% (77.6/80)", c6: "97.5% (48.7/50)", c7: "96.8% (Grade A1)", badge: "badge-active", status: "Consistent Top Tier" },
      { c1: "PRG-2024-008", c2: "Kabir Malhotra", sub: "Adm #008", c3: "Class 5 - Section A", c4: "90.0% (45/50)", c5: "92.4% (73.9/80)", c6: "93.0% (46.5/50)", c7: "92.1% (Grade A1)", badge: "badge-active", status: "Consistent Top Tier" }
    ]
  }
];

// Generate each table submodule
let count = 0;
for (const d of submodules) {
  const filePath = path.join(ACADEMICS_DIR, d.filename);
  const content = generateTablePage(d);
  fs.writeFileSync(filePath, content, 'utf8');
  count++;
  console.log(`[GENERATED] academics/${d.filename} (${d.title})`);
}

// -------------------------------------------------------------
// BESPOKE ACADEMIC DASHBOARD (dashboard.php)
// -------------------------------------------------------------
const dashboardPath = path.join(ACADEMICS_DIR, 'dashboard.php');
const dashboardContent = `<?php
/**
 * EDUSYS PRO - ACADEMIC MANAGEMENT COMMAND CENTER (DASHBOARD)
 * Real-time academic oversight: Syllabus tracking, timetable periods, faculty workload, and substitutions
 */
$page_title = "Academic Dashboard";
$page_desc = "Central pedagogical command: Syllabus coverage, timetable periods, faculty allocations, and NEP 2020 progress";
$active_module = "academics";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/academics/dashboard.php'); ?>">Academic Management</a></li>
      <li class="breadcrumb-item active" aria-current="page">Academic Dashboard</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-mortarboard-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/academics/class-timetable.php'); ?>" class="btn btn-light border">
      <i class="bi bi-table me-1"></i> Class Timetable
    </a>
    <a href="<?php echo base_url('modules/academics/substitute-teachers.php'); ?>" class="btn btn-warning text-dark fw-bold">
      <i class="bi bi-person-switch me-1"></i> Substitutions (4 Today)
    </a>
    <a href="<?php echo base_url('modules/academics/timetable-builder.php'); ?>" class="btn btn-primary fw-bold">
      <i class="bi bi-calendar3-week me-1"></i> Timetable Builder
    </a>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Overall Syllabus Completion</h6>
        <div class="kpi-value">76.4%</div>
        <div class="kpi-trend positive"><i class="bi bi-arrow-up-short"></i> +3.2% Ahead of Benchmark</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-journal-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Active Class Sections</h6>
        <div class="kpi-value">72 Sections</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 2,840 Scholars Mapped</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-diagram-3-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Periods Today</h6>
        <div class="kpi-value">576 Slots</div>
        <div class="kpi-trend positive"><i class="bi bi-clock-history"></i> 8 Periods per Section</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar3"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Faculty on Duty</h6>
        <div class="kpi-value">108 / 112</div>
        <div class="kpi-trend neutral"><i class="bi bi-shield-check"></i> 4 Substitutions Active</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-workspace"></i></div>
    </div>
  </div>
</div>

<!-- Department Progress & Today's Substitution Feed -->
<div class="row g-4 mb-4">
  <div class="col-lg-8">
    <div class="card border-0 shadow-sm p-4 h-100">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-bar-chart-line text-primary me-2"></i>Department-wise Syllabus Velocity & Progress</h5>
        <span class="badge bg-light text-primary border">Target: 15 Jan 2025</span>
      </div>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 font-size-13">
          <thead class="table-light">
            <tr>
              <th>Academic Department</th>
              <th>HOD Faculty</th>
              <th>Courses</th>
              <th>Completed / Total</th>
              <th>Progress %</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-atom text-primary me-2"></i>Science (Physics, Chem, Bio)</td>
              <td>Dr. K. L. Sharma</td>
              <td>12 Courses</td>
              <td>112 / 144 Units</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: 77.7%;"></div>
                  </div>
                  <span class="fw-bold">77.7%</span>
                </div>
              </td>
              <td><span class="badge bg-success-subtle text-success">On Schedule</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-calculator text-info me-2"></i>Mathematics & Statistics</td>
              <td>Mrs. Sunita Kaul</td>
              <td>8 Courses</td>
              <td>68 / 88 Units</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-info" style="width: 77.2%;"></div>
                  </div>
                  <span class="fw-bold">77.2%</span>
                </div>
              </td>
              <td><span class="badge bg-success-subtle text-success">On Schedule</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-briefcase text-success me-2"></i>Commerce & Business Studies</td>
              <td>Mr. M. K. Chawla</td>
              <td>6 Courses</td>
              <td>42 / 52 Units</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-success" style="width: 80.7%;"></div>
                  </div>
                  <span class="fw-bold">80.7%</span>
                </div>
              </td>
              <td><span class="badge bg-success-subtle text-success">Ahead (+4%)</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-globe-americas text-warning me-2"></i>Humanities & Social Sciences</td>
              <td>Mrs. Shalini Verma</td>
              <td>10 Courses</td>
              <td>72 / 98 Units</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-warning" style="width: 73.4%;"></div>
                  </div>
                  <span class="fw-bold">73.4%</span>
                </div>
              </td>
              <td><span class="badge bg-warning-subtle text-warning">Pace Review</span></td>
            </tr>
            <tr>
              <td class="fw-bold text-dark"><i class="bi bi-translate text-purple me-2" style="color: #6f42c1;"></i>Languages (Eng, Hin, Skt)</td>
              <td>Mr. Deepak Rawat</td>
              <td>8 Courses</td>
              <td>66 / 82 Units</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1" style="height: 6px;">
                    <div class="progress-bar bg-purple" style="width: 80.4%; background-color: #6f42c1;"></div>
                  </div>
                  <span class="fw-bold">80.4%</span>
                </div>
              </td>
              <td><span class="badge bg-success-subtle text-success">On Schedule</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card border-0 shadow-sm p-4 h-100">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-person-switch text-warning me-2"></i>Active Substitutions</h5>
        <span class="badge bg-warning text-dark font-size-11">Today (4 Active)</span>
      </div>
      <ul class="list-group list-group-flush font-size-13">
        <li class="list-group-item px-0">
          <div class="d-flex justify-content-between">
            <strong class="text-dark">Class 10-A &bull; Period 2</strong>
            <span class="badge bg-success-subtle text-success">Covered</span>
          </div>
          <small class="text-muted d-block">Absent: Mrs. Meenakshi Soni (Hindi)</small>
          <small class="text-primary fw-semibold"><i class="bi bi-arrow-return-right me-1"></i>Covered by: Mr. Deepak Rawat</small>
        </li>
        <li class="list-group-item px-0">
          <div class="d-flex justify-content-between">
            <strong class="text-dark">Class 10-B &bull; Period 6</strong>
            <span class="badge bg-success-subtle text-success">Covered</span>
          </div>
          <small class="text-muted d-block">Absent: Mrs. Meenakshi Soni (Hindi)</small>
          <small class="text-primary fw-semibold"><i class="bi bi-arrow-return-right me-1"></i>Covered by: Mrs. Shalini Verma</small>
        </li>
        <li class="list-group-item px-0">
          <div class="d-flex justify-content-between">
            <strong class="text-dark">Class 12-PCM &bull; Period 7</strong>
            <span class="badge bg-success-subtle text-success">Covered</span>
          </div>
          <small class="text-muted d-block">Absent: Mr. Kunal Bansal (CS)</small>
          <small class="text-primary fw-semibold"><i class="bi bi-arrow-return-right me-1"></i>Covered by: Dr. K. L. Sharma</small>
        </li>
        <li class="list-group-item px-0">
          <div class="d-flex justify-content-between">
            <strong class="text-dark">Class 11-PCM &bull; Period 8</strong>
            <span class="badge bg-success-subtle text-success">Covered</span>
          </div>
          <small class="text-muted d-block">Absent: Mr. Kunal Bansal (CS)</small>
          <small class="text-primary fw-semibold"><i class="bi bi-arrow-return-right me-1"></i>Covered by: Mrs. Sunita Kaul</small>
        </li>
      </ul>
      <div class="mt-auto pt-3">
        <a href="<?php echo base_url('modules/academics/substitute-teachers.php'); ?>" class="btn btn-outline-warning text-dark btn-sm w-100 fw-bold">
          <i class="bi bi-person-lines-fill me-1"></i> View Full Substitution Ledger
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
console.log(`[GENERATED] academics/dashboard.php (Academic Dashboard)`);

console.log(`\nSuccessfully generated ${count} bespoke Academic Management submodules.`);

