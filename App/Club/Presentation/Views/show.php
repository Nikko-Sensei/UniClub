<div class="space-y-8">


    <!-- HERO HEADER -->

    <div class="relative rounded-2xl overflow-hidden shadow-sm border">


        <!-- Banner -->

        <div class="h-72 bg-slate-200">


            <?php if ($club->getBanner()): ?>

            <img src="<?= BASE_URL ?>/uploads/clubs/<?= $club->getBanner() ?>" class="w-full h-full object-cover"
                alt="<?= htmlspecialchars($club->getName()) ?>">


            <?php else: ?>

            <div class="w-full h-full flex items-center justify-center text-slate-400">

                <i data-lucide="image" class="w-12 h-12">
                </i>

            </div>


            <?php endif; ?>


        </div>



        <!-- Overlay -->

        <div class="absolute inset-0 bg-gradient-to-r 
                from-slate-900/80 
                via-slate-900/40 
                to-transparent">
        </div>




        <!-- Content -->

        <div class="absolute inset-0 flex flex-col justify-end p-8 text-white">


            <!-- Category -->

            <span class="w-fit mb-3 px-3 py-1 rounded-full 
                     bg-blue-600 text-xs font-semibold">

                <?= htmlspecialchars(
                    $club->getCategoryName()
                ) ?>


            </span>



            <!-- Name -->

            <h1 class="text-3xl md:text-4xl font-bold">

                <?= htmlspecialchars(
                    $club->getName()
                ) ?>

            </h1>



            <!-- Short name + status -->

            <p class="mt-2 text-slate-200 text-sm">

                <?= htmlspecialchars(
                    $club->getShortName() ?? ''
                ) ?>


                <span class="mx-2">
                    •
                </span>


                <?= htmlspecialchars(
                    ucfirst($club->getStatus())
                ) ?>


            </p>



        </div>


    </div>



    <!-- ACTION BUTTONS -->

    <div class="flex flex-wrap gap-3">


        <a href="<?= BASE_URL ?>/admin/clubs"
            class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50">

            <i data-lucide="arrow-left" class="w-4 h-4"></i>

            Back

        </a>


        <a href="<?= BASE_URL ?>/admin/clubs/<?= $club->getId() ?>/edit"
            class="inline-flex items-center gap-2 px-5 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700">

            <i data-lucide="square-pen" class="w-4 h-4"></i>

            Edit Club

        </a>


        <a href="<?= BASE_URL ?>/admin/clubs/<?= $club->getId() ?>/members"
            class="inline-flex items-center gap-2 px-5 py-2 rounded-xl bg-slate-800 text-white hover:bg-slate-900">

            <i data-lucide="users" class="w-4 h-4"></i>

            Manage Members

        </a>


    </div>





    <!-- TABS -->

    <!-- <div class="bg-white rounded-xl border shadow-sm p-2 flex gap-2">


        <button class="px-4 py-2 rounded-lg bg-blue-50 text-blue-600 font-semibold text-sm">

            Overview

        </button>


        <a href="#members" class="px-4 py-2 rounded-lg text-slate-600 hover:bg-slate-50 text-sm">

            Members

        </a>


        <a href="#events" class="px-4 py-2 rounded-lg text-slate-600 hover:bg-slate-50 text-sm">

            Events

        </a>


        <a href="#settings" class="px-4 py-2 rounded-lg text-slate-600 hover:bg-slate-50 text-sm">

            Settings

        </a>


    </div> -->





    <!-- STATISTICS -->

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">


        <div class="bg-white border rounded-xl p-5">

            <p class="text-sm text-slate-500">
                Total Members
            </p>

            <h3 class="text-2xl font-bold text-slate-800 mt-2">
                <?= $club->getMemberCount() ?>
            </h3>

        </div>



        <div class="bg-white border rounded-xl p-5">

            <p class="text-sm text-slate-500">
                Leadership
            </p>

            <h3 class="text-2xl font-bold text-slate-800 mt-2">
                <?= count($leadership ?? []) ?>
            </h3>

        </div>



        <div class="bg-white border rounded-xl p-5">

            <p class="text-sm text-slate-500">
                Events
            </p>

            <h3 class="text-2xl font-bold text-slate-800 mt-2">
                <?= count($events ?? []) ?>
            </h3>

        </div>



        <div class="bg-white border rounded-xl p-5">

            <p class="text-sm text-slate-500">
                Created Date
            </p>

            <h3 class="text-sm font-bold text-slate-800 mt-3">

                <?= $club->getCreatedAt() ?>

            </h3>

        </div>


    </div>





    <!-- CLUB INFORMATION -->

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">


        <div class="bg-white border rounded-xl p-6">


            <h2 class="font-bold text-slate-800 mb-4">

                Club Information

            </h2>


            <p class="text-sm text-slate-600 leading-relaxed">

                <?= nl2br(
                    htmlspecialchars(
                        $club->getDescription() ?? ''
                    )
                ) ?>

            </p>


        </div>



        <div class="bg-white border rounded-xl p-6">


            <h2 class="font-bold text-slate-800 mb-4">

                Contact Information

            </h2>


            <div class="space-y-3 text-sm">


                <p>Email:
                    <?= htmlspecialchars($club->getEmail() ?? '-') ?>
                </p>


                <p>Phone:
                    <?= htmlspecialchars($club->getPhone() ?? '-') ?>
                </p>


                <p>Limit:
                    <?= $club->getMemberLimit() ?>
                </p>


            </div>


        </div>


    </div>





    <!-- MISSION VISION -->

    <div class="grid md:grid-cols-2 gap-6">


        <div class="bg-white border rounded-xl p-6">

            <h3 class="font-bold mb-3">
                Mission
            </h3>

            <p class="text-sm text-slate-600">
                <?= nl2br(htmlspecialchars($club->getMission() ?? '')) ?>
            </p>

        </div>



        <div class="bg-white border rounded-xl p-6">

            <h3 class="font-bold mb-3">
                Vision
            </h3>

            <p class="text-sm text-slate-600">
                <?= nl2br(htmlspecialchars($club->getVision() ?? '')) ?>
            </p>

        </div>


    </div>





    <!-- LEADERSHIP TEAM -->

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">


        <div class="flex items-center gap-3 mb-6">


            <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">

                <i data-lucide="crown" class="w-5 h-5">
                </i>

            </div>


            <div>

                <h2 class="font-bold text-slate-800">

                    Leadership Team

                </h2>


                <p class="text-sm text-slate-500">

                    Club management committee

                </p>

            </div>


        </div>





        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">


            <?php if (!empty($leadership)): ?>


            <?php foreach ($leadership as $leader): ?>


            <div class="border border-slate-200 rounded-xl p-5">


                <div class="flex items-center gap-4">


                    <!-- Avatar -->

                    <div class="w-12 h-12 rounded-full bg-blue-100 
                            text-blue-600 flex items-center 
                            justify-center font-bold">


                        <?= strtoupper(
                                    substr(
                                        $leader['name'],
                                        0,
                                        1
                                    )
                                ) ?>


                    </div>




                    <div>


                        <p class="text-xs uppercase text-slate-400 font-semibold">

                            <?= htmlspecialchars(
                                        $leader['role']
                                    ) ?>


                        </p>


                        <h3 class="font-semibold text-slate-800 mt-1">

                            <?= htmlspecialchars(
                                        $leader['name']
                                    ) ?>


                        </h3>


                    </div>


                </div>


            </div>


            <?php endforeach; ?>


            <?php else: ?>


            <div class="md:col-span-3 text-center py-8 text-slate-500">


                No leadership assigned yet.


            </div>


            <?php endif; ?>


        </div>


    </div>

    <!-- RECENT MEMBERS -->

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

        <!-- Header -->

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 p-6 border-b border-slate-100">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">

                    <i data-lucide="users" class="w-5 h-5"></i>

                </div>

                <div>

                    <h2 class="font-bold text-slate-800">
                        Recent Members
                    </h2>

                    <p class="text-sm text-slate-500">
                        View members and manage club roles
                    </p>

                </div>

            </div>

            <a href="<?= BASE_URL ?>/admin/clubs/<?= $club->getId() ?>/members"
                class="inline-flex items-center gap-1.5 text-sm text-blue-600 font-semibold hover:text-blue-700 transition">

                View All

                <i data-lucide="arrow-right" class="w-4 h-4"></i>

            </a>

        </div>


        <!-- Table -->

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-slate-50">

                    <tr class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wide">

                        <th class="px-6 py-3">
                            Member
                        </th>

                        <th class="px-6 py-3">
                            Current Role
                        </th>

                        <th class="px-6 py-3">
                            Status
                        </th>

                        <th class="px-6 py-3">
                            Joined
                        </th>

                        <th class="px-6 py-3 text-right">
                            Assign Role
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    <?php if (!empty($members)): ?>

                    <?php foreach (array_slice($members, 0, 5) as $member): ?>

                    <tr class="hover:bg-slate-50/70 transition">

                        <!-- Member -->

                        <td class="px-6 py-4">

                            <div class="flex items-center gap-3">

                                <div
                                    class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold flex-shrink-0">

                                    <?= strtoupper(
                                                substr(
                                                    $member['name'],
                                                    0,
                                                    1
                                                )
                                            ) ?>

                                </div>

                                <div>

                                    <p class="font-semibold text-slate-800">

                                        <?= htmlspecialchars(
                                                    $member['name']
                                                ) ?>

                                    </p>

                                    <p class="text-xs text-slate-500 mt-0.5">

                                        <?= htmlspecialchars(
                                                    $member['email']
                                                ) ?>

                                    </p>

                                </div>

                            </div>

                        </td>


                        <!-- Current Role -->

                        <td class="px-6 py-4">

                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full bg-blue-50 text-blue-600 text-xs font-semibold">

                                <?= htmlspecialchars(
                                            $member['role']
                                        ) ?>

                            </span>

                        </td>


                        <!-- Status -->

                        <td class="px-6 py-4">

                            <?php
                                    $statusClass = match ($member['status']) {
                                        'approved' => 'bg-green-50 text-green-700',
                                        'pending' => 'bg-amber-50 text-amber-700',
                                        'rejected' => 'bg-red-50 text-red-700',
                                        default => 'bg-slate-100 text-slate-600'
                                    };
                                    ?>

                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold <?= $statusClass ?>">

                                <?= ucfirst(
                                            htmlspecialchars(
                                                $member['status']
                                            )
                                        ) ?>

                            </span>

                        </td>


                        <!-- Joined -->

                        <td class="px-6 py-4 text-slate-500 whitespace-nowrap">

                            <?= !empty($member['joined_at'])
                                        ? date(
                                            'M d, Y',
                                            strtotime($member['joined_at'])
                                        )
                                        : '-'
                                    ?>

                        </td>


                        <!-- Assign Role -->

                        <td class="px-6 py-4">

                            <form method="POST" action="<?= BASE_URL ?>/admin/memberships/update-role"
                                class="flex items-center justify-end gap-2">

                                <input type="hidden" name="membership_id" value="<?= (int)$member['id'] ?>">

                                <input type="hidden" name="club_id" value="<?= (int)$club->getId() ?>">


                                <select name="role_id"
                                    class="min-w-36 px-3 py-2 rounded-lg border border-slate-200 bg-white text-sm text-slate-700 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition">

                                    <?php foreach ($roles as $role): ?>

                                    <option value="<?= (int)$role['id'] ?>" <?= (int)$member['club_role_id'] === (int)$role['id']
                                                                                            ? 'selected'
                                                                                            : ''
                                                                                        ?>>

                                        <?= htmlspecialchars(
                                                        $role['name']
                                                    ) ?>

                                    </option>

                                    <?php endforeach; ?>

                                </select>


                                <button type="submit"
                                    class="inline-flex items-center justify-center gap-1.5 px-3 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold transition">

                                    <i data-lucide="check" class="w-4 h-4"></i>

                                    Save

                                </button>

                            </form>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                    <?php else: ?>

                    <tr>

                        <td colspan="5" class="px-6 py-12 text-center">

                            <div
                                class="w-12 h-12 mx-auto rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mb-3">

                                <i data-lucide="users" class="w-6 h-6"></i>

                            </div>

                            <p class="font-semibold text-slate-700">
                                No members found
                            </p>

                            <p class="text-sm text-slate-500 mt-1">
                                This club does not have any members yet.
                            </p>

                        </td>

                    </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>




</div>