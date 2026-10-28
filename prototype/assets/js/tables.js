/**
 * EDUSYS PRO - DATA TABLE HELPERS
 * Search, sorting, filtering, pagination, CSV export & print
 */

window.EduTables = (function () {

  function initTableSearch(inputId, tableSelector) {
    const input = document.getElementById(inputId);
    if (!input) return;

    input.addEventListener('input', function () {
      const filter = this.value.toLowerCase().trim();
      const table = document.querySelector(tableSelector);
      if (!table) return;

      const rows = table.querySelectorAll('tbody tr');
      let visibleCount = 0;

      rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        if (text.includes(filter)) {
          row.style.display = '';
          visibleCount++;
        } else {
          row.style.display = 'none';
        }
      });

      // Update visible count if element exists
      const counterEl = document.querySelector('.table-visible-count');
      if (counterEl) {
        counterEl.textContent = visibleCount;
      }
    });
  }

  function exportTableToCSV(tableSelector, filename = 'school_erp_export.csv') {
    const table = document.querySelector(tableSelector);
    if (!table) {
      if (window.EduApp) EduApp.toast("No table found to export", "warning");
      return;
    }

    const rows = table.querySelectorAll('tr');
    const csv = [];

    rows.forEach(row => {
      // skip hidden rows
      if (row.style.display === 'none') return;

      const cols = row.querySelectorAll('th, td');
      const rowData = [];

      cols.forEach((col, idx) => {
        // Skip last column if it contains action buttons
        if (idx === cols.length - 1 && (col.querySelector('.action-btn-group') || col.textContent.trim() === 'Actions')) {
          return;
        }
        let text = col.innerText.replace(/"/g, '""').trim();
        rowData.push(`"${text}"`);
      });

      if (rowData.length > 0) {
        csv.push(rowData.join(','));
      }
    });

    const csvFile = new Blob([csv.join('\n')], { type: 'text/csv;charset=utf-8;' });
    const downloadLink = document.createElement('a');
    downloadLink.download = filename;
    downloadLink.href = window.URL.createObjectURL(csvFile);
    downloadLink.style.display = 'none';
    document.body.appendChild(downloadLink);
    downloadLink.click();
    document.body.removeChild(downloadLink);

    if (window.EduApp) {
      EduApp.toast("CSV file downloaded successfully", "success", "Export Completed");
    }
  }

  function printElement(elementSelector) {
    window.print();
  }

  function confirmDeleteRow(btn, itemTitle = "record") {
    if (confirm(`Are you sure you want to delete this ${itemTitle}? This action is simulated for the prototype.`)) {
      const tr = btn.closest('tr');
      if (tr) {
        tr.style.transition = 'opacity 0.3s';
        tr.style.opacity = '0';
        setTimeout(() => {
          tr.remove();
          if (window.EduApp) {
            EduApp.toast(`${itemTitle.charAt(0).toUpperCase() + itemTitle.slice(1)} deleted successfully`, "success", "Deleted");
          }
        }, 300);
      }
    }
  }

  return {
    initSearch: initTableSearch,
    exportCSV: exportTableToCSV,
    print: printElement,
    deleteRow: confirmDeleteRow
  };
})();
