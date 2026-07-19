<div
    class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-5 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shadow-sm">
                <i data-lucide="activity" class="w-4.5 h-4.5"></i>
            </div>
            <div>
                <h3 class="font-semibold text-slate-800">Recent Activities</h3>
                <p class="text-xs text-slate-400">Latest system actions</p>
            </div>
        </div>
        <a href="#"
            class="text-xs font-medium text-blue-600 hover:text-blue-700 transition flex items-center gap-1 group">
            View All
            <i data-lucide="arrow-right" class="w-3 h-3 transition-transform group-hover:translate-x-1"></i>
        </a>
    </div>

    <?php if (empty($dashboard->recentActivities)): ?>

    <!-- Empty State -->
    <div class="flex flex-col items-center justify-center py-8 text-center">
        <div class="w-12 h-12 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mb-3">
            <i data-lucide="activity" class="w-6 h-6"></i>
        </div>
        <p class="text-sm font-medium text-slate-600">No recent activities</p>
        <p class="text-xs text-slate-400 mt-0.5">Activities will appear here as they happen</p>
    </div>

    <?php else: ?>

    <div class="space-y-3">
        <?php foreach ($dashboard->recentActivities as $activity): ?>
        <div
            class="flex items-start gap-3 p-3 rounded-xl bg-white/50 backdrop-blur-sm border border-slate-100/60 hover:border-blue-200/50 transition group">
            <!-- Avatar -->
            <div
                class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-100 to-blue-200 text-blue-700 flex items-center justify-center flex-shrink-0 text-xs font-bold shadow-sm">
                <?= strtoupper(substr($activity['user_name'] ?? 'U', 0, 1)) ?>
            </div>
            <!-- Content -->
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-slate-800 group-hover:text-blue-700 transition">
                    <?= htmlspecialchars($activity['action']) ?>
                </p>
                <p class="text-xs text-slate-400 mt-0.5 flex items-center gap-1.5">
                    <i data-lucide="clock" class="w-3 h-3"></i>
                    <?= htmlspecialchars($activity['created_at']) ?>
                </p>
            </div>
            <!-- Badge -->
            <?php
                $badgeColor = match($activity['type'] ?? 'activity') {
                    'new' => 'bg-emerald-50 text-emerald-600',
                    'update' => 'bg-blue-50 text-blue-600',
                    'warning' => 'bg-amber-50 text-amber-600',
                    default => 'bg-slate-100 text-slate-600'
                };
            ?>
            <span class="text-xs font-medium <?= $badgeColor ?> px-2.5 py-1 rounded-full flex-shrink-0">
                <?= ucfirst($activity['type'] ?? 'Activity') ?>
            </span>
        </div>
        <?php endforeach; ?>
    </div>

    <?php endif; ?>

</div>