<?php
/**
 * EDUSYS PRO - CENTRAL CONFIGURATION & COMMON HELPERS
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Depth determination for relative paths
if (!isset($depth)) {
    $depth = 0;
}
$root_prefix = str_repeat('../', $depth);

// Dynamic web base URL detection for prototype
if (!empty($_SERVER['SCRIPT_NAME']) && preg_match('#^(.*?/prototype)(/|$)#i', $_SERVER['SCRIPT_NAME'], $matches)) {
    $app_base_url = rtrim($matches[1], '/') . '/';
} else {
    $app_base_url = '/gsgwebsoft/schoolerp/prototype/';
}

function base_url($path = '') {
    global $app_base_url, $root_prefix;
    $path = ltrim($path, '/');
    if ($path === '' || $path === 'index.php' || $path === 'index') {
        return $app_base_url;
    }
    // Remove .php extension from page routes (keep for assets like .css, .js, .png, etc.)
    if (substr($path, -4) === '.php') {
        $path = substr($path, 0, -4);
    }
    return $app_base_url . $path;
}

// School Information
$school_config = [
    'name' => 'Delhi Public Global Academy',
    'short_name' => 'DPGA',
    'tagline' => 'Excellence in Holistic Education & Innovation',
    'affiliation' => 'CBSE & State Board Integrated (Affiliation No: 2130892, School Code: 70142)',
    'address' => 'Sector 14, Knowledge City, New Delhi - 110075',
    'phone' => '+91 11 2893 4000',
    'email' => 'info@dpglobalacademy.edu.in',
    'current_session' => '2024-2025',
    'board' => 'CBSE'
];

// 15 Pre-Configured Demo Roles
$demo_roles = [
    ['id' => 'super_admin', 'name' => 'Super Admin', 'email' => 'admin@edusys.com', 'path' => 'dashboards/admin.php', 'avatar' => 'SA', 'role' => 'Administrator'],
    ['id' => 'school_admin', 'name' => 'School Administrator', 'email' => 'schooladmin@edusys.com', 'path' => 'dashboards/admin.php', 'avatar' => 'AD', 'role' => 'School Admin'],
    ['id' => 'principal', 'name' => 'Principal (Dr. Sunita Rao)', 'email' => 'principal@edusys.com', 'path' => 'dashboards/principal.php', 'avatar' => 'PR', 'role' => 'Principal'],
    ['id' => 'accountant', 'name' => 'Chief Accountant (M. K. Sharma)', 'email' => 'accounts@edusys.com', 'path' => 'dashboards/accountant.php', 'avatar' => 'AC', 'role' => 'Accountant'],
    ['id' => 'admission_officer', 'name' => 'Admission Head (Rashmi Sen)', 'email' => 'admissions@edusys.com', 'path' => 'dashboards/admission-officer.php', 'avatar' => 'AO', 'role' => 'Admission Officer'],
    ['id' => 'teacher', 'name' => 'PGT Teacher (Vikram Rathore)', 'email' => 'teacher@edusys.com', 'path' => 'dashboards/teacher.php', 'avatar' => 'TR', 'role' => 'PGT Physics'],
    ['id' => 'class_teacher', 'name' => 'Class Teacher - 10A (Priya N.)', 'email' => 'classteacher@edusys.com', 'path' => 'dashboards/teacher.php', 'avatar' => 'CT', 'role' => 'Class Teacher'],
    ['id' => 'librarian', 'name' => 'Chief Librarian (S. Nair)', 'email' => 'library@edusys.com', 'path' => 'dashboards/librarian.php', 'avatar' => 'LB', 'role' => 'Librarian'],
    ['id' => 'transport_manager', 'name' => 'Transport Incharge (H. Singh)', 'email' => 'transport@edusys.com', 'path' => 'dashboards/transport-manager.php', 'avatar' => 'TM', 'role' => 'Transport Manager'],
    ['id' => 'hr_manager', 'name' => 'HR Lead (Anjali Saxena)', 'email' => 'hr@edusys.com', 'path' => 'dashboards/hr-manager.php', 'avatar' => 'HR', 'role' => 'HR Manager'],
    ['id' => 'receptionist', 'name' => 'Front Desk (Kavita Joshi)', 'email' => 'frontdesk@edusys.com', 'path' => 'modules/front-office/dashboard.php', 'avatar' => 'FD', 'role' => 'Receptionist'],
    ['id' => 'storekeeper', 'name' => 'Store Manager (R. P. Verma)', 'email' => 'store@edusys.com', 'path' => 'modules/inventory/dashboard.php', 'avatar' => 'SK', 'role' => 'Storekeeper'],
    ['id' => 'security_guard', 'name' => 'Chief Warden / Security', 'email' => 'security@edusys.com', 'path' => 'modules/security/dashboard.php', 'avatar' => 'SG', 'role' => 'Security Incharge'],
    ['id' => 'student', 'name' => 'Student (Aarav Sharma - X-A)', 'email' => 'student@edusys.com', 'path' => 'dashboards/student.php', 'avatar' => 'AS', 'role' => 'Student'],
    ['id' => 'parent', 'name' => 'Parent (Rajesh Sharma)', 'email' => 'parent@edusys.com', 'path' => 'dashboards/parent.php', 'avatar' => 'RS', 'role' => 'Parent']
];

// Logout Handling
if (isset($_GET['logout'])) {
    unset($_SESSION['edusys_user']);
}

// User Switch Request (via ?switch_user=... or ?role=...)
$requested_role_id = $_GET['switch_user'] ?? $_GET['role'] ?? null;
if ($requested_role_id) {
    foreach ($demo_roles as $r_item) {
        if ($r_item['id'] === $requested_role_id || strtolower($r_item['email']) === strtolower($requested_role_id)) {
            $_SESSION['edusys_user'] = $r_item;
            break;
        }
    }
}

// Auto-sync active dashboard if directly accessed and no session is set or dashboard explicitly differs
$script_name = $_SERVER['SCRIPT_NAME'] ?? '';
$script_file = basename($script_name);

// Current User resolution
if (isset($_SESSION['edusys_user'])) {
    $current_user = $_SESSION['edusys_user'];
    // If the visitor explicitly navigated to a different role dashboard, align the session persona with that dashboard
    if (strpos($script_name, '/dashboards/') !== false) {
        foreach ($demo_roles as $r_item) {
            if (basename($r_item['path']) === $script_file && $current_user['path'] !== $r_item['path']) {
                $current_user = $r_item;
                $_SESSION['edusys_user'] = $r_item;
                break;
            }
        }
    }
} else {
    // Check if script corresponds to a known dashboard
    $matched = null;
    if (strpos($script_name, '/dashboards/') !== false) {
        foreach ($demo_roles as $r_item) {
            if (basename($r_item['path']) === $script_file) {
                $matched = $r_item;
                break;
            }
        }
    }
    $current_user = $matched ?? $demo_roles[0];
    $_SESSION['edusys_user'] = $current_user;
}

// All 28 Module Definitions
$modules_registry = [
    [
        'key' => 'administration',
        'name' => 'Administration & Master Setup',
        'icon' => 'bi-shield-shaded',
        'submodules' => [
            ['file' => 'school-profile.php', 'title' => 'School Profile'],
            ['file' => 'school-branding.php', 'title' => 'School Branding'],
            ['file' => 'academic-sessions.php', 'title' => 'Academic Sessions'],
            ['file' => 'session-calendar.php', 'title' => 'Session Calendar'],
            ['file' => 'classes.php', 'title' => 'Classes & Grades'],
            ['file' => 'sections.php', 'title' => 'Sections Allocation'],
            ['file' => 'streams.php', 'title' => 'Streams & Specializations'],
            ['file' => 'departments.php', 'title' => 'Departments'],
            ['file' => 'subjects.php', 'title' => 'Subjects Master'],
            ['file' => 'class-subject-mapping.php', 'title' => 'Class-Subject Mapping'],
            ['file' => 'subject-groups.php', 'title' => 'Subject Groups'],
            ['file' => 'houses-clubs.php', 'title' => 'Houses & Clubs'],
            ['file' => 'working-days.php', 'title' => 'Working Days & Hours'],
            ['file' => 'holidays.php', 'title' => 'Holidays & Vacations'],
            ['file' => 'events-calendar.php', 'title' => 'School Events Calendar'],
            ['file' => 'school-settings.php', 'title' => 'School Settings'],
            ['file' => 'custom-fields.php', 'title' => 'Custom Fields'],
            ['file' => 'form-builder.php', 'title' => 'Form Builder'],
            ['file' => 'user-management.php', 'title' => 'User Management'],
            ['file' => 'role-management.php', 'title' => 'Role Management'],
            ['file' => 'permission-management.php', 'title' => 'Permission Management'],
            ['file' => 'activity-logs.php', 'title' => 'Activity Logs'],
            ['file' => 'audit-trail.php', 'title' => 'Audit Trail'],
            ['file' => 'backup-restore.php', 'title' => 'Backup & Restore UI']
        ]
    ],
    [
        'key' => 'admissions',
        'name' => 'Admission Management',
        'icon' => 'bi-person-plus-fill',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Admission Dashboard'],
            ['file' => 'enquiries.php', 'title' => 'Admission Enquiries'],
            ['file' => 'follow-ups.php', 'title' => 'Enquiry Follow-ups'],
            ['file' => 'lead-sources.php', 'title' => 'Lead Sources'],
            ['file' => 'online-applications.php', 'title' => 'Online Applications'],
            ['file' => 'offline-applications.php', 'title' => 'Offline Applications'],
            ['file' => 'application-review.php', 'title' => 'Application Review'],
            ['file' => 'document-verification.php', 'title' => 'Document Verification'],
            ['file' => 'admission-approval.php', 'title' => 'Admission Approval'],
            ['file' => 'merit-lists.php', 'title' => 'Merit Lists'],
            ['file' => 'waiting-lists.php', 'title' => 'Waiting Lists'],
            ['file' => 'prospectus-distribution.php', 'title' => 'Prospectus Distribution'],
            ['file' => 'campus-visits.php', 'title' => 'Campus Visits'],
            ['file' => 'counselling.php', 'title' => 'Admission Counselling'],
            ['file' => 'admission-fees.php', 'title' => 'Admission Fees'],
            ['file' => 'admission-reports.php', 'title' => 'Admission Reports'],
            ['file' => 're-admissions.php', 'title' => 'Re-admissions'],
            ['file' => 'withdrawal-requests.php', 'title' => 'Withdrawal Requests']
        ]
    ],
    [
        'key' => 'students',
        'name' => 'Student Information System',
        'icon' => 'bi-backpack-fill',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Student Dashboard'],
            ['file' => 'student-directory.php', 'title' => 'Student Directory'],
            ['file' => 'add-student.php', 'title' => 'Add Student (Multi-Step)'],
            ['file' => 'student-profile.php', 'title' => 'Student Profile 360°'],
            ['file' => 'personal-info.php', 'title' => 'Personal Information'],
            ['file' => 'parent-records.php', 'title' => 'Parent & Guardian Records'],
            ['file' => 'emergency-contacts.php', 'title' => 'Emergency Contacts'],
            ['file' => 'previous-school.php', 'title' => 'Previous School Records'],
            ['file' => 'documents.php', 'title' => 'Student Documents Locker'],
            ['file' => 'id-cards.php', 'title' => 'Student ID Cards'],
            ['file' => 'class-allocation.php', 'title' => 'Class & Section Allocation'],
            ['file' => 'roll-numbers.php', 'title' => 'Roll Number Management'],
            ['file' => 'student-promotion.php', 'title' => 'Student Promotion'],
            ['file' => 'student-transfer.php', 'title' => 'Student Transfer Register'],
            ['file' => 'student-withdrawal.php', 'title' => 'Student Withdrawal Register'],
            ['file' => 'transfer-certificates.php', 'title' => 'Transfer Certificates (TC)'],
            ['file' => 'bonafide-certificates.php', 'title' => 'Bonafide Certificates'],
            ['file' => 'character-certificates.php', 'title' => 'Character Certificates'],
            ['file' => 'study-certificates.php', 'title' => 'Study Certificates'],
            ['file' => 'student-history.php', 'title' => 'Student History'],
            ['file' => 'alumni.php', 'title' => 'Alumni Management'],
            ['file' => 'student-status.php', 'title' => 'Student Status'],
            ['file' => 'import-export.php', 'title' => 'Student Import / Export']
        ]
    ],
    [
        'key' => 'academics',
        'name' => 'Academic Management',
        'icon' => 'bi-mortarboard-fill',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Academic Dashboard'],
            ['file' => 'curriculum.php', 'title' => 'Curriculum Management'],
            ['file' => 'cbse-curriculum.php', 'title' => 'CBSE Curriculum & NEP 2020'],
            ['file' => 'state-curriculum.php', 'title' => 'State Board Curriculum'],
            ['file' => 'board-mapping.php', 'title' => 'Board and Class Mapping'],
            ['file' => 'syllabus.php', 'title' => 'Syllabus Management'],
            ['file' => 'subject-allocation.php', 'title' => 'Subject Allocation'],
            ['file' => 'teacher-allocation.php', 'title' => 'Teacher Allocation'],
            ['file' => 'class-teacher-assignment.php', 'title' => 'Class Teacher Assignment'],
            ['file' => 'timetable-builder.php', 'title' => 'Timetable Builder'],
            ['file' => 'class-timetable.php', 'title' => 'Class Timetable'],
            ['file' => 'teacher-timetable.php', 'title' => 'Teacher Timetable'],
            ['file' => 'classroom-allocation.php', 'title' => 'Classroom Allocation'],
            ['file' => 'period-management.php', 'title' => 'Period Management'],
            ['file' => 'substitute-teachers.php', 'title' => 'Substitute Teachers'],
            ['file' => 'lesson-planning.php', 'title' => 'Lesson Planning'],
            ['file' => 'teaching-diary.php', 'title' => 'Teaching Diary'],
            ['file' => 'homework.php', 'title' => 'Homework Management'],
            ['file' => 'assignments.php', 'title' => 'Assignments'],
            ['file' => 'projects.php', 'title' => 'Projects & Lab Work'],
            ['file' => 'worksheets.php', 'title' => 'Worksheets & Practice Papers'],
            ['file' => 'study-materials.php', 'title' => 'Study Materials'],
            ['file' => 'learning-outcomes.php', 'title' => 'Learning Outcomes'],
            ['file' => 'syllabus-completion.php', 'title' => 'Syllabus Completion'],
            ['file' => 'lab-scheduling.php', 'title' => 'Practical & Lab Scheduling'],
            ['file' => 'remedial-classes.php', 'title' => 'Remedial Classes'],
            ['file' => 'extra-classes.php', 'title' => 'Extra Classes & Olympiads'],
            ['file' => 'academic-progress.php', 'title' => 'Academic Progress']
        ]
    ],
    [
        'key' => 'attendance',
        'name' => 'Attendance Management',
        'icon' => 'bi-calendar2-check-fill',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Attendance Dashboard'],
            ['file' => 'daily-attendance.php', 'title' => 'Student Daily Attendance'],
            ['file' => 'class-attendance.php', 'title' => 'Class-wise Attendance'],
            ['file' => 'period-attendance.php', 'title' => 'Period-wise Attendance'],
            ['file' => 'teacher-attendance.php', 'title' => 'Teacher Attendance'],
            ['file' => 'staff-attendance.php', 'title' => 'Staff Attendance'],
            ['file' => 'late-entry.php', 'title' => 'Late Entry Register'],
            ['file' => 'early-leave.php', 'title' => 'Early Leave Register'],
            ['file' => 'student-leaves.php', 'title' => 'Student Leave Applications'],
            ['file' => 'staff-leaves.php', 'title' => 'Staff Leave Applications'],
            ['file' => 'leave-approval.php', 'title' => 'Leave Approval Workflow'],
            ['file' => 'attendance-corrections.php', 'title' => 'Attendance Corrections'],
            ['file' => 'monthly-register.php', 'title' => 'Monthly Attendance Register'],
            ['file' => 'absentee-list.php', 'title' => 'Absentee List & SMS Alert'],
            ['file' => 'low-attendance-alerts.php', 'title' => 'Low Attendance Alerts (<75%)'],
            ['file' => 'attendance-percentage.php', 'title' => 'Attendance Percentage Calculator'],
            ['file' => 'biometric-integration.php', 'title' => 'Biometric Device Integration'],
            ['file' => 'rfid-integration.php', 'title' => 'RFID Smart Card Integration'],
            ['file' => 'qr-attendance.php', 'title' => 'QR Code Attendance'],
            ['file' => 'attendance-reports.php', 'title' => 'Attendance Reports']
        ]
    ],
    [
        'key' => 'examinations',
        'name' => 'Examination & Results',
        'icon' => 'bi-award-fill',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Examination Dashboard'],
            ['file' => 'exam-types.php', 'title' => 'Exam Types Master'],
            ['file' => 'exam-groups.php', 'title' => 'Exam Groups'],
            ['file' => 'exam-schedules.php', 'title' => 'Exam Schedules'],
            ['file' => 'exam-timetables.php', 'title' => 'Exam Timetables'],
            ['file' => 'exam-rooms.php', 'title' => 'Exam Rooms & Halls'],
            ['file' => 'seating-plans.php', 'title' => 'Seating Plans'],
            ['file' => 'admit-cards.php', 'title' => 'Admit Cards (Hall Tickets)'],
            ['file' => 'question-bank.php', 'title' => 'Question Bank'],
            ['file' => 'question-papers.php', 'title' => 'Question Papers'],
            ['file' => 'online-exams.php', 'title' => 'Online Examinations (CBT)'],
            ['file' => 'omr-evaluation.php', 'title' => 'OMR Evaluation Sheet Scanner'],
            ['file' => 'marks-entry.php', 'title' => 'Marks Entry Register'],
            ['file' => 'bulk-marks-import.php', 'title' => 'Bulk Marks Import (Excel)'],
            ['file' => 'theory-practical-marks.php', 'title' => 'Theory & Practical Marks'],
            ['file' => 'internal-assessment.php', 'title' => 'Internal Assessment (CCE 20%)'],
            ['file' => 'projects-viva-marks.php', 'title' => 'Projects & Viva Marks'],
            ['file' => 'grade-configuration.php', 'title' => 'Grade Configuration'],
            ['file' => 'cbse-assessment.php', 'title' => 'CBSE Assessment Structure'],
            ['file' => 'state-board-assessment.php', 'title' => 'State Board Assessment Structure'],
            ['file' => 'marks-verification.php', 'title' => 'Marks Verification Workflow'],
            ['file' => 'result-processing.php', 'title' => 'Result Processing Engine'],
            ['file' => 'percentage-grade-calc.php', 'title' => 'Percentage & Grade Calculation'],
            ['file' => 'class-rank.php', 'title' => 'Class Rank Analysis'],
            ['file' => 'merit-list.php', 'title' => 'Merit List & Toppers'],
            ['file' => 'report-cards.php', 'title' => 'CBSE Report Cards Generator'],
            ['file' => 'progress-reports.php', 'title' => 'Continuous Progress Reports'],
            ['file' => 'cumulative-results.php', 'title' => 'Cumulative Results'],
            ['file' => 'rechecking.php', 'title' => 'Marks Rechecking & Retotaling'],
            ['file' => 'supplementary-exams.php', 'title' => 'Supplementary & Compartment Exams'],
            ['file' => 'promotion-eligibility.php', 'title' => 'Promotion Eligibility Matrix'],
            ['file' => 'result-publication.php', 'title' => 'Result Publication'],
            ['file' => 'subject-analysis.php', 'title' => 'Subject Performance Analysis'],
            ['file' => 'exam-reports.php', 'title' => 'Examination MIS Reports']
        ]
    ],
    [
        'key' => 'fees',
        'name' => 'Fees Management',
        'icon' => 'bi-cash-coin',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Fees Dashboard'],
            ['file' => 'fee-categories.php', 'title' => 'Fee Categories'],
            ['file' => 'fee-heads.php', 'title' => 'Fee Heads Master'],
            ['file' => 'class-fee-structures.php', 'title' => 'Class-wise Fee Structures'],
            ['file' => 'session-fee-structures.php', 'title' => 'Session-wise Fee Structures'],
            ['file' => 'monthly-fees.php', 'title' => 'Monthly Fee Setup'],
            ['file' => 'quarterly-fees.php', 'title' => 'Quarterly Fee Setup'],
            ['file' => 'annual-fees.php', 'title' => 'Annual Fee Structure'],
            ['file' => 'admission-fees.php', 'title' => 'Admission Fees Setup'],
            ['file' => 'examination-fees.php', 'title' => 'Examination Fees'],
            ['file' => 'transport-fees.php', 'title' => 'Transport Fees Slab'],
            ['file' => 'hostel-fees.php', 'title' => 'Hostel Fee Structures'],
            ['file' => 'misc-fees.php', 'title' => 'Miscellaneous Fees & Fines'],
            ['file' => 'installment-setup.php', 'title' => 'Installment Setup'],
            ['file' => 'student-fee-assignment.php', 'title' => 'Student Fee Assignment'],
            ['file' => 'invoice-generation.php', 'title' => 'Fee Invoice Generation'],
            ['file' => 'fee-collection.php', 'title' => 'Fee Collection Counter'],
            ['file' => 'partial-payments.php', 'title' => 'Partial Payments'],
            ['file' => 'advance-payments.php', 'title' => 'Advance Payments'],
            ['file' => 'receipt-generation.php', 'title' => 'Fee Receipt Generation'],
            ['file' => 'receipt-reprint.php', 'title' => 'Receipt Reprinting'],
            ['file' => 'receipt-cancellation.php', 'title' => 'Receipt Cancellation'],
            ['file' => 'fee-refunds.php', 'title' => 'Fee Refund Management'],
            ['file' => 'concessions.php', 'title' => 'Fee Concessions & Waivers'],
            ['file' => 'scholarships.php', 'title' => 'Scholarships'],
            ['file' => 'sibling-discounts.php', 'title' => 'Sibling Discounts'],
            ['file' => 'staff-discounts.php', 'title' => 'Staff Ward Discounts'],
            ['file' => 'late-fees.php', 'title' => 'Late Fees & Fines'],
            ['file' => 'outstanding-balances.php', 'title' => 'Outstanding Balances'],
            ['file' => 'defaulter-lists.php', 'title' => 'Fee Defaulter Lists'],
            ['file' => 'due-reminders.php', 'title' => 'Fee Due Reminders & SMS'],
            ['file' => 'daily-collection.php', 'title' => 'Daily Collection Reports'],
            ['file' => 'monthly-collection.php', 'title' => 'Monthly Collection Reports'],
            ['file' => 'student-fee-ledgers.php', 'title' => 'Student Fee Ledgers'],
            ['file' => 'payment-gateway.php', 'title' => 'Payment Gateway Simulation'],
            ['file' => 'payment-reconciliation.php', 'title' => 'Payment Reconciliation'],
            ['file' => 'fee-carry-forward.php', 'title' => 'Fee Carry-forward'],
            ['file' => 'fee-reports.php', 'title' => 'Comprehensive Fee Reports']
        ]
    ],
    [
        'key' => 'accounts',
        'name' => 'Accounts & Finance',
        'icon' => 'bi-bank',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Finance Dashboard'],
            ['file' => 'chart-of-accounts.php', 'title' => 'Chart of Accounts'],
            ['file' => 'income-heads.php', 'title' => 'Income Heads'],
            ['file' => 'expense-heads.php', 'title' => 'Expense Heads'],
            ['file' => 'cash-accounts.php', 'title' => 'Cash Accounts'],
            ['file' => 'bank-accounts.php', 'title' => 'Bank Accounts'],
            ['file' => 'income-entries.php', 'title' => 'Income Entries'],
            ['file' => 'expense-entries.php', 'title' => 'Expense Entries'],
            ['file' => 'receipt-vouchers.php', 'title' => 'Receipt Vouchers'],
            ['file' => 'payment-vouchers.php', 'title' => 'Payment Vouchers'],
            ['file' => 'journal-vouchers.php', 'title' => 'Journal Vouchers'],
            ['file' => 'contra-vouchers.php', 'title' => 'Contra Vouchers'],
            ['file' => 'supplier-payments.php', 'title' => 'Supplier Payments'],
            ['file' => 'petty-cash.php', 'title' => 'Petty Cash'],
            ['file' => 'budgets.php', 'title' => 'Departmental Budgets'],
            ['file' => 'bank-reconciliation.php', 'title' => 'Bank Reconciliation'],
            ['file' => 'student-ledgers.php', 'title' => 'Student Ledgers'],
            ['file' => 'vendor-ledgers.php', 'title' => 'Vendor Ledgers'],
            ['file' => 'trial-balance.php', 'title' => 'Trial Balance'],
            ['file' => 'general-ledger.php', 'title' => 'General Ledger'],
            ['file' => 'income-expenditure.php', 'title' => 'Income & Expenditure Statement'],
            ['file' => 'balance-sheet.php', 'title' => 'Balance Sheet'],
            ['file' => 'cash-flow.php', 'title' => 'Cash Flow Statement'],
            ['file' => 'year-closing.php', 'title' => 'Financial Year Closing'],
            ['file' => 'tax-gst.php', 'title' => 'Tax and GST Configuration'],
            ['file' => 'financial-reports.php', 'title' => 'Financial MIS Reports']
        ]
    ],
    [
        'key' => 'hr-payroll',
        'name' => 'HR & Payroll',
        'icon' => 'bi-people-fill',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'HR Dashboard'],
            ['file' => 'employee-directory.php', 'title' => 'Employee Directory'],
            ['file' => 'add-employee.php', 'title' => 'Add Employee'],
            ['file' => 'employee-profiles.php', 'title' => 'Employee Profiles'],
            ['file' => 'employee-documents.php', 'title' => 'Employee Documents'],
            ['file' => 'departments.php', 'title' => 'Staff Departments'],
            ['file' => 'designations.php', 'title' => 'Designations'],
            ['file' => 'teacher-qualifications.php', 'title' => 'Teacher Qualifications'],
            ['file' => 'staff-joining.php', 'title' => 'Staff Joining'],
            ['file' => 'staff-exit.php', 'title' => 'Staff Exit'],
            ['file' => 'contracts.php', 'title' => 'Employment Contracts'],
            ['file' => 'staff-attendance.php', 'title' => 'Staff Attendance Register'],
            ['file' => 'leave-types.php', 'title' => 'Staff Leave Types'],
            ['file' => 'leave-applications.php', 'title' => 'Staff Leave Applications'],
            ['file' => 'leave-approval.php', 'title' => 'Staff Leave Approval'],
            ['file' => 'salary-structures.php', 'title' => 'Salary Structures'],
            ['file' => 'salary-components.php', 'title' => 'Salary Components'],
            ['file' => 'allowances.php', 'title' => 'Allowances Master'],
            ['file' => 'deductions.php', 'title' => 'Deductions Master'],
            ['file' => 'salary-advances.php', 'title' => 'Salary Advances'],
            ['file' => 'loan-management.php', 'title' => 'Loan Management'],
            ['file' => 'payroll-processing.php', 'title' => 'Payroll Processing'],
            ['file' => 'payslips.php', 'title' => 'Payslip Generator'],
            ['file' => 'salary-payments.php', 'title' => 'Salary Payments'],
            ['file' => 'pf-esi-tds.php', 'title' => 'PF / ESI / TDS Configuration'],
            ['file' => 'performance-appraisal.php', 'title' => 'Performance Appraisal'],
            ['file' => 'staff-training.php', 'title' => 'Staff Training & CPD'],
            ['file' => 'staff-notices.php', 'title' => 'Staff Circulars & Notices'],
            ['file' => 'experience-certificates.php', 'title' => 'Experience Certificates'],
            ['file' => 'fnf-settlement.php', 'title' => 'Full & Final Settlement'],
            ['file' => 'payroll-reports.php', 'title' => 'Payroll MIS Reports']
        ]
    ],
    [
        'key' => 'communication',
        'name' => 'Communication Hub',
        'icon' => 'bi-chat-dots-fill',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Communication Dashboard'],
            ['file' => 'notice-board.php', 'title' => 'Digital Notice Board'],
            ['file' => 'circulars.php', 'title' => 'Official Circulars'],
            ['file' => 'sms-campaigns.php', 'title' => 'SMS Campaigns'],
            ['file' => 'email-campaigns.php', 'title' => 'Email Campaigns'],
            ['file' => 'whatsapp-messages.php', 'title' => 'WhatsApp Messages'],
            ['file' => 'push-notifications.php', 'title' => 'Push Notifications'],
            ['file' => 'message-templates.php', 'title' => 'Message Templates'],
            ['file' => 'class-messages.php', 'title' => 'Class-wise Messages'],
            ['file' => 'parent-announcements.php', 'title' => 'Parent Announcements'],
            ['file' => 'teacher-announcements.php', 'title' => 'Teacher Announcements'],
            ['file' => 'fee-reminders.php', 'title' => 'Fee Reminders'],
            ['file' => 'absence-notifications.php', 'title' => 'Absence Notifications'],
            ['file' => 'exam-notifications.php', 'title' => 'Examination Notifications'],
            ['file' => 'result-notifications.php', 'title' => 'Result Notifications'],
            ['file' => 'holiday-notifications.php', 'title' => 'Holiday Notifications'],
            ['file' => 'birthday-notifications.php', 'title' => 'Birthday Notifications'],
            ['file' => 'notification-logs.php', 'title' => 'Notification Logs'],
            ['file' => 'delivery-reports.php', 'title' => 'Delivery Reports']
        ]
    ],
    [
        'key' => 'transport',
        'name' => 'Transport Management',
        'icon' => 'bi-bus-front-fill',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Transport Dashboard'],
            ['file' => 'vehicle-directory.php', 'title' => 'Vehicle Directory'],
            ['file' => 'vehicle-details.php', 'title' => 'Vehicle Details'],
            ['file' => 'drivers.php', 'title' => 'Drivers Master'],
            ['file' => 'conductors.php', 'title' => 'Conductors & Attendants'],
            ['file' => 'routes.php', 'title' => 'Route Management'],
            ['file' => 'stops.php', 'title' => 'Stop Management'],
            ['file' => 'student-route-allocation.php', 'title' => 'Student Route Allocation'],
            ['file' => 'pickup-drop-points.php', 'title' => 'Pickup & Drop Points'],
            ['file' => 'transport-fee-mapping.php', 'title' => 'Transport Fee Mapping'],
            ['file' => 'vehicle-capacity.php', 'title' => 'Vehicle Capacity Monitoring'],
            ['file' => 'transport-attendance.php', 'title' => 'Transport Attendance'],
            ['file' => 'gps-tracking.php', 'title' => 'GPS Tracking Map'],
            ['file' => 'pickup-drop-alerts.php', 'title' => 'Pickup & Drop Alerts'],
            ['file' => 'fuel-logs.php', 'title' => 'Fuel Logs'],
            ['file' => 'vehicle-maintenance.php', 'title' => 'Vehicle Maintenance'],
            ['file' => 'insurance-records.php', 'title' => 'Insurance Records'],
            ['file' => 'fitness-certificates.php', 'title' => 'Fitness Certificates'],
            ['file' => 'license-expiry-alerts.php', 'title' => 'License Expiry Alerts'],
            ['file' => 'service-records.php', 'title' => 'Vehicle Service Records'],
            ['file' => 'transport-expenses.php', 'title' => 'Transport Expenses'],
            ['file' => 'transport-reports.php', 'title' => 'Transport MIS Reports']
        ]
    ],
    [
        'key' => 'library',
        'name' => 'Library Management',
        'icon' => 'bi-book-half',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Library Dashboard'],
            ['file' => 'book-catalogue.php', 'title' => 'Book Catalogue'],
            ['file' => 'book-categories.php', 'title' => 'Book Categories'],
            ['file' => 'authors.php', 'title' => 'Authors Master'],
            ['file' => 'publishers.php', 'title' => 'Publishers Master'],
            ['file' => 'isbn-barcode.php', 'title' => 'ISBN & Barcode Generator'],
            ['file' => 'book-purchases.php', 'title' => 'Book Purchases'],
            ['file' => 'book-stock.php', 'title' => 'Book Stock Inventory'],
            ['file' => 'book-issue.php', 'title' => 'Book Issue Counter'],
            ['file' => 'book-return.php', 'title' => 'Book Return Counter'],
            ['file' => 'book-renewal.php', 'title' => 'Book Renewal'],
            ['file' => 'book-reservations.php', 'title' => 'Book Reservations'],
            ['file' => 'overdue-books.php', 'title' => 'Overdue Books'],
            ['file' => 'fine-collection.php', 'title' => 'Fine Collection Register'],
            ['file' => 'lost-damaged.php', 'title' => 'Lost / Damaged Books'],
            ['file' => 'student-cards.php', 'title' => 'Student Library Cards'],
            ['file' => 'staff-accounts.php', 'title' => 'Staff Library Accounts'],
            ['file' => 'book-search.php', 'title' => 'OPAC Book Search'],
            ['file' => 'stock-verification.php', 'title' => 'Stock Verification'],
            ['file' => 'library-reports.php', 'title' => 'Library MIS Reports']
        ]
    ],
    [
        'key' => 'inventory',
        'name' => 'Inventory & Assets',
        'icon' => 'bi-box-seam-fill',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Inventory Dashboard'],
            ['file' => 'item-categories.php', 'title' => 'Item Categories'],
            ['file' => 'item-master.php', 'title' => 'Item Master'],
            ['file' => 'units.php', 'title' => 'Units of Measurement'],
            ['file' => 'suppliers.php', 'title' => 'Suppliers & Vendors'],
            ['file' => 'purchase-requisitions.php', 'title' => 'Purchase Requisitions'],
            ['file' => 'purchase-orders.php', 'title' => 'Purchase Orders (PO)'],
            ['file' => 'grn.php', 'title' => 'Goods Receipt Notes (GRN)'],
            ['file' => 'stock-inward.php', 'title' => 'Stock Inward Register'],
            ['file' => 'stock-issue.php', 'title' => 'Stock Issue Register'],
            ['file' => 'stock-transfers.php', 'title' => 'Stock Transfers'],
            ['file' => 'stock-returns.php', 'title' => 'Stock Returns'],
            ['file' => 'min-stock-alerts.php', 'title' => 'Minimum Stock Alerts'],
            ['file' => 'stationery.php', 'title' => 'Stationery Register'],
            ['file' => 'uniforms-books.php', 'title' => 'Uniforms and Books Counter'],
            ['file' => 'lab-equipment.php', 'title' => 'Laboratory Equipment'],
            ['file' => 'furniture-register.php', 'title' => 'Furniture Register'],
            ['file' => 'asset-allocation.php', 'title' => 'Fixed Asset Allocation'],
            ['file' => 'asset-maintenance.php', 'title' => 'Asset Maintenance'],
            ['file' => 'asset-disposal.php', 'title' => 'Asset Disposal & Scraps'],
            ['file' => 'stock-audit.php', 'title' => 'Stock Audit'],
            ['file' => 'purchase-reports.php', 'title' => 'Purchase Reports'],
            ['file' => 'inventory-reports.php', 'title' => 'Inventory MIS Reports']
        ]
    ],
    [
        'key' => 'hostel',
        'name' => 'Hostel Management',
        'icon' => 'bi-building-fill',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Hostel Dashboard'],
            ['file' => 'buildings.php', 'title' => 'Hostel Buildings'],
            ['file' => 'floors.php', 'title' => 'Floors Master'],
            ['file' => 'rooms.php', 'title' => 'Hostel Rooms'],
            ['file' => 'bed-allocation.php', 'title' => 'Bed Allocation'],
            ['file' => 'hostel-admissions.php', 'title' => 'Hostel Admissions'],
            ['file' => 'hostel-fees.php', 'title' => 'Hostel Fee Structures'],
            ['file' => 'room-changes.php', 'title' => 'Room Changes'],
            ['file' => 'hostel-attendance.php', 'title' => 'Hostel Night Attendance'],
            ['file' => 'wardens.php', 'title' => 'Warden Management'],
            ['file' => 'visitor-register.php', 'title' => 'Visitor Register'],
            ['file' => 'in-out-register.php', 'title' => 'In / Out Gate Register'],
            ['file' => 'outing-permissions.php', 'title' => 'Outing Permissions'],
            ['file' => 'mess-management.php', 'title' => 'Mess & Menu Management'],
            ['file' => 'complaints.php', 'title' => 'Hostel Complaints'],
            ['file' => 'maintenance-requests.php', 'title' => 'Maintenance Requests'],
            ['file' => 'hostel-inventory.php', 'title' => 'Hostel Inventory'],
            ['file' => 'hostel-reports.php', 'title' => 'Hostel MIS Reports']
        ]
    ],
    [
        'key' => 'health-welfare',
        'name' => 'Health & Student Welfare',
        'icon' => 'bi-heart-pulse-fill',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Health Dashboard'],
            ['file' => 'medical-profiles.php', 'title' => 'Student Medical Profiles'],
            ['file' => 'medical-records.php', 'title' => 'Medical Records'],
            ['file' => 'emergency-contacts.php', 'title' => 'Emergency Medical Contacts'],
            ['file' => 'medical-room-register.php', 'title' => 'Infirmary Room Register'],
            ['file' => 'health-checkups.php', 'title' => 'Health Check-up Camps'],
            ['file' => 'vaccination-records.php', 'title' => 'Vaccination Records'],
            ['file' => 'height-weight.php', 'title' => 'Height & Weight Records'],
            ['file' => 'allergy-alerts.php', 'title' => 'Allergy Alerts'],
            ['file' => 'first-aid-register.php', 'title' => 'First Aid Register'],
            ['file' => 'accident-reports.php', 'title' => 'Accident Reports'],
            ['file' => 'counselling.php', 'title' => 'Counselling Appointments'],
            ['file' => 'welfare-cases.php', 'title' => 'Welfare Case Management'],
            ['file' => 'emergency-notifications.php', 'title' => 'Emergency Notifications']
        ]
    ],
    [
        'key' => 'security',
        'name' => 'Security & Visitor Management',
        'icon' => 'bi-shield-lock-fill',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Security Dashboard'],
            ['file' => 'visitor-registration.php', 'title' => 'Visitor Registration'],
            ['file' => 'visitor-passes.php', 'title' => 'Visitor Passes'],
            ['file' => 'check-in-out.php', 'title' => 'Check-in / Check-out'],
            ['file' => 'parent-meetings.php', 'title' => 'Parent Meeting Appointments'],
            ['file' => 'gate-passes.php', 'title' => 'Student Gate Passes'],
            ['file' => 'early-departures.php', 'title' => 'Early Departure Approvals'],
            ['file' => 'authorized-pickups.php', 'title' => 'Authorized Pickup Persons'],
            ['file' => 'security-staff.php', 'title' => 'Security Staff & Guards'],
            ['file' => 'incident-reporting.php', 'title' => 'Incident Reporting'],
            ['file' => 'cctv-incidents.php', 'title' => 'CCTV Incident References'],
            ['file' => 'visitor-reports.php', 'title' => 'Visitor MIS Reports']
        ]
    ],
    [
        'key' => 'front-office',
        'name' => 'Front Office',
        'icon' => 'bi-telephone-inbound-fill',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Front Office Dashboard'],
            ['file' => 'enquiry-register.php', 'title' => 'General Enquiry Register'],
            ['file' => 'walk-in-enquiries.php', 'title' => 'Walk-in Enquiries'],
            ['file' => 'call-register.php', 'title' => 'Call Register'],
            ['file' => 'email-enquiries.php', 'title' => 'Email Enquiries'],
            ['file' => 'lead-sources.php', 'title' => 'Lead Sources'],
            ['file' => 'follow-up-calendar.php', 'title' => 'Follow-up Calendar'],
            ['file' => 'admission-counselling.php', 'title' => 'Admission Counselling Queue'],
            ['file' => 'prospectus-distribution.php', 'title' => 'Prospectus Sales Counter'],
            ['file' => 'campus-visits.php', 'title' => 'Campus Visits Log'],
            ['file' => 'appointments.php', 'title' => 'Appointments Management'],
            ['file' => 'complaints.php', 'title' => 'Grievances & Complaints'],
            ['file' => 'inward-dispatch.php', 'title' => 'Inward Postal Dispatch'],
            ['file' => 'outward-dispatch.php', 'title' => 'Outward Postal Dispatch'],
            ['file' => 'front-office-reports.php', 'title' => 'Front Office Reports']
        ]
    ],
    [
        'key' => 'website-cms',
        'name' => 'Website CMS & Online Admissions',
        'icon' => 'bi-globe',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'CMS Dashboard'],
            ['file' => 'pages.php', 'title' => 'Website Pages'],
            ['file' => 'home-builder.php', 'title' => 'Home Page Builder'],
            ['file' => 'about-us.php', 'title' => 'About Us & Vision'],
            ['file' => 'facilities.php', 'title' => 'Facilities Showcase'],
            ['file' => 'faculty-directory.php', 'title' => 'Faculty Directory'],
            ['file' => 'news.php', 'title' => 'News & Announcements'],
            ['file' => 'events.php', 'title' => 'Events & Calendar'],
            ['file' => 'photo-gallery.php', 'title' => 'Photo Gallery'],
            ['file' => 'video-gallery.php', 'title' => 'Video Gallery'],
            ['file' => 'notice-downloads.php', 'title' => 'Notice Downloads'],
            ['file' => 'online-admission-form.php', 'title' => 'Online Admission Form'],
            ['file' => 'application-fee.php', 'title' => 'Application Fee UI'],
            ['file' => 'application-status.php', 'title' => 'Application Status Tracking'],
            ['file' => 'document-upload.php', 'title' => 'Document Upload Portal'],
            ['file' => 'merit-list-publishing.php', 'title' => 'Merit List Publishing'],
            ['file' => 'contact-enquiries.php', 'title' => 'Contact Enquiries'],
            ['file' => 'seo-metadata.php', 'title' => 'SEO Metadata'],
            ['file' => 'website-settings.php', 'title' => 'Website Settings']
        ]
    ],
    [
        'key' => 'reports',
        'name' => 'Reports & MIS',
        'icon' => 'bi-bar-chart-line-fill',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'MIS Dashboard'],
            ['file' => 'student-strength.php', 'title' => 'Student Strength Report'],
            ['file' => 'class-wise-students.php', 'title' => 'Class-wise Students Report'],
            ['file' => 'gender-category-reports.php', 'title' => 'Gender & Category Reports'],
            ['file' => 'admission-reports.php', 'title' => 'Admission Analytics Report'],
            ['file' => 'withdrawal-reports.php', 'title' => 'Withdrawal Reports'],
            ['file' => 'attendance-reports.php', 'title' => 'Attendance Analysis Report'],
            ['file' => 'low-attendance-reports.php', 'title' => 'Low Attendance Report'],
            ['file' => 'exam-results.php', 'title' => 'Examination Results Summary'],
            ['file' => 'class-rank-reports.php', 'title' => 'Class Rank Reports'],
            ['file' => 'subject-performance.php', 'title' => 'Subject Performance Report'],
            ['file' => 'fee-collection.php', 'title' => 'Fee Collection Report'],
            ['file' => 'outstanding-fees.php', 'title' => 'Outstanding Fees Report'],
            ['file' => 'fee-defaulters.php', 'title' => 'Fee Defaulters Report'],
            ['file' => 'concession-reports.php', 'title' => 'Fee Concession Report'],
            ['file' => 'scholarship-reports.php', 'title' => 'Scholarship Disbursal Report'],
            ['file' => 'income-reports.php', 'title' => 'Income Analysis Report'],
            ['file' => 'expense-reports.php', 'title' => 'Expense Analysis Report'],
            ['file' => 'payroll-reports.php', 'title' => 'Payroll Summary Report'],
            ['file' => 'staff-attendance-reports.php', 'title' => 'Staff Attendance Report'],
            ['file' => 'transport-reports.php', 'title' => 'Transport Fleet Report'],
            ['file' => 'library-reports.php', 'title' => 'Library Circulation Report'],
            ['file' => 'inventory-reports.php', 'title' => 'Inventory Stock Report'],
            ['file' => 'hostel-reports.php', 'title' => 'Hostel Occupancy Report'],
            ['file' => 'admission-funnel.php', 'title' => 'Admission Funnel Report'],
            ['file' => 'academic-progress-reports.php', 'title' => 'Academic Progress Report'],
            ['file' => 'financial-summary.php', 'title' => 'Financial Summary Report'],
            ['file' => 'export-center.php', 'title' => 'Universal Export Center']
        ]
    ],
    [
        'key' => 'online-learning',
        'name' => 'Online Learning & LMS',
        'icon' => 'bi-laptop-fill',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'LMS Dashboard'],
            ['file' => 'courses.php', 'title' => 'Courses & Subjects'],
            ['file' => 'learning-modules.php', 'title' => 'Learning Modules'],
            ['file' => 'online-classes.php', 'title' => 'Online Classes'],
            ['file' => 'video-lessons.php', 'title' => 'Video Lessons'],
            ['file' => 'digital-materials.php', 'title' => 'Digital Study Materials'],
            ['file' => 'online-assignments.php', 'title' => 'Online Assignments'],
            ['file' => 'assignment-submissions.php', 'title' => 'Assignment Submissions'],
            ['file' => 'online-quizzes.php', 'title' => 'Online Quizzes'],
            ['file' => 'course-progress.php', 'title' => 'Course Progress Tracker'],
            ['file' => 'learning-history.php', 'title' => 'Student Learning History'],
            ['file' => 'teacher-courses.php', 'title' => 'Teacher Course Management']
        ]
    ],
    [
        'key' => 'sports-activities',
        'name' => 'Sports & Co-Curricular',
        'icon' => 'bi-trophy-fill',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Sports Dashboard'],
            ['file' => 'categories.php', 'title' => 'Sports Categories'],
            ['file' => 'teams.php', 'title' => 'Sports Teams'],
            ['file' => 'participation.php', 'title' => 'Student Participation'],
            ['file' => 'coaches.php', 'title' => 'Coaches & Physical Instructors'],
            ['file' => 'timetable.php', 'title' => 'Sports Timetable'],
            ['file' => 'competitions.php', 'title' => 'Tournaments & Competitions'],
            ['file' => 'events.php', 'title' => 'Sports Events'],
            ['file' => 'achievements.php', 'title' => 'Achievements & Medals'],
            ['file' => 'awards.php', 'title' => 'Awards & Recognitions'],
            ['file' => 'certificates.php', 'title' => 'Sports Certificates'],
            ['file' => 'discipline.php', 'title' => 'Student Discipline & Merits'],
            ['file' => 'co-curricular.php', 'title' => 'Co-curricular Activities'],
            ['file' => 'activity-reports.php', 'title' => 'Activity Reports']
        ]
    ],
    [
        'key' => 'events-ptm',
        'name' => 'Events & PTM',
        'icon' => 'bi-calendar-event-fill',
        'submodules' => [
            ['file' => 'calendar.php', 'title' => 'Event Calendar'],
            ['file' => 'events.php', 'title' => 'Event Management'],
            ['file' => 'annual-functions.php', 'title' => 'Annual Functions'],
            ['file' => 'trips.php', 'title' => 'School Trips & Excursions'],
            ['file' => 'sports-day.php', 'title' => 'Annual Sports Day'],
            ['file' => 'cultural-programs.php', 'title' => 'Cultural Programs'],
            ['file' => 'ptm-meetings.php', 'title' => 'Parent-Teacher Meetings (PTM)'],
            ['file' => 'ptm-scheduling.php', 'title' => 'PTM Scheduling'],
            ['file' => 'meeting-slots.php', 'title' => 'Teacher Meeting Slots'],
            ['file' => 'parent-booking.php', 'title' => 'Parent Booking Portal'],
            ['file' => 'meeting-feedback.php', 'title' => 'Meeting Feedback'],
            ['file' => 'event-registrations.php', 'title' => 'Event Registrations'],
            ['file' => 'event-reports.php', 'title' => 'Event MIS Reports']
        ]
    ],
    [
        'key' => 'parent-portal',
        'name' => 'Parent Portal',
        'icon' => 'bi-house-heart-fill',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Parent Dashboard'],
            ['file' => 'multiple-children.php', 'title' => 'Multiple Children Switcher'],
            ['file' => 'student-profiles.php', 'title' => 'Child Profile'],
            ['file' => 'attendance.php', 'title' => 'Attendance Calendar'],
            ['file' => 'timetable.php', 'title' => 'Class Timetable'],
            ['file' => 'homework.php', 'title' => 'Homework & Diaries'],
            ['file' => 'assignments.php', 'title' => 'Assignments & Projects'],
            ['file' => 'exam-schedule.php', 'title' => 'Examination Schedule'],
            ['file' => 'marks-results.php', 'title' => 'Marks & Results'],
            ['file' => 'report-cards.php', 'title' => 'Report Cards'],
            ['file' => 'fee-balances.php', 'title' => 'Fee Balances'],
            ['file' => 'online-payment.php', 'title' => 'Online Fee Payment Simulation'],
            ['file' => 'payment-history.php', 'title' => 'Payment History'],
            ['file' => 'fee-receipts.php', 'title' => 'Fee Receipts'],
            ['file' => 'leave-applications.php', 'title' => 'Leave Applications'],
            ['file' => 'notices.php', 'title' => 'School Circulars & Notices'],
            ['file' => 'calendar.php', 'title' => 'School Calendar'],
            ['file' => 'teacher-communication.php', 'title' => 'Teacher Communication'],
            ['file' => 'complaints.php', 'title' => 'Grievances & Suggestions'],
            ['file' => 'certificates.php', 'title' => 'Certificate Requests'],
            ['file' => 'transport-info.php', 'title' => 'Transport & Bus Tracking'],
            ['file' => 'library-status.php', 'title' => 'Library Status'],
            ['file' => 'student-progress.php', 'title' => 'Learning Progress']
        ]
    ],
    [
        'key' => 'student-portal',
        'name' => 'Student Portal',
        'icon' => 'bi-backpack2-fill',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Student Dashboard'],
            ['file' => 'profile.php', 'title' => 'My Profile'],
            ['file' => 'timetable.php', 'title' => 'My Timetable'],
            ['file' => 'attendance.php', 'title' => 'My Attendance'],
            ['file' => 'homework.php', 'title' => 'My Homework'],
            ['file' => 'assignments.php', 'title' => 'My Assignments'],
            ['file' => 'study-materials.php', 'title' => 'Study Materials'],
            ['file' => 'syllabus.php', 'title' => 'Syllabus Tracker'],
            ['file' => 'exam-schedule.php', 'title' => 'Exam Date Sheet'],
            ['file' => 'admit-cards.php', 'title' => 'My Admit Card'],
            ['file' => 'marks.php', 'title' => 'My Marks & Grades'],
            ['file' => 'report-cards.php', 'title' => 'My Report Cards'],
            ['file' => 'fee-status.php', 'title' => 'My Fee Status'],
            ['file' => 'payment-receipts.php', 'title' => 'Payment Receipts'],
            ['file' => 'leave-applications.php', 'title' => 'Leave Application'],
            ['file' => 'notices.php', 'title' => 'School Notices'],
            ['file' => 'certificates.php', 'title' => 'My Certificates'],
            ['file' => 'library-books.php', 'title' => 'Issued Library Books'],
            ['file' => 'transport-details.php', 'title' => 'My Bus Route'],
            ['file' => 'sports-activities.php', 'title' => 'Sports & Club Roster'],
            ['file' => 'learning-progress.php', 'title' => 'Academic Growth']
        ]
    ],
    [
        'key' => 'teacher-portal',
        'name' => 'Teacher Portal',
        'icon' => 'bi-person-workspace',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Teacher Dashboard'],
            ['file' => 'my-classes.php', 'title' => 'My Classes'],
            ['file' => 'my-subjects.php', 'title' => 'My Subjects'],
            ['file' => 'timetable.php', 'title' => 'My Timetable'],
            ['file' => 'student-directory.php', 'title' => 'Class Students Roster'],
            ['file' => 'attendance-entry.php', 'title' => 'Mark Attendance'],
            ['file' => 'homework-creation.php', 'title' => 'Assign Homework'],
            ['file' => 'assignments.php', 'title' => 'Assignment Manager'],
            ['file' => 'study-materials.php', 'title' => 'Upload Study Materials'],
            ['file' => 'lesson-planning.php', 'title' => 'My Lesson Plans'],
            ['file' => 'teaching-diary.php', 'title' => 'Daily Teaching Diary'],
            ['file' => 'marks-entry.php', 'title' => 'Enter Exam Marks'],
            ['file' => 'student-performance.php', 'title' => 'Student Performance'],
            ['file' => 'parent-communication.php', 'title' => 'Parent Communication'],
            ['file' => 'leave-applications.php', 'title' => 'My Leave Requests'],
            ['file' => 'substitute-details.php', 'title' => 'Proxy & Substitute Duties'],
            ['file' => 'class-reports.php', 'title' => 'Class Academic Reports']
        ]
    ],
    [
        'key' => 'integrations',
        'name' => 'Integrations & API',
        'icon' => 'bi-plugin',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Integration Dashboard'],
            ['file' => 'sms-settings.php', 'title' => 'SMS Gateway Settings'],
            ['file' => 'email-settings.php', 'title' => 'Email SMTP Settings'],
            ['file' => 'whatsapp-settings.php', 'title' => 'WhatsApp Business API'],
            ['file' => 'payment-settings.php', 'title' => 'Payment Gateway Settings'],
            ['file' => 'biometric-settings.php', 'title' => 'Biometric Device Integration'],
            ['file' => 'rfid-settings.php', 'title' => 'RFID Device Integration'],
            ['file' => 'gps-settings.php', 'title' => 'GPS Provider Integration'],
            ['file' => 'cloud-storage-settings.php', 'title' => 'Cloud Storage Settings'],
            ['file' => 'video-meeting-settings.php', 'title' => 'Video Meeting Integration'],
            ['file' => 'webhooks.php', 'title' => 'Webhook Management'],
            ['file' => 'api-keys.php', 'title' => 'API Keys Management'],
            ['file' => 'api-logs.php', 'title' => 'API Request Logs'],
            ['file' => 'integration-logs.php', 'title' => 'Integration Error Logs'],
            ['file' => 'failed-jobs.php', 'title' => 'Failed Jobs Monitor'],
            ['file' => 'sync-status.php', 'title' => 'Data Sync Status'],
            ['file' => 'retry-queue.php', 'title' => 'Retry Queue'],
            ['file' => 'import-export-jobs.php', 'title' => 'Import / Export Jobs']
        ]
    ],
    [
        'key' => 'compliance',
        'name' => 'Compliance & Govt Reporting',
        'icon' => 'bi-file-earmark-check-fill',
        'submodules' => [
            ['file' => 'dashboard.php', 'title' => 'Compliance Dashboard'],
            ['file' => 'cbse-reporting.php', 'title' => 'CBSE OASIS & LOC Reporting'],
            ['file' => 'state-board-reporting.php', 'title' => 'State Board Reporting'],
            ['file' => 'udise-data.php', 'title' => 'UDISE+ Data Preparation'],
            ['file' => 'apaar-id.php', 'title' => 'APAAR / Academic ID Registry'],
            ['file' => 'student-validation.php', 'title' => 'Student Data Validation'],
            ['file' => 'staff-validation.php', 'title' => 'Staff Data Validation'],
            ['file' => 'affiliation-docs.php', 'title' => 'Affiliation Documents'],
            ['file' => 'recognition-docs.php', 'title' => 'Recognition Documents'],
            ['file' => 'compliance-checklist.php', 'title' => 'Annual Compliance Checklist'],
            ['file' => 'certificate-expiry.php', 'title' => 'Certificate Expiry Alerts'],
            ['file' => 'compliance-reports.php', 'title' => 'Compliance MIS Reports']
        ]
    ],
    [
        'key' => 'system-settings',
        'name' => 'System Settings',
        'icon' => 'bi-gear-wide-connected',
        'submodules' => [
            ['file' => 'general-settings.php', 'title' => 'General Settings'],
            ['file' => 'school-info.php', 'title' => 'School Information'],
            ['file' => 'branding.php', 'title' => 'Logo & Branding'],
            ['file' => 'academic-settings.php', 'title' => 'Academic Settings'],
            ['file' => 'board-settings.php', 'title' => 'Board Settings'],
            ['file' => 'session-settings.php', 'title' => 'Session Settings'],
            ['file' => 'date-time-settings.php', 'title' => 'Date & Time Formats'],
            ['file' => 'currency-settings.php', 'title' => 'Currency Settings'],
            ['file' => 'receipt-numbering.php', 'title' => 'Receipt & Invoice Numbering'],
            ['file' => 'certificate-templates.php', 'title' => 'Certificate Templates'],
            ['file' => 'report-card-templates.php', 'title' => 'Report Card Templates'],
            ['file' => 'notification-settings.php', 'title' => 'Notification Settings'],
            ['file' => 'user-preferences.php', 'title' => 'User Preferences'],
            ['file' => 'role-permissions.php', 'title' => 'Role Permissions Matrix'],
            ['file' => 'login-history.php', 'title' => 'Login History'],
            ['file' => 'audit-logs.php', 'title' => 'Audit Trail Logs'],
            ['file' => 'backup-settings.php', 'title' => 'Backup Settings'],
            ['file' => 'data-import.php', 'title' => 'Data Import Wizard'],
            ['file' => 'data-export.php', 'title' => 'Data Export Center'],
            ['file' => 'system-health.php', 'title' => 'System Health & Performance'],
            ['file' => 'error-logs.php', 'title' => 'Error Logs'],
            ['file' => 'privacy-settings.php', 'title' => 'Privacy & GDPR / DPDP Settings']
        ]
    ]
];
