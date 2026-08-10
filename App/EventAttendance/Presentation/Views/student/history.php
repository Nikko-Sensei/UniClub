<div class="container mx-auto p-6">


    <h1 class="text-2xl font-bold mb-6">

        My Attendance History

    </h1>



    <div class="bg-white shadow rounded-lg">


        <table class="w-full">


            <thead class="bg-gray-100">


                <tr>

                    <th class="p-3">
                        Event
                    </th>


                    <th class="p-3">
                        Status
                    </th>


                    <th class="p-3">
                        Checked Date
                    </th>


                </tr>


            </thead>



            <tbody>


                <?php foreach($attendances as $attendance): ?>


                <tr class="border-b">


                    <td class="p-3">

                        Event #<?= $attendance->getEventId(); ?>

                    </td>



                    <td class="p-3">


                        <?= ucfirst(
    $attendance->getAttendanceStatus()
); ?>


                    </td>



                    <td class="p-3">

                        <?= $attendance->getCheckedAt(); ?>


                    </td>



                </tr>


                <?php endforeach; ?>


            </tbody>


        </table>


    </div>


</div>