<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verify OTP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-xl shadow p-6">

        <h2 class="text-xl font-bold text-center mb-4">
            Verify OTP
        </h2>

        <p class="text-center text-sm text-slate-500 mb-4">
            Enter the 6-digit code sent to your email
        </p>

        <form method="POST" action="<?= BASE_URL ?>/verify-otp" class="space-y-4">

            <?= $csrf->hiddenField(); ?>

            <input type="hidden" name="email" value="<?= htmlspecialchars($email ?? '') ?>">

            <div>
                <input type="text" name="otp" maxlength="6" inputmode="numeric" pattern="[0-9]{6}"
                    placeholder="Enter OTP"
                    class="w-full border rounded p-2 text-center tracking-widest text-lg focus:ring focus:ring-blue-200" />

                <?php if (!empty($errors['otp'])): ?>
                    <p class="text-red-500 text-xs mt-1">
                        <?= $errors['otp'] ?>
                    </p>
                <?php endif; ?>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Verify OTP
            </button>

        </form>

    </div>

</body>

</html>