<div class="space-y-8">





    <!-- Header -->

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">


        <div>


            <h1 class="text-3xl md:text-4xl font-bold text-slate-800">


                <?= htmlspecialchars(
                    $announcement->getTitle()
                ) ?>


            </h1>


            <p class="text-slate-500 mt-2">

                Announcement administration and publication management.

            </p>


        </div>





        <div class="flex flex-wrap gap-3">


            <a href="<?= BASE_URL ?>/admin/announcements/<?= $announcement->getId() ?>/edit"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-amber-50 hover:bg-amber-100 text-amber-700 rounded-xl text-sm font-semibold">


                <i class="fa-solid fa-pen"></i>

                Edit Announcement


            </a>




            <form action="<?= BASE_URL ?>/admin/announcements/<?= $announcement->getId() ?>/delete" method="POST"
                onsubmit="return confirm('Delete this announcement?')">


                <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2.5 bg-red-50 hover:bg-red-100 text-red-700 rounded-xl text-sm font-semibold">


                    <i class="fa-solid fa-trash"></i>

                    Delete


                </button>


            </form>


        </div>


    </div>





    <!-- Content -->

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">



        <!-- Overview -->

        <div class="lg:col-span-3 bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8">


            <h2 class="text-xl font-bold text-slate-800 mb-4">

                Announcement Overview

            </h2>


            <p class="text-slate-600 leading-relaxed">


                <?= nl2br(
                    htmlspecialchars(
                        $announcement->getContent()
                    )
                ) ?>


            </p>


        </div>





        <!-- Status -->

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">


            <p class="text-sm text-slate-500">

                Announcement Status

            </p>



            <?php

            $status = $announcement->getStatus();

            $statusClass = $status === 'published'
                ? 'text-green-600'
                : 'text-amber-600';

            ?>


            <p class="mt-2 text-lg font-bold <?= $statusClass ?>">


                <?= ucfirst(
                    htmlspecialchars($status)
                ) ?>


            </p>




            <div class="mt-5 pt-5 border-t border-slate-100">


                <p class="text-sm text-slate-500">

                    Priority

                </p>



                <?php

                $priority = $announcement->getPriority();

                $priorityClass = match ($priority) {

                    'high'
                    => 'text-red-600',

                    'medium'
                    => 'text-amber-600',

                    default
                    => 'text-blue-600'

                };

                ?>


                <p class="mt-1 text-2xl font-bold <?= $priorityClass ?>">


                    <?= ucfirst(
                        htmlspecialchars($priority)
                    ) ?>


                </p>


                <p class="text-xs text-slate-400">

                    Announcement priority

                </p>


            </div>


        </div>


    </div>





    <!-- Details -->

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8">


        <h2 class="text-xl font-bold text-slate-800 mb-6">

            Announcement Details

        </h2>




        <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">



            <!-- Priority -->

            <div>


                <dt class="text-sm text-slate-500">

                    Priority

                </dt>


                <dd class="mt-1 font-semibold text-slate-800">


                    <?= ucfirst(
                        htmlspecialchars(
                            $announcement->getPriority()
                        )
                    ) ?>


                </dd>


            </div>





            <!-- Status -->

            <div>


                <dt class="text-sm text-slate-500">

                    Status

                </dt>


                <dd class="mt-1 font-semibold text-slate-800">


                    <?= ucfirst(
                        htmlspecialchars(
                            $announcement->getStatus()
                        )
                    ) ?>


                </dd>


            </div>





            <!-- Club ID -->

            <div>


                <dt class="text-sm text-slate-500">

                    Club ID

                </dt>


                <dd class="mt-1 font-semibold text-slate-800">


                    <?= $announcement->getClubId() ?? '-' ?>


                </dd>


            </div>





            <!-- Created By -->

            <div>


                <dt class="text-sm text-slate-500">

                    Created By

                </dt>


                <dd class="mt-1 font-semibold text-slate-800">


                    <?= $announcement->getCreatedBy() ?>


                </dd>


            </div>





            <!-- Created At -->

            <div>


                <dt class="text-sm text-slate-500">

                    Created At

                </dt>


                <dd class="mt-1 font-semibold text-slate-800">


                    <?= date(
                        'M d, Y',
                        strtotime(
                            $announcement->getCreatedAt()
                        )
                    ) ?>


                </dd>


            </div>





            <!-- Published At -->

            <div>


                <dt class="text-sm text-slate-500">

                    Published At

                </dt>


                <dd class="mt-1 font-semibold text-slate-800">


                    <?php if ($announcement->getPublishedAt()): ?>


                    <?= date(
                        'M d, Y h:i A',
                        strtotime(
                            $announcement->getPublishedAt()
                        )
                    ) ?>


                    <?php else: ?>


                    -


                    <?php endif; ?>


                </dd>


            </div>


        </dl>


    </div>





    <!-- Footer Action -->

    <div>


        <a href="<?= BASE_URL ?>/admin/announcements"
            class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-blue-600 transition">


            <i class="fa-solid fa-arrow-left"></i>

            Back to Announcements


        </a>


    </div>


</div>