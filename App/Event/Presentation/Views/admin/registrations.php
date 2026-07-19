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
    <!-- HEADER                                                     -->
    <!-- ========================================================== -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">Event Registrations</h1>
            <p class="text-slate-500 mt-1">Review and manage student event registration requests.</p>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- REGISTRATION TABLE – Glass card                           -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <!-- Header -->
        <div
            class="px-6 py-5 border-b border-slate-100/60 bg-white/20 backdrop-blur-sm flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <div>
                <h2 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                    <i data-lucide="users" class="w-5 h-5 text-blue-600"></i>
                    Student Registrations
                </h2>
                <p class="text-sm text-slate-500 mt-0.5"><?= count($registrations) ?> registration requests</p>
            </div>
            <div class="flex items-center gap-2">
                <span
                    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/50">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <?php
                        $pending = 0;
                        foreach ($registrations as $r) {
                            if ($r['status'] === 'pending') $pending++;
                        }
                        echo $pending . ' pending';
                    ?>
                </span>
            </div>
        </div>

        <?php if (!empty($registrations)): ?>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead
                    class="bg-slate-50/50 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-200/60">
                    <tr>
                        <th class="px-6 py-4 text-left">Student</th>
                        <th class="px-6 py-4 text-left">Student ID</th>
                        <th class="px-6 py-4 text-left">Email</th>
                        <th class="px-6 py-4 text-left">Note</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-left">Registered</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100/60">
                    <?php foreach ($registrations as $registration): ?>
                    <tr class="hover:bg-slate-50/40 transition-colors">
                        <!-- Student -->
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-100 to-blue-200 text-blue-700 flex items-center justify-center font-bold flex-shrink-0 shadow-sm">
                                    <?= strtoupper(substr($registration['name'] ?? 'S', 0, 1)) ?>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-800">
                                        <?= htmlspecialchars($registration['name'] ?? '-') ?>
                                    </p>
                                    <p class="text-xs text-slate-400">Student</p>
                                </div>
                            </div>
                        </td>
                        <!-- Student ID -->
                        <td class="px-6 py-4 text-slate-600">
                            <?= htmlspecialchars($registration['student_id'] ?? '-') ?>
                        </td>
                        <!-- Email -->
                        <td class="px-6 py-4 text-slate-600">
                            <?= htmlspecialchars($registration['email'] ?? '-') ?>
                        </td>
                        <!-- Note -->
                        <td class="px-6 py-4">
                            <p class="max-w-[220px] truncate text-slate-600">
                                <?= htmlspecialchars($registration['note'] ?? '-') ?>
                            </p>
                        </td>
                        <!-- Status -->
                        <td class="px-6 py-4">
                            <?php if ($registration['status'] === 'pending'): ?>
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-50 text-amber-700 border border-amber-200/50 text-xs font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                Pending
                            </span>
                            <?php elseif ($registration['status'] === 'approved'): ?>
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200/50 text-xs font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Approved
                            </span>
                            <?php elseif ($registration['status'] === 'rejected'): ?>
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-red-50 text-red-700 border border-red-200/50 text-xs font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                Rejected
                            </span>
                            <?php else: ?>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full bg-slate-100 text-slate-600 border border-slate-200/50 text-xs font-semibold">
                                <?= ucfirst(htmlspecialchars($registration['status'])) ?>
                            </span>
                            <?php endif; ?>
                        </td>
                        <!-- Registered Date -->
                        <td class="px-6 py-4 text-slate-500 whitespace-nowrap">
                            <?= date('M d, Y', strtotime($registration['registered_at'])) ?>
                        </td>
                        <!-- Actions -->
                        <td class="px-6 py-4 text-right">
                            <?php if ($registration['status'] === 'pending'): ?>
                            <div class="flex items-center justify-end gap-2">
                                <form method="POST"
                                    action="<?= BASE_URL ?>/admin/event-registrations/<?= $registration['id'] ?>/approve"
                                    class="inline">
                                    <button type="submit"
                                        class="w-9 h-9 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-100 flex items-center justify-center transition-colors hover:scale-110"
                                        title="Approve">
                                        <i data-lucide="check" class="w-4 h-4"></i>
                                    </button>
                                </form>
                                <form method="POST"
                                    action="<?= BASE_URL ?>/admin/event-registrations/<?= $registration['id'] ?>/reject"
                                    class="inline">
                                    <button type="submit"
                                        class="w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 flex items-center justify-center transition-colors hover:scale-110"
                                        title="Reject">
                                        <i data-lucide="x" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                            <?php else: ?>
                            <span class="text-xs text-slate-400">Reviewed</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php else: ?>

        <!-- Empty State -->
        <div class="py-16 px-6 text-center">
            <div
                class="w-16 h-16 mx-auto rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center shadow-sm">
                <i data-lucide="users" class="w-8 h-8"></i>
            </div>
            <h3 class="mt-5 text-lg font-bold text-slate-800">No Registrations Yet</h3>
            <p class="mt-2 text-sm text-slate-500 max-w-md mx-auto">
                Student registration requests for this event will appear here.
            </p>
        </div>

        <?php endif; ?>

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