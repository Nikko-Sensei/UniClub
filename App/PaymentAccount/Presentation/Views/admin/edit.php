<div class="max-w-3xl mx-auto">


    <div class="bg-white rounded-2xl shadow border border-slate-200 p-8">


        <div class="mb-6">


            <h2 class="text-xl font-bold text-slate-800">

                Edit Payment Account

            </h2>


            <p class="text-sm text-slate-500">

                Update payment account information

            </p>


        </div>





        <form method="POST" action="<?= BASE_URL ?>/admin/payment-accounts/<?= $account->getId() ?>/update"
            enctype="multipart/form-data">






            <div class="mb-5">


                <label class="block text-sm font-semibold text-slate-700 mb-2">

                    Payment Method

                </label>



                <select name="payment_method" required class="w-full rounded-xl border border-slate-300 px-4 py-3">


                    <option value="KBZ Pay" <?= $account->getPaymentMethod() === 'KBZ Pay' ? 'selected' : '' ?>>

                        KBZ Pay

                    </option>



                    <option value="Wave Money" <?= $account->getPaymentMethod() === 'Wave Money' ? 'selected' : '' ?>>

                        Wave Money

                    </option>



                    <option value="Cash" <?= $account->getPaymentMethod() === 'Cash' ? 'selected' : '' ?>>

                        Cash

                    </option>


                </select>


            </div>







            <div class="mb-5">


                <label class="block text-sm font-semibold text-slate-700 mb-2">

                    Account Name

                </label>



                <input type="text" name="account_name" value="<?= htmlspecialchars($account->getAccountName()) ?>"
                    required class="w-full rounded-xl border border-slate-300 px-4 py-3">


            </div>







            <div class="mb-5">


                <label class="block text-sm font-semibold text-slate-700 mb-2">

                    Account Number

                </label>



                <input type="text" name="account_number"
                    value="<?= htmlspecialchars($account->getAccountNumber() ?? '') ?>"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3">


            </div>








            <div class="mb-5">


                <label class="block text-sm font-semibold text-slate-700 mb-2">

                    QR Code Image

                </label>





                <?php if($account->getQrImage()): ?>


                <div class="mb-4">


                    <p class="text-sm text-slate-500 mb-2">

                        Current QR Code

                    </p>



                    <img src="<?= BASE_URL ?>/<?= $account->getQrImage() ?>"
                        class="w-32 h-32 rounded-xl border object-cover">


                </div>


                <?php endif; ?>






                <input type="file" name="qr_image" accept="image/*"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3">



                <p class="text-xs text-slate-500 mt-2">

                    Leave empty to keep the current QR image.

                </p>


            </div>








            <div class="mb-5">


                <label class="block text-sm font-semibold text-slate-700 mb-2">

                    Description

                </label>



                <textarea name="description" rows="4"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"><?= htmlspecialchars($account->getDescription() ?? '') ?></textarea>


            </div>








            <div class="mb-5">


                <label class="block text-sm font-semibold text-slate-700 mb-2">

                    Status

                </label>



                <select name="status" class="w-full rounded-xl border border-slate-300 px-4 py-3">



                    <option value="active" <?= $account->getStatus() === 'active' ? 'selected' : '' ?>>

                        Active

                    </option>




                    <option value="inactive" <?= $account->getStatus() === 'inactive' ? 'selected' : '' ?>>

                        Inactive

                    </option>



                </select>


            </div>








            <div class="flex gap-3">


                <button type="submit" class="px-6 py-3 rounded-xl bg-blue-600 text-white hover:bg-blue-700">


                    Update


                </button>






                <a href="<?= BASE_URL ?>/admin/payment-accounts"
                    class="px-6 py-3 rounded-xl bg-slate-200 text-slate-700">


                    Cancel


                </a>


            </div>




        </form>



    </div>


</div>