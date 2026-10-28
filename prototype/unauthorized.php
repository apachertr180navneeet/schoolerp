<?php
/**
 * EDUSYS PRO - 403 UNAUTHORIZED (PHP)
 */
$depth = 0;
require_once __DIR__ . '/includes/config.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>403 Unauthorized Access - <?php echo htmlspecialchars($school_config['short_name']); ?></title>
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  <!-- Bootstrap 5.3 & Icons CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  
  <!-- Custom Prototype CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css'); ?>">

  <style>
    body {
      background-color: var(--bg-app);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
    }
    .error-card {
      max-width: 500px;
      width: 100%;
      background: var(--bg-card);
      border: 1px solid var(--border-color);
      border-radius: var(--border-radius-lg);
      box-shadow: var(--shadow-lg);
      padding: 3rem 2.5rem;
      text-align: center;
    }
  </style>
</head>
<body>

  <div class="error-card">
    <div class="rounded-circle bg-danger-subtle text-danger mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 72px; height: 72px; font-size: 2.2rem;">
      <i class="bi bi-shield-lock-fill"></i>
    </div>

    <span class="badge bg-danger mb-2">Error 403</span>
    <h3 class="fw-bold mb-2">Access Restricted</h3>
    <p class="text-muted font-size-14 mb-4">
      Your current user role does not have authorization to view this sensitive module. This restriction is enforced by the Role-Based Access Control (RBAC) security matrix.
    </p>

    <div class="d-flex justify-content-center gap-2">
      <a href="<?php echo base_url('login.php'); ?>" class="btn btn-primary fw-bold px-4">
        <i class="bi bi-person-badge me-1"></i> Switch Role
      </a>
      <a href="<?php echo base_url('dashboards/admin.php'); ?>" class="btn btn-outline-secondary fw-semibold px-3">
        Admin Dashboard
      </a>
    </div>
  </div>

</body>
</html>
