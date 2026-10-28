<?php
/**
 * EDUSYS PRO - ROLE-BASED DYNAMIC SIDEBAR COMPONENT
 * Renders tailored navigation strictly according to active user role.
 */
$active_mod = $active_module ?? '';
$active_sub = $active_submodule ?? '';
$user_role_id = $current_user['id'] ?? 'super_admin';

// Helper to check if a link is currently active
function is_link_active($target_path, $active_mod, $active_sub) {
    $script = $_SERVER['SCRIPT_NAME'] ?? '';
    $clean_target = ltrim(str_replace('.php', '', $target_path), '/');
    $clean_script = ltrim(str_replace('.php', '', $script), '/');
    
    if (strpos($clean_script, $clean_target) !== false) {
        return true;
    }
    return false;
}
?>
    <!-- Master Collapsible Sidebar Navigation -->
    <aside class="erp-sidebar">
      <div class="sidebar-brand">
        <a href="<?php echo base_url('index.php'); ?>" class="d-flex align-items-center gap-2 text-decoration-none">
          <div class="brand-icon">
            <i class="bi bi-mortarboard-fill"></i>
          </div>
          <div class="brand-text">
            <span class="brand-title"><?php echo htmlspecialchars($school_config['short_name']); ?> Pro</span>
            <span class="brand-subtitle"><?php echo htmlspecialchars($current_user['role']); ?></span>
          </div>
        </a>
      </div>

      <div class="sidebar-scroll">
        <ul class="sidebar-nav">

        <?php if ($user_role_id === 'student'): ?>
          <!-- ================= STUDENT SIDEBAR ================= -->
          <div class="sidebar-section-title">My Learner Portal</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/student.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'student.php') ? 'active' : ''; ?>">
              <i class="bi bi-speedometer2 nav-icon"></i>
              <span class="nav-text">Student Dashboard</span>
            </a>
          </li>

          <div class="sidebar-section-title">My Academics</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/student-portal/timetable.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'timetable.php') ? 'active' : ''; ?>">
              <i class="bi bi-calendar3-week nav-icon"></i>
              <span class="nav-text">Class Timetable</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/student-portal/report-cards.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'report-cards.php') ? 'active' : ''; ?>">
              <i class="bi bi-award nav-icon"></i>
              <span class="nav-text">CBSE Report Card</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/student-portal/marks.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'marks.php') ? 'active' : ''; ?>">
              <i class="bi bi-bar-chart-line nav-icon"></i>
              <span class="nav-text">Marks & Results</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/student-portal/homework.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'homework.php') ? 'active' : ''; ?>">
              <i class="bi bi-journal-text nav-icon"></i>
              <span class="nav-text">Daily Homework</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/student-portal/assignments.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'assignments.php') ? 'active' : ''; ?>">
              <i class="bi bi-cloud-upload nav-icon"></i>
              <span class="nav-text">Assignments & LMS</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/student-portal/attendance.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'attendance.php') ? 'active' : ''; ?>">
              <i class="bi bi-calendar-check nav-icon"></i>
              <span class="nav-text">My Attendance (95.9%)</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/student-portal/admit-cards.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'admit-cards.php') ? 'active' : ''; ?>">
              <i class="bi bi-person-vcard nav-icon"></i>
              <span class="nav-text">Admit Card & Exams</span>
            </a>
          </li>

          <div class="sidebar-section-title">Campus & Services</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/transport/gps-tracking.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'gps-tracking.php') ? 'active' : ''; ?>">
              <i class="bi bi-bus-front nav-icon"></i>
              <span class="nav-text">My School Bus #12</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/student-portal/library-books.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'library-books.php') ? 'active' : ''; ?>">
              <i class="bi bi-book nav-icon"></i>
              <span class="nav-text">Library Borrowed</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/student-portal/fee-status.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'fee-status.php') ? 'active' : ''; ?>">
              <i class="bi bi-receipt nav-icon"></i>
              <span class="nav-text">Fee Status & Dues</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/student-portal/notices.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'notices.php') ? 'active' : ''; ?>">
              <i class="bi bi-bell nav-icon"></i>
              <span class="nav-text">School Notices</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/student-portal/profile.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'profile.php') ? 'active' : ''; ?>">
              <i class="bi bi-person-circle nav-icon"></i>
              <span class="nav-text">My Student Profile</span>
            </a>
          </li>

        <?php elseif ($user_role_id === 'parent'): ?>
          <!-- ================= PARENT SIDEBAR ================= -->
          <div class="sidebar-section-title">Parent Guardian Desk</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/parent.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'parent.php') ? 'active' : ''; ?>">
              <i class="bi bi-house-heart nav-icon"></i>
              <span class="nav-text">Parent Dashboard</span>
            </a>
          </li>

          <div class="sidebar-section-title">Ward Progress</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/parent-portal/multiple-children.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'multiple-children.php') ? 'active' : ''; ?>">
              <i class="bi bi-people nav-icon"></i>
              <span class="nav-text">Multi-Child Switcher</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/parent-portal/attendance.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'attendance.php') ? 'active' : ''; ?>">
              <i class="bi bi-calendar-check nav-icon"></i>
              <span class="nav-text">Attendance & Check-in</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/parent-portal/report-cards.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'report-cards.php') ? 'active' : ''; ?>">
              <i class="bi bi-award nav-icon"></i>
              <span class="nav-text">CCE Progress Cards</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/parent-portal/homework.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'homework.php') ? 'active' : ''; ?>">
              <i class="bi bi-journal-text nav-icon"></i>
              <span class="nav-text">Homework & Diary</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/parent-portal/teacher-communication.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'teacher-communication.php') ? 'active' : ''; ?>">
              <i class="bi bi-chat-left-dots nav-icon"></i>
              <span class="nav-text">Teacher Notes & PTM</span>
            </a>
          </li>

          <div class="sidebar-section-title">Fees & Safety</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/parent-portal/online-payment.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'online-payment.php') ? 'active' : ''; ?>">
              <i class="bi bi-credit-card-2-front nav-icon"></i>
              <span class="nav-text">Online Fee Payment</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/parent-portal/payment-history.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'payment-history.php') ? 'active' : ''; ?>">
              <i class="bi bi-receipt nav-icon"></i>
              <span class="nav-text">Payment Receipts</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/transport/gps-tracking.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'gps-tracking.php') ? 'active' : ''; ?>">
              <i class="bi bi-bus-front nav-icon"></i>
              <span class="nav-text">Live Bus GPS Tracker</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/parent-portal/notices.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'notices.php') ? 'active' : ''; ?>">
              <i class="bi bi-bell nav-icon"></i>
              <span class="nav-text">School Notices</span>
            </a>
          </li>

        <?php elseif ($user_role_id === 'teacher' || $user_role_id === 'class_teacher'): ?>
          <!-- ================= TEACHER SIDEBAR ================= -->
          <div class="sidebar-section-title">Faculty Workplace</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/teacher.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'teacher.php') ? 'active' : ''; ?>">
              <i class="bi bi-person-workspace nav-icon"></i>
              <span class="nav-text">Teacher Dashboard</span>
            </a>
          </li>

          <div class="sidebar-section-title">Daily Classroom Ops</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/teacher-portal/my-classes.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'my-classes.php') ? 'active' : ''; ?>">
              <i class="bi bi-people nav-icon"></i>
              <span class="nav-text">My Classes & Sections</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/teacher-portal/attendance-entry.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'attendance-entry.php') ? 'active' : ''; ?>">
              <i class="bi bi-calendar2-check nav-icon"></i>
              <span class="nav-text">Attendance Marking</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/teacher-portal/marks-entry.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'marks-entry.php') ? 'active' : ''; ?>">
              <i class="bi bi-award nav-icon"></i>
              <span class="nav-text">CBSE Marks Entry</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/teacher-portal/homework-creation.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'homework-creation.php') ? 'active' : ''; ?>">
              <i class="bi bi-journal-plus nav-icon"></i>
              <span class="nav-text">Homework Creation</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/teacher-portal/teaching-diary.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'teaching-diary.php') ? 'active' : ''; ?>">
              <i class="bi bi-journal-text nav-icon"></i>
              <span class="nav-text">Daily Teaching Diary</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/teacher-portal/timetable.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'timetable.php') ? 'active' : ''; ?>">
              <i class="bi bi-clock-history nav-icon"></i>
              <span class="nav-text">Teaching Schedule</span>
            </a>
          </li>

          <div class="sidebar-section-title">Pupils & Leaves</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/teacher-portal/student-directory.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'student-directory.php') ? 'active' : ''; ?>">
              <i class="bi bi-person-lines-fill nav-icon"></i>
              <span class="nav-text">Student Directory</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/teacher-portal/parent-communication.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'parent-communication.php') ? 'active' : ''; ?>">
              <i class="bi bi-chat-dots nav-icon"></i>
              <span class="nav-text">Parent Communication</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/teacher-portal/leave-applications.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'leave-applications.php') ? 'active' : ''; ?>">
              <i class="bi bi-calendar-x nav-icon"></i>
              <span class="nav-text">My Leave Requests</span>
            </a>
          </li>

        <?php elseif ($user_role_id === 'accountant'): ?>
          <!-- ================= ACCOUNTANT SIDEBAR ================= -->
          <div class="sidebar-section-title">Finance & Billing</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/accountant.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'accountant.php') ? 'active' : ''; ?>">
              <i class="bi bi-cash-coin nav-icon"></i>
              <span class="nav-text">Accountant Dashboard</span>
            </a>
          </li>

          <div class="sidebar-section-title">Fee Counter POS</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/fees/fee-collection.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'fee-collection.php') ? 'active' : ''; ?>">
              <i class="bi bi-calculator nav-link-icon nav-icon"></i>
              <span class="nav-text">3-Click Fee POS Desk</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/fees/defaulters-list.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'defaulters-list.php') ? 'active' : ''; ?>">
              <i class="bi bi-exclamation-octagon nav-icon"></i>
              <span class="nav-text">Defaulters Ledger</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/fees/concessions.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'concessions.php') ? 'active' : ''; ?>">
              <i class="bi bi-percent nav-icon"></i>
              <span class="nav-text">Fee Concessions</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/fees/fee-structures.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'fee-structures.php') ? 'active' : ''; ?>">
              <i class="bi bi-table nav-icon"></i>
              <span class="nav-text">Fee Structures Master</span>
            </a>
          </li>

          <div class="sidebar-section-title">Accounting & Bank</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/accounts/dashboard.php'); ?>" class="sidebar-nav-link <?php echo ($active_mod === 'accounts' && $active_sub === 'dashboard.php') ? 'active' : ''; ?>">
              <i class="bi bi-journal-bookmark nav-icon"></i>
              <span class="nav-text">General Ledger</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/accounts/bank-reconciliation.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'bank-reconciliation.php') ? 'active' : ''; ?>">
              <i class="bi bi-bank nav-icon"></i>
              <span class="nav-text">Bank Reconciliation</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/accounts/expenses.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'expenses.php') ? 'active' : ''; ?>">
              <i class="bi bi-wallet2 nav-icon"></i>
              <span class="nav-text">Expense Vouchers</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/reports/fee-reports.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'fee-reports.php') ? 'active' : ''; ?>">
              <i class="bi bi-file-earmark-bar-graph nav-icon"></i>
              <span class="nav-text">Financial Reports</span>
            </a>
          </li>

        <?php elseif ($user_role_id === 'principal'): ?>
          <!-- ================= PRINCIPAL SIDEBAR ================= -->
          <div class="sidebar-section-title">Academic Leadership</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/principal.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'principal.php') ? 'active' : ''; ?>">
              <i class="bi bi-mortarboard nav-icon"></i>
              <span class="nav-text">Principal Desk</span>
            </a>
          </li>

          <div class="sidebar-section-title">Academic Oversight</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/students/student-directory.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'student-directory.php') ? 'active' : ''; ?>">
              <i class="bi bi-people nav-icon"></i>
              <span class="nav-text">Whole School SIS (1,878)</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/academics/curriculum-planning.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'curriculum-planning.php') ? 'active' : ''; ?>">
              <i class="bi bi-journal-check nav-icon"></i>
              <span class="nav-text">Curriculum Planning</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/examinations/cce-marks-entry.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'cce-marks-entry.php') ? 'active' : ''; ?>">
              <i class="bi bi-award nav-icon"></i>
              <span class="nav-text">CBSE CCE Exam Results</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/attendance/daily-attendance.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'daily-attendance.php') ? 'active' : ''; ?>">
              <i class="bi bi-calendar2-check nav-icon"></i>
              <span class="nav-text">Whole School Attendance</span>
            </a>
          </li>

          <div class="sidebar-section-title">Governance & Compliance</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/compliance/cbse-reporting.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'cbse-reporting.php') ? 'active' : ''; ?>">
              <i class="bi bi-patch-check nav-icon"></i>
              <span class="nav-text">CBSE LOC & UDISE+</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/hr-payroll/leave-management.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'leave-management.php') ? 'active' : ''; ?>">
              <i class="bi bi-check-circle nav-icon"></i>
              <span class="nav-text">Staff Leave Approvals</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/hr-payroll/staff-directory.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'staff-directory.php') ? 'active' : ''; ?>">
              <i class="bi bi-person-badge nav-icon"></i>
              <span class="nav-text">Faculty Roster (122)</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/reports/academic-reports.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'academic-reports.php') ? 'active' : ''; ?>">
              <i class="bi bi-graph-up-arrow nav-icon"></i>
              <span class="nav-text">Board Result Analytics</span>
            </a>
          </li>

        <?php elseif ($user_role_id === 'transport_manager'): ?>
          <!-- ================= TRANSPORT MANAGER SIDEBAR ================= -->
          <div class="sidebar-section-title">Fleet Management</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/transport-manager.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'transport-manager.php') ? 'active' : ''; ?>">
              <i class="bi bi-bus-front nav-icon"></i>
              <span class="nav-text">Transport Fleet</span>
            </a>
          </li>

          <div class="sidebar-section-title">GPS & Routing</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/transport/gps-tracking.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'gps-tracking.php') ? 'active' : ''; ?>">
              <i class="bi bi-geo-alt-fill nav-icon"></i>
              <span class="nav-text">Live GPS Tracking</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/transport/routes.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'routes.php') ? 'active' : ''; ?>">
              <i class="bi bi-diagram-3 nav-icon"></i>
              <span class="nav-text">Routes Directory</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/transport/stops.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'stops.php') ? 'active' : ''; ?>">
              <i class="bi bi-pin-map nav-icon"></i>
              <span class="nav-text">Pickup & Drop Stops</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/transport/student-route-allocation.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'student-route-allocation.php') ? 'active' : ''; ?>">
              <i class="bi bi-person-check nav-icon"></i>
              <span class="nav-text">Pupil Route Mapping</span>
            </a>
          </li>

          <div class="sidebar-section-title">Vehicles & Drivers</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/transport/drivers.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'drivers.php') ? 'active' : ''; ?>">
              <i class="bi bi-person-badge nav-icon"></i>
              <span class="nav-text">Drivers & KYC</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/transport/vehicle-directory.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'vehicle-directory.php') ? 'active' : ''; ?>">
              <i class="bi bi-truck nav-icon"></i>
              <span class="nav-text">Bus Fleet Registry (14)</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/transport/fuel-logs.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'fuel-logs.php') ? 'active' : ''; ?>">
              <i class="bi bi-fuel-pump nav-icon"></i>
              <span class="nav-text">Fuel & Service Logs</span>
            </a>
          </li>

        <?php elseif ($user_role_id === 'admission_officer'): ?>
          <!-- ================= ADMISSION OFFICER SIDEBAR ================= -->
          <div class="sidebar-section-title">Enrollment CRM</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/admission-officer.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'admission-officer.php') ? 'active' : ''; ?>">
              <i class="bi bi-person-plus nav-icon"></i>
              <span class="nav-text">Admissions Desk</span>
            </a>
          </li>

          <div class="sidebar-section-title">Lead Pipeline</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/admissions/online-enquiry.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'online-enquiry.php') ? 'active' : ''; ?>">
              <i class="bi bi-chat-left-dots nav-icon"></i>
              <span class="nav-text">Inquiries & Leads</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/admissions/online-applications.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'online-applications.php') ? 'active' : ''; ?>">
              <i class="bi bi-file-earmark-person nav-icon"></i>
              <span class="nav-text">Applications (180)</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/admissions/document-verification.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'document-verification.php') ? 'active' : ''; ?>">
              <i class="bi bi-patch-check nav-icon"></i>
              <span class="nav-text">Document Verification</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/admissions/merit-lists.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'merit-lists.php') ? 'active' : ''; ?>">
              <i class="bi bi-list-ol nav-icon"></i>
              <span class="nav-text">Merit Lists & Tokens</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/front-office/dashboard.php'); ?>" class="sidebar-nav-link <?php echo ($active_mod === 'front-office') ? 'active' : ''; ?>">
              <i class="bi bi-building nav-icon"></i>
              <span class="nav-text">Front Desk Visitors</span>
            </a>
          </li>

        <?php elseif ($user_role_id === 'librarian'): ?>
          <!-- ================= LIBRARIAN SIDEBAR ================= -->
          <div class="sidebar-section-title">Library Center</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/librarian.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'librarian.php') ? 'active' : ''; ?>">
              <i class="bi bi-book nav-icon"></i>
              <span class="nav-text">Library Dashboard</span>
            </a>
          </li>

          <div class="sidebar-section-title">Circulation & Catalog</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/library/issue-return.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'issue-return.php') ? 'active' : ''; ?>">
              <i class="bi bi-upc-scan nav-icon"></i>
              <span class="nav-text">Barcode Issue / Return</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/library/books-catalog.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'books-catalog.php') ? 'active' : ''; ?>">
              <i class="bi bi-journals nav-icon"></i>
              <span class="nav-text">Titles Catalog (18,450)</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/library/fines.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'fines.php') ? 'active' : ''; ?>">
              <i class="bi bi-exclamation-octagon nav-icon"></i>
              <span class="nav-text">Overdue Fines Desk</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/library/opac.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'opac.php') ? 'active' : ''; ?>">
              <i class="bi bi-search nav-icon"></i>
              <span class="nav-text">Digital OPAC Search</span>
            </a>
          </li>

        <?php elseif ($user_role_id === 'hr_manager'): ?>
          <!-- ================= HR MANAGER SIDEBAR ================= -->
          <div class="sidebar-section-title">HR & Staff Operations</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/hr-manager.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'hr-manager.php') ? 'active' : ''; ?>">
              <i class="bi bi-people nav-icon"></i>
              <span class="nav-text">HR Dashboard</span>
            </a>
          </li>

          <div class="sidebar-section-title">Staff Management</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/hr-payroll/staff-directory.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'staff-directory.php') ? 'active' : ''; ?>">
              <i class="bi bi-person-lines-fill nav-icon"></i>
              <span class="nav-text">Staff Service Books (122)</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/hr-payroll/biometric-attendance.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'biometric-attendance.php') ? 'active' : ''; ?>">
              <i class="bi bi-fingerprint nav-icon"></i>
              <span class="nav-text">Biometric Punch Logs</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/hr-payroll/leave-management.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'leave-management.php') ? 'active' : ''; ?>">
              <i class="bi bi-calendar2-range nav-icon"></i>
              <span class="nav-text">Leave Management (4)</span>
            </a>
          </li>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('modules/hr-payroll/payroll-processing.php'); ?>" class="sidebar-nav-link <?php echo ($active_sub === 'payroll-processing.php') ? 'active' : ''; ?>">
              <i class="bi bi-cash-stack nav-icon"></i>
              <span class="nav-text">Monthly Payroll Process</span>
            </a>
          </li>

        <?php else: ?>
          <!-- ================= SUPER ADMIN / MASTER ROOT SIDEBAR ================= -->
          <div class="sidebar-section-title">Master Executive Desk</div>
          <li class="sidebar-nav-item">
            <a href="<?php echo base_url('dashboards/admin.php'); ?>" class="sidebar-nav-link <?php echo ($active_mod === 'dashboard' && $active_sub === 'admin.php') ? 'active' : ''; ?>">
              <i class="bi bi-speedometer2 nav-icon"></i>
              <span class="nav-text">Super Admin Command</span>
            </a>
          </li>

          <!-- All 28 Core Modules Section for Super Admin -->
          <div class="sidebar-section-title">Core ERP Modules (28)</div>
          <?php foreach ($modules_registry as $mod): ?>
            <?php 
              $is_mod_active = ($active_mod === $mod['key']);
              $collapse_id = 'sub_' . str_replace('-', '_', $mod['key']);
            ?>
            <li class="sidebar-nav-item">
              <a class="sidebar-nav-link <?php echo $is_mod_active ? 'active' : ''; ?>" data-bs-toggle="collapse" href="#<?php echo $collapse_id; ?>" role="button" aria-expanded="<?php echo $is_mod_active ? 'true' : 'false'; ?>">
                <i class="bi <?php echo $mod['icon']; ?> nav-icon"></i>
                <span class="nav-text"><?php echo htmlspecialchars($mod['name']); ?></span>
                <i class="bi bi-chevron-right arrow-icon"></i>
              </a>
              <div class="collapse <?php echo $is_mod_active ? 'show' : ''; ?>" id="<?php echo $collapse_id; ?>">
                <ul class="sidebar-submenu">
                  <?php foreach ($mod['submodules'] as $sub): ?>
                    <?php $is_sub_active = ($is_mod_active && $active_sub === $sub['file']); ?>
                    <li>
                      <a href="<?php echo base_url('modules/' . $mod['key'] . '/' . $sub['file']); ?>" class="sub-link <?php echo $is_sub_active ? 'active' : ''; ?>" title="<?php echo htmlspecialchars($sub['title']); ?>">
                        <?php echo htmlspecialchars($sub['title']); ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </li>
          <?php endforeach; ?>

        <?php endif; ?>

        </ul>
      </div>

      <div class="sidebar-footer">
        <div class="user-quick-info">
          <div class="user-avatar-sm current-user-avatar"><?php echo htmlspecialchars($current_user['avatar']); ?></div>
          <div class="user-details-mini">
            <span class="user-name-mini current-user-name"><?php echo htmlspecialchars($current_user['name']); ?></span>
            <span class="user-role-badge-mini current-user-role"><?php echo htmlspecialchars($current_user['role']); ?></span>
          </div>
        </div>
        <a href="<?php echo base_url('login.php?logout=1'); ?>" class="btn btn-sm btn-outline-danger p-1 rounded-circle" title="Sign Out">
          <i class="bi bi-box-arrow-right"></i>
        </a>
      </div>
    </aside>
