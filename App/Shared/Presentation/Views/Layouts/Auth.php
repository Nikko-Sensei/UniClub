<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'UniClub' ?></title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="<?= BASE_URL ?>/Assets/css/app.css">

    <script src="https://unpkg.com/lucide@latest"></script>

</head>

<body>

    <?= $content ?>

    <script>
    lucide.createIcons();
    </script>

</body>

</html>