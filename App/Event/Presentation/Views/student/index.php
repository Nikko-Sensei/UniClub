<div class="max-w-7xl mx-auto px-4 md:px-6 py-8 w-full">


    <!-- HEADER -->

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">


        <div>

            <p class="text-sm font-semibold text-blue-600 mb-2">
                Campus Activities
            </p>


            <h1 class="text-3xl md:text-4xl font-bold text-slate-800">
                University Events
            </h1>


            <p class="text-slate-500 mt-2">
                Explore upcoming university events, schedules, locations, and activities.
            </p>

        </div>




        <div class="flex items-center gap-2 text-sm text-slate-500">

            <i data-lucide="calendar-days" class="w-4 h-4 text-blue-500">
            </i>


            <?= $pagination['total'] ?> events

        </div>


    </div>





    <!-- SEARCH + FILTER -->


    <form method="GET" class="
        bg-white
        rounded-2xl
        border
        border-slate-200
        shadow-sm
        p-4
        sm:p-5
        ">


        <div class="flex flex-col lg:flex-row gap-3">



            <!-- SEARCH -->


            <div class="relative flex-1">


                <i data-lucide="search" class="
                    absolute
                    left-4
                    top-1/2
                    -translate-y-1/2
                    w-5
                    h-5
                    text-slate-400
                    ">
                </i>



                <input type="text" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                    placeholder="Search events..." onkeydown="if(event.key==='Enter'){this.form.submit()}" class="
                    w-full
                    pl-11
                    pr-4
                    py-3
                    rounded-xl
                    border
                    border-slate-200
                    text-sm
                    placeholder:text-slate-400
                    focus:border-blue-500
                    focus:ring-4
                    focus:ring-blue-100
                    outline-none
                    transition
                    ">


            </div>






            <!-- STATUS FILTER -->


            <div>


                <select name="status" onchange="this.form.submit()" class="
                    w-full
                    lg:w-56
                    px-4
                    py-3
                    rounded-xl
                    border
                    border-slate-200
                    bg-white
                    text-sm
                    cursor-pointer
                    focus:border-blue-500
                    focus:ring-4
                    focus:ring-blue-100
                    outline-none
                    ">


                    <option value="">
                        All Events
                    </option>



                    <option value="published" <?= ($_GET['status'] ?? '') == 'published'
                                                    ? 'selected'
                                                    : ''
                                                ?>>

                        Upcoming Events

                    </option>




                    <option value="completed" <?= ($_GET['status'] ?? '') == 'completed'
                                                    ? 'selected'
                                                    : ''
                                                ?>>

                        Past Events

                    </option>


                </select>


            </div>


        </div>


    </form>







    <!-- TITLE -->


    <div class="flex justify-between items-center">


        <h2 class="text-xl font-bold text-slate-800">

            Explore Events

        </h2>



        <span class="text-sm text-slate-500">

            <?= $pagination['total'] ?> found

        </span>


    </div>








    <!-- EVENTS GRID -->


    <?php if (empty($events)): ?>


    <div class="
            bg-white
            rounded-2xl
            border
            border-dashed
            border-slate-300
            py-16
            px-6
            text-center
            ">


        <div class="
                w-16
                h-16
                mx-auto
                rounded-full
                bg-blue-50
                text-blue-500
                flex
                items-center
                justify-center
                ">


            <i data-lucide="calendar-x" class="w-7 h-7">
            </i>


        </div>




        <h3 class="mt-4 text-lg font-bold text-slate-700">

            No Events Found

        </h3>



        <p class="text-sm text-slate-500 mt-2">

            Try another search keyword.

        </p>


    </div>



    <?php else: ?>



    <div class="
        grid
        grid-cols-1
        sm:grid-cols-2
        xl:grid-cols-3
        gap-6
        ">



        <?php foreach ($events as $event): ?>


        <?php

                $timestamp =
                    strtotime(
                        $event->getEventDate()
                    );


                $day =
                    date(
                        'd',
                        $timestamp
                    );


                $month =
                    date(
                        'M',
                        $timestamp
                    );

                ?>



        <div class="
            group
            bg-white
            rounded-2xl
            border
            border-slate-200
            shadow-sm
            overflow-hidden
            hover:shadow-lg
            hover:-translate-y-1
            transition
            ">




            <!-- IMAGE -->


            <div class="
                relative
                h-48
                bg-blue-50
                overflow-hidden
                ">


                <?php if ($event->getBanner()): ?>


                <img src="<?= BASE_URL ?>/uploads/events/<?= htmlspecialchars($event->getBanner()) ?>" class="
                    w-full
                    h-full
                    object-cover
                    group-hover:scale-105
                    transition
                    duration-500
                    ">


                <?php else: ?>


                <div class="
                    h-full
                    flex
                    items-center
                    justify-center
                    text-blue-300
                    ">


                    <i data-lucide="calendar-days" class="w-12 h-12">
                    </i>


                </div>


                <?php endif; ?>






                <!-- DATE BADGE -->


                <div class="
                    absolute
                    top-4
                    left-4
                    w-14
                    h-14
                    rounded-xl
                    bg-white
                    shadow
                    flex
                    flex-col
                    items-center
                    justify-center
                    ">


                    <span class="text-lg font-bold text-blue-600">

                        <?= $day ?>

                    </span>


                    <span class="text-xs uppercase text-slate-500">

                        <?= $month ?>

                    </span>


                </div>



            </div>








            <!-- CONTENT -->


            <div class="p-5">


                <div class="flex items-center gap-2 text-xs text-slate-400">


                    <i data-lucide="calendar" class="w-3.5 h-3.5">
                    </i>


                    <?= date(
                                'M d, Y',
                                strtotime($event->getEventDate())
                            ) ?>


                </div>





                <h3 class="
                    mt-3
                    text-lg
                    font-bold
                    text-slate-800
                    line-clamp-2
                    group-hover:text-blue-600
                    transition
                    ">


                    <?= htmlspecialchars($event->getTitle()) ?>


                </h3>






                <div class="
                    flex
                    items-center
                    gap-2
                    mt-3
                    text-sm
                    text-slate-500
                    ">


                    <i data-lucide="map-pin" class="w-4 h-4 text-blue-500">
                    </i>


                    <span class="line-clamp-1">

                        <?= htmlspecialchars($event->getVenue()) ?>

                    </span>


                </div>





                <p class="
                    mt-4
                    text-sm
                    text-slate-500
                    line-clamp-2
                    ">


                    <?= htmlspecialchars($event->getDescription()) ?>


                </p>


            </div>







            <!-- FOOTER -->


            <div class="px-5 pb-5">


                <a href="<?= BASE_URL ?>/events/<?= $event->getId() ?>" class="
                    flex
                    items-center
                    justify-center
                    gap-2
                    bg-blue-600
                    hover:bg-blue-700
                    text-white
                    py-2.5
                    rounded-xl
                    text-sm
                    font-semibold
                    transition
                    ">


                    View Details


                    <i data-lucide="arrow-right" class="w-4 h-4">
                    </i>


                </a>


            </div>




        </div>



        <?php endforeach; ?>


    </div>



    <?php endif; ?>









    <!-- PAGINATION -->


    <?php if ($pagination['total_pages'] > 1): ?>


    <?php

        $current =
            $pagination['current_page'];


        $total =
            $pagination['total_pages'];



        $previous =
            array_merge(
                $_GET,
                [
                    'page' => max(
                        1,
                        $current - 1
                    )
                ]
            );



        $next =
            array_merge(
                $_GET,
                [
                    'page' => min(
                        $total,
                        $current + 1
                    )
                ]
            );


        ?>



    <div class="
        flex
        justify-center
        items-center
        gap-3
        mt-10
        ">




        <a href="?<?= http_build_query($previous) ?>" class="
            px-4
            py-2.5
            rounded-xl
            border
            text-sm
            font-semibold

            <?= $current == 1
                ?
                'opacity-40 pointer-events-none bg-slate-100'
                :
                'bg-white hover:bg-blue-50'
            ?>
            ">


            Previous


        </a>






        <div class="
            px-4
            py-2.5
            rounded-xl
            bg-blue-50
            text-blue-600
            text-sm
            font-semibold
            ">


            Page <?= $current ?> of <?= $total ?>


        </div>






        <a href="?<?= http_build_query($next) ?>" class="
            px-4
            py-2.5
            rounded-xl
            border
            text-sm
            font-semibold

            <?= $current == $total
                ?
                'opacity-40 pointer-events-none bg-slate-100'
                :
                'bg-white hover:bg-blue-50'
            ?>

            ">


            Next


        </a>



    </div>


    <?php endif; ?>



</div>