<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Forgot Password' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-xl shadow p-6">

        <h2 class="text-xl font-bold text-center text-slate-800 mb-4">
            Forgot Password
        </h2>

        <?php if (!empty($_SESSION['success'])): ?>
        <div class="bg-green-100 text-green-700 p-2 rounded mb-3 text-sm">
            <?= $_SESSION['success'] ?>
        </div>
        <?php unset($_SESSION['success']); endif; ?>

        <form method="POST" action="<?= BASE_URL ?>/forgot-password" class="space-y-4">

            <?= $csrf->hiddenField(); ?>

            <div>
                <label class="text-sm font-medium">Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>"
                    class="w-full border rounded p-2 mt-1 focus:ring focus:ring-blue-200">

                <?php if (!empty($errors['email'])): ?>
                <p class="text-red-500 text-xs mt-1">
                    <?= $errors['email'] ?>
                </p>
                <?php endif; ?>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Send Reset Link
            </button>
        </form>

    </div>

</body>

</html>