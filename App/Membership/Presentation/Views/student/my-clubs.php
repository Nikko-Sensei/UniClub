<?php
$joinedCount = $pendingCount = $upcomingEventCount = 0;
$joinedClubs = [];

foreach ($clubs as $club) {
    if ($club['status'] === 'approved') {
        $joinedCount++;
        $joinedClubs[] = $club;
        $upcomingEventCount += (int)($club['upcoming_event_count'] ?? 0);
    }
    if ($club['status'] === 'pending') $pendingCount++;
}
?>

<div class="space-y-8">

    <!-- Header -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">My Clubs</h1>
            <p class="text-slate-500 mt-2">
                Welcome back, <?= htmlspecialchars($_SESSION['user']['name']) ?> 👋<br>
                Manage your memberships, activities and events.
            </p>
        </div>

        <a href="<?= BASE_URL ?>/clubs"
            class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold shadow-sm transition self-start lg:self-auto">
            <i data-lucide="compass" class="w-4.5 h-4.5"></i> Explore Clubs
        </a>
    </div>

    <!-- Statistics -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        <?php
        $stats = [
            ['label' => 'Joined Clubs',     'value' => $joinedCount,        'icon' => 'users',          'color' => 'blue'],
            ['label' => 'Pending Requests', 'value' => $pendingCount,       'icon' => 'clock-3',        'color' => 'amber'],
            ['label' => 'Upcoming Events',  'value' => $upcomingEventCount, 'icon' => 'calendar-days',  'color' => 'emerald'],
        ];
        foreach ($stats as $s): ?>
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500"><?= $s['label'] ?></p>
                    <h2 class="text-3xl font-bold text-<?= $s['color'] ?>-600 mt-2"><?= $s['value'] ?></h2>
                </div>
                <div
                    class="w-12 h-12 rounded-2xl bg-<?= $s['color'] ?>-100 text-<?= $s['color'] ?>-600 flex items-center justify-center">
                    <i data-lucide="<?= $s['icon'] ?>" class="w-6 h-6"></i>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Section Header -->
    <div>
        <h2 class="text-xl font-bold text-slate-800">Joined Clubs</h2>
        <p class="text-sm text-slate-500 mt-1">Your approved club memberships</p>
    </div>

    <?php if (empty($joinedClubs)): ?>
    <div class="bg-white border border-dashed border-slate-300 rounded-2xl px-6 py-16 text-center">
        <div class="w-16 h-16 mx-auto bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center">
            <i data-lucide="users" class="w-8 h-8"></i>
        </div>
        <h3 class="text-xl font-bold text-slate-800 mt-5">No Joined Clubs Yet</h3>
        <p class="text-sm text-slate-500 mt-2 max-w-md mx-auto">
            Explore university clubs and join communities that match your interests.
        </p>
        <a href="<?= BASE_URL ?>/clubs"
            class="inline-flex items-center justify-center gap-2 mt-6 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl text-sm font-semibold transition">
            <i data-lucide="compass" class="w-4.5 h-4.5"></i> Explore Clubs
        </a>
    </div>

    <?php else: ?>
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
        <?php foreach ($joinedClubs as $club):
            $eventCount = (int)($club['upcoming_event_count'] ?? 0);
        ?>
        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition">

            <div class="h-40 relative bg-gradient-to-r from-blue-500 to-blue-700">
                <?php if (!empty($club['banner'])): ?>
                <img src="<?= BASE_URL ?>/uploads/clubs/<?= htmlspecialchars($club['banner']) ?>"
                    alt="<?= htmlspecialchars($club['club_name']) ?>" class="w-full h-full object-cover">
                <?php else: ?>
                <div class="w-full h-full flex items-center justify-center text-white/70">
                    <i data-lucide="users" class="w-12 h-12"></i>
                </div>
                <?php endif; ?>
                <div class="absolute inset-0 bg-black/20"></div>
            </div>

            <div class="p-6 space-y-4">
                <div>
                    <h3 class="text-xl font-bold text-slate-800"><?= htmlspecialchars($club['club_name']) ?></h3>
                    <p class="text-sm text-slate-500 mt-0.5"><?= htmlspecialchars($club['short_name'] ?? '') ?></p>
                </div>

                <div class="flex flex-wrap gap-2">
                    <span
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">
                        <i data-lucide="shield" class="w-3.5 h-3.5"></i> <?= htmlspecialchars($club['club_role']) ?>
                    </span>
                    <span
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-emerald-100 text-emerald-700 text-xs font-semibold">
                        <i data-lucide="circle-check" class="w-3.5 h-3.5"></i> Approved
                    </span>
                </div>

                <div class="flex items-center justify-between bg-slate-50 border border-slate-100 rounded-xl p-4">
                    <div>
                        <p class="text-sm text-slate-500">Upcoming Events</p>
                        <p class="font-bold text-slate-800 mt-0.5"><?= $eventCount ?>
                            <?= $eventCount == 1 ? 'Event' : 'Events' ?></p>
                    </div>
                    <div class="w-11 h-11 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                        <i data-lucide="calendar-days" class="w-5 h-5"></i>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="<?= BASE_URL ?>/clubs/<?= (int)$club['club_id'] ?>"
                        class="flex-1 inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-xl font-semibold text-sm transition">
                        <i data-lucide="eye" class="w-4 h-4"></i> View Club
                    </a>
                    <button type="button"
                        onclick="openLeaveModal(<?= (int)$club['club_id'] ?>, '<?= htmlspecialchars($club['club_name'], ENT_QUOTES) ?>')"
                        class="flex-1 inline-flex items-center justify-center gap-2 border border-red-200 text-red-600 hover:bg-red-50 py-2.5 rounded-xl font-semibold text-sm transition">
                        <i data-lucide="log-out" class="w-4 h-4"></i> Leave Club
                    </button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<!-- LEAVE CLUB MODAL -->
<div id="leaveClubModal"
    class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-900/50 backdrop-blur-sm">
    <div onclick="event.stopPropagation()" class="relative w-full max-w-md bg-white rounded-2xl shadow-2xl p-6">
        <div class="w-14 h-14 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center">
            <i data-lucide="log-out" class="w-7 h-7"></i>
        </div>

        <h3 class="text-xl font-bold text-slate-800 mt-5">Leave Club?</h3>
        <p class="text-sm text-slate-500 mt-2 leading-6">
            Are you sure you want to leave <span id="leaveClubName" class="font-semibold text-slate-800"></span>?
            You may need to request membership again if you want to rejoin.
        </p>

        <div class="flex flex-col-reverse sm:flex-row gap-3 mt-6">
            <button type="button" onclick="closeLeaveModal()"
                class="flex-1 border border-slate-200 text-slate-700 hover:bg-slate-50 py-3 rounded-xl text-sm font-semibold transition">
                Cancel
            </button>
            <form id="leaveClubForm" method="POST" class="flex-1">
                <button type="submit"
                    class="w-full inline-flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white py-3 rounded-xl text-sm font-semibold transition">
                    <i data-lucide="log-out" class="w-4 h-4"></i> Yes, Leave Club
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function openLeaveModal(clubId, clubName) {
    const modal = document.getElementById('leaveClubModal');
    document.getElementById('leaveClubName').textContent = clubName;
    document.getElementById('leaveClubForm').action = "<?= BASE_URL ?>/membership/" + clubId + "/leave";
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.classList.add('overflow-hidden');
}

function closeLeaveModal() {
    const modal = document.getElementById('leaveClubModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.classList.remove('overflow-hidden');
}
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeLeaveModal();
});
</script>