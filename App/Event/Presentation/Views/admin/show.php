<div class="space-y-8">

    <!-- ========================================================== -->
    <!-- BACK BUTTON – Glass with slide-in                         -->
    <!-- ========================================================== -->
    <div class="animate-slideInLeft">
        <a href="<?= BASE_URL ?>/admin/events"
            class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
            <span>Back to Events</span>
        </a>
    </div>

    <!-- ========================================================== -->
    <!-- BANNER – Glass overlay with glow orbs                     -->
    <!-- ========================================================== -->
    <div class="group relative rounded-2xl overflow-hidden shadow-xl border border-slate-100/60">
        <?php if ($event->getBanner()): ?>
        <img src="<?= BASE_URL ?>/uploads/events/<?= htmlspecialchars($event->getBanner()) ?>"
            class="w-full h-64 md:h-80 object-cover transition-transform duration-700 group-hover:scale-105"
            alt="<?= htmlspecialchars($event->getTitle()) ?>">
        <?php else: ?>
        <div
            class="w-full h-64 md:h-80 bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center text-blue-400">
            <i data-lucide="calendar-days" class="w-20 h-20"></i>
        </div>
        <?php endif; ?>

        <!-- Overlay with gradient -->
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-slate-900/20 to-transparent"></div>

        <!-- Decorative glow orbs -->
        <div class="absolute top-10 right-10 w-32 h-32 rounded-full bg-blue-500/20 blur-3xl animate-pulseGlow"></div>
        <div class="absolute bottom-10 left-10 w-48 h-48 rounded-full bg-indigo-500/20 blur-3xl animate-pulseGlow"
            style="animation-delay: 1.5s;"></div>
    </div>

    <!-- ========================================================== -->
    <!-- HEADER – Title + Actions                                  -->
    <!-- ========================================================== -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-3xl md:text-4xl font-bold text-slate-800">
                <?= htmlspecialchars($event->getTitle()) ?>
            </h1>
            <p class="text-slate-500 mt-1">Event administration and registration management.</p>
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="<?= BASE_URL ?>/admin/events/<?= $event->getId() ?>/registrations"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-xl text-sm font-semibold transition-all duration-300 shadow-md shadow-blue-200/50 hover:shadow-xl hover:scale-[1.02] btn-shine">
                <i data-lucide="users" class="w-4 h-4"></i>
                Registrations
            </a>
            <a href="<?= BASE_URL ?>/admin/events/<?= $event->getId() ?>/edit"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-amber-50 hover:bg-amber-100 text-amber-700 rounded-xl text-sm font-semibold transition-all duration-300 hover:scale-[1.02] border border-amber-200/50">
                <i data-lucide="square-pen" class="w-4 h-4"></i>
                Edit Event
            </a>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- OVERVIEW + STATUS – Glass cards grid                     -->
    <!-- ========================================================== -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Overview (3 cols) -->
        <div
            class="lg:col-span-3 glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 md:p-8 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">
            <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i data-lucide="info" class="w-5 h-5 text-blue-600"></i>
                Event Overview
            </h2>
            <p class="text-slate-600 leading-relaxed">
                <?= nl2br(htmlspecialchars($event->getDescription())) ?>
            </p>
        </div>

        <!-- Status + Capacity (1 col) -->
        <div
            class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">
            <p class="text-sm text-slate-500">Event Status</p>
            <p class="mt-2 text-xl font-bold text-blue-600">
                <?php
                    $status = $event->getStatus();
                    $statusColor = match($status) {
                        'published' => 'text-emerald-600',
                        'cancelled' => 'text-red-600',
                        default => 'text-amber-600'
                    };
                ?>
                <span class="<?= $statusColor ?>"><?= ucfirst(htmlspecialchars($status)) ?></span>
            </p>
            <div class="mt-5 pt-5 border-t border-slate-100/60">
                <p class="text-sm text-slate-500">Capacity</p>
                <p class="mt-1 text-2xl font-bold text-slate-800">
                    <?= number_format($event->getCapacity()) ?>
                </p>
                <p class="text-xs text-slate-400">Students</p>
            </div>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- EVENT DETAILS – Glass card grid                           -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 md:p-8 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">
        <h2 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-2">
            <i data-lucide="calendar-days" class="w-5 h-5 text-blue-600"></i>
            Event Details
        </h2>

        <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Event Date -->
            <div>
                <dt class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="calendar" class="w-4 h-4 text-slate-400"></i>
                    Event Date
                </dt>
                <dd class="mt-1 font-semibold text-slate-800">
                    <?= date('M d, Y', strtotime($event->getEventDate())) ?>
                </dd>
            </div>

            <!-- Event Time -->
            <div>
                <dt class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="clock" class="w-4 h-4 text-slate-400"></i>
                    Event Time
                </dt>
                <dd class="mt-1 font-semibold text-slate-800">
                    <?= date('h:i A', strtotime($event->getStartTime())) ?>
                    –
                    <?= date('h:i A', strtotime($event->getEndTime())) ?>
                </dd>
            </div>

            <!-- Venue -->
            <div>
                <dt class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="map-pin" class="w-4 h-4 text-slate-400"></i>
                    Venue
                </dt>
                <dd class="mt-1 font-semibold text-slate-800">
                    <?= htmlspecialchars($event->getVenue()) ?>
                </dd>
            </div>

            <!-- Capacity -->
            <div>
                <dt class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="users" class="w-4 h-4 text-slate-400"></i>
                    Capacity
                </dt>
                <dd class="mt-1 font-semibold text-slate-800">
                    <?= number_format($event->getCapacity()) ?> Students
                </dd>
            </div>

            <!-- Registration Deadline -->
            <div>
                <dt class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="clock-3" class="w-4 h-4 text-slate-400"></i>
                    Registration Deadline
                </dt>
                <dd class="mt-1 font-semibold text-slate-800">
                    <?= date('M d, Y h:i A', strtotime($event->getRegistrationDeadline())) ?>
                </dd>
            </div>

            <!-- Club -->
            <div>
                <dt class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="building-2" class="w-4 h-4 text-slate-400"></i>
                    Club
                </dt>
                <dd class="mt-1 font-semibold text-slate-800">
                    <?php
                        $clubName = '-';
                        foreach ($clubs as $club) {
                            if ($event->getClubId() == $club->getId()) {
                                $clubName = $club->getName();
                                break;
                            }
                        }
                        echo htmlspecialchars($clubName);
                    ?>
                </dd>
            </div>

            <!-- Category -->
            <div>
                <dt class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="tag" class="w-4 h-4 text-slate-400"></i>
                    Category
                </dt>
                <dd class="mt-1 font-semibold text-slate-800">
                    <?php
                        $categoryName = '-';
                        foreach ($categories as $category) {
                            if ($event->getCategoryId() == $category['id']) {
                                $categoryName = $category['name'];
                                break;
                            }
                        }
                        echo htmlspecialchars($categoryName);
                    ?>
                </dd>
            </div>

            <!-- Created At -->
            <div>
                <dt class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="calendar-plus" class="w-4 h-4 text-slate-400"></i>
                    Created At
                </dt>
                <dd class="mt-1 font-semibold text-slate-800">
                    <?= date('M d, Y', strtotime($event->getCreatedAt())) ?>
                </dd>
            </div>
        </dl>
    </div>



</div>

<!-- ── Scripts for Lucide Icons and Animations ── -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});
</script>