<div class="max-w-5xl mx-auto px-6 py-10">


    <!-- Header -->

    <div class="mb-8">

        <div class="flex items-center gap-3">


            <a href="<?= BASE_URL ?>/admin/payments"
                class="w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 flex items-center justify-center transition">

                <i data-lucide="arrow-left" class="w-5 h-5 text-slate-600"></i>

            </a>



            <div>

                <h1 class="text-3xl font-bold text-slate-800">

                    Payment Detail

                </h1>


                <p class="text-slate-500 mt-1">

                    Review student payment information.

                </p>

            </div>


        </div>

    </div>








    <?php if (!$payment): ?>


    <div class="glass-card-light rounded-2xl p-10 text-center border border-red-200">


        <div class="w-16 h-16 mx-auto rounded-2xl bg-red-50 text-red-600 flex items-center justify-center">

            <i data-lucide="triangle-alert" class="w-8 h-8"></i>

        </div>



        <h3 class="mt-5 text-xl font-bold text-slate-800">

            Payment Not Found

        </h3>


    </div>



    <?php else: ?>





    <div class="glass-card-light rounded-3xl p-8 border border-slate-200 shadow-lg">





        <!-- Top Information -->

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


                        Student:

                        <?= htmlspecialchars(
                            $payment['user_name']
                        ) ?>


                    </p>


                </div>


            </div>







            <!-- Status -->

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









        <!-- Payment Information -->

        <div class="grid md:grid-cols-2 gap-6">





            <div class="rounded-2xl bg-blue-50 p-5">


                <p class="text-sm text-slate-500">

                    Amount

                </p>


                <p class="text-2xl font-bold text-blue-600 mt-2">


                    $<?= number_format(
                        $payment['amount'],
                        2
                    ) ?>


                </p>


            </div>







            <div class="rounded-2xl bg-slate-50 p-5">


                <p class="text-sm text-slate-500">

                    Payment Method

                </p>


                <p class="font-bold text-slate-800 mt-2">


                    <?= htmlspecialchars(
                        $payment['payment_method']
                    ) ?>


                </p>


            </div>







            <div class="rounded-2xl bg-slate-50 p-5">


                <p class="text-sm text-slate-500">

                    Transaction Number

                </p>


                <p class="font-semibold text-slate-800 mt-2">


                    <?= $payment['transaction_number']
                        ? htmlspecialchars(
                            $payment['transaction_number']
                        )
                        : 'N/A'
                    ?>


                </p>


            </div>








            <div class="rounded-2xl bg-slate-50 p-5">


                <p class="text-sm text-slate-500">

                    Submitted Date

                </p>


                <p class="font-semibold text-slate-800 mt-2">


                    <?= date(
                        'M d, Y H:i',
                        strtotime(
                            $payment['created_at']
                        )
                    ) ?>


                </p>


            </div>




        </div>









        <!-- Receipt Image -->

        <?php if (!empty($payment['receipt_image'])): ?>


        <div class="mt-8">


            <h3 class="font-bold text-slate-800 mb-4 flex items-center gap-2">


                <i data-lucide="image" class="w-5 h-5 text-blue-600"></i>


                Payment Receipt


            </h3>




            <div class="rounded-2xl border border-slate-200 overflow-hidden bg-slate-50">


                <img src="<?= BASE_URL . '/' . $payment['receipt_image'] ?>" alt="Receipt"
                    class="w-full max-h-[600px] object-contain">


            </div>


        </div>


        <?php endif; ?>









        <!-- Action Buttons -->

        <?php if ($payment['status'] === 'pending'): ?>


        <div class="mt-8 pt-6 border-t border-slate-200 flex justify-end gap-4">



            <form method="POST" action="<?= BASE_URL ?>/admin/payments/<?= $payment['id'] ?>/reject">


                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">



                <button type="submit"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white font-semibold transition">


                    <i data-lucide="x" class="w-5 h-5"></i>


                    Reject Payment


                </button>



            </form>







            <form method="POST" action="<?= BASE_URL ?>/admin/payments/<?= $payment['id'] ?>/verify">


                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">



                <button type="submit"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold transition">


                    <i data-lucide="check" class="w-5 h-5"></i>


                    Verify Payment


                </button>



            </form>



        </div>


        <?php endif; ?>






    </div>




    <?php endif; ?>


</div>