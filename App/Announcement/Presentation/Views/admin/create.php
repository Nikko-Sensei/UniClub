<div class="space-y-8">


    <!-- Header -->

    <div class="flex items-center justify-between gap-4">


        <div>


            <h1 class="text-3xl font-bold text-slate-800">

                Create Announcement

            </h1>


            <p class="text-slate-500 mt-2">

                Create a new announcement for students.

            </p>


        </div>




        <a href="<?= BASE_URL ?>/admin/announcements"
            class="inline-flex items-center gap-2 px-4 py-2.5 border border-slate-200 bg-white rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-50">


            <i class="fa-solid fa-arrow-left"></i>


            Back


        </a>


    </div>







    <form action="<?= BASE_URL ?>/admin/announcements/store" method="POST" class="space-y-6">





        <!-- Form Card -->

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8">



            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">





                <!-- Club -->

                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Club

                    </label>



                    <select name="club_id" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 outline-none">


                        <option value="">

                            Select Club

                        </option>



                        <?php foreach($clubs as $club): ?>


                        <option value="<?= $club->getId() ?>">

                            <?= htmlspecialchars($club->getName()) ?>

                        </option>


                        <?php endforeach; ?>


                    </select>


                </div>








                <!-- Priority -->

                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Priority

                    </label>



                    <select name="priority" class="w-full px-4 py-3 rounded-xl border border-slate-200">


                        <option value="low">

                            Low

                        </option>


                        <option value="medium" selected>

                            Medium

                        </option>


                        <option value="high">

                            High

                        </option>


                    </select>


                </div>








                <!-- Title -->

                <div class="md:col-span-2">


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Announcement Title

                    </label>



                    <input type="text" name="title" placeholder="Enter announcement title" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 outline-none">


                </div>








                <!-- Content -->

                <div class="md:col-span-2">


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Content

                    </label>



                    <textarea name="content" rows="6" placeholder="Write announcement content..." required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 resize-none focus:border-blue-500 outline-none"></textarea>


                </div>








                <!-- Status -->

                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Status

                    </label>



                    <select name="status" class="w-full px-4 py-3 rounded-xl border border-slate-200">


                        <option value="draft">

                            Draft

                        </option>


                        <option value="published">

                            Published

                        </option>


                    </select>


                </div>








                <!-- Image -->

                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Image URL

                    </label>



                    <input type="text" name="image" placeholder="https://example.com/image.jpg"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200">


                </div>





            </div>


        </div>








        <!-- Actions -->

        <div class="flex justify-end gap-3">



            <a href="<?= BASE_URL ?>/admin/announcements"
                class="px-6 py-3 rounded-xl border border-slate-200 text-slate-600 font-semibold hover:bg-slate-50">


                Cancel


            </a>





            <button type="submit" class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold">


                <i class="fa-solid fa-bullhorn mr-2"></i>


                Create Announcement


            </button>



        </div>





    </form>


</div>