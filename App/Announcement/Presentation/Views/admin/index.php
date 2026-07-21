<div class="space-y-6">

    <!-- ========================================================== -->
    <!-- HEADER                                                     -->
    <!-- ========================================================== -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Announcement Management</h1>
            <p class="text-slate-500">Overview and administration of university announcements.</p>
        </div>
        <a href="<?= BASE_URL ?>/admin/announcements/create"
            class="inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-xl transition-all duration-300 shadow-md shadow-blue-200/50 hover:shadow-xl hover:scale-[1.02] btn-shine">
            <i data-lucide="plus" class="w-4 h-4"></i>
            Create Announcement
        </a>
    </div>

    <!-- ========================================================== -->
    <!-- STATISTICS CARDS – Glass with hover lift                  -->
    <!-- ========================================================== -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        <!-- Total -->
        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 flex items-center gap-3 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">
            <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shadow-sm">
                <i data-lucide="megaphone" class="w-5 h-5"></i>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">Total Announcements</p>
                <p class="text-xl font-bold text-slate-800"><?= count($announcements) ?></p>
                <p class="text-[11px] text-slate-400">All announcements</p>
            </div>
        </div>

        <!-- Published -->
        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 flex items-center gap-3 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">
            <div class="w-10 h-10 rounded-lg bg-green-50 text-green-600 flex items-center justify-center shadow-sm">
                <i data-lucide="send" class="w-5 h-5"></i>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">Published</p>
                <p class="text-xl font-bold text-slate-800">
                    <?= count(array_filter($announcements, fn($a) => $a->getStatus() === 'published')) ?>
                </p>
                <p class="text-[11px] text-slate-400">Visible to students</p>
            </div>
        </div>

        <!-- Draft -->
        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 flex items-center gap-3 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">
            <div class="w-10 h-10 rounded-lg bg-yellow-50 text-yellow-600 flex items-center justify-center shadow-sm">
                <i data-lucide="file-edit" class="w-5 h-5"></i>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">Draft</p>
                <p class="text-xl font-bold text-slate-800">
                    <?= count(array_filter($announcements, fn($a) => $a->getStatus() === 'draft')) ?>
                </p>
                <p class="text-[11px] text-slate-400">Pending publication</p>
            </div>
        </div>

        <!-- High Priority -->
        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 flex items-center gap-3 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">
            <div class="w-10 h-10 rounded-lg bg-red-50 text-red-600 flex items-center justify-center shadow-sm">
                <i data-lucide="triangle-alert" class="w-5 h-5"></i>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">High Priority</p>
                <p class="text-xl font-bold text-slate-800">
                    <?= count(array_filter($announcements, fn($a) => $a->getPriority() === 'high')) ?>
                </p>
                <p class="text-[11px] text-slate-400">Important notices</p>
            </div>
        </div>

    </div>

    <!-- ========================================================== -->
    <!-- ANNOUNCEMENT TABLE – Glass card                           -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-slate-700">
                <thead
                    class="bg-slate-50/50 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-200/60">
                    <tr>
                        <th class="px-5 py-3.5 text-left">Announcement</th>
                        <th class="px-5 py-3.5 text-left">Priority</th>
                        <th class="px-5 py-3.5 text-left">Visibility</th>
                        <th class="px-5 py-3.5 text-left">Status</th>
                        <th class="px-5 py-3.5 text-left">Date</th>
                        <th class="px-5 py-3.5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($announcements)): ?>
                    <tr>
                        <td colspan="5" class="px-5 py-10 text-center text-slate-400">
                            <i data-lucide="megaphone" class="w-8 h-8 mx-auto mb-2 text-slate-300 block"></i>
                            No announcements found.
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($announcements as $announcement): ?>
                    <tr class="border-b border-slate-100/60 hover:bg-slate-50/40 transition-colors">
                        <td class="px-5 py-3.5">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 rounded-xl bg-blue-50/80 flex items-center justify-center shadow-sm">
                                    <i data-lucide="megaphone" class="text-blue-500 w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-800">
                                        <?= htmlspecialchars($announcement->getTitle()) ?>
                                    </p>
                                    <p class="text-xs text-slate-500">Announcement</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-3.5">
                            <?php
                                    $priority = $announcement->getPriority();
                                    $priorityClass = match ($priority) {
                                        'high' => 'bg-red-50 text-red-700 border-red-200/50',
                                        'medium' => 'bg-amber-50 text-amber-700 border-amber-200/50',
                                        default => 'bg-blue-50 text-blue-700 border-blue-200/50'
                                    };
                                    ?>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium <?= $priorityClass ?> border">
                                <?= ucfirst($priority) ?>
                            </span>
                        </td>

                        <td class="px-5 py-3.5">

                            <?php

$visibility = $announcement->getVisibility();


$visibilityStyle = match($visibility){

    'club_members' => [
        'class' => 'bg-purple-50 text-purple-700 border-purple-200/50',
        'icon'  => 'users',
        'label' => 'Club Members'
    ],


    default => [
        'class' => 'bg-blue-50 text-blue-700 border-blue-200/50',
        'icon'  => 'globe',
        'label' => 'All Users'
    ]

};

?>

                            <span class="
        inline-flex
        items-center
        gap-1.5
        px-3
        py-1
        rounded-full
        text-xs
        font-medium
        border
        <?= $visibilityStyle['class'] ?>
    ">

                                <i data-lucide="<?= $visibilityStyle['icon'] ?>" class="w-3.5 h-3.5">
                                </i>


                                <?= $visibilityStyle['label'] ?>


                            </span>


                        </td>
                        <td class="px-5.5 py-3.5 ">
                            <?php
                                    $status = $announcement->getStatus();
                                    $statusClass = $status === 'published'
                                        ? 'bg-emerald-50 text-emerald-700 border-emerald-200/50'
                                        : 'bg-yellow-50 text-yellow-700 border-yellow-200/50';
                                    ?>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium <?= $statusClass ?> border">
                                <?= ucfirst($status) ?>
                            </span>
                        </td>
                        <td class="px-5 py-3.5 text-slate-600 whitespace-nowrap">
                            <?= date('M d, Y', strtotime($announcement->getCreatedAt())) ?>
                        </td>
                        <td class="px-5 py-3.5">
                            <div class="flex justify-end gap-1">
                                <a href="<?= BASE_URL ?>/admin/announcements/<?= $announcement->getId() ?>"
                                    class="p-1.5 text-slate-500 hover:bg-slate-100 rounded-lg transition-colors"
                                    title="View">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </a>
                                <a href="<?= BASE_URL ?>/admin/announcements/<?= $announcement->getId() ?>/edit"
                                    class="p-1.5 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors"
                                    title="Edit">
                                    <i data-lucide="square-pen" class="w-4 h-4"></i>
                                </a>
                                <form method="POST"
                                    action="<?= BASE_URL ?>/admin/announcements/<?= $announcement->getId() ?>/delete"
                                    onsubmit="return confirm('Delete this announcement?')" class="inline">
                                    <button type="submit"
                                        class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition-colors"
                                        title="Delete">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php if ($pagination !== null && $pagination['total'] > 0): ?>
        <div
            class="px-5 py-3.5 border-t border-slate-200/60 bg-slate-50/20 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 text-xs text-slate-500">
            <span>
                Showing
                <span class="font-medium text-slate-700">
                    <?= (($pagination['current_page'] - 1) * $pagination['per_page']) + 1 ?>
                    -
                    <?= min($pagination['current_page'] * $pagination['per_page'], $pagination['total']) ?>
                </span>
                of
                <span class="font-medium text-slate-700"><?= $pagination['total'] ?></span>
                announcements.
            </span>
            <div class="flex items-center gap-2">
                <!-- Previous -->
                <?php if ($pagination['current_page'] > 1): ?>
                <a href="<?= buildAnnouncementPaginationUrl($pagination['current_page'] - 1, $_GET) ?>"
                    class="w-8 h-8 border border-slate-200 rounded-lg hover:bg-slate-100 transition-colors flex items-center justify-center">
                    <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i>
                </a>
                <?php else: ?>
                <span
                    class="w-8 h-8 border border-slate-200 rounded-lg opacity-50 pointer-events-none flex items-center justify-center">
                    <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i>
                </span>
                <?php endif; ?>

                <!-- Page Numbers -->
                <?php
                    $totalPages = $pagination['total_pages'];
                    $current = $pagination['current_page'];
                    $range = 2;
                    $start = max(1, $current - $range);
                    $end = min($totalPages, $current + $range);
                    ?>
                <?php if ($start > 1): ?>
                <a href="<?= buildAnnouncementPaginationUrl(1, $_GET) ?>"
                    class="w-8 h-8 border border-slate-200 rounded-lg hover:bg-slate-100 transition-colors flex items-center justify-center">1</a>
                <?php if ($start > 2): ?>
                <span class="px-1">…</span>
                <?php endif; ?>
                <?php endif; ?>

                <?php for ($i = $start; $i <= $end; $i++): ?>
                <?php if ($i == $current): ?>
                <span
                    class="w-8 h-8 bg-blue-600 text-white rounded-lg text-xs font-medium flex items-center justify-center shadow-sm"><?= $i ?></span>
                <?php else: ?>
                <a href="<?= buildAnnouncementPaginationUrl($i, $_GET) ?>"
                    class="w-8 h-8 border border-slate-200 rounded-lg hover:bg-slate-100 transition-colors flex items-center justify-center"><?= $i ?></a>
                <?php endif; ?>
                <?php endfor; ?>

                <?php if ($end < $totalPages): ?>
                <?php if ($end < $totalPages - 1): ?>
                <span class="px-1">…</span>
                <?php endif; ?>
                <a href="<?= buildAnnouncementPaginationUrl($totalPages, $_GET) ?>"
                    class="w-8 h-8 border border-slate-200 rounded-lg hover:bg-slate-100 transition-colors flex items-center justify-center"><?= $totalPages ?></a>
                <?php endif; ?>

                <!-- Next -->
                <?php if ($pagination['current_page'] < $totalPages): ?>
                <a href="<?= buildAnnouncementPaginationUrl($pagination['current_page'] + 1, $_GET) ?>"
                    class="w-8 h-8 border border-slate-200 rounded-lg hover:bg-slate-100 transition-colors flex items-center justify-center">
                    <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                </a>
                <?php else: ?>
                <span
                    class="w-8 h-8 border border-slate-200 rounded-lg opacity-50 pointer-events-none flex items-center justify-center">
                    <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                </span>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

    </div>

</div>

<?php
/**
 * Build announcement pagination URL with current filters
 */
function buildAnnouncementPaginationUrl(int $page, array $query): string
{
    $query['page'] = $page;
    $query = array_filter($query, function ($value) {
        return $value !== '' && $value !== null;
    });
    return BASE_URL . '/admin/announcements?' . http_build_query($query);
}
?>

<!-- ── Scripts for Lucide Icons ── -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});
</script>