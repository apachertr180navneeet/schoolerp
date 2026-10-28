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

    // Cell 0: Reference Code
    if (tr.cells[0]) {
      const codeEl = tr.cells[0].querySelector('.font-mono') || tr.cells[0];
      if (data.code) codeEl.textContent = data.code;
    }

    // Cell 1: Name / Title + Subtitle
    if (tr.cells[1]) {
      const nameEl = tr.cells[1].querySelector('.fw-semibold, .table-user-name');
      const subEl = tr.cells[1].querySelector('small, .table-user-sub');
      if (nameEl && data.title) {
        nameEl.textContent = data.title;
      } else if (data.title) {
        tr.cells[1].textContent = data.title;
      }
      if (subEl && data.sub !== undefined) {
        subEl.textContent = data.sub;
      }
      const avatarEl = tr.cells[1].querySelector('.table-avatar');
      if (avatarEl && data.title) {
        avatarEl.textContent = getInitials(data.title);
      }
    }

    // Cell 2: Category / Wing / Route / Group
    if (tr.cells[2] && data.category) {
      const badge = tr.cells[2].querySelector('.badge');
      if (badge) {
        badge.textContent = data.category;
      } else {
        tr.cells[2].textContent = data.category;
      }
    }

    // Cell 3: Details / Responsible / Incharge
    if (tr.cells[3] && data.c4 !== undefined) {
      const el = tr.cells[3].querySelector('small, span') || tr.cells[3];
      el.textContent = data.c4;
    }

    // Cell 4: Contact / Metric / Specs
    if (tr.cells[4] && data.c5 !== undefined) {
      const el = tr.cells[4].querySelector('small, span') || tr.cells[4];
      el.textContent = data.c5;
    }

    // Cell 5: Tag / Location / Source
    if (tr.cells[5] && data.c6 !== undefined) {
      const badge = tr.cells[5].querySelector('.badge');
      if (badge) {
        badge.textContent = data.c6;
      } else {
        tr.cells[5].textContent = data.c6;
      }
    }

    // Cell 6: Date / Reference / Amount
    if (tr.cells[6] && data.c7 !== undefined) {
      const el = tr.cells[6].querySelector('small, span') || tr.cells[6];
      el.textContent = data.c7;
    }

    // Status badge (second to last cell before Actions)
    const statusColIndex = tr.cells.length - 2;
    if (statusColIndex >= 0 && tr.cells[statusColIndex] && data.status) {
      const badgeEl = tr.cells[statusColIndex].querySelector('.badge-status, .badge') || tr.cells[statusColIndex];
      badgeEl.textContent = data.status;
      badgeEl.className = 'badge-status ' + getStatusClass(data.status);
    }
  }

  function createRowElement(record, table) {
    const tr = document.createElement('tr');
    tr.dataset.rowId = record.id;
    tr.className = 'table-row-new';

    const ths = Array.from(table.querySelectorAll('thead th'));
    const colCount = Math.max(ths.length, 6);

    const code = record.code || ('REC-' + Math.floor(1000 + Math.random() * 9000));
    const title = record.title || 'New Entry';
    const sub = record.sub || '';
    const category = record.category || 'General';
    const c4 = record.c4 || '—';
    const c5 = record.c5 || '—';
    const c6 = record.c6 || '—';
    const c7 = record.c7 || record.date || 'Today';
    const status = record.status || 'Active';
    const statusClass = getStatusClass(status);

    let cellsHtml = `
      <td class="fw-bold text-primary font-mono font-size-13">${escapeHtml(code)}</td>
      <td>
        <div class="fw-semibold text-dark">${escapeHtml(title)}</div>
        ${sub ? `<small class="text-muted font-size-11">${escapeHtml(sub)}</small>` : ''}
      </td>
      <td><span class="badge bg-light text-muted border font-size-12">${escapeHtml(category)}</span></td>
      <td><small class="text-dark">${escapeHtml(c4)}</small></td>
      <td><small class="text-muted font-mono font-size-12">${escapeHtml(c5)}</small></td>
      <td><span class="badge bg-light text-primary border font-size-12">${escapeHtml(c6)}</span></td>
      <td><small class="text-muted">${escapeHtml(c7)}</small></td>
      <td><span class="badge-status ${statusClass}">${escapeHtml(status)}</span></td>
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

    // Attach Add Modal listener to dynamically adapt labels and options
    const addModal = document.getElementById('addNewRecordModal');
    if (addModal && !addModal.dataset.listenerAttached) {
      addModal.dataset.listenerAttached = 'true';
      addModal.addEventListener('show.bs.modal', function () {
        prepareAddModal(table);
      });
    }
  }

  function extractRowData(tr) {
    if (!tr) return {};
    const table = tr.closest('table') || document.querySelector('#mainDataTable');
    const ths = table ? Array.from(table.querySelectorAll('thead th')) : [];
    const headers = ths.map(th => th.innerText.trim()).filter(h => !h.toLowerCase().includes('action'));

    const codeCell = tr.querySelector('.font-mono, td:first-child');
    const code = codeCell ? codeCell.innerText.trim() : '';

    const nameCell = tr.cells[1];
    let title = '';
    let sub = '';
    if (nameCell) {
      const semibold = nameCell.querySelector('.fw-semibold, .table-user-name');
      const smallEl = nameCell.querySelector('small, .table-user-sub');
      if (semibold) {
        title = semibold.innerText.trim();
        sub = smallEl ? smallEl.innerText.trim() : '';
      } else {
        const parts = nameCell.innerText.trim().split('\n').map(p => p.trim()).filter(Boolean);
        title = parts[0] || 'Record Entry';
        sub = parts[1] || '';
      }
    }

    const catCell = tr.cells[2];
    const category = catCell ? catCell.innerText.trim() : '';

    const c4Cell = tr.cells[3];
    const c4 = c4Cell ? c4Cell.innerText.trim() : '';

    const c5Cell = tr.cells[4];
    const c5 = c5Cell ? c5Cell.innerText.trim() : '';

    const c6Cell = tr.cells[5];
    const c6 = c6Cell ? c6Cell.innerText.trim() : '';

    const c7Cell = tr.cells[6];
    const c7 = c7Cell ? c7Cell.innerText.trim() : '';

    const statusColIndex = tr.cells.length - 2;
    const badgeEl = tr.querySelector('.badge-status, .badge');
    const status = badgeEl ? badgeEl.innerText.trim() : (tr.cells[statusColIndex] ? tr.cells[statusColIndex].innerText.trim() : 'Active');

    // Build specs list for View modal
    const fields = [];
    headers.forEach((h, idx) => {
      if (tr.cells[idx]) {
        fields.push({
          header: h,
          text: tr.cells[idx].innerText.trim().replace(/\s+/g, ' ')
        });
      }
    });

    return {
      id: tr.dataset.rowId || code || ('orig-' + Math.random().toString(36).substr(2, 6)),
      code: code,
      title: title,
      sub: sub,
      category: category,
      c4: c4,
      c5: c5,
      c6: c6,
      c7: c7,
      status: status,
      headers: headers,
      fields: fields,
      date: new Date().toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' })
    };
  }

  function collectModuleCategories(table) {
    const list = new Set();
    // 1. Scan page filter dropdowns
    const filterSelects = document.querySelectorAll('.table-filter-bar select, .table-filter-left select');
    filterSelects.forEach(sel => {
      Array.from(sel.options).forEach(opt => {
        const t = opt.text.trim();
        if (t && !t.toLowerCase().startsWith('all ') && t !== 'All' && !t.includes('Status')) {
          list.add(t);
        }
      });
    });

    // 2. Scan existing table column 2
    if (table) {
      const rows = table.querySelectorAll('tbody tr');
      rows.forEach(r => {
        if (r.cells[2]) {
          const t = r.cells[2].innerText.trim();
          if (t && t.length < 50) list.add(t);
        }
      });
    }

    const arr = Array.from(list);
    return arr.length > 0 ? arr : ['General Category', 'Senior Secondary', 'Primary Wing', 'Administrative', 'Standard'];
  }

  function generateDomainCode(header0, table) {
    const h = (header0 || '').toLowerCase();
    if (h.includes('plate') || h.includes('vehicle')) {
      return 'DL-1V-' + Math.floor(1000 + Math.random() * 9000);
    }
    if (h.includes('isbn') || h.includes('accession')) {
      return '978-81-' + Math.floor(10000 + Math.random() * 90000);
    }
    if (h.includes('scholar') || h.includes('adm') || h.includes('app')) {
      return 'ADM-2025-' + Math.floor(1000 + Math.random() * 9000);
    }
    if (h.includes('staff') || h.includes('emp')) {
      return 'EMP-2025-' + Math.floor(1000 + Math.random() * 9000);
    }
    if (h.includes('sku') || h.includes('item')) {
      return 'INV-ITEM-' + Math.floor(1000 + Math.random() * 9000);
    }
    if (h.includes('fee') || h.includes('head')) {
      return 'FH-' + Math.floor(100 + Math.random() * 900);
    }
    // Check first row's code format
    if (table) {
      const firstCode = table.querySelector('tbody tr .font-mono');
      if (firstCode) {
        const txt = firstCode.textContent.trim();
        const parts = txt.split('-');
        if (parts.length > 1) {
          return parts.slice(0, -1).join('-') + '-' + Math.floor(1000 + Math.random() * 9000);
        }
      }
    }
    return 'REC-2025-' + Math.floor(1000 + Math.random() * 9000);
  }

  function populateViewModal(tr) {
    const data = extractRowData(tr);
    const avatarEl = document.getElementById('viewRecordAvatar');
    const titleEl = document.getElementById('viewRecordTitle');
    const subEl = document.getElementById('viewRecordSub');
    const codeEl = document.getElementById('viewRecordCode');
    const statusBadgeEl = document.getElementById('viewRecordStatusBadge');
    const specsGrid = document.getElementById('viewRecordSpecsGrid');
    const auditDateEl = document.getElementById('viewRecordAuditDate');
    const editBtn = document.getElementById('viewModalEditBtn');

    if (avatarEl) avatarEl.textContent = getInitials(data.title);
    if (titleEl) titleEl.textContent = data.title;
    if (subEl) subEl.textContent = data.sub || (data.category ? (data.category + ' • Verified Institutional Record') : 'Verified Record Dossier');
    if (codeEl) codeEl.textContent = data.code || 'REF-AUTO';
    if (statusBadgeEl) {
      statusBadgeEl.innerHTML = `<span class="badge-status ${getStatusClass(data.status)}">${escapeHtml(data.status)}</span>`;
    }

    if (specsGrid && data.fields) {
      specsGrid.innerHTML = data.fields.map(f => `
        <div class="col-md-6">
          <div class="p-2.5 rounded-2 bg-light border-0">
            <span class="text-muted font-size-11 d-block text-uppercase fw-semibold mb-1">${escapeHtml(f.header)}</span>
            <span class="text-dark font-size-13 fw-semibold">${escapeHtml(f.text || '—')}</span>
          </div>
        </div>
      `).join('');
    }

    if (auditDateEl) auditDateEl.textContent = 'Updated ' + data.date + ' (LocalStorage Synced)';

    if (editBtn) {
      editBtn.onclick = function () {
        const viewModalEl = document.getElementById('viewRecordModal');
        if (viewModalEl) {
          const bsView = bootstrap.Modal.getInstance(viewModalEl);
          if (bsView) bsView.hide();
        }
        setTimeout(() => {
          populateEditModal(tr);
          const editModalEl = document.getElementById('editRecordModal');
          if (editModalEl) {
            const bsEdit = new bootstrap.Modal(editModalEl);
            bsEdit.show();
          }
        }, 250);
      };
    }
  }

  function populateEditModal(tr) {
    const data = extractRowData(tr);
    const table = tr.closest('table') || document.querySelector('#mainDataTable');

    const headers = data.headers || [];
    const setLbl = (id, val) => {
      const el = document.getElementById(id);
      if (el && val) el.innerHTML = `${escapeHtml(val)} <span class="text-danger">*</span>`;
    };
    const setLblOptional = (id, val) => {
      const el = document.getElementById(id);
      if (el && val) el.textContent = val;
    };

    setLblOptional('lblEditCode', headers[0] || 'Reference Code / ID');
    setLbl('lblEditTitle', headers[1] || 'Title / Full Name');
    setLblOptional('lblEditCategory', headers[2] || 'Category / Wing / Department');
    setLblOptional('lblEditC4', headers[3] || 'Responsible / Incharge / Details');
    setLblOptional('lblEditC5', headers[4] || 'Contact / Metrics / Specs');
    setLblOptional('lblEditC6', headers[5] || 'Tag / Location / Source');
    setLblOptional('lblEditC7', headers[6] || 'Date / Amount / Reference');

    const rowIdInput = document.getElementById('editRecordRowId');
    const codeInput = document.getElementById('editRecordCode');
    const titleInput = document.getElementById('editRecordTitle');
    const subInput = document.getElementById('editRecordSub');
    const catSelect = document.getElementById('editRecordCategory');
    const c4Input = document.getElementById('editRecordC4');
    const c5Input = document.getElementById('editRecordC5');
    const c6Input = document.getElementById('editRecordC6');
    const c7Input = document.getElementById('editRecordC7');
    const statusSelect = document.getElementById('editRecordStatus');
    const notesInput = document.getElementById('editRecordNotes');

    if (rowIdInput) rowIdInput.value = data.id;
    if (codeInput) codeInput.value = data.code;
    if (titleInput) titleInput.value = data.title;
    if (subInput) subInput.value = data.sub;
    if (c4Input) c4Input.value = data.c4;
    if (c5Input) c5Input.value = data.c5;
    if (c6Input) c6Input.value = data.c6;
    if (c7Input) c7Input.value = data.c7;

    if (catSelect) {
      catSelect.innerHTML = '<option value="">Select category / group</option>';
      const categories = collectModuleCategories(table);
      categories.forEach(cat => {
        catSelect.add(new Option(cat, cat));
      });
      if (data.category) {
        let found = false;
        for (let i = 0; i < catSelect.options.length; i++) {
          if (catSelect.options[i].text.toLowerCase().trim() === data.category.toLowerCase().trim()) {
            catSelect.selectedIndex = i;
            found = true;
            break;
          }
        }
        if (!found) {
          catSelect.add(new Option(data.category, data.category, true, true));
        }
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
      notesInput.value = `Verified institutional entry for ${data.title} (${data.code}).`;
    }
  }

  function prepareAddModal(table) {
    table = table || document.querySelector('#mainDataTable');
    if (!table) return;

    const ths = Array.from(table.querySelectorAll('thead th'));
    const headers = ths.map(th => th.innerText.trim()).filter(h => !h.toLowerCase().includes('action'));

    const setLbl = (id, val) => {
      const el = document.getElementById(id);
      if (el && val) el.innerHTML = `${escapeHtml(val)} <span class="text-danger">*</span>`;
    };
    const setLblOptional = (id, val) => {
      const el = document.getElementById(id);
      if (el && val) el.textContent = val;
    };

    setLblOptional('lblAddCode', headers[0] || 'Reference Code / ID');
    setLbl('lblAddTitle', headers[1] || 'Title / Full Name');
    setLbl('lblAddCategory', headers[2] || 'Category / Department');
    setLblOptional('lblAddC4', headers[3] || 'Responsible / Incharge / Details');
    setLblOptional('lblAddC5', headers[4] || 'Contact / Metrics / Specs');
    setLblOptional('lblAddC6', headers[5] || 'Tag / Location / Source');
    setLblOptional('lblAddC7', headers[6] || 'Date / Amount / Reference');

    const codeInput = document.getElementById('addRecordCode');
    if (codeInput) {
      codeInput.value = generateDomainCode(headers[0] || '', table);
    }

    const catSelect = document.getElementById('addRecordCategory');
    if (catSelect) {
      catSelect.innerHTML = '<option value="" selected disabled>Select category / department</option>';
      const categories = collectModuleCategories(table);
      categories.forEach(cat => {
        catSelect.add(new Option(cat, cat));
      });
      if (categories.length > 0) {
        catSelect.selectedIndex = 1;
      }
    }

    const titleInput = document.getElementById('addRecordTitle');
    if (titleInput) titleInput.value = '';
    const subInput = document.getElementById('addRecordSub');
    if (subInput) subInput.value = '';
    const c4Input = document.getElementById('addRecordC4');
    if (c4Input) c4Input.value = '';
    const c5Input = document.getElementById('addRecordC5');
    if (c5Input) c5Input.value = '';
    const c6Input = document.getElementById('addRecordC6');
    if (c6Input) c6Input.value = '';
    const c7Input = document.getElementById('addRecordC7');
    if (c7Input) c7Input.value = new Date().toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' });
    const notesInput = document.getElementById('addRecordNotes');
    if (notesInput) notesInput.value = '';
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
