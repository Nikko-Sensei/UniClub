<section class="mt-8">

    <!-- ========================================================== -->
    <!-- HEADER                                                    -->
    <!-- ========================================================== -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl md:text-3xl font-bold text-slate-800">Featured Clubs</h2>
            <p class="mt-1 text-sm text-slate-500">Discover active communities in your university.</p>
        </div>
        <a href="<?= BASE_URL ?>/clubs"
            class="inline-flex items-center gap-1 text-sm font-semibold text-blue-600 hover:text-blue-700 transition group">
            View All
            <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
        </a>
    </div>

    <!-- ========================================================== -->
    <!-- CLUB GRID                                                  -->
    <!-- ========================================================== -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <?php foreach ($clubs as $index => $club): ?>
        <!-- Club Card – Enhanced Hover -->
        <div class="glass-card-light rounded-2xl overflow-hidden border border-slate-100/60 shadow-xl transition-all duration-300 ease-out 
                    hover:scale-[1.02] hover:shadow-2xl hover:border-blue-400/70 hover:bg-white/90 
                    group animate-fadeInUp perspective-[800px] hover:rotate-y-2"
            style="animation-delay: <?= $index * 100 + 200 ?>ms;">

            <!-- Image -->
            <div class="relative h-48 bg-slate-100 overflow-hidden">
                <?php if (!empty($club['logo'])): ?>
                <img src="<?= BASE_URL ?>/uploads/clubs/<?= htmlspecialchars($club['logo']) ?>"
                    alt="<?= htmlspecialchars($club['name']) ?>"
                    class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                <?php else: ?>
                <div
                    class="w-full h-full flex items-center justify-center text-slate-300 bg-gradient-to-br from-slate-100 to-slate-200">
                    <i data-lucide="users" class="w-16 h-16"></i>
                </div>
                <?php endif; ?>

                <!-- Category Badge -->
                <?php if (!empty($club['category_name'])): ?>
                <span
                    class="absolute top-3 left-3 px-3 py-1 rounded-full bg-white/90 backdrop-blur-sm text-blue-600 text-xs font-semibold shadow-md border border-white/30 transition-all duration-300 group-hover:bg-white group-hover:shadow-lg">
                    <?= htmlspecialchars($club['category_name']) ?>
                </span>
                <?php endif; ?>

                <!-- Gradient overlay on hover -->
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/0 to-transparent transition-opacity duration-300 group-hover:from-black/10">
                </div>
            </div>

            <!-- Content -->
            <div class="p-5">
                <h3 class="text-lg font-bold text-slate-800 group-hover:text-blue-700 transition-colors duration-300">
                    <?= htmlspecialchars($club['name']) ?>
                </h3>

                <p class="mt-2 text-sm text-slate-500 line-clamp-2 transition-colors group-hover:text-slate-700">
                    <?= htmlspecialchars($club['description'] ?? '') ?>
                </p>

                <div class="mt-4 flex items-center justify-between">
                    <span
                        class="inline-flex items-center gap-1.5 text-sm text-blue-600 font-medium transition-all group-hover:text-blue-700">
                        <i data-lucide="users" class="w-4 h-4 transition-transform group-hover:scale-110"></i>
                        <?= number_format($club['member_count'] ?? 0) ?> Members
                    </span>
                    <a href="<?= BASE_URL ?>/clubs/<?= $club['id'] ?>"
                        class="inline-flex items-center gap-1 text-sm font-semibold text-slate-600 hover:text-blue-600 transition group/link">
                        View
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

/* Perspective for 3D tilt */
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