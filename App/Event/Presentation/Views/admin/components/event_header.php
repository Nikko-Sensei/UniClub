<div class="space-y-6">

    <!-- ========================================================== -->
    <!-- BACK BUTTON – Glass with slide-in                         -->
    <!-- ========================================================== -->
    <div class="animate-slideInLeft">
        <a href="<?= BASE_URL ?>/admin/events"
            class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
            <span>Back to Events</span>
        </a>
    </div>
    <!-- ========================================================== -->
    <!-- BANNER                                                    -->
    <!-- ========================================================== -->

    <div class="group relative rounded-2xl overflow-hidden shadow-xl border border-slate-100/60">


        <?php if ($event->getBanner()): ?>


        <img src="<?= BASE_URL ?>/uploads/events/<?= htmlspecialchars($event->getBanner()) ?>"
            class="w-full h-64 md:h-80 object-cover transition-transform duration-700 group-hover:scale-105"
            alt="<?= htmlspecialchars($event->getTitle()) ?>">



        <?php else: ?>


        <div
            class="w-full h-64 md:h-80 bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center text-blue-400">


            <i data-lucide="calendar-days" class="w-20 h-20"></i>


        </div>


        <?php endif; ?>



        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-slate-900/20 to-transparent"></div>



    </div>





    <!-- ========================================================== -->
    <!-- EVENT TITLE HEADER                                        -->
    <!-- ========================================================== -->


    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">


        <div>


            <h1 class="text-3xl md:text-4xl font-bold text-slate-800">


                <?= htmlspecialchars($event->getTitle()) ?>


            </h1>



            <p class="text-slate-500 mt-1">

                Event administration workspace.

            </p>


        </div>





        <div class="flex gap-3">


            <a href="<?= BASE_URL ?>/admin/events/<?= $event->getId() ?>/edit"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-amber-50 hover:bg-amber-100 text-amber-700 rounded-xl text-sm font-semibold border border-amber-200">


                <i data-lucide="square-pen" class="w-4 h-4"></i>


                Edit Event


            </a>


        </div>


    </div>





    <!-- ========================================================== -->
    <!-- EVENT TABS                                                -->
    <!-- ========================================================== -->


    <div class="border-b border-slate-200">


        <nav class="flex gap-2 overflow-x-auto">


            <?php


            $tabs = [


                'overview' => [

                    'label' => 'Overview',

                    'icon' => 'layout-dashboard',

                    'url' => 'show'

                ],


                'registrations' => [

                    'label' => 'Registrations',

                    'icon' => 'users',

                    'url' => 'registrations'

                ],


                'attendance' => [

                    'label' => 'Attendance',

                    'icon' => 'clipboard-check',

                    'url' => 'attendance'

                ],


                'certificates' => [

                    'label' => 'Certificates',

                    'icon' => 'award',

                    'url' => 'certificates'

                ],


                'feedback' => [

                    'label' => 'Feedback',

                    'icon' => 'message-square',

                    'url' => 'feedbacks'

                ]

            ];




            foreach ($tabs as $key => $tab):


                $active =
                    $activeTab === $key;


            ?>



            <a href="<?= BASE_URL ?>/admin/events/<?= $event->getId() ?>/<?= $tab['url'] ?>" class="px-5 py-3 rounded-t-lg flex items-center gap-2 transition

        <?= $active

                    ?

                    'bg-blue-600 text-white'

                    :

                    'text-slate-600 hover:bg-slate-100'

        ?>

        ">


                <i data-lucide="<?= $tab['icon'] ?>" class="w-4 h-4"></i>


                <?= $tab['label'] ?>


            </a>



            <?php endforeach; ?>


        </nav>


    </div>



</div>