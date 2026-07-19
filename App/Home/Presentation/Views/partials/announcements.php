<section class="mt-8">

    <!-- ========================================================== -->
    <!-- HEADER                                                    -->
    <!-- ========================================================== -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl md:text-3xl font-bold text-slate-800">Latest Announcements</h2>
            <p class="mt-1 text-sm text-slate-500">Stay updated with club news.</p>
        </div>
        <a href="<?= BASE_URL ?>/announcements"
            class="inline-flex items-center gap-1 text-sm font-semibold text-blue-600 hover:text-blue-700 transition group">
            View All
            <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
        </a>
    </div>

    <!-- ========================================================== -->
    <!-- ANNOUNCEMENTS LIST – Photo Style                          -->
    <!-- ========================================================== -->
    <div class="glass-card-light rounded-2xl overflow-hidden border border-slate-100/60 shadow-xl">
        <div class="divide-y divide-slate-100/60">

            <?php foreach ($announcements as $index => $announcement): ?>
            <!-- Announcement Row -->
            <div class="flex items-center gap-5 p-5 transition-all duration-300 hover:bg-white/40 group row-animate"
                style="animation-delay: <?= $index * 100 ?>ms;">

                <!-- Date Badge (Large Number) -->
                <div class="flex-shrink-0 text-center min-w-[60px]">
                    <p class="text-3xl md:text-4xl font-extrabold text-blue-600 leading-none">
                        <?= date('d', strtotime($announcement['created_at'])) ?>
                    </p>
                    <p class="text-xs uppercase text-slate-400 font-semibold tracking-wide">
                        <?= date('M', strtotime($announcement['created_at'])) ?>
                    </p>
                </div>

                <!-- Announcement Details -->
                <div class="flex-1 min-w-0">
                    <h3 class="text-lg font-bold text-slate-800 group-hover:text-blue-700 transition-colors">
                        <?= htmlspecialchars($announcement['title']) ?>
                    </h3>
                    <p class="mt-1 text-sm text-slate-500 line-clamp-2">
                        <?= htmlspecialchars($announcement['content']) ?>
                    </p>
                    <div class="mt-2 flex flex-wrap items-center gap-3 text-xs text-slate-400">
                        <span class="flex items-center gap-1">
                            <i data-lucide="building-2" class="w-3.5 h-3.5"></i>
                            <?= htmlspecialchars($announcement['club_name']) ?>
                        </span>
                        <?php if (!empty($announcement['priority'])): ?>
                        <?php
                            $priorityLabel = match ($announcement['priority']) {
                                'high' => '🔥 Important',
                                'medium' => '📢 Update',
                                default => 'ℹ️ Notice'
                            };
                        ?>
                        <span class="text-xs font-medium text-slate-500">
                            <?= $priorityLabel ?>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- View Link -->
                <a href="<?= BASE_URL ?>/announcements/<?= $announcement['id'] ?>"
                    class="flex-shrink-0 inline-flex items-center gap-1 text-sm font-semibold text-blue-600 hover:text-blue-800 transition group">
                    View
                    <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
                </a>

            </div>
            <?php endforeach; ?>

        </div>
    </div>

</section>

<!-- ── Required CSS Animations ── -->
<style>
@keyframes slideInLeft {
    0% {
        opacity: 0;
        transform: translateX(-20px) scale(0.98);
    }

    100% {
        opacity: 1;
        transform: translateX(0) scale(1);
    }
}

.row-animate {
    opacity: 0;
    animation: slideInLeft 0.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
}
</style>

<!-- ── Scripts for Lucide Icons ── -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // ── Intersection Observer for row animations on scroll ──
    const rows = document.querySelectorAll('.row-animate');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });

    rows.forEach(row => {
        row.style.opacity = '0';
        observer.observe(row);
    });
});
</script>