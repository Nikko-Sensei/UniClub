<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Password Changed</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta http-equiv="refresh" content="5;url=<?= BASE_URL ?>/login">
</head>

<body class="bg-slate-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-xl shadow p-6 text-center">

        <!-- Success Icon -->
        <div class="flex justify-center mb-4">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>

        <!-- Title -->
        <h2 class="text-xl font-bold text-slate-800 mb-2">
            Password Changed Successfully
        </h2>

        <!-- FLASH MESSAGE -->
        <?php if (!empty($flashSuccess)): ?>
            <p class="text-sm text-green-600 mb-4">
                <?= htmlspecialchars($flashSuccess) ?>
            </p>
        <?php endif; ?>

        <p class="text-sm text-slate-500 mb-6">
            Redirecting to login page in a few seconds...
        </p>

        <!-- Button -->
        <a href="<?= BASE_URL ?>/login"
            class="inline-block w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
            Go to Login
        </a>

        <!-- Countdown -->
        <p class="text-xs text-slate-400 mt-4">
            Redirecting in <span id="countdown">5</span> seconds...
        </p>

    </div>

    <script>
        let time = 5;
        const el = document.getElementById("countdown");

        setInterval(() => {
            time--;
            el.textContent = time;

            if (time <= 0) {
                window.location.href = "<?= BASE_URL ?>/login";
            }
        }, 1000);
    </script>

</body>

</html>