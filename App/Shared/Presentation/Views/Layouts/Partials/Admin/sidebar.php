<?php

use App\Shared\Core\Auth;

?>

<!-- ===================== SIDEBAR ===================== -->
<aside id="sidebar" class="fixed left-0 top-0 z-50 w-64 h-screen bg-white border-r border-slate-200
           flex flex-col transition-transform duration-300 lg:translate-x-0 -translate-x-full">

    <!-- Logo -->
    <div class="h-16 flex items-center px-6 border-b border-slate-200">

        <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center shadow">

            <i data-lucide="graduation-cap" class="w-5 h-5 text-white"></i>

        </div>

        <div class="ml-3">

            <h2 class="text-base font-bold text-slate-800">
                UniClub
            </h2>

            <p class="text-xs text-slate-500">
                Admin Panel
            </p>

        </div>

    </div>


    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-6">

        <p class="px-6 mb-3 text-[11px] uppercase tracking-widest text-slate-400">
            Main
        </p>

        <div class="space-y-1 px-3">

            <!-- Dashboard -->
            <a href="<?= BASE_URL ?>/admin/dashboard" class="group flex items-center gap-3 px-4 py-3 rounded-xl
                       bg-blue-50 text-blue-700 font-semibold
                       border-l-4 border-blue-600">

                <i data-lucide="layout-dashboard" class="w-5 h-5"></i>

                <span>Dashboard</span>

            </a>


            <!-- Users -->
            <a href="<?= BASE_URL ?>/admin/users" class="group flex items-center gap-3 px-4 py-3 rounded-xl
                       text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition">

                <i data-lucide="users" class="w-5 h-5"></i>

                <span>Users</span>

            </a>


            <!-- Clubs -->
            <a href="<?= BASE_URL ?>/admin/clubs" class="group flex items-center gap-3 px-4 py-3 rounded-xl
                       text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition">

                <i data-lucide="building-2" class="w-5 h-5"></i>

                <span>Clubs</span>

            </a>


            <!-- Events -->
            <a href="<?= BASE_URL ?>/admin/events" class="group flex items-center gap-3 px-4 py-3 rounded-xl
                       text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition">

                <i data-lucide="calendar" class="w-5 h-5"></i>

                <span>Events</span>

            </a>


            <!-- Announcements -->
            <a href="<?= BASE_URL ?>/admin/announcements" class="group flex items-center gap-3 px-4 py-3 rounded-xl
                       text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition">

                <i data-lucide="megaphone" class="w-5 h-5"></i>

                <span>Announcements</span>

            </a>


            <!-- Certificates -->
            <a href="<?= BASE_URL ?>/admin/certificates" class="group flex items-center gap-3 px-4 py-3 rounded-xl
                       text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition">

                <i data-lucide="award" class="w-5 h-5"></i>

                <span>Certificates</span>

            </a>

        </div>


        <?php if (Auth::roleId() === 1): ?>

        <div class="mt-8">

            <p class="px-6 mb-3 text-[11px] uppercase tracking-widest text-slate-400">
                Settings
            </p>

            <div class="space-y-1 px-3">

                <a href="<?= BASE_URL ?>/admin/settings/roles" class="group flex items-center gap-3 px-4 py-3 rounded-xl
                               text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition">

                    <i data-lucide="shield-check" class="w-5 h-5"></i>

                    <span>Roles & Permissions</span>

                </a>

            </div>

        </div>

        <?php endif; ?>

    </nav>


</aside>