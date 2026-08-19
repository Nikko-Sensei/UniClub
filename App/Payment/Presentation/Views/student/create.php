<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-2xl shadow-xl border border-slate-200 p-8">


        <div class="flex items-center gap-4 mb-6">


            <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">

                <i data-lucide="credit-card" class="w-6 h-6"></i>

            </div>



            <div>

                <h2 class="text-xl font-bold text-slate-800">
                    Membership Payment
                </h2>


                <p class="text-sm text-slate-500">
                    Submit your payment information
                </p>

            </div>


        </div>





        <form method="POST" action="<?= BASE_URL ?>/payments/store" enctype="multipart/form-data">


            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">



            <input type="hidden" name="club_id" value="<?= $clubId ?>">






            <!-- Amount -->

            <div class="mb-5">

                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Amount
                </label>

                <div class="relative">
                    <!-- Actual value submitted to PHP -->
                    <input type="hidden" name="amount" value="<?= htmlspecialchars($club->getMembershipFee()) ?>">

                    <!-- Display amount -->
                    <div
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 flex items-baseline justify-between">

                        <span class="text-2xl font-bold tracking-tight text-slate-800">
                            <?= number_format($club->getMembershipFee(), 0) ?>
                        </span>

                        <span class="text-sm font-bold text-blue-600">
                            MMK
                        </span>

                    </div>
                </div>

            </div>







            <!-- Payment Method -->

            <div class="mb-5">


                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Payment Method
                </label>



                <select id="payment_method" name="payment_method" required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3">

                    <option value="">
                        Select Method
                    </option>


                    <option value="KBZ Pay">
                        KBZ Pay
                    </option>


                    <option value="Wave Money">
                        Wave Money
                    </option>


                    <option value="Cash">
                        Cash
                    </option>


                </select>

                <p id="payment_method_error" class="text-sm text-red-500 mt-1"></p>

                <!-- Payment Account Information -->

                <div id="payment-account-card" class="hidden mb-6 rounded-xl border border-blue-200 bg-blue-50 p-5">

                    <h3 class="text-lg font-semibold text-blue-700 mb-4">
                        Payment Account Information
                    </h3>

                    <div class="space-y-3">

                        <div>
                            <span class="font-semibold">Account Name:</span>
                            <span id="account_name"></span>
                        </div>

                        <div>
                            <span class="font-semibold">Account Number:</span>
                            <span id="account_number"></span>
                        </div>

                        <div>
                            <span class="font-semibold">Description:</span>
                            <span id="description"></span>
                        </div>

                        <div id="qr-container" class="hidden">

                            <p class="font-semibold mb-2">
                                QR Code
                            </p>

                            <img id="qr_image" src="" class="w-48 rounded-lg border">

                        </div>

                    </div>

                </div>


            </div>








            <!-- Transaction Number -->

            <div class="mb-5">


                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Transaction Number
                </label>


                <input id="transaction_number" type="text" name="transaction_number"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3">
                <p id="transaction_number_error" class="text-sm text-red-500 mt-1"></p>

            </div>








            <!-- Receipt Image -->

            <div class="mb-5">


                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Receipt Image
                </label>



                <input id="receipt_image" type="file" name="receipt_image" accept="image/png,image/jpeg,image/jpg"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 bg-white">


                <p class="text-xs text-slate-500 mt-2">
                    Allowed formats: JPG, JPEG, PNG
                </p>

                <p id="receipt_image_error" class="text-sm text-red-500 mt-1"></p>


            </div>

            <div class="flex flex-col sm:flex-row gap-3 pt-2">

                <!-- Cancel -->
                <a href="<?= BASE_URL ?>/clubs/<?= $clubId ?>" class="flex-1 inline-flex items-center justify-center gap-2
               px-6 py-3 rounded-xl
               border border-slate-200
               bg-white
               text-slate-600
               font-semibold text-sm
               hover:bg-slate-50
               hover:border-slate-300
               hover:text-slate-800
               transition-all duration-200">

                    <i data-lucide="x" class="w-4 h-4"></i>

                    Cancel
                </a>


                <!-- Submit Payment -->
                <button type="submit" class="flex-1 inline-flex items-center justify-center gap-2
               px-6 py-3 rounded-xl
               bg-gradient-to-r from-blue-600 to-indigo-600
               hover:from-blue-700 hover:to-indigo-700
               text-white
               font-semibold text-sm
               shadow-md shadow-blue-200/50
               hover:shadow-lg
               hover:-translate-y-0.5
               transition-all duration-200">

                    <i data-lucide="send" class="w-4 h-4"></i>

                    Submit Payment

                </button>

            </div>



        </form>


    </div>


</div>

<script>
    const paymentAccounts = [

        <?php foreach ($paymentAccounts as $account): ?>

            {
                payment_method: "<?= htmlspecialchars($account->getPaymentMethod()) ?>",

                account_name: "<?= htmlspecialchars($account->getAccountName()) ?>",

                account_number: "<?= htmlspecialchars($account->getAccountNumber() ?? '') ?>",

                qr_image: "<?= htmlspecialchars($account->getQrImage() ?? '') ?>",

                description: "<?= htmlspecialchars($account->getDescription() ?? '') ?>"
            },

        <?php endforeach; ?>

    ];

    const paymentMethod =
        document.getElementById('payment_method');

    paymentMethod.addEventListener('change', function() {

        const method = this.value;

        const account =
            paymentAccounts.find(function(item) {

                return item.payment_method === method;

            });

        const card =
            document.getElementById(
                'payment-account-card'
            );

        if (!account) {

            card.classList.add('hidden');

            return;

        }

        card.classList.remove('hidden');

        document.getElementById(
                'account_name'
            ).textContent =
            account.account_name;

        document.getElementById(
                'account_number'
            ).textContent =
            account.account_number ?? '-';

        document.getElementById(
                'description'
            ).textContent =
            account.description ?? '-';

        if (account.qr_image) {

            document
                .getElementById(
                    'qr-container'
                )
                .classList
                .remove('hidden');

            document
                .getElementById(
                    'qr_image'
                )
                .src =
                "<?= BASE_URL ?>/" +
                account.qr_image;

        } else {

            document
                .getElementById(
                    'qr-container'
                )
                .classList
                .add('hidden');

        }

    });


    document
        .querySelector('form')
        .addEventListener(
            'submit',
            function(e) {


                let valid = true;


                let method =
                    document
                    .getElementById(
                        'payment_method'
                    )
                    .value;



                let transaction =
                    document
                    .getElementById(
                        'transaction_number'
                    )
                    .value;



                let receipt =
                    document
                    .getElementById(
                        'receipt_image'
                    )
                    .files.length;



                document
                    .getElementById(
                        'payment_method_error'
                    )
                    .innerHTML = '';

                document
                    .getElementById(
                        'transaction_number_error'
                    )
                    .innerHTML = '';

                document
                    .getElementById(
                        'receipt_image_error'
                    )
                    .innerHTML = '';



                if (method === '') {

                    document
                        .getElementById(
                            'payment_method_error'
                        )
                        .innerHTML =
                        'Please select payment method.';

                    valid = false;

                }




                if (
                    method === 'KBZ Pay' ||
                    method === 'Wave Money'
                ) {


                    if (transaction === '') {

                        document
                            .getElementById(
                                'transaction_number_error'
                            )
                            .innerHTML =
                            'Transaction number is required.';

                        valid = false;

                    }



                    if (receipt === 0) {

                        document
                            .getElementById(
                                'receipt_image_error'
                            )
                            .innerHTML =
                            'Receipt image is required.';

                        valid = false;

                    }

                }



                if (!valid) {

                    e.preventDefault();

                }


            }
        );
</script>