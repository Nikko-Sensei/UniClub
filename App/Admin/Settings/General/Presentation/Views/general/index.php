<div class="space-y-8">


    <!-- HEADER -->

    <div>

        <p class="text-sm font-semibold text-blue-600">
            System Settings
        </p>


        <h1 class="text-2xl font-bold text-slate-800">
            General Settings
        </h1>


        <p class="text-sm text-slate-500 mt-1">
            Manage application information and contact details
        </p>

    </div>





    <form method="POST" action="<?= BASE_URL ?>/admin/settings/general/update" class="space-y-6">





        <!-- APPLICATION INFORMATION -->

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">


            <div class="flex items-center gap-3 mb-6">


                <div class="w-10 h-10 rounded-xl bg-blue-50
                            flex items-center justify-center">

                    <i data-lucide="globe" class="w-5 h-5 text-blue-600">
                    </i>

                </div>


                <div>

                    <h2 class="font-semibold text-slate-800">
                        Application Information
                    </h2>


                    <p class="text-sm text-slate-500">
                        Basic system information
                    </p>

                </div>


            </div>





            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">



                <!-- Site Name -->

                <div>

                    <label class="text-sm font-medium text-slate-700">
                        Site Name
                    </label>


                    <input type="text" name="site_name" value="<?= $setting->getSiteName() ?>" class="mt-2 w-full rounded-lg border-slate-300
                               focus:ring-blue-500 focus:border-blue-500">


                </div>





                <!-- University -->

                <div>

                    <label class="text-sm font-medium text-slate-700">
                        University Name
                    </label>


                    <input type="text" name="university_name" value="<?= $setting->getUniversityName() ?>"
                        class="mt-2 w-full rounded-lg border-slate-300">


                </div>


            </div>


        </div>







        <!-- CONTACT INFORMATION -->


        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">


            <div class="flex items-center gap-3 mb-6">


                <div class="w-10 h-10 rounded-xl bg-blue-50
                            flex items-center justify-center">


                    <i data-lucide="contact" class="w-5 h-5 text-blue-600">
                    </i>


                </div>



                <div>

                    <h2 class="font-semibold text-slate-800">
                        Contact Information
                    </h2>


                    <p class="text-sm text-slate-500">
                        Public contact details
                    </p>

                </div>


            </div>





            <div class="space-y-5">



                <div>

                    <label class="text-sm font-medium text-slate-700">
                        Address
                    </label>


                    <textarea name="address" rows="3"
                        class="mt-2 w-full rounded-lg border-slate-300"><?= $setting->getAddress() ?></textarea>


                </div>





                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                    <div>

                        <label class="text-sm font-medium text-slate-700">
                            Email
                        </label>


                        <input type="email" name="email" value="<?= $setting->getEmail() ?>"
                            class="mt-2 w-full rounded-lg border-slate-300">


                    </div>




                    <div>

                        <label class="text-sm font-medium text-slate-700">
                            Phone
                        </label>


                        <input type="text" name="phone" value="<?= $setting->getPhone() ?>"
                            class="mt-2 w-full rounded-lg border-slate-300">


                    </div>


                </div>


            </div>


        </div>








        <!-- SYSTEM -->


        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">


            <div class="flex items-center gap-3 mb-6">


                <div class="w-10 h-10 rounded-xl bg-blue-50
                            flex items-center justify-center">

                    <i data-lucide="settings" class="w-5 h-5 text-blue-600">
                    </i>


                </div>



                <div>

                    <h2 class="font-semibold text-slate-800">
                        System Configuration
                    </h2>


                </div>


            </div>





            <label class="text-sm font-medium text-slate-700">

                Timezone

            </label>


            <select name="timezone" class="mt-2 w-full md:w-1/2 rounded-lg border-slate-300">


                <option value="Asia/Yangon" <?= $setting->getTimezone() === 'Asia/Yangon' ? 'selected' : '' ?>>

                    Asia/Yangon

                </option>


            </select>


        </div>







        <!-- ACTION -->


        <?php if($permission->can('settings.general.update')): ?>


        <div class="flex justify-end">


            <button type="submit" class="inline-flex items-center gap-2
                       px-6 py-2.5
                       bg-blue-600
                       hover:bg-blue-700
                       text-white
                       rounded-lg
                       font-medium
                       shadow-sm">


                <i data-lucide="save" class="w-4 h-4">
                </i>


                Save Changes


            </button>


        </div>


        <?php endif; ?>




    </form>



</div>