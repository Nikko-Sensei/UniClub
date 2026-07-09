<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">


    <div class="bg-white border-slate-200/60 p-6 rounded-xl shadow">

        <p class="text-gray-500">
            Total Users
        </p>

        <h2 class="text-3xl font-bold text-blue-600">
            <?= $dashboard->totalUsers ?>
        </h2>

    </div>



    <div class="bg-white border-slate-200/60 p-6 rounded-xl shadow">

        <p class="text-gray-500">
            Total Clubs
        </p>

        <h2 class="text-3xl font-bold text-blue-600">
            <?= $dashboard->totalClubs ?>
        </h2>

    </div>



    <div class="bg-white border-slate-200/60 p-6 rounded-xl shadow">

        <p class="text-gray-500">
            Total Events
        </p>

        <h2 class="text-3xl font-bold text-blue-600">
            <?= $dashboard->totalEvents ?>
        </h2>

    </div>



    <div class="bg-white border-slate-200/60 p-6 rounded-xl shadow">

        <p class="text-gray-500">
            Announcements
        </p>

        <h2 class="text-3xl font-bold text-blue-600">
            <?= $dashboard->totalAnnouncements ?>
        </h2>

    </div>


</div>