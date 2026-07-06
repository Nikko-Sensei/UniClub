<?php
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']); // clear after showing once
?>
<div class="min-h-screen bg-slate-50 flex items-center justify-center p-4 sm:p-6">

    <div class="w-full max-w-5xl bg-white rounded-2xl shadow-lg overflow-hidden">

        <!-- HEADER -->
        <div class="bg-gradient-to-br from-blue-600 to-blue-800 text-white px-6 py-8 sm:px-10">

            <h1 class="text-2xl sm:text-3xl font-bold">Edit Profile</h1>
            <p class="text-blue-100 text-sm mt-1">Update your personal information</p>

        </div>

        <!-- BODY -->
        <div class="grid grid-cols-1 lg:grid-cols-3">

            <!-- LEFT SIDEBAR -->
            <aside class="bg-slate-50 border-r border-slate-200 p-6">

                <div class="flex flex-col items-center text-center">

                    <div
                        class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center text-4xl sm:text-5xl font-bold text-white shadow-inner border-2 border-white/30 flex-shrink-0">
                        <?php if (!empty($user->getProfileImage())): ?>
                        <img src="<?= BASE_URL ?>/uploads/profile/<?= htmlspecialchars($user->getProfileImage()) ?>"
                            class="w-full h-full rounded-full object-cover" alt="Profile">
                        <?php else: ?>
                        <?= strtoupper(substr($user->getName(), 0, 1)) ?>
                        <?php endif; ?>
                    </div>

                    <h2 class="mt-4 text-lg font-semibold text-slate-800">
                        <?= htmlspecialchars($user->getName()) ?>
                    </h2>

                    <p class="text-slate-500 text-sm">
                        <?= htmlspecialchars($roleName ?? 'Student') ?>
                    </p>

                    <div class="mt-4 text-sm text-slate-600 space-y-1">
                        <p><?= htmlspecialchars($user->getEmail()) ?></p>
                        <p><?= htmlspecialchars($user->getStudentId()) ?></p>
                    </div>

                </div>

                <hr class="my-6 border-slate-200">

                <div class="text-sm space-y-3 text-slate-600">

                    <div class="flex justify-between">
                        <span>Department</span>
                        <span class="font-medium text-slate-800">
                            <?= htmlspecialchars($departmentName ?? '-') ?>
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span>Academic Year</span>
                        <span class="font-medium text-slate-800">
                            <?= htmlspecialchars($academicYearName ?? '-') ?>
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span>Status</span>
                        <span class="px-2 py-1 rounded-full text-xs
                            <?= $user->getStatus() === 'active'
                                ? 'bg-green-100 text-green-700'
                                : 'bg-red-100 text-red-700' ?>">
                            <?= ucfirst($user->getStatus()) ?>
                        </span>
                    </div>

                </div>

            </aside>

            <!-- RIGHT FORM -->
            <main class="lg:col-span-2 p-6 sm:p-10">

                <h2 class="text-xl font-semibold text-slate-800 mb-6">
                    Update Information
                </h2>

                <form action="<?= BASE_URL ?>/profile/update" method="POST" enctype="multipart/form-data"
                    class="space-y-5">

                    <!-- Name -->
                    <div>
                        <label class="text-sm text-slate-600">Full Name</label>

                        <input type="text" name="name" value="<?= htmlspecialchars($user->getName()) ?>" class="w-full mt-1 px-4 py-2 rounded-xl border 
                        <?= isset($errors['name']) ? 'border-red-500' : 'border-slate-300' ?>
                        focus:ring-2 focus:ring-blue-500 outline-none">

                        <?php if (!empty($errors['name'])): ?>
                        <p class="text-red-500 text-sm mt-1">
                            <?= $errors['name'] ?>
                        </p>
                        <?php endif; ?>
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="text-sm text-slate-600">Phone</label>

                        <input type="text" name="phone" value="<?= htmlspecialchars($user->getPhone() ?? '') ?>" class="w-full mt-1 px-4 py-2 rounded-xl border 
                        <?= isset($errors['phone']) ? 'border-red-500' : 'border-slate-300' ?>
                        focus:ring-2 focus:ring-blue-500 outline-none">

                        <?php if (!empty($errors['phone'])): ?>
                        <p class="text-red-500 text-sm mt-1">
                            <?= $errors['phone'] ?>
                        </p>
                        <?php endif; ?>
                    </div>

                    <!-- Profile Image -->
                    <div>
                        <label class="text-sm text-slate-600">Profile Image</label>

                        <input type="file" name="profile_image" class="w-full mt-1 px-4 py-2 border rounded-xl">

                        <?php if (!empty($errors['profile_image'])): ?>
                        <p class="text-red-500 text-sm mt-1">
                            <?= $errors['profile_image'] ?>
                        </p>
                        <?php endif; ?>
                    </div>

                    <!-- Readonly -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <div>
                            <label class="text-sm text-slate-600">Department</label>
                            <input type="text" value="<?= htmlspecialchars($departmentName ?? '-') ?>" disabled
                                class="w-full mt-1 px-4 py-2 rounded-xl bg-slate-100 border border-slate-200">
                        </div>

                        <div>
                            <label class="text-sm text-slate-600">Academic Year</label>
                            <input type="text" value="<?= htmlspecialchars($academicYearName ?? '-') ?>" disabled
                                class="w-full mt-1 px-4 py-2 rounded-xl bg-slate-100 border border-slate-200">
                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-wrap gap-3 pt-4">

                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl transition shadow">
                            Save Changes
                        </button>

                        <a href="<?= BASE_URL ?>/profile"
                            class="px-6 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl transition">
                            Cancel
                        </a>

                    </div>

                </form>

            </main>

        </div>
    </div>

</div>