<div class="space-y-6">

    <!-- Header -->
    <div class="
        flex
        flex-col
        md:flex-row
        md:items-center
        md:justify-between
        gap-4
    ">

        <div class="flex items-center gap-3">

            <!-- Back Button -->
            <a href="<?= BASE_URL ?>/admin/payments" class="
                    w-10
                    h-10
                    rounded-lg
                    bg-slate-100
                    hover:bg-slate-200
                    text-slate-600
                    flex
                    items-center
                    justify-center
                    transition
                ">
                <i data-lucide="arrow-left" class="w-5 h-5"></i>
            </a>


            <div>

                <h1 class="text-2xl font-bold text-slate-800">
                    Payment Detail
                </h1>

                <p class="text-slate-500 mt-1">
                    Review student payment information.
                </p>

            </div>

        </div>

    </div>


    <?php if (!$payment): ?>

    <!-- Not Found -->
    <div class="
            bg-white
            rounded-xl
            border
            border-red-200
            shadow-sm
            p-10
            text-center
        ">

        <div class="
                w-14
                h-14
                mx-auto
                rounded-xl
                bg-red-50
                text-red-600
                flex
                items-center
                justify-center
            ">
            <i data-lucide="triangle-alert" class="w-7 h-7"></i>
        </div>


        <h3 class="
                mt-4
                text-lg
                font-bold
                text-slate-800
            ">
            Payment Not Found
        </h3>


        <p class="text-sm text-slate-500 mt-2">
            The requested payment could not be found.
        </p>


        <a href="<?= BASE_URL ?>/admin/payments" class="
                    inline-flex
                    items-center
                    gap-2
                    mt-5
                    px-4
                    py-2
                    rounded-lg
                    bg-blue-600
                    hover:bg-blue-700
                    text-white
                    text-xs
                    font-semibold
                    transition
                ">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Back to Payments
        </a>

    </div>


    <?php else: ?>


    <!-- Main Card -->
    <div class="
            bg-white
            rounded-xl
            border
            border-slate-200
            shadow-sm
            overflow-hidden
        ">


        <!-- Card Header -->
        <div class="
                px-6
                py-5
                border-b
                border-slate-200
                flex
                flex-col
                md:flex-row
                md:items-center
                md:justify-between
                gap-4
            ">


            <!-- Student + Club -->
            <div class="flex items-center gap-3">

                <div class="
                        w-11
                        h-11
                        rounded-lg
                        bg-blue-50
                        text-blue-600
                        flex
                        items-center
                        justify-center
                        shrink-0
                    ">
                    <i data-lucide="credit-card" class="w-5 h-5"></i>
                </div>


                <div>

                    <h2 class="
                            text-lg
                            font-bold
                            text-slate-800
                        ">
                        <?= htmlspecialchars(
                                $payment['club_name']
                            ) ?>
                    </h2>


                    <p class="text-sm text-slate-500">

                        Student:

                        <span class="font-medium text-slate-700">
                            <?= htmlspecialchars(
                                    $payment['user_name']
                                ) ?>
                        </span>

                    </p>

                </div>

            </div>


            <!-- Status -->
            <div>

                <?php if ($payment['status'] === 'pending'): ?>

                <span class="
                            inline-flex
                            items-center
                            px-3
                            py-1
                            rounded-full
                            bg-amber-50
                            text-amber-700
                            text-xs
                            font-medium
                        ">
                    <span class="
                                w-2
                                h-2
                                rounded-full
                                bg-amber-500
                                mr-1.5
                            "></span>

                    Pending Verification
                </span>


                <?php elseif ($payment['status'] === 'verified'): ?>

                <span class="
                            inline-flex
                            items-center
                            px-3
                            py-1
                            rounded-full
                            bg-green-50
                            text-green-700
                            text-xs
                            font-medium
                        ">
                    <span class="
                                w-2
                                h-2
                                rounded-full
                                bg-green-500
                                mr-1.5
                            "></span>

                    Verified
                </span>


                <?php elseif ($payment['status'] === 'rejected'): ?>

                <span class="
                            inline-flex
                            items-center
                            px-3
                            py-1
                            rounded-full
                            bg-red-50
                            text-red-700
                            text-xs
                            font-medium
                        ">
                    <span class="
                                w-2
                                h-2
                                rounded-full
                                bg-red-500
                                mr-1.5
                            "></span>

                    Rejected
                </span>

                <?php endif; ?>

            </div>

        </div>


        <!-- Payment Information -->
        <div class="p-6">

            <div class="
                    grid
                    grid-cols-1
                    sm:grid-cols-2
                    lg:grid-cols-4
                    gap-4
                ">


                <!-- Amount -->
                <div class="
                        rounded-lg
                        border
                        border-slate-200
                        bg-blue-50/60
                        p-4
                    ">

                    <div class="flex items-center gap-2">

                        <i data-lucide="wallet" class="w-4 h-4 text-blue-600"></i>

                        <p class="
                                text-[11px]
                                uppercase
                                tracking-wide
                                text-slate-400
                                font-medium
                            ">
                            Amount
                        </p>

                    </div>


                    <p class="
                            text-xl
                            font-bold
                            text-blue-600
                            mt-2
                        ">
                        MMK <?= number_format(
                                $payment['amount'],
                                2
                            ) ?>
                    </p>

                </div>


                <!-- Payment Method -->
                <div class="
                        rounded-lg
                        border
                        border-slate-200
                        bg-slate-50
                        p-4
                    ">

                    <div class="flex items-center gap-2">

                        <i data-lucide="credit-card" class="w-4 h-4 text-slate-500"></i>

                        <p class="
                                text-[11px]
                                uppercase
                                tracking-wide
                                text-slate-400
                                font-medium
                            ">
                            Payment Method
                        </p>

                    </div>


                    <p class="
                            font-semibold
                            text-slate-800
                            mt-2
                        ">
                        <?= htmlspecialchars(
                                $payment['payment_method']
                            ) ?>
                    </p>

                </div>


                <!-- Transaction Number -->
                <div class="
                        rounded-lg
                        border
                        border-slate-200
                        bg-slate-50
                        p-4
                    ">

                    <div class="flex items-center gap-2">

                        <i data-lucide="hash" class="w-4 h-4 text-slate-500"></i>

                        <p class="
                                text-[11px]
                                uppercase
                                tracking-wide
                                text-slate-400
                                font-medium
                            ">
                            Transaction Number
                        </p>

                    </div>


                    <p class="
                            font-semibold
                            text-slate-800
                            mt-2
                            break-all
                        ">

                        <?= $payment['transaction_number']
                                ? htmlspecialchars(
                                    $payment['transaction_number']
                                )
                                : 'N/A'
                            ?>

                    </p>

                </div>


                <!-- Submitted Date -->
                <div class="
                        rounded-lg
                        border
                        border-slate-200
                        bg-slate-50
                        p-4
                    ">

                    <div class="flex items-center gap-2">

                        <i data-lucide="calendar" class="w-4 h-4 text-slate-500"></i>

                        <p class="
                                text-[11px]
                                uppercase
                                tracking-wide
                                text-slate-400
                                font-medium
                            ">
                            Submitted Date
                        </p>

                    </div>


                    <p class="
                            font-semibold
                            text-slate-800
                            mt-2
                        ">
                        <?= date(
                                'M d, Y H:i',
                                strtotime(
                                    $payment['created_at']
                                )
                            ) ?>
                    </p>

                </div>

            </div>


            <!-- Receipt -->
            <?php if (!empty($payment['receipt_image'])): ?>

            <div class="mt-6">

                <div class="
                            flex
                            items-center
                            justify-between
                            mb-3
                        ">

                    <h3 class="
                                text-sm
                                font-bold
                                text-slate-800
                                flex
                                items-center
                                gap-2
                            ">
                        <i data-lucide="image" class="w-4 h-4 text-blue-600"></i>

                        Payment Receipt
                    </h3>


                    <a href="<?= BASE_URL . '/' . $payment['receipt_image'] ?>" target="_blank" class="
                                    inline-flex
                                    items-center
                                    gap-1.5
                                    px-3
                                    py-1.5
                                    rounded-lg
                                    bg-slate-100
                                    hover:bg-slate-200
                                    text-slate-700
                                    text-xs
                                    font-semibold
                                    transition
                                ">
                        <i data-lucide="external-link" class="w-4 h-4"></i>

                        Open Receipt
                    </a>

                </div>


                <div class="
                            rounded-lg
                            border
                            border-slate-200
                            overflow-hidden
                            bg-slate-50
                            p-3
                        ">

                    <img src="<?= BASE_URL . '/' . $payment['receipt_image'] ?>" alt="Payment Receipt" class="
                                    w-full
                                    max-h-[600px]
                                    object-contain
                                    rounded-md
                                ">

                </div>

            </div>

            <?php endif; ?>


            <!-- Action Buttons -->
            <?php if ($payment['status'] === 'pending'): ?>

            <div class="
                        mt-6
                        pt-5
                        border-t
                        border-slate-200
                        flex
                        flex-col-reverse
                        sm:flex-row
                        sm:justify-end
                        gap-2
                    ">


                <!-- Reject -->
                <form method="POST" action="<?= BASE_URL ?>/admin/payments/<?= $payment['id'] ?>/reject"
                    onsubmit="return confirm('Reject this payment?');">

                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">


                    <button type="submit" class="
                                    w-full
                                    sm:w-auto
                                    px-4
                                    py-2
                                    inline-flex
                                    items-center
                                    justify-center
                                    gap-2
                                    rounded-lg
                                    border
                                    border-red-200
                                    text-red-600
                                    hover:bg-red-50
                                    text-xs
                                    font-semibold
                                    transition
                                ">
                        <i data-lucide="circle-x" class="w-4 h-4"></i>

                        Reject Payment
                    </button>

                </form>


                <!-- Verify -->
                <form method="POST" action="<?= BASE_URL ?>/admin/payments/<?= $payment['id'] ?>/verify"
                    onsubmit="return confirm('Verify this payment?');">

                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">


                    <button type="submit" class="
                                    w-full
                                    sm:w-auto
                                    px-4
                                    py-2
                                    inline-flex
                                    items-center
                                    justify-center
                                    gap-2
                                    rounded-lg
                                    bg-green-600
                                    hover:bg-green-700
                                    text-white
                                    text-xs
                                    font-semibold
                                    transition
                                ">
                        <i data-lucide="circle-check" class="w-4 h-4"></i>

                        Verify Payment
                    </button>

                </form>

            </div>

            <?php endif; ?>

        </div>

    </div>

    <?php endif; ?>

</div>