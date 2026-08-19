<div class="space-y-6">

    <?php require BASE_PATH .
        '/App/Event/Presentation/Views/admin/components/event_header.php';
    ?>

    <!-- ========================================================== -->
    <!-- PAGE HEADER                                                -->
    <!-- ========================================================== -->

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Manage Attendance
            </h1>

            <p class="text-sm text-slate-500 mt-1">
                Track and manage student attendance for this event.
            </p>
        </div>

    </div>


    <!-- ========================================================== -->
    <!-- ATTENDANCE STATISTICS                                     -->
    <!-- ========================================================== -->

    <?php if (isset($statistics)): ?>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        <!-- Total Participants -->
        <div class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4
                       flex items-center gap-3
                       transition-all duration-300
                       hover:shadow-2xl hover:border-blue-200/50 hover:-translate-y-1">

            <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600
                           flex items-center justify-center shadow-sm flex-shrink-0">

                <i data-lucide="users" class="w-5 h-5"></i>

            </div>

            <div class="min-w-0">

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
        <div class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4
                       flex items-center gap-3
                       transition-all duration-300
                       hover:shadow-2xl hover:border-emerald-200/50 hover:-translate-y-1">

            <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600
                           flex items-center justify-center shadow-sm flex-shrink-0">

                <i data-lucide="user-check" class="w-5 h-5"></i>

            </div>

            <div class="min-w-0">

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
        <div class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4
                       flex items-center gap-3
                       transition-all duration-300
                       hover:shadow-2xl hover:border-red-200/50 hover:-translate-y-1">

            <div class="w-10 h-10 rounded-lg bg-red-50 text-red-600
                           flex items-center justify-center shadow-sm flex-shrink-0">

                <i data-lucide="user-x" class="w-5 h-5"></i>

            </div>

            <div class="min-w-0">

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
        <div class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-4
                       flex items-center gap-3
                       transition-all duration-300
                       hover:shadow-2xl hover:border-indigo-200/50 hover:-translate-y-1">

            <div class="w-10 h-10 rounded-lg bg-indigo-50 text-indigo-600
                           flex items-center justify-center shadow-sm flex-shrink-0">

                <i data-lucide="chart-line" class="w-5 h-5"></i>

            </div>

            <div class="min-w-0">

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
    <!-- ATTENDANCE TABLE                                          -->
    <!-- ========================================================== -->

    <div class="glass-card-light rounded-xl border border-slate-100/60
               shadow-xl overflow-hidden
               transition-all duration-300
               hover:shadow-2xl hover:border-blue-200/50">


        <!-- ====================================================== -->
        <!-- CARD HEADER                                            -->
        <!-- ====================================================== -->

        <div class="px-5 py-4
                   border-b border-slate-200/60
                   bg-white/30 backdrop-blur-sm
                   flex flex-col sm:flex-row
                   sm:items-center sm:justify-between gap-2">

            <div>

                <h2 class="font-semibold text-slate-700 flex items-center gap-2">

                    <i data-lucide="clipboard-check" class="w-5 h-5 text-blue-600">
                    </i>

                    Attendance List

                </h2>

                <p class="text-xs text-slate-400 mt-0.5">
                    Record and update student attendance.
                </p>

            </div>


            <!-- Participant Count -->

            <?php if (isset($statistics)): ?>

            <span class="inline-flex items-center gap-1.5
                           px-3 py-1 rounded-full
                           text-xs font-semibold
                           bg-blue-50 text-blue-700
                           border border-blue-200/50">

                <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>

                <?= $statistics['total'] ?? 0 ?> participants

            </span>

            <?php endif; ?>

        </div>


        <!-- ====================================================== -->
        <!-- TABLE                                                  -->
        <!-- ====================================================== -->

        <div class="overflow-x-auto">

            <table class="w-full text-sm text-slate-700">

                <!-- Table Header -->

                <thead class="bg-slate-50/50
                           text-xs font-semibold
                           text-slate-500 uppercase
                           tracking-wider
                           border-b border-slate-200/60">

                    <tr>

                        <th class="px-5 py-3.5 text-left whitespace-nowrap">
                            Student
                        </th>

                        <th class="px-5 py-3.5 text-left whitespace-nowrap">
                            Student ID
                        </th>

                        <th class="px-5 py-3.5 text-left whitespace-nowrap">
                            Student Email
                        </th>

                        <th class="px-5 py-3.5 text-left whitespace-nowrap">
                            Status
                        </th>

                        <th class="px-5 py-3.5 text-center whitespace-nowrap">
                            Update Attendance
                        </th>

                    </tr>

                </thead>


                <!-- Table Body -->

                <tbody class="divide-y divide-slate-100/60">

                    <?php if (empty($attendances)): ?>

                    <!-- Empty State -->

                    <tr>

                        <td colspan="4" class="px-5 py-12 text-center">

                            <div class="w-14 h-14 mx-auto
                                           rounded-2xl
                                           bg-blue-50 text-blue-600
                                           flex items-center justify-center
                                           shadow-sm">

                                <i data-lucide="clipboard-check" class="w-7 h-7">
                                </i>

                            </div>

                            <h3 class="mt-4
                                           text-sm font-semibold
                                           text-slate-700">

                                No Participants Found

                            </h3>

                            <p class="mt-1
                                           text-xs text-slate-400">

                                Approved event participants will appear here.

                            </p>

                        </td>

                    </tr>


                    <?php else: ?>


                    <?php foreach ($attendances as $attendance): ?>

                    <?php

                            $attendanceStatus = null;

                            if ($attendance['attendance']) {
                                $attendanceStatus =
                                    $attendance['attendance']->getAttendanceStatus();
                            }

                            $studentName =
                                $attendance['name'] ?? 'Student';

                            $words = preg_split('/\s+/', trim($studentName));

                            if (count($words) >= 2) {
                                $initial = strtoupper(
                                    substr($words[0], 0, 1) .
                                        substr($words[1], 0, 1)
                                );
                            } else {
                                $initial = strtoupper(
                                    substr($studentName, 0, 1)
                                );
                            }

                            ?>


                    <!-- ================================================== -->
                    <!-- ATTENDANCE ROW                                    -->
                    <!-- ================================================== -->

                    <tr class="hover:bg-slate-50/40
                                       transition-colors">


                        <!-- Student -->

                        <td class="px-5 py-4">

                            <div class="flex items-center gap-3">

                                <!-- Avatar -->

                                <div class="w-10 h-10
                    rounded-full
                    overflow-hidden
                    bg-gradient-to-br
                    from-blue-100 to-blue-200
                    text-blue-700
                    flex items-center
                    justify-center
                    font-bold
                    flex-shrink-0
                    shadow-sm">

                                    <?php if (!empty($attendance['profile_image'])): ?>

                                    <img src="<?= BASE_URL ?>/uploads/profile/<?= htmlspecialchars($attendance['profile_image']) ?>"
                                        alt="<?= htmlspecialchars($studentName) ?>" class="w-full h-full object-cover">

                                    <?php else: ?>

                                    <?= htmlspecialchars($initial) ?>

                                    <?php endif; ?>

                                </div>


                                <!-- Name -->

                                <div class="min-w-0">

                                    <p class="font-semibold
                                                       text-slate-800
                                                       truncate">

                                        <?= htmlspecialchars($studentName) ?>

                                    </p>

                                    <p class="text-xs text-slate-400">
                                        Student
                                    </p>

                                </div>

                            </div>

                        </td>


                        <!-- Student ID -->

                        <td class="px-5 py-4
                                           text-slate-600
                                           whitespace-nowrap">

                            <?= htmlspecialchars(
                                        $attendance['student_id'] ?? '-'
                                    ); ?>

                        </td>

                        <td class="px-5 py-4
                                           text-slate-600
                                           whitespace-nowrap">

                            <?= htmlspecialchars(
                                        $attendance['email'] ?? '-'
                                    ); ?>

                        </td>


                        <!-- Status -->

                        <td class="px-5 py-4">

                            <?php if ($attendanceStatus === 'present'): ?>

                            <span class="inline-flex items-center
                                                   gap-1.5
                                                   px-3 py-1
                                                   rounded-full
                                                   bg-emerald-50
                                                   text-emerald-700
                                                   border border-emerald-200/50
                                                   text-xs font-semibold">

                                <span class="w-1.5 h-1.5
                                                       rounded-full
                                                       bg-emerald-500">
                                </span>

                                Present

                            </span>


                            <?php elseif ($attendanceStatus === 'absent'): ?>

                            <span class="inline-flex items-center
                                                   gap-1.5
                                                   px-3 py-1
                                                   rounded-full
                                                   bg-red-50
                                                   text-red-700
                                                   border border-red-200/50
                                                   text-xs font-semibold">

                                <span class="w-1.5 h-1.5
                                                       rounded-full
                                                       bg-red-500">
                                </span>

                                Absent

                            </span>


                            <?php else: ?>

                            <span class="inline-flex items-center
                                                   gap-1.5
                                                   px-3 py-1
                                                   rounded-full
                                                   bg-slate-100
                                                   text-slate-500
                                                   border border-slate-200/60
                                                   text-xs font-semibold">

                                <span class="w-1.5 h-1.5
                                                       rounded-full
                                                       bg-slate-400">
                                </span>

                                Not Marked

                            </span>

                            <?php endif; ?>

                        </td>


                        <!-- ================================================= -->
                        <!-- UPDATE ATTENDANCE                               -->
                        <!-- ================================================= -->

                        <td class="px-5 py-4 text-right">

                            <form method="POST" action="<?= BASE_URL ?>/admin/events/<?= $eventId ?>/attendance/update"
                                class="inline-flex
                                               items-center
                                               justify-end
                                               gap-2">


                                <input type="hidden" name="user_id" value="<?= htmlspecialchars(
                                                                                        $attendance['user_id']
                                                                                    ); ?>">


                                <!-- Status Select -->

                                <select name="attendance_status" class="h-9
                                                   border
                                                   border-slate-200/80
                                                   rounded-lg
                                                   px-3
                                                   text-sm
                                                   text-slate-600
                                                   bg-white/70
                                                   focus:outline-none
                                                   focus:ring-2
                                                   focus:ring-blue-500/30
                                                   focus:border-blue-500
                                                   transition">

                                    <option value="present" <?= $attendanceStatus === 'present'
                                                                        ? 'selected'
                                                                        : '' ?>>

                                        Present

                                    </option>

                                    <option value="absent" <?= $attendanceStatus === 'absent'
                                                                        ? 'selected'
                                                                        : '' ?>>

                                        Absent

                                    </option>

                                </select>


                                <!-- Save -->

                                <button type="submit" class="w-9 h-9
                                                   rounded-lg
                                                   bg-blue-600
                                                   text-white
                                                   hover:bg-blue-700
                                                   hover:shadow-md
                                                   hover:-translate-y-0.5
                                                   flex items-center
                                                   justify-center
                                                   transition-all duration-200" title="Save attendance">

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


<!-- ========================================================== -->
<!-- LUCIDE ICONS                                               -->
<!-- ========================================================== -->

<script>
document.addEventListener('DOMContentLoaded', function() {

    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

});
</script>