<header class="fixed top-0 right-0 left-0 lg:left-72 h-16 z-40
    bg-white/70 backdrop-blur-xl border-b border-white/20 shadow-sm
    transition-all duration-300">

    <div class="h-full px-4 sm:px-6 lg:px-8 flex items-center justify-between">

        <!-- LEFT SIDE -->
        <div class="flex items-center gap-4">

            <!-- Mobile Menu -->
            <button id="menuButton"
                class="lg:hidden w-10 h-10 rounded-xl flex items-center justify-center hover:bg-white/20 text-slate-600 transition-all hover:scale-105">
                <i data-lucide="menu" class="w-5 h-5"></i>
            </button>

            <!-- Search -->
            <div class="hidden md:flex relative group">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i data-lucide="search"
                        class="w-4 h-4 text-slate-400 group-focus-within:text-blue-500 transition-colors"></i>
                </div>
                <input type="text" placeholder="Search users, clubs, events..."
                    class="w-72 lg:w-96 h-10 pl-10 pr-4 rounded-xl bg-white/50 backdrop-blur-sm border border-slate-200/60 text-sm text-slate-700 placeholder:text-slate-400 focus:bg-white/90 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 outline-none transition-all duration-300 hover:border-blue-200/80">
            </div>

            <!-- Mobile Title -->
            <div class="md:hidden">
                <h1 class="font-bold text-slate-800">UniClub</h1>
            </div>
        </div>

        <!-- RIGHT SIDE -->
        <div class="flex items-center gap-3 sm:gap-5">

            <!-- Notification -->
            <button
                class="relative w-10 h-10 rounded-xl flex items-center justify-center hover:bg-white/30 transition-all hover:scale-105 group">
                <i data-lucide="bell" class="w-5 h-5 text-slate-600 group-hover:text-blue-600 transition-colors"></i>
                <!-- Badge with pulse -->
                <span
                    class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 border-2 border-white rounded-full animate-pulse"></span>
            </button>

            <!-- Divider -->
            <div class="hidden sm:block h-8 w-px bg-slate-200/60"></div>

            <!-- User Profile -->
            <button
                class="flex items-center gap-3 rounded-xl hover:bg-white/30 px-2 py-1.5 transition-all hover:scale-[1.02] group">
                <!-- Name -->
                <div class="hidden sm:block text-right">
                    <p class="text-sm font-semibold text-slate-800 group-hover:text-blue-700 transition-colors">
                        <?= htmlspecialchars($_SESSION['user']['name'] ?? 'Administrator') ?>
                    </p>
                    <p class="text-xs text-slate-400">Administrator</p>
                </div>
                <!-- Avatar with gradient glow -->
                <div
                    class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600 text-white flex items-center justify-center font-bold shadow-md shadow-blue-200/40 group-hover:shadow-blue-300/60 transition-all">
                    <?= strtoupper(substr($_SESSION['user']['name'] ?? 'A', 0, 1)) ?>
                </div>
            </button>

            <!-- Logout -->
            <a href="<?= BASE_URL ?>/logout"
                class="hidden lg:flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium text-slate-600 hover:bg-red-50/80 hover:text-red-600 transition-all hover:scale-[1.02] hover:shadow-sm border border-transparent hover:border-red-200">
                <i data-lucide="log-out" class="w-4 h-4"></i>
                Logout
            </a>
        </div>
    </div>
</header>