<?php
/**
 * EDUSYS PRO - Student Personal Portal
 * Dedicated view for Student: Aarav Sharma (Class 10-A, Roll #1014)
 */
$page_title = "Student Personal Portal";
$page_desc = "Dedicated learner dashboard for Aarav Sharma (Class 10-A, Roll #1014).";
$active_module = "dashboard";
$active_submodule = "student.php";
$depth = 1;

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/sidebar.php';
require_once __DIR__ . '/../includes/topbar.php';
?>

<!-- Student Profile Banner -->
<div class="erp-card mb-4 bg-gradient text-dark border-primary border-opacity-25 shadow-xs" style="background: linear-gradient(135deg, #eff6ff 0%, #f0fdf4 100%);">
  <div class="erp-card-body p-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div class="d-flex align-items-center gap-3">
        <div class="avatar-lg rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold font-size-24" style="width: 60px; height: 60px;">
          AS
        </div>
        <div>
          <div class="d-flex align-items-center gap-2 mb-1">
            <h4 class="fw-bold text-dark mb-0">Aarav Sharma</h4>
            <span class="badge bg-primary text-white font-size-12 px-2.5 py-1 rounded-pill">Class 10-A</span>
            <span class="badge bg-success-subtle text-success border border-success border-opacity-25 font-size-11">Roll #1014</span>
          </div>
          <div class="font-size-13 text-muted">
            <span>Admission No: <strong class="text-dark font-mono">ADM-2021-0842</strong></span>
            <span class="mx-2">•</span>
            <span>Class Teacher: <strong class="text-dark">Vikram Rathore (PGT)</strong></span>
            <span class="mx-2">•</span>
            <span>House: <span class="badge bg-danger text-white font-size-11">Tagore House</span></span>
          </div>
        </div>
      </div>
      <div class="d-flex align-items-center gap-2">
        <a href="<?php echo base_url('modules/examinations/cce-marks-entry.php'); ?>" class="btn btn-primary btn-sm fw-bold px-3 py-2 rounded-pill">
          <i class="bi bi-file-earmark-pdf me-1"></i> View CBSE Report Card
        </a>
        <a href="<?php echo base_url('modules/transport/gps-tracking.php'); ?>" class="btn btn-outline-primary btn-sm fw-bold px-3 py-2 rounded-pill">
          <i class="bi bi-bus-front me-1"></i> Track My Bus #12
        </a>
      </div>
    </div>
  </div>
</div>

<!-- KPI Row: Personalized for Student -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>My Attendance (YTD)</h6>
        <div class="kpi-value text-success">95.9%</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle"></i> 188 / 196 Days (Safe)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Term 1 Performance</h6>
        <div class="kpi-value text-primary">9.8 CGPA</div>
        <div class="kpi-trend positive"><i class="bi bi-award-fill"></i> Grade A1 • Class Rank #2</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-mortarboard-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Pending Tasks & HW</h6>
        <div class="kpi-value text-info">2 Due</div>
        <div class="kpi-trend"><i class="bi bi-clock-history"></i> Physics Lab & Math Ex 4.2</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-journal-check"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Fee Balance Status</h6>
        <div class="kpi-value text-success">₹0.00</div>
        <div class="kpi-trend positive"><i class="bi bi-patch-check-fill"></i> Paid in Full (Term 1)</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-credit-card-2-front-fill"></i></div>
    </div>
  </div>
</div>

<!-- Class Timetable & Today's Schedule -->
<div class="row g-4 mb-4">
  <div class="col-lg-8">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-calendar3-week text-primary"></i> Today's Schedule (Wednesday • Class 10-A)</h5>
        <span class="badge bg-primary text-white font-size-12 px-2.5 py-1">5 Periods Today</span>
      </div>
      <div class="erp-table-responsive">
        <table class="erp-table">
          <thead>
            <tr>
              <th>Period</th>
              <th>Timing</th>
              <th>Subject</th>
              <th>Teacher</th>
              <th>Room</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>Period 1</strong></td>
              <td class="font-mono font-size-12">08:00 - 08:45 AM</td>
              <td><span class="fw-bold text-primary">041 • Mathematics</span></td>
              <td>Vikram Rathore</td>
              <td>Room 204</td>
              <td><span class="badge bg-success-subtle text-success">Completed</span></td>
            </tr>
            <tr>
              <td><strong>Period 2</strong></td>
              <td class="font-mono font-size-12">08:45 - 09:30 AM</td>
              <td><span class="fw-bold text-info">086 • Physics</span></td>
              <td>Vikram Rathore</td>
              <td>Physics Lab 2</td>
              <td><span class="badge bg-success-subtle text-success">Completed</span></td>
            </tr>
            <tr class="table-primary bg-primary bg-opacity-10">
              <td><strong>Period 3</strong></td>
              <td class="font-mono font-size-12 fw-bold text-primary">09:45 - 10:30 AM</td>
              <td><span class="fw-bold text-dark">086 • Chemistry</span></td>
              <td>Dr. Meenakshi S.</td>
              <td>Chem Lab 1</td>
              <td><span class="badge bg-primary text-white"><i class="bi bi-record-circle-fill me-1"></i> Happening Now</span></td>
            </tr>
            <tr>
              <td><strong>Period 4</strong></td>
              <td class="font-mono font-size-12">10:30 - 11:15 AM</td>
              <td><span class="fw-bold text-dark">184 • English Language</span></td>
              <td>Pooja Verma</td>
              <td>Room 204</td>
              <td><span class="badge bg-light text-muted border">Upcoming</span></td>
            </tr>
            <tr>
              <td><strong>Period 5</strong></td>
              <td class="font-mono font-size-12">11:15 - 12:00 PM</td>
              <td><span class="fw-bold text-dark">085 • Hindi Course-B</span></td>
              <td>Rajesh Dwivedi</td>
              <td>Room 204</td>
              <td><span class="badge bg-light text-muted border">Upcoming</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Live Bus GPS & School Route Status -->
  <div class="col-lg-4">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-bus-front text-warning"></i> My Route (Bus #12)</h5>
        <span class="badge bg-success text-white font-size-11">Live Tracking</span>
      </div>
      <div class="erp-card-body">
        <div class="p-3 bg-light rounded-3 border mb-3">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="text-muted font-size-12">Vehicle No:</span>
            <strong class="font-mono text-dark">DL-1PC-4819</strong>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="text-muted font-size-12">Driver:</span>
            <strong class="text-dark">Ramesh Yadav</strong>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="text-muted font-size-12">Current Speed:</span>
            <span class="badge bg-success font-size-12">38 km/h</span>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <span class="text-muted font-size-12">My Pick/Drop Stop:</span>
            <strong class="text-primary">Sector 62 (Metro Gate 2)</strong>
          </div>
        </div>

        <div class="d-flex align-items-center gap-2 p-2.5 bg-success bg-opacity-10 border border-success border-opacity-25 rounded-3 mb-3">
          <i class="bi bi-check-circle-fill text-success font-size-18"></i>
          <span class="font-size-12 text-dark">Morning Picked Up at <strong>07:22 AM</strong>. In Campus safely.</span>
        </div>

        <a href="<?php echo base_url('modules/transport/gps-tracking.php'); ?>" class="btn btn-outline-warning text-dark btn-sm w-100 fw-bold">
          <i class="bi bi-geo-alt-fill me-1"></i> Open Live Route Map &rarr;
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Term 1 CBSE CCE Marks Summary & Homework Desk -->
<div class="row g-4 mb-4">
  <div class="col-lg-7">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-award text-success"></i> My CBSE CCE Grade Card (Term 1 Official)</h5>
        <span class="badge bg-success-subtle text-success border border-success border-opacity-25 font-size-12">Aggregate: 93.8% (A1)</span>
      </div>
      <div class="erp-table-responsive">
        <table class="erp-table text-center">
          <thead>
            <tr>
              <th class="text-start">Subject</th>
              <th>Theory (80)</th>
              <th>Internal (20)</th>
              <th>Total (100)</th>
              <th>Grade</th>
              <th>Points</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-start fw-bold">041 • Mathematics Std</td>
              <td>76</td>
              <td>19</td>
              <td class="fw-bold text-success">95</td>
              <td><span class="badge bg-success">A1</span></td>
              <td>10.0</td>
            </tr>
            <tr>
              <td class="text-start fw-bold">086 • Science & Tech</td>
              <td>72</td>
              <td>18</td>
              <td class="fw-bold text-success">90</td>
              <td><span class="badge bg-success">A2</span></td>
              <td>9.0</td>
            </tr>
            <tr>
              <td class="text-start fw-bold">087 • Social Science</td>
              <td>75</td>
              <td>19</td>
              <td class="fw-bold text-success">94</td>
              <td><span class="badge bg-success">A1</span></td>
              <td>10.0</td>
            </tr>
            <tr>
              <td class="text-start fw-bold">184 • English Lang & Lit</td>
              <td>78</td>
              <td>20</td>
              <td class="fw-bold text-success">98</td>
              <td><span class="badge bg-success">A1</span></td>
              <td>10.0</td>
            </tr>
            <tr>
              <td class="text-start fw-bold">085 • Hindi Course-B</td>
              <td>74</td>
              <td>18</td>
              <td class="fw-bold text-success">92</td>
              <td><span class="badge bg-success">A1</span></td>
              <td>10.0</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Pending Assignments & Homework Submissions -->
  <div class="col-lg-5">
    <div class="erp-card h-100">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-list-task text-danger"></i> Homework & Digital Assignments</h5>
        <span class="badge bg-danger text-white font-size-11">2 Pending</span>
      </div>
      <div class="erp-card-body p-0">
        <div class="list-group list-group-flush font-size-13">
          <div class="list-group-item p-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <strong class="text-dark">Physics Lab Practical Record</strong>
              <span class="badge bg-warning text-dark font-size-11">Due Friday</span>
            </div>
            <p class="text-muted font-size-12 mb-2">Ohm's law verification readings and V-I graph plot.</p>
            <button class="btn btn-primary btn-sm font-size-12 py-1 px-3 fw-semibold">
              <i class="bi bi-upload me-1"></i> Submit PDF
            </button>
          </div>
          <div class="list-group-item p-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <strong class="text-dark">Math Quadratic Equations (Ex 4.2)</strong>
              <span class="badge bg-warning text-dark font-size-11">Due Monday</span>
            </div>
            <p class="text-muted font-size-12 mb-2">Solve questions 1 through 10 with step-by-step factorization.</p>
            <button class="btn btn-outline-primary btn-sm font-size-12 py-1 px-3 fw-semibold">
              <i class="bi bi-upload me-1"></i> Submit PDF
            </button>
          </div>
          <div class="list-group-item p-3 bg-light">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <span class="text-muted">English Essay: Sustainable Energy</span>
              <span class="badge bg-success text-white font-size-11"><i class="bi bi-check2"></i> Graded: 19/20</span>
            </div>
            <small class="text-success font-size-11">Reviewed by Pooja Verma • Excellent analysis.</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
