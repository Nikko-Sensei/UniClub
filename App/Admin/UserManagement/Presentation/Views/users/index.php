<div class="space-y-6">

    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Students Management
            </h1>
            <p class="text-slate-500">
                Overview and administration of all registered university students.
            </p>
        </div>
        <!-- <button class="...">Add Student</button> -->
    </div>

    <!-- User Management Stats -->

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">


        <!-- Total Users -->

        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 flex items-center gap-3">

            <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">

                <i data-lucide="users" class="w-5 h-5"></i>

            </div>


            <div>

                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">
                    Total Users
                </p>


                <p class="text-xl font-bold text-slate-800">
                    1,250
                </p>


                <p class="text-[11px] text-slate-400">
                    Registered accounts
                </p>

            </div>

        </div>






        <!-- Active Users -->

        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 flex items-center gap-3">

            <div class="w-10 h-10 rounded-lg bg-green-50 text-green-600 flex items-center justify-center">

                <i data-lucide="user-check" class="w-5 h-5"></i>

            </div>


            <div>

                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">
                    Active Users
                </p>


                <p class="text-xl font-bold text-slate-800">
                    1,180
                </p>


                <p class="text-[11px] text-slate-400">
                    Available accounts
                </p>

            </div>

        </div>








        <!-- Students -->

        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 flex items-center gap-3">

            <div class="w-10 h-10 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center">

                <i data-lucide="graduation-cap" class="w-5 h-5"></i>

            </div>


            <div>

                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">
                    Students
                </p>


                <p class="text-xl font-bold text-slate-800">
                    1,150
                </p>


                <p class="text-[11px] text-slate-400">
                    Student accounts
                </p>

            </div>

        </div>







        <!-- Club Managers -->

        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 flex items-center gap-3">

            <div class="w-10 h-10 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center">

                <i data-lucide="shield-check" class="w-5 h-5"></i>

            </div>


            <div>

                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">
                    Club Managers
                </p>


                <p class="text-xl font-bold text-slate-800">
                    35
                </p>


                <p class="text-[11px] text-slate-400">
                    Club administrators
                </p>

            </div>

        </div>



    </div>

    <!-- User Table Card -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">

        <!-- Filter Form -->
        <div class="p-4 md:p-5 border-b border-slate-200">
            <form method="GET" action="<?= BASE_URL ?>/admin/users" class="flex flex-wrap items-end gap-3">

                <!-- Search input -->
                <div class="relative flex-1 min-w-[560px]">
                    <i data-lucide="search"
                        class="absolute left-3.5 top-0 h-full flex items-center text-slate-400 w-4 h-4">
                    </i>
                    <input type="text" name="search" placeholder="Search by student name, ID or email..."
                        value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                        class="w-full pl-9 pr-4 py-2.5 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition text-sm bg-slate-50/50" />
                </div>

                <!-- Department filter -->
                <div class="flex-1 min-w-[50px]">
                    <select name="department_id" onchange="this.form.submit()"
                        class="w-full border border-slate-200 rounded-lg px-3 py-2.5 text-sm bg-slate-50/50 text-slate-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 transition appearance-none bg-[url('data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2212%22%20height%3D%2212%22%20viewBox%3D%220%200%2012%2012%22%3E%3Cpath%20fill%3D%22%2364758b%22%20d%3D%22M6%208L1%203h10z%22%2F%3E%3C%2Fsvg%3E')] bg-[right_12px_center] bg-no-repeat bg-[length:12px]">
                        <option value="">All Departments</option>
                        <?php foreach ($departments as $dept): ?>
                        <option value="<?= $dept['id'] ?>"
                            <?= (isset($filters['department_id']) && $filters['department_id'] == $dept['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($dept['name']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Academic Year filter -->
                <div class="flex-1 min-w-[50px]">
                    <select name="academic_year_id" onchange="this.form.submit()"
                        class="w-full border border-slate-200 rounded-lg px-3 py-2.5 text-sm bg-slate-50/50 text-slate-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 transition appearance-none bg-[url('data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2212%22%20height%3D%2212%22%20viewBox%3D%220%200%2012%2012%22%3E%3Cpath%20fill%3D%22%2364758b%22%20d%3D%22M6%208L1%203h10z%22%2F%3E%3C%2Fsvg%3E')] bg-[right_12px_center] bg-no-repeat bg-[length:12px]">
                        <option value="">All Years</option>
                        <?php foreach ($academicYears as $year): ?>
                        <option value="<?= $year['id'] ?>"
                            <?= (isset($filters['academic_year_id']) && $filters['academic_year_id'] == $year['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($year['name']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </form>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-slate-700">
                <thead
                    class="bg-slate-50/80 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-200/80">
                    <tr>
                        <th class="px-5 py-3.5 text-left whitespace-nowrap">Profile</th>
                        <th class="px-5 py-3.5 text-left whitespace-nowrap">Student ID</th>
                        <th class="px-5 py-3.5 text-left whitespace-nowrap">Full Name</th>
                        <th class="px-5 py-3.5 text-left whitespace-nowrap">Department</th>
                        <th class="px-5 py-3.5 text-left whitespace-nowrap">Year</th>
                        <th class="px-5 py-3.5 text-left whitespace-nowrap">Role</th>
                        <th class="px-5 py-3.5 text-left whitespace-nowrap">Status</th>
                        <th class="px-5 py-3.5 text-right whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($users)): ?>
                    <tr>
                        <td colspan="8" class="px-5 py-10 text-center text-slate-400">
                            <i class="fas fa-user-slash text-2xl block mb-2 text-slate-300"></i>
                            No users found.
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($users as $user): ?>
                    <tr class="border-b border-slate-100 hover:bg-slate-50/60 transition-colors">
                        <!-- Profile -->
                        <td class="px-5 py-3.5">
                            <div class="flex items-center">
                                <div class="w-9 h-9 rounded-full overflow-hidden flex items-center justify-center 
                                    bg-gradient-to-br from-blue-100 to-blue-200 
                                    text-blue-700 font-semibold text-xs">

                                    <?php if (!empty($user->getProfileImage())): ?>

                                    <img src="<?= BASE_URL ?>/uploads/profile/<?= htmlspecialchars($user->getProfileImage()) ?>"
                                        alt="<?= htmlspecialchars($user->getName()) ?>"
                                        class="w-full h-full object-cover">

                                    <?php else: ?>

                                    <?php
                                                $name = trim($user->getName());
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
                            </div>
                        </td>
                        <!-- Student ID -->
                        <td class="px-5 py-3.5 font-mono text-xs text-slate-500">
                            <?= htmlspecialchars($user->getStudentId() ?? '-') ?>
                        </td>
                        <!-- Full Name -->
                        <td class="px-5 py-3.5 text-slate-700">
                            <?= htmlspecialchars($user->getName()) ?>
                        </td>
                        <!-- Department -->
                        <td class="px-5 py-3.5 text-slate-600">
                            <?= htmlspecialchars($user->getDepartmentName() ?? '-') ?>
                        </td>
                        <!-- Year -->
                        <td class="px-5 py-3.5 text-slate-600">
                            <?= htmlspecialchars($user->getAcademicYearName() ?? '-') ?>
                        </td>
                        <!-- Role -->
                        <td class="px-5 py-3.5">
                            <span
                                class="inline-flex items-center gap-1 px-2.5 py-1 bg-indigo-50 text-indigo-700 text-xs font-medium rounded-full">
                                <?= htmlspecialchars($user->getRoleName()) ?>
                            </span>
                        </td>
                        <!-- Status -->
                        <td class="px-5 py-3.5">
                            <?php
                                    $status = $user->getStatus();
                                    $statusLabel = ucfirst($status);
                                    $dotColor = match ($status) {
                                        'active' => 'bg-emerald-500',
                                        'suspended' => 'bg-amber-500',
                                        default => 'bg-red-500'
                                    };
                                    $bgColor = match ($status) {
                                        'active' => 'bg-emerald-50 text-emerald-700',
                                        'suspended' => 'bg-amber-50 text-amber-700',
                                        default => 'bg-red-50 text-red-700'
                                    };
                                    ?>
                            <span
                                class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full <?= $bgColor ?>">
                                <span class="inline-block w-2 h-2 rounded-full <?= $dotColor ?> mr-1.5"></span>
                                <?= $statusLabel ?>
                            </span>
                        </td>
                        <!-- Actions -->
                        <td class="px-5 py-3.5 text-right">
                            <div class="flex justify-end gap-1">


                                <!-- View -->

                                <a href="<?= BASE_URL ?>/admin/users/<?= $user->getId() ?>"
                                    class="p-1.5 text-slate-500 hover:bg-slate-100 rounded-lg">

                                    <i data-lucide="eye" class="w-4 h-4"></i>

                                </a>




                                <!-- Edit -->



                                <a href="<?= BASE_URL ?>/admin/users/<?= $user->getId() ?>/edit"
                                    class="p-1.5 text-amber-600 hover:bg-amber-50 rounded-lg">

                                    <i data-lucide="square-pen" class="w-4 h-4"></i>

                                </a>






                                <!-- Delete -->

                                <form method="POST" action="<?= BASE_URL ?>/admin/users/<?= $user->getId() ?>/delete"
                                    onsubmit="return confirm('Are you sure you want to delete this user?');">


                                    <button type="submit" class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg">


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

        <div class="px-5 py-3.5 border-t border-slate-200/80 bg-slate-50/30
flex flex-col sm:flex-row sm:items-center sm:justify-between
gap-3 text-xs text-slate-500">


            <!-- Pagination Information -->

            <span>

                Showing

                <span class="font-medium text-slate-700">

                    <?= (($pagination['current_page'] - 1) * $pagination['per_page'] + 1) ?>

                    -

                    <?= min(
                            $pagination['current_page'] * $pagination['per_page'],
                            $pagination['total']
                        ) ?>

                </span>

                of

                <span class="font-medium text-slate-700">

                    <?= $pagination['total'] ?>

                </span>

                students.

            </span>





            <!-- Pagination Navigation -->

            <div class="flex items-center gap-2">


                <!-- Previous -->

                <?php if ($pagination['current_page'] > 1): ?>


                <a href="<?= buildPaginationUrl(
                                        $pagination['current_page'] - 1,
                                        $_GET
                                    ) ?>" class="w-8 h-8 border border-slate-200 rounded-lg
            hover:bg-slate-100 transition-colors
            flex items-center justify-center">


                    <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i>


                </a>


                <?php else: ?>


                <span class="w-8 h-8 border border-slate-200 rounded-lg
        opacity-50 pointer-events-none
        flex items-center justify-center">


                    <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i>


                </span>


                <?php endif; ?>







                <!-- Page Numbers -->


                <?php

                    $totalPages =
                        $pagination['total_pages'];


                    $current =
                        $pagination['current_page'];


                    $range = 2;


                    $start =
                        max(
                            1,
                            $current - $range
                        );


                    $end =
                        min(
                            $totalPages,
                            $current + $range
                        );

                    ?>





                <?php if ($start > 1): ?>


                <a href="<?= buildPaginationUrl(1, $_GET) ?>" class="w-8 h-8 border border-slate-200 rounded-lg
            hover:bg-slate-100 transition-colors
            flex items-center justify-center">

                    1

                </a>



                <?php if ($start > 2): ?>


                <span class="px-1">

                    ...

                </span>


                <?php endif; ?>


                <?php endif; ?>







                <?php for ($i = $start; $i <= $end; $i++): ?>



                <?php if ($i == $current): ?>


                <span class="w-8 h-8 bg-blue-600 text-white rounded-lg
        text-xs font-medium
        flex items-center justify-center">


                    <?= $i ?>


                </span>



                <?php else: ?>



                <a href="<?= buildPaginationUrl($i, $_GET) ?>" class="w-8 h-8 border border-slate-200 rounded-lg
            hover:bg-slate-100 transition-colors
            flex items-center justify-center">


                    <?= $i ?>


                </a>



                <?php endif; ?>


                <?php endfor; ?>







                <?php if ($end < $totalPages): ?>


                <?php if ($end < $totalPages - 1): ?>


                <span class="px-1">

                    ...

                </span>


                <?php endif; ?>



                <a href="<?= buildPaginationUrl($totalPages, $_GET) ?>" class="w-8 h-8 border border-slate-200 rounded-lg
            hover:bg-slate-100 transition-colors
            flex items-center justify-center">


                    <?= $totalPages ?>


                </a>



                <?php endif; ?>







                <!-- Next -->


                <?php if ($pagination['current_page'] < $totalPages): ?>


                <a href="<?= buildPaginationUrl(
                                        $pagination['current_page'] + 1,
                                        $_GET
                                    ) ?>" class="w-8 h-8 border border-slate-200 rounded-lg
            hover:bg-slate-100 transition-colors
            flex items-center justify-center">


                    <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>


                </a>



                <?php else: ?>


                <span class="w-8 h-8 border border-slate-200 rounded-lg
        opacity-50 pointer-events-none
        flex items-center justify-center">


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
    // Remove empty parameters to keep URL clean
    $query = array_filter($query, function ($value) {
        return $value !== '' && $value !== null;
    });
    return BASE_URL . '/admin/users?' . http_build_query($query);
}
?>