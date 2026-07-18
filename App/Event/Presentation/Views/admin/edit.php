<div class="space-y-8">


    <div class="flex items-center justify-between gap-4">


        <div>


            <h1 class="text-3xl font-bold text-slate-800">

                Edit Event

            </h1>


            <p class="text-slate-500 mt-2">

                Update event information.

            </p>


        </div>


        <a href="<?= BASE_URL ?>/admin/events"
            class="inline-flex items-center gap-2 px-4 py-2.5 border border-slate-200 bg-white rounded-xl text-sm font-semibold text-slate-600">

            <i class="fa-solid fa-arrow-left"></i>

            Back

        </a>


    </div>




    <form method="POST" enctype="multipart/form-data"
        action="<?= BASE_URL ?>/admin/events/<?= $event->getId() ?>/update" class="space-y-6">


        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8">


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                <div class="md:col-span-2">


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Event Title

                    </label>


                    <input type="text" name="title" value="<?= htmlspecialchars($event->getTitle()) ?>" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 outline-none">


                </div>




                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Club
                    </label>

                    <select name="club_id" required class="w-full px-4 py-3 rounded-xl border border-slate-200">

                        <option value="">
                            Select Club
                        </option>


                        <?php foreach ($clubs as $club): ?>

                        <option value="<?= $club->getId() ?>"
                            <?= $event->getClubId() == $club->getId() ? 'selected' : '' ?>>

                            <?= htmlspecialchars($club->getName()) ?>

                        </option>


                        <?php endforeach; ?>

                    </select>

                </div>




                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Category
                    </label>

                    <select name="category_id" required class="w-full px-4 py-3 rounded-xl border border-slate-200">

                        <option value="">
                            Select Category
                        </option>


                        <?php foreach ($categories as $category): ?>

                        <option value="<?= $category['id'] ?>"
                            <?= $event->getCategoryId() == $category['id'] ? 'selected' : '' ?>>

                            <?= htmlspecialchars($category['name']) ?>

                        </option>

                        <?php endforeach; ?>


                    </select>

                </div>




                <div class="md:col-span-2">


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Description

                    </label>


                    <textarea name="description" rows="5" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 resize-none"><?= htmlspecialchars($event->getDescription()) ?></textarea>


                </div>




                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Venue

                    </label>


                    <input type="text" name="venue" value="<?= htmlspecialchars($event->getVenue()) ?>" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200">


                </div>




                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Capacity

                    </label>


                    <input type="number" name="capacity" value="<?= $event->getCapacity() ?>" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200">


                </div>




                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Event Date

                    </label>


                    <input type="date" name="event_date" value="<?= htmlspecialchars($event->getEventDate()) ?>"
                        required class="w-full px-4 py-3 rounded-xl border border-slate-200">


                </div>




                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Registration Deadline

                    </label>


                    <input type="datetime-local" name="registration_deadline" value="<?= date(
                                                                                            'Y-m-d\TH:i',
                                                                                            strtotime($event->getRegistrationDeadline())
                                                                                        ) ?>" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200">


                </div>




                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Start Time

                    </label>


                    <input type="time" name="start_time" value="<?= htmlspecialchars($event->getStartTime()) ?>"
                        required class="w-full px-4 py-3 rounded-xl border border-slate-200">


                </div>




                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        End Time

                    </label>


                    <input type="time" name="end_time" value="<?= htmlspecialchars($event->getEndTime()) ?>" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200">


                </div>


                <!-- Banner -->
                <div class="md:col-span-2">

                    <label class="block text-sm font-semibold text-slate-700 mb-3">
                        Event Banner
                    </label>

                    <?php if ($event->getBanner()): ?>

                    <div class="mb-4">

                        <img src="<?= BASE_URL ?>/uploads/events/<?= htmlspecialchars($event->getBanner()) ?>"
                            id="bannerPreview"
                            class="w-full h-64 rounded-2xl border border-slate-200 object-cover shadow-sm">

                    </div>

                    <?php else: ?>

                    <div class="mb-4">

                        <img id="bannerPreview"
                            class="hidden w-full h-64 rounded-2xl border border-slate-200 object-cover shadow-sm">

                    </div>

                    <?php endif; ?>


                    <label
                        class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-slate-300 rounded-2xl cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition">

                        <i class="fa-solid fa-image text-4xl text-blue-500 mb-3"></i>

                        <span class="text-sm font-semibold text-slate-700">
                            Click to upload new banner
                        </span>

                        <span class="text-xs text-slate-400 mt-1">
                            JPG, PNG, WEBP (Max 5MB)
                        </span>

                        <input type="file" name="banner" accept="image/*" class="hidden"
                            onchange="previewBanner(event)">

                    </label>

                </div>

                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Status

                    </label>


                    <select name="status" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 outline-none">


                        <option value="draft" <?= $event->getStatus() === 'draft' ? 'selected' : '' ?>>

                            Draft

                        </option>


                        <option value="published" <?= $event->getStatus() === 'published' ? 'selected' : '' ?>>

                            Published

                        </option>


                        <option value="cancelled" <?= $event->getStatus() === 'cancelled' ? 'selected' : '' ?>>

                            Cancelled

                        </option>


                        <option value="completed" <?= $event->getStatus() === 'completed' ? 'selected' : '' ?>>

                            Completed

                        </option>


                    </select>

                </div>



            </div>


        </div>




        <div class="flex justify-end gap-3">


            <a href="<?= BASE_URL ?>/admin/events"
                class="px-6 py-3 rounded-xl border border-slate-200 text-slate-600 font-semibold">

                Cancel

            </a>


            <button type="submit" class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold">

                <i class="fa-solid fa-floppy-disk mr-2"></i>

                Save Changes

            </button>


        </div>


    </form>


</div>