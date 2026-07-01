<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-xl shadow p-6">

        <h2 class="text-xl font-bold text-center mb-4">
            Reset Password
        </h2>

        <form method="POST" action="<?= BASE_URL ?>/reset-password" class="space-y-4">

            <?= $csrf->hiddenField(); ?>

            <input type="hidden" name="token" value="<?= htmlspecialchars($token ?? '') ?>">

            <div>
                <label class="text-sm">New Password</label>
                <input type="password" name="password" class="w-full border rounded p-2 mt-1">

                <?php if (!empty($errors['password'])): ?>
                <p class="text-red-500 text-xs mt-1">
                    <?= $errors['password'] ?>
                </p>
                <?php endif; ?>
            </div>

            <div>
                <label class="text-sm">Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full border rounded p-2 mt-1">

                <?php if (!empty($errors['password_confirmation'])): ?>
                <p class="text-red-500 text-xs mt-1">
                    <?= $errors['password_confirmation'] ?>
                </p>
                <?php endif; ?>
            </div>

            <?php if (!empty($errors['_'])): ?>
            <p class="text-red-500 text-sm">
                <?= $errors['_'] ?>
            </p>
            <?php endif; ?>

            <button class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
                Reset Password
            </button>

        </form>

    </div>

</body>

</html>