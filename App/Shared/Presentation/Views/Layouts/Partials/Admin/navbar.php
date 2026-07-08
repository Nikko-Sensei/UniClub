<header class="fixed top-0 right-0 left-0 lg:left-64 h-16 bg-white border-b border-slate-200 z-40">

    <div class="h-full px-6 lg:px-8 flex items-center justify-between">

        <!-- Left -->
        <div class="flex items-center gap-4">

            <!-- Mobile Menu -->
            <button id="menuButton" class="lg:hidden p-2 rounded-lg hover:bg-slate-100 transition">

                <i data-lucide="menu" class="w-5 h-5"></i>

            </button>

            <!-- Search -->
            <div class="relative hidden md:block">

                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">

                    <i data-lucide="search" class="w-4 h-4 text-slate-400"></i>

                </div>

                <input type="text" placeholder="Search users, clubs, events..." class="w-80 h-10 pl-10 pr-4 text-sm bg-slate-50 border border-slate-200 rounded-lg
               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

            </div>

        </div>


        <!-- Right -->
        <div class="flex items-center gap-5">

            <!-- Notification -->
            <button class="relative p-2 rounded-lg hover:bg-slate-100 transition">

                <i data-lucide="bell" class="w-5 h-5 text-slate-600"></i>

                <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full">
                </span>

            </button>


            <!-- Divider -->
            <div class="hidden sm:block h-6 w-px bg-slate-200"></div>


            <!-- User -->
            <div class="flex items-center gap-3">

                <div class="hidden sm:block text-right">

                    <p class="text-sm font-semibold text-slate-800">

                        <?= htmlspecialchars($_SESSION['user']['name'] ?? 'Administrator') ?>

                    </p>

                    <p class="text-xs text-slate-500">

                        Administrator

                    </p>

                </div>

                <div
                    class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold">

                    <?= strtoupper(substr($_SESSION['user']['name'] ?? 'A', 0, 1)) ?>

                </div>

            </div>


            <!-- Logout -->
            <a href="<?= BASE_URL ?>/logout" class="hidden md:flex items-center gap-2 px-3 py-2 rounded-lg
                       text-slate-600 hover:bg-red-50 hover:text-red-600 transition">

                <i data-lucide="log-out" class="w-4 h-4"></i>

                <span class="text-sm font-medium">
                    Logout
                </span>

            </a>

        </div>

    </div>

</header>