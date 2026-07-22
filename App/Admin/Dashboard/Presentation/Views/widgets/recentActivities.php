<div
    class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl p-5 transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50 h-fit">


    <!-- HEADER -->

    <div class="flex items-center justify-between mb-4">


        <div class="flex items-center gap-3">

            <div class="w-9 h-9 rounded-lg 
                        bg-emerald-50 
                        text-emerald-600 
                        flex items-center justify-center 
                        shadow-sm">

                <i data-lucide="shield-check" class="w-4.5 h-4.5"></i>

            </div>


            <div>

                <h3 class="font-semibold text-slate-800">
                    Recent Activities
                </h3>


                <p class="text-xs text-slate-400">
                    Latest system actions
                </p>

            </div>

        </div>



        <a href="<?= BASE_URL ?>/admin/audit-logs"
            class="text-xs font-medium text-blue-600 hover:text-blue-700 transition flex items-center gap-1 group">


            View All


            <i data-lucide="arrow-right" class="w-3 h-3 transition-transform group-hover:translate-x-1">
            </i>


        </a>


    </div>





    <?php if (empty($dashboard->recentActivities)): ?>


        <div class="flex flex-col items-center justify-center py-8 text-center">


            <div class="w-12 h-12 rounded-full bg-slate-100 
                        text-slate-400 
                        flex items-center justify-center mb-3">


                <i data-lucide="activity" class="w-6 h-6"></i>


            </div>


            <p class="text-sm font-medium text-slate-600">
                No activities yet
            </p>


            <p class="text-xs text-slate-400">
                System actions will appear here
            </p>


        </div>



    <?php else: ?>



        <div class="space-y-3">


            <?php foreach ($dashboard->recentActivities as $activity): ?>


                <div class="flex items-start gap-3 p-3 rounded-xl 
                   bg-white/50 
                   backdrop-blur-sm 
                   border border-slate-100/60 
                   hover:border-blue-200/50 
                   transition group">



                    <!-- USER PROFILE -->

                    <div class="w-9 h-9 rounded-full overflow-hidden 
    flex items-center justify-center
    bg-gradient-to-br from-blue-100 to-blue-200
    text-blue-700
    font-semibold
    text-xs
    shadow-sm
    flex-shrink-0">


                        <?php if (!empty($activity['profile_image'])): ?>


                            <img src="<?= BASE_URL ?>/uploads/profile/<?= htmlspecialchars($activity['profile_image']) ?>"
                                alt="<?= htmlspecialchars($activity['user_name'] ?? 'User') ?>" class="w-full h-full object-cover">


                        <?php else: ?>


                            <?php

                            $name =
                                trim(
                                    $activity['user_name'] ?? 'System'
                                );


                            $words =
                                preg_split(
                                    '/\s+/',
                                    $name
                                );


                            if (count($words) >= 2) {

                                $initials =
                                    strtoupper(
                                        substr($words[0], 0, 1)
                                            .
                                            substr($words[1], 0, 1)
                                    );
                            } else {

                                $initials =
                                    strtoupper(
                                        substr($words[0], 0, 1)
                                    );
                            }


                            echo htmlspecialchars($initials);

                            ?>


                        <?php endif; ?>


                    </div>




                    <!-- CONTENT -->

                    <div class="flex-1 min-w-0">


                        <p class="text-sm font-medium text-slate-800
                          group-hover:text-blue-700 transition">


                            <?= htmlspecialchars(
                                $activity['action']
                            ) ?>


                        </p>



                        <p class="text-xs text-slate-500 mt-1">


                            <?= htmlspecialchars(
                                $activity['entity'] ?? 'System'
                            ) ?>


                            <?php if (!empty($activity['user_name'])): ?>

                                by

                                <?= htmlspecialchars(
                                    $activity['user_name']
                                ) ?>


                            <?php endif; ?>


                        </p>




                        <p class="text-xs text-slate-400 mt-1 flex items-center gap-1">


                            <i data-lucide="clock" class="w-3 h-3"></i>


                            <?= htmlspecialchars(
                                $activity['created_at']
                            ) ?>


                        </p>


                    </div>





                    <!-- ACTION BADGE -->


                    <?php

                    $badge = match ($activity['action']) {


                        'LOGIN_SUCCESS'
                        => 'bg-emerald-50 text-emerald-600',


                        'LOGIN_FAILED'
                        => 'bg-red-50 text-red-600',


                        'CREATE_CLUB',
                        'CREATE_EVENT'
                        => 'bg-blue-50 text-blue-600',


                        'UPDATE_CLUB'
                        => 'bg-amber-50 text-amber-600',


                        'DELETE_CLUB'
                        => 'bg-red-50 text-red-600',


                        default
                        => 'bg-slate-100 text-slate-600'
                    };

                    ?>


                    <span class="text-xs font-medium 
                       <?= $badge ?>
                       px-2.5 py-1 
                       rounded-full 
                       flex-shrink-0">


                        <?= str_replace(
                            '_',
                            ' ',
                            ucfirst(
                                strtolower(
                                    $activity['action']
                                )
                            )
                        ) ?>


                    </span>



                </div>



            <?php endforeach; ?>


        </div>


    <?php endif; ?>


</div>