<div class="space-y-6">


    <!-- Header -->

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">


        <div>


            <h1 class="text-2xl font-bold text-slate-800">
                Announcement Management
            </h1>


            <p class="text-slate-500">
                Overview and administration of university announcements.
            </p>


        </div>




        <a href="<?= BASE_URL ?>/admin/announcements/create" class="
                inline-flex
                items-center
                gap-2
                px-4
                py-2.5
                bg-blue-600
                text-white
                rounded-lg
                hover:bg-blue-700
                transition
            ">


            <i data-lucide="plus" class="w-4 h-4"></i>

            Create Announcement


        </a>


    </div>





    <!-- Statistics Cards -->

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">


        <!-- Total -->

        <div class="
            bg-white
            rounded-xl
            border
            border-slate-200
            shadow-sm
            p-4
            flex
            items-center
            gap-3
        ">


            <div class="
                w-10
                h-10
                rounded-lg
                bg-blue-50
                text-blue-600
                flex
                items-center
                justify-center
            ">

                <i data-lucide="megaphone" class="w-5 h-5"></i>

            </div>



            <div>


                <p class="
                    text-[11px]
                    uppercase
                    tracking-wide
                    text-slate-400
                    font-medium
                ">

                    Total Announcements

                </p>


                <p class="
                    text-xl
                    font-bold
                    text-slate-800
                ">

                    <?= count($announcements) ?>

                </p>


                <p class="text-[11px] text-slate-400">

                    All announcements

                </p>


            </div>


        </div>





        <!-- Published -->

        <div class="
            bg-white
            rounded-xl
            border
            border-slate-200
            shadow-sm
            p-4
            flex
            items-center
            gap-3
        ">


            <div class="
                w-10
                h-10
                rounded-lg
                bg-green-50
                text-green-600
                flex
                items-center
                justify-center
            ">


                <i data-lucide="send" class="w-5 h-5"></i>


            </div>




            <div>


                <p class="
                    text-[11px]
                    uppercase
                    tracking-wide
                    text-slate-400
                    font-medium
                ">

                    Published

                </p>



                <p class="
                    text-xl
                    font-bold
                    text-slate-800
                ">


                    <?= count(
                        array_filter(
                            $announcements,
                            fn($a) =>
                            $a->getStatus() === 'published'
                        )
                    ) ?>


                </p>



                <p class="text-[11px] text-slate-400">

                    Visible to students

                </p>


            </div>


        </div>






        <!-- Draft -->

        <div class="
            bg-white
            rounded-xl
            border
            border-slate-200
            shadow-sm
            p-4
            flex
            items-center
            gap-3
        ">


            <div class="
                w-10
                h-10
                rounded-lg
                bg-yellow-50
                text-yellow-600
                flex
                items-center
                justify-center
            ">

                <i data-lucide="file-edit" class="w-5 h-5"></i>

            </div>




            <div>


                <p class="
                    text-[11px]
                    uppercase
                    tracking-wide
                    text-slate-400
                    font-medium
                ">

                    Draft

                </p>



                <p class="
                    text-xl
                    font-bold
                    text-slate-800
                ">


                    <?= count(
                        array_filter(
                            $announcements,
                            fn($a) =>
                            $a->getStatus() === 'draft'
                        )
                    ) ?>


                </p>


                <p class="text-[11px] text-slate-400">

                    Pending publication

                </p>


            </div>


        </div>






        <!-- High Priority -->

        <div class="
            bg-white
            rounded-xl
            border
            border-slate-200
            shadow-sm
            p-4
            flex
            items-center
            gap-3
        ">


            <div class="
                w-10
                h-10
                rounded-lg
                bg-red-50
                text-red-600
                flex
                items-center
                justify-center
            ">

                <i data-lucide="triangle-alert" class="w-5 h-5"></i>

            </div>




            <div>


                <p class="
                    text-[11px]
                    uppercase
                    tracking-wide
                    text-slate-400
                    font-medium
                ">

                    High Priority

                </p>



                <p class="
                    text-xl
                    font-bold
                    text-slate-800
                ">


                    <?= count(
                        array_filter(
                            $announcements,
                            fn($a) =>
                            $a->getPriority() === 'high'
                        )
                    ) ?>


                </p>


                <p class="text-[11px] text-slate-400">

                    Important notices

                </p>


            </div>


        </div>



    </div>







    <!-- Announcement Table -->


    <div class="
        bg-white
        rounded-xl
        shadow-sm
        border
        border-slate-200
        overflow-hidden
    ">


        <div class="overflow-x-auto">


            <table class="w-full text-sm text-slate-700">


                <thead class="
                    bg-slate-50
                    text-xs
                    font-semibold
                    text-slate-500
                    uppercase
                    border-b
                ">


                    <tr>


                        <th class="px-5 py-3.5 text-left">
                            Announcement
                        </th>


                        <th class="px-5 py-3.5 text-left">
                            Priority
                        </th>


                        <th class="px-5 py-3.5 text-left">
                            Status
                        </th>


                        <th class="px-5 py-3.5 text-left">
                            Date
                        </th>


                        <th class="px-5 py-3.5 text-right">
                            Actions
                        </th>


                    </tr>


                </thead>





                <tbody>


                    <?php if (empty($announcements)): ?>


                        <tr>


                            <td colspan="5" class="
                                px-5
                                py-10
                                text-center
                                text-slate-400
                            ">


                                <i data-lucide="megaphone" class="
                                    w-8
                                    h-8
                                    mx-auto
                                    mb-2
                                    text-slate-300
                               ">
                                </i>


                                No announcements found.


                            </td>


                        </tr>



                    <?php else: ?>



                        <?php foreach ($announcements as $announcement): ?>


                            <tr class="
                        border-b
                        border-slate-100
                        hover:bg-slate-50
                        transition
                    ">


                                <td class="px-5 py-3.5">


                                    <div class="flex items-center gap-4">


                                        <div class="
                                    w-12
                                    h-12
                                    rounded-xl
                                    bg-blue-50
                                    flex
                                    items-center
                                    justify-center
                                ">


                                            <i data-lucide="megaphone" class="text-blue-500">
                                            </i>


                                        </div>



                                        <div>


                                            <p class="
                                        font-semibold
                                        text-slate-800
                                    ">

                                                <?= htmlspecialchars(
                                                    $announcement->getTitle()
                                                ) ?>


                                            </p>


                                            <p class="
                                        text-xs
                                        text-slate-500
                                    ">

                                                Announcement


                                            </p>


                                        </div>


                                    </div>


                                </td>





                                <td class="px-5 py-3.5">


                                    <span class="
                                px-3
                                py-1
                                rounded-full
                                text-xs
                                font-medium
                                bg-blue-50
                                text-blue-700
                            ">


                                        <?= ucfirst(
                                            $announcement->getPriority()
                                        ) ?>


                                    </span>


                                </td>





                                <td class="px-5 py-3.5">


                                    <?php

                                    $status =
                                        $announcement->getStatus();


                                    $statusClass =
                                        $status === 'published'
                                        ? 'bg-green-50 text-green-700'
                                        : 'bg-yellow-50 text-yellow-700';

                                    ?>


                                    <span class="
                                px-3
                                py-1
                                rounded-full
                                text-xs
                                font-medium
                                <?= $statusClass ?>
                            ">


                                        <?= ucfirst($status) ?>


                                    </span>


                                </td>





                                <td class="px-5 py-3.5 text-slate-600">


                                    <?= date(
                                        'M d, Y',
                                        strtotime(
                                            $announcement->getCreatedAt()
                                        )
                                    ) ?>


                                </td>





                                <td class="px-5 py-3.5">


                                    <div class="
                                flex
                                justify-end
                                gap-1
                            ">


                                        <a href="<?= BASE_URL ?>/admin/announcements/<?= $announcement->getId() ?>" class="
                                        p-1.5
                                        text-slate-500
                                        hover:bg-slate-100
                                        rounded-lg
                                   ">


                                            <i data-lucide="eye" class="w-4 h-4">
                                            </i>


                                        </a>




                                        <a href="<?= BASE_URL ?>/admin/announcements/<?= $announcement->getId() ?>/edit" class="
                                        p-1.5
                                        text-amber-600
                                        hover:bg-amber-50
                                        rounded-lg
                                   ">


                                            <i data-lucide="square-pen" class="w-4 h-4">
                                            </i>


                                        </a>





                                        <form method="POST"
                                            action="<?= BASE_URL ?>/admin/announcements/<?= $announcement->getId() ?>/delete"
                                            onsubmit="return confirm('Delete this announcement?')">


                                            <button class="
                                        p-1.5
                                        text-red-500
                                        hover:bg-red-50
                                        rounded-lg
                                    ">


                                                <i data-lucide="trash-2" class="w-4 h-4">
                                                </i>


                                            </button>


                                        </form>


                                    </div>


                                </td>


                            </tr>



                        <?php endforeach; ?>


                    <?php endif; ?>


                </tbody>


            </table>


        </div>


    </div>

    <!-- Pagination -->

    <?php if ($pagination !== null && $pagination['total'] > 0): ?>

        <div class="px-5 py-3.5 border-t border-slate-200/80 bg-slate-50/30
flex flex-col sm:flex-row sm:items-center sm:justify-between
gap-3 text-xs text-slate-500">


            <!-- Information -->

            <span>

                Showing

                <span class="font-medium text-slate-700">

                    <?= (($pagination['current_page'] - 1) * $pagination['per_page']) + 1 ?>

                    -

                    <?= min(
                        $pagination['current_page'] * $pagination['per_page'],
                        $pagination['total']
                    ) ?>

                </span>

                of

                <span class="font-medium text-slate-700">

                    <?= $pagination['total'] ?>

                </span>

                announcements.

            </span>





            <!-- Navigation -->

            <div class="flex items-center gap-2">


                <!-- Previous -->

                <?php if ($pagination['current_page'] > 1): ?>


                    <a href="<?= buildAnnouncementPaginationUrl(
                                    $pagination['current_page'] - 1,
                                    $_GET
                                ) ?>" class="w-8 h-8 border border-slate-200 rounded-lg
            hover:bg-slate-100 transition
            flex items-center justify-center">


                        <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i>


                    </a>


                <?php else: ?>


                    <span class="w-8 h-8 border border-slate-200 rounded-lg
        opacity-50
        flex items-center justify-center">


                        <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i>


                    </span>


                <?php endif; ?>







                <?php

                $totalPages =
                    $pagination['total_pages'];

                $current =
                    $pagination['current_page'];

                $range = 2;


                $start =
                    max(1, $current - $range);


                $end =
                    min($totalPages, $current + $range);

                ?>






                <!-- First Page -->

                <?php if ($start > 1): ?>


                    <a href="<?= buildAnnouncementPaginationUrl(1, $_GET) ?>" class="w-8 h-8 border border-slate-200 rounded-lg
            hover:bg-slate-100 transition
            flex items-center justify-center">

                        1

                    </a>



                    <?php if ($start > 2): ?>

                        <span class="px-1">
                            ...
                        </span>

                    <?php endif; ?>


                <?php endif; ?>







                <!-- Page Numbers -->

                <?php for ($i = $start; $i <= $end; $i++): ?>


                    <?php if ($i == $current): ?>


                        <span class="w-8 h-8 bg-blue-600 text-white rounded-lg
            flex items-center justify-center font-medium">


                            <?= $i ?>


                        </span>


                    <?php else: ?>


                        <a href="<?= buildAnnouncementPaginationUrl(
                                        $i,
                                        $_GET
                                    ) ?>" class="w-8 h-8 border border-slate-200 rounded-lg
                hover:bg-slate-100 transition
                flex items-center justify-center">


                            <?= $i ?>


                        </a>


                    <?php endif; ?>


                <?php endfor; ?>







                <!-- Last Page -->

                <?php if ($end < $totalPages): ?>


                    <?php if ($end < $totalPages - 1): ?>


                        <span class="px-1">

                            ...

                        </span>


                    <?php endif; ?>



                    <a href="<?= buildAnnouncementPaginationUrl(
                                    $totalPages,
                                    $_GET
                                ) ?>" class="w-8 h-8 border border-slate-200 rounded-lg
                hover:bg-slate-100 transition
                flex items-center justify-center">


                        <?= $totalPages ?>


                    </a>


                <?php endif; ?>







                <!-- Next -->

                <?php if ($pagination['current_page'] < $totalPages): ?>


                    <a href="<?= buildAnnouncementPaginationUrl(
                                    $pagination['current_page'] + 1,
                                    $_GET
                                ) ?>" class="w-8 h-8 border border-slate-200 rounded-lg
            hover:bg-slate-100 transition
            flex items-center justify-center">


                        <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>


                    </a>


                <?php else: ?>


                    <span class="w-8 h-8 border border-slate-200 rounded-lg
        opacity-50
        flex items-center justify-center">


                        <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>


                    </span>


                <?php endif; ?>


            </div>


        </div>


    <?php endif; ?>





    <?php

    /**
     * Build announcement pagination URL
     */
    function buildAnnouncementPaginationUrl(
        int $page,
        array $query
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
            . '/admin/announcements?'
            . http_build_query($query);
    }

    ?>
</div>