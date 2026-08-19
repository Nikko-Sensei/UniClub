<footer class="bg-slate-950 text-slate-400 mt-20">

    <!-- ========================================================= -->
    <!-- FOOTER ACCENT                                             -->
    <!-- ========================================================= -->

    <div class="h-px bg-gradient-to-r from-transparent via-blue-500/50 to-transparent"></div>


    <!-- ========================================================= -->
    <!-- MAIN FOOTER                                               -->
    <!-- ========================================================= -->

    <div class="max-w-7xl mx-auto px-4 md:px-6 py-14">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">


            <!-- ================================================= -->
            <!-- UNIVERSITY IDENTITY                              -->
            <!-- ================================================= -->

            <div class="lg:col-span-5">

                <!-- Brand -->
                <div class="flex items-center gap-3">


                    <div>

                        <h2 class="
                            text-xl
                            font-bold
                            tracking-tight
                            text-white
                        ">
                            <?= htmlspecialchars($setting->getSiteName()) ?>
                        </h2>

                        <p class="text-xs text-slate-500 mt-0.5">
                            University Club Management System
                        </p>

                    </div>

                </div>


                <!-- Main statement -->
                <p class="
                    mt-6
                    max-w-md
                    text-sm
                    leading-7
                    text-slate-400
                ">
                    Empowering students to discover communities,
                    participate in campus activities, and build meaningful
                    university experiences.
                </p>


                <!-- University identity card -->
                <div class="
                    mt-7
                    max-w-md
                    rounded-2xl
                    border
                    border-white/10
                    bg-white/[0.03]
                    p-4
                    flex
                    items-center
                    gap-4
                ">

                    <div class="
                        relative
                        w-12 h-12
                        rounded-2xl
                        bg-gradient-to-br
                        from-blue-600
                        to-indigo-600
                        flex items-center justify-center
                        overflow-hidden
                        shadow-lg
                        shadow-blue-900/30
                    ">

                        <?php if ($setting->getLogo()): ?>

                            <img src="<?= BASE_URL . '/' . $setting->getLogo() ?>"
                                alt="<?= htmlspecialchars($setting->getSiteName()) ?>"
                                class="w-full h-full object-contain p-1.5">

                        <?php else: ?>

                            <i data-lucide="graduation-cap" class="w-6 h-6 text-white"></i>

                        <?php endif; ?>

                    </div>


                    <div class="min-w-0">

                        <p class="
                            text-xs
                            uppercase
                            tracking-wider
                            text-slate-600
                            font-semibold
                        ">
                            University
                        </p>

                        <p class="
                            mt-1
                            text-sm
                            font-medium
                            text-slate-300
                            truncate
                        ">
                            <?= htmlspecialchars($setting->getUniversityName()) ?>
                        </p>

                    </div>

                </div>

            </div>



            <!-- ================================================= -->
            <!-- NAVIGATION                                        -->
            <!-- ================================================= -->

            <div class="lg:col-span-2">

                <p class="
                    text-[11px]
                    uppercase
                    tracking-[0.18em]
                    font-bold
                    text-slate-500
                    mb-5
                ">
                    Discover
                </p>


                <nav class="space-y-3">

                    <a href="<?= BASE_URL ?>/clubs" class="
                            group
                            flex items-center gap-2
                            text-sm
                            text-slate-400
                            hover:text-white
                            transition
                        ">
                        Clubs

                        <i data-lucide="arrow-up-right" class="
                                w-3.5 h-3.5
                                opacity-0
                                -translate-x-1
                                group-hover:opacity-100
                                group-hover:translate-x-0
                                transition-all
                            "></i>
                    </a>


                    <a href="<?= BASE_URL ?>/events" class="
                            group
                            flex items-center gap-2
                            text-sm
                            text-slate-400
                            hover:text-white
                            transition
                        ">
                        Events

                        <i data-lucide="arrow-up-right" class="
                                w-3.5 h-3.5
                                opacity-0
                                -translate-x-1
                                group-hover:opacity-100
                                group-hover:translate-x-0
                                transition-all
                            "></i>
                    </a>


                    <a href="<?= BASE_URL ?>/announcements" class="
                            group
                            flex items-center gap-2
                            text-sm
                            text-slate-400
                            hover:text-white
                            transition
                        ">
                        Announcements

                        <i data-lucide="arrow-up-right" class="
                                w-3.5 h-3.5
                                opacity-0
                                -translate-x-1
                                group-hover:opacity-100
                                group-hover:translate-x-0
                                transition-all
                            "></i>
                    </a>


                    <a href="<?= BASE_URL ?>/faq" class="
                            group
                            flex items-center gap-2
                            text-sm
                            text-slate-400
                            hover:text-white
                            transition
                        ">
                        FAQ

                        <i data-lucide="arrow-up-right" class="
                                w-3.5 h-3.5
                                opacity-0
                                -translate-x-1
                                group-hover:opacity-100
                                group-hover:translate-x-0
                                transition-all
                            "></i>
                    </a>

                </nav>

            </div>



            <!-- ================================================= -->
            <!-- STUDENT                                           -->
            <!-- ================================================= -->

            <div class="lg:col-span-2">

                <p class="
                    text-[11px]
                    uppercase
                    tracking-[0.18em]
                    font-bold
                    text-slate-500
                    mb-5
                ">
                    Student
                </p>


                <nav class="space-y-3">

                    <a href="<?= BASE_URL ?>/clubs" class="
                            group
                            flex items-center gap-2
                            text-sm
                            text-slate-400
                            hover:text-white
                            transition
                        ">
                        Join a Club

                        <i data-lucide="arrow-up-right" class="
                                w-3.5 h-3.5
                                opacity-0
                                -translate-x-1
                                group-hover:opacity-100
                                group-hover:translate-x-0
                                transition-all
                            "></i>
                    </a>


                    <a href="<?= BASE_URL ?>/events" class="
                            group
                            flex items-center gap-2
                            text-sm
                            text-slate-400
                            hover:text-white
                            transition
                        ">
                        Upcoming Events

                        <i data-lucide="arrow-up-right" class="
                                w-3.5 h-3.5
                                opacity-0
                                -translate-x-1
                                group-hover:opacity-100
                                group-hover:translate-x-0
                                transition-all
                            "></i>
                    </a>


                    <a href="<?= BASE_URL ?>/notifications" class="
                            group
                            flex items-center gap-2
                            text-sm
                            text-slate-400
                            hover:text-white
                            transition
                        ">
                        Notifications

                        <i data-lucide="arrow-up-right" class="
                                w-3.5 h-3.5
                                opacity-0
                                -translate-x-1
                                group-hover:opacity-100
                                group-hover:translate-x-0
                                transition-all
                            "></i>
                    </a>


                    <a href="<?= BASE_URL ?>/profile" class="
                            group
                            flex items-center gap-2
                            text-sm
                            text-slate-400
                            hover:text-white
                            transition
                        ">
                        My Profile

                        <i data-lucide="arrow-up-right" class="
                                w-3.5 h-3.5
                                opacity-0
                                -translate-x-1
                                group-hover:opacity-100
                                group-hover:translate-x-0
                                transition-all
                            "></i>
                    </a>

                </nav>

            </div>



            <!-- ================================================= -->
            <!-- SUPPORT / SYSTEM                                  -->
            <!-- ================================================= -->

            <div class="lg:col-span-3">

                <p class="
                    text-[11px]
                    uppercase
                    tracking-[0.18em]
                    font-bold
                    text-slate-500
                    mb-5
                ">
                    System
                </p>


                <!-- Support Card -->
                <div class="
                    rounded-2xl
                    border
                    border-white/10
                    bg-gradient-to-br
                    from-blue-500/[0.08]
                    to-indigo-500/[0.04]
                    p-5
                ">

                    <div class="flex items-center gap-3">

                        <div class="
                            w-9 h-9
                            rounded-xl
                            bg-blue-500/10
                            flex items-center justify-center
                        ">

                            <i data-lucide="life-buoy" class="w-4 h-4 text-blue-400"></i>

                        </div>


                        <div>

                            <p class="text-sm font-semibold text-white">
                                Need assistance?
                            </p>

                            <p class="text-xs text-slate-500 mt-0.5">
                                We're here to help.
                            </p>

                        </div>

                    </div>


                    <a href="<?= BASE_URL ?>/contact" class="
                            mt-4
                            flex
                            items-center
                            justify-between
                            rounded-xl
                            bg-white/[0.06]
                            border
                            border-white/10
                            px-4
                            py-3
                            text-sm
                            font-medium
                            text-slate-300
                            hover:bg-white/10
                            hover:text-white
                            transition
                        ">

                        <span>Visit Support Center</span>

                        <i data-lucide="arrow-right" class="w-4 h-4"></i>

                    </a>

                </div>

            </div>

        </div>



        <!-- ===================================================== -->
        <!-- FOOTER DIVIDER                                        -->
        <!-- ===================================================== -->

        <div class="border-t border-white/10 mt-12 pt-6">

            <div class="
                flex
                flex-col
                md:flex-row
                md:items-center
                md:justify-between
                gap-4
            ">


                <!-- Copyright -->
                <div class="
                    flex
                    items-center
                    gap-2
                    text-xs
                    text-slate-600
                ">

                    <span>
                        &copy; <?= date('Y') ?>
                        <?= htmlspecialchars($setting->getSiteName()) ?>
                    </span>

                    <span class="text-slate-800">
                        •
                    </span>

                    <span>
                        All rights reserved.
                    </span>

                </div>


                <!-- Legal -->
                <div class="
                    flex
                    items-center
                    gap-4
                    text-xs
                ">

                    <a href="<?= BASE_URL ?>/privacy" class="text-slate-600 hover:text-slate-300 transition">
                        Privacy
                    </a>

                    <a href="<?= BASE_URL ?>/terms" class="text-slate-600 hover:text-slate-300 transition">
                        Terms
                    </a>

                    <a href="<?= BASE_URL ?>/contact" class="text-slate-600 hover:text-slate-300 transition">
                        Support
                    </a>

                </div>

            </div>

        </div>

    </div>



    <!-- ========================================================= -->
    <!-- SYSTEM STATUS BAR                                        -->
    <!-- ========================================================= -->

    <div class="
        border-t
        border-white/[0.04]
        bg-black/20
    ">

        <div class="
            max-w-7xl
            mx-auto
            px-4 md:px-6
            py-3
            flex
            flex-col
            sm:flex-row
            items-center
            justify-between
            gap-2
        ">


            <!-- Status -->
            <div class="flex items-center gap-2">

                <span class="
                    relative
                    flex
                    w-2
                    h-2
                ">

                    <span class="
                        absolute
                        inline-flex
                        w-full
                        h-full
                        rounded-full
                        bg-emerald-400
                        opacity-50
                        animate-ping
                    "></span>

                    <span class="
                        relative
                        inline-flex
                        w-2
                        h-2
                        rounded-full
                        bg-emerald-400
                    "></span>

                </span>

                <span class="text-[11px] text-slate-600">
                    UniClub System Operational
                </span>

            </div>


            <!-- Tagline -->
            <p class="text-[11px] text-slate-700 text-center">
                Connecting students. Building communities. Enriching campus life.
            </p>

        </div>

    </div>

</footer>