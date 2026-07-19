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
    <!-- USER PROFILE HEADER – Enhanced with stats & actions        -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <div class="flex flex-col md:flex-row md:items-center gap-6">

            <!-- Avatar – with gradient ring and status dot -->
            <div class="relative flex-shrink-0">
                <div
                    class="w-24 h-24 rounded-full p-1 bg-gradient-to-br from-blue-500 via-indigo-500 to-purple-500 shadow-xl shadow-blue-200/40">
                    <div class="w-full h-full rounded-full overflow-hidden bg-white/10 backdrop-blur-sm">
                        <?php if ($user->getProfileImage()): ?>
                        <img src="<?= BASE_URL ?>/uploads/profile/<?= $user->getProfileImage() ?>"
                            class="w-full h-full object-cover">
                        <?php else: ?>
                        <div
                            class="w-full h-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center text-blue-700 text-2xl font-bold">
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
                    </div>
                </div>
                <!-- Status dot -->
                <?php if ($user->getStatus() === 'active'): ?>
                <span
                    class="absolute bottom-1 right-1 w-4 h-4 bg-emerald-500 border-2 border-white rounded-full shadow-md animate-pulse"></span>
                <?php else: ?>
                <span
                    class="absolute bottom-1 right-1 w-4 h-4 bg-red-500 border-2 border-white rounded-full shadow-md"></span>
                <?php endif; ?>
            </div>

            <!-- User Info -->
            <div class="flex-1 min-w-0">
                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-2">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-slate-800 tracking-tight">
                            <?= htmlspecialchars($user->getName()) ?>
                        </h1>
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 mt-1 text-sm text-slate-500">
                            <span class="flex items-center gap-1.5">
                                <i data-lucide="mail" class="w-3.5 h-3.5 text-slate-400"></i>
                                <?= htmlspecialchars($user->getEmail()) ?>
                            </span>
                            <span class="hidden sm:inline text-slate-300">|</span>
                            <span class="flex items-center gap-1.5">
                                <i data-lucide="id-card" class="w-3.5 h-3.5 text-slate-400"></i>
                                <?= htmlspecialchars($user->getStudentId() ?? 'No ID') ?>
                            </span>
                        </div>
                    </div>
                    <!-- Badges -->
                    <div class="flex flex-wrap items-center gap-2 mt-1 sm:mt-0">
                        <span
                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100/50 shadow-sm">
                            <i data-lucide="shield" class="w-3 h-3"></i>
                            <?= htmlspecialchars($user->getRoleName()) ?>
                        </span>
                        <?php if ($user->getStatus() === 'active'): ?>
                        <span
                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/50 shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            Active
                        </span>
                        <?php else: ?>
                        <span
                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-600 border border-red-200/50 shadow-sm">
                            <i data-lucide="alert-circle" class="w-3 h-3"></i>
                            <?= ucfirst(htmlspecialchars($user->getStatus())) ?>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Quick stats row -->
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 mt-4 pt-4 border-t border-slate-100/60">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-500 flex items-center justify-center">
                            <i data-lucide="building-2" class="w-3.5 h-3.5"></i>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-wider text-slate-400 font-medium">Department</p>
                            <p class="text-xs font-medium text-slate-700 truncate">
                                <?= htmlspecialchars($user->getDepartmentName() ?? '—') ?></p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-500 flex items-center justify-center">
                            <i data-lucide="graduation-cap" class="w-3.5 h-3.5"></i>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-wider text-slate-400 font-medium">Academic Year</p>
                            <p class="text-xs font-medium text-slate-700 truncate">
                                <?= htmlspecialchars($user->getAcademicYearName() ?? '—') ?></p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-500 flex items-center justify-center">
                            <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-wider text-slate-400 font-medium">Joined</p>
                            <p class="text-xs font-medium text-slate-700">
                                <?= $user->getCreatedAt() ? date('M d, Y', strtotime($user->getCreatedAt())) : '—' ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- ========================================================== -->
    <!-- EDIT FORM – Glass card with improved organization          -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-2xl border border-slate-100/60 shadow-xl p-6 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <form method="POST" action="<?= BASE_URL ?>/admin/users/<?= $user->getId() ?>/update">

            <!-- Personal Information -->
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="user" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-md font-semibold text-slate-800">Personal Information</h2>
                    <span class="ml-auto text-xs text-slate-400">All fields are required unless marked optional</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Full Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                <i data-lucide="user" class="w-4 h-4"></i>
                            </span>
                            <input type="text" id="name" name="name" value="<?= htmlspecialchars($user->getName()) ?>"
                                class="w-full pl-10 pr-4 py-2.5 border border-slate-200/80 rounded-xl
                                      focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                      transition bg-white/50 backdrop-blur-sm hover:border-blue-200 text-sm group-focus:bg-white/90"
                                required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">
                            Email Address <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                <i data-lucide="mail" class="w-4 h-4"></i>
                            </span>
                            <input type="email" id="email" name="email"
                                value="<?= htmlspecialchars($user->getEmail()) ?>"
                                class="w-full pl-10 pr-4 py-2.5 border border-slate-200/80 rounded-xl
                                      focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                      transition bg-white/50 backdrop-blur-sm hover:border-blue-200 text-sm group-focus:bg-white/90" required>
                        </div>
                    </div>

                    <!-- Student ID -->
                    <div>
                        <label for="student_id" class="block text-sm font-medium text-slate-700 mb-1.5">
                            Student ID <span class="text-slate-400 text-xs font-normal">(optional)</span>
                        </label>
                        <div class="relative group">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                <i data-lucide="id-card" class="w-4 h-4"></i>
                            </span>
                            <input type="text" id="student_id" name="student_id"
                                value="<?= htmlspecialchars($user->getStudentId() ?? '') ?>"
                                class="w-full pl-10 pr-4 py-2.5 border border-slate-200/80 rounded-xl
                                      focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                      transition bg-white/50 backdrop-blur-sm hover:border-blue-200 text-sm group-focus:bg-white/90">
                        </div>
                        <p class="mt-1 text-xs text-slate-400">Unique identifier for the student</p>
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-slate-700 mb-1.5">
                            Phone Number <span class="text-slate-400 text-xs font-normal">(optional)</span>
                        </label>
                        <div class="relative group">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                <i data-lucide="phone" class="w-4 h-4"></i>
                            </span>
                            <input type="text" id="phone" name="phone"
                                value="<?= htmlspecialchars($user->getPhone() ?? '') ?>"
                                class="w-full pl-10 pr-4 py-2.5 border border-slate-200/80 rounded-xl
                                      focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                      transition bg-white/50 backdrop-blur-sm hover:border-blue-200 text-sm group-focus:bg-white/90">
                        </div>
                        <p class="mt-1 text-xs text-slate-400">Contact number for communication</p>
                    </div>
                </div>
            </div>

            <hr class="border-slate-200/60 my-6">

            <!-- Academic & Roles -->
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-md font-semibold text-slate-800">Academic & Permissions</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Department -->
                    <div>
                        <label for="department_id" class="block text-sm font-medium text-slate-700 mb-1.5">
                            Department
                        </label>
                        <div class="relative">
                            <select id="department_id" name="department_id" class="w-full pl-4 pr-10 py-2.5 border border-slate-200/80 rounded-xl
                                      focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                      transition bg-white/50 backdrop-blur-sm hover:border-blue-200 text-sm appearance-none
                                      group-focus:bg-white/90">
                                <?php foreach ($departments as $dept): ?>
                                <option value="<?= $dept['id'] ?>"
                                    <?= $user->getDepartmentName() == $dept['name'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($dept['name']) ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Academic Year -->
                    <div>
                        <label for="academic_year_id" class="block text-sm font-medium text-slate-700 mb-1.5">
                            Academic Year
                        </label>
                        <div class="relative">
                            <select id="academic_year_id" name="academic_year_id" class="w-full pl-4 pr-10 py-2.5 border border-slate-200/80 rounded-xl
                                      focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                      transition bg-white/50 backdrop-blur-sm hover:border-blue-200 text-sm appearance-none
                                      group-focus:bg-white/90">
                                <?php foreach ($academicYears as $year): ?>
                                <option value="<?= $year['id'] ?>"
                                    <?= $user->getAcademicYearName() == $year['name'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($year['name']) ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Role -->
                    <div>
                        <label for="role_id" class="block text-sm font-medium text-slate-700 mb-1.5">
                            Role
                        </label>
                        <div class="relative">
                            <select id="role_id" name="role_id" class="w-full pl-4 pr-10 py-2.5 border border-slate-200/80 rounded-xl
                                      focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                      transition bg-white/50 backdrop-blur-sm hover:border-blue-200 text-sm appearance-none
                                      group-focus:bg-white/90">
                                <?php foreach ($roles as $role): ?>
                                <option value="<?= $role['id'] ?>"
                                    <?= $user->getRoleName() == $role['name'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($role['name']) ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-slate-700 mb-1.5">
                            Account Status
                        </label>
                        <div class="relative">
                            <select id="status" name="status" class="w-full pl-4 pr-10 py-2.5 border border-slate-200/80 rounded-xl
                                      focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                      transition bg-white/50 backdrop-blur-sm hover:border-blue-200 text-sm appearance-none
                                      group-focus:bg-white/90">
                                <option value="active" <?= $user->getStatus() == 'active' ? 'selected' : '' ?>>Active
                                </option>
                                <option value="inactive" <?= $user->getStatus() == 'inactive' ? 'selected' : '' ?>>
                                    Inactive</option>
                                <option value="blocked" <?= $user->getStatus() == 'blocked' ? 'selected' : '' ?>>Blocked
                                </option>
                            </select>
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </span>
                        </div>
                        <p class="mt-1 text-xs text-slate-400">Changing status affects user access</p>
                    </div>
                </div>
            </div>

            <hr class="border-slate-200/60 my-6">

            <!-- Security -->
            <div class="mb-6">
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center shadow-sm">
                        <i data-lucide="lock" class="w-4 h-4"></i>
                    </div>
                    <h2 class="text-md font-semibold text-slate-800">Security</h2>
                    <span class="ml-auto text-xs text-slate-400">Leave blank to keep current password</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- New Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">
                            New Password
                        </label>
                        <div class="relative group">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                <i data-lucide="key" class="w-4 h-4"></i>
                            </span>
                            <input type="password" id="password" name="password" placeholder="Enter new password..."
                                class="w-full pl-10 pr-4 py-2.5 border border-slate-200/80 rounded-xl
                                      focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                      transition bg-white/50 backdrop-blur-sm hover:border-blue-200 text-sm group-focus:bg-white/90">
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirm" class="block text-sm font-medium text-slate-700 mb-1.5">
                            Confirm Password
                        </label>
                        <div class="relative group">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                <i data-lucide="check-check" class="w-4 h-4"></i>
                            </span>
                            <input type="password" id="password_confirm" name="password_confirm"
                                placeholder="Confirm new password..."
                                class="w-full pl-10 pr-4 py-2.5 border border-slate-200/80 rounded-xl
                                      focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                      transition bg-white/50 backdrop-blur-sm hover:border-blue-200 text-sm group-focus:bg-white/90">
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================================== -->
            <!-- FORM ACTIONS – Glass bar with primary action              -->
            <!-- ========================================================== -->
            <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8 pt-6 border-t border-slate-200/60">

                <a href="<?= BASE_URL ?>/admin/users"
                    class="px-6 py-3 rounded-xl bg-white/70 backdrop-blur-sm text-slate-700 text-center
                           hover:bg-slate-100/80 hover:border-blue-200 transition border border-slate-200/60 font-medium text-sm flex items-center justify-center gap-1.5">
                    <i data-lucide="x" class="w-4 h-4"></i>
                    Cancel
                </a>

                <button type="submit"
                    class="px-6 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white
                           hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 flex items-center justify-center gap-2
                           shadow-md shadow-blue-200/50 hover:shadow-xl hover:scale-[1.02] font-medium text-sm btn-shine">
                    <i data-lucide="check" class="w-4 h-4"></i>
                    Save Changes
                </button>

            </div>

        </form>

    </div>

</div>