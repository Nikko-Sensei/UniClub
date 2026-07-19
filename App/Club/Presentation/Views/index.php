<div class="space-y-6">

    <!-- ========================================================== -->
    <!-- HEADER – Clean, modern with action buttons                -->
    <!-- ========================================================== -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Club Management</h1>
            <p class="text-slate-500">Overview and administration of all active campus organizations.</p>
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="<?= BASE_URL ?>/admin/memberships"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-slate-100/80 backdrop-blur-sm text-slate-700 rounded-xl hover:bg-slate-200/80 transition-all hover:scale-[1.02] border border-slate-200/60">
                <i data-lucide="users" class="w-4 h-4"></i>
                Club Membership
            </a>
            <a href="<?= BASE_URL ?>/admin/clubs/create"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all hover:scale-[1.02] shadow-md shadow-blue-200/50">
                <i data-lucide="plus" class="w-4 h-4"></i>
                Create Club
            </a>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- STATISTICS CARDS – Glass with hover lift                  -->
    <!-- ========================================================== -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 flex items-center gap-3 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">
            <div
                class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0 shadow-sm">
                <i data-lucide="building-2" class="w-5 h-5"></i>
            </div>
            <div class="min-w-0">
                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">Total Clubs</p>
                <p class="text-xl font-bold text-slate-800"><?= $statistics['total_clubs'] ?? 0 ?></p>
                <p class="text-[11px] text-slate-400 truncate">All registered clubs</p>
            </div>
        </div>

        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 flex items-center gap-3 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">
            <div
                class="w-10 h-10 rounded-lg bg-green-50 text-green-600 flex items-center justify-center flex-shrink-0 shadow-sm">
                <i data-lucide="circle-check" class="w-5 h-5"></i>
            </div>
            <div class="min-w-0">
                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">Active Clubs</p>
                <p class="text-xl font-bold text-slate-800"><?= $statistics['active_clubs'] ?? 0 ?></p>
                <p class="text-[11px] text-slate-400 truncate">Currently active</p>
            </div>
        </div>

        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 flex items-center gap-3 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">
            <div
                class="w-10 h-10 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center flex-shrink-0 shadow-sm">
                <i data-lucide="layers" class="w-5 h-5"></i>
            </div>
            <div class="min-w-0">
                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">Categories</p>
                <p class="text-xl font-bold text-slate-800"><?= $statistics['categories'] ?? 0 ?></p>
                <p class="text-[11px] text-slate-400 truncate">Unique categories</p>
            </div>
        </div>

        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 flex items-center gap-3 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">
            <div
                class="w-10 h-10 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center flex-shrink-0 shadow-sm">
                <i data-lucide="users" class="w-5 h-5"></i>
            </div>
            <div class="min-w-0">
                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">Total Members</p>
                <p class="text-xl font-bold text-slate-800"><?= $statistics['total_members'] ?? 0 ?></p>
                <p class="text-[11px] text-slate-400 truncate">Across all clubs</p>
            </div>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- FILTER + TABLE – Glass container                          -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <!-- Filter Bar -->
        <div class="p-4 md:p-5 border-b border-slate-200/60 bg-white/30 backdrop-blur-sm">
            <form method="GET" action="<?= BASE_URL ?>/admin/clubs" class="flex flex-wrap items-end gap-3">

                <!-- Search -->
                <div class="relative flex-1 min-w-[200px]">
                    <i data-lucide="search"
                        class="absolute left-3.5 top-0 h-full flex items-center text-slate-400 w-4 h-4 pointer-events-none"></i>
                    <input type="text" name="search" placeholder="Search by club name or ID..."
                        value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                        class="w-full h-11 pl-10 pr-4 border border-slate-200/80 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition text-sm bg-white/50 backdrop-blur-sm hover:border-blue-200" />
                </div>

                <!-- Category filter -->
                <div class="relative flex-1 min-w-[140px]">
                    <select name="category_id" onchange="this.form.submit()"
                        class="w-full h-11 pl-4 pr-10 border border-slate-200/80 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition text-sm bg-white/50 backdrop-blur-sm hover:border-blue-200 appearance-none">
                        <option value="">All Categories</option>
                        <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"
                            <?= (isset($filters['category_id']) && $filters['category_id'] == $category['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($category['name']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                        <i data-lucide="chevron-down" class="w-4 h-4"></i>
                    </span>
                </div>

                <!-- Status filter -->
                <div class="relative flex-1 min-w-[140px]">
                    <select name="status" onchange="this.form.submit()"
                        class="w-full h-11 pl-4 pr-10 border border-slate-200/80 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition text-sm bg-white/50 backdrop-blur-sm hover:border-blue-200 appearance-none">
                        <option value="">All Status</option>
                        <option value="active"
                            <?= (isset($filters['status']) && $filters['status'] == 'active') ? 'selected' : '' ?>>
                            Active</option>
                        <option value="inactive"
                            <?= (isset($filters['status']) && $filters['status'] == 'inactive') ? 'selected' : '' ?>>
                            Inactive</option>
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
                        <th class="px-5 py-3.5 text-left whitespace-nowrap">Logo</th>
                        <th class="px-5 py-3.5 text-left whitespace-nowrap">Club Name</th>
                        <th class="px-5 py-3.5 text-left whitespace-nowrap">Category</th>
                        <th class="px-5 py-3.5 text-left whitespace-nowrap">Members</th>
                        <th class="px-5 py-3.5 text-left whitespace-nowrap">Status</th>
                        <th class="px-5 py-3.5 text-left whitespace-nowrap">Created Date</th>
                        <th class="px-5 py-3.5 text-right whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($clubs)): ?>
                    <tr>
                        <td colspan="7" class="px-5 py-10 text-center text-slate-400">
                            <i data-lucide="building-2" class="w-8 h-8 block mx-auto mb-2 text-slate-300"></i>
                            No clubs found.
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php
                        $categoryMap = [];
                        foreach ($categories as $cat) {
                            $categoryMap[$cat['id']] = $cat['name'];
                        }
                        ?>
                    <?php foreach ($clubs as $club): ?>
                    <tr class="border-b border-slate-100/60 hover:bg-slate-50/40 transition-colors">
                        <!-- Logo -->
                        <td class="px-5 py-3.5">
                            <div
                                class="w-9 h-9 rounded-full overflow-hidden flex items-center justify-center 
                                bg-gradient-to-br from-blue-100 to-blue-200 text-blue-700 font-semibold text-xs shadow-sm">
                                <?php if ($club->getLogo()): ?>
                                <img src="<?= BASE_URL ?>/uploads/clubs/<?= htmlspecialchars($club->getLogo()) ?>"
                                    alt="<?= htmlspecialchars($club->getName()) ?>" class="w-full h-full object-cover">
                                <?php else: ?>
                                <?php
                                        $name = trim($club->getName());
                                        $words = preg_split('/\s+/', $name);
                                        if (count($words) >= 2) {
                                            $initials = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
                                        } else {
                                            $initials = strtoupper(substr($words[0], 0, 1));
                                        }
                                        echo htmlspecialchars($initials);
                                    ?>
                                <?php endif; ?>
                            </div>
                        </td>
                        <!-- Club Name -->
                        <td class="px-5 py-3.5 font-medium text-slate-700">
                            <?= htmlspecialchars($club->getName()) ?>
                        </td>
                        <!-- Category -->
                        <td class="px-5 py-3.5 text-slate-600">
                            <?php
                                    $categoryName = $categoryMap[$club->getCategoryId()] ?? '-';
                                    echo htmlspecialchars($categoryName);
                                    ?>
                        </td>
                        <!-- Members -->
                        <td class="px-5 py-3.5 text-slate-600">
                            <?php
                                    $memberCount = method_exists($club, 'getMemberCount')
                                        ? $club->getMemberCount()
                                        : (method_exists($club, 'getMembers') ? count($club->getMembers()) : 0);
                                    echo number_format($memberCount);
                                    ?>
                        </td>
                        <!-- Status -->
                        <td class="px-5 py-3.5">
                            <?php
                                    $status = $club->getStatus();
                                    $statusLabel = ucfirst($status);
                                    $dotColor = match ($status) {
                                        'active' => 'bg-emerald-500',
                                        'inactive' => 'bg-red-500',
                                        default => 'bg-slate-500'
                                    };
                                    $bgColor = match ($status) {
                                        'active' => 'bg-emerald-50 text-emerald-700 border-emerald-200/50',
                                        'inactive' => 'bg-red-50 text-red-700 border-red-200/50',
                                        default => 'bg-slate-50 text-slate-700 border-slate-200/50'
                                    };
                                    ?>
                            <span
                                class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full <?= $bgColor ?> border">
                                <span class="inline-block w-2 h-2 rounded-full <?= $dotColor ?> mr-1.5"></span>
                                <?= $statusLabel ?>
                            </span>
                        </td>
                        <!-- Created Date -->
                        <td class="px-5 py-3.5 text-slate-600 whitespace-nowrap">
                            <?php
                                    $created = method_exists($club, 'getCreatedAt') ? $club->getCreatedAt() : (method_exists($club, 'getCreatedDate') ? $club->getCreatedDate() : null);
                                    echo $created ? date('M d, Y', strtotime($created)) : '-';
                                    ?>
                        </td>
                        <!-- Actions -->
                        <td class="px-5 py-3.5 text-right">
                            <div class="flex justify-end gap-1">
                                <a href="<?= BASE_URL ?>/admin/clubs/<?= $club->getId() ?>"
                                    class="p-1.5 text-slate-500 hover:bg-slate-100 rounded-lg transition-colors"
                                    title="View">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </a>
                                <a href="<?= BASE_URL ?>/admin/clubs/<?= $club->getId() ?>/edit"
                                    class="p-1.5 text-amber-600 hover:bg-amber-50 rounded-lg transition-colors"
                                    title="Edit">
                                    <i data-lucide="square-pen" class="w-4 h-4"></i>
                                </a>
                                <form method="POST" action="<?= BASE_URL ?>/admin/clubs/<?= $club->getId() ?>/delete"
                                    onsubmit="return confirm('Delete this club?')" class="inline">
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
        <?php if ($pagination !== null): ?>
        <div
            class="px-5 py-3.5 border-t border-slate-200/60 bg-slate-50/20 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 text-xs text-slate-500">
            <span>
                Showing
                <span class="font-medium text-slate-700">
                    <?= (($pagination['current_page'] - 1) * $pagination['per_page'] + 1) ?>
                    -
                    <?= min($pagination['current_page'] * $pagination['per_page'], $pagination['total']) ?>
                </span>
                of
                <span class="font-medium text-slate-700"><?= $pagination['total'] ?></span>
                clubs.
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

                <!-- Page numbers -->
                <?php
                    $totalPages = $pagination['total_pages'];
                    $current = $pagination['current_page'];
                    $range = 2;
                    $start = max(1, $current - $range);
                    $end = min($totalPages, $current + $range);
                    if ($start > 1): ?>
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
 * Helper: Build pagination URL with current filters
 */
function buildPaginationUrl($page, $query)
{
    $query['page'] = $page;
    $query = array_filter($query, function ($value) {
        return $value !== '' && $value !== null;
    });
    return BASE_URL . '/admin/clubs?' . http_build_query($query);
}
?>