<div class="max-w-3xl mx-auto">


    <div class="bg-white rounded-2xl shadow border p-8">


        <h2 class="text-xl font-bold text-slate-800 mb-6">

            Create Payment Account

        </h2>




        <form method="POST" action="<?= BASE_URL ?>/admin/payment-accounts/store" enctype="multipart/form-data">





            <div class="mb-5">


                <label class="block mb-2 font-semibold">

                    Payment Method

                </label>


                <select name="payment_method" required class="w-full border rounded-xl px-4 py-3">


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


            </div>







            <div class="mb-5">


                <label class="block mb-2 font-semibold">

                    Account Name

                </label>


                <input type="text" name="account_name" required class="w-full border rounded-xl px-4 py-3">


            </div>







            <div class="mb-5">


                <label class="block mb-2 font-semibold">

                    Account Number

                </label>


                <input type="text" name="account_number" class="w-full border rounded-xl px-4 py-3">


            </div>







            <div class="mb-5">


                <label class="block mb-2 font-semibold">

                    QR Code Image

                </label>


                <input type="file" name="qr_image" accept="image/*" class="w-full border rounded-xl px-4 py-3">



                <p class="text-sm text-slate-500 mt-2">

                    Upload KBZ Pay / Wave Money QR image

                </p>


            </div>







            <div class="mb-5">


                <label class="block mb-2 font-semibold">

                    Description

                </label>


                <textarea name="description" rows="4" class="w-full border rounded-xl px-4 py-3"></textarea>


            </div>







            <div class="mb-5">


                <label class="block mb-2 font-semibold">

                    Status

                </label>


                <select name="status" class="w-full border rounded-xl px-4 py-3">


                    <option value="active">

                        Active

                    </option>


                    <option value="inactive">

                        Inactive

                    </option>


                </select>


            </div>







            <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700">


                Save


            </button>




        </form>


    </div>


</div>