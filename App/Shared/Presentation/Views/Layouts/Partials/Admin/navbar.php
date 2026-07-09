<header class="fixed top-0 right-0 left-0 lg:left-72 h-16 bg-white/90 backdrop-blur-md border-b border-slate-200 z-40">

    <div class="h-full px-4 sm:px-6 lg:px-8 flex items-center justify-between">

        <!-- LEFT SIDE -->
        <div class="flex items-center gap-4">

            <!-- Mobile Menu -->
            <button id="menuButton"
                class="lg:hidden w-10 h-10 rounded-xl flex items-center justify-center hover:bg-slate-100 text-slate-600 transition">
                <i data-lucide="menu" class="w-5 h-5"></i>
            </button>

            <!-- Search -->
            <div class="hidden md:flex relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i data-lucide="search" class="w-4 h-4 text-slate-400"></i>
                </div>
                <input type="text" placeholder="Search users, clubs, events..."
                    class="w-72 lg:w-96 h-10 pl-10 pr-4 rounded-xl bg-slate-50 border border-slate-200 text-sm text-slate-700 placeholder:text-slate-400 focus:bg-white focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 outline-none transition">
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
                class="relative w-10 h-10 rounded-xl flex items-center justify-center hover:bg-slate-100 transition">
                <i data-lucide="bell" class="w-5 h-5 text-slate-600"></i>
                <!-- Badge -->
                <span class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 border-2 border-white rounded-full"></span>
            </button>

            <!-- Divider -->
            <div class="hidden sm:block h-8 w-px bg-slate-200"></div>

            <!-- User Profile -->
            <button class="flex items-center gap-3 rounded-xl hover:bg-slate-50 px-2 py-1.5 transition">
                <!-- Name -->
                <div class="hidden sm:block text-right">
                    <p class="text-sm font-semibold text-slate-800">
                        <?= htmlspecialchars($_SESSION['user']['name'] ?? 'Administrator') ?>
                    </p>
                    <p class="text-xs text-slate-500">Administrator</p>
                </div>
                <!-- Avatar -->
                <div
                    class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-blue-500 text-white flex items-center justify-center font-bold shadow-sm">
                    <?= strtoupper(substr($_SESSION['user']['name'] ?? 'A', 0, 1)) ?>
                </div>
            </button>

            <!-- Logout -->
            <a href="<?= BASE_URL ?>/logout"
                class="hidden lg:flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium text-slate-600 hover:bg-red-50 hover:text-red-600 transition">
                <i data-lucide="log-out" class="w-4 h-4"></i>
                Logout
            </a>
        </div>
    </div>
</header>