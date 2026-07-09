<?php

use App\Shared\Core\Auth;

?>

<!-- ===================== MOBILE OVERLAY ===================== -->
<div id="sidebar-overlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden">
</div>

<!-- ===================== SIDEBAR ===================== -->
<aside id="sidebar" class="fixed left-0 top-0 z-50 w-72 h-screen bg-white border-r border-slate-200
    flex flex-col transform transition-transform duration-300
    -translate-x-full lg:translate-x-0">

    <!-- Logo -->
    <div class="h-16 flex items-center px-6 border-b border-slate-200 flex-shrink-0">
        <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center shadow-sm">
            <i data-lucide="graduation-cap" class="w-5 h-5 text-white"></i>
        </div>
        <div class="ml-3">
            <h2 class="text-base font-bold text-slate-800">UniClub</h2>
            <p class="text-xs text-slate-500">Admin Panel</p>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-6 scrollbar-thin">

        <!-- Main -->
        <p class="px-6 mb-3 text-[11px] font-semibold uppercase tracking-widest text-slate-400">
            Main
        </p>

        <div class="space-y-0.5 px-3">
            <!-- reduced gap from space-y-1 to space-y-0.5 -->

            <!-- Dashboard -->
            <a href="<?= BASE_URL ?>/admin/dashboard" class="flex items-center gap-3 px-4 py-2 rounded-xl
                text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition">
                <i data-lucide=" layout-dashboard" class="w-5 h-5"></i>
                <span>Dashboard</span>
            </a>

            <!-- Users -->
            <a href="<?= BASE_URL ?>/admin/users" class="flex items-center gap-3 px-4 py-2 rounded-xl
                text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition">
                <i data-lucide="users" class="w-5 h-5"></i>
                <span>Users</span>
            </a>

            <!-- Clubs -->
            <a href="<?= BASE_URL ?>/admin/clubs" class="flex items-center gap-3 px-4 py-2 rounded-xl
                text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition">
                <i data-lucide="building-2" class="w-5 h-5"></i>
                <span>Clubs</span>
            </a>

            <!-- Events -->
            <a href="<?= BASE_URL ?>/admin/events" class="flex items-center gap-3 px-4 py-2 rounded-xl
                text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition">
                <i data-lucide="calendar-days" class="w-5 h-5"></i>
                <span>Events</span>
            </a>

            <!-- Announcements -->
            <a href="<?= BASE_URL ?>/admin/announcements" class="flex items-center gap-3 px-4 py-2 rounded-xl
                text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition">
                <i data-lucide="megaphone" class="w-5 h-5"></i>
                <span>Announcements</span>
            </a>

            <!-- Feedback -->
            <a href="<?= BASE_URL ?>/admin/feedbacks" class="flex items-center gap-3 px-4 py-2 rounded-xl
                text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition">
                <i data-lucide="message-square" class="w-5 h-5"></i>
                <span>Feedbacks</span>
            </a>
        </div>

        <!-- Settings -->
        <?php if (Auth::roleId() === 1): ?>
        <div class="mt-8">
            <p class="px-6 mb-3 text-[11px] font-semibold uppercase tracking-widest text-slate-400">
                Settings
            </p>
            <div class="space-y-0.5 px-3">
                <!-- reduced gap -->
                <!-- General Settings -->
                <a href="<?= BASE_URL ?>/admin/settings" class="flex items-center gap-3 px-4 py-2 rounded-xl
                    text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition">
                    <i data-lucide="settings" class="w-5 h-5"></i>
                    <span>General Settings</span>
                </a>

                <!-- Roles Permission -->
                <a href="<?= BASE_URL ?>/admin/settings/roles" class="flex items-center gap-3 px-4 py-2 rounded-xl
                    text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition">
                    <i data-lucide="shield-check" class="w-5 h-5"></i>
                    <span>Roles & Permissions</span>
                </a>

                <!-- Security -->
                <a href="<?= BASE_URL ?>/admin/settings/security" class="flex items-center gap-3 px-4 py-2 rounded-xl
                    text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition">
                    <i data-lucide="lock-keyhole" class="w-5 h-5"></i>
                    <span>Security</span>
                </a>
            </div>
        </div>
        <?php endif; ?>

    </nav>
</aside>