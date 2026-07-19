<?php

$notifications =
    $notificationService->getUserNotifications(
        $_SESSION['user']['id']
    );


?>


<div class="relative">


    <button id="notificationButton" class="relative p-2 rounded-lg hover:bg-gray-100">


        <i data-lucide="bell" class="w-6 h-6">
        </i>



        <span id="notificationCount" class="absolute -top-1 -right-1 
            bg-red-500 text-white text-xs 
            rounded-full px-1.5">


        </span>


    </button>





    <div id="notificationDropdown" class="hidden absolute right-0 mt-3 
         w-80 bg-white rounded-xl shadow-lg z-50">


        <div class="p-4 border-b">

            <h3 class="font-semibold">

                Notifications

            </h3>

        </div>




        <div class="max-h-96 overflow-y-auto">


            <?php foreach(
                array_slice($notifications,0,5)
                as $notification
            ): ?>


            <a href="<?= BASE_URL ?>/notifications/read/<?= $notification->getId() ?>"
                class="block p-4 hover:bg-gray-50">


                <p class="font-medium">

                    <?= htmlspecialchars(
                            $notification->getTitle()
                        ) ?>

                </p>


                <p class="text-sm text-gray-500">

                    <?= htmlspecialchars(
                            $notification->getMessage()
                        ) ?>

                </p>


            </a>


            <?php endforeach; ?>


        </div>



        <a href="<?= BASE_URL ?>/notifications" class="block text-center p-3 text-blue-600 border-t">

            View All

        </a>


    </div>


</div>