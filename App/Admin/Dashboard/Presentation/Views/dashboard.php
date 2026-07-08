<div class="space-y-6">


    <!-- Welcome -->

    <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl p-6 text-white shadow-sm">


        <h1 class="text-3xl font-bold">

            Welcome back,
            <?= htmlspecialchars($_SESSION['user']['name'] ?? 'Admin') ?>

        </h1>


        <p class="mt-2 text-blue-100">

            Manage students, clubs and university activities.

        </p>


    </div>




    <!-- Statistics -->

    <?php require __DIR__ . '/widgets/statistics.php'; ?>




    <!-- Charts -->

    <?php require __DIR__ . '/widgets/charts.php'; ?>




    <!-- Recent Activities + Upcoming Events -->

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">


        <?php require __DIR__ . '/widgets/recentActivities.php'; ?>


        <?php require __DIR__ . '/widgets/upcomingEvents.php'; ?>


    </div>

</div>