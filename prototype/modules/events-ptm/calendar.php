<?php
/**
 * EDUSYS PRO - EVENT & PTM CALENDAR
 * Interactive institutional monthly master calendar, visual event scheduler,
 * and PTM time block coordinator for Delhi Public Global Academy.
 */
$page_title = "Event Calendar";
$page_desc = "Master Academic, Sports, Cultural & Parent-Teacher Meeting (PTM) Schedule for 2024-2025";
$active_module = "events-ptm";
$active_submodule = "calendar.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/events-ptm/calendar.php'); ?>">Events & PTM</a></li>
      <li class="breadcrumb-item active" aria-current="page">Event Calendar</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-calendar-event-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/events-ptm/ptm-meetings.php'); ?>" class="btn btn-light border" title="PTM Meeting Sessions">
      <i class="bi bi-people-fill me-1"></i> PTM Sessions
    </a>
    <a href="<?php echo base_url('modules/events-ptm/events.php'); ?>" class="btn btn-light border" title="Event Registry">
      <i class="bi bi-collection-play me-1"></i> All Events
    </a>
    <button class="btn btn-light border" onclick="EduTables.print()" title="Print Calendar Sheet">
      <i class="bi bi-printer me-1"></i> Print
    </button>
    <button class="btn btn-light border" onclick="EduTables.exportCSV('#mainDataTable', 'events_calendar_export.csv')" title="Export Events CSV">
      <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addNewRecordModal">
      <i class="bi bi-plus-lg me-1"></i> Schedule New Event / PTM
    </button>
  </div>
</div>

<!-- Domain KPI Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Events This Month</h6>
        <div class="kpi-value">14 Events</div>
        <div class="kpi-trend positive"><i class="bi bi-calendar-check"></i> 8 Academic / 6 Cultural</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-calendar3"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>PTM Sessions</h6>
        <div class="kpi-value">3 Meetings</div>
        <div class="kpi-trend positive"><i class="bi bi-people"></i> 1,380 Slots Booked</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-video3"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Parent RSVP Rate</h6>
        <div class="kpi-value">94.2%</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle-fill"></i> High Community Engagement</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-patch-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Annual Functions</h6>
        <div class="kpi-value">2 Upcoming</div>
        <div class="kpi-trend positive"><i class="bi bi-trophy-fill"></i> Sports Day & Annual Day</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-award-fill"></i></div>
    </div>
  </div>
</div>

<!-- Interactive Monthly Calendar Card -->
<div class="erp-card mb-4">
  <div class="erp-card-header d-flex align-items-center justify-content-between flex-wrap gap-3">
    <div class="d-flex align-items-center gap-3">
      <div class="btn-group">
        <button type="button" class="btn btn-sm btn-light border" onclick="alert('Viewing October 2024 Archive')"><i class="bi bi-chevron-left"></i></button>
        <button type="button" class="btn btn-sm btn-light border px-3 fw-bold">November 2024</button>
        <button type="button" class="btn btn-sm btn-light border" onclick="alert('Viewing December 2024 Schedule')"><i class="bi bi-chevron-right"></i></button>
      </div>
      <span class="badge bg-primary-subtle text-primary border border-primary border-opacity-25 font-size-12">
        Term 2 Academic Session 2024-25
      </span>
    </div>

    <!-- Category Filter Pills -->
    <div class="d-flex align-items-center gap-2 flex-wrap">
      <span class="badge bg-primary text-white font-size-11 px-2.5 py-1.5"><i class="bi bi-circle-fill font-size-8 me-1"></i> Academic & PTM</span>
      <span class="badge bg-success text-white font-size-11 px-2.5 py-1.5"><i class="bi bi-circle-fill font-size-8 me-1"></i> Sports</span>
      <span class="badge bg-warning text-dark font-size-11 px-2.5 py-1.5"><i class="bi bi-circle-fill font-size-8 me-1"></i> Cultural</span>
      <span class="badge bg-danger text-white font-size-11 px-2.5 py-1.5"><i class="bi bi-circle-fill font-size-8 me-1"></i> Holiday</span>
    </div>
  </div>

  <div class="p-4">
    <!-- Visual Month Grid -->
    <div class="table-responsive">
      <table class="table table-bordered text-center align-top mb-0" style="table-layout: fixed; min-width: 800px;">
        <thead class="bg-light">
          <tr class="font-size-12 text-uppercase text-muted fw-bold">
            <th class="py-2 text-danger">Sun</th>
            <th class="py-2">Mon</th>
            <th class="py-2">Tue</th>
            <th class="py-2">Wed</th>
            <th class="py-2">Thu</th>
            <th class="py-2">Fri</th>
            <th class="py-2">Sat</th>
          </tr>
        </thead>
        <tbody class="font-size-13">
          <!-- Week 1 -->
          <tr>
            <td class="p-2 text-muted bg-light bg-opacity-50" style="height: 105px;">
              <div class="text-end text-muted font-size-12 mb-1">27</div>
            </td>
            <td class="p-2 text-muted bg-light bg-opacity-50" style="height: 105px;">
              <div class="text-end text-muted font-size-12 mb-1">28</div>
            </td>
            <td class="p-2 text-muted bg-light bg-opacity-50" style="height: 105px;">
              <div class="text-end text-muted font-size-12 mb-1">29</div>
            </td>
            <td class="p-2 text-muted bg-light bg-opacity-50" style="height: 105px;">
              <div class="text-end text-muted font-size-12 mb-1">30</div>
            </td>
            <td class="p-2 text-muted bg-light bg-opacity-50" style="height: 105px;">
              <div class="text-end text-muted font-size-12 mb-1">31</div>
            </td>
            <td class="p-2 bg-danger-subtle bg-opacity-25" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1 text-danger">1</div>
              <div class="p-1 rounded bg-danger text-white font-size-10 text-truncate fw-semibold" title="Diwali Vacation Holiday">
                <i class="bi bi-star me-0.5"></i> Diwali Break
              </div>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">2</div>
              <div class="p-1 rounded bg-success-subtle text-success border border-success border-opacity-25 font-size-10 text-truncate fw-semibold" title="Sports Coaching Clinic">
                <i class="bi bi-trophy me-0.5"></i> Sports Clinic
              </div>
            </td>
          </tr>

          <!-- Week 2 -->
          <tr>
            <td class="p-2 bg-light bg-opacity-25" style="height: 105px;">
              <div class="text-end text-danger fw-bold font-size-12 mb-1">3</div>
              <small class="text-muted font-size-10 d-block">Sunday</small>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">4</div>
              <div class="p-1 rounded bg-light border font-size-10 text-truncate" title="Regular Assembly">
                Special Assembly
              </div>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">5</div>
              <div class="p-1 rounded bg-warning-subtle text-dark border border-warning border-opacity-25 font-size-10 text-truncate fw-semibold" title="Inter-House Debate Championship">
                <i class="bi bi-mic me-0.5"></i> House Debate
              </div>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">6</div>
              <div class="p-1 rounded bg-light border font-size-10 text-truncate">
                Pre-Board Lab Prep
              </div>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">7</div>
              <div class="p-1 rounded bg-light border font-size-10 text-truncate">
                Teacher Council
              </div>
            </td>
            <td class="p-2 bg-primary-subtle bg-opacity-25" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1 text-primary">8</div>
              <div class="p-1 rounded bg-primary text-white font-size-10 text-truncate fw-bold shadow-sm" title="Class 10 & 12 Board PTM">
                <i class="bi bi-people me-0.5"></i> Board PTM (10&12)
              </div>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">9</div>
              <div class="p-1 rounded bg-success-subtle text-success border border-success border-opacity-25 font-size-10 text-truncate fw-semibold" title="Cricket Inter-School Match">
                <i class="bi bi-dribbble me-0.5"></i> Cricket Match
              </div>
            </td>
          </tr>

          <!-- Week 3 -->
          <tr>
            <td class="p-2 bg-light bg-opacity-25" style="height: 105px;">
              <div class="text-end text-danger fw-bold font-size-12 mb-1">10</div>
              <small class="text-muted font-size-10 d-block">Sunday</small>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">11</div>
              <div class="p-1 rounded bg-primary-subtle text-primary border border-primary border-opacity-25 font-size-10 text-truncate fw-semibold" title="National Education Day Exhibition">
                <i class="bi bi-book me-0.5"></i> Education Day
              </div>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">12</div>
              <div class="p-1 rounded bg-light border font-size-10 text-truncate">
                Maths Olympiad
              </div>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">13</div>
              <div class="p-1 rounded bg-light border font-size-10 text-truncate">
                Carnival Rehearsal
              </div>
            </td>
            <td class="p-2 bg-warning-subtle bg-opacity-25" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1 text-warning-emphasis">14</div>
              <div class="p-1 rounded bg-warning text-dark font-size-10 text-truncate fw-bold shadow-sm" title="Children's Day Gala Carnival">
                <i class="bi bi-balloon me-0.5"></i> Children's Day Gala
              </div>
            </td>
            <td class="p-2 bg-danger-subtle bg-opacity-25" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1 text-danger">15</div>
              <div class="p-1 rounded bg-danger text-white font-size-10 text-truncate fw-semibold" title="Guru Nanak Jayanti Holiday">
                <i class="bi bi-moon me-0.5"></i> Guru Nanak Jayanti
              </div>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">16</div>
              <div class="p-1 rounded bg-success-subtle text-success border border-success border-opacity-25 font-size-10 text-truncate fw-semibold" title="House March Past Practice">
                <i class="bi bi-flag me-0.5"></i> March Past Drill
              </div>
            </td>
          </tr>

          <!-- Week 4 -->
          <tr>
            <td class="p-2 bg-light bg-opacity-25" style="height: 105px;">
              <div class="text-end text-danger fw-bold font-size-12 mb-1">17</div>
              <small class="text-muted font-size-10 d-block">Sunday</small>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">18</div>
              <div class="p-1 rounded bg-primary-subtle text-primary border border-primary border-opacity-25 font-size-10 text-truncate fw-semibold" title="Science Centre Educational Trip">
                <i class="bi bi-bus-front me-0.5"></i> Science Trip (Cl 6-8)
              </div>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">19</div>
              <div class="p-1 rounded bg-light border font-size-10 text-truncate">
                Language Workshop
              </div>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">20</div>
              <div class="p-1 rounded bg-light border font-size-10 text-truncate">
                Sports Heats Day 1
              </div>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">21</div>
              <div class="p-1 rounded bg-light border font-size-10 text-truncate">
                Sports Heats Day 2
              </div>
            </td>
            <td class="p-2 bg-success-subtle bg-opacity-25" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1 text-success">22</div>
              <div class="p-1 rounded bg-success text-white font-size-10 text-truncate fw-bold shadow-sm" title="Annual Sports Day 2024">
                <i class="bi bi-trophy me-0.5"></i> Annual Sports Day!
              </div>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">23</div>
              <div class="p-1 rounded bg-light border font-size-10 text-truncate">
                Rest & Recovery
              </div>
            </td>
          </tr>

          <!-- Week 5 -->
          <tr>
            <td class="p-2 bg-light bg-opacity-25" style="height: 105px;">
              <div class="text-end text-danger fw-bold font-size-12 mb-1">24</div>
              <small class="text-muted font-size-10 d-block">Sunday</small>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">25</div>
              <div class="p-1 rounded bg-light border font-size-10 text-truncate">
                Periodic Test Review
              </div>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">26</div>
              <div class="p-1 rounded bg-warning-subtle text-dark border border-warning border-opacity-25 font-size-10 text-truncate fw-semibold" title="Constitution Day Special Assembly">
                <i class="bi bi-book me-0.5"></i> Constitution Day
              </div>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">27</div>
              <div class="p-1 rounded bg-light border font-size-10 text-truncate">
                Parent Slot Bookings
              </div>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">28</div>
              <div class="p-1 rounded bg-light border font-size-10 text-truncate">
                PTM Room Allocations
              </div>
            </td>
            <td class="p-2 bg-primary-subtle bg-opacity-25" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1 text-primary">29</div>
              <div class="p-1 rounded bg-primary text-white font-size-10 text-truncate fw-bold shadow-sm" title="Comprehensive Term 1 PTM (All Classes)">
                <i class="bi bi-people-fill me-0.5"></i> All-Wing Term PTM
              </div>
            </td>
            <td class="p-2" style="height: 105px;">
              <div class="text-end fw-bold font-size-12 mb-1">30</div>
              <div class="p-1 rounded bg-info-subtle text-info border border-info border-opacity-25 font-size-10 text-truncate fw-semibold" title="Robotics & AI Olympiad">
                <i class="bi bi-cpu me-0.5"></i> Robotics Olympiad
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Spotlight Split Row: Next Upcoming Major Event Spotlight -->
<div class="row g-4 mb-4">
  <div class="col-lg-8">
    <div class="p-4 rounded-3 border bg-white shadow-sm d-flex align-items-center justify-content-between flex-wrap gap-4">
      <div class="d-flex align-items-center gap-3">
        <div class="p-3 rounded-3 bg-success-subtle text-success font-size-28">
          <i class="bi bi-trophy-fill"></i>
        </div>
        <div>
          <span class="badge bg-success-subtle text-success border border-success border-opacity-25 font-size-11 mb-1">
            Major Annual Flagship Event
          </span>
          <h5 class="fw-bold text-dark mb-1">24th Annual Athletics Championship & Sports Day 2024</h5>
          <p class="text-muted font-size-13 mb-0">
            <i class="bi bi-geo-alt text-danger me-1"></i> Main Athletic Stadium Ground &bull; <i class="bi bi-clock text-primary me-1"></i> Friday, 22 Nov 2024 (08:30 AM to 02:00 PM)
          </p>
        </div>
      </div>
      <div class="d-flex align-items-center gap-2">
        <a href="<?php echo base_url('modules/events-ptm/sports-day.php'); ?>" class="btn btn-outline-success font-size-13 fw-semibold">
          View Event Roster <i class="bi bi-arrow-right ms-1"></i>
        </a>
        <button class="btn btn-success fw-bold font-size-13" onclick="alert('Digital pass generated for Annual Sports Day!')">
          <i class="bi bi-ticket-perforated me-1"></i> Get Parent Pass
        </button>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="p-4 rounded-3 border bg-white shadow-sm h-100">
      <div class="d-flex align-items-center justify-content-between mb-2">
        <h6 class="fw-bold text-dark mb-0"><i class="bi bi-chat-heart text-primary me-1"></i> Next PTM Round</h6>
        <span class="badge bg-primary-subtle text-primary font-size-11">Friday, 29 Nov</span>
      </div>
      <div class="fw-semibold text-dark font-size-14 mb-1">Term 1 Comprehensive PTM (Classes Nursery to 12)</div>
      <small class="text-muted d-block font-size-12 mb-3">1,480 Total Meeting Slots &bull; 1,380 Slots Booked by Parents</small>
      <div class="progress mb-2" style="height: 7px;">
        <div class="progress-bar bg-primary" style="width: 93.2%;"></div>
      </div>
      <div class="d-flex justify-content-between font-size-11 text-muted">
        <span>93.2% Booked</span>
        <a href="<?php echo base_url('modules/events-ptm/parent-booking.php'); ?>" class="text-primary fw-semibold">Book Slots &rarr;</a>
      </div>
    </div>
  </div>
</div>

<!-- Domain Table Filter Bar -->
<div class="table-filter-bar mb-3">
  <div class="table-filter-left">
    <div class="table-search-input">
      <i class="bi bi-search"></i>
      <input type="text" class="form-control" id="tableSearchInput" placeholder="Search event title, venue, coordinator...">
    </div>
    <select class="form-select" style="max-width: 200px;">
      <option selected>All Event Categories</option>
      <option>Parent-Teacher Meeting (PTM)</option>
      <option>Sports & Athletics</option>
      <option>Cultural & Performing Arts</option>
      <option>Academic Exhibition & Olympiad</option>
      <option>School Excursion & Trip</option>
      <option>Gazetted Holiday</option>
    </select>
    <select class="form-select" style="max-width: 150px;">
      <option selected>All Status</option>
      <option>Confirmed</option>
      <option>Slots Open</option>
      <option>In Progress</option>
      <option>Holiday</option>
      <option>Completed</option>
    </select>
  </div>
  <div class="table-filter-right">
    <span class="font-size-13 text-muted">Showing <strong class="table-visible-count text-primary">8</strong> verified records</span>
  </div>
</div>

<!-- Domain Data Table -->
<div class="erp-table-responsive mb-0">
  <table class="erp-table" id="mainDataTable">
    <thead>
      <tr>
        <th>Event Code</th>
        <th>Event Title & Theme</th>
        <th>Event Category</th>
        <th>Target Wing / Audience</th>
        <th>Venue & Location</th>
        <th>Faculty Coordinator</th>
        <th>Event Date & Time</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-1108</td>
        <td>
          <div class="fw-semibold text-dark">Class 10 & 12 Pre-Board Diagnostic PTM</div>
          <small class="text-muted font-size-11">Term 1 Assessment Review & Board Roadmap</small>
        </td>
        <td><span class="badge bg-primary-subtle text-primary border border-primary border-opacity-25 font-size-12">PTM Session</span></td>
        <td><small class="text-dark">Secondary & Sr Sec Wings</small></td>
        <td><small class="text-muted font-mono font-size-12">Rooms 201 to 216</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Dean Academics</span></td>
        <td><small class="text-muted">08 Nov 2024 (08:30 AM)</small></td>
        <td><span class="badge-status badge-active">Slots Open</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>

      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-1114</td>
        <td>
          <div class="fw-semibold text-dark">Children's Day Gala Carnival 2024</div>
          <small class="text-muted font-size-11">Magic Show, Fun Fair, Games & Music</small>
        </td>
        <td><span class="badge bg-warning-subtle text-dark border border-warning border-opacity-25 font-size-12">Cultural Carnival</span></td>
        <td><small class="text-dark">All Students & Parents</small></td>
        <td><small class="text-muted font-mono font-size-12">Central School Grounds</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Cultural Committee</span></td>
        <td><small class="text-muted">14 Nov 2024 (09:00 AM)</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>

      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-1118</td>
        <td>
          <div class="fw-semibold text-dark">National Science Centre Eco-Excursion</div>
          <small class="text-muted font-size-11">Interactive Science & Planetarium Demonstrations</small>
        </td>
        <td><span class="badge bg-info-subtle text-info border border-info border-opacity-25 font-size-12">School Excursion</span></td>
        <td><small class="text-dark">Middle Wing (Classes 6-8)</small></td>
        <td><small class="text-muted font-mono font-size-12">National Science Centre, Pragati</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">HOD Science</span></td>
        <td><small class="text-muted">18 Nov 2024 (08:00 AM)</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>

      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-1122</td>
        <td>
          <div class="fw-semibold text-dark">24th Annual Athletics Championship 2024</div>
          <small class="text-muted font-size-11">Track & Field, Relays, March Past & Medals</small>
        </td>
        <td><span class="badge bg-success-subtle text-success border border-success border-opacity-25 font-size-12">Sports & Athletics</span></td>
        <td><small class="text-dark">All 4 Student Houses</small></td>
        <td><small class="text-muted font-mono font-size-12">Main Athletic Stadium Ground</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Director Physical Ed</span></td>
        <td><small class="text-muted">22 Nov 2024 (08:30 AM)</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>

      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-1129</td>
        <td>
          <div class="fw-semibold text-dark">Term 1 Comprehensive PTM (Nursery to 12)</div>
          <small class="text-muted font-size-11">Full Academic Progress & Report Cards</small>
        </td>
        <td><span class="badge bg-primary-subtle text-primary border border-primary border-opacity-25 font-size-12">PTM Session</span></td>
        <td><small class="text-dark">All Students & Parents</small></td>
        <td><small class="text-muted font-mono font-size-12">All 48 Classrooms</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Principal & HODs</span></td>
        <td><small class="text-muted">29 Nov 2024 (08:30 AM)</small></td>
        <td><span class="badge-status badge-active">Slots Open</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>

      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-1130</td>
        <td>
          <div class="fw-semibold text-dark">Inter-School Robotics & AI Olympiad</div>
          <small class="text-muted font-size-11">STEM Innovation, Autonomous Bot Challenges</small>
        </td>
        <td><span class="badge bg-info-subtle text-info border border-info border-opacity-25 font-size-12">Academic Olympiad</span></td>
        <td><small class="text-dark">Classes 8 to 12 Teams</small></td>
        <td><small class="text-muted font-mono font-size-12">Atal Tinkering Lab & Aud 2</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">HOD Computer Science</span></td>
        <td><small class="text-muted">30 Nov 2024 (10:00 AM)</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>

      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-1105</td>
        <td>
          <div class="fw-semibold text-dark">Inter-House Parliamentary Debate</div>
          <small class="text-muted font-size-11">Topic: AI Governance in Modern Society</small>
        </td>
        <td><span class="badge bg-warning-subtle text-dark border border-warning border-opacity-25 font-size-12">Cultural Debate</span></td>
        <td><small class="text-dark">Secondary Wing (Grades 9-10)</small></td>
        <td><small class="text-muted font-mono font-size-12">School Amphitheater</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Literary Club Mentor</span></td>
        <td><small class="text-muted">05 Nov 2024 (11:00 AM)</small></td>
        <td><span class="badge-status badge-active">Confirmed</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>

      <tr>
        <td class="fw-bold text-primary font-mono font-size-13">EVT-2024-1115</td>
        <td>
          <div class="fw-semibold text-dark">Guru Nanak Jayanti (Gazetted Holiday)</div>
          <small class="text-muted font-size-11">School Closed for All Classes</small>
        </td>
        <td><span class="badge bg-danger-subtle text-danger border border-danger border-opacity-25 font-size-12">Gazetted Holiday</span></td>
        <td><small class="text-dark">All Staff & Students</small></td>
        <td><small class="text-muted font-mono font-size-12">Campus Closed</small></td>
        <td><span class="badge bg-light text-primary border font-size-12">Administration</span></td>
        <td><small class="text-muted">15 Nov 2024 (All Day)</small></td>
        <td><span class="badge-status badge-inactive">Holiday</span></td>
        <td class="text-center">
          <div class="action-btn-group justify-content-center">
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
            <button class="action-btn action-delete" onclick="EduTables.deleteRow(this, 'Event')" title="Delete"><i class="bi bi-trash"></i></button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
