<?php

$joinedCount = 0;
$pendingCount = 0;
$upcomingEventCount = 0;


foreach ($clubs as $club) {

    if ($club['status'] === 'approved') {

        $joinedCount++;

        $upcomingEventCount += (int)(
            $club['upcoming_event_count'] ?? 0
        );
    }


    if ($club['status'] === 'pending') {

        $pendingCount++;
    }
}

?>

<div class="max-w-7xl mx-auto px-4 md:px-6 py-8 w-full">


    <!-- HEADER -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                My Clubs
            </h1>

            <p class="text-slate-500 mt-2">
                Welcome back, <?= htmlspecialchars($_SESSION['user']['name']) ?> 👋<br>
                Manage your memberships, activities and events.
            </p>

        </div>


        <a href="<?= BASE_URL ?>/clubs"
            class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold shadow-sm transition">

            <i data-lucide="compass" class="w-4 h-4"></i>

            Explore Clubs

        </a>

    </div>



    <!-- STATISTICS
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mt-8">


        <?php

        $stats = [

            [
                'label' => 'Joined Clubs',
                'value' => $joinedCount,
                'icon' => 'users',
                'color' => 'blue'
            ],

            [
                'label' => 'Pending Requests',
                'value' => $pendingCount,
                'icon' => 'clock-3',
                'color' => 'amber'
            ],

            [
                'label' => 'Upcoming Events',
                'value' => $upcomingEventCount,
                'icon' => 'calendar-days',
                'color' => 'emerald'
            ]

        ];

        foreach ($stats as $s):

        ?>


        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">


            <div class="flex items-center justify-between">


                <div>

                    <p class="text-sm text-slate-500">
                        <?= $s['label'] ?>
                    </p>


                    <h2 class="text-3xl font-bold text-<?= $s['color'] ?>-600 mt-2">
                        <?= $s['value'] ?>
                    </h2>

                </div>


                <div
                    class="w-12 h-12 rounded-2xl bg-<?= $s['color'] ?>-100 text-<?= $s['color'] ?>-600 flex items-center justify-center">


                    <i data-lucide="<?= $s['icon'] ?>" class="w-6 h-6"></i>


                </div>


            </div>


        </div>


        <?php endforeach; ?>


    </div> -->




    <!-- SECTION TITLE -->
    <div class="mt-10 mb-5">

        <h2 class="text-xl font-bold text-slate-800">
            Joined Clubs
        </h2>


        <p class="text-sm text-slate-500 mt-1">
            Your approved club memberships
        </p>

    </div>





    <?php if (empty($clubs)): ?>


    <!-- EMPTY STATE -->

    <div class="bg-white border border-dashed border-slate-300 rounded-2xl px-6 py-16 text-center">


        <div class="w-16 h-16 mx-auto bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center">

            <i data-lucide="users" class="w-8 h-8"></i>

        </div>


        <h3 class="text-xl font-bold text-slate-800 mt-5">

            No Joined Clubs Yet

        </h3>


        <p class="text-sm text-slate-500 mt-2 max-w-md mx-auto">

            Explore university clubs and join communities that match your interests.

        </p>


        <a href="<?= BASE_URL ?>/clubs"
            class="inline-flex items-center justify-center gap-2 mt-6 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl text-sm font-semibold">

            <i data-lucide="compass" class="w-4 h-4"></i>

            Explore Clubs

        </a>


    </div>


    <?php else: ?>



    <!-- CLUB GRID -->

    <div id="clubs" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">


        <?php foreach ($clubs as $club): ?>


        <!-- CLUB CARD -->

        <div class="bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-lg transition">


            <div class="relative h-44 bg-slate-100">


                <?php if (!empty($club['banner'])): ?>


                <img src="<?= BASE_URL ?>/uploads/clubs/<?= htmlspecialchars($club['banner']) ?>"
                    class="w-full h-full object-cover">


                <?php else: ?>


                <div class="h-full flex items-center justify-center text-slate-300">

                    <i data-lucide="users" class="w-12 h-12"></i>

                </div>


                <?php endif; ?>


                <div class="absolute top-3 left-3 bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-semibold">

                    <?= htmlspecialchars($club['club_role']) ?>

                </div>



                <div class="absolute bottom-3 right-3 bg-white px-3 py-1 rounded-full text-xs font-semibold">


                    <?= (int)$club['upcoming_event_count'] ?>

                    <?= $club['upcoming_event_count'] == 1 ? 'Event' : 'Events' ?>


                </div>


            </div> <!-- CONTENT -->

            <div class="p-5">


                <span
                    class="inline-block bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-xs font-semibold mb-3">

                    Approved

                </span>



                <h3 class="text-lg font-bold text-slate-800 mb-1 line-clamp-1">

                    <?= htmlspecialchars($club['club_name']) ?>

                </h3>



                <?php if (!empty($club['description'])): ?>


                <p class="text-sm text-slate-500 line-clamp-2 mb-4">

                    <?= htmlspecialchars($club['description']) ?>

                </p>


                <?php endif; ?>




                <div class="flex gap-2">


                    <a href="<?= BASE_URL ?>/clubs/<?= (int)$club['club_id'] ?>"
                        class="flex-1 flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-xl text-sm font-semibold transition">


                        View Club


                        <i data-lucide="arrow-right" class="w-4 h-4"></i>


                    </a>




                    <button onclick="openLeaveModal(
                            <?= (int)$club['club_id'] ?>,
                            '<?= htmlspecialchars($club['club_name'], ENT_QUOTES) ?>'
                        )"
                        class="px-4 py-2.5 rounded-xl border border-red-200 text-red-600 hover:bg-red-50 transition">


                        <i data-lucide="log-out" class="w-4 h-4"></i>


                    </button>


                </div>


            </div>


        </div>



        <?php endforeach; ?>


    </div>





    <!-- PAGINATION -->

    <?php if ($pagination['total_pages'] > 1):

            $current = $pagination['current_page'];

            $total = $pagination['total_pages'];


            $prevQuery = array_merge($_GET, [

                'page' => max(1, $current - 1)

            ]);


            $nextQuery = array_merge($_GET, [

                'page' => min($total, $current + 1)

            ]);

        ?>


    <div class="flex justify-center items-center gap-3 mt-8">


        <!-- PREVIOUS -->

        <a href="?<?= http_build_query($prevQuery) ?>#clubs" class="flex items-center gap-1.5 px-4 py-2.5 rounded-xl border text-sm font-semibold transition

            <?= $current == 1

                ? 'pointer-events-none opacity-40 bg-slate-100 border-slate-200'

                : 'bg-white hover:bg-blue-50 text-slate-700 border-slate-200'

            ?>">


            <i data-lucide="chevron-left" class="w-4 h-4"></i>


            Previous


        </a>





        <!-- PAGE -->

        <div class="px-4 py-2.5 rounded-xl bg-blue-50 text-blue-600 text-sm font-semibold">


            Page <?= $current ?> of <?= $total ?>


        </div>





        <!-- NEXT -->

        <a href="?<?= http_build_query($nextQuery) ?>#clubs" class="flex items-center gap-1.5 px-4 py-2.5 rounded-xl border text-sm font-semibold transition


            <?= $current == $total

                ? 'pointer-events-none opacity-40 bg-slate-100 border-slate-200'

                : 'bg-white hover:bg-blue-50 text-slate-700 border-slate-200'

            ?>">



            Next


            <i data-lucide="chevron-right" class="w-4 h-4"></i>



        </a>



    </div>


    <?php endif; ?>



    <?php endif; ?>


</div>





<!-- LEAVE CLUB MODAL -->

<div id="leaveClubModal"
    class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-900/50 backdrop-blur-sm">


    <div onclick="event.stopPropagation()" class="relative w-full max-w-md bg-white rounded-2xl shadow-2xl p-6">


        <div class="w-14 h-14 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center">


            <i data-lucide="log-out" class="w-7 h-7"></i>


        </div>



        <h3 class="text-xl font-bold text-slate-800 mt-5">

            Leave Club?

        </h3>



        <p class="text-sm text-slate-500 mt-2 leading-6">


            Are you sure you want to leave

            <span id="leaveClubName" class="font-semibold text-slate-800"></span>?


            You may need to request membership again if you want to rejoin.


        </p>




        <div class="flex flex-col-reverse sm:flex-row gap-3 mt-6">


            <button type="button" onclick="closeLeaveModal()"
                class="flex-1 border border-slate-200 text-slate-700 hover:bg-slate-50 py-3 rounded-xl text-sm font-semibold transition">


                Cancel


            </button>





            <form id="leaveClubForm" method="POST" class="flex-1">


                <button type="submit"
                    class="w-full inline-flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white py-3 rounded-xl text-sm font-semibold transition">


                    <i data-lucide="log-out" class="w-4 h-4"></i>

                    Yes, Leave Club


                </button>


            </form>


        </div>


    </div>


</div>





<script>
function openLeaveModal(clubId, clubName) {


    const modal =
        document.getElementById('leaveClubModal');


    document.getElementById('leaveClubName').textContent =
        clubName;



    document.getElementById('leaveClubForm').action =
        "<?= BASE_URL ?>/membership/" + clubId + "/leave";



    modal.classList.remove('hidden');

    modal.classList.add('flex');


    document.body.classList.add('overflow-hidden');

}





function closeLeaveModal() {


    const modal =
        document.getElementById('leaveClubModal');



    modal.classList.add('hidden');

    modal.classList.remove('flex');


    document.body.classList.remove('overflow-hidden');

}





document.addEventListener('keydown', function(e) {


    if (e.key === 'Escape') {

        closeLeaveModal();

    }


});
</script>