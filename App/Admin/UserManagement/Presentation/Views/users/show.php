<div class="space-y-6">

    <!-- ========================================================== -->
    <!-- BACK BUTTON – Glass with slide-in                         -->
    <!-- ========================================================== -->
    <div class="animate-slideInLeft">
        <a href="<?= BASE_URL ?>/admin/users"
            class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
            <span>Back to Users</span>
        </a>
    </div>

    <!-- ========================================================== -->
    <!-- PROFILE HEADER CARD – Glass style                         -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <div class="p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-6">

            <!-- Left: Avatar + Info -->
            <div class="flex items-center gap-5">

                <?php if ($user->getProfileImage()): ?>
                <img src="<?= BASE_URL ?>/uploads/profile/<?= $user->getProfileImage() ?>"
                    class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg ring-2 ring-blue-100/50">
                <?php else: ?>
                <div
                    class="w-24 h-24 rounded-full bg-gradient-to-br from-blue-100 to-blue-200
                            flex items-center justify-center text-blue-700 text-2xl font-bold shadow-lg ring-2 ring-blue-100/50">
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
                </div>
                <?php endif; ?>

                <div>
                    <h1 class="text-2xl font-bold text-slate-800">
                        <?= htmlspecialchars($user->getName()) ?>
                    </h1>
                    <p class="text-slate-500 mt-1">
                        <?= htmlspecialchars($user->getEmail()) ?>
                    </p>
                    <div class="flex flex-wrap gap-2 mt-3">
                        <span
                            class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-600 border border-blue-100/50">
                            <?= htmlspecialchars($user->getRoleName()) ?>
                        </span>
                        <?php if ($user->getStatus() === 'active'): ?>
                        <span
                            class="px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/50">
                            <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1"></span>
                            Active
                        </span>
                        <?php else: ?>
                        <span
                            class="px-3 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-600 border border-red-200/50">
                            <?= ucfirst(htmlspecialchars($user->getStatus())) ?>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex gap-3">
                <a href="<?= BASE_URL ?>/admin/users/<?= $user->getId() ?>/edit"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold text-sm transition-all duration-300 shadow-md shadow-blue-200/50 hover:shadow-xl hover:scale-[1.02] btn-shine">
                    <i data-lucide="square-pen" class="w-4 h-4"></i>
                    Edit
                </a>
            </div>

        </div>

    </div>

    <!-- ========================================================== -->
    <!-- USER INFORMATION CARD – Glass style                       -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <h2 class="text-lg font-semibold text-slate-800 mb-6 flex items-center gap-2">
            <i data-lucide="info" class="w-5 h-5 text-blue-600"></i>
            User Information
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Student ID -->
            <div>
                <p class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="id-card" class="w-4 h-4 text-slate-400"></i>
                    Student ID
                </p>
                <p class="mt-1 font-semibold text-slate-800">
                    <?= htmlspecialchars($user->getStudentId() ?? '-') ?>
                </p>
            </div>

            <!-- Phone -->
            <div>
                <p class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="phone" class="w-4 h-4 text-slate-400"></i>
                    Phone Number
                </p>
                <p class="mt-1 font-semibold text-slate-800">
                    <?= htmlspecialchars($user->getPhone() ?? '-') ?>
                </p>
            </div>

            <!-- Role -->
            <div>
                <p class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="shield" class="w-4 h-4 text-slate-400"></i>
                    Role
                </p>
                <p class="mt-1 font-semibold text-slate-800">
                    <?= htmlspecialchars($user->getRoleName()) ?>
                </p>
            </div>

            <!-- Department -->
            <div>
                <p class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="building-2" class="w-4 h-4 text-slate-400"></i>
                    Department
                </p>
                <p class="mt-1 font-semibold text-slate-800">
                    <?= htmlspecialchars($user->getDepartmentName() ?? '-') ?>
                </p>
            </div>

            <!-- Academic Year -->
            <div>
                <p class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="graduation-cap" class="w-4 h-4 text-slate-400"></i>
                    Academic Year
                </p>
                <p class="mt-1 font-semibold text-slate-800">
                    <?= htmlspecialchars($user->getAcademicYearName() ?? '-') ?>
                </p>
            </div>

            <!-- Status -->
            <div>
                <p class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="circle-check" class="w-4 h-4 text-slate-400"></i>
                    Account Status
                </p>
                <p class="mt-1 font-semibold text-slate-800 capitalize">
                    <?= htmlspecialchars($user->getStatus()) ?>
                </p>
            </div>

        </div>

    </div>

    <!-- ========================================================== -->
    <!-- ACCOUNT ACTIVITY CARD – Glass style                       -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <h2 class="text-lg font-semibold text-slate-800 mb-6 flex items-center gap-2">
            <i data-lucide="activity" class="w-5 h-5 text-blue-600"></i>
            Account Activity
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

            <!-- Last Login -->
            <div>
                <p class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="clock" class="w-4 h-4 text-slate-400"></i>
                    Last Login
                </p>
                <p class="mt-1 font-semibold text-slate-800">
                    <?= $user->getLastLoginAt() ?? 'Never logged in' ?>
                </p>
            </div>

            <!-- Created Date -->
            <div>
                <p class="text-sm text-slate-500 flex items-center gap-1.5">
                    <i data-lucide="calendar" class="w-4 h-4 text-slate-400"></i>
                    Created Date
                </p>
                <p class="mt-1 font-semibold text-slate-800">
                    <?= $user->getCreatedAt() ?? '-' ?>
                </p>
            </div>

        </div>

    </div>

</div>