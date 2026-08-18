<div class="max-w-7xl mx-auto px-4 md:px-6 py-6 w-full bg-mesh min-h-screen">

    <!-- ── Custom Styles ── -->
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

    @keyframes fadeInDown {
        0% {
            opacity: 0;
            transform: translateY(-20px);
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

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-8px);
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

    .animate-fadeInUp {
        animation: fadeInUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    .animate-fadeInDown {
        animation: fadeInDown 0.6s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    .animate-scaleIn {
        animation: scaleIn 0.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    .animate-slideInLeft {
        animation: slideInLeft 0.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    .animate-float {
        animation: float 5s ease-in-out infinite;
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

    .glass-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .glass-card-light {
        background: rgba(255, 255, 255, 0.72);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
        transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .glass-card-light:hover {
        border-color: rgba(37, 99, 235, 0.25);
        box-shadow: 0 16px 48px rgba(37, 99, 235, 0.10);
        transform: translateY(-4px);
    }

    .glass-card-dark {
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.1);
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
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
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
        transition: transform 0.8s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .group:hover .img-zoom {
        transform: scale(1.06);
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

    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    *:focus-visible {
        outline: 2px solid #2563EB;
        outline-offset: 2px;
        border-radius: 4px;
    }

    /* Scrollbar */
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

    /* Floating action button pulse */
    .float-pulse {
        animation: float 3s ease-in-out infinite, pulseGlow 4s ease-in-out infinite;
    }
    </style>

    <!-- ========================================================== -->
    <!-- BACK BUTTON – Floating glass                              -->
    <!-- ========================================================== -->
    <div class="animate-slideInLeft mb-4">
        <a href="javascript:history.back()"
            class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
            <span>Back to Events</span>
        </a>
    </div>

    <?php
    $eventDateTime = new DateTime(
        $event->getEventDate() . ' ' . $event->getStartTime()
    );

    $eventDate = new DateTime(
        $event->getEventDate()
    );

    $today = new DateTime('today');
    $tomorrow = new DateTime('tomorrow');

    $dayDifference = (int) $today->diff($eventDate)->format('%r%a');

    if ($dayDifference === 0) {

        $dateLabel = 'Today';
    } elseif ($dayDifference === 1) {

        $dateLabel = 'Tomorrow';
    } elseif ($dayDifference === -1) {

        $dateLabel = 'Yesterday';
    } elseif ($dayDifference > 1 && $dayDifference < 7) {

        $dateLabel = 'In ' . $dayDifference . ' days';
    } else {

        $dateLabel = $eventDate->format('D, M j, Y');
    }


    /*
|--------------------------------------------------------------------------
| Format Time
|--------------------------------------------------------------------------
*/

    $startTime = new DateTime(
        $event->getEventDate() . ' ' . $event->getStartTime()
    );

    $endTime = new DateTime(
        $event->getEventDate() . ' ' . $event->getEndTime()
    );

    $formattedStartTime = $startTime->format('g:i A');
    $formattedEndTime = $endTime->format('g:i A');
    ?>

    <!-- ========================================================== -->
    <!-- HERO BANNER – Immersive with glass overlay               -->
    <!-- ========================================================== -->
    <div class="group relative rounded-2xl overflow-hidden shadow-2xl animate-fadeInUp"
        style="min-height: 340px; max-height: 440px;">
        <?php if ($event->getBanner()): ?>
        <img src="<?= BASE_URL ?>/uploads/events/<?= htmlspecialchars($event->getBanner()) ?>"
            class="w-full h-full object-cover img-zoom" style="min-height: 340px; max-height: 440px;">
        <?php else: ?>
        <div class="w-full h-full bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-600 flex items-center justify-center"
            style="min-height: 340px; max-height: 440px;">
            <span class="text-white/30 font-bold text-4xl">📅</span>
        </div>
        <?php endif; ?>

        <!-- Dark gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-800/30 to-transparent"></div>

        <!-- Decorative glow orbs -->
        <div class="absolute top-10 right-20 w-40 h-40 rounded-full bg-blue-500/20 blur-3xl animate-pulseGlow"></div>
        <div class="absolute bottom-20 left-10 w-56 h-56 rounded-full bg-indigo-500/20 blur-3xl animate-pulseGlow"
            style="animation-delay: 1.5s;"></div>

        <!-- Content overlay – bottom aligned -->
        <div class="absolute bottom-0 left-0 right-0 p-6 md:p-8 lg:p-10">
            <div class="glass-card rounded-2xl p-5 md:p-7 max-w-3xl shadow-2xl animate-float">
                <!-- Status badge -->
                <div class="flex items-center gap-3 mb-3">
                    <span
                        class="inline-flex items-center gap-1.5 bg-emerald-500/90 backdrop-blur-sm text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                        <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                        <?= ucfirst(htmlspecialchars($event->getStatus())) ?>
                    </span>
                    <?php
                    $totalCapacity  = $capacity['capacity'] ?? null;
                    $availableSeats = $capacity['available_seats'] ?? null;

                    // Check whether the event has finished
                    $eventEnd = strtotime(
                        $event->getEventDate() . ' ' . $event->getEndTime()
                    );

                    $isFinished = $eventEnd < time();
                    ?>

                    <?php if (!$isFinished && $totalCapacity !== null && $availableSeats !== null): ?>

                    <?php if ($availableSeats <= 0): ?>

                    <!-- Fully Booked -->
                    <span class="inline-flex items-center gap-1.5
            bg-red-500/90 backdrop-blur-sm
            text-white text-xs font-semibold
            px-3 py-1 rounded-full shadow-lg">

                        <i data-lucide="users" class="w-3 h-3"></i>

                        Fully Registered
                    </span>

                    <?php elseif ($availableSeats <= 5): ?>

                    <!-- Almost Full -->
                    <span class="inline-flex items-center gap-1.5
            bg-orange-500/90 backdrop-blur-sm
            text-white text-xs font-semibold
            px-3 py-1 rounded-full shadow-lg">

                        <i data-lucide="users" class="w-3 h-3"></i>

                        <?= htmlspecialchars($availableSeats) ?>
                        <?= $availableSeats == 1 ? 'seat' : 'seats' ?> left
                    </span>

                    <?php else: ?>

                    <!-- Available Seats -->
                    <span class="inline-flex items-center gap-1.5
            bg-white/20 backdrop-blur-sm
            text-white/90 text-xs font-medium
            px-3 py-1 rounded-full
            border border-white/20">

                        <i data-lucide="users" class="w-3 h-3"></i>

                        <?= htmlspecialchars($availableSeats) ?> seats available
                    </span>

                    <?php endif; ?>

                    <?php endif; ?>
                </div>

                <h1 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-white drop-shadow-lg">
                    <?= htmlspecialchars($event->getTitle()) ?>
                </h1>

                <div class="flex flex-wrap items-center gap-4 md:gap-6 mt-3 text-sm text-white/80">
                    <div class="flex items-center gap-1.5">
                        <i data-lucide="calendar" class="w-4 h-4 text-blue-300"></i>

                        <span>
                            <?= htmlspecialchars($dateLabel) ?>
                        </span>
                    </div>

                    <div class="flex items-center gap-1.5">
                        <i data-lucide="clock" class="w-4 h-4 text-blue-300"></i>

                        <span>
                            <?= htmlspecialchars($formattedStartTime) ?>
                            –
                            <?= htmlspecialchars($formattedEndTime) ?>
                        </span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <i data-lucide="map-pin" class="w-4 h-4 text-blue-300"></i>
                        <span><?= htmlspecialchars($event->getVenue()) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- QUICK ACTION BAR – Floating registration card             -->
    <!-- ========================================================== -->
    <div class="flex flex-wrap items-center justify-between gap-4 mt-6 animate-fadeInUp delay-100">
        <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500">
            <div class="flex items-center gap-2 bg-white/80 px-4 py-2 rounded-full shadow-sm">
                <i data-lucide="building-2" class="w-4 h-4 text-blue-600"></i>
                <span><strong class="text-slate-700">Organized by:</strong>
                    <?php
                    $clubName = '-';
                    foreach ($clubs as $club) {
                        if ($event->getClubId() == $club->getId()) {
                            $clubName = $club->getName();
                            break;
                        }
                    }
                    echo htmlspecialchars($clubName);
                    ?>
                </span>
            </div>
            <div class="flex items-center gap-2 bg-white/80 px-4 py-2 rounded-full shadow-sm">
                <i data-lucide="tag" class="w-4 h-4 text-blue-600"></i>
                <span><?php
                        $categoryName = '-';
                        foreach ($categories as $category) {
                            if ($event->getCategoryId() == $category['id']) {
                                $categoryName = $category['name'];
                                break;
                            }
                        }
                        echo htmlspecialchars($categoryName);
                        ?></span>
            </div>
        </div>

        <!-- Registration CTA -->
        <div class="flex-shrink-0">

            <?php
            /*
    |--------------------------------------------------------------------------
    | Event Status
    |--------------------------------------------------------------------------
    */

            $eventEnd = strtotime(
                $event->getEventDate() . ' ' . $event->getEndTime()
            );

            $isCompleted = $eventEnd < time();


            /*
    |--------------------------------------------------------------------------
    | Available Seats
    |--------------------------------------------------------------------------
    */

            $availableSeats = (int) ($capacity['available_seats'] ?? 0);

            $isFullyBooked = $availableSeats <= 0;
            ?>


            <?php if ($isCompleted): ?>

            <!-- ==========================================================
             EVENT FINISHED
             ========================================================== -->

            <div class="flex items-center gap-2
            bg-slate-100 text-slate-600
            px-5 py-3 rounded-xl font-medium
            border border-slate-200">

                <i data-lucide="calendar-check" class="w-5 h-5"></i>

                Event Finished

            </div>


            <?php elseif ($isFullyBooked): ?>

            <!-- ==========================================================
             FULLY BOOKED
             ========================================================== -->

            <div class="flex items-center gap-2
            bg-red-50 text-red-600
            px-5 py-3 rounded-xl font-semibold
            border border-red-200">

                <i data-lucide="users" class="w-5 h-5"></i>

                Fully Registered

            </div>


            <?php elseif ($registrationStatus === null): ?>

            <!-- ==========================================================
             REGISTER NOW
             ========================================================== -->

            <button type="button" onclick="openRegisterModal()" class="inline-flex items-center gap-2 px-6 py-3
            bg-gradient-to-r from-blue-600 to-indigo-600
            hover:from-blue-700 hover:to-indigo-700
            text-white rounded-xl font-semibold text-sm
            transition-all duration-300 shadow-xl
            hover:scale-[1.04] btn-shine">

                <i data-lucide="user-plus" class="w-4 h-4"></i>

                Register Now

            </button>


            <?php elseif ($registrationStatus === 'pending'): ?>

            <!-- ==========================================================
             PENDING APPROVAL
             ========================================================== -->

            <div class="flex items-center gap-2
            bg-yellow-50 text-yellow-700
            px-5 py-3 rounded-xl font-medium
            border border-yellow-200">

                <i data-lucide="clock" class="w-5 h-5"></i>

                Pending Approval

            </div>


            <?php elseif ($registrationStatus === 'approved'): ?>

            <!-- ==========================================================
             ALREADY REGISTERED
             ========================================================== -->

            <div class="flex items-center gap-2
            bg-emerald-50 text-emerald-700
            px-5 py-3 rounded-xl font-medium
            border border-emerald-200">

                <i data-lucide="check-circle" class="w-5 h-5"></i>

                Registered

            </div>

            <?php endif; ?>

        </div>
    </div>

    <!-- ========================================================== -->
    <!-- STUDENT PARTICIPATION PANEL                                -->
    <!-- ========================================================== -->

    <div class="mt-8 space-y-6 animate-fadeInUp">


        <!-- Header -->
        <div class="flex items-center justify-between">


            <div>

                <h2 class="text-xl font-bold text-slate-800">

                    My Participation

                </h2>


                <p class="text-sm text-slate-500">

                    Track your event progress and achievements.

                </p>

            </div>



            <div
                class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center shadow-lg">

                <i data-lucide="activity" class="w-6 h-6"></i>

            </div>


        </div>





        <!-- Participation Cards -->

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">





            <!-- Registration -->

            <div class="glass-card-light rounded-2xl border border-slate-100 shadow-xl p-5 hover:shadow-2xl transition">


                <div class="flex items-center gap-4">


                    <div class="w-12 h-12 rounded-xl bg-blue-500 text-white flex items-center justify-center">


                        <i data-lucide="clipboard-check"></i>


                    </div>



                    <div>


                        <p class="text-xs uppercase text-slate-400 font-semibold">

                            Registration

                        </p>



                        <p class="text-lg font-bold text-slate-800">


                            <?=
                            ucfirst(
                                $registrationStatus ?? 'Pending'
                            )
                            ?>


                        </p>


                    </div>



                </div>



                <div class="mt-4">


                    <?php if ($registrationStatus === 'approved'): ?>


                    <span
                        class="inline-flex items-center gap-1 px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-xs font-semibold">


                        <i data-lucide="check" class="w-3 h-3"></i>

                        Approved


                    </span>



                    <?php else: ?>


                    <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs">

                        Pending

                    </span>


                    <?php endif; ?>


                </div>


            </div>







            <!-- Attendance -->

            <div class="glass-card-light rounded-2xl border border-slate-100 shadow-xl p-5 hover:shadow-2xl transition">


                <div class="flex items-center gap-4">


                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-400 to-green-600 text-white flex items-center justify-center">


                        <i data-lucide="user-check"></i>


                    </div>



                    <div>


                        <p class="text-xs uppercase text-slate-400 font-semibold">

                            Attendance

                        </p>



                        <?php if ($attendance && $attendance->isPresent()): ?>


                        <p class="text-lg font-bold text-emerald-600">

                            Present

                        </p>


                        <?php else: ?>


                        <p class="text-lg font-bold text-yellow-600">

                            Pending

                        </p>


                        <?php endif; ?>


                    </div>


                </div>



                <div class="mt-4 text-sm text-slate-500">


                    <?php if ($attendance && $attendance->isPresent()): ?>


                    <span class="flex items-center gap-1">

                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-500"></i>

                        Attendance confirmed

                    </span>


                    <?php else: ?>


                    Attendance will be marked during event


                    <?php endif; ?>


                </div>


            </div>








            <!-- Certificate -->
            <div class="glass-card-light rounded-2xl border border-slate-100 shadow-xl p-5 hover:shadow-2xl transition">

                <div class="flex items-center gap-4">

                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-br from-yellow-400 to-orange-500 text-white flex items-center justify-center">

                        <i data-lucide="award"></i>

                    </div>

                    <div>

                        <p class="text-xs uppercase text-slate-400 font-semibold">
                            Certificate
                        </p>

                        <?php if ($certificate): ?>

                        <p class="text-lg font-bold text-blue-600">
                            Available
                        </p>

                        <?php elseif ($attendance && $attendance->isPresent()): ?>

                        <p class="text-lg font-bold text-yellow-600">
                            Processing
                        </p>

                        <?php else: ?>

                        <p class="text-lg font-bold text-slate-400">
                            Locked
                        </p>

                        <?php endif; ?>

                    </div>

                </div>


                <?php if ($certificate): ?>

                <a href="<?= BASE_URL ?>/certificates/<?= $certificate->getEventId() ?>/download"
                    class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-700 transition">

                    <i data-lucide="download" class="w-4 h-4"></i>

                    Download Certificate

                </a>

                <?php elseif ($attendance && $attendance->isPresent()): ?>

                <div class="mt-4 flex items-center gap-2 text-sm text-yellow-600">

                    <i data-lucide="clock" class="w-4 h-4"></i>

                    Certificate is being prepared

                </div>

                <?php else: ?>

                <div class="mt-4 flex items-center gap-2 text-sm text-slate-400">

                    <i data-lucide="lock" class="w-4 h-4"></i>

                    Attend the event to receive a certificate

                </div>

                <?php endif; ?>

            </div>






            <!-- Feedback -->

            <div class="glass-card-light rounded-2xl border border-slate-100 shadow-xl p-5 hover:shadow-2xl transition">


                <?php

                $eventEnd = strtotime(
                    $event->getEventDate()
                        . ' '
                        . $event->getEndTime()
                );

                $isCompleted = $eventEnd < time();

                ?>


                <div class="flex items-center gap-4">


                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 text-white flex items-center justify-center">

                        <i data-lucide="message-square" class="w-5 h-5"></i>

                    </div>



                    <div>


                        <p class="text-xs uppercase text-slate-400 font-semibold">

                            Feedback

                        </p>



                        <?php if (!$isCompleted): ?>


                        <p class="text-lg font-bold text-slate-400">

                            Locked

                        </p>



                        <?php elseif ($feedbackSubmitted): ?>


                        <p class="text-lg font-bold text-emerald-600">

                            Submitted ✓

                        </p>



                        <?php else: ?>


                        <p class="text-lg font-bold text-purple-600">

                            Available

                        </p>



                        <?php endif; ?>


                    </div>


                </div>




                <div class="mt-4">


                    <?php if (!$isCompleted): ?>


                    <div class="flex items-center gap-2 text-sm text-slate-400">

                        <i data-lucide="lock" class="w-4 h-4"></i>

                        Available after event completion

                    </div>




                    <?php elseif (!$feedbackSubmitted): ?>



                    <div class="flex items-start gap-2 text-sm text-purple-600">
                        <a href="#feedback-form"
                            class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-700">

                            <i data-lucide="message-circle" class="w-4 h-4"></i>

                            Give Feedback

                            <i data-lucide="arrow-down" class="w-4 h-4"></i>

                        </a>
                    </div>



                    <?php else: ?>


                    <div class="flex items-center gap-2 text-sm text-emerald-600 font-semibold">


                        <i data-lucide="check-circle" class="w-4 h-4"></i>

                        Feedback Submitted


                    </div>


                    <?php endif; ?>


                </div>


            </div>


        </div>


        <!-- ========================================================== -->
        <!-- MAIN CONTENT – 2‑column glass layout                      -->
        <!-- ========================================================== -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">

            <!-- LEFT: Overview + Details -->
            <div class="lg:col-span-2 space-y-6">

                <!-- Overview -->
                <div
                    class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 md:p-8 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 animate-fadeInUp delay-200">
                    <div class="flex items-center gap-3 mb-5">
                        <div
                            class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 text-white flex items-center justify-center shadow-lg shadow-blue-200">
                            <i data-lucide="info" class="w-5 h-5"></i>
                        </div>
                        <h2 class="text-xl font-bold text-slate-800">About This Event</h2>
                    </div>
                    <div class="prose prose-slate max-w-none">
                        <p class="text-slate-600 leading-relaxed text-base">
                            <?= nl2br(htmlspecialchars($event->getDescription())) ?>
                        </p>
                    </div>
                </div>

                <!-- Additional Info (if any) -->
                <?php if (method_exists($event, 'getAdditionalInfo') && $event->getAdditionalInfo()): ?>
                <div
                    class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 md:p-8 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 animate-fadeInUp delay-300">
                    <div class="flex items-center gap-3 mb-5">
                        <div
                            class="w-10 h-10 rounded-xl bg-gradient-to-br from-cyan-500 to-sky-500 text-white flex items-center justify-center shadow-lg shadow-sky-200">
                            <i data-lucide="file-text" class="w-5 h-5"></i>
                        </div>
                        <h2 class="text-xl font-bold text-slate-800">Additional Information</h2>
                    </div>
                    <p class="text-slate-600 leading-relaxed">
                        <?= nl2br(htmlspecialchars($event->getAdditionalInfo())) ?>
                    </p>
                </div>
                <?php endif; ?>

            </div>

            <!-- RIGHT: Sidebar – Event Details Card -->
            <div class="lg:col-span-1 space-y-6">

                <div
                    class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 md:p-8 sticky top-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 animate-fadeInUp delay-300">
                    <div class="flex items-center gap-3 mb-6">
                        <div
                            class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-500 text-white flex items-center justify-center shadow-lg shadow-indigo-200">
                            <i data-lucide="calendar-days" class="w-5 h-5"></i>
                        </div>
                        <h2 class="text-xl font-bold text-slate-800">Event Details</h2>
                    </div>

                    <dl class="space-y-4 divide-y divide-slate-100/80">
                        <div class="flex justify-between items-center pt-3 first:pt-0">
                            <dt class="text-slate-500 text-sm flex items-center gap-1.5">
                                <i data-lucide="calendar" class="w-4 h-4 text-slate-400"></i> Date
                            </dt>
                            <dd class="font-semibold text-slate-800 text-sm">
                                <?= htmlspecialchars($event->getEventDate()) ?>
                            </dd>
                        </div>
                        <div class="flex justify-between items-center pt-3">
                            <dt class="text-slate-500 text-sm flex items-center gap-1.5">
                                <i data-lucide="clock" class="w-4 h-4 text-slate-400"></i> Time
                            </dt>
                            <dd class="font-semibold text-slate-800 text-sm">
                                <?= htmlspecialchars($event->getStartTime()) ?> –
                                <?= htmlspecialchars($event->getEndTime()) ?>
                            </dd>
                        </div>
                        <div class="flex justify-between items-center pt-3">
                            <dt class="text-slate-500 text-sm flex items-center gap-1.5">
                                <i data-lucide="map-pin" class="w-4 h-4 text-slate-400"></i> Venue
                            </dt>
                            <dd class="font-semibold text-slate-800 text-sm"><?= htmlspecialchars($event->getVenue()) ?>
                            </dd>
                        </div>
                        <div class="flex justify-between items-center pt-3">
                            <dt class="text-slate-500 text-sm flex items-center gap-1.5">
                                <i data-lucide="users" class="w-4 h-4 text-slate-400"></i> Capacity
                            </dt>
                            <dd class="font-semibold text-slate-800 text-sm">
                                <?= htmlspecialchars($event->getCapacity()) ?>
                                seats</dd>
                        </div>
                        <div class="flex justify-between items-center pt-3">
                            <dt class="text-slate-500 text-sm flex items-center gap-1.5">
                                <i data-lucide="clock-3" class="w-4 h-4 text-slate-400"></i> Deadline
                            </dt>
                            <dd class="font-semibold text-slate-800 text-sm">
                                <?= htmlspecialchars($event->getRegistrationDeadline()) ?></dd>
                        </div>
                        <div class="flex justify-between items-center pt-3">
                            <dt class="text-slate-500 text-sm flex items-center gap-1.5">
                                <i data-lucide="badge-check" class="w-4 h-4 text-slate-400"></i> Status
                            </dt>
                            <dd class="font-semibold text-emerald-600 text-sm flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                <?= ucfirst(htmlspecialchars($event->getStatus())) ?>
                            </dd>
                        </div>
                    </dl>

                    <!-- Registration count (if available) -->
                    <?php if (method_exists($event, 'getRegisteredCount')): ?>
                    <div class="mt-6 pt-4 border-t border-slate-100/80">
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-sm text-slate-500">Registered</span>
                            <span class="text-sm font-bold text-slate-800"><?= $event->getRegisteredCount() ?> /
                                <?= $event->getCapacity() ?></span>
                        </div>
                        <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full transition-all duration-1000"
                                style="width: <?= min(100, ($event->getRegisteredCount() / max(1, $event->getCapacity())) * 100) ?>%;">
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>

        <div id="feedback-form"
            class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 md:p-8 mt-6">


            <!-- Header -->
            <div class="flex items-center gap-3 mb-6">


                <div
                    class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 text-white flex items-center justify-center shadow-lg">

                    <i data-lucide="message-square" class="w-5 h-5"></i>

                </div>


                <div>

                    <h2 class="text-xl font-bold text-slate-800">
                        Event Feedback
                    </h2>

                    <p class="text-sm text-slate-500">
                        Share your experience about this event.
                    </p>

                </div>


            </div>






            <form method="POST" action="<?= BASE_URL ?>/events/<?= $event->getId() ?>/feedback" class="space-y-5">


                <!-- Rating -->

                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        How was your experience?

                    </label>



                    <div class="grid grid-cols-5 gap-3">


                        <label class="cursor-pointer">

                            <input type="radio" name="rating" value="1" class="hidden peer">


                            <div class="text-center py-3 rounded-xl border border-slate-200
                        peer-checked:bg-red-50
                        peer-checked:border-red-400
                        transition">

                                😞
                                <span class="block text-xs mt-1">
                                    Bad
                                </span>

                            </div>


                        </label>



                        <label class="cursor-pointer">

                            <input type="radio" name="rating" value="2" class="hidden peer">


                            <div class="text-center py-3 rounded-xl border border-slate-200
                        peer-checked:bg-orange-50
                        peer-checked:border-orange-400
                        transition">

                                🙁
                                <span class="block text-xs mt-1">
                                    Poor
                                </span>

                            </div>


                        </label>



                        <label class="cursor-pointer">

                            <input type="radio" name="rating" value="3" class="hidden peer">


                            <div class="text-center py-3 rounded-xl border border-slate-200
                        peer-checked:bg-yellow-50
                        peer-checked:border-yellow-400
                        transition">

                                😐
                                <span class="block text-xs mt-1">
                                    Average
                                </span>

                            </div>


                        </label>



                        <label class="cursor-pointer">

                            <input type="radio" name="rating" value="4" class="hidden peer">


                            <div class="text-center py-3 rounded-xl border border-slate-200
                        peer-checked:bg-blue-50
                        peer-checked:border-blue-400
                        transition">

                                🙂
                                <span class="block text-xs mt-1">
                                    Good
                                </span>

                            </div>


                        </label>



                        <label class="cursor-pointer">

                            <input type="radio" name="rating" value="5" class="hidden peer" checked>


                            <div class="text-center py-3 rounded-xl border border-slate-200
                        peer-checked:bg-purple-50
                        peer-checked:border-purple-500
                        transition">

                                🤩
                                <span class="block text-xs mt-1">
                                    Excellent
                                </span>

                            </div>


                        </label>


                    </div>


                </div>





                <!-- Comment -->

                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Comment

                    </label>



                    <textarea name="comment" rows="4" class="w-full rounded-xl border border-slate-200 
                px-4 py-3 text-sm
                focus:ring-2 focus:ring-purple-500
                focus:border-purple-500 outline-none transition"
                        placeholder="Tell us about your experience..."></textarea>


                </div>





                <!-- Submit -->

                <div class="flex justify-end">


                    <button type="submit" class="inline-flex items-center gap-2
                px-6 py-3
                bg-gradient-to-r from-purple-600 to-indigo-600
                hover:from-purple-700 hover:to-indigo-700
                text-white rounded-xl
                font-semibold text-sm
                shadow-lg shadow-purple-200
                transition hover:scale-[1.03]">


                        <i data-lucide="send" class="w-4 h-4"></i>

                        Submit Feedback


                    </button>


                </div>



            </form>



        </div>


    </div>


    <!-- ========================================================== -->
    <!-- REGISTRATION MODAL – Premium glass design                 -->
    <!-- ========================================================== -->
    <div id="registerModal" onclick="closeRegisterModal()"
        class="fixed inset-0 hidden modal-backdrop flex items-center justify-center z-50 px-4 transition-opacity duration-300"
        style="background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px);">
        <div onclick="event.stopPropagation()"
            class="glass-card-light rounded-2xl shadow-2xl border border-slate-100/60 w-full max-w-md p-6 animate-scaleIn max-h-[90vh] overflow-y-auto">

            <!-- Header -->
            <div class="flex items-center justify-between border-b border-slate-100 pb-3 mb-4">
                <div class="flex items-center gap-2">
                    <div
                        class="w-9 h-9 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center shadow-lg shadow-blue-200">
                        <i data-lucide="user-plus" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-lg font-bold text-slate-800">Register for Event</h2>
                </div>
                <button onclick="closeRegisterModal()"
                    class="text-slate-400 hover:text-slate-600 transition-colors hover:scale-110">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>

            <form method="POST" action="<?= BASE_URL ?>/events/<?= $event->getId() ?>/register" class="space-y-4">

                <!-- Student Information Card -->
                <div
                    class="bg-blue-50/70 backdrop-blur-sm border border-blue-100 rounded-xl p-4 grid grid-cols-2 gap-3">
                    <div class="col-span-2">
                        <label class="block text-[10px] font-bold text-blue-600 uppercase tracking-wider">Student
                            Information</label>
                    </div>
                    <div>
                        <label class="block text-[9px] font-bold text-slate-400 uppercase">Name</label>
                        <p class="text-sm font-semibold text-slate-700">
                            <?= htmlspecialchars($student->getName()) ?></p>
                    </div>
                    <div>
                        <label class="block text-[9px] font-bold text-slate-400 uppercase">Student ID</label>
                        <p class="text-sm font-semibold text-slate-700">
                            <?= htmlspecialchars($student->getStudentId()) ?></p>
                    </div>
                    <div>
                        <label class="block text-[9px] font-bold text-slate-400 uppercase">Email</label>
                        <p class="text-sm font-semibold text-slate-700 truncate">
                            <?= htmlspecialchars($student->getEmail()) ?></p>
                    </div>
                    <div>
                        <label class="block text-[9px] font-bold text-slate-400 uppercase">Phone</label>
                        <p class="text-sm font-semibold text-slate-700">
                            <?= htmlspecialchars($student->getPhone() ?? '-') ?></p>
                    </div>
                </div>

                <!-- Event (readonly) -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1 flex items-center gap-1.5">
                        <i data-lucide="calendar" class="w-4 h-4 text-blue-500"></i> Event
                    </label>
                    <input type="text" readonly value="<?= htmlspecialchars($event->getTitle()) ?>"
                        class="w-full bg-slate-50 text-sm px-4 py-2.5 rounded-xl border border-slate-200 text-slate-700 font-medium">
                </div>

                <!-- Academic + Department -->
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Year</label>
                        <input type="text" readonly value="<?= htmlspecialchars($academicYearName) ?>"
                            class="w-full bg-slate-50 text-sm px-4 py-2.5 rounded-xl border border-slate-200 text-slate-700">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1">Department</label>
                        <input type="text" readonly value="<?= htmlspecialchars($departmentName) ?>"
                            class="w-full bg-slate-50 text-sm px-4 py-2.5 rounded-xl border border-slate-200 text-slate-700">
                    </div>
                </div>

                <!-- Note -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Message (optional)</label>
                    <textarea name="note" rows="2" placeholder="Any special requests or questions..."
                        class="w-full text-sm p-4 rounded-xl border border-slate-200 resize-none focus:ring-2 focus:ring-blue-500 outline-none transition"></textarea>
                </div>

                <!-- Buttons -->
                <div class="flex gap-3 pt-2">
                    <button type="submit"
                        class="flex-1 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-sm font-semibold py-3 rounded-xl transition-all duration-300 hover:scale-[1.02] shadow-lg shadow-blue-200/50 btn-shine">
                        <i data-lucide="check" class="w-4 h-4 inline mr-1.5"></i>
                        Confirm Registration
                    </button>
                    <button type="button" onclick="closeRegisterModal()"
                        class="flex-1 border border-slate-200 text-slate-700 hover:bg-slate-50 text-sm font-semibold py-3 rounded-xl transition-all duration-300 hover:scale-[1.02]">
                        Cancel
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- ── Scripts ── -->
    <script>
    function openRegisterModal() {
        const modal = document.getElementById('registerModal');
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
        // Trigger reflow for animation
        void modal.offsetWidth;
    }

    function closeRegisterModal() {
        const modal = document.getElementById('registerModal');
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeRegisterModal();
    });

    // Lucide icons
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });

    // Intersection Observer for scroll animations
    document.addEventListener('DOMContentLoaded', function() {
        const animated = document.querySelectorAll('.animate-fadeInUp, .animate-scaleIn');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        animated.forEach(el => {
            if (!el.classList.contains('back-btn') && !el.classList.contains('float-pulse')) {
                el.style.opacity = '0';
                observer.observe(el);
            }
        });
    });
    </script>