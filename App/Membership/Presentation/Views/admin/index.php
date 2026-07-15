<div class="space-y-6">


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

                    <?= $statistics['pending_requests']?? 0 ?>

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

                        <td class="px-5 py-3.5">

                            <p class="font-medium text-slate-800 whitespace-nowrap">

                                <?= htmlspecialchars(
                                            $membership['student_name']
                                        ) ?>

                            </p>

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