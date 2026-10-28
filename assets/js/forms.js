/**
 * EDUSYS PRO - FORM & MODAL HANDLERS
 * Simulated CRUD, Bootstrap validation, and form feedback
 */

window.EduForms = (function () {

  function handleGenericSubmit(e, modalId, itemType = "Record", tableSelector = null) {
    e.preventDefault();
    const form = e.target;

    if (!form.checkValidity()) {
      e.stopPropagation();
      form.classList.add('was-validated');
      return;
    }

    const submitBtn = form.querySelector('[type="submit"]');
    const originalText = submitBtn ? submitBtn.innerHTML : 'Save';
    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status"></span> Saving...';
    }

    setTimeout(() => {
      // Hide modal
      if (modalId) {
        const modalEl = document.getElementById(modalId);
        if (modalEl) {
          const bsModal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
          bsModal.hide();
        }
      }

      form.reset();
      form.classList.remove('was-validated');
      if (submitBtn) {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
      }

      if (window.EduApp) {
        EduApp.toast(`${itemType} has been saved successfully in local state.`, "success", "Action Completed");
      }
    }, 600);
  }

  return {
    handleGenericSubmit: handleGenericSubmit
  };
})();
