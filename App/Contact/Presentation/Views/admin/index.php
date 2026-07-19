<div class="space-y-6">

    <!-- ========================================================== -->
    <!-- HEADER                                                     -->
    <!-- ========================================================== -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Contact Messages</h1>
            <p class="text-slate-500">Manage student questions, feedback, and support requests.</p>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- STATISTICS CARDS – Glass with hover lift                  -->
    <!-- ========================================================== -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        <!-- Total -->
        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 flex items-center gap-3 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">
            <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shadow-sm">
                <i data-lucide="message-circle-more" class="w-5 h-5"></i>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">Total Messages</p>
                <p class="text-xl font-bold text-slate-800"><?= count($messages) ?></p>
                <p class="text-[11px] text-slate-400">All requests</p>
            </div>
        </div>

        <!-- Pending -->
        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 flex items-center gap-3 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">
            <div class="w-10 h-10 rounded-lg bg-yellow-50 text-yellow-600 flex items-center justify-center shadow-sm">
                <i data-lucide="clock" class="w-5 h-5"></i>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">Pending</p>
                <p class="text-xl font-bold text-slate-800">
                    <?= count(array_filter($messages, fn($m) => $m->getStatus() === 'pending')) ?>
                </p>
                <p class="text-[11px] text-slate-400">Waiting reply</p>
            </div>
        </div>

        <!-- Replied -->
        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 flex items-center gap-3 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">
            <div class="w-10 h-10 rounded-lg bg-green-50 text-green-600 flex items-center justify-center shadow-sm">
                <i data-lucide="send" class="w-5 h-5"></i>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">Replied</p>
                <p class="text-xl font-bold text-slate-800">
                    <?= count(array_filter($messages, fn($m) => $m->getStatus() === 'replied')) ?>
                </p>
                <p class="text-[11px] text-slate-400">Completed</p>
            </div>
        </div>

        <!-- Closed -->
        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 flex items-center gap-3 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">
            <div class="w-10 h-10 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center shadow-sm">
                <i data-lucide="archive-check" class="w-5 h-5"></i>
            </div>
            <div>
                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">Closed</p>
                <p class="text-xl font-bold text-slate-800">
                    <?= count(array_filter($messages, fn($m) => $m->getStatus() === 'closed')) ?>
                </p>
                <p class="text-[11px] text-slate-400">Archived</p>
            </div>
        </div>

    </div>

    <!-- ========================================================== -->
    <!-- CONTACT TABLE – Glass card                               -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-slate-700">
                <thead
                    class="bg-slate-50/50 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-200/60">
                    <tr>
                        <th class="px-5 py-3.5 text-left">Student</th>
                        <th class="px-5 py-3.5 text-left">Message</th>
                        <th class="px-5 py-3.5 text-left">Status</th>
                        <th class="px-5 py-3.5 text-left">Date</th>
                        <th class="px-5 py-3.5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($messages)): ?>
                    <tr>
                        <td colspan="5" class="px-5 py-10 text-center text-slate-400">
                            <i data-lucide="message-circle" class="w-8 h-8 mx-auto mb-2 text-slate-300 block"></i>
                            No contact messages found.
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($messages as $message): ?>
                    <tr class="border-b border-slate-100/60 hover:bg-slate-50/40 transition-colors">
                        <!-- Student -->
                        <td class="px-5 py-3.5">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-12 h-12 rounded-xl bg-blue-50/80 flex items-center justify-center text-blue-600 shadow-sm">
                                    <i data-lucide="user" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-800">
                                        <?= htmlspecialchars($message->getName()) ?>
                                    </p>
                                    <p class="text-xs text-slate-500">
                                        <?= htmlspecialchars($message->getEmail()) ?>
                                    </p>
                                </div>
                            </div>
                        </td>
                        <!-- Message -->
                        <td class="px-5 py-3.5">
                            <p class="font-semibold text-slate-800">
                                <?= htmlspecialchars($message->getSubject()) ?>
                            </p>
                            <p class="text-xs text-slate-500 max-w-xs truncate">
                                <?= htmlspecialchars($message->getMessage()) ?>
                            </p>
                        </td>
                        <!-- Status -->
                        <td class="px-5 py-3.5">
                            <?php
                                $status = $message->getStatus();
                                $statusClass = match($status) {
                                    'pending' => 'bg-yellow-50 text-yellow-700 border-yellow-200/50',
                                    'replied' => 'bg-green-50 text-green-700 border-green-200/50',
                                    'closed'  => 'bg-slate-100 text-slate-700 border-slate-200/50',
                                    default   => 'bg-gray-100 text-gray-700 border-gray-200/50'
                                };
                            ?>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium <?= $statusClass ?> border">
                                <?= ucfirst($status) ?>
                            </span>
                        </td>
                        <!-- Date -->
                        <td class="px-5 py-3.5 text-slate-500 whitespace-nowrap">
                            <?= date('M d, Y', strtotime($message->getCreatedAt())) ?>
                        </td>
                        <!-- Actions -->
                        <td class="px-5 py-3.5">
                            <div class="flex justify-end gap-1">
                                <!-- View -->
                                <a href="<?= BASE_URL ?>/admin/contacts/<?= $message->getId() ?>"
                                    class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                                    title="View">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </a>
                                <!-- Reply -->
                                <form method="POST"
                                    action="<?= BASE_URL ?>/admin/contacts/<?= $message->getId() ?>/status"
                                    class="inline">
                                    <input type="hidden" name="status" value="replied">
                                    <button type="submit"
                                        class="p-1.5 text-green-600 hover:bg-green-50 rounded-lg transition-colors"
                                        title="Mark as Replied">
                                        <i data-lucide="reply" class="w-4 h-4"></i>
                                    </button>
                                </form>
                                <!-- Close -->
                                <form method="POST"
                                    action="<?= BASE_URL ?>/admin/contacts/<?= $message->getId() ?>/status"
                                    class="inline">
                                    <input type="hidden" name="status" value="closed">
                                    <button type="submit"
                                        class="p-1.5 text-slate-600 hover:bg-slate-100 rounded-lg transition-colors"
                                        title="Archive">
                                        <i data-lucide="archive" class="w-4 h-4"></i>
                                    </button>
                                </form>
                                <!-- Delete -->
                                <form method="POST"
                                    action="<?= BASE_URL ?>/admin/contacts/<?= $message->getId() ?>/delete"
                                    onsubmit="return confirm('Delete this message?')" class="inline">
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
        <?php if (isset($pagination) && $pagination['total'] > 0): ?>
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
                messages.
            </span>
            <div class="flex items-center gap-2">
                <?php if ($pagination['current_page'] > 1): ?>
                <a href="<?= buildContactPaginationUrl($pagination['current_page'] - 1, $_GET) ?>"
                    class="w-8 h-8 border border-slate-200 rounded-lg hover:bg-slate-100 transition-colors flex items-center justify-center">
                    <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i>
                </a>
                <?php else: ?>
                <span
                    class="w-8 h-8 border border-slate-200 rounded-lg opacity-50 pointer-events-none flex items-center justify-center">
                    <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i>
                </span>
                <?php endif; ?>

                <?php
                    $totalPages = $pagination['total_pages'];
                    $current = $pagination['current_page'];
                    $range = 2;
                    $start = max(1, $current - $range);
                    $end = min($totalPages, $current + $range);
                ?>
                <?php if ($start > 1): ?>
                <a href="<?= buildContactPaginationUrl(1, $_GET) ?>"
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
                <a href="<?= buildContactPaginationUrl($i, $_GET) ?>"
                    class="w-8 h-8 border border-slate-200 rounded-lg hover:bg-slate-100 transition-colors flex items-center justify-center"><?= $i ?></a>
                <?php endif; ?>
                <?php endfor; ?>

                <?php if ($end < $totalPages): ?>
                <?php if ($end < $totalPages - 1): ?>
                <span class="px-1">…</span>
                <?php endif; ?>
                <a href="<?= buildContactPaginationUrl($totalPages, $_GET) ?>"
                    class="w-8 h-8 border border-slate-200 rounded-lg hover:bg-slate-100 transition-colors flex items-center justify-center"><?= $totalPages ?></a>
                <?php endif; ?>

                <?php if ($pagination['current_page'] < $totalPages): ?>
                <a href="<?= buildContactPaginationUrl($pagination['current_page'] + 1, $_GET) ?>"
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
 * Build pagination URL with current filters
 */
function buildContactPaginationUrl($page, $query)
{
    $query['page'] = $page;
    $query = array_filter($query, function ($value) {
        return $value !== '' && $value !== null;
    });
    return BASE_URL . '/admin/contacts?' . http_build_query($query);
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