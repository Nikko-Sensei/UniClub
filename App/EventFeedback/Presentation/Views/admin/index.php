<div class="space-y-6">

    <?php require BASE_PATH .
        '/App/Event/Presentation/Views/admin/components/event_header.php';
    ?>

    <!-- ========================================================== -->
    <!-- HEADER                                                     -->
    <!-- ========================================================== -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Event Feedback
            </h1>

            <p class="text-sm text-slate-500">
                Review student feedback and ratings from university events.
            </p>
        </div>

    </div>


    <!-- ========================================================== -->
    <!-- FEEDBACK TABLE                                             -->
    <!-- ========================================================== -->
    <div
        class="glass-card-light rounded-xl border border-slate-100/60 shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-blue-200/50">

        <!-- ====================================================== -->
        <!-- FILTER BAR                                             -->
        <!-- ====================================================== -->
        <div class="p-4 md:p-5 border-b border-slate-200/60 bg-white/30 backdrop-blur-sm">

            <form method="GET" action="<?= BASE_URL ?>/admin/feedbacks"
                class="flex flex-col sm:flex-row sm:items-center gap-3">

                <!-- Search -->
                <div class="flex-1 min-w-[220px]">

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

                        <input type="text" name="search" placeholder="Search student or comment..."
                            value="<?= htmlspecialchars($filters['search'] ?? '') ?>"
                            onkeydown="if(event.key === 'Enter') this.form.submit()" class="
                flex-1
                bg-transparent
                text-sm
                text-slate-700
                outline-none
                border-0
                focus:ring-0
            ">

                    </div>

                </div>


                <!-- Rating Filter -->
                <div class="relative w-full sm:w-44">

                    <select name="rating" onchange="this.form.submit()" class="w-full h-11 pl-4 pr-10 border border-slate-200/80 rounded-xl
                        focus:outline-none focus:ring-2 focus:ring-blue-500/30
                        focus:border-blue-500 transition text-sm
                        bg-white/50 backdrop-blur-sm hover:border-blue-200
                        appearance-none cursor-pointer">

                        <option value="">
                            All Ratings
                        </option>

                        <?php for ($i = 5; $i >= 1; $i--): ?>

                            <option value="<?= $i ?>" <?= (($filters['rating'] ?? '') == $i) ? 'selected' : '' ?>>

                                <?= $i ?> Star<?= $i > 1 ? 's' : '' ?>

                            </option>

                        <?php endfor; ?>

                    </select>

                    <span class="absolute inset-y-0 right-0 flex items-center pr-3
                        pointer-events-none text-slate-400">

                        <i data-lucide="chevron-down" class="w-4 h-4">
                        </i>

                    </span>

                </div>

            </form>

        </div>


        <!-- ====================================================== -->
        <!-- TABLE                                                   -->
        <!-- ====================================================== -->
        <div class="overflow-x-auto">

            <table class="w-full text-sm text-slate-700">

                <!-- Table Header -->
                <thead class="bg-slate-50/50 text-xs font-semibold text-slate-500
                    uppercase tracking-wider border-b border-slate-200/60">

                    <tr>

                        <th class="px-5 py-3.5 text-left whitespace-nowrap">
                            Student
                        </th>

                        <th class="px-5 py-3.5 text-left whitespace-nowrap">
                            Event
                        </th>

                        <th class="px-5 py-3.5 text-left whitespace-nowrap">
                            Rating
                        </th>

                        <th class="px-5 py-3.5 text-left whitespace-nowrap">
                            Comment
                        </th>

                        <th class="px-5 py-3.5 text-right whitespace-nowrap">
                            Actions
                        </th>

                    </tr>

                </thead>


                <!-- Table Body -->
                <tbody>

                    <?php if (empty($feedbacks)): ?>

                        <!-- Empty State -->
                        <tr>

                            <td colspan="5" class="px-5 py-12 text-center text-slate-400">

                                <i data-lucide="message-square" class="w-8 h-8 block mx-auto mb-3 text-slate-300">
                                </i>

                                <p class="font-medium text-slate-500">
                                    No feedback found.
                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    Student feedback will appear here.
                                </p>

                            </td>

                        </tr>

                    <?php else: ?>

                        <?php foreach ($feedbacks as $feedback): ?>

                            <tr class="border-b border-slate-100/60
                                hover:bg-slate-50/40 transition-colors">

                                <!-- ================================================= -->
                                <!-- Student                                          -->
                                <!-- ================================================= -->
                                <td class="px-5 py-3.5">

                                    <div class="flex items-center gap-3">

                                        <div class="w-9 h-9
                                rounded-full
                                overflow-hidden
                                flex items-center
                                justify-center
                                bg-gradient-to-br
                                from-blue-100
                                to-blue-200
                                text-blue-700
                                font-semibold
                                text-sm
                                flex-shrink-0
                                shadow-sm">

                                            <?php if (!empty($feedback->getProfileImage())): ?>

                                                <img src="<?= BASE_URL ?>/uploads/profile/<?= htmlspecialchars($feedback->getProfileImage()) ?>"
                                                    alt="<?= htmlspecialchars($feedback->getUserName() ?? 'Student') ?>"
                                                    class="w-full h-full object-cover">

                                            <?php else: ?>

                                                <?php
                                                $name = trim($feedback->getUserName() ?? 'Student');

                                                $words = preg_split('/\s+/', $name);

                                                if (count($words) >= 2) {
                                                    $initials = strtoupper(
                                                        substr($words[0], 0, 1) .
                                                            substr($words[1], 0, 1)
                                                    );
                                                } else {
                                                    $initials = strtoupper(
                                                        substr($words[0] ?? 'S', 0, 1)
                                                    );
                                                }
                                                ?>

                                                <?= htmlspecialchars($initials) ?>

                                            <?php endif; ?>

                                        </div>

                                        <div>

                                            <p class="font-medium text-slate-700">

                                                <?= htmlspecialchars(
                                                    $feedback->getUserName()
                                                ) ?>

                                            </p>

                                            <p class="text-xs text-slate-400">
                                                Student
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                <!-- ================================================= -->
                                <!-- Event                                             -->
                                <!-- ================================================= -->
                                <td class="px-5 py-3.5 text-slate-600">

                                    <div class="flex items-center gap-2">

                                        <i data-lucide="calendar-days" class="w-4 h-4 text-blue-500 flex-shrink-0">
                                        </i>

                                        <span>
                                            <?= htmlspecialchars(
                                                $feedback->getEventTitle()
                                            ) ?>
                                        </span>

                                    </div>

                                </td>


                                <!-- ================================================= -->
                                <!-- Rating                                            -->
                                <!-- ================================================= -->
                                <td class="px-5 py-3.5">

                                    <div class="flex items-center gap-0.5">

                                        <?php for ($i = 1; $i <= 5; $i++): ?>

                                            <span class="text-base
                                                <?= $i <= $feedback->getRating()
                                                    ? 'text-amber-500'
                                                    : 'text-slate-300' ?>">

                                                ★

                                            </span>

                                        <?php endfor; ?>

                                    </div>

                                    <span class="text-xs text-slate-400">

                                        <?= $feedback->getRating() ?>/5

                                    </span>

                                </td>


                                <!-- ================================================= -->
                                <!-- Comment                                           -->
                                <!-- ================================================= -->
                                <td class="px-5 py-3.5 text-slate-600 max-w-md">

                                    <?php
                                    $comment = $feedback->getComment();
                                    ?>

                                    <?php if (!empty($comment)): ?>

                                        <p class="truncate max-w-[300px]" title="<?= htmlspecialchars($comment) ?>">

                                            <?= htmlspecialchars($comment) ?>

                                        </p>

                                    <?php else: ?>

                                        <span class="text-slate-400 italic">
                                            No comment
                                        </span>

                                    <?php endif; ?>

                                </td>


                                <!-- ================================================= -->
                                <!-- Action                                            -->
                                <!-- ================================================= -->
                                <td class="px-5 py-3.5 text-right">

                                    <form method="POST"
                                        action="<?= BASE_URL ?>/admin/feedbacks/<?= $feedback->getId() ?>/delete"
                                        onsubmit="return confirm('Delete this feedback?')" class="inline">

                                        <button type="submit" class="w-9 h-9 inline-flex items-center justify-center
                                            text-red-500 bg-red-50 hover:bg-red-100
                                            rounded-lg transition-all duration-200
                                            hover:scale-105" title="Delete Feedback">

                                            <i data-lucide="trash-2" class="w-4 h-4">
                                            </i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </tbody>

            </table>


            <!-- ====================================================== -->
            <!-- PAGINATION                                             -->
            <!-- ====================================================== -->
            <?php if ($pagination && $pagination['total'] > 0): ?>

                <div class="px-5 py-3.5 border-t border-slate-200/60
                    bg-slate-50/20 flex flex-col sm:flex-row
                    sm:items-center sm:justify-between gap-3
                    text-xs text-slate-500">

                    <!-- Showing -->
                    <span>

                        Showing

                        <span class="font-medium text-slate-700">

                            <?= (($pagination['current_page'] - 1)
                                * $pagination['per_page']) + 1 ?>

                            -

                            <?= min(
                                $pagination['current_page']
                                    * $pagination['per_page'],
                                $pagination['total']
                            ) ?>

                        </span>

                        of

                        <span class="font-medium text-slate-700">

                            <?= $pagination['total'] ?>

                        </span>

                        feedbacks.

                    </span>


                    <!-- Pagination Buttons -->
                    <div class="flex items-center gap-2">

                        <!-- Previous -->
                        <?php if ($pagination['current_page'] > 1): ?>

                            <a href="<?= buildPaginationUrl(
                                            $pagination['current_page'] - 1,
                                            $_GET
                                        ) ?>" class="w-8 h-8 border border-slate-200
                                rounded-lg hover:bg-slate-100
                                transition flex items-center justify-center">

                                <i data-lucide="chevron-left" class="w-3.5 h-3.5">
                                </i>

                            </a>

                        <?php else: ?>

                            <span class="w-8 h-8 border border-slate-200
                                rounded-lg opacity-50
                                flex items-center justify-center">

                                <i data-lucide="chevron-left" class="w-3.5 h-3.5">
                                </i>

                            </span>

                        <?php endif; ?>


                        <!-- Page Numbers -->
                        <?php

                        $current = $pagination['current_page'];
                        $totalPages = $pagination['total_pages'];
                        $range = 2;

                        $start = max(
                            1,
                            $current - $range
                        );

                        $end = min(
                            $totalPages,
                            $current + $range
                        );

                        ?>

                        <?php for ($i = $start; $i <= $end; $i++): ?>

                            <?php if ($i == $current): ?>

                                <span class="w-8 h-8 bg-blue-600 text-white
                                    rounded-lg flex items-center
                                    justify-center font-medium">

                                    <?= $i ?>

                                </span>

                            <?php else: ?>

                                <a href="<?= buildPaginationUrl(
                                                $i,
                                                $_GET
                                            ) ?>" class="w-8 h-8 border border-slate-200
                                    rounded-lg hover:bg-slate-100
                                    transition flex items-center
                                    justify-center">

                                    <?= $i ?>

                                </a>

                            <?php endif; ?>

                        <?php endfor; ?>


                        <!-- Next -->
                        <?php if ($pagination['current_page'] < $totalPages): ?>

                            <a href="<?= buildPaginationUrl(
                                            $pagination['current_page'] + 1,
                                            $_GET
                                        ) ?>" class="w-8 h-8 border border-slate-200
                                rounded-lg hover:bg-slate-100
                                transition flex items-center justify-center">

                                <i data-lucide="chevron-right" class="w-3.5 h-3.5">
                                </i>

                            </a>

                        <?php else: ?>

                            <span class="w-8 h-8 border border-slate-200
                                rounded-lg opacity-50
                                flex items-center justify-center">

                                <i data-lucide="chevron-right" class="w-3.5 h-3.5">
                                </i>

                            </span>

                        <?php endif; ?>

                    </div>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>


<!-- ========================================================== -->
<!-- PAGINATION HELPER                                          -->
<!-- ========================================================== -->

<?php

function buildPaginationUrl($page, $query)
{
    $query['page'] = $page;

    $query = array_filter(
        $query,
        function ($value) {
            return $value !== '' && $value !== null;
        }
    );

    return BASE_URL .
        '/admin/feedbacks?' .
        http_build_query($query);
}

?>


<!-- ========================================================== -->
<!-- LUCIDE ICONS                                               -->
<!-- ========================================================== -->

<script>
    document.addEventListener('DOMContentLoaded', function() {

        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

    });
</script>