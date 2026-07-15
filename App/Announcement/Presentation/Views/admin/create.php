<div class="space-y-8">


    <!-- Header -->
    <div>


        <h1 class="text-3xl font-bold text-slate-800">
            Create Announcement
        </h1>


        <p class="text-slate-500 mt-2">
            Create a new announcement for students.
        </p>


    </div>




    <!-- Form Card -->
    <div class="
        bg-white
        rounded-2xl
        border
        border-slate-200
        shadow-sm
        p-6
    ">


        <form action="/admin/announcements/store" method="POST" class="space-y-6">


            <!-- Club -->
            <div>


                <label class="
                    block
                    text-sm
                    font-semibold
                    text-slate-700
                    mb-2
                ">

                    Club

                </label>


                <select name="club_id" class="
                        w-full
                        rounded-xl
                        border-slate-300
                        focus:border-blue-500
                        focus:ring-blue-500
                    " required>

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




            <!-- Title -->
            <div>


                <label class="
                    block
                    text-sm
                    font-semibold
                    text-slate-700
                    mb-2
                ">

                    Title

                </label>


                <input type="text" name="title" placeholder="Announcement title" class="
                        w-full
                        rounded-xl
                        border-slate-300
                        focus:border-blue-500
                        focus:ring-blue-500
                    " required>


            </div>




            <!-- Content -->
            <div>


                <label class="
                    block
                    text-sm
                    font-semibold
                    text-slate-700
                    mb-2
                ">

                    Content

                </label>


                <textarea name="content" rows="6" placeholder="Write announcement content..." class="
                        w-full
                        rounded-xl
                        border-slate-300
                        focus:border-blue-500
                        focus:ring-blue-500
                    " required></textarea>


            </div>




            <!-- Priority + Status -->
            <div class="
                grid
                grid-cols-1
                md:grid-cols-2
                gap-6
            ">


                <!-- Priority -->
                <div>


                    <label class="
                        block
                        text-sm
                        font-semibold
                        text-slate-700
                        mb-2
                    ">

                        Priority

                    </label>


                    <select name="priority" class="
                            w-full
                            rounded-xl
                            border-slate-300
                        ">

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




                <!-- Status -->
                <div>


                    <label class="
                        block
                        text-sm
                        font-semibold
                        text-slate-700
                        mb-2
                    ">

                        Status

                    </label>


                    <select name="status" class="
                            w-full
                            rounded-xl
                            border-slate-300
                        ">

                        <option value="draft">
                            Draft
                        </option>


                        <option value="published">
                            Published
                        </option>


                    </select>


                </div>


            </div>





            <!-- Image -->
            <div>


                <label class="
                    block
                    text-sm
                    font-semibold
                    text-slate-700
                    mb-2
                ">

                    Image URL

                </label>


                <input type="text" name="image" placeholder="announcement-image.jpg" class="
                        w-full
                        rounded-xl
                        border-slate-300
                    ">


            </div>




            <!-- Actions -->
            <div class="
                flex
                flex-col
                sm:flex-row
                gap-3
                pt-4
            ">


                <button type="submit" class="
                        px-6
                        py-3
                        rounded-xl
                        bg-blue-600
                        text-white
                        font-semibold
                        hover:bg-blue-700
                        transition
                    ">

                    Create Announcement

                </button>



                <a href="/admin/announcements" class="
                        px-6
                        py-3
                        rounded-xl
                        bg-slate-100
                        text-slate-700
                        font-semibold
                        text-center
                    ">

                    Cancel

                </a>


            </div>


        </form>


    </div>


</div>