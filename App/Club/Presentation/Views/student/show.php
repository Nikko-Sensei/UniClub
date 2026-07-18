<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UniClub · Club Detail</title>

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

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
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

    @keyframes shimmer {
        0% {
            background-position: -200% 0;
        }

        100% {
            background-position: 200% 0;
        }
    }

    @keyframes borderGlow {

        0%,
        100% {
            border-color: rgba(59, 130, 246, 0.1);
        }

        50% {
            border-color: rgba(59, 130, 246, 0.3);
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

    /* ── Animation Classes ── */
    .animate-fadeInUp {
        animation: fadeInUp 0.6s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    .animate-fadeInDown {
        animation: fadeInDown 0.6s cubic-bezier(0.22, 1, 0.36, 1) forwards;
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

    .animate-borderGlow {
        animation: borderGlow 3s ease-in-out infinite;
    }

    .animate-slideInLeft {
        animation: slideInLeft 0.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
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

    .delay-700 {
        animation-delay: 700ms;
    }

    .delay-800 {
        animation-delay: 800ms;
    }

    /* ── Glassmorphism ── */
    .glass-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .glass-card-light {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
    }

    .glass-card-light:hover {
        border-color: rgba(37, 99, 235, 0.2);
        box-shadow: 0 12px 40px rgba(37, 99, 235, 0.08);
    }

    /* ── Button Shine Effect ── */
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

    /* ── Back Button Animation ── */
    .back-btn {
        transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .back-btn:hover {
        transform: translateX(-4px) scale(1.05);
        box-shadow: 0 8px 30px -8px rgba(37, 99, 235, 0.3);
    }

    .back-btn:active {
        transform: scale(0.95);
    }

    /* ── Card Hover Effects ── */
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

    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* ── Focus States ── */
    *:focus-visible {
        outline: 2px solid #2563EB;
        outline-offset: 2px;
        border-radius: 4px;
    }

    /* ── Background Mesh ── */
    .bg-mesh {
        background: radial-gradient(circle at 20% 50%, rgba(37, 99, 235, 0.05) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(99, 102, 241, 0.05) 0%, transparent 50%),
            #F8FAFC;
    }

    /* ── Responsive Tweaks ── */
    @media (max-width: 768px) {
        .hero-content {
            padding: 1.5rem;
        }

        .back-btn {
            padding: 0.5rem 0.75rem;
            font-size: 0.8rem;
        }
    }
    </style>
</head>

<body>

    <!-- ════════════════════════════════════════════════════════════════ -->
    <!--  MAIN CONTENT – Best UI/UX Club Detail Page                   -->
    <!-- ════════════════════════════════════════════════════════════════ -->

    <main class="max-w-7xl mx-auto px-4 lg:px-6 py-8 bg-mesh min-h-screen">


        <div class="animate-slideInLeft mb-4">
            <a href="<?= BASE_URL ?>/clubs"
                class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
                <i data-lucide="arrow-left"
                    class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
                <span>Back to Clubs</span>
            </a>
        </div>
        <!-- ========================================================== -->
        <!-- HERO – Immersive Glass Card with Staggered Animations      -->
        <!-- ========================================================== -->

        <section class="relative rounded-3xl overflow-hidden h-[480px] shadow-2xl group">

            <!-- Background image / gradient -->
            <?php if ($club->getBanner()): ?>
            <img src="<?= BASE_URL ?>/uploads/clubs/<?= $club->getBanner() ?>"
                class="absolute inset-0 w-full h-full object-cover img-zoom">
            <?php else: ?>
            <div class="absolute inset-0 bg-gradient-to-br from-slate-800 via-slate-900 to-blue-900"></div>
            <?php endif; ?>

            <!-- Overlay with glass effect and pattern -->
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-800/50 to-transparent"></div>
            <div class="absolute inset-0 opacity-10"
                style="background-image: radial-gradient(circle at 20% 50%, rgba(255,255,255,0.15) 1px, transparent 1px); background-size: 24px 24px;">
            </div>

            <!-- Decorative glow orbs -->
            <div class="absolute top-10 right-20 w-32 h-32 rounded-full bg-blue-500/20 blur-3xl animate-pulseGlow">
            </div>
            <div class="absolute bottom-20 left-10 w-48 h-48 rounded-full bg-indigo-500/20 blur-3xl animate-pulseGlow"
                style="animation-delay: 1.5s;"></div>

            <!-- Content container – floating glass card -->
            <div class="absolute bottom-0 left-0 right-0 p-8 lg:p-12">
                <div
                    class="glass-card rounded-2xl p-6 lg:p-8 max-w-4xl shadow-2xl animate-float border border-white/20">
                    <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">

                        <div>
                            <!-- Category badge -->
                            <span
                                class="inline-flex items-center rounded-full bg-blue-600/80 backdrop-blur-md px-4 py-1.5 text-xs font-semibold text-white shadow-lg opacity-0 animate-fadeInUp delay-100">
                                <?= htmlspecialchars($club->getCategoryName()) ?>
                            </span>

                            <!-- Club Name -->
                            <h1
                                class="mt-4 text-4xl lg:text-6xl font-extrabold text-white drop-shadow-lg opacity-0 animate-fadeInUp delay-200">
                                <?= htmlspecialchars($club->getName()) ?>
                            </h1>

                            <!-- Description -->
                            <p
                                class="mt-3 max-w-2xl text-blue-100/90 text-lg leading-relaxed opacity-0 animate-fadeInUp delay-300">
                                <?= htmlspecialchars($club->getDescription()) ?>
                            </p>

                            <!-- Stats -->
                            <div
                                class="flex flex-wrap items-center gap-6 mt-6 text-white/90 text-sm opacity-0 animate-fadeInUp delay-400">
                                <div
                                    class="flex items-center gap-2 bg-white/10 backdrop-blur-sm px-3 py-1.5 rounded-full border border-white/10">
                                    <i data-lucide="users" class="w-4 h-4 text-blue-300"></i>
                                    <span><?= $club->getMemberCount() ?> Members</span>
                                </div>
                                <div
                                    class="flex items-center gap-2 bg-white/10 backdrop-blur-sm px-3 py-1.5 rounded-full border border-white/10">
                                    <i data-lucide="calendar" class="w-4 h-4 text-blue-300"></i>
                                    <span>Active since <?= date('Y', strtotime($club->getCreatedAt())) ?></span>
                                </div>
                                <div
                                    class="flex items-center gap-2 bg-white/10 backdrop-blur-sm px-3 py-1.5 rounded-full border border-white/10">
                                    <i data-lucide="award" class="w-4 h-4 text-blue-300"></i>
                                    <span>Verified Club</span>
                                </div>
                            </div>
                        </div>

                        <!-- Join button -->
                        <div class="flex-shrink-0 opacity-0 animate-fadeInUp delay-500">
                            <?php if (isset($_SESSION['user'])): ?>
                            <?php if ($membershipStatus === 'approved'): ?>
                            <button disabled
                                class="w-full bg-emerald-100 text-emerald-700 py-3 px-8 rounded-xl font-semibold text-sm shadow-md cursor-not-allowed flex items-center justify-center gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4"></i> Joined Member
                            </button>
                            <?php elseif ($membershipStatus === 'pending'): ?>
                            <button disabled
                                class="w-full bg-yellow-100 text-yellow-700 py-3 px-8 rounded-xl font-semibold text-sm shadow-md cursor-not-allowed flex items-center justify-center gap-2">
                                <i data-lucide="clock" class="w-4 h-4"></i> Waiting Approval
                            </button>
                            <?php else: ?>
                            <form method="POST" action="<?= BASE_URL ?>/clubs/<?= $club->getId() ?>/join"
                                class="w-full">
                                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                                <button type="submit"
                                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-3 px-8 rounded-xl font-semibold text-sm transition-all duration-300 hover:scale-105 hover:shadow-xl shadow-lg shadow-blue-600/30 btn-shine flex items-center justify-center gap-2">
                                    <i data-lucide="user-plus" class="w-4 h-4"></i> Join Club
                                </button>
                            </form>
                            <?php endif; ?>
                            <?php else: ?>
                            <a href="<?= BASE_URL ?>/login"
                                class="block w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-center py-3 px-8 rounded-xl font-semibold text-sm transition-all duration-300 hover:scale-105 shadow-lg shadow-blue-600/30 flex items-center justify-center gap-2">
                                <i data-lucide="log-in" class="w-4 h-4"></i> Login to Join
                            </a>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>

        </section>

        <!-- ========================================================== -->
        <!-- CONTENT – About + Sidebar (Premium Grid)                   -->
        <!-- ========================================================== -->

        <section class="grid lg:grid-cols-3 gap-8 mt-10">

            <!-- LEFT - About -->
            <div class="lg:col-span-2 space-y-6">

                <div
                    class="glass-card-light rounded-2xl shadow-xl border border-slate-100/60 p-8 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 animate-fadeInUp">
                    <div class="flex items-center gap-3 mb-6">
                        <div
                            class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 text-white flex items-center justify-center shadow-lg shadow-blue-200">
                            <i data-lucide="info" class="w-5 h-5"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-800">About Club</h2>
                    </div>
                    <div class="prose prose-slate max-w-none">
                        <p class="leading-8 text-slate-600 text-base">
                            <?= nl2br(htmlspecialchars($club->getDescription())) ?>
                        </p>
                    </div>
                </div>

                <!-- Quick Stats Row -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div
                        class="glass-card-light rounded-xl p-4 text-center transition-all hover:shadow-lg animate-fadeInUp delay-100">
                        <div class="text-2xl font-bold text-blue-600"><?= $club->getMemberCount() ?></div>
                        <div class="text-xs text-slate-500 font-medium">Total Members</div>
                    </div>
                    <div
                        class="glass-card-light rounded-xl p-4 text-center transition-all hover:shadow-lg animate-fadeInUp delay-200">
                        <div class="text-2xl font-bold text-blue-600"><?= date('Y', strtotime($club->getCreatedAt())) ?>
                        </div>
                        <div class="text-xs text-slate-500 font-medium">Founded</div>
                    </div>
                    <div
                        class="glass-card-light rounded-xl p-4 text-center transition-all hover:shadow-lg animate-fadeInUp delay-300">
                        <div class="text-2xl font-bold text-blue-600"><?= count($leadership) ?></div>
                        <div class="text-xs text-slate-500 font-medium">Leaders</div>
                    </div>
                    <div
                        class="glass-card-light rounded-xl p-4 text-center transition-all hover:shadow-lg animate-fadeInUp delay-400">
                        <div class="text-2xl font-bold text-blue-600"><?= count($events) ?></div>
                        <div class="text-xs text-slate-500 font-medium">Events</div>
                    </div>
                </div>

            </div>

            <!-- RIGHT - Info Sidebar (Sticky) -->
            <div>

                <div
                    class="glass-card-light rounded-2xl shadow-xl border border-slate-100/60 p-6 sticky top-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 animate-fadeInUp delay-100">

                    <h2 class="text-lg font-bold text-slate-800 mb-5 flex items-center gap-2">
                        <span class="text-blue-600">ℹ️</span> Club Information
                    </h2>

                    <div class="space-y-4 divide-y divide-slate-100">

                        <div class="flex justify-between items-center pt-3 first:pt-0">
                            <span class="text-slate-500 text-sm flex items-center gap-2">
                                <i data-lucide="tag" class="w-4 h-4 text-slate-400"></i> Category
                            </span>
                            <span
                                class="font-semibold text-slate-800"><?= htmlspecialchars($club->getCategoryName()) ?></span>
                        </div>

                        <div class="flex justify-between items-center pt-3">
                            <span class="text-slate-500 text-sm flex items-center gap-2">
                                <i data-lucide="users" class="w-4 h-4 text-slate-400"></i> Members
                            </span>
                            <span class="font-semibold text-slate-800"><?= $club->getMemberCount() ?></span>
                        </div>

                        <div class="flex justify-between items-center pt-3">
                            <span class="text-slate-500 text-sm flex items-center gap-2">
                                <i data-lucide="calendar" class="w-4 h-4 text-slate-400"></i> Created
                            </span>
                            <span
                                class="font-semibold text-slate-800"><?= date('F Y', strtotime($club->getCreatedAt())) ?></span>
                        </div>

                        <div class="flex justify-between items-center pt-3">
                            <span class="text-slate-500 text-sm flex items-center gap-2">
                                <i data-lucide="shield-check" class="w-4 h-4 text-slate-400"></i> Status
                            </span>
                            <span
                                class="inline-flex items-center gap-1.5 bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                Active
                            </span>
                        </div>

                        <div class="flex justify-between items-center pt-3">
                            <span class="text-slate-500 text-sm flex items-center gap-2">
                                <i data-lucide="award" class="w-4 h-4 text-slate-400"></i> Verification
                            </span>
                            <span
                                class="inline-flex items-center gap-1.5 bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                                <i data-lucide="badge-check" class="w-3 h-3"></i> Verified
                            </span>
                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- ========================================================== -->
        <!-- MISSION & VISION (Premium Split Layout)                    -->
        <!-- ========================================================== -->

        <section class="grid md:grid-cols-2 gap-6 mt-10">

            <!-- Mission -->
            <div
                class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-8 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-blue-200/50 animate-fadeInUp delay-200">

                <div class="flex items-center gap-4 mb-5">
                    <div
                        class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 text-white flex items-center justify-center shadow-lg shadow-blue-200">
                        🎯
                    </div>
                    <h2 class="text-2xl font-bold text-slate-800">Our Mission</h2>
                </div>

                <p class="text-slate-600 leading-7">
                    <?= nl2br(htmlspecialchars($club->getMission())) ?>
                </p>

            </div>

            <!-- Vision -->
            <div
                class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-8 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-blue-200/50 animate-fadeInUp delay-300">

                <div class="flex items-center gap-4 mb-5">
                    <div
                        class="w-12 h-12 rounded-2xl bg-gradient-to-br from-cyan-500 to-sky-500 text-white flex items-center justify-center shadow-lg shadow-sky-200">
                        🔭
                    </div>
                    <h2 class="text-2xl font-bold text-slate-800">Our Vision</h2>
                </div>

                <p class="text-slate-600 leading-7">
                    <?= nl2br(htmlspecialchars($club->getVision())) ?>
                </p>

            </div>

        </section>

        <!-- ========================================================== -->
        <!-- LEADERSHIP (Grid with Staggered Animations)                -->
        <!-- ========================================================== -->

        <section class="mt-12">

            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-slate-800 flex items-center gap-3">
                    <span class="text-blue-600">👥</span> Leadership Team
                </h2>
                <span class="text-sm text-slate-500 bg-white/80 px-3 py-1 rounded-full shadow-sm">
                    <?= count($leadership) ?> members
                </span>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                <?php foreach ($leadership as $index => $leader): ?>

                <div class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 text-center transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 hover:border-blue-200/50 animate-scaleIn"
                    style="animation-delay: <?= $index * 100 + 400 ?>ms;">

                    <!-- Avatar -->
                    <?php if (!empty($leader['profile_image'])): ?>
                    <img src="<?= BASE_URL ?>/uploads/users/<?= $leader['profile_image'] ?>"
                        class="w-24 h-24 rounded-full object-cover mx-auto mb-4 ring-2 ring-blue-100 transition group-hover:ring-blue-300">
                    <?php else: ?>
                    <div
                        class="w-24 h-24 rounded-full bg-gradient-to-br from-blue-100 to-blue-200 text-blue-700 flex items-center justify-center mx-auto mb-4 text-3xl font-bold ring-2 ring-blue-100 transition group-hover:ring-blue-300">
                        <?= strtoupper(substr($leader['name'], 0, 1)) ?>
                    </div>
                    <?php endif; ?>

                    <h3 class="font-bold text-slate-800 text-lg">
                        <?= htmlspecialchars($leader['name']) ?>
                    </h3>

                    <p class="text-sm text-blue-600 mt-1 inline-block bg-blue-50 px-3 py-0.5 rounded-full font-medium">
                        <?= htmlspecialchars($leader['role']) ?>
                    </p>

                </div>

                <?php endforeach; ?>

            </div>

        </section>

        <!-- ========================================================== -->
        <!-- UPCOMING EVENTS (Premium Cards)                            -->
        <!-- ========================================================== -->

        <section class="mt-12">

            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-slate-800 flex items-center gap-3">
                        <span class="text-blue-600">📅</span> Upcoming Events
                    </h2>
                    <p class="text-sm text-slate-500 mt-1">Join our latest activities and events</p>
                </div>
                <a href="<?= BASE_URL ?>/events"
                    class="text-sm font-semibold text-blue-600 hover:text-blue-700 flex items-center gap-1 group bg-white/80 px-4 py-2 rounded-full shadow-sm transition-all hover:shadow-md">
                    View All
                    <span class="transition-transform group-hover:translate-x-1">→</span>
                </a>
            </div>

            <?php if (empty($events)): ?>

            <!-- Empty State -->
            <div
                class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-12 text-center animate-fadeInUp delay-500">

                <div class="w-20 h-20 mx-auto rounded-full bg-blue-100 flex items-center justify-center text-3xl">
                    🎉
                </div>

                <h3 class="mt-4 font-bold text-xl text-slate-800">No Upcoming Events</h3>
                <p class="text-slate-500 text-sm mt-2 max-w-sm mx-auto">This club has no scheduled events yet. Check
                    back later or suggest an event!</p>

            </div>

            <?php else: ?>

            <!-- Event Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <?php foreach ($events as $index => $event): ?>

                <div class="glass-card-light rounded-2xl overflow-hidden border border-slate-100/60 shadow-xl transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 hover:border-blue-200/50 group animate-scaleIn"
                    style="animation-delay: <?= $index * 100 + 600 ?>ms;">

                    <!-- Event Image -->
                    <div class="relative h-48 bg-slate-100 overflow-hidden">

                        <?php if (!empty($event['banner'])): ?>
                        <img src="<?= BASE_URL ?>/uploads/events/<?= $event['banner'] ?>"
                            class="w-full h-full object-cover img-zoom">
                        <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center text-slate-300 text-5xl">
                            📅
                        </div>
                        <?php endif; ?>

                        <!-- Date Badge -->
                        <div
                            class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-blue-600 shadow flex items-center gap-1.5">
                            <i data-lucide="calendar" class="w-3 h-3"></i>
                            <?= date('d M Y', strtotime($event['event_date'])) ?>
                        </div>

                        <!-- Time Badge -->
                        <?php if (!empty($event['event_time'])): ?>
                        <div
                            class="absolute bottom-3 left-3 bg-black/60 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs font-medium shadow flex items-center gap-1.5">
                            <i data-lucide="clock" class="w-3 h-3"></i>
                            <?= date('h:i A', strtotime($event['event_time'])) ?>
                        </div>
                        <?php endif; ?>

                    </div>

                    <!-- Content -->
                    <div class="p-5">

                        <h3 class="font-bold text-lg text-slate-800 line-clamp-1">
                            <?= htmlspecialchars($event['title']) ?>
                        </h3>

                        <p class="text-sm text-slate-600 mt-2 line-clamp-2">
                            <?= htmlspecialchars($event['description']) ?>
                        </p>

                        <div class="mt-4 flex items-center justify-between">

                            <span class="text-xs text-slate-500 flex items-center gap-1">
                                <i data-lucide="map-pin" class="w-3 h-3"></i> <?= htmlspecialchars($event['venue']) ?>
                            </span>
                            <!-- 
                            <a href="<?= BASE_URL ?>/events/<?= $event['id'] ?>"
                                class="text-sm font-semibold text-blue-600 hover:text-blue-700 flex items-center gap-1 group-hover:gap-2 transition-all">
                                View Details
                                <i data-lucide="arrow-right"
                                    class="w-3 h-3 transition-transform group-hover:translate-x-0.5"></i>
                            </a> -->

                        </div>

                    </div>

                </div>

                <?php endforeach; ?>

            </div>

            <?php endif; ?>

        </section>

    </main>

    <!-- ════════════════════════════════════════════════════════════════ -->
    <!--  LUCIDE ICONS INIT                                             -->
    <!-- ════════════════════════════════════════════════════════════════ -->

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // ── Lucide Icons ──
        lucide.createIcons();

        // ── Intersection Observer for cards on scroll ──
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
                observer.observe(el);
            }
        });

        console.log('🚀 UniClub · Best UI/UX club detail page ready!');
    });
    </script>

</body>

</html>