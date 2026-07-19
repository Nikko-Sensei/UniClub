<header class="fixed top-0 right-0 left-0 lg:left-72 h-16 z-40
    bg-white/60 backdrop-blur-xl border-b border-slate-200/40 shadow-sm
    transition-all duration-300">

    <div class="h-full px-4 sm:px-6 lg:px-8 flex items-center justify-between">

        <!-- ========================================================== -->
        <!-- LEFT SIDE                                                  -->
        <!-- ========================================================== -->
        <div class="flex items-center gap-4">

            <!-- Mobile Menu -->
            <button id="menuButton"
                class="lg:hidden w-9 h-9 rounded-xl flex items-center justify-center hover:bg-slate-100 text-slate-500 transition-all hover:scale-105">
                <i data-lucide="menu" class="w-5 h-5"></i>
            </button>

            <!-- Search -->
            <div class="hidden md:flex relative group">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                    <i data-lucide="search"
                        class="w-4 h-4 text-slate-400 group-focus-within:text-blue-500 transition-colors duration-200"></i>
                </div>
                <input type="text" placeholder="Search users, clubs, events..."
                    class="w-64 lg:w-80 h-9 pl-10 pr-4 rounded-xl bg-slate-50/60 border border-slate-200/50 text-sm text-slate-700 placeholder:text-slate-400 focus:bg-white focus:ring-2 focus:ring-blue-500/30 focus:border-blue-400 outline-none transition-all duration-200 hover:border-slate-300/80">
            </div>

            <!-- Mobile Title -->
            <div class="md:hidden">
                <h1 class="font-bold text-slate-800 text-sm">UniClub</h1>
            </div>
        </div>

        <!-- ========================================================== -->
        <!-- RIGHT SIDE                                                 -->
        <!-- ========================================================== -->
        <div class="flex items-center gap-2 sm:gap-4">

            <!-- Notification -->
            <div class="relative">

                <!-- Notification button -->

                <button id="notificationButton" aria-label="Notifications"
                    class="relative w-9 h-9 rounded-xl flex items-center justify-center hover:bg-slate-100 transition-all hover:scale-105 group">


                    <i data-lucide="bell" class="w-5 h-5 text-slate-500 group-hover:text-blue-600 transition-colors">
                    </i>


                    <span id="notificationBadge" class="hidden absolute -top-1 -right-1
                            min-w-5 h-5 px-1
                            flex items-center justify-center
                            text-xs font-bold
                            text-white
                            bg-red-500
                            rounded-full
                            border-2 border-white">
                    </span>

                </button>

                <!-- Dropdown -->
                <div id="notificationDropdown" class="hidden absolute right-0 mt-3 w-80
                        bg-white rounded-xl shadow-xl
                        overflow-hidden z-50">


                    <div class="px-4 py-3 border-b">

                        <h3 class="font-semibold text-gray-800">
                            Notifications
                        </h3>

                    </div>



                    <div id="notificationList" class="max-h-96 overflow-y-auto">

                        <div class="p-4 text-center text-gray-500">
                            Loading...
                        </div>

                    </div>



                    <a href="<?= BASE_URL ?>/notifications" class="block text-center py-3
        text-blue-600 border-t">

                        View All

                    </a>


                </div>
            </div>

            <!-- Divider -->
            <div class="hidden sm:block h-7 w-px bg-slate-200/50"></div>

            <!-- User Profile -->
            <?php

            use App\Shared\Core\Auth; ?>
            <?php $user = Auth::user(); ?>
            <?php $name = $user['name'] ?? 'Admin'; ?>
            <?php $profileImage = $user['profile_image'] ?? null; ?>

            <button
                class="flex items-center gap-2.5 rounded-xl hover:bg-slate-100/60 px-2 py-1 transition-all hover:scale-[1.02] group">

                <!-- Name -->
                <div class="hidden sm:block text-right">
                    <p class="text-sm font-medium text-slate-700 group-hover:text-blue-700 transition-colors">
                        <?= htmlspecialchars($name) ?>
                    </p>
                    <p class="text-[10px] text-slate-400 font-medium tracking-wide">Administrator</p>
                </div>

                <!-- Avatar -->
                <div class="w-8 h-8 rounded-xl overflow-hidden bg-gradient-to-br from-blue-500 to-indigo-500
                    text-white flex items-center justify-center font-bold text-xs shadow-sm shadow-blue-200/30
                    ring-2 ring-white/50 group-hover:ring-blue-200/50 transition-all duration-200">

                    <?php if ($profileImage): ?>
                    <img src="<?= BASE_URL ?>/uploads/profile/<?= htmlspecialchars($profileImage) ?>"
                        alt="<?= htmlspecialchars($name) ?>" class="w-full h-full object-cover">
                    <?php else: ?>
                    <?php
                        $words = preg_split('/\s+/', trim($name));
                        $initials = strtoupper(substr($words[0], 0, 1));
                        if (count($words) >= 2) {
                            $initials = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
                        }
                        echo htmlspecialchars($initials);
                        ?>
                    <?php endif; ?>
                </div>
            </button>

            <!-- Logout -->
            <a href="<?= BASE_URL ?>/logout"
                class="hidden lg:flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-sm font-medium text-slate-500 hover:bg-red-50/80 hover:text-red-600 transition-all hover:scale-[1.02] hover:shadow-sm">
                <i data-lucide="log-out" class="w-4 h-4"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>
</header>