<div class="max-w-7xl mx-auto px-4 md:px-6 py-8 w-full">


    <!-- ========================================================== -->
    <!-- EVENT BANNER                                               -->
    <!-- ========================================================== -->

    <div class="relative h-64 md:h-80 rounded-2xl overflow-hidden shadow-md bg-gray-100">


        <?php if ($event->getBanner()): ?>


        <img src="<?= BASE_URL ?>/uploads/events/<?= htmlspecialchars($event->getBanner()) ?>"
            class="w-full h-full object-cover">


        <?php else: ?>


        <div class="w-full h-full bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center">

            <span class="text-blue-400 font-semibold">
                Event Banner
            </span>

        </div>


        <?php endif; ?>


        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>


    </div>





    <!-- ========================================================== -->
    <!-- HEADER                                                     -->
    <!-- ========================================================== -->


    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">


        <div>


            <h1 class="text-3xl md:text-4xl font-bold text-slate-800">

                <?= htmlspecialchars($event->getTitle()) ?>

            </h1>



            <div class="mt-3 flex flex-wrap items-center gap-5 text-sm text-slate-600">


                <!-- Club -->

                <span class="flex items-center gap-2">


                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6" />

                    </svg>


                    <span>

                        <strong>Organized by:</strong>

                        <?= htmlspecialchars(
                            method_exists($event, 'getClubName')
                                ? $event->getClubName()
                                : 'University Club'
                        ) ?>

                    </span>


                </span>





                <!-- Capacity -->

                <span class="flex items-center gap-2">


                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m8-4a4 4 0 11-8 0 4 4 0 018 0z" />

                    </svg>


                    <span>

                        <?= $event->getCapacity() ?? 0 ?>

                        Students

                    </span>


                </span>


            </div>


        </div>



        <!-- Share Button -->

        <button
            class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 text-sm font-medium transition">

            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">

                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />

            </svg>

            Share

        </button>


    </div>

    <!-- ========================================================== -->
    <!-- EVENT DETAILS                                              -->
    <!-- ========================================================== -->


    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


        <!-- ========================================================== -->
        <!-- EVENT OVERVIEW                                             -->
        <!-- ========================================================== -->


        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8">


            <h2 class="text-xl font-bold text-slate-800 mb-4">

                Event Overview

            </h2>



            <p class="text-slate-600 leading-relaxed">

                <?= nl2br(
                htmlspecialchars(
                    $event->getDescription()
                )
            ) ?>

            </p>


        </div>


        <!-- Details -->

        <div class="lg:col-span-1 bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8">


            <h2 class="text-xl font-bold text-slate-800 mb-6">

                Event Details

            </h2>




            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-5 text-sm">


                <div>

                    <dt class="text-slate-500">
                        Event Name
                    </dt>


                    <dd class="font-semibold text-slate-800">

                        <?= htmlspecialchars($event->getTitle()) ?>

                    </dd>

                </div>




                <div>

                    <dt class="text-slate-500">
                        Category
                    </dt>


                    <dd class="font-semibold text-slate-800">

                        <?= htmlspecialchars(
                            method_exists($event, 'getCategoryName')
                                ? $event->getCategoryName()
                                : '-'
                        ) ?>

                    </dd>

                </div>




                <div>

                    <dt class="text-slate-500">
                        Date
                    </dt>


                    <dd class="font-semibold text-slate-800">

                        <?= htmlspecialchars($event->getEventDate()) ?>

                    </dd>

                </div>




                <div>

                    <dt class="text-slate-500">
                        Time
                    </dt>


                    <dd class="font-semibold text-slate-800">

                        <?= htmlspecialchars($event->getStartTime()) ?>

                        -

                        <?= htmlspecialchars($event->getEndTime()) ?>

                    </dd>

                </div>




                <div>

                    <dt class="text-slate-500">
                        Venue
                    </dt>


                    <dd class="font-semibold text-slate-800">

                        <?= htmlspecialchars($event->getVenue()) ?>

                    </dd>

                </div>




                <div>

                    <dt class="text-slate-500">
                        Capacity
                    </dt>


                    <dd class="font-semibold text-slate-800">

                        <?= htmlspecialchars($event->getCapacity()) ?>

                        seats

                    </dd>

                </div>




                <div>

                    <dt class="text-slate-500">
                        Registration Deadline
                    </dt>


                    <dd class="font-semibold text-slate-800">

                        <?= htmlspecialchars($event->getRegistrationDeadline()) ?>

                    </dd>

                </div>




                <div>

                    <dt class="text-slate-500">
                        Status
                    </dt>


                    <dd class="font-semibold text-blue-600">

                        <?= ucfirst(
                            htmlspecialchars(
                                $event->getStatus()
                            )
                        ) ?>

                    </dd>

                </div>



            </dl>


        </div>

    </div>


</div>





<!-- ========================================================== -->
<!-- REGISTRATION STATUS                                        -->
<!-- ========================================================== -->


<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">


    <?php if ($registrationStatus === null): ?>


    <button type="button" onclick="openRegisterModal()"
        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold transition">

        Register for this Event

    </button>




    <?php elseif ($registrationStatus === 'pending'): ?>


    <div class="bg-yellow-50 text-yellow-700 px-5 py-3 rounded-xl font-medium">

        Registration Pending Approval

    </div>




    <?php elseif ($registrationStatus === 'approved'): ?>


    <div class="bg-green-50 text-green-700 px-5 py-3 rounded-xl font-medium">

        You are registered for this event

    </div>




    <?php elseif ($registrationStatus === 'cancelled'): ?>


    <button type="button" onclick="openRegisterModal()"
        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold transition">

        Register Again

    </button>




    <?php endif; ?>


</div>


</div>

<!-- ========================================================== -->
<!-- EVENT REGISTRATION MODAL                                  -->
<!-- ========================================================== -->


<div id="registerModal" onclick="closeRegisterModal()"
    class="fixed inset-0 hidden bg-black/40 flex items-center justify-center z-50 px-4">


    <div onclick="event.stopPropagation()"
        class="bg-white rounded-2xl shadow-xl border border-slate-100 w-full max-w-md p-5">


        <!-- Header -->

        <div class="flex items-center justify-between border-b border-slate-100 pb-3 mb-4">


            <div class="flex items-center gap-2">


                <div class="bg-blue-100 text-blue-600 p-1.5 rounded-lg">


                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3M9 7a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />

                    </svg>


                </div>


                <h2 class="text-base font-bold text-slate-800">

                    Event Registration

                </h2>


            </div>


            <button onclick="closeRegisterModal()" class="text-slate-400 hover:text-slate-600">

                ✕

            </button>


        </div>





        <form method="POST" action="<?= BASE_URL ?>/events/<?= $event->getId() ?>/register" class="space-y-3">



            <!-- Student Information -->

            <div class="bg-blue-50 border border-blue-100 rounded-xl p-3 grid grid-cols-2 gap-3">


                <div>

                    <label class="block text-[9px] font-bold text-slate-400 uppercase">
                        Name
                    </label>


                    <p class="text-xs font-semibold text-slate-700">
                        <?= htmlspecialchars($_SESSION['user']['name']) ?>
                    </p>

                </div>



                <div>

                    <label class="block text-[9px] font-bold text-slate-400 uppercase">
                        Student ID
                    </label>


                    <p class="text-xs font-semibold text-slate-700">
                        <?= htmlspecialchars($_SESSION['user']['student_id'] ?? '-') ?>
                    </p>

                </div>



                <div>

                    <label class="block text-[9px] font-bold text-slate-400 uppercase">
                        Email
                    </label>


                    <p class="text-xs font-semibold text-slate-700 truncate">
                        <?= htmlspecialchars($_SESSION['user']['email'] ?? '-') ?>
                    </p>

                </div>



                <div>

                    <label class="block text-[9px] font-bold text-slate-400 uppercase">
                        Phone
                    </label>


                    <p class="text-xs font-semibold text-slate-700">
                        <?= htmlspecialchars($_SESSION['user']['phone'] ?? '-') ?>
                    </p>

                </div>


            </div>






            <!-- Event -->

            <div>

                <label class="block text-xs font-bold text-slate-700 mb-1">

                    Event

                </label>


                <input type="text" readonly value="<?= htmlspecialchars($event->getTitle()) ?>"
                    class="w-full bg-slate-50 text-xs px-3 py-2 rounded-lg border border-slate-200">

            </div>






            <!-- Academic + Department -->

            <div class="grid grid-cols-2 gap-3">


                <div>

                    <label class="block text-xs font-bold text-slate-700 mb-1">
                        Year
                    </label>


                    <input type="text" readonly
                        value="<?= htmlspecialchars($_SESSION['user']['academic_year_name'] ?? '-') ?>"
                        class="w-full bg-slate-50 text-xs px-3 py-2 rounded-lg border border-slate-200">

                </div>




                <div>

                    <label class="block text-xs font-bold text-slate-700 mb-1">
                        Department
                    </label>


                    <input type="text" readonly
                        value="<?= htmlspecialchars($_SESSION['user']['department_name'] ?? '-') ?>"
                        class="w-full bg-slate-50 text-xs px-3 py-2 rounded-lg border border-slate-200">

                </div>


            </div>






            <!-- Note -->

            <div>

                <label class="block text-xs font-bold text-slate-700 mb-1">

                    Note

                </label>


                <textarea name="note" rows="2" placeholder="Message..."
                    class="w-full text-xs p-3 rounded-lg border border-slate-300 resize-none focus:ring-2 focus:ring-blue-500 outline-none"></textarea>

            </div>






            <!-- Buttons -->

            <div class="flex gap-3 pt-2">


                <button type="submit"
                    class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold py-2.5 rounded-lg">

                    Confirm

                </button>



                <button type="button" onclick="closeRegisterModal()"
                    class="flex-1 bg-blue-100 hover:bg-blue-200 text-blue-700 text-xs font-semibold py-2.5 rounded-lg">

                    Cancel

                </button>


            </div>



        </form>


    </div>


</div>

<script>
function openRegisterModal() {

    document
        .getElementById('registerModal')
        .classList
        .remove('hidden');

}



function closeRegisterModal() {

    document
        .getElementById('registerModal')
        .classList
        .add('hidden');

}
</script>