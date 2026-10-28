/**
 * EDUSYS PRO - MAIN APPLICATION ENGINE
 * Central State, Navigation Registry, Role-Based Access, Theme & Toasts
 */

window.EduApp = (function () {
  const THEME_KEY = 'edusys_theme_pref';
  const AUTH_KEY = 'edusys_current_user';
  const SESSION_KEY = 'edusys_current_session';
  const BOARD_KEY = 'edusys_current_board';

  // Complete Route Registry of Prototype Modules for Central Quick Search & Linking
  const routeRegistry = [
    // Dashboards
    { title: "Admin Overview Dashboard", category: "Dashboards", path: "dashboards/admin.html", icon: "bi-speedometer2" },
    { title: "Principal Academic Dashboard", category: "Dashboards", path: "dashboards/principal.html", icon: "bi-mortarboard" },
    { title: "Teacher Workplace Dashboard", category: "Dashboards", path: "dashboards/teacher.html", icon: "bi-person-badge" },
    { title: "Accountant Fee & Ledger Dashboard", category: "Dashboards", path: "dashboards/accountant.html", icon: "bi-cash-coin" },
    { title: "Admission Officer Desk", category: "Dashboards", path: "dashboards/admission-officer.html", icon: "bi-person-plus" },
    { title: "Librarian Resource Dashboard", category: "Dashboards", path: "dashboards/librarian.html", icon: "bi-book" },
    { title: "Transport Fleet Dashboard", category: "Dashboards", path: "dashboards/transport-manager.html", icon: "bi-bus-front" },
    { title: "HR & Staff Operations Dashboard", category: "Dashboards", path: "dashboards/hr-manager.html", icon: "bi-people" },
    { title: "Student Personal Portal", category: "Dashboards", path: "dashboards/student.html", icon: "bi-backpack" },
    { title: "Parent Guardian Portal", category: "Dashboards", path: "dashboards/parent.html", icon: "bi-house-heart" },

    // Administration
    { title: "School Profile & Details", category: "Administration", path: "modules/administration/school-profile.html", icon: "bi-building" },
    { title: "School Branding & Assets", category: "Administration", path: "modules/administration/school-branding.html", icon: "bi-palette" },
    { title: "Academic Sessions", category: "Administration", path: "modules/administration/academic-sessions.html", icon: "bi-calendar3" },
    { title: "Session Calendar & Terms", category: "Administration", path: "modules/administration/session-calendar.html", icon: "bi-calendar-range" },
    { title: "Classes & Grades", category: "Administration", path: "modules/administration/classes.html", icon: "bi-grid-3x3-gap" },
    { title: "Sections Allocation", category: "Administration", path: "modules/administration/sections.html", icon: "bi-diagram-3" },
    { title: "Academic Streams (Science/Comm/Arts)", category: "Administration", path: "modules/administration/streams.html", icon: "bi-compass" },
    { title: "Departments", category: "Administration", path: "modules/administration/departments.html", icon: "bi-diagram-2" },
    { title: "Subjects Master", category: "Administration", path: "modules/administration/subjects.html", icon: "bi-journal-bookmark" },
    { title: "Class-Subject Mapping", category: "Administration", path: "modules/administration/class-subject-mapping.html", icon: "bi-link-45deg" },
    { title: "Subject Groups & Electives", category: "Administration", path: "modules/administration/subject-groups.html", icon: "bi-collection" },
    { title: "Houses and Clubs", category: "Administration", path: "modules/administration/houses-clubs.html", icon: "bi-flag" },
    { title: "Working Days & Hours", category: "Administration", path: "modules/administration/working-days.html", icon: "bi-clock-history" },
    { title: "Holidays & Vacations", category: "Administration", path: "modules/administration/holidays.html", icon: "bi-calendar-x" },
    { title: "School Events Calendar", category: "Administration", path: "modules/administration/events-calendar.html", icon: "bi-calendar-event" },
    { title: "School General Settings", category: "Administration", path: "modules/administration/school-settings.html", icon: "bi-gear" },
    { title: "Custom Data Fields", category: "Administration", path: "modules/administration/custom-fields.html", icon: "bi-input-cursor-text" },
    { title: "Dynamic Form Builder", category: "Administration", path: "modules/administration/form-builder.html", icon: "bi-ui-checks" },
    { title: "User Management & Staff Logins", category: "Administration", path: "modules/administration/user-management.html", icon: "bi-people" },
    { title: "Role Management (RBAC)", category: "Administration", path: "modules/administration/role-management.html", icon: "bi-shield-lock" },
    { title: "Permission Matrix", category: "Administration", path: "modules/administration/permission-management.html", icon: "bi-key" },
    { title: "User Activity Logs", category: "Administration", path: "modules/administration/activity-logs.html", icon: "bi-journal-text" },
    { title: "System Audit Trail", category: "Administration", path: "modules/administration/audit-trail.html", icon: "bi-shield-check" },
    { title: "Backup & Restore UI", category: "Administration", path: "modules/administration/backup-restore.html", icon: "bi-cloud-arrow-up" },

    // Admissions
    { title: "Admission Desk Overview", category: "Admissions", path: "modules/admissions/dashboard.html", icon: "bi-person-plus" },
    { title: "Admission Enquiries", category: "Admissions", path: "modules/admissions/enquiries.html", icon: "bi-chat-left-dots" },
    { title: "Enquiry Follow-ups", category: "Admissions", path: "modules/admissions/follow-ups.html", icon: "bi-telephone-outbound" },
    { title: "Lead Sources & Campaign MIS", category: "Admissions", path: "modules/admissions/lead-sources.html", icon: "bi-funnel" },
    { title: "Online Applications", category: "Admissions", path: "modules/admissions/online-applications.html", icon: "bi-globe" },
    { title: "Offline / Walk-in Applications", category: "Admissions", path: "modules/admissions/offline-applications.html", icon: "bi-file-earmark-text" },
    { title: "Application Review & Screening", category: "Admissions", path: "modules/admissions/application-review.html", icon: "bi-check2-square" },
    { title: "Document Verification", category: "Admissions", path: "modules/admissions/document-verification.html", icon: "bi-file-earmark-check" },
    { title: "Final Admission Approval", category: "Admissions", path: "modules/admissions/admission-approval.html", icon: "bi-patch-check" },
    { title: "Merit Lists (Entrance/Marks)", category: "Admissions", path: "modules/admissions/merit-lists.html", icon: "bi-sort-numeric-down" },
    { title: "Waiting Lists", category: "Admissions", path: "modules/admissions/waiting-lists.html", icon: "bi-hourglass-split" },
    { title: "Prospectus Sales & Inventory", category: "Admissions", path: "modules/admissions/prospectus-distribution.html", icon: "bi-book-half" },
    { title: "Campus Visits & Open House", category: "Admissions", path: "modules/admissions/campus-visits.html", icon: "bi-geo-alt" },
    { title: "Admission Counselling", category: "Admissions", path: "modules/admissions/counselling.html", icon: "bi-chat-heart" },
    { title: "Admission Fees Collection", category: "Admissions", path: "modules/admissions/admission-fees.html", icon: "bi-credit-card" },
    { title: "Admission Analytics & Reports", category: "Admissions", path: "modules/admissions/admission-reports.html", icon: "bi-bar-chart-line" },
    { title: "Re-admissions & Section Shifts", category: "Admissions", path: "modules/admissions/re-admissions.html", icon: "bi-arrow-repeat" },
    { title: "Withdrawal Requests", category: "Admissions", path: "modules/admissions/withdrawal-requests.html", icon: "bi-box-arrow-right" },

    // Students
    { title: "Student Management Dashboard", category: "Students", path: "modules/students/dashboard.html", icon: "bi-backpack" },
    { title: "Student Directory", category: "Students", path: "modules/students/student-directory.html", icon: "bi-people" },
    { title: "Add New Student (Multi-step)", category: "Students", path: "modules/students/add-student.html", icon: "bi-person-plus" },
    { title: "Student Profile 360", category: "Students", path: "modules/students/student-profile.html", icon: "bi-person-vcard" },
    { title: "Personal Information", category: "Students", path: "modules/students/personal-info.html", icon: "bi-person-lines-fill" },
    { title: "Parent & Guardian Records", category: "Students", path: "modules/students/parent-records.html", icon: "bi-person-heart" },
    { title: "Emergency Contacts", category: "Students", path: "modules/students/emergency-contacts.html", icon: "bi-telephone-fill" },
    { title: "Previous School Records", category: "Students", path: "modules/students/previous-school.html", icon: "bi-file-earmark-medical" },
    { title: "Student Documents Locker", category: "Students", path: "modules/students/documents.html", icon: "bi-folder-check" },
    { title: "Student ID Cards Generator", category: "Students", path: "modules/students/id-cards.html", icon: "bi-card-heading" },
    { title: "Class & Section Allocation", category: "Students", path: "modules/students/class-allocation.html", icon: "bi-shuffle" },
    { title: "Roll Number Management", category: "Students", path: "modules/students/roll-numbers.html", icon: "bi-sort-numeric-up" },
    { title: "Student Promotion to Next Class", category: "Students", path: "modules/students/student-promotion.html", icon: "bi-graph-up-arrow" },
    { title: "Student Transfer Register", category: "Students", path: "modules/students/student-transfer.html", icon: "bi-arrow-left-right" },
    { title: "Student Withdrawal Register", category: "Students", path: "modules/students/student-withdrawal.html", icon: "bi-person-x" },
    { title: "Transfer Certificates (TC)", category: "Students", path: "modules/students/transfer-certificates.html", icon: "bi-award" },
    { title: "Bonafide Certificates", category: "Students", path: "modules/students/bonafide-certificates.html", icon: "bi-patch-check" },
    { title: "Character Certificates", category: "Students", path: "modules/students/character-certificates.html", icon: "bi-star" },
    { title: "Study Certificates", category: "Students", path: "modules/students/study-certificates.html", icon: "bi-journal-check" },
    { title: "Student Timeline & History", category: "Students", path: "modules/students/student-history.html", icon: "bi-clock-history" },
    { title: "Alumni Directory & Network", category: "Students", path: "modules/students/alumni.html", icon: "bi-mortarboard-fill" },
    { title: "Student Status (Active/Suspended)", category: "Students", path: "modules/students/student-status.html", icon: "bi-toggles" },
    { title: "Student Bulk Import / Export", category: "Students", path: "modules/students/import-export.html", icon: "bi-file-earmark-spreadsheet" },

    // Academics
    { title: "Academics Overview", category: "Academics", path: "modules/academics/dashboard.html", icon: "bi-mortarboard" },
    { title: "Curriculum Management", category: "Academics", path: "modules/academics/curriculum.html", icon: "bi-book-half" },
    { title: "CBSE Curriculum & NEP 2020", category: "Academics", path: "modules/academics/cbse-curriculum.html", icon: "bi-award" },
    { title: "State Board Curriculum", category: "Academics", path: "modules/academics/state-curriculum.html", icon: "bi-bookmark-star" },
    { title: "Board and Class Mapping", category: "Academics", path: "modules/academics/board-mapping.html", icon: "bi-diagram-3" },
    { title: "Syllabus Management", category: "Academics", path: "modules/academics/syllabus.html", icon: "bi-card-checklist" },
    { title: "Subject Allocation", category: "Academics", path: "modules/academics/subject-allocation.html", icon: "bi-journal-check" },
    { title: "Teacher Allocation", category: "Academics", path: "modules/academics/teacher-allocation.html", icon: "bi-person-workspace" },
    { title: "Class Teacher Assignment", category: "Academics", path: "modules/academics/class-teacher-assignment.html", icon: "bi-person-badge-fill" },
    { title: "Timetable Builder & Scheduler", category: "Academics", path: "modules/academics/timetable-builder.html", icon: "bi-calendar3-range" },
    { title: "Class Timetable View", category: "Academics", path: "modules/academics/class-timetable.html", icon: "bi-table" },
    { title: "Teacher Timetable View", category: "Academics", path: "modules/academics/teacher-timetable.html", icon: "bi-calendar-week" },
    { title: "Classroom Allocation", category: "Academics", path: "modules/academics/classroom-allocation.html", icon: "bi-door-open" },
    { title: "Period & Bell Management", category: "Academics", path: "modules/academics/period-management.html", icon: "bi-bell" },
    { title: "Substitute Teachers Manager", category: "Academics", path: "modules/academics/substitute-teachers.html", icon: "bi-arrow-left-right" },
    { title: "Lesson Planning", category: "Academics", path: "modules/academics/lesson-planning.html", icon: "bi-stickies" },
    { title: "Teacher Daily Diary", category: "Academics", path: "modules/academics/teaching-diary.html", icon: "bi-journal-richtext" },
    { title: "Homework Management", category: "Academics", path: "modules/academics/homework.html", icon: "bi-pen" },
    { title: "Assignments", category: "Academics", path: "modules/academics/assignments.html", icon: "bi-file-earmark-ruled" },
    { title: "Projects & Lab Work", category: "Academics", path: "modules/academics/projects.html", icon: "bi-clipboard2-check" },
    { title: "Worksheets & Practice Papers", category: "Academics", path: "modules/academics/worksheets.html", icon: "bi-file-earmark-text" },
    { title: "Study Materials & Notes", category: "Academics", path: "modules/academics/study-materials.html", icon: "bi-folder2-open" },
    { title: "Learning Outcomes & Blooms Taxonomy", category: "Academics", path: "modules/academics/learning-outcomes.html", icon: "bi-bullseye" },
    { title: "Syllabus Completion Tracker", category: "Academics", path: "modules/academics/syllabus-completion.html", icon: "bi-pie-chart" },
    { title: "Practical and Lab Scheduling", category: "Academics", path: "modules/academics/lab-scheduling.html", icon: "bi-eyedropper" },
    { title: "Remedial Classes", category: "Academics", path: "modules/academics/remedial-classes.html", icon: "bi-heart-pulse" },
    { title: "Extra Classes & Olympiads", category: "Academics", path: "modules/academics/extra-classes.html", icon: "bi-stars" },
    { title: "Academic Progress Tracker", category: "Academics", path: "modules/academics/academic-progress.html", icon: "bi-speedometer" },

    // Attendance
    { title: "Attendance Dashboard", category: "Attendance", path: "modules/attendance/dashboard.html", icon: "bi-calendar-check" },
    { title: "Student Daily Attendance", category: "Attendance", path: "modules/attendance/daily-attendance.html", icon: "bi-check2-circle" },
    { title: "Class-wise Attendance", category: "Attendance", path: "modules/attendance/class-attendance.html", icon: "bi-people" },
    { title: "Period-wise Attendance", category: "Attendance", path: "modules/attendance/period-attendance.html", icon: "bi-clock" },
    { title: "Teacher Attendance Register", category: "Attendance", path: "modules/attendance/teacher-attendance.html", icon: "bi-person-check" },
    { title: "Staff Attendance Register", category: "Attendance", path: "modules/attendance/staff-attendance.html", icon: "bi-person-lines-fill" },
    { title: "Late Entry Register", category: "Attendance", path: "modules/attendance/late-entry.html", icon: "bi-alarm" },
    { title: "Early Leave Register", category: "Attendance", path: "modules/attendance/early-leave.html", icon: "bi-box-arrow-left" },
    { title: "Student Leave Applications", category: "Attendance", path: "modules/attendance/student-leaves.html", icon: "bi-envelope-paper" },
    { title: "Staff Leave Applications", category: "Attendance", path: "modules/attendance/staff-leaves.html", icon: "bi-briefcase" },
    { title: "Leave Approvals Workflow", category: "Attendance", path: "modules/attendance/leave-approval.html", icon: "bi-check2-all" },
    { title: "Attendance Corrections", category: "Attendance", path: "modules/attendance/attendance-corrections.html", icon: "bi-pencil-square" },
    { title: "Monthly Attendance Register", category: "Attendance", path: "modules/attendance/monthly-register.html", icon: "bi-calendar3" },
    { title: "Absentee List & SMS Alert", category: "Attendance", path: "modules/attendance/absentee-list.html", icon: "bi-exclamation-triangle" },
    { title: "Low Attendance Alerts (<75%)", category: "Attendance", path: "modules/attendance/low-attendance-alerts.html", icon: "bi-bell-fill" },
    { title: "Attendance Percentage Calculator", category: "Attendance", path: "modules/attendance/attendance-percentage.html", icon: "bi-percent" },
    { title: "Biometric Device Integration", category: "Attendance", path: "modules/attendance/biometric-integration.html", icon: "bi-fingerprint" },
    { title: "RFID Smart Card Integration", category: "Attendance", path: "modules/attendance/rfid-integration.html", icon: "bi-broadcast" },
    { title: "QR Code Attendance", category: "Attendance", path: "modules/attendance/qr-attendance.html", icon: "bi-qr-code-scan" },
    { title: "Attendance MIS Reports", category: "Attendance", path: "modules/attendance/attendance-reports.html", icon: "bi-file-earmark-bar-graph" },

    // Examinations
    { title: "Examinations Center", category: "Examinations", path: "modules/examinations/dashboard.html", icon: "bi-journal-check" },
    { title: "Exam Types (PA/Half Yearly/Pre-Board)", category: "Examinations", path: "modules/examinations/exam-types.html", icon: "bi-ui-radios-grid" },
    { title: "Exam Groups", category: "Examinations", path: "modules/examinations/exam-groups.html", icon: "bi-collection" },
    { title: "Exam Schedules & Dates", category: "Examinations", path: "modules/examinations/exam-schedules.html", icon: "bi-calendar2-week" },
    { title: "Exam Timetables", category: "Examinations", path: "modules/examinations/exam-timetables.html", icon: "bi-table" },
    { title: "Exam Hall & Rooms", category: "Examinations", path: "modules/examinations/exam-rooms.html", icon: "bi-door-closed" },
    { title: "Seating Plans Allocation", category: "Examinations", path: "modules/examinations/seating-plans.html", icon: "bi-grid" },
    { title: "Admit Cards (Hall Tickets)", category: "Examinations", path: "modules/examinations/admit-cards.html", icon: "bi-card-text" },
    { title: "Question Bank & Blooms Taxonomy", category: "Examinations", path: "modules/examinations/question-bank.html", icon: "bi-patch-question" },
    { title: "Question Paper Generator", category: "Examinations", path: "modules/examinations/question-papers.html", icon: "bi-file-earmark-font" },
    { title: "Online Computer Based Exams", category: "Examinations", path: "modules/examinations/online-exams.html", icon: "bi-display" },
    { title: "OMR Evaluation Sheet Scanner", category: "Examinations", path: "modules/examinations/omr-evaluation.html", icon: "bi-circle-half" },
    { title: "Marks Entry Register", category: "Examinations", path: "modules/examinations/marks-entry.html", icon: "bi-input-cursor" },
    { title: "Bulk Marks Import (Excel)", category: "Examinations", path: "modules/examinations/bulk-marks-import.html", icon: "bi-file-earmark-spreadsheet" },
    { title: "Theory & Practical Marks", category: "Examinations", path: "modules/examinations/theory-practical-marks.html", icon: "bi-sliders" },
    { title: "Internal Assessment (CCE 20%)", category: "Examinations", path: "modules/examinations/internal-assessment.html", icon: "bi-journal-code" },
    { title: "Projects & Viva Marks", category: "Examinations", path: "modules/examinations/projects-viva-marks.html", icon: "bi-mic" },
    { title: "Grade Configuration & Scales", category: "Examinations", path: "modules/examinations/grade-configuration.html", icon: "bi-award" },
    { title: "CBSE Assessment Structure", category: "Examinations", path: "modules/examinations/cbse-assessment.html", icon: "bi-card-heading" },
    { title: "State Board Assessment Structure", category: "Examinations", path: "modules/examinations/state-board-assessment.html", icon: "bi-bookmark-check" },
    { title: "Marks Verification Workflow", category: "Examinations", path: "modules/examinations/marks-verification.html", icon: "bi-shield-check" },
    { title: "Result Processing Engine", category: "Examinations", path: "modules/examinations/result-processing.html", icon: "bi-cpu" },
    { title: "Percentage & Grade Calculation", category: "Examinations", path: "modules/examinations/percentage-grade-calc.html", icon: "bi-calculator" },
    { title: "Class Rank Analysis", category: "Examinations", path: "modules/examinations/class-rank.html", icon: "bi-trophy" },
    { title: "Merit List & Toppers", category: "Examinations", path: "modules/examinations/merit-list.html", icon: "bi-star-fill" },
    { title: "CBSE Report Cards Generator", category: "Examinations", path: "modules/examinations/report-cards.html", icon: "bi-printer" },
    { title: "Continuous Progress Reports", category: "Examinations", path: "modules/examinations/progress-reports.html", icon: "bi-graph-up" },
    { title: "Cumulative Results (Multi-Term)", category: "Examinations", path: "modules/examinations/cumulative-results.html", icon: "bi-layers" },
    { title: "Marks Rechecking & Retotaling", category: "Examinations", path: "modules/examinations/rechecking.html", icon: "bi-search" },
    { title: "Supplementary & Compartment Exams", category: "Examinations", path: "modules/examinations/supplementary-exams.html", icon: "bi-arrow-clockwise" },
    { title: "Promotion Eligibility Matrix", category: "Examinations", path: "modules/examinations/promotion-eligibility.html", icon: "bi-check-circle" },
    { title: "Result Publication to Portal", category: "Examinations", path: "modules/examinations/result-publication.html", icon: "bi-cloud-upload" },
    { title: "Subject Performance Analysis", category: "Examinations", path: "modules/examinations/subject-analysis.html", icon: "bi-bar-chart" },
    { title: "Examination Reports & Analytics", category: "Examinations", path: "modules/examinations/exam-reports.html", icon: "bi-file-earmark-ruled" },

    // Fees
    { title: "Fees Dashboard", category: "Fees", path: "modules/fees/dashboard.html", icon: "bi-cash-stack" },
    { title: "Fee Categories", category: "Fees", path: "modules/fees/fee-categories.html", icon: "bi-tags" },
    { title: "Fee Heads Master", category: "Fees", path: "modules/fees/fee-heads.html", icon: "bi-wallet2" },
    { title: "Class-wise Fee Structures", category: "Fees", path: "modules/fees/class-fee-structures.html", icon: "bi-diagram-3" },
    { title: "Session-wise Fee Structures", category: "Fees", path: "modules/fees/session-fee-structures.html", icon: "bi-calendar3" },
    { title: "Monthly Fee Setup", category: "Fees", path: "modules/fees/monthly-fees.html", icon: "bi-calendar-month" },
    { title: "Quarterly Fee Setup", category: "Fees", path: "modules/fees/quarterly-fees.html", icon: "bi-pie-chart" },
    { title: "Annual Fee Structure", category: "Fees", path: "modules/fees/annual-fees.html", icon: "bi-cash" },
    { title: "Admission Fees Setup", category: "Fees", path: "modules/fees/admission-fees.html", icon: "bi-person-plus" },
    { title: "Examination Fees", category: "Fees", path: "modules/fees/examination-fees.html", icon: "bi-journal-check" },
    { title: "Transport Fees Slab", category: "Fees", path: "modules/fees/transport-fees.html", icon: "bi-bus-front" },
    { title: "Hostel Fee Structures", category: "Fees", path: "modules/fees/hostel-fees.html", icon: "bi-building" },
    { title: "Miscellaneous Fees & Fines", category: "Fees", path: "modules/fees/misc-fees.html", icon: "bi-receipt" },
    { title: "Installment Setup", category: "Fees", path: "modules/fees/installment-setup.html", icon: "bi-distribute-vertical" },
    { title: "Student Fee Assignment", category: "Fees", path: "modules/fees/student-fee-assignment.html", icon: "bi-person-check" },
    { title: "Fee Invoice Generation", category: "Fees", path: "modules/fees/invoice-generation.html", icon: "bi-receipt-cutoff" },
    { title: "Fee Collection Counter", category: "Fees", path: "modules/fees/fee-collection.html", icon: "bi-currency-rupee" },
    { title: "Partial Payments Register", category: "Fees", path: "modules/fees/partial-payments.html", icon: "bi-cash-coin" },
    { title: "Advance Payments Ledger", category: "Fees", path: "modules/fees/advance-payments.html", icon: "bi-piggy-bank" },
    { title: "Fee Receipt Generation", category: "Fees", path: "modules/fees/receipt-generation.html", icon: "bi-printer" },
    { title: "Receipt Reprinting Register", category: "Fees", path: "modules/fees/receipt-reprint.html", icon: "bi-arrow-repeat" },
    { title: "Receipt Cancellation & Voiding", category: "Fees", path: "modules/fees/receipt-cancellation.html", icon: "bi-x-circle" },
    { title: "Fee Refund Management", category: "Fees", path: "modules/fees/fee-refunds.html", icon: "bi-arrow-counterclockwise" },
    { title: "Fee Concessions & Waivers", category: "Fees", path: "modules/fees/concessions.html", icon: "bi-percent" },
    { title: "Scholarships & Trust Funds", category: "Fees", path: "modules/fees/scholarships.html", icon: "bi-trophy" },
    { title: "Sibling Discounts Rule", category: "Fees", path: "modules/fees/sibling-discounts.html", icon: "bi-people" },
    { title: "Staff Ward Discounts", category: "Fees", path: "modules/fees/staff-discounts.html", icon: "bi-person-heart" },
    { title: "Late Fees & Fines Matrix", category: "Fees", path: "modules/fees/late-fees.html", icon: "bi-alarm" },
    { title: "Outstanding Balances Summary", category: "Fees", path: "modules/fees/outstanding-balances.html", icon: "bi-exclamation-circle" },
    { title: "Fee Defaulter Lists", category: "Fees", path: "modules/fees/defaulter-lists.html", icon: "bi-slash-circle" },
    { title: "Fee Due Reminders & SMS", category: "Fees", path: "modules/fees/due-reminders.html", icon: "bi-send" },
    { title: "Daily Collection Reports", category: "Fees", path: "modules/fees/daily-collection.html", icon: "bi-calendar-day" },
    { title: "Monthly Collection Reports", category: "Fees", path: "modules/fees/monthly-collection.html", icon: "bi-graph-up-arrow" },
    { title: "Student Fee Ledgers (Account Statement)", category: "Fees", path: "modules/fees/student-fee-ledgers.html", icon: "bi-book" },
    { title: "Payment Gateway Simulation (Razorpay/PayTM)", category: "Fees", path: "modules/fees/payment-gateway.html", icon: "bi-credit-card-2-front" },
    { title: "Payment Reconciliation", category: "Fees", path: "modules/fees/payment-reconciliation.html", icon: "bi-check2-all" },
    { title: "Fee Carry-forward to Next Session", category: "Fees", path: "modules/fees/fee-carry-forward.html", icon: "bi-forward" },
    { title: "Comprehensive Fee Reports", category: "Fees", path: "modules/fees/fee-reports.html", icon: "bi-file-earmark-spreadsheet" }
  ];

  function initApp() {
    initTheme();
    initSessionAndBoard();
    initSidebar();
    initQuickSearch();
    updateUserDisplay();
  }

  // Theme Management
  function initTheme() {
    const savedTheme = localStorage.getItem(THEME_KEY) || 'light';
    applyTheme(savedTheme);

    const toggleBtn = document.getElementById('btnThemeToggle');
    if (toggleBtn) {
      toggleBtn.addEventListener('click', () => {
        const currentTheme = document.documentElement.getAttribute('data-bs-theme') || 'light';
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        applyTheme(newTheme);
      });
    }
  }

  function applyTheme(theme) {
    document.documentElement.setAttribute('data-bs-theme', theme);
    localStorage.setItem(THEME_KEY, theme);
    const icon = document.querySelector('#btnThemeToggle i');
    if (icon) {
      icon.className = theme === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-stars';
    }
  }

  // Session & Board
  function initSessionAndBoard() {
    const sessionSelect = document.getElementById('globalSessionSelect');
    if (sessionSelect) {
      const savedSession = localStorage.getItem(SESSION_KEY) || '2024-2025';
      sessionSelect.value = savedSession;
      sessionSelect.addEventListener('change', (e) => {
        localStorage.setItem(SESSION_KEY, e.target.value);
        toast(`Academic session switched to ${e.target.value}`, "info", "Session Changed");
      });
    }

    const boardSelect = document.getElementById('globalBoardSelect');
    if (boardSelect) {
      const savedBoard = localStorage.getItem(BOARD_KEY) || 'CBSE';
      boardSelect.value = savedBoard;
      boardSelect.addEventListener('change', (e) => {
        localStorage.setItem(BOARD_KEY, e.target.value);
        toast(`Curriculum board switched to ${e.target.value}`, "info", "Board Changed");
      });
    }
  }

  // Sidebar controls
  function initSidebar() {
    const toggleBtn = document.getElementById('btnSidebarToggle');
    const wrapper = document.querySelector('.erp-wrapper');
    const sidebar = document.querySelector('.erp-sidebar');

    if (toggleBtn && wrapper) {
      toggleBtn.addEventListener('click', () => {
        if (window.innerWidth <= 991.98) {
          sidebar.classList.toggle('show-mobile');
          let backdrop = document.querySelector('.sidebar-backdrop');
          if (!backdrop) {
            backdrop = document.createElement('div');
            backdrop.className = 'sidebar-backdrop';
            document.body.appendChild(backdrop);
            backdrop.addEventListener('click', () => {
              sidebar.classList.remove('show-mobile');
              backdrop.classList.remove('show');
            });
          }
          backdrop.classList.toggle('show', sidebar.classList.contains('show-mobile'));
        } else {
          wrapper.classList.toggle('sidebar-collapsed');
        }
      });
    }

    // Auto highlight active link based on current URL
    highlightActiveNavLink();
  }

  function highlightActiveNavLink() {
    const currentPath = window.location.pathname.replace(/\\/g, '/');
    const links = document.querySelectorAll('.sidebar-nav a');

    links.forEach(link => {
      const href = link.getAttribute('href');
      if (!href || href === '#') return;

      if (currentPath.endsWith(href) || currentPath.includes(href.replace('../', ''))) {
        link.classList.add('active');
        // If inside a submenu, expand parent accordion/collapse
        const parentCollapse = link.closest('.collapse');
        if (parentCollapse) {
          parentCollapse.classList.add('show');
          const trigger = document.querySelector(`[data-bs-target="#${parentCollapse.id}"]`);
          if (trigger) {
            trigger.classList.add('active');
            trigger.setAttribute('aria-expanded', 'true');
          }
        }
      }
    });
  }

  // User State
  function getCurrentUser() {
    try {
      const stored = localStorage.getItem(AUTH_KEY);
      if (stored) return JSON.parse(stored);
    } catch (e) {}
    // Default to Super Admin
    return {
      id: "super_admin",
      name: "Super Admin",
      role: "Super Admin",
      roleKey: "super_admin",
      email: "admin@edusys.com",
      avatar: "SA"
    };
  }

  function loginAsRole(roleKey, rootPrefix = '') {
    const roles = window.EduMockData ? window.EduMockData.get().roles : [];
    const matched = roles.find(r => r.roleKey === roleKey);
    if (matched) {
      const user = {
        id: matched.id,
        name: matched.name,
        role: matched.name,
        roleKey: matched.roleKey,
        email: matched.email,
        avatar: matched.avatar
      };
      localStorage.setItem(AUTH_KEY, JSON.stringify(user));
      window.location.href = rootPrefix + matched.defaultPath;
    }
  }

  function logout(rootPrefix = '') {
    localStorage.removeItem(AUTH_KEY);
    toast("Logged out successfully", "info");
    const isPhp = window.location.pathname.endsWith('.php');
    setTimeout(() => {
      window.location.href = rootPrefix + (isPhp ? 'login.php' : 'login.html');
    }, 400);
  }

  function updateUserDisplay() {
    const user = getCurrentUser();
    document.querySelectorAll('.current-user-name').forEach(el => el.textContent = user.name);
    document.querySelectorAll('.current-user-role').forEach(el => el.textContent = user.role);
    document.querySelectorAll('.current-user-avatar').forEach(el => el.textContent = user.avatar);
  }

  // Toast System
  function toast(message, type = "info", title = "Notification") {
    let container = document.querySelector('.erp-toast-container');
    if (!container) {
      container = document.createElement('div');
      container.className = 'erp-toast-container';
      document.body.appendChild(container);
    }

    const toastEl = document.createElement('div');
    toastEl.className = 'erp-toast';

    let icon = 'bi-info-circle-fill text-primary';
    if (type === 'success') icon = 'bi-check-circle-fill text-success';
    if (type === 'warning') icon = 'bi-exclamation-triangle-fill text-warning';
    if (type === 'danger') icon = 'bi-x-circle-fill text-danger';

    toastEl.innerHTML = `
      <i class="bi ${icon} fs-4"></i>
      <div class="flex-grow-1">
        <strong class="d-block mb-1 font-size-14">${title}</strong>
        <div class="font-size-13 text-muted">${message}</div>
      </div>
      <button type="button" class="btn-close ms-2" onclick="this.parentElement.remove()"></button>
    `;

    container.appendChild(toastEl);
    setTimeout(() => {
      toastEl.style.transition = 'opacity 0.3s';
      toastEl.style.opacity = '0';
      setTimeout(() => toastEl.remove(), 300);
    }, 4000);
  }

  // Quick Command Palette & Modern Topbar Inline Search
  function initQuickSearch() {
    // Topbar Inline Search Elements
    const topbarInput = document.getElementById('topbarSearchInput');
    const topbarDropdown = document.getElementById('topbarSearchDropdown');
    const topbarResults = document.getElementById('topbarSearchResults');
    const topbarClear = document.getElementById('topbarSearchClear');
    const topbarBadge = document.getElementById('topbarSearchBadge');
    const topbarContainer = document.getElementById('topbarSearchContainer');
    let selectedIdx = -1;

    function renderTopbarResults(query) {
      if (!topbarResults) return;
      const prefix = getRootPrefix();
      const q = (query || '').toLowerCase().trim();
      const isPhp = window.location.pathname.endsWith('.php');

      let matches = [];
      if (!q) {
        // Default quick recommendations when input is empty
        matches = [
          { title: "Admin Overview Dashboard", category: "Dashboards", path: "dashboards/admin.html", icon: "bi-speedometer2" },
          { title: "Fee Collection Counter POS", category: "Fees", path: "modules/fees/fee-collection.html", icon: "bi-credit-card-2-front" },
          { title: "Student Admissions Desk", category: "Admissions", path: "modules/admissions/online-applications.html", icon: "bi-person-plus" },
          { title: "Class Daily Attendance", category: "Attendance", path: "modules/attendance/daily-attendance.html", icon: "bi-calendar-check" },
          { title: "CBSE LOC Verification", category: "Compliance", path: "modules/compliance/cbse-reporting.html", icon: "bi-award" },
          { title: "Timetable Master Schedule", category: "Academics", path: "modules/academics/class-timetable.html", icon: "bi-calendar3-range" },
          { title: "Exam Report Cards", category: "Examinations", path: "modules/examinations/report-cards.html", icon: "bi-file-earmark-text" },
          { title: "School General Settings", category: "Administration", path: "modules/administration/school-settings.html", icon: "bi-gear" }
        ];
        if (topbarBadge) topbarBadge.textContent = "Recommended";
      } else {
        matches = routeRegistry.filter(item => {
          return item.title.toLowerCase().includes(q) || item.category.toLowerCase().includes(q);
        });
        if (topbarBadge) topbarBadge.textContent = matches.length + (matches.length === 1 ? ' screen' : ' screens');
      }

      if (matches.length === 0) {
        topbarResults.innerHTML = `
          <div class="text-center py-4 text-muted">
            <i class="bi bi-search font-size-24 mb-1.5 d-block text-secondary"></i>
            <span class="font-size-13">No matching screens for "<strong>${escapeHtml(query)}</strong>"</span>
          </div>
        `;
        selectedIdx = -1;
        return;
      }

      selectedIdx = 0; // Default first item selected for instant Enter
      topbarResults.innerHTML = matches.slice(0, 10).map((item, idx) => {
        const targetPath = item.path.replace(/\.html/g, '');
        return `
          <a href="${prefix}${targetPath}" class="search-result-item ${idx === 0 ? 'selected' : ''}" data-idx="${idx}">
            <i class="bi ${item.icon}"></i>
            <span class="item-title">${highlightMatch(item.title, q)}</span>
            <span class="item-badge">${item.category}</span>
          </a>
        `;
      }).join('');
    }

    function highlightMatch(text, q) {
      if (!q) return escapeHtml(text);
      const regex = new RegExp(`(${escapeRegex(q)})`, 'gi');
      return escapeHtml(text).replace(regex, '<mark class="bg-primary text-white px-0.5 rounded">$1</mark>');
    }

    function escapeHtml(str) {
      return (str || '').replace(/[&<>"']/g, m => ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
      }[m]));
    }

    function escapeRegex(str) {
      return str.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    }

    if (topbarInput && topbarDropdown) {
      // Focus & Click: open dropdown
      topbarInput.addEventListener('focus', () => {
        renderTopbarResults(topbarInput.value);
        topbarDropdown.classList.remove('d-none');
        if (topbarClear) {
          topbarClear.classList.toggle('d-none', !topbarInput.value);
        }
      });

      // Typing: filter live results
      topbarInput.addEventListener('input', (e) => {
        renderTopbarResults(e.target.value);
        topbarDropdown.classList.remove('d-none');
        if (topbarClear) {
          topbarClear.classList.toggle('d-none', !e.target.value);
        }
      });

      // Keyboard navigation (Up, Down, Enter, Esc)
      topbarInput.addEventListener('keydown', (e) => {
        const items = topbarResults.querySelectorAll('.search-result-item');
        if (e.key === 'ArrowDown') {
          e.preventDefault();
          if (items.length === 0) return;
          selectedIdx = (selectedIdx + 1) % items.length;
          updateSelection(items);
        } else if (e.key === 'ArrowUp') {
          e.preventDefault();
          if (items.length === 0) return;
          selectedIdx = (selectedIdx - 1 + items.length) % items.length;
          updateSelection(items);
        } else if (e.key === 'Enter') {
          e.preventDefault();
          if (items.length > 0 && selectedIdx >= 0 && items[selectedIdx]) {
            items[selectedIdx].click();
          }
        } else if (e.key === 'Escape') {
          topbarDropdown.classList.add('d-none');
          topbarInput.blur();
        }
      });

      function updateSelection(items) {
        items.forEach((item, idx) => {
          if (idx === selectedIdx) {
            item.classList.add('selected');
            item.scrollIntoView({ block: 'nearest' });
          } else {
            item.classList.remove('selected');
          }
        });
      }

      // Clear button
      if (topbarClear) {
        topbarClear.addEventListener('click', (e) => {
          e.stopPropagation();
          topbarInput.value = '';
          topbarClear.classList.add('d-none');
          renderTopbarResults('');
          topbarInput.focus();
        });
      }

      // Click outside listener to close dropdown
      document.addEventListener('click', (e) => {
        if (topbarContainer && !topbarContainer.contains(e.target)) {
          topbarDropdown.classList.add('d-none');
        }
      });
    }

    // Modal fallback quick search
    if (!document.getElementById('quickSearchModal')) {
      const modalHtml = `
        <div class="modal fade cmd-k-modal" id="quickSearchModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="cmd-k-input-wrap">
                <i class="bi bi-search"></i>
                <input type="text" class="cmd-k-input" id="cmdKInput" placeholder="Type a module name or feature... (e.g. Fees, Attendance, Admit Cards, Timetable)">
              </div>
              <div class="cmd-k-results" id="cmdKResults">
                <!-- Dynamically populated -->
              </div>
              <div class="modal-footer py-2 px-3 d-flex justify-content-between align-items-center bg-light">
                <small class="text-muted"><kbd>ESC</kbd> to close &nbsp;|&nbsp; <kbd>↑</kbd> <kbd>↓</kbd> to navigate</small>
                <small class="text-primary fw-semibold">${routeRegistry.length} Registered ERP Screens</small>
              </div>
            </div>
          </div>
        </div>
      `;
      document.body.insertAdjacentHTML('beforeend', modalHtml);
    }

    // Global Key shortcut Ctrl + K
    document.addEventListener('keydown', (e) => {
      if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') {
        e.preventDefault();
        if (topbarInput) {
          topbarInput.focus();
          topbarInput.select();
          renderTopbarResults(topbarInput.value);
          topbarDropdown.classList.remove('d-none');
        } else {
          openQuickSearch();
        }
      }
    });

    const cmdInput = document.getElementById('cmdKInput');
    if (cmdInput) {
      cmdInput.addEventListener('input', (e) => {
        renderQuickSearchResults(e.target.value);
      });
    }
  }

  function openQuickSearch() {
    const modalEl = document.getElementById('quickSearchModal');
    if (modalEl) {
      const bsModal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
      bsModal.show();
      setTimeout(() => {
        const input = document.getElementById('cmdKInput');
        if (input) {
          input.value = '';
          input.focus();
          renderQuickSearchResults('');
        }
      }, 200);
    }
  }

  function getRootPrefix() {
    // Detect how many levels deep we are
    const path = window.location.pathname.replace(/\\/g, '/');
    if (path.includes('/modules/') || path.includes('/dashboards/')) {
      if (path.includes('/modules/')) {
        return '../../';
      }
      return '../';
    }
    return '';
  }

  function renderQuickSearchResults(query) {
    const resultsContainer = document.getElementById('cmdKResults');
    if (!resultsContainer) return;

    const prefix = getRootPrefix();
    const q = query.toLowerCase().trim();

    const filtered = routeRegistry.filter(item => {
      return item.title.toLowerCase().includes(q) || item.category.toLowerCase().includes(q);
    });

    if (filtered.length === 0) {
      resultsContainer.innerHTML = `
        <div class="text-center py-4 text-muted">
          <i class="bi bi-search fs-2 mb-2 d-block"></i>
          No matching modules found for "<strong>${query}</strong>"
        </div>
      `;
      return;
    }

    const isPhp = window.location.pathname.endsWith('.php');

    resultsContainer.innerHTML = filtered.slice(0, 15).map(item => {
      const targetPath = item.path.replace(/\.html/g, '');
      return `
      <a href="${prefix}${targetPath}" class="cmd-k-item">
        <i class="bi ${item.icon}"></i>
        <span class="fw-semibold">${item.title}</span>
        <span class="item-module">${item.category}</span>
      </a>
    `;
    }).join('');
  }

  // Initialize once DOM is ready
  document.addEventListener('DOMContentLoaded', initApp);

  return {
    init: initApp,
    toast: toast,
    currentUser: getCurrentUser,
    loginAs: loginAsRole,
    logout: logout,
    openSearch: openQuickSearch,
    routes: routeRegistry,
    getRootPrefix: getRootPrefix
  };
})();
