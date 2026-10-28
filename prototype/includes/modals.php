<?php
/**
 * EDUSYS PRO - COMMON REUSABLE MODALS
 */
$modal_item_title = htmlspecialchars($page_title ?? 'Record');
?>
<!-- Common Add New Modal -->
<div class="modal fade" id="addNewRecordModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-plus-circle-fill text-primary"></i> Add New <?php echo $modal_item_title; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form onsubmit="EduForms.handleGenericSubmit(event, 'addNewRecordModal', '<?php echo $modal_item_title; ?>', '#mainDataTable')">
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Record Title / Name <span class="required">*</span></label>
              <input type="text" class="form-control" required placeholder="Enter name or title">
            </div>
            <div class="col-md-6">
              <label class="form-label">Class / Category <span class="required">*</span></label>
              <select class="form-select" required>
                <option value="" selected disabled>Select class / category</option>
                <option>Class 10 - Section A</option>
                <option>Class 10 - Section B</option>
                <option>Class 12 - Science (PCM)</option>
                <option>Class 12 - Commerce</option>
                <option>General Administration</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Reference Code / ID</label>
              <input type="text" class="form-control" placeholder="Auto-generated if blank (e.g. REF-2024-091)">
            </div>
            <div class="col-md-6">
              <label class="form-label">Status</label>
              <select class="form-select">
                <option selected>Active / Approved</option>
                <option>Pending Review</option>
                <option>Draft</option>
              </select>
            </div>
            <div class="col-12">
              <label class="form-label">Detailed Notes / Description</label>
              <textarea class="form-control" rows="3" placeholder="Enter additional details or remarks..."></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-check-lg me-1"></i> Save <?php echo $modal_item_title; ?></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Common Edit Modal -->
<div class="modal fade" id="editRecordModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-pencil-square text-primary"></i> Edit <?php echo $modal_item_title; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form onsubmit="EduForms.handleGenericSubmit(event, 'editRecordModal', '<?php echo $modal_item_title; ?>', '#mainDataTable')">
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Record Title / Name <span class="required">*</span></label>
              <input type="text" class="form-control" required value="Sample Record Entry">
            </div>
            <div class="col-md-6">
              <label class="form-label">Class / Category</label>
              <select class="form-select">
                <option selected>Class 10 - Section A</option>
                <option>Class 12 - Science</option>
              </select>
            </div>
            <div class="col-12">
              <label class="form-label">Remarks</label>
              <textarea class="form-control" rows="2">Record updated during active session audit.</textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary fw-bold">Update Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Common View Details Modal -->
<div class="modal fade" id="viewRecordModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-info-circle text-primary"></i> <?php echo $modal_item_title; ?> Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body font-size-14">
        <div class="list-group list-group-flush">
          <div class="list-group-item d-flex justify-content-between px-0">
            <span class="text-muted">Entity Title:</span>
            <strong class="text-dark dark-text-white">Aarav Sharma</strong>
          </div>
          <div class="list-group-item d-flex justify-content-between px-0">
            <span class="text-muted">Enrollment / Ref ID:</span>
            <span class="font-mono text-primary fw-bold">ADM-8491</span>
          </div>
          <div class="list-group-item d-flex justify-content-between px-0">
            <span class="text-muted">Class & Section:</span>
            <span>Class 10 - Section A</span>
          </div>
          <div class="list-group-item d-flex justify-content-between px-0">
            <span class="text-muted">Academic Board:</span>
            <span>CBSE Integrated</span>
          </div>
          <div class="list-group-item d-flex justify-content-between px-0">
            <span class="text-muted">Last Updated:</span>
            <span>27 Oct 2024 (by Super Admin)</span>
          </div>
          <div class="list-group-item d-flex justify-content-between px-0">
            <span class="text-muted">Audit Verification:</span>
            <span class="badge bg-success-subtle text-success">Verified & Signed</span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
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
