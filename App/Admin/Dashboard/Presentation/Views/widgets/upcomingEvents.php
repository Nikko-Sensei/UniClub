<div class="bg-white rounded-xl shadow p-6">


    <div class="flex justify-between items-center mb-5">

        <h2 class="text-xl font-bold text-gray-800">
            Upcoming Events
        </h2>

        <span class="text-sm text-blue-600">
            Next Events
        </span>

    </div>



    <?php if (empty($dashboard->upcomingEvents)): ?>


    <div class="text-center py-6">

        <p class="text-gray-500">
            No upcoming events available.
        </p>

    </div>


    <?php else: ?>


    <div class="space-y-4">


        <?php foreach ($dashboard->upcomingEvents as $event): ?>


        <div class="border rounded-lg p-4 hover:shadow-md transition">


            <!-- Event Title -->

            <h3 class="text-lg font-semibold text-gray-800">

                <?= htmlspecialchars($event['title']) ?>

            </h3>



            <!-- Club -->

            <div class="mt-3 text-sm text-gray-600">

                <span class="font-medium">
                    Club:
                </span>

                <?= htmlspecialchars($event['club_name']) ?>

            </div>



            <!-- Date -->

            <div class="text-sm text-gray-600 mt-1">

                <span class="font-medium">
                    Date:
                </span>

                <?= htmlspecialchars($event['event_date']) ?>

            </div>



            <!-- Time -->

            <div class="text-sm text-gray-600 mt-1">

                <span class="font-medium">
                    Time:
                </span>

                <?= htmlspecialchars($event['start_time']) ?>

                -

                <?= htmlspecialchars($event['end_time']) ?>

            </div>



            <!-- Venue -->

            <div class="text-sm text-gray-600 mt-1">

                <span class="font-medium">
                    Venue:
                </span>

                <?= htmlspecialchars($event['venue']) ?>

            </div>



            <!-- Status -->

            <div class="mt-3">

                <span class="inline-block bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-medium">

                    Upcoming

                </span>

            </div>


        </div>


        <?php endforeach; ?>


    </div>


    <?php endif; ?>


</div>