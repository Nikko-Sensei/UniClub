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
                Event Certificates
            </h1>

            <p class="text-sm text-slate-500 mt-1">
                Manage and download certificates issued to event participants.
            </p>

        </div>


        <!-- Generate All -->

        <form method="POST" action="<?= BASE_URL ?>/admin/events/<?= $eventId ?>/certificates/generate-all">

            <button type="submit" class="inline-flex items-center gap-2
                       px-4 py-2
                       bg-blue-600 text-white
                       rounded-lg
                       hover:bg-blue-700
                       hover:shadow-md
                       transition-all duration-200">

                <i data-lucide="award" class="w-4 h-4"></i>

                Generate All Certificates

            </button>

        </form>

    </div>


    <!-- ========================================================== -->
    <!-- CERTIFICATE TABLE                                         -->
    <!-- ========================================================== -->

    <div class="glass-card-light
               rounded-xl
               border border-slate-100/60
               shadow-xl
               overflow-hidden
               transition-all duration-300
               hover:shadow-2xl
               hover:border-blue-200/50">


        <!-- ====================================================== -->
        <!-- CARD HEADER                                            -->
        <!-- ====================================================== -->

        <div class="px-5 py-4
                   border-b border-slate-200/60
                   bg-white/30
                   backdrop-blur-sm
                   flex flex-col sm:flex-row
                   sm:items-center
                   sm:justify-between
                   gap-2">

            <div>

                <h2 class="font-semibold
                           text-slate-700
                           flex items-center gap-2">

                    <i data-lucide="award" class="w-5 h-5 text-blue-600">
                    </i>

                    Certificate List

                </h2>

                <p class="text-xs text-slate-400 mt-0.5">
                    Certificates issued to eligible event participants.
                </p>

            </div>


            <!-- Certificate Count -->

            <span class="inline-flex items-center gap-1.5
                       px-3 py-1
                       rounded-full
                       text-xs font-semibold
                       bg-blue-50
                       text-blue-700
                       border border-blue-200/50">

                <span class="w-1.5 h-1.5
                           rounded-full
                           bg-blue-500">
                </span>

                <?= count($certificates) ?> certificates

            </span>

        </div>


        <!-- ====================================================== -->
        <!-- TABLE                                                  -->
        <!-- ====================================================== -->

        <div class="overflow-x-auto">

            <table class="w-full text-sm text-slate-700">


                <!-- Table Header -->

                <thead class="bg-slate-50/50
                           text-xs
                           font-semibold
                           text-slate-500
                           uppercase
                           tracking-wider
                           border-b
                           border-slate-200/60">

                    <tr>

                        <th class="px-5 py-3.5
                                   text-left
                                   whitespace-nowrap">

                            Certificate No.

                        </th>


                        <th class="px-5 py-3.5
                                   text-left
                                   whitespace-nowrap">

                            Student

                        </th>


                        <th class="px-5 py-3.5
                                   text-left
                                   whitespace-nowrap">

                            Event

                        </th>


                        <th class="px-5 py-3.5
                                   text-left
                                   whitespace-nowrap">

                            Issued Date

                        </th>


                        <th class="px-5 py-3.5
                                   text-right
                                   whitespace-nowrap">

                            Action

                        </th>

                    </tr>

                </thead>


                <!-- ================================================== -->
                <!-- TABLE BODY                                          -->
                <!-- ================================================== -->

                <tbody class="divide-y divide-slate-100/60">


                    <?php if (empty($certificates)): ?>


                        <!-- Empty State -->

                        <tr>

                            <td colspan="5" class="px-5 py-12 text-center">

                                <div class="w-14 h-14
                                           mx-auto
                                           rounded-2xl
                                           bg-blue-50
                                           text-blue-600
                                           flex items-center
                                           justify-center
                                           shadow-sm">

                                    <i data-lucide="award" class="w-7 h-7">
                                    </i>

                                </div>


                                <h3 class="mt-4
                                           text-sm
                                           font-semibold
                                           text-slate-700">

                                    No Certificates Issued

                                </h3>


                                <p class="mt-1
                                           text-xs
                                           text-slate-400
                                           max-w-sm
                                           mx-auto">

                                    Certificates will appear here once they
                                    have been generated for eligible participants.

                                </p>

                            </td>

                        </tr>


                    <?php else: ?>


                        <?php foreach ($certificates as $certificate): ?>


                            <?php
                            $studentName =
                                $certificate->getStudentName() ?? 'Student';

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
                            <!-- CERTIFICATE ROW                                   -->
                            <!-- ================================================== -->

                            <tr class="hover:bg-slate-50/40
                                       transition-colors">


                                <!-- Certificate Number -->

                                <td class="px-5 py-4
                                           whitespace-nowrap">

                                    <div class="flex items-center gap-2">

                                        <div class="w-9 h-9
                                                   rounded-lg
                                                   bg-blue-50
                                                   text-blue-600
                                                   flex items-center
                                                   justify-center
                                                   flex-shrink-0">

                                            <i data-lucide="file-badge" class="w-4 h-4">
                                            </i>

                                        </div>

                                        <div>

                                            <p class="font-semibold
                                                       text-slate-700">

                                                <?= htmlspecialchars(
                                                    $certificate->getCertificateNumber()
                                                ); ?>

                                            </p>

                                            <p class="text-[11px]
                                                       text-slate-400">

                                                Certificate

                                            </p>

                                        </div>

                                    </div>

                                </td>


                                <!-- Student -->

                                <td class="px-5 py-4">

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
                                            font-bold
                                            text-sm
                                            flex-shrink-0
                                            shadow-sm">

                                            <?php if (!empty($certificate->getProfileImage())): ?>

                                                <img src="<?= BASE_URL ?>/uploads/profile/<?= htmlspecialchars(
                                                                                                $certificate->getProfileImage()
                                                                                            ) ?>"
                                                    alt="<?= htmlspecialchars($studentName) ?>" class="w-full h-full object-cover">

                                            <?php else: ?>

                                                <?= htmlspecialchars($initial) ?>

                                            <?php endif; ?>

                                        </div>


                                        <div>

                                            <p class="font-semibold
                                                       text-slate-800">

                                                <?= htmlspecialchars(
                                                    $studentName
                                                ); ?>

                                            </p>

                                            <p class="text-xs
                                                       text-slate-400">

                                                Participant

                                            </p>

                                        </div>

                                    </div>

                                </td>


                                <!-- Event -->

                                <td class="px-5 py-4
                                           text-slate-600">

                                    <div class="flex items-center gap-2">

                                        <i data-lucide="calendar-days" class="w-4 h-4
                                                   text-slate-400">
                                        </i>

                                        <span>

                                            <?= htmlspecialchars(
                                                $event->getTitle()
                                            ); ?>

                                        </span>

                                    </div>

                                </td>


                                <!-- Issued Date -->

                                <td class="px-5 py-4
                                           text-slate-600
                                           whitespace-nowrap">

                                    <div class="flex items-center gap-2">

                                        <i data-lucide="calendar" class="w-4 h-4
                                                   text-slate-400">
                                        </i>

                                        <span>

                                            <?= htmlspecialchars(
                                                $certificate->getIssuedAt()
                                            ); ?>

                                        </span>

                                    </div>

                                </td>


                                <!-- Action -->

                                <td class="px-5 py-4
                                           text-right">

                                    <a href="<?= BASE_URL ?>/admin/certificates/<?= $certificate->getId() ?>/download" class="inline-flex
                                               items-center
                                               gap-2
                                               px-3
                                               py-2
                                               bg-blue-600
                                               text-white
                                               rounded-lg
                                               hover:bg-blue-700
                                               hover:shadow-md
                                               hover:-translate-y-0.5
                                               transition-all
                                               duration-200
                                               text-sm">

                                        <i data-lucide="download" class="w-4 h-4">
                                        </i>

                                        Download

                                    </a>

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