/**
 * EDUSYS PRO - DATA TABLE & LOCAL STORAGE PERSISTENCE ENGINE
 * Real-time LocalStorage CRUD, search, multi-select filtering, pagination, CSV export, and print
 */

window.EduTables = (function () {
  const STORAGE_PREFIX = 'edusys_mod_storage_';

  function getModuleKey() {
    const path = window.location.pathname.replace(/\\/g, '/');
    const parts = path.split('/').filter(p => p.length > 0 && !p.includes(':'));
    const relevant = parts.slice(-3).join('_').replace(/\.php|\.html/g, '');
    return STORAGE_PREFIX + (relevant || 'generic_module');
  }

  function getStorageState() {
    const key = getModuleKey();
    try {
      const raw = localStorage.getItem(key);
      if (raw) return JSON.parse(raw);
    } catch (e) {
      console.error("LocalStorage read error", e);
    }
    return { added: [], edited: {}, deleted: [] };
  }

  function setStorageState(state) {
    const key = getModuleKey();
    try {
      localStorage.setItem(key, JSON.stringify(state));
    } catch (e) {
      console.error("LocalStorage write error", e);
    }
  }

  function getInitials(name) {
    if (!name) return 'RC';
    const words = name.trim().split(/\s+/);
    if (words.length === 1) return words[0].slice(0, 2).toUpperCase();
    return (words[0][0] + words[words.length - 1][0]).toUpperCase();
  }

  function getStatusClass(status) {
    const s = (status || '').toLowerCase();
    if (s.includes('paid') || s.includes('active') || s.includes('approved') || s.includes('success')) {
      return 'badge-paid bg-success-subtle text-success border border-success border-opacity-25';
    }
    if (s.includes('pending') || s.includes('draft') || s.includes('partial') || s.includes('review')) {
      return 'badge-partial bg-warning-subtle text-warning border border-warning border-opacity-25';
    }
    if (s.includes('due') || s.includes('unpaid') || s.includes('overdue')) {
      return 'badge-unpaid bg-danger-subtle text-danger border border-danger border-opacity-25';
    }
    return 'badge bg-light text-muted border';
  }

  function updateCounts() {
    const table = document.querySelector('#mainDataTable');
    if (!table) return;
    const allRows = table.querySelectorAll('tbody tr');
    let visibleCount = 0;
    allRows.forEach(r => {
      if (r.style.display !== 'none') visibleCount++;
    });

    const counterEl = document.querySelector('.table-visible-count');
    if (counterEl) counterEl.textContent = visibleCount;

    const pageInfo = document.querySelector('.pagination-info');
    if (pageInfo) {
      pageInfo.textContent = `Showing 1 to ${visibleCount} of ${visibleCount} active entries`;
    }

    // Update KPI Total Entries if present
    const firstKpi = document.querySelector('.kpi-card:first-child .kpi-value');
    if (firstKpi && visibleCount > 0) {
      firstKpi.textContent = visibleCount.toLocaleString();
    }

    // Add or toggle "Reset Local Data" link if changes exist
    const state = getStorageState();
    const hasChanges = (
      (state.added && state.added.length > 0) ||
      (state.edited && Object.keys(state.edited).length > 0) ||
      (state.deleted && state.deleted.length > 0)
    );

    const filterRight = document.querySelector('.table-filter-right');
    if (filterRight) {
      let resetBtn = filterRight.querySelector('#btnResetModuleData');
      if (hasChanges) {
        if (!resetBtn) {
          resetBtn = document.createElement('button');
          resetBtn.id = 'btnResetModuleData';
          resetBtn.type = 'button';
          resetBtn.className = 'btn btn-xs btn-outline-danger ms-2 py-0.5 px-2 font-size-11 rounded-pill';
          resetBtn.innerHTML = '<i class="bi bi-arrow-counterclockwise me-1"></i> Reset Local Data';
          resetBtn.title = 'Clear local storage changes for this module';
          resetBtn.onclick = resetModuleData;
          filterRight.appendChild(resetBtn);
        }
      } else if (resetBtn) {
        resetBtn.remove();
      }
    }
  }

  function initTable(tableSelector = '#mainDataTable') {
    const table = document.querySelector(tableSelector);
    if (!table) return;
    const tbody = table.querySelector('tbody');
    if (!tbody) return;

    const state = getStorageState();

    // 1. Tag and sanitize existing static rows
    const initialRows = Array.from(tbody.querySelectorAll('tr'));
    initialRows.forEach((tr, idx) => {
      const codeCell = tr.querySelector('.font-mono, td:first-child');
      let rowId = codeCell ? codeCell.textContent.trim() : ('orig-' + idx);
      if (!rowId || rowId.length > 40) rowId = 'orig-' + idx;
      tr.dataset.rowId = rowId;

      // If deleted in storage, remove it
      if (state.deleted && state.deleted.includes(rowId)) {
        tr.remove();
        return;
      }

      // If edited in storage, apply edits
      if (state.edited && state.edited[rowId]) {
        applyRowEdit(tr, state.edited[rowId]);
      }
    });

    // 2. Prepend added records from storage
    if (state.added && Array.isArray(state.added)) {
      state.added.forEach(record => {
        if (!tbody.querySelector(`tr[data-row-id="${record.id}"]`)) {
          const newTr = createRowElement(record, table);
          tbody.insertBefore(newTr, tbody.firstChild);
        }
      });
    }

    // 3. Delegate Eye & Pencil clicks
    attachRowActions(table);

    // 4. Update UI counts
    updateCounts();
  }

  function applyRowEdit(tr, data) {
    if (!tr || !data) return;
    // Name / Title
    const nameEl = tr.querySelector('.table-user-name');
    if (nameEl && data.title) {
      nameEl.textContent = data.title;
    } else {
      const col = tr.cells[1] || tr.cells[0];
      if (col && data.title) col.textContent = data.title;
    }

    // Category / Class
    const subEl = tr.querySelector('.table-user-sub');
    if (subEl && data.category) {
      subEl.textContent = data.category;
    }

    // Avatar
    const avatarEl = tr.querySelector('.table-avatar');
    if (avatarEl && data.title) {
      avatarEl.textContent = getInitials(data.title);
    }

    // Reference Code
    const codeEl = tr.querySelector('.font-mono');
    if (codeEl && data.code) {
      codeEl.textContent = data.code;
    }

    // Status badge
    const badgeEl = tr.querySelector('.badge-status, .badge');
    if (badgeEl && data.status) {
      badgeEl.textContent = data.status;
      badgeEl.className = 'badge-status ' + getStatusClass(data.status);
    }
  }

  function createRowElement(record, table) {
    const tr = document.createElement('tr');
    tr.dataset.rowId = record.id;
    tr.className = 'table-row-new';

    const ths = table.querySelectorAll('thead th');
    const colCount = Math.max(ths.length, 6);

    const avatar = getInitials(record.title);
    const code = record.code || ('REF-' + Math.floor(1000 + Math.random() * 9000));
    const statusClass = getStatusClass(record.status);

    let cellsHtml = `
      <td class="fw-bold text-primary font-mono font-size-13">${escapeHtml(code)}</td>
      <td>
        <div class="table-user-cell">
          <div class="table-avatar bg-primary text-white">${avatar}</div>
          <div>
            <div class="table-user-name">${escapeHtml(record.title)}</div>
            <div class="table-user-sub">${escapeHtml(record.category || 'General')}</div>
          </div>
        </div>
      </td>
    `;

    if (colCount >= 7) {
      cellsHtml += `<td><small class="text-muted">${escapeHtml(record.notes || 'Institutional Entry')}</small></td>`;
    }
    if (colCount >= 8) {
      cellsHtml += `<td><span class="font-size-13">${escapeHtml(record.category || 'Standard')}</span></td>`;
    }
    if (colCount >= 9) {
      cellsHtml += `<td class="text-end fw-bold font-size-14 text-dark dark-text-white">${record.amount || '—'}</td>`;
    }

    cellsHtml += `
      <td><small class="text-muted">${record.date || 'Today'}</small></td>
      <td><span class="badge-status ${statusClass}">${escapeHtml(record.status || 'Active')}</span></td>
      <td class="text-center">
        <div class="action-btn-group justify-content-center">
          <button class="action-btn" data-bs-toggle="modal" data-bs-target="#viewRecordModal" title="View Details"><i class="bi bi-eye"></i></button>
          <button class="action-btn" data-bs-toggle="modal" data-bs-target="#editRecordModal" title="Edit Record"><i class="bi bi-pencil"></i></button>
          <button class="action-btn action-delete" onclick="EduTables.deleteRow(this)" title="Delete"><i class="bi bi-trash"></i></button>
        </div>
      </td>
    `;

    tr.innerHTML = cellsHtml;
    return tr;
  }

  function attachRowActions(table) {
    table.addEventListener('click', function (e) {
      const viewBtn = e.target.closest('[data-bs-target="#viewRecordModal"]');
      if (viewBtn) {
        populateViewModal(viewBtn.closest('tr'));
        return;
      }

      const editBtn = e.target.closest('[data-bs-target="#editRecordModal"]');
      if (editBtn) {
        populateEditModal(editBtn.closest('tr'));
        return;
      }
    });
  }

  function extractRowData(tr) {
    if (!tr) return {};
    const codeEl = tr.querySelector('.font-mono, td:first-child');
    const nameEl = tr.querySelector('.table-user-name');
    const subEl = tr.querySelector('.table-user-sub');
    const badgeEl = tr.querySelector('.badge-status, .badge');

    return {
      id: tr.dataset.rowId || (codeEl ? codeEl.textContent.trim() : ''),
      code: codeEl ? codeEl.textContent.trim() : '',
      title: nameEl ? nameEl.textContent.trim() : (tr.cells[1] ? tr.cells[1].innerText.trim() : 'Record'),
      category: subEl ? subEl.textContent.trim() : (tr.cells[2] ? tr.cells[2].innerText.trim() : 'Class 10-A'),
      status: badgeEl ? badgeEl.textContent.trim() : 'Active / Approved',
      date: new Date().toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' })
    };
  }

  function populateViewModal(tr) {
    const data = extractRowData(tr);
    const titleEl = document.getElementById('viewRecordTitle');
    const codeEl = document.getElementById('viewRecordCode');
    const catEl = document.getElementById('viewRecordCategory');
    const statusEl = document.getElementById('viewRecordStatus');
    const dateEl = document.getElementById('viewRecordDate');
    const notesEl = document.getElementById('viewRecordNotes');

    if (titleEl) titleEl.textContent = data.title;
    if (codeEl) codeEl.textContent = data.code || 'REF-2024-AUTO';
    if (catEl) catEl.textContent = data.category || 'Standard';
    if (statusEl) {
      statusEl.innerHTML = `<span class="badge ${getStatusClass(data.status)}">${escapeHtml(data.status)}</span>`;
    }
    if (dateEl) dateEl.textContent = data.date + ' (Synced in LocalStorage)';
    if (notesEl) notesEl.textContent = 'Active institutional record synchronized with browser local storage.';
  }

  function populateEditModal(tr) {
    const data = extractRowData(tr);
    const rowIdInput = document.getElementById('editRecordRowId');
    const titleInput = document.getElementById('editRecordTitle');
    const catSelect = document.getElementById('editRecordCategory');
    const codeInput = document.getElementById('editRecordCode');
    const statusSelect = document.getElementById('editRecordStatus');
    const notesInput = document.getElementById('editRecordNotes');

    if (rowIdInput) rowIdInput.value = data.id;
    if (titleInput) titleInput.value = data.title;
    if (codeInput) codeInput.value = data.code;
    if (catSelect && data.category) {
      let found = false;
      for (let i = 0; i < catSelect.options.length; i++) {
        if (catSelect.options[i].text.toLowerCase().includes(data.category.toLowerCase())) {
          catSelect.selectedIndex = i;
          found = true;
          break;
        }
      }
      if (!found) {
        catSelect.add(new Option(data.category, data.category, true, true));
      }
    }
    if (statusSelect && data.status) {
      for (let i = 0; i < statusSelect.options.length; i++) {
        if (statusSelect.options[i].text.toLowerCase().includes(data.status.toLowerCase())) {
          statusSelect.selectedIndex = i;
          break;
        }
      }
    }
    if (notesInput) {
      notesInput.value = `Updated entry for ${data.title} (${data.code}).`;
    }
  }

  function addRecord(record, tableSelector = '#mainDataTable') {
    const table = document.querySelector(tableSelector);
    if (!table) return;
    const tbody = table.querySelector('tbody');
    if (!tbody) return;

    record.id = 'rec_' + Date.now();
    record.date = new Date().toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' });

    // Save to LocalStorage
    const state = getStorageState();
    if (!state.added) state.added = [];
    state.added.unshift(record);
    setStorageState(state);

    // Prepend to DOM
    const tr = createRowElement(record, table);
    tbody.insertBefore(tr, tbody.firstChild);

    // Flash highlight
    tr.style.backgroundColor = 'rgba(59, 130, 246, 0.15)';
    setTimeout(() => {
      tr.style.transition = 'background-color 0.8s ease';
      tr.style.backgroundColor = '';
    }, 1200);

    updateCounts();
  }

  function updateRecord(rowId, updatedData, tableSelector = '#mainDataTable') {
    const table = document.querySelector(tableSelector);
    if (!table) return;
    const tr = table.querySelector(`tr[data-row-id="${rowId}"]`);
    if (!tr) return;

    // Apply to DOM
    applyRowEdit(tr, updatedData);

    // Update in LocalStorage
    const state = getStorageState();
    let isAdded = false;
    if (state.added && Array.isArray(state.added)) {
      const idx = state.added.findIndex(r => r.id === rowId);
      if (idx !== -1) {
        state.added[idx] = Object.assign(state.added[idx], updatedData);
        isAdded = true;
      }
    }
    if (!isAdded) {
      if (!state.edited) state.edited = {};
      state.edited[rowId] = updatedData;
    }
    setStorageState(state);

    // Flash highlight
    tr.style.backgroundColor = 'rgba(16, 185, 129, 0.15)';
    setTimeout(() => {
      tr.style.transition = 'background-color 0.8s ease';
      tr.style.backgroundColor = '';
    }, 1000);

    updateCounts();
  }

  function confirmDeleteRow(btn, itemTitle = "record") {
    const tr = btn.closest('tr');
    if (!tr) return;
    const rowId = tr.dataset.rowId;

    if (confirm(`Are you sure you want to delete this ${itemTitle}? This action persists in LocalStorage.`)) {
      // Save to LocalStorage
      const state = getStorageState();
      if (state.added && Array.isArray(state.added)) {
        state.added = state.added.filter(r => r.id !== rowId);
      }
      if (!state.deleted) state.deleted = [];
      if (!state.deleted.includes(rowId)) {
        state.deleted.push(rowId);
      }
      setStorageState(state);

      tr.style.transition = 'all 0.3s ease';
      tr.style.opacity = '0';
      tr.style.transform = 'translateX(-20px)';
      setTimeout(() => {
        tr.remove();
        updateCounts();
        if (window.EduApp) {
          EduApp.toast(`${itemTitle.charAt(0).toUpperCase() + itemTitle.slice(1)} deleted from LocalStorage.`, "success", "Deleted");
        }
      }, 300);
    }
  }

  function resetModuleData() {
    if (confirm("Reset this module's local storage data back to default factory state?")) {
      const key = getModuleKey();
      localStorage.removeItem(key);
      if (window.EduApp) {
        EduApp.toast("Module data reset to default successfully.", "info", "Reset Complete");
      }
      setTimeout(() => {
        window.location.reload();
      }, 400);
    }
  }

  function initTableSearch(inputId, tableSelector = '#mainDataTable') {
    initTable(tableSelector);

    const input = document.getElementById(inputId);
    const filterBar = document.querySelector('.table-filter-bar');
    const table = document.querySelector(tableSelector);
    if (!table) return;

    function applyFilters() {
      const textQuery = input ? input.value.toLowerCase().trim() : '';
      const selects = filterBar ? Array.from(filterBar.querySelectorAll('select')) : [];

      const selectFilters = selects.map(sel => {
        const val = sel.value.toLowerCase();
        if (val.includes('all ') || val === 'all' || val === '') return null;
        return val;
      }).filter(Boolean);

      const rows = table.querySelectorAll('tbody tr');
      let visibleCount = 0;

      rows.forEach(row => {
        const rowText = row.textContent.toLowerCase();
        let matchesText = !textQuery || rowText.includes(textQuery);
        let matchesSelects = true;

        for (const sf of selectFilters) {
          if (!rowText.includes(sf)) {
            matchesSelects = false;
            break;
          }
        }

        if (matchesText && matchesSelects) {
          row.style.display = '';
          visibleCount++;
        } else {
          row.style.display = 'none';
        }
      });

      const counterEl = document.querySelector('.table-visible-count');
      if (counterEl) counterEl.textContent = visibleCount;
    }

    if (input) {
      input.addEventListener('input', applyFilters);
    }

    if (filterBar) {
      filterBar.querySelectorAll('select').forEach(sel => {
        sel.addEventListener('change', applyFilters);
      });
    }
  }

  function exportTableToCSV(tableSelector = '#mainDataTable', filename = 'school_erp_export.csv') {
    const table = document.querySelector(tableSelector);
    if (!table) {
      if (window.EduApp) EduApp.toast("No table found to export", "warning");
      return;
    }

    const rows = table.querySelectorAll('tr');
    const csv = [];

    rows.forEach(row => {
      if (row.style.display === 'none') return;
      const cols = row.querySelectorAll('th, td');
      const rowData = [];

      cols.forEach((col, idx) => {
        if (idx === cols.length - 1 && (col.querySelector('.action-btn-group') || col.textContent.trim() === 'Actions')) {
          return;
        }
        let text = col.innerText.replace(/"/g, '""').trim();
        rowData.push(`"${text}"`);
      });

      if (rowData.length > 0) csv.push(rowData.join(','));
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

  function printElement() {
    window.print();
  }

  function escapeHtml(str) {
    return (str || '').replace(/[&<>"']/g, m => ({
      '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
    }[m]));
  }

  // Auto-init once DOM is ready if mainDataTable is present
  document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('#mainDataTable')) {
      initTableSearch('tableSearchInput', '#mainDataTable');
    }
  });

  return {
    init: initTable,
    initSearch: initTableSearch,
    addRecord: addRecord,
    updateRecord: updateRecord,
    deleteRow: confirmDeleteRow,
    resetData: resetModuleData,
    exportCSV: exportTableToCSV,
    print: printElement
  };
})();
