<?php
/**
 * EDUSYS PRO - Prototype Subfolder Redirect
 * Redirects seamlessly to the root application without relying on .htaccess
 */
header("Location: ../index.php", true, 302);
exit;
