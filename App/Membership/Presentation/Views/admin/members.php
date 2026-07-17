<div class="space-y-6">


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



        <a href="<?= BASE_URL ?>/admin/clubs/<?= $clubId ?>"
            class="inline-flex items-center gap-2 px-4 py-2 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 transition">

            <i data-lucide="arrow-left" class="w-4 h-4"></i>

            Back to Club

        </a>


    </div>





    <!-- FILTER BAR -->

    <form method="GET" class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">


        <div class="flex flex-col lg:flex-row gap-3">



            <!-- SEARCH -->

            <div class="relative flex-1">


                <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400">
                </i>



                <input type="text" name="search" value="<?= htmlspecialchars($filters['search'] ?? '') ?>"
                    placeholder="Search members..." oninput="this.form.submit()"
                    class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 text-sm focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none">


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


                                <div
                                    class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">


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



                                    <p class="text-xs text-slate-500">


                                        <?= htmlspecialchars(
                                                $member['email']
                                            ) ?>


                                    </p>


                                </div>


                            </div>


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