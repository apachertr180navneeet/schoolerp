<?php
/**
 * EDUSYS PRO - FORGOT PASSWORD (PHP)
 */
$depth = 0;
require_once __DIR__ . '/includes/config.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password - <?php echo htmlspecialchars($school_config['short_name']); ?> School ERP</title>
  
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
    .auth-card {
      max-width: 460px;
      width: 100%;
      background: var(--bg-card);
      border: 1px solid var(--border-color);
      border-radius: var(--border-radius-lg);
      box-shadow: var(--shadow-lg);
      padding: 2.5rem;
    }
  </style>
</head>
<body>

  <div class="auth-card">
    <div class="text-center mb-4">
      <div class="brand-icon mx-auto mb-3" style="width: 48px; height: 48px; background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
        <i class="bi bi-key-fill"></i>
      </div>
      <h3 class="fw-bold mb-1">Forgot Password?</h3>
      <p class="text-muted font-size-14">Enter your registered email address or employee code to receive reset instructions and OTP.</p>
    </div>

    <form onsubmit="event.preventDefault(); document.getElementById('resetSuccessMsg').classList.remove('d-none'); document.getElementById('resetFormFields').classList.add('d-none');">
      <div id="resetFormFields">
        <div class="mb-3">
          <label class="form-label">Email or Staff ID <span class="text-danger">*</span></label>
          <div class="input-group">
            <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
            <input type="email" class="form-control" required placeholder="user@edusys.com" value="admin@edusys.com">
          </div>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold shadow-sm mb-3">
          <i class="bi bi-send-fill me-2"></i> Send Reset Link & OTP
        </button>
      </div>

      <div id="resetSuccessMsg" class="d-none alert alert-success text-center py-3 mb-3">
        <i class="bi bi-check-circle-fill fs-3 text-success d-block mb-2"></i>
        <strong>Instructions Sent!</strong>
        <p class="font-size-13 mb-0 mt-1">We have sent a 6-digit OTP code to your registered mobile and email. Check your simulated inbox.</p>
      </div>

      <div class="text-center">
        <a href="<?php echo base_url('login.php'); ?>" class="text-decoration-none fw-semibold font-size-14 text-primary">
          <i class="bi bi-arrow-left me-1"></i> Back to Sign In
        </a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
