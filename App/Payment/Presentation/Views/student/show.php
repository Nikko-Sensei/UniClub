<div class="max-w-5xl mx-auto px-6 py-10">

    <div class="animate-slideInLeft mb-4">
        <a href="<?= BASE_URL ?>/payments/history"
            class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
            <span>Back to Payment History</span>
        </a>
    </div>
    <!-- Header -->
    <div class="mb-8">


        <div class="flex items-center gap-3">



            <div>

                <h1 class="text-3xl font-bold text-slate-800">

                    Payment Details

                </h1>


                <p class="text-slate-500 mt-1">

                    View your membership payment information.

                </p>


            </div>


        </div>


    </div>





    <?php if (!$payment): ?>


    <!-- Not Found -->

    <div class="glass-card-light rounded-2xl p-10 text-center border border-red-200">


        <div class="w-16 h-16 mx-auto rounded-2xl bg-red-50 text-red-600 flex items-center justify-center">


            <i data-lucide="triangle-alert" class="w-8 h-8"></i>


        </div>



        <h3 class="mt-5 text-xl font-bold text-slate-800">

            Payment Not Found

        </h3>


        <p class="text-slate-500 mt-2">

            The payment record does not exist.

        </p>


    </div>



    <?php else: ?>





    <div class="glass-card-light rounded-3xl p-8 border border-slate-200 shadow-lg">





        <!-- Payment Status -->

        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-5 mb-8">



            <div class="flex items-center gap-4">


                <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">


                    <i data-lucide="credit-card" class="w-7 h-7"></i>


                </div>



                <div>


                    <h2 class="text-xl font-bold text-slate-800">

                        <?= htmlspecialchars(
                                $payment['club_name']
                            ) ?>

                    </h2>



                    <p class="text-sm text-slate-500">

                        Membership Payment

                    </p>


                </div>


            </div>





            <?php if ($payment['status'] === 'pending'): ?>


            <span
                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-yellow-100 text-yellow-700 font-semibold text-sm">


                <i data-lucide="clock" class="w-4 h-4"></i>


                Pending Verification


            </span>



            <?php elseif ($payment['status'] === 'verified'): ?>


            <span
                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-emerald-100 text-emerald-700 font-semibold text-sm">


                <i data-lucide="badge-check" class="w-4 h-4"></i>


                Verified


            </span>




            <?php elseif ($payment['status'] === 'rejected'): ?>


            <span
                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-red-100 text-red-700 font-semibold text-sm">


                <i data-lucide="circle-x" class="w-4 h-4"></i>


                Rejected


            </span>


            <?php endif; ?>


        </div>







        <!-- Information -->

        <div class="grid md:grid-cols-2 gap-6">





            <!-- Amount -->

            <div class="rounded-2xl bg-blue-50 p-5">


                <p class="text-sm text-slate-500">

                    Payment Amount

                </p>


                <h3 class="text-2xl font-bold text-blue-600 mt-2">


                    <p class="text-xl font-bold text-blue-600">
                        <?= number_format((float) $payment['amount']) ?>
                        <span class="ml-1 text-sm font-semibold text-slate-500">MMK</span>
                    </p>


                </h3>


            </div>






            <!-- Payment Method -->

            <div class="rounded-2xl bg-slate-50 p-5">


                <p class="text-sm text-slate-500">

                    Payment Method

                </p>


                <h3 class="font-bold text-slate-800 mt-2">


                    <?= htmlspecialchars(
                            $payment['payment_method']
                        ) ?>


                </h3>


            </div>






            <!-- Transaction Number -->

            <div class="rounded-2xl bg-slate-50 p-5">


                <p class="text-sm text-slate-500">

                    Transaction Number

                </p>


                <h3 class="font-semibold text-slate-800 mt-2">


                    <?= $payment['transaction_number']
                            ? htmlspecialchars(
                                $payment['transaction_number']
                            )
                            : 'N/A'
                        ?>


                </h3>


            </div>






            <!-- Created Date -->

            <div class="rounded-2xl bg-slate-50 p-5">


                <p class="text-sm text-slate-500">

                    Submitted Date

                </p>


                <h3 class="font-semibold text-slate-800 mt-2">


                    <?= date(
                            'M d, Y H:i',
                            strtotime(
                                $payment['created_at']
                            )
                        ) ?>


                </h3>


            </div>



        </div>








        <!-- Receipt -->

        <?php if (!empty($payment['receipt_image'])): ?>


        <div class="mt-8">


            <h3 class="font-bold text-slate-800 mb-4 flex items-center gap-2">


                <i data-lucide="image" class="w-5 h-5 text-blue-600"></i>


                Payment Receipt


            </h3>




            <div class="rounded-2xl overflow-hidden border border-slate-200">


                <img src="<?= BASE_URL . '/' . $payment['receipt_image'] ?>"
                    class="w-full max-h-[500px] object-contain bg-slate-50" alt="Payment Receipt">


            </div>


        </div>


        <?php endif; ?>








        <!-- Verification Information -->

        <?php if ($payment['status'] !== 'pending'): ?>


        <div class="mt-8 p-5 rounded-2xl border border-slate-200 bg-slate-50">


            <h3 class="font-bold text-slate-800 mb-3">

                Verification Information

            </h3>



            <div class="space-y-2 text-sm text-slate-600">



                <p>

                    Verified Date:

                    <span class="font-semibold text-slate-800">


                        <?= $payment['verified_at']
                                    ? date(
                                        'M d, Y H:i',
                                        strtotime(
                                            $payment['verified_at']
                                        )
                                    )
                                    : 'N/A'
                                ?>


                    </span>

                </p>



            </div>


        </div>


        <?php endif; ?>






    </div>



    <?php endif; ?>


</div>