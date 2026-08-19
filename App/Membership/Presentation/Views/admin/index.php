<div class="space-y-6">

    <div class="animate-slideInLeft">
        <a href="<?= BASE_URL ?>/admin/clubs"
            class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
            <span>Back to Clubs</span>
        </a>
    </div>
    <!-- Header -->

    <div class="
        flex
        flex-col
        md:flex-row
        md:items-center
        md:justify-between
        gap-4">


        <div>

            <h1 class="text-2xl font-bold text-slate-800">
                Membership Requests
            </h1>


            <p class="text-slate-500 mt-1">
                Review and manage student club membership applications.
            </p>


        </div>


    </div>





    <!-- Statistics -->

    <div class="
        grid
        grid-cols-1
        sm:grid-cols-3
        gap-4">


        <!-- Pending -->

        <div class="
            bg-white
            rounded-xl
            border
            border-slate-200
            shadow-sm
            p-4
            flex
            items-center
            gap-3">


            <div class="
                w-10
                h-10
                rounded-lg
                bg-yellow-50
                text-yellow-600
                flex
                items-center
                justify-center">

                <i data-lucide="clock-3" class="w-5 h-5"></i>

            </div>



            <div>

                <p class="
                    text-[11px]
                    uppercase
                    tracking-wide
                    text-slate-400
                    font-medium">

                    Pending Requests

                </p>


                <p class="
                    text-xl
                    font-bold
                    text-slate-800">

                    <?= $statistics['pending_requests'] ?? 0 ?>

                </p>


                <p class="text-[11px] text-slate-400">

                    Waiting approval

                </p>


            </div>


        </div>






        <!-- Today -->


        <div class="
            bg-white
            rounded-xl
            border
            border-slate-200
            shadow-sm
            p-4
            flex
            items-center
            gap-3">


            <div class="
                w-10
                h-10
                rounded-lg
                bg-blue-50
                text-blue-600
                flex
                items-center
                justify-center">


                <i data-lucide="calendar-plus" class="w-5 h-5"></i>


            </div>



            <div>

                <p class="
                    text-[11px]
                    uppercase
                    tracking-wide
                    text-slate-400
                    font-medium">

                    Today Requests

                </p>


                <p class="
                    text-xl
                    font-bold
                    text-slate-800">

                    <?= $statistics['today_requests'] ?? 0 ?>

                </p>


                <p class="text-[11px] text-slate-400">

                    New applications

                </p>


            </div>


        </div>







        <!-- Approved -->


        <div class="
            bg-white
            rounded-xl
            border
            border-slate-200
            shadow-sm
            p-4
            flex
            items-center
            gap-3">


            <div class="
                w-10
                h-10
                rounded-lg
                bg-green-50
                text-green-600
                flex
                items-center
                justify-center">


                <i data-lucide="users" class="w-5 h-5"></i>


            </div>



            <div>

                <p class="
                    text-[11px]
                    uppercase
                    tracking-wide
                    text-slate-400
                    font-medium">

                    Approved Members

                </p>


                <p class="
                    text-xl
                    font-bold
                    text-slate-800">

                    <?= $statistics['approved_members'] ?? 0 ?>

                </p>


                <p class="text-[11px] text-slate-400">

                    Active memberships

                </p>


            </div>


        </div>


    </div>








    <!-- Membership Table -->

    <div class="
        bg-white
        rounded-xl
        border
        border-slate-200
        shadow-sm
        overflow-hidden">



        <?php if (empty($memberships)): ?>


            <!-- Empty State -->


            <div class="py-16 text-center">


                <div class="
                w-14
                h-14
                mx-auto
                rounded-xl
                bg-blue-50
                text-blue-600
                flex
                items-center
                justify-center">


                    <i data-lucide="users-round" class="w-7 h-7"></i>


                </div>



                <h3 class="
                mt-4
                text-lg
                font-bold
                text-slate-800">

                    No Pending Requests

                </h3>



                <p class="
                text-sm
                text-slate-500
                mt-2">

                    All membership requests have been processed.

                </p>


            </div>





        <?php else: ?>




            <!-- Desktop Table -->


            <!-- Desktop Table -->

            <div class="overflow-x-auto">

                <table class="w-full text-sm text-slate-700">

                    <thead class="
            bg-slate-50/80
            text-xs
            font-semibold
            text-slate-500
            uppercase
            tracking-wider
            border-b
            border-slate-200">

                        <tr>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Student
                            </th>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Student ID
                            </th>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Club
                            </th>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Department
                            </th>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Year
                            </th>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Status
                            </th>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        <?php foreach ($memberships as $membership): ?>

                            <tr class="
                hover:bg-slate-50/60
                transition-colors">

                                <!-- Student -->

                                <!-- Student -->

                                <td class="px-5 py-3.5">

                                    <div class="flex items-center gap-3">

                                        <!-- Profile Avatar -->

                                        <div class="
            w-9 h-9
            rounded-full
            overflow-hidden
            flex
            items-center
            justify-center
            bg-gradient-to-br
            from-blue-100
            to-blue-200
            text-blue-700
            font-semibold
            text-xs
            shadow-sm
            flex-shrink-0
        ">

                                            <?php if (!empty($membership['profile_image'])): ?>

                                                <img src="<?= BASE_URL ?>/uploads/profile/<?= htmlspecialchars($membership['profile_image']) ?>"
                                                    alt="<?= htmlspecialchars($membership['student_name']) ?>"
                                                    class="w-full h-full object-cover" loading="lazy">

                                            <?php else: ?>

                                                <?php
                                                $name = trim($membership['student_name'] ?? '');
                                                $words = preg_split('/\s+/', $name);

                                                if (count($words) >= 2) {
                                                    $initials = strtoupper(
                                                        substr($words[0], 0, 1) .
                                                            substr($words[1], 0, 1)
                                                    );
                                                } else {
                                                    $initials = strtoupper(
                                                        substr($words[0] ?? 'U', 0, 1)
                                                    );
                                                }
                                                ?>

                                                <?= htmlspecialchars($initials) ?>

                                            <?php endif; ?>

                                        </div>


                                        <!-- Student Information -->

                                        <div class="min-w-0">

                                            <p class="
                                            font-medium
                                            text-slate-800
                                            whitespace-nowrap
                                        ">

                                                <?= htmlspecialchars($membership['student_name']) ?>

                                            </p>

                                        </div>

                                    </div>

                                </td>


                                <!-- Student ID -->

                                <td class="px-5 py-3.5">

                                    <span class="
                        text-sm
                        font-medium
                        text-slate-600
                        whitespace-nowrap">

                                        <?= htmlspecialchars(
                                            $membership['student_id']
                                        ) ?>

                                    </span>

                                </td>


                                <!-- Club -->

                                <td class="px-5 py-3.5">

                                    <p class="
                        font-medium
                        text-slate-700
                        whitespace-nowrap">

                                        <?= htmlspecialchars(
                                            $membership['club_name']
                                        ) ?>

                                    </p>

                                </td>


                                <!-- Department -->

                                <td class="px-5 py-3.5 text-slate-600">

                                    <?= htmlspecialchars(
                                        $membership['department_name']
                                            ?? '-'
                                    ) ?>

                                </td>


                                <!-- Year -->

                                <td class="px-5 py-3.5 text-slate-600 whitespace-nowrap">

                                    <?= htmlspecialchars(
                                        $membership['academic_year']
                                            ?? '-'
                                    ) ?>

                                </td>


                                <!-- Status -->

                                <td class="px-5 py-3.5">

                                    <span class="
                        inline-flex
                        items-center
                        px-3
                        py-1
                        rounded-full
                        bg-amber-50
                        text-amber-700
                        text-xs
                        font-medium">

                                        <span class="
                            w-2
                            h-2
                            rounded-full
                            bg-amber-500
                            mr-1.5">
                                        </span>

                                        Pending

                                    </span>

                                </td>


                                <!-- Actions -->

                                <td class="px-5 py-3.5 text-right">

                                    <div class="
    flex
    justify-end
    gap-2">


                                        <!-- Approve -->

                                        <form method="POST"
                                            action="<?= BASE_URL ?>/admin/memberships/<?= (int)$membership['id'] ?>/approve"
                                            onsubmit="return confirm('Approve this membership request?');">


                                            <button type="submit" class="
            px-4
            py-2
            inline-flex
            items-center
            gap-2
            rounded-lg
            bg-green-600
            hover:bg-green-700
            text-white
            text-xs
            font-semibold
            transition">


                                                <i data-lucide="circle-check" class="w-4 h-4">
                                                </i>

                                                Approve


                                            </button>


                                        </form>





                                        <!-- Reject -->

                                        <form method="POST"
                                            action="<?= BASE_URL ?>/admin/memberships/<?= (int)$membership['id'] ?>/reject"
                                            onsubmit="return confirm('Reject this membership request?');">


                                            <button type="submit" class="
            px-4
            py-2
            inline-flex
            items-center
            gap-2
            rounded-lg
            border
            border-red-200
            text-red-600
            hover:bg-red-50
            text-xs
            font-semibold
            transition">


                                                <i data-lucide="circle-x" class="w-4 h-4">
                                                </i>

                                                Reject


                                            </button>


                                        </form>


                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>





        <?php endif; ?>



    </div>


</div>