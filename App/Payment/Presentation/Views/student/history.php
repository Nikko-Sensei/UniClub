<div class="max-w-7xl mx-auto px-6 py-10">

    <div class="animate-slideInLeft mb-4">
        <a href="<?= BASE_URL ?>/clubs"
            class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
            <span>Back to Clubs</span>
        </a>
    </div>

    <!-- Header -->
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-slate-800 flex items-center gap-3">

            <i data-lucide="credit-card" class="w-8 h-8 text-blue-600"></i>

            Payment History

        </h1>


        <p class="text-slate-500 mt-2">

            View your club membership payment records.

        </p>

    </div>





    <?php if (empty($payments)): ?>


    <!-- Empty State -->
    <div class="glass-card-light rounded-2xl p-10 text-center border border-slate-200">


        <div class="w-16 h-16 mx-auto rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">


            <i data-lucide="wallet" class="w-8 h-8"></i>


        </div>



        <h3 class="mt-5 text-xl font-bold text-slate-800">

            No Payment History

        </h3>



        <p class="mt-2 text-slate-500">

            You have not submitted any membership payments yet.

        </p>


    </div>



    <?php else: ?>



    <!-- Payment List -->

    <div class="grid gap-6">


        <?php foreach ($payments as $payment): ?>


        <div
            class="glass-card-light rounded-2xl p-6 border border-slate-200 hover:shadow-xl transition-all duration-300">


            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">



                <!-- Payment Information -->

                <div class="flex items-center gap-4">


                    <div class="w-14 h-14 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">


                        <i data-lucide="receipt" class="w-7 h-7"></i>


                    </div>




                    <div>


                        <h3 class="text-lg font-bold text-slate-800">

                            <?= htmlspecialchars(
                                        $payment['club_name']
                                    ) ?>

                        </h3>



                        <p class="text-sm text-slate-500">

                            Payment Method:

                            <?= htmlspecialchars(
                                        $payment['payment_method']
                                    ) ?>

                        </p>



                        <p class="text-sm text-slate-500">

                            <?= date(
                                        'M d, Y',
                                        strtotime(
                                            $payment['created_at']
                                        )
                                    ) ?>

                        </p>



                    </div>


                </div>







                <!-- Amount + Status -->

                <div class="text-right">


                    <p class="text-xl font-bold text-blue-600">
                        <?= number_format((float) $payment['amount']) ?>
                        <span class="ml-1 text-sm font-semibold text-slate-500">MMK</span>
                    </p>



                    <?php if ($payment['status'] === 'pending'): ?>


                    <span
                        class="inline-flex items-center gap-1 mt-2 px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">


                        <i data-lucide="clock" class="w-3 h-3"></i>


                        Pending


                    </span>



                    <?php elseif ($payment['status'] === 'verified'): ?>


                    <span
                        class="inline-flex items-center gap-1 mt-2 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">


                        <i data-lucide="badge-check" class="w-3 h-3"></i>


                        Verified


                    </span>




                    <?php elseif ($payment['status'] === 'rejected'): ?>


                    <span
                        class="inline-flex items-center gap-1 mt-2 px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">


                        <i data-lucide="circle-x" class="w-3 h-3"></i>


                        Rejected


                    </span>



                    <?php endif; ?>


                </div>


            </div>







            <!-- Action -->

            <div class="mt-5 pt-5 border-t border-slate-200 flex justify-end">


                <a href="<?= BASE_URL ?>/payments/<?= $payment['id'] ?>"
                    class="inline-flex items-center gap-2 px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold transition">


                    <i data-lucide="eye" class="w-4 h-4"></i>


                    View Detail


                </a>


            </div>



        </div>



        <?php endforeach; ?>


    </div>



    <?php endif; ?>


</div>