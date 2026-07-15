<div class="space-y-8">


    <!-- Header -->

    <div class="flex items-center justify-between gap-4">


        <div>


            <h1 class="text-3xl font-bold text-slate-800">

                Edit Announcement

            </h1>


            <p class="text-slate-500 mt-2">

                Update announcement information.

            </p>


        </div>



        <a href="<?= BASE_URL ?>/admin/announcements"
            class="inline-flex items-center gap-2 px-4 py-2.5 border border-slate-200 bg-white rounded-xl text-sm font-semibold text-slate-600">


            <i class="fa-solid fa-arrow-left"></i>

            Back


        </a>


    </div>





    <!-- Form -->

    <form method="POST" action="<?= BASE_URL ?>/admin/announcements/<?= $announcement->getId() ?>/update"
        class="space-y-6">



        <!-- Form Card -->

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8">


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">



                <!-- Title -->

                <div class="md:col-span-2">


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Announcement Title

                    </label>


                    <input type="text" name="title" value="<?= htmlspecialchars(
                            $announcement->getTitle()
                        ) ?>" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition">


                </div>





                <!-- Priority -->

                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Priority

                    </label>



                    <select name="priority"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none bg-white transition">


                        <option value="low" <?= $announcement->getPriority() === 'low'
                                ? 'selected'
                                : '' ?>>

                            Low

                        </option>



                        <option value="medium" <?= $announcement->getPriority() === 'medium'
                                ? 'selected'
                                : '' ?>>

                            Medium

                        </option>



                        <option value="high" <?= $announcement->getPriority() === 'high'
                                ? 'selected'
                                : '' ?>>

                            High

                        </option>


                    </select>


                </div>





                <!-- Status -->

                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Status

                    </label>



                    <select name="status"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none bg-white transition">


                        <option value="draft" <?= $announcement->getStatus() === 'draft'
                                ? 'selected'
                                : '' ?>>

                            Draft

                        </option>



                        <option value="published" <?= $announcement->getStatus() === 'published'
                                ? 'selected'
                                : '' ?>>

                            Published

                        </option>


                    </select>


                </div>





                <!-- Content -->

                <div class="md:col-span-2">


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Announcement Content

                    </label>


                    <textarea name="content" rows="7" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none resize-none transition"><?= htmlspecialchars(
                            $announcement->getContent()
                        ) ?></textarea>


                </div>


            </div>


        </div>





        <!-- Actions -->

        <div class="flex justify-end gap-3">


            <a href="<?= BASE_URL ?>/admin/announcements"
                class="px-6 py-3 rounded-xl border border-slate-200 text-slate-600 font-semibold hover:bg-slate-50 transition">

                Cancel

            </a>



            <button type="submit"
                class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold transition">


                <i class="fa-solid fa-floppy-disk mr-2"></i>

                Save Changes


            </button>


        </div>


    </form>


</div>