<div class="space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Edit Club
            </h1>

            <p class="text-slate-500">
                Update club information and settings.
            </p>
        </div>

        <a href="<?= BASE_URL ?>/admin/clubs"
            class="inline-flex items-center gap-2 px-4 py-2.5 border border-slate-200 rounded-lg text-sm text-slate-600 hover:bg-slate-50 transition">

            <i data-lucide="arrow-left" class="w-4 h-4"></i>

            Back

        </a>

    </div>



    <!-- Form Card -->

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">


        <div class="p-6">


            <form method="POST" action="<?= BASE_URL ?>/admin/clubs/<?= $club->getId() ?>/update"
                enctype="multipart/form-data" class="space-y-6">


                <!-- Basic Information -->

                <div>

                    <h2 class="text-sm font-semibold text-slate-700 mb-4">
                        Basic Information
                    </h2>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                        <!-- Category -->

                        <div>

                            <label class="text-sm text-slate-600">
                                Club Category
                            </label>


                            <select name="category_id"
                                class="w-full mt-1 px-3 py-2.5 rounded-lg border border-slate-200 bg-slate-50/50 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500">


                                <?php foreach ($categories as $category): ?>

                                <option value="<?= $category['id'] ?>"
                                    <?= $club->getCategoryId() == $category['id'] ? 'selected' : '' ?>>

                                    <?= htmlspecialchars($category['name']) ?>

                                </option>

                                <?php endforeach; ?>


                            </select>

                        </div>



                        <!-- Name -->

                        <div>

                            <label class="text-sm text-slate-600">
                                Club Name
                            </label>


                            <input type="text" name="name" value="<?= htmlspecialchars($club->getName()) ?>"
                                class="w-full mt-1 px-3 py-2.5 rounded-lg border border-slate-200 bg-slate-50/50 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500">


                        </div>



                        <!-- Short Name -->

                        <div>

                            <label class="text-sm text-slate-600">
                                Short Name
                            </label>


                            <input type="text" name="short_name"
                                value="<?= htmlspecialchars($club->getShortName() ?? '') ?>"
                                class="w-full mt-1 px-3 py-2.5 rounded-lg border border-slate-200 bg-slate-50/50">


                        </div>



                        <!-- Email -->

                        <div>

                            <label class="text-sm text-slate-600">
                                Email
                            </label>


                            <input type="email" name="email" value="<?= htmlspecialchars($club->getEmail() ?? '') ?>"
                                class="w-full mt-1 px-3 py-2.5 rounded-lg border border-slate-200 bg-slate-50/50">

                        </div>



                        <!-- Phone -->

                        <div>

                            <label class="text-sm text-slate-600">
                                Phone
                            </label>


                            <input type="text" name="phone" value="<?= htmlspecialchars($club->getPhone() ?? '') ?>"
                                class="w-full mt-1 px-3 py-2.5 rounded-lg border border-slate-200 bg-slate-50/50">

                        </div>



                        <!-- Date -->

                        <div>

                            <label class="text-sm text-slate-600">
                                Established Date
                            </label>


                            <input type="date" name="established_date" value="<?= $club->getEstablishedDate() ?? '' ?>"
                                class="w-full mt-1 px-3 py-2.5 rounded-lg border border-slate-200 bg-slate-50/50">

                        </div>



                        <!-- Member Limit -->

                        <div>

                            <label class="text-sm text-slate-600">
                                Member Limit
                            </label>


                            <input type="number" name="member_limit" value="<?= $club->getMemberLimit() ?? '' ?>"
                                class="w-full mt-1 px-3 py-2.5 rounded-lg border border-slate-200 bg-slate-50/50">

                        </div>



                        <!-- Status -->

                        <div>

                            <label class="text-sm text-slate-600">
                                Status
                            </label>


                            <select name="status"
                                class="w-full mt-1 px-3 py-2.5 rounded-lg border border-slate-200 bg-slate-50/50">


                                <option value="active" <?= $club->getStatus() == 'active' ? 'selected' : '' ?>>

                                    Active

                                </option>


                                <option value="inactive" <?= $club->getStatus() == 'inactive' ? 'selected' : '' ?>>

                                    Inactive

                                </option>


                            </select>


                        </div>


                    </div>

                </div>



                <!-- Images -->

                <div class="border-t border-slate-200 pt-6">


                    <h2 class="text-sm font-semibold text-slate-700 mb-4">
                        Club Media
                    </h2>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                        <div>

                            <label class="text-sm text-slate-600">
                                Club Logo
                            </label>


                            <input type="file" name="logo"
                                class="w-full mt-1 text-sm border border-slate-200 rounded-lg p-2">


                        </div>


                        <div>

                            <label class="text-sm text-slate-600">
                                Club Banner
                            </label>


                            <input type="file" name="banner"
                                class="w-full mt-1 text-sm border border-slate-200 rounded-lg p-2">


                        </div>


                    </div>


                </div>




                <!-- Description -->

                <div class="border-t border-slate-200 pt-6">


                    <h2 class="text-sm font-semibold text-slate-700 mb-4">
                        Club Details
                    </h2>


                    <div class="space-y-5">


                        <div>

                            <label class="text-sm text-slate-600">
                                Description
                            </label>


                            <textarea name="description" rows="4"
                                class="w-full mt-1 px-3 py-2.5 rounded-lg border border-slate-200 bg-slate-50/50"><?= htmlspecialchars($club->getDescription() ?? '') ?></textarea>


                        </div>


                        <div>

                            <label class="text-sm text-slate-600">
                                Mission
                            </label>


                            <textarea name="mission" rows="3"
                                class="w-full mt-1 px-3 py-2.5 rounded-lg border border-slate-200 bg-slate-50/50"><?= htmlspecialchars($club->getMission() ?? '') ?></textarea>


                        </div>



                        <div>

                            <label class="text-sm text-slate-600">
                                Vision
                            </label>


                            <textarea name="vision" rows="3"
                                class="w-full mt-1 px-3 py-2.5 rounded-lg border border-slate-200 bg-slate-50/50"><?= htmlspecialchars($club->getVision() ?? '') ?></textarea>


                        </div>


                    </div>


                </div>



                <!-- Actions -->


                <div class="flex justify-end gap-3 border-t border-slate-200 pt-5">


                    <a href="<?= BASE_URL ?>/admin/clubs"
                        class="px-5 py-2.5 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50">

                        Cancel

                    </a>



                    <button type="submit"
                        class="px-5 py-2.5 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">

                        Update Club

                    </button>


                </div>


            </form>


        </div>


    </div>


</div>