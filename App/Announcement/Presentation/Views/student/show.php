<?php

$priority = $announcement->getPriority();

$priorityStyle = match ($priority) {

    'high' => [
        'bg' => 'bg-red-50',
        'text' => 'text-red-600',
        'icon' => 'triangle-alert',
        'label' => 'Important'
    ],

    'medium' => [
        'bg' => 'bg-amber-50',
        'text' => 'text-amber-600',
        'icon' => 'megaphone',
        'label' => 'Update'
    ],

    default => [
        'bg' => 'bg-blue-50',
        'text' => 'text-blue-600',
        'icon' => 'info',
        'label' => 'Notice'
    ]

};

?>


<div class="max-w-7xl mx-auto px-4 md:px-6 py-8 w-full space-y-6">



    <!-- Header -->

    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-5">


        <div class="flex-1">


            <p class="text-sm font-semibold text-blue-600 mb-2">
                University Announcement
            </p>


            <h1 class="text-3xl md:text-4xl font-bold text-slate-800 leading-tight">

                <?= htmlspecialchars(
                    $announcement->getTitle()
                ) ?>

            </h1>



            <div class="flex flex-wrap items-center gap-3 mt-5">


                <!-- Date -->

                <span class="inline-flex items-center gap-2 text-sm text-slate-500">

                    <i data-lucide="calendar-days" class="w-4 h-4 text-blue-500">
                    </i>


                    <?= date(
                        'M d, Y',
                        strtotime(
                            $announcement->getCreatedAt()
                        )
                    ) ?>

                </span>



                <!-- Priority -->

                <span class="
                    inline-flex
                    items-center
                    gap-1.5
                    px-3
                    py-1
                    rounded-full
                    text-xs
                    font-semibold
                    <?= $priorityStyle['bg'] ?>
                    <?= $priorityStyle['text'] ?>
                ">


                    <i data-lucide="<?= $priorityStyle['icon'] ?>" class="w-3.5 h-3.5">
                    </i>


                    <?= $priorityStyle['label'] ?>


                </span>


            </div>


        </div>




        <!-- Back Button -->

        <a href="<?= BASE_URL ?>/announcements" class="
            inline-flex
            items-center
            gap-2
            px-4
            py-2.5
            rounded-xl
            bg-white
            border
            border-slate-200
            text-sm
            font-semibold
            text-slate-600
            hover:bg-slate-50
            transition
            ">


            <i data-lucide="arrow-left" class="w-4 h-4">
            </i>


            Back


        </a>


    </div>






    <!-- Main Layout -->


    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">





        <!-- Content -->


        <div class="
            lg:col-span-2
            bg-white
            rounded-2xl
            border
            border-slate-200
            shadow-sm
            overflow-hidden
        ">



            <!-- Content Header -->


            <div class="
                px-6
                py-5
                border-b
                border-slate-100
                flex
                items-center
                gap-3
            ">


                <div class="
                    w-11
                    h-11
                    rounded-xl
                    bg-blue-50
                    flex
                    items-center
                    justify-center
                ">


                    <i data-lucide="megaphone" class="w-5 h-5 text-blue-600">
                    </i>


                </div>



                <div>

                    <h2 class="font-bold text-slate-800">
                        Announcement Details
                    </h2>

                    <p class="text-xs text-slate-400">
                        Latest university information
                    </p>

                </div>


            </div>






            <!-- Message -->


            <div class="
                p-6
                md:p-8
                text-slate-600
                leading-relaxed
                whitespace-pre-line
                text-sm
                md:text-base
            ">


                <?= htmlspecialchars(
                    $announcement->getContent()
                ) ?>


            </div>


        </div>







        <!-- Sidebar -->


        <div class="space-y-5">





            <!-- Information Card -->


            <div class="
                bg-white
                rounded-2xl
                border
                border-slate-200
                shadow-sm
                p-5
            ">


                <h3 class="
                    font-bold
                    text-slate-800
                    mb-5
                ">

                    Announcement Info

                </h3>




                <div class="space-y-4">



                    <!-- Status -->


                    <div>


                        <p class="text-xs text-slate-400">
                            Status
                        </p>


                        <div class="mt-1 flex items-center gap-2">


                            <span class="
                                w-2
                                h-2
                                rounded-full
                                bg-emerald-500
                            ">
                            </span>


                            <span class="
                                text-sm
                                font-semibold
                                text-emerald-600
                            ">

                                <?= ucfirst(
                                    htmlspecialchars(
                                        $announcement->getStatus()
                                    )
                                ) ?>


                            </span>


                        </div>


                    </div>







                    <!-- Published -->


                    <div>


                        <p class="text-xs text-slate-400">
                            Published Date
                        </p>


                        <p class="
                            mt-1
                            text-sm
                            font-semibold
                            text-slate-700
                        ">


                            <?= date(
                                'M d, Y',
                                strtotime(
                                    $announcement->getCreatedAt()
                                )
                            ) ?>


                        </p>


                    </div>







                    <!-- Priority -->


                    <div>


                        <p class="text-xs text-slate-400">
                            Priority
                        </p>


                        <span class="
                            mt-1
                            inline-flex
                            px-3
                            py-1
                            rounded-full
                            text-xs
                            font-semibold
                            <?= $priorityStyle['bg'] ?>
                            <?= $priorityStyle['text'] ?>
                        ">


                            <?= $priorityStyle['label'] ?>


                        </span>


                    </div>




                </div>


            </div>







            <!-- Quick Action -->


            <div class="
                bg-blue-600
                rounded-2xl
                p-5
                text-white
            ">


                <div class="flex items-center gap-3">


                    <div class="
                        w-10
                        h-10
                        rounded-xl
                        bg-white/20
                        flex
                        items-center
                        justify-center
                    ">


                        <i data-lucide="bell" class="w-5 h-5">
                        </i>


                    </div>


                    <div>


                        <p class="font-bold">
                            Stay Updated
                        </p>


                        <p class="text-xs text-blue-100">
                            Check announcements regularly
                        </p>


                    </div>


                </div>


            </div>




        </div>


    </div>






    <!-- Bottom Navigation -->


    <a href="<?= BASE_URL ?>/announcements" class="
        inline-flex
        items-center
        gap-2
        text-sm
        font-semibold
        text-slate-600
        hover:text-blue-600
        transition
        ">


        <i data-lucide="arrow-left" class="w-4 h-4">
        </i>


        Back to Announcements


    </a>



</div>