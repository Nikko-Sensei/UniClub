<div class="space-y-6">


    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">


        <div>

            <h1 class="text-2xl font-bold text-slate-800">
                Create New Event
            </h1>


            <p class="text-sm text-slate-500">
                Create a university event for clubs and students.
            </p>

        </div>



        <a href="<?= BASE_URL ?>/admin/events"
            class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-700 hover:bg-slate-50 transition">


            <i data-lucide="arrow-left" class="w-4 h-4"></i>

            Back

        </a>


    </div>





    <!-- Form Card -->

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">



        <form method="POST" action="<?= BASE_URL ?>/admin/events/store" enctype="multipart/form-data" class="space-y-8">





            <!-- Basic Information -->

            <div>


                <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider mb-4">
                    Basic Information
                </h2>



                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">



                    <!-- Title -->

                    <div class="md:col-span-2">

                        <label class="block text-sm text-slate-600 font-medium">
                            Event Title
                        </label>


                        <input type="text" name="title" required placeholder="e.g. Git and Open Source Training"
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition">

                    </div>




                    <!-- Club -->

                    <div>


                        <label class="block text-sm text-slate-600 font-medium">
                            Club
                        </label>


                        <select name="club_id" required
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50">

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






                    <!-- Category -->

                    <div>


                        <label class="block text-sm text-slate-600 font-medium">
                            Event Category
                        </label>


                        <select name="category_id" required
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50">


                            <option value="">
                                Select Category
                            </option>


                            <?php foreach($categories as $category): ?>


                            <option value="<?= $category['id'] ?>">

                                <?= htmlspecialchars($category['name']) ?>

                            </option>


                            <?php endforeach; ?>


                        </select>


                    </div>





                    <!-- Venue -->

                    <div>


                        <label class="block text-sm text-slate-600 font-medium">
                            Venue
                        </label>


                        <input type="text" name="venue" required placeholder="Computer Science Building"
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50">


                    </div>





                    <!-- Capacity -->

                    <div>


                        <label class="block text-sm text-slate-600 font-medium">
                            Capacity
                        </label>


                        <input type="number" name="capacity" min="1" required placeholder="100"
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50">


                    </div>


                </div>


            </div>









            <!-- Schedule Information -->

            <div>


                <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider mb-4">
                    Schedule Information
                </h2>



                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">



                    <div>

                        <label class="block text-sm text-slate-600 font-medium">
                            Event Date
                        </label>


                        <input type="date" name="event_date" required
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50">

                    </div>





                    <div>

                        <label class="block text-sm text-slate-600 font-medium">
                            Registration Deadline
                        </label>


                        <input type="datetime-local" name="registration_deadline" required
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50">

                    </div>





                    <div>

                        <label class="block text-sm text-slate-600 font-medium">
                            Start Time
                        </label>


                        <input type="time" name="start_time" required
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50">

                    </div>





                    <div>

                        <label class="block text-sm text-slate-600 font-medium">
                            End Time
                        </label>


                        <input type="time" name="end_time" required
                            class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-slate-50/50">

                    </div>


                </div>


            </div>








            <!-- Description -->

            <div>


                <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider mb-4">
                    Event Details
                </h2>



                <textarea name="description" rows="5" required placeholder="Describe the event..."
                    class="w-full px-4 py-3 rounded-lg border border-slate-300 bg-slate-50/50 focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500"></textarea>


            </div>








            <!-- Media -->

            <div>


                <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider mb-4">
                    Media
                </h2>



                <div>


                    <label class="block text-sm text-slate-600 font-medium">
                        Event Banner
                    </label>



                    <label
                        class="mt-2 flex flex-col items-center justify-center w-full px-4 py-8 border-2 border-dashed border-slate-300 rounded-lg bg-slate-50/50 cursor-pointer hover:bg-slate-100 transition">


                        <i data-lucide="image" class="w-8 h-8 text-slate-400">
                        </i>


                        <span class="mt-2 text-sm text-slate-500">
                            Click to upload banner
                        </span>


                        <span class="text-xs text-slate-400">
                            Recommended 1200px × 400px
                        </span>



                        <input type="file" name="banner" accept="image/*" class="hidden">


                    </label>


                </div>


            </div>








            <!-- Settings -->

            <div>


                <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wider mb-4">
                    Settings
                </h2>



                <div class="flex flex-wrap gap-6">


                    <label class="flex items-center gap-2 text-sm text-slate-700">


                        <input type="checkbox" name="certificate_enabled" value="1" class="w-4 h-4 text-blue-600">


                        Enable Certificate


                    </label>



                    <label class="flex items-center gap-2 text-sm text-slate-700">


                        <input type="radio" name="status" value="draft" checked>


                        Draft


                    </label>



                    <label class="flex items-center gap-2 text-sm text-slate-700">


                        <input type="radio" name="status" value="published">


                        Published


                    </label>


                </div>


            </div>








            <!-- Actions -->


            <div class="flex justify-end gap-3 pt-4 border-t border-slate-200">


                <a href="<?= BASE_URL ?>/admin/events"
                    class="px-5 py-2.5 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50">

                    Cancel

                </a>




                <button type="submit"
                    class="px-6 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 shadow-sm">


                    <i data-lucide="plus" class="w-4 h-4 inline mr-2">
                    </i>


                    Create Event


                </button>


            </div>




        </form>


    </div>


</div>