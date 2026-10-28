# EduSys Pro — Advanced School ERP Software (PHP & Static Edition)

> **Enterprise-Grade Single-School ERP Software Prototype for CBSE & State Board**  
> Built with **PHP 8+, Common Include Partials, HTML5, CSS3, Bootstrap 5.3, Bootstrap Icons 1.11, JavaScript, and Chart.js**.

---

## ⚡ How to Run in Laragon (PHP Architecture)

Since this project is placed in your Laragon web directory (`c:\laragon\www\gsgwebsoft\schoolerp\`), you can run it directly:

### 1. In Laragon Browser
1. Start **Laragon** (Apache / Nginx & MySQL).
2. Open your browser and navigate to:
   - **`http://localhost/gsgwebsoft/schoolerp/`** (or `http://schoolerp.test/` if virtual hosts are enabled)
3. Direct Links:
   - **Public Landing Page**: [`index.php`](http://localhost/gsgwebsoft/schoolerp/index.php)
   - **Login Screen with 15 Role Switchers**: [`login.php`](http://localhost/gsgwebsoft/schoolerp/login.php)
   - **Super Admin Dashboard**: [`dashboards/admin.php`](http://localhost/gsgwebsoft/schoolerp/dashboards/admin.php)
   - **Principal Desk**: [`dashboards/principal.php`](http://localhost/gsgwebsoft/schoolerp/dashboards/principal.php)
   - **Teacher Workplace**: [`dashboards/teacher.php`](http://localhost/gsgwebsoft/schoolerp/dashboards/teacher.php)
   - **Accountant Desk**: [`dashboards/accountant.php`](http://localhost/gsgwebsoft/schoolerp/dashboards/accountant.php)

### 2. Using Built-In PHP CLI Server
From PowerShell / Command Prompt inside `c:\laragon\www\gsgwebsoft\schoolerp`:
```bash
& "C:\laragon\bin\php\php-8.3.33-Win32-vs16-x64\php.exe" -S localhost:8000
```
Then visit **`http://localhost:8000`** in your browser.

---

## 🧩 Common Include Architecture (`includes/`)

The entire application uses shared common layout files to eliminate code duplication:

```text
includes/
├── config.php    # Session start, base_url($path) helper, school metadata, 15 demo roles, 28 module registry
├── header.php    # Standard HTML head, fonts, Bootstrap 5.3, custom stylesheets
├── sidebar.php   # Reusable master sidebar (auto-detects active module/submodule, auto-expands active menu)
├── topbar.php    # Top header, search bar, session switcher, board switcher, notifications, user dropdown, breadcrumbs
├── modals.php    # Reusable Add New, Edit, and View Record modal dialogs
└── footer.php    # Reusable footer, toast notifications, Bootstrap 5, Chart.js, and app scripts
```

### How Each Submodule Page is Structured
Every single page in `modules/` and `dashboards/` is clean and maintainable:
```php
<?php
$page_title = "Student Directory";
$page_desc = "Searchable master roster of all enrolled students";
$active_module = "students";
$active_submodule = "student-directory.php";
$depth = 2;

require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/sidebar.php';
require_once __DIR__ . '/../../includes/topbar.php';
?>

<!-- Page specific content: KPIs, filter bar, data tables, actions -->
<div class="page-header-box">...</div>
...

<?php
require_once __DIR__ . '/../../includes/footer.php';
?>
```

---

## 📂 Project Directory Structure

```text
schoolerp/
├── index.php                    # Public Marketing Website in PHP
├── login.php                    # 1-Click Role Switcher Login in PHP
├── forgot-password.php          # Password Reset Page in PHP
├── unauthorized.php             # 403 Access Control Page in PHP
├── includes/                    # Reusable Common Layout Partials
│   ├── config.php
│   ├── header.php
│   ├── sidebar.php
│   ├── topbar.php
│   ├── modals.php
│   └── footer.php
├── assets/                      # Shared Static Assets
│   ├── css/
│   │   ├── style.css
│   │   └── responsive.css
│   └── js/
│       ├── app.js
│       ├── mock-data.js
│       ├── tables.js
│       ├── forms.js
│       └── charts.js
├── dashboards/                  # 10 Role Dashboards (*.php)
│   ├── admin.php
│   ├── principal.php
│   ├── teacher.php
│   ├── accountant.php
│   ├── admission-officer.php
│   ├── librarian.php
│   ├── transport-manager.php
│   ├── hr-manager.php
│   ├── student.php
│   └── parent.php
├── modules/                     # 28 Functional Modules (*.php)
│   ├── administration/          # 24 Submodule Pages
│   ├── admissions/              # 18 Submodule Pages
│   ├── students/                # 23 Submodule Pages
│   ├── academics/               # 28 Submodule Pages
│   ├── attendance/              # 20 Submodule Pages
│   ├── examinations/            # 34 Submodule Pages
│   ├── fees/                    # 38 Submodule Pages
│   ├── accounts/                # 26 Submodule Pages
│   ├── hr-payroll/              # 31 Submodule Pages
│   ├── communication/           # 19 Submodule Pages
│   ├── transport/               # 22 Submodule Pages
│   ├── library/                 # 20 Submodule Pages
│   ├── inventory/               # 23 Submodule Pages
│   ├── hostel/                  # 18 Submodule Pages
│   ├── health-welfare/          # 14 Submodule Pages
│   ├── security/                # 12 Submodule Pages
│   ├── front-office/            # 15 Submodule Pages
│   ├── website-cms/             # 19 Submodule Pages
│   ├── reports/                 # 28 Submodule Pages
│   ├── online-learning/         # 12 Submodule Pages
│   ├── sports-activities/       # 14 Submodule Pages
│   ├── events-ptm/              # 13 Submodule Pages
│   ├── parent-portal/           # 23 Submodule Pages
│   ├── student-portal/          # 21 Submodule Pages
│   ├── teacher-portal/          # 17 Submodule Pages
│   ├── integrations/            # 18 Submodule Pages
│   ├── compliance/              # 12 Submodule Pages
│   └── system-settings/         # 22 Submodule Pages
├── prototype/                   # Static HTML Prototype Edition (605 files)
└── README.md
```

---

## 👥 15 Pre-Configured Demo Accounts (1-Click Login)

Visit [`login.php`](http://localhost/gsgwebsoft/schoolerp/login.php) and click on any role pill:

| # | Demo Role | Login Email | Dedicated Dashboard |
|---|---|---|---|
| 1 | **Super Admin** | `admin@edusys.com` | `dashboards/admin.php` |
| 2 | **School Admin** | `schooladmin@edusys.com` | `dashboards/admin.php` |
| 3 | **Principal** | `principal@edusys.com` | `dashboards/principal.php` |
| 4 | **Accountant** | `accounts@edusys.com` | `dashboards/accountant.php` |
| 5 | **Admission Officer** | `admissions@edusys.com` | `dashboards/admission-officer.php` |
| 6 | **Teacher** | `teacher@edusys.com` | `dashboards/teacher.php` |
| 7 | **Class Teacher** | `classteacher@edusys.com` | `dashboards/teacher.php` |
| 8 | **Librarian** | `library@edusys.com` | `dashboards/librarian.php` |
| 9 | **Transport Manager** | `transport@edusys.com` | `dashboards/transport-manager.php` |
| 10 | **HR Manager** | `hr@edusys.com` | `dashboards/hr-manager.php` |
| 11 | **Receptionist** | `frontdesk@edusys.com` | `modules/front-office/dashboard.php` |
| 12 | **Storekeeper** | `store@edusys.com` | `modules/inventory/dashboard.php` |
| 13 | **Security Guard** | `security@edusys.com` | `modules/security/dashboard.php` |
| 14 | **Student** | `student@edusys.com` | `dashboards/student.php` |
| 15 | **Parent** | `parent@edusys.com` | `dashboards/parent.php` |

---

## ✅ Quality Assurance Verification

- **Total PHP Screens Generated:** 598 PHP files
- **Common Layout Partials:** `includes/config.php`, `header.php`, `sidebar.php`, `topbar.php`, `modals.php`, `footer.php`
- **PHP Syntax Check:** Tested with PHP 8.3 CLI (`php -l`), **0 Syntax Errors**
- **Static HTML Prototype:** Still preserved in [`prototype/`](file:///c:/laragon/www/gsgwebsoft/schoolerp/prototype/) (605 files)
