<?php

$priorityFilter = $_GET['priority'] ?? '';

?>

<div class="max-w-7xl mx-auto px-4 md:px-6 py-8 w-full bg-mesh min-h-screen">

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

    .glass-card-light-active {
        background: rgba(37, 99, 235, 0.08);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(37, 99, 235, 0.2);
        box-shadow: 0 8px 32px rgba(37, 99, 235, 0.08);
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

    .bg-mesh {
        background: radial-gradient(circle at 20% 30%, rgba(37, 99, 235, 0.04) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(99, 102, 241, 0.04) 0%, transparent 50%),
            #F8FAFC;
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
    </style>

    <!-- ========================================================== -->
    <!-- BACK BUTTON                                                -->
    <!-- ========================================================== -->
    <!-- <div class="animate-slideInLeft mb-4">
        <a href="javascript:history.back()"
            class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
            <span>Back</span>
        </a>
    </div> -->

    <!-- ========================================================== -->
    <!-- HEADER                                                     -->
    <!-- ========================================================== -->
    <div class="mb-8 animate-fadeInUp">
        <div class="flex items-center gap-3">
            <div
                class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center shadow-lg shadow-blue-200">
                <i data-lucide="megaphone" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-sm font-semibold text-blue-600">University Updates</p>
                <h1 class="text-3xl md:text-4xl font-bold text-slate-800">Announcements</h1>
            </div>
        </div>
        <p class="text-slate-500 mt-2 ml-15">Stay informed about university and club activities.</p>
    </div>

    <!-- ========================================================== -->
    <!-- MAIN LAYOUT – Filter + List                                -->
    <!-- ========================================================== -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

        <!-- LEFT FILTER (glass) -->
        <div class="lg:col-span-1 animate-fadeInUp delay-100">
            <div
                class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-5 sticky top-20 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

                <h3 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                    <i data-lucide="filter" class="w-4 h-4 text-blue-600"></i>
                    Filter
                </h3>

                <!-- Search -->
                <form method="GET" class="mb-5">
                    <div class="relative">
                        <i data-lucide="search" class="absolute left-3 top-3 w-4 h-4 text-slate-400"></i>
                        <input type="text" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                            placeholder="Search..."
                            class="w-full pl-10 pr-3 py-2.5 rounded-xl border border-slate-200/80 bg-white/50 text-sm placeholder:text-slate-400 focus:border-blue-400 focus:ring-4 focus:ring-blue-100/60 focus:bg-white outline-none transition-all duration-300 shadow-sm focus:shadow-lg hover:border-blue-200">
                    </div>
                </form>

                <!-- Priority Filter -->
                <p class="text-xs uppercase font-semibold text-slate-400 mb-3 tracking-wider">Priority</p>

                <div class="space-y-2">
                    <?php
                    $filters = [
                        '' => ['label' => 'All Announcements', 'icon' => 'bell'],
                        'high' => ['label' => 'Important', 'icon' => 'flame'],
                        'medium' => ['label' => 'Updates', 'icon' => 'megaphone'],
                        'low' => ['label' => 'Notices', 'icon' => 'info']
                    ];

                    foreach ($filters as $key => $filter):
                        $active = $priorityFilter == $key;
                    ?>
                    <a href="?priority=<?= $key ?>" class="
                        flex items-center gap-3 px-4 py-3 rounded-xl text-sm transition-all duration-300
                        <?= $active 
                            ? 'glass-card-light-active text-blue-600 font-semibold shadow-sm' 
                            : 'text-slate-600 hover:bg-slate-50/70 hover:shadow-sm' 
                        ?>
                        group
                    ">
                        <i data-lucide="<?= $filter['icon'] ?>"
                            class="w-4 h-4 <?= $active ? 'text-blue-600' : 'text-slate-400 group-hover:text-blue-500' ?>"></i>
                        <?= $filter['label'] ?>
                        <?php if ($active): ?>
                        <span class="ml-auto w-1.5 h-1.5 rounded-full bg-blue-600 animate-pulse"></span>
                        <?php endif; ?>
                    </a>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>

        <!-- RIGHT DATA -->
        <div class="lg:col-span-3">

            <div class="flex items-center justify-between mb-4 animate-fadeInUp delay-200">
                <h2 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                    <span class="text-blue-600">📢</span> Latest Announcements
                </h2>
                <span class="text-sm text-slate-500 bg-white/80 px-3 py-1 rounded-full shadow-sm">
                    <?= count($announcements) ?> results
                </span>
            </div>

            <div class="space-y-4">

                <?php if (empty($announcements)): ?>

                <!-- Empty State -->
                <div
                    class="glass-card-light rounded-2xl border border-dashed border-slate-300 px-6 py-16 text-center animate-fadeInUp delay-300">
                    <div
                        class="w-20 h-20 mx-auto bg-gradient-to-br from-blue-50 to-blue-100 text-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-100">
                        <i data-lucide="bell-off" class="w-10 h-10"></i>
                    </div>
                    <h3 class="mt-5 text-xl font-bold text-slate-800">No announcements found</h3>
                    <p class="text-sm text-slate-500 mt-2 max-w-md mx-auto">Try adjusting your search or filter.</p>
                </div>

                <?php else: ?>

                <?php foreach ($announcements as $index => $announcement): ?>

                <?php
                $priority = $announcement->getPriority();
                $priorityStyle = match($priority) {
                    'high' => ['class' => 'bg-red-50 text-red-600 border-red-200/50', 'icon' => 'flame', 'text' => 'Important'],
                    'medium' => ['class' => 'bg-amber-50 text-amber-600 border-amber-200/50', 'icon' => 'megaphone', 'text' => 'Update'],
                    default => ['class' => 'bg-blue-50 text-blue-600 border-blue-200/50', 'icon' => 'info', 'text' => 'Notice']
                };
                ?>

                <!-- Announcement Card -->
                <a href="<?= BASE_URL ?>/announcements/<?= $announcement->getId() ?>"
                    class="block glass-card-light rounded-2xl border border-slate-100/60 shadow-md p-5 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-blue-200/50 group animate-scaleIn"
                    style="animation-delay: <?= $index * 100 + 300 ?>ms;">

                    <div class="flex justify-between gap-4">
                        <div class="flex-1">
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold border <?= $priorityStyle['class'] ?>">
                                <i data-lucide="<?= $priorityStyle['icon'] ?>" class="w-3.5 h-3.5"></i>
                                <?= $priorityStyle['text'] ?>
                            </span>

                            <h3
                                class="mt-3 text-lg font-bold text-slate-800 group-hover:text-blue-700 transition-colors">
                                <?= htmlspecialchars($announcement->getTitle()) ?>
                            </h3>

                            <p class="mt-2 text-sm text-slate-500 line-clamp-2">
                                <?= htmlspecialchars($announcement->getContent()) ?>
                            </p>
                        </div>

                        <div class="flex-shrink-0 mt-6 text-slate-300 group-hover:text-blue-500 transition-colors">
                            <i data-lucide="chevron-right" class="w-5 h-5"></i>
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-t border-slate-100/80 flex justify-between text-xs text-slate-400">
                        <span class="flex items-center gap-1">
                            <i data-lucide="building-2" class="w-3 h-3"></i> University
                        </span>
                        <span class="flex items-center gap-1">
                            <i data-lucide="calendar" class="w-3 h-3"></i>
                            <?= date('M d, Y', strtotime($announcement->getPublishedAt())) ?>
                        </span>
                    </div>
                </a>

                <?php endforeach; ?>

                <?php endif; ?>

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

    // Search auto-submit on enter is already handled by the input's onkeydown? Actually not, but we can add.
    // The user may want it to submit on enter; we can add event listener.
    const searchInput = document.querySelector('input[name="search"]');
    if (searchInput) {
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                this.closest('form').submit();
            }
        });
    }
});
</script>