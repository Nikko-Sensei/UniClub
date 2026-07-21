<?php

$security = $setting ?? [];

?>

<div class="space-y-8">


    <!-- HEADER -->

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">


        <div>

            <p class="text-sm font-semibold text-blue-600">
                Security Management
            </p>


            <h1 class="text-2xl font-bold text-slate-800">
                Security Settings
            </h1>


            <p class="text-sm text-slate-500 mt-1">
                Manage authentication, password rules, login protection and system security
            </p>

        </div>


    </div>





    <form method="POST" action="<?= BASE_URL ?>/admin/settings/security/update" class="space-y-6">







        <!-- AUTHENTICATION -->

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">


            <div class="flex items-center gap-4 mb-6">


                <div class="w-12 h-12 rounded-xl
                            bg-blue-50
                            flex items-center justify-center
                            text-blue-600">

                    <i data-lucide="shield-check" class="w-6 h-6">
                    </i>

                </div>



                <div>

                    <h2 class="text-lg font-bold text-slate-800">
                        Authentication
                    </h2>


                    <p class="text-sm text-slate-500">
                        Control user registration and account recovery
                    </p>

                </div>


            </div>





            <div class="space-y-5">



                <!-- Registration -->

                <div class="flex items-center justify-between">


                    <div>

                        <p class="font-medium text-slate-700">
                            Registration
                        </p>


                        <p class="text-sm text-slate-500">
                            Allow new users to create accounts
                        </p>

                    </div>



                    <label class="relative inline-flex items-center cursor-pointer">


                        <input type="checkbox" name="allow_registration" class="sr-only peer" <?= ($security['allow_registration'] ?? 0)
                                   ? 'checked'
                                   : ''
                               ?>>


                        <div class="
                            w-11 h-6
                            bg-slate-200
                            rounded-full
                            peer
                            peer-checked:bg-blue-600
                            after:absolute
                            after:top-[2px]
                            after:left-[2px]
                            after:bg-white
                            after:border
                            after:rounded-full
                            after:h-5
                            after:w-5
                            after:transition-all
                            peer-checked:after:translate-x-full">
                        </div>


                    </label>


                </div>







                <!-- Password Reset -->

                <div class="flex items-center justify-between">


                    <div>

                        <p class="font-medium text-slate-700">
                            Password Reset
                        </p>


                        <p class="text-sm text-slate-500">
                            Allow users to reset forgotten passwords
                        </p>

                    </div>



                    <label class="relative inline-flex items-center cursor-pointer">


                        <input type="checkbox" name="enable_password_reset" class="sr-only peer" <?= ($security['enable_password_reset'] ?? 0)
                                   ? 'checked'
                                   : ''
                               ?>>


                        <div class="
                            w-11 h-6
                            bg-slate-200
                            rounded-full
                            peer
                            peer-checked:bg-blue-600
                            after:absolute
                            after:top-[2px]
                            after:left-[2px]
                            after:bg-white
                            after:border
                            after:rounded-full
                            after:h-5
                            after:w-5
                            after:transition-all
                            peer-checked:after:translate-x-full">
                        </div>


                    </label>


                </div>


            </div>


        </div>









        <!-- PASSWORD POLICY -->

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">


            <div class="flex items-center gap-4 mb-6">


                <div class="w-12 h-12 rounded-xl
                            bg-blue-50
                            flex items-center justify-center
                            text-blue-600">

                    <i data-lucide="key-round" class="w-6 h-6">
                    </i>

                </div>



                <div>

                    <h2 class="text-lg font-bold text-slate-800">
                        Password Policy
                    </h2>


                    <p class="text-sm text-slate-500">
                        Define password strength requirements
                    </p>

                </div>


            </div>





            <div class="grid md:grid-cols-3 gap-5">



                <div>


                    <label class="text-sm font-medium text-slate-700">
                        Minimum Length
                    </label>


                    <input type="number" name="password_min_length" value="<?= $security['password_min_length'] ?? 8 ?>"
                        class="mt-2 w-full rounded-xl border-slate-200 focus:ring-blue-500">


                </div>





                <div class="flex items-center justify-between
                            border rounded-xl px-4 py-3">


                    <span class="text-sm text-slate-700">
                        Uppercase
                    </span>


                    <input type="checkbox" name="require_uppercase" class="w-5 h-5 accent-blue-600" <?= ($security['require_uppercase'] ?? 0)
                               ? 'checked'
                               : ''
                           ?>>


                </div>






                <div class="flex items-center justify-between
                            border rounded-xl px-4 py-3">


                    <span class="text-sm text-slate-700">
                        Number
                    </span>


                    <input type="checkbox" name="require_number" class="w-5 h-5 accent-blue-600" <?= ($security['require_number'] ?? 0)
                               ? 'checked'
                               : ''
                           ?>>


                </div>



            </div>


        </div>









        <!-- LOGIN PROTECTION -->


        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">


            <div class="flex items-center gap-4 mb-6">


                <div class="w-12 h-12 rounded-xl
                            bg-blue-50
                            flex items-center justify-center
                            text-blue-600">


                    <i data-lucide="lock-keyhole" class="w-6 h-6">
                    </i>


                </div>



                <div>

                    <h2 class="text-lg font-bold text-slate-800">
                        Login Protection
                    </h2>


                    <p class="text-sm text-slate-500">
                        Prevent brute-force login attacks
                    </p>

                </div>


            </div>





            <div class="grid md:grid-cols-2 gap-5">


                <div>


                    <label class="text-sm font-medium text-slate-700">
                        Maximum Attempts
                    </label>


                    <input type="number" name="max_login_attempts" value="<?= $security['max_login_attempts'] ?? 5 ?>"
                        class="mt-2 w-full rounded-xl border-slate-200">


                </div>





                <div>


                    <label class="text-sm font-medium text-slate-700">
                        Lock Time (minutes)
                    </label>


                    <input type="number" name="lock_time_minutes" value="<?= $security['lock_time_minutes'] ?? 15 ?>"
                        class="mt-2 w-full rounded-xl border-slate-200">


                </div>


            </div>


        </div>









        <!-- AUDIT MONITORING -->


        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">


            <div class="flex items-center justify-between">


                <div class="flex items-center gap-4">


                    <div class="w-12 h-12 rounded-xl
                                bg-blue-50
                                flex items-center justify-center
                                text-blue-600">


                        <i data-lucide="file-clock" class="w-6 h-6">
                        </i>


                    </div>



                    <div>

                        <h2 class="text-lg font-bold text-slate-800">
                            Audit Monitoring
                        </h2>


                        <p class="text-sm text-slate-500">
                            Record important system activities
                        </p>

                    </div>


                </div>





                <input type="checkbox" name="enable_audit_log" class="w-5 h-5 accent-blue-600" <?= ($security['enable_audit_log'] ?? 0)
                           ? 'checked'
                           : ''
                       ?>>


            </div>


        </div>









        <!-- SYSTEM MAINTENANCE -->


        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">


            <div class="flex items-center justify-between">


                <div class="flex items-center gap-4">


                    <div class="w-12 h-12 rounded-xl
                                bg-blue-50
                                flex items-center justify-center
                                text-blue-600">


                        <i data-lucide="wrench" class="w-6 h-6">
                        </i>


                    </div>



                    <div>

                        <h2 class="text-lg font-bold text-slate-800">
                            System Maintenance
                        </h2>


                        <p class="text-sm text-slate-500">
                            Disable public access during maintenance
                        </p>

                    </div>


                </div>





                <input type="checkbox" name="maintenance_mode" class="w-5 h-5 accent-blue-600" <?= ($security['maintenance_mode'] ?? 0)
                           ? 'checked'
                           : ''
                       ?>>


            </div>


        </div>









        <!-- SAVE BUTTON -->


        <div class="flex justify-end">


            <button type="submit" class="inline-flex items-center gap-2
                           px-6 py-3
                           rounded-xl
                           bg-blue-600
                           hover:bg-blue-700
                           text-white
                           font-semibold
                           shadow-sm
                           transition">


                <i data-lucide="save" class="w-5 h-5">
                </i>


                Save Security Settings


            </button>


        </div>



    </form>


</div>