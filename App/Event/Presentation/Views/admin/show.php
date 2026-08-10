<div class="space-y-8">

    <?php require BASE_PATH .
        '/App/Event/Presentation/Views/admin/components/event_header.php';
    ?>

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
                $statusColor = match ($status) {
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