/**
 * EDUSYS PRO - FORM & MODAL HANDLERS
 * Dynamic Multi-Module LocalStorage CRUD Form Integration, Validation, and Feedback
 */

window.EduForms = (function () {

  function handleDynamicSubmit(e, modalId, itemType = "Record", tableSelector = '#mainDataTable') {
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
      const getVal = (id, name) => {
        const el = form.querySelector('#' + id) || form.querySelector(`[name="${name}"]`);
        return el ? el.value.trim() : '';
      };

      const title = getVal('addRecordTitle', 'title') || getVal('editRecordTitle', 'title') || 'New Entry';
      const sub = getVal('addRecordSub', 'sub') || getVal('editRecordSub', 'sub') || '';
      const category = getVal('addRecordCategory', 'category') || getVal('editRecordCategory', 'category') || 'General';
      let code = getVal('addRecordCode', 'code') || getVal('editRecordCode', 'code');
      if (!code) {
        code = 'REC-' + Math.floor(1000 + Math.random() * 9000);
      }
      const c4 = getVal('addRecordC4', 'c4') || getVal('editRecordC4', 'c4') || '—';
      const c5 = getVal('addRecordC5', 'c5') || getVal('editRecordC5', 'c5') || '—';
      const c6 = getVal('addRecordC6', 'c6') || getVal('editRecordC6', 'c6') || '—';
      const c7 = getVal('addRecordC7', 'c7') || getVal('editRecordC7', 'c7') || new Date().toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' });
      const status = getVal('addRecordStatus', 'status') || getVal('editRecordStatus', 'status') || 'Active';
      const notes = getVal('addRecordNotes', 'notes') || getVal('editRecordNotes', 'notes') || '';

      if (modalId === 'addNewRecordModal') {
        if (window.EduTables && window.EduTables.addRecord) {
          window.EduTables.addRecord({
            title: title,
            sub: sub,
            category: category,
            code: code,
            c4: c4,
            c5: c5,
            c6: c6,
            c7: c7,
            status: status,
            notes: notes
          }, tableSelector);
        }

        if (window.EduApp && window.EduApp.toast) {
          EduApp.toast(`"${title}" added successfully to ${itemType} in LocalStorage!`, "success", "Saved to LocalStorage");
        }
      } else if (modalId === 'editRecordModal') {
        const rowId = (form.querySelector('#editRecordRowId') || form.querySelector('[name="rowId"]') || {}).value;

        if (window.EduTables && window.EduTables.updateRecord && rowId) {
          window.EduTables.updateRecord(rowId, {
            title: title,
            sub: sub,
            category: category,
            code: code,
            c4: c4,
            c5: c5,
            c6: c6,
            c7: c7,
            status: status,
            notes: notes
          }, tableSelector);
        }

        if (window.EduApp && window.EduApp.toast) {
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
    }, 300);
  }

  return {
    handleDynamicSubmit: handleDynamicSubmit,
    handleGenericSubmit: handleDynamicSubmit
  };
})();
