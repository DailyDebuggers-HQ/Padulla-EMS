<?php
require_once __DIR__ . '/../config/db.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['logged_in'])) {
    header("Location: " . BASE_PATH . "login.php");
    exit;
}

$script = basename($_SERVER['SCRIPT_NAME'] ?? 'dashboard.php');
$titleMap = [
    'dashboard.php' => 'Dashboard Overview',
    'index.php' => 'Dashboard Overview',
    'records.php' => 'Enrollment Records',
    'step1.php' => 'Enrollment Setup',
    'step2_process.php' => 'Enrollment Assessment',
    'step3_save.php' => 'Enrollment Confirmation',
    'pay.php' => 'Payment Ledger',
    'print_ledger.php' => 'Print Ledger',
    'print_receipt.php' => 'Print Receipt',
    'print_cor.php' => 'Print Certificate of Registration',
    'view.php' => 'Details View',
    'edit.php' => 'Edit Profile',
];
$pageTitle = $titleMap[$script] ?? 'UA Academy EMS';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?> | UA Academy</title>
    <!-- Sidebar state preloader to prevent flicker -->
    <script>
        (function() {
            var sidebarStateKey = 'ems_sidebar_desktop_state';
            var defaultDesktopState = 'collapsed';
            var isDesktop = window.innerWidth >= 992;
            var wrapper = null;
            function setSidebarState() {
                wrapper = document.getElementById('wrapper');
                if (!wrapper) return;
                var saved = null;
                try { saved = localStorage.getItem(sidebarStateKey); } catch (e) {}
                var effectiveState = saved || defaultDesktopState;
                if (isDesktop) {
                    if (effectiveState === 'expanded') {
                        wrapper.classList.remove('toggled');
                    } else {
                        wrapper.classList.add('toggled');
                    }
                }
                wrapper.classList.add('sidebar-ready');
            }
            document.addEventListener('DOMContentLoaded', setSidebarState);
            window.addEventListener('load', setSidebarState);
        })();
    </script>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@600;700;800;900&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= BASE_PATH ?>assets/css/style.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="app-shell">
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include_once __DIR__ . '/sidebar.php'; ?>
        
        <!-- Page Content -->
        <div id="page-content-wrapper" class="w-100">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg app-topbar border-0">
                <div class="container-fluid">
                    <button class="btn btn-toggle-menu" id="menu-toggle" aria-label="Collapse Sidebar">
                        <i id="menu-toggle-icon" class="fas fa-chevron-left" aria-hidden="true"></i>
                    </button>
                    <div class="ms-3">
                        <div class="topbar-kicker">UA Academy Enrollment Management</div>
                        <h4 class="topbar-title mb-0"><?= htmlspecialchars($pageTitle) ?></h4>
                    </div>
                    <div class="ms-auto d-flex align-items-center gap-2">
                        <span class="topbar-user d-none d-sm-inline-flex">
                            <i class="fas fa-user-shield me-2"></i><?= htmlspecialchars($_SESSION['username'] ?? 'Staff') ?>
                        </span>
                        <a href="<?= BASE_PATH ?>logout.php" class="btn btn-sm btn-outline-primary d-lg-none">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </div>
                </div>
            </nav>
            <div class="container-fluid p-4 app-content">

