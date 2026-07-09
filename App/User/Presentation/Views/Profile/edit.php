<?php
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']); // clear after showing once
?>

<div class="space-y-6">

    <!-- Header Card (matches admin layout) -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    Edit Profile
                </h1>
                <p class="text-slate-500 mt-1">
                    Update your personal information and profile picture
                </p>
            </div>

            <a href="<?= BASE_URL ?>/profile" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl
                      border border-slate-200 text-slate-600 hover:bg-slate-50 transition">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Back to Profile
            </a>

        </div>

    </div>

    <!-- Main Card: Sidebar + Form -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

        <div class="grid grid-cols-1 lg:grid-cols-3">

            <!-- Sidebar (user info) -->
            <aside class="bg-slate-50/60 p-6 border-b lg:border-b-0 lg:border-r border-slate-200">

                <div class="flex flex-col items-center text-center">

                    <!-- Avatar -->
                    <div class="w-24 h-24 rounded-full bg-gradient-to-br from-blue-100 to-blue-200
                                flex items-center justify-center text-3xl font-bold text-blue-700 shadow
                                border-4 border-white ring-2 ring-blue-500/20">

                        <?php if (!empty($user->getProfileImage())): ?>
                        <img src="<?= BASE_URL ?>/uploads/profile/<?= htmlspecialchars($user->getProfileImage()) ?>"
                            class="w-full h-full rounded-full object-cover" alt="Profile">
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

                    <h2 class="mt-4 text-lg font-semibold text-slate-800">
                        <?= htmlspecialchars($user->getName()) ?>
                    </h2>

                    <p class="text-slate-500 text-sm">
                        <?= htmlspecialchars($roleName ?? 'Student') ?>
                    </p>

                    <div class="mt-3 text-sm text-slate-600 space-y-1">
                        <p class="flex items-center justify-center gap-2">
                            <i data-lucide="mail" class="w-3.5 h-3.5 text-slate-400"></i>
                            <?= htmlspecialchars($user->getEmail()) ?>
                        </p>
                        <p class="flex items-center justify-center gap-2">
                            <i data-lucide="id-card" class="w-3.5 h-3.5 text-slate-400"></i>
                            <?= htmlspecialchars($user->getStudentId()) ?>
                        </p>
                    </div>

                    <hr class="my-5 w-full border-slate-200">

                    <div class="w-full text-sm space-y-3 text-slate-600">

                        <div class="flex justify-between">
                            <span class="text-slate-500">Department</span>
                            <span class="font-medium text-slate-800">
                                <?= htmlspecialchars($departmentName ?? '-') ?>
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-slate-500">Academic Year</span>
                            <span class="font-medium text-slate-800">
                                <?= htmlspecialchars($academicYearName ?? '-') ?>
                            </span>
                        </div>

                        <div class="flex justify-between items-center">
                            <span class="text-slate-500">Status</span>
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                <?= $user->getStatus() === 'active'
                                    ? 'bg-emerald-50 text-emerald-700'
                                    : 'bg-red-50 text-red-700' ?>">
                                <?= ucfirst($user->getStatus()) ?>
                            </span>
                        </div>

                    </div>

                </div>

            </aside>

            <!-- Form -->
            <main class="lg:col-span-2 p-6 md:p-8">

                <h2 class="text-xl font-semibold text-slate-800 mb-6">
                    <i data-lucide="square-pen" class="w-5 h-5 inline mr-2 text-blue-600"></i>
                    Update Information
                </h2>

                <form action="<?= BASE_URL ?>/profile/update" method="POST" enctype="multipart/form-data"
                    class="space-y-5">

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
                                class="w-full pl-10 pr-4 py-2.5 border rounded-xl
                                          <?= isset($errors['name']) ? 'border-red-500' : 'border-slate-200' ?>
                                          focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                          transition bg-slate-50/50 text-sm">
                        </div>
                        <?php if (!empty($errors['name'])): ?>
                        <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                            <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i>
                            <?= $errors['name'] ?>
                        </p>
                        <?php endif; ?>
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
                                value="<?= htmlspecialchars($user->getPhone() ?? '') ?>" class="w-full pl-10 pr-4 py-2.5 border rounded-xl
                                          <?= isset($errors['phone']) ? 'border-red-500' : 'border-slate-200' ?>
                                          focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                          transition bg-slate-50/50 text-sm">
                        </div>
                        <?php if (!empty($errors['phone'])): ?>
                        <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                            <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i>
                            <?= $errors['phone'] ?>
                        </p>
                        <?php endif; ?>
                    </div>

                    <!-- Profile Image -->
                    <div>
                        <label for="profile_image" class="block text-sm font-medium text-slate-700 mb-1.5">
                            Profile Image
                        </label>
                        <div class="relative">
                            <input type="file" id="profile_image" name="profile_image" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl
                                          focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                          transition bg-slate-50/50 text-sm
                                          file:mr-4 file:py-1.5 file:px-4 file:rounded-lg file:border-0
                                          file:bg-blue-50 file:text-blue-700 file:text-sm file:font-medium
                                          hover:file:bg-blue-100">
                        </div>
                        <?php if (!empty($errors['profile_image'])): ?>
                        <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                            <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i>
                            <?= $errors['profile_image'] ?>
                        </p>
                        <?php endif; ?>
                        <p class="text-xs text-slate-400 mt-1">
                            Recommended: Square image, max 2MB (JPEG, PNG, GIF)
                        </p>
                    </div>

                    <!-- Readonly Department & Year -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                Department
                            </label>
                            <input type="text" value="<?= htmlspecialchars($departmentName ?? '-') ?>" disabled
                                class="w-full px-4 py-2.5 rounded-xl bg-slate-100 border border-slate-200 text-slate-600 text-sm cursor-not-allowed">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                                Academic Year
                            </label>
                            <input type="text" value="<?= htmlspecialchars($academicYearName ?? '-') ?>" disabled
                                class="w-full px-4 py-2.5 rounded-xl bg-slate-100 border border-slate-200 text-slate-600 text-sm cursor-not-allowed">
                        </div>

                    </div>

                    <!-- Actions -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-slate-200">

                        <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-600 text-white
                                       hover:bg-blue-700 transition flex items-center justify-center gap-2">
                            <i data-lucide="check" class="w-4 h-4"></i>
                            Save Changes
                        </button>

                        <a href="<?= BASE_URL ?>/profile" class="px-6 py-2.5 rounded-xl bg-slate-100 text-slate-700 text-center
                                  hover:bg-slate-200 transition">
                            Cancel
                        </a>

                    </div>

                </form>

            </main>

        </div>

    </div>

</div>