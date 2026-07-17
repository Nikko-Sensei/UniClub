<?php

?>


<div class="space-y-6">



    <!-- Header -->

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">


        <div>


            <h1 class="text-2xl font-bold text-slate-800">
                Contact Messages
            </h1>


            <p class="text-slate-500">
                Manage student questions, feedback, and support requests.
            </p>


        </div>


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

                <i data-lucide="message-circle-more" class="w-5 h-5"></i>

            </div>



            <div>

                <p class="
                    text-[11px]
                    uppercase
                    tracking-wide
                    text-slate-400
                    font-medium
                ">
                    Total Messages
                </p>


                <p class="
                    text-xl
                    font-bold
                    text-slate-800
                ">

                    <?= count($messages) ?>

                </p>


                <p class="text-[11px] text-slate-400">
                    All requests
                </p>


            </div>


        </div>







        <!-- Pending -->


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

                <i data-lucide="clock" class="w-5 h-5"></i>

            </div>



            <div>

                <p class="
                    text-[11px]
                    uppercase
                    tracking-wide
                    text-slate-400
                    font-medium
                ">
                    Pending
                </p>


                <p class="text-xl font-bold text-slate-800">

                    <?= count(
                        array_filter(
                            $messages,
                            fn($m) =>
                            $m->getStatus() === 'pending'
                        )
                    ) ?>

                </p>


                <p class="text-[11px] text-slate-400">
                    Waiting reply
                </p>


            </div>


        </div>









        <!-- Replied -->


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
                    Replied
                </p>



                <p class="text-xl font-bold text-slate-800">


                    <?= count(
                        array_filter(
                            $messages,
                            fn($m) =>
                            $m->getStatus() === 'replied'
                        )
                    ) ?>


                </p>


                <p class="text-[11px] text-slate-400">
                    Completed
                </p>


            </div>


        </div>









        <!-- Closed -->


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
                bg-slate-100
                text-slate-600
                flex
                items-center
                justify-center
            ">


                <i data-lucide="archive-check" class="w-5 h-5"></i>


            </div>




            <div>


                <p class="
                    text-[11px]
                    uppercase
                    tracking-wide
                    text-slate-400
                    font-medium
                ">
                    Closed
                </p>



                <p class="text-xl font-bold text-slate-800">


                    <?= count(
                        array_filter(
                            $messages,
                            fn($m) =>
                            $m->getStatus() === 'closed'
                        )
                    ) ?>


                </p>


                <p class="text-[11px] text-slate-400">
                    Archived
                </p>


            </div>


        </div>



    </div>









    <!-- Contact Table -->


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
                    border-b
                    border-slate-200
                    text-xs
                    font-semibold
                    uppercase
                    text-slate-500
                ">


                    <tr>


                        <th class="px-5 py-3.5 text-left">
                            Student
                        </th>


                        <th class="px-5 py-3.5 text-left">
                            Message
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



                    <?php if(empty($messages)): ?>


                    <tr>


                        <td colspan="5" class="
                            px-5
                            py-10
                            text-center
                            text-slate-400
                        ">


                            <i data-lucide="message-circle" class="
                                w-8
                                h-8
                                mx-auto
                                mb-2
                                text-slate-300
                            "></i>


                            No contact messages found.


                        </td>


                    </tr>



                    <?php else: ?>




                    <?php foreach($messages as $message): ?>


                    <tr class="
                        border-b
                        border-slate-100
                        hover:bg-slate-50
                        transition
                    ">



                        <!-- Student -->


                        <td class="px-5 py-3.5">


                            <div class="flex items-center gap-3">


                                <div class="
                                    w-12
                                    h-12
                                    rounded-xl
                                    bg-blue-50
                                    flex
                                    items-center
                                    justify-center
                                    text-blue-600
                                ">


                                    <i data-lucide="user" class="w-5 h-5"></i>


                                </div>



                                <div>


                                    <p class="font-semibold text-slate-800">

                                        <?= htmlspecialchars(
                                            $message->getName()
                                        ) ?>

                                    </p>


                                    <p class="text-xs text-slate-500">

                                        <?= htmlspecialchars(
                                            $message->getEmail()
                                        ) ?>

                                    </p>


                                </div>


                            </div>


                        </td>







                        <!-- Message -->


                        <td class="px-5 py-3.5">


                            <p class="font-semibold text-slate-800">


                                <?= htmlspecialchars(
                                    $message->getSubject()
                                ) ?>


                            </p>


                            <p class="
                                text-xs
                                text-slate-500
                                max-w-xs
                                truncate
                            ">


                                <?= htmlspecialchars(
                                    $message->getMessage()
                                ) ?>


                            </p>


                        </td>








                        <!-- Status -->


                        <td class="px-5 py-3.5">


                            <?php

                            $status = $message->getStatus();


                            $statusClass = match($status){

                                'pending'
                                =>
                                'bg-yellow-50 text-yellow-700',


                                'replied'
                                =>
                                'bg-green-50 text-green-700',


                                'closed'
                                =>
                                'bg-slate-100 text-slate-700',


                                default
                                =>
                                'bg-gray-100 text-gray-700'

                            };


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








                        <!-- Date -->


                        <td class="px-5 py-3.5 text-slate-500">


                            <?= date(
                                'M d, Y',
                                strtotime(
                                    $message->getCreatedAt()
                                )
                            ) ?>


                        </td>








                        <!-- Actions -->


                        <td class="px-5 py-3.5">


                            <div class="
                                flex
                                justify-end
                                gap-1
                            ">



                                <!-- View -->


                                <a href="<?= BASE_URL ?>/admin/contacts/<?= $message->getId() ?>" class="
                                   p-1.5
                                   text-blue-600
                                   hover:bg-blue-50
                                   rounded-lg
                                   transition
                                   ">


                                    <i data-lucide="eye" class="w-4 h-4"></i>


                                </a>



                                <!-- Delete -->
                                <form method="POST"
                                    action="<?= BASE_URL ?>/admin/contacts/<?= $message->getId() ?>/delete"
                                    onsubmit="return confirm('Delete this message?')">

                                    <button class="
            p-1.5
            text-red-500
            hover:bg-red-50
            rounded-lg
        ">

                                        <i data-lucide="trash-2" class="w-4 h-4"></i>

                                    </button>

                                </form>





                                <!-- Reply -->


                                <form method="POST"
                                    action="<?= BASE_URL ?>/admin/contacts/<?= $message->getId() ?>/status">


                                    <input type="hidden" name="status" value="replied">


                                    <button class="
                                        p-1.5
                                        text-green-600
                                        hover:bg-green-50
                                        rounded-lg
                                    ">


                                        <i data-lucide="reply" class="w-4 h-4"></i>


                                    </button>


                                </form>







                                <!-- Close -->


                                <form method="POST"
                                    action="<?= BASE_URL ?>/admin/contacts/<?= $message->getId() ?>/status">


                                    <input type="hidden" name="status" value="closed">


                                    <button class="
                                        p-1.5
                                        text-slate-600
                                        hover:bg-slate-100
                                        rounded-lg
                                    ">


                                        <i data-lucide="archive" class="w-4 h-4"></i>


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


    <?php if(isset($pagination) && $pagination['total'] > 0): ?>


    <div class="
        px-5
        py-3.5
        border-t
        border-slate-200
        bg-slate-50/30
        flex
        flex-col
        sm:flex-row
        sm:items-center
        sm:justify-between
        gap-3
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

            messages.

        </span>


    </div>


    <?php endif; ?>



</div>