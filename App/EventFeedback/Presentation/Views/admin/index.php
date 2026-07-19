<div class="space-y-6">

    <!-- ========================================================== -->
    <!-- HEADER                                                     -->
    <!-- ========================================================== -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Event Feedback</h1>
            <p class="text-sm text-slate-500">Review student feedback and ratings from university events.</p>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- FEEDBACK TABLE – Glass card                               -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <!-- Filter Bar -->
        <div class="p-4 md:p-5 border-b border-slate-200/60 bg-white/30 backdrop-blur-sm">
            <form method="GET" action="<?= BASE_URL ?>/admin/feedbacks" class="flex flex-wrap items-end gap-3">

                <!-- Search -->
                <div class="relative flex-1 min-w-[200px]">
                    <i data-lucide="search"
                        class="absolute left-3.5 top-0 h-full flex items-center text-slate-400 w-4 h-4 pointer-events-none"></i>
                    <input type="text" name="search" placeholder="Search student or comment..."
                        value="<?= htmlspecialchars($filters['search'] ?? '') ?>" onkeyup="this.form.submit()"
                        class="w-full h-11 pl-10 pr-4 border border-slate-200/80 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition text-sm bg-white/50 backdrop-blur-sm hover:border-blue-200" />
                </div>

                <!-- Rating Filter -->
                <div class="relative flex-1 min-w-[140px]">
                    <select name="rating" onchange="this.form.submit()"
                        class="w-full h-11 pl-4 pr-10 border border-slate-200/80 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition text-sm bg-white/50 backdrop-blur-sm hover:border-blue-200 appearance-none">
                        <option value="">All Ratings</option>
                        <?php for ($i = 5; $i >= 1; $i--): ?>
                        <option value="<?= $i ?>" <?= (($filters['rating'] ?? '') == $i) ? 'selected' : '' ?>>
                            <?= $i ?> Star<?= $i > 1 ? 's' : '' ?>
                        </option>
                        <?php endfor; ?>
                    </select>
                    <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                        <i data-lucide="chevron-down" class="w-4 h-4"></i>
                    </span>
                </div>
            </form>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-slate-700">
                <thead
                    class="bg-slate-50/50 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-200/60">
                    <tr>
                        <th class="px-5 py-3.5 text-left whitespace-nowrap">Student</th>
                        <th class="px-5 py-3.5 text-left whitespace-nowrap">Event</th>
                        <th class="px-5 py-3.5 text-left whitespace-nowrap">Rating</th>
                        <th class="px-5 py-3.5 text-left whitespace-nowrap">Comment</th>
                        <th class="px-5 py-3.5 text-right whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($feedbacks)): ?>
                    <tr>
                        <td colspan="5" class="px-5 py-10 text-center text-slate-400">
                            <i data-lucide="message-square" class="w-8 h-8 block mx-auto mb-2 text-slate-300"></i>
                            No feedback found.
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($feedbacks as $feedback): ?>
                    <tr class="border-b border-slate-100/60 hover:bg-slate-50/40 transition-colors">
                        <!-- Student -->
                        <td class="px-5 py-3.5 font-medium text-slate-700">
                            <?= htmlspecialchars($feedback->getUserName()) ?>
                        </td>
                        <!-- Event -->
                        <td class="px-5 py-3.5 text-slate-600">
                            <?= htmlspecialchars($feedback->getEventTitle()) ?>
                        </td>
                        <!-- Rating -->
                        <td class="px-5 py-3.5">
                            <div class="text-amber-500 text-lg flex items-center gap-0.5">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                <span class="<?= $i <= $feedback->getRating() ? 'text-amber-500' : 'text-slate-300' ?>">
                                    ★
                                </span>
                                <?php endfor; ?>
                            </div>
                        </td>
                        <!-- Comment -->
                        <td class="px-5 py-3.5 text-slate-600 max-w-md truncate">
                            <?= htmlspecialchars($feedback->getComment()) ?>
                        </td>
                        <!-- Action -->
                        <td class="px-5 py-3.5 text-right">
                            <form method="POST"
                                action="<?= BASE_URL ?>/admin/event-feedback/<?= $feedback->getId() ?>/delete"
                                onsubmit="return confirm('Delete this feedback?')" class="inline">
                                <button type="submit"
                                    class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition-colors"
                                    title="Delete">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php if ($pagination && $pagination['total_pages'] > 1): ?>
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
                feedbacks.
            </span>
            <div class="flex items-center gap-2">
                <!-- Previous -->
                <?php if ($pagination['current_page'] > 1): ?>
                <a href="<?= buildPaginationUrl($pagination['current_page'] - 1, $_GET) ?>"
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
                <a href="<?= buildPaginationUrl(1, $_GET) ?>"
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
                <a href="<?= buildPaginationUrl($i, $_GET) ?>"
                    class="w-8 h-8 border border-slate-200 rounded-lg hover:bg-slate-100 transition-colors flex items-center justify-center"><?= $i ?></a>
                <?php endif; ?>
                <?php endfor; ?>

                <?php if ($end < $totalPages): ?>
                <?php if ($end < $totalPages - 1): ?>
                <span class="px-1">…</span>
                <?php endif; ?>
                <a href="<?= buildPaginationUrl($totalPages, $_GET) ?>"
                    class="w-8 h-8 border border-slate-200 rounded-lg hover:bg-slate-100 transition-colors flex items-center justify-center"><?= $totalPages ?></a>
                <?php endif; ?>

                <!-- Next -->
                <?php if ($pagination['current_page'] < $totalPages): ?>
                <a href="<?= buildPaginationUrl($pagination['current_page'] + 1, $_GET) ?>"
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
function buildPaginationUrl($page, $query)
{
    $query['page'] = $page;
    $query = array_filter($query, function ($value) {
        return $value !== '' && $value !== null;
    });
    return BASE_URL . '/admin/feedbacks?' . http_build_query($query);
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