<div class="max-w-7xl mx-auto">


    <div class="bg-white rounded-2xl shadow border border-slate-200 p-6">


        <div class="flex items-center justify-between mb-6">


            <div>

                <h2 class="text-xl font-bold text-slate-800">
                    Payment Accounts
                </h2>

                <p class="text-sm text-slate-500">
                    Manage club payment accounts
                </p>

            </div>



            <a href="<?= BASE_URL ?>/admin/payment-accounts/create"
                class="px-5 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700">

                Add Account

            </a>


        </div>





        <div class="overflow-x-auto">


            <table class="w-full text-sm">


                <thead>

                    <tr class="border-b bg-slate-50">


                        <th class="text-left px-4 py-3">
                            Method
                        </th>


                        <th class="text-left px-4 py-3">
                            Account Name
                        </th>


                        <th class="text-left px-4 py-3">
                            Account Number
                        </th>


                        <th class="text-left px-4 py-3">
                            Status
                        </th>


                        <th class="text-center px-4 py-3">
                            Action
                        </th>


                    </tr>

                </thead>




                <tbody>


                    <?php foreach($accounts as $account): ?>


                    <tr class="border-b">


                        <td class="px-4 py-3 font-semibold">

                            <?= $account->getPaymentMethod() ?>

                        </td>




                        <td class="px-4 py-3">

                            <?= $account->getAccountName() ?>

                        </td>




                        <td class="px-4 py-3">

                            <?= $account->getAccountNumber() ?? '-' ?>

                        </td>




                        <td class="px-4 py-3">


                            <?php if($account->getStatus() === 'active'): ?>


                            <span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-700">

                                Active

                            </span>


                            <?php else: ?>


                            <span class="px-3 py-1 rounded-full text-xs bg-red-100 text-red-700">

                                Inactive

                            </span>


                            <?php endif; ?>


                        </td>




                        <td class="px-4 py-3 text-center">


                            <a href="<?= BASE_URL ?>/admin/payment-accounts/<?= $account->getId() ?>/edit"
                                class="text-blue-600 hover:underline mr-3">

                                Edit

                            </a>



                            <form method="POST"
                                action="<?= BASE_URL ?>/admin/payment-accounts/<?= $account->getId() ?>/delete"
                                class="inline">


                                <button type="submit" onclick="return confirm('Delete this account?')"
                                    class="text-red-600 hover:underline">

                                    Delete

                                </button>


                            </form>


                        </td>



                    </tr>



                    <?php endforeach; ?>



                </tbody>


            </table>


        </div>


    </div>


</div>