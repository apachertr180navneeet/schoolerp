<?php
/**
 * EDUSYS PRO - School Profile Module
 * Institutional master information, statutory affiliations, campus infrastructure, governance & document vault
 */
$page_title = "School Profile";
$page_desc = "Institutional master identity, statutory affiliations, campus infrastructure & leadership records";
$active_module = "administration";
$active_submodule = "school-profile.php";
$depth = 2;
$hide_common_modals = true; // Use tailored profile modals

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
      <li class="breadcrumb-item">Administration</li>
      <li class="breadcrumb-item active" aria-current="page">School Profile</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-building-fill-gear text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="window.print()" title="Print Institutional Factsheet">
      <i class="bi bi-printer me-1"></i> Print Dossier
    </button>
    <button class="btn btn-light border" onclick="exportProfileJSON()" title="Export Institutional Data">
      <i class="bi bi-download me-1"></i> Export Factsheet
    </button>
    <button class="btn btn-outline-danger border" onclick="resetProfileDefaults()" title="Reset to Sample Defaults">
      <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Defaults
    </button>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editGeneralModal">
      <i class="bi bi-pencil-square me-1"></i> Edit School Profile
    </button>
  </div>
</div>

<!-- Institutional Overview Hero Card -->
<div class="profile-hero-card">
  <div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center justify-content-between gap-4">
    <div class="d-flex align-items-center gap-3">
      <div class="profile-crest-wrapper" id="displayCrestBox">
        <span id="displayCrestInitials"><?php echo htmlspecialchars($school_config['short_name']); ?></span>
        <div class="crest-badge" title="Affiliated & Verified Institution"><i class="bi bi-check-lg"></i></div>
      </div>
      <div>
        <div class="d-flex flex-wrap align-items-center gap-2 mb-1">
          <h2 class="h4 fw-bold mb-0 text-main" id="displaySchoolName"><?php echo htmlspecialchars($school_config['name']); ?></h2>
          <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1 rounded-pill font-size-12 fw-semibold" id="displayBoardBadge">
            <i class="bi bi-shield-check me-1"></i> CBSE Affiliated (K-12)
          </span>
          <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 rounded-pill font-size-12 fw-semibold">
            <i class="bi bi-patch-check-fill me-1"></i> Active & Compliant
          </span>
          <span class="badge bg-light text-muted border font-size-12">
            <i class="bi bi-calendar3 me-1"></i> Est. <span id="displayEstYear">1998</span>
          </span>
        </div>
        <p class="text-muted mb-2 fst-italic font-size-14" id="displayTagline">"<?php echo htmlspecialchars($school_config['tagline']); ?>"</p>
        <div class="d-flex flex-wrap align-items-center gap-3 text-muted font-size-13">
          <span><i class="bi bi-award text-primary me-1"></i> Affil No: <strong class="text-main" id="displayAffilNo">2130892</strong></span>
          <span class="text-silver">•</span>
          <span><i class="bi bi-hash text-primary me-1"></i> School Code: <strong class="text-main" id="displaySchoolCode">70142</strong></span>
          <span class="text-silver">•</span>
          <span><i class="bi bi-qr-code text-primary me-1"></i> U-DISE+ Code: <strong class="text-main" id="displayUdise">07010401824</strong></span>
          <span class="text-silver">•</span>
          <span><i class="bi bi-geo-alt text-danger me-1"></i> <span id="displayCityState">Knowledge City, New Delhi</span></span>
        </div>
      </div>
    </div>

    <!-- Quick Action / Completeness Meter -->
    <div class="d-flex flex-column align-items-lg-end gap-2 w-100 w-lg-auto">
      <div class="d-flex align-items-center gap-2">
        <span class="font-size-12 text-muted fw-semibold">Profile Completeness:</span>
        <span class="badge bg-success text-white fw-bold">98%</span>
      </div>
      <div class="progress" style="width: 180px; height: 6px;">
        <div class="progress-bar bg-success" role="progressbar" style="width: 98%" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="d-flex gap-2 mt-2">
        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#changeCrestModal">
          <i class="bi bi-camera me-1"></i> Change Crest
        </button>
        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#uploadVaultDocModal">
          <i class="bi bi-cloud-arrow-up me-1"></i> Add Document
        </button>
      </div>
    </div>
  </div>
</div>

<!-- KPI Metric Cards Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Affiliation & Board</h6>
        <div class="kpi-value">CBSE K-12</div>
        <div class="kpi-trend positive"><i class="bi bi-check-circle-fill"></i> Valid till 2029</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-patch-check-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Campus Acreage</h6>
        <div class="kpi-value" id="kpiCampusArea">14.5 Acres</div>
        <div class="kpi-trend positive"><i class="bi bi-building-check"></i> 185k sq.ft Built</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-buildings-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Student Capacity</h6>
        <div class="kpi-value"><span id="kpiEnrolled">2,840</span> <span class="font-size-14 text-muted fw-normal">/ 3,200</span></div>
        <div class="kpi-trend positive"><i class="bi bi-people-fill"></i> 88.75% Utilized</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-mortarboard-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Faculty & Ratio</h6>
        <div class="kpi-value" id="kpiFaculty">148 Faculty</div>
        <div class="kpi-trend neutral"><i class="bi bi-person-check-fill"></i> 1:19 Teacher-Student</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-video3"></i></div>
    </div>
  </div>
</div>

<!-- Profile Tabs Navigation -->
<ul class="nav profile-pill-tabs" id="profileTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="tab-general-btn" data-bs-toggle="tab" data-bs-target="#tab-general" type="button" role="tab">
      <i class="bi bi-info-circle"></i> General & Identity
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="tab-affiliation-btn" data-bs-toggle="tab" data-bs-target="#tab-affiliation" type="button" role="tab">
      <i class="bi bi-shield-check"></i> Affiliation & Compliance
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="tab-campus-btn" data-bs-toggle="tab" data-bs-target="#tab-campus" type="button" role="tab">
      <i class="bi bi-building"></i> Campus & Facilities
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="tab-leadership-btn" data-bs-toggle="tab" data-bs-target="#tab-leadership" type="button" role="tab">
      <i class="bi bi-people"></i> Leadership & SMC
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="tab-contact-btn" data-bs-toggle="tab" data-bs-target="#tab-contact" type="button" role="tab">
      <i class="bi bi-telephone"></i> Contact & Communication
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="tab-banking-btn" data-bs-toggle="tab" data-bs-target="#tab-banking" type="button" role="tab">
      <i class="bi bi-bank"></i> Banking & Statutory IDs
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="tab-vault-btn" data-bs-toggle="tab" data-bs-target="#tab-vault" type="button" role="tab">
      <i class="bi bi-folder-check"></i> Document Vault <span class="badge bg-primary rounded-pill font-size-11 ms-1" id="vaultDocCountBadge">8</span>
    </button>
  </li>
</ul>

<!-- Tab Content Area -->
<div class="tab-content" id="profileTabContent">

  <!-- ================= TAB 1: GENERAL & IDENTITY ================= -->
  <div class="tab-pane fade show active" id="tab-general" role="tabpanel">
    <div class="row g-4">
      <div class="col-lg-8">
        <!-- Basic Identity Information Card -->
        <div class="erp-card">
          <div class="erp-card-header">
            <h5 class="erp-card-title"><i class="bi bi-card-heading text-primary"></i> Basic Institutional Information</h5>
            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editGeneralModal">
              <i class="bi bi-pencil me-1"></i> Edit Details
            </button>
          </div>
          <div class="erp-card-body">
            <div class="row g-3">
              <div class="col-md-6 info-field-group">
                <div class="info-field-label"><i class="bi bi-bank"></i> Full Legal Institutional Name</div>
                <div class="info-field-value text-primary fw-bold" id="fieldSchoolFullName">Delhi Public Global Academy</div>
              </div>
              <div class="col-md-6 info-field-group">
                <div class="info-field-label"><i class="bi bi-tag"></i> Institutional Acronym / Short Name</div>
                <div class="info-field-value font-mono" id="fieldSchoolShortName">DPGA</div>
              </div>
              <div class="col-md-6 info-field-group">
                <div class="info-field-label"><i class="bi bi-diagram-3"></i> Managing Society / Trust Name</div>
                <div class="info-field-value" id="fieldTrustName">Vidya Mandir Educational & Charitable Trust</div>
              </div>
              <div class="col-md-6 info-field-group">
                <div class="info-field-label"><i class="bi bi-hash"></i> Society / Trust Registration Number</div>
                <div class="info-field-value font-mono" id="fieldTrustRegNo">REG/TR/1997/DELHI/4829</div>
              </div>
              <div class="col-md-6 info-field-group">
                <div class="info-field-label"><i class="bi bi-calendar-check"></i> Year of Foundation / Establishment</div>
                <div class="info-field-value" id="fieldFoundationYear">1998 (Silver Jubilee Accredited)</div>
              </div>
              <div class="col-md-6 info-field-group">
                <div class="info-field-label"><i class="bi bi-building-gear"></i> Institution Category / Management Type</div>
                <div class="info-field-value" id="fieldSchoolCategory">Private Unaided / Non-Proprietary Educational Society</div>
              </div>
              <div class="col-md-6 info-field-group">
                <div class="info-field-label"><i class="bi bi-gender-ambiguous"></i> Gender Composition</div>
                <div class="info-field-value"><span class="badge bg-light text-primary border">Co-Educational (Boys & Girls)</span></div>
              </div>
              <div class="col-md-6 info-field-group">
                <div class="info-field-label"><i class="bi bi-translate"></i> Medium of Instruction</div>
                <div class="info-field-value" id="fieldMedium">English (Primary), Hindi & Sanskrit (Secondary Languages)</div>
              </div>
              <div class="col-md-6 info-field-group">
                <div class="info-field-label"><i class="bi bi-mortarboard"></i> Educational Spectrum Offered</div>
                <div class="info-field-value" id="fieldSpectrum">Pre-Primary (Nursery, KG) to Grade 12 (Senior Secondary)</div>
              </div>
              <div class="col-md-6 info-field-group">
                <div class="info-field-label"><i class="bi bi-compass"></i> Senior Secondary Streams</div>
                <div class="info-field-value">Science (PCM/PCB), Commerce & Humanities/Liberal Arts</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Vision & Mission Statement Card -->
        <div class="erp-card">
          <div class="erp-card-header">
            <h5 class="erp-card-title"><i class="bi bi-lightbulb text-warning"></i> Vision, Mission & Core Values</h5>
          </div>
          <div class="erp-card-body">
            <div class="mb-3">
              <h6 class="fw-bold text-primary font-size-14"><i class="bi bi-eye-fill me-1"></i> Institutional Vision</h6>
              <p class="text-muted font-size-13 mb-0" id="fieldVision">
                To nurture inquisitive minds and compassionate hearts through holistic pedagogy, state-of-the-art technological immersion, and rooted ethical values, shaping dynamic global leaders for a transforming world.
              </p>
            </div>
            <hr class="my-3 opacity-25">
            <div class="mb-3">
              <h6 class="fw-bold text-success font-size-14"><i class="bi bi-bullseye me-1"></i> Institutional Mission</h6>
              <p class="text-muted font-size-13 mb-0" id="fieldMission">
                Deliver rigorous CBSE-aligned scholastic and co-scholastic excellence in a safe, technologically advanced, and inclusive learning habitat where every learner discovers their individual genius.
              </p>
            </div>
            <hr class="my-3 opacity-25">
            <div>
              <h6 class="fw-bold text-info font-size-14"><i class="bi bi-stars me-1"></i> Core Institutional Values (PRIDE)</h6>
              <div class="d-flex flex-wrap gap-2 mt-2">
                <span class="badge bg-light text-primary border px-2 py-1"><i class="bi bi-check-circle me-1"></i> P - Passion for Learning</span>
                <span class="badge bg-light text-success border px-2 py-1"><i class="bi bi-check-circle me-1"></i> R - Respect & Inclusivity</span>
                <span class="badge bg-light text-warning border px-2 py-1"><i class="bi bi-check-circle me-1"></i> I - Integrity & Truth</span>
                <span class="badge bg-light text-danger border px-2 py-1"><i class="bi bi-check-circle me-1"></i> D - Discipline & Grit</span>
                <span class="badge bg-light text-info border px-2 py-1"><i class="bi bi-check-circle me-1"></i> E - Empathy & Service</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Column: Operational Hours & Quick Facts -->
      <div class="col-lg-4">
        <!-- Daily Operations Card -->
        <div class="erp-card">
          <div class="erp-card-header">
            <h5 class="erp-card-title"><i class="bi bi-clock-history text-primary"></i> Operational Timings</h5>
          </div>
          <div class="erp-card-body">
            <div class="info-field-group">
              <div class="info-field-label"><i class="bi bi-sun"></i> Academic Shift</div>
              <div class="info-field-value font-size-14" id="fieldShiftTiming">General Shift: 07:45 AM – 02:15 PM</div>
            </div>
            <div class="info-field-group">
              <div class="info-field-label"><i class="bi bi-briefcase"></i> Administrative / Office Hours</div>
              <div class="info-field-value font-size-14">08:00 AM – 04:30 PM (Monday – Saturday)</div>
            </div>
            <div class="info-field-group">
              <div class="info-field-label"><i class="bi bi-door-open"></i> Visitor & Parent Visiting Hours</div>
              <div class="info-field-value font-size-14">02:30 PM – 04:00 PM (Prior Appointment)</div>
            </div>
            <div class="info-field-group">
              <div class="info-field-label"><i class="bi bi-calendar3-range"></i> Academic Session Period</div>
              <div class="info-field-value font-size-14"><span class="badge bg-primary text-white">01 April 2024 to 31 March 2025</span></div>
            </div>
            <div class="info-field-group mb-0">
              <div class="info-field-label"><i class="bi bi-calendar-check"></i> Standard Working Days</div>
              <div class="info-field-value font-size-14">Monday through Friday (Classes Nursery–V)<br>Monday through Saturday (Classes VI–XII, 2nd Sat Off)</div>
            </div>
          </div>
        </div>

        <!-- School Seal & Crest Preview Card -->
        <div class="erp-card">
          <div class="erp-card-header">
            <h5 class="erp-card-title"><i class="bi bi-award text-success"></i> Official Crest & Seal</h5>
          </div>
          <div class="erp-card-body text-center py-4">
            <div class="d-inline-flex flex-column align-items-center">
              <div class="profile-crest-wrapper mb-3" style="width: 110px; height: 110px; font-size: 2.8rem;">
                <span id="displayCrestInitials2">DPGA</span>
              </div>
              <h6 class="fw-bold mb-1" id="sealSchoolName">Delhi Public Global Academy</h6>
              <p class="text-muted font-size-12 mb-3 font-mono">Affiliation No. 2130892 | Code 70142</p>
              <div class="d-flex justify-content-center gap-2">
                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#changeCrestModal">
                  <i class="bi bi-arrow-repeat me-1"></i> Update Seal
                </button>
                <a href="<?php echo base_url('modules/administration/school-branding.php'); ?>" class="btn btn-sm btn-light border">
                  <i class="bi bi-palette me-1"></i> Branding
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= TAB 2: AFFILIATION & COMPLIANCE ================= -->
  <div class="tab-pane fade" id="tab-affiliation" role="tabpanel">
    <div class="erp-card mb-4">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-award-fill text-primary"></i> Board Affiliation & Accreditation Dossier</h5>
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editAffiliationModal">
          <i class="bi bi-pencil me-1"></i> Edit Affiliation Details
        </button>
      </div>
      <div class="erp-card-body">
        <div class="row g-3">
          <div class="col-md-4 info-field-group">
            <div class="info-field-label"><i class="bi bi-patch-check"></i> Primary Educational Board</div>
            <div class="info-field-value text-primary fw-bold" id="fieldBoardName">Central Board of Secondary Education (CBSE)</div>
          </div>
          <div class="col-md-4 info-field-group">
            <div class="info-field-label"><i class="bi bi-fingerprint"></i> CBSE Affiliation Number</div>
            <div class="info-field-value font-mono fw-bold" id="fieldAffilNo2">2130892</div>
          </div>
          <div class="col-md-4 info-field-group">
            <div class="info-field-label"><i class="bi bi-hash"></i> CBSE School Code / Centre Code</div>
            <div class="info-field-value font-mono fw-bold" id="fieldSchoolCode2">70142</div>
          </div>
          <div class="col-md-4 info-field-group">
            <div class="info-field-label"><i class="bi bi-qr-code"></i> Government U-DISE+ Code</div>
            <div class="info-field-value font-mono" id="fieldUdiseCode2">07010401824</div>
          </div>
          <div class="col-md-4 info-field-group">
            <div class="info-field-label"><i class="bi bi-check2-circle"></i> Affiliation Status & Category</div>
            <div class="info-field-value"><span class="badge bg-success-subtle text-success border border-success-subtle">Regular / Senior Secondary (K-12)</span></div>
          </div>
          <div class="col-md-4 info-field-group">
            <div class="info-field-label"><i class="bi bi-calendar-event"></i> Current Affiliation Validity Period</div>
            <div class="info-field-value font-size-14 text-main fw-semibold" id="fieldAffilValidity">01-Apr-2024 to 31-Mar-2029 (5 Years Extension)</div>
          </div>
          <div class="col-md-4 info-field-group">
            <div class="info-field-label"><i class="bi bi-file-earmark-medical"></i> State Education Dept Recognition No.</div>
            <div class="info-field-value font-mono" id="fieldStateRecogNo">EDN-DEL-ACT-1999/8841-A</div>
          </div>
          <div class="col-md-4 info-field-group">
            <div class="info-field-label"><i class="bi bi-shield-lock"></i> Minority Institution Status</div>
            <div class="info-field-value">No (General Unaided Category)</div>
          </div>
          <div class="col-md-4 info-field-group">
            <div class="info-field-label"><i class="bi bi-stars"></i> Quality ISO & Accreditation Rating</div>
            <div class="info-field-value"><span class="badge bg-light text-primary border">ISO 9001:2015</span> <span class="badge bg-light text-success border">Green School Silver</span></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Statutory Compliance Certificates Matrix -->
    <div class="erp-card">
      <div class="erp-card-header">
        <div>
          <h5 class="erp-card-title mb-0"><i class="bi bi-shield-fill-check text-success"></i> Mandatory Statutory Safety & Compliance Matrix</h5>
          <span class="font-size-12 text-muted">Statutory certificates required as per CBSE Bye-Laws Chapter 2 and State Education Acts</span>
        </div>
        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#uploadVaultDocModal">
          <i class="bi bi-plus-lg me-1"></i> Upload New Certificate
        </button>
      </div>
      <div class="erp-table-responsive mb-0">
        <table class="erp-table mb-0" id="complianceTable">
          <thead>
            <tr>
              <th>Statutory Certificate</th>
              <th>Issuing Authority / Agency</th>
              <th>Certificate Ref. No.</th>
              <th>Issue Date</th>
              <th>Valid Until</th>
              <th>Compliance Status</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-building-check text-primary fs-5"></i>
                  <div>
                    <div class="fw-bold">Building Structural Safety Certificate</div>
                    <small class="text-muted">Structural sound fitness inspection</small>
                  </div>
                </div>
              </td>
              <td>PWD / Registered Structural Engineer (MCD)</td>
              <td class="font-mono font-size-12">STR/PWD/DEL/2022/9041</td>
              <td>15 May 2022</td>
              <td>15 May 2027</td>
              <td><span class="badge-status badge-active">Compliant / Valid</span></td>
              <td class="text-center">
                <button class="btn btn-xs btn-light border" onclick="previewCertificate('Building Structural Safety Certificate', 'PWD / MCD', 'STR/PWD/DEL/2022/9041', '15 May 2027')">
                  <i class="bi bi-eye"></i> View
                </button>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-fire text-danger fs-5"></i>
                  <div>
                    <div class="fw-bold">Fire Safety Clearance NOC</div>
                    <small class="text-muted">Delhi Fire Service statutory inspection</small>
                  </div>
                </div>
              </td>
              <td>Directorate of Delhi Fire Services</td>
              <td class="font-mono font-size-12">DFS/MS/SCH/2022/7418</td>
              <td>01 Dec 2022</td>
              <td>30 Nov 2025</td>
              <td><span class="badge-status badge-active">Compliant / Valid</span></td>
              <td class="text-center">
                <button class="btn btn-xs btn-light border" onclick="previewCertificate('Fire Safety Clearance NOC', 'Delhi Fire Services', 'DFS/MS/SCH/2022/7418', '30 Nov 2025')">
                  <i class="bi bi-eye"></i> View
                </button>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-droplet-fill text-info fs-5"></i>
                  <div>
                    <div class="fw-bold">Clean Drinking Water & Sanitation Certificate</div>
                    <small class="text-muted">Bacteriological purity & sanitary conditions</small>
                  </div>
                </div>
              </td>
              <td>Municipal Corporation Health Department</td>
              <td class="font-mono font-size-12">MCD/PHD/WAT/2024/1102</td>
              <td>18 Sep 2024</td>
              <td>17 Sep 2025</td>
              <td><span class="badge-status badge-active">Compliant / Valid</span></td>
              <td class="text-center">
                <button class="btn btn-xs btn-light border" onclick="previewCertificate('Clean Drinking Water & Sanitation Certificate', 'MCD Health Dept', 'MCD/PHD/WAT/2024/1102', '17 Sep 2025')">
                  <i class="bi bi-eye"></i> View
                </button>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-geo-alt-fill text-success fs-5"></i>
                  <div>
                    <div class="fw-bold">Land Title & Non-Encumbrance Certificate</div>
                    <small class="text-muted">Single contiguous parcel of 14.5 Acres</small>
                  </div>
                </div>
              </td>
              <td>Sub-Registrar Revenue Authority</td>
              <td class="font-mono font-size-12">SR/DWR/LND/99/3847</td>
              <td>14 Aug 1999</td>
              <td>Perpetual Lease (99 Yrs)</td>
              <td><span class="badge-status badge-active">Compliant / Valid</span></td>
              <td class="text-center">
                <button class="btn btn-xs btn-light border" onclick="previewCertificate('Land Title & Lease Deed', 'Sub-Registrar Authority', 'SR/DWR/LND/99/3847', 'Perpetual')">
                  <i class="bi bi-eye"></i> View
                </button>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-file-earmark-check text-primary fs-5"></i>
                  <div>
                    <div class="fw-bold">State Government No-Objection (NOC)</div>
                    <small class="text-muted">Directorate of Education, Govt of NCT</small>
                  </div>
                </div>
              </td>
              <td>Directorate of Education, Delhi</td>
              <td class="font-mono font-size-12">DOE/NOC/CBSE/1999/491</td>
              <td>12 Mar 1999</td>
              <td>Permanent</td>
              <td><span class="badge-status badge-active">Compliant / Valid</span></td>
              <td class="text-center">
                <button class="btn btn-xs btn-light border" onclick="previewCertificate('State Government NOC', 'Directorate of Education', 'DOE/NOC/CBSE/1999/491', 'Permanent')">
                  <i class="bi bi-eye"></i> View
                </button>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-shield-heart text-warning fs-5"></i>
                  <div>
                    <div class="fw-bold">POCSO & Child Safety Committee Constitution</div>
                    <small class="text-muted">Mandatory child sexual offense protection unit</small>
                  </div>
                </div>
              </td>
              <td>School Management Committee & State DCPCR</td>
              <td class="font-mono font-size-12">POCSO/SMC/2024-25/01</td>
              <td>01 Apr 2024</td>
              <td>31 Mar 2025</td>
              <td><span class="badge-status badge-active">Active Committee</span></td>
              <td class="text-center">
                <button class="btn btn-xs btn-light border" onclick="previewCertificate('POCSO Committee Constitution Order', 'SMC & DCPCR', 'POCSO/SMC/2024-25/01', '31 Mar 2025')">
                  <i class="bi bi-eye"></i> View
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- ================= TAB 3: CAMPUS & FACILITIES ================= -->
  <div class="tab-pane fade" id="tab-campus" role="tabpanel">
    <div class="row g-4">
      <div class="col-lg-6">
        <!-- Land & Built Area Card -->
        <div class="erp-card h-100">
          <div class="erp-card-header">
            <h5 class="erp-card-title"><i class="bi bi-geo text-primary"></i> Campus Land & Physical Dimensions</h5>
          </div>
          <div class="erp-card-body">
            <div class="row g-3 mb-3">
              <div class="col-sm-6 info-field-group">
                <div class="info-field-label">Total Land Area</div>
                <div class="info-field-value text-primary font-size-16 fw-bold" id="fieldLandArea">14.5 Acres (58,679 sq. mtr)</div>
              </div>
              <div class="col-sm-6 info-field-group">
                <div class="info-field-label">Total Built-Up Area</div>
                <div class="info-field-value text-success font-size-16 fw-bold" id="fieldBuiltArea">185,000 sq. ft (17,187 sq. mtr)</div>
              </div>
              <div class="col-sm-6 info-field-group">
                <div class="info-field-label">Playground Area</div>
                <div class="info-field-value font-size-15" id="fieldPlaygroundArea">7.2 Acres (Dedicated Sports Ground)</div>
              </div>
              <div class="col-sm-6 info-field-group">
                <div class="info-field-label">Number of Academic Wings / Blocks</div>
                <div class="info-field-value font-size-15">4 Blocks (Primary, Middle, Senior & Admin)</div>
              </div>
              <div class="col-sm-6 info-field-group">
                <div class="info-field-label">Campus Ownership</div>
                <div class="info-field-value">Owned / Perpetual Society Lease</div>
              </div>
              <div class="col-sm-6 info-field-group">
                <div class="info-field-label">Boundary Wall Perimeter</div>
                <div class="info-field-value">Pucca RCC Boundary Wall with CCTV (100% Secure)</div>
              </div>
            </div>

            <!-- Geo Coordinates Box -->
            <div class="p-3 bg-app border rounded-3 d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center gap-3">
                <div class="p-2 bg-primary-subtle text-primary rounded-3 fs-4"><i class="bi bi-geo-alt-fill"></i></div>
                <div>
                  <div class="fw-bold font-size-13">GPS Geo-Location Coordinates</div>
                  <div class="font-mono font-size-12 text-muted" id="fieldGpsCoords">Lat: 28.613939° N, Long: 77.209021° E</div>
                </div>
              </div>
              <a href="https://maps.google.com" target="_blank" class="btn btn-sm btn-light border">
                <i class="bi bi-box-arrow-up-right me-1"></i> Open Maps
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <!-- Academic Infrastructure Breakdown -->
        <div class="erp-card h-100">
          <div class="erp-card-header">
            <h5 class="erp-card-title"><i class="bi bi-mortarboard text-success"></i> Academic Spaces & Capacity</h5>
          </div>
          <div class="erp-card-body">
            <div class="row g-3">
              <div class="col-6 col-sm-4">
                <div class="facility-badge-item">
                  <div class="facility-badge-icon"><i class="bi bi-easel2-fill"></i></div>
                  <div>
                    <div class="fw-bold font-size-16" id="fieldTotalClassrooms">84</div>
                    <div class="font-size-11 text-muted">Smart Classrooms</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4">
                <div class="facility-badge-item">
                  <div class="facility-badge-icon"><i class="bi bi-flask-fill"></i></div>
                  <div>
                    <div class="fw-bold font-size-16">8</div>
                    <div class="font-size-11 text-muted">Science & STEM Labs</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4">
                <div class="facility-badge-item">
                  <div class="facility-badge-icon"><i class="bi bi-pc-display"></i></div>
                  <div>
                    <div class="fw-bold font-size-16">3</div>
                    <div class="font-size-11 text-muted">Computer Labs (180 PCs)</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4">
                <div class="facility-badge-item">
                  <div class="facility-badge-icon"><i class="bi bi-robot"></i></div>
                  <div>
                    <div class="fw-bold font-size-16">1</div>
                    <div class="font-size-11 text-muted">Atal Tinkering AI Lab</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4">
                <div class="facility-badge-item">
                  <div class="facility-badge-icon"><i class="bi bi-book-half"></i></div>
                  <div>
                    <div class="fw-bold font-size-16">2</div>
                    <div class="font-size-11 text-muted">Libraries (28k Books)</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4">
                <div class="facility-badge-item">
                  <div class="facility-badge-icon"><i class="bi bi-music-note-beamed"></i></div>
                  <div>
                    <div class="fw-bold font-size-16">4</div>
                    <div class="font-size-11 text-muted">Music, Art & Dance</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4">
                <div class="facility-badge-item">
                  <div class="facility-badge-icon"><i class="bi bi-building"></i></div>
                  <div>
                    <div class="fw-bold font-size-16">1,200</div>
                    <div class="font-size-11 text-muted">Seater Auditorium</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4">
                <div class="facility-badge-item">
                  <div class="facility-badge-icon"><i class="bi bi-heart-pulse-fill"></i></div>
                  <div>
                    <div class="fw-bold font-size-16">6 Beds</div>
                    <div class="font-size-11 text-muted">Medical Infirmary</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4">
                <div class="facility-badge-item">
                  <div class="facility-badge-icon"><i class="bi bi-bus-front-fill"></i></div>
                  <div>
                    <div class="fw-bold font-size-16">32</div>
                    <div class="font-size-11 text-muted">GPS School Buses</div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="mt-4 p-3 bg-light rounded-3 border">
              <h6 class="fw-bold font-size-13 mb-1"><i class="bi bi-water me-1 text-primary"></i> Sports & Athletic Infrastructure</h6>
              <p class="font-size-12 text-muted mb-0">
                Olympic standard 400m 8-lane athletic track, FIFA standard football turf, 2 wooden badminton courts, 2 synthetic tennis courts, semi-Olympic heated swimming pool, 2 basketball courts, and indoor shooting range.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= TAB 4: LEADERSHIP & SMC ================= -->
  <div class="tab-pane fade" id="tab-leadership" role="tabpanel">
    <div class="row g-4 mb-4">
      <!-- Principal Profile Card -->
      <div class="col-lg-6">
        <div class="erp-card h-100">
          <div class="erp-card-header">
            <h5 class="erp-card-title"><i class="bi bi-person-badge text-primary"></i> Head of School / Principal</h5>
            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editLeadershipModal">
              <i class="bi bi-pencil me-1"></i> Edit Leadership
            </button>
          </div>
          <div class="erp-card-body">
            <div class="d-flex align-items-center gap-3 mb-3">
              <div class="leadership-avatar-wrap" id="dispPrincipalAvatar">SR</div>
              <div>
                <h5 class="fw-bold mb-0 text-main" id="dispPrincipalName">Dr. Sunita Rao</h5>
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle font-size-12" id="dispPrincipalRole">Principal & Member Secretary (SMC)</span>
                <div class="text-muted font-size-12 mt-1" id="dispPrincipalQual">M.Sc. (Physics), M.Ed., Ph.D. in Educational Leadership</div>
              </div>
            </div>
            <div class="row g-2 pt-2 border-top">
              <div class="col-sm-6 font-size-13 text-muted">
                <i class="bi bi-clock-history me-1 text-primary"></i> Experience: <strong class="text-main" id="dispPrincipalExp">24 Years</strong>
              </div>
              <div class="col-sm-6 font-size-13 text-muted">
                <i class="bi bi-telephone me-1 text-primary"></i> Direct: <strong class="text-main" id="dispPrincipalPhone">+91 11 2893 4005</strong>
              </div>
              <div class="col-12 font-size-13 text-muted">
                <i class="bi bi-envelope me-1 text-primary"></i> Email: <strong class="text-main font-mono" id="dispPrincipalEmail">principal@dpglobalacademy.edu.in</strong>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Vice Principal & Key Officers -->
      <div class="col-lg-6">
        <div class="erp-card h-100">
          <div class="erp-card-header">
            <h5 class="erp-card-title"><i class="bi bi-person-lines-fill text-info"></i> Key Institutional Officers</h5>
          </div>
          <div class="erp-card-body">
            <div class="d-flex align-items-center justify-content-between p-2 mb-2 bg-app rounded-3 border">
              <div class="d-flex align-items-center gap-3">
                <div class="table-avatar bg-info text-white">VS</div>
                <div>
                  <div class="fw-bold font-size-14" id="dispVpName">Vikramaditya Sengupta</div>
                  <div class="font-size-12 text-muted">Vice Principal (Senior Wing) • M.A., B.Ed. (18 Yrs Exp)</div>
                </div>
              </div>
              <span class="badge bg-light text-primary border font-size-11">Academics</span>
            </div>

            <div class="d-flex align-items-center justify-content-between p-2 mb-2 bg-app rounded-3 border">
              <div class="d-flex align-items-center gap-3">
                <div class="table-avatar bg-warning text-white">RG</div>
                <div>
                  <div class="fw-bold font-size-14" id="dispChairName">Shri Rajeshwar Nath Goel</div>
                  <div class="font-size-12 text-muted">Chairman, School Management Committee (Vidya Mandir Trust)</div>
                </div>
              </div>
              <span class="badge bg-light text-warning border font-size-11">Trustee</span>
            </div>

            <div class="d-flex align-items-center justify-content-between p-2 bg-app rounded-3 border">
              <div class="d-flex align-items-center gap-3">
                <div class="table-avatar bg-success text-white">AS</div>
                <div>
                  <div class="fw-bold font-size-14" id="dispPocsoName">Mrs. Anjali Saxena</div>
                  <div class="font-size-12 text-muted">HR Lead & Child Protection Officer (POCSO Nodal Officer)</div>
                </div>
              </div>
              <span class="badge bg-light text-success border font-size-11">Child Safety</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- School Management Committee (SMC) Table -->
    <div class="erp-card">
      <div class="erp-card-header">
        <div>
          <h5 class="erp-card-title mb-0"><i class="bi bi-people-fill text-primary"></i> School Management Committee (SMC) Register</h5>
          <span class="font-size-12 text-muted">Constituted under Section 21 of the RTE Act and CBSE Affiliation Bye-Laws (Term 2023 - 2026)</span>
        </div>
        <button class="btn btn-sm btn-light border" onclick="EduTables.exportCSV('#smcTable', 'smc_members.csv')">
          <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export SMC
        </button>
      </div>
      <div class="erp-table-responsive mb-0">
        <table class="erp-table mb-0" id="smcTable">
          <thead>
            <tr>
              <th>Member Name</th>
              <th>Designation in SMC</th>
              <th>Representation Category</th>
              <th>Occupation / Affiliation</th>
              <th>Contact Phone</th>
              <th>Term Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="fw-bold">Shri Rajeshwar Nath Goel</td>
              <td><span class="badge bg-primary-subtle text-primary border">President / Chairman</span></td>
              <td>Trust Nominee</td>
              <td>Industrialist & Philanthropist</td>
              <td>+91 98101 22334</td>
              <td><span class="badge-status badge-active">Active (2026)</span></td>
            </tr>
            <tr>
              <td class="fw-bold">Dr. Sunita Rao</td>
              <td><span class="badge bg-primary-subtle text-primary border">Member Secretary</span></td>
              <td>Principal (Ex-Officio)</td>
              <td>Educationist (Ph.D.)</td>
              <td>+91 11 2893 4005</td>
              <td><span class="badge-status badge-active">Active (2026)</span></td>
            </tr>
            <tr>
              <td class="fw-bold">Prof. Harishankar Mehra</td>
              <td>Member</td>
              <td>CBSE Board Nominee</td>
              <td>Former Principal, KV Sector 8</td>
              <td>+91 98710 44556</td>
              <td><span class="badge-status badge-active">Active (2026)</span></td>
            </tr>
            <tr>
              <td class="fw-bold">Dr. Neerja Tandon</td>
              <td>Member</td>
              <td>Directorate of Education Nominee</td>
              <td>Education Officer, Zone 21 Delhi</td>
              <td>+91 11 2341 8920</td>
              <td><span class="badge-status badge-active">Active (2026)</span></td>
            </tr>
            <tr>
              <td class="fw-bold">Mr. Rajesh Sharma</td>
              <td>Member</td>
              <td>Parent Representative (Father)</td>
              <td>Senior Software Architect</td>
              <td>+91 98112 34567</td>
              <td><span class="badge-status badge-active">Active (2026)</span></td>
            </tr>
            <tr>
              <td class="fw-bold">Mrs. Sunayana Malhotra</td>
              <td>Member</td>
              <td>Parent Representative (Mother)</td>
              <td>Chartered Accountant</td>
              <td>+91 98113 77889</td>
              <td><span class="badge-status badge-active">Active (2026)</span></td>
            </tr>
            <tr>
              <td class="fw-bold">Mrs. Priya Nambiar</td>
              <td>Member</td>
              <td>Teacher Representative (Senior)</td>
              <td>PGT English, DPGA</td>
              <td>+91 99110 55441</td>
              <td><span class="badge-status badge-active">Active (2026)</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- ================= TAB 5: CONTACT & COMMUNICATION ================= -->
  <div class="tab-pane fade" id="tab-contact" role="tabpanel">
    <div class="row g-4">
      <div class="col-lg-7">
        <div class="erp-card h-100">
          <div class="erp-card-header">
            <h5 class="erp-card-title"><i class="bi bi-geo-alt-fill text-danger"></i> Official Physical & Mailing Address</h5>
            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editContactModal">
              <i class="bi bi-pencil me-1"></i> Edit Contact Info
            </button>
          </div>
          <div class="erp-card-body">
            <div class="p-3 bg-app rounded-3 border mb-3">
              <div class="fw-bold text-main font-size-15 mb-1" id="contactDispSchoolName">Delhi Public Global Academy</div>
              <div class="text-muted font-size-14" id="contactDispAddress">
                Sector 14, Knowledge City, Dwarka Expressway Sub-City, New Delhi - 110075, India
              </div>
            </div>

            <h6 class="fw-bold text-primary font-size-14 mb-3"><i class="bi bi-telephone-inbound me-1"></i> Official Telephone Exchange & Helplines</h6>
            <div class="row g-3 mb-4">
              <div class="col-sm-6 info-field-group">
                <div class="info-field-label">General Reception PBX</div>
                <div class="info-field-value" id="contactDispPhone1">+91 11 2893 4000, 4001</div>
              </div>
              <div class="col-sm-6 info-field-group">
                <div class="info-field-label">Admissions Cell Direct Line</div>
                <div class="info-field-value text-success" id="contactDispPhoneAdmissions">+91 98110 99450, +91 11 2893 4010</div>
              </div>
              <div class="col-sm-6 info-field-group">
                <div class="info-field-label">Principal's Secretariat</div>
                <div class="info-field-value">+91 11 2893 4005</div>
              </div>
              <div class="col-sm-6 info-field-group">
                <div class="info-field-label">Accounts & Fee Queries</div>
                <div class="info-field-value">+91 11 2893 4022</div>
              </div>
              <div class="col-sm-6 info-field-group">
                <div class="info-field-label">Transport Desk & GPS Dispatch</div>
                <div class="info-field-value">+91 98118 77200</div>
              </div>
              <div class="col-sm-6 info-field-group">
                <div class="info-field-label">Emergency 24x7 Security Desk</div>
                <div class="info-field-value text-danger">+91 11 2893 4099</div>
              </div>
            </div>

            <h6 class="fw-bold text-primary font-size-14 mb-3"><i class="bi bi-envelope-at me-1"></i> Email Directory</h6>
            <div class="row g-3">
              <div class="col-sm-6 info-field-group">
                <div class="info-field-label">General Inquiries</div>
                <div class="info-field-value font-mono font-size-13" id="contactDispEmail">info@dpglobalacademy.edu.in</div>
              </div>
              <div class="col-sm-6 info-field-group">
                <div class="info-field-label">Admission Desk</div>
                <div class="info-field-value font-mono font-size-13">admissions@dpglobalacademy.edu.in</div>
              </div>
              <div class="col-sm-6 info-field-group">
                <div class="info-field-label">Principal's Office</div>
                <div class="info-field-value font-mono font-size-13">principal@dpglobalacademy.edu.in</div>
              </div>
              <div class="col-sm-6 info-field-group">
                <div class="info-field-label">Accounts & Billing</div>
                <div class="info-field-value font-mono font-size-13">accounts@dpglobalacademy.edu.in</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <!-- Digital Presence & Social Media Handles -->
        <div class="erp-card mb-4">
          <div class="erp-card-header">
            <h5 class="erp-card-title"><i class="bi bi-globe2 text-info"></i> Official Digital Channels</h5>
          </div>
          <div class="erp-card-body">
            <div class="mb-3">
              <label class="info-field-label"><i class="bi bi-browser-chrome"></i> Official Web Portal</label>
              <div class="p-2 bg-app rounded-2 border d-flex align-items-center justify-content-between">
                <span class="font-mono font-size-13 text-primary" id="contactDispWebsite">https://www.dpglobalacademy.edu.in</span>
                <a href="#" class="btn btn-xs btn-outline-primary" target="_blank"><i class="bi bi-box-arrow-up-right"></i></a>
              </div>
            </div>

            <div class="d-flex flex-column gap-2">
              <div class="d-flex align-items-center justify-content-between p-2 border rounded-2 bg-app">
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-twitter-x text-dark fs-5"></i>
                  <span class="font-size-13 fw-semibold">X (Twitter)</span>
                </div>
                <span class="font-mono font-size-12 text-muted" id="contactDispTwitter">@DPGAcademyDelhi</span>
              </div>
              <div class="d-flex align-items-center justify-content-between p-2 border rounded-2 bg-app">
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-facebook text-primary fs-5"></i>
                  <span class="font-size-13 fw-semibold">Facebook Page</span>
                </div>
                <span class="font-mono font-size-12 text-muted" id="contactDispFacebook">/DelhiPublicGlobalAcademy</span>
              </div>
              <div class="d-flex align-items-center justify-content-between p-2 border rounded-2 bg-app">
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-instagram text-danger fs-5"></i>
                  <span class="font-size-13 fw-semibold">Instagram</span>
                </div>
                <span class="font-mono font-size-12 text-muted" id="contactDispInstagram">@dpgaindia</span>
              </div>
              <div class="d-flex align-items-center justify-content-between p-2 border rounded-2 bg-app">
                <div class="d-flex align-items-center gap-2">
                  <i class="bi bi-youtube text-danger fs-5"></i>
                  <span class="font-size-13 fw-semibold">YouTube Official Channel</span>
                </div>
                <span class="font-mono font-size-12 text-muted">@DPGA-MediaChannel</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Campus Location Map Preview Simulation -->
        <div class="erp-card">
          <div class="erp-card-header">
            <h5 class="erp-card-title"><i class="bi bi-pin-map-fill text-danger"></i> Campus Map Pin</h5>
          </div>
          <div class="erp-card-body p-0">
            <div style="background: linear-gradient(135deg, #1e293b 0%, #334155 100%); height: 160px; display: flex; align-items: center; justify-content: center; position: relative;">
              <div class="text-center text-white p-3">
                <i class="bi bi-geo-alt-fill text-danger fs-1 mb-1 d-block"></i>
                <div class="fw-bold font-size-14">Delhi Public Global Academy Campus</div>
                <div class="font-size-11 opacity-75 font-mono">28.6139° N, 77.2090° E • New Delhi - 110075</div>
              </div>
            </div>
            <div class="p-3 text-center">
              <a href="https://maps.google.com" target="_blank" class="btn btn-sm btn-light border w-100">
                <i class="bi bi-map me-1 text-primary"></i> Get Directions via Google Maps
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= TAB 6: BANKING & STATUTORY IDS ================= -->
  <div class="tab-pane fade" id="tab-banking" role="tabpanel">
    <div class="row g-4">
      <div class="col-lg-6">
        <div class="erp-card h-100">
          <div class="erp-card-header">
            <h5 class="erp-card-title"><i class="bi bi-bank2 text-primary"></i> Primary Operating Bank Account</h5>
            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editBankModal">
              <i class="bi bi-pencil me-1"></i> Edit Bank Details
            </button>
          </div>
          <div class="erp-card-body">
            <div class="info-field-group">
              <div class="info-field-label"><i class="bi bi-building"></i> Bank & Branch Name</div>
              <div class="info-field-value text-primary fw-bold" id="bankDispName">HDFC Bank Ltd, Sector 14 Knowledge City Branch</div>
            </div>
            <div class="info-field-group">
              <div class="info-field-label"><i class="bi bi-person"></i> Account Beneficiary / Holder Name</div>
              <div class="info-field-value" id="bankDispHolder">Delhi Public Global Academy (Vidya Mandir Trust)</div>
            </div>
            <div class="info-field-group">
              <div class="info-field-label"><i class="bi bi-credit-card"></i> Operating Bank Account Number</div>
              <div class="info-field-value d-flex align-items-center gap-2">
                <span class="font-mono fw-bold font-size-16" id="bankDispAccNo">50200084918234</span>
                <button class="btn btn-xs btn-light border" onclick="toggleAccMask()" title="Show/Hide Account Number">
                  <i class="bi bi-eye" id="maskEyeIcon"></i>
                </button>
              </div>
            </div>
            <div class="row g-2">
              <div class="col-sm-6 info-field-group">
                <div class="info-field-label"><i class="bi bi-hash"></i> IFSC Code</div>
                <div class="info-field-value font-mono fw-bold" id="bankDispIfsc">HDFC0001892</div>
              </div>
              <div class="col-sm-6 info-field-group">
                <div class="info-field-label"><i class="bi bi-globe"></i> SWIFT / BIC Code</div>
                <div class="info-field-value font-mono" id="bankDispSwift">HDFCINBBDEL</div>
              </div>
            </div>
            <div class="info-field-group mb-0">
              <div class="info-field-label"><i class="bi bi-wallet2"></i> Fee Collection Gateway Integration</div>
              <div class="info-field-value font-size-13 text-muted">
                <span class="badge bg-light text-primary border">Razorpay Smart Collect</span>
                <span class="badge bg-light text-success border">HDFC SmartHub POS</span>
                <span class="badge bg-light text-info border">UPI / Net Banking Auto-Reconcile</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="erp-card h-100">
          <div class="erp-card-header">
            <h5 class="erp-card-title"><i class="bi bi-file-earmark-lock text-success"></i> Statutory Tax & Welfare Numbers</h5>
          </div>
          <div class="erp-card-body">
            <div class="row g-3">
              <div class="col-md-6 info-field-group">
                <div class="info-field-label"><i class="bi bi-hash"></i> Permanent Account Number (PAN)</div>
                <div class="info-field-value font-mono fw-bold" id="taxDispPan">AAATD8921K</div>
              </div>
              <div class="col-md-6 info-field-group">
                <div class="info-field-label"><i class="bi bi-hash"></i> Tax Deduction Account No. (TAN)</div>
                <div class="info-field-value font-mono fw-bold" id="taxDispTan">DELT09281C</div>
              </div>
              <div class="col-md-6 info-field-group">
                <div class="info-field-label"><i class="bi bi-receipt"></i> Goods & Services Tax (GSTIN)</div>
                <div class="info-field-value font-mono" id="taxDispGstin">07AAATD8921K1Z2 (Educational Exemption Applicable)</div>
              </div>
              <div class="col-md-6 info-field-group">
                <div class="info-field-label"><i class="bi bi-people"></i> Employees' Provident Fund (EPFO) Code</div>
                <div class="info-field-value font-mono" id="taxDispEpfo">DL/CPM/8912300/000</div>
              </div>
              <div class="col-md-6 info-field-group">
                <div class="info-field-label"><i class="bi bi-hospital"></i> Employees' State Insurance (ESIC) Code</div>
                <div class="info-field-value font-mono" id="taxDispEsic">11000892010001001</div>
              </div>
              <div class="col-md-6 info-field-group">
                <div class="info-field-label"><i class="bi bi-shield-check"></i> Income Tax 12A / 80G Exemption</div>
                <div class="info-field-value"><span class="badge bg-success-subtle text-success border border-success-subtle">Registered under Sec 12AA & 80G</span></div>
              </div>
            </div>
            
            <div class="alert alert-info py-2 px-3 mt-3 mb-0 font-size-12 d-flex align-items-center gap-2">
              <i class="bi bi-info-circle-fill fs-5"></i>
              <div>All financial records and tax exemption certificates are updated in accordance with the Central Board of Direct Taxes (CBDT) guidelines.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= TAB 7: DIGITAL DOCUMENT VAULT ================= -->
  <div class="tab-pane fade" id="tab-vault" role="tabpanel">
    <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
      <div>
        <h5 class="fw-bold mb-0 text-main"><i class="bi bi-safe2-fill text-primary"></i> Institutional Digital Document Vault</h5>
        <span class="text-muted font-size-13">Digitally stamped statutory licenses, land deeds, building plans & board permissions</span>
      </div>
      <div class="d-flex gap-2">
        <button class="btn btn-sm btn-light border" onclick="printVaultRegister()">
          <i class="bi bi-printer me-1"></i> Print Vault Log
        </button>
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#uploadVaultDocModal">
          <i class="bi bi-cloud-arrow-up me-1"></i> Upload Statutory Document
        </button>
      </div>
    </div>

    <!-- Document Cards Grid -->
    <div class="row g-3" id="vaultDocsGrid">
      <!-- Doc 1 -->
      <div class="col-md-6 col-xl-3">
        <div class="doc-vault-item">
          <div class="d-flex align-items-start justify-content-between mb-3">
            <div class="doc-icon-wrap"><i class="bi bi-file-earmark-pdf-fill text-danger"></i></div>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Verified</span>
          </div>
          <h6 class="fw-bold font-size-14 text-main mb-1">CBSE Affiliation Extension Letter</h6>
          <p class="font-size-12 text-muted mb-3">Grant of extension of provisional affiliation up to senior secondary level.</p>
          <div class="mt-auto pt-2 border-top d-flex align-items-center justify-content-between font-size-12 text-muted">
            <span>PDF • 2.4 MB</span>
            <div class="d-flex gap-1">
              <button class="btn btn-xs btn-light border" onclick="previewCertificate('CBSE Affiliation Grant Letter', 'CBSE New Delhi', 'CBSE/AFF/2130892/EX-0248', '31-Mar-2029')"><i class="bi bi-eye"></i></button>
              <button class="btn btn-xs btn-light border" onclick="simulateDownload('CBSE_Affiliation_Grant.pdf')"><i class="bi bi-download"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Doc 2 -->
      <div class="col-md-6 col-xl-3">
        <div class="doc-vault-item">
          <div class="d-flex align-items-start justify-content-between mb-3">
            <div class="doc-icon-wrap"><i class="bi bi-file-earmark-pdf-fill text-danger"></i></div>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Verified</span>
          </div>
          <h6 class="fw-bold font-size-14 text-main mb-1">Fire Safety Clearance Certificate</h6>
          <p class="font-size-12 text-muted mb-3">Delhi Fire Service NOC with full hydrants, alarms & staircase compliance.</p>
          <div class="mt-auto pt-2 border-top d-flex align-items-center justify-content-between font-size-12 text-muted">
            <span>PDF • 1.8 MB</span>
            <div class="d-flex gap-1">
              <button class="btn btn-xs btn-light border" onclick="previewCertificate('Fire Safety Clearance Certificate', 'Delhi Fire Services', 'DFS/MS/SCH/2022/7418', '30-Nov-2025')"><i class="bi bi-eye"></i></button>
              <button class="btn btn-xs btn-light border" onclick="simulateDownload('Fire_Safety_NOC.pdf')"><i class="bi bi-download"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Doc 3 -->
      <div class="col-md-6 col-xl-3">
        <div class="doc-vault-item">
          <div class="d-flex align-items-start justify-content-between mb-3">
            <div class="doc-icon-wrap"><i class="bi bi-file-earmark-pdf-fill text-danger"></i></div>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Verified</span>
          </div>
          <h6 class="fw-bold font-size-14 text-main mb-1">Building Structural Fitness Certificate</h6>
          <p class="font-size-12 text-muted mb-3">PWD structural stability audit report under National Building Code.</p>
          <div class="mt-auto pt-2 border-top d-flex align-items-center justify-content-between font-size-12 text-muted">
            <span>PDF • 3.1 MB</span>
            <div class="d-flex gap-1">
              <button class="btn btn-xs btn-light border" onclick="previewCertificate('Building Structural Fitness Certificate', 'PWD Delhi', 'STR/PWD/DEL/2022/9041', '15-May-2027')"><i class="bi bi-eye"></i></button>
              <button class="btn btn-xs btn-light border" onclick="simulateDownload('Building_Fitness_PWD.pdf')"><i class="bi bi-download"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Doc 4 -->
      <div class="col-md-6 col-xl-3">
        <div class="doc-vault-item">
          <div class="d-flex align-items-start justify-content-between mb-3">
            <div class="doc-icon-wrap"><i class="bi bi-file-earmark-pdf-fill text-danger"></i></div>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Verified</span>
          </div>
          <h6 class="fw-bold font-size-14 text-main mb-1">Clean Drinking Water & Sanitation</h6>
          <p class="font-size-12 text-muted mb-3">MCD Public Health Dept laboratory microbiological and chemical report.</p>
          <div class="mt-auto pt-2 border-top d-flex align-items-center justify-content-between font-size-12 text-muted">
            <span>PDF • 1.2 MB</span>
            <div class="d-flex gap-1">
              <button class="btn btn-xs btn-light border" onclick="previewCertificate('Clean Water & Sanitation Certificate', 'MCD Health Dept', 'MCD/PHD/WAT/2024/1102', '17-Sep-2025')"><i class="bi bi-eye"></i></button>
              <button class="btn btn-xs btn-light border" onclick="simulateDownload('Water_Sanitation_MCD.pdf')"><i class="bi bi-download"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Doc 5 -->
      <div class="col-md-6 col-xl-3">
        <div class="doc-vault-item">
          <div class="d-flex align-items-start justify-content-between mb-3">
            <div class="doc-icon-wrap"><i class="bi bi-file-earmark-pdf-fill text-danger"></i></div>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Verified</span>
          </div>
          <h6 class="fw-bold font-size-14 text-main mb-1">Land Lease Deed & Possession</h6>
          <p class="font-size-12 text-muted mb-3">Registered 99 years perpetual land deed for 14.5 acres single plot.</p>
          <div class="mt-auto pt-2 border-top d-flex align-items-center justify-content-between font-size-12 text-muted">
            <span>PDF • 5.6 MB</span>
            <div class="d-flex gap-1">
              <button class="btn btn-xs btn-light border" onclick="previewCertificate('Land Lease Deed & Possession', 'Sub-Registrar Authority', 'SR/DWR/LND/99/3847', 'Perpetual')"><i class="bi bi-eye"></i></button>
              <button class="btn btn-xs btn-light border" onclick="simulateDownload('Land_Lease_Deed.pdf')"><i class="bi bi-download"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Doc 6 -->
      <div class="col-md-6 col-xl-3">
        <div class="doc-vault-item">
          <div class="d-flex align-items-start justify-content-between mb-3">
            <div class="doc-icon-wrap"><i class="bi bi-file-earmark-pdf-fill text-danger"></i></div>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Verified</span>
          </div>
          <h6 class="fw-bold font-size-14 text-main mb-1">Trust Deed & Society Registration</h6>
          <p class="font-size-12 text-muted mb-3">Societies Registration Act XXI of 1860 certificate with bylaws.</p>
          <div class="mt-auto pt-2 border-top d-flex align-items-center justify-content-between font-size-12 text-muted">
            <span>PDF • 4.2 MB</span>
            <div class="d-flex gap-1">
              <button class="btn btn-xs btn-light border" onclick="previewCertificate('Trust Deed & Society Registration', 'Registrar of Societies', 'REG/TR/1997/DELHI/4829', 'Active')"><i class="bi bi-eye"></i></button>
              <button class="btn btn-xs btn-light border" onclick="simulateDownload('Trust_Registration_Deed.pdf')"><i class="bi bi-download"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Doc 7 -->
      <div class="col-md-6 col-xl-3">
        <div class="doc-vault-item">
          <div class="d-flex align-items-start justify-content-between mb-3">
            <div class="doc-icon-wrap"><i class="bi bi-file-earmark-pdf-fill text-danger"></i></div>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Verified</span>
          </div>
          <h6 class="fw-bold font-size-14 text-main mb-1">State Directorate Recognition (NOC)</h6>
          <p class="font-size-12 text-muted mb-3">Permanent recognition letter issued by Directorate of Education Delhi.</p>
          <div class="mt-auto pt-2 border-top d-flex align-items-center justify-content-between font-size-12 text-muted">
            <span>PDF • 1.5 MB</span>
            <div class="d-flex gap-1">
              <button class="btn btn-xs btn-light border" onclick="previewCertificate('State Directorate Recognition NOC', 'Directorate of Education', 'DOE/NOC/CBSE/1999/491', 'Permanent')"><i class="bi bi-eye"></i></button>
              <button class="btn btn-xs btn-light border" onclick="simulateDownload('State_Govt_NOC.pdf')"><i class="bi bi-download"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Doc 8 -->
      <div class="col-md-6 col-xl-3">
        <div class="doc-vault-item">
          <div class="d-flex align-items-start justify-content-between mb-3">
            <div class="doc-icon-wrap"><i class="bi bi-file-earmark-pdf-fill text-danger"></i></div>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Verified</span>
          </div>
          <h6 class="fw-bold font-size-14 text-main mb-1">Approved Building Architectural Plan</h6>
          <p class="font-size-12 text-muted mb-3">MCD sanctioned floor layouts, fire escape stairs and structural drawings.</p>
          <div class="mt-auto pt-2 border-top d-flex align-items-center justify-content-between font-size-12 text-muted">
            <span>PDF • 8.7 MB</span>
            <div class="d-flex gap-1">
              <button class="btn btn-xs btn-light border" onclick="previewCertificate('Sanctioned School Architectural Plan', 'MCD Town Planning', 'MCD/BP/1998/1294', 'Sanctioned')"><i class="bi bi-eye"></i></button>
              <button class="btn btn-xs btn-light border" onclick="simulateDownload('Approved_Blueprint.pdf')"><i class="bi bi-download"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div> <!-- End Tab Content -->

<!-- =========================================================================
     MODAL DIALOGS FOR LIVE PROFILE MANAGEMENT
     ========================================================================= -->

<!-- 1. Modal: Edit General Institutional Information -->
<div class="modal fade" id="editGeneralModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-pencil-square text-primary me-2"></i>Edit General Institutional Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editGeneralForm" onsubmit="saveGeneralProfile(event)">
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-8">
              <label class="form-label">Full Legal School Name <span class="required">*</span></label>
              <input type="text" class="form-control" id="inputSchoolName" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Acronym / Short Name <span class="required">*</span></label>
              <input type="text" class="form-control font-mono" id="inputSchoolShort" required maxlength="10">
            </div>
            <div class="col-12">
              <label class="form-label">School Tagline / Motto</label>
              <input type="text" class="form-control" id="inputTagline">
            </div>
            <div class="col-md-6">
              <label class="form-label">Managing Society / Trust Name</label>
              <input type="text" class="form-control" id="inputTrustName">
            </div>
            <div class="col-md-6">
              <label class="form-label">Society / Trust Registration No.</label>
              <input type="text" class="form-control font-mono" id="inputTrustRegNo">
            </div>
            <div class="col-md-4">
              <label class="form-label">Year of Establishment</label>
              <input type="number" class="form-control" id="inputEstYear" min="1850" max="2099">
            </div>
            <div class="col-md-4">
              <label class="form-label">Medium of Instruction</label>
              <input type="text" class="form-control" id="inputMedium">
            </div>
            <div class="col-md-4">
              <label class="form-label">School Category</label>
              <select class="form-select" id="inputCategory">
                <option value="Private Unaided / Society Run">Private Unaided / Society Run</option>
                <option value="Government Aided">Government Aided</option>
                <option value="Private Trust Managed">Private Trust Managed</option>
                <option value="Kendriya Vidyalaya / Central">Kendriya Vidyalaya / Central</option>
              </select>
            </div>
            <div class="col-12">
              <label class="form-label">Academic Shift & Hours</label>
              <input type="text" class="form-control" id="inputShiftTiming" placeholder="e.g. General Shift: 07:45 AM – 02:15 PM">
            </div>
            <div class="col-12">
              <label class="form-label">Vision Statement</label>
              <textarea class="form-control" id="inputVision" rows="2"></textarea>
            </div>
            <div class="col-12">
              <label class="form-label">Mission Statement</label>
              <textarea class="form-control" id="inputMission" rows="2"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-check-lg me-1"></i> Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- 2. Modal: Edit Affiliation & Statutory Compliance Details -->
<div class="modal fade" id="editAffiliationModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-shield-check text-primary me-2"></i>Edit Board Affiliation & Codes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editAffiliationForm" onsubmit="saveAffiliationProfile(event)">
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Curriculum / Affiliation Board <span class="required">*</span></label>
              <select class="form-select" id="inputBoardName">
                <option value="Central Board of Secondary Education (CBSE)">Central Board of Secondary Education (CBSE)</option>
                <option value="Council for the Indian School Certificate Examinations (CISCE / ICSE)">Council for Indian School Certificate Examinations (ICSE)</option>
                <option value="State Board of Secondary & Higher Secondary Education">State Board</option>
                <option value="International Baccalaureate (IB)">International Baccalaureate (IB)</option>
                <option value="Cambridge Assessment International (CAIE / IGCSE)">Cambridge (IGCSE)</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Affiliation Number <span class="required">*</span></label>
              <input type="text" class="form-control font-mono" id="inputAffilNo" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">School Code / Examination Centre Code</label>
              <input type="text" class="form-control font-mono" id="inputSchoolCode" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Government U-DISE+ Code</label>
              <input type="text" class="form-control font-mono" id="inputUdiseCode" required maxlength="15">
            </div>
            <div class="col-md-6">
              <label class="form-label">State Recognition / NOC Order No.</label>
              <input type="text" class="form-control font-mono" id="inputStateRecog">
            </div>
            <div class="col-md-6">
              <label class="form-label">Current Affiliation Valid Till</label>
              <input type="text" class="form-control" id="inputAffilValidity" placeholder="e.g. 01-Apr-2024 to 31-Mar-2029">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-check-lg me-1"></i> Update Affiliation</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- 3. Modal: Edit Leadership & Officials -->
<div class="modal fade" id="editLeadershipModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-people-fill text-primary me-2"></i>Edit Leadership & Officials</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editLeadershipForm" onsubmit="saveLeadershipProfile(event)">
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-12"><h6 class="fw-bold text-primary mb-1 border-bottom pb-1">Head of School / Principal</h6></div>
            <div class="col-md-6">
              <label class="form-label">Principal Full Name <span class="required">*</span></label>
              <input type="text" class="form-control" id="inputPrincipalName" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Official Designation</label>
              <input type="text" class="form-control" id="inputPrincipalRole">
            </div>
            <div class="col-md-6">
              <label class="form-label">Qualifications</label>
              <input type="text" class="form-control" id="inputPrincipalQual">
            </div>
            <div class="col-md-6">
              <label class="form-label">Total Educational Experience</label>
              <input type="text" class="form-control" id="inputPrincipalExp">
            </div>
            <div class="col-md-6">
              <label class="form-label">Direct Contact Phone</label>
              <input type="text" class="form-control" id="inputPrincipalPhone">
            </div>
            <div class="col-md-6">
              <label class="form-label">Official Email Address</label>
              <input type="email" class="form-control font-mono" id="inputPrincipalEmail">
            </div>

            <div class="col-12 mt-3"><h6 class="fw-bold text-primary mb-1 border-bottom pb-1">Vice Principal & Trust Leadership</h6></div>
            <div class="col-md-6">
              <label class="form-label">Vice Principal Name</label>
              <input type="text" class="form-control" id="inputVpName">
            </div>
            <div class="col-md-6">
              <label class="form-label">Chairman / President (Trust/SMC)</label>
              <input type="text" class="form-control" id="inputChairName">
            </div>
            <div class="col-md-6">
              <label class="form-label">POCSO / Child Protection Nodal Officer</label>
              <input type="text" class="form-control" id="inputPocsoName">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-check-lg me-1"></i> Update Leadership</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- 4. Modal: Edit Contact & Location Information -->
<div class="modal fade" id="editContactModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-telephone text-primary me-2"></i>Edit Contact & Digital Presence</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editContactForm" onsubmit="saveContactProfile(event)">
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label">Full Campus Postal Address <span class="required">*</span></label>
              <textarea class="form-control" id="inputAddress" rows="2" required></textarea>
            </div>
            <div class="col-md-6">
              <label class="form-label">City, State & Pincode</label>
              <input type="text" class="form-control" id="inputCityState">
            </div>
            <div class="col-md-6">
              <label class="form-label">GPS Latitude & Longitude</label>
              <input type="text" class="form-control font-mono" id="inputGpsCoords" placeholder="e.g. Lat: 28.6139° N, Long: 77.2090° E">
            </div>
            <div class="col-md-6">
              <label class="form-label">General PBX Phone Lines</label>
              <input type="text" class="form-control" id="inputPhone1">
            </div>
            <div class="col-md-6">
              <label class="form-label">Admissions Hotline</label>
              <input type="text" class="form-control" id="inputPhoneAdmissions">
            </div>
            <div class="col-md-6">
              <label class="form-label">Official Inquiries Email</label>
              <input type="email" class="form-control font-mono" id="inputEmail">
            </div>
            <div class="col-md-6">
              <label class="form-label">Official Website URL</label>
              <input type="text" class="form-control font-mono" id="inputWebsite">
            </div>
            <div class="col-md-4">
              <label class="form-label">Twitter / X Handle</label>
              <input type="text" class="form-control font-mono" id="inputTwitter">
            </div>
            <div class="col-md-4">
              <label class="form-label">Facebook Page Slug</label>
              <input type="text" class="form-control font-mono" id="inputFacebook">
            </div>
            <div class="col-md-4">
              <label class="form-label">Instagram Handle</label>
              <input type="text" class="form-control font-mono" id="inputInstagram">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-check-lg me-1"></i> Update Contact Info</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- 5. Modal: Edit Bank & Statutory IDs -->
<div class="modal fade" id="editBankModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-bank2 text-primary me-2"></i>Edit Financial & Tax Identifiers</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editBankForm" onsubmit="saveBankProfile(event)">
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Bank & Branch Name <span class="required">*</span></label>
              <input type="text" class="form-control" id="inputBankName" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Account Holder / Title</label>
              <input type="text" class="form-control" id="inputBankHolder" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Bank Account Number <span class="required">*</span></label>
              <input type="text" class="form-control font-mono" id="inputBankAccNo" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">IFSC Code <span class="required">*</span></label>
              <input type="text" class="form-control font-mono" id="inputBankIfsc" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Income Tax PAN Number</label>
              <input type="text" class="form-control font-mono" id="inputTaxPan" maxlength="10">
            </div>
            <div class="col-md-6">
              <label class="form-label">TAN Number</label>
              <input type="text" class="form-control font-mono" id="inputTaxTan" maxlength="10">
            </div>
            <div class="col-md-6">
              <label class="form-label">EPFO Code</label>
              <input type="text" class="form-control font-mono" id="inputTaxEpfo">
            </div>
            <div class="col-md-6">
              <label class="form-label">ESIC Code</label>
              <input type="text" class="form-control font-mono" id="inputTaxEsic">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-check-lg me-1"></i> Save Bank Info</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- 6. Modal: Upload Document to Vault -->
<div class="modal fade" id="uploadVaultDocModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-cloud-arrow-up text-primary me-2"></i>Upload to Statutory Document Vault</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="uploadDocForm" onsubmit="handleDocVaultUpload(event)">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Document Title / Certificate Name <span class="required">*</span></label>
            <input type="text" class="form-control" id="vaultDocTitle" required placeholder="e.g. CBSE Affiliation Certificate 2024-29">
          </div>
          <div class="mb-3">
            <label class="form-label">Document Category <span class="required">*</span></label>
            <select class="form-select" id="vaultDocCategory" required>
              <option value="Statutory Affiliation">Statutory Affiliation & Board</option>
              <option value="Safety & Health NOC">Safety, Fire & Health NOC</option>
              <option value="Land & Infrastructure">Land & Infrastructure Deed</option>
              <option value="Trust & Governance">Trust & Governance Resolution</option>
              <option value="Financial & Audit">Financial Audit & Tax Exemption</option>
            </select>
          </div>
          <div class="row g-2 mb-3">
            <div class="col-6">
              <label class="form-label">Issuing Authority</label>
              <input type="text" class="form-control" id="vaultDocIssuer" placeholder="e.g. Delhi Fire Services">
            </div>
            <div class="col-6">
              <label class="form-label">Valid Until</label>
              <input type="date" class="form-control" id="vaultDocExpiry">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Choose Document File (PDF, DOCX, PNG) <span class="required">*</span></label>
            <input type="file" class="form-control" id="vaultDocFile" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg">
            <div class="form-text font-size-11">Digital vault securely catalogs document metadata and certificates for regulatory inspections.</div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-check-lg me-1"></i> Upload to Vault</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- 7. Modal: Update Crest / Branding Logo -->
<div class="modal fade" id="changeCrestModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-award-fill text-primary me-2"></i>Update School Crest & Insignia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="changeCrestForm" onsubmit="handleCrestUpdate(event)">
        <div class="modal-body text-center">
          <div class="profile-crest-wrapper mx-auto mb-3" id="modalCrestPreview" style="width: 100px; height: 100px; font-size: 2.5rem;">
            <span id="crestPreviewText">DPGA</span>
          </div>
          <div class="mb-3 text-start">
            <label class="form-label">Crest Initials / Acronym</label>
            <input type="text" class="form-control font-mono text-center" id="inputCrestInitials" maxlength="5" value="DPGA" oninput="updateCrestPreview(this.value)">
          </div>
          <div class="mb-3 text-start">
            <label class="form-label">Upload High-Res Crest Emblem (PNG / SVG with transparency)</label>
            <input type="file" class="form-control" accept="image/*">
            <div class="form-text font-size-11">Recommended resolution: 512x512 PNG, circular or shield insignia format.</div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-check-lg me-1"></i> Apply Crest</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- 8. Modal: Certificate & Statutory Document Preview Modal -->
<div class="modal fade" id="previewCertModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-size-15"><i class="bi bi-file-earmark-check-fill text-primary me-2"></i>Official Statutory Record Preview</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4 bg-light">
        <div class="p-4 bg-white border rounded-3 shadow-sm mx-auto" style="max-width: 650px;" id="certPrintArea">
          <div class="text-center pb-3 border-bottom mb-3">
            <div class="badge bg-primary text-white mb-2 px-3 py-1 font-size-12">GOVERNMENT OF NATIONAL CAPITAL TERRITORY OF DELHI</div>
            <h5 class="fw-bold mb-0 text-dark" id="modalCertTitle">Statutory Certificate</h5>
            <div class="font-size-12 text-muted mt-1" id="modalCertIssuer">Issuing Authority: Directorate of Education</div>
          </div>

          <div class="row g-2 mb-3 font-size-13">
            <div class="col-6"><strong>Certificate Ref No:</strong> <span class="font-mono text-primary" id="modalCertRef">STR/PWD/2022/9041</span></div>
            <div class="col-6 text-end"><strong>Validity:</strong> <span class="badge bg-success-subtle text-success border" id="modalCertExpiry">Valid till 2027</span></div>
            <div class="col-12 mt-2"><strong>Institution:</strong> Delhi Public Global Academy (Affil No: 2130892)</div>
            <div class="col-12"><strong>Premises:</strong> Sector 14, Knowledge City, Dwarka Expressway, New Delhi - 110075</div>
          </div>

          <div class="p-3 bg-app rounded-2 border mb-3 font-size-12 text-muted">
            This certifies that the institution has undergone rigorous statutory verification in full compliance with the statutory codes and bylaws. The parameters inspected satisfy all required criteria for school operations.
          </div>

          <div class="d-flex align-items-center justify-content-between pt-3 border-top">
            <div class="text-center">
              <i class="bi bi-qr-code fs-1 text-dark d-block"></i>
              <span class="font-size-10 text-muted">Digital UID Stamped</span>
            </div>
            <div class="text-center">
              <div class="fw-bold font-size-12 text-primary">[ Digitally Signed ]</div>
              <div class="font-size-11 text-muted">Competent Verification Authority</div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="printCert()"><i class="bi bi-printer me-1"></i> Print Certificate</button>
      </div>
    </div>
  </div>
</div>

<!-- =========================================================================
     JAVASCRIPT LOGIC & LOCALSTORAGE PERSISTENCE
     ========================================================================= -->
<script>
const PROFILE_STORAGE_KEY = 'edusys_school_profile_data';

// Default Master Profile Dataset
const defaultSchoolProfile = {
  name: "Delhi Public Global Academy",
  short_name: "DPGA",
  tagline: "Excellence in Holistic Education & Innovation",
  est_year: "1998",
  trust_name: "Vidya Mandir Educational & Charitable Trust",
  trust_reg_no: "REG/TR/1997/DELHI/4829",
  category: "Private Unaided / Society Run",
  medium: "English (Primary), Hindi & Sanskrit (Secondary Languages)",
  shift_timing: "General Shift: 07:45 AM – 02:15 PM",
  vision: "To nurture inquisitive minds and compassionate hearts through holistic pedagogy, state-of-the-art technological immersion, and rooted ethical values, shaping dynamic global leaders for a transforming world.",
  mission: "Deliver rigorous CBSE-aligned scholastic and co-scholastic excellence in a safe, technologically advanced, and inclusive learning habitat where every learner discovers their individual genius.",
  
  // Affiliation
  board_name: "Central Board of Secondary Education (CBSE)",
  affil_no: "2130892",
  school_code: "70142",
  udise_code: "07010401824",
  state_recog_no: "EDN-DEL-ACT-1999/8841-A",
  affil_validity: "01-Apr-2024 to 31-Mar-2029 (5 Years Extension)",
  
  // Leadership
  principal_name: "Dr. Sunita Rao",
  principal_role: "Principal & Member Secretary (SMC)",
  principal_qual: "M.Sc. (Physics), M.Ed., Ph.D. in Educational Leadership",
  principal_exp: "24 Years",
  principal_phone: "+91 11 2893 4005",
  principal_email: "principal@dpglobalacademy.edu.in",
  vp_name: "Vikramaditya Sengupta",
  chair_name: "Shri Rajeshwar Nath Goel",
  pocso_name: "Mrs. Anjali Saxena",
  
  // Contact & Location
  address: "Sector 14, Knowledge City, Dwarka Expressway Sub-City, New Delhi - 110075, India",
  city_state: "Knowledge City, New Delhi",
  gps_coords: "Lat: 28.613939° N, Long: 77.209021° E",
  phone1: "+91 11 2893 4000, 4001",
  phone_admissions: "+91 98110 99450, +91 11 2893 4010",
  email: "info@dpglobalacademy.edu.in",
  website: "https://www.dpglobalacademy.edu.in",
  twitter: "@DPGAcademyDelhi",
  facebook: "/DelhiPublicGlobalAcademy",
  instagram: "@dpgaindia",
  
  // Banking & Tax
  bank_name: "HDFC Bank Ltd, Sector 14 Knowledge City Branch",
  bank_holder: "Delhi Public Global Academy (Vidya Mandir Trust)",
  bank_acc_no: "50200084918234",
  bank_ifsc: "HDFC0001892",
  bank_swift: "HDFCINBBDEL",
  tax_pan: "AAATD8921K",
  tax_tan: "DELT09281C",
  tax_gstin: "07AAATD8921K1Z2 (Educational Exemption)",
  tax_epfo: "DL/CPM/8912300/000",
  tax_esic: "11000892010001001",
  
  // Infrastructure
  campus_area: "14.5 Acres",
  built_area: "185,000 sq. ft (17,187 sq. mtr)",
  playground_area: "7.2 Acres (Dedicated Sports Ground)",
  total_classrooms: "84"
};

let currentProfile = {};
let isAccMasked = false;

// Load Profile from LocalStorage or Defaults
function loadProfile() {
  const saved = localStorage.getItem(PROFILE_STORAGE_KEY);
  if (saved) {
    try {
      currentProfile = Object.assign({}, defaultSchoolProfile, JSON.parse(saved));
    } catch (e) {
      currentProfile = Object.assign({}, defaultSchoolProfile);
    }
  } else {
    currentProfile = Object.assign({}, defaultSchoolProfile);
  }
  renderProfileToDOM();
}

// Render Data to Elements
function renderProfileToDOM() {
  const p = currentProfile;
  
  // Header / Hero Elements
  setText('displaySchoolName', p.name);
  setText('displayCrestInitials', p.short_name);
  setText('displayCrestInitials2', p.short_name);
  setText('sealSchoolName', p.name);
  setText('displayTagline', `"${p.tagline}"`);
  setText('displayEstYear', p.est_year);
  setText('displayAffilNo', p.affil_no);
  setText('displaySchoolCode', p.school_code);
  setText('displayUdise', p.udise_code);
  setText('displayCityState', p.city_state);
  
  // General Tab
  setText('fieldSchoolFullName', p.name);
  setText('fieldSchoolShortName', p.short_name);
  setText('fieldTrustName', p.trust_name);
  setText('fieldTrustRegNo', p.trust_reg_no);
  setText('fieldFoundationYear', `${p.est_year} (Silver Jubilee Accredited)`);
  setText('fieldSchoolCategory', p.category);
  setText('fieldMedium', p.medium);
  setText('fieldShiftTiming', p.shift_timing);
  setText('fieldVision', p.vision);
  setText('fieldMission', p.mission);
  
  // Affiliation Tab
  setText('fieldBoardName', p.board_name);
  setText('fieldAffilNo2', p.affil_no);
  setText('fieldSchoolCode2', p.school_code);
  setText('fieldUdiseCode2', p.udise_code);
  setText('fieldStateRecogNo', p.state_recog_no);
  setText('fieldAffilValidity', p.affil_validity);
  
  // Campus Tab
  setText('kpiCampusArea', p.campus_area);
  setText('fieldLandArea', `${p.campus_area} (58,679 sq. mtr)`);
  setText('fieldBuiltArea', p.built_area);
  setText('fieldPlaygroundArea', p.playground_area);
  setText('fieldTotalClassrooms', p.total_classrooms);
  setText('fieldGpsCoords', p.gps_coords);
  
  // Leadership Tab
  setText('dispPrincipalName', p.principal_name);
  setText('dispPrincipalRole', p.principal_role);
  setText('dispPrincipalQual', p.principal_qual);
  setText('dispPrincipalExp', p.principal_exp);
  setText('dispPrincipalPhone', p.principal_phone);
  setText('dispPrincipalEmail', p.principal_email);
  setText('dispVpName', p.vp_name);
  setText('dispChairName', p.chair_name);
  setText('dispPocsoName', p.pocso_name);
  
  // Compute Principal Avatar Initials
  const names = p.principal_name.replace(/^(Dr\.|Mr\.|Mrs\.|Ms\.)\s*/i, '').trim().split(' ');
  const initials = names.length > 1 ? (names[0][0] + names[names.length - 1][0]).toUpperCase() : names[0].substring(0, 2).toUpperCase();
  setText('dispPrincipalAvatar', initials);
  
  // Contact Tab
  setText('contactDispSchoolName', p.name);
  setText('contactDispAddress', p.address);
  setText('contactDispPhone1', p.phone1);
  setText('contactDispPhoneAdmissions', p.phone_admissions);
  setText('contactDispEmail', p.email);
  setText('contactDispWebsite', p.website);
  setText('contactDispTwitter', p.twitter);
  setText('contactDispFacebook', p.facebook);
  setText('contactDispInstagram', p.instagram);
  
  // Banking & Tax
  setText('bankDispName', p.bank_name);
  setText('bankDispHolder', p.bank_holder);
  setText('bankDispIfsc', p.bank_ifsc);
  setText('bankDispSwift', p.bank_swift);
  setText('taxDispPan', p.tax_pan);
  setText('taxDispTan', p.tax_tan);
  setText('taxDispEpfo', p.tax_epfo);
  setText('taxDispEsic', p.tax_esic);
  renderAccNumber();
}

function setText(id, text) {
  const el = document.getElementById(id);
  if (el) el.textContent = text || '';
}

function renderAccNumber() {
  const el = document.getElementById('bankDispAccNo');
  if (!el) return;
  const raw = currentProfile.bank_acc_no || '50200084918234';
  if (isAccMasked) {
    el.textContent = '•••• •••• •••• ' + raw.slice(-4);
  } else {
    el.textContent = raw;
  }
}

function toggleAccMask() {
  isAccMasked = !isAccMasked;
  renderAccNumber();
  const icon = document.getElementById('maskEyeIcon');
  if (icon) {
    icon.className = isAccMasked ? 'bi bi-eye-slash' : 'bi bi-eye';
  }
}

// Pre-fill Forms on Modal Show
document.addEventListener('DOMContentLoaded', function() {
  loadProfile();

  // Edit General Modal
  const editGeneralModal = document.getElementById('editGeneralModal');
  if (editGeneralModal) {
    editGeneralModal.addEventListener('show.bs.modal', function () {
      document.getElementById('inputSchoolName').value = currentProfile.name;
      document.getElementById('inputSchoolShort').value = currentProfile.short_name;
      document.getElementById('inputTagline').value = currentProfile.tagline;
      document.getElementById('inputTrustName').value = currentProfile.trust_name;
      document.getElementById('inputTrustRegNo').value = currentProfile.trust_reg_no;
      document.getElementById('inputEstYear').value = currentProfile.est_year;
      document.getElementById('inputMedium').value = currentProfile.medium;
      document.getElementById('inputCategory').value = currentProfile.category;
      document.getElementById('inputShiftTiming').value = currentProfile.shift_timing;
      document.getElementById('inputVision').value = currentProfile.vision;
      document.getElementById('inputMission').value = currentProfile.mission;
    });
  }

  // Edit Affiliation Modal
  const editAffilModal = document.getElementById('editAffiliationModal');
  if (editAffilModal) {
    editAffilModal.addEventListener('show.bs.modal', function () {
      document.getElementById('inputBoardName').value = currentProfile.board_name;
      document.getElementById('inputAffilNo').value = currentProfile.affil_no;
      document.getElementById('inputSchoolCode').value = currentProfile.school_code;
      document.getElementById('inputUdiseCode').value = currentProfile.udise_code;
      document.getElementById('inputStateRecog').value = currentProfile.state_recog_no;
      document.getElementById('inputAffilValidity').value = currentProfile.affil_validity;
    });
  }

  // Edit Leadership Modal
  const editLeadModal = document.getElementById('editLeadershipModal');
  if (editLeadModal) {
    editLeadModal.addEventListener('show.bs.modal', function () {
      document.getElementById('inputPrincipalName').value = currentProfile.principal_name;
      document.getElementById('inputPrincipalRole').value = currentProfile.principal_role;
      document.getElementById('inputPrincipalQual').value = currentProfile.principal_qual;
      document.getElementById('inputPrincipalExp').value = currentProfile.principal_exp;
      document.getElementById('inputPrincipalPhone').value = currentProfile.principal_phone;
      document.getElementById('inputPrincipalEmail').value = currentProfile.principal_email;
      document.getElementById('inputVpName').value = currentProfile.vp_name;
      document.getElementById('inputChairName').value = currentProfile.chair_name;
      document.getElementById('inputPocsoName').value = currentProfile.pocso_name;
    });
  }

  // Edit Contact Modal
  const editContModal = document.getElementById('editContactModal');
  if (editContModal) {
    editContModal.addEventListener('show.bs.modal', function () {
      document.getElementById('inputAddress').value = currentProfile.address;
      document.getElementById('inputCityState').value = currentProfile.city_state;
      document.getElementById('inputGpsCoords').value = currentProfile.gps_coords;
      document.getElementById('inputPhone1').value = currentProfile.phone1;
      document.getElementById('inputPhoneAdmissions').value = currentProfile.phone_admissions;
      document.getElementById('inputEmail').value = currentProfile.email;
      document.getElementById('inputWebsite').value = currentProfile.website;
      document.getElementById('inputTwitter').value = currentProfile.twitter;
      document.getElementById('inputFacebook').value = currentProfile.facebook;
      document.getElementById('inputInstagram').value = currentProfile.instagram;
    });
  }

  // Edit Bank Modal
  const editBnkModal = document.getElementById('editBankModal');
  if (editBnkModal) {
    editBnkModal.addEventListener('show.bs.modal', function () {
      document.getElementById('inputBankName').value = currentProfile.bank_name;
      document.getElementById('inputBankHolder').value = currentProfile.bank_holder;
      document.getElementById('inputBankAccNo').value = currentProfile.bank_acc_no;
      document.getElementById('inputBankIfsc').value = currentProfile.bank_ifsc;
      document.getElementById('inputTaxPan').value = currentProfile.tax_pan;
      document.getElementById('inputTaxTan').value = currentProfile.tax_tan;
      document.getElementById('inputTaxEpfo').value = currentProfile.tax_epfo;
      document.getElementById('inputTaxEsic').value = currentProfile.tax_esic;
    });
  }
});

// Save Handlers
function saveGeneralProfile(e) {
  e.preventDefault();
  currentProfile.name = document.getElementById('inputSchoolName').value.trim();
  currentProfile.short_name = document.getElementById('inputSchoolShort').value.trim().toUpperCase();
  currentProfile.tagline = document.getElementById('inputTagline').value.trim();
  currentProfile.trust_name = document.getElementById('inputTrustName').value.trim();
  currentProfile.trust_reg_no = document.getElementById('inputTrustRegNo').value.trim();
  currentProfile.est_year = document.getElementById('inputEstYear').value.trim();
  currentProfile.medium = document.getElementById('inputMedium').value.trim();
  currentProfile.category = document.getElementById('inputCategory').value;
  currentProfile.shift_timing = document.getElementById('inputShiftTiming').value.trim();
  currentProfile.vision = document.getElementById('inputVision').value.trim();
  currentProfile.mission = document.getElementById('inputMission').value.trim();

  persistProfile();
  bootstrap.Modal.getInstance(document.getElementById('editGeneralModal')).hide();
  notifySuccess("Institutional Identity updated successfully!");
}

function saveAffiliationProfile(e) {
  e.preventDefault();
  currentProfile.board_name = document.getElementById('inputBoardName').value;
  currentProfile.affil_no = document.getElementById('inputAffilNo').value.trim();
  currentProfile.school_code = document.getElementById('inputSchoolCode').value.trim();
  currentProfile.udise_code = document.getElementById('inputUdiseCode').value.trim();
  currentProfile.state_recog_no = document.getElementById('inputStateRecog').value.trim();
  currentProfile.affil_validity = document.getElementById('inputAffilValidity').value.trim();

  persistProfile();
  bootstrap.Modal.getInstance(document.getElementById('editAffiliationModal')).hide();
  notifySuccess("Affiliation details & codes updated successfully!");
}

function saveLeadershipProfile(e) {
  e.preventDefault();
  currentProfile.principal_name = document.getElementById('inputPrincipalName').value.trim();
  currentProfile.principal_role = document.getElementById('inputPrincipalRole').value.trim();
  currentProfile.principal_qual = document.getElementById('inputPrincipalQual').value.trim();
  currentProfile.principal_exp = document.getElementById('inputPrincipalExp').value.trim();
  currentProfile.principal_phone = document.getElementById('inputPrincipalPhone').value.trim();
  currentProfile.principal_email = document.getElementById('inputPrincipalEmail').value.trim();
  currentProfile.vp_name = document.getElementById('inputVpName').value.trim();
  currentProfile.chair_name = document.getElementById('inputChairName').value.trim();
  currentProfile.pocso_name = document.getElementById('inputPocsoName').value.trim();

  persistProfile();
  bootstrap.Modal.getInstance(document.getElementById('editLeadershipModal')).hide();
  notifySuccess("Leadership & SMC officers updated successfully!");
}

function saveContactProfile(e) {
  e.preventDefault();
  currentProfile.address = document.getElementById('inputAddress').value.trim();
  currentProfile.city_state = document.getElementById('inputCityState').value.trim();
  currentProfile.gps_coords = document.getElementById('inputGpsCoords').value.trim();
  currentProfile.phone1 = document.getElementById('inputPhone1').value.trim();
  currentProfile.phone_admissions = document.getElementById('inputPhoneAdmissions').value.trim();
  currentProfile.email = document.getElementById('inputEmail').value.trim();
  currentProfile.website = document.getElementById('inputWebsite').value.trim();
  currentProfile.twitter = document.getElementById('inputTwitter').value.trim();
  currentProfile.facebook = document.getElementById('inputFacebook').value.trim();
  currentProfile.instagram = document.getElementById('inputInstagram').value.trim();

  persistProfile();
  bootstrap.Modal.getInstance(document.getElementById('editContactModal')).hide();
  notifySuccess("Contact details & channels updated successfully!");
}

function saveBankProfile(e) {
  e.preventDefault();
  currentProfile.bank_name = document.getElementById('inputBankName').value.trim();
  currentProfile.bank_holder = document.getElementById('inputBankHolder').value.trim();
  currentProfile.bank_acc_no = document.getElementById('inputBankAccNo').value.trim();
  currentProfile.bank_ifsc = document.getElementById('inputBankIfsc').value.trim();
  currentProfile.tax_pan = document.getElementById('inputTaxPan').value.trim().toUpperCase();
  currentProfile.tax_tan = document.getElementById('inputTaxTan').value.trim().toUpperCase();
  currentProfile.tax_epfo = document.getElementById('inputTaxEpfo').value.trim();
  currentProfile.tax_esic = document.getElementById('inputTaxEsic').value.trim();

  persistProfile();
  bootstrap.Modal.getInstance(document.getElementById('editBankModal')).hide();
  notifySuccess("Bank account & statutory tax codes saved!");
}

function handleCrestUpdate(e) {
  e.preventDefault();
  const initials = document.getElementById('inputCrestInitials').value.trim().toUpperCase();
  if (initials) {
    currentProfile.short_name = initials;
    persistProfile();
  }
  bootstrap.Modal.getInstance(document.getElementById('changeCrestModal')).hide();
  notifySuccess("Official institutional crest updated!");
}

function updateCrestPreview(val) {
  const preview = document.getElementById('crestPreviewText');
  if (preview) preview.textContent = val.toUpperCase() || 'SCH';
}

function handleDocVaultUpload(e) {
  e.preventDefault();
  const title = document.getElementById('vaultDocTitle').value.trim();
  const issuer = document.getElementById('vaultDocIssuer').value.trim() || 'Regulatory Authority';
  const expiry = document.getElementById('vaultDocExpiry').value || 'Permanent';
  
  // Append new card dynamically to Document Vault
  const grid = document.getElementById('vaultDocsGrid');
  if (grid) {
    const col = document.createElement('div');
    col.className = 'col-md-6 col-xl-3 table-row-new';
    col.innerHTML = `
      <div class="doc-vault-item">
        <div class="d-flex align-items-start justify-content-between mb-3">
          <div class="doc-icon-wrap"><i class="bi bi-file-earmark-check-fill text-success"></i></div>
          <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Uploaded</span>
        </div>
        <h6 class="fw-bold font-size-14 text-main mb-1">${title}</h6>
        <p class="font-size-12 text-muted mb-3">Issued by ${issuer}. Valid: ${expiry}</p>
        <div class="mt-auto pt-2 border-top d-flex align-items-center justify-content-between font-size-12 text-muted">
          <span>PDF • 1.4 MB</span>
          <div class="d-flex gap-1">
            <button class="btn btn-xs btn-light border" onclick="previewCertificate('${title.replace(/'/g, "\\'")}', '${issuer.replace(/'/g, "\\'")}', 'REG-NEW-2024', '${expiry}')"><i class="bi bi-eye"></i></button>
            <button class="btn btn-xs btn-light border" onclick="simulateDownload('${title.replace(/\s+/g, '_')}.pdf')"><i class="bi bi-download"></i></button>
          </div>
        </div>
      </div>
    `;
    grid.prepend(col);
  }

  // Update Vault count badge
  const countBadge = document.getElementById('vaultDocCountBadge');
  if (countBadge) {
    countBadge.textContent = parseInt(countBadge.textContent || '8') + 1;
  }

  bootstrap.Modal.getInstance(document.getElementById('uploadVaultDocModal')).hide();
  document.getElementById('uploadDocForm').reset();
  notifySuccess(`"${title}" successfully vaulted and cataloged!`);
}

function persistProfile() {
  localStorage.setItem(PROFILE_STORAGE_KEY, JSON.stringify(currentProfile));
  renderProfileToDOM();
}

function resetProfileDefaults() {
  if (confirm("Reset school profile to demo factory settings? Any custom unsaved edits will be restored.")) {
    localStorage.removeItem(PROFILE_STORAGE_KEY);
    currentProfile = Object.assign({}, defaultSchoolProfile);
    renderProfileToDOM();
    notifySuccess("Profile restored to initial default state!");
  }
}

function notifySuccess(msg) {
  if (window.EduApp && window.EduApp.toast) {
    EduApp.toast(msg, "success", "School Profile");
  } else {
    alert(msg);
  }
}

// Modal Certificate Preview
function previewCertificate(title, issuer, ref, expiry) {
  setText('modalCertTitle', title);
  setText('modalCertIssuer', 'Issuing Authority: ' + issuer);
  setText('modalCertRef', ref);
  setText('modalCertExpiry', 'Valid: ' + expiry);
  const modalEl = document.getElementById('previewCertModal');
  if (modalEl) {
    const modal = new bootstrap.Modal(modalEl);
    modal.show();
  }
}

function printCert() {
  window.print();
}

function printVaultRegister() {
  window.print();
}

function simulateDownload(filename) {
  notifySuccess(`Downloading official file: ${filename}`);
}

function exportProfileJSON() {
  const dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(currentProfile, null, 2));
  const downloadAnchor = document.createElement('a');
  downloadAnchor.setAttribute("href", dataStr);
  downloadAnchor.setAttribute("download", `${currentProfile.short_name || 'school'}_profile_factsheet.json`);
  document.body.appendChild(downloadAnchor);
  downloadAnchor.click();
  downloadAnchor.remove();
  notifySuccess("Institutional factsheet exported successfully!");
}
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
