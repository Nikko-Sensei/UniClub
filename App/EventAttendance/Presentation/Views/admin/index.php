<div class="space-y-6">



    <?php require BASE_PATH .
        '/App/Event/Presentation/Views/admin/components/event_header.php';
    ?>
    <!-- ========================================================== -->
    <!-- HEADER                                                     -->
    <!-- ========================================================== -->

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">


        <div>

            <h1 class="text-2xl font-bold text-slate-800">

                Manage Attendance

            </h1>


            <p class="text-sm text-slate-500">

                Track and manage student attendance for this event.

            </p>


        </div>


    </div>






    <!-- ========================================================== -->
    <!-- STATISTICS CARDS – Glass with hover lift                  -->
    <!-- ========================================================== -->

    <?php if (isset($statistics)): ?>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">


        <!-- Total Participants -->

        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 flex items-center gap-3 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">


            <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shadow-sm">

                <i data-lucide="users" class="w-5 h-5"></i>

            </div>



            <div>


                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">

                    Total Participants

                </p>


                <p class="text-xl font-bold text-slate-800">

                    <?= $statistics['total'] ?? 0 ?>

                </p>


                <p class="text-[11px] text-slate-400">

                    Registered students

                </p>


            </div>


        </div>






        <!-- Present -->


        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 flex items-center gap-3 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">


            <div class="w-10 h-10 rounded-lg bg-green-50 text-green-600 flex">

                <i data-lucide="user-check" class="w-5 h-5 m-auto"></i>

            </div>



            <div>


                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">

                    Present

                </p>


                <p class="text-xl font-bold text-slate-800">

                    <?= $statistics['present'] ?? 0 ?>

                </p>


                <p class="text-[11px] text-slate-400">

                    Attended students

                </p>


            </div>


        </div>







        <!-- Absent -->


        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 flex items-center gap-3 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">


            <div class="w-10 h-10 rounded-lg bg-red-50 text-red-600 flex items-center justify-center shadow-sm">


                <i data-lucide="user-x" class="w-5 h-5"></i>


            </div>




            <div>


                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">

                    Absent

                </p>



                <p class="text-xl font-bold text-slate-800">

                    <?= $statistics['absent'] ?? 0 ?>

                </p>



                <p class="text-[11px] text-slate-400">

                    Missing students

                </p>



            </div>



        </div>







        <!-- Attendance Rate -->


        <div
            class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4 flex items-center gap-3 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">


            <div class="w-10 h-10 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center shadow-sm">


                <i data-lucide="chart-line" class="w-5 h-5"></i>


            </div>





            <div>


                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">

                    Attendance Rate

                </p>



                <p class="text-xl font-bold text-slate-800">

                    <?= $statistics['percentage'] ?? 0 ?>%

                </p>



                <p class="text-[11px] text-slate-400">

                    Overall attendance

                </p>



            </div>



        </div>



    </div>


    <?php endif; ?>



    <!-- ========================================================== -->
    <!-- ATTENDANCE TABLE                                           -->
    <!-- ========================================================== -->


    <div class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl overflow-hidden">



        <div class="px-5 py-4 border-b border-slate-200/60 bg-white/30">


            <h2 class="font-semibold text-slate-700">

                Attendance List

            </h2>


        </div>






        <div class="overflow-x-auto">


            <table class="w-full text-sm text-slate-700">


                <thead class="bg-slate-50 text-xs uppercase text-slate-500 border-b">


                    <tr>


                        <th class="px-5 py-3 text-left">

                            Student ID

                        </th>


                        <th class="px-5 py-3 text-left">

                            Name

                        </th>


                        <th class="px-5 py-3 text-left">

                            Status

                        </th>


                        <th class="px-5 py-3 text-right">

                            Action

                        </th>


                    </tr>


                </thead>





                <tbody>


                    <?php if (empty($attendances)): ?>


                    <tr>


                        <td colspan="4" class="px-5 py-10 text-center text-slate-400">


                            <i data-lucide="clipboard-check" class="w-8 h-8 mx-auto mb-2 text-slate-300">
                            </i>


                            No participants found.


                        </td>


                    </tr>



                    <?php else: ?>




                    <?php foreach ($attendances as $attendance): ?>



                    <tr class="border-b border-slate-100 hover:bg-slate-50/50 transition">



                        <td class="px-5 py-3">

                            <?= htmlspecialchars($attendance['student_id']); ?>

                        </td>




                        <td class="px-5 py-3 font-medium">

                            <?= htmlspecialchars($attendance['name']); ?>

                        </td>





                        <td class="px-5 py-3">


                            <?php if ($attendance['attendance']): ?>


                            <span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-700">

                                <?= ucfirst(
                                                $attendance['attendance']
                                                    ->getAttendanceStatus()
                                            ); ?>


                            </span>



                            <?php else: ?>


                            <span class="text-slate-400">

                                Not Marked

                            </span>



                            <?php endif; ?>


                        </td>






                        <td class="px-5 py-3 text-right">


                            <form method="POST" action="<?= BASE_URL ?>/admin/events/<?= $eventId ?>/attendance/update"
                                class="inline-flex items-center gap-2">



                                <input type="hidden" name="user_id" value="<?= $attendance['user_id']; ?>">



                                <select name="attendance_status"
                                    class="border border-slate-200 rounded-lg px-3 py-2 text-sm">


                                    <option value="present">

                                        Present

                                    </option>


                                    <option value="absent">

                                        Absent

                                    </option>


                                </select>




                                <button type="submit"
                                    class="p-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
                                    title="Save">


                                    <i data-lucide="save" class="w-4 h-4">
                                    </i>


                                </button>



                            </form>


                        </td>



                    </tr>



                    <?php endforeach; ?>



                    <?php endif; ?>


                </tbody>



            </table>



        </div>



    </div>






</div>





<script>
document.addEventListener('DOMContentLoaded', function() {

    if (typeof lucide !== 'undefined') {

        lucide.createIcons();

    }

});
</script>