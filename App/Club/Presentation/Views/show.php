<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Club Details
            </h1>

            <p class="text-sm text-slate-500">
                View club information
            </p>
        </div>


        <div class="flex items-center gap-3">

            <!-- Back Button -->
            <a href="<?= BASE_URL ?>/admin/clubs"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 transition">

                <i data-lucide="arrow-left" class="w-4 h-4"></i>

                Back

            </a>


            <!-- Edit Button -->
            <a href="<?= BASE_URL ?>/admin/clubs/<?= $club->getId() ?>/edit"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">

                <i data-lucide="square-pen" class="w-4 h-4"></i>

                Edit Club

            </a>

        </div>

    </div>


    <div class="bg-white rounded-xl shadow-sm border overflow-hidden">


        <div class="h-48 bg-slate-100">

            <?php if ($club->getBanner()): ?>

            <img src="<?= BASE_URL ?>/uploads/clubs/<?= $club->getBanner() ?>" class="w-full h-full object-cover">

            <?php endif; ?>

        </div>


        <div class="p-6">


            <div class="flex items-center gap-5">


                <div class="w-24 h-24 rounded-xl bg-blue-100 flex items-center justify-center overflow-hidden">


                    <?php if ($club->getLogo()): ?>

                    <img src="<?= BASE_URL ?>/uploads/clubs/<?= $club->getLogo() ?>" class="w-full h-full object-cover">

                    <?php else: ?>

                    <span class="text-2xl font-bold text-blue-700">

                        <?= strtoupper(
                                substr(
                                    $club->getName(),
                                    0,
                                    2
                                )
                            ) ?>

                    </span>

                    <?php endif; ?>


                </div>


                <div>

                    <h2 class="text-xl font-bold text-slate-800">

                        <?= htmlspecialchars(
                            $club->getName()
                        ) ?>

                    </h2>


                    <p class="text-sm text-slate-500">

                        <?= htmlspecialchars(
                            $club->getShortName() ?? ''
                        ) ?>

                    </p>


                    <span class="inline-block mt-2 px-3 py-1 rounded-full text-xs bg-green-100 text-green-700">

                        <?= $club->getStatus() ?>

                    </span>


                </div>


            </div>


        </div>


    </div>



    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


        <div class="bg-white rounded-xl shadow-sm border p-6">


            <h3 class="font-semibold text-slate-800 mb-4">

                Contact Information

            </h3>


            <div class="space-y-3 text-sm">


                <p>
                    <span class="text-slate-500">
                        Email:
                    </span>

                    <?= htmlspecialchars(
                        $club->getEmail() ?? '-'
                    ) ?>
                </p>


                <p>
                    <span class="text-slate-500">
                        Phone:
                    </span>

                    <?= htmlspecialchars(
                        $club->getPhone() ?? '-'
                    ) ?>
                </p>


                <p>
                    <span class="text-slate-500">
                        Established:
                    </span>

                    <?= $club->getEstablishedDate() ?? '-' ?>

                </p>


                <p>
                    <span class="text-slate-500">
                        Member Limit:
                    </span>

                    <?= $club->getMemberLimit() ?? '-' ?>

                </p>


            </div>


        </div>



        <div class="bg-white rounded-xl shadow-sm border p-6">


            <h3 class="font-semibold text-slate-800 mb-4">

                Description

            </h3>


            <p class="text-sm text-slate-600 leading-relaxed">

                <?= nl2br(
                    htmlspecialchars(
                        $club->getDescription() ?? ''
                    )
                ) ?>

            </p>


        </div>


    </div>



    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


        <div class="bg-white rounded-xl shadow-sm border p-6">


            <h3 class="font-semibold text-slate-800 mb-4">

                Mission

            </h3>


            <p class="text-sm text-slate-600">

                <?= nl2br(
                    htmlspecialchars(
                        $club->getMission() ?? ''
                    )
                ) ?>

            </p>


        </div>



        <div class="bg-white rounded-xl shadow-sm border p-6">


            <h3 class="font-semibold text-slate-800 mb-4">

                Vision

            </h3>


            <p class="text-sm text-slate-600">

                <?= nl2br(
                    htmlspecialchars(
                        $club->getVision() ?? ''
                    )
                ) ?>

            </p>


        </div>


    </div>


</div>