<?php
/**
 * EDUSYS PRO - School Branding & Visual Identity Module
 * Crest logos, mottos, letterheads, digital seals, authorized signatures & ID card templates
 */
$page_title = "School Branding & Visual Identity";
$page_desc = "Institutional crest, official seals, authorized signatures, letterhead templates & brand palette";
$active_module = "administration";
$active_submodule = "school-branding.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/administration/school-profile.php'); ?>">Administration</a></li>
      <li class="breadcrumb-item active" aria-current="page">School Branding</li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-palette-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <button class="btn btn-light border" onclick="window.print()" title="Print Branding Kit">
      <i class="bi bi-printer me-1"></i> Print Brand Guidelines
    </button>
    <button class="btn btn-light border" onclick="previewLetterheadModal()" title="Preview Official Letterhead">
      <i class="bi bi-file-earmark-richtext me-1"></i> Preview Letterhead
    </button>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadAssetModal">
      <i class="bi bi-cloud-arrow-up me-1"></i> Upload Brand Asset
    </button>
  </div>
</div>

<!-- Branding Status KPIs -->
<div class="row g-3 mb-4">
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-primary">
      <div class="kpi-info">
        <h6>Primary Brand Color</h6>
        <div class="kpi-value d-flex align-items-center gap-2">
          <span style="display:inline-block; width:18px; height:18px; border-radius:4px; background:#1e40af; border:1px solid rgba(0,0,0,0.2);"></span>
          <span class="font-mono font-size-15">#1E40AF</span>
        </div>
        <div class="kpi-trend positive"><i class="bi bi-check2"></i> Royal Navy Blue</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-paint-bucket"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-success">
      <div class="kpi-info">
        <h6>Crest & Insignia</h6>
        <div class="kpi-value">Verified SVG</div>
        <div class="kpi-trend positive"><i class="bi bi-patch-check-fill"></i> Hi-Res Vector Ready</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-award-fill"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-warning">
      <div class="kpi-info">
        <h6>Digital Seals & Sigs</h6>
        <div class="kpi-value">4 Active</div>
        <div class="kpi-trend positive"><i class="bi bi-pen-fill"></i> Authorized & Watermarked</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-shield-shaded"></i></div>
    </div>
  </div>
  <div class="col-6 col-md-3">
    <div class="kpi-card kpi-info">
      <div class="kpi-info">
        <h6>Print Stationery</h6>
        <div class="kpi-value">6 Formats</div>
        <div class="kpi-trend positive"><i class="bi bi-file-earmark-check"></i> CBSE Standard Layout</div>
      </div>
      <div class="kpi-icon"><i class="bi bi-printer-fill"></i></div>
    </div>
  </div>
</div>

<!-- Branding Navigation Tabs -->
<ul class="nav profile-pill-tabs mb-4" id="brandingTabs" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="tab-logos-btn" data-bs-toggle="tab" data-bs-target="#tab-logos" type="button" role="tab">
      <i class="bi bi-award"></i> Logo & Insignia Assets
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="tab-colors-btn" data-bs-toggle="tab" data-bs-target="#tab-colors" type="button" role="tab">
      <i class="bi bi-palette"></i> Color Palette & Fonts
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="tab-seals-btn" data-bs-toggle="tab" data-bs-target="#tab-seals" type="button" role="tab">
      <i class="bi bi-pen"></i> Official Seals & Signatures
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="tab-stationery-btn" data-bs-toggle="tab" data-bs-target="#tab-stationery" type="button" role="tab">
      <i class="bi bi-file-earmark-richtext"></i> Letterheads & Stationery
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="tab-idcards-btn" data-bs-toggle="tab" data-bs-target="#tab-idcards" type="button" role="tab">
      <i class="bi bi-person-vcard"></i> Student & Staff ID Cards
    </button>
  </li>
</ul>

<!-- Branding Tab Content -->
<div class="tab-content" id="brandingTabContent">

  <!-- ================= TAB 1: LOGO & INSIGNIA ================= -->
  <div class="tab-pane fade show active" id="tab-logos" role="tabpanel">
    <div class="row g-4">
      <!-- Primary Logo Card -->
      <div class="col-md-6 col-lg-3">
        <div class="erp-card h-100 text-center">
          <div class="erp-card-header justify-content-center">
            <h6 class="erp-card-title font-size-14"><i class="bi bi-star-fill text-warning"></i> Primary School Crest</h6>
          </div>
          <div class="erp-card-body py-4">
            <div class="profile-crest-wrapper mx-auto mb-3" style="width: 110px; height: 110px; font-size: 2.8rem;">
              <span>DPGA</span>
              <div class="crest-badge"><i class="bi bi-check-lg"></i></div>
            </div>
            <h6 class="fw-bold mb-1">Full Color Emblem</h6>
            <div class="font-size-12 text-muted mb-3">Vector SVG • 512x512 PNG</div>
            <div class="d-flex justify-content-center gap-2">
              <button class="btn btn-xs btn-outline-primary" onclick="simulateAssetDownload('DPGA_Primary_Logo.png')"><i class="bi bi-download me-1"></i> PNG</button>
              <button class="btn btn-xs btn-outline-secondary" onclick="simulateAssetDownload('DPGA_Primary_Logo.svg')"><i class="bi bi-filetype-svg me-1"></i> SVG</button>
            </div>
          </div>
          <div class="erp-card-footer text-center">
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Default Active Emblem</span>
          </div>
        </div>
      </div>

      <!-- Dark Theme Logo Card -->
      <div class="col-md-6 col-lg-3">
        <div class="erp-card h-100 text-center">
          <div class="erp-card-header justify-content-center">
            <h6 class="erp-card-title font-size-14"><i class="bi bi-moon-stars-fill text-info"></i> Dark Mode Crest</h6>
          </div>
          <div class="erp-card-body py-4">
            <div class="mx-auto mb-3 p-3 rounded-3" style="background:#0f172a; width: 110px; height: 110px; display:flex; align-items:center; justify-content:center;">
              <div style="font-size: 2.5rem; font-weight: 800; color:#60a5fa; letter-spacing:-1px;">DPGA</div>
            </div>
            <h6 class="fw-bold mb-1">Light Inverse Crest</h6>
            <div class="font-size-12 text-muted mb-3">Transparent PNG for dark themes</div>
            <div class="d-flex justify-content-center gap-2">
              <button class="btn btn-xs btn-outline-primary" onclick="simulateAssetDownload('DPGA_Dark_Logo.png')"><i class="bi bi-download me-1"></i> PNG</button>
              <button class="btn btn-xs btn-outline-secondary" onclick="simulateAssetDownload('DPGA_Dark_Logo.svg')"><i class="bi bi-filetype-svg me-1"></i> SVG</button>
            </div>
          </div>
          <div class="erp-card-footer text-center">
            <span class="badge bg-light text-muted border font-size-11">Dark Theme UI</span>
          </div>
        </div>
      </div>

      <!-- Official Circular Seal -->
      <div class="col-md-6 col-lg-3">
        <div class="erp-card h-100 text-center">
          <div class="erp-card-header justify-content-center">
            <h6 class="erp-card-title font-size-14"><i class="bi bi-patch-check-fill text-danger"></i> Circular Rubber Stamp</h6>
          </div>
          <div class="erp-card-body py-4">
            <div class="mx-auto mb-3 rounded-circle border border-2 border-danger p-2" style="width: 110px; height: 110px; display:flex; flex-direction:column; align-items:center; justify-content:center; color:#dc2626;">
              <div style="font-size: 0.65rem; font-weight: 700; text-transform:uppercase;">DP GLOBAL ACADEMY</div>
              <div style="font-size: 1.2rem;"><i class="bi bi-mortarboard-fill"></i></div>
              <div style="font-size: 0.65rem; font-weight: 700;">★ ESTD 1998 ★</div>
            </div>
            <h6 class="fw-bold mb-1">Official Circular Seal</h6>
            <div class="font-size-12 text-muted mb-3">300 DPI Transparent Stamp</div>
            <div class="d-flex justify-content-center gap-2">
              <button class="btn btn-xs btn-outline-primary" onclick="simulateAssetDownload('DPGA_Official_Seal.png')"><i class="bi bi-download me-1"></i> PNG</button>
              <button class="btn btn-xs btn-outline-secondary" onclick="simulateAssetDownload('DPGA_Official_Seal.pdf')"><i class="bi bi-file-earmark-pdf me-1"></i> PDF</button>
            </div>
          </div>
          <div class="erp-card-footer text-center">
            <span class="badge bg-light text-danger border font-size-11">Certificates & TC</span>
          </div>
        </div>
      </div>

      <!-- Favicon & Watermark -->
      <div class="col-md-6 col-lg-3">
        <div class="erp-card h-100 text-center">
          <div class="erp-card-header justify-content-center">
            <h6 class="erp-card-title font-size-14"><i class="bi bi-water text-primary"></i> Marksheet Watermark</h6>
          </div>
          <div class="erp-card-body py-4">
            <div class="mx-auto mb-3 rounded-3 border p-3 bg-light" style="width: 110px; height: 110px; display:flex; align-items:center; justify-content:center; opacity:0.4;">
              <i class="bi bi-mortarboard-fill fs-1 text-primary"></i>
            </div>
            <h6 class="fw-bold mb-1">Security Watermark</h6>
            <div class="font-size-12 text-muted mb-3">10% Opacity Anti-Counterfeit</div>
            <div class="d-flex justify-content-center gap-2">
              <button class="btn btn-xs btn-outline-primary" onclick="simulateAssetDownload('DPGA_Watermark_Asset.png')"><i class="bi bi-download me-1"></i> PNG</button>
              <button class="btn btn-xs btn-outline-secondary" onclick="simulateAssetDownload('DPGA_Favicon_Package.zip')"><i class="bi bi-archive me-1"></i> Favicon</button>
            </div>
          </div>
          <div class="erp-card-footer text-center">
            <span class="badge bg-light text-primary border font-size-11">Anti-Tamper Print</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= TAB 2: COLOR PALETTE & FONTS ================= -->
  <div class="tab-pane fade" id="tab-colors" role="tabpanel">
    <div class="row g-4">
      <div class="col-lg-7">
        <div class="erp-card h-100">
          <div class="erp-card-header">
            <h5 class="erp-card-title"><i class="bi bi-droplet-half text-primary"></i> Institutional Color System</h5>
            <button class="btn btn-sm btn-outline-primary" onclick="openColorPickerModal()">
              <i class="bi bi-sliders me-1"></i> Customize Colors
            </button>
          </div>
          <div class="erp-card-body">
            <div class="row g-3">
              <div class="col-sm-6">
                <div class="p-3 border rounded-3 d-flex align-items-center gap-3">
                  <div style="width: 50px; height: 50px; border-radius: 10px; background: #1e40af; border: 1px solid rgba(0,0,0,0.1);"></div>
                  <div>
                    <div class="fw-bold text-main font-size-14">Primary Navy</div>
                    <div class="font-mono font-size-13 text-muted">#1E40AF</div>
                    <div class="font-size-11 text-muted">Headers, crest, primary buttons</div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="p-3 border rounded-3 d-flex align-items-center gap-3">
                  <div style="width: 50px; height: 50px; border-radius: 10px; background: #3b82f6; border: 1px solid rgba(0,0,0,0.1);"></div>
                  <div>
                    <div class="fw-bold text-main font-size-14">Accent Blue</div>
                    <div class="font-mono font-size-13 text-muted">#3B82F6</div>
                    <div class="font-size-11 text-muted">Highlights, active states, links</div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="p-3 border rounded-3 d-flex align-items-center gap-3">
                  <div style="width: 50px; height: 50px; border-radius: 10px; background: #d97706; border: 1px solid rgba(0,0,0,0.1);"></div>
                  <div>
                    <div class="fw-bold text-main font-size-14">Academic Gold</div>
                    <div class="font-mono font-size-13 text-muted">#D97706</div>
                    <div class="font-size-11 text-muted">Honor rolls, medals, certificates</div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="p-3 border rounded-3 d-flex align-items-center gap-3">
                  <div style="width: 50px; height: 50px; border-radius: 10px; background: #10b981; border: 1px solid rgba(0,0,0,0.1);"></div>
                  <div>
                    <div class="fw-bold text-main font-size-14">Success Green</div>
                    <div class="font-mono font-size-13 text-muted">#10B981</div>
                    <div class="font-size-11 text-muted">Pass grades, attendance, approvals</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-4 p-3 bg-app rounded-3 border">
              <h6 class="fw-bold font-size-13 mb-2"><i class="bi bi-info-circle me-1 text-primary"></i> Typography Guidelines</h6>
              <div class="row g-2 font-size-13">
                <div class="col-sm-6 text-muted">Primary Heading: <strong class="text-main font-mono">Plus Jakarta Sans</strong></div>
                <div class="col-sm-6 text-muted">Body & Tables: <strong class="text-main font-mono">Inter / Plus Jakarta Sans</strong></div>
                <div class="col-sm-6 text-muted">Certificates Title: <strong class="text-main font-mono">Cinzel / Merriweather Serif</strong></div>
                <div class="col-sm-6 text-muted">Numeric & Codes: <strong class="text-main font-mono">SFMono / Consolas</strong></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <!-- Live Palette Application Preview -->
        <div class="erp-card h-100">
          <div class="erp-card-header">
            <h5 class="erp-card-title"><i class="bi bi-display text-success"></i> Live Theme Component Preview</h5>
          </div>
          <div class="erp-card-body d-flex flex-column gap-3 justify-content-center">
            <div class="p-3 rounded-3 text-white" style="background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);">
              <div class="fw-bold font-size-15 mb-1">Delhi Public Global Academy</div>
              <div class="font-size-12 opacity-75">Senior Secondary CBSE Affiliation #2130892</div>
            </div>

            <div class="d-flex flex-wrap gap-2">
              <button class="btn btn-primary btn-sm"><i class="bi bi-check2 me-1"></i> Primary Button</button>
              <button class="btn btn-outline-primary btn-sm">Outline Button</button>
              <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1">Primary Badge</span>
              <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2 py-1">Honor Badge</span>
            </div>

            <div class="alert alert-primary py-2 px-3 font-size-12 mb-0">
              <i class="bi bi-bell-fill me-1"></i> System-wide UI elements automatically adhere to these token definitions.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= TAB 3: SEALS & SIGNATURES ================= -->
  <div class="tab-pane fade" id="tab-seals" role="tabpanel">
    <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
      <div>
        <h5 class="fw-bold mb-0 text-main"><i class="bi bi-pen-fill text-primary"></i> Authorized Digital Signatures & Circular Seals</h5>
        <span class="text-muted font-size-13">Authorized signatures used for dynamic generation of report cards, fee receipts & transfer certificates</span>
      </div>
      <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#uploadSigModal">
        <i class="bi bi-cloud-arrow-up me-1"></i> Upload Signature / Seal
      </button>
    </div>

    <div class="row g-3">
      <!-- Sig 1: Principal -->
      <div class="col-md-6 col-lg-3">
        <div class="erp-card h-100 text-center">
          <div class="erp-card-header justify-content-between">
            <h6 class="erp-card-title font-size-13">Principal Signature</h6>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Authorized</span>
          </div>
          <div class="erp-card-body py-4">
            <div class="p-3 bg-light rounded-3 border mb-3 mx-auto" style="height: 80px; width: 180px; display:flex; align-items:center; justify-content:center;">
              <span style="font-family: 'Brush Script MT', cursive, sans-serif; font-size: 2rem; color: #1e3a8a;">Sunita Rao</span>
            </div>
            <div class="fw-bold text-main font-size-14">Dr. Sunita Rao</div>
            <div class="font-size-12 text-muted">Head of School / Principal</div>
          </div>
          <div class="erp-card-footer text-center">
            <small class="text-muted">Applied on: Report Cards, TCs, Character Certs</small>
          </div>
        </div>
      </div>

      <!-- Sig 2: Examination Controller -->
      <div class="col-md-6 col-lg-3">
        <div class="erp-card h-100 text-center">
          <div class="erp-card-header justify-content-between">
            <h6 class="erp-card-title font-size-13">Exam Controller</h6>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Authorized</span>
          </div>
          <div class="erp-card-body py-4">
            <div class="p-3 bg-light rounded-3 border mb-3 mx-auto" style="height: 80px; width: 180px; display:flex; align-items:center; justify-content:center;">
              <span style="font-family: 'Brush Script MT', cursive, sans-serif; font-size: 2rem; color: #1e3a8a;">V. Sengupta</span>
            </div>
            <div class="fw-bold text-main font-size-14">Mr. Vikramaditya Sengupta</div>
            <div class="font-size-12 text-muted">Controller of Examinations</div>
          </div>
          <div class="erp-card-footer text-center">
            <small class="text-muted">Applied on: Admit Cards, Marksheets, Tabulations</small>
          </div>
        </div>
      </div>

      <!-- Sig 3: Chief Accountant -->
      <div class="col-md-6 col-lg-3">
        <div class="erp-card h-100 text-center">
          <div class="erp-card-header justify-content-between">
            <h6 class="erp-card-title font-size-13">Accounts Incharge</h6>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Authorized</span>
          </div>
          <div class="erp-card-body py-4">
            <div class="p-3 bg-light rounded-3 border mb-3 mx-auto" style="height: 80px; width: 180px; display:flex; align-items:center; justify-content:center;">
              <span style="font-family: 'Brush Script MT', cursive, sans-serif; font-size: 2rem; color: #1e3a8a;">MK Sharma</span>
            </div>
            <div class="fw-bold text-main font-size-14">Mr. M. K. Sharma</div>
            <div class="font-size-12 text-muted">Chief Accounts Officer</div>
          </div>
          <div class="erp-card-footer text-center">
            <small class="text-muted">Applied on: Fee Receipts, Demand Notices, Invoices</small>
          </div>
        </div>
      </div>

      <!-- Seal 4: School Registrar Seal -->
      <div class="col-md-6 col-lg-3">
        <div class="erp-card h-100 text-center">
          <div class="erp-card-header justify-content-between">
            <h6 class="erp-card-title font-size-13">Institutional Seal</h6>
            <span class="badge bg-success-subtle text-success border border-success-subtle font-size-11">Authorized</span>
          </div>
          <div class="erp-card-body py-4">
            <div class="p-2 border border-2 border-primary rounded-circle mx-auto mb-3" style="width: 80px; height: 80px; display:flex; flex-direction:column; align-items:center; justify-content:center; color:#1e40af;">
              <i class="bi bi-shield-check fs-2"></i>
            </div>
            <div class="fw-bold text-main font-size-14">Registrar Office Seal</div>
            <div class="font-size-12 text-muted">Delhi Public Global Academy</div>
          </div>
          <div class="erp-card-footer text-center">
            <small class="text-muted">Applied on: Migration, Bonafide & Verification</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= TAB 4: LETTERHEADS & STATIONERY ================= -->
  <div class="tab-pane fade" id="tab-stationery" role="tabpanel">
    <div class="erp-card">
      <div class="erp-card-header">
        <h5 class="erp-card-title"><i class="bi bi-file-earmark-richtext text-primary"></i> Standard Institutional Letterhead Template (CBSE Format)</h5>
        <button class="btn btn-sm btn-outline-primary" onclick="window.print()">
          <i class="bi bi-printer me-1"></i> Print Sample Letterhead
        </button>
      </div>
      <div class="erp-card-body p-4 bg-light">
        <!-- Live Letterhead Document Box -->
        <div class="bg-white p-5 border rounded-3 shadow-sm mx-auto printable-document" style="max-width: 780px; min-height: 520px; position:relative;">
          <!-- Letterhead Top Bar -->
          <div class="d-flex align-items-center justify-content-between pb-3 border-bottom border-2 border-primary mb-4">
            <div class="d-flex align-items-center gap-3">
              <div class="profile-crest-wrapper" style="width:72px; height:72px; font-size:1.8rem;">
                DPGA
              </div>
              <div>
                <h3 class="fw-bold text-primary mb-0 font-size-20">DELHI PUBLIC GLOBAL ACADEMY</h3>
                <div class="font-size-11 text-muted fw-semibold">Affiliated to Central Board of Secondary Education (CBSE), New Delhi</div>
                <div class="font-size-11 text-muted font-mono">Affiliation No: 2130892 | School Code: 70142 | U-DISE+: 07010401824</div>
              </div>
            </div>
            <div class="text-end font-size-11 text-muted">
              <div><i class="bi bi-telephone"></i> +91 11 2893 4000</div>
              <div><i class="bi bi-envelope"></i> info@dpglobalacademy.edu.in</div>
              <div><i class="bi bi-globe"></i> www.dpglobalacademy.edu.in</div>
            </div>
          </div>

          <!-- Sample Body Text -->
          <div class="mb-4 d-flex justify-content-between font-size-13 text-muted">
            <span><strong>Ref. No:</strong> DPGA/ADMIN/2024-25/CIRC-042</span>
            <span><strong>Date:</strong> 28 October 2024</span>
          </div>

          <div class="mb-4">
            <h5 class="fw-bold text-center text-decoration-underline mb-3">OFFICIAL CIRCULAR / NOTIFICATION</h5>
            <p class="font-size-14 text-muted leading-relaxed">
              This is to formally certify that all academic curricula, safety bylaws, structural stability standards, and CBSE affiliation norms are strictly enforced across all wings at Delhi Public Global Academy. Official records are digitally verified and archived in accordance with institutional regulatory governance.
            </p>
          </div>

          <!-- Letterhead Bottom Signature Area -->
          <div class="d-flex justify-content-between align-items-end pt-5 mt-5">
            <div class="text-center">
              <div class="rounded-circle border border-primary p-2 d-inline-block text-primary mb-1">
                <i class="bi bi-shield-check fs-4"></i>
              </div>
              <div class="font-size-11 text-muted fw-bold">OFFICIAL SCHOOL SEAL</div>
            </div>
            <div class="text-center">
              <div style="font-family: 'Brush Script MT', cursive; font-size: 1.8rem; color: #1e3a8a; line-height: 1;">Sunita Rao</div>
              <div class="fw-bold font-size-12 mt-1">Dr. Sunita Rao</div>
              <div class="font-size-11 text-muted">Principal & Head of Institution</div>
            </div>
          </div>

          <!-- Letterhead Footer -->
          <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-light border-top text-center font-size-11 text-muted">
            Sector 14, Knowledge City, Dwarka Expressway Sub-City, New Delhi - 110075 • Tel: +91 11 2893 4000
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= TAB 5: ID CARDS ================= -->
  <div class="tab-pane fade" id="tab-idcards" role="tabpanel">
    <div class="row g-4">
      <!-- Student ID Card Preview -->
      <div class="col-md-6">
        <div class="erp-card h-100">
          <div class="erp-card-header">
            <h5 class="erp-card-title"><i class="bi bi-person-vcard text-primary"></i> Student Smart ID Card Template</h5>
            <button class="btn btn-xs btn-outline-primary" onclick="simulateAssetDownload('StudentID_Template.pdf')"><i class="bi bi-download me-1"></i> Template</button>
          </div>
          <div class="erp-card-body d-flex justify-content-center py-4 bg-light">
            <!-- ID Card Mockup -->
            <div class="bg-white border rounded-3 shadow-sm overflow-hidden" style="width: 280px; height: 420px; display:flex; flex-direction:column; position:relative;">
              <div class="p-3 text-white text-center" style="background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);">
                <div class="fw-bold font-size-13">DELHI PUBLIC GLOBAL ACADEMY</div>
                <div class="font-size-10 opacity-75">STUDENT IDENTITY CARD • 2024-25</div>
              </div>
              <div class="p-3 text-center flex-grow-1 d-flex flex-column align-items-center">
                <div class="table-avatar bg-primary text-white mb-2" style="width: 72px; height: 72px; font-size: 1.75rem; border: 3px solid #e2e8f0;">
                  AS
                </div>
                <h6 class="fw-bold mb-0 text-dark">Aarav Sharma</h6>
                <div class="font-size-12 text-primary fw-semibold mb-2">Class 10 - Section A (Roll: 14)</div>
                
                <div class="w-100 text-start font-size-11 text-muted mt-2 border-top pt-2">
                  <div class="d-flex justify-content-between mb-1"><span>Adm No:</span> <strong class="text-dark font-mono">ED-8491</strong></div>
                  <div class="d-flex justify-content-between mb-1"><span>Blood Group:</span> <strong class="text-danger">O+ Positive</strong></div>
                  <div class="d-flex justify-content-between mb-1"><span>Bus Route:</span> <strong class="text-dark">Route #12 (Dwarka)</strong></div>
                  <div class="d-flex justify-content-between"><span>Parent Phone:</span> <strong class="text-dark font-mono">+91 98112 34567</strong></div>
                </div>

                <div class="mt-auto pt-2 border-top w-100 d-flex align-items-center justify-content-between">
                  <i class="bi bi-qr-code fs-3 text-dark"></i>
                  <div class="text-end font-size-9 text-muted">
                    <div style="font-family:'Brush Script MT', cursive; font-size:1.1rem; color:#1e3a8a;">Sunita Rao</div>
                    <div>Principal Sign</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Staff / Faculty ID Card Preview -->
      <div class="col-md-6">
        <div class="erp-card h-100">
          <div class="erp-card-header">
            <h5 class="erp-card-title"><i class="bi bi-person-badge-fill text-success"></i> Faculty & Staff Smart ID Card Template</h5>
            <button class="btn btn-xs btn-outline-success" onclick="simulateAssetDownload('StaffID_Template.pdf')"><i class="bi bi-download me-1"></i> Template</button>
          </div>
          <div class="erp-card-body d-flex justify-content-center py-4 bg-light">
            <!-- ID Card Mockup -->
            <div class="bg-white border rounded-3 shadow-sm overflow-hidden" style="width: 280px; height: 420px; display:flex; flex-direction:column; position:relative;">
              <div class="p-3 text-white text-center" style="background: linear-gradient(135deg, #0f766e 0%, #10b981 100%);">
                <div class="fw-bold font-size-13">DELHI PUBLIC GLOBAL ACADEMY</div>
                <div class="font-size-10 opacity-75">FACULTY IDENTIFICATION CARD</div>
              </div>
              <div class="p-3 text-center flex-grow-1 d-flex flex-column align-items-center">
                <div class="table-avatar bg-success text-white mb-2" style="width: 72px; height: 72px; font-size: 1.75rem; border: 3px solid #e2e8f0;">
                  VR
                </div>
                <h6 class="fw-bold mb-0 text-dark">Vikram Rathore</h6>
                <div class="font-size-12 text-success fw-semibold mb-2">PGT Physics • Senior Wing</div>
                
                <div class="w-100 text-start font-size-11 text-muted mt-2 border-top pt-2">
                  <div class="d-flex justify-content-between mb-1"><span>Emp Code:</span> <strong class="text-dark font-mono">EMP-1048</strong></div>
                  <div class="d-flex justify-content-between mb-1"><span>Department:</span> <strong class="text-dark">Science & Tech</strong></div>
                  <div class="d-flex justify-content-between mb-1"><span>Blood Group:</span> <strong class="text-danger">B+ Positive</strong></div>
                  <div class="d-flex justify-content-between"><span>Emergency:</span> <strong class="text-dark font-mono">+91 98711 22334</strong></div>
                </div>

                <div class="mt-auto pt-2 border-top w-100 d-flex align-items-center justify-content-between">
                  <i class="bi bi-qr-code fs-3 text-dark"></i>
                  <div class="text-end font-size-9 text-muted">
                    <div style="font-family:'Brush Script MT', cursive; font-size:1.1rem; color:#1e3a8a;">Sunita Rao</div>
                    <div>Director Sign</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div> <!-- End Branding Tabs -->

<!-- Modals -->
<div class="modal fade" id="uploadAssetModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-cloud-arrow-up text-primary me-2"></i>Upload Brand Asset</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form onsubmit="handleAssetUpload(event)">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Asset Title <span class="required">*</span></label>
            <input type="text" class="form-control" id="assetTitle" required placeholder="e.g. Silver Jubilee Special Logo">
          </div>
          <div class="mb-3">
            <label class="form-label">Asset Type <span class="required">*</span></label>
            <select class="form-select" id="assetType">
              <option>Vector Crest (SVG/EPS)</option>
              <option>Digital Rubber Stamp</option>
              <option>Watermark Asset</option>
              <option>Stationery Template</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">File (PNG, SVG, PDF) <span class="required">*</span></label>
            <input type="file" class="form-control" required accept=".png,.svg,.pdf,.jpg">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-check-lg me-1"></i> Upload Asset</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="uploadSigModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-pen-fill text-primary me-2"></i>Upload Authorized Signature / Seal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form onsubmit="handleSigUpload(event)">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Official Name <span class="required">*</span></label>
            <input type="text" class="form-control" required placeholder="e.g. Dr. Sunita Rao">
          </div>
          <div class="mb-3">
            <label class="form-label">Role / Authority <span class="required">*</span></label>
            <input type="text" class="form-control" required placeholder="e.g. Principal & Head of Institution">
          </div>
          <div class="mb-3">
            <label class="form-label">Transparent Signature Scan (PNG) <span class="required">*</span></label>
            <input type="file" class="form-control" required accept=".png,.svg">
            <div class="form-text font-size-11">Upload on transparent background with high contrast for automated document stamping.</div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-check-lg me-1"></i> Save Signature</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function simulateAssetDownload(fileName) {
  if (window.EduApp && window.EduApp.toast) {
    EduApp.toast(`Downloading asset: ${fileName}`, "info", "Brand Kit");
  } else {
    alert(`Downloading asset: ${fileName}`);
  }
}

function handleAssetUpload(e) {
  e.preventDefault();
  const title = document.getElementById('assetTitle').value;
  bootstrap.Modal.getInstance(document.getElementById('uploadAssetModal')).hide();
  if (window.EduApp && window.EduApp.toast) {
    EduApp.toast(`"${title}" uploaded to Brand Identity Kit!`, "success", "Brand Asset");
  }
}

function handleSigUpload(e) {
  e.preventDefault();
  bootstrap.Modal.getInstance(document.getElementById('uploadSigModal')).hide();
  if (window.EduApp && window.EduApp.toast) {
    EduApp.toast(`Digital signature saved and encrypted for automated stamping!`, "success", "Authorized Signature");
  }
}

function previewLetterheadModal() {
  const trigger = document.getElementById('tab-stationery-btn');
  if (trigger) {
    const tab = new bootstrap.Tab(trigger);
    tab.show();
  }
}

function openColorPickerModal() {
  if (window.EduApp && window.EduApp.toast) {
    EduApp.toast("Color palette customizer active. Selected Navy #1E40AF as institutional primary.", "info", "Color System");
  }
}
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
