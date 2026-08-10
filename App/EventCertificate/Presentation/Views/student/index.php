<div class="space-y-6">


    <!-- ========================================================== -->
    <!-- HEADER                                                     -->
    <!-- ========================================================== -->

    <div>

        <h1 class="text-2xl font-bold text-slate-800">

            My Certificates

        </h1>


        <p class="text-sm text-slate-500">

            View and download your event participation certificates.

        </p>


    </div>


    <!-- ========================================================== -->
    <!-- CERTIFICATE LIST                                           -->
    <!-- ========================================================== -->


    <div class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl overflow-hidden">



        <div class="overflow-x-auto">


            <table class="w-full text-sm text-slate-700">



                <thead class="bg-slate-50 text-xs uppercase text-slate-500 border-b">


                    <tr>


                        <th class="px-5 py-3 text-left">

                            Certificate No

                        </th>


                        <th class="px-5 py-3 text-left">

                            Event ID

                        </th>


                        <th class="px-5 py-3 text-left">

                            Issued Date

                        </th>


                        <th class="px-5 py-3 text-right">

                            Action

                        </th>


                    </tr>


                </thead>







                <tbody>


                    <?php if(empty($certificates)): ?>


                    <tr>


                        <td colspan="4" class="px-5 py-10 text-center text-slate-400">


                            <i data-lucide="award" class="w-8 h-8 mx-auto mb-2 text-slate-300">
                            </i>


                            No certificates available.


                        </td>


                    </tr>



                    <?php else: ?>



                    <?php foreach($certificates as $certificate): ?>



                    <tr class="border-b border-slate-100 hover:bg-slate-50/50 transition">



                        <td class="px-5 py-3 font-medium">


                            <?= htmlspecialchars(
                                $certificate->getCertificateNumber()
                            ); ?>


                        </td>





                        <td class="px-5 py-3">


                            <?= $certificate->getEventId(); ?>


                        </td>





                        <td class="px-5 py-3">


                            <?= $certificate->getIssuedAt(); ?>


                        </td>





                        <td class="px-5 py-3 text-right">


                            <a href="<?= BASE_URL ?>/certificates/<?= $certificate->getEventId() ?>/download"
                                class="inline-flex items-center gap-2 px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">


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