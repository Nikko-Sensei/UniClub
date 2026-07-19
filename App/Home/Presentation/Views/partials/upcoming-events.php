<section class="mt-8">

    <!-- ========================================================== -->
    <!-- HEADER                                                    -->
    <!-- ========================================================== -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl md:text-3xl font-bold text-slate-800">Upcoming Events</h2>
            <p class="mt-1 text-sm text-slate-500">Join activities and experiences around campus.</p>
        </div>
        <a href="<?= BASE_URL ?>/events"
            class="inline-flex items-center gap-1 text-sm font-semibold text-blue-600 hover:text-blue-700 transition group">
            View All
            <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
        </a>
    </div>

    <!-- ========================================================== -->
    <!-- EVENTS GRID                                               -->
    <!-- ========================================================== -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <?php foreach ($events as $index => $event): ?>
        <!-- Event Card -->
        <div class="glass-card-light rounded-2xl overflow-hidden border border-slate-100/60 shadow-xl transition-all duration-300 ease-out 
                    hover:scale-[1.02] hover:shadow-2xl hover:border-blue-400/70 hover:bg-white/90 
                    group animate-fadeInUp perspective-[800px] hover:rotate-y-2"
            style="animation-delay: <?= $index * 100 + 200 ?>ms;">

            <!-- Image -->
            <div class="relative h-48 bg-slate-100 overflow-hidden">
                <?php if (!empty($event['banner'])): ?>
                <img src="<?= BASE_URL ?>/uploads/events/<?= htmlspecialchars($event['banner']) ?>"
                    alt="<?= htmlspecialchars($event['title']) ?>"
                    class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                <?php else: ?>
                <div
                    class="w-full h-full flex items-center justify-center text-slate-300 bg-gradient-to-br from-slate-100 to-slate-200">
                    <i data-lucide="calendar-days" class="w-16 h-16"></i>
                </div>
                <?php endif; ?>

                <!-- Date Badge -->
                <div
                    class="absolute top-3 left-3 px-3 py-1 rounded-full bg-white/90 backdrop-blur-sm text-blue-600 text-xs font-semibold shadow-md border border-white/30 transition-all duration-300 group-hover:bg-white group-hover:shadow-lg">
                    <i data-lucide="calendar" class="w-3 h-3 inline mr-1"></i>
                    <?= date('M d', strtotime($event['event_date'])) ?>
                </div>

                <!-- Gradient overlay on hover -->
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/0 to-transparent transition-opacity duration-300 group-hover:from-black/10">
                </div>
            </div>

            <!-- Content -->
            <div class="p-5">
                <h3
                    class="text-lg font-bold text-slate-800 group-hover:text-blue-700 transition-colors duration-300 line-clamp-1">
                    <?= htmlspecialchars($event['title']) ?>
                </h3>

                <!-- Details -->
                <div class="mt-3 space-y-1.5 text-sm text-slate-500">
                    <div class="flex items-center gap-2">
                        <i data-lucide="calendar" class="w-4 h-4 text-slate-400"></i>
                        <span><?= date('l, M d, Y', strtotime($event['event_date'])) ?></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="building-2" class="w-4 h-4 text-slate-400"></i>
                        <span><?= htmlspecialchars($event['club_name']) ?></span>
                    </div>
                    <?php if (!empty($event['venue'])): ?>
                    <div class="flex items-center gap-2">
                        <i data-lucide="map-pin" class="w-4 h-4 text-slate-400"></i>
                        <span><?= htmlspecialchars($event['venue']) ?></span>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <span class="inline-flex items-center gap-1.5 text-sm text-emerald-600 font-medium">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        Upcoming
                    </span>
                    <a href="<?= BASE_URL ?>/events/<?= $event['id'] ?>"
                        class="inline-flex items-center gap-1 text-sm font-semibold text-slate-600 hover:text-blue-600 transition group/link">
                        View Event
                        <i data-lucide="arrow-right"
                            class="w-3.5 h-3.5 transition-all duration-300 group-hover/link:translate-x-1 group-hover/link:scale-110"></i>
                    </a>
                </div>
            </div>

        </div>
        <?php endforeach; ?>

    </div>

</section>

<!-- ── Required CSS Animations ── -->
<style>
@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }

    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fadeInUp {
    opacity: 0;
    animation: fadeInUp 0.6s cubic-bezier(0.22, 1, 0.36, 1) forwards;
}

.perspective-\[800px\] {
    perspective: 800px;
}

.hover\:rotate-y-2:hover {
    transform: rotateY(2deg) scale(1.02);
}
</style>

<!-- ── Scripts for Lucide Icons ── -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});
</script>