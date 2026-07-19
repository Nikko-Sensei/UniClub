<div class="space-y-8">

    <!-- ========================================================== -->
    <!-- BACK BUTTON – Glass with slide-in                         -->
    <!-- ========================================================== -->
    <div class="animate-slideInLeft">
        <a href="<?= BASE_URL ?>/admin/announcements"
            class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
            <span>Back to Announcements</span>
        </a>
    </div>

    <!-- ========================================================== -->
    <!-- HEADER                                                     -->
    <!-- ========================================================== -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-3xl md:text-4xl font-bold text-slate-800">
                <?= htmlspecialchars($announcement->getTitle()) ?>
            </h1>
            <p class="text-slate-500 mt-1">Announcement administration and publication management.</p>
        </div>

        <div class="flex flex-wrap gap-3">
            <a href="<?= BASE_URL ?>/admin/announcements/<?= $announcement->getId() ?>/edit"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-amber-50 hover:bg-amber-100 text-amber-700 rounded-xl text-sm font-semibold transition-all duration-300 hover:scale-[1.02] border border-amber-200/50">
                <i data-lucide="square-pen" class="w-4 h-4"></i>
                Edit Announcement
            </a>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- CONTENT – Overview + Status                               -->
    <!-- ========================================================== -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

        <!-- Overview (3 cols) -->
        <div
            class="lg:col-span-3 glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 md:p-8 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">
            <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i data-lucide="info" class="w-5 h-5 text-blue-600"></i>
                Announcement Overview
            </h2>
            <p class="text-slate-600 leading-relaxed">
                <?= nl2br(htmlspecialchars($announcement->getContent())) ?>
            </p>
        </div>

        <!-- Status + Priority (1 col) -->
        <div
            class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">
            <p class="text-sm text-slate-500">Announcement Status</p>
            <?php
                $status = $announcement->getStatus();
                $statusColor = $status === 'published' ? 'text-emerald-600' : 'text-amber-600';
            ?>
            <p class="mt-2 text-lg font-bold <?= $statusColor ?>">
                <?= ucfirst(htmlspecialchars($status)) ?>
            </p>

            <div class="mt-5 pt-5 border-t border-slate-100/60">
                <p class="text-sm text-slate-500">Priority</p>
                <?php
                    $priority = $announcement->getPriority();
                    $priorityColor = match ($priority) {
                        'high' => 'text-red-600',
                        'medium' => 'text-amber-600',
                        default => 'text-blue-600'
                    };
                ?>
                <p class="mt-1 text-2xl font-bold <?= $priorityColor ?>">
                    <?= ucfirst(htmlspecialchars($priority)) ?>
                </p>
                <p class="text-xs text-slate-400">Announcement priority</p>
            </div>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- DETAILS – Glass card grid                                 -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 md:p-8 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">
        <h2 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-2">
            <i data-lucide="file-text" class="w-5 h-5 text-blue-600"></i>
            Announcement Details
        </h2>

        <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Priority -->
            <div>
                <dt class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="flag" class="w-4 h-4 text-slate-400"></i>
                    Priority
                </dt>
                <dd class="mt-1 font-semibold text-slate-800">
                    <?= ucfirst(htmlspecialchars($announcement->getPriority())) ?>
                </dd>
            </div>

            <!-- Status -->
            <div>
                <dt class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="circle-check" class="w-4 h-4 text-slate-400"></i>
                    Status
                </dt>
                <dd class="mt-1 font-semibold text-slate-800">
                    <?= ucfirst(htmlspecialchars($announcement->getStatus())) ?>
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
                            if ($announcement->getClubId() == $club->getId()) {
                                $clubName = $club->getName();
                                break;
                            }
                        }
                        echo htmlspecialchars($clubName);
                    ?>
                </dd>
            </div>

            <!-- Created By -->
            <div>
                <dt class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="user" class="w-4 h-4 text-slate-400"></i>
                    Created By
                </dt>
                <dd class="mt-1 font-semibold text-slate-800">
                    <?= htmlspecialchars($announcement->getCreatedByName() ?? '-') ?>
                </dd>
            </div>

            <!-- Created At -->
            <div>
                <dt class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="calendar-plus" class="w-4 h-4 text-slate-400"></i>
                    Created At
                </dt>
                <dd class="mt-1 font-semibold text-slate-800">
                    <?= date('M d, Y', strtotime($announcement->getCreatedAt())) ?>
                </dd>
            </div>

            <!-- Published At -->
            <div>
                <dt class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="calendar-check" class="w-4 h-4 text-slate-400"></i>
                    Published At
                </dt>
                <dd class="mt-1 font-semibold text-slate-800">
                    <?php if ($announcement->getPublishedAt()): ?>
                    <?= date('M d, Y h:i A', strtotime($announcement->getPublishedAt())) ?>
                    <?php else: ?>
                    –
                    <?php endif; ?>
                </dd>
            </div>
        </dl>
    </div>


</div>

<!-- ── Scripts for Lucide Icons ── -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});
</script>