<?php

$notifications = $notificationService->getUserNotifications($_SESSION['user']['id']);
$unreadCount = array_reduce($notifications, function ($count, $n) {
    return $count + ($n->isRead() ? 0 : 1);
}, 0);

?>

<div class="relative" x-data="{ open: false }">

    <!-- ===== NOTIFICATION BELL ===== -->
    <button @click="open = !open" @click.away="open = false"
        class="relative p-2 rounded-xl hover:bg-slate-100/70 transition-all duration-200 hover:scale-105 group"
        aria-label="Notifications">

        <i data-lucide="bell" class="w-5 h-5 text-slate-500 group-hover:text-blue-600 transition-colors"></i>

        <!-- Unread badge -->
        <?php if ($unreadCount > 0): ?>
        <span
            class="absolute -top-0.5 -right-0.5 min-w-[18px] h-[18px] bg-red-500 text-white text-[10px] font-bold rounded-full flex items-center justify-center px-1 shadow-sm shadow-red-200 animate-pulse">
            <?= min($unreadCount, 99) ?>
        </span>
        <?php endif; ?>
    </button>

    <!-- ===== DROPDOWN ===== -->
    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
        class="absolute right-0 mt-3 w-80 sm:w-96 bg-white/80 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-100/60 z-50 overflow-hidden"
        style="display: none;">

        <!-- Header -->
        <div
            class="flex items-center justify-between px-5 py-4 border-b border-slate-100/60 bg-white/30 backdrop-blur-sm">
            <h3 class="font-semibold text-slate-800 flex items-center gap-2">
                <i data-lucide="bell" class="w-4 h-4 text-blue-500"></i>
                Notifications
            </h3>
            <?php if ($unreadCount > 0): ?>
            <a href="<?= BASE_URL ?>/notifications/read-all"
                class="text-xs font-medium text-blue-600 hover:text-blue-700 transition">
                Mark all read
            </a>
            <?php endif; ?>
        </div>

        <!-- List -->
        <div
            class="max-h-80 overflow-y-auto divide-y divide-slate-100/60 scrollbar-thin scrollbar-thumb-slate-300 scrollbar-track-transparent">

            <?php if (empty($notifications)): ?>
            <div class="flex flex-col items-center justify-center py-8 px-4 text-center">
                <i data-lucide="bell-off" class="w-8 h-8 text-slate-300 mb-2"></i>
                <p class="text-sm text-slate-500">No notifications yet</p>
            </div>
            <?php else: ?>
            <?php foreach (array_slice($notifications, 0, 5) as $notification): ?>
            <a href="<?= BASE_URL ?>/notifications/read/<?= $notification->getId() ?>"
                class="block px-5 py-3.5 transition-all duration-200 hover:bg-blue-50/30 <?= !$notification->isRead() ? 'bg-blue-50/20 border-l-2 border-blue-400' : '' ?>">

                <div class="flex items-start gap-3">
                    <!-- Status dot -->
                    <?php if (!$notification->isRead()): ?>
                    <span
                        class="w-2 h-2 rounded-full bg-blue-500 mt-1.5 flex-shrink-0 shadow-sm shadow-blue-200"></span>
                    <?php else: ?>
                    <span class="w-2 h-2 rounded-full bg-slate-300 mt-1.5 flex-shrink-0"></span>
                    <?php endif; ?>

                    <div class="flex-1 min-w-0">
                        <p
                            class="text-sm font-medium text-slate-800 <?= !$notification->isRead() ? 'text-blue-700' : '' ?>">
                            <?= htmlspecialchars($notification->getTitle()) ?>
                        </p>
                        <p class="text-xs text-slate-500 mt-0.5 line-clamp-2">
                            <?= htmlspecialchars($notification->getMessage()) ?>
                        </p>
                        <p class="text-[10px] text-slate-400 mt-1.5 flex items-center gap-1">
                            <i data-lucide="clock" class="w-3 h-3"></i>
                            <?= $notification->getCreatedAt() ?>
                        </p>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Footer -->
        <a href="<?= BASE_URL ?>/notifications"
            class="block text-center py-3 text-sm font-semibold text-blue-600 hover:bg-blue-50/50 transition-colors border-t border-slate-100/60">
            View All
            <i data-lucide="arrow-right" class="w-3.5 h-3.5 inline ml-1"></i>
        </a>
    </div>

</div>

<!-- ── Required Alpine.js for dropdown toggle ── -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- ── Lucide Icons ── -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});
</script>

<style>
/* Scrollbar for dropdown */
.scrollbar-thin::-webkit-scrollbar {
    width: 4px;
}

.scrollbar-thin::-webkit-scrollbar-track {
    background: transparent;
}

.scrollbar-thin::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 9999px;
}

.scrollbar-thin::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}
</style>