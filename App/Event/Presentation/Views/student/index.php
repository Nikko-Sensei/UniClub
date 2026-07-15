<div class="space-y-8">


    <!-- Header -->

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>

            <p class="text-sm font-semibold text-blue-600 mb-2">
                Campus Activities
            </p>


            <h1 class="text-3xl md:text-4xl font-bold text-slate-800">
                University Events
            </h1>


            <p class="text-slate-500 mt-2 max-w-2xl">
                Explore upcoming university events, schedules, locations, and activities.
            </p>

        </div>



        <div class="flex items-center gap-2 text-sm text-slate-500">

            <i data-lucide="calendar-days" class="w-4 h-4 text-blue-500"></i>

            <?= count($events['events']) ?> events

        </div>


    </div>





    <!-- Search and Filter -->

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">


        <div class="flex items-center gap-2">

            <button class="px-4 py-2.5 rounded-xl bg-blue-600 text-white text-sm font-semibold">
                Upcoming
            </button>


            <button
                class="px-4 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-600 text-sm font-semibold hover:bg-slate-50 transition">
                Past Events
            </button>

        </div>




        <div class="relative w-full md:w-72">


            <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400">
            </i>


            <input type="text" placeholder="Search events..."
                class="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm outline-none focus:ring-2 focus:ring-blue-500">


        </div>


    </div>






    <!-- Events -->

    <?php if(empty($events['events'])): ?>


    <div class="bg-white rounded-2xl border border-slate-200 py-16 px-6 text-center">


        <div class="w-14 h-14 mx-auto rounded-2xl bg-blue-50 text-blue-500 flex items-center justify-center">

            <i data-lucide="calendar-x" class="w-6 h-6"></i>

        </div>


        <h3 class="mt-4 text-lg font-bold text-slate-800">
            No events found
        </h3>


        <p class="mt-2 text-sm text-slate-500">
            Upcoming university and club events will appear here.
        </p>


    </div>




    <?php else: ?>



    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">


        <?php foreach($events['events'] as $event): ?>


        <?php

            $date = strtotime($event->getEventDate());

            $day = date('d',$date);

            $month = date('M',$date);

        ?>



        <div class="
            group
            bg-white
            rounded-2xl
            border
            border-slate-200
            shadow-sm
            overflow-hidden
            hover:shadow-md
            hover:-translate-y-1
            transition
            duration-300
            flex
            flex-col
        ">



            <!-- Banner -->


            <div class="relative h-48 bg-gradient-to-br from-blue-50 to-indigo-100 overflow-hidden">


                <?php if($event->getBanner()): ?>


                <img src="<?= BASE_URL ?>/uploads/events/<?= htmlspecialchars($event->getBanner()) ?>"
                    alt="<?= htmlspecialchars($event->getTitle()) ?>"
                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">


                <?php else: ?>


                <div class="w-full h-full flex items-center justify-center text-blue-300">

                    <i data-lucide="calendar-days" class="w-12 h-12"></i>

                </div>


                <?php endif; ?>





                <!-- Date -->


                <div class="
                    absolute
                    top-4
                    left-4
                    w-14
                    h-14
                    rounded-xl
                    bg-white
                    shadow-sm
                    flex
                    flex-col
                    items-center
                    justify-center
                ">


                    <span class="text-lg font-bold text-blue-600 leading-none">
                        <?= $day ?>
                    </span>


                    <span class="text-xs font-semibold text-slate-500 uppercase">
                        <?= $month ?>
                    </span>


                </div>


            </div>







            <!-- Content -->


            <div class="p-5 flex-1">


                <div class="flex items-center gap-2 text-xs text-slate-400 mb-3">


                    <i data-lucide="calendar-days" class="w-3.5 h-3.5"></i>


                    <?= date(
                        'M d, Y',
                        strtotime($event->getEventDate())
                    ) ?>


                </div>




                <h3 class="
                    text-lg
                    font-bold
                    text-slate-800
                    group-hover:text-blue-600
                    transition
                    line-clamp-2
                ">

                    <?= htmlspecialchars($event->getTitle()) ?>


                </h3>




                <div class="flex items-center gap-2 mt-3 text-sm text-slate-500">


                    <i data-lucide="map-pin" class="w-4 h-4 text-blue-500"></i>


                    <span class="line-clamp-1">

                        <?= htmlspecialchars($event->getVenue()) ?>

                    </span>


                </div>




                <p class="mt-4 text-sm text-slate-500 leading-relaxed line-clamp-3">

                    <?= htmlspecialchars($event->getDescription()) ?>

                </p>


            </div>







            <!-- Footer -->


            <div class="px-5 pb-5">


                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">


                    <span class="text-sm font-semibold text-blue-600">
                        Event Details
                    </span>



                    <a href="<?= BASE_URL ?>/events/<?= $event->getId() ?>" class="
                        w-9
                        h-9
                        rounded-xl
                        bg-blue-50
                        text-blue-600
                        flex
                        items-center
                        justify-center
                        group-hover:bg-blue-600
                        group-hover:text-white
                        transition
                        ">


                        <i data-lucide="arrow-right" class="w-4 h-4"></i>


                    </a>


                </div>


            </div>


        </div>


        <?php endforeach; ?>


    </div>



    <?php endif; ?>


</div>