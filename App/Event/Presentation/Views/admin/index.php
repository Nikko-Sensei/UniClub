<?php

// Category lookup
$categoryMap = [];

foreach ($categories as $category) {
    $categoryMap[$category['id']] = $category['name'];
}

?>

<div class="space-y-6">


    <!-- Header -->

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">


        <div>

            <h1 class="text-2xl font-bold text-slate-800">
                Event Management
            </h1>


            <p class="text-slate-500">
                Overview and administration of university events.
            </p>


        </div>



        <a href="<?= BASE_URL ?>/admin/events/create"
            class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">


            <i data-lucide="plus" class="w-4 h-4"></i>

            Create Event


        </a>


    </div>

    <!-- Statistics Cards -->

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">


        <!-- Total Events -->

        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 flex items-center gap-3">

            <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">

                <i data-lucide="calendar-days" class="w-5 h-5"></i>

            </div>


            <div>

                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">
                    Total Events
                </p>


                <p class="text-xl font-bold text-slate-800">
                    <?= $statistics['total_events'] ?? 0 ?>
                </p>


                <p class="text-[11px] text-slate-400">
                    All events
                </p>

            </div>

        </div>




        <!-- Published Events -->

        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 flex items-center gap-3">

            <div class="w-10 h-10 rounded-lg bg-green-50 text-green-600 flex items-center justify-center">

                <i data-lucide="calendar-check" class="w-5 h-5"></i>

            </div>


            <div>

                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">
                    Published
                </p>


                <p class="text-xl font-bold text-slate-800">
                    <?= $statistics['published_events'] ?? 0 ?>
                </p>


                <p class="text-[11px] text-slate-400">
                    Active events
                </p>

            </div>

        </div>




        <!-- Upcoming Events -->

        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 flex items-center gap-3">

            <div class="w-10 h-10 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center">

                <i data-lucide="clock" class="w-5 h-5"></i>

            </div>


            <div>

                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">
                    Upcoming
                </p>


                <p class="text-xl font-bold text-slate-800">
                    <?= $statistics['upcoming_events'] ?? 0 ?>
                </p>


                <p class="text-[11px] text-slate-400">
                    Future schedules
                </p>

            </div>

        </div>




        <!-- Completed Events -->

        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 flex items-center gap-3">

            <div class="w-10 h-10 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center">

                <i data-lucide="circle-check" class="w-5 h-5"></i>

            </div>


            <div>

                <p class="text-[11px] uppercase tracking-wide text-slate-400 font-medium">
                    Completed
                </p>


                <p class="text-xl font-bold text-slate-800">
                    <?= $statistics['completed_events'] ?? 0 ?>
                </p>


                <p class="text-[11px] text-slate-400">
                    Finished events
                </p>

            </div>

        </div>


    </div>



    <!-- Event Table Card -->

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">


        <!-- Filter -->

        <div class="p-4 md:p-5 border-b border-slate-200">


            <form method="GET" action="<?= BASE_URL ?>/admin/events" class="flex flex-wrap items-end gap-3">


                <!-- Search input -->

                <div class="relative flex-1 min-w-[560px]">

                    <i data-lucide="search"
                        class="absolute left-3.5 top-0 h-full flex items-center text-slate-400 w-4 h-4">
                    </i>


                    <input type="text" name="search" placeholder="Search by event title..."
                        value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" class="w-full pl-9 pr-4 py-2.5
            border border-slate-200
            onkeypress=" if(event.key==='Enter' ) this.form.submit()" rounded-lg focus:outline-none focus:ring-2
                        focus:ring-blue-500/30 focus:border-blue-500 transition text-sm bg-slate-50/50" />

                </div>





                <!-- Category filter -->


                <div class="flex-1 min-w-[50px]">


                    <select name="category_id" onchange="this.form.submit()" class="w-full
            border border-slate-200
            rounded-lg
            px-3
            py-2.5
            text-sm
            bg-slate-50/50
            text-slate-700
            focus:border-blue-500
            focus:ring-2
            focus:ring-blue-500/30
            transition
            appearance-none
            bg-[url('data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2212%22%20height%3D%2212%22%20viewBox%3D%220%200%2012%2012%22%3E%3Cpath%20fill%3D%22%2364758b%22%20d%3D%22M6%208L1%203h10z%22%2F%3E%3C%2Fsvg%3E')]
            bg-[right_12px_center]
            bg-no-repeat
            bg-[length:12px]">


                        <option value="">
                            All Categories
                        </option>


                        <?php foreach ($categories as $category): ?>


                        <option value="<?= $category['id'] ?>" <?= (
                                                                        isset($filters['category_id']) &&
                                                                        $filters['category_id'] == $category['id']
                                                                    ) ? 'selected' : '' ?>>

                            <?= htmlspecialchars($category['name']) ?>

                        </option>


                        <?php endforeach; ?>


                    </select>


                </div>







                <!-- Status filter -->


                <div class="flex-1 min-w-[50px]">


                    <select name="status" onchange="this.form.submit()" class="w-full
            border border-slate-200
            rounded-lg
            px-3
            py-2.5
            text-sm
            bg-slate-50/50
            text-slate-700
            focus:border-blue-500
            focus:ring-2
            focus:ring-blue-500/30
            transition
            appearance-none
            bg-[url('data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000/svg%22%20width%3D%2212%22%20height%3D%2212%22%20viewBox%3D%220%200%2012%2012%22%3E%3Cpath%20fill%3D%22%2364758b%22%20d%3D%22M6%208L1%203h10z%22%2F%3E%3C%2Fsvg%3E')]
            bg-[right_12px_center]
            bg-no-repeat
            bg-[length:12px]">


                        <option value="">
                            All Status
                        </option>


                        <?php foreach (
                            [
                                'draft',
                                'published',
                                'completed',
                                'cancelled'
                            ] as $status
                        ): ?>


                        <option value="<?= $status ?>" <?= (
                                                                isset($filters['status']) &&
                                                                $filters['status'] == $status
                                                            ) ? 'selected' : '' ?>>

                            <?= ucfirst($status) ?>

                        </option>


                        <?php endforeach; ?>


                    </select>


                </div>


            </form>


        </div>






        <!-- Table -->


        <div class="overflow-x-auto">


            <table class="w-full text-sm text-slate-700">


                <thead class="bg-slate-50 text-xs font-semibold text-slate-500 uppercase border-b">


                    <tr>


                        <th class="px-5 py-3.5 text-left">
                            Event
                        </th>


                        <th class="px-5 py-3.5 text-left">
                            Category
                        </th>


                        <th class="px-5 py-3.5 text-left">
                            Date
                        </th>


                        <th class="px-5 py-3.5 text-left">
                            Venue
                        </th>


                        <th class="px-5 py-3.5 text-left">
                            Capacity
                        </th>


                        <th class="px-5 py-3.5 text-left">
                            Status
                        </th>


                        <th class="px-5 py-3.5 text-right">
                            Actions
                        </th>


                    </tr>


                </thead>





                <tbody>



                    <?php if (empty($events)): ?>


                    <tr>

                        <td colspan="7" class="px-5 py-10 text-center text-slate-400">


                            <i data-lucide="calendar-days" class="w-8 h-8 mx-auto mb-2 text-slate-300">
                            </i>


                            No events found.


                        </td>

                    </tr>



                    <?php else: ?>



                    <?php foreach ($events as $event): ?>


                    <tr class="border-b border-slate-100 hover:bg-slate-50 transition">



                        <!-- Event -->


                        <td class="px-5 py-3.5">


                            <div class="flex items-center gap-4">


                                <div
                                    class="w-12 h-12 rounded-xl bg-blue-50 overflow-hidden flex items-center justify-center">


                                    <?php if ($event->getBanner()): ?>


                                    <img src="<?= BASE_URL ?>/uploads/events/<?= htmlspecialchars($event->getBanner()) ?>"
                                        class="w-full h-full object-cover">


                                    <?php else: ?>


                                    <i class="fa-solid fa-calendar-days text-blue-500"></i>


                                    <?php endif; ?>


                                </div>



                                <div>


                                    <p class="font-semibold text-slate-800">

                                        <?= htmlspecialchars($event->getTitle()) ?>



                                    </p>


                                    <p class="text-xs text-slate-500">

                                        <?= htmlspecialchars(
                                                    method_exists($event, 'getClubName')
                                                        ? $event->getClubName()
                                                        : 'University Club'
                                                ) ?>


                                    </p>


                                </div>


                            </div>


                        </td>






                        <!-- Category -->


                        <td class="px-5 py-3.5 text-slate-600">


                            <?= htmlspecialchars(
                                        $categoryMap[$event->getCategoryId()] ?? '-'
                                    ) ?>


                        </td>






                        <!-- Date -->


                        <td class="px-5 py-3.5 text-slate-600">


                            <?= date(
                                        'M d, Y',
                                        strtotime($event->getEventDate())
                                    ) ?>


                            <p class="text-xs text-slate-400">


                                <?= date(
                                            'h:i A',
                                            strtotime($event->getStartTime())
                                        ) ?>


                            </p>


                        </td>






                        <!-- Venue -->


                        <td class="px-5 py-3.5 text-slate-600">


                            <div class="flex items-center gap-2">


                                <i class="fa-solid fa-location-dot text-blue-500"></i>


                                <?= htmlspecialchars($event->getVenue()) ?>


                            </div>


                        </td>






                        <!-- Capacity -->


                        <td class="px-5 py-3.5">


                            <span class="font-semibold">

                                <?= number_format($event->getCapacity()) ?>

                            </span>


                            <span class="text-slate-400">
                                students
                            </span>


                        </td>






                        <!-- Status -->


                        <td class="px-5 py-3.5">


                            <?php

                                    $status = $event->getStatus();

                                    $statusClass = match ($status) {

                                        'published'
                                        => 'bg-green-50 text-green-700',

                                        'cancelled'
                                        => 'bg-red-50 text-red-700',

                                        default
                                        => 'bg-yellow-50 text-yellow-700'
                                    };

                                    ?>


                            <span class="px-3 py-1 rounded-full text-xs font-medium <?= $statusClass ?>">


                                <?= ucfirst(htmlspecialchars($status)) ?>


                            </span>


                        </td>






                        <!-- Actions -->


                        <td class="px-5 py-3.5">


                            <div class="flex justify-end gap-1">


                                <a href="<?= BASE_URL ?>/admin/events/<?= $event->getId() ?>/registrations"
                                    class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg">


                                    <i data-lucide="users" class="w-4 h-4"></i>


                                </a>




                                <a href="<?= BASE_URL ?>/admin/events/<?= $event->getId() ?>/show"
                                    class="p-1.5 text-slate-500 hover:bg-slate-100 rounded-lg">


                                    <i data-lucide="eye" class="w-4 h-4"></i>


                                </a>





                                <a href="<?= BASE_URL ?>/admin/events/<?= $event->getId() ?>/edit"
                                    class="p-1.5 text-amber-600 hover:bg-amber-50 rounded-lg">


                                    <i data-lucide="square-pen" class="w-4 h-4"></i>


                                </a>




                                <form method="POST" action="<?= BASE_URL ?>/admin/events/<?= $event->getId() ?>/delete"
                                    onsubmit="return confirm('Delete this event?')">


                                    <button class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg">


                                        <i data-lucide="trash-2" class="w-4 h-4"></i>

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

        <!-- Pagination Information -->
        <span>

            Showing

            <span class="font-medium text-slate-700">

                <?= (($pagination['current_page'] - 1) * $pagination['per_page'] + 1) ?>

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

            events.

        </span>


        <!-- Pagination Navigation -->
        <div class="flex items-center gap-2">

            <!-- Previous -->
            <?php if ($pagination['current_page'] > 1): ?>

            <a href="<?= buildEventPaginationUrl(
                                    $pagination['current_page'] - 1,
                                    $_GET
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


            <!-- Page Numbers -->
            <?php

                $totalPages = $pagination['total_pages'];

                $current = $pagination['current_page'];

                $range = 2;

                $start = max(1, $current - $range);

                $end = min($totalPages, $current + $range);

                ?>


            <?php if ($start > 1): ?>

            <a href="<?= buildEventPaginationUrl(1, $_GET) ?>" class="w-8 h-8 border border-slate-200 rounded-lg
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


            <?php for ($i = $start; $i <= $end; $i++): ?>


            <?php if ($i == $current): ?>

            <span class="w-8 h-8 bg-blue-600 text-white rounded-lg
            text-xs font-medium
            flex items-center justify-center">

                <?= $i ?>

            </span>

            <?php else: ?>

            <a href="<?= buildEventPaginationUrl($i, $_GET) ?>" class="w-8 h-8 border border-slate-200 rounded-lg
            hover:bg-slate-100 transition-colors
            flex items-center justify-center">

                <?= $i ?>

            </a>

            <?php endif; ?>


            <?php endfor; ?>


            <?php if ($end < $totalPages): ?>

            <?php if ($end < $totalPages - 1): ?>

            <span class="px-1">
                ...
            </span>

            <?php endif; ?>


            <a href="<?= buildEventPaginationUrl($totalPages, $_GET) ?>" class="w-8 h-8 border border-slate-200 rounded-lg
            hover:bg-slate-100 transition-colors
            flex items-center justify-center">

                <?= $totalPages ?>

            </a>

            <?php endif; ?>


            <!-- Next -->
            <?php if ($pagination['current_page'] < $totalPages): ?>

            <a href="<?= buildEventPaginationUrl(
                                    $pagination['current_page'] + 1,
                                    $_GET
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
     * Build event pagination URL
     * Preserve search, category and status filters
     */
    function buildEventPaginationUrl(
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
            . '/admin/events?'
            . http_build_query($query);
    }

    ?>

</div>