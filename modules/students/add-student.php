<?php
/**
 * EDUSYS PRO - ADD STUDENT MULTI-STEP WIZARD
 * Comprehensive student onboarding form complying with CBSE OASIS & UDISE+ standards
 */
$page_title = "Add Student (Multi-Step)";
$page_desc = "Standardized multi-step scholar onboarding wizard with Aadhaar, APAAR ID, and document locker upload";
$active_module = "students";
$active_submodule = "add-student.php";
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
      <li class="breadcrumb-item"><a href="<?php echo base_url('modules/students/dashboard.php'); ?>">Student Information System</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($page_title); ?></li>
    </ol>
  </nav>
</div>

<!-- Page Header Box -->
<div class="page-header-box mb-4">
  <div class="page-title-group">
    <h1><i class="bi bi-person-plus-fill text-primary"></i> <?php echo $page_title; ?></h1>
    <p><?php echo $page_desc; ?></p>
  </div>
  <div class="page-actions-group d-flex flex-wrap gap-2">
    <a href="<?php echo base_url('modules/students/student-directory.php'); ?>" class="btn btn-light border">
      <i class="bi bi-arrow-left me-1"></i> Student Directory
    </a>
    <button class="btn btn-primary fw-bold" onclick="alert('Student Profile Saved as Draft!')">
      <i class="bi bi-save me-1"></i> Save Draft
    </button>
  </div>
</div>

<!-- Multi-Step Form Card -->
<div class="card border-0 shadow-sm p-4 mb-4">
  <!-- Stepper Tabs Header -->
  <ul class="nav nav-pills nav-fill mb-4 p-2 bg-light rounded-3" id="studentWizardTabs" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active fw-bold py-2 font-size-13" id="step1-tab" data-bs-toggle="pill" data-bs-target="#step1" type="button" role="tab">
        <i class="bi bi-person me-1"></i> 1. General & Identity
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link fw-bold py-2 font-size-13" id="step2-tab" data-bs-toggle="pill" data-bs-target="#step2" type="button" role="tab">
        <i class="bi bi-people me-1"></i> 2. Parents & Guardians
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link fw-bold py-2 font-size-13" id="step3-tab" data-bs-toggle="pill" data-bs-target="#step3" type="button" role="tab">
        <i class="bi bi-building me-1"></i> 3. Academic & Previous TC
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link fw-bold py-2 font-size-13" id="step4-tab" data-bs-toggle="pill" data-bs-target="#step4" type="button" role="tab">
        <i class="bi bi-folder-check me-1"></i> 4. Health & Documents
      </button>
    </li>
  </ul>

  <!-- Tab Contents -->
  <form id="addStudentMultiStepForm" onsubmit="event.preventDefault(); alert('Student Enrolled Successfully with Scholar #ADM-2024-009!'); window.location.href='student-directory.php';">
    <div class="tab-content" id="studentWizardTabContent">
      
      <!-- STEP 1: General & Identity -->
      <div class="tab-pane fade show active" id="step1" role="tabpanel">
        <h6 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="bi bi-person-vcard text-primary me-2"></i>Scholastic & Demographic Information</h6>
        <div class="row g-3">
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">Admission # <span class="text-danger">*</span></label>
            <input type="text" class="form-control" value="ADM-2024-009" readonly>
          </div>
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">First Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Enter first name" required>
          </div>
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">Last Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Enter last name" required>
          </div>
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">Date of Birth <span class="text-danger">*</span></label>
            <input type="date" class="form-control" required>
          </div>
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">Gender <span class="text-danger">*</span></label>
            <select class="form-select" required>
              <option value="">Select Gender</option>
              <option>Male</option>
              <option>Female</option>
              <option>Other</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">Blood Group</label>
            <select class="form-select">
              <option>A+ Positive</option>
              <option>A- Negative</option>
              <option>B+ Positive</option>
              <option>B- Negative</option>
              <option>O+ Positive</option>
              <option>O- Negative</option>
              <option>AB+ Positive</option>
              <option>AB- Negative</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">Social Category (CBSE)</label>
            <select class="form-select">
              <option>General</option>
              <option>OBC (Other Backward Class)</option>
              <option>SC (Scheduled Caste)</option>
              <option>ST (Scheduled Tribe)</option>
              <option>EWS / DG Quota</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">Aadhaar Card UID</label>
            <input type="text" class="form-control" placeholder="12-digit UIDAI number">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">APAAR ID (One Nation One ID)</label>
            <input type="text" class="form-control" placeholder="e.g. 8499 1048 2910">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">Target Grade <span class="text-danger">*</span></label>
            <select class="form-select" required>
              <option>Class 10 - Secondary</option>
              <option>Class 11 - Science (PCM)</option>
              <option>Class 11 - Commerce</option>
              <option>Class 6 - Middle Wing</option>
              <option>Class 1 - Primary Wing</option>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">Allocated Section</label>
            <select class="form-select">
              <option>Section A</option>
              <option>Section B</option>
              <option>Section C</option>
            </select>
          </div>
        </div>
        <div class="d-flex justify-content-end mt-4">
          <button type="button" class="btn btn-primary px-4 fw-bold" onclick="document.getElementById('step2-tab').click();">
            Next: Parents Details <i class="bi bi-arrow-right ms-1"></i>
          </button>
        </div>
      </div>

      <!-- STEP 2: Parents & Guardians -->
      <div class="tab-pane fade" id="step2" role="tabpanel">
        <h6 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="bi bi-people text-primary me-2"></i>Parent & Guardian Details</h6>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label font-size-12 fw-bold text-muted">Father's Full Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Enter father full name">
          </div>
          <div class="col-md-6">
            <label class="form-label font-size-12 fw-bold text-muted">Father's Occupation</label>
            <input type="text" class="form-control" placeholder="Profession / Organization">
          </div>
          <div class="col-md-6">
            <label class="form-label font-size-12 fw-bold text-muted">Mother's Full Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" placeholder="Enter mother full name">
          </div>
          <div class="col-md-6">
            <label class="form-label font-size-12 fw-bold text-muted">Mother's Occupation</label>
            <input type="text" class="form-control" placeholder="Profession / Organization">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">Primary Contact Mobile <span class="text-danger">*</span></label>
            <input type="tel" class="form-control" placeholder="+91 98XXX XXXXX">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">Parent Email Address</label>
            <input type="email" class="form-control" placeholder="parent@domain.com">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">Annual Household Income</label>
            <select class="form-select">
              <option>Above ₹15 Lakhs</option>
              <option>₹8 - ₹15 Lakhs</option>
              <option>₹5 - ₹8 Lakhs</option>
              <option>Below ₹5 Lakhs</option>
            </select>
          </div>
          <div class="col-12">
            <label class="form-label font-size-12 fw-bold text-muted">Residential Postal Address <span class="text-danger">*</span></label>
            <textarea class="form-control" rows="2" placeholder="House #, Street, Locality, City, State, Pin Code"></textarea>
          </div>
        </div>
        <div class="d-flex justify-content-between mt-4">
          <button type="button" class="btn btn-light border" onclick="document.getElementById('step1-tab').click();">
            <i class="bi bi-arrow-left me-1"></i> Back to Step 1
          </button>
          <button type="button" class="btn btn-primary px-4 fw-bold" onclick="document.getElementById('step3-tab').click();">
            Next: Academic & Previous TC <i class="bi bi-arrow-right ms-1"></i>
          </button>
        </div>
      </div>

      <!-- STEP 3: Academic & Previous TC -->
      <div class="tab-pane fade" id="step3" role="tabpanel">
        <h6 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="bi bi-building text-primary me-2"></i>Prior School & Academic Transcript</h6>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label font-size-12 fw-bold text-muted">Previous School Name</label>
            <input type="text" class="form-control" placeholder="e.g. Delhi Public School">
          </div>
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">Affiliation Board</label>
            <select class="form-select">
              <option>CBSE (Central Board)</option>
              <option>ICSE / ISC Board</option>
              <option>State Education Board</option>
              <option>IB / Cambridge International</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label font-size-12 fw-bold text-muted">Last Grade Passed</label>
            <input type="text" class="form-control" placeholder="e.g. Class 9 Passed">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">Transfer Certificate (TC) Serial #</label>
            <input type="text" class="form-control" placeholder="e.g. TC-DPS-9481">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">TC Date of Issue</label>
            <input type="date" class="form-control">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">TC Counter-Signed Status</label>
            <select class="form-select">
              <option>Yes, Counter-signed by Education Officer</option>
              <option>Pending Counter-signature (30-day window)</option>
              <option>N/A (Direct Entry / Nursery)</option>
            </select>
          </div>
        </div>
        <div class="d-flex justify-content-between mt-4">
          <button type="button" class="btn btn-light border" onclick="document.getElementById('step2-tab').click();">
            <i class="bi bi-arrow-left me-1"></i> Back to Step 2
          </button>
          <button type="button" class="btn btn-primary px-4 fw-bold" onclick="document.getElementById('step4-tab').click();">
            Next: Health & Documents <i class="bi bi-arrow-right ms-1"></i>
          </button>
        </div>
      </div>

      <!-- STEP 4: Health & Documents -->
      <div class="tab-pane fade" id="step4" role="tabpanel">
        <h6 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="bi bi-folder-check text-primary me-2"></i>Medical Alerts & Document Uploads</h6>
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">Emergency Hotline Contact</label>
            <input type="tel" class="form-control" placeholder="+91 98XXX XXXXX">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">Preferred Hospital / Clinic</label>
            <input type="text" class="form-control" placeholder="e.g. Manipal Hospital">
          </div>
          <div class="col-md-4">
            <label class="form-label font-size-12 fw-bold text-muted">Medical Alerts / Allergies</label>
            <input type="text" class="form-control" placeholder="e.g. Asthma Inhaler, Peanut Allergy">
          </div>
          <div class="col-md-6">
            <label class="form-label font-size-12 fw-bold text-muted">Upload Birth Certificate (PDF/JPG)</label>
            <input type="file" class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label font-size-12 fw-bold text-muted">Upload Transfer Certificate (TC)</label>
            <input type="file" class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label font-size-12 fw-bold text-muted">Upload Aadhaar Card / ID Proof</label>
            <input type="file" class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label font-size-12 fw-bold text-muted">Upload Passport Photograph</label>
            <input type="file" class="form-control">
          </div>
        </div>
        <div class="d-flex justify-content-between mt-4">
          <button type="button" class="btn btn-light border" onclick="document.getElementById('step3-tab').click();">
            <i class="bi bi-arrow-left me-1"></i> Back to Step 3
          </button>
          <button type="submit" class="btn btn-success px-5 fw-bold shadow-sm">
            <i class="bi bi-check-circle-fill me-1"></i> Complete Enrollment
          </button>
        </div>
      </div>

    </div>
  </form>
</div>

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
