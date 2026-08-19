<div class="space-y-6">

    <!-- ========================================================== -->
    <!-- BACK BUTTON – Glass with slide-in                         -->
    <!-- ========================================================== -->
    <div class="animate-slideInLeft">
        <a href="<?= BASE_URL ?>/admin/clubs/<?= $clubId ?>"
            class="back-btn inline-flex items-center gap-2 px-4 py-2.5 rounded-xl glass-card-light text-slate-700 font-medium text-sm shadow-sm transition-all duration-300 hover:shadow-md hover:scale-[1.02] hover:border-blue-200 group">
            <i data-lucide="arrow-left"
                class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1"></i>
            <span>Back to Events</span>
        </a>
    </div>


    <!-- HEADER -->

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">


        <div>

            <h1 class="text-2xl font-bold text-slate-800">
                Manage Members
            </h1>


            <p class="text-sm text-slate-500">
                Manage club members and assign roles
            </p>

        </div>


    </div>





    <!-- FILTER BAR -->

    <form method="GET" class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">


        <div class="flex flex-col lg:flex-row gap-3">



            <!-- SEARCH -->

            <div class="flex-1">

                <div class="
        flex
        items-center
        gap-3
        w-full
        px-4
        py-2.5
        rounded-xl
        border
        border-slate-200
        bg-white
        focus-within:ring-2
        focus-within:ring-blue-500/30
        focus-within:border-blue-400
        transition
    ">

                    <i data-lucide="search" class="w-4 h-4 text-slate-400 flex-shrink-0">
                    </i>

                    <input type="text" name="search" value="<?= htmlspecialchars($filters['search'] ?? '') ?>"
                        placeholder="Search members..." onkeyup="this.form.submit()" class="
                flex-1
                bg-transparent
                text-sm
                text-slate-700
                placeholder:text-slate-400
                outline-none
                border-0
                focus:ring-0
            ">

                </div>

            </div>





            <!-- ROLE FILTER -->


            <select name="role_id" onchange="this.form.submit()"
                class="px-4 py-3 rounded-xl border border-slate-200 text-sm">


                <option value="">
                    All Roles
                </option>



                <?php foreach ($roles as $role): ?>


                    <option value="<?= $role['id'] ?>" <?= ($filters['role_id'] ?? '') == $role['id']
                                                            ? 'selected'
                                                            : ''
                                                        ?>>


                        <?= htmlspecialchars(
                            $role['name']
                        ) ?>


                    </option>


                <?php endforeach; ?>


            </select>





            <!-- STATUS FILTER -->


            <select name="status" onchange="this.form.submit()"
                class="px-4 py-3 rounded-xl border border-slate-200 text-sm">


                <option value="">
                    All Status
                </option>



                <option value="approved" <?= ($filters['status'] ?? '') == 'approved'
                                                ? 'selected'
                                                : ''
                                            ?>>

                    Approved

                </option>



                <option value="pending" <?= ($filters['status'] ?? '') == 'pending'
                                            ? 'selected'
                                            : ''
                                        ?>>

                    Pending

                </option>


            </select>



        </div>


    </form>







    <!-- MEMBER TABLE -->


    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">


        <div class="overflow-x-auto">


            <table class="w-full text-sm">


                <thead class="bg-slate-50">


                    <tr class="text-left text-xs uppercase text-slate-500">


                        <th class="px-6 py-4">
                            Member
                        </th>

                        <th class="px-6 py-4">
                            Member ID
                        </th>


                        <th class="px-6 py-4">
                            Current Role
                        </th>


                        <th class="px-6 py-4">
                            Status
                        </th>


                        <th class="px-6 py-4">
                            Joined
                        </th>


                        <th class="px-6 py-4 text-center">
                            Action
                        </th>


                    </tr>


                </thead>





                <tbody class="divide-y divide-slate-100">



                    <?php if (empty($members)): ?>


                        <tr>


                            <td colspan="5" class="px-6 py-12 text-center text-slate-500">


                                No members found.


                            </td>


                        </tr>


                    <?php endif; ?>





                    <?php foreach ($members as $member): ?>


                        <tr class="hover:bg-slate-50">



                            <!-- MEMBER -->


                            <td class="px-6 py-4">


                                <div class="flex items-center gap-3">

                                    <!-- Profile Image -->
                                    <div class="
                                w-10 h-10
                                rounded-full
                                overflow-hidden
                                flex
                                items-center
                                justify-center
                                bg-gradient-to-br
                                from-blue-100
                                to-blue-200
                                text-blue-700
                                font-semibold
                                text-xs
                                shadow-sm
                                flex-shrink-0
                            ">

                                        <?php if (!empty($member['profile_image'])): ?>

                                            <img src="<?= BASE_URL ?>/uploads/profile/<?= htmlspecialchars($member['profile_image']) ?>"
                                                alt="<?= htmlspecialchars($member['name']) ?>"
                                                class="w-full h-full object-cover">

                                        <?php else: ?>

                                            <?php
                                            $name = trim($member['name'] ?? '');

                                            $words = preg_split('/\s+/', $name);

                                            if (count($words) >= 2) {
                                                $initials = strtoupper(
                                                    substr($words[0], 0, 1) .
                                                        substr($words[1], 0, 1)
                                                );
                                            } else {
                                                $initials = strtoupper(
                                                    substr($words[0] ?? '?', 0, 1)
                                                );
                                            }
                                            ?>

                                            <?= htmlspecialchars($initials) ?>

                                        <?php endif; ?>

                                    </div>


                                    <!-- Student Information -->
                                    <div class="min-w-0">

                                        <p class="
                                    font-semibold
                                    text-slate-800
                                    truncate
                                ">

                                            <?= htmlspecialchars($member['name']) ?>

                                        </p>

                                        <p class="
                                        text-xs
                                        text-slate-500
                                        truncate
                                    ">

                                            <?= htmlspecialchars($member['email']) ?>

                                        </p>

                                    </div>

                                </div>


                            </td>


                            <!-- Student ID -->

                            <td class="px-6 py-4">

                                <span class="
                            inline-flex
                            items-center
                            px-3
                            py-1
                            rounded-lg
                            bg-blue-50
                            text-blue-600
                            text-xs
                            font-semibold
                            whitespace-nowrap
                        ">

                                    <?= htmlspecialchars(
                                        $member['student_id'] ?? '-'
                                    ) ?>

                                </span>

                            </td>


                            <!-- ROLE -->


                            <td class="px-6 py-4">


                                <span class="px-3 py-1 rounded-full bg-blue-50 text-blue-600 text-xs font-semibold">


                                    <?= htmlspecialchars(
                                        $member['role']
                                    ) ?>


                                </span>


                            </td>





                            <!-- STATUS -->


                            <td class="px-6 py-4">


                                <span class="px-3 py-1 rounded-full 
                                <?= $member['status'] == 'approved'
                                    ? 'bg-green-50 text-green-600'
                                    : 'bg-yellow-50 text-yellow-600'
                                ?>
                                text-xs font-semibold">


                                    <?= ucfirst(
                                        $member['status']
                                    ) ?>


                                </span>


                            </td>





                            <!-- JOIN DATE -->


                            <td class="px-6 py-4 text-slate-500">


                                <?= date(
                                    'M d, Y',
                                    strtotime(
                                        $member['joined_at']
                                    )
                                ) ?>


                            </td>





                            <!-- ACTION -->


                            <td class="px-6 py-4">


                                <div class="flex gap-2">


                                    <a href="<?= BASE_URL ?>/admin/memberships/<?= $member['id'] ?>/edit-role"
                                        class="px-3 py-2 rounded-lg bg-blue-600 text-white text-xs">


                                        Change Role


                                    </a>



                                    <form method="POST"
                                        action="<?= BASE_URL ?>/admin/memberships/<?= $member['id'] ?>/remove">


                                        <input type="hidden" name="club_id" value="<?= $clubId ?>">



                                        <button class="px-3 py-2 rounded-lg bg-red-50 text-red-600 text-xs">


                                            Remove


                                        </button>


                                    </form>


                                </div>


                            </td>



                        </tr>


                    <?php endforeach; ?>



                </tbody>


            </table>


        </div>


    </div>




    <!-- PAGINATION -->

    <?php if (
        isset($pagination)
        && $pagination['total_pages'] > 1
    ): ?>


        <div class="flex justify-center mt-6">


            <div class="flex items-center gap-2">


                <?php

                $totalPages =
                    $pagination['total_pages'];

                $current =
                    $pagination['current_page'];

                $range = 2;


                $start =
                    max(
                        1,
                        $current - $range
                    );


                $end =
                    min(
                        $totalPages,
                        $current + $range
                    );

                ?>



                <!-- PREVIOUS -->

                <?php if ($current > 1): ?>


                    <a href="<?= buildMemberPaginationUrl(
                                    $current - 1,
                                    $_GET,
                                    $clubId
                                ) ?>" class="w-8 h-8 border border-slate-200 rounded-lg
            hover:bg-slate-100 transition-colors
            flex items-center justify-center">


                        <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i>


                    </a>


                <?php else: ?>


                    <span class="w-8 h-8 border border-slate-200 rounded-lg
            opacity-50 pointer-events-none
            flex items-center justify-center">


                        <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i>


                    </span>


                <?php endif; ?>





                <!-- FIRST PAGE -->

                <?php if ($start > 1): ?>


                    <a href="<?= buildMemberPaginationUrl(
                                    1,
                                    $_GET,
                                    $clubId
                                ) ?>" class="w-8 h-8 border border-slate-200 rounded-lg
            hover:bg-slate-100 transition-colors
            flex items-center justify-center">

                        1

                    </a>


                    <?php if ($start > 2): ?>


                        <span class="px-1">
                            ...
                        </span>


                    <?php endif; ?>


                <?php endif; ?>






                <!-- PAGE NUMBERS -->

                <?php for (
                    $i = $start;
                    $i <= $end;
                    $i++
                ): ?>


                    <?php if ($i == $current): ?>


                        <span class="w-8 h-8 bg-blue-600 text-white rounded-lg
                text-xs font-medium
                flex items-center justify-center">

                            <?= $i ?>

                        </span>


                    <?php else: ?>


                        <a href="<?= buildMemberPaginationUrl(
                                        $i,
                                        $_GET,
                                        $clubId
                                    ) ?>" class="w-8 h-8 border border-slate-200 rounded-lg
                hover:bg-slate-100 transition-colors
                flex items-center justify-center">

                            <?= $i ?>

                        </a>


                    <?php endif; ?>


                <?php endfor; ?>







                <!-- LAST PAGE -->


                <?php if ($end < $totalPages): ?>


                    <?php if ($end < $totalPages - 1): ?>

                        <span class="px-1">
                            ...
                        </span>

                    <?php endif; ?>



                    <a href="<?= buildMemberPaginationUrl(
                                    $totalPages,
                                    $_GET,
                                    $clubId
                                ) ?>" class="w-8 h-8 border border-slate-200 rounded-lg
                hover:bg-slate-100 transition-colors
                flex items-center justify-center">

                        <?= $totalPages ?>

                    </a>


                <?php endif; ?>








                <!-- NEXT -->

                <?php if ($current < $totalPages): ?>


                    <a href="<?= buildMemberPaginationUrl(
                                    $current + 1,
                                    $_GET,
                                    $clubId
                                ) ?>" class="w-8 h-8 border border-slate-200 rounded-lg
            hover:bg-slate-100 transition-colors
            flex items-center justify-center">


                        <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>


                    </a>


                <?php else: ?>


                    <span class="w-8 h-8 border border-slate-200 rounded-lg
            opacity-50 pointer-events-none
            flex items-center justify-center">


                        <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>


                    </span>


                <?php endif; ?>


            </div>


        </div>


    <?php endif; ?>





    <?php

    /**
     * Build member pagination URL
     * Preserve:
     * - search
     * - role_id
     * - status
     * - page
     */

    function buildMemberPaginationUrl(
        int $page,
        array $query,
        int $clubId
    ): string {


        $query['page'] = $page;



        $query = array_filter(
            $query,
            function ($value) {

                return $value !== ''
                    && $value !== null;
            }
        );



        return BASE_URL
            . '/admin/clubs/'
            . $clubId
            . '/members?'
            . http_build_query($query);
    }

    ?>





</div>