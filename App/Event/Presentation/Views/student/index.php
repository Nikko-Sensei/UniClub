<div class="max-w-7xl mx-auto px-4 md:px-6 py-8 w-full bg-mesh min-h-screen">

    <!-- ── Custom Styles for Animations ── -->
    <style>
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

        .animate-fadeInUp {
            animation: fadeInUp 0.6s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

        .animate-scaleIn {
            animation: scaleIn 0.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

        .animate-slideInLeft {
            animation: slideInLeft 0.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

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

        .glass-card-light {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .glass-card-light:hover {
            border-color: rgba(37, 99, 235, 0.2);
            box-shadow: 0 12px 40px rgba(37, 99, 235, 0.08);
        }

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

        .img-zoom {
            transition: transform 0.7s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .group:hover .img-zoom {
            transform: scale(1.05);
        }

        .bg-mesh {
            background: radial-gradient(circle at 20% 30%, rgba(37, 99, 235, 0.04) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(99, 102, 241, 0.04) 0%, transparent 50%),
                #F8FAFC;
        }

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

        *:focus-visible {
            outline: 2px solid #2563EB;
            outline-offset: 2px;
            border-radius: 4px;
        }
    </style>

    <!-- ========================================================== -->
    <!-- HEADER – Premium with Back Button                          -->
    <!-- ========================================================== -->

    <div class="flex flex-col gap-4 animate-fadeInUp">


        <!-- <div class="animate-slideInLeft">
            <a href="javascript:history.back()"
                class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
                <i data-lucide="arrow-left"
                    class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
                <span>Back</span>
            </a>
        </div> -->

        <!-- Main Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <p class="text-sm font-semibold text-blue-600 mb-1 flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-600 animate-pulse"></span>
                    Campus Activities
                </p>
                <div class="flex items-center gap-3">
                    <div
                        class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center shadow-lg shadow-blue-200">
                        <i data-lucide="calendar-days" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold text-slate-800">University Events</h1>
                        <p class="text-slate-500 mt-0.5">Explore upcoming university events, schedules, locations, and
                            activities.</p>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-2 text-sm text-slate-500 bg-white/80 px-4 py-2 rounded-full shadow-sm">
                <i data-lucide="calendar-days" class="w-4 h-4 text-blue-500"></i>
                <?= $pagination['total'] ?> events
            </div>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- SEARCH + FILTER – Glass Design                            -->
    <!-- ========================================================== -->

    <form method="GET"
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-4 sm:p-5 mt-8 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 animate-fadeInUp delay-100">
        <div class="flex flex-col lg:flex-row gap-3">

            <!-- SEARCH -->
            <div class="relative flex-1">

                <!-- Search Icon -->
                <span class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                    <i data-lucide="search"
                        class="w-5 h-5 text-slate-400 transition-all duration-300 peer-focus:text-blue-500 peer-focus:scale-110"></i>
                </span>

                <!-- Search Input -->
                <input type="text" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                    placeholder="Search events..." onkeydown="if(event.key==='Enter'){this.form.submit()}"
                    class="peer w-full pl-11 pr-4 py-3 rounded-xl border border-slate-200/80 bg-white/50 text-sm text-slate-900 placeholder:text-slate-400 focus:border-blue-400 focus:ring-4 focus:ring-blue-100/60 focus:bg-white outline-none transition-all duration-300 shadow-sm focus:shadow-lg hover:border-blue-200">

            </div>

            <!-- STATUS FILTER -->
            <div class="relative">

                <!-- Filter Icon -->
                <span class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                    <i data-lucide="filter" class="w-4 h-4 text-slate-400"></i>
                </span>

                <!-- Select -->
                <select name="status" onchange="this.form.submit()"
                    class="appearance-none w-full lg:w-56 pl-11 pr-9 py-3 rounded-xl border border-slate-200/80 bg-white/50 text-sm text-slate-700 cursor-pointer focus:border-blue-400 focus:ring-4 focus:ring-blue-100/60 focus:bg-white outline-none transition-all duration-300 hover:border-blue-300 shadow-sm hover:shadow-md">

                    <option value="">All Events</option>

                    <option value="published" <?= ($_GET['status'] ?? '') == 'published' ? 'selected' : '' ?>>
                        Upcoming Events
                    </option>

                    <option value="completed" <?= ($_GET['status'] ?? '') == 'completed' ? 'selected' : '' ?>>
                        Past Events
                    </option>

                </select>

                <!-- Dropdown Arrow -->
                <span class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
                    <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 transition-transform duration-300"></i>
                </span>

            </div>
        </div>
    </form>

    <!-- ========================================================== -->
    <!-- SECTION TITLE                                              -->
    <!-- ========================================================== -->

    <div class="flex justify-between items-center mt-10 mb-5 animate-fadeInUp delay-200">
        <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2">
            <span class="text-blue-600">📅</span> Explore Events
        </h2>
        <span class="text-sm text-slate-500 bg-white/80 px-3 py-1 rounded-full shadow-sm">
            <?= $pagination['total'] ?> found
        </span>
    </div>

    <!-- ========================================================== -->
    <!-- EVENTS GRID                                               -->
    <!-- ========================================================== -->

    <?php if (empty($events)): ?>

        <!-- EMPTY STATE -->
        <div
            class="glass-card-light rounded-2xl border border-dashed border-slate-300 px-6 py-16 text-center animate-fadeInUp delay-300">
            <div
                class="w-20 h-20 mx-auto bg-gradient-to-br from-blue-50 to-blue-100 text-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-100">
                <i data-lucide="calendar-x" class="w-10 h-10"></i>
            </div>
            <h3 class="mt-5 text-xl font-bold text-slate-800">No Events Found</h3>
            <p class="text-sm text-slate-500 mt-2 max-w-md mx-auto">Try another search keyword or adjust your filters.</p>
        </div>

    <?php else: ?>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">

            <?php foreach ($events as $index => $event): ?>

                <?php
                $timestamp = strtotime($event->getEventDate());
                $day = date('d', $timestamp);
                $month = date('M', $timestamp);
                ?>

                <!-- EVENT CARD – Exactly matching the club card hover style -->
                <div class="group glass-card-light rounded-2xl overflow-hidden border border-slate-100/60 shadow-xl transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 hover:border-blue-200/50 animate-scaleIn"
                    style="animation-delay: <?= $index * 100 + 200 ?>ms;">

                    <!-- IMAGE -->
                    <div class="relative h-48 bg-blue-50 overflow-hidden">
                        <?php if ($event->getBanner()): ?>
                            <img src="<?= BASE_URL ?>/uploads/events/<?= htmlspecialchars($event->getBanner()) ?>"
                                class="w-full h-full object-cover img-zoom">
                        <?php else: ?>
                            <div
                                class="w-full h-full flex items-center justify-center text-blue-300 bg-gradient-to-br from-blue-50 to-blue-100">
                                <i data-lucide="calendar-days" class="w-16 h-16"></i>
                            </div>
                        <?php endif; ?>

                        <!-- DATE BADGE -->
                        <div
                            class="absolute top-4 left-4 w-16 h-16 rounded-xl bg-white/90 backdrop-blur-sm shadow-lg flex flex-col items-center justify-center border border-white/30 transition-all duration-300 group-hover:shadow-xl group-hover:scale-105">
                            <span class="text-xl font-extrabold text-blue-600 leading-none"><?= $day ?></span>
                            <span class="text-xs uppercase text-slate-500 font-semibold"><?= $month ?></span>
                        </div>

                        <!-- Status Badge -->
                        <?php if (method_exists($event, 'getStatus')): ?>
                            <?php if ($event->getStatus() === 'published'): ?>
                                <div
                                    class="absolute top-4 right-4 bg-emerald-500/90 backdrop-blur-sm text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                                    Upcoming
                                </div>
                            <?php elseif ($event->getStatus() === 'completed'): ?>
                                <div
                                    class="absolute top-4 right-4 bg-slate-500/80 backdrop-blur-sm text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                                    Past
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <!-- CONTENT -->
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-xs text-slate-500">
                            <i data-lucide="calendar" class="w-3.5 h-3.5 text-blue-500"></i>
                            <?= date('M d, Y', strtotime($event->getEventDate())) ?>
                            <?php if (method_exists($event, 'getEventTime') && $event->getEventTime()): ?>
                                <span class="text-slate-300">•</span>
                                <i data-lucide="clock" class="w-3.5 h-3.5 text-blue-500"></i>
                                <?= date('h:i A', strtotime($event->getEventTime())) ?>
                            <?php endif; ?>
                        </div>

                        <h3
                            class="mt-2 text-lg font-bold text-slate-800 line-clamp-2 group-hover:text-blue-700 transition-colors">
                            <?= htmlspecialchars($event->getTitle()) ?>
                        </h3>

                        <div class="flex items-center gap-2 mt-2 text-sm text-slate-500">
                            <i data-lucide="map-pin" class="w-4 h-4 text-blue-500 flex-shrink-0"></i>
                            <span class="line-clamp-1"><?= htmlspecialchars($event->getVenue()) ?></span>
                        </div>

                        <p class="mt-3 text-sm text-slate-500 line-clamp-2">
                            <?= htmlspecialchars($event->getDescription()) ?>
                        </p>
                    </div>

                    <!-- FOOTER -->
                    <div class="px-5 pb-5">
                        <a href="<?= BASE_URL ?>/events/<?= $event->getId() ?>"
                            class="flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-2.5 rounded-xl text-sm font-semibold transition-all duration-300 shadow-sm shadow-blue-200/50 hover:shadow-lg hover:scale-[1.02] btn-shine">
                            View Details
                            <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
                        </a>
                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>

    <!-- ========================================================== -->
    <!-- PAGINATION – Premium Style                                -->
    <!-- ========================================================== -->

    <?php if ($pagination['total_pages'] > 1):
        $current = $pagination['current_page'];
        $total = $pagination['total_pages'];
        $previous = array_merge($_GET, ['page' => max(1, $current - 1)]);
        $next = array_merge($_GET, ['page' => min($total, $current + 1)]);
    ?>

        <div class="flex justify-center items-center gap-3 mt-10 animate-fadeInUp delay-400">
            <a href="?<?= http_build_query($previous) ?>"
                class="flex items-center gap-1.5 px-5 py-2.5 rounded-xl border text-sm font-semibold transition-all duration-300 <?= $current == 1 ? 'pointer-events-none opacity-40 bg-slate-100 border-slate-200' : 'glass-card-light hover:border-blue-300 hover:shadow-md hover:scale-105 text-slate-700 border-slate-200' ?>">
                <i data-lucide="chevron-left" class="w-4 h-4"></i>
                Previous
            </a>

            <div
                class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-semibold shadow-md shadow-blue-200/50">
                <?= $current ?> / <?= $total ?>
            </div>

            <a href="?<?= http_build_query($next) ?>"
                class="flex items-center gap-1.5 px-5 py-2.5 rounded-xl border text-sm font-semibold transition-all duration-300 <?= $current == $total ? 'pointer-events-none opacity-40 bg-slate-100 border-slate-200' : 'glass-card-light hover:border-blue-300 hover:shadow-md hover:scale-105 text-slate-700 border-slate-200' ?>">
                Next
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
            </a>
        </div>

    <?php endif; ?>

</div>