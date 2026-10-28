/**
 * EDUSYS PRO - COMPREHENSIVE PROTOTYPE BUILDER
 * Generates all 10 Role Dashboards and 500+ Submodule Pages with realistic data & components
 */

const fs = require('fs');
const path = require('path');

const ROOT_DIR = path.resolve(__dirname, '..');
const PROTO_DIR = path.join(ROOT_DIR, 'prototype');

// Ensure base directories
const modulesDir = path.join(PROTO_DIR, 'modules');
const dashboardsDir = path.join(PROTO_DIR, 'dashboards');

if (!fs.existsSync(modulesDir)) fs.mkdirSync(modulesDir, { recursive: true });
if (!fs.existsSync(dashboardsDir)) fs.mkdirSync(dashboardsDir, { recursive: true });

// 1. Definition of 28 Modules and their Submodules
const moduleDefinitions = [
  {
    key: "administration",
    name: "Administration & Master Setup",
    icon: "bi-shield-shaded",
    submodules: [
      { file: "school-profile.html", title: "School Profile", desc: "Institutional details, affiliation numbers & head of school records" },
      { file: "school-branding.html", title: "School Branding", desc: "Crest logo, mottos, letterheads, color palettes & badges" },
      { file: "academic-sessions.html", title: "Academic Sessions", desc: "Manage past, active (2024-2025) and upcoming school calendar years" },
      { file: "session-calendar.html", title: "Session Calendar", desc: "Term schedules, working days breakdown and academic milestones" },
      { file: "classes.html", title: "Classes & Grades", desc: "Pre-primary to senior secondary class masters" },
      { file: "sections.html", title: "Sections Allocation", desc: "Section division (A, B, C, D) and classroom strength limits" },
      { file: "streams.html", title: "Streams & Specializations", desc: "Science (PCM/PCB), Commerce and Humanities streams for Class 11 & 12" },
      { file: "departments.html", title: "Departments", desc: "Academic and administrative functional departments" },
      { file: "subjects.html", title: "Subjects Master", desc: "Theory, practical and vocational subject catalog" },
      { file: "class-subject-mapping.html", title: "Class-Subject Mapping", desc: "Curriculum configuration of mandatory and elective subjects by class" },
      { file: "subject-groups.html", title: "Subject Groups", desc: "Language combinations and elective clusters" },
      { file: "houses-clubs.html", title: "Houses & Clubs", desc: "School houses (Ganga, Yamuna, Kaveri, Narmada) and student activity clubs" },
      { file: "working-days.html", title: "Working Days & Hours", desc: "Weekly schedules, bell timings and shift management" },
      { file: "holidays.html", title: "Holidays & Vacations", desc: "Gazetted holidays, regional leaves and vacation calendar" },
      { file: "events-calendar.html", title: "School Events Calendar", desc: "Annual sports meet, exhibitions, PTMs and celebrations" },
      { file: "school-settings.html", title: "School Settings", desc: "Timezone, operational parameters and academic rules" },
      { file: "custom-fields.html", title: "Custom Fields", desc: "Institution-specific student and staff data attributes" },
      { file: "form-builder.html", title: "Form Builder", desc: "Drag-and-drop dynamic registration and survey form designer" },
      { file: "user-management.html", title: "User Management", desc: "Staff, student, and administrator login accounts" },
      { file: "role-management.html", title: "Role Management", desc: "Configurable role hierarchy and permission groups" },
      { file: "permission-management.html", title: "Permission Management", desc: "Granular screen, action and report access control" },
      { file: "activity-logs.html", title: "Activity Logs", desc: "Real-time user actions, modifications and login timestamps" },
      { file: "audit-trail.html", title: "Audit Trail", desc: "Cryptographic audit trail for marks, fee changes and data edits" },
      { file: "backup-restore.html", title: "Backup & Restore UI", desc: "Automated snapshot scheduling and manual archive downloads" }
    ]
  },
  {
    key: "admissions",
    name: "Admission Management",
    icon: "bi-person-plus-fill",
    submodules: [
      { file: "dashboard.html", title: "Admission Dashboard", desc: "Admission desk KPIs, conversion funnel and live seat status" },
      { file: "enquiries.html", title: "Admission Enquiries", desc: "Walk-in, phone and online admission prospect register" },
      { file: "follow-ups.html", title: "Enquiry Follow-ups", desc: "Scheduled callback reminders and counsellor notes" },
      { file: "lead-sources.html", title: "Lead Sources", desc: "Digital campaigns, referrals, open houses and print ads ROI" },
      { file: "online-applications.html", title: "Online Applications", desc: "Submissions received through the school public web portal" },
      { file: "offline-applications.html", title: "Offline Applications", desc: "Counter paper forms entered into the ERP system" },
      { file: "application-review.html", title: "Application Review", desc: "Academic screening and preliminary scrutiny" },
      { file: "document-verification.html", title: "Document Verification", desc: "Birth certificate, transfer certificate and APAAR ID checks" },
      { file: "admission-approval.html", title: "Admission Approval", desc: "Principal and management final approval workflow" },
      { file: "merit-lists.html", title: "Merit Lists", desc: "Published entrance test scores and category merit rankings" },
      { file: "waiting-lists.html", title: "Waiting Lists", desc: "Reserve waitlisted applicants with automated seat rollover" },
      { file: "prospectus-distribution.html", title: "Prospectus Distribution", desc: "Information brochure and application kit inventory tracking" },
      { file: "campus-visits.html", title: "Campus Visits", desc: "Scheduled parent school tours and classroom observations" },
      { file: "counselling.html", title: "Admission Counselling", desc: "Stream selection and interaction interview evaluations" },
      { file: "admission-fees.html", title: "Admission Fees", desc: "One-time registration and admission fee collection ledger" },
      { file: "admission-reports.html", title: "Admission Reports", desc: "Year-on-year conversion rate and demographic analysis" },
      { file: "re-admissions.html", title: "Re-admissions", desc: "Returning students and lateral session shifts" },
      { file: "withdrawal-requests.html", title: "Withdrawal Requests", desc: "Parent exit applications and clearance certificate workflows" }
    ]
  },
  {
    key: "students",
    name: "Student Information System",
    icon: "bi-backpack-fill",
    submodules: [
      { file: "dashboard.html", title: "Student Dashboard", desc: "Student demographics, strength by gender and active rosters" },
      { file: "student-directory.html", title: "Student Directory", desc: "Searchable master roster of all enrolled students" },
      { file: "add-student.html", title: "Add Student (Multi-Step)", desc: "Comprehensive student enrolment with guardian and medical records" },
      { file: "student-profile.html", title: "Student Profile 360°", desc: "Complete academic, fee, attendance and disciplinary dossier" },
      { file: "personal-info.html", title: "Personal Information", desc: "Aadhaar, APAAR ID, blood group and residence details" },
      { file: "parent-records.html", title: "Parent & Guardian Records", desc: "Father, mother, local guardian occupations and contacts" },
      { file: "emergency-contacts.html", title: "Emergency Contacts", desc: "Priority dial list and medical authorization records" },
      { file: "previous-school.html", title: "Previous School Records", desc: "Past board affiliations, TC number and prior year grades" },
      { file: "documents.html", title: "Student Documents Locker", desc: "Digital vault for marksheets, birth proofs and caste certificates" },
      { file: "id-cards.html", title: "Student ID Cards", desc: "Automated photo ID card generator with barcode & QR code" },
      { file: "class-allocation.html", title: "Class & Section Allocation", desc: "Roster assignment and section strength balancing" },
      { file: "roll-numbers.html", title: "Roll Number Management", desc: "Alphabetical and merit-based roll number generation" },
      { file: "student-promotion.html", title: "Student Promotion", desc: "End-of-term bulk promotion to next class with grade verification" },
      { file: "student-transfer.html", title: "Student Transfer Register", desc: "Inter-branch and external school migration records" },
      { file: "student-withdrawal.html", title: "Student Withdrawal Register", desc: "Formal struck-off rolls and clearance audit" },
      { file: "transfer-certificates.html", title: "Transfer Certificates (TC)", desc: "Standard CBSE/State Board format TC generator with serial registry" },
      { file: "bonafide-certificates.html", title: "Bonafide Certificates", desc: "Passport, visa and bank proof bonafide certificate issuer" },
      { file: "character-certificates.html", title: "Character Certificates", desc: "Conduct and moral assessment certificates" },
      { file: "study-certificates.html", title: "Study Certificates", desc: "Medium of instruction and fee paid certifications" },
      { file: "student-history.html", title: "Student Timeline & History", desc: "Chronological milestone log since school joining date" },
      { file: "alumni.html", title: "Alumni Management", desc: "Graduated batches directory, higher education tracking & networking" },
      { file: "student-status.html", title: "Student Status", desc: "Active, suspended, medical leave and transferred tags" },
      { file: "import-export.html", title: "Student Import / Export", desc: "Bulk CSV/Excel onboarding and government reporting exports" }
    ]
  },
  {
    key: "academics",
    name: "Academic Management",
    icon: "bi-mortarboard-fill",
    submodules: [
      { file: "dashboard.html", title: "Academic Dashboard", desc: "Syllabus pacing, teacher workload and classroom occupancy" },
      { file: "curriculum.html", title: "Curriculum Management", desc: "Subject outlines, reference books and teaching methodology" },
      { file: "cbse-curriculum.html", title: "CBSE Curriculum & NEP 2020", desc: "National curriculum framework, experiential learning and competencies" },
      { file: "state-curriculum.html", title: "State Board Curriculum", desc: "Regional syllabus and regional language integration" },
      { file: "board-mapping.html", title: "Board and Class Mapping", desc: "Dual curriculum configuration by class level" },
      { file: "syllabus.html", title: "Syllabus Management", desc: "Term-wise unit breakdown and learning objectives" },
      { file: "subject-allocation.html", title: "Subject Allocation", desc: "Subject assignment to classes and stream groups" },
      { file: "teacher-allocation.html", title: "Teacher Allocation", desc: "Subject teacher mapping and weekly workload limits" },
      { file: "class-teacher-assignment.html", title: "Class Teacher Assignment", desc: "Section mentors and homeroom in-charges" },
      { file: "timetable-builder.html", title: "Timetable Builder", desc: "Automated conflict-free master timetable scheduling engine" },
      { file: "class-timetable.html", title: "Class Timetable", desc: "Weekly schedule for students with period timings" },
      { file: "teacher-timetable.html", title: "Teacher Timetable", desc: "Faculty individual teaching slots and free period schedule" },
      { file: "classroom-allocation.html", title: "Classroom Allocation", desc: "Physical room, lab, and smart board assignment" },
      { file: "period-management.html", title: "Period Management", desc: "Zero period, assembly, recesses and lab blocks" },
      { file: "substitute-teachers.html", title: "Substitute Teachers", desc: "Automated proxy teacher assignment for absent educators" },
      { file: "lesson-planning.html", title: "Lesson Planning", desc: "Weekly instructional blueprints, aids and teaching methodologies" },
      { file: "teaching-diary.html", title: "Teaching Diary", desc: "Daily educator reflections, coverage logs and HOD signatures" },
      { file: "homework.html", title: "Homework Management", desc: "Daily student tasks with submission deadlines and attachments" },
      { file: "assignments.html", title: "Assignments", desc: "Graded assignments and rubrics" },
      { file: "projects.html", title: "Projects & Lab Work", desc: "Science exhibitions, practical files and group submissions" },
      { file: "worksheets.html", title: "Worksheets & Practice Papers", desc: "Downloadable revision worksheets and question sheets" },
      { file: "study-materials.html", title: "Study Materials", desc: "PDF notes, PPTs, audio lessons and reference links" },
      { file: "learning-outcomes.html", title: "Learning Outcomes", desc: "Bloom's taxonomy mastery and assessment tracking" },
      { file: "syllabus-completion.html", title: "Syllabus Completion", desc: "Planned vs actual topic completion percentages" },
      { file: "lab-scheduling.html", title: "Practical & Lab Scheduling", desc: "Physics, Chemistry, Biology and Computer lab roster" },
      { file: "remedial-classes.html", title: "Remedial Classes", desc: "Targeted support sessions for struggling learners" },
      { file: "extra-classes.html", title: "Extra Classes & Olympiads", desc: "NTSE, Olympiad and board exam preparation batches" },
      { file: "academic-progress.html", title: "Academic Progress", desc: "Longitudinal scholastic trend analysis per student" }
    ]
  },
  {
    key: "attendance",
    name: "Attendance Management",
    icon: "bi-calendar2-check-fill",
    submodules: [
      { file: "dashboard.html", title: "Attendance Dashboard", desc: "Real-time school-wide presence, absenteeism rates & trends" },
      { file: "daily-attendance.html", title: "Student Daily Attendance", desc: "Homeroom morning register marking interface" },
      { file: "class-attendance.html", title: "Class-wise Attendance", desc: "Class and section comparative attendance summary" },
      { file: "period-attendance.html", title: "Period-wise Attendance", desc: "Subject-by-subject secondary class attendance register" },
      { file: "teacher-attendance.html", title: "Teacher Attendance", desc: "Educator punch-in logs and biometric timestamps" },
      { file: "staff-attendance.html", title: "Staff Attendance", desc: "Non-teaching, administrative and maintenance staff register" },
      { file: "late-entry.html", title: "Late Entry Register", desc: "Tardy arrival recording with gate pass integration" },
      { file: "early-leave.html", title: "Early Leave Register", desc: "Authorized mid-day departures with parent confirmation" },
      { file: "student-leaves.html", title: "Student Leave Applications", desc: "Medical and personal leave requests submitted by parents" },
      { file: "staff-leaves.html", title: "Staff Leave Applications", desc: "Casual, earned, medical and maternity leave balances" },
      { file: "leave-approval.html", title: "Leave Approval Workflow", desc: "Principal and supervisor multi-tier leave approval" },
      { file: "attendance-corrections.html", title: "Attendance Corrections", desc: "Audit-controlled modification of inadvertent attendance marks" },
      { file: "monthly-register.html", title: "Monthly Attendance Register", desc: "Traditional 31-day grid register with monthly totals" },
      { file: "absentee-list.html", title: "Absentee List & SMS Alert", desc: "Instant automated SMS trigger to guardians of absent students" },
      { file: "low-attendance-alerts.html", title: "Low Attendance Alerts (<75%)", desc: "CBSE mandatory 75% threshold warning notifications" },
      { file: "attendance-percentage.html", title: "Attendance Percentage Calculator", desc: "Term-end eligibility calculation for board examinations" },
      { file: "biometric-integration.html", title: "Biometric Device Integration", desc: "Fingerprint scanner sync status and device logs" },
      { file: "rfid-integration.html", title: "RFID Smart Card Integration", desc: "Smart turnstile gate tap logs for students and buses" },
      { file: "qr-attendance.html", title: "QR Code Attendance", desc: "Mobile scanner attendance for sports days and school trips" },
      { file: "attendance-reports.html", title: "Attendance Reports", desc: "Monthly, quarterly and annual MIS export sheets" }
    ]
  },
  {
    key: "examinations",
    name: "Examination & Results",
    icon: "bi-award-fill",
    submodules: [
      { file: "dashboard.html", title: "Examination Dashboard", desc: "Upcoming exams, evaluation progress and pass percentages" },
      { file: "exam-types.html", title: "Exam Types Master", desc: "Unit tests, periodic assessments, half-yearly and pre-boards" },
      { file: "exam-groups.html", title: "Exam Groups", desc: "Combined term groupings for cumulative result calculation" },
      { file: "exam-schedules.html", title: "Exam Schedules", desc: "Date sheets, duration and maximum marks configuration" },
      { file: "exam-timetables.html", title: "Exam Timetables", desc: "Print-ready student examination date sheets" },
      { file: "exam-rooms.html", title: "Exam Rooms & Halls", desc: "Invigilation venue capacity and room supervisor duty rovers" },
      { file: "seating-plans.html", title: "Seating Plans", desc: "Automated anti-copying roll number seating arrangements" },
      { file: "admit-cards.html", title: "Admit Cards (Hall Tickets)", desc: "Printable admit cards with student photo, barcode and rules" },
      { file: "question-bank.html", title: "Question Bank", desc: "Categorized MCQ, short answer and long answer questions" },
      { file: "question-papers.html", title: "Question Papers", desc: "Automated question paper composer with blueprints" },
      { file: "online-exams.html", title: "Online Examinations (CBT)", desc: "Computer-based testing with automated grading and timer" },
      { file: "omr-evaluation.html", title: "OMR Evaluation Sheet Scanner", desc: "Optical mark reader sheet scanning and error flagging" },
      { file: "marks-entry.html", title: "Marks Entry Register", desc: "Teacher score input table with min/max validation" },
      { file: "bulk-marks-import.html", title: "Bulk Marks Import (Excel)", desc: "One-click spreadsheet marksheet ingestion" },
      { file: "theory-practical-marks.html", title: "Theory & Practical Marks", desc: "Split theory (80/70) and lab practical (20/30) configuration" },
      { file: "internal-assessment.html", title: "Internal Assessment (CCE 20%)", desc: "Portfolio, multiple assessments, subject enrichment scores" },
      { file: "projects-viva-marks.html", title: "Projects & Viva Marks", desc: "Oral examination and project file evaluation registry" },
      { file: "grade-configuration.html", title: "Grade Configuration", desc: "CBSE 9-point grading scale (A1 to E) and percentage cutoffs" },
      { file: "cbse-assessment.html", title: "CBSE Assessment Structure", desc: "Standardized Class 9 to 12 CBSE marking guidelines" },
      { file: "state-board-assessment.html", title: "State Board Assessment Structure", desc: "State specific grade points and moderations" },
      { file: "marks-verification.html", title: "Marks Verification Workflow", desc: "HOD and examination controller sign-off lock" },
      { file: "result-processing.html", title: "Result Processing Engine", desc: "Batch calculation of totals, grades, CGPA and ranks" },
      { file: "percentage-grade-calc.html", title: "Percentage & Grade Calculation", desc: "Weighted formula engine for multi-term evaluations" },
      { file: "class-rank.html", title: "Class Rank Analysis", desc: "Section and class topper identification" },
      { file: "merit-list.html", title: "Merit List & Toppers", desc: "Subject-wise and overall school academic honours list" },
      { file: "report-cards.html", title: "CBSE Report Cards Generator", desc: "Official print-ready CBSE Holistic Progress Cards (HPC)" },
      { file: "progress-reports.html", title: "Continuous Progress Reports", desc: "PTM mid-term feedback summary sheets" },
      { file: "cumulative-results.html", title: "Cumulative Results", desc: "Multi-year student academic trajectory sheets" },
      { file: "rechecking.html", title: "Marks Rechecking & Retotaling", desc: "Student script revaluation requests and fee receipts" },
      { file: "supplementary-exams.html", title: "Supplementary & Compartment Exams", desc: "Remedial re-examination scheduling and score updates" },
      { file: "promotion-eligibility.html", title: "Promotion Eligibility Matrix", desc: "Automated pass/fail promotion decision rules" },
      { file: "result-publication.html", title: "Result Publication", desc: "Secure portal and SMS result release to parents" },
      { file: "subject-analysis.html", title: "Subject Performance Analysis", desc: "Faculty performance evaluation and class average metrics" },
      { file: "exam-reports.html", title: "Examination MIS Reports", desc: "Tabulation registers (TR sheets) and board analytics" }
    ]
  },
  {
    key: "fees",
    name: "Fees Management",
    icon: "bi-cash-coin",
    submodules: [
      { file: "dashboard.html", title: "Fees Dashboard", desc: "Collection summary, outstanding dues and daily cashier totals" },
      { file: "fee-categories.html", title: "Fee Categories", desc: "Tuition, computer, annual, development and lab fees" },
      { file: "fee-heads.html", title: "Fee Heads Master", desc: "Accounting chart mapping and GST tax classification" },
      { file: "class-fee-structures.html", title: "Class-wise Fee Structures", desc: "Configurable annual fee amounts per grade level" },
      { file: "session-fee-structures.html", title: "Session-wise Fee Structures", desc: "Multi-year fee revisions and inflationary indexation" },
      { file: "monthly-fees.html", title: "Monthly Fee Setup", desc: "Calendar month billing cycles and due dates" },
      { file: "quarterly-fees.html", title: "Quarterly Fee Setup", desc: "Q1 (Apr), Q2 (Jul), Q3 (Oct), Q4 (Jan) installment schedules" },
      { file: "annual-fees.html", title: "Annual Fee Structure", desc: "Lump-sum upfront fee payment terms with discount rules" },
      { file: "admission-fees.html", title: "Admission Fees Setup", desc: "One-time registration, caution money and prospectus dues" },
      { file: "examination-fees.html", title: "Examination Fees", desc: "Term exam and CBSE external board registration dues" },
      { file: "transport-fees.html", title: "Transport Fees Slab", desc: "Distance-based route slabs (0-5 km, 5-10 km, 10+ km)" },
      { file: "hostel-fees.html", title: "Hostel Fee Structures", desc: "Boarding, lodging and mess meal charges" },
      { file: "misc-fees.html", title: "Miscellaneous Fees & Fines", desc: "Library fines, lab breakages and duplicate ID dues" },
      { file: "installment-setup.html", title: "Installment Setup", desc: "Customized parent split-payment plans" },
      { file: "student-fee-assignment.html", title: "Student Fee Assignment", desc: "Individualized fee ledger mapping per enrolled pupil" },
      { file: "invoice-generation.html", title: "Fee Invoice Generation", desc: "Bulk automated demand note and fee bill creator" },
      { file: "fee-collection.html", title: "Fee Collection Counter", desc: "Quick pos cashier counter with cash, UPI, card and cheque modes" },
      { file: "partial-payments.html", title: "Partial Payments", desc: "Part payments handling with running balance adjustments" },
      { file: "advance-payments.html", title: "Advance Payments", desc: "Prepaid fee deposits and surplus balance carry-overs" },
      { file: "receipt-generation.html", title: "Fee Receipt Generation", desc: "Three-copy official fee receipt preview and print" },
      { file: "receipt-reprint.html", title: "Receipt Reprinting", desc: "Duplicate receipt duplicate register with audit track" },
      { file: "receipt-cancellation.html", title: "Receipt Cancellation", desc: "Bounced cheque and void transaction reversals" },
      { file: "fee-refunds.html", title: "Fee Refund Management", desc: "Caution deposit refund and withdrawal settlements" },
      { file: "concessions.html", title: "Fee Concessions & Waivers", desc: "Economically weaker section (EWS) and merit fee waivers" },
      { file: "scholarships.html", title: "Scholarships", desc: "Government and school trust endowment funds" },
      { file: "sibling-discounts.html", title: "Sibling Discounts", desc: "Automated 20% second child & 30% third child discount rules" },
      { file: "staff-discounts.html", title: "Staff Ward Discounts", desc: "Teacher and staff children tuition fee concessions" },
      { file: "late-fees.html", title: "Late Fees & Fines", desc: "Grace period rules and daily fine calculation" },
      { file: "outstanding-balances.html", title: "Outstanding Balances", desc: "Comprehensive aging analysis of pending balances" },
      { file: "defaulter-lists.html", title: "Fee Defaulter Lists", desc: "Filtered list of unpaid students with admit card hold tags" },
      { file: "due-reminders.html", title: "Fee Due Reminders & SMS", desc: "Automated WhatsApp and SMS payment reminders" },
      { file: "daily-collection.html", title: "Daily Collection Reports", desc: "Cashier day-end reconciliation and bank deposit slips" },
      { file: "monthly-collection.html", title: "Monthly Collection Reports", desc: "Budget vs actual fee recovery comparisons" },
      { file: "student-fee-ledgers.html", title: "Student Fee Ledgers", desc: "Complete 12-month statement of account per student" },
      { file: "payment-gateway.html", title: "Payment Gateway Simulation", desc: "Razorpay / PayU / BillDesk checkout sandbox" },
      { file: "payment-reconciliation.html", title: "Payment Reconciliation", desc: "Bank settlement file matching and reconciliation" },
      { file: "fee-carry-forward.html", title: "Fee Carry-forward", desc: "Arrear balance transfer to next academic session" },
      { file: "fee-reports.html", title: "Comprehensive Fee Reports", desc: "Head-wise collection, outstanding and concession exports" }
    ]
  },
  {
    key: "accounts",
    name: "Accounts & Finance",
    icon: "bi-bank",
    submodules: [
      { file: "dashboard.html", title: "Finance Dashboard", desc: "Institutional income, expenditure, liquidity and budget burn" },
      { file: "chart-of-accounts.html", title: "Chart of Accounts", desc: "Hierarchical ledger heads for school financial accounting" },
      { file: "income-heads.html", title: "Income Heads", desc: "Tuition, grants, donations, canteen and bus revenues" },
      { file: "expense-heads.html", title: "Expense Heads", desc: "Salaries, electricity, repairs, books and sports supplies" },
      { file: "cash-accounts.html", title: "Cash Accounts", desc: "Front counter petty cash chests and registers" },
      { file: "bank-accounts.html", title: "Bank Accounts", desc: "School operational, salary and trust bank accounts" },
      { file: "income-entries.html", title: "Income Entries", desc: "Direct receipt vouchers for non-student revenues" },
      { file: "expense-entries.html", title: "Expense Entries", desc: "Operational expenditure bills and vendor invoices" },
      { file: "receipt-vouchers.html", title: "Receipt Vouchers", desc: "Formal credit vouchers with supporting documents" },
      { file: "payment-vouchers.html", title: "Payment Vouchers", desc: "Approved payment releases and cheque references" },
      { file: "journal-vouchers.html", title: "Journal Vouchers", desc: "Double-entry adjustment and depreciation entries" },
      { file: "contra-vouchers.html", title: "Contra Vouchers", desc: "Cash withdrawals and bank deposit contra transfers" },
      { file: "supplier-payments.html", title: "Supplier Payments", desc: "Vendor invoice clearance and TDS deduction registers" },
      { file: "petty-cash.html", title: "Petty Cash", desc: "Daily minor expenses imprest account management" },
      { file: "budgets.html", title: "Departmental Budgets", desc: "Annual departmental allocations and expense caps" },
      { file: "bank-reconciliation.html", title: "Bank Reconciliation", desc: "BRS statement matching bank statement with ERP ledger" },
      { file: "student-ledgers.html", title: "Student Ledgers", desc: "Accounting debit/credit mapping for fee receivables" },
      { file: "vendor-ledgers.html", title: "Vendor Ledgers", desc: "Contractor and equipment supplier payable statements" },
      { file: "trial-balance.html", title: "Trial Balance", desc: "Double entry debit-credit equality verification report" },
      { file: "general-ledger.html", title: "General Ledger", desc: "Complete detailed transaction book for all accounts" },
      { file: "income-expenditure.html", title: "Income & Expenditure Statement", desc: "Annual profit and loss overview for school trust" },
      { file: "balance-sheet.html", title: "Balance Sheet", desc: "Institutional assets, liabilities and corpus capital" },
      { file: "cash-flow.html", title: "Cash Flow Statement", desc: "Operating, investing and financing liquidity analysis" },
      { file: "year-closing.html", title: "Financial Year Closing", desc: "Fiscal year (April - March) book closing and roll-forward" },
      { file: "tax-gst.html", title: "Tax and GST Configuration", desc: "GST input credit on school purchases and TDS rates" },
      { file: "financial-reports.html", title: "Financial MIS Reports", desc: "Audited financial summaries ready for chartered accountants" }
    ]
  },
  {
    key: "hr-payroll",
    name: "HR & Payroll",
    icon: "bi-people-fill",
    submodules: [
      { file: "dashboard.html", title: "HR Dashboard", desc: "Employee headcount, attendance today, leave requests & payroll status" },
      { file: "employee-directory.html", title: "Employee Directory", desc: "Teaching, administrative and auxiliary staff master list" },
      { file: "add-employee.html", title: "Add Employee", desc: "New faculty onboarding with qualification and banking details" },
      { file: "employee-profiles.html", title: "Employee Profiles", desc: "Service book, past experience, appraisal scores and documents" },
      { file: "employee-documents.html", title: "Employee Documents", desc: "B.Ed. degrees, CTET certificates, Aadhaar and appointment letters" },
      { file: "departments.html", title: "Staff Departments", desc: "Science, Humanities, Administration, Sports and IT wings" },
      { file: "designations.html", title: "Designations", desc: "Principal, Vice-Principal, PGT, TGT, PRT, Lab Assistant & Peon" },
      { file: "teacher-qualifications.html", title: "Teacher Qualifications", desc: "CBSE affiliation compliance checks for faculty degrees" },
      { file: "staff-joining.html", title: "Staff Joining", desc: "Offer letter issuance and probation tracking" },
      { file: "staff-exit.html", title: "Staff Exit", desc: "Resignation notice periods and handover clearance" },
      { file: "contracts.html", title: "Employment Contracts", desc: "Permanent, probationary and guest lecture agreement tracking" },
      { file: "staff-attendance.html", title: "Staff Attendance Register", desc: "Monthly present, half-day, absent and OD records" },
      { file: "leave-types.html", title: "Staff Leave Types", desc: "Casual leave (CL), Medical leave (ML), Earned leave (EL) rules" },
      { file: "leave-applications.html", title: "Staff Leave Applications", desc: "Faculty online leave portal with substitute recommendation" },
      { file: "leave-approval.html", title: "Staff Leave Approval", desc: "Principal approval dashboard with roster replacement checks" },
      { file: "salary-structures.html", title: "Salary Structures", desc: "7th Pay Commission pay bands and consolidated packages" },
      { file: "salary-components.html", title: "Salary Components", desc: "Basic pay, DA, HRA, Medical allowance and Special allowances" },
      { file: "allowances.html", title: "Allowances Master", desc: "Overtime, examination duty, and transport allowances" },
      { file: "deductions.html", title: "Deductions Master", desc: "Provident Fund (PF), ESI, Professional Tax (PT) and TDS" },
      { file: "salary-advances.html", title: "Salary Advances", desc: "Emergency staff advance loans and recovery schedules" },
      { file: "loan-management.html", title: "Loan Management", desc: "Staff provident fund loans and EMI deductions" },
      { file: "payroll-processing.html", title: "Payroll Processing", desc: "Monthly one-click attendance-linked salary computation" },
      { file: "payslips.html", title: "Payslip Generator", desc: "Print-ready password-protected monthly salary slips" },
      { file: "salary-payments.html", title: "Salary Payments", desc: "Bank NEFT/RTGS salary disbursement file export" },
      { file: "pf-esi-tds.html", title: "PF / ESI / TDS Configuration", desc: "EPFO monthly electronic challan ECR and Form 16 statements" },
      { file: "performance-appraisal.html", title: "Performance Appraisal", desc: "Annual confidential report (ACR) and student feedback ratings" },
      { file: "staff-training.html", title: "Staff Training & CPD", desc: "CBSE mandatory 50 hours Continuous Professional Development logs" },
      { file: "staff-notices.html", title: "Staff Circulars & Notices", desc: "Internal administrative memos and staff meeting minutes" },
      { file: "experience-certificates.html", title: "Experience Certificates", desc: "Service tenure and relieving certificate generator" },
      { file: "fnf-settlement.html", title: "Full & Final Settlement", desc: "Gratuity, leave encashment and final dues calculations" },
      { file: "payroll-reports.html", title: "Payroll MIS Reports", desc: "Monthly bank statements, PF returns and CTC breakdown" }
    ]
  },
  {
    key: "communication",
    name: "Communication Hub",
    icon: "bi-chat-dots-fill",
    submodules: [
      { file: "dashboard.html", title: "Communication Dashboard", desc: "SMS balance, message delivery rates and active broadcast campaigns" },
      { file: "notice-board.html", title: "Digital Notice Board", desc: "Published school notices with role-based visibility" },
      { file: "circulars.html", title: "Official Circulars", desc: "PDF circulars with parent digital acknowledgment tracking" },
      { file: "sms-campaigns.html", title: "SMS Campaigns", desc: "Bulk DLT approved SMS gateway broadcasting" },
      { file: "email-campaigns.html", title: "Email Campaigns", desc: "HTML newsletter and school event broadcast emails" },
      { file: "whatsapp-messages.html", title: "WhatsApp Messages", desc: "Official WhatsApp Business API notifications and fee alerts" },
      { file: "push-notifications.html", title: "Push Notifications", desc: "Mobile app instant alerts for parents and teachers" },
      { file: "message-templates.html", title: "Message Templates", desc: "Pre-approved templates for attendance, fees, exams and holidays" },
      { file: "class-messages.html", title: "Class-wise Messages", desc: "Targeted broadcast to specific classes and sections" },
      { file: "parent-announcements.html", title: "Parent Announcements", desc: "Parent community news, PTM invites and safety alerts" },
      { file: "teacher-announcements.html", title: "Teacher Announcements", desc: "Faculty meeting agendas and exam duty schedules" },
      { file: "fee-reminders.html", title: "Fee Reminders", desc: "Automated trigger for upcoming and overdue fee installments" },
      { file: "absence-notifications.html", title: "Absence Notifications", desc: "Real-time morning 9:30 AM student absence alerts" },
      { file: "exam-notifications.html", title: "Examination Notifications", desc: "Date sheet release, admit card availability and syllabus tips" },
      { file: "result-notifications.html", title: "Result Notifications", desc: "Term result published alerts with portal direct link" },
      { file: "holiday-notifications.html", title: "Holiday Notifications", desc: "Sudden weather / pollution advisory school closure alerts" },
      { file: "birthday-notifications.html", title: "Birthday Notifications", desc: "Automated morning birthday greetings to students and staff" },
      { file: "notification-logs.html", title: "Notification Logs", desc: "Full history of all dispatched messages with timestamps" },
      { file: "delivery-reports.html", title: "Delivery Reports", desc: "Delivered, bounced, failed and pending SMS metrics" }
    ]
  },
  {
    key: "transport",
    name: "Transport Management",
    icon: "bi-bus-front-fill",
    submodules: [
      { file: "dashboard.html", title: "Transport Dashboard", desc: "Fleet on road, fuel consumption, driver attendance & GPS status" },
      { file: "vehicle-directory.html", title: "Vehicle Directory", desc: "School yellow buses, mini-vans and staff cabs roster" },
      { file: "vehicle-details.html", title: "Vehicle Details", desc: "Chassis number, seating capacity, speed governor and camera records" },
      { file: "drivers.html", title: "Drivers Master", desc: "Commercial heavy driving license details and police verification" },
      { file: "conductors.html", title: "Conductors & Attendants", desc: "Female bus attendants and conductor verification records" },
      { file: "routes.html", title: "Route Management", desc: "Route master with start point, end point and trip timings" },
      { file: "stops.html", title: "Stop Management", desc: "Designated pickup and drop stops with arrival ETAs" },
      { file: "student-route-allocation.html", title: "Student Route Allocation", desc: "Assigning students to specific buses, routes and seat numbers" },
      { file: "pickup-drop-points.html", title: "Pickup & Drop Points", desc: "Parent approved pickup locations and authorized guardian tags" },
      { file: "transport-fee-mapping.html", title: "Transport Fee Mapping", desc: "Slab fee linkage to individual bus stop points" },
      { file: "vehicle-capacity.html", title: "Vehicle Capacity Monitoring", desc: "Preventing bus overloading with real-time occupancy counts" },
      { file: "transport-attendance.html", title: "Transport Attendance", desc: "Morning and afternoon RFID bus boarding logs" },
      { file: "gps-tracking.html", title: "GPS Tracking Map", desc: "Live vehicle location map with geofencing and speed alerts" },
      { file: "pickup-drop-alerts.html", title: "Pickup & Drop Alerts", desc: "Automated SMS to parents: 'Bus is 2 stops away'" },
      { file: "fuel-logs.html", title: "Fuel Logs", desc: "Diesel purchases, odometer readings and vehicle mileage analysis" },
      { file: "vehicle-maintenance.html", title: "Vehicle Maintenance", desc: "Routine servicing, oil changes and tyre replacement schedules" },
      { file: "insurance-records.html", title: "Insurance Records", desc: "Commercial comprehensive insurance policy renewal alerts" },
      { file: "fitness-certificates.html", title: "Fitness Certificates", desc: "RTO annual fitness certificate and pollution under control (PUC)" },
      { file: "license-expiry-alerts.html", title: "License Expiry Alerts", desc: "Automatic notifications for upcoming driver license expiries" },
      { file: "service-records.html", title: "Vehicle Service Records", desc: "Workshop job cards, repair bills and parts replacement logs" },
      { file: "transport-expenses.html", title: "Transport Expenses", desc: "Toll taxes, driver overtime, fuel and maintenance cost audit" },
      { file: "transport-reports.html", title: "Transport MIS Reports", desc: "Route optimization, student count per bus and cost per seat" }
    ]
  },
  {
    key: "library",
    name: "Library Management",
    icon: "bi-book-half",
    submodules: [
      { file: "dashboard.html", title: "Library Dashboard", desc: "Total titles, circulation today, overdue books & fine collections" },
      { file: "book-catalogue.html", title: "Book Catalogue", desc: "Accession register with Dewey Decimal classification" },
      { file: "book-categories.html", title: "Book Categories", desc: "Textbooks, reference, fiction, biographies and periodicals" },
      { file: "authors.html", title: "Authors Master", desc: "Author directory with linked titles and publication counts" },
      { file: "publishers.html", title: "Publishers Master", desc: "NCERT, Oxford, Pearson and regional textbook publishers" },
      { file: "isbn-barcode.html", title: "ISBN & Barcode Generator", desc: "Printable library barcode labels for book covers" },
      { file: "book-purchases.html", title: "Book Purchases", desc: "Annual procurement requisitions, invoice details and vendors" },
      { file: "book-stock.html", title: "Book Stock Inventory", desc: "Shelf location (rack & shelf number) and available copies count" },
      { file: "book-issue.html", title: "Book Issue Counter", desc: "Quick barcode scanning issue to student or faculty card" },
      { file: "book-return.html", title: "Book Return Counter", desc: "Return scan with automatic overdue fine computation" },
      { file: "book-renewal.html", title: "Book Renewal", desc: "Loan period extension for research projects" },
      { file: "book-reservations.html", title: "Book Reservations", desc: "Waitlist queuing for high-demand reference titles" },
      { file: "overdue-books.html", title: "Overdue Books", desc: "Defaulter list with automated overdue reminder notices" },
      { file: "fine-collection.html", title: "Fine Collection Register", desc: "Per-day overdue fine receipt ledger" },
      { file: "lost-damaged.html", title: "Lost / Damaged Books", desc: "Replacement cost recoveries and write-off approvals" },
      { file: "student-cards.html", title: "Student Library Cards", desc: "Borrowing limits (2 books for 14 days) and card barcodes" },
      { file: "staff-accounts.html", title: "Staff Library Accounts", desc: "Teacher borrowing limits (5 books for 30 days)" },
      { file: "book-search.html", title: "OPAC Book Search", desc: "Public Online Access Catalogue terminal for students" },
      { file: "stock-verification.html", title: "Stock Verification", desc: "Annual physical audit, missing books and weeding logs" },
      { file: "library-reports.html", title: "Library MIS Reports", desc: "Most borrowed titles, reading trends and circulation summaries" }
    ]
  },
  {
    key: "inventory",
    name: "Inventory & Assets",
    icon: "bi-box-seam-fill",
    submodules: [
      { file: "dashboard.html", title: "Inventory Dashboard", desc: "Stock valuation, pending purchase requisitions & low stock alerts" },
      { file: "item-categories.html", title: "Item Categories", desc: "Stationery, uniforms, lab glassware, sports and electronics" },
      { file: "item-master.html", title: "Item Master", desc: "Item SKU, unit of measurement (UOM), minimum threshold and prices" },
      { file: "units.html", title: "Units of Measurement", desc: "Nos, Boxes, Reams, Packets, Kilograms and Litres" },
      { file: "suppliers.html", title: "Suppliers & Vendors", desc: "Registered school vendors, GSTIN and contact directories" },
      { file: "purchase-requisitions.html", title: "Purchase Requisitions", desc: "Departmental indents submitted to storekeeper" },
      { file: "purchase-orders.html", title: "Purchase Orders (PO)", desc: "Formal purchase orders issued to authorized suppliers" },
      { file: "grn.html", title: "Goods Receipt Notes (GRN)", desc: "Gate inward quality inspection and received item counts" },
      { file: "stock-inward.html", title: "Stock Inward Register", desc: "Warehouse stock additions with purchase cost mapping" },
      { file: "stock-issue.html", title: "Stock Issue Register", desc: "Items disbursed to teachers, labs and sports departments" },
      { file: "stock-transfers.html", title: "Stock Transfers", desc: "Movement between central warehouse and departmental lockers" },
      { file: "stock-returns.html", title: "Stock Returns", desc: "Unused items returned back to central inventory" },
      { file: "min-stock-alerts.html", title: "Minimum Stock Alerts", desc: "Automated reorder notifications when stock drops below safety levels" },
      { file: "stationery.html", title: "Stationery Register", desc: "Printer paper, whiteboard markers, registers and chalk boxes" },
      { file: "uniforms-books.html", title: "Uniforms and Books Counter", desc: "School uniform sizes and textbook kit distribution" },
      { file: "lab-equipment.html", title: "Laboratory Equipment", desc: "Microscopes, chemical compounds, test tubes and lab sensors" },
      { file: "furniture-register.html", title: "Furniture Register", desc: "Desks, benches, teacher podiums, library chairs and almirahs" },
      { file: "asset-allocation.html", title: "Fixed Asset Allocation", desc: "Projectors, smart TVs, computers and AC units tracking by room" },
      { file: "asset-maintenance.html", title: "Asset Maintenance", desc: "Annual maintenance contracts (AMC) and repair logs" },
      { file: "asset-disposal.html", title: "Asset Disposal & Scraps", desc: "Decommissioning, auctioning and depreciation write-offs" },
      { file: "stock-audit.html", title: "Stock Audit", desc: "Year-end physical count verification vs system inventory" },
      { file: "purchase-reports.html", title: "Purchase Reports", desc: "Vendor-wise procurement expenditure and price variations" },
      { file: "inventory-reports.html", title: "Inventory MIS Reports", desc: "Consumption reports, stock balances and dead stock analysis" }
    ]
  },
  {
    key: "hostel",
    name: "Hostel Management",
    icon: "bi-building-fill",
    submodules: [
      { file: "dashboard.html", title: "Hostel Dashboard", desc: "Bed occupancy, student check-in status, mess meal counts & complaints" },
      { file: "buildings.html", title: "Hostel Buildings", desc: "Boys Hostel, Girls Hostel and Junior Boarding blocks" },
      { file: "floors.html", title: "Floors Master", desc: "Floor plans, warden duty stations and emergency exits" },
      { file: "rooms.html", title: "Hostel Rooms", desc: "Room types: Single, Double, Triple sharing and Dormitories" },
      { file: "bed-allocation.html", title: "Bed Allocation", desc: "Assigned beds, study desks and wardrobe numbers per student" },
      { file: "hostel-admissions.html", title: "Hostel Admissions", desc: "Boarder onboarding, medical checkups and undertaking forms" },
      { file: "hostel-fees.html", title: "Hostel Fee Structures", desc: "Room rent, mess fees, laundry and electricity dues" },
      { file: "room-changes.html", title: "Room Changes", desc: "Room transfer requests and roommate swaps" },
      { file: "hostel-attendance.html", title: "Hostel Night Attendance", desc: "Evening roll call (8:00 PM) biometric verification" },
      { file: "wardens.html", title: "Warden Management", desc: "Chief warden and assistant warden shift allocations" },
      { file: "visitor-register.html", title: "Visitor Register", desc: "Parent weekend visitation logs and ID verification" },
      { file: "in-out-register.html", title: "In / Out Gate Register", desc: "Boarder campus exit and return time logging" },
      { file: "outing-permissions.html", title: "Outing Permissions", desc: "Weekend day-out and night-stay parental authorization workflow" },
      { file: "mess-management.html", title: "Mess & Menu Management", desc: "Weekly dietary meal schedules, breakfast, lunch, snacks & dinner" },
      { file: "complaints.html", title: "Hostel Complaints", desc: "Electrical, plumbing, food quality and hygiene tickets" },
      { file: "maintenance-requests.html", title: "Maintenance Requests", desc: "Carpentry, AC servicing and repair works orders" },
      { file: "hostel-inventory.html", title: "Hostel Inventory", desc: "Mattresses, bedsheets, mess utensils and sports kits" },
      { file: "hostel-reports.html", title: "Hostel MIS Reports", desc: "Occupancy rate, mess consumption and discipline reports" }
    ]
  },
  {
    key: "health-welfare",
    name: "Health & Student Welfare",
    icon: "bi-heart-pulse-fill",
    submodules: [
      { file: "dashboard.html", title: "Health Dashboard", desc: "Infirmary visits today, allergy alerts, vaccinations and health checkups" },
      { file: "medical-profiles.html", title: "Student Medical Profiles", desc: "Blood group, chronic conditions, vision power and emergency tags" },
      { file: "medical-records.html", title: "Medical Records", desc: "Doctor consultations, prescriptions and treatment history" },
      { file: "emergency-contacts.html", title: "Emergency Medical Contacts", desc: "Nearest empanelled hospitals and family physician numbers" },
      { file: "medical-room-register.html", title: "Infirmary Room Register", desc: "Daily student admissions to sick bay with nurse logs" },
      { file: "health-checkups.html", title: "Health Check-up Camps", desc: "Annual dental, eye, ENT and pediatric medical screenings" },
      { file: "vaccination-records.html", title: "Vaccination Records", desc: "Mandatory childhood immunizations and booster doses" },
      { file: "height-weight.html", title: "Height & Weight Records", desc: "BMI percentile tracking for CBSE physical health card" },
      { file: "allergy-alerts.html", title: "Allergy Alerts", desc: "Nut allergies, asthma, lactose intolerance alerts flagged to canteen" },
      { file: "first-aid-register.html", title: "First Aid Register", desc: "Minor cuts, sprains and sports ground injuries" },
      { file: "accident-reports.html", title: "Accident Reports", desc: "Formal incident documentation and parent intimations" },
      { file: "counselling.html", title: "Counselling Appointments", desc: "Confidential school psychologist appointments and emotional wellness" },
      { file: "welfare-cases.html", title: "Welfare Case Management", desc: "Special educational needs (SEN) and inclusive learning support" },
      { file: "emergency-notifications.html", title: "Emergency Notifications", desc: "Critical hospital transfer alerts and ambulance dispatch logs" }
    ]
  },
  {
    key: "security",
    name: "Security & Visitor Management",
    icon: "bi-shield-lock-fill",
    submodules: [
      { file: "dashboard.html", title: "Security Dashboard", desc: "Active campus visitors, vehicle entries, open gate passes & alerts" },
      { file: "visitor-registration.html", title: "Visitor Registration", desc: "Photo capture, OTP mobile verification and purpose of visit" },
      { file: "visitor-passes.html", title: "Visitor Passes", desc: "Printable thermal visitor badge with photo and validity time" },
      { file: "check-in-out.html", title: "Check-in / Check-out", desc: "Main gate barcode scanner for visitor exit time capture" },
      { file: "parent-meetings.html", title: "Parent Meeting Appointments", desc: "Pre-approved meeting slots with Principal or Teachers" },
      { file: "gate-passes.html", title: "Student Gate Passes", desc: "Authorized mid-day exit passes signed by class teacher" },
      { file: "early-departures.html", title: "Early Departure Approvals", desc: "Medical or family emergency pickup verifications" },
      { file: "authorized-pickups.html", title: "Authorized Pickup Persons", desc: "Guardian photo register allowed to collect kindergarten students" },
      { file: "security-staff.html", title: "Security Staff & Guards", desc: "Guard shift duties, main gate, hostel and perimeter patrols" },
      { file: "incident-reporting.html", title: "Incident Reporting", desc: "Trespassing, discipline breaches and lost property reports" },
      { file: "cctv-incidents.html", title: "CCTV Incident References", desc: "Camera footage timestamp tags and surveillance logs" },
      { file: "visitor-reports.html", title: "Visitor MIS Reports", desc: "Daily visitor counts, average duration and department-wise traffic" }
    ]
  },
  {
    key: "front-office",
    name: "Front Office",
    icon: "bi-telephone-inbound-fill",
    submodules: [
      { file: "dashboard.html", title: "Front Office Dashboard", desc: "Today's walk-ins, phone calls logged, pending dispatches & appointments" },
      { file: "enquiry-register.html", title: "General Enquiry Register", desc: "All incoming visitor inquiries and resolution status" },
      { file: "walk-in-enquiries.html", title: "Walk-in Enquiries", desc: "Reception front desk parent queries and feedback" },
      { file: "call-register.html", title: "Call Register", desc: "Incoming and outgoing phone calls with duration and caller purpose" },
      { file: "email-enquiries.html", title: "Email Enquiries", desc: "Website contact form messages and mailbox triage" },
      { file: "lead-sources.html", title: "Lead Sources", desc: "Source tagging for all front-office generated leads" },
      { file: "follow-up-calendar.html", title: "Follow-up Calendar", desc: "Receptionist scheduled task reminders" },
      { file: "admission-counselling.html", title: "Admission Counselling Queue", desc: "Token generation and counsellor room routing" },
      { file: "prospectus-distribution.html", title: "Prospectus Sales Counter", desc: "Cash collection for school information booklets" },
      { file: "campus-visits.html", title: "Campus Visits Log", desc: "Coordinating school tour escorts for prospective families" },
      { file: "appointments.html", title: "Appointments Management", desc: "Principal and administrative head meeting calendars" },
      { file: "complaints.html", title: "Grievances & Complaints", desc: "Parent complaint register with escalation tracking" },
      { file: "inward-dispatch.html", title: "Inward Postal Dispatch", desc: "Couriers, board correspondence and letters received" },
      { file: "outward-dispatch.html", title: "Outward Postal Dispatch", desc: "Official speed post, certificates and couriers sent" },
      { file: "front-office-reports.html", title: "Front Office Reports", desc: "Visitor traffic volume and response SLA analytics" }
    ]
  },
  {
    key: "website-cms",
    name: "Website CMS & Online Admissions",
    icon: "bi-globe",
    submodules: [
      { file: "dashboard.html", title: "CMS Dashboard", desc: "Website visits, online applications today, news and media updates" },
      { file: "pages.html", title: "Website Pages", desc: "Home, About Us, Mandatory Public Disclosures, Facilities" },
      { file: "home-builder.html", title: "Home Page Builder", desc: "Hero banners, principal message, achievements slider" },
      { file: "about-us.html", title: "About Us & Vision", desc: "School history, patron trust, philosophy and leadership team" },
      { file: "facilities.html", title: "Facilities Showcase", desc: "Smart classrooms, STEM robotics labs, sports complex, swimming pool" },
      { file: "faculty-directory.html", title: "Faculty Directory", desc: "Teacher photos, qualifications and achievements display" },
      { file: "news.html", title: "News & Announcements", desc: "School achievements, board toppers and press releases" },
      { file: "events.html", title: "Events & Calendar", desc: "Upcoming public school events and invitations" },
      { file: "photo-gallery.html", title: "Photo Gallery", desc: "Annual day, sports day, independence day photo albums" },
      { file: "video-gallery.html", title: "Video Gallery", desc: "School campus virtual tour and student performances" },
      { file: "notice-downloads.html", title: "Notice Downloads", desc: "Public circulars, book lists, and holiday list PDFs" },
      { file: "online-admission-form.html", title: "Online Admission Form", desc: "Public applicant registration form configuration" },
      { file: "application-fee.html", title: "Application Fee UI", desc: "Payment gateway integration for prospectus fee" },
      { file: "application-status.html", title: "Application Status Tracking", desc: "Parent self-service portal to check application progress" },
      { file: "document-upload.html", title: "Document Upload Portal", desc: "Parent document upload interface" },
      { file: "merit-list-publishing.html", title: "Merit List Publishing", desc: "Release selected applicant lists to website" },
      { file: "contact-enquiries.html", title: "Contact Enquiries", desc: "Online enquiry submissions from website footer" },
      { file: "seo-metadata.html", title: "SEO Metadata", desc: "Meta titles, descriptions, OpenGraph tags and sitemaps" },
      { file: "website-settings.html", title: "Website Settings", desc: "Domain, social media handles and Google Analytics code" }
    ]
  },
  {
    key: "reports",
    name: "Reports & MIS",
    icon: "bi-bar-chart-line-fill",
    submodules: [
      { file: "dashboard.html", title: "MIS Dashboard", desc: "Executive 360-degree KPI command center for school management" },
      { file: "student-strength.html", title: "Student Strength Report", desc: "Class and section-wise student headcount summary" },
      { file: "class-wise-students.html", title: "Class-wise Students Report", desc: "Detailed breakdown with new admissions and withdrawals" },
      { file: "gender-category-reports.html", title: "Gender & Category Reports", desc: "Boys vs Girls ratio, General, OBC, SC, ST, EWS distributions" },
      { file: "admission-reports.html", title: "Admission Analytics Report", desc: "Application volume, lead conversion rates and source ROI" },
      { file: "withdrawal-reports.html", title: "Withdrawal Reports", desc: "TC issued analysis and reason for leaving breakdown" },
      { file: "attendance-reports.html", title: "Attendance Analysis Report", desc: "School-wide attendance percentages and month-over-month trend" },
      { file: "low-attendance-reports.html", title: "Low Attendance Report", desc: "List of students under 75% CBSE mandatory criteria" },
      { file: "exam-results.html", title: "Examination Results Summary", desc: "Pass percentages, distinctions and class subject averages" },
      { file: "class-rank-reports.html", title: "Class Rank Reports", desc: "First, second and third rank holders per class and stream" },
      { file: "subject-performance.html", title: "Subject Performance Report", desc: "Comparative analysis across academic subjects" },
      { file: "fee-collection.html", title: "Fee Collection Report", desc: "Daily, monthly and quarterly fee inflows by payment mode" },
      { file: "outstanding-fees.html", title: "Outstanding Fees Report", desc: "Unpaid dues sorted by class, head and aging bracket" },
      { file: "fee-defaulters.html", title: "Fee Defaulters Report", desc: "Actionable list for payment follow-up and notices" },
      { file: "concession-reports.html", title: "Fee Concession Report", desc: "EWS, staff ward and sibling discount financial impact" },
      { file: "scholarship-reports.html", title: "Scholarship Disbursal Report", desc: "Merit and sports scholarship distributions" },
      { file: "income-reports.html", title: "Income Analysis Report", desc: "Tuition and non-tuition revenue streams" },
      { file: "expense-reports.html", title: "Expense Analysis Report", desc: "Operational cost breakdown against approved budgets" },
      { file: "payroll-reports.html", title: "Payroll Summary Report", desc: "Monthly salary expenditure, PF and ESI contributions" },
      { file: "staff-attendance-reports.html", title: "Staff Attendance Report", desc: "Faculty presence, leaves availed and punctuality metrics" },
      { file: "transport-reports.html", title: "Transport Fleet Report", desc: "Bus route occupancy, fuel mileage and transport fee recovery" },
      { file: "library-reports.html", title: "Library Circulation Report", desc: "Book circulation volume and inventory statistics" },
      { file: "inventory-reports.html", title: "Inventory Stock Report", desc: "Stock valuation, consumption rate and re-order list" },
      { file: "hostel-reports.html", title: "Hostel Occupancy Report", desc: "Boarder headcounts, room vacancy and mess accounts" },
      { file: "admission-funnel.html", title: "Admission Funnel Report", desc: "Conversion drop-offs from enquiry to fee payment" },
      { file: "academic-progress-reports.html", title: "Academic Progress Report", desc: "Class learning outcome mastery and CCE grade distributions" },
      { file: "financial-summary.html", title: "Financial Summary Report", desc: "Comprehensive balance sheet and cash flow overview" },
      { file: "export-center.html", title: "Universal Export Center", desc: "Bulk export of datasets to Excel, CSV, PDF and JSON" }
    ]
  },
  {
    key: "online-learning",
    name: "Online Learning & LMS",
    icon: "bi-laptop-fill",
    submodules: [
      { file: "dashboard.html", title: "LMS Dashboard", desc: "Active courses, live classes scheduled today & video lessons viewed" },
      { file: "courses.html", title: "Courses & Subjects", desc: "Digital learning course structures aligned to curriculum" },
      { file: "learning-modules.html", title: "Learning Modules", desc: "Chapter-wise structured modules with interactive resources" },
      { file: "online-classes.html", title: "Online Classes", desc: "Zoom, Google Meet and Teams scheduled virtual classrooms" },
      { file: "video-lessons.html", title: "Video Lessons", desc: "Recorded lecture repository with streaming playback" },
      { file: "digital-materials.html", title: "Digital Study Materials", desc: "E-books, interactive flashcards and presentation slides" },
      { file: "online-assignments.html", title: "Online Assignments", desc: "Digital assignment task creation with rubric criteria" },
      { file: "assignment-submissions.html", title: "Assignment Submissions", desc: "Student file uploads and teacher grading feedback" },
      { file: "online-quizzes.html", title: "Online Quizzes", desc: "Timed multiple-choice tests with automatic scoring" },
      { file: "course-progress.html", title: "Course Progress Tracker", desc: "Student video completion and lesson milestone status" },
      { file: "learning-history.html", title: "Student Learning History", desc: "Individual pupil activity log and study time analytics" },
      { file: "teacher-courses.html", title: "Teacher Course Management", desc: "Faculty content authoring and student enrollment tools" }
    ]
  },
  {
    key: "sports-activities",
    name: "Sports & Co-Curricular",
    icon: "bi-trophy-fill",
    submodules: [
      { file: "dashboard.html", title: "Sports Dashboard", desc: "Active teams, upcoming tournaments, athlete participation & medals" },
      { file: "categories.html", title: "Sports Categories", desc: "Cricket, Football, Basketball, Athletics, Swimming, Chess & Yoga" },
      { file: "teams.html", title: "Sports Teams", desc: "Under-14, Under-17, Under-19 school varsity squads" },
      { file: "participation.html", title: "Student Participation", desc: "Pupil enrollment in sports and physical education (PE)" },
      { file: "coaches.html", title: "Coaches & Physical Instructors", desc: "Sports faculty, training specializations and certifications" },
      { file: "timetable.html", title: "Sports Timetable", desc: "Morning training, ground allocation and physical education periods" },
      { file: "competitions.html", title: "Tournaments & Competitions", desc: "Inter-school tournaments, CBSE cluster meets and state games" },
      { file: "events.html", title: "Sports Events", desc: "Annual sports day heats, track events and marches" },
      { file: "achievements.html", title: "Achievements & Medals", desc: "Gold, silver, bronze honours and trophy register" },
      { file: "awards.html", title: "Awards & Recognitions", desc: "Best athlete, sportsperson of the year and certificates" },
      { file: "certificates.html", title: "Sports Certificates", desc: "Print-ready athletic participation and winner certificates" },
      { file: "discipline.html", title: "Student Discipline & Merits", desc: "House points, commendations and disciplinary records" },
      { file: "co-curricular.html", title: "Co-curricular Activities", desc: "Debate, Music, Dance, Drama, Robotics and MUN clubs" },
      { file: "activity-reports.html", title: "Activity Reports", desc: "Student participation metrics and club performance reviews" }
    ]
  },
  {
    key: "events-ptm",
    name: "Events & PTM",
    icon: "bi-calendar-event-fill",
    submodules: [
      { file: "calendar.html", title: "Event Calendar", desc: "Monthly schedule of school events, holidays and celebrations" },
      { file: "events.html", title: "Event Management", desc: "Planning, organizing and budget tracking for institutional functions" },
      { file: "annual-functions.html", title: "Annual Functions", desc: "Annual day, founder's day and grand cultural evening productions" },
      { file: "trips.html", title: "School Trips & Excursions", desc: "Educational tours, science trips and adventure camps" },
      { file: "sports-day.html", title: "Annual Sports Day", desc: "Track and field events, march-past and athletic displays" },
      { file: "cultural-programs.html", title: "Cultural Programs", desc: "Music festivals, theatrical plays and art exhibitions" },
      { file: "ptm-meetings.html", title: "Parent-Teacher Meetings (PTM)", desc: "Quarterly PTM session management and attendance" },
      { file: "ptm-scheduling.html", title: "PTM Scheduling", desc: "Time slot allocation between parents and subject teachers" },
      { file: "meeting-slots.html", title: "Teacher Meeting Slots", desc: "Configurable 10-minute parent consultation slots" },
      { file: "parent-booking.html", title: "Parent Booking Portal", desc: "Online appointment booking for busy parents" },
      { file: "meeting-feedback.html", title: "Meeting Feedback", desc: "Parent comments, suggestions and teacher observations" },
      { file: "event-registrations.html", title: "Event Registrations", desc: "Ticket and participant registrations for school shows" },
      { file: "event-reports.html", title: "Event MIS Reports", desc: "Parent turnout rates and event expenditure reconciliations" }
    ]
  },
  {
    key: "parent-portal",
    name: "Parent Portal",
    icon: "bi-house-heart-fill",
    submodules: [
      { file: "dashboard.html", title: "Parent Dashboard", desc: "Consolidated home overview for children, attendance, dues & notices" },
      { file: "multiple-children.html", title: "Multiple Children Switcher", desc: "Seamless switching between siblings studying in different classes" },
      { file: "student-profiles.html", title: "Child Profile", desc: "Personal details, roll number, class teacher and house" },
      { file: "attendance.html", title: "Attendance Calendar", desc: "Daily green/red presence calendar with percentage indicator" },
      { file: "timetable.html", title: "Class Timetable", desc: "Weekly subject schedule and period timings" },
      { file: "homework.html", title: "Homework & Diaries", desc: "Daily assigned tasks, teacher notes and submission status" },
      { file: "assignments.html", title: "Assignments & Projects", desc: "Project topics, deadlines and marks scored" },
      { file: "exam-schedule.html", title: "Examination Schedule", desc: "Upcoming datesheets and syllabus for tests" },
      { file: "marks-results.html", title: "Marks & Results", desc: "Subject marks breakdown and grading performance" },
      { file: "report-cards.html", title: "Report Cards", desc: "Downloadable CBSE official term report cards" },
      { file: "fee-balances.html", title: "Fee Balances", desc: "Installment due summary and breakdown of heads" },
      { file: "online-payment.html", title: "Online Fee Payment Simulation", desc: "Credit card, debit card, UPI & Netbanking payment portal" },
      { file: "payment-history.html", title: "Payment History", desc: "Past transaction receipts and payment references" },
      { file: "fee-receipts.html", title: "Fee Receipts", desc: "Download official PDF fee receipts for tax rebate" },
      { file: "leave-applications.html", title: "Leave Applications", desc: "Submit leave request directly to class teacher" },
      { file: "notices.html", title: "School Circulars & Notices", desc: "Official communications and event invites" },
      { file: "calendar.html", title: "School Calendar", desc: "Holidays, exam weeks and school events" },
      { file: "teacher-communication.html", title: "Teacher Communication", desc: "Direct messaging portal with subject teachers" },
      { file: "complaints.html", title: "Grievances & Suggestions", desc: "Raise tickets regarding academics, transport or fees" },
      { file: "certificates.html", title: "Certificate Requests", desc: "Apply for Bonafide, Study or Fee Paid certificates" },
      { file: "transport-info.html", title: "Transport & Bus Tracking", desc: "Bus route, driver contact and live GPS map tracking" },
      { file: "library-status.html", title: "Library Status", desc: "Currently borrowed books and return due dates" },
      { file: "student-progress.html", title: "Learning Progress", desc: "Holistic radar chart of child's scholastic and co-scholastic growth" }
    ]
  },
  {
    key: "student-portal",
    name: "Student Portal",
    icon: "bi-backpack2-fill",
    submodules: [
      { file: "dashboard.html", title: "Student Dashboard", desc: "Personal desk with today's classes, homework, attendance & exams" },
      { file: "profile.html", title: "My Profile", desc: "Student credentials, APAAR ID and academic history" },
      { file: "timetable.html", title: "My Timetable", desc: "Today's periods, teacher names and room numbers" },
      { file: "attendance.html", title: "My Attendance", desc: "Attendance records and percentage tracker" },
      { file: "homework.html", title: "My Homework", desc: "Pending homework tasks with completion checklists" },
      { file: "assignments.html", title: "My Assignments", desc: "Online project submission and score reviews" },
      { file: "study-materials.html", title: "Study Materials", desc: "Download teacher uploaded notes and revision presentations" },
      { file: "syllabus.html", title: "Syllabus Tracker", desc: "Subject chapters and syllabus coverage status" },
      { file: "exam-schedule.html", title: "Exam Date Sheet", desc: "Upcoming examination timetables and room allocations" },
      { file: "admit-cards.html", title: "My Admit Card", desc: "Download and print examination hall ticket" },
      { file: "marks.html", title: "My Marks & Grades", desc: "Unit test, periodic and term assessment results" },
      { file: "report-cards.html", title: "My Report Cards", desc: "Official digital report cards" },
      { file: "fee-status.html", title: "My Fee Status", desc: "Quarterly fee installment summary and dues status" },
      { file: "payment-receipts.html", title: "Payment Receipts", desc: "Receipt records for paid school fees" },
      { file: "leave-applications.html", title: "Leave Application", desc: "Submit leave reason and view approval status" },
      { file: "notices.html", title: "School Notices", desc: "Circulars, holiday alerts and competition invites" },
      { file: "certificates.html", title: "My Certificates", desc: "Merit, sports and participation digital certificates" },
      { file: "library-books.html", title: "Issued Library Books", desc: "Books currently in possession and renewal options" },
      { file: "transport-details.html", title: "My Bus Route", desc: "Bus number, driver details and stop timings" },
      { file: "sports-activities.html", title: "Sports & Club Roster", desc: "Assigned clubs, house details and sports teams" },
      { file: "learning-progress.html", title: "Academic Growth", desc: "Subject mastery charts and strengths overview" }
    ]
  },
  {
    key: "teacher-portal",
    name: "Teacher Portal",
    icon: "bi-person-workspace",
    submodules: [
      { file: "dashboard.html", title: "Teacher Dashboard", desc: "Today's schedule, assigned classes, attendance shortcuts & diary" },
      { file: "my-classes.html", title: "My Classes", desc: "List of classes and sections assigned to teacher" },
      { file: "my-subjects.html", title: "My Subjects", desc: "Curriculum syllabus and teaching materials for assigned subjects" },
      { file: "timetable.html", title: "My Timetable", desc: "Weekly teaching timetable with free periods marked" },
      { file: "student-directory.html", title: "Class Students Roster", desc: "Student directory for teacher's homeroom section" },
      { file: "attendance-entry.html", title: "Mark Attendance", desc: "Quick one-click morning or period attendance marking" },
      { file: "homework-creation.html", title: "Assign Homework", desc: "Create daily homework with instructions and attachments" },
      { file: "assignments.html", title: "Assignment Manager", desc: "Grade student assignments and leave qualitative feedback" },
      { file: "study-materials.html", title: "Upload Study Materials", desc: "Share lecture PDFs, worksheets and links with class" },
      { file: "lesson-planning.html", title: "My Lesson Plans", desc: "Weekly lesson preparation notes and pedagogical aids" },
      { file: "teaching-diary.html", title: "Daily Teaching Diary", desc: "Log topics covered today and classroom homework assigned" },
      { file: "marks-entry.html", title: "Enter Exam Marks", desc: "Input scores for unit tests and term examinations" },
      { file: "student-performance.html", title: "Student Performance", desc: "Identify top performers and students requiring remedial help" },
      { file: "parent-communication.html", title: "Parent Communication", desc: "Send direct feedback messages to student guardians" },
      { file: "leave-applications.html", title: "My Leave Requests", desc: "Apply for casual or medical leave with proxy recommendations" },
      { file: "substitute-details.html", title: "Proxy & Substitute Duties", desc: "Covering classes for absent colleagues" },
      { file: "class-reports.html", title: "Class Academic Reports", desc: "Class attendance summary and test result averages" }
    ]
  },
  {
    key: "integrations",
    name: "Integrations & API",
    icon: "bi-plugin",
    submodules: [
      { file: "dashboard.html", title: "Integration Dashboard", desc: "Active API connections, gateway uptime, sync status & webhook logs" },
      { file: "sms-settings.html", title: "SMS Gateway Settings", desc: "Configuration for MSG91, Textlocal, Gupshup & DLT Principal Entities" },
      { file: "email-settings.html", title: "Email SMTP Settings", desc: "Google Workspace / Microsoft 365 / Amazon SES SMTP setup" },
      { file: "whatsapp-settings.html", title: "WhatsApp Business API", desc: "Meta Cloud API credentials and verified phone number settings" },
      { file: "payment-settings.html", title: "Payment Gateway Settings", desc: "Razorpay, PayU, Paytm & HDFC SmartHub API keys & webhooks" },
      { file: "biometric-settings.html", title: "Biometric Device Integration", desc: "ZKTeco, Essl biometric server IP, port and automated sync intervals" },
      { file: "rfid-settings.html", title: "RFID Device Integration", desc: "Smart card turnstile readers and bus mobile scanners" },
      { file: "gps-settings.html", title: "GPS Provider Integration", desc: "Fleet tracking API integration (Teltonika, Convex, AryaOmnitalk)" },
      { file: "cloud-storage-settings.html", title: "Cloud Storage Settings", desc: "AWS S3 / Google Cloud Storage credentials for documents & media" },
      { file: "video-meeting-settings.html", title: "Video Meeting Integration", desc: "Zoom, Google Meet and Microsoft Teams API tokens" },
      { file: "webhooks.html", title: "Webhook Management", desc: "Event dispatch webhooks for external third-party subscriptions" },
      { file: "api-keys.html", title: "API Keys Management", desc: "Generate, revoke and set rate-limits for developer API keys" },
      { file: "api-logs.html", title: "API Request Logs", desc: "Real-time payload inspection, response codes and latency monitoring" },
      { file: "integration-logs.html", title: "Integration Error Logs", desc: "Failed connection attempts and diagnostics" },
      { file: "failed-jobs.html", title: "Failed Jobs Monitor", desc: "Failed SMS, payment notification and email queue inspection" },
      { file: "sync-status.html", title: "Data Sync Status", desc: "Health monitor across all background sync workers" },
      { file: "retry-queue.html", title: "Retry Queue", desc: "Manual and automated replay of failed background jobs" },
      { file: "import-export-jobs.html", title: "Import / Export Jobs", desc: "Asynchronous background batch file processing status" }
    ]
  },
  {
    key: "compliance",
    name: "Compliance & Govt Reporting",
    icon: "bi-file-earmark-check-fill",
    submodules: [
      { file: "dashboard.html", title: "Compliance Dashboard", desc: "Mandatory government filings status, UDISE+ audit & affiliation validity" },
      { file: "cbse-reporting.html", title: "CBSE OASIS & LOC Reporting", desc: "List of Candidates (LOC) verification data and registration files" },
      { file: "state-board-reporting.html", title: "State Board Reporting", desc: "State education department nominal rolls and statistical returns" },
      { file: "udise-data.html", title: "UDISE+ Data Preparation", desc: "Ministry of Education UDISE+ portal automated export formats" },
      { file: "apaar-id.html", title: "APAAR / Academic ID Registry", desc: "Automated Permanent Academic Account Registry verification status" },
      { file: "student-validation.html", title: "Student Data Validation", desc: "Aadhaar, DOB and name matching audit before board submissions" },
      { file: "staff-validation.html", title: "Staff Data Validation", desc: "CTET qualification and teacher training compliance verification" },
      { file: "affiliation-docs.html", title: "Affiliation Documents", desc: "Land certificates, society registration and recognition orders" },
      { file: "recognition-docs.html", title: "Recognition Documents", desc: "State Department of Education recognition and NOC certificates" },
      { file: "compliance-checklist.html", title: "Annual Compliance Checklist", desc: "Fire safety, building safety, water hygiene and health certificates" },
      { file: "certificate-expiry.html", title: "Certificate Expiry Alerts", desc: "Proactive alert tracker for expiring statutory NOC certificates" },
      { file: "compliance-reports.html", title: "Compliance MIS Reports", desc: "RTE 25% quota compliance and statutory audit submission archives" }
    ]
  },
  {
    key: "system-settings",
    name: "System Settings",
    icon: "bi-gear-wide-connected",
    submodules: [
      { file: "general-settings.html", title: "General Settings", desc: "Institution name, academic calendar type, default language & timezone" },
      { file: "school-info.html", title: "School Information", desc: "Affiliation numbers, registration codes, official contact and addresses" },
      { file: "branding.html", title: "Logo & Branding", desc: "Upload school crest, portal favicons and printable watermarks" },
      { file: "academic-settings.html", title: "Academic Settings", desc: "Grading scale defaults, attendance thresholds and promotion rules" },
      { file: "board-settings.html", title: "Board Settings", desc: "Active examination board selection (CBSE / State Board / Dual)" },
      { file: "session-settings.html", title: "Session Settings", desc: "Active financial and academic session switcher and cutoff dates" },
      { file: "date-time-settings.html", title: "Date & Time Formats", desc: "DD/MM/YYYY vs MM/DD/YYYY, 12-hour vs 24-hour clocks" },
      { file: "currency-settings.html", title: "Currency Settings", desc: "Default currency symbol (₹ INR) and number formatting (Lakhs/Crores)" },
      { file: "receipt-numbering.html", title: "Receipt & Invoice Numbering", desc: "Prefixes and auto-increment padding for fee receipts (e.g. REC-2024-001)" },
      { file: "certificate-templates.html", title: "Certificate Templates", desc: "Custom HTML/CSS layout designer for TC, Bonafide and Character certificates" },
      { file: "report-card-templates.html", title: "Report Card Templates", desc: "CBSE HPC, Term Report and Progress Card print layout selection" },
      { file: "notification-settings.html", title: "Notification Settings", desc: "Enable/disable automated SMS and email triggers by event type" },
      { file: "user-preferences.html", title: "User Preferences", desc: "Default landing dashboard and UI density settings" },
      { file: "role-permissions.html", title: "Role Permissions Matrix", desc: "RBAC privilege grid across all 28 modules" },
      { file: "login-history.html", title: "Login History", desc: "User IP addresses, browser agents and successful/failed login timestamps" },
      { file: "audit-logs.html", title: "Audit Trail Logs", desc: "Immutable history of record creations, edits and deletions" },
      { file: "backup-settings.html", title: "Backup Settings", desc: "Automated daily cloud backup schedules and retention rules" },
      { file: "data-import.html", title: "Data Import Wizard", desc: "Bulk Excel/CSV onboarding wizard with column mapping" },
      { file: "data-export.html", title: "Data Export Center", desc: "Complete database JSON/CSV snapshot export" },
      { file: "system-health.html", title: "System Health & Performance", desc: "Server latency, database query times and cache utilization" },
      { file: "error-logs.html", title: "Error Logs", desc: "Application exception traces and system error captures" },
      { file: "privacy-settings.html", title: "Privacy & GDPR / DPDP Settings", desc: "India Digital Personal Data Protection (DPDP) Act student data compliance" }
    ]
  }
];

// Helper to generate sidebar items
function generateSidebarHtml(activeModuleKey, activeFile, depth = 2) {
  const rootPrefix = depth === 2 ? '../../' : '../';

  let navItemsHtml = '';

  // 1. Dashboards section
  navItemsHtml += `
    <div class="sidebar-section-title">Dashboards</div>
    <li class="sidebar-nav-item">
      <a href="${rootPrefix}dashboards/admin.html" class="sidebar-nav-link ${activeModuleKey === 'dashboard' && activeFile === 'admin.html' ? 'active' : ''}">
        <i class="bi bi-speedometer2 nav-icon"></i>
        <span class="nav-text">Admin Dashboard</span>
      </a>
    </li>
    <li class="sidebar-nav-item">
      <a href="${rootPrefix}dashboards/principal.html" class="sidebar-nav-link ${activeModuleKey === 'dashboard' && activeFile === 'principal.html' ? 'active' : ''}">
        <i class="bi bi-mortarboard nav-icon"></i>
        <span class="nav-text">Principal Desk</span>
      </a>
    </li>
    <li class="sidebar-nav-item">
      <a href="${rootPrefix}dashboards/teacher.html" class="sidebar-nav-link ${activeModuleKey === 'dashboard' && activeFile === 'teacher.html' ? 'active' : ''}">
        <i class="bi bi-person-workspace nav-icon"></i>
        <span class="nav-text">Teacher Workplace</span>
      </a>
    </li>
    <li class="sidebar-nav-item">
      <a href="${rootPrefix}dashboards/accountant.html" class="sidebar-nav-link ${activeModuleKey === 'dashboard' && activeFile === 'accountant.html' ? 'active' : ''}">
        <i class="bi bi-cash-coin nav-icon"></i>
        <span class="nav-text">Accounts & Fees</span>
      </a>
    </li>
    <li class="sidebar-nav-item">
      <a href="${rootPrefix}dashboards/admission-officer.html" class="sidebar-nav-link ${activeModuleKey === 'dashboard' && activeFile === 'admission-officer.html' ? 'active' : ''}">
        <i class="bi bi-person-plus nav-icon"></i>
        <span class="nav-text">Admission Office</span>
      </a>
    </li>
    <li class="sidebar-nav-item">
      <a href="${rootPrefix}dashboards/student.html" class="sidebar-nav-link ${activeModuleKey === 'dashboard' && activeFile === 'student.html' ? 'active' : ''}">
        <i class="bi bi-backpack nav-icon"></i>
        <span class="nav-text">Student Portal</span>
      </a>
    </li>
    <li class="sidebar-nav-item">
      <a href="${rootPrefix}dashboards/parent.html" class="sidebar-nav-link ${activeModuleKey === 'dashboard' && activeFile === 'parent.html' ? 'active' : ''}">
        <i class="bi bi-house-heart nav-icon"></i>
        <span class="nav-text">Parent Portal</span>
      </a>
    </li>
  `;

  // 2. All 28 Modules Collapsible Sections
  navItemsHtml += `<div class="sidebar-section-title">Core ERP Modules (28)</div>`;

  moduleDefinitions.forEach((mod) => {
    const isModuleActive = activeModuleKey === mod.key;
    const collapseId = `sub_${mod.key.replace(/-/g, '_')}`;

    const subLinksHtml = mod.submodules.map(sub => {
      const isSubActive = isModuleActive && activeFile === sub.file;
      return `
        <li>
          <a href="${rootPrefix}modules/${mod.key}/${sub.file}" class="sub-link ${isSubActive ? 'active' : ''}" title="${sub.title}">
            ${sub.title}
          </a>
        </li>
      `;
    }).join('');

    navItemsHtml += `
      <li class="sidebar-nav-item">
        <a class="sidebar-nav-link ${isModuleActive ? 'active' : ''}" data-bs-toggle="collapse" href="#${collapseId}" role="button" aria-expanded="${isModuleActive ? 'true' : 'false'}">
          <i class="bi ${mod.icon} nav-icon"></i>
          <span class="nav-text">${mod.name}</span>
          <i class="bi bi-chevron-right arrow-icon"></i>
        </a>
        <div class="collapse ${isModuleActive ? 'show' : ''}" id="${collapseId}">
          <ul class="sidebar-submenu">
            ${subLinksHtml}
          </ul>
        </div>
      </li>
    `;
  });

  return navItemsHtml;
}

// Helper to generate full page HTML shell
function generatePageShell({
  pageTitle,
  pageDesc,
  moduleName,
  moduleKey,
  submoduleFile,
  depth = 2,
  contentHtml,
  modalHtml = ''
}) {
  const rootPrefix = depth === 2 ? '../../' : '../';
  const sidebarNavItems = generateSidebarHtml(moduleKey, submoduleFile, depth);

  return `<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>${pageTitle} - EduSys Pro ERP</title>
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  <!-- Bootstrap 5.3 & Icons CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  
  <!-- Custom Prototype CSS -->
  <link rel="stylesheet" href="${rootPrefix}assets/css/style.css">
  <link rel="stylesheet" href="${rootPrefix}assets/css/responsive.css">
</head>
<body>

  <div class="erp-wrapper">
    <!-- Sidebar Navigation -->
    <aside class="erp-sidebar">
      <div class="sidebar-brand">
        <a href="${rootPrefix}index.html" class="d-flex align-items-center gap-2 text-decoration-none">
          <div class="brand-icon">
            <i class="bi bi-mortarboard-fill"></i>
          </div>
          <div class="brand-text">
            <span class="brand-title">EduSys Pro</span>
            <span class="brand-subtitle">CBSE & State Board</span>
          </div>
        </a>
      </div>

      <div class="sidebar-scroll">
        <ul class="sidebar-nav">
          ${sidebarNavItems}
        </ul>
      </div>

      <div class="sidebar-footer">
        <div class="user-quick-info">
          <div class="user-avatar-sm current-user-avatar">SA</div>
          <div class="user-details-mini">
            <span class="user-name-mini current-user-name">Super Admin</span>
            <span class="user-role-badge-mini current-user-role">Administrator</span>
          </div>
        </div>
        <button class="btn btn-sm btn-outline-danger p-1 rounded-circle" onclick="EduApp.logout('${rootPrefix}')" title="Sign Out">
          <i class="bi bi-box-arrow-right"></i>
        </button>
      </div>
    </aside>

    <!-- Main Content Area -->
    <div class="erp-main">
      <!-- Top Header Navbar -->
      <header class="erp-header">
        <div class="header-left">
          <button class="btn-sidebar-toggle" id="btnSidebarToggle" title="Toggle Sidebar">
            <i class="bi bi-list"></i>
          </button>
          
          <button class="header-search-btn" id="btnHeaderSearch" type="button">
            <i class="bi bi-search"></i>
            <span>Quick search (500+ screens)...</span>
            <kbd>Ctrl+K</kbd>
          </button>
        </div>

        <div class="header-right">
          <!-- Academic Session Switcher -->
          <div class="session-badge-wrap d-none d-md-flex">
            <i class="bi bi-calendar3 text-primary"></i>
            <span>Session:</span>
            <select id="globalSessionSelect">
              <option value="2024-2025" selected>2024-2025 (Active)</option>
              <option value="2023-2024">2023-2024</option>
              <option value="2025-2026">2025-2026 (Upcoming)</option>
            </select>
          </div>

          <!-- Board Selector -->
          <div class="session-badge-wrap d-none d-lg-flex bg-info-subtle border-info text-info">
            <i class="bi bi-award-fill"></i>
            <select id="globalBoardSelect" class="text-info fw-semibold">
              <option value="CBSE" selected>CBSE Board</option>
              <option value="State Board">State Board</option>
              <option value="Dual (CBSE & State)">Dual Curriculum</option>
            </select>
          </div>

          <!-- Theme Toggle -->
          <button class="header-icon-btn" id="btnThemeToggle" title="Toggle Dark/Light Mode">
            <i class="bi bi-moon-stars"></i>
          </button>

          <!-- Notifications Dropdown -->
          <div class="dropdown">
            <button class="header-icon-btn" data-bs-toggle="dropdown" aria-expanded="false" title="Notifications">
              <i class="bi bi-bell"></i>
              <span class="badge-dot"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-end p-0 shadow-lg border-0" style="width: 320px;">
              <div class="p-3 border-bottom d-flex justify-content-between align-items-center bg-light">
                <strong class="font-size-14">Notifications</strong>
                <span class="badge bg-primary rounded-pill">3 New</span>
              </div>
              <div class="list-group list-group-flush font-size-13">
                <a href="${rootPrefix}modules/fees/fee-collection.html" class="list-group-item list-group-item-action p-3">
                  <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-success-subtle text-success">Fee Received</span>
                    <small class="text-muted ms-auto">5m ago</small>
                  </div>
                  <p class="mb-0 text-muted font-size-12">₹28,500 received online from Aarav Sharma (Class 10-A).</p>
                </a>
                <a href="${rootPrefix}modules/admissions/online-applications.html" class="list-group-item list-group-item-action p-3">
                  <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-info-subtle text-info">Admission</span>
                    <small class="text-muted ms-auto">32m ago</small>
                  </div>
                  <p class="mb-0 text-muted font-size-12">New online application submitted for Class 1 (Aditi Mehra).</p>
                </a>
                <a href="${rootPrefix}modules/compliance/cbse-reporting.html" class="list-group-item list-group-item-action p-3">
                  <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-warning-subtle text-warning">Compliance</span>
                    <small class="text-muted ms-auto">2h ago</small>
                  </div>
                  <p class="mb-0 text-muted font-size-12">CBSE LOC data verification checklist ready for Principal sign-off.</p>
                </a>
              </div>
              <div class="p-2 text-center border-top bg-light">
                <a href="${rootPrefix}modules/communication/notice-board.html" class="font-size-12 fw-bold text-primary text-decoration-none">View All Notifications &rarr;</a>
              </div>
            </div>
          </div>

          <!-- User Menu -->
          <div class="dropdown">
            <button class="user-menu-btn" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="user-menu-avatar current-user-avatar">SA</div>
              <div class="user-menu-info">
                <span class="user-menu-name current-user-name">Super Admin</span>
                <span class="user-menu-role current-user-role">Administrator</span>
              </div>
              <i class="bi bi-chevron-down font-size-12 text-muted ms-1"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm border font-size-14">
              <li><h6 class="dropdown-header text-uppercase font-size-11">Active Account</h6></li>
              <li><a class="dropdown-item d-flex align-items-center gap-2" href="${rootPrefix}dashboards/admin.html"><i class="bi bi-speedometer2 text-primary"></i> Admin Dashboard</a></li>
              <li><a class="dropdown-item d-flex align-items-center gap-2" href="${rootPrefix}modules/system-settings/user-preferences.html"><i class="bi bi-sliders text-secondary"></i> Preferences</a></li>
              <li><a class="dropdown-item d-flex align-items-center gap-2" href="${rootPrefix}modules/system-settings/general-settings.html"><i class="bi bi-gear text-secondary"></i> Settings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item d-flex align-items-center gap-2 text-danger" href="javascript:void(0)" onclick="EduApp.logout('${rootPrefix}')"><i class="bi bi-box-arrow-right"></i> Sign Out</a></li>
            </ul>
          </div>
        </div>
      </header>

      <!-- Content Body -->
      <main class="erp-content">
        <!-- Breadcrumb Bar -->
        <div class="breadcrumb-wrapper">
          <ul class="page-breadcrumb">
            <li class="breadcrumb-item"><a href="${rootPrefix}index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="${rootPrefix}dashboards/admin.html">${moduleName}</a></li>
            <li class="breadcrumb-item active" aria-current="page">${pageTitle}</li>
          </ul>

          <div class="d-flex align-items-center gap-2 font-size-13 text-muted">
            <span class="badge bg-light text-muted border"><i class="bi bi-building me-1"></i> Delhi Public Global Academy</span>
          </div>
        </div>

        <!-- Page Header -->
        <div class="page-header-box">
          <div class="page-title-group">
            <h1><i class="bi bi-check2-circle text-primary"></i> ${pageTitle}</h1>
            <p>${pageDesc}</p>
          </div>
          <div class="page-actions-group">
            <button class="btn btn-light border" onclick="EduTables.print()" title="Print Screen">
              <i class="bi bi-printer me-1"></i> Print
            </button>
            <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', '${submoduleFile.replace('.html', '')}_export.csv')" title="Export Table as CSV">
              <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
            </button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
              <i class="bi bi-plus-lg me-1"></i> Add New Record
            </button>
          </div>
        </div>

        ${contentHtml}

      </main>
    </div>
  </div>

  ${modalHtml}

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="${rootPrefix}assets/js/mock-data.js"></script>
  <script src="${rootPrefix}assets/js/tables.js"></script>
  <script src="${rootPrefix}assets/js/forms.js"></script>
  <script src="${rootPrefix}assets/js/charts.js"></script>
  <script src="${rootPrefix}assets/js/app.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      EduTables.initSearch('tableSearchInput', '#mainDataTable');
    });
  </script>
</body>
</html>`;
}

// Generates rich sample table & KPI content tailored to module category
function generateModuleContent(modKey, subFile, title, desc) {
  // Common KPI bar
  const kpiBar = `
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
  `;

  // Search & Filter Bar
  const filterBar = `
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
  `;

  // Specific rows based on category
  let tableHeaderHtml = '';
  let tableRowsHtml = '';

  if (modKey.includes('fee') || title.includes('Fee') || title.includes('Receipt') || title.includes('Payment') || title.includes('Outstanding')) {
    tableHeaderHtml = `
      <tr>
        <th class="sortable">Receipt / Inv #</th>
        <th class="sortable">Student & Class</th>
        <th>Parent / Guardian</th>
        <th class="sortable">Fee Category</th>
        <th class="sortable text-end">Amount (₹)</th>
        <th>Payment Mode</th>
        <th>Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    `;
    const feeRecords = [
      { id: "REC-2024-9182", name: "Aarav Sharma", class: "Class 10-A", parent: "Rajesh Sharma (+91 98112 34567)", cat: "Term 2 Tuition + Transport", amt: "28,500", mode: "Razorpay (Online)", date: "27 Oct 2024", badge: "badge-paid", status: "Paid" },
      { id: "REC-2024-9181", name: "Diya Patel", class: "Class 10-A", parent: "Bhavin Patel (+91 98223 45678)", cat: "Term 2 Tuition Fee", amt: "22,500", mode: "Net Banking", date: "27 Oct 2024", badge: "badge-paid", status: "Paid" },
      { id: "REC-2024-9180", name: "Meera Reddy", class: "Class 8-A", parent: "K. S. Reddy (+91 98778 90123)", cat: "Quarter 3 Fee + Lab", amt: "24,200", mode: "UPI (Google Pay)", date: "26 Oct 2024", badge: "badge-paid", status: "Paid" },
      { id: "REC-2024-9179", name: "Vihaan Singh", class: "Class 10-B", parent: "Manpreet Singh (+91 98334 56789)", cat: "Annual Installment 2", amt: "15,000", mode: "HDFC Cheque #491201", date: "25 Oct 2024", badge: "badge-partial", status: "Partial" },
      { id: "REC-2024-9178", name: "Kabir Sengupta", class: "Class 9-C", parent: "Debashis Sengupta (+91 98889 01234)", cat: "Tuition + Computer Fee", amt: "26,000", mode: "Cash Counter", date: "25 Oct 2024", badge: "badge-paid", status: "Paid" },
      { id: "REC-2024-9177", name: "Rohan Gupta", class: "Class 12-A", parent: "Sanjay Gupta (+91 98556 78901)", cat: "CBSE Board Exam Dues", amt: "4,500", mode: "Counter UPI", date: "24 Oct 2024", badge: "badge-unpaid", status: "Due" },
      { id: "REC-2024-9176", name: "Ananya Iyer", class: "Class 10-B", parent: "R. Venkatesh Iyer (+91 98445 67890)", cat: "Quarter 3 Tuition", amt: "22,500", mode: "PayTM Gateway", date: "24 Oct 2024", badge: "badge-paid", status: "Paid" },
      { id: "REC-2024-9175", name: "Ishaan Verma", class: "Class 12-B", parent: "Dr. Alok Verma (+91 98667 89012)", cat: "Hostel & Mess Quarter 3", amt: "38,000", mode: "NEFT Bank Transfer", date: "23 Oct 2024", badge: "badge-paid", status: "Paid" }
    ];
    tableRowsHtml = feeRecords.map(r => `
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">${r.id}</td>
        <td>
          <div class="table-user-cell">
            <div class="table-avatar">${r.name.split(' ').map(n=>n[0]).join('')}</div>
            <div>
              <div class="table-user-name">${r.name}</div>
              <div class="table-user-sub">${r.class}</div>
            </div>
          </div>
        </td>
        <td><small class="text-muted">${r.parent}</small></td>
        <td><span class="font-size-13">${r.cat}</span></td>
        <td class="text-end fw-bold font-size-14 text-dark dark-text-white">₹${r.amt}</td>
        <td><span class="badge bg-light text-muted border font-size-12">${r.mode}</span></td>
        <td><small class="text-muted">${r.date}</small></td>
        <td><span class="badge-status ${r.badge}">${r.status}</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, '${title}')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    `).join('');
  } else if (modKey.includes('exam') || title.includes('Exam') || title.includes('Marks') || title.includes('Report Card') || title.includes('Admit')) {
    tableHeaderHtml = `
      <tr>
        <th class="sortable">Exam / Test Code</th>
        <th class="sortable">Subject & Title</th>
        <th>Class / Stream</th>
        <th>Date & Time</th>
        <th>Total Marks</th>
        <th>Average Score</th>
        <th>Evaluator</th>
        <th>Result Status</th>
        <th class="text-center">Actions</th>
      </tr>
    `;
    const examRecords = [
      { code: "EX-10-MAT-T2", title: "Mathematics (Standard - 041)", class: "Class 10 (A, B, C)", date: "24 Nov 2024 • 09:30 AM", max: "80 Marks", avg: "64.2 / 80 (80.2%)", eval: "Rajesh Kulkarni", badge: "badge-approved", status: "Verified" },
      { code: "EX-10-SCI-T2", title: "Science (Theory - 086)", class: "Class 10 (A, B, C)", date: "26 Nov 2024 • 09:30 AM", max: "80 Marks", avg: "61.8 / 80 (77.2%)", eval: "Vikram Rathore", badge: "badge-approved", status: "Verified" },
      { code: "EX-10-ENG-T2", title: "English Language & Literature", class: "Class 10 (A, B, C)", date: "28 Nov 2024 • 09:30 AM", max: "80 Marks", avg: "68.5 / 80 (85.6%)", eval: "Priya Nambiar", badge: "badge-approved", status: "Verified" },
      { code: "EX-12-PHY-T2", title: "Physics (Theory - 042)", class: "Class 12 (Science)", date: "29 Nov 2024 • 09:30 AM", max: "70 Marks", avg: "52.4 / 70 (74.8%)", eval: "Vikram Rathore", badge: "badge-review", status: "In Evaluation" },
      { code: "EX-12-CHE-T2", title: "Chemistry (Theory - 043)", class: "Class 12 (Science)", date: "02 Dec 2024 • 09:30 AM", max: "70 Marks", avg: "54.1 / 70 (77.2%)", eval: "Dr. Shalini Kapoor", badge: "badge-review", status: "In Evaluation" },
      { code: "EX-12-ACC-T2", title: "Accountancy (055)", class: "Class 12 (Commerce)", date: "02 Dec 2024 • 09:30 AM", max: "80 Marks", avg: "62.0 / 80 (77.5%)", eval: "Anjali Saxena", badge: "badge-approved", status: "Published" },
      { code: "EX-10-SST-T2", title: "Social Science (087)", class: "Class 10 (A, B, C)", date: "04 Dec 2024 • 09:30 AM", max: "80 Marks", avg: "63.5 / 80 (79.3%)", eval: "K. L. Sharma", badge: "badge-waiting", status: "Scheduled" },
      { code: "EX-12-CSC-T2", title: "Computer Science (083)", class: "Class 12 (Science)", date: "06 Dec 2024 • 09:30 AM", max: "70 Marks", avg: "59.2 / 70 (84.5%)", eval: "Amitabh Banerjee", badge: "badge-waiting", status: "Scheduled" }
    ];
    tableRowsHtml = examRecords.map(r => `
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">${r.code}</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">${r.title}</div>
          <small class="text-muted">CBSE Board Code Matrix</small>
        </td>
        <td><span class="badge bg-light text-muted border">${r.class}</span></td>
        <td><small class="text-muted">${r.date}</small></td>
        <td class="fw-semibold">${r.max}</td>
        <td class="fw-bold text-success font-size-13">${r.avg}</td>
        <td><small class="text-muted">${r.eval}</small></td>
        <td><span class="badge-status ${r.badge}">${r.status}</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Marks"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, '${title}')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    `).join('');
  } else if (modKey.includes('transport') || title.includes('Vehicle') || title.includes('Driver') || title.includes('Route') || title.includes('Stop')) {
    tableHeaderHtml = `
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
    `;
    const transportRows = [
      { plate: "DL-1V-8901", name: "Yellow Bus 01 (Tata Starbus)", route: "Route 1 (Dwarka Sec 6-22)", driver: "Gurpreet Singh (+91 97110 44551)", cap: "42 / 45 Seats", gps: "badge-active", gpsText: "Online (Moving)", fuel: "78%", fit: "14 May 2025" },
      { plate: "DL-1V-8902", name: "Yellow Bus 02 (Eicher Skyline)", route: "Route 2 (Vasant Kunj & Mehrauli)", driver: "Mohan Lal (+91 97110 44552)", cap: "44 / 45 Seats", gps: "badge-active", gpsText: "Online (Moving)", fuel: "65%", fit: "28 Jul 2025" },
      { plate: "DL-1V-8903", name: "Yellow Bus 03 (Ashok Leyland)", route: "Route 3 (Rohini & Pitampura)", driver: "Ramesh Chand (+91 97110 44553)", cap: "39 / 45 Seats", gps: "badge-active", gpsText: "Online (Idle)", fuel: "82%", fit: "10 Oct 2025" },
      { plate: "DL-1V-8904", name: "Yellow Bus 04 (Tata Starbus Ultra)", route: "Route 4 (South Ext & Lajpat Nagar)", driver: "Satnam Singh (+91 97110 44554)", cap: "45 / 45 Seats", gps: "badge-active", gpsText: "Online (Moving)", fuel: "90%", fit: "22 Nov 2025" },
      { plate: "DL-1V-8905", name: "Yellow Bus 05 (Force Traveller)", route: "Route 5 (Janakpuri & Vikaspuri)", driver: "Dharamvir (+91 97110 44555)", cap: "28 / 32 Seats", gps: "badge-active", gpsText: "Online (Moving)", fuel: "54%", fit: "15 Jan 2025" },
      { plate: "DL-1V-8906", name: "Yellow Bus 06 (Tata Winger)", route: "Route 6 (Noida Link Road)", driver: "Balwant Singh (+91 97110 44556)", cap: "20 / 22 Seats", gps: "badge-pending", gpsText: "In Depot", fuel: "88%", fit: "04 Mar 2025" }
    ];
    tableRowsHtml = transportRows.map(r => `
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">${r.plate}</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">${r.name}</div>
          <small class="text-muted">Speed Governor Equipped</small>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">${r.route}</span></td>
        <td><small class="text-muted">${r.driver}</small></td>
        <td class="fw-semibold font-size-13">${r.cap}</td>
        <td><span class="badge-status ${r.gps}">${r.gpsText}</span></td>
        <td>
          <div class="d-flex align-items-center gap-2">
            <div class="progress flex-grow-1" style="height: 6px; width: 60px;">
              <div class="progress-bar bg-success" style="width: ${r.fuel}"></div>
            </div>
            <small class="text-muted">${r.fuel}</small>
          </div>
        </td>
        <td><small class="text-muted">${r.fit}</small></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, '${title}')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    `).join('');
  } else if (modKey.includes('library') || title.includes('Book') || title.includes('Author') || title.includes('ISBN')) {
    tableHeaderHtml = `
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
    `;
    const bookRows = [
      { acc: "ACC-10821", title: "NCERT Exemplar Problems - Mathematics X", auth: "NCERT Editorial Group", cat: "Mathematics (510)", shelf: "Rack S-14 / Shelf 2", copies: 25, issued: 18, avail: 7 },
      { acc: "ACC-10822", title: "Concepts of Physics (Vol 1 & 2)", auth: "Dr. H. C. Verma", cat: "Physics (530)", shelf: "Rack P-02 / Shelf 1", copies: 30, issued: 26, avail: 4 },
      { acc: "ACC-10823", title: "Wings of Fire - An Autobiography", auth: "Dr. A. P. J. Abdul Kalam", cat: "Biography (920)", shelf: "Rack B-05 / Shelf 3", copies: 15, issued: 12, avail: 3 },
      { acc: "ACC-10824", title: "Comprehensive Chemistry for Class XII", auth: "Dr. O. P. Tandon", cat: "Chemistry (540)", shelf: "Rack C-08 / Shelf 2", copies: 20, issued: 15, avail: 5 },
      { acc: "ACC-10825", title: "Together with Science Class 10", auth: "Rachna Sagar Editorial", cat: "General Science (500)", shelf: "Rack G-01 / Shelf 4", copies: 40, issued: 35, avail: 5 },
      { acc: "ACC-10826", title: "Oxford Advanced Learner's Dictionary", auth: "A. S. Hornby", cat: "Reference (420)", shelf: "Rack R-01 / Shelf 1", copies: 10, issued: 3, avail: 7 },
      { acc: "ACC-10827", title: "Discovery of India", auth: "Jawaharlal Nehru", cat: "Indian History (954)", shelf: "Rack H-04 / Shelf 3", copies: 12, issued: 8, avail: 4 },
      { acc: "ACC-10828", title: "Computer Science with Python XII", auth: "Sumita Arora", cat: "Computer Science (004)", shelf: "Rack CS-03 / Shelf 2", copies: 35, issued: 31, avail: 4 }
    ];
    tableRowsHtml = bookRows.map(r => `
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">${r.acc}</td>
        <td>
          <div class="fw-semibold text-dark dark-text-white">${r.title}</div>
          <small class="text-muted">ISBN Barcode Enabled</small>
        </td>
        <td><small class="text-muted">${r.auth}</small></td>
        <td><span class="badge bg-light text-muted border font-size-12">${r.cat}</span></td>
        <td><span class="font-mono font-size-12 text-primary">${r.shelf}</span></td>
        <td class="fw-semibold">${r.copies}</td>
        <td class="text-warning fw-semibold">${r.issued}</td>
        <td class="text-success fw-bold">${r.avail}</td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, '${title}')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    `).join('');
  } else {
    // Default high-fidelity student/staff/operational table
    tableHeaderHtml = `
      <tr>
        <th class="sortable">Identifier / Code</th>
        <th class="sortable">Name / Title</th>
        <th>Category / Class</th>
        <th>Responsible / Parent</th>
        <th>Contact / Department</th>
        <th>Academic Session</th>
        <th>Updated Date</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    `;
    const defaultRows = [
      { code: "ED-8491", name: "Aarav Sharma", cat: "Class 10 - Section A", parent: "Rajesh Sharma", dept: "+91 98112 34567", session: "2024-2025", date: "27 Oct 2024", badge: "badge-active", status: "Active" },
      { code: "ED-8492", name: "Diya Patel", cat: "Class 10 - Section A", parent: "Bhavin Patel", dept: "+91 98223 45678", session: "2024-2025", date: "27 Oct 2024", badge: "badge-active", status: "Active" },
      { code: "ED-8493", name: "Vihaan Singh", cat: "Class 10 - Section B", parent: "Manpreet Singh", dept: "+91 98334 56789", session: "2024-2025", date: "26 Oct 2024", badge: "badge-pending", status: "Pending" },
      { code: "ED-8494", name: "Ananya Iyer", cat: "Class 10 - Section B", parent: "R. Venkatesh Iyer", dept: "+91 98445 67890", session: "2024-2025", date: "25 Oct 2024", badge: "badge-active", status: "Active" },
      { code: "ED-8495", name: "Rohan Gupta", cat: "Class 12 - Science (PCM)", parent: "Sanjay Gupta", dept: "+91 98556 78901", session: "2024-2025", date: "25 Oct 2024", badge: "badge-inactive", status: "Under Review" },
      { code: "ED-8496", name: "Ishaan Verma", cat: "Class 12 - Science (PCB)", parent: "Dr. Alok Verma", dept: "+91 98667 89012", session: "2024-2025", date: "24 Oct 2024", badge: "badge-active", status: "Active" },
      { code: "ED-8497", name: "Meera Reddy", cat: "Class 8 - Section A", parent: "K. S. Reddy", dept: "+91 98778 90123", session: "2024-2025", date: "23 Oct 2024", badge: "badge-active", status: "Active" },
      { code: "ED-8498", name: "Kabir Sengupta", cat: "Class 9 - Section C", parent: "Debashis Sengupta", dept: "+91 98889 01234", session: "2024-2025", date: "22 Oct 2024", badge: "badge-active", status: "Active" }
    ];
    tableRowsHtml = defaultRows.map(r => `
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">${r.code}</td>
        <td>
          <div class="table-user-cell">
            <div class="table-avatar">${r.name.split(' ').map(n=>n[0]).join('')}</div>
            <div>
              <div class="table-user-name">${r.name}</div>
              <div class="table-user-sub">${r.cat}</div>
            </div>
          </div>
        </td>
        <td><span class="badge bg-light text-muted border font-size-12">${r.cat}</span></td>
        <td><small class="text-muted">${r.parent}</small></td>
        <td><small class="text-muted">${r.dept}</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">${r.session}</span></td>
        <td><small class="text-muted">${r.date}</small></td>
        <td><span class="badge-status ${r.badge}">${r.status}</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, '${title}')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    `).join('');
  }

  // Special Document Preview Card (if applicable for certificates, report cards, ID cards, receipts)
  let specialPreviewHtml = '';

  if (title.includes('Report Card') || subFile === 'report-cards.html') {
    specialPreviewHtml = `
      <div class="card border mb-4 p-4 bg-white shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="fw-bold mb-0 text-primary"><i class="bi bi-file-earmark-bar-graph me-2"></i> Official CBSE Holistic Progress Card (Print Preview)</h5>
          <button class="btn btn-sm btn-primary" onclick="window.print()"><i class="bi bi-printer me-1"></i> Print Official Report Card</button>
        </div>
        <div class="printable-document">
          <div class="printable-header">
            <h2>Delhi Public Global Academy</h2>
            <p>Affiliated to CBSE, New Delhi (Affiliation No: 2130892, School Code: 70142)</p>
            <p>Sector 14, Knowledge City, New Delhi - 110075 | info@dpglobalacademy.edu.in</p>
            <div class="printable-title-pill">HOLISTIC PROGRESS CARD • ACADEMIC SESSION 2024-2025</div>
          </div>
          <div class="row g-2 mb-3 font-size-13">
            <div class="col-6"><strong>Student Name:</strong> Aarav Sharma</div>
            <div class="col-6"><strong>Admission No:</strong> ADM-8491</div>
            <div class="col-6"><strong>Class & Section:</strong> Class 10 - Section A</div>
            <div class="col-6"><strong>Roll Number:</strong> 01</div>
            <div class="col-6"><strong>Father's Name:</strong> Rajesh Sharma</div>
            <div class="col-6"><strong>APAAR ID:</strong> APAAR-8941-0294-1182</div>
          </div>
          <table class="table table-bordered font-size-13 mb-3">
            <thead class="table-light">
              <tr>
                <th>Scholastic Subject</th>
                <th>Periodic Test (10)</th>
                <th>Notebook (5)</th>
                <th>Enrichment (5)</th>
                <th>Term Exam (80)</th>
                <th>Total (100)</th>
                <th>Grade</th>
              </tr>
            </thead>
            <tbody>
              <tr><td>English Language & Literature</td><td>9.5</td><td>4.8</td><td>4.8</td><td>72.0</td><td><strong>91.1</strong></td><td><span class="badge bg-success">A1</span></td></tr>
              <tr><td>Mathematics (Standard)</td><td>9.0</td><td>4.5</td><td>4.7</td><td>68.5</td><td><strong>86.7</strong></td><td><span class="badge bg-success">A2</span></td></tr>
              <tr><td>Science (Theory & Practical)</td><td>9.2</td><td>4.8</td><td>4.6</td><td>71.0</td><td><strong>89.6</strong></td><td><span class="badge bg-success">A2</span></td></tr>
              <tr><td>Social Science</td><td>9.4</td><td>4.7</td><td>4.8</td><td>74.0</td><td><strong>92.9</strong></td><td><span class="badge bg-success">A1</span></td></tr>
              <tr><td>Computer Applications / AI</td><td>10.0</td><td>5.0</td><td>5.0</td><td>78.0</td><td><strong>98.0</strong></td><td><span class="badge bg-success">A1</span></td></tr>
            </tbody>
          </table>
          <div class="d-flex justify-content-between pt-4 mt-4 border-top font-size-13 text-center">
            <div><br><strong>Class Teacher Signature</strong></div>
            <div><br><strong>Examination Incharge</strong></div>
            <div><br><strong>Principal Signature & Seal</strong></div>
          </div>
        </div>
      </div>
    `;
  } else if (title.includes('ID Card') || subFile === 'id-cards.html') {
    specialPreviewHtml = `
      <div class="card border mb-4 p-4 bg-white shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="fw-bold mb-0 text-primary"><i class="bi bi-card-heading me-2"></i> Student Barcode ID Card (Live Preview)</h5>
          <button class="btn btn-sm btn-primary" onclick="window.print()"><i class="bi bi-printer me-1"></i> Print Student ID Cards (Batch)</button>
        </div>
        <div class="d-flex justify-content-center gap-4 flex-wrap">
          <div class="id-card-preview">
            <div class="id-card-header">
              <h5>DELHI PUBLIC GLOBAL ACADEMY</h5>
              <small>CBSE Affiliated • Session 2024-2025</small>
            </div>
            <div class="id-card-photo">
              <i class="bi bi-person-fill"></i>
            </div>
            <div class="id-card-body">
              <div class="id-card-name">Aarav Sharma</div>
              <div class="id-card-role">Student • Class 10-A</div>
              <div class="id-card-row"><span>Adm No:</span><span>ADM-8491</span></div>
              <div class="id-card-row"><span>Roll No:</span><span>01</span></div>
              <div class="id-card-row"><span>Bus Route:</span><span>Route 4 (South Ext)</span></div>
              <div class="id-card-row"><span>Blood Group:</span><span>B+ Positive</span></div>
              <div class="id-card-row"><span>Emergency:</span><span>+91 98112 34567</span></div>
              <div class="text-center mt-3 pt-2 border-top">
                <i class="bi bi-upc-scan fs-3 text-dark"></i>
                <div class="font-mono font-size-11 text-muted">ADM8491202410A</div>
              </div>
            </div>
          </div>

          <div class="id-card-preview">
            <div class="id-card-header" style="background: linear-gradient(180deg, #0f172a 0%, #1e293b 120px, #ffffff 120px, #ffffff 100%);">
              <h5>DELHI PUBLIC GLOBAL ACADEMY</h5>
              <small>Faculty Identity Card • 2024-2025</small>
            </div>
            <div class="id-card-photo" style="border-color: #f1f5f9;">
              <i class="bi bi-person-badge-fill text-primary"></i>
            </div>
            <div class="id-card-body">
              <div class="id-card-name">Vikram Rathore</div>
              <div class="id-card-role text-success">PGT Physics & HOD Science</div>
              <div class="id-card-row"><span>Staff ID:</span><span>EMP-102</span></div>
              <div class="id-card-row"><span>Department:</span><span>Science Wing</span></div>
              <div class="id-card-row"><span>Qualification:</span><span>M.Sc., B.Ed.</span></div>
              <div class="id-card-row"><span>Blood Group:</span><span>O+ Positive</span></div>
              <div class="id-card-row"><span>Mobile:</span><span>+91 98100 22334</span></div>
              <div class="text-center mt-3 pt-2 border-top">
                <i class="bi bi-qr-code fs-3 text-dark"></i>
                <div class="font-mono font-size-11 text-muted">EMP102SCIENCE</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    `;
  } else if (title.includes('Transfer Certificate') || subFile === 'transfer-certificates.html') {
    specialPreviewHtml = `
      <div class="card border mb-4 p-4 bg-white shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="fw-bold mb-0 text-primary"><i class="bi bi-award me-2"></i> Official School Transfer Certificate (TC) Preview</h5>
          <button class="btn btn-sm btn-primary" onclick="window.print()"><i class="bi bi-printer me-1"></i> Print Formal TC</button>
        </div>
        <div class="printable-document">
          <div class="printable-header">
            <h2>Delhi Public Global Academy</h2>
            <p>Sector 14, Knowledge City, New Delhi - 110075 | Phone: +91 11 2893 4000</p>
            <p>Affiliated to CBSE, New Delhi (Affiliation No: 2130892, School Code: 70142)</p>
            <div class="printable-title-pill">TRANSFER / SCHOOL LEAVING CERTIFICATE</div>
          </div>
          <div class="d-flex justify-content-between font-size-13 mb-3">
            <span><strong>TC Serial No:</strong> DPGA/TC/2024/084</span>
            <span><strong>Admission No:</strong> ADM-8495</span>
          </div>
          <table class="table table-bordered font-size-13">
            <tbody>
              <tr><td style="width: 40%;">1. Name of Pupil</td><td class="fw-bold">Rohan Gupta</td></tr>
              <tr><td>2. Mother's Name</td><td>Mrs. Sunita Gupta</td></tr>
              <tr><td>3. Father's / Guardian's Name</td><td>Mr. Sanjay Gupta</td></tr>
              <tr><td>4. Nationality</td><td>Indian</td></tr>
              <tr><td>5. Date of first admission in the school with class</td><td>04-Apr-2016 in Class 4</td></tr>
              <tr><td>6. Date of Birth according to Admission Register</td><td>14-Jun-2007 (Fourteenth June Two Thousand Seven)</td></tr>
              <tr><td>7. Class in which the pupil last studied</td><td>Class 12 - Senior Secondary</td></tr>
              <tr><td>8. School / Board Annual Examination last taken</td><td>Passed CBSE All India Senior School Certificate Exam</td></tr>
              <tr><td>9. Whether failed, if so once/twice in the same class</td><td>No</td></tr>
              <tr><td>10. Subjects Studied</td><td>English Core, Physics, Chemistry, Mathematics, Physical Education</td></tr>
              <tr><td>11. Month up to which school dues have been paid</td><td>March 2024 (Full Clearance Obtained)</td></tr>
              <tr><td>12. Total No. of working days in the academic session</td><td>218 Days (Student Attended: 204 Days)</td></tr>
              <tr><td>13. General Conduct</td><td>Good and Exemplary</td></tr>
              <tr><td>14. Date of application for certificate</td><td>18-May-2024</td></tr>
              <tr><td>15. Date of issue of certificate</td><td>22-May-2024</td></tr>
              <tr><td>16. Reason for leaving the school</td><td>Passed Class XII Board & Higher Studies</td></tr>
            </tbody>
          </table>
          <div class="d-flex justify-content-between pt-4 mt-4 border-top font-size-13 text-center">
            <div><br><strong>Prepared By</strong></div>
            <div><br><strong>Checked By (Office Supdt)</strong></div>
            <div><br><strong>Principal Signature with School Seal</strong></div>
          </div>
        </div>
      </div>
    `;
  } else if (title.includes('Fee Receipt') || subFile === 'receipt-generation.html') {
    specialPreviewHtml = `
      <div class="card border mb-4 p-4 bg-white shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="fw-bold mb-0 text-primary"><i class="bi bi-receipt me-2"></i> Multi-Copy Official Fee Receipt (Counter Preview)</h5>
          <button class="btn btn-sm btn-primary" onclick="window.print()"><i class="bi bi-printer me-1"></i> Print Fee Receipt</button>
        </div>
        <div class="printable-document">
          <div class="printable-header">
            <h2>Delhi Public Global Academy</h2>
            <p>Affiliated to CBSE (Affiliation No: 2130892) | Sector 14, Knowledge City, New Delhi</p>
            <div class="printable-title-pill">OFFICIAL FEE RECEIPT • STUDENT COPY</div>
          </div>
          <div class="d-flex justify-content-between font-size-13 mb-3">
            <div>
              <strong>Receipt No:</strong> REC-2024-9182<br>
              <strong>Date & Time:</strong> 27-Oct-2024 • 11:42 AM
            </div>
            <div class="text-end">
              <strong>Student Name:</strong> Aarav Sharma (Class 10-A)<br>
              <strong>Admission No:</strong> ADM-8491 | <strong>Roll No:</strong> 01
            </div>
          </div>
          <table class="table table-bordered font-size-13">
            <thead class="table-light">
              <tr>
                <th>S.No.</th>
                <th>Fee Head Description</th>
                <th>Quarter / Period</th>
                <th class="text-end">Amount (₹)</th>
              </tr>
            </thead>
            <tbody>
              <tr><td>1</td><td>Tuition Fee (Class 10)</td><td>Quarter 2 (Jul - Sep 2024)</td><td class="text-end">18,500.00</td></tr>
              <tr><td>2</td><td>Smart Classroom & Computer Lab Fee</td><td>Quarter 2 (Jul - Sep 2024)</td><td class="text-end">3,500.00</td></tr>
              <tr><td>3</td><td>School Transport Fee (Route 4)</td><td>Quarter 2 (Jul - Sep 2024)</td><td class="text-end">6,500.00</td></tr>
              <tr class="table-light"><td colspan="3" class="text-end fw-bold">Total Amount Received:</td><td class="text-end fw-bold">₹28,500.00</td></tr>
            </tbody>
          </table>
          <p class="font-size-12 text-muted mb-2"><strong>Amount in Words:</strong> Indian Rupees Twenty-Eight Thousand Five Hundred Only.</p>
          <p class="font-size-12 text-muted mb-4"><strong>Payment Mode:</strong> Razorpay Online Payment (Txn ID: pay_Oxk891240182)</p>
          <div class="d-flex justify-content-between pt-3 border-top font-size-13">
            <small class="text-muted">* Computer generated official receipt. No physical signature required.</small>
            <div class="text-center"><strong>Authorized Accounts Cashier</strong></div>
          </div>
        </div>
      </div>
    `;
  }

  // Final Table Component
  const tableComponent = `
    <div class="erp-table-responsive mb-0">
      <table class="erp-table" id="mainDataTable">
        <thead>
          ${tableHeaderHtml}
        </thead>
        <tbody>
          ${tableRowsHtml}
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
  `;

  return `
    ${kpiBar}
    ${specialPreviewHtml}
    ${filterBar}
    ${tableComponent}
  `;
}

// Generate shared Modals (Add, Edit, View)
function generateModals(title) {
  return `
    <!-- Add New Modal -->
    <div class="modal fade" id="addNewRecordModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><i class="bi bi-plus-circle-fill text-primary"></i> Add New ${title}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form onsubmit="EduForms.handleGenericSubmit(event, 'addNewRecordModal', '${title}', '#mainDataTable')">
            <div class="modal-body">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">Record Title / Name <span class="required">*</span></label>
                  <input type="text" class="form-control" required placeholder="Enter name or title">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Class / Category <span class="required">*</span></label>
                  <select class="form-select" required>
                    <option value="" selected disabled>Select class / category</option>
                    <option>Class 10 - Section A</option>
                    <option>Class 10 - Section B</option>
                    <option>Class 12 - Science (PCM)</option>
                    <option>Class 12 - Commerce</option>
                    <option>General Administration</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Reference Code / ID</label>
                  <input type="text" class="form-control" placeholder="Auto-generated if blank (e.g. REF-2024-091)">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Status</label>
                  <select class="form-select">
                    <option selected>Active / Approved</option>
                    <option>Pending Review</option>
                    <option>Draft</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label">Detailed Notes / Description</label>
                  <textarea class="form-control" rows="3" placeholder="Enter additional details or remarks..."></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-check-lg me-1"></i> Save ${title}</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editRecordModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><i class="bi bi-pencil-square text-primary"></i> Edit ${title}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form onsubmit="EduForms.handleGenericSubmit(event, 'editRecordModal', '${title}', '#mainDataTable')">
            <div class="modal-body">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">Record Title / Name <span class="required">*</span></label>
                  <input type="text" class="form-control" required value="Sample Record Entry">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Class / Category</label>
                  <select class="form-select">
                    <option selected>Class 10 - Section A</option>
                    <option>Class 12 - Science</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label">Remarks</label>
                  <textarea class="form-control" rows="2">Record updated during active session audit.</textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary fw-bold">Update Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- View Details Modal -->
    <div class="modal fade" id="viewRecordModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><i class="bi bi-info-circle text-primary"></i> ${title} Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body font-size-14">
            <div class="list-group list-group-flush">
              <div class="list-group-item d-flex justify-content-between px-0">
                <span class="text-muted">Entity Title:</span>
                <strong class="text-dark dark-text-white">Aarav Sharma</strong>
              </div>
              <div class="list-group-item d-flex justify-content-between px-0">
                <span class="text-muted">Enrollment / Ref ID:</span>
                <span class="font-mono text-primary fw-bold">ADM-8491</span>
              </div>
              <div class="list-group-item d-flex justify-content-between px-0">
                <span class="text-muted">Class & Section:</span>
                <span>Class 10 - Section A</span>
              </div>
              <div class="list-group-item d-flex justify-content-between px-0">
                <span class="text-muted">Academic Board:</span>
                <span>CBSE Integrated</span>
              </div>
              <div class="list-group-item d-flex justify-content-between px-0">
                <span class="text-muted">Last Updated:</span>
                <span>27 Oct 2024 (by Super Admin)</span>
              </div>
              <div class="list-group-item d-flex justify-content-between px-0">
                <span class="text-muted">Audit Verification:</span>
                <span class="badge bg-success-subtle text-success">Verified & Signed</span>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  `;
}

// 2. Generate all Module and Submodule Pages
let totalModulePages = 0;

moduleDefinitions.forEach(mod => {
  const modDir = path.join(modulesDir, mod.key);
  if (!fs.existsSync(modDir)) fs.mkdirSync(modDir, { recursive: true });

  mod.submodules.forEach(sub => {
    const filePath = path.join(modDir, sub.file);
    const contentHtml = generateModuleContent(mod.key, sub.file, sub.title, sub.desc);
    const modalsHtml = generateModals(sub.title);

    const fullHtml = generatePageShell({
      pageTitle: sub.title,
      pageDesc: sub.desc,
      moduleName: mod.name,
      moduleKey: mod.key,
      submoduleFile: sub.file,
      depth: 2,
      contentHtml: contentHtml,
      modalHtml: modalsHtml
    });

    fs.writeFileSync(filePath, fullHtml, 'utf8');
    totalModulePages++;
  });
});

console.log(`Generated ${totalModulePages} module pages across 28 modules.`);

// 3. Generate 10 Dedicated Role Dashboards
const dashboardRoles = [
  { file: "admin.html", title: "Super Admin Command Center", role: "Super Admin", roleKey: "super_admin", icon: "bi-speedometer2" },
  { file: "principal.html", title: "Principal Academic Dashboard", role: "Principal (Dr. Sunita Rao)", roleKey: "principal", icon: "bi-mortarboard" },
  { file: "teacher.html", title: "Teacher Workplace Dashboard", role: "PGT Teacher (Vikram Rathore)", roleKey: "teacher", icon: "bi-person-workspace" },
  { file: "accountant.html", title: "Accountant Fee & Financial Desk", role: "Chief Accountant (M. K. Sharma)", roleKey: "accountant", icon: "bi-cash-coin" },
  { file: "admission-officer.html", title: "Admission Officer Desk", role: "Admission Head (Rashmi Sen)", roleKey: "admission_officer", icon: "bi-person-plus" },
  { file: "librarian.html", title: "Library Resource Dashboard", role: "Chief Librarian (S. Nair)", roleKey: "librarian", icon: "bi-book" },
  { file: "transport-manager.html", title: "Transport Fleet Dashboard", role: "Transport Incharge (H. Singh)", roleKey: "transport_manager", icon: "bi-bus-front" },
  { file: "hr-manager.html", title: "HR & Staff Operations Dashboard", role: "HR Lead (Anjali Saxena)", roleKey: "hr_manager", icon: "bi-people" },
  { file: "student.html", title: "Student Personal Portal", role: "Student (Aarav Sharma - X-A)", roleKey: "student", icon: "bi-backpack" },
  { file: "parent.html", title: "Parent Guardian Portal", role: "Parent (Rajesh Sharma)", roleKey: "parent", icon: "bi-house-heart" }
];

function generateDashboardContent(role) {
  return `
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
            <a href="../modules/fees/fee-collection.html" class="fw-semibold font-size-13 text-primary text-decoration-none">Open Fee Counter &rarr;</a>
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
            <a href="../modules/communication/notice-board.html" class="fw-semibold font-size-13 text-primary text-decoration-none">View All &rarr;</a>
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
  `;
}

dashboardRoles.forEach(dash => {
  const filePath = path.join(dashboardsDir, dash.file);
  const contentHtml = generateDashboardContent(dash);

  const fullHtml = generatePageShell({
    pageTitle: dash.title,
    pageDesc: `Unified executive dashboard tailored for ${dash.role}.`,
    moduleName: "Role Dashboards",
    moduleKey: "dashboard",
    submoduleFile: dash.file,
    depth: 1,
    contentHtml: contentHtml,
    modalHtml: ''
  });

  // Inject chart initializers script
  const scriptInjectedHtml = fullHtml.replace('</body>', `
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
  </body>`);

  fs.writeFileSync(filePath, scriptInjectedHtml, 'utf8');
});

console.log(`Generated 10 dedicated role dashboards successfully.`);
