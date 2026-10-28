<?php
/**
 * EDUSYS PRO - COMMON REUSABLE MODALS
 */
$modal_item_title = htmlspecialchars($page_title ?? 'Record');
?>
<!-- Common Add New Modal -->
<div class="modal fade" id="addNewRecordModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-light border-bottom p-3 px-4">
        <div class="d-flex align-items-center gap-2">
          <div class="p-2 rounded-2 bg-primary-subtle text-primary font-size-18">
            <i class="bi bi-plus-circle-fill"></i>
          </div>
          <div>
            <h5 class="modal-title fw-bold text-dark mb-0" id="addRecordModalTitle">Add New <?php echo $modal_item_title; ?></h5>
            <small class="text-muted font-size-12">Enter verified record attributes for instant LocalStorage synchronization</small>
          </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="addNewRecordForm" onsubmit="EduForms.handleDynamicSubmit(event, 'addNewRecordModal', '<?php echo addslashes($modal_item_title); ?>', '#mainDataTable')">
        <div class="modal-body p-4" id="addRecordDynamicContainer">
          <div class="row g-3" id="addRecordFieldsRow">
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-semibold text-muted" id="lblAddCode">Reference Code / ID</label>
              <input type="text" class="form-control font-mono font-size-13" id="addRecordCode" name="code" placeholder="Auto-generated if left blank">
            </div>
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-semibold text-muted" id="lblAddTitle">Title / Full Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control font-size-13" id="addRecordTitle" name="title" required placeholder="Enter primary title or name">
            </div>
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-semibold text-muted" id="lblAddSub">Subtitle / Secondary Specification</label>
              <input type="text" class="form-control font-size-13" id="addRecordSub" name="sub" placeholder="e.g. Model, Subtitle, Variant">
            </div>
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-semibold text-muted" id="lblAddCategory">Category / Wing / Department <span class="text-danger">*</span></label>
              <select class="form-select font-size-13" id="addRecordCategory" name="category" required>
                <option value="" selected disabled>Select category / department</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-semibold text-muted" id="lblAddC4">Responsible / Incharge / Details</label>
              <input type="text" class="form-control font-size-13" id="addRecordC4" name="c4" placeholder="Enter details or incharge">
            </div>
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-semibold text-muted" id="lblAddC5">Contact / Metric / Specs</label>
              <input type="text" class="form-control font-size-13" id="addRecordC5" name="c5" placeholder="Enter contact, capacity, or specs">
            </div>
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-semibold text-muted" id="lblAddC6">Tag / Location / Source</label>
              <input type="text" class="form-control font-size-13" id="addRecordC6" name="c6" placeholder="Enter tag, room, or location">
            </div>
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-semibold text-muted" id="lblAddC7">Date / Amount / Reference</label>
              <input type="text" class="form-control font-size-13" id="addRecordC7" name="c7" placeholder="Today or custom value">
            </div>
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-semibold text-muted">Status</label>
              <select class="form-select font-size-13" id="addRecordStatus" name="status">
                <option selected>Active</option>
                <option>Approved</option>
                <option>Pending</option>
                <option>In Review</option>
                <option>Draft</option>
                <option>On Route</option>
                <option>Paid</option>
                <option>Enrolled</option>
              </select>
            </div>
            <div class="col-12">
              <label class="form-label font-size-13 fw-semibold text-muted">Detailed Notes / Operational Remarks</label>
              <textarea class="form-control font-size-13" id="addRecordNotes" name="notes" rows="2" placeholder="Enter additional audit notes or remarks..."></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer bg-light p-3 px-4 d-flex justify-content-between">
          <button type="button" class="btn btn-light border btn-sm px-3 rounded-pill" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary btn-sm px-4 fw-bold rounded-pill shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> Save <?php echo $modal_item_title; ?>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Common Edit Modal -->
<div class="modal fade" id="editRecordModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-light border-bottom p-3 px-4">
        <div class="d-flex align-items-center gap-2">
          <div class="p-2 rounded-2 bg-primary-subtle text-primary font-size-18">
            <i class="bi bi-pencil-square"></i>
          </div>
          <div>
            <h5 class="modal-title fw-bold text-dark mb-0" id="editRecordModalTitle">Edit <?php echo $modal_item_title; ?></h5>
            <small class="text-muted font-size-12">Modify attributes and persist changes instantly to LocalStorage</small>
          </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editRecordForm" onsubmit="EduForms.handleDynamicSubmit(event, 'editRecordModal', '<?php echo addslashes($modal_item_title); ?>', '#mainDataTable')">
        <input type="hidden" id="editRecordRowId" name="rowId">
        <div class="modal-body p-4" id="editRecordDynamicContainer">
          <div class="row g-3" id="editRecordFieldsRow">
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-semibold text-muted" id="lblEditCode">Reference Code / ID</label>
              <input type="text" class="form-control font-mono font-size-13" id="editRecordCode" name="code">
            </div>
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-semibold text-muted" id="lblEditTitle">Title / Full Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control font-size-13" id="editRecordTitle" name="title" required>
            </div>
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-semibold text-muted" id="lblEditSub">Subtitle / Secondary Specification</label>
              <input type="text" class="form-control font-size-13" id="editRecordSub" name="sub">
            </div>
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-semibold text-muted" id="lblEditCategory">Category / Wing / Department</label>
              <select class="form-select font-size-13" id="editRecordCategory" name="category">
                <option value="">Select category</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-semibold text-muted" id="lblEditC4">Details / Incharge / Responsible</label>
              <input type="text" class="form-control font-size-13" id="editRecordC4" name="c4">
            </div>
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-semibold text-muted" id="lblEditC5">Contact / Metrics / Specs</label>
              <input type="text" class="form-control font-size-13" id="editRecordC5" name="c5">
            </div>
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-semibold text-muted" id="lblEditC6">Location / Tag / Source</label>
              <input type="text" class="form-control font-size-13" id="editRecordC6" name="c6">
            </div>
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-semibold text-muted" id="lblEditC7">Date / Amount / Reference</label>
              <input type="text" class="form-control font-size-13" id="editRecordC7" name="c7">
            </div>
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-semibold text-muted">Status</label>
              <select class="form-select font-size-13" id="editRecordStatus" name="status">
                <option>Active</option>
                <option>Approved</option>
                <option>Pending</option>
                <option>In Review</option>
                <option>Draft</option>
                <option>Enrolled</option>
                <option>On Route</option>
                <option>Paid</option>
                <option>Inactive</option>
              </select>
            </div>
            <div class="col-12">
              <label class="form-label font-size-13 fw-semibold text-muted">Remarks / Notes</label>
              <textarea class="form-control font-size-13" id="editRecordNotes" name="notes" rows="2"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer bg-light p-3 px-4 d-flex justify-content-between">
          <button type="button" class="btn btn-light border btn-sm px-3 rounded-pill" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary btn-sm px-4 fw-bold rounded-pill shadow-sm">
            <i class="bi bi-check2-circle me-1"></i> Update Changes
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Common View Details Modal -->
<div class="modal fade" id="viewRecordModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-light border-bottom p-3 px-4">
        <div class="d-flex align-items-center gap-2">
          <div class="p-2 rounded-2 bg-info-subtle text-info font-size-18">
            <i class="bi bi-eye-fill"></i>
          </div>
          <div>
            <h5 class="modal-title fw-bold text-dark mb-0" id="viewModalHeading"><?php echo $modal_item_title; ?> Dossier</h5>
            <small class="text-muted font-size-12">Comprehensive audit record & attribute specifications</small>
          </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <!-- Executive Entity Card Header -->
        <div class="p-3 bg-light rounded-3 border mb-3 d-flex align-items-center justify-content-between flex-wrap gap-3">
          <div class="d-flex align-items-center gap-3">
            <div class="rounded-3 bg-primary text-white d-flex align-items-center justify-content-center fw-bold font-size-18 shadow-sm" style="width: 52px; height: 52px; flex-shrink: 0;" id="viewRecordAvatar">
              RC
            </div>
            <div>
              <h5 class="fw-bold text-dark mb-0 font-size-16" id="viewRecordTitle">Record Title</h5>
              <div class="text-muted font-size-12" id="viewRecordSub">Record Subtitle / Specification</div>
            </div>
          </div>
          <div class="d-flex align-items-center gap-2 flex-wrap">
            <span class="badge font-mono bg-white text-primary border border-primary border-opacity-25 px-2 py-1 font-size-12 shadow-sm" id="viewRecordCode">REF-0000</span>
            <span id="viewRecordStatusBadge"><span class="badge-status badge-active">Active</span></span>
          </div>
        </div>

        <!-- Specifications Grid Container -->
        <div class="border rounded-3 p-3 bg-white mb-3">
          <h6 class="font-size-12 text-uppercase text-muted fw-bold mb-3 d-flex align-items-center gap-2">
            <i class="bi bi-card-checklist text-primary"></i> Record Field Specifications
          </h6>
          <div class="row g-3" id="viewRecordSpecsGrid">
            <!-- Dynamically populated key-value specs for all table columns -->
          </div>
        </div>

        <!-- LocalStorage Audit Info -->
        <div class="d-flex align-items-center justify-content-between p-2 px-3 bg-light rounded-2 border font-size-12 text-muted">
          <span><i class="bi bi-database-check text-success me-1"></i> Data Status: <strong class="text-dark">Synchronized with LocalStorage</strong></span>
          <span id="viewRecordAuditDate">Updated Today</span>
        </div>
      </div>
      <div class="modal-footer bg-light p-3 px-4 d-flex justify-content-between">
        <div>
          <button type="button" class="btn btn-outline-secondary btn-sm px-3 rounded-pill" onclick="window.print()">
            <i class="bi bi-printer me-1"></i> Print
          </button>
        </div>
        <div class="d-flex gap-2">
          <button type="button" class="btn btn-light border btn-sm px-3 rounded-pill" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary btn-sm px-4 fw-bold rounded-pill" id="viewModalEditBtn">
            <i class="bi bi-pencil me-1"></i> Edit This Record
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ================= PROFILE UPDATE MODAL ================= -->
<div class="modal fade" id="profileUpdateModal" tabindex="-1" aria-labelledby="profileUpdateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-light border-bottom p-3 px-4">
        <div class="d-flex align-items-center gap-2">
          <div class="p-2 rounded-2 bg-primary-subtle text-primary font-size-18">
            <i class="bi bi-person-gear"></i>
          </div>
          <div>
            <h5 class="modal-title fw-bold text-dark mb-0" id="profileUpdateModalLabel">Update Profile</h5>
            <small class="text-muted font-size-12">Manage your personal information and contact preferences</small>
          </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="profileUpdateForm" onsubmit="handleProfileUpdateSubmit(event)">
        <div class="modal-body p-4">
          <!-- Avatar Preview Row -->
          <div class="d-flex align-items-center gap-3 p-3 bg-light rounded-3 border mb-4">
            <div class="user-menu-avatar current-user-avatar fw-bold font-size-20" style="width: 58px; height: 58px; flex-shrink: 0;" id="modalAvatarPreview">
              <?php echo htmlspecialchars($current_user['avatar'] ?? 'U'); ?>
            </div>
            <div>
              <h6 class="fw-bold text-dark mb-1">Profile Photo / Avatar</h6>
              <span class="badge bg-primary-subtle text-primary border border-primary border-opacity-25 font-size-11 mb-2">Role: <?php echo htmlspecialchars($current_user['role'] ?? 'User'); ?></span>
              <div class="d-flex gap-2">
                <button type="button" class="btn btn-sm btn-outline-primary py-1 px-3 font-size-12 fw-semibold" onclick="alert('Photo upload simulation: Selected new avatar.');">
                  <i class="bi bi-upload me-1"></i> Upload Photo
                </button>
                <button type="button" class="btn btn-sm btn-light border py-1 px-2 font-size-12 text-muted">
                  Remove
                </button>
              </div>
            </div>
          </div>

          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-bold text-muted">Full Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control font-size-13" id="inputProfileName" required value="<?php echo htmlspecialchars($current_user['name'] ?? ''); ?>" placeholder="Enter full name">
            </div>
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-bold text-muted">Email Address <span class="text-danger">*</span></label>
              <input type="email" class="form-control font-size-13" id="inputProfileEmail" required value="<?php echo htmlspecialchars($current_user['email'] ?? ''); ?>" placeholder="name@edusys.com">
            </div>
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-bold text-muted">Contact Mobile</label>
              <div class="input-group">
                <span class="input-group-text font-size-13 bg-light">+91</span>
                <input type="tel" class="form-control font-size-13" id="inputProfilePhone" value="98110 44219" placeholder="98110 44219">
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label font-size-13 fw-bold text-muted">Designation / Role</label>
              <input type="text" class="form-control font-size-13 bg-light" readonly value="<?php echo htmlspecialchars($current_user['role'] ?? 'User'); ?>">
            </div>
            <div class="col-12">
              <label class="form-label font-size-13 fw-bold text-muted">Department / Office Location</label>
              <input type="text" class="form-control font-size-13" value="Sector 14 Campus, Senior Wing">
            </div>
          </div>
        </div>
        <div class="modal-footer bg-light p-3 px-4 d-flex justify-content-between">
          <button type="button" class="btn btn-light border btn-sm px-3 rounded-pill" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary btn-sm px-4 fw-bold rounded-pill shadow-sm">
            <i class="bi bi-check2-circle me-1"></i> Save Profile Changes
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ================= CHANGE PASSWORD MODAL ================= -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-light border-bottom p-3 px-4">
        <div class="d-flex align-items-center gap-2">
          <div class="p-2 rounded-2 bg-warning-subtle text-warning font-size-18">
            <i class="bi bi-shield-lock-fill"></i>
          </div>
          <div>
            <h5 class="modal-title fw-bold text-dark mb-0" id="changePasswordModalLabel">Change Password</h5>
            <small class="text-muted font-size-12">Update your secure login credentials</small>
          </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="changePasswordForm" onsubmit="handleChangePasswordSubmit(event)">
        <div class="modal-body p-4">
          <div class="mb-3">
            <label class="form-label font-size-13 fw-bold text-muted">Current Password <span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="password" class="form-control font-size-13" id="inputCurrentPass" required placeholder="Enter current password">
              <button class="btn btn-outline-secondary" type="button" onclick="togglePassField('inputCurrentPass', this)">
                <i class="bi bi-eye"></i>
              </button>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label font-size-13 fw-bold text-muted">New Password <span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="password" class="form-control font-size-13" id="inputNewPass" required minlength="6" placeholder="Minimum 6 characters">
              <button class="btn btn-outline-secondary" type="button" onclick="togglePassField('inputNewPass', this)">
                <i class="bi bi-eye"></i>
              </button>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label font-size-13 fw-bold text-muted">Confirm New Password <span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="password" class="form-control font-size-13" id="inputConfirmPass" required placeholder="Re-enter new password">
              <button class="btn btn-outline-secondary" type="button" onclick="togglePassField('inputConfirmPass', this)">
                <i class="bi bi-eye"></i>
              </button>
            </div>
            <div id="passwordMismatchMsg" class="text-danger font-size-12 mt-1 d-none">New passwords do not match.</div>
          </div>

          <div class="p-3 bg-light rounded-3 border font-size-12 text-muted">
            <strong class="d-block text-dark mb-1 font-size-12"><i class="bi bi-shield-check text-success me-1"></i> Password Security Requirements:</strong>
            <ul class="mb-0 ps-3">
              <li>Minimum 6 characters in length</li>
              <li>Must not match your current password</li>
            </ul>
          </div>
        </div>
        <div class="modal-footer bg-light p-3 px-4 d-flex justify-content-between">
          <button type="button" class="btn btn-light border btn-sm px-3 rounded-pill" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-warning text-dark btn-sm px-4 fw-bold rounded-pill shadow-sm">
            <i class="bi bi-key-fill me-1"></i> Update Password
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function togglePassField(fieldId, btn) {
    const input = document.getElementById(fieldId);
    if (!input) return;
    const isPass = input.type === 'password';
    input.type = isPass ? 'text' : 'password';
    btn.innerHTML = isPass ? '<i class="bi bi-eye-slash"></i>' : '<i class="bi bi-eye"></i>';
  }

  function handleProfileUpdateSubmit(e) {
    e.preventDefault();
    const newName = document.getElementById('inputProfileName').value.trim();
    if (newName) {
      document.querySelectorAll('.current-user-name').forEach(el => el.innerText = newName);
    }
    const modalEl = document.getElementById('profileUpdateModal');
    const modalInstance = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
    modalInstance.hide();
    
    // Show toast
    if (window.EduApp && EduApp.showToast) {
      EduApp.showToast('Profile updated successfully!', 'success');
    } else {
      alert('Profile updated successfully!');
    }
  }

  function handleChangePasswordSubmit(e) {
    e.preventDefault();
    const newPass = document.getElementById('inputNewPass').value;
    const confirmPass = document.getElementById('inputConfirmPass').value;
    const mismatch = document.getElementById('passwordMismatchMsg');

    if (newPass !== confirmPass) {
      mismatch.classList.remove('d-none');
      return;
    }
    mismatch.classList.add('d-none');

    document.getElementById('inputCurrentPass').value = '';
    document.getElementById('inputNewPass').value = '';
    document.getElementById('inputConfirmPass').value = '';

    const modalEl = document.getElementById('changePasswordModal');
    const modalInstance = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
    modalInstance.hide();

    // Show toast
    if (window.EduApp && EduApp.showToast) {
      EduApp.showToast('Password changed successfully!', 'success');
    } else {
      alert('Password changed successfully!');
    }
  }
</script>
