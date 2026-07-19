<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

    <!-- Total Users -->
    <div
        class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1 animate-fadeInUp">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">Total Users</p>
                <p class="text-2xl font-bold text-slate-800 mt-1"><?= $dashboard->totalUsers ?></p>
                <p class="text-[11px] text-emerald-600 mt-0.5 flex items-center gap-1">
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    Active
                </p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shadow-sm">
                <i data-lucide="users" class="w-5 h-5"></i>
            </div>
        </div>
    </div>

    <!-- Total Clubs -->
    <div
        class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1 animate-fadeInUp delay-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">Total Clubs</p>
                <p class="text-2xl font-bold text-slate-800 mt-1"><?= $dashboard->totalClubs ?></p>
                <p class="text-[11px] text-indigo-600 mt-0.5 flex items-center gap-1">
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
                    Active
                </p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center shadow-sm">
                <i data-lucide="building-2" class="w-5 h-5"></i>
            </div>
        </div>
    </div>

    <!-- Total Events -->
    <div
        class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1 animate-fadeInUp delay-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">Total Events</p>
                <p class="text-2xl font-bold text-slate-800 mt-1"><?= $dashboard->totalEvents ?></p>
                <p class="text-[11px] text-amber-600 mt-0.5 flex items-center gap-1">
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                    Upcoming
                </p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shadow-sm">
                <i data-lucide="calendar" class="w-5 h-5"></i>
            </div>
        </div>
    </div>

    <!-- Announcements -->
    <div
        class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1 animate-fadeInUp delay-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">Announcements</p>
                <p class="text-2xl font-bold text-slate-800 mt-1"><?= $dashboard->totalAnnouncements ?></p>
                <p class="text-[11px] text-purple-600 mt-0.5 flex items-center gap-1">
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-purple-500"></span>
                    Published
                </p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shadow-sm">
                <i data-lucide="megaphone" class="w-5 h-5"></i>
            </div>
        </div>
    </div>

</div>