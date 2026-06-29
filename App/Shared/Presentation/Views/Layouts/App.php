<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title><?= $title ?? 'UniClub' ?></title>

    <link rel="stylesheet" href="<?= BASE_URL ?>/Assets/css/app.css">

    <script src="https://unpkg.com/lucide@latest"></script>

</head>

<body>

    <?php require __DIR__ . '/Partials/header.php'; ?>

    <?= $content ?>

    <?php require __DIR__ . '/Partials/footer.php'; ?>

    <script>
    lucide.createIcons();
    </script>

</body>

</html>