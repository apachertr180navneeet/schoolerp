/**
 * EDUSYS PRO - COMPLETE DOMAIN-SPECIFIC UI GENERATOR FOR ALL 28 MODULES
 * Generates rich, authentic, domain-tailored UI, realistic Indian CBSE data,
 * domain KPIs, specialized filters, and custom tables across all submodules.
 */

const fs = require('fs');
const path = require('path');

const ROOT_DIR = path.resolve(__dirname, '..');
const PROTO_DIR = path.join(ROOT_DIR, 'prototype');
const MODULES_DIR = path.join(PROTO_DIR, 'modules');

// Protected files that were custom hand-crafted and must NOT be overwritten
const PROTECTED_FILES = [
  'prototype/modules/administration/school-profile.php',
  'prototype/modules/administration/school-branding.php',
  'prototype/modules/administration/academic-sessions.php',
  'prototype/modules/administration/classes.php',
  'prototype/modules/administration/sections.php',
  'prototype/modules/administration/streams.php',
  'prototype/modules/administration/departments.php',
  'prototype/modules/administration/subjects.php'
];

// Helper: Normalize relative path for checking protected files
function isProtected(filePath) {
  const norm = filePath.replace(/\\/g, '/');
  return PROTECTED_FILES.some(p => norm.endsWith(p));
}

// Read modules configuration from prototype/includes/config.php
const configContent = fs.readFileSync(path.join(PROTO_DIR, 'includes', 'config.php'), 'utf8');

// Parse $modules_registry from config.php
function extractModules() {
  const modBlocks = [];
  const regex = /\[\s*'key'\s*=>\s*'([^']+)',\s*'name'\s*=>\s*'([^']+)',\s*'icon'\s*=>\s*'([^']+)',\s*'submodules'\s*=>\s*\[([\s\S]*?)\]\s*\]/g;
  let match;
  while ((match = regex.exec(configContent)) !== null) {
    const key = match[1];
    const name = match[2];
    const icon = match[3];
    const subsBlock = match[4];
    
    const submodules = [];
    const subRegex = /\['file'\s*=>\s*'([^']+)',\s*'title'\s*=>\s*'([^']+)'\]/g;
    let subMatch;
    while ((subMatch = subRegex.exec(subsBlock)) !== null) {
      submodules.push({ file: subMatch[1], title: subMatch[2] });
    }
    modBlocks.push({ key, name, icon, submodules });
  }
  return modBlocks;
}

const allModules = extractModules();
console.log(`Found ${allModules.length} modules to process.`);

// Domain Dataset Generator
function getDomainTemplate(modKey, subFile, subTitle) {
  const f = subFile.toLowerCase();
  const t = subTitle.toLowerCase();

  // 1. ADMISSIONS
  if (modKey === 'admissions') {
    return {
      kpi1: { title: "Total Applications", val: "842 Applicants", trend: "+18% vs last year", icon: "bi-person-plus-fill", color: "kpi-primary" },
      kpi2: { title: "Enquiries This Month", val: "215 Leads", trend: "78% Followed up", icon: "bi-telephone-inbound-fill", color: "kpi-info" },
      kpi3: { title: "Merit Shortlisted", val: "320 Candidates", trend: "Grade A Approved", icon: "bi-award-fill", color: "kpi-success" },
      kpi4: { title: "Seats Confirmed", val: "184 / 220", trend: "83.6% Seats Filled", icon: "bi-check-circle-fill", color: "kpi-warning" },
      filterPlaceholder: "Search applicant name, application #, parent...",
      filterOptions: ["All Admission Stages", "Enquiry Registered", "Document Scrutiny", "Interview Scheduled", "Merit Approved", "Fee Paid / Enrolled"],
      filterOptionName: "Admission Stage",
      headers: ["Application / Ref #", "Candidate Full Name", "Grade Applied", "Parent / Guardian", "Contact Number", "Lead Source", "Date Submitted", "Status"],
      rows: [
        { c1: "ADM-2025-0841", c2: "Advik Agarwal", sub: "Class 1 - Nursery", c3: "Pre-Primary Wing", c4: "Sanjay Agarwal", c5: "+91 98112 44556", c6: "Website Portal", c7: "28 Oct 2024", badge: "badge-active", status: "Enrolled" },
        { c1: "ADM-2025-0840", c2: "Saanvi Reddy", sub: "Class 6 - Middle", c3: "Middle Wing", c4: "Dr. K. S. Reddy", c5: "+91 98223 55667", c6: "Referral / Sibling", c7: "27 Oct 2024", badge: "badge-active", status: "Merit Approved" },
        { c1: "ADM-2025-0839", c2: "Reyansh Joshi", sub: "Class 11 - Science (PCM)", c3: "Senior Secondary", c4: "Mahesh Joshi", c5: "+91 98334 66778", c6: "Walk-in Counter", c7: "26 Oct 2024", badge: "badge-pending", status: "Entrance Test" },
        { c1: "ADM-2025-0838", c2: "Prisha Nair", sub: "Class 11 - Commerce", c3: "Senior Secondary", c4: "Gopalan Nair", c5: "+91 98445 77889", c6: "Digital Campaign", c7: "25 Oct 2024", badge: "badge-active", status: "Fee Paid" },
        { c1: "ADM-2025-0837", c2: "Arya Deshmukh", sub: "Class 9 - Secondary", c3: "Secondary Wing", c4: "Sunil Deshmukh", c5: "+91 98556 88990", c6: "Open House", c7: "25 Oct 2024", badge: "badge-pending", status: "Scrutiny" },
        { c1: "ADM-2025-0836", c2: "Kabir Mehta", sub: "Class 3 - Primary", c3: "Primary Wing", c4: "Rakesh Mehta", c5: "+91 98667 99001", c6: "Website Portal", c7: "24 Oct 2024", badge: "badge-active", status: "Interviewed" },
        { c1: "ADM-2025-0835", c2: "Zara Khan", sub: "Class 11 - Humanities", c3: "Senior Secondary", c4: "Tariq Khan", c5: "+91 98778 11223", c6: "Transfer / Relocation", c7: "23 Oct 2024", badge: "badge-active", status: "Merit Approved" },
        { c1: "ADM-2025-0834", c2: "Ayaan Sen", sub: "Class 1 - Prep", c3: "Pre-Primary Wing", c4: "Debashis Sen", c5: "+91 98889 22334", c6: "Alumni Parent", c7: "22 Oct 2024", badge: "badge-inactive", status: "Waiting List" }
      ]
    };
  }

  // 2. STUDENTS / SIS
  if (modKey === 'students') {
    return {
      kpi1: { title: "Total Enrolled", val: "2,840 Students", trend: "100% Roster Synced", icon: "bi-backpack-fill", color: "kpi-primary" },
      kpi2: { title: "Boys vs Girls", val: "1,480 / 1,360", trend: "Balanced 52:48 Ratio", icon: "bi-gender-ambiguous", color: "kpi-info" },
      kpi3: { title: "APAAR IDs Linked", val: "2,822 / 2,840", trend: "99.4% MoE Validated", icon: "bi-fingerprint", color: "kpi-success" },
      kpi4: { title: "CBSE LOC Registered", val: "420 Board Batches", trend: "Class 10 & 12 Verified", icon: "bi-shield-check", color: "kpi-warning" },
      filterPlaceholder: "Search student by name, admission #, roll no, APAAR ID...",
      filterOptions: ["All Academic Grades", "Class 12 - Senior Sec", "Class 11 - Senior Sec", "Class 10 - Secondary", "Class 9 - Secondary", "Classes 6–8 - Middle", "Classes 1–5 - Primary"],
      filterOptionName: "Grade / Wing",
      headers: ["Scholar / Adm #", "Student Full Name", "Grade & Section", "Roll No", "Father / Guardian", "Emergency Contact", "APAAR / Aadhaar UID", "Status"],
      rows: [
        { c1: "ED-8491", c2: "Aarav Sharma", sub: "Class 10 - Section A", c3: "Class 10 - Sec A", c4: "01", c5: "Rajesh Sharma", c6: "+91 98112 34567", c7: "APAAR-8941-0294", badge: "badge-active", status: "Active / Paid" },
        { c1: "ED-8492", c2: "Diya Patel", sub: "Class 10 - Section A", c3: "Class 10 - Sec A", c4: "02", c5: "Bhavin Patel", c6: "+91 98223 45678", c7: "APAAR-8941-0295", badge: "badge-active", status: "Active / Paid" },
        { c1: "ED-8493", c2: "Vihaan Singh", sub: "Class 10 - Section B", c3: "Class 10 - Sec B", c4: "01", c5: "Manpreet Singh", c6: "+91 98334 56789", c7: "APAAR-8941-0296", badge: "badge-active", status: "Active" },
        { c1: "ED-8494", c2: "Ananya Iyer", sub: "Class 10 - Section B", c3: "Class 10 - Sec B", c4: "02", c5: "R. Venkatesh Iyer", c6: "+91 98445 67890", c7: "APAAR-8941-0297", badge: "badge-active", status: "Active" },
        { c1: "ED-8495", c2: "Rohan Gupta", sub: "Class 12 - PCM", c3: "Class 12 - Sec A", c4: "14", c5: "Sanjay Gupta", c6: "+91 98556 78901", c7: "APAAR-8941-0298", badge: "badge-active", status: "Active / LOC" },
        { c1: "ED-8496", c2: "Ishaan Verma", sub: "Class 12 - PCB", c3: "Class 12 - Sec B", c4: "08", c5: "Dr. Alok Verma", c6: "+91 98667 89012", c7: "APAAR-8941-0299", badge: "badge-active", status: "Active / LOC" },
        { c1: "ED-8497", c2: "Meera Reddy", sub: "Class 8 - Section A", c3: "Class 8 - Sec A", c4: "11", c5: "K. S. Reddy", c6: "+91 98778 90123", c7: "APAAR-8941-0300", badge: "badge-active", status: "Active" },
        { c1: "ED-8498", c2: "Kabir Sengupta", sub: "Class 9 - Section C", c3: "Class 9 - Sec C", c4: "06", c5: "Debashis Sengupta", c6: "+91 98889 01234", c7: "APAAR-8941-0301", badge: "badge-active", status: "Active" }
      ]
    };
  }

  // 3. ATTENDANCE
  if (modKey === 'attendance') {
    return {
      kpi1: { title: "Today's Attendance", val: "95.8%", trend: "2,721 Present Today", icon: "bi-calendar-check-fill", color: "kpi-success" },
      kpi2: { title: "Absenteeism", val: "119 Students", trend: "SMS Sent to Parents", icon: "bi-person-x-fill", color: "kpi-warning" },
      kpi3: { title: "Staff Attendance", val: "186 / 190", trend: "97.9% On Duty", icon: "bi-person-badge-fill", color: "kpi-primary" },
      kpi4: { title: "RFID Sync Health", val: "100% Online", icon: "bi-wifi", trend: "16 Gate Turnstiles Live", color: "kpi-info" },
      filterPlaceholder: "Search attendance by roll, student name, class...",
      filterOptions: ["All Status", "Present (RFID In)", "Absent / Unexcused", "Leave with Approval", "Late Arrival", "Half Day Dispatched"],
      filterOptionName: "Attendance Status",
      headers: ["Punch / Ref #", "Student / Staff Name", "Class & Section", "In-Time (Turnstile)", "Out-Time", "Logging Mode", "SMS Notification", "Status"],
      rows: [
        { c1: "ATT-1028-091", c2: "Aarav Sharma", sub: "Roll: 14", c3: "Class 10 - Section A", c4: "07:38 AM", c5: "--", c6: "RFID Smart Card", c7: "Parent Alert Delivered", badge: "badge-active", status: "Present" },
        { c1: "ATT-1028-092", c2: "Diya Patel", sub: "Roll: 02", c3: "Class 10 - Section A", c4: "07:41 AM", c5: "--", c6: "RFID Smart Card", c7: "Parent Alert Delivered", badge: "badge-active", status: "Present" },
        { c1: "ATT-1028-093", c2: "Vihaan Singh", sub: "Roll: 01", c3: "Class 10 - Section B", c4: "07:44 AM", c5: "--", c6: "Facial Recognition", c7: "Parent Alert Delivered", badge: "badge-active", status: "Present" },
        { c1: "ATT-1028-094", c2: "Karan Malhotra", sub: "Roll: 19", c3: "Class 10 - Section B", c4: "--", c5: "--", c6: "Absentee Scan", c7: "Absent SMS Sent @ 08:30", badge: "badge-inactive", status: "Absent" },
        { c1: "ATT-1028-095", c2: "Rohan Gupta", sub: "Roll: 14", c3: "Class 12 - Science A", c4: "07:35 AM", c5: "--", c6: "RFID Smart Card", c7: "Parent Alert Delivered", badge: "badge-active", status: "Present" },
        { c1: "ATT-1028-096", c2: "Ishaan Verma", sub: "Roll: 08", c3: "Class 12 - Science B", c4: "08:02 AM", c5: "--", c6: "Gate Guard Manual", c7: "Late In SMS Sent", badge: "badge-pending", status: "Late Arrival" },
        { c1: "ATT-1028-097", c2: "Meera Reddy", sub: "Roll: 11", c3: "Class 8 - Section A", c4: "07:40 AM", c5: "--", c6: "RFID Smart Card", c7: "Parent Alert Delivered", badge: "badge-active", status: "Present" },
        { c1: "ATT-1028-098", c2: "Tanvi Saxena", sub: "Roll: 23", c3: "Class 9 - Section A", c4: "--", c5: "--", c6: "Medical Leave Portal", c7: "Approved Medical Leave", badge: "badge-pending", status: "Excused Leave" }
      ]
    };
  }

  // 4. ACADEMICS & TIMETABLE
  if (modKey === 'academics') {
    return {
      kpi1: { title: "Syllabus Coverage", val: "74.8% Done", trend: "CBSE Term 2 On Track", icon: "bi-journal-check", color: "kpi-success" },
      kpi2: { title: "Weekly Periods", val: "560 Periods", trend: "38 Classrooms Active", icon: "bi-clock-history", color: "kpi-primary" },
      kpi3: { title: "Lesson Plans Submitted", val: "142 / 148", trend: "96% Weekly Compliance", icon: "bi-file-earmark-ruled-fill", color: "kpi-info" },
      kpi4: { title: "Proxy Substitutions", val: "3 Active", trend: "All Classes Covered", icon: "bi-person-switch", color: "kpi-warning" },
      filterPlaceholder: "Search timetable, subject, teacher, class...",
      filterOptions: ["All Grades", "Class 12 - Senior Sec", "Class 11 - Senior Sec", "Class 10 - Secondary", "Class 9 - Secondary", "Classes 6-8 - Middle"],
      filterOptionName: "Grade / Wing",
      headers: ["Slot / Lesson Code", "Subject & Curriculum Code", "Grade & Section", "Assigned Faculty", "Classroom / Lab", "Period Time Slot", "Weekly Sessions", "Status"],
      rows: [
        { c1: "TT-10A-01", c2: "Mathematics (041)", sub: "Chapter 8: Trigo", c3: "Class 10 - Section A", c4: "Mr. S. K. Rastogi", c5: "Room 304, Block B", c6: "Period 1 (07:45–08:30)", c7: "6 Periods / Wk", badge: "badge-active", status: "Active" },
        { c1: "TT-10A-02", c2: "Science (086)", sub: "Chapter 4: Carbon", c3: "Class 10 - Section A", c4: "Mr. Vikram Rathore", c5: "Physics Lab 1", c6: "Period 2 (08:30–09:15)", c7: "6 Periods / Wk", badge: "badge-active", status: "Active" },
        { c1: "TT-10A-03", c2: "English Core (301)", sub: "First Flight: Prose", c3: "Class 10 - Section A", c4: "Mrs. Priya Nambiar", c5: "Room 304, Block B", c6: "Period 3 (09:15–10:00)", c7: "5 Periods / Wk", badge: "badge-active", status: "Active" },
        { c1: "TT-12A-01", c2: "Physics (042)", sub: "Wave Optics", c3: "Class 12 - Science A", c4: "Mr. Vikram Rathore", c5: "Room 401, Block C", c6: "Period 1 (07:45–08:30)", c7: "7 Periods / Wk", badge: "badge-active", status: "Active" },
        { c1: "TT-12A-02", c2: "Chemistry (043)", sub: "Electrochemistry", c3: "Class 12 - Science A", c4: "Dr. Anuj Jha", c5: "Chemistry Lab 2", c6: "Period 2 (08:30–09:15)", c7: "7 Periods / Wk", badge: "badge-active", status: "Active" },
        { c1: "TT-12C-01", c2: "Accountancy (055)", sub: "Partnership Dissolution", c3: "Class 12 - Commerce", c4: "Mr. M. K. Aggarwal", c5: "Room 403, Block C", c6: "Period 1 (07:45–08:30)", c7: "7 Periods / Wk", badge: "badge-active", status: "Active" },
        { c1: "TT-10B-04", c2: "Social Science (087)", sub: "Nationalism in India", c3: "Class 10 - Section B", c4: "Mrs. Rashmi Sen", c5: "Room 305, Block B", c6: "Period 4 (10:15–11:00)", c7: "5 Periods / Wk", badge: "badge-active", status: "Active" },
        { c1: "TT-09A-03", c2: "Artificial Intelligence (843)", sub: "Python Data Science", c3: "Class 9 - Section A", c4: "Mr. Rohit Ganguly", c5: "AI & Robotics Lab", c6: "Period 3 (09:15–10:00)", c7: "3 Periods / Wk", badge: "badge-active", status: "Active" }
      ]
    };
  }

  // 5. EXAMINATIONS
  if (modKey === 'examinations') {
    return {
      kpi1: { title: "Upcoming Tests", val: "28 Papers", trend: "Term 2 Mid-Term Cycle", icon: "bi-journal-code", color: "kpi-primary" },
      kpi2: { title: "Class Average", val: "78.4%", trend: "+3.2% vs Term 1", icon: "bi-graph-up-arrow", color: "kpi-success" },
      kpi3: { title: "Moderated Papers", val: "100%", trend: "CBSE Norms Validated", icon: "bi-shield-check", color: "kpi-info" },
      kpi4: { title: "Marks Published", val: "2,840 / 2,840", trend: "Report Cards Ready", icon: "bi-award-fill", color: "kpi-warning" },
      filterPlaceholder: "Search exam code, subject, evaluator...",
      filterOptions: ["All Assessments", "Periodic Test 1", "Half-Yearly Examination", "Periodic Test 2", "Pre-Board Mock 1", "CBSE Annual Board Exam"],
      filterOptionName: "Exam Cycle",
      headers: ["Exam / Test Code", "Subject & Paper Title", "Grade / Stream", "Date & Time", "Maximum Marks", "Average Score", "Evaluator Faculty", "Result Status"],
      rows: [
        { c1: "EX-10-MAT-T2", c2: "Mathematics (Standard - 041)", sub: "Theory Paper", c3: "Class 10 (A, B, C)", c4: "24 Nov 2024 • 09:30 AM", c5: "80 Marks", c6: "64.2 / 80 (80.2%)", c7: "Mr. S. K. Rastogi", badge: "badge-active", status: "Verified & Locked" },
        { c1: "EX-10-SCI-T2", c2: "Science (Theory - 086)", sub: "Theory Paper", c3: "Class 10 (A, B, C)", c4: "26 Nov 2024 • 09:30 AM", c5: "80 Marks", c6: "61.8 / 80 (77.2%)", c7: "Mr. Vikram Rathore", badge: "badge-active", status: "Verified & Locked" },
        { c1: "EX-10-ENG-T2", c2: "English Lang & Literature (301)", sub: "ASL + Theory", c3: "Class 10 (A, B, C)", c4: "28 Nov 2024 • 09:30 AM", c5: "80 Marks", c6: "68.5 / 80 (85.6%)", c7: "Mrs. Priya Nambiar", badge: "badge-active", status: "Verified & Locked" },
        { c1: "EX-12-PHY-T2", c2: "Physics (Theory - 042)", sub: "CBSE Mock 1", c3: "Class 12 (Science)", c4: "29 Nov 2024 • 09:30 AM", c5: "70 Marks", c6: "52.4 / 70 (74.8%)", c7: "Mr. Vikram Rathore", badge: "badge-pending", status: "In Evaluation" },
        { c1: "EX-12-CHE-T2", c2: "Chemistry (Theory - 043)", sub: "CBSE Mock 1", c3: "Class 12 (Science)", c4: "02 Dec 2024 • 09:30 AM", c5: "70 Marks", c6: "54.1 / 70 (77.2%)", c7: "Dr. Anuj Jha", badge: "badge-pending", status: "In Evaluation" },
        { c1: "EX-12-ACC-T2", c2: "Accountancy (055)", sub: "Theory + Project", c3: "Class 12 (Commerce)", c4: "02 Dec 2024 • 09:30 AM", c5: "80 Marks", c6: "62.0 / 80 (77.5%)", c7: "Mr. M. K. Aggarwal", badge: "badge-active", status: "Published" },
        { c1: "EX-10-SST-T2", c2: "Social Science (087)", sub: "Theory + Map Work", c3: "Class 10 (A, B, C)", c4: "04 Dec 2024 • 09:30 AM", c5: "80 Marks", c6: "63.5 / 80 (79.3%)", c7: "Mrs. Rashmi Sen", badge: "badge-pending", status: "Scheduled" },
        { c1: "EX-12-CSC-T2", c2: "Computer Science (083)", sub: "Theory + Lab Code", c3: "Class 12 (Science)", c4: "06 Dec 2024 • 09:30 AM", c5: "70 Marks", c6: "59.2 / 70 (84.5%)", c7: "Mr. Rohit Ganguly", badge: "badge-pending", status: "Scheduled" }
      ]
    };
  }

  // 6. FEES
  if (modKey === 'fees') {
    return {
      kpi1: { title: "Fee Collected YTD", val: "₹ 4.21 Cr", trend: "87.4% Collection Target", icon: "bi-currency-rupee", color: "kpi-success" },
      kpi2: { title: "Outstanding Dues", val: "₹ 60.8 Lakhs", trend: "112 Student Ledgers", icon: "bi-exclamation-octagon-fill", color: "kpi-warning" },
      kpi3: { title: "Defaulters List", val: "48 Students", trend: "SMS Reminders Dispatched", icon: "bi-bell-fill", color: "kpi-danger" },
      kpi4: { title: "Online Gateways", val: "94.2% Digital", trend: "Razorpay / UPI Auto-Reconciled", icon: "bi-credit-card-2-front-fill", color: "kpi-primary" },
      filterPlaceholder: "Search receipt #, student name, admission no...",
      filterOptions: ["All Fee Status", "Paid (Online / Net Banking)", "Paid (Cheque / DD)", "Partial Payment", "Overdue / Pending Fine"],
      filterOptionName: "Payment Status",
      headers: ["Receipt / Inv #", "Student & Class", "Parent / Guardian", "Fee Slab / Category", "Amount (₹)", "Payment Mode", "Transaction Date", "Status"],
      rows: [
        { c1: "REC-2024-9182", c2: "Aarav Sharma", sub: "Class 10-A (ADM-8491)", c3: "Rajesh Sharma", c4: "Term 2 Tuition + Transport", c5: "₹ 28,500", c6: "Razorpay Online", c7: "27 Oct 2024", badge: "badge-active", status: "Paid / Cleared" },
        { c1: "REC-2024-9181", c2: "Diya Patel", sub: "Class 10-A (ADM-8492)", c3: "Bhavin Patel", c4: "Term 2 Tuition Fee", c5: "₹ 22,500", c6: "HDFC Net Banking", c7: "27 Oct 2024", badge: "badge-active", status: "Paid / Cleared" },
        { c1: "REC-2024-9180", c2: "Meera Reddy", sub: "Class 8-A (ADM-8497)", c3: "K. S. Reddy", c4: "Quarter 3 Tuition + Lab", c5: "₹ 24,200", c6: "UPI (Google Pay)", c7: "26 Oct 2024", badge: "badge-active", status: "Paid / Cleared" },
        { c1: "REC-2024-9179", c2: "Vihaan Singh", sub: "Class 10-B (ADM-8493)", c3: "Manpreet Singh", c4: "Annual Installment 2", c5: "₹ 15,000", c6: "HDFC Cheque #491201", c7: "25 Oct 2024", badge: "badge-pending", status: "Partial Payment" },
        { c1: "REC-2024-9178", c2: "Kabir Sengupta", sub: "Class 9-C (ADM-8498)", c3: "Debashis Sengupta", c4: "Tuition + Computer Fee", c5: "₹ 26,000", c6: "Cash Counter Desk", c7: "25 Oct 2024", badge: "badge-active", status: "Paid / Cleared" },
        { c1: "REC-2024-9177", c2: "Rohan Gupta", sub: "Class 12-A (ADM-8495)", c3: "Sanjay Gupta", c4: "CBSE Board Exam Dues", c5: "₹ 4,500", c6: "Counter UPI", c7: "24 Oct 2024", badge: "badge-inactive", status: "Overdue Dues" },
        { c1: "REC-2024-9176", c2: "Ananya Iyer", sub: "Class 10-B (ADM-8494)", c3: "R. Venkatesh Iyer", c4: "Quarter 3 Tuition", c5: "₹ 22,500", c6: "PayTM Gateway", c7: "24 Oct 2024", badge: "badge-active", status: "Paid / Cleared" },
        { c1: "REC-2024-9175", c2: "Ishaan Verma", sub: "Class 12-B (ADM-8496)", c3: "Dr. Alok Verma", c4: "Hostel & Mess Quarter 3", c5: "₹ 38,000", c6: "NEFT Bank Transfer", c7: "23 Oct 2024", badge: "badge-active", status: "Paid / Cleared" }
      ]
    };
  }

  // 7. HR & PAYROLL
  if (modKey === 'hr-payroll') {
    return {
      kpi1: { title: "Total Staff", val: "190 Members", trend: "148 Teaching, 42 Support", icon: "bi-people-fill", color: "kpi-primary" },
      kpi2: { title: "Monthly Payroll", val: "₹ 1.18 Cr", trend: "October Disbursed", icon: "bi-cash-stack", color: "kpi-success" },
      kpi3: { title: "PF & ESIC Status", val: "100% Deposited", trend: "EPFO Challans Generated", icon: "bi-shield-check", color: "kpi-info" },
      kpi4: { title: "Staff On Duty", val: "186 / 190", trend: "4 on Approved Leave", icon: "bi-person-check-fill", color: "kpi-warning" },
      filterPlaceholder: "Search staff name, employee ID, department...",
      filterOptions: ["All Departments", "Science & Technology", "Mathematics", "Languages", "Commerce & Eco", "Administration", "Information Technology"],
      filterOptionName: "Department",
      headers: ["Emp Code", "Staff Full Name & Title", "Department", "Designation", "Highest Qualification", "Experience", "Contact Phone", "Status"],
      rows: [
        { c1: "EMP-1001", c2: "Dr. Sunita Rao", sub: "Ph.D. Education", c3: "Administration", c4: "Principal & Head of School", c5: "M.Sc. (Physics), M.Ed., Ph.D.", c6: "24 Years", c7: "+91 11 2893 4005", badge: "badge-active", status: "Active" },
        { c1: "EMP-1002", c2: "Vikram Rathore", sub: "PGT Physics Lead", c3: "Science & Tech", c4: "PGT Physics (Sr Supervisor)", c5: "M.Sc. (Physics), B.Ed.", c6: "21 Years", c7: "+91 98711 22334", badge: "badge-active", status: "Active" },
        { c1: "EMP-1003", c2: "Mrs. Priya Nambiar", sub: "PGT English Lead", c3: "Languages", c4: "PGT English (Class 10A Incharge)", c5: "M.A. (English), B.Ed.", c6: "16 Years", c7: "+91 99110 55441", badge: "badge-active", status: "Active" },
        { c1: "EMP-1004", c2: "Mr. S. K. Rastogi", sub: "TGT Mathematics", c3: "Mathematics", c4: "TGT Math (Middle Supervisor)", c5: "M.Sc. (Math), M.Ed.", c6: "17 Years", c7: "+91 98118 66772", badge: "badge-active", status: "Active" },
        { c1: "EMP-1005", c2: "Mrs. Nandini Mathur", c3: "Science & Tech", sub: "PGT Biology", c4: "Senior Wing Supervisor", c5: "M.Sc. (Botany), B.Ed.", c6: "19 Years", c7: "+91 98113 77889", badge: "badge-active", status: "Active" },
        { c1: "EMP-1006", c2: "Mr. M. K. Sharma", c3: "Administration", sub: "Chief Accountant", c4: "Chief Accounts Officer", c5: "M.Com, Inter-CA", c6: "22 Years", c7: "+91 11 2893 4022", badge: "badge-active", status: "Active" },
        { c1: "EMP-1007", c2: "Mrs. Anjali Saxena", c3: "Administration", sub: "HR Lead & POCSO", c4: "Human Resources Lead", c5: "MBA (HR), PGD-POCSO", c6: "14 Years", c7: "+91 98101 44552", badge: "badge-active", status: "Active" },
        { c1: "EMP-1008", c2: "Mr. Rohit Ganguly", c3: "Information Technology", sub: "Computer Science", c4: "Head of IT & STEM", c5: "M.Tech (Computer Science)", c6: "14 Years", c7: "+91 98714 55663", badge: "badge-active", status: "Active" }
      ]
    };
  }

  // 8. TRANSPORT
  if (modKey === 'transport') {
    return {
      kpi1: { title: "Fleet Vehicles", val: "32 Buses", trend: "100% Fitness Certified", icon: "bi-bus-front-fill", color: "kpi-primary" },
      kpi2: { title: "Students Transported", val: "1,840 Daily", trend: "32 Active Bus Routes", icon: "bi-people-fill", color: "kpi-success" },
      kpi3: { title: "GPS Telemetry", val: "32 / 32 Live", trend: "Zero Speeding Alerts", icon: "bi-broadcast-pin", color: "kpi-info" },
      kpi4: { title: "Monthly Fuel Economy", val: "4.8 km/L", trend: "Diesel Logs Reconciled", icon: "bi-fuel-pump-fill", color: "kpi-warning" },
      filterPlaceholder: "Search bus plate, driver name, route #...",
      filterOptions: ["All Routes", "Route 01 - Dwarka Sector 6 to 22", "Route 04 - South Extension", "Route 08 - Janakpuri & Vikaspuri", "Route 12 - Rohini Sector 14", "Route 15 - Gurgaon DLF"],
      filterOptionName: "Transport Zone",
      headers: ["Vehicle Plate", "Bus Name / Model", "Assigned Route & Zone", "Driver Name & Contact", "Seating Capacity", "GPS Status", "Fuel Level", "Status"],
      rows: [
        { c1: "DL-1V-8491", c2: "Bus #01 (Tata Starbus)", sub: "36 Seater AC", c3: "Route 01 - Dwarka Express", c4: "Harpreet Singh (+91 98118 77201)", c5: "36 / 36 (Full)", c6: "Live GPS (28.613° N)", c7: "78% Diesel", badge: "badge-active", status: "On Route" },
        { c1: "DL-1V-8492", c2: "Bus #04 (Ashok Leyland)", sub: "42 Seater AC", c3: "Route 04 - South Extension", c4: "Ram Avtar (+91 98229 88302)", c5: "40 / 42 (95%)", c6: "Live GPS (28.581° N)", c7: "65% Diesel", badge: "badge-active", status: "On Route" },
        { c1: "DL-1V-8493", c2: "Bus #08 (Eicher Skyline)", sub: "36 Seater AC", c3: "Route 08 - Janakpuri East", c4: "Sukhdev Yadav (+91 98331 99403)", c5: "35 / 36 (97%)", c6: "Live GPS (28.629° N)", c7: "82% Diesel", badge: "badge-active", status: "On Route" },
        { c1: "DL-1V-8494", c2: "Bus #12 (Tata Starbus)", sub: "42 Seater AC", c3: "Route 12 - Rohini Sector 14", c4: "Manoj Kumar (+91 98442 11504)", c5: "41 / 42 (98%)", c6: "Live GPS (28.712° N)", c7: "90% Diesel", badge: "badge-active", status: "On Route" },
        { c1: "DL-1V-8495", c2: "Bus #15 (Eicher Skyline)", sub: "36 Seater AC", c3: "Route 15 - Gurgaon Cyber Hub", c4: "Balwant Singh (+91 98553 22605)", c5: "34 / 36 (94%)", c6: "Live GPS (28.489° N)", c7: "71% Diesel", badge: "badge-active", status: "On Route" },
        { c1: "DL-1V-8496", c2: "Bus #18 (Tata Starbus)", sub: "42 Seater AC", c3: "Route 18 - Vasant Kunj", c4: "Surender Pal (+91 98664 33706)", c5: "38 / 42 (90%)", c6: "Live GPS (28.529° N)", c7: "60% Diesel", badge: "badge-active", status: "On Route" },
        { c1: "DL-1V-8497", c2: "Bus #22 (Force Traveller)", sub: "26 Seater AC", c3: "Route 22 - Palam & Cantt", c4: "Vinod Tyagi (+91 98775 44807)", c5: "25 / 26 (96%)", c6: "Live GPS (28.591° N)", c7: "85% Diesel", badge: "badge-active", status: "On Route" },
        { c1: "DL-1V-8498", c2: "Bus #28 (Reserve Bus)", sub: "42 Seater AC", c3: "Campus Reserve / Standby", c4: "Ratan Lal (+91 98886 55908)", c5: "0 / 42 (Standby)", c6: "Campus Depot Parked", c7: "95% Diesel", badge: "badge-pending", status: "Standby Reserve" }
      ]
    };
  }

  // 9. LIBRARY
  if (modKey === 'library') {
    return {
      kpi1: { title: "Cataloged Titles", val: "28,450 Volumes", trend: "100% Barcode / RFID", icon: "bi-book-half", color: "kpi-primary" },
      kpi2: { title: "Issued Books", val: "1,840 Books", trend: "Circulating to Learners", icon: "bi-arrow-left-right", color: "kpi-success" },
      kpi3: { title: "On Racks Available", val: "26,610 Books", trend: "Across 44 Book Racks", icon: "bi-journal-bookmark", color: "kpi-info" },
      kpi4: { title: "Digital E-Books", val: "12,500 Titles", trend: "National Digital Library", icon: "bi-laptop", color: "kpi-warning" },
      filterPlaceholder: "Search accession #, book title, author, ISBN...",
      filterOptions: ["All Dewey Classes", "Science & Technology (500)", "Mathematics (510)", "Physics (530)", "Chemistry (540)", "Literature & Fiction (800)", "Indian History (954)"],
      filterOptionName: "Dewey Category",
      headers: ["Accession #", "Book Title & Subtitle", "Author Name", "Category / Dewey Class", "Shelf / Rack Location", "Total Copies", "Issued", "Status"],
      rows: [
        { c1: "ACC-10821", c2: "NCERT Exemplar Problems - Mathematics X", sub: "CBSE Curriculum Reference", c3: "NCERT Editorial Group", c4: "Mathematics (510)", c5: "Rack S-14 / Shelf 2", c6: "25 Copies", c7: "18 Issued", badge: "badge-active", status: "7 Available" },
        { c1: "ACC-10822", c2: "Concepts of Physics (Vol 1 & 2)", sub: "Senior Secondary Foundation", c3: "Dr. H. C. Verma", c4: "Physics (530)", c5: "Rack P-02 / Shelf 1", c6: "30 Copies", c7: "26 Issued", badge: "badge-active", status: "4 Available" },
        { c1: "ACC-10823", c2: "Wings of Fire - An Autobiography", sub: "Motivational Biography", c3: "Dr. A. P. J. Abdul Kalam", c4: "Biography (920)", c5: "Rack B-05 / Shelf 3", c6: "15 Copies", c7: "12 Issued", badge: "badge-active", status: "3 Available" },
        { c1: "ACC-10824", c2: "Comprehensive Chemistry for Class XII", sub: "CBSE & NEET Guide", c3: "Dr. O. P. Tandon", c4: "Chemistry (540)", c5: "Rack C-08 / Shelf 2", c6: "20 Copies", c7: "15 Issued", badge: "badge-active", status: "5 Available" },
        { c1: "ACC-10825", c2: "Together with Science Class 10", sub: "Board Examination Practice", c3: "Rachna Sagar Editorial", c4: "General Science (500)", c5: "Rack G-01 / Shelf 4", c6: "40 Copies", c7: "35 Issued", badge: "badge-active", status: "5 Available" },
        { c1: "ACC-10826", c2: "Oxford Advanced Learner's Dictionary", sub: "English Language Standard", c3: "A. S. Hornby", c4: "Reference (420)", c5: "Rack R-01 / Shelf 1", c6: "10 Copies", c7: "3 Issued", badge: "badge-active", status: "7 Available" },
        { c1: "ACC-10827", c2: "Discovery of India", sub: "Historical Chronicle", c3: "Jawaharlal Nehru", c4: "Indian History (954)", c5: "Rack H-04 / Shelf 3", c6: "12 Copies", c7: "8 Issued", badge: "badge-active", status: "4 Available" },
        { c1: "ACC-10828", c2: "Computer Science with Python XII", sub: "CBSE Class 12 Syllabus", c3: "Sumita Arora", c4: "Computer Science (004)", c5: "Rack CS-03 / Shelf 2", c6: "35 Copies", c7: "31 Issued", badge: "badge-active", status: "4 Available" }
      ]
    };
  }

  // 10. INVENTORY
  if (modKey === 'inventory') {
    return {
      kpi1: { title: "Stocked SKUs", val: "1,240 Items", trend: "Fully Barcoded Inventory", icon: "bi-boxes", color: "kpi-primary" },
      kpi2: { title: "Inventory Valuation", val: "₹ 48.6 Lakhs", trend: "Current Asset Registry", icon: "bi-currency-rupee", color: "kpi-success" },
      kpi3: { title: "Low Stock Alerts", val: "14 Items", trend: "Reorder Triggered", icon: "bi-exclamation-triangle-fill", color: "kpi-danger" },
      kpi4: { title: "Pending POs", val: "8 Orders", trend: "Awaiting Delivery Approval", icon: "bi-truck", color: "kpi-warning" },
      filterPlaceholder: "Search item SKU, name, supplier, category...",
      filterOptions: ["All Categories", "Science Lab Consumables", "Stationery & Exam Papers", "IT Hardware & Cables", "Sports Equipment", "Furniture & Fixtures"],
      filterOptionName: "Item Category",
      headers: ["Item SKU Code", "Item Description & Brand", "Category", "Quantity on Hand", "Reorder Level", "Unit Cost (₹)", "Warehouse Location", "Stock Status"],
      rows: [
        { c1: "INV-CHM-014", c2: "Hydrochloric Acid (HCl 35% AR)", sub: "Merck Life Sciences", c3: "Science Lab Consumables", c4: "45 Litres", c5: "15 Litres", c6: "₹ 420 / L", c7: "Chem Store Room S-2", badge: "badge-active", status: "In Stock" },
        { c1: "INV-EXM-008", c2: "CBSE Standard Answer Booklets (32p)", sub: "Security Stamped Ruled", c3: "Stationery & Exam", c4: "12,400 Pcs", c5: "2,000 Pcs", c6: "₹ 18 / Pc", c7: "Main Store Room M-1", badge: "badge-active", status: "In Stock" },
        { c1: "INV-PHY-021", c2: "Digital Vernier Caliper (150mm)", sub: "Mitutoyo 0.01mm Prec", c3: "Science Lab Equipment", c4: "28 Units", c5: "5 Units", c6: "₹ 1,850 / Unit", c7: "Physics Lab Locker 4", badge: "badge-active", status: "In Stock" },
        { c1: "INV-IT-092", c2: "Cat6 UTP Ethernet Cable Roll (305m)", sub: "D-Link Pure Copper", c3: "IT Hardware", c4: "3 Rolls", c5: "5 Rolls", c6: "₹ 7,800 / Roll", c7: "Server Room Rack 1", badge: "badge-inactive", status: "Low Stock Alert" },
        { c1: "INV-SPT-044", c2: "Nivia Shining Star Football (Size 5)", sub: "FIFA Pro Standard", c3: "Sports Equipment", c4: "35 Balls", c5: "10 Balls", c6: "₹ 1,250 / Ball", c7: "Sports Complex Room", badge: "badge-active", status: "In Stock" },
        { c1: "INV-BIO-019", c2: "Prepared Microscope Slides Set (100)", sub: "Botany & Zoology Histology", c3: "Science Lab Consumables", c4: "18 Boxes", c5: "4 Boxes", c6: "₹ 3,400 / Box", c7: "Biology Lab Cabinet", badge: "badge-active", status: "In Stock" },
        { c1: "INV-MED-003", c2: "Infirmary First Aid Trauma Kits", sub: "St. John Ambulance Certified", c3: "Health & Clinic", c4: "12 Kits", c5: "3 Kits", c6: "₹ 2,800 / Kit", c7: "Infirmary Clinic Store", badge: "badge-active", status: "In Stock" },
        { c1: "INV-IT-104", c2: "HP 88A Black LaserJet Toner Cartridge", sub: "Original HP Laser Cartridge", c3: "IT Consumables", c4: "2 Cartridges", c5: "6 Cartridges", c6: "₹ 3,950 / Pc", c7: "Admin Photocopy Room", badge: "badge-inactive", status: "Low Stock Alert" }
      ]
    };
  }

  // 11. FRONT OFFICE & SECURITY
  if (modKey === 'front-office' || modKey === 'security') {
    return {
      kpi1: { title: "Visitors Today", val: "42 Visitors", trend: "All ID Badges Issued", icon: "bi-person-badge-fill", color: "kpi-primary" },
      kpi2: { title: "Checked Out", val: "36 / 42", trend: "6 Active on Campus", icon: "bi-door-closed-fill", color: "kpi-success" },
      kpi3: { title: "CCTV Cameras", val: "148 / 148 Live", trend: "100% Perimeter Health", icon: "bi-camera-video-fill", color: "kpi-info" },
      kpi4: { title: "Security Guards", val: "16 on Shift", trend: "3 Main Gates Manned", icon: "bi-shield-shaded", color: "kpi-warning" },
      filterPlaceholder: "Search visitor name, gate pass #, person to meet...",
      filterOptions: ["All Gate Passes", "Currently on Campus (Active)", "Checked Out (Concluded)", "Parent Consultation", "Vendor / Supplier Entry", "Govt / Education Dept"],
      filterOptionName: "Pass Status",
      headers: ["Pass / Token #", "Visitor Full Name & Org", "Person to Meet", "Purpose of Visit", "Check-In Time", "Check-Out Time", "Contact Phone", "Status"],
      rows: [
        { c1: "GP-2024-0412", c2: "Mr. Rajan Narang", sub: "Aarav Narang Father", c3: "Dr. Sunita Rao (Principal)", c4: "Fee Structure Clarification", c5: "09:30 AM", c6: "10:15 AM", c7: "+91 98112 88990", badge: "badge-active", status: "Checked Out" },
        { c1: "GP-2024-0413", c2: "Ms. Shalini Gupta", sub: "Oxford University Press", c3: "Mrs. Priya Nambiar (HOD)", c4: "Annual Textbook Review", c5: "10:00 AM", c6: "11:30 AM", c7: "+91 98223 99001", badge: "badge-active", status: "Checked Out" },
        { c1: "GP-2024-0414", c2: "Inspector V. K. Yadav", sub: "Delhi Fire Services", c3: "Estate Manager (Transport)", c4: "Hydrant Pressure Inspection", c5: "11:15 AM", c6: "--", c7: "+91 11 2341 5566", badge: "badge-pending", status: "On Campus (Active)" },
        { c1: "GP-2024-0415", c2: "Mrs. Geeta Mehra", sub: "Parent (Class 8-A)", c3: "Class Teacher (8A)", c4: "PTM Prior Appointment", c5: "11:45 AM", c6: "--", c7: "+91 98445 11223", badge: "badge-pending", status: "On Campus (Active)" },
        { c1: "GP-2024-0416", c2: "Mr. Satish Verma", sub: "Dell Technologies Support", c3: "Rohit Ganguly (IT Head)", c4: "Server Maintenance AMC", c5: "12:10 PM", c6: "--", c7: "+91 98556 22334", badge: "badge-pending", status: "On Campus (Active)" },
        { c1: "GP-2024-0417", c2: "Mr. Ankur Mittal", sub: "Tata Motors Commercial", c3: "Transport Incharge", c4: "Bus #14 Periodic Service", c5: "08:15 AM", c6: "09:45 AM", c7: "+91 98667 33445", badge: "badge-active", status: "Checked Out" },
        { c1: "GP-2024-0418", c2: "Mrs. Ritu Bhasin", sub: "Prospective Parent", c3: "Admissions Desk", c4: "Campus Walkthrough Tour", c5: "10:30 AM", c6: "11:45 AM", c7: "+91 98778 44556", badge: "badge-active", status: "Checked Out" },
        { c1: "GP-2024-0419", c2: "Mr. D. K. Bansal", sub: "MCD Health Department", c3: "School Incharge Doctor", c4: "Drinking Water Audit Sample", c5: "09:00 AM", c6: "10:30 AM", c7: "+91 11 2398 7788", badge: "badge-active", status: "Checked Out" }
      ]
    };
  }

  // 12. DEFAULT FALLBACK DOMAIN TEMPLATE
  return {
    kpi1: { title: "Total Records", val: "1,248 Items", trend: "100% Up to Date", icon: "bi-collection-fill", color: "kpi-primary" },
    kpi2: { title: "Verified & Active", val: "1,190 Entries", trend: "95.3% Verified", icon: "bi-patch-check-fill", color: "kpi-success" },
    kpi3: { title: "Under Scrutiny", val: "58 Pending", trend: "Workflow Assigned", icon: "bi-clock-history", color: "kpi-warning" },
    kpi4: { title: "Audit Compliant", val: "100%", trend: "CBSE & Statutory Validated", icon: "bi-shield-check", color: "kpi-info" },
    filterPlaceholder: `Search ${subTitle.toLowerCase()} by code, title, category...`,
    filterOptions: ["All Categories", "Primary Wing", "Middle Wing", "Secondary Wing", "Senior Secondary Wing", "General Administration"],
    filterOptionName: "Category",
    headers: ["Record Code", `${subTitle} Title`, "Operational Scope", "Assigned Incharge", "Reference / Contact", "Last Updated", "Session", "Status"],
    rows: [
      { c1: "REC-2024-8491", c2: `${subTitle} Standard Master #01`, sub: "High Priority Institutional Record", c3: "All School Wings", c4: "Dr. Sunita Rao", c5: "REF/ADM/2024/091", c6: "28 Oct 2024", c7: "2024-2025", badge: "badge-active", status: "Active & Verified" },
      { c1: "REC-2024-8492", c2: `${subTitle} Policy Schedule #02`, sub: "Curriculum Implementation", c3: "Senior Secondary", c4: "Vikram Rathore", c5: "REF/ACAD/2024/092", c6: "27 Oct 2024", c7: "2024-2025", badge: "badge-active", status: "Active & Verified" },
      { c1: "REC-2024-8493", c2: `${subTitle} Register Protocol #03`, sub: "Mandatory Regulatory Filing", c3: "Secondary Wing", c4: "Mrs. Priya Nambiar", c5: "REF/COMP/2024/093", c6: "26 Oct 2024", c7: "2024-2025", badge: "badge-active", status: "Active & Verified" },
      { c1: "REC-2024-8494", c2: `${subTitle} Operation Log #04`, sub: "Infrastructure Maintenance", c3: "Campus Estate", c4: "Mr. M. K. Sharma", c5: "REF/FIN/2024/094", c6: "25 Oct 2024", c7: "2024-2025", badge: "badge-pending", status: "In Workflow Review" },
      { c1: "REC-2024-8495", c2: `${subTitle} Activity Benchmark #05`, sub: "Student Welfare Guideline", c3: "Middle Wing", c4: "Mrs. Anjali Saxena", c5: "REF/HR/2024/095", c6: "25 Oct 2024", c7: "2024-2025", badge: "badge-active", status: "Active & Verified" },
      { c1: "REC-2024-8496", c2: `${subTitle} Digital Catalog #06`, sub: "IT System Resource", c3: "Technology Center", c4: "Mr. Rohit Ganguly", c5: "REF/IT/2024/096", c6: "24 Oct 2024", c7: "2024-2025", badge: "badge-active", status: "Active & Verified" },
      { c1: "REC-2024-8497", c2: `${subTitle} Governance Audit #07`, sub: "SMC Resolution Archive", c3: "General Administration", c4: "Dr. Sunita Rao", c5: "REF/SMC/2024/097", c6: "23 Oct 2024", c7: "2024-2025", badge: "badge-active", status: "Active & Verified" },
      { c1: "REC-2024-8498", c2: `${subTitle} Session Directive #08`, sub: "Annual Academic Milestone", c3: "Primary Wing", c4: "Mrs. Shalini Mehra", c5: "REF/PRI/2024/098", c6: "22 Oct 2024", c7: "2024-2025", badge: "badge-active", status: "Active & Verified" }
    ]
  };
}

// Generate HTML Content for the page
function generatePageContent(modKey, subFile, subTitle) {
  const d = getDomainTemplate(modKey, subFile, subTitle);

  return `
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
    <select class="form-select" style="max-width: 200px;">
      ${d.filterOptions.map((opt, i) => `<option ${i === 0 ? 'selected' : ''}>${opt}</option>`).join('\n      ')}
    </select>
    <select class="form-select" style="max-width: 150px;">
      <option selected>All Status</option>
      <option>Active / Verified</option>
      <option>In Review</option>
      <option>Approved</option>
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
        ${d.headers.map(h => `<th>${h}</th>`).join('\n        ')}
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
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, '${subTitle.replace(/'/g, "\\'")}')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
      `).join('')}
    </tbody>
  </table>
</div>
`;
}

// Process and write all files
let updatedCount = 0;
let skippedCount = 0;

allModules.forEach(mod => {
  const modDir = path.join(MODULES_DIR, mod.key);
  if (!fs.existsSync(modDir)) fs.mkdirSync(modDir, { recursive: true });

  mod.submodules.forEach(sub => {
    const filePath = path.join(modDir, sub.file);

    if (isProtected(filePath)) {
      console.log(`[PROTECTED - SKIPPED] ${mod.key}/${sub.file}`);
      skippedCount++;
      return;
    }

    const domainBody = generatePageContent(mod.key, sub.file, sub.title);

    const phpContent = `<?php
/**
 * EDUSYS PRO - ${sub.title}
 */
$page_title = "${sub.title}";
$page_desc = "Dedicated operational interface & records management for ${sub.title}";
$active_module = "${mod.key}";
$active_submodule = "${sub.file}";
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
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', '${sub.file.replace('.php', '')}_export.csv')" title="Export Table as CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Add New Record
    </button>
  </div>
</div>

${domainBody}

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
`;

    fs.writeFileSync(filePath, phpContent, 'utf8');
    updatedCount++;
  });
});

console.log(`\n======================================================`);
console.log(`SUCCESSFULLY PROCESSED ALL MODULES:`);
console.log(`- Updated with domain UI & data: ${updatedCount} pages`);
console.log(`- Protected custom files: ${skippedCount} pages`);
console.log(`======================================================`);

