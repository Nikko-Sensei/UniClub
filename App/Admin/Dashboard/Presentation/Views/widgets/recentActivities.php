<div class="bg-white rounded-xl shadow p-6">


    <h2 class="text-xl font-bold mb-4 text-gray-800">
        Recent Activities
    </h2>


    <?php if(empty($dashboard->recentActivities)): ?>


    <p class="text-gray-500">
        No recent activities found.
    </p>


    <?php else: ?>


    <div class="space-y-4">


        <?php foreach($dashboard->recentActivities as $activity): ?>


        <div class="flex items-center justify-between border-b pb-3">


            <div>


                <p class="font-medium text-gray-700">

                    <?= htmlspecialchars($activity['action']) ?>

                </p>


                <p class="text-sm text-gray-400">

                    <?= htmlspecialchars($activity['created_at']) ?>

                </p>


            </div>


            <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">

                Activity

            </span>


        </div>


        <?php endforeach; ?>


    </div>


    <?php endif; ?>


</div>