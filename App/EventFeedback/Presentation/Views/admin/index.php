<div class="space-y-6">


    <!-- Header -->
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












    <!-- Event Feedback Table Card -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">


        <!-- Filter Form -->
        <div class="p-4 md:p-5 border-b border-slate-200">

            <form method="GET" action="<?= BASE_URL ?>/admin/feedbacks" class="flex flex-wrap items-end gap-3">


                <!-- Search -->
                <div class="relative flex-1 min-w-[560px]">

                    <i data-lucide="search"
                        class="absolute left-3.5 top-0 h-full flex items-center text-slate-400 w-4 h-4">
                    </i>


                    <input type="text" name="search" placeholder="Search student or comment..."
                        value="<?= htmlspecialchars($filters['search'] ?? '') ?>" onkeyup="this.form.submit()" class="
                    w-full h-11 pl-10 pr-4
                    border border-slate-200
                    rounded-lg
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500/30
                    focus:border-blue-500
                    transition
                    text-sm
                    bg-slate-50/50
                    ">

                </div>




                <!-- Rating Filter -->
                <div class="flex-1 min-w-[180px]">


                    <select name="rating" onchange="this.form.submit()" class="
                    w-full
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
                    ">


                        <option value="">
                            All Ratings
                        </option>


                        <?php for ($i = 5; $i >= 1; $i--): ?>

                        <option value="<?= $i ?>" <?= (($filters['rating'] ?? '') == $i) ? 'selected' : '' ?>>

                            <?= $i ?> Star

                        </option>


                        <?php endfor; ?>


                    </select>


                </div>


            </form>


        </div>




        <!-- Table -->
        <div class="overflow-x-auto">


            <table class="w-full text-sm text-slate-700">


                <thead class="
                bg-slate-50/80
                text-xs
                font-semibold
                text-slate-500
                uppercase
                tracking-wider
                border-b
                border-slate-200/80
                ">


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





                <tbody>


                    <?php if (empty($feedbacks)): ?>


                    <tr>


                        <td colspan="5" class="px-5 py-10 text-center text-slate-400">


                            <i data-lucide="message-square" class="w-8 h-8 block mx-auto mb-2 text-slate-300">
                            </i>


                            No feedback found.


                        </td>


                    </tr>



                    <?php else: ?>



                    <?php foreach ($feedbacks as $feedback): ?>


                    <tr class="
                    border-b
                    border-slate-100
                    hover:bg-slate-50/60
                    transition-colors
                ">



                        <!-- Student -->

                        <td class="px-5 py-3.5 font-medium text-slate-700">


                            <?= htmlspecialchars(
                                        $feedback->getUserName()
                                    ) ?>


                        </td>





                        <!-- Event -->

                        <td class="px-5 py-3.5 text-slate-600">


                            <?= htmlspecialchars(
                                        $feedback->getEventTitle()
                                    ) ?>


                        </td>





                        <!-- Rating -->

                        <td class="px-5 py-3.5">


                            <div class="text-yellow-500 text-lg">


                                <?= str_repeat(
                                            '★',
                                            $feedback->getRating()
                                        ) ?>


                            </div>


                        </td>





                        <!-- Comment -->

                        <td class="px-5 py-3.5 text-slate-600 max-w-md">


                            <?= htmlspecialchars(
                                        $feedback->getComment()
                                    ) ?>


                        </td>





                        <!-- Action -->

                        <td class="px-5 py-3.5 text-right">


                            <form method="POST"
                                action="<?= BASE_URL ?>/admin/event-feedback/<?= $feedback->getId() ?>/delete"
                                onsubmit="return confirm('Delete this feedback?')">


                                <button class="
                                p-1.5
                                text-red-500
                                hover:bg-red-50
                                rounded-lg
                                transition
                                ">


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



        </div>





        <!-- Pagination -->

        <?php if ($pagination): ?>

        <div class="
        px-5
        py-3.5
        border-t
        border-slate-200/80
        bg-slate-50/30
        flex
        flex-col
        sm:flex-row
        sm:items-center
        sm:justify-between
        gap-2
        text-xs
        text-slate-500
        ">


            <span>

                Showing

                <span class="font-medium text-slate-700">

                    <?= (($pagination['current_page'] - 1)
                            * $pagination['per_page']) + 1 ?>


                    -

                    <?= min(
                            $pagination['current_page']
                                *
                                $pagination['per_page'],
                            $pagination['total']
                        ) ?>


                </span>


                of


                <span class="font-medium text-slate-700">

                    <?= $pagination['total'] ?>

                </span>


                feedbacks.


            </span>



            <!-- Pagination buttons -->
            <div class="flex items-center gap-2">

                <?php if ($pagination['current_page'] > 1): ?>

                <a href="<?= buildPaginationUrl(
                                        $pagination['current_page'] - 1,
                                        $_GET
                                    ) ?>" class="px-3 py-1.5 border border-slate-200 rounded-lg hover:bg-slate-100">

                    <i data-lucide="chevron-left" class="w-3 h-3">
                    </i>

                </a>

                <?php endif; ?>



                <span class="
                px-3
                py-1.5
                bg-blue-600
                text-white
                rounded-lg
                ">

                    <?= $pagination['current_page'] ?>

                </span>



                <?php if ($pagination['current_page'] < $pagination['total_pages']): ?>


                <a href="<?= buildPaginationUrl(
                                        $pagination['current_page'] + 1,
                                        $_GET
                                    ) ?>" class="px-3 py-1.5 border border-slate-200 rounded-lg hover:bg-slate-100">


                    <i data-lucide="chevron-right" class="w-3 h-3">
                    </i>


                </a>


                <?php endif; ?>


            </div>


        </div>


        <?php endif; ?>


    </div>





    <!-- Pagination -->

    <?php if (($pagination['total_pages'] ?? 1) > 1): ?>

    <div class="px-5 py-3.5 border-t border-slate-200/80 bg-slate-50/30 
flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 
text-xs text-slate-500">


        <!-- Showing -->

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

            feedbacks.

        </span>



        <div class="flex items-center gap-2">


            <!-- Previous -->

            <?php if ($pagination['current_page'] > 1): ?>

            <a href="<?= buildFeedbackPaginationUrl(
            $pagination['current_page'] - 1,
            $_GET
        ) ?>" class="px-3 py-1.5 border border-slate-200 rounded-lg hover:bg-slate-100">

                <i data-lucide="chevron-left" class="w-3 h-3"></i>

            </a>

            <?php else: ?>

            <span class="px-3 py-1.5 border border-slate-200 rounded-lg opacity-50">

                <i data-lucide="chevron-left" class="w-3 h-3"></i>

            </span>

            <?php endif; ?>




            <!-- Pages -->

            <?php for($i = 1; $i <= $pagination['total_pages']; $i++): ?>


            <?php if($pagination['current_page'] == $i): ?>


            <span class="px-3 py-1.5 bg-blue-600 text-white rounded-lg">

                <?= $i ?>

            </span>


            <?php else: ?>


            <a href="<?= buildFeedbackPaginationUrl(
                $i,
                $_GET
            ) ?>" class="px-3 py-1.5 border border-slate-200 rounded-lg hover:bg-slate-100">

                <?= $i ?>

            </a>


            <?php endif; ?>


            <?php endfor; ?>





            <!-- Next -->

            <?php if ($pagination['current_page'] < $pagination['total_pages']): ?>


            <a href="<?= buildFeedbackPaginationUrl(
            $pagination['current_page'] + 1,
            $_GET
        ) ?>" class="px-3 py-1.5 border border-slate-200 rounded-lg hover:bg-slate-100">


                <i data-lucide="chevron-right" class="w-3 h-3"></i>


            </a>


            <?php else: ?>


            <span class="px-3 py-1.5 border border-slate-200 rounded-lg opacity-50">

                <i data-lucide="chevron-right" class="w-3 h-3"></i>

            </span>


            <?php endif; ?>


        </div>


    </div>


    <?php endif; ?>



    <?php
function buildFeedbackPaginationUrl($page, $query)
{
    $query['page'] = $page;

    $query = array_filter($query, function ($value) {
        return $value !== '' && $value !== null;
    });

    return BASE_URL . '/admin/feedbacks?' . http_build_query($query);
}
?>


</div>