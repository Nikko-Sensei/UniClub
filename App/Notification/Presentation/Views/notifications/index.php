<?php

use App\Shared\Core\View;

?>

<div class="space-y-6 max-w-5xl mx-auto px-4 md:px-6 py-6">

    <!-- ========================================================== -->
    <!-- BACK BUTTON – Glass with slide-in                         -->
    <!-- ========================================================== -->


    <div class="animate-slideInLeft">

        <?php

        use App\Shared\Core\Auth; ?>

        <a href="<?= Auth::dashboardUrl() ?>" class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700
        font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02]
        hover:border-blue-200 group">

            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>

            <span>Back to Dashboard</span>

        </a>

    </div>

    <!-- ========================================================== -->
    <!-- HEADER                                                     -->
    <!-- ========================================================== -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-3">
                <span class="relative">
                    <i data-lucide="bell" class="w-7 h-7 text-blue-500"></i>
                    <?php if (!empty($notifications)): ?>
                        <span
                            class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full border-2 border-white animate-pulse"></span>
                    <?php endif; ?>
                </span>
                Notifications
            </h1>
            <p class="text-sm text-slate-500 mt-0.5">View your latest updates</p>
        </div>

        <?php if (!empty($notifications)): ?>
            <a href="<?= BASE_URL ?>/notifications/read-all"
                class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-sm font-semibold transition-all duration-300 shadow-md shadow-blue-200/50 hover:shadow-xl hover:scale-[1.02] btn-shine">
                <i data-lucide="check-check" class="w-4 h-4"></i>
                Mark All Read
            </a>
        <?php endif; ?>
    </div>

    <!-- ========================================================== -->
    <!-- NOTIFICATIONS LIST – Glass card                           -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <?php if (empty($notifications)): ?>

            <!-- ===== EMPTY STATE ===== -->
            <div class="flex flex-col items-center justify-center py-16 px-6 text-center">
                <div class="w-16 h-16 rounded-2xl bg-blue-50 text-blue-500 flex items-center justify-center shadow-sm mb-4">
                    <i data-lucide="bell-off" class="w-8 h-8"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-800">All caught up!</h3>
                <p class="text-sm text-slate-500 mt-1 max-w-sm">You have no unread notifications. Come back later for
                    updates.</p>
            </div>

        <?php else: ?>

            <!-- ===== NOTIFICATION ITEMS ===== -->
            <div class="divide-y divide-slate-100/60">
                <?php foreach ($notifications as $notification): ?>
                    <div
                        class="flex items-start gap-4 p-5 transition-all duration-200 hover:bg-slate-50/40 <?= !$notification->isRead() ? 'bg-blue-50/40 border-l-4 border-blue-500' : '' ?>">

                        <!-- Status Dot -->
                        <div class="flex-shrink-0 mt-0.5">
                            <?php if (!$notification->isRead()): ?>
                                <div class="w-3 h-3 rounded-full bg-blue-500 shadow-sm shadow-blue-200 animate-pulse"></div>
                            <?php else: ?>
                                <div class="w-3 h-3 rounded-full bg-slate-300"></div>
                            <?php endif; ?>
                        </div>

                        <!-- Content -->
                        <div class="flex-1 min-w-0">
                            <h4
                                class="text-sm font-semibold text-slate-800 <?= !$notification->isRead() ? 'text-blue-700' : '' ?>">
                                <?= htmlspecialchars($notification->getTitle()) ?>
                            </h4>
                            <p class="text-sm text-slate-600 mt-0.5 leading-relaxed">
                                <?= htmlspecialchars($notification->getMessage()) ?>
                            </p>
                            <div class="flex flex-wrap items-center gap-3 mt-2 text-xs text-slate-400">
                                <span class="flex items-center gap-1">
                                    <i data-lucide="clock" class="w-3.5 h-3.5"></i>
                                    <?= $notification->getCreatedAt() ?>
                                </span>
                                <?php if (!$notification->isRead()): ?>
                                    <span
                                        class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-blue-50 text-blue-600 text-[10px] font-semibold">
                                        <span class="w-1 h-1 rounded-full bg-blue-500 animate-pulse"></span>
                                        New
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Action -->
                        <?php if (!$notification->isRead()): ?>
                            <a href="<?= BASE_URL ?>/notifications/read/<?= $notification->getId() ?>"
                                class="flex-shrink-0 inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-white/70 backdrop-blur-sm border border-slate-200/60 text-xs font-medium text-blue-600 hover:bg-blue-50 hover:border-blue-200 transition-all duration-200 hover:scale-[1.02]">
                                <i data-lucide="check" class="w-3.5 h-3.5"></i>
                                Mark Read
                            </a>
                        <?php else: ?>
                            <span class="flex-shrink-0 text-xs text-slate-400 font-medium">Read</span>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>

    </div>

</div>

<!-- ── Required CSS ── -->
<style>
    /* Glass Card */
    .glass-card-light {
        background: rgba(255, 255, 255, 0.72);
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

    /* Button Shine */
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

    /* Back Button */
    .back-btn {
        transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .back-btn:hover {
        transform: translateX(-4px) scale(1.02);
        box-shadow: 0 8px 30px -8px rgba(37, 99, 235, 0.25);
    }

    /* Animations */
    @keyframes slideInLeft {
        0% {
            opacity: 0;
            transform: translateX(-20px);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(12px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-slideInLeft {
        animation: slideInLeft 0.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    .animate-fadeInUp {
        animation: fadeInUp 0.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }
</style>

<!-- ── Lucide Icons ── -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });
</script>