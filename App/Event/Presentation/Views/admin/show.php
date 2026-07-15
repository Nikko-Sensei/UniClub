<div class="space-y-8">


    <!-- Banner -->

    <div class="relative h-64 md:h-80 rounded-2xl overflow-hidden bg-slate-100 shadow-sm">


        <?php if ($event->getBanner()): ?>


        <img src="<?= BASE_URL ?>/uploads/events/<?= htmlspecialchars($event->getBanner()) ?>"
            class="w-full h-full object-cover" alt="">


        <?php else: ?>


        <div
            class="w-full h-full bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center text-blue-400">

            <i class="fa-solid fa-calendar-days text-5xl"></i>

        </div>


        <?php endif; ?>


        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/50 to-transparent"></div>


    </div>




    <!-- Header -->

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">


        <div>


            <h1 class="text-3xl md:text-4xl font-bold text-slate-800">

                <?= htmlspecialchars($event->getTitle()) ?>

            </h1>


            <p class="text-slate-500 mt-2">

                Event administration and registration management.

            </p>


        </div>




        <div class="flex flex-wrap gap-3">


            <a href="<?= BASE_URL ?>/admin/events/<?= $event->getId() ?>/registrations"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-sm font-semibold">

                <i class="fa-solid fa-users"></i>

                Registrations

            </a>


            <a href="<?= BASE_URL ?>/admin/events/<?= $event->getId() ?>/edit"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-amber-50 hover:bg-amber-100 text-amber-700 rounded-xl text-sm font-semibold">

                <i class="fa-solid fa-pen"></i>

                Edit Event

            </a>


        </div>


    </div>




    <!-- Content -->

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">


        <!-- Overview -->

        <div class="lg:col-span-3 bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8">


            <h2 class="text-xl font-bold text-slate-800 mb-4">

                Event Overview

            </h2>


            <p class="text-slate-600 leading-relaxed">

                <?= nl2br(
                    htmlspecialchars($event->getDescription())
                ) ?>

            </p>


        </div>




        <!-- Status -->

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">


            <p class="text-sm text-slate-500">

                Event Status

            </p>


            <p class="mt-2 text-lg font-bold text-blue-600">

                <?= ucfirst(
                    htmlspecialchars($event->getStatus())
                ) ?>

            </p>


            <div class="mt-5 pt-5 border-t border-slate-100">


                <p class="text-sm text-slate-500">

                    Capacity

                </p>


                <p class="mt-1 text-2xl font-bold text-slate-800">

                    <?= number_format($event->getCapacity()) ?>

                </p>


                <p class="text-xs text-slate-400">

                    Students

                </p>


            </div>


        </div>


    </div>




    <!-- Details -->

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8">


        <h2 class="text-xl font-bold text-slate-800 mb-6">

            Event Details

        </h2>




        <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">


            <div>

                <dt class="text-sm text-slate-500">

                    Event Date

                </dt>

                <dd class="mt-1 font-semibold text-slate-800">

                    <?= date(
                        'M d, Y',
                        strtotime($event->getEventDate())
                    ) ?>

                </dd>

            </div>




            <div>

                <dt class="text-sm text-slate-500">

                    Event Time

                </dt>

                <dd class="mt-1 font-semibold text-slate-800">

                    <?= date(
                        'h:i A',
                        strtotime($event->getStartTime())
                    ) ?>

                    -

                    <?= date(
                        'h:i A',
                        strtotime($event->getEndTime())
                    ) ?>

                </dd>

            </div>




            <div>

                <dt class="text-sm text-slate-500">

                    Venue

                </dt>

                <dd class="mt-1 font-semibold text-slate-800">

                    <?= htmlspecialchars($event->getVenue()) ?>

                </dd>

            </div>




            <div>

                <dt class="text-sm text-slate-500">

                    Capacity

                </dt>

                <dd class="mt-1 font-semibold text-slate-800">

                    <?= number_format($event->getCapacity()) ?>

                    Students

                </dd>

            </div>




            <div>

                <dt class="text-sm text-slate-500">

                    Registration Deadline

                </dt>

                <dd class="mt-1 font-semibold text-slate-800">

                    <?= date(
                        'M d, Y h:i A',
                        strtotime($event->getRegistrationDeadline())
                    ) ?>

                </dd>

            </div>




            <div>

                <dt class="text-sm text-slate-500">

                    Club

                </dt>

                <dd class="mt-1 font-semibold text-slate-800">

                    <?= htmlspecialchars(
                        method_exists($event, 'getClubName')
                            ? $event->getClubName()
                            : '-'
                    ) ?>

                </dd>

            </div>




            <div>

                <dt class="text-sm text-slate-500">

                    Category

                </dt>

                <dd class="mt-1 font-semibold text-slate-800">

                    <?= htmlspecialchars(
                        method_exists($event, 'getCategoryName')
                            ? $event->getCategoryName()
                            : '-'
                    ) ?>

                </dd>

            </div>




            <div>

                <dt class="text-sm text-slate-500">

                    Created At

                </dt>

                <dd class="mt-1 font-semibold text-slate-800">

                    <?= date(
                        'M d, Y',
                        strtotime($event->getCreatedAt())
                    ) ?>

                </dd>

            </div>


        </dl>


    </div>




    <!-- Footer Action -->

    <div>


        <a href="<?= BASE_URL ?>/admin/events"
            class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-blue-600 transition">

            <i class="fa-solid fa-arrow-left"></i>

            Back to Events

        </a>


    </div>


</div>