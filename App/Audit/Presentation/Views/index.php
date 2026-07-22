<div class="space-y-6">

    <!-- ========================================================== -->
    <!-- BACK BUTTON – Glass with slide-in                         -->
    <!-- ========================================================== -->
    <div class="animate-slideInLeft">
        <a href="<?= BASE_URL ?>/admin/dashboard"
            class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
            <span>Back to Dashboard</span>
        </a>
    </div>

    <!-- ========================================================== -->
    <!-- HEADER                                                     -->
    <!-- ========================================================== -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                <i data-lucide="clipboard-list" class="w-6 h-6 text-blue-500"></i>
                Audit Logs
            </h1>
            <p class="text-sm text-slate-400">Track all system activities</p>
        </div>
        <!-- Optional total count badge -->
        <?php if (isset($logs['pagination']['total']) && $logs['pagination']['total'] > 0): ?>
            <div
                class="flex items-center gap-2 text-sm text-slate-500 bg-white/50 backdrop-blur-sm px-4 py-2 rounded-full border border-slate-200/60 shadow-sm">
                <i data-lucide="activity" class="w-4 h-4 text-blue-500"></i>
                <span class="font-medium text-slate-700"><?= $logs['pagination']['total'] ?></span>
                <span class="text-slate-400">total logs</span>
            </div>
        <?php endif; ?>
    </div>

    <!-- ========================================================== -->
    <!-- FILTER CARD – Glass with improved responsiveness         -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 md:p-5 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">
        <form method="GET" class="flex flex-col md:flex-row md:items-center gap-3">
            <!-- Search -->
            <div class="relative flex-1">
                <i data-lucide="search"
                    class="absolute left-3.5 top-0 h-full flex items-center text-slate-400 w-4 h-4 pointer-events-none"></i>
                <input type="text" name="search" value="<?= htmlspecialchars($filters['search'] ?? '') ?>"
                    placeholder="Search action, entity or user..."
                    class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200/80 bg-white/50 backdrop-blur-sm text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200">
            </div>

            <!-- Action Filter -->
            <div class="w-full md:w-56">
                <select name="action" onchange="this.form.submit()"
                    class="w-full px-4 py-3 rounded-xl border border-slate-200/80 bg-white/50 backdrop-blur-sm text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition hover:border-blue-200 appearance-none bg-[url('data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2212%22%20height%3D%2212%22%20viewBox%3D%220%200%2012%2012%22%3E%3Cpath%20fill%3D%22%2364758b%22%20d%3D%22M6%208L1%203h10z%22%2F%3E%3C%2Fsvg%3E')] bg-[right_14px_center] bg-no-repeat bg-[length:12px]">
                    <option value="">All Actions</option>
                    <option value="LOGIN_SUCCESS"
                        <?= ($filters['action'] ?? '') === 'LOGIN_SUCCESS' ? 'selected' : '' ?>>Login Success</option>
                    <option value="LOGIN_FAILED" <?= ($filters['action'] ?? '') === 'LOGIN_FAILED' ? 'selected' : '' ?>>
                        Login Failed</option>
                    <option value="CREATE_CLUB" <?= ($filters['action'] ?? '') === 'CREATE_CLUB' ? 'selected' : '' ?>>
                        Create Club</option>
                    <option value="UPDATE_CLUB" <?= ($filters['action'] ?? '') === 'UPDATE_CLUB' ? 'selected' : '' ?>>
                        Update Club</option>
                    <option value="DELETE_CLUB" <?= ($filters['action'] ?? '') === 'DELETE_CLUB' ? 'selected' : '' ?>>
                        Delete Club</option>
                </select>
            </div>

            <!-- Reset / Clear filters (optional) -->
            <?php if (!empty($filters['search']) || !empty($filters['action'])): ?>
                <a href="<?= BASE_URL ?>/admin/audit-logs"
                    class="inline-flex items-center gap-1.5 px-4 py-3 rounded-xl border border-slate-200/60 text-slate-600 hover:bg-slate-100/70 transition text-sm font-medium whitespace-nowrap">
                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                    Reset
                </a>
            <?php endif; ?>
        </form>
    </div>

    <!-- ========================================================== -->
    <!-- AUDIT TABLE – Enhanced glass card                         -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead
                    class="bg-slate-50/60 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-200/60">
                    <tr>
                        <th class="px-5 py-4 text-left">User</th>
                        <th class="px-5 py-4 text-left">Action</th>
                        <th class="px-5 py-4 text-left">Entity</th>
                        <th class="px-5 py-4 text-left">IP Address</th>
                        <th class="px-5 py-4 text-left">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100/60">
                    <?php if (empty($logs['logs'])): ?>
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-400">
                                <i data-lucide="inbox" class="w-8 h-8 mx-auto text-slate-300 mb-2"></i>
                                <p class="text-sm font-medium">No audit records found</p>
                                <p class="text-xs">Try adjusting your search or filter</p>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($logs['logs'] as $log): ?>
                            <tr class="hover:bg-slate-50/40 transition-colors group">
                                <!-- User -->
                                <td class="px-5 py-4">

                                    <div class="flex items-center gap-3">


                                        <!-- Avatar -->

                                        <div class="w-9 h-9 rounded-full overflow-hidden flex items-center justify-center
            bg-gradient-to-br from-blue-100 to-blue-200
            text-blue-700
            font-semibold
            text-xs
            shadow-sm
            flex-shrink-0">


                                            <?php if (!empty($log['user_profile_image'])): ?>


                                                <img src="<?= BASE_URL ?>/uploads/profile/<?= htmlspecialchars($log['user_profile_image']) ?>"
                                                    alt="<?= htmlspecialchars($log['user_name'] ?? 'System') ?>"
                                                    class="w-full h-full object-cover">


                                            <?php else: ?>


                                                <?php

                                                $name =
                                                    trim(
                                                        $log['user_name'] ?? 'System'
                                                    );


                                                $words =
                                                    preg_split(
                                                        '/\s+/',
                                                        $name
                                                    );


                                                if (count($words) >= 2) {

                                                    $initials =
                                                        strtoupper(
                                                            substr($words[0], 0, 1)
                                                                .
                                                                substr($words[1], 0, 1)
                                                        );
                                                } else {

                                                    $initials =
                                                        strtoupper(
                                                            substr($words[0], 0, 1)
                                                        );
                                                }


                                                echo htmlspecialchars($initials);

                                                ?>


                                            <?php endif; ?>


                                        </div>



                                        <!-- User Info -->

                                        <div class="min-w-0">


                                            <p class="font-medium text-slate-700 truncate">

                                                <?= htmlspecialchars(
                                                    $log['user_name'] ?? 'System'
                                                ) ?>

                                            </p>


                                            <?php if (!empty($log['user_email'])): ?>

                                                <p class="text-xs text-slate-400 truncate">

                                                    <?= htmlspecialchars(
                                                        $log['user_email']
                                                    ) ?>

                                                </p>

                                            <?php endif; ?>


                                        </div>


                                    </div>

                                </td>

                                <!-- Action -->
                                <td class="px-5 py-4">
                                    <?php
                                    $action = $log['action'];
                                    $color = match ($action) {
                                        'LOGIN_SUCCESS' => 'bg-emerald-50 text-emerald-600 border-emerald-200/50',
                                        'LOGIN_FAILED'  => 'bg-red-50 text-red-600 border-red-200/50',
                                        'DELETE_CLUB'   => 'bg-red-50 text-red-600 border-red-200/50',
                                        'CREATE_CLUB'   => 'bg-blue-50 text-blue-600 border-blue-200/50',
                                        default         => 'bg-slate-100 text-slate-600 border-slate-200/50'
                                    };
                                    ?>
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium <?= $color ?> border">
                                        <?= htmlspecialchars($action) ?>
                                    </span>
                                </td>
                                <!-- Entity -->
                                <td class="px-5 py-4 text-slate-600">
                                    <?= htmlspecialchars($log['entity'] ?? '-') ?>
                                    <?php if ($log['entity_id']): ?>
                                        <span class="text-xs text-slate-400 ml-1">#<?= $log['entity_id'] ?></span>
                                    <?php endif; ?>
                                </td>
                                <!-- IP -->
                                <td class="px-5 py-4 text-slate-500 font-mono text-xs">
                                    <?= htmlspecialchars($log['ip_address'] ?? '-') ?>
                                </td>
                                <!-- Date -->
                                <td class="px-5 py-4 text-slate-500">
                                    <div class="flex items-center gap-1.5">
                                        <i data-lucide="clock" class="w-4 h-4 text-slate-400"></i>
                                        <span
                                            class="whitespace-nowrap"><?= date('d M Y H:i', strtotime($log['created_at'])) ?></span>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- ========================================================== -->
    <!-- PAGINATION – Refined glass style                          -->
    <!-- ========================================================== -->
    <?php if ($logs['pagination']['total'] > 0): ?>
        <div
            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 text-xs text-slate-500 bg-white/30 backdrop-blur-sm rounded-xl border border-slate-200/60 px-5 py-3.5 shadow-sm">
            <span>
                Showing
                <span class="font-medium text-slate-700">
                    <?= (($logs['pagination']['current_page'] - 1) * $logs['pagination']['per_page'] + 1) ?>
                    -
                    <?= min($logs['pagination']['current_page'] * $logs['pagination']['per_page'], $logs['pagination']['total']) ?>
                </span>
                of
                <span class="font-medium text-slate-700"><?= $logs['pagination']['total'] ?></span>
                audit logs.
            </span>

            <div class="flex items-center gap-2">
                <?php
                $current = $logs['pagination']['current_page'];
                $totalPages = $logs['pagination']['total_pages'];
                $range = 2;
                $start = max(1, $current - $range);
                $end = min($totalPages, $current + $range);
                ?>

                <!-- Previous -->
                <?php if ($current > 1): ?>
                    <a href="?<?= http_build_query(array_merge($_GET, ['page' => $current - 1])) ?>"
                        class="w-8 h-8 border border-slate-200 rounded-lg hover:bg-slate-100 transition-colors flex items-center justify-center">
                        <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i>
                    </a>
                <?php else: ?>
                    <span
                        class="w-8 h-8 border border-slate-200 rounded-lg opacity-50 pointer-events-none flex items-center justify-center">
                        <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i>
                    </span>
                <?php endif; ?>

                <!-- First Page -->
                <?php if ($start > 1): ?>
                    <a href="?<?= http_build_query(array_merge($_GET, ['page' => 1])) ?>"
                        class="w-8 h-8 border border-slate-200 rounded-lg hover:bg-slate-100 transition-colors flex items-center justify-center">1</a>
                    <?php if ($start > 2): ?>
                        <span class="px-1">…</span>
                    <?php endif; ?>
                <?php endif; ?>

                <!-- Page Numbers -->
                <?php for ($i = $start; $i <= $end; $i++): ?>
                    <?php if ($i == $current): ?>
                        <span
                            class="w-8 h-8 bg-blue-600 text-white rounded-lg text-xs font-medium flex items-center justify-center shadow-sm"><?= $i ?></span>
                    <?php else: ?>
                        <a href="?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>"
                            class="w-8 h-8 border border-slate-200 rounded-lg hover:bg-slate-100 transition-colors flex items-center justify-center"><?= $i ?></a>
                    <?php endif; ?>
                <?php endfor; ?>

                <!-- Last Page -->
                <?php if ($end < $totalPages): ?>
                    <?php if ($end < $totalPages - 1): ?>
                        <span class="px-1">…</span>
                    <?php endif; ?>
                    <a href="?<?= http_build_query(array_merge($_GET, ['page' => $totalPages])) ?>"
                        class="w-8 h-8 border border-slate-200 rounded-lg hover:bg-slate-100 transition-colors flex items-center justify-center"><?= $totalPages ?></a>
                <?php endif; ?>

                <!-- Next -->
                <?php if ($current < $totalPages): ?>
                    <a href="?<?= http_build_query(array_merge($_GET, ['page' => $current + 1])) ?>"
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

<!-- ── Required animations (already defined elsewhere, but ensure they exist) ── -->
<style>
    .animate-slideInLeft {
        animation: slideInLeft 0.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    @keyframes slideInLeft {
        0% {
            opacity: 0;
            transform: translateX(-20px);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .glass-card-light {
        background: rgba(255, 255, 255, 0.72);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
        transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .glass-card-light:hover {
        border-color: rgba(37, 99, 235, 0.2);
        box-shadow: 0 12px 40px rgba(37, 99, 235, 0.08);
    }

    .back-btn {
        transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .back-btn:hover {
        transform: translateX(-4px) scale(1.02);
        box-shadow: 0 8px 30px -8px rgba(37, 99, 235, 0.25);
    }
</style>