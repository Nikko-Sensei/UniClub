<div class="space-y-6">

    <!-- ========================================================== -->
    <!-- WELCOME BANNER – Glass with gradient background            -->
    <!-- ========================================================== -->
    <div
        class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-700 p-6 md:p-8 text-white shadow-xl">

        <!-- Decorative elements -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/4">
        </div>
        <div
            class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full blur-3xl translate-y-1/2 -translate-x-1/4">
        </div>

        <!-- Content -->
        <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold tracking-tight drop-shadow-sm">
                    Welcome back,
                    <span class="text-white/90"><?= htmlspecialchars($_SESSION['user']['name'] ?? 'Admin') ?></span>
                    👋
                </h1>
                <p class="mt-1.5 text-blue-100/80 text-sm md:text-base">
                    Manage students, clubs and university activities from one place.
                </p>
            </div>
            <div class="flex items-center gap-3 flex-shrink-0">
                <span
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-white/10 backdrop-blur-sm border border-white/10 text-xs font-medium text-white/80">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    System Online
                </span>
            </div>
        </div>
    </div>



    <!-- ========================================================== -->
    <!-- STATISTICS WIDGET – Glass cards with hover lift            -->
    <!-- ========================================================== -->
    <?php require __DIR__ . '/widgets/statistics.php'; ?>

    <!-- ========================================================== -->
    <!-- CHARTS WIDGET – Glass card with chart placeholder          -->
    <!-- ========================================================== -->
    <?php require __DIR__ . '/widgets/charts.php'; ?>

    <!-- ========================================================== -->
    <!-- RECENT ACTIVITIES + UPCOMING EVENTS – Glass grid          -->
    <!-- ========================================================== -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <?php require __DIR__ . '/widgets/recentActivities.php'; ?>
        <?php require __DIR__ . '/widgets/upcomingEvents.php'; ?>
    </div>

</div>