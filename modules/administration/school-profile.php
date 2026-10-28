<?php
/**
 * EDUSYS PRO - School Profile & Institutional Master
 * Polished executive layout: institutional identity, statutory affiliations, campus infrastructure, governance & document vault
 */
$page_title = "School Profile";
$page_desc = "Institutional master identity, statutory affiliations, physical infrastructure & leadership dossier";
$active_module = "administration";
$active_submodule = "school-profile.php";
$depth = 2;
$hide_common_modals = true;

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
    <button class="btn btn-light border" onclick="window.print()" title="Print Institutional Dossier">
      <i class="bi bi-printer me-1"></i> Print Factsheet
    </button>
    <button class="btn btn-light border" onclick="exportProfileJSON()" title="Export JSON Data">
      <i class="bi bi-download me-1"></i> Export Data
    </button>
    <button class="btn btn-outline-danger border" onclick="resetProfileDefaults()" title="Reset to Sample Defaults">
      <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
    </button>
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#editGeneralModal">
      <i class="bi bi-pencil-square me-1"></i> Edit School Profile
    </button>
  </div>
</div>

<!-- Master Institutional Hero Banner -->
<div class="profile-hero-card">
  <div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center justify-content-between gap-4">
    <div class="d-flex align-items-center gap-3">
      <div class="profile-crest-badge" id="displayCrestBox">
        <span id="displayCrestInitials"><?php echo htmlspecialchars($school_config['short_name']); ?></span>
        <div class="crest-check" title="CBSE Affiliated & Verified"><i class="bi bi-check-lg"></i></div>
      </div>
      <div>
        <div class="d-flex flex-wrap align-items-center gap-2 mb-1">
          <h2 class="h4 fw-bold mb-0 text-dark" id="displaySchoolName"><?php echo htmlspecialchars($school_config['name']); ?></h2>
          <span class="badge bg-primary text-white font-size-11 px-2.5 py-1 rounded-pill">
            <i class="bi bi-shield-check me-1"></i> CBSE Affiliated (K-12)
          </span>
          <span class="badge bg-success-subtle text-success border border-success border-opacity-25 font-size-11 px-2.5 py-1 rounded-pill">
            <i class="bi bi-patch-check-fill me-1"></i> Verified &amp; Compliant
          </span>
          <span class="badge bg-light text-muted border font-size-11">
            <i class="bi bi-calendar3 me-1"></i> Est. <span id="displayEstYear">1998</span>
          </span>
        </div>
        <p class="text-muted mb-2 fst-italic font-size-13" id="displayTagline">"<?php echo htmlspecialchars($school_config['tagline']); ?>"</p>
        <div class="d-flex flex-wrap align-items-center gap-3 text-muted font-size-12">
          <span><i class="bi bi-award text-primary me-1"></i> Affiliation No: <strong class="text-dark font-mono" id="displayAffilNo">2130892</strong></span>
          <span class="text-silver">•</span>
          <span><i class="bi bi-hash text-primary me-1"></i> School Code: <strong class="text-dark font-mono" id="displaySchoolCode">70142</strong></span>
          <span class="text-silver">•</span>
          <span><i class="bi bi-qr-code text-primary me-1"></i> U-DISE+: <strong class="text-dark font-mono" id="displayUdise">07010401824</strong></span>
          <span class="text-silver">•</span>
          <span><i class="bi bi-geo-alt text-danger me-1"></i> <span id="displayCityState">Knowledge City, New Delhi</span></span>
        </div>
      </div>
    </div>

    <!-- Hero Right: Quick Stats & Completeness -->
    <div class="d-flex flex-column align-items-lg-end gap-2 w-100 w-lg-auto">
      <div class="d-flex align-items-center gap-2">
        <span class="font-size-12 text-muted fw-semibold">Profile Completeness:</span>
        <span class="badge bg-success text-white fw-bold">98% Verified</span>
      </div>
      <div class="progress" style="width: 180px; height: 6px;">
        <div class="progress-bar bg-success" role="progressbar" style="width: 98%" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="d-flex gap-2 mt-2">
        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#changeCrestModal">
          <i class="bi bi-camera me-1"></i> Update Seal
        </button>
        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#uploadVaultDocModal">
          <i class="bi bi-cloud-arrow-up me-1"></i> Vault Doc
        </button>
      </div>
    </div>
  </div>
</div>

<!-- KPI Cards Row -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Board Affiliation</h6>
        <div class="kpi-value text-primary">CBSE K-12</div>
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
        <h6>Student Enrollment</h6>
        <div class="kpi-value"><span id="kpiEnrolled">2,840</span> <span class="font-size-13 text-muted fw-normal">/ 3,200</span></div>
        <div class="kpi-trend positive"><i class="bi bi-people-fill"></i> 88.8% Capacity</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-mortarboard-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Faculty &amp; Ratio</h6>
        <div class="kpi-value" id="kpiFaculty">148 Faculty</div>
        <div class="kpi-trend neutral"><i class="bi bi-person-check-fill"></i> 1:19 Teacher-Student</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-person-video3"></i></div>
    </div>
  </div>
</div>

<!-- Modern Profile Tabs Navigation -->
<ul class="nav profile-pill-tabs mb-4" id="profileTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="tab-overview-btn" data-bs-toggle="tab" data-bs-target="#tab-overview" type="button" role="tab">
      <i class="bi bi-grid-1x2-fill"></i> Institutional Dossier
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="tab-compliance-btn" data-bs-toggle="tab" data-bs-target="#tab-compliance" type="button" role="tab">
      <i class="bi bi-shield-check"></i> Statutory &amp; Safety Compliance
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="tab-governance-btn" data-bs-toggle="tab" data-bs-target="#tab-governance" type="button" role="tab">
      <i class="bi bi-people-fill"></i> Governance &amp; SMC
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="tab-vault-btn" data-bs-toggle="tab" data-bs-target="#tab-vault" type="button" role="tab">
      <i class="bi bi-safe2-fill"></i> Document Vault <span class="badge bg-primary text-white rounded-pill font-size-11 ms-1" id="vaultDocCountBadge">8</span>
    </button>
  </li>
</ul>

<!-- Tab Content Area -->
<div class="tab-content" id="profileTabContent">

  <!-- ================= TAB 1: INSTITUTIONAL DOSSIER ================= -->
  <div class="tab-pane fade show active" id="tab-overview" role="tabpanel">
    <div class="row g-4">
      <!-- Left Column: Master Specifications, Mission & Facilities -->
      <div class="col-lg-7">
        <!-- Master Specifications Table -->
        <div class="spec-table-card">
          <div class="spec-header">
            <h5 class="erp-card-title mb-0"><i class="bi bi-card-checklist text-primary"></i> Institutional Master Specifications</h5>
            <button class="btn btn-xs btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editGeneralModal">
              <i class="bi bi-pencil me-1"></i> Edit Specifications
            </button>
          </div>
          <div>
            <div class="spec-row">
              <div class="spec-label"><i class="bi bi-bank text-primary"></i> Legal School Name</div>
              <div class="spec-value text-primary fw-bold" id="fieldSchoolFullName">Delhi Public Global Academy</div>
            </div>
            <div class="spec-row">
              <div class="spec-label"><i class="bi bi-tag text-muted"></i> Short Name / Acronym</div>
              <div class="spec-value font-mono" id="fieldSchoolShortName">DPGA</div>
            </div>
            <div class="spec-row">
              <div class="spec-label"><i class="bi bi-diagram-3 text-muted"></i> Managing Society / Trust</div>
              <div class="spec-value" id="fieldTrustName">Vidya Mandir Educational &amp; Charitable Trust</div>
            </div>
            <div class="spec-row">
              <div class="spec-label"><i class="bi bi-hash text-muted"></i> Society Registration No.</div>
              <div class="spec-value font-mono" id="fieldTrustRegNo">REG/TR/1997/DELHI/4829</div>
            </div>
            <div class="spec-row">
              <div class="spec-label"><i class="bi bi-calendar-check text-muted"></i> Year of Foundation</div>
              <div class="spec-value" id="fieldFoundationYear">1998 (Silver Jubilee Accredited)</div>
            </div>
            <div class="spec-row">
              <div class="spec-label"><i class="bi bi-building-gear text-muted"></i> Category &amp; Status</div>
              <div class="spec-value" id="fieldSchoolCategory">Private Unaided / Non-Proprietary Educational Society</div>
            </div>
            <div class="spec-row">
              <div class="spec-label"><i class="bi bi-translate text-muted"></i> Medium of Instruction</div>
              <div class="spec-value" id="fieldMedium">English (Primary), Hindi &amp; Sanskrit (Secondary)</div>
            </div>
            <div class="spec-row">
              <div class="spec-label"><i class="bi bi-clock-history text-muted"></i> Academic Shift &amp; Hours</div>
              <div class="spec-value" id="fieldShiftTiming">General Shift: 07:45 AM – 02:15 PM</div>
            </div>
            <div class="spec-row">
              <div class="spec-label"><i class="bi bi-calendar-range text-muted"></i> Academic Session Period</div>
              <div class="spec-value"><span class="badge bg-primary text-white font-size-12">01 April 2024 to 31 March 2025</span></div>
            </div>
          </div>
        </div>

        <!-- Vision & Mission Box -->
        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <div class="p-3 bg-card border rounded-3 h-100 shadow-xs">
              <div class="d-flex align-items-center gap-2 mb-2">
                <div class="p-1.5 bg-primary-subtle text-primary rounded-2"><i class="bi bi-eye-fill"></i></div>
                <h6 class="fw-bold text-primary mb-0 font-size-14">Institutional Vision</h6>
              </div>
              <p class="text-muted font-size-12 mb-0" id="fieldVision">
                To nurture inquisitive minds and compassionate hearts through holistic pedagogy, state-of-the-art technological immersion, and rooted ethical values, shaping dynamic global leaders for a transforming world.
              </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="p-3 bg-card border rounded-3 h-100 shadow-xs">
              <div class="d-flex align-items-center gap-2 mb-2">
                <div class="p-1.5 bg-success-subtle text-success rounded-2"><i class="bi bi-bullseye"></i></div>
                <h6 class="fw-bold text-success mb-0 font-size-14">Institutional Mission</h6>
              </div>
              <p class="text-muted font-size-12 mb-0" id="fieldMission">
                Deliver rigorous CBSE-aligned scholastic and co-scholastic excellence in a safe, technologically advanced, and inclusive learning habitat where every learner discovers their individual genius.
              </p>
            </div>
          </div>
        </div>

        <!-- Campus Physical Spaces Grid -->
        <div class="spec-table-card">
          <div class="spec-header">
            <h5 class="erp-card-title mb-0"><i class="bi bi-building-check text-success"></i> Campus Infrastructure &amp; Physical Facilities</h5>
            <span class="font-size-12 text-muted">14.5 Acres Single Contiguous Plot</span>
          </div>
          <div class="p-3">
            <div class="row g-2">
              <div class="col-6 col-sm-4">
                <div class="facility-grid-item">
                  <div class="facility-grid-icon"><i class="bi bi-easel2-fill"></i></div>
                  <div>
                    <div class="fw-bold font-size-16" id="fieldTotalClassrooms">84</div>
                    <div class="font-size-11 text-muted">Smart Classrooms</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4">
                <div class="facility-grid-item">
                  <div class="facility-grid-icon"><i class="bi bi-flask-fill"></i></div>
                  <div>
                    <div class="fw-bold font-size-16">8</div>
                    <div class="font-size-11 text-muted">Science Labs</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4">
                <div class="facility-grid-item">
                  <div class="facility-grid-icon"><i class="bi bi-pc-display"></i></div>
                  <div>
                    <div class="fw-bold font-size-16">3</div>
                    <div class="font-size-11 text-muted">Computer Labs</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4">
                <div class="facility-grid-item">
                  <div class="facility-grid-icon"><i class="bi bi-robot"></i></div>
                  <div>
                    <div class="fw-bold font-size-16">1</div>
                    <div class="font-size-11 text-muted">Atal AI Innovation Lab</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4">
                <div class="facility-grid-item">
                  <div class="facility-grid-icon"><i class="bi bi-book-half"></i></div>
                  <div>
                    <div class="fw-bold font-size-16">2</div>
                    <div class="font-size-11 text-muted">Central Libraries</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4">
                <div class="facility-grid-item">
                  <div class="facility-grid-icon"><i class="bi bi-bus-front-fill"></i></div>
                  <div>
                    <div class="fw-bold font-size-16">32</div>
                    <div class="font-size-11 text-muted">GPS School Buses</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Column: Leadership Profile, Official Contact & Banking -->
      <div class="col-lg-5">
        <!-- Principal Executive Card -->
        <div class="spec-table-card mb-4">
          <div class="spec-header">
            <h5 class="erp-card-title mb-0"><i class="bi bi-person-badge text-primary"></i> Head of School / Principal</h5>
            <button class="btn btn-xs btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editLeadershipModal">
              <i class="bi bi-pencil me-1"></i> Edit
            </button>
          </div>
          <div class="p-3">
            <div class="d-flex align-items-center gap-3 mb-3">
              <div class="leadership-badge-card p-0 border-0">
                <div class="table-avatar bg-primary text-white" style="width: 58px; height: 58px; font-size: 1.4rem;" id="dispPrincipalAvatar">
                  SR
                </div>
              </div>
              <div>
                <h5 class="fw-bold mb-0 text-dark font-size-16" id="dispPrincipalName">Dr. Sunita Rao</h5>
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle font-size-11" id="dispPrincipalRole">Principal &amp; Member Secretary (SMC)</span>
                <div class="text-muted font-size-12 mt-1" id="dispPrincipalQual">M.Sc. (Physics), M.Ed., Ph.D.</div>
              </div>
            </div>
            <div class="font-size-12 border-top pt-2 d-flex flex-column gap-1.5 text-muted">
              <div><i class="bi bi-clock-history text-primary me-1"></i> Experience: <strong class="text-dark" id="dispPrincipalExp">24 Years</strong></div>
              <div><i class="bi bi-telephone text-primary me-1"></i> Direct Line: <strong class="text-dark font-mono" id="dispPrincipalPhone">+91 11 2893 4005</strong></div>
              <div><i class="bi bi-envelope text-primary me-1"></i> Email: <strong class="text-dark font-mono" id="dispPrincipalEmail">principal@dpglobalacademy.edu.in</strong></div>
            </div>
          </div>
        </div>

        <!-- Official Contact Directory -->
        <div class="spec-table-card mb-4">
          <div class="spec-header">
            <h5 class="erp-card-title mb-0"><i class="bi bi-geo-alt-fill text-danger"></i> Campus Contact &amp; Channels</h5>
            <button class="btn btn-xs btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editContactModal">
              <i class="bi bi-pencil me-1"></i> Edit
            </button>
          </div>
          <div>
            <div class="p-3 bg-app border-bottom">
              <div class="fw-bold text-dark font-size-13 mb-1"><i class="bi bi-pin-map text-danger me-1"></i> Campus Address:</div>
              <div class="text-muted font-size-12" id="contactDispAddress">Sector 14, Knowledge City, Dwarka Expressway Sub-City, New Delhi - 110075, India</div>
              <div class="font-mono font-size-11 text-muted mt-1" id="fieldGpsCoords">Lat: 28.613939° N, Long: 77.209021° E</div>
            </div>
            <div class="spec-row">
              <div class="spec-label"><i class="bi bi-telephone text-primary"></i> General Reception</div>
              <div class="spec-value font-mono font-size-12" id="contactDispPhone1">+91 11 2893 4000, 4001</div>
            </div>
            <div class="spec-row">
              <div class="spec-label"><i class="bi bi-headset text-success"></i> Admissions Hotline</div>
              <div class="spec-value font-mono font-size-12 text-success" id="contactDispPhoneAdmissions">+91 98110 99450</div>
            </div>
            <div class="spec-row">
              <div class="spec-label"><i class="bi bi-envelope text-primary"></i> Official Inquiries</div>
              <div class="spec-value font-mono font-size-12" id="contactDispEmail">info@dpglobalacademy.edu.in</div>
            </div>
            <div class="spec-row">
              <div class="spec-label"><i class="bi bi-globe2 text-info"></i> Official Website</div>
              <div class="spec-value font-mono font-size-12 text-primary" id="contactDispWebsite">https://www.dpglobalacademy.edu.in</div>
            </div>
          </div>
        </div>

        <!-- Banking & Statutory Tax IDs -->
        <div class="spec-table-card">
          <div class="spec-header">
            <h5 class="erp-card-title mb-0"><i class="bi bi-bank2 text-primary"></i> Primary Bank &amp; Tax Identifiers</h5>
            <button class="btn btn-xs btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editBankModal">
              <i class="bi bi-pencil me-1"></i> Edit
            </button>
          </div>
          <div>
            <div class="spec-row">
              <div class="spec-label"><i class="bi bi-building text-primary"></i> Bank &amp; Branch</div>
              <div class="spec-value text-primary font-size-13" id="bankDispName">HDFC Bank, Sector 14 Knowledge City</div>
            </div>
            <div class="spec-row">
              <div class="spec-label"><i class="bi bi-credit-card text-muted"></i> Account No.</div>
              <div class="spec-value d-flex align-items-center gap-2">
                <span class="font-mono font-size-13 text-dark fw-bold" id="bankDispAccNo">50200084918234</span>
                <button class="btn btn-xs btn-light border p-0.5 px-1" onclick="toggleAccMask()"><i class="bi bi-eye" id="maskEyeIcon"></i></button>
              </div>
            </div>
            <div class="spec-row">
              <div class="spec-label"><i class="bi bi-hash text-muted"></i> IFSC Code</div>
              <div class="spec-value font-mono font-size-13" id="bankDispIfsc">HDFC0001892</div>
            </div>
            <div class="spec-row">
              <div class="spec-label"><i class="bi bi-file-earmark-lock text-muted"></i> PAN Number</div>
              <div class="spec-value font-mono font-size-13 text-dark fw-bold" id="taxDispPan">AAATD8921K</div>
            </div>
            <div class="spec-row">
              <div class="spec-label"><i class="bi bi-receipt text-muted"></i> GSTIN &amp; 12A/80G</div>
              <div class="spec-value font-size-12"><span class="badge bg-success-subtle text-success border border-success border-opacity-25">12AA &amp; 80G Exempt</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= TAB 2: COMPLIANCE & SAFETY MATRIX ================= -->
  <div class="tab-pane fade" id="tab-compliance" role="tabpanel">
    <!-- Board Parameters Box -->
    <div class="spec-table-card mb-4">
      <div class="spec-header">
        <h5 class="erp-card-title mb-0"><i class="bi bi-patch-check-fill text-primary"></i> CBSE Affiliation Parameters</h5>
        <button class="btn btn-xs btn-primary" data-bs-toggle="modal" data-bs-target="#editAffiliationModal">
          <i class="bi bi-pencil me-1"></i> Edit Affiliation
        </button>
      </div>
      <div class="row g-0">
        <div class="col-md-6 border-end">
          <div class="spec-row">
            <div class="spec-label">Primary Board</div>
            <div class="spec-value text-primary fw-bold" id="fieldBoardName">Central Board of Secondary Education (CBSE)</div>
          </div>
          <div class="spec-row">
            <div class="spec-label">Affiliation Number</div>
            <div class="spec-value font-mono fw-bold" id="fieldAffilNo2">2130892</div>
          </div>
          <div class="spec-row">
            <div class="spec-label">School Exam Code</div>
            <div class="spec-value font-mono fw-bold" id="fieldSchoolCode2">70142</div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="spec-row">
            <div class="spec-label">U-DISE+ Code</div>
            <div class="spec-value font-mono fw-bold" id="fieldUdiseCode2">07010401824</div>
          </div>
          <div class="spec-row">
            <div class="spec-label">State Recognition No.</div>
            <div class="spec-value font-mono" id="fieldStateRecogNo">EDN-DEL-ACT-1999/8841-A</div>
          </div>
          <div class="spec-row">
            <div class="spec-label">Current Validity</div>
            <div class="spec-value font-size-13 text-success fw-bold" id="fieldAffilValidity">01-Apr-2024 to 31-Mar-2029 (5 Years Extension)</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Mandatory Statutory Safety Certificates Table -->
    <div class="erp-card">
      <div class="erp-card-header">
        <div>
          <h5 class="erp-card-title mb-0"><i class="bi bi-shield-fill-check text-success"></i> Mandatory Statutory Safety &amp; Compliance Matrix</h5>
          <span class="font-size-12 text-muted">Statutory certificates required as per CBSE Affiliation Bye-Laws Chapter 2 and State Education Acts</span>
        </div>
        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#uploadVaultDocModal">
          <i class="bi bi-plus-lg me-1"></i> Upload Certificate
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
                    <div class="fw-bold">Clean Drinking Water &amp; Sanitation Certificate</div>
                    <small class="text-muted">Bacteriological purity &amp; sanitary conditions</small>
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
                    <div class="fw-bold">Land Title &amp; Lease Deed (14.5 Acres)</div>
                    <small class="text-muted">Single contiguous parcel perpetual ownership</small>
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
                    <div class="fw-bold">State Government Recognition (NOC)</div>
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
                    <div class="fw-bold">POCSO &amp; Child Safety Committee Constitution</div>
                    <small class="text-muted">Mandatory child sexual offense protection unit</small>
                  </div>
                </div>
              </td>
              <td>School Management Committee &amp; State DCPCR</td>
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

  <!-- ================= TAB 3: GOVERNANCE & SMC REGISTER ================= -->
  <div class="tab-pane fade" id="tab-governance" role="tabpanel">
    <!-- Executive Leadership Grid -->
    <div class="row g-3 mb-4">
      <div class="col-md-6 col-lg-3">
        <div class="leadership-badge-card">
          <div class="table-avatar bg-primary text-white" style="width:48px; height:48px; font-size:1.2rem;">SR</div>
          <div>
            <h6 class="fw-bold mb-0 font-size-14">Dr. Sunita Rao</h6>
            <div class="font-size-11 text-primary fw-semibold">Principal &amp; Secretary</div>
            <div class="font-size-11 text-muted">Ph.D. Education (24 Yrs)</div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="leadership-badge-card">
          <div class="table-avatar bg-info text-white" style="width:48px; height:48px; font-size:1.2rem;">VS</div>
          <div>
            <h6 class="fw-bold mb-0 font-size-14">Vikramaditya Sengupta</h6>
            <div class="font-size-11 text-info fw-semibold">Vice Principal</div>
            <div class="font-size-11 text-muted">M.A., B.Ed. (18 Yrs)</div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="leadership-badge-card">
          <div class="table-avatar bg-warning text-white" style="width:48px; height:48px; font-size:1.2rem;">RG</div>
          <div>
            <h6 class="fw-bold mb-0 font-size-14">Shri Rajeshwar Nath Goel</h6>
            <div class="font-size-11 text-warning fw-semibold">Chairman / President</div>
            <div class="font-size-11 text-muted">Vidya Mandir Trust</div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="leadership-badge-card">
          <div class="table-avatar bg-success text-white" style="width:48px; height:48px; font-size:1.2rem;">AS</div>
          <div>
            <h6 class="fw-bold mb-0 font-size-14">Mrs. Anjali Saxena</h6>
            <div class="font-size-11 text-success fw-semibold">POCSO Nodal Officer</div>
            <div class="font-size-11 text-muted">HR Lead &amp; Child Safety</div>
          </div>
        </div>
      </div>
    </div>

    <!-- SMC Register Table -->
    <div class="erp-card">
      <div class="erp-card-header">
        <div>
          <h5 class="erp-card-title mb-0"><i class="bi bi-people-fill text-primary"></i> School Management Committee (SMC) Constitution Register</h5>
          <span class="font-size-12 text-muted">Constituted under Section 21 of the RTE Act and CBSE Affiliation Bye-Laws (Tenure: 2023 - 2026)</span>
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
              <td>Industrialist &amp; Philanthropist</td>
              <td class="font-mono font-size-12">+91 98101 22334</td>
              <td><span class="badge-status badge-active">Active (2026)</span></td>
            </tr>
            <tr>
              <td class="fw-bold">Dr. Sunita Rao</td>
              <td><span class="badge bg-primary-subtle text-primary border">Member Secretary</span></td>
              <td>Principal (Ex-Officio)</td>
              <td>Educationist (Ph.D.)</td>
              <td class="font-mono font-size-12">+91 11 2893 4005</td>
              <td><span class="badge-status badge-active">Active (2026)</span></td>
            </tr>
            <tr>
              <td class="fw-bold">Prof. Harishankar Mehra</td>
              <td>Member</td>
              <td>CBSE Board Nominee</td>
              <td>Former Principal, KV Sector 8</td>
              <td class="font-mono font-size-12">+91 98710 44556</td>
              <td><span class="badge-status badge-active">Active (2026)</span></td>
            </tr>
            <tr>
              <td class="fw-bold">Dr. Neerja Tandon</td>
              <td>Member</td>
              <td>Directorate of Education Nominee</td>
              <td>Education Officer, Zone 21 Delhi</td>
              <td class="font-mono font-size-12">+91 11 2341 8920</td>
              <td><span class="badge-status badge-active">Active (2026)</span></td>
            </tr>
            <tr>
              <td class="fw-bold">Mr. Rajesh Sharma</td>
              <td>Member</td>
              <td>Parent Representative (Father)</td>
              <td>Senior Software Architect</td>
              <td class="font-mono font-size-12">+91 98112 34567</td>
              <td><span class="badge-status badge-active">Active (2026)</span></td>
            </tr>
            <tr>
              <td class="fw-bold">Mrs. Sunayana Malhotra</td>
              <td>Member</td>
              <td>Parent Representative (Mother)</td>
              <td>Chartered Accountant</td>
              <td class="font-mono font-size-12">+91 98113 77889</td>
              <td><span class="badge-status badge-active">Active (2026)</span></td>
            </tr>
            <tr>
              <td class="fw-bold">Mrs. Priya Nambiar</td>
              <td>Member</td>
              <td>Teacher Representative (Senior)</td>
              <td>PGT English, DPGA</td>
              <td class="font-mono font-size-12">+91 99110 55441</td>
              <td><span class="badge-status badge-active">Active (2026)</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- ================= TAB 4: DIGITAL DOCUMENT VAULT ================= -->
  <div class="tab-pane fade" id="tab-vault" role="tabpanel">
    <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
      <div>
        <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-safe2-fill text-primary"></i> Institutional Digital Document Vault</h5>
        <span class="text-muted font-size-12">Digitally cataloged statutory licenses, land deeds, building plans &amp; affiliation orders</span>
      </div>
      <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#uploadVaultDocModal">
        <i class="bi bi-cloud-arrow-up me-1"></i> Upload Statutory Document
      </button>
    </div>

    <!-- Document Cards Grid -->
    <div class="row g-3" id="vaultDocsGrid">
      <div class="col-md-6 col-xl-3">
        <div class="vault-doc-box">
          <div class="d-flex align-items-start justify-content-between mb-3">
            <div class="vault-doc-icon"><i class="bi bi-file-earmark-pdf-fill"></i></div>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Verified</span>
          </div>
          <h6 class="fw-bold font-size-14 text-dark mb-1">CBSE Affiliation Grant Letter</h6>
          <p class="font-size-12 text-muted mb-3">Extension of provisional affiliation up to senior secondary level.</p>
          <div class="mt-auto pt-2 border-top d-flex align-items-center justify-content-between font-size-12 text-muted">
            <span>PDF • 2.4 MB</span>
            <div class="d-flex gap-1">
              <button class="btn btn-xs btn-light border" onclick="previewCertificate('CBSE Affiliation Grant Letter', 'CBSE New Delhi', 'CBSE/AFF/2130892/EX-0248', '31-Mar-2029')"><i class="bi bi-eye"></i></button>
              <button class="btn btn-xs btn-light border" onclick="simulateDownload('CBSE_Affiliation_Grant.pdf')"><i class="bi bi-download"></i></button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-3">
        <div class="vault-doc-box">
          <div class="d-flex align-items-start justify-content-between mb-3">
            <div class="vault-doc-icon"><i class="bi bi-file-earmark-pdf-fill"></i></div>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Verified</span>
          </div>
          <h6 class="fw-bold font-size-14 text-dark mb-1">Fire Safety Clearance Certificate</h6>
          <p class="font-size-12 text-muted mb-3">Delhi Fire Service NOC with hydrants &amp; staircase compliance.</p>
          <div class="mt-auto pt-2 border-top d-flex align-items-center justify-content-between font-size-12 text-muted">
            <span>PDF • 1.8 MB</span>
            <div class="d-flex gap-1">
              <button class="btn btn-xs btn-light border" onclick="previewCertificate('Fire Safety Clearance Certificate', 'Delhi Fire Services', 'DFS/MS/SCH/2022/7418', '30-Nov-2025')"><i class="bi bi-eye"></i></button>
              <button class="btn btn-xs btn-light border" onclick="simulateDownload('Fire_Safety_NOC.pdf')"><i class="bi bi-download"></i></button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-3">
        <div class="vault-doc-box">
          <div class="d-flex align-items-start justify-content-between mb-3">
            <div class="vault-doc-icon"><i class="bi bi-file-earmark-pdf-fill"></i></div>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Verified</span>
          </div>
          <h6 class="fw-bold font-size-14 text-dark mb-1">Building Structural Fitness</h6>
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

      <div class="col-md-6 col-xl-3">
        <div class="vault-doc-box">
          <div class="d-flex align-items-start justify-content-between mb-3">
            <div class="vault-doc-icon"><i class="bi bi-file-earmark-pdf-fill"></i></div>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Verified</span>
          </div>
          <h6 class="fw-bold font-size-14 text-dark mb-1">Clean Water &amp; Sanitation</h6>
          <p class="font-size-12 text-muted mb-3">MCD Public Health Dept laboratory microbiological report.</p>
          <div class="mt-auto pt-2 border-top d-flex align-items-center justify-content-between font-size-12 text-muted">
            <span>PDF • 1.2 MB</span>
            <div class="d-flex gap-1">
              <button class="btn btn-xs btn-light border" onclick="previewCertificate('Clean Water & Sanitation Certificate', 'MCD Health Dept', 'MCD/PHD/WAT/2024/1102', '17-Sep-2025')"><i class="bi bi-eye"></i></button>
              <button class="btn btn-xs btn-light border" onclick="simulateDownload('Water_Sanitation_MCD.pdf')"><i class="bi bi-download"></i></button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-3">
        <div class="vault-doc-box">
          <div class="d-flex align-items-start justify-content-between mb-3">
            <div class="vault-doc-icon"><i class="bi bi-file-earmark-pdf-fill"></i></div>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Verified</span>
          </div>
          <h6 class="fw-bold font-size-14 text-dark mb-1">Land Lease Deed &amp; Possession</h6>
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

      <div class="col-md-6 col-xl-3">
        <div class="vault-doc-box">
          <div class="d-flex align-items-start justify-content-between mb-3">
            <div class="vault-doc-icon"><i class="bi bi-file-earmark-pdf-fill"></i></div>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Verified</span>
          </div>
          <h6 class="fw-bold font-size-14 text-dark mb-1">Trust Deed &amp; Society Reg.</h6>
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

      <div class="col-md-6 col-xl-3">
        <div class="vault-doc-box">
          <div class="d-flex align-items-start justify-content-between mb-3">
            <div class="vault-doc-icon"><i class="bi bi-file-earmark-pdf-fill"></i></div>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Verified</span>
          </div>
          <h6 class="fw-bold font-size-14 text-dark mb-1">State Directorate NOC</h6>
          <p class="font-size-12 text-muted mb-3">Permanent recognition letter issued by Directorate of Education.</p>
          <div class="mt-auto pt-2 border-top d-flex align-items-center justify-content-between font-size-12 text-muted">
            <span>PDF • 1.5 MB</span>
            <div class="d-flex gap-1">
              <button class="btn btn-xs btn-light border" onclick="previewCertificate('State Directorate Recognition NOC', 'Directorate of Education', 'DOE/NOC/CBSE/1999/491', 'Permanent')"><i class="bi bi-eye"></i></button>
              <button class="btn btn-xs btn-light border" onclick="simulateDownload('State_Govt_NOC.pdf')"><i class="bi bi-download"></i></button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-3">
        <div class="vault-doc-box">
          <div class="d-flex align-items-start justify-content-between mb-3">
            <div class="vault-doc-icon"><i class="bi bi-file-earmark-pdf-fill"></i></div>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Verified</span>
          </div>
          <h6 class="fw-bold font-size-14 text-dark mb-1">Approved Building Blueprint</h6>
          <p class="font-size-12 text-muted mb-3">MCD sanctioned architectural floor layouts &amp; fire escape stairs.</p>
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

<!-- Modal: Edit General Profile -->
<div class="modal fade" id="editGeneralModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-pencil-square text-primary me-2"></i>Edit Institutional Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
              </select>
            </div>
            <div class="col-12">
              <label class="form-label">Academic Shift &amp; Hours</label>
              <input type="text" class="form-control" id="inputShiftTiming">
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

<!-- Modal: Edit Affiliation -->
<div class="modal fade" id="editAffiliationModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-shield-check text-primary me-2"></i>Edit Board Affiliation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form id="editAffiliationForm" onsubmit="saveAffiliationProfile(event)">
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Curriculum Board</label>
              <input type="text" class="form-control" id="inputBoardName" value="Central Board of Secondary Education (CBSE)">
            </div>
            <div class="col-md-6">
              <label class="form-label">Affiliation Number <span class="required">*</span></label>
              <input type="text" class="form-control font-mono" id="inputAffilNo" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">School Code</label>
              <input type="text" class="form-control font-mono" id="inputSchoolCode" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">U-DISE+ Code</label>
              <input type="text" class="form-control font-mono" id="inputUdiseCode" required maxlength="15">
            </div>
            <div class="col-md-6">
              <label class="form-label">State Recognition No.</label>
              <input type="text" class="form-control font-mono" id="inputStateRecog">
            </div>
            <div class="col-md-6">
              <label class="form-label">Validity Period</label>
              <input type="text" class="form-control" id="inputAffilValidity">
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

<!-- Modal: Edit Leadership -->
<div class="modal fade" id="editLeadershipModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-people-fill text-primary me-2"></i>Edit Leadership &amp; SMC</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form id="editLeadershipForm" onsubmit="saveLeadershipProfile(event)">
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Principal Name <span class="required">*</span></label>
              <input type="text" class="form-control" id="inputPrincipalName" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Designation</label>
              <input type="text" class="form-control" id="inputPrincipalRole">
            </div>
            <div class="col-md-6">
              <label class="form-label">Qualifications</label>
              <input type="text" class="form-control" id="inputPrincipalQual">
            </div>
            <div class="col-md-6">
              <label class="form-label">Experience</label>
              <input type="text" class="form-control" id="inputPrincipalExp">
            </div>
            <div class="col-md-6">
              <label class="form-label">Phone</label>
              <input type="text" class="form-control" id="inputPrincipalPhone">
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" class="form-control font-mono" id="inputPrincipalEmail">
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

<!-- Modal: Edit Contact -->
<div class="modal fade" id="editContactModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-geo-alt text-primary me-2"></i>Edit Contact Info</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form id="editContactForm" onsubmit="saveContactProfile(event)">
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label">Address <span class="required">*</span></label>
              <textarea class="form-control" id="inputAddress" rows="2" required></textarea>
            </div>
            <div class="col-md-6">
              <label class="form-label">City &amp; State</label>
              <input type="text" class="form-control" id="inputCityState">
            </div>
            <div class="col-md-6">
              <label class="form-label">GPS Coordinates</label>
              <input type="text" class="form-control font-mono" id="inputGpsCoords">
            </div>
            <div class="col-md-6">
              <label class="form-label">Reception Phone</label>
              <input type="text" class="form-control" id="inputPhone1">
            </div>
            <div class="col-md-6">
              <label class="form-label">Admissions Hotline</label>
              <input type="text" class="form-control" id="inputPhoneAdmissions">
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" class="form-control font-mono" id="inputEmail">
            </div>
            <div class="col-md-6">
              <label class="form-label">Website</label>
              <input type="text" class="form-control font-mono" id="inputWebsite">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-check-lg me-1"></i> Save Contact</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal: Edit Bank -->
<div class="modal fade" id="editBankModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-bank2 text-primary me-2"></i>Edit Financial &amp; Tax Codes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form id="editBankForm" onsubmit="saveBankProfile(event)">
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Bank &amp; Branch <span class="required">*</span></label>
              <input type="text" class="form-control" id="inputBankName" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Account Holder</label>
              <input type="text" class="form-control" id="inputBankHolder" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Account Number <span class="required">*</span></label>
              <input type="text" class="form-control font-mono" id="inputBankAccNo" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">IFSC Code <span class="required">*</span></label>
              <input type="text" class="form-control font-mono" id="inputBankIfsc" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">PAN Number</label>
              <input type="text" class="form-control font-mono" id="inputTaxPan" maxlength="10">
            </div>
            <div class="col-md-6">
              <label class="form-label">TAN Number</label>
              <input type="text" class="form-control font-mono" id="inputTaxTan" maxlength="10">
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

<!-- Modal: Upload Vault Doc -->
<div class="modal fade" id="uploadVaultDocModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-cloud-arrow-up text-primary me-2"></i>Upload Statutory Document</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form id="uploadDocForm" onsubmit="handleDocVaultUpload(event)">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Document Title <span class="required">*</span></label>
            <input type="text" class="form-control" id="vaultDocTitle" required placeholder="e.g. CBSE Affiliation Certificate">
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
            <label class="form-label">Choose File (PDF, DOCX, PNG) <span class="required">*</span></label>
            <input type="file" class="form-control" required accept=".pdf,.doc,.docx,.png">
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

<!-- Modal: Update Crest -->
<div class="modal fade" id="changeCrestModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-award-fill text-primary me-2"></i>Update School Crest &amp; Insignia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form onsubmit="handleCrestUpdate(event)">
        <div class="modal-body text-center">
          <div class="profile-crest-badge mx-auto mb-3" style="width:90px; height:90px; font-size:2.2rem;">
            <span id="crestPreviewText">DPGA</span>
          </div>
          <div class="mb-3 text-start">
            <label class="form-label">Acronym Initials</label>
            <input type="text" class="form-control font-mono text-center" id="inputCrestInitials" maxlength="5" value="DPGA" oninput="document.getElementById('crestPreviewText').textContent = this.value.toUpperCase() || 'SCH'">
          </div>
          <div class="mb-3 text-start">
            <label class="form-label">Upload High-Res Crest File (PNG/SVG)</label>
            <input type="file" class="form-control" accept="image/*">
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

<!-- Modal: Certificate Preview -->
<div class="modal fade" id="previewCertModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-size-15"><i class="bi bi-file-earmark-check-fill text-primary me-2"></i>Official Statutory Record Preview</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-4 bg-light">
        <div class="p-4 bg-white border rounded-3 shadow-sm mx-auto" style="max-width: 650px;">
          <div class="text-center pb-3 border-bottom mb-3">
            <div class="badge bg-primary text-white mb-2 px-3 py-1 font-size-12">GOVERNMENT OF NATIONAL CAPITAL TERRITORY OF DELHI</div>
            <h5 class="fw-bold mb-0 text-dark" id="modalCertTitle">Statutory Certificate</h5>
            <div class="font-size-12 text-muted mt-1" id="modalCertIssuer">Issuing Authority: Directorate of Education</div>
          </div>
          <div class="row g-2 mb-3 font-size-13">
            <div class="col-6"><strong>Ref No:</strong> <span class="font-mono text-primary" id="modalCertRef">STR/PWD/2022/9041</span></div>
            <div class="col-6 text-end"><strong>Validity:</strong> <span class="badge bg-success-subtle text-success border" id="modalCertExpiry">Valid till 2027</span></div>
            <div class="col-12 mt-2"><strong>Institution:</strong> Delhi Public Global Academy (Affiliation No: 2130892)</div>
          </div>
          <div class="p-3 bg-app rounded-2 border mb-3 font-size-12 text-muted">
            This certifies that the institution satisfies all required criteria for school operations under Chapter 2 of CBSE Affiliation Bye-Laws.
          </div>
          <div class="d-flex align-items-center justify-content-between pt-3 border-top">
            <div class="text-center">
              <i class="bi bi-qr-code fs-1 text-dark d-block"></i>
              <span class="font-size-10 text-muted">Digital UID Stamped</span>
            </div>
            <div class="text-center">
              <div class="fw-bold font-size-12 text-primary">[ Digitally Verified ]</div>
              <div class="font-size-11 text-muted">Competent Authority</div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="window.print()"><i class="bi bi-printer me-1"></i> Print</button>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript Logic & Persistence -->
<script>
const PROFILE_STORAGE_KEY = 'edusys_school_profile_data';

const defaultSchoolProfile = {
  name: "Delhi Public Global Academy",
  short_name: "DPGA",
  tagline: "Excellence in Holistic Education & Innovation",
  est_year: "1998",
  trust_name: "Vidya Mandir Educational & Charitable Trust",
  trust_reg_no: "REG/TR/1997/DELHI/4829",
  category: "Private Unaided / Society Run",
  medium: "English (Primary), Hindi & Sanskrit (Secondary)",
  shift_timing: "General Shift: 07:45 AM – 02:15 PM",
  vision: "To nurture inquisitive minds and compassionate hearts through holistic pedagogy, state-of-the-art technological immersion, and rooted ethical values, shaping dynamic global leaders for a transforming world.",
  mission: "Deliver rigorous CBSE-aligned scholastic and co-scholastic excellence in a safe, technologically advanced, and inclusive learning habitat where every learner discovers their individual genius.",
  board_name: "Central Board of Secondary Education (CBSE)",
  affil_no: "2130892",
  school_code: "70142",
  udise_code: "07010401824",
  state_recog_no: "EDN-DEL-ACT-1999/8841-A",
  affil_validity: "01-Apr-2024 to 31-Mar-2029 (5 Years Extension)",
  principal_name: "Dr. Sunita Rao",
  principal_role: "Principal & Member Secretary (SMC)",
  principal_qual: "M.Sc. (Physics), M.Ed., Ph.D. in Educational Leadership",
  principal_exp: "24 Years",
  principal_phone: "+91 11 2893 4005",
  principal_email: "principal@dpglobalacademy.edu.in",
  address: "Sector 14, Knowledge City, Dwarka Expressway Sub-City, New Delhi - 110075, India",
  city_state: "Knowledge City, New Delhi",
  gps_coords: "Lat: 28.613939° N, Long: 77.209021° E",
  phone1: "+91 11 2893 4000, 4001",
  phone_admissions: "+91 98110 99450",
  email: "info@dpglobalacademy.edu.in",
  website: "https://www.dpglobalacademy.edu.in",
  bank_name: "HDFC Bank, Sector 14 Knowledge City",
  bank_holder: "Delhi Public Global Academy (Vidya Mandir Trust)",
  bank_acc_no: "50200084918234",
  bank_ifsc: "HDFC0001892",
  tax_pan: "AAATD8921K",
  tax_tan: "DELT09281C",
  campus_area: "14.5 Acres",
  total_classrooms: "84"
};

let currentProfile = {};
let isAccMasked = false;

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

function renderProfileToDOM() {
  const p = currentProfile;
  setText('displaySchoolName', p.name);
  setText('displayCrestInitials', p.short_name);
  setText('displayTagline', `"${p.tagline}"`);
  setText('displayEstYear', p.est_year);
  setText('displayAffilNo', p.affil_no);
  setText('displaySchoolCode', p.school_code);
  setText('displayUdise', p.udise_code);
  setText('displayCityState', p.city_state);
  
  // Specifications
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
  
  // Affiliation
  setText('fieldBoardName', p.board_name);
  setText('fieldAffilNo2', p.affil_no);
  setText('fieldSchoolCode2', p.school_code);
  setText('fieldUdiseCode2', p.udise_code);
  setText('fieldStateRecogNo', p.state_recog_no);
  setText('fieldAffilValidity', p.affil_validity);
  
  // Facilities
  setText('kpiCampusArea', p.campus_area);
  setText('fieldTotalClassrooms', p.total_classrooms);
  
  // Principal
  setText('dispPrincipalName', p.principal_name);
  setText('dispPrincipalRole', p.principal_role);
  setText('dispPrincipalQual', p.principal_qual);
  setText('dispPrincipalExp', p.principal_exp);
  setText('dispPrincipalPhone', p.principal_phone);
  setText('dispPrincipalEmail', p.principal_email);
  const names = p.principal_name.replace(/^(Dr\.|Mr\.|Mrs\.|Ms\.)\s*/i, '').trim().split(' ');
  const initials = names.length > 1 ? (names[0][0] + names[names.length - 1][0]).toUpperCase() : names[0].substring(0, 2).toUpperCase();
  setText('dispPrincipalAvatar', initials);
  
  // Contact & Bank
  setText('contactDispAddress', p.address);
  setText('fieldGpsCoords', p.gps_coords);
  setText('contactDispPhone1', p.phone1);
  setText('contactDispPhoneAdmissions', p.phone_admissions);
  setText('contactDispEmail', p.email);
  setText('contactDispWebsite', p.website);
  setText('bankDispName', p.bank_name);
  setText('bankDispIfsc', p.bank_ifsc);
  setText('taxDispPan', p.tax_pan);
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
  el.textContent = isAccMasked ? '•••• •••• •••• ' + raw.slice(-4) : raw;
}

function toggleAccMask() {
  isAccMasked = !isAccMasked;
  renderAccNumber();
  const icon = document.getElementById('maskEyeIcon');
  if (icon) icon.className = isAccMasked ? 'bi bi-eye-slash' : 'bi bi-eye';
}

document.addEventListener('DOMContentLoaded', function() {
  loadProfile();

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

  const editLeadModal = document.getElementById('editLeadershipModal');
  if (editLeadModal) {
    editLeadModal.addEventListener('show.bs.modal', function () {
      document.getElementById('inputPrincipalName').value = currentProfile.principal_name;
      document.getElementById('inputPrincipalRole').value = currentProfile.principal_role;
      document.getElementById('inputPrincipalQual').value = currentProfile.principal_qual;
      document.getElementById('inputPrincipalExp').value = currentProfile.principal_exp;
      document.getElementById('inputPrincipalPhone').value = currentProfile.principal_phone;
      document.getElementById('inputPrincipalEmail').value = currentProfile.principal_email;
    });
  }

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
    });
  }

  const editBnkModal = document.getElementById('editBankModal');
  if (editBnkModal) {
    editBnkModal.addEventListener('show.bs.modal', function () {
      document.getElementById('inputBankName').value = currentProfile.bank_name;
      document.getElementById('inputBankHolder').value = currentProfile.bank_holder;
      document.getElementById('inputBankAccNo').value = currentProfile.bank_acc_no;
      document.getElementById('inputBankIfsc').value = currentProfile.bank_ifsc;
      document.getElementById('inputTaxPan').value = currentProfile.tax_pan;
      document.getElementById('inputTaxTan').value = currentProfile.tax_tan;
    });
  }
});

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
  notifySuccess("Institutional Profile updated successfully!");
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
  notifySuccess("Affiliation details updated!");
}

function saveLeadershipProfile(e) {
  e.preventDefault();
  currentProfile.principal_name = document.getElementById('inputPrincipalName').value.trim();
  currentProfile.principal_role = document.getElementById('inputPrincipalRole').value.trim();
  currentProfile.principal_qual = document.getElementById('inputPrincipalQual').value.trim();
  currentProfile.principal_exp = document.getElementById('inputPrincipalExp').value.trim();
  currentProfile.principal_phone = document.getElementById('inputPrincipalPhone').value.trim();
  currentProfile.principal_email = document.getElementById('inputPrincipalEmail').value.trim();
  persistProfile();
  bootstrap.Modal.getInstance(document.getElementById('editLeadershipModal')).hide();
  notifySuccess("Leadership updated!");
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
  persistProfile();
  bootstrap.Modal.getInstance(document.getElementById('editContactModal')).hide();
  notifySuccess("Contact info updated!");
}

function saveBankProfile(e) {
  e.preventDefault();
  currentProfile.bank_name = document.getElementById('inputBankName').value.trim();
  currentProfile.bank_holder = document.getElementById('inputBankHolder').value.trim();
  currentProfile.bank_acc_no = document.getElementById('inputBankAccNo').value.trim();
  currentProfile.bank_ifsc = document.getElementById('inputBankIfsc').value.trim();
  currentProfile.tax_pan = document.getElementById('inputTaxPan').value.trim().toUpperCase();
  currentProfile.tax_tan = document.getElementById('inputTaxTan').value.trim().toUpperCase();
  persistProfile();
  bootstrap.Modal.getInstance(document.getElementById('editBankModal')).hide();
  notifySuccess("Bank codes saved!");
}

function handleCrestUpdate(e) {
  e.preventDefault();
  const initials = document.getElementById('inputCrestInitials').value.trim().toUpperCase();
  if (initials) {
    currentProfile.short_name = initials;
    persistProfile();
  }
  bootstrap.Modal.getInstance(document.getElementById('changeCrestModal')).hide();
  notifySuccess("School crest updated!");
}

function handleDocVaultUpload(e) {
  e.preventDefault();
  const title = document.getElementById('vaultDocTitle').value.trim();
  const issuer = document.getElementById('vaultDocIssuer').value.trim() || 'Authority';
  const expiry = document.getElementById('vaultDocExpiry').value || 'Permanent';
  const grid = document.getElementById('vaultDocsGrid');
  if (grid) {
    const col = document.createElement('div');
    col.className = 'col-md-6 col-xl-3 table-row-new';
    col.innerHTML = `
      <div class="vault-doc-box">
        <div class="d-flex align-items-start justify-content-between mb-3">
          <div class="vault-doc-icon"><i class="bi bi-file-earmark-pdf-fill"></i></div>
          <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Uploaded</span>
        </div>
        <h6 class="fw-bold font-size-14 text-dark mb-1">${title}</h6>
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
  const countBadge = document.getElementById('vaultDocCountBadge');
  if (countBadge) countBadge.textContent = parseInt(countBadge.textContent || '8') + 1;
  bootstrap.Modal.getInstance(document.getElementById('uploadVaultDocModal')).hide();
  document.getElementById('uploadDocForm').reset();
  notifySuccess(`"${title}" vaulted successfully!`);
}

function persistProfile() {
  localStorage.setItem(PROFILE_STORAGE_KEY, JSON.stringify(currentProfile));
  renderProfileToDOM();
}

function resetProfileDefaults() {
  if (confirm("Reset school profile to demo defaults?")) {
    localStorage.removeItem(PROFILE_STORAGE_KEY);
    currentProfile = Object.assign({}, defaultSchoolProfile);
    renderProfileToDOM();
    notifySuccess("Profile reset to defaults!");
  }
}

function notifySuccess(msg) {
  if (window.EduApp && window.EduApp.toast) {
    EduApp.toast(msg, "success", "School Profile");
  } else {
    alert(msg);
  }
}

function previewCertificate(title, issuer, ref, expiry) {
  setText('modalCertTitle', title);
  setText('modalCertIssuer', 'Issuing Authority: ' + issuer);
  setText('modalCertRef', ref);
  setText('modalCertExpiry', 'Valid: ' + expiry);
  const modalEl = document.getElementById('previewCertModal');
  if (modalEl) new bootstrap.Modal(modalEl).show();
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
  notifySuccess("Factsheet JSON downloaded!");
}
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
