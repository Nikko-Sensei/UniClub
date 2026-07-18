<?php

$priority = $announcement->getPriority();

$priorityStyle = match ($priority) {

    'high' => [
        'bg' => 'bg-red-50',
        'text' => 'text-red-600',
        'icon' => 'triangle-alert',
        'label' => 'Important'
    ],

    'medium' => [
        'bg' => 'bg-amber-50',
        'text' => 'text-amber-600',
        'icon' => 'megaphone',
        'label' => 'Update'
    ],

    default => [
        'bg' => 'bg-blue-50',
        'text' => 'text-blue-600',
        'icon' => 'info',
        'label' => 'Notice'
    ]

};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($announcement->getTitle()) ?> · UniClub</title>

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

    /* ── Animations ── */
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

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-6px);
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
        animation: fadeInUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) forwards;
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

    /* ── Glassmorphism ── */
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
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
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

    /* ── Background Mesh ── */
    .bg-mesh {
        background: radial-gradient(circle at 20% 30%, rgba(37, 99, 235, 0.04) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(99, 102, 241, 0.04) 0%, transparent 50%),
            #F8FAFC;
    }

    /* ── Focus States ── */
    *:focus-visible {
        outline: 2px solid #2563EB;
        outline-offset: 2px;
        border-radius: 4px;
    }

    /* ── Typography ── */
    .prose-custom {
        font-size: 1.05rem;
        line-height: 1.8;
        color: #334155;
    }

    .prose-custom p:not(:last-child) {
        margin-bottom: 1.5rem;
    }

    .prose-custom strong {
        color: #0f172a;
        font-weight: 600;
    }

    .prose-custom a {
        color: #2563eb;
        text-decoration: underline;
        text-underline-offset: 2px;
        transition: color 0.2s;
    }

    .prose-custom a:hover {
        color: #1d4ed8;
    }
    </style>
</head>

<body>

    <div class="max-w-7xl mx-auto px-4 md:px-6 py-8 w-full bg-mesh min-h-screen">

        <!-- ========================================================== -->
        <!-- BACK BUTTON – Glass with slide-in                         -->
        <!-- ========================================================== -->
        <div class="animate-slideInLeft mb-5">
            <a href="<?= BASE_URL ?>/announcements"
                class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
                <i data-lucide="arrow-left"
                    class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
                <span>All Announcements</span>
            </a>
        </div>

        <!-- ========================================================== -->
        <!-- HERO – Floating header with title, meta, priority         -->
        <!-- ========================================================== -->
        <div class="relative rounded-2xl overflow-hidden shadow-xl mb-8 animate-fadeInUp" style="min-height: 180px;">
            <!-- Decorative gradient background -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-600 opacity-10"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-white/80 via-transparent to-transparent"></div>
            <!-- Glow orbs -->
            <div class="absolute top-10 right-20 w-48 h-48 rounded-full bg-blue-500/20 blur-3xl animate-pulseGlow">
            </div>
            <div class="absolute bottom-10 left-10 w-56 h-56 rounded-full bg-indigo-500/20 blur-3xl animate-pulseGlow"
                style="animation-delay: 1.5s;"></div>

            <div class="relative p-6 md:p-10 lg:p-12">
                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-6">
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-blue-600 mb-2 flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-600 animate-pulse"></span>
                            University Announcement
                        </p>
                        <h1
                            class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-slate-800 leading-tight drop-shadow-sm">
                            <?= htmlspecialchars($announcement->getTitle()) ?>
                        </h1>
                        <div class="flex flex-wrap items-center gap-3 mt-4">
                            <span
                                class="inline-flex items-center gap-2 text-sm text-slate-500 bg-white/80 backdrop-blur-sm px-3 py-1 rounded-full shadow-sm border border-white/30">
                                <i data-lucide="calendar-days" class="w-4 h-4 text-blue-500"></i>
                                <?= date('M d, Y', strtotime($announcement->getCreatedAt())) ?>
                            </span>
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold border <?= $priorityStyle['bg'] ?> <?= $priorityStyle['text'] ?> shadow-sm">
                                <i data-lucide="<?= $priorityStyle['icon'] ?>" class="w-3.5 h-3.5"></i>
                                <?= $priorityStyle['label'] ?>
                            </span>
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/50 shadow-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                <?= ucfirst(htmlspecialchars($announcement->getStatus())) ?>
                            </span>
                        </div>
                    </div>

                    <!-- Quick share action (optional) -->
                    <div class="flex-shrink-0 self-start mt-2 md:mt-0">
                        <!-- share button removed as it was empty -->
                    </div>
                </div>
            </div>
        </div>
        <!-- ====== END HERO ====== -->

        <!-- ========================================================== -->
        <!-- MAIN LAYOUT – 3‑column grid with enhanced sidebar         -->
        <!-- ========================================================== -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

            <!-- CONTENT (takes 3 cols on large) -->
            <div class="lg:col-span-3 space-y-6">

                <!-- Main Content Card -->
                <div
                    class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 animate-fadeInUp delay-100">

                    <!-- Content header with icon and reading time -->
                    <div
                        class="px-6 py-4 border-b border-slate-100/80 flex items-center justify-between flex-wrap gap-3 bg-gradient-to-r from-blue-50/30 to-transparent">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-blue-100 flex items-center justify-center shadow-sm">
                                <i data-lucide="file-text" class="w-5 h-5 text-blue-600"></i>
                            </div>
                            <div>
                                <h2 class="font-bold text-slate-800">Announcement Details</h2>
                                <p class="text-xs text-slate-400">Latest university information</p>
                            </div>
                        </div>
                        <!-- Estimated reading time (optional) -->
                        <?php $wordCount = str_word_count(strip_tags($announcement->getContent())); $readTime = max(1, round($wordCount / 200)); ?>
                        <span
                            class="text-xs text-slate-400 bg-white/80 px-3 py-1 rounded-full shadow-sm flex items-center gap-1">
                            <i data-lucide="clock" class="w-3.5 h-3.5"></i>
                            <?= $readTime ?> min read
                        </span>
                    </div>

                    <!-- Message content with improved typography -->
                    <div class="p-6 md:p-8 lg:p-10">
                        <div class="prose-custom">
                            <?= nl2br(htmlspecialchars($announcement->getContent())) ?>
                        </div>
                    </div>
                </div>

                <!-- Bottom navigation (back to list) -->


            </div>

            <!-- SIDEBAR – Enhanced with quick actions and related -->
            <div class="lg:col-span-1 space-y-5">

                <!-- Information Card -->
                <div
                    class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-5 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 animate-fadeInUp delay-200">
                    <h3 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                        <i data-lucide="info" class="w-4 h-4 text-blue-600"></i>
                        Announcement Info
                    </h3>
                    <div class="space-y-4 divide-y divide-slate-100/80">
                        <!-- Status -->
                        <div class="pt-3 first:pt-0">
                            <p class="text-xs text-slate-400 uppercase tracking-wider">Status</p>
                            <p class="mt-1 text-sm font-semibold text-emerald-600 flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                <?= ucfirst(htmlspecialchars($announcement->getStatus())) ?>
                            </p>
                        </div>
                        <!-- Published -->
                        <div class="pt-3">
                            <p class="text-xs text-slate-400 uppercase tracking-wider">Published</p>
                            <p class="mt-1 text-sm font-semibold text-slate-700">
                                <?= date('M d, Y \a\t g:i A', strtotime($announcement->getCreatedAt())) ?>
                            </p>
                        </div>
                        <!-- Priority -->
                        <div class="pt-3">
                            <p class="text-xs text-slate-400 uppercase tracking-wider">Priority</p>
                            <span
                                class="mt-1 inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold border <?= $priorityStyle['bg'] ?> <?= $priorityStyle['text'] ?>">
                                <i data-lucide="<?= $priorityStyle['icon'] ?>" class="w-3.5 h-3.5"></i>
                                <?= $priorityStyle['label'] ?>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Quick Action / Callout -->
                <div
                    class="glass-card-dark rounded-2xl p-5 text-white transition-all duration-300 hover:shadow-2xl hover:scale-[1.01] animate-fadeInUp delay-300">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center backdrop-blur-sm">
                            <i data-lucide="bell" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <p class="font-bold">Stay Updated</p>
                            <p class="text-xs text-white/70">Check announcements regularly</p>
                        </div>
                    </div>
                    <div class="mt-3 pt-3 border-t border-white/10">
                        <a href="<?= BASE_URL ?>/announcements"
                            class="inline-flex items-center gap-2 text-xs font-medium text-white/80 hover:text-white transition-colors">
                            View all announcements
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </a>
                    </div>
                </div>

                <!-- Additional suggestion (if any) -->
                <div
                    class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-4 text-center transition-all hover:shadow-md animate-fadeInUp delay-400">
                    <p class="text-xs text-slate-400">Need help?</p>
                    <a href="#" class="text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">
                        Contact Support →
                    </a>
                </div>

            </div>

        </div>

    </div>

    <!-- ── Scripts ── -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lucide icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        // Intersection Observer for scroll animations
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
            if (!el.classList.contains('back-btn')) {
                el.style.opacity = '0';
                observer.observe(el);
            }
        });

        // Print support
        console.log('📢 UniClub Announcement Detail ready!');
    });
    </script>

</body>

</html>