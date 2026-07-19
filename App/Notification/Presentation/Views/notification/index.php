<?php

use App\Shared\Core\View;

?>


<div class="max-w-5xl mx-auto px-6 py-8">


    <div class="flex justify-between items-center mb-6">


        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Notifications
            </h1>

            <p class="text-gray-500">
                View your latest updates
            </p>
        </div>



        <a href="<?= BASE_URL ?>/notifications/read-all"
            class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">

            Mark All Read

        </a>


    </div>





    <div class="bg-white rounded-xl shadow divide-y">


        <?php if(empty($notifications)): ?>


        <div class="p-8 text-center text-gray-500">

            No notifications found.

        </div>



        <?php else: ?>


        <?php foreach($notifications as $notification): ?>


        <div class="p-5 flex justify-between items-start 
                    <?= !$notification->isRead() ? 'bg-blue-50' : '' ?>">



            <div>


                <h3 class="font-semibold text-gray-800">

                    <?= htmlspecialchars(
                                $notification->getTitle()
                            ) ?>

                </h3>



                <p class="text-gray-600 mt-1">

                    <?= htmlspecialchars(
                                $notification->getMessage()
                            ) ?>

                </p>



                <span class="text-sm text-gray-400">

                    <?= $notification->getCreatedAt() ?>

                </span>


            </div>




            <?php if(!$notification->isRead()): ?>


            <a href="<?= BASE_URL ?>/notifications/read/<?= $notification->getId() ?>"
                class="text-sm text-blue-600 hover:underline">

                Mark Read

            </a>


            <?php endif; ?>


        </div>



        <?php endforeach; ?>


        <?php endif; ?>


    </div>


</div>