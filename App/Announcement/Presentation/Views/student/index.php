<?php

$priorityFilter = $_GET['priority'] ?? '';

?>

<div class="max-w-7xl mx-auto px-4 md:px-6 py-8 w-full">


    <!-- Header -->

    <div class="mb-8">

        <p class="text-sm font-semibold text-blue-600 mb-1.5">
            University Updates
        </p>


        <h1 class="text-3xl md:text-4xl font-bold text-slate-800">
            Announcements
        </h1>


        <p class="text-slate-500 mt-2">
            Stay informed about university and club activities.
        </p>

    </div>





    <!-- Main Layout -->

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">



        <!-- LEFT FILTER -->

        <div class="lg:col-span-1">


            <div class="
                bg-white
                rounded-2xl
                border
                border-slate-200
                shadow-sm
                p-5
                sticky
                top-20
            ">


                <h3 class="
                    font-bold
                    text-slate-800
                    mb-4
                ">
                    Filter Announcements
                </h3>



                <!-- Search -->

                <form method="GET">


                    <div class="relative mb-5">


                        <i data-lucide="search" class="
                            absolute
                            left-3
                            top-3
                            w-4
                            h-4
                            text-slate-400
                            ">
                        </i>


                        <input type="text" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                            placeholder="Search..." class="
                            w-full
                            pl-10
                            pr-3
                            py-2.5
                            rounded-xl
                            border
                            border-slate-200
                            bg-slate-50
                            text-sm
                            focus:ring-2
                            focus:ring-blue-500/30
                            focus:border-blue-500
                            outline-none
                            ">


                    </div>


                </form>





                <!-- Priority Filter -->


                <p class="
                    text-xs
                    uppercase
                    font-semibold
                    text-slate-400
                    mb-3
                ">
                    Priority
                </p>



                <div class="space-y-2">


                    <?php

                    $filters = [

                        '' =>
                        [
                            'label'=>'All Announcements',
                            'icon'=>'bell'
                        ],

                        'high'=>
                        [
                            'label'=>'Important',
                            'icon'=>'flame'
                        ],

                        'medium'=>
                        [
                            'label'=>'Updates',
                            'icon'=>'megaphone'
                        ],

                        'low'=>
                        [
                            'label'=>'Notices',
                            'icon'=>'info'
                        ]

                    ];


                    foreach($filters as $key=>$filter):

                    ?>


                    <a href="?priority=<?= $key ?>" class="
                        flex
                        items-center
                        gap-3
                        px-4
                        py-3
                        rounded-xl
                        text-sm
                        transition

                        <?= $priorityFilter == $key

                        ? 'bg-blue-50 text-blue-600 font-semibold'

                        : 'text-slate-600 hover:bg-slate-50'

                        ?>

                        ">


                        <i data-lucide="<?= $filter['icon'] ?>" class="w-4 h-4">
                        </i>


                        <?= $filter['label'] ?>


                    </a>


                    <?php endforeach; ?>


                </div>



            </div>


        </div>







        <!-- RIGHT DATA -->


        <div class="lg:col-span-3">



            <div class="flex items-center justify-between mb-4">


                <h2 class="
                    text-lg
                    font-bold
                    text-slate-800
                ">
                    Latest Announcements
                </h2>


                <span class="
                    text-sm
                    text-slate-500
                ">

                    <?= count($announcements) ?> results

                </span>


            </div>





            <div class="space-y-4">



                <?php if(empty($announcements)): ?>


                <div class="
                    bg-white
                    rounded-2xl
                    border
                    border-slate-200
                    py-16
                    text-center
                ">


                    <i data-lucide="bell-off" class="
                        w-10
                        h-10
                        mx-auto
                        text-slate-300
                        ">
                    </i>


                    <h3 class="
                        mt-4
                        font-bold
                        text-slate-800
                    ">
                        No announcements found
                    </h3>


                </div>




                <?php else: ?>


                <?php foreach($announcements as $announcement): ?>


                <?php

                $priority =
                    $announcement->getPriority();


                $priorityStyle = match($priority){

                    'high'=>
                    [
                        'class'=>'bg-red-50 text-red-600',
                        'icon'=>'flame',
                        'text'=>'Important'
                    ],


                    'medium'=>
                    [
                        'class'=>'bg-amber-50 text-amber-600',
                        'icon'=>'megaphone',
                        'text'=>'Update'
                    ],


                    default=>
                    [
                        'class'=>'bg-blue-50 text-blue-600',
                        'icon'=>'info',
                        'text'=>'Notice'
                    ]

                };


                ?>



                <!-- Announcement Card -->


                <a href="<?= BASE_URL ?>/announcements/<?= $announcement->getId() ?>" class="
                    block
                    bg-white
                    rounded-2xl
                    border
                    border-slate-200
                    p-5
                    hover:shadow-md
                    hover:border-blue-200
                    transition
                    ">


                    <div class="flex justify-between gap-4">


                        <div class="flex-1">


                            <span class="
                                inline-flex
                                items-center
                                gap-1.5
                                px-3
                                py-1
                                rounded-full
                                text-xs
                                font-semibold
                                <?= $priorityStyle['class'] ?>
                            ">


                                <i data-lucide="<?= $priorityStyle['icon'] ?>" class="w-3.5 h-3.5">
                                </i>


                                <?= $priorityStyle['text'] ?>


                            </span>




                            <h3 class="
                                mt-3
                                text-lg
                                font-bold
                                text-slate-800
                            ">

                                <?= htmlspecialchars(
                                    $announcement->getTitle()
                                ) ?>

                            </h3>




                            <p class="
                                mt-2
                                text-sm
                                text-slate-500
                                line-clamp-2
                            ">

                                <?= htmlspecialchars(
                                    $announcement->getContent()
                                ) ?>

                            </p>



                        </div>



                        <i data-lucide="chevron-right" class="
                            w-5
                            h-5
                            text-slate-300
                            mt-8
                            ">
                        </i>


                    </div>




                    <div class="
                        mt-4
                        pt-4
                        border-t
                        border-slate-100
                        flex
                        justify-between
                        text-xs
                        text-slate-400
                    ">


                        <span>
                            University
                        </span>


                        <span>
                            <?= date(
                                'M d, Y',
                                strtotime(
                                    $announcement->getPublishedAt()
                                )
                            ) ?>
                        </span>


                    </div>


                </a>



                <?php endforeach; ?>


                <?php endif; ?>


            </div>


        </div>


    </div>


</div>