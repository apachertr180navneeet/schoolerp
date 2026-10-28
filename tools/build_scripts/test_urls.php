<?php
/**
 * Test URL generation and output rendering
 */
$_SERVER['SCRIPT_NAME'] = '/gsgwebsoft/schoolerp/dashboards/admin.php';
$_SERVER['DOCUMENT_ROOT'] = 'C:/laragon/www';
$_SERVER['HTTP_HOST'] = 'localhost';

require_once __DIR__ . '/../../includes/config.php';

echo "Calculated Base URL: " . $app_base_url . "\n";
echo "base_url('index.php'): " . base_url('index.php') . "\n";
echo "base_url('login.php'): " . base_url('login.php') . "\n";
echo "base_url('dashboards/admin.php'): " . base_url('dashboards/admin.php') . "\n";
echo "base_url('modules/academics/dashboard.php'): " . base_url('modules/academics/dashboard.php') . "\n";
echo "base_url('assets/css/style.css'): " . base_url('assets/css/style.css') . "\n";

// Test Live Server Simulation
$_SERVER['SCRIPT_NAME'] = '/schoolerp/dashboards/admin.php';
$_SERVER['DOCUMENT_ROOT'] = '/home/customer/www';
$_SERVER['HTTP_HOST'] = 'dspremierlogistics.co.uk';

require __DIR__ . '/../../includes/config.php';
echo "\n--- Live Server Simulation ---\n";
echo "Live Base URL: " . $app_base_url . "\n";
echo "Live Admin URL: " . base_url('dashboards/admin.php') . "\n";
echo "Live CSS URL: " . base_url('assets/css/style.css') . "\n";

// Test render admin.php
$_SERVER['SCRIPT_NAME'] = '/gsgwebsoft/schoolerp/dashboards/admin.php';
$_SERVER['DOCUMENT_ROOT'] = 'C:/laragon/www';
ob_start();
include __DIR__ . '/../../dashboards/admin.php';
$html = ob_get_clean();
echo "Rendered dashboards/admin.php successfully! HTML length: " . strlen($html) . " bytes\n";

// Test render root index.php
$_SERVER['SCRIPT_NAME'] = '/gsgwebsoft/schoolerp/index.php';
ob_start();
include __DIR__ . '/../../index.php';
$html_index = ob_get_clean();
echo "Rendered index.php successfully! HTML length: " . strlen($html_index) . " bytes\n";

// Test render modules/academics/dashboard.php
$_SERVER['SCRIPT_NAME'] = '/gsgwebsoft/schoolerp/modules/academics/dashboard.php';
ob_start();
include __DIR__ . '/../../modules/academics/dashboard.php';
$html_acad = ob_get_clean();
echo "Rendered modules/academics/dashboard.php successfully! HTML length: " . strlen($html_acad) . " bytes\n";
