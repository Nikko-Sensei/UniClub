<div class="space-y-8">


    <!-- HEADER -->

    <div class="mb-8">

        <p class="text-sm font-semibold text-blue-600 mb-1.5">
            Communication Center
        </p>


        <h1 class="text-3xl md:text-4xl font-bold text-slate-800">
            Contact Messages
        </h1>


        <p class="text-slate-500 mt-2">
            Manage student inquiries and support requests.
        </p>

    </div>



    <!-- TABLE -->


    <div class="bg-white
                rounded-2xl
                border border-slate-200
                shadow-sm
                overflow-hidden">


        <div class="px-6 py-5 border-b border-slate-200">


            <h2 class="text-lg font-bold text-slate-800">

                Message List

            </h2>


        </div>





        <div class="overflow-x-auto">


            <table class="w-full">


                <thead class="bg-slate-50">


                    <tr>


                        <th class="px-6 py-4 text-left
                                   text-xs font-semibold
                                   uppercase tracking-wider
                                   text-slate-500">

                            Student

                        </th>



                        <th class="px-6 py-4 text-left
                                   text-xs font-semibold
                                   uppercase tracking-wider
                                   text-slate-500">

                            Subject

                        </th>



                        <th class="px-6 py-4 text-left
                                   text-xs font-semibold
                                   uppercase tracking-wider
                                   text-slate-500">

                            Message

                        </th>



                        <th class="px-6 py-4 text-left
                                   text-xs font-semibold
                                   uppercase tracking-wider
                                   text-slate-500">

                            Status

                        </th>



                        <th class="px-6 py-4 text-left
                                   text-xs font-semibold
                                   uppercase tracking-wider
                                   text-slate-500">

                            Action

                        </th>


                    </tr>


                </thead>





                <tbody class="divide-y divide-slate-100">


                    <?php foreach ($messages as $message): ?>


                    <tr class="hover:bg-slate-50 transition">


                        <td class="px-6 py-4">


                            <div>

                                <p class="font-semibold text-slate-800">

                                    <?= htmlspecialchars(
                                            $message->getName()
                                        ) ?>

                                </p>


                                <p class="text-sm text-slate-500">

                                    <?= htmlspecialchars(
                                            $message->getEmail()
                                        ) ?>

                                </p>


                            </div>


                        </td>





                        <td class="px-6 py-4 text-slate-700">


                            <?= htmlspecialchars(
                                    $message->getSubject()
                                ) ?>


                        </td>





                        <td class="px-6 py-4">


                            <p class="max-w-xs truncate text-slate-600">

                                <?= htmlspecialchars(
                                        $message->getMessage()
                                    ) ?>

                            </p>


                        </td>





                        <td class="px-6 py-4">


                            <?php

                                $status =
                                    $message->getStatus();


                                $class =
                                    match ($status) {

                                        'pending'
                                        =>
                                        'bg-yellow-100 text-yellow-700',


                                        'replied'
                                        =>
                                        'bg-green-100 text-green-700',


                                        'closed'
                                        =>
                                        'bg-slate-100 text-slate-700',


                                        default
                                        =>
                                        'bg-slate-100 text-slate-700'
                                    };

                                ?>


                            <span class="px-3 py-1
                                         rounded-full
                                         text-xs
                                         font-semibold
                                         <?= $class ?>">


                                <?= ucfirst($status) ?>


                            </span>


                        </td>






                        <td class="px-6 py-4">


                            <form method="POST" action="<?= BASE_URL ?>/admin/contacts/<?= $message->getId() ?>/status"
                                class="flex items-center gap-2">


                                <select name="status" class="rounded-lg
                                           border-slate-300
                                           text-sm">


                                    <option value="pending">
                                        Pending
                                    </option>


                                    <option value="replied">
                                        Replied
                                    </option>


                                    <option value="closed">
                                        Closed
                                    </option>


                                </select>




                                <button class="px-4 py-2
                                           rounded-lg
                                           bg-blue-600
                                           hover:bg-blue-700
                                           text-white
                                           text-sm
                                           font-semibold
                                           transition">


                                    Update


                                </button>


                            </form>


                        </td>



                    </tr>


                    <?php endforeach; ?>



                </tbody>


            </table>


        </div>


    </div>


</div>