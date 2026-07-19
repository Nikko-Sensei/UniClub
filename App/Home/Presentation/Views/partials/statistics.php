<section class="mt-4">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        <?php
        $items = [
            [
                'title' => 'Students',
                'value' => $statistics['total_users'] ?? 0,
                'icon' => 'users',
                'color' => 'blue',
                'subtitle' => 'Registered accounts'
            ],
            [
                'title' => 'Clubs',
                'value' => $statistics['total_clubs'] ?? 0,
                'icon' => 'building-2',
                'color' => 'indigo',
                'subtitle' => 'Active organizations'
            ],
            [
                'title' => 'Events',
                'value' => $statistics['total_events'] ?? 0,
                'icon' => 'calendar-days',
                'color' => 'amber',
                'subtitle' => 'Upcoming & past'
            ],
            [
                'title' => 'Announcements',
                'value' => $statistics['total_announcements'] ?? 0,
                'icon' => 'megaphone',
                'color' => 'purple',
                'subtitle' => 'University updates'
            ]
        ];
        ?>

        <?php foreach ($items as $index => $item): ?>
        <div class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1 animate-fadeInUp"
            style="animation-delay: <?= $index * 100 + 100 ?>ms;">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium"><?= $item['title'] ?></p>
                    <div class="flex items-baseline gap-1 mt-1">
                        <h2 class="text-2xl font-extrabold text-slate-800 counter" data-target="<?= $item['value'] ?>">
                            0
                        </h2>
                    </div>
                    <p class="text-[11px] text-<?= $item['color'] ?>-500 mt-0.5 flex items-center gap-1">
                        <span class="inline-block w-1.5 h-1.5 rounded-full bg-<?= $item['color'] ?>-500"></span>
                        <?= $item['subtitle'] ?>
                    </p>
                </div>
                <div
                    class="w-11 h-11 rounded-xl bg-<?= $item['color'] ?>-50 text-<?= $item['color'] ?>-600 flex items-center justify-center shadow-sm">
                    <i data-lucide="<?= $item['icon'] ?>" class="w-5 h-5"></i>
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
</style>

<!-- ── Counter Animation Script ── -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ── Lucide Icons ──
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // ── Animated Counters ──
    const counters = document.querySelectorAll('.counter');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = parseInt(el.dataset.target);
                let current = 0;
                const duration = 800;
                const steps = 40;
                const increment = Math.ceil(target / steps);
                const interval = Math.ceil(duration / steps);
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    el.textContent = current.toLocaleString();
                }, interval);
                observer.unobserve(el);
            }
        });
    }, {
        threshold: 0.3
    });

    counters.forEach(c => observer.observe(c));
});
</script>