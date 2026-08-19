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
                Event Registrations
            </h1>

            <p class="text-sm text-slate-500 mt-1">
                Review and manage student event registration requests.
            </p>

        </div>

    </div>


    <!-- ========================================================== -->
    <!-- REGISTRATION TABLE                                         -->
    <!-- ========================================================== -->

    <div
        class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">


        <!-- ====================================================== -->
        <!-- CARD HEADER                                            -->
        <!-- ====================================================== -->

        <div class="px-5 py-4 border-b border-slate-200/60 bg-white/30 backdrop-blur-sm
                   flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

            <div>

                <h2 class="font-semibold text-slate-700 flex items-center gap-2">

                    <i data-lucide="users" class="w-5 h-5 text-blue-600">
                    </i>

                    Student Registrations

                </h2>

                <p class="text-xs text-slate-400 mt-1">

                    <?= count($registrations) ?>

                    registration
                    <?= count($registrations) === 1 ? 'request' : 'requests' ?>

                </p>

            </div>


            <!-- Pending Badge -->

            <?php
            $pending = 0;

            foreach ($registrations as $registration) {

                if (($registration['status'] ?? '') === 'pending') {
                    $pending++;
                }
            }
            ?>

            <div>

                <span class="inline-flex items-center gap-1.5
                           px-3 py-1.5
                           rounded-full
                           text-xs font-semibold
                           bg-amber-50
                           text-amber-700
                           border border-amber-200/60">

                    <span class="w-1.5 h-1.5 rounded-full
                               bg-amber-500
                               <?= $pending > 0 ? 'animate-pulse' : '' ?>">
                    </span>

                    <?= $pending ?> pending

                </span>

            </div>

        </div>


        <!-- ====================================================== -->
        <!-- TABLE                                                   -->
        <!-- ====================================================== -->

        <div class="overflow-x-auto">

            <table class="w-full text-sm text-slate-700">


                <!-- Table Header -->

                <thead class="bg-slate-50/50
                           text-xs font-semibold
                           text-slate-500
                           uppercase tracking-wider
                           border-b border-slate-200/60">

                    <tr>

                        <th class="px-5 py-3.5 text-left whitespace-nowrap">
                            Student
                        </th>

                        <th class="px-5 py-3.5 text-left whitespace-nowrap">
                            Student ID
                        </th>

                        <th class="px-5 py-3.5 text-left whitespace-nowrap">
                            Email
                        </th>

                        <th class="px-5 py-3.5 text-left whitespace-nowrap">
                            Note
                        </th>

                        <th class="px-5 py-3.5 text-left whitespace-nowrap">
                            Status
                        </th>

                        <th class="px-5 py-3.5 text-left whitespace-nowrap">
                            Registered
                        </th>

                        <th class="px-5 py-3.5 text-right whitespace-nowrap">
                            Actions
                        </th>

                    </tr>

                </thead>


                <!-- Table Body -->

                <tbody>

                    <?php if (empty($registrations)): ?>

                    <!-- ================================================== -->
                    <!-- EMPTY STATE                                       -->
                    <!-- ================================================== -->

                    <tr>

                        <td colspan="7" class="px-5 py-12 text-center">

                            <div class="w-14 h-14 mx-auto
                                           rounded-2xl
                                           bg-blue-50
                                           text-blue-600
                                           flex items-center
                                           justify-center
                                           shadow-sm">

                                <i data-lucide="users" class="w-7 h-7">
                                </i>

                            </div>

                            <h3 class="mt-4
                                           text-base
                                           font-semibold
                                           text-slate-700">

                                No Registrations Yet

                            </h3>

                            <p class="mt-1
                                           text-sm
                                           text-slate-400">

                                Student registration requests
                                for this event will appear here.

                            </p>

                        </td>

                    </tr>


                    <?php else: ?>


                    <!-- ================================================== -->
                    <!-- REGISTRATION ROWS                                 -->
                    <!-- ================================================== -->

                    <?php foreach ($registrations as $registration): ?>

                    <?php
                            $status = $registration['status'] ?? 'unknown';
                            ?>

                    <tr class="border-b border-slate-100/60
                                       hover:bg-slate-50/40
                                       transition-colors">


                        <!-- ================================================= -->
                        <!-- STUDENT                                          -->
                        <!-- ================================================= -->

                        <td class="px-5 py-3.5">

                            <div class="flex items-center gap-3">

                                <!-- Avatar -->

                                <div class="w-9 h-9
            rounded-full
            overflow-hidden
            bg-gradient-to-br
            from-blue-100
            to-blue-200
            text-blue-700
            flex items-center
            justify-center
            font-semibold
            flex-shrink-0
            shadow-sm">

                                    <?php if (!empty($registration['profile_image'])): ?>

                                    <img src="<?= BASE_URL ?>/uploads/profile/<?= htmlspecialchars($registration['profile_image']) ?>"
                                        alt="<?= htmlspecialchars($registration['name'] ?? 'Student') ?>"
                                        class="w-full h-full object-cover">

                                    <?php else: ?>

                                    <?php
                                                $name = trim($registration['name'] ?? 'S');
                                                $words = preg_split('/\s+/', $name);

                                                if (count($words) >= 2) {
                                                    $initials = strtoupper(
                                                        substr($words[0], 0, 1) .
                                                            substr($words[1], 0, 1)
                                                    );
                                                } else {
                                                    $initials = strtoupper(substr($words[0], 0, 1));
                                                }
                                                ?>

                                    <?= htmlspecialchars($initials) ?>

                                    <?php endif; ?>

                                </div>


                                <!-- Name -->

                                <div>

                                    <p class="font-medium
                                                       text-slate-700">

                                        <?= htmlspecialchars(
                                                    $registration['name'] ?? '-'
                                                ) ?>

                                    </p>

                                    <p class="text-xs
                                                       text-slate-400">

                                        Student

                                    </p>

                                </div>

                            </div>

                        </td>


                        <!-- ================================================= -->
                        <!-- STUDENT ID                                       -->
                        <!-- ================================================= -->

                        <td class="px-5 py-3.5
                                           text-slate-600
                                           whitespace-nowrap">

                            <?= htmlspecialchars(
                                        $registration['student_id'] ?? '-'
                                    ) ?>

                        </td>


                        <!-- ================================================= -->
                        <!-- EMAIL                                            -->
                        <!-- ================================================= -->

                        <td class="px-5 py-3.5
                                           text-slate-600">

                            <span class="block max-w-[220px]
                                               truncate" title="<?= htmlspecialchars(
                                                                    $registration['email'] ?? '-'
                                                                ) ?>">

                                <?= htmlspecialchars(
                                            $registration['email'] ?? '-'
                                        ) ?>

                            </span>

                        </td>


                        <!-- ================================================= -->
                        <!-- NOTE                                             -->
                        <!-- ================================================= -->

                        <td class="px-5 py-3.5">

                            <span class="block max-w-[220px]
                                               truncate
                                               text-slate-600" title="<?= htmlspecialchars(
                                                                            $registration['note'] ?? '-'
                                                                        ) ?>">

                                <?= htmlspecialchars(
                                            $registration['note'] ?? '-'
                                        ) ?>

                            </span>

                        </td>


                        <!-- ================================================= -->
                        <!-- STATUS                                           -->
                        <!-- ================================================= -->

                        <td class="px-5 py-3.5">

                            <?php if ($status === 'pending'): ?>

                            <span class="inline-flex
                                                   items-center
                                                   gap-1.5
                                                   px-3 py-1
                                                   rounded-full
                                                   text-xs
                                                   font-semibold
                                                   bg-amber-50
                                                   text-amber-700
                                                   border
                                                   border-amber-200/60">

                                <span class="w-1.5 h-1.5
                                                       rounded-full
                                                       bg-amber-500
                                                       animate-pulse">
                                </span>

                                Pending

                            </span>


                            <?php elseif ($status === 'approved'): ?>

                            <span class="inline-flex
                                                   items-center
                                                   gap-1.5
                                                   px-3 py-1
                                                   rounded-full
                                                   text-xs
                                                   font-semibold
                                                   bg-emerald-50
                                                   text-emerald-700
                                                   border
                                                   border-emerald-200/60">

                                <span class="w-1.5 h-1.5
                                                       rounded-full
                                                       bg-emerald-500">
                                </span>

                                Approved

                            </span>


                            <?php elseif ($status === 'rejected'): ?>

                            <span class="inline-flex
                                                   items-center
                                                   gap-1.5
                                                   px-3 py-1
                                                   rounded-full
                                                   text-xs
                                                   font-semibold
                                                   bg-red-50
                                                   text-red-700
                                                   border
                                                   border-red-200/60">

                                <span class="w-1.5 h-1.5
                                                       rounded-full
                                                       bg-red-500">
                                </span>

                                Rejected

                            </span>


                            <?php else: ?>

                            <span class="inline-flex
                                                   items-center
                                                   px-3 py-1
                                                   rounded-full
                                                   text-xs
                                                   font-semibold
                                                   bg-slate-100
                                                   text-slate-600
                                                   border
                                                   border-slate-200/60">

                                <?= ucfirst(
                                                htmlspecialchars($status)
                                            ) ?>

                            </span>

                            <?php endif; ?>

                        </td>


                        <!-- ================================================= -->
                        <!-- REGISTERED DATE                                  -->
                        <!-- ================================================= -->

                        <td class="px-5 py-3.5
                                           text-slate-500
                                           whitespace-nowrap">

                            <?= !empty($registration['registered_at'])
                                        ? date(
                                            'M d, Y',
                                            strtotime(
                                                $registration['registered_at']
                                            )
                                        )
                                        : '-'
                                    ?>

                        </td>


                        <!-- ================================================= -->
                        <!-- ACTIONS                                           -->
                        <!-- ================================================= -->

                        <td class="px-5 py-3.5 text-right">

                            <?php if ($status === 'pending'): ?>

                            <div class="flex
                                                   items-center
                                                   justify-end
                                                   gap-2">


                                <!-- Approve -->

                                <form method="POST"
                                    action="<?= BASE_URL ?>/admin/events/registrations/<?= $registration['id'] ?>/approve"
                                    class="inline">

                                    <button type="submit" class="w-9 h-9
                                                           rounded-lg
                                                           bg-emerald-50
                                                           text-emerald-600
                                                           hover:bg-emerald-100
                                                           hover:text-emerald-700
                                                           flex items-center
                                                           justify-center
                                                           transition-all
                                                           hover:scale-105" title="Approve registration">

                                        <i data-lucide="check" class="w-4 h-4">
                                        </i>

                                    </button>

                                </form>


                                <!-- Reject -->

                                <form method="POST"
                                    action="<?= BASE_URL ?>/admin/events/registrations/<?= $registration['id'] ?>/reject"
                                    class="inline" onsubmit="return confirm('Reject this registration?')">

                                    <button type="submit" class="w-9 h-9
                                                           rounded-lg
                                                           bg-red-50
                                                           text-red-600
                                                           hover:bg-red-100
                                                           hover:text-red-700
                                                           flex items-center
                                                           justify-center
                                                           transition-all
                                                           hover:scale-105" title="Reject registration">

                                        <i data-lucide="x" class="w-4 h-4">
                                        </i>

                                    </button>

                                </form>

                            </div>


                            <?php else: ?>

                            <span class="inline-flex
                                                   items-center
                                                   gap-1.5
                                                   text-xs
                                                   text-slate-400">

                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5">
                                </i>

                                Reviewed

                            </span>

                            <?php endif; ?>

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