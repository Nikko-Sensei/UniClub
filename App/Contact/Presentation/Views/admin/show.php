<?php

$status =
    $message->getStatus();


$statusClass =
    match($status){

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


<div class="space-y-6">



    <!-- Header -->


    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">


        <div>


            <h1 class="text-2xl font-bold text-slate-800">

                Contact Message Details

            </h1>


            <p class="text-slate-500">

                Review student inquiry and manage response status.

            </p>


        </div>




        <a href="<?= BASE_URL ?>/admin/contacts" class="
           inline-flex
           items-center
           gap-2
           px-4
           py-2.5
           bg-slate-100
           text-slate-700
           rounded-lg
           hover:bg-slate-200
           transition
           ">


            <i data-lucide="arrow-left" class="w-4 h-4"></i>


            Back


        </a>


    </div>









    <!-- Student Information -->


    <div class="
        bg-white
        rounded-xl
        border
        border-slate-200
        shadow-sm
        p-6
    ">


        <div class="flex items-center gap-4 mb-6">


            <div class="
                w-12
                h-12
                rounded-xl
                bg-blue-50
                text-blue-600
                flex
                items-center
                justify-center
            ">


                <i data-lucide="user" class="w-6 h-6"></i>


            </div>



            <div>


                <h2 class="text-lg font-semibold text-slate-800">

                    Student Information

                </h2>


                <p class="text-sm text-slate-500">

                    Contact sender details

                </p>


            </div>


        </div>






        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


            <div>


                <p class="
                    text-xs
                    uppercase
                    text-slate-400
                    font-medium
                ">

                    Name

                </p>


                <p class="
                    mt-1
                    font-semibold
                    text-slate-800
                ">

                    <?= htmlspecialchars(
                        $message->getName()
                    ) ?>


                </p>


            </div>





            <div>


                <p class="
                    text-xs
                    uppercase
                    text-slate-400
                    font-medium
                ">

                    Email

                </p>


                <p class="
                    mt-1
                    font-semibold
                    text-slate-800
                ">

                    <?= htmlspecialchars(
                        $message->getEmail()
                    ) ?>


                </p>


            </div>



        </div>


    </div>









    <!-- Message Content -->


    <div class="
        bg-white
        rounded-xl
        border
        border-slate-200
        shadow-sm
        p-6
    ">


        <div class="
            flex
            items-center
            justify-between
            mb-6
        ">


            <div class="flex items-center gap-3">


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


                    <i data-lucide="message-circle" class="w-5 h-5">
                    </i>


                </div>



                <div>


                    <h2 class="
                        font-semibold
                        text-slate-800
                    ">

                        Message

                    </h2>


                    <p class="
                        text-sm
                        text-slate-500
                    ">

                        Submitted request

                    </p>


                </div>


            </div>





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


        </div>








        <div class="space-y-5">



            <div>


                <p class="
                    text-xs
                    uppercase
                    text-slate-400
                    font-medium
                ">

                    Subject

                </p>


                <p class="
                    mt-1
                    text-lg
                    font-semibold
                    text-slate-800
                ">

                    <?= htmlspecialchars(
                        $message->getSubject()
                    ) ?>


                </p>


            </div>






            <div>


                <p class="
                    text-xs
                    uppercase
                    text-slate-400
                    font-medium
                ">

                    Message

                </p>



                <div class="
                    mt-2
                    p-4
                    rounded-lg
                    bg-slate-50
                    text-slate-700
                    leading-relaxed
                ">


                    <?= nl2br(
                        htmlspecialchars(
                            $message->getMessage()
                        )
                    ) ?>


                </div>


            </div>






            <div>


                <p class="
                    text-xs
                    uppercase
                    text-slate-400
                    font-medium
                ">

                    Submitted Date

                </p>


                <p class="
                    mt-1
                    text-slate-600
                ">


                    <?= date(
                        'M d, Y h:i A',
                        strtotime(
                            $message->getCreatedAt()
                        )
                    ) ?>


                </p>


            </div>



        </div>


    </div>









    <!-- Actions -->


    <div class="
        bg-white
        rounded-xl
        border
        border-slate-200
        shadow-sm
        p-6
    ">


        <h2 class="
            font-semibold
            text-slate-800
            mb-4
        ">

            Update Status

        </h2>





        <div class="
            flex
            flex-wrap
            gap-3
        ">





            <!-- Reply -->


            <form method="POST" action="<?= BASE_URL ?>/admin/contacts/<?= $message->getId() ?>/status">


                <input type="hidden" name="status" value="replied">


                <button class="
                    inline-flex
                    items-center
                    gap-2
                    px-4
                    py-2.5
                    bg-green-600
                    text-white
                    rounded-lg
                    hover:bg-green-700
                    transition
                ">


                    <i data-lucide="reply" class="w-4 h-4">
                    </i>


                    Mark Replied


                </button>


            </form>








            <!-- Close -->


            <form method="POST" action="<?= BASE_URL ?>/admin/contacts/<?= $message->getId() ?>/status">


                <input type="hidden" name="status" value="closed">


                <button class="
                    inline-flex
                    items-center
                    gap-2
                    px-4
                    py-2.5
                    bg-slate-700
                    text-white
                    rounded-lg
                    hover:bg-slate-800
                    transition
                ">


                    <i data-lucide="archive" class="w-4 h-4">
                    </i>


                    Close Message


                </button>


            </form>





        </div>


    </div>



</div>