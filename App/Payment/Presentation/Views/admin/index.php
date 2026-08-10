<div class="max-w-7xl mx-auto px-6 py-10">


    <!-- Header -->
    <div class="mb-8">


        <div class="flex items-center justify-between">


            <div>


                <h1 class="text-3xl font-bold text-slate-800 flex items-center gap-3">

                    <i data-lucide="wallet-cards" class="w-8 h-8 text-blue-600"></i>


                    Payment Management

                </h1>


                <p class="text-slate-500 mt-2">

                    Review and verify student club membership payments.

                </p>


            </div>


        </div>


    </div>







    <?php if (empty($payments)): ?>


        <!-- Empty -->

        <div class="glass-card-light rounded-2xl p-10 text-center border border-slate-200">


            <div class="w-16 h-16 mx-auto rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">


                <i data-lucide="credit-card" class="w-8 h-8"></i>


            </div>



            <h3 class="mt-5 text-xl font-bold text-slate-800">

                No Payment Requests

            </h3>



            <p class="text-slate-500 mt-2">

                There are currently no membership payments.

            </p>


        </div>





    <?php else: ?>





        <!-- Payment Cards -->

        <div class="grid gap-6">



            <?php foreach ($payments as $payment): ?>



                <div
                    class="glass-card-light rounded-2xl p-6 border border-slate-200 hover:shadow-xl transition-all duration-300">



                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">





                        <!-- Student + Club -->

                        <div class="flex items-center gap-4">


                            <div class="w-14 h-14 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">


                                <i data-lucide="user-round" class="w-7 h-7"></i>


                            </div>



                            <div>


                                <h3 class="text-lg font-bold text-slate-800">


                                    <?= htmlspecialchars(
                                        $payment['user_name']
                                    ) ?>


                                </h3>



                                <p class="text-sm text-slate-500">


                                    Club:

                                    <span class="font-semibold">


                                        <?= htmlspecialchars(
                                            $payment['club_name']
                                        ) ?>


                                    </span>


                                </p>



                                <p class="text-sm text-slate-500">


                                    Method:

                                    <?= htmlspecialchars(
                                        $payment['payment_method']
                                    ) ?>


                                </p>


                            </div>


                        </div>








                        <!-- Amount -->

                        <div>


                            <p class="text-sm text-slate-500">

                                Amount

                            </p>


                            <p class="text-2xl font-bold text-blue-600">


                                $<?= number_format(
                                        $payment['amount'],
                                        2
                                    ) ?>


                            </p>


                        </div>








                        <!-- Status -->

                        <div>


                            <?php if ($payment['status'] === 'pending'): ?>


                                <span
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-yellow-100 text-yellow-700 font-semibold text-sm">


                                    <i data-lucide="clock" class="w-4 h-4"></i>


                                    Pending


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



                    </div>










                    <!-- Receipt + Actions -->

                    <div
                        class="mt-6 pt-5 border-t border-slate-200 flex flex-col md:flex-row md:justify-between md:items-center gap-4">





                        <div class="flex items-center gap-3">


                            <?php if (!empty($payment['receipt_image'])): ?>


                                <a href="<?= BASE_URL . '/' . $payment['receipt_image'] ?>" target="_blank"
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold">


                                    <i data-lucide="image" class="w-4 h-4"></i>


                                    View Receipt


                                </a>


                            <?php endif; ?>





                            <a href="<?= BASE_URL ?>/admin/payments/<?= $payment['id'] ?>"
                                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-50 hover:bg-blue-100 text-blue-700 text-sm font-semibold">


                                <i data-lucide="eye" class="w-4 h-4"></i>


                                Detail


                            </a>


                        </div>








                        <?php if ($payment['status'] === 'pending'): ?>


                            <div class="flex gap-3">



                                <form method="POST" action="<?= BASE_URL ?>/admin/payments/<?= $payment['id'] ?>/verify">


                                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">


                                    <button type="submit"
                                        class="inline-flex items-center gap-2 px-5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm transition">


                                        <i data-lucide="check" class="w-4 h-4"></i>


                                        Verify


                                    </button>


                                </form>






                                <form method="POST" action="<?= BASE_URL ?>/admin/payments/<?= $payment['id'] ?>/reject">


                                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">



                                    <!-- Reject Button -->
                                    <button type="button"
                                        onclick="document.getElementById('rejectModal<?= $payment['id'] ?>').classList.remove('hidden')"
                                        class="px-5 py-2 rounded-xl bg-red-600 text-white">

                                        Reject

                                    </button>




                                    <!-- Modal -->
                                    <div id="rejectModal<?= $payment['id'] ?>"
                                        class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">


                                        <div class="bg-white p-6 rounded-xl w-96">


                                            <h3 class="font-bold text-lg mb-4">
                                                Reject Payment
                                            </h3>



                                            <textarea name="reason" required rows="4" class="w-full border rounded-xl p-3"
                                                placeholder="Enter rejection reason">
</textarea>



                                            <div class="mt-4 flex justify-end gap-3">


                                                <button type="button"
                                                    onclick="document.getElementById('rejectModal<?= $payment['id'] ?>').classList.add('hidden')"
                                                    class="px-4 py-2 bg-gray-200 rounded-xl">

                                                    Cancel

                                                </button>



                                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-xl">

                                                    Confirm Reject

                                                </button>


                                            </div>


                                        </div>


                                    </div>


                                </form>

                            </div>


                        <?php endif; ?>



                    </div>




                </div>




            <?php endforeach; ?>



        </div>





    <?php endif; ?>


</div>