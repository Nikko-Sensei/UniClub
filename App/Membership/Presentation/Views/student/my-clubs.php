<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UniClub · My Clubs</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com">
    </script>

    <!-- Google Font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap"
        rel="stylesheet" />

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest">
    </script>

    <style>
        /* ── Base ── */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #F8FAFC;
            color: #111827;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            overflow-x: hidden;
        }

        /* ── Scrollbar ── */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #CBD5E1;
            border-radius: 9999px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94A3B8;
        }

        /* ── Animation Keyframes ── */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            0% {
                opacity: 0;
                transform: scale(0.9);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        @keyframes pulseGlow {

            0%,
            100% {
                opacity: 0.3;
                transform: scale(1);
            }

            50% {
                opacity: 0.8;
                transform: scale(1.1);
            }
        }

        @keyframes slideInLeft {
            0% {
                opacity: 0;
                transform: translateX(-30px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }

            100% {
                background-position: 200% 0;
            }
        }

        /* ── Animation Classes ── */
        .animate-fadeInUp {
            animation: fadeInUp 0.6s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

        .animate-scaleIn {
            animation: scaleIn 0.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

        .animate-float {
            animation: float 5s ease-in-out infinite;
        }

        .animate-pulseGlow {
            animation: pulseGlow 3.5s ease-in-out infinite;
        }

        .animate-slideInLeft {
            animation: slideInLeft 0.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

        .animate-shimmer {
            background: linear-gradient(90deg, #F1F5F9 25%, #E2E8F0 50%, #F1F5F9 75%);
            background-size: 200% 100%;
            animation: shimmer 1.8s infinite;
        }

        /* ── Stagger Delays ── */
        .delay-100 {
            animation-delay: 100ms;
        }

        .delay-200 {
            animation-delay: 200ms;
        }

        .delay-300 {
            animation-delay: 300ms;
        }

        .delay-400 {
            animation-delay: 400ms;
        }

        .delay-500 {
            animation-delay: 500ms;
        }

        .delay-600 {
            animation-delay: 600ms;
        }

        /* ── Glassmorphism ── */
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
        }

        .glass-card:hover {
            border-color: rgba(37, 99, 235, 0.2);
            box-shadow: 0 12px 40px rgba(37, 99, 235, 0.08);
        }

        .glass-dark {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* ── Button Shine ── */
        .btn-shine {
            position: relative;
            overflow: hidden;
        }

        .btn-shine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .btn-shine:hover::before {
            left: 100%;
        }

        /* ── Back Button ── */
        .back-btn {
            transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .back-btn:hover {
            transform: translateX(-4px) scale(1.05);
            box-shadow: 0 8px 30px -8px rgba(37, 99, 235, 0.25);
        }

        .back-btn:active {
            transform: scale(0.95);
        }

        /* ── Card Hover ── */
        .card-hover {
            transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px -12px rgba(37, 99, 235, 0.15);
        }

        /* ── Image Zoom ── */
        .img-zoom {
            transition: transform 0.7s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .group:hover .img-zoom {
            transform: scale(1.05);
        }

        /* ── Stat Card Pulse ── */
        .stat-pulse {
            transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .stat-pulse:hover {
            transform: translateY(-2px);
        }

        /* ── Background Mesh ── */
        .bg-mesh {
            background: radial-gradient(circle at 20% 30%, rgba(37, 99, 235, 0.04) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(99, 102, 241, 0.04) 0%, transparent 50%),
                #F8FAFC;
        }

        /* ── Utilities ── */
        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* ── Focus States ── */
        *:focus-visible {
            outline: 2px solid #2563EB;
            outline-offset: 2px;
            border-radius: 4px;
        }

        /* ── Modal ── */
        .modal-backdrop {
            transition: opacity 0.3s ease;
        }
    </style>
</head>

<body>

    <div class="max-w-7xl mx-auto px-4 md:px-6 py-8 w-full bg-mesh min-h-screen">

        <!-- ========================================================== -->
        <!-- HEADER – Premium Welcome Section with Back Button          -->
        <!-- ========================================================== -->

        <div class="flex flex-col gap-4 animate-fadeInUp">

            <!-- Back Button Row -->
            <div class="animate-slideInLeft">
                <a href="javascript:history.back()"
                    class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
                    <i data-lucide="arrow-left"
                        class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
                    <span>Back</span>
                </a>
            </div>

            <!-- Main Header Content -->
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <div>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center shadow-lg shadow-blue-200">
                            <i data-lucide="layout-dashboard" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-slate-800">My Clubs</h1>
                            <p class="text-slate-500 text-sm mt-0.5">Welcome back,
                                <?= htmlspecialchars($_SESSION['user']['name']) ?> 👋</p>
                        </div>
                    </div>
                    <p class="text-slate-500 mt-2 ml-15">Manage your memberships, activities and events.</p>
                </div>

                <a href="<?= BASE_URL ?>/clubs"
                    class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-6 py-3 rounded-xl font-semibold shadow-lg shadow-blue-200/50 transition-all duration-300 hover:scale-105 hover:shadow-xl btn-shine">
                    <i data-lucide="compass" class="w-4 h-4"></i>
                    Explore Clubs
                </a>
            </div>
        </div>

        <!-- ========================================================== -->
        <!-- STATISTICS – Premium Glass Cards                           -->
        <!-- ========================================================== -->

        <?php

        $stats = [

            [
                'label' => 'Joined Clubs',
                'value' => $joinedCount,
                'icon' => 'users',
                'color' => 'blue'
            ],

            [
                'label' => 'Pending Requests',
                'value' => $pendingCount,
                'icon' => 'clock-3',
                'color' => 'amber'
            ],

            [
                'label' => 'Upcoming Events',
                'value' => $upcomingEventCount,
                'icon' => 'calendar-days',
                'color' => 'emerald'
            ]

        ];

        ?>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mt-8">
            <?php foreach ($stats as $index => $s): ?>
                <div class="glass-card rounded-2xl p-6 card-hover animate-fadeInUp"
                    style="animation-delay: <?= $index * 100 + 100 ?>ms;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-slate-500 font-medium"><?= $s['label'] ?></p>
                            <div class="flex items-baseline gap-1 mt-1">
                                <h2 class="text-4xl font-extrabold text-<?= $s['color'] ?>-600">
                                    <?= $s['value'] ?>
                                </h2>
                                <?php if ($s['value'] > 0): ?>
                                    <span class="text-sm text-slate-400 font-medium">total</span>
                                <?php endif; ?>
                            </div>
                            <?php if ($s['value'] > 0): ?>
                                <div class="mt-1">
                                    <span
                                        class="inline-flex items-center gap-1 text-xs font-medium text-<?= $s['color'] ?>-600 bg-<?= $s['color'] ?>-50 px-2 py-0.5 rounded-full">
                                        <span class="w-1.5 h-1.5 rounded-full bg-<?= $s['color'] ?>-500 animate-pulse"></span>
                                        Active
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div
                            class="w-14 h-14 rounded-2xl bg-<?= $s['color'] ?>-50 text-<?= $s['color'] ?>-600 flex items-center justify-center shadow-inner">
                            <i data-lucide="<?= $s['icon'] ?>" class="w-7 h-7"></i>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- ========================================================== -->
        <!-- SECTION TITLE                                              -->
        <!-- ========================================================== -->

        <div class="mt-10 mb-5 animate-fadeInUp delay-100">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                        <span class="text-blue-600">👥</span> Joined Clubs
                    </h2>
                    <p class="text-sm text-slate-500 mt-0.5">Your approved club memberships</p>
                </div>
                <?php if (!empty($clubs)): ?>
                    <span class="text-sm text-slate-500 bg-white/80 px-3 py-1 rounded-full shadow-sm">
                        <?= count($clubs) ?> clubs
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <!-- ========================================================== -->
        <!-- CLUB GRID – Premium Cards                                  -->
        <!-- ========================================================== -->

        <?php if (empty($clubs)): ?>

            <!-- EMPTY STATE -->
            <div
                class="glass-card rounded-2xl border border-dashed border-slate-300 px-6 py-16 text-center animate-fadeInUp delay-200">
                <div
                    class="w-20 h-20 mx-auto bg-gradient-to-br from-blue-50 to-blue-100 text-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-100">
                    <i data-lucide="users" class="w-10 h-10"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mt-5">No Joined Clubs Yet</h3>
                <p class="text-sm text-slate-500 mt-2 max-w-md mx-auto">
                    Explore university clubs and join communities that match your interests.
                </p>
                <a href="<?= BASE_URL ?>/clubs"
                    class="inline-flex items-center justify-center gap-2 mt-6 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-300 hover:scale-105 shadow-lg shadow-blue-200/50 btn-shine">
                    <i data-lucide="compass" class="w-4 h-4"></i>
                    Explore Clubs
                </a>
            </div>

        <?php else: ?>

            <!-- CLUB GRID -->
            <div id="clubs" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <?php foreach ($clubs as $index => $club): ?>

                    <!-- CLUB CARD -->
                    <div class="glass-card rounded-2xl overflow-hidden border border-slate-100/60 shadow-xl transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 hover:border-blue-200/50 group animate-scaleIn"
                        style="animation-delay: <?= $index * 100 + 200 ?>ms;">

                        <div class="relative h-44 bg-slate-100 overflow-hidden">
                            <?php if (!empty($club['banner'])): ?>
                                <img src="<?= BASE_URL ?>/uploads/clubs/<?= htmlspecialchars($club['banner']) ?>"
                                    class="w-full h-full object-cover img-zoom">
                            <?php else: ?>
                                <div
                                    class="w-full h-full flex items-center justify-center text-slate-300 bg-gradient-to-br from-slate-100 to-slate-200">
                                    <i data-lucide="users" class="w-16 h-16"></i>
                                </div>
                            <?php endif; ?>

                            <!-- Role Badge -->
                            <div
                                class="absolute top-3 left-3 bg-blue-600/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg flex items-center gap-1.5">
                                <i data-lucide="award" class="w-3 h-3"></i>
                                <?= htmlspecialchars($club['club_role']) ?>
                            </div>

                            <!-- Event Count Badge -->
                            <div
                                class="absolute bottom-3 right-3 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-semibold text-slate-700 shadow-lg flex items-center gap-1.5">
                                <i data-lucide="calendar" class="w-3 h-3 text-blue-500"></i>
                                <?= (int)$club['upcoming_event_count'] ?>
                                <?= $club['upcoming_event_count'] == 1 ? 'Event' : 'Events' ?>
                            </div>
                        </div>

                        <!-- CONTENT -->
                        <div class="p-5">
                            <div class="flex items-center justify-between mb-3">
                                <span
                                    class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    Approved
                                </span>
                            </div>

                            <h3
                                class="text-lg font-bold text-slate-800 mb-1 line-clamp-1 group-hover:text-blue-700 transition-colors">
                                <?= htmlspecialchars($club['club_name']) ?>
                            </h3>

                            <?php if (!empty($club['description'])): ?>
                                <p class="text-sm text-slate-500 line-clamp-2 mb-4">
                                    <?= htmlspecialchars($club['description']) ?>
                                </p>
                            <?php endif; ?>

                            <div class="flex gap-2">
                                <a href="<?= BASE_URL ?>/clubs/<?= (int)$club['club_id'] ?>"
                                    class="flex-1 flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-2.5 rounded-xl text-sm font-semibold transition-all duration-300 shadow-sm shadow-blue-200/50 hover:shadow-lg hover:scale-[1.02] btn-shine">
                                    View Club
                                    <i data-lucide="arrow-right"
                                        class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
                                </a>

                                <button onclick="openLeaveModal(
                            <?= (int)$club['club_id'] ?>,
                            '<?= htmlspecialchars($club['club_name'], ENT_QUOTES) ?>'
                        )"
                                    class="px-4 py-2.5 rounded-xl border border-red-200 text-red-500 hover:bg-red-50 hover:border-red-300 transition-all duration-300 hover:scale-105 group/btn">
                                    <i data-lucide="log-out"
                                        class="w-4 h-4 transition-transform group-hover/btn:translate-x-0.5"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

            <!-- ========================================================== -->
            <!-- PAGINATION – Premium Style                                -->
            <!-- ========================================================== -->

            <?php if ($pagination['total_pages'] > 1):
                $current = $pagination['current_page'];
                $total = $pagination['total_pages'];
                $prevQuery = array_merge($_GET, ['page' => max(1, $current - 1)]);
                $nextQuery = array_merge($_GET, ['page' => min($total, $current + 1)]);
            ?>

                <div class="flex justify-center items-center gap-3 mt-8 animate-fadeInUp delay-400">
                    <a href="?<?= http_build_query($prevQuery) ?>#clubs"
                        class="flex items-center gap-1.5 px-5 py-2.5 rounded-xl border text-sm font-semibold transition-all duration-300 <?= $current == 1 ? 'pointer-events-none opacity-40 bg-slate-100 border-slate-200' : 'glass-card hover:border-blue-300 hover:shadow-md hover:scale-105 text-slate-700 border-slate-200' ?>">
                        <i data-lucide="chevron-left" class="w-4 h-4"></i>
                        Previous
                    </a>

                    <div
                        class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-semibold shadow-md shadow-blue-200/50">
                        <?= $current ?> / <?= $total ?>
                    </div>

                    <a href="?<?= http_build_query($nextQuery) ?>#clubs"
                        class="flex items-center gap-1.5 px-5 py-2.5 rounded-xl border text-sm font-semibold transition-all duration-300 <?= $current == $total ? 'pointer-events-none opacity-40 bg-slate-100 border-slate-200' : 'glass-card hover:border-blue-300 hover:shadow-md hover:scale-105 text-slate-700 border-slate-200' ?>">
                        Next
                        <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    </a>
                </div>

            <?php endif; ?>

        <?php endif; ?>

    </div>

    <!-- ========================================================== -->
    <!-- LEAVE CLUB MODAL – Premium Glass                          -->
    <!-- ========================================================== -->

    <div id="leaveClubModal"
        class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm transition-all duration-300">

        <div onclick="event.stopPropagation()"
            class="relative w-full max-w-md glass-card rounded-2xl shadow-2xl p-6 animate-scaleIn">

            <div
                class="w-16 h-16 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center shadow-lg shadow-red-100">
                <i data-lucide="log-out" class="w-8 h-8"></i>
            </div>

            <h3 class="text-xl font-bold text-slate-800 mt-5">Leave Club?</h3>

            <p class="text-sm text-slate-500 mt-2 leading-6">
                Are you sure you want to leave
                <span id="leaveClubName" class="font-semibold text-slate-800"></span>?
                You may need to request membership again if you want to rejoin.
            </p>

            <div class="flex flex-col-reverse sm:flex-row gap-3 mt-6">
                <button type="button" onclick="closeLeaveModal()"
                    class="flex-1 border border-slate-200 text-slate-700 hover:bg-slate-50 py-3 rounded-xl text-sm font-semibold transition-all duration-300 hover:scale-[1.02]">
                    Cancel
                </button>

                <form id="leaveClubForm" method="POST" class="flex-1">
                    <button type="submit"
                        class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 rounded-xl text-sm font-semibold transition-all duration-300 hover:scale-[1.02] shadow-lg shadow-red-200/50 btn-shine">
                        <i data-lucide="log-out" class="w-4 h-4"></i>
                        Yes, Leave Club
                    </button>
                </form>
            </div>

        </div>

    </div>

    <!-- ========================================================== -->
    <!-- JAVASCRIPT                                                 -->
    <!-- ========================================================== -->

    <script>
        // ── Open Leave Modal ──
        function openLeaveModal(clubId, clubName) {
            const modal = document.getElementById('leaveClubModal');
            document.getElementById('leaveClubName').textContent = clubName;
            document.getElementById('leaveClubForm').action = "<?= BASE_URL ?>/membership/" + clubId + "/leave";
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }

        // ── Close Leave Modal ──
        function closeLeaveModal() {
            const modal = document.getElementById('leaveClubModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }

        // ── Close on Escape key ──
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLeaveModal();
            }
        });

        // ── Close on overlay click ──
        document.getElementById('leaveClubModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeLeaveModal();
            }
        });

        // ── Lucide Icons ──
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        });

        // ── Intersection Observer for scroll animations ──
        document.addEventListener('DOMContentLoaded', function() {
            const animatedElements = document.querySelectorAll('.animate-scaleIn, .animate-fadeInUp');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            animatedElements.forEach(el => {
                if (el.classList.contains('animate-scaleIn') || el.classList.contains('animate-fadeInUp')) {
                    el.style.opacity = '0';
                    observer.observe(el);
                }
            });

            console.log('🚀 UniClub · My Clubs dashboard ready!');
        });
    </script>

</body>

</html>