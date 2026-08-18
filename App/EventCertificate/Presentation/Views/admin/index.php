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

                Event Certificates

            </h1>


            <p class="text-sm text-slate-500">

                Manage and download certificates issued to event participants.

            </p>


        </div>

        <form method="POST" action="<?= BASE_URL ?>/admin/events/<?= $eventId ?>/certificates/generate-all">


            <button type="submit"
                class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">


                <i data-lucide="award" class="w-4 h-4"></i>


                Generate All Certificates


            </button>


        </form>


    </div>






    <!-- ========================================================== -->
    <!-- CERTIFICATE TABLE – Glass Card                            -->
    <!-- ========================================================== -->


    <div
        class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">



        <!-- Header -->

        <div class="px-5 py-4 border-b border-slate-200/60 bg-white/30 backdrop-blur-sm">


            <h2 class="font-semibold text-slate-700">

                Certificate List

            </h2>


        </div>







        <!-- Table -->

        <div class="overflow-x-auto">


            <table class="w-full text-sm text-slate-700">



                <thead
                    class="bg-slate-50/50 text-xs font-semibold text-slate-500 uppercase tracking-wider border-b border-slate-200/60">


                    <tr>


                        <th class="px-5 py-3.5 text-left whitespace-nowrap">

                            Certificate No

                        </th>


                        <th class="px-5 py-3.5 text-left whitespace-nowrap">

                            Student ID

                        </th>


                        <th class="px-5 py-3.5 text-left whitespace-nowrap">

                            Event

                        </th>


                        <th class="px-5 py-3.5 text-left whitespace-nowrap">

                            Issued Date

                        </th>


                        <th class="px-5 py-3.5 text-right whitespace-nowrap">

                            Action

                        </th>


                    </tr>


                </thead>






                <tbody>



                    <?php if (empty($certificates)): ?>


                    <tr>


                        <td colspan="5" class="px-5 py-10 text-center text-slate-400">


                            <i data-lucide="award" class="w-8 h-8 mx-auto mb-2 text-slate-300">
                            </i>


                            No certificates issued yet.


                        </td>


                    </tr>





                    <?php else: ?>


                    <?php foreach ($certificates as $certificate): ?>



                    <tr class="border-b border-slate-100/60 hover:bg-slate-50/40 transition-colors">





                        <!-- Certificate Number -->

                        <td class="px-5 py-3.5 font-medium text-slate-700">


                            <?= htmlspecialchars(
                                        $certificate->getCertificateNumber()
                                    ); ?>


                        </td>






                        <!-- Student -->

                        <td class="px-5 py-3.5 text-slate-600">


                            <?= $certificate->getStudentName(); ?>


                        </td>






                        <!-- Event -->

                        <td class="px-5 py-3.5 text-slate-600">

                            <?= htmlspecialchars(
                                        $event->getTitle()
                                    ); ?>

                        </td>






                        <!-- Date -->

                        <td class="px-5 py-3.5 text-slate-600">


                            <?= htmlspecialchars(
                                        $certificate->getIssuedAt()
                                    ); ?>


                        </td>







                        <!-- Action -->

                        <td class="px-5 py-3.5 text-right">

                            <a href="<?= BASE_URL ?>/admin/certificates/<?= $certificate->getId() ?>/download" class="inline-flex items-center gap-2 px-3 py-2
                                        bg-blue-600 text-white rounded-lg
                                        hover:bg-blue-700 transition text-sm">

                                <i data-lucide="download" class="w-4 h-4"></i>

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








<script>
document.addEventListener(
    'DOMContentLoaded',
    function() {

        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

    }
);
</script>