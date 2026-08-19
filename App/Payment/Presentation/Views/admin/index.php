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
        <div>
            <h1 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
                <i data-lucide="wallet-cards" class="w-6 h-6 text-blue-600"></i>
                Payment Management
            </h1>

            <p class="text-slate-500 mt-1">
                Review and verify student club membership payments.
            </p>
        </div>
    </div>


    <!-- Statistics -->
    <div class="
        grid
        grid-cols-1
        sm:grid-cols-2
        xl:grid-cols-4
        gap-4
    ">

        <!-- Pending -->
        <div class="
            bg-white
            rounded-xl
            border
            border-slate-200
            shadow-sm
            p-4
            flex
            items-center
            gap-3
        ">

            <div class="
                w-10
                h-10
                rounded-lg
                bg-amber-50
                text-amber-600
                flex
                items-center
                justify-center
                shrink-0
            ">
                <i data-lucide="clock-3" class="w-5 h-5"></i>
            </div>

            <div class="min-w-0">

                <p class="
                    text-[11px]
                    uppercase
                    tracking-wide
                    text-slate-400
                    font-medium
                ">
                    Pending
                </p>

                <p class="
                    text-xl
                    font-bold
                    text-slate-800
                    mt-0.5
                ">
                    <?= $statistics['pending_count'] ?>
                </p>

                <p class="text-[11px] text-slate-400 mt-0.5">
                    Waiting verification
                </p>

            </div>

        </div>


        <!-- Verified -->
        <div class="
            bg-white
            rounded-xl
            border
            border-slate-200
            shadow-sm
            p-4
            flex
            items-center
            gap-3
        ">

            <div class="
                w-10
                h-10
                rounded-lg
                bg-green-50
                text-green-600
                flex
                items-center
                justify-center
                shrink-0
            ">
                <i data-lucide="badge-check" class="w-5 h-5"></i>
            </div>

            <div class="min-w-0">

                <p class="
                    text-[11px]
                    uppercase
                    tracking-wide
                    text-slate-400
                    font-medium
                ">
                    Verified
                </p>

                <p class="
                    text-xl
                    font-bold
                    text-slate-800
                    mt-0.5
                ">
                    <?= $statistics['verified_count'] ?>
                </p>

                <p class="text-[11px] text-slate-400 mt-0.5">
                    Successfully verified
                </p>

            </div>

        </div>


        <!-- Rejected -->
        <div class="
            bg-white
            rounded-xl
            border
            border-slate-200
            shadow-sm
            p-4
            flex
            items-center
            gap-3
        ">

            <div class="
                w-10
                h-10
                rounded-lg
                bg-red-50
                text-red-600
                flex
                items-center
                justify-center
                shrink-0
            ">
                <i data-lucide="circle-x" class="w-5 h-5"></i>
            </div>

            <div class="min-w-0">

                <p class="
                    text-[11px]
                    uppercase
                    tracking-wide
                    text-slate-400
                    font-medium
                ">
                    Rejected
                </p>

                <p class="
                    text-xl
                    font-bold
                    text-slate-800
                    mt-0.5
                ">
                    <?= $statistics['rejected_count'] ?>
                </p>

                <p class="text-[11px] text-slate-400 mt-0.5">
                    Payment requests rejected
                </p>

            </div>

        </div>


        <!-- Verified Revenue -->
        <div class="
            bg-white
            rounded-xl
            border
            border-slate-200
            shadow-sm
            p-4
            flex
            items-center
            gap-3
        ">

            <div class="
                w-10
                h-10
                rounded-lg
                bg-blue-50
                text-blue-600
                flex
                items-center
                justify-center
                shrink-0
            ">
                <i data-lucide="wallet" class="w-5 h-5"></i>
            </div>

            <div class="min-w-0">

                <p class="
                    text-[11px]
                    uppercase
                    tracking-wide
                    text-slate-400
                    font-medium
                ">
                    Verified Revenue
                </p>

                <p class="
                    text-xl
                    font-bold
                    text-slate-800
                    mt-0.5
                    whitespace-nowrap
                ">
                    MMK <?= number_format(
                            $statistics['verified_amount'],
                            2
                        ) ?>
                </p>

                <p class="text-[11px] text-slate-400 mt-0.5">
                    From verified payments
                </p>

            </div>

        </div>

    </div>


    <!-- Search & Filters -->
    <div class="
        bg-white
        rounded-xl
        border
        border-slate-200
        shadow-sm
        p-4
    ">

        <form method="GET" action="<?= BASE_URL ?>/admin/payments" onsubmit="return submitPaymentFilters(this)" class="
                flex
                flex-col
                lg:flex-row
                gap-3
            ">

            <!-- Search -->
            <div class="flex-1">

                <div class="
        flex
        items-center
        gap-3
        w-full
        px-4
        py-2.5
        rounded-lg
        border
        border-slate-200
        bg-white
        focus-within:ring-2
        focus-within:ring-blue-500/30
        focus-within:border-blue-400
        transition
    ">

                    <i data-lucide="search" class="w-4 h-4 text-slate-400 flex-shrink-0">
                    </i>

                    <input type="text" name="search" value="<?= htmlspecialchars($filters['search'] ?? '') ?>"
                        placeholder="Search student, ID, club, transaction..." class="
                flex-1
                bg-transparent
                text-sm
                text-slate-700
                placeholder-slate-400
                outline-none
            ">

                </div>

            </div>


            <!-- Status -->
            <select name="status" onchange="this.form.submit()" class="
                    lg:w-44
                    px-4
                    py-2.5
                    rounded-lg
                    border
                    border-slate-200
                    bg-white
                    text-sm
                    text-slate-700
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500
                ">

                <option value="">
                    All Status
                </option>

                <option value="pending" <?= ($filters['status'] ?? '') === 'pending'
                                            ? 'selected'
                                            : '' ?>>
                    Pending
                </option>

                <option value="verified" <?= ($filters['status'] ?? '') === 'verified'
                                                ? 'selected'
                                                : '' ?>>
                    Verified
                </option>

                <option value="rejected" <?= ($filters['status'] ?? '') === 'rejected'
                                                ? 'selected'
                                                : '' ?>>
                    Rejected
                </option>

            </select>


            <!-- Payment Method -->
            <select name="payment_method" onchange="this.form.submit()" class="
                    lg:w-48
                    px-4
                    py-2.5
                    rounded-lg
                    border
                    border-slate-200
                    bg-white
                    text-sm
                    text-slate-700
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500
                ">

                <option value="">
                    All Methods
                </option>

                <option value="cash" <?= ($filters['payment_method'] ?? '') === 'cash'
                                            ? 'selected'
                                            : '' ?>>
                    Cash
                </option>

                <option value="kbz_pay" <?= ($filters['payment_method'] ?? '') === 'kbz_pay'
                                            ? 'selected'
                                            : '' ?>>
                    KBZ Pay
                </option>

                <option value="wave_money" <?= ($filters['payment_method'] ?? '') === 'wave_money'
                                                ? 'selected'
                                                : '' ?>>
                    Wave Money
                </option>

                <option value="bank_transfer" <?= ($filters['payment_method'] ?? '') === 'bank_transfer'
                                                    ? 'selected'
                                                    : '' ?>>
                    Bank Transfer
                </option>

            </select>


            <!-- Clear -->
            <?php if (
                !empty($filters['search']) ||
                !empty($filters['status']) ||
                !empty($filters['payment_method'])
            ): ?>

                <a href="<?= BASE_URL ?>/admin/payments" class="
                        px-5
                        py-2.5
                        rounded-lg
                        bg-slate-100
                        hover:bg-slate-200
                        text-slate-700
                        text-sm
                        font-semibold
                        inline-flex
                        items-center
                        justify-center
                        gap-2
                        transition
                    ">
                    <i data-lucide="x" class="w-4 h-4"></i>
                    Clear
                </a>

            <?php endif; ?>

        </form>

    </div>


    <!-- Payment Table -->
    <div class="
        bg-white
        rounded-xl
        border
        border-slate-200
        shadow-sm
        overflow-hidden
    ">

        <?php if (empty($payments)): ?>

            <!-- Empty State -->
            <div class="py-16 text-center">

                <div class="
                    w-14
                    h-14
                    mx-auto
                    rounded-xl
                    bg-blue-50
                    text-blue-600
                    flex
                    items-center
                    justify-center
                ">
                    <i data-lucide="credit-card" class="w-7 h-7"></i>
                </div>

                <h3 class="
                    mt-4
                    text-lg
                    font-bold
                    text-slate-800
                ">
                    No Payment Requests
                </h3>

                <p class="
                    text-sm
                    text-slate-500
                    mt-2
                ">
                    There are currently no membership payments.
                </p>

            </div>

        <?php else: ?>

            <!-- Desktop Table -->
            <div class="overflow-x-auto">

                <table class="w-full text-sm text-slate-700">

                    <thead class="
                        bg-slate-50/80
                        text-xs
                        font-semibold
                        text-slate-500
                        uppercase
                        tracking-wider
                        border-b
                        border-slate-200
                    ">

                        <tr>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Student
                            </th>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Club
                            </th>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Payment Method
                            </th>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Amount
                            </th>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Receipt
                            </th>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Status
                            </th>

                            <th class="px-5 py-3.5 text-center whitespace-nowrap">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        <?php foreach ($payments as $payment): ?>

                            <tr class="
                                hover:bg-slate-50/60
                                transition-colors
                            ">

                                <!-- Student -->
                                <td class="px-5 py-3.5">

                                    <div class="flex items-center gap-3">

                                        <div class="
                                            w-9
                                            h-9
                                            rounded-full
                                            overflow-hidden
                                            flex
                                            items-center
                                            justify-center
                                            bg-gradient-to-br
                                            from-blue-100
                                            to-blue-200
                                            text-blue-700
                                            font-semibold
                                            text-sm
                                            shrink-0
                                            shadow-sm
                                        ">

                                            <?php if (!empty($payment['profile_image'])): ?>

                                                <img src="<?= BASE_URL ?>/uploads/profile/<?= htmlspecialchars(
                                                                                                $payment['profile_image']
                                                                                            ) ?>" alt="<?= htmlspecialchars(
                                                                    $payment['user_name'] ?? 'Student'
                                                                ) ?>" class="w-full h-full object-cover">

                                            <?php else: ?>

                                                <?php
                                                $name = trim(
                                                    $payment['user_name'] ?? 'Student'
                                                );

                                                $words = preg_split(
                                                    '/\s+/',
                                                    $name
                                                );

                                                if (count($words) >= 2) {

                                                    $initials = strtoupper(
                                                        substr($words[0], 0, 1) .
                                                            substr($words[1], 0, 1)
                                                    );
                                                } else {

                                                    $initials = strtoupper(
                                                        substr(
                                                            $words[0] ?? 'S',
                                                            0,
                                                            1
                                                        )
                                                    );
                                                }
                                                ?>

                                                <?= htmlspecialchars($initials) ?>

                                            <?php endif; ?>

                                        </div>


                                        <div>

                                            <p class="
                                                font-medium
                                                text-slate-800
                                                whitespace-nowrap
                                            ">
                                                <?= htmlspecialchars(
                                                    $payment['user_name']
                                                ) ?>
                                            </p>

                                            <?php if (!empty($payment['student_id'])): ?>

                                                <p class="text-xs text-slate-400">
                                                    <?= htmlspecialchars(
                                                        $payment['student_id']
                                                    ) ?>
                                                </p>

                                            <?php endif; ?>

                                        </div>

                                    </div>

                                </td>


                                <!-- Club -->
                                <td class="px-5 py-3.5">

                                    <p class="
                                        font-medium
                                        text-slate-700
                                        whitespace-nowrap
                                    ">
                                        <?= htmlspecialchars(
                                            $payment['club_name']
                                        ) ?>
                                    </p>

                                </td>


                                <!-- Payment Method -->
                                <td class="px-5 py-3.5">

                                    <span class="
                                        inline-flex
                                        items-center
                                        gap-1.5
                                        text-sm
                                        text-slate-600
                                        whitespace-nowrap
                                    ">

                                        <i data-lucide="credit-card" class="w-4 h-4 text-slate-400"></i>

                                        <?= htmlspecialchars(
                                            $payment['payment_method']
                                        ) ?>

                                    </span>

                                </td>


                                <!-- Amount -->
                                <td class="px-5 py-3.5">

                                    <p class="
                                        font-semibold
                                        text-blue-600
                                        whitespace-nowrap
                                    ">
                                        MMK <?= number_format(
                                                $payment['amount'],
                                                2
                                            ) ?>
                                    </p>

                                </td>


                                <!-- Receipt -->
                                <td class="px-5 py-3.5">

                                    <?php if (!empty($payment['receipt_image'])): ?>

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
                                            <i data-lucide="image" class="w-4 h-4"></i>
                                            View
                                        </a>

                                    <?php else: ?>

                                        <span class="text-xs text-slate-400">
                                            No receipt
                                        </span>

                                    <?php endif; ?>

                                </td>


                                <!-- Status -->
                                <td class="px-5 py-3.5">

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
                                            Pending
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

                                </td>


                                <!-- Actions -->
                                <td class="px-5 py-3.5">

                                    <div class="
                                        flex
                                        justify-end
                                        gap-2
                                    ">

                                        <!-- Detail -->
                                        <a href="<?= BASE_URL ?>/admin/payments/<?= $payment['id'] ?>" class="
                                                px-3
                                                py-2
                                                inline-flex
                                                items-center
                                                gap-2
                                                rounded-lg
                                                bg-blue-50
                                                hover:bg-blue-100
                                                text-blue-700
                                                text-xs
                                                font-semibold
                                                transition
                                            ">
                                            <i data-lucide="eye" class="w-4 h-4"></i>
                                            Detail
                                        </a>


                                        <?php if ($payment['status'] === 'pending'): ?>

                                            <!-- Verify -->
                                            <form method="POST" action="<?= BASE_URL ?>/admin/payments/<?= $payment['id'] ?>/verify"
                                                onsubmit="return confirm('Verify this payment?');">

                                                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

                                                <button type="submit" class="
                                                        px-3
                                                        py-2
                                                        inline-flex
                                                        items-center
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
                                                    Verify
                                                </button>

                                            </form>


                                            <!-- Reject -->
                                            <button type="button"
                                                onclick="document.getElementById('rejectModal<?= $payment['id'] ?>').classList.remove('hidden')"
                                                class="
                                                    px-3
                                                    py-2
                                                    inline-flex
                                                    items-center
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
                                                Reject
                                            </button>

                                        <?php endif; ?>

                                    </div>

                                </td>

                            </tr>


                            <?php if ($payment['status'] === 'pending'): ?>

                                <!-- Reject Modal -->
                                <div id="rejectModal<?= $payment['id'] ?>" class="
                                        hidden
                                        fixed
                                        inset-0
                                        z-50
                                        bg-slate-900/50
                                        flex
                                        items-center
                                        justify-center
                                        p-4
                                    ">

                                    <div class="
                                        bg-white
                                        rounded-xl
                                        border
                                        border-slate-200
                                        shadow-xl
                                        w-full
                                        max-w-md
                                        p-6
                                    ">

                                        <div class="
                                            flex
                                            items-center
                                            gap-3
                                            mb-5
                                        ">

                                            <div class="
                                                w-10
                                                h-10
                                                rounded-lg
                                                bg-red-50
                                                text-red-600
                                                flex
                                                items-center
                                                justify-center
                                            ">
                                                <i data-lucide="circle-x" class="w-5 h-5"></i>
                                            </div>

                                            <div>

                                                <h3 class="
                                                    text-lg
                                                    font-bold
                                                    text-slate-800
                                                ">
                                                    Reject Payment
                                                </h3>

                                                <p class="text-xs text-slate-500">
                                                    Please provide a rejection reason.
                                                </p>

                                            </div>

                                        </div>


                                        <form method="POST" action="<?= BASE_URL ?>/admin/payments/<?= $payment['id'] ?>/reject">

                                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

                                            <textarea name="reason" required rows="4" class="
                                                    w-full
                                                    border
                                                    border-slate-200
                                                    rounded-lg
                                                    p-3
                                                    text-sm
                                                    text-slate-700
                                                    placeholder-slate-400
                                                    focus:outline-none
                                                    focus:ring-2
                                                    focus:ring-blue-500
                                                    focus:border-blue-500
                                                    resize-none
                                                " placeholder="Enter rejection reason"></textarea>


                                            <div class="
                                                mt-5
                                                flex
                                                justify-end
                                                gap-2
                                            ">

                                                <button type="button"
                                                    onclick="document.getElementById('rejectModal<?= $payment['id'] ?>').classList.add('hidden')"
                                                    class="
                                                        px-4
                                                        py-2
                                                        rounded-lg
                                                        bg-slate-100
                                                        hover:bg-slate-200
                                                        text-slate-700
                                                        text-xs
                                                        font-semibold
                                                        transition
                                                    ">
                                                    Cancel
                                                </button>


                                                <button type="submit" class="
                                                        px-4
                                                        py-2
                                                        rounded-lg
                                                        bg-red-600
                                                        hover:bg-red-700
                                                        text-white
                                                        text-xs
                                                        font-semibold
                                                        transition
                                                    ">
                                                    Confirm Reject
                                                </button>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            <?php endif; ?>


                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        <?php endif; ?>


        <!-- Pagination -->
        <?php if (
            $pagination !== null &&
            $pagination['total'] > 0
        ): ?>

            <div class="
                px-5
                py-3.5
                border-t
                border-slate-200/60
                bg-slate-50/20
                flex
                flex-col
                sm:flex-row
                sm:items-center
                sm:justify-between
                gap-3
                text-xs
                text-slate-500
            ">

                <!-- Result Information -->
                <span>

                    Showing

                    <span class="font-medium text-slate-700">

                        <?= (($pagination['current_page'] - 1)
                            * $pagination['per_page']) + 1 ?>

                        -

                        <?= min(
                            $pagination['current_page']
                                * $pagination['per_page'],
                            $pagination['total']
                        ) ?>

                    </span>

                    of

                    <span class="font-medium text-slate-700">
                        <?= $pagination['total'] ?>
                    </span>

                    payments.

                </span>


                <!-- Pagination Controls -->
                <div class="flex items-center gap-2">

                    <?php
                    $totalPages = $pagination['total_pages'];
                    $current    = $pagination['current_page'];
                    $range      = 2;

                    $start = max(1, $current - $range);
                    $end   = min($totalPages, $current + $range);
                    ?>


                    <!-- Previous -->
                    <?php if ($current > 1): ?>

                        <a href="<?= buildPaymentPaginationUrl(
                                        $current - 1,
                                        $_GET
                                    ) ?>" class="
                                w-8
                                h-8
                                border
                                border-slate-200
                                rounded-lg
                                hover:bg-slate-100
                                transition-colors
                                flex
                                items-center
                                justify-center
                            " title="Previous page">
                            <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i>
                        </a>

                    <?php else: ?>

                        <span class="
                                w-8
                                h-8
                                border
                                border-slate-200
                                rounded-lg
                                opacity-50
                                pointer-events-none
                                flex
                                items-center
                                justify-center
                            ">
                            <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i>
                        </span>

                    <?php endif; ?>


                    <!-- First Page -->
                    <?php if ($start > 1): ?>

                        <a href="<?= buildPaymentPaginationUrl(
                                        1,
                                        $_GET
                                    ) ?>" class="
                                w-8
                                h-8
                                border
                                border-slate-200
                                rounded-lg
                                hover:bg-slate-100
                                transition-colors
                                flex
                                items-center
                                justify-center
                            ">
                            1
                        </a>

                        <?php if ($start > 2): ?>

                            <span class="px-1">
                                …
                            </span>

                        <?php endif; ?>

                    <?php endif; ?>


                    <!-- Page Numbers -->
                    <?php for (
                        $i = $start;
                        $i <= $end;
                        $i++
                    ): ?>

                        <?php if ($i == $current): ?>

                            <span class="
                                    w-8
                                    h-8
                                    bg-blue-600
                                    text-white
                                    rounded-lg
                                    text-xs
                                    font-medium
                                    flex
                                    items-center
                                    justify-center
                                    shadow-sm
                                ">
                                <?= $i ?>
                            </span>

                        <?php else: ?>

                            <a href="<?= buildPaymentPaginationUrl(
                                            $i,
                                            $_GET
                                        ) ?>" class="
                                    w-8
                                    h-8
                                    border
                                    border-slate-200
                                    rounded-lg
                                    hover:bg-slate-100
                                    transition-colors
                                    flex
                                    items-center
                                    justify-center
                                ">
                                <?= $i ?>
                            </a>

                        <?php endif; ?>

                    <?php endfor; ?>


                    <!-- Last Page -->
                    <?php if ($end < $totalPages): ?>

                        <?php if ($end < $totalPages - 1): ?>

                            <span class="px-1">
                                …
                            </span>

                        <?php endif; ?>

                        <a href="<?= buildPaymentPaginationUrl(
                                        $totalPages,
                                        $_GET
                                    ) ?>" class="
                                w-8
                                h-8
                                border
                                border-slate-200
                                rounded-lg
                                hover:bg-slate-100
                                transition-colors
                                flex
                                items-center
                                justify-center
                            ">
                            <?= $totalPages ?>
                        </a>

                    <?php endif; ?>


                    <!-- Next -->
                    <?php if ($current < $totalPages): ?>

                        <a href="<?= buildPaymentPaginationUrl(
                                        $current + 1,
                                        $_GET
                                    ) ?>" class="
                                w-8
                                h-8
                                border
                                border-slate-200
                                rounded-lg
                                hover:bg-slate-100
                                transition-colors
                                flex
                                items-center
                                justify-center
                            " title="Next page">
                            <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                        </a>

                    <?php else: ?>

                        <span class="
                                w-8
                                h-8
                                border
                                border-slate-200
                                rounded-lg
                                opacity-50
                                pointer-events-none
                                flex
                                items-center
                                justify-center
                            ">
                            <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                        </span>

                    <?php endif; ?>

                </div>

            </div>

        <?php endif; ?>

    </div>

</div>


<?php

/**
 * Build payment pagination URL
 * while preserving active filters.
 */
function buildPaymentPaginationUrl(
    int $page,
    array $query
): string {

    $query['page'] = $page;

    $query = array_filter(
        $query,
        function ($value) {
            return $value !== ''
                && $value !== null;
        }
    );

    return BASE_URL
        . '/admin/payments?'
        . http_build_query($query);
}

?>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

    });


    /**
     * Submit payment filters.
     *
     * Reset pagination to page 1 whenever
     * the filter form is submitted.
     */
    function submitPaymentFilters(form) {

        const pageInput = form.querySelector(
            'input[name="page"]'
        );

        if (pageInput) {
            pageInput.remove();
        }

        return true;
    }
</script>