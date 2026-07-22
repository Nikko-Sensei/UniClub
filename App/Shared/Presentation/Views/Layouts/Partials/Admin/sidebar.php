<?php

use App\Shared\Core\Auth;

// ── Helper: Determine if a link is active ──
function isActive($linkPath)
{
    $currentUri = $_SERVER['REQUEST_URI'];
    $currentPath = parse_url($currentUri, PHP_URL_PATH);
    $linkPath = parse_url($linkPath, PHP_URL_PATH);
    return strpos($currentPath, $linkPath) === 0;
}

?>

<style>
/* ── Sidebar Glass & Animations ── */
.sidebar-glass {
    background: rgba(15, 23, 42, 0.85);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border-right: 1px solid rgba(255, 255, 255, 0.08);
    box-shadow: 4px 0 32px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s cubic-bezier(0.22, 1, 0.36, 1),
        width 0.3s cubic-bezier(0.22, 1, 0.36, 1);
}

.sidebar-glass.collapsed {
    width: 80px;
}

.sidebar-glass.collapsed .sidebar-label {
    display: none;
}

.sidebar-glass.collapsed .logo-text {
    display: none;
}

.sidebar-glass.collapsed .logo-sub {
    display: none;
}

.sidebar-glass.collapsed .nav-item {
    justify-content: center;
    padding: 0.75rem;
}

.sidebar-glass.collapsed .nav-item i {
    margin-right: 0;
}

.sidebar-glass.collapsed .sidebar-section-title {
    opacity: 0;
    height: 0;
    margin: 0;
    overflow: hidden;
}

.sidebar-glass.collapsed .toggle-btn {
    transform: rotate(180deg);
}

/* ── Nav Items ── */
.nav-item {
    transition: all 0.2s cubic-bezier(0.22, 1, 0.36, 1);
    border-radius: 12px;
    color: rgba(255, 255, 255, 0.6);
    position: relative;
    overflow: hidden;
    cursor: pointer;
}

.nav-item:hover {
    background: rgba(255, 255, 255, 0.08);
    color: #fff;
    transform: translateX(4px);
}

.nav-item.active {
    background: rgba(37, 99, 235, 0.25);
    color: #60a5fa;
    box-shadow: inset 3px 0 0 #3b82f6;
}

.nav-item.active::before {
    content: '';
    position: absolute;
    left: 0;
    top: 20%;
    height: 60%;
    width: 3px;
    background: #3b82f6;
    border-radius: 0 4px 4px 0;
}

.nav-item i {
    transition: transform 0.2s;
}

.nav-item:hover i {
    transform: scale(1.1);
}

.sidebar-section-title {
    color: rgba(255, 255, 255, 0.3);
    font-size: 10px;
    letter-spacing: 0.1em;
    transition: opacity 0.2s;
}

/* ── Scrollbar ── */
.sidebar-scroll::-webkit-scrollbar {
    width: 4px;
}

.sidebar-scroll::-webkit-scrollbar-track {
    background: transparent;
}

.sidebar-scroll::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.15);
    border-radius: 99px;
}

.sidebar-scroll::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.25);
}

/* ── Mobile Overlay ── */
#sidebar-overlay {
    transition: opacity 0.3s ease;
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
}

/* ── RESPONSIVE (Tablets & Phones) ── */
@media (max-width: 1023px) {
    .sidebar-glass {
        transform: translateX(-100%);
        width: 280px !important;
    }

    .sidebar-glass.mobile-open {
        transform: translateX(0);
    }

    /* Override collapsed state on mobile – always full width */
    .sidebar-glass.collapsed {
        width: 280px !important;
    }

    .sidebar-glass.collapsed .sidebar-label {
        display: inline;
    }

    .sidebar-glass.collapsed .logo-text {
        display: inline;
    }

    .sidebar-glass.collapsed .logo-sub {
        display: inline;
    }

    .sidebar-glass.collapsed .nav-item {
        justify-content: flex-start;
        padding: 0.75rem 1rem;
    }

    .sidebar-glass.collapsed .nav-item i {
        margin-right: 0.75rem;
    }

    .sidebar-glass.collapsed .sidebar-section-title {
        opacity: 1;
        height: auto;
        margin: inherit;
    }

    .sidebar-glass.collapsed .toggle-btn {
        transform: rotate(0deg);
    }

    /* Show mobile burger, hide desktop toggle */
    .desktop-toggle {
        display: none !important;
    }

    .mobile-burger {
        display: flex !important;
    }
}

@media (min-width: 1024px) {
    .mobile-burger {
        display: none !important;
    }

    #sidebar-overlay {
        display: none !important;
    }
}
</style>

<!-- ===================== MOBILE OVERLAY ===================== -->
<div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 hidden"></div>

<!-- ===================== TOP NAVBAR (with Burger) ===================== -->
<header
    class="fixed top-0 left-0 right-0 z-40 h-16 bg-slate-900/80 backdrop-blur-md border-b border-white/5 flex items-center px-4 lg:px-6">
    <!-- Mobile Burger Button -->
    <button id="mobileMenuBtn"
        class="mobile-burger flex items-center justify-center w-10 h-10 rounded-lg hover:bg-white/10 text-white/70 hover:text-white transition-all">
        <i data-lucide="menu" class="w-6 h-6"></i>
    </button>

    <!-- Page Title / Breadcrumb (optional) -->
    <div class="flex-1 text-center lg:text-left">
        <h1 class="text-white font-semibold text-lg">Admin Panel</h1>
    </div>

    <!-- Right side (user avatar / actions) – optional -->
    <div class="flex items-center gap-3">
        <div
            class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center text-white font-bold text-xs shadow-lg">
            <?= strtoupper(substr($_SESSION['user']['name'] ?? 'A', 0, 1)) ?>
        </div>
    </div>
</header>

<!-- ===================== SIDEBAR ===================== -->
<aside id="sidebar" class="sidebar-glass fixed left-0 top-0 z-50 h-screen w-72 flex flex-col overflow-hidden">

    <!-- Logo + Toggle -->
    <div class="h-16 flex items-center justify-between px-5 border-b border-white/5 flex-shrink-0">
        <div class="flex items-center gap-3">

            <div
                class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-lg shadow-blue-500/20 overflow-hidden">

                <?php if ($setting->getLogo()): ?>

                <img src="<?= BASE_URL . '/' . $setting->getLogo() ?>"
                    alt="<?= htmlspecialchars($setting->getSiteName()) ?>" class="w-full h-full object-contain">

                <?php else: ?>

                <i data-lucide="graduation-cap" class="w-5 h-5 text-white"></i>

                <?php endif; ?>

            </div>


            <div class="logo-text">

                <h2 class="text-base font-bold text-white tracking-tight">
                    <?= htmlspecialchars($setting->getSiteName()) ?>
                </h2>

                <p class="logo-sub text-xs text-white/40">
                    Admin Panel
                </p>

            </div>

        </div>
        <!-- Collapse Toggle (desktop only) -->
        <button id="sidebarToggle"
            class="desktop-toggle toggle-btn flex items-center justify-center w-8 h-8 rounded-lg hover:bg-white/10 text-white/60 hover:text-white transition-all">
            <i data-lucide="panel-left" class="w-5 h-5"></i>
        </button>
        <!-- Mobile close -->
        <button id="mobileCloseBtn"
            class="lg:hidden flex items-center justify-center w-8 h-8 rounded-lg hover:bg-white/10 text-white/60 hover:text-white transition-all">
            <i data-lucide="x" class="w-5 h-5"></i>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="sidebar-scroll flex-1 overflow-y-auto py-6 px-3 space-y-6">

        <!-- MAIN -->
        <div>
            <p
                class="sidebar-section-title px-3 mb-3 text-[11px] font-semibold uppercase tracking-widest text-white/30">
                Main
            </p>
            <div class="space-y-0.5">
                <?php
                $links = [
                    'Dashboard'   => ['url' => '/admin/dashboard', 'icon' => 'layout-dashboard'],
                    'Users'       => ['url' => '/admin/users', 'icon' => 'users'],
                    'Clubs'       => ['url' => '/admin/clubs', 'icon' => 'building-2'],
                    'Events'      => ['url' => '/admin/events', 'icon' => 'calendar-days'],
                    'Announcements' => ['url' => '/admin/announcements', 'icon' => 'megaphone'],
                    'Feedbacks'   => ['url' => '/admin/feedbacks', 'icon' => 'message-square'],
                    'Contact'     => ['url' => '/admin/contacts', 'icon' => 'mail'],
                ];
                foreach ($links as $label => $data):
                    $fullUrl = BASE_URL . $data['url'];
                    $active = isActive($fullUrl) ? 'active' : '';
                ?>
                <a href="<?= $fullUrl ?>"
                    class="nav-item <?= $active ?> flex items-center gap-3 px-4 py-2.5 text-sm font-medium">
                    <i data-lucide="<?= $data['icon'] ?>" class="w-5 h-5"></i>
                    <span class="sidebar-label"><?= $label ?></span>
                </a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- SETTINGS -->
        <?php if (Auth::roleId() === 1): ?>
        <div>
            <p
                class="sidebar-section-title px-3 mb-3 text-[11px] font-semibold uppercase tracking-widest text-white/30">
                Settings
            </p>
            <div class="space-y-0.5">
                <?php
                    $settingsLinks = [
                        'General'             => ['url' => '/admin/settings/general', 'icon' => 'settings'],
                        'Roles & Permissions' => ['url' => '/admin/settings/roles', 'icon' => 'shield-check'],
                        'Security'            => ['url' => '/admin/settings/security', 'icon' => 'lock-keyhole'],
                    ];
                    foreach ($settingsLinks as $label => $data):
                        $fullUrl = BASE_URL . $data['url'];
                        $active = isActive($fullUrl) ? 'active' : '';
                    ?>
                <a href="<?= $fullUrl ?>"
                    class="nav-item <?= $active ?> flex items-center gap-3 px-4 py-2.5 text-sm font-medium">
                    <i data-lucide="<?= $data['icon'] ?>" class="w-5 h-5"></i>
                    <span class="sidebar-label"><?= $label ?></span>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>



    </nav>
</aside>

<!-- ===================== JAVASCRIPT ===================== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    const toggleBtn = document.getElementById('sidebarToggle');
    const mobileClose = document.getElementById('mobileCloseBtn');
    const mobileOpen = document.getElementById('mobileMenuBtn');

    // ── Desktop collapse ──
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
        });
    }

    // ── Mobile open ──
    if (mobileOpen) {
        mobileOpen.addEventListener('click', function() {
            sidebar.classList.add('mobile-open');
            overlay.classList.remove('hidden');
        });
    }

    // ── Mobile close (X button) ──
    if (mobileClose) {
        mobileClose.addEventListener('click', function() {
            sidebar.classList.remove('mobile-open');
            overlay.classList.add('hidden');
        });
    }

    // ── Mobile close (click overlay) ──
    if (overlay) {
        overlay.addEventListener('click', function() {
            sidebar.classList.remove('mobile-open');
            overlay.classList.add('hidden');
        });
    }

    // ── Re-init Lucide icons ──
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // ── (Optional) Close mobile menu on link click ──
    document.querySelectorAll('.nav-item').forEach(link => {
        link.addEventListener('click', function(e) {
            if (window.innerWidth < 1024) {
                sidebar.classList.remove('mobile-open');
                overlay.classList.add('hidden');
            }
        });
    });
});
</script>