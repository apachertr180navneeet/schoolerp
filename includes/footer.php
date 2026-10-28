<?php
/**
 * EDUSYS PRO - COMMON FOOTER & SCRIPTS
 */
if (!isset($hide_common_modals) || !$hide_common_modals) {
    require_once __DIR__ . '/modals.php';
}
?>
      </main>
    </div>
  </div>

  <!-- Toast Notification Container -->
  <div class="erp-toast-container"></div>

  <!-- Core Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="<?php echo base_url('assets/js/mock-data.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/tables.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/forms.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/charts.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/app.js'); ?>"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      if (window.EduTables) {
        EduTables.initSearch('tableSearchInput', '#mainDataTable');
      }
    });
  </script>
</body>
</html>
