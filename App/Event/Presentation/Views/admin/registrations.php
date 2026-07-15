<div class="space-y-8">


    <!-- ========================================================== -->
    <!-- HEADER                                                     -->
    <!-- ========================================================== -->

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">


        <div>


            <h1 class="text-3xl font-bold text-slate-800">

                Event Registrations

            </h1>


            <p class="text-slate-500 mt-2">

                Review and manage student event registration requests.

            </p>


        </div>


        <a href="<?= BASE_URL ?>/admin/events"
            class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-600 hover:bg-slate-50 text-sm font-semibold transition">

            <i class="fa-solid fa-arrow-left"></i>

            Back to Events

        </a>


    </div>





    <!-- ========================================================== -->
    <!-- REGISTRATION TABLE                                         -->
    <!-- ========================================================== -->

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">


        <div class="px-6 py-5 border-b border-slate-100">


            <h2 class="text-lg font-bold text-slate-800">

                Student Registrations

            </h2>


            <p class="text-sm text-slate-500 mt-1">

                <?= count($registrations) ?> registration requests

            </p>


        </div>




        <?php if (!empty($registrations)): ?>


        <div class="overflow-x-auto">


            <table class="w-full text-sm">


                <thead class="bg-slate-50 border-b border-slate-200">


                    <tr class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">


                        <th class="px-6 py-4">

                            Student

                        </th>


                        <th class="px-6 py-4">

                            Student ID

                        </th>


                        <th class="px-6 py-4">

                            Email

                        </th>


                        <th class="px-6 py-4">

                            Note

                        </th>


                        <th class="px-6 py-4">

                            Status

                        </th>


                        <th class="px-6 py-4">

                            Registered

                        </th>


                        <th class="px-6 py-4 text-right">

                            Actions

                        </th>


                    </tr>


                </thead>




                <tbody class="divide-y divide-slate-100">


                    <?php foreach ($registrations as $registration): ?>


                    <tr class="hover:bg-slate-50/70 transition">


                        <!-- Student -->

                        <td class="px-6 py-4">


                            <div class="flex items-center gap-3">


                                <div
                                    class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">


                                    <?= strtoupper(
                                                substr(
                                                    $registration['name'] ?? 'S',
                                                    0,
                                                    1
                                                )
                                            ) ?>


                                </div>



                                <div>


                                    <p class="font-semibold text-slate-800">


                                        <?= htmlspecialchars(
                                                    $registration['name'] ?? '-'
                                                ) ?>


                                    </p>


                                    <p class="text-xs text-slate-400">

                                        Student

                                    </p>


                                </div>


                            </div>


                        </td>




                        <!-- Student ID -->

                        <td class="px-6 py-4 text-slate-600">


                            <?= htmlspecialchars(
                                        $registration['student_id'] ?? '-'
                                    ) ?>


                        </td>




                        <!-- Email -->

                        <td class="px-6 py-4 text-slate-600">


                            <?= htmlspecialchars(
                                        $registration['email'] ?? '-'
                                    ) ?>


                        </td>




                        <!-- Note -->

                        <td class="px-6 py-4">


                            <p class="max-w-[220px] truncate text-slate-600">


                                <?= htmlspecialchars(
                                            $registration['note'] ?? '-'
                                        ) ?>


                            </p>


                        </td>




                        <!-- Status -->

                        <td class="px-6 py-4">


                            <?php if ($registration['status'] === 'pending'): ?>


                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-50 text-amber-700 text-xs font-semibold">


                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>

                                Pending


                            </span>


                            <?php elseif ($registration['status'] === 'approved'): ?>


                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-green-50 text-green-700 text-xs font-semibold">


                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>

                                Approved


                            </span>


                            <?php elseif ($registration['status'] === 'rejected'): ?>


                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-red-50 text-red-700 text-xs font-semibold">


                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>

                                Rejected


                            </span>


                            <?php else: ?>


                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full bg-slate-100 text-slate-600 text-xs font-semibold">


                                <?= ucfirst(
                                                htmlspecialchars(
                                                    $registration['status']
                                                )
                                            ) ?>


                            </span>


                            <?php endif; ?>


                        </td>




                        <!-- Registered Date -->

                        <td class="px-6 py-4 text-slate-500">


                            <?= date(
                                        'M d, Y',
                                        strtotime(
                                            $registration['registered_at']
                                        )
                                    ) ?>


                        </td>




                        <!-- Actions -->

                        <td class="px-6 py-4">


                            <?php if ($registration['status'] === 'pending'): ?>


                            <div class="flex items-center justify-end gap-2">


                                <form method="POST"
                                    action="<?= BASE_URL ?>/admin/event-registrations/<?= $registration['id'] ?>/approve">


                                    <button type="submit"
                                        class="w-9 h-9 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 flex items-center justify-center transition"
                                        title="Approve">

                                        <i class="fa-solid fa-check"></i>

                                    </button>


                                </form>




                                <form method="POST"
                                    action="<?= BASE_URL ?>/admin/event-registrations/<?= $registration['id'] ?>/reject">


                                    <button type="submit"
                                        class="w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 flex items-center justify-center transition"
                                        title="Reject">

                                        <i class="fa-solid fa-xmark"></i>

                                    </button>


                                </form>


                            </div>


                            <?php else: ?>


                            <div class="text-right">


                                <span class="text-xs text-slate-400">

                                    Reviewed

                                </span>


                            </div>


                            <?php endif; ?>


                        </td>


                    </tr>


                    <?php endforeach; ?>


                </tbody>


            </table>


        </div>


        <?php else: ?>


        <!-- ================================================== -->
        <!-- EMPTY STATE                                        -->
        <!-- ================================================== -->

        <div class="py-16 px-6 text-center">


            <div class="w-16 h-16 mx-auto rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">


                <i class="fa-solid fa-user-group text-2xl"></i>


            </div>



            <h3 class="mt-5 text-lg font-bold text-slate-800">

                No Registrations Yet

            </h3>


            <p class="mt-2 text-sm text-slate-500 max-w-md mx-auto">

                Student registration requests for this event will appear here.

            </p>


        </div>


        <?php endif; ?>


    </div>


</div>