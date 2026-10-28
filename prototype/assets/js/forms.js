/**
 * EDUSYS PRO - FORM & MODAL HANDLERS
 * Full LocalStorage CRUD Form Integration, Validation, and Feedback
 */

window.EduForms = (function () {

  function handleGenericSubmit(e, modalId, itemType = "Record", tableSelector = '#mainDataTable') {
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
      if (modalId === 'addNewRecordModal') {
        const title = (form.querySelector('#addRecordTitle') || form.querySelector('[name="title"]') || {}).value || 'New Entry';
        const category = (form.querySelector('#addRecordCategory') || form.querySelector('[name="category"]') || {}).value || 'Class 10 - Section A';
        let code = (form.querySelector('#addRecordCode') || form.querySelector('[name="code"]') || {}).value;
        if (!code) {
          code = 'REC-2024-' + Math.floor(1000 + Math.random() * 9000);
        }
        const status = (form.querySelector('#addRecordStatus') || form.querySelector('[name="status"]') || {}).value || 'Active / Approved';
        const notes = (form.querySelector('#addRecordNotes') || form.querySelector('[name="notes"]') || {}).value || '';

        if (window.EduTables && window.EduTables.addRecord) {
          window.EduTables.addRecord({
            title: title,
            category: category,
            code: code,
            status: status,
            notes: notes
          }, tableSelector);
        }

        if (window.EduApp) {
          EduApp.toast(`"${title}" added successfully to ${itemType} in LocalStorage!`, "success", "Saved to LocalStorage");
        }
      } else if (modalId === 'editRecordModal') {
        const rowId = (form.querySelector('#editRecordRowId') || form.querySelector('[name="rowId"]') || {}).value;
        const title = (form.querySelector('#editRecordTitle') || form.querySelector('[name="title"]') || {}).value || 'Updated Record';
        const category = (form.querySelector('#editRecordCategory') || form.querySelector('[name="category"]') || {}).value || '';
        const code = (form.querySelector('#editRecordCode') || form.querySelector('[name="code"]') || {}).value || '';
        const status = (form.querySelector('#editRecordStatus') || form.querySelector('[name="status"]') || {}).value || 'Active / Approved';
        const notes = (form.querySelector('#editRecordNotes') || form.querySelector('[name="notes"]') || {}).value || '';

        if (window.EduTables && window.EduTables.updateRecord && rowId) {
          window.EduTables.updateRecord(rowId, {
            title: title,
            category: category,
            code: code,
            status: status,
            notes: notes
          }, tableSelector);
        }

        if (window.EduApp) {
          EduApp.toast(`"${title}" changes saved successfully in LocalStorage!`, "success", "Updated in LocalStorage");
        }
      }

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
    }, 350);
  }

  return {
    handleGenericSubmit: handleGenericSubmit
  };
})();
