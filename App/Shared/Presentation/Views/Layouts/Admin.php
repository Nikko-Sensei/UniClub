<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>
        <?= $title ?? 'UniClub Admin' ?>
    </title>


    <link rel="stylesheet" href="<?= BASE_URL ?>/Assets/css/app.css">


    <script src="https://cdn.tailwindcss.com"></script>


    <script src="https://unpkg.com/lucide@latest"></script>

</head>


<body class="bg-slate-50">

    <!-- Fixed Sidebar -->

    <?php require __DIR__ . '/Partials/Admin/sidebar.php'; ?>

    <!-- Main Content Wrapper -->

    <div class="ml-72">

        <!-- Fixed Navbar -->

        <?php require __DIR__ . '/Partials/Admin/navbar.php'; ?>


        <!-- Page Content -->

        <main class="pt-24 p-6 min-h-screen">


            <?= $content ?>

        </main>

    </div>

    <script>
    lucide.createIcons();
    </script>

    <script>
    const BASE_URL = "<?= BASE_URL ?>";
    console.log("BASE_URL =", BASE_URL);
    </script>

    <script src="<?= BASE_URL ?>/assets/js/notification.js"></script>

</body>

</html>