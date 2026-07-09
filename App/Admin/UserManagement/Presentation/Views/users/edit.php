<div class="space-y-6">

    <!-- Header Card -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

            <!-- Left: Avatar + Titles -->
            <div class="flex items-center gap-5">

                <?php if ($user->getProfileImage()): ?>

                <img src="<?= BASE_URL ?>/uploads/profile/<?= $user->getProfileImage() ?>"
                    class="w-24 h-24 rounded-full object-cover border-4 border-white shadow">


                <?php else: ?>

                <div class="w-24 h-24 rounded-full bg-gradient-to-br from-blue-100 to-blue-200
                    flex items-center justify-center text-blue-700 text-2xl font-bold shadow">

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
                        Edit User
                    </h1>
                    <p class="text-slate-500 mt-1">
                        Manage account information and permissions
                    </p>
                </div>

            </div>

            <!-- Back Button -->
            <a href="<?= BASE_URL ?>/admin/users" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl
                      border border-slate-200 text-slate-600 hover:bg-slate-50 transition">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Back
            </a>

        </div>

    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

        <form method="POST" action="<?= BASE_URL ?>/admin/users/<?= $user->getId() ?>/update">

            <!-- Two-column grid on md+ -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Full Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Full Name <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <i data-lucide="user" class="w-4 h-4"></i>
                        </span>
                        <input type="text" id="name" name="name" value="<?= htmlspecialchars($user->getName()) ?>"
                            class="w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl
                                      focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                      transition bg-slate-50/50 text-sm" required>
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Email Address <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                        </span>
                        <input type="email" id="email" name="email" value="<?= htmlspecialchars($user->getEmail()) ?>"
                            class="w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl
                                      focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                      transition bg-slate-50/50 text-sm" required>
                    </div>
                </div>

                <!-- Student ID -->
                <div>
                    <label for="student_id" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Student ID
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <i data-lucide="id-card" class="w-4 h-4"></i>
                        </span>
                        <input type="text" id="student_id" name="student_id"
                            value="<?= htmlspecialchars($user->getStudentId() ?? '') ?>" class="w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl
                                      focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                      transition bg-slate-50/50 text-sm">
                    </div>
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Phone Number
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <i data-lucide="phone" class="w-4 h-4"></i>
                        </span>
                        <input type="text" id="phone" name="phone"
                            value="<?= htmlspecialchars($user->getPhone() ?? '') ?>" class="w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl
                                      focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                      transition bg-slate-50/50 text-sm">
                    </div>
                </div>

                <!-- Department -->
                <div>
                    <label for="department_id" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Department
                    </label>
                    <select id="department_id" name="department_id" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl
                                   focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                   transition bg-slate-50/50 text-sm appearance-none
                                   bg-[url('data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2212%22%20height%3D%2212%22%20viewBox%3D%220%200%2012%2012%22%3E%3Cpath%20fill%3D%22%2364758b%22%20d%3D%22M6%208L1%203h10z%22%2F%3E%3C%2Fsvg%3E')]
                                   bg-[right_14px_center] bg-no-repeat bg-[length:12px]">
                        <?php foreach ($departments as $dept): ?>
                        <option value="<?= $dept['id'] ?>"
                            <?= $user->getDepartmentName() == $dept['name'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($dept['name']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Academic Year -->
                <div>
                    <label for="academic_year_id" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Academic Year
                    </label>
                    <select id="academic_year_id" name="academic_year_id" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl
                                   focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                   transition bg-slate-50/50 text-sm appearance-none
                                   bg-[url('data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2212%22%20height%3D%2212%22%20viewBox%3D%220%200%2012%2012%22%3E%3Cpath%20fill%3D%22%2364758b%22%20d%3D%22M6%208L1%203h10z%22%2F%3E%3C%2Fsvg%3E')]
                                   bg-[right_14px_center] bg-no-repeat bg-[length:12px]">
                        <?php foreach ($academicYears as $year): ?>
                        <option value="<?= $year['id'] ?>"
                            <?= $user->getAcademicYearName() == $year['name'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($year['name']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Role -->
                <div>
                    <label for="role_id" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Role
                    </label>
                    <select id="role_id" name="role_id" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl
                                   focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                   transition bg-slate-50/50 text-sm appearance-none
                                   bg-[url('data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2212%22%20height%3D%2212%22%20viewBox%3D%220%200%2012%2012%22%3E%3Cpath%20fill%3D%22%2364758b%22%20d%3D%22M6%208L1%203h10z%22%2F%3E%3C%2Fsvg%3E')]
                                   bg-[right_14px_center] bg-no-repeat bg-[length:12px]">
                        <?php foreach ($roles as $role): ?>
                        <option value="<?= $role['id'] ?>"
                            <?= $user->getRoleName() == $role['name'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($role['name']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Account Status
                    </label>
                    <select id="status" name="status" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl
                                   focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                   transition bg-slate-50/50 text-sm appearance-none
                                   bg-[url('data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2212%22%20height%3D%2212%22%20viewBox%3D%220%200%2012%2012%22%3E%3Cpath%20fill%3D%22%2364758b%22%20d%3D%22M6%208L1%203h10z%22%2F%3E%3C%2Fsvg%3E')]
                                   bg-[right_14px_center] bg-no-repeat bg-[length:12px]">
                        <option value="active" <?= $user->getStatus() == 'active' ? 'selected' : '' ?>>Active</option>
                        <option value="inactive" <?= $user->getStatus() == 'inactive' ? 'selected' : '' ?>>Inactive
                        </option>
                        <option value="blocked" <?= $user->getStatus() == 'blocked' ? 'selected' : '' ?>>Blocked
                        </option>
                    </select>
                </div>

            </div> <!-- end grid -->

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8 pt-6 border-t border-slate-200">

                <a href="<?= BASE_URL ?>/admin/users" class="px-6 py-3 rounded-xl bg-slate-100 text-slate-700 text-center
                          hover:bg-slate-200 transition">
                    Cancel
                </a>

                <button type="submit" class="px-6 py-3 rounded-xl bg-blue-600 text-white
                               hover:bg-blue-700 transition flex items-center justify-center gap-2">
                    <i data-lucide="check" class="w-4 h-4"></i>
                    Save Changes
                </button>

            </div>

        </form>

    </div>

</div>