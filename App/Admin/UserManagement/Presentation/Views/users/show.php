<div class="space-y-6">


    <!-- Header Card -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">


        <!-- Top Profile Section -->
        <div class="p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-6">


            <div class="flex items-center gap-5">


                <!-- Profile Image -->

                <?php if ($user->getProfileImage()): ?>

                    <img src="<?= BASE_URL ?>/uploads/profile/<?= $user->getProfileImage() ?>"
                        class="w-24 h-24 rounded-full object-cover border-4 border-white shadow">


                <?php else: ?>

                    <div class="w-24 h-24 rounded-full bg-gradient-to-br from-blue-100 to-blue-200
                    flex items-center justify-center text-blue-700 text-2xl font-bold shadow">

                        <?php
                        $name = trim($user->getName());
                        $words = preg_split('/\s+/', $name);

                        if (count($words) >= 2) {
                            $initials = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
                        } else {
                            $initials = strtoupper(substr($words[0], 0, 1));
                        }

                        echo htmlspecialchars($initials);
                        ?>

                    </div>

                <?php endif; ?>


                <!-- User Basic Info -->

                <div>


                    <h1 class="text-2xl font-bold text-slate-800">

                        <?= $user->getName() ?>

                    </h1>


                    <p class="text-slate-500 mt-1">

                        <?= $user->getEmail() ?>

                    </p>



                    <div class="flex flex-wrap gap-2 mt-3">


                        <!-- Role -->

                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                        bg-blue-50 text-blue-600">

                            <?= $user->getRoleName() ?>

                        </span>



                        <!-- Status -->

                        <?php if ($user->getStatus() === 'active'): ?>

                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                            bg-green-50 text-green-600">

                                Active

                            </span>

                        <?php else: ?>

                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                            bg-red-50 text-red-600">

                                <?= $user->getStatus() ?>

                            </span>

                        <?php endif; ?>


                    </div>


                </div>


            </div>



            <!-- Actions -->

            <div class="flex gap-3">


                <a href="<?= BASE_URL ?>/admin/users" class="px-4 py-2 rounded-lg border border-slate-200
                text-slate-600 hover:bg-slate-50 transition">

                    <i class="fa-solid fa-arrow-left mr-2"></i>

                    Back

                </a>



                <a href="<?= BASE_URL ?>/admin/users/<?= $user->getId() ?>/edit" class="px-4 py-2 rounded-lg bg-blue-600 text-white
                hover:bg-blue-700 transition">

                    <i class="fa-solid fa-pen mr-2"></i>

                    Edit

                </a>


            </div>


        </div>


    </div>





    <!-- Information Card -->

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">


        <h2 class="text-lg font-semibold text-slate-800 mb-6">

            User Information

        </h2>



        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">


            <!-- Student ID -->

            <div>

                <p class="text-sm text-slate-500">
                    Student ID
                </p>

                <p class="mt-1 font-semibold text-slate-800">

                    <?= $user->getStudentId() ?? '-' ?>

                </p>

            </div>




            <!-- Phone Number -->

            <div>

                <p class="text-sm text-slate-500">
                    Phone Number
                </p>

                <p class="mt-1 font-semibold text-slate-800">

                    <?= $user->getPhone() ?? '-' ?>

                </p>

            </div>




            <!-- Role -->

            <div>

                <p class="text-sm text-slate-500">
                    Role
                </p>

                <p class="mt-1 font-semibold text-slate-800">

                    <?= $user->getRoleName() ?>

                </p>

            </div>




            <!-- Department -->

            <div>

                <p class="text-sm text-slate-500">
                    Department
                </p>

                <p class="mt-1 font-semibold text-slate-800">

                    <?= $user->getDepartmentName() ?? '-' ?>

                </p>

            </div>




            <!-- Academic Year -->

            <div>

                <p class="text-sm text-slate-500">
                    Academic Year
                </p>

                <p class="mt-1 font-semibold text-slate-800">

                    <?= $user->getAcademicYearName() ?? '-' ?>

                </p>

            </div>




            <!-- Status -->

            <div>

                <p class="text-sm text-slate-500">
                    Account Status
                </p>


                <p class="mt-1 font-semibold text-slate-800">

                    <?= $user->getStatus() ?>

                </p>

            </div>


        </div>


    </div>



    <!-- Security / Activity Card -->

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">


        <h2 class="text-lg font-semibold text-slate-800 mb-6">

            Account Activity

        </h2>



        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">


            <div>

                <p class="text-sm text-slate-500">
                    Last Login
                </p>


                <p class="mt-1 font-semibold text-slate-800">

                    <?= $user->getLastLoginAt() ?? 'Never login' ?>

                </p>


            </div>



            <div>

                <p class="text-sm text-slate-500">
                    Created Date
                </p>


                <p class="mt-1 font-semibold text-slate-800">

                    <?= $user->getCreatedAt() ?? '-' ?>

                </p>


            </div>


        </div>


    </div>


</div>