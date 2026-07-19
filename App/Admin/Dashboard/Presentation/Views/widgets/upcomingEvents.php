<div
    class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-5 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 h-fit">

    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center shadow-sm">
                <i data-lucide="calendar" class="w-4.5 h-4.5"></i>
            </div>
            <div>
                <h3 class="font-semibold text-slate-800">Upcoming Events</h3>
                <p class="text-xs text-slate-400">Next 7 days</p>
            </div>
        </div>
        <a href="<?= BASE_URL ?>/admin/events"
            class="text-xs font-medium text-blue-600 hover:text-blue-700 transition flex items-center gap-1 group">
            View All
            <i data-lucide="arrow-right" class="w-3 h-3 transition-transform group-hover:translate-x-1"></i>
        </a>
    </div>

    <?php if (empty($dashboard->upcomingEvents)): ?>

    <!-- Empty State -->
    <div class="flex flex-col items-center justify-center py-8 text-center">
        <div class="w-12 h-12 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mb-3">
            <i data-lucide="calendar" class="w-6 h-6"></i>
        </div>
        <p class="text-sm font-medium text-slate-600">No upcoming events</p>
        <p class="text-xs text-slate-400 mt-0.5">Events will appear here as they are scheduled</p>
    </div>

    <?php else: ?>

    <div class="space-y-3">
        <?php foreach ($dashboard->upcomingEvents as $event): ?>
        <!-- Event Card -->
        <div
            class="flex items-start gap-4 p-3 rounded-xl bg-white/50 backdrop-blur-sm border border-slate-100/60 hover:border-blue-200/50 transition group">
            <!-- Date Badge -->
            <?php
                $eventDate = strtotime($event['event_date']);
                $day = date('d', $eventDate);
                $month = date('M', $eventDate);
                $isToday = date('Y-m-d') === date('Y-m-d', $eventDate);
            ?>
            <div class="flex-shrink-0 text-center min-w-[48px] <?= $isToday ? 'bg-blue-50 rounded-lg p-1' : '' ?>">
                <p class="text-lg font-bold <?= $isToday ? 'text-blue-600' : 'text-slate-600' ?> leading-none">
                    <?= $day ?></p>
                <p class="text-[10px] uppercase <?= $isToday ? 'text-blue-500' : 'text-slate-400' ?> font-medium">
                    <?= $month ?></p>
            </div>
            <!-- Event Info -->
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-slate-800 group-hover:text-blue-700 transition">
                    <?= htmlspecialchars($event['title']) ?>
                </p>
                <div class="flex flex-wrap items-center gap-3 mt-1 text-xs text-slate-400">
                    <span class="flex items-center gap-1">
                        <i data-lucide="clock" class="w-3 h-3"></i>
                        <?= htmlspecialchars($event['start_time']) ?> – <?= htmlspecialchars($event['end_time']) ?>
                    </span>
                    <span class="flex items-center gap-1">
                        <i data-lucide="map-pin" class="w-3 h-3"></i>
                        <?= htmlspecialchars($event['venue']) ?>
                    </span>
                </div>
                <!-- Club Name -->
                <p class="text-xs text-slate-500 mt-1 flex items-center gap-1">
                    <i data-lucide="building-2" class="w-3 h-3"></i>
                    <?= htmlspecialchars($event['club_name']) ?>
                </p>
            </div>
            <!-- Status Badge -->
            <?php
                $today = new DateTime();
                $eventDateObj = new DateTime($event['event_date']);
                $diff = $today->diff($eventDateObj)->days;
                $badgeColor = $diff <= 1 ? 'bg-emerald-50 text-emerald-600' : 'bg-blue-50 text-blue-600';
                $badgeText = $diff == 0 ? 'Today' : ($diff == 1 ? 'Tomorrow' : ($diff <= 3 ? 'Soon' : 'Upcoming'));
            ?>
            <span class="text-xs font-medium <?= $badgeColor ?> px-2.5 py-1 rounded-full flex-shrink-0">
                <?= $badgeText ?>
            </span>
        </div>
        <?php endforeach; ?>
    </div>

    <?php endif; ?>

</div>