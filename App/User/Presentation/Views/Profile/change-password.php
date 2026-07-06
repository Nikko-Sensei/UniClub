<?php
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);
?>

<div class="min-h-screen bg-slate-50 flex items-center justify-center p-4">

    <div class="w-full max-w-xl bg-white rounded-2xl shadow-lg overflow-hidden">

        <!-- HEADER -->
        <div class="bg-gradient-to-br from-blue-600 to-blue-800 text-white px-6 py-8">
            <h1 class="text-2xl font-bold">Change Password</h1>
            <p class="text-blue-100 text-sm mt-1">
                Secure your account by updating your password
            </p>
        </div>

        <!-- FORM -->
        <div class="p-6 space-y-5">

            <form action="<?= BASE_URL ?>/profile/change-password" method="POST" class="space-y-5">

                <!-- Current Password -->
                <div>
                    <label class="text-sm text-slate-600">Current Password</label>

                    <input type="password" name="current_password" class="w-full mt-1 px-4 py-3 rounded-xl border 
                        <?= isset($errors['current_password']) ? 'border-red-500' : 'border-slate-300' ?>
                        focus:ring-2 focus:ring-blue-500 outline-none">

                    <?php if (!empty($errors['current_password'])): ?>
                    <p class="text-red-500 text-sm mt-1">
                        <?= $errors['current_password'] ?>
                    </p>
                    <?php endif; ?>
                </div>

                <!-- New Password -->
                <div>
                    <label class="text-sm text-slate-600">New Password</label>

                    <input type="password" name="new_password" class="w-full mt-1 px-4 py-3 rounded-xl border 
                        <?= isset($errors['new_password']) ? 'border-red-500' : 'border-slate-300' ?>
                        focus:ring-2 focus:ring-blue-500 outline-none">

                    <?php if (!empty($errors['new_password'])): ?>
                    <p class="text-red-500 text-sm mt-1">
                        <?= $errors['new_password'] ?>
                    </p>
                    <?php endif; ?>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="text-sm text-slate-600">Confirm New Password</label>

                    <input type="password" name="confirm_password" class="w-full mt-1 px-4 py-3 rounded-xl border 
                        <?= isset($errors['confirm_password']) ? 'border-red-500' : 'border-slate-300' ?>
                        focus:ring-2 focus:ring-blue-500 outline-none">

                    <?php if (!empty($errors['confirm_password'])): ?>
                    <p class="text-red-500 text-sm mt-1">
                        <?= $errors['confirm_password'] ?>
                    </p>
                    <?php endif; ?>
                </div>

                <!-- SERVER ERROR -->
                <?php if (!empty($errors['password'])): ?>
                <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl text-sm">
                    <?= $errors['password'] ?>
                </div>
                <?php endif; ?>

                <!-- BUTTONS -->
                <div class="flex flex-col sm:flex-row gap-3 pt-2">

                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl transition shadow">
                        Update Password
                    </button>

                    <a href="<?= BASE_URL ?>/profile"
                        class="px-6 py-3 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl transition text-center">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>