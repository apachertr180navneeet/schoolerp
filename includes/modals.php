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
