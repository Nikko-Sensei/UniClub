<?php $currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH); ?>
<?php

use App\Shared\Core\Auth;

?>
<header class="sticky top-0 z-50 bg-gradient-to-r from-blue-700 via-blue-600 to-indigo-700 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 md:px-6 h-16 flex items-center justify-between">

        <!-- Left: mobile toggle + logo -->
        <div class="flex items-center gap-3">
            <button id="menu-toggle" aria-label="Open menu"
                class="md:hidden w-10 h-10 flex items-center justify-center rounded-xl hover:bg-white/15 transition">
                <i data-lucide="menu" class="w-5 h-5"></i>
            </button>

            <a href="<?= BASE_URL ?>/dashboard" class="flex items-center gap-2.5 font-bold text-lg tracking-tight">
                <span class="flex items-center justify-center w-9 h-9 rounded-xl bg-white/15">
                    <i data-lucide="landmark" class="w-5 h-5"></i>
                </span>
                <span>uniClub</span>
            </a>
        </div>

        <!-- Center: desktop nav -->
        <nav class="hidden lg:flex items-center gap-1">
            <?php
            $navItems = [
                'clubs'         => 'Clubs',
                'events'        => 'Events',
                'announcements' => 'Announcements',
                'contact'       => 'Contact',
            ];
            foreach ($navItems as $slug => $label):
                $active = str_starts_with($currentPath ?? '', BASE_URL . '/' . $slug);
            ?>
            <a href="<?= BASE_URL ?>/<?= $slug ?>"
                class="px-3.5 py-2 rounded-xl text-sm font-medium transition <?= $active ? 'bg-white/20 text-white' : 'text-blue-50 hover:bg-white/10' ?>">
                <?= $label ?>
            </a>
            <?php endforeach; ?>
        </nav>

        <!-- Right: actions -->
        <div class="flex items-center gap-2">

            <button id="notificationButton" aria-label="Notifications"
                class="relative w-10 h-10 flex items-center justify-center rounded-xl bg-white/10 hover:bg-white/20 transition">


                <i data-lucide="bell" class="w-4.5 h-4.5"></i>


                <span id="notificationBadge" class="hidden absolute -top-1 -right-1 
        min-w-5 h-5 px-1
        flex items-center justify-center
        text-xs font-bold
        text-white
        bg-red-500
        rounded-full
        ring-2 ring-blue-600">
                </span>


            </button>

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

            <?php if (!\App\Shared\Core\Auth::check()): ?>
            <a href="<?= BASE_URL ?>/login"
                class="hidden sm:inline-flex items-center gap-2 bg-white text-blue-700 px-4 py-2 rounded-xl text-sm font-semibold hover:bg-blue-50 transition">
                <i data-lucide="log-in" class="w-4 h-4"></i> Login
            </a>
            <?php else: ?>
            <a href="<?= BASE_URL ?>/profile"
                class="hidden lg:flex items-center gap-2 pl-1 pr-3 py-1 rounded-xl hover:bg-white/10 transition">
                <div
                    class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center text-xs font-bold text-white overflow-hidden">

                    <?php if (!empty(Auth::profileImage())): ?>

                    <img src="<?= BASE_URL ?>/uploads/profile/<?= htmlspecialchars(Auth::profileImage()) ?>"
                        class="w-full h-full rounded-full object-cover" alt="Profile">

                    <?php else: ?>

                    <?php
                            $name = Auth::user()['name'] ?? 'User';

                            $words = preg_split('/\s+/', trim($name));

                            if (count($words) >= 2) {
                                $initials = strtoupper(
                                    substr($words[0], 0, 1) .
                                        substr($words[1], 0, 1)
                                );
                            } else {
                                $initials = strtoupper(substr($words[0], 0, 1));
                            }

                            echo htmlspecialchars($initials);
                            ?>

                    <?php endif; ?>

                </div>
                <span class="text-sm font-medium">Profile</span>
            </a>
            <a href="<?= BASE_URL ?>/logout" aria-label="Logout"
                class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/10 hover:bg-red-500 transition">
                <i data-lucide="log-out" class="w-4.5 h-4.5"></i>
            </a>
            <?php endif; ?>
        </div>
    </div>
</header>

<?php require BASE_PATH . '/App/Shared/Presentation/Views/Components/alert.php'; ?>

<!-- Mobile drawer -->
<div id="menu-overlay"
    class="fixed inset-0 z-40 bg-slate-900/50 opacity-0 pointer-events-none transition-opacity duration-300 md:hidden">
</div>

<div id="mobile-menu"
    class="fixed inset-y-0 left-0 z-50 w-72 max-w-[80vw] bg-white p-5 shadow-2xl -translate-x-full transition-transform duration-300 md:hidden flex flex-col">

    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-2.5 font-bold text-lg text-slate-800">
            <span class="w-9 h-9 flex items-center justify-center bg-blue-100 text-blue-600 rounded-xl">
                <i data-lucide="landmark" class="w-5 h-5"></i>
            </span>
            uniClub
        </div>
        <button id="menu-close" aria-label="Close menu"
            class="w-9 h-9 flex items-center justify-center rounded-xl text-slate-400 hover:bg-slate-100">
            <i data-lucide="x" class="w-5 h-5"></i>
        </button>
    </div>

    <nav class="flex flex-col gap-1 text-sm font-medium text-slate-700">
        <?php foreach ($navItems as $slug => $label):
            $active = str_starts_with($currentPath ?? '', BASE_URL . '/' . $slug);
        ?>
        <a href="<?= BASE_URL ?>/<?= $slug ?>"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition <?= $active ? 'bg-blue-50 text-blue-700' : 'hover:bg-slate-50' ?>">
            <?= $label ?>
        </a>
        <?php endforeach; ?>
        <a href="<?= BASE_URL ?>/profile"
            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-50 transition">Profile</a>
    </nav>

    <div class="mt-auto pt-4 border-t border-slate-100">
        <?php if (!\App\Shared\Core\Auth::check()): ?>
        <a href="<?= BASE_URL ?>/login"
            class="flex items-center justify-center gap-2 bg-blue-600 text-white py-3 rounded-xl text-sm font-semibold">
            <i data-lucide="log-in" class="w-4 h-4"></i> Login
        </a>
        <?php else: ?>
        <a href="<?= BASE_URL ?>/logout"
            class="flex items-center justify-center gap-2 bg-red-50 text-red-600 py-3 rounded-xl text-sm font-semibold">
            <i data-lucide="log-out" class="w-4 h-4"></i> Logout
        </a>
        <?php endif; ?>
    </div>
</div>

<main class="flex-grow">