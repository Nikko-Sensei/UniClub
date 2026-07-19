<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'uniClub - Discover Your Passion' ?></title>

    <!-- Single CSS source: compiled Tailwind build (do not also load the CDN script) -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/Assets/css/app.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://unpkg.com/lucide@latest" defer></script>
    <script src="<?= BASE_URL ?>/assets/js/notification.js"></script>
</head>

<body class="bg-slate-50 text-slate-800 font-sans antialiased flex flex-col min-h-screen">

    <?php

    use App\Shared\Helpers\Flash; ?>

    <?php require __DIR__ . '/Partials/header.php'; ?>

    <?php if ($success = Flash::get('success')): ?>
    <div class="max-w-7xl mx-auto px-4 md:px-6 pt-6 w-full">
        <div
            class="flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl text-sm font-medium">
            <i data-lucide="check-circle-2" class="w-4.5 h-4.5 flex-shrink-0"></i>
            <?= htmlspecialchars($success) ?>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($error = Flash::get('error')): ?>
    <div class="max-w-7xl mx-auto px-4 md:px-6 pt-6 w-full">
        <div
            class="flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm font-medium">
            <i data-lucide="alert-circle" class="w-4.5 h-4.5 flex-shrink-0"></i>
            <?= htmlspecialchars($error) ?>
        </div>
    </div>
    <?php endif; ?>

    <?= $content ?>

    </main> <!-- closes <main> opened in Partials/header.php -->

    <?php require __DIR__ . '/Partials/footer.php'; ?>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        if (window.lucide) lucide.createIcons();
    });
    </script>
</body>

</html>